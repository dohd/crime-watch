<?php

namespace App\Http\Controllers\incidences;

use App\Http\Controllers\Controller;
use App\Models\AgeGrouping;
use App\Models\County;
use App\Models\IncidentFile;
use App\Models\SgbvIncidence;
use App\Models\SgbvReportByAccusedAndVictim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Excel;
use PDF;


class SgbvIncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $counties = County::all()->pluck('name', 'id');
        if (!$request->input('date')) return view('sgbv.index', compact('counties'));

        $county_id = $request->input('county_id');
        $daterange = $request->input('date');
        $datearr = explode('-', $daterange);
        $date_from = str_replace(' ', '', $datearr[0]);
        $date_to = str_replace(' ', '', $datearr[1]);

        $carbonDate = Carbon::createFromFormat('d/m/Y', $date_from);
        $datefrom = $carbonDate->format('Y-m-d');
        $carbonDate = Carbon::createFromFormat('d/m/Y', $date_to);
        $dateto = $carbonDate->format('Y-m-d');
        $county_id = $request->input('county_id');

        $q = SgbvReportByAccusedAndVictim::with(['sgbvincidence' => function ($q) use ($datefrom, $dateto, $county_id) {
            $q->whereBetween('date_commited', [$datefrom, $dateto]);
            $q->when($county_id, fn($q) =>  $q->where('county_id', $county_id));
        }])->whereHas('sgbvincidence', function ($q) use ($datefrom, $dateto, $county_id) {
            $q->whereBetween('date_commited', [$datefrom, $dateto]);
            $q->when($county_id, fn($q) =>  $q->where('county_id', $county_id));
        });
        $sgbvs = $q->get();

        $allcounties = County::get();
        if ($county_id) $allcounties = County::where('id', $county_id)->get();
        $crimesources = IncidentFile::where('is_sgbv', '1')->get();
        $county_name = County::where('id', $county_id)->value('name');

        // sgvb totals by crimesource
        $crimesource_accussed = IncidentFile::where('is_sgbv', '1')
        ->with(['SgbvReportAccusedVictims' => function($q) use ($datefrom, $dateto, $county_id) {
            $q->whereHas('sgbvincidence', function ($q) use ($datefrom, $dateto, $county_id) {
                $q->where('accused_victims', 'Accused');
                $q->whereBetween('date_commited', [$datefrom, $dateto]);
                $q->when($county_id, fn($q) =>  $q->where('county_id', $county_id));
            });
        }])->get();
        $crimesource_victims = IncidentFile::where('is_sgbv', '1')
        ->with(['SgbvReportAccusedVictims' => function($q) use ($datefrom, $dateto, $county_id) {
            $q->whereHas('sgbvincidence', function ($q) use ($datefrom, $dateto, $county_id) {
                $q->where('accused_victims', 'Victim');
                $q->whereBetween('date_commited', [$datefrom, $dateto]);
                $q->when($county_id, fn($q) =>  $q->where('county_id', $county_id));
            });
        }])->get();     
        $sgbv_cols = DB::select('SHOW COLUMNS FROM sgbv_report_by_accused_and_victims');
        $sgbv_cols = array_filter(array_map(fn($v) => $v->Field, $sgbv_cols), fn($v) => !in_array($v, ['id', 'type', 'incident_file_id', 'sgbv_incidence_id', 'created_at', 'updated_at']));
        
        return view('sgbv.index', compact('sgbv_cols', 'crimesource_victims', 'crimesource_accussed', 'county_name', 'allcounties', 'crimesources', 'sgbvs', 'county_id', 'daterange', 'datefrom', 'dateto', 'counties', 'date_from', 'date_to'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties = County::all()->pluck('name', 'id');

        return view('sgbv.create', compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //Set maximum php execution time
            ini_set('max_execution_time', 0);
            ini_set('memory_limit', -1);
            if (!$request->hasFile('file')) return redirect()->back();

            $file = $request->file('file');
            $parsed_array = Excel::toArray([], $file);
            $imported_data = array_splice($parsed_array[0], 2);
            $formated_data = [];
            $is_valid = true;
            $error_msg = '';

            DB::beginTransaction();
            $input = $request->only(['date_commited', 'county_id', 'accused_victims']);
            $input['date_commited'] = date_for_database($input['date_commited']);
            $inputDateCarbon = Carbon::parse($input['date_commited']);
            $month = $inputDateCarbon->month;
            $year = $inputDateCarbon->year;

            $result = SgbvIncidence::where('county_id', $input['county_id'])->where('accused_victims', $input['accused_victims'])->whereYear('date_commited', $year)
                ->whereMonth('date_commited', $month)->first();
            $input['user_id'] = auth()->user()->id;
            if ($result) $result->update($input);
            else $result = SgbvIncidence::create($input);
                
            $result->reportByAccusedVictims()->delete();
            foreach ($imported_data as $key => $value) {
                if (count($value) < 19) {
                    $is_valid =  false;
                    $error_msg = "Some of the columns are missing. Please, use latest CSV file template.";
                    break;
                }

                $row_no = $key + 1;
                $product_array = [];
                $offence = trim($value[0]);

                if ($offence) {
                    $offence_id = IncidentFile::where('name',  $offence)->first();
                    $product_array['incident_file_id'] = $offence_id->id;
                } else {
                    $is_valid =  false;
                    $error_msg = "Incident Name is required in row no. $row_no";
                    break;
                }

                $params = [
                    'm_zero_to_nine', 'f_zero_to_nine', 'm_ten_to_fourteen', 'f_ten_to_fourteen', 'm_fifteen_to_seventeen',
                    'f_fifteen_to_seventeen', 'm_eighteen_to_nineteen', 'f_eighteen_to_nineteen', 'm_twenty_to_twentyfour',
                    'f_twenty_to_twentyfour', 'm_twenty_five_to_twentynine', 'f_twenty_five_to_twentynine', 'm_thirty_to_fortyfour',
                    'f_thirty_to_fortyfour', 'm_fortyfive_to_fiftynine', 'f_fortyfive_to_fiftynine', 'm_sixty_and_above', 'f_sixty_and_above'
                ];
                foreach ($params as $j => $field) {
                    $product_array[$field] = @$value[$j+1] ?: 0;
                }
                $formated_data[] = $product_array;
            }
            if (!$is_valid) trigger_error($error_msg);                

            $result->reportByAccusedVictims()->createMany($formated_data);
            DB::commit();
            $output = [
                'success' => 1,
                'msg' => 'Record Imported Successfully!!'
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            $output = [
                'success' => 0,
                'msg' => $e->getMessage()
            ];
            return redirect('sgbv/create')->with('notification', $output);
        }
        return redirect('sgbv/create')->with('status', $output);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $counties = County::get();
        $agegroupings = AgeGrouping::all();
        $crimesources = IncidentFile::where('is_sgbv', '1')->get();
        $sbvgincidence = SgbvIncidence::with(['reportByCounty', 'reportByAccusedVictims'])->where('uuid', $id)->first();
        return view('sgbv.edit', compact('sbvgincidence', 'counties', 'agegroupings', 'crimesources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (request()->ajax()) {
            $input_main = $request->only(['date_commited']);

            $validator = Validator::make($request->all(), [
                'date_commited' => 'required',

            ]);

            $noerrors = true;
            if ($validator->fails()) {
                $output = [
                    'success' => false,
                    'msg' => "Date field is required",
                ];
                $noerrors = false;
            }
            $input_main['date_commited'] = date_for_database($input_main['date_commited']);

            if ($noerrors) {
                try {
                    //Begin DB  
                    DB::beginTransaction();
                    $input_main['user_id'] = auth()->user()->id;
                    $result = SgbvIncidence::find($id);
                    $result->update($input_main);
                    $result->touch();
                    $input = $request->except(['_token']);
                    $result->reportByCounty()->delete();
                    $result->reportByAccusedVictims()->delete();
                    $amaster = [];
                    $amaster = [];
                    foreach ($input['incident_file_id'] as $key => $value) {

                        $amaster[] = array(
                            'offence' => form_return($input['offence'][$key]),
                            'incident_file_id' => $value,
                            'county_id' => $input['county_id'][$key],
                        );
                    }

                    $result->reportByCounty()->createMany($amaster);
                    $bamaster = [];
                    foreach ($input['a_age_grouping_id'] as $key => $value) {

                        $bamaster[] = array(
                            'm_offence' => form_return($input['am_offence'][$key]),
                            'f_offence' => form_return($input['af_offence'][$key]),
                            'type' => 1,
                            'age_grouping_id' => $value,
                            'incident_file_id' => $input['a_incident_file_id'][$key],
                        );
                    }

                    $result->reportByAccusedVictims()->createMany($bamaster);
                    $cmaster = [];
                    foreach ($input['v_age_grouping_id'] as $key => $value) {

                        $cmaster[] = array(
                            'm_offence' => form_return($input['vm_offence'][$key]),
                            'f_offence' => form_return($input['vf_offence'][$key]),
                            'type' => 2,
                            'age_grouping_id' => $value,
                            'incident_file_id' => $input['v_incident_file_id'][$key],
                        );
                    }
                    $result->reportByAccusedVictims()->createMany($cmaster);

                    DB::commit();
                    $output = [
                        'success' => true,
                        'msg' => "Record Saved Successfully",
                    ];
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
                    $output = [
                        'success' => false,
                        'msg' => $e->getMessage(),
                    ];
                }
            }

            return $output;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Print SGBV Report For All Counties
     */
    public function print_sgbv_report_all($daterange)
    {
        $daterange = decrypt_data($daterange);
        $datearr = explode('-', $daterange);
        $date_from = str_replace(' ', '', $datearr[0]);
        $date_to = str_replace(' ', '', $datearr[1]);
        $carbonDate = Carbon::createFromFormat('d/m/Y', $date_from);
        $datefrom = $carbonDate->format('Y-m-d');
        $carbonDate = Carbon::createFromFormat('d/m/Y', $date_to);
        $dateto = $carbonDate->format('Y-m-d');
        $q = SgbvReportByAccusedAndVictim::with(['sgbvincidence' => function ($q) use ($datefrom, $dateto) {
            $q->whereBetween('date_commited', [$datefrom, $dateto]);
        }])->whereHas('sgbvincidence', function ($query) use ($datefrom, $dateto) {
            $query->whereBetween('date_commited', [$datefrom, $dateto]);
        });
        $sgbvs = $q->get();
        $allcounties = County::OrderBy('code', 'Asc')->get();
        $crimesources = IncidentFile::where('is_sgbv', '1')->get();
        // Get your data to be used in the PDF, e.g., from the database or any other source.
        $data = [
            'allcounties' =>  $allcounties,
            'crimesources' => $crimesources,
            'sgbvs' => $sgbvs,
            'date' => $daterange,
            'content' => 'This is the content of the PDF.',
        ];
        // return view('sgbv.print.printall',compact('data'))->with($data);
        $pdf = PDF::loadView('sgbv.print.printall', $data, [], [
            'orientation' => 'L',
            'title' => 'DOR REPORT',
        ]);
        // You can also set additional configurations for the PDF, such as page orientation, size, etc.
        // For example:
        // $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('SGBV.pdf');
    }

    /**
     * Print SGBV Report By County
     */
    public function print_sgbv_report_by_county($county_id, $daterange)
    {
        $daterange = decrypt_data($daterange);
        $county_id = decrypt_data($county_id);
        $datearr = explode('-', $daterange);
        $date_from = str_replace(' ', '', $datearr[0]);
        $date_to = str_replace(' ', '', $datearr[1]);
        $carbonDate = Carbon::createFromFormat('d/m/Y', $date_from);
        $datefrom = $carbonDate->format('Y-m-d');
        $carbonDate = Carbon::createFromFormat('d/m/Y', $date_to);
        $dateto = $carbonDate->format('Y-m-d');
        $q = SgbvReportByAccusedAndVictim::with(['sgbvincidence' => function ($q) use ($datefrom, $dateto, $county_id) {
            $q->whereBetween('date_commited', [$datefrom, $dateto]);
            $q->where('county_id', '=', $county_id);
        }])->whereHas('sgbvincidence', function ($query) use ($datefrom, $dateto, $county_id) {
            $query->whereBetween('date_commited', [$datefrom, $dateto]);
            $query->where('county_id', '=', $county_id);
        });
        $sgbvs = $q->get();
        $allcounties = County::where('id', $county_id)->get();
        $crimesources = IncidentFile::where('is_sgbv', '1')->get();
        $county_name = County::where('id', $county_id)->value('name');
        $crimesources = IncidentFile::where('is_sgbv', '1')->get();

        // sgvb totals by crimesource
        $crimesource_accussed = IncidentFile::where('is_sgbv', '1')
        ->with(['SgbvReportAccusedVictims' => function($q) use ($datefrom, $dateto, $county_id) {
            $q->whereHas('sgbvincidence', function ($q) use ($datefrom, $dateto, $county_id) {
                $q->where('accused_victims', 'Accused');
                $q->whereBetween('date_commited', [$datefrom, $dateto]);
                $q->when($county_id, fn($q) =>  $q->where('county_id', $county_id));
            });
        }])->get();
        $crimesource_victims = IncidentFile::where('is_sgbv', '1')
        ->with(['SgbvReportAccusedVictims' => function($q) use ($datefrom, $dateto, $county_id) {
            $q->whereHas('sgbvincidence', function ($q) use ($datefrom, $dateto, $county_id) {
                $q->where('accused_victims', 'Victim');
                $q->whereBetween('date_commited', [$datefrom, $dateto]);
                $q->when($county_id, fn($q) =>  $q->where('county_id', $county_id));
            });
        }])->get();     
        $sgbv_cols = DB::select('SHOW COLUMNS FROM sgbv_report_by_accused_and_victims');
        $sgbv_cols = array_filter(array_map(fn($v) => $v->Field, $sgbv_cols), fn($v) => !in_array($v, ['id', 'type', 'incident_file_id', 'sgbv_incidence_id', 'created_at', 'updated_at']));
        
        // Get your data to be used in the PDF, e.g., from the database or any other source.
        $data = compact('sgbv_cols', 'crimesource_victims', 'crimesource_accussed', 'allcounties', 'crimesources', 'sgbvs', 'county_name') + ['date' => $daterange, 'content' => 'This is the content of the PDF.'];
        
        $pdf = PDF::loadView('sgbv.print.printbycounty', $data, [], [
            'orientation' => 'L',
            'title' => 'DOR REPORT',
        ]);
        // You can also set additional configurations for the PDF, such as page orientation, size, etc.
        // For example:
        // $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('SGBV.pdf');
    }
}

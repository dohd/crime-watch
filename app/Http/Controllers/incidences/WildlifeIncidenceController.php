<?php

namespace App\Http\Controllers\incidences;

use App\Http\Controllers\Controller;
use App\Models\IncidentFile;
use App\Models\Region;
use App\Models\WidlifeIncidence;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class WildlifeIncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = WidlifeIncidence::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('date_commited', function ($data) {
                    return  dateFormat($data->date_commited);
                })
                ->addColumn('month_commited', function ($data) {
                    return  monthFormat($data->date_commited);
                })
                ->make(true);
        }
        $regionCount = [];
        return view('wildlife.index', compact('regionCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $incidences=IncidentFile::where('crime_category_id',23)->get();
        $regions=Region::where('is_report',1)->get();
      return view('wildlife.create',compact('incidences','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request()->ajax()) {
            $input = $request->except(['_token']);

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
            $input['date_commited']=date_for_database($input['date_commited']);
            $inputDateCarbon = Carbon::parse($input['date_commited']);
            $month = $inputDateCarbon->month;
            $year = $inputDateCarbon->year;
            
            $recordsExist=WidlifeIncidence::whereYear('date_commited', $year)
            ->whereMonth('date_commited', $month)->exists();
            if($recordsExist){
                $output = [
                    'success' => false,
                    'msg' => "Record for this day is already captured!!",
                ];
                $noerrors = false;
            }

            if ($noerrors) {
                try {
                    //Begin DB  
                    DB::beginTransaction();
                    $input['user_id']=auth()->user()->id;
                    $result = WidlifeIncidence::create($input);
                    $amaster=[];
                    foreach($input['incident_file_id'] as $key=>$value){

                        $amaster[]=array(
                            'statistic_value'=>form_return($input['statistic_value'][$key]),
                            'incident_file_id'=>$value,
                            'region_id'=>$input['region_id'][$key],
                        );

                    }
                   
                   $result->wildlifeStastics()->createMany($amaster);
                  
                
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
        $incidences=IncidentFile::where('crime_category_id',23)->get();
        $regions=Region::where('is_report',1)->get();
        $wildlifeincidence = WidlifeIncidence::with(['wildlifeStastics'])->where('uuid', $id)->first();
      return view('wildlife.edit',compact('wildlifeincidence','incidences','regions'));
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
            $input_main = $request->only(['date_commited','elephant','rhino','giraffe','injured','fetal']);

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
            $input_main['date_commited']=date_for_database($input_main['date_commited']);
        
            if ($noerrors) {
                try {
                    //Begin DB  
                    DB::beginTransaction();
                    $input_main['user_id']=auth()->user()->id;
                    $result = WidlifeIncidence::find($id);
                    $result->update($input_main);
                    $result->touch();
                    $input = $request->except(['_token']);
                    $result->wildlifeStastics()->delete();
                    $amaster=[];
                    foreach($input['incident_file_id'] as $key=>$value){

                        $amaster[]=array(
                            'statistic_value'=>form_return($input['statistic_value'][$key]),
                            'incident_file_id'=>$value,
                            'region_id'=>$input['region_id'][$key],
                        );

                    }
                   
                   $result->wildlifeStastics()->createMany($amaster);
                  
                
                    DB::commit();
                    $output = [
                        'success' => true,
                        'msg' => "Record Updated Successfully",
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
}

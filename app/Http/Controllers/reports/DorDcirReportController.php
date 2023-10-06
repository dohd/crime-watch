<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\IncidentRecord;
use Illuminate\Http\Request;
use PDF;

class DorDcirReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
    public function dor_report()
    {

        $report_numbers = IncidentRecord::where('report_type', 'Briefing Report')
            ->distinct()
            ->orderBy('created_at', 'desc')
            ->pluck('incident_no', 'incident_no');
        //210/2023








        return view('report.dor', compact('report_numbers'));
    }

    public function dcir_report()
    {

        $report_numbers = IncidentRecord::where('report_type', 'Briefing Report')
            ->distinct()
            ->orderBy('created_at', 'desc')
            ->pluck('incident_no', 'incident_no');



        return view('report.dcir', compact('report_numbers'));
    }


    public function get_dor_Report(Request $request)
    {

        $report_numbers = $request->report_number;
        $is_dcir = $request->is_dcir;



        $counties = County::with([
            'divisions' => function ($q) use ($report_numbers, $is_dcir) {
                $q->whereHas('divincidences', function ($query) use ($report_numbers, $is_dcir) {
                    $query->where('incident_no', $report_numbers);
                    $query->where('report_type', 'Briefing Report');
                    $query->where('is_dcir', $is_dcir);
                });
            },
            'divisions.divincidences' => function ($q) use ($report_numbers, $is_dcir) {
                $q->where('incident_no', $report_numbers);
                $q->where('report_type', 'Briefing Report');
                $q->where('is_dcir', $is_dcir);
            },
        ])->whereHas('incidences', function ($query) use ($report_numbers, $is_dcir) {
            $query->where('incident_no', $report_numbers);
            $query->where('report_type', 'Briefing Report');
            $query->where('is_dcir', $is_dcir);
        })->orderBy('code', 'desc')->get();

        /* $master=[];

          foreach($counties as $county){

            foreach($county->divisions as $division ){

                foreach($division->divincidences as $incidences){


                    $master[]=array(

                        'county'=>$county->name,
                        'division'=>$division->name,
                        'description'=>$incidences->description,
                        'report_type'=>$incidences->report_type,
                    );
                }

            }

          }*/


        return view('report.section.dor', compact('counties', 'report_numbers', 'is_dcir'));
    }

    /**
     * Print DCIR Report 
     */
    public function print_dcir_report($report_number, $is_dcir)
    {
        $report_numbers = decrypt_data($report_number);
        $is_dcir = decrypt_data($is_dcir);

        $counties = County::with([
            'divisions' => function ($q) use ($report_numbers, $is_dcir) {
                $q->whereHas('divincidences', function ($query) use ($report_numbers, $is_dcir) {
                    $query->where('incident_no', $report_numbers);
                    $query->where('report_type', 'Briefing Report');
                    $query->where('is_dcir', $is_dcir);
                });
            },
            'divisions.divincidences' => function ($q) use ($report_numbers, $is_dcir) {
                $q->where('incident_no', $report_numbers);
                $q->where('report_type', 'Briefing Report');
                $q->where('is_dcir', $is_dcir);
            },
        ])->whereHas('incidences', function ($query) use ($report_numbers, $is_dcir) {
            $query->where('incident_no', $report_numbers);
            $query->where('report_type', 'Briefing Report');
            $query->where('is_dcir', $is_dcir);
        })->orderBy('code', 'desc')->get();

        $date = IncidentRecord::where('incident_no', $report_numbers)->where('is_dcir', $is_dcir)->first();

        $from_date = dorDateFormat($date->created_at);
        $title = 'DAILY OPERATION REPORT';
        if ($is_dcir == 1) {
            $title = 'DAILY CRIME AND INCIDENCE REPORT';
        }
        //dd($counties);

        // Get your data to be used in the PDF, e.g., from the database or any other source.
        $data = [
            'title' =>  $title,
            'counties' => $counties,
            'report_numbers' => $report_numbers,
            'from_date' => $from_date,
            'content' => 'This is the content of the PDF.',
        ];
        $pdf = PDF::loadView('report.print.dor', $data, [], [
            'title' => 'DOR REPORT',
        ]);
        // You can also set additional configurations for the PDF, such as page orientation, size, etc.
        // For example:
        // $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('sample.pdf');

        // return $pdf->download('sample.pdf');

    }

    /**
     * Print DOR Report 
     */
    public function print_dor_report($report_number, $is_dcir)
    {
        $report_numbers = decrypt_data($report_number);
        $is_dcir = decrypt_data($is_dcir);

        $counties = County::with([
            'divisions' => function ($q) use ($report_numbers, $is_dcir) {
                $q->whereHas('divincidences', function ($query) use ($report_numbers, $is_dcir) {
                    $query->where('incident_no', $report_numbers);
                    $query->where('report_type', 'Briefing Report');
                    $query->where('is_dcir', $is_dcir);
                });
            },
            'divisions.divincidences' => function ($q) use ($report_numbers, $is_dcir) {
                $q->where('incident_no', $report_numbers);
                $q->where('report_type', 'Briefing Report');
                $q->where('is_dcir', $is_dcir);
            },
        ])->whereHas('incidences', function ($query) use ($report_numbers, $is_dcir) {
            $query->where('incident_no', $report_numbers);
            $query->where('report_type', 'Briefing Report');
            $query->where('is_dcir', $is_dcir);
        })->orderBy('code', 'desc')->get();

        $date = IncidentRecord::where('incident_no', $report_numbers)->where('is_dcir', $is_dcir)->first();

        $from_date = dorDateFormat($date->created_at);
        $title = 'DAILY OPERATION REPORT';
        if ($is_dcir == 1) {
            $title = 'DAILY CRIME AND INCIDENCE REPORT';
        }
        //dd($counties);

        // Get your data to be used in the PDF, e.g., from the database or any other source.
        $data = [
            'title' =>  $title,
            'counties' => $counties,
            'report_numbers' => $report_numbers,
            'from_date' => $from_date,
            'content' => 'This is the content of the PDF.',
        ];
        $pdf = PDF::loadView('report.print.dor', $data, [], [
            'title' => 'DOR REPORT',
        ]);
        // You can also set additional configurations for the PDF, such as page orientation, size, etc.
        // For example:
        // $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('sample.pdf');

        // return $pdf->download('sample.pdf');

    }
}

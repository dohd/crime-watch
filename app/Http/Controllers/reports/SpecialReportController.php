<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\IncidentRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class SpecialReportController extends Controller
{
    /**
     * Special Incidence Report
     */
    public function special_report(Request $request)
    {
        if (!$request->special_check || !$request->date) return view('report.specialreport');

        $special_check = $request->input('special_check');
        $daterange = $request->input('date');
        $report_category = $request->input('report_category');
        $datearr = explode('-', $daterange);

        $date_from = str_replace(' ', '', $datearr[0]);
        $date_to = str_replace(' ', '', $datearr[1]);

        $carbonDate = Carbon::createFromFormat('d/m/Y', $date_from);
        $datefrom = $carbonDate->format('Y-m-d');

        $carbonDate = Carbon::createFromFormat('d/m/Y', $date_to);
        $dateto = $carbonDate->format('Y-m-d');

        if ($report_category == 'statistics') {
            //Report Type Gambling
            if ($special_check == 'gambling') {
                $counties = County::with(['incidences.gambling' => function ($q) use ($special_check, $datefrom, $dateto) {
                    // Check the correct table name and column name for 'date_commited'
                    $q->whereHas('incidence', function ($q) use ($special_check, $datefrom, $dateto) {
                        $q->whereBetween('date_captured', [$datefrom, $dateto]);
                        $q->where('special_check', $special_check);
                    });
                }])->get();
            }
            return view('report.specialreport', compact('report_category', 'special_check', 'daterange', 'datefrom', 'dateto', 'counties', 'date_from', 'date_to'));
        } 

        $counties = County::with([
            'divisions' => function ($q) use ($special_check, $datefrom, $dateto) {
                $q->whereHas('divincidences', function ($q) use ($special_check, $datefrom, $dateto) {
                    $q->whereBetween('date_captured', [$datefrom, $dateto]);
                    $q->where('special_check', $special_check);
                });
            },
            'divisions.divincidences' => function ($q) use ($special_check, $datefrom, $dateto) {
                $q->whereBetween('date_captured', [$datefrom, $dateto]);
                $q->where('special_check', $special_check);
            },
        ])->whereHas('incidences', function ($q) use ($special_check, $datefrom, $dateto) {
            $q->whereBetween('date_captured', [$datefrom, $dateto]);
            $q->where('special_check', $special_check);
        })->orderBy('code', 'desc')->get();

        return view('report.specialreport', compact('report_category', 'special_check', 'daterange', 'datefrom', 'dateto', 'counties'));
    }

    /**
     * Print Special Report
     */
    public function print_special_report($report_number, $is_dcir)
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

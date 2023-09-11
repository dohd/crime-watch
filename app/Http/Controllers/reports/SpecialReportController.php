<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\IncidentRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpecialReportController extends Controller
{
    //

    

    public function special_report(Request $request)
    {

        if(!empty($request->input('special_check')) &&  !empty($request->input('date'))) {
            $special_check = $request->input('special_check');
            $daterange = $request->input('date');
            $report_category = $request->input('report_category');
            $datearr = explode('-',$daterange);

          
            $date_from=str_replace(' ', '', $datearr[0]);
            $date_to=str_replace(' ', '', $datearr[1]);

            $carbonDate = Carbon::createFromFormat('d/m/Y', $date_from);
            $datefrom = $carbonDate->format('Y-m-d');

            $carbonDate = Carbon::createFromFormat('d/m/Y', $date_to);
            $dateto = $carbonDate->format('Y-m-d');

            if($report_category=='statistics'){
                     //Report Type Gambling
            if($special_check=='gambling'){
                $counties = County::with(['incidences.gambling' => function ($q) use ($special_check, $datefrom, $dateto) {
                 // Check the correct table name and column name for 'date_commited'
                 $q->whereHas('incidence', function ($innerQ) use ($special_check,$datefrom, $dateto) {
                     $innerQ->whereBetween('date_captured', [$datefrom, $dateto]);
                     $innerQ->where('special_check', $special_check);
                 });
                 
             }])->get();
 
                
 
             }
        

             return view('report.specialreport',compact('report_category','special_check','daterange','datefrom','dateto','counties','date_from','date_to'));

            }else{
                $counties = County::with([
                    'divisions' => function ($q) use ($special_check, $datefrom, $dateto) {
                        $q->whereHas('divincidences', function ($query) use ($special_check, $datefrom, $dateto) {
                            $query->whereBetween('date_captured', [$datefrom, $dateto]);
                            $query->where('special_check', $special_check);
                        });
                    },
                    'divisions.divincidences' => function ($q) use ($special_check, $datefrom, $dateto) {
                        $q->whereBetween('date_captured', [$datefrom, $dateto]);
                        $q->where('special_check', $special_check);
                    },
                ])->whereHas('incidences', function ($query) use ($special_check, $datefrom, $dateto) {
                    $query->whereBetween('date_captured', [$datefrom, $dateto]);
                    $query->where('special_check', $special_check);
                })->orderBy('code', 'desc')->get();

                return view('report.specialreport',compact('report_category','special_check','daterange','datefrom','dateto','counties'));
            }

        
       

            

        }

       
       
        return view('report.specialreport');
    }
}

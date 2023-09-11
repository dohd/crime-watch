<?php

namespace App\Http\Controllers\incidences;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\CrimeCategory;
use Carbon\Carbon;
use App\Models\Division;
use App\Models\Region;
use App\Models\RegionIncidence;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;


class RegionalIncidencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = RegionIncidence::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
            ->addColumn('date_commited', function ($data) {
                return  dateFormat($data->date_commited);  
            })
            ->addColumn('month_commited', function ($data) {
                return  monthFormat($data->date_commited);  
            })
            ->addColumn('region_name', function ($data) {
                return  $data->region->name;  
            })
            ->addColumn('county_name', function ($data) {
                return  $data->county->name;  
            })
                ->make(true);
        }
        $regionCount=[];
        return view('region.index',compact('regionCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions=Region::where('is_report',1)->get()->pluck('name','id');
        return view('region.create',compact('regions'));
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
                'region_id' => 'required',
                'county_id' => 'required',
                'division_id' => 'required',
            
            ]);

            $noerrors = true;
            if ($validator->fails()) {
                $output = [
                    'success' => false,
                    'msg' => "All fields are required",
                ];
                $noerrors = false;
            }
            $input['date_commited']=date_for_database($input['date_commited']);
            $checkrecord=RegionIncidence::where('date_commited',$input['date_commited'])->exists();
            if($checkrecord){
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
                    $result = RegionIncidence::create($input);
                    $master=[];
                    foreach($input['incident_file_id'] as $key=>$value){

                        $master[]=array(
                            'statistic_value'=>form_return($input['statistic_value'][$key]),
                            'incident_file_id'=>$value,
                            'station_id'=>$input['station_id'][$key],
                        );

                    }
                   
                   $result->regionStatistics()->createMany($master);
               
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
        $regions=Region::where('is_report',1)->get()->pluck('name','id');
        $regionincidences = RegionIncidence::with(['regionStatistics'])->where('uuid', $id)->first();
        $countries=County::where('region_id',$regionincidences->region_id)->get()->pluck('name','id');
        $divisionsdropdown=Division::where('county_id',$regionincidences->county_id)->get()->pluck('name','id');
        $stations = Station::where('division_id',$regionincidences->division_id)->get();
        $subcounty = Division::find($regionincidences->division_id);
        $crimes = CrimeCategory::whereHas('incidences')->get();
      
        return view('region.edit',compact('regionincidences','regions','countries','stations','divisionsdropdown','subcounty','crimes'));
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
            $input_main = $request->only(['date_commited','region_id','county_id','division_id']);

            $validator = Validator::make($request->all(), [
                'date_commited' => 'required',
                'region_id' => 'required',
                'county_id' => 'required',
                'division_id' => 'required',
            
            ]);

            $noerrors = true;
            if ($validator->fails()) {
                $output = [
                    'success' => false,
                    'msg' => "All fields are required",
                ];
                $noerrors = false;
            }
            $input_main['date_commited']=date_for_database($input_main['date_commited']);
          

            if ($noerrors) {
                try {
                    //Begin DB  
                    DB::beginTransaction();
                    $input_main['user_id']=auth()->user()->id;
                    $result = RegionIncidence::find($id);
                    $result->update($input_main);
                    $result->touch();
                    $result->regionStatistics()->delete();
    
                    $input = $request->except(['_token']);
                    $master=[];
                    foreach($input['incident_file_id'] as $key=>$value){

                        $master[]=array(
                            'statistic_value'=>form_return($input['statistic_value'][$key]),
                            'incident_file_id'=>$value,
                            'station_id'=>$input['station_id'][$key],
                        );

                    }
                   
                   $result->regionStatistics()->createMany($master);
               
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
    public function load_region_county(Request $request)
    {
        $a = $request->region_id;
        $result = County::where('region_id',$a)->get();
        return json_encode($result);
    }

    public function load_region_division(Request $request)
    {
        $a = $request->county_id;
        $result = Division::where('county_id',$a)->get();
        return json_encode($result);
    }

    

    public function get_divisions(Request $request)
    {
        $a = $request->division_id;  
        $stations = Station::where('division_id',$a)->get();
        $subcounty = Division::find($a);
        $crimes = CrimeCategory::with(['incidences'=> function ($q)  {
            $q->where('is_regional', 1);
        }])->whereHas('incidences',function ($query)  {
            $query->where('is_regional', 1);
        })->get();
       
        return view('region.section.division',compact('subcounty','stations','crimes'));
    }
    

    
}

<?php

namespace App\Http\Controllers\incidences;

use App\Http\Controllers\Controller;
use App\Models\Ammunition;
use App\Models\County;
use App\Models\Firearm;
use App\Models\FirearmIncidence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class FirearmIncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = FirearmIncidence::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
            ->addColumn('date_commited', function ($data) {
                return  dateFormat($data->date_commited);  
            })
            ->addColumn('month_commited', function ($data) {
                return  monthFormat($data->date_commited);  
            })
                ->make(true);
        }
        $regionCount=[];
        return view('firearm.index',compact('regionCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firearms=Firearm::get();
        $counties=County::get();
        $ammunations=Ammunition::get();

      
        
      return view('firearm.create',compact('firearms','counties','ammunations'));
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
            
            
            $recordsExist=FirearmIncidence::whereYear('date_commited', $year)
            ->whereMonth('date_commited', $month)->exists();
      
            
            if($recordsExist){
                $output = [
                    'success' => false,
                    'msg' => "Record for this month already captured is required",
                ];
                $noerrors = false;
            }

            if ($noerrors) {
                try {
                    //Begin DB  
                    DB::beginTransaction();
                    $input['user_id']=auth()->user()->id;
                    $result = FirearmIncidence::create($input);
                    $amaster=[];
                    foreach($input['f_firearm_id'] as $key=>$value){

                        $amaster[]=array(
                            'recovered'=>form_return($input['recovered'][$key]),
                            'surrendered'=>form_return($input['surrendered'][$key]),
                            'firearm_id'=>$value,
                            'county_id'=>$input['f_county_id'][$key],
                        );

                    }
                   
                   $result->firearmAmunations()->createMany($amaster);
                    $bamaster=[];
                    foreach($input['ammunition_id'] as $key=>$value){

                        $bamaster[]=array(
                            'recovered'=>form_return($input['arecovered'][$key]),
                            'surrendered'=>form_return($input['asurrendered'][$key]),
                            'ammunition_id'=>$value,
                            'county_id'=>$input['a_county_id'][$key],
                        );

                    }
                    $result->firearmAmmino()->createMany($bamaster);
                    $cmaster=[];
                    foreach($input['e_county_id'] as $key=>$value){

                        $cmaster[]=array(
                            'magazine'=>form_return($input['magazine'][$key]),
                            'county_id'=>$value,
                            'explosive'=>form_return($input['explosive'][$key]),
                        );

                    }
                    $result->ammunoExposive()->createMany($cmaster);
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
        $firearms=Firearm::get();
        $counties=County::get();
        $ammunations=Ammunition::get();

        $firearmincidences = FirearmIncidence::with(['firearmAmunations', 'firearmAmmino','ammunoExposive'])->where('uuid', $id)->first();
        
      return view('firearm.edit',compact('firearmincidences','firearms','counties','ammunations'));
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
            $input_main['date_commited']=date_for_database($input_main['date_commited']);
           
            
            if ($noerrors) {
                try {
                    //Begin DB  
                    DB::beginTransaction();
                    $input_main['user_id']=auth()->user()->id;
                    $result = FirearmIncidence::find($id);
                    $result->update($input_main);
                    $result->touch();
                    $result->firearmAmunations()->delete();
                    $result->firearmAmmino()->delete();
                    $result->ammunoExposive()->delete();
                    $input = $request->except(['_token']);
                    $amaster=[];
                    foreach($input['f_firearm_id'] as $key=>$value){

                        $amaster[]=array(
                            'recovered'=>form_return($input['recovered'][$key]),
                            'surrendered'=>form_return($input['surrendered'][$key]),
                            'firearm_id'=>$value,
                            'county_id'=>$input['f_county_id'][$key],
                        );

                    }
                   
                   $result->firearmAmunations()->createMany($amaster);
                    $bamaster=[];
                    foreach($input['ammunition_id'] as $key=>$value){

                        $bamaster[]=array(
                            'recovered'=>form_return($input['arecovered'][$key]),
                            'surrendered'=>form_return($input['asurrendered'][$key]),
                            'ammunition_id'=>$value,
                            'county_id'=>$input['a_county_id'][$key],
                        );

                    }
                    $result->firearmAmmino()->createMany($bamaster);
                    $cmaster=[];
                    foreach($input['e_county_id'] as $key=>$value){

                        $cmaster[]=array(
                            'magazine'=>form_return($input['magazine'][$key]),
                            'county_id'=>$value,
                            'explosive'=>form_return($input['explosive'][$key]),
                        );

                    }
                    $result->ammunoExposive()->createMany($cmaster);
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

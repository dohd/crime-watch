<?php

namespace App\Http\Controllers\incidences;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\DrugIncidence;
use App\Models\DrugPackaging;
use App\Models\DrugType;
use App\Models\IncidentFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class DrugIncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = DrugIncidence::orderBy('created_at', 'DESC')->get();
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
        return view('drugs.index',compact('regionCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties=County::get()->pluck('name','id');
        $drugtypes=DrugType::get()->pluck('name','id');
        $packagings=DrugPackaging::get()->pluck('name','id');
        $offenses=IncidentFile::where('is_drug',1)->get()->pluck('name','id');
      
        
      return view('drugs.create',compact('counties','drugtypes','packagings','offenses'));
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
                    'msg' => "Capture all fields!!",
                ];
                $noerrors = false;
            }

          
           // dd( $input);
            $input['date_commited']=date_for_database($input['date_commited']);
       
            $checkrecord=DrugIncidence::where('date_commited',$input['date_commited'])->exists();
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
                    $result = DrugIncidence::create($input);
                    $master=[];
                    foreach($input['drugs'] as $key=>$val){
                        $master[]=array(
                            'county_id'=>$val['county_id'],
                            'incident_file_id'=>$val['incident_file_id'],
                            'sex'=>$val['sex'],
                            'age'=>$val['age'],
                            'nationality'=>$val['nationality'],
                            'case_position'=>$val['case_position'],
                            'drug_type_id'=>$val['drug_type_id'],
                            'drug_packaging_id'=>$val['drug_packaging_id'],
                            'qty'=>$val['qty'],
                        );
                        
        
                    }
                    $result->drugIncidenceItems()->createMany($master);
                   

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
        $counties=County::get()->pluck('name','id');
        $drugtypes=DrugType::get()->pluck('name','id');
        $packagings=DrugPackaging::get()->pluck('name','id');
        $offenses=IncidentFile::where('is_drug',1)->get()->pluck('name','id');
        $drugincidences=DrugIncidence::where('uuid',$id)->first();
      
        
      return view('drugs.edit',compact('drugincidences','counties','drugtypes','packagings','offenses'));
    
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
                    'msg' => "Capture all fields!!",
                ];
                $noerrors = false;
            }

          
           // dd( $input);
            $input_main['date_commited']=date_for_database($input_main['date_commited']);

            if ($noerrors) {
                try {
                    //Begin DB  
                    DB::beginTransaction();
                    $input['user_id']=auth()->user()->id;
                    $result = DrugIncidence::find($id);
                    $result->update($input_main);
                    $result->touch();

                    $master=[];
                    $input = $request->except(['_token']);
                    $result->drugIncidenceItems()->delete();
                    foreach($input['drugs'] as $key=>$val){
                        $master[]=array(
                            'county_id'=>$val['county_id'],
                            'incident_file_id'=>$val['incident_file_id'],
                            'sex'=>$val['sex'],
                            'age'=>$val['age'],
                            'nationality'=>$val['nationality'],
                            'case_position'=>$val['case_position'],
                            'drug_type_id'=>$val['drug_type_id'],
                            'drug_packaging_id'=>$val['drug_packaging_id'],
                            'qty'=>$val['qty'],
                        );
                        
        
                    }
                    $result->drugIncidenceItems()->createMany($master);
                   

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
}

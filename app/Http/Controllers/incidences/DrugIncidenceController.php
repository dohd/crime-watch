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
        if (!request()->ajax()) return redirect()->back();
        
        $validator = Validator::make($request->all(), [
            'date_commited' => 'required',        
        ]);
        if ($validator->fails()) {
            return [
                'success' => false,
                'msg' => "Capture all fields!!",
            ];
        }
        
        $input = $request->except(['_token']);
        $input['date_commited'] = date_for_database($input['date_commited']);
        $exists = DrugIncidence::where('date_commited', $input['date_commited'])->exists();
        if($exists){
            return [
                'success' => false,
                'msg' => "Record for this day is already captured!!",
            ];
        }

        try {
            //Begin DB  
            DB::beginTransaction();
            $input['user_id'] = auth()->user()->id;
            $result = DrugIncidence::create($input);
            $drug_input = array_map(fn($v) => array_filter($v), $request->drugs);
            $result->drugIncidenceItems()->createMany($drug_input);
           
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

        return $output;
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
        if (!request()->ajax()) return redirect()->back();

        $input_main = $request->only(['date_commited']);
        $validator = Validator::make($request->all(), [
            'date_commited' => 'required',
        ]);

        if ($validator->fails()) {
           return [
                'success' => false,
                'msg' => "Capture all fields!!",
            ];
        }

        $input_main['date_commited']=date_for_database($input_main['date_commited']);
        try {
            //Begin DB  
            DB::beginTransaction();
            $input['user_id'] = auth()->user()->id;
            $result = DrugIncidence::find($id);
            $result->update($input_main);

            $result->drugIncidenceItems()->delete();
            $drug_input = array_map(fn($v) => array_filter($v), $request->drugs);
            $result->drugIncidenceItems()->createMany($drug_input);
            
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
        
        return $output;
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

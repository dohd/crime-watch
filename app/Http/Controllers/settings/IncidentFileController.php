<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Models\CrimeCategory;
use App\Models\IncidentFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class IncidentFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = IncidentFile::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('crimecategory', function ($data) {
                    return  $data->crimecategory->name;
                })
                ->addColumn('is_dcir', function ($data) {
                    $is_dcir = 'DOR';
                    if ($data->is_dcir == 1) {
                        $is_dcir = 'DCIR';
                    }
                    return  $is_dcir;
                })

                ->addColumn('is_drug', function ($data) {
                    $is_drug = 'NO';
                    if ($data->is_drug == 1) {
                        $is_drug = 'YES';
                    }
                    return  $is_drug;
                })
                ->addColumn('is_sgbv', function ($data) {
                    $is_sgbv = 'NO';
                    if ($data->is_sgbv == 1) {
                        $is_sgbv = 'YES';
                    }
                    return  $is_sgbv;
                })
                ->addColumn('is_regional', function ($data) {
                    $is_regional = 'NO';
                    if ($data->is_regional == 1) {
                        $is_regional = 'YES';
                    }
                    return  $is_regional;
                })
                ->make(true);
        }
        $crimeCategoryCount = CrimeCategory::count();
        $incidentFileCount = IncidentFile::count();
        $category = CrimeCategory::get()->pluck('name', 'id');
        return view('settings.incidentfile.index', compact('crimeCategoryCount', 'incidentFileCount', 'category'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required',
            'is_dcir' => 'bail|required',
            'crime_category_id' => 'bail|required',
        ]);
        // Check validation failure
        $noerrors = true;
        if ($validator->fails()) {
            $output = [
                'success' => false,
                'msg' => "Make sure you capture all fields",
            ];
            $noerrors = false;
        }
        $input = $request->except(['_token']);
        if ($noerrors) {
            // if (request()->ajax()) {
            try {
                //Begin DB
                DB::beginTransaction();
                $input['is_drug']= (isset($input['is_drug'])) ? $input['is_drug'] : 0;
                $input['is_sgbv']= (isset($input['is_sgbv'])) ? $input['is_sgbv'] : 0;
                $input['is_regional']= (isset($input['is_regional'])) ? $input['is_regional'] : 0;
                $result = IncidentFile::create($input);
                DB::commit();
                $output = [
                    'success' => true,
                    'msg' => "Incident FIle  Saved Successfully",
                ];
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
                $output = [
                    'success' => false,
                    'msg' => $e->getMessage(),
                ];
            }
            //}
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
    public function edit(IncidentFile $incidentfile)
    {
        $category = CrimeCategory::get()->pluck('name', 'id');
        return view('settings.incidentfile.edit', compact('category', 'incidentfile'));
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
        try {
            $is_valid = true;
            $input = $request->except(['_token']);
            $validator = Validator::make($request->all(), [
                'name' => 'bail|required',
                'is_dcir' => 'bail|required',
                'crime_category_id' => 'bail|required',
            ]);
            if ($validator->fails()) {
                $output = [
                    'success' => false,
                    'msg' => "It appears you have forgotten to complete something",
                ];
                $is_valid = false;
            }
            DB::beginTransaction();
            //    dd($input);
            if ($is_valid) {
                //save clients
                $result = IncidentFile::find($id);
                $input['is_drug']= (isset($input['is_drug'])) ? $input['is_drug'] : 0;
                $input['is_sgbv']= (isset($input['is_sgbv'])) ? $input['is_sgbv'] : 0;
                $input['is_regional']= (isset($input['is_regional'])) ? $input['is_regional'] : 0;
                $result->update($input);
                $result->touch();
                $output = [
                    'success' => true,
                    'msg' => "Incident File  Updated Successfully!!"
                ];
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $bug = $e->getMessage();
            $output = [
                'success' => false,
                'msg' => $bug
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
        if (request()->ajax()) {
            try {
                $can_be_deleted = true;
                $error_msg = '';
                if ($can_be_deleted) {
                    DB::beginTransaction();
                    IncidentFile::find($id)->delete();
                    DB::commit();
                    $output = [
                        'success' => true,
                        'msg' => "Incident File Deleted Successfully"
                    ];
                } else {
                    $output = [
                        'success' => false,
                        'msg' => $error_msg
                    ];
                }
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
                $output = [
                    'success' => false,
                    'msg' => "Something Went Wrong"
                ];
            }
            return $output;
        }
    }

    public function get_crime_category(Request $request)
    {
        $q = $request->incident_file_id;
        $result = IncidentFile::with('crimecategory')->find($q);
        return json_encode($result);


    }
    
}

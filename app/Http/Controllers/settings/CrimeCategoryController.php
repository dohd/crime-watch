<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Models\CrimeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CrimeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = CrimeCategory::orderBy('code', 'DESC')->get();
            return DataTables::of($data)
                ->make(true);
        }
        $crimeCategoryCount = CrimeCategory::count();
        return view('settings.crimecategory.index', compact('crimeCategoryCount'));
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
        ]);
        // Check validation failure
        $noerrors = true;
        if ($validator->fails()) {
            $output = [
                'success' => false,
                'msg' => "Name is  required",
            ];
            $noerrors = false;
        }
        $input = $request->except(['_token']);
        if ($noerrors) {
            // if (request()->ajax()) {
            try {
                //Begin DB
                DB::beginTransaction();
                $result = CrimeCategory::create($input);
                DB::commit();
                $output = [
                    'success' => true,
                    'msg' => "Record Saved Successfully",
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
    public function edit(CrimeCategory $crimecategory)
    {
        return view('settings.crimecategory.edit', compact('crimecategory'));
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
                $result = CrimeCategory::find($id);
                $result->update($input);
                $result->touch();
                $output = [
                    'success' => true,
                    'msg' => "Crime Category  Updated Successfully!!"
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
                    CrimeCategory::find($id)->delete();
                    DB::commit();
                    $output = [
                        'success' => true,
                        'msg' => "Crime Category Deleted Successfully"
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
}

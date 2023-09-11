<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\Division;
use App\Models\Region;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = County::orderBy('code', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('region', function ($data) {
                    return  $data->region->name;
                })
                ->make(true);
        }
        $regionCount = Region::count();
        $countyCount = County::count();
        $divisionCount = Division::count();
        $stationCount = Station::count();
        $region = Region::get()->pluck('name', 'id');
        return view('settings.county.index', compact('regionCount', 'countyCount', 'divisionCount', 'stationCount', 'region'));
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
            'code' => 'bail|required',
            'region_id' => 'bail|required',
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
                $result = County::create($input);
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
    public function edit(County $county)
    {
        $region = Region::get()->pluck('name', 'id');
        return view('settings.county.edit', compact('region', 'county'));
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
                'code' => 'bail|required',
                'region_id' => 'bail|required',
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
                $result = County::find($id);
                $result->update($input);
                $result->touch();
                $output = [
                    'success' => true,
                    'msg' => "County  Updated Successfully!!"
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
                    County::find($id)->delete();
                    DB::commit();
                    $output = [
                        'success' => true,
                        'msg' => "County Deleted Successfully"
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

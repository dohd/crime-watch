<?php

namespace App\Http\Controllers\incidences;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\TraffiCategory;
use App\Models\TrafficEnforcementAction;
use App\Models\TrafficIncidence;
use App\Models\TrafficType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class TrafficIncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = TrafficIncidence::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('date_commited', function ($data) {
                    return  dateFormat($data->date_commited);
                })
                ->addColumn('month_commited', function ($data) {
                    return  monthFormat($data->date_commited);
                })
                ->make(true);
        }
        $regionCount = [];
        return view('traffic.index', compact('regionCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::where('is_report', 1)->get();
        $tactions = TrafficEnforcementAction::orderBy('sort', 'asc')->get();
        $types = TrafficType::get();
        $categories = TraffiCategory::get();

        $trafficincidence = new TrafficIncidence;
        if (request('date_committed')) {
            $date = date_for_database(request('date_committed'));
            $trafficincidence = TrafficIncidence::where('date_commited', $date)->with(['reportByCategory', 'reportByRegion', 'reportByRules'])->first();
        }

        return view('traffic.create', compact('trafficincidence', 'regions', 'tactions', 'types', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        if (!request()->ajax()) return redirect()->back();
        
        $input = $request->except(['_token']);
        $validator = Validator::make($request->all(), [
            'date_commited' => 'required',
        ]);
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'msg' => "Date field is required",
            ];
        }

        $input['user_id'] = auth()->user()->id;
        $input['date_commited'] = date_for_database($input['date_commited']);
        $result = TrafficIncidence::where('date_commited', $input['date_commited'])->first();

        try {
            //Begin DB  
            DB::beginTransaction();

            if (!$result) $result = TrafficIncidence::create($input);
            
            $amaster = [];
            foreach ($input['traffi_category_id'] as $key => $value) {
                $amaster[] = array(
                    'c_report_value' => form_return($input['c_report_value'][$key]),
                    'traffi_category_id' => $value,
                    'traffic_type_id' => $input['traffic_type_id'][$key],
                );
            }
            $categ_values = array_filter($amaster, fn($v) => @$v['c_report_value']);
            if ($categ_values) $result->reportByCategory()->createMany($amaster);
            
            $bamaster = [];
            foreach ($input['a_traffic_type_id'] as $key => $value) {
                $bamaster[] = array(
                    'report_value' => form_return($input['ra_report_value'][$key]),
                    'report_type' => 1,
                    'traffic_type_id' => $value,
                    'region_id' => $input['a_region_id'][$key],
                );
            }
            $categ_values = array_filter($bamaster, fn($v) => @$v['report_value']);
            if ($categ_values) $result->reportByRegion()->createMany($bamaster);
            
            $bbmaster = [];
            foreach ($input['v_traffic_type_id'] as $key => $value) {
                $bbmaster[] = array(
                    'report_value' => form_return($input['rv_report_value'][$key]),
                    'report_type' => 2,
                    'traffic_type_id' => $value,
                    'region_id' => $input['v_region_id'][$key],
                );
            }
            $categ_values = array_filter($bbmaster, fn($v) => @$v['report_value']);
            if ($categ_values) $result->reportByRegion()->createMany($bbmaster);
            
            $cmaster = [];
            foreach ($input['traffic_enforcement_action_id'] as $key => $value) {
                $cmaster[] = array(
                    'report_value' => form_return($input['r_report_value'][$key]),
                    'traffic_enforcement_action_id' => $value,
                    'region_id' => form_return($input['r_region_id'][$key])
                );
            }
            $categ_values = array_filter($cmaster, fn($v) => @$v['report_value']);
            if ($categ_values) $result->reportByRules()->createMany($cmaster);

            $dmaster = [];
            foreach ($input['f_region_id'] as $key => $value) {
                $dmaster[] = array(
                    'fine_value' => form_return($input['fine_value'][$key]),
                    'forfeit_value' => form_return($input['forfeit_value'][$key]),
                    'region_id' => $value
                );
            }
            $categ_values = array_filter($dmaster, fn($v) => @$v['fine_value']);
            if ($categ_values) $result->reportByFines()->createMany($dmaster);

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
        $regions = Region::where('is_report', 1)->get();
        $tactions = TrafficEnforcementAction::orderBy('sort', 'asc')->get();
        $types = TrafficType::get();
        $categories = TraffiCategory::get();
        $trafficincidence = TrafficIncidence::with(['reportByCategory', 'reportByRegion', 'reportByRules'])->where('uuid', $id)->first();
        
        return view('traffic.edit', compact('trafficincidence', 'regions', 'tactions', 'types', 'categories'));
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
        // dd($request->all());
        if (!request()->ajax()) return redirect()->back();

        $main_input = $request->only(['date_commited']);
        $validator = Validator::make($request->all(), [
            'date_commited' => 'required',
        ]);
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'msg' => "Date field is required",
            ];
        }
        $main_input['date_commited'] = date_for_database($main_input['date_commited']);
        
        try {
            //Begin DB  
            DB::beginTransaction();

            $main_input['user_id'] = auth()->user()->id;
            $result = TrafficIncidence::find($id);
            $result->update($main_input);
            $result->touch();
            $result->reportByCategory()->delete();
            $result->reportByRegion()->delete();
            $result->reportByRules()->delete();
            $result->reportByFines()->delete();
            $input = $request->except(['_token']);
            $amaster = [];
            foreach ($input['traffi_category_id'] as $key => $value) {
                $amaster[] = array(
                    'c_report_value' => form_return($input['c_report_value'][$key]),
                    'traffi_category_id' => $value,
                    'traffic_type_id' => $input['traffic_type_id'][$key],
                );
            }
            $categ_values = array_filter($amaster, fn($v) => @$v['c_report_value']);
            if ($categ_values) $result->reportByCategory()->createMany($amaster);

            $bamaster = [];
            foreach ($input['a_traffic_type_id'] as $key => $value) {
                $bamaster[] = array(
                    'report_value' => form_return($input['ra_report_value'][$key]),
                    'report_type' => 1,
                    'traffic_type_id' => $value,
                    'region_id' => $input['a_region_id'][$key],
                );
            }
            $categ_values = array_filter($bamaster, fn($v) => @$v['report_value']);
            if ($categ_values) $result->reportByRegion()->createMany($bamaster);

            $bbmaster = [];
            foreach ($input['v_traffic_type_id'] as $key => $value) {
                $bbmaster[] = array(
                    'report_value' => form_return($input['rv_report_value'][$key]),
                    'report_type' => 2,
                    'traffic_type_id' => $value,
                    'region_id' => $input['v_region_id'][$key],
                );
            }
            $categ_values = array_filter($bbmaster, fn($v) => @$v['report_value']);
            if ($categ_values) $result->reportByRegion()->createMany($bbmaster);

            $cmaster = [];
            foreach ($input['traffic_enforcement_action_id'] as $key => $value) {
                $cmaster[] = array(
                    'report_value' => form_return($input['r_report_value'][$key]),
                    'traffic_enforcement_action_id' => $value,
                    'region_id' => form_return($input['r_region_id'][$key])
                );
            }
            $categ_values = array_filter($cmaster, fn($v) => @$v['report_value']);
            if ($categ_values) $result->reportByRules()->createMany($cmaster);

            $dmaster = [];
            foreach ($input['f_region_id'] as $key => $value) {
                $dmaster[] = array(
                    'fine_value' => form_return($input['fine_value'][$key]),
                    'forfeit_value' => form_return($input['forfeit_value'][$key]),
                    'region_id' => $value
                );
            }
            $categ_values = array_filter($dmaster, fn($v) => @$v['fine_value']);
            if ($categ_values) $result->reportByFines()->createMany($dmaster);

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

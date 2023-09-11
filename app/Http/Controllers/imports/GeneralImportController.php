<?php

namespace App\Http\Controllers\imports;

use App\Http\Controllers\Controller;
use App\Models\Adjustment;
use App\Models\County;
use App\Models\Division;
use App\Models\PoliceBase;
use App\Models\Region;
use App\Models\Station;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\DB;

class GeneralImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('import.general');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
               //Set maximum php execution time
               ini_set('max_execution_time', 0);
               ini_set('memory_limit', -1);
               if ($request->hasFile('file')) {
                $file = $request->file('file');
                
                $parsed_array = Excel::toArray([], $file);
                $imported_data = array_splice($parsed_array[0], 1);
                $formated_data = [];
                $is_valid = true;
                $error_msg = '';
                $total_rows = count($imported_data);
               // dd($total_rows);
             


            $master=[];

         
                DB::beginTransaction();

                foreach ($imported_data as $key => $value) {
                    $row_no = $key + 1;

                    $input = [];
                  //$adjustment= Adjustment::where('crime_id',trim($value[3]))->first();
                 //$division_id= Division::where('name',$adjustment->name)->value('id');
                // $region_id= County::where('name',$adjustment->name)->value('region_id');
                // $station=Station::where('name',trim($value[0]))->first();
               //  $station->division_id  = $division_id;
                // $station->save();

                  /*  $input['name'] = trim($value[0]);
                    $input['code'] = trim($value[2]);
                    $input['division_id'] =1069;
                    $input['county_id'] = $crime_watch_id;
                    $input['region_id'] = $region_id;
                    Station::create($input);*/
                   // DB::commit();

                   /* $input['crime_id'] = trim($value[0]);
                    $input['creme_watch_id'] = 1;
                    $input['name'] = trim($value[1]);
                    Adjustment::create($input);
                    DB::commit();*/

                   $adjustment= Adjustment::where('crime_id',trim($value[1]))->first();
                   $station_id= Station::where('name',$adjustment->name)->value('id');

                    $input['name'] = trim($value[0]);
                    $input['station_id'] = $station_id;
                    $input['is_base'] = trim($value[2]);
                 
                    PoliceBase::create($input);
                   DB::commit();


                

               


        
                 /*$adjustment= Adjustment::where('crime_id',trim($value[0]))->first();
                 $crime_watch_id= County::where('name',$adjustment->name)->value('id');

                 $adjustment->creme_watch_id=$crime_watch_id;
                 $adjustment->save();*/
              

          
             
                 /*$val= Adjustment::where('crime_id',trim($value[0]))->value('creme_watch_id');
               $input['county_id']= $val;
               $input['name'] = trim($value[1]);
                 Division::create($input);*/
                   //DB::commit();


                   /* $input['name'] = trim($value[0]);
                    $input['code'] = trim($value[1]);
                    $input['region_id'] = trim($value[2]);
                    County::create($input);*/
                   // DB::commit();
                }
//dd($master);

                if (!$is_valid) {
                    throw new \Exception($error_msg);
                }

            }


        } catch (\Exception $e) {
            DB::rollBack();
            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            $output = [
                'success' => 0,
                'msg' => $e->getMessage()
            ];
            return redirect('generalimport/create')->with('notification', $output);
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
        //
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
        //
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

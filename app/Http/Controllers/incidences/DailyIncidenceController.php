<?php

namespace App\Http\Controllers\incidences;

use App\Http\Controllers\Controller;
use App\Models\AgeGrouping;
use App\Models\Ammunition;
use App\Models\ArrestOfForeignerIncidence;
use App\Models\ArrestOfPoliceOfficerIncidence;
use App\Models\BoardermIncidence;
use App\Models\CattleRustlingIncidence;
use App\Models\Contraband;
use App\Models\County;
use App\Models\CrimeSource;
use App\Models\CriminalGangIncidence;
use App\Models\EthnicClashesIncidence;
use App\Models\Firearm;
use App\Models\GamblingIncidence;
use App\Models\GangFirearm;
use App\Models\IllicitBrewlIncidence;
use App\Models\IncidentContinue;
use App\Models\IncidentFile;
use App\Models\IncidentRecord;
use App\Models\MobInjusticeIncidence;
use App\Models\MoneyMatterIncidence;
use App\Models\NatureOfSchoolUnrest;
use App\Models\SchoolIncidence;
use App\Models\Station;
use App\Models\StockTheftIncidence;
use App\Models\TerrorismIncidence;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PDF;
use Illuminate\Support\Facades\Log;

class DailyIncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = IncidentRecord::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addColumn('filename', function ($data) {
                    return  $data->incidentFile->name;
                })
                ->addColumn('county_name', function ($data) {
                    return  $data->county->name;
                })
                ->addColumn('division_name', function ($data) {
                    return  $data->idivision->name;
                })
                ->addColumn('category', function ($data) {
                    $category = '';
                    if (!empty($data->special_check)) {
                        $category = $data->special_check;
                    }
                    return  $category;
                })
                ->addColumn('date_commited', function ($data) {
                    return  dateFormat($data->date_commited);
                })
                ->addColumn('date_reported', function ($data) {
                    return  dateFormat($data->date_reported);
                })
                ->make(true);
        }
        $regionCount = [];
        return view('incidences.index', compact('regionCount'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = new Countries();
        $countries = $countries->all()->pluck('name.common', 'name.common');
        $agegroupings = AgeGrouping::all();
        $crimesources = IncidentFile::where('crime_category_id', '3')->get();
        $contrabands = Contraband::all();
        $nature = NatureOfSchoolUnrest::all()->pluck('name', 'id');
        $source = CrimeSource::all()->pluck('name', 'id');
        $incidentfiles = IncidentFile::all()->pluck('name', 'id');
        $stations = Station::all()->pluck('name', 'id');
        $firearms = Firearm::get();
        $counties = County::get();
        $ammunitions = Ammunition::get();

        $january = date("Y-m-d", strtotime(date("Y") . "-01-01"));
        $todat = date("Y-m-d");
        $date1 = new DateTime('' . $january . '');
        $date2 = new DateTime('' . $todat . '');
        $diff = $date2->diff($date1)->format("%a");
        $number = ($diff + 2) . '/' . date("Y");

        return view('incidences.create', compact(
            'countries',
            'agegroupings',
            'crimesources',
            'contrabands',
            'nature',
            'number',
            'source',
            'incidentfiles',
            'stations',
            'firearms',
            'counties',
            'ammunitions',
        ));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(request()->all());
        // if (!request()->ajax()) return redirect()->back();

        $validator = Validator::make($request->all(), [
            'report_type' => 'bail|required',
            'incident_no' => 'bail|required',
            'incident_ref' => 'bail|required',
            'incident_title' => 'bail|required',
            'crime_source_id' => 'bail|required',
            'incident_file_category' => 'bail|required',
            'station_id' => 'bail|required',
            'case_position' => 'bail|required',
        ]);
        
        if ($validator->fails()) {
            dd($validator->errors(), $request->all());
            return ['success' => false, 'msg' => "Make sure you capture all required fields"];
        }
            
        $input = $request->except(['_token']);
        try {
            //Begin DB
            DB::beginTransaction();

            foreach ($input as $key => $value) {
                if (!$value) continue;
                if (in_array($key, ['date_commited', 'date_reported', 'date_captured'])) {
                    $input[$key] = date_for_database($value);
                }
                if (in_array($key, ['time_commited', 'time_reported'])) {
                    $input[$key] = time_for_database($value);
                }
            }

            // flag duplicate
            $record_exists = IncidentRecord::where(['incident_ref' => $input['incident_ref'], 'station_id' => $input['station_id']])->exists();
            if ($record_exists) {
                return ['success' => false, 'msg' => 'Duplicate Record Not Allowed!'];
            }

            if (@$input['incident_file_id']) $input['is_dcir'] = IncidentFile::where('id', $input['incident_file_id'])->value('is_dcir');
            $result = IncidentRecord::create($input);

            //insert add incidence
            if ($result->report_type == 'Briefing Report') {
                if ($result->addincident == 'addincident') {
                    $input['incident_record_id'] = $result->id;
                    IncidentContinue::create($input);
                }
                if ($result->gangfirearm == 'gangfirearm') {
                    $input['incident_record_id'] = $result->id;
                    GangFirearm::create($input);
                }
            }

            //insert add Special Reports
            if ($result->report_type == 'Special Report') {
                //Gambling
                if ($result->special_check == 'gambling') {
                    $input['incident_record_id'] = $result->id;
                    GamblingIncidence::create($input);
                }
                //Mobinjustice
                if ($result->special_check == 'mob_injustice') {
                    $input['incident_record_id'] = $result->id;
                    MobInjusticeIncidence::create($input);
                }
                //Money Matters
                if ($result->special_check == 'money_matters') {
                    $input['incident_record_id'] = $result->id;
                    MoneyMatterIncidence::create($input);
                }
                //Arrest Of Foreigners
                if ($result->special_check == 'arrest_of_foreigners') {
                    $input['incident_record_id'] = $result->id;
                    ArrestOfForeignerIncidence::create($input);
                }
                //Criminal Gang 
                if ($result->special_check == 'criminal_gang') {
                    $input['incident_record_id'] = $result->id;
                    CriminalGangIncidence::create($input);
                }
                //Police Incidences 
                if ($result->special_check == 'police_officers') {
                    $result->policeofficers()->createMany($input['policeofficer']);
                }
                //Criminal Gang 
                if ($result->special_check == 'school') {
                    $input['incident_record_id'] = $result->id;
                    SchoolIncidence::create($input);
                }
                //Illicitbrew 
                if ($result->special_check == 'illicitbrew') {
                    $input['incident_record_id'] = $result->id;
                    IllicitBrewlIncidence::create($input);
                }
                //Terrorism 
                if ($result->special_check == 'terrorism') {
                    $input['incident_record_id'] = $result->id;
                    TerrorismIncidence::create($input);
                }
                //Boarder 
                if ($result->special_check == 'boarder') {
                    $input['incident_record_id'] = $result->id;
                    BoardermIncidence::create($input);
                }
                //Contraband 
                if ($result->special_check == 'contraband') {
                    $contmaster = [];
                    foreach ($input['contraband_id'] as $key => $val) {
                        if (!empty($input['contraband_value'][$key])) {
                            $contmaster[] = [
                                'contraband_id' => $val,
                                'contraband_value' => $input['contraband_value'][$key]
                            ];
                        }
                    }
                    $result->contrabands()->createMany($contmaster);
                }
                //Cattle Rustling 
                if ($result->special_check == 'cattle_rustling') {
                    $input['incident_record_id'] = $result->id;
                    CattleRustlingIncidence::create($input);
                }
                //Ethnic Clashes
                if ($result->special_check == 'ethnic_clashes') {
                    $input['incident_record_id'] = $result->id;
                    EthnicClashesIncidence::create($input);
                }
                //Stock Theft
                if ($result->special_check == 'stock_theft') {
                    $input['incident_record_id'] = $result->id;
                    StockTheftIncidence::create($input);
                }
                //Alien 
                if ($result->special_check == 'alien') {
                    $result->aliens()->createMany($input['alien']);
                }
                //Kidnapping
                if ($result->special_check == 'kidnapping') {
                    // 
                }
                // Wildlife
                if ($result->special_check == 'wildlife') {
                    // 
                }
                //Firearm
                if ($result->special_check == 'firearm') {
                    $firearm_data = $request->only('firearm_id', 'firearm_recov', 'firearm_used');
                    $ammunition_data = $request->only('firearm_id', 'firearm_recov', 'firearm_used');

                    $result->firearms()->createMany($firearms = []);
                    $result->ammunitions()->createMany($ammunitions = []);
                }
            }
            DB::commit();
            $output = ['success' => true, 'msg' => "Record Saved Successfully"];
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            $output = ['success' => false, 'msg' => $e->getMessage()];
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
        $incidentrecord = IncidentRecord::where('uuid', $id)->first();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = new Countries();
        $countries = $countries->all()->pluck('name.common', 'name.common');
        $agegroupings = AgeGrouping::all();
        $crimesources = IncidentFile::where('crime_category_id', '3')->get();
        $nature = NatureOfSchoolUnrest::all()->pluck('name', 'id');
        $source = CrimeSource::all()->pluck('name', 'id');
        $incidentfiles = IncidentFile::all()->pluck('name', 'id');
        $stations = Station::all()->pluck('name', 'id');
        $firearms = Firearm::get();
        $counties = County::get();
        $ammunitions = Ammunition::get();

        $january = date("Y-m-d", strtotime(date("Y") . "-01-01"));
        $todat = date("Y-m-d");
        $date1 = new DateTime('' . $january . '');
        $date2 = new DateTime('' . $todat . '');
        $diff = $date2->diff($date1)->format("%a");
        $number = ($diff + 2) . '/' . date("Y");
        $incidentrecord = IncidentRecord::with(['incidentFile.crimecategory'])->where('uuid', $id)->first();
        $cid = $incidentrecord->id;
        $contrabands = Contraband::with([
            'contrabandIncidences' => fn ($q) => $q->where('incident_record_id', $cid)
        ])->get();

        return view('incidences.edit', compact(
            'incidentrecord',
            'countries',
            'agegroupings',
            'crimesources',
            'contrabands',
            'nature',
            'number',
            'source',
            'incidentfiles',
            'stations',
            'firearms',
            'counties',
            'ammunitions'
        ));
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
            $input = $request->except(['_token', '_method']);
            $validator = Validator::make($request->all(), [
                'report_type' => 'bail|required',
                'incident_no' => 'bail|required',
                'incident_ref' => 'bail|required',
                'incident_title' => 'bail|required',
                'crime_source_id' => 'bail|required',
                'incident_file_category' => 'bail|required',
                'station_id' => 'bail|required',
                'case_position' => 'bail|required',
            ]);
            // Check validation failure
            $noerrors = true;
            if ($validator->fails()) {
                $output = [
                    'success' => false,
                    'msg' => "Make sure you capture all required fields",
                ];
                $noerrors = false;
            }
            if ($noerrors) {
                try {
                    //Begin DB
                    DB::beginTransaction();
                    $input_main = $request->only(['incident_no', 'date_captured', 'incident_ref', 'charge_no', 'incident_title', 'date_commited', 'date_reported', 'time_commited', 'time_reported', 'case_position', 'motive', 'description', 'addincident', 'gangfirearm', 'special_check', 'crime_source_id', 'incident_file_id', 'station_id', 'region_id', 'county_id', 'division_id', 'c_no_of_arrest']);
                    if (!empty($input_main['date_commited'])) {
                        $input_main['date_commited'] = date_for_database($input_main['date_commited']);
                    }
                    if (!empty($input_main['date_reported'])) {
                        $input_main['date_reported'] = date_for_database($input_main['date_reported']);
                    }
                    if (!empty($input_main['time_commited'])) {
                        $input_main['time_commited'] = time_for_database($input_main['time_commited']);
                    }
                    if (!empty($input_main['time_reported'])) {
                        $input_main['time_reported'] = time_for_database($input_main['time_reported']);
                    }
                    if (!empty($input_main['incident_file_id'])) {
                        $input_main['is_dcir'] = IncidentFile::where('id', $input_main['incident_file_id'])->value('is_dcir');
                    }
                    if (!empty($input_main['date_captured'])) {
                        $input_main['date_captured'] = date_for_database($input_main['date_captured']);
                    }
                    $result = IncidentRecord::find($id);
                    $result->update($input_main);
                    $result->touch();
                    if ($result->report_type == 'Briefing Report' && $result->addincident == 'addincident') {
                        //insert add incidence
                        $input_continue = $request->only(['place', 'mode_of_operandi', 'as_name', 'as_value', 'ar_name', 'ar_value', 'ad_name', 'ad_value']);
                        $updateRecord = $result->incidentContinue();
                        $updateRecord->update($input_continue);
                        $updateRecord->touch();
                    }
                    if ($result->report_type == 'Briefing Report' && $result->gangfirearm == 'gangfirearm') {
                        //insert add incidence
                        $input_firearm = $request->only(['total_no_of_gang', 'no_armed', 'rifle', 'pistol', 'toy_pistol', 'home_made', 'other_weapons', 'incident_record_id']);
                        $updateRecord = $result->gangFirearm();
                        $updateRecord->update($input_firearm);
                        $updateRecord->touch();
                    }
                    if ($result->report_type == 'Special Report') {
                        //insert add Special Reports
                        //Gambling
                        if ($result->special_check == 'gambling') {
                            $input_gambling = $request->only(['m_arrest_no', 'm_no', 'c_arrest_no', 'c_no', 'p_arrest_no', 'p_no']);
                            $updateRecord = $result->gambling();
                            $updateRecord->update($input_gambling);
                            $updateRecord->touch();
                        }
                        //Mobinjustice
                        if ($result->special_check == 'mob_injustice') {
                            $input_mobinjustice = $request->only(['suspect', 'age', 'mob_fetal', 'status']);
                            $updateRecord = $result->mobInjustice();
                            $updateRecord->update($input_mobinjustice);
                            $updateRecord->touch();
                        }
                        //Money Matters
                        if ($result->special_check == 'money_matters') {
                            $input_moneymatters = $request->only(['amount', 'currency', 'm_no_of_arrest', 'circumstances']);
                            $updateRecord = $result->moneyMatter();
                            $updateRecord->update($input_moneymatters);
                            $updateRecord->touch();
                        }
                        //Arrest Of Foreigners
                        if ($result->special_check == 'arrest_of_foreigners') {
                            $input_arrestof_foreigners = $request->only(['f_place', 'f_no_of_arrest', 'f_nationality']);
                            $updateRecord = $result->arrestOfForeigners();
                            $updateRecord->update($input_arrestof_foreigners);
                            $updateRecord->touch();
                        }
                        //Criminal Gang 
                        if ($result->special_check == 'criminal_gang') {
                            $input_criminal_gang = $request->only(['c_gang_name', 'cr_no_of_arrest', 'c_gang_incidences']);
                            $updateRecord = $result->criminalGang();
                            $updateRecord->update($input_criminal_gang);
                            $updateRecord->touch();
                        }
                        //Police Incidences 
                        if ($result->special_check == 'police_officers') {
                            $result->policeofficers()->delete();
                            $result->policeofficers()->createMany($input['policeofficer']);
                        }
                        //Criminal Gang 
                        if ($result->special_check == 'school') {
                            $input_school = $request->only(['s_school_name', 'nature_of_school_unrest_id', 's_reason', 's_cases_reported', 's_student_injured', 's_student_dead', 's_student_non_injured', 's_student_non_dead', 's_student_arrested', 's_student_prosecuted', 's_other_arrest', 's_other_prosecuted', 's_sp_destroyed', 's_sp_value']);
                            $updateRecord = $result->school();
                            $updateRecord->update($input_school);
                            $updateRecord->touch();
                        }
                        //Illicitbrew 
                        if ($result->special_check == 'illicitbrew') {
                            $input_illicitbrew = $request->only(['type_illicitbrew', 'im_arrested', 'im_taken_to_court', 'im_destroyed', 'id_arrested', 'id_taken_to_court', 'id_destroyed', 'ir_arrested', 'ic_taken_to_court']);
                            $updateRecord = $result->illicitBrew();
                            $updateRecord->update($input_illicitbrew);
                            $updateRecord->touch();
                        }
                        //Terrorism 
                        if ($result->special_check == 'terrorism') {
                            $input_terrorism = $request->only(['place_of_incidence', 'mode_of_attack', 'tk_officer', 'tk_reservist', 'tk_civilian', 'tk_suspect', 'ti_officer', 'ti_reservist', 'ti_civilian', 'ti_suspect', 'tkd_officer', 'tkd_reservist', 'tkd_civilian', 'tkd_suspect', 'ta_officer', 'ta_reservist', 'ta_civilian', 'ta_suspect']);
                            $updateRecord = $result->terrorism();
                            $updateRecord->update($input_terrorism);
                            $updateRecord->touch();
                        }
                        //Boarder 
                        if ($result->special_check == 'boarder') {
                            $input_boarder = $request->only(['s_camel', 's_cattle', 's_goats', 'r_camel', 'r_cattle', 'r_goats', 'o_killed', 'c_killed', 'o_injured', 'c_injured', 'r_killed', 'r_arrested']);
                            $updateRecord = $result->boarder();
                            $updateRecord->update($input_boarder);
                            $updateRecord->touch();
                        }
                        //Contraband 
                        if ($result->special_check == 'contraband') {
                            $contmaster = [];
                            foreach ($input['contraband_id'] as $key => $val) {
                                if (!empty($input['contraband_value'][$key])) {
                                    $contmaster[] = array(
                                        'contraband_id' => $val,
                                        'contraband_value' => $input['contraband_value'][$key]
                                    );
                                }
                            }
                            $result->contrabands()->delete();
                            $result->contrabands()->createMany($contmaster);
                        }
                        //Cattle Russtling 
                        if ($result->special_check == 'cattle_rustling') {
                            $input_cattlerustlin = $request->only(['cr_killed', 'cr_injured', 'cr_arrested', 'cs_cattle', 'cs_goats', 'cs_sheep', 'cs_camel', 'cs_others', 'cr_cattle', 'cr_goats', 'cr_sheep', 'cr_camel', 'cr_others']);
                            $updateRecord = $result->cattleRustling();
                            $updateRecord->update($input_cattlerustlin);
                            $updateRecord->touch();
                        }
                        //Ethnic Clashes
                        if ($result->special_check == 'ethnic_clashes') {
                            $input_ethnicclashes = $request->only(['tribes_involved', 'e_killed', 'e_injured', 'e_arrested', 'e_reason']);
                            $updateRecord = $result->ethicalClashes();
                            $updateRecord->update($input_ethnicclashes);
                            $updateRecord->touch();
                        }
                        //Stock Theft
                        if ($result->special_check == 'stock_theft') {
                            $input_stocktheft = $request->only(['stp_killed', 'stp_injured', 'stp_arrested', 'stp_cattle', 'stp_goats', 'stp_sheep', 'stp_camel', 'stp_others', 'str_cattle', 'str_goats', 'str_sheep', 'str_camel', 'str_others']);
                            $updateRecord = $result->stockTheft();
                            $updateRecord->update($input_stocktheft);
                            $updateRecord->touch();
                        }
                        //Alien 
                        if ($result->special_check == 'alien') {
                            $result->aliens()->delete();
                            $result->aliens()->createMany($input['alien']);
                        }
                    }
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
            // dd ($school);
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
        if (request()->ajax()) {
            try {


                $can_be_deleted = true;
                $error_msg = '';


                if ($can_be_deleted) {
                    DB::beginTransaction();
                    IncidentRecord::where('uuid', $id)->first()->delete();


                    DB::commit();


                    $output = [
                        'success' => true,
                        'msg' => "Record Deleted Successfully"
                    ];
                } else {
                    $output = [
                        'success' => false,
                        'msg' => $error_msg
                    ];
                }
            } catch (\Exception $e) {
                DB::rollBack();
                Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

                $output = [
                    'success' => false,
                    'msg' => "Something Went Wrong"
                ];
            }


            return $output;
        }
    }
    public function get_station_related(Request $request)
    {
        $q = $request->station_id;
        $result = Station::with(['region', 'county', 'division'])->find($q);
        return json_encode($result);
    }
    public function load_incident_number(Request $request)
    {
        $q = $request->date_captured;
        $year = Carbon::createFromFormat('d-m-Y', $q)->format('Y');
        $todat = Carbon::createFromFormat('d-m-Y', $q)->format('Y-m-d');
        $format = "Y-m-d";
        $january = date($format, strtotime($year . "-01-01"));
        $date1 = new DateTime('' . $january . '');
        $date2 = new DateTime('' . $todat . '');
        $diff = $date2->diff($date1)->format("%a");
        $number = ($diff + 2) . '/' . $year;

        return json_encode($number);
    }
}

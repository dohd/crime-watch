@php
    $incident_no = $number;
    $region_id = null;
    $region_name = null;
    $county_id = null;
    $county_name = null;
    $division_id = null;
    $division_name = null;
    $crime_category_id = null;
    $incident_file_category = null;
    $decription = null;
    $date_commited = null;
    $date_reported = null;
    $date_captured=null;
    $date_commited_class = 'flatpickr-basic';
    $date_reported_class = 'flatpickr-basic';
    $date_captured_class = 'flatpickr-basic';
    $breifing_report_hide = 'hide';
    $special_report_hide = 'hide';
    $gambling = 0;
    $alien = 0;
    $mob_injustice = 0;
    $money_matters = 0;
    $arrest_of_foreigners = 0;
    $criminal_gang = 0;
    $police_officers = 0;
    $school = 0;
    $illicitbrew = 0;
    $terrorism = 0;
    $boarder = 0;
    $contraband = 0;
    $cattle_rustling = 0;
    $ethnic_clashes = 0;
    $stock_theft = 0;
    $addincident = 0;
    $gangfirearm = 0;
    if (isset($incidentrecord)) {
        $incident_no = null;
        $region_id = $incidentrecord->region->id;
        $region_name = $incidentrecord->region->name;
        $county_id = $incidentrecord->county->id;
        $county_name = $incidentrecord->county->name;
        $division_id = $incidentrecord->idivision->id;
        $division_name = $incidentrecord->idivision->name;
        $crime_category_id = $incidentrecord->incidentFile->crimecategory->id;
        $incident_file_category = $incidentrecord->incidentFile->crimecategory->name;
        $decription = $incidentrecord->description;
        $date_commited =dateFormat($incidentrecord->date_commited);
        $date_reported =dateFormat($incidentrecord->date_reported);
        $date_captured =dateFormat($incidentrecord->date_captured);
        
        $date_commited_class = 'flatpickr-basic-blank';
        $date_reported_class = 'flatpickr-basic-blank';
        $date_captured_class = 'flatpickr-basic-blank';
        if ($incidentrecord->report_type == 'Briefing Report') {
            $breifing_report_hide = '';
        }
        if ($incidentrecord->report_type == 'Special Report') {
            $special_report_hide = '';
        }
        if ($incidentrecord->addincident == 'addincident') {
            $addincident = 1;
        }
        if ($incidentrecord->gangfirearm == 'gangfirearm') {
            $gangfirearm = 1;
        }
        switch ($incidentrecord->special_check) {
            case 'gambling':
                $gambling = 1;
                break;
            case 'mob_injustice':
                $mob_injustice = 1;
                break;
            case 'money_matters':
                $money_matters = 1;
                break;
            case 'arrest_of_foreigners':
                $arrest_of_foreigners = 1;
                break;
            case 'criminal_gang':
                $criminal_gang = 1;
                break;
            case 'police_officers':
                $police_officers = 1;
                break;
            case 'school':
                $school = 1;
                break;
            case 'illicitbrew':
                $illicitbrew = 1;
                break;
            case 'terrorism':
                $terrorism = 1;
                break;
            case 'boarder':
                $boarder = 1;
                break;
            case 'contraband':
                $contraband = 1;
                break;
            case 'cattle_rustling':
                $cattle_rustling = 1;
                break;
            case 'ethnic_clashes':
                $ethnic_clashes = 1;
                break;
            case 'stock_theft':
                $stock_theft = 1;
                break;
            case 'alien':
                $alien = 1;
                break;
        }
    }
@endphp
{!! Form::hidden('crime_category_id', $crime_category_id, [
    'class' => '  form-control',
    'id' => 'crime_category_id',
]) !!}
{!! Form::hidden('region_id', $region_id, ['class' => '  form-control', 'id' => 'region_id']) !!}
{!! Form::hidden('county_id', $county_id, ['class' => '  form-control', 'id' => 'county_id']) !!}
{!! Form::hidden('division_id', $division_id, ['class' => '  form-control', 'id' => 'division_id']) !!}
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">INCIDENT CRIME DETAILS</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-2 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helperText">Report Type</label>
                                {!! Form::select(
                                    'report_type',
                                    ['Briefing Report' => 'Briefing Report', 'Special Report' => 'Special Report','Daily Incidences'=>'Daily Incidences'],
                                    null,
                                    [
                                        'placeholder' => '-- Select  --',
                                        'class' => ' select2 form-control',
                                        'id' => 'report_type',
                                        'required' => 'required',
                                    ],
                                ) !!}
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="date_captured">Date Captured</label>
                            {!! Form::text('date_captured', $date_captured, [
                                'placeholder' => 'Enter  Date',
                                'class' => '  form-control '.$date_captured_class.'',
                                'id' => 'date_captured',
                            ]) !!}
                        </div>


                        <div class="col-xl-2 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Incident No</label>
                                {!! Form::text('incident_no', $incident_no, [
                                    'placeholder' => 'Enter  No',
                                    'class' => '  form-control',
                                    'id' => 'incident_no',
                                    'required' => 'required',
                                    'readonly' => 'readonly',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helpInputTop">Incident Ref</label>
                                {!! Form::text('incident_ref', null, [
                                    'placeholder' => 'Enter  No',
                                    'class' => '  form-control',
                                    'id' => 'incident_ref',
                                    'required' => 'required',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helpInputTop">Charge Register No</label>
                                {!! Form::text('charge_no', null, [
                                    'placeholder' => 'Enter  No',
                                    'class' => '  form-control',
                                    'id' => 'charge_no',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helpInputTop">Incident Title</label>
                                {!! Form::text('incident_title', null, [
                                    'placeholder' => 'Enter  No',
                                    'class' => '  form-control',
                                    'id' => 'incident_title',
                                    'required' => 'required',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helperText">Source</label>
                                {!! Form::select('crime_source_id', $source, null, [
                                    'placeholder' => '-- Enter Source --',
                                    'class' => ' select2 form-control',
                                    'id' => 'source_id',
                                    'required' => 'required',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helperText">Incident File</label>
                                {!! Form::select('incident_file_id', $incidentfiles, null, [
                                    'placeholder' => '-- Enter File --',
                                    'class' => ' select2 form-control',
                                    'id' => 'incident_file_id',
                                    'required' => 'required',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="region">Category</label>
                            {!! Form::text('incident_file_category', $incident_file_category, [
                                'placeholder' => 'Enter  No',
                                'class' => '  form-control',
                                'id' => 'incident_file_category',
                                'required' => 'required',
                                'readonly' => 'readonly',
                            ]) !!}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="station_id">Station</label>
                                {!! Form::select('station_id', $stations, null, [
                                    'placeholder' => '-- Enter Station --',
                                    'class' => ' select2 form-control',
                                    'id' => 'station_id',
                                    'required' => 'required',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="region">Region</label>
                            {!! Form::text('region_name', $region_name, [
                                'placeholder' => 'Enter  No',
                                'class' => '  form-control',
                                'id' => 'region_name',
                                'required' => 'required',
                                'readonly' => 'readonly',
                            ]) !!}
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">County </label>
                                {!! Form::text('county_name', $county_name, [
                                    'placeholder' => 'Enter  No',
                                    'class' => '  form-control',
                                    'id' => 'county_name',
                                    'required' => 'required',
                                    'readonly' => 'readonly',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Division </label>
                                {!! Form::text('division_name', $division_name, [
                                    'placeholder' => 'Enter  No',
                                    'class' => '  form-control',
                                    'id' => 'division_name',
                                    'required' => 'required',
                                    'readonly' => 'readonly',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="region">Date Commited</label>
                            {!! Form::text('date_commited', $date_commited, [
                                'placeholder' => 'Enter  No',
                                'class' => '  form-control '.$date_commited_class.'',
                                'id' => 'date_commited',
                            ]) !!}
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="region">Time Commited</label>
                            {!! Form::text('time_commited', null, [
                                'placeholder' => 'Enter  Time',
                                'class' => '  form-control flatpickr-time text-start',
                                'id' => 'time_commited ',
                                'style' => 'height:100%',
                            ]) !!}
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="date_reported">Date Reported</label>
                            {!! Form::text('date_reported', $date_reported, [
                                'placeholder' => 'Enter  Date',
                                'class' => '  form-control '.$date_reported_class.'',
                                'id' => 'date_reported',
                            ]) !!}
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="region">Time Reported</label>
                            {!! Form::text('time_reported', null, [
                                'placeholder' => 'Enter  Time',
                                'class' => '  form-control flatpickr-time text-start',
                                'id' => 'time_reported fp-time',
                                'style' => 'height:100%',
                            ]) !!}
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Case Position</label>
                                {!! Form::select(
                                    'case_position',
                                    ['PUI' => 'PUI', 'PAKA' => 'PAKA', 'PBC' => 'PBC', 'FINALIZED' => 'FINALIZED'],
                                    null,
                                    [
                                        'placeholder' => '-- Enter Position --',
                                        'class' => ' select2 form-control',
                                        'id' => 'case_position',
                                        'required' => 'required',
                                    ],
                                ) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="motive">Motive</label>
                                {!! Form::select('motive', ['NORMAL' => 'NORMAL', 'POLITICAL' => 'POLITICAL'], null, [
                                    'placeholder' => '-- Enter Motive --',
                                    'class' => ' select2 form-control',
                                    'id' => 'motive',
                                    'required' => 'required',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="full-editor">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">Description</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="full-wrapper">
                                <div id="full-container">
                                    <div class="editor" style="min-height: 300px; ">
                                        {!! $decription !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::hidden('description', null, ['class' => '  form-control', 'id' => 'editorContent']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-----Breefing Report report--->
<section id="floating-label-input-new" class="{{ $breifing_report_hide }} breifing_report">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">CHECK TO ADD ITEM</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="demo-inline-spacing">
                            <div class="col-xl-4 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('addincident', 'addincident', $addincident, [
                                        'class' => 'form-check-input',
                                        'id' => 'addincident',
                                    ]) !!}
                                    <label class="form-check-label" for="addincident">Add Incident/Crime
                                        Continued</label>
                                </div>
                            </div>
                            <div class="col-xl-4 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('gangfirearm', 'gangfirearm', $gangfirearm, [
                                        'class' => 'form-check-input',
                                        'id' => 'gangfirearm',
                                    ]) !!}
                                    <label class="form-check-label" for="gangfirearm">Add Gang Firearm</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-----Special report--->
<section id="floating-label-input " class="{{ $special_report_hide }} special_report">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">Special Report</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="demo-inline-spacing">
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'gambling', $gambling, [
                                        'class' => ' checkbox form-check-input',
                                        'id' => 'gambling',
                                        'data-target' => 'gambling-input',
                                    ]) !!}
                                    <label class="form-check-label" for="gambling">Gambling</label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'mob_injustice', $mob_injustice, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'mob_injustice',
                                        'data-target' => 'mobinjustice-input',
                                    ]) !!}
                                    <label class="form-check-label" for="mob_injustice">Mob Injustice</label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'money_matters', $money_matters, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'money_matters',
                                        'data-target' => 'moneymatters-input',
                                    ]) !!}
                                    <label class="form-check-label" for="money_matters">Money Matters</label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'arrest_of_foreigners', $arrest_of_foreigners, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'arrest_of_foreigners',
                                        'data-target' => 'arrestoffeoreigners-input',
                                    ]) !!}
                                    <label class="form-check-label" for="arrest_of_foreigners">Arrest
                                        of Foreigners</label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'criminal_gang', $criminal_gang, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'criminal_gang',
                                        'data-target' => 'criminalgang-input',
                                    ]) !!}
                                    <label class="form-check-label" for="criminal_gang">Criminal Gang
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="demo-inline-spacing">
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'police_officers', $police_officers, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'police_officers',
                                        'data-target' => 'policeofficers-input',
                                    ]) !!}
                                    <label class="form-check-label" for="police_officers">Police Officer
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'school', $school, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'school',
                                        'data-target' => 'school-input',
                                    ]) !!}
                                    <label class="form-check-label" for="school">School
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'illicitbrew', $illicitbrew, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'illicitbrew',
                                        'data-target' => 'illicitbrew-input',
                                    ]) !!}
                                    <label class="form-check-label" for="illicitbrew">Illicit Brew
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'terrorism', $terrorism, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'terrorism',
                                        'data-target' => 'terrorism-input',
                                    ]) !!}
                                    <label class="form-check-label" for="terrorism">Terrorism
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'boarder', $boarder, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'boarder',
                                        'data-target' => 'boarder-input',
                                    ]) !!}
                                    <label class="form-check-label" for="boarder">Boarder
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="demo-inline-spacing">
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'contraband', $contraband, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'contraband',
                                        'data-target' => 'contraband-input',
                                    ]) !!}
                                    <label class="form-check-label" for="contraband">Contraband
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'cattle_rustling', $cattle_rustling, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'cattle_rustling',
                                        'data-target' => 'cattlerustling-input',
                                    ]) !!}
                                    <label class="form-check-label" for="cattle_rustling">Cattle Russtling
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'ethnic_clashes', $ethnic_clashes, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'ethnic_clashes',
                                        'data-target' => 'ethnicclashes-input',
                                    ]) !!}
                                    <label class="form-check-label" for="ethnic_clashes">Ethnic Clashes
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'stock_theft', $stock_theft, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'stock_theft',
                                        'data-target' => 'stocktheft-input',
                                    ]) !!}
                                    <label class="form-check-label" for="stock_theft">Stock Theft
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 nNnncNnol-md-6 col-12">
                                <div class="form-check form-check-inline">
                                    {!! Form::checkbox('special_check', 'alien', $alien, [
                                        'class' => 'checkbox form-check-input',
                                        'id' => 'alien',
                                        'data-target' => 'alien-input',
                                    ]) !!}
                                    <label class="form-check-label" for="alien">Alien</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Inputs end -->
<!-- Addincidence Sizing start -->
@include('incidences.sections.addincident')
<!-- Addincidence  end -->
<!-- Gangfirearm Sizing start -->
@include('incidences.sections.gangfirearm')
<!-- Gangfirearm  end -->
<!-- Gambling Sizing start -->
@include('incidences.sections.gambling')
<!-- Gambling  end -->
<!-- Mob Injustice  start -->
@include('incidences.sections.mobinjustice')
<!-- Mob Injustice  end -->
<!-- Money Matters -->
@include('incidences.sections.moneymatters')
<!--  End Money Matters  -->
<!--Arrest of foreigners start -->
@include('incidences.sections.arrestofforeigners')
<!-- Arrest of foreigners end -->
<!--  Criminal Gang  -->
@include('incidences.sections.criminalgang')
<!-- Criminal Gang end -->
<!-- Policeofficers start -->
@include('incidences.sections.policeofficers')
<!-- Policeofficers end -->
<!-- School Unrest start -->
@include('incidences.sections.school')
<!-- School Unrest  end -->
<!--  Widlife   -->
@include('incidences.sections.wildlife')
<!-- Widlife Gang end -->
<!--  Illicitbrew   -->
@include('incidences.sections.illicitbrew')
<!-- Illicitbrew  end -->
<!--  Terrorism   -->
@include('incidences.sections.terrorism')
<!-- Terrorism end -->
<!--  Borader   -->
@include('incidences.sections.boarder')
<!-- Borader end -->
<!-- Contraband -->
@include('incidences.sections.contraband')
<!-- Contraband end -->
<!-- Cattlerastling -->
@include('incidences.sections.cattlerastling')
<!-- Cattlerastling end -->
<!-- Ethnic Clashes -->
@include('incidences.sections.ethnicclashes')
<!-- Ethnic Clashes end -->
<!-- Stock Theft Clashes -->
@include('incidences.sections.stocktheft')
<!-- Stock Theft end -->
<!-- Alians  -->
@include('incidences.sections.alien')

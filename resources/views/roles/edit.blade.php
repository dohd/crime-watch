<div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
    <div class="modal-content">
        <div class="modal-header bg-transparent">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-5 pb-5">
            <div class="text-center mb-4">
                <h1 class="role-title">Add New Role</h1>
                <p>Set role permissions</p>
            </div>
            <!-- Add role form -->
            {{ Form::model($role_permissions, ['route' => ['roles.update', $role_permissions], 'class' => 'role admin-add-new-rol', 'role' => 'form', 'method' => 'PUT', 'id' => 'update_record_form']) }}

@php
             $briefing_incident=false;
             $gambling=false;
             $mob_injustice=false;
             $boarder=false;
             $money_matters=false;
             $criminal_gang=false;
             $school_unrest=false;
             $illicit_brew=false;
             $car_jacking=false;
             $terrorism=false;
             $arrest_of_foreigners=false;
             $contraband=false;
             $cattle_rustling=false;
             $stock_theft=false;
             $ethnic_clashes=false;
             $alien=false;
             $human_trafficking=false;
             $reports_special_report=false;
             $daily_incident_create=false;
             $daily_incident_edit=false;
             $daily_incident_delete=false;
             $traffic_incident_create = false;
             $traffic_incident_edit = false;
             $traffic_incident_delete = false;
             $drug_incident_create=false;
             $drug_incident_edit=false;
             $drug_incident_delete=false;
             $sgbv_incident_create=false;
             $sgbv_incident_edit=false;
             $sgbv_incident_delete=false;
             $wildlife_incident_create = false;
             $wildlife_incident_edit = false;
             $wildlife_incident_delete = false;
             $settings_region_create = false;
             $settings_region_edit = false;
             $settings_region_delete = false;
             $settings_division_create = false;
             $settings_division_edit = false;
             $settings_division_delete = false;
             $settings_station_create=false;
             $settings_station_edit=false;
             $settings_station_delete=false;
             $settings_police_base_create=false;
             $settings_police_base_edit=false;
             $settings_police_base_delete=false;
             $settings_crime_category_create=false;
             $settings_crime_category_edit=false;
             $settings_crime_category_delete=false;
             $settings_incident_file_create=false;
             $settings_incident_file_edit=false;
             $settings_incident_file_delete=false;
             $settings_crime_source_create=false;
             $settings_crime_source_edit=false;
             $settings_crime_source_delete=false;
             $settings_users_create=false;
             $settings_users_edit=false;
             $settings_users_delete=false;
         
    foreach ($role_permissions->permissions as $permission) {
        switch ($permission->name) {
            case 'briefing-incident':
                $briefing_incident = true;
                break;
                case 'gambling':
                $gambling = true;
                break;  
                case 'mob-injustice':
                $mob_injustice = true;
                break; 
                case 'boarder':
                $boarder = true;
                break;  
                case 'money-matters':
                $money_matters = true;
                break;  
                case 'criminal-gang':
                $criminal_gang = true;
                break;  
                case 'police-officer':
                $police_officer = true;
                break;  
                case 'school-unrest':
                $school_unrest = true;
                break;  
                case 'illicit-brew':
                $illicit_brew = true;
                break;  
                case 'car-jacking':
                $car_jacking = true;
                break;  
                case 'terrorism':
                $terrorism = true;
                break;  
                case 'arrest-of-foreigners':
                $arrest_of_foreigners = true;
                break;  
                case 'contraband':
                $contraband = true;
                break;  
                case 'cattle-rustling':
                $cattle_rustling = true;
                break;  
                case 'stock-theft':
                $stock_theft = true;
                break;  
                case 'ethnic-clashes':
                $ethnic_clashes = true;
                break;  
                case 'alien':
                $alien = true;
                break;  
                case 'human-trafficking':
                $human_trafficking = true;
                break;  
                case 'kidnapping':
                $kidnapping = true;
                break;  
                case 'reports-briefing':
                $reports_briefing = true;
                break;  
                case 'reports-special-report':
                $reports_special_report = true;
                break;
                case 'daily-incident-create':
                $daily_incident_create = true;
                break; 
                case 'daily-incident-edit':
                $daily_incident_edit = true;
                break; 
                case 'daily-incident-delete':
                $daily_incident_delete = true;
                break; 
                case 'traffic-incident-create':
                $traffic_incident_create = true;
                break;  
                case 'traffic-incident-edit':
                $traffic_incident_edit = true;
                break; 
                case 'traffic-incident-delete':
                $traffic_incident_delete = true;
                break; 
                case 'drug-incident-create':
                $drug_incident_create = true;
                break; 
                case 'drug-incident-edit':
                $drug_incident_edit = true;
                break; 
                case 'drug-incident-delete':
                $drug_incident_delete = true;
                break; 
                case 'sgbv-incident-create':
                $sgbv_incident_create = true;
                break;
                case 'sgbv-incident-edit':
                $sgbv_incident_edit = true;
                break;
                case 'sgbv-incident-delete':
                $sgbv_incident_delete = true;
                break;
                case 'wildlife-incident-create':
                $wildlife_incident_create = true;
                break; 
                case 'wildlife-incident-edit':
                $wildlife_incident_edit = true;
                break; 
                case 'wildlife-incident-delete':
                $wildlife_incident_delete = true;
                break; 
                case 'settings-region-create':
                $settings_region_create = true;
                break; 
                case 'settings-region-edit':
                $settings_region_edit = true;
                break; 
                case 'settings-region-delete':
                $settings_region_delete = true;
                break; 
                case 'settings-division-create':
                $settings_division_create = true;
                break; 
                case 'settings-division-edit':
                $settings_division_edit = true;
                break; 
                case 'settings-division-delete':
                $settings_division_delete = true;
                break; 
                case 'settings-station-create':
                $settings_station_create = true;
                break; 
                case 'settings-station-edit':
                $settings_station_edit = true;
                break; 
                case 'settings-station-delete':
                $settings_station_delete = true;
                break; 
                case 'settings-police-base-create':
                $settings_police_base_create = true;
                break; 
                case 'settings-police-base-edit':
                $settings_police_base_edit = true;
                break; 
                case 'settings-police-base-delete':
                $settings_police_base_delete = true;
                break; 
                case 'settings-crime-category-create':
                $settings_crime_category_create = true;
                break; 
                case 'settings-crime-category-edit':
                $settings_crime_category_edit = true;
                break; 
                case 'settings-crime-category-delete':
                $settings_crime_category_delete = true;
                break; 
                case 'settings-incident-file-create':
                $settings_incident_file_create = true;
                break; 
                case 'settings-incident-file-edit':
                $settings_incident_file_edit = true;
                break; 
                case 'settings-incident-file-delete':
                $settings_incident_file_delete = true;
                break; 
                case 'settings-crime-source-create':
                $settings_crime_source_create = true;
                break; 
                case 'settings-crime-source-edit':
                $settings_crime_source_edit = true;
                break; 
                case 'settings-crime-source-delete':
                $settings_crime_source_delete = true;
                break; 
                case 'settings-users-create':
                $settings_users_create = true;
                break; 
                case 'settings-users-edit':
                $settings_users_edit = true;
                break; 
                case 'settings-users-delete':
                $settings_users_delete = true;
                break; 
                

                  

        }
        # code...
    }


 
@endphp

             


                <div class="col-12">
                    <label class="form-label" for="modalRoleName">Role Name</label>
                    {!! Form::text('name',null,['placeholder' => 'Enter role name', 'class'=>'  form-control','id'=> 'modalRoleName','tabindex'=>'-1', 'data-msg'=>'Please enter role name']) !!}
                </div>
                <div class="col-12">
                    <h4 class="mt-2 pt-50">Role Permissions</h4>
                    <!-- Permission table -->
                    <div class="table-responsive">
                        <table class="table table-flush-spacing">
                       
                          
                            <tbody>
                                <tr>
                                    <td class="text-nowrap fw-bolder">
                                        Administrator Access
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system">
                                            <i data-feather="info"></i>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll" />
                                            <label class="form-check-label" for="selectAll"> Select All </label>
                                        </div>
                                    </td>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                             
                                <tr>
                                    <td class="text-nowrap fw-bolder">Incidences</td>
                                    <td>
                                       
                                        <div class="d-flex">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'briefing-incident',$briefing_incident ,
                                                [ 'class' => 'form-check-input', 'id'=>'briefingIncident']); !!}
                                                <label class="form-check-label pr-5" for="briefingIncident"> Briefing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </label>
                                            </div>
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'gambling', $gambling,
                                                [ 'class' => 'form-check-input', 'id'=>'gambling']); !!}
                                                <label class="form-check-label" for="Gambling"> Gambling </label>
                                            </div>
                                         
                                        </div>
                                   


                                  
                                        <div class="d-flex mt-2">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'mob-injustice', $mob_injustice,
                                                [ 'class' => 'form-check-input', 'id'=>'cmobinJusticeCreate']); !!}
                                                <label class="form-check-label" for="cmobinJusticeCreate"> Mob Injustice </label>
                                            </div>
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'money-matters', $money_matters,
                                                [ 'class' => 'form-check-input', 'id'=>'moneyMatters']); !!}
                                                <label class="form-check-label" for="moneyMattersCreate"> Money Matters </label>
                                            </div>
                                        
                                           
                                        </div>

                                        <div class="d-flex mt-2">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'boarder', $boarder,
                                                [ 'class' => 'form-check-input', 'id'=>'boarderCreate']); !!}
                                                <label class="form-check-label" for="boarderCreate"> Boarder&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                            </div>
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'criminal-gang', $criminal_gang,
                                                [ 'class' => 'form-check-input', 'id'=>'criminalGangCreate']); !!}
                                                <label class="form-check-label" for="criminalGangCreate"> Criminal Gang </label>
                                            </div>
                                        
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'police-officer', $police_officer,
                                                [ 'class' => 'form-check-input', 'id'=>'policeOfficerCreate']); !!}
                                                <label class="form-check-label" for="policeOfficerCreate"> Police Officer </label>
                                            </div>
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'school-unrest', $school_unrest,
                                                [ 'class' => 'form-check-input', 'id'=>'schoolUnrestCreate']); !!}
                                                <label class="form-check-label" for="schoolUnrestCreate"> School Unrest </label>
                                            </div>
                                         
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'illicit-brew', $illicit_brew,
                                                [ 'class' => 'form-check-input', 'id'=>'illicitBrewCreate']); !!}
                                                <label class="form-check-label" for="illicitBrewCreate"> Illicit Brew&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                            </div>
                                        
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'car-jacking', $car_jacking,
                                                [ 'class' => 'form-check-input', 'id'=>'carjackingCreate']); !!}
                                                <label class="form-check-label" for="carjackingCreate"> Car Jacking </label>
                                            </div>
                                         
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'terrorism', $terrorism,
                                                [ 'class' => 'form-check-input', 'id'=>'terrorismCreate']); !!}
                                                <label class="form-check-label" for="terrorismCreate"> Terrorism&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                            </div>
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'arrest-of-foreigners', $arrest_of_foreigners,
                                                [ 'class' => 'form-check-input', 'id'=>'arrestOfForeignersCreate']); !!}
                                                <label class="form-check-label" for="arrestOfForeignersCreate"> Arrest of Foreigners </label>
                                            </div>
                                            
                                          
                                          
                                        </div>

                                        <div class="d-flex mt-2">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'contraband', $contraband,
                                                [ 'class' => 'form-check-input', 'id'=>'contrabandCreate']); !!}
                                                <label class="form-check-label" for="contrabandCreate"> Contraband&nbsp;&nbsp;&nbsp;</label>
                                            </div>
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'cattle-rustling', $cattle_rustling,
                                                [ 'class' => 'form-check-input', 'id'=>'cattlerustlingCreate']); !!}
                                                <label class="form-check-label" for="cattlerustlingCreate"> Cattle Russtling </label>
                                            </div>
                                       
                                     
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'stock-theft', $stock_theft,
                                                [ 'class' => 'form-check-input', 'id'=>'stocktheftCreate']); !!}
                                                <label class="form-check-label" for="stocktheftCreate"> Stock Theft&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                            </div>
                                          
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'ethnic-clashes', $ethnic_clashes,
                                                [ 'class' => 'form-check-input', 'id'=>'ethnicclashesCreate']); !!}
                                                <label class="form-check-label" for="ethnicclashesCreate"> Ethnic Clashes </label>
                                            </div>
                                            
                                        </div>

                                        <div class="d-flex mt-2">
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'alien', $alien,
                                                [ 'class' => 'form-check-input', 'id'=>'alienCreate']); !!}
                                                <label class="form-check-label" for="alienCreate"> Alien&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            </div>
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'human-trafficking', $human_trafficking,
                                                [ 'class' => 'form-check-input', 'id'=>'humanTraffickingCreate']); !!}
                                                <label class="form-check-label" for="humanTraffickingCreate"> Human Trafficking </label>
                                            </div>
                                         
                                        </div>
                                        <div class="d-flex mt-2">
                                          
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'kidnapping', $kidnapping,
                                                [ 'class' => 'form-check-input', 'id'=>'kidnappingCreate']); !!}
                                                <label class="form-check-label" for="kidnappingCreate"> Kidnapping&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                            </div>
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'reports-briefing', $reports_briefing,
                                                [ 'class' => 'form-check-input', 'id'=>'briefingReport']); !!}
                                                <label class="form-check-label" for="briefingReport"> Briefing Report </label>
                                            </div>
                                    
                                        
                                        </div>

                                        <div class="d-flex mt-2">
                                          
                                            <div class="form-check me-6 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'reports-special-report', $reports_special_report,
                                                [ 'class' => 'form-check-input', 'id'=>'SpecualReport']); !!}
                                                <label class="form-check-label" for="SpecualReport"> Special Report </label>
                                            </div>
                                    
                                        
                                        </div>
                                   
                                    </td>
                             
                                </tr>
                          
                                <tr>
                                    <td class="text-nowrap fw-bolder">Daily Incidences</td>

                                    
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                
                                                {!! Form::checkbox('permissions[]', 'daily-incident-create', $daily_incident_create,
                                                [ 'class' => 'form-check-input', 'id'=>'dailyIncidentCreate']); !!}
                                                <label class="form-check-label" for="dailyIncidentCreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'daily-incident-edit', $daily_incident_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'dailyIncidentCreate']); !!}
                                                <label class="form-check-label" for="dailyIncidentCreate"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'daily-incident-delete', $daily_incident_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'dailyIncidentDelete']); !!}
                                                <label class="form-check-label" for="dailyIncidentDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                             
                           

                                <tr>
                                    <td class="text-nowrap fw-bolder">Traffic Incidences</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'traffic-incident-create', $traffic_incident_create,
                                                [ 'class' => 'form-check-input', 'id'=>'traffic-incident-create']); !!}
                                                <label class="form-check-label" for="trafficIncidentCreateCreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'traffic-incident-edit', $traffic_incident_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'trafficIncidentEditCreate']); !!}
                                                <label class="form-check-label" for="trafficIncidentEditCreate"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'traffic-incident-delete', $traffic_incident_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'trafficIncidentDeleteCreate']); !!}
                                                <label class="form-check-label" for="trafficIncidentDeleteCreate"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                 
                                <tr>
                                    <td class="text-nowrap fw-bolder">Drug Incidences</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'drug-incident-create', $drug_incident_create,
                                                [ 'class' => 'form-check-input', 'id'=>'drugIncidentEditcreate']); !!}
                                                <label class="form-check-label" for="drugIncidentEditcreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'drug-incident-edit', $drug_incident_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'drugIncidentEditEdit']); !!}
                                                <label class="form-check-label" for="drugIncidentEditEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'drug-incident-delete', $drug_incident_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'drugIncidentDelete']); !!}
                                                <label class="form-check-label" for="drugIncidentDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                     
                                         
                                <tr>
                                    <td class="text-nowrap fw-bolder">SGBV Incidences</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'sgbv-incident-create', $sgbv_incident_create,
                                                [ 'class' => 'form-check-input', 'id'=>'sgbvIncidentEditcreate']); !!}
                                                <label class="form-check-label" for="sgbvIncidentEditcreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'sgbv-incident-edit', $sgbv_incident_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'sgbvIncidentEditEdit']); !!}
                                                <label class="form-check-label" for="sgbvIncidentEditEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'sgbv-incident-delete', $sgbv_incident_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'drugIncidentDelete']); !!}
                                                <label class="form-check-label" for="drugIncidentDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Wildlife Incidences</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'wildlife-incident-create', $wildlife_incident_create,
                                                [ 'class' => 'form-check-input', 'id'=>'wildlifeIncidentEditcreate']); !!}
                                                <label class="form-check-label" for="wildlifeIncidentEditcreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'wildlife-incident-edit', $wildlife_incident_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'wildlifeIncidentEditEdit']); !!}
                                                <label class="form-check-label" for="wildlifeIncidentEditEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'wildlife-incident-delete', $wildlife_incident_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'wildlifeIncidentDelete']); !!}
                                                <label class="form-check-label" for="wildlifeIncidentDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Regions</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-region-create', $settings_region_create,
                                                [ 'class' => 'form-check-input', 'id'=>'regioncreate']); !!}
                                                <label class="form-check-label" for="regioncreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-region-edit', $settings_region_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'regionEdit']); !!}
                                                <label class="form-check-label" for="regionEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-region-delete', $settings_region_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'regionDelete']); !!}
                                                <label class="form-check-label" for="regionDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Division</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-division-create', $settings_division_create,
                                                [ 'class' => 'form-check-input', 'id'=>'divisioncreate']); !!}
                                                <label class="form-check-label" for="divisioncreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-division-edit', $settings_division_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'divisionEdit']); !!}
                                                <label class="form-check-label" for="divisionEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-division-delete', $settings_division_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'divisionDelete']); !!}
                                                <label class="form-check-label" for="divisionDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Station</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-station-create', $settings_station_create,
                                                [ 'class' => 'form-check-input', 'id'=>'stationcreate']); !!}
                                                <label class="form-check-label" for="stationcreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-station-edit', $settings_station_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'stationEdit']); !!}
                                                <label class="form-check-label" for="stationEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-station-delete', $settings_station_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'stationDelete']); !!}
                                                <label class="form-check-label" for="stationDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Police Base</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-police-base-create', $settings_police_base_create,
                                                [ 'class' => 'form-check-input', 'id'=>'policeBasecreate']); !!}
                                                <label class="form-check-label" for="policeBasecreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-police-base-edit', $settings_police_base_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'policeBaseEdit']); !!}
                                                <label class="form-check-label" for="policeBaseEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-police-base-delete', $settings_police_base_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'policeBaseDelete']); !!}
                                                <label class="form-check-label" for="policeBaseDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Crime Category</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-crime-category-create', $settings_crime_category_create,
                                                [ 'class' => 'form-check-input', 'id'=>'crimeCategorycreate']); !!}
                                                <label class="form-check-label" for="crimeCategorycreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-crime-category-edit', $settings_crime_category_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'crimeCategoryEdit']); !!}
                                                <label class="form-check-label" for="crimeCategoryEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-crime-category-delete', $settings_crime_category_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'crimeCategoryDelete']); !!}
                                                <label class="form-check-label" for="crimeCategoryDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Incident File</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-incident-file-create', $settings_incident_file_create,
                                                [ 'class' => 'form-check-input', 'id'=>'incidentFileCreate']); !!}
                                                <label class="form-check-label" for="incidentFileCreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-incident-file-edit', $settings_incident_file_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'incidentFileEdit']); !!}
                                                <label class="form-check-label" for="incidentFileEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-incident-file-delete', $settings_incident_file_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'incidentFileDelete']); !!}
                                                <label class="form-check-label" for="incidentFileDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Crime Source</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-crime-source-create', $settings_crime_source_create,
                                                [ 'class' => 'form-check-input', 'id'=>'crimeSourseCreate']); !!}
                                                <label class="form-check-label" for="crimeSourseCreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-crime-source-edit', $settings_crime_source_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'crimeSourseEdit']); !!}
                                                <label class="form-check-label" for="crimeSourseEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-crime-source-delete', $settings_crime_source_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'crimeSourseDelete']); !!}
                                                <label class="form-check-label" for="crimeSourseDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                                <tr>
                                    <td class="text-nowrap fw-bolder">Users</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-users-create', $settings_users_create,
                                                [ 'class' => 'form-check-input', 'id'=>'usersCreate']); !!}
                                                <label class="form-check-label" for="usersCreate"> Create </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-users-edit', $settings_users_edit,
                                                [ 'class' => 'form-check-input', 'id'=>'usersEdit']); !!}
                                                <label class="form-check-label" for="usersEdit"> Edit </label>
                                            </div>
                                            <div class="form-check me-4 me-lg-5">
                                                {!! Form::checkbox('permissions[]', 'settings-users-delete', $settings_users_delete,
                                                [ 'class' => 'form-check-input', 'id'=>'usersDelete']); !!}
                                                <label class="form-check-label" for="usersDelete"> Delete </label>
                                            </div>
                                        </div>
                                    </td>
                             
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Permission table -->
                </div>
                <div class="col-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Discard
                    </button>
                </div>
                {!! Form::close() !!}
            <!--/ Add role form -->
        </div>
    </div>
</div>
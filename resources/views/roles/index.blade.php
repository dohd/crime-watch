@extends('layouts.app')
@section('title', 'Roles & Permissions')
<style>
.hide{
	display: none;
}
</style>

@section('content')
<!-- BEGIN: Content-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
        <div class="content-body">
            <h3>Roles List</h3>
            <p class="mb-2">
                A role provided access to predefined menus and features so that depending <br />
                on assigned role an administrator can have access to what he need
            </p>

            <!-- Role cards -->
          
            <div class="row">

                @foreach ($role_permissions as $permission )
                
              


                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <span>Total {{ count($permission->users) }} user(s)</span>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    @foreach ($permission->users as $user )
                                    @php
                                    $image = asset('upload/'.$user->icon);
                                  
                                   
                               @endphp
                                        
                                  
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $user->name }}" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="{{ !empty($user->icon ) ? $image : asset('upload/profile_image.png')}}" alt="Avatar" />
                                    </li>
                                    @endforeach
                                  
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                <div class="role-heading">
                                    <h4 class="fw-bolder">{{ $permission->name }}</h4>
                                    <a href="javascript:;" class="role-edit-modal" data-href="{{ route('roles.edit', [$permission->id]) }}"  data-id="{{ $permission->id }}">
                                        <small class="fw-bolder">Edit Role</small>
                                    </a>
                                </div>
                                <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


          
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="d-flex align-items-end justify-content-center h-100">
                                    <img src="{{ asset('app-assets/images/illustration/faq-illustrations.svg') }}" class="img-fluid mt-2" alt="Image" width="85" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body text-sm-end text-center ps-sm-0">
                                    <a href="javascript:void(0)" data-bs-target="#addRoleModal" data-bs-toggle="modal" class="stretched-link text-nowrap add-new-role">
                                        <span class="btn btn-primary mb-1">Add New Role</span>
                                    </a>
                                    <p class="mb-0">Add role, if it does not exist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Role cards -->

            <h3 class="mt-50">Total users with their roles</h3>
            <p class="mb-2">Find all of your company’s administrator accounts and their associate roles.</p>
            <!-- table -->
            <div class="card">
                <div class="table-responsive">
                    <table class="user-list-table table">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Plan</th>
                                <th>Billing</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- table -->
            <!-- Add Role Modal -->
            <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
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
                           

                                {!! Form::open([
                                    'route' => 'roles.store',
                                    'method' => 'post',
                                    'class' => 'role admin-add-new-role',
                                    'id' => 'addRoleForm',
                                ]) !!}


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
                                                                {!! Form::checkbox('permissions[]', 'briefing-incident', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'briefingIncident']); !!}
                                                                <label class="form-check-label pr-5" for="briefingIncident"> Briefing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </label>
                                                            </div>
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'gambling', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'gambling']); !!}
                                                                <label class="form-check-label" for="Gambling"> Gambling </label>
                                                            </div>
                                                         
                                                        </div>
                                                   


                                                  
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'mob-injustice', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'cmobinJusticeCreate']); !!}
                                                                <label class="form-check-label" for="cmobinJusticeCreate"> Mob Injustice </label>
                                                            </div>
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'money-matters', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'moneyMatters']); !!}
                                                                <label class="form-check-label" for="moneyMattersCreate"> Money Matters </label>
                                                            </div>
                                                        
                                                           
                                                        </div>

                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'boarder', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'boarderCreate']); !!}
                                                                <label class="form-check-label" for="boarderCreate"> Boarder&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                            </div>
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'criminal-gang', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'criminalGangCreate']); !!}
                                                                <label class="form-check-label" for="criminalGangCreate"> Criminal Gang </label>
                                                            </div>
                                                        
                                                        </div>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'police-officer', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'policeOfficerCreate']); !!}
                                                                <label class="form-check-label" for="policeOfficerCreate"> Police Officer </label>
                                                            </div>
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'school-unrest', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'schoolUnrestCreate']); !!}
                                                                <label class="form-check-label" for="schoolUnrestCreate"> School Unrest </label>
                                                            </div>
                                                         
                                                        </div>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'illicit-brew', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'illicitBrewCreate']); !!}
                                                                <label class="form-check-label" for="illicitBrewCreate"> Illicit Brew&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                            </div>
                                                        
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'car-jacking', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'carjackingCreate']); !!}
                                                                <label class="form-check-label" for="carjackingCreate"> Car Jacking </label>
                                                            </div>
                                                         
                                                        </div>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'terrorism', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'terrorismCreate']); !!}
                                                                <label class="form-check-label" for="terrorismCreate"> Terrorism&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                            </div>
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'arrest-of-foreigners', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'arrestOfForeignersCreate']); !!}
                                                                <label class="form-check-label" for="arrestOfForeignersCreate"> Arrest of Foreigners </label>
                                                            </div>
                                                            
                                                          
                                                          
                                                        </div>

                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'contraband', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'contrabandCreate']); !!}
                                                                <label class="form-check-label" for="contrabandCreate"> Contraband&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'cattle-rustling', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'cattlerustlingCreate']); !!}
                                                                <label class="form-check-label" for="cattlerustlingCreate"> Cattle Russtling </label>
                                                            </div>
                                                       
                                                     
                                                        </div>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'stock-theft', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'stocktheftCreate']); !!}
                                                                <label class="form-check-label" for="stocktheftCreate"> Stock Theft&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                            </div>
                                                          
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'ethnic-clashes', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'ethnicclashesCreate']); !!}
                                                                <label class="form-check-label" for="ethnicclashesCreate"> Ethnic Clashes </label>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'alien', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'alienCreate']); !!}
                                                                <label class="form-check-label" for="alienCreate"> Alien&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'human-trafficking', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'humanTraffickingCreate']); !!}
                                                                <label class="form-check-label" for="humanTraffickingCreate"> Human Trafficking </label>
                                                            </div>
                                                         
                                                        </div>
                                                        <div class="d-flex mt-2">
                                                          
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'kidnapping', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'kidnappingCreate']); !!}
                                                                <label class="form-check-label" for="kidnappingCreate"> Kidnapping&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                            </div>
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'reports-briefing', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'briefingReport']); !!}
                                                                <label class="form-check-label" for="briefingReport"> Briefing Report </label>
                                                            </div>
                                                    
                                                        
                                                        </div>

                                                        <div class="d-flex mt-2">
                                                          
                                                            <div class="form-check me-6 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'reports-special-report', false,
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
                                                                
                                                                {!! Form::checkbox('permissions[]', 'daily-incident-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'dailyIncidentCreate']); !!}
                                                                <label class="form-check-label" for="dailyIncidentCreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'daily-incident-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'dailyIncidentCreate']); !!}
                                                                <label class="form-check-label" for="dailyIncidentCreate"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'daily-incident-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'traffic-incident-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'traffic-incident-create']); !!}
                                                                <label class="form-check-label" for="trafficIncidentCreateCreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'traffic-incident-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'trafficIncidentEditCreate']); !!}
                                                                <label class="form-check-label" for="trafficIncidentEditCreate"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'traffic-incident-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'drug-incident-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'drugIncidentEditcreate']); !!}
                                                                <label class="form-check-label" for="drugIncidentEditcreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'drug-incident-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'drugIncidentEditEdit']); !!}
                                                                <label class="form-check-label" for="drugIncidentEditEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'drug-incident-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'sgbv-incident-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'sgbvIncidentEditcreate']); !!}
                                                                <label class="form-check-label" for="sgbvIncidentEditcreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'sgbv-incident-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'sgbvIncidentEditEdit']); !!}
                                                                <label class="form-check-label" for="sgbvIncidentEditEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'sgbv-incident-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'wildlife-incident-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'wildlifeIncidentEditcreate']); !!}
                                                                <label class="form-check-label" for="wildlifeIncidentEditcreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'wildlife-incident-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'wildlifeIncidentEditEdit']); !!}
                                                                <label class="form-check-label" for="wildlifeIncidentEditEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'wildlife-incident-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'settings-region-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'regioncreate']); !!}
                                                                <label class="form-check-label" for="regioncreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-region-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'regionEdit']); !!}
                                                                <label class="form-check-label" for="regionEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-region-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'settings-division-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'divisioncreate']); !!}
                                                                <label class="form-check-label" for="divisioncreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-division-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'divisionEdit']); !!}
                                                                <label class="form-check-label" for="divisionEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-division-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'settings-station-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'stationcreate']); !!}
                                                                <label class="form-check-label" for="stationcreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-station-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'stationEdit']); !!}
                                                                <label class="form-check-label" for="stationEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-station-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'settings-police-base-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'policeBasecreate']); !!}
                                                                <label class="form-check-label" for="policeBasecreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-police-base-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'policeBaseEdit']); !!}
                                                                <label class="form-check-label" for="policeBaseEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-police-base-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'settings-crime-category-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'crimeCategorycreate']); !!}
                                                                <label class="form-check-label" for="crimeCategorycreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-crime-category-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'crimeCategoryEdit']); !!}
                                                                <label class="form-check-label" for="crimeCategoryEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-crime-category-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'settings-incident-file-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'incidentFileCreate']); !!}
                                                                <label class="form-check-label" for="incidentFileCreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-incident-file-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'incidentFileEdit']); !!}
                                                                <label class="form-check-label" for="incidentFileEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-incident-file-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'settings-crime-source-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'crimeSourseCreate']); !!}
                                                                <label class="form-check-label" for="crimeSourseCreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-crime-source-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'crimeSourseEdit']); !!}
                                                                <label class="form-check-label" for="crimeSourseEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-crime-source-delete', false,
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
                                                                {!! Form::checkbox('permissions[]', 'settings-users-create', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'usersCreate']); !!}
                                                                <label class="form-check-label" for="usersCreate"> Create </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-users-edit', false,
                                                                [ 'class' => 'form-check-input', 'id'=>'usersEdit']); !!}
                                                                <label class="form-check-label" for="usersEdit"> Edit </label>
                                                            </div>
                                                            <div class="form-check me-4 me-lg-5">
                                                                {!! Form::checkbox('permissions[]', 'settings-users-delete', false,
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
            </div>
            <!--/ Add Role Modal -->

                <!--/ Edit Role Modal -->
            <div class="modal fade editmodal" tabindex="-1" aria-hidden="true">
                
            </div>

             <!--/ Edit Role Modal -->

        </div>
    </div>
<!-- END: Content-->
@endsection
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
@endsection
@section('after-styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css') }}">
@endsection

@section('vendor-script')
<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection


@section('after-scripts')
   <!-- BEGIN: Page Vendor JS-->
   <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
   <script src="{{asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
   <script src="{{ asset('app-assets/js/scripts/pages/tender-create.js') }}"></script>
   <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

   <!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->



<!-- END: Page JS-->

<script>
$(function () {
  ('use strict');

  var dtUserTable = $('.user-list-table'),
    newUserSidebar = $('.new-crimecategory-modal'),
    newUserForm = $('.admin-add-new-role'),
    select = $('.select2'),
    dtContact = $('.dt-contact'),
    assetPath = $('body').attr('data-asset-path');
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      // the following code is used to disable x-scrollbar when click in select input and
      // take 100% width in responsive also
      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    });
  });
  // Users List datatable
  // Users List datatable
  if (dtUserTable.length) {
    dtUserTable.DataTable({
    ajax: "{{ route('crimecategory.index') }}", // JSON file to add data
      columns: [
        // columns according to JSON
        { data: 'name' },
        { data: '' }
      ],
      columnDefs: [
     
     
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="btn-group">' +
              '<a class=" btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              '<a href="javascript:;" data-href="crimecategory/'+full['id']+'/edit" class="edit-crimecategory dropdown-item">' +
              feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
              'Edit</a>' +
              '<a href="javascript:;" data-href="crimecategory/'+full['id']+'" class="delete-crimecategory dropdown-item delete-record">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
              'Delete</a></div>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[1, 'desc']],
      dom:
        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
        '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle me-2',
          text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4, 5] }
            }
          ],
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
            $(node).parent().removeClass('btn-group');
            setTimeout(function () {
              $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
            }, 50);
          }
        },
        {
          text: 'Add New Category',
          className: 'add-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ],
  
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(0)
          .every(function () {
            var column = this;
            var label = $('<label class="form-label" for="UserRole">Category</label>').appendTo('.user_role');
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Category </option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
        // Adding plan filter once table initialized
     

      }
    });
  }



  
  
  $("#spinner").hide();
  // Form Validation
  if (newUserForm.length) {
    newUserForm.validate({
      errorClass: 'error',
      rules: {
        'name': {
          required: true
        }
        
      }
    });

    newUserForm.on('submit', function (e) {
      var isValid = newUserForm.valid();
      e.preventDefault();
      if (isValid) {
        var data = $(this).serialize();
        $("#spinner").show();
        $("#submit-data").hide();
        $.ajax({
          method: "post",
          url: $(this).attr("action"),
          data:  new FormData(this),
         contentType: false,
         cache: false,
         processData:false,
          success:function(result){
              if(result.success == true){

                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: result.msg,
                  showConfirmButton: false,
                  timer: 1500,
                  customClass: {
                    confirmButton: 'btn btn-primary'
                  },
                  buttonsStyling: false
                });
             

                location.reload();
              }else{
                   $("#submit-data").show();
                   $("#spinner").hide();

                 
                    Swal.fire({
                      position: 'top-end',
                      title: 'Error!',
                      text: result.msg,
                      icon: 'error',
                      customClass: {
                        confirmButton: 'btn btn-primary'
                      },
                      buttonsStyling: false
                    });
                 
              }
          }
      });



    
    
        newUserSidebar.modal('hide');
      }
    });
  }



  // Phone Number
  if (dtContact.length) {
    dtContact.each(function () {
      new Cleave($(this), {
        phone: true,
        phoneRegionCode: 'US'
      });
    });
  }
});
$(document).on('click', '.edit-crimecategory', function() {
   // alert($(this).data('href'));

           
           $('div.editCrimeCategoryModal').load($(this).data('href'), function() {
               $(this).modal('show');
        
               $('form#edit_crimecategory').submit(function(e) {
                   e.preventDefault();
                   $(this)
                       .find('button[type="submit"]')
                       .attr('disabled', true);
                   //var data = $(this).serialize();
   
                   $.ajax({
                       method: 'POST',
                       url: $(this).attr('action'),
                       data: new FormData(this),
                       contentType: false,
                  cache: false,
                  processData:false,
                       success: function(result) {
                           if (result.success == true) {
                               $('div.editCrimeCategoryModal').modal('hide');
                               Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: result.msg,
                     showConfirmButton: false,
                     timer: 1500,
                     customClass: {
                       confirmButton: 'btn btn-primary'
                     },
                     buttonsStyling: false
                   });
                
   
                      location.reload();
                           } else {
                               $(this)
                       .find('button[type="submit"]')
                       .attr('disabled', false);
                               Swal.fire({
                         position: 'top-end',
                         title: 'Error!',
                         text: result.msg,
                         icon: 'error',
                         customClass: {
                           confirmButton: 'btn btn-primary'
                         },
                         buttonsStyling: false
                       });
                           }
                       },
                   });
               });
   
         
   
   
           });
       });
       $(document).on('click', '.delete-crimecategory', function(e) {
                e.preventDefault();
                Swal.fire({
                    type: 'warning',
                  title: "Are You Sure",
                  showCancelButton: true,
                  buttons: true,
                  dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete.value) {
                        var href = $(this).data('href');
                        $.ajax({
                            method: "DELETE",
                            url: href,
                            dataType: "json",
                              data:{
       
                             '_token': '{{ csrf_token() }}',
                                   },
                            success: function(result){
                                if(result.success == true){
                                    toastr.success(result.msg);
                                    location.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }else{

                      Swal.fire('Crime Category not deleted', '', 'info')
                    }
                });
            });
  // Select All checkbox click
  const selectAll = document.querySelector('#selectAll'),
    checkboxList = document.querySelectorAll('[type="checkbox"]');
  selectAll.addEventListener('change', t => {
    checkboxList.forEach(e => {
      e.checked = t.target.checked;
    });
  });


  $(document).on('click', 'a.role-edit-modal', function() {
   
           
           $('div.editmodal').load($(this).data('href'), function() {
               $(this).modal('show');
   
               $('form#update_record_form').submit(function(e) {
                   e.preventDefault();
                   $(this)
                       .find('button[type="submit"]')
                       .attr('disabled', true);
                   //var data = $(this).serialize();
   
                   $.ajax({
                       method: 'POST',
                       url: $(this).attr('action'),
                       data: new FormData(this),
                       contentType: false,
                  cache: false,
                  processData:false,
                       success: function(result) {
                           if (result.success == true) {
                               $('div.editmodal').modal('hide');
                               Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: result.msg,
                     showConfirmButton: false,
                     timer: 1500,
                     customClass: {
                       confirmButton: 'btn btn-primary'
                     },
                     buttonsStyling: false
                   });
                
   
                      location.reload();
                           } else {
                               $(this)
                       .find('button[type="submit"]')
                       .attr('disabled', false);
                               Swal.fire({
                         position: 'top-end',
                         title: 'Error!',
                         text: result.msg,
                         icon: 'error',
                         customClass: {
                           confirmButton: 'btn btn-primary'
                         },
                         buttonsStyling: false
                       });
                           }
                       },
                   });
               });
   
         
   
   
           });
       });
</script>
@endsection
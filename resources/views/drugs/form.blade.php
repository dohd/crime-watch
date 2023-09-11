<section class="form-control-repeater">
    <div class="row">
        <!-- Drugs repeater -->
        @php
        $date_commited = isset($drugincidences) ? dateFormat($drugincidences->date_commited) : null;
        $date_commited_class = isset($drugincidences) ? 'flatpickr-basic-blank' : 'flatpickr-basic';
    @endphp
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Drugs</h4>
                    <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                        <label class="form-label" for="region">Date</label>
                        {!! Form::text('date_commited',$date_commited,['placeholder' => 'Enter  No', 'class'=>'  form-control '.$date_commited_class.' ','id'=> 'date_commited','required'=>'required']) !!}
                    </div>
                </div>
                <div class="card-body">
                      <div class="drugs-repeater">
                        <div data-repeater-list="drugs">
                            @if (isset($drugincidences) )
                           
                        @foreach ($drugincidences->drugIncidenceItems as $items )
        
  

                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="county">County</label>
                                            {!! Form::select('county_id',$counties,$items->county_id,['placeholder' => '-- Select County --', 'class'=>' select2 form-control','aria-describedby'=>'county','required'=>'required']) !!}

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="incident_file_id">Offense</label>
                                            {!! Form::select('incident_file_id',$offenses,$items->incident_file_id,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'incident_file_id','required'=>'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemquantity">Sex</label>
                                            {!! Form::select('sex',['M'=>'M','F'=>'F'],$items->sex,['placeholder' => '-- Select  --', 'class'=>'select2 form-control','aria-describedby'=>'sex','required'=>'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Age</label>
                                            {!! Form::text('age',$items->age,['placeholder' => 'Enter Age', 'class'=>'  form-control','id'=> 'qty','aria-describedby'=>'age','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Nationality</label>
                                           {!! Form::select('nationality',['KENYAN'=>'KENYAN','FOREIGNER'=>'FOREIGNER'],$items->nationality,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'nationality','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemquantity">Case Position</label>
                                            {!! Form::select('case_position',['PUI'=>'PUI','PAKA'=>'PAKA','PBC'=>'PBC','FINALIZED'=>'FINALIZED'],$items->case_position,['placeholder' => '-- Select  --', 'class'=>'select2 form-control','aria-describedby'=>'case_position','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="drug_type">Type Of Drug</label>
                                            {!! Form::select('drug_type_id',$drugtypes,$items->drug_type_id,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'drug_type_id','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="drug_packaging_id">Packaging</label>
                                            {!! Form::select('drug_packaging_id',$packagings,$items->drug_packaging_id,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'drug_packaging_id','required'=>'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Qty</label>
                                            {!! Form::number('qty',$items->qty,['placeholder' => 'Enter Qty', 'class'=>'  form-control','id'=> 'qty','aria-describedby'=>'qty']) !!}
                                        </div>
                                    </div>
                                   


                  

                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            @endforeach
                                
                            @else
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="county">County</label>
                                            {!! Form::select('county_id',$counties,null,['placeholder' => '-- Select County --', 'class'=>' select2 form-control','aria-describedby'=>'county','required'=>'required']) !!}

                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="incident_file_id">Offense</label>
                                            {!! Form::select('incident_file_id',$offenses,null,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'incident_file_id','required'=>'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemquantity">Sex</label>
                                            {!! Form::select('sex',['M'=>'M','F'=>'F'],null,['placeholder' => '-- Select  --', 'class'=>'select2 form-control','aria-describedby'=>'sex','required'=>'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Age</label>
                                            {!! Form::text('age',null,['placeholder' => 'Enter Age', 'class'=>'  form-control','id'=> 'qty','aria-describedby'=>'age','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Nationality</label>
                                           {!! Form::select('nationality',['KENYAN'=>'KENYAN','FOREIGNER'=>'FOREIGNER'],null,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'nationality','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="itemquantity">Case Position</label>
                                            {!! Form::select('case_position',['PUI'=>'PUI','PAKA'=>'PAKA','PBC'=>'PBC','FINALIZED'=>'FINALIZED'],null,['placeholder' => '-- Select  --', 'class'=>'select2 form-control','aria-describedby'=>'case_position','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="drug_type">Type Of Drug</label>
                                            {!! Form::select('drug_type_id',$drugtypes,null,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'drug_type_id','required'=>'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="drug_packaging_id">Packaging</label>
                                            {!! Form::select('drug_packaging_id',$packagings,null,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'drug_packaging_id','required'=>'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Qty</label>
                                            {!! Form::number('qty',null,['placeholder' => 'Enter Qty', 'class'=>'  form-control','id'=> 'qty','aria-describedby'=>'qty']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="col-md-4 col-12 mb-50">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                                
                            @endif
                            
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-warning" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <!-- /Drugs repeater -->
    </div>
</section>
<section id="policeofficers-input" class="{{ $police_officers == 1 ? '' : 'hide' }}">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">Police Officers</h4>
                </div>
                <div class="card-body">
                  
                    <div  class="policeofficer-repeater">

                        <div data-repeater-list="policeofficer">
                            @if ($police_officers == 1)
                    @foreach ($incidentrecord->policeofficers as $policeofficer)
                        
                    <div data-repeater-item>
                        <div class="row d-flex align-items-end">
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="itemquantity">Type</label>
                                    {!! Form::select('p_type',['Arrested Officers'=>'Arrested Officers','Dead Officers'=>'Dead Officers','Injured Officers'=>'Injured Officers'],$policeofficer->p_type,['placeholder' => '-- Select  --', 'class'=>'select2 form-control','aria-describedby'=>'type','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="staticprice">Fc/No</label>
                                    {!! Form::text('p_fc_no',$policeofficer->p_fc_no,['placeholder' => 'Enter ', 'class'=>'  form-control','id'=> 'fc_no','aria-describedby'=>'fc_no','required'=>'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="staticprice">Rank</label>
                                    {!! Form::text('p_rank',$policeofficer->p_rank,['placeholder' => 'Enter ', 'class'=>'  form-control','id'=> 'rank','aria-describedby'=>'rank','required'=>'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="staticprice">Name</label>
                                    {!! Form::text('p_officer_name',$policeofficer->p_officer_name,['placeholder' => 'Enter ', 'class'=>'  form-control','id'=> 'name','aria-describedby'=>'name','required'=>'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="staticprice">Circumstance</label>
                                    {!! Form::text('p_circumstance',$policeofficer->p_circumstance,['placeholder' => 'Enter ', 'class'=>'  form-control','id'=> 'circumstance','aria-describedby'=>'circumstance','required'=>'required']) !!}
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
                                            <label class="form-label" for="itemquantity">Type</label>
                                            {!! Form::select('p_type',['Arrested Officers'=>'Arrested Officers','Dead Officers'=>'Dead Officers','Injured Officers'=>'Injured Officers'],null,['placeholder' => '-- Select  --', 'class'=>'select2 form-control','aria-describedby'=>'type']) !!}
                                        </div>
                                    </div>
        
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Fc/No</label>
                                            {!! Form::text('p_fc_no',null,['placeholder' => 'Enter ', 'class'=>'  form-control','id'=> 'fc_no','aria-describedby'=>'fc_no']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Rank</label>
                                            {!! Form::text('p_rank',null,['placeholder' => 'Enter ', 'class'=>'  form-control','id'=> 'rank','aria-describedby'=>'rank']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Name</label>
                                            {!! Form::text('p_officer_name',null,['placeholder' => 'Enter ', 'class'=>'  form-control','id'=> 'name','aria-describedby'=>'name']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="staticprice">Circumstance</label>
                                            {!! Form::text('p_circumstance',null,['placeholder' => 'Enter ', 'class'=>'  form-control','id'=> 'circumstance','aria-describedby'=>'circumstance']) !!}
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
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                    </div>
                   
                   
                    </div>
                </div>
            </div>
        </div>
    
</section>
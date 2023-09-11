<section id="alien-input" class="{{ ($alien == 1) ? '' : 'hide'}}">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">ALIENS  INCIDENCES</h4>
                </div>
                <div class="card-body">
                  
                    <div  class="alien-repeater">
                        <div data-repeater-list="alien">
                            @if ($alien == 1)
                            @foreach ($incidentrecord->aliens as $alien )
                                
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="alien_nationality">Nationality </label>
                                            {!! Form::select('alien_nationality',$countries,$alien->alien_nationality,['placeholder' => '-- Select Nationality --', 'class'=>' select2 form-control','aria-describedby'=>'alien_nationality']) !!}
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">No Of Arrest </label>
                                            {!! Form::number('alien_no_of_arrest',$alien->alien_no_of_arrest,['placeholder' => 'Enter No Of Arrest', 'class'=>'  form-control','id'=> 'alien_no_of_arrest']) !!}
                                        </div>
                                    </div>
                                  
                                
                                    <div class="col-md-4 col-12 mb-50 ">
                                        <div class="mb-1 ">
                                            <button class="btn btn-outline-danger text-nowrap px-1  " data-repeater-delete type="button">
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
                                            <label class="form-label" for="alien_nationality">Nationality </label>
                                            {!! Form::select('alien_nationality',$countries,null,['placeholder' => '-- Select Nationality --', 'class'=>' select2 form-control','aria-describedby'=>'alien_nationality']) !!}
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">No Of Arrest </label>
                                            {!! Form::number('alien_no_of_arrest',null,['placeholder' => 'Enter No Of Arrest', 'class'=>'  form-control','id'=> 'alien_no_of_arrest']) !!}
                                        </div>
                                    </div>
                                  
                                
                                    <div class="col-md-4 col-12 mb-50 ">
                                        <div class="mb-1 ">
                                            <button class="btn btn-outline-danger text-nowrap px-1  " data-repeater-delete type="button">
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
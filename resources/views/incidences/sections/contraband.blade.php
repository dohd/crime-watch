<section id="contraband-input" class="{{ $contraband == 1 ? '' : 'hide' }}">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">CONTRABAND</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 nNnncNnol-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">No Of Arrest </label>
                                {!! Form::text('c_no_of_arrest',null,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'c_no_of_arrest']) !!}
                            </div>
                        </div>
                        @if ($contraband == 1)
                        @foreach ($contrabands as $contraband )
                    
                    
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">{{ $contraband->name }}  </label>
                                {!! Form::hidden('contraband_id[]',$contraband->id,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'contraband_id']) !!}
                                {!! Form::text('contraband_value[]',@$contraband->contrabandIncidences->contraband_value,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'contraband_value']) !!}
                            </div>
                        </div>
                        @endforeach
                            
                        @else
                        @foreach ($contrabands as $contraband )
                    
                    
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">{{ $contraband->name }}  </label>
                                {!! Form::hidden('contraband_id[]',$contraband->id,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'contraband_id']) !!}
                                {!! Form::text('contraband_value[]',null,['placeholder' => 'Enter No', 'class'=>'  form-control','id'=> 'contraband_value']) !!}
                            </div>
                        </div>
                        @endforeach
                            
                        @endif
                      
                    

                    </div>
                        
                   
                   
                    </div>
                </div>
            </div>
        </div>
    
</section>
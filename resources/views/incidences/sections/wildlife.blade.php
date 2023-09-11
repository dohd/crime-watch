<section id="wildlife-input" class="hide">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">WILDLIFE</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">POACHING</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('elephant',null,['placeholder' => 'ELEPHANTS', 'class'=>'  form-control','id'=> 'elephant']) !!}
                                    {!! Form::text('rhino',null,['placeholder' => 'RHINO', 'class'=>'  form-control','id'=> 'rhino']) !!}
                                    {!! Form::text('giraffe',null,['placeholder' => 'GIRAFFE', 'class'=>'  form-control','id'=> 'giraffe']) !!}

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">HUMAN-WILDLIFE CONFLICT</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('injured',null,['placeholder' => 'INJURED', 'class'=>'  form-control','id'=> 'injured']) !!}
                                    {!! Form::text('fetal',null,['placeholder' => 'FATALS', 'class'=>'  form-control','id'=> 'fetal']) !!}

                                </div>
                            </div>
                        </div>

                    </div>
                        
                   
                   
                    </div>
                </div>
            </div>
        </div>
    
</section>
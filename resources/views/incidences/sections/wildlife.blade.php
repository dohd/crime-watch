<section id="wildlife-input" class="{{ $wildlife == 1 ? '' : 'hide' }}">
    @php
        $wildlife = @$incidentrecord->wildlife;
    @endphp
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
                                    {!! Form::number('elephant',@$wildlife->elephant,['placeholder' => 'ELEPHANTS', 'class'=>'  form-control','id'=> 'elephant']) !!}
                                    {!! Form::number('rhino',@$wildlife->rhino,['placeholder' => 'RHINO', 'class'=>'  form-control','id'=> 'rhino']) !!}
                                    {!! Form::number('giraffe',@$wildlife->giraffe,['placeholder' => 'GIRAFFE', 'class'=>'  form-control','id'=> 'giraffe']) !!}
                                    {!! Form::number('other',@$wildlife->other,['placeholder' => 'OTHER', 'class'=>'  form-control','id'=> 'other']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">HUMAN-WILDLIFE CONFLICT</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('injured',@$wildlife->injured,['placeholder' => 'INJURED', 'class'=>'  form-control','id'=> 'injured']) !!}
                                    {!! Form::number('fatal',@$wildlife->fatal,['placeholder' => 'FATALS', 'class'=>'  form-control','id'=> 'fatal']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
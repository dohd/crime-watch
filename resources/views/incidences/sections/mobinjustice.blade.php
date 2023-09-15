<section id="mobinjustice-input" class="{{ $mob_injustice == 1 ? '' : 'hide' }}">
    @php
    $suspect = null;
    $age = null;
    $mob_fetal = null;
    $status = null;
    if ($mob_injustice == 1) {
        $suspect = $incidentrecord->mobInjustice->suspect;
        $age = $incidentrecord->mobInjustice->age;
        $mob_fetal = $incidentrecord->mobInjustice->mob_fetal;
        $status = $incidentrecord->mobInjustice->status;
       
    }
@endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">MOB INJUSTICE</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Suspect </label>
                                {!! Form::textarea('suspect',$suspect,['placeholder' => 'Enter Suspect','rows' => 3,'class'=>'  form-control','id'=> 'suspect']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Age </label>
                                {!! Form::textarea('age',$age,['placeholder' => 'Enter Age','rows' => 3,'class'=>'  form-control','id'=> 'age']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Offense </label>
                                {!! Form::text('offense', @$offence,['placeholder' => 'Enter Offense', 'class'=>'  form-control','id'=> 'offense']) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Status </label>
                                {!! Form::text('status',$status,['placeholder' => 'Enter Status', 'class'=>'  form-control','id'=> 'status']) !!}
                            </div>
                        </div>
                    </div>
                        
                   
                   
                    </div>
                </div>
            </div>
        </div>
    
</section>
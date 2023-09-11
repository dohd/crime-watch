<section id="criminalgang-input" class="{{ $criminal_gang == 1 ? '' : 'hide' }}">
    @php
    $c_gang_name = null;
    $cr_no_of_arrest = null;
    $cr_arrested = null;
    $c_gang_incidences = null;
    if ($criminal_gang == 1) {
        $c_gang_name = $incidentrecord->criminalGang->c_gang_name;
        $cr_no_of_arrest = $incidentrecord->criminalGang->cr_no_of_arrest;
        $c_gang_incidences = $incidentrecord->criminalGang->c_gang_incidences;
       
    }
@endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">CRIMINAL GANG</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Gang Name </label>
                                {!! Form::text('c_gang_name',$c_gang_name,['placeholder' => 'Enter Gang Name', 'class'=>'  form-control','id'=> 'c_gang_name']) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">No Of Arrest </label>
                                {!! Form::text('cr_no_of_arrest',$cr_no_of_arrest,['placeholder' => 'Enter No Of Arrest', 'class'=>'  form-control','id'=> 'c_no_of_arrest']) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Incidences </label>
                                {!! Form::text('c_gang_incidences',$c_gang_incidences,['placeholder' => 'Enter Gang Incidences', 'class'=>'  form-control','id'=> 'c_gang_incidences']) !!}
                            </div>
                        </div>

                    </div>
                        
                   
                   
                    </div>
                </div>
            </div>
        </div>
    
</section>
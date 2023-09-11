<section id="illicitbrew-input" class="{{ $illicitbrew == 1 ? '' : 'hide' }}">
    @php
    $type_illicitbrew = null;
    $im_arrested = null;
    $im_taken_to_court = null;
    $im_destroyed = null;
    $id_arrested = null;
    $id_taken_to_court = null;
    $id_destroyed = null;
    $ir_arrested = null;
    $ir_taken_to_court = null;
    $ir_destroyed = null;
    $ic_arrested = null;
    $ic_taken_to_court = null;
    if ($illicitbrew == 1) {
        $type_illicitbrew = $incidentrecord->illicitBrew->type_illicitbrew;
        $im_arrested = $incidentrecord->illicitBrew->im_arrested;
        $im_taken_to_court = $incidentrecord->illicitBrew->im_taken_to_court;
        $im_destroyed = $incidentrecord->illicitBrew->im_destroyed;
        $id_arrested = $incidentrecord->illicitBrew->id_arrested;
        $id_taken_to_court = $incidentrecord->illicitBrew->id_taken_to_court;
        $id_destroyed = $incidentrecord->illicitBrew->id_destroyed;
        $ir_arrested = $incidentrecord->illicitBrew->ir_arrested;
        $ir_taken_to_court = $incidentrecord->illicitBrew->ir_taken_to_court;
        $ir_destroyed = $incidentrecord->illicitBrew->ir_destroyed;
        $ic_arrested = $incidentrecord->illicitBrew->ic_arrested;
        $ic_taken_to_court = $incidentrecord->illicitBrew->ic_taken_to_court;
        
    }
@endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">Illicit Brew </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Type Of Illicit Brew </label>
                                {!! Form::select('type_illicitbrew',['CHANGAA'=>'CHANGAA','KANGARA'=>'KANGARA','MNAZI'=>'MNAZI','BUSAA'=>'BUSAA','2ND GENERATION'=>'2ND GENERATION','OTHERS'=>'OTHERS'],$type_illicitbrew,['placeholder' => '-- Select Type --', 'class'=>' select2 form-control','id'=> 'type_illicitbrew']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">MANUFACTURERS</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('im_arrested',$im_arrested,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'im_arrested']) !!}
                                    {!! Form::text('im_taken_to_court',$im_taken_to_court,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'im_taken_to_court']) !!}
                                    {!! Form::text('im_destroyed',$im_destroyed,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'im_destroyed']) !!}

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">DISTRIBUTORS</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('id_arrested',$id_arrested,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'id_arrested']) !!}
                                    {!! Form::text('id_taken_to_court',$id_taken_to_court,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'id_taken_to_court']) !!}
                                    {!! Form::text('id_destroyed',$id_destroyed,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'id_destroyed']) !!}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">RETAILERS</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('ir_arrested',$ir_arrested,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'ir_arrested']) !!}
                                    {!! Form::text('ir_taken_to_court',$ir_taken_to_court,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'ir_taken_to_court']) !!}
                                    {!! Form::text('ir_destroyed',$ir_destroyed,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'ir_destroyed']) !!}

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">CONSUMERS</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('ic_arrested',$ic_arrested,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'ic_arrested']) !!}
                                    {!! Form::text('ic_taken_to_court',$ic_taken_to_court,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'ic_taken_to_court']) !!}
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                        
                   
                   
                    </div>
                </div>
            </div>
        </div>
    
</section>
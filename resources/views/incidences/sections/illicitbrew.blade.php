<section id="illicitbrew-input" class="{{ $illicitbrew == 1 ? '' : 'hide' }}">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">Illicit Brew </h4>
                </div>
                <div class="card-body">
                    <div  class="illicitbrew-repeater">
                        <div data-repeater-list="illicitbrew">
                            @if (isset($incidentrecord->illicitBrews))
                                @foreach ($incidentrecord->illicitBrews as $key => $row)
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="disabledInput">Type Of Illicit Brew </label>
                                                    {!! Form::select(
                                                        'type_illicitbrew',
                                                        ['CHANGAA'=>'CHANGAA','KANGARA'=>'KANGARA','MNAZI'=>'MNAZI','BUSAA'=>'BUSAA','2ND GENERATION'=>'2ND GENERATION','OTHERS'=>'OTHERS'],
                                                        $row->type_illicitbrew,
                                                        [
                                                            'placeholder' => '-- Select Type --', 
                                                            'class'=>' select2 form-control',
                                                            'id'=> 'type_illicitbrew_' . $key
                                                        ]) 
                                                    !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <button class="btn btn-outline-danger text-nowrap mt-2" data-repeater-delete type="button">
                                                        <i data-feather="x" class="me-25"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label">MANUFACTURERS</label>
                                                    <div class="input-group mb-2">
                                                        {!! Form::text('im_arrested', $row->im_arrested,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'im_arrested_' . $key]) !!}
                                                        {!! Form::text('im_taken_to_court', $row->im_taken_to_court,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'im_taken_to_court_' . $key]) !!}
                                                        {!! Form::text('im_destroyed', $row->im_destroyed,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'im_destroyed_' . $key]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label">DISTRIBUTORS</label>
                                                    <div class="input-group mb-2">
                                                        {!! Form::text('id_arrested', $row->id_arrested,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'id_arrested_' . $key]) !!}
                                                        {!! Form::text('id_taken_to_court', $row->id_taken_to_court,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'id_taken_to_court_' . $key]) !!}
                                                        {!! Form::text('id_destroyed', $row->id_destroyed,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'id_destroyed_' . $key]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label">RETAILERS</label>
                                                    <div class="input-group mb-2">
                                                        {!! Form::text('ir_arrested', $row->ir_arrested,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'ir_arrested_' . $key]) !!}
                                                        {!! Form::text('ir_taken_to_court', $row->ir_taken_to_court,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'ir_taken_to_court_' . $key]) !!}
                                                        {!! Form::text('ir_destroyed', $row->ir_destroyed,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'ir_destroyed_' . $key]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label">CONSUMERS</label>
                                                    <div class="input-group mb-2">
                                                        {!! Form::text('ic_arrested', $row->ic_arrested,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'ic_arrested_' . $key]) !!}
                                                        {!! Form::text('ic_taken_to_court', $row->ic_taken_to_court,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'ic_taken_to_court_' . $key]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                @endforeach
                            @else
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="disabledInput">Type Of Illicit Brew </label>
                                                {!! Form::select(
                                                    'type_illicitbrew',
                                                    ['CHANGAA'=>'CHANGAA','KANGARA'=>'KANGARA','MNAZI'=>'MNAZI','BUSAA'=>'BUSAA','2ND GENERATION'=>'2ND GENERATION','OTHERS'=>'OTHERS'],
                                                    null,
                                                    ['placeholder' => '-- Select Type --', 
                                                    'class'=>' select2 form-control',
                                                    'id'=> 'type_illicitbrew']) 
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <button class="btn btn-outline-danger text-nowrap mt-2" data-repeater-delete type="button">
                                                    <i data-feather="x" class="me-25"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label">MANUFACTURERS</label>
                                                <div class="input-group mb-2">
                                                    {!! Form::text('im_arrested', null,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'im_arrested']) !!}
                                                    {!! Form::text('im_taken_to_court', null,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'im_taken_to_court']) !!}
                                                    {!! Form::text('im_destroyed', null,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'im_destroyed']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label">DISTRIBUTORS</label>
                                                <div class="input-group mb-2">
                                                    {!! Form::text('id_arrested', null,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'id_arrested']) !!}
                                                    {!! Form::text('id_taken_to_court', null,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'id_taken_to_court']) !!}
                                                    {!! Form::text('id_destroyed', null,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'id_destroyed']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label">RETAILERS</label>
                                                <div class="input-group mb-2">
                                                    {!! Form::text('ir_arrested', null,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'ir_arrested']) !!}
                                                    {!! Form::text('ir_taken_to_court', null,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'ir_taken_to_court']) !!}
                                                    {!! Form::text('ir_destroyed', null,['placeholder' => 'NETTED (LTRS)', 'class'=>'  form-control','id'=> 'ir_destroyed']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label">CONSUMERS</label>
                                                <div class="input-group mb-2">
                                                    {!! Form::text('ic_arrested', null,['placeholder' => 'ARRESTED', 'class'=>'  form-control','id'=> 'ic_arrested']) !!}
                                                    {!! Form::text('ic_taken_to_court', null,['placeholder' => 'TAKEN TO COURT', 'class'=>'  form-control','id'=> 'ic_taken_to_court']) !!}
                                                </div>
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

<section id="mobinjustice-input" class="{{ $mob_injustice == 1 ? '' : 'hide' }}">
    @php
        $mobinjustices = @$incidentrecord->mobInjustices;
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">MOB INJUSTICE</h4>
                </div>
                <div class="card-body">
                    <div class="mobinjustice-repeater">
                        <div data-repeater-list="mobinjustice">
                            @if ($mob_injustice == 1 && count($mobinjustices))
                                @foreach ($mobinjustices as $item )
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col-xl-3 col-md-3 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="suspect">Suspect </label>
                                                    {!! Form::text('suspect',$item->suspect,['placeholder' => 'Enter Suspect','rows' => 3,'class'=>'  form-control','id'=> 'suspect']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-3 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="age">Age </label>
                                                    {!! Form::text('age',$item->age,['placeholder' => 'Enter Age','rows' => 3,'class'=>'  form-control','id'=> 'age']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="offense">Offense </label>
                                                    {!! Form::text('offense', $item->offense,['placeholder' => 'Enter Offense', 'class'=>'  form-control','id'=> 'offense']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-3 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="status">Status </label>
                                                    {!! Form::text('status',$item->status,['placeholder' => 'Enter Status', 'class'=>'  form-control','id'=> 'status']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12 mb-50 ">
                                                <div class="mb-1 ">
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
                                    <div class="row">
                                        <div class="col-xl-3 col-md-3 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="suspect">Suspect </label>
                                                {!! Form::text('suspect',@$suspect,['placeholder' => 'Enter Suspect','rows' => 3,'class'=>'  form-control','id'=> 'suspect']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-3 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="age">Age </label>
                                                {!! Form::text('age',@$age,['placeholder' => 'Enter Age','rows' => 3,'class'=>'  form-control','id'=> 'age']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="offense">Offense </label>
                                                {!! Form::text('offense', @$offence,['placeholder' => 'Enter Offense', 'class'=>'  form-control','id'=> 'offense']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="status">Status </label>
                                                {!! Form::text('status',@$status,['placeholder' => 'Enter Status', 'class'=>'  form-control','id'=> 'status']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12 mb-50 ">
                                            <div class="mb-1 ">
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
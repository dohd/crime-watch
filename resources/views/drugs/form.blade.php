<section class="form-control-repeater">
    <div class="row">
        <!-- Drugs repeater -->
        @php
            $date_commited = isset($drugincidences) ? dateFormat($drugincidences->date_commited) : null;
            $date_commited_class = isset($drugincidences) ? 'flatpickr-basic-blank' : 'flatpickr-basic';
        @endphp
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Drugs</h4>
                    <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                        <label class="form-label" for="region">Date</label>
                        {!! Form::text('date_commited',$date_commited,['placeholder' => 'Enter  No', 'class'=>'  form-control '.$date_commited_class.' ','id'=> 'date_commited','required'=>'required']) !!}
                    </div>
                </div>
                <div class="card-body">
                    <div class="drugs-repeater">
                        <div data-repeater-list="drugs">
                            @if (isset($drugincidences->drugIncidenceItems) )
                                @foreach ($drugincidences->drugIncidenceItems as $item)
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="county">County</label>
                                                    {!! Form::select('county_id',$counties,$item->county_id,['placeholder' => '-- Select County --', 'class'=>' select2 form-control','aria-describedby'=>'county','required'=>'required']) !!}

                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="drug_type">Type Of Drug</label>
                                                    {!! Form::select('drug_type_id',$drugtypes,$item->drug_type_id,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'drug_type_id','required'=>'required']) !!}
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
                                        <div class="row d-flex align-items-end mb-1">
                                            <div class="col-md-2 col-12">
                                                <label class="form-label" for="arrested">Persons Arrested</label>
                                                {{ Form::number('arrested', $item->arrested, ['placeholder' => 'Arrested', 'class' => 'form-control']) }}
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="row gx-0">
                                                    <label class="form-label" for="offense">Offenses</label>
                                                    <div class="col-md-4 col-12">
                                                        {{ Form::number('possesion', $item->possesion, ['placeholder' => 'Possesion', 'class' => 'form-control']) }}
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        {{ Form::number('cultivation', $item->cultivation, ['placeholder' => 'Cultivation', 'class' => 'form-control']) }}
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        {{ Form::number('trafficking', $item->trafficking, ['placeholder' => 'Trafficking', 'class' => 'form-control']) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-end mb-1">
                                            <div class="col-md-3 col-12">
                                                <div class="row gx-0">
                                                    <label class="form-label" for="kenyans">Kenyans</label>
                                                    <div class="col-md-6 col-12">
                                                        {{ Form::number('male_ke', $item->male_ke, ['placeholder' => 'Male', 'class' => 'form-control']) }}
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        {{ Form::number('female_ke', $item->female_ke, ['placeholder' => 'Female', 'class' => 'form-control']) }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="row gx-0">
                                                    <label class="form-label" for="foreigner">Foreigners</label>
                                                    <div class="col-md-6 col-12">
                                                        {{ Form::number('male_fr', $item->male_fr, ['placeholder' => 'Male', 'class' => 'form-control']) }}
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        {{ Form::number('female_fr', $item->female_fr, ['placeholder' => 'Female', 'class' => 'form-control']) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-end mb-1">
                                            <div class="col-md-12 col-12">
                                                <div class="row gx-0">
                                                    <label class="form-label" for="qty">Quantity</label>
                                                    @foreach ($packagings as $key => $pkg)
                                                        <div class="col-md-1 col-12">
                                                            {{ Form::number(strtolower($pkg), $item[strtolower($pkg)], ['placeholder' => $pkg, 'class' => 'form-control']) }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-end mb-1">
                                            <div class="col-md-12 col-12">
                                                <div class="row gx-0">
                                                    <label class="form-label" for="qty">Position Of Case</label>
                                                    @foreach (['PUI'=>'PUI','PAKA'=>'PAKA','PBC'=>'PBC','FINALIZED'=>'FINALIZED'] as $key => $poc)
                                                        <div class="col-md-1 col-12">
                                                            {{ Form::number(strtolower($poc), $item[strtolower($poc)], ['placeholder' => $poc, 'class' => 'form-control']) }}
                                                        </div>
                                                    @endforeach
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
                                                <label class="form-label" for="county">County</label>
                                                {!! Form::select('county_id',$counties,null,['placeholder' => '-- Select County --', 'class'=>' select2 form-control','aria-describedby'=>'county','required'=>'required']) !!}

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="drug_type">Type Of Drug</label>
                                                {!! Form::select('drug_type_id',$drugtypes,null,['placeholder' => '-- Select --', 'class'=>' select2 form-control','aria-describedby'=>'drug_type_id','required'=>'required']) !!}
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
                                    <div class="row d-flex align-items-end mb-1">
                                        <div class="col-md-2 col-12">
                                            <label class="form-label" for="arrested">Persons Arrested</label>
                                            {{ Form::number('arrested', null, ['placeholder' => 'Arrested', 'class' => 'form-control']) }}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="row gx-0">
                                                <label class="form-label" for="offense">Offenses</label>
                                                <div class="col-md-4 col-12">
                                                    {{ Form::number('possesion', null, ['placeholder' => 'Possesion', 'class' => 'form-control']) }}
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    {{ Form::number('cultivation', null, ['placeholder' => 'Cultivation', 'class' => 'form-control']) }}
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    {{ Form::number('trafficking', null, ['placeholder' => 'Trafficking', 'class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-end mb-1">
                                        <div class="col-md-3 col-12">
                                            <div class="row gx-0">
                                                <label class="form-label" for="kenyans">Kenyans</label>
                                                <div class="col-md-6 col-12">
                                                    {{ Form::number('male_ke', null, ['placeholder' => 'Male', 'class' => 'form-control']) }}
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    {{ Form::number('female_ke', null, ['placeholder' => 'Female', 'class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="row gx-0">
                                                <label class="form-label" for="foreigner">Foreigners</label>
                                                <div class="col-md-6 col-12">
                                                    {{ Form::number('male_fr', null, ['placeholder' => 'Male', 'class' => 'form-control']) }}
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    {{ Form::number('female_fr', null, ['placeholder' => 'Female', 'class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-end mb-1">
                                        <div class="col-md-12 col-12">
                                            <div class="row gx-0">
                                                <label class="form-label" for="qty">Quantity</label>
                                                @foreach ($packagings as $key => $pkg)
                                                    <div class="col-md-1 col-12">
                                                        {{ Form::number(strtolower($pkg), null, ['placeholder' => $pkg, 'class' => 'form-control']) }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-end mb-1">
                                        <div class="col-md-12 col-12">
                                            <div class="row gx-0">
                                                <label class="form-label" for="qty">Position Of Case</label>
                                                @foreach (['PUI'=>'PUI','PAKA'=>'PAKA','PBC'=>'PBC','FINALIZED'=>'FINALIZED'] as $key => $poc)
                                                    <div class="col-md-1 col-12">
                                                        {{ Form::number(strtolower($poc), null, ['placeholder' => $poc, 'class' => 'form-control']) }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-warning" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Drugs repeater -->
    </div>
</section>
<section id="addincident-input" class="{{ $addincident == 1 ? '' : 'hide' }}">
    @php
        $place = null;
        $mode_of_operandi = null;
        $as_name = null;
        $as_value = null;
        $ar_name = null;
        $ar_value = null;
        $ad_name = null;
        $ad_value = null;
        if ($addincident == 1) {
            $place = $incidentrecord->incidentContinue->place;
            $mode_of_operandi = $incidentrecord->incidentContinue->mode_of_operandi;
            $as_name = $incidentrecord->incidentContinue->as_name;
            $as_value = $incidentrecord->incidentContinue->as_value;
            $ar_name = $incidentrecord->incidentContinue->ar_name;
            $ar_value = $incidentrecord->incidentContinue->ar_value;
            $ad_name = $incidentrecord->incidentContinue->ad_name;
            $ad_value = $incidentrecord->incidentContinue->ad_value;
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">ADD INCIDENT/CRIME CONTINUED</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Scene of Incident </label>
                                {!! Form::text('place', $place, ['placeholder' => 'Enter Place', 'class' => '  form-control', 'id' => 'place']) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Modus Operandi </label>
                                {!! Form::text('mode_of_operandi', $mode_of_operandi, [
                                    'placeholder' => 'Enter Mode',
                                    'class' => '  form-control',
                                    'id' => 'mode_of_operandi',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">Property Stolen</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('as_name', $as_name, ['placeholder' => 'Name', 'class' => '  form-control', 'id' => 'as_name']) !!}
                                    {!! Form::text('as_value', $as_value, [
                                        'placeholder' => 'Value',
                                        'class' => '  form-control',
                                        'id' => 'as_value',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">Property Recoved</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('ar_name', $ar_name, ['placeholder' => 'Name', 'class' => '  form-control', 'id' => 'ar_name']) !!}
                                    {!! Form::text('ar_value', $ar_value, [
                                        'placeholder' => 'Value',
                                        'class' => '  form-control',
                                        'id' => 'ar_value',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">Property Dermaged</label>
                                <div class="input-group mb-2">
                                    {!! Form::text('ad_name', $ad_name, ['placeholder' => 'Name', 'class' => '  form-control', 'id' => 'ad_name']) !!}
                                    {!! Form::text('ad_value', $ad_value, [
                                        'placeholder' => 'Value',
                                        'class' => '  form-control',
                                        'id' => 'ad_value',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

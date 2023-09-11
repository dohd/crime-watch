<section id="terrorism-input" class="{{ $terrorism == 1 ? '' : 'hide' }}">
    @php
        $place_of_incidence = null;
        $mode_of_attack = null;
        $tk_officer = null;
        $tk_reservist = null;
        $tk_civilian = null;
        $tk_suspect = null;
        $ti_officer = null;
        $ti_reservist = null;
        $ti_civilian = null;
        $ti_suspect = null;
        $tkd_officer = null;
        $tkd_reservist = null;
        $tkd_civilian = null;
        $tkd_suspect = null;
        $ta_officer = null;
        $ta_reservist = null;
        $ta_civilian = null;
        $ta_suspect = null;
        if ($terrorism == 1) {
            $place_of_incidence = $incidentrecord->terrorism->place_of_incidence;
            $mode_of_attack = $incidentrecord->terrorism->mode_of_attack;
            $tk_officer = $incidentrecord->terrorism->tk_officer;
            $tk_reservist = $incidentrecord->terrorism->tk_reservist;
            $tk_civilian = $incidentrecord->terrorism->tk_civilian;
            $tk_suspect = $incidentrecord->terrorism->tk_suspect;
            $ti_officer = $incidentrecord->terrorism->ti_officer;
            $ti_reservist = $incidentrecord->terrorism->ti_reservist;
            $ti_civilian = $incidentrecord->terrorism->ti_civilian;
            $ti_suspect = $incidentrecord->terrorism->ti_suspect;
            $tkd_officer = $incidentrecord->terrorism->tkd_officer;
            $tkd_reservist = $incidentrecord->terrorism->tkd_reservist;
            $tkd_civilian = $incidentrecord->terrorism->tkd_civilian;
            $tkd_suspect = $incidentrecord->terrorism->tkd_suspect;
            $ta_officer = $incidentrecord->terrorism->ta_officer;
            $ta_reservist = $incidentrecord->terrorism->ta_reservist;
            $ta_civilian = $incidentrecord->terrorism->ta_civilian;
            $ta_suspect = $incidentrecord->terrorism->ta_suspect;
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">TERROR INCIDENCES </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 nNnncNnol-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">PLACE OF INCIDENT </label>
                                {!! Form::text('place_of_incidence', $place_of_incidence, [
                                    'placeholder' => 'Enter',
                                    'class' => '  form-control',
                                    'id' => 'place_of_incidence',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 nNnncNnol-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">MODE OF ATTACK </label>
                                {!! Form::text('mode_of_attack', $mode_of_attack, [
                                    'placeholder' => 'Enter',
                                    'class' => '  form-control',
                                    'id' => 'mode_of_attack',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">KILLED</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('tk_officer', $tk_officer, [
                                        'placeholder' => 'OFFICER(S)',
                                        'class' => '  form-control',
                                        'id' => 'tk_officer',
                                    ]) !!}
                                    {!! Form::number('tk_reservist', $tk_reservist, [
                                        'placeholder' => 'RESERVISTS',
                                        'class' => '  form-control',
                                        'id' => 'tk_reservist',
                                    ]) !!}
                                    {!! Form::number('tk_civilian', $tk_civilian, [
                                        'placeholder' => 'CIVILIAN(S)',
                                        'class' => '  form-control',
                                        'id' => 'tk_civilian',
                                    ]) !!}
                                    {!! Form::number('tk_suspect', $tk_suspect, [
                                        'placeholder' => 'SUSPECT(S)',
                                        'class' => '  form-control',
                                        'id' => 'tk_suspect',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">INJURED</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('ti_officer', $ti_officer, [
                                        'placeholder' => 'OFFICER(S)',
                                        'class' => '  form-control',
                                        'id' => 'ti_officer',
                                    ]) !!}
                                    {!! Form::number('ti_reservist', $ti_reservist, [
                                        'placeholder' => 'RESERVISTS',
                                        'class' => '  form-control',
                                        'id' => 'ti_reservist',
                                    ]) !!}
                                    {!! Form::number('ti_civilian', $ti_civilian, [
                                        'placeholder' => 'CIVILIAN(S)',
                                        'class' => '  form-control',
                                        'id' => 'ti_civilian',
                                    ]) !!}
                                    {!! Form::number('ti_suspect', $ti_suspect, [
                                        'placeholder' => 'SUSPECT(S)',
                                        'class' => '  form-control',
                                        'id' => 'ti_suspect',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">KIDNAPPED</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('tkd_officer', $tkd_officer, [
                                        'placeholder' => 'OFFICER(S)',
                                        'class' => '  form-control',
                                        'id' => 'tkd_officer',
                                    ]) !!}
                                    {!! Form::number('tkd_reservist', $tkd_reservist, [
                                        'placeholder' => 'RESERVISTS',
                                        'class' => '  form-control',
                                        'id' => 'tkd_reservist',
                                    ]) !!}
                                    {!! Form::number('tkd_civilian', $tkd_civilian, [
                                        'placeholder' => 'CIVILIAN(S)',
                                        'class' => '  form-control',
                                        'id' => 'tkd_civilian',
                                    ]) !!}
                                    {!! Form::number('tkd_suspect', $tkd_suspect, [
                                        'placeholder' => 'SUSPECT(S)',
                                        'class' => '  form-control',
                                        'id' => 'tkd_suspect',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">ARRESTED</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('ta_officer', $ta_officer, [
                                        'placeholder' => 'OFFICER(S)',
                                        'class' => '  form-control',
                                        'id' => 'ta_officer',
                                    ]) !!}
                                    {!! Form::number('ta_reservist', $ta_reservist, [
                                        'placeholder' => 'RESERVISTS',
                                        'class' => '  form-control',
                                        'id' => 'ta_reservist',
                                    ]) !!}
                                    {!! Form::number('ta_civilian', $ta_civilian, [
                                        'placeholder' => 'CIVILIAN(S)',
                                        'class' => '  form-control',
                                        'id' => 'ta_civilian',
                                    ]) !!}
                                    {!! Form::number('ta_suspect', $ta_suspect, [
                                        'placeholder' => 'SUSPECT(S)',
                                        'class' => '  form-control',
                                        'id' => 'ta_suspect',
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

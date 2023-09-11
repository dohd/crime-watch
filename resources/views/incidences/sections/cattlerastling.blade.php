<section id="cattlerustling-input" class="{{ $cattle_rustling == 1 ? '' : 'hide' }}">
    @php
        $cr_killed = null;
        $cr_injured = null;
        $cr_arrested = null;
        $cs_cattle = null;
        $cs_goats = null;
        $cs_sheep = null;
        $cs_camel = null;
        $cs_others = null;
        $cr_cattle = null;
        $cr_goats = null;
        $cr_sheep = null;
        $cr_camel = null;
        $cr_others = null;
        if ($cattle_rustling == 1) {
            $cr_killed = $incidentrecord->cattleRustling->cr_killed;
            $cr_injured = $incidentrecord->cattleRustling->cr_injured;
            $cr_arrested = $incidentrecord->cattleRustling->cr_arrested;
            $cs_cattle = $incidentrecord->cattleRustling->cs_cattle;
            $cs_goats = $incidentrecord->cattleRustling->cs_goats;
            $cs_sheep = $incidentrecord->cattleRustling->cs_sheep;
            $cs_camel = $incidentrecord->cattleRustling->cs_camel;
            $cs_others = $incidentrecord->cattleRustling->cs_others;
            $cr_cattle = $incidentrecord->cattleRustling->cr_cattle;
            $cr_sheep = $incidentrecord->cattleRustling->cr_sheep;
            $cr_camel = $incidentrecord->cattleRustling->cr_camel;
            $cr_others = $incidentrecord->cattleRustling->cr_others;
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">CATTLE RUSTLING</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">PERSONS</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('cr_killed', $cr_killed, [
                                        'placeholder' => 'KILLED',
                                        'class' => '  form-control',
                                        'id' => 'cr_killed',
                                    ]) !!}
                                    {!! Form::number('cr_injured', $cr_injured, [
                                        'placeholder' => 'INJURED',
                                        'class' => '  form-control',
                                        'id' => 'cr_injured',
                                    ]) !!}
                                    {!! Form::number('cr_arrested', $cr_arrested, [
                                        'placeholder' => 'ARRESTED',
                                        'class' => '  form-control',
                                        'id' => 'cr_arrested',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">STOLEN</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('cs_cattle', $cs_cattle, [
                                        'placeholder' => 'CATTLE',
                                        'class' => '  form-control',
                                        'id' => 'cs_cattle',
                                    ]) !!}
                                    {!! Form::number('cs_goats', $cs_goats, [
                                        'placeholder' => 'GOATS',
                                        'class' => '  form-control',
                                        'id' => 'cs_goats',
                                    ]) !!}
                                    {!! Form::number('cs_sheep', $cs_sheep, [
                                        'placeholder' => 'SHEEP',
                                        'class' => '  form-control',
                                        'id' => 'cs_sheep',
                                    ]) !!}
                                    {!! Form::number('cs_camel', $cs_camel, [
                                        'placeholder' => 'CAMEL',
                                        'class' => '  form-control',
                                        'id' => 'cs_camel',
                                    ]) !!}
                                    {!! Form::number('cs_others', $cs_others, [
                                        'placeholder' => 'OTHERS',
                                        'class' => '  form-control',
                                        'id' => 'cs_others',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">RECOVERED</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('cr_cattle', $cr_cattle, [
                                        'placeholder' => 'CATTLE',
                                        'class' => '  form-control',
                                        'id' => 'cr_cattle',
                                    ]) !!}
                                    {!! Form::number('cr_goats', $cr_goats, [
                                        'placeholder' => 'GOATS',
                                        'class' => '  form-control',
                                        'id' => 'cr_goats',
                                    ]) !!}
                                    {!! Form::number('cr_sheep', $cr_sheep, [
                                        'placeholder' => 'SHEEP',
                                        'class' => '  form-control',
                                        'id' => 'cr_sheep',
                                    ]) !!}
                                    {!! Form::number('cr_camel', $cr_camel, [
                                        'placeholder' => 'CAMEL',
                                        'class' => '  form-control',
                                        'id' => 'cr_camel',
                                    ]) !!}
                                    {!! Form::number('cr_others', $cr_others, [
                                        'placeholder' => 'OTHERS',
                                        'class' => '  form-control',
                                        'id' => 'cr_others',
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

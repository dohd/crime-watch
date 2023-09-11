<section id="boarder-input" class="{{ $boarder == 1 ? '' : 'hide' }}">
    @php
        $s_camel = null;
        $s_cattle = null;
        $s_goats = null;
        $r_camel = null;
        $r_cattle = null;
        $r_goats = null;
        $o_killed = null;
        $c_killed = null;
        $o_injured = null;
        $c_injured = null;
        $r_killed = null;
        $r_arrested = null;
        if ($boarder == 1) {
            $s_camel = $incidentrecord->boarder->s_camel;
            $s_cattle = $incidentrecord->boarder->s_cattle;
            $s_goats = $incidentrecord->boarder->s_goats;
            $r_camel = $incidentrecord->boarder->r_camel;
            $r_cattle = $incidentrecord->boarder->r_cattle;
            $r_goats = $incidentrecord->boarder->r_goats;
            $o_killed = $incidentrecord->boarder->o_killed;
            $c_killed = $incidentrecord->boarder->c_killed;
            $o_injured = $incidentrecord->boarder->o_injured;
            $c_injured = $incidentrecord->boarder->c_injured;
            $r_killed = $incidentrecord->boarder->r_killed;
            $r_arrested = $incidentrecord->boarder->r_arrested;
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">Boarder </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">ANIMALS STOLEN</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('s_camel', $s_camel, [
                                        'placeholder' => 'CAMELS',
                                        'class' => '  form-control',
                                        'id' => 's_camel',
                                    ]) !!}
                                    {!! Form::number('s_cattle', $s_camel, [
                                        'placeholder' => 'CATTLE',
                                        'class' => '  form-control',
                                        'id' => 's_cattle',
                                    ]) !!}
                                    {!! Form::number('s_goats', $s_goats, [
                                        'placeholder' => 'GOATS',
                                        'class' => '  form-control',
                                        'id' => 's_goats',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">ANIMALS RECOVERED</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('r_camel', $r_camel, [
                                        'placeholder' => 'CAMELS',
                                        'class' => '  form-control',
                                        'id' => 'r_camel',
                                    ]) !!}
                                    {!! Form::number('r_cattle', $r_cattle, [
                                        'placeholder' => 'CATTLE',
                                        'class' => '  form-control',
                                        'id' => 'r_cattle',
                                    ]) !!}
                                    {!! Form::number('r_goats', $r_goats, [
                                        'placeholder' => 'GOATS',
                                        'class' => '  form-control',
                                        'id' => 'r_goats',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">VICTIMS KILLED</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('o_killed', $o_killed, [
                                        'placeholder' => 'P/OFFICER',
                                        'class' => '  form-control',
                                        'id' => 'o_killed',
                                    ]) !!}
                                    {!! Form::number('c_killed', $c_killed, [
                                        'placeholder' => 'CIVILIAN',
                                        'class' => '  form-control',
                                        'id' => 'c_killed',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">VICTIMS INJURED</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('o_injured', $o_injured, [
                                        'placeholder' => 'P/OFFICER',
                                        'class' => '  form-control',
                                        'id' => 'o_injured',
                                    ]) !!}
                                    {!! Form::number('c_injured', $c_injured, [
                                        'placeholder' => 'CIVILIAN',
                                        'class' => '  form-control',
                                        'id' => 'c_injured',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">RAIDERS / bandits</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('r_killed', $r_killed, [
                                        'placeholder' => 'KILLED',
                                        'class' => '  form-control',
                                        'id' => 'r_killed',
                                    ]) !!}
                                    {!! Form::number('r_arrested', $r_arrested, [
                                        'placeholder' => 'ARRESTED',
                                        'class' => '  form-control',
                                        'id' => 'r_arrested',
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

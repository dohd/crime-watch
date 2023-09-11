<section id="stocktheft-input" class="{{ $stock_theft == 1 ? '' : 'hide' }}">
    @php
        $stp_killed = null;
        $stp_injured = null;
        $stp_arrested = null;
        $stp_cattle = null;
        $stp_goats = null;
        $stp_sheep = null;
        $stp_camel = null;
        $stp_others = null;
        $str_cattle = null;
        $str_goats = null;
        $str_sheep = null;
        $str_camel = null;
        $str_others = null;
        if ($stock_theft == 1) {
            $stp_killed = $incidentrecord->stockTheft->stp_killed;
            $stp_injured = $incidentrecord->stockTheft->stp_injured;
            $stp_arrested = $incidentrecord->stockTheft->stp_arrested;
            $stp_cattle = $incidentrecord->stockTheft->stp_cattle;
            $stp_goats = $incidentrecord->stockTheft->stp_goats;
            $stp_sheep = $incidentrecord->stockTheft->stp_sheep;
            $stp_camel = $incidentrecord->stockTheft->stp_camel;
            $stp_others = $incidentrecord->stockTheft->stp_others;
            $str_cattle = $incidentrecord->stockTheft->str_cattle;
            $str_goats = $incidentrecord->stockTheft->str_goats;
            $str_sheep = $incidentrecord->stockTheft->str_sheep;
            $str_camel = $incidentrecord->stockTheft->str_camel;
            $str_others = $incidentrecord->stockTheft->str_others;
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">STOCK THEFT</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">PERSONS</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('stp_killed', $stp_killed, [
                                        'placeholder' => 'KILLED',
                                        'class' => '  form-control',
                                        'id' => 'stp_killed',
                                    ]) !!}
                                    {!! Form::number('stp_injured', $stp_injured, [
                                        'placeholder' => 'INJURED',
                                        'class' => '  form-control',
                                        'id' => 'stp_injured',
                                    ]) !!}
                                    {!! Form::number('stp_arrested', $stp_arrested, [
                                        'placeholder' => 'ARRESTED',
                                        'class' => '  form-control',
                                        'id' => 'stp_arrested',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">STOLEN</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('stp_cattle', $stp_cattle, [
                                        'placeholder' => 'CATTLE',
                                        'class' => '  form-control',
                                        'id' => 'stp_cattle',
                                    ]) !!}
                                    {!! Form::number('stp_goats', $stp_goats, [
                                        'placeholder' => 'GOATS',
                                        'class' => '  form-control',
                                        'id' => 'stp_goats',
                                    ]) !!}
                                    {!! Form::number('stp_sheep', $stp_sheep, [
                                        'placeholder' => 'SHEEP',
                                        'class' => '  form-control',
                                        'id' => 'stp_sheep',
                                    ]) !!}
                                    {!! Form::number('stp_camel', $stp_camel, [
                                        'placeholder' => 'CAMEL',
                                        'class' => '  form-control',
                                        'id' => 'stp_camel',
                                    ]) !!}
                                    {!! Form::number('stp_others', $stp_others, [
                                        'placeholder' => 'OTHERS',
                                        'class' => '  form-control',
                                        'id' => 'stp_others',
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
                                    {!! Form::number('str_cattle', $str_cattle, [
                                        'placeholder' => 'CATTLE',
                                        'class' => '  form-control',
                                        'id' => 'str_cattle',
                                    ]) !!}
                                    {!! Form::number('str_goats', $str_goats, [
                                        'placeholder' => 'GOATS',
                                        'class' => '  form-control',
                                        'id' => 'str_goats',
                                    ]) !!}
                                    {!! Form::number('str_sheep', $str_sheep, [
                                        'placeholder' => 'SHEEP',
                                        'class' => '  form-control',
                                        'id' => 'str_sheep',
                                    ]) !!}
                                    {!! Form::number('str_camel', $str_camel, [
                                        'placeholder' => 'CAMEL',
                                        'class' => '  form-control',
                                        'id' => 'str_camel',
                                    ]) !!}
                                    {!! Form::number('str_others', $str_others, [
                                        'placeholder' => 'OTHERS',
                                        'class' => '  form-control',
                                        'id' => 'str_others',
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

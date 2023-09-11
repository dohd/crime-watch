<section id="ethnicclashes-input" class="{{ $ethnic_clashes == 1 ? '' : 'hide' }}">
    @php
        $tribes_involved = null;
        $e_killed = null;
        $e_injured = null;
        $e_arrested = null;
        $e_reason = null;
        if ($ethnic_clashes == 1) {
            $tribes_involved = $incidentrecord->ethicalClashes->tribes_involved;
            $e_killed = $incidentrecord->ethicalClashes->e_killed;
            $e_injured = $incidentrecord->ethicalClashes->e_injured;
            $e_arrested = $incidentrecord->ethicalClashes->e_arrested;
            $e_reason = $incidentrecord->ethicalClashes->e_reason;
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">ETHNIC CLASHES</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">TRIBES INVOLVED </label>
                                {!! Form::text('tribes_involved', $tribes_involved, [
                                    'placeholder' => 'Enter No',
                                    'class' => '  form-control',
                                    'id' => 'tribes_involved',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">NO. OF PERSONS KILLED </label>
                                {!! Form::number('e_killed', $e_killed, [
                                    'placeholder' => 'Enter No ',
                                    'class' => '  form-control',
                                    'id' => 'e_killed',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">NO. OF PERSONS INJURED </label>
                                {!! Form::number('e_injured', $e_injured, [
                                    'placeholder' => 'Enter No',
                                    'class' => '  form-control',
                                    'id' => 'e_injured',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">NUMBER ARRESTED </label>
                                {!! Form::number('e_arrested', $e_arrested, [
                                    'placeholder' => 'Enter No',
                                    'class' => '  form-control',
                                    'id' => 'e_arrested',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">REASON OF CLASHES </label>
                                {!! Form::number('e_reason', $e_reason, [
                                    'placeholder' => 'Enter Reason ',
                                    'class' => '  form-control',
                                    'id' => 'e_reason',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

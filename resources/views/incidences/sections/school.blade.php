<section id="school-input" class="{{ $school == 1 ? '' : 'hide' }}">
    @php
        $s_school_name = null;
        $nature_of_school_unrest_id = null;
        $s_reason = null;
        $s_cases_reported = null;
        $s_student_injured = null;
        $s_student_dead = null;
        $s_student_non_injured = null;
        $s_student_non_dead = null;
        $s_student_arrested = null;
        $s_student_prosecuted = null;
        $s_other_arrest = null;
        $s_other_prosecuted = null;
        $s_sp_destroyed = null;
        $s_sp_value = null;
        if ($school == 1) {
            $s_school_name = $incidentrecord->school->s_school_name;
            $nature_of_school_unrest_id = $incidentrecord->school->nature_of_school_unrest_id;
            $s_reason = $incidentrecord->school->s_reason;
            $s_cases_reported = $incidentrecord->school->s_cases_reported;
            $s_student_injured = $incidentrecord->school->s_cases_reported;
            $s_student_dead = $incidentrecord->school->s_student_dead;
            $s_student_non_injured = $incidentrecord->school->s_student_non_injured;
            $s_student_non_dead = $incidentrecord->school->s_student_non_dead;
            $s_student_arrested = $incidentrecord->school->s_student_arrested;
            $s_student_prosecuted = $incidentrecord->school->s_student_prosecuted;
            $s_other_arrest = $incidentrecord->school->s_other_arrest;
            $s_other_prosecuted = $incidentrecord->school->s_other_prosecuted;
            $s_sp_destroyed = $incidentrecord->school->s_sp_destroyed;
            $s_sp_value = $incidentrecord->school->s_sp_value;
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">SCHOOL</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput"> Name </label>
                                {!! Form::text('s_school_name', $s_school_name, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'school_name',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">Nature </label>
                                {!! Form::select('nature_of_school_unrest_id', $nature, $nature_of_school_unrest_id, [
                                    'placeholder' => '-- Select  --',
                                    'class' => ' select2 form-control',
                                    'id' => 'nature_of_school_unrest_id',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">REASON/CAUSE </label>
                                {!! Form::text('s_reason', $s_reason, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'reason',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">NO. REPORTED CASES </label>
                                {!! Form::number('s_cases_reported', $s_cases_reported, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'cases_reported',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">NO. OF STUDENT INJURED </label>
                                {!! Form::number('s_student_injured', $s_student_injured, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'student_injured',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">NO. OF STUDENT DEAD </label>
                                {!! Form::number('s_student_dead', $s_student_dead, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'student_dead',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">NO. OF NON STUDENT INJURED </label>
                                {!! Form::number('s_student_non_injured', $s_student_non_injured, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'student_non_injured',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="s_student_non_dead">NO. OF NON STUDENT DEAD </label>
                                {!! Form::number('s_student_non_dead', $s_student_non_dead, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'student_non_dead',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="s_student_arrested">NO. OF STUDENTS ARRESTED</label>
                                {!! Form::number('s_student_arrested', $s_student_arrested, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 's_student_non_dead',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">NO. OF STUDENTS PROSECUTED </label>
                                {!! Form::number('s_student_prosecuted', $s_student_prosecuted, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'student_prosecuted',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">OTHERS ARRESTED</label>
                                {!! Form::number('s_other_arrest', $s_other_arrest, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'other_arrest',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">OTHERS PROSECUTED</label>
                                {!! Form::number('s_other_prosecuted', $s_other_prosecuted, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'other_prosecuted',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">KIND OF PROPERTY DESTROYED</label>
                                {!! Form::text('s_sp_destroyed', $s_sp_destroyed, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'sp_destroyed',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="disabledInput">VALUE OF PROERTY DESTROYED(ksh)</label>
                                {!! Form::number('s_sp_value', $s_sp_value, [
                                    'placeholder' => 'Enter ',
                                    'class' => '  form-control',
                                    'id' => 'sp_value',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="kidnapping-input" class="{{ $kidnapping == 1 ? '' : 'hide' }}">
    @php
        foreach ($agegroupings as $key => $agegroup) {
            if (!isset($incidentrecord->kidnappings)) break;
            foreach ($incidentrecord->kidnappings as $key => $incident_kidnapping) {
                if ($incident_kidnapping->age_grouping_id == $agegroup->id) {
                    $agegroup['male'] = $incident_kidnapping->male;
                    $agegroup['female'] = $incident_kidnapping->female;
                }
            }
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">KIDNAPPING / ABDUCTION</h4>
                </div>
                <div class="card-body">     
                    <div class="row">
                        @foreach ($agegroupings as $key => $row)
                            <div class="col-xl-2 col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label">{{ $row->name }}</label>
                                    <div class="input-group mb-2">
                                        {{ Form::hidden('age_grouping_id[]', $row->id, ['class' => 'age_grouping_id']) }}
                                        {!! Form::number('male[]', @$row->male, [
                                            'placeholder' => 'Male',
                                            'class' => 'form-control kd-input male',
                                            'min' => '0',
                                        ]) !!}
                                        {!! Form::number('female[]', @$row->female, [
                                            'placeholder' => 'Female',
                                            'class' => 'form-control kd-input female',
                                            'min' => '0',
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

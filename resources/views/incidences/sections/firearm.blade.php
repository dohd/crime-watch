<section id="firearm-input" class="{{ $firearm == 1 ? '' : 'hide' }}">
    @php
        foreach ($firearms as $key => $firearm) {
            if (!isset($incidentrecord->firearms)) break;
            foreach ($incidentrecord->firearms as $key => $incident_firearm) {
                if ($incident_firearm->firearm_id == $firearm->id) {
                    $firearm['recovered'] = $incident_firearm->recovered;
                    $firearm['surrendered'] = $incident_firearm->surrendered;
                    $firearm['serial_no'] = $incident_firearm->serial_no;
                }
            }
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">FIREARM</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($firearms as $key => $row)
                            <div class="col-xl-3 col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label">{{ $row->name }}</label>
                                    <div class="input-group mb-2">
                                        {!! Form::hidden('firearm_id[]', $row->id) !!}
                                        {!! Form::number('firearm_recovered[]', $row->recovered, [
                                            'placeholder' => 'Recovered',
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'id' => 'firearm_recovered_' . $key,
                                        ]) !!}
                                        {!! Form::number('firearm_surrendered[]', $row->surrendered, [
                                            'placeholder' => 'Surrendered',
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'id' => 'firearm_surrendered_' . $key,
                                        ]) !!}
                                        {!! Form::text('serial_no[]', $row->serial_no, [
                                            'placeholder' => 'Serial No.',
                                            'class' => 'form-control',
                                            'id' => 'serial_no_' . $key,
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

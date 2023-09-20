<section id="ammunition-input" class="{{ $firearm == 1 ? '' : 'hide' }}">
    @php
        foreach ($ammunitions as $key => $ammunition) {
            if (!isset($incidentrecord->ammunitions)) break;
            foreach ($incidentrecord->ammunitions as $key => $incident_ammu) {
                if ($incident_ammu->ammunition_id == $ammunition->id) {
                    $ammunition['recovered'] = $incident_ammu->recovered;
                    $ammunition['surrendered'] = $incident_ammu->surrendered;
                }
            }
        }
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">AMMUNITION</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($ammunitions as $key => $row)
                            <div class="col-xl-2 col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label">{{ $row->name }}</label>
                                    <div class="input-group mb-2">
                                        {!! Form::hidden('ammunition_id[]', $row->id) !!}
                                        {!! Form::number('ammunition_recovered[]', $row->recovered, [
                                            'placeholder' => 'Recovered',
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'id' => 'ammu_recov_' . $key,
                                        ]) !!}
                                        {!! Form::number('ammunition_surrendered[]', $row->surrendered, [
                                            'placeholder' => 'Surrendered',
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'id' => 'ammu_used_' . $key,
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

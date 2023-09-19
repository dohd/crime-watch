<section id="ammunition-input" class="hide">
    @php
        // browserLog($ammunitions);
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
                                        {!! Form::number('ammunition_recovered[]', @$m_arrest_no, [
                                            'placeholder' => 'Recovered',
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'id' => 'ammu_recov_' . $key,
                                        ]) !!}
                                        {!! Form::number('ammunition_surrendered[]', @$m_no, [
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

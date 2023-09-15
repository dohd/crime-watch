<section id="firearm-input" class="hide">
    @php
        // browserLog($firearms);
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
                            <div class="col-xl-2 col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label">{{ $row->name }}</label>
                                    <div class="input-group mb-2">
                                        {!! Form::hidden('firearm_id[]', $row->id) !!}
                                        {!! Form::number('firearm_recov[]', null, [
                                            'placeholder' => 'Recovered',
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'id' => 'fa_recov_' . $key,
                                        ]) !!}
                                        {!! Form::number('firearm_used[]', null, [
                                            'placeholder' => 'Used',
                                            'class' => 'form-control',
                                            'min' => '0',
                                            'id' => 'fa_used_' . $key,
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

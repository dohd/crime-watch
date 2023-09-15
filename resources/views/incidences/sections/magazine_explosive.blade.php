<section id="magnexpl-input" class="{{ $gambling == 1 ? '' : 'hide' }}">
    @php
        
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">MAGAZINE & EXPLOSIVE</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">Magazine</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('firearm_magazine', @$m_arrest_no, [
                                        'placeholder' => 'Magazine',
                                        'class' => '  form-control',
                                        'min' => '0',
                                        'id' => 'magazine',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <label class="form-label">Explosive</label>
                            <div class="input-group mb-2">
                                {!! Form::number('firearm_explosive', @$m_arrest_no, [
                                    'placeholder' => 'Explosive',
                                    'class' => '  form-control',
                                    'min' => '0',
                                    'id' => 'explosive',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="gambling-input" class="{{ $gambling == 1 ? '' : 'hide' }}">
    @php
        $gambling = @$incidentrecord->gambling;        
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-header">
                    <h4 class="card-title">GAMBLING</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">Machines</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('m_arrest_no', @$gambling->m_arrest_no, [
                                        'placeholder' => 'Arrest',
                                        'class' => '  form-control',
                                        'min' => '0',
                                        'id' => 'm_arrest_no',
                                    ]) !!}
                                    {!! Form::number('m_no', @$gambling->m_no, [
                                        'placeholder' => 'No',
                                        'class' => '  form-control',
                                        'min' => '0',
                                        'id' => 'm_no',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">Cards</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('c_arrest_no', @$gambling->c_arrest_no, [
                                        'placeholder' => 'Arrest',
                                        'class' => 'form-control',
                                        'min' => '0',
                                        'id' => 'c_arrest',
                                    ]) !!}
                                    {!! Form::number('c_no', @$gambling->c_no, [
                                        'placeholder' => 'No',
                                        'class' => '  form-control',
                                        'min' => '0',
                                        'id' => 'c_no',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label">Pool</label>
                                <div class="input-group mb-2">
                                    {!! Form::number('p_arrest_no', @$gambling->p_arrest_no, [
                                        'placeholder' => 'Arrest',
                                        'class' => '  form-control',
                                        'min' => '0',
                                        'id' => 'p_arrest',
                                    ]) !!}
                                    {!! Form::number('p_no', @$gambling->p_no, [
                                        'placeholder' => 'No',
                                        'class' => '  form-control',
                                        'min' => '0',
                                        'id' => 'p_no',
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

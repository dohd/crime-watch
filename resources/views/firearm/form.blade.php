<section>
    <div class="row" id="basic-table">
        @php
            $date_commited = isset($firearmincidences) ? dateFormat($firearmincidences->date_commited) : null;
            $date_commited_class = isset($firearmincidences) ? 'flatpickr-basic-blank' : 'flatpickr-basic';
        @endphp
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">FIREARM</h4>
                    <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                        <label class="form-label" for="region">Date</label>
                        {!! Form::text('date_commited', $date_commited, [
                            'placeholder' => 'Enter  No',
                            'class' => '  form-control ' . $date_commited_class . ' ',
                            'id' => 'date_commited',
                            'required' => 'required',
                        ]) !!}
                    </div>
                </div>
                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-dark frozen-header">
                            <tr>
                                <th rowspan="2">COUNTY</th>
                                @foreach ($firearms as $firearm)
                                    <th colspan="2">{{ $firearm->name }}</th>
                                @endforeach
                                <th colspan="2">TOTALS</th>
                                <th rowspan="2">GRAND TOTAL</th>
                            </tr>
                            <tr>
                                @foreach ($firearms as $firearm)
                                    <th>R</th>
                                    <th>S</th>
                                @endforeach
                                <th>R</th>
                                <th>S</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counties as $county)
                                <tr>
                                    <td>{{ $county->name }}</td>
                                    @foreach ($firearms as $firearm)
                                        @php
                                            $val = null;
                                            $val_two = null;
                                        @endphp
                                        @if (isset($firearmincidences))
                                            @php
                                                $val = 0;
                                                $val_two = 0;
                                            @endphp
                                            @foreach ($firearmincidences->firearmAmunations as $data)
                                                @if ($data->county_id == $county->id && $data->firearm_id == $firearm->id)
                                                    @php
                                                        $val = $data->surrendered;
                                                        $val_two = $data->recovered;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <td>{!! Form::number('recovered[]', $val, [
                                            'class' => 'data-input-r',
                                            'id' => 'recovered_' . $county->id . '_' . $firearm->id . '',
                                            'style' => 'width:30px;',
                                        ]) !!}</td>
                                        <td>{!! Form::number('surrendered[]', $val_two, [
                                            'class' => 'data-input-s',
                                            'id' => 'surrendered' . $county->id . '_' . $firearm->id . '',
                                            'style' => 'width:30px;',
                                        ]) !!}</td>
                                        {!! Form::hidden('f_county_id[]', $county->id) !!}
                                        {!! Form::hidden('f_firearm_id[]', $firearm->id) !!}
                                    @endforeach
                                    <td class="r-total">0</td>
                                    <td class="s-total">0</td>
                                    <td class="g-total">0</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                @foreach ($firearms as $firearm)
                                    <th class="rs_total">0</th>
                                    <th class="ss_total">0</th>
                                @endforeach
                                <th class="rg_total">0</th>
                                <th class="sg_total">0</th>
                                <th class="g_total">0</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">AMMUNATION </h4>
                </div>
                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th rowspan="2">AMMUNATION</th>
                                @foreach ($ammunations as $ammunation)
                                    <th colspan="2">{{ $ammunation->name }}</th>
                                @endforeach
                                <th colspan="2">TOTALS</th>
                                <th rowspan="2">GRAND TOTAL</th>
                            </tr>
                            <tr>
                                @foreach ($ammunations as $ammunation)
                                    <th>R</th>
                                    <th>S</th>
                                @endforeach
                                <th>R</th>
                                <th>S</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counties as $county)
                                <tr>
                                    <td>{{ $county->name }}</td>
                                    @foreach ($ammunations as $ammunation)
                                        @php
                                            $val = null;
                                            $val_two = null;
                                        @endphp
                                        @if (isset($firearmincidences))
                                            @php
                                                $val = 0;
                                                $val_two = 0;
                                            @endphp
                                            @foreach ($firearmincidences->firearmAmmino as $data)
                                                @if ($data->county_id == $county->id && $data->ammunition_id == $ammunation->id)
                                                    @php
                                                        $val = $data->surrendered;
                                                        $val_two = $data->recovered;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <td>{!! Form::number('arecovered[]', $val, [
                                            'class' => 'data-input-ar',
                                            'id' => 'recovered_' . $county->id . '_' . $ammunation->id . '',
                                            'style' => 'width:30px;',
                                        ]) !!}</td>
                                        <td>{!! Form::number('asurrendered[]', $val_two, [
                                            'class' => 'data-input-as',
                                            'id' => 'surrendered' . $county->id . '_' . $ammunation->id . '',
                                            'style' => 'width:30px;',
                                        ]) !!}
                                            {!! Form::hidden('a_county_id[]', $county->id) !!}
                                            {!! Form::hidden('ammunition_id[]', $ammunation->id) !!}</td>
                                    @endforeach
                                    <td class="ar-total">0</td>
                                    <td class="as-total">0</td>
                                    <td class="ag-total">0</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                @foreach ($ammunations as $ammunation)
                                    <th class="ars_total">0</th>
                                    <th class="ass_total">0</th>
                                @endforeach
                                <th class="arg_total">0</th>
                                <th class="asg_total">0</th>
                                <th class="ag_total">0</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">MAGAZINE & EXPLOSIVE </h4>
                </div>
                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered" id="dataTable_new">
                        <thead class="table-dark">
                            <tr>
                                <th>COUNTY</th>
                                <th>MAGAZINE</th>
                                <th>EXPLOSIVE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counties as $county)
                                <tr>
                                    <td>{{ $county->name }}</td>
                                    @php
                                        $val = null;
                                        $val_two = null;
                                    @endphp
                                    @if (isset($firearmincidences))
                                        @php
                                            $val = 0;
                                            $val_two = 0;
                                        @endphp
                                        @foreach ($firearmincidences->ammunoExposive as $data)
                                            @if ($data->county_id == $county->id)
                                                @php
                                                    $val = $data->magazine;
                                                    $val_two = $data->explosive;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                    <td>{!! Form::number('magazine[]', $val, [
                                        'class' => 'data-input-m',
                                        'id' => 'magazine' . $county->id . '',
                                        'style' => 'width:30px;',
                                    ]) !!}</td>
                                    <td>{!! Form::number('explosive[]', $val_two, [
                                        'class' => 'data-input-e',
                                        'id' => 'explosive' . $county->id . '',
                                        'style' => 'width:30px;',
                                    ]) !!}
                                        {!! Form::hidden('e_county_id[]', $county->id) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                <th class="m_total">0</th>
                                <th class="e_total">0</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

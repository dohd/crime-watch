<section>
    <div class="row" id="basic-table">
        @php
            $date_commited = isset($sbvgincidence) ? dateFormat($sbvgincidence->date_commited) : null;
            $date_commited_class = isset($sbvgincidence) ? 'flatpickr-basic-blank' : 'flatpickr-basic';
        @endphp
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">REPORT BY COUNTIES</h4>
                    <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                        <label class="form-label" for="region">Date</label>
                        {!! Form::text('date_commited', $date_commited, [
                            'placeholder' => 'DD-MM-YYYY',
                            'class' => '  form-control ' . $date_commited_class . ' ',
                            'id' => 'date_commited',
                            'required' => 'required',
                        ]) !!}
                    </div>
                </div>
                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered" id="dataTable">
                        <thead class="table-dark ">
                            <tr>
                                <th>OFFENCES</th>
                                @foreach ($counties as $county)
                                    <th>{{ $county->name }}</th>
                                @endforeach
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($crimesources as $crimesource)
                                <tr>
                                    <td>{{ $crimesource->name }}</td>
                                    @foreach ($counties as $county)
                                        @php
                                            $val = null;
                                        @endphp
                                        @if (isset($sbvgincidence))
                                            @php
                                                $val = 0;
                                            @endphp
                                            @foreach ($sbvgincidence->reportByCounty as $data)
                                                @if ($data->county_id == $county->id && $data->incident_file_id == $crimesource->id)
                                                    @php
                                                        $val = $data->offence;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <td>{!! Form::number('offence[]', $val, [
                                            'class' => 'data-input-c',
                                            'id' => 'coffence' . $county->id . '_' . $crimesource->id . ' ',
                                            'style' => 'width:30px;',
                                        ]) !!}
                                            {!! Form::hidden('incident_file_id[]', $crimesource->id) !!}
                                            {!! Form::hidden('county_id[]', $county->id) !!}</td>
                                    @endforeach
                                    <td class="c_total">0</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                @foreach ($counties as $county)
                                    <th id="rfooter_{{ $county->id }}" class="cs_total">0</th>
                                @endforeach
                                <th class="cg_total">0</th>
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
                    <h4 class="card-title">ACCUSED OF SGBV CRIMES </h4>
                </div>
                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-dark frozen-header">
                            <tr>
                                <th rowspan="2">OFFENCES</th>
                                @foreach ($agegroupings as $agegrouping)
                                    <th colspan="2">{{ $agegrouping->name }}</th>
                                @endforeach
                                <th colspan="2">TOTAL</th>
                            </tr>
                            <tr>
                                @foreach ($agegroupings as $agegrouping)
                                    <th>M</th>
                                    <th>F</th>
                                @endforeach
                                <th>M</th>
                                <th>F</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($crimesources as $crimesource)
                                <tr>
                                    <td>{{ $crimesource->name }}</td>
                                    @foreach ($agegroupings as $agegrouping)
                                        @php
                                            $val = null;
                                            $val_two = null;
                                        @endphp
                                        @if (isset($sbvgincidence))
                                            @php
                                                $val = 0;
                                                $val_two = 0;
                                            @endphp
                                            @foreach ($sbvgincidence->reportByAccusedVictims as $data)
                                                @if ($data->age_grouping_id == $agegrouping->id && $data->incident_file_id == $crimesource->id && $data->type == 1)
                                                    @php
                                                        $val = $data->m_offence;
                                                        $val_two = $data->f_offence;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <td>{!! Form::number('am_offence[]', $val, [
                                            'class' => 'data-input-am',
                                            'id' => 'amoffence' . $crimesource->id . '_' . $agegrouping->id . ' ',
                                            'style' => 'width:30px;',
                                        ]) !!}</td>
                                        <td>{!! Form::number('af_offence[]', $val_two, [
                                            'class' => 'data-input-af',
                                            'id' => 'afoffence' . $crimesource->id . '_' . $agegrouping->id . ' ',
                                            'style' => 'width:30px;',
                                        ]) !!}
                                            {!! Form::hidden('a_incident_file_id[]', $crimesource->id) !!}
                                            {!! Form::hidden('a_age_grouping_id[]', $agegrouping->id) !!}</td>
                                    @endforeach
                                    <td class="am_total">0</td>
                                    <td class="af_total">0</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                @foreach ($agegroupings as $agegrouping)
                                    <th id="amsfooter_{{ $agegrouping->id }}" class="ams_total">0</th>
                                    <th id="afsfooter_{{ $agegrouping->id }}" class="afs_total">0</th>
                                @endforeach
                                <th class="amg_total">0</th>
                                <th class="afg_total">0</th>
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
                    <h4 class="card-title">VICTIM OF SGBV CRIMES </h4>
                </div>
                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered" id="dataTable_new">
                        <thead class="table-dark frozen-header">
                            <tr>
                                <th rowspan="2">OFFENCES</th>
                                @foreach ($agegroupings as $agegrouping)
                                    <th colspan="2">{{ $agegrouping->name }}</th>
                                @endforeach
                                <th colspan="2">TOTAL</th>
                            </tr>
                            <tr>
                                @foreach ($agegroupings as $agegrouping)
                                    <th>M</th>
                                    <th>F</th>
                                @endforeach
                                <th>M</th>
                                <th>F</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($crimesources as $crimesource)
                                <tr>
                                    <td>{{ $crimesource->name }}</td>
                                    @foreach ($agegroupings as $agegrouping)
                                        @php
                                            $val = null;
                                            $val_two = null;
                                        @endphp
                                        @if (isset($sbvgincidence))
                                            @php
                                                $val = 0;
                                                $val_two = 0;
                                            @endphp
                                            @foreach ($sbvgincidence->reportByAccusedVictims as $data)
                                                @if ($data->age_grouping_id == $agegrouping->id && $data->incident_file_id == $crimesource->id && $data->type == 2)
                                                    @php
                                                        $val = $data->m_offence;
                                                        $val_two = $data->f_offence;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <td>{!! Form::number('vm_offence[]', $val, [
                                            'class' => 'data-input-vm',
                                            'id' => 'vmoffence' . $crimesource->id . '_' . $agegrouping->id . ' ',
                                            'style' => 'width:30px;',
                                        ]) !!}</td>
                                        <td>{!! Form::number('vf_offence[]', $val_two, [
                                            'class' => 'data-input-vf',
                                            'id' => 'vfoffence' . $crimesource->id . '_' . $agegrouping->id . ' ',
                                            'style' => 'width:30px;',
                                        ]) !!}
                                            {!! Form::hidden('v_incident_file_id[]', $crimesource->id) !!}
                                            {!! Form::hidden('v_age_grouping_id[]', $agegrouping->id) !!}
                                        </td>
                                    @endforeach
                                    <td class="vm_total">0</td>
                                    <td class="vf_total">0</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                @foreach ($agegroupings as $agegrouping)
                                    <th id="vmsfooter_{{ $agegrouping->id }}" class="vms_total">0</th>
                                    <th id="vfsfooter_{{ $agegrouping->id }}" class="vfs_total">0</th>
                                @endforeach
                                <th class="vmg_total">0</th>
                                <th class="vfg_total">0</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

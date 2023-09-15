<section id="basic-input">
    <div class="row">
        @php
            $date_commited = isset($trafficincidence) ? dateFormat($trafficincidence->date_commited) : null;
            $date_commited_class = isset($trafficincidence) ? 'flatpickr-basic-blank' : 'flatpickr-basic';
        @endphp
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">(A) ACCIDENT REPORT</h4>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>CATEGORY</th>
                                    @foreach ($categories as $category)
                                        <th>{{ $category->name }}</th>
                                    @endforeach
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td>{{ $type->name }}</td>
                                        @foreach ($categories as $category)
                                            @php
                                                $val = null;
                                            @endphp
                                            @if (isset($trafficincidence))
                                                @php
                                                    $val = 0;
                                                @endphp
                                                @foreach ($trafficincidence->reportByCategory as $data)
                                                    @if ($data->traffi_category_id == $category->id && $data->traffic_type_id == $type->id)
                                                        @php
                                                            $val = $data->c_report_value;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif
                                            <td>{!! Form::text('c_report_value[]', $val, [
                                                'class' => 'data-input',
                                                'id' => 'creportvalue' . $type->id . '_' . $category->id . '',
                                                'style' => 'width:30px;',
                                            ]) !!}
                                                {!! Form::hidden('traffi_category_id[]', $category->id) !!}
                                                {!! Form::hidden('traffic_type_id[]', $type->id) !!}</td>
                                        @endforeach
                                        <td class="total">0</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>TOTAL</td>
                                    @foreach ($categories as $category)
                                        <th id="footer_{{ $category->id }}" class="s_total">0</th>
                                    @endforeach
                                    <th class="g_total">0</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">(B) REGIONAL</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable_new">
                            <thead class="table-dark">
                                <tr>
                                    <th rowspan="2">Region</th>
                                    <th colspan="4">ACCIDENT</th>
                                    <th colspan="4">VICTIMS</th>
                                </tr>
                                <tr>
                                    @foreach ($types as $type)
                                        <th>{{ $type->name }}</th>
                                    @endforeach
                                    <th>TOTAL</th>
                                    @foreach ($types as $type)
                                        <th>{{ $type->name }}</th>
                                    @endforeach
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regions as $region)
                                    <tr>
                                        <td>{{ $region->name }}</td>
                                        @foreach ($types as $type)
                                            @php
                                                $rval = null;
                                            @endphp
                                            @if (isset($trafficincidence))
                                                @php
                                                    $rval = 0;
                                                @endphp
                                                @foreach ($trafficincidence->reportByRegion as $rdata)
                                                    @if ($rdata->region_id == $region->id && $rdata->traffic_type_id == $type->id && $rdata->report_type == 1)
                                                        @php
                                                            $rval = $rdata->report_value;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif
                                            <td>{!! Form::text('ra_report_value[]', $rval, [
                                                'class' => 'data-input-ra',
                                                'id' => 'rareportvalue' . $region->id . '_' . $type->id . '',
                                                'style' => 'width:30px;',
                                            ]) !!}
                                                {!! Form::hidden('a_region_id[]', $region->id) !!}
                                                {!! Form::hidden('a_traffic_type_id[]', $type->id) !!}</td>
                                        @endforeach
                                        <td class="ra_total">0</td>
                                        @foreach ($types as $type)
                                            @php
                                                $vval = null;
                                            @endphp
                                            @if (isset($trafficincidence))
                                                @php
                                                    $vval = 0;
                                                @endphp
                                                @foreach ($trafficincidence->reportByRegion as $vdata)
                                                    @if ($vdata->region_id == $region->id && $vdata->traffic_type_id == $type->id && $vdata->report_type == 2)
                                                        @php
                                                            $vval = $vdata->report_value;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif
                                            <td>{!! Form::text('rv_report_value[]', $vval, [
                                                'class' => 'data-input-rv',
                                                'id' => 'rvreportvalue' . $region->id . '_' . $type->id . '',
                                                'style' => 'width:30px;',
                                            ]) !!}{!! Form::hidden('v_region_id[]', $region->id) !!}
                                                {!! Form::hidden('v_traffic_type_id[]', $type->id) !!}</td>
                                        @endforeach
                                        <td class="rv_total">0</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>TOTAL</td>
                                    @foreach ($types as $type)
                                        <th id="ra_footer_{{ $type->id }}" class="ras_total">0</th>
                                    @endforeach
                                    <th class="ga_total">0</th>
                                    @foreach ($types as $type)
                                        <th id="rv_footer_{{ $type->id }}" class="rvs_total">0</th>
                                    @endforeach
                                    <th class="gv_total">0</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">(C) NEW TRAFFIC RULES </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-wrapper">
                        <table class="table table-bordered " id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>Enforcement Action</th>
                                    @foreach ($regions as $region)
                                        <th>{{ $region->name }}</th>
                                    @endforeach
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tactions as $taction)
                                    <tr>
                                        <td>{{ $taction->name }}</td>
                                        @foreach ($regions as $region)
                                            @php
                                                $tval = null;
                                            @endphp
                                            @if (isset($trafficincidence))
                                                @php
                                                    $tval = 0;
                                                @endphp
                                                @foreach ($trafficincidence->reportByRules as $tdata)
                                                    @if ($tdata->region_id == $region->id && $tdata->traffic_enforcement_action_id == $taction->id)
                                                        @php
                                                            $tval = $tdata->report_value;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif
                                            <td>{!! Form::text('r_report_value[]', $tval, [
                                                'class' => 'data-input-r',
                                                'id' => 'rreportvalue' . $region->id . '',
                                                'style' => 'width:30px;',
                                            ]) !!}
                                                {!! Form::hidden('traffic_enforcement_action_id[]', $taction->id) !!}
                                                {!! Form::hidden('r_region_id[]', $region->id) !!}
                                            </td>
                                        @endforeach
                                        <td class="r_total">0</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>TOTAL</td>
                                    @foreach ($regions as $region)
                                        <th id="rfooter_{{ $region->id }}" class="rs_total">0</th>
                                    @endforeach
                                    <th class="gr_total">0</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">(D) IMPOSED FINES PER REGIONS (KShs.) </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable_new">
                            <thead class="table-dark">
                                <tr>
                                    <th>REGIONS </th>
                                    <th>Fines</th>
                                    <th>Forfeitures</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regions as $region)
                                    @php
                                        $fval = null;
                                        $frval = null;
                                    @endphp
                                    @if (isset($trafficincidence))
                                        @php
                                            $fval = 0;
                                            $frval = 0;
                                        @endphp
                                        @foreach ($trafficincidence->reportByFines as $fdata)
                                            @if ($fdata->region_id == $region->id)
                                                @php
                                                    $fval = $fdata->fine_value;
                                                    $frval = $fdata->forfeit_value;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td>{{ $region->name }}</td>
                                        <td>
                                            {!! Form::text('fine_value[]', $fval, [
                                            'class' => 'data-input-f',
                                            'id' => 'ffinereportvalue' . $region->id . '',
                                            'style' => 'width:100px;',
                                        ]) !!}</td>
                                        <td>{!! Form::text('forfeit_value[]', $frval, [
                                            'class' => 'data-input-f',
                                            'id' => 'fforfeitreportvalue' . $region->id . '',
                                            'style' => 'width:100px;',
                                        ]) !!} {!! Form::hidden('f_region_id[]', $region->id) !!}</td>
                                        <td class="f_total">0</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>TOTAL</td>
                                    <th id="ffinefooter_{{ $region->id }}" class="fs_total">0</th>
                                    <th id="ffooter_{{ $region->id }}" class="fs_total">0</th>
                                    <th class="gf_total">0</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

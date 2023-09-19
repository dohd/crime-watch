<section id="regional_report" class="report {!! @$trafficincidence && $trafficincidence->reportByRegion->count()? '' : 'd-none'  !!}">
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
                                            <td>{!! Form::number('ra_report_value[]', $rval, [
                                                'class' => 'data-input-ra',
                                                'id' => 'rareportvalue' . $region->id . '_' . $type->id . '',
                                                'style' => 'width:80px;',
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
                                            <td>{!! Form::number('rv_report_value[]', $vval, [
                                                'class' => 'data-input-rv',
                                                'id' => 'rvreportvalue' . $region->id . '_' . $type->id . '',
                                                'style' => 'width:80px;',
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

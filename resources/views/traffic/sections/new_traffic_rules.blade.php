<section id="traffic_rules" class="report {!! @$trafficincidence && $trafficincidence->reportByRules->count()? '' : 'd-none'  !!}">
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
                                            <td>{!! Form::number('r_report_value[]', $tval, [
                                                'class' => 'data-input-r',
                                                'id' => 'rreportvalue' . $region->id . '',
                                                'style' => 'width:80px;',
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

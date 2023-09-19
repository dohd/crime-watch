<section id="impossed_fine" class="report {!! @$trafficincidence && $trafficincidence->reportByFines->count()? '' : 'd-none'  !!}">
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
                                        <td>{!! Form::number('fine_value[]', $fval, [
                                            'class' => 'data-input-f',
                                            'id' => 'ffinereportvalue' . $region->id . '',
                                            'style' => 'width:100px;',
                                        ]) !!}</td>
                                        <td>{!! Form::number('forfeit_value[]', $frval, [
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

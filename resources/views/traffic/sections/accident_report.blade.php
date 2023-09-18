<section id="accident_report" class="report {!! @$trafficincidence && $trafficincidence->reportByCategory->count()? '' : 'd-none'  !!}">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">(A) ACCIDENT REPORT</h4>
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
                                            <td>{!! Form::number('c_report_value[]', $val, [
                                                'class' => 'data-input',
                                                'id' => 'creportvalue' . $type->id . '_' . $category->id . '',
                                                'style' => 'width:80px;',
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
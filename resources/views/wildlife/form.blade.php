  <!-- Basic Inputs start -->
  <section id="wildlife-input" >
    <div class="row">
        @php
        $date_commited = isset($wildlifeincidence) ? dateFormat($wildlifeincidence->date_commited) : null;
        $date_commited_class = isset($wildlifeincidence) ? 'flatpickr-basic-blank' : 'flatpickr-basic';
    @endphp
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-header">
                <h4 class="card-title">WILDLIFE STATISTICS </h4>
            </div>
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
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive table-wrapper">
                            <table class="table table-bordered" id="myTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>OFFENCES</th>
                                        @foreach ($regions as $region)
                                        <th >{{ $region->name }}</th>
                                            @endforeach
                                            <th >TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incidences as $incident)
                                    <tr>
                                        <td>{{ $incident->name }}</td>
                                        @foreach ($regions as $region)
                                        @php
                                        $val = null;
                                    @endphp
                                    @if (isset($wildlifeincidence))
                                        @php
                                            $val = 0;
                                        @endphp
                                        @foreach ($wildlifeincidence->wildlifeStastics as $data)
                                            @if ($data->region_id == $region->id && $data->incident_file_id == $incident->id)
                                                @php
                                                    $val = $data->statistic_value;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                        <td >{!! Form::number('statistic_value[]',  $val, [
                                            'class' => 'data-input',
                                            'id' => 'statistic_value' . $region->id .'_'.$incident->id.'',
                                            'style' => 'width:80px;',
                                        ]) !!}{!! Form::hidden('region_id[]', $region->id) !!} 
                                        {!! Form::hidden('incident_file_id[]', $incident->id) !!}</td>
                                            @endforeach
                                            <td class="total">0</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>TOTAL</td>
                                        @foreach ($regions as $region)
                                            <th id="rfooter_{{ $region->id }}" class="s_total">0</th>
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
        </div>
        </div>
    </div>
</section>
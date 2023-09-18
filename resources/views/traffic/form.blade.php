<section id="basic-input">
    <div class="row">
        @php
            $date_commited = isset($trafficincidence) ? dateFormat($trafficincidence->date_commited) : null;
            $date_commited_class = isset($trafficincidence) ? 'flatpickr-basic-blank' : 'flatpickr-basic';
        @endphp
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="helperText">Report Type</label>
                                {!! Form::select(
                                    'report_type',
                                    ['accident_report' => 'Accident Report', 'regional_report' => 'Regional Report', 'traffic_rules' => 'New Traffic Rules', 'impossed_fine' => 'Impossed Fines Per Region'],
                                    request('report_type'),
                                    [
                                        'placeholder' => '-- Select  --',
                                        'class' => ' select2 form-control',
                                        'id' => 'report_type',
                                        @$trafficincidence? '' : 'required',
                                    ],
                                ) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4 ms-auto">
                                <label class="form-label" for="region">Date</label>
                                {!! Form::text('date_commited', $date_commited, [
                                    'placeholder' => 'DD-MM-YYYY',
                                    'class' => '  form-control ' . $date_commited_class . ' ',
                                    'id' => 'date_commited',
                                    'required' => 'required',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----- start accident report ----->
@include('traffic.sections.accident_report')
<!----- end accident report ----->
<!----- start regional report ----->
@include('traffic.sections.regional_report')
<!----- end regional report ----->
<!----- start new traffic rules report ----->
@include('traffic.sections.new_traffic_rules')
<!----- end new traffic rules report ----->
<!----- start impossed fines report ----->
@include('traffic.sections.impossed_fines')
<!----- end impossed fines report ----->

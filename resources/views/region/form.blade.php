<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    @php
            $date_commited = isset($regionincidences) ? dateFormat($regionincidences->date_commited) : null;
            $date_commited_class = isset($regionincidences) ? 'flatpickr-basic-blank' : 'flatpickr-basic';
            $countiespluck = isset($regionincidences) ? $countries  : [];
            $divisionspluck = isset($regionincidences) ? $divisionsdropdown  : [];

            
            
        @endphp

                    

                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="region">Date</label>
                            {!! Form::text('date_commited', $date_commited, [
                                'placeholder' => 'DD-MM-YYYY',
                                'class' => '  form-control ' . $date_commited_class . ' ',
                                'id' => 'date_commited',
                                'required' => 'required',
                            ]) !!}
                        </div>

                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helperText">Region</label>
                                {!! Form::select(
                                    'region_id',
                                    $regions,
                                    null,
                                    [
                                        'placeholder' => '-- Enter Region --',
                                        'class' => 'select2 form-control',
                                        'id' => 'region_id',
                                        'required' => 'required',
                                    ],
                                ) !!}
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helperText">County</label>
                                {!! Form::select(
                                    'county_id',
                                    $countiespluck,
                                    null,
                                    [
                                        'placeholder' => '-- Enter County --',
                                        'class' => ' select2 form-control',
                                        'id' => 'county_id',
                                        'required' => 'required',
                                    ],
                                ) !!}
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helperText">Sub-County</label>
                                {!! Form::select(
                                    'division_id',
                                    $divisionspluck,
                                    null,
                                    [
                                        'placeholder' => '-- Enter Sub-County --',
                                        'class' => ' select2 form-control',
                                        'id' => 'division_id',
                                        'required' => 'required',
                                    ],
                                ) !!}
                            </div>
                        </div>
                     
                    </div>
                   
                   
                
                </div>
            </div>
        </div>
    </div>
</section>


<!-----Special report--->
<div  id="load_divisions">
    @if (isset($regionincidences) )
    @if (count($stations)>0)
    
    <section >
        <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $subcounty->name  }} [SUB COUNTY] </h4>
            </div>
         
            <div class="table-responsive table-wrapper">
                <table class="table table-bordered" id="myTable">
                    <thead class="table-dark">
                        <tr>
                           
                            <th>CATEGORY OF OFFENCE</th>
             
                            @foreach ($stations as $station)
                            <th >{{ $station->name }}</th>
                        
                              @endforeach
                              <th >TOTAL</th>
                            
                        </tr>
    
                     
                    </thead>
                    <tbody>
                        @foreach ($crimes as $crime)
                       
                        @foreach ($crime->incidences as $incidence)
                        <tr>
                            <td>{{ $incidence->name }}</td>
    
                          @foreach ($stations as $station)
                          @php
                          $val = null;
                      @endphp
                      @if (isset($regionincidences))
                          @php
                              $val = 0;
                          @endphp
                          @foreach ($regionincidences->regionStatistics as $data)
                              @if ($data->station_id == $station->id && $data->incident_file_id == $incidence->id)
                                  @php
                                      $val = $data->statistic_value;
                                  @endphp
                              @endif
                          @endforeach
                      @endif


                            <td >{!! Form::number('statistic_value[]', $val, [
                              'class' => 'data-input',
                              'id' => 'statistic_value' . $station->id .'_'.$crime->id.'',
                              'data-division-id' => $station->id,
                              'crime-id' => $crime->id,
                              'style' => 'width:30px;',
                          ]) !!}{!! Form::hidden('station_id[]', $station->id) !!} 
                          {!! Form::hidden('incident_file_id[]', $incidence->id) !!}</td>
                           
                              @endforeach
                              <td class="column_total">0</td>
                        </tr>
                      
                        @endforeach
                        <tr class="table-primary">
                            <td>TOTAL</td>
                            @foreach ($stations as $station)
                            <td class="row_total">0</td>
                            @endforeach
                            <td class="total">0</td>
                        </tr>
                        @endforeach
                    
                      
                    </tbody>
                    <tfoot class="table-warning">
                      <tr >
                          <td>TOTAL</td>
                          @foreach ($stations as $station)
                              <th id="rfooter_{{ $station->id }}" class="sub_total">0</th>
                          @endforeach
                          <th class="grand_total">0</th>
                      </tr>
                  </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>
                  
    </section>
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        {{ Form::submit('Save Record', ['class' => 'btn btn-primary me-1 data-submit', 'id' => 'submit-data']) }}
                        {{ Form::reset('Cancel', ['class' => 'btn btn-outline-secondary', 'data-bs-dismiss' => 'modal']) }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
   
    @endif
</div>



<!-- Alians-->
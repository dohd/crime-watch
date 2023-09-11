<section id="basic-input">
    <div class="card bg-primary text-white">
        <div class="card-header">
            <h4 class="card-title text-white"> SGBV REPORT REPORT BY COUNTY - {{ $county_name }} </h4>
            <a class="btn btn-warning" href="{{ route('print-sgbv-report-by-county', [encrypt_data($county_id),encrypt_data($daterange)]) }}" target="_blank">
                <i data-feather="printer" class="me-25 text-white"></i>
                <span>Print</span>
            </a> 
    </div>
</div>
<div class="table-responsive table-wrapper">
    <table class="table table-bordered" id="dataTable">
        <thead class="table-dark ">
            <tr>
                <th>OFFENCES</th>
                @foreach ($allcounties as $county)
                    <th>{{ $county->name }}</th>
                @endforeach
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crimesources as $crimesource)
                <tr>
                    <td>{{ $crimesource->name }}</td>
                    @php
                    $cval = 0;
                      @endphp
                @foreach ($sgbvs as $data)
                    @if ($data->incident_file_id == $crimesource->id)
                        @php
                            $cval+= $data->m_zero_to_nine+$data->f_zero_to_nine+$data->m_ten_to_fourteen+$data->f_ten_to_fourteen+$data->m_fifteen_to_seventeen+$data->f_fifteen_to_seventeen+$data->m_eighteen_to_nineteen+$data->f_eighteen_to_nineteen+$data->m_twenty_to_twentyfour+$data->f_twenty_to_twentyfour+$data->m_twenty_five_to_twentynine+$data->f_twenty_five_to_twentynine+$data->m_thirty_to_fortyfour+$data->f_thirty_to_fortyfour+$data->m_fortyfive_to_fiftynine+$data->f_fortyfive_to_fiftynine+$data->m_sixty_and_above+$data->f_sixty_and_above;
                        @endphp
                    @endif
                @endforeach
                    @foreach ($allcounties as $county)
                    @php
                        $val = 0;
                    @endphp
                    @foreach ($sgbvs as $data)
                        @if ($data->sgbvincidence->county_id == $county->id && $data->incident_file_id == $crimesource->id)
                            @php
                                $val+= $data->m_zero_to_nine+$data->f_zero_to_nine+$data->m_ten_to_fourteen+$data->f_ten_to_fourteen+$data->m_fifteen_to_seventeen+$data->f_fifteen_to_seventeen+$data->m_eighteen_to_nineteen+$data->f_eighteen_to_nineteen+$data->m_twenty_to_twentyfour+$data->f_twenty_to_twentyfour+$data->m_twenty_five_to_twentynine+$data->f_twenty_five_to_twentynine+$data->m_thirty_to_fortyfour+$data->f_thirty_to_fortyfour+$data->m_fortyfive_to_fiftynine+$data->f_fortyfive_to_fiftynine+$data->m_sixty_and_above+$data->f_sixty_and_above;
                            @endphp
                        @endif
                    @endforeach
                        <td>{{ $val }}</td>
                    @endforeach
                    <td class="c_total">{{ $cval }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>TOTAL</td>
                @php
                $gtval = 0;
                @endphp
                @foreach ($allcounties as $county)
                @php
                $val = 0;
               @endphp
               @foreach ($sgbvs as $data)
                @if ($data->sgbvincidence->county_id == $county->id)
                    @php
                        $val+= $data->m_zero_to_nine+$data->f_zero_to_nine+$data->m_ten_to_fourteen+$data->f_ten_to_fourteen+$data->m_fifteen_to_seventeen+$data->f_fifteen_to_seventeen+$data->m_eighteen_to_nineteen+$data->f_eighteen_to_nineteen+$data->m_twenty_to_twentyfour+$data->f_twenty_to_twentyfour+$data->m_twenty_five_to_twentynine+$data->f_twenty_five_to_twentynine+$data->m_thirty_to_fortyfour+$data->f_thirty_to_fortyfour+$data->m_fortyfive_to_fiftynine+$data->f_fortyfive_to_fiftynine+$data->m_sixty_and_above+$data->f_sixty_and_above;
                    @endphp
                @endif
               @endforeach
          
                    <th id="rfooter_{{ $county->id }}" class="cs_total">{{ $val }}</th>
                @endforeach
                @php
                $gtval = 0;
                @endphp
                @foreach ($sgbvs as $data)
                
                    @php
                        $gtval+= $data->m_zero_to_nine+$data->f_zero_to_nine+$data->m_ten_to_fourteen+$data->f_ten_to_fourteen+$data->m_fifteen_to_seventeen+$data->f_fifteen_to_seventeen+$data->m_eighteen_to_nineteen+$data->f_eighteen_to_nineteen+$data->m_twenty_to_twentyfour+$data->f_twenty_to_twentyfour+$data->m_twenty_five_to_twentynine+$data->f_twenty_five_to_twentynine+$data->m_thirty_to_fortyfour+$data->f_thirty_to_fortyfour+$data->m_fortyfive_to_fiftynine+$data->f_fortyfive_to_fiftynine+$data->m_sixty_and_above+$data->f_sixty_and_above;
                    @endphp
              
               @endforeach


                <th class="cg_total">{{ $gtval }}</th>
            </tr>
        </tfoot>
    </table>
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
                           
                                <th colspan="2">0 - 9YRS</th>
                                <th colspan="2">10 - 14YRS</th>
                                <th colspan="2">15 - 17YRS</th>
                                <th colspan="2">18 - 19YRS</th>
                                <th colspan="2">20 - 24YRS</th>
                                <th colspan="2">25 - 29YRS</th>
                                <th colspan="2">30 - 44YRS</th>
                                <th colspan="2">45 - 59YRS</th>
                                <th colspan="2">60 YRS & ABOVE</th>
                                 <th colspan="2">TOTAL</th>
                        </tr>
                        <tr>
                          
                            
                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>
                                
                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>
                         
                                <th>M</th>
                                <th>F</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crimesources as $crimesource)


                        @php
                        $m_nine=0;
                        $f_nine=0;
                        $m_ten=0;
                        $f_ten=0;
                        $m_fifteen=0;
                        $f_fifteen=0;
                        $m_eighteen=0;
                        $f_eighteen=0;
                        $m_twenty=0;
                        $f_twenty=0;
                        $m_twenty=0;
                        $f_twenty=0;
                        $m_twenty_nine=0;
                        $f_twenty_nine=0;
                        $m_thirty=0;
                        $f_thirty=0;
                        $m_fourty_five=0;
                        $f_fourty_five=0;
                        $m_sixty=0;
                        $f_sixty=0;

                        $total_m=0;
                        $total_f=0;
                 
                    @endphp
                           @foreach ($sgbvs as $data)
                   
                    @php
                    //Accussed
                    if ($data->sgbvincidence->accused_victims=='Accused'  && $data->incident_file_id == $crimesource->id){
                             $m_nine+=$data->m_zero_to_nine;
                            $f_nine+=$data->f_zero_to_nine;
                            $m_ten+=$data->m_ten_to_fourteen;
                            $f_ten+=$data->f_ten_to_fourteen;
                            $m_fifteen+=$data->m_fifteen_to_seventeen;
                            $f_fifteen+=$data->f_fifteen_to_seventeen;
                            $m_eighteen+=$data->m_eighteen_to_nineteen;
                            $f_eighteen+=$data->f_eighteen_to_nineteen;
                            $m_twenty+=$data->m_twenty_to_twentyfour;
                            $f_twenty+=$data->f_twenty_to_twentyfour;
                            $m_twenty_nine+=$data->m_twenty_five_to_twentynine;
                            $f_twenty_nine+=$data->f_twenty_five_to_twentynine;
                            $m_thirty+=$data->m_thirty_to_fortyfour;
                            $f_thirty+=$data->f_thirty_to_fortyfour;
                            $m_fourty_five+=$data->m_fortyfive_to_fiftynine;
                            $f_fourty_five+=$data->f_fortyfive_to_fiftynine;
                            $m_sixty+=$data->m_sixty_and_above;
                            $f_sixty+=$data->f_sixty_and_above;
                            $total_m+=$m_nine+$m_ten+$m_fifteen+$m_eighteen+$m_twenty+$m_twenty_nine+$m_thirty+$m_fourty_five+$m_sixty;
                            $total_f=$f_nine+$f_ten+$f_fifteen+$f_eighteen+$f_twenty+$f_twenty_nine+$f_thirty+$f_fourty_five+$f_sixty;
                    }
                    //Totals
                    @endphp
                      @endforeach


                    
                      
                            <tr>
                                <td>{{ $crimesource->name }}</td>
                              
                                    <td>{{ $m_nine }}</td>
                                    <td>{{ $f_nine }}</td>

                                    <td>{{ $m_ten }}</td>
                                    <td>{{ $f_ten }}</td>

                                    <td>{{ $m_fifteen }}</td>
                                    <td>{{ $f_fifteen }}</td>

                                    <td>{{ $m_eighteen }}</td>
                                    <td>{{ $f_eighteen }}</td>

                                    <td>{{ $m_twenty }}</td>
                                    <td>{{ $f_twenty }}</td>

                                    <td>{{ $m_twenty_nine }}</td>
                                    <td>{{ $f_twenty_nine }}</td>

                                    <td>{{ $m_thirty }}</td>
                                    <td>{{ $f_thirty }}</td>

                                    <td>{{ $m_fourty_five }}</td>
                                    <td>{{ $f_fourty_five }}</td>

                                    <td>{{ $m_sixty }}</td>
                                    <td>{{ $f_sixty }}</td>

                                    

                              
                                <td class="am_total">{{ $total_m }}</td>
                                <td class="af_total">{{ $total_f }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            @php
                            //Totals
                            $total_m_nine=0;
                            $total_f_nine=0;
                            $total_m_ten=0;
                            $total_f_ten=0;
                            $total_m_fifteen=0;
                            $total_f_fifteen=0;
                            $total_m_eighteen=0;
                            $total_f_eighteen=0;
                            $total_m_twenty=0;
                            $total_f_twenty=0;
                            $total_m_twenty=0;
                            $total_f_twenty=0;
                            $total_m_twenty_nine=0;
                            $total_f_twenty_nine=0;
                            $total_m_thirty=0;
                            $total_f_thirty=0;
                            $total_m_fourty_five=0;
                            $total_f_fourty_five=0;
                            $total_m_sixty=0;
                            $total_f_sixty=0;
                            $grand_total_m=0;
                            $grand_total_f=0;
                            @endphp

                            @foreach ($sgbvs as $data)
                         
                            @php
                            //Accussed
                            //Totals

                            if ($data->sgbvincidence->accused_victims=='Accused'){
                    $total_m_nine+=$data->m_zero_to_nine;
                    $total_f_nine+=$data->f_zero_to_nine;
                    $total_m_ten+=$data->m_ten_to_fourteen;
                    $total_f_ten+=$data->f_ten_to_fourteen;
                    $total_m_fifteen+=$data->m_fifteen_to_seventeen;
                    $total_f_fifteen+=$data->f_fifteen_to_seventeen;
                    $total_m_eighteen+=$data->m_eighteen_to_nineteen;
                    $total_f_eighteen+=$data->f_eighteen_to_nineteen;
                    $total_m_twenty+=$data->m_twenty_to_twentyfour;
                    $total_f_twenty+=$data->f_twenty_to_twentyfour;
                    $total_m_twenty_nine+=$data->m_twenty_five_to_twentynine;
                    $total_f_twenty_nine+=$data->f_twenty_five_to_twentynine;
                    $total_m_thirty+=$data->m_thirty_to_fortyfour;
                    $total_f_thirty+=$data->f_thirty_to_fortyfour;
                    $total_m_fourty_five+=$data->m_fortyfive_to_fiftynine;
                    $total_f_fourty_five+=$data->f_fortyfive_to_fiftynine;
                    $total_m_sixty+=$data->m_sixty_and_above;
                    $total_f_sixty+=$data->f_sixty_and_above;
                    $grand_total_m= $total_m_nine+$total_m_ten+$total_m_fifteen+$total_m_eighteen+$total_m_twenty+$total_m_twenty_nine+$total_m_thirty+$total_m_fourty_five+$total_m_sixty;
                    $grand_total_f= $total_f_nine+$total_f_ten+$total_f_fifteen+$total_f_eighteen+$total_f_twenty+$total_f_twenty_nine+$total_f_thirty+$total_f_fourty_five+$total_f_sixty;
                            }
                            @endphp
                            
                              @endforeach
                            <td>TOTAL</td>
                            <td>{{ $total_m_nine }}</td>
                            <td>{{ $total_f_nine }}</td>

                            <td>{{ $total_m_ten }}</td>
                            <td>{{ $total_f_ten }}</td>

                            <td>{{ $total_m_fifteen }}</td>
                            <td>{{ $total_f_fifteen }}</td>

                            <td>{{ $total_m_eighteen }}</td>
                            <td>{{ $total_f_eighteen }}</td>

                            <td>{{ $total_m_twenty }}</td>
                            <td>{{ $total_f_twenty }}</td>

                            <td>{{ $total_m_twenty_nine }}</td>
                            <td>{{ $total_f_twenty_nine }}</td>

                            <td>{{ $total_m_thirty }}</td>
                            <td>{{ $total_f_thirty }}</td>

                            <td>{{ $total_m_fourty_five }}</td>
                            <td>{{ $total_f_fourty_five }}</td>

                            <td>{{ $total_m_sixty }}</td>
                            <td>{{ $total_f_sixty }}</td>

                            <td>{{ $grand_total_m }}</td>
                            <td>{{ $total_f_sixty }}</td>
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
                <h4 class="card-title">VICTIMS OF SGBV CRIMES </h4>
            </div>
            <div class="table-responsive table-wrapper">
                <table class="table table-bordered" id="myTable">
                    <thead class="table-dark frozen-header">
                        <tr>
                            <th rowspan="2">OFFENCES</th>
                           
                                <th colspan="2">0 - 9YRS</th>
                                <th colspan="2">10 - 14YRS</th>
                                <th colspan="2">15 - 17YRS</th>
                                <th colspan="2">18 - 19YRS</th>
                                <th colspan="2">20 - 24YRS</th>
                                <th colspan="2">25 - 29YRS</th>
                                <th colspan="2">30 - 44YRS</th>
                                <th colspan="2">45 - 59YRS</th>
                                <th colspan="2">60 YRS & ABOVE</th>
                                 <th colspan="2">TOTAL</th>
                        </tr>
                        <tr>
                          
                            
                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>
                                
                                <th>M</th>
                                <th>F</th>

                                <th>M</th>
                                <th>F</th>
                         
                                <th>M</th>
                                <th>F</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crimesources as $crimesource)


                        @php
                        $m_nine=0;
                        $f_nine=0;
                        $m_ten=0;
                        $f_ten=0;
                        $m_fifteen=0;
                        $f_fifteen=0;
                        $m_eighteen=0;
                        $f_eighteen=0;
                        $m_twenty=0;
                        $f_twenty=0;
                        $m_twenty=0;
                        $f_twenty=0;
                        $m_twenty_nine=0;
                        $f_twenty_nine=0;
                        $m_thirty=0;
                        $f_thirty=0;
                        $m_fourty_five=0;
                        $f_fourty_five=0;
                        $m_sixty=0;
                        $f_sixty=0;

                        $total_m=0;
                        $total_f=0;
                 
                    @endphp
                           @foreach ($sgbvs as $data)
                 
                    @php
                    //Accussed
                    if ($data->sgbvincidence->accused_victims=='Victim'  && $data->incident_file_id == $crimesource->id){
                             $m_nine+=$data->m_zero_to_nine;
                            $f_nine+=$data->f_zero_to_nine;
                            $m_ten+=$data->m_ten_to_fourteen;
                            $f_ten+=$data->f_ten_to_fourteen;
                            $m_fifteen+=$data->m_fifteen_to_seventeen;
                            $f_fifteen+=$data->f_fifteen_to_seventeen;
                            $m_eighteen+=$data->m_eighteen_to_nineteen;
                            $f_eighteen+=$data->f_eighteen_to_nineteen;
                            $m_twenty+=$data->m_twenty_to_twentyfour;
                            $f_twenty+=$data->f_twenty_to_twentyfour;
                            $m_twenty_nine+=$data->m_twenty_five_to_twentynine;
                            $f_twenty_nine+=$data->f_twenty_five_to_twentynine;
                            $m_thirty+=$data->m_thirty_to_fortyfour;
                            $f_thirty+=$data->f_thirty_to_fortyfour;
                            $m_fourty_five+=$data->m_fortyfive_to_fiftynine;
                            $f_fourty_five+=$data->f_fortyfive_to_fiftynine;
                            $m_sixty+=$data->m_sixty_and_above;
                            $f_sixty+=$data->f_sixty_and_above;
                            $total_m+=$m_nine+$m_ten+$m_fifteen+$m_eighteen+$m_twenty+$m_twenty_nine+$m_thirty+$m_fourty_five+$m_sixty;
                            $total_f=$f_nine+$f_ten+$f_fifteen+$f_eighteen+$f_twenty+$f_twenty_nine+$f_thirty+$f_fourty_five+$f_sixty;
                    }
                    //Totals
                    @endphp
                     
                      @endforeach


                    
                      
                            <tr>
                                <td>{{ $crimesource->name }}</td>
                              
                                    <td>{{ $m_nine }}</td>
                                    <td>{{ $f_nine }}</td>

                                    <td>{{ $m_ten }}</td>
                                    <td>{{ $f_ten }}</td>

                                    <td>{{ $m_fifteen }}</td>
                                    <td>{{ $f_fifteen }}</td>

                                    <td>{{ $m_eighteen }}</td>
                                    <td>{{ $f_eighteen }}</td>

                                    <td>{{ $m_twenty }}</td>
                                    <td>{{ $f_twenty }}</td>

                                    <td>{{ $m_twenty_nine }}</td>
                                    <td>{{ $f_twenty_nine }}</td>

                                    <td>{{ $m_thirty }}</td>
                                    <td>{{ $f_thirty }}</td>

                                    <td>{{ $m_fourty_five }}</td>
                                    <td>{{ $f_fourty_five }}</td>

                                    <td>{{ $m_sixty }}</td>
                                    <td>{{ $f_sixty }}</td>

                                    

                              
                                <td class="am_total">{{ $total_m }}</td>
                                <td class="af_total">{{ $total_f }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            @php
                            //Totals
                            $total_m_nine=0;
                            $total_f_nine=0;
                            $total_m_ten=0;
                            $total_f_ten=0;
                            $total_m_fifteen=0;
                            $total_f_fifteen=0;
                            $total_m_eighteen=0;
                            $total_f_eighteen=0;
                            $total_m_twenty=0;
                            $total_f_twenty=0;
                            $total_m_twenty=0;
                            $total_f_twenty=0;
                            $total_m_twenty_nine=0;
                            $total_f_twenty_nine=0;
                            $total_m_thirty=0;
                            $total_f_thirty=0;
                            $total_m_fourty_five=0;
                            $total_f_fourty_five=0;
                            $total_m_sixty=0;
                            $total_f_sixty=0;
                            $grand_total_m=0;
                            $grand_total_f=0;
                            @endphp

                            @foreach ($sgbvs as $data)
                        
                            @php
                            //Accussed
                            //Totals
                            if ($data->sgbvincidence->accused_victims=='Victim'){
                    $total_m_nine+=$data->m_zero_to_nine;
                    $total_f_nine+=$data->f_zero_to_nine;
                    $total_m_ten+=$data->m_ten_to_fourteen;
                    $total_f_ten+=$data->f_ten_to_fourteen;
                    $total_m_fifteen+=$data->m_fifteen_to_seventeen;
                    $total_f_fifteen+=$data->f_fifteen_to_seventeen;
                    $total_m_eighteen+=$data->m_eighteen_to_nineteen;
                    $total_f_eighteen+=$data->f_eighteen_to_nineteen;
                    $total_m_twenty+=$data->m_twenty_to_twentyfour;
                    $total_f_twenty+=$data->f_twenty_to_twentyfour;
                    $total_m_twenty_nine+=$data->m_twenty_five_to_twentynine;
                    $total_f_twenty_nine+=$data->f_twenty_five_to_twentynine;
                    $total_m_thirty+=$data->m_thirty_to_fortyfour;
                    $total_f_thirty+=$data->f_thirty_to_fortyfour;
                    $total_m_fourty_five+=$data->m_fortyfive_to_fiftynine;
                    $total_f_fourty_five+=$data->f_fortyfive_to_fiftynine;
                    $total_m_sixty+=$data->m_sixty_and_above;
                    $total_f_sixty+=$data->f_sixty_and_above;
                    $grand_total_m= $total_m_nine+$total_m_ten+$total_m_fifteen+$total_m_eighteen+$total_m_twenty+$total_m_twenty_nine+$total_m_thirty+$total_m_fourty_five+$total_m_sixty;
                    $grand_total_f= $total_f_nine+$total_f_ten+$total_f_fifteen+$total_f_eighteen+$total_f_twenty+$total_f_twenty_nine+$total_f_thirty+$total_f_fourty_five+$total_f_sixty;
                            }
                            @endphp
                            
                              @endforeach
                            <td>TOTAL</td>
                            <td>{{ $total_m_nine }}</td>
                            <td>{{ $total_f_nine }}</td>

                            <td>{{ $total_m_ten }}</td>
                            <td>{{ $total_f_ten }}</td>

                            <td>{{ $total_m_fifteen }}</td>
                            <td>{{ $total_f_fifteen }}</td>

                            <td>{{ $total_m_eighteen }}</td>
                            <td>{{ $total_f_eighteen }}</td>

                            <td>{{ $total_m_twenty }}</td>
                            <td>{{ $total_f_twenty }}</td>

                            <td>{{ $total_m_twenty_nine }}</td>
                            <td>{{ $total_f_twenty_nine }}</td>

                            <td>{{ $total_m_thirty }}</td>
                            <td>{{ $total_f_thirty }}</td>

                            <td>{{ $total_m_fourty_five }}</td>
                            <td>{{ $total_f_fourty_five }}</td>

                            <td>{{ $total_m_sixty }}</td>
                            <td>{{ $total_f_sixty }}</td>

                            <td>{{ $grand_total_m }}</td>
                            <td>{{ $total_f_sixty }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

</section>
<script>
    feather.replace();
    // Add the custom color class to the icon
    const iconElement = document.querySelector('i[data-feather="printer"]');
   // iconElement.classList.add('feather-icon-red');
  </script>

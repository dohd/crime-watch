<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 11.5pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.transform{
    text-rotate: 90;
    text-align: center;


}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}

table tfoot td { background-color: #FFFF00;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
.dotted td 
{
    border-bottom: 0.1mm solid #0000ff;
}
 table.print-friendly tr td, table.print-friendly tr th {
    page-break-inside: auto !important;
}
</style>
</head>
<body>

<htmlpageheader name="myheader" style="display:none">
<table width="100%"><tr>
<td width="50%"><i>{{ date('d/m/Y') }}</i><br /><br /><br /><br /> </td>
<td width="50%" style="text-align: right;">Kenya Police Headquarters<br />P.O BOX30083,<br>NAIROBI </td>
</tr></table>

</htmlpageheader>

<htmlpageheader name="otherpages" style="display:none">

<div align="center" style="font-weight:bold;">
DATE: {{ $date }}
</div>
</htmlpageheader>

<htmlpagefooter name="myfooter">

<div   style="border-top: 1px solid #000000; width:100%; font-size: 9pt; text-align: center; padding-top: 3mm; ">
<div style="width:30%;float:left;">
<i style="float:right;padding-right:200px;">Kenya Police Headquarters</i>
</div>

<div style="width:50%;float:left;">

Page {PAGENO} of {nb}

</div>
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" />

<sethtmlpagefooter name="myfooter" value="on" />

<div align="center" style=" font-size: 10pt;padding-top:15px;">
    *RESTRICTED*
    </div>
    <div  style="font-weight:bold;border-bottom: 0.3mm solid #000000; font-size: 10pt;">
     THE CONTENTS OF THIS DOCUMENT ARE RESTRICTED AND WILL NOT BE DIVULGED TO ANY OTHER SOURCE OR TO THE PRESS BY THE RECIPIENTS: 
    </div>
    <div style="font-weight:bold;padding-top:10px; " align="center" >SGBV REPORT DATE {{ $date }}</div>
   

    <table class="items" width="100%" style="font-size: 13pt; font-weight: bold; border-collapse: collapse; " cellpadding="8">
        <thead>
         <tr class="mycolor">
            <td  >OFFENCES</td>
            @foreach ($allcounties as $county)
                <td class="transform">{{ $county->name }}</td>
            @endforeach
            <td   class="transform">TOTAL</td>
         </tr>
        </thead>
        <tbody>
            @foreach ($crimesources as $crimesource)
                <tr  class="dotted">
                    <td style="font-size: 10pt; background-color:#99ccff">{{ $crimesource->name }}</td>
                    @php
                    $cval = 0;
                      @endphp
                @foreach ($sgbvs as $data)
                    @if ($data->sgbvincidence->accused_victims=='Victim' && $data->incident_file_id == $crimesource->id)
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
                        @if ($data->sgbvincidence->accused_victims=='Victim' && $data->sgbvincidence->county_id == $county->id && $data->incident_file_id == $crimesource->id)
                            @php
                                $val+= $data->m_zero_to_nine+$data->f_zero_to_nine+$data->m_ten_to_fourteen+$data->f_ten_to_fourteen+$data->m_fifteen_to_seventeen+$data->f_fifteen_to_seventeen+$data->m_eighteen_to_nineteen+$data->f_eighteen_to_nineteen+$data->m_twenty_to_twentyfour+$data->f_twenty_to_twentyfour+$data->m_twenty_five_to_twentynine+$data->f_twenty_five_to_twentynine+$data->m_thirty_to_fortyfour+$data->f_thirty_to_fortyfour+$data->m_fortyfive_to_fiftynine+$data->f_fortyfive_to_fiftynine+$data->m_sixty_and_above+$data->f_sixty_and_above;
                            @endphp
                        @endif
                    @endforeach
                        <td>{{ $val }}</td>
                    @endforeach
                    <td  style="background-color:#FFFF00" class="c_total">{{ $cval }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="dotted">
                <td>TOTAL</td>
                @php
                $gtval = 0;
                @endphp
                @foreach ($allcounties as $county)
                @php
                $val = 0;
               @endphp
               @foreach ($sgbvs as $data)
                @if ($data->sgbvincidence->accused_victims=='Victim' && $data->sgbvincidence->county_id == $county->id)
                    @php
                        $val+= $data->m_zero_to_nine+$data->f_zero_to_nine+$data->m_ten_to_fourteen+$data->f_ten_to_fourteen+$data->m_fifteen_to_seventeen+$data->f_fifteen_to_seventeen+$data->m_eighteen_to_nineteen+$data->f_eighteen_to_nineteen+$data->m_twenty_to_twentyfour+$data->f_twenty_to_twentyfour+$data->m_twenty_five_to_twentynine+$data->f_twenty_five_to_twentynine+$data->m_thirty_to_fortyfour+$data->f_thirty_to_fortyfour+$data->m_fortyfive_to_fiftynine+$data->f_fortyfive_to_fiftynine+$data->m_sixty_and_above+$data->f_sixty_and_above;
                    @endphp
                @endif
               @endforeach
          
                    <td id="rfooter_{{ $county->id }}" class="cs_total">{{ $val }}</td>
                @endforeach
                @php
                $gtval = 0;
                @endphp
                @foreach ($sgbvs as $data)
                @if ($data->sgbvincidence->accused_victims=='Victim')
                    @php
                        $gtval+= $data->m_zero_to_nine+$data->f_zero_to_nine+$data->m_ten_to_fourteen+$data->f_ten_to_fourteen+$data->m_fifteen_to_seventeen+$data->f_fifteen_to_seventeen+$data->m_eighteen_to_nineteen+$data->f_eighteen_to_nineteen+$data->m_twenty_to_twentyfour+$data->f_twenty_to_twentyfour+$data->m_twenty_five_to_twentynine+$data->f_twenty_five_to_twentynine+$data->m_thirty_to_fortyfour+$data->f_thirty_to_fortyfour+$data->m_fortyfive_to_fiftynine+$data->f_fortyfive_to_fiftynine+$data->m_sixty_and_above+$data->f_sixty_and_above;
                    @endphp
                    @endif
              
               @endforeach


                <td class="cg_total">{{ $gtval }}</td>
            </tr>
        </tfoot>
    </table>

    <div style="page-break-before:always;margin-top:20px;">
        <h2 align="center">ACCUSED OF SGBV CRIMES</h2>

        <table class="items" width="100%" style="font-size: 10pt; font-weight: bold; border-collapse: collapse; " cellpadding="8">
            <thead >
                <tr class="mycolor">
                    <td rowspan="2">OFFENCES</td>
                   
                        <td colspan="2">0 - 9YRS</td>
                        <td colspan="2">10 - 14YRS</td>
                        <td colspan="2">15 - 17YRS</td>
                        <td colspan="2">18 - 19YRS</td>
                        <td colspan="2">20 - 24YRS</td>
                        <td colspan="2">25 - 29YRS</td>
                        <td colspan="2">30 - 44YRS</td>
                        <td colspan="2">45 - 59YRS</td>
                        <td colspan="2">60 YRS & ABOVE</td>
                        <td colspan="2">TOTAL</td>
                </tr>
                <tr>
                  @foreach (range(1,10) as $value)
                    <td>M</td>
                    <td>F</td>
                  @endforeach
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


            
              
              <tr class="dotted">	
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

                            

                      
                        <td style="background-color:#FFFF00"  class="am_total">{{ $total_m }}</td>
                        <td style="background-color:#FFFF00" class="af_total">{{ $total_f }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="dotted">	
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
                    <td>{{ $grand_total_f }}</td>
                </tr>
            </tfoot>
        </table>

    </div>

    <div style="page-break-before:always;margin-top:20px;">
        <h2 align="center">VICTIMS OF SGBV CRIMES</h2>

        <table class="items" width="100%" style="font-size: 10pt; font-weight: bold; border-collapse: collapse; " cellpadding="8">
            <thead >
                <tr class="mycolor">
                    <td rowspan="2">OFFENCES</td>
                   
                        <td colspan="2">0 - 9YRS</td>
                        <td colspan="2">10 - 14YRS</td>
                        <td colspan="2">15 - 17YRS</td>
                        <td colspan="2">18 - 19YRS</td>
                        <td colspan="2">20 - 24YRS</td>
                        <td colspan="2">25 - 29YRS</td>
                        <td colspan="2">30 - 44YRS</td>
                        <td colspan="2">45 - 59YRS</td>
                        <td colspan="2">60 YRS & ABOVE</td>
                        <td colspan="2">TOTAL</td>
                </tr>
                <tr>
                  @foreach (range(1,10) as $value)
                    <td>M</td>
                    <td>F</td>
                  @endforeach
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


            
              
              <tr class="dotted">	
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

                            

                      
                        <td style="background-color:#FFFF00"  class="am_total">{{ $total_m }}</td>
                        <td style="background-color:#FFFF00"  class="af_total">{{ $total_f }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="dotted">	
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
                    <td>{{ $grand_total_f }}</td>
                </tr>
            </tfoot>
        </table>

    </div>

</body>
</html>
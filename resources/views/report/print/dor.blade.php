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
table thead td { background-color: #EEEEEE;
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
 table.print-friendly tr td, table.print-friendly tr th {
       page-break-inside: auto !important;
    }
    

</style>
</head>
<body>

<htmlpageheader name="myheader" style="display:none">
<table width="100%"><tr>
<td width="50%"><i>{{ $from_date }}</i><br /><br /><br /><br /> </td>
<td width="50%" style="text-align: right;">Kenya Police Headquarters<br />P.O BOX30083,<br>NAIROBI </td>
</tr></table>

</htmlpageheader>

<htmlpageheader name="otherpages" style="display:none">

<div align="center" style="font-weight:bold;">
NO:{{ $report_numbers }}
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
    <div style="font-weight:bold;padding-top:10px; " align="center" >{{ $title }}<br><span style="text-decoration:underline;">NO:{{ $report_numbers }}</span></div>
    <p style="font-size: 11pt;padding-top:10px;">This report contains information reported to Police Headquarters during the previous twenty four hours and is based on the first reports which are subjected to confirmation.  </p>




@php
    $i=0;
@endphp
    @foreach ($counties as $county )

           <div class="col-md-12" >
                    
                        <!--collapse start-->
                        <div class="panel-group m-bot20" id="accordion">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span style="text-decoration:underline;font-weight:bold; " class="panel-title">
                                       
                                            COUNTY:{{ $county->name}}
                                       
                                    </span>
                                </div>
			 
                                @foreach($county->divisions as $division )
                       
                                @foreach($division->divincidences as $incidence)
                                @php
                                $i++;
                            @endphp  
			  
                                    <table style="page-break-inside: avoid;overflow: wrap "> 
                                  <tr><td style="text-decoration:underline;"><strong>DIVISION: {{ $division->name }}</strong></td></tr>
                                  <tr  ><td style="font-weight:bold;"  width="40%">  {{ $i }}  {{ $incidence->crimesource->name }} : {{ $incidence->station->name }}  </td> <td style="font-weight:bold;" width="25%"> {{ $incidence->incident_ref }}</td> <td style="font-weight:bold;" width="35%">{{ $incidence->incident_title }}</td></tr> 
                                     <tr >
                                       <td style="text-align: justify;" colspan="4">
                                      
                                      
                                        {!! $incidence->description !!}<td>
                                       <tr>
                                   
                                       </table>   
                                        
                                    
                                       @endforeach
                                       @endforeach
			 
		
                           
                            
                        </div>
                        <!--collapse end-->
                    </div>
			 
		
			  
			   </div>
               @endforeach

</body>
</html>
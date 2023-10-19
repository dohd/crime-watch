<html>
<head>
<style>
    body {
        font-family: sans-serif;
        font-size: 11.5pt;
    }
    p {	
        margin: 0pt; 
    }
    table.items {
        border: 0.1mm solid #000000;
    }
    td { 
        vertical-align: top; 
    }
    .items td {
        border-left: 0.1mm solid #000000;
        border-right: 0.1mm solid #000000;
    }
    .transform{
        text-rotate: 90;
        text-align: center;
    }
    table thead th { 
        background-color: #EEEEEE;
        text-align: center;
        border: 0.1mm solid #000000;
        font-variant: small-caps;
    }
    table tfoot th { 
        background-color: #EEEEEE;
        text-align: left;
        border: 0.1mm solid #000000;
        font-variant: small-caps;
    }
    table.print-friendly tr td, table.print-friendly tr th {
       page-break-inside: auto !important;
    }
</style>
</head>
<body>

<htmlpageheader name="myheader" style="display:none">
    <table width="100%">
        <tr>
            <td width="50%"><i>{{ date('d/m/Y') }}</i><br /><br /><br /><br /> </td>
            <td width="50%" style="text-align: right;">Kenya Police Headquarters<br />P.O BOX30083,<br>NAIROBI </td>
        </tr>
    </table>
</htmlpageheader>

<htmlpageheader name="otherpages" style="display:none"></htmlpageheader>

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

<div style="font-weight:bold;padding-top:10px; " align="center" >GAMBLING REPORT </div>
<div style="margin-top:20px;">
    <table class="items" width="100%" style="font-size: 10pt; font-weight: bold; border-collapse: collapse; " cellpadding="8">
        <thead >
            <tr class="mycolor">
                <th class="transform">County</th>
                <th class="transform">MACHINES</th>
                <th class="transform">CARDS</th>
                <th class="transform">POOL</th>
                <th class="transform">ARREST</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_machines = 0;
                $total_cards = 0;
                $total_pool = 0;
                $total_arrest = 0;
            @endphp
            @foreach ($counties as $county )
                @php
                    $no_machines = $county->incidences->sum('gambling.m_no');
                    $no_cards = $county->incidences->sum('gambling.c_no');
                    $no_pools = $county->incidences->sum('gambling.p_no');
                    $no_arrest = $county->incidences->sum('gambling.m_arrest_no') + 
                        $county->incidences->sum('gambling.c_arrest_no') + 
                        $county->incidences->sum('gambling.p_arrest_no');
                    // totals
                    $total_machines += $no_machines;
                    $total_cards += $no_cards;
                    $total_pool += $no_pools;
                    $total_arrest += $no_arrest;
                @endphp 
                <tr class="dotted">	
                    <td>{{ $county->name }}</td>
                    <td>{{ $no_machines }}</td>
                    <td>{{ $no_cards }}</td>
                    <td>{{ $no_pools }}</td>
                    <td>{{ $no_arrest }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>TOTAL</th>
                <th>{{ $total_machines }}</th>
                <th>{{ $total_cards }}</th>
                <th>{{ $total_pool }}</th>
                <th>{{ $total_arrest }}</th>
            </tr>
        </tfoot>
    </table>
</div>
</body>
</html>

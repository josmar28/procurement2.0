<?php
?>
<html lang="en">
    <head>
        <style>
            @page {
                margin: 100px 25px;
            }

            header {
                /* position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;
                font-size: 20px !important;
                color: white;
                text-align: center;
                line-height: 35px; */
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                font-size: 20px !important;
                background-color: #000;
                color: white;
                text-align: center;
                line-height: 35px;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <table border="0" width="100%" cellpadding="2px">
			<tr>
			<td style="width: 2in; text-align: center">
			<br>
			<br>
			<img src="{{ asset('public/img/doh.png') }}" style="width: 0.7in"/>
			</td>
			<td style="text-align:center; width: 3in">
			<br>
			<br>
			Republic of the Philippines<br>
			Department of Health<br>
			CENTER FOR HEALTH DEVELOPMENT<br>
			SOCCSKSARGEN Region
			</td>
			<td style="width: 1.3in; text-align: right">
			<br>
			<br>
			<img src="{{ asset('public/img/dohro12logo_100RES.png') }}" style="width: 0.7in"/>
			</td>
			<td style="width: 1.3in; text-align: left">
			<br>
			<br>
			<img src="{{ asset('public/img/doh.png') }}" style="width: 0.7in"/>
			</td>
			</tr>
			</table>
        </header>

        <footer>
            Copyright © <?php echo date("Y");?> - techsolutionstuff.com
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
        <table border="0" width="100%" cellpadding="0px">
            <tr>
                <td  colspan="2" width="100%" align="center"><h3><center>PURCHASE REQUEST</center></h3></td>
            </tr>
            <tr>
                <td align="left">ENTITY NAME: <u>DEPARTMENT OF HEALTH-RO XII</u></td>
                <td align="right">Fund Cluster:'.$fundsource.'</td>
            </tr>
        </table>
        <table border="1" cellpadding="1px">
            <tr>
                <th width="25%">OFFICE SECTION <br><u><b>'.$office.'</b></u></th>
                <th width="50%"> PR No. <u><b>'.$prno.'</b></u><br><br>RESPONSIBILITY CENTER CODE: <br><b><u> </b></u>  </th>
                <th width="25%"> Date: <b>' . date('m/d/Y', strtotime($date_prep_pr_enduser)) . '</b><br><br><u>'.$code.' - '.$name.'</u></th>
            </tr> 
        </table>

        <table border="1"  cellpadding="1px">
        <tr>
            <th width="15%"> Stock/Property No.</th> 
            <th width="10%"> Unit</th> 
            <th width="40%"> Item Description</th> 
            <th width="10%">Quantity</th>
            <th width="13%">Unit Cost</th> 
            <th width="12%">Total Cost </th> 
        </tr>
            @foreach($data2 as $data)
            <tr>
            <td> </td> 
            <th>  {{$data->unit}}</th> 
            <th><b>{{$data->title}}</b><br>{{$data->item}}
            {!! nl2br($data->item_desc) !!}
            </th> 
            <td> {$row['quantity']}</td>
            <td>".$unitcost."</td> 
            <td align='center'>".$unittotal."</td> 
            </tr>
            @endforeach
        </main>
    </body>
</html>
<?php
// dd($data);

$data = $data;
?>
<html>
    <head>
        <style>
            @page {
                margin: 50px 25px;
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
                margin-top:20px;
            }

            footer {
                /* position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                font-size: 20px !important;
                background-color: #000;
                color: white;
                text-align: center;
                line-height: 35px; */
            }
  
            .route_no {
                font-size:1.2em;
                margin-left:30px;
            }
        </style>
        <style>
		.header th{vertical-align:middle; padding-top:5px;padding:5pt;color:#000000;background-color:#FFFFFF;font-size: 8pt;text-align: left;}
        .header td{vertical-align:middle; padding-top:5px;padding:5pt;color:#000000;background-color:#FFFFFF;font-size: 8pt;text-align: right;}
		</style>
            <style>
        .info th{vertical-align:middle; padding-top:2px;border:1px solid #000000;padding:2pt;color:#000000;background-color:#FFFFFF;font-size: 8pt;text-align: left;}
        .info td{vertical-align:middle; padding-top:2px;border:1px solid #000000;padding:2pt;color:#000000;background-color:#FFFFFF;font-size: 8pt;text-align: right;} 
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <div style="position: absolute; left: 89%; margin: 0px 5px; " >
            <div class="barcode">
                <?php echo DNS1D::getBarcodeHTML($id,"C39E",1,23) ?>
                <font class="route_no">{{ $id }}</font>
            </div>
        </div>
        <header>
            <table class="header" border="0" width="100%" cellspacing="0">
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
<!-- 
        <footer>
            Copyright © <?php echo date("Y");?> - techsolutionstuff.com
        </footer> -->

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
        <table class="info" style="border: none;" border="0" width="100%" cellspacing="0"  cellpadding="0">
            <tr>
                <td colspan="2" width="100%" align="center"><h3><center>PURCHASE REQUEST</center></h3></td>
            </tr>
            <tr>
                <td style="text-align:left">ENTITY NAME: <u>DEPARTMENT OF HEALTH-RO XII</u></td>
                <td style="text-align:right">Fund Cluster:{{ $data->fundsource }} </td>
            </tr>
        </table>
        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <th style="width:25%">OFFICE SECTION <br><u><b>{{ $data->office}}</b></u></th>
                <th style="width:50%" width=""> PR No. <u><b>{{ $data->prno}}</b></u><br><br>RESPONSIBILITY CENTER CODE: <br><b><u> </b></u>  </th>
                <th style="width:25%" width=""> Date: <b> {{ date('m/d/Y', strtotime($data->date_prep_pr_enduser)) }}</b><br><br><u>{{$data->code}} - {{$data->name}}</u></th>
            </tr> 
        </table>

        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="1px">
        <tr>
            <th style="width:15%"> Stock/Property No.</th> 
            <th style="width:10%"> Unit</th> 
            <th style="width:40%"> Item Description</th> 
            <th style="width:10%">Quantity</th>
            <th style="width:13%">Unit Cost</th> 
            <th style="width:12%">Total Cost </th> 
        </tr>
            @foreach($data2 as $datas)
            <?php
             $unitcost = number_format($datas->price,2); /* Format Number */
             $unittotal= number_format($datas->total,2); /* Format Number */

            ?>
            <tr>
            <td> </td> 
            <th>  {{$datas->unit}}</th> 
            <th><b>{{$datas->title}}</b><br>{{$datas->item}}
            {!! nl2br($datas->item_desc) !!}
            </th> 
            <td> {{$datas->quantity}}</td>
            <td>{{$unitcost}}</td> 
            <td align='center'>{{$unittotal}}</td> 
            </tr>
            @endforeach
        </table>

        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="1px">
            <tr>
                <td style="width:15%"> </td> 
                <td style="width:10%"> </td> 
                <td style="width:40%"> </td> 
                <td style="width:10%"></td>
                <td style="width:13%">Total </td> 
                <td style="width:12%">{{number_format($total->sumtotal,2)}} </td> 
            </tr>
        </table>

        
        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="1px">
        <tr>
		    <td style="text-align:center" width="100%"><font size="-2"><b>CERTIFICATE OF AVAILABILITY OF FUNDS</b></font></td>
        </tr>
        
        <tr>
            <td width="100%"><b>This is to certify that the amount of __________________ is available under _________________ intended for __________________ issued this _______________.</b></td>
        </tr>


        </table>  

        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="1px">
        <tr>
            <td style="text-align:center;width:50%; ">
                CERTIFIED BY<br><br>
                <b>
                <u>{{$data->cert_by1}}</u></b><br>
                {{$data->cert_by1_designation}}
                
            </td>
            
            
            <td style="text-align:center;width:50%; ">
                CERTIFIED BY<br><br>
                <b>
                <u>{{$data->cert_by2}}</u></b><br>
                {{$data->cert_by2_designation}}
            </td>
        </tr>
        </table>  


        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="1px">
				<tr>
				<th colspan="2" style="height:80px;">PURPOSE: <u> {{$data->title}}</u>
				<br>CATEGORY-<b>{{$data->type}} </b>MODE-<b>{{$data->modeproc}}</b>
				TYPE- <b>{{$data->internaltype}}'</b><br>
				Note to Supplier:  
				<u>{!! nl2br($data->supplier_inst) !!}</u>
				</th>
				</tr>
				<tr>

				<td style="text-align:center;">REQUESTED BY <br> <br> <br><b> <u>{{$data->Requestedby}} </u></b> <br>{{$data->requesteddesig}}</td>
				<td style="text-align:center;">APPROVED BY <br><br><br> <b><u>{{$data->approvedby}} </u></b><br>{{$data->approveddesig}}
				</td>
				</tr> 
        </table>
        </main>
    </body>
</html>
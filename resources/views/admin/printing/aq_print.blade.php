<?php
// dd($data);
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
                
                line-height: 35px; */
                text-align: center;
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
            <td style="width:50%;text-align:left;">
            ABSTRACT No.: ' . $rowmain['abstract_no'] . '
            <br>
            Date: ' . $rowmain['date_abstractcanv'] . '
            <br>
            Time of Opening: ' . $rowmain['time_openingbids'] . '
            </td>

            <td style="width:50%;text-align:left;">
            Date of Advertisement/Posting to Philgeps:
            <br>
            RFQ No. ' . $rowmain['L2-rfqitbno'] . '
            <br>
            PR No. ' . $rowmain['L1-trackno'] . '
            <br>
            ABC: ' . $rowmain['L1-abc'] . '
            </td>

            </tr>

            <tr>
                <td style="width:50%;text-align:center;">' . $rowmain['L1-title'] . '</td>
                <td style="width:50%;text-align:center;">NAME OF DEALERS</td>
            </tr>
        </table>

        <table class="info" style="border: none;" border="0" width="100%" cellspacing="0"  cellpadding="0">
            <tr>
                <td style="font-family: arialbd;align:center;width:6%">Item No.</td>
                <td style="font-family: arialbd;align:center;width:7%">Quantity</td>
                <td style="font-family: arialbd;align:center;width:4%">Unit</td>
                <td style="font-family: arialbd;align:center;width:22%">LIST OF ARTICLES</td>
                <td style="font-family: arialbd; font-size: 10pt;align:center;width:11%">Approved budget for
                the contract per unit</td>


                @if($data->supplier1_id == $data->awarded_supplier_id )
                    <td style="font-size: 9pt; align:center;width:16.67%" style="font-family: arialbd; background-color: #acdaef">$data->supplier1 </td>;
                @else
                  <td style="font-size: 9pt; align:center;width:16.67%" style="font-family: arialbd">$data->supplier1 </td>
                @endif
            </tr>
        </table>


        </main>
    </body>
</html>
<?php
// dd($data2);
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

        .footer th{vertical-align:middle; padding-top:2px;padding:2pt;color:#000000;background-color:#FFFFFF;font-size: 9pt;text-align: left;}
        .footer td{vertical-align:middle; padding-top:2px;padding:2pt;color:#000000;background-color:#FFFFFF;font-size: 9pt;text-align: right;} 
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
            ABSTRACT No.: {{$data->abstract_no}}
            <br>
            Date: {{$data->date_abstractcanv}}
            <br>
            Time of Opening: {{$data->time_openingbids}}
            </td>

            <td style="width:50%;text-align:left;">
            Date of Advertisement/Posting to Philgeps:
            <br>
            RFQ No. {{$data->L2_rfqitbno}}
            <br>
            PR No. {{$data->L1_trackno}}
            <br>
            ABC: {{$data->L1_abc}}
            </td>

            </tr>

            <tr>
                <td style="width:50%;text-align:center;">{{$data->L1_title}}</td>
                <td style="width:50%;text-align:center;">NAME OF DEALERS</td>
            </tr>
        </table>

        <table class="info" style="border: none;" border="0" width="100%" cellspacing="0"  cellpadding="0">
            <tr>
                <td style="font-family: arialbd;text-align:center;width:6%">Item No.</td>
                <td style="font-family: arialbd;text-align:center;width:7%">Quantity</td>
                <td style="font-family: arialbd;text-align:center;width:4%">Unit</td>
                <td style="font-family: arialbd;text-align:center;width:22%">LIST OF ARTICLES</td>
                <td style="font-family: arialbd; font-size: 10pt;text-align:center;width:11%">Approved budget for
                the contract per unit</td>


                @if($data->supplier1_id == $data->awarded_supplier_id )
                    <td style="font-size: 9pt; text-align:center;width:16.67%" style="font-family: arialbd; background-color: #acdaef">{{$data->supplier1}} </td>;
                @else
                  <td style="font-size: 9pt; text-align:center;width:16.67%" style="font-family: arialbd">{{$data->supplier1}} </td>
                @endif

                
                @if($data->supplier2_id == $data->awarded_supplier_id )
                    <td style="font-size: 9pt; text-align:center;width:16.67%" style="font-family: arialbd; background-color: #acdaef">{{$data->supplier2}} </td>;
                @else
                  <td style="font-size: 9pt; text-align:center;width:16.67%" style="font-family: arialbd">{{$data->supplier2}} </td>
                @endif

                @if($data->supplier3_id == $data->awarded_supplier_id )
                    <td style="font-size: 9pt; text-align:center;width:16.67%" style="font-family: arialbd; background-color: #acdaef">{{$data->supplier3}} </td>;
                @else
                  <td style="font-size: 9pt; text-align:center;width:16.67%" style="font-family: arialbd">{{$data->supplier3}} </td>
                @endif
            </tr>
        </table>

        <table class="info" style="border: none;" border="0" width="100%" cellspacing="0"  cellpadding="0">
        @foreach($data2 as $datas)
            <tr>
                <td style="width:6%;text-align:center;" ></td>
                <td style="width:7%;text-align:center;font-size: 10pt">{{$datas->quantity}}</td>
                <td style="width:4%;text-align:center;font-size: 10pt">{{$datas->unit}}</td>
                <td style="width:22%;text-align:center;font-size: 10pt">{{$datas->item}}<br>{!! nl2br($datas->item_desc) !!}</td>
                <td style="width:11%;text-align:center;font-size: 10pt">{{$datas->abc}}</td>


                @if($data->supplier1_id == $data->awarded_supplier_id )
                    <td style="font-size: 10pt; align:center;width:16.67%" style="font-family: arialbd; background-color: #acdaef">{{$datas->amount1}} </td>;
                @else
                  <td style="font-size: 10pt; align:center;width:16.67%" style="font-family: arialbd">{{$datas->amount1}} </td>
                @endif

                
                @if($data->supplier2_id == $data->awarded_supplier_id )
                    <td style="font-size: 10pt; align:center;width:16.67%" style="font-family: arialbd; background-color: #acdaef">{{$datas->amount2}} </td>;
                @else
                  <td style="font-size: 10pt; align:center;width:16.67%" style="font-family: arialbd">{{$datas->amount2}} </td>
                @endif

                @if($data->supplier3_id == $data->awarded_supplier_id )
                    <td style="font-size: 10pt; align:center;width:16.67%" style="font-family: arialbd; background-color: #acdaef">{{$datas->amount3}} </td>;
                @else
                  <td style="font-size: 10pt; align:center;width:16.67%" style="font-family: arialbd">{{$datas->amount3}} </td>
                @endif
            </tr>
        @endforeach
        </table>

        <table style="font-size: 10pt;text-align:center" width="100%" cellpadding="5px">
            <tr>
            <td>ACTION/RECOMMENDATION: Awarded to {{$data->awarded_supplier}} for being the lowest complying responsive bidder.</td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
            <td>WHEREBY CERTIFY that the following is true and correct abstract of bids/canvas submitted by the dealers indicated above which were opened in our presence 
            this  {{ (is_null($data->date_openingbids)? '____' : date_create($data->date_openingbids)->format("dS")) }}
             day of {{ (is_null($data->date_openingbids)? '_______' : date_create($data->date_openingbids)->format("F, Y")) . ' ' . $data->time_openingbids }}</td>
            </tr>
        </table>

        <table class="footer" width="100%" cellspacing="0"  cellpadding="0">
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td style="width:20%;text-align:center" ><u>FATIMA A. EMBAN, MD, MPH </u><br>Medical Specialist IV<br> BAC Chairperson</td>
                <td style="width:20%;text-align:center" ><u>AMEBELLA G. TARUC, MD  </u><br>LHSD-CHIEF <br> BAC Vice Chairperson</td>
                <td style="width:20%;text-align:center" ><u>GODWIN LORD Y. GALLO, RN, MPH </u> <br> Cheif Administrative Officer<br> BAC Member </td>
                <td style="width:20%;text-align:center" ><u>KATHERINE C. CIÑO, RN </u> <br>NURSE IV <br> BAC Member</td>
                <td style="width:20%;text-align:center" ><u>ADIMELA C. GANGOSO,MD,MPH  </u><br> Medical Specialist III <br> BAC Member</td>
            </tr>
        </table>


        </main>
    </body>
</html>
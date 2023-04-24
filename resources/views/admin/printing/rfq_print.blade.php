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
            <td  colspan="2" width="100%" align="center"><h3><center>REQUEST FOR QUOTATION</center><br></h3></td>
            </tr>
            <tr>
                <td style="text-align:left;width:50%">NAME OF COMPANY : <hr>ADDRESS :<hr> 
                BUSINESS PERMIT NO :<hr>TIN No. : <hr>Philgeps Reg:<hr>
                </td>

                <td style="text-align:left;width:50%">Date: {{$data->date_rfq_created}}<hr> RFQ NO.: {{$data->rfqno}}<hr> PR NO. {{$data->prno}}
                    <hr> FDA LTO:
                    <hr> FDA CPR:<hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:left;"> <b>PLS. WRITE LEGIBLY</b> <br><br>  
                
                Please quote your best offer for the item described below, subject to the terms and Conditions provided at the dorsal portion of this
                request for quotation. Submit your quotation duly signed by you or your duly represenatative and copies of the following eligibility requirements not later than: {{ ((is_null($data->days_to_be_return)) ? '____________' : $data->days_to_be_return ) }}, 
                
                <p style="text-align:right;"><br><b>{{$data->signatory2}}</b> 
                    <br>BAC Chairperson

                <br><br> After having carefully read and accepted the Terms and Conditions, I/we submitted our quotations for the items as follows:
                </p>
            </td>
            </tr>
        </table>

        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <th style="width:25%">OFFICE SECTION <br><u><b> {{$data->office}}<br> </b>Fund Cluster:<b><br>{{$data->fundsource}}</b></u></th>
            <th style="width:50%"> PR No. <u><b>{{$data->prno}}</b></u></th>
            <th style="width:25%"> PR Date: <b>{{date('m/d/Y', strtotime($data->date_prep_pr_enduser))}}</b></th>
            </tr> 
        </tr>
        </table>

        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <th style="width:45%"> ITEM DESCRIPTION</th> 
            <th style="width:10%"> QUANTITY</th> 
            <th style="width:10%"> UNIT</th> 
            <th style="width:10%">ABC</th>
            <th style="width:12.5%">Unit Price</th> 
            <th style="width:12.5%">Total Amount</th> 
        </tr>

        <tr>
            <td style="font-weight:bold;text-align:left;">{{$data->title}}</td>
            <td></td>
            <td></td>
            <td></td>nd 
            <td></td>
            <td></td>
        </tr>
        @foreach($data2 as $datas)
            <?php
             $unitcost = number_format($datas->price,2); /* Format Number */
             $unittotal= number_format($datas->total,2); /* Format Number */
             if($datas->override_price){
                $unitcost=number_format($datas->override_price, 2);  
              }
            ?>
            <tr>
            <th><b>{{$datas->title}}</b><br>{{$datas->item}}
            {!! nl2br($datas->item_desc) !!}
            </th> 
            <td> {{$datas->quantity}}</td>
            <td>{{$datas->unit}}</td> 
            <td>{{$unitcost}}</td> 
            <td></td>
            <td></td>
            </tr>
            @endforeach
        </table>
        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td  style="width:45%"></td> 
                <td  style="width:10%"></td>
                <td  style="width:10%"></td>
                <td  style="width:10%"></td>
                <td  style="width:12.5%;text-align:right" >Total <hr> ABC:<br>{{number_format($total->sumtotal,2)}}</td> 
                <td  style="width:12.5%">  </td> 
            </tr>
        </table>

        <table class="info" border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
				<td colspan="2" style="text-align:left"> Note to Supplier: <br> {!! nl2br($data->supplier_inst) !!}
				</td>
			</tr>
            <tr>
				<td style="text-align:center">CANVASSED BY<br>  ____________________________<br> </td>
				<td style="text-align:center">COMPANY REPRESENTATIVE<br>  ____________________________<br> </td>
			</tr>
            <tr>
                <td colspan="2" style="text-align:left">
                Terms and Conditions<br>
                1. Bidders shall provide correct and accurate information required in this form.<br>
                2. Price quotation/s must be valid for a period of 30 Calendar days from the date of submission<br>
                3. Price quotation/s to be denominated in Philippine peso shall include all taxes, duties and/or levies payable.<br>
                4. Quotations exceeding the approved budget for the contract shall be rejected<br>
                5. Awward of contract shall be made to the lowest quotation <br>
                6. Any interlineations, erasures or overwriting shall be valid only if they are signed or initiated by you or any of your duly authorized representative/s. <br>
                7. The item/s shall be delivered on the scheduled date specified from purchase order. <br>
                8. The DOH CHD XII shall have the right to inspect and/or to test the goods to confirm their conformity to the technical specifications. <br>
                9. Liquidated damages equivalent to the one tenth of one percent (0.001%) of the value of the goods not delivered within the prescribed delivery period shall be imposed per day of delay. The DOH CHD XII shall rescind the contract once the cumulative amount of liquidated damages reaches ten percent (10%) of the amount of the contract, without prejudice to other courses of action and remedies open to it.
                </td>
            </tr> 
        </table>
        </main>
    </body>
</html>
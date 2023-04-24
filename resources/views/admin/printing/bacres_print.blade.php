<?php
// dd($supplier3);
$counter = 0;
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
            .bold{
                font-family: timesbd;
            }

            .center{
                text-align: center;
            }
            .tbl-bordered td{
                border: 1px solid black;
                
            }
            .page_break { page-break-before: always; }
		.header th{vertical-align:middle; padding-top:5px;padding:5pt;color:#000000;background-color:#FFFFFF;font-size: 8pt;text-align: left;}
        .header td{vertical-align:middle; padding-top:5px;padding:5pt;color:#000000;background-color:#FFFFFF;font-size: 8pt;text-align: right;}
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
                    <img src="{{ asset('public/img/BACHeader2.jpg') }}" style="width:100%"/>
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
        <div class="center">
            <span class="bold">BAC Resolution No. {{$data->bac_no}} </span><br>
            Series of 2018<br>
            <span class="bold">RESOLUTION RECOMMENDING AND APPROVING THE AWARD OF CONTRACT FOR THE PROCUREMENT OF {{ strtoupper($data->category) }} THROUGH ADOPTION OF ALTERNATIVE METHOD OF PROCUREMENT UNDER SECTION 53.9 
            <br>(SMALL VALUE PROCUREMENT)</span>
        </div>

        <p style=" line-height: 11pt;">
        WHEREAS, the Bids and Awards Committee received the Purchase request in the Procurement of {{$data->L1_title}}
        </p>
        <p style=" line-height: 11pt;">
        WHEREAS, the total estimated cost is {{$data->abc}} (Purchase Request hereto attached to form part of this Resolution);
        </p>
        <p style=" line-height: 11pt;">
        WHEREAS, Rule XVI of the Revised IRR of RA 9184 provides legal basis when the procuring entity may resort to alternative method of procurement for goods/services;
        </p>
        <p style=" line-height: 11pt;">
        WHEREAS, Section 53 of the Revised Implementing Rules and Regulations (IRR) of RA 9184, otherwise known as the Government Procurement Reform Act of 2009, allows an agency to resort to negotiated procurement;
        </p>
        <p style=" line-height: 11pt;">
        WHEREAS, further, section 53.9 of the Revised IRR of RA 9184 allows an agency to resort to Small Value Procurement where the procurement does not fall under Shopping of Section 52 of the revised IRR and the amount involved does not exceed the thresholds prescribed in Annex “H” of the revised IRR;
        </p>
        <p style=" line-height: 11pt;">
        WHEREAS, for such purpose, the procuring entity shall merely invite at least three suppliers of known qualifications to submit their proposal, pursuant to GPPB Resolution No. 09-2009 dated 23 November 2009;
        </p>
        <p style=" line-height: 11pt;">
        WHEREAS, there were three (3) suppliers responded on the said invitation and submitted their respective quotations, namely:
        @foreach($supplier3 as $supp)
                <?php
                $counter++;
                ?>
                @if($counter == 1)
                    {{ $supp->business_name }}
                @else
                    {{ "; " . $supp->business_name }} 
                @endif
           
        @endforeach
         </p>

        <table class="tbl-bordered" width="100%" style="text-align:center" cellspacing="0"  cellpadding="0">
            <tr>
            <td>NAME OF SUPPLIERS</td>
            <td>BID PRICE</td>
            <td>REMARKS</td>
            </tr>
            @foreach($data3 as $dat)
            <tr>
            <td class="(($data->awarded_supplier == $dat->id)? "bold" : "") "> {{ $dat->business_name }}</td>
            <td class="((data->awarded_supplier  == $dat->id)? "bold" : "") "> {{ $dat->bid_price }}</td>
            <td class="((data->awarded_supplier  == $dat->id)? "bold" : "") "> {{ $dat->bac_remarks1 }}</td>
            </tr>
            @endforeach
        </table>
            <p style="line-height: 11pt;">
            NOW, THEREFORE, the Members of the Bids and Awards Committee (BAC), hereby RESOLVE as it is hereby RESOLVED the Procurement of {{ $data->L1_title }} is recommended for award to {{ $data->business_name }} through Section 53.9 (Small Value Procurement) of the IRR of R.A. 9184 and in strict observance of the guidelines in GPPB Resolution No. 09-2009.
            </p>

            <p style="line-height: 11pt;">
            This {{ date_create($data->date_abstractcanv)->format('dS') }}  day of {{ date_create($data->date_abstractcanv)->format('F, Y') }} at DOH – Purok San Miguel, Brgy Paraiso Koronadal City.
            </p>

            <div class="page_break"></div>
            <header>
            <table class="header" border="0" width="100%" cellspacing="0">
			<tr>
			    <td style="width: 2in; text-align: center">
                    <br>
                    <br>
                    <img src="{{ asset('public/img/BACHeader2.jpg') }}" style="width:100%"/>
			    </td>
			</tr>
			</table>
        </header>
            <table style="font-family: times; margin-top:150px;" width="100%">
                <tr>
                    <td style="text-align:center">
                    FATIMA A. EMBAN, MD, MPH<br>
                    Member
                    </td>
                    <td style="text-align:center">
                    JEBIE AREEN J. BIRON, MD, MPH<br>
                    Member
                    </td>
                </tr>
                <tr>
                    <td colspan="2"  style="text-align:center">
                    <br><br>
                    ADIMELCA C. GANGGOSO, MD, MPH<br>
                    Member
                    </td>
                </tr>
                    <tr>
                        <td  style="text-align:center">
                            <br><br>
                            AMBELLA G. TARUC, MD<br>
                            Chairperson
                        </td>
                        <td  style="text-align:center">
                            <br><br>
                            LEDA C. TEJAM, MPA<br>
                            Vice Chairperson
                        </td>
                    </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <div style="text-align: left">Approved by:</div>
                            <div style="text-align: center">
                            ARISTEDES CONCEPCION TAN, MD, MPH, CESO III<br>
                            DIRECTOR IV
                            </div>
                    </td>
                </tr>
                </table>
        </main>
    </body>
</html>
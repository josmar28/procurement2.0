<?php
// dd($data3);
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
                    <img src="{{ asset('public/img/BACHeader.jpg') }}" style="width:100%"/>
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
            <span class="bold">BAC Resolution No. ' . $rowmain['bac_no'] . '</span><br>
            Series of 2018<br>
            <span class="bold">RESOLUTION RECOMMENDING AND APPROVING THE AWARD OF CONTRACT FOR THE PROCUREMENT OF ' . strtoupper($rowmain['category']) . ' THROUGH ADOPTION OF ALTERNATIVE METHOD OF PROCUREMENT UNDER SECTION 53.9 
            <br>(SMALL VALUE PROCUREMENT)</span>
        </div>

        </main>
    </body>
</html>
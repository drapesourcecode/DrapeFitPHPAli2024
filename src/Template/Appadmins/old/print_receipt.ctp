<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <style>
        @page {
            size: A4;
            margin: 0;
            margin:10pt 0pt 40pt;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
        }

        @page:first {
            size: 5.5in 8.5in;
            margin: 0pt;
        }
        .print-box{
            width: 21cm;
        }
        .pagebreak {
            page-break-before: always;
        }
        .post p{
            font-size: 12px;
            font-weight: 600;
        }
        .center-box{
            display: inline-block;
            width: 100%;
            text-align: left;
            padding-bottom: 10px;
        }

        p {
            page-break-after: always;
        }
        .footer {
            bottom: 0px;
        }
        .pagenum:before {
            content: counter(page);
        }
        .hide{
            display: none !important;
        }
        .active{
            display: block;
        }
        .center-box table.table tr:last-child th,.center-box table.table tr:last-child td{
            border-bottom: 1px solid #ddd;
        }
        .center-box table.table tr th,.center-box table.table tr td{
            padding: 10px;
        }
        .center-box table.table tr th:nth-child(4),.center-box table.table tr td:nth-child(4),.center-box table.table tr th:nth-child(5),.center-box table.table tr td:nth-child(5){
            text-align: right;
        }
        .center-box table.table tr th:last-child,.center-box table.table tr td:last-child{
            text-align: right;
        }
        .center-box table.table tr th:first-child,.center-box table.table tr td:first-child{
            border-right: 1px solid #ccc;
            width: 70px;
        }
        .total-box{
            float: left;
            width: 100%;
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .total-box-left {
            float: left;
            width: 43%;
            padding-top: 40px;

        }
        .total-box-right{
            float: right;
            width: 290px;
            text-align: right;
        }
        .total-box-right table tr td{
            padding: 7px;
            vertical-align: top;
        }
        .total-box-right table tr:nth-child(2) td{
            border-bottom: 1px solid #ccc;
        }
    </style>

    <!--<body onload="window.print();">-->
    <body onload="window.print();">
        <div style="float: left; width: 100%; text-align: center">
            <div class="print-box" style="padding: 0 30px; display: inline-block; text-align: left;">
                <div style="text-align:center;">
                    <div class="post" style="display: inline-block;">      
                        <li style="display:inline-block;margin: 15px 80px;">     
                            <p><?php echo $paymentDetails->user->email; ?></p>                          
                            <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $paymentDetails->user->user_detail->barcode_image ?>" style="text-align:center;"> <br> 
                        </li>
                    </div>
                </div>


                <h3 style="text-align: center;font-weight: bold;font-size: 32px;color: #OOO;width: 100%;margin-top: 15px; margin-bottom: 15px;"> Hello,<?php echo $paymentDetails->user->name; ?> </h3>
                <p style="font-size: 17px;color: #6e6767;">Thank you for letting us prepare your FIT # <?php echo$paymentDetails->count; ?>  for you.</p>
                <div style=" text-align: left;">
                    <div class="center-box">
                        <div class="post">  
                            <p>Your Personal Stylist <?php echo $getEmployeeName; ?> picks following product for you.</p>
                            <table class="table">
                                <tr>
                                    <th style="font-size: 13px;">ITEM ID</th>
                                    <th style="font-size: 13px;">ITEM NAME</th>
                                    <th style="font-size: 13px;">SIZE</th>
                                    <th style="font-size: 13px;">COLOR</th>
                                    <th style="font-size: 13px;">PRICE</th>
                                </tr>
                                <?php
                                $price = 0;
                                foreach ($productDetails as $products) {
                                    $price += $products->sell_price;
                                    $percentage = 25;
                                    $discount = ($percentage / 100) * $price;
                                    //@$purchaseCredit = $styleFee;
                                    ?>
                                    <tr>
                                        <td style="color: #909090; font-size: 15px;"><?php echo $products->barcode_value; ?></td>
                                        <td style="color: #909090; font-size: 15px;"><strong><?php echo $products->product_name_one; ?></strong></td>
                                        <td style="color: #909090; font-size: 15px;"><?php echo $products->size; ?></td>
                                        <td style="color: #909090; font-size: 15px;"><?php echo $products->color; ?></td>
                                        <td style="color: #909090; font-size: 15px;">$<?php echo number_format($products->sell_price, 2); ?></td>
                                    </tr>
                                <?php } ?>

                            </table>
                        </div>
                        <div class="total-box">
                            <div class="total-box-left">
                                <!--<p style="color: #747373;-->
                                <!--   line-height: 23px;"><strong>Don't loose your style FIT fee!</strong> it will be credited <br> toward any items you purchase in this FIT <br><br>-->
                                <!--    <strong>Purchase all discount:</strong>-->
                                <!--    You'll receive <?php echo $percentage; ?>% discount when you purchase all products.</p>-->

                                <p style="color: #747373;
                                   line-height: 23px;">
                                    <strong>Purchase all discount:</strong>
                                    You'll receive <?php echo $percentage; ?>% discount when you purchase all products.</p>
                            </div>
                            <div class="total-box-right">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="color: #747373">subtotal</td>
                                        <td style="color: #747373">$<?php echo sprintf("%.2f",@$price); ?></td>
                                    </tr>
                                    <?php
                                    $price = sprintf("%.2f",$price);
                                    //echo @$allKeepsProducts; exit;

                                    if (@$allKeepsProducts == 2) {
                                        @$discount1 = 0;
                                    } else {
                                        @$discount1 = @$discount;
                                    }
                                    $discount1 = sprintf("%.2f",$discount1);
                                    ?>
                                    <tr>
                                        <td style="color: #747373">Purchase all discount <?php echo $percentage; ?>%</td>
                                        <td style="color: #747373">-$<?php echo number_format(@$discount1, 2); ?></td>
                                    </tr>

                                    <tr>
                                        <td style="color: #747373">Order subtotal</td>
                                        <td style="color: #747373">$<?php echo number_format(@$price - @$discount1, 2); ?></td>
                                    </tr>
                                    <!--                                    <?php
                                    @$purchaseCredit = $styleFee;

                                    $isstylefee = $this->User->isstylefee($id);
                                    if ($isstylefee != 1) {
                                        @$purchaseCredit = @$purchaseCredit;
                                    } else {
                                        @$purchaseCredit = 0;
                                    }
                                    ?>
                                                                        <tr>
                                                                            <td style="color: #747373">Style FIT fee purchase credit</td>
                                                                            <td style="color: #747373">-$<?php //echo number_format(@$purchaseCredit, 2);  ?></td>
                                                                        </tr>-->
                                    <?php
                                    
//                                    if ($sales_tx_required == "YES") {
                                        $tt_prc = $price - @$discount1;                                     
                                        $tax = $sales_tax;
                                        $sales_tax = sprintf("%.2f",$tt_prc) * $tax;
                                        $sales_tax = sprintf("%.2f",$sales_tax);
//                                    }
                                    ?>
                                    <tr>
                                        <td style="color: #747373"><strong>Sales tax</strong></td>
                                        <td style="color: #747373"><strong>+$<?php echo number_format($sales_tax, 2); ?></strong></td>
                                    <tr>
                                        <td style="color: #747373"><strong>Order total</strong></td>
                                        <td style="color: #747373"><strong>$<?php echo number_format($price - @$discount1 - @$purchaseCredit+$sales_tax, 2); ?></strong></td>

                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="last-box">
                            <p><strong>Please check out online--it will help us to make better Fit next time.</strong></p>
                            <p style="color: #747474; font-size: 15px;">1. Please sign it to drapefit.com.</p>
                            <p style="color: #747474; font-size: 15px;">2. Complete your checkout and Provide your feedback.</p>
                            <p style="color: #747474; font-size: 15px;">3. Ship any exchange or return product with prepaid mailing bag within 3 Business days.</p>
                            <h3 align="left" style="margin-top: 30px; font-weight: bold; font-size: 25px;">DRAPE FIT</h3>
                        </div>
                    </div>
                </div>

            </div> 
        </div>

    </body>
</html>

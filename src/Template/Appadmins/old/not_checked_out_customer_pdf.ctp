<?php

use Cake\ORM\TableRegistry;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Customer who has not checked out</title>
        <style>
            @font-face {
                font-family: Junge;
                src: url(Junge-Regular.ttf);
            }

            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }

            a {
                color: #001028;
                text-decoration: none;
            }

            body {
                font-family: Junge;
                position: relative;
                width: 21cm;  
                height: 29.7cm; 
                margin: 0 auto; 
                color: #001028;
                background: #FFFFFF; 
                font-size: 14px; 
            }

            .arrow {
                margin-bottom: 4px;
            }

            .arrow.back {
                text-align: right;
            }

            .inner-arrow {
                padding-right: 10px;
                height: 30px;
                display: inline-block;
                background-color: rgb(233, 125, 49);
                text-align: center;

                line-height: 30px;
                vertical-align: middle;
            }

            .arrow.back .inner-arrow {
                background-color: rgb(233, 217, 49);
                padding-right: 0;
                padding-left: 10px;
            }

            .arrow:before,
            .arrow:after {
                content:'';
                display: inline-block;
                width: 0; height: 0;
                border: 15px solid transparent;
                vertical-align: middle;
            }

            .arrow:before {
                border-top-color: rgb(233, 125, 49);
                border-bottom-color: rgb(233, 125, 49);
                border-right-color: rgb(233, 125, 49);
            }

            .arrow.back:before {
                border-top-color: transparent;
                border-bottom-color: transparent;
                border-right-color: rgb(233, 217, 49);
                border-left-color: transparent;
            }

            .arrow:after {
                border-left-color: rgb(233, 125, 49);
            }

            .arrow.back:after {
                border-left-color: rgb(233, 217, 49);
                border-top-color: rgb(233, 217, 49);
                border-bottom-color: rgb(233, 217, 49);
                border-right-color: transparent;
            }

            .arrow span { 
                display: inline-block;
                width: 80px; 
                margin-right: 20px;
                text-align: right; 
            }

            .arrow.back span { 
                margin-right: 0;
                margin-left: 20px;
                text-align: left; 
            }

            h1 {
                color: #5D6975;
                font-family: Junge;
                font-size: 2.4em;
                line-height: 1.4em;
                font-weight: normal;
                text-align: center;
                border-top: 1px solid #5D6975;
                border-bottom: 1px solid #5D6975;
                margin: 0 0 2em 0;
            }

            h1 small { 
                font-size: 0.45em;
                line-height: 1.5em;
                float: left;
            } 

            h1 small:last-child { 
                float: right;
            } 

            #project { 
                float: left; 
            }

            #company { 
                float: right; 
            }

            table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 30px;
            }

            table th,
            table td {
                text-align: center;
            }

            table th {
                padding: 5px 20px;
                color: #5D6975;
                border-bottom: 1px solid #C1CED9;
                white-space: nowrap;        
                font-weight: normal;
            }

            table .service,
            table .desc {
                text-align: left;
            }

            table td {
                padding: 20px;
                text-align: right;
            }

            table td.service,
            table td.desc {
                vertical-align: top;
            }

            table td.unit,
            table td.qty,
            table td.total {
                font-size: 1.2em;
            }

            table td.sub {
                border-top: 1px solid #C1CED9;
            }

            table td.grand {
                border-top: 1px solid #5D6975;
            }

            table tr:nth-child(2n-1) td {
                background: #EEEEEE;
            }

            table tr:last-child td {
                background: #DDDDDD;
            }

            #details {
                margin-bottom: 30px;
            }

            footer {
                color: #5D6975;
                width: 100%;
                height: 30px;
                position: absolute;
                bottom: 0;
                border-top: 1px solid #C1CED9;
                padding: 8px 0;
                text-align: center;
            }

        </style>
    </head>
    <body>
        <main>
            <h1  class="clearfix"><small><span>Report Date</span><br /><?php echo date('M d, Y h:I:s a'); ?></h1>
            <table>
                <thead>
                    <tr>                                            
                        <th>Name</th>
                        <th>Email</th>
                        <th>Kids Name</th>
                        <th>Profile type</th>
                        <th>Fit</th>
                        <th>
                            Products
                            <table style="width: 70%;">
                                <tr>
                                    <th>Product name</th>
                                    <th>Checkout</th>                                                            
                                    <th>Date</th>                                                            
                                    <th>price</th>  
                                    <th>Finalize date </th>                                                          
                                </tr>


                            </table>
                        </th>
                    </tr>
                </thead>


                <tbody>
                    <?php
//                                        echo "<pre style='mardin-left:30px'>";
//                                        print_r($new_data);
//                                        echo "</pre>";
                    foreach ($new_data as $key => $n_dt) {
                        $user_name = '';
                        $user_email = '';
                        $kid_name = '';
                        $profile_type = '';
                        $fit_d = '';
                        $pord_d = '';
                        $keep_s = '';
                        $total_product_price = 0;
                        foreach ($n_dt as $ky => $dt) {
                            $fnz_dt = '';
                            $user_name = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;
                            $user_email = $dt->user->email;
                            $kid_name = !empty($dt->kid_id) ? $dt->kid_data : '';
                            $profile_type = $dt->payment_getway->profile_type;
                            $fit_d = $dt->payment_getway->count;
                            if ($dt->checkedout == 'Y') {
                                if ($dt->keep_status == 3) {
                                    $keep_s = 'Keep';
                                    $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                                } elseif ($dt->keep_status == 2) {
                                    if ($dt->is_altnative_product == 1) {
                                        $keep_s = "Exchange Altnative product";
                                        $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                                    } else {
                                        $keep_s = 'Exchange';
                                        $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                                    }
                                } elseif ($dt->keep_status == 1) {
                                    $keep_s = 'Return';
                                    $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                                    if ($dt->store_return_status == 'Y') {
                                        $keep_s .= " <span style='background:green;padding: 3px;' class='fa fa-check'>&nbsp;&nbsp;</span>";
                                    }
                                } elseif ($dt->keep_status == 0) {
                                    $keep_s = 'Pending';
                                }
                            } else {
                                $keep_s = 'Pending';
                            }
                            $pord_d .= "<tr>"
                                    . "<td>" . $dt->product_name_one . " ( " . $keep_s . " ) " . "</td>"
                                    . "<td>" . $dt->checkedout . "</td>"
                                    . "<td>" . date('d-M-Y', strtotime($dt->created)) . "</td>"
                                    . "<td>$" . $dt->sell_price . "</td>"
                                    . "<td >" . $fnz_dt . "</td>"
                                    . "</tr> ";
                            $total_product_price += $dt->sell_price;
                        }
                        $pord_d .= "<tr>"
                                . "<td colspan='3' align='center'><b>Total :</b> </td>"
                                . "<td ><b>$" . $total_product_price . "</b></td>"
                                . "</tr> ";
                        ?>
                        <tr>
                            <td><?= $user_name; ?></td>
                            <td><?= $user_email; ?></td>
                            <td><?= $kid_name; ?></td>
                            <td><?php
                                if ($profile_type == 1) {
                                    echo "Men";
                                }
                                if ($profile_type == 2) {
                                    echo "Women";
                                }
                                if ($profile_type == 3) {
                                    echo "Kid";
                                }
                                ?></td>
                            <td><?= $fit_d; ?></td>
                            <td>
                                <?php if (!empty($pord_d)) { ?>
                                    <table style="width: 87%;">    
                                        <tr style="opacity: 0;">
                                            <th>Product name</th>
                                            <th>Checkout</th>                                                            
                                            <th>Date</th>                                                            
                                            <th>Price</th>                                                            
                                        </tr>
                                        <?= $pord_d; ?>

                                    </table>
                                <?php } ?>
                            </td>
                        </tr>

                        <?php
                        $count++;
                    }
                    ?>
                </tbody>

            </table>


        </main>
        <footer>
            Customer who has not checked out Report was created on a computer and is valid without the signature and seal.
        </footer>
    </body>
</html>
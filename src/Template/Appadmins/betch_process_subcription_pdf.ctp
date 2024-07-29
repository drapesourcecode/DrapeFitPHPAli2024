<?php

use Cake\ORM\TableRegistry;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Example 3</title>
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
                        <th class="service" >Fit number</th>
                        <th class="service" >Client Email</th>
                        <th class="service" >Client Subject</th>
                        <th class="service" >Name</th>
                        <th class="service">Kid Name</th>
                        <th class="service" >Client Status</th>
                        <th class="service">Support Email</th>
                        <th class="service">Support Subject</th>
                        <th class="service">Sending date time</th>
                        <th class="service">Support Status</th>
                        <th class="service">Process</th>
                        <th class="service">Day</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    $i = 1;
                    foreach ($AllUserList as $aduserlist):
                        ?>
                        ?>
                        <tr>
                            <td><?php echo $this->Custom->paymentProfileCount($aduserlist->fit_number); ?></td>
                            <td><?php echo $aduserlist->email; ?></td>
                            <td><?php echo @$aduserlist->subject; ?></td>
                            <td><?php echo $aduserlist->name; ?></td>
                            <td><?php echo @$aduserlist->kid_name; ?></td>
                            <td><?php echo @$aduserlist->status; ?></td>
                            <td><?php echo $aduserlist->support_email; ?></td>
                            <td><?php echo $aduserlist->support_subject; ?></td>
                            <td><?php echo @$aduserlist->sending_datetime; ?></td>
                            <td><?php echo @$aduserlist->support_status; ?></td>
                            <td>
                                <?php echo @$aduserlist->process; ?>
                                <br/>
                                <?php if ($aduserlist->process == 'boxUpdate()') { ?>
                                    Payment message:<?php echo $aduserlist->payment_message; ?>
                                    Transactions id:<?php echo $aduserlist->transctions_id; ?>
                                <?php } ?>
                                <?php if ($aduserlist->process == 'boxUpdateKid()') { ?>
                                    Payment message:<?php echo $aduserlist->payment_message; ?>
                                    Transactions id:<?php echo $aduserlist->transctions_id; ?>
                                <?php } ?>
                            </td>
                            <td><?php echo @$aduserlist->day; ?></td>
                        </tr>

                        <?php
                        $i++;
                    endforeach;
                    ?>

                </tbody>

            </table>


        </main>
        <footer>
            Report was created on a computer and is valid without the signature and seal.
        </footer>
    </body>
</html>
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
                        <th class="service">Create Date</th>
                        <th class="service">Gender</th>     
                        <th class="service">Full Name </th>
                        <th class="service">Email</th>
                        <th class="service">Asign Customer Stylist</th>
                        <th class="service">Kids Name</th> 
                        <th class="service">Age</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($userdetails as $user) {
                        $usr_gnd = '';
                        $getPaidStatus = $this->Custom->ChcckPaid($user->id);
                        if ($getPaidStatus != $user->id) {
                            ?>
                            <tr>
                                <td ><?php echo $user->created_dt; ?></td>
                                <td><?php echo $usr_gnd = $this->Custom->GenderName($user->id); ?></td>
                                <td><?php echo $this->Custom->UserName($user->id); ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $this->Custom->getStylistName(@$user->id); ?></td> 
                                <td></td>
                                <td>
                                    <?php
                                    if (!empty($usr_gnd)) {
                                        $year = '';
                                        if ($usr_gnd == 1) {
                                            $year = $this->Custom->birthDayMen($user->id);
                                        }
                                        if ($usr_gnd == 2) {
                                            $year = $this->Custom->birthDayWomenMen($user->id);
                                        }


                                        if (!empty($year)) {
                                            $dob = str_replace('/', '-', $year);
                                            $diff = (date('Y') - date('Y', strtotime($dob)));
                                            echo $diff;
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }

                        $checkKidDetails = $this->Custom->havingKid($user->id);
                        if ($checkKidDetails != 0) {
                            $visitordata1 = TableRegistry::get('kids_details');
                            $dataListing = $visitordata1->find()->where(['user_id' => $user->id]);
                            foreach ($dataListing as $list) {
                                $checkPaidDetails = $this->Custom->ChcckPaidKid($list->id);
                                if ($checkPaidDetails != $list->id) {
                                    if ($list->kid_count == 1) {
                                        $chlid_name = "First child";
                                    }
                                    if ($list->kid_count == 2) {
                                        $chlid_name = "Second child";
                                    }
                                    if ($list->kid_count == 3) {
                                        $chlid_name = "Thrd child";
                                    }
                                    if ($list->kid_count == 4) {
                                        $chlid_name = "Fourth child";
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $list->created_dt; ?></td>
                                        <td>Kid</td>
                                        <td><?php echo $this->Custom->UserName($list->user_id); ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td><?php echo $this->User->getStylistIdNameKid(@$list->id); ?></td> 
                                        <td>
                                            <span><?php
                                                if ($list->kids_first_name == '') {
                                                    echo $chlid_name;
                                                } else {
                                                    echo $list->kids_first_name;
                                                }
                                                ?></span><br>
                                        </td>
                                        <td>
                                            <?php
                                            $year = $this->Custom->kidBirthDay(@$list->id);

                                            if (!empty($year)) {
//                                                $dob = str_replace('/', '-', $year);
                                                $diff = (date('Y') - date('Y', strtotime($year)));
                                                echo $diff;
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>


        </main>
        <footer>
            Report was created on a computer and is valid without the signature and seal.
        </footer>
    </body>
</html>
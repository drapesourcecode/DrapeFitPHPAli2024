<?php

use Cake\ORM\TableRegistry;
?>
<style>
    .btn.btn-info.hint--top.hint .fa.fa-fw.fa-user-plus {
        width: 3.286em !important;
    }
    .hide{
        display: none;
    }
    .active{
        display: block;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('Customer list who not paid ') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <script>
        $('#example').DataTable({
            "order": [[0, "desc"]]
        });
    </script>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'customerNonePaidpdf'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'notpaidexcel'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Create Date</th>
                                    <th>Gender</th>     
                                    <th>Full Name </th>
                                    <th>Email</th>
                                    <th>Asign Customer Stylist</th>
                                    <th>Kids Name</th> 
                                    <th>Age</th> 
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
//                                                        $dob = str_replace('/', '-', $year);
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


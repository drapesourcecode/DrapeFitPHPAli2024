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
            <?= __('Clients birthday') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                            </div>

                            <div class="col-xs-12"> 

                            </div>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Name</th>
                                    <th>Kids Name</th>
                                    <th>Date of Birth</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($datas as $dt) {
                                    ?>
                                    <tr>
                                        <td><?php echo $dt->email; ?></td>
                                        <td><?php if($dt->profile_type==1){echo "Men";}else if($dt->profile_type==2){echo "Women";}else{echo "Kid";} ?></td>
                                        <td><?php echo $dt->name ?></td>
                                        <td><?php echo $dt->kid_name; ?></td>
                                        <td><?php echo !empty($dt->birthday)?date_format($dt->birthday,'d M,Y'):""; ?></td>
                                    </tr>

                                    <?php
                                    $count++;
                                }
                                ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


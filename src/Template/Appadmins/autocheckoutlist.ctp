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
            <?= __('Defaulter Customer Auto checkout list') ?>
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
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'autocheckoutpdf'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'autocheckoutexcel'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>Order Date</th>
                                    <th>Name</th>
                                    <th>Kid Name</th>
                                    <th>Email</th>
                                    <th>Profile Type</th>
                                    <th>Stylist name</th>
                                    <th>Finalize Date</th> 
                                    <th>Product Count</th> 
                                    <th>Product price</th> 
                                    <th>Auto check Out date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($notpaid_users as $user) {
                                    ?>
                                    <tr>
                                        <td><?php echo date('y-m-d', strtotime($user->created_dt)); ?></td>
                                        <td><?php echo $this->Custom->UserName($user->user_id); ?></td>
                                        <td><?php echo $this->Custom->kidName($user->kid_id) ?></td>
                                        <td><?php echo $this->Custom->email($user->user_id); ?></td>
                                        <td><?php
                                            if ($user->profile_type == 1) {
                                                echo "Men";
                                            } else if ($user->profile_type == 2) {
                                                echo "Women";
                                            } else {
                                                echo "Kids";
                                            }
                                            ?></td>
                                        <td><?php echo $this->Custom->emaplyeName(@$user->emp_id); ?></td>
                                        <td><?php echo date('y-m-d', strtotime(@$user->finalize_date)); ?></td>
                                        <td><?php echo $this->Custom->productCountPrice(@$user->parent_id); ?></td>
                                        <td><?php echo @$user->price; ?></td>
                                        <td><?php echo @$user->auto_check_out_date; ?></td>

                                    </tr>
                                    <?php
                                }
                                ?>
                            <tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


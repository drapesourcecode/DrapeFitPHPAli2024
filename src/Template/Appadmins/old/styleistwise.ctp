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
            <?= __('Stylist') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <script>
        $('#example').DataTable({
            "order": [[0, "desc"]]
        });
        function getchange(value) {
            if (value) {
                window.location = "<?php echo HTTP_ROOT . 'appadmins/styleistwise/' ?>" + value;
            }
        }
    </script>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'stylistwisepdf',$value], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'stylistwisreport',$value], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                            </div>

                            <div class="col-xs-12"> 
                                <select name="stylist" id="stylist" onchange="getchange(this.value)">
                                    <option <?php if ($value == 1) { ?> selected="selected" <?php } ?> value="1">Paid stylist</option>
                                    <option <?php if ($value == 2) { ?> selected="selected" <?php } ?> value="2">None Paid stylist</option>
                                </select> 
                            </div>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Stylist Full Name </th>
                                    <th>Email</th>
                                    <th>Assigned customer</th>
                                    <th>Kid name</th>
                                    <th>Create Date</th> 
                                    <th>Status</th>         
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                               
                                foreach ($stylist as $user) {
                                   
                                    ?>
                                    <tr>
                                        <?php if ($value == 1 || $value == '') { ?>
                                            <td><?php  echo $this->Custom->customerName($user->emp_id); ?></td>
                                        <?php } else { ?>
                                            <td><?php echo $this->Custom->customerName($user->employee_id); ?></td>
                                        <?php } ?>

                                        <td><?php echo $this->Custom->customerEmail($user->user_id); ?></td>
                                        <td><?php echo $this->Custom->customerName($user->user_id); ?></td>
                                        <td><?php echo $this->Custom->kidName(@$user->kid_id); ?></td>
                                        <td><?php echo $user->created_dt; ?></td>
                                        <td><?php echo $this->Custom->workStatus($user->work_status); ?></td>
                                    </tr>

                                    <?php
                                }
                                ?>
                                <!----> 
                        
                        
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


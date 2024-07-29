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
            <?= __('state wise men women and kids') ?>
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
                window.location = "<?php echo HTTP_ROOT . 'appadmins/numberstate/' ?>" + value;
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
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'stateepdf', $value], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'statereport', $value], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                            </div>

                            <div class="col-xs-12"> 
                                <select name="stylist" id="stylist" onchange="getchange(this.value)">
                                     <option <?php if ($value == 'All'|| $value == '') { ?> selected="selected" <?php } ?> value="all" >All State</option>
                                    <?php foreach ($getState as $gs) { ?>
                                        <option <?php if ($value == $gs->state) { ?> selected="selected" <?php } ?> value="<?php echo $gs->state; ?>" ><?php echo $gs->state; ?></option>
                                    <?php } ?>

                                </select> 
                            </div>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> Full Name </th>
                                    <th>Email</th>
                                    <th>Kid name</th>
                                    <th>State</th> 
                                    <th>City</th> 
                                    <th>Country</th>         
                                    <th>Zipcode</th>         
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $user) {
                                    ?>
                                    <tr>
                                        <td><?php echo $this->Custom->customerName($user->user_id); ?></td>
                                        <td><?php echo $this->Custom->customerEmail($user->user_id); ?></td>
                                        <td><?php echo $this->Custom->kidName(@$user->kid_id); ?></td>
                                        <td><?php echo $user->state; ?></td>
                                        <td><?php echo $user->city; ?></td>
                                        <td><?php echo $user->country; ?></td>
                                        <td><?php echo $user->zipcode; ?></td>

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


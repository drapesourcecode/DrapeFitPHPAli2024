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
            <?= __('Previous Work List reports') ?>
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
                            <div class="col-xs-12" id="formDiv"> </div>
                        </div>
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'previousPaidpdf'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'previouspaidReports'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Gender</th>         
                                    <th>Profile</th>         
                                    <th>Order date</th> 
                                    <th>Assign Customer stylist</th>
                                    <th>Kid Name </th>
                                    <th>Assign Kid stylist</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($userdetails as $pages):
//                                     pj($pages);
                                    ?>
                                    <?php $emailpstatus = $this->Custom->emailperference($pages->user_id, $pages->kid_id); ?>

                                    <tr>
                                        <td><?= h(@$pages->user->user_detail->first_name) ?>&nbsp;<?= h(@$pages->user->user_detail->last_name) ?></td>
                                        <td><?php
                                            if (@$pages->profile_type == 1) {
                                                echo "Men";
                                            } elseif (@$pages->profile_type == 2) {
                                                echo "Women";
                                            } else {
                                                echo "kid";
                                            }
                                            ?> </td>  
                                        <td><?php
                                            if ($pages->count == 1) {
                                                $ptype = 'st';
                                            } elseif ($pages->count == 2) {
                                                $ptype = 'nd';
                                            } elseif ($pages->count == 3) {
                                                $ptype = 'rd';
                                            } else {
                                                $ptype = 'th';
                                            }
                                            echo $pages->count . $ptype;
                                            ?></td>

                                        <td><?php echo @$pages->created_dt; ?> </td>                                         

                                        <td> <?php echo $this->Custom->emaplyeName(@$pages->emp_id) ?></td> 
                                        <td> <?php
                                            if ($pages->profile_type == 3) {
                                                echo $this->Custom->kidName($pages->kid_id);
                                            }
                                            ?>
                                        </td>
                                        <td> <?php echo $this->Custom->emaplyeName($pages->emp_id) ?> </td> 
                                    </tr>

                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                                <!----> 
                         </tbody>
                        
                        
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


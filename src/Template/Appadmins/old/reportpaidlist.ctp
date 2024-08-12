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
            <?= __('Customer Paid List Reports') ?>
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
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'customerPaidpdf'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'customerpaidReports'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Rq Date</th>
                                    <th>Full Name </th>
                                    <th>Email </th>
                                    <th>Profile</th>
                                    <th>Fit number</th>

                                    <th>Previous Stylist</th>
                                    <th>Assign Customer stylist</th>
                                    <th>Kid Name </th>
                                    <th>Age </th>
                                    <th>Assign Kid stylist</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($padiList as $list):
                                    ?>

                                    <tr>
                                        <td><?php echo $list->created_dt ?></td>
                                        <td><?php echo $this->Custom->UserName($list->user_id); ?></td>
                                        <td><?php echo $this->Custom->email($list->user_id); ?></td>
                                        <td><?php echo $this->Custom->paymentProfile($list->profile_type); ?></td>
                                        <td><?php echo $this->Custom->paymentProfileCount($list->count); ?></td>

                                        <td><?php echo $this->Custom->previousStyleistName(@$list->user_id, @$list->id, @$list->count); ?> </td>
                                        <td><?php echo $this->Custom->emaplyeName(@$list->emp_id) ?></td>
                                        <td>
                                            <?php
                                            if (@$list->profile_type == 3) {
                                                echo $this->Custom->kidName(@$list->kid_id);
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $dob=$year = '';
                                            
                                            if (@$list->profile_type == 1) {
                                                $year = $this->Custom->birthDayMen(@$list->user_id);
                                            }
                                            if (@$list->profile_type == 2) {
                                                $year = $this->Custom->birthDayWomenMen(@$list->user_id);
                                            }
                                            if (@$list->profile_type == 3) {   
                                                $year = $this->Custom->kidBirthDay(@$list->kid_id);
                                            }
                                            if(!empty($year)){
//                                                echo $dob = str_replace('/', '-', $year);
//                                                echo date('Y', strtotime($year));
                                                $diff = (date('Y') - date('Y', strtotime($year)));
                                                echo $diff;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $this->Custom->emaplyeName(@$list->emp_id) ?>  </td>
                                    </tr>

                                    <?php
                                    $i++;
                                endforeach;
                                ?>

                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

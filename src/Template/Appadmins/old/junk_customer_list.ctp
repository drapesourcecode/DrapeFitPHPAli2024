<div class="content-wrapper">
    <section class="content-header">
        <h1> Junk Customer Listing </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>            
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php if (!empty($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "dashboard") { ?>
                    <a href="<?php echo HTTP_ROOT; ?>appadmins/index">  <button class="btn btn-warning" type="submit" style="float: right; margin-top: -4%; margin-right: 20%;"> BACK</button> </a><?php } ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Registration Date</th>
                                    <th>Email</th>
                                    <th>Payment Status</th>
                                    <th>Last Login</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($AllUserList as $aduserlist): ?>
                                    <tr id="<?php echo $aduserlist->id; ?>" class="message_box">
                                    <td><?= h($aduserlist->name) ?></td>
                                    <td style="text-align: center;"><?php echo $aduserlist->created_dt; ?></td>
                                    <td><?= h($aduserlist->email) ?></td>
                                    <td>
                                        <?php
                                            $getpgstatus=$this->Custom->getPaymentGetwayStatus($aduserlist->id);
                                            if(in_array('0', $getpgstatus)){
                                                ?>
                                                <span style="color:red;">Not Paid</span>
                                            <?php 
                                            } 
                                        ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $this->Custom->dateDisplayTime($aduserlist->last_login_date); ?></td>                                   
                                    <td style="text-align: center;">
                                        <?php if(in_array('1', $getpgstatus)){ ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'customer_paymentdetails', $aduserlist->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password","target" => "_blank","title" => "View Payment Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        <?php } ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'junkCustomerDetails', $aduserlist->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                        <?php if ($aduserlist->is_active == 1) { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $aduserlist->id . '/Users'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', [ "data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        <?php } else { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $aduserlist->id . '/Users'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



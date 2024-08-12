<div class="content-wrapper">
    <section class="content-header">
        <h1> Refund Customer Listing  with status</h1>
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
                        <?php
                         echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'fundrefundlistExcel'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download excel", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                            ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Refund Payment Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profile Gender</th>
                                    <th>Profile Count</th>
                                    <th>Transactions id</th>
                                    <th>Refund Transactions id</th>
                                    <th>Refund Amount</th>
                                    <th>Order Type</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($AllUserList as $aduserlist): ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $aduserlist->created_dt; ?></td>
                                        <td><?php echo $this->Custom->customerName($aduserlist->user_id) ?>
                                            <?php if ($aduserlist->profile_type == 3) { ?>
                                                Kid's (<?php echo $this->Custom->kidName($aduserlist->kid_id); ?>)
                                            <?php } ?>


                                        </td>
                                        <td><?php echo $this->Custom->customerEmail($aduserlist->user_id) ?></td>
                                        <td><?php if ($aduserlist->profile_type == 1) { ?> Men <?php } else if ($aduserlist->profile_type == 2) { ?> Wemen <?php } else if ($aduserlist->profile_type == 3) { ?> Kid<?php } ?></td>
                                        <td><?php echo $aduserlist->count; ?></td>
                                        <td><?php echo $aduserlist->transactions_id; ?></td>
                                        <td><?php echo $aduserlist->refund_transactions_id; ?></td>
                                        <td>$ <?php echo $aduserlist->refund_amount; ?></td>
                                        <td style="text-align: center;"><?php if ($aduserlist->payment_type == 1) { ?> Box order <?php } else { ?> Checkout order <?php } ?></td>                                   
                                        <td style="text-align: center;">
                                            <?php if ($aduserlist->refound_status == 1) { ?>
                                                <a href="javascript:void(0)"   title="Allready funded" style="padding: 0 7px!important; width: 100px;">
                                                    <i class="fa fa-fw fa-paypal">Funded :Date:-<?php echo $aduserlist->refound_date; ?></i>
                                                </a>
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



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
                    echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'fundrefundExcel'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download excel", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                    ?>
                    <div class="box-body">
                        
                                        <div  class="row">
                                        <div  class="col-sm-6">
                                            <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                            <div class="form-group">
                                                <select class="form-control" name="search_for" required>
                                                    <option value="" selected disabled>Select field</option>
                                                    <option value="email" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "email")) ? "selected" : ""; ?> >User email</option>
                                                    <option value="user_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_name")) ? "selected" : ""; ?> >User first name</option>
                                                    <option value="user_last_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_last_name")) ? "selected" : ""; ?> >User last name</option>
                                                    <option value="kid_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "kid_name")) ? "selected" : ""; ?> >Kid name</option>
                                                    <option value="transactions_id" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "transactions_id")) ? "selected" : ""; ?> >Transactions no.</option>
                                                    <option value="order_id" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_id")) ? "selected" : ""; ?> >Order Id</option>
                                                   
                                                </select>
                                                <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                                                <button type="submit" class="btn btn-sm btn-info">Search</button>
                                                <a href="<?= HTTP_ROOT; ?>appadmins/fundrefund" class="btn btn-sm btn-primary">See All</a>
                                            </div>
                                            <?= $this->Form->end() ?>
                                        </div>
                                        </div>
                        <table id="exampleXX" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Payment Date</th>
                                    <th>Order id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profile Gender</th>
                                    <th>Profile Count</th>
                                    <th>Transactions id</th>
                                    <th>Amount</th>
                                    <th>Order Type</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($AllUserList as $aduserlist):
                                    if (!empty($aduserlist->transactions_id)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $aduserlist->created_dt; ?></td>
                                            <td style="text-align: center;"><?php echo !empty($aduserlist->parent_id)?' #DFPYMID' .$aduserlist->parent_id:' #DFPYMID' .$aduserlist->id; ?></td>
                                            <td><?php echo $aduserlist->user->name; ?>
                                                <?php if ($aduserlist->profile_type == 3) { ?>
                                                    Kid's (<?php echo $this->Custom->kidName($aduserlist->kid_id); ?>)
                                                <?php } ?>


                                            </td>
                                            <td><?php echo $aduserlist->user->email ?></td>
                                            <td><?php if ($aduserlist->profile_type == 1) { ?> Men <?php } else if ($aduserlist->profile_type == 2) { ?> Women <?php } else if ($aduserlist->profile_type == 3) { ?> Kid<?php } ?></td>
                                            <td><?php echo $aduserlist->count; ?></td>
                                            <td><?php echo $aduserlist->transactions_id; ?></td>
                                            <td>$ <?php
                                                $tax = 0;
                                                if ($aduserlist->payment_type != 1) {
                                                    $tax = !empty($aduserlist->payment) ? $aduserlist->payment->sales_tax : 0;
                                                }
                                                echo $aduserlist->price;// + $tax;
                                                ?></td>
                                            <td style="text-align: center;"><?php if ($aduserlist->payment_type == 1) { ?> Box order <?php } else if ($aduserlist->payment_type == 3) { ?> Direct charge <?php } else { ?> Checkout order <?php } ?></td>                                   
                                            <td style="text-align: center;">
                                                <?php if ($aduserlist->refound_status == 1) { ?>
                                                    <a href="javascript:void(0)"   title="Allready funded" style="padding: 0 7px!important; width: 100px;">
                                                        <i class="fa fa-fw fa-paypal">Funded :Date:-<?php echo $aduserlist->refound_date; ?></i>
                                                    </a>
                                                <?php } ?>

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalNorm-' . $aduserlist->id, "title" => "View Payment Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                            </td>
                                        </tr>


                                    <div class="modal fade" id="myModalNorm-<?php echo $aduserlist->id; ?>" tabindex="-1" role="dialog" 
                                         aria-labelledby="myModalLabel-<?php echo $list->id; ?>" aria-hidden="true">
                                        <div class="modal-dialog" style='width: 100%;'>
                                            <?= $this->Form->create('profile_data', array('id' => 'profile_data', 'data-toggle' => "validator")) ?>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Transactions  Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p></p>
                                                    <p>Transactions id <strong><?php echo $aduserlist->transactions_id; ?></strong></p>
                                                    <?php if ($aduserlist->refound_status == 1) { ?>
                                                        <p>Refund Transactions id <strong><?php echo $aduserlist->refund_transactions_id; ?></strong></p>
                                                    <?php } ?>

                                                    <p>Last 4 digits card <strong> <?php echo str_pad(substr($this->Custom->CardDetails($aduserlist->payment_card_details_id), -4), strlen($this->Custom->CardDetails($aduserlist->payment_card_details_id)), 'X', STR_PAD_LEFT) ?></strong></p>
                                                    <p>Email:- <strong><?php echo $this->Custom->customerEmail($aduserlist->user_id) ?></strong></p>
                                                    <p>Name:- <strong><?php echo $this->Custom->customerName($aduserlist->user_id) ?>
                                                            <?php if ($aduserlist->profile_type == 3) { ?>
                                                                Kid's (<?php echo $this->Custom->kidName($aduserlist->kid_id); ?>)
                                                            <?php } ?></strong></p>
                                                    <p>Payment date:-<strong><?php echo $aduserlist->created_dt; ?></strong></p>
                                                    <p>Amount:- <input type="text" name="amount" value="<?php
                                                        $tax = !empty($aduserlist->payment) ? $aduserlist->payment->sales_tax : 0;
                                                        echo $aduserlist->price + $tax;
                                                        ?>" /></p>
                                                    <p>Message-<strong><?php echo $aduserlist->refund_msg; ?></strong> </p>
                                                    <?php if ($aduserlist->refound_status != 1) { ?>
                                                        <p><textarea style='width: 650px; height: 114px;' name="refund_msg" required=""></textarea></p>
                                                    <?php } ?>


                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                    <?php if ($aduserlist->refound_status != 1) { ?>
                                                        <input type="hidden" name="cardId" value="<?php echo $aduserlist->payment_card_details_id ?>"/>
                                                        <input type="hidden" name="paymentId" value="<?php echo $aduserlist->id; ?>"/>
                                                        <button type="submit" class="btn btn-primary">Refund</button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?= $this->Form->end() ?>
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->









                                    <?php
                                }
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                        <?php
                        echo $this->Paginator->counter('Page {{page}} of {{pages}}, Showing {{current}} records out of {{count}} total');
//                        echo $this->Paginator->counter(
//    'Page {{page}} of {{pages}}, showing {{current}} records out of
//     {{count}} total, starting on record {{start}}, ending on {{end}}'
//);
                        echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;display: inline-block;width: 100%;float: left;'>";
                        echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                        echo $this->Paginator->numbers(array('first' => 3, 'last' => 3, 'separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                        echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                        echo "</div></ul>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .dataTables_wrapper.form-inline.dt-bootstrap.no-footer {
        height: 100% !important;
        overflow: none !important;
    }
    #example1_paginate{
        display:none;
    }
    .ellipsis {
        float: left;
    }
</style>


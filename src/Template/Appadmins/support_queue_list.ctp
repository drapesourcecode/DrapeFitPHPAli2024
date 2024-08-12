<style>
    .btn.btn-info.hint--top.hint .fa.fa-fw.fa-user-plus {
        width: 3.286em !important;
    }

    .hide {
        display: none;
    }

    .active {
        display: block;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('Support Queue List') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/supportQueueList' ?>"> Support Queue</a></li>
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
                        <table id="exampleXX" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td colspan="10">
                                        <div class="col-sm-6">
                                            <?= $this->Form->create('addproduct', array('id' => 'idForm')); ?>
                                            <div class="form-group">
                                                <label for="exampleInputName"> Scan Profile <span style="color: red;">*</span></label>
                                                <input style="height: 35px; width: 300px;font-weight: bold;" id="documentID" type="text" name="productValue" autocomplete="off" onmouseover="this.focus();">
                                            </div>
                                            <?= $this->Form->end() ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                            <div class="form-group">
                                                <select class="form-control" name="search_for" required>
                                                    <option value="" selected disabled>Select field</option>
                                                    <option value="email" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "email")) ? "selected" : ""; ?>>User email</option>
                                                    <option value="user_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_name")) ? "selected" : ""; ?>>User first name</option>
                                                    <option value="user_last_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_last_name")) ? "selected" : ""; ?>>User last name</option>
                                                    <!--<option value="kid_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "kid_name")) ? "selected" : ""; ?> >Kid name</option>-->
                                                    <option value="order_number" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_number")) ? "selected" : ""; ?>>Order number</option>
                                                    <option value="order_date" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_date")) ? "selected" : ""; ?>>Order date</option>
                                                </select>
                                                <input style="height: 35px; width: 250px;font-weight: bold;" type="text" name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required>
                                                <button type="submit" class="btn btn-sm btn-info">Search</button>
                                                <a href="<?= HTTP_ROOT; ?>appadmins/supportQueueList" class="btn btn-sm btn-primary">See All</a>
                                            </div>
                                            <?= $this->Form->end() ?>
                                            <?= $this->Form->create('', array('id' => 'date_search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                            <div class="form-group">
                                                <label for="selected_date">Select Date</label>
                                                <input type="hidden" id="search_for" name="search_for" class="form-control" value="selected_date" required>
                                                <input style="height: 35px; width: 250px;font-weight: bold;" type="date" name="selected_date" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['selected_date'])) ? $_GET['selected_date'] : ""; ?>" required>

                                                <button type="submit" class="btn btn-sm btn-info">Search</button>

                                            </div>
                                            <?= $this->Form->end() ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="display:none;">#</th>

                                    <?php if (!in_array($type, [3, 7, 8, 9])) { ?>



                                        <th style="width:50px;">Full Name</th>
                                        <th>Rq Date</th>
                                        <th>Gender</th>
                                        <th>Fit number</th>
                                        <th>Order date</th>
                                        <th>Order<br>number</th>
                                        <th>Previous</th>
                                        <th>Assign Employee</th>

                                        <th>Customer Action</th>
                                        <th>Kid Name </th>
                                        <th>Assign Employee (Kid)</th>

                                        <th>Kids Action </th>
                                        <th>Delete </th>
                                    <?php } else { ?>

                                        <th>First Name </th>
                                        <th>Last Name</th>
                                        <th>Rq Date</th>

                                        <th>Gender</th>
                                        <th>Fit number</th>
                                        <th>Order date</th>
                                        <th>Order<br>number</th>
                                        <th>Previous</th>
                                        <th>Customer Action</th>
                                        <th>Kid Name </th>
                                        <th>Kids Action </th>

                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($new_userdetails as $li_key => $pages) :
                                    // pj($pages);
                                ?>
                                    <?php
                                    //echo $pages->user_id;
                                    //echo $pages->kid_id;
                                    $emailpstatus = $this->Custom->emailperference($pages->user_id, $pages->kid_id);
                                    ?>

                                    <tr>
                                        <td style="display:none;"><?= $li_key/* h($pages->created_dt) */ ?></td>
                                        <?php if (!in_array($type, [3, 7, 8, 9])) { ?>



                                            <td style="width:50px;"><?= h(@$pages->user->user_detail->first_name) ?><br><?= h(@$pages->user->user_detail->last_name) ?>&nbsp; <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                            <td><?php echo $this->Custom->requestDate($pages->delivery_id) ?></td>
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
                                            <td><?php echo ' #DFPYMID' . $pages->id; ?> </td>
                                            <td>
                                                <div>
                                                    Stylist: <?php echo $this->Custom->previousStyleistName(@$pages->user_id, @$pages->id, @$pages->count); ?> </div>
                                                <div>
                                                    Inventory: <?php echo $this->Custom->previousInvName(@$pages->user_id, @$pages->id, @$pages->count); ?> </div>
                                                <div>
                                                    Qa: <?php echo $this->Custom->previousQaName(@$pages->user_id, @$pages->id, @$pages->count); ?> </div>
                                                <div>
                                                    Support: <?php echo $this->Custom->previousSupportName(@$pages->user_id, @$pages->id, @$pages->count); ?> </div>
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <div class="flex-box">
                                                        <label class="<?= ($pages->profile_type == 3) ? 'hide' : ''; ?>">Stylist</label>
                                                        <select data-hint="Assign Stylist" class="form-control <?php
                                                                                                                if ($pages->profile_type == 3) {
                                                                                                                    echo 'hide';
                                                                                                                }
                                                                                                                ?>" onchange="getUpdate(<?php echo @$pages->id; ?>, 'employee', 'stylist')" id="employee-<?php echo $pages->id; ?>" style="width: 80px;">
                                                            <option value="">--Assign Stylist--</option>
                                                            <?php foreach ($employee as $emp) : ?>
                                                                <option <?php if ($pages->emp_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo $emp->name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="flex-box flex-box2">
                                                        <label class="<?= ($pages->profile_type == 3) ? 'hide' : ''; ?>">Inventory</label>
                                                        <select data-hint="Assign Inventory" class="form-control <?php
                                                                                                                    if ($pages->profile_type == 3) {
                                                                                                                        echo 'hide';
                                                                                                                    }
                                                                                                                    ?>" onchange="getUpdate(<?php echo @$pages->id; ?>, 'employee_env', 'inventory')" id="employee_env-<?php echo $pages->id; ?>" style="width: 80px;">
                                                            <option value="">--Assign Inventory--</option>
                                                            <?php foreach ($employee_env as $emp) : ?>
                                                                <option <?php if ($pages->inv_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo $emp->name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="flex-box flex-box3">
                                                        <label class="<?= ($pages->profile_type == 3) ? 'hide' : ''; ?>">QA</label>
                                                        <select data-hint="Assign QA" class="form-control <?php
                                                                                                            if ($pages->profile_type == 3) {
                                                                                                                echo 'hide';
                                                                                                            }
                                                                                                            ?>" onchange="getUpdate(<?php echo @$pages->id; ?>, 'employee_qa', 'qa')" id="employee_qa-<?php echo $pages->id; ?>" style="width: 80px;">
                                                            <option value="">--Assign QA--</option>
                                                            <?php foreach ($employee_qa as $emp) : ?>
                                                                <option <?php if ($pages->qa_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo $emp->name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="flex-box flex-box4">
                                                        <label class="<?= ($pages->profile_type == 3) ? 'hide' : ''; ?>">Support</label>
                                                        <select data-hint="Assign Support" class="form-control <?php
                                                                                                                if ($pages->profile_type == 3) {
                                                                                                                    echo 'hide';
                                                                                                                }
                                                                                                                ?>" onchange="getUpdate(<?php echo @$pages->id; ?>, 'employee_spt', 'support')" id="employee_spt-<?php echo $pages->id; ?>" style="width: 80px;">
                                                            <option value="">--Assign Support--</option>
                                                            <?php foreach ($employee_spt as $emp) : ?>
                                                                <option <?php if ($pages->support_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo $emp->name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                    </div>

                                                </div>
                                            </td>

                                            <td>
                                                <div class="btn-boxes">
                                                    <?php
                                                    if (@$pages->profile_type == 2) {
                                                    ?>
                                                        <!--<a class="btn btn-info" href="<?= HTTP_ROOT; ?>appadmins/view_user_extras/<?= $pages->user_id; ?>" target="_blank" title="User extra products">User Extra </a>-->
                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "title" => "view profile", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?= $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'addproduct', @$pages->id], ['escape' => false, "title" => "Product Listing", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                        <?php if (@$pages->done_status == 1) { ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'print_receipt', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Order Receipt']); ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Catalog', array('class' => 'fa P')), ['action' => 'add_catelog', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Stylist Suggestions']); ?>
                                                        <?php } else { ?>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Receipt</i></a>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Catalog</i></a>
                                                        <?php } ?>

                                                        <?php if (@$pages->mail_status == 1) { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Email to client']); ?>
                                                            <?php } else { ?>
                                                            <?=
                                                                $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Email to client']);
                                                            }
                                                            ?>
                                                        <?php } else { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none;"><i class="fa P">Email</i></a>
                                                            <?php } else { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Email to client']); ?>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <a href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$pages->id; ?>" data-placement="top" class="btn btn-info">Matching</a>
                                                        <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$pages->id; ?>" class="btn btn-info" title='Browse all products'> Browse All</a>
                                                        <!--                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/df_matching/' . @$pages->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i>DF Matching</a>-->
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/completeUserProfileSataus/<?= $pages->id; ?>" class="btn btn-info" onclick="return confirm('Before proceed confirm all products are checkout.');" title='Move to previous work list'>MPWL</a>
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/previous_order_list/<?= $pages->user_id; ?>" class="btn btn-info">Previous Order</a>
                                                        <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary">Comments</button>
                                                        <?php /*if ($type == 1) { ?>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToNotshipnow/<?= $pages->id; ?>" class="btn btn-info">Can't ship now</a>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToStylist/<?= $pages->id; ?>" class="btn btn-info">Assign to stylist</a>
                                                        <?php }*/ ?>
                                                    <?php
                                                    } elseif (@$pages->profile_type == 1) {
                                                    ?>
                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "title" => "View profile", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?= $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'addproduct', @$pages->id], ['escape' => false, "title" => "Product Listing", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>


                                                        <?php if (@$pages->done_status == 1) { ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'print_receipt', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Order Receipt']); ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Catalog', array('class' => 'fa P')), ['action' => 'add_catelog', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Stylist Suggestions']); ?>
                                                        <?php } else { ?>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Receipt</i></a>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Catalog</i></a>
                                                        <?php } ?>


                                                        <?php if (@$pages->mail_status == 1) { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "title" => "Email to client", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php } else { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "title" => "Email to client", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php } ?>
                                                        <?php } else { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['disabled', 'escape' => false, "data-placement" => "top", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;pointer-events: none;']); ?>
                                                            <?php } else { ?>
                                                            <?=
                                                                $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "title" => "Email to client", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']);
                                                            }
                                                            ?>


                                                        <?php } ?>
                                                        <a href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$pages->id; ?>" title="Matching all products" class="btn btn-info"><!--<i class="fa fa-magic" aria-hidden="true"></i>--> Matching</a>
                                                        <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$pages->id; ?>" title="Browse all products" class="btn btn-info"><!--<i class="fa fa-magic" aria-hidden="true"></i>--> Browse All</a>
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/completeUserProfileSataus/<?= $pages->id; ?>" class="btn btn-info" onclick="return confirm('Before proceed confirm all products are checkout.');" title="Move to previous work list">MPWL</a>
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/previous_order_list/<?= $pages->user_id; ?>" class="btn btn-info">Previous Order</a>
                                                        <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary">Comments</button>
                                                        <?php /*if ($type == 1) { ?>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToNotshipnow/<?= $pages->id; ?>" class="btn btn-info">Can't ship now</a>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToStylist/<?= $pages->id; ?>" class="btn btn-info">Assign to stylist</a>
                                                        <?php }*/ ?>

                                                        <!--                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/df_matching/' . @$pages->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i>DF Matching</a>-->
                                                    <?php
                                                    }
                                                    ?>

                                                </div>


                                            </td>

                                            <td> <?php
                                                    if ($pages->profile_type == 3) {
                                                        echo $this->Custom->kidName($pages->kid_id);
                                                    }
                                                    ?>
                                            </td>
                                            <td>

                                                <?php if (@$pages->kid_id) { ?>
                                                    <div class="form-group  <?php
                                                                            if ($pages->profile_type != 3) {
                                                                                echo 'hide';
                                                                            }
                                                                            ?>">
                                                        <input type="hidden" id="payment-<?php echo @$pages->user->kids_detail->id; ?>" value="<?php echo @$pages->id; ?>">
                                                        <div class="flex-box">
                                                            <label>Stylist</label>
                                                            <select data-hint="Assign Stylist" class="form-control" onchange="getUpdate1(<?php echo @$pages->id; ?>, 'employee_kid', 'stylist')" id="employee_kid-<?php echo @$pages->id; ?>" style="width: 80px;">
                                                                <option value="">--Assign Stylist--</option>
                                                                <?php foreach ($employee as $emp) : ?>
                                                                    <option <?php if (@$pages->emp_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo @$emp->name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="flex-box flex-box2">
                                                            <label>Inventory</label>
                                                            <select data-hint="Assign Inventory" class="form-control" onchange="getUpdate1(<?php echo @$pages->id; ?>, 'employee_kid_env', 'inventory')" id="employee_kid_env-<?php echo @$pages->id; ?>" style="width: 80px;">
                                                                <option value="">--Assign Inventory--</option>
                                                                <?php foreach ($employee_env as $emp) : ?>
                                                                    <option <?php if (@$pages->inv_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo @$emp->name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="flex-box flex-box3">
                                                            <label>QA</label>
                                                            <select data-hint="Assign QA" class="form-control" onchange="getUpdate1(<?php echo @$pages->id; ?>, 'employee_kid_qa', 'qa')" id="employee_kid_qa-<?php echo @$pages->id; ?>" style="width: 80px;">
                                                                <option value="">--Assign QA--</option>
                                                                <?php foreach ($employee_qa as $emp) : ?>
                                                                    <option <?php if (@$pages->qa_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo @$emp->name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="flex-box flex-box4">
                                                            <label>Support</label>
                                                            <select data-hint="Assign Support" class="form-control" onchange="getUpdate1(<?php echo @$pages->id; ?>, 'employee_kid_spt', 'support')" id="employee_kid_spt-<?php echo @$pages->id; ?>" style="width: 80px;">
                                                                <option value="">--Assign Support--</option>
                                                                <?php foreach ($employee_spt as $emp) : ?>
                                                                    <option <?php if (@$pages->support_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo @$emp->name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php }
                                                ?>
                                            </td>
                                            <td style="width: 92px;">
                                                <div class="btn-boxes">
                                                    <?php if (@$pages->user->kids_detail->id && @$pages->profile_type == 3) { ?>
                                                        <!--for admin-->



                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'kidProfile', $pages->id], ['escape' => false, "titlet" => "View Kid parent profile", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?= $this->Html->link($this->Html->tag('i', $this->Custom->massKidProductCount($pages->id), array('class' => 'fa fa-fw fa-user-plus')), ['action' => 'addkidProfile', $pages->id], ['escape' => false, "title" => "Kid product listing", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 0px!important;']); ?>
                                                        <?php if (@$pages->done_status == 1) { ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'receipt_kid_print', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Order Receipt']); ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Catalog', array('class' => 'fa P')), ['action' => 'add_kid_catelog', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Stylist Suggestions']); ?>
                                                        <?php } else { ?>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Receipt</i></a>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Catalog</i></a>
                                                        <?php } ?>


                                                        <?php if (@$pages->mail_status == 1) { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_kid_email', @$pages->id], ['escape' => false, "title" => "Email to client", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php } else { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_kid_email', @$pages->id], ['escape' => false, "title" => "Email to client", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php } ?>
                                                        <?php } else { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none;"><i class="fa P">Email</i></a>
                                                            <?php } else { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_kid_email', @$pages->id], ['escape' => false, "title" => "Emsil to client", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <a href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$pages->id; ?>" title="Matching all products" class="btn btn-info"><!-- <i class="fa fa-magic" aria-hidden="true"></i>--> Matching</a>
                                                        <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$pages->id; ?>" title="Browse all products" class="btn btn-info"><!-- <i class="fa fa-magic" aria-hidden="true"></i>--> Browse All</a>
                                                        <!--                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/df_matching/' . @$pages->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i>DF Matching</a>-->
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/completeUserProfileSataus/<?= $pages->id; ?>" class="btn btn-info" onclick="return confirm('Before proceed confirm all products are checkout.');" title="Move to previous work list">MPWL</a>
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/previous_order_list/<?= $pages->user_id; ?>/<?= $pages->kid_id; ?>/" class="btn btn-info">Previous Order</a>
                                                        <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary">Comments</button>
                                                        <?php /*if ($type == 1) { ?>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToNotshipnow/<?= $pages->id; ?>" class="btn btn-info">Can't ship now</a>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToStylist/<?= $pages->id; ?>" class="btn btn-info">Assign to stylist</a>
                                                        <?php }*/ ?>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php // if(@$pages->user->kids_detail->id){     
                                                ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteprofile', $pages->id], ['escape' => false, "title" => "Delete profile", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'confirm' => 'Are you sure you want to delete  ?']); ?>
                                                <?php // }     
                                                ?>
                                            </td>

                                        <?php } else { ?>
                                            <td><?= h($pages->user->user_detail->first_name) ?> </td>
                                            <td><?= h($pages->user->user_detail->last_name) ?> &nbsp; <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?> </td>

                                            <td><?php echo $this->Custom->requestDate($pages->delivery_id); ?></td>

                                            <td><?php
                                                if ($pages->profile_type == 1) {
                                                    echo "Men";
                                                } elseif ($pages->profile_type == 2) {
                                                    echo "Women";
                                                } elseif ($pages->profile_type == 3) {
                                                    echo "Kid";
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


                                            <td><?php echo $pages->created_dt; ?> </td>
                                            <td><?php echo ' #DFPYMID' . $pages->id; ?> </td>
                                            <td>
                                                <div>
                                                    Stylist: <?php echo $this->Custom->previousStyleistName(@$pages->user_id, @$pages->id, @$pages->count); ?> </div>
                                                <div>
                                                    Inventory: <?php echo $this->Custom->previousInvName(@$pages->user_id, @$pages->id, @$pages->count); ?> </div>
                                                <div>
                                                    Qa: <?php echo $this->Custom->previousQaName(@$pages->user_id, @$pages->id, @$pages->count); ?> </div>
                                                <div>
                                                    Support: <?php echo $this->Custom->previousSupportName(@$pages->user_id, @$pages->id, @$pages->count); ?> </div>
                                            </td>
                                            <td>
                                                <div class="btn-boxes">
                                                    <?php
                                                    if ($pages->profile_type == 2) {
                                                    ?>
                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View kid parent profile", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?= $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'addproduct', $pages->id], ['escape' => false, "data-placement" => "top", "title" => "Kid product listing", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                        <?php if (@$pages->done_status == 1) { ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'print_receipt', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Order Receipt']); ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Catalog', array('class' => 'fa P')), ['action' => 'add_catelog', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Stylist Suggestions']); ?>
                                                        <?php } else { ?>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Receipt</i></a>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Catalog</i></a>
                                                        <?php } ?>

                                                        <?php if (@$pages->mail_status == 1) { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php } else { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Email to client']); ?>
                                                            <?php } ?>
                                                        <?php } else { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['disabled', 'escape' => false, "data-placement" => "top", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;pointer-events: none;']); ?>
                                                            <?php } else { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;pointer-events: none', 'title' => 'Email to client']); ?>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <!--//men-->
                                                        <?php if ($type == 3) { ?>
                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$pages->id; ?>" style="padding:0 12px !important" titlt="Matching all products" class="btn btn-info"> Matching</a>
                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$pages->id; ?>" title="Browse all products" class="btn btn-info"> Browse All</a>

                                                            <!--<a href="<?= HTTP_ROOT; ?>appadmins/completeUserProfileSataus/<?= $pages->id; ?>" class="btn btn-info" onclick="return confirm('Before proceed confirm all products are checkout.');">MPWL</a>-->
                                                        <?php } ?>

                                                        <!--                                                 <a href="<?php echo HTTP_ROOT . 'appadmins/df_matching/' . @$pages->id; ?>" style="padding:0 12px !important" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> DF Matching</a>-->
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/previous_order_list/<?= $pages->user_id; ?>" class="btn btn-info">Previous Order</a>
                                                        <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary">Comments</button>
                                                        <?php /*if ($type == 1) { ?>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToNotshipnow/<?= $pages->id; ?>" class="btn btn-info">Can't ship now</a>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToStylist/<?= $pages->id; ?>" class="btn btn-info">Assign to stylist</a>
                                                        <?php }*/ ?>
                                                    <?php
                                                    } elseif ($pages->profile_type == 1) {
                                                    ?>
                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', $pages->id], ['escape' => false, "data-placement" => "top", "title" => "View kid profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?= $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'addproduct', $pages->id], ['escape' => false, "title" => "Kid Product list", 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                        <?php if (@$pages->done_status == 1) { ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'print_receipt', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Order Receipt']); ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Catalog', array('class' => 'fa P')), ['action' => 'add_catelog', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Stylist Suggestions']); ?>
                                                        <?php } else { ?>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Receipt</i></a>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Catalog</i></a>
                                                        <?php } ?>

                                                        <?php if (@$pages->mail_status == 1) { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php } else { ?>

                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                            <?=
                                                                $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['disabled', 'escape' => false, 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;pointer-events: none;']);
                                                            } else {
                                                            ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "title" => "Email to client", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <?php if ($type == 3) { ?>
                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$pages->id; ?>" style="padding:0 12px !important" title="Matching all products" class="btn btn-info">Matching</a>
                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$pages->id; ?>" title="Browse all products" class="btn btn-info">Browse All</a>
                                                            <!--                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/df_matching/' . @$pages->id; ?>" style="padding:0 12px !important" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> DF Matching</a>-->
                                                            <!--<a href="<?= HTTP_ROOT; ?>appadmins/completeUserProfileSataus/<?= $pages->id; ?>" class="btn btn-info" onclick="return confirm('Before proceed confirm all products are checkout.');">MPWL</a>-->

                                                        <?php } ?>
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/previous_order_list/<?= $pages->user_id; ?>" class="btn btn-info">Previous Order</a>
                                                        <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary">Comments</button>
                                                        <?php /*if ($type == 1) { ?>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToNotshipnow/<?= $pages->id; ?>" class="btn btn-info">Can't ship now</a>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToStylist/<?= $pages->id; ?>" class="btn btn-info">Assign to stylist</a>
                                                        <?php }*/ ?>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </td>

                                            <td> <?php
                                                    if ($pages->profile_type == 3) {
                                                        echo $this->Custom->kidName($pages->kid_id);
                                                    }
                                                    ?>
                                            </td>

                                            <td>
                                                <div class="btn-boxes">
                                                    <?php if ($pages->profile_type == 3) { ?>


                                                        <?php
                                                        //                                                echo @$userdetails->profile_type;
                                                        ?>



                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'kidProfile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Kid profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?= $this->Html->link($this->Html->tag('i', $this->Custom->massKidProductCount($pages->id), array('class' => 'fa fa-fw fa-user-plus')), ['action' => 'addkidProfile', $pages->id], ['escape' => false, "data-placement" => "top", "title" => "Kid product listing", 'class' => 'btn btn-info ', 'style' => 'padding: 0 12px!important;']); ?>

                                                        <?php if (@$pages->done_status == 1) { ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'receipt_kid_print', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Order Receipt']); ?>
                                                            <?= $this->Html->link($this->Html->tag('i', 'Catalog', array('class' => 'fa P')), ['action' => 'add_kid_catelog', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;', 'title' => 'Stylist Suggestions']); ?>
                                                        <?php } else { ?>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Receipt</i></a>
                                                            <a href="javascript:void(0)" disabled="disabled" data-placement="top" class="btn btn-info" style="padding: 0 12px!important;pointer-events: none"><i class="fa P">Catalog</i></a>
                                                        <?php } ?>

                                                        <?php if (@$pages->mail_status == 1) { ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_kid_email', @$pages->id], ['escape' => false, 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php } else { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_kid_email', @$pages->id], ['escape' => false, 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                            <?php
                                                            }
                                                        } else {
                                                            ?>

                                                            <?php if ($emailpstatus == "1") { ?>
                                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_kid_email', @$pages->id], ['disabled', 'escape' => false, 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;pointer-events: none']); ?>
                                                            <?php } else { ?>
                                                            <?=
                                                                $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_kid_email', @$pages->id], ['escape' => false, "title" => "Email to client", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']);
                                                            }
                                                            ?>
                                                        <?php } ?>
                                                        <?php if ($type == 3) { ?>
                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$pages->id; ?>" style="padding:0 12px !important" title="Matching all products" class="btn btn-info">Matching</a>
                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$pages->id; ?>" title="Browse all products" class="btn btn-info">Browse All</a>
                                                            <!--                                                     <a href="<?php echo HTTP_ROOT . 'appadmins/df_matching/' . @$pages->id; ?>" style="padding:0 12px !important" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> DF Matching</a>-->
                                                            <!--<a href="<?= HTTP_ROOT; ?>appadmins/completeUserProfileSataus/<?= $pages->id; ?>" class="btn btn-info" onclick="return confirm('Before proceed confirm all products are checkout.');">MPWL</a>-->

                                                        <?php } ?>
                                                        <a href="<?= HTTP_ROOT; ?>appadmins/previous_order_list/<?= $pages->user_id; ?>/<?= $pages->kid_id; ?>/" class="btn btn-info">Previous Order</a>
                                                        <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary">Comments</button>
                                                        <?php /*if ($type == 1) { ?>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToNotshipnow/<?= $pages->id; ?>" class="btn btn-info">Can't ship now</a>
                                                            <a href="<?= HTTP_ROOT; ?>appadmins/updateWorkFlowStatusToStylist/<?= $pages->id; ?>" class="btn btn-info">Assign to stylist</a>
                                                        <?php }*/ ?>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        <?php } ?>
                                    </tr>

                                <?php
                                    $i++;
                                endforeach;
                                ?>
                                <!---->
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
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<style>
    .ellipsis {
        float: left;
    }

    .modal-content {
        background-color: #fefefe !important;
        margin: 9% auto 7% auto;
        border: none;
        width: 85% !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function getUpdate(id, field, type) {
        var emp_id = $('#' + field + '-' + id).val();
        $.ajax({
            type: "POST",
            url: "employee_assigned", // PAGE WHERE WE WILL PASS THE DATA /
            data: {
                emp_id: emp_id,
                id: id,
                type: type
            }, // THE DATA WE WILL BE PASSING /
            success: function(result) {
                $('#formDiv').show().html('<div class="alert alert-success" id="s"  style="display: block; position: fixed; z-index: 1111; right: 0px; border-radius: 0px; top: 0px; border: none;">' + result + '</div>');
            }
        });
    }
    $('#formDiv').click(function() {
        $('#formDiv').hide();
    });

    function getUpdate1(id, field, type) {
        var emp_id = $('#' + field + '-' + id).val();
        var paymentId = $('#payment-' + id).val();

        $.ajax({
            type: "POST",
            url: "employee_assigned_kid", //PAGE WHERE WE WILL PASS THE DATA /
            data: {
                emp_id: emp_id,
                id: id,
                payment_id: paymentId,
                type: type
            }, // THE DATA WE WILL BE PASSING /
            success: function(result) { //GET THE TO BE RETURNED DATA /
                $('#formDiv').show().html('<div class="alert alert-success" id="s"  style="display: block; position: fixed; z-index: 1111; right: 0px; border-radius: 0px; top: 0px; border: none;">' + result + '</div>');
            }
        });
    }
</script>
<script>
    $("form#idForm").on("submit", function(event) {
        event.preventDefault();
        //console.log($(this).serialize());
        var id = $('#documentID').val();
        // var words = id.split('-');
        var loaderData = "<span><img src='<?php echo HTTP_ROOT . 'images/payment-loader.gif' ?>'/></span>";
        $('#formDiv').html(loaderData);
        if (id) {
            var url = "<?php echo HTTP_ROOT . "appadmins/view_users/" ?>" + id;
            window.open(url, '_self');
        }

    });

    function openCmt(payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getComment",
            data: {
                payment_id: payment_id
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_payment_id').val(payment_id);
                $('#comment_list').html(result);
            }
        });
        $('#comment_modal').modal('show');
    }

    function getAllCmt(payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getComment",
            data: {
                payment_id: payment_id
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_payment_id').val(payment_id);
                $('#comment_list').html(result);
            }
        });
    }

    function postCmt() {
        let cmt = $('#cmt_detail').val();
        let payment_id = $('#cmt_payment_id').val();
        let id = $('#id').val();
        let url = "<?= HTTP_ROOT; ?>appadmins/postComment";
        let data = {
            payment_id: payment_id,
            comment: cmt
        };

        if (id) {

            url += "/" + id;
            data['comment_id'] = id;
        }

        if (cmt.length < 3) {
            $('#cmt_detail').focus();
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'JSON',
                success: function(result) {
                    $('#cmt_payment_id').val('');
                    $('#cmt_detail').text('');
                    $('#cmt_detail').val('');
                    $('#cmt_detail').val('');
                    $('#id').val('');
                    getAllCmt(payment_id);

                }
            });
        }
    }


    function deleteComment(commentId) {

        if (confirm("Are you sure you want to delete this comment?")) {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>appadmins/deleteComment/" + commentId,
                dataType: 'JSON',
                success: function(result) {
                    if (result === 'success') {

                        getAllCmt($('#cmt_payment_id').val());
                    } else {

                        alert("Failed to delete comment.");
                    }
                }
            });
        }
    }

    function resetModalFields() {
        $('#cmt_payment_id').val('');
        $('#cmt_detail').val('');
        $('#id').val('');
    }

    function closeCmtModal() {
        $('#comment_modal').modal('hide');
        resetModalFields();
    }

    $('.modal-footer .btn-default').click(function() {
        closeCmtModal();
    });
</script>
<div id="comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <div class="cmt-frm">
                    <input type="hidden" id="cmt_payment_id" />
                    <input type="hidden" id="id" value="" />
                    <textarea class="form-control" rows="2" id="cmt_detail"></textarea>
                    <button type="button" class="btn btn-success" onclick="postCmt()">Submit</button>
                </div>
                <div id="comment_list"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
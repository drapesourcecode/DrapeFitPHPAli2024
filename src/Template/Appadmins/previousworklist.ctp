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
    .modal-content {
      background-color: #fefefe !important;
      margin: 9% auto 7% auto;
      border: none;
      width: 85% !important;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('Previous Work List') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Order listing</a></li>
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
                                        <div  class="col-sm-6">
                                            <?= $this->Form->create('addproduct', array('id' => 'idForm')); ?>
                                            <div class="form-group">
                                                <label for="exampleInputName"> Scan Profile <span style="color: red;">*</span></label>
                                                <input style="height: 35px; width: 300px;font-weight: bold;" id="documentID"  type="text"  name="productValue" autocomplete="off"  onmouseover="this.focus();">
                                            </div> 
                                            <?= $this->Form->end() ?>
                                        </div>
                                        
                                        <div  class="col-sm-6">
                                            <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                            <div class="form-group">
                                                <select class="form-control" name="search_for" required>
                                                    <option value="" selected disabled>Select field</option>
                                                    <option value="email" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "email")) ? "selected" : ""; ?> >User email</option>
                                                    <option value="user_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_name")) ? "selected" : ""; ?> >User first name</option>
                                                    <option value="user_last_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_last_name")) ? "selected" : ""; ?> >User last name</option>
                                                    <!--<option value="kid_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "kid_name")) ? "selected" : ""; ?> >Kid name</option>-->
                                                    <option value="order_number" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_number")) ? "selected" : ""; ?> >Order number</option>
                                                    <option value="order_date" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_date")) ? "selected" : ""; ?> >Order date</option>
                                                </select>
                                                <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                                                <button type="submit" class="btn btn-sm btn-info">Search</button>
                                                <a href="<?= HTTP_ROOT; ?>appadmins/previousworklist" class="btn btn-sm btn-primary">See All</a>
                                            </div>
                                            <?= $this->Form->end() ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="display: none"></th>
                                    
                                        <th>Order<br>Number</th> 
                                    <?php if ($type != 3) { ?>
                                        <th>Full Name</th>
                                        <th>Gender</th>         
                                        <th>Profile</th>         


                                        <th>Order date</th> 
                                        <th>Assign Customer stylist</th>
                                        <th>Customer Action</th>
                                        <th>Kid Name </th>
                                        <th>Assign Kid stylist</th>

                                        <th>Kids Action </th>
                                        <th>Delete </th>
                                    <?php } else { ?>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>         
                                        <th>Profile</th>         


                                        <th>Order date</th> 
                                        <th>Customer Action</th>
                                        <th>Kid Name </th>
                                        <th>Kids Action </th>

                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($new_userdetails as $pages):
//                                     pj($pages);
                                    ?>
                                    <?php $emailpstatus = $this->Custom->emailperference($pages->user_id, $pages->kid_id); ?>

                                    <tr>
                                        <td><?php echo ' #DFPYMID' . $pages->id; ?> </td>
                                        <?php if ($type != 3) { ?>
                                            <td style="display: none"><?= h($pages->created_dt) ?></td>
                                            <td><?= h(@$pages->user->user_detail->first_name) ?>&nbsp;<?= h(@$pages->user->user_detail->last_name) ?>&nbsp; <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
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

                                            <td> 
                                                <div class="form-group" <?= ($pages->profile_type == 3) ? 'style="display:none;"' : ''; ?>>
                                                    <div><?= !empty($pages->sty) ? '<b>Stylist : </b>' . $pages->sty->name : ""; ?></div>
                                                    <div><?= !empty($pages->inv) ? '<b>Inventory : </b>' . $pages->inv->name : ""; ?></div>
                                                    <div><?= !empty($pages->qa) ? '<b>QA : </b>' . $pages->qa->name : ""; ?></div>
                                                    <div><?= !empty($pages->sup) ? '<b>Support : </b>' . $pages->sup->name : ""; ?></div>
                                                </div> 
                                            </td> 

                                            <td>                                                                                     

                                                <?php
                                                if (@$pages->profile_type == 2) {
                                                    ?>
                                                    <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary"  style="padding: 0 12px !important;"  >Comments</button>
                                                    <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'printPreviousReceipt', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                                    ?>


                                                    <?php
                                                    if ($pages->profile_type != 3) {
                                                        echo $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                                    }
                                                    ?>
                                                    <?php if ($emailpstatus == "1") { ?>
                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php } else { ?>
                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php } ?>
                                                    <?php
                                                } elseif (@$pages->profile_type == 1) {
                                                    ?>
                                                    <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary"  style="padding: 0 12px !important;"  >Comments</button>
                                                    <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'printPreviousReceipt', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php echo $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?> 

                                                    <?php if ($emailpstatus == "1") { ?>
                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>                                                
                                                    <?php } else { ?>                                                
                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php
                                                    }
                                                }
                                                ?>







                                            </td>
                                            <td> <?php
                                        if ($pages->profile_type == 3) {
                                            echo $this->Custom->kidName($pages->kid_id);
                                        }
                                        ?>
                                            </td>


                                            <td> 

        <?php if (@$pages->user->kids_detail->id) { ?>
                                                    <div class="form-group  <?php
            if ($pages->profile_type != 3) {
                echo 'hide';
            }
            ?>">
                                                        <input type ="hidden" id="payment-<?php echo @$pages->user->kids_detail->id; ?>" value="<?php echo @$pages->id; ?>">
                                                        <div><?= !empty($pages->sty) ? '<b>Stylist : </b>' . $pages->sty->name : ""; ?></div>
                                                        <div><?= !empty($pages->inv) ? '<b>Inventory : </b>' . $pages->inv->name : ""; ?></div>
                                                        <div><?= !empty($pages->qa) ? '<b>QA : </b>' . $pages->qa->name : ""; ?></div>
                                                        <div><?= !empty($pages->sup) ? '<b>Support : </b>' . $pages->sup->name : ""; ?></div>
                                                    </div>
        <?php }
        ?>
                                            </td> 
                                            <td style="width: 90px;">
                                                <?php if (@$pages->user->kids_detail->id && @$pages->profile_type == 3) { ?>
                                                    <!--for admin-->      
                                                    <button type="button" onclick="openCmt(<?= $pages->id; ?>)" class="btn btn-primary"  style="padding: 0 12px !important;"  >Comments</button>


                                                    <?= $this->Html->link($this->Html->tag('i', 'Receipt', array('class' => 'fa P')), ['action' => 'kidPreviousReceiptPrint', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'kidProfile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Kid profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?> 
            <?php echo $this->Html->link($this->Html->tag('i', $mass_kid_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewkidproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php if ($emailpstatus == "1") { ?>
                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php } else { ?>

                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php }
                                                } ?>


                                            </td>
                                            <td> 
        <?php if ($type == 1) { ?>
            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteprofile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;', 'confirm' => 'Are you sure you want to delete  ?']); ?>
        <?php } ?>

                                            </td>


    <?php } else { ?>
                                            <!--//for employee-->
                                            <td style="display: none"><?= h($pages->created_dt) ?></td>
                                            <td><?= h($pages->user->user_detail->first_name) ?></td>
                                            <td><?= h($pages->user->user_detail->last_name) ?> <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                            <td><?php
                                    if (@$pages->profile_type == 1) {
                                        echo "Men";
                                    } elseif (@$pages->profile_type == 2) {
                                        echo "Women";
                                    } else if ($pages->profile_type == 3) {
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

                                            <td><?php echo $pages->created_dt; ?> </td>   
                                            <td>                                                                                     

        <?php
        if ($pages->profile_type == 2) {
            ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php
                                                    if ($pages->profile_type != 3) {

                                                        echo $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                                    }
                                                    ?> 


                                                    <?php
                                                } elseif ($pages->profile_type == 1) {
                                                    ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php echo $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php if ($emailpstatus == "1") { ?>
                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php } else { ?>

                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </td>
                                            <td> <?php
                                                if ($pages->profile_type == 3) {
                                                    echo $this->Custom->kidName($pages->kid_id);
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($pages->profile_type == 3) { ?>


                                                    <?php
//                                                echo $new_userdetails->profile_type; 
                                                    ?>



                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'kidProfile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Kid profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?> 
                                                    <?php echo $this->Html->link($this->Html->tag('i', $mass_kid_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewkidproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

            <?php if ($emailpstatus == "1") { ?>
                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'disabled' => 'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php } else { ?>

                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php }
                                                } ?>
                                            </td>
                                            <?php } ?>
                                    </tr>

                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                <!----> 
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
    .dataTables_wrapper.form-inline.dt-bootstrap.no-footer {
        height: 100% !important;
    }
</style>
<script type="text/javascript">

    function getUpdate(id) {
        var emp_id = $('#employee-' + id).val();


        $.ajax({
            type: "POST",
            url: "employee_assigned", /* PAGE WHERE WE WILL PASS THE DATA */
            data: {emp_id: emp_id, id: id}, /* THE DATA WE WILL BE PASSING */
            success: function (result) { /* GET THE TO BE RETURNED DATA */
                // if (result == '1') {
                //     $('#employee-' + id).attr('disabled', true); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
                // }
            }
        });

    }

    function getUpdate1(id) {
        var emp_id = $('#employee_kid-' + id).val();
        var paymentId = $('#payment-' + id).val();
        //alert(id);


        $.ajax({
            type: "POST",
            url: "employee_assigned_kid", /* PAGE WHERE WE WILL PASS THE DATA */
            data: {emp_id: emp_id, id: id, payment_id: paymentId}, /* THE DATA WE WILL BE PASSING */
            success: function (result) { /* GET THE TO BE RETURNED DATA */
                // if (result == '1') {
                //     $('#employee-' + id).attr('disabled', true); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
                // }
            }
        });

    }


</script>
<script>
    $("form#idForm").on("submit", function (event) {
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
    function openCmt(payment_id){
        $('#comment_list').html('');
        $.ajax({
               type: "POST",
               url: "<?=HTTP_ROOT;?>appadmins/getComment",             
               data: {payment_id: payment_id}, 
               dataType:'html',
               success: function (result) { 
                   $('#cmt_payment_id').val(payment_id);
                   $('#comment_list').html(result);
               }
        });
        $('#comment_modal').modal('show');
    }
    function getAllCmt(payment_id){
        $('#comment_list').html('');
        $.ajax({
               type: "POST",
               url: "<?=HTTP_ROOT;?>appadmins/getComment",             
               data: {payment_id: payment_id}, 
               dataType:'html',
               success: function (result) { 
                   $('#cmt_payment_id').val(payment_id);
                   $('#comment_list').html(result);
               }
        });
    }
   function postCmt() {
    let cmt = $('#cmt_detail').val();
    let payment_id = $('#cmt_payment_id').val();
    let id = $('#id').val(); 
    let url = "<?=HTTP_ROOT;?>appadmins/postComment";
    let data = { payment_id: payment_id, comment: cmt };
    
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
            dataType:'JSON',
            success: function (result) { 
                $('#cmt_payment_id').val('');
                $('#cmt_detail').text('');
                $('#cmt_detail').val('');
                $('#comment_list').html(result);
                getAllCmt(payment_id);
               
            }
        });
    }    
}

    function editComment(commentId) {
      console.log('commentId:',commentId);
    $.ajax({
        type: "POST",
        url: "<?=HTTP_ROOT;?>appadmins/editComment",
        data: {commentId: commentId},
         dataType:'JSON',
        success: function (result) {
            $('#id').val(commentId); 
            $('#cmt_payment_id').val(result.payment_id);
            $('#cmt_detail').val(result.comment); 
            $('#comment_modal').modal('show'); 
        }
    });
}
function deleteComment(commentId) {
    if (confirm("Are you sure you want to delete this comment?")) {
        $.ajax({
            type: "POST",
            url: "<?=HTTP_ROOT;?>appadmins/deleteComment/" + commentId, 
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
    
    
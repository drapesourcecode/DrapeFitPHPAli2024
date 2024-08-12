<style type="text/css">
    .isDisabled {
        color: currentColor;
        cursor: not-allowed;
        opacity: 0.5;
        text-decoration: none;
    }
</style>
<script>
    $(document).ready(function () {
        $('#datepicker').datepicker().on('changeDate', function (e) {
            $(this).focus();
        });
        $("#datepicker1").datepicker().on('changeDate', function (e) {
            $(this).focus();
        });
        $("#datepicker3").datepicker().on('changeDate', function (e) {
            $(this).focus();
        });
    });

</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if (@$kidDetail->user->id) { ?>
                <?php echo @$kidDetail->user->name; ?>'s Kid Profile
            <?php } else { ?>
                User hasnot added kid profile
            <?php } ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Back</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 add-tab-section">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li  class="active">
                            <a href="#<?php echo $kidDetail->id; ?>" data-toggle="tab" style="border-bottom: 1px solid #bbb;"><?php echo $kidDetail->kids_first_name; ?></a>
                        </li>

                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane  active">
                            <!-- Post -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">

                                        <h3 class="box-title">
                                            <?php
                                            if (@$productId) {
                                                echo "Edit Product";

                                                echo $this->Html->link($this->Html->tag('', 'Add Kid New Product', array('class' => 'fa fa-plus')), ['action' => 'addkid_profile', @$paymentId, $kidDetail->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Add product", 'class' => 'btn btn-info  hint--top  hint add-button', 'style' => 'padding: 0 7px!important;']);
                                            } else {
                                                echo "Add Product";
                                            }
                                            ?>
                                        </h3>

                                        <!-- /.box-header -->
                                        <section class="content">
                                            <div class="row">
                                                <!-- left column -->
                                                <div class="col-xs-12">
                                                    <div class="box box-primary">
                                                        <?= $this->Form->create('addproduct', array('data-toggle' => "validator", 'type' => 'file', 'id' => 'frm')); ?>
                                                        <?php
                                                        if (@$_REQUEST['exchange']) {
                                                            @$exchange = $_REQUEST['exchange']
                                                            ?>
                                                            <?= $this->Form->input('dataexchange', ['type' => 'hidden', 'id' => 'dataexchange', 'required' => "required", 'value' => @$exchange,]); ?> 
                                                        <?php }
                                                        ?>
                                                        <div class="box-body">
                                                            <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                                                            <div class="col-md-6" style="margin-top: 27px;">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName">Product Name1 <span style="color: red;">*</span></label>
                                                                    <?= $this->Form->input('product_name_one', ['placeholder' => "Enter Product1", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->product_name_one, 'data-error' => 'Enter product1']); ?>
                                                                    <?= $this->Form->input('payment_id', ['required' => "required", 'value' => $paymentId, 'type' => 'hidden']); ?>
                                                                    <?= $this->Form->input('id', ['label' => false, 'value' => @$productId, 'type' => 'hidden']); ?>
                                                                    <?= $this->Form->input('user_id', ['label' => false, 'value' => @$userId, 'type' => 'hidden']); ?>

                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="exampleInputEmail">Product Name2 <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                                                                    <?= $this->Form->input('product_name_two', ['placeholder' => "Enter Product2", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$productData->product_name_two, 'required' => "required", 'data-error' => 'Enter product2']); ?>

                                                                    <div class="help-block with-errors"></div>
                                                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail">Size <span style="color: red;">*</span></label>

                                                                    <?= $this->Form->input('size', ['placeholder' => "Enter size", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->size, 'data-error' => 'Enter size']); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail">Color <span style="color: red;">*</span></label>

                                                                    <?= $this->Form->input('color', ['placeholder' => "Enter color", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->color, 'data-error' => 'Enter color']); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail">Purchase price <span style="color: red;">*</span></label>
                                                                    <?= $this->Form->input('purchase_price', ['placeholder' => "Enter purchase price", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->purchase_price, 'data-error' => 'Enter purchase price']); ?>
                                                                    <div class="help-block with-errors"></div>

                                                                </div>

                                                            </div>      
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName">Sell price <span style="color: red;">*</span></label>
                                                                    <?= $this->Form->input('sell_price', ['placeholder' => "Enter sell price", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->sell_price, 'data-error' => 'Enter sell price']); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <!--<div class="col-md-6">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="exampleInputName">Store name-->
                                                            <!--            <span style="color: red;">*</span>-->
                                                            <!--        </label>-->
                                                            <!--        <?= $this->Form->input('store_name', ['placeholder' => "Enter store name", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->store_name, 'data-error' => 'Enter store name']); ?>-->
                                                            <!--        <div class="help-block with-errors"></div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-md-6">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="exampleInputName">Store address-->
                                                            <!--            <span style="color: red;">*</span></label>-->
                                                            <!--        <?= $this->Form->input('store_address', ['placeholder' => "Enter store address", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->store_address, 'data-error' => 'Enter store address']); ?>-->
                                                            <!--        <div class="help-block with-errors"></div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-md-6">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="exampleInputName">Store phone-->
                                                            <!--            <span style="color: red;">*</span>-->
                                                            <!--        </label>-->
                                                            <!--        <?= $this->Form->input('store_ph', ['placeholder' => "Enter store phone", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->store_ph, 'data-error' => 'Enter store_phone']); ?>-->
                                                            <!--        <div class="help-block with-errors"></div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-md-6">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="exampleInputName">Store email-->
                                                            <!--            <span style="color: red;">*</span>-->
                                                            <!--        </label>-->
                                                            <!--        <?= $this->Form->input('store_email', ['placeholder' => "Enter store email", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productData->store_email, 'data-error' => 'Enter store_email']); ?>-->
                                                            <!--        <div class="help-block with-errors"></div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-md-6">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="exampleInputName">Store fax<span style="color: red;"></span></label>-->
                                                            <!--        <?= $this->Form->input('store_fax', ['placeholder' => "Enter store fax", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$productData->store_fax, 'data-error' => 'Enter store_fax']); ?>-->
                                                            <!--        <div class="help-block with-errors"></div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-md-6">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="exampleInputName">Product Purchase Date -->
                                                            <!--            <span style="color: red;">*</span></label>-->
                                                            <!--        <?= $this->Form->input('product_purchase_date', ['placeholder' => "Enter purchase date", 'id' => "datepicker", 'autocomplete' => 'off', 'type' => 'text', 'class' => "form-control ", 'label' => false, 'value' => @$productData->product_purchase_date, 'required' => "required", 'data-error' => 'Enter purchase_date']); ?>-->
                                                            <!--        <div class="help-block with-errors"></div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-md-6">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="exampleInputName">Product valid return date.-->
                                                            <!--            <span style="color: red;">*</span>-->
                                                            <!--        </label>-->
                                                            <!--        <?= $this->Form->input('product_valid_return_date', ['placeholder' => "Enter return date", 'id' => "datepicker1", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productData->product_valid_return_date, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter return_date']); ?>-->

                                                            <!--        <div class="help-block with-errors"></div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-md-6"><div class="form-group"><label for="exampleInputName">Return status</label>
                                                            <?= $this->Form->input('return_status', ['placeholder' => "Enter return status", 'type' => 'text', 'value' => @$productData->return_status, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'disabled' => 'disabled']); ?><div class="help-block with-errors"></div> </div></div>-->




                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName">Note</label>
                                                                    <?= $this->Form->input('note', ['placeholder' => "Enter note", 'type' => 'textarea', 'value' => @$productData->note, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on",]); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <?php if (@$productData->product_image) { ?>
                                                                    <label for="exampleInputFile">Product Image </label>
                                                                    <br>
                                                                    <div class="col-md-6">
                                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$productData->product_image; ?>" style="width: 300px; height: 150px"/>
                                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/kid_product_img_delete/' . @$productData->id; ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                                    </div>

                                                                    <?php
                                                                } else {

                                                                    if (@$productId) {
                                                                        $required = '';
                                                                    } else {
                                                                        $required = 'required';
                                                                    }
                                                                    ?>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">Image<span style="color: red;">*</span></label>
                                                                            <?= $this->Form->input('image', ['type' => 'file', 'id' => 'image', 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", $required]); ?>
                                                                            <div id="imagePreview"></div>
                                                                             <span style="color:red;">20 Kb ( PNG, JPG ,JPEG)</span>
                                                                             <div class="help-block with-errors"></div>

                                                                        </div>
                                                                    </div>

                                                                <?php } ?>
                                                            </div>
                                                            <?php if (@$productData->product_receipt) { ?>

                                                                <div class="col-md-6">
                                                                    <label for="exampleInputFile">Product receipt </label>
                                                                    <br>
                                                                    <img src="<?php echo HTTP_ROOT . PRODUCT_RECEIPT; ?><?php echo @$productData->product_receipt; ?>" style="width: 300px; height: 150px"/>
                                                                    <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/kid_product_recive_delete/' . @$productData->id; ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                                </div>
                                                            <?php } else { ?>

                                                                <div class="col-md-6">   
                                                                    <div class="form-group">
                                                                        <label for="exampleInputFile">Product receipt <span style="color: red;">optional</span></label>
                                                                        <?= $this->Form->input('product', ['type' => 'file', 'id' => 'product', 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>


                                                        </div>
                                                        <div class="box-footer">
                                                            <?php
                                                            if (@$productId) {
                                                                echo $this->Form->submit('Update', ['name' => 'update', 'type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                                                            } else {
                                                                echo $this->Form->submit('Add', ['name' => 'add', 'type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                                                            }
                                                            ?>
                                                        </div>
                                                        <?= $this->Form->end() ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>



                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </section><!-- /.content -->

                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12" style="padding-left: 0; padding-right: 0;">
                                        <div class="box">
                                            <div class="box-body">
                                                <div class="box-header">
                                                    <h3 class="box-title">Product Listing</h3>
                                                </div>
                                                <table  class="table table-bordered table-striped example">

                                                    <thead>
                                                        <tr>
                                                            <!--<th style="display:block;">P.purchase date</th>-->
                                                            <th>P. name</th>
                                                            <th>Customer decision</th>
                                                            <th>P.Image</th>
                                                            <th>P.barcodeImg</th>
                                                            <th>P.barcode.value</th>
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($kid_product as $list): ?>
                                                            <tr>
                                                                <!--<td style="display: block;"> <?php //echo $list->product_purchase_date; ?></td>-->
                                                                <td style="text-align:  left;"> <?php echo $list->product_name_one; ?></td>
                                                                <td style="text-align:  left;"> 



                                                                    <?php
                                                                    if ($list->checkedout == 'Y') {
                                                                        if ($list->keep_status == 3) {
                                                                            echo 'Keep';
                                                                        } elseif ($list->keep_status == 2) {
                                                                            if ($list->is_altnative_product == 1) {
                                                                                echo "Exchange Altnative product";
                                                                            } else {
                                                                                echo 'Exchange';
                                                                            }
                                                                        } elseif ($list->keep_status == 1) {


                                                                            echo 'Return';
                                                                            if ($list->store_return_status == 'Y') {
                                                                                echo "<span><i style='color:green'class='fa fa-check'></i></span>";
                                                                            }
                                                                        } elseif ($list->keep_status == 0) {
                                                                            echo 'Pending';
                                                                        }
                                                                    } else {
                                                                        echo 'Pending';
                                                                    }
                                                                    ?></td>
                                                                <td style="text-align:  left;"> <img  width="80" src="<?php echo HTTP_ROOT . PRODUCT_IMAGES . $list->product_image; ?>"/></td>
                                                                <td style="text-align:  left;"> <img width="100" height="30"   src="<?php echo HTTP_ROOT . BARCODE . $list->barcode_image; ?>"/></td>
                                                                <td style="text-align:  left;"> <?php echo $list->barcode_value; ?></td>
                                                                <td style="text-align: center;">
                                                                    <?php if ($user_type == 1) { ?>
                                                                        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Edit product" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-pencil "></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil ')), ['action' => 'addkid_profile', $list->payment_id, $list->kid_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                                        <?php } ?>
                                                                        <?php if ($list->checkedout == "Y" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Print barcode" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-print ')), ['action' => 'barcode_prints', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Print barcode", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>  
                                                                        <?php } ?>
                                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'viewproduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?> 


                                                                        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Finalize" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 12px!important;"><i class="fa fa-plus"><?php echo @$list->checkedout; ?></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', @$list->checkedout, array('class' => 'fa fa-plus')), ['action' => 'finalizekid', $list->payment_id, $list->kid_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Finalize", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>  
                                                                        <?php } ?>


                                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'kid_product_delete', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete product", 'class' => 'btn btn-info  hint--top  hint', 'confirm' => 'Are you sure you want to delete  ?', 'style' => 'padding: 0 7px!important;']); ?>

                                                                    <?php } ?>


                                                                    <!--if employee login--> 

                                                                    <?php if ($user_type == 3) { ?>
                                                                        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Edit product" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-pencil "></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil ')), ['action' => 'addkid_profile', $list->payment_id, $list->kid_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                                        <?php } ?>
                                                                        <?php if ($list->checkedout == "Y" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Print barcode" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-print ')), ['action' => 'barcode_prints', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Print barcode", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>  
                                                                        <?php } ?>
                                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'viewproduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?> 


                                                                        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Finalize" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 12px!important;"><i class="fa fa-plus"><?php echo @$list->checkedout; ?></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', @$list->checkedout, array('class' => 'fa fa-plus')), ['action' => 'finalizekid', $list->payment_id, $list->kid_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Finalize", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>  
                                                                        <?php } ?>
                                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'kid_product_delete', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete product", 'class' => 'btn btn-info  hint--top  hint', 'confirm' => 'Are you sure you want to delete  ?', 'style' => 'padding: 0 7px!important;']); ?>


                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <?= $this->Form->create('', array('id' => 'finlizefrm', 'data-toggle' => "validator", 'type' => 'file')); ?>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail">Order usps tracking no<span style="color: red;">*</span></label>

                                                            <?= $this->Form->input('order_usps_tracking_no', ['placeholder' => "Enter Order usps tracking no", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$productTrackingNo->order_usps_tracking_no, 'required' => "required", 'data-error' => 'Enter Order usps tracking no']); ?>
                                                            <div class="help-block with-errors"></div>
                                                            <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail">Return usps tracking no<span style="color: red;">*</span></label>
                                                            <?= $this->Form->input('return_usps_tracking_no', ['placeholder' => "Enter Return usps tracking no", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter Return usps tracking no', 'value' => @$productTrackingNo->return_usps_tracking_no]); ?>
                                                            <div class="help-block with-errors"></div>
                                                            <?= $this->Form->input('payment_id', ['id' => 'payment_id', 'type' => "hidden", 'value' => @$paymentId]); ?>
                                                            <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?php echo $this->Form->submit('Save', ['class' => 'btn btn-primary', 'name' => 'save', 'type' => 'submit', 'style' => 'float:left;margin-left:15px;margin-top: 29px;}']); ?>
                                                    </div>
                                                    <?= $this->Form->end() ?>

                                                    <?php if (@$userDetails->mail_status == 1 ||$productTrackingNo->return_usps_tracking_no =='' ||$productTrackingNo->order_usps_tracking_no =='') { ?>
                                                        <a href="javascript:void(0)"  id="finalize" class="btn btn-info" style="padding: 3px 7px !important;margin: 39px 30px;" disabled="disabled"><i>Finalize</i></a>
                                                    <?php } else { ?>

                                                        <?= $this->Html->link($this->Html->tag('i', 'Finalize'), ['action' => 'kidallFinalize', @$paymentId], ['escape' => false, "data-placement" => "top", "target" => "_blank", "id" => "finalize", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 3px 7px !important;margin: 39px 30px;']); ?>
                                                    <?php } ?>

                                                </div>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </section>
                        </div><!-- /.tab-pane -->


                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
            </div>

            <!--for men-->
            <!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    function myFunction() {
        window.print();
    }
</script>

<script>
    $(function () {
        $(".example").DataTable();
    });
</script>
<?php
if (@$userDetails->mail_status == 1) {
    ?>
    <script>
        $("#finalize").attr("disabled", "disabled");
    </script>
<?php } ?>
<?php
if (@$productCheckOut >= 1) {
    ?>

    <script>
        $("#frm :input").attr("disabled", "disabled");

    </script>

<?php } ?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var sizeKB = input.files[0].size / 1000;
            //alert(sizeKB);
            if (parseFloat(sizeKB) <= 21) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = $('<img />', {
                        src: e.target.result,
                        alt: 'MyAlt',
                        width: '200'
                    });
                    $('#imagePreview').html(img);

                }
                reader.readAsDataURL(input.files[0]);
            } else {
                //alert("Image size");
                $("#image").val('');
                $('#imagePreview').html('');
            }
        }
    }

    $("#image").change(function () {
        readURL(this);

    });
</script>

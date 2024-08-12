<style type="text/css">
    .hide{
        display: none;
    }
    .active{
        display: block;
    }

</style>
<script>
    $(document).ready(function () {
        $('#customerId').html('<?php echo " For " . @$productEditDetails->user->name ?>');
<?php if ($productEditDetails->kid_id != '') { ?>
            $('#kid_id_name').html("<?php echo " kid's " . $this->Custom->kidName(@$productEditDetails->kid_id); ?>");
<?php } ?>
//        $('#datepicker2').datepicker();
        $('#datepicker3').datepicker();
        $("#datepicker1").datepicker();
        $("#datepicker4").datepicker();
        $("#datepicker5").datepicker();
        $("#datepicker9").datepicker();
        $("#datepicker7").datepicker();

    });
</script>
<div class="box box-primary">
    <?php 
// if (@$productCount == 1) { 
    $custmer_ddtls = $productEditDetails->user->email."-". $productEditDetails->user->name ;
    ?>

        <?= $this->Form->create('addproduct', array('url' => ['action' => 'scanProduct'], 'data-toggle' => "validator", 'id' => 'frm', 'style' => 'text-align:left;', 'type' => 'file')); ?>
        <div class="box-body">
            <?php if ($productEditDetails->keep_status == 3) { ?><p style="color: red;font-size: 12px;float: left;">This product is kept by customer [<?=$custmer_ddtls;?>] </p><?php } ?>
            <?php if ($productEditDetails->keep_status == 2) { ?><p style="color: red;font-size: 12px;float: left;">This product is exchanged by customer [<?=$custmer_ddtls;?>]</p><?php } ?>
            <?php if ($productEditDetails->keep_status == 1) { ?><p style="color: red;font-size: 12px;float: left;">This product is returned by customer [<?=$custmer_ddtls;?>] </p><?php } ?>
            
            <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>

            <div class="col-md-6" style="margin-top: 27px;">
                <div class="form-group">
                    <label for="exampleInputName">Product Name1 <span style="color: red;">*</span></label>
                    <?= $this->Form->input('product_name_one', ['id' => 'product_name_one', 'placeholder' => "Enter Product1", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$productEditDetails->product_name_one, 'data-error' => 'Enter product1', 'readonly' => 'true']); ?>

                    <?= $this->Form->input('id', ['label' => false, 'value' => @$productEditDetails->id, 'type' => 'hidden']); ?>

                    <div class="help-block with-errors"></div>
                </div>
            </div>

            


            <div class="col-md-6">
                <div class="form-group">

                    <label for="exampleInputEmail">Product Name2 <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                    <?= $this->Form->input('product_name_two', ['id' => 'product_name_two', 'placeholder' => "Enter Product2", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$productEditDetails->product_name_two, 'required' => "required", 'data-error' => 'Enter product2', 'readonly' => 'true']); ?>

                    <div class="help-block with-errors"></div>
                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail">Size <span style="color: red;">*</span></label>

                    <?= $this->Form->input('size', ['id' => 'size', 'placeholder' => "Enter size", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => str_replace('&nbsp;', ' ', @$productEditDetails->size), 'required' => "required", 'data-error' => 'Enter size', 'readonly' => 'true']); ?>
                    <div class="help-block with-errors"></div>
                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                </div>

            </div>
            
            
            
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail">Purchase price <span style="color: red;">*</span></label>
                    <?= $this->Form->input('purchase_price', ['id' => 'purchase_price', 'placeholder' => "Enter purchase price", 'type' => 'text', 'class' => "form-control", 'value' => @$productEditDetails->purchase_price, 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter purchase price', 'readonly' => 'true']); ?>
                    <div class="help-block with-errors"></div>

                </div>

            </div>      
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputName">Sell price <span style="color: red;">*</span></label>
                    <?= $this->Form->input('sell_price', ['id' => 'sell_price', 'placeholder' => "Enter sell price", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->sell_price, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter sell price', 'readonly' => 'true']); ?>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="margin-top: 20px;">

                    <label for="exampleInputEmail">Style no <span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                    <span><?php echo!empty($productEditDetails->in_rack) ? $productEditDetails->in_rack : ''; ?></span>

                    <span style="margin-left:100px;"></span>

                    <label for="exampleInputEmail">Color <span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                    <span><?php echo!empty($productEditDetails->color) ? $productEditDetails->color : ''; ?></span>


                </div>
            </div>
            
            <!--<div class="col-md-6">-->
            <!--    <div class="form-group">-->
            <!--        <label for="exampleInputName">Store name-->
            <!--            <span style="color: red;">*</span>-->
            <!--        </label>-->
            <!--        <?= $this->Form->input('store_name', ['id' => 'store_name', 'placeholder' => "Enter store name", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->store_name, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store name', 'readonly' => 'true']); ?>-->
            <!--        <div class="help-block with-errors"></div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-md-6">-->
            <!--    <div class="form-group">-->
            <!--        <label for="exampleInputName">Store address-->
            <!--            <span style="color: red;">*</span></label>-->
            <!--        <?= $this->Form->input('store_address', ['id' => 'store_address', 'placeholder' => "Enter store address", 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->store_address, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store address', 'readonly' => 'true']); ?>-->
            <!--        <div class="help-block with-errors"></div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-md-6">-->
            <!--    <div class="form-group">-->
            <!--        <label for="exampleInputName">Store phone-->
            <!--            <span style="color: red;">*</span>-->
            <!--        </label>-->
            <!--        <?= $this->Form->input('store_ph', ['id' => 'store_ph', 'placeholder' => "Enter store phone", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->store_ph, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_phone', 'readonly' => 'true']); ?>-->
            <!--        <div class="help-block with-errors"></div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-md-6">-->
            <!--    <div class="form-group">-->
            <!--        <label for="exampleInputName">Store email-->
            <!--            <span style="color: red;">*</span>-->
            <!--        </label>-->
            <!--        <?= $this->Form->input('store_email', ['id' => 'store_email', 'placeholder' => "Enter store email", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->store_email, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_email', 'readonly' => 'true']); ?>-->
            <!--        <div class="help-block with-errors"></div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-md-6">-->
            <!--    <div class="form-group">-->
            <!--        <label for="exampleInputName">Store fax</label>-->
            <!--        <?= $this->Form->input('store_fax', ['id' => 'store_fax', 'placeholder' => "Enter store fax", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->store_fax, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_fax', 'readonly' => 'true']); ?>-->
            <!--        <div class="help-block with-errors"></div>-->
            <!--    </div>-->
            <!--</div>-->





            <!--<div class="col-md-6">-->
            <!--    <div class="form-group">-->
            <!--        <label for="exampleInputName">Product valid return date.-->
            <!--            <span style="color: red;">*</span>-->
            <!--        </label>-->
            <!--        <?= $this->Form->input('product_valid_return_date', ['placeholder' => "Enter return date", 'id' => "datepicker7", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->product_valid_return_date, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter return_date',]); ?>-->
            <!--        <div class="help-block with-errors"></div>-->
            <!--    </div>-->
            <!--</div>           -->


            <?php if (@$productEditDetails->return_status == 'Y') { ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName">Order usps tracking no
                            <span style="color: red;">*</span>
                        </label>
                        <?= $this->Form->input('order_usps_tracking_no', ['id' => 'order_usps_tracking_no', 'placeholder' => "Enter order usps tracking no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->order_usps_tracking_no, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter order_usps_tracking_no', 'disabled' => 'disabled']); ?>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName">Order usps tracking no
                            <span style="color: red;">*</span>
                        </label>
                        <?= $this->Form->input('order_usps_tracking_no', ['id' => 'order_usps_tracking_no', 'placeholder' => "Enter order usps tracking no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->order_usps_tracking_no, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter order_usps_tracking_no',]); ?>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputName">Return usps tracking no
                        <span style="color: red;">*</span></label>
                    <?= $this->Form->input('return_usps_tracking_no', ['id' => 'return_usps_tracking_no', 'placeholder' => "Enter return usps tracking no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->return_usps_tracking_no, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter return_usps_tracking_no',]); ?>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <?php if (@$productEditDetails->return_status != 'Y') { ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName">Exchange status From Customer</label>

                        <select  data-hint="Exchange status From Customer" class="form-control"  id="exchange_status" name="exchange_status" style="width: 150px;">
                            <option value="">--Enter Store Return Status--</option>                 
                            <option  <?php if ((@$productEditDetails->exchange_status == 'Y') || @$productEditDetails->exchange_status == '') { ?> selected="selected" <?php } ?> value="Y">Y</option>
                            <option  <?php if (@$productEditDetails->exchange_status == 'N') { ?> selected="selected" <?php } ?>value="N">N</option>

                        </select>

                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <?php
            }
            ?>
            <!--            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Product Purchase Date 
                                    <span style="color: red;">*</span></label>
            <?= $this->Form->input('product_purchase_date', ['placeholder' => "Enter purchase date", 'id' => "datepicker3", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->product_purchase_date, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter purchase_date', 'readonly' => 'true']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>-->
            <div class="col-md-6 <?php
            if (@$productEditDetails->keep_status == 1) {
                echo 'hide';
            }
            ?>">
                <div class="form-group">
                    <label for="exampleInputName">Inventory Exchange Date </label>
                    <?= $this->Form->input('store_exchange_date', ['placeholder' => " ", 'type' => 'text', 'class' => "form-control", 'id' => "datepicker9", 'label' => false, 'value' => @$productEditDetails->store_exchange_date, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter Inventory exchange date', '' => '']); ?>

                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6  <?php
//            if (@$productEditDetails->exchange_status == 'Y') {
//                echo 'hide';
//            }
            ?>">
                <div class="form-group">
                    <label for="exampleInputName">Product Receive Date From Customer.
                        <span style="color: red;">*</span>
                    </label>
                    <?= $this->Form->input('customer_purchasedate', ['id' => "datepicker1", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->customer_purchasedate, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter return_date']); ?>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <?php if (@$productEditDetails->exchange_status != 'Y') { ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName">Return status From Customer</label>

                        <select  data-hint="Return status From Customer" class="form-control"  id="return_status" name="return_status" style="width: 150px;">
                            <option value="">--Enter Store Return Status--</option>                 
                            <option  <?php if (@$productEditDetails->return_status == 'Y') { ?> selected="selected" <?php } ?>value="Y">Y</option>
                            <option  <?php if (@$productEditDetails->return_status == 'N') { ?> selected="selected" <?php } ?>value="N">N</option>

                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <?php
            }
            ?>





            <div class="col-md-6 <?php
            if (@$productEditDetails->keep_status == 2) {
                echo 'hide';
            }
            ?>">
                <div class="form-group">
                    <label for="exampleInputName">Inventory Return Status </label>                    
                    <select  data-hint="Enter Inventory Return Status" class="form-control"  id="store_return_status" name="store_return_status" style="width: 150px;"  >

                        <option  <?php if (@$productEditDetails->store_return_status == 'Y') { ?> selected="selected" <?php } ?>value="Y">Y</option>
                        <option  <?php if (@$productEditDetails->store_return_status == 'N') { ?> selected="selected" <?php } ?>value="N">N</option>

                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6 <?php if (@$productEditDetails->keep_status == 2) { ?> hide <?php } ?>">
                <div class="form-group">
                    <label for="exampleInputName">Inventory Return date </label>
                    <input type="text" name="store_return_date" id="datepicker4" value="<?php echo @$productEditDetails->store_return_date ?>" class="form-control" data-error="Enter Inventory return date" >
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputName">Note</label>
                    <?= $this->Form->input('note', ['id' => 'note', 'placeholder' => "Enter note", 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'value' => @$productEditDetails->note, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter note',]); ?>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-6">
                <?php if (@$productEditDetails->product_image) { ?>
                    <div class="col-md-8">
                        <label for="exampleInputFile">Product image<span style="color: red;">*</span></label>
                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$productEditDetails->product_image; ?>" style="width: 300px; height: 150px"/>
                        <!--<p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimagedeletescan/' . @$productEditDetails->id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>-->
                    </div>

                <?php } else { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Image<span style="color: red;">*</span></label>
                            <?= $this->Form->input('image', ['type' => 'file', 'id' => 'image', 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Please Browse  image']); ?>
                            <div class="help-block with-errors"></div>

                        </div>
                    </div>

                <?php } ?>
            </div>
            <div class="col-md-6">
                <?php if (@$productEditDetails->product_receipt) { ?>
                    <div class="col-md-8">
                        <label for="exampleInputFile">Product receipt<span style="color: red;">*</span></label>
                        <img src="<?php echo HTTP_ROOT . PRODUCT_RECEIPT; ?><?php echo @$productEditDetails->product_receipt; ?>" style="width: 300px; height: 150px"/>
                    </div>
                <?php } else { ?>
                    <label for="exampleInputFile">Product receipt<span style="color: red;">*</span></label>
                    <?= $this->Form->input('product', ['type' => 'file', 'id' => 'product', 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Please Browse  image']); ?>
                <?php } ?>
            </div>
        </div>

        <div class="box-footer">
            <?php
//            echo $this->Form->button('Add', ['class' => 'btn btn-primary', 'name' => 'add', 'value' => 'add', 'style' => 'float:left;margin-left:15px;', 'id' => 'addbutton']);
            ?>

            <?php
            echo $this->Form->button('Update', ['class' => 'btn btn-primary', 'name' => 'update', 'value' => 'update1', 'style' => 'float:left;margin-left:15px;', 'id' => 'updatebutton']);
            ?>
            <?php if (@$productEditDetails->customer_purchasedate != 0000 - 00 - 00) { ?>


                <?php if (@$productEditDetails->kid_id != 0) { ?>

                    <a style="visibility:<?php if (!empty($productEditDetails->store_exchange_date)) { ?> visible <?php
                    } else {
                        echo 'hidden';
                    }
                    ?>" href="<?php echo HTTP_ROOT . 'appadmins/addkid_profile/' . @$productEditDetails->payment_id . '/' . @$productEditDetails->kid_id; ?>?exchange=<?php echo @$productEditDetails->id; ?>" class="btn btn-primary" id="addhref">Add Product</a>

                    <a style="visibility:<?php if (!empty($productEditDetails->store_exchange_date)) { ?> visible <?php
                    } else {
                        echo 'hidden';
                    }
                    ?>" href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$productEditDetails->payment_id . '/'; ?>?exchange=<?php echo @$productEditDetails->id; ?>" class="btn btn-primary" id="addhref">Matching Products</a>
                    
                    <a style="visibility:<?php if (!empty($productEditDetails->store_exchange_date)) { ?> visible <?php
                    } else {
                        echo 'hidden';
                    }
                    ?>"  href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$productEditDetails->payment_id; ?>?exchange=<?php echo @$productEditDetails->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a>

                <?php } else { ?>
                    <a style="visibility:<?php if (!empty($productEditDetails->store_exchange_date)) { ?> visible <?php
                    } else {
                        echo 'hidden';
                    }
                    ?>" href="<?php echo HTTP_ROOT . 'appadmins/addproduct/' . @$productEditDetails->payment_id ?>?exchange=<?php echo $productEditDetails->id; ?>" class="btn btn-primary" id="addhrefkid">Add Product</a> 

                    <a style="visibility:<?php if (!empty($productEditDetails->store_exchange_date)) { ?> visible <?php
                    } else {
                        echo 'hidden';
                    }
                    ?>" href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$productEditDetails->payment_id ?>?exchange=<?php echo $productEditDetails->id; ?>" class="btn btn-primary" id="addhrefkid">Matching Products</a> 
                    
                    <a style="visibility:<?php if (!empty($productEditDetails->store_exchange_date)) { ?> visible <?php
                    } else {
                        echo 'hidden';
                    }
                    ?>"  href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$productEditDetails->payment_id; ?>?exchange=<?php echo @$productEditDetails->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a>
                   <?php } ?>

            <?php } ?>
        </div>

        <?= $this->Form->end() ?>
    <?php /*} else { ?>
        <div class="box-footer">
            No found data yet our database!!
        </div>
    <?php }*/
    ?>
</div>

<script type="text/javascript">

<?php
if ($productEditDetails->keep_status == 1) {//for return
    if ((@$productEditDetails->customer_purchasedate != 0000 - 00 - 00) || $productEditDetails->customer_purchasedate != '') {
        ?>


            $("#store_return_status").prop("disabled", false);
            $("#return_status").prop("disabled", true);
            $("#datepicker1").prop("disabled", true);
            $("#product_name_one").prop("disabled", true);
            $("#product_name_two").prop("disabled", true);
            $("#size").prop("disabled", true);
            $("#sell_price").prop("disabled", true);
            $("#purchase_price").prop("disabled", true);
            $("#store_name").prop("disabled", true);
            $("#store_address").prop("disabled", true);
            $("#store_ph").prop("disabled", true);
            $("#store_email").prop("disabled", true);
            $("#store_fax").prop("disabled", true);
            $("#datepicker7").prop("disabled", true);
            $("#datepicker3").prop("disabled", true);
            $("#product").prop("disabled", true);
            $("#note").prop("disabled", false);
            $("#return_usps_tracking_no").prop("disabled", true);




        <?php if (!empty(@$productEditDetails->customer_purchasedate) && !empty($productEditDetails->store_return_date)) {
            ?>
                $("#updatebutton").prop("disabled", true);
                $("#store_return_status").prop("disabled", true);
                $("#return_status").prop("disabled", true);
                $("#datepicker1").prop("disabled", true);
                $("#product_name_one").prop("disabled", true);
                $("#product_name_two").prop("disabled", true);
                $("#size").prop("disabled", true);
                $("#sell_price").prop("disabled", true);
                $("#purchase_price").prop("disabled", true);
                $("#store_name").prop("disabled", true);
                $("#store_address").prop("disabled", true);
                $("#store_ph").prop("disabled", true);
                $("#store_email").prop("disabled", true);
                $("#store_fax").prop("disabled", true);
                $("#datepicker7").prop("disabled", true);
                $("#datepicker4").prop("disabled", true);
                $("#datepicker3").prop("disabled", true);
                $("#product").prop("disabled", true);
                $("#note").prop("disabled", true);
                $("#return_usps_tracking_no").prop("disabled", true);



        <?php } else {
            ?>
                $("#product_name_one").prop("disabled", true);
                $("#product_name_two").prop("disabled", true);
                $("#size").prop("disabled", true);
                $("#sell_price").prop("disabled", true);
                $("#purchase_price").prop("disabled", true);
                $("#store_name").prop("disabled", true);
                $("#store_address").prop("disabled", true);
                $("#store_ph").prop("disabled", true);
                $("#store_email").prop("disabled", true);
                $("#store_fax").prop("disabled", true);
                $("#order_usps_tracking_no").prop("disabled", true);
                $("#return_usps_tracking_no").prop("disabled", true);
                $("#product").prop("disabled", true);
                $("#return_usps_tracking_no").prop("disabled", true);
                $("#datepicker3").prop("disabled", true);
            <?php
        }
        ?>

    <?php } else {
        ?>
            $("#product_name_one").prop("disabled", true);
            $("#product_name_two").prop("disabled", true);
            $("#size").prop("disabled", true);
            $("#sell_price").prop("disabled", true);
            $("#purchase_price").prop("disabled", true);
            $("#store_name").prop("disabled", true);
            $("#store_address").prop("disabled", true);
            $("#store_ph").prop("disabled", true);
            $("#store_email").prop("disabled", true);
            $("#store_fax").prop("disabled", true);
            $("#order_usps_tracking_no").prop("disabled", true);
            $("#return_usps_tracking_no").prop("disabled", true);
            $("#datepicker7").prop("disabled", true);
            $("#datepicker3").prop("disabled", true);
            $("#product").prop("disabled", true);

    <?php }
    ?>
    <?php
}
if ($productEditDetails->keep_status == 2) {
    if (!empty($productEditDetails->customer_purchasedate)) {
        ?>
            $("#product_name_one").prop("disabled", true);
            $("#product_name_two").prop("disabled", true);
            $("#size").prop("disabled", true);
            $("#sell_price").prop("disabled", true);
            $("#purchase_price").prop("disabled", true);
            $("#store_name").prop("disabled", true);
            $("#store_address").prop("disabled", true);
            $("#store_ph").prop("disabled", true);
            $("#store_email").prop("disabled", true);
            $("#store_fax").prop("disabled", true);
            $("#datepicker1").prop("disabled", true);
            $("#datepicker7").prop("disabled", true);
            $("#product").prop("disabled", true);
            $("#order_usps_tracking_no").prop("disabled", true);
            $("#return_usps_tracking_no").prop("disabled", true);

        <?php
        if (!empty($productEditDetails->store_exchange_date) && !empty($productEditDetails->customer_purchasedate)) {
            ?>

                $("#product_name_one").prop("disabled", true);
                $("#product_name_two").prop("disabled", true);
                $("#size").prop("disabled", true);
                $("#sell_price").prop("disabled", true);
                $("#purchase_price").prop("disabled", true);
                $("#store_name").prop("disabled", true);
                $("#store_address").prop("disabled", true);
                $("#store_ph").prop("disabled", true);
                $("#store_email").prop("disabled", true);
                $("#store_fax").prop("disabled", true);
                $("#datepicker1").prop("disabled", true);
                $("#datepicker9").prop("disabled", true);
                $("#datepicker7").prop("disabled", true);
                $("#datepicker3").prop("disabled", true);
                $("#note").prop("disabled", true);
                $("#exchange_status").prop("disabled", true);
                $("#order_usps_tracking_no").prop("disabled", true);
                $("#return_usps_tracking_no").prop("disabled", true);
                $("#updatebutton").hide();
                $("#product").prop("disabled", true);
            <?php
        }
        ?>

    <?php } else {
        ?>

            $("#product_name_one").prop("disabled", true);
            $("#product_name_two").prop("disabled", true);

            $("#product").prop("disabled", true);
            $("#size").prop("disabled", true);
            $("#sell_price").prop("disabled", true);
            $("#purchase_price").prop("disabled", true);
            $("#store_name").prop("disabled", true);
            $("#store_address").prop("disabled", true);
            $("#store_ph").prop("disabled", true);
            $("#store_email").prop("disabled", true);
            $("#store_fax").prop("disabled", true);
            $("#datepicker3").prop("disabled", true);
            $("#datepicker7").prop("disabled", true);
            $("#order_usps_tracking_no").prop("disabled", true);
            $("#return_usps_tracking_no").prop("disabled", true);


            $('#exchange_status').prop("disabled", false);
            $('#order_usps_tracking_no').prop("disabled", true);
            $('#return_usps_tracking_no').prop("disabled", true);
            $('#note').prop("disabled", false);


        <?php
    }
}




if ($productEditDetails->keep_status == 3) {// for keeps products all input controller with button will disable
    ?>

        $('input[type="text"], textarea').attr("disabled", true);
        $('#updatebutton').hide();
        $('#addbutton').hide();

        $("#size").prop("disabled", true);
        $("#sell_price").prop("disabled", true);
        $("#purchase_price").prop("disabled", true);
        $("#store_name").prop("disabled", true);
        $("#store_address").prop("disabled", true);
        $("#store_ph").prop("disabled", true);
        $("#store_email").prop("disabled", true);
        $("#store_fax").prop("disabled", true);
        $("#datepicker3").prop("disabled", true);
        $("#datepicker7").prop("disabled", true);
        $("#order_usps_tracking_no").prop("disabled", true);
        $("#return_usps_tracking_no").prop("disabled", true);
        $('#exchange_status').prop("disabled", true);
        $('#return_status').prop("disabled", true);
        $('#store_return_status').prop("disabled", true);
        $("#updatebutton").hide();
        $("#product").prop("disabled", true);
        $("#documentID").prop("disabled", false);

    <?php
}
?>
</script>
<script type="text/javascript">
    $(document).on('click', "#updatebutton", function () {
        $('#frm').submit();
        return false;
    });


</script>

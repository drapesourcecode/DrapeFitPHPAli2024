<!--<script>
    $(function () {
        $("#datepicker").datepicker();
    });
</script>
<script>
    $(function () {
        $("#datepicker1").datepicker("setDate", "10/12/2012");
    });
</script>-->

<script>
    $(document).ready(function () {
        $('#datepicker').datepicker();
        $("#datepicker1").datepicker();
    });




</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Add Product  & product listing</h1>
        <ol class="breadcrumb">


        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div id="error_msg_date" class="help-block with-errors"></div>
                    <div id="manage_banner" class="box box-default"  style="">
                        <div class="box-header with-border1">
                            <h3 class="box-title">
                                <?php
                                echo "edit Product";
                                ?>
                            </h3>
                            <div class="box-tools pull-right">
                                <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <section class="content">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-xs-12">
                                    <div class="box box-primary">
                                        <?= $this->Form->create('addproduct', array('data-toggle' => "validator", 'type' => 'file')); ?>
                                        <div class="box-body">
                                            <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                                            <div class="col-md-6" style="margin-top: 27px;">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Product Name1 <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('product_name_one', ['placeholder' => "Enter Product1", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => $product->product_name_one, 'data-error' => 'Enter product1']); ?>
                                                  
                                                    <?= $this->Form->input('pid', ['label' => false, 'value' => $product->id, 'type' => 'hidden']); ?>
                                                    

                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label for="exampleInputEmail">Product Name2 <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                                                    <?= $this->Form->input('product_name_two', ['placeholder' => "Enter Product2", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' =>$product->product_name_two, 'required' => "required", 'data-error' => 'Enter product2']); ?>

                                                    <div class="help-block with-errors"></div>
                                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail">Size <span style="color: red;">*</span></label>

                                                    <?= $this->Form->input('size', ['placeholder' => "Enter size", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter size','value'=>$product->size]); ?>
                                                    <div class="help-block with-errors"></div>
                                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail">Purchase price <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('purchase_price', ['placeholder' => "Enter purchase price", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter purchase price','value'=>$product->purchase_price]); ?>
                                                    <div class="help-block with-errors"></div>

                                                </div>

                                            </div>      
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Sell price <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('sell_price', ['placeholder' => "Enter sell price", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->sell_price, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter sell price']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Store name
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                    <?= $this->Form->input('store_name', ['placeholder' => "Enter store name", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->store_name, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store name']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Store address
                                                        <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('store_address', ['placeholder' => "Enter store address", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->store_address, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store address']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Store phone
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                    <?= $this->Form->input('store_ph', ['placeholder' => "Enter store phone", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->store_ph, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_phone']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Store email
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                    <?= $this->Form->input('store_email', ['placeholder' => "Enter store email", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->store_email, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_email']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
<!--                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Store fax</label>
                                                    <?= $this->Form->input('store_fax', ['placeholder' => "Enter store fax", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->store_email, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_fax']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Product Purchase Date 
                                                        <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('purchase_date', ['placeholder' => "Enter purchase date", 'id' => "datepicker", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->product_purchase_date, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter purchase_date']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Product valid return date.
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                    <?= $this->Form->input('return_date', ['placeholder' => "Enter return date", 'id' => "datepicker1", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->product_valid_return_date, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter return_date']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Return status</label>
                                                    <?= $this->Form->input('return_status', ['placeholder' => "Enter return status", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->return_status, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter return_status']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Note</label>
                                                    <?= $this->Form->input('note', ['placeholder' => "Enter note", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' =>$product->note, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter note']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Exchange status</label>
                                                    <?= $this->Form->input('exchange_status', ['placeholder' => "Enter exchange status", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' =>$product->exchange_status, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter exchange_status']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Order usps tracking no
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                    <?= $this->Form->input('order_usps_tracking_no', ['placeholder' => "Enter order usps tracking no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => $product->order_usps_tracking_no, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter order_usps_tracking_no']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Return usps tracking no
                                                        <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('return_usps_tracking_no', ['placeholder' => "Enter return usps tracking no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' =>$product->return_usps_tracking_no , 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter return_usps_tracking_no']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Customer purchase date </label>
                                                    <?= $this->Form->input('customer_purchasedate', ['placeholder' => " ", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on",'data-error' => 'Enter exchange_status']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if (@$product->product_image) { ?>
                                                    <div class="col-md-8">
                                                        <label for="exampleInputFile">Product image<span style="color: red;">*</span></label>
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$product->product_image; ?>" style="width: 300px; height: 150px"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/kid_productimagedelete/' . @$product->id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>

                                                <?php } else { ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Image<span style="color: red;">*</span></label>
                                                            <?= $this->Form->input('image', ['type' => 'file', 'id' => 'image', 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Please Browse  image', 'onchange' => "return validateImgExt('image')"]); ?>
                                                            <div class="help-block with-errors"></div>
                                                            <p style="font-size: 12px;">Note: <span>For better resolution image size should be(1820x543px)</span>.</p>
                                                        </div>
                                                    </div>
                                                    
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if (@$product->product_receipt) { ?>
                                                    <div class="col-md-8">
                                                        <label for="exampleInputFile">Product image<span style="color: red;">*</span></label>
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_RECEIPT; ?><?php echo @$product->product_receipt; ?>" style="width: 300px; height: 150px"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/kid_productreceiptdelete/' . @$product->id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>

                                                <?php } else { ?>
                                                   <div class="col-md-6">   
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Product receipt <span style="color: red;">optional</span></label>
                                                        <?= $this->Form->input('product', ['type' => 'file', 'id' => 'product', 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Please Browse  image', 'onchange' => "return validateImgExt('image')"]); ?>
                                                        
                                                        <p style="font-size: 12px;">Note: <span>For better resolution image size should be(1820x543px)</span>.</p>
                                                    </div>
                                               
                                                

                                            </div>
                                               <?php } ?>
                                                

                                            </div>
                                            
                                        </div>
                                        <div class="box-footer">

                                            <?php
                                            echo $this->Form->button('Update', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                                            ?>
                                        </div>
                                        <?= $this->Form->end() ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--!-- /.box-body -->

                    </div>



                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

   
</div>

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
                                echo "Add Product";
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
                                                    <?= $this->Form->input('product_name_one', ['placeholder' => "Enter Product1", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => '', 'data-error' => 'Enter product1']); ?>
                                                    <?= $this->Form->input('payment_id', ['required' => "required", 'value' => $getKidDetail->payment_id, 'type' => 'hidden']); ?>
                                                    <?= $this->Form->input('kid_id', ['label' => false, 'value' => $getKidDetail->id, 'type' => 'hidden']); ?>
                                                    <?= $this->Form->input('user_id', ['label' => false, 'value' => $getKidDetail->user_id, 'type' => 'hidden']); ?>

                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label for="exampleInputEmail">Product Name2 <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                                                    <?= $this->Form->input('product_name_two', ['placeholder' => "Enter Product2", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => '', 'required' => "required", 'data-error' => 'Enter product2']); ?>

                                                    <div class="help-block with-errors"></div>
                                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail">Size <span style="color: red;">*</span></label>

                                                    <?= $this->Form->input('size', ['placeholder' => "Enter size", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter size']); ?>
                                                    <div class="help-block with-errors"></div>
                                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail">Purchase price <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('purchase_price', ['placeholder' => "Enter purchase price", 'type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter purchase price']); ?>
                                                    <div class="help-block with-errors"></div>

                                                </div>

                                            </div>      
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Sell price <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('sell_price', ['placeholder' => "Enter sell price", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter sell price']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="exampleInputName">Store name-->
                                            <!--            <span style="color: red;">*</span>-->
                                            <!--        </label>-->
                                            <!--        <?= $this->Form->input('store_name', ['placeholder' => "Enter store name", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store name']); ?>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="exampleInputName">Store address-->
                                            <!--            <span style="color: red;">*</span></label>-->
                                            <!--        <?= $this->Form->input('store_address', ['placeholder' => "Enter store address", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store address']); ?>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="exampleInputName">Store phone-->
                                            <!--            <span style="color: red;">*</span>-->
                                            <!--        </label>-->
                                            <!--        <?= $this->Form->input('store_ph', ['placeholder' => "Enter store phone", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_phone']); ?>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="exampleInputName">Store email-->
                                            <!--            <span style="color: red;">*</span>-->
                                            <!--        </label>-->
                                            <!--        <?= $this->Form->input('store_email', ['placeholder' => "Enter store email", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_email']); ?>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="exampleInputName">Store fax</label>-->
                                            <!--        <?= $this->Form->input('store_fax', ['placeholder' => "Enter store fax", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter store_fax']); ?>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="exampleInputName">Product Purchase Date -->
                                            <!--            <span style="color: red;">*</span></label>-->
                                            <!--        <?= $this->Form->input('purchase_date', ['placeholder' => "Enter purchase date", 'id' => "datepicker", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter purchase_date']); ?>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="exampleInputName">Product valid return date.-->
                                            <!--            <span style="color: red;">*</span>-->
                                            <!--        </label>-->
                                            <!--        <?= $this->Form->input('return_date', ['placeholder' => "Enter return date", 'id' => "datepicker1", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on",  'data-error' => 'Enter return_date']); ?>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Return status</label>
                                                    <?= $this->Form->input('return_status', ['placeholder' => "Enter return status", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter return_status']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Note</label>
                                                    <?= $this->Form->input('note', ['placeholder' => "Enter note", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter note']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Exchange status</label>
                                                    <?= $this->Form->input('exchange_status', ['placeholder' => "Enter exchange status", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter exchange_status']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Order usps tracking no
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                    <?= $this->Form->input('order_usps_tracking_no', ['placeholder' => "Enter order usps tracking no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter order_usps_tracking_no']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Return usps tracking no
                                                        <span style="color: red;">*</span></label>
                                                    <?= $this->Form->input('return_usps_tracking_no', ['placeholder' => "Enter return usps tracking no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter return_usps_tracking_no']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Customer purchase date </label>
                                                    <?= $this->Form->input('customer_purchasedate', ['placeholder' => " ", 'type' => 'text', 'class' => "form-control ", 'label' => false, 'value' => '', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter exchange_status']); ?>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if (@$editBanner->image) { ?>
                                                    <div class="col-md-8">
                                                        <img src="<?php echo HTTP_ROOT . FEATURE_IMAGES; ?><?php echo $editBanner->image; ?>" style="width: 300px; height: 150px"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/featured_banner_delete/' . $id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>

                                                <?php } else { ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Image<span style="color: red;">*</span></label>
                                                            <?= $this->Form->input('image', ['type' => 'file', 'id' => 'image', 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Please Browse  image', 'onchange' => "return validateImgExt('image')"]); ?>
                                                              <div id="imagePreview"></div>

                                                            <div class="help-block with-errors"></div>
                                                            <p style="font-size: 12px;">Note: <span>For better resolution image size should be(1820x543px)</span>.</p>
                                                        </div>
                                                    </div>
                                                    
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-6">   
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Product receipt <span style="color: red;">optional</span></label>
                                                        <?= $this->Form->input('product', ['type' => 'file', 'id' => 'product', 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Please Browse  image', 'onchange' => "return validateImgExt('image')"]); ?>
                                                        
                                                        <p style="font-size: 12px;">Note: <span>For better resolution image size should be(1820x543px)</span>.</p>
                                                    </div>
                                               
                                                

                                            </div>
                                            
                                        </div>
                                        <div class="box-footer">

                                            <?php
                                            echo $this->Form->button('Add', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
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

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header">
                            <h3 class="box-title">Product Listing</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th style="display:none;">created</th>
                                    <th>P. name</th>
                                    <th>Customer decision</th>
                                    <th>P.Image</th>
                                    <th>P.barcodeImg</th>
                                    <th>P.barcode.value</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productdetails as $list): ?>
                                    <tr>
                                          <td style="display: none;"> <?php echo $list->created; ?></td>
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
                                        <td style="text-align:  left;"> <img   width="100" height="20" src="<?php echo HTTP_ROOT . BARCODE . $list->barcode_image; ?>"/></td>
                                        <td style="text-align:  left;"> <?php echo $list->barcode_value; ?></td>
                                        <td style="text-align: center;">
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil')), ['action' => 'editProduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'viewproduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>                                            
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-print')), ['action' => 'review', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "print barcode", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteproduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "delete product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var sizeKB = input.files[0].size / 1000;
            //alert(sizeKB);
            if (parseFloat(sizeKB) <= 16) {
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
                //alert("hi");
                $("#image").val('');
                 $('#imagePreview').html('');
            }
        }
    }

    $("#image").change(function () {
        readURL(this);

    });
</script>
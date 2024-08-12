<style type="text/css">
    .tab-content.hide{
        display: none;
    }
    .tab-content.active{
        display: block;
    }

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/addproduct/' . $productData->payment_id; ?>"> Back</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="box-title">
                    <?php
                    if ($productData->kid_id) {
                        echo $productData->kids_detail->kids_first_name;
                    } else {
                        echo $productData->user->name;
                    }
                    echo " ";

                    echo "View Product";
                    ?>
                </h3>

                <!-- /.box-header -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-xs-12">
                            <div class="box box-primary">

                                <div class="box-body">

                                    <div class="col-md-6" style="margin-top: 27px;">
                                        <div class="form-group">
                                            <label for="exampleInputName">Product Name1 <span style="color: red;">*</span></label>

                                            <p><?php echo @$productData->product_name_one; ?></p>

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="exampleInputEmail">Product Name2 <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                            <p><?php echo @$productData->product_name_two; ?></p>
                                            <div class="help-block with-errors"></div>
                                            <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Size <span style="color: red;">*</span></label>
                                            <p><?php echo @$productData->size; ?></p>       </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Purchase price <span style="color: red;">*</span></label>

                                            <p><?php echo @$productData->purchase_price; ?></p>

                                        </div>

                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Style no</label>

                                            <p><?php echo !empty($productData->in_rack) ? $productData->in_rack : ''; ?></p>

                                        </div>

                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Color<span style="color: red;">*</span></label>

                                            <p><?php echo @$productData->color; ?></p>

                                        </div>

                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Sell price <span style="color: red;">*</span></label>

                                            <p><?php echo @$productData->sell_price; ?></p>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="exampleInputName">Store name-->
                                    <!--            <span style="color: red;">*</span>-->
                                    <!--        </label>-->

                                    <!--        <p><?php echo @$productData->store_name; ?></p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="exampleInputName">Store address-->
                                    <!--            <span style="color: red;">*</span></label>-->

                                    <!--        <p><?php echo @$productData->store_address; ?></p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="exampleInputName">Store phone-->
                                    <!--            <span style="color: red;">*</span>-->
                                    <!--        </label>-->

                                    <!--        <p><?php echo @$productData->store_ph; ?></p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="exampleInputName">Store email-->
                                    <!--            <span style="color: red;">*</span>-->
                                    <!--        </label>-->

                                    <!--        <p><?php echo @$productData->store_email; ?></p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="exampleInputName">Store fax<span style="color: red;">*</span></label>-->

                                    <!--        <p><?php echo @$productData->store_fax; ?></p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="exampleInputName">Product Purchase Date -->
                                    <!--            <span style="color: red;">*</span></label>-->

                                    <!--        <p><?php echo @$productData->product_purchase_date; ?></p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="exampleInputName">Product valid return date.-->
                                    <!--            <span style="color: red;">*</span>-->
                                    <!--        </label>-->

                                    <!--        <p><?php echo @$productData->product_valid_return_date; ?></p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Return status</label>

                                            <p><?php echo @$productData->return_status; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Note</label>

                                            <p><?php echo @$productData->note; ?></p>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Exchange status</label>

                                            <p><?php echo @$productData->exchange_status; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Order usps tracking no
                                                <span style="color: red;">*</span>
                                            </label>

                                            <p><?php echo @$productData->order_usps_tracking_no; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Return usps tracking no


                                                <p><?php echo @$productData->return_usps_tracking_no; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Customer purchase date </label>

                                            <p><?php echo @$productData->customer_purchasedate; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if (@$productData->product_image) { ?>
                                            <label for="exampleInputFile">Product Image </label>
                                            <br>
                                            <div class="col-md-6">
                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$productData->product_image; ?>" style="width: 300px; height: 150px"/>
                                            </div>

                                        <?php }
                                        ?>
                                    </div>
                                    <?php if (@$productData->product_receipt) { ?>

                                        <div class="col-md-6">
                                            <label for="exampleInputFile">Product receipt </label>
                                            <br>
                                            <img src="<?php echo HTTP_ROOT . PRODUCT_RECEIPT; ?><?php echo @$productData->product_receipt; ?>" style="width: 300px; height: 150px"/>

                                        </div>
                                    <?php } ?>


                                    <?php if (@$productData->barcode_image) { ?>

                                        <div class="col-md-12">
                                            <label for="exampleInputFile">Bar code  Image </label>
                                            <br>
                                            <img src="<?php echo HTTP_ROOT . BARCODE; ?><?php echo @$productData->barcode_image; ?>" />

                                        </div>
                                    <?php } ?>

                                    <div class="col-md-12">
                                        <label for="exampleInputFile">Bar Value </label>
                                        <br>

                                        <?php echo @$productData->barcode_value; ?>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </section>



            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    <!--customer review-->
    <section class="content tab-content">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="box-title">
                    <?php
                    echo " Customer Review about this Product";
                    ?>
                </h3>


                <section class="content">
                    <div class="row">

                        <div class="col-xs-12">
                            <div class="box box-primary">

                                <div class="col-sm-7 col-lg-7 col-md-7">
                                    <div class="select-boxes">                                   
                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                What did you think of the <?php echo $productData->product_name_one; ?>?                      
                                            </span> 
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs blue"><?php
                                                    if ($productData->keep_status == 1) {
                                                        echo 'return';
                                                    }

                                                    if ($productData->keep_status == 2) {
                                                        echo 'Exchange';
                                                    }

                                                    if ($productData->keep_status == 3) {
                                                        echo 'Keep';
                                                    }
                                                    ?> 
                                                </a> 

                                            </div>
                                        </div>
                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>How was the like?</h4>              
                                            </span> 
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs blue">
                                                    <?php
                                                    if ($productData->size_status == 1) {
                                                        echo 'Perfect';
                                                    }

                                                    if ($productData->size_status == 2) {
                                                        echo 'Just ok';
                                                    }

                                                    if ($productData->size_status == 3) {
                                                        echo 'Too big';
                                                    }

                                                    if ($productData->size_status == 4) {
                                                        echo 'Too small';
                                                    }
                                                    ?>
                                                </a> 

                                            </div>
                                        </div>
                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>How was the quality?</h4>               
                                            </span> 
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs blue">
                                                    <?php
                                                    if (@$productData->style_status == 1) {
                                                        echo 'Great';
                                                    }
                                                    ?>
                                                    <?php
                                                    if (@$productData->style_status == 2) {
                                                        echo 'Average';
                                                    }
                                                    ?>
                                                    <?php
                                                    if (@$productData->style_status == 3) {
                                                        echo 'Poor';
                                                    }
                                                    ?> 

                                                </a> 

                                            </div>
                                        </div>
                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>How was the price?</h4>                
                                            </span> 
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs blue">
                                                    <?php
                                                    if (@$productData->price_status == 1) {
                                                        echo 'Perfect';
                                                    }

                                                    if (@$productData->price_status == 2) {
                                                        echo 'Too High';
                                                    }

                                                    if (@$productData->price_status == 3) {
                                                        echo 'Just ok';
                                                    }
                                                    ?>
                                                </a> 

                                            </div>
                                        </div>

                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>How was the Style FIT</h4>            
                                            </span> 
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs blue">
                                                    <?php
                                                    if (@$productData->quality_status == 1) {
                                                        echo 'Perfect';
                                                    }
                                                    ?>
                                                    <?php
                                                    if (@$productData->quality_status == 2) {
                                                        echo 'Like It';
                                                    }
                                                    ?>
                                                    <?php
                                                    if (@$productData->quality_status == 3) {
                                                        echo 'Hate It';
                                                    }
                                                    ?>
                                                </a> 

                                            </div>
                                        </div>


                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>Product review</h4>            
                                            </span> 
                                            <div class="timeline-footer">
                                                <p class="border" style="border: 1px solid #ccc; padding: 5px;">
                                                    <?php echo @$productData->product_review; ?>
                                                </p> 

                                            </div>
                                        </div>


                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>How was the Entire FIT Box?</h4>               
                                            </span> 
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs blue">
                                                    <?php
                                                    echo $customer_review_Data->did_this_fix_personalized_to_you;
                                                    ?>
                                                </a> 

                                            </div>
                                        </div>
                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>You satisfied with this FIT</h4>           
                                            </span> 
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs blue">
                                                    <?php
                                                    echo $customer_review_Data->did_this_fix_match_your_style;
                                                    ?>
                                                </a> 

                                            </div>
                                        </div>
                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>How you personal stylist worked for you</h4>       
                                            </span> 
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs blue">
                                                    <?php
                                                    echo $customer_review_Data->are_you_satisfied_with_this_fix;
                                                    ?>
                                                </a> 

                                            </div>
                                        </div>
                                        <div class="post">      
                                            <span class="username" style="color: #337ab7;">
                                                <h4>Additional Comments</h4>    
                                            </span> 
                                            <div class="timeline-footer">
                                                <p class="border" style="border: 1px solid #ccc;padding: 5px;">
                                                    <?php
                                                    echo $customer_review_Data->comments;
                                                    ?>
                                                </p> 

                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </section>



            </div>
        </div> 
    </section>


</div><!-- /.content-wrapper -->



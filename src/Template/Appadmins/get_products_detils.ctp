<section class="schedule reservation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="checkout-pro">
                    <?php if ($productData->count() > 0) { ?>
                        <h1><?php echo $cname; ?> Please Complete Your Checkout</h1>
                        <?php echo $this->Form->create("customer_product_review", array('url' => ['action' => 'scanProductProcessing'], 'data-toggle' => "validator", 'id' => 'customer_product_review', 'type' => 'file')) ?>
                        <input type="hidden" name="productCount" value="<?php echo $productcount; ?>" />
                        <?php
                        $i = 1;
                        $x = 0;
                        //                    pj($productData);

                        foreach ($productData as $data) {
                            $in_pro_key = $data['inv_product_id'];
                        ?>
                            <div class="checkout-product-section" <?php echo ($data->is_complete_by_admin == 1) ? "style='display:none;opacity:0;'" : "" ?>>
                                <div class="checkout-product-section-left">
                                    <div class="select-boxes">

                                        <ul>
                                            <li <?php echo ($data->is_complete_by_admin == 1) ? "style='display:none;opacity:0;'" : "" ?>>
                                                <h4>What you would like to do with the product?</h4>
                                                <div class="switch-field">
                                                    <input type="hidden" name="productID<?php echo $i; ?>" value="<?php echo @$data->id; ?>" />

                                                    <input type="hidden" name="sellprice<?php echo $i; ?>" value="<?php echo @$data->sell_price; ?>" />
                                                    <input type="radio" id="switch_think_Often<?php echo $i; ?>" name="what_do_you_think_of_the_product<?php echo $i; ?>" <?php if ($data->keep_status == '3') { ?> checked <?php } ?> value="3" checked="checked" />
                                                    <label for="switch_think_Often<?php echo $i; ?>">Keep</label>
                                                    <input type="radio" id="switch_think_Sometimes<?php echo $i; ?>" name="what_do_you_think_of_the_product<?php echo $i; ?>" <?php if ($data->keep_status == '2') { ?> checked <?php } ?> value="2">
                                                    <label for="switch_think_Sometimes<?php echo $i; ?>">Exchange</label>
                                                    <input type="radio" id="switch_think_Rarely<?php echo $i; ?>" name="what_do_you_think_of_the_product<?php echo $i; ?>" <?php if ($data->keep_status == '1') { ?> checked <?php } ?> value="1" />
                                                    <label for="switch_think_Rarely<?php echo $i; ?>">Return</label>
                                                </div>
                                            </li>
                                            <?php echo ($data->is_complete_by_admin == 1) ? "<h4  style='color:green'><i style='color:green'class='fa fa-check'></i> Already Processed</h4>" : ""; ?>

                                            <li>
                                                <h4><?php echo $data['product_name_one']; ?></h4>
                                                <!--<h5><?php //echo $data['product_name_two']; 
                                                        ?></h5>-->

                                                <h6><strong>SIZE:</strong><span><?php echo $data['size']; ?></span></h6>
                                                <h6><strong>COLOR:</strong> <span><?php echo $data['color']; ?></span></h6>
                                                <h6><strong>Barcode:</strong> <span><?php echo $data['barcode_value']; ?></span></h6>
                                                <h6><strong>Style no:</strong> <span>
                                                        <?php
                                                        if (empty($in_pro_key)) {
                                                            echo $data['barcode_value'];
                                                        } else {
                                                            echo empty($this->Custom->Inproductnameone($in_pro_key)->style_number) ? $this->Custom->Inproductnameone($in_pro_key)->dtls : $this->Custom->Inproductnameone($in_pro_key)->style_number;
                                                        }
                                                        ?>
                                                    </span></h6>

                                                <h6><strong>Price:</strong><span>$ <?php echo number_format($data['sell_price'], 2); ?></span></h6>
                                            </li>
                                            <li><textarea id="comment<?php echo $i; ?>" name="comment<?php echo $i; ?>"><?= $data->comment; ?></textarea></li>
                                            <li> <input type="file" id="img<?php echo $i; ?>" name="img<?php echo $i; ?>" />
                                                <?php if (!empty($data->photos)) { ?> <img src="<?= HTTP_ROOT . $data->photos; ?>" width="100"><?php } ?>
                                            </li>

                                            <li><input type="checkbox" id="dry_clean<?php echo $i; ?>" name="dry_clean<?php echo $i; ?>" value="1" <?= ($data->is_dry_clean == 1) ? 'checked' : ''; ?>>Dry clean</li>


                                        </ul>


                                    </div>
                                </div>
                                <div class="checkout-product-section-right">
                                    <div class="checkout-product-img">

                                        <img src="<?php echo HTTP_ROOT; ?><?= strstr($data['product_image'], PRODUCT_IMAGES) ? $data['product_image'] : PRODUCT_IMAGES . $data['product_image']; ?>" alt="<?php echo $data['product_name_one']; ?>" width="200px;">


                                    </div>
                                </div>
                            </div>


                        <?php
                            $i++;
                            if ($data->is_complete_by_admin == 1) {
                            } else {
                                $x++;
                            }
                        }
                        ?>

                        <div class="checkout-product-section-last" <?= ($x == 0) ? "style='display:none;'" : ""; ?>>
                            <div class="select-boxes">
                                <div class="additional-box message-box">
                                    <input type="submit" class="btn btn-info" value="Complete Return" name="Review">
                                </div>
                            </div>

                        </div>
                    <?php } else { ?><h4>No data found !!</h4><?php } ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    #customer_product_review ul>li {

        width: 100%;
        list-style: none;
    }

    .checkout-product-section {
        float: left;
        width: 100%;
        margin-bottom: 20px;
    }

    .checkout-product-section-left {
        float: left;
    }
</style>
<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'manual'
        }).tooltip('show');
    });

    // $( window ).scroll(function() {   
    // if($( window ).scrollTop() > 10){  // scroll down abit and get the action   
    $(".progress-bar").each(function() {
        each_bar_width = $(this).attr('aria-valuenow');
        $(this).width(each_bar_width + '%');
    });

    //  }  
    // });
</script>
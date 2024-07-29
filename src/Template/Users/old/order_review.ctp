<style type="text/css">
    .reservation{ padding-top: 9%; text-align: center;}
    .reservation .checkout-pro{  border:none; text-align: left;width: 70% !important; }
    .checkout-pro h1{text-align:center !important;}
    .checkout-product-section { float: left; width: 100%; border-bottom: 1px solid #ccc; padding-bottom: 20px; margin-bottom: 20px;}
    .checkout-product-section-left{ float: left; width: 70%; }
    .checkout-product-section-right{float: right; width: 30%; text-align: center; }
    .checkout-product-section-left .select-boxes ul{ float: left; width: 100%; padding:0;margin: 0; }
    .checkout-product-section-left .select-boxes ul li{ display: inline-block; width: 100%; margin-bottom: 10px;}
    .checkout-product-section-right h4{font-family: "Amazon Ember", Arial, sans-serif; font-size: 17px;font-weight: bold;}
    .checkout-product-section-right h6{ font-family: "Amazon Ember", Arial, sans-serif; font-size: 15px;}
    .checkout-product-section-right h6 strong{ text-transform: uppercase;}
    .checkout-product-section-last{ float: left;width: 100%; }
    .checkout-product-section-last ul{ float: left;  width: 100%; list-style-type: none;padding: 0;margin: 0; }
    .checkout-product-section-last ul li{ display: inline-block; width: 100%;margin-bottom: 10px;}
    .additional-box{float: left; width: 100%;}
    .additional-box textarea{ width: 100%; height: 150px; padding: 15px;}
    .additional-box textarea:focus{ outline: none;}
    .customer-details ul li { float: none;display: inline-block; list-style-type: none;text-align: center;margin: 0 15px;}
    .customer-details ul li a{margin-right: 0;}
    .message-box input[type="submit"] { background: #d64ade;border: 1px solid ; color: #fff; text-transform: uppercase;font-weight: bold;padding: 12px 20px; }
    .message-box input[type="submit"]:hover{ background: #000000; color: #ffffff;}
    .reservation {
    padding-top: 130px !important;
}
    @media all and (max-width: 991px) {
.reservation .checkout-pro{
    width: 100% !important;
}
}
    @media all and (max-width: 767px) {
.reservation .checkout-pro {
    padding-top: 0 !important;
}
.reservation {
    padding-top: 152px !important;
}
}
@media all and (max-width: 480px) {
.reservation .checkout-pro {
    padding-top: 0;
}
}
</style>
<div class="style-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <?php
                echo $this->element('frontend/profile_menu_men');
                ?>
            </div>
        </div>
    </div>
</div>

<section class="schedule reservation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="checkout-pro">
                    <h1><?php echo $cname; ?> Please Complete Your Checkout</h1>
                    <?php echo $this->Form->create("customer_product_review", array('data-toggle' => "validator", 'id' => 'customer_product_review')) ?>
                    <?php
                    $i = 1;
                    $x = 0;
//                    pj($productData);
                    foreach ($productData as $data) {
                        ?>
                        <div class="checkout-product-section">
                            <div class="checkout-product-section-left">
                                <div class="select-boxes">

                                    <ul>
                                        <li>
                                            <h4>What you would like to do with the product?</h4>
                                            <div class="switch-field">
                                                <input type="hidden" name="productID<?php echo $i; ?>" value="<?php echo @$data->id; ?>"/>
                                                <input type="hidden" name="sellprice<?php echo $i; ?>" value="<?php echo @$data->sell_price; ?>"/>
                                                <input type="radio" id="switch_think_Often<?php echo $i; ?>" name="what_do_you_think_of_the_product<?php echo $i; ?>" <?php if ($data->keep_status == '3') { ?> checked <?php } ?> value="3" checked="checked"/>
                                                <label for="switch_think_Often<?php echo $i; ?>">Keep</label>
                                                <input type="radio" id="switch_think_Sometimes<?php echo $i; ?>" name="what_do_you_think_of_the_product<?php echo $i; ?>" <?php if ($data->keep_status == '2') { ?> checked <?php } ?>  value="2" >
                                                <label for="switch_think_Sometimes<?php echo $i; ?>">Exchange</label>
                                                <input type="radio" id="switch_think_Rarely<?php echo $i; ?>" name="what_do_you_think_of_the_product<?php echo $i; ?>" <?php if ($data->keep_status == '1') { ?> checked <?php } ?> value="1"/>
                                                <label for="switch_think_Rarely<?php echo $i; ?>">Return</label>
                                            </div>
                                        </li>
                                        <li>
                                            <h4>How was the like?</h4>

                                            <div class="switch-field">
                                                <input <?php if ($data->size_status == '1') { ?> checked <?php } ?> type="radio" id="switch_Size_Often<?php echo $i; ?>" name="size<?php echo $i; ?>" value="1" >
                                                <label for="switch_Size_Often<?php echo $i; ?>">Perfect</label>
                                                <input <?php if ($data->size_status == '2') { ?> checked <?php } ?> type="radio" id="switch_Size_Sometimes<?php echo $i; ?>" name="size<?php echo $i; ?>" value="2" >
                                                <label for="switch_Size_Sometimes<?php echo $i; ?>">Just ok</label>
                                                <input <?php if ($data->size_status == '3') { ?> checked <?php } ?> type="radio" id="switch_Size_Rarely<?php echo $i; ?>" name="size<?php echo $i; ?>" value="3" >
                                                <label for="switch_Size_Rarely<?php echo $i; ?>">Too big</label>
                                                <input <?php if ($data->size_status == '4') { ?> checked <?php } ?> type="radio" id="switch_Size_Rarelys<?php echo $i; ?>" name="size<?php echo $i; ?>" value="4" >
                                                <label for="switch_Size_Rarelys<?php echo $i; ?>">Too small</label>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <h4>How was the quality?</h4>
                                            <div class="switch-field">
                                                <input <?php if ($data->style_status == '1') { ?> checked <?php } ?> type="radio" id="switch_Style_Often<?php echo $i; ?>" name="style<?php echo $i; ?>" value="1" >
                                                <label for="switch_Style_Often<?php echo $i; ?>">Great</label>
                                                <input <?php if ($data->style_status == '2') { ?> checked <?php } ?> type="radio" id="switch_Style_Sometimes<?php echo $i; ?>" name="style<?php echo $i; ?>" value="2" >
                                                <label for="switch_Style_Sometimes<?php echo $i; ?>">Average</label>
                                                <input <?php if ($data->style_status == '3') { ?> checked <?php } ?> type="radio" id="switch_Style_Rarely<?php echo $i; ?>" name="style<?php echo $i; ?>" value="3" >
                                                <label for="switch_Style_Rarely<?php echo $i; ?>">Poor</label>
                                        </li>
                                        
                                        <li>
                                            <h4>How was the price?</h4>
                                            <div class="switch-field">
                                                <input type="radio" id="switch_Price_Often<?php echo $i; ?>" name="price<?php echo $i; ?>"  value="1" <?php if ($data->price_status == '1') { ?> checked <?php } ?> >
                                                <label for="switch_Price_Often<?php echo $i; ?>">Perfect</label>
                                                <input type="radio" id="switch_Price_Sometimes<?php echo $i; ?>" name="price<?php echo $i; ?>" value="2" <?php if ($data->price_status == '2') { ?> checked <?php } ?> >
                                                <label for="switch_Price_Sometimes<?php echo $i; ?>">Too High</label>
                                                <input type="radio" id="switch_Price_Rarely<?php echo $i; ?>" name="price<?php echo $i; ?>" value="3" <?php if ($data->price_status == '3') { ?> checked <?php } ?> >
                                                <label for="switch_Price_Rarely<?php echo $i; ?>">Just ok</label>
                                            </div> 
                                        </li>
                                        <li>
                                            <h4>How was the Style FIT</h4>


                                            <div class="switch-field">
                                                <input type="radio" id="switch_Quality_Often<?php echo $i; ?>" name="quality<?php echo $i; ?>" value="1" <?php if ($data->quality_status == '1') { ?> checked <?php } ?> >
                                                <label for="switch_Quality_Often<?php echo $i; ?>">Perfect</label>
                                                <input type="radio" id="switch_Quality_Sometimes<?php echo $i; ?>" name="quality<?php echo $i; ?>" <?php if ($data->quality_status == '2') { ?> checked <?php } ?> value="2" >
                                                <label for="switch_Quality_Sometimes<?php echo $i; ?>">Like It</label>
                                                <input type="radio" id="switch_Quality_Rarely<?php echo $i; ?>" name="quality<?php echo $i; ?>" <?php if ($data->quality_status == '3') { ?> checked <?php } ?> value="3">
                                                <label for="switch_Quality_Rarely<?php echo $i; ?>">Hate It</label>
                                            </div>
                                        </li>
                                         <li>
                                            <h4> Product Review</h4>


                                            <div class="switch-field">
                                                <textarea style='width: 100%;height: 150px;padding: 15px;' placeholder="message" name="ProductReview<?php echo $i; ?>"><?php echo @$data->product_review;?></textarea><br>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="checkout-product-section-right">
                                <div class="checkout-product-img">
                                    <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES ?><?php echo $data['product_image']; ?>" alt="<?php echo $data['product_name_one']; ?>" width="200px;">
                                    <h4><?php echo $data['product_name_one']; ?></h4>
                                    <h5><?php echo $data['product_name_two']; ?></h5>
                                  
                                    <h6><strong>SIZE:</strong><span><?php echo $data['size']; ?></span></h6>
                                    <h6><strong>COLOR:</strong> <span><?php echo $data['color']; ?></span></h6>

                                    <h6><strong>Price:</strong><span>$ <?php echo number_format($data['sell_price'], 2); ?></span></h6>

                                </div>
                            </div>
                        </div>


                        <?php
                        $i++;
                        $x++;
                    }
                    ?>

                    <div class="checkout-product-section-last">
                        <div class="select-boxes">
                            <ul>
                                <li>
                                    <h4>How was the Entire FIT Box?</h4>
                                    <div class="switch-field">
                                        <input type="hidden1" id="productCount" name="productCount" value="<?php echo $x; ?>" >
                                        <input type="radio" id="switch_48" name="did_this_fix_personalized_to_you" value="1" <?php if (@$CustomerProductReview->did_this_fix_personalized_to_you == '1') { ?> checked <?php } ?>>
                                        <label for="switch_48">1</label>
                                        <input type="radio" id="switch_49" name="did_this_fix_personalized_to_you" value="2" <?php if (@$CustomerProductReview->did_this_fix_personalized_to_you == '2') { ?> checked <?php } ?>>
                                        <label for="switch_49">2</label>
                                        <input type="radio" id="switch_50" name="did_this_fix_personalized_to_you" value="3" <?php if (@$CustomerProductReview->did_this_fix_personalized_to_you == '3') { ?> checked <?php } ?>>
                                        <label for="switch_50">3</label>
                                        <input type="radio" id="switch_51" name="did_this_fix_personalized_to_you" value="4" <?php if (@$CustomerProductReview->did_this_fix_personalized_to_you == '4') { ?> checked <?php } ?>>
                                        <label for="switch_51">4</label>
                                        <input type="radio" id="switch_52" name="did_this_fix_personalized_to_you" value="5" <?php if (@$CustomerProductReview->did_this_fix_personalized_to_you == '5') { ?> checked <?php } ?>>
                                        <label for="switch_52">5</label>
                                    </div>
                                </li>
                                <li>
                                    <h4>You satisfied with this FIT</h4>
                                    <div class="switch-field">
                                        <input type="radio" id="switch_53" name="did_this_fix_match_your_style" value="1" <?php if (@$CustomerProductReview->did_this_fix_match_your_style == '1') { ?> checked <?php } ?>>
                                        <label for="switch_53">1</label>
                                        <input type="radio" id="switch_54" name="did_this_fix_match_your_style" value="2" <?php if (@$CustomerProductReview->did_this_fix_match_your_style == '2') { ?> checked <?php } ?>>
                                        <label for="switch_54">2</label>
                                        <input type="radio" id="switch_55" name="did_this_fix_match_your_style" value="3" <?php if (@$CustomerProductReview->did_this_fix_match_your_style == '3') { ?> checked <?php } ?>>
                                        <label for="switch_55">3</label>
                                        <input type="radio" id="switch_56" name="did_this_fix_match_your_style" value="4" <?php if (@$CustomerProductReview->did_this_fix_match_your_style == '4') { ?> checked <?php } ?>>
                                        <label for="switch_56">4</label>
                                        <input type="radio" id="switch_57" name="did_this_fix_match_your_style" value="5" <?php if (@$CustomerProductReview->did_this_fix_match_your_style == '5') { ?> checked <?php } ?>>
                                        <label for="switch_57">5</label>
                                    </div>
                                </li>
                                <li>
                                    <h4>How you personal stylist worked for you</h4>
                                    <div class="switch-field">
                                        <input type="radio" id="switch_58" name="are_you_satisfied_with_this_fix" value="1" <?php if (@$CustomerProductReview->are_you_satisfied_with_this_fix == '1') { ?> checked <?php } ?>>
                                        <label for="switch_58">1</label>
                                        <input type="radio" id="switch_59" name="are_you_satisfied_with_this_fix" value="2" <?php if (@$CustomerProductReview->are_you_satisfied_with_this_fix == '2') { ?> checked <?php } ?>>
                                        <label for="switch_59">2</label>
                                        <input type="radio" id="switch_60" name="are_you_satisfied_with_this_fix" value="3" <?php if (@$CustomerProductReview->are_you_satisfied_with_this_fix == '3') { ?> checked <?php } ?>>
                                        <label for="switch_60">3</label>
                                        <input type="radio" id="switch_61" name="are_you_satisfied_with_this_fix" value="4" <?php if (@$CustomerProductReview->are_you_satisfied_with_this_fix == '4') { ?> checked <?php } ?>>
                                        <label for="switch_61">4</label>
                                        <input type="radio" id="switch_62" name="are_you_satisfied_with_this_fix" value="5" <?php if (@$CustomerProductReview->are_you_satisfied_with_this_fix == '5') { ?> checked <?php } ?>>
                                        <label for="switch_62">5</label>
                                    </div>
                                </li>
                            </ul>
                            <div class="additional-box message-box">
                                <h4>Additional Comments</h4>
                                <textarea placeholder="message" name="comments"><?php echo @$CustomerProductReview->comments;?></textarea><br>
                                <input type="submit" value="Review Your Order" name="Review">
                            </div>
                        </div>

                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
    });

    // $( window ).scroll(function() {   
    // if($( window ).scrollTop() > 10){  // scroll down abit and get the action   
    $(".progress-bar").each(function () {
        each_bar_width = $(this).attr('aria-valuenow');
        $(this).width(each_bar_width + '%');
    });

    //  }  
    // });


</script>
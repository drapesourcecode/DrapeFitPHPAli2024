<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>assets/css/jssocials.css" />
<link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>assets/css/jssocials-theme-flat.css" />
<script src="<?php echo HTTP_ROOT ?>assets/css/jssocials.min.js"></script>
<style type="text/css">
    .tooltip{ 
        position:relative;
        float:right;
    }
    .tooltip > .tooltip-inner {background-color: #eebf3f; padding:5px 15px; color:rgb(23,44,66); font-weight:bold; font-size:13px;}
    .popOver + .tooltip > .tooltip-arrow {  border-left: 5px solid transparent; border-right: 5px solid transparent; border-top: 5px solid #eebf3f;}


    .progress{
        border-radius:0;
        overflow:visible;
        height: 5px;
    }
    .progress-bar {

        background: rgb(23,44,60);
        -webkit-transition: width 1.5s ease-in-out;
        transition: width 1.5s ease-in-out;
    }
    .tooltip.top {
        margin-top: 45px;
    }

    .tooltip.top .tooltip-arrow {
        top: 0px;
        left: 50%;
        margin-left: -5px;
        border-width: 5px 5px 0;
        border-bottom-color: #000 !important;
    }
    .popOver + .tooltip > .tooltip-arrow {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid #efc556 !important;
        border-top:none !important;
    }

    /*    billing info*/
    .email-preference
    {
        width:100%;
        float:left;
        display: inline-block;
    }
    .preference
    {
        width:100%;
        float:left;
    }
    .preference ul
    {
        padding: 14px;
        margin: 0px;
        display: block;
    }
    .preference ul li
    {
        list-style-type: none;
    }
    .preference h2:nth-child(3)
    {
        padding: 0;
        margin: 0;
    }
    .preference a:nth-child(2)
    {
        background: #d64ade;
        border: 1px solid;
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        padding: 17px 20px;
    }
    .preference form button:nth-child(3)
    {
        background: #d64ade;
        border: 1px solid;
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        padding: 16px 20px;
    }
    .preference a:nth-child(2):hover
    {
        background: #000000;
        color: #ffffff;
    }
    .preference form button:nth-child(3):hover
    {
        background: #000000;
        color: #ffffff;
    }
    .facebook-setting h1 {
        font-size: 25px;
        text-transform: uppercase;
        font-weight: bold;
    }
    .facebook
    {
        width: 650px;
        height:170px;
        padding: 15px;
        border-radius: 5px;
        border: 1px solid #b9b9b9;
        display: inline-block;
        background: #f1f1f1;
    }
    .facebook a 
    {
        padding: 13px 191px 13px 25;
        background: #3b5998;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        display: inline-block;
        font-weight: bold;
    }
    .facebook a:hover
    {
        color:#fff;
        text-decoration: none;
    }

    .facebook a span
    {
        border-right: 3px solid #fff;
        padding: 19px 25px 19px 0;
        margin-right: 191px;
    }
    .signup
    {
        width: 100%;
        float: left;
        border: 2px solid #ccc;
        border-radius: 5px;
        padding:15px;
        padding-top:0px;
    }
    .signup input
    {
        width:100%;
        border:2px solid #ccc;
        border-radius:6px;
        padding:5px 10px;
    }
    .signup input::placeholder
    {
        color:#CCC;
    }
    .signup input:focus
    {
        outline:none;
    }
    .inpt
    {
        padding:0px ;
        margin:0px;
    }
    .inpt form button:nth-child(1)
    {
        background: #d64ade;
        border: 1px solid;
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        padding: 12px 20px;
    }
    .inpt form button:nth-child(2)
    {
        background: #d64ade;
        border: 1px solid;
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        padding: 12px 20px;
    }
    .inpt form button:nth-child(1):hover
    {
        background: #000000;
        color: #ffffff;
    }
    .inpt form button:nth-child(2):hover
    {
        background: #000000;
        color: #ffffff;
    }
    .signup label
    {
        padding-top:15px;
        margin-bottom:3px;
    }
    .signup form
    {
        padding-top:15px;
        margin:0px; 
    }
    .billinginfo
    {
        width: 100%;
        float: left;
        padding:15px;
        padding-top:0px;
        margin-left:10px;
    }
    .billinginfo input
    {
        width:100%;
        border:1px solid #ccc;
        padding:5px 10px;
    }
    .billinginfo label
    {
        width:100%;
        padding-top:25px;
        margin-bottom:3px;
    }
    .inpt form 
    {
        margin-top:30px;    
    }
    .para
    {
        padding:0px;
        margin:0;
        width:100%;
    }
    .para p
    {
        margin:0;
        font-size:15px;
        padding-top:8px;
    }
    .para span
    {
        text-align: right;
        float: right;           
    }

    .loginBtn {
        box-sizing: border-box;
        position: relative;
        /* width: 13em;  - apply for fixed size */
        margin: 0.2em;
        padding: 0 15px 0 46px;
        border: none;
        text-align: left;
        line-height: 34px;
        white-space: nowrap;
        border-radius: 0.2em;
        font-size: 16px;
        color: #FFF;
    }
    .loginBtn:before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        width: 34px;
        height: 100%;
    }
    .loginBtn:focus {
        outline: none;
    }
    .loginBtn:active {
        box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
    }


    /* Facebook */
    .loginBtn--facebook {
        background-color: #4C69BA;
        background-image: linear-gradient(#4C69BA, #3B55A0);
        /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
        text-shadow: 0 -1px 0 #354C8C;
    }
    .loginBtn--facebook:before {
        border-right: #364e92 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
    }
    .loginBtn--facebook:hover,
    .loginBtn--facebook:focus {
        background-color: #5B7BD5;
        background-image: linear-gradient(#5B7BD5, #4864B1);
    }
    .credit h1 {
        font-size: 25px;
        font-weight: bold;
        text-transform: uppercase;
    }
    /*referrals start*/
    .refferal-main{ float: left; width: 100%;}
    .refferal-main h1 {
        /*font-family: 'Dancing Script', cursive;*/
        font-weight: bold;
        font-size: 37px;
        color: #d64ade;
        letter-spacing: 2px;
        text-align: left;
    }

    .refferal-box {
        float: left;
        width: 70%;
    }
    .refferal-box copy-text a{
        display: inline-block;
        background: #d64ade;
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        padding: 12px 23px;
        float: right;
        position: absolute;
        right: 0;
        text-align: center;
    }
    .refferal-box copy-text p{
        float: left;
        width: 100%;
        text-align: left;
        padding: 10px 18px;
        font-size: 14px;
        color: #000;
        font-style: italic;
        letter-spacing: 2px;
        margin: 0;
    }
    .refferal-box copy-text {

        float: left;
        width: 100%;
        border: 1px solid #a5a5a5;
        margin: 7px 0 30px;
        position: relative; 
    }

    .form-boxed {
        float: left;
        width: 100%;
        border: 1px solid #ccc;
        padding: 22px 24px;
    }

    .form-boxed textarea{ width: 100%; height: 100px;}
    .refferal-box .socila-box ul li {
        display: inline-block;
        width: 23.8%;
        float: left;
        margin-top: 20px;
        margin: 0 4px;
    }
    .refferal-box .switch-field label {
        width: 119px;
        padding: 10px 14px;
    }
    .refferal-box .socila-box ul li:nth-child(2) a {
        background: #007fff;
    }
    .refferal-box .socila-box ul li:nth-child(4) a {
        background: #c92228;
    }
    .refferal-box h5 {
        position: relative;
        width: 100%;
        text-align: center;
        margin-bottom: 0;
    }
    .refferal-box h5::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 1px;
        background: #ccc;
        left: 0;
        top: 8px;
        z-index: -1;
    }
    .refferal-box h5 span{
        display: inline-block;
        height: 30px;
        width: 30px;
        background: #fff;
        text-align: center;
        z-index: 111;
    }
    .save{
        background: #fe6c00;
        border: 1px solid;
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
        padding: 16px 20px;
    }
    .save :hover{
        background: #000000;
        color: #ffffff;
    }

    .jssocials-shares .fa, .jssocials-shares .far, .jssocials-shares .fas {
        font-family: normal normal normal 14px/1 FontAwesome;
        font-weight: 900 !important;
        font-size: 15px;
    }
    .preference h2 {
        font-size: 25px;
        font-weight: bold;
        text-transform: uppercase;
    }
    /*referrals end*/
</style>

<div class="style-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <?php echo $this->element('frontend/profile_menu_men') ?>
            </div>
        </div>
    </div>
</div>
<?php if ($slug != 'kids') { ?>
    <div class="pogress-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" >   
                            <span  class="popOver" data-toggle="tooltip" data-placement="top" title="100%"> </span>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<?php if ($slug == 'kids') { ?>   
    <div class="banner kids-banner">
        <?= $this->Flash->render() ?>  
        <img src="<?php echo HTTP_ROOT; ?>assets/images/kids-banner.jpg" alt="">
        <div class="drapefit-box">
            <h1>Say Hello To <span>Drape Fit Kids</span></h1>
            <p>Now Offering boys and girl clothing from 2T-14!</p>
            <ul>
                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule')) ?>
                <li><button name="add_kids" value ='add_kids' type="Submit" style="display: inline-block; background: #d64ade; color: #fff;   padding: 8px 20px;text-transform: uppercase;font-weight: 600;letter-spacing: 2px;">Add kid <i class="fas fa-arrow-right"></i></button></li><?php echo $this->Form->end(); ?>
            </ul>
        </div>
    </div>
    <div class="contain-section kid-content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12 woks">
                    <h2>How We Works For You</h2>
                    <img src="<?php echo HTTP_ROOT; ?>assets/images/heading-bg.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="box">
                        <div class="tickimg-box"><img src="<?php echo HTTP_ROOT; ?>assets/images/tick.png" alt=""></div>
                        <h4>Budget-Friendly Pricing</h4>
                        <p>Conveniently shipped to your doorstep with a free return envelope included.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="box">
                        <div class="tickimg-box"><img src="<?php echo HTTP_ROOT; ?>assets/images/tick.png" alt=""></div>
                        <h4>One-Of-A-Kind Styles</h4>
                        <p>Conveniently shipped to your doorstep with a free return envelope included.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="box">
                        <div class="tickimg-box"><img src="<?php echo HTTP_ROOT; ?>assets/images/tick.png" alt=""></div>
                        <h4>Convenient, Easy & Fun</h4>
                        <p>Conveniently shipped to your doorstep with a free return envelope included.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12 quiz">
                    <a href="#">Start a Kids Style Quiz »</a>
                </div>
            </div>
        </div>
    </div>
    <div class="fix-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-23">
                    <div class="fixed-box">
                        <h3>What’s in a Fix?</h3>
                        <ul>
                            <li><strong>8-12 pieces of</strong> clothing, shoes & accessories.</li>
                            <li><strong>A Stylist note</strong> written especially to the kid.</li>
                            <li><strong>Expert adviceon</strong> how to wear
                                and pair your new items.</li>
                            <li><strong>A prepaid return envelope</strong>
                                (shipping & returns are always free!)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kid-product-box">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12 woks">
                    <h2>Kids Clothing & Pricing</h2>
                    <p>We carry an extensive selection of graphic tees, leggings, jeans and more across a range of price points—from sizes 2T-14.</p>
                    <img src="assets/images/heading-bg.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="product-box">
                        <div class="product-img">
                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kids.jpg">
                            <h3><span>STARTING AT $18</span></h3>
                        </div>
                        <a href="#">DRESSES</a>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="product-box">
                        <div class="product-img">
                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kids.jpg">
                            <h3><span>STARTING AT $18</span></h3>
                        </div>
                        <a href="#">DRESSES</a>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="product-box">
                        <div class="product-img">
                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kids.jpg">
                            <h3><span>STARTING AT $18</span></h3>
                        </div>
                        <a href="#">DRESSES</a>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="product-box">
                        <div class="product-img">
                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kids.jpg">
                            <h3><span>STARTING AT $18</span></h3>
                        </div>
                        <a href="#">DRESSES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="get-box">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12 woks">
                    <h2>Tell Your Friends, Get $25</h2>
                    <p>Share the news about Drape Fit Kids with the world! You'll get a $25 credit per friend when they receive their first Fix.</p>
                    <img src="<?php echo HTTP_ROOT; ?>assets/images/heading-bg.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="get-small-box">
                        <p><strong>New! Quickly share using your personal link:</strong></p>
                        <div class="copy-text">
                            <p id="p1">drafeat.com/referral/sujaydas</p>
                            <a class="copy-first" href="javascript:void(0)" onclick="copyToClipboard('#p1')">copy-link<span class="copied">Copied !</span></a>
                        </div>
                        <div class="socila-box">
                            <p><strong>Or share via:</strong></p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i>LinkedIn</a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php } ?>
<?php if ($slug == 'reservation') { ?>
    <div class="schedule reservation">
        <div class="container">
            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'reservation')) ?>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="reserv-box">
                        <h1>We’ve booked a spot for your first Fix delivery!</h1>
                        <div class="date-fix-box">
                            <a href="javascript:void[0]"> <?php echo date('l, F  y'); ?></a>
                            <p>Complete your payment and shipping information to secure your reservation within 30 minutes.</p>
                        </div>
                        <button type="submit" value='shipping_address' name='shipping_address'>Next: Shipping Address <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>        

<?php } ?>   
<?php if ($slug == 'shipping') { ?>
    <div class="schedule reservation">
        <div class="container">
            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'shipping')) ?>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="shipping-box">
                        <h1>What’s your shipping address?</h1>
                        <p>We currently support one shipping address and one credit card per family. Any styling fees or items kept will be charged to the credit card on file, which can be changed in your account settings. Please confirm the address where you’ll receive all Fixes.</p>
                        <?php
                        if (empty($ShippingAddress->full_name)) {
                            $name = $userDetails->user_detail->first_name . ' ' . $userDetails->user_detail->last_name;
                        } else {
                            $name = $ShippingAddress->full_name;
                        }
                        ?>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <label>Name</label>
                                <input type="text" placeholder="" name='full_name' id='full_name' value='<?php echo $name; ?>'>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <label>ADDRESS</label>
                                <input type="text" placeholder="" name='address' value='<?php echo @$ShippingAddress->address ?>'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <label>ADDRESS LINE 2</label>
                                <input type="text" placeholder="" name='address_line_2' value='<?php echo @$ShippingAddress->address_line_2; ?>'>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <label>CITY</label>
                                <input type="text" placeholder="" name='city' value='<?php echo @$ShippingAddress->city; ?>'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <label>State</label>
                                <select name='state' id='state'>
                                    <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas'>Armed Forces Americas</option>
                                    <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas1') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas1'>Armed Forces Americas1</option>
                                    <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas2') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas2' >Armed Forces Americas2</option>
                                    <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas3') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas3'>Armed Forces Americas3</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <label>ZIPCODE</label>
                                <input type="text" placeholder="" name='zipcode' value='<?php echo @$ShippingAddress->zipcode; ?>'>

                            </div>
                        </div>
                        <button type="submit" name='payment' value='payment'>Next: Payment <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>       

<?php } ?>   
<?php if ($slug == 'payment') { ?>
    <div class="schedule reservation">
        <div class="container">
            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'cardpayment')) ?>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="shipping-box">
                        <?php $this->Flash->render(); ?>
                        <h1>What’s your shipping address?</h1>
                        <p>We can only save one credit card per family. Any styling fees or items kept will be charged to the credit card on file.</p>
                        <div class="price-box">
                            <h5>Free shipping both ways<span>$0</span></h5>
                            <h5>Styling Fee<span>$20</span></h5>
                            <ul>
                                <li>Includes your own Personal Stylist</li>
                                <li>5 items to try on at home</li>
                                <li>Will be applied to any items you keep!</li>
                            </ul>
                            <h5><strong>Total<span>$20</span></strong></h5>
                        </div>
                        <div class="payment-detail">
                            <h3>Add your payment details</h3>
                            <label>NAME ON CARD</label>
                            <input type="hidden" name='price' id='price' value="20">
                            <input type="text" name='card_name' id='card_name' value="<?php echo $userDetails->user_detail->first_name . ' ' . $userDetails->user_detail->last_name; ?>">
                            <label>CREDIT CARD NUMBER</label>
                            <input type="text" name='card_number' id='card_number' placeholder="">
                            <label> Expiry</label>
                            <input type="text" name='card_expire' id='card_expire' placeholder="">

                        </div>
                        <h6><span><i class="fas fa-lock"></i> Secure payment processed by Braintree.</span></h6>
                        <button class="button2" name='card_payment' value='card_payment' type="submit">Save Information <i class="fas fa-arrow-right"></i></button>
                        <h6>We will use this payment method for any future charges.</h6>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>     

<?php } ?>  
<?php if ($slug == 'permissions') { ?>
    <div class="email-preference">
        <div class="container">
            <div class="row">
                <div class="preference">
                    <?php $this->Flash->render(); ?>
                    <h2>Contact Setting</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                    <form>
                        <span></span>
                        <a href="<?php echo HTTP_ROOT . 'clients/referrals' ?>" class="">CONTACT ADDRESS BOOK <i class="fas fa-long-arrow-alt-right"></i></a>
                        <button onclick="javascript:history.back();
                                return false;">CANCEL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>  
<?php if ($slug == 'emailpreference') {
    ?>
    <div class="email-preference">
        <div class="container">
            <div class="row">
                <div class="preference">
                    <?= $this->Flash->render(); ?> 
                    <form method="post" name="emailpreference" id='emailpreference'>
                        <div class="form-box-data">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <h2>Email Preferences</h2>
                                    <h3>Your email address on file is : <?php echo $this->request->getSession()->read('Auth.User.email') ?></h3>    
                                    <h3>I'd like to recive</h3> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <label for="exclusive_offers" class="input-control radio">
                                        <input type="radio" id="exclusive_offers" name="email_preferences" value="1" <?php
                                        if ($isemail_preferences->email_preferences == 1) {
                                            echo 'checked';
                                        }
                                        ?>>
                                        <span class="input-control__indicator"></span>Exclusive offers,news,styling,tips and more !
                                    </label>


                                    <label for="exclusive_offers2" class="input-control radio">
                                        <input type="radio" id="exclusive_offers2" name="email_preferences" value="0" <?php
                                        if ($isemail_preferences->email_preferences == 0) {
                                            echo 'checked';
                                        }
                                        ?>>
                                        <span class="input-control__indicator"></span>No emails, please
                                    </label>
                                </div>
                            </div>

                        </div>

                        <button class="save" name="save_exclusive_offers" id="save_exclusive_offers" value="save_exclusive_offers" type="submit">SAVE <i class="fas fa-long-arrow-alt-right"></i></button>
                        <button class="cancel" onclick="javascript:history.back();
                                return false;">CANCEL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($slug == 'facebook') { ?>
    <div class="email-preference">
        <div class="container">
            <div class="row">
                <div class="facebook-setting">
                    <?= $this->Flash->render() ?> 
                    <h1>Facebook Setting</h1>
                    <div class="facebook">
                        <h5>Sign in with Facebook</h5>
                        <p>Sign in with Facebook

                            Connecting your Facebook account allows you to sign into DrapeFit without needing a new password. </p>
                        <a href="#" class="loginBtn loginBtn--facebook">
                            CONNECT FACEBOOK
                        </a>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<button class="loginBtn loginBtn--facebook">
      Login with Facebook
    </button>-->
<?php } ?>

<?php if ($slug == 'credit') { ?>
    <div class="email-preference">
        <div class="container"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="credit">
                        <div class="row">
                            <div class="col-md-8">
                                <?= $this->Flash->render() ?> 
                                <h1>Account Credit</h1>
                                <p class="accp">credit balance :$<?php echo number_format($credit_balance->Total_promo_price, 2); ?></p>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,                             
                                    by injected humour, or randomised words which don't look even slightly believable.</p>
                                <div class="acc">
                                    <label>Redeem your promo code.</label>
                                    <form method="post" name="credit_info" id="credit_info">
                                        <input type="text" name="promocode" id="promocode">
                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">

                                        <button class="save" type="submit" name='credit_info' value="credit_info" id="credit_info">SAVE PAYMENT INFO</button>
                                    </form>
                                    <label class="acclab"><a href="#">or,Redeem a gift code</a></label>
                                </div>
                                <div class="last-div">
                                    <p>or,you can also</p>
                                    <p><input type="radio" name="referals"> <a href="#">see my Referals</a></p>
                                    <p><input type="radio" name="referals"> <a href="#">Redeem a gift code</a></p>  
                                </div>                                  
                            </div>   
                            <div class="col-md-4">
                                <div class="credit-right">
                                    <h2>You'll get $25,<br> they'll get $25.</h2>
                                    <p>who are you inviting ?</p>
                                    <input type="text">
                                    <p>choose a way to share</p>
                                    <form>
                                        <button class="save" >SAVE PAYMENT INFO</button>
                                    </form>
                                                                            <!--<a href="<?php HTTP_ROOT . @$this->request->getSession()->read('Auth.User.name') ?>">Share link</a>-->
                                    <p>Or share via :</p>
                                    <ul>
                                        <li><a href="https://mail.google.com"><i class="fas fa-envelope"></i></a></li>
                                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.messenger.com/"><i class="fab fa-facebook-messenger"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($slug == 'referrals' || $slug == 'gmail') { ?>
    <?php if ($slug == 'gmail') { ?>   
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>  

        <div class="container">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
            <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>





            <!-- Modal -->
            <?php
            $decoded_data = json_decode($xmlresponse);
            ?>
            <div class="modal fade in" id="myModalxxxx" role="dialog" <?php if (@count($decoded_data->feed->entry) >= 1) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" style="width: 100%!important;">
                        <div class="modal-header">
                            <button onclick="getClose()" type="button" class="close">&times;</button>
                            <h4 class="modal-title">Contact list</h4>
                        </div>
                        <?php
                        ?>
                        <div class="modal-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%"> 
                                <thead> 
                                    <tr> 
                                        <th></th> 
                                        <th>Email</th> 
                                        <th></th>
                                    </tr> 
                                </thead>
                                <tbody> 
                                    <?php
                                    $decoded_data = json_decode($xmlresponse);
                                    if (@count($decoded_data->feed->entry) > 0) {
                                        foreach (@$decoded_data->feed->entry as $k => $v) {
                                            $email_address = isset($v->{'gd$email'}[0]->address) ? $v->{'gd$email'}[0]->address : '';
                                            ?>
                                            <tr> 
                                                <td class="xxx"><input type="checkbox" name="gmailmail" class="checkbox" value="<?php echo $email_address; ?>"></td>
                                                <td><?php echo $email_address; ?></td>
                                                <td></td> 
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <button style="float: left;" type="button" onclick="getoK()" class="btn btn-default">Get</button>
                            <button type="button" onclick="getClose()" class="btn btn-default">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    <?php } ?> 






    <div class="refferal-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="refferal-box">
                        <?= $this->Flash->render() ?> 
                        <h1>Get $25 when frinds try Drape Fit !</h1>
                        <p>We currently support one shipping address and one credit card per family. Any styling fees or items kept will be charged to the credit card on file, which can be changed in your account settings. Please confirm the address where you’ll receive all Fixes.</p>
                        <div class="form-boxed">
                            <form method="post" name="email_reference" id="email_reference">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>I'm sharing my link with:</h4>
                                        <p>(This can help us personal their experience)</p>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <div class="switch-field">
                                            <input class="xx" type="radio" id="Women" name="gender" value="w" checked="">
                                            <label for="Women">Women</label>
                                            <input class="xx" type="radio" id="Men" name="gender" value="m">
                                            <label for="Men">Men</label>
                                            <input class="xx" type="radio" id="Kids" name="gender" value="k">
                                            <label for="Kids">Kids</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>I’m sharing my link with :</h4>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <div class="copy-text">
                                            <p id="p1"><?php echo $link; ?></p>
                                            <a class="copy-first" href="javascript:void(0)" onclick="copyToClipboard('#p1')">copy-link<span class="copied">Copied !</span></a>
                                        </div>
                                    </div>
                                </div>
                                <h5><span>OR</span></h5>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h4>Enter email addresses separated by commas(,)</h4>
                                        <?php ?>
<!--                                        <p>Important contacts<span><a href="https://accounts.google.com/o/oauth2/auth?client_id=<?php echo $client_id; ?>&redirect_uri=<?php echo $redirect_uri; ?>&scope=https://www.google.com/m8/feeds/&response_type=code">Gmail</a></span></p>-->


                                        <p style="color: #a9a9a9;">(We use your contacts only to help you send referral links.)</p>
                                        <textarea name="email_id" id="email_id" class="form-control"></textarea>
                                    </div>
                                </div>
    <!--                                <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?php echo @$toemail ?>&body=my-text">-->
                                <a  id="email_send_btnx" target="_blank" href="<?php echo $url . $sub . '&body=' . $txt . $link; ?>"></a>
                                <button class="save" type="button" name="email_send" id="email_send_btn" value="email_send" onclick="createLink()">Create my referral link</button>
                                <script>
                                    function createLink() {
                                        let u_emails = '';
                                        if ($('#email_id').val() != '') {
                                            u_emails = $('#email_id').val();
                                        }
                                        let new_href = $('#email_send_btnx').attr('href');
                                        var url = new URL(new_href);
                                        url.searchParams.set("bcc", u_emails); // setting your param
                                        var newUrl = url.href;
                                        $('#email_send_btnx').removeAttr('href');
                                        $('#email_send_btnx').attr('href', newUrl);
                                        console.log(newUrl);
                                        $('#email_send_btnx')[0].click();
                                    }
                                </script>


                                <h5 style="margin-top: 20px"><span>OR</span></h5>
                                <!--                                <div class="row">
                                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                                        <div class="socila-box">
                                                                            <p style="margin-bottom: 15px;"><strong>Or share via:</strong></p>
                                                                            <ul>
                                                                                <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                                                                <li><a href="#"><i class="fab fa-facebook-messenger"></i>LinkedIn</a></li>
                                                                                <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                                                                                <li><a href="#"><i class="fab fa-pinterest-p"></i>Instagram</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                                <div id="share"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<script type="text/javascript" class="init">

    $(document).ready(function () {
        $('#example').DataTable();
    });
    function getClose() {
        $('#myModalxxxx').hide();
        $('#email_id').val('');
    }
    function getoK() {
        $('#myModalxxxx').hide();

    }

</script>
<script type="text/javascript">

    $(document).ready(function () {
        var allvalue = '';
        //$('.checkbox').on('click',function (e){   
        $(document).on("click", ".checkbox", function (e) {


            //  $(".checkbox").click(function () {

            var favorite = [];

            $.each($("input[name='gmailmail']:checked"), function () {

                favorite.push($(this).val());

            });

            allvalue = favorite.join(", ");
            $('#email_id').val(allvalue);

        });


    });

</script>
<script type="text/javascript">
    $('#email_send_btnxxxxx').click(function () {

        var url = $('#pageurl').val();
        var formData = $('#email_reference').serialize();
        //alert(formData);
        $.post(url + 'users/ajax_gmail', formData, function (response) {
            if (response.status == "success") {

                window.location.href = response.url;
                var link = response.url;
                setTimeout(function () {
                    window.location.href = link;
                }, 3000);


                //$(location).attr('href', 'https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=devadash143@gmail.com&body=my-text'
            }


        }, 'json');






    });
    var txt_link_p = $('#p1').html();
    $('.xx').click(function () {
        var value = $(this).val();
        if (value) {

            var href = '<?php echo $linkx; ?>';
            var newLink = href + '?sod=' + value
            // alert('<?php //echo $url . $sub . '&body=' . $txt      ?>'+ newLink);
            $('#email_send_btnx').attr('href', '<?php echo $url . $sub . '&body=' . $txt ?>' + newLink);
            $('#p1').html(newLink);
            txt_link_p = newLink;
            $("#share").jsSocials({
                shares: ["twitter", "facebook", "linkedin", "pinterest", "whatsapp"],
                url: txt_link_p,
            });

        } else {

        }
    });


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
<script type="text/javascript">
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        $(".copied").css("opacity", "1");
    }
</script>

<script>
    $("#share").jsSocials({
        shares: ["twitter", "facebook", "linkedin", "pinterest", "whatsapp"],
        url: txt_link_p,
    });

</script>


</body>
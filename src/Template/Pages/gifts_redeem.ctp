    <style>
        .banner-box{
            float: left;
            width: 100%;
            background: url(images/banner-final1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            padding: 7% 0px;
            position: relative;
        }
        .banner-box.footer-inner-banner2{
            background: url(<?php echo HTTP_ROOT ?>images/footer-banner2.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .banner-box::after {
            content: "";
            position: absolute;
            background: rgba(0, 0, 0, 0.66);
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
        }
        .banner-box h2 {
            font-size: 42px;
            font-family: 'Amazon Ember';
            font-weight: bold;
            text-align: center;
            margin: 0;
            padding: 0;
            color: #ffffff;
            position: relative;
            z-index: 11;
            text-transform: uppercase;
        }
        .bannerwidth{
            width:100%;
        }

        .banner-box ul{
            margin: 0;
            padding: 0;
            list-style-type: none;
            text-align: center;
            z-index: 11;
            position: relative;
        }
        .banner-box ul li{
            display: inline-block;
            color: #fe6c00;
            font-size: 17px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 0 4px;
        }
        .banner-box ul li a{
            color: #ffffff !important;
            text-decoration: none;

        }
        .banner-box ul li a:hover{
            color:#cc5a00 !important;
        }
        .print-step .captch {

            float: left;
            width: 100%;
            margin-top: 25px;

        }
        label.error {    
            position: relative;
            top: -19px;
        }
        label#price-error {
            position: absolute;
            right: 0;
            top: 76px;
            width: 100%;
            border: none;
            padding: 0;
            margin: 0;
            height: 0;
            font-weight: normal;
        }
        label#postal_code-error {
            top: 4px;
        }
        .drapfit-reedem {
        float: left;
        width: 100%;
        /*padding: 20px 0 34px;*/
        background: #fff;
        /*margin-top: -120px;*/
    }
    .drapfit-reedem h2 {
        color: #ff6c00;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
        margin-bottom: 20px;
        font-family: "Amazon Ember", Arial, sans-serif;
    }
    .drapfit-reedem p{
        font-size: 15px;
        width: 83%;
        color: #232f3e;
        margin: 7px auto;
        font-family: "Amazon Ember", Arial, sans-serif;
    }
    .drapfit-reedem p a{
    font-size: 20px;
    width: 83%;
    color:#ff6c00;
    margin: 12px auto;
    /*font-family: "Amazon Ember", Arial, sans-serif;*/
}
@media only screen and (max-width: 600px) {
    .page-sections{min-height:20vh;}
    .email-alearts {
    width: 100%;
    display: inline-block;
    background: #fff;
    padding: 15px 45px;
    box-shadow: 0px 0px 8px #58585882;
    border-radius: 4px;
    border-top: 3px solid #fe6c00;
}

.invoster-panel-box .panel-title a {
    display: inline-block;
    width: 100%;
    background: #232f3e;
    color: #ffffff;
    font-size: 13px;
    font-weight: normal;
    padding: 15px 15px;
    border-left: 5px solid #fe6c00;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    position: relative;
    font-family: "Amazon Ember", Arial, sans-serif;
    }

.drapfit-reedem p {
    font-size: 15px;
    width: 90%;
    color: #232f3e;
    margin: 7px auto;
    font-family: "Amazon Ember", Arial, sans-serif;
}

    font-family: "Amazon Ember", Arial, sans-serif;
}

    .drapfit-reedem p a{
    font-size:18px;
    color:#ff6c00;
    width: 90%;

}
}
    </style>

    <section class="inner-banner inner-banner2"><img src="https://www.drapefit.com/images/banner-final1.jpg" /></section>
    <section class="how-it-work inner-b">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="it-work-top">
<div class="section-head" data-aos="fade-down">
<ul>
    <li><a href="https://drapefittest.com/">Home</a></li>
    <li>&gt;</li>
    <li>Gifts Redeem</li>
</ul>

<h2><span>Gifts</span> Redeem</h2>
<img src="/img/header-booten.png" /></div>
       <section class="print-step">
            <div class="container">
                <div class="row">
                    <div  class="drapfit-reedem">
                    <div class="col-sm-12">
                        <h2>DRAPE FIT - Reedem Gift Code</h2>
                        <p>Drape FIT is the world's leading online personal styling service. We combine data science and human judgment to deliver apparel, shoes, and accessories personalized to our clients™ unique tastes, lifestyles, and budgets. Our service is available for women, men, and kids, and designed to help all our clients look, feel, and be their best selves.We have also included maternity, plus size , petite and Big & Tall outfits keeping every size and shape in mind.</p>

                        <p>We provide a personal stylist facility to our customers, helping them select their favourite items to complete their look.</p>

                        <p>We send Fit Box of hand-picked styles right to the customer's door bi-weekly , every month , every two months frequency depends on customer selection. We have met with a sudden rise in the service demand more than we have expected, due to which we would like to expand our business.<a  href="https://drapefit.com/terms-conditions" target="_blank"> Terms & Conditions</a> </p>
                         
                        

                        
                                
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12" id="redeembox">
                        <div id="emsg"></div>
                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'novalidate' => "true", 'id' => 'giftemailform')) ?>
                        <div id="stepbox_one">
                            <div class="step1-box" style="margin-top: 75px;">
                                <h2><span>01</span><br>Gift Card Number</h2>
                                <!-- <h2>Gift Card number</h2>
                                <label>Gift Card number</label> -->
                                <label>Enter your Gift Card Number</label>
                                <input type="text" name="giftcode" id="giftcode" placeholder="Enter Your GiftCode">
                            </div>

                            <input type="button" name="" id="review_order"  onclick="checkGift();"value="Redeem code">
                            <p><i class="fa fa-lock" aria-hidden="true"></i> Your readeem code will not be created until after you login your account.</p>
                        </div>

                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="col-sm-12 col-lg-12 col-md-12" id="redeemboxx"></div>
                </div>
            </div>
            <div id="loaderPyament" style="display: none; position: fixed; height: 100%; width: 100%; z-index: 11111111; padding-top: 20%; background: rgba(255, 255, 255, 0.7); top: 0; text-align: center;">
                <img src="<?php echo HTTP_ROOT . 'img/' ?>widget_loader.gif"/>
            </div>
        </section>
    </section>
    <?php if ($this->request->session()->read('codeProfile') != '') { ?>
        <script type="text/javascript">
            $('#loaderPyament').show();
            $("#redeembox").hide();
            var url = '<?php echo HTTP_ROOT?>';
            var code = '<?php echo $this->request->session()->read('codeProfile'); ?>';
            if (code != '') {
                var backData = {code: code};
                $.post(url +'pages/ajax_gifts_redeem_success', backData, function (response) {
                    if (response) {
                        $('#loaderPyament').hide();
                        $('#id01').hide();
                        $('#redeembox').hide();
                        $('#redeemboxx').html(response);
                    }
                }, "html");
            } else {
                $('#redeembox').show();
                $('#emsg').html('<span style="color:red">Somethings is issue your redeem code</span>');
            }


        </script>
    <?php } ?>
    <script type="text/javascript">

        function checkGift() {
            $('#id01').hide();
            var code = $("#giftcode").val();
            var url = $('#pageurl').val();
            //alert(code);

            if (code == '') {
                $('#message').html('<span style="color:red">Please enter the redeem code</span>');
            } else {

                $('#loaderPyament').show();
                var formData = {code: code};
                $.post(url + 'pages/ajax_gifts_redeem_check', formData, function (response) {
                    if (response.status == "success") {
                        $('#loaderPyament').hide();
                        if (response.code != '') {
                            var amount = response.amount;
                            var code = response.code;
                            var backData = {code: code};
                            $.post(url + 'pages/ajax_gifts_redeem_success', backData, function (response) {
                                if (response) {
                                    $('#id01').hide();
                                    $('#redeembox').hide();
                                    $('#redeemboxx').html(response);
                                }
                            }, "html");
                        }

                    }
                    if (response.status == "login") {
                        $('#loaderPyament').hide();
                        $('#id01').show();
                    }
                    if (response.status == "error") {
                        $('#loaderPyament').hide();
                        $('#emsg').html('<span style="color:red">' + response.msg + '</span>');
                        window.setTimeout(function () {
                            $('#emsg').html('');
                        }, 10000);
                    }

                }, "json");
                return false;
            }


        }


    </script>
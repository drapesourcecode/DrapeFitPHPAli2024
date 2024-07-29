


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
</style>
<section class="page-sections">
    <div class="banner-box footer-inner-banner2">
        <div class="bannerwidth">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <ul>
                        <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
                        <li><b>></b></li>
                        <li>Gifts Redeem</li>
                    </ul>
                    <h2>Gifts Redeem</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="print-step">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12" id="redeembox">
                    <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'novalidate' => "true", 'id' => 'giftemailform')) ?>
                    <div id="stepbox_one">
                        <div class="step1-box">
                            <h2>Gift Card number</h2>
                            <label>>Gift Card number</label>
                            <input type="text" name="giftcode" id="giftcode" placeholder="Enter Your GiftCode">
                        </div>
                        <input type="submit" name="" id="redeemCode" value="Redeem code">
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
<?php if($this->request->session()->read('codeProfile')!=''){?>

<?php } ?>
<script type="text/javascript">
    $(function () {
        $("#giftemailform").validate({
            $('#id01').hide();
                    submitHandler: function () {
                        var code = $("#redeemCode").val();
                        if (code) {
                            var url = $('#pageurl').val();
                            $('#loaderPyament').show();
                            var formData = {code: code};
                            $.post(url + 'pages/ajax_gifts_redeem_check', formData, function (response) {
                                if (response.status == "success") {
                                    $('#loaderPyament').hide();
                                    if (response.code != '') {
                                        var amount = response.amount;
                                        var code = response.code;
                                        var backData = {amount: amount, code: code};
                                        $.post(url + 'pages/ajax_gifts_redeem_success', formData, function (response) {
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
                                if (response.status == "invalid") {
                                    $('#loaderPyament').hide();
                                    $('#message').html('<span style="color:red">' + response.msg + '</span>');
                                }

                            }, "json");
                            return false;
                        }
                    },
            rules: {
                redeemCode: "required",
            },
            messages: {
                redeemCode: "lease enter giftcode value",
            }
        });
    });

</script>
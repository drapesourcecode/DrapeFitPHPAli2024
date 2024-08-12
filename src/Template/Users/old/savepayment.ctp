<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/font-awesome.min.css">
<link href="<?php echo HTTP_ROOT; ?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo HTTP_ROOT ?>assets/js/moment-with-locales.js"></script>
<script src="<?php echo HTTP_ROOT ?>assets/js/bootstrap-datetimepicker.js"></script>
<style type="text/css">
    .hide{
        display: none;
    }
    .show{
        display: block;
    }
    .tooltip{  position:relative;float:right;}
    .tooltip > .tooltip-inner {background-color: #eebf3f; padding:5px 15px; color:rgb(23,44,66); font-weight:bold; font-size:13px;}
    .popOver + .tooltip > .tooltip-arrow {border-left: 5px solid transparent; border-right: 5px solid transparent; border-top: 5px solid #eebf3f;}
    section{margin:100px auto;  height:1000px; }
    .progress{border-radius:0; overflow:visible; height: 5px;}
    .progress-bar{
        background:rgb(23,44,60); 
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
    .payment-btn1:disabled{
        opacity: 0.2;
    }
    .save-card h3 {
        font-size: 21px;
        color: #000;
        text-align: left;
        font-weight: bold;
    }
    .save-card h3 span{     font-size: 18px;
                            display: inline-block;
                            width: 31%;
                            float: right;}
    .content_accordion{ float: left; width: 100%; text-align: left;}
    .content_accordion .panel-heading h4{ position: relative;}
    .content_accordion .panel-heading h4 .expair {
        float: right;
        width: 30%;
        font-size: 13px;
        padding-top: 5px;
    }
    .content_accordion .panel-heading h4 span { display: inline-block; margin-left: 19px; position: relative; top: 1px;}
    .content_accordion .panel-heading h4 img{ width: 44px;}
    .content_accordion .panel-heading h4 .fas{ position:absolute;     right: 20px;
                                               top: 15px; float: right;font-size: 25px; transition: 500ms all ease-in-out 0s;}
    .content_accordion .panel-heading h4 a.collapsed .fas{ transition: 500ms all ease-in-out 0s; transform: rotate(180deg);}
    .panel-body h4{ font-weight: bold; font-size: 18px; color: #000;}
    .panel-body-left{ float: left; width:70%;}
    .panel-body-right{ float: left; width:30%;}
    .panel-body-button{ float: left; width: 100%; text-align: right;}

    .panel-body-button a {
        display: inline-block;
        background: #d64ade;
        border: 1px solid #d64ade;
        padding: 5px 26px;
        color: #fff;
        border-radius: 15px;
    }
    .panel-body-button a:hover{
        background: none;
        color: #d64ade;
    }
    .payment-method{
        float: left;
        width: 100%;
        text-align: left;
    }
    .payment-method-box{
        float: left;
        width: 100%;
    }
    .payment-method-box h4{ color: #000; float: left;}
    .payment-method-box h4 span{
        display: block;
        color: #000;
        font-weight: normal;
        font-size: 15px;
        color: #616161;
        margin-top: 10px;
    }
    .payment-method-box img{ float: right;}
</style>

<?php // if ($slug == 'payment') { ?>
<link rel="stylesheet" href="<?= HTTP_ROOT; ?>payment/css/style.css">
<script type="text/javascript" src="<?= HTTP_ROOT; ?>payment/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= HTTP_ROOT; ?>payment/js/jquery.creditCardValidator.js"></script>
<script type="text/javascript">
    function cardFormValidate() {
        var cardValid = 0;
        //Card validation

        $('#card_number').validateCreditCard(function (result) {
            var cardType = (result.card_type == null) ? '' : result.card_type.name;
            //alert(cardType);
            //alert(result.valid);
            $("#card_type_input").val(cardType);
            if (cardType == 'Visa') {
                var backPosition = result.valid ? '1px -61px, 470px -82px' : '2px -22px, 470px -12px';

            } else if (cardType == 'MasterCard') {
                var backPosition = result.valid ? '2px -183px, 319px -84px' : '2px -22px, 471px 14px';
            } else if (cardType == 'Maestro') {
                var backPosition = result.valid ? '2px -225px, 260px -87px' : '2px -22px, 260px -61px';
            } else if (cardType == 'Discover') {
                var backPosition = result.valid ? '2px -267px, 480px -84px' : '2px -22px, 471px 14px';
            } else if (cardType == 'Amex') {
                var backPosition = result.valid ? '2px -144px, 470px -83px' : '3px -22px, 471px 14px';
            } else if (cardType == 'jcb') {
                var backPosition = result.valid ? '2px -310px, 470px -83px' : '3px -22px, 471px 14px';
            } else {
                var backPosition = result.valid ? '2px -121px, 470px -87px' : '2px -22px, 471px 14px';
            }



            //alert(backPosition);
            $('#card_number').css("background-position", backPosition);
            if (result.valid) {
                $("#card_type").val(cardType);
                $("#card_number").removeClass('required');
                cardValid = 1;
            } else {
                $("#card_type").val('');
                $("#card_number").addClass('required');
                cardValid = 0;
            }
        });

        //Form validation
        var cardName = $("#name_on_card").val();
        var expMonth = $("#expiry_month").val();
        var expYear = $("#expiry_year").val();
        var cvv = $("#cvv").val();
        var regName = /^[a-z ,.'-]+$/i;
        var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
        var regYear = /^2016|2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
        var regCVV = /^[0-9]{3,3}$/;
        if (cardValid == 0) {
            $("#card_number").addClass('required');
            $("#card_number").focus();
            return false;
        } else if (!regMonth.test(expMonth)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").addClass('required');
            $("#expiry_month").focus();
            return false;
        } else if (!regYear.test(expYear)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").addClass('required');
            $("#expiry_year").focus();
            return false;
        } else if (!regCVV.test(cvv)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").addClass('required');
            $("#cvv").focus();
            return false;
        } else if (!regName.test(cardName)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").removeClass('required');
            $("#name_on_card").addClass('required');
            $("#name_on_card").focus();
            return false;
        } else {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").removeClass('required');
            $("#name_on_card").removeClass('required');
            $('#cardSubmitBtn').prop('disabled', false);
            return true;
        }
    }

    $(document).ready(function () {
        //Demo card numbers
        $('.card-payment .numbers li').wrapInner('<a href="javascript:void(0);"></a>').click(function (e) {
            e.preventDefault();
            $('.card-payment .numbers').slideUp(100);
            cardFormValidate()
            return $('#card_number').val($(this).text()).trigger('input');
        });
        $('body').click(function () {
            return $('.card-payment .numbers').slideUp(100);
        });
        $('#sample-numbers-trigger').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            return $('.card-payment .numbers').slideDown(100);
        });

        //Card form validation on input fields
        $('#paymentForm input[type=text]').on('keyup', function () {
            cardFormValidate();
        });

        //Submit card form

    });
</script>
<div class="schedule reservation">
    <div class="container">
        <div id="msg"></div>
        <div class="col-sm-12 col-lg-12 col-md-12 save-card <?php
        if ($savecardcount == 0) {
            echo 'hide';
        } else {
            echo 'show';
        }
        ?>">
            <h3>Your saved credit and debit cards<span>Expires</span></h3>
            <div class="content_accordion">
                <div class="panel-group" id="accordion">
                    <?php
                    $i = 1;
                    foreach ($savecard as $card) {
                        $i++;
                        $masked = str_pad(substr($card->card_number, -4), strlen($card->card_number), 'X', STR_PAD_LEFT);
                        ?>
                        <div class="panel panel-default" id="row-<?php echo $card->id; ?>">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#essay<?php echo $i; ?>"><img src="<?php echo HTTP_ROOT ?>assets/images/<?php
                                        if ($card->card_type == 'Visa') {
                                            echo 'visa.png';
                                        } elseif ($card->card_type == 'MasterCard') {
                                            echo 'master.png';
                                        } elseif ($card->card_type == 'Maestro') {
                                            echo 'maestro.png';
                                        } elseif ($card->card_type == 'Discover') {
                                            echo 'discover.png';
                                        } elseif ($card->card_type == 'Amex') {
                                            echo 'american.png';
                                        } elseif ($card->card_type == 'jcb') {
                                            echo 'jcb.png';
                                        }
                                        ?>" alt=""><span> Card Number <?php echo $masked; ?></span><span class="expair"><?php echo $card->card_expire; ?></span><i class="fas fa-angle-up"></i></a>
                                </h4>
                            </div>
                            <div id="essay<?php echo $i; ?>" class="panel-collapse collapse <?php if ($i == 1) { ?> in <?php } ?>">
                                <div class="panel-body">
                                    <div class="panel-body-left">
                                        <h4>Name On Card</h4>
                                        <p><strong><?php echo $card->card_name; ?></strong></p>
                                    </div>

                                    <div class="panel-body-button">
                                        <a href="#" data-id="<?php echo $card->id; ?>" class="remove_card">Remove</a>
                                        <a href="#" data-id="<?php echo $card->id; ?>" class="apply_card">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
            <div class="payment-method">
                <h3>Add a new payment method</h3>
                <div class="payment-method-box">
                    <h4>credit or debit cards<span>Our site Accepts all major credit and debit cards</span></h4>
                    <img src="<?php echo HTTP_ROOT ?>assets/images/card.png" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="shipping-box">


                    <div class="card-payment">
                        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'paymentForm')) ?>
                        <div id="paymentSection">
                            <ul>
                                <input type="hidden" name="id" id="card_id" value=""/>


                                <li>


                                    <input type="hidden"  id="card_type_input" name="card_type">
                                    <input type="text" placeholder="1234 5678 9012 3456" id="card_number" name="card_number" class="">
                                    <small class="help">This demo supports Visa, American Express, Maestro, MasterCard and Discover.</small>
                                </li>
                                <div id="loader" style=" margin-left: 45px;position: absolute;display: none;top: 120px;"><img src="<?= HTTP_ROOT; ?>images/payment-loader.gif" /></div>
                                <li class="vertical">
                                    <ul>
                                        <li>
                                            <label for="expiry_month">Expiry month</label>
                                            <input type="text" placeholder="MM" maxlength="5" id="expiry_month" name="expiry_month">
                                        </li>
                                        <li>
                                            <label for="expiry_year">Expiry year</label>
                                            <input type="text" placeholder="YYYY" maxlength="5" id="expiry_year" name="expiry_year">
                                        </li>
                                        <li>
                                            <label for="cvv">CVV</label>
                                            <input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <label for="name_on_card">Name on card</label>
                                    <input type="text" placeholder="Name on card" id="card_name" name="card_name">
                                </li>
                                <li>
                                    <div class="pay-now-checkbox">
                                        <input style="width:1%;opacity:0;height:0;"  type="checkbox" name="isSaveCard" id="isSaveCard" value="1">
                                        <label for="isSaveCard">Save Card Information for future use</label>
                                    </div>
                                </li>

                                <li><input  type="submit" name="card_submit" id="cardSubmitBtn" value="Save Info" class="payment-btn" disabled="true" ></li>



                            </ul>

                        </div>
                        <?php echo $this->Form->end(); ?>
                        <div id="orderInfo" style="display: none;"></div>
                    </div>
                    <h6><span><i class="fas fa-lock"></i> Secure payment processed by Braintree.</span></h6>

                </div>
            </div>
        </div>

    </div>
</div>   

<?php // }   ?>  
<script>
    $('.apply_card').click(function () {
        var getId = $(this).attr("data-id");
        if (getId) {
            $.ajax({
                type: "POST",
                url: "<?php echo HTTP_ROOT . 'users/' ?>getSavedCardDetails",
                data: {id: getId},
                dataType: "json",
                success: function (result) {
                    var expire = result.card_expire;
                    var chars = expire.split('-');

                    $("#card_number").val(result.card_number);
                    $("#expiry_month").val(chars[1]);
                    $("#expiry_year").val(chars[0]);
                    $("#cvv").val(result.cvv);
                    $("#card_name").val(result.card_name);
                    $("#card_id").val(result.id);
                    $("#card_number").keyup();

                }});
        }
    });
    $('.remove_card').click(function () {
        var getId = $(this).attr("data-id");
        var confirm1 = confirm("Are you sure want to delete ? ");
        if (confirm1) {
            if (getId) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo HTTP_ROOT . 'users/' ?>removeCardDetails",
                    data: {id: getId},
                    dataType: "JSON",
                    success: function (result) {
                        if (result.msg == 1) {
                            $("#row-" + getId).hide();
                        }

                    }});
            }
        }
    });

</script>
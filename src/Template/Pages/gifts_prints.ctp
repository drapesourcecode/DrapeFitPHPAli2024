<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?= HTTP_ROOT; ?>payment/css/style.css">

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
        background: url(https://drapefittest.com/images/footer-banner2.jpg);
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
                            <li>Gifts Print</li>
                        </ul>

                        <h2><span>Gifts</span> Print</h2>
                        <img src="/img/header-booten.png" /></div>
                    <section class="print-step">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'novalidate' => "true", 'id' => 'giftprintform')) ?>
                                <div id="stepbox_one">
                                    <div class="step1-box">
                                        <h2><span>01</span><br>Gift Details</h2>

                                        
                                        <label>To</label>
                                        <input type="text" name="to_name" id="to_name" placeholder="write Here..">
                                        <h3>A PERSONAL MESSAGE</h3>
                                        <p>Your Print-At-Home gift card will print with a blank space to allow for a handwritten note.</p>
                                        <label>From</label>
                                        <input type="text" name="from_name" id="from_name"  placeholder="write Here..">
                                        <label>EMAIL • (For confirmation message)</label>
                                        <input type="text" name="from_email" id="from_email" placeholder="Enter Your Email">
                                        <h3>GIFT CARD VALUE</h3>
                                        <div class="check-box-label">
                                            <input type="radio" name="price" id="radio1" value="20">
                                            <label for="radio1">$20</label>
                                            <input type="radio" name="price" id="radio2" value="50">
                                            <label for="radio2">$50</label>
                                            <input type="radio" name="price" id="radio3" value="100">
                                            <label for="radio3">$100</label>
                                            <input type="radio" name="price" id="radio4" value="150">
                                            <label for="radio4">$150</label>
                                            <input type="radio" name="price" id="radio5" value="200">
                                            <label for="radio5">$200</label>
                                            <input type="radio" name="price" id="radio6" value="250">
                                            <label for="radio6">$250</label>
                                            <input type="radio" name="price" id="radio7" value="300">
                                            <label for="radio7">$300</label>
                                            <input type="radio" name="price" id="radio8" value="400">
                                            <label for="radio8">$400</label>
                                            <input type="radio" name="price" id="radio9" value="500">
                                            <label for="radio9">$500</label>
                                            <input type="radio" name="price" id="radio10" value="1000">
                                            <label for="radio10">$1,000</label>
                                        </div>
                                    </div>
                                    <div class="captch">
                                        <div class="g-recaptcha" data-sitekey="6Lf2GV4hAAAAAO6znCkcg_Dd3VQDDYPxGue-rJyW"></div>
                                    </div>
                                    <input type="submit" name="" id="review_order" value="Review Your Order">
                                    <p><i class="fa fa-lock" aria-hidden="true"></i> Until you review your order your card will not be charged.</p>
                                </div>
                                <div id="stepbox_two" style="display:none">
                                    <div id="message"></div>
                                    <div class="step1-box">
                                        <h2><span>01</span><br>Gift Details</h2>
                                        <label>To</label>
                                        <p class="text" id="view_tonm"></p>
                                        <h3>A PERSONAL MESSAGE</h3>
                                        <p>Your Print-At-Home gift card will print with a blank space to allow for a handwritten note.</p>
                                        <label>From</label>
                                        <p class="text" id="view_fromnm"></p>
                                        <label>EMAIL • (For confirmation message)</label>
                                        <p class="text" id="view_fromemail"></p>
                                        <h3>GIFT CARD VALUE</h3>
                                        <div class="check-box-label">
                                            <label class="active" for="radio3" id="view_price"></label>
                                        </div>
                                    </div>
                                    <a class="edit" id="gotoback" href="#">Edit</a>
                                    <input type="submit" name="" value="" id="formconfirm">
                                    <p><i class="fa fa-lock" aria-hidden="true"></i> Until you review your order your card will not be charged.</p>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                        <div id="loaderPyament" style="display: none; position: fixed; height: 100%; width: 100%; z-index: 11111111; padding-top: 20%; background: rgba(255, 255, 255, 0.7); top: 0; text-align: center;">
                            <img src="<?php echo HTTP_ROOT . 'img/' ?>widget_loader.gif"/>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>


<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
    
   

    var crdte = new Date();
    var crdteYear = crdte.getFullYear();
    var twoDigitYear = crdteYear.toString().substr(0, 2);
    
    
    $(function () {
        $("#giftprintform").validate({
            submitHandler: function () {
                $("#stepbox_two").css("display", "block");
                $("#stepbox_one").css("display", "none");

                var to_name = $("#to_name").val();
                document.getElementById("view_tonm").innerHTML = to_name;

                var from_name = $("#from_name").val();
                document.getElementById("view_fromnm").innerHTML = from_name;

                var from_email = $("#from_email").val();
                document.getElementById("view_fromemail").innerHTML = from_email;

                var price = $("input[name='price']:checked").val();
                document.getElementById("view_price").innerHTML = '$ ' + price;
               

                
                
                if ($('#formconfirm').val() == 'Confirm') {
                    $('#formconfirm').val('Processing to payment..');
                    return true;
                } else {
                    $('#formconfirm').val('Confirm');
                    return false;
                }


            },
            rules: {
                to_name: "required",
                from_name: "required",
                from_email: {
                    required: true,
                    email: true,
                },
                price: "required",
                delivery_date: "required",
                card_holder_name: "required",
                card_number: {
                    required: true,
                },
                expire_date: "required",
                cvv: "required",
                postal_code: "required"

            },
            messages: {
                to_name: "Please enter name",
                from_name: "Please enter name",
                from_email: {
                    required: "Please enter email address",
                    email: "Please enter valid email address",
                },
                price: "Please select a Price",
                delivery_date: "Please select delivery date",
                card_holder_name: "Please enter card holder name",
                card_number: "Please enter card number",
                expire_date: "Please enter expire date",
                cvv: "Please enter cvv number",
            }
        });
    });
    $(document).ready(function () {
        $("#gotoback").click(function () {
            $("#stepbox_two").css("display", "none");
            $(".paymentErrors").html("");            
            $("#message").html("");
            $("#stepbox_one").css("display", "block");
            $('#formconfirm').val('');
        });
        
    });
</script>
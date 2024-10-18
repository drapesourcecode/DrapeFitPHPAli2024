<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Payment Now</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= HTTP_ROOT; ?>/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?= HTTP_ROOT; ?>/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?= HTTP_ROOT; ?>payment/css/style.css">
        <link rel="stylesheet" href="<?= HTTP_ROOT; ?>/css/payment-style.css" type="text/css">
        <script type="text/javascript" src="<?= HTTP_ROOT; ?>payment/js/jquery.min.js"></script>
    </head>

    <body>
        <div id="loaderPyament" style="display: none; position: fixed; height: 100%; width: 100%; z-index: 11111111; padding-top: 20%; background: rgba(255, 255, 255, 0.7); top: 0; text-align: center;">
            <img src="<?php echo HTTP_ROOT . 'img/' ?>widget_loader.gif"/>
        </div>
        <?= $this->Flash->render() ?>
        <?php $user_id = $userDetails->id; ?>

        <section class="payment">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-title">Select Payment Method</h2>
                    </div>
                    <div id="msg"></div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="card-border">

                            <div class=" faq-cat-content">
                                <div class="card-details-heading">
                                    <ul>
                                        <li><h4>Your saved debit and credit cards</h4></li>
                                        <li><p>Name </p></li>
                                        <li><p>Expires date</p></li>
                                    </ul> 
                                </div>

                                <div class="tab-pane active in fade" id="faq-cat-1">
                                    <div class="panel-group" id="accordion-cat-1w">
                                        <?php
                                        $i = 0;
                                        foreach ($savecard as $card) {
                                            $i++;
                                            $masked = str_pad(substr($card->card_number, -4), strlen($card->card_number), 'X', STR_PAD_LEFT);
                                            //echo $card->card_type;
                                            if ($card->card_type == 'Visa') {
                                                $img = 'visa.png';
                                            } elseif ($card->card_type == 'Mastercard') {
                                                $img = 'master.png';
                                            } elseif ($card->card_type == 'Maestro') {
                                                $img = 'maestro.png';
                                            } elseif ($card->card_type == 'Discover') {
                                                $img = 'discover.png';
                                            } elseif ($card->card_type == 'Amex') {
                                                $img = 'american.png';
                                            } elseif ($card->card_type == 'Jcb') {
                                                $img = 'Jcb.png';
                                            } elseif ($card->card_type == 'Unionpay') {
                                                $img = 'Unionpay.png';
                                            } elseif ($card->card_type == 'Diners') {
                                                $img = 'Diners.png';
                                            }
                                            ?>
                                            <script>
                                                function getChecked(id) {
                                                    //                                                    $('.collapse').removeClass('in');
                                                    //                                                    $('#faq-cat-1-sub-' + id).addClass('in');
                                                    $('.apply_card').prop('disabled', false);
                                                }
                                            </script>
                                            <div class="panel panel-default panel-faq">
                                                <div class="panel-heading">


                                                    <input  onclick='getChecked("<?php echo $i; ?>")' id="test<?php echo $i; ?>" type="radio" name="card-details" value="<?php echo $card->id; ?>">
                                                    <a for="test<?php echo $i; ?>">
                                                        <div class="card-list">
                                                            <ul>
                                                                <li><img src="<?php echo HTTP_ROOT . 'images/' . $img ?>"></li>
                                                                <li><h6><?php echo $card->card_name; ?> <span> ending in <?php echo $masked; ?></span></h6></li>
                                                                <li><p><span>Name: </span><?php echo $card->card_name; ?></p></li>
                                                                <li><p><span>Expires date: </span><?php echo $card->card_expire; ?></p></li>
                                                            </ul>
                                                        </div>
                                                    </a>

                                                </div>



                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>                    
                            </div>                
                        </div>


                        <div class="card-payment-option">
                            <a href="<?= HTTP_ROOT . 'api/add-card/StylefitPayment/' . $user_id; ?>" style="margin: 18px 0 0 0; display: inline-flex; align-items: center;justify-content: center;width: 120px;height: 40px;background: #ffa05a;font-weight: bold;color: #000;">Add a card</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="payment-button">                
                            <button id='paymentId' class="btn apply_card" disabled>continue</button> 
                            <p>Shipping & returns <span>Free</span></p>
                            <p>Styling fees <span>$<?= ($userDetails->is_influencer == 1) ? 1 : $main_style_fee; ?></span></p>
                            <input type="hidden" name="payableAmount" id="payableAmount" value="<?= ($userDetails->is_influencer == 1) ? 1 : $main_style_fee; ?>"/>
                            <p><strong>Includes:</strong></p>
                            <div class="con-text-box">
                                <p>Hand-selected Fits from stylist</p>
                                <p>Styling advice</p>
                                <p>Free return envelope</p>
                            </div>
                            <p class="total-box"><strong>Total: <span>$<?= ($userDetails->is_influencer == 1) ? 1 : $main_style_fee; ?></span></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
        $('#loaderPyament').show();
        setTimeout(() => {
          $('#loaderPyament').hide();
        }, "6000");

            //            $('input[name=finance]').keypress(function (e) {
            //                var getId = $('input[name=card-details]:checked').val();
            //                var cvv = $('#cvvr' + getId).val();
            //                var key = e.which;
            //                if ((key == 13) && (cvv.length == 3)) {
            //
            //
            //                    $('.apply_card').click();
            //                }
            //            });

            $('.apply_card').click(function () {

                var getId = $('input[name=card-details]:checked').val();
                var payableAmount = $('input[name=payableAmount]').val();

                if (getId) {

                    $('#loaderPyament').show();
                    $.ajax({
                        type: 'POST',
                        url: '<?= HTTP_ROOT; ?>api/payment_process', //Stripe payment process
                        dataType: "json",
                        data: {p_id: getId, payableAmount: payableAmount, user_id: <?= $user_id; ?>, kid_id:'<?= !empty($kid_id)?$kid_id:''; ?>'},
                        beforeSend: function () {
                            $("#apply_card").val('Processing....');
                        },
                        success: function (data) {
                            //alert(data.ErrorCode);
                            //console.log(data.error);
                            $("#apply_card").val('continue');
                            if (data.status == 1) {

                                // $('#loaderPyament').hide();
                                $("#apply_card").attr("disabled", true);
                                $('#paymentSection').slideUp('slow');
                                // $('#orderInfo').slideDown('slow');
                                $('#msg').html('<p class="alert alert-success">You have payment successfully.You will redirecting  page automatically after 5 seconds.Your transaction id is <span>#' + data.TransId + '</span></p>');
                                window.setTimeout(function () {
                                    window.location.href = '<?= HTTP_ROOT; ?>api/payment-success';
                                }, 10000);
                            } else if (data.error == 'error') {
                                // alert("hiisw");
                                $("#loader").show();
                                $("#loaderPyament").hide();
                                //$('#msg').html('<p class="alert alert-danger" id="e" >' + data.ErrorMessage + '</p>');
                                $('#msg').html('<p class="alert alert-danger" id="e" >' + data.ErrorCode + '</p>');
                                $('.apply_card').removeAttr("disabled");
                                window.setTimeout(function () {
                                    $('#msg').html('');
                                }, 10000);
                                if (data.redirect_url != null) {
                                    window.location.href = data.redirect_url;
                                }

                            } else if (data.ErrorCode == '210') {
                                $("#loader").show();
                                $("#loaderPyament").hide();
                                //var errorMessg = getErrorMessgeDetils(data.ErrorCode);
                                //alert(errorMessg);
                                //alert(data.ErrorCode);
                                $('#msg').html('<p class="alert alert-danger">This transaction has been declined.</p>');
                                $('.apply_card').removeAttr("disabled");
                            } else if (data.ErrorCode == '2') {
                                $("#loader").show();
                                $("#loaderPyament").hide();
                                //var errorMessg = getErrorMessgeDetils(data.ErrorCode);
                                //alert(errorMessg);
                                //alert(data.ErrorCode);
                                $('#msg').html('<p class="alert alert-danger">This transaction has been declined.</p>');
                                $('.apply_card').removeAttr("disabled");
                            } else if (data.ErrorCode == ' Error Message : The credit card has expired.\n') {
                                $("#loader").show();
                                $("#loaderPyament").hide();
                                //var errorMessg = getErrorMessgeDetils(data.ErrorCode);
                                //alert(errorMessg);
                                //alert(data.ErrorCode);
                                $('#msg').html('<p class="alert alert-danger">The credit card has expired.</p>');
                                $('.apply_card').removeAttr("disabled");
                            } else if (data.ErrorCode != '') {
                                $("#loader").show();
                                $("#loaderPyament").hide();
                                var errorMessg = getErrorMessgeDetils(data.ErrorCode);
                                //alert(errorMessg);
                                //alert(data.ErrorCode);
                                $('#msg').html('<p class="alert alert-danger">' + errorMessg + '</p>');
                                $('.apply_card').removeAttr("disabled");
                            }
                        }
                    });
                }
            });


        </script>
    </body>
</html>

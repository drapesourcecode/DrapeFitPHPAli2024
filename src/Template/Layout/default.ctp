<!DOCTYPE html>
<html lang="en-US">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta https-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="facebook-domain-verification" content="r7xejnjhx6xqehchxa6moms8vvyajv" />
        <meta name="p:domain_verify" content="c6d619c65409de8c148f099408a21acf"/>
        <title><?php echo!empty($title_for_layout) ? $title_for_layout : SITE_NAME; ?></title>
        <?php echo $this->Html->meta('keywords', (empty($metaKeyword) ? '' : $metaKeyword)); ?>
        <?php echo $this->Html->meta('description', (empty($metaDescription) ? '' : $metaDescription)); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= $this->Url->css('bootstrap.min.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?= $this->Url->css('style.css'); ?>" type="text/css">
        
        <!--<link rel="canonical" href="https://www.drapefit.com<?php echo $_SERVER['REQUEST_URI'];?>" />-->
                <!--<link rel="canonical" href="https://www.drapefit.com" />-->
        <?php  if($_SERVER['REQUEST_URI'] == "/index.php"){
        echo '<link rel="canonical" href="https://www.drapefit.com" />';
        }
        else {
        echo '<link rel="canonical"  href="https://www.drapefit.com'.$_SERVER['REQUEST_URI'].'"/>';
        }  ?>

        <!--        debasish add this link-->
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">-->
        <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>assets/css/bootstrap-datetimepicker.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/design.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/responsive-accordion.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/kidstyle.css" type="text/css">
        
         <!-- suprakash added 16-12-2020 -->
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/owl.theme.default.min.css" type="text/css">
        <!-- suprakash code end -->
        
        <script src='<?= $this->Url->script('jquery.min.js'); ?>'></script>
        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/moment-with-locales.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap-datetimepicker.js"></script>
        
        <!-- suprakash added 16-12-2020 -->
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/owl.carousel.min.js"></script>
        <!-- suprakash code end -->
        <!--end of debasish add this link-->
    
   <script type="application/ld+json">
       {"@context":"http://schema.org",
       "@type":"Organization",
       "name":"Drape Fit",
       "url":"https://www.drapefit.com/",
       "logo":"https://www.drapefit.com/img/mian-logo.png",
       "sameAs":["https://www.facebook.com/drapefitinc",
       "https://www.instagram.com/drapefitinc",
       "https://twitter.com/drapefitinc",
       "https://www.pinterest.com/drapefitinc",
       "https://www.youtube.com/channel/UC5_L5_d9ADMHQNTGpGNCG4A?view_as=subscriber"]}
   </script>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145376852-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145376852-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PH7WXHZ');</script>
<!-- End Google Tag Manager -->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '139015618043637');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=139015618043637&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>

   
    <body>
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PH7WXHZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
        

        <?= $this->element('frontend/header'); ?>
<style type="text/css">
    .drafit-poppup .modal-dialog {
        max-width: 1020px;
        width: 861px;
    }

    .drafit-poppup .modal-content {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100% !important;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: .3rem;
        outline: 0;
    }
    .drafit-poppup .modal-content {
        border-radius: 0;
        padding: 0;
    }
    .drafit-poppup .modal-body {
        padding: 0;
        position: relative; 
    }
    .drafit-poppup .section-title {
        padding-bottom: 20px; 
    }
    .drafit-poppup .section-title p {
        font-size: 18px; 
    }
    .drafit-poppup .drafit-text {
        padding: 35px 45px 0px 0px;
    }
.drafit-poppup .drafit-text_1 {
    /*padding: 59px 21px;*/
}
   .drafit-poppup .drafit-subscribe h3 {
        font-size: 22px;
        font-weight: 700;
        padding-bottom: 18px; 
    }
    .drafit-poppup .drafit-subscribe input {
        width: 100%;
        height: 55px;
        padding: 15px; 
    }
    .drafit-poppup .drafit-subscribe .promo-form .cart-btn {
        height: 55px;
        margin-top: 20px;
        border-radius: 0;
        line-height: 55px;
        margin-bottom: 15px; 
    }

    .drafit-poppup .modal-dialog {
        margin: 10.75rem auto; 
    }

    .promo-popup_2 .drafit-text,
    .drafit-popup_3 .drafit-text {
        top: 50%;
        right: 0;
        padding-top: 0;
        max-width: 450px;
        position: absolute;
        transform: translateY(-50%); 
    }
    .promo-popup_2 .section-title h2,
    .drafit-popup_3 .section-title h2 {
        margin-bottom: 0;
        font-size: 60px;
        line-height: 1.2; 
    }

    .drafit-popup_3 .drafit-text {
        right: 0;
        left: 0;
        max-width: 660px;
        margin: 0 auto; 
    }
    .drafit-popup_3 .section-title {
        padding-bottom: 5px; 
    }
    .drafit-popup_3 .section-title h2 {
        font-size: 60px; 
    }
    .drafit-popup_3 .drafit-subscribe .promo-form .cart-btn {
        top: 0;
        right: 0;
        margin: 0;
        position: absolute; 
    }
    .drafit-popup_3 .drafit-subscribe h3 {
        font-size: 30px;
        padding-bottom: 10px; 
    }
    .drafit-popup_3 .get-back {
        float: right;
        margin-top: 15px; 
    }
    .drafit-close {
        top: -33px;
        z-index: 1;
        padding: 0;
        width: 35px;
        color: #fff;
        right: -30px;
        height: 35px;
        border-radius: 50%;
        border: 2px solid #fff;
        font-size: 22px;
        /* line-height: 34px; */
        position: absolute;
        background: #ff6c00;
        outline: none;
    }
    .drafit-close:hover {
        color: #fff; 
    }
    .drafit-close span {
        line-height: 0;
        position: relative;
        top: 0px;
    }

    button.drafit-close.third-bg {
        outline: none;
    }
    .drafit-img img {
        width: 100%;
    }
.drafit-img {
    /*height: 422px;*/
    overflow: hidden;
}
    .modal-dialog {
        max-width: 500px;
        margin: 4.75rem auto !important;
    }
    .drafit-poppup .section-title a {
        display: block;
        text-align: center;

        padding: 10px 10px;
        margin-bottom: 10px;
        font-size: 18px;
        color: #fff;
        font-weight: 400;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        transition: 0.9s;
    }
    .color-gggg{
        background: #232f3e;
        border: 1px solid #232f3e;
    }
    .color-gggg:hover {
        border: 1px solid #ff6c00;
        color: #ff6c00 !important;
        transition: 0.9s;
        background: none;
    }
    .colo-drft{
        background: #ff6c00 ;
        color: #fff;
        text-decoration: none;

    }
    .colo-drft:hover{
        background: #232f3e;
        color:  #ff6c00;
        transition: 0.9s;
    }
    h3.df-head {
        font-size: 18px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        color: #ff6c00;
        position: relative;
        /* top: 14px; */
        text-align: center;
    }
    h2.dfg-head {
        font-size: 25px;
        text-align: center;
        font-weight: 700;
        color: #232f3e;
        /*text-shadow: 1px 3px #bbb8b5; */
        /*margin-bottom: 30px;*/
        font-family: 'Poppins', sans-serif;
    }
    .drift-thank{
        float: left;
        width: 100%;
        text-align: center;

    }
    .drift-thank a {
        font-size: 17px;
        color: #000000;
        font-weight: 400;
        font-family: 'Poppins', sans-serif;
    }
@media only screen and (max-width: 991px){
    .drafit-img {
    height: auto;
    overflow: hidden;
}
}
@media only screen and (max-width: 767px){
.drafit-poppup .modal-dialog {
    max-width: 1020px;
    width: 585px;
}
.drafit-img {
    height: auto;
    overflow: hidden;
}
}
@media only screen and (max-width: 500px){
.drafit-poppup .modal-dialog {
    max-width: 1020px;
    width: 430px;
}
.drafit-poppup .drafit-text_1 {
    padding: 1px 21px 7px;
    float: left;
    width: 100%;
}
.drafit-poppup .section-title {
    padding-bottom: 10px;
}
.drift-thank a {
    font-size: 15px;
    color: #0098ff;
    font-weight: 400;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 5px;
    display: inline-block;
}
.drafit-poppup .section-title a {
    font-size: 15px;
}
h3.df-head {
    font-size: 16px;
}
h2.dfg-head {
    font-size: 24px;
    margin-bottom: 0;
    margin-top: 15px;
}
.drafit-poppup .section-title p {
    font-size: 15px;
}
.mc-field-group input {
    height: 38px;
}
input#mc-embedded-subscribe {
    width: 100%!important;
    height: 40px!important;
    border-radius: 100px!important;
    font-size: 14px !important;
}
h3.df-head {
    font-size: 16px;
    margin-top: 0;
    margin-bottom: 0;
}
}


@media only screen and (max-width: 480px){
.drafit-poppup .modal-dialog {
    max-width: 1020px;
    width: 407px;
}
.drafit-poppup .section-title a {
    font-size: 15px;
}
h2.dfg-head {
    font-size: 20px;
}
h3.df-head {
    font-size: 15px;
}
/*.drafit-poppup .drafit-text_1 {
    padding: 48px 21px 71px;
}*/
.drift-thank a {
    font-size: 14px;
}
}
@media only screen and (max-width: 430px){
.drafit-poppup .modal-dialog {
    max-width: 1020px;
    width: 357px;
}
.drafit-poppup .modal-dialog {
    max-width: 820px;
    width: 353px !important;
}
}

@media only screen and (max-width: 411px){
.drafit-poppup .modal-dialog {
    max-width: 820px;
    width: 337px !important;
}
}
@media only screen and (max-width: 400px){
/*.drafit-poppup .modal-dialog {
    max-width: 1020px;
    width: 325px;
}*/
.drafit-poppup .modal-dialog {
    max-width: 820px;
    width: 325px !important;
}
}
@media only screen and (max-width: 375px){
.drafit-poppup .modal-dialog {
    max-width: 820px;
    width: 298px !important;
}
h2.dfg-head {
    font-size: 16px;
}
.drafit-poppup .section-title p {
    font-size: 13px;
}
h3.df-head {
    font-size: 13px;
}
.drift-thank a {
    font-size: 12px;
}
}

@media only screen and (max-width: 370px){
.drafit-poppup .modal-dialog {
    max-width: 1020px;
    width: 287px;
}
h2.dfg-head {
    font-size: 15px;
}
.drafit-poppup .drafit-text_1 {
    padding: 1px 10px 7px;
}
#mc_embed_signup form {
    padding: 0px !important;
}
h2.dfg-head {
    font-size: 15px;
    margin-bottom: 10px;
}
.drafit-poppup .section-title p {
    font-size: 13px;
    margin-bottom: 0;
}
h3.df-head {
    font-size: 12px;
}
.drafit-img {
    height: 206px;
    overflow: hidden;
    position: relative;
}
.drafit-img{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
}
@media only screen and (max-width: 320px){
.drafit-poppup .modal-dialog {
    max-width: 1020px;
    width: 245px !important;
}
}

#chat-button {
    display: none !important;
}
</style>
<script>
    function noclick() {
        var url = $('#pageurl').val();
        $('#exampleModal').modal('hide');
    }
</script>
<div class="drafit-poppup">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class=" drafit-close third-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="drafit-img">
                                <img src="<?php echo HTTP_ROOT ?>img/summer2023.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" drafit-text pera-content drafit-text_1">
                                <div class="section-title pera-content headline">
                                    <!--<h3 class="df-head" style="color: #232f3e;font-size: 20px;"> Drape Fit Unboxed Offer!  </h3>-->
                                    <!--<h3 class="df-head" style="color: #232f3e;font-size: 20px;"> Outfits Start From <b style="color:#ff6c00">$9.99!</b> </h3>-->
                                    <h2 class="dfg-head">SUBSCRIBE & SAVE!</h2>
                                    
                                     
<!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
  #mc_embed_signup{ clear:left; font:14px Helvetica,Arial,sans-serif; }
  /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div class="footer-subscribe" style="text-align: center;
padding: 50px 0 40px;display: contents;
background-color: #fff;">
<div id="mc_embed_signup" style="margin:auto;">
<form action="https://drapefit.us4.list-manage.com/subscribe/post?u=c4d312025b5781525c229b745&amp;id=0d6810bbe6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll" style="margin-bottom: 40px;">
  <!--<h2>Join the Drape Fit Community</h2>-->
<!--<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>-->
<P>Enter your email for 25% off your FIT Box.</P>
<div class="mc-field-group">
  <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
  <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
  <div id="mce-responses" class="clear">
    <div class="response" id="mce-error-response" style="display:none"></div>
    <div class="response" id="mce-success-response" style="display:none"></div>
  </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_c4d312025b5781525c229b745_0d6810bbe6" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
</div>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->


                                    
                                    
                                    
                                    <!--<a class="colo-drft" href="<?php echo HTTP_ROOT ?>gifts" >Get Your Gift Card</a>-->
                                    <!--<a class="color-gggg" href="<?php echo HTTP_ROOT ?>">Get 25% Off</a>-->
                                     <h3 class="df-head">Treat Yourself This Summer!</h3>
                                </div>
                                <div class="drift-thank">
                                    <a  onclick = 'noclick()' href="javascript:void(0)">No Thanks, Continue</a>
                                </div>
                                <!-- <div class="drafit-subscribe pera-content">
                                    <h3>Subscribe For Discount Coupon:</h3>
                                    <div class="promo-form">
                                        <form action="#" method="post">
                                            <input class="email" name="email" type="email" placeholder="Enter your email address">
                                              <div class="cart-btn third-bg text-center text-capitalize">
                                              <a href="#">Get Coupon</a>
                                              </div>
                                        </form>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script>
    jQuery(document).ready(function () {
        var chk_popup = checkCookiePopup('ofr_popup');
        setTimeout(function () {
            if (chk_popup) {
                $('#exampleModal').modal('hide');
            } else {
                 $('#exampleModal').modal('show');
            }
            setCookiePopup("ofr_popup", 'popup_opened', 1);
        }, 1500);
    });
    function setCookiePopup(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";SameSite=None; Secure;" + expires + ";path=/";
    }

    function getCookiePopup(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function checkCookiePopup(name) {
        let ofr_popup = getCookiePopup(name);
        if (ofr_popup != "") {
            return ofr_popup;
        } else {
            return  false;
        }
    }

</script>

        <?= $this->fetch('content'); ?>

        <?php //echo $this->request->session()->read('CHAT_BUTTON'); exit;?>
        
        <?php   if (@$this->request->session()->read('Auth.User.id')=='') {?>
<style>

    .chat-form-new .chat-login {
        width: 300px;
        float: left;
        background: #dedede;
        position: fixed;
        border-radius: 14px 14px 4px 4px;
        bottom: 0;
        right: 10px;
        z-index: 11111;
    }
    /** .chat-form-new .chat-login form{
                padding: 20px 24px;
    } **/
    .chat-form-new .chat-login form {
        padding: 12px 17px;
        float: left;
        width: 100%;
        padding-bottom: 0;
    }
    .chat-form-new input[type=text] {
        width: 100%;
        margin-bottom: 11px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background: #fff;
        margin-top: 0;
    }
    .chat-form-new .chat-top {
        background: #232f3e;
        padding: 10px 18px;
        color: #fff;
        font-size: 19px;
        text-align: left;
        width: 100%;
        border-radius: 17px 17px 0 0;
        font-weight: bold;
        position: relative;
        cursor: pointer;
    }
    .chat-form-new .chat-top .ico-pl-min {
        position: absolute;
        height: 100%;
        width: 60px;
        top: 0;
        right: 0;
    }
    .chat-form-new .chat-top .ico-pl-min span {
        top: 14px;
        display: inline-block;
        font-size: 18px !important;
        position: absolute;
        width: 30px;
        text-align: center;
        left: -17px;
        top: 0;
        height: 100%;
        padding-top: 12px;
        cursor: pointer;
        display: inline-block;
    }
    .chat-form-new .chat-top .ico-pl-min span.minus{
        display: none;
    }
    .chat-form-new .chat-top.highlight .ico-pl-min span.minus {
        display: inline-block;
    }
    .chat-form-new .chat-top.highlight .ico-pl-min span.close-b{
        display: none;
    }
    .chat-form-new .chat-form label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 21px;
        font-weight: 700;
        width: 100%;
        float: left;
    }
    .chat-form-new button, .chat-form-new  input, .chat-form-new  select, .chat-form-new  textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        width: 100% !important;
        border-radius: 3px;
    }
    .chat-form-new #start {
        float: left;
        clear: both;
        width: 100%;
        padding-top: 7px;
        padding-bottom: 20px;
    }
    .chat-form-new .btn-primary {
        color: #313131;
        background-color: #dedede;
        /* border-color: #dedede; */
        font-size: 18px;
        border: dotted 2px #232f3e;
        width: 100%;
        display: inline-block;
        position: relative;
        padding: 11px 0;
        height: 50px;
        cursor: pointer;
    }
    .chat-form-new .btn-primary input[type="file"]{
        position: absolute;
        opacity: 0;
        width: 100% !important;
        height: 100%;
        top: 0;
        cursor: pointer;
        left: 0;
    }
    .chat-form-new .chat-form-new i.fa.fa-paperclip {
        position: absolute;
        bottom: 123px;
        left: 118px;
        font-size: 17px;
    }
    .chat-form-new .chat-login textarea#subject {
        height: 65px;
        border: 1px solid #ccc;
    }
    .chat-form-new .chat-login .btn-primary:hover {
        color: #fff;
        background-color: #232f3e;
        border-color: #cbe2ff;
    }

    .chat-form-new input[type=submit] {
        background-color: #232f3e!important;
        color: white;
        padding: 13px 20px;
        border: none;
        width: 33% !important;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
    }
    .chat-form-new [type=submit]:hover {
        background-color: #45a049;
    }
    .chat-form-new .cans {
        width: 100%;
        float: right;
        text-align: right;
        margin-bottom: 0px;
    }
    .chat-form-new .cans a{
        text-decoration: none;
        color: #232f3e;
    }
    .chat-form-new .cans a:hover{
        text-decoration: none;
        color: #232f3e;
    }
    .chat-form-new .cans span {
        width: 37%;
        display: inline-block;
        margin-left: 14px;
        text-align: left;
        font-size: 16px;
        color: #232f3e;
        margin-bottom: 20px;
        text-align: center;
        background: #dedede;
        padding: 11px 0;
        border-radius: 4px;
        border: solid #232f3e 1px;
    }
    .chat-form-new .chat-top .ico-pl-min span.fullclose {
    left: 16px;
}
.chat-form-new .chat-top .ico-pl-min span.fullclose .fa{
    font-size: 19px;
}
</style>


<div class="chat-form-new" id="chat-help" style="display: none;">
    <div class="chat-login">
        <?php /* ?>
        <!--<div class="chat-top" data-toggle="collapse" data-target="#demo">Leave us a messagee<div class="ico-pl-min"><span class="minus"><i class="fa fa-plus"></i></span><span class="close-b"><i class="fa fa-minus"></i></span><span class="fullclose" id="close-bt"><a href="<?php echo HTTP_ROOT . 'help-close' ?>" style="color: #fff;"><i class="fa fa-times"></i></a></span></div></div>-->
        <div id="demo" class="collapse in">
            <?php echo $this->Form->create('', ['type' => 'file', 'url' => ['controller' => 'users','action' => 'index'],'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'chatHelp', 'class' => "chatHelp"]); ?>
            <label for="fname">Your name (optional)</label>
            <input type="text" id="fname" name="firstname" placeholder="">
            <label for="email">Email address</label>
            <input type="text" id="email" name="email" placeholder="">
            <label for="subject">How can we help you?</label>
            <textarea id="subject" name="subject" placeholder=""></textarea>
            <div id="start">
                <label for="subject">Attachments</label>
                <div id="notimage" class="hidden">Please select an image</div>
                <span id="file-upload-btn" class="btn btn-primary">
                    <input type="file" name="itmes[]" multiple=""  id ="image_upload">
                    <span id="image_upload-span">
                        <i class="fa fa-paperclip"></i> Add up to 5 files
                    </span>
                </span>
            </div>
            <div class="cans"> 
                <span><a id="cancel-bt" href="<?php echo HTTP_ROOT . 'help-close' ?>">Cancel</a></span>
                <input type="submit" value="Send" name="submit" class="submit">
            </div>
            <?= $this->Form->end(); ?>
        </div>
        <?php */ ?>
    </div>
</div>

<div class="chat-form-new" id="chat-helpsuccess" style="display: none;">
    <div class="chat-login">
        <div class="chat-top" >Message send successfully </div>
          <?php /* ?>
        <div id="demo2">
            <form>
            <p><h3>Thank you for reching out</h3></p>
            <p>We will back to you soon</p>
            <div class="cans"> 
                <span><a href="<?php echo HTTP_ROOT . 'help-close' ?>">Close</a></span>
            </div>
            </form>
        </div>
        <?php */ ?>
    </div>


</div>

<script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'></script>
<script>
    $(".chat-top").click(function () {
        $(this).toggleClass("highlight");
    });
</script>
<script type="text/javascript">
    $('docoment') .on('click','#close-bt', function(){
        $('#cancel-bt').click();
    });
</script>
<script>
    $(function () {

        var // Define maximum number of files.
                max_file_number = 5,
                // Define your form id or class or just tag.
                $form = $('form'),
                // Define your upload field class or id or tag.
                $file_upload = $('#image_upload', $form),
                // Define your submit class or id or tag.
                $button = $('.submit', $form);

        // Disable submit button on page ready.
        $button.prop('disabled', 'disabled');

        $file_upload.on('change', function () {
            var number_of_images = $(this)[0].files.length;
            //alert(number_of_images);
            $('#image_upload-span').html('<i class="fa fa-paperclip"></i> ' + number_of_images + ' files');

            if (number_of_images > max_file_number) {
                alert(`You can upload maximum ${max_file_number} files.`);
                $(this).val('');
                $button.prop('disabled', 'disabled');
            } else {
                $button.prop('disabled', false);
            }
        });
    });

    $("#chatHelp").validate({
        rules: {
            firstname: {
                required: true,
            },
            subject: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            firstname: {
                required: "Please your  name"
            },

            subject: {
                required: "Please add your message"
            },
            email: {
                required: "Please enter your email address",
                email: 'Please add valid email address'
            },
        },
    });
</script>
<?php if ($this->request->session()->read('help-active') == 1) { ?>
    <script>
        $(function () {
            $('#chat-help').show();
            $('.live-chat-side').hide();
        });
    </script>
<?php } else { ?>
    <script>
        $(function () {
            $('#chat-help').hide();
           
        });
    </script>
<?php } ?>
<?php if ($this->request->session()->read('help-active') == 2) { ?>
    <script>
        $(function () {
            $('#chat-helpsuccess').show();
             $('.live-chat-side').hide();
        });
    </script>
<?php } else { ?>
    <script>
        $(function () {
            $('#chat-helpsuccess').hide();
        });
            </script
    <?php } ?>

<?php } ?>

        <?= $this->element('frontend/footer'); ?>
        <?= $this->element('frontend/footer-copy-right'); ?>

        <input type="hidden" id="pageurl" value="<?php echo HTTP_ROOT ?>"/>
    </body>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker4').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker5').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        });
    </script>
     <script type="text/javascript">
    // TESTIMONIALS SLIDER STYLE 2  suprakash added//
			$(".owl-carousel.testimonials-slider.style-2").owlCarousel({
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				smartSpeed: 500,
				loop: true,
				nav: false,
				navText: false,
				dots: true,
				mouseDrag: true,
				touchDrag: true,
				margin: 30,
				responsive: {
					0:{
						items: 1
					},
					768:{
						items: 1
					},
					992:{
						items: 1
					}
				}
			});
    </script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
"use strict";
$('#banner').owlCarousel( {
    loop: true,
    center: true,
    items: 1,
    margin: 30,
    autoplay: true,
    dots:true,
    nav:true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    smartSpeed: 450,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 1
      },
      1170: {
        items: 1
      }
    }
  });
});
  </script>

</html>
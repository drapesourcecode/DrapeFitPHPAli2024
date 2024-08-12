<style>
    .banner-box{
        float: left;
        width: 100%;
        background: url(<?php echo HTTP_ROOT ?>images/banner-final1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        padding: 7% 0px;
        position: relative;
    }
    .banner-box.footer-inner-banner2{
        background: url(<?php echo HTTP_ROOT ?>/images/footer-banner2.jpg);
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
                        <li><a href="<?php echo HTTP_ROOT?>">Home</a></li>
                        <li><b>></b></li>
                        <li>Gifts Success</li>
                    </ul>
                    <h2>Gifts Success</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="sucess-main-boxes">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1><span><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>Thank You</h1>
                    <p>An email receipt is being send.</p>
                    <a href="<?php echo HTTP_ROOT?>">Back to home Page</a>
                </div>
            </div>
        </div>
    </section>
</section>

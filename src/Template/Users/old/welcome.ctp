<?= $this->Flash->render(); ?>
<link rel="stylesheet" href="<?php echo HTTP_ROOT . 'assets/' ?>profile-style.css" type="text/css">
<script type="text/javascript" src="<?= HTTP_ROOT; ?>js/setting.js"></script>
<script src="<?= HTTP_ROOT; ?>js/jquery.twbs-toggle-buttons.min.js"></script>
<script>
//$('#tall_feet-error').focus();
</script>
<style type="text/css">
    /*new code*/
    .setting-box{
        padding-top:0px;
    }
    .btn-success.disabled, .btn-success[disabled]{
        background-color: #e9aed7;
        border-color: #f0cae4;
    }
    .address
    {
        width: 100%;
        float: left;
        text-align: center;
        display: inline-block;
    }
    .address-box
    {
        width: 50%;
        text-align: left;
        display: inline-block;
    }
    .address-box, .add-address h2
    {
        margin: 15px 0px;
        padding: 0;
        text-align: left;
        font-size: 20px;
        font-weight: 700;
    }
    .address-box h3
    {
        margin: 15px 0px;
        padding: 0;
        font-size: 17px;
        font-weight: 700;
        display: inline-block;
    }
    .address-box p
    {
        width: 95%;
        font-size: 14px;
        font-weight: bold;
    }
    .address-box label
    {
        width: 100%;
        font-size: 14px;
        margin-top: 5px;
        font-weight: 600;
        display: inline-block;
    }
    .address-box select
    {
        width: 100%;
        float: left;
        background: #ececec;
        padding: 5px 10px;
        margin-bottom: 10px;
        border-radius: 3px;
        border: 1px solid #9a9a9a;
    }
    .address-box input
    {
        width: 100%;
        float: left;
        margin-bottom: 5px;
        padding: 5px 10px;
        border-radius: 3px;
        border: 1px solid #9a9a9a;
    }
    .address-box button
    {
        display: inline-block;
        background: #d64ade;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 2px;
        color: #fff;
        font-size: 17px;
        padding: 11px 43px;
        border-radius: 25px;
        margin-top: 10px;
        transition: 500ms all ease-in-out 0s;
    }
    .address-box button:hover
    {
        border: 1px solid #333;
        background: #333;
        color: #fff;
    }
    .address-box, .add-address span
    {
        font-size: 14px;
        color: #4c4c4c;
        font-weight: normal;
    }
    .address-box span a,
    .add-address span a
    {
        font-size: 14px;
        color: #4c4c4c;
        text-decoration: none;
    }
    .add-address
    {
        width: 100%;
        float: left;
        text-align: left;
        margin: 15px 0px;
    }
    .add-address ul
    {
        margin: 0;
        padding: 0;
        display: inline-block;
    }
    .add-address ul li
    {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px;
        margin-left: 30px;
        text-align: left;
        border-radius: 3px;
        border: 2px solid #ccc;
    }
    .add-address ul li h4
    {
        padding: 0;
        margin: 0;
        margin-bottom: 5px;
        text-align: left;
        color: #000;
        font-size: 15px;
        font-weight: 700;
        display: inline-block;
    }
    .add-address ul li i
    {
        width: 100%;
        font-size: 50px;
        color: #ccc;
    }
    .add-address ul li h3
    {
        margin: 15px 0px;
        padding: 0;
        color: #ccc;
        font-size: 20px;
        font-weight: 700;
        display: inline-block;
    }
    .add-address ul li p
    {
        margin: 3px 0px;
        padding: 0;
        font-size: 13px;
        line-height: 19px;
        font-weight: 600;
    }
    .add-address ul li span
    {
        font-size: 12px;
        margin-top: 50px;
        display: inline-block;
    }
    .add-address ul li span a
    {
        color: #0089ff;
        font-size: 13px;
    }
    .add-address ul li:first-child
    {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 65px;
        margin-left: 0px;
        text-align: center;
        border-radius: 3px;
        border: 2px dashed #ccc;
    }
    .add-address ul li:nth-child(3n+1) {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px !IMPORTANT;
        margin-left: 0px;
        text-align: center;
        border-radius: 3px;
        border: 2px solid #ccc;
        margin-top: 20px;
    }
    /*new code*/
    .hide{
        display: none;
    }
    .active{
        display: block;
    }

    .tooltip{
        position:relative;
        float:right;
    }
    .tooltip > .tooltip-inner {
        background-color: #eebf3f;
        padding:5px 15px;
        color:rgb(23,44,66);
        font-weight:bold;
        font-size:13px;
    }
    .popOver + .tooltip > .tooltip-arrow {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #eebf3f;
    }

    .progress{
        border-radius:0;
        overflow:visible;
        height: 5px;
    }
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
        font-size: 17px;
        color: #000;
        text-align: left;
        font-weight: bold;
        margin-bottom: 0px;
    }
    .save-card h3 span{
        font-size: 15px;
        display: inline-block;
        width: 31%;
        float: right;
    }
    .content_accordion{
        float: left;
        width: 100%;
        text-align: left;
    }
    .content_accordion .panel-heading h4{
        position: relative;
        border: 1px solid #d6d6d6;
        box-shadow: none;
        background: none;
    }
    .content_accordion .panel-heading h4 .expair {
        float: right;
        width: 30%;
        font-size: 13px;
        padding-top: 5px;
    }
    .content_accordion .panel-heading h4 span {
        display: inline-block;
        margin-left: 19px;
        position: relative;
        top: 1px;
        font-size: 13px;
    }
    .content_accordion .panel-heading h4 img{
        width: 38px;
    }
    .content_accordion .panel-heading h4 .fas{
        position:absolute;
        right: 20px;
        top: 15px;
        float: right;
        font-size: 25px;
        transition: 500ms all ease-in-out 0s;
    }
    .content_accordion .panel-heading h4 a.collapsed .fas{
        transition: 500ms all ease-in-out 0s;
        transform: rotate(180deg);
    }
    .panel-body h4{
        font-weight: bold;
        font-size: 17px;
        color: #000;
    }
    .panel-body-left{
        float: left;
        width:70%;
    }
    .panel-body-right{
        float: left;
        width:30%;
    }
    .panel-body-button{
        float: left;
        width: 100%;
        text-align: right;
    }

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
    .panel-body-button span {
        display: inline-block;
        background: #d64ade;
        border: 1px solid #d64ade;
        padding: 5px 26px;
        color: #fff;
        border-radius: 15px;
    }
    .panel-body-button span:hover{
        background: none;
        color: #d64ade;
        border-color: #c948d0;
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
    .payment-method-box h4{
        color: #000;
        float: left;
    }
    .payment-method-box h4 span{
        display: block;
        color: #000;
        font-weight: normal;
        font-size: 15px;
        color: #616161;
        margin-top: 10px;
    }
    .payment-method-box img{
        float: right;
    }
    .panel-default > .panel-heading + .panel-collapse > .panel-body {

        border-top-color: #EEEEEE;
        border: 1px solid #c8c8c8;

    }
    .payment-method h3{
        border-bottom: 1px solid #ccc;
        margin-bottom: 15px;
        padding-bottom: 6px;
        font-size: 21px;
    }
    #demo ul{
        display: inline-block;
        width: 100%;
    }
    #demo ul li{
        display: inline-block;
        width: 24%;
    }
    #demo ul li label {

        width: 100%;
        margin-bottom: 7px;
        font-size: 15px;

    }
    #demo ul li:nth-child(3){
        width:135px;
    }
    #demo ul li input[type="submit"]{
        background: #d64ade;
        color: #fff;
        border: 1px solid #a616ae;
        border-radius: 4px;
        padding: 3px 17px 4px;
    }
    #demo{
        padding-top: 14px;
    }
    .add-new{
        cursor: pointer;
    }
    .form-box-data .date-box input::placeholder {
        text-transform: lowercase !important;
    }
</style>
<style>
    .address
    {
        width: 100%;
        float: left;
        text-align: center;
        display: inline-block;
    }
    .address-box
    {
        width: 50%;
        text-align: left;
        display: inline-block;
    }
    .address-box, .add-address h2
    {
        margin: 15px 0px;
        padding: 0;
        text-align: left;
        font-size: 20px;
        font-weight: 700;
    }
    .address-box h3
    {
        margin: 15px 0px;
        padding: 0;
        font-size: 17px;
        font-weight: 700;
        display: inline-block;
    }
    .address-box p
    {
        width: 95%;
        font-size: 14px;
        font-weight: bold;
    }
    .address-box label
    {
        width: 100%;
        font-size: 14px;
        margin-top: 5px;
        font-weight: 600;
        display: inline-block;
    }
    .address-box select
    {
        width: 100%;
        float: left;
        background: #ececec;
        padding: 5px 10px;
        margin-bottom: 10px;
        border-radius: 3px;
        border: 1px solid #9a9a9a;
    }
    .address-box input
    {
        width: 100%;
        float: left;
        margin-bottom: 5px;
        padding: 5px 10px;
        border-radius: 3px;
        border: 1px solid #9a9a9a;
    }
    .address-box button
    {
        background: #d64ade;
        cursor: pointer;
        padding: 7px 35px;
        font-size: 14px;
        border: 1px solid #d64ade;
        font-weight: 600;
        border-radius: 3px;
        color: #333;
        margin-top: 30px;
        margin-bottom: 30px;
        letter-spacing: 1px;
    }
    .address-box button:hover
    {
        border: 1px solid #333;
        background: #333;
        color: #fff;
    }
    .address-box, .add-address span
    {
        font-size: 14px;
        color: #4c4c4c;
        font-weight: normal;
    }
    .address-box span a,
    .add-address span a
    {
        font-size: 14px;
        color: #4c4c4c;
        text-decoration: none;
    }
    .add-address
    {
        width: 100%;
        float: left;
        text-align: left;
        margin: 15px 0px;
    }
    .add-address ul
    {
        margin: 0;
        padding: 0;
        display: inline-block;
    }
    .add-address ul li
    {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px;
        margin-left: 30px;
        text-align: left;
        border-radius: 3px;
        border: 2px solid #ccc;
        margin-top: 20px;
    }
    .add-address ul li h4
    {
        padding: 0;
        margin: 0;
        margin-bottom: 5px;
        text-align: left;
        color: #000;
        font-size: 15px;
        font-weight: 700;
        display: inline-block;
    }
    .add-address ul li i
    {
        width: 100%;
        font-size: 50px;
        color: #ccc;
    }
    .add-address ul li h3
    {
        margin: 15px 0px;
        padding: 0;
        color: #ccc;
        font-size: 20px;
        font-weight: 700;
        display: inline-block;
    }
    .add-address ul li p
    {
        margin: 3px 0px;
        padding: 0;
        font-size: 13px;
        line-height: 19px;
        font-weight: 600;
    }
    .add-address ul li span
    {
        font-size: 12px;
        margin-top: 50px;
        display: inline-block;
    }
    .add-address ul li span a
    {
        color: #0089ff;
        font-size: 13px;
    }
    .add-address ul li:first-child
    {
        width: 300px !important;
        height: 240px !important;
        display: inline-block !important;
        float: left !important;
        padding: 65px !important;
        margin-left: 0px !important;
        text-align: center!important;
        border-radius: 3px!important;
        border: 2px dashed #ccc !important;
        margin-top: 20px !important;
    }
    .add-address ul li:nth-child(3n+1) {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px;
        margin-left: 0px;
        text-align: center;
        border-radius: 3px;
        border: 2px solid #ccc;
        margin-top: 20px;
    }

    #shirt_blouse_recomend-error{
        top:13px;
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

<div class="pogress-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progressbar_count->is_progressbar; ?>" aria-valuemin="0" aria-valuemax="50" >   

                        <span  class="popOver" data-toggle="tooltip" data-placement="top" title="<?php echo $progressbar_count->is_progressbar; ?>%"> </span>     

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if ($slug == 'schedule') {
    if ($this->request->session()->read('PROFILE') == 'KIDS') {
        ?>
        <div class="schedule-box">
            <div class="container">
                <div class="row ">
                    <div class="col-sm-9 col-lg-9 col-md-9 setting-box setting-box2">
                        <div class=" tab-content">
                            <?php echo $this->Form->create("User", array('url' => ['controller' => 'users', 'action' => 'welcome/schedule'], 'data-toggle' => "validator", 'id' => 'sechdule')) ?>
                            <div role="tabpanel" class="tab-pane fade active in satya" >
                                <h5>Manage FIT settings</h5>
                                <h6>How often would you like to receive Fixes?</h6>
                                <div class="checkbox-sitting" style="display:none;">
                                    <input onclick="getCheckBox()" id="try_new_items_with_scheduled_fixes12" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '0') { ?>  <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '') { ?> checked <?php } ?> >
                                    <label for="try_new_items_with_scheduled_fixes12">Try new items with scheduled Fixes.</label>
                                </div>
                                <div id="optionsDIV"
                                <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?>
                                         style='display: block;'
                                     <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '0') { ?>
                                         style='display: none;'
                                     <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '') { ?>
                                         style='display: block;'
                                     <?php } else { ?>
                                         style='display: none;'
                                     <?php } ?>

                                     >
                                    <ul>
                                        <li>
                                            <input class="radio-box" value="1" <?php if ((@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) || (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == '')) { ?> checked <?php } ?>  name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes1" type="radio" >
                                            <label for="how_often_would_you_lik_fixes1">
                                                <h5>Every Monthly</h5>
                                                <p>Will ship hand picked products in every month</p>
                                            </label>
                                        </li>
                                        <li>

                                            <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked  <?php } ?> name="how_often_would_you_lik_fixes" type="radio">
                                            <label for="how_often_would_you_lik_fixes2">
                                                <h5>Every 2 months</h5>
                                                <p>Will ship hand picked products in every month.</p>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="radio-box" value="3" id="how_often_would_you_lik_fixes3" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?>  name="how_often_would_you_lik_fixes" type="radio">
                                            <label for="how_often_would_you_lik_fixes3">
                                                <h5>Every 3 months</h5>
                                                <p>Try a FIT in every three months.</p>
                                            </label>
                                        </li>

                                    </ul>
                                    <p>Until you cancel your Fit Schedule we will charge a styling Fees 
                                        $<?= ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $main_style_fee; ?>
                                        depends on your style delivery frequency.</p>
                                </div>
                                <div class="tab-button">
                                    <input type='hidden' name='kid_id' value='<?php echo @$kidsData->id; ?>'/>
                                    <button name="first_time_fix" value ='first_time_fix' class="btn-boxes" type="Submit">Continue </button>

                                </div>            
                            </div>
                            <?php echo $this->Form->end(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if ($this->request->session()->read('PROFILE') == '') { ?>
        <style type="text/css">
            .select-service-main
            {
                width: 100%;
                margin-top:130px;
                float:left;
                text-align: center;
                margin-bottom: 23px;
            }
            .select-service
            {
                width: 42%;
                float:none;
                padding:15px;
                border: 2px solid #ccc;
                text-align: center;
                margin: 0 auto;
            }
            .select-service-images
            {
                width: 100%;
                float: left;
                border-top: 2px solid #ff6c00;
                margin-top: 20px;
                padding-top: 20px !important;
                margin-bottom: 20px;
            }
            .select-service-images img
            {
                width: 49%;
            }
            .select-service-text
            {
                width: 90%;
                float: none;
                padding: 10px;
                text-align: center;
                margin: 0 auto;
            }
            .select-service-text h2
            {
                font-size: 25px;
                font-weight: 600;
                margin: 0px;
                margin-bottom: 15px;
                margin-top: 15px;
                display: inline-block;
                font-family: "Amazon Ember", Arial, sans-serif;
            }
            .select-service-text p
            {
                margin: 0px;
                font-size: 14px;
                font-weight: normal;
                margin-bottom: 15px;
                font-family: "Amazon Ember", Arial, sans-serif;
            }




            .select-service-button
            {
                width: 100%;
                float: none;
                padding: 10px 0 30px;
                text-align: center;
                background: #fff;
                margin: 0 auto;
            }
            .select-service-button h2
            {
                font-size: 25px;
                font-weight: 600;
                margin-top: 15px;
                margin-bottom: 0px;
                font-family: "Amazon Ember", Arial, sans-serif;
            }
            .select-service-button p
            {
                margin: 0px;
                font-size: 14px;
                font-weight: normal;
                margin-bottom: 15px;
                font-family: "Amazon Ember", Arial, sans-serif;
            }
            .select-service-button input[type='submit']
            {
                background: #232f3e;
                color: #ff6c00;
                padding: 10px;
                font-size: 15px;
                display: inline-block;
                font-weight: bold;
                font-family: "Amazon Ember", Arial, sans-serif;
                border:1px solid #232f3e;
            }
            .select-service-button input[type='submit']:hover,
            .select-service-button input[type='submit']:focus
            {
                color: #232f3e;
                background: #ff6c00;
                text-decoration: none;
                outline: none;
                border:1px solid #ff6c00;
            }
            .select-service-button input[type=radio]
            {
                position: absolute !important;
                clip: rect(0, 0, 0, 0);
                height: 1px;
                width: 1px;
                border: 0;
                overflow: hidden;
                margin: 4px 0 0;
                margin-top: 1px;
                line-height: normal;
                display: inline-block;
            }
            .select-service-button label
            {
                width: 135px;
                font-size: 14px;
                text-align: center;
                display: inline-block;
                float: none;
                padding: 10px 0px;
                border: 1px solid #bbb;
                margin: 20px -2px;
                font-size: 15px;
                font-weight: bold;
                font-family: "Amazon Ember", Arial, sans-serif;
            }
            .select-service-button input[type=radio]:checked + label
            {
                background-color: #fe6c00;
                -webkit-box-shadow: none;
                box-shadow: none;
                color: #232e3e;
                padding: 10px 0px;
                border: 1px solid #fe6c00;
            }
        </style>
        <?php echo $this->Form->create(null, array('url' => ['controller' => 'users', 'action' => 'welcome/schedule'], 'data-toggle' => "validator", 'id' => 'style')) ?>
        <section class="select-service-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="select-service">
                            <div class="select-service-button">
                                <h2><?php echo $this->request->session()->read('Auth.User.name'); ?> select your FIT</h2>
                                <input type="radio" name="selectservice" value='men' id="select-service-men">
                                <label for="select-service-men">Men</label>

                                <input type="radio" name="selectservice" value='wemen' id="select-service-women">
                                <label for="select-service-women">Women</label>

                                <input type='submit' name='submit' value='COMPLETE YOUR STYLE PROFILE'/>
                            </div> 
                            <div class="select-service-images">
                                <img src="<?php echo HTTP_ROOT ?>images/Men1.jpg">
                                <img src="<?php echo HTTP_ROOT ?>images/Women1.jpg">
                            </div>

                            <div class="select-service-text">
                                <p>Complete Your FIT Profile and your stylist will send you the items based on Your budget.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php echo $this->Form->end(); ?>

    <? } else { ?>

        <div class="schedule-box">
            <div class="container">
                <div class="row ">

                    <div class="col-sm-9 col-lg-9 col-md-9 setting-box setting-box2">
                        <div class=" tab-content">
                            <?php echo $this->Form->create(null, array('url' => ['controller' => 'users', 'action' => 'welcome/schedule'], 'data-toggle' => "validator", 'id' => 'sechdule')) ?>
                            <div role="tabpanel" class="tab-pane fade active in satya">
                                <h5>Manage your FIT settings</h5>
                                <h6>Please select your schedule </h6>
                                <div class="checkbox-sitting" style="display:none;">
                                    <input onclick="getCheckBox()"  id="try_new_items_with_scheduled_fixes12" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '0') { ?>  <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '') { ?> checked <?php } ?>>
                                    <label  for="try_new_items_with_scheduled_fixes12">I want new product with FIT sechdule </label>
                                </div>
                                <div id="optionsDIV"
                                <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?>
                                         style='display: block;'
                                     <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '0') { ?>
                                         style='display: none;'
                                     <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '') { ?>
                                         style='display: block;'
                                     <?php } else { ?>
                                         style='display: none;'
                                     <?php } ?>

                                     >
                                    <ul>
                                        <li>
                                            <input class="radio-box" value="1" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) { ?> checked <?php } else if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == '') { ?> checked <?php } ?>  name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes1" type="radio" >
                                            <label for="how_often_would_you_lik_fixes1">
                                                <h5>Every Monthly</h5>
                                                <p>Will ship hand picked products in every month.</p>
                                            </label>
                                        </li>
                                        <li>

                                            <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio">
                                            <label for="how_often_would_you_lik_fixes2">
                                                <h5>Every 2 month</h5>
                                                <p>Try a FIT in every two months.</p>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="radio-box" value="3" id="how_often_would_you_lik_fixes3" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio">
                                            <label for="how_often_would_you_lik_fixes3">
                                                <h5>Every 3 month</h5>
                                                <p>Try a FIT in every three months.</p>
                                            </label>
                                        </li>

                                    </ul>
                                    <p>Until you cancel your Fit Schedule we will charge a styling Fees $<?= ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $main_style_fee; ?>  depends on your style delivery frequency.</p>
                                </div>
                                <div class="tab-button">
                                    <button name="first_time_fix" value ='first_time_fix' class="btn-boxes" type="Submit">Continue </button>
                                </div>            
                            </div>
                            <?php echo $this->Form->end(); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
        <?php
    }
}
?>

<?php
if ($slug == 'reservation') {

    if ($this->request->session()->read('PROFILE') == 'KIDS') {
        ?>
        <div class="schedule reservation">
            <div class="container">
                <?php echo $this->Form->create(null, array('url' => ['controller' => 'users', 'action' => 'welcome/reservation'], 'data-toggle' => "validator", 'id' => 'reservation')) ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="reserv-box">
                            <h1>Your Style Fit Box Order Information</h1>
                            <div class="date-fix-box">
                                <input type='hidden' name='date_in_time' value='<?php echo $date_in_delivary; ?>'/>
                                <input type='hidden' name='kid_id' value='<?php echo $this->request->session()->read('KID_ID'); ?>'/>
                                <a href="javascript:void[0]">The estimated shipping window is <br> <?php echo $date_in_delivary . ' - ' . date('l, F j, Y', strtotime('+7 days', strtotime($date_in_delivary))); ?></a>
                                <p>Email us at <a style="font-size: 16px;" href="mailto:support@drapefit.com">support@drapefit.com</a> for any questions or suggestions .</p>
                                <a href="<?= HTTP_ROOT; ?>contact-us" style="color:white;background-color: #ff6c00;padding: 10px 25px;font-size: 18px !important;border-radius: 50px;margin-top: 31px;line-height: 30px;position: relative;" class="support-btn">Support</a>
                                <p>Please complete your payment and shipping to have your reservation 30 minutes.</p>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="submit" value='shipping_address' name='shipping_address'>Next : Shipping Address <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>    



        <?php } else if ($this->request->session()->read('PROFILE') == 'MEN') { ?> 
            <div class="schedule reservation">
                <div class="container">
                    <?php echo $this->Form->create(null, array('url' => ['controller' => 'users', 'action' => 'welcome/reservation'], 'data-toggle' => "validator", 'id' => 'reservation')) ?>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="reserv-box">
                                <h1>Your Style Fit Box Order Information</h1>
                                <div class="date-fix-box">
                                    <input type='hidden' name='date_in_time' value='<?php echo $date_in_delivary; ?>'/>
                                    <input type='hidden' name='user_id' value='<?php echo $this->request->getSession()->read('Auth.User.id'); ?>'/>
                                    <a href="javascript:void[0]">The estimated shipping window is <br>  <?php echo $date_in_delivary . ' - ' . date('l, F j, Y', strtotime('+7 days', strtotime($date_in_delivary))); ?></a>
                                    <p>Email us at <a style="font-size: 16px;" href="mailto:support@drapefit.com">support@drapefit.com</a> for any questions or suggestions.</p>
                                    <a href="<?= HTTP_ROOT; ?>contact-us" style="color:white;background-color: #ff6c00;padding: 10px 25px;font-size: 18px !important;border-radius: 50px;margin-top: 31px;line-height: 30px;position: relative;" class="support-btn">Support</a>
                                    <p>Please complete your payment and shipping to have your reservation 30 minutes.</p>
                                </div>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="submit" value='shipping_address' name='shipping_address'>Next : Shipping Address <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>   
        <?php } else if ($this->request->session()->read('PROFILE') == 'WOMEN') { ?>
            <div class="schedule reservation">
                <div class="container">
                    <?php echo $this->Form->create(null, array('url' => ['controller' => 'users', 'action' => 'welcome/reservation'], 'data-toggle' => "validator", 'id' => 'reservation')) ?>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="reserv-box">
                                <h1>Your Style Fit Box Order Information</h1>
                                <div class="date-fix-box">
                                    <input type='hidden' name='date_in_time' value='<?php echo $date_in_delivary; ?>'/>
                                    <input type='hidden' name='user_id' value='<?php echo $this->request->getSession()->read('Auth.User.id'); ?>'/>
                                    <a href="javascript:void[0]">The estimated shipping window is <br>  <?php echo $date_in_delivary . ' - ' . date('l, F j, Y', strtotime('+7 days', strtotime($date_in_delivary))); ?></a>
                                    <p>Email us at <a style="font-size: 16px;" href="mailto:support@drapefit.com">support@drapefit.com</a> for any questions or suggestions .</p>
                                    <a href="<?= HTTP_ROOT; ?>contact-us" style="color:white;background-color: #ff6c00;padding: 10px 25px;font-size: 18px !important;border-radius: 50px;margin-top: 31px;line-height: 30px;position: relative;" class="support-btn">Support</a>
                                    <p>Please complete your payment and shipping to have your reservation 30 minutes.</p>
                                </div>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="submit" value='shipping_address' name='shipping_address'>Next : Shipping Address <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>   
        <?php } ?>

        <?php if ($this->request->session()->read('PROFILE') == "WOMEN") { ?>
     

        <?php } ?>

    <?php } ?>

    <?php if ($slug == 'addressbook') { ?>

        <section class="check-out-address-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($useraddress_datas as $useraddress_data) { ?>
                            <div class="Address-details">
                                <form>
                                    <ul>
                                        <li><strong>Full name: <?php echo @$useraddress_data->full_name; ?></strong></li>
                                        <li>At/Po:<?php echo @$useraddress_data->address; ?></li>
                                        <li>Address 2:<?php echo @$useraddress_data->address_line_2; ?></li>
                                        <li>City:<?php echo @$useraddress_data->city; ?></li>
                                        <li>State: <?php echo @$useraddress_data->state; ?></li>
                                        <li>Zip code: <?php echo @$useraddress_data->zipcode; ?></li>
                                        <li>Phone: <?php echo @$useraddress_data->phone; ?></li>
                                    </ul>
                                    <a class="deliver-btn" href="<?php echo HTTP_ROOT . 'welcome/shipping/addresss/' . @$useraddress_data->id ?>">Deliver to this Address</a>
                                    <a href="<?php echo HTTP_ROOT . 'users/delete_address/' . @$useraddress_data->id ?>/addressbook">Delete</a>
                                    <a href="<?php echo HTTP_ROOT . 'welcome/addressbook/edit/' . @$useraddress_data->id ?>">Edit</a>
                                </form>
                            </div>

                        <?php } ?>						
                    </div>
                </div>
            </div>
        </section>
        <?php if ($addressCount <= 4) { ?>
            <section class="check-out-address">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create('', ['url' => ['controller' => 'users', 'action' => 'welcome/addressbook'], 'type' => 'post', 'class' => "check-out-address-form", "role" => "form", "data-toggle" => "validator", 'id' => 'shipaddress']); ?>

                            <h3>Add a new address</h3>
                            <ul>
                                <li>
                                    <label>Full name *: </label>
                                    <input type="text" name="full_name"  id="full_name" value='<?php echo @$ShippingAddress->full_name; ?>' onkeyup="validation()" maxlength="50">
                                    <input type="hidden" name="id"  id="id" value='<?php echo @$ShippingAddress->id; ?>'>
                                </li>
                                <li>
                                    <label>Address line 1 * : </label>
                                    <input type="text" name="address" placeholder="colony / street / locality" id="address"  value='<?php echo @$ShippingAddress->address ?>'  onkeyup="validation()" maxlength="60">
                                </li>
                                <li>
                                    <label>Address line 2 : </label>
                                    <input type="textarea" name="address_line_2" placeholder="colony / street / locality" id="address_line_2" onkeyup="validation()"  value='<?php echo @$ShippingAddress->address_line_2; ?>' maxlength="60">
                                </li>
                                <li>
                                    <label>City *: </label>
                                    <input type="text" name="city" id="city" value='<?php echo @$ShippingAddress->city; ?>' onkeyup="validation()" maxlength="50">
                                </li>
                                <li>
                                    <label>State/Province/Region * : </label>
                                    <input type="text" name="state" placeholder="State/Province/Region" id="state" value='<?php echo @$ShippingAddress->state; ?>' maxlength="50" onkeyup="validation()">
                                </li>
                                <li>
                                    <label>ZIP *: </label>
                                    <input type="text" name="zipcode" placeholder="6-digit [0-9] pincode" id="zipcode" value='<?php echo @$ShippingAddress->zipcode; ?>'maxlength="20"  onkeyup="validation()">
                                </li>
                                <li>
                                    <label>Country *: </label>
                                    <select name="country" onchange="validation()">

                                        <option value = 'United states' <?php if (@$ShippingAddress->country == 'United states') { ?> selected="" <?php } ?>>United states </option>

                                    </select>

                                </li>
                                <li>
                                    <label>Phone number *:</label>
                                    <input type="text" name="phone" placeholder="Phone number" id="phone" value='<?php echo @$ShippingAddress->phone; ?>' maxlength="20" onkeyup="validation()">
                                </li>
                            </ul>

                            <button type="submit" name='deliverAddress' value='deliverAddress'  class="btn deliver-address" id="payment">Next : Payment <i class="fas fa-arrow-right"></i></button>
                            <?= $this->Form->end(); ?>
                        </div>
                        <script>
                            function delivery() {
                                var x = document.getElementById("delivery-day");
                                if (x.style.display === "block")
                                {
                                    x.style.display = "none";
                                } else
                                {
                                    x.style.display = "block";
                                }
                            }
                        </script>
                    </div>
                </div>
            </section>
            <?php
        } else if ($sections == 'edit') {
            ?>
            <script>
                $(document).ready(function () {
                    $('#full_name').focus();

                });
            </script>
            <section class="check-out-address">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create('', ['url' => ['controller' => 'users', 'action' => 'welcome/addressbook'], 'type' => 'post', 'class' => "check-out-address-form", "role" => "form", "data-toggle" => "validator", 'id' => 'shipaddress']); ?>

                            <h3>Edit address</h3>
                            <ul>
                                <li>
                                    <label>Full name *: </label>
                                    <input type="text" name="full_name"  id="full_name" value='<?php echo @$ShippingAddress->full_name; ?>' onkeyup="validation()" maxlength="50">
                                    <input type="hidden" name="id"  id="id" value='<?php echo @$ShippingAddress->id; ?>'>
                                </li>
                                <li>
                                    <label>Address line 1 * : </label>
                                    <input type="text" name="address" placeholder="colony / street / locality" id="address"  value='<?php echo @$ShippingAddress->address ?>'  onkeyup="validation()" maxlength="60">
                                </li>
                                <li>
                                    <label>Address line 2 : </label>
                                    <input type="textarea" name="address_line_2" placeholder="colony / street / locality" id="address_line_2" onkeyup="validation()"  value='<?php echo @$ShippingAddress->address_line_2; ?>' maxlength="60">
                                </li>
                                <li>
                                    <label>City *: </label>
                                    <input type="text" name="city" id="city" value='<?php echo @$ShippingAddress->city; ?>' onkeyup="validation()" maxlength="50">
                                </li>
                                <li>
                                    <label>State/Province/Region * : </label>
                                    <input type="text" name="state" placeholder="State/Province/Region" id="state" value='<?php echo @$ShippingAddress->state; ?>' maxlength="50" onkeyup="validation()">
                                </li>
                                <li>
                                    <label>ZIP *: </label>
                                    <input type="text" name="zipcode" placeholder="6-digit [0-9] pincode" id="zipcode" value='<?php echo @$ShippingAddress->zipcode; ?>'maxlength="20"  onkeyup="validation()">
                                </li>
                                <li>
                                    <label>Country *: </label>
                                    <select name="country" onchange="validation()">

                                        <option value = 'United states' <?php if (@$ShippingAddress->country == 'United states') { ?> selected="" <?php } ?>>United states </option>

                                    </select>

                                </li>
                                <li>
                                    <label>Phone number *:</label>
                                    <input type="text" name="phone" placeholder="Phone number" id="phone" value='<?php echo @$ShippingAddress->phone; ?>' maxlength="20" onkeyup="validation()">
                                </li>
                            </ul>

                            <button type="submit" name='deliverAddress' value='deliverAddress'  class="btn deliver-address" id="payment">Next : Payment <i class="fas fa-arrow-right"></i></button>
                            <?= $this->Form->end(); ?>
                        </div>
                        <script>
                            function delivery() {
                                var x = document.getElementById("delivery-day");
                                if (x.style.display === "block")
                                {
                                    x.style.display = "none";
                                } else
                                {
                                    x.style.display = "block";
                                }
                            }
                        </script>
                    </div>
                </div>
            </section>
        <?php } ?>

        <script>
            $("#shipaddress").validate({

                rules: {
                    full_name: {
                        required: true,

                    },
                    address: {
                        required: true,

                    },
                    city: {
                        required: true,

                    },
                    state: {
                        required: true,

                    },
                    zipcode: {
                        required: true,
                        digits: true

                    },
                    phone: {
                        required: true,
                        digits: true

                    },
                    country: {
                        required: true,

                    },
                },
                messages: {
                    full_name: {
                        required: "Please provide a full name",

                    },
                    address: {
                        required: "Please provide your  address",
                    },
                    city: {
                        required: "Please provide your  city",
                    },
                    state: {
                        required: "Please provide your  state",
                    },
                    phone: {
                        required: "Please provide your  phone no",
                        digits: "Please provide only numeric  phone no",
                    },
                    zipcode: {
                        required: "Please provide your  zipcode",
                        digits: "Please provide only numeric  zip no",
                    },
                    country: {
                        required: "Please provide your  country",
                    },
                },
            });
        </script>

    <?php } ?>

    <?php if ($slug == 'payment') { ?>
        <link rel="stylesheet" href="<?= HTTP_ROOT; ?>payment/css/style.css">
        <script type="text/javascript" src="<?= HTTP_ROOT; ?>payment/js/jquery.min.js"></script>






        <section class="payment">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Select Payment Method</h2>
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
                                            }elseif ($card->card_type == 'Unionpay') {
                                                $img = 'Unionpay.png';
                                            }elseif ($card->card_type == 'Diners') {
                                                $img = 'Diners.png';
                                            }
                                            ?>

                                            <style>
                                                .panel-heading{
                                                    position: relative;
                                                }
                                                .panel-heading input[type="radio"]{
                                                    position: absolute;
                                                    top: 14px;
                                                    left: 10px;
                                                }
                                            </style>
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
                                                        <div class="card">

                                                            <ul>
                                                                <li></li>
                                                                <li><img src="<?php echo HTTP_ROOT . 'images/' . $img ?>"></li>
                                                                <li><h6><?php echo $card->card_name; ?> <span> ending in <?php echo $masked; ?></span></h6></li>
                                                                <li><p><span>Name</span><?php echo $card->card_name; ?></p></li>
                                                                <li><p><span>Expires date</span><?php echo $card->card_expire; ?></p></li>
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
                            <div class="container"> 
                                <div class="row">
                                    <div class="col-md-9">
                                        <!--<details  onclick="newcard()">-->
                                        <details >
                                            <summary><a href="<?= HTTP_ROOT . 'add-card/payment'; ?>">Add a card</a></summary>
                                        </details>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="payment-button">                
                            <button id='paymentId' class="btn apply_card" disabled>continue</button> 
                            <p>Shipping & returns <span>Free</span></p>
                            <p>Styling fees <span>$<?= ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $main_style_fee; ?></span></p>
                            <input type="hidden" name="payableAmount" id="payableAmount" value="<?= ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $main_style_fee; ?>"/>
                            <p><strong>Includes:</strong></p>
                            <div class="con-text-box">
                                <p>Hand-selected Fits from stylist</p>
                                <p>Styling advice</p>
                                <p>Free return envelope</p>
                            </div>
                            <p class="total-box"><strong>Total: <span>$<?= ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $main_style_fee; ?></span></strong></p>
                        </div>
                        <img style="width: 100%; margin-top: 20px;margin-bottom: 40px;" src="<?php echo HTTP_ROOT ?>img/box11.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <script>



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
                        url: '<?= HTTP_ROOT; ?>users/payment_process', //Stripe payment process
                        dataType: "json",
                        data: {p_id: getId, payableAmount: payableAmount},
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
                                    window.location.href = '<?= HTTP_ROOT; ?>payment-success';
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
                                if(data.redirect_url != null){
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




    <?php } ?> 

    <?php
    if ($slug == 'style') {
//echo $this->request->session()->read('PROFILE'); exit;
        ?>
        <?php if ($this->request->session()->read('PROFILE') == '') {
            ?>
            <style type="text/css">
                .select-service-main
                {
                    width: 100%;
                    margin-top:130px;
                    float:left;
                    text-align: center;
                    margin-bottom: 23px;
                }
                .select-service
                {
                    width: 42%;
                    float:none;
                    padding:15px;
                    border: 2px solid #ccc;
                    text-align: center;
                    margin: 0 auto;
                }
                .select-service-images
                {
                    width: 100%;
                    float: left;
                    border-top: 2px solid #ff6c00;
                    margin-top: 20px;
                    padding-top: 20px !important;
                    margin-bottom: 20px;
                }
                .select-service-images img
                {
                    width: 49%;
                }
                .select-service-text
                {
                    width: 90%;
                    float: none;
                    padding: 10px;
                    text-align: center;
                    margin: 0 auto;
                }
                .select-service-text h2
                {
                    font-size: 25px;
                    font-weight: 600;
                    margin: 0px;
                    margin-bottom: 15px;
                    margin-top: 15px;
                    display: inline-block;
                    font-family: "Amazon Ember", Arial, sans-serif;
                }
                .select-service-text p
                {
                    margin: 0px;
                    font-size: 14px;
                    font-weight: normal;
                    margin-bottom: 15px;
                    font-family: "Amazon Ember", Arial, sans-serif;
                }




                .select-service-button
                {
                    width: 100%;
                    float: none;
                    padding: 10px 0 30px;
                    text-align: center;
                    background: #fff;
                    margin: 0 auto;
                }
                .select-service-button h2
                {
                    font-size: 25px;
                    font-weight: 600;
                    margin-top: 15px;
                    margin-bottom: 0px;
                    font-family: "Amazon Ember", Arial, sans-serif;
                }
                .select-service-button p
                {
                    margin: 0px;
                    font-size: 14px;
                    font-weight: normal;
                    margin-bottom: 15px;
                    font-family: "Amazon Ember", Arial, sans-serif;
                }
                .select-service-button input[type='submit']
                {
                    background: #232f3e;
                    color: #ff6c00;
                    padding: 10px;
                    font-size: 15px;
                    display: inline-block;
                    font-weight: bold;
                    font-family: "Amazon Ember", Arial, sans-serif;
                    border:1px solid #232f3e;
                }
                .select-service-button input[type='submit']:hover,
                .select-service-button input[type='submit']:focus
                {
                    color: #232f3e;
                    background: #ff6c00;
                    text-decoration: none;
                    outline: none;
                    border:1px solid #ff6c00;
                }
                .select-service-button input[type=radio]
                {
                    position: absolute !important;
                    clip: rect(0, 0, 0, 0);
                    height: 1px;
                    width: 1px;
                    border: 0;
                    overflow: hidden;
                    margin: 4px 0 0;
                    margin-top: 1px;
                    line-height: normal;
                    display: inline-block;
                }
                .select-service-button label
                {
                    width: 135px;
                    font-size: 14px;
                    text-align: center;
                    display: inline-block;
                    float: none;
                    padding: 10px 0px;
                    border: 1px solid #bbb;
                    margin: 20px -2px;
                    font-size: 15px;
                    font-weight: bold;
                    font-family: "Amazon Ember", Arial, sans-serif;
                }
                .select-service-button input[type=radio]:checked + label
                {
                    background-color: #fe6c00;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    color: #232e3e;
                    padding: 10px 0px;
                    border: 1px solid #fe6c00;
                }
            </style>
            <?php echo $this->Form->create(null, array('url' => ['controller' => 'users', 'action' => 'gender_update'], 'data-toggle' => "validator", 'id' => 'style')) ?>
            <section class="select-service-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="select-service">
                                <div class="select-service-button">
                                    <h2><?php echo $this->request->session()->read('Auth.User.name'); ?> select your FIT</h2>
                                    <input type="radio" name="selectservice" value='men' id="select-service-men">
                                    <label for="select-service-men">Men</label>

                                    <input type="radio" name="selectservice" value='wemen' id="select-service-women">
                                    <label for="select-service-women">Women</label>

                                    <input type='submit' name='submit' value='COMPLETE YOUR STYLE PROFILE'/>
                                </div> 
                                <div class="select-service-images">
                                    <img src="<?php echo HTTP_ROOT ?>images/Men1.jpg">
                                    <img src="<?php echo HTTP_ROOT ?>images/Women1.jpg">
                                </div>

                                <div class="select-service-text">
                                    <p>Complete Your FIT Profile and your stylist will send you the items based on Your budget.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php echo $this->Form->end(); ?>

            <?php
        }
        if ($this->request->session()->read('PROFILE') == 'MEN') {
            ?>

            <section class="style-contain style-men">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="tab" role="tabpanel">
                                <!-- Nav tabs -->
                                <div class="tab-button-list">
                                    <ul class="nav nav-tabs fixed" role="tablist" id="button-tablist">
                                        <li role="presentation"
                                        <?php
                                        if (@$sections == 'stats') {
                                            echo 'class="active"';
                                        } elseif (@$sections == '') {
                                            echo 'class="active"';
                                        }
                                        ?>>
                                            <a <?php if (@$userDetails->user_detail->is_progressbar >= 0) { ?> href="#Section1" aria-controls="home" role="tab" data-toggle="tab"<?php } ?> >Basic Information</a></li>
                                        <li role="presentation" <?php
                                        if (@$sections == 'fit') {
                                            echo 'class="active"';
                                        }
                                        ?>><a <?php if (@$userDetails->user_detail->is_progressbar >= 25) { ?> href="#Section2" aria-controls="home" role="tab" data-toggle="tab"<?php } else { ?> style="opacity:0.5" <?php } ?>>Style Fit</a></li>
                                        <li role="presentation"
                                        <?php
                                        if (@$sections == 'styles') {
                                            echo 'class="active"';
                                        }
                                        ?>
                                            ><a <?php if (@$userDetails->user_detail->is_progressbar >= 50) { ?> href="#Section3" aria-controls="home" role="tab" data-toggle="tab"<?php } else { ?> style="opacity:0.5" <?php } ?>>Price Range</a></li>
                                        <li role="presentation" <?php
                                        if (@$sections == 'custom') {
                                            echo 'class="active"';
                                        }
                                        ?>><a <?php if (@$userDetails->user_detail->is_progressbar >= 75) { ?> href="#Section4" aria-controls="home" role="tab" data-toggle="tab"<?php } else { ?> style="opacity:0.5" <?php } ?>>Custom Design & Brands</a></li>
                                    </ul>
                                </div>
                                <!-- Tab panes -->

                                <div class="tab-content tabs data-filup ">
                                    <div role="tabpanel" class="tab-pane fade   <?php if ($sections == 'section1') { ?> in active <?php } else if ($sections == '') { ?> in active <?php } ?>" id="Section1">
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleMen')) ?>
                                        <div class="left-bar fixed" id="sidebar">
                                            <div class="under-box">
                                                <h2>Hi <?php echo $profileName; ?></h2>
                                                <p>Please complete your basic information that will help us to get started to have a best FIT for you</p>
                                                <div class="profile-image">
                                                    <span><img src="<?php echo HTTP_ROOT ?>assets/men-img/Basic_Info_Image.jpeg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <h1>Welcome <?php echo $profileName; ?></h1>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>What is your height?</h3>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select  name="tall_feet" id="tall_feet">
                                                                    <option value="" >--</option>
                                                                    <option value="4" <?= @$MenStats->tall_feet == 4 ? "selected" : ""; ?>>4</option>
                                                                    <option value="5" <?= @$MenStats->tall_feet == 5 ? "selected" : ""; ?>>5</option>
                                                                    <option value="6" <?= @$MenStats->tall_feet == 6 ? "selected" : ""; ?>>6</option>
                                                                </select>
                                                                <label>ft.</label>
                                                            </div>
                                                            <div class=" select-box">
                                                                <select name="tell_inch" id="tell_inch">
                                                                    <option value="" <?= @$MenStats->tell_inch == '' ? "selected" : ""; ?> >--</option>
                                                                    <option value="0" <?= @$MenStats->tell_inch == '0' ? "selected" : ""; ?>>0</option>
                                                                    <option value="1" <?= @$MenStats->tell_inch == 1 ? "selected" : ""; ?>>1</option>
                                                                    <option value="2" <?= @$MenStats->tell_inch == 2 ? "selected" : ""; ?>>2</option>
                                                                    <option value="3" <?= @$MenStats->tell_inch == 3 ? "selected" : ""; ?>>3</option>
                                                                    <option value="4" <?= @$MenStats->tell_inch == 4 ? "selected" : ""; ?>>4</option>
                                                                    <option value="5" <?= @$MenStats->tell_inch == 5 ? "selected" : ""; ?>>5</option>
                                                                    <option value="6" <?= @$MenStats->tell_inch == 6 ? "selected" : ""; ?>>6</option>
                                                                    <option value="7" <?= @$MenStats->tell_inch == 7 ? "selected" : ""; ?>>7</option>
                                                                    <option value="8" <?= @$MenStats->tell_inch == 8 ? "selected" : ""; ?>>8</option>
                                                                    <option value="9" <?= @$MenStats->tell_inch == 9 ? "selected" : ""; ?>>9</option>
                                                                    <option value="10" <?= @$MenStats->tell_inch == 10 ? "selected" : ""; ?>>10</option>
                                                                    <option value="11" <?= @$MenStats->tell_inch == 11 ? "selected" : ""; ?>>11</option>
                                                                </select>
                                                                <label>in.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>What is your weight?</h3>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">

                                                                <input type="text" placeholder="" name="weight_lb" maxlength="3" value="<?= @$MenStats->weight_lb; ?>" >
                                                                <label>lbs.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 date-box">
                                                        <h3>Your birthday?</h3>
                                                        <div class="select-boxes">
                                                            <input id="datepickerMen" type="text" placeholder="mm/dd/yyyy" name="birthday" value="<?php
                                                            if (@$MenStats->birthday != '') {
                                                                echo @$MenStats->birthday;
                                                            }
                                                            ?>" autocomplete="off" maxlength="10" >

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>Are you parent ?</h3>

                                                        <div class="switch-field">
                                                            <input type="radio" id="switch_left" name="are_you_a_parent" value="1" <?= @$MenStats->are_you_a_parent == 1 ? "checked" : ""; ?> />
                                                            <label for="switch_left">Yes</label>
                                                            <input type="radio" id="switch_right" name="are_you_a_parent" value="2" <?= @$MenStats->are_you_a_parent == 2 ? "checked" : ""; ?>/>
                                                            <label for="switch_right">No</label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data form-box-data2">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>What size you prefer?</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h4 style="margin-top: 0;">Waist size?</h4>
                                                        <div class="select-boxes select-boxes2">
                                                            <div class=" select-box">
                                                                <select name="waist" id="waist">
                                                                    <option value="" <?= @$TypicallyWearMen->waist == '' ? "selected" : ""; ?> >--</option>
                                                                    <option value="28" <?= @$TypicallyWearMen->waist == 28 ? "selected" : ""; ?>>28</option>
                                                                    <option value="29" <?= @$TypicallyWearMen->waist == 29 ? "selected" : ""; ?>>29</option>
                                                                    <option value="30" <?= @$TypicallyWearMen->waist == 30 ? "selected" : ""; ?>>30</option>
                                                                    <option value="31" <?= @$TypicallyWearMen->waist == 31 ? "selected" : ""; ?>>31</option>
                                                                    <option value="32" <?= @$TypicallyWearMen->waist == 32 ? "selected" : ""; ?>>32</option>
                                                                    <option value="33" <?= @$TypicallyWearMen->waist == 33 ? "selected" : ""; ?>>33</option>
                                                                    <option value="34" <?= @$TypicallyWearMen->waist == 34 ? "selected" : ""; ?>>34</option>
                                                                    <!--<option value="35" <?= @$TypicallyWearMen->waist == 35 ? "selected" : ""; ?>>35</option>-->
                                                                    <option value="36" <?= @$TypicallyWearMen->waist == 36 ? "selected" : ""; ?>>36</option>
                                                                    <option value="38" <?= @$TypicallyWearMen->waist == 38 ? "selected" : ""; ?>>38</option>
                                                                    <option value="40" <?= @$TypicallyWearMen->waist == 40 ? "selected" : ""; ?>>40</option>
                                                                    <option value="42" <?= @$TypicallyWearMen->waist == 42 ? "selected" : ""; ?>>42</option>
                                                                    <option value="44" <?= @$TypicallyWearMen->waist == 44 ? "selected" : ""; ?>>44</option>
                                                                    <option value="46" <?= @$TypicallyWearMen->waist == 46 ? "selected" : ""; ?>>46</option>
                                                                    <option value="48" <?= @$TypicallyWearMen->waist == 48 ? "selected" : ""; ?>>48</option>
                                                                </select>
                                                            </div>
                                                            <div class="select-box select-box2">
                                                                <select name="waist_size_run">
                                                                    <option value="" <?= @$TypicallyWearMen->waist_size_run == "" ? "selected" : ""; ?> >--</option>
                                                                    <option value="Sometimes too small" <?= @$TypicallyWearMen->waist_size_run == "Sometimes too small" ? "selected" : ""; ?>>Sometimes too small</option>
                                                                    <option value="Just right" <?= @$TypicallyWearMen->waist_size_run == "Just right" ? "selected" : ""; ?>>Just right</option>
                                                                    <option value="Sometimes too big" <?= @$TypicallyWearMen->waist_size_run == "Sometimes too big" ? "selected" : ""; ?>>Sometimes too big</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h4 style="margin-top: 0;">Shirt size?</h4>
                                                        <div class="select-boxes select-boxes2">
                                                            <div class=" select-box">
                                                                <select name="size">
                                                                    <option value="" <?= @$TypicallyWearMen->size == "" ? "selected" : ""; ?>>--</option>
                                                                    <option value="XS" <?= @$TypicallyWearMen->size == "XS" ? "selected" : ""; ?>>XS</option>
                                                                    <option value="S" <?= @$TypicallyWearMen->size == "S" ? "selected" : ""; ?>>S</option>
                                                                    <option value="M" <?= @$TypicallyWearMen->size == "M" ? "selected" : ""; ?>>M</option>
                                                                    <option value="L" <?= @$TypicallyWearMen->size == "L" ? "selected" : ""; ?>>L</option>
                                                                    <option value="XL" <?= @$TypicallyWearMen->size == "XL" ? "selected" : ""; ?>>XL</option>
                                                                    <option value="XXL" <?= @$TypicallyWearMen->size == "XXL" ? "selected" : ""; ?>>XXL</option>
                                                                    <option value="3XL" <?= @$TypicallyWearMen->size == "3XL" ? "selected" : ""; ?>>3XL</option>
                                                                </select>
                                                            </div>
                                                            <div class="select-box select-box2">
                                                                <select name="shirt">
                                                                    <option value="" <?= @$TypicallyWearMen->shirt == "" ? "selected" : ""; ?>>--</option>
                                                                    <option value="Sometimes too small" <?= @$TypicallyWearMen->shirt == "Sometimes too small" ? "selected" : ""; ?>>Sometimes too small</option>
                                                                    <option value="Just right"  <?= @$TypicallyWearMen->shirt == "Just right" ? "selected" : ""; ?>>Just right</option>
                                                                    <option value="Sometimes too big" <?= @$TypicallyWearMen->shirt == "Sometimes too big" ? "selected" : ""; ?>>Sometimes too big</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                                        <h4>Bottom size?</h4>
                                                        <div class="select-boxes">
                                                            <select name="men_bottom" id="men_bottom" style="width: 100%;">
                                                                <option value="" <?= @$TypicallyWearMen->men_bottom == "" ? "selected" : ""; ?>>--</option>
                                                                <option value="XS" <?= @$TypicallyWearMen->men_bottom == "XS" ? "selected" : ""; ?>>XS</option>
                                                                <option value="S" <?= @$TypicallyWearMen->men_bottom == "S" ? "selected" : ""; ?>>S</option>
                                                                <option value="M" <?= @$TypicallyWearMen->men_bottom == "M" ? "selected" : ""; ?>>M</option>
                                                                <option value="L" <?= @$TypicallyWearMen->men_bottom == "L" ? "selected" : ""; ?>>L</option>
                                                                <option value="XL" <?= @$TypicallyWearMen->men_bottom == "XL" ? "selected" : ""; ?>>XL</option>
                                                                <option value="XXL" <?= @$TypicallyWearMen->men_bottom == "XXL" ? "selected" : ""; ?>>XXL</option>
                                                                <option value="3XL" <?= @$TypicallyWearMen->men_bottom == "3XL" ? "selected" : ""; ?>>3XL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                                        <h4>Inseam size?</h4>
                                                        <div class="select-boxes">
                                                            <select name="inseam" id="inseam" style="width: 100%;">
                                                                <option value="" <?= @$TypicallyWearMen->inseam == "" ? "selected" : ""; ?>>--</option>
                                                                <option value="28" <?= @$TypicallyWearMen->inseam == "28" ? "selected" : ""; ?>>28</option>
                                                                <option value="30" <?= @$TypicallyWearMen->inseam == "30" ? "selected" : ""; ?>>30</option>
                                                                <option value="32" <?= @$TypicallyWearMen->inseam == "32" ? "selected" : ""; ?>>32</option>
                                                                <option value="34" <?= @$TypicallyWearMen->inseam == "34" ? "selected" : ""; ?>>34</option>
                                                                <option value="36" <?= @$TypicallyWearMen->inseam == "36" ? "selected" : ""; ?>>36</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h4>Shoe sizee?</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="shoe">
                                                                    <option value=""  <?= @$TypicallyWearMen->shoe == "" ? "selected" : ""; ?>>--</option>
                                                                    <option value="7" <?= @$TypicallyWearMen->shoe == "7" ? "selected" : ""; ?>>7</option>
                                                                    <option value="7.5" <?= @$TypicallyWearMen->shoe == "7.5" ? "selected" : ""; ?>>7.5</option>
                                                                    <option value="8" <?= @$TypicallyWearMen->shoe == "8" ? "selected" : ""; ?>>8</option>
                                                                    <option value="8.5" <?= @$TypicallyWearMen->shoe == "8.5" ? "selected" : ""; ?>>8.5</option>
                                                                    <option value="9" <?= @$TypicallyWearMen->shoe == "9" ? "selected" : ""; ?>>9</option>
                                                                    <option value="9.5" <?= @$TypicallyWearMen->shoe == "9.5" ? "selected" : ""; ?>>9.5</option>
                                                                    <option value="10" <?= @$TypicallyWearMen->shoe == "10" ? "selected" : ""; ?>>10</option>
                                                                    <option value="10.5" <?= @$TypicallyWearMen->shoe == "10.5" ? "selected" : ""; ?>>10.5</option>
                                                                    <option value="11" <?= @$TypicallyWearMen->shoe == "11" ? "selected" : ""; ?>>11</option>
                                                                    <option value="11.5" <?= @$TypicallyWearMen->shoe == "11.5" ? "selected" : ""; ?>>11.5</option>
                                                                    <option value="12" <?= @$TypicallyWearMen->shoe == "12" ? "selected" : ""; ?>>12</option>
                                                                    <option value="12.5" <?= @$TypicallyWearMen->shoe == "12.5" ? "selected" : ""; ?>>12.5</option>
                                                                    <option value="13" <?= @$TypicallyWearMen->shoe == "13" ? "selected" : ""; ?>>13</option>
                                                                    <option value="14" <?= @$TypicallyWearMen->shoe == "14" ? "selected" : ""; ?>>14</option>
                                                                    <option value="15" <?= @$TypicallyWearMen->shoe == "15" ? "selected" : ""; ?>>15</option>
                                                                    <option value="16" <?= @$TypicallyWearMen->shoe == "16" ? "selected" : ""; ?>>16</option></select>
                                                            </div>
                                                            <div class="select-box select-box2">
                                                                <select name="shoe_medium">
                                                                    <?php /* ?><option value="Medium" <?= @$TypicallyWearMen->shoe_medium == "" ? "selected" : ""; ?>>Medium</option><?php */ ?>
                                                                    <option value="Narrow" <?= @$TypicallyWearMen->shoe_medium == "Narrow" ? "selected" : ""; ?>>Narrow</option>
                                                                    <option value="Medium" <?= @$TypicallyWearMen->shoe_medium == "Medium" ? "selected" : ""; ?>>Medium</option>
                                                                    <option value="Wide" <?= @$TypicallyWearMen->shoe_medium == "Wide" ? "selected" : ""; ?>>Wide</option>
                                                                    <option value="Extra Wide" <?= @$TypicallyWearMen->shoe_medium == "Extra Wide" ? "selected" : ""; ?>>Extra Wide</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>What is your profession?</h3>
                                                        <div class="occupation">
                                                            <ul>
                                                                <li><label for="radioa6" class="input-control radio">
                                                                        <input type="radio" id="radioa6" name="your_occupation" <?= @$MenStats->your_occupation == 1 ? "checked" : ""; ?> value="1">
                                                                        <span class="input-control__indicator"></span>Architecture / Engineering     
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob1" class="input-control radio">
                                                                        <input type="radio" id="radiob1" name="your_occupation" value="2" <?= @$MenStats->your_occupation == 2 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Art / Design
                                                                    </label></li>
                                                                <li><label for="radioc2" class="input-control radio">
                                                                        <input type="radio" id="radioc2" name="your_occupation" value="3" <?= @$MenStats->your_occupation == 3 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Building / Maintenance
                                                                    </label></li>
                                                                <li><label for="radioa3" class="input-control radio">
                                                                        <input type="radio" id="radioa3" name="your_occupation" value="4" <?= @$MenStats->your_occupation == 4 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Business / Client Service
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob4" class="input-control radio">
                                                                        <input type="radio" id="radiob4" name="your_occupation" value="5" <?= @$MenStats->your_occupation == 5 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Community / Social Service
                                                                    </label></li>
                                                                <li><label for="radioc5" class="input-control radio">
                                                                        <input type="radio" id="radioc5" name="your_occupation" value="6" <?= @$MenStats->your_occupation == 6 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Computer / IT
                                                                    </label></li>
                                                                <li><label for="radioa7" class="input-control radio">
                                                                        <input type="radio" id="radioa7" name="your_occupation" value="7" <?= @$MenStats->your_occupation == 7 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Education
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob8" class="input-control radio">
                                                                        <input type="radio" id="radiob8" name="your_occupation" value="8"<?= @$MenStats->your_occupation == 8 ? "checked" : ""; ?> >
                                                                        <span class="input-control__indicator"></span>Entertainer / Performer
                                                                    </label></li>
                                                                <li><label for="radioc9" class="input-control radio">
                                                                        <input type="radio" id="radioc9" name="your_occupation" value="9" <?= @$MenStats->your_occupation == 9 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Farming / Fishing / Forestry
                                                                    </label></li>
                                                                <li><label for="radioc10" class="input-control radio">
                                                                        <input type="radio" id="radioc10" name="your_occupation" value="10" <?= @$MenStats->your_occupation == 10 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Financial Services
                                                                    </label></li>
                                                                <li><label for="radioa11" class="input-control radio">
                                                                        <input type="radio" id="radioa11" name="your_occupation" value="11" <?= @$MenStats->your_occupation == 11 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Health Practitioner / Technician
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob12" class="input-control radio">
                                                                        <input type="radio" id="radiob12" name="your_occupation" value="12" <?= @$MenStats->your_occupation == 12 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Hospitality / Food Service
                                                                    </label></li>
                                                                <li><label for="radio13" class="input-control radio">
                                                                        <input type="radio" id="radio13" name="your_occupation" value="13" <?= @$MenStats->your_occupation == 13 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Management
                                                                    </label></li>
                                                                <li><label for="radioa14" class="input-control radio">
                                                                        <input type="radio" id="radioa14" name="your_occupation" value="14" <?= @$MenStats->your_occupation == 14 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Media / Communications
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob15" class="input-control radio">
                                                                        <input type="radio" id="radiob15" name="your_occupation" value="15" <?= @$MenStats->your_occupation == 15 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Military / Protective Service
                                                                    </label></li>
                                                                <li><label for="radioc16" class="input-control radio">
                                                                        <input type="radio" id="radioc16" name="your_occupation" value="16" <?= @$MenStats->your_occupation == 16 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Legal
                                                                    </label></li>
                                                                <li><label for="radioa17" class="input-control radio">
                                                                        <input type="radio" id="radioa17" name="your_occupation" value="17" <?= @$MenStats->your_occupation == 17 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Office / Administration
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob18" class="input-control radio">
                                                                        <input type="radio" id="radiob18" name="your_occupation" value="18" <?= @$MenStats->your_occupation == 18 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Average
                                                                    </label></li>
                                                                <li><label for="radioc19" class="input-control radio">
                                                                        <input type="radio" id="radioc19" name="your_occupation" value="19" <?= @$MenStats->your_occupation == 19 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Personal Care & Service
                                                                    </label></li>
                                                                <li><label for="radioc20" class="input-control radio">
                                                                        <input type="radio" id="radioc20" name="your_occupation" value="20" <?= @$MenStats->your_occupation == 20 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Production / Manufacturing
                                                                    </label></li>
                                                                <li><label for="radioa21" class="input-control radio">
                                                                        <input type="radio" id="radioa21" name="your_occupation" value="21" <?= @$MenStats->your_occupation == 21 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Retail
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob22" class="input-control radio">
                                                                        <input type="radio" id="radiob22" name="your_occupation" value="22" <?= @$MenStats->your_occupation == 22 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Sales
                                                                    </label></li>
                                                                <li><label for="radioc23" class="input-control radio">
                                                                        <input type="radio" id="radioc23" name="your_occupation" value="23" <?= @$MenStats->your_occupation == 23 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Science
                                                                    </label></li>
                                                                <li><label for="radioa24" class="input-control radio">
                                                                        <input type="radio" id="radioa24" name="your_occupation" value="24" <?= @$MenStats->your_occupation == 24 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Technology
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob25" class="input-control radio">
                                                                        <input type="radio" id="radiob25" name="your_occupation" value="25" <?= @$MenStats->your_occupation == 25 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Transportation
                                                                    </label></li>
                                                                <li><label for="radioc26" class="input-control radio">
                                                                        <input type="radio" id="radioc26" name="your_occupation" value="26" <?= @$MenStats->your_occupation == 26 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Self-Employed
                                                                    </label></li>
                                                                <li><label for="radioa27" class="input-control radio">
                                                                        <input type="radio" id="radioa27" name="your_occupation" value="27" <?= @$MenStats->your_occupation == 27 ? "checked" : ""; ?> >
                                                                        <span class="input-control__indicator"></span>Stay-At-Home Parent
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob28" class="input-control radio">
                                                                        <input type="radio" id="radiob28" name="your_occupation" value="28" <?= @$MenStats->your_occupation == 28 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Student
                                                                    </label></li>
                                                                <li><label for="radioc29" class="input-control radio">
                                                                        <input type="radio" id="radioc29" name="your_occupation" value="29" <?= @$MenStats->your_occupation == 29 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Retired
                                                                    </label></li>
                                                                <li><label for="radioc30" class="input-control radio">
                                                                        <input type="radio" id="radioc30" name="your_occupation" value="30" <?= @$MenStats->your_occupation == 30 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Not Employed
                                                                    </label></li>
                                                                <li><label for="radioc31" class="input-control radio">
                                                                        <input type="radio" id="radioc31" name="your_occupation" value="31" <?= @$MenStats->your_occupation == 31 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Other
                                                                    </label></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box body-men">
                                                        <h3>Tell us Your body Shape?</h3>
                                                        <ul>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Rectangle</h4>
                                                                <input <?= @$TypicallyWearMen->body_type == 2 ? "checked" : ""; ?> class="radio-box" id="radio2" name="body_type" value="2" type="radio">
                                                                <label for="radio2">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-2.png" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Triangle</h4>
                                                                <input  <?= @$TypicallyWearMen->body_type == 3 ? "checked" : ""; ?> class="radio-box" id="radio3" type="radio" name="body_type" value="3">
                                                                <label for="radio3">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-3.png" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Trapezoid</h4>
                                                                <input <?= @$TypicallyWearMen->body_type == 1 ? "checked" : ""; ?>  class="radio-box" name="body_type" value="1" id="radio1" type="radio">
                                                                <label for="radio1">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-1.png" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Oval</h4>
                                                                <input <?= @$TypicallyWearMen->body_type == 4 ? "checked" : ""; ?> class="radio-box" id="radio4" type="radio" name="body_type" value="4">
                                                                <label for="radio4">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-4.png" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Inverted Triangle</h4>
                                                                <input <?= @$TypicallyWearMen->body_type == 5 ? "checked" : ""; ?> class="radio-box" id="radio5" type="radio" name="body_type" value="5">
                                                                <label for="radio5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-5.png" alt="">
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 skin">
                                                        <h3>Tell us your skin Tone?</h3>
                                                        <ul>
                                                            <li>
                                                                <input <?= @$TypicallyWearMen->skin_tone == 1 ? "checked" : ""; ?> class="radio-box" id="radio2a" name="skin_tone" value="1" type="radio">
                                                                <label for="radio2a"></label>
                                                            </li>
                                                            <li>
                                                                <input <?= @$TypicallyWearMen->skin_tone == 2 ? "checked" : ""; ?> class="radio-box" id="radio2b" name="skin_tone" value="2" type="radio">
                                                                <label for="radio2b"></label>
                                                            </li>
                                                            <li>
                                                                <input  <?= @$TypicallyWearMen->skin_tone == 3 ? "checked" : ""; ?> class="radio-box" id="radio2c" name="skin_tone" value="3" type="radio">
                                                                <label for="radio2c"></label>
                                                            </li>
                                                            <li>
                                                                <input <?= @$TypicallyWearMen->skin_tone == 4 ? "checked" : ""; ?> class="radio-box" id="radio2d" name="skin_tone" value="4" type="radio">
                                                                <label for="radio2d"></label>
                                                            </li>
                                                            <li>
                                                                <input <?= @$TypicallyWearMen->skin_tone == 5 ? "checked" : ""; ?> class="radio-box" id="radio2e" name="skin_tone" value="5" type="radio">
                                                                <label for="radio2e"></label>
                                                            </li>
                                                            <li>
                                                                <input <?= @$TypicallyWearMen->skin_tone == 6 ? "checked" : ""; ?> class="radio-box" id="radio2f" name="skin_tone"  value='6' type="radio">
                                                                <label for="radio2f"><span>OTHER</span></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data social-filed">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>You social media profiles will help your personal Stylist to know you better.</h3>
                                                        <div class=" select-box">
                                                            <h4>LINKEDIN PROFILE</h4>
                                                            <small>Ex: linkedin.com/in/username. </small>
                                                            <input placeholder="" name="linkdin_profile" id="linkdin_profile" value="<?= @$MenStyle->linkdin_profile; ?>" type="text" class="form-control">
                                                        </div>
                                                        <div class=" select-box">
                                                            <h4>INSTAGRAM HANDLE</h4>
                                                            <small>Ex: drapefit </small>
                                                            <input placeholder="" name="instagram" id="instagram" value="<?= @$MenStyle->instagram; ?>" type="text" class="form-control">
                                                        </div>
                                                        <div class=" select-box">
                                                            <h4>TWITTER HANDLE</h4>
                                                            <small>Ex: drapefit </small>
                                                            <input placeholder="" name="twitter" id="twitter" value="<?= @$MenStyle->twitter; ?>"  type="text" class="form-control">
                                                        </div>
                                                        <div class=" select-box">
                                                            <h4>PINTEREST HANDLE</h4>
                                                            <small>Ex: drapefit </small>
                                                            <input placeholder="" name="pinterest" id="pinterest" value="<?= @$MenStyle->pinterest; ?>" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit" name='men_stas' value="men_stas">Next : Style Fit <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>

                                        </div>
                                        <?= $this->Form->end(); ?>
                                    </div>


                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'fit') { ?> active in <?php } ?>" id="Section2">
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleMenSection2')) ?>
                                        <div class="left-bar fixed" id="sidebar2">
                                            <div class="under-box">
                                                <h2>Hi <?php echo $profileName; ?></h2>
                                                <p>Please complete your style information that will help us to get completed a best FIT for you.</p>
                                                <div class="profile-image">
                                                    <span><img src="<?php echo HTTP_ROOT ?>assets/men-img/Style_Fit.jpg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <div class="form-box-data" style="margin-top: 0;">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box">
                                                        <h3 style="margin-top: 0;">What do you typically wear to work?</h3>

                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Casual</h4>                                                           
                                                                <input class="radio-box" id="mens1" name="style_sphere_selections_v2[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> checked <?php } ?>>
                                                                <label for="mens1">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencasual.jpg" alt="">
                                                                </label>

                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Business Casual</h4>                                                         
                                                                <input class="radio-box" id="mens26" name="style_sphere_selections_v2[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> checked <?php } ?>>
                                                                <label for="mens26">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/business-casual.jpg" alt="">
                                                                </label>

                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Formal</h4>                                                           
                                                                <input class="radio-box" id="mens3" name="style_sphere_selections_v2[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> checked <?php } ?>>
                                                                <label for="mens3">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/formal-wear.jpg" alt="">
                                                                </label>

                                                            </li>  
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box for-error">
                                                        <h3>Your casual shirts to  fit?</h3>

                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Slim</h4>                                                           
                                                                <input class="radio-box" id="mens4" name="style_sphere_selections_v3[]" value="4" type="checkbox"<?php if (isset($style_sphere_selections->style_sphere_selections_v3) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v3))) { ?> checked <?php } ?>>
                                                                <label for="mens4">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencasualslim.jpg" alt="">
                                                                </label>

                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Regular</h4>                                                         
                                                                <input class="radio-box" id="mens5" name="style_sphere_selections_v3[]" value="5" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v3) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v3))) { ?> checked <?php } ?>>
                                                                <label for="mens5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencasualregular.jpg" alt="">
                                                                </label>

                                                            </li>   
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box for-error for-error1">
                                                        <h3>How do you like your button-up shirts to fit?</h3>

                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Slim</h4>                                                           
                                                                <input class="radio-box" id="mens6" name="style_sphere_selections_v4[]" value="6" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v4) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v4))) { ?> checked <?php } ?>>
                                                                <label for="mens6">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menbottomupslimfit.jpg" alt="">
                                                                </label>
                                                                <span>Fitted through the chest, trim through the waist, tapered sleeves</span>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Regular</h4>                                                         
                                                                <input class="radio-box" id="mens7" name="style_sphere_selections_v4[]" value="7" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v4) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v4))) { ?> checked <?php } ?>>
                                                                <label for="mens7">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menbottomupregular.jpg" alt="">
                                                                </label>
                                                                <span>Relaxed through the chest, waist, armholes & sleeves</span>
                                                            </li>   
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box for-error for-error2">
                                                        <h3>How do you like your jeans to fit?</h3>
                                                        <ul>

                                                            <li>
                                                                <h4>Straight </h4>
                                                                <input class="radio-box" id="radio213" name="jeans_to_fit[]" value="3" type="checkbox" <?= in_array(3, explode(",", @$MenFit->jeans_to_fit)) ? "checked" : ""; ?>>
                                                                <label for="radio213">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menstaightjeans.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4>Slim</h4>
                                                                <input class="radio-box" id="radio212" name="jeans_to_fit[]" value="2" type="checkbox" <?= in_array(2, explode(",", @$MenFit->jeans_to_fit)) ? "checked" : ""; ?>>
                                                                <label for="radio212">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menslimjean.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4>Skinny</h4>
                                                                <input class="radio-box" name="jeans_to_fit[]" value="1" id="radio112" type="checkbox" <?= in_array(1, explode(",", @$MenFit->jeans_to_fit)) ? "checked" : ""; ?>>
                                                                <label for="radio112">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menskinnjeans.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li>
                                                                <h4>Relaxed</h4>
                                                                <input class="radio-box" id="radio214" name="jeans_to_fit[]" value="4" type="checkbox" <?= in_array(4, explode(",", @$MenFit->jeans_to_fit)) ? "checked" : ""; ?>>
                                                                <label for="radio214">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menrelaxejeans.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 for-error">
                                                        <div class="type-box">
                                                            <h3>Bottoms</h3>
                                                            <ul>
                                                                <li>
                                                                    <h4>Tighter Fitting</h4>
                                                                    <input class="radio-box" name="your_pants_to_fit[]" value="1" id="radio114" type="checkbox" <?= in_array(1, explode(",", @$MenFit->your_pants_to_fit)) ? "checked" : ""; ?>>
                                                                    <label for="radio114">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/mentightbottom.jpg" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <h4>More Relaxed</h4>
                                                                    <input class="radio-box" id="radio217" name="your_pants_to_fit[]" value="2" type="checkbox" <?= in_array(2, explode(",", @$MenFit->your_pants_to_fit)) ? "checked" : ""; ?>>
                                                                    <label for="radio217">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/menrelaxedpant.jpg" alt="">
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 for-error for-error3">
                                                        <div class="type-box size-small">
                                                            <h3>How long do you prefer your shorts? </h3>
                                                            <ul>
                                                                <li>
                                                                    <h4>Upper Thigh</h4>
                                                                    <input class="radio-box" id="radio315" name="prefer_your_shorts[]" value="4" type="checkbox" <?= in_array(4, explode(",", @$MenFit->prefer_your_shorts)) ? "checked" : ""; ?>>
                                                                    <label for="radio315">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/menuowerthighshort.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                                <li>
                                                                    <h4>Lower Thigh </h4>
                                                                    <input class="radio-box" id="radio219" name="prefer_your_shorts[]" value="3" type="checkbox" <?= in_array(3, explode(",", @$MenFit->prefer_your_shorts)) ? "checked" : ""; ?>>
                                                                    <label for="radio219">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/menlowerthighshorts.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                                <li>
                                                                    <h4>Above Knee </h4>
                                                                    <input class="radio-box" id="radio218" name="prefer_your_shorts[]" value="2" type="checkbox" <?= in_array(2, explode(",", @$MenFit->prefer_your_shorts)) ? "checked" : ""; ?>>
                                                                    <label for="radio218">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/menatkshorts.jpg" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <h4>At The Knee </h4>
                                                                    <input class="radio-box" name="prefer_your_shorts[]" value="1" id="radio118" type="checkbox" <?= in_array(1, explode(",", @$MenFit->prefer_your_shorts)) ? "checked" : ""; ?>>
                                                                    <label for="radio118">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/menattekneeshorts.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 Color-prefer">
                                                        <h3>Tell Us Which Color do you want to prefer?</h3>
                                                        <ul>
                                                            <li>
                                                                <h4>Black</h4>
                                                                <input class="radio-box" id="radio3a" value='1' name="prefer_color[]" type="checkbox"  <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('1', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3a"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Grey</h4>
                                                                <input class="radio-box" id="radio3b" value='2' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('2', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3b"></label>
                                                            </li>
                                                            <li>
                                                                <h4>White</h4>
                                                                <input class="radio-box" id="radio3c" value='3' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('3', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3c"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Cream</h4>
                                                                <input class="radio-box" id="radio3d" value='4' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('4', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3d"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Brown</h4>
                                                                <input class="radio-box" id="radio3e" value='5' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('5', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3e"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Purple</h4>
                                                                <input class="radio-box" id="radio3f" value='6' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('6', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3f"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Green</h4>
                                                                <input class="radio-box" id="radio3g" value='7' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('7', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3g"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Blue</h4>
                                                                <input class="radio-box" id="radio3h" value='8' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('8', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3h"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Orange</h4>
                                                                <input class="radio-box" id="radio3i" value='9' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('9', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3i"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Yellow</h4>
                                                                <input class="radio-box" id="radio3j" value='10' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('10', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3j"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Red</h4>
                                                                <input class="radio-box" id="radio3k" value='11' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('11', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3k"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Pink</h4>
                                                                <input class="radio-box" id="radio3l" value='12' name="prefer_color[]" type="checkbox" <?php if ((strlen(@$MenFit->prefer_color) > 2 ) && (in_array('12', json_decode(@$MenFit->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3l"></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <div class="type-box type-box2 error-issues">
                                                            <h3>Tell us which of these outfits would you prefer to wear?</h3>
                                                            <ul>
                                                                <li>
                                                                    <input class="radio-box" name="style_sphere_selections_v5[]" value="1" id="mens101" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens101">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit1.jpg" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input class="radio-box" name="style_sphere_selections_v5[]" value="2" type="checkbox" id="mens102" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens102">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit2.jpg" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input class="radio-box" id="mens103" name="style_sphere_selections_v5[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens103">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit3.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens104" name="style_sphere_selections_v5[]" value="4" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens104">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit4.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens105" name="style_sphere_selections_v5[]" value="5" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens105">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit5.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens106" name="style_sphere_selections_v5[]" value="6" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens106">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit6.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens107" name="style_sphere_selections_v5[]" value="7" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens107">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit7.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens108" name="style_sphere_selections_v5[]" value="8" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('8', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens108">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit8.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens109" name="style_sphere_selections_v5[]" value="9" type="checkbox"<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('9', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens109">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit9.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens110" name="style_sphere_selections_v5[]" value="10" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('10', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens110">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit10.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens111" name="style_sphere_selections_v5[]" value="11" type="checkbox"<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('11', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens111">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit11.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens112" name="style_sphere_selections_v5[]" value="12" type="checkbox"<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('12', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens112">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit12.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens113" name="style_sphere_selections_v5[]" value="13" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('13', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens113">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit13.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens114" name="style_sphere_selections_v5[]" value="14" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('14', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens114">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit14.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens115" name="style_sphere_selections_v5[]" value="15" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('15', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens115">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit15.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens116" name="style_sphere_selections_v5[]" value="16" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('16', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens116">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit16.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens117" name="style_sphere_selections_v5[]" value="17" type="checkbox"<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('17', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens117">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit17.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens118" name="style_sphere_selections_v5[]" value="18" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('18', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens118">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit18.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens119" name="style_sphere_selections_v5[]" value="19" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('19', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens119">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit19.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens120" name="style_sphere_selections_v5[]" value="20" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('20', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> checked <?php } ?>>
                                                                    <label for="mens120">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit20.jpg" alt="">
                                                                    </label>
                                                                </li>  
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 note-label">
                                                        <h3>Any fit issues to take note of?</h3>
                                                        <ul>
                                                            <li>
                                                                <input class="radio-box" id="check-box3a" name="take_note_of[]" type="checkbox" value='1' <?= in_array(1, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?> >
                                                                <label for="check-box3a">Long Arms</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3b" name="take_note_of[]" type="checkbox" value='2' <?= in_array(2, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3b">Short Arms</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3c" name="take_note_of[]" type="checkbox" value='3'  <?= in_array(3, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3c">Thick Arms</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" value='15' id="check-box3d" name="take_note_of[]" type="checkbox" <?= in_array(15, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3d">Broad Shoulders</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3e" name="take_note_of[]" type="checkbox" value='4'  <?= in_array(4, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3e">Man Boobs</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3f" name="take_note_of[]" type="checkbox" value='5'  <?= in_array(5, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3f">Big Belly</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3g" name="take_note_of[]" type="checkbox" value='6'  <?= in_array(6, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3g">Big Butt</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3h" name="take_note_of[]" type="checkbox" value='14' <?= in_array(14, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?> >
                                                                <label for="check-box3h">Small Butt</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3i" name="take_note_of[]" type="checkbox" value='7'  <?= in_array(7, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3i">Thunder Things</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3j" name="take_note_of[]" type="checkbox" value='8'  <?= in_array(8, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3j">Thick Neck</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3k" name="take_note_of[]" type="checkbox" value='9'  <?= in_array(9, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3k">Short Torso</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3l"  value = '13' name="take_note_of[]" type="checkbox" <?= in_array(13, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3l">Long Torso</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3m" name="take_note_of[]" type="checkbox" value='10'  <?= in_array(10, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3m">Broad Cheast</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3n" name="take_note_of[]" type="checkbox" value='11'  <?= in_array(11, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3n">Very Skinny</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3o" name="take_note_of[]" type="checkbox" value='12'  <?= in_array(12, explode(",", @$MenFit->take_note_of)) ? "checked" : ""; ?>>
                                                                <label for="check-box3o">Skinny Legs</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit" name="men_stas" value="men_stas">Next : Price Range <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?= $this->Form->end(); ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'styles') { ?> active in <?php } ?>" id="Section3">
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleMenSection3')) ?>
                                        <div class="left-bar fixed" id="sidebar3">
                                            <div class="under-box">
                                                <h2>Hi <?php echo $profileName; ?></h2>
                                                <p>Please complete your price range you are looking for that will help us have a best FIT under your budget.</p>
                                                <div class="profile-image">
                                                    <span><img src="<?php echo HTTP_ROOT ?>assets/men-img/price-range.jpg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <div class="form-box-data" style="margin-top: 0;">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3 style="margin-top: 0;">Help Us to Know your Budget</h3> 
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">SHIRTS</font></b></nav>                                                
                                                        <ul>
                                                            <li><label for="spendiness_button_up_shirts_mens" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens" name="button_shirts" value="1" <?= @$MenStyle->button_shirts == 1 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>Under $50

                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_button_up_shirts_mens2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens2" name="button_shirts" value="2" <?= @$MenStyle->button_shirts == 2 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$50 - $75
                                                                </label></li>
                                                            <li><label for="spendiness_button_up_shirts_mens3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens3" name="button_shirts" value="3" <?= @$MenStyle->button_shirts == 3 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $100
                                                                </label></li>
                                                            <li><label for="spendiness_button_up_shirts_mens4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens4" name="button_shirts" value="4" <?= @$MenStyle->button_shirts == 4 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$100 - $125
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_button_up_shirts_mens5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens5" name="button_shirts" value="5" <?= @$MenStyle->button_shirts == 5 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$125+
                                                                </label></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">TEES & POLOS</font></b></nav>                                                
                                                        <ul>
                                                            <li><label for="spendiness_tees_polos" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos" name="tees_polos" value="1" <?= @$MenStyle->tees_polos == 1 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>Under $30
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_tees_polos2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos2" name="tees_polos" value="2" <?= @$MenStyle->tees_polos == 2 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$30 - $50
                                                                </label></li>
                                                            <li><label for="spendiness_tees_polos3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos3" name="tees_polos" value="3" <?= @$MenStyle->tees_polos == 3 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$50 - $70
                                                                </label></li>
                                                            <li><label for="spendiness_tees_polos4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos4" name="tees_polos" value="4" <?= @$MenStyle->tees_polos == 4 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$70 - $90
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_tees_polos5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos5" name="tees_polos" value="5" <?= @$MenStyle->tees_polos == 5 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span> $90+
                                                                </label></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">SWEATERS & SWEATSHIRTS</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_sweaters_sweatshirts1" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts1" name="weaters_sweatshirts" value="1" <?= @$MenStyle->weaters_sweatshirts == 1 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>Under $50
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_sweaters_sweatshirts2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts2" name="weaters_sweatshirts" value="2" <?= @$MenStyle->weaters_sweatshirts == 2 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$50 - $75
                                                                </label></li>
                                                            <li><label for="spendiness_sweaters_sweatshirts3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts3" name="weaters_sweatshirts" value="3" <?= @$MenStyle->weaters_sweatshirts == 3 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $100
                                                                </label></li>
                                                            <li><label for="spendiness_sweaters_sweatshirts4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts4" name="weaters_sweatshirts" value="4" <?= @$MenStyle->weaters_sweatshirts == 4 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$100 - $125
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_sweaters_sweatshirts5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts5" name="weaters_sweatshirts" value="5" <?= @$MenStyle->weaters_sweatshirts == 5 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$125+
                                                                </label></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">PANTS & DENIM</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_pants_denim" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim" name="pants_denim" value="1" <?= @$MenStyle->pants_denim == 1 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>Under $75
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_pants_denim2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim2" name="pants_denim" value="2" <?= @$MenStyle->pants_denim == 2 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $100
                                                                </label></li>
                                                            <li><label for="spendiness_pants_denim3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim3" name="pants_denim" value="3" <?= @$MenStyle->pants_denim == 3 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$100 - $125
                                                                </label></li>
                                                            <li><label for="spendiness_pants_denim4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim4" name="pants_denim" value="4" <?= @$MenStyle->pants_denim == 4 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$125 - $175
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_pants_denim5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim5" name="pants_denim" value="5" <?= @$MenStyle->pants_denim == 5 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$175+
                                                                </label></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">SHORTS</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_shorts" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts" name="shorts" value="1"  <?= @$MenStyle->shorts == 1 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>Under $40
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_shorts2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts2" name="shorts" value="2"  <?= @$MenStyle->shorts == 2 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$40 - $60
                                                                </label></li>
                                                            <li><label for="spendiness_shorts32" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts32" name="shorts" value="3"  <?= @$MenStyle->shorts == 3 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$60 - $80
                                                                </label></li>
                                                            <li><label for="spendiness_shorts42" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts42" name="shorts" value="4"  <?= @$MenStyle->shorts == 4 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$80 - $100
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_shorts52" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts52" name="shorts" value="5"  <?= @$MenStyle->shorts == 5 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$100+
                                                                </label></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">SHOES </font></b></nav>
                                                        <ul>
                                                            <li><label for="SHOES1" class="input-control radio">
                                                                    <input type="radio" id="SHOES1" name="shoes" value="1"  <?= @$MenStyle->shoes == 1 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>Under $75
                                                                </label>
                                                            </li>
                                                            <li><label for="SHOES2" class="input-control radio">
                                                                    <input type="radio" id="SHOES2" name="shoes" value="2"  <?= @$MenStyle->shoes == 2 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $125
                                                                </label></li>
                                                            <li><label for="SHOES3" class="input-control radio">
                                                                    <input type="radio" id="SHOES3" name="shoes" value="3"  <?= @$MenStyle->shoes == 3 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$125 - $175
                                                                </label></li>
                                                            <li><label for="SHOES4" class="input-control radio">
                                                                    <input type="radio" id="SHOES4" name="shoes" value="4"  <?= @$MenStyle->shoes == 4 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$175 - $250
                                                                </label>
                                                            </li>
                                                            <li><label for="SHOES5" class="input-control radio">
                                                                    <input type="radio" id="SHOES5" name="shoes" value="5"  <?= @$MenStyle->shoes == 5 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$250+
                                                                </label></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">OUTERWEAR</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_blazers_outerwear1" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear1" name="blazers_outerwear" value="1" <?= @$MenStyle->blazers_outerwear == 1 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>Under $75

                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_blazers_outerwear2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear2" name="blazers_outerwear" value="2" <?= @$MenStyle->blazers_outerwear == 2 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $125
                                                                </label></li>
                                                            <li><label for="spendiness_blazers_outerwear3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear3" name="blazers_outerwear" value="3" <?= @$MenStyle->blazers_outerwear == 3 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$125 - $175
                                                                </label></li>
                                                            <li><label for="spendiness_blazers_outerwear4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear4" name="blazers_outerwear" value="4" <?= @$MenStyle->blazers_outerwear == 4 ? "checked" : ""; ?>>
                                                                    <span class="input-control__indicator"></span>$175 - $250
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="form-box-data accessorise">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>Accessories</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h4>Ties</h4>
                                                        <div class="select-boxes">
                                                            <select name='men_tites'>
                                                                <option <?php if (@$menSccessories->men_tites == 'I want the best') { ?> selected <?php } ?> value = 'I want the best'>I want the best</option>
                                                                <option <?php if (@$menSccessories->men_tites == '40-60') { ?> selected <?php } ?> value = '40-60'>$40 - $60</option>
                                                                <option <?php if (@$menSccessories->men_tites == 'up-to-80') { ?> selected <?php } ?> value = 'up-to-80'>Up to $80</option>
                                                                <option <?php if (@$menSccessories->men_tites == 'up-to-100') { ?> selected <?php } ?> value = 'up-to-100'>Up to  $100</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Belts</h4>
                                                        <div class="select-boxes">
                                                            <select name='men_belts'>
                                                                <option <?php if (@$menSccessories->men_belts == 'I want the best') { ?> selected <?php } ?> value ='I want the best'>I want the best</option>
                                                                <option <?php if (@$menSccessories->men_belts == '30-50') { ?> selected <?php } ?> value ='30-50'>$30 - $50</option>
                                                                <option <?php if (@$menSccessories->men_belts == 'up-to-70') { ?> selected <?php } ?> value = 'up-to-70' >Up to $70</option>
                                                                <option <?php if (@$menSccessories->men_belts == 'up-to-90') { ?> selected <?php } ?> value = 'up-to-90'> Up to  $90</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Wallets,Bags, Accessories</h4>
                                                        <div class="select-boxes">
                                                            <select name='men_wallets_begs'>
                                                                <option <?php if (@$menSccessories->men_wallets_begs == 'I want the best') { ?> selected <?php } ?> value = 'I want the best'>I want the best</option>
                                                                <option <?php if (@$menSccessories->men_wallets_begs == '25-50') { ?> selected <?php } ?> value = '25-50'>$25 - $50</option>
                                                                <option <?php if (@$menSccessories->men_wallets_begs == 'up-to-75') { ?> selected <?php } ?> value = 'up-to-75'>Up to $75</option>
                                                                <option <?php if (@$menSccessories->men_wallets_begs == 'up-to-100') { ?> selected <?php } ?> value = 'up-to-100' >Up to  $100</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Sunglasses</h4>
                                                        <div class="select-boxes">
                                                            <select name='men_sunglass'>
                                                                <option <?php if (@$menSccessories->men_sunglass == 'I want the best') { ?> selected <?php } ?> value='I want the best'>I want the best</option>
                                                                <option  <?php if (@$menSccessories->men_sunglass == '40-60') { ?> selected <?php } ?> value='40-60'>$40 - $60</option>
                                                                <option  <?php if (@$menSccessories->men_sunglass == 'up-to-80') { ?> selected <?php } ?> value='up-to-80'>Up to $80</option>
                                                                <option  <?php if (@$menSccessories->men_sunglass == 'up-to-100') { ?> selected <?php } ?> value = 'up-to-100' >Up to  $100</option>
                                                                <option  <?php if (@$menSccessories->men_sunglass == '100-150') { ?> selected <?php } ?> value = '100-150' >$100 - $150</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Hats</h4>
                                                        <div class="select-boxes">
                                                            <select name = 'men_hets'>
                                                                <option <?php if (@$menSccessories->men_hets == 'I want the best') { ?> selected <?php } ?> value = 'I want the best'>I want the best</option>
                                                                <option <?php if (@$menSccessories->men_hets == '30-50') { ?> selected <?php } ?>  value = '30-50'>$30 - $50</option>
                                                                <option <?php if (@$menSccessories->men_hets == 'up-to-70') { ?> selected <?php } ?>  value = 'up-to-70'>Up to $70</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data accessorise">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>Underwear & Grooming</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h4>Socks</h4>
                                                        <div class="select-boxes">
                                                            <select name='men_socks'>
                                                                <option <?php if (@$menSccessories->men_socks == 'I want the best') { ?> selected <?php } ?> value='I want the best'>I want the best</option>
                                                                <option <?php if (@$menSccessories->men_socks == '10-25') { ?> selected <?php } ?> value='10-25'>$10 - $25</option>
                                                                <option <?php if (@$menSccessories->men_socks == 'up-to-35') { ?> selected <?php } ?> value='up-to-35'>Up to $35</option>
                                                                <option <?php if (@$menSccessories->men_socks == 'up-to-45') { ?> selected <?php } ?> value = 'up-to-45'>Up to $45</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Underwear</h4>
                                                        <div class="select-boxes">
                                                            <select name='men_underwear'>
                                                                <option <?php if (@$menSccessories->men_underwear == 'I want the best') { ?> selected <?php } ?> value='I want the best'>I want the best</option>
                                                                <option <?php if (@$menSccessories->men_underwear == '10-25') { ?> selected <?php } ?>  value='10-25'>$10 - $25</option>
                                                                <option <?php if (@$menSccessories->men_underwear == 'up-to-35') { ?> selected <?php } ?>  value='up-to-35'>Up to $35</option>
                                                                <option <?php if (@$menSccessories->men_underwear == 'up-to-45') { ?> selected <?php } ?>  value = 'up-to-45'>Up to $45</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h4>Grooming</h4>
                                                        <div class="select-boxes">
                                                            <select name='men_grooming'>
                                                                <option value='I want the best' <?php if (@$menSccessories->men_grooming == 'I want the best') { ?> selected <?php } ?>>I want the best</option>
                                                                <option <?php if (@$menSccessories->men_grooming == '10-25') { ?> selected <?php } ?> value='10-25'> $10 - $25</option>
                                                                <option <?php if (@$menSccessories->men_grooming == 'up-to-35') { ?> selected <?php } ?> value = 'up-to-35'>Up to $35</option>
                                                                <option <?php if (@$menSccessories->men_grooming == 'up-to-45') { ?> selected <?php } ?> value = 'up-to-45' >Up to $45</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit" name="men_price" value="men_price" >Next : Custom Design & Brands <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?= $this->Form->end(); ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'custom') { ?> active in <?php } ?>" id="Section4">

                                        <?= $this->Form->create('img', array('id' => "imgfrm", 'type' => 'file')); ?>
                                        <input type="file"  name='file' id="imgupload1" style="display:none"/> 
                                        <?= $this->Form->end() ?>
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleMenSection4')) ?>
                                        <div class="left-bar fixed" id="sidebar4">
                                            <div class="under-box">
                                                <h2>Hi <?php echo $profileName; ?></h2>
                                                <p>We are working with hundreds of brands and will help you FIT you under your budget.</p>
                                                <div class="profile-image">
                                                    <span><img  src="<?php echo HTTP_ROOT ?>assets/men-img/brands.jpg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <div class="form-box-data" style="margin-top: 0;">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 custome">
                                                        <h3 style="margin-top: 0;">Please do double click to upload any reference images / design you want your stylist to work for you ?</h3>
                                                        <div class="catlog-product-img">
                                                            <ul>
                                                                <li>
                                                                    <div class="upload-img">
                                                                        <?php if (@$menDesigne->img_1 == '') { ?>
                                                                            <img  id='img1' src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign1.jpg" alt="">
                                                                        <?php } else { ?>
                                                                            <img  id='img1' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_1; ?>" alt="">
                                                                        <?php } ?>
                                                                        <span data-id='1' class='img' ><i class="fa fa-camera"></i></span>
                                                                    </div>
                                                                    <h4>First Design</h4>
                                                                </li>
                                                                <li>
                                                                    <div class="upload-img">
                                                                        <?php if (@$menDesigne->img_2 == '') { ?>
                                                                            <img id='img2' src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign2.jpg" alt="">
                                                                        <?php } else { ?>
                                                                            <img  id='img2' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_2; ?>" alt="">
                                                                        <?php } ?>
                                                                        <span data-id='2' class='img' ><i class="fa fa-camera"></i></span>
                                                                    </div>
                                                                    <h4>Second Design</h4>
                                                                </li>
                                                                <li>
                                                                    <div class="upload-img">
                                                                        <?php if (@$menDesigne->img_3 == '') { ?>
                                                                            <img id='img3' src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign3.jpg" alt="">
                                                                        <?php } else { ?>
                                                                            <img  id='img3' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_3; ?>" alt="">
                                                                        <?php } ?>
                                                                        <span data-id='3' class='img'><i class="fa fa-camera"></i></span>
                                                                    </div>
                                                                    <h4>Third Design</h4>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <div class="type-box">
                                                            <h3> Brand or store you prefer to shop ?</h3>
                                                            <ul>
                                                                <li>
                                                                    <input class="radio-box" name="mens_brands[]" value="penguin" id="mens_brands1" type="checkbox" <?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands1">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/penguin.png" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands2" name="mens_brands[]" value="nike" type="checkbox" <?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?> checked <?php } ?> >
                                                                    <label for="mens_brands2">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/nike.png" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands3" name="mens_brands[]" value="scotch" type="checkbox" <?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands3">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/scotch.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands4" name="mens_brands[]" value="gap" type="checkbox" <?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands4">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/gap.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands5" name="mens_brands[]" value="pata" type="checkbox" <?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands5">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/pata.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands6" name="mens_brands[]" value="tommy" type="checkbox" <?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands6">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/tommy.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands7" name="mens_brands[]" value="boss" type="checkbox" <?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands7">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/boss.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands8" name="mens_brands[]" value="vineyard" type="checkbox" <?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands8">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vineyard.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands9" name="mens_brands[]" value="vans" type="checkbox" <?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands9">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vans.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands10" name="mens_brands[]" value="hurley" type="checkbox" <?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands10">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/hurley.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands11" name="mens_brands[]" value="brooks" type="checkbox" <?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands11">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/brooks.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands12" name="mens_brands[]" value="zara" type="checkbox" <?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands12">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/zara.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands13" name="mens_brands[]" value="levis" type="checkbox" <?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands13">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/levis.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands14" name="mens_brands[]" value="armour" type="checkbox" <?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands14">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/armour.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands15" name="mens_brands[]" value="bonobos" type="checkbox" <?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands15">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/bonobos.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands16" name="mens_brands[]" value="landsend" type="checkbox" <?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands16">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/landsend.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands17" name="mens_brands[]" value="jcrew" type="checkbox" <?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands17">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/jcrew.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands18" name="mens_brands[]" value="oldnavy" type="checkbox" <?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands18">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/oldnavy.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands19" name="mens_brands[]" value="uniqlo" type="checkbox" <?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands19">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/uniqlo.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands20" name="mens_brands[]" value="northface" type="checkbox" <?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands20">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/northface.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands21" name="mens_brands[]" value="hm" type="checkbox" <?php if (isset($menbrand) && in_array('hm', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands21">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/h&amp;m.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands22" name="mens_brands[]" value="eagle" type="checkbox" <?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands22">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/eagle.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands23" name="mens_brands[]" value="ragnbone" type="checkbox" <?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands23">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/ragnbone.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands24" name="mens_brands[]" value="bensharma" type="checkbox" <?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands24">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/bensharma.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands25" name="mens_brands[]" value="express" type="checkbox" <?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands25">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/express.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands26" name="mens_brands[]" value="polo" type="checkbox" <?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands26">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/polo.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27b" name="mens_brands[]" value="dillards" type="checkbox" <?php if (isset($menbrand) && in_array('dillards', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27b">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-a.jpg" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27c" name="mens_brands[]" value="mecy" type="checkbox" <?php if (isset($menbrand) && in_array('mecy', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27c">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-b.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27d" name="mens_brands[]" value="naimai" type="checkbox" <?php if (isset($menbrand) && in_array('naimai', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27d">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-c.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27e" name="mens_brands[]" value="urban" type="checkbox" <?php if (isset($menbrand) && in_array('urban', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27e">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-d.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27f" name="mens_brands[]" value="nordstrom" type="checkbox" <?php if (isset($menbrand) && in_array('nordstrom', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27f">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-e.jpg" alt="">
                                                                    </label>
                                                                </li>   
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data" style="border-bottom: none;">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 textarea-box">
                                                        <h3 style="margin-top: 10px">Add additional comments</h3>
                                                        <textarea name='profile_note' style="margin-top: 0"><?php echo @$MenStyle->profile_note; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit" name="men_custom" value="men_custom">Next : Manage Your Fit Settings <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo $this->Form->end(); ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php } else if ($this->request->session()->read('PROFILE') == 'KIDS') {
            ?>
            <style>
                #girlsImg{
                    display: none;
                }

            </style>
            <script>
                $(document).ready(function () {
                    $('#switch_left').click(function () {
                        $('#boysImg').hide();
                        $('#girlsImg').show();
                        $('#noImgx').hide();
                        $('#kids_clothing_gender-error').html('');
                    });
                    $('#switch_right').click(function () {
                        $('#boysImg').show();
                        $('#girlsImg').hide();
                        $('#noImgx').hide();
                        $('#kids_clothing_gender-error').html('');
                    });
                    $('#switch_left1').click(function () {
                        $('#kids_relationship_to_child-error').html('');
                    });
                    $('#switch_right1').click(function () {
                        $('#kids_relationship_to_child-error').html('');
                    });
                    $('#switch_right2').click(function () {
                        $('#kids_relationship_to_child-error').html('');
                    });
                });
            </script>
            <section class="style-contain style-men">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="tab" role="tabpanel">
                                <!-- Nav tabs -->

                                <div class="tab-button-list">
                                    <ul class="nav nav-tabs fixed" role="tablist" id="button-tablist">
                                        <li role="presentation"
                                        <?php
                                        if ($sections == 'stats') {
                                            echo 'class="active"';
                                        } elseif ($sections == '') {
                                            echo 'class="active"';
                                        }
                                        ?>>
                                            <a <?php if (@$kidname->is_progressbar >= 0) { ?> href="#Section1" aria-controls="home" role="tab" data-toggle="tab"<?php } ?> >Basic Information</a></li>
                                        <li role="presentation" <?php
                                        if ($sections == 'fit') {
                                            echo 'class="active"';
                                        }
                                        ?>><a <?php if (@$kidname->is_progressbar >= 25) { ?> href="#Section2" aria-controls="home" role="tab" data-toggle="tab"<?php } else { ?> style="opacity:0.5" <?php } ?>>Style Fit</a></li>
                                        <li role="presentation"
                                        <?php
                                        if ($sections == 'styles') {
                                            echo 'class="active"';
                                        }
                                        ?>
                                            ><a <?php if (@$kidname->is_progressbar >= 50) { ?> href="#Section3" aria-controls="home" role="tab" data-toggle="tab"<?php } else { ?> style="opacity:0.5" <?php } ?>>Price Range</a></li>
                                        <li role="presentation" <?php
                                        if ($sections == 'custom') {
                                            echo 'class="active"';
                                        }
                                        ?>><a <?php if (@$kidname->is_progressbar >= 75) { ?> href="#Section4" aria-controls="home" role="tab" data-toggle="tab"<?php } else { ?> style="opacity:0.5" <?php } ?>>Custom Design & Brands</a></li>
                                    </ul>



                                    <?php /* ?><ul class="nav nav-tabs fixed" role="tablist" id="button-tablist">
                                      <li role="presentation"
                                      <?php
                                      if ($sections == 'stats') {
                                      echo 'class="active"';
                                      } elseif ($sections == '') {
                                      echo 'class="active"';
                                      }
                                      ?>

                                      ><a <?php if (@$kidname->is_progressbar >= 0) { ?>href="#Section1" aria-controls="home" role="tab" data-toggle="tab" <?php } ?>>Basic Information</a></li>
                                      <li role="presentation"
                                      <?php
                                      if ($sections == 'fit') {
                                      echo 'class="active"';
                                      }
                                      ?>
                                      ><a <?php if (@$kidname->is_progressbar >= 25) { ?> href="#Section2" aria-controls="home" role="tab" data-toggle="tab"  <?php } else { ?> style="opacity:0.6" <?php } ?>>Style Fit</a></li>
                                      <li role="presentation"
                                      <?php
                                      if ($sections == 'styles') {
                                      echo 'class="active"';
                                      }
                                      ?>
                                      ><a <?php if (@$kidname->is_progressbar >= 50) { ?> href="#Section3" aria-controls="home" role="tab" data-toggle="tab"  <?php } else { ?> style="opacity:0.6" <?php } ?>>Price Range</a></li>
                                      <li role="presentation"
                                      <?php
                                      if ($sections == 'custom') {
                                      echo 'class="active"';
                                      }
                                      ?>
                                      ><a <?php if (@$kidname->is_progressbar >= 75) { ?>href="#Section4" aria-controls="home" role="tab" data-toggle="tab" <?php } else { ?> style="opacity:0.6" <?php } ?>>Custom Design & Brands</a></li>
                                      </ul><?php */ ?>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content tabs data-filup ">
                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'section1') { ?>  active in <?php } else if ($sections == '') { ?> active in <?php } ?>"  id="Section1">
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleKid')) ?>
                                        <div class="left-bar fixed" id="sidebar">
                                            <div class="under-box">
                                                <h2 onclick="detai()">Hi <?php echo $kidName; ?> </h2>
                                                <p>Please complete your child basic information that will help us to get started to have a best FIT</p>
                                                <div class="profile-image">

                                                    <span id="noImgx" <?php if ($kidmenu->kids_clothing_gender == '') { ?> style="display:block" <?php } else { ?> style="display:none"  <?php } ?>><img src="<?php echo HTTP_ROOT ?>assets/kid-img/kids-main.jpg" alt=""></span>



                                                    <span id="boysImg" <?php if ($kidmenu->kids_clothing_gender == 'boys') { ?> style="display:block" <?php } else { ?> style="display:none"  <?php } ?>><img src="<?php echo HTTP_ROOT ?>assets/kid-img/KidsBoyBasicInfo.jpg" alt=""></span>
                                                    <span id="girlsImg" <?php if ($kidmenu->kids_clothing_gender == 'girls') { ?> style="display:block" <?php } else { ?> style="display:none"  <?php } ?>><img src="<?php echo HTTP_ROOT ?>assets/kid-img/Kids-girl-basicInfo.jpg" alt=""></span>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <h1>Welcome <?php echo $kidName; ?></h1>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 date-box">
                                                        <h3>Your Child Name?</h3>
                                                        <div class="select-boxes">
                                                            <input type="text" placeholder="" name="kids_first_name" id="kids_first_name" value="<?php echo @$kidmenu->kids_first_name; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 col-md-6 date-box">
                                                        <h3>Your Child Birthday?</h3>
                                                        <div class="select-boxes">
                                                            <input type="text" placeholder="mm/dd/yyyy" value="<?php
                                                            if (!empty($kidmenu->kids_birthdate)) {
                                                                echo $kidmenu->kids_birthdate;
                                                            }
                                                            ?>" name="kids_birthdate" id="user-input-kids_birthdate" autocomplete="off" maxlength="10">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data looking-main">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 looking">
                                                        <h3>FIT you are looking for? </h3>
                                                        <div class="switch-field kids-radio">
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons" style=" float: left;">
                                                                <label class="btn <?php if (@$kidmenu->kids_clothing_gender == 'girls') { ?> active <?php } ?>" role="button" id="switch_left">
                                                                    <input type="radio" name="kids_clothing_gender" value="girls" <?php if (@$kidmenu->kids_clothing_gender == 'girls') { ?> checked="checked" <?php } ?> >Girl’s Product
                                                                </label>
                                                                <label class="btn <?php if (@$kidmenu->kids_clothing_gender == 'boys') { ?> active <?php } ?>" role="button" id="switch_right">
                                                                    <input type="radio"  name="kids_clothing_gender" value="boys" <?php if (@$kidmenu->kids_clothing_gender == 'boys') { ?> checked="checked" <?php } ?> >Boy’s Product
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 col-md-6 date-box">
                                                        <h3>Relationship with your child? </h3>
                                                        <div class="switch-field kids-radio">
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons" style="float: left;">
                                                                <label class="btn <?php if (@$kidmenu->kids_relationship_to_child == 'father') { ?> active <?php } ?>" role="button" id="switch_left1">
                                                                    <input type="radio" name="kids_relationship_to_child" value="father" <?php if (@$kidmenu->kids_relationship_to_child == 'father') { ?> checked <?php } ?> >Father
                                                                </label>
                                                                <label class="btn <?php if (@$kidmenu->kids_relationship_to_child == 'mother') { ?> active <?php } ?>" id="switch_right1" role="button" data-twbs-toggle-buttons-class-active="btn-warning" data-twbs-toggle-buttons-class-inactive="btn-error">
                                                                    <input type="radio"  name="kids_relationship_to_child" value="mother" <?php if (@$kidmenu->kids_relationship_to_child == 'mother') { ?> checked <?php } ?> >Mother
                                                                </label>
                                                                <label class="btn <?php if (@$kidmenu->kids_relationship_to_child == 'other') { ?> active <?php } ?>" id="switch_right2" role="button" data-twbs-toggle-buttons-class-active="btn-danger">
                                                                    <input type="radio" name="kids_relationship_to_child" value="other" <?php if (@$kidmenu->kids_relationship_to_child == 'other') { ?> checked <?php } ?>>Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <!--  <div class="switch-field">
                                                             <input type="radio" id="switch_left1" name="kids_relationship_to_child" value="father" <?php if (@$kidmenu->kids_relationship_to_child == 'father') { ?> checked="checked" <?php } ?>>
                                                             <label for="switch_left1">Father</label>
                                                             <input type="radio" id="switch_right1" name="kids_relationship_to_child" value="mother" <?php if (@$kidmenu->kids_relationship_to_child == 'mother') { ?> checked="checked" <?php } ?>>
                                                             <label for="switch_right1">Mother</label>
                                                             <input type="radio" id="switch_right2" name="kids_relationship_to_child" value="other" <?php if (@$kidmenu->kids_relationship_to_child == 'other') { ?> checked="checked" <?php } ?>>
                                                             <label for="switch_right2">Other</label>
                                                         </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>Your Child Height?</h3>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="tall_feet" id="tall_feet">
                                                                    <option value="">--</option>
                                                                    <option value="1" <?php if (@$kidmenu->tall_feet == '1') { ?> selected="" <?php } ?> >1</option>
                                                                    <option value="2" <?php if (@$kidmenu->tall_feet == '2') { ?> selected="" <?php } ?> >2</option>
                                                                    <option value="3" <?php if (@$kidmenu->tall_feet == '3') { ?> selected="" <?php } ?> >3</option>
                                                                    <option value="4" <?php if (@$kidmenu->tall_feet == '4') { ?> selected="" <?php } ?> >4</option>
                                                                    <option value="5" <?php if (@$kidmenu->tall_feet == '5') { ?> selected="" <?php } ?>>5</option>
                                                                    <option value="6" <?php if (@$kidmenu->tall_feet == '6') { ?> selected="" <?php } ?>>6</option>
                                                                </select>
                                                                <label>ft.</label>
                                                            </div>
                                                            <div class=" select-box">
                                                                <select name="tell_inch" id="tell_inch"> 
                                                                    <option value="0" <?php if (@$kidmenu->tell_inch == '0') { ?> selected="" <?php } ?>>0</option>
                                                                    <option value="1" <?php if (@$kidmenu->tell_inch == '1') { ?> selected="" <?php } ?>>1</option>
                                                                    <option value="2" <?php if (@$kidmenu->tell_inch == '2') { ?> selected="" <?php } ?>>2</option>
                                                                    <option value="3" <?php if (@$kidmenu->tell_inch == '3') { ?> selected="" <?php } ?>>3</option>
                                                                    <option value="4" <?php if (@$kidmenu->tell_inch == '4') { ?> selected="" <?php } ?>>4</option>
                                                                    <option value="5" <?php if (@$kidmenu->tell_inch == '5') { ?> selected="" <?php } ?>>5</option>
                                                                    <option value="6" <?php if (@$kidmenu->tell_inch == '6') { ?> selected="" <?php } ?>>6</option>
                                                                    <option value="7" <?php if (@$kidmenu->tell_inch == '7') { ?> selected="" <?php } ?>>7</option>
                                                                    <option value="8" <?php if (@$kidmenu->tell_inch == '8') { ?> selected="" <?php } ?>>8</option>
                                                                    <option value="9" <?php if (@$kidmenu->tell_inch == '9') { ?> selected="" <?php } ?>>9</option>
                                                                    <option value="10" <?php if (@$kidmenu->tell_inch == '10') { ?> selected="" <?php } ?>>10</option>
                                                                    <option value="11" <?php if (@$kidmenu->tell_inch == '11') { ?> selected="" <?php } ?>>11</option>
                                                                </select>
                                                                <label>in.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>Your Child Weight?</h3>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <input type="text" placeholder="" maxlength="3" name="weight_lb" value="<?php
                                                                if (!empty($kidmenu->weight_lb)) {
                                                                    echo @$kidmenu->weight_lb;
                                                                }
                                                                ?>">
                                                                <label>lbs.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data checkboxes">
                                                <div class="row">
                                                    <div class="col-sm-8 col-lg-12 col-md-12">
                                                        <h3> Your Child Personality ?</h3>
                                                        <div class="select-boxes">
                                                            <ul>
                                                                <li>
                                                                    <input id="check-box1p" name="child_personality[]" type="checkbox" value="Thoughtful" <?php if (isset($kidmenu->child_personality) && in_array('Thoughtful', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box1p">Thoughtful</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box2p" name="child_personality[]" type="checkbox" value="Sporty" <?php if (isset($kidmenu->child_personality) && in_array('Sporty', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box2p">Sporty</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box3p" name="child_personality[]" type="checkbox" value="Shy" <?php if (isset($kidmenu->child_personality) && in_array('Shy', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box3p">Shy</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box4p" name="child_personality[]" type="checkbox" value="Outgoing" <?php if (isset($kidmenu->child_personality) && in_array('Outgoing', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box4p">Outgoing</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box5p" name="child_personality[]" type="checkbox" value="Artistic" <?php if (isset($kidmenu->child_personality) && in_array('Artistic', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box5p">Artistic</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box1ap" name="child_personality[]" type="checkbox" value="Chatty" <?php if (isset($kidmenu->child_personality) && in_array('Chatty', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box1ap">Chatty</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box6p" name="child_personality[]" type="checkbox" value="Bookworm" <?php if (isset($kidmenu->child_personality) && in_array('Bookworm', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box6p">Bookworm</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box7p" name="child_personality[]" type="checkbox" value="Curious" <?php if (isset($kidmenu->child_personality) && in_array('Curious', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box7p">Curious</label>
                                                                </li> <li>
                                                                    <input id="check-box1s" name="child_personality[]" type="checkbox" value="Sassy" <?php if (isset($kidmenu->child_personality) && in_array('Sassy', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box1s">Sassy</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box2s" name="child_personality[]" type="checkbox" value="Funny" <?php if (isset($kidmenu->child_personality) && in_array('Funny', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box2s">Funny</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box3s" name="child_personality[]" type="checkbox" value="Independent" <?php if (isset($kidmenu->child_personality) && in_array('Independent', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box3s">Independent</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box4s" name="child_personality[]" type="checkbox" value="Kind" <?php if (isset($kidmenu->child_personality) && in_array('Kind', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box4s">Kind</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box5s" name="child_personality[]" type="checkbox" value="Daredevil" <?php if (isset($kidmenu->child_personality) && in_array('Daredevil', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box5s">Daredevil</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box1ak" name="child_personality[]" type="checkbox" value="Serious" <?php if (isset($kidmenu->child_personality) && in_array('Serious', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box1ak">Serious</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box6k" name="child_personality[]" type="checkbox" value="Adventurous" <?php if (isset($kidmenu->child_personality) && in_array('Adventurous', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box6k">Adventurous</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box7k" name="child_personality[]" type="checkbox" value="Confident" <?php if (isset($kidmenu->child_personality) && in_array('Confident', explode(',', @$kidmenu->child_personality))) { ?> checked <?php } ?>>
                                                                    <label for="check-box7k">Confident</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-box-data form-box-data2 form-box-data3">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>what size your child do prefer to wear ?</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <div id="Girls" class="switch-field">
                                                            <input type="radio" id="switch_left3b" name="size_prefer_wear" value="1" <?php if (@$kidmenu->size_prefer_wear == '1') { ?> checked="checked" <?php } ?>>
                                                            <label for="switch_left3b">Bottom Size</label>
                                                            <input type="radio" id="switch_right3b" name="size_prefer_wear" value="2"  <?php if (@$kidmenu->size_prefer_wear == '2') { ?> checked="checked" <?php } ?>>
                                                            <label for="switch_right3b"> Top Size</label>
                                                            <input type="radio" id="switch_right4b" name="size_prefer_wear" value="3"  <?php if (@$kidmenu->size_prefer_wear == '3') { ?> checked="checked" <?php } ?>>
                                                            <label for="switch_right4b">Shoe Size</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 Color-prefer">
                                                        <h3>Tell Us Which Color do you want to prefer?</h3>
                                                        <ul>
                                                            <li>
                                                                <h4>Black</h4>
                                                                <input value="1"  <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('1', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  class="radio-box" id="radio3a" name="prefer_color[]" type="checkbox">
                                                                <label for="radio3a"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Grey</h4>
                                                                <input value="2" class="radio-box" id="radio3b" name="prefer_color[]" type="checkbox"   <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('2', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  >
                                                                <label for="radio3b"></label>
                                                            </li>
                                                            <li>
                                                                <h4>White</h4>
                                                                <input value="3" class="radio-box" id="radio3c" name="prefer_color[]" type="checkbox"   <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('3', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  >
                                                                <label for="radio3c"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Cream</h4>
                                                                <input value="4" class="radio-box" id="radio3d" name="prefer_color[]" type="checkbox"   <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('4', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  >
                                                                <label for="radio3d"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Brown</h4>
                                                                <input value="5" class="radio-box" id="radio3e" name="prefer_color[]" type="checkbox"   <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('5', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  >
                                                                <label for="radio3e"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Purple</h4>
                                                                <input value="6" class="radio-box" id="radio3f" name="prefer_color[]" type="checkbox"  <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('6', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  >
                                                                <label for="radio3f"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Green</h4>
                                                                <input value="7" class="radio-box" id="radio3g" name="prefer_color[]" type="checkbox"  <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('7', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  >
                                                                <label for="radio3g"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Blue</h4>
                                                                <input value="8" class="radio-box" id="radio3h" name="prefer_color[]" type="checkbox"   <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('8', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  >
                                                                <label for="radio3h"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Orange</h4>
                                                                <input value="9" class="radio-box" id="radio3i" name="prefer_color[]" type="checkbox"  <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('9', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?>  >
                                                                <label for="radio3i"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Yellow</h4>
                                                                <input value="10" class="radio-box" id="radio3j" name="prefer_color[]" type="checkbox"  <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('10', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3j"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Red</h4>
                                                                <input value="11" class="radio-box" id="radio3k" name="prefer_color[]" type="checkbox"   <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('11', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3k"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Pink</h4>
                                                                <input value="12" class="radio-box" id="radio3l" name="prefer_color[]" type="checkbox" <?php if ((strlen(@$kidmenu->prefer_color) > 2 ) && (in_array('12', json_decode(@$kidmenu->prefer_color, true)))) { ?> checked="checked" <?php } ?> >
                                                                <label for="radio3l"></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit" name="kids_stas" value="kids_stas">Next : Style Fit  <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>

                                        </div>
                                        <?= $this->Form->end(); ?>

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'fit') { ?> active in <?php } ?>" id="Section2">

                                        <?php if (@$kidmenu->kids_clothing_gender == 'boys') { ?> 



                                            <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'kidstyleboy')) ?>
                                            <div class="left-bar fixed" id="sidebar2">
                                                <div class="under-box">
                                                    <h2>Hi  <?php echo $kidName; ?></h2>
                                                    <p>Please complete your style information that will help us to get completed a best FIT</p>
                                                    <div class="profile-image">
                                                        <span><img src="<?php echo HTTP_ROOT ?>assets/kid-img/KIdsBoyStyleFit.jpg" alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-bar">
                                                <div class="form-box-data kids-form-bnox">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3 style=" margin-top: 0;">What sizes does you prefer for your child ?</h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                            <h4>TOPS SIZE</h4>
                                                            <div class="select-boxes select-boxes2">
                                                                <div class="select-box select-box2">
                                                                    <select name='top_size' id='top_size'>
                                                                        <option value='' >--</option>
                                                                        <optgroup label="Toddler Sizing">
                                                                            <option valu='2T' <?php if (@$KidsSizeFit->top_size == '2T') { ?> selected <?php } ?>>2T</option>
                                                                            <option value='3T' <?php if (@$KidsSizeFit->top_size == '3T') { ?> selected <?php } ?>>3T</option>
                                                                            <option value='4T' <?php if (@$KidsSizeFit->top_size == '4T') { ?> selected <?php } ?>>4T</option>
                                                                        </optgroup>
                                                                        <optgroup label="Kid Sizing">
                                                                            <option value='5' <?php if (@$KidsSizeFit->top_size == '5') { ?> selected <?php } ?> >5</option>
                                                                            <option value='6' <?php if (@$KidsSizeFit->top_size == '6') { ?> selected <?php } ?>>6</option>
                                                                            <option value='7' <?php if (@$KidsSizeFit->top_size == '7') { ?> selected <?php } ?>>7</option>
                                                                            <option value='8' <?php if (@$KidsSizeFit->top_size == '8') { ?> selected <?php } ?>>8</option>
                                                                            <option value='10' <?php if (@$KidsSizeFit->top_size == '10') { ?> selected <?php } ?>>10</option>
                                                                            <option value='12' <?php if (@$KidsSizeFit->top_size == '12') { ?> selected <?php } ?>>12</option>
                                                                            <option value='14' <?php if (@$KidsSizeFit->top_size == '14') { ?> selected <?php } ?>>14</option>
                                                                            <option value='16' <?php if (@$KidsSizeFit->top_size == '16') { ?> selected <?php } ?>>16</option>
                                                                            <option value='18' <?php if (@$KidsSizeFit->top_size == '18') { ?> selected <?php } ?>>18</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                            <h4>BOTTOMS SIZE</h4>
                                                            <div class="select-boxes select-boxes2">
                                                                <div class="select-box select-box2">
                                                                    <select name="bottom_size" id="bottom_size">
                                                                        <option value="">--</option>
                                                                        <optgroup label="Toddler Sizing">

                                                                            <option value="2T" <?php if (@$KidsSizeFit->bottom_size == '2T') { ?> selected <?php } ?>>2T</option>
                                                                            <option value="3T" <?php if (@$KidsSizeFit->bottom_size == '3T') { ?> selected <?php } ?>>3T</option>
                                                                            <option value="4T" <?php if (@$KidsSizeFit->bottom_size == '4T') { ?> selected <?php } ?>>4T</option>
                                                                        </optgroup>
                                                                        <optgroup label="Kid Sizing">
                                                                            <option value="5" <?php if (@$KidsSizeFit->bottom_size == '5') { ?> selected <?php } ?>>5</option>
                                                                            <option value="6" <?php if (@$KidsSizeFit->bottom_size == '6') { ?> selected <?php } ?>>6</option>
                                                                            <option value="7" <?php if (@$KidsSizeFit->bottom_size == '7') { ?> selected <?php } ?>>7</option>
                                                                            <option value="8" <?php if (@$KidsSizeFit->bottom_size == '8') { ?> selected <?php } ?>>8</option>
                                                                            <option value="10" <?php if (@$KidsSizeFit->bottom_size == '10') { ?> selected <?php } ?>>10</option>
                                                                            <option value="12" <?php if (@$KidsSizeFit->bottom_size == '12') { ?> selected <?php } ?>>12</option>
                                                                            <option value="14" <?php if (@$KidsSizeFit->bottom_size == '14') { ?> selected <?php } ?>>14</option>
                                                                            <option value="16" <?php if (@$KidsSizeFit->bottom_size == '16') { ?> selected <?php } ?>>16</option>
                                                                            <option value="18" <?php if (@$KidsSizeFit->bottom_size == '18') { ?> selected <?php } ?>>18</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                            <h4>SHOE SIZE</h4>
                                                            <div class="select-boxes select-boxes2">
                                                                <div class="select-box select-box2">
                                                                    <select name="shoe_size" id="shoe_size">
                                                                        <option value=''>--</option>
                                                                        <optgroup label="Toddler Sizing">
                                                                            <option value="2 Child" <?php if (@$KidsSizeFit->shoe_size == '2 Child') { ?> selected <?php } ?>>2 Child</option>
                                                                            <option value="3 Child" <?php if (@$KidsSizeFit->shoe_size == '3 Child') { ?> selected <?php } ?>>3 Child</option>
                                                                            <option value="4 Child" <?php if (@$KidsSizeFit->shoe_size == '4 Child') { ?> selected <?php } ?>>4 Child</option>
                                                                            <option value="5 Child" <?php if (@$KidsSizeFit->shoe_size == '5 Child') { ?> selected <?php } ?>>5 Child</option>
                                                                            <option value="6 Child" <?php if (@$KidsSizeFit->shoe_size == '6 Child') { ?> selected <?php } ?>>6 Child</option>
                                                                            <option value="7 Child" <?php if (@$KidsSizeFit->shoe_size == '7 Child') { ?> selected <?php } ?>>7 Child</option>
                                                                            <option value="8 Child" <?php if (@$KidsSizeFit->shoe_size == '8 Child') { ?> selected <?php } ?>>8 Child</option>
                                                                            <option value="9 Child" <?php if (@$KidsSizeFit->shoe_size == '9 Child') { ?> selected <?php } ?>>9 Child</option>
                                                                        </optgroup>
                                                                        <optgroup label="Kid Sizing">
                                                                            <option value="10 Child" <?php if (@$KidsSizeFit->shoe_size == '10 Child') { ?> selected <?php } ?>>10 Child</option>
                                                                            <option value="11 Child" <?php if (@$KidsSizeFit->shoe_size == '11 Child') { ?> selected <?php } ?>>11 Child</option>
                                                                            <option value="12 Child" <?php if (@$KidsSizeFit->shoe_size == '12 Child') { ?> selected <?php } ?>>12 Child</option>
                                                                            <option value="13 Child" <?php if (@$KidsSizeFit->shoe_size == '13 Child') { ?> selected <?php } ?>>13 Child</option>
                                                                            <option value='1 Youth' <?php if (@$KidsSizeFit->shoe_size == '1 Youth') { ?> selected <?php } ?>>1 Youth</option>
                                                                            <option value='2 Youth' <?php if (@$KidsSizeFit->shoe_size == '2 Youth') { ?> selected <?php } ?>>2 Youth</option>
                                                                            <option value='3 Youth' <?php if (@$KidsSizeFit->shoe_size == '3 Youth') { ?> selected <?php } ?>>3 Youth</option>
                                                                            <option value='4 Youth' <?php if (@$KidsSizeFit->shoe_size == '4 Youth') { ?> selected <?php } ?>>4 Youth</option>
                                                                            <option value='5 Youth' <?php if (@$KidsSizeFit->shoe_size == '5 Youth') { ?> selected <?php } ?>>5 Youth</option>
                                                                            <option value='6 Youth' <?php if (@$KidsSizeFit->shoe_size == '6 Youth') { ?> selected <?php } ?>>6 Youth</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>Your Child Body Shape ?</h3>
                                                            <div class="child-shape">
                                                                <div id="boy" class="switch-field">
                                                                    <input type="radio" id="switch_left1a" name="body_shape" value="Husky" <?php if (@$KidsSizeFit->body_shape == 'Husky') { ?> checked="checked" <?php } ?>>
                                                                    <label for="switch_left1a">Husky</label>
                                                                    <input type="radio" id="switch_right1a" name="body_shape" value="Average" <?php if (@$KidsSizeFit->body_shape == 'Average') { ?> checked="checked" <?php } ?>>
                                                                    <label for="switch_right1a">Average</label>
                                                                    <input type="radio" id="switch_right2a" name="body_shape" value="Slim" <?php if (@$KidsSizeFit->body_shape == 'Slim') { ?> checked="checked" <?php } ?>>
                                                                    <label for="switch_right2a">Slim</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data kids-form-bnox">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>Does your child have any FIT issue?</h3>
                                                            <div class="select-boxes">
                                                                <ul>
                                                                    <li>
                                                                        <h4>SHIRT SLEEVE LENGTH</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length" name="shirt_sleeve_length" value="Too short" <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too short') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_sleeve_length">Too short</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length2" name="shirt_sleeve_length" value="None" <?php if (@$KidsSizeFit->shirt_sleeve_length == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->shirt_sleeve_length == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_sleeve_length2">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length3" name="shirt_sleeve_length" value="Too long"  <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too long') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_sleeve_length3">Too long</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SHIRT TORSO LENGTH</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length" name="kids_fit_challenge_shirt_torso_length" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_torso_length">Too short</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length2" name="kids_fit_challenge_shirt_torso_length" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_torso_length2">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length3" name="kids_fit_challenge_shirt_torso_length" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?> checked="checked" <?php } ?> value="Too long">
                                                                            <label for="kids_fit_challenge_shirt_torso_length3">Too long</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SHIRT TORSO WIDTH </h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_width4ws" name="kids_fit_challenge_shirt_torso_width" value="Too tight"  <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too tight') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_torso_width4ws">Too tight</label>
                                                                            <input type="radio" id="switch_middle4" name="kids_fit_challenge_shirt_torso_width" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="switch_middle4">None</label>
                                                                            <input type="radio" id="switch_right4" name="kids_fit_challenge_shirt_torso_width" value="Too loose" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too loose') { ?> checked="checked" <?php } ?>>
                                                                            <label for="switch_right4">Too loose</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PANT WAIST</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_waist" name="kids_fit_challenge_pant_waist" value="Too tight"  <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too tight') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_waist">Too tight</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_waist2" name="kids_fit_challenge_pant_waist" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_pant_waist == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_waist2">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_waist3" name="kids_fit_challenge_pant_waist" value="Too loose" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too loose') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_waist3">Too loose</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PANT LEG LENGTH (INSEAM)</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length" name="kids_fit_challenge_pant_leg_length" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?> checked="checked" <?php } ?>  />
                                                                            <label for="kids_fit_challenge_pant_leg_length">Too short</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length2" name="kids_fit_challenge_pant_leg_length" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == '') { ?> checked = "" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length2">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3" name="kids_fit_challenge_pant_leg_length" value="Too long" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3">Too long</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PANT LEGS WIDTH</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad" name="kids_fit_challenge_pant_leg_width" value="Too tight" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too tight') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad">Too tight</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae" name="kids_fit_challenge_pant_leg_width" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == '') { ?> checked = "checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af" name="kids_fit_challenge_pant_leg_width" value="Too long" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too long') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3af">Too loose</label>
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-box-data kids-form-bnox">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>Please share the following items you like to receive ?</h3>
                                                            <div class="select-boxes">
                                                                <ul>
                                                                    <li>
                                                                        <h4>T-SHIRTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_lengtha" name="t_shirts" value="Often"  <?php if (@$KidsSizeFit->t_shirts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_sleeve_lengtha">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length2a" name="t_shirts" value="Sometimes" <?php if (@$KidsSizeFit->t_shirts == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->t_shirts == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_sleeve_length2a">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length2b" name="t_shirts" value="Rarely" <?php if (@$KidsSizeFit->t_shirts == 'Rarely') { ?> checked="checked" <?php } ?>>

                                                                            <label for="kids_fit_challenge_shirt_sleeve_length2b">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SWEAT SHIRTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_lengtha" name="sweats_shirts" value="Often" <?php if (@$KidsSizeFit->sweats_shirts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_torso_lengtha">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length2a" name="sweats_shirts" value="Sometimes" <?php if (@$KidsSizeFit->sweats_shirts == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->sweats_shirts == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_torso_length2a">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length3a" name="sweats_shirts" value="Rarely" <?php if (@$KidsSizeFit->sweats_shirts == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_torso_length3a">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>POLO SHIRTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_width4ab" name="polo_shirts" value="Often" <?php if (@$KidsSizeFit->polo_shirts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_torso_width4ab">Often</label>
                                                                            <input type="radio" id="switch_middle4a" name="polo_shirts" value="Sometimes" <?php if (@$KidsSizeFit->polo_shirts == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->polo_shirts == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="switch_middle4a">Sometimes</label>
                                                                            <input type="radio" id="switch_right4a" name="polo_shirts" value="Rarely" <?php if (@$KidsSizeFit->polo_shirts == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="switch_right4a">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>BUTTON-DOWNS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_waistx" name="button_downs" value="Often" <?php if (@$KidsSizeFit->button_downs == 'Often') { ?> checked="checked" <?php } ?> />
                                                                            <label for="kids_fit_challenge_pant_waistx">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_waistx2" name="button_downs" value="Sometimes" <?php if (@$KidsSizeFit->button_downs == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->button_downs == '') { ?> checked="checked" <?php } ?> />
                                                                            <label for="kids_fit_challenge_pant_waistx2">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_waistx3" name="button_downs" value="Rarely" <?php if (@$KidsSizeFit->button_downs == 'Rarely') { ?> checked="checked" <?php } ?>/>
                                                                            <label for="kids_fit_challenge_pant_waistx3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SWEATERS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_lengtha" name="sweaters" value="Often" <?php if (@$KidsSizeFit->sweaters == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_lengtha">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length2a" name="sweaters" value="Sometimes" <?php if (@$KidsSizeFit->sweaters == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->sweaters == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length2a">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3a" name="sweaters" value="Rarely" <?php if (@$KidsSizeFit->sweaters == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3a">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>JACKETS & COATS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad1" name="jacket_coats" value="Often" <?php if (@$KidsSizeFit->jacket_coats == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad1">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae1" name="jacket_coats" value="Sometimes" <?php if (@$KidsSizeFit->jacket_coats == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->jacket_coats == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae1">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af1" name="jacket_coats" value="Rarely" <?php if (@$KidsSizeFit->jacket_coats == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3af1">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SHORTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad2" name="shorts" value="Often" <?php if (@$KidsSizeFit->shorts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad2">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae2" name="shorts" value="Sometimes" <?php if (@$KidsSizeFit->shorts == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->shorts == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae2">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af2" name="shorts" value="Rarely" <?php if (@$KidsSizeFit->shorts == 'Rarely') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3af2">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>JEANS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad3" name="jeans" value="Often" <?php if (@$KidsSizeFit->jeans == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad3">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae3" name="jeans" value="Sometimes"  <?php if (@$KidsSizeFit->jeans == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->jeans == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae3">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af3" name="jeans" value="Rarely" <?php if (@$KidsSizeFit->jeans == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3af3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>TROUSERS & CHINOS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad4" name="trousers_chino" value="Often" <?php if (@$KidsSizeFit->trousers_chino == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad4">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae4" name="trousers_chino" value="Sometimes"  <?php if (@$KidsSizeFit->trousers_chino == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->trousers_chino == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae4">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af4" name="trousers_chino" value="Rarely" <?php if (@$KidsSizeFit->trousers_chino == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3af4">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SWEATPANTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad5" name="sweatspaint" value="Often"  <?php if (@$KidsSizeFit->sweatspaint == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad5">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae5" name="sweatspaint" value="Sometimes" <?php if (@$KidsSizeFit->sweatspaint == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->sweatspaint == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae5">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af5" name="sweatspaint" value="Rarely" <?php if (@$KidsSizeFit->sweatspaint == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3af5">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SHOES</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_shoes1" name="shoes" value="Often" <?php if (@$KidsSizeFit->shoes == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_shoes1">Often</label>
                                                                            <input type="radio" id="kids_shoes2" name="shoes" value="Sometimes" <?php if (@$KidsSizeFit->shoes == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->shoes == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_shoes2">Sometimes</label>
                                                                            <input type="radio" id="kids_shoes3" name="shoes" value="Rarely" <?php if (@$KidsSizeFit->shoes == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_shoes3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PAJAMAS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad6" name="pajamas" value="Often"  <?php if (@$KidsSizeFit->pajamas == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad6">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae6" name="pajamas" value="Sometimes"  <?php if (@$KidsSizeFit->pajamas == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->pajamas == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae6">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af6" name="pajamas" value="Rarely" <?php if (@$KidsSizeFit->pajamas == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3af6">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data style-kids">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>How often does your child do the following activities?</h3>
                                                            <div class="select-boxes">
                                                                <ul>
                                                                    <li>
                                                                        <h4>Arts &amp; Crafts</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-1a.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Arts" name="kids_frequency_arts_and_crafts" value="Often" <?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Arts">Often</label>
                                                                            <input type="radio" id="Arts2" name="kids_frequency_arts_and_crafts" value="Sometimes" <?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_arts_and_crafts == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Arts2">Sometimes</label>
                                                                            <input type="radio" id="Arts3" name="kids_frequency_arts_and_crafts" value="Rarely" <?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Arts3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>Biking</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-1b.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Biking" name="kids_frequency_biking" value="Often" <?php if (@$kidmenu->kids_frequency_biking == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="Biking">Often</label>
                                                                            <input type="radio" id="Biking2" name="kids_frequency_biking" value="Sometimes" <?php if (@$kidmenu->kids_frequency_biking == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_biking == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Biking2">Sometimes</label>
                                                                            <input type="radio" id="Biking2az" name="kids_frequency_biking" value="Rarely"  <?php if (@$kidmenu->kids_frequency_biking == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Biking2az">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>DANCE</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-1c.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="DANCE" name="kids_frequency_dance" value="Often" <?php if (@$kidmenu->kids_frequency_dance == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="DANCE">Often</label>
                                                                            <input type="radio" id="DANCE2" name="kids_frequency_dance" value="Sometimes" <?php if (@$kidmenu->kids_frequency_dance == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_dance == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="DANCE2">Sometimes</label>
                                                                            <input type="radio" id="DANCE3" name="kids_frequency_dance" value="Rarely" <?php if (@$kidmenu->kids_frequency_dance == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="DANCE3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>Playing Outside</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-1d.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Playing" name="kids_frequency_playing_outside" value="Often" <?php if (@$kidmenu->kids_frequency_playing_outside == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Playing">Often</label>
                                                                            <input type="radio" id="Playing2" name="kids_frequency_playing_outside" value="Sometimes" <?php if (@$kidmenu->kids_frequency_playing_outside == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_playing_outside == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Playing2">Sometimes</label>
                                                                            <input type="radio" id="Playing3" name="kids_frequency_playing_outside" value="Rarely" <?php if (@$kidmenu->kids_frequency_playing_outside == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Playing3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>Musical Instruments</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-1e.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Musical" name="kids_frequency_musical_instruments" value="Often"<?php if (@$kidmenu->kids_frequency_musical_instruments == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Musical">Often</label>
                                                                            <input type="radio" id="Musical2" name="kids_frequency_musical_instruments" value="Sometimes" <?php if (@$kidmenu->kids_frequency_musical_instruments == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_musical_instruments == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Musical2">Sometimes</label>
                                                                            <input type="radio" id="Musical3" name="kids_frequency_musical_instruments" value="Rarely" <?php if (@$kidmenu->kids_frequency_musical_instruments == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Musical3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>Reading </h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-1f.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Reading" name="kids_frequency_reading" value="Often" <?php if (@$kidmenu->kids_frequency_reading == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Reading">Often</label>
                                                                            <input type="radio" id="Reading2" name="kids_frequency_reading" value="Sometimes" <?php if (@$kidmenu->kids_frequency_reading == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_reading == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Reading2">Sometimes</label>
                                                                            <input type="radio" id="Reading3" name="kids_frequency_reading" value="Rarely" <?php if (@$kidmenu->kids_frequency_reading == 'Rarely') { ?> checked="Rarely" <?php } ?>>
                                                                            <label for="Reading3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-box-data child-prefer">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>What type of prints your child prefer?</h3>
                                                            <div class="child-shape">
                                                                <div id="boy" class="switch-field">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 style-kids">
                                                                            <div class="select-boxes">
                                                                                <ul>
                                                                                    <li>
                                                                                        <h4>STRIPES</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-print1.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Artsz" name="stripes" value="Yes"  <?php if (@$KidClothingType->stripes == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Artsz">Yes</label>
                                                                                            <input type="radio" id="Arts2z" name="stripes" value="Maybe" <?php if (@$KidClothingType->stripes == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->stripes == '') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Arts2z">Maybe</label>
                                                                                            <input type="radio" id="Arts3z" name="stripes" value="Never" <?php if (@$KidClothingType->stripes == 'Never') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Arts3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>PLAID</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-print2.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Bikingz" name="plaid" value="Yes" <?php if (@$KidClothingType->plaid == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Bikingz">Yes</label>
                                                                                            <input type="radio" id="Biking2z" name="plaid" value="Maybe" <?php if (@$KidClothingType->plaid == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->plaid == '') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Biking2z">Maybe</label>
                                                                                            <input type="radio" id="Biking2zad" name="plaid" value="Never" <?php if (@$KidClothingType->plaid == 'Never') { ?> checked="checked" <?php } ?>  >
                                                                                            <label for="Biking2zad">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>GINGHAM</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-print3.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Theatre1z" name="gingham" value="Yes" <?php if (@$KidClothingType->gingham == 'Yes') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Theatre1z">Yes</label>
                                                                                            <input type="radio" id="Theatre2z" name="gingham" value="Maybe" <?php if (@$KidClothingType->gingham == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->gingham == '') { ?>  checked="checked" <?php } ?>>
                                                                                            <label for="Theatre2z">Maybe</label>
                                                                                            <input type="radio" id="Theatre3z" name="gingham" value="Never" <?php if (@$KidClothingType->gingham == 'Never') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Theatre3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>NOVELTY</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-print4.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="DANCEz" name="novelty" value="Yes" <?php if (@$KidClothingType->novelty == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="DANCEz">Yes</label>
                                                                                            <input type="radio" id="DANCE2z" name="novelty" value="Maybe" <?php if (@$KidClothingType->novelty == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->novelty == '') { ?>  checked="checked" <?php } ?>>
                                                                                            <label for="DANCE2z">Maybe</label>
                                                                                            <input type="radio" id="DANCE3z" name="novelty" value="Never" <?php if (@$KidClothingType->novelty == 'Never') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="DANCE3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>POLKA DOT</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-print5.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Organizedz" name="polkadots" value="Yes" <?php if (@$KidClothingType->polkadots == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Organizedz">Yes</label>
                                                                                            <input type="radio" id="Organized2z" name="polkadots" value="Maybe" <?php if (@$KidClothingType->polkadots == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->novelty == '') { ?>  checked="checked" <?php } ?>>
                                                                                            <label for="Organized2z">Maybe</label>
                                                                                            <input type="radio" id="Organized3z" name="polkadots" value="Never"  <?php if (@$KidClothingType->polkadots == 'Never') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Organized3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>CAMO</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-print6.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Playingz" name="camo" value="Yes" <?php if (@$KidClothingType->camo == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Playingz">Yes</label>
                                                                                            <input type="radio" id="Playing2z" name="camo" value="Maybe" <?php if (@$KidClothingType->camo == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->camo == '') { ?>  checked="checked" <?php } ?> >
                                                                                            <label for="Playing2z">Maybe</label>
                                                                                            <input type="radio" id="Playing3z" name="camo" value="Never" <?php if (@$KidClothingType->camo == 'Never') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Playing3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                        <button type="submit" name="kid_fit_boy" value="kid_fit_boy">Next : Price Range <i class="fas fa-arrow-right"></i></button>
                                                        <a href="#">save and return »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= $this->Form->end(); ?>
                                        <?php } else { ?>
                                            <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'kidstylegirls')) ?>
                                            <div class="left-bar fixed" id="sidebar2">
                                                <div class="under-box">
                                                    <h2>Hi <?php echo $kidName; ?></h2>
                                                    <p>Please complete your style information that will help us to get completed a best FIT</p>
                                                    <div class="profile-image">
                                                        <span><img src="<?php echo HTTP_ROOT ?>assets/kid-img/Kids-girl-stylefit.jpg" alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-bar">
                                                <div class="form-box-data kids-form-bnox">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3 style=" margin-top: 0;">What sizes does you prefer for your child ?</h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                            <h4>TOPS SIZE</h4>
                                                            <div class="select-boxes select-boxes2">
                                                                <div class="select-box select-box2">
                                                                    <select name='top_size' id='top_size'>
                                                                        <option value=''>--</option>
                                                                        <optgroup label="Toddler Sizing">
                                                                            <option valu='2T' <?php if (@$KidsSizeFit->top_size == '2T') { ?> selected <?php } ?>>2T</option>
                                                                            <option value='3T' <?php if (@$KidsSizeFit->top_size == '3T') { ?> selected <?php } ?>>3T</option>
                                                                            <option value='4T' <?php if (@$KidsSizeFit->top_size == '4T') { ?> selected <?php } ?>>4T</option>
                                                                        </optgroup>
                                                                        <optgroup label="Kid Sizing">
                                                                            <option value='5' <?php if (@$KidsSizeFit->top_size == '5') { ?> selected <?php } ?> >5</option>
                                                                            <option value='6' <?php if (@$KidsSizeFit->top_size == '6') { ?> selected <?php } ?>>6</option>
                                                                            <option value='7' <?php if (@$KidsSizeFit->top_size == '7') { ?> selected <?php } ?>>7</option>
                                                                            <option value='8' <?php if (@$KidsSizeFit->top_size == '8') { ?> selected <?php } ?>>8</option>
                                                                            <option value='10' <?php if (@$KidsSizeFit->top_size == '10') { ?> selected <?php } ?>>10</option>
                                                                            <option value='12' <?php if (@$KidsSizeFit->top_size == '12') { ?> selected <?php } ?>>12</option>
                                                                            <option value='14' <?php if (@$KidsSizeFit->top_size == '14') { ?> selected <?php } ?>>14</option>
                                                                            <option value='16' <?php if (@$KidsSizeFit->top_size == '16') { ?> selected <?php } ?>>16</option>
                                                                            <option value='18' <?php if (@$KidsSizeFit->top_size == '18') { ?> selected <?php } ?>>18</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                            <h4>BOTTOMS SIZE</h4>
                                                            <div class="select-boxes select-boxes2">
                                                                <div class="select-box select-box2">
                                                                    <select name="bottom_size" id="bottom_size">
                                                                        <option value=''>--</option>
                                                                        <optgroup label="Toddler Sizing">

                                                                            <option value="2T" <?php if (@$KidsSizeFit->bottom_size == '2T') { ?> selected <?php } ?>>2T</option>
                                                                            <option value="3T" <?php if (@$KidsSizeFit->bottom_size == '3T') { ?> selected <?php } ?>>3T</option>
                                                                            <option value="4T" <?php if (@$KidsSizeFit->bottom_size == '4T') { ?> selected <?php } ?>>4T</option>
                                                                        </optgroup>
                                                                        <optgroup label="Kid Sizing">
                                                                            <option value="5" <?php if (@$KidsSizeFit->bottom_size == '5') { ?> selected <?php } ?>>5</option>
                                                                            <option value="6" <?php if (@$KidsSizeFit->bottom_size == '6') { ?> selected <?php } ?>>6</option>
                                                                            <option value="7" <?php if (@$KidsSizeFit->bottom_size == '7') { ?> selected <?php } ?>>7</option>
                                                                            <option value="8" <?php if (@$KidsSizeFit->bottom_size == '8') { ?> selected <?php } ?>>8</option>
                                                                            <option value="10" <?php if (@$KidsSizeFit->bottom_size == '10') { ?> selected <?php } ?>>10</option>
                                                                            <option value="12" <?php if (@$KidsSizeFit->bottom_size == '12') { ?> selected <?php } ?>>12</option>
                                                                            <option value="14" <?php if (@$KidsSizeFit->bottom_size == '14') { ?> selected <?php } ?>>14</option>
                                                                            <option value="16" <?php if (@$KidsSizeFit->bottom_size == '16') { ?> selected <?php } ?>>16</option>
                                                                            <option value="18" <?php if (@$KidsSizeFit->bottom_size == '18') { ?> selected <?php } ?>>18</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-lg-4 col-md-4">
                                                            <h4>SHOE SIZE</h4>
                                                            <div class="select-boxes select-boxes2">
                                                                <div class="select-box select-box2">
                                                                    <select name="shoe_size" id="shoe_size">
                                                                        <option value=''>--</option>
                                                                        <optgroup label="Toddler Sizing">
                                                                            <option value="2 Child" <?php if (@$KidsSizeFit->shoe_size == '2 Child') { ?> selected <?php } ?>>2 Child</option>
                                                                            <option value="3 Child" <?php if (@$KidsSizeFit->shoe_size == '3 Child') { ?> selected <?php } ?>>3 Child</option>
                                                                            <option value="4 Child" <?php if (@$KidsSizeFit->shoe_size == '4 Child') { ?> selected <?php } ?>>4 Child</option>
                                                                            <option value="5 Child" <?php if (@$KidsSizeFit->shoe_size == '5 Child') { ?> selected <?php } ?>>5 Child</option>
                                                                            <option value="6 Child" <?php if (@$KidsSizeFit->shoe_size == '6 Child') { ?> selected <?php } ?>>6 Child</option>
                                                                            <option value="7 Child" <?php if (@$KidsSizeFit->shoe_size == '7 Child') { ?> selected <?php } ?>>7 Child</option>
                                                                            <option value="8 Child" <?php if (@$KidsSizeFit->shoe_size == '8 Child') { ?> selected <?php } ?>>8 Child</option>
                                                                            <option value="9 Child" <?php if (@$KidsSizeFit->shoe_size == '9 Child') { ?> selected <?php } ?>>9 Child</option>
                                                                        </optgroup>
                                                                        <optgroup label="Kid Sizing">
                                                                            <option value='10 Child' <?php if (@$KidsSizeFit->shoe_size == '10 Child') { ?> selected <?php } ?>>10 Child</option>
                                                                            <option value='11 Child' <?php if (@$KidsSizeFit->shoe_size == '11 Child') { ?> selected <?php } ?>>11 Child</option>
                                                                            <option value='12 Child' <?php if (@$KidsSizeFit->shoe_size == '12 Child') { ?> selected <?php } ?>>12 Child</option>
                                                                            <option value='13 Child' <?php if (@$KidsSizeFit->shoe_size == '13 Child') { ?> selected <?php } ?>>13 Child</option>
                                                                            <option value='1 Youth' <?php if (@$KidsSizeFit->shoe_size == '1 Youth') { ?> selected <?php } ?>>1 Youth</option>
                                                                            <option value='2 Youth' <?php if (@$KidsSizeFit->shoe_size == '2 Youth') { ?> selected <?php } ?>>2 Youth</option>
                                                                            <option value='3 Youth' <?php if (@$KidsSizeFit->shoe_size == '3 Youth') { ?> selected <?php } ?>>3 Youth</option>
                                                                            <option value='4 Youth' <?php if (@$KidsSizeFit->shoe_size == '4 Youth') { ?> selected <?php } ?>>4 Youth</option>
                                                                            <option value='5 Youth' <?php if (@$KidsSizeFit->shoe_size == '5 Youth') { ?> selected <?php } ?>>5 Youth</option>
                                                                            <option value='6 Youth' <?php if (@$KidsSizeFit->shoe_size == '6 Youth') { ?> selected <?php } ?>>6 Youth</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>Your Child Body Shape ?</h3>
                                                            <div class="child-shape">
                                                                <div id="boy" class="switch-field">
                                                                    <input type="radio" id="switch_left1a" name="body_shape" value="Husky" <?php if (@$KidsSizeFit->body_shape == 'Husky') { ?> checked="checked" <?php } ?>>
                                                                    <label for="switch_left1a">Husky</label>
                                                                    <input type="radio" id="switch_right1a" name="body_shape" value="Average" <?php if (@$KidsSizeFit->body_shape == 'Average') { ?> checked="checked" <?php } ?>>
                                                                    <label for="switch_right1a">Average</label>
                                                                    <input type="radio" id="switch_right2a" name="body_shape" value="Slim" <?php if (@$KidsSizeFit->body_shape == 'Slim') { ?> checked="checked" <?php } ?>>
                                                                    <label for="switch_right2a">Slim</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data kids-form-bnox">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3 style=" margin-top: 0;">Does your child have any FIT issue?</h3>
                                                            <div class="select-boxes">
                                                                <ul>
                                                                    <li>
                                                                        <h4>SHIRT SLEEVE LENGTH</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_lengthqe" name="shirt_sleeve_length" value="Too short" <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too short') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_sleeve_lengthqe">Too short</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length2az" name="shirt_sleeve_length" value="None" <?php if (@$KidsSizeFit->shirt_sleeve_length == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->shirt_sleeve_length == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_sleeve_length2az">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length3az" name="shirt_sleeve_length" value="Too long"  <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too long') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_sleeve_length3az">Too long</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SHIRT TORSO LENGTH</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length" name="kids_fit_challenge_shirt_torso_length" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_torso_length">Too short</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length2" name="kids_fit_challenge_shirt_torso_length" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_torso_length2">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length3" name="kids_fit_challenge_shirt_torso_length" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?> checked="checked" <?php } ?> value="Too long">
                                                                            <label for="kids_fit_challenge_shirt_torso_length3">Too long</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SHIRT TORSO WIDTH</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_width4aq" name="kids_fit_challenge_shirt_torso_width" value="Too tight"  <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too tight') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_torso_width4aq">Too tight</label>
                                                                            <input type="radio" id="switch_middle4" name="kids_fit_challenge_shirt_torso_width" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="switch_middle4">None</label>
                                                                            <input type="radio" id="switch_right4" name="kids_fit_challenge_shirt_torso_width" value="Too loose" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too loose') { ?> checked="checked" <?php } ?>>
                                                                            <label for="switch_right4">Too loose</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PANT WAIST</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_waist" name="kids_fit_challenge_pant_waist" value="Too tight"  <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too tight') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_waist">Too tight</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_waist2" name="kids_fit_challenge_pant_waist" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_pant_waist == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_waist2">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_waist3" name="kids_fit_challenge_pant_waist" value="Too loose" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too loose') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_waist3">Too loose</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PANT LEG LENGTH (INSEAM)</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length" name="kids_fit_challenge_pant_leg_length" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?> checked="checked" <?php } ?>  />
                                                                            <label for="kids_fit_challenge_pant_leg_length">Too short</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length2" name="kids_fit_challenge_pant_leg_length" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == '') { ?> checked = "" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length2">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3" name="kids_fit_challenge_pant_leg_length" value="Too long" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3">Too long</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PANT LEGS WIDTH</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad" name="kids_fit_challenge_pant_leg_width" value="Too tight" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too tight') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad">Too tight</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae" name="kids_fit_challenge_pant_leg_width" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'None') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == '') { ?> checked = "checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae">None</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af" name="kids_fit_challenge_pant_leg_width" value="Too long" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too long') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3af">Too loose</label>
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-box-data kids-form-bnox">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>Please share the following items you like to receive ?</h3>
                                                            <div class="select-boxes">
                                                                <ul>
                                                                    <li>
                                                                        <h4>T-SHIRTS</h4>




                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_lengtha" name="t_shirts" value="Often"  <?php if (@$KidsSizeFit->t_shirts == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_sleeve_lengtha">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length2a" name="t_shirts" value="Sometimes" <?php if (@$KidsSizeFit->t_shirts == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->t_shirts == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_sleeve_length2a">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_sleeve_length2b" name="t_shirts" value="Rarely"  <?php if (@$KidsSizeFit->t_shirts == 'Rarely') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_sleeve_length2b">Rarely</label>

                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>TOPS & BLOUSES</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_lengtha" name="top_blouses" value="Often" <?php if (@$KidsSizeFit->top_blouses == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_torso_lengtha">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length2a" name="top_blouses" value="Sometimes" <?php if (@$KidsSizeFit->top_blouses == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->top_blouses == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_shirt_torso_length2a">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_shirt_torso_length3a" name="top_blouses" value="Rarely" <?php if (@$KidsSizeFit->top_blouses == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_shirt_torso_length3a">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SWEATSHIRTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_sweats_shirts1" name="sweats_shirts" value="Often" <?php if (@$KidsSizeFit->sweats_shirts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_sweats_shirts1">Often</label>
                                                                            <input type="radio" id="kids_sweats_shirts2" name="sweats_shirts" value="Sometimes" <?php if (@$KidsSizeFit->sweats_shirts == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->sweats_shirts == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_sweats_shirts2">Sometimes</label>
                                                                            <input type="radio" id="kids_sweats_shirts3" name="sweats_shirts" value="Rarely" <?php if (@$KidsSizeFit->sweats_shirts == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_sweats_shirts3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SWEATERS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_lengtha" name="sweaters" value="Often" <?php if (@$KidsSizeFit->sweaters == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_lengtha">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length2a" name="sweaters" value="Sometimes" <?php if (@$KidsSizeFit->sweaters == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->sweaters == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length2a">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3a" name="sweaters" value="Rarely" <?php if (@$KidsSizeFit->sweaters == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3a">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>JACKETS & COATS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad1" name="jacket_coats" value="Often" <?php if (@$KidsSizeFit->jacket_coats == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad1">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae1" name="jacket_coats" value="Sometimes" <?php if (@$KidsSizeFit->jacket_coats == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->jacket_coats == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae1">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af1" name="jacket_coats" value="Rarely" <?php if (@$KidsSizeFit->jacket_coats == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3af1">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>DRESSES & ROMPERS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_dreses_rompers1" name="dreses_rompers" value="Often" checked="checked" <?php if (@$KidsSizeFit->dreses_rompers == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_dreses_rompers1">Often</label>
                                                                            <input type="radio" id="kids_dreses_rompers2" name="dreses_rompers" value="Sometimes" <?php if (@$KidsSizeFit->dreses_rompers == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->dreses_rompers == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_dreses_rompers2">Sometimes</label>
                                                                            <input type="radio" id="kids_dreses_rompers3" name="dreses_rompers" value="Rarely" <?php if (@$KidsSizeFit->dreses_rompers == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_dreses_rompers3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SHORTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad2" name="shorts" value="Often" <?php if (@$KidsSizeFit->shorts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad2">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae2" name="shorts" value="Sometimes" <?php if (@$KidsSizeFit->shorts == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->shorts == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae2">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af2" name="shorts" value="Rarely" <?php if (@$KidsSizeFit->shorts == 'Rarely') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3af2">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>LEGGINGS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad3" name="leggings" value="Often" checked="checked" <?php if (@$KidsSizeFit->leggings == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad3">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae3" name="leggings" value="Sometimes" <?php if (@$KidsSizeFit->leggings == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->leggings == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae3">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af3" name="leggings" value="Rarely" <?php if (@$KidsSizeFit->leggings == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3af3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>JEANS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_jeans1" name="jeans" value="Often" <?php if (@$KidsSizeFit->jeans == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_jeans1">Often</label>
                                                                            <input type="radio" id="kids_jeans2" name="jeans" value="Sometimes"  <?php if (@$KidsSizeFit->jeans == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->jeans == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_jeans2">Sometimes</label>
                                                                            <input type="radio" id="kids_jeans3" name="jeans" value="Rarely" <?php if (@$KidsSizeFit->jeans == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_jeans3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PANTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad5" name="paint" value="Often"  <?php if (@$KidsSizeFit->paint == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad5">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae5" name="paint" value="Sometimes" <?php if (@$KidsSizeFit->paint == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->jeans == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae5">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af5" name="paint" value="Rarely" <?php if (@$KidsSizeFit->paint == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3af5">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SKIRTS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_skirts1" name="skirts" value="Often" <?php if (@$KidsSizeFit->skirts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_skirts1">Often</label>
                                                                            <input type="radio" id="kids_skirts2" name="skirts" value="Sometimes" <?php if (@$KidsSizeFit->skirts == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->skirts == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_skirts2">Sometimes</label>
                                                                            <input type="radio" id="kids_skirts3" name="skirts" value="Rarely" <?php if (@$KidsSizeFit->skirts == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_skirts3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>ACCESSORIES</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ad6" name="accessories" value="Often" <?php if (@$KidsSizeFit->accessories == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_challenge_pant_leg_length3ad6">Often</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3ae6" name="accessories" value="Sometimes" <?php if (@$KidsSizeFit->accessories == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->accessories == '') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3ae6">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_challenge_pant_leg_length3af6" name="accessories" value="Rarely" <?php if (@$KidsSizeFit->accessories == 'Rarely') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_challenge_pant_leg_length3af6">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>SHOES</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_shoes1" name="shoes" value="Often" <?php if (@$KidsSizeFit->shoes == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_shoes1">Often</label>
                                                                            <input type="radio" id="kids_fit_shoes2" name="shoes" value="Sometimes" <?php if (@$KidsSizeFit->shoes == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->shoes == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_shoes2">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_shoes3" name="shoes" value="Rarely" <?php if (@$KidsSizeFit->shoes == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_shoes3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>PAJAMAS</h4>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="kids_fit_pajamas1" name="pajamas" value="Often"  <?php if (@$KidsSizeFit->pajamas == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="kids_fit_pajamas1">Often</label>
                                                                            <input type="radio" id="kids_fit_pajamas2" name="pajamas" value="Sometimes"  <?php if (@$KidsSizeFit->pajamas == 'Sometimes') { ?> checked="checked" <?php } else if (@$KidsSizeFit->pajamas == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_pajamas2">Sometimes</label>
                                                                            <input type="radio" id="kids_fit_pajamas3" name="pajamas" value="Rarely" <?php if (@$KidsSizeFit->pajamas == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="kids_fit_pajamas3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data style-kids">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>How often does your child do the following activities?</h3>
                                                            <div class="select-boxes">
                                                                <ul>
                                                                    <li>
                                                                        <h4>Arts &amp; Crafts</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-1a.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Arts" name="kids_frequency_arts_and_crafts" value="Often" <?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Arts">Often</label>
                                                                            <input type="radio" id="Arts2" name="kids_frequency_arts_and_crafts" value="Sometimes" <?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_arts_and_crafts == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Arts2">Sometimes</label>
                                                                            <input type="radio" id="Arts3" name="kids_frequency_arts_and_crafts" value="Rarely" <?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Arts3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>Biking</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-1b.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Biking" name="kids_frequency_biking" value="Often" <?php if (@$kidmenu->kids_frequency_biking == 'Often') { ?> checked="checked" <?php } ?> >
                                                                            <label for="Biking">Often</label>
                                                                            <input type="radio" id="Biking2" name="kids_frequency_biking" value="Sometimes" <?php if (@$kidmenu->kids_frequency_biking == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_biking == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Biking2">Sometimes</label>
                                                                            <input type="radio" id="Biking3" name="kids_frequency_biking" value="Rarely"  <?php if (@$kidmenu->kids_frequency_biking == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Biking3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>DANCE</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-1c.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="DANCE" name="kids_frequency_dance" value="Often" <?php if (@$kidmenu->kids_frequency_dance == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="DANCE">Often</label>
                                                                            <input type="radio" id="DANCE2" name="kids_frequency_dance" value="Sometimes" <?php if (@$kidmenu->kids_frequency_dance == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_dance == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="DANCE2">Sometimes</label>
                                                                            <input type="radio" id="DANCE3" name="kids_frequency_dance" value="Rarely" <?php if (@$kidmenu->kids_frequency_dance == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="DANCE3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>Playing Outside</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-1d.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Playing" name="kids_frequency_playing_outside" value="Often" <?php if (@$kidmenu->kids_frequency_playing_outside == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Playing">Often</label>
                                                                            <input type="radio" id="Playing2" name="kids_frequency_playing_outside" value="Sometimes" <?php if (@$kidmenu->kids_frequency_playing_outside == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_playing_outside == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Playing2">Sometimes</label>
                                                                            <input type="radio" id="Playing3" name="kids_frequency_playing_outside" value="Rarely" <?php if (@$kidmenu->kids_frequency_playing_outside == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Playing3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>Musical Instruments</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-1e.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Musical" name="kids_frequency_musical_instruments" value="Often"<?php if (@$kidmenu->kids_frequency_musical_instruments == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Musical">Often</label>
                                                                            <input type="radio" id="Musical2" name="kids_frequency_musical_instruments" value="Sometimes" <?php if (@$kidmenu->kids_frequency_musical_instruments == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_musical_instruments == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Musical2">Sometimes</label>
                                                                            <input type="radio" id="Musical3" name="kids_frequency_musical_instruments" value="Rarely" <?php if (@$kidmenu->kids_frequency_musical_instruments == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Musical3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <h4>Reading</h4>
                                                                        <div class="activities-img">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-1f.jpg" alt="">
                                                                        </div>
                                                                        <div class="switch-field">
                                                                            <input type="radio" id="Reading" name="kids_frequency_reading" value="Often" <?php if (@$kidmenu->kids_frequency_reading == 'Often') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Reading">Often</label>
                                                                            <input type="radio" id="Reading2" name="kids_frequency_reading" value="Sometimes" <?php if (@$kidmenu->kids_frequency_reading == 'Sometimes') { ?> checked="checked" <?php } else if (@$kidmenu->kids_frequency_reading == '') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Reading2">Sometimes</label>
                                                                            <input type="radio" id="Reading3" name="kids_frequency_reading" value="Rarely" <?php if (@$kidmenu->kids_frequency_reading == 'Rarely') { ?> checked="checked" <?php } ?>>
                                                                            <label for="Reading3">Rarely</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-box-data child-prefer">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3>What type of prints your child prefer?</h3>
                                                            <div class="child-shape">
                                                                <div id="boy" class="switch-field">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 style-kids">
                                                                            <div class="select-boxes">
                                                                                <ul>
                                                                                    <li>
                                                                                        <h4>STRIPES</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-print1.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Artsz" name="stripes" value="Yes"  <?php if (@$KidClothingType->stripes == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Artsz">Yes</label>
                                                                                            <input type="radio" id="Arts2z" name="stripes" value="Maybe" <?php if (@$KidClothingType->stripes == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->stripes == '') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Arts2z">Maybe</label>
                                                                                            <input type="radio" id="Arts3z" name="stripes" value="Never" <?php if (@$KidClothingType->stripes == 'Never') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Arts3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>FLORAL</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-print2.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Bikingz" name="floral" value="Yes" <?php if (@$KidClothingType->floral == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Bikingz">Yes</label>
                                                                                            <input type="radio" id="Biking2z" name="floral" value="Maybe" <?php if (@$KidClothingType->floral == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->floral == '') { ?>  checked="checked" <?php } ?>>
                                                                                            <label for="Biking2z">Maybe</label>
                                                                                            <input type="radio" id="Biking3z" name="floral" value="Never" <?php if (@$KidClothingType->floral == 'Never') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Biking3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>ANIMAL PRINT</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-print3.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Theatre1z" name="animal_print" value="Yes" <?php if (@$KidClothingType->animal_print == 'Yes') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Theatre1z">Yes</label>
                                                                                            <input type="radio" id="Theatre2z" name="animal_print" value="Maybe"  <?php if (@$KidClothingType->animal_print == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->animal_print == '') { ?>  checked="checked" <?php } ?>>
                                                                                            <label for="Theatre2z"> Maybe </label>
                                                                                            <input type="radio" id="Theatre3z" name="animal_print" value="Never" <?php if (@$KidClothingType->animal_print == 'Never') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Theatre3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>POLKA DOTS</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-print4.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Organizedz" name="polkadots" value="Yes"  <?php if (@$KidClothingType->polkadots == 'Yes') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Organizedz">Yes</label>
                                                                                            <input type="radio" id="Organized2z" name="polkadots" value="Maybe" <?php if (@$KidClothingType->polkadots == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->polkadots == '') { ?>  checked="checked" <?php } ?>>
                                                                                            <label for="Organized2z">Maybe</label>
                                                                                            <input type="radio" id="Organized3z" name="polkadots" value="Never"  <?php if (@$KidClothingType->polkadots == 'Never') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="Organized3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>PLAID</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-print5.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="BikingzX" name="plaid" value="Yes" <?php if (@$KidClothingType->plaid == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="BikingzX">Yes</label>
                                                                                            <input type="radio" id="EEC" name="plaid" value="Maybe" <?php if (@$KidClothingType->plaid == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->plaid == '') { ?> checked="checked" <?php } ?> >
                                                                                            <label for="EEC">Maybe</label>
                                                                                            <input type="radio" id="DESD" name="plaid" value="Never" <?php if (@$KidClothingType->plaid == 'Never') { ?> checked="checked" <?php } ?>  >
                                                                                            <label for="DESD">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <h4>CAMO</h4>
                                                                                        <div class="activities-img">
                                                                                            <img src="<?php echo HTTP_ROOT ?>images/kidsg-print6.jpg" alt="">
                                                                                        </div>
                                                                                        <div class="switch-field">
                                                                                            <input type="radio" id="Playingz" name="camo" value="Yes" <?php if (@$KidClothingType->camo == 'Yes') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Playingz">Yes</label>
                                                                                            <input type="radio" id="Playing2z" name="camo" value="Maybe" <?php if (@$KidClothingType->camo == 'Maybe') { ?> checked="checked" <?php } else if (@$KidClothingType->camo == '') { ?>  checked="checked" <?php } ?> >
                                                                                            <label for="Playing2z">Maybe</label>
                                                                                            <input type="radio" id="Playing3z" name="camo" value="Never" <?php if (@$KidClothingType->camo == 'Never') { ?> checked="checked" <?php } ?>>
                                                                                            <label for="Playing3z">Never</label>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                        <button type="submit" name="kid_fit_girl" value="kid_fit_girl">Next : Price Range <i class="fas fa-arrow-right"></i></button>
                                                        <a href="#">save and return »</a>
                                                    </div>
                                                </div>
                                            </div>


                                            <?= $this->Form->end(); ?>    
                                        <?php } ?>


                                    </div>
                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'styles') { ?> active in <?php } ?>" id="Section3">
                                        <?php if (@$kidmenu->kids_clothing_gender == 'boys') { ?> 
                                            <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleKidBoySection3')) ?>
                                            <div class="left-bar fixed" id="sidebar3">
                                                <div class="under-box">
                                                    <h2>Hi <?php echo $kidName; ?></h2>
                                                    <p>Please complete your price range you are looking for that will help us have a best FIT under your budget.</p>
                                                    <div class="profile-image">
                                                        <span><img src="<?php echo HTTP_ROOT ?>assets/kid-img/KIdsBoyPrice.jpg" alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-bar child-price">
                                                <div class="form-box-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3 style="margin-top: 0;">Help Us to Know your Budget</h3> 
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <div class="child-shape">
                                                                <div id="boy" class="switch-field">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">CASUAL SHIRTS</font></b></nav>                                                
                                                                            <ul>
                                                                                <li><label for="spendiness_button_up_shirts_mens" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_button_up_shirts_mens" name="casual_shirts" value="1" <?php if (@$KidStyles->casual_shirts == '1') { ?> checked="checked" <?php } ?> >
                                                                                        <span class="input-control__indicator"></span>$20-$30

                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_button_up_shirts_mens2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_button_up_shirts_mens2" name="casual_shirts" value="2" <?php if (@$KidStyles->casual_shirts == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_button_up_shirts_mens3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_button_up_shirts_mens3" name="casual_shirts" value="3" <?php if (@$KidStyles->casual_shirts == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_button_up_shirts_mens4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_button_up_shirts_mens4" name="casual_shirts" value="4" <?php if (@$KidStyles->casual_shirts == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">SHORTS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_shorts" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_shorts" name="shorts" value="1" <?php if (@$KidStyles->shorts == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_shorts2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_shorts2" name="shorts" value="2"  <?php if (@$KidStyles->shorts == '2') { ?> checked="checked" <?php } ?> >
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_shorts32" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_shorts32" name="shorts" value="3" <?php if (@$KidStyles->shorts == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_shorts42" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_shorts42" name="shorts" value="4" <?php if (@$KidStyles->shorts == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">JEANS & PANTS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_pants_denim" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_pants_denim" name="jeans_paint" value="1" <?php if (@$KidStyles->jeans_paint == '1') { ?> checked="checked" <?php } ?> >
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_pants_denim2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_pants_denim2" name="jeans_paint" value="2" <?php if (@$KidStyles->jeans_paint == '2') { ?> checked="checked" <?php } ?> >
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_pants_denim3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_pants_denim3" name="jeans_paint" value="3" <?php if (@$KidStyles->jeans_paint == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_pants_denim4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_pants_denim4" name="jeans_paint" value="4" <?php if (@$KidStyles->jeans_paint == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">JACKETS</font></b></nav>                                                
                                                                            <ul>
                                                                                <li><label for="spendiness_tees_polos" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos" name="jaket" value="1" <?php if (@$KidStyles->jaket == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_tees_polos2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos2" name="jaket" value="2"  <?php if (@$KidStyles->jaket == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_tees_polos3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos3" name="jaket" value="3"  <?php if (@$KidStyles->jaket == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_tees_polos4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos4" name="jaket" value="4"  <?php if (@$KidStyles->jaket == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">SWEATERS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_sweaters_sweatshirts1" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_sweaters_sweatshirts1" name="sweaters" value="1" <?php if (@$KidStyles->sweaters == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_sweaters_sweatshirts2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_sweaters_sweatshirts2" name="sweaters" value="2" <?php if (@$KidStyles->sweaters == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_sweaters_sweatshirts3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_sweaters_sweatshirts3" name="sweaters" value="3" <?php if (@$KidStyles->sweaters == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50 
                                                                                    </label></li>
                                                                                <li><label for="spendiness_sweaters_sweatshirts4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_sweaters_sweatshirts4" name="sweaters" value="4" <?php if (@$KidStyles->sweaters == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">BUTTON DOWNS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_blazers_outerwear1" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear1" name="button_downs" value="1" <?php if (@$KidStyles->button_downs == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30

                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_blazers_outerwear2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear2" name="button_downs" value="2" <?php if (@$KidStyles->button_downs == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_blazers_outerwear3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear3" name="button_downs" value="3" <?php if (@$KidStyles->button_downs == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_blazers_outerwear4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear4" name="button_downs" value="4" <?php if (@$KidStyles->button_downs == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">CASUAL BOTTOMS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_blazers_outerwear1A" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear1A" name="casual_bootms" value="1" <?php if (@$KidStyles->casual_bootms == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30

                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_blazers_outerwear2A" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear2A" name="casual_bootms" value="2"  <?php if (@$KidStyles->casual_bootms == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_blazers_outerwear3A" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear3A" name="casual_bootms" value="3"  <?php if (@$KidStyles->casual_bootms == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_blazers_outerwear4A" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear4A" name="casual_bootms" value="4"  <?php if (@$KidStyles->casual_bootms == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">SHOES </font></b></nav>
                                                                            <ul>
                                                                                <li><label for="SHOES1" class="input-control radio">
                                                                                        <input type="radio" id="SHOES1" name="shoes" value="1" <?php if (@$KidStyles->shoes == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="SHOES2" class="input-control radio">
                                                                                        <input type="radio" id="SHOES2" name="shoes" value="2" <?php if (@$KidStyles->shoes == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="SHOES3" class="input-control radio">
                                                                                        <input type="radio" id="SHOES3" name="shoes" value="3" <?php if (@$KidStyles->shoes == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="SHOES4" class="input-control radio">
                                                                                        <input type="radio" id="SHOES4" name="shoes" value="4" <?php if (@$KidStyles->shoes == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                        <button type="submit" name="kid_boy_price" value="kid_boy_price">Next : Custom Design & Brands <i class="fas fa-arrow-right"></i></button>
                                                        <a href="#">save and return »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= $this->Form->end(); ?>  
                                        <?php } else { ?>
                                            <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleKidGirlSection3')) ?>
                                            <div class="left-bar fixed" id="sidebar3">
                                                <div class="under-box">
                                                    <h2>Hi <?php echo $kidName; ?></h2>
                                                    <p>Please complete your price range you are looking for that will help us have a best FIT under your budget.</p>
                                                    <div class="profile-image">
                                                        <span><img src="<?php echo HTTP_ROOT ?>assets/kid-img/Kids-girl-price.jpg" alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-bar child-price">
                                                <div class="form-box-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <h3 style="margin-top: 0;">Help Us to Know your Budget</h3> 
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <div class="child-shape">
                                                                <div id="Girls" class="switch-field">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">CASUAL SHIRTS</font></b></nav>                                                
                                                                            <ul>
                                                                                <li><label for="spendiness_button_up_shirts_mens" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_button_up_shirts_mens" name="casual_shirts" value="1" <?php if (@$KidStyles->casual_shirts == '1') { ?> checked="checked" <?php } ?> >
                                                                                        <span class="input-control__indicator"></span>$20-$30

                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_button_up_shirts_mens2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_button_up_shirts_mens2" name="casual_shirts" value="2" <?php if (@$KidStyles->casual_shirts == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_button_up_shirts_mens3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_button_up_shirts_mens3" name="casual_shirts" value="3" <?php if (@$KidStyles->casual_shirts == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_button_up_shirts_mens4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_button_up_shirts_mens4" name="casual_shirts" value="4" <?php if (@$KidStyles->casual_shirts == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">SKIRTS & SHORTS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_shorts" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_shorts" name="skirts_shorts" value="1" <?php if (@$KidStyles->skirts_shorts == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_shorts2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_shorts2" name="skirts_shorts" value="2" <?php if (@$KidStyles->skirts_shorts == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_shorts32" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_shorts32" name="skirts_shorts" value="3" <?php if (@$KidStyles->skirts_shorts == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_shorts42" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_shorts42" name="skirts_shorts" value="4" <?php if (@$KidStyles->skirts_shorts == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">LEGGINGS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_pants_denim" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_pants_denim" name="leggings" value="1" <?php if (@$KidStyles->leggings == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_pants_denim2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_pants_denim2" name="leggings" value="2" <?php if (@$KidStyles->leggings == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_pants_denim3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_pants_denim3" name="leggings" value="3" <?php if (@$KidStyles->leggings == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_pants_denim4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_pants_denim4" name="leggings" value="4" <?php if (@$KidStyles->leggings == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">JEANS</font></b></nav>                                                
                                                                            <ul>
                                                                                <li><label for="spendiness_tees_polos" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos" name="jeans" value="1" <?php if (@$KidStyles->jeans == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_tees_polos2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos2" name="jeans" value="2" <?php if (@$KidStyles->jeans == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_tees_polos3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos3" name="jeans" value="3" <?php if (@$KidStyles->jeans == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_tees_polos4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos4" name="jeans" value="4" <?php if (@$KidStyles->jeans == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">DRESSES</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_blazers_outerwear1" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear1" name="dresses" value="1" <?php if (@$KidStyles->dresses == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30

                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_blazers_outerwear2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear2" name="dresses" value="2" <?php if (@$KidStyles->dresses == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_blazers_outerwear3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear3" name="dresses" value="3" <?php if (@$KidStyles->dresses == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_blazers_outerwear4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear4" name="dresses" value="4" <?php if (@$KidStyles->dresses == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">SWEATERS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_sweaters_sweatshirts1" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_sweaters_sweatshirts1" name="sweaters" value="1" <?php if (@$KidStyles->sweaters == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_sweaters_sweatshirts2" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_sweaters_sweatshirts2" name="sweaters" value="2" <?php if (@$KidStyles->sweaters == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_sweaters_sweatshirts3" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_sweaters_sweatshirts3" name="sweaters" value="3" <?php if (@$KidStyles->sweaters == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50 
                                                                                    </label></li>
                                                                                <li><label for="spendiness_sweaters_sweatshirts4" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_sweaters_sweatshirts4" name="sweaters" value="4" <?php if (@$KidStyles->sweaters == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">BLOUSES</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_blazers_outerwear1A" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear1A" name="blouses" value="1" <?php if (@$KidStyles->blouses == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30

                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_blazers_outerwear2A" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear2A" name="blouses" value="2" <?php if (@$KidStyles->blouses == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_blazers_outerwear3A" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear3A" name="blouses" value="3" <?php if (@$KidStyles->blouses == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_blazers_outerwear4A" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_blazers_outerwear4A" name="blouses" value="4" <?php if (@$KidStyles->blouses == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">JACKETS</font></b></nav>
                                                                            <ul>
                                                                                <li><label for="spendiness_tees_polosqt" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polosqt" name="jaket" value="1" <?php if (@$KidStyles->jaket == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="spendiness_tees_polos2bf" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos2bf" name="jaket" value="2"  <?php if (@$KidStyles->jaket == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="spendiness_tees_polos3cv" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos3cv" name="jaket" value="3"  <?php if (@$KidStyles->jaket == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="spendiness_tees_polos4qw" class="input-control radio">
                                                                                        <input type="radio" id="spendiness_tees_polos4qw" name="jaket" value="4"  <?php if (@$KidStyles->jaket == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                                            <nav><b><font size="4">SHOES </font></b></nav>
                                                                            <ul>
                                                                                <li><label for="SHOES1" class="input-control radio">
                                                                                        <input type="radio" id="SHOES1" name="shoes" value="1" <?php if (@$KidStyles->shoes == '1') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$20-$30
                                                                                    </label>
                                                                                </li>
                                                                                <li><label for="SHOES2" class="input-control radio">
                                                                                        <input type="radio" id="SHOES2" name="shoes" value="2" <?php if (@$KidStyles->shoes == '2') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$30-$40
                                                                                    </label></li>
                                                                                <li><label for="SHOES3" class="input-control radio">
                                                                                        <input type="radio" id="SHOES3" name="shoes" value="3" <?php if (@$KidStyles->shoes == '3') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$40-$50
                                                                                    </label></li>
                                                                                <li><label for="SHOES4" class="input-control radio">
                                                                                        <input type="radio" id="SHOES4" name="shoes" value="4" <?php if (@$KidStyles->shoes == '4') { ?> checked="checked" <?php } ?>>
                                                                                        <span class="input-control__indicator"></span>$50+
                                                                                    </label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>

                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                        <button type="submit" name="kid_girl_price" value="kid_girl_price">Next : Custom Design & Brands <i class="fas fa-arrow-right"></i></button>
                                                        <a href="#">save and return »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= $this->Form->end(); ?>  
                                        <?php } ?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'custom') { ?> active in <?php } ?>" id="Section4">

                                        <?php if (@$kidmenu->kids_clothing_gender == 'boys') { ?> 


                                            <?= $this->Form->create('img', array('id' => "imgfrm", 'type' => 'file')); ?>
                                            <input type="file"  name='file' id="imgupload1kid" style="display:none"/> 
                                            <?= $this->Form->end() ?>
                                            <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleBoySection4')) ?>

                                            <div class="left-bar fixed" id="sidebar4">
                                                <div class="under-box">
                                                    <h2>Hi <?php echo $kidName; ?></h2>
                                                    <p>We are working with hundreds of brands and will help you FIT you under your budget.</p>
                                                    <div class="profile-image">
                                                        <span><img src="<?php echo HTTP_ROOT ?>assets/kid-img/KIdsBoyBrands.jpg" alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-bar">
                                                <div class="form-box-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12 custome">
                                                            <h3 style="margin-top: 0;">Please do double click to upload any images / design you want your stylist to work for you  ?</h3>
                                                            <div class="catlog-product-img">
                                                                <ul>
                                                                    <li>
                                                                        <div class="upload-img">
                                                                            <?php if (@$designe->img_1 == '') { ?>
                                                                                <img   id='img1' src="<?php echo HTTP_ROOT ?>assets/kid-img/KidBoyCustomDesign1.jpg" alt="">
                                                                            <?php } else { ?>
                                                                                <img  id='img1' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_1; ?>" alt="">
                                                                            <?php } ?>
                                                                            <span  data-id='1' class='imgkid'><i class="fa fa-camera"></i></span>
                                                                        </div>
                                                                        <h4>First Design</h4>
                                                                    </li>
                                                                    <li>
                                                                        <div class="upload-img">
                                                                            <?php if (@$designe->img_2 == '') { ?>
                                                                                <img id='img2'src="<?php echo HTTP_ROOT ?>assets/kid-img/KidBoyCustomDesign2.jpg" alt="">
                                                                            <?php } else { ?>
                                                                                <img  id='img2' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_2; ?>" alt="">
                                                                            <?php } ?>
                                                                            <span  data-id='2' class='imgkid'><i class="fa fa-camera"></i></span>
                                                                        </div>
                                                                        <h4>Second Design</h4>
                                                                    </li>
                                                                    <li>
                                                                        <div class="upload-img">
                                                                            <?php if (@$designe->img_3 == '') { ?>
                                                                                <img id='img3' src="<?php echo HTTP_ROOT ?>assets/kid-img/KidBoyCustomDesign3.jpg" alt="">
                                                                            <?php } else { ?>
                                                                                <img  id='img3' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_3; ?>" alt="">
                                                                            <?php } ?>

                                                                            <span  data-id='3' class='imgkid'><i class="fa fa-camera"></i></span>
                                                                        </div>
                                                                        <h4>Third Design</h4>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <div class="type-box">
                                                                <h3> Brand or store you prefer to shop for your child ?</h3>
                                                                <ul>
                                                                    <li>
                                                                        <input class="radio-box" name="brands[]" value="janine" id="mens_brands1" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('janine', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands1">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo1.png" alt="">
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands2" name="brands[]" value="oldnavy" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('oldnavy', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands2">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo2.png" alt="">
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands3" name="brands[]" value="tea" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('tea', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands3">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo3.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands4" name="brands[]" value="terget" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('terget', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands4">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo4.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands5" name="brands[]" value="jcrew" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('jcrew', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands5">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo5.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands6" name="brands[]" value="nike" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('nike', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands6">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo6.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands7" name="brands[]" value="place" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('place', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands7">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo7.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands8" name="brands[]" value="carters" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('carters', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands8">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo8.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands9" name="brands[]" value="zara" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('zara', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands9">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo9.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands10" name="brands[]" value="gym" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('gym', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands10">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo10.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands11" name="brands[]" value="under" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('under', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands11">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo11.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands12" name="brands[]" value="gap" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('gap', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands12">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo12.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands13" name="brands[]" value="khals" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('khals', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands13">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo13.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands14" name="brands[]" value="mars" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('mars', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands14">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo14.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands15" name="brands[]" value="just" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('just', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands15">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo15.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands16" name="brands[]" value="jcp" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('jcp', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands16">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo16.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands17" name="brands[]" value="amzone" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('amzone', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands17">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo17.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands18" name="brands[]" value="nord" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('nord', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands18">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo18.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands19" name="brands[]" value="walmert" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('walmert', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands19">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo19.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands20" name="brands[]" value="macy" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('macy', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands20">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo20.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data" style="border-bottom: none;">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12 textarea-box">
                                                            <h3 style="margin-top: 10px">Add additional comments</h3>
                                                            <textarea style="margin-top: 0" name="profile_note"><?php echo @$KidStyles->profile_note; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                        <button type="submit" name="boy_kid_custom" value="boy_kid_custom">Next : Manage Your Fit Settings <i class="fas fa-arrow-right"></i></button>
                                                        <a href="#">save and return »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= $this->Form->end() ?>
                                        <?php } else { ?>
                                            <?= $this->Form->create('img', array('id' => "imgfrm", 'type' => 'file')); ?>
                                            <input type="file"  name='file' id="imgupload1kid" style="display:none"/> 
                                            <?= $this->Form->end() ?>
                                            <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleBoySection4')) ?>
                                            <div class="left-bar fixed" id="sidebar4">
                                                <div class="under-box">
                                                    <h2>Hi <?php echo $kidName; ?></h2>
                                                    <p>We are working with hundreds of brands and will help you FIT you under your budget.</p>
                                                    <div class="profile-image">
                                                        <span><img src="<?php echo HTTP_ROOT ?>assets/kid-img/Kids-girl-brand.jpg" alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-bar">
                                                <div class="form-box-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12 custome">
                                                            <h3 style="margin-top: 0;">Please do double click to upload any images / design you want your stylist to work for you  ?</h3>
                                                            <div class="catlog-product-img">
                                                                <ul>
                                                                    <li>
                                                                        <div class="upload-img">
                                                                            <?php if (@$designe->img_1 == '') { ?>
                                                                                <img id='img1' src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign1.jpg" alt="">
                                                                            <?php } else { ?>
                                                                                <img  id='img1' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_1; ?>" alt="">
                                                                            <?php } ?>
                                                                            <span  data-id='1' class='imgkid'><i class="fa fa-camera"></i></span>
                                                                        </div>
                                                                        <h4>First Design</h4>
                                                                    </li>
                                                                    <li>
                                                                        <div class="upload-img">
                                                                            <?php if (@$designe->img_2 == '') { ?>
                                                                                <img id='img2' src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign2.jpg" alt="">
                                                                            <?php } else { ?>
                                                                                <img  id='img2' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_2; ?>" alt="">
                                                                            <?php } ?>
                                                                            <span data-id='2' class='imgkid'><i class="fa fa-camera"></i></span>
                                                                        </div>
                                                                        <h4>Second Design</h4>
                                                                    </li>
                                                                    <li>
                                                                        <div class="upload-img">
                                                                            <?php if (@$designe->img_3 == '') { ?>
                                                                                <img id='img3' src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign3.jpg" alt="">
                                                                            <?php } else { ?>
                                                                                <img  id='img3' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_3; ?>" alt="">
                                                                            <?php } ?>
                                                                            <span data-id='3' class='imgkid'><i class="fa fa-camera"></i></span>
                                                                        </div>
                                                                        <h4>Third Design</h4>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <div class="type-box">
                                                                <h3> Brand or store you prefer to shop for your child ?</h3>
                                                                <ul>
                                                                    <li>
                                                                        <input class="radio-box" name="brands[]" value="janine" id="mens_brands1" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('janine', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands1">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo1.png" alt="">
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands2" name="brands[]" value="oldnavy" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('oldnavy', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands2">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo2.png" alt="">
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands3" name="brands[]" value="tea" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('tea', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands3">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo3.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands4" name="brands[]" value="terget" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('terget', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands4">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo4.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands5" name="brands[]" value="jcrew" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('jcrew', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands5">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo5.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands6" name="brands[]" value="nike" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('nike', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands6">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo6.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands7" name="brands[]" value="place" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('place', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands7">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo7.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands8" name="brands[]" value="carters" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('carters', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands8">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo8.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands9" name="brands[]" value="zara" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('zara', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands9">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo9.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands10" name="brands[]" value="gym" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('gym', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands10">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo10.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>
                                                                        <input class="radio-box" id="mens_brands11" name="brands[]" value="under" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('under', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands11">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo11.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands12" name="brands[]" value="gap" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('gap', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands12">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo12.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands13" name="brands[]" value="khals" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('khals', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands13">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo13.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands14" name="brands[]" value="mars" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('mars', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands14">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo14.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands15" name="brands[]" value="just" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('just', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands15">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo15.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands16" name="brands[]" value="jcp" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('jcp', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands16">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo16.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands17" name="brands[]" value="amzone" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('amzone', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands17">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo17.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands18" name="brands[]" value="nord" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('nord', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands18">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo18.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands19" name="brands[]" value="walmert" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('walmert', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands19">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo19.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                    <li>                                                            
                                                                        <input class="radio-box" id="mens_brands20" name="brands[]" value="macy" type="checkbox" <?php if (isset($KidStyles->brands) && in_array('macy', explode(',', @$KidStyles->brands))) { ?> checked <?php } ?>>
                                                                        <label for="mens_brands20">
                                                                            <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo20.png" alt="">
                                                                        </label>
                                                                    </li>  
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-box-data" style="border-bottom: none;">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12 textarea-box">
                                                            <h3 style="margin-top: 10px">Add additional comments</h3>
                                                            <textarea style="margin-top: 0" name="profile_note"><?php echo @$KidStyles->profile_note; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                        <button type="submit" name="boy_kid_custom" value="boy_kid_custom">Next : Manage Your Fit Settings <i class="fas fa-arrow-right"></i></button>
                                                        <a href="#">save and return »</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= $this->Form->end() ?>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
        <?php } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {
            ?>

            <section class="style-contain style-men">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="tab" role="tabpanel">
                                <!-- Nav tabs -->
                                <div class="tab-button-list">
                                    <ul class="nav nav-tabs fixed" role="tablist" id="button-tablist">
                                        <li id="li-1" role="presentation"
                                        <?php
                                        if ($sections == 'stats') {
                                            echo 'class="active"';
                                        } elseif ($sections == '') {
                                            echo 'class="active"';
                                        }
                                        ?>

                                            ><a  <?php if (@$userDetails->user_detail->is_progressbar >= 0) { ?> href="#Section1" aria-controls="home" role="tab" data-toggle="tab"   <?php } ?>>Basic Information</a></li>
                                        <li  id="li-2"role="presentation"
                                        <?php
                                        if ($sections == 'fit') {
                                            echo 'class="active"';
                                        }
                                        ?> 
                                             ><a <?php if (@$userDetails->user_detail->is_progressbar >= 25) { ?> href="#Section2" aria-controls="home" role="tab" data-toggle="tab"<?php } else { ?> style="opacity:0.5" <?php } ?>>Style Fit</a></li>
                                        <li  id="li-3" role="presentation"
                                        <?php
                                        if ($sections == 'styles') {
                                            echo 'class="active"';
                                        }
                                        ?>
                                             ><a <?php if (@$userDetails->user_detail->is_progressbar >= 50) { ?> href="#Section3" aria-controls="home" role="tab" data-toggle="tab" <?php } else { ?> style="opacity:0.5" <?php } ?>>Price Range</a></li>
                                        <li  id="li-4" role="presentation"
                                        <?php
                                        if ($sections == 'custom') {
                                            echo 'class="active"';
                                        }
                                        ?>
                                             ><a <?php if (@$userDetails->user_detail->is_progressbar >= 75) { ?> href="#Section4" aria-controls="home" role="tab" data-toggle="tab" <?php } else { ?> style="opacity:0.5" <?php } ?>>Custom Design & Brands</a></li>
                                    </ul>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content tabs data-filup ">

                                    <div role="tabpanel" class="tab-pane fade  <?php if ($sections == 'section1') { ?> in active <?php } else if ($sections == '') { ?> in active <?php } ?>" id="Section1">
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleWeMen')) ?>
                                        <div class="left-bar fixed" id="sidebar">
                                            <div class="under-box">
                                                <h2>Hi <?php echo $profileName; ?></h2>
                                                <p>Please complete your basic information that will help us to get started to have a best FIT</p>
                                                <div class="profile-image">
                                                    <span><img src="<?php echo HTTP_ROOT ?>assets/women-img/basic_info_women.jpg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <h1>Welcome <?php echo $profileName; ?></h1>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>What is your height?</h3>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="tell_in_feet" id="tall_feet">
                                                                    <option value="">--</option>
                                                                    <option <?php if (@$PersonalizedFix->tell_in_feet == 4) { ?> selected="selected" <?php } ?> value="4">4</option>
                                                                    <option <?php if (@$PersonalizedFix->tell_in_feet == 5) { ?> selected="selected" <?php } ?> value="5">5</option>
                                                                    <option <?php if (@$PersonalizedFix->tell_in_feet == 6) { ?> selected="selected" <?php } ?> value="6">6</option>
                                                                </select>
                                                                <label>ft.</label>
                                                            </div>
                                                            <div class=" select-box">
                                                                <select name="tell_in_inch" id="tell_inch">
                                                                    <option value="">--</option>
                                                                    <?php for ($inc = 1; $inc <= 12; $inc++) { ?>
                                                                        <option <?php if (@$PersonalizedFix->tell_in_inch == $inc) { ?>selected="selected"<?php } ?> value="<?php echo $inc; ?>"><?php echo $inc; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <label>in.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>What is your weight?</h3>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <input type="text" placeholder="" maxlength="3"  id ='weight_lbs' name="weight_lbs" value="<?php echo @$PersonalizedFix->weight_lbs; ?>">
                                                                <label>lbs.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-6 col-md-6 date-box">
                                                        <h3>Your birthday?</h3>
                                                        <div class="select-boxes">
                                                            <input id="datepickerWeMen" type="text" placeholder="mm/dd/yyyy" name="birthday" value="<?php
                                                            if (@$Womeninfo->birthday != '') {
                                                                echo @$Womeninfo->birthday;
                                                            };
                                                            ?>" autocomplete="off" maxlength="10" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>Are you parent ?</h3>
                                                        <div class="switch-field">
                                                            <input type="radio" id="switch_left" name="parent" value="1"  <?php if (@$Womeninfo->parent == 1) { ?> checked <?php } ?>>
                                                            <label for="switch_left">Yes</label>
                                                            <input type="radio" id="switch_right" name="parent" value="0" <?php if (@$Womeninfo->parent == 0) { ?> checked<?php } ?>>
                                                            <label for="switch_right">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box women-type-box body-women">
                                                        <h3>What's your body type?</h3>
                                                        <ul>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Inverted Triangle</h4>
                                                                <input class="radio-box" id="radio2" name="body_type" value="2" type="radio"  <?php if (@$Womeninfo->body_type == 2) { ?> checked <?php } ?>>
                                                                <label for="radio2">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/inverted-triangle.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Triangle</h4>
                                                                <input class="radio-box" id="radio3" type="radio" name="body_type" value="3"  <?php if (@$Womeninfo->body_type == 3) { ?> checked <?php } ?>>
                                                                <label for="radio3">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/triangle.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4 style="margin-top: 0;">rectangle</h4>
                                                                <input class="radio-box" name="body_type" value="1" id="radio1" type="radio" <?php if (@$Womeninfo->body_type == 1) { ?> checked <?php } ?>>
                                                                <label for="radio1">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/rectangle.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4 style="margin-top: 0;">hourglass</h4>
                                                                <input class="radio-box" id="radio4" type="radio" name="body_type" value="4"<?php if (@$Womeninfo->body_type == 4) { ?> checked <?php } ?>>
                                                                <label for="radio4">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/hourglass.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Apple</h4>
                                                                <input class="radio-box" id="radio4z" type="radio" name="body_type" value="5"<?php if (@$Womeninfo->body_type == 5) { ?> checked <?php } ?> >
                                                                <label for="radio4z">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/apple.jpg" alt="">
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data form-box-data2 prefer-women-error">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>What size you prefer?</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                                        <h4 style="margin-top: 0;">BRA SIZE</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="bra" id="bra">
                                                                    <option value="" <?php if (@$SizeChart->bra == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                    <option value="30" <?php if (@$SizeChart->bra == "30") { ?> selected="selected"<?php } ?>>30</option>
                                                                    <option value="32" <?php if (@$SizeChart->bra == "32") { ?> selected="selected"<?php } ?>>32</option>
                                                                    <option value="34" <?php if (@$SizeChart->bra == "34") { ?> selected="selected"<?php } ?>>34</option>
                                                                    <option value="36" <?php if (@$SizeChart->bra == "36") { ?> selected="selected"<?php } ?>>36</option>
                                                                    <option value="38" <?php if (@$SizeChart->bra == "38") { ?> selected="selected"<?php } ?>>38</option>
                                                                    <option value="40" <?php if (@$SizeChart->bra == "40") { ?> selected="selected"<?php } ?>>40</option>
                                                                    <option value="42" <?php if (@$SizeChart->bra == "42") { ?> selected="selected"<?php } ?>>42</option>
                                                                    <option value="44" <?php if (@$SizeChart->bra == "44") { ?> selected="selected"<?php } ?>>44</option>
                                                                    <option value="46" <?php if (@$SizeChart->bra == "46") { ?> selected="selected"<?php } ?>>46</option>
                                                                </select>
                                                            </div>
                                                            <div class="select-box">
                                                                <select name="bra_recomend" id="bra_recomend">
                                                                    <option value="" <?php if (@$SizeChart->bra_recomend == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "AA") { ?> selected="selected"<?php } ?> value="AA">AA</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "A") { ?> selected="selected"<?php } ?> value="A">A</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "B") { ?> selected="selected"<?php } ?> value="B">B</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "C") { ?> selected="selected"<?php } ?> value="C">C</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "D") { ?> selected="selected"<?php } ?> value="D">D</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "DD") { ?> selected="selected"<?php } ?> value="DD">DD</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "DDD") { ?> selected="selected"<?php } ?> value="DDD">DDD</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "F") { ?> selected="selected"<?php } ?> value="F">F</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "G") { ?> selected="selected"<?php } ?> value="G">G</option>
                                                                    <option <?php if (@$SizeChart->bra_recomend == "H") { ?> selected="selected"<?php } ?> value="H">H</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php /* ?>
                                                      <div class="col-sm-4 col-lg-4 col-md-4">
                                                      <h4 style="margin-top: 0;">TOP SIZE</h4>
                                                      <div class="select-boxes">
                                                      <div class=" select-box">
                                                      <select name="pantsr1"  id="pantsr1">
                                                      <option value="" <?php if (@$SizeChart->pantsr1 == "") { ?> selected="selected"<?php } ?>>--</option>
                                                      <option value="4" <?php if (@$SizeChart->pantsr1 == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                      <option value="4.5" <?php if (@$SizeChart->pantsr1 == "4.5") { ?> selected="selected"<?php } ?>>4.5</option>
                                                      <option value="5" <?php if (@$SizeChart->pantsr1 == "5") { ?> selected="selected"<?php } ?>>5</option>
                                                      <option value="5.5" <?php if (@$SizeChart->pantsr1 == "5.5") { ?> selected="selected"<?php } ?>>5.5</option>
                                                      <option value="6" <?php if (@$SizeChart->pantsr1 == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                      <option value="6.5" <?php if (@$SizeChart->pantsr1 == "6.5") { ?> selected="selected"<?php } ?>>6.5</option>
                                                      <option value="7" <?php if (@$SizeChart->pantsr1 == "7") { ?> selected="selected"<?php } ?>>7</option>
                                                      <option value="7.5" <?php if (@$SizeChart->pantsr1 == "7.5") { ?> selected="selected"<?php } ?>>7.5</option>
                                                      <option value="8" <?php if (@$SizeChart->pantsr1 == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                      <option value="8.5" <?php if (@$SizeChart->pantsr1 == "8.5") { ?> selected="selected"<?php } ?>>8.5</option>
                                                      </select>
                                                      </div>
                                                      <div class="select-box select-box2">
                                                      <select name="pantsr2" id="pantsr2">
                                                      <option value="" <?php if (@$SizeChart->pantsr2 == "") { ?> selected="selected"<?php } ?>>--</option>
                                                      <option value="Narrow" <?php if (@$SizeChart->pantsr2 == "Narrow") { ?> selected="selected"<?php } ?>>Narrow</option>
                                                      <option value="Medium" <?php if (@$SizeChart->pantsr2 == "Medium") { ?> selected="selected"<?php } ?>>Medium</option>
                                                      <option value="Wide" <?php if (@$SizeChart->pantsr2 == "Wide") { ?> selected="selected"<?php } ?>>Wide</option>
                                                      <option value="Extra Wide" <?php if (@$SizeChart->pantsr2 == "Extra Wide") { ?> selected="selected"<?php } ?>>Extra Wide</option>

                                                      </select>
                                                      </div>
                                                      </div>
                                                      </div>
                                                      <?php */ ?>

                                                    <div class="col-sm-4 col-lg-4 col-md-4">
                                                        <h4 style="margin-top: 0;">SHIRT &amp; BLOUSE</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="shirt_blouse" id="shirt_blouse">
                                                                    <option value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <?php for ($inc = 2; $inc <= 12; $inc += 2) { ?>
                                                                            <option <?php if (@$SizeChart->shirt_blouse == @$inc) { ?> selected="selected"<?php } ?> value="<?php echo @$inc; ?>"><?php echo @$inc; ?></option>
                                                                        <?php } ?>

                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option value="14W" <?php if (@$SizeChart->shirt_blouse == "14W") { ?> selected="selected"<?php } ?> >14W</option>
                                                                        <option value="16W" <?php if (@$SizeChart->shirt_blouse == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                                        <option value='18W' <?php if (@$SizeChart->shirt_blouse == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                                        <option value="20W" <?php if (@$SizeChart->shirt_blouse == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                        <option value="22W" <?php if (@$SizeChart->shirt_blouse == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                                        <option value="24W" <?php if (@$SizeChart->shirt_blouse == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="select-box select-box2">
                                                                <select name="shirt_blouse_recomend" id="shirt_blouse_recomend" required >
                                                                    <option value="">--</option>
                                                                    <optgroup label="Recommended for 2" style="display: block;">
                                                                        <option value="S (2-4)">S (2-4)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option value="S (2-4)" <?php if (@$SizeChart->shirt_blouse_recomend == "S (2-4)") { ?> selected="selected"<?php } ?>>S (2-4)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option value="XXS (00)" <?php if (@$SizeChart->shirt_blouse_recomend == "XXS (00)") { ?> selected="selected"<?php } ?>>XXS (00)</option>
                                                                        <option value="XS (0)" <?php if (@$SizeChart->shirt_blouse_recomend == "XS (0)") { ?> selected="selected"<?php } ?>>XS (0)</option>
                                                                        <option value="S (2-4)" <?php if (@$SizeChart->shirt_blouse_recomend == "S (2-4)") { ?> selected="selected"<?php } ?>>S (2-4)</option>
                                                                        <option value="M (6-8)" <?php if (@$SizeChart->shirt_blouse_recomend == "M (6-8)") { ?> selected="selected"<?php } ?>>M (6-8)</option>
                                                                        <option value="L (10-12)" <?php if (@$SizeChart->shirt_blouse_recomend == "L (10-12)") { ?> selected="selected"<?php } ?>>L (10-12)</option>
                                                                        <option value="XL (14)" <?php if (@$SizeChart->shirt_blouse_recomend == "XL (14)") { ?> selected="selected"<?php } ?>>XL (14)</option>
                                                                        <option value="XXL (16)" <?php if (@$SizeChart->shirt_blouse_recomend == "XXL (16)") { ?> selected="selected"<?php } ?>>XXL (16)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option value="1X (14W-16W)" <?php if (@$SizeChart->shirt_blouse_recomend == "1X (14W-16W)") { ?> selected="selected"<?php } ?>>1X (14W-16W)</option>
                                                                        <option value="2X (18W-20W)" <?php if (@$SizeChart->shirt_blouse_recomend == "2X (18W-20W)") { ?> selected="selected"<?php } ?>>2X (18W-20W)</option>
                                                                        <option value="3X (22W-24W)" <?php if (@$SizeChart->shirt_blouse_recomend == "3X (22W-24W)") { ?> selected="selected"<?php } ?>>3X (22W-24W)</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                                        <h4 style="margin-top:0px;">JACKET SIZE</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="wo_jackect_size" id="wo_jackect_size" style="width: 100%;">
                                                                    <option value="" selected disabled>--</option>
                                                                    <option value="XS(0-2)" <?php if (@$SizeChart->wo_jackect_size == "XS(0-2)") { ?> selected="selected"<?php } ?> >XS(0-2)</option>
                                                                    <option value="S(2-4)" <?php if (@$SizeChart->wo_jackect_size == "S(2-4)") { ?> selected="selected"<?php } ?> >S(2-4)</option>
                                                                    <option value="M(6-8)" <?php if (@$SizeChart->wo_jackect_size == "M(6-8)") { ?> selected="selected"<?php } ?> >M(6-8)</option>
                                                                    <option value="L(10-12)" <?php if (@$SizeChart->wo_jackect_size == "L(10-12)") { ?> selected="selected"<?php } ?> >L(10-12)</option>
                                                                    <option value="XL(14)" <?php if (@$SizeChart->wo_jackect_size == "XL(14)") { ?> selected="selected"<?php } ?> >XL(14)</option>
                                                                    <option value="1X(14W-16W)" <?php if (@$SizeChart->wo_jackect_size == "1X(14W-16W)") { ?> selected="selected"<?php } ?> >1X(14W-16W)</option>
                                                                    <option value="2X(18W-20W)" <?php if (@$SizeChart->wo_jackect_size == "2X(18W-20W)") { ?> selected="selected"<?php } ?> >2X(18W-20W)</option>
                                                                    <option value="3X(22W-24W)" <?php if (@$SizeChart->wo_jackect_size == "3X(22W-24W)") { ?> selected="selected"<?php } ?> >3X(22W-24W)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-lg-4 col-md-4">
                                                        <h4>DRESS</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="dress" id="dress" >
                                                                    <option value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <?php for ($inc = 2; $inc <= 12; $inc += 2) { ?>
                                                                            <option <?php if (@$SizeChart->dress == $inc) { ?>selected="selected" <?php } ?> value="<?php echo @$inc; ?>"><?php echo @$inc; ?></option>
                                                                        <?php } ?>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option value="14W" <?php if (@$SizeChart->dress == "14W") { ?>selected="selected" <?php } ?>>14W</option>
                                                                        <option value="16W" <?php if (@$SizeChart->dress == "16W") { ?> selected="selected" <?php } ?>>16W</option>
                                                                        <option value="18W" <?php if (@$SizeChart->dress == "18W") { ?> selected="selected" <?php } ?>>18W</option>
                                                                        <option value="20W" <?php if (@$SizeChart->dress == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                        <option value="22W" <?php if (@$SizeChart->dress == "22W") { ?>selected="selected"<?php } ?>>22W</option>
                                                                        <option value="24W" <?php if (@$SizeChart->dress == "24W") { ?> selected="selected" <?php } ?>>24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="select-box select-box2">
                                                                <select name="dress_recomended" id="dress_recomended" required>
                                                                    <option value="">--</option>
                                                                    <option value="L (10-12)" <?php if (@$SizeChart->dress_recomended == "L (10-12)") { ?>selected="selected" <?php } ?>>L (10-12)</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option value="XXS (00)" <?php if (@$SizeChart->dress_recomended == "XXS (00)") { ?>selected="selected" <?php } ?>>XXS (00)</option>
                                                                        <option value="XS (0)" <?php if (@$SizeChart->dress_recomended == "XS (0)") { ?>selected="selected" <?php } ?>>XS (0)</option>
                                                                        <option value="S (2-4)" <?php if (@$SizeChart->dress_recomended == "S (2-4)") { ?>selected="selected" <?php } ?>>S (2-4)</option>
                                                                        <option value="M (6-8)" <?php if (@$SizeChart->dress_recomended == "M (6-8)") { ?>selected="selected" <?php } ?>>M (6-8)</option>
                                                                        <option value="L (10-12)" <?php if (@$SizeChart->dress_recomended == "L (10-12)") { ?>selected="selected" <?php } ?>>L (10-12)</option>
                                                                        <option value="XL (14)" <?php if (@$SizeChart->dress_recomended == "XL (14)") { ?>selected="selected" <?php } ?>>XL (14)</option>
                                                                        <option value="XXL (16)" <?php if (@$SizeChart->dress_recomended == "XXL (16)") { ?>selected="selected" <?php } ?>>XXL (16)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option value="1X (14W-16W)" <?php if (@$SizeChart->dress_recomended == "1X (14W-16W)") { ?>selected="selected" <?php } ?>>1X (14W-16W)</option>
                                                                        <option value="2X (18W-20W)" <?php if (@$SizeChart->dress_recomended == "2X (18W-20W)") { ?>selected="selected" <?php } ?>>2X (18W-20W)</option>
                                                                        <option value="3X (22W-24W)" <?php if (@$SizeChart->dress_recomended == "3X (22W-24W)") { ?>selected="selected" <?php } ?>>3X (22W-24W)</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-lg-2 col-md-2">
                                                        <h4>SKIRT SIZE</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="skirt" id="skirt">
                                                                    <option value="" <?php if (@$SizeChart->skirt == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                    <option value="XXS" <?php if (@$SizeChart->skirt == "XXS") { ?> selected="selected"<?php } ?>>XXS</option>
                                                                    <option value="XS" <?php if (@$SizeChart->skirt == "XS") { ?> selected="selected"<?php } ?>>XS</option>
                                                                    <option value="S" <?php if (@$SizeChart->skirt == "S") { ?> selected="selected"<?php } ?>>S</option>
                                                                    <option value="M" <?php if (@$SizeChart->skirt == "M") { ?> selected="selected"<?php } ?>>M</option>
                                                                    <option value="L" <?php if (@$SizeChart->skirt == "L") { ?> selected="selected"<?php } ?>>L</option>
                                                                    <option value="XL" <?php if (@$SizeChart->skirt == "XL") { ?> selected="selected"<?php } ?>>XL</option>
                                                                    <option value="XXL" <?php if (@$SizeChart->skirt == "XXL") { ?> selected="selected"<?php } ?>>XXL</option>
                                                                    <option value="1X" <?php if (@$SizeChart->skirt == "1X") { ?> selected="selected"<?php } ?>>1X</option>
                                                                    <option value="2X" <?php if (@$SizeChart->skirt == "2X") { ?> selected="selected"<?php } ?>>2X</option>
                                                                    <option value="3X" <?php if (@$SizeChart->skirt == "3X") { ?> selected="selected"<?php } ?>>3X</option>
                                                                    <option value="4X" <?php if (@$SizeChart->skirt == "4X") { ?> selected="selected"<?php } ?>>4X</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                                        <h4>PANTS</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="pants" id="pants">
                                                                    <option value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option value="00" <?php if (@$SizeChart->pants == "00") { ?> selected="selected"<?php } ?>>00</option>
                                                                        <option value="00" <?php if (@$SizeChart->pants == "00") { ?> selected="selected"<?php } ?>>00</option>
                                                                        <option value="0" <?php if (@$SizeChart->pants == "0") { ?> selected="selected"<?php } ?>>0</option>
                                                                        <option value="2" <?php if (@$SizeChart->pants == "2") { ?> selected="selected"<?php } ?>>2</option>
                                                                        <option value="4" <?php if (@$SizeChart->pants == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                                        <option value="6" <?php if (@$SizeChart->pants == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                                        <option value="8" <?php if (@$SizeChart->pants == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                                        <option value="10" <?php if (@$SizeChart->pants == "10") { ?> selected="selected"<?php } ?>>10</option>
                                                                        <option value="12" <?php if (@$SizeChart->pants == "12") { ?> selected="selected"<?php } ?>>12</option>
                                                                        <option value="14" <?php if (@$SizeChart->pants == "14") { ?> selected="selected"<?php } ?>>14</option>
                                                                        <option value="16" <?php if (@$SizeChart->pants == "16") { ?> selected="selected"<?php } ?>>16</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option value="14W" <?php if (@$SizeChart->pants == "14W") { ?> selected="selected"<?php } ?>>14W</option>
                                                                        <option value="16W" <?php if (@$SizeChart->pants == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                                        <option value="18W" <?php if (@$SizeChart->pants == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                                        <option value="20W" <?php if (@$SizeChart->pants == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                        <option value="22W" <?php if (@$SizeChart->pants == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                                        <option value="24W" <?php if (@$SizeChart->pants == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                                        <h4>JEANS SIZE</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="jeans" id="jeans">
                                                                    <option value="" <?php if (@$SizeChart->jeans == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option value="00" <?php if (@$SizeChart->jeans == "00") { ?> selected="selected"<?php } ?>>00</option>
                                                                        <option value="0" <?php if (@$SizeChart->jeans == "0") { ?> selected="selected"<?php } ?>>0</option>
                                                                        <option value="2" <?php if (@$SizeChart->jeans == "2") { ?> selected="selected"<?php } ?>>2</option>
                                                                        <option value="4" <?php if (@$SizeChart->jeans == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                                        <option value="6" <?php if (@$SizeChart->jeans == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                                        <option value="8" <?php if (@$SizeChart->jeans == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                                        <option value="10" <?php if (@$SizeChart->jeans == "10") { ?> selected="selected"<?php } ?>>10</option>
                                                                        <option value="12" <?php if (@$SizeChart->jeans == "12") { ?> selected="selected"<?php } ?>>12</option>
                                                                        <option value="14" <?php if (@$SizeChart->jeans == "14") { ?> selected="selected"<?php } ?>>14</option>
                                                                        <option value="16" <?php if (@$SizeChart->jeans == "16") { ?> selected="selected"<?php } ?>>16</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option value="14W" <?php if (@$SizeChart->jeans == "14W") { ?> selected="selected"<?php } ?>>14W</option>
                                                                        <option value="16W" <?php if (@$SizeChart->jeans == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                                        <option value="18W" <?php if (@$SizeChart->jeans == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                                        <option value="20W" <?php if (@$SizeChart->jeans == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                        <option value="22W" <?php if (@$SizeChart->jeans == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                                        <option value="24W" <?php if (@$SizeChart->jeans == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php /* ?>
                                                      <div class="col-sm-4 col-lg-4 col-md-4">
                                                      <h4>ACTIVE WEAR SIZE</h4>
                                                      <div class="select-boxes">
                                                      <div class=" select-box">
                                                      <select name="active_wr" id="active_wr">
                                                      <option value="" <?php if (@$SizeChart->active_wr == "") { ?> selected="selected"<?php } ?>>--</option>
                                                      <option value="XXS" <?php if (@$SizeChart->active_wr == "XXS") { ?> selected="selected"<?php } ?>>XXS</option>
                                                      <option value="XS" <?php if (@$SizeChart->active_wr == "XS") { ?> selected="selected"<?php } ?>>XS</option>
                                                      <option value="S" <?php if (@$SizeChart->active_wr == "S") { ?> selected="selected"<?php } ?>>S</option>
                                                      <option value="M" <?php if (@$SizeChart->active_wr == "M") { ?> selected="selected"<?php } ?>>M</option>
                                                      <option value="L" <?php if (@$SizeChart->active_wr == "L") { ?> selected="selected"<?php } ?>>L</option>
                                                      <option value="XL" <?php if (@$SizeChart->active_wr == "XL") { ?> selected="selected"<?php } ?>>XL</option>
                                                      <option value="XXL" <?php if (@$SizeChart->active_wr == "XXL") { ?> selected="selected"<?php } ?>>XXL</option>
                                                      <option value="1X" <?php if (@$SizeChart->active_wr == "1X") { ?> selected="selected"<?php } ?>>1X</option>
                                                      <option value="2X" <?php if (@$SizeChart->active_wr == "2X") { ?> selected="selected"<?php } ?>>2X</option>
                                                      <option value="3X" <?php if (@$SizeChart->active_wr == "3X") { ?> selected="selected"<?php } ?>>3X</option>
                                                      </select>
                                                      </div>
                                                      </div>
                                                      </div>
                                                      <?php */ ?>

                                                    <div class="col-sm-4 col-lg-4 col-md-4">
                                                        <h4>BOTTOM SIZE</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="wo_bottom" id="wo_bottom" style="width: 100%;">
                                                                    <option value="" selected disabled>--</option>
                                                                    <option value="XS(0-2)" <?php if (@$SizeChart->wo_bottom == "XS(0-2)") { ?> selected="selected"<?php } ?> >XS(0-2)</option>
                                                                    <option value="S(2-4)" <?php if (@$SizeChart->wo_bottom == "S(2-4)") { ?> selected="selected"<?php } ?> >S(2-4)</option>
                                                                    <option value="M(6-8)" <?php if (@$SizeChart->wo_bottom == "M(6-8)") { ?> selected="selected"<?php } ?> >M(6-8)</option>
                                                                    <option value="L(10-12)" <?php if (@$SizeChart->wo_bottom == "L(10-12)") { ?> selected="selected"<?php } ?> >L(10-12)</option>
                                                                    <option value="XL(14)" <?php if (@$SizeChart->wo_bottom == "XL(14)") { ?> selected="selected"<?php } ?> >XL(14)</option>
                                                                    <option value="1X(14W-16W)" <?php if (@$SizeChart->wo_bottom == "1X(14W-16W)") { ?> selected="selected"<?php } ?> >1X(14W-16W)</option>
                                                                    <option value="2X(18W-20W)" <?php if (@$SizeChart->wo_bottom == "2X(18W-20W)") { ?> selected="selected"<?php } ?> >2X(18W-20W)</option>
                                                                    <option value="3X(22W-24W)" <?php if (@$SizeChart->wo_bottom == "3X(22W-24W)") { ?> selected="selected"<?php } ?> >3X(22W-24W)</option>
                                                                    <option value="4X(26W-28W)" <?php if (@$SizeChart->wo_bottom == "4X(26W-28W)") { ?> selected="selected"<?php } ?> >4X(26W-28W)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>What is your shoe size?</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <div class="select-boxes">
                                                            <div class="select-box select-box2">
                                                                <select name="shoe" id="shoe">
                                                                    <option value="" <?php if (@$SizeChart->shoe == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                    <?php for ($si = 4; $si <= 13; $si = $si + 0.5) { ?>
                                                                        <option value="<?= $si; ?>" <?php if (@$SizeChart->shoe == $si) { ?> selected="selected"<?php } ?> ><?= $si; ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data checkboxes">
                                                <div class="row">
                                                    <div class="col-sm-8 col-lg-12 col-md-12">
                                                        <h3>Which style of shoes do you prefer?(Select all that apply) </h3>
                                                        <div class="select-boxes">
                                                            <ul>
                                                                <li>

                                                                    <input id="check-box1" name="women_shoe_prefer[]" type="checkbox" value="Pumps" <?php if (isset($women_shoe_prefer->brands) && in_array('Pumps', explode(',', @$women_shoe_prefer->brands))) { ?> checked <?php } ?>>
                                                                    <label for="check-box1">Pumps</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box2" name="women_shoe_prefer[]" type="checkbox" value="Sandals" <?php if (isset($women_shoe_prefer->brands) && in_array('Sandals', explode(',', @$women_shoe_prefer->brands))) { ?> checked <?php } ?>>
                                                                    <label for="check-box2">Sandals</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box3" name="women_shoe_prefer[]" type="checkbox" value="Sneakers" <?php if (isset($women_shoe_prefer->brands) && in_array('Sneakers', explode(',', @$women_shoe_prefer->brands))) { ?> checked <?php } ?>>
                                                                    <label for="check-box3">Sneakers</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box4" name="women_shoe_prefer[]" type="checkbox" value="Boots-Booties" <?php if (isset($women_shoe_prefer->brands) && in_array('Boots-Booties', explode(',', @$women_shoe_prefer->brands))) { ?> checked <?php } ?>>
                                                                    <label for="check-box4">Boots & Booties</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box5" name="women_shoe_prefer[]" type="checkbox" value="Loafers-Flats" <?php if (isset($women_shoe_prefer->brands) && in_array('Loafers-Flats', explode(',', @$women_shoe_prefer->brands))) { ?> checked <?php } ?>>
                                                                    <label for="check-box5">Loafers & Flats</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box1a" name="women_shoe_prefer[]" type="checkbox" value="Wedges" <?php if (isset($women_shoe_prefer->brands) && in_array('Wedges', explode(',', @$women_shoe_prefer->brands))) { ?> checked <?php } ?>>
                                                                    <label for="check-box1a">Wedges</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box6" name="women_shoe_prefer[]" type="checkbox" value="Clogs-Mules" <?php if (isset($women_shoe_prefer->brands) && in_array('Clogs-Mules', explode(',', @$women_shoe_prefer->brands))) { ?> checked <?php } ?>>
                                                                    <label for="check-box6">Clogs & Mules</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box7" name="women_shoe_prefer[]" type="checkbox" value="Platforms" <?php if (isset($women_shoe_prefer->brands) && in_array('Platforms', explode(',', @$women_shoe_prefer->brands))) { ?> checked <?php } ?>>
                                                                    <label for="check-box7">Platforms</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-box-data checkboxes">
                                                <div class="row">
                                                    <div class="col-sm-8 col-lg-12 col-md-12">
                                                        <h3>Which heel height do you prefer?(Select all that apply)</h3>
                                                        <div class="select-boxes">
                                                            <ul> 
                                                                <li>

                                                                    <input id="check-box8" name="womenHeelHightPrefer[]" type="checkbox" value='Flat(Under 1")' <?php if (isset($womenHeelHightPrefer->height) && in_array('Flat(Under 1")', explode(',', @$womenHeelHightPrefer->height))) { ?> checked <?php } ?> >
                                                                    <label for="check-box8">Flat(Under 1")</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box9" name="womenHeelHightPrefer[]" type="checkbox" value='High(3"-4")' <?php if (isset($womenHeelHightPrefer->height) && in_array('High(3"-4")', explode(',', @$womenHeelHightPrefer->height))) { ?> checked <?php } ?>>
                                                                    <label for="check-box9">High(3"-4")</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box10" name="womenHeelHightPrefer[]" type="checkbox" value='Low(1"-2")' <?php if (isset($womenHeelHightPrefer->height) && in_array('Low(1"-2")', explode(',', @$womenHeelHightPrefer->height))) { ?> checked <?php } ?>>
                                                                    <label for="check-box10">Low(1"-2")</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box11" name="womenHeelHightPrefer[]" type="checkbox" value='Ultra High(4.5"+)' <?php if (isset($womenHeelHightPrefer->height) && in_array('Ultra High(4.5"+)', explode(',', @$womenHeelHightPrefer->height))) { ?> checked <?php } ?>>
                                                                    <label for="check-box11">Ultra High(4.5"+)</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-box12" name="womenHeelHightPrefer[]" type="checkbox" value='Mid(2"-3")' <?php if (isset($womenHeelHightPrefer->height) && in_array('Mid(2"-3")', explode(',', @$womenHeelHightPrefer->height))) { ?> checked <?php } ?>>
                                                                    <label for="check-box12">Mid(2"-3")</label>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>What is your profession?</h3>
                                                        <div class="occupation">
                                                            <ul>
                                                                <li><label for="radioa6" class="input-control radio">
                                                                        <input type="radio" id="radioa6" name="your_occupation" value="1" <?= @$Womeninfo->occupation_v2 == 1 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Architecture / Engineering     
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob1" class="input-control radio">
                                                                        <input type="radio" id="radiob1" name="your_occupation" value="2"  <?= @$Womeninfo->occupation_v2 == 2 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Art / Design
                                                                    </label></li>
                                                                <li><label for="radioc2" class="input-control radio">
                                                                        <input type="radio" id="radioc2" name="your_occupation" value="3"  <?= @$Womeninfo->occupation_v2 == 3 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Building / Maintenance
                                                                    </label></li>
                                                                <li><label for="radioa3" class="input-control radio">
                                                                        <input type="radio" id="radioa3" name="your_occupation" value="4"  <?= @$Womeninfo->occupation_v2 == 4 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Business / Client Service
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob4" class="input-control radio">
                                                                        <input type="radio" id="radiob4" name="your_occupation" value="5"  <?= @$Womeninfo->occupation_v2 == 5 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Community / Social Service
                                                                    </label></li>
                                                                <li><label for="radioc5" class="input-control radio">
                                                                        <input type="radio" id="radioc5" name="your_occupation" value="6"  <?= @$Womeninfo->occupation_v2 == 6 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Computer / IT
                                                                    </label></li>
                                                                <li><label for="radioa7" class="input-control radio">
                                                                        <input type="radio" id="radioa7" name="your_occupation" value="7"  <?= @$Womeninfo->occupation_v2 == 7 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Education
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob8" class="input-control radio">
                                                                        <input type="radio" id="radiob8" name="your_occupation" value="8"  <?= @$Womeninfo->occupation_v2 == 8 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Entertainer / Performer
                                                                    </label></li>
                                                                <li><label for="radioc9" class="input-control radio">
                                                                        <input type="radio" id="radioc9" name="your_occupation" value="9"  <?= @$Womeninfo->occupation_v2 == 9 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Farming / Fishing / Forestry
                                                                    </label></li>
                                                                <li><label for="radioc10" class="input-control radio">
                                                                        <input type="radio" id="radioc10" name="your_occupation" value="10" <?= @$Womeninfo->occupation_v2 == 10 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Financial Services
                                                                    </label></li>
                                                                <li><label for="radioa11" class="input-control radio">
                                                                        <input type="radio" id="radioa11" name="your_occupation" value="11" <?= @$Womeninfo->occupation_v2 == 11 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Health Practitioner / Technician
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob12" class="input-control radio">
                                                                        <input type="radio" id="radiob12" name="your_occupation" value="12" <?= @$Womeninfo->occupation_v2 == 12 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Hospitality / Food Service
                                                                    </label></li>
                                                                <li><label for="radio13" class="input-control radio">
                                                                        <input type="radio" id="radio13" name="your_occupation" value="13"  <?= @$Womeninfo->occupation_v2 == 13 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Management
                                                                    </label></li>
                                                                <li><label for="radioa14" class="input-control radio">
                                                                        <input type="radio" id="radioa14" name="your_occupation" value="14" <?= @$Womeninfo->occupation_v2 == 14 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Media / Communications
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob15" class="input-control radio">
                                                                        <input type="radio" id="radiob15" name="your_occupation" value="15" <?= @$Womeninfo->occupation_v2 == 15 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Military / Protective Service
                                                                    </label></li>
                                                                <li><label for="radioc16" class="input-control radio">
                                                                        <input type="radio" id="radioc16" name="your_occupation" value="16" <?= @$Womeninfo->occupation_v2 == 16 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Legal
                                                                    </label></li>
                                                                <li><label for="radioa17" class="input-control radio">
                                                                        <input type="radio" id="radioa17" name="your_occupation" value="17" <?= @$Womeninfo->occupation_v2 == 17 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Office / Administration
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob18" class="input-control radio">
                                                                        <input type="radio" id="radiob18" name="your_occupation" value="18" <?= @$Womeninfo->occupation_v2 == 18 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Average
                                                                    </label></li>
                                                                <li><label for="radioc19" class="input-control radio">
                                                                        <input type="radio" id="radioc19" name="your_occupation" value="19" <?= @$Womeninfo->occupation_v2 == 19 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Personal Care &amp; Service
                                                                    </label></li>
                                                                <li><label for="radioc20" class="input-control radio">
                                                                        <input type="radio" id="radioc20" name="your_occupation" value="20" <?= @$Womeninfo->occupation_v2 == 20 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Production / Manufacturing
                                                                    </label></li>
                                                                <li><label for="radioa21" class="input-control radio">
                                                                        <input type="radio" id="radioa21" name="your_occupation" value="21" <?= @$Womeninfo->occupation_v2 == 21 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Retail
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob22" class="input-control radio">
                                                                        <input type="radio" id="radiob22" name="your_occupation" value="22" <?= @$Womeninfo->occupation_v2 == 22 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Sales
                                                                    </label></li>
                                                                <li><label for="radioc23" class="input-control radio">
                                                                        <input type="radio" id="radioc23" name="your_occupation" value="23" <?= @$Womeninfo->occupation_v2 == 23 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Science
                                                                    </label></li>
                                                                <li><label for="radioa24" class="input-control radio">
                                                                        <input type="radio" id="radioa24" name="your_occupation" value="24" <?= @$Womeninfo->occupation_v2 == 24 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Technology
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob25" class="input-control radio">
                                                                        <input type="radio" id="radiob25" name="your_occupation" value="25" <?= @$Womeninfo->occupation_v2 == 25 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Transportation
                                                                    </label></li>
                                                                <li><label for="radioc26" class="input-control radio">
                                                                        <input type="radio" id="radioc26" name="your_occupation" value="26" <?= @$Womeninfo->occupation_v2 == 26 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Self-Employed
                                                                    </label></li>
                                                                <li><label for="radioa27" class="input-control radio">
                                                                        <input type="radio" id="radioa27" name="your_occupation" value="27" <?= @$Womeninfo->occupation_v2 == 27 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Stay-At-Home Parent
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob28" class="input-control radio">
                                                                        <input type="radio" id="radiob28" name="your_occupation" value="28" <?= @$Womeninfo->occupation_v2 == 28 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Student
                                                                    </label></li>
                                                                <li><label for="radioc29" class="input-control radio">
                                                                        <input type="radio" id="radioc29" name="your_occupation" value="29" <?= @$Womeninfo->occupation_v2 == 29 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Retired
                                                                    </label></li>
                                                                <li><label for="radioc30" class="input-control radio">
                                                                        <input type="radio" id="radioc30" name="your_occupation" value="30" <?= @$Womeninfo->occupation_v2 == 30 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Not Employed
                                                                    </label></li>
                                                                <li><label for="radioc31" class="input-control radio">
                                                                        <input type="radio" id="radioc31" name="your_occupation" value="31" <?= @$Womeninfo->occupation_v2 == 31 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Other
                                                                    </label></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 skin">
                                                        <h3>Tell us your skin Tone?</h3>
                                                        <ul>
                                                            <li>
                                                                <input class="radio-box" value='1' id="radio2a" name="skin_tone" type="radio"  <?= @$Womeninfo->skin_tone == 1 ? "checked" : ""; ?>>
                                                                <label for="radio2a"></label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" value='2' id="radio2b" name="skin_tone" type="radio" <?= @$Womeninfo->skin_tone == 2 ? "checked" : ""; ?>>
                                                                <label for="radio2b"></label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" value='3' id="radio2c" name="skin_tone" type="radio" <?= @$Womeninfo->skin_tone == 3 ? "checked" : ""; ?>>
                                                                <label for="radio2c"></label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" value='4' id="radio2d" name="skin_tone" type="radio" <?= @$Womeninfo->skin_tone == 4 ? "checked" : ""; ?>>
                                                                <label for="radio2d"></label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" value='5' id="radio2e" name="skin_tone" type="radio" <?= @$Womeninfo->skin_tone == 5 ? "checked" : ""; ?>>
                                                                <label for="radio2e"></label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" value='6' id="radio2f" name="skin_tone" type="radio" <?= @$Womeninfo->skin_tone == 6 ? "checked" : ""; ?>>
                                                                <label for="radio2f"><span>OTHER</span></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 note-label">
                                                        <h3>What parts of your body are you comfortable showing off?</h3>
                                                        <ul>
                                                            <li>
                                                                <input class="radio-box" id="check-box3a" name="comfortable_showing_off[]" type="checkbox" value='Arms' <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Arms', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> checked <?php } ?>>
                                                                <label for="check-box3a">Arms</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3b" name="comfortable_showing_off[]" type="checkbox" value='Bust'  <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Bust', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> checked <?php } ?>>
                                                                <label for="check-box3b">Bust</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3c" name="comfortable_showing_off[]" type="checkbox" value='Stomach'  <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Stomach', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> checked <?php } ?>>
                                                                <label for="check-box3c">Stomach</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3d" name="comfortable_showing_off[]" type="checkbox" value='Back'  <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Back', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> checked <?php } ?>>
                                                                <label for="check-box3d">Back</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3e" name="comfortable_showing_off[]" type="checkbox" value='Waist'  <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Waist', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> checked <?php } ?>>
                                                                <label for="check-box3e">Waist</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3f" name="comfortable_showing_off[]" type="checkbox" value='Hips/Butt'  <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Hips/Butt', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> checked <?php } ?>>
                                                                <label for="check-box3f">Hips/Butt</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3g" name="comfortable_showing_off[]" value='Legs' type="checkbox"  <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Legs', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> checked <?php } ?>>
                                                                <label for="check-box3g">Legs</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 note-label">
                                                        <h3>What parts of your body do you like to keep covered?</h3>
                                                        <ul>
                                                            <li>
                                                                <input class="radio-box" id="check-box3h" name="keep_covered[]" type="checkbox" value='Arms' <?php if (isset($Womeninfo->keep_covered) && in_array('Arms', explode(',', @$Womeninfo->keep_covered))) { ?> checked <?php } ?>>
                                                                <label for="check-box3h">Arms</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3i" name="keep_covered[]" type="checkbox" value='Bust' <?php if (isset($Womeninfo->keep_covered) && in_array('Bust', explode(',', @$Womeninfo->keep_covered))) { ?> checked <?php } ?>>
                                                                <label for="check-box3i">Bust</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3j" name="keep_covered[]" type="checkbox" value='Stomach' <?php if (isset($Womeninfo->keep_covered) && in_array('Stomach', explode(',', @$Womeninfo->keep_covered))) { ?> checked <?php } ?>>
                                                                <label for="check-box3j">Stomach</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3k" name="keep_covered[]" type="checkbox" value='Back' <?php if (isset($Womeninfo->keep_covered) && in_array('Back', explode(',', @$Womeninfo->keep_covered))) { ?> checked <?php } ?>>
                                                                <label for="check-box3k">Back</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3l" name="keep_covered[]" type="checkbox" value='Waist' <?php if (isset($Womeninfo->keep_covered) && in_array('Waist', explode(',', @$Womeninfo->keep_covered))) { ?> checked <?php } ?>>
                                                                <label for="check-box3l">Waist</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3m" name="keep_covered[]" type="checkbox" value='Hips/Butt' <?php if (isset($Womeninfo->keep_covered) && in_array('Hips/Butt', explode(',', @$Womeninfo->keep_covered))) { ?> checked <?php } ?>>
                                                                <label for="check-box3m">Hips/Butt</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3n" name="keep_covered[]" type="checkbox" value='Legs' <?php if (isset($Womeninfo->keep_covered) && in_array('Legs', explode(',', @$Womeninfo->keep_covered))) { ?> checked <?php } ?>>
                                                                <label for="check-box3n">Legs</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data form-box-data2">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>Your Proportions?</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 col-lg-2 col-md-2">
                                                        <h4 style="margin-top: 0;">Shoulders?</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="proportion_shoulders" id="proportion_shoulders">
                                                                    <option value="" <?php if (@$SizeChart->proportion_shoulders == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option value="00" <?php if (@$SizeChart->proportion_shoulders == "00") { ?> selected="selected"<?php } ?>>00</option>
                                                                        <option value="0" <?php if (@$SizeChart->proportion_shoulders == "0") { ?> selected="selected"<?php } ?>>0</option>
                                                                        <option value="2" <?php if (@$SizeChart->proportion_shoulders == "2") { ?> selected="selected"<?php } ?>>2</option>
                                                                        <option value="4" <?php if (@$SizeChart->proportion_shoulders == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                                        <option value="6" <?php if (@$SizeChart->proportion_shoulders == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                                        <option value="8" <?php if (@$SizeChart->proportion_shoulders == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                                        <option value="10" <?php if (@$SizeChart->proportion_shoulders == "10") { ?> selected="selected"<?php } ?>>10</option>
                                                                        <option value="12" <?php if (@$SizeChart->proportion_shoulders == "12") { ?> selected="selected"<?php } ?>>12</option>
                                                                        <option value="14" <?php if (@$SizeChart->proportion_shoulders == "14") { ?> selected="selected"<?php } ?>>14</option>
                                                                        <option value="16" <?php if (@$SizeChart->proportion_shoulders == "16") { ?> selected="selected"<?php } ?>>16</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option value="14W" <?php if (@$SizeChart->proportion_shoulders == "14W") { ?> selected="selected"<?php } ?>>14W</option>
                                                                        <option value="16W" <?php if (@$SizeChart->proportion_shoulders == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                                        <option value="18W" <?php if (@$SizeChart->proportion_shoulders == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                                        <option value="20W" <?php if (@$SizeChart->proportion_shoulders == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                        <option value="22W" <?php if (@$SizeChart->proportion_shoulders == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                                        <option value="24W" <?php if (@$SizeChart->proportion_shoulders == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-lg-2 col-md-2">
                                                        <h4 style="margin-top: 0;">Legs?</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="proportion_legs" id="proportion_legs">
                                                                    <option value="" <?php if (@$SizeChart->proportion_legs == "") { ?> selected="selected"<?php } ?>>--</option>

                                                                    <option value="30" <?php if (@$SizeChart->proportion_legs == "30") { ?> selected="selected"<?php } ?>>30</option>
                                                                    <option value="32" <?php if (@$SizeChart->proportion_legs == "32") { ?> selected="selected"<?php } ?>>32</option>
                                                                    <option value="34" <?php if (@$SizeChart->proportion_legs == "34") { ?> selected="selected"<?php } ?>>34</option>
                                                                    <option value="36" <?php if (@$SizeChart->proportion_legs == "36") { ?> selected="selected"<?php } ?>>36</option>
                                                                    <option value="38" <?php if (@$SizeChart->proportion_legs == "38") { ?> selected="selected"<?php } ?>>38</option>
                                                                    <option value="40" <?php if (@$SizeChart->proportion_legs == "40") { ?> selected="selected"<?php } ?>>40</option>
                                                                    <option value="42" <?php if (@$SizeChart->proportion_legs == "42") { ?> selected="selected"<?php } ?>>42</option>
                                                                    <option value="44" <?php if (@$SizeChart->proportion_legs == "44") { ?> selected="selected"<?php } ?>>44</option>
                                                                    <option value="46" <?php if (@$SizeChart->proportion_legs == "46") { ?> selected="selected"<?php } ?>>46</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-lg-2 col-md-2">
                                                        <h4 style="margin-top: 0;">Arms?</h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="proportion_arms" id="proportion_arms">
                                                                    <option value="" <?php if (@$SizeChart->proportion_arms == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                    <option value="XXS" <?php if (@$SizeChart->proportion_arms == "XXS") { ?> selected="selected"<?php } ?>>XXS</option>
                                                                    <option value="XS" <?php if (@$SizeChart->proportion_arms == "XS") { ?> selected="selected"<?php } ?>>XS</option>
                                                                    <option value="S" <?php if (@$SizeChart->proportion_arms == "S") { ?> selected="selected"<?php } ?>>S</option>
                                                                    <option value="M" <?php if (@$SizeChart->proportion_arms == "M") { ?> selected="selected"<?php } ?>>M</option>
                                                                    <option value="L" <?php if (@$SizeChart->proportion_arms == "L") { ?> selected="selected"<?php } ?>>L</option>
                                                                    <option value="XL" <?php if (@$SizeChart->proportion_arms == "XL") { ?> selected="selected"<?php } ?>>XL</option>
                                                                    <option value="XXL" <?php if (@$SizeChart->proportion_arms == "XXL") { ?> selected="selected"<?php } ?>>XXL</option>
                                                                    <option value="1X" <?php if (@$SizeChart->proportion_arms == "1X") { ?> selected="selected"<?php } ?>>1X</option>
                                                                    <option value="2X" <?php if (@$SizeChart->proportion_arms == "2X") { ?> selected="selected"<?php } ?>>2X</option>
                                                                    <option value="3X" <?php if (@$SizeChart->proportion_arms == "3X") { ?> selected="selected"<?php } ?>>3X</option>  

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-lg-2 col-md-2">
                                                        <h4 style="margin-top: 0;">Hips? </h4>
                                                        <div class="select-boxes">
                                                            <div class=" select-box">
                                                                <select name="proportion_hips" id="jeans">
                                                                    <option value="">--</option>
                                                                    <optgroup label="Women's Sizes"> 
                                                                        <option value="" <?php if (@$SizeChart->proportion_hips == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                        <option value="00" <?php if (@$SizeChart->proportion_hips == '00') { ?> selected="selected"<?php } ?>>00</option>
                                                                        <option value="0" <?php if (@$SizeChart->proportion_hips == "0") { ?> selected="selected"<?php } ?>>0</option>
                                                                        <option value="2" <?php if (@$SizeChart->proportion_hips == "2") { ?> selected="selected"<?php } ?>>2</option>
                                                                        <option value="4" <?php if (@$SizeChart->proportion_hips == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                                        <option value="6" <?php if (@$SizeChart->proportion_hips == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                                        <option value="8" <?php if (@$SizeChart->proportion_hips == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                                        <option value="10" <?php if (@$SizeChart->proportion_hips == "10") { ?> selected="selected"<?php } ?>>10</option>
                                                                        <option value="12" <?php if (@$SizeChart->proportion_hips == "12") { ?> selected="selected"<?php } ?>>12</option>
                                                                        <option value="14" <?php if (@$SizeChart->proportion_hips == "14") { ?> selected="selected"<?php } ?>>14</option>
                                                                        <option value="16" <?php if (@$SizeChart->proportion_hips == "16") { ?> selected="selected"<?php } ?>>16</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option value="14W" <?php if (@$SizeChart->proportion_hips == "14W") { ?> selected="selected"<?php } ?>>14W</option>
                                                                        <option value="16W" <?php if (@$SizeChart->proportion_hips == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                                        <option value="18W" <?php if (@$SizeChart->proportion_hips == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                                        <option value="20W" <?php if (@$SizeChart->proportion_hips == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                        <option value="22W" <?php if (@$SizeChart->proportion_hips == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                                        <option value="24W" <?php if (@$SizeChart->proportion_hips == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <script>
                                                    $(document).ready(function () {
                                                        $('.weP').click(function () {
                                                            var getValue = $(this).val();
                                                            if (getValue == 1) {
                                                                $('#dueDatePragent').show();
                                                                $('#fig_pregnant').show();
                                                                $('#maternity_we').show();
                                                                $('#Loose_we').show();
                                                            } else {
                                                                $('#maternity_we').hide();
                                                                $('#Loose_we').hide();
                                                                $('#dueDatePragent').hide();
                                                                $('#fig_pregnant').hide();
                                                            }
                                                        });

                                                    });

        <?php
        if (@$Womeninfo->pregnant == 1) {
            ?>
                                                        $(document).ready(function () {
                                                            $('#dueDatePragent').show();
                                                            $('#fig_pregnant').show();
                                                            $('#maternity_we').show();
                                                            $('#Loose_we').show();
                                                        });
        <?php } ?>

                                                </script>
                                                <div class="row">                                
                                                    <div class="col-sm-6 col-lg-6 col-md-6" >
                                                        <h3>Are you a pregnant?</h3>
                                                        <div class="switch-field">
                                                            <input id="Yes" class="weP" name="pregnant" value="1" type="radio" <?php if (@$Womeninfo->pregnant == 1) { ?> checked <?php } ?>>
                                                            <label for="Yes">Yes</label>
                                                            <input id="No" class="weP" name="pregnant" value="0" type="radio" <?php if (@$Womeninfo->pregnant == 0) { ?> checked <?php } ?>>
                                                            <label for="No">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data" id="dueDatePragent">
                                                <div class="row">                                
                                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                                        <h3>What is your due date? </h3>
                                                        <div class="date-box">
                                                            <input id="datepickerWeMen" type="text" placeholder="mm/dd/yyyy" name="duedate" value="<?php
                                                            if (@$SizeChart->expected_due_date != '') {
                                                                echo date_format($SizeChart->expected_due_date, 'm/d/Y');
                                                            }
                                                            ?>" autocomplete="off" maxlength="10" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data form-box-data2" id="maternity_we">
                                                <div class="row">                                
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>your maternity fit ?</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <div class="select-boxes">
                                                            <div class="select-box select-box2">
                                                                <select name="is_prefer_maternity" id="is_prefer_maternity">
                                                                    <option value="">--</option>
                                                                    <option value="7" <?php if (@$SizeChart->is_prefer_maternity == "7") { ?> selected="selected"<?php } ?> >7</option>
                                                                    <option value="8" <?php if (@$SizeChart->is_prefer_maternity == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                                    <option value="9" <?php if (@$SizeChart->is_prefer_maternity == "9") { ?> selected="selected"<?php } ?>>9</option>
                                                                    <option value="10" <?php if (@$SizeChart->is_prefer_maternity == "10") { ?> selected="selected"<?php } ?>>10</option></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data form-box-data2" id="Loose_we">
                                                <div class="row">                                
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>Loose  Fitted mix of both</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <div class="select-boxes">
                                                            <div class="select-box select-box2">
                                                                <select name="loose_fitted" id="loose_fitted">
                                                                    <option value="" <?php if (@$SizeChart->loose_fitted == "") { ?> selected="selected"<?php } ?>>--</option>
                                                                    <option <?php if (@$SizeChart->loose_fitted == "7") { ?> selected="selected"<?php } ?> value="7">7</option>
                                                                    <option <?php if (@$SizeChart->loose_fitted == "8") { ?> selected="selected"<?php } ?>  value="8">8</option>
                                                                    <option <?php if (@$SizeChart->loose_fitted == "9") { ?> selected="selected"<?php } ?> value="9">9</option>
                                                                    <option <?php if (@$SizeChart->loose_fitted == "10") { ?> selected="selected"<?php } ?> value="10">10</option></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data" id="fig_pregnant">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box type-box-preference">
                                                        <h3>Please select the maternity pants style you prefer to wear  ?</h3>
                                                        <ul>
                                                            <li>
                                                                <input class="radio-box" id="radio2x" name="is_pregnant" value="2" type="radio" <?php if (@$SizeChart->is_pregnant == 2) { ?> checked  <?php } ?> >
                                                                <label for="radio2x">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/leady-belly4.png" alt="">
                                                                </label>
                                                                <span>Regular pants with an under-the-belly type</span>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="radio3x" type="radio" name="is_pregnant" value="3" <?php if (@$SizeChart->is_pregnant == 3) { ?> checked  <?php } ?>>
                                                                <label for="radio3x">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/leady-belly3.png" alt="">
                                                                </label>
                                                                <span>All-around stretch to give light support</span>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" name="is_pregnant" value="1" id="radio1x" type="radio" <?php if (@$SizeChart->is_pregnant == 1) { ?> checked  <?php } ?>>
                                                                <label for="radio1x">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/leady-belly2.png" alt="">
                                                                </label>
                                                                <span>Elastic side panels </span>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="radio4x" type="radio" name="is_pregnant" value="4" <?php if (@$SizeChart->is_pregnant == 4) { ?> checked  <?php } ?>>
                                                                <label for="radio4x">
                                                                    <img src="<?php echo HTTP_ROOT ?>images/leady-belly1.png" alt="">
                                                                </label>
                                                                <span>Fits over bump for maximum support</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data social-filed">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>You social media profiles will help your personal Stylist to know you better.</h3>
                                                        <div class=" select-box">
                                                            <h4>LINKEDIN PROFILE</h4>
                                                            <small>Ex: linkedin.com/in/username. </small>
                                                            <input placeholder="" name="linkdin_profile" id="linkdin_profile" value="<?= @$WemenStyle->linkdin_profile; ?>" type="text" class="form-control">
                                                        </div>
                                                        <div class=" select-box">
                                                            <h4>INSTAGRAM HANDLE</h4>
                                                            <small>Ex: drapefit </small>
                                                            <input placeholder="" name="instagram" id="instagram" value="<?= @$WemenStyle->instagram; ?>" type="text" class="form-control">
                                                        </div>
                                                        <div class=" select-box">
                                                            <h4>TWITTER HANDLE</h4>
                                                            <small>Ex: drapefit </small>
                                                            <input placeholder="" name="twitter" id="twitter" value="<?= @$WemenStyle->twitter; ?>" type="text" class="form-control">
                                                        </div>
                                                        <div class=" select-box">
                                                            <h4>PINTEREST HANDLE</h4>
                                                            <small>Ex: drapefit </small>
                                                            <input placeholder="" name="pinterest" id="pinterest" value="<?= @$WemenStyle->pinterest; ?>" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit" name="wemen_stas" value="wemen_stas">Next : Style Fit <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>

                                        </div>
                                        <?= $this->Form->end(); ?>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'fit') { ?> active in <?php } ?>" id="Section2">
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleWeMenSection2')) ?>
                                        <div class="left-bar fixed" id="sidebar2">
                                            <div class="under-box">
                                                <h2>Hi <?php echo @$profileName; ?></h2>
                                                <p>Please complete your style information that will help us to get completed a best FIT </p>
                                                <div class="profile-image">
                                                    <span><img src="<?php echo HTTP_ROOT ?>assets/women-img/Women-style-fit.jpg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <h2 class="inspiri">Style Inspiration</h2>
                                            <p style="letter-spacing: 1px; text-align: center;">Are you looking to incorporate more of the styles below into your wardrobe? Select the styles below that you inspire to look like or would like to explore.</p>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box bohemian">

                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Bohemian</h4>                                                           
                                                                <input class="radio-box" id="mens25" name="style_sphere_selections_v2[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> checked <?php } ?>>
                                                                <label for="mens25">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Bohemian.jpg" alt="">
                                                                </label>

                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Casual</h4>                                                         
                                                                <input class="radio-box" id="mens26" name="style_sphere_selections_v2[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> checked <?php } ?>>
                                                                <label for="mens26">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Casual.jpg" alt="">
                                                                </label>

                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Classic</h4>                                                           
                                                                <input class="radio-box" id="mens27" name="style_sphere_selections_v2[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> checked <?php } ?>>
                                                                <label for="mens27">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Classic.jpg" alt="">
                                                                </label>

                                                            </li>


                                                            <li> 
                                                                <h4 style="margin-top: 0;">Edgy</h4>                                                           
                                                                <input class="radio-box" id="mens25a" name="style_sphere_selections_v2[]" value="4" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> checked <?php } ?>>
                                                                <label for="mens25a">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Edgy.jpg" alt="">
                                                                </label>

                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Trendy</h4>                                                           
                                                                <input class="radio-box" id="mens27c" name="style_sphere_selections_v2[]" value="5" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> checked <?php } ?>>
                                                                <label for="mens27c">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Trendy.jpg" alt="">
                                                                </label>

                                                            </li>  
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box error-issues">
                                                        <h3>How do you like your clothing to fit?</h3>
                                                        <h4 style="font-size: 19px; color: #949494;">Dress length</h4>
                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Mini</h4>                                                           
                                                                <input class="radio-box" id="mens25v1" name="wo_dress_length[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->wo_dress_length) && in_array('1', explode(',', $style_sphere_selections->wo_dress_length))) { ?> checked <?php } ?>>
                                                                <label for="mens25v1">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/mini.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Short</h4>                                                         
                                                                <input class="radio-box" id="mens26v1" name="wo_dress_length[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->wo_dress_length) && in_array('2', explode(',', $style_sphere_selections->wo_dress_length))) { ?> checked <?php } ?>>
                                                                <label for="mens26v1">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/short.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Midi</h4>                                                           
                                                                <input class="radio-box" id="mens27v1" name="wo_dress_length[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->wo_dress_length) && in_array('3', explode(',', $style_sphere_selections->wo_dress_length))) { ?> checked <?php } ?>>
                                                                <label for="mens27v1">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/midi.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Maxi</h4>                                                           
                                                                <input class="radio-box" id="mens28v1" name="wo_dress_length[]" value="4" type="checkbox" <?php if (isset($style_sphere_selections->wo_dress_length) && in_array('4', explode(',', $style_sphere_selections->wo_dress_length))) { ?> checked <?php } ?>>
                                                                <label for="mens28v1">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/maxi.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                        </ul>
                                                        <h4 style=" font-size: 19px; color: #949494; margin-top: 39px; width: 100%; float: left;;">Top half</h4>
                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Fitted</h4>                                                           
                                                                <input class="radio-box" id="mens25v2" name="wo_top_half[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->wo_top_half) && in_array('1', explode(',', $style_sphere_selections->wo_top_half))) { ?> checked <?php } ?>>
                                                                <label for="mens25v2">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/fitted.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Straight</h4>                                                         
                                                                <input class="radio-box" id="mens26v2" name="wo_top_half[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->wo_top_half) && in_array('2', explode(',', $style_sphere_selections->wo_top_half))) { ?> checked <?php } ?>>
                                                                <label for="mens26v2">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/straight2.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Loose</h4>
                                                                <input class="radio-box" id="mens27v2" name="wo_top_half[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->wo_top_half) && in_array('3', explode(',', $style_sphere_selections->wo_top_half))) { ?> checked <?php } ?>>
                                                                <label for="mens27v2">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/loose.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                        </ul>
                                                        <h4 style=" font-size: 19px; color: #949494; margin-top: 39px; width: 100%; float: left;;">Pant Lenght</h4>
                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Ankle</h4>                                                           
                                                                <input class="radio-box" id="mens25v3" name="wo_pant_length[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_length) && in_array('1', explode(',', $style_sphere_selections->wo_pant_length))) { ?> checked <?php } ?>>
                                                                <label for="mens25v3">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/ankle.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Regular</h4>                                                         
                                                                <input class="radio-box" id="mens26v3" name="wo_pant_length[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_length) && in_array('2', explode(',', $style_sphere_selections->wo_pant_length))) { ?> checked <?php } ?>>
                                                                <label for="mens26v3">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/regular.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Long</h4>                                                           
                                                                <input class="radio-box" id="mens27v3" name="wo_pant_length[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_length) && in_array('3', explode(',', $style_sphere_selections->wo_pant_length))) { ?> checked <?php } ?>>
                                                                <label for="mens27v3">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/long.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                        </ul>
                                                        <h4 style=" font-size: 19px; color: #949494; margin-top: 39px; width: 100%; float: left;;">Pant Rise</h4>
                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Low Rise</h4>                                                           
                                                                <input class="radio-box" id="mens25v4" name="wo_pant_rise[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_rise) && in_array('1', explode(',', $style_sphere_selections->wo_pant_rise))) { ?> checked <?php } ?>>
                                                                <label for="mens25v4">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/low-rise.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Mid Rise</h4>                                                         
                                                                <input class="radio-box" id="mens26v4" name="wo_pant_rise[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_rise) && in_array('2', explode(',', $style_sphere_selections->wo_pant_rise))) { ?> checked <?php } ?>>
                                                                <label for="mens26v4">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/mid-rise.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">High Rise</h4>                                                           
                                                                <input class="radio-box" id="wmens27v4" name="wo_pant_rise[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_rise) && in_array('3', explode(',', $style_sphere_selections->wo_pant_rise))) { ?> checked <?php } ?>>
                                                                <label for="wmens27v4">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/high-rise.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                        </ul>
                                                        <h4 style=" font-size: 19px; color: #949494; margin-top: 39px; width: 100%; float: left;;">Pant Style</h4>
                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Skinny</h4>                                                           
                                                                <input class="radio-box" id="wmens25v5" name="wo_pant_style[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_style) && in_array('1', explode(',', $style_sphere_selections->wo_pant_style))) { ?> checked <?php } ?>>
                                                                <label for="wmens25v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/skinny.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Straight</h4>                                                         
                                                                <input class="radio-box" id="wmens26v5" name="wo_pant_style[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_style) && in_array('2', explode(',', $style_sphere_selections->wo_pant_style))) { ?> checked <?php } ?>>
                                                                <label for="wmens26v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/straight.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Bootcut</h4>                                                           
                                                                <input class="radio-box" id="wmens27v5" name="wo_pant_style[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_style) && in_array('3', explode(',', $style_sphere_selections->wo_pant_style))) { ?> checked <?php } ?>>
                                                                <label for="wmens27v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/bootcut.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Relaxed</h4>                                                         
                                                                <input class="radio-box" id="wmens28v5" name="wo_pant_style[]" value="4" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_style) && in_array('4', explode(',', $style_sphere_selections->wo_pant_style))) { ?> checked <?php } ?>>
                                                                <label for="wmens28v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/relaxed.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Wide Leg</h4>                                                         
                                                                <input class="radio-box" id="wmens29v5" name="wo_pant_style[]" value="5" type="checkbox" <?php if (isset($style_sphere_selections->wo_pant_style) && in_array('5', explode(',', $style_sphere_selections->wo_pant_style))) { ?> checked <?php } ?>>
                                                                <label for="wmens29v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/wide-leg.jpg" alt="">
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box error-issues appare-box">
                                                        <h3>Which types of appare i would you like to receive ?</h3>

                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Dresses / jumpsuits</h4>                                                           
                                                                <input class="radio-box" id="wmens30v5" name="wo_appare[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->wo_appare) && in_array('1', explode(',', $style_sphere_selections->wo_appare))) { ?> checked <?php } ?>>
                                                                <label for="wmens30v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/dress-jumpsuit.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Tops</h4>                                                         
                                                                <input class="radio-box" id="wmens31v5" name="wo_appare[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->wo_appare) && in_array('2', explode(',', $style_sphere_selections->wo_appare))) { ?> checked <?php } ?>>
                                                                <label for="wmens31v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-tops.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Bottoms</h4>                                                           
                                                                <input class="radio-box" id="wmens32v5" name="wo_appare[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->wo_appare) && in_array('3', explode(',', $style_sphere_selections->wo_appare))) { ?> checked <?php } ?>>
                                                                <label for="wmens32v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/bottoms.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Denim</h4>                                                           
                                                                <input class="radio-box" id="wmens33v5" name="wo_appare[]" value="4" type="checkbox" <?php if (isset($style_sphere_selections->wo_appare) && in_array('4', explode(',', $style_sphere_selections->wo_appare))) { ?> checked <?php } ?>>
                                                                <label for="wmens33v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/denim.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Sweaters</h4>                                                           
                                                                <input class="radio-box" id="wmens34v5" name="wo_appare[]" value="5" type="checkbox" <?php if (isset($style_sphere_selections->wo_appare) && in_array('5', explode(',', $style_sphere_selections->wo_appare))) { ?> checked <?php } ?>>
                                                                <label for="wmens34v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/sweater.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Jackets</h4>                                                           
                                                                <input class="radio-box" id="mens30v5" name="wo_appare[]" value="6" type="checkbox" <?php if (isset($style_sphere_selections->wo_appare) && in_array('6', explode(',', $style_sphere_selections->wo_appare))) { ?> checked <?php } ?>>
                                                                <label for="mens30v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/Jacket.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Accessories</h4>                                                           
                                                                <input class="radio-box" id="mens30v67" name="wo_appare[]" value="7" type="checkbox" <?php if (isset($style_sphere_selections->wo_appare) && in_array('7', explode(',', $style_sphere_selections->wo_appare))) { ?> checked <?php } ?>>
                                                                <label for="mens30v67">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/acc.jpg" alt="">
                                                                </label>
                                                            </li>   
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box error-issues">
                                                        <h3>Which types of bottoms would you like to receive?</h3>

                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Skirts</h4>                                                           
                                                                <input class="radio-box" id="mens125v5" name="wo_bottom_style[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->wo_bottom_style) && in_array('1', explode(',', $style_sphere_selections->wo_bottom_style))) { ?> checked <?php } ?>>
                                                                <label for="mens125v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/skirt.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Striped Shorts</h4>                                                         
                                                                <input class="radio-box" id="mens126v5" name="wo_bottom_style[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->wo_bottom_style) && in_array('2', explode(',', $style_sphere_selections->wo_bottom_style))) { ?> checked <?php } ?>>
                                                                <label for="mens126v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/striped-short.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Capri Jeans</h4>                                                           
                                                                <input class="radio-box" id="mens127v5" name="wo_bottom_style[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->wo_bottom_style) && in_array('3', explode(',', $style_sphere_selections->wo_bottom_style))) { ?> checked <?php } ?>>
                                                                <label for="mens127v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/capri-Jeans.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Cargo Pant</h4>                                                           
                                                                <input class="radio-box" id="mens127v6" name="wo_bottom_style[]" value="4" type="checkbox" <?php if (isset($style_sphere_selections->wo_bottom_style) && in_array('4', explode(',', $style_sphere_selections->wo_bottom_style))) { ?> checked <?php } ?>>
                                                                <label for="mens127v6">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/cargo-pant.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Checked Pant</h4>                                                           
                                                                <input class="radio-box" id="mens127v7" name="wo_bottom_style[]" value="5" type="checkbox" <?php if (isset($style_sphere_selections->wo_bottom_style) && in_array('5', explode(',', $style_sphere_selections->wo_bottom_style))) { ?> checked <?php } ?>>
                                                                <label for="mens127v7">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/checked-pant.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Palazzo</h4>                                                           
                                                                <input class="radio-box" id="mens127v8" name="wo_bottom_style[]" value="6" type="checkbox" <?php if (isset($style_sphere_selections->wo_bottom_style) && in_array('6', explode(',', $style_sphere_selections->wo_bottom_style))) { ?> checked <?php } ?>>
                                                                <label for="mens127v8">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/palazzo.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Denim Shorts</h4>                                                           
                                                                <input class="radio-box" id="mens127v9" name="wo_bottom_style[]" value="7" type="checkbox" <?php if (isset($style_sphere_selections->wo_bottom_style) && in_array('7', explode(',', $style_sphere_selections->wo_bottom_style))) { ?> checked <?php } ?>>
                                                                <label for="mens127v9">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/denim-shorts.jpg" alt="">
                                                                </label>
                                                            </li> 

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box error-issues">
                                                        <h3>Which types of tops would you like to receive?</h3>

                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Sleevelss</h4>                                                           
                                                                <input class="radio-box" id="mens225v5" name="wo_top_style[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->wo_top_style) && in_array('1', explode(',', $style_sphere_selections->wo_top_style))) { ?> checked <?php } ?>>
                                                                <label for="mens225v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/sleeveless.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Shorts Sleeve</h4>                                                         
                                                                <input class="radio-box" id="mens226v5" name="wo_top_style[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->wo_top_style) && in_array('2', explode(',', $style_sphere_selections->wo_top_style))) { ?> checked <?php } ?>>
                                                                <label for="mens226v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/short-sleeves.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Long Sleeve</h4>                                                           
                                                                <input class="radio-box" id="mens227v5" name="wo_top_style[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->wo_top_style) && in_array('3', explode(',', $style_sphere_selections->wo_top_style))) { ?> checked <?php } ?>>
                                                                <label for="mens227v5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/long-sleeves.jpg" alt="">
                                                                </label>
                                                            </li> 


                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-box-data form-box-data-women prefer-women" style=" padding-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box">
                                                        <h3>Please tell us the OutFit you prefer to wear.</h3>                                                                              <script>
                                                            $(document).ready(function () {

                                                                $('.radio-box').click(function () {
                                                                    var val = $(this).val();
                                                                    var radioid = $(this).attr('data-id');

                                                                    if ($(this).is(':checked')) {
                                                                        $('#' + radioid + '1').prop('checked', true);

                                                                    } else {
                                                                        $('#' + radioid + '1').prop('checked', false);
                                                                        $('#' + radioid + '2').prop('checked', false);
                                                                        $('#' + radioid + '3').prop('checked', false);
                                                                        $('#' + radioid + '4').prop('checked', false);
                                                                        //$('#mens25a-1').prop('checked', false);

                                                                    }

                                                                });

                                                                $('.radio-class').click(function () {
                                                                    var divId = $(this).attr('data-div');

                                                                    $('#' + divId).prop('checked', true);

                                                                    //alert("hi");
                                                                    // $('.error').hide();
                                                                    $('label[for="style_sphere_selections_v3_3[]"]').remove();
                                                                    alert(response);

                                                                });





                                                            });
                                                        </script>
                                                        <script type="text/javascript">
                                                            $(document).on('click', '.bad', function () {
                                                                $(".one-al").click();

                                                            });
                                                            $(document).on('click', '.bad2', function () {
                                                                $(".one-al2").click();
                                                            });
                                                            $(document).on('click', '.bad3', function () {
                                                                $(".one-al3").click();
                                                            });
                                                            $(document).on('click', '.bad4', function () {
                                                                $(".one-al4").click();
                                                            });
                                                            $(document).on('click', '.bad5', function () {
                                                                $(".one-al5").click();
                                                            });
                                                            $(document).on('click', '.bad6', function () {
                                                                $(".one-al6").click();
                                                            });
                                                            $(document).on('click', '.bad7', function () {
                                                                $(".one-al7").click();
                                                            });
                                                            $(document).on('click', '.bad8', function () {
                                                                $(".one-al8").click();
                                                            });
                                                        </script>
                                                        <ul>
                                                            <li> 


                                                                <input class="radio-box" data-id="tellus" id="mens25a-1" name="style_sphere_selections_v3_3[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v3_3) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v3_3))) { ?> checked <?php } ?>>

                                                                <label for="mens25a-1" class="bad">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit1.jpg" alt="">
                                                                </label>
                                                                <div class="women-wear-radio">
                                                                    <span><label for="tellus1" class="input-control radio one-al">
                                                                            <input class="radio-class" data-div="mens25a-1" type="radio" id="tellus1" name="style_sphere_selections_v3" value="2" <?php if (@$style_sphere_selections->style_sphere_selections_v3 == 2) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Always dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellus2" class="input-control radio">
                                                                            <input data-div="mens25a-1" class="radio-class" type="radio" id="tellus2" name="style_sphere_selections_v3" value="3" <?php if (@$style_sphere_selections->style_sphere_selections_v3 == 3) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Sometimes dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellus3" class="input-control radio">
                                                                            <input data-div="mens25a-1"class="radio-class" type="radio" id="tellus3" name="style_sphere_selections_v3" value="4" <?php if (@$style_sphere_selections->style_sphere_selections_v3 == 4) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Occasionally dress this way    
                                                                        </label></span>
                                                                    <span><label for="tellus4" class="input-control radio">
                                                                            <input data-div="mens25a-1" class="radio-class" type="radio" id="tellus4" name="style_sphere_selections_v3" value="5" <?php if (@$style_sphere_selections->style_sphere_selections_v3 == 5) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Never this way     
                                                                        </label></span>
                                                                </div>
                                                            </li>
                                                            <li>                                                         
                                                                <input data-id="tellusb" class="radio-box" id="mens25b-1" name="style_sphere_selections_v3_3[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v3_3) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v3_3))) { ?> checked <?php } ?>>
                                                                <label for="mens25b-1" class="bad2">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit2.jpg" alt="">
                                                                </label>
                                                                <div class="women-wear-radio">
                                                                    <span><label for="tellusb1" class="input-control radio one-al2">
                                                                            <input data-div="mens25b-1" class="radio-class"  type="radio" id="tellusb1" name="style_sphere_selections_v4" value="2" <?php if (@$style_sphere_selections->style_sphere_selections_v4 == 2) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Always dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusb2" class="input-control radio">
                                                                            <input data-div="mens25b-1" class="radio-class" type="radio" id="tellusb2" name="style_sphere_selections_v4" value="3" <?php if (@$style_sphere_selections->style_sphere_selections_v4 == 3) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Sometimes dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusb3" class="input-control radio">
                                                                            <input data-div="mens25b-1" class="radio-class" type="radio" id="tellusb3" name="style_sphere_selections_v4" value="4" <?php if (@$style_sphere_selections->style_sphere_selections_v4 == 4) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Occasionally dress this way    
                                                                        </label></span>
                                                                    <span><label for="tellusb4" class="input-control radio">
                                                                            <input data-div="mens25b-1" class="radio-class" type="radio" id="tellusb4" name="style_sphere_selections_v4" value="5" <?php if (@$style_sphere_selections->style_sphere_selections_v4 == 5) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Never this way     
                                                                        </label></span>
                                                                </div>
                                                            </li> 
                                                            <li>                                                            
                                                                <input class="radio-box" data-id="tellusc" id="mens25c-1" name="style_sphere_selections_v3_3[]" value="3" type="checkbox"  <?php if (isset($style_sphere_selections->style_sphere_selections_v3_3) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v3_3))) { ?> checked <?php } ?>>
                                                                <label for="mens25c-1" class="bad3">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit3.jpg" alt="">
                                                                </label>
                                                                <div class="women-wear-radio">
                                                                    <span><label for="tellusc1" class="input-control radio one-al3">
                                                                            <input data-div="mens25c-1" class="radio-class" class="radio-class" data-div="mens25c-1" type="radio" id="tellusc1" name="style_sphere_selections_v5" value="2" <?php if (@$style_sphere_selections->style_sphere_selections_v5 == 2) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Always dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusc2" class="input-control radio">
                                                                            <input  data-div="mens25c-1" class="radio-class" type="radio" id="tellusc2" name="style_sphere_selections_v5" value="3" <?php if (@$style_sphere_selections->style_sphere_selections_v5 == 3) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Sometimes dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusc3" class="input-control radio">
                                                                            <input data-div="mens25c-1" class="radio-class" type="radio" id="tellusc3" name="style_sphere_selections_v5" value="4" <?php if (@$style_sphere_selections->style_sphere_selections_v5 == 4) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Occasionally dress this way    
                                                                        </label></span>
                                                                    <span><label for="tellusc4" class="input-control radio">
                                                                            <input data-div="mens25c-1" class="radio-class" type="radio" id="tellusc4" name="style_sphere_selections_v5" value="5" <?php if (@$style_sphere_selections->style_sphere_selections_v5 == 5) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Never this way     
                                                                        </label></span>
                                                                </div>
                                                            </li>  
                                                            <li>                                                         
                                                                <input class="radio-box" data-id="tellusd" id="mens25d-1" name="style_sphere_selections_v3_3[]" value="4" type="checkbox"  <?php if (isset($style_sphere_selections->style_sphere_selections_v3_3) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v3_3))) { ?> checked <?php } ?>>
                                                                <label for="mens25d-1" class="bad4">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit4.jpg" alt="">
                                                                </label>
                                                                <div class="women-wear-radio">
                                                                    <span><label for="tellusd1" class="input-control radio one-al4">
                                                                            <input data-div="mens25d-1" class="radio-class" type="radio" id="tellusd1" name="style_sphere_selections_v6" value="2" <?php if (@$style_sphere_selections->style_sphere_selections_v6 == 2) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Always dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusd2" class="input-control radio">
                                                                            <input data-div="mens25d-1" class="radio-class" type="radio" id="tellusd2" name="style_sphere_selections_v6" value="3" <?php if (@$style_sphere_selections->style_sphere_selections_v6 == 3) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Sometimes dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusd3" class="input-control radio">
                                                                            <input data-div="mens25d-1" class="radio-class" type="radio" id="tellusd3" name="style_sphere_selections_v6" value="4" <?php if (@$style_sphere_selections->style_sphere_selections_v6 == 4) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Occasionally dress this way    
                                                                        </label></span>
                                                                    <span><label for="tellusd4" class="input-control radio">
                                                                            <input data-div="mens25d-1" class="radio-class" type="radio" id="tellusd4" name="style_sphere_selections_v6" value="6" <?php if (@$style_sphere_selections->style_sphere_selections_v6 == 6) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Never this way     
                                                                        </label></span>
                                                                </div>
                                                            </li>
                                                            <li>                          
                                                                <input class="radio-box" data-id="telluse" id="mens25a-2" name="style_sphere_selections_v3_3[]" value="5" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v3_3) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v3_3))) { ?> checked <?php } ?> >
                                                                <label for="mens25a-2" class="bad5">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit5.jpg" alt="">
                                                                </label>
                                                                <div class="women-wear-radio">
                                                                    <span><label for="telluse1" class="input-control radio one-al5">
                                                                            <input data-div="mens25a-2" class="radio-class" type="radio" id="telluse1" name="style_sphere_selections_v7" value="2" <?php if (@$style_sphere_selections->style_sphere_selections_v7 == 2) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Always dress this way     
                                                                        </label></span>
                                                                    <span><label for="telluse2" class="input-control radio">
                                                                            <input data-div="mens25a-2" class="radio-class" type="radio" id="telluse2" name="style_sphere_selections_v7" value="3" <?php if (@$style_sphere_selections->style_sphere_selections_v7 == 3) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Sometimes dress this way     
                                                                        </label></span>
                                                                    <span><label for="telluse3" class="input-control radio">
                                                                            <input data-div="mens25a-2" class="radio-class" type="radio" id="telluse3" name="style_sphere_selections_v7" value="4" <?php if (@$style_sphere_selections->style_sphere_selections_v7 == 4) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Occasionally dress this way    
                                                                        </label></span>
                                                                    <span><label for="telluse4" class="input-control radio">
                                                                            <input data-div="mens25a-2" class="radio-class" type="radio" id="telluse4" name="style_sphere_selections_v7" value="5" <?php if (@$style_sphere_selections->style_sphere_selections_v7 == 5) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Never this way     
                                                                        </label></span>
                                                                </div>
                                                            </li>  
                                                            <li>                                                         
                                                                <input class="radio-box" data-id="tellusf" id="mens25b-2" name="style_sphere_selections_v3_3[]" value="6" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v3_3) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v3_3))) { ?> checked <?php } ?>>
                                                                <label for="mens25b-2" class="bad8">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit6.jpg" alt="">
                                                                </label>
                                                                <div class="women-wear-radio">
                                                                    <span><label for="tellusf1" class="input-control radio one-al8">
                                                                            <input data-div="mens25b-2" class="radio-class" type="radio" id="tellusf1" name="style_sphere_selections_v8" value="2" <?php if (@$style_sphere_selections->style_sphere_selections_v8 == 2) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Always dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusf2" class="input-control radio">
                                                                            <input data-div="mens25b-2" class="radio-class" type="radio" id="tellusf2" name="style_sphere_selections_v8" value="3" <?php if (@$style_sphere_selections->style_sphere_selections_v8 == 3) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Sometimes dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusf3" class="input-control radio">
                                                                            <input data-div="mens25b-2" class="radio-class"type="radio" id="tellusf3" name="style_sphere_selections_v8" value="4" <?php if (@$style_sphere_selections->style_sphere_selections_v8 == 4) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Occasionally dress this way    
                                                                        </label></span>
                                                                    <span><label for="tellusf4" class="input-control radio">
                                                                            <input  data-div="mens25b-2" class="radio-class" type="radio" id="tellusf4" name="style_sphere_selections_v8" value="5" <?php if (@$style_sphere_selections->style_sphere_selections_v8 == 5) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Never this way     
                                                                        </label></span>
                                                                </div>
                                                            </li> 
                                                            <li>                                                            
                                                                <input class="radio-box" data-id="tellusg" id="mens25c-2" name="style_sphere_selections_v3_3[]" value="7" type="checkbox"  <?php if (isset($style_sphere_selections->style_sphere_selections_v3_3) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v3_3))) { ?> checked <?php } ?>>
                                                                <label for="mens25c-2" class="bad6">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit7.jpg" alt="">
                                                                </label>
                                                                <div class="women-wear-radio">
                                                                    <span><label for="tellusg1" class="input-control radio one-al6">
                                                                            <input data-div="mens25c-2" class="radio-class" type="radio" id="tellusg1" name="style_sphere_selections_v9" value="2" <?php if (@$style_sphere_selections->style_sphere_selections_v9 == 2) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Always dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusg2" class="input-control radio">
                                                                            <input data-div="mens25c-2" class="radio-class" type="radio" id="tellusg2" name="style_sphere_selections_v9" value="3" <?php if (@$style_sphere_selections->style_sphere_selections_v9 == 3) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Sometimes dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellusg3" class="input-control radio">
                                                                            <input data-div="mens25c-2" class="radio-class" type="radio" id="tellusg3" name="style_sphere_selections_v9" value="4" <?php if (@$style_sphere_selections->style_sphere_selections_v9 == 4) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Occasionally dress this way    
                                                                        </label></span>
                                                                    <span><label for="tellusg4" class="input-control radio">
                                                                            <input data-div="mens25c-2" class="radio-class" type="radio" id="tellusg4" name="style_sphere_selections_v9" value="5" <?php if (@$style_sphere_selections->style_sphere_selections_v9 == 5) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Never this way     
                                                                        </label></span>
                                                                </div>
                                                            </li>  
                                                            <li>                                                         
                                                                <input class="radio-box" data-id="tellush" id="mens25d-2" name="style_sphere_selections_v3_3[]" value="8" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v3_3) && in_array('8', explode(',', $style_sphere_selections->style_sphere_selections_v3_3))) { ?> checked <?php } ?>>
                                                                <label for="mens25d-2" class="bad7">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit8.jpg" alt="">
                                                                </label>
                                                                <div class="women-wear-radio">
                                                                    <span><label for="tellush1" class="input-control radio one-al7">
                                                                            <input data-div="mens25d-2" class="radio-class" type="radio" id="tellush1" name="style_sphere_selections_v11" value="7" <?php if (@$style_sphere_selections->style_sphere_selections_v11 == 7) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Always dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellush2" class="input-control radio">
                                                                            <input data-div="mens25d-2" class="radio-class" type="radio" id="tellush2" name="style_sphere_selections_v11" value="8" <?php if (@$style_sphere_selections->style_sphere_selections_v11 == 8) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Sometimes dress this way     
                                                                        </label></span>
                                                                    <span><label for="tellush3" class="input-control radio">
                                                                            <input data-div="mens25d-2" class="radio-class" type="radio" id="tellush3" name="style_sphere_selections_v11" value="9" <?php if (@$style_sphere_selections->style_sphere_selections_v11 == 9) { ?> checked <?php } ?>>
                                                                            <span class="input-control__indicator"></span>Occasionally dress this way    
                                                                        </label></span>
                                                                    <span><label for="tellush4" class="input-control radio">
                                                                            <input data-div="mens25d-2" class="radio-class" type="radio" id="tellush4" name="style_sphere_selections_v11" value="10" <?php if (@$style_sphere_selections->style_sphere_selections_v11 == 10) { ?> checked <?php } ?> >
                                                                            <span class="input-control__indicator"></span>Never this way     
                                                                        </label></span>
                                                                </div>
                                                            </li>     
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box error-issues">
                                                        <h3>What patterns should you avoid?</h3>

                                                        <ul>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Lace</h4>                                                           
                                                                <input class="radio-box" id="mens25v" name="style_sphere_selections_v10[]" value="1" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v10) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v10))) { ?> checked <?php } ?>>
                                                                <label for="mens25v">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/lace.jpg" alt="">
                                                                </label>
                                                            </li>  
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Animal Print</h4>                                                         
                                                                <input class="radio-box" id="mens26v" name="style_sphere_selections_v10[]" value="2" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v10) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v10))) { ?> checked <?php } ?>>
                                                                <label for="mens26v">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/animal-print.jpg" alt="">
                                                                </label>
                                                            </li>
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Tribal</h4>                                                           
                                                                <input class="radio-box" id="mens27v" name="style_sphere_selections_v10[]" value="3" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v10) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v10))) { ?> checked <?php } ?>>
                                                                <label for="mens27v">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/tribal.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Polka Dot</h4>                                                           
                                                                <input class="radio-box" id="mens28v" name="style_sphere_selections_v10[]" value="4" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v10) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v10))) { ?> checked <?php } ?>>
                                                                <label for="mens28v">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/polkadot.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Stripes</h4>                                                           
                                                                <input class="radio-box" id="mens29v" name="style_sphere_selections_v10[]" value="5" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v10) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v10))) { ?> checked <?php } ?>>
                                                                <label for="mens29v">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/stripes.jpg" alt="">
                                                                </label>
                                                            </li> 
                                                            <li> 
                                                                <h4 style="margin-top: 0;">Floral</h4>                                                           
                                                                <input class="radio-box" id="mens30v" name="style_sphere_selections_v10[]" value="6" type="checkbox" <?php if (isset($style_sphere_selections->style_sphere_selections_v10) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v10))) { ?> checked <?php } ?>>
                                                                <label for="mens30v">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/floral.jpg" alt="">
                                                                </label>
                                                            </li>    
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 Color-prefer">
                                                        <h3>Tell Us Which Color you prefer?</h3>
                                                        <ul>
                                                            <li>
                                                                <h4>Black</h4>
                                                                <input class="radio-box" id="radio3a" name="color_prefer[]" type="checkbox" value="1"  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('1', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3a"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Grey</h4>
                                                                <input class="radio-box" id="radio3b" name="color_prefer[]"  value='2' type="checkbox"  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('2', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3b"></label>
                                                            </li>
                                                            <li>
                                                                <h4>White</h4>
                                                                <input class="radio-box" id="radio3c" name="color_prefer[]" type="checkbox" value = '3'  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('3', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3c"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Cream</h4>
                                                                <input class="radio-box" id="radio3d" name="color_prefer[]" type="checkbox" value='4'  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('4', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3d"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Brown</h4>
                                                                <input class="radio-box" id="radio3e" name="color_prefer[]" type="checkbox" value='5'  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('5', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3e"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Purple</h4>
                                                                <input class="radio-box" id="radio3f" name="color_prefer[]" type="checkbox" value='6'  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('6', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3f"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Green</h4>
                                                                <input class="radio-box" id="radio3g" name="color_prefer[]" type="checkbox" value="7"  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('7', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3g"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Blue</h4>
                                                                <input class="radio-box" id="radio3h" name="color_prefer[]" type="checkbox" value="8"  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('8', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3h"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Orange</h4>
                                                                <input class="radio-box" id="radio3i" name="color_prefer[]" type="checkbox" value="9"  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('9', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3i"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Yellow</h4>
                                                                <input class="radio-box" id="radio3j" name="color_prefer[]" type="checkbox" value="10"  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('10', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3j"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Red</h4>
                                                                <input class="radio-box" id="radio3k" name="color_prefer[]" type="checkbox" value="11"  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('11', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3k"></label>
                                                            </li>
                                                            <li>
                                                                <h4>Pink</h4>
                                                                <input class="radio-box" id="radio3l" name="color_prefer[]" type="checkbox" value="12"  <?php if ((strlen(@$style_sphere_selections->color_prefer) > 2 ) && (in_array('12', json_decode(@$style_sphere_selections->color_prefer, true)))) { ?> checked="checked" <?php } ?>>
                                                                <label for="radio3l"></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data checkboxes mostly-wear">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>Which colors do you tend to mostly wear?</h3> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <div class="select-boxes">
                                                            <h4>NEUTRALS</h4>  
                                                            <ul>
                                                                <li>
                                                                    <input id="js1" name="color_mostly_wear[]" type="checkbox" value="Black" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Black', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="js1">Black</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js2" name="color_mostly_wear[]" type="checkbox" value="Grey" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Grey', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="js2">Grey</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js3" name="color_mostly_wear[]" type="checkbox" value="Navy" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Navy', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="js3">Navy</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js4" name="color_mostly_wear[]" type="checkbox" value="Beige" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Beige', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="js4">Beige</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js5" name="color_mostly_wear[]" type="checkbox" value="nWhite" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('nWhite', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="js5">White</label>
                                                                </li>
                                                            </ul>
                                                            <h4 style="margin-top: 0;">COLOR</h4>
                                                            <ul>

                                                                <li>
                                                                    <input id="jr1" name="color_mostly_wear[]" type="checkbox" value="Red" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Red', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="jr1">Red</label>
                                                                </li>
                                                                <li>
                                                                    <input id="jr2" name="color_mostly_wear[]" type="checkbox" value="Blue" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Blue', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="jr2">Blue</label>
                                                                </li>
                                                                <li>
                                                                    <input id="jr3" name="color_mostly_wear[]" type="checkbox" value="Yellow" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Yellow', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="jr3">Yellow</label>
                                                                </li>
                                                                <li>
                                                                    <input id="jr4" name="color_mostly_wear[]" type="checkbox" value="Purple" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Purple', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="jr4">Purple</label>
                                                                </li>

                                                            </ul>
                                                            <h4 style="margin-top: 0;">LIGHTS</h4>
                                                            <ul>

                                                                <li>
                                                                    <input id="jl1" name="color_mostly_wear[]" type="checkbox" value="White" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('White', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="jl1">White</label>
                                                                </li>
                                                                <li>
                                                                    <input id="jl2" name="color_mostly_wear[]" type="checkbox" value="Sand" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Sand', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?>>
                                                                    <label for="jl2">Sand</label>
                                                                </li>
                                                                <li>
                                                                    <input id="jl3" name="color_mostly_wear[]" type="checkbox" value="Pastels" <?php if (isset($style_sphere_selections->color_mostly_wear) && in_array('Pastels', explode(',', $style_sphere_selections->color_mostly_wear))) { ?> checked <?php } ?> >
                                                                    <label for="jl3">Pastels</label>
                                                                </li>


                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 note-label">
                                                        <h3>What do you feel is missing from your FIT?</h3>
                                                        <ul>
                                                            <li>
                                                                <input class="radio-box" id="check-box3afit" name="missing_from_your_fIT[]" type="checkbox" value="Sweaters" <?php if (isset($style_sphere_selections->missing_from_your_fIT) && in_array('Sweaters', explode(',', $style_sphere_selections->missing_from_your_fIT))) { ?> checked <?php } ?>>
                                                                <label for="check-box3afit">Sweaters</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3bfit" name="missing_from_your_fIT[]" type="checkbox" value="Blouses" <?php if (isset($style_sphere_selections->missing_from_your_fIT) && in_array('Blouses', explode(',', $style_sphere_selections->missing_from_your_fIT))) { ?> checked <?php } ?>>
                                                                <label for="check-box3bfit">Blouses</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3cfit" name="missing_from_your_fIT[]" type="checkbox" value="Jeans" <?php if (isset($style_sphere_selections->missing_from_your_fIT) && in_array('Jeans', explode(',', $style_sphere_selections->missing_from_your_fIT))) { ?> checked <?php } ?>>
                                                                <label for="check-box3cfit">Jeans</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3dfit" name="missing_from_your_fIT[]" type="checkbox" value="Pants" <?php if (isset($style_sphere_selections->missing_from_your_fIT) && in_array('Pants', explode(',', $style_sphere_selections->missing_from_your_fIT))) { ?> checked <?php } ?>>
                                                                <label for="check-box3dfit">Pants</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3efit" name="missing_from_your_fIT[]" type="checkbox" value="Skirts" <?php if (isset($style_sphere_selections->missing_from_your_fIT) && in_array('Skirts', explode(',', $style_sphere_selections->missing_from_your_fIT))) { ?> checked <?php } ?>>
                                                                <label for="check-box3efit">Skirts</label>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="check-box3ffit" name="missing_from_your_fIT[]" type="checkbox" value="Dresses" <?php if (isset($style_sphere_selections->missing_from_your_fIT) && in_array('Dresses', explode(',', $style_sphere_selections->missing_from_your_fIT))) { ?> checked <?php } ?>>
                                                                <label for="check-box3ffit">Dresses</label>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 denim-styles">
                                                        <h3> Would you wear any of these denim styles? </h3>
                                                        <div class="select-boxes">
                                                            <ul>
                                                                <li>

                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim1.jpg" alt="" width="223" height="216">
                                                                    <div class="switch-field">
                                                                        <input id="denim1" name="distressed_denim_non" value="Yes" type="radio"  <?php if (@$Womenstyle->distressed_denim_non == 'Yes') { ?> checked <?php } ?>>
                                                                        <label for="denim1">Yes</label>
                                                                        <input id="denim2" name="distressed_denim_non" value="Maybe" type="radio"  <?php if (@$Womenstyle->distressed_denim_non == 'Maybe') { ?> checked <?php } else if (@$Womenstyle->distressed_denim_non == '') { ?> checked <?php } ?>>
                                                                        <label for="denim2">Maybe</label>
                                                                        <input id="denim3" name="distressed_denim_non" value="never" type="radio"  <?php if (@$Womenstyle->distressed_denim_non == 'never') { ?> checked <?php } ?>>
                                                                        <label for="denim3">Never</label>
                                                                    </div>
                                                                </li>
                                                                <li>

                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim2.jpg" alt="" width="223" height="216">
                                                                    <div class="switch-field">
                                                                        <input id="denim4" name="distressed_denim_minimally" value="Yes"  type="radio" <?php if (@$Womenstyle->distressed_denim_minimally == 'Yes') { ?> checked <?php } ?>>
                                                                        <label for="denim4">Yes</label>
                                                                        <input id="denim5" name="distressed_denim_minimally" value="Maybe" type="radio" <?php if (@$Womenstyle->distressed_denim_minimally == 'Maybe') { ?> checked <?php } else if (@$Womenstyle->distressed_denim_minimally == '') { ?> checked <?php } ?> >
                                                                        <label for="denim5">Maybe</label>
                                                                        <input id="denim6" name="distressed_denim_minimally" value="never" type="radio" <?php if (@$Womenstyle->distressed_denim_minimally == 'never') { ?> checked <?php } ?>>
                                                                        <label for="denim6">Never</label>
                                                                    </div>
                                                                </li>
                                                                <li>

                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim3.jpg" alt="" width="223" height="216">
                                                                    <div class="switch-field">
                                                                        <input id="denim7" name="distressed_denim_fairly" value="Yes" type="radio" <?php if (@$Womenstyle->distressed_denim_fairly == 'Yes') { ?> checked <?php } ?>>
                                                                        <label for="denim7">Yes</label>
                                                                        <input id="denim71" name="distressed_denim_fairly" value="Maybe" type="radio" <?php if (@$Womenstyle->distressed_denim_fairly == 'Maybe') { ?> checked <?php } else if (@$Womenstyle->distressed_denim_fairly == '') { ?> checked <?php } ?>>
                                                                        <label for="denim71">Maybe</label>
                                                                        <input id="denim72" name="distressed_denim_fairly" value="never" type="radio" <?php if (@$Womenstyle->distressed_denim_fairly == 'never') { ?> checked <?php } ?>>
                                                                        <label for="denim72">Never</label>
                                                                    </div>
                                                                </li>
                                                                <li>

                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim4.jpg" alt="" width="223" height="216">
                                                                    <div class="switch-field">
                                                                        <input id="denim8" name="distressed_denim_heavily" value="Yes"  type="radio" <?php if (@$Womenstyle->distressed_denim_heavily == 'Yes') { ?> checked <?php } ?>>
                                                                        <label for="denim8">Yes</label>
                                                                        <input id="denim9" name="distressed_denim_heavily" value="Maybe" type="radio" <?php if (@$Womenstyle->distressed_denim_heavily == 'Maybe') { ?> checked <?php } else if (@$Womenstyle->distressed_denim_heavily == '') { ?> checked <?php } ?>>
                                                                        <label for="denim9">Maybe</label>
                                                                        <input id="denim10" name="distressed_denim_heavily" value="never" type="radio" <?php if (@$Womenstyle->distressed_denim_heavily == 'never') { ?> checked <?php } ?>>
                                                                        <label for="denim10">Never</label>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>How often do you dress for the following occasions?</h3>
                                                        <div class="occupation">
                                                            <ul>
                                                                <li><label for="radioa6r" class="input-control radio">
                                                                        <input type="radio" id="radioa6r" name="following_occasions" value="1" <?= @$style_sphere_selections->following_occasions == 1 ? "checked" : ""; ?>>
                                                                        <span class="input-control__indicator"></span>Business Casual / Work  
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob1r" class="input-control radio">
                                                                        <input type="radio" id="radiob1r" name="following_occasions" value="2" <?php if (@$style_sphere_selections->following_occasions == 2) { ?> checked <?php } ?>>
                                                                        <span class="input-control__indicator"></span>Cocktail / Wedding / Special
                                                                    </label></li>
                                                                <li><label for="radioc2r" class="input-control radio">
                                                                        <input type="radio" id="radioc2r" name="following_occasions" value="3" <?php if (@$style_sphere_selections->following_occasions == 3) { ?> checked <?php } ?>>
                                                                        <span class="input-control__indicator"></span>Most of the time
                                                                    </label></li>
                                                                <li><label for="radioa3r" class="input-control radio">
                                                                        <input type="radio" id="radioa3r" name="following_occasions" value="4" <?php if (@$style_sphere_selections->following_occasions == 4) { ?> checked <?php } ?>>
                                                                        <span class="input-control__indicator"></span>Around once or twice a week
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob4r" class="input-control radio">
                                                                        <input type="radio" id="radiob4r" name="following_occasions" value="5" <?php if (@$style_sphere_selections->following_occasions == 5) { ?> checked <?php } ?>>
                                                                        <span class="input-control__indicator"></span>Around once or twice a month
                                                                    </label></li> 
                                                                <li><label for="radioa7r" class="input-control radio">
                                                                        <input type="radio" id="radioa7r" name="following_occasions" value="7" <?php if (@$style_sphere_selections->following_occasions == 7) { ?> checked <?php } ?>>
                                                                        <span class="input-control__indicator"></span>Date Night / Night Out
                                                                    </label>
                                                                </li>
                                                                <li><label for="radiob8r" class="input-control radio">
                                                                        <input type="radio" id="radiob8r" name="following_occasions" value="8" <?php if (@$style_sphere_selections->following_occasions == 8) { ?> checked <?php } ?>>
                                                                        <span class="input-control__indicator"></span>Laid Back Casual
                                                                    </label></li>
                                                                <li><label for="radioc5r" class="input-control radio">
                                                                        <input type="radio" id="radioc5r" name="following_occasions" value="6" <?php if (@$style_sphere_selections->following_occasions == 6) { ?> checked <?php } ?>>
                                                                        <span class="input-control__indicator"></span>Rarely
                                                                    </label></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data checkboxes">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3>What do you feel is missing from your closet?</h3> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <div class="select-boxes"> 
                                                            <ul>
                                                                <li>
                                                                    <input id="js1d" name="jeans_style[]" type="checkbox" value="Sweaters" <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Sweaters', explode(',', @$WomenJeansStyle->jeans_style))) { ?> checked <?php } ?>>
                                                                    <label for="js1d">Sweaters</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js2d" name="jeans_style[]" type="checkbox" value="Blouses" <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Blouses', explode(',', @$WomenJeansStyle->jeans_style))) { ?> checked <?php } ?>>
                                                                    <label for="js2d">Blouses</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js3d" name="jeans_style[]" type="checkbox" value="Jeans" <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Jeans', explode(',', @$WomenJeansStyle->jeans_style))) { ?> checked <?php } ?>>
                                                                    <label for="js3d">Jeans</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js4d" name="jeans_style[]" type="checkbox" value="Pants" <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Pants', explode(',', @$WomenJeansStyle->jeans_style))) { ?> checked <?php } ?>>
                                                                    <label for="js4d">Pants</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js5d" name="jeans_style[]" type="checkbox" value="Skirts" <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Skirts', explode(',', @$WomenJeansStyle->jeans_style))) { ?> checked <?php } ?>>
                                                                    <label for="js5d">Skirts</label>
                                                                </li>
                                                                <li>
                                                                    <input id="js5d2" name="jeans_style[]" type="checkbox" value="Dresses" <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Dresses', explode(',', @$WomenJeansStyle->jeans_style))) { ?> checked <?php } ?>>
                                                                    <label for="js5d2">Dresses</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit" name="wemen_fit" value="wemen_fit">Next : Price Range <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?= $this->Form->end(); ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade  <?php if ($sections == 'styles') { ?> active in <?php } ?>" id="Section3">
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleWeMenSection3')) ?>
                                        <div class="left-bar fixed" id="sidebar3">
                                            <div class="under-box">
                                                <h2>Hi <?php echo $profileName; ?></h2>
                                                <p>Please complete your price range you are looking for that will help us have a best FIT under your budget</p>
                                                <div class="profile-image">
                                                    <span><img src="<?php echo HTTP_ROOT ?>assets/women-img/Women-price-range.jpg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3 style="margin-top: 0;" >Help Us to Know your Budget</h3> 
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">TOPS</font></b></nav>                                                
                                                        <ul>
                                                            <li><label for="spendiness_button_up_shirts_mens" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens" name="tops" value="1" <?php if (@$Womenstyle->tops == 1) { ?> checked="" <?php } ?> >
                                                                    <span class="input-control__indicator"></span>Under $50

                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_button_up_shirts_mens2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens2" name="tops" value="2" <?php if (@$Womenstyle->tops == 2) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$50 - $75
                                                                </label></li>
                                                            <li><label for="spendiness_button_up_shirts_mens3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens3" name="tops" value="3" <?php if (@$Womenstyle->tops == 3) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $100
                                                                </label></li>
                                                            <li><label for="spendiness_button_up_shirts_mens4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens4" name="tops" value="4" <?php if (@$Womenstyle->tops == 4) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$100 - $125
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_button_up_shirts_mens5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_button_up_shirts_mens5" name="tops" value="5" <?php if (@$Womenstyle->tops == 5) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$125+
                                                                </label></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">BOTTOMS</font></b></nav>                                                
                                                        <ul>
                                                            <li><label for="spendiness_tees_polos" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos" name="bottoms" value="1"  <?php if (@$Womenstyle->bottoms == 1) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>Under $30
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_tees_polos2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos2" name="bottoms" value="2" <?php if (@$Womenstyle->bottoms == 2) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$30 - $50
                                                                </label></li>
                                                            <li><label for="spendiness_tees_polos3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos3" name="bottoms" value="3" <?php if (@$Womenstyle->bottoms == 3) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$50 - $70
                                                                </label></li>
                                                            <li><label for="spendiness_tees_polos4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos4" name="bottoms" value="4" <?php if (@$Womenstyle->bottoms == 4) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$70 - $90
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_tees_polos5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_tees_polos5" name="bottoms" value="5" <?php if (@$Womenstyle->bottoms == 5) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span> $90+
                                                                </label></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">OUTERWEAR</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_sweaters_sweatshirts1" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts1" name="outwear" value="1"  <?php if (@$Womenstyle->outwear == 1) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>Under $50
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_sweaters_sweatshirts2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts2" name="outwear" value="2" <?php if (@$Womenstyle->outwear == 2) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$50 - $75
                                                                </label></li>
                                                            <li><label for="spendiness_sweaters_sweatshirts3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts3" name="outwear" value="3" <?php if (@$Womenstyle->outwear == 3) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $100
                                                                </label></li>
                                                            <li><label for="spendiness_sweaters_sweatshirts4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts4" name="outwear" value="4" <?php if (@$Womenstyle->outwear == 4) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$100 - $125
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_sweaters_sweatshirts5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_sweaters_sweatshirts5" name="outwear" value="5" <?php if (@$Womenstyle->outwear == 5) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$125+
                                                                </label></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">JEANS</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_pants_denim" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim" name="jeans" value="1" <?php if (@$Womenstyle->jeans == 1) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>Under $75
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_pants_denim2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim2" name="jeans" value="2" <?php if (@$Womenstyle->jeans == 2) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $100
                                                                </label></li>
                                                            <li><label for="spendiness_pants_denim3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim3" name="jeans" value="3"<?php if (@$Womenstyle->jeans == 3) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$100 - $125
                                                                </label></li>
                                                            <li><label for="spendiness_pants_denim4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim4" name="jeans" value="4" <?php if (@$Womenstyle->jeans == 4) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$125 - $175
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_pants_denim5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_pants_denim5" name="jeans" value="5" <?php if (@$Womenstyle->jeans == 5) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$175+
                                                                </label></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">JEWELRY</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_shorts" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts" name="jewelry" value="1" <?php if (@$Womenstyle->jewelry == 1) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>Under $40
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_shorts2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts2" name="jewelry" value="2" <?php if (@$Womenstyle->jewelry == 2) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$40 - $60
                                                                </label></li>
                                                            <li><label for="spendiness_shorts32" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts32" name="jewelry" value="3" <?php if (@$Womenstyle->jewelry == 3) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$60 - $80
                                                                </label></li>
                                                            <li><label for="spendiness_shorts42" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts42" name="jewelry" value="4" <?php if (@$Womenstyle->jewelry == 4) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$80 - $100
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_shorts52" class="input-control radio">
                                                                    <input type="radio" id="spendiness_shorts52" name="jewelry" value="5" <?php if (@$Womenstyle->jewelry == 5) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$100+
                                                                </label></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">ACCESSORIES</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_blazers_outerwear1" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear1" name="accessproes" value="1" <?php if (@$Womenstyle->accessproes == 1) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>Under $75

                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_blazers_outerwear2" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear2" name="accessproes" value="2" <?php if (@$Womenstyle->accessproes == 2) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $125
                                                                </label></li>
                                                            <li><label for="spendiness_blazers_outerwear3" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear3" name="accessproes" value="3" <?php if (@$Womenstyle->accessproes == 3) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$125 - $175
                                                                </label></li>
                                                            <li><label for="spendiness_blazers_outerwear4" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear4" name="accessproes" value="4" <?php if (@$Womenstyle->accessproes == 4) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$175 - $250
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_blazers_outerwear5" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear5" name="accessproes" value="5" <?php if (@$Womenstyle->accessproes == 5) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$175 - $250
                                                                </label></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                        <nav><b><font size="4">DRESS</font></b></nav>
                                                        <ul>
                                                            <li><label for="spendiness_blazers_outerwear11" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear11" name="dress" value="1" <?php if (@$Womenstyle->dress == 1) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>Under $75

                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_blazers_outerwear12" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear12" name="dress" value="2" <?php if (@$Womenstyle->dress == 2) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$75 - $125
                                                                </label></li>
                                                            <li>
                                                                <label for="spendiness_blazers_outerwear13" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear13" name="dress" value="3" <?php if (@$Womenstyle->dress == 3) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$125 - $175
                                                                </label></li>
                                                            <li><label for="spendiness_blazers_outerwear14" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear14" name="dress" value="4" <?php if (@$Womenstyle->dress == 4) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$175 - $250
                                                                </label>
                                                            </li>
                                                            <li><label for="spendiness_blazers_outerwear17" class="input-control radio">
                                                                    <input type="radio" id="spendiness_blazers_outerwear17" name="dress" value="5" <?php if (@$Womenstyle->dress == 5) { ?> checked="" <?php } ?>>
                                                                    <span class="input-control__indicator"></span>$175 - $250
                                                                </label></li>
                                                        </ul>
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit" name="wemen_price" value="wemen_price">Next : Custom Design & Brands <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?= $this->Form->end(); ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'custom') { ?> active in <?php } ?>" id="Section4">
                                        <?= $this->Form->create('img', array('id' => "imgfrm", 'type' => 'file')); ?>
                                        <input type="file"  name='file' id="imgupload1" style="display:none"/> 
                                        <?= $this->Form->end() ?>
                                        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'styleWeMenSection4')) ?>
                                        <div class="left-bar fixed" id="sidebar4">
                                            <div class="under-box">
                                                <h2>Hi <?php echo $profileName; ?></h2>
                                                <p>We are working with hundreds of brands and will help you FIT you under your budget.</p>
                                                <div class="profile-image">
                                                    <span><img src="<?php echo HTTP_ROOT ?>assets/women-img/Women-brand.jpg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-bar">
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12 custome">
                                                        <h3 style="margin-top: 0;">Please do double click to upload any images / design you want your stylist to work for you  ?</h3>
                                                        <div class="catlog-product-img">
                                                            <ul>
                                                                <li>
                                                                    <div class="upload-img">
                                                                        <?php if (@$wemenDesigne->img_1 == '') { ?>
                                                                            <img id='img1' src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum1.jpg" alt="">
                                                                        <?php } else { ?>
                                                                            <img  id='img1' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_1; ?>" alt="">
                                                                        <?php } ?>
                                                                        <span  data-id='1' class='img'><i class="fa fa-camera"></i></span>
                                                                    </div>
                                                                    <h4>First Design</h4>
                                                                </li>
                                                                <li>
                                                                    <div class="upload-img">
                                                                        <?php if (@$wemenDesigne->img_2 == '') { ?>
                                                                            <img  id='img2' src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum2.jpg" alt="">
                                                                        <?php } else { ?>
                                                                            <img  id='img2' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_2; ?>" alt="">
                                                                        <?php } ?>
                                                                        <span data-id='2' class='img'><i class="fa fa-camera"></i></span>
                                                                    </div>
                                                                    <h4>Second Design</h4>
                                                                </li>
                                                                <li>
                                                                    <div class="upload-img">
                                                                        <?php if (@$wemenDesigne->img_3 == '') { ?>
                                                                            <img   id='img3' src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum3.jpg" alt="">
                                                                        <?php } else { ?>
                                                                            <img  id='img3' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_3; ?>" alt="">
                                                                        <?php } ?>
                                                                        <span  data-id='3' class='img'><i class="fa fa-camera"></i></span>
                                                                    </div>
                                                                    <h4>Third Design</h4>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <div class="type-box">
                                                            <h3> Brand or store you prefer to shop ?</h3>
                                                            <ul>
                                                                <li>
                                                                    <input class="radio-box" name="mens_brands[]" value="penguin" id="mens_brands1" type="checkbox" <?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands1">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/penguin.png" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands2" name="mens_brands[]" value="nike" type="checkbox" <?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?> checked <?php } ?> >
                                                                    <label for="mens_brands2">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/nike.png" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands3" name="mens_brands[]" value="scotch" type="checkbox" <?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands3">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/scotch.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands4" name="mens_brands[]" value="gap" type="checkbox" <?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands4">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/gap.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands5" name="mens_brands[]" value="pata" type="checkbox" <?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands5">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/pata.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands6" name="mens_brands[]" value="tommy" type="checkbox" <?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands6">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/tommy.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands7" name="mens_brands[]" value="boss" type="checkbox" <?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands7">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/boss.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands8" name="mens_brands[]" value="vineyard" type="checkbox" <?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands8">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vineyard.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands9" name="mens_brands[]" value="vans" type="checkbox" <?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands9">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vans.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands10" name="mens_brands[]" value="hurley" type="checkbox" <?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands10">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/hurley.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>
                                                                    <input class="radio-box" id="mens_brands11" name="mens_brands[]" value="brooks" type="checkbox" <?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands11">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/brooks.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands12" name="mens_brands[]" value="zara" type="checkbox" <?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands12">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/zara.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands13" name="mens_brands[]" value="levis" type="checkbox" <?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands13">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/levis.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands14" name="mens_brands[]" value="armour" type="checkbox" <?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands14">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/armour.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands15" name="mens_brands[]" value="bonobos" type="checkbox" <?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands15">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/bonobos.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands16" name="mens_brands[]" value="landsend" type="checkbox" <?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands16">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/landsend.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands17" name="mens_brands[]" value="jcrew" type="checkbox" <?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands17">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/jcrew.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands18" name="mens_brands[]" value="oldnavy" type="checkbox" <?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands18">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/oldnavy.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands19" name="mens_brands[]" value="uniqlo" type="checkbox" <?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands19">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/uniqlo.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands20" name="mens_brands[]" value="northface" type="checkbox" <?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands20">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/northface.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands21" name="mens_brands[]" value="hm" type="checkbox" <?php if (isset($menbrand) && in_array('hm', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands21">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/h&amp;m.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands22" name="mens_brands[]" value="eagle" type="checkbox" <?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands22">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/eagle.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands23" name="mens_brands[]" value="ragnbone" type="checkbox" <?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands23">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/ragnbone.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands24" name="mens_brands[]" value="bensharma" type="checkbox" <?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands24">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/images/men/bensharma.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands25" name="mens_brands[]" value="express" type="checkbox" <?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands25">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/express.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands26" name="mens_brands[]" value="polo" type="checkbox" <?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands26">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/polo.png" alt="">
                                                                    </label>
                                                                </li>  
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27b" name="mens_brands[]" value="dillards" type="checkbox" <?php if (isset($menbrand) && in_array('dillards', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27b">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-a.jpg" alt="">
                                                                    </label>
                                                                </li>
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27c" name="mens_brands[]" value="mecy" type="checkbox" <?php if (isset($menbrand) && in_array('mecy', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27c">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-b.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27d" name="mens_brands[]" value="naimai" type="checkbox" <?php if (isset($menbrand) && in_array('naimai', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27d">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-c.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27e" name="mens_brands[]" value="urban" type="checkbox" <?php if (isset($menbrand) && in_array('urban', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27e">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-d.jpg" alt="">
                                                                    </label>
                                                                </li> 
                                                                <li>                                                            
                                                                    <input class="radio-box" id="mens_brands27f" name="mens_brands[]" value="nordstrom" type="checkbox" <?php if (isset($menbrand) && in_array('nordstrom', @$menbrand)) { ?> checked <?php } ?>>
                                                                    <label for="mens_brands27f">
                                                                        <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-e.jpg" alt="">
                                                                    </label>
                                                                </li>   
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-box-data">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                        <h3 style=" margin-top: 0;">Any comment you want to share ?</h3>
                                                        <textarea  name='profile_note' style="width: 100%; height: 100px;"><?php echo @$WemenStyle->profile_note; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                                    <button type="submit"name="wemen_custom" value="wemen_custom">Next : Manage Your Fit Settings <i class="fas fa-arrow-right"></i></button>
                                                    <a href="#">save and return »</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?= $this->Form->end() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?> 
    <div id="loaderPyament" style="display: none; position: fixed; height: 100%; width: 100%; z-index: 11111111; padding-top: 20%; background: rgba(255, 255, 255, 0.7); top: 0; text-align: center;">
        <img src="<?php echo HTTP_ROOT . 'img/' ?>widget_loader.gif"/>
    </div>
    <script>
        $(document).ready(function () {
            $('#s').delay(3000).fadeOut('slow');
            $('#e').delay(3000).fadeOut('slow');
        });
    </script>
    <script >
        $(function () {
            $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
        });
        $(".progress-bar").each(function () {
            each_bar_width = $(this).attr('aria-valuenow');
            $(this).width(each_bar_width + '%');
        });
        function getPushUrl(name) {
            var url = '<?php echo HTTP_ROOT ?>welcome/style/';
            var stateObj = {foo: "bar"};
            history.pushState(stateObj, 'xx', url + name);
        }
    </script>
    <script>
        $(document).ready(function () {
            $('.payment-btn1').prop('disabled', true);
            validation();
        });
        function validation() {
            var name = $("#full_name").val();
            var address = $("#address").val();
            var address_line_2 = $("#address_line_2").val();
            var city = $("#city").val();
            var zipcode = $("#zipcode").val();

            if (name == "") {
                $("#full_name").css("border", "#FF0000 1px solid");
                //   $(".errorn").html("Please Enter fullname");
            } else {
                $("#full_name").css("border", "#008000 1px solid");
                $(".errorn").html("");
            }
            if (address == "") {
                $("#address").css("border", "#FF0000 1px solid");
                // $(".errorad").html("Please Enter address");
            } else {
                $("#address").css("border", "#008000 1px solid");
                $(".errorad").html("");
            }
            if (address_line_2 == "") {
                $("#address_line_2").css("border", "#FF0000 1px solid");
                // $(".errorad").html("Please Enter address");
            } else {
                $("#address_line_2").css("border", "#008000 1px solid");
                $(".errorad").html("");
            }

            if (city == "") {
                $("#city").css("border", "#FF0000 1px solid");
                //  $(".errorc").html("Please Enter city name");
            } else {
                $("#city").css("border", "#008000 1px solid");
                $(".errorc").html("");

            }
            if (zipcode == "") {
                $("#zipcode").css("border", "#FF0000 1px solid");
                //   $(".errorm").html("Please Enter zipcode");
            } else {
                $("#zipcode").css("border", "#008000 1px solid");
                $(".errorm").html("");


            }

            if (name && address && city && zipcode) {

                //  $("#payment").attr("disabled", false);
                $('.payment-btn1').prop('disabled', false);

            } else {

                $('.payment-btn1').prop('disabled', true);
            }
        }
        //    $(document).ready(function () {
        //        $('.payment-btn1').prop('disabled', true);
        //        $('#full_name').keyup(function () {
        //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
        //        })
        //        $('#address_line_2').keyup(function () {
        //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
        //        })
        //        $('#address').keyup(function () {
        //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
        //        })
        //        $('#zipcode').keyup(function () {
        //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
        //        })
        //        $('#city').keyup(function () {
        //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
        //        })
        //    });
    </script>
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

        $("#styleWeMen").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                //$('#loaderPyament').show();
                var formData = $('#styleWeMen').serialize();
                $.post(url + 'users/ajax_wemen_fit', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },
            rules: {
                tell_in_feet: {
                    required: true,

                },

                weight_lbs: {
                    required: true,
                    digits: true,
                    min: 10


                },
                birthday: {
                    required: true,
                    birthwe: true

                },
                expected_due_date: {
                    validDate: true

                },
                shirt_blouse: {
                    required: true,

                },
                /*jeans: {
                 required: true,
                 
                 },*/
                dress: {
                    required: true,

                },

                wo_bottom: {
                    required: true,

                },
                pants: {
                    required: true,

                },
                shirt: {
                    required: true,

                },

                duedate: {
                    required: true,
                    weduedate: true

                },

            },
            messages: {
                tell_in_feet: {
                    required: "Please fill the height in feet",

                },

                weight_lbs: {
                    required: "Please provide your  weight",
                    digits: "Sharing your weight helps us get the right fit"
                },
                birthday: {
                    required: "Please provide your  birthday",
                },
                shirt_blouse: {
                    required: "Please provide shirt blouse",
                },
                shirt_blouse_recomend: {
                    required: "Please provide shirt blouse",
                },
                jeans: {
                    required: "Please provide jeans ",
                },
                dress: {
                    required: "Please provide dress",
                },
                dress_recomended: {
                    required: "Please provide dress",
                },
                duedate: {
                    required: "Please provide due date",
                },
                wo_bottom: {
                    required: "Please provide bottom",

                },
                pants: {
                    required: "Please provide pants",

                },
                shirt: {
                    required: "Please provide shirt",

                },

            },
        });

        $.validator.addMethod("validDate", function (value, element) {
            var year = value.split('/');
            var month = year[0];
            var day = year[1];
            var years = year[2];
            if (month > 12) {
                $.validator.messages.validDate = "Please put on valid Month (max 12)";
                // alert(month);
            } else if (month == 0) {
                $.validator.messages.validDate = "Please put on valid Month (max 12)";
                // alert(month);
            } else if (day == 0) {
                $.validator.messages.validDate = "Please put on valid Date (max 31)";
                return false;
            } else if (day > 31) {
                $.validator.messages.validDate = "Please put on valid Date (max 31)";
                return false;
            } else if (year[2].length < 4) {
                $.validator.messages.validDate = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (years == 0) {
                $.validator.messages.validDate = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (years < 1901) {
                $.validator.messages.validDate = "Please provide certain age";
                return false;
            } else if (value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/) && parseInt(year[2]) > 2005) {
                $.validator.messages.validDate = "Please provide certain age";
                return false;
            } else {
                return true;
            }

        }, $.validator.messages.validDate);

        $("input[name='expected_due_date']:first").keyup(function (e) {
            if (!e.ctrlKey && !e.metaKey && (e.keyCode == 32 || e.keyCode > 46))
                doFormat(e.target)
        });




        $.validator.addMethod("birth", function (value, element) {
            var year = value.split('/');
            var month = year[0];
            var day = year[1];
            var years = year[2];
            if (month > 12) {
                $.validator.messages.birth = "Please put on valid Month (max 12)";
                // alert(month);
            } else if (month == 0) {
                $.validator.messages.birth = "Please put on valid Month (max 12)";
                // alert(month);
            } else if (day == 0) {
                $.validator.messages.birth = "Please put on valid Date (max 31)";
                return false;
            } else if (day > 31) {
                $.validator.messages.birth = "Please put on valid Date (max 31)";
                return false;
            } else if (year[2].length < 4) {
                $.validator.messages.birth = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (years == 0) {
                $.validator.messages.birth = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (years < 1901) {
                $.validator.messages.birth = "Please provide certain age";
                return false;
            } else if (value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/) && parseInt(year[2]) > 2005) {
                $.validator.messages.birth = "Please provide certain age";
                return false;
            } else {
                return true;
            }

        }, $.validator.messages.birth);






        $.validator.addMethod("birthwe", function (value, element) {
            var year = value.split('/');
            var month = year[0];
            var day = year[1];
            var years = year[2];
            if (month > 12) {
                $.validator.messages.birthwe = "Please put on valid Month (max 12)";
                // alert(month);
            } else if (month == 0) {
                $.validator.messages.birthwe = "Please put on valid Month (max 12)";
                // alert(month);
            } else if (day == 0) {
                $.validator.messages.birthwe = "Please put on valid Date (max 31)";
                return false;
            } else if (day > 31) {
                $.validator.messages.birthwe = "Please put on valid Date (max 31)";
                return false;
            } else if (years == 0) {
                $.validator.messages.birthwe = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (years < 1901) {
                $.validator.messages.birthwe = "Please provide certain age";
                return false;
            } else if (year[2].length < 4) {
                $.validator.messages.birthwe = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/) && parseInt(year[2]) > 2008) {
                $.validator.messages.birthwe = "Please provide certain age";
                return false;
            } else {
                return true;
            }
        }, $.validator.messages.birthwe);

        $.validator.addMethod("weduedate", function (value, element) {
            var year = value.split('/');
            var validDate = '<?php echo date('m/d/Y', strtotime('+280 days')); ?>';
            var VaildYear = validDate.split('/');

            var currentYear = '<?php echo date('Y') ?>';
            var currentMonth = '<?php echo date('m') ?>';
            var currentDay = '<?php echo date('d') ?>';

            var month = year[0];
            var day = year[1];
            var years = year[2];

            if (month > 12) {
                $.validator.messages.weduedate = "Please put on valid Month (max 12)";
                // alert(month);
            } else if (month == 0) {
                $.validator.messages.weduedate = "Please put on valid Month (max 12)";
                // alert(month);
            } else if (day == 0) {
                $.validator.messages.weduedate = "Please put on valid Date (max 31)";
                return false;
            } else if (day > 31) {
                $.validator.messages.weduedate = "Please put on valid Date (max 31)";
                return false;
            } else if (years == 0) {
                $.validator.messages.weduedate = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (years < currentYear) {
                $.validator.messages.weduedate = "Please enter date within 40 weeks";
                return false;
            } else if (year[2].length < 4) {
                $.validator.messages.weduedate = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/) && parseInt(year[2]) > VaildYear[2]) {
                $.validator.messages.weduedate = "Please enter date within 40 weeks";
                return false;
            } else if (parseInt(year[2]) == currentYear) {
                if (parseInt(currentMonth) <= parseInt(month)) {
                    if (parseInt(currentMonth) <= parseInt(month)) {
                        if (currentMonth == parseInt(month)) {

                            if (currentDay >= day) {
                                $.validator.messages.weduedate = "Please enter date within 40 weeks";
                                return false;
                            } else {
                                return true;
                            }
                        } else {
                            return true;
                        }
                    }





                } else {
                    $.validator.messages.weduedate = "Please enter date within 40 weeks";
                    return false;
                }

            } else if (VaildYear[2] >= years) {
                //alert(VaildYear[0]);
                if (month <= VaildYear[0]) {
                    if (day >= VaildYear[1]) {
                        $.validator.messages.weduedate = "Please enter date within 40 weeks";
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    $.validator.messages.weduedate = "Please enter date within 40 weeks";
                    return false;
                }

            } else {
                return true;
            }
        }, $.validator.messages.weduedate);

        $("#styleWeMenSection2").validate({
            submitHandler: function () {

                var url = $('#pageurl').val();
                $('#loaderPyament').show();
                var formData = $('#styleWeMenSection2').serialize();
                $.post(url + 'users/ajaxWeMenStyle', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },
            rules: {
                'style_sphere_selections_v2[]': {
                    required: true,
                    //fieldsOptions:true
                    // minlength: 1


                },
                'style_sphere_selections_v3_3[]': {
                    required: true,
                    //fieldsOptions:true,
                    //minlength: 1


                },
                'style_sphere_selections_v4[]': {
                    required: true,

                },
                'style_sphere_selections_v10[]': {
                    required: true,

                },
                /*'wo_dress_length[]': {
                 required: true,
                 },
                 'wo_top_half[]': {
                 required: true,
                 },
                 'wo_pant_length[]': {
                 required: true,
                 },
                 'wo_pant_rise[]': {
                 required: true,
                 },
                 'wo_pant_style[]': {
                 required: true,
                 },
                 'wo_appare[]': {
                 required: true,
                 },
                 'wo_bottom_style[]': {
                 required: true,
                 },
                 'wo_top_style[]': {
                 required: true,
                 },*/
                'jeans_to_fit[]': {
                    required: true,

                },
                'your_pants_to_fit[]': {
                    required: true,

                },
                'prefer_your_shorts[]': {
                    required: true,

                },
                'style_sphere_selections_v5[]': {
                    required: true,

                },

            },
            messages: {
                'style_sphere_selections_v2[]': {
                    required: "Please select the style Inspiration",

                },
                'style_sphere_selections_v3_3[]': {
                    required: "Please tell us the OutFit you prefer to wear?",

                },
                'style_sphere_selections_v4[]': {
                    required: "Please fill your button-up shirts to fit",
                },
                'style_sphere_selections_v10[]': {
                    required: "Please chose patterns should you avoid",
                },
                'wo_dress_length[]': {
                    required: "Please choose dress length",
                },
                'wo_top_half[]': {
                    required: "Please choose top half",
                },
                'wo_pant_length[]': {
                    required: "Please choose pant length",
                },
                'wo_pant_rise[]': {
                    required: "Please choose pant rise",
                },
                'wo_pant_style[]': {
                    required: "Please choose pant style",
                },
                'wo_appare[]': {
                    required: "Please choose appare",
                },
                'wo_bottom_style[]': {
                    required: "Please choose bottom style",
                },
                'wo_top_style[]': {
                    required: "Please choose top style",
                },
                'jeans_to_fit[]': {
                    required: "Please provide your jeans to fit",
                },
                'your_pants_to_fit[]': {
                    required: "Please provide your  bottoms",
                },
                'prefer_your_shorts[]': {
                    required: "Please provide your long do you prefer your shorts",
                },
                'style_sphere_selections_v5[]': {
                    required: "Please tell us which of these outfits would you prefer to wear",
                }

            },
        });

        $.validator.addMethod("fieldsOptions", function () {

            alert("sds");

            var radios = document.getElementsByName("style_sphere_selections_v3");
            var formValid = false;

            var i = 0;
            while (!formValid && i < radios.length) {
                if (radios[i].checked)
                    formValid = true;
                i++;
            }

            //alert(formValid);
            return formValid;

        }, $.validator.messages.fieldsOptions);



        var format = "mm/dd/yyyy";
        var match = new RegExp(format
                .replace(/(\w+)\W(\w+)\W(\w+)/, "^\\s*($1)\\W*($2)?\\W*($3)?([0-9]*).*")
                .replace(/m|d|y/g, "\\d"));
        var replace = "$1/$2/$3$4"
                .replace(/\//g, format.match(/\W/));

        function doFormat(target) {
            target.value = target.value
                    .replace(/(^|\W)(?=\d\W)/g, "$10")   // padding
                    .replace(match, replace)             // fields
                    .replace(/(\W)+/g, "$1");            // remove repeats
        }

        $("input[name='birthday']:first").keyup(function (e) {
            if (!e.ctrlKey && !e.metaKey && (e.keyCode == 32 || e.keyCode > 46))
                doFormat(e.target)
        });
        $("input[name='kids_birthdate']:first").keyup(function (e) {
            if (!e.ctrlKey && !e.metaKey && (e.keyCode == 32 || e.keyCode > 46))
                doFormat(e.target)
        });
        $("input[name='duedate']:first").keyup(function (e) {
            if (!e.ctrlKey && !e.metaKey && (e.keyCode == 32 || e.keyCode > 46))
                doFormat(e.target)
        });





        $("#styleWeMenSection3").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                //$('#loaderPyament').show();
                var formData = $('#styleWeMenSection3').serialize();
                $.post(url + 'users/ajaxWeMenPrice', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },

        });
        $("#styleWeMenSection4").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                //$('#loaderPyament').show();
                var formData = $('#styleWeMenSection4').serialize();
                $.post(url + 'users/ajaxWeMenCustom', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },

        });



        $("#styleMen").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                $('#loaderPyament').show();
                var formData = $('#styleMen').serialize();
                $.post(url + 'users/ajax_men_fit', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },
            rules: {
                tall_feet: {
                    required: true,

                },
                weight_lb: {
                    required: true,
                    digits: true,
                    min: 10

                },
                birthday: {
                    required: true,
                    birth: true

                },
                waist: {
                    required: true,

                },

                size: {
                    required: true,

                },

                inseam: {
                    required: true,

                },
            },
            messages: {
                tall_feet: {
                    required: "Please fill the height in feet",

                },
                tell_inch: {
                    required: "Please fill your  height in inch",
                },
                weight_lb: {
                    required: "Please provide your  weight",
                    digits: "Sharing your weight helps us get the right fit"
                },
                birthday: {
                    required: "Please provide your  birthday",
                },
                waist: {
                    required: "Please provide waist size",
                },
                waist_size_run: {
                    required: "Please provide waist run ",
                },

                size: {
                    required: "Please fill your shirt size",
                },
                inseam: {
                    required: "Please provide inseam size ",
                },
            },
        });





        $("#styleMenSection2").validate({
            submitHandler: function () {

                var url = $('#pageurl').val();
                $('#loaderPyament').show();
                var formData = $('#styleMenSection2').serialize();
                $.post(url + 'users/ajaxMenStyle', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },
            rules: {
                'style_sphere_selections_v3[]': {
                    required: true,
                    // minlength: 1


                },
                'style_sphere_selections_v4[]': {
                    required: true,

                },
                'jeans_to_fit[]': {
                    required: true,

                },
                'your_pants_to_fit[]': {
                    required: true,

                },
                'prefer_your_shorts[]': {
                    required: true,

                },
                'style_sphere_selections_v5[]': {
                    required: true,

                },

            },
            messages: {
                'style_sphere_selections_v3[]': {
                    required: "Please your casual shirts to fit?",

                },
                'style_sphere_selections_v4[]': {
                    required: "Please fill your button-up shirts to fit",
                },
                'jeans_to_fit[]': {
                    required: "Please provide your jeans to fit",
                },
                'your_pants_to_fit[]': {
                    required: "Please provide your  bottoms",
                },
                'prefer_your_shorts[]': {
                    required: "Please provide your long do you prefer your shorts",
                },
                'style_sphere_selections_v5[]': {
                    required: "Please tell us which of these outfits would you prefer to wear",
                }

            },
        });
        $("#styleMenSection3").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                //$('#loaderPyament').show();
                var formData = $('#styleMenSection3').serialize();
                $.post(url + 'users/ajaxMenPrice', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },

        });
        $("#styleMenSection4").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                //$('#loaderPyament').show();
                var formData = $('#styleMenSection4').serialize();
                $.post(url + 'users/ajaxMenCustom', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },

        });


        $('.img').click(function () {
            $('#imgupload1').trigger('click');
            var id = $(this).attr("data-id");
            $('#imgupload1').attr("data-id", id);

        });

        $("#imgupload1").on("change", function (e) {
            var idx = $(this).attr("data-id");
            var url = $('#pageurl').val();
            var formData = new FormData();
            formData.append('file', $('#imgupload1')[0].files[0]);
            formData.append('imgId', idx);


            $.ajax({
                url: url + 'users/ajaxMenImg',
                type: 'POST',
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function (data) {
                    $('#img' + idx).attr('src', data.img);
                },
                dataType: "JSON"

            });


        });

        $("#styleKid").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                $('#loaderPyament').show();
                var formData = $('#styleKid').serialize();
                $.post(url + 'users/ajax_kid_fit', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },
            rules: {
                kids_first_name: {
                    required: true,

                },
                tall_feet: {
                    required: true,

                },
                weight_lb: {
                    required: true,
                    digits: true,
                    min: 10

                },
                kids_birthdate: {
                    required: true,
                    birthkid: true

                },
                kids_clothing_gender: {
                    required: true,

                },
                kids_relationship_to_child: {
                    required: true,

                },

            },
            messages: {
                kids_first_name: {
                    required: "Please fill the kids name",

                },
                tall_feet: {
                    required: "Please fill the height in feet",

                },

                weight_lb: {
                    required: "Please provide   weight",
                    digits: "Sharing your weight helps us get the right fit"
                },
                kids_birthdate: {
                    required: "Please provide   birthday",
                },
                kids_clothing_gender: {
                    required: "Please provide kid gender",
                },
                kids_relationship_to_child: {
                    required: "Please provide relationship",
                },

            },
        });

        $("#kidstyleboy").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                $('#loaderPyament').show();
                var formData = $('#kidstyleboy').serialize();
                $.post(url + 'users/ajax_kid_fit_boy', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },
            rules: {
                kids_first_name: {
                    required: true,

                },
                tall_feet: {
                    required: true,

                },
                weight_lb: {
                    required: true,
                    digits: true,
                    min: 10

                },
                kids_birthdate: {
                    required: true,

                },
                your_kid_gender: {
                    required: true,

                },
                kids_relationship_to_child: {
                    required: true,

                },
                top_size: {
                    required: true,

                },
                bottom_size: {
                    required: true,

                },
                shoe_size: {
                    required: true,

                },

            },
            messages: {
                kids_first_name: {
                    required: "Please fill the kids name",

                },
                tall_feet: {
                    required: "Please fill the height in feet",

                },

                weight_lb: {
                    required: "Please provide   weight",
                    digits: "Sharing your weight helps us get the right fit"
                },
                kids_birthdate: {
                    required: "Please provide   birthday",
                },
                your_kid_gender: {
                    required: "Please provide kid gender",
                },
                kids_relationship_to_child: {
                    required: "Please provide relationship",
                },
                top_size: {
                    required: "Please provide top size",
                },
                bottom_size: {
                    required: "Please provide bottom  size",
                },
                shoe_size: {
                    required: "Please provide shoe size",
                },

            },
        });
        $("#kidstylegirls").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                $('#loaderPyament').show();
                var formData = $('#kidstylegirls').serialize();
                $.post(url + 'users/ajax_kid_fit_girl', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },
            rules: {
                kids_first_name: {
                    required: true,

                },
                tall_feet: {
                    required: true,

                },
                weight_lb: {
                    required: true,
                    digits: true

                },
                kids_birthdate: {
                    required: true,

                },
                your_kid_gender: {
                    required: true,

                },
                kids_relationship_to_child: {
                    required: true,

                },
                top_size: {
                    required: true,

                },
                bottom_size: {
                    required: true,

                },
                shoe_size: {
                    required: true,

                },

            },
            messages: {
                kids_first_name: {
                    required: "Please fill the kids name",

                },
                tall_feet: {
                    required: "Please fill the height in feet",

                },

                weight_lb: {
                    required: "Please provide   weight",
                    digits: "Sharing your weight helps us get the right fit"
                },
                kids_birthdate: {
                    required: "Please provide   birthday",
                },
                your_kid_gender: {
                    required: "Please provide kid gender",
                },
                kids_relationship_to_child: {
                    required: "Please provide relationship",
                },
                top_size: {
                    required: "Please provide top size",
                },
                bottom_size: {
                    required: "Please provide bottom  size",
                },
                shoe_size: {
                    required: "Please provide shoe size",
                },

            },
        });

        $("#styleKidBoySection3").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                //$('#loaderPyament').show();
                var formData = $('#styleKidBoySection3').serialize();
                $.post(url + 'users/ajaxKidBoyPrice', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },

        });
        $("#styleKidGirlSection3").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                //$('#loaderPyament').show();
                var formData = $('#styleKidGirlSection3').serialize();
                $.post(url + 'users/ajaxKidGirlPrice', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },

        });

        $.validator.addMethod("birthkid", function (value, element) {
            var year = value.split('/');
            var d = new Date();
            //console.log();
            var n = <?php echo date('m'); ?>;
            var days = d.getDate() - 1;
            var month = year[0];
            var day = year[1];
            var years = year[2];
            var ye = <?php echo date('Y'); ?>;
            if ((parseInt(month) > n) && (ye == years)) {
                $.validator.messages.birthkid = "Please put on valid Month";

            } else if (month == 0) {
                $.validator.messages.birthkid = "Please put on valid Month";
                return false;
            } else if (day == 0) {
                $.validator.messages.birthkid = "Please put on valid Date";
                return false;
            } else if (day > 31) {
                $.validator.messages.birthkid = "Please put on valid Date";
                return false;
            } else if (month > 12) {
                $.validator.messages.birthkid = "Please put on valid Date";
                return false;
            } else if ((day > days) && (n > month) && (ye == years)) {
                //alert(day);
                // alert(days);
                $.validator.messages.birthkid = "Please put on valid Date";
                return false;
            } else if (years == 0) {
                $.validator.messages.birthkid = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (years < 1910) {
                $.validator.messages.birthkid = "Please provide certain age";
                return false;
            } else if (year[2].length < 4) {
                $.validator.messages.birthkid = "Please put on valid date (mm/dd/yyyy)";
                return false;
            } else if (value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/) && parseInt(year[2]) > <?php echo date('Y') ?>) {

                $.validator.messages.birthkid = "Please provide certain age";
                return false;
            } else if (parseInt(year[2]) == <?php echo date('Y') ?>) {
                if (n == month) {
                    if (day > days) {
                        //alert(day);
                        //alert(days);
                        $.validator.messages.birthkid = "Please provide certain age";
                        return false;
                    } else {
                        return true;
                    }
                    //alert(days); 
                } else {
                    return true;
                }


            } else {
                return true;
            }
        }, $.validator.messages.birthkid);

        $('.imgkid').click(function () {

            $('#imgupload1kid').trigger('click');
            var id = $(this).attr("data-id");
            $('#imgupload1kid').attr("data-id", id);

        });

        $("#imgupload1kid").on("change", function (e) {
            var idx = $(this).attr("data-id");
            var url = $('#pageurl').val();
            var formData = new FormData();
            formData.append('file', $('#imgupload1kid')[0].files[0]);
            formData.append('imgId', idx);


            $.ajax({
                url: url + 'users/ajaxKidImg',
                type: 'POST',
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function (data) {
                    $('#img' + idx).attr('src', data.img);
                },
                dataType: "JSON"

            });


        });

        $("#styleBoySection4").validate({
            submitHandler: function () {
                var url = $('#pageurl').val();
                //$('#loaderPyament').show();
                var formData = $('#styleBoySection4').serialize();
                $.post(url + 'users/ajaxBoyCustom', formData, function (response) {
                    if (response.status == "success") {
                        window.location.href = response.url
                    }
                    if (response.status == "error") {

                        window.location.href = response.url
                    }

                }, 'json');
                return false;

            },

        });




    </script>
    <script type="text/javascript">
        $(".btn-group-toggle").twbsToggleButtons();
    </script>

    <script src="<?php echo HTTP_ROOT ?>js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function () {
            $('#li-1').attr('style', 'pointer-event:none;');
            $('#li-2').attr('style', 'pointer-event:none;');
            $('#li-3').attr('style', 'pointer-event:none;');
            $('#li-4').attr('style', 'pointer-event:none;');
        });

    </script>



<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/font-awesome.min.css">
<link href="<?php echo HTTP_ROOT; ?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo HTTP_ROOT ?>assets/js/moment-with-locales.js"></script>
<script src="<?php echo HTTP_ROOT ?>assets/js/bootstrap-datetimepicker.js"></script>
<style type="text/css">
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
    
    .hide{
        display: none;
    }
    .active{
        display: block;
    }

</style>

<?php

    if ($this->request->session()->read('PROFILE') == 'KIDS') {
        ?>

        <div class="schedule">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <?= $this->Flash->render() ?>
                        <h1>How often would you like to receive Fixes for <?php
                            if (@$kidmenu->kids_first_name) {
                                echo $kidmenu->kids_first_name;
                            } else {
                                echo 'YOUR CHILDdd';
                            }
                            ?></h1>
                        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule')) ?>
                        <div class="receive-box">

                            <div class="checkbox checkbox-primary">
                                <input type='hidden' name='kid_id' value='<?php echo $this->request->session()->read('KID_ID'); ?>'/>
                                <input id="checkbox2" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?>checked="checked" <?php } ?>>
                                <label for="checkbox2">
                                    Save me time by sending Fixes on a schedule.

                                </label>
                            </div>

                            <ul>
                                <li>
                                    <input class="radio-box" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) { ?> checked <?php } else { ?> checked <?php } ?> value="1" name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes_kid1" type="radio" >
                                    <label for="how_often_would_you_lik_fixes_kid1">
                                        <h5>Monthly Pick-Me-Up</h5>
                                        <p>Is your kid tough on clothes? Get a consistent rotation of new items with a Fix every month</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio">
                                    <label for="how_often_would_you_lik_fixes2">
                                        <h5>Timely Refresh</h5>
                                        <h6>Most Popular</h6>
                                        <p> Kids grow fast! Keep up with their growth spurts with a Fix every 2 months.</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box" value="3" id="how_often_would_you_lik_fixes_kid3" type="radio" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes">
                                    <label for="how_often_would_you_lik_fixes_kid3">
                                        <h5>Seasonal Stock-Up</h5>
                                        <p>Get exactly what you need for special occasions or changing weather with a Fix every 3 months.</p>
                                    </label>
                                </li>

                            </ul>
                            <p>
                                We'll send you shipments at the frequency you choose until you change it or cancel, which you may do anytime via your online account. Before each Fix is styled, you'll be charged a $20 styling fee, which will be credited to any items you choose to buy. .</p>
                            <button name="first_time_fix" value ='first_time_fix' type="Submit">CONTINUE <i class="fas fa-arrow-right"></i></button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } else {
        ?>
        <div class="schedule">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <?= $this->Flash->render() ?>
                        <h1>Let’s plan your first Fix!</h1>
                        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule')) ?>
                        <div class="receive-box">
                            <h2>How often would you like to receive Fixes?</h2>
                            <div class="checkbox checkbox-primary">
                                <input id="try_new_items_with_scheduled_fixes12" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } ?>>
                                <label for="try_new_items_with_scheduled_fixes12">
                                    Try new items with scheduled Fixes.

                                </label>
                            </div>

                            <ul>
                                <li>
                                    <input class="radio-box" value="1" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) { ?> checked <?php } ?>  name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes1" type="radio" >
                                    <label for="how_often_would_you_lik_fixes1">
                                        <h5>Running Refresh</h5>
                                        <p>Get a rotating selection of new items with a Fix every 2-3 weeks.</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked <?php } elseif (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 0) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio">
                                    <label for="how_often_would_you_lik_fixes2">
                                        <h5>Monthly Pick-Me-Up</h5>
                                        <p>Busy schedule? We’ll do the work & send a Fix every month.</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box" value="3" id="how_often_would_you_lik_fixes3" type="radio" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes">
                                    <label for="how_often_would_you_lik_fixes3">
                                        <h5>Occasional Update</h5>
                                        <p>Build upon a solid base with a Fix every 2 months.</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box"  value='4' <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 4) { ?> checked <?php } ?> id="how_often_would_you_lik_fixes4" type="radio" name="how_often_would_you_lik_fixes">
                                    <label for="how_often_would_you_lik_fixes4">
                                        <h5>Quarterly Top-Off</h5>
                                        <p>Get a fresh supply of goods with a Fix every 3 months.</p>
                                    </label>
                                </li>
                            </ul>
                            <p>
                                We'll send you shipments at the frequency you choose until you change it or cancel, which you may do anytime via your online account. Before each Fix is styled, you'll be charged a $20 styling fee, which will be credited to any items you choose to buy.</p>
                            <button name="first_time_fix" value ='first_time_fix' type="Submit">SAVE <i class="fas fa-arrow-right"></i></button>
                            <button onclick="javascript:history.back();return false;">CANCEL</button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

?>

                                                           
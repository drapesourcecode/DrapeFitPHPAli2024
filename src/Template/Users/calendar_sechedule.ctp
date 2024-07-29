<?= $this->Flash->render(); ?>
<link href="<?php echo HTTP_ROOT ?>css/responsive-calendar.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/jquery-ui.css">
<script src="<?php echo HTTP_ROOT ?>js/jquery-1.12.4.js"></script>
<script src="<?php echo HTTP_ROOT ?>js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function () {
        // var newDate = new Date().toLocaleString("en-US", {timeZone: "America/Los_Angeles"}); 
        ///alert(newDate+(10*86400000));
        $("#datepicker").datepicker({minDate: 7, maxDate: "+3M +10D", onSelect: function (dateText, inst) {
                var date = $(this).val();
                $('#chose-date').val(date);
            }});
    });
</script>
<style type="text/css">
    #datepicker {font-size:20px;}.Calendar-text-center {width: 50%;float: none; text-align: center;margin: 0 auto;}
</style>

<script type="text/javascript" src="<?= HTTP_ROOT; ?>js/setting.js"></script>
<div class="style-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <?php echo $this->element('frontend/profile_menu_men') ?>
            </div>
        </div>
    </div>
</div>
<section class="Calendar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">               
                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule')) ?>
                <div id="datepicker"></div>
                <input type="hidden" id="chose-date" name="datepick" value="<?php echo date('m/d/Y', strtotime('+7 days')); ?>">

                <div class="Calendar-text">
                    <div class="Calendar-text-center">
                        <?php //echo $LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes; ?>
                        <input  onclick="getCheckBox()"  id="try_new_items_with_scheduled_fixes12" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '0') { ?>  <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '') { ?> checked <?php } ?>  style="display:none;" >
                        <label class="check">Automatically send FIT</label>
                        <div class="calender-content-box">
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

                                        <input class="radio-box" value="1" name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes1" type="radio" <?php if ((@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) || (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == '')) { ?> checked <?php } ?>>
                                        <label for="how_often_would_you_lik_fixes1">
                                            <h5>EVERY <span>MONTHLY</span></h5>
                                              <!-- <p>Ship a selection of new products in every 2 weeks.</p> -->
                                        </label>
                                    </li>
                                    <li>
                                        <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2"<?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio" >
                                        <label for="how_often_would_you_lik_fixes2">
                                            <h5>EVERY <span>2</span> MONTH</h5>
                                          <!--  <p>Will ship hand picked products in every month.</p> -->
                                        </label>
                                    </li>
                                    <li>
                                        <input class="radio-box" value="3" id="how_often_would_you_lik_fixes3" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?>>
                                        <label for="how_often_would_you_lik_fixes3">
                                            <h5>EVERY <span>3</span> MONTH</h5>
                                <!--             <p>Try a FIT ® in every two months.</p> -->
                                        </label>
                                    </li>
                                    <!--     <li>
                                            <label for="how_often_would_you_lik_fixes4">
                                                <h5>Quarterly Top-Off</h5>
                                                <p>Get a fresh supply of goods with a Fix every 3 months.</p>
                                            </label>
                                        </li> -->
                                </ul>
                                 <p>Until you cancel your Fit Schedule we will charge a styling Fees $<?= ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $main_style_fee; ?>  depends on your style delivery frequency.</p>
                            </div>
                        </div>
                        <div class="Calendar-radio-button">
                            <!-- <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                            </p> -->
                            <button>SCHEDULE YOUR FIT</button>

                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#s').delay(3000).fadeOut('slow');
        $('#e').delay(3000).fadeOut('slow');
    });
</script>
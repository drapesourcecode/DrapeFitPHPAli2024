<style>
    .dialog-ovelay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.50);
        z-index: 999999
    }
    .dialog-ovelay .dialog {
        width: 400px;
        margin: 100px auto 0;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0,0,0,.2);
        border-radius: 3px;
        overflow: hidden
    }
    .dialog-ovelay .dialog header {
        padding: 10px 8px;
        background-color: #f6f7f9;
        border-bottom: 1px solid #e5e5e5
    }
    .dialog-ovelay .dialog header h3 {
        font-size: 14px;
        margin: 0;
        color: #555;
        display: inline-block
    }
    .dialog-ovelay .dialog header .fa-close {
        float: right;
        color: #c4c5c7;
        cursor: pointer;
        transition: all .5s ease;
        padding: 0 2px;
        border-radius: 1px
    }
    .dialog-ovelay .dialog header .fa-close:hover {
        color: #b9b9b9
    }
    .dialog-ovelay .dialog header .fa-close:active {
        box-shadow: 0 0 5px #673AB7;
        color: #a2a2a2
    }
    .dialog-ovelay .dialog .dialog-msg {
        padding: 12px 10px
    }
    .dialog-ovelay .dialog .dialog-msg p{
        margin: 0;
        font-size: 15px;
        color: #333
    }
    .dialog-ovelay .dialog footer {
        border-top: 1px solid #e5e5e5;
        padding: 8px 10px
    }
    .dialog-ovelay .dialog footer .controls {
        direction: rtl;

    }
    .dialog-ovelay .dialog footer .controls .button {
        padding: 6px 25px;
        border-radius: 3px;
    }
    .button {
        cursor: pointer
    }

    .button-danger,
    .button-default{
        background-color: #232f3e;
        border: 1px solid #232f3e;
        color: #ff6c00;
        font-size: 13px;
        font-family: "Amazon Ember", Arial, sans-serif;
        font-weight: bold;
    }
    .button-danger:hover,
    .button-default:hover{
        background-color: #ff6c00;
        border: 1px solid #ff6c00;
        color: #232f3e;
    }
    .link {
        padding: 5px 10px;
        cursor: pointer
    }

</style>

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
    var modal = document.getElementById('id02');
    window.onclick = function (event)
    {
        if (event.target == modal)
        {
            modal.style.display = "none";
        }
    }
</script>
<script>
    $("#last-para2").bind("click", function () {
        $("#button1").trigger("click");
    });
</script>

<?php echo $this->element('frontend/profile_menu_men') ?>
<link rel="stylesheet" href="<?= HTTP_ROOT; ?>payment/css/style.css">

<section class="setting-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12 settings-profile">
                <ul class="nav nav-tabs faq-cat-tabs">
                    <li class="active"><a href="#faq-cat-1" data-toggle="tab"><i class="fa fa-user-circle-o"></i>
                            <?php echo $this->request->session()->read('Auth.User.name'); ?></a></li>
                    <?php
                    $count = 2;
                    $countx = 1;
                    foreach (@$kidDetails as $kid) {
                        if ($countx == 1) {
                            $numberCount = "first";
                        }
                        if ($countx == 2) {
                            $numberCount = "second";
                        }
                        if ($countx == 3) {
                            $numberCount = "third";
                        }
                        if ($countx == 4) {
                            $numberCount = "fourth";
                        }
                        ?>
                        <li><a href="#faq-cat-<?php echo $count; ?>" data-toggle="tab" ><i class="fa fa-user-circle-o" ></i>
                                <?php echo ($kid->kids_first_name == '') ? 'Your ' . $numberCount . ' child' : $kid->kids_first_name; ?>
                            </a></li>
                        <?php
                        $count++;
                        $countx++;
                    }
                    ?>

                </ul>
            </div>
        </div>
        <?= $this->Flash->render() ?>
        <div class="tab-content section1" style="border: none;padding: 0;">          
            <div class="tab-pane fade in active" id="faq-cat-1">
                <div class="row">
                    <div class="col-md-12">
                        <h3><?php echo $this->request->session()->read('Auth.User.name'); ?> Setting</h3>
                    </div>
                    <div class="col-md-12">
                        <span id="msg" onclick="$('#msg').fadeOut('slow');"></span>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="setting-left">      				   
                            <ul class="nav nav-tabs nav-stacked text-center" role="tablist" style="margin-top: 0;margin-bottom: 0; ">
                                <li id="li-one" role="presentation"><a class="cli" href="#one" aria-controls="home" role="tab" data-toggle="tab">Login details »</a></li>
                                <li id="li-two" role="presentation"><a class="cli" href="#two" aria-controls="profile" role="tab" data-toggle="tab">Your Address »</a></li>
                                <li role="presentation"><a class="cli" href="#three" aria-controls="messages" role="tab" data-toggle="tab">Payment details »</a></li>
                                <li role="presentation"><a class="cli" href="#four" aria-controls="home" role="tab" data-toggle="tab">Manage FIT settings»</a></li>
                                <li role="presentation"><a class="cli" href="#five" aria-controls="profile" role="tab" data-toggle="tab">Account Credit »</a></li>
                                <li role="presentation"><a class="cli" href="#six" aria-controls="messages" role="tab" data-toggle="tab">Email preferences »</a></li>
                                <li  role="presentation"><a id="facbook-click" class="cli" href="#seven" aria-controls="messages" role="tab" data-toggle="tab">Manage Facebook Settings »</a></li>
                                <li role="presentation">
                                    <a class="cli" href="#eight" aria-controls="messages" role="tab" data-toggle="tab">Manage Contact Settings »
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php if ($slg == 'facebook') { ?>
                        <script>
                            $(document).ready(function () {
                                $('#facbook-click').click();
                                $('#customers').hide();
                                // $('#one').removeClass('active in');
                                //$('#five').addClass('active in');
                            });
                        </script>
                        <?php
                        $this->request->session()->write('facebook-active', '');
                    }
                    ?>
                    <div class="col-sm-9 col-lg-9 col-md-9">
                        <div class="tab-content">
                            <ul id="customers">
                                <li>
                                    <strong>LOGIN DETAILS</strong>
                                    <span>»</span>
                                    <span><?php echo $this->request->session()->read('Auth.User.email'); ?></span>
                                </li>
                                <li>
                                    <strong>YOUR ADDRESS</strong>
                                    <span>»</span>
                                    <span> <?php
                                        if ($ship_address->address == '') {
                                            echo "Address Not Available";
                                        } else {
                                            echo $ship_address->address
                                            ?> <?php echo $ship_address->city ?> <?php echo $ship_address->zipcode ?> <?php echo $ship_address->state ?> <?php
                                            echo $ship_address->country;
                                        }
                                        ?></span>
                                </li>
                                <li>
                                    <strong>PAYMENT DETAILS</strong>
                                    <span>»</span>
                                    <span>Manage your address book settings.</span>
                                </li>
                                <li>
                                    <strong>MANAGE FIT SETTING</strong>
                                    <span>»</span>
                                    <span>Sign into Drape Fit with Facebook—no password required.</span>
                                </li>
                                <li>
                                    <strong>ACCOUNT CREDIT</strong>
                                    <span>»</span>
                                    <span id='creditAccount'>$0.00</span>
                                </li>
                                <li>
                                    <strong>EMAIL PREFERENCE</strong>
                                    <span>»</span>
                                    <span>You are currently receiving Fits on demand.</span>
                                </li>
                                <li>
                                    <strong>MANAGE FACEBOOK SETTING</strong>
                                    <span>»</span>
                                    <span>Currently receiving exclusive offers, news, styling tips and more.</span>
                                </li>
                                <li>
                                    <strong>MANAGE CONTACT SETTING</strong>
                                    <span>»</span>
                                    <span>
                                        <b></b>
                                        <br>
                                        <b></b>
                                    </span>
                                </li>                  
                            </ul>
                            <div role="tabpanel" class="tab-pane fade" id="one">
                                <h5>Login details </h5>
                                <span id="loginDetails"></span>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                    <button class="btn-boxes" onclick="changeLoginDetails()" type="button">Edit</button>

                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="two">
                                <h5>Your Address</h5>
                                <div class="Address-details2"  href="javascript:void(0)">
                                    <i class="fa fa-plus"></i>
                                    <p>Add Address</p>
                                </div>
                                <div id="address-line">  </div>

                                <div class="collapse setting-add-new-address " id="add-address">

                                    <?= $this->Form->create('shipaddress', ['type' => 'post', 'class' => "check-out-address-form", "role" => "form", "data-toggle" => "validator", 'id' => 'shipaddress']); ?>
                                    <h3 id="newAdress123">Add a new address</h3>
                                    <ul>
                                        <li>
                                            <label>Full name : </label>
                                            <input type="hidden" name="id" id="sid">
                                            <input type="text" name="full_name" id="full_name" maxlength="50">
                                        </li>
                                        <li>
                                            <label>Address line 1 : </label>
                                            <input type="text" name="address" id="address" maxlength="60">
                                        </li>
                                        <li>
                                            <label>Address line 2 : </label>
                                            <input type="text" name="address_line_2" id="address_line_2" maxlength="60">
                                        </li>
                                        <li>
                                            <label>City : </label>
                                            <input type="text" name="city" id="city" maxlength="50">
                                        </li>
                                        <li>
                                            <label>State/Province/Region : </label>
                                            <input type="text" name="state" id="state" maxlength="50">
                                        </li>
                                        <li>
                                            <label>ZIP : </label>
                                            <input type="text" name="zipcode" id="zipcode" maxlength="20" >
                                        </li>
                                        <li>
                                            <label>Country : </label>
                                            <select id="country" name="country" >
                                                <option value="United states">United states</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label>Phone number:</label>
                                            <input type="text" name="phone" id="phone" maxlength="20">
                                        </li>
                                    </ul>
                                    <button type="submit" value="addAddress" class="btn deliver-address">Save Address</button>
                                    <?= $this->Form->end(); ?>
                                </div>

                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="three">
                                <div class=" faq-cat-content">
                                    <div class="card-details-heading">
                                        <ul>
                                            <li><h4>Your saved debit and credit cards</h4></li>
                                            <li><p>Name </p></li>
                                            <li><p>Expires date</p></li>
                                        </ul> 
                                    </div>

                                     <div class="tab-pane active in fade" id="faq-cat-1">
                                        <div class="panel-group" id="accordion-cat-1">



                                        </div>
                                    </div>                    
                                </div>
                                <div class="card-payment-option">
                                    <details  onclick="newcard()">
                                        <a  href="<?= HTTP_ROOT . 'add-card/account'; ?>">
                                            <summary>Add a card</summary>
                                        </a>
                                    </details>

                                </div>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                </div>
                            </div> 


                            <div role="tabpanel" class="tab-pane fade" id="four">
                                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule_fix')) ?>
                                <h5>MANAGE YOUR FIT SETTINGS</h5>
                                <h6>Please select your schedule</h6>
                                <div class="checkbox-sitting" style="display:none;">
                                    <input  onclick="getCheckBox()"  id="try_new_items_with_scheduled_fixes12" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '0') { ?>  <?php } else if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == '') { ?> checked <?php } ?>>
                                    <label for="try_new_items_with_scheduled_fixes12">I want new product with FIT sechdule</label>
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
                                            <input class="radio-box" value="1" name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes1" type="radio" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) { ?> checked <?php } elseif (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == '') { ?> checked <?php } ?>>
                                            <label for="how_often_would_you_lik_fixes1">
                                                <h5>EVERY MONTHLY</h5>
                                                <p>Will ship hand picked products in every month.</p>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2"<?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio" >
                                            <label for="how_often_would_you_lik_fixes2">
                                                <h5>EVERY 2 MONTH</h5>
                                                <p>Try a FIT in every two months</p>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="radio-box" value="3" id="how_often_would_you_lik_fixes3" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?>>
                                            <label for="how_often_would_you_lik_fixes3">
                                                <h5>EVERY 3 MONTH</h5>
                                                <p>Try a FIT in every three months.</p>
                                            </label>
                                        </li>
                                        <!--  <li>
                                             <input class="radio-box" value="4" id="how_often_would_you_lik_fixes4" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 4) { ?> checked <?php } ?> >
                                             <label for="how_often_would_you_lik_fixes4">
                                                 <h5>Quarterly Top-Off</h5>
                                                 <p>Get a fresh supply of goods with a Fix every 3 months.</p>
                                             </label>
                                         </li> -->
                                    </ul>
                                    <p>Until you cancel your Fit Schedule we will charge a styling Fees  $<span id="price_sec"><?= ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $main_style_fee; ?></span>  depends on your style delivery frequency.</p>
                                </div>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                    <button class="btn-boxes" id="sechdule_fix_btn" type="button">Save</button>
                                </div>	
                                <?php echo $this->Form->end(); ?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="five">
                                <h5 id='wallDetails'></h5>
                                <p>Please redeem your Promo Code and Gift Card here.</p>
                                <div class="acc">
                                    <label>Redeem your promo code.</label>
                                    <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'readmecode')) ?>
                                    <input type="text" name="promocode" id="promocode" maxlength="29"> 
                                    <p id="msgIdread"></p>
                                    <button class="save" id='readmecodeBtn' type="button" name="credit_info" value="credit_info" >Redeem Promo Code</button>

                                    <?php echo $this->Form->end(); ?>

                                    <!--                                    <label class="acclab"><a href="#">or,Redeem a gift code</a></label>
                                                                        <p>You can also</p>
                                                                        <p><a href="<?php echo HTTP_ROOT . 'clients/referrals' ?>">See My Referrals »</a></p>
                                                                        <p><a href="<?php echo HTTP_ROOT . 'clients/referrals' ?>">Redeem a gift code »</a></p>-->

                                </div>
                                <div class="acc" style="float:right;">
                                    <label>Redeem your gift code.</label>
                                    <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'readmegiftcode')) ?>
                                    <input type="text" name="gift" id="gifcode" maxlength="29"> 
                                    <p id="msgIdreadgift"></p>
                                    <button class="save" id='readmecodegiftBtn' type="button" name="credit_info" value="credit_info">Redeem Gift Code</button>

                                    <?php echo $this->Form->end(); ?>

                                    <!-- <label class="acclab"><a href="#">or,Redeem a gift code</a></label>
                                     <p>You can also</p>
                                     <p><a href="<?php echo HTTP_ROOT . 'clients/referrals' ?>">See My Referrals »</a></p>
                                     <p><a href="<?php echo HTTP_ROOT . 'clients/referrals' ?>">Redeem a gift code »</a></p> -->

                                </div>
                                <div class="credit-right-main">
                                    <div class="credit-right">
                                        <h2>Invite Friends.<br>Get $25.</h2>
                                        <form method="post" name="email_reference" id="email_reference">
                                            <p>who are you inviting ?</p>
                                            <div class="switch-field">
                                                <input class="xx" type="radio" id="Women" name="gender" value="w" checked="">
                                                <label for="Women">Women</label>
                                                <input class="xx" type="radio" id="Men" name="gender" value="m">
                                                <label for="Men">Men</label>
                                                <input class="xx" type="radio" id="Kids" name="gender" value="k">
                                                <label for="Kids">Kids</label>
                                            </div>
                                            <p>choose a way to share</p>
                                            <div class="copy-text">
                                                <p id="p1"><?php echo $link; ?></p>
                                                <a class="copy-first" href="javascript:void(0)" onclick="copyToClipboard('#p1')">copy-link<span class="copied">Copied !</span></a>
                                            </div>
                                        </form>
                                        <ul>
                                            <li>Or share via :</li>


                                            <li id=""   ><a  id="email_send_btnx" target="_blank" href="<?php echo $url . $sub . '&body=' . $txt . $link; ?>"><i class="fa fa-envelope"></i></a></li>
                                            <li><a href="https://www.facebook.com/"><i class="fa fa-facebook-official"></i></a></li>
                                            <li><a href="https://www.messenger.com/"><i class="fab fa-facebook-messenger"></i></a></li>
                                        </ul>
                                        <div class="referral-work">
                                            <h4>How Referrals Work</h4>
                                            <p><span>1</span>Share your referral link with friends via email or social media.</p>
                                            <p><span>2</span>Get $25 credit when they checkout from their first Fit.</p>
                                            <p><span>3</span>Enjoy! Credits automatically apply to your future Fits.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                </div>	
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="six">
                                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'email_fix_profile')) ?>
                                <h5>EMAIL PREFERENCES</h5>
                                <h6>Your email address on file is : <?php echo $this->request->session()->read('Auth.User.email'); ?></h6>
                                <h6>I'd like to recive</h6>
                                <div class="email-label">
                                    <label for="exclusive_offers" class="input-control radio">
                                        <input type="radio" id="exclusive_offers" <?php if (@$EmailPreference->preferences == 0 || @$EmailPreference->preferences != 0) { ?> checked="checked" <?php } ?> name="email_preferences" value="0">
                                        <span class="input-control__indicator"></span>Exclusive offers,news,styling,tips and more !
                                    </label>
                                    <label for="exclusive_offers2" class="input-control radio">
                                        <input type="radio" id="exclusive_offers2" <?php if (@$EmailPreference->preferences == 1) { ?> checked="checked" <?php } ?> name="email_preferences" value="1" >
                                        <span class="input-control__indicator"></span>No emails, please
                                    </label>
                                </div>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                    <button class="btn-boxes email_pre" type="button">Save</button>
                                </div>
                                <?php echo $this->Form->end() ?>
                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="seven">
                                <h5>FACEBOOK SETTING</h5>
                                <h6>Sign in with Facebook</h6>
                                <p>Sign in with Facebook Connecting your Facebook account allows you to sign into Drape Fit without needing a new password.</p>
                                <?php if ($user_details->is_fb_connect == 1) { ?>
                                    <a href="<?php echo HTTP_ROOT . 'facebook-disconnect' ?>"  class="loginBtn loginBtn--facebook">DISCONNECTED FACEBOOK</a>

                                <?php } else { ?>
                                    <a href="javascript:void(0)"  onclick="window.open('<?php echo HTTP_ROOT ?>fbloginCon', '_blank');" class="loginBtn loginBtn--facebook">CONNECT FACEBOOK</a>
                                <?php } ?>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="eight">
                                <p><h2>Contact Settings </h2></p>
                                <p>Drape Fit stores your contacts to make it easier to send referral emails and for other purposes as stated in our privacy policy. You may modify your contact settings at any time from here. </h2></p>
                                <p>You don't currently have an address book connected. You can connect your address book to more easily refer your friends to use  Fit.</p>
                                <div class="tab-button">

                                    <a href='<?php echo HTTP_ROOT . 'clients/referrals' ?>'><button class="btn-boxes" type="button">Connect Address Book </button></a>
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







            <?php
            $countkid = 2;
            $county = 1;
            //pj($kidDetails);exit;
            foreach (@$kidDetails as $kid) {
                if ($county == 1) {
                    $numberCount = "first";
                }
                if ($county == 2) {
                    $numberCount = "second";
                }
                if ($county == 3) {
                    $numberCount = "third";
                }
                if ($county == 4) {
                    $numberCount = "fourth";
                }
                ?>

                <div class="tab-pane fade" id="faq-cat-<?php echo $countkid; ?>" >
                    <div class="row">
                        <div class="col-md-12">
                            <h3> <?php echo ($kid->kids_first_name == '') ? 'Your ' . $numberCount . ' child' : $kid->kids_first_name; ?>'s Setting</h3>

                            <span id="msgk-<?php echo $kid->id; ?>" onclick="$('#msgk-<?php echo $kid->id; ?>').fadeOut('slow');"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-lg-3 col-md-3">
                            <div class="setting-left">
                                <ul class="nav nav-tabs nav-stacked text-center" role="tablist">
                                    <li role="presentation" class="active"><a class="cli" href="#k<?php echo $kid->id; ?><?php echo $countkid; ?>" aria-controls="home" role="tab" data-toggle="tab">Manage FIT settings»</a></li>
                                    <li role="presentation"><a class="cli" href="#b<?php echo $kid->id; ?><?php echo $countkid; ?>" aria-controls="messages" role="tab" data-toggle="tab">Email preferences »</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-9 col-lg-9 col-md-9">
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade active in satya" id="k<?php echo $kid->id; ?><?php echo $countkid; ?>">

                                    <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule_fix_kid' . @$kid->id)) ?>
                                    <input type="hidden" name="kid_id" value="<?php echo @$kid->id; ?>"/>
                                    <input type="hidden" name="id" value="<?php echo @$kid->lets_plan_your_first_fix->id; ?>"/>
                                    <h5>MANAGE YOUR FIT SETTINGS</h5>
                                    <h6>Please select your schedule</h6>
                                    <div class="checkbox-sitting" style="display:none;">
                                        <input onclick="getCheckBox2(<?php echo @$kid->id; ?>,<?php echo $countkid; ?>)" id="try_new_items_with_scheduled_fixesk1<?php echo $countkid; ?>" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox"  <?php if (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } else if (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == '0') { ?>  <?php } else if (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == '') { ?> checked <?php } ?>>
                                        <label for="try_new_items_with_scheduled_fixesk1<?php echo $countkid; ?>">I want new product with FIT sechdule</label>
                                    </div>
                                    <div id="optionsDIV-<?php echo @$kid->id; ?>"
                                    <?php if (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == 1) { ?>
                                             style='display: block;'
                                         <?php } else if (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == '0') { ?> style='display: none;'
                                         <?php } else if (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == '') { ?>
                                             style='display: block;'
                                         <?php } else { ?>
                                             style='display: none;'
                                         <?php } ?>

                                         >
                                        <ul>
                                            <li>
                                                <input class="radio-box" value="1" name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixesk1<?php echo $countkid; ?>" type="radio" <?php if (@$kid->lets_plan_your_first_fix->how_often_would_you_lik_fixes == 1) { ?> checked <?php } else if (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == '') { ?> checked <?php } ?>>
                                                <label for="how_often_would_you_lik_fixesk1<?php echo $countkid; ?>">
                                                    <h5>EVERY MONTHLY</h5>
                                                    <p>Will ship hand picked products in every month.</p>
                                                </label>
                                            </li>
                                            <li>

                                                <input class="radio-box" value="2" id="how_often_would_you_lik_fixesk2<?php echo $countkid; ?>"  name="how_often_would_you_lik_fixes" type="radio" <?php if (@$kid->lets_plan_your_first_fix->how_often_would_you_lik_fixes == 2) { ?> checked <?php } ?>>
                                                <label for="how_often_would_you_lik_fixesk2<?php echo $countkid; ?>">
                                                    <h5>EVERY 2 MONTH</h5>
                                                    <p>Try a FIT in every two months.</p>
                                                </label>
                                            </li>
                                            <li>
                                                <input class="radio-box" value="3" id="how_often_would_you_lik_fixesk3<?php echo $countkid; ?>" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$kid->lets_plan_your_first_fix->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?> >
                                                <label for="how_often_would_you_lik_fixesk3<?php echo $countkid; ?>">
                                                    <h5>EVERY 3 MONTH</h5>
                                                    <p>Try a FIT in every three months.</p>
                                                </label>
                                            </li>
                                            <!-- <li>
                                                <input class="radio-box" value="4" id="how_often_would_you_lik_fixesk4<?php echo $countkid; ?>" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$kid->lets_plan_your_first_fix->how_often_would_you_lik_fixes == 4) { ?> checked <?php } ?>>
                                                <label for="how_often_would_you_lik_fixesk4<?php echo $countkid; ?>">
                                                    <h5>Quarterly Top-Off</h5>
                                                    <p>Get a fresh supply of goods with a Fix every 3 months.</p>
                                                </label>
                                            </li> -->
                                        </ul>
                                        <p>Until you cancel your Fit Schedule we will charge a styling Fees  $<span id="price_sec<?php echo $kid->id; ?>"><?= ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $kid_style_fee; ?></span>  depends on your style delivery frequency.</p>
                                    </div>
                                    <div class="tab-button">
                                        <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                        <button data-id ='<?php echo @$kid->id; ?>' class="btn-boxes sechdule_fix_btn_kid"  type="button">Save</button>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>


                                <div role="tabpanel" class="tab-pane fade" id="b<?php echo $kid->id; ?><?php echo $countkid; ?>">
                                    <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'email_prefreper_kid' . @$kid->id)) ?>
                                    <input type="hidden" name="kid_id" value="<?php echo $kid->id; ?>"/>
                                    <h5>EMAIL PREFERENCES</h5>
                                    <h6>Your email address on file is : <?php echo $this->request->session()->read('Auth.User.email'); ?></h6>
                                    <h6>I'd like to recive</h6>
                                    <div class="email-label">

                                        <label for="exclusive_offersx<?php echo @$kid->id; ?><?php echo @$countkid; ?>" class="input-control radio">

                                            <input type="radio" id="exclusive_offersx<?php echo @$kid->id; ?><?php echo @$countkid; ?>" name="email_preferences" <?php if (@$kid->email_preference->preferences == 0 || @$kid->email_preference->preferences != 1) { ?> checked='checked' <?php } ?> value="0" >
                                            <span class="input-control__indicator"></span>Exclusive offers,news,styling,tips and more !
                                        </label>
                                        <label for="exclusive_offers2<?php echo @$kid->id; ?><?php echo @$countkid; ?>" class="input-control radio">
                                            <input type="radio" id="exclusive_offers2<?php echo @$kid->id; ?><?php echo @$countkid; ?>" name="email_preferences"  <?php if (@$kid->email_preference->preferences == 1) { ?> checked="checked" <?php } ?> value="1" >
                                            <span class="input-control__indicator"></span>No emails, please
                                        </label>
                                    </div>
                                    <div class="tab-button">
                                        <button  data-id = '<?php echo @$kid->id; ?>' class="btn-boxes preferences"  type="button">Save</button>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $countkid++;
                $county++;
            }
            ?>
        </div>
    </div>
</section>

<div id="pop-up-box" class="pop-up">
    <?php echo $this->Form->create("User", array('class' => 'pop-up-content', 'data-toggle' => "validator", 'id' => 'paymentFormsave')) ?>
    <span  onclick="document.getElementById('pop-up-box').style.display = 'none'" class="close1" id="close1" title="Close Modal">&times;</span>
    <div class="row pop-up-top">
        <div class="col-md-6">
            <p>Edit Payment Method</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <label>
                Payment Method
            </label>
            <div id="divP">

            </div>
        </div>
        <div class="col-md-4 card-holder-name">
            <label>
                Name on card
            </label>
            <input type="hidden" name="id" id="Pid">
            <input type="text" name="name_card" id="cardNamep" maxlength="50">
        </div>
        <div class="col-md-3 date">
            <label>
                Expiration date
            </label>
            <span>
                <select name="expiry_month" id="expiry_monthp">
                    <?php
                    for ($exp_count = 1; $exp_count <= 12; $exp_count++) {
                        echo "<option>" . ( strlen($exp_count) == 1 ? '0' . $exp_count : $exp_count ) . "</option>";
                    }
                    ?>
                </select>

                <select name="expiry_year" id="expiry_yearp">
                    <option>2019</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
                    <option>2028</option>
                    <option>2029</option>
                    <option>2030</option>
                    <option>2031</option>
                </select>
            </span>
        </div>
    </div>

    <div class="row setting-pop-up-address-details">
        <div class="col-md-12">
            <label>Billing Address</label>
            <div id="billingAddress"></div>
            <a  onclick="getChangeAddress()" href="javascript:void(0)">change</a>
            <div class="setting-pop-up-buttons">
                <a  onclick="getCanelPayment()" href="javascript:void(0)">Cancel</a>
                <a  id='paymentEditSave' href="javascript:void(0)">Save</a>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

<div id="pop-up-box-address" class="pop-up">
    <?php echo $this->Form->create("User", array('class' => 'pop-up-content', 'data-toggle' => "validator", 'id' => 'usethisform')) ?>
    <span  onclick="document.getElementById('pop-up-box-address').style.display = 'none'" class="close1" id="close1" title="Close Modal">&times;</span>
    <div class="row pop-up-top">
        <div class="col-md-6">
            <p>Edit Payment Method</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label>
                Selecting billing address
            </label>
            <div id="addressDiv"></div>
        </div>
    </div>
    <div class="row setting-pop-up-address-details">
        <div class="col-md-12">
            <div class="setting-pop-up-buttons">
                <a  onclick="addChangeAddress()" href="javascript:void(0)">Add new address</a>
                <a  id='usethisaddress' href="javascript:void(0)">Use this address</a>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

<div id="pop-up-box-add-address" class="pop-up">
    <?php echo $this->Form->create("User", array('class' => 'pop-up-content', 'data-toggle' => "validator", 'id' => 'changeAddAddress')) ?>
    <span  onclick="document.getElementById('pop-up-box-add-address').style.display = 'none'" class="close1" id="close1" title="Close Modal">&times;</span>
    <div class="row pop-up-top">
        <div class="col-md-9">
            <p>Add address </p>
        </div>
    </div>
    <ul>
        <li>
            <label>Full name : </label>
            <input type="hidden" name="id" id="sid">
            <input type="text" name="full_name" id="full_namea" maxlength="50">
        </li>
        <li>
            <label>Address line 1 : </label>
            <input type="text" name="address" id="addressa" maxlength="60">
        </li>
        <li>
            <label>Address line 2 : </label>
            <input type="text" name="address_line_2" id="address_line_2a" maxlength="60">
        </li>
        <li>
            <label>City : </label>
            <input type="text" name="city" id="citya" maxlength="50">
        </li>
        <li>
            <label>State/Province/Region : </label>
            <input type="text" name="state" id="statea" maxlength="50">
        </li>
        <li>
            <label>ZIP : </label>
            <input type="text" name="zipcode" id="zipcodea" maxlength="20">
        </li>
        <li>
            <label>Country : </label>
            <select id="countrya" name="country" >
                <option value="United states">United states</option>
            </select>
        </li>
        <li>
            <label>Phone number:</label>
            <input type="text" name="phone" id="phonea" maxlength="20">
        </li>
    </ul>
    <button type="submit" value="addAddress" class="btn deliver-address">Save Address</button>
    <?php echo $this->Form->end(); ?>
</div>

<div id="login-details-box" class="pop-up">
    <?php echo $this->Form->create("User", array('class' => 'pop-up-content', 'data-toggle' => "validator", 'id' => 'changeloginDetailsfrm')) ?>
    <span  onclick="document.getElementById('login-details-box').style.display = 'none'" class="close1" id="close1" title="Close Modal">&times;</span>
    <div class="row pop-up-top">
        <div class="col-md-9">
            <p>Change Login Details </p>
            <label id="password_change-success" class="success"></label>
        </div>
    </div>
    <ul>
        <li>
            <label>First Name : </label>
            <input type="text" name="first_name" id="first_name_login_details" value="<?php echo $user_details->user_detail->first_name; ?>">
        </li>
        <li>
            <label>Last Name : </label>
            <input type="text" name="last_name" id="last_name_login_details" value="<?php echo $user_details->user_detail->last_name; ?>">
        </li>
        <li>
            <label>Email: </label>
            <input type="text" name="email" id="email-login" readonly="" value="<?php echo $user_details->email; ?>">
        </li>

        <li>
            <label>Password: </label>
            <input type="password" name="password" id="passwordlogin" >
            <label id="password_login_details-error" class="error"></label>
        </li>
        <li>
            <label> Confirm Password: </label>
            <input type="password" name="conpassword" id="Conpasswordlogin" >
            <label id="conpassword_login_details-error" class="error"></label>
        </li>

    </ul>
    <button type="submit" value="Update" class="btn deliver-address update-login">Update</button>
    <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript" src="<?= HTTP_ROOT; ?>js/setting.js"></script>
<script type="text/javascript">
        // $(".cli").click(function(e) {
        //     e.preventDefault();
        //     var position = $($(this).attr("href")).offset().top;
        //     $("body, html").animate({
        //         scrollTop: position
        //     } /* speed */ );
        // });
        // $(document).ready(function(){
        //   $(".cli").on('click', function(event) {
        //     if (this.hash !== "") {
        //       event.preventDefault();
        //       var hash = this.hash;
        //       $('html, body').animate({
        //         scrollTop: $(hash).offset().top
        //       }, 0, function(){
        //         window.location.hash = hash;
        //       });
        //     }
        //   });
        // });


        $(".cli").click(function () {
            $('html,body').animate({
                scrollTop: $(".tab-content").offset().top},
                    'slow');
        });
</script>
<script>
    var modal = document.getElementById('pop-up-box');
    window.onclick = function (event)
    {
        if (event.target == modal)
        {
            modal.style.display = "none";
        }
    }

    var modal = document.getElementById('pop-up-box-address');

    window.onclick = function (event) {
        if (event.target == modal)
        {
            modal.style.display = "none";
        }
    }

</script>
<script type="text/javascript" >
    $(document).ready(function () {
        $(".cli").click(function () {
            $("#customers").hide();
        });
    });
</script>
<script>
    function newcard() {
        var x = document.getElementById("new-card");
        if (x.style.display === "block")
        {
            x.style.display = "none";
        } else
        {
            x.style.display = "block";
        }
    }
    $(function () {

        $('#card_number').keypress(function (e) {
            if (e.which == 49 || e.which == 50 || e.which == 51 || e.which == 52 || e.which == 53 || e.which == 54 || e.which == 55 || e.which == 56 || e.which == 57 || e.which == 48) {
            } else {
                return false;
            }
        });
        $('#cvv').keypress(function (e) {
            if (e.which == 49 || e.which == 50 || e.which == 51 || e.which == 52 || e.which == 53 || e.which == 54 || e.which == 55 || e.which == 56 || e.which == 57 || e.which == 48) {
            } else {
                return false;
            }
        });

    });

</script>
<script type="text/javascript">
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        $(".copied").css("opacity", "1");
    }
    $('#email_send_btn').click(function () {
        setTimeout(function () {
            window.location.href = '<?php echo HTTP_ROOT . 'clients/referrals' ?>';
        }, 3000);

    });
    $('.xx').click(function () {
        var value = $(this).val();
        if (value) {

            var href = '<?php echo $linkx; ?>';
            var newLink = href + '?sod=' + value
            // alert('<?php //echo $url . $sub . '&body=' . $txt       ?>'+ newLink);
            $('#email_send_btnx').attr('href', '<?php echo $url . $sub . '&body=' . $txt ?>' + newLink);
            $('#p1').html(newLink);


        } else {

        }







    });


</script>




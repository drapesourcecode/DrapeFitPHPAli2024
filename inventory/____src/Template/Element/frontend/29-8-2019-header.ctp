<?php
$action = $this->request->params['action'];
$paramAction = $this->request->params['_matchedRoute'];
$notification = 0;

if (@$this->request->getSession()->read('Auth.User.id')) {
    @$notificationsMesg = $this->Custom->notificationUser($this->request->getSession()->read('Auth.User.id'));
}


foreach (@$kidDetails as $kid) {
    $getNotificationsMesHeder = $this->Custom->notification($kid->id);
    $notification += $getNotificationsMesHeder;
}

use Cake\ORM\TableRegistry;

if ($this->request->session()->read('PROFILE') == 'KIDS') {
    if ($this->request->session()->read('KID_ID')) {
        $kidsDetails = TableRegistry::get('kidsDetails');
        $Usersdata = $kidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();

        if ($Usersdata->is_redirect == 0 && @$Usersdata->is_progressbar != 100) {
            $url = 'welcome/style/';
        } elseif ($Usersdata->is_redirect == 0 && $Usersdata->is_progressbar == 100) {
            $url = 'welcome/schedule/';
        } elseif ($Usersdata->is_redirect == 0) {
            $url = 'welcome/style/';
        } elseif ($Usersdata->is_redirect == 1) {
            $url = 'welcome/schedule/';
        } elseif ($Usersdata->is_redirect == 2) {
            $url = 'not-yet-shipped';
        } elseif ($Usersdata->is_redirect == 3) {
            $url = 'profile-review/';
        } elseif ($Usersdata->is_redirect == 4) {
            $url = 'order_review/';
        } elseif ($Usersdata->is_redirect == 5) {
            $url = 'calendar-sechedule/';
        } elseif ($Usersdata->is_redirect == 6) {
            $url = 'customer-order-review';
        }
    }
} else {
    $Users = TableRegistry::get('Users');
    $UserDetails = TableRegistry::get('UserDetails');
    $Usersdata = $Users->find('all')->where(['id' => $this->request->getSession()->read('Auth.User.id')])->first();
    $UserDetailsdata = $UserDetails->find('all')->where(['user_id' => $this->request->getSession()->read('Auth.User.id')])->first();
    if ($Usersdata->is_redirect == 0 && $UserDetailsdata->is_progressbar != 100) {
        $url = 'welcome/style/';
    } elseif ($Usersdata->is_redirect == 0 && $UserDetailsdata->is_progressbar == 100) {
        $url = 'welcome/schedule/';
    } elseif ($Usersdata->is_redirect == 0) {
        $url = 'welcome/style/';
    } elseif ($Usersdata->is_redirect == 1) {
        $url = 'welcome/schedule/';
    } elseif ($Usersdata->is_redirect == 2) {
        $url = 'not-yet-shipped';
    } elseif ($Usersdata->is_redirect == 3) {
        $url = 'profile-review/';
    } elseif ($Usersdata->is_redirect == 4) {
        $url = 'order_review/';
    } elseif ($Usersdata->is_redirect == 5) {
        $url = 'calendar-sechedule/';
    } elseif ($Usersdata->is_redirect == 6) {
        $url = 'customer-order-review';
    }
}




if ($paramAction == '/login') {
    ?>
    <script>
        $(document).ready(function () {
            document.getElementById('id01').style.display = 'block';
        });
    </script>
<?php } ?>
<style>
    .submenu ul li.active a{
        background: #1b2431;
        color: #f76c02;
    }
    .sign-up-form .alert-danger{ top: 0 !important; }
</style>
<script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'></script>
<script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js'></script> 
<script>
    $(document).ready(function () {
        $('#email-error').hide();
        $('#email-error1').hide();
    });
</script>
<section class="header-top">
    <div class="container"> 
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <?php if (@$this->request->session()->read('Auth.User.id')) { ?>
                        <a href="<?= HTTP_ROOT . $url; ?>">    
                        <?php } else { ?>
                            <a href="<?= HTTP_ROOT; ?>"> 
                            <?php } ?>
                            <img src="<?= $this->Url->image('mian-logo.png'); ?>" alt="">
                        </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="menu-bar menu-list">
                    <label for="menu-toggle"><p><img src="<?= $this->Url->image('menu-toggle.png'); ?>" alt=""></p></label>
                    <input type="checkbox" id="menu-toggle"/>
                    <?php if ($this->request->session()->read('Auth.User.id')) { ?>
                        <ul id="menu">
                            <li>
                                <a href="<?php echo HTTP_ROOT . 'faq' ?>">
                                    <i class="fa fa-question"></i>
                                    <span>FAQ</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="myFunction()">
                                    <?php if ((@$notification >= 1) || (@$notificationsMesg >= 1)) { ?>
                                        <span class="noti">1</span>
                                    <?php } ?>
                                    <i class="fa fa-user-circle-o"></i>
                                    <span>My Account</span>
                                </a>
                                <div class="submenu" id="submenu-box">
                                    <ul>
                                        <li <?php if ($this->request->session()->read('KID_ID') == '') { ?> class="active" <?php } ?>><a href="<?php echo HTTP_ROOT . 'user_profile/' . @$this->request->getSession()->read('Auth.User.id') ?>"><i class="fa fa-user-circle-o"></i> <?php echo $this->request->session()->read('Auth.User.name'); ?>
                                                <?php if (@$notificationsMesg >= 1) { ?>
                                                    <span class="bell-icon"><i class="fa fa-bell"></i><span class="notifay-no"><?php echo @$notificationsMesg; ?></span></span>
                                                <?php } ?>
                                            </a></li>


                                        <?php
                                        $countc = 1;
                                        $getNotificationsMes = '';
                                        foreach (@$kidDetails as $kid) {
                                            $getNotificationsMes = $this->Custom->notification($kid->id);
                                            if ($countc == 1) {
                                                $numberCount = "first";
                                            }
                                            if ($countc == 2) {
                                                $numberCount = "second";
                                            }
                                            if ($countc == 3) {
                                                $numberCount = "third";
                                            }
                                            if ($countc == 4) {
                                                $numberCount = "fourth";
                                            }
                                            ?>
                                            <li <?php if ($this->request->session()->read('KID_ID') == $kid->id) { ?> class="active" <?php } ?>><a href="<?php echo HTTP_ROOT . 'kid_profile/' . @$kid->id ?> "><i class="fa fa-user-circle-o"></i> 
                                                    <?php echo ($kid->kids_first_name == '') ? 'Your ' . $numberCount . ' child' : $kid->kids_first_name; ?>  <?php if ($getNotificationsMes >= 1) { ?>
                                                        <span class="bell-icon"><i class="fa fa-bell"></i><span class="notifay-no"><?php echo $getNotificationsMes; ?></span></span>
                                                    <?php } ?>
                                                </a></li>
                                            <?php
                                            $countc++;
                                        }
                                        ?> 

                                        <li><a href="<?php echo HTTP_ROOT . 'clients/kids' ?>"><i class="fa fa-user-circle-o"></i> ADD A CHILD PROFILE</a></li>
                                        <li class="setting"><a href="<?php echo HTTP_ROOT . 'account' ?>"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a></li>
                                        <li><a href="<?php echo HTTP_ROOT . 'users/logout' ?>"><i class="fa fa fa-sign-out"></i> Sign Out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul id="menu">
                            <li>
                                <a <?php if ($action == "men") { ?>class="active" <?php } ?> href="<?= HTTP_ROOT; ?>men">
                                    <i class="fa fa-male"></i>
                                    <span>Men</span>
                                </a>                  
                            </li>
                            <li>
                                <a <?php if ($action == "women") { ?>class="active" <?php } ?>  href="<?= HTTP_ROOT; ?>women">
                                    <i class="fa fa-female"></i>
                                    <span>Women</span>
                                </a>
                            </li>
                            <li>
                                <a <?php if ($action == "kids") { ?>class="active" <?php } ?>  href="<?= HTTP_ROOT; ?>kids">
                                    <i class="fa fa-child" aria-hidden="true"></i>
                                    <span>Kids</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="document.getElementById('id01').style.display = 'block'; document.getElementById('id02').style.display = 'none'; $('#userformlogin')[0].reset();">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    <span>Sign in</span>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

<div id="id01" class="modal">

    <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'userformlogin', 'class' => "modal-content"]); ?>
    <span onclick="document.getElementById('id01').style.display = 'none'" class="close" id="close1" title="Close Modal">&times;</span>
    <div class="row">
        <div class="col-md-12">
            <div class="sign-up-page">
                <h1>Welcome Back</h1>                 
            </div>

            <p class="last-para">You don't have an account? <a href="javascript:void(0);" onclick="document.getElementById('id02').style.display = 'block'; document.getElementById('id01').style.display = 'none';document.getElementById('id03').style.display = 'none'; $('#userform')[0].reset();">Sign Up </a> here.</p>
            <div class="sign-up-form">
                <div class="col-sm-12 alert alert-danger" id="login_errorlogin" style="display: none;"></div>
                <input type="text" autocomplete="off" placeholder="Enter Email" name="email" required id="login_email">


                <div class="show-password">
                    <input type="password" autocomplete="off" placeholder="Enter Password" name="password" required id="login_password">
                    <span id="showpwd" onclick="psw()">show</span>
                </div>
                <a href="javascript:void(0);" onclick="document.getElementById('forgotPassword').style.display = 'block';document.getElementById('id01').style.display = 'none';document.getElementById('id02').style.display = 'none';document.getElementById('id03').style.display = 'none';">Forgot Password ?</a>              
            </div>
            <script type="text/javascript">
                function psw()
                {
                    var x = document.getElementById("login_password");
                    if (x.type === "password")
                    {
                        x.type = "text";
                        $('#showpwd').html('hide');
                    } else
                    {
                        x.type = "password";
                        $('#showpwd').html('show');
                    }
                }
            </script>
            <div class="clearfix"><button type="submit" class="signupbtn" id="signIn">Sign In</button></div>
            <div class="sign-up-page">
                <a class="facebook" href="javascript:void()" onclick="window.open('<?php echo HTTP_ROOT ?>fblogin', '_blank');"> Log in with Facebook</a>
                <a class="google" href="<?= HTTP_ROOT; ?>googlelogin"> Log in with Google</a>                  
            </div>
        </div>
    </div>
    <?= $this->Form->end(); ?>
</div>
<script>
    $("#userformlogin").validate({
        submitHandler: function () {
            $('#loaderPyament').show();
            var formData = $('#userformlogin').serialize();
            $.post('<?= HTTP_ROOT; ?>' + 'users/ajaxLogin', formData, function (response) {
                if (response.status == "login" && response.msg == "success") {
                    $('#loaderPyament').hide();
                    document.getElementById('id01').style.display = 'none';
                } else if (response.status == "login_redirect") {
                    //$('#loaderPyament').hide();
                    window.location.href = '<?= HTTP_ROOT; ?>' + response.url
                } else if (response.status == "login_faild") {

                    $('#loaderPyament').hide();
                    $('#login_errorlogin').show();
                    $('#login_errorlogin').html(response.msg);
                    setTimeout(function () {
                        $('#loaderPyament').hide();
                        $('#login_errorlogin').hide();
                        $('#login_errorlogin').html('');
                    }, 10000);
                    document.getElementById('id01').style.display = 'block';
                } else {
                    document.getElementById('id01').style.display = 'block';
                }

            }, 'JSON');

            return false;

        },
        rules: {
            password: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                required: "Please enter your email address",
            },
        },
    });
</script>
<script>
    var modal = document.getElementById('id01');
    window.onclick = function (event)
    {
        if (event.target == modal)
        {
            modal.style.display = "none";
        }
    }
</script>


<div id="id02" class="modal">

    <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'userform', 'class' => "modal-content"]); ?>
    <span onclick="document.getElementById('id02').style.display = 'none'" class="close" title="Close Modal">&times;</span>
    <div class="row">
        <div class="col-md-12">
            <div class="sign-up-page">
                <h1>New to Drape Fit</h1>                  
                <p class="last-para">Already have an Account ? <a href="javascript:void(0);" onclick="document.getElementById('id01').style.display = 'block';
                        document.getElementById('id02').style.display = 'none';
                        document.getElementById('id03').style.display = 'none';
                        $('#userformlogin')[0].reset();"> Sign In </a> here.</p>
            </div>
            <div class="sign-up-form">
                <div class="input_box">
                    <input type="text" placeholder="First Name" name="fname"  id="fname" required value="">
                </div>
                <div class="input_box2">
                    <input type="text" placeholder="Last Name" name="lname" id="lname" required value="">
                </div>
                <input type="text" placeholder="Enter Email" name="email" id="email" required value="">
                <label id="email-error" class="error" for="email"></label>
                <div class="show-password">
                    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required value="">
                    <span id="showsignuppsw" onclick="signuppsw()">show</span>
                </div>
                <p class="need">I need FIT for 
                    <label><input type="radio" name="gender" value="men"> Men</label>
                    <label><input type="radio" name="gender" value="women"> Women</label>
                    <label><input type="radio" name="gender" value="kids"> Kids</label>
                </p>
                <p>
                    <input type="checkbox" name="chk" id="chk" value="accepted" required>  
                    By continuing, you accept <a target="_blank" href="<?php echo HTTP_ROOT . 'terms-conditions' ?>">Terms of Use</a> of DRAPE FIT.
                </p>
            </div>
            <script type="text/javascript">
                function signuppsw() {
                    var y = document.getElementById("pwd");
                    if (y.type === "password") {
                        y.type = "text";
                        $('#showsignuppsw').html('hide');
                    } else {
                        y.type = "password";
                        $('#showsignuppsw').html('show');
                    }
                }
            </script>
            <div class="clearfix"><button type="submit" class="signupbtn"   id="signupbtn">Sign Up</button></div>
        </div>
    </div>
    <?= $this->Form->end(); ?>

</div> 
<script>
    //    var $register = $('#signupbtn');
    //    $register.attr('disabled', true);
    //    $('#userform').find(':input').keyup(function () {
    //
    //        $('#userform').find(':input').each(function () {
    //
    //            if ($(this).val() != "") {
    //                alert($(this).val());
    //                $register.removeAttr('disabled');
    //            }
    //            if ($(this).val() == "") {
    //                $register.attr('disabled', true);
    //            }
    //
    //        });
    //
    //    });

    $("#userform").validate({
        submitHandler: function () {
            $('#loaderPyament').show();
            var formData = $('#userform').serialize();
            $.post('<?= HTTP_ROOT; ?>' + 'users/registration', formData, function (response) {
                if (response.status == "Account Created") {
                    //$('#loaderPyament').hide();
                    //$('.sign-up-page').append('<div class="alert alert-success" id="signup-success-msg">Account Created </div>');


                    //document.getElementById('signup-success-msg').style.display = 'none';
                    //document.getElementById('id02').style.display = 'none';
                    window.location.href = response.url;

                } else {
                    $('#loaderPyament').hide();
                    document.getElementById('id02').style.display = 'block';
                }

            }, 'json');
            return false;

        },
        rules: {
            fname: "required",
            lname: "required",
            pwd: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true,
                check_email: true
            },
            gender: "required",
            chk: "required",

        },
        messages: {
            fname: "Please enter your first name",
            lname: "Please enter your last name",
            gender: "Please Select one",
            chk: "Accept this",
            pwd: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                required: "Please enter your email address",
                check_email: "An account already exists with this email address. Please choose an alternative email."
            },
        },
    });


    jQuery(document).ready(function ($) {
        jQuery.validator.addMethod('check_email', function (value, element, param) {
            return this.optional(element) || !checkEmailExistUser(value);
        });
    });


    function checkEmailExistUser(input) {
        var pageurl = '<?= HTTP_ROOT; ?>';
        var lookup = {'email': input};

        //var img = pageurl + 'img/loader2.gif';
        var email_invalid = false;

        // $("#eloader").html("<img src='" + img + "' style='height: 18px;'>").show();
        $.ajax({
            type: 'POST',
            url: pageurl + 'users/ajaxCheckEmailAvail',
            data: JSON.stringify(lookup),

            success: function (response) {
                if (response.status == 'error') {
                    $('#email-error').show();
                    $('#email-error').attr('style', 'color:red;');

                    $('#email-error').html(response.msg);
                    $('#email').val('');
                }
                if (response.status == 'success') {
                    $('#email-error').attr('style', 'color:green !important;');
                    $('#email-error').html(response.msg).show();

                }
            },

            dataType: 'json'
        });
        return email_invalid;
    }


    jQuery(document).ready(function ($) {
        jQuery.validator.addMethod('check_email_1', function (value, element, param) {
            return this.optional(element) || !checkEmailExistUser_1(value);
        });
    });


    function checkEmailExistUser_1(input) {
        var pageurl = '<?= HTTP_ROOT; ?>';
        var lookup = {'email': input};
        //var img = pageurl + 'img/loader2.gif';
        var email_invalid = false;

        // $("#eloader").html("<img src='" + img + "' style='height: 18px;'>").show();
        $.ajax({
            type: 'POST',
            url: pageurl + 'users/ajaxCheckEmailAvail',
            data: JSON.stringify(lookup),

            success: function (response) {
                if (response.status == 'error') {

                    $('#email-error1').show();
                    $('#email-error1').attr('style', 'color:red;');
                    $('#email-error1').html(response.msg);
                    $('.eml').val('');

                }
                if (response.status == 'success') {

                    $('#email-error1').attr('style', 'color:green !important;');
                    $('#email-error1').html(response.msg).show();

                }
            },

            dataType: 'json'
        });
        return email_invalid;
    }

</script>  

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
    $("#last-para2").bind("click", (function () {
        alert("Button 2 is clicked!");
        $("#button1").trigger("click");
    }));
</script>


<div id="id03" class="modal">
    <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'registeruserwise', 'class' => "modal-content"]); ?>
    <span onclick="document.getElementById('id03').style.display = 'none'" class="close" title="Close Modal">&times;</span>
    <div class="row">
        <div class="col-md-12">
            <div class="sign-up-page">
                <h1>New to Drape Fit</h1>                  
                <p class="last-para">Already have an Account ? <a href="javascript:void(0);" onclick="document.getElementById('id01').style.display = 'block';
                        document.getElementById('id03').style.display = 'none';
                        document.getElementById('id02').style.display = 'none';
                        $('#userformlogin')[0].reset();"> Sign In </a> here.</p>
            </div>
            <div class="sign-up-form">
                <input type="text" placeholder="First Name" name="fname" required>
                <input type="text" placeholder="Last Name" name="lname" required>
                <input type="text" placeholder="Enter Email" name="email" class="eml" required>
                <label id="email-error1" class="error" for="email"></label>
                <input type="hidden" name="gender" value="<?= @$action; ?>" required>
                <div class="show-password">
                    <input  id='cngPwd1' type="password" placeholder="Enter Password" name="pwd" required>
                    <span id="cngPwd" onclick="cngPwd()">show</span>
                </div>
            </div>

            <div class="clearfix"><button type="submit"  class="signupbtn">Sign Up</button></div>
            <!--<div class="sign-up-page">
             <a class="facebook" href="#">Log in with Facebook</a>
             <a class="google" href="#">Log in with Google</a>                  
           </div>-->
        </div>
    </div>
    <?= $this->Form->end(); ?>        
</div>
<script type="text/javascript">
    function cngPwd() {
        var x = document.getElementById("cngPwd1");
        if (x.type === "password") {
            $('#cngPwd').html('hide');
            x.type = "text";
        } else {
            $('#cngPwd').html('show');
            x.type = "password";
        }
    }
</script>
<script>
    $("#registeruserwise").validate({
        submitHandler: function () {
            $('#loaderPyament').show();
            var formData = $('#registeruserwise').serialize();
            $.post('<?= HTTP_ROOT; ?>' + 'users/registration', formData, function (response) {
                if (response.status == "Account Created") {
                    //$('#loaderPyament').hide();
                    //document.getElementById('id03').style.display = 'none';
                    //location.reload(true);
                    window.location.href = response.url;
                } else {
                    $('#loaderPyament').hide();
                    document.getElementById('id03').style.display = 'block';
                }

            }, 'json');
            return false;

        },
        rules: {
            fname: "required",
            lname: "required",
            pwd: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true,
                check_email_1: true
            },

        },
        messages: {
            fname: "Please enter your first name",
            lname: "Please enter your last name",
            pwd: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                required: "Please enter your email address",
                check_email_1: "An account already exists with this email address. Please choose an alternative email."
            },
        },
    });
</script>

<script>
    var modal = document.getElementById('id03');
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<div id="forgotPassword" class="modal">
    <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'forgotpassword_form', 'class' => "modal-content"]); ?>
    <span onclick="document.getElementById('forgotPassword').style.display = 'none'" class="close" id="closeforgotpass" title="Close Modal">&times;</span>
    <div class="row">
        <div class="col-md-12">
            <div class="sign-up-page" id='sign-up-page1'>
                <h1>Forget Password </h1>                 
            </div>
            <div class="sign-up-form">
                <div class="col-sm-12 alert alert-danger" id="login_error" style="display: none;"></div>
                <input type="text" placeholder="Enter Email" name="email" required id="forgot_email">  
                <span id="email-error"></span>
            </div>
            <div class="clearfix"><button type="submit" class="signupbtn" id="for_submit">Submit</button></div>
            <div class="clearfix"><button type="submit" style="display: none" class="signupbtn" id="for_submitOk">Ok</button></div>
        </div>
    </div>
    <?= $this->Form->end(); ?>
</div>
<div id="loaderPyament" style="display: none; position: fixed; height: 100%; width: 100%; z-index: 11111111; padding-top: 20%; background: rgba(255, 255, 255, 0.7); top: 0; text-align: center;">
    <img src="<?php echo HTTP_ROOT . 'img/' ?>widget_loader.gif"/>
</div>
<script>
    $("#forgotpassword_form").validate({
        submitHandler: function () {

            $('#loaderPyament').show();
            var formData = $('#forgotpassword_form').serialize();

            $.post('<?= HTTP_ROOT; ?>' + '/users/ajaxforget', formData, function (response) {
                if (response.status == "successs") {
                    $('#email-error').html('');
                    $('#loaderPyament').hide();
                    $('#forgot_email').hide();
                    $('#forgot_email').val('');
                    $('#forgot_email').hide();
                    $('#for_submit').hide();
                    $('#for_submitOk').show();

                    $('#sign-up-page1').append('<div class="alert alert-success" id="forgot-success-msg" style="display:block">' + response.msg + '</div>');


                    document.getElementById('forgotPassword').style.display = 'none';
                    document.getElementById('forgot-success-msg').style.display = 'block';
                    //location.reload(true);


                }

                if (response.status == 'error') {
                    $('#email-error').attr('style', 'color:red;');
                    $('#email-error').html(response.msg).show();

                    $('#loaderPyament').hide();
                    setTimeout(function () {
                        $('#email-error').html('').show();
                        $('#forgot_email').val('');

                    }, 5000);


                } else {



                    document.getElementById('forgotPassword').style.display = 'block';
                }

            }, 'json');
            return false;

        },
        rules: {
            email: {
                required: true,
                email: true,
                check_email_for_forgot: true
            },

        },
        messages: {
            email: {
                required: "Please enter your email address",
                check_email_for_forgot: "An account already exists with this email address. Please choose an alternative email."
            },
        },
    });

    jQuery(document).ready(function ($) {
        jQuery.validator.addMethod('check_email_for_forgot', function (value, element, param) {
            return this.optional(element) || !check_email_for_forgot(value);
        });
    });


    function check_email_for_forgot(input) {
        var pageurl = '<?= HTTP_ROOT; ?>';
        var lookup = {'email': input};

        //var img = pageurl + 'img/loader2.gif';
        var email_invalid = false;

        // $("#eloader").html("<img src='" + img + "' style='height: 18px;'>").show();
        $.ajax({
            type: 'POST',
            url: pageurl + 'users/ajaxCheckEmailAvail',
            data: JSON.stringify(lookup),

            success: function (response) {
                if (response.status == 'error') {
                    email_invalid = true;
                }
                if (response.status == 'success') {
                    $('#forgot_email-error').attr('style', 'color:red;');
                    $('#forgot_email-error').show();
                    $('#forgot_email-error').html('This email is not associated with our site. Register here.');
                    email_invalid = false;

                }
            },

            dataType: 'json'
        });
        return email_invalid;
    }
    $('#for_submitOk').click(function () {
        //document.getElementById('loaderPyament').style.display = 'none';
        $('#forgotPassword').hide();
        $('#loaderPyament').hide();
        $('#forgotPassword').trigger("reset");
        $('#forgot-success-msg').remove();
        $('#loaderPyament').hide();
        $('#forgot_email').show();
        $('#forgot_email').val('');
        $('#forgot_email').show();
        $('#for_submit').show();
        $('#for_submitOk').hide();

        return false;


    });
</script>
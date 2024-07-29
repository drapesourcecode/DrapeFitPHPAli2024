<?= $this->Flash->render() ?>
<section class="men-banner">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <div class="men-banner-text">
                    <h2>STYLE FIT FOR MEN</h2>
                    <!-- <p>Get quality clothing customized to your style size and buget-delivered, offering sizes XS-3XL, 28-48 wait & inseams 28-36".</p> -->
                    <?php if ($this->request->session()->read('Auth.User.id') == '') { ?>
                        <a href="javascript:void(0);" onclick="document.getElementById('id03').style.display = 'block'">GET STARTED</a>
                    <?php } else { ?>
                        <a href="<?php echo HTTP_ROOT . 'calendar-sechedule' ?>">GET STARTED</a>
                    <?php } ?>

                </div>
            </div>
        </div>  
    </div>
</section>

<section class="working">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <h2>HOW IT WORKS</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="how-it-works">
                    <div class="image-style"></div>              
                    <h4>1.Fill out the quiz</h4>
                    <p>Take our quiz to tell us about your shape and style.Your  Personal Stylist will connect with you.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="how-it-works">
                    <div class="image-style1"></div>
                    <h4>2.We deliver the goods</h4>
                    <p>Your personal stylist will start putting together the perfect Fit  box of looks.For just $1 your stylist-picked items get delivered to your door. Try everything on in the comfort of your home!</p>
                </div>
            </div>


            <div class="col-md-3">
                <div class="how-it-works">
                    <div class="image-style2"></div>
                    <h4>3.Keep what you love</h4>
                    <p>Take 5 days to FIT,Choose and think and connect your personal stylist with questions you have.Try  before buy . Keep what you love.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="how-it-works">
                    <div class="image-style3"></div>
                    <h4>4.Easy Return</h4>
                    <p>Send back the what you don’t like or doesn’t FIT.Shipping is free both the ways.Prepaid return envelope included.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="mens-fit">
    <div class="container"> 

        <div class="row">

            <div class="col-md-6">
                <div class="mens-fit-image">
                    <img src="<?= $this->Url->image('Men1.jpg'); ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mens-fit-text">
                    <h2>WHAT A FIT FOR MEN</h2>
                    <ul>
                        <li>
                            Get a new look every month! Discover latest fashion brands. Risk Free!
                        </li>

                        <li>
                            Expert Stylists with better styling advice.
                        </li>

                        <li>
                            Take our quiz to tell us about your age , size  and budget . Your personal stylist will start putting together the perfect  Fit box of looks.
                        </li>

                        <li>
                            Delivered right to your door, you can try on each item conveniently at home. Keep only what you want.
                        </li>

                        <li>
                            Shipping is free both ways.Pick your delivery date. You have 5 days to buy or return.After 5 days, you are only charged for what you keep.
                        </li>
                        <li>
                            Receive a box monthly or quarterly.Choose your frequency. Skip or Cancel anytime.
                        </li>
                    </ul>
                </div>
            </div> 

        </div>
    </div>
</section>

<section class="brand">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-heading">
                    <h2>Brands are Ready for you</h2>
                    <p>We are working with many brands.According to your selection we will ship a complete FIT box that will FIT under your budget.</p>
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="brand-image">
                    <ul>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>penguin.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>nike.png" alt="">
                            </div>
                        </li>

                        <li>
                            <div class="big-images">
                                <img src="<?= HTTP_ROOT . MAN ?>scotch.png" alt="">
                            </div>
                        </li>

                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>gap.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>pata.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="big-images">
                                <img src="<?= HTTP_ROOT . MAN ?>tommy.png" alt="">
                            </div>
                        </li>

                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>boss.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>vineyard.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>vans.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>hurley.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>brooks.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>zara.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>levis.png" alt=""
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>armour.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>bonobos.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>landsend.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>jcrew.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>oldnavy.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>uniqlo.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>northface.png" alt="">
                            </div>
                        </li>
                        <!-- <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>h&m.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>eagle.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>ragnbone.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>bensharma.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="small-images">
                                <img src="<?= HTTP_ROOT . MAN ?>express.png" alt="">
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if ($this->request->session()->read('Auth.User.id') == '') { ?>
    <script>
        $(document).ready(function () {
            $('#email-error_women').hide();
        });
    </script>
    <section class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">          
                    <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'menuserformsignup', 'class' => "men-sign-up-section", 'url' => ['action' => 'userregistration']]); ?>
                    <div class="sign-up-page">
                        <h1>New to Drape Fit</h1>                  
                        <p class="last-para">Already have an Account ? <a href="#" onclick="document.getElementById('id01').style.display = 'block'"> Sign In </a> here.</p>
                    </div>
                    <div class="sign-up-form">
                        <input type="text" autocomplete="off" placeholder="First Name" name="fname" required='required'>
                        <input type="text"  autocomplete="off" placeholder="Last Name" name="lname" required>
                        <input type="text"  autocomplete="off" placeholder="Enter Email" name="email" class="eml" required>
                        <label id="email-error_women" class="error" for="email"></label>
                        <input type="hidden"  name="gender" value="men" required>
                        <div class="show-password">
                            <input type="password" autocomplete="off" placeholder="Enter Password" name="pwd" required id="men4">
                            <span id="men4psw" onclick="men4psw()">show</span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function men4psw()
                        {
                            var x = document.getElementById("men4");
                            if (x.type === "password")
                            {
                                x.type = "text";
                                $('#men4psw').html('hide');
                            } else
                            {
                                x.type = "password";
                                $('#men4psw').html('show');
                            }
                        }
                    </script>
                    <div class="clearfix"><button type="submit" class="signupbtn">Sign Up</button></div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>    
        </div>
    </section>
<?php } ?>
<script>
    function menFromSubmit() {
        $('#loaderPyament').show();
        return true;
    }
</script>

<script>
    $("#menuserformsignup").validate({
        submitHandler: function () {
            menFromSubmit();
            return true;
        },
        rules: {
            fname: "required",
            lname: "required",
            password: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true,
                check_email_women: true,
            },
        },
        messages: {
            fname: "Please enter your first name",
            lname: "Please enter your last name",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                required: "Please enter your email address",
                check_email_women: "An account already exists with this email address. Please choose an alternative email.",
            },
        },
    });
    
    jQuery(document).ready(function ($) {
            jQuery.validator.addMethod('check_email_women', function (value, element, param) {
                return this.optional(element) || !checkEmailExistUser_women(value);
            });
        });


        function checkEmailExistUser_women(input) {
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

                        $('#email-error_women').show();
                        $('#email-error_women').attr('style', 'color:red;');
                        $('#email-error_women').html(response.msg);
                        $('.eml').val('');

                    }
                    if (response.status == 'success') {

                        $('#email-error_women').attr('style', 'color:green !important;');
                        $('#email-error_women').html(response.msg).show();

                    }
                },

                dataType: 'json'
            });
            return email_invalid;
        }
    
</script>

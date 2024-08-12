<?= $this->Flash->render() ?>
<script>
    $("#last-para2").bind("click", (function ()
    {
        alert("Button 2 is clicked!");
        $("#button1").trigger("click");
    }));
</script>
<style>
.style-box h4 {
    font-family: 'HVDFontsBrandonTextRegular';
    text-align:center;
}
</style>
<section class="inner-banner">
        <img src="<?= $this->Url->image('banner-women5.jpg'); ?>" alt="Best Jeans For Women USA">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <!--<h1><a href="<?= HTTP_ROOT; ?>women/maternity" >Women's skinny Jeans Fit</a></h1>-->
                    <h1>Women’s Jeans</h1>
                    <?php if ($this->request->session()->read('Auth.User.id') == '') { ?>
                        <a class="button" href="javascript:void(0);" onclick="document.getElementById('id03').style.display = 'block'">GET STARTED</a>
                    <?php } else { ?>
                        <a class="button" href="<?php echo HTTP_ROOT . 'calendar-sechedule' ?>">GET STARTED</a>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="how-it-work life-style">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="it-work-top">
                        <div class="section-head" data-aos="fade-down">
                            <h2 style="font-size: 34px;"><span>YOUR NEW</span> JEANS COLLECTION <span>STARTS TODAY</span></h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
                    <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Looking for the perfect jeans? Look no further. Your stylist will hand-select each pair to suit your size and shape. We find the ideal jeans for your style and budget from a wide range of brands. Complete your look with carefully chosen accessories, curated by our stylists.</p>
                            </div>
                        </div>
                    </div>
                        <div class="text-center pb-40 mt-5">
                            <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display = 'block'" class="sign-up-btn">Take your style quiz</a><br>
                            <span>
                            <a href="javascript:void(0)" class="sign-up-member">Already have an account?</a>
                            <a href="javascript:void(0)" class="sign-in" onclick="document.getElementById('id01').style.display = 'block'">Sign in</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="work-process-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>HOW IT</span> WORKS</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/jeans-women1.jpg" alt="Skinny Jeans For Women USA">
                    </div>
                    <h4><span>1</span><br>Fill Out The Quiz</h4>
                    <p>Take our quiz to tell us about your style, size and budget preferences. Your stylist will connect with you.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg">
                    </div>
                    <h4><span>2</span><br>Your FIT Box Arrives</h4>
                    <p>Your personal stylist will curate and send your FIT Box with a $20 stylist fee. Try on in the comfort of your home!</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/jeans-women3.jpg" alt="Skinny Jeans Monthly Subscription Boxes">
                    </div>
                    <h4><span>3</span><br>Keep What You Love</h4>
                    <p>Take 5 days to try on and connect with your personal stylist with questions. Keep and pay for what you want.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg">
                    </div>
                    <h4><span>4</span><br>Return the Rest</h4>
                    <p>Send back the items you don’t want with the prepaid return envelope included in your FIT Box.</p>
                </div>
            </div>
    </div>
</section>
<section class="drafit-cont-img-box men-fit">
        <div class="drafit-cont-left content-righr-boxggg">
            <div class="conten-box" data-aos="zoom-in">
                <h2>WOMEN’S JEANS: THE PERFECT STYLE AND FIT</h2>
                <ul>
                        <li>
                            Leave the guesswork out of finding that perfect denim fit with Drape Fit.

                        </li>
                        

                        <li>
                           Start by taking our quiz. Our expert stylists will carefully select the perfect pair of jeans for your Fit Box that suit you best from a variety of styles and brands, including boyfriend, flared, skinny and straight. 

                        </li>

                        <li>
                           Shipping is free both ways and you pick your delivery date. You have 5 days to buy or return and are only charged for what you keep. Try on in the convenience of your home.

                        </li>

                        <li>
                           We have several subscription plans to choose from. You can skip or cancel at anytime.

                        </li>
                        <li>
                        <a href="<?= HTTP_ROOT; ?>help-center/find-your-size">See available sizes »</a>
                        </li>
                    </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in" style="height: 653px;">
            <img src="<?= $this->Url->image('jeans-women5.jpg'); ?>" alt="Best Jeans Subscription Boxes for Women USA">
        </div>
    </section>

<section class="ready-to-started -mt-25 style-box">
    <div class="container">
        <!--<div class="row">-->
        <!--    <div class="col-sm-12 col-lg-12 col-md-12">-->
        <!--        <div class="section-head" data-aos="fade-down">-->
        <!--            <h2><span>SHOP THE CURATED</span> PIECES ONLINE</h2>-->
        <!--            <img src="<?= $this->Url->image('header-booten.png'); ?>">-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="row">-->
        <!--    <div class="col-sm-12">-->
        <!--        <div class="ready-to-started-box">-->
        <!--        <p>After shopping your Fit box items, we'll curate shoppable outFits build around them. You can buy pieces outside of your Fit box, with free shipping and no hidden fees. Wear the perfect curated jeans for women in your constrained budget with Drape Fit.</p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>WHY YOU’LL</span> LOVE DRAPE FIT</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ready-to-started-box">
                <!--<p>We're experts at hand-selecting the best jeans for women from exclusive brands for you.</p>-->
                <h4><b>Our Focus on Women’s Jeans</b></h4>
                <p>We know that jeans are at the center of creating a desired look and can design an entire FIT Box around them.</p>
                <h4><b>We Keep Your Budget in Mind</b></h4>
                <!--<p>Get hand-selected skinny jeans for women USA at prices you set for your lifestyle. Your $20 Drape Fit styling fee covers your expert stylist time and expertise when styling begins that gets credited toward anything you decide to buy or keep.</p>-->
                <p>We hand-selected jeans based on your price preferences, without sacrificing quality or style.</p>
                <h4><b>Our Brands and Styles</b></h4>
                <p>From skinny to boyfriend to straight, we’ve got you covered.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="brand">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
            <div class="section-head aos-init aos-animate" data-aos="fade-down">
                    <h2><span>BEST BRANDS FOR THE</span> BEST FIT</h2>
                    <p>We’ll fill your FIT Box with the brands that match your preferences and budget.</p>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
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
<section class="more-data">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head">
                    <h2>THE SEARCH IS OVER: BUILD YOUR BEST COLLECTION OF JEANS WITH DRAPE FIT</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>At Drape Fit, we believe that the perfect pair of jeans is a woman's true best friend. They are at the center of any outfit, and you feel feel at your best when your jeans are on point. Let our professional stylists find the jeans that suit you, your style and wallet best, along with complimentary accessories for a complete FIT Box look.</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>Jeans for Every Body Shape</h4>
                    <p>Work with your stylist for jeans that accentuate and camouflage what you want, depending on your body type and style goals. We’ll curate low, mid or high-rise styles, boot, skinny and straight cuts and more to deliver jeans that flatter your body type best. Drape Fit offers size options that are stylish and comfortable for all. </p>
                    <h4>Why Choose Drape Fit's Clothing Subscription Boxes?</h4>
                    <p>Stay on top of fashion trends with Drape Fit. We want to make the personal styling experience accessible to all with affordable subscription boxes. Try before you buy from the convenience of your own home to ensure the perfect fit. Shipping is free and returns and exchanges are hassle-free with our prepaid envelope included in your FIT Box. </p>
                    <h4>Discover Your Perfect Fit</h4>
                    <p>With hundreds of brands and styles, our stylists curate the best fits for you. Our commitment to inclusive sizing and fashion-forward designs sets us apart. Our goal is to provide you with stylish options that accentuate your body type and showcase your unique personality.</p>
<!--                    <h4>Stay Comfortable and Feel Confident in Fit and Style That Suits All Sizes </h4>-->
<!--                    <p>Now, you can style as you please in our size-neutral clothing options. We present to you stylish and comfortable silhouettes that accentuate your body, no matter what size; that is what Drape Fit’s personal styling for plus size women is all about. The technical knowledge of our stylists and their years of experience combined with our lovely clientele’s feedback is what helps us define ourselves better. We continuously and rigorously evolve and uplift our outfit patterns based on your body structures and measurements. In fact, we are improving our offerings and optimizing fits for all as you read this. Not just that, we ensure that you feel included. We do the research so you can fall in love with your curves all over again!</p>-->
<!--                    <h4>Drape Fit’s Story</h4>-->
<!--                    <p>In our nascent stage, we began with a small number of 60 brands. As we grew, we joined hands with more and more brands that resonate with our vision and can curate the best for you. Today, we have an increasing count of 130+ brands that our stylists choose from to give you the best fits and an experience in personal styling for plus size women. You can pick and choose your fit as per your size from our varied range of sizes, starting from 14W and going up to 24W and from 1X to 3X.</p>-->
<!--                    <h4>It's All About the Fit Plus Size Women Exclaim</h4>-->
<!--                    <p>Fortunately, a growing number of brands are finally taking action to address the issue of the lack of fashion-forward options for plus sizes. We embrace inclusive sizing, design, and fashionable, trend-forward pieces. When you are plus size, it's possible to find stylish details that hug your gorgeous curves if you know what cuts and silhouettes to look for. Keep scrolling for the complete guide to everything you need to know, from all the top plus size brands to breaking sizing conventions and expert styling tips for plus size outfits. As with any body shape, knowing your body type is probably the most critical consideration in creating flattering outfits. Take our trained experts’ help in finding your body shape and type.<br><br>Going out and shopping for your sizes might get a little confusing as brands create their own sizing measures. But at Drape Fit, we have dug deeper to do some research for you and laid out diverse size ranges that are made for plus sizing.</p>-->
<!--                    <h4>Why Drape Fit?</h4>-->
<!--                    <p>Stay on top of every trend with our plus size apparel line that accentuates not just your curves but your entire personality. Our diversity is not just in size but also in fashion trends. Like a clothing piece, you see? Don’t worry. We have got it in your size.<br><br>-->
<!--Moreover, our personal stylist can even suggest to you similar pieces and how you can style them best with accessories and shoes. Our stylists also curate articles especially for you as per your liking. Now, be one with your beauty because real beauty has no size.-->
<!--</p>-->
                </div>
                <a href="javascript:void(0)" class="readmore">Read more</a>
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
<div class="new-register">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>READY TO TRY</span> DRAPE FIT<span>?</span> </h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-7 col-md-7">
            <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'womenuserformsignup', 'class' => "men-sign-up-section", 'url' => ['action' => 'userregistration']]); ?>
                    <div class="sign-up-page">                
                        <p class="last-para">Already have an Account? <a href="#" onclick="document.getElementById('id01').style.display = 'block'"> Sign In </a> here.</p>
                    </div>
                    <div class="sign-up-form">
                        <input type="text" placeholder="First Name" name="fname" required>
                        <input type="text" placeholder="Last Name" name="lname" required>
                        <input type="text" placeholder="Enter Email" name="email"  class="eml"  required>
                        <label id="email-error_women" class="error" for="email"></label>
                        <input type="hidden"  name="gender" value="women" required>
                        <div class="show-password">
                            <input type="password" placeholder="Enter Password" name="pwd" required id="women4">
                            <span id="women4psw" onclick="women4psw()">show</span>
                        </div>
                    </div>
                   <script type="text/javascript">
                        function women4psw()
                        {
                            var x = document.getElementById("women4");
                            if (x.type === "password")
                            {
                                x.type = "text";
                                $('#women4psw').html('hide');
                            } else
                            {
                                x.type = "password";
                                $('#women4psw').html('show');
                            }
                        }
                    </script>
                    <div class="clearfix"><button type="submit" class="signupbtn">Sign Up</button></div>
                    <?= $this->Form->end(); ?>
               
            </div>
            <div class="col-sm-12 col-lg-5 col-md-5">
                <img src="<?= $this->Url->image('man1.png'); ?>">
            </div>
        </div>
    </div>
</div>
    <script>
        function menFromSubmit() {
            $('#loaderPyament').show();
            return true;
        }
    </script>
    <script>
                jQuery(document).ready(function ($) {
            jQuery.validator.addMethod('lettersonly', function(value, element) {
                return this.optional(element) || /^[a-z .,'` áãâäàéêëèíîïìóõôöòúûüùçñ]+$/i.test(value);
            }, "Letters and spaces only please");
        });
        $("#womenuserformsignup").validate({
            submitHandler: function () {
                menFromSubmit();
                return true;
            },
            rules: {
               fname: {
                        required:true,
                        lettersonly:true,
                        maxlength:40
                    },
                lname: {
                        required:true,
                        lettersonly:true,
                        maxlength:40
                    },
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
                fname: {
                    required: "Please enter your first name",               
                },
                lname: {
                    required:"Please enter your last name",                
                },
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
                        //$('.eml').val('');

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
    <script type="text/javascript">
    $('.readmore').click(function() {
  $('.more-text').slideToggle();
  if ($('.readmore').text() == "Read more") {
    $(this).text("Read less")
  } else {
    $(this).text("Read more")
  }
});
</script>
<?php } ?>
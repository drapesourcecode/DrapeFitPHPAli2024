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
        <img src="<?= $this->Url->image('banner-women5.jpg'); ?>">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1><a href="<?= HTTP_ROOT; ?>women/maternity" >Women's skinny Jeans Fit</a></h1>
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
                            <h2 style="font-size: 34px;"><span>GET THE LATEST PERSONALIZED </span> TRENDY COLLECTION OF JEANS</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
                    <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Are you looking for the best jeans for women in the USA? Cool! We at Drape Fit hand-select every piece that perfectly suits your size and shape. Our expert stylists select the perfect pair of jeans for women from the vast choices of brands. Flaunt your style statement with skinny jeans that very well Fits your body type and size. Proclaim your jeans style with matching and perfect accessories that are hand-selected by the expert stylist.</p>
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
                    <h2><span>HOW IT</span>WORKS</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefittest.com/images/jeans-women1.jpg">
                    </div>
                    <h4><span>1</span><br>Fill out the quiz</h4>
                    <p>Start your styling by sharing your size and shape with our Drape FIT Stylists.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg">
                    </div>
                    <h4><span>2</span><br>Get A FIT Box</h4>
                    <p>Get ready for your FIT Box, which meets your styling needs and preferences in addition to the expert detailing.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefittest.com/images/jeans-women3.jpg">
                    </div>
                    <h4><span>3</span><br>Keep what you love</h4>
                    <p>Try before you buy. You can only keep the things you admire and return the rest.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg">
                    </div>
                    <h4><span>4</span><br>Easy Return</h4>
                    <p>Shipping and returns are always free.</p>
                </div>
            </div>
    </div>
</section>
<section class="drafit-cont-img-box men-fit">
        <div class="drafit-cont-left content-righr-boxggg">
            <div class="conten-box" data-aos="zoom-in">
                <h2>A style for the Women Jeans Fit</h2>
                <ul>
                        <li>
                            To get the complete look, it is essential to wear the best fitted  jeans, suiting your size and shape. Thus, leave the guesswork out of your wardrobe in finding that perfect denim fit for you with Drape FIT.
                        </li>
                        <li>
                            We carry Women’s size <a href="<?= HTTP_ROOT; ?>help-center/find-your-size">See our full women's sizes »</a>
                        </li>

                        <li>
                            The Drape FIT Stylists know precisely which fabric and brand will meet your jeans fit. The experts will assess your details to find a pair of jeans to suit you the best.
                        </li>

                        <li>
                           The professional Stylists will select the perfect pair of women jeans from the huge list of jean types such as boyfriend jeans, flared jeans, skinny jeans, straight fit jeans, and more.
                        </li>

                        <li>
                           Flaunt your style statement with the <a href="<?= HTTP_ROOT; ?>women/women-jeans">ideal pair of jeans Fit matching</a> your body type and size. It is crucial to wear the perfect jeans to be comfortable all day long.
                        </li>

                        <li>
                          The Drape FIT Stylists will choose the best pair of jeans from the leading brands within your budget 
                        </li>
                        <li>
                          Set your own time or date for receiving the delivery of the FIT Box.
                        </li>
                        <li>
                          Gift yourself the comfort of the best Outfit with Free Shipping and Returns. Return envelope included.
                        </li>
                    </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in" style="height: 653px;">
            <img src="<?= $this->Url->image('jeans-women5.jpg'); ?>">
        </div>
    </section>

<section class="ready-to-started -mt-25 style-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>SHOP THE CURATED</span> PIECES ONLINE</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ready-to-started-box">
                <p>After shopping your Fit box items, we'll curate shoppable outFits build around them. You can buy pieces outside of your Fit box, with free shipping and no hidden fees. Wear the perfect curated jeans for women in your constrained budget with Drape Fit.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>WHY YOU'LL LOVE TO</span> CHOOSE DRAPE FIT</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ready-to-started-box">
                <p>We're experts at hand-selecting the best jeans for women from exclusive brands for you.</p>
                <h4><b>Our focus on best jeans for women</b></h4>
                <p>We send best-fitting jeans that perfectly match your size, shape and lifestyle.</p>
                <h4><b>Our price your wallet fall in love</b></h4>
                <!--<p>Get hand-selected skinny jeans for women USA at prices you set for your lifestyle. Your $20 Drape Fit styling fee covers your expert stylist time and expertise when styling begins that gets credited toward anything you decide to buy or keep.</p>-->
                <p>Get hand-selected skinny jeans for women USA at prices you set for your lifestyle. Your $20 Drape Fit Styling Fees covers your expert stylist time and expertise to get a perfect and unique Fit Box at your doorstep.</p>
                <h4><b>Buy curated pieces online at DRAPE FIT</b></h4>
                <p>After purchasing the best jeans for women in the USA, we'll curate shoppable outfits built around them. With no styling and shipping fee, you can buy pieces outside of your FIT box.</p>
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
                    <h2><span>BRANDS ARE </span> READY FOR YOU </h2>
                    <p>We are working with many brands. According to your selection we will ship a complete FIT Box that will FIT under your budget.</p>
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
                    <h2>The Trendiest and Best Jeans for Women USA</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Whoever said diamonds are a girl’s best friend obviously never had the perfect pair of jeans. We at Drapefit think that denim is the ideal partner for a woman – it’s tough, stylish, and always looks great. Not to forget that the right pair of jeans can elevate almost any look apart from lifting your spirits and improving your appearance. With that in mind, the experts and professional stylists can put together the perfect denim guide for you that can help you find the fit(s) that feels tailored, especially for you. Just find your body shape and know your perfect fit.</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>Perfect Fits as Per Body Shapes and Types</h4>
                    <p>If you possess an hourglass body shape, opt for a high-rise pair of jeans to accentuate your waist. If you have weight in your belly, look for high-rise jeans. They can help create a waistline and make your torso look longer. Wearing full-length inseams will add height to your frame, especially when paired with high-heeled shoes. If you have a triangle body shape, the best way to go is with a mid-rise pair of jeans that hits at or above your waist. Super-skinny denim can make your figure look more triangular. Instead, try straights, boot cuts, flares, and other silhouettes that leave room for breathing at the bottom. If you have a rectangular body shape, there are a few ways to create a curvy look- accentuate your waist with a high rise, a belt, or by simply giving your shirt a quick tuck. Beyond that, most cuts of jeans will look good on you. They can be straight-leg, skinny, or bootcut, and they can be wide-leg if you prefer that style.</p>
                    <h4>Drapefit’s Goals for You</h4>
                    <p>With numerous stylish female jeans types for women, Drapefit is driven toward empowering every personality with its clothing subscription boxes and determined & experienced stylists. No matter what your style, fit, or pricing choices are, our stylist will handpick or customize fashionable apparel for you, be it skinny jeans for women USA or other jeans types for women's. Our stylists are well-aware of the current fashion trends and also of what will flatter your body type best. And among the various jeans types for women's, they will suggest the one that will be your perfect companion for years to come. So tell our stylist what you want or trust their experience to tell you if you are a skinny jean person or a bootcut fit one. </p>
                    <h4>Why Clothing Subscription Boxes for Women from Drapefit?</h4>
                    <p>Be sure to stay on top of the current fashion trends with Drapefit’s clothing boxes. Stylists at Drapefit are professionally trained to determine your size and recommend pairs that will fit you best. We have an endless selection of styles for you to choose from, from boyfriend styles to trendy cuts. Plus, you can try them on before you buy them to make sure they're the right fit. In addition, the prepaid envelope for returns and exchanges makes it super easy to get your purchase back or a new one. Not just that, you can try all the clothing pieces from the comfort of your home and return what you don’t like through our prepaid envelopes.</p>
                    <h4>Stay Comfortable and Feel Confident in Fit and Style That Suits All Sizes </h4>
                    <p>Now, you can style as you please in our size-neutral clothing options. We present to you stylish and comfortable silhouettes that accentuate your body, no matter what size; that is what Drapefit’s personal styling for plus size women is all about. The technical knowledge of our stylists and their years of experience combined with our lovely clientele’s feedback is what helps us define ourselves better. We continuously and rigorously evolve and uplift our outfit patterns based on your body structures and measurements. In fact, we are improving our offerings and optimizing fits for all as you read this. Not just that, we ensure that you feel included. We do the research so you can fall in love with your curves all over again!</p>
                    <h4>Drapefit’s Story</h4>
                    <p>In our nascent stage, we began with a small number of 60 brands. As we grew, we joined hands with more and more brands that resonate with our vision and can curate the best for you. Today, we have an increasing count of 130+ brands that our stylists choose from to give you the best fits and an experience in personal styling for plus size women. You can pick and choose your fit as per your size from our varied range of sizes, starting from 14W and going up to 24W and from 1X to 3X.</p>
                    <h4>It's All About the Fit Plus Size Women Exclaim</h4>
                    <p>Fortunately, a growing number of brands are finally taking action to address the issue of the lack of fashion-forward options for plus sizes. We embrace inclusive sizing, design, and fashionable, trend-forward pieces. When you are plus size, it's possible to find stylish details that hug your gorgeous curves if you know what cuts and silhouettes to look for. Keep scrolling for the complete guide to everything you need to know, from all the top plus size brands to breaking sizing conventions and expert styling tips for plus size outfits. As with any body shape, knowing your body type is probably the most critical consideration in creating flattering outfits. Take our trained experts’ help in finding your body shape and type.<br><br>Going out and shopping for your sizes might get a little confusing as brands create their own sizing measures. But at Drapefit, we have dug deeper to do some research for you and laid out diverse size ranges that are made for plus sizing.</p>
                    <h4>Why Drapefit?</h4>
                    <p>Stay on top of every trend with our plus size apparel line that accentuates not just your curves but your entire personality. Our diversity is not just in size but also in fashion trends. Like a clothing piece, you see? Don’t worry. We have got it in your size.<br><br>
Moreover, our personal stylist can even suggest to you similar pieces and how you can style them best with accessories and shoes. Our stylists also curate articles especially for you as per your liking. Now, be one with your beauty because real beauty has no size.
</p>
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
                    <h2><span>New to </span> Drape Fit </h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-7 col-md-7">
            <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'womenuserformsignup', 'class' => "men-sign-up-section", 'url' => ['action' => 'userregistration']]); ?>
                    <div class="sign-up-page">                
                        <p class="last-para">Already have an Account ? <a href="#" onclick="document.getElementById('id01').style.display = 'block'"> Sign In </a> here.</p>
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
        $("#womenuserformsignup").validate({
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
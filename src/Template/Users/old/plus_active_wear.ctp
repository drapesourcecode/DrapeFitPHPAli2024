<?= $this->Flash->render() ?>
<script>
    $("#last-para2").bind("click", (function ()
    {
        alert("Button 2 is clicked!");
        $("#button1").trigger("click");
    }));
</script>
<section class="inner-banner">
        <img src="<?= $this->Url->image('banner-women8.jpg'); ?>" alt="Women'S Plus Size Activewear Monthly Subscription Boxes">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1 style="font-size:36px;"><a href="<?= HTTP_ROOT; ?>women">Personalized Women's Plus Size Activewear</a></h1>
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
                            <h2><span>Personalized women's plus size </span> activewear style for you</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Tell us about your exclusive style, size and price range. Let our expert stylist find what you love by hand choosing plus size & athleisure that works for your unique shape and busy lifestyle. Our stylist hand-select plus size activewear & athleisure styles from our popular and exclusive brands – perfectly fits your shape. You can buy a FIT box once or set up automatic deliveries.</p>
                            </div>
                        </div>
                    </div>
                        <div class="text-center pb-40 mt-5">
                            <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display = 'block'" class="sign-up-btn">Take your style quiz</a>
                            <br>
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
                        <img src="https://www.drapefit.com/images/Men1.jpg">
                    </div>
                    <h4><span>1</span><br>Fill out the quiz</h4>
                    <p>Fill up the style form by sharing your size, shape, and style with our expert stylist.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg">
                    </div>
                    <h4><span>2</span><br>Get the FIT Box</h4>
                    <p>Get ready for your plus size activewear FIT Box that fulfils your styling needs and preferences in addition to the expert detailing.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men3.jpg">
                    </div>
                    <h4><span>3</span><br>Keep what you love</h4>
                    <p>Try, choose and connect with your personal stylist with a question you have. Take 5 days and keep what you love and return the rest to us with the free shipping policy.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg">
                    </div>
                    <h4><span>4</span><br>Easy return</h4>
                    <p>Send us back the pieces that don't fit or match you. Shipping is free both the ways.</p>
                </div>
            </div>
    </div>
</section>

<section class="fabulous-ways-to">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>Two ways to find   </span> your FIT style</h2>
                    <img src="/img/header-booten.png">
                </div>
            </div>
        </div>
    </div>
    <div class="find-left-right-box">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="find-left" data-aos="zoom-in">
                        <span class="src-components">First</span>
                    <h3 class="src-component">Get pieces hand-selected by our expert stylists</h3>
                    <!--<p class="src-compone">Great styles have no size limit. We know what you love and try on pieces at home when a women’s plus size gym wear subscription box knocks on your door. Keep your favorites and send back the rest to us. A $20 Drape Fit styling fee covers your stylist, and it gets credited toward anything you keep.</p>-->
                    <p class="src-compone">Great styles have no size limit. We know what you love and try on pieces at home when a women’s plus size gym wear subscription box knocks on your door. Keep your favorites and send back the rest to us. A $20 Drape Fit styling fee covers your stylist.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="find-left find-right" data-aos="zoom-in">
                        <span class="src-components">Then</span>
                    <h3 class="src-component">On the instant buy pieces curated for you</h3>
                    <p class="src-compone">Skip hours of browsing and discover plus size pieces curated just for your look and style. After receiving your plus size fitness subscription box, instantly keep what you want and when you want it to feel your best.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="drafit-cont-img-box men-fit">
        <div class="drafit-cont-left content-righr-boxggg">
            <div class="conten-box" data-aos="zoom-in">
                <h2>All you need to know – our plus size activewear</h2>
                <ul>
                    <li>Our expert stylist discovers the right activewear and athleisure styles from our popular brands in sizes up to 24W and 3X to fit your shape. Here are a few FAQs.</li>
                    <li><h3>What are the perfect plus size workout top features?</h3></li>
                    <li>The best plus size workout tops are made with moisture-wicking fabrics and feature high-low hemlines for extra coverage. With added fabric and stitching reinforcement plus size running tops are comfortable for bustline support.</li>
                    <li><h3>What should I look for in a plus size workout pants?</h3></li>
                    <li>A perfect plus size workout pants are much smoother and feature high rise for extra comfort and coverage. The piece should be breathable and made with quick-dry fabrics. The movement-friendly stretch plus size workout pants with pockets are added features.</li>
                </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in">
             <img src="<?= $this->Url->image('plus-activewear-last.jpg'); ?>" alt="Women'S Plus Size Activewear Monthly Subscription Boxes">
        </div>
    </section>
<section class="brand">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
               <div class="col-sm-12">
                <div class="section-head aos-init aos-animate" data-aos="fade-down">
                    <h2><span>BRANDS ARE </span> READY FOR YOU </h2>
                    <p>We are working with many brands.According to your selection we will ship a complete FIT Box that will FIT under your budget.</p>
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
                    <h2>Subscribe to A Box of Fitness with Women's Plus Size Activewear Style Box</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p style="padding: 0;">Get going with your fitness regime in style. If you have been planning to start a fitness regime but haven’t been able to, this is your sign. Begin your first step to an effective fitness routine by investing in high-quality and fashionable activewear through our Women's Fitness Subscription Box. Whether you are an indoor-exercise person or an outdoor one, we have got something for everyone. Be it rain or shine, investing in the proper workout attire will help you stay true to your fitness regime. </p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>What Does Drapefit’s Women's Fitness Subscription Box Contain?</h4>
                    <p>Our fitness subscription boxes compile various gears for a complete fitness outfit- from sports bras to t-shirts to shorts and even layers such as windbreakers. And all these resilient to weathers of all kinds. So, be prepared wherever you are and don’t stop the hustle. The various options of fabrics include breathable, moisture-wicking fabrics, anti-micro bacterial, odor-free fabrics, and even UV-protective materials. These highly-technical fabrics ensure that you stay comfortable when you are on the move.</p>
                    <h4>What Activities Do Drapefit Provide Activewear Boxes for?</h4>
                    <p>Be it running, or hiking, or even indoor gym workout, with Drapefit’s Women's Plus Size Activewear Style Box, you can conquer any workout or training, and that too, without compromising on your style.<br><br>Our boxes are curated by expert stylists who help you stay on top of all activewear fashion trends. Our size-neutral clothing pieces promote diversity and inclusivity. Say a design, a pattern, or a color, and we have it for you. Our focus is on premium pieces that are built to support your workout, are also durable, and last longer than the four seasons. The fabrics allow you to move seamlessly, so nothing can stop you from reaching the immeasurable heights that you are meant to achieve.The excitement doesn’t end here. These pieces are also multi-purpose. So whether you are planning to catch a quick coffee break before your workout or just staying in to lounge around the house, these activewear pieces can even be styled for those occasions. <br><br>If you are one adventure-loving soul, we have got you there as well. So, subscribe to our activewear box and move on to your next adventure in style. Whether you are into water sports or ariel adventures, our technical fitness clothing will help you emerge victorious no matter what you take up to accomplish.</p>
                    <h4>Is Drapefit Size-Inclusive?</h4>
                    <p>Our stylists focus on your body type and measurements to suggest what will help you stay at optimum comfort while flattering your body features. Don’t let your workout get boring. With our Women's Fitness Subscription Box, get ready to slay while you progress towards fitness. </p>
                    <h4>How Does Drapefit Determine What Will Suit You Best?</h4>
                    <p>Our stylists focus on your body type and measurements to suggest what will help you stay at optimum comfort while flattering your body features. Don’t let your workout get boring. With our Women's Fitness Subscription Box, get ready to slay while you progress towards fitness. </p>
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
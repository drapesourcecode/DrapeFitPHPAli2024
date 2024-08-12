<?= $this->Flash->render() ?>
    <section class="inner-banner">
        <img src="<?= $this->Url->image('banner-men1.jpg'); ?>">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1><a href="<?= HTTP_ROOT; ?>men" style="color: #ff6c00;">Big and Tall Outfits Subscription Boxes</a></h1>
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
                            <h2><span>MEN'S BIG AND</span> TALL CLOTHING</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Looking for big and tall styles? Just tell us about your Fit, style, and ideal price range. With our big and tall outfits, you'll get the right pieces that very well suits your personality. Our expert stylist will hand-pick every piece just right for your build and price range from the big and tall style box.</p>
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
                        <img src="https://www.drapefit.com/images/Men1.jpg">
                    </div>
                    <h4><span>1</span><br>Fill out the quiz</h4>
                    <p>Take our quiz to tell us about your shape and style. Your Personal Stylist will connect with you.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg">
                    </div>
                    <h4><span>2</span><br>Get a FIT Box</h4>
                    <p>Receive a FIT Box in accordance with your big size and length to meet your styling needs. Our experts will handpick the perfect outfits for you to send you the perfect FIT Box.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men3.jpg">
                    </div>
                    <h4><span>3</span><br>Keep what you love</h4>
                    <p>Simply try on everything from home and only pay for what you keep and return what you don’t.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg">
                    </div>
                    <h4><span>4</span><br>Easy Return</h4>
                    <p>Drape Fit offers a flexible return and exchange policy . It’s Free Shipping , Return & Exchanges.</p>
                </div>
            </div>
    </div>
</section>

<section class="drafit-cont-img-box men-fit">
        <div class="drafit-cont-left content-righr-boxggg">
            <div class="conten-box" data-aos="zoom-in">
                <h2>A style for the Big and Tall Fit</h2>
                <ul>
                        <li>
                           Drape Fit stylist know how difficult it is to get the best fitting, especially if you are a big and tall sized man. But don't worry now as our expert Stylists  will personally select the outfits meeting your big and tall size. 
                        </li>

                        <li>
                            We carry Men’s sizes XS-3XL, 28-48-inch waists, 28-36-inch inseams, and shirts and blazers in tall sizes.
                        </li>
                        <a href="<?= HTTP_ROOT; ?>help-center/find-your-size">See our full men's sizes »</a>
                        <li>
                            With Drape Fit, you don't have to compromise on your styling due to your tall size. You will receive the perfect outfit in accordance to your style, shape and budget.
                        </li>

                        <li>
                            With the perfect attire, you can be more confident in your own self. Our experienced stylist will provide you the overall look as they also handpick the matching accessories that go well with your perfect Fit.
                        </li>

                        <li>
                            You can try out the different looks more confidently with our professional  Stylists as they advise or picks the best for you.
                        </li>
                        <li>
                            Save your money on alterations, save your energy on finding the Perfect Fit for your big and tall size with our Drape Fit Stylists.
                        </li>
                        <li>
                            Wear your best  FIT as per the season and occasions.
                        </li>
                        <li>You can even select your own shipping date and time for your FIT Box to reach.</li>
                    </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in" style="height: auto;">
            <img src="<?= $this->Url->image('big-tall-men5.jpg'); ?>">
        </div>
    </section>
<section class="ready-to-started -mt-25 style-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>Our big and tall </span> Clothing styles</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ready-to-started-box">
                <p>Whether you're looking for active, professional, or casual clothes, we have plenty of big and tall clothing styles available in extended sizes. At Drape Fit, we carry 28-36 inch inseam lengths, 28-48 inch waist sizes, and XS-3XL sizes, shirts, and blazers in tall sizes. You receive products in big and tall style box that fall with your build and the price range you set. Drape Fit offers 25% off on a big and tall style box if you keep everything.  </p>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="maternity-box fax-boxes" style="margin-bottom: 0;padding-bottom: 0;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="section-head" data-aos="fade-down">
                <h2>Faq</h2>
                <img src="/img/header-booten.png">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div aria-multiselectable="true" class="panel-group" id="accordion" role="tablist">
                        <div class="row">
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading active" id="headingOne" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseOne" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">What Men’s Sizes Do You Carry?</a></h4>
                            </div>
                            <div aria-labelledby="headingOne" class="panel-collapse collapse" id="collapseOne" role="tabpanel">
                                <div class="panel-body">
                                    <p>We carry sizes XL-4XL, 42-56-inch waists, and shirts and blazers in big and tall sizes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingTwo" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" role="button">What is the cost?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo" role="tabpanel">
                                <div class="panel-body">
                                    <p>We carry items from $20 and up and your Stylist will tailor your box to your budget. On your style profile, you can tell us exactly how much you want to spend. When you buy all items from a box, you get 25%  off the lowest priced item.</p>
                                </div>
                            </div>
                        </div>
    
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                 <div class="panel panel-default">
                            <div class="panel-heading" id="headingThree" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree" role="button">What Big & Tall Clothing Styles Do You Have?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree" role="tabpanel">
                                <div class="panel-body">
                                    <p>Whether you’re looking for casual, professional, active or dress clothes, we have hundreds of big and tall clothing styles available in extended sizes.</p>
    
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingfour" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefour" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefour" role="button">How is the billing policy? </a></h4>
                            </div>
    
                            <div aria-labelledby="collapsefour" class="panel-collapse collapse" id="collapsefour" role="tabpanel">
                                <div class="panel-body">
                                    <p>For your first box, a $20 styling fee will be charged as soon as you order . For each subsequently scheduled box, a $20 styling fee will be charged after your Stylist begins styling your FIT Box.</p>
                                </div>
                            </div>
                        </div>
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingfive" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefive" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefive" role="button">Can I make special requests?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingfive" class="panel-collapse collapse" id="collapsefive" role="tabpanel">
                                <div class="panel-body">
                                    <p>Once you have a DRAPE FIT  Stylist, you can contact them anytime by logging on to your account at https://www.drapefit.com/ or email them support@drpefit.com. Give your Stylist an idea of the type of style you are looking for rather than making specific item requests. This will give your Stylist a better understanding of your taste and preferences to help curate the best selection for you.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingsix" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsesix" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsesix" role="button">How long do I have to send back the items if I don't want to keep? </a></h4>
                            </div>
    
                            <div aria-labelledby="headingsix" class="panel-collapse collapse" id="collapsesix" role="tabpanel">
                                <div class="panel-body">
                                    <p>You have 5 days after you receive your box to send back returns in the mail. If the 5th day falls on a Sunday, please return by the following business day. If returns aren't postmarked by the 5th day, we'll assume you love your entire box and charge you for all the items in it. Don't worry, we'll send you email and text message reminders before we charge you. If you need a few extra days due to busy schedules, just ask your Stylist to extend your checkout date and they'll take care of you.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>
                    </div>
                        
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12 more-faq">
                    <a href="#" class="sign-up-btn">See More Faq</a>
                </div>
            </div> -->
        </div>
    </section>

<section class="brand">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
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
                    <h2>Try Subscription Clothing Box for Big and Tall Men</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>With Drapefit, dress up as per your height and size with the help of our styling experts. No matter what your sizes and preferences are, we find what fits you best. Finding the appropriate fit is essential for building a good and lasting relationship with your clothing. We understand that and so do our styling experts and your own personal stylists. Our expert stylists can help you build everything from an outfit to a complete closet, depending on your height and physique measurements. </p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>Understanding Your Body Shape and Its Type</h4>
                    <p>Stand before a mirror and get a good look at your body. It is shaped like a rectangle. If your shoulders have the same width as your hips, you have a rectangle-shaped body, and you probably also have a lot of muscle and density in your arms and legs. If your body is well proportioned with a broad chest and narrow waist, you most probably have an inverted triangle body type. A trapezoid is a four-sided shape with only one pair of parallel sides. You don't need to be a mathematician to find out if you have a trapezoid body shape. Your waist is narrower than your broad ribcage and shoulders. Thank goodness for you! Your body type is one of the most common and easiest ones to dress because you are naturally balanced. These are no Jedi mind tricks, just some simple technical styling facts.</p>
                    <h4>What to Choose as Per Your Size and Height Measurements?</h4>
                    <p>For instance, stretch fabrics can help to make clothes more comfortable to wear. Adding spandex to your sports jacket, denim & twill pants will help them retain their shape and provide better long-term fit and comfort. A blazer's structure can help to camouflage your middle section and add dimension to your look. And not to forget styling the blazer with the right elements here. Choosing pants with dark colors like a dark shade of jeans along with a polo shirt―or layering the blazer over a dress shirt with classic tan trousers will accentuate your physical features.</p>
                    <h4>How Does It Work with Drapefit’s Big Men's Clothing Subscription Box?</h4>
                    <p>To get the perfect fit, make sure the garment is neither too tight nor too loose. We can help you get it just right. We are excited to now offer sizing till 3XL, so you can be sure to get the apparel that fits just right and looks as good. So, get ready to fly by the seat of your clothes and try on a new silhouette. Take your style quiz, and if you want to see a few options, please let your style expert know. Then, try the clothing pieces on at home in your own comfort. <br><br>You don't have to pay anything in advance. In fact, you only pay for what you like right from your doorstep and only after trying. Simply select a price range, choose options that you wish to try, and we will send them to you in the subscription box. Do you need help finding the right size for your garment? Returns and exchanges are always our policy, so finding the perfect pair is easy. Return what you don’t like in a prepaid envelope sent by us, all-inclusive of returns and exchanges. Now, who wouldn’t want to give these Big Men's Clothing Subscription boxes a try! </p>
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
            <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'menuserformsignup', 'class' => "men-sign-up-section", 'url' => ['action' => 'userregistration']]); ?>
                    <div class="sign-up-page">             
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
            <div class="col-sm-12 col-lg-5 col-md-5">
                <img src="<?= $this->Url->image('man1.png'); ?>">
            </div>
        </div>
    </div>
</div>

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

<?= $this->Flash->render() ?>
<section class="inner-banner">
        <img src="<?= $this->Url->image('banner-kids.jpg'); ?>">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1><a href="<?= HTTP_ROOT; ?>kids">Kids Clothes Subscription Boxes</a></h1>
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
                            <h2><span>KIDS STYLE </span> MADE SIMPLE</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="kids-drapefit-p">Leave it on us, and we do the work when it comes to your kid's fashion. We have the latest hand-picked collection of best Fits for your toddlers, kids, and tweens. Choose from a wide variety of adorable styles and collections for your <h2 class="kids-drapefit-inline-heding">kid's clothing subscription box.</h2> We have a massive collection of styles for kids clothes boxes with pieces for every season and occasion.</div>
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
<section class="fabulous-ways-to" style="padding-bottom: 0;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-head" data-aos="fade-down">
                    <h2 style="margin: 0 0 20px 0;"><span>JUST-PERFECT </span> PRICING</h2>
                    <p>It's your freedom, and you'll be able to set your price range for each type of apparel in your Kid's fashion style profile. Your perfect piece starts at low as $10 – You can add it to your Kid's clothes subscription box.</p>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
    </div>
        <div class="find-left-right-box">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="find-left" data-aos="zoom-in">
                        <h3>Find the best FIT at every age</h3>
                        <p>We know that your kids grow quickly and we'll keep up along the way. At Drape Fit, we send the unique style and perfect sizes from 2T – 18 in the Kid's clothes Box.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="find-left find-right" data-aos="zoom-in">
                        <h3>Fabulous pieces for one-of-a kind kids</h3>
                        <div class="just-perfect-p">Every Drape Fit Box is full of pieces ideal for your Kid's personality. Buying latest <h2 class="just-perfect-inline-heding">Kids Clothes Subscription Box</h2> is fun, simple and time saver.</div>
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
                        <img src="https://www.drapefit.com/images/Kids1.jpg">
                    </div>
                    <h4><span>1</span><br>Fill out the quiz</h4>
                    <p>Take our quiz to tell us about your kid’s shape and style. Your Personal Stylist will connect with you and your kids.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg">
                    </div>
                    <h4><span>2</span><br>We deliver the goods</h4>
                    <p>Your kids personal stylist will start putting together the perfect FIT Box best suited for you. For just $10 your kids stylist-picked items get delivered to your door. Try everything on in the comfort of your home!</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Kids3.jpg">
                    </div>
                    <h4><span>3</span><br>Keep what you love</h4>
                    <p>Take 5 days to FIT, choose and think and connect your personal stylist with questions you have. Try before you buy. Keep what you love.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg">
                    </div>
                    <h4><span>4</span><br>Easy Return</h4>
                    <p>Send back what you don’t like or doesn’t FIT. Shipping is free both ways. Prepaid return envelope included.</p>
                </div>
            </div>
    </div>
</section>

<section class="drafit-cont-img-box men-fit">
        <div class="drafit-cont-left content-righr-boxggg">
            <div class="conten-box" data-aos="zoom-in">
                <h2>THE RIGHT CHOICE FOR KIDS</h2>
                <ul>
                    <li>Get a new look every month for your kids! Discover the latest fashion brands. Risk Free!</li>
                    <li>We carry Kid’s size <a href="<?= HTTP_ROOT; ?>help-center/find-your-size">See our full kid's sizes »</a></li>
                    <li>Expert Stylists with the best styling advice for kids.</li>
                    <li>Take our quiz to tell us about your kids age , size and budget . Your personal stylist will start putting together the perfect fit box suited for you.</li>
                    <li>Delivered right to your door, your kids can try on each item conveniently at home. Keep only what you or your kids want.</li>
                    <li>Shipping is free both ways. Pick your delivery date. You have 5 days to buy or return. After 5 days, you are only charged for what you keep for your kids.</li>
                    <li>Receive a FIT Box monthly or quarterly. Choose your frequency. Skip or Cancel anytime.</li>
                </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in">
            <img src="<?= $this->Url->image('Kids1.jpg'); ?>">
        </div>
    </section>
    
<section class="maternity-box fax-boxes">
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
                                <h4 class="panel-title"><a aria-controls="collapseOne" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">What sizes do you carry?</a></h4>
                            </div>
                            <div aria-labelledby="headingOne" class="panel-collapse collapse" id="collapseOne" role="tabpanel">
                                <div class="panel-body">
                                    <p>We currently offer kid’s size newborn - 4T and Boy & Girl 5-14.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingTwo" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" role="button">How much do items in my Kids FIT Box cost?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo" role="tabpanel">
                                <div class="panel-body">
                                    <p>We carry items from $20 and up and your Stylist will tailor your box to your budget. On your style profile, you can tell us exactly how much you want to spend. When you buy all items from a box, you get 25% off the lowest priced item.</p>
                                </div>
                            </div>
                        </div>
    
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                 <div class="panel panel-default">
                            <div class="panel-heading" id="headingThree" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree" role="button">How are my kid’s items chosen?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree" role="tabpanel">
                                <div class="panel-body">
                                    <p>First take your kid's style quiz and your kids stylist will analyze his/her profile as per kids age, size and budget. Stylist will handpicked and make a perfect style Fit Box for your kids. </p>
                                    <p>You can pin, screenshot and share what you love most for your kids from our social media platforms and share it with your kids Stylist. Add your Instagram or Facebook username to your style profile!</p>
                                    <p>Remember to follow us on Facebook, Instagram, Pinterest, and Twitter to get the latest styles and sneak peeks of what's new at DRAPE FIT.</p>
    
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingfour" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefour" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefour" role="button">How is the billing policy?</a></h4>
                            </div>
    
                            <div aria-labelledby="collapsefour" class="panel-collapse collapse" id="collapsefour" role="tabpanel">
                                <div class="panel-body">
                                    <p>For your first box, a $20 styling fees will be charged as soon as you order your kids Fit Box. For each subsequently scheduled box, a $20 styling fees will be charged after your Stylist begins styling your kids FIT Box.</p>
                                </div>
                            </div>
                        </div>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingfive" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefive" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefive" role="button">What types of items can I expect for my kids?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingfive" class="panel-collapse collapse" id="collapsefive" role="tabpanel">
                                <div class="panel-body">
                                    <p>We carry a variety of clothing and accessories to fit your kid’s style activities needs, body and lifestyle. We offer shirts, hoodies , jumpsuits ,overalls , sweater dresses, sweaters, pants, skirts, shorts, dresses, jackets, scarves and jewelry. Our selection is constantly changing to meet both your kid's needs and shifting fashion trends.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingsix" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsesix" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsesix" role="button">Can I make special requests? </a></h4>
                            </div>
    
                            <div aria-labelledby="headingsix" class="panel-collapse collapse" id="collapsesix" role="tabpanel">
                                <div class="panel-body">
                                    <p>Once your kids have a DRAPE FIT Stylist, you can contact them anytime by logging on to your account at https://www.drapefit.com/ or email them <a href="mailto:support@drapefit.com">support@drapefit.com</a>. Give your kid's Stylist an idea of the type of style you are looking for his/her rather than making specific item requests. This will give your kids Stylist a better understanding of your taste and preferences to help curate the best selection for your kids.</p>
    
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

 <!-- testimonial section added by suprakash 16-12-2020 -->
<div class="clearfix"></div>

<section class="full-section testimonial-kids testim" id="section-3">
   <div class="full-section-container">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="owl-carousel testimonials-slider style-2">
                  <div class="item">
                     <div class="text-box">
                        <div class="testimonial">
                            
                           <blockquote>
                               <span class="fa fa-star checked" style="color: orange;"></span>
                            <span class="fa fa-star checked" style="color: orange;"></span>
                            <span class="fa fa-star checked" style="color: orange;"></span>
                            <span class="fa fa-star checked" style="color: orange;"></span>
                            <span class="fa fa-star checked" style="color: orange;"></span>
                              <p class="pt-15">I love Drape Fit Kids monthly subscription box .They  send us really cute kids clothes. For a good price it’s personalized for your child. My girls love their clothes because were perfectly picked out for them.</p>
                           </blockquote>
                           <!--<img src="images/testimonials/image-8.jpg" alt="">-->
                           <h5>
                              - Sana R.
                              <!--<span>Clients</span>-->
                              <small>Miami, FL </small>
                           </h5>
                        </div>
                        <!-- testimonial -->
                     </div>
                     <!-- text-box -->
                  </div>
                  <!-- item -->
                  <div class="item">
                     <div class="text-box">
                        <div class="testimonial">
                           <blockquote>
                                <span class="fa fa-star checked" style="color: orange;"></span>
                            <span class="fa fa-star checked" style="color: orange;"></span>
                            <span class="fa fa-star checked" style="color: orange;"></span>
                            <span class="fa fa-star checked" style="color: orange;"></span>
                            <span class="fa fa-star checked" style="color: orange;"></span>
                              <p class="pt-15">We just received our 1st Drape Fit  Kid’s clothing Box for our 2 year old little girl. It came with a style suggestions , coloring pages ,a sheet of stickers crayons, & of course the 5 outfits. All clothes just perfect.</p>
                           </blockquote>
                           <!--<img src="images/testimonials/image-8.jpg" alt="">-->
                           <h5>
                              - Ann M.
                              <!--<span>Clients</span>-->
                              <small>Madison, WI </small> 
                           </h5>
                        </div>
                        <!-- testimonial -->
                     </div>
                     <!-- text-box -->
                  </div>
                  <!-- item -->
                  
                  
                  <!-- item -->
               </div>
               <!-- testimonials-slider -->
            </div>
            <!-- col -->
         </div>
         <!-- row -->
      </div>
      <!-- container -->
   </div>
   <!-- full-section-container -->
</section>
<!-- full-section -->


 <!-- end suprakash -->
 

<section class="brand">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section-head aos-init aos-animate" data-aos="fade-down">
                    <h2>Brands are Ready for you</h2>
                    <p>We are working with many brands.According to your selection we will ship a <a href="<?= HTTP_ROOT; ?>kids">complete FIT Box</a> that will FIT under your budget.</p>
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
           <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'kidsuserformsignup', 'class' => "men-sign-up-section", 'url' => ['action' => 'userregistration']]); ?> 
                    <div class="sign-up-page">                 
                        <p class="last-para">Already have an Account ? <a href="#" onclick="document.getElementById('id01').style.display = 'block'"> Sign In </a> here.</p>
                    </div>
                    <div class="sign-up-form">
                        <input type="text" placeholder="First Name" name="fname" required>
                        <input type="text" placeholder="Last Name" name="lname" required>
                        <input type="text" placeholder="Enter Email" name="email"  class="eml"  required>
                        <label id="email-error_women" class="error" for="email"></label>
                        <input type="hidden"  name="gender" value="<?= @$this->request->params['action']; ?>" required>
                        <div class="show-password">
                            <input type="password" placeholder="Enter Password" name="pwd" required id="kids3">
                            <span id='kids3psw' onclick="kids3psw()">show</span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function kids3psw()
                        {
                            var x = document.getElementById("kids3");
                            if (x.type === "password")
                            {
                                x.type = "text";
                                $('#kids3psw').html('hide');
                            } else
                            {
                                x.type = "password";
                                $('#kids3psw').html('show');
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

        $("#kidsuserformsignup").validate({
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
<?php } ?>
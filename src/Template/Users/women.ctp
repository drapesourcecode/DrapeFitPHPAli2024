<?= $this->Flash->render() ?>
<script>
    $("#last-para2").bind("click", (function ()
    {
        alert("Button 2 is clicked!");
        $("#button1").trigger("click");
    }));
</script>
<section class="inner-banner">
        <img src="<?= $this->Url->image('banner-women.jpg'); ?>" alt="Clothing Subscription for Women">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <!--<h1><a href="<?= HTTP_ROOT; ?>women">Monthly Subscription Boxes for Women</a></h1>-->
                    <h1>FIT Boxes for Women</h1>
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
                            <h2><span>UNLEASH</span> YOUR UNIQUE STYLE</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Unlock a world of fashion tailored to YOU with our women's clothing subscription boxes. Our styling experts dive into the latest collections to curate a selection of hand-picked pieces that fit your personal style. Say goodbye to endless browsing and let us do the searching for you. We deliver quality and affordable fashion directly to your doorstep.</p>
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
                        <img src="https://www.drapefit.com/images/Men3.jpg">
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
                <h2>PUT THE FUN BACK INTO SHOPPING</h2>
                <ul>
                    <li>Let us do the browsing for you. Update your wardrobe hassle-free.</li>
                    <li>First take our quiz, then your personal stylist will put together your FIT Box curated just for you.</li>
                    <li>No need to go to stores or spend countless hours online. Your FIT Box is delivered to your door so you can try on conveniently at home.</li>
                    <li>Shipping is free both ways and you pick your delivery date. You have 5 days to buy or return and are only charged for what you keep.</li>
                    <li>We have several subscription plans to choose from. You can skip or cancel at anytime.</li>
                    <li>We carry Women’s size <a href="<?= HTTP_ROOT; ?>women/plus-size">See our full women's sizes »</a></li>
                </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in">
            <img src="<?= $this->Url->image('Women5.jpg'); ?>" alt="Clothes Subscription Box Womens">
        </div>
    </section>
    
<!--    <section class="fabulous-ways-to" style="padding-bottom: 0;">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-sm-12">-->
<!--                <div class="section-head" data-aos="fade-down">-->
<!--                    <h2><span>Two ways to </span> find your FIT style</h2>-->
<!--                    <img src="/img/header-booten.png">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="find-left-right-box">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-sm-6">-->
<!--                    <div class="find-left" data-aos="zoom-in">-->
<!--                        <h3>Try on your expert stylist's picks at home, keep styles that you love.</h3>-->
<!--                        <p>Order women's clothing subscription boxes filled with hand-chosen pieces by our dedicated stylist perfectly matching your lifestyle. There is no shipping charge on any of the subscription boxes for women. </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-6">-->
<!--                    <div class="find-left find-right" data-aos="zoom-in">-->
<!--                        <h3>Instantly Buy Pieces Best Suited For You</h3>-->
<!--                        <p>Leap hours of browsing and discover pieces curated just for you. After receiving your first Drape Fit monthly boxes for women, right away keep what you want and when you want. Get women subscription boxes on-demand or schedule regular deliveries every month.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
    
    
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
                                <h4 class="panel-title"><a aria-controls="collapseOne" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">How much do items in my Drape Fit Box cost?</a></h4>
                            </div>
                            <div aria-labelledby="headingOne" class="panel-collapse collapse" id="collapseOne" role="tabpanel">
                                <div class="panel-body">
                                    <p>We carry items from $20 and up and your Stylist will tailor your box to your budget. On your style profile, you can tell us exactly how much you want to spend. When you buy all items from a box, you get 25% off the lowest priced item.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingTwo" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" role="button">What kinds of brands can I expect to see in my box? </a></h4>
                            </div>
    
                            <div aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo" role="tabpanel">
                                <div class="panel-body">
                                    <p>We work with numerous designer brands as well as up and coming designers. The merchandise mix is constantly growing and changing to provide the best selection to elevate your style. You may discover a new brand you love through your Stylist.</p>
                                </div>
                            </div>
                        </div>
    
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                 <div class="panel panel-default">
                            <div class="panel-heading" id="headingThree" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree" role="button">How long do I have to send back the items if I don't want to keep?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree" role="tabpanel">
                                <div class="panel-body">
                                    <p>You have 5 days after you receive your box to send back returns in the mail. If the 5th day falls on a Sunday, please return by the following business day. If returns aren't postmarked by the 5th day, we'll assume you love your entire box and charge you for all the items in it. Don't worry, we'll send you email and text message reminders before we charge you. If you need a few extra days due to busy schedules, just ask your Stylist to extend your checkout date and they'll take care of you.</p>
    
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingfour" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefour" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefour" role="button">What is the Difference between Drape Fit and Other subscription boxes?</a></h4>
                            </div>
    
                            <div aria-labelledby="collapsefour" class="panel-collapse collapse" id="collapsefour" role="tabpanel">
                                <div class="panel-body">
                                    <p>Drape Fit is most affordable women subscription box for any size and any age as per their need. If someone needs monthly  boxes for women, Drape Fit is best 1:1 styling service for them because it's provides perfect Fits and Free Exchange Fits as per needed.</p>
                                </div>
                            </div>
                        </div>
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingfive" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefive" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefive" role="button">Does Drape Fit offer active Fits boxes for women?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingfive" class="panel-collapse collapse" id="collapsefive" role="tabpanel">
                                <div class="panel-body">
                                    <p>Yes, we absolutely do. Drape Fit provides best affordable trendy Active Fits as per client’s style preferences. </p>
    
                                </div>
                            </div>
                        </div>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingsix" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsesix" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsesix" role="button">Why Drape Fit Women Subscription Box?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingsix" class="panel-collapse collapse" id="collapsesix" role="tabpanel">
                                <div class="panel-body">
                                    <p>Drape Fit offers most affordable monthly subscription boxes for women and plus size. Expert Stylist handpicked different trendy, casual, classic styles and send a perfect style subscription box near to your door steps.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>






                            	<div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingseven" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseseven" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseseven" role="button">How is the billing policy?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingseightn" class="panel-collapse collapse" id="collapseseven" role="tabpanel">
                                <div class="panel-body">
                                    <p>For your first box, a $20 styling fee will be charged as soon as you order. For each subsequently scheduled box, a $20 styling fee will be charged after your Stylist begins styling your FIT Box.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>


                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingeight" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseeight" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseeight" role="button">What sizes do you carry?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingeight" class="panel-collapse collapse" id="collapseeight" role="tabpanel">
                                <div class="panel-body">
                                    <p>We currently carry women's sizes 0-12, XS-XL and waist size 24-32.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>



                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingnine" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsenine" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsenine" role="button">Can I make special requests?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingnine" class="panel-collapse collapse" id="collapsenine" role="tabpanel">
                                <div class="panel-body">
                                    <p>Once you have a Drape Fit Stylist, you can contact them anytime by logging on to your account at https://www.drapefit.com/ or email them support@drpefit.com. Give your Stylist an idea of the type of style you are looking for rather than making specific item requests. This will give your Stylist a better understanding of your taste and preferences to help curate the best selection for you. </p>
    
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
<section class="more-data">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head">
                    <h2>DISCOVER YOUR STYLE WITH SUBSCRIPTION CLOTHING BOXES FOR WOMEN</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p style="padding: 0;">Fashion is ever-changing, but true style is timeless. At Drape Fit, we are dedicated to helping you find your unique style. Our expert personal stylists are here to assist you in curating a wardrobe that combines classic pieces with the latest fashion trends. Say goodbye to the time-consuming chore of shopping and let us make it fun and effortless for you. With Drape Fit, try a variety of clothing options tailored to your price range and style, all from the comfort of your own home. Leave the hassle to us as we deliver a box right to your doorstep. Simply provide a few details about your preferences and personality, and voila! You'll have perfectly curated outfits waiting for you.</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>Who is Drape Fit for?</h4>
                    <p>Drape Fit is for everyone, regardless of budget, body type or style. </p>
                    <h4>How Does Drape Fit Simplify Shopping?</h4>
                    <p>Shopping is no longer a task but a fun journey as you build your wardrobe with our FIT boxes. The Drape Fit subscription service includes expert stylists to help you discover your preferences, fit, and size. Say goodbye to endless browsing and hello to a stress-free shopping experience.</p>
                    <h4>What's Inside the Women’s FIT Box?</h4>
                    <p>You’ll find a curated selection of clothing items, including tops, skirts, pants, shorts, shirts, dresses, and more. Our boxes are designed to provide you with a complete look, complemented by the latest accessories such as hats, scarves, bags, and the trendiest women's shoe styles. You'll also receive outfit inspirations and dressing ideas, all curated by Drape Fit.</p>
                    <h4>How Can You Get Your FIT Subscription Box?</h4>
                    <p>Getting your hands on the perfect women's clothing subscription box is easy. Simply fill out the quiz, select your desired price range, choose the options you'd like to try, and we'll send them straight to your door. You only pay for what you keep. If something doesn't quite work for you, returns and shipping are free. Finding your signature look has never been more fun, simple and affordable!</p></div>
                <a href="javascript:void(0)" class="readmore">Read more</a>
            </div>
        </div>
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
                              <p class="pt-15">I’m happy I was chosen to try this  Drape Fit subscription service. The Drape Fit site was easy to use and gave great details about each piece. My stylist matched my choices with some additional pieces and they all worked well together.</p>
                           </blockquote>
                           <!--<img src="images/testimonials/image-8.jpg" alt="">-->
                           <h5>
                              - Amy P.
                              <!--<span>Clients</span>-->
                              <small>Cleveland, OH</small>
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
                              <p class="pt-15">Love it! I feel like I'm receiving a present every time my Drape Fit box comes because I don't know what pieces are in my Fit  box. l  love  my Fits that my stylist chose.I like this service because for once I am starting to look great!</p>
                           </blockquote>
                           <!--<img src="images/testimonials/image-8.jpg" alt="">-->
                           <h5>
                              - Christine R. 
                              <!--<span>Clients</span>-->
                              <small>Austin, TX </small>
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
               <div class="col-sm-12">
                <div class="section-head aos-init aos-animate" data-aos="fade-down">
                    <h2><span>BEST BRANDS FOR THE</span> BEST FIT </h2>
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
                    <h2><span>READY TO TRY</span> DRAPE FIT<span>?</span></h2>
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
                        <input type="text" autocomplete="off" placeholder="First Name" name="fname" required='required'>
                        <input type="text"  autocomplete="off" placeholder="Last Name" name="lname" required>
                        <input type="text"  autocomplete="off" placeholder="Enter Email" name="email" class="eml" required>
                        <label id="email-error_women" class="error" for="email"></label>
                        <input type="hidden"  name="gender" value="<?= @$this->request->params['action']; ?>" required>
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
                        maxlength:25
                    },
                lname: {
                        required:true,
                        lettersonly:true,
                        maxlength:25
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
                       // $('.eml').val('');

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
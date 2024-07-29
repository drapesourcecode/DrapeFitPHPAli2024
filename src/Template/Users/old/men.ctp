<?= $this->Flash->render() ?>
    <section class="inner-banner">
        <img src="<?= $this->Url->image('banner-men.jpg'); ?>">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1><a href="<?= HTTP_ROOT; ?>men">Men’s monthly box subscription</a></h1>
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
                            <h2><span>GET TRENDING LOOKS</span> FOR YOUR LIFESTYLE</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>We uncover the latest trendy clothes for you with pieces that enhance your style and personality. You can try on hand-chosen products at your home and buy what you want. Get a wardrobe that is unique to you with our subscription boxes for men. Our dedicated stylists discover the best-Fitting styles from top brands for the monthly boxes for men.</p>
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
                    <h2><span>HOW IT</span>WORKS</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men1.jpg" al"Boxes For Men">
                    </div>
                    <h4><span>1</span><br>Fill out the quiz</h4>
                    <p>Take our quiz to tell us about your shape and style. Your Personal Stylist will connect with you.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg" alt="HOW ITWORKS - Women’s Clothes Box">
                    </div>
                    <h4><span>2</span><br>We deliver the goods</h4>
                    <p>Your personal stylist will start putting together the perfect FIT Box suited for you for just $20 your stylist-picked items get delivered to your door. Try everything on in the comfort of your home!</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men3.jpg" alt="HOW ITWORKS - Women’s Clothes Box">
                    </div>
                    <h4><span>3</span><br>Keep what you love</h4>
                    <p>Take 5 days to Fit, Choose, Think and then connect with your personal stylist with any questions that you may have. Try before buy. Keep what you love.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg" alt="HOW ITWORKS - Women’s Clothes Box">
                    </div>
                    <h4><span>4</span><br>Easy Return</h4>
                    <p>Send back what you don’t like or doesn’t FIT. Shipping is free both the ways. Prepaid return envelope included.</p>
                </div>
            </div>
    </div>
</section>
<section class="drafit-cont-img-box men-fit">
        <div class="drafit-cont-left content-righr-boxggg">
            <div class="conten-box" data-aos="zoom-in">
                <h2>THE RIGHT CHOICE FOR MEN</h2>
                <ul>
                    <li>Get a new look every month! Discover latest fashion brands. Risk Free!</li>
                    <li>We carry Men’s size <a href="https://www.drapefit.com/help-center/find-your-size">See our full men's sizes »</a></li>
                    <li>Expert Stylists with the best styling advice.</li>
                    <li>Take our quiz to tell us about your age , size and budget . Your personal stylist will start putting together the perfect fit box suited for you.</li>
                    <li>Delivered right to your door, you can try on each item conveniently at home. Keep only what you want.</li>
                    <li>Shipping is free both ways. Pick your delivery date. You have 5 days to buy or return. After 5 days, you are only charged for what you keep.</li>
                    <li>Receive a box monthly or quarterly. Choose your frequency. Skip or Cancel anytime.</li>
                </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in">
            <img src="<?= $this->Url->image('Men1.jpg'); ?>" alt="HOW ITWORKS - Women’s Clothes Box">
        </div>
    </section>

    <section class="fabulous-ways-to" style="padding-bottom: 0;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>HOW WE CURATE </span> YOUR FIT BOX </h2>
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
                        <h3>Swipe your Style</h3>
                        <p>Our style quiz creates your unique fashion profile, which helps us understand your style needs and price range. We get to know your preferences through a style quiz, and our expert stylist in the USA will then curate your Men subscription box based on the info!</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="find-left find-right" data-aos="zoom-in">
                        <h3>Our Expert Stylist Curation</h3>
                        <p>The extraordinary designers and expert stylist curate each collection with great love and dedication. With the robust design sense and knowledge, we create the perfect combination for your style fit clothing for men.</p>
                    </div>
                </div>
            </div>
        </div>
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
                                		<h4 class="panel-title"><a aria-controls="collapseOne" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">How much do items in my  DRAPE FIT Box cost?</a></h4>
                           			</div>
                            		<div aria-labelledby="headingOne" class="panel-collapse collapse" id="collapseOne" role="tabpanel">
                                		<div class="panel-body">
                                    		<p>We carry items from $20 and up and your Stylist will tailor your box to your budget. On your style profile, you can tell us exactly how much you want to spend. When you buy all items from a box, you get 25%  off the lowest priced item.</p>
                                		</div>
                            		</div>
                        		</div>
                        		<div class="panel panel-default">
                            		<div class="panel-heading" id="headingTwo" role="tab">
                                		<h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" role="button">What kinds of brands can I expect to see in my box?</a></h4>
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
                                <h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree" role="button">How frequently client can get Drape Fit Box?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree" role="tabpanel">
                                <div class="panel-body">
                                    <p>Drape Fit offers personalized subscription boxes for men. Drape Fit is the most affordable monthly boxes for men. Clients can choose the frequency of their Fit Box as per their need. It is the best monthly men's box in the USA.</p>
    
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingfour" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefour" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefour" role="button">Why we need clothing subscription for men?</a></h4>
                            </div>
    
                            <div aria-labelledby="collapsefour" class="panel-collapse collapse" id="collapsefour" role="tabpanel">
                                <div class="panel-body">
                                    <p>Personalized Men's Subscription Box helps people to get perfect Fit for their work to workout styles. Client can save their time and money.</p>
                                </div>
                            </div>
                        </div>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingfive" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefive" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefive" role="button">What is the difference between Drape Fit and Other Subscription Boxes? </a></h4>
                            </div>
    
                            <div aria-labelledby="headingfive" class="panel-collapse collapse" id="collapsefive" role="tabpanel">
                                <div class="panel-body">
                                    <p>Drape Fit is the most affordable subscription Box with new styles and new looks. Stylists are handpicked new styles and provides 1:1 Free Styling consultation as per needed. Drape Fit provides Free Exchanges if needed.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingsix" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsesix" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsesix" role="button">How long do I have to send back the items if  I don't want to keep?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingsix" class="panel-collapse collapse" id="collapsesix" role="tabpanel">
                                <div class="panel-body">
                                    <p>You have 5 days after you receive your box to send back returns in the mail. If the 5th day falls on a Sunday, please return by the following business day. If returns aren't postmarked by the 5th day, we'll assume you love your entire box and charge you for all the items in it. Don't worry, we'll send you email and text message reminders before we charge you. If you need a few extra days due to busy schedules, just ask your Stylist to extend your checkout date and they’ll take care of it.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>


                              <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingseven" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseseven" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseseven" role="button">How is the billing policy?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingseven" class="panel-collapse collapse" id="collapseseven" role="tabpanel">
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
                                    <p>We currently offer men’s sizes  S, M, L , XL, XXL and waist size 28-34.</p>
    
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
                                    <p>Once you have a DRAPE FIT Stylist, you can contact them anytime by logging on to your account at https://www.drapefit.com/ or email them support@drpefit.com. Give your Stylist an idea of the type of style you are looking for rather than making specific item requests. This will give your Stylist a better understanding of your taste and preferences to help curate the best selection for you.
                                    </p>
    
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
                              <p class="pt-15">I really had an amazing experience with Drape Fit. I am more satisfied and fulfilled with Drape Fit's subscription boxed for men. My stylist was amazing, and he quickly read my style and picked out the clothes that very well suits me. No words to describe my happiness with Drape Fit." </p>
                           </blockquote>
                           <!--<img src="images/testimonials/image-8.jpg" alt="">-->
                            <h5>
                              - Dave R.
                              <!--<span>Clients</span>-->
                              <small>Detroit, MI</small>
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
                              <p class="pt-15">I liked what I got from Drape Fit Men and getting started with their personal styling service is pretty fast and easy . I think Drape Fit Men could be a great solution for guys who don’t like shopping, as long as Drape Fits with their sizing, budget and aesthetic.Love this service.</p>
                           </blockquote>
                           <!--<img src="images/testimonials/image-8.jpg" alt="">-->
                            <h5>
                              - Brian D.
                              <!--<span>Clients</span>-->
                              <small>Seattle, WA</small>
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
                    <h2>Curated Clothing Subscription Boxes for Men</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Drapefit’s clothing box subscription for men that fits your style is just what you need to instantly elevate even your basic everyday looks combined with little elements of fashion for a complete and elaborate outfit.</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>Back to Basics with Drapefit’s Clothing Subscription for Men</h4>
                    <p>There are two common feelings when you don't have anything to wear or when your closet is full. In fact, most people experience "wardrobe panic" about 36 times a year. But when you bring it back to basics and narrow things down to what you need, getting dressed becomes simple. Welcome to the capsule wardrobe, a concept coined by a London boutique owner in the 1970s. It's a well-polished collection of only the most essential, timeless clothing items, with a few additional pieces mixed in depending on the season. When creating your own capsule wardrobe, keep in mind a few tips. </p>
                    <h4>High-Quality Pieces Matter</h4>
                    <p>Quality is key when it comes to having a capsule wardrobe because you'll wear your items more often if they're of high quality. So, you'll want pieces that are well-made and will last for a while.</p>
                    <h4>Hues and Colors</h4>
                    <p>Select one or two primary colors that will work well together and can be used with many pieces. Neutral colors always look good. Once you have finalized your foundation colors, you can add a few complementary colors to keep your look feeling new.</p>
                    <h4>Fits and Proportions</h4>
                    <p>Clothing that fits properly makes you look and feel great. When you have clothing pieces that make you feel confident, you'll wear them all the time. That's why it's essential to consider both fit and texture, and proportions when selecting clothing. And Drapefit helps you in your quest by providing the best style fit clothing for men. Basic apparel is quintessential to creating a stylish wardrobe that stays evergreen despite what the season or the fashion trend is. But, to develop such a closet, you need great ideas. And who better for those ideas than someone who has expertise and years of professional experience in styling and creating drool-worthy fashionable looks. With Drapefit, you can opt for a professional's expert guidance and style tips, along with some amazingly fashionable clothing boxes for men. So let our personal stylists take over your wardrobe for a day and see the magic they create with some basic clothing pieces that stay as relevant around the year as are social media apps.</p>
                    <h4>Clothing Box for Men- What Does It Contain?</h4>
                    <p>You can also choose to order your box of monthly men's box USA that will contain clothing items from t-shirts to trousers to shorts, shirts, and whatnot. These boxes are curated to give you an overall complete look. So, the boxes also contain the latest and trending accessories such as caps/hats, scarves, socks, and much more. And how can we forget the ultimate game-changer of any attire! The latest men's shoe styles And not just that, you can also get outfit inspirations and dressing ideas along with the Men Subscription Box.</p>
                    <h4>Why Drapefit?</h4>
                    <p>Fashion enterprises and manufacturers are increasingly moving toward sourcing materials sustainably and creating products ethically. Moreover, they are observing high social and environmental standards in their manufacturing units. Therefore, we associate with such brands to provide you with Clothing Subscription For Men with products sourced from such brands and units.</p>
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

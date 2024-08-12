<?= $this->Flash->render() ?>
    <section class="inner-banner">
        <img src="<?= $this->Url->image('banner-men.jpg'); ?>" alt="Men Subscription Box">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1><a href="<?= HTTP_ROOT; ?>men">FIT Boxes for Men</a></h1>
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
                            <h2><span>GET THE LATEST TRENDS TO</span> FIT YOUR LIFESTYLE</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>We’ll find the latest trends with pieces that fit your style and personality. Try items selected just for you at your home and buy what you want. Build a wardrobe that is unique to you from exciting brands at affordable prices with our subscription boxes for men. </p>
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
                        <img src="https://www.drapefit.com/images/Men1.jpg" alt="Subscription Boxes For Men">
                    </div>
                    <h4><span>1</span><br>Fill Out The Quiz</h4>
                    <p>Take our quiz to tell us about your style, size and budget preferences. Your stylist will connect with you.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg" alt="HOW ITWORKS - Women’s Clothes Box">
                    </div>
                    <h4><span>2</span><br>Your FIT Box Arrives</h4>
                    <p>Your personal stylist will curate and send your FIT Box with a $20 stylist fee. Try on in the comfort of your home!</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men3.jpg" alt="HOW ITWORKS - Women’s Clothes Box">
                    </div>
                    <h4><span>3</span><br>Keep What You Love</h4>
                    <p>Take 5 days to try on and connect with your personal stylist with questions. Keep and pay for what you want.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg" alt="HOW ITWORKS - Women’s Clothes Box">
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
                <h2>A BETTER WAY TO SHOP</h2>
                <ul>
                    <li>Let us do the browsing for you. Update your wardrobe hassle-free.</li>
                    <li>Your personal stylist will put together your FIT Box curated just for you.</li>
                    <li>No need to go to stores or spend countless hours online. Your FIT Box is delivered to your door so you can try on conveniently at home.</li>
                    <li>Shipping is free both ways and you pick your delivery date. You have 5 days to buy or return and are only charged for what you keep.</li>
                    <li>We have several subscription plans to choose from. You can skip or cancel at anytime.</li>
                    <li><a href="https://www.drapefit.com/help-center/find-your-size">See Available sizes »</a></li>
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
                        <h3>Your Unique Style</h3>
                        <p>Our comprehensive style quiz creates a personalized fashion profile that allows us to understand your style and budget preferences. By sharing your individual tastes, we can curate a subscription box that aligns perfectly with your needs.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="find-left find-right" data-aos="zoom-in">
                        <h3>Our Expert Stylists</h3>
                        <p>Experience the magic of our expert stylists who pour their creativity and experience into curating each collection. With their design sense combined with your fashion profile, Drape Fit crafts the perfect combination of clothing that fits you, your style and your budget.</p>
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
                                		<h4 class="panel-title"><a aria-controls="collapseOne" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">How much do items in my  Drape Fit Box cost?</a></h4>
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
                                    <p>Once you have a Drape Fit Stylist, you can contact them anytime by logging on to your account at https://www.drapefit.com/ or email them support@drpefit.com. Give your Stylist an idea of the type of style you are looking for rather than making specific item requests. This will give your Stylist a better understanding of your taste and preferences to help curate the best selection for you.
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
                    <h2><span>BEST BRANDS FOR THE </span> BEST FIT </h2>
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
                    <h2>CLOTHING SUBSCRIPTION BOXES FOR MEN: ELEVATE YOUR STYLE WITH DRAPE FIT</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Discover Drape Fit's clothing box subscription for men, designed to elevate your everyday looks, hassle-free. Our curated apparel boxes offer options that perfectly match your unique style.</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>Back to Basics: Embrace the Capsule Wardrobe Concept</h4>
                    <p>Are you familiar with the feeling of having nothing to wear despite a closet full of clothes? We've all been there. That’s where the concept of the capsule wardrobe comes in. Simplify your wardrobe by focusing on essential, timeless pieces with a few seasonal additions. Say goodbye to wardrobe panic as you curate a collection of versatile items that effortlessly mix and match.</p>
                    <h4>Quality Matters: Invest in High-Quality Pieces</h4>
                    <p>When building a capsule wardrobe, prioritize quality. Investing in well-made, durable pieces ensures that you'll enjoy your wardrobe staples for years to come. </p>
                    <h4>Color Coordination: Choose Your Hues Wisely</h4>
                    <p>Select one or two primary colors that harmonize well together and can be easily paired with multiple pieces. Neutral colors are always a safe bet. Once you've established your foundation colors, you can incorporate a few complementary shades to keep your looks fresh and exciting.</p>
                    <h4>Perfect Fit and Proportions: Look and Feel Your Best</h4>
                    <p>Confidence starts with clothing that fits impeccably. Embrace pieces that flatter your body shape and consider texture and proportions when making your selections. At Drape Fit, we understand the importance of fit, which is why our stylists select clothing that allows you to always look your best. With their professional expertise, they'll provide expert guidance and fashion tips to help you create stunning looks. Let our stylists work their magic on your wardrobe, transforming basic pieces into fashionable ensembles that stand the test of time.</p>
                    <h4>What's Inside the Clothing Box for Men?</h4>
                    <p>Choose our monthly men's box and receive a curated selection of apparel ranging from t-shirts and trousers to shorts, shirts, and more. Our thoughtfully curated boxes also include accessories like caps/hats, scarves, socks, and the latest men's shoe styles. </p>
                    <h4>Why Choose Drape Fit?</h4>
                    <p>At Drape Fit, we prioritize sustainability and ethical practices in fashion. We partner with brands that adhere to high social and environmental standards, ensuring that the products in our subscription boxes are sourced responsibly.</p>
                    <p>Experience the Drape Fit difference and enjoy a curated wardrobe that combines style, quality, affordability and conscious fashion choices.</p>
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
                    <h2><span>READY TO TRY </span> DRAPE FIT<span>?</span> </h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-7 col-md-7">
            <?php echo $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'menuserformsignup', 'class' => "men-sign-up-section", 'url' => ['action' => 'userregistration']]); ?>
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

<?php } ?>
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
    $("#menuserformsignup").validate({
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

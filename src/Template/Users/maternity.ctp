<?= $this->Flash->render() ?>
<script>
    $("#last-para2").bind("click", (function ()
    {
        alert("Button 2 is clicked!");
        $("#button1").trigger("click");
    }));
</script>
<section class="inner-banner">
        <img src="<?= $this->Url->image('banner-women3.jpg'); ?>" alt="subscription maternity clothes">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <!--<h1><a href="<?= HTTP_ROOT; ?>women/maternity" >Personalized Maternity FIT</a></h1>-->
                    <h1>Maternity FIT Boxes</h1>
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
                            <h2><span>MATERNITY CLOTHING</span> JUST FOR YOU</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Looking for personalized maternity clothes? We can help! We offer hand-picked apparel from a variety of brands with the affordable maternity FIT Box. We'll send stylish maternity clothes to your doorstep to fit your unique style and size through each stage. Take the stress out of clothes shopping and look and feel great with maternity FIT boxes from Drape Fit.</p>
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
                        <img src="https://www.drapefit.com/images/maternity-women1.jpg" alt="stylish maternity clothing">
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
                        <img src="https://www.drapefit.com/images/maternity-women3.jpg" alt="stylish maternity clothes subscription">
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
                <h2 style="text-transform: uppercase;">SPECIAL FITS FOR A SPECIAL TIME</h2>
                <ul>
                        <li>
                            Your Drape Fit stylist will help you create your very own maternity look.
                        </li>
                        

                        <li>
                            Outfits are available for all trimesters as well as post-pregnancy. We keep comfort in mind, without sacrificing style.

                        </li>

                        <li>
                          Let us do the work so you can flaunt your baby bump in style. Selected items are delivered to your doorstep saving you time, money, and energy.

                        </li>

                        <li>
                          Shipping is free both ways and you pick your delivery date. You have 5 days to buy or return and are only charged for what you keep.
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
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in">
            <img src="<?= $this->Url->image('maternity-women5.jpg'); ?>" alt="maternity clothes subscription Boxes in USA">
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
                                <h4 class="panel-title"><a aria-controls="collapseOne" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">How to dress your bump During The First Trimester?</a></h4>
                            </div>
                            <div aria-labelledby="headingOne" class="panel-collapse collapse" id="collapseOne" role="tabpanel">
                                <div class="panel-body">
                                    <p>The first trimester is tricky when it comes to getting dressed.Here are 4 strategies to style your growing belly during the first trimester.</p>
<ul class="bullet">
    <li>DON'T WEAR TIGHT CLOTHES.</li>
    <li>HIGHLIGHT OTHER PARTS OF YOUR BODY.</li>
    <li>STAY COMFORTABLE.</li>
    <li>SHOW THE BUMP OFF!</li>
</ul>
<p><strong>Our Stylist can send non-maternity clothing that grows with you!</strong></p>

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingTwo" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" role="button">On Budget , How to get new styles During The Second Trimester?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo" role="tabpanel">
                                <div class="panel-body">
                                    <p>The main challenge during the second trimester , you feel like every few weeks </p>
<p>you’re a new size and don’t want to blow your budget on new clothes every month.</p>
<p><strong>What to do:</strong> Invest in a few items that will grow with you. Look for outfits  that have details like ruching, tie-backs, buttons or gathering at the sides, and wraps, which will let you adjust your clothing as your body grows and changes. What's more, they will let you flatteringly flaunt your bump, which usually pops out during this time.</p>
<p><strong>Our Stylist ’ll find some pregnancy style essentials that go with everything and you feel more comfy and classy!</strong></p>

                                </div>
                            </div>
                        </div>
    
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                 <div class="panel panel-default">
                            <div class="panel-heading" id="headingThree" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree" role="button">How to manage from work to weekend During All Trimesters?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree" role="tabpanel">
                                <div class="panel-body">
                                    <p>You need a few essential FITS that will go from work to weekend without sacrificing comfort.Embrace the wrap outfits. Or rather, let the wrap dress – in a sleek solid color or a color-blocked pattern – embrace your curves. You'll look perfectly pulled together for the office and be comfortable and stylish for running weekend errands. </p>
<p>As your bump gets bigger and higher, simply change where you place the tie, eventually making the frock into an Empire-waisted clothes, giving much-needed definition between bosom and belly.Another versatile outfit to choose: a pair of dark denim maternity boot-cut jeans with the stretchy fabric built right into the waistband.</p>
<p></p><strong>Our Stylist ‘ll choose some cuts and colors , that  will flatter you throughout the entire pregnancy and work for almost any work or social situation.</strong><p></p>
    
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingfour" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefour" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefour" role="button">How to dress your last leg of your pregnancy During Third Trimester ?</a></h4>
                            </div>
    
                           <div aria-labelledby="headingfour" class="panel-collapse collapse" id="collapsefour" role="tabpanel">
                                <div class="panel-body">
                                   <p>You feel huge and uncomfortable. So during the Last Trimester , <strong>Our Stylist always choose something very stylish and comfy </strong>like  an Empire-waisted maxi dress – an    ankle-length flowing knit dress that you can wear even after the baby has arrived. You can try some Pair a tunic in a comfy knit fabric over maternity leggings.</p>
    
                                </div>
                            </div>
                        </div>
                            </div>
                           


                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingfive" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefive" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefive" role="button">How to manage your Postpartum Body ?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingfive" class="panel-collapse collapse" id="collapsefive" role="tabpanel">
                                <div class="panel-body">
                                    <p>Once you give birth, that postpartum belly pooch is likely to linger and though it may not be as endearing, it's all good and completely normal! This beautiful body of yours just birthed your new little baby, and while things don't exactly feel as they once did, now is the time to celebrate it.</p>
<p><strong>Here our Stylist’s 5 style tips  that will help you dress your postpartum pooch in style and confidence -</strong></p>
<ul>
    <li>Wear Dark Colors.</li>
    <li>Wear Print.</li>
    <li>Keep Things Loose and Flowy.</li>
    <li>Embrace the mom jeans trend.</li>
    <li>Live in jumpsuits and dresses.</li>
</ul>
<p><strong>Our Stylists Will send all these comfy style Fits that are perfect for busy new moms.</strong></p>
    
                                </div>
                            </div>
                        </div>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingsix" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsesix" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsesix" role="button">How is the billing policy? </a></h4>
                            </div>
    
                            <div aria-labelledby="headingsix" class="panel-collapse collapse" id="collapsesix" role="tabpanel">
                                <div class="panel-body">
                                    <p>For your first box, a $20 styling fee will be charged as soon as you order. For each subsequently scheduled box, a $20 styling fee will be charged after your Stylist begins styling your FIT Box.</p>
    
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
                    <h2>BEST OF MOM-TO-BE STYLE WITH OUR MATERNITY SUBSCRIPTION CLOTHING BOXES</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Who said stylish maternity clothing is just for celebrities? If you're an expectant mom, the Drape Fit maternity clothing subscription box is curated to make you look and feel fabulous. Embrace comfort and style with hand-selected maternity pieces that will make you feel confident throughout your pregnancy journey. From flattering shirts and ultra-stretch bottoms to trendy layers, our maternity Fit Boxes have you covered for every occasion.</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>Drape Fit Maternity Subscription Box</h4>
                    <p>Our maternity clothes Fit Box is carefully curated to provide comfortable and fashionable options throughout your pregnancy. Whether it's the first, second, or last trimester, our clothing pieces will perfectly fit your growing bump. From dresses to versatile tops and bottoms, we make sure that pregnancy styling is a breeze!</p>
                    <h4>Perfect Fit for Every Stage</h4>
                    <p>Whether you’re a first-time mom or experienced pro, our subscription box adapts to your needs. We’ll keep you looking fashion-forward and chic throughout your pregnancy journey. After your little one arrives, our Fit Boxes will continue to provide you with post-pregnancy styles that are easy to wear and perfect for your busy new-mom lifestyle.</p>
                    <h4>What Makes Drape Fit Unique?</h4>
                    <p>At Drape Fit, we understand the financial challenges of having a baby. That's why our Fit Box offers hand-picked pieces by our stylists that won't break the bank. You'll get the best outfits with perfect fits, catering to each stage of your pregnancy for every occasion. Our stylists are dedicated to ensure you feel confident and comfortable in our selections.</p>
                    <h4>Convenience at Your Doorstep</h4>
                    <p>Enjoy the convenience of shopping from home with our subscription box. If there's anything you don't like, simply use our prepaid envelope to send it back within 5 days – no hassle, no worries.</p>
                    <h4>Style Beyond Pregnancy</h4>
                    <p>Our pieces are versatile and stylish even after your baby arrives. Join us today and become the confident and fashionable mom you are with our Fit Boxes for maternity and beyond.</p>
                </div>
                <a href="javascript:void(0)" class="readmore">Read more</a>
            </div>
        </div>
    </div>
</section>
<!--<section class="maternity-box">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--            <div class="col-md-12">-->
<!--            <div class="section-head aos-init aos-animate" data-aos="fade-down">-->
<!--                    <h2><span>Maternity</span> FAQ</h2>-->
<!--                    <img src="<?= $this->Url->image('header-booten.png'); ?>">-->
<!--                </div>             -->
<!--            </div>-->
<!--        </div>-->
<!--            <div class="row">-->
<!--                <div class="col-sm-12 col-lg-12 col-md-12">-->
<!--                    <div aria-multiselectable="true" class="panel-group" id="accordion" role="tablist">-->
<!--<div class="panel panel-default">-->
<!--<div class="panel-heading active" id="headingOne" role="tab">-->
<!--<h4 class="panel-title"><a aria-controls="collapseOne" aria-expanded="true" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">How to dress your bump During The First Trimester?</a></h4>-->
<!--</div>-->
<!--<div aria-labelledby="headingOne" class="panel-collapse collapse in" id="collapseOne" role="tabpanel">-->
<!--<div class="panel-body">-->
<!--    <p>The first trimester is tricky when it comes to getting dressed.Here are 4 strategies to style your growing belly during the first trimester.</p>-->
<!--<ul class="bullet">-->
<!--    <li>DON'T WEAR TIGHT CLOTHES.</li>-->
<!--    <li>HIGHLIGHT OTHER PARTS OF YOUR BODY.</li>-->
<!--    <li>STAY COMFORTABLE.</li>-->
<!--    <li>SHOW THE BUMP OFF!</li>-->
<!--</ul>-->
<!--<p><strong>Our Stylist can send non-maternity clothing that grows with you!</strong></p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="panel panel-default">-->
<!--<div class="panel-heading" id="headingTwo" role="tab">-->
<!--<h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" role="button">On Budget , How to get new styles During The Second Trimester? </a></h4>-->
<!--</div>-->

<!--<div aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo" role="tabpanel">-->
<!--<div class="panel-body">-->
<!--<p>The main challenge during the second trimester , you feel like every few weeks </p>-->
<!--<p>you’re a new size and don’t want to blow your budget on new clothes every month.</p>-->
<!--<p><strong>What to do:</strong> Invest in a few items that will grow with you. Look for outfits  that have details like ruching, tie-backs, buttons or gathering at the sides, and wraps, which will let you adjust your clothing as your body grows and changes. What's more, they will let you flatteringly flaunt your bump, which usually pops out during this time.</p>-->
<!--<p><strong>Our Stylist ’ll find some pregnancy style essentials that go with everything and you feel more comfy and classy!</strong></p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="panel panel-default">-->
<!--<div class="panel-heading" id="headingThree" role="tab">-->
<!--<h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree" role="button">How to manage from work to weekend During All Trimesters?</a></h4>-->
<!--</div>-->

<!--<div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree" role="tabpanel">-->
<!--<div class="panel-body">-->
<!--<p>You need a few essential FITS that will go from work to weekend without sacrificing comfort.Embrace the wrap outfits. Or rather, let the wrap dress – in a sleek solid color or a color-blocked pattern – embrace your curves. You'll look perfectly pulled together for the office and be comfortable and stylish for running weekend errands. </p>-->
<!--<p>As your bump gets bigger and higher, simply change where you place the tie, eventually making the frock into an Empire-waisted clothes, giving much-needed definition between bosom and belly.Another versatile outfit to choose: a pair of dark denim maternity boot-cut jeans with the stretchy fabric built right into the waistband.</p>-->
<!--<p></p><strong>Our Stylist ‘ll choose some cuts and colors , that  will flatter you throughout the entire pregnancy and work for almost any work or social situation.</strong></p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="panel panel-default">-->
<!--<div class="panel-heading" id="headingfour" role="tab">-->
<!--<h4 class="panel-title"><a aria-controls="collapsefour" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefour" role="button">How to dress your last leg of your pregnancy During Third Trimester ?</a></h4>-->
<!--</div>-->

<!--<div aria-labelledby="collapsefour" class="panel-collapse collapse" id="collapsefour" role="tabpanel">-->
<!--<div class="panel-body">-->
<!--<p>You feel huge and uncomfortable. So during the Last Trimester , <strong>Our Stylist always choose something very stylish and comfy </strong>like  an Empire-waisted maxi dress – an    ankle-length flowing knit dress that you can wear even after the baby has arrived. You can try some Pair a tunic in a comfy knit fabric over maternity leggings.</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="panel panel-default">-->
<!--<div class="panel-heading" id="headingfive" role="tab">-->
<!--<h4 class="panel-title"><a aria-controls="collapsefive" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefive" role="button">How to manage your Postpartum Body ?</a></h4>-->
<!--</div>-->

<!--<div aria-labelledby="collapsefive" class="panel-collapse collapse" id="collapsefive" role="tabpanel">-->
<!--<div class="panel-body">-->
<!--<p>Once you give birth, that postpartum belly pooch is likely to linger and though it may not be as endearing, it's all good and completely normal! This beautiful body of yours just birthed your new little baby, and while things don't exactly feel as they once did, now is the time to celebrate it.</p>-->
<!--<p><strong>Here our Stylist’s 5 style tips  that will help you dress your postpartum pooch in style and confidence -</strong></p>-->
<!--<ul>-->
<!--    <li>Wear Dark Colors.</li>-->
<!--    <li>Wear Print.</li>-->
<!--    <li>Keep Things Loose and Flowy.</li>-->
<!--    <li>Embrace the mom jeans trend.</li>-->
<!--    <li>Live in jumpsuits and dresses.</li>-->
<!--</ul>-->
<!--<p><strong>Our Stylists Will send all these comfy style Fits that are perfect for busy new moms.</strong></p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
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
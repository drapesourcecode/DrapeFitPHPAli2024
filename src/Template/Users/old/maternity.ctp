<?= $this->Flash->render() ?>
<script>
    $("#last-para2").bind("click", (function ()
    {
        alert("Button 2 is clicked!");
        $("#button1").trigger("click");
    }));
</script>
<section class="inner-banner">
        <img src="<?= $this->Url->image('banner-women3.jpg'); ?>">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1><a href="<?= HTTP_ROOT; ?>women/maternity" >Personalized Maternity FIT</a></h1>
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
                            <h2><span>PERFECT MATERNITY</span> CLOTHING FOR YOU</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Looking for personalized maternity clothing, then you are on the right spot. We offer hand-picked maternity clothes from various brands right for you in the affordable maternity clothes style box. We'll send stylish maternity clothes at your doorstep that fabulously Fits your unique style and size through every stage. For this exciting time in your life, we offer personalized maternity clothes style box keeping your one-of-a-kind style in mind.</p>
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
                        <img src="https://www.drapefittest.com/images/maternity-women1.jpg">
                    </div>
                    <h4><span>1</span><br>Fill out the quiz</h4>
                    <p>Share your size, pregnancy needs and budget with our stylist and fashionably enjoy your maternity unique style.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg">
                    </div>
                    <h4><span>2</span><br>Get A FIT Box</h4>
                    <p>Our Stylist selects hand picked best outfits to support your pregnancy style through every stage and send you a perfect FIT Box.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefittest.com/images/maternity-women3.jpg">
                    </div>
                    <h4><span>3</span><br>Keep what you love</h4>
                    <p>Don't worry; keep what you love and return the rest.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg">
                    </div>
                    <h4><span>4</span><br>Easy Return</h4>
                    <p>Our customer-friendly policy offers free Shipping to and from. Return the FIT Box in easy steps.</p>
                </div>
            </div>
    </div>
</section>

<section class="drafit-cont-img-box men-fit">
        <div class="drafit-cont-left content-righr-boxggg">
            <div class="conten-box" data-aos="zoom-in">
                <h2 style="text-transform: uppercase;">What a Fit for Maternity period</h2>
                <ul>
                        <li>
                            Drape Fit Stylist helps you to create personal styled outfits for moms to be.
                        </li>
                        <li>
                            We carry all women’s sizes <a href="<?= HTTP_ROOT; ?>help-center/find-your-size">See our full women's sizes »</a>
                        </li>

                        <li>
                            Outfits are available for all trimesters and even for post-pregnancy. Our personal stylist keep the essential details like-fabric, comfort lining, airy and stretchy materials in mind and select the best pieces to complete your look.
                        </li>

                        <li>
                           Happily flaunt your baby bump by leaving behind your anxieties to be taken care of by our experienced  Stylists and the selected items will be delivered to your doorstep.
                        </li>

                        <li>
                          Try out new looks by saving time, money, and energy.
                        </li>

                        <li>
                          The well-designed unique  outfits, along with other accessories are hand picked by our Stylist, allows a new makeover.
                        </li>
                        <li>
                          Select the time and date for your FIT  Box to be delivered at your convenience.
                        </li>
                        <li>
                          Pamper yourself with what you want and return rest within 5 days.
                        </li>
                        <li>
                           No shipping charges for return, but explore more options.
                        </li>
                    </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in">
            <img src="<?= $this->Url->image('maternity-women5.jpg'); ?>">
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
                    <h2>Look like the Stylish Mum You Are with Our Maternity Clothing Subscription Box</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>And you thought stylish maternity clothing was just for celebrities! Are you a mom-to-be? Our pregnancy clothing subscription box is full of clothing pieces that flow with you and make you feel cozy and snug. The boxes even offer non-maternity apparel that offers comfortable yet chic pieces that hug you and make you feel like everything is okay. So, be it oversized shirts, ultra-stretch bottoms, or layers, you can stop worrying about looking your best even when you are an expecting mom.</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>What’s In a Drapefit Maternity Subscription Box?</h4>
                    <p>Drapefit’s maternity clothes subscription box will have clothing pieces that will comfortably fit you during the first through the second trimester and even in the last trimester. And not just pants and t-shirts, we will also include dresses made of fabrics so soft, they will feel like a baby’s touch. Who says pregnancy styling cannot be chic and fashionable!<br><br>Are you first-time pregnant? We've got you covered. Are you an experienced mom? We've got you covered too. We'll send clothing that grows with you, like flowing tops, stretchable bottoms, and roomy layers. Throughout the middle three months of your pregnancy, we’ll provide you with stylish maternity clothes that can create various creative outfits. And, in the third trimester, we know just what to send to make you look stylishly pregnant. You can also expect some cute maternity trends and a few pieces for your shower or babymoon. After your new baby arrives, you'll need clothes and accessories that are compatible with your new post-baby body and lifestyle. We’ll send styles that are easy to wear and perfect for busy new mothers.</p>
                    <h4>What Does Drapefit Offer That’s Unique?</h4>
                    <p>We curate boxes of attractive subscription maternity clothes, not just for lounging but for every occasion, be it your yoga sessions, your grocery runs, or even your parties and get-togethers! <br><br>We ensure the best outfits with perfect fits and endless choices for each stage of your pregnancy. We understand how financially challenging having a baby can be. So, we offer hand-picked pieces without burning a hole in your pocket. Our charges cover your stylist’s fee as well as your subscription box’s price. Even after you have purchased outfits from us, we will help you style them in different possible ways without any extra fee. It will help us understand your taste and fit better so we can keep sending you similar pieces in the future. And you will get all of this in the comfort of your home. Because we know how important it is for you to get your restful hours. Now, don’t worry because returns and shipping are free. So, you can send any piece back that you don’t like in our prepaid envelope.<br><br>If that wasn’t enough, you can style these pieces even after your pregnancy so your little bundle of joy can see what a style icon their mum is! Our pieces are easy to carry and keep you on the move as your life goes forward.</p>
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
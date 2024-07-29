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
        <img src="<?= $this->Url->image('banner-women4.jpg'); ?>">
        <div class="inner-banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                    <h1><a href="<?= HTTP_ROOT; ?>women/maternity" >Personalized Petite Fit</a></h1>
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
                            <h2><span>PERSONALIZED PETITE</span> CLOTHING FOR YOU</h2>
                            <img src="<?= $this->Url->image('header-booten.png'); ?>">
                        </div>
<div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p>Tell us about your style, size, and price range. Let our expert stylist do everything for you to discover petite clothes that perfectly Fit your frame. We at Drape Fit are experts at hand-picking stylish petite clothing in USA that adds beauty to your lifestyle. Your dedicated Drape Fit stylist will precisely choose the best fabric and petite style for you. Proudly wear the petite womens clothing USA in your constraint budget with Drape Fit. </p>
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
                        <img src="https://www.drapefittest.com/images/petite-women1.jpg">
                    </div>
                    <h4><span>1</span><br>Fill out the quiz</h4>
                    <p>Share your details like your size, shape, color preference, and more with our Stylist to receive the ideal petite clothing.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men2.jpg">
                    </div>
                    <h4><span>2</span><br>Get A FIT Box</h4>
                    <p>As per your personalized details, receive your FIT Box meeting your style preference.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefittest.com/images/petite-women3.jpg">
                    </div>
                    <h4><span>3</span><br>Keep what you love</h4>
                    <p>Keep the best with you from your personalized FIT Box and return the rest to us with our free return shipping policy.</p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="process-box">
                    <div class="prosses-img">
                        <img src="https://www.drapefit.com/images/Men4.jpg">
                    </div>
                    <h4><span>4</span><br>Easy Return</h4>
                    <p>Return the things you don’t like with our easy return policy, including free shipping.</p>
                </div>
            </div>
    </div>
</section>


<section class="drafit-cont-img-box men-fit">
        <div class="drafit-cont-left content-righr-boxggg">
            <div class="conten-box" data-aos="zoom-in">
                <h2>The style for the Women Petite Fit</h2>
                <ul>
                        <li>
                            Drape FIT offers you the best and unique among the variety of styles and trends available in Petite sizes from XS and 0, as well as petite plus sizes.
                        </li>
                        <li>
                            We carry Women’s size <a href="<?= HTTP_ROOT; ?>help-center/find-your-size">See our full women's sizes »</a>
                        </li>

                        <li>
                            Your fashion stylist will choose an ideal outfit in accordance to your shared taste and preference size meeting your petite sizes.
                        </li>

                        <li>
                           Your Drape Fit stylist know precisely the best fabric and petite style for you. Thus, they will select the best petite designs with narrower shoulders and shorter sleeves so as to provide you the complete look. 
                        </li>

                        <li>
                           You can additionally receive the petite styling tips from the personal stylist to get the new makeover.
                        </li>

                        <li>
                           Proclaim your petite style with the matching and perfect accessories that are handpicked by your stylist so as to embellish your unique designed Outfit.
                        </li>
                        <li>
                           Wear the petite designs in your constraint budget with the Drape FIT.
                        </li>
                         <li>
                           Receive the Petite style as per your convenience, either monthly or quarterly.
                        </li>
                    </ul>
            </div>
        </div>
        <div class="drafit-cont-right img-right-boggggg" data-aos="zoom-in" style="height: 653px;">
            <img src="<?= $this->Url->image('petite-women5.jpg'); ?>">
        </div>
    </section>

<section class="ready-to-started -mt-25 style-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>OUR PETITE</span> CLOTHING FIT</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ready-to-started-box">
                <p>Get hand-picked pieces at the price ranges you set in your style profile. We at Drape Fit carry endless petite clothes styles designed with shorter sleeves, narrower shoulders, and petite plus sizes to provide you the complete look.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head" data-aos="fade-down">
                    <h2><span>WHY YOU'LL </span> LOVE DRAPE FIT</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ready-to-started-box">
                <p>We're experts at handpicking voguish petite clothes for your lifestyle.</p>
                <h4><b>Petite clothing fit</b></h4>
                <p>We carry endless petite clothing in the USA designed with narrower shoulders, shorter sleeves and apt hemlines in sizes from XS and 0, and petite plus sizes. Buy </p>
                <h4><b>Our price your wallet fall in love</b></h4>
                <!--<p>Get a hand-chosen piece at prices you set. Your $20 Drape Fit styling fee covers your expert stylist time and expertise when styling begins that gets credited toward anything you decide to buy or keep. </p>-->
                <p>Your $20 Drape Fit Styling Fees covers your expert stylist time and expertise to get a perfect and unique Fit Box near to your doorsteps .</p>
                <h4><b>Shop curated pieces online</b></h4>
                <p>After purchasing petite women's clothing USA, we'll curate shoppable outfits built around them. With no styling and shipping fee, you can buy pieces outside of your FIT box. </p>
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
                                <h4 class="panel-title"><a aria-controls="collapseOne" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">What sizes do you carry?</a></h4>
                            </div>
                            <div aria-labelledby="headingOne" class="panel-collapse collapse" id="collapseOne" role="tabpanel">
                                <div class="panel-body">
                                    <p>We carry endless petite clothes styles designed with narrower shoulders, shorter sleeves and just-right hemlines in sizes from XS and 0, as well as petite plus sizes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingTwo" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" role="button">Can I make special requests?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo" role="tabpanel">
                                <div class="panel-body">
                                    <p>Once you have a DRAPE FIT Stylist, you can contact them anytime by logging on to your account at https://www.drapefit.com/ or email them <a href="">support@drpefit.com</a>. Give your Stylist an idea of the type of style you are looking for rather than making specific item requests. This will give your Stylist a better understanding of your taste and preferences to help curate the best selection for you.</p>
                                </div>
                            </div>
                        </div>
    
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                 <div class="panel panel-default">
                            <div class="panel-heading" id="headingThree" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree" role="button">How is the billing policy?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingThree" class="panel-collapse collapse" id="collapseThree" role="tabpanel">
                                <div class="panel-body">
                                    <p>For your first box, a $20 styling fee will be charged as soon as you order. For each subsequently scheduled box, a $20 styling fee will be charged after your Stylist begins styling your FIT Box.</p>
    
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="headingfour" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefour" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefour" role="button">What types of items can I expect?</a></h4>
                            </div>
    
                            <div aria-labelledby="collapsefour" class="panel-collapse collapse" id="collapsefour" role="tabpanel">
                                <div class="panel-body">
                                    <p>We carry a variety of clothing and accessories to fit your style, body and lifestyle. We offer shirts, hoodies , jumpsuits ,overalls , sweater dresses, sweaters, pants, skirts, shorts, dresses, jackets, scarves and jewelry. Our selection is constantly changing to meet both your needs and shifting fashion trends.</p>
                                </div>
                            </div>
                        </div>
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingfive" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsefive" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsefive" role="button">Can I preview the items my Stylist selected for me before I receive my box?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingfive" class="panel-collapse collapse" id="collapsefive" role="tabpanel">
                                <div class="panel-body">
                                    <p>Once your Stylist completes your box, you will receive an email with a preview of your items. Your Stylist will make appropriate changes and your box will be on the way!</p>
    
                                </div>
                            </div>
                        </div>
                            </div>


                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="panel panel-default">
                            <div class="panel-heading" id="headingsix" role="tab">
                                <h4 class="panel-title"><a aria-controls="collapsesix" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapsesix" role="button">How do returns work?</a></h4>
                            </div>
    
                            <div aria-labelledby="headingsix" class="panel-collapse collapse" id="collapsesix" role="tabpanel">
                                <div class="panel-body">
                                    <p>Returns are always free. You'll find a prepaid shipping label and return bag included in your box. Please contact us if you didn't receive a return label, or have lost the return label so we can send you a new one by email.</p>
    
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
                    <h2>Get Grooving in Fashion with Our Stylish Petite Clothing Boxes</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p style="padding: 0;">With Drapefit, discover a style that helps you stand out. Drapefit provides petite clothing that is personalized for you. Let our personal stylists work their magic and find petite clothing that fits your frame perfectly. We will send you pieces that are tailored to your unique style and price range. If you are a petite girl and you are tired of people giving you unsolicited advice on what you can and cannot wear, it is time that you give it back to them by wearing whatever you feel like. Take expert help or choose yourself. But you should know that there is no such clothing piece that doesn’t flatter a petite body type if the right fit is found.</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>History of the Emergence of Petite Sizing and Clothing</h4>
                    <p>Thanks to the New York fashion designer named Hannah Troy, we now have brands that research and create better-fitting apparel for those with petite sizes. Troy borrowed from the French when naming her collection with shorter inseams and shoulders. She called her new line "Petites," which means "small." This was the start of a journey to empower women all over the world to find their style and the precise, petite size fit.</p>
                    <h4>Why Do You Need Our Petite Subscription Box?</h4>
                    <p>We understand that your body’s distinguishing characteristics can make finding the right fit difficult. Not to worry because we have got you covered. But before we begin, remember our first rule: embrace your body's unique type and size. If you are someone with petite body measurements, i.e., if you are 5 4” or under, our short girl style box is just what you need. We have limitless options for you in the form of shorter sleeves, flattering hemlines, and suitable prints that accentuate your body’s features and help you stand out as the stylish one in the crowd. Not just that, our varied sizing options range from XS through 0. And if you choose to go for petite plus size options, we also have those for you.</p>
                    <h4>How Can Drapefit’s Stylists Help You?</h4>
                    <p>Drapefit’s professionals know as a stylist that the key to finding your style and building a good wardrobe starts with a proper fit. We couldn't be more in agreement. Our expert stylists will not just customize but curate clothing pieces that are handpicked specially for your petite clothing box. You can simply select a price range and answer a few simple questions about your physique, features, and personality. </p>
                    <h4>Why Choose Drapefit’s Petite Clothing Box?</h4>
                    <p>Drapefit is unique. It lets you try and buy only what you like. Get a personalized petite subscription box that oozes style and trends delivered right at your doorstep. And don’t worry about returns and exchanges. We send a prepaid envelope with your clothing subscription box so you can send back the items that you do not like. So, what has got you waiting? Get browsing through Drapefit’s website and choose the clothing pieces that will have you drooling over yourself!</p>
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
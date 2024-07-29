<section class="more-data">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="section-head">
                    <h2>DRAPE FIT: YOUR PERSONAL STYLIST FOR CUSTOMIZED CLOTHING SUBSCRIPTION BOXES</h2>
                    <img src="<?= $this->Url->image('header-booten.png'); ?>">
                </div>
                <div class="section-head2">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <p style="padding: 0;">Discover Drape Fit, a personalized clothing subscription service offering curated boxes of hand-picked apparel for men, women, and kids with all style preferences, sizes and budgets. Find your perfect fit and style with the help of our experienced stylists. Experience affordable personalized shopping with apparel selected especially for you delivered right to your doorstep!</p>
                            </div>
                        </div>
                    </div>
                <div class="more-text">
                    <h4>Personalized Styling with Drape Fit</h4>
                    <p>At Drape Fit, we go beyond customization to tailor a FIT Box according to your preferences. Our experienced stylists provide a one-on-one styling experience, helping you find the perfect look. Enjoy a curated box of clothes for men, women, and kids that is more than just shopping—it's an experience. Explore our personal styling options and get inspired with online outfit ideas. Share your preferences, reviews and responses to help us understand your style, budget and interests.</p>
                    <h4>Wide Range of Brands and Sizes</h4>
                    <p>Discover your favorite brands and styles among our selection of hundreds of brands at Drape Fit. We offer a variety of women's sizes, including plus, petite and maternity. For men, we offer sizes ranging from XS to 3XL, with options for big and tall men.</p>
                    <h4>Finding Your Fit and Unique Style</h4>
                    <p>Our team of real stylists understands your sense of style. With relevant training and experience, they can assist you in creating a complete look, recommending pieces that flatter, and incorporating your feedback into each item. Collaborate with your personal stylist, providing and receiving feedback on items and looks. Try before you commit, ensuring the perfect fit and style.</p>
                    <h4>Curated Clothing Subscription Boxes</h4>
                    <p>At Drape Fit, we excel at helping you find your fit and style. By analyzing your style quiz and your feedback, we gain a deep understanding of your preferences. This allows us to suggest ongoing trends that you’ll love. Our goal is to curate pieces and FIT boxes specifically for you, keeping in mind your budget.</p>
                    <h4>Why Choose Drape Fit for Clothing Subscription Boxes?</h4>
                    <p>Experience the convenience of receiving a curated box of hand-picked apparel directly to your doorstep. With Drape Fit, you have control over your style, fit, and pricing preferences. Answer a few simple questions about your physique and personality, and our stylists will find pieces to suit you best. Enjoy a personalized shopping experience that is tailored to YOU and keep only what you love and return the rest hassle-free!</p>
                </div>
                <a href="javascript:void(0)" class="readmore">Read more</a>
            </div>
        </div>
    </div>
</section>
<section class="do-best-fit">
    <div class="container">
      <div class="row">
      <div class="col-sm-12">
        <div class="section-head" data-aos="zoom-in">
          <h2><span>we do </span> best fit  </h2>
          <!--<p>Each FIT Box has a $20 styling fee is applied to your purchase and you’re only billed for what you keep. It’s Free Shipping! Prepaid return envelope included.</p>-->
          <img src="<?= $this->Url->image('header-booten.png'); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="do-best-fit-round-main">
          <div class="best-fit-round-left" data-aos="zoom-in">
            <img src="<?= $this->Url->image('Women9.jpg'); ?>" alt="Clothing Boxes for Women">
          </div>
          <div class="best-fit-round-left best-fit-round-right" data-aos="zoom-in">
            <h3>READY TO TRY?</h3>
            <p>Upgrade your style in a few easy steps with our convenient and affordable styling service!</p>
            <a href="javascript:void(0)" class="sign-up-btn" onclick="document.getElementById('id01').style.display = 'block'">COMPLETE YOUR FIT PROFILE</a>
            <br>
            <span>
                        <a href="javascript:void(0)" class="sign-up-member" onclick="document.getElementById('id01').style.display = 'block'">Already a member?</a>
                        <a href="javascript:void(0)" class="sign-in" onclick="document.getElementById('id01').style.display = 'block'">Sign in</a>
                    </span>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
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
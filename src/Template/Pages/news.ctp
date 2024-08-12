<?php /* ?><link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>assets/css/live-project.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!------- banner  ------->
  <div class="demo-banner-box news-banner">
  <h1>News</h1>
  </div>
  <!-------End  banner  ------->
  <div class="news-headlines-tab">
  <div class="container">
  <div class="row">
  <div class="col-sm-8 col-lg-8 col-md-8">
  <div id="exTab2" >
  <ul class="nav nav-tabs">
  <li class="active">
  <a  href="#1" data-toggle="tab">Press Releases</a>
  </li>
  <li><a href="#2" data-toggle="tab">News Headlines</a>
  </li>
  </ul>

  <div class="tab-content ">
  <div class="tab-pane active" id="1">
  <div class="tab-text-box">
  <h5>Oct 17, 2019</h5>
  <!-- <a href="#">Cognizant to Present at the Citi 2019 Global Technology Conference</a> -->
  <p>DrapeFit is going to be live.</p>
  </div>

  <div class="see-more-news-button">
  <a href="#">See More News</a>
  </div>
  </div>
  <div class="tab-pane" id="2">
  <div class="tab-text-box">
  <h5>Oct 17, 2019</h5>
  <a href="#">DrapeFit is going to be live.</a>
  </div>

  <div class="see-more-news-button">
  <a href="#">See More News</a>
  </div>
  </div>
  </div>
  </div>
  </div>

  <div class="col-sm-4 col-lg-4 col-md-4">
  <div class="social-tab-box">
  <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#tab1"><span><i class="fa fa-facebook-square" aria-hidden="true"></i></span>
  face book</a></li>
  <li><a data-toggle="tab" href="#tab2"><span><i class="fa fa-twitter-square" aria-hidden="true"></i></span> Twitter</a></li>
  <li><a data-toggle="tab" href="#tab3"><span><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> linkedin</a></li>
  </ul>

  <div class="tab-content">
  <div id="tab1" class="tab-pane fade in active">
  <p>DrapeFit coming in social media.</p>
  </div>
  <div id="tab2" class="tab-pane fade">
  <p>DrapeFit coming in social media.</p>
  </div>
  <div id="tab3" class="tab-pane fade">
  <p>DrapeFit coming in social media.</p>
  </div>
  </div>

  </div>
  </div>
  </body>
  </html>
  <!-- partial -->


  </div>
  </div>
  </div>
  <section class="page-sections">
  <?php echo $pageDetails->description ?>
  </section><?php */ ?>
<style type="text/css">

    .PostExcerpt-title .text-font {
    font-size: 24px;
    color: #232f3e;
        font-family: HVDFontsBrandonTextBold;
}
    .PostExcerpt-title .read-text-font{font-size:16px;    font-family: HVDFontsBrandonTextBold;} 
    .mt-30{margin-top: 30px;}
    .mb-0{margin-bottom: 0px;}
    .mt-60{margin-top:60px;}
    .PostExcerpt-title .read-text-font {
    font-size: 16px;
    color: #fe6c00;
}
 @media only screen and (max-width:767px) {
.mt-60 {
    margin-top: 0;
}
}
 @media only screen and (max-width:500px) {
.PostExcerpt-title .text-font {
    font-size: 18px;
}
img.img-responsive {
    width: 100%;
}
.apply-Job-form-box {
    padding: 0;
}
}
</style>
<section class="page-sections">
<section class="inner-banner inner-banner2"><img src="https://www.drapefit.com/images/banner-final1.jpg"></section>

<section class="how-it-work inner-b">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="it-work-top">
<div class="section-head section-head3" data-aos="fade-down">
<ul>
  <li><a href="https://www.drapefit.com/">Home</a></li>
  <li>&gt;</li>
  <li>News</li>
</ul>

<h2>News</h2>
<img src="/img/header-booten.png"></div>

<div class="section-head2">
<div class="row">
<div class="col-sm-12 col-lg-12 col-md-12">
<?php foreach ($newsDetails as $newdetls) { ?>
            <div class="row mt-60">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h2 class="PostExcerpt-title"><a href="<?php echo $newdetls->news_link; ?>" target="_blank"><strong class="text-font"><?php echo $newdetls->news_name; ?></strong> </a></h2>

                            <h2 class="PostExcerpt-title"><a href="<?php echo $newdetls->news_link; ?>" target="_blank"><strong class="read-text-font">Read more..</strong> </a></h2>

                            <p class="PostExcerpt-author">Posted by <?php echo $newdetls->post_by; ?>, <?php echo date('d F,y', strtotime($newdetls->created)); ?></p>
                        </div>

                        <div class="col-md-4 col-sm-6"><img alt="<?php echo $newdetls->news_name; ?>" class="img-responsive image-border" src="<?php echo HTTP_ROOT . NEWSIMG . $newdetls->news_image; ?>" /></div>
                    </div>

                    <hr class="mt-30 mb-0" /></div>
            </div>
            <?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


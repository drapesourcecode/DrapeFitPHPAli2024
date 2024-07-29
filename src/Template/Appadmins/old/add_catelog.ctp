<?php if(@$catelogDetails->img1==''){$imgDef1='img/Men9.jpg';}else{$imgDef1=CATELOG.$catelogDetails->img1;}?>
<?php if(@$catelogDetails->img2==''){$imgDef2='img/Men9.jpg';}else{$imgDef2=CATELOG.$catelogDetails->img2;}?>
<?php if(@$catelogDetails->img3==''){$imgDef3='img/Men9.jpg';}else{$imgDef3=CATELOG.$catelogDetails->img3;}?>
<?php if(@$catelogDetails->img4==''){$imgDef4='img/Men9.jpg';}else{$imgDef4=CATELOG.$catelogDetails->img4;}?>
<?php if(@$catelogDetails->img5==''){$imgDef5='img/Men9.jpg';}else{$imgDef5=CATELOG.$catelogDetails->img5;}?>
<?php if(@$catelogDetails->img6==''){$imgDef6='img/Men9.jpg';}else{$imgDef6=CATELOG.$catelogDetails->img6;}?>
<?php if(@$catelogDetails->img7==''){$imgDef7='img/Men9.jpg';}else{$imgDef7=CATELOG.$catelogDetails->img7;}?>
<?php if(@$catelogDetails->img8==''){$imgDef8='img/Men9.jpg';}else{$imgDef8=CATELOG.$catelogDetails->img8;}?>
<?php if(@$catelogDetails->img9==''){$imgDef9='img/Men9.jpg';}else{$imgDef9=CATELOG.$catelogDetails->img9;}?>
<?php if(@$catelogDetails->img10==''){$imgDef10='img/Men9.jpg';}else{$imgDef10=CATELOG.$catelogDetails->img10;}?>
<?php if(@$catelogDetails->img11==''){$imgDef11='img/Men9.jpg';}else{$imgDef11=CATELOG.$catelogDetails->img11;}?>
<?php if(@$catelogDetails->img12==''){$imgDef12='img/Men9.jpg';}else{$imgDef12=CATELOG.$catelogDetails->img12;}?>
<?php if(@$catelogDetails->img13==''){$imgDef13='img/Men9.jpg';}else{$imgDef13=CATELOG.$catelogDetails->img13;}?>
<?php if(@$catelogDetails->img14==''){$imgDef14='img/Men9.jpg';}else{$imgDef14=CATELOG.$catelogDetails->img14;}?>
<?php if(@$catelogDetails->img15==''){$imgDef15='img/Men9.jpg';}else{$imgDef15=CATELOG.$catelogDetails->img15;}?>
<?php if(@$catelogDetails->img16==''){$imgDef16='img/Men9.jpg';}else{$imgDef16=CATELOG.$catelogDetails->img16;}?>
<?php if(@$catelogDetails->img17==''){$imgDef17='img/Men9.jpg';}else{$imgDef17=CATELOG.$catelogDetails->img17;}?>
<?php if(@$catelogDetails->img18==''){$imgDef18='img/Men9.jpg';}else{$imgDef18=CATELOG.$catelogDetails->img18;}?>
<?php if(@$catelogDetails->img19==''){$imgDef19='img/Men9.jpg';}else{$imgDef19=CATELOG.$catelogDetails->img19;}?>
<?php if(@$catelogDetails->img20==''){$imgDef20='img/Men9.jpg';}else{$imgDef20=CATELOG.$catelogDetails->img20;}?>
<?php if(@$catelogDetails->img21==''){$imgDef21='img/Men9.jpg';}else{$imgDef21=CATELOG.$catelogDetails->img21;}?>
<?php if(@$catelogDetails->img22==''){$imgDef22='img/Men9.jpg';}else{$imgDef22=CATELOG.$catelogDetails->img22;}?>
<?php if(@$catelogDetails->img23==''){$imgDef23='img/Men9.jpg';}else{$imgDef23=CATELOG.$catelogDetails->img23;}?>
<?php if(@$catelogDetails->img24==''){$imgDef24='img/Men9.jpg';}else{$imgDef24=CATELOG.$catelogDetails->img24;}?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <h1>
            <?= __('Catelog') ?>
        </h1>


        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <!-- general form elements -->
                <div class="box box-info">

                    <!-- form start -->
                    <?= $this->Form->create(null, array('data-toggle' => "validator")) ?>
                    <div class="box-body">

                        <div class="col-xs-12">
                            <div class="form-group">
                                <link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>catelog/assets/css/bootstrap.css">
                                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

                                <style type="text/css">
                                    @font-face {
                                        font-family: 'Amazon Ember';
                                        src: url(https://m.media-amazon.com/151images/G/01/AUIClients/AmazonUIFont-amazonember_rg-cc7ebaa05a2cd3b02c0929ac0475a44ab30b7efa._V2_.woff2) format("woff2"), url(https://m.media-amazon.com/images/G/01/AUIClients/AmazonUIFont-amazonember_rg-8a9db402d8966ae93717c348b9ab0bd08703a7a7._V2_.woff) format("woff")
                                    }

                                    @font-face {
                                        font-family: 'Amazon Ember';
                                        font-style: italic;
                                        src: url(https://m.media-amazon.com/images/G/01/AUIClients/AmazonUIFont-amazonember_rgit-9cc1bb64eb270135f1adf3a4881c2ee5e7c37be5._V2_.woff2) format("woff2"), url(https://m.media-amazon.com/images/G/01/AUIClients/AmazonUIFont-amazonember_rgit-a4dc98d644ff2aedd41da3da462f09ffce86eafb._V2_.woff) format("woff")
                                    }

                                    @font-face {
                                        font-family: 'Amazon Ember';
                                        font-weight: 700;
                                        src: url(https://m.media-amazon.com/images/G/01/AUIClients/AmazonUIFont-amazonember_bd-46b91bda68161c14e554a779643ef4957431987b._V2_.woff2) format("woff2"), url(https://m.media-amazon.com/images/G/01/AUIClients/AmazonUIFont-amazonember_bd-b605252f87b8b3df5ae206596dac0938fc5888bc._V2_.woff) format("woff")
                                    }

                                    @font-face {
                                        font-family: 'Amazon Ember';
                                        font-style: italic;
                                        font-weight: 700;
                                        src: url(https://m.media-amazon.com/images/G/01/AUIClients/AmazonUIFont-amazonember_bdit-80ff7aba37dd1ff5a6b90233a19e3a780a96dc2f._V2_.woff2) format("woff2"), url(https://m.media-amazon.com/images/G/01/AUIClients/AmazonUIFont-amazonember_bdit-57598ce426a612be5a1d15eee08252668fca5e7a._V2_.woff) format("woff")
                                    }
                                    .fa-dashboard{
                                        font: normal normal normal 14px/1 FontAwesome;
                                    }
                                    .a-ember body 
                                    {
                                        font-family: "Amazon Ember", Arial, sans-serif
                                    }
                                    .cat-log {
                                        /* float: left; */
                                        /* width: 100%; */
                                        /* padding: 30px 0 20px; */
                                        margin: 0 auto;
                                        width: 65%;
                                    }
                                    .cat-log .container{
                                        width: 100%;
                                    }
                                    .catlog-top {
                                        text-align: center;
                                        float: left;
                                        width: 100%;
                                        border-bottom: 1px solid #d6deef;
                                        margin-bottom: 7px;
                                    }
                                    .catlog-top h6 {
                                        font-size: 14px;
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        color: #9a9ead;
                                        margin: 4px 0;
                                    }
                                    .catlog-top h4 {
                                        font-weight: bold;
                                        margin-top: 9px;
                                        color: #ef6e14;
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        text-transform: uppercase;
                                        font-size: 16px;
                                    }
                                    .suge h5 {
                                        color: #232f3e;
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        font-size: 18px;
                                        margin-bottom: 10px;
                                        text-align: center;
                                        font-weight: bold;
                                    }
                                    .catlog-top img {
                                        width: 135px;
                                    }
                                    .cat-log .col-lg-4{
                                        text-align: center;
                                    }
                                    .cat-log .cat-log-smallbox h4 {
                                        float: left;
                                        width: 100%;
                                        text-align: center;
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        color: #232f3e;
                                        margin: 0;
                                        font-size: 16px;
                                        font-weight: 500;
                                    }
                                    .cat-log .cat-log-smallbox h3 {
                                        float: left;
                                        width: 100%;
                                        text-align: center;
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        color: #ff6c00;
                                        margin: 0;
                                        font-size: 15px;
                                        text-transform: uppercase;
                                    }

                                    .cat-log .cat-log-smallbox h5 {
                                        float: left;
                                        width: 100%;
                                        text-align: center;
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        color: #232f3e;
                                        margin: 0;
                                        text-transform: uppercase;
                                        font-weight: bold;
                                        text-align: left;
                                        font-size: 12px;
                                    }
                                    .cat-log .cat-log-smallbox h5 span{
                                        float: right;
                                    }
                                    .cat-log-smallbox{
                                        float: left;
                                        width: 100%;
                                        border-bottom: 1px solid #e8e7e7;
                                        margin-bottom: 15px;
                                        text-align: center;
                                    }
                                    .cat-log .cat-log-smallbox h2 {
                                        float: left;
                                        width: 100%;
                                        text-align: center;
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        color: #232f3e;
                                        margin: 0;
                                        font-weight: bold;
                                        text-align: right;
                                        margin-bottom: 15px;
                                        font-size: 20px;
                                    }
                                    .cat-log p{
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        font-size: 14px;
                                        line-height: 25px;
                                    }
                                    .contan-box .cat-log-smallbox ul {

                                    }
                                    .contan-box .cat-log-smallbox p{
                                        font-family: "Amazon Ember", Arial, sans-serif;
                                        font-size: 14px;
                                        line-height: 22px;
                                    }
                                    .catlog-para {
                                        float: left;
                                        width: 100%;
                                        padding: 0;
                                    }
                                    .catlog-para p {
                                        line-height: 19px;
                                    }
                                    .cat-log .first-three .cat-log-smallbox h4 {
                                        font-size: 20px;
                                        font-weight: bold;
                                        margin: 6px 0;
                                        position: relative;
                                        left: 6px;
                                        text-transform: uppercase;
                                    }
                                    .cat-log .first-three .cat-log-smallbox{
                                        border:none;
                                    }
                                    .cat-log .col-lg-6 .cat-log-smallbox h6 {
                                        font-size: 14px;
                                        color: #ff6c00;
                                        margin-bottom: 0px;
                                        margin-top: 3px;
                                    }
                                    .catlog-product-img {
                                        /* height: 0; */
                                        object-fit: contain;
                                        display: inline-block;
                                        width: 100%;
                                    }
                                    .catlog-product-img ul {
                                        list-style-type: none;
                                        margin: 0;
                                        padding: 0;
                                        width: 100%;
                                        float: left;
                                        text-align: center;
                                    }
                                    .catlog-product-img ul li {
                                        width: 30%;
                                        padding: 2px 3px;
                                        overflow: hidden;
                                        display: inline-block;
                                    }
                                    .catlog-product-img ul li img {
                                        width: 100%;
                                        object-fit: contain;
                                        vertical-align: middle;
                                    }
                                    .cat-log .col-lg-6 .cat-log-smallbox {
                                        margin-bottom: 0;
                                        padding: 8px 0;
                                    }
                                    .cat-log .first-three:nth-child(2) {
                                        border-left: 1px solid #ccc;
                                        border-right: 1px solid #ccc;
                                    }
                                    .cat-log .first-three:first-child,.cat-log .first-three:nth-child(3){
                                        padding-top: 29px;
                                    }
                                    .footer {
                                        float: left;
                                        width: 100%;
                                        text-align: center;
                                        /* background: #000; */
                                        border-top: 1px solid #ef6e14;
    													padding: 8px 0 0;
                                    }
                                    .footer p {
                                        color: #000;
                                        font-size: 12px;
                                        text-transform: uppercase;
                                        margin-top: 2px;
                                        font-weight: bold;
                                    }
                                </style>
<strong><p style="color: red;font-size: 13px;float: left;">Please do the double click & modify the text and image.</p></strong>
                                <div class="cat-log">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                
                                                <div class="catlog-top">
                                                    <h6><?php echo $paymentDetails->user->email; ?></h6>
                                                    <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $paymentDetails->user_id . '.png' ?>">
                                                    <h4>Hello, <?php echo $paymentDetails->user->user_detail->first_name . ' ' . $paymentDetails->user->user_detail->last_name; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- <div class="col-sm-3 col-lg-3 col-md-3 first-three">
                                                <div class="cat-log-smallbox">
                                                    <img src="<?php echo HTTP_ROOT ?>/images/dflogo.png" style="width: 80px;">
                                                    <h4>DRAPE fit</h4>
                                                    <h3>We Do best fit</h3>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-12 col-lg-12 col-md-12 first-three">
                                                <div class="cat-log-smallbox"> 
                                                    <div class="catlog-para">
                                                        <?php if (@$catelogDetails->contain == '') { ?>
                                                            <p id='p-des'>
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, has survived not only five centuries, but also the leap into electronic typesetting  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, has survived not only five centuries, but also the leap into electronic typesetting..
                                                            </p>
                                                        <?php } else { ?>
                                                            <p id='p-des' style="width: 100%; height: 145px; word-wrap: break-word;"><?php echo @$catelogDetails->contain; ?></p>
                                                             <?php } ?>
                                                            <p id='p-textarea' style="display: none">
                                                            <textarea name='des' id='midelDes' style="width: 100%; height: 145px; text-align: center;"><?php echo @$catelogDetails->contain; ?></textarea>
                                                            </p>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-3 col-lg-3 col-md-3 first-three">
                                                <div class="cat-log-smallbox">
                                                    <img src="<?php echo HTTP_ROOT ?>/images/dflogo.png" style="width: 80px;">
                                                    <h4>Drape fit</h4>
                                                    <h3>We Do best fit</h3>
                                                </div>
                                            </div> -->
                                            <!--<div class="col-sm-12 col-lg-12 col-md-12 suge">-->
                                            <!--    <h5>Your FIT Sugestions</h5>-->
                                            <!--</div>-->
                                            <!--<div class="col-sm-6 col-lg-6 col-md-6">-->
                                            <!--    <div class="cat-log-smallbox"> -->
                                            <!--        <div class="catlog-product-img">-->

                                            <!--            <ul style=" overflow: hidden;height: 145px;   margin-bottom: 20px;">-->
                                            <!--                <li><a id="img1" data-id="1" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef1 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img2" data-id="2" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef2 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img3" data-id="3" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef3 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img4" data-id="4" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef4?>"width="200"></a></li>-->
                                            <!--                <li><a id="img5" data-id="5" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef5 ?>"width="200"></a></li>-->
                                            <!--                <li><a id="img6" data-id="6" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef6?>"width="200"></a></li>-->
                                            <!--            </ul>-->
                                            <!--        </div>-->

                                            <!--        <?php if (@$catelogDetails->text1 == '') { ?>-->
                                            <!--            <h6 class='texth'  data-id ='1' id="sec_text1">Alic Blue</h6>-->
                                            <!--        <?php } else { ?>-->
                                            <!--            <h6  class='texth' id="sec_text1"   data-id ='1'><?php echo @$catelogDetails->text1; ?></h6>-->
                                            <!--        <?php } ?>-->
                                            <!--        <p  id='p-textarea-1' style="display: none">-->
                                            <!--            <input class='txtIn' data-id ='1'  type="text" name="text1" id="text1" value="<?php echo @$catelogDetails->text1; ?>">-->
                                            <!--        </p>-->
                                            <!--        <?php if (@$catelogDetails->text2 == '') { ?>-->
                                            <!--            <h4  class='texth'  data-id ='2' id="sec_text2" >Simona Henley Blouse</h4>-->
                                            <!--        <?php } else { ?>-->
                                            <!--            <h4 class='texth'  data-id ='2' id="sec_text2" ><?php echo @$catelogDetails->text2; ?></h4>-->
                                            <!--             <?php } ?>-->
                                            <!--            <p id='p-textarea-2' style="display: none">-->
                                            <!--            <input class='txtIn' data-id ='2' type="text" name="text2" id="text2" value="<?php echo @$catelogDetails->text2; ?>">-->
                                            <!--        </p>-->
                                                   
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-sm-6 col-lg-6 col-md-6">-->
                                            <!--    <div class="cat-log-smallbox"> -->
                                            <!--        <div class="catlog-product-img">-->
                                            <!--            <ul style=" overflow: hidden;height: 145px;   margin-bottom: 20px;">-->
                                            <!--                <li><a id="img7" data-id="7" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef7?>" width="200"></a></li>-->
                                            <!--                <li><a id="img8" data-id="8" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef8 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img9" data-id="9" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef9?>" width="200"></a></li>-->
                                            <!--                <li><a id="img10" data-id="10" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef10?>" width="200"></a></li>-->
                                            <!--                <li><a id="img11" data-id="11" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef11 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img12" data-id="12" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef12 ?>" width="200"></a></li>-->
                                            <!--            </ul>-->
                                            <!--        </div>-->
                                            <!--        <?php if (@$catelogDetails->text3 == '') { ?>-->
                                            <!--            <h6 class='texth'  data-id ='3' id="sec_text3">Alic Blue</h6>-->
                                            <!--        <?php } else { ?>-->
                                            <!--            <h6 class='texth'  data-id ='3' id="sec_text3"><?php echo $catelogDetails->text3; ?></h6>-->
                                            <!--            <?php } ?>-->
                                            <!--            <p id='p-textarea-3' style="display: none">-->
                                            <!--            <input class='txtIn' data-id ='3' type="text" name="text3" id="text3" value="<?php echo $catelogDetails->text3; ?>">-->
                                            <!--        </p>-->
                                                  
                                            <!--        <?php if (@$catelogDetails->text4 == '') { ?>-->
                                            <!--            <h4 class='texth'  data-id ='4' id="sec_text4">Simona Henley Blouse</h4>-->
                                            <!--        <?php } else { ?>-->
                                            <!--            <h4 class='texth'  data-id ='4' id="sec_text4"><?php echo $catelogDetails->text4; ?></h4>-->
                                            <!--             <?php } ?>-->
                                            <!--            <p id='p-textarea-4' style="display: none">-->
                                            <!--            <input class='txtIn' data-id ='4' type="text" name="text4" id="text4" value="<?php echo $catelogDetails->text4; ?>">-->
                                            <!--        </p>-->
                                                   
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-sm-6 col-lg-6 col-md-6">-->
                                            <!--    <div class="cat-log-smallbox"> -->
                                            <!--        <div class="catlog-product-img">-->
                                            <!--            <ul style=" overflow: hidden;height: 145px;   margin-bottom: 20px;">-->
                                            <!--                <li><a id="img13" data-id="13" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef13 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img14" data-id="14" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef14?>" width="200"></a></li>-->
                                            <!--                <li><a id="img15" data-id="15" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef15 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img16" data-id="16" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef16?>" width="200"></a></li>-->
                                            <!--                <li><a id="img17" data-id="17" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef17?>" width="200"></a></li>-->
                                            <!--                <li><a id="img18" data-id="18" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef18 ?>" width="200"></a></li>-->
                                            <!--            </ul>-->
                                            <!--        </div>-->
                                            <!--        <?php if (@$catelogDetails->text5 == '') { ?>-->
                                            <!--            <h6 class='texth'  data-id ='5' id="sec_text5">Alic Blue</h6>-->
                                            <!--        <?php } else { ?>-->
                                            <!--            <h6 class='texth'  data-id ='5' id="sec_text5"><?php echo $catelogDetails->text5; ?></h6>-->
                                            <!--            <?php } ?>-->
                                            <!--            <p id='p-textarea-5' style="display: none">-->
                                            <!--            <input class='txtIn' data-id ='5' type="text" name="text5" id="text5" value="<?php echo $catelogDetails->text5; ?>">-->
                                            <!--        </p>-->
                                            <!--        <?php if (@$catelogDetails->text4 == '') { ?>-->
                                            <!--            <h4 class='texth'  data-id ='6' id="sec_text6">Simona Henley Blouse</h4>-->
                                            <!--        <?php } else { ?>-->
                                            <!--            <h4 class='texth'  data-id ='6' id="sec_text6"><?php echo @$catelogDetails->text6; ?></h4>-->
                                            <!--            <?php } ?>-->
                                            <!--            <p id='p-textarea-6' style="display: none">-->
                                            <!--            <input class='txtIn' data-id ='6' type="text" name="text6" id="text6" value="<?php echo @$catelogDetails->text6; ?>">-->
                                            <!--        </p>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-sm-6 col-lg-6 col-md-6">-->
                                            <!--    <div class="cat-log-smallbox"> -->
                                            <!--        <div class="catlog-product-img">-->
                                            <!--            <ul style=" overflow: hidden;height: 145px;   margin-bottom: 20px;">-->
                                            <!--                <li><a id="img19" data-id="19" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef19 ?>" width="200">-->
                                            <!--                    </a></li>-->
                                            <!--                <li><a id="img20" data-id="20" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef20?>" width="200"></a></li>-->
                                            <!--                <li><a id="img21" data-id="21" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef21 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img22" data-id="22" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef22 ?>" width="200"></a></li>-->
                                            <!--                <li><a id="img23" data-id="23" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT .$imgDef23?>" width="200"></a></li>-->
                                            <!--                <li><a id="img24" data-id="24" class="img" href="javascript:void(0)" ><img src="<?php echo HTTP_ROOT.$imgDef24 ?>" width="200"></a></li>-->
                                            <!--            </ul>-->
                                            <!--        </div>-->
                                            <!--        <?php if (@$catelogDetails->text7 == '') { ?>-->
                                            <!--            <h6 class='texth'  data-id ='7' id="sec_text7">Alic Blue</h6>-->
                                            <!--        <?php } else { ?>-->
                                            <!--            <h6 class='texth'  data-id ='7' id="sec_text7"><?php echo @$catelogDetails->text7; ?></h6>-->
                                            <!--            <?php } ?>-->
                                            <!--            <p id='p-textarea-7' style="display: none">-->
                                            <!--            <input class='txtIn' data-id ='7' type="text" name="text7" id="text7" value="<?php echo @$catelogDetails->text7; ?>">-->
                                            <!--        </p>-->
                                            <!--        <?php if (@$catelogDetails->text8 == '') { ?>-->
                                            <!--            <h4 class='texth'  data-id ='8' id="sec_text8">Simona Henley Blouse</h4>-->
                                            <!--        <?php } else { ?>-->
                                            <!--            <h4 class='texth'  data-id ='8' id="sec_text8"><?php echo @$catelogDetails->text8; ?></h4>-->
                                            <!--            <?php } ?>-->
                                            <!--            <p id='p-textarea-8' style="display: none">-->
                                            <!--            <input class='txtIn' data-id ='8' type="text" name="text8" id="text8" value="<?php echo @$catelogDetails->text8; ?>">-->
                                            <!--        </p>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="footer">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                            <p>www.Drapefit.com</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="help-block with-errors"></div>-->
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <?php echo $this->Html->link('Print', ['action' => 'catelogPrint',$id], ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
                        <?php echo $this->Html->link('Back', ['action' => 'view_users'], ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
                    </div>
                    <?= $this->Form->end() ?>


                    <?= $this->Form->create('img', array('id' => "imgfrm", 'type' => 'file')); ?>
                    <input type="file"  name='file' id="imgupload1" style="display:none"/> 
                    <?= $this->Form->end() ?>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">

    var url = '<?php echo HTTP_ROOT ?>';
    var getCateId =<?php echo $id ?>;
    $('#p-des').dblclick(function () {
        $('#p-des').hide();
        $('#p-textarea').show();
    });

    $('#midelDes').blur(function () {
        var tex = $('#midelDes').val();
        var text = $('#p-des').html(tex);
        if (tex) {

            $.ajax({
                type: 'POST',
                data: {contain: tex, cateId: getCateId},
                url: url + 'appadmins/ajax_catelog_save',
                success: function (response) {
                    if (response.status == 1) {
                        $('#p-des').show();
                        $('#p-textarea').hide();
                    }
                },
                dataType: 'JSON'
            });
        }
    });


    $('.texth').dblclick(function () {
        var getId=$(this).attr("data-id");
       
        $('#sec_text'+getId).hide();
        $('#p-textarea-'+getId).show();

    });
    $('.txtIn').blur(function () {
         
         var getId=$(this).attr("data-id");
        var getData = $('#text'+getId).val();
        $('#sec_text').html(getData);
        if (getData) {
            $.ajax({
                type: 'POST',
                data: {text: getData, cateId: getCateId,getId:getId},
                url: url + 'appadmins/ajax_catelog_text_save',
                success: function (response) {
                    if (response.status == 1) {
                        $('#sec_text'+getId).show().html(getData);

                       $('#p-textarea-'+getId).hide();
                    }
                },
                dataType: 'JSON'
            });
        }
    });
    

    $('.img').dblclick(function () {
        $('#imgupload1').trigger('click');
        var id = $(this).attr("data-id");
        $('#imgupload1').attr("data-id", id);

    });

    $("#imgupload1").on("change", function (e) {
        var idx = $(this).attr("data-id");
        var formData = new FormData();
        formData.append('file', $('#imgupload1')[0].files[0]);
        formData.append('imgId', idx);
        formData.append('getCateId', getCateId);

        $.ajax({
            url: url + 'appadmins/ajaxCatelogImg',
            type: 'POST',
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function (data) {
                $('#img' + idx).html(data.img);
            },
            dataType: "JSON"

        });


    });

</script>
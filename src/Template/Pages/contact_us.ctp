<style>
 .contactPage{
    background: #fff;
    float: left;
    width: 100%;
    padding-top: 22px;
  }
.contactPage textarea {
    width: 100%;
    height: auto !important;
}
 .error{
  font-size: 14px !important;
  font-weight: 300;
  color:#ff464e;
 }
.inquiryForm .foram-box div {
    margin-bottom: 25px;
    float: left;
    padding: 0 3px;
}
 .inquiryForm .foram-box div input{
  width: 100% !important;
  margin-bottom: 0 !important;
      background: #fff;
 }
 .g-recaptcha,
 .g-recaptcha .foram-box div {
  float: none !important;
  margin-bottom: 0 !important;
    padding: 0 !important;
 }
 .g-recaptcha {
    margin-top: 25px;
}
.inquiryForm .foram-box {
    margin: 0 auto;
    width: 70%;
}
 .map iframe {
  vertical-align: bottom;
 }
 .inquiryForm h3{
      font-weight: bold;
    border-bottom: 2px solid #232f3d;
    padding-bottom: 15px;
    margin-bottom: 20px;
 }
  .inquiryForm button{
        background: #ff6c00;
    color: #fff;
    font-weight: bold;
    padding: 7px 14px;
    font-size: 18px;
    float: right;

  }
.inquiryForm ul {
    float: left;
    width: 95%;
    border: 2px solid #ef6a04;
    padding: 15px 23px;
    margin-top: 62px;
}

.inquiryForm ul li {
    float: left;
    width: 100%;
    display: inline-block;
    font-weight: bold;
    font-size: 17px;
    margin: 5px 0;
    padding: 2px 0;
        font-family: "Amazon Ember", Arial, sans-serif;
}
.contactPage p {
    font-size: 16px;
    color: #919eaf;
    line-height: 29px;
    margin: 25px 0;
}
</style>
<section class="page-sections">
    <?php echo $pageDetails->description ?>
</section>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>
<!--<section class="contact-banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <?php //echo $pageDetails->description ?>
            </div>
        </div>
    </div>
</section>
<!--<section class="breadcrumbMenu">
 <div class="container">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li class="active"><?php //echo $pageDetails->page_title; ?></li>
  </ul>
 </div>
</section>-->
<section class="textureOne contactPage">
 <div class="container">
  <?php //echo $pageDetails->description ?>
  <!-- <div class="map">
   <?php echo $map->code; ?>
  </div> 
  <div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
    </div>
  </div>-->
  <div class="inquiryForm" tyle="width: 100%; margin: 10px 0;">
    <div class="row">
<div class="col-sm-12 col-lg-12 col-md-12">
  <div class="foram-box">
      <?= $this->Flash->render() ?>
  <h3>MAKE AN INQUIRY</h3>
   <?php echo $this->Form->create(@$user, ['type'=>'file','url' => ['action' => 'contactUs'], 'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'personalInfofrm']); ?>
  <div class="contact-filed">
       <label for="firstName">First Name</label>
    <input type="text" name="firstName" id='firstName' required = 'required' placeholder="First Name" />
   </div>
   <div class="contact-filed">
    <label for="lastName">Last Name</label>
    <input type="text" name="lastName"  id='lastName' required = 'required' placeholder="Last Name" />
   </div>
   <div class="contact-filed">
    <label for="phoneNo">Phone Number</label>
    <input type="text" name="phoneNo" id='phoneNo' required = 'required' placeholder="Phone Number" />
   </div>
   <div class="contact-filed">
    <label for="emailAddress">Email Address</label>
    <input type="text" name="emailAddress"  id='emailAddress' required = 'required' placeholder="Email Address" />
   </div>
   <div style="width: 100%;">
    <label for="subject">Subject</label>
    <input type="text" name="subject" id='subject' required = 'required' placeholder="Subject" />
   </div>
   <br/>
   <div style="width: 100%; margin-bottom: 0;">
    <label>Message</label>
    <textarea rows="4"  name='message' id="message" required = 'required' placeholder="Message"></textarea>
   </div>
   <br/>
   <?php if(!empty($_GET['p']) && ($_GET['p'] == 'p')){ ?>
    <div style="width: 100%;">
    <label for="photo">Photo</label>
    <input type="file" name="photo" id='photo'  />
   </div>
   <?php } ?>
   <div style="width: 100%;" style="margin: 0;">
    <div class="g-recaptcha" data-sitekey="6Lf2GV4hAAAAAO6znCkcg_Dd3VQDDYPxGue-rJyW"></div>
   </div>
   <button type="submit">SUBMIT</button>
   <?php echo $this->Form->end(); ?>
   </div>
   </div>
   </div>
  </div>
 </div>
</section>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
 $(function(){
  $("#personalInfofrm").validate({
   ignore:[],
   onkeyup:function(element){
    if(element.name=='email'){
     return false;
    }
   },
   rules:{
    firstName:"required",
    lastName:"required",
    phoneNo:"required",
    emailAddress:"required",
    subject:"required",
    message:"required",
    emailAddress: {
     required:true,
     email:true,
    },
   },
   messages:{
    firstName:"Please enter your first name",
    lastName:"Please enter your last name",
    phoneNo:"Please enter your mobile number",
    emailAddress:{
     required:"Please enter your email address",
     email:"Please enter your valid email address",
    },
    subject:"Please enter your subject",
    message:"Please enter your message",
   }
  });
  $('#phoneNo').keypress(function(event){
   var keycode=event.which;//var x=event.keyCode;
   if(!(event.shiftKey==false&&(keycode==46||keycode==8||keycode==37||keycode==39||keycode==43||(keycode>=48&&keycode<=57)))){
    event.preventDefault();//stops the default action of an element from happening.
   }
  });

 });
</script>
<script src="https://www.google.com/recaptcha/api.js"></script>
  
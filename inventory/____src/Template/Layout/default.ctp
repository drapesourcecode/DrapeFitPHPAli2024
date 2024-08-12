<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta https-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title><?php echo!empty($title_for_layout) ? $title_for_layout : SITE_NAME; ?></title>
        <?php echo $this->Html->meta('keywords', (empty($metaKeyword) ? '' : $metaKeyword)); ?>
        <?php echo $this->Html->meta('description', (empty($metaDescription) ? '' : $metaDescription)); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= $this->Url->css('bootstrap.min.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?= $this->Url->css('style.css'); ?>" type="text/css">

        <!--        debasish add this link-->
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">-->
        <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>assets/css/bootstrap-datetimepicker.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/design.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/responsive-accordion.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/kidstyle.css" type="text/css">
        <script src='<?= $this->Url->script('jquery.min.js'); ?>'></script>
        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/moment-with-locales.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap-datetimepicker.js"></script>
        <!--end of debasish add this link-->
    </head>
    <body>
    
        

        <?= $this->element('frontend/header'); ?>
        <?= $this->fetch('content'); ?>

        <?php //echo $this->request->session()->read('CHAT_BUTTON'); exit;?>
        
        <?php   if (@$this->request->session()->read('Auth.User.id')=='') {?>
<style>

    .chat-form-new .chat-login {
        width: 300px;
        float: left;
        background: #dedede;
        position: fixed;
        border-radius: 14px 14px 4px 4px;
        bottom: 0;
        right: 10px;
        z-index: 11111;
    }
    /** .chat-form-new .chat-login form{
                padding: 20px 24px;
    } **/
    .chat-form-new .chat-login form {
        padding: 12px 17px;
        float: left;
        width: 100%;
        padding-bottom: 0;
    }
    .chat-form-new input[type=text] {
        width: 100%;
        margin-bottom: 11px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background: #fff;
        margin-top: 0;
    }
    .chat-form-new .chat-top {
        background: #232f3e;
        padding: 10px 18px;
        color: #fff;
        font-size: 19px;
        text-align: left;
        width: 100%;
        border-radius: 17px 17px 0 0;
        font-weight: bold;
        position: relative;
        cursor: pointer;
    }
    .chat-form-new .chat-top .ico-pl-min {
        position: absolute;
        height: 100%;
        width: 60px;
        top: 0;
        right: 0;
    }
    .chat-form-new .chat-top .ico-pl-min span {
        top: 14px;
        display: inline-block;
        font-size: 18px !important;
        position: absolute;
        width: 30px;
        text-align: center;
        left: -17px;
        top: 0;
        height: 100%;
        padding-top: 12px;
        cursor: pointer;
        display: inline-block;
    }
    .chat-form-new .chat-top .ico-pl-min span.minus{
        display: none;
    }
    .chat-form-new .chat-top.highlight .ico-pl-min span.minus {
        display: inline-block;
    }
    .chat-form-new .chat-top.highlight .ico-pl-min span.close-b{
        display: none;
    }
    .chat-form-new .chat-form label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 21px;
        font-weight: 700;
        width: 100%;
        float: left;
    }
    .chat-form-new button, .chat-form-new  input, .chat-form-new  select, .chat-form-new  textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        width: 100% !important;
        border-radius: 3px;
    }
    .chat-form-new #start {
        float: left;
        clear: both;
        width: 100%;
        padding-top: 7px;
        padding-bottom: 20px;
    }
    .chat-form-new .btn-primary {
        color: #313131;
        background-color: #dedede;
        /* border-color: #dedede; */
        font-size: 18px;
        border: dotted 2px #232f3e;
        width: 100%;
        display: inline-block;
        position: relative;
        padding: 11px 0;
        height: 50px;
        cursor: pointer;
    }
    .chat-form-new .btn-primary input[type="file"]{
        position: absolute;
        opacity: 0;
        width: 100% !important;
        height: 100%;
        top: 0;
        cursor: pointer;
        left: 0;
    }
    .chat-form-new .chat-form-new i.fa.fa-paperclip {
        position: absolute;
        bottom: 123px;
        left: 118px;
        font-size: 17px;
    }
    .chat-form-new .chat-login textarea#subject {
        height: 65px;
        border: 1px solid #ccc;
    }
    .chat-form-new .chat-login .btn-primary:hover {
        color: #fff;
        background-color: #232f3e;
        border-color: #cbe2ff;
    }

    .chat-form-new input[type=submit] {
        background-color: #232f3e!important;
        color: white;
        padding: 13px 20px;
        border: none;
        width: 33% !important;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
    }
    .chat-form-new [type=submit]:hover {
        background-color: #45a049;
    }
    .chat-form-new .cans {
        width: 100%;
        float: right;
        text-align: right;
        margin-bottom: 0px;
    }
    .chat-form-new .cans a{
        text-decoration: none;
        color: #232f3e;
    }
    .chat-form-new .cans a:hover{
        text-decoration: none;
        color: #232f3e;
    }
    .chat-form-new .cans span {
        width: 37%;
        display: inline-block;
        margin-left: 14px;
        text-align: left;
        font-size: 16px;
        color: #232f3e;
        margin-bottom: 20px;
        text-align: center;
        background: #dedede;
        padding: 11px 0;
        border-radius: 4px;
        border: solid #232f3e 1px;
    }
    .chat-form-new .chat-top .ico-pl-min span.fullclose {
    left: 16px;
}
.chat-form-new .chat-top .ico-pl-min span.fullclose .fa{
    font-size: 19px;
}
</style>


<div class="chat-form-new" id="chat-help" style="display: none;">
    <div class="chat-login">
        <div class="chat-top" data-toggle="collapse" data-target="#demo">Leave us a messagee<div class="ico-pl-min"><span class="minus"><i class="fa fa-plus"></i></span><span class="close-b"><i class="fa fa-minus"></i></span><span class="fullclose" id="close-bt"><a href="<?php echo HTTP_ROOT . 'help-close' ?>" style="color: #fff;"><i class="fa fa-times"></i></a></span></div></div>
        <div id="demo" class="collapse in">
            <?php echo $this->Form->create('', ['type' => 'file', 'url' => ['controller' => 'users','action' => 'index'],'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'chatHelp', 'class' => "chatHelp"]); ?>
            <label for="fname">Your name (optional)</label>
            <input type="text" id="fname" name="firstname" placeholder="">
            <label for="email">Email address</label>
            <input type="text" id="email" name="email" placeholder="">
            <label for="subject">How can we help you?</label>
            <textarea id="subject" name="subject" placeholder=""></textarea>
            <div id="start">
                <label for="subject">Attachments</label>
                <div id="notimage" class="hidden">Please select an image</div>
                <span id="file-upload-btn" class="btn btn-primary">
                    <input type="file" name="itmes[]" multiple=""  id ="image_upload">
                    <span id="image_upload-span">
                        <i class="fa fa-paperclip"></i> Add up to 5 files
                    </span>
                </span>
            </div>
            <div class="cans"> 
                <span><a id="cancel-bt" href="<?php echo HTTP_ROOT . 'help-close' ?>">Cancel</a></span>
                <input type="submit" value="Send" name="submit" class="submit">
            </div>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>





<div class="chat-form-new" id="chat-helpsuccess" style="display: none;">
    <div class="chat-login">
        <div class="chat-top" >Message send successfully </div>
        <div id="demo2">
            <form>
            <p><h3>Thank you for reching out</h3></p>
            <p>We will back to you soon</p>
            <div class="cans"> 
                <span><a href="<?php echo HTTP_ROOT . 'help-close' ?>">Close</a></span>
            </div>
            </form>
        </div>
    </div>


</div>

<script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'></script>
<script>
    $(".chat-top").click(function () {
        $(this).toggleClass("highlight");
    });
</script>
<script type="text/javascript">
    $('docoment') .on('click','#close-bt', function(){
        $('#cancel-bt').click();
    });
</script>
<script>
    $(function () {

        var // Define maximum number of files.
                max_file_number = 5,
                // Define your form id or class or just tag.
                $form = $('form'),
                // Define your upload field class or id or tag.
                $file_upload = $('#image_upload', $form),
                // Define your submit class or id or tag.
                $button = $('.submit', $form);

        // Disable submit button on page ready.
        $button.prop('disabled', 'disabled');

        $file_upload.on('change', function () {
            var number_of_images = $(this)[0].files.length;
            //alert(number_of_images);
            $('#image_upload-span').html('<i class="fa fa-paperclip"></i> ' + number_of_images + ' files');

            if (number_of_images > max_file_number) {
                alert(`You can upload maximum ${max_file_number} files.`);
                $(this).val('');
                $button.prop('disabled', 'disabled');
            } else {
                $button.prop('disabled', false);
            }
        });
    });

    $("#chatHelp").validate({
        rules: {
            firstname: {
                required: true,
            },
            subject: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            firstname: {
                required: "Please your  name"
            },

            subject: {
                required: "Please add your message"
            },
            email: {
                required: "Please enter your email address",
                email: 'Please add valid email address'
            },
        },
    });
</script>
<?php if ($this->request->session()->read('help-active') == 1) { ?>
    <script>
        $(function () {
            $('#chat-help').show();
            $('.live-chat-side').hide();
        });
    </script>
<?php } else { ?>
    <script>
        $(function () {
            $('#chat-help').hide();
           
        });
    </script>
<?php } ?>
<?php if ($this->request->session()->read('help-active') == 2) { ?>
    <script>
        $(function () {
            $('#chat-helpsuccess').show();
             $('.live-chat-side').hide();
        });
    </script>
<?php } else { ?>
    <script>
        $(function () {
            $('#chat-helpsuccess').hide();
        });
            </script
    <?php } ?>

<?php } ?>
        <b id="chat-div" style="
            <?php if ($this->request->session()->read('CHAT_BUTTON') == 'active') { ?> 
           display:block; 
          <?php } else { ?> display:none; <?php } ?>">
            <?php
            //if ($this->request->session()->read('CHAT_BUTTON') == 'active') {

            echo $this->cell('Chat::chat_support');
           // }
            ?>
        </b>
        <?= $this->element('frontend/footer'); ?>
        <?= $this->element('frontend/footer-copy-right'); ?>

        <input type="hidden" id="pageurl" value="<?php echo HTTP_ROOT ?>"/>
    </body>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker4').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker5').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        });
    </script>
    <script type="text/javascript">
  function downloadJSAtOnload() {
    var element = document.createElement("script");
    element.src = "https://cdn.collectiveray.com/defer.js";
    document.body.appendChild(element);
  }
  if (window.addEventListener)
    window.addEventListener("load", downloadJSAtOnload, false);
  else if (window.attachEvent)
    window.attachEvent("onload", downloadJSAtOnload);
  else window.onload = downloadJSAtOnload;
</script>
</html>
<!DOCTYPE html>
<html>
    <head>
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
        <style>
    .menu-bar.menu-list {
  display: none;
}
.footer {
  display: none;
}
.copy-right{
    display: none;
}
    
</style>
        <?= $this->element('frontend/header'); ?>
        <script>$('.menu-list').remove();</script>
<div class="undrconstr" style="height: 100vh;">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <h1>Site is under schedule maintenance 
                <!--<span>12.00 AM CST To 4 AM CST</span>-->
                </h1>
            </div>            
        </div>                
    </div>    
</div>




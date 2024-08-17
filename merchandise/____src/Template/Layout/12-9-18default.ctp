
<?php

  $cakeDescription = 'CakePHP: the rapid development php framework';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title><?php echo SITE_NAME ?></title>
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/responsive-accordion.css" type="text/css">
        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'></script>
        <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js'></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
  <script>
   $(document).ready(function () {
    $('#s').delay(5000).fadeOut('slow');
    $('#e').delay(5000).fadeOut('slow');
   });
  </script>
  

   <?= $this->element('frontend/header'); ?>
   <?= $this->Flash->render() ?>
   <?= $this->fetch('content'); ?>
   <?= $this->element('frontend/footer'); ?>

  <input type="hidden" id="pageurl" value="<?php echo HTTP_ROOT ?>"/>
 </body>
</html>
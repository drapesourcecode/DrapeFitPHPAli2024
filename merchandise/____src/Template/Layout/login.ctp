<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <link rel="icon" type="image/png" sizes="16x16" href="<?php echo HTTP_ROOT;?>img/favicon.ico">
          
        <title> <?php echo !empty($title_for_layout) ? $title_for_layout : SITE_NAME_TEXT; ?> </title>
        <?php echo $this->Html->meta('keywords', (empty($metaKeyword) ? '' : $metaKeyword)); ?>
        <?php echo $this->Html->meta('description', (empty($metaDescription) ? '' : $metaDescription)); ?>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?PHP echo HTTP_ROOT ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?PHP echo HTTP_ROOT ?>css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?PHP echo HTTP_ROOT ?>ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?PHP echo HTTP_ROOT ?>dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?PHP echo HTTP_ROOT ?>plugins/iCheck/square/blue.css">
         <link href= "<?php echo HTTP_ROOT; ?>css/style.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
          <?php echo $this->Html->script(array('validator.min')); ?>  
  <script>
    $(document).ready(function() {
      //  alert("hii");
    $('#s').delay(5000).fadeOut('slow');
    $('#e').delay(5000).fadeOut('slow');
});
    </script>
    </head>
    <body class="hold-transition login-page">
        <style>
               #e {
                 right: 33.5%;
                 top: 36px;
            }
             #s {
                 right: 33.5%;
                   top: 36px;
            }
            </style>
         <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <script src="<?PHP echo HTTP_ROOT ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?PHP echo HTTP_ROOT ?>bootstrap/js/bootstrap.min.js"></script>
       
        <script src="<?PHP echo HTTP_ROOT ?>plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>

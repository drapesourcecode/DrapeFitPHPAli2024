<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Print  | Product Invoice</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>dist/css/AdminLTE.min.css">


    </head>
    <style>
         @page {
    height:150mm;
    width:100mm;
    margin: 0;  
  }
        .post p{
            font-size: 12px;
            font-weight: 600;
        }
        .center-box{
            display: inline-block;
            width: 50%;
            text-align: left;
        }

    </style>
    <body onload="window.print();">
      <div class="barcode-box" style="overflow: hidden;transform: rotate(90deg);width: 200px; text-align:center; padding:7px 15px; height: 155px; display: inline-block; margin:9px 9px 9px 70px; box-sizing: border-box;box-sizing: border-box;">
        <h3 style="margin: 6px 0 0; font-size: 11px; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; color: #000; text-align: center; float: left; width: 100%;"><strong><?php echo $product->product_name_one; ?></strong></h3>
        <!--<h4 style="margin: 4px 0 0px; font-size: 12px; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; color: #000; text-align: center; float: left; width: 100%;"><?php echo $product->product_name_two; ?></h4>-->
        <div style="float: right; width: 100%; margin-bottom: 2px;">
          <h5 style="margin:0;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 11px; float: left; color: #000;"><span style="color: #232f3e; margin-right: 5px;font-size: 11px;">Size :</span><strong><?php echo $product->size; ?></strong></h5>
          <h5 style=" margin:0;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 11px; float:right; color: #000;"><span style="color: #232f3e; margin-right: 5px;font-size: 11px;">Color :</span><strong><?php echo $product->color; ?><strong></h5>
        </div>
        <img src="<?php echo HTTP_ROOT . BARCODE. @$product->barcode_image; ?>" style="width:95%;">
        <h3 style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; margin: 5px 0 0 0; width: 100%; text-align: center; font-size: 11px; color: #000; font-weight: bold; float: left;"><?php echo @$product->barcode_value; ?></h3>
       </div>
    </body>
</html>

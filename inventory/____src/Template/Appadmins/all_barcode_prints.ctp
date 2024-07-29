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
            size: auto;  
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
        <?php foreach ($all_product as $product) { ?>
        
   
                <div class="barcode-box" style=" width: 225px;
    text-align: center;
    /* padding: 7px 15px; */
    height: 106px;
    display: inline-block;
    margin: 15px -59px;
    box-sizing: border-box;
    box-sizing: border-box;
    transform: rotate(90deg);margin: 60px 120px 119px">
                <h3 style="margin: 6px 0 0; font-size: 10px; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; color: #000; text-align: center; float: left; width: 100%;"><strong><?php echo $product->product_name_one; ?></strong></h3>
                <!--<h4 style="margin: 4px 0 8px; font-size: 11px; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; color: #000; text-align: center; float: left; width: 100%;"><?php echo $product->product_name_two; ?></h4>-->
                <div style="float: right;
    width: 100%;
    /* border-top: 1px solid #cecece; */
    /* border-bottom: 1px solid #cecece; */
    padding: 0 10px;
    margin-bottom: 0;">
                    <h5 style="margin:0;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 11px; float: left; color: #000;"><span style="color: #232f3e; margin-right: 5px;font-size: 13px;">Size :</span><strong><?php
                            if (!empty($product->picked_size)) {
                                $li_size = explode('-', $product->picked_size);
                                foreach ($li_size as $idx => $sz_l) {
                                 //   if ($idx == 0) {
                                        echo!empty($product->$sz_l) ? $product->$sz_l . '&nbsp;&nbsp;' : '';
                                 //   }
                                    
                                }
                            }
                            if(!empty($product->primary_size) && ($product->primary_size=='free_size')){ echo "Free Size"; }
                            ?></strong></h5>
                    <h5 style="margin:0;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 11px; float:right; color: #000;"><span style="color: #232f3e; margin-right: 5px;font-size: 13px;">Color :</span><strong><?php
                            $color_arr = $this->Custom->inColor();
                            echo $color_arr[$product->color];
                            ?></strong></h5>
                                </div>
                                <img src="<?php echo HTTP_ROOT . BARCODE . @$product->bar_code_img; ?>" style="width: 70%;">
                                <!--<h3 style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; margin: 2px 0 0 0; width: 100%; text-align: center; font-size: 11px; color: #000; font-weight: bold; float: left;"><?php //echo @$product->dtls; ?></h3>-->
                                <h3 style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; margin: 0px 0 0 0; width: 100%; text-align: center; font-size: 13px; color: #000; font-weight: bold; float: left;"><?php echo @$product->style_number; ?></h3>
                                </div>
                                
        <br>
                            <?php } ?>
                            </body>
                            </html>

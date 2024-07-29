<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Print  | Product Invoice</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    </head>

    <style>
        body{
            text-align: center;
        }
        @page {
            size: 5.5in 8.5in;  
            margin:10pt 0pt 40pt;
        }
        page{
            background: white;
            display: inline-block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            /*box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);*/
        }
        page[size="A4"]{  
            width: 21cm;
        }
    </style>

    <body onload="window.print();">
    <page size="A4">
        <div style="float: left; width: 100%; padding: 20px;">
            <div style="float: left; width: 95%;">
                <div style="text-align:center;">
                    <div class="post" style="margin: 0;padding: 0;border:none;color: none;display: inline-block;">    
                        <li style="display:inline-block;margin: 15px 280px;">                               
                            <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $userdetails->user_detail->barcode_image ?>" style="text-align:center;"> <br> 
                        </li>
                        <p>Name:  <span><?php echo $userdetails->name; ?></span></p> 
                        <p>Email:  <span><?php echo $userdetails->email; ?></span></p>
                        <p>Date:  <span><?php echo $userdetails->created_dt; ?></span></p>
                        <p>Address: 
                            <span>

                                <?php echo $shipping_address->address; ?>
                                <?php echo $shipping_address->address_line_2; ?>
                                <?php echo $shipping_address->city; ?>
                                <?php echo $shipping_address->state; ?>
                                <?php echo $shipping_address->zipcode; ?>
                                <?php echo $shipping_address->country; ?>
                                <?php echo $shipping_address->phone; ?>
                            </span>
                        </p>                        
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your height?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo $PersonalizedFix->tell_in_feet; ?></span>ft.</div>
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo $PersonalizedFix->tell_in_inch; ?></span>in.</div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your weight?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block; font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo @$PersonalizedFix->weight_lbs; ?></span>ft.</div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">Your birthday? </h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;"><?php
                                if (@$Womeninfo->birthday != '') {
                                    echo @$Womeninfo->birthday;
                                };
                                ?></span></div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Are you parent ?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;">

                            <span style="float: left; padding: 10px;width: 32px;text-align: center; <?php if (@$Womeninfo->parent == 1) { ?> background: #ff6c00; border: 1px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc; <?php } ?> border-top-left-radius: 3px; border-bottom-left-radius: 3px; font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womeninfo->parent == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>

                                <span style="position: relative; z-index: 111;">Yes</span></span>

                            <span style="<?php if (@$Womeninfo->parent == '0') { ?> background: #ff6c00; border: 1px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc; <?php } ?>float: left;  padding: 10px;width: 32px;text-align: center; border-top-right-radius: 3px; border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womeninfo->parent == 0) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">No</span></span>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What's your body type?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Inverted Triangle</h4>
                        <div style=" float: left; width: 100%; <?php if (@$Womeninfo->body_type == 2) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?>   text-align: center; position: relative;">
                            <?php if (@$Womeninfo->body_type == 2) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/inverted-triangle.jpg" alt="">
                        </div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Triangle</h4>
                        <div style=" float: left; width: 100%; <?php if (@$Womeninfo->body_type == 3) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative;">
                            <?php if (@$Womeninfo->body_type == 3) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/triangle.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Rectangle</h4>
                        <div style=" float: left; width: 100%; <?php if (@$Womeninfo->body_type == 1) { ?> border: 2px solid #ff6c00; <?php } else { ?> border:2px solid #ccc; <?php } ?> text-align: center; position: relative;"><img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/rectangle.jpg" alt="">
                            <?php if (@$Womeninfo->body_type == 1) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                        </div>
                    </li>

                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Hourglass</h4>
                        <div style=" float: left; width: 100%; <?php if (@$Womeninfo->body_type == 4) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative;"><img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/hourglass.jpg" alt="">
                            <?php if (@$Womeninfo->body_type == 4) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                        </div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Apple</h4>
                        <div style=" float: left; width: 100%; text-align: center; position: relative; <?php if (@$Womeninfo->body_type == 5) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?>">
                            <?php if (@$Womeninfo->body_type == 5) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/apple.jpg" alt="">
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 50px 0 20%;">Page 1</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">What size you prefer? </h3>
                <div style="float: left; width:100%;">
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">PANTS</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->pants; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">BRA SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px;font-size: 15px;"><?php echo @$SizeChart->bra; ?></span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo $SizeChart->bra_recomend; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">SKIRT SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo $SizeChart->skirt; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">JEANS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->jeans; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">DRESS</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->dress; ?></span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->dress_recomended; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">SHIRT & BLOUSE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo $SizeChart->shirt_blouse; ?></span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->shirt_blouse_recomend; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 13px; color: #232f3e; margin-bottom: 8px;">TOP SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->pantsr1; ?></span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->pantsr2; ?></span></div>
                    </div>

                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your shoe size?</h3>
                <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px; width: 100px;"><?php echo @$SizeChart->shoe; ?></span></div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Which style of shoes do you prefer?(Select all that apply)</h3>
                <div style="float: left; width: 100%;">
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($women_shoe_prefer->brands) && in_array('Pumps', explode(',', @$women_shoe_prefer->brands))) { ?>  <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span> <?php } ?>
                            Pumps</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"> <?php if (isset($women_shoe_prefer->brands) && in_array('Sandals', explode(',', @$women_shoe_prefer->brands))) { ?>  <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span> <?php } ?>

                            Sandals</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">


                            <?php if (isset($women_shoe_prefer->brands) && in_array('Sneakers', explode(',', @$women_shoe_prefer->brands))) { ?>  <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span> <?php } ?>

                            Sneakers</li>

                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($women_shoe_prefer->brands) && in_array('Boots-Booties', explode(',', @$women_shoe_prefer->brands))) { ?>  <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span> <?php } ?>

                            Boots & Booties</li>

                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($women_shoe_prefer->brands) && in_array('Loafers-Flats', explode(',', @$women_shoe_prefer->brands))) { ?>  <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span> <?php } ?>

                            Loafers & Flats</li>

                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">

                            <?php if (isset($women_shoe_prefer->brands) && in_array('Wedges', explode(',', @$women_shoe_prefer->brands))) { ?>  <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span> <?php } ?>

                            Wedges
                        </li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">

                            <?php if (isset($women_shoe_prefer->brands) && in_array('Clogs-Mules', explode(',', @$women_shoe_prefer->brands))) { ?>  <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span> <?php } ?>

                            Clogs & Mules</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($women_shoe_prefer->brands) && in_array('Platforms', explode(',', @$women_shoe_prefer->brands))) { ?>  <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span> <?php } ?>
                            Platforms
                        </li>
                    </ul>
                </div>
            </div>

            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Which heel height do you prefer?(Select all that apply)</h3>
                <div style="float: left; width: 100%;">
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">

                            <?php if (isset($womenHeelHightPrefer->height) && in_array('Flat(Under 1")', explode(',', @$womenHeelHightPrefer->height))) { ?> <span style="border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span><?php } ?>

                            Flat(Under 1")</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($womenHeelHightPrefer->height) && in_array('High(3"-4")', explode(',', @$womenHeelHightPrefer->height))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span><?php } ?>

                            High(3"-4")</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($womenHeelHightPrefer->height) && in_array('Low(1"-2")', explode(',', @$womenHeelHightPrefer->height))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span><?php } ?>
                            Low(1"-2")</li>

                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($womenHeelHightPrefer->height) && in_array('Ultra High(4.5"+)', explode(',', @$womenHeelHightPrefer->height))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span><?php } ?>

                            Ultra High(4.5"+)</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">

                            <?php if (isset($womenHeelHightPrefer->height) && in_array('Mid(2"-3")', explode(',', @$womenHeelHightPrefer->height))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?> <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span><?php } ?>

                            Mid(2"-3")</li>
                    </ul>
                </div>
            </div>


<div style="float: left; width: 96%; margin: 50px 0 50%;">Page 2</div>








            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your profession? </h3>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">

                        <?php if (@$Womeninfo->occupation_v2 == 1) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>


                        Architecture / Engineering</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 2) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Art / Design</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 3) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Building / Maintenance</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 4) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>

                        Business / Client Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 5) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Community / Social Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 6) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Computer / IT</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 7) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Education</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 8) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Entertainer / Performer</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 9) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Farming / Fishing / Forestry</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 10) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Financial Services</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 11) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Health Practitioner / Technician</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 12) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>

                        Hospitality / Food Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 13) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Management</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 14) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Media / Communications</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 15) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Military / Protective Service
                    </li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 16) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>

                        Legal
                    </li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 17) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>

                        Office / Administration
                    </li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 18) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Average
                    </li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 19) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Personal Care & Service
                    </li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 20) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Production / Manufacturing</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 21) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Retail</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 22) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>

                        <?php } ?>
                        Sales</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 23) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Science</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 24) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Technology</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 25) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>Transportation</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 26) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Self-Employed</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 27) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Stay-At-Home Parent</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 28) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Student</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 29) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Retired</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 30) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>Not Employed</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$Womeninfo->occupation_v2 == 31) { ?>
                            <span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                        <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative;overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Other</li>
                </ul>
            </div>

            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Tell us your skin Tone?</h3>
                <ul style="float: left; width: 100%; list-style-type: none; margin: 0; padding:0;">
                    <li style="float: left; width: 80px;height: 80px;  <?php if (@$Womeninfo->skin_tone == 1) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff;   <?php } ?> background: #fdc8b9; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg1.jpg" alt=""></li>
                    <li style="float: left; width: 80px;height: 80px;<?php if (@$Womeninfo->skin_tone == 2) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff;   <?php } ?>; background: #f0b4a2; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg2.jpg" alt=""></li>
                    <li style="float: left; width: 80px;height: 80px;<?php if (@$Womeninfo->skin_tone == 3) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff;   <?php } ?> background: #d0967e; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg3.jpg" alt=""></li>
                    <li style="float: left; width: 80px;height: 80px; <?php if (@$Womeninfo->skin_tone == 4) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff;   <?php } ?>; background: #c57456; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg4.jpg" alt=""></li>
                    <li style="float: left; width: 80px;height: 80px; <?php if (@$Womeninfo->skin_tone == 5) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff;   <?php } ?> background: #78412a; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg5.jpg" alt=""></li>
                    <li style="float: left; width: 80px; height: 80px;<?php if (@$Womeninfo->skin_tone == 6) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff;   <?php } ?> background: #e6e6e6; border-radius: 100%; text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px; padding-top: 35px; box-sizing: border-box; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg6.jpg" alt=""><span style=" position: relative; z-index: 111;">Other</span></li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What parts of your body are you comfortable showing off?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Arms', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Arms', explode(',', @$Womeninfo->comfortable_showing_off))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Arms</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Bust', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Bust', explode(',', @$Womeninfo->comfortable_showing_off))) { ?>
                        <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Bust</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Stomach', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Stomach', explode(',', @$Womeninfo->comfortable_showing_off))) { ?>
                        <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Stomach</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Back', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Back', explode(',', @$Womeninfo->comfortable_showing_off))) { ?>
                        <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Back</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Waist', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Waist', explode(',', @$Womeninfo->comfortable_showing_off))) { ?>
                        <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Waist</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Hips/Butt', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Hips/Butt', explode(',', @$Womeninfo->comfortable_showing_off))) { ?>
                        <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Hips/Butt</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Legs', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Legs', explode(',', @$Womeninfo->comfortable_showing_off))) { ?>
                        <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?><span style="position: relative;z-index: 111;">Legs</span></li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What parts of your body do you like to keep covered?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($Womeninfo->keep_covered) && in_array('Arms', explode(',', @$Womeninfo->keep_covered))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->keep_covered) && in_array('Arms', explode(',', @$Womeninfo->keep_covered))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Arms</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->keep_covered) && in_array('Bust', explode(',', @$Womeninfo->keep_covered))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->keep_covered) && in_array('Bust', explode(',', @$Womeninfo->keep_covered))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Bust</span></li></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->keep_covered) && in_array('Stomach', explode(',', @$Womeninfo->keep_covered))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->keep_covered) && in_array('Stomach', explode(',', @$Womeninfo->keep_covered))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Stomach</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->keep_covered) && in_array('Back', explode(',', @$Womeninfo->keep_covered))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->keep_covered) && in_array('Back', explode(',', @$Womeninfo->keep_covered))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Back</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($Womeninfo->keep_covered) && in_array('Waist', explode(',', @$Womeninfo->keep_covered))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->keep_covered) && in_array('Waist', explode(',', @$Womeninfo->keep_covered))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Waist</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($Womeninfo->keep_covered) && in_array('Hips/Butt', explode(',', @$Womeninfo->keep_covered))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->keep_covered) && in_array('Hips/Butt', explode(',', @$Womeninfo->keep_covered))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Hips/Butt</span></li>
                    <li style="position: relative;float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($Womeninfo->keep_covered) && in_array('Legs', explode(',', @$Womeninfo->keep_covered))) { ?> background: #232f3e;color: #fff; <?php } ?>">
                        <?php if (isset($Womeninfo->keep_covered) && in_array('Legs', explode(',', @$Womeninfo->keep_covered))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Legs</span></li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">Your Proportions?</h3>
                <div style="float: left; width:100%;">
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Shoulders?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->proportion_shoulders; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Legs?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px;font-size: 15px;"><?php echo @$SizeChart->proportion_legs; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Arms?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->proportion_arms; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Hips?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$SizeChart->proportion_hips; ?></span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 100%; margin: 0px 0 0;">Page 3</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Are you a pregnant?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;">
                            <span style="float: left; <?php if (@$Womeninfo->pregnant == 1) { ?> border: 1px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> padding: 10px;width: 32px;text-align: center;<?php if (@$Womeninfo->pregnant == 1) { ?> background: #ff6c00; <?php } ?>border-top-left-radius: 3px; border-bottom-left-radius: 3px; font-size: 15px;position: relative; overflow: hidden;">
                            
                             <?php if (@$Womeninfo->pregnant == 1) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span></span>
                            </span>
                            
                            <span style="float: left; <?php if (@$Womeninfo->pregnant == 0) { ?> border: 1px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?>  padding: 10px;<?php if (@$Womeninfo->pregnant == 0) { ?> background: #ff6c00; <?php } ?> width: 32px;text-align: center; border-top-right-radius: 3px; border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womeninfo->pregnant == 0) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } ?>
                                <span style="position: relative; z-index: 111;">No</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (@$Womeninfo->pregnant == 1) { ?>
                <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                    <div style="float: left;width: 45%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">What is your due date?</h3>
                        <div style="float: left; width: 100%;">
                            <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;"><?php echo date('m/d/Y', strtotime(@$SizeChart->expected_due_date)) ?></span></div>
                        </div>
                    </div>
                </div>
                <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                    <div style="float: left;width: 45%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">your maternity fit ?</h3>
                        <div style="float: left; width: 100%;">
                            <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px; width: 90px;">
                                <?php if($SizeChart->is_prefer_maternity==0){echo "";}else{echo $SizeChart->is_prefer_maternity;} ?>
                                </span></div>
                        </div>
                    </div>
                </div>
                <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                    <div style="float: left;width: 45%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">Loose Fitted mix of both</h3>
                        <div style="float: left; width: 100%;">
                            <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px; width: 90px;"><?php if($SizeChart->loose_fitted==0){ echo "";}else{ echo $SizeChart->loose_fitted;} ?></span></div>
                        </div>
                    </div>
                </div>
                <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Are you a pregnant ?</h3>
                    <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                        <li style=" float: left; width: 19%;margin-right: 7px;">
                            <div style=" float: left; width: 100%; <?php if (@$SizeChart->is_pregnant == 2) { ?> border: 2px solid #ff6c00;<?php } else {?> border: 1px solid #ccc; <?php } ?>  text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                                <?php if (@$SizeChart->is_pregnant == 2) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                                </span>  <?php } ?>

                                <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/leady-belly4.png" alt=""></div>
                            <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Regular pants with an under-the-belly type</p>
                        </li>
                        
                        <li style=" float: left; width: 19%;margin-right: 7px;">

            <div style=" float: left; width: 100%; <?php if (@$SizeChart->is_pregnant == 3) { ?> border: 2px solid #ff6c00;<?php } else {?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                                <?php if (@$SizeChart->is_pregnant == 3) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">

                                </span>  <?php } ?>

                                <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/leady-belly3.png" alt=""></div>
                            <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">All-around stretch to give light support</p>
                        </li>
                        
                        <li style=" float: left; width: 19%;margin-right: 7px;">
                            <div style=" float: left; width: 100%;<?php if (@$SizeChart->is_pregnant == 1) { ?> border: 2px solid #ff6c00;<?php } else {?>  border:1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                                <?php if (@$SizeChart->is_pregnant == 1) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                                </span>  <?php } ?>

                                <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/leady-belly2.png" alt=""></div>
                            <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Elastic side panels</p>
                        </li>
                        <li style=" float: left; width: 19%;margin-right: 7px;">
                            <div style=" float: left; width: 100%;<?php if (@$SizeChart->is_pregnant == 4) { ?> border: 2px solid #ff6c00;<?php } else {?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                                <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/leady-belly1.png" alt="">
                                <?php if (@$SizeChart->is_pregnant == 4) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                                </span>  <?php } ?>
                            </div>
                            <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Fits over bump for maximum support</p>
                        </li>
                    </ul>
                </div>
            <?php } ?>

            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">You social media profiles will help your personal Stylist to know you better. </h3>
                <div style="float: left;width: 45%;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">LINKEDIN PROFILE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px;"><?= @$Womenstyle->linkdin_profile; ?></p>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">INSTAGRAM HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px;"><?= @$Womenstyle->instagram; ?></p>
                    </div>
                </div>
                <div style="float: left;width: 45%;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">TWITTER HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px; margin-bottom: 0;"><?= @$Womenstyle->twitter; ?></p>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">PINTEREST HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px; margin-bottom: 0;"><?= @$Womenstyle->pinterest; ?></p>
                    </div>
                </div>
            </div>
            <?php if (@$Womeninfo->pregnant == 1) { ?>
            <div style="float: left; width: 100%; margin: 50px 0 3%;">Page 4</div>
            <?php } ?>
            
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Style Inspiration</h3>
                <p style="margin-top: 0;color: #8c8c8c;font-size: 15px;">Are you looking to incorporate more of the styles below into your wardrobe? Select the styles below that you inspire to look like or would like to explore.</p>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Bohemian</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> 
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/bohemian.jpg" alt=""></div>
                    </li>

                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Casual</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/casual.jpg" alt="">

                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> 
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                        </div>
                    </li>

                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Classic</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/classic.jpg" alt="">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> 
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                        </div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Edgy</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> 
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/edgy.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Trendy</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> 
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>


                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/trendy.jpg" alt="">



                        </div>
                    </li>
                </ul>
            </div>
            <?php if (@$Womeninfo->pregnant == 0) { ?>
            <div style="float: left; width: 100%; margin: 50px 0 55%;">Page 4</div>
            <?php } ?>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Please tell us the OutFit you prefer to wear. </h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> border: 1px solid #ff6c00; <?php } else {?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> 
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit1.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                            <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v3 == 2) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>

                                    Always dress this way</li>

                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v3 == 3) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> Sometimes dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v3 == 4) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> Occasionally dress this way </li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v3 == 5) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> Never this way</li>
                            </ul> 
                        </div>
                    </li>


                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px;<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> border: 1px solid #ff6c00; <?php } else {?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                                </span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit2.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                            <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v4 == 2) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> 

                                    Always dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"> <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v4 == 3) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> Sometimes dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v4 == 4) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> Occasionally dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v4 == 5) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> Never this way</li>
                            </ul> 
                        </div>
                    </li>

                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px;  <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> border: 1px solid #ff6c00; <?php } else {?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                           <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                            <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                        </span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit3.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                            <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"> 
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v5 == 2) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> Always dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v5 == 3) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Sometimes dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v5 == 4) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Occasionally dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v5 == 5) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?> Never this way</li>
                            </ul> 
                        </div>
                    </li>

                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> border: 1px solid #ff6c00; <?php } else {?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                           <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                            <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                        </span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit4.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                            <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v6 == 2) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Always dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v6 == 3) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Sometimes dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v6 == 4) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Occasionally dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v6 == 6) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Never this way</li>
                            </ul> 
                        </div>
                    </li>
                    
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> border: 1px solid #ff6c00; <?php } else {?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                           <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                            <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                        </span> <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit5.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                            <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v7 == 2) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>
                                    Always dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v7 == 3) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Sometimes dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v7 == 4) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Occasionally dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v7 == 5) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Never this way</li>
                            </ul> 
                        </div>
                    </li>

                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> border: 1px solid #ff6c00; <?php } else {?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">

                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('6', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                                </span> <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit6.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                            <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v8 == 2) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Always dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v8 == 3) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Sometimes dress this way</li>

                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v8 == 4) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Occasionally dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v8 == 5) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Never this way</li>
                            </ul> 
                        </div>
                    </li>
                    <?php if (@$Womeninfo->pregnant == 1) { ?>
            <div style="float: left; width: 100%; margin: 30px 0 3%; text-align: center;">Page 5</div>
            <?php } ?>
            <?php if (@$Womeninfo->pregnant == 0) { ?>
                    <div style="float: left; width: 100%; margin: 30px 0 48%; text-align: center;">Page 5</div>
                    <?php } ?>
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('7', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> border: 1px solid #ff6c00; <?php } else {?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                          <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('7', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                                </span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit7.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                            <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v9 == 2) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>
                                    Always dress this way</li>

                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v9 == 3) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>
                                    Sometimes dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v9 == 4) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Occasionally dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v9 == 5) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Never this way</li>
                            </ul> 
                        </div>
                    </li>
                    
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('8', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> border: 1px solid #ff6c00; <?php } else {?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('8', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> 
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                                </span> 
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit8.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                            <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v11 == 7) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Always dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v11 == 8) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Sometimes dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v11 == 9) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Occasionally dress this way</li>
                                <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;">
                                    <?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v11 == 10) { ?> 
                                        <span style="background: #ff6c00; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""></span>
                                    <?php } else { ?>
                                        <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></span> 
                                    <?php } ?>Never this way</li>
                            </ul> 
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What patterns should we avoid?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Lace</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?>border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/lace.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Animal Print</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?>border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/animal-print.jpg" alt="">

                        </div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Tribal</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?>border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/tribal.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Polak Dot</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?>border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/polkadot.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Stripes</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?>border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;">
                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/stripes.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Floral</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('6', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?>border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;">

                            <?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('6', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/floral.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
             <div style="float: left; width: 100%; margin: 50px 0 10%;">Page 6</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;margin-bottom: 0;">Tell Us Which Color do you want to prefer?      </h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Black</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 1) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #000000;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color1.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Grey</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 2) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #c2c2c2;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">White</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 3) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #fff;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Cream</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 4) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #eed7c1;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color3.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Brown</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 5) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #7f3a3e;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color4.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Purple</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px; <?php if (@$style_sphere_selectionsWemen->color_prefer == 6) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #88007c;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color5.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Green</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px; <?php if (@$style_sphere_selectionsWemen->color_prefer == 7) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #008020;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color6.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Blue</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px; <?php if (@$style_sphere_selectionsWemen->color_prefer == 8) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #001bf8;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color7.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Orange</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 9) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #ffa031;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color8.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Yellow</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 10) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #fffe45;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color9.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Red</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 11) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #ff001c;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color10.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Pink</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (@$style_sphere_selectionsWemen->color_prefer == 12) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #ffbdca;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color11.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Which colors do you tend to mostly wear?</h3>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">NEUTRALS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Black', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Black</li>

                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Grey', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>Grey</li>

                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Navy', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>


                            Navy</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Beige', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Beige</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('nWhite', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            White
                        </li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">COLOR</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Red', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Red</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Blue', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Blue</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Yellow', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Yellow</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Purple', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Purple</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">LIGHTS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('White', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            White</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Sand', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Sand</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Pastels', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Pastels</li>
                    </ul>
                </div>
            </div>

            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What do you feel is missing from your FIT?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Sweaters', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> background: #232f3e; color: #fff; <?php } ?>">
                        
                        <?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Sweaters', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Sweaters</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Blouses', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> background: #232f3e; color: #fff; <?php } ?>">

                        <?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Blouses', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Blouses</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Jeans', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> background: #232f3e; color: #fff; <?php } ?>">
                        <?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Jeans', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Jeans</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Pants', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> background: #232f3e; color: #fff; <?php } ?>">
                        <?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Pants', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Pants</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Skirts', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> background: #232f3e; color: #fff; <?php } ?>">
                        <?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Skirts', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Skirts</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Dresses', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> background: #232f3e; color: #fff; <?php } ?>">
                        <?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Dresses', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?>
                                    <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                                <?php } ?>
                        <span style="position: relative;z-index: 111;">Dresses</span></li>

                </ul>
            </div>
            <div style="float: left; width: 100%; margin: 50px 0 30%;">Page 7</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Would you wear any of these denim styles?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0;">

                    <li style="display: inline-block; width:32%;">
                        <div style="float: left; width: 100%"><img src="<?php echo HTTP_ROOT ?>assets/images/denim1.jpg" alt="" width="223" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">

                            <span style=" display: inline-block; <?php if (@$Womenstyle->distressed_denim_non == 'Yes') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_non == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                           <span style="position: relative; z-index: 111;">Yes</span></span>

                            <span style="display: inline-block; <?php if (@$Womenstyle->distressed_denim_non == 'Maybe') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_non == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Maybe</span></span>

                            <span style="display: inline-block; <?php if (@$Womenstyle->distressed_denim_non == 'never') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_non == 'never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                
                                <span style="position: relative; z-index: 111;">Never</span></span>

                        </div>
                    </li>


                    <li style="display: inline-block; width:32%;">
                        <div style="float: left; width: 100%"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/denim2.jpg" alt="" width="223" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">

                            <span style=" display: inline-block; <?php if (@$Womenstyle->distressed_denim_minimally == 'Yes') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_minimally == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Yes</span></span>

                            <span style="display: inline-block; <?php if (@$Womenstyle->distressed_denim_minimally == 'Maybe') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_minimally == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>

                            <span style="display: inline-block; <?php if (@$Womenstyle->distressed_denim_minimally == 'never') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                 <?php if (@$Womenstyle->distressed_denim_minimally == 'never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Never</span>
                                </span>

                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <div style="float: left; width: 100%"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/denim3.jpg" alt="" width="223" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style=" display: inline-block; <?php if (@$Womenstyle->distressed_denim_fairly == 'Yes') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_fairly == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            <span style="display: inline-block; <?php if (@$Womenstyle->distressed_denim_fairly == 'Maybe') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?>padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_fairly == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Maybe</span></span>

                            <span style="display: inline-block; <?php if (@$Womenstyle->distressed_denim_fairly == 'never') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_fairly == 'never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <div style="float: left; width: 100%"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/denim4.jpg" alt="" width="223" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style=" display: inline-block; <?php if (@$Womenstyle->distressed_denim_heavily == 'Yes') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$Womenstyle->distressed_denim_heavily == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Yes</span>
                               </span>
                            <span style="display: inline-block;<?php if (@$Womenstyle->distressed_denim_heavily == 'Maybe') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?>padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;"> 
                                <?php if (@$Womenstyle->distressed_denim_heavily == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>

                            <span style="display: inline-block;<?php if (@$Womenstyle->distressed_denim_heavily == 'never') { ?> background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>  border: 1px solid #ccc;  <?php } ?> padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$Womenstyle->distressed_denim_heavily == 'never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Never</span></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">How often do you dress for the following occasions? </h3>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;">
                        <?php if ($style_sphere_selectionsWemen->following_occasions == 1) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            </span> <?php } else { ?>

                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Business Casual / Work</li>

                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;">
                        <?php if ($style_sphere_selectionsWemen->following_occasions == 2) { ?>  <<span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            </span> <?php } else { ?>

                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Cocktail / Wedding / Special</li>

                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;">

                        <?php if ($style_sphere_selectionsWemen->following_occasions == 3) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            </span> <?php } else { ?>

                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Most of the time</li>

                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;">
                        <?php if ($style_sphere_selectionsWemen->following_occasions == 4) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            </span> <?php } else { ?>

                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Around once or twice a week</li>

                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;">

                        <?php if ($style_sphere_selectionsWemen->following_occasions == 5) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            </span> <?php } else { ?>

                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Around once or twice a month</li>

                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;">
                        <?php if ($style_sphere_selectionsWemen->following_occasions == 7) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            </span> <?php } else { ?>

                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Date Night / Night Out</li>

                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;">

                        <?php if ($style_sphere_selectionsWemen->following_occasions == 8) { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            </span> <?php } else { ?>

                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Laid Back Casual</li>

                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;">
                        <?php if ($style_sphere_selectionsWemen->following_occasions == 6) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            </span> <?php } else { ?>
                            <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            </span>
                        <?php } ?>
                        Rarely</li>

                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What do you feel is missing from your closet? </h3>
                <div style="float: left; width: 100%;">
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">

                            <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Sweaters', explode(',', @$WomenJeansStyle->jeans_style))) { ?> 
                                <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> 
                            <?php } else { ?>       
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Sweaters
                        </li>

                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Blouses', explode(',', @$WomenJeansStyle->jeans_style))) { ?> 
                                <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> 
                            <?php } else { ?>       
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Blouses</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Jeans', explode(',', @$WomenJeansStyle->jeans_style))) { ?> 
                                <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Jeans</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Pants', explode(',', @$WomenJeansStyle->jeans_style))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?> Pants</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Skirts', explode(',', @$WomenJeansStyle->jeans_style))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>
                            Skirts</li>
                        <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;">
                            <?php if (isset($WomenJeansStyle->jeans_style) && in_array('Dresses', explode(',', @$WomenJeansStyle->jeans_style))) { ?> <span style="position: relative; overflow: hidden; border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } else { ?>
                                <span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>
                            <?php } ?>

                            Dresses</li>
                    </ul>
                </div>
            </div>
            <div style="float: left; width: 100%; margin: 50px 0 12%;">Page 8</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">Help Us to Know your Budget </h3>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">TOPS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->tops == 1) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>

                            Under $50</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->tops == 2) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $50 - $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->tops == 3) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $75 - $100</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"> <?php if (@$Womenstyle->tops == 4) { ?><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$100 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->tops == 5) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $125+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">BOTTOMS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->bottoms == 1) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            Under $30</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->bottoms == 2) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $30 - $50</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->bottoms == 3) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $50 - $70</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->bottoms == 4) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $70 - $90</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->bottoms == 5) { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $90+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">OUTERWEAR</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">

                            <?php if (@$Womenstyle->outwear == 1) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            Under $50</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->outwear == 2) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?> $50 - $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->outwear == 3) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $75 - $100</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->outwear == 4) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $100 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->outwear == 5) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            $125+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JEANS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jeans == 1) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            Under $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jeans == 2) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            $75 - $100</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jeans == 3) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            $100 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jeans == 4) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            $125 - $175</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jeans == 5) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            $175+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JEWELRY</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jewelry == 1) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            Under $40</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jewelry == 2) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            $40 - $60</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jewelry == 3) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    
                            $60 - $80</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jewelry == 4) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    $80 - $100</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->jewelry == 5) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>    $100+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">ACCESSORIES</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->accessproes == 1) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?> 
                            Under $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->accessproes == 2) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?> $75 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->accessproes == 3) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?> $125 - $175</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->accessproes == 4) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?> $175 - $250</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->accessproes == 5) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?> $175 - $250</li>

                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">DRESS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->dress == 1) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span><?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>

                            Under $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->dress == 2) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $75 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->dress == 3) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $125 - $175</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->dress == 4) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $175 - $250</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                            <?php if (@$Womenstyle->dress == 5) { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                            $175 - $250</li>
                    </ul>
                </div>
            </div>
            <div style="float: left; width: 100%; margin: 40px 0 34%;">Page 9</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Please do double click to upload any images / design you want your stylist to work for you ?</h3>
                <div style="float: left; width: 100%;">
                    <div style="display: inline-block;width: 27%;margin-right: 20px; text-align: center;">
                        <div style="width: 100%; overflow: hidden;">

                            <?php if (@$wemenDesigne->img_1 == '') { ?>
                                <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum1.jpg" alt="">
                            <?php } else { ?>
                                <img style="width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_1; ?>" alt="">
                            <?php } ?>

                        </div>
                        <h4 style="font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">First Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px; text-align: center;">
                        <div style="width: 100%; overflow: hidden;">


                            <?php if (@$wemenDesigne->img_2 == '') { ?>
                                <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum2.jpg" alt="">
                            <?php } else { ?>
                                <img style="width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_2; ?>" alt="">
                            <?php } ?>

                        </div>
                        <h4 style=" font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">Second Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px;text-align: center;">
                        <div style="width: 100%; overflow: hidden;">
                            <?php if (@$wemenDesigne->img_3 == '') { ?>
                                <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum3.jpg" alt="">
                            <?php } else { ?>
                                <img style="width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_3; ?>" alt="">
                            <?php } ?>

                        </div>
                        <h4 style="font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">Third Design</h4>
                    </div>
                </div>
            </div>
            
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Brand or store you prefer to shop ? </h3>
                <ul style=" float: left; width:100%; margin: 0; padding: 0; list-style-type:  none;">
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative; <?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">


                            <?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/penguin.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/nike.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/scotch.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/gap.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/pata.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/tommy.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/boss.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vineyard.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vans.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/hurley.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/brooks.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/zara.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/levis.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/armour.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/bonobos.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/landsend.png" alt=""> 
                        </div>
                    </li>
                    <div style="float: left;width: 95%;margin: 40px 0 20%;text-align: center;">Page 10</div>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/jcrew.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/oldnavy.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/uniqlo.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/northface.png" alt="">
                        </div>
                    </li>

                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('hm', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('hm', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/h&m.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/eagle.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/ragnbone.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/bensharma.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/express.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/polo.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('dillards', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('dillards', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-a.jpg" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('mecy', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('mecy', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-b.jpg" alt=""> 


                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('naimai', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('naimai', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-c.jpg" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('urban', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?>  border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('urban', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-d.jpg" alt=""> 
                        </div>
                    </li>

                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('nordstrom', @$menbrand)) { ?>border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #e0e0e0;<?php } ?> padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('nordstrom', @$menbrand)) { ?>  <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span> <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-e.jpg" alt="">
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Add additional comments</h3>
                <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;"><?php echo @$Womenstyle->profile_note; ?></p>
            </div>
            <div style="float: left; width: 100%; margin: 40px 0 20px;">Page 11</div>
            <div class="pagebreak"> </div>
        </div>
    </page>
</body>
</html>

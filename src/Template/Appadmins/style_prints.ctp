<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Print  | Product Invoice</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
    </head>
    <style>
        body{
            text-align: center;
        }
        @page {
            size: 5.5in 8.5in;  
            margin:10pt 0pt 40pt;
        }
        page {
            background: white;
            display: inline-block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
        }
        page[size="A4"] {  
            width: 21cm;
        }
    </style>
    <body onload="window.print();">
    <page size="A4">
        <div style="float: left; width: 100%; padding: 20px 20px 20px 10px;">
            <div style="float: left; width: 95%;">
                <div style="text-align:center;">
                    <div class="post" style="margin: 0;padding: 0;border:none;color: none;display: inline-block;">     
                        <span><img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $userdetails->user_detail->barcode_image ?>" style="text-align:center;"></span>
                        <p>Name:  <span><?php echo $userdetails->user_detail->first_name . '-' . $userdetails->user_detail->last_name; ?></span></p> 
                        <p>Email:  <span><?php echo $userdetails->email; ?></span></p>
                        <p>Full Name:  <span><?php echo $shipping_address->full_name; ?></span></p>
                        <p>Address:  <span>
                                <?php echo $shipping_address->address; ?>
                                <?php echo $shipping_address->address_line_2; ?>
                                <?php echo $shipping_address->city; ?>
                                <?php echo $shipping_address->state; ?>
                                <?php echo $shipping_address->zipcode; ?>
                                <?php echo $shipping_address->country; ?>
                                <?php echo $shipping_address->phone; ?>
                            </span></p>                        
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your height?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo $MenStats->tall_feet; ?></span>ft.</div>
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo $MenStats->tell_inch; ?></span>in.</div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your weight?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block; font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo $MenStats->weight_lb; ?></span>lbs.</div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">Your birthday? </h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;"><?php echo $MenStats->birthday; ?></span></div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Are you parent ? </h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="float: left; padding: 10px;width: 32px;text-align: center;<?php if (@$MenStats->are_you_a_parent == 1) { ?> /*background: #ff6c00;*/ border: 1px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc;<?php } ?>border-top-left-radius: 3px; border-bottom-left-radius: 3px; font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$MenStats->are_you_a_parent == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span></span>
                            <span style="float: left; <?php if (@$MenStats->are_you_a_parent == 2) { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php } else { ?>border: 1px solid #ccc; <?php } ?> border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center; border-top-right-radius: 3px; border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$MenStats->are_you_a_parent == 2) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">No</span></span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What size you prefer? </h3>
                <div style="float: left; width:100%;">
                    <div style="float: left; width: 50%;">
                        <h4 style="margin-top: 0; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Waist size?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?= @$TypicallyWearMen->waist; ?></span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?= @$TypicallyWearMen->waist_size_run; ?></span></div>
                    </div>
                    <div style="float: left; width: 50%;">
                        <h4 style="margin-top: 0; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Shirt size?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px;font-size: 15px;"><?php echo @$TypicallyWearMen->size; ?></span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$TypicallyWearMen->shirt; ?></span></div>
                    </div>
                </div>
                <div style="float: left; width:100%;">
                    <div style="float: left; width: 50%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Inseam size?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$TypicallyWearMen->inseam; ?></span></div>
                    </div>
                    <div style="float: left; width: 50%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Shoe size?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px;font-size: 15px;"><?php echo @$TypicallyWearMen->shoe; ?></span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$TypicallyWearMen->shoe_medium; ?></span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 96%; margin: 50px 0 41%;">Page 1</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your profession?</h3>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <span style="<?php if (@$MenStats->your_occupation == 1) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative; overflow: hidden;">
                            <?php if (@$MenStats->your_occupation == 1) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>

                        </span>Architecture / Engineering</li> 
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 2) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                            <?php if (@$MenStats->your_occupation == 2) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Art / Design</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 3) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                            <?php if (@$MenStats->your_occupation == 3) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Building / Maintenance</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 4) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                            <?php if (@$MenStats->your_occupation == 4) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Business / Client Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 5) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                            <?php if (@$MenStats->your_occupation == 5) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Community / Social Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 6) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 6) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Computer / IT</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 7) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 7) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Education</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 8) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 8) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Entertainer / Performer</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 9) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 9) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Farming / Fishing / Forestry</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 10) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 10) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Financial Services</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 11) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 11) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Health Practitioner / Technician</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 12) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 12) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Hospitality / Food Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 13) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                            <?php if (@$MenStats->your_occupation == 13) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Management</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 14) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 14) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?> 
                        </span>Media / Communications</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 15) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 15) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?> 
                        </span>Military / Protective Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 16) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 16) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Legal</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 17) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 17) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?> 
                        </span>Office / Administration</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 18) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 18) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Average</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 19) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 19) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Personal Care & Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 20) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 20) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Production / Manufacturing</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 21) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"> <?php if (@$MenStats->your_occupation == 21) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Retail</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 22) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 22) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Sales</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 23) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 23) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Science</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 24) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 24) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?></span>Technology</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 25) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 25) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?></span>Transportation</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 26) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 26) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?></span>Self-Employed</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 27) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 27) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Stay-At-Home Parent</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 28) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 28) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?></span>Student</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 29) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 29) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Retired</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 30) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 30) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?>
                        </span>Not Employed</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStats->your_occupation == 31) { ?> background-color: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStats->your_occupation == 31) { ?>
                                <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <?php } else { ?>    
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                            <?php } ?></span>Other</li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Tell us Your body Shape?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Rectangle</h4>
                        <div style=" float: left; width: 100%; <?php if (@$TypicallyWearMen->body_type == 2) { ?> border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative;">
                            <?php if (@$TypicallyWearMen->body_type == 2) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                    <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 80px;" src="<?php echo HTTP_ROOT ?>assets/images/men/size-2.png" alt=""></div>
                    </li>

                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Triangle</h4>
                        <div style=" float: left; width: 100%; <?php if (@$TypicallyWearMen->body_type == 3) { ?> border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative;">
                            <?php if (@$TypicallyWearMen->body_type == 3) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px; position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>                            
                            <img style="width: 80px;" src="<?php echo HTTP_ROOT ?>assets/images/men/size-3.png" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Trapezoid</h4>
                        <div style=" float: left; width: 100%; <?php if (@$TypicallyWearMen->body_type == 1) { ?> border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative;">
                            <?php if (@$TypicallyWearMen->body_type == 1) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>                            
                            <img style="width: 80px;" src="<?php echo HTTP_ROOT ?>assets/images/men/size-1.png" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Oval</h4>
                        <div style=" float: left; width: 100%; <?php if (@$TypicallyWearMen->body_type == 4) { ?> border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative;">
                            <?php if (@$TypicallyWearMen->body_type == 4) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 80px;" src="<?php echo HTTP_ROOT ?>assets/images/men/size-4.png" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Inverted Triangle</h4>
                        <div style=" float: left; width: 100%; <?php if (@$TypicallyWearMen->body_type == 5) { ?> border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative;">

                            <?php if (@$TypicallyWearMen->body_type == 5) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 80px;" src="<?php echo HTTP_ROOT ?>assets/images/men/size-5.png" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Tell us your skin Tone?</h3>
                <ul style="float: left; width: 100%; list-style-type: none; margin: 0; padding:0;">
                    <li style="float: left; width: 80px;height: 80px; <?php if (@$TypicallyWearMen->skin_tone == 1) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff; <?php } ?> background: #fdc8b9; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg1.jpg" alt=""></li>
                    <li style="float: left; width: 80px;height: 80px; <?php if (@$TypicallyWearMen->skin_tone == 2) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff; <?php } ?> background: #f0b4a2; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg2.jpg" alt=""></li>
                    <li style="float: left; width: 80px;height: 80px; <?php if (@$TypicallyWearMen->skin_tone == 3) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff; <?php } ?> background: #d0967e; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg3.jpg" alt=""></li>
                    <li style="float: left; width: 80px;height: 80px; <?php if (@$TypicallyWearMen->skin_tone == 4) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff; <?php } ?> background: #c57456; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg4.jpg" alt=""></li>
                    <li style="float: left; width: 80px;height: 80px; <?php if (@$TypicallyWearMen->skin_tone == 5) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff; <?php } ?> background: #78412a; border-radius: 100%; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg5.jpg" alt=""></li>
                    <li style="float: left; width: 80px; height: 80px; <?php if (@$TypicallyWearMen->skin_tone == 6) { ?> border:4px solid #ff6c00; <?php } else { ?> border:4px solid #fff; <?php } ?> background: #e6e6e6; border-radius: 100%; text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px; padding-top: 35px; box-sizing: border-box; position: relative; overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/tone-bg6.jpg" alt=""><span style=" position: relative; z-index: 111;">Other</span></li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 50px 0 5%;">Page 2</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">You social media profiles will help your personal Stylist to know you better. </h3>
                <div style="float: left;width: 45%; min-height: 60px;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">LINKEDIN PROFILE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px;"><?= @$MenStyle->linkdin_profile; ?></p>
                    </div>
                </div>
                <div style="float: right;width: 45%; min-height: 60px;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">INSTAGRAM HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px;"><?= @$MenStyle->instagram; ?></p>
                    </div>
                </div>
                <div style="float: left;width: 45%; min-height: 60px;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">TWITTER HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px; margin-bottom: 0;"><?= @$MenStyle->twitter; ?></p>
                    </div>
                </div>
                <div style="float: right;width: 45%; min-height: 60px;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">PINTEREST HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px; margin-bottom: 0;"><?= @$MenStyle->pinterest; ?></p>
                    </div>
                </div>
            </div>

            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What do you typically wear to work?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Casual</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?>border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc;<?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px; position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/mencasual.jpg" alt=""></div>
                    </li>

                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Business Casual</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?>border: 2px solid #ff6c00;<?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/business-casual.jpg" alt=""></div>
                    </li>

                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Formal</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/formal-wear.jpg" alt=""></div>
                    </li>

                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your casual shirts to fit?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Slim</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v3) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v3))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v3) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v3))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/mencasualslim.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Regular</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v3) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v3))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v3) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v3))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/mencasualregular.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 100%; margin: 50px 0 26%;">Page 3</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">How do you like your button-up shirts to fit?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Slim</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v4) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v4))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v4) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v4))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menbottomupslimfit.jpg" alt=""></div>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Fitted through the chest, trim through the waist, tapered sleeves</p>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Regular</h4>
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v4) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v4))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?>  text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v4) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v4))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menbottomupregular.jpg" alt=""></div>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Relaxed through the chest, waist, armholes & sleeves</p>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">How do you like your jeans to fit?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Straight</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(3, explode(",", @$MenFit->jeans_to_fit))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(3, explode(",", @$MenFit->jeans_to_fit))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menstaightjeans.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Slim</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(2, explode(",", @$MenFit->jeans_to_fit))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(2, explode(",", @$MenFit->jeans_to_fit))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menslimjean.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Skinny</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(1, explode(",", @$MenFit->jeans_to_fit))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(1, explode(",", @$MenFit->jeans_to_fit))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menskinnjeans.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Relaxed</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(4, explode(",", @$MenFit->jeans_to_fit))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(4, explode(",", @$MenFit->jeans_to_fit))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menrelaxejeans.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Bottoms</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Tighter Fitting</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(1, explode(",", @$MenFit->your_pants_to_fit))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(1, explode(",", @$MenFit->your_pants_to_fit))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/mentightbottom.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">More Relaxed</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(2, explode(",", @$MenFit->your_pants_to_fit))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(2, explode(",", @$MenFit->your_pants_to_fit))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menrelaxedpant.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 100%; margin: 50px 0 11%;">Page 4</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">How long do you prefer your shorts? </h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Upper Thigh</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(4, explode(",", @$MenFit->prefer_your_shorts))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(4, explode(",", @$MenFit->prefer_your_shorts))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menuowerthighshort.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Lower Thigh</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(3, explode(",", @$MenFit->prefer_your_shorts))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(3, explode(",", @$MenFit->prefer_your_shorts))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menlowerthighshorts.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Above Knee</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(2, explode(",", @$MenFit->prefer_your_shorts))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(2, explode(",", @$MenFit->prefer_your_shorts))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menatkshorts.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">At The Knee</h4>
                        <div style=" float: left; width: 100%; <?php if (in_array(1, explode(",", @$MenFit->prefer_your_shorts))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 1px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (in_array(1, explode(",", @$MenFit->prefer_your_shorts))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/menattekneeshorts.jpg" alt=""></div>
                    </li>
                </ul>
            </div>






            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;margin-bottom: 0;">Tell Us Which Color do you want to prefer? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Black</h4>
                        <div style=" position: relative; float: left;height: 80px;width: 100px; <?php if (in_array(1, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #000000;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color1.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Grey</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(2, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #c2c2c2;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">White</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(3, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #fff;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Cream</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(4, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #eed7c1;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color3.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Brown</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(5, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #7f3a3e;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color4.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Purple</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(6, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #88007c;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color5.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="position: relative; margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Green</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(7, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #008020;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color6.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="position: relative; margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Blue</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(8, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #001bf8;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color7.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Orange</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(9, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #ffa031;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color8.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Yellow</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(10, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #fffe45;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color9.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Red</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px;<?php if (in_array(11, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?>background: #ff001c;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color10.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Pink</h4>
                        <div style="position: relative; float: left;height: 80px;width: 100px; <?php if (in_array(12, explode(",", @$MenFit->prefer_color))) { ?> border: 3px solid #ef6a04; <?php } else { ?> border: 1px solid #ccc; <?php } ?> background: #ffbdca;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color11.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 100%; margin: 50px 0 48%;">Page 5</div>

            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Tell us which of these outfits would you prefer to wear?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit1.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit2.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit3.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit4.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit5.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit6.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit7.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('8', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('8', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit8.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('9', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('9', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit9.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('10', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('10', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit10.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('11', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('11', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit11.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('12', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('12', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit12.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('13', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('13', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit13.jpg" alt=""></div>

                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('14', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('14', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit14.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('15', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('15', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit15.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('16', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('16', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit16.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('17', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('17', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit17.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('18', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('18', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit18.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('19', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('19', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit19.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;margin-top: 8px; margin-bottom: 8px;">
                        <div style=" float: left; width: 100%; <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('20', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> border: 2px solid #ff6c00; <?php } else { ?> border: 2px solid #ccc; <?php } ?> text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;">
                            <?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('20', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?>
                                <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"> <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""><img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>    
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/outfit20.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 100%; margin: 50px 0 10%;">Page 6</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Any fit issues to take note of? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style=" position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(1, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>">
                        <?php if (in_array(1, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?>
                        <span style="position: relative;z-index: 111;">Long Arms</span></li>
                    <li style=" position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(2, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>">'
                        <?php if (in_array(2, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?>
                        <span style="position: relative;z-index: 111;">Short Arms</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(3, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>">
                        <?php if (in_array(3, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?>
                        <span style="position: relative;z-index: 111;">Thick Arms</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(15, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(15, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Broad Shoulders</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(4, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>">
                        <?php if (in_array(4, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?>
                        <span style="position: relative;z-index: 111;">Man Boobs</span></li>
                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(5, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(5, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Big Belly</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(6, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(6, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Big Butt</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(14, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(14, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Small Butt</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(7, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(7, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Thunder Things</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(8, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(8, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Thick Neck</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(9, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(9, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Short Torso</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(13, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(13, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Long Torso</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(10, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(10, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Broad Cheast</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(11, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(11, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Very Skinny</span></li>

                    <li style="position: relative; float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px; <?php if (in_array(12, explode(",", @$MenFit->take_note_of))) { ?>background: #232f3e;color: #fff;<?php } ?>"><?php if (in_array(12, explode(",", @$MenFit->take_note_of))) { ?>
                            <img style="width: 100%; height:100%; position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg2.jpg" alt="">
                        <?php } ?><span style="position: relative;z-index: 111;">Skinny Legs</span></li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">Help Us to Know your Budget</h3>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHIRTS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->button_shirts == 1) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                                <?php if (@$MenStyle->button_shirts == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>Under $50</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->button_shirts == 2) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                                <?php if (@$MenStyle->button_shirts == 2) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$50 - $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->button_shirts == 3) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                                <?php if (@$MenStyle->button_shirts == 3) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$75 - $100</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->button_shirts == 4) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                                <?php if (@$MenStyle->button_shirts == 4) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$100 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->button_shirts == 5) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                                <?php if (@$MenStyle->button_shirts == 5) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$125+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">TEES & POLOS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->tees_polos == 1) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                                <?php if (@$MenStyle->tees_polos == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>Under $30</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->tees_polos == 2) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->tees_polos == 2) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$30 - $50</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->tees_polos == 3) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->tees_polos == 3) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$50 - $70</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->tees_polos == 4) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->tees_polos == 4) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$70 - $90</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->tees_polos == 5) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->tees_polos == 5) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$90+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SWEATERS & SWEATSHIRTS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->weaters_sweatshirts == 1) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;">
                                <?php if (@$MenStyle->weaters_sweatshirts == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>Under $50</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->weaters_sweatshirts == 2) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->weaters_sweatshirts == 2) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$50 - $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->weaters_sweatshirts == 3) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->weaters_sweatshirts == 3) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$75 - $100</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->weaters_sweatshirts == 4) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->weaters_sweatshirts == 4) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$100 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->weaters_sweatshirts == 5) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->weaters_sweatshirts == 5) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$125+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PANTS & DENIM</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->pants_denim == 1) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; position: relative; overflow: hidden;">
                                <?php if (@$MenStyle->pants_denim == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>Under $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->pants_denim == 2) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->pants_denim == 2) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$75 - $100</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->pants_denim == 3) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->pants_denim == 3) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$100 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->pants_denim == 4) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->pants_denim == 4) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$125 - $175</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->pants_denim == 5) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->pants_denim == 5) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$175+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHORTS</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shorts == 1) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shorts == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>Under $40</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shorts == 2) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shorts == 2) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$40 - $60</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shorts == 3) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shorts == 3) { ?> 
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$60 - $80</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shorts == 4) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shorts == 4) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$80 - $100</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shorts == 5) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shorts == 5) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$100+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHOES</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shoes == 1) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shoes == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>Under $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shoes == 2) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shoes == 2) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$75 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shoes == 3) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shoes == 3) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$125 - $175</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shoes == 4) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shoes == 4) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$175 - $250</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->shoes == 5) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->shoes == 5) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$250+</li>
                    </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">OUTERWEAR</h4>
                    <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->blazers_outerwear == 1) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->blazers_outerwear == 1) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>Under $75</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->blazers_outerwear == 2) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->blazers_outerwear == 2) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$75 - $125</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->blazers_outerwear == 3) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->blazers_outerwear == 3) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$125 - $175</li>
                        <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="<?php if (@$MenStyle->blazers_outerwear == 4) { ?> background: #ef6a04; <?php } else { ?> background: #c1c0c0; <?php } ?> height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position: relative; overflow: hidden;"><?php if (@$MenStyle->blazers_outerwear == 4) { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } else { ?>    
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                <?php } ?></span>$175 - $250</li>
                    </ul>
                </div>
            </div>
            <div style="float: left; width: 100%; margin: 50px 0 1%;">Page 7</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;"> Accessories</h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0;">
                    <li style="width: 20%;display: inline-block;margin: 0 30px 0 0;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">TIES</h4>
                        <span style="display: inline-block;width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 15px;color: #3c3c3ccc;
                              text-align: center;"><?php echo $this->Custom->removeDoller(@$menSccessories->men_tites) ?> <?php echo @$menSccessories->men_tites; ?></span>
                    </li>
                    <li style="width: 20%;display: inline-block;margin: 0 30px 0 0;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">BELTS</h4>
                        <span style="display: inline-block;width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 15px;color: #3c3c3ccc;
                              text-align: center;"><?php echo $this->Custom->removeDoller(@$menSccessories->men_belts) ?><?php echo @$menSccessories->men_belts; ?></span>
                    </li>
                    <li style="width: 20%;display: inline-block;margin: 0 30px 0 0;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">WALLETS,BAGS, ACCESSORIES</h4>
                        <span style="display: inline-block;width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 15px;color: #3c3c3ccc;
                              text-align: center;"><?php echo $this->Custom->removeDoller(@$menSccessories->men_wallets_begs) ?><?php echo @$menSccessories->men_wallets_begs; ?></span>
                    </li>
                    <li style="width: 20%;display: inline-block;margin: 0 30px 0 0;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SUNGLASSES</h4>
                        <span style="display: inline-block;width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 15px;color: #3c3c3ccc;
                              text-align: center;"><?php echo $this->Custom->removeDoller(@$menSccessories->men_sunglass) ?> <?php echo @$menSccessories->men_sunglass; ?></span>
                    </li>
                    <li style="width: 20%;display: inline-block;margin: 0 30px 0 0;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">HATS</h4>
                        <span style="display: inline-block;width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 15px;color: #3c3c3ccc;
                              text-align: center;"><?php echo $this->Custom->removeDoller(@$menSccessories->men_hets) ?><?php echo @$menSccessories->men_hets; ?></span>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;"> Underwear & Grooming </h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0;">
                    <li style="width: 20%;display: inline-block;margin: 0 30px 0 0;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SOCKS</h4>
                        <span style="display: inline-block;width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 15px;color: #3c3c3ccc;
                              text-align: center;"><?php echo $this->Custom->removeDoller(@$menSccessories->men_socks) ?><?php echo @$menSccessories->men_socks; ?></span>
                    </li>
                    <li style="width: 20%;display: inline-block;margin: 0 30px 0 0;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">UNDERWEAR</h4>
                        <span style="display: inline-block;width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 15px;color: #3c3c3ccc;
                              text-align: center;"><?php echo $this->Custom->removeDoller(@$menSccessories->men_underwear) ?><?php echo @$menSccessories->men_underwear; ?></span>
                    </li>
                    <li style="width: 20%;display: inline-block;margin: 0 30px 0 0;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">GROOMING</h4>
                        <span style="display: inline-block;width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 15px;color: #3c3c3ccc;
                              text-align: center;"><?php echo $this->Custom->removeDoller(@$menSccessories->men_grooming) ?><?php echo @$menSccessories->men_grooming ?></span>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;"> Please do double click to upload any reference images / design you want your stylist to work for you ? </h3>
                <div style="float: left; width: 100%;">
                    <div style="display: inline-block;width: 27%;margin-right: 20px; text-align: center;">
                        <?php if (@$menDesigne->img_1 == '') { ?>
                            <div style="width: 100%; overflow: hidden;">
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign1.jpg" alt="">
                            </div>                        
                        <?php } else { ?> 
                            <div style="width: 100%; overflow: hidden;">
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_1; ?>" alt="">
                            </div>
                        <?php } ?>
                        <h4 style="font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">First Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px; text-align: center;">
                        <?php if (@$menDesigne->img_2 == '') { ?>
                            <div style="width: 100%; overflow: hidden;">
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign2.jpg" alt="">
                            </div>                        
                        <?php } else { ?>
                            <div style="width: 100%; overflow: hidden;">
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_2; ?>" alt="">
                            </div>
                        <?php } ?>
                        <h4 style=" font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">Second Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px; text-align: center;">
                        <?php if (@$menDesigne->img_3 == '') { ?>        
                            <div style="width: 100%; overflow: hidden;">
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign3.jpg" alt="">
                            </div>                        
                        <?php } else { ?>
                            <div style="width: 100%; overflow: hidden;">
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_3; ?>" alt="">
                            </div>
                        <?php } ?>
                        <h4 style="font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">Third Design</h4>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Brand or store you prefer to shop ? </h3>
                <ul style=" float: left; width:100%; margin: 0; padding: 0; list-style-type:  none;">

                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative; <?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?>                            
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/penguin.png" alt=""> 
                        </div>
                    </li>

                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?>
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/nike.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/scotch.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/gap.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/pata.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?>
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/tommy.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/boss.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?>  
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vineyard.png" alt="">
                        </div>
                    </li>
                    <div style="float: left; width: 100%; margin: 50px 0 3%; text-align: center;">Page 8</div>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vans.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>                            

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/hurley.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/brooks.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/zara.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/levis.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/armour.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/bonobos.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/landsend.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/jcrew.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/oldnavy.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/uniqlo.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/northface.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('hm', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('hm', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/h&m.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?>   
                                <span style=" text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/eagle.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/ragnbone.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/bensharma.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/express.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/polo.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('dillards', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('dillards', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-a.jpg" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('mecy', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('mecy', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-b.jpg" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('naimai', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('naimai', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-c.jpg" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('urban', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('urban', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-d.jpg" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;<?php if (isset($menbrand) && in_array('nordstrom', @$menbrand)) { ?> border: 2px solid #ff6c00; <?php } else { ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($menbrand) && in_array('nordstrom', @$menbrand)) { ?>   
                                <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;overflow: hidden;"><img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>

                            <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-e.jpg" alt="">
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Add additional comments</h3>
                <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;"><?php echo @$MenStyle->profile_note; ?></p>
            </div>
            <div style="float: left; width: 100%; margin: 50px 0 50px;">Page 9</div>
            <div class="pagebreak"> </div>
        </div>
    </page>
</body>
</html>

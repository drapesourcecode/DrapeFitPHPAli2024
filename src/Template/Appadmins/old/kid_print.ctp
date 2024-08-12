<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Print | Product Invoice</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
              name="viewport">
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
 /* box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);*/
}
page[size="A4"] {  
  width: 21cm;
}
    </style>

    <body onload="window.print();">
        <page size="A4">
            <div style="float: left; width: 100%; padding: 20px;">
                
            <?php if (@$kid->kids_clothing_gender == 'boys') { ?>     
                
                
                <div style="float: left; width: 95%;">
                <div style="text-align:center;">
                    <div class="post" style="margin: 0;padding: 0;border:none;color: none;display: inline-block;">    
                        <li style="display:inline-block;margin: 15px 280px;">                               
                            <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $kid_barcode->barcode_image; ?>" style="text-align:center;"> <br> 
                        </li>
                        <h3 class="text-muted text-center"><?php echo @$kid->kids_first_name; ?></h3>
                        <p class="text-muted text-center"><?php
                                if (@$kid->kids_clothing_gender == 'Hello') {
                                    echo "Hello";
                                } elseif (@$kid->kids_clothing_gender == 'boys') {
                                    echo 'Boys';
                                }
                                ?></p>
                        <p>Name:  <span><?php echo $shipping_address->full_name; ?></span></p> 
                        <p>Email:  <span><?php echo $kid->user->email; ?></span></p>
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
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">Your Child Name?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;"><?php echo @$kid->kids_first_name; ?></span></div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">Your Child Birthday?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;"><?php echo @$kid->kids_birthdate; ?></span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: left; width:45%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">FIT you are looking for?</h3>
                        <div style=" float: left; width: 100%; text-align: left;">
                            <span style="position: relative; overflow: hidden;display: inline-block;padding: 10px; margin: 0 -1px 0 0; text-align: center;font-size: 15px; <?php if (@$kid->kids_clothing_gender == 'girls') { ?> background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php }?>">

                                <?php if (@$kid->kids_clothing_gender == 'girls') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Girl’s Product</span></span>
                            <span style="position: relative; overflow: hidden;display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;<?php if (@$kid->kids_clothing_gender == 'boys') { ?>background: #ff6c00;border: 1px solid #ff6c00;<?php } else{ ?> border: 1px solid #ccc; <?php } ?>">
                                <?php if (@$kid->kids_clothing_gender == 'boys') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Boy’s Product</span></span>
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Relationship with your child?</h3>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style=" position: relative; overflow: hidden; display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px; <?php if (@$kid->kids_relationship_to_child == 'father') { ?> background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>font-size: 15px;">
                            <?php if (@$kid->kids_relationship_to_child == 'father') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Father</span>
                        </span>
                            <span style="position: relative; overflow: hidden; display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;<?php if (@$kid->kids_relationship_to_child == 'mother') { ?> background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php } ?> font-size: 15px;">
                                <?php if (@$kid->kids_relationship_to_child == 'mother') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Mother</span>
                            </span>
                            <span style="position: relative; overflow: hidden; display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px; <?php if (@$kid->kids_relationship_to_child == 'other') { ?> background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php } ?>font-size: 15px;">
                                <?php if (@$kid->kids_relationship_to_child == 'other') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Other</span>
                            </span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your Child Height?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo @$kid->tall_feet; ?></span>ft.</div>
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo @$kid->tell_inch; ?></span>in.</div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your Child Weight?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block; font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php
                                                    if (!empty($kid->weight_lb)) {
                                                        echo @$kid->weight_lb;
                                                    }
                                                    ?></span>lbs.</div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your Child Personality ?</h3>
                <div style="float: left; width: 100%;">
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Thoughtful', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Thoughtful', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Thoughtful</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Sporty', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                    <?php if (isset($kid->child_personality) && in_array('Sporty', explode(',', @$kid->child_personality))) { ?>
                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>    
                        </span>Sporty</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Shy', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">

                        <?php if (isset($kid->child_personality) && in_array('Shy', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Shy</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Outgoing', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Outgoing', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Outgoing</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Artistic', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Artistic', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Artistic</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Chatty', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Chatty', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Chatty</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Bookworm', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px;position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Bookworm', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Bookworm</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Curious', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Curious', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                        <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                        <?php } ?>
                        </span>Curious</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Sassy', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Sassy', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Sassy</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Funny', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Funny', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Funny</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Independent', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Independent', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Independent</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Kind', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Kind', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Kind</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Daredevil', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Daredevil', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Daredevil</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Serious', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Serious', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Serious</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Adventurous', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Adventurous', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Adventurous</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Confident', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Confident', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Confident</li>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: right; width:100%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What size your child do prefer to wear ? </h3>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="position: relative; overflow: hidden;display: inline-block; <?php if (@$kid->size_prefer_wear == '1') { ?>background: #ff6c00;border: 1px solid #ff6c00;<?php } else{ ?> border: 1px solid #ccc;<?php }?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px; font-size: 15px;">
                             <?php if (@$kid->size_prefer_wear == '1') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Bottom Size</span>
                        </span>
                            
                            <span style="position: relative; overflow: hidden; display: inline-block;<?php if (@$kid->size_prefer_wear == '2') { ?>background: #ff6c00;border: 1px solid #ff6c00;<?php } else{ ?> border: 1px solid #ccc;<?php }?>padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; ">
                             <?php if (@$kid->size_prefer_wear == '2') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Top Size</span>
                        </span>
                            
                            <span style=" position: relative; overflow: hidden; display: inline-block;<?php if (@$kid->size_prefer_wear == '3') { ?>background: #ff6c00;border: 1px solid #ff6c00;<?php } else{ ?> border: 1px solid #ccc;<?php }?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;">
                             <?php if (@$kid->size_prefer_wear == '3') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Shoe Size</span>
                        </span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 20px 0 30px;">Page 1</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;margin-bottom: 0;">Tell Us Which Color do you want to prefer? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Black</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '1') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #000000;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color1.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Grey</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '2') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #c2c2c2;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">White</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '3') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #fff;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Cream</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '4') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #eed7c1;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color3.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Brown</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '5') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #7f3a3e;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color4.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Purple</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '6') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #88007c;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color5.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Green</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '7') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #008020;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color6.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Blue</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '8') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #001bf8;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color7.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Orange</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '9') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #ffa031;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color8.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Yellow</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '10') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #fffe45;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color9.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Red</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '11') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #ff001c;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color10.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Pink</h4>
                        <div style=" position: relative; float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '12') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #ffbdca;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color11.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">What sizes does you prefer for your child ?</h3>
                <div style="float: left; width:100%;">
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">TOPS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo $KidsSizeFit->top_size; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">BOTTOMS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px;font-size: 15px;"><?php echo $KidsSizeFit->bottom_size; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">SHOE SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$KidsSizeFit->shoe_size; ?></span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: right; width:100%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your Child Body Shape ? </h3>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style=" position: relative; overflow: hidden; display: inline-block; <?php if (@$KidsSizeFit->body_shape == 'Husky') { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;">

                             <?php if (@$KidsSizeFit->body_shape == 'Husky') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Husky</span>
                        </span>
                            
                            <span style="position: relative; overflow: hidden; display: inline-block;<?php if (@$KidsSizeFit->body_shape == 'Average') { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;">
                            <?php if (@$KidsSizeFit->body_shape == 'Average') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Average</span>
                        </span>   
                            
                            <span style="position: relative; overflow: hidden; display: inline-block;<?php if (@$KidsSizeFit->body_shape == 'Slim') { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;">
                            <?php if (@$KidsSizeFit->body_shape == 'Slim') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Slim</span>
                        </span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Does your child have any FIT issue? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHIRT SLEEVE LENGTH</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style=" display: inline-block; <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too short') { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too short') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too short</span></span>

                            <span style="display: inline-block;<?php if (@$KidsSizeFit->shirt_sleeve_length == 'None') { ?>background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shirt_sleeve_length == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">None</span></span>
                            
                            <span style="display: inline-block;<?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too long') { ?>background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too long') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too long</span></span></div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHIRT TORSO LENGTH</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too short</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">None</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too long</span></span>
                        
                        </div>
                    </li>
                    
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHIRT TORSO WIDTH</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too tight') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{?> border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too tight') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too tight</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">None</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too loose') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{?>border: 1px solid #ccc; <?php } ?>display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;  position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too loose') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too loose</span>
                        </span></div>
                    </li>
                    
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PANT WAIST</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too tight') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;  position: relative; overflow: hidden;">
                             <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too tight') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too tight</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">None</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too loose') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;  position: relative; overflow: hidden;">
                              <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too loose') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too loose</span>
                        </span></div>
                    </li>
                    
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PANT LEG LENGTH (INSEAM)</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;  position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too short</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;  position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">None</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;  position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too long</span>
                        </span></div>
                    </li>
                    
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PANT LEGS WIDTH</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too tight') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too tight') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too tight</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">None</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too long') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too long') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too loose</span>
                        </span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 50px 0 12%;">Page 2</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Please share the following items you like to receive ? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">T-SHIRTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->t_shirts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->t_shirts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->t_shirts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->t_shirts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->t_shirts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->t_shirts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SWEATSHIRTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->sweats_shirts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->sweats_shirts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweats_shirts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweats_shirts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span></span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweats_shirts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweats_shirts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">POLO SHIRTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->polo_shirts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->polo_shirts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->polo_shirts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->polo_shirts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->polo_shirts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->polo_shirts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">BUTTON-DOWNS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->button_downs == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00;<?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->button_downs == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->button_downs == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00;<?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->button_downs == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                            
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->button_downs == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00;<?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->button_downs == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SWEATERS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->sweaters == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                 <?php if (@$KidsSizeFit->sweaters == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweaters == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->sweaters == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span></span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweaters == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->sweaters == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JACKETS & COATS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->jacket_coats == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->jacket_coats == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span></span>
                            
                            <span style="<?php if (@$KidsSizeFit->jacket_coats == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->jacket_coats == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->jacket_coats == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->jacket_coats == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span></div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHORTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->shorts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shorts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->shorts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shorts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->shorts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shorts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JEANS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->jeans == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->jeans == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->jeans == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->jeans == 'Sometimes') { ?>b
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->jeans == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->jeans == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">TROUSERS & CHINOS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->trousers_chino == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->trousers_chino == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->trousers_chino == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->trousers_chino == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->trousers_chino == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->trousers_chino == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SWEATPANTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->sweatspaint == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweatspaint == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweatspaint == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->sweatspaint == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweatspaint == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweatspaint == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHOES</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->shoes == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shoes == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->shoes == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shoes == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->shoes == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shoes == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PAJAMAS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->pajamas == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->pajamas == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Often</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->pajamas == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->pajamas == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Sometimes</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->pajamas == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->pajamas == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Rarely</span>
                        </span>                        
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">How often does your child do the following activities? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0;">
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Arts & Crafts</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-1a.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%; text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_arts_and_crafts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span></span>
                            
                            <span style="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_arts_and_crafts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_arts_and_crafts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Biking</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-1b.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_biking == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_biking == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_biking == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_biking == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_biking == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_biking == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Dance</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-1c.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_dance == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_dance == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_dance == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_dance == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_dance == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_dance == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <div style="float: left; width: 96%; margin: 50px 0 17%; text-align: center;">Page 3</div>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Playing Outside</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-1d.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_playing_outside == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_playing_outside == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_playing_outside == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_playing_outside == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_playing_outside == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_playing_outside == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Musical Instruments</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-1e.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_musical_instruments == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_musical_instruments == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_musical_instruments == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_musical_instruments == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_musical_instruments == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_musical_instruments == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Reading</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-1f.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_reading == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_reading == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_reading == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_reading == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_reading == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_reading == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What type of prints your child prefer?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0;">
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">STRIPES</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-print1.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%; text-align: center;">
                            
                            <span style="<?php if (@$KidClothingType->stripes == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->stripes == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->stripes == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->stripes == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->stripes == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->stripes == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PLAID</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-print2.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$KidClothingType->plaid == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->plaid == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->plaid == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->plaid == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->plaid == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->plaid == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">GINGHAM</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-print3.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style="<?php if (@$KidClothingType->gingham == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->gingham == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->gingham == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->gingham == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->gingham == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->gingham == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">NOVELTY</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-print4.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$KidClothingType->novelty == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->novelty == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->novelty == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->novelty == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->novelty == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->novelty == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">POLKA DOTS</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-print5.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style="<?php if (@$KidClothingType->polkadots == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->polkadots == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->polkadots == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->polkadots == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->polkadots == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->polkadots == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">CAMO</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kids-print6.jpg" alt="" width="170" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$KidClothingType->camo == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->camo == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->camo == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                           <?php if (@$KidClothingType->camo == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->camo == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->camo == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 20px 0 20px;">Page 4</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">Help Us to Know your Budget</h3>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">CASUAL SHIRTS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->casual_shirts == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$10-$15</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->casual_shirts == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15 - $20</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->casual_shirts == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $25</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->casual_shirts == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$25+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHORTS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shorts == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shorts == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shorts == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shorts == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JEANS & PANTS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jeans_paint == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jeans_paint == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jeans_paint == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jeans_paint == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JACKETS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jaket == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jaket == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jaket == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40 - $50</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jaket == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$50+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SWEATERS</h4>
                 <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->sweaters == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->sweaters == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->sweaters == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->sweaters == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">BUTTON DOWNS</h4>
                 <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->button_downs == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->button_downs == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->button_downs == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->button_downs == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">CASUAL BOTTOMS</h4>
                 <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->casual_bootms == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->casual_bootms == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->casual_bootms == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->casual_bootms == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHOES</h4>
                 <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shoes == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shoes == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shoes == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shoes == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 96%; margin: 50px 0 15%;">Page 5</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;"> Underwear &amp; Grooming </h3>
                <div style="float: left; width: 100%;">
                    <div style="display: inline-block;width: 27%;margin-right: 20px;text-align: center;">
                        <div style="width: 100%; overflow: hidden;">
                            <?php if (@$designe->img_1 == '') { ?>
                                <img style=" width: 100%;"src="<?php echo HTTP_ROOT ?>assets/kid-img/KidBoyCustomDesign1.jpg" alt="">
                            <?php } else { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_1; ?>" alt="">
                            <?php } ?>                        
                        </div>
                        <h4 style="font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">First Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px;text-align: center;">
                        <div style="width: 100%; overflow: hidden;">
                            <?php if (@$designe->img_2 == '') { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT ?>assets/kid-img/KidBoyCustomDesign2.jpg" alt="">
                            <?php } else { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_2; ?>" alt="">
                            <?php } ?>
                        
                        </div>
                        <h4 style=" font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">Second Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px;text-align: center;">
                        <div style="width: 100%; overflow: hidden;">
                            <?php if (@$designe->img_3 == '') { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT ?>assets/kid-img/KidBoyCustomDesign3.jpg" alt="">
                            <?php } else { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_3; ?>" alt="">
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
                        <div style="position: relative;  <?php if (isset($KidStyles->brands) && in_array('janine', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('janine', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                             <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo1.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('oldnavy', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('oldnavy', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo2.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('tea', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('tea', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo3.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('terget', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('terget', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;">
                            <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> 
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo4.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('jcrew', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('jcrew', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo5.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('nike', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('nike', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo6.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('place', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('place', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;">
                            <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> 
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo7.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('carters', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('carters', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo8.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('zara', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('zara', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo9.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('gym', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('gym', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo10.png" alt=""> 
                        </div>
                    </li>

                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('under', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('under', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo11.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('gap', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('gap', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo12.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('khals', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('khals', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: "> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo13.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('mars', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('mars', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo14.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('just', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('just', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo15.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('jcp', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('jcp', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo16.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('amzone', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('amzone', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo17.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('nord', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('nord', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;">
                            <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> 
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo18.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('walmert', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('walmert', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo19.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('macy', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('macy', explode(',',@$KidStyles->brands))) { ?>
                            <span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden; text-align: center;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo20.png" alt="">
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 10px 0 20px;">Page 6</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Add additional comments</h3>
                <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;"><?php echo @$KidStyles->profile_note; ?></p>
            </div>
            <div style="float: left; width: 96%; margin: 40px 0 20px;">Page 7</div>
             <div style="margin-bottom: 400px; float: left; width: 100%"> </div>
<?php } else { ?>
                          
            <div style="float: left; width: 95%;">
                <div style="text-align:center;">
                    <div class="post" style="margin: 0;padding: 0;border:none;color: none;display: inline-block;">    
                        <li style="display:inline-block;margin: 15px 280px;">                               
                            <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $kid_barcode->barcode_image; ?>" style="text-align:center;"> <br> 
                        </li>
                        <h3 class="text-muted text-center"><?php echo @$kid->kids_first_name; ?></h3>
                        <p class="text-muted text-center"><?php
                                if (@$kid->kids_clothing_gender == 'girls') {
                                    echo "Girls";
                                } elseif (@$kid->kids_clothing_gender == 'boys') {
                                    echo 'Boys';
                                }
                                ?></p>
                        <p>Name:  <span><?php echo $shipping_address->full_name; ?></span></p> 
                        <p>Email:  <span><?php echo $kid->user->email; ?></span></p>
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
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">Your Child Name?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;"><?php echo @$kid->kids_first_name; ?></span></div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">Your Child Birthday?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;"><?php echo @$kid->kids_birthdate; ?></span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: left; width:45%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">FIT you are looking for?</h3>
                        <div style=" float: left; width: 100%; text-align: left;">
                            <span style="position: relative; overflow: hidden;display: inline-block;padding: 10px; margin: 0 -1px 0 0; text-align: center;font-size: 15px; <?php if (@$kid->kids_clothing_gender == 'girls') { ?> background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php }?>">
                                <?php if (@$kid->kids_clothing_gender == 'girls') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Girl’s Product</span>
                            </span>
                            <span style="position: relative; overflow: hidden;display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;<?php if (@$kid->kids_clothing_gender == 'boys') { ?>background: #ff6c00;border: 1px solid #ff6c00;<?php } else{ ?> border: 1px solid #ccc; <?php } ?>">
                                <?php if (@$kid->kids_clothing_gender == 'boys') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Boy’s Product</span></span>
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Relationship with your child?</h3>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style=" position: relative; overflow: hidden; display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px; <?php if (@$kid->kids_relationship_to_child == 'father') { ?> background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>font-size: 15px;">
                                 <?php if (@$kid->kids_relationship_to_child == 'father') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Father</span>
                            </span>
                            <span style="position: relative; overflow: hidden; display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;<?php if (@$kid->kids_relationship_to_child == 'mother') { ?> background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php } ?> font-size: 15px;">
                                <?php if (@$kid->kids_relationship_to_child == 'mother') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Mother</span>
                            </span>
                            <span style="position: relative; overflow: hidden; display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px; <?php if (@$kid->kids_relationship_to_child == 'other') { ?> background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?> border: 1px solid #ccc; <?php } ?>font-size: 15px;">
                                <?php if (@$kid->kids_relationship_to_child == 'other') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Other</span>
                            </span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your Child Height?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo @$kid->tall_feet; ?></span>ft.</div>
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;"><?php echo @$kid->tell_inch; ?></span>in.</div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your Child Weight?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block; font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;">
                            <?php
                                if (!empty($kid->weight_lb)) {
                                    echo @$kid->weight_lb;
                                }
                            ?>
                            </span>lbs.</div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your Child Personality ? </h3>
                <div style="float: left; width: 100%;">
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Thoughtful', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Thoughtful', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Thoughtful</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Sporty', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                    <?php if (isset($kid->child_personality) && in_array('Sporty', explode(',', @$kid->child_personality))) { ?>
                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>    
                        </span>Sporty</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Shy', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Shy', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Shy</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Outgoing', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Outgoing', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Outgoing</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Artistic', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Artistic', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Artistic</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Chatty', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Chatty', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Chatty</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Bookworm', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Bookworm', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Bookworm</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Curious', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Curious', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                        <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                        <?php } ?>
                        </span>Curious</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Sassy', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Sassy', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Sassy</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Funny', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Funny', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Funny</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Independent', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Independent', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Independent</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Kind', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Kind', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Kind</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Daredevil', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Daredevil', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Daredevil</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Serious', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Serious', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Serious</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Adventurous', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Adventurous', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Adventurous</li>
                    
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="<?php if (isset($kid->child_personality) && in_array('Confident', explode(',', @$kid->child_personality))) { ?> border: 1px solid #ef6a04;background: #ef6a04; <?php } else{ ?> border: 1px solid #c1c0c0; <?php } ?>height: 15px;width: 15px;float: left;margin-right: 5px; position: relative; overflow: hidden;">
                        <?php if (isset($kid->child_personality) && in_array('Confident', explode(',', @$kid->child_personality))) { ?>
                        <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;overflow: hidden;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                            <img style="width: 15px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""> 
                        <?php } ?>
                        </span>Confident</li>
                </ul>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: right; width:100%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What size your child do prefer to wear ? </h3>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style=" position: relative; overflow: hidden; display: inline-block; <?php if (@$kid->size_prefer_wear == '1') { ?>background: #ff6c00;border: 1px solid #ff6c00;<?php } else{ ?> border: 1px solid #ccc;<?php }?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px; font-size: 15px;">
                                <?php if (@$kid->size_prefer_wear == '1') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Bottom Size</span>
                        </span>
                            
                            <span style=" position: relative; overflow: hidden; display: inline-block;<?php if (@$kid->size_prefer_wear == '2') { ?>background: #ff6c00;border: 1px solid #ff6c00;<?php } else{ ?> border: 1px solid #ccc;<?php }?>padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; "> 
                            <?php if (@$kid->size_prefer_wear == '2') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Top Size</span>
                        </span>
                            
                            <span style=" position: relative; overflow: hidden; display: inline-block;<?php if (@$kid->size_prefer_wear == '3') { ?>background: #ff6c00;border: 1px solid #ff6c00;<?php } else{ ?> border: 1px solid #ccc;<?php }?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;"><?php if (@$kid->size_prefer_wear == '3') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Shoe Size</span>
                        </span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 20px 0 30px;">Page 1</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;margin-bottom: 0;">Tell Us Which Color do you want to prefer? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Black</h4>
                        <div style=" position: relative; float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '1') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #000000;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color1.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Grey</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '2') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #c2c2c2;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">White</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '3') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #fff;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Cream</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '4') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #eed7c1;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color3.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Brown</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '5') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #7f3a3e;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color4.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Purple</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '6') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #88007c;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color5.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Green</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '7') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #008020;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color6.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Blue</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '8') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #001bf8;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color7.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Orange</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '9') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #ffa031;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color8.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Yellow</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '10') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #fffe45;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color9.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Red</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '11') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #ff001c;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color10.jpg" alt=""></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Pink</h4>
                        <div style="position: relative;float: left;height: 80px;width: 100px;<?php if (@$kid->prefer_color == '12') { ?>border: 3px solid #ef6a04;<?php } else{?>border: 1px solid #ccc;<?php } ?>background: #ffbdca;"><img style="width: 100%; height:100%;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color11.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">What sizes does you prefer for your child ?</h3>
                <div style="float: left; width:100%;">
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">TOPS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo $KidsSizeFit->top_size; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">BOTTOMS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px;font-size: 15px;"><?php echo $KidsSizeFit->bottom_size; ?></span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">SHOE SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;"><?php echo @$KidsSizeFit->shoe_size; ?></span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: right; width:100%;">
                        <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Your Child Body Shape ? </h3>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style=" position: relative; overflow: hidden; display: inline-block; <?php if (@$KidsSizeFit->body_shape == 'Husky') { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;">
                                <?php if (@$KidsSizeFit->body_shape == 'Husky') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Husky</span>
                        </span>
                            
                            <span style="position: relative; overflow: hidden; display: inline-block;<?php if (@$KidsSizeFit->body_shape == 'Average') { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;">
                                <?php if (@$KidsSizeFit->body_shape == 'Average') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Average</span>
                        </span>   
                            
                            <span style="position: relative; overflow: hidden; display: inline-block;<?php if (@$KidsSizeFit->body_shape == 'Slim') { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;">
                                <?php if (@$KidsSizeFit->body_shape == 'Slim') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Slim</span>
                        </span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Does your child have any FIT issue? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHIRT SLEEVE LENGTH</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style=" display: inline-block; <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too short') { ?>background: #ff6c00; border: 1px solid #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too short') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too short</span></span>
                            <span style="display: inline-block;<?php if (@$KidsSizeFit->shirt_sleeve_length == 'None') { ?>background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->shirt_sleeve_length == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">None</span>
                        </span>
                            
                            <span style="display: inline-block;<?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too long') { ?>background: #ff6c00;border: 1px solid #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too long') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too long</span>
                        </span></div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHIRT TORSO LENGTH</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too short</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">None</span>
                        </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php }else{ ?> border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                            <span style="position: relative; z-index: 111;">Too long</span></span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHIRT TORSO WIDTH</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too tight') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{?> border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too tight') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Too tight</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">None</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too loose') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{?>border: 1px solid #ccc; <?php } ?>display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too loose') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Too loose</span>
                            </span></div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PANT WAIST</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too tight') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too tight') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Too tight</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">None</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too loose') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too loose') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Too loose</span>
                            </span></div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PANT LEG LENGTH (INSEAM)</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Too short</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">None</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Too long</span>
                            </span></div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PANT LEGS WIDTH</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too tight') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                             <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too tight') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Too tight</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'None') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                             <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'None') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">None</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too long') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                             <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too long') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Too loose</span>
                            </span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 50px 0 14%;">Page 2</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Please share the following items you like to receive ?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0; list-style-type: none;">
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">T-SHIRTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->t_shirts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->t_shirts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->t_shirts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->t_shirts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->t_shirts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->t_shirts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">TOPS & BLOUSES </h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            
                            <span style="<?php if (@$KidsSizeFit->top_blouses == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->top_blouses == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->top_blouses == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->top_blouses == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->top_blouses == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->top_blouses == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SWEATSHIRTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->sweats_shirts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->sweats_shirts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweats_shirts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweats_shirts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweats_shirts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweats_shirts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span></span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SWEATERS </h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->sweaters == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweaters == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweaters == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweaters == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->sweaters == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->sweaters == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JACKETS & COATS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->jacket_coats == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->jacket_coats == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span></span>
                            
                            <span style="<?php if (@$KidsSizeFit->jacket_coats == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->jacket_coats == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->jacket_coats == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->jacket_coats == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">DRESSES & ROMPERS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->dreses_rompers == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->dreses_rompers == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->dreses_rompers == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->dreses_rompers == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->dreses_rompers == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->dreses_rompers == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li> 
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHORTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->shorts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shorts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->shorts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                             <?php if (@$KidsSizeFit->shorts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span></span>
                            
                            <span style="<?php if (@$KidsSizeFit->shorts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                             <?php if (@$KidsSizeFit->shorts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span></span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">LEGGINGS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->leggings == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                             <?php if (@$KidsSizeFit->leggings == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->leggings == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;"> 
                                <?php if (@$KidsSizeFit->leggings == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->leggings == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                             <?php if (@$KidsSizeFit->leggings == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JEANS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->jeans == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->jeans == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->jeans == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->jeans == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->jeans == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->jeans == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PANTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->paint == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->paint == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->paint == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->paint == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->paint == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->paint == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SKIRTS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->skirts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->skirts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->skirts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->skirts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->skirts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->skirts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">ACCESSORIES</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->accessories == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->accessories == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->accessories == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->accessories == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->accessories == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->accessories == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: left; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHOES</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->shoes == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shoes == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->shoes == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shoes == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span></span>
                            
                            <span style="<?php if (@$KidsSizeFit->shoes == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->shoes == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="float: right; width:45%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PAJAMAS</h4>
                        <div style=" float: left; width: 100%;text-align: left;">
                            <span style="<?php if (@$KidsSizeFit->pajamas == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidsSizeFit->pajamas == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->pajamas == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->pajamas == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$KidsSizeFit->pajamas == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?> border: 1px solid #ccc;<?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidsSizeFit->pajamas == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                </ul>
            </div>

            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">How often does your child do the following activities? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0;">
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Arts & Crafts</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-1a.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%; text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                           <?php if (@$kid->kids_frequency_arts_and_crafts == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_arts_and_crafts == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                           <?php if (@$kid->kids_frequency_arts_and_crafts == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Biking</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-1b.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_biking == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_biking == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_biking == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_biking == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_biking == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_biking == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Dance</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-1c.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_dance == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_dance == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_dance == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_dance == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_dance == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_dance == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <div style="float: left; width: 96%; margin: 50px 0 10%; text-align: center;">Page 3</div>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Playing Outside</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-1d.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_playing_outside == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_dance == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_playing_outside == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;"><?php if (@$kid->kids_frequency_playing_outside == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_playing_outside == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_playing_outside == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Musical Instruments</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-1e.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_musical_instruments == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$kid->kids_frequency_musical_instruments == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_musical_instruments == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_musical_instruments == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_musical_instruments == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_musical_instruments == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Reading</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-1f.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            
                            <span style="<?php if (@$kid->kids_frequency_reading == 'Often') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_reading == 'Often') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Often</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_reading == 'Sometimes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_reading == 'Sometimes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Sometimes</span>
                            </span>
                            
                            <span style="<?php if (@$kid->kids_frequency_reading == 'Rarely') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$kid->kids_frequency_reading == 'Rarely') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Rarely</span>
                            </span>
                        
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What type of prints your child prefer?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0;">
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">STRIPES</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-print1.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%; text-align: center;">
                            
                            <span style="<?php if (@$KidClothingType->stripes == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->stripes == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->stripes == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->stripes == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->stripes == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->stripes == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">FLORAL</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-print2.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style="<?php if (@$KidClothingType->floral == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->floral == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>                                    
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->floral == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else if(@$KidClothingType->floral == ''){ ?> border: 1px solid #ff6c00;background: #ff6c00;<?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->floral == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } if (@$KidClothingType->floral == '') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->floral == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->floral == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">ANIMAL PRINT</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-print3.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style="<?php if (@$KidClothingType->animal_print == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->animal_print == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->animal_print == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->animal_print == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->animal_print == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->animal_print == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">POLKADOT</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-print4.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style="<?php if (@$KidClothingType->polkadots == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                               <?php if (@$KidClothingType->polkadots == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->polkadots == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->polkadots == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->polkadots == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px; position: relative; overflow: hidden;">
                                <?php if (@$KidClothingType->polkadots == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">PLAID</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-print5.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style="<?php if (@$KidClothingType->plaid == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->plaid == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->plaid == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px; position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->plaid == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->plaid == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->plaid == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">CAMO</h4>
                        <div style="float: left; width: 100%;text-align: center;border: 1px solid #ccc;padding: 5px 0;"><img src="<?php echo HTTP_ROOT ?>images/kidsg-print6.jpg" alt="" width="130" height="170"></div>
                        <div style=" float: left; width: 100%;text-align: center;">
                            <span style="<?php if (@$KidClothingType->camo == 'Yes') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?> display: inline-block; padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->camo == 'Yes') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Yes</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->camo == 'Maybe') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;position: relative; overflow: hidden; ">
                            <?php if (@$KidClothingType->camo == 'Maybe') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Maybe</span>
                            </span>
                            
                            <span style="<?php if (@$KidClothingType->camo == 'Never') { ?>border: 1px solid #ff6c00;background: #ff6c00; <?php } else{ ?>border: 1px solid #ccc; <?php } ?>display: inline-block;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;position: relative; overflow: hidden;">
                            <?php if (@$KidClothingType->camo == 'Never') { ?>
                                    <img style="width: 17px;width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <?php } ?>
                                <span style="position: relative; z-index: 111;">Never</span>
                            </span>
                        
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 96%; margin: 50px 0 15%;">Page 4</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">Help Us to Know your Budget</h3>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">CASUAL SHIRTS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                       <?php if (@$KidStyles->casual_shirts == '1') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                    $10-$15</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$KidStyles->casual_shirts == '2') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                        $15 - $20
                    </li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$KidStyles->casual_shirts == '3') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                    $20 - $25</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$KidStyles->casual_shirts == '4') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                        $25+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SKIRTS & SHORTS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;">
                        <?php if (@$KidStyles->skirts_shorts == '1') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>
                    $15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->skirts_shorts == '2') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->skirts_shorts == '3') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->skirts_shorts == '4') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">LEGGINGS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->leggings == '1') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$10-$15</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->leggings == '2') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15 - $20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->leggings == '3') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $25</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->leggings == '4') { ?>  <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$25+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JEANS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jeans == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jeans == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jeans == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jeans == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">DRESSES</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->dresses == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->dresses == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->dresses == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->dresses == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->dresses == '5') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$50+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SWEATERS</h4>
                 <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->sweaters == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->sweaters == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->sweaters == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->sweaters == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">BLOUSES</h4>
                 <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->blouses == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->blouses == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->blouses == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->blouses == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JACKETS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jaket == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20-$30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jaket == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jaket == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40-$50</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->jaket == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$50+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">SHOES</h4>
                 <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shoes == '1') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$15-$20</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shoes == '2') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$20 - $30</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shoes == '3') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$30 - $40</li>

                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><?php if (@$KidStyles->shoes == '4') { ?> <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                </span> <?php } else { ?>
                                <span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;position:relative; overflow: hidden;">
                                    <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/color2.jpg" alt="">
                                </span>
                            <?php } ?>$40+</li>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 96%; margin: 50px 0 5%;">Page 5</div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;"> Please do double click to upload any images / design you want your stylist to work for you ?
</h3>
                <div style="float: left; width: 100%;">
                    <div style="display: inline-block;width: 27%;margin-right: 20px;">
                        <div style="width: 100%; overflow: hidden;">                            
                            <?php if (@$designe->img_1 == '') { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign1.jpg" alt="">
                            <?php } else { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_1; ?>" alt="">
                            <?php } ?>
                        
                        </div>
                        <h4 style="font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">First Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px;">
                        <div style="width: 100%; overflow: hidden;">
                            <?php if (@$designe->img_2 == '') { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign2.jpg" alt="">
                            <?php } else { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_2; ?>" alt="">
                            <?php } ?>
                        </div>
                        <h4 style=" font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">Second Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px;">
                        <div style="width: 100%; overflow: hidden;">
                            <?php if (@$designe->img_3 == '') { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign3.jpg" alt="">
                            <?php } else { ?>
                                <img style=" width: 100%;" src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_3; ?>" alt="">
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
                        <div style="position: relative;  <?php if (isset($KidStyles->brands) && in_array('janine', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('janine', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;">
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt="">
                            </span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo1.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('oldnavy', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('oldnavy', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo2.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('tea', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('tea', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo3.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('terget', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('terget', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo4.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('jcrew', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('jcrew', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo5.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('nike', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('nike', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                            <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo6.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('place', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('place', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo7.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('carters', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('carters', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo8.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('zara', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('zara', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo9.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('gym', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('gym', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo10.png" alt=""> 
                        </div>
                    </li>

                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('under', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('under', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo11.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('gap', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                        <?php if (isset($KidStyles->brands) && in_array('gap', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo12.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('khals', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('khals', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo13.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('mars', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('mars', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo14.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('just', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('just', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;">
                            <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt=""> 
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo15.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('jcp', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('jcp', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo16.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('amzone', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('amzone', explode(',',@$KidStyles->brands))) { ?>
                            <span style="text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo17.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('nord', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('nord', explode(',',@$KidStyles->brands))) { ?>
                            <span style=" text-align: center;height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo18.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('walmert', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('walmert', explode(',',@$KidStyles->brands))) { ?>
                            <span style=" text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo19.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="<?php if (isset($KidStyles->brands) && in_array('macy', explode(',',@$KidStyles->brands))) { ?>border: 2px solid #ff6c00;<?php } else{ ?>position: relative;border: 1px solid #e0e0e0;<?php } ?>position: relative;padding: 2px;display: inline-block;width: 100%;">
                            <?php if (isset($KidStyles->brands) && in_array('macy', explode(',',@$KidStyles->brands))) { ?>
                            <span style=" text-align: center; height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box; overflow: hidden;"> 
                                <img style="width: 100px;position: absolute;left: 0;top: 0;z-index: 1;" src="<?php echo HTTP_ROOT ?>assets/images/print-bg.jpg" alt="">
                                <img style="width: 17px;position: relative; z-index: 111;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>
                        <?php } ?>
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/kids-brand-logo20.png" alt="">
                        </div>
                    </li>
                </ul>
            </div>

            <div style="float: left; width: 96%; margin: 10px 0 20px;">Page 6</div>

            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Add additional comments</h3>
                <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;"><?php echo @$KidStyles->profile_note; ?></p>
            </div>
            <div style="float: left; width: 96%; margin: 40px 0 20px;">Page 7</div>
<?php } ?>
            </div>
        </page>
    </body>

</html>
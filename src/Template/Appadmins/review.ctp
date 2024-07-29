<style type="text/css">
    .hide{
        display: none;
    }
    .active{
        display: block;
    }


</style>  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>">Order listing</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <?php if ($userdetails->user->user_detail->gender == 1) { ?>
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="box box-primary user-detail-top">
                        <div class="box-body box-profile">
                          <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->
                            <div class="">
                                <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $userdetails->id . ".png"; ?>" style="text-align:center;">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $userdetails->user->user_detail->first_name . '-' . $userdetails->user->user_detail->last_name; ?></h3>
                            <p class="text-muted text-center"><?php
                                if ($userdetails->user->user_detail->gender == 1) {
                                    echo "MEN";
                                } elseif ($userdetails->user->user_detail->gender == 2) {
                                    echo 'WOMEN';
                                }
                                ?></p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item"><b>Email:</b> <a class="pull-right"><?php echo $userdetails->user->email; ?></a></li>
                                <li class="list-group-item"><b>Full Name:</b> <a class="pull-right"><?php echo $shipping_address->full_name; ?></a></li>
                                <li class="list-group-item"><b>Address:</b> <a class="pull-right">
                                        <?php echo $shipping_address->address; ?>
                                        <?php echo $shipping_address->address_line_2; ?>
                                        <?php echo $shipping_address->city; ?>
                                        <?php echo $shipping_address->state; ?>
                                        <?php echo $shipping_address->zipcode; ?>
                                        <?php echo $shipping_address->country; ?>
                                        <?php echo $shipping_address->phone; ?>


                                    </a></li>
                            </ul>


                        </div><!-- /.box-body -->

                    </div><!-- /.box -->

                </div>

            <?php } ?>
            <!-- /.col -->
            <!--for men-->
            <?php if ($userdetails->user->user_detail->gender == 1) { ?>
                <div class="col-md-12"> 
                    <div class="nav-tabs-custom">
                        <div class="tab-content">

                            <div class="active tab-pane" id="activity">




                                <div class="post">
                                    <div class="post-left-box">      
                                        <h3 class="username">
                                            What is your height?                       
                                        </h3> 
                                        <div class="timeline-footer">
                                            <span><a class="btn btn-primary btn-xs blue"  ><?php echo $MenStats->tall_feet; ?> </a> ft.</span> 
                                            <span><a class="btn btn-primary btn-xs blue"  ><?php echo $MenStats->tell_inch; ?> </a> in.</span>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            What is your weight?                    
                                        </h3> 
                                        <div class="timeline-footer">
                                            <span><a class="btn btn-primary btn-xs blue"  ><?php echo $MenStats->weight_lb; ?> </a> lbs.</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="post">
                                    <div class="post-left-box">     
                                        <h3 class="username">
                                            Your birthday?                      
                                        </h3> 
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue" ><?php echo $MenStats->birthday; ?> </a> 
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            Are you parent ?                      
                                        </h3> 
                                        <div class="timeline-footer parent-box">
                                            <a class="btn btn-primary btn-xs blue" ><span <?php if (@$MenStats->are_you_a_parent == 1) { ?> class="active" <?php } ?>>Yes </span ><span <?php if (@$MenStats->are_you_a_parent == 2) { ?> class="active" <?php } ?>>No</span></a> 
                                        </div>
                                    </div> 
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        What size you prefer?                    
                                    </h3>
                                    <div class="timeline-footer">
                                        <div class="post-left-box">
                                            <h4>Waist size?</h4>
                                            <a class="btn btn-primary btn-xs blue"><?= @$TypicallyWearMen->waist; ?></a> 
                                            <a class="btn btn-primary btn-xs blue"><?= @$TypicallyWearMen->waist_size_run; ?></a> 
                                        </div>
                                        <div class="post-right-box">
                                            <h4>Shirt size?</h4>
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->size; ?></a> 
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->shirt; ?></a> 
                                        </div>
                                        <div class="post-left-box">
                                            <h4>Inseam size?</h4>
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->inseam; ?></a> 
                                        </div>
                                        <div class="post-right-box">
                                            <h4>Shoe size?</h4>
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->shoe; ?></a> 
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->shoe_medium; ?></a> 
                                        </div>
                                        <div class="post-left-box">
                                            <h4>Bottom size?</h4>
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->men_bottom; ?></a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What is your profession?   


                                    </h3>
                                    <div class="timeline-footer prefer">
                                        <ul>
                                            <li class = '<?= @$MenStats->your_occupation == 1 ? "active" : ""; ?>'>Architecture / Engineering</li>
                                            <li class = '<?= @$MenStats->your_occupation == 2 ? "active" : ""; ?>'>Art / Design</li>
                                            <li class = '<?= @$MenStats->your_occupation == 3 ? "active" : ""; ?>'>Building / Maintenance</li>
                                            <li class = '<?= @$MenStats->your_occupation == 4 ? "active" : ""; ?>'>Business / Client Service</li>
                                            <li class = '<?= @$MenStats->your_occupation == 5 ? "active" : ""; ?>'>Community / Social Service</li>
                                            <li class = '<?= @$MenStats->your_occupation == 6 ? "active" : ""; ?>'>Computer / IT</li>
                                            <li class = '<?= @$MenStats->your_occupation == 7 ? "active" : ""; ?>'>Education</li>
                                            <li class = '<?= @$MenStats->your_occupation == 8 ? "active" : ""; ?>'>Entertainer / Performer</li>
                                            <li class = '<?= @$MenStats->your_occupation == 9 ? "active" : ""; ?>' >Farming / Fishing / Forestry</li>
                                            <li class = '<?= @$MenStats->your_occupation == 10 ? "active" : ""; ?>'>Financial Services</li>
                                            <li class = '<?= @$MenStats->your_occupation == 11 ? "active" : ""; ?>'>Health Practitioner / Technician</li>
                                            <li class = '<?= @$MenStats->your_occupation == 12 ? "active" : ""; ?>'>Hospitality / Food Service</li>
                                            <li class = '<?= @$MenStats->your_occupation == 13 ? "active" : ""; ?>' >Management</li>
                                            <li class = '<?= @$MenStats->your_occupation == 14 ? "active" : ""; ?>'>Media / Communications</li>
                                            <li class = '<?= @$MenStats->your_occupation == 15 ? "active" : ""; ?>'>Military / Protective Service</li>
                                            <li class = '<?= @$MenStats->your_occupation == 16 ? "active" : ""; ?>'>Legal</li>
                                            <li class = '<?= @$MenStats->your_occupation == 17 ? "active" : ""; ?>'>Office / Administration</li>
                                            <li class = '<?= @$MenStats->your_occupation == 18 ? "active" : ""; ?>'>Average</li>
                                            <li class = '<?= @$MenStats->your_occupation == 19 ? "active" : ""; ?>'>Personal Care & Service</li>
                                            <li class = '<?= @$MenStats->your_occupation == 20 ? "active" : ""; ?>'>Production / Manufacturing</li>
                                            <li class = '<?= @$MenStats->your_occupation == 21 ? "active" : ""; ?>'>Retail</li>
                                            <li class = '<?= @$MenStats->your_occupation == 22 ? "active" : ""; ?>'>Sales</li>
                                            <li class = '<?= @$MenStats->your_occupation == 23 ? "active" : ""; ?>'>Science</li>
                                            <li class = '<?= @$MenStats->your_occupation == 24 ? "active" : ""; ?>'>Technology</li>
                                            <li class = '<?= @$MenStats->your_occupation == 25 ? "active" : ""; ?>'>Transportation</li>
                                            <li class = '<?= @$MenStats->your_occupation == 26 ? "active" : ""; ?>'>Self-Employed</li>
                                            <li class = '<?= @$MenStats->your_occupation == 27 ? "active" : ""; ?>'>Stay-At-Home Parent</li>
                                            <li class = '<?= @$MenStats->your_occupation == 28 ? "active" : ""; ?>'>Student</li>
                                            <li class = '<?= @$MenStats->your_occupation == 29 ? "active" : ""; ?>'>Retired</li>
                                            <li class = '<?= @$MenStats->your_occupation == 30 ? "active" : ""; ?>'>Not Employed</li>
                                            <li class = '<?= @$MenStats->your_occupation == 31 ? "active" : ""; ?>'>Other</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Tell us Your body Shape?                
                                    </h3>
                                    <div class="timeline-footer body-shape body-shape-men">
                                        <ul>
                                            <li class = '<?= @$TypicallyWearMen->body_type == 2 ? "active" : ""; ?>' >
                                                <h4>Rectangle</h4>
                                                <div class="men-body-shape">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-2.png" alt="">
                                                </div>
                                            </li>
                                            <li class = '<?= @$TypicallyWearMen->body_type == 3 ? "active" : ""; ?>'>
                                                <h4>Triangle</h4>
                                                <div class="men-body-shape">
                                                    <img src="<?php echo HTTP_ROOT ?>/assets/images/men/size-3.png" alt="">
                                                </div>
                                            </li>
                                            <li class = '<?= @$TypicallyWearMen->body_type == 1 ? "active" : ""; ?>'>
                                                <h4>Trapezoid</h4>
                                                <div class="men-body-shape">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-1.png" alt="">
                                                </div>
                                            </li>
                                            <li class = '<?= @$TypicallyWearMen->body_type == 4 ? "active" : ""; ?>'>
                                                <h4>Oval</h4>
                                                <div class="men-body-shape">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-4.png" alt="">
                                                </div>
                                            </li>
                                            <li class = '<?= @$TypicallyWearMen->body_type == 5 ? "active" : ""; ?>'>
                                                <h4>Inverted Triangle</h4>
                                                <div class="men-body-shape">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/size-5.png" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        Tell us your skin Tone?               
                                    </h3>
                                    <div class="timeline-footer tone">
                                        <ul>
                                            <li class = '<?= @$TypicallyWearMen->skin_tone == 1 ? "active" : ""; ?>' ></li>
                                            <li class = '<?= @$TypicallyWearMen->skin_tone == 2 ? "active" : ""; ?>' ></li>
                                            <li class = '<?= @$TypicallyWearMen->skin_tone == 3 ? "active" : ""; ?>' ></li>
                                            <li class = '<?= @$TypicallyWearMen->skin_tone == 4 ? "active" : ""; ?>' ></li>
                                            <li class = '<?= @$TypicallyWearMen->skin_tone == 5 ? "active" : ""; ?>' ></li>
                                            <li class = '<?= @$TypicallyWearMen->skin_tone == 6 ? "active" : ""; ?>' ><span>Other</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        You social media profiles will help your personal Stylist to know you better.                  
                                    </h3>
                                    <div class="timeline-footer profil-link">
                                        <h4>LINKEDIN PROFILE<span><?= @$MenStyle->linkdin_profile; ?></span></h4>
                                        <h4>INSTAGRAM HANDLE<span><?= @$MenStyle->instagram; ?></span></h4>
                                        <h4>TWITTER HANDLE<span><?= @$MenStyle->twitter; ?></span></h4>
                                        <h4>PINTEREST HANDLE<span><?= @$MenStyle->pinterest; ?></span></h4>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What do you typically wear to work?                
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> active <?php } ?>">
                                                <h4>Casual</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencasual.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> active <?php } ?>">
                                                <h4>Business Casual</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/business-casual.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v2))) { ?> active <?php } ?>">
                                                <h4>Formal</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/formal-wear.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Your casual shirts to fit?                
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v3) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v3))) { ?> active <?php } ?>">
                                                <h4>Slim</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencasualslim.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v3) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v3))) { ?> active <?php } ?>">
                                                <h4>Regular</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencasualregular.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        How do you like your button-up shirts to fit?                
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v4) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v4))) { ?> active <?php } ?>">
                                                <h4>Slim</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menbottomupslimfit.jpg" alt="">
                                                </div>
                                                <p>Fitted through the chest, trim through the waist, tapered sleeves</p>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v4) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v4))) { ?> active <?php } ?>">
                                                <h4>Regular</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menbottomupregular.jpg" alt="">
                                                </div>
                                                <p>Relaxed through the chest, waist, armholes & sleeves</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        How do you like your jeans to fit?               
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li  class = '<?= in_array(3, explode(",", @$MenFit->jeans_to_fit)) ? "active" : ""; ?>' >
                                                <h4>Straight</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menstaightjeans.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = '<?= in_array(2, explode(",", @$MenFit->jeans_to_fit)) ? "active" : ""; ?>'>
                                                <h4>Slim</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menslimjean.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = '<?= in_array(1, explode(",", @$MenFit->jeans_to_fit)) ? "active" : ""; ?>'>
                                                <h4>Skinny</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menskinnjeans.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = '<?= in_array(4, explode(",", @$MenFit->jeans_to_fit)) ? "active" : ""; ?>'>
                                                <h4>Relaxed</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menrelaxejeans.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Bottoms              
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li class = '<?= in_array(1, explode(",", @$MenFit->your_pants_to_fit)) ? "active" : ""; ?>' >
                                                <h4>Tighter Fitting</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/mentightbottom.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = '<?= in_array(2, explode(",", @$MenFit->your_pants_to_fit)) ? "active" : ""; ?>'>
                                                <h4>More Relaxed</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menrelaxedpant.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        How long do you prefer your shorts?               
                                    </h3>
                                    <div class="timeline-footer wear"> 
                                        <ul>
                                            <li class='<?= in_array(4, explode(",", @$MenFit->prefer_your_shorts)) ? "active" : ""; ?>'>
                                                <h4>Upper Thigh</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menuowerthighshort.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?= in_array(3, explode(",", @$MenFit->prefer_your_shorts)) ? "active" : ""; ?>'>
                                                <h4>Lower Thigh</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menlowerthighshorts.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?= in_array(2, explode(",", @$MenFit->prefer_your_shorts)) ? "active" : ""; ?>'>
                                                <h4>Above Knee</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menatkshorts.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?= in_array(1, explode(",", @$MenFit->prefer_your_shorts)) ? "active" : ""; ?>'>
                                                <h4>At The Knee</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/men-img/menattekneeshorts.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Tell Us Which Color do you want to prefer?               
                                    </h3>
                                    <div class="timeline-footer color">
                                        <ul>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('1',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Black</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('2',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Grey</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('3',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>White</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('4',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Cream</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('5',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Brown</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('6',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Purple</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('7',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Green</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('8',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Blue</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('9',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Orange</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('10',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Yellow</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('11',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Red</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$MenFit->prefer_color)>2 ) && (in_array('12',json_decode(@$MenFit->prefer_color,true)))) { ?> active <?php } ?>">
                                                <h4>Pink</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Tell us which of these outfits would you prefer to wear?            
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li  class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit1.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit2.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit3.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit4.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit5.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit6.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit7.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('8', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit8.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('9', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit9.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('10', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit10.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('11', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit11.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('12', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit12.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('13', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit13.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('14', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit14.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('15', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit15.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('16', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit16.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('17', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit17.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('18', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit18.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('19', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit19.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class = "<?php if (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('20', explode(',', $style_sphere_selections->style_sphere_selections_v5))) { ?> active <?php } ?>">
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/outfit20.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Any fit issues to take note of?             
                                    </h3>
                                    <div class="timeline-footer note">
                                        <ul>
                                            <li class = '<?= in_array(1, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>' >Long Arms</li>
                                            <li class = '<?= in_array(2, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Short Arms</li>
                                            <li class = '<?= in_array(3, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Thick Arms</li>
                                            <li class = '<?= in_array(15, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Broad Shoulders</li>
                                            <li class = '<?= in_array(4, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Man Boobs</li>
                                            <li class = '<?= in_array(5, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Big Belly</li>
                                            <li class = '<?= in_array(6, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Big Butt</li>
                                            <li class = '<?= in_array(14, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Small Butt</li>
                                            <li class = '<?= in_array(7, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Thunder Things</li>
                                            <li class = '<?= in_array(8, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Thick Neck</li>
                                            <li class = '<?= in_array(9, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Short Torso</li>
                                            <li class = '<?= in_array(13, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Long Torso</li>
                                            <li class = '<?= in_array(10, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Broad Cheast</li>
                                            <li class = '<?= in_array(11, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Very Skinny</li>
                                            <li class = '<?= in_array(12, explode(",", @$MenFit->take_note_of)) ? "active" : ""; ?>'>Skinny Legs</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Help Us to Know your Budget                    
                                    </h3>
                                    <div class="timeline-footer prefer">
                                        <div class="price-boxes">
                                            <h4>SHIRTS</h4>
                                            <ul>
                                                <li class='<?= @$MenStyle->button_shirts == 1 ? "active" : ""; ?>'>Under $50</li>
                                                <li class='<?= @$MenStyle->button_shirts == 2 ? "active" : ""; ?>'>$50 - $75</li>
                                                <li class='<?= @$MenStyle->button_shirts == 3 ? "active" : ""; ?>'>$75 - $100</li>
                                                <li class='<?= @$MenStyle->button_shirts == 4 ? "active" : ""; ?>'>$100 - $125</li>
                                                <li class='<?= @$MenStyle->button_shirts == 5 ? "active" : ""; ?>'>$125+</li>
                                            </ul>
                                        </div>
                                        <div class="price-boxes">
                                            <h4>TEES & POLOS</h4>
                                            <ul>
                                                <li class = '<?= @$MenStyle->tees_polos == 1 ? "active" : ""; ?>'>Under $30</li>
                                                <li class = '<?= @$MenStyle->tees_polos == 2 ? "active" : ""; ?>'>$30 - $50</li>
                                                <li class = '<?= @$MenStyle->tees_polos == 3 ? "active" : ""; ?>'>$50 - $70</li>
                                                <li class = '<?= @$MenStyle->tees_polos == 4 ? "active" : ""; ?>'>$70 - $90</li>
                                                <li class = '<?= @$MenStyle->tees_polos == 5 ? "active" : ""; ?>'>$90+</li>
                                            </ul>
                                        </div>
                                        <div class="price-boxes">
                                            <h4>SWEATERS & SWEATSHIRTS</h4>
                                            <ul>
                                                <li class='<?= @$MenStyle->weaters_sweatshirts == 1 ? "active" : ""; ?>'>Under $50</li>
                                                <li class='<?= @$MenStyle->weaters_sweatshirts == 2 ? "active" : ""; ?>'>$50 - $75</li>
                                                <li class='<?= @$MenStyle->weaters_sweatshirts == 3 ? "active" : ""; ?>'>$75 - $100</li>
                                                <li class='<?= @$MenStyle->weaters_sweatshirts == 4 ? "active" : ""; ?>'>$100 - $125</li>
                                                <li class='<?= @$MenStyle->weaters_sweatshirts == 5 ? "active" : ""; ?>'>$125+</li>
                                            </ul>
                                        </div>
                                        <div class="price-boxes">
                                            <h4>PANTS & DENIM</h4>
                                            <ul>
                                                <li class='<?= @$MenStyle->pants_denim == 1 ? "active" : ""; ?>'>Under $75</li>
                                                <li class='<?= @$MenStyle->pants_denim == 2 ? "active" : ""; ?>'>$75 - $100</li>
                                                <li class='<?= @$MenStyle->pants_denim == 3 ? "active" : ""; ?>'>$100 - $125</li>
                                                <li class='<?= @$MenStyle->pants_denim == 4 ? "active" : ""; ?>'>$125 - $175</li>
                                                <li class='<?= @$MenStyle->pants_denim == 5 ? "active" : ""; ?>'>$175+</li>
                                            </ul>
                                        </div>
                                        <div class="price-boxes">
                                            <h4>SHORTS</h4>
                                            <ul>
                                                <li  class=' <?= @$MenStyle->shorts == 1 ? "active" : ""; ?>'>Under $40</li>
                                                <li class=' <?= @$MenStyle->shorts == 2 ? "active" : ""; ?>'>$40 - $60</li>
                                                <li class=' <?= @$MenStyle->shorts == 3 ? "active" : ""; ?>'>$60 - $80</li>
                                                <li class=' <?= @$MenStyle->shorts == 4 ? "active" : ""; ?>'>$80 - $100</li>
                                                <li class=' <?= @$MenStyle->shorts == 5 ? "active" : ""; ?>'>$100+</li>
                                            </ul>
                                        </div>
                                        <div class="price-boxes">
                                            <h4>SHOES</h4>
                                            <ul>
                                                <li class='<?= @$MenStyle->shoes == 1 ? "active" : ""; ?>'>Under $75</li>
                                                <li class='<?= @$MenStyle->shoes == 2 ? "active" : ""; ?>'>$75 - $125</li>
                                                <li class='<?= @$MenStyle->shoes == 3 ? "active" : ""; ?>'>$125 - $175</li>
                                                <li class='<?= @$MenStyle->shoes == 4 ? "active" : ""; ?>'>$175 - $250</li>
                                                <li class='<?= @$MenStyle->shoes == 5 ? "active" : ""; ?>'>$250+</li>
                                            </ul>
                                        </div>
                                        <div class="price-boxes">
                                            <h4>OUTERWEAR</h4>
                                            <ul>
                                                <li class='<?= @$MenStyle->blazers_outerwear == 1 ? "active" : ""; ?>'>Under $75</li>
                                                <li class='<?= @$MenStyle->blazers_outerwear == 2 ? "active" : ""; ?>'>$75 - $125</li>
                                                <li class='<?= @$MenStyle->blazers_outerwear == 3 ? "active" : ""; ?>'>$125 - $175</li>
                                                <li class='<?= @$MenStyle->blazers_outerwear == 4 ? "active" : ""; ?>'>$175 - $250</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Accessories                   
                                    </h3>
                                    <div class="timeline-footer accessory">
                                        <ul>
                                            <li>
                                                <h4>TIES</h4>
                                                <span><?php echo $this->Custom->removeDoller(@$menSccessories->men_tites) ?> <?php echo @$menSccessories->men_tites; ?></span>
                                            </li>
                                            <li>
                                                <h4>BELTS</h4>
                                                <span><?php echo $this->Custom->removeDoller(@$menSccessories->men_belts) ?><?php echo @$menSccessories->men_belts; ?></span>
                                            </li>
                                            <li>
                                                <h4>WALLETS,BAGS, ACCESSORIES</h4>
                                                <span><?php echo $this->Custom->removeDoller(@$menSccessories->men_wallets_begs) ?><?php echo @$menSccessories->men_wallets_begs; ?></span>
                                            </li>
                                            <li>
                                                <h4>SUNGLASSES</h4>
                                                <span><?php echo $this->Custom->removeDoller(@$menSccessories->men_sunglass) ?> <?php echo @$menSccessories->men_sunglass; ?></span>
                                            </li>
                                            <li>
                                                <h4>HATS</h4>
                                                <span><?php echo $this->Custom->removeDoller(@$menSccessories->men_hets) ?><?php echo @$menSccessories->men_hets; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Underwear & Grooming                   
                                    </h3>
                                    <div class="timeline-footer accessory">
                                        <ul>
                                            <li>
                                                <h4>SOCKS</h4>
                                                <span><?php echo $this->Custom->removeDoller(@$menSccessories->men_socks) ?><?php echo @$menSccessories->men_socks; ?></span>
                                            </li>
                                            <li>
                                                <h4>UNDERWEAR</h4>
                                                <span><?php echo $this->Custom->removeDoller(@$menSccessories->men_underwear) ?><?php echo @$menSccessories->men_underwear; ?></span>
                                            </li>
                                            <li>
                                                <h4>GROOMING</h4>
                                                <span><?php echo $this->Custom->removeDoller(@$menSccessories->men_grooming) ?><?php echo @$menSccessories->men_grooming ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Please do double click to upload any reference images / design you want your stylist to work for you ?                  
                                    </h3>  
                                    <div class="timeline-footer design">
                                        <ul>
                                            <li><div class="upload-img">
                                                    <?php if (@$menDesigne->img_1 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign1.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img  id='img1' src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_1; ?>" alt="">
                                                    <?php } ?>

                                                </div>                                                       


                                                <h4 style="text-align: center;">First Design</h4>
                                            </li>
                                            <li><div class="upload-img">
                                                    <?php if (@$menDesigne->img_2 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign2.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img   src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_2; ?>" alt="">
                                                    <?php } ?>
                                                </div>                                            
                                                <h4 style="text-align: center;">Second Design</h4>
                                            </li>
                                            <li>
                                                <div class="upload-img">
                                                    <?php if (@$menDesigne->img_3 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/men-img/mencustomdesign3.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img   src="<?php echo HTTP_ROOT . USER_CUSTOM . @$menDesigne->img_3; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">Third Design</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Brand or store you prefer to shop ?               
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li class='<?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/penguin.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/nike.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/scotch.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/gap.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/pata.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/tommy.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/boss.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vineyard.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vans.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/hurley.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/brooks.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/zara.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/levis.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/armour.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/bonobos.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/landsend.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/jcrew.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/oldnavy.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/uniqlo.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/northface.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('hm', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/h&m.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/eagle.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/ragnbone.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/bensharma.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/express.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/polo.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('dillards', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-a.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('mecy', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-b.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('naimai', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-c.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('urban', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-d.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('nordstrom', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-e.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">Add additional comments</h3>  
                                    <div class="timeline-footer comment">
                                        <p><?php echo @$MenStyle->profile_note; ?></p>
                                    </div>
                                </div>
                            </div><!-- /.tab-pane -->
                            <div class="box-footer">
                                <a target="_blank" href="<?php echo HTTP_ROOT . 'appadmins/style_prints/' . $id; ?>"><button type="button" class="btn btn-primary">Print </button></a>
                            </div>
                        </div><!-- /.tab-content -->
                    </div><!-- /.nav-tabs-custom -->
                </div>
                <?php
            } elseif ($userdetails->user->user_detail->gender == 2) {
                ?>
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="box box-primary user-detail-top">
                        <div class="box-body box-profile">
                          <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->
                            <div class="">
                                <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $userdetails->id . ".png"; ?>" style="text-align:center;">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $userdetails->user->user_detail->first_name; ?> -<?php echo $userdetails->user->user_detail->last_name; ?></h3>
                            <p class="text-muted text-center"><?php
                                if ($userdetails->user->user_detail->gender == 1) {
                                    echo "MEN";
                                } elseif ($userdetails->user->user_detail->gender == 2) {
                                    echo 'WOMEN';
                                }
                                ?></p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item"><b>Email:</b> <a class="pull-right"><?php echo $userdetails->user->email; ?></a></li>
                                <li class="list-group-item"><b>Full Name:</b> <a class="pull-right"><?php echo $shipping_address->full_name; ?></a></li>
                                <li class="list-group-item"><b>Address:</b> <a class="pull-right">
                                        <?php echo $shipping_address->address; ?>
                                        <?php echo $shipping_address->address_line_2; ?>
                                        <?php echo $shipping_address->city; ?>
                                        <?php echo $shipping_address->state; ?>
                                        <?php echo $shipping_address->zipcode; ?>
                                        <?php echo $shipping_address->country; ?>
                                        <?php echo $shipping_address->phone; ?>


                                    </a></li>
                            </ul>


                        </div><!-- /.box-body -->

                    </div><!-- /.box -->

                </div>
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">

                            <div class="active tab-pane" id="activity">

                                <div class="post">
                                    <div class="post-left-box">      
                                        <h3 class="username">
                                            What is your height?                       
                                        </h3> 
                                        <div class="timeline-footer">
                                            <span><a class="btn btn-primary btn-xs blue"><?php echo $PersonalizedFix->tell_in_feet; ?> </a> ft.</span> 
                                            <span><a class="btn btn-primary btn-xs blue"><?php echo $PersonalizedFix->tell_in_inch; ?> </a> in.</span>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            What is your weight?                    
                                        </h3> 
                                        <div class="timeline-footer">
                                            <span><a class="btn btn-primary btn-xs blue"><?php echo @$PersonalizedFix->weight_lbs; ?> </a> lbs.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-left-box">     
                                        <h3 class="username">
                                            Your birthday?                      
                                        </h3> 
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue"><?php
                                                if (@$Womeninfo->birthday != '') {
                                                    echo @$Womeninfo->birthday;
                                                };
                                                ?> </a> 
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            Are you parent ?                     
                                        </h3> 
                                        <div class="timeline-footer parent-box">
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$Womeninfo->parent == 1) { ?> active <?php } ?>">Yes</span>
                                                <span class="<?php if (@$Womeninfo->parent == 0) { ?> active <?php } ?>">No</span>
                                            </a> 
                                        </div>
                                    </div> 
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What's your body type?               
                                    </h3>
                                    <div class="timeline-footer body-shape-g">
                                        <ul>
                                            <li class='<?php if (@$Womeninfo->body_type == 2) { ?> active <?php } ?>'>
                                                <h4>Inverted Triangle</h4>
                                                <div class="body-shape-g-box">
                                                    <img src="<?php echo HTTP_ROOT ?>images/inverted-triangle.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (@$Womeninfo->body_type == 3) { ?> active <?php } ?>'>
                                                <h4>Triangle</h4>
                                                <div class="body-shape-g-box">
                                                    <img src="<?php echo HTTP_ROOT ?>images/triangle.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (@$Womeninfo->body_type == 1) { ?> active <?php } ?>'>
                                                <h4>Rectangle</h4>
                                                <div class="body-shape-g-box">
                                                    <img src="<?php echo HTTP_ROOT ?>images/rectangle.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (@$Womeninfo->body_type == 4) { ?> active <?php } ?>'>
                                                <h4>Hourglass</h4>
                                                <div class="body-shape-g-box">
                                                    <img src="<?php echo HTTP_ROOT ?>images/hourglass.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (@$Womeninfo->body_type == 5) { ?> active <?php } ?>'>
                                                <h4>Apple</h4>
                                                <div class="body-shape-g-box">
                                                    <img src="<?php echo HTTP_ROOT ?>images/apple.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        What size you prefer?                    
                                    </h3>
                                    <div class="timeline-footer women-prefer">
                                        <ul>
                                            <li>
                                                <h4>PANTS</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->pants; ?></a> 
                                            </li>
                                            <li>
                                                <h4>BRA SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->bra; ?></a> 
                                                <a class="btn btn-primary btn-xs blue"><?php echo $SizeChart->bra_recomend; ?></a> 
                                            </li>
                                            <li>
                                                <h4>SKIRT SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo $SizeChart->skirt; ?></a> 
                                            </li>
                                            <li>
                                                <h4>JEANS SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->jeans; ?></a> 
                                            </li>
                                            <li>
                                                <h4>ACTIVE WEAR SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->active_wr; ?></a> 
                                            </li>
                                            <li>
                                                <h4>JACKET SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->wo_jackect_size; ?></a> 
                                            </li>
                                            <li>
                                                <h4>BOTTOM SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->wo_bottom; ?></a> 
                                            </li>
                                            <li>
                                                <h4>DRESS</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->dress; ?></a> 
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->dress_recomended; ?></a> 
                                            </li>
                                            <li>
                                                <h4>SHIRT & BLOUSE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo $SizeChart->shirt_blouse; ?></a>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->shirt_blouse_recomend; ?></a> 
                                            </li>
                                            <li>
                                                <h4>TOP SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->pantsr1; ?></a> 
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->pantsr2; ?></a> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What is your shoe size?                 
                                    </h3>
                                    <div class="timeline-footer">
                                        <a class="btn btn-primary btn-xs blue" style="width: 80px;"><?php echo @$SizeChart->shoe; ?></a>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Which style of shoes do you prefer?(Select all that apply)                   
                                    </h3>
                                    <div class="timeline-footer women-shose-prefer">
                                        <ul>
                                            <li class='<?php if (isset($women_shoe_prefer->brands) && in_array('Pumps', explode(',', @$women_shoe_prefer->brands))) { ?> active <?php } ?>'>Pumps</li>
                                            <li  class='<?php if (isset($women_shoe_prefer->brands) && in_array('Sandals', explode(',', @$women_shoe_prefer->brands))) { ?> active <?php } ?>' >Sandals</li>
                                            <li  class='<?php if (isset($women_shoe_prefer->brands) && in_array('Sneakers', explode(',', @$women_shoe_prefer->brands))) { ?> active <?php } ?>'>Sneakers</li>
                                            <li  class='<?php if (isset($women_shoe_prefer->brands) && in_array('Boots-Booties', explode(',', @$women_shoe_prefer->brands))) { ?> active <?php } ?>'>Boots & Booties</li>
                                            <li  class='<?php if (isset($women_shoe_prefer->brands) && in_array('Loafers-Flats', explode(',', @$women_shoe_prefer->brands))) { ?> active <?php } ?>'>Loafers & Flats</li>
                                            <li  class='<?php if (isset($women_shoe_prefer->brands) && in_array('Wedges', explode(',', @$women_shoe_prefer->brands))) { ?> active <?php } ?>'>Wedges</li>
                                            <li  class='<?php if (isset($women_shoe_prefer->brands) && in_array('Clogs-Mules', explode(',', @$women_shoe_prefer->brands))) { ?> active <?php } ?>'>Clogs & Mules</li>
                                            <li  class='<?php if (isset($women_shoe_prefer->brands) && in_array('Platforms', explode(',', @$women_shoe_prefer->brands))) { ?> active <?php } ?>'>Platforms</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Which heel height do you prefer?(Select all that apply)                
                                    </h3>
                                    <div class="timeline-footer women-shose-prefer">
                                        <ul>
                                            <li class='<?php if (isset($womenHeelHightPrefer->height) && in_array('Flat(Under 1")', explode(',', @$womenHeelHightPrefer->height))) { ?> active <?php } ?>'>Flat(Under 1")</li>
                                            <li class='<?php if (isset($womenHeelHightPrefer->height) && in_array('High(3"-4")', explode(',', @$womenHeelHightPrefer->height))) { ?> active <?php } ?>'>High(3"-4")</li>
                                            <li class='<?php if (isset($womenHeelHightPrefer->height) && in_array('Low(1"-2")', explode(',', @$womenHeelHightPrefer->height))) { ?> active <?php } ?>'>Low(1"-2")</li>
                                            <li  class='<?php if (isset($womenHeelHightPrefer->height) && in_array('Ultra High(4.5"+)', explode(',', @$womenHeelHightPrefer->height))) { ?> active <?php } ?>'>Ultra High(4.5"+)</li>

                                            <li class='<?php if (isset($womenHeelHightPrefer->height) && in_array('Mid(2"-3")', explode(',', @$womenHeelHightPrefer->height))) { ?> active <?php } ?>'>Mid(2"-3")</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What is your profession?                    
                                    </h3>
                                    <div class="timeline-footer prefer">
                                        <ul>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 1 ? "active" : ""; ?>'>Architecture / Engineering</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 2 ? "active" : ""; ?>'> Art / Design</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 3 ? "active" : ""; ?>'>Building / Maintenance</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 4 ? "active" : ""; ?>'>Business / Client Service</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 5 ? "active" : ""; ?>'>Community / Social Service</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 6 ? "active" : ""; ?>'>Computer / IT</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 7 ? "active" : ""; ?>'>Education</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 8 ? "active" : ""; ?>'>Entertainer / Performer</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 9 ? "active" : ""; ?>'>Farming / Fishing / Forestry</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 10 ? "active" : ""; ?>'>Financial Services</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 11 ? "active" : ""; ?>'>Health Practitioner / Technician</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 12 ? "active" : ""; ?>'>Hospitality / Food Service</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 13 ? "active" : ""; ?>'>Management</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 14 ? "active" : ""; ?>'>Media / Communications</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 15 ? "active" : ""; ?>'>Military / Protective Service</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 16 ? "active" : ""; ?>'>Legal</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 17 ? "active" : ""; ?>'>Office / Administration</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 18 ? "active" : ""; ?>'>Average</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 19 ? "active" : ""; ?>'>Personal Care &amp; Service</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 20 ? "active" : ""; ?>'>Production / Manufacturing</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 21 ? "active" : ""; ?>'>Retail</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 22 ? "active" : ""; ?>'>Sales</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 23 ? "active" : ""; ?>'>Science</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 24 ? "active" : ""; ?>'>Technology</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 25 ? "active" : ""; ?>'>Transportation</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 26 ? "active" : ""; ?>'>Self-Employed</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 27 ? "active" : ""; ?>'>Stay-At-Home Parent</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 28 ? "active" : ""; ?>'>Student</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 29 ? "active" : ""; ?>'>Retired</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 30 ? "active" : ""; ?>'>Not Employed</li>
                                            <li class='<?= @$Womeninfo->occupation_v2 == 31 ? "active" : ""; ?>'>Other</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Tell us your skin Tone?               
                                    </h3>
                                    <div class="timeline-footer tone">
                                        <ul>
                                            <li class='<?= @$Womeninfo->skin_tone == 1 ? "active" : ""; ?>'></li>
                                            <li class='<?= @$Womeninfo->skin_tone == 2 ? "active" : ""; ?>'></li>
                                            <li class='<?= @$Womeninfo->skin_tone == 3 ? "active" : ""; ?>'></li>
                                            <li class='<?= @$Womeninfo->skin_tone == 4 ? "active" : ""; ?>'></li>
                                            <li class='<?= @$Womeninfo->skin_tone == 5 ? "active" : ""; ?>'></li>
                                            <li class='<?= @$Womeninfo->skin_tone == 6 ? "active" : ""; ?>'><span>Other</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What parts of your body are you comfortable showing off?            
                                    </h3>
                                    <div class="timeline-footer note">
                                        <ul>
                                            <li class='<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Arms', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> active <?php } ?>'>Arms</li>
                                            <li class='<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Bust', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> active <?php } ?>'>Bust</li>
                                            <li class='<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Stomach', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> active <?php } ?>'>Stomach</li>
                                            <li  class='<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Back', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> active <?php } ?>'>Back</li>
                                            <li class='<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Waist', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> active <?php } ?>'>Waist</li>
                                            <li class='<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Hips/Butt', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> active <?php } ?>'>Hips/Butt</li>
                                            <li class='<?php if (isset($Womeninfo->comfortable_showing_off) && in_array('Legs', explode(',', @$Womeninfo->comfortable_showing_off))) { ?> active <?php } ?>'>Legs</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What parts of your body do you like to keep covered?          
                                    </h3>
                                    <div class="timeline-footer note">
                                        <ul>
                                            <li class='<?php if (isset($Womeninfo->keep_covered) && in_array('Arms', explode(',', @$Womeninfo->keep_covered))) { ?> active <?php } ?>'>Arms</li>
                                            <li class='<?php if (isset($Womeninfo->keep_covered) && in_array('Bust', explode(',', @$Womeninfo->keep_covered))) { ?> active <?php } ?>' >Bust</li>
                                            <li class='<?php if (isset($Womeninfo->keep_covered) && in_array('Stomach', explode(',', @$Womeninfo->keep_covered))) { ?> active <?php } ?>' >Stomach</li>
                                            <li class='<?php if (isset($Womeninfo->keep_covered) && in_array('Back', explode(',', @$Womeninfo->keep_covered))) { ?> active <?php } ?>'>Back</li>
                                            <li class='<?php if (isset($Womeninfo->keep_covered) && in_array('Waist', explode(',', @$Womeninfo->keep_covered))) { ?> active <?php } ?>'>Waist</li>
                                            <li class='<?php if (isset($Womeninfo->keep_covered) && in_array('Hips/Butt', explode(',', @$Womeninfo->keep_covered))) { ?> active <?php } ?>'>Hips/Butt</li>
                                            <li class='<?php if (isset($Womeninfo->keep_covered) && in_array('Legs', explode(',', @$Womeninfo->keep_covered))) { ?> active <?php } ?>'>Legs</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Your Proportions?                    
                                    </h3>
                                    <div class="timeline-footer women-prefer prop">
                                        <ul>
                                            <li>
                                                <h4>Shoulders?</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->proportion_shoulders; ?></a> 
                                            </li>
                                            <li>
                                                <h4>Legs?</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->proportion_legs; ?></a> 
                                            </li>
                                            <li>
                                                <h4>Arms?</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->proportion_arms; ?></a> 
                                            </li>
                                            <li>
                                                <h4>Hips?</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$SizeChart->proportion_hips; ?></a> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Are you a pregnant?                     
                                    </h3> 
                                    <div class="timeline-footer parent-box">
                                        <a class="btn btn-primary btn-xs blue"><span class="<?php if (@$Womeninfo->pregnant == 1) { ?> active <?php } ?>">Yes</span><span style="margin-left: 3px !important;" class="<?php if (@$Womeninfo->pregnant == 0) { ?> active <?php } ?>">No</span></a> 
                                    </div>
                                </div>
                                <?php if (@$Womeninfo->pregnant == 1) { ?>
                                    <div class="post">
                                        <h3 class="username">
                                            What is your due date?                     
                                        </h3> 
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue" style="width: 160px;"><?php echo date('m/d/Y', strtotime(@$SizeChart->expected_due_date)) ?></a> 
                                        </div>
                                    </div>
                                    <div class="post">
                                        <h3 class="username">
                                            your maternity fit ?                    
                                        </h3> 
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue" style="width: 100px;"><?php
                                                if ($SizeChart->is_prefer_maternity == 0) {
                                                    echo '';
                                                } else {
                                                    echo $SizeChart->is_prefer_maternity;
                                                }
                                                ?></a> 
                                        </div>
                                    </div>
                                    <div class="post">
                                        <h3 class="username">
                                            Loose Fitted mix of both                   
                                        </h3> 
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue" style="width: 100px;"><?php
                                                if ($SizeChart->loose_fitted == 0) {
                                                    echo '';
                                                } else {
                                                    echo $SizeChart->loose_fitted;
                                                }
                                                ?></a> 
                                        </div>
                                    </div>
                                    <div class="post">      
                                        <h3 class="username">
                                            Are you a pregnant ?               
                                        </h3>
                                        <div class="timeline-footer wear">
                                            <ul>
                                                <li class='<?php if (@$SizeChart->is_pregnant == 2) { ?> active  <?php } ?>'>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT ?>images/leady-belly4.png" alt="">
                                                    </div>
                                                    <p>Regular pants with an under-the-belly type</p>
                                                </li>
                                                <li class='<?php if (@$SizeChart->is_pregnant == 3) { ?> active  <?php } ?>'>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT ?>images/leady-belly3.png" alt="">
                                                    </div>
                                                    <p>All-around stretch to give light support</p>
                                                </li>
                                                <li class='<?php if (@$SizeChart->is_pregnant == 1) { ?> active  <?php } ?>'>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT ?>images/leady-belly2.png" alt="">
                                                    </div>
                                                    <p>Elastic side panels</p>
                                                </li>
                                                <li class='<?php if (@$SizeChart->is_pregnant == 4) { ?> active  <?php } ?>'>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT ?>images/leady-belly1.png" alt="">
                                                    </div>
                                                    <p>Fits over bump for maximum support</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="post">      
                                    <h3 class="username">
                                        You social media profiles will help your personal Stylist to know you better.               
                                    </h3>
                                    <div class="timeline-footer profil-link">
                                        <h4>LINKEDIN PROFILE<span><?= @$Womenstyle->linkdin_profile; ?></span></h4>
                                        <h4>INSTAGRAM HANDLE<span><?= @$Womenstyle->instagram; ?></span></h4>
                                        <h4>TWITTER HANDLE<span><?= @$Womenstyle->twitter; ?></span></h4>
                                        <h4>PINTEREST HANDLE<span><?= @$Womenstyle->pinterest; ?></span></h4>
                                    </div>
                                </div>
                                <div class="post"> 
                                    <h3 class="username">Style Inspiration</h3>  
                                    <div class="timeline-footer comment">
                                        <p>Are you looking to incorporate more of the styles below into your wardrobe? Select the styles below that you inspire to look like or would like to explore.</p>
                                    </div>    
                                    <div class="timeline-footer wear wear2">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> active <?php } ?>'>
                                                <h4>Bohemian</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Bohemian.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> active <?php } ?>' >
                                                <h4>Casual</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Casual.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> active <?php } ?>'>
                                                <h4>Classic</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Classic.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> active <?php } ?>'>
                                                <h4>Edgy</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Edgy.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v2) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v2))) { ?> active <?php } ?>'>
                                                <h4>Trendy</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/summer-Trendy.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="post">      
                                    <h3 class="username">
                                        How do you like your clothing to fit?             
                                    </h3>
                                    <hr>
                                    <h3 class="username">
                                        Dress length         
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_dress_length) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_dress_length))) { ?> active <?php } ?>'>
                                                <h4>Mini</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/mini.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_dress_length) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_dress_length))) { ?> active <?php } ?>'>
                                                <h4>Short</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/short.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_dress_length) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_dress_length))) { ?> active <?php } ?>'>
                                                <h4>Midi</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/midi.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_dress_length) && in_array('4', explode(',', $style_sphere_selectionsWemen->wo_dress_length))) { ?> active <?php } ?>'>
                                                <h4>Maxi</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/maxi.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        Top half        
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_half) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_top_half))) { ?> active <?php } ?>'>
                                                <h4>Fitted</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/fitted.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_half) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_top_half))) { ?> active <?php } ?>'>
                                                <h4>Straight</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/straight2.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_half) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_top_half))) { ?> active <?php } ?>'>
                                                <h4>Loose</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/loose.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        Pant Length       
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_length) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_pant_length))) { ?> active <?php } ?>'>
                                                <h4>Ankle</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/ankle.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_length) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_pant_length))) { ?> active <?php } ?>'>
                                                <h4>Regular</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/regular.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_length) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_pant_length))) { ?> active <?php } ?>'>
                                                <h4>Long</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/long.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        Pant Rise      
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_rise) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_pant_rise))) { ?> active <?php } ?>'>
                                                <h4>Low Rise</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/low-rise.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_rise) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_pant_rise))) { ?> active <?php } ?>'>
                                                <h4>Mid Rise</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/mid-rise.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_rise) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_pant_rise))) { ?> active <?php } ?>'>
                                                <h4>High Rise</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/high-rise.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        Pant Style      
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_style) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_pant_style))) { ?> active <?php } ?>'>
                                                <h4>Skinny</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/skinny.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_style) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_pant_style))) { ?> active <?php } ?>'>
                                                <h4>Straight</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/straight.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_style) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_pant_style))) { ?> active <?php } ?>'>
                                                <h4>Bootcut</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/bootcut.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_style) && in_array('4', explode(',', $style_sphere_selectionsWemen->wo_pant_style))) { ?> active <?php } ?>'>
                                                <h4>Relaxed</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/relaxed.jpg" alt="">
                                                </div>
                                            </li>                                           
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_pant_style) && in_array('5', explode(',', $style_sphere_selectionsWemen->wo_pant_style))) { ?> active <?php } ?>'>
                                                <h4>Wide Leg</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/wide-leg.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        Which types of appare i would you like to receive ?     
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_appare) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_appare))) { ?> active <?php } ?>'>
                                                <h4>Dresses / jumpsuits</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/dress-jumpsuit.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_appare) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_appare))) { ?> active <?php } ?>'>
                                                <h4>Tops</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-tops.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_appare) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_appare))) { ?> active <?php } ?>'>
                                                <h4>Bottoms</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/bottoms.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_appare) && in_array('4', explode(',', $style_sphere_selectionsWemen->wo_appare))) { ?> active <?php } ?>'>
                                                <h4>Denim</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/denim.jpg" alt="">
                                                </div>
                                            </li>                                           
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_appare) && in_array('5', explode(',', $style_sphere_selectionsWemen->wo_appare))) { ?> active <?php } ?>'>
                                                <h4>Sweaters</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/sweater.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_appare) && in_array('6', explode(',', $style_sphere_selectionsWemen->wo_appare))) { ?> active <?php } ?>'>
                                                <h4>Jackets</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/Jacket.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_appare) && in_array('7', explode(',', $style_sphere_selectionsWemen->wo_appare))) { ?> active <?php } ?>'>
                                                <h4>Accessories</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/acc.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        Which types of bottoms would you like to receive?    
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_bottom_style) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_bottom_style))) { ?> active <?php } ?>'>
                                                <h4>Skirts</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/skirt.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_bottom_style) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_bottom_style))) { ?> active <?php } ?>'>
                                                <h4>Striped Shorts</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/striped-short.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_bottom_style) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_bottom_style))) { ?> active <?php } ?>'>
                                                <h4>Capri Jeans</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/capri-Jeans.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_bottom_style) && in_array('4', explode(',', $style_sphere_selectionsWemen->wo_bottom_style))) { ?> active <?php } ?>'>
                                                <h4>Cargo Pant</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/cargo-pant.jpg" alt="">
                                                </div>
                                            </li>                                           
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_bottom_style) && in_array('5', explode(',', $style_sphere_selectionsWemen->wo_bottom_style))) { ?> active <?php } ?>'>
                                                <h4>Checked Pant</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/checked-pant.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_bottom_style) && in_array('6', explode(',', $style_sphere_selectionsWemen->wo_bottom_style))) { ?> active <?php } ?>'>
                                                <h4>Palazzo</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/palazzo.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_bottom_style) && in_array('7', explode(',', $style_sphere_selectionsWemen->wo_bottom_style))) { ?> active <?php } ?>'>
                                                <h4>Denim Shorts</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/denim-shorts.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="post">      
                                    <h3 class="username">
                                        Which types of tops would you like to receive?  
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_style) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_top_style))) { ?> active <?php } ?>'>
                                                <h4>Sleevelss</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/sleeveless.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_style) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_top_style))) { ?> active <?php } ?>'>
                                                <h4>Shorts Sleeve</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/short-sleeves.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_style) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_top_style))) { ?> active <?php } ?>'>
                                                <h4>Long Sleeve</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/long-sleeves.jpg" alt="">
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                </div>


                                <div class="post">      
                                    <h3 class="username">
                                        Please tell us the OutFit you prefer to wear?              
                                    </h3>
                                    <div class="timeline-footer wear outfit-wear">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit1.jpg" alt="">
                                                </div>
                                                <span class ='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v3 == 2) { ?> active <?php } ?>'>Always dress this way</span>
                                                <span class ='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v3 == 3) { ?> active <?php } ?>'>Sometimes dress this way</span>
                                                <span class ='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v3 == 4) { ?> active <?php } ?>'>Occasionally dress this way</span>
                                                <span class ='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v3 == 5) { ?> active <?php } ?>'> Never this way</span>
                                            </li>

                                            <li class ='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit2.jpg" alt="">
                                                </div>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v4 == 2) { ?> active <?php } ?>'>Always dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v4 == 3) { ?> active <?php } ?>'>Sometimes dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v4 == 4) { ?> active <?php } ?>'>Occasionally dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v4 == 5) { ?> active <?php } ?>'> Never this way</span>
                                            </li>


                                            <li  class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit3.jpg" alt="">
                                                </div>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v5 == 2) { ?> active <?php } ?>'>Always dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v5 == 3) { ?> active <?php } ?>'>Sometimes dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v5 == 4) { ?> active <?php } ?>'>Occasionally dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v5 == 5) { ?> active <?php } ?>'> Never this way</span>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit4.jpg" alt="">
                                                </div>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v6 == 2) { ?> active <?php } ?>'>Always dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v6 == 3) { ?> active <?php } ?>'>Sometimes dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v6 == 4) { ?> active <?php } ?>'>Occasionally dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v6 == 6) { ?> active <?php } ?>'> Never this way</span>
                                            </li>
                                            <li  class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit5.jpg" alt="">
                                                </div>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v7 == 2) { ?> active <?php } ?>'>Always dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v7 == 3) { ?> active <?php } ?>'>Sometimes dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v7 == 4) { ?> active <?php } ?>'>Occasionally dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v7 == 5) { ?> active <?php } ?>'> Never this way</span>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('6', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit6.jpg" alt="">
                                                </div>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v8 == 2) { ?> active <?php } ?>' >Always dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v8 == 3) { ?> active <?php } ?>'>Sometimes dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v8 == 4) { ?> active <?php } ?>'>Occasionally dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v8 == 5) { ?> active <?php } ?>'> Never this way</span>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('7', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit7.jpg" alt="">
                                                </div>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v9 == 2) { ?> active <?php } ?>'>Always dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v9 == 3) { ?> active <?php } ?>'>Sometimes dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v9 == 4) { ?> active <?php } ?>'>Occasionally dress this way</span>
                                                <span class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v9 == 5) { ?> active <?php } ?>'> Never this way</span>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v3_3) && in_array('8', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v3_3))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/women-summeroutfit8.jpg" alt="">
                                                </div>
                                                <span  class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v11 == 7) { ?> active <?php } ?>'>Always dress this way</span>
                                                <span  class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v11 == 8) { ?> active <?php } ?>'>Sometimes dress this way</span>
                                                <span  class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v11 == 9) { ?> active <?php } ?>'>Occasionally dress this way</span>
                                                <span  class='<?php if (@$style_sphere_selectionsWemen->style_sphere_selections_v11 == 10) { ?> active <?php } ?>'> Never this way</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">What patterns should we avoid?</h3>
                                    <div class="timeline-footer wear wear2">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                <h4>Lace</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/lace.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                <h4>Animal Print</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/animal-print.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                <h4>Tribal</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/tribal.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                <h4>Polka Dot</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/polkadot.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                <h4>Stripes</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/stripes.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('6', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                <h4>Floral</h4>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/women-img/floral.jpg" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Tell Us Which Color you prefer?               
                                    </h3>
                                    <div class="timeline-footer color">
                                        <ul>
                                            <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('1',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Black</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('2',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Grey</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('3',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>White</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('4',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Cream</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('5',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Brown</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('6',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Purple</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('7',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Green</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('8',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Blue</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('9',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Orange</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('10',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Yellow</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('11',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Red</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li  class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer)>2 ) && (in_array('12',json_decode(@$style_sphere_selectionsWemen->color_prefer,true)))) { ?> active <?php } ?>'>
                                                <h4>Pink</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post heel">      
                                    <h3 class="username">
                                        <h3>Which colors do you tend to mostly wear?</h3>          
                                    </h3>
                                    <div class="timeline-footer women-shose-prefer">
                                        <h4>NEUTRALS</h4>
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Black', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>'>Black</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Grey', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>'>Grey</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Navy', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>'>Navy</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Beige', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>'>Beige</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('nWhite', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>'>White</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer women-shose-prefer">
                                        <h4>COLOR</h4>
                                        <ul>
                                            <li class="<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Red', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>">Red</li>
                                            <li class="<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Blue', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>">Blue</li>
                                            <li class="<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Yellow', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>">Yellow</li>
                                            <li class="<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Purple', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>">Purple</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer women-shose-prefer">
                                        <h4>LIGHTS</h4>
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('White', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>'>White</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Sand', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>'>Sand</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->color_mostly_wear) && in_array('Pastels', explode(',', $style_sphere_selectionsWemen->color_mostly_wear))) { ?> active <?php } ?>'>Pastels</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What do you feel is missing from your FIT?          
                                    </h3>
                                    <div class="timeline-footer note">
                                        <ul>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Sweaters', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> active <?php } ?>'>Sweaters</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Blouses', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> active <?php } ?>'>Blouses</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Jeans', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> active <?php } ?>'>Jeans</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Pants', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> active <?php } ?>'>Pants</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Skirts', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> active <?php } ?>'>Skirts</li>
                                            <li class='<?php if (isset($style_sphere_selectionsWemen->missing_from_your_fIT) && in_array('Dresses', explode(',', $style_sphere_selectionsWemen->missing_from_your_fIT))) { ?> active <?php } ?>'>Dresses</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Would you wear any of these denim styles?        
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <ul>
                                            <li>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim1.jpg" alt="" width="223" height="216">
                                                </div>

                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$Womenstyle->distressed_denim_non == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$Womenstyle->distressed_denim_non == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$Womenstyle->distressed_denim_non == 'never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim2.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$Womenstyle->distressed_denim_minimally == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span  class="<?php if (@$Womenstyle->distressed_denim_minimally == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span  class="<?php if (@$Womenstyle->distressed_denim_minimally == 'never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim3.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$Womenstyle->distressed_denim_fairly == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span  class="<?php if (@$Womenstyle->distressed_denim_fairly == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span  class="<?php if (@$Womenstyle->distressed_denim_fairly == 'never') { ?> active <?php } ?>"> Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim4.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$Womenstyle->distressed_denim_heavily == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span  class="<?php if (@$Womenstyle->distressed_denim_heavily == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span  class="<?php if (@$Womenstyle->distressed_denim_heavily == 'never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        How often do you dress for the following occasions?                  
                                    </h3>
                                    <div class="timeline-footer prefer">
                                        <ul>
                                            <li class=' <?= @$style_sphere_selectionsWemen->following_occasions == 1 ? "active" : ""; ?>'>Business Casual / Work</li>
                                            <li class=' <?= @$style_sphere_selectionsWemen->following_occasions == 2 ? "active" : ""; ?>'>Cocktail / Wedding / Special</li>
                                            <li class=' <?= @$style_sphere_selectionsWemen->following_occasions == 3 ? "active" : ""; ?>'>Most of the time</li>
                                            <li class=' <?= @$style_sphere_selectionsWemen->following_occasions == 4 ? "active" : ""; ?>'>Around once or twice a week</li>
                                            <li class=' <?= @$style_sphere_selectionsWemen->following_occasions == 5 ? "active" : ""; ?>'>Around once or twice a month</li>
                                            <li class=' <?= @$style_sphere_selectionsWemen->following_occasions == 7 ? "active" : ""; ?>'>Date Night / Night Out</li>
                                            <li class=' <?= @$style_sphere_selectionsWemen->following_occasions == 8 ? "active" : ""; ?>'>Laid Back Casual</li>
                                            <li class=' <?= @$style_sphere_selectionsWemen->following_occasions == 6 ? "active" : ""; ?>'>Rarely</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        What do you feel is missing from your closet?                  
                                    </h3>
                                    <div class="timeline-footer women-shose-prefer">
                                        <ul>
                                            <li class='<?php if (isset($WomenJeansStyle->jeans_style) && in_array('Sweaters', explode(',', @$WomenJeansStyle->jeans_style))) { ?> active <?php } ?>'>Sweaters</li>
                                            <li class='<?php if (isset($WomenJeansStyle->jeans_style) && in_array('Blouses', explode(',', @$WomenJeansStyle->jeans_style))) { ?> active <?php } ?>'>Blouses</li>
                                            <li class='<?php if (isset($WomenJeansStyle->jeans_style) && in_array('Jeans', explode(',', @$WomenJeansStyle->jeans_style))) { ?> active <?php } ?>'>Jeans</li>
                                            <li class='<?php if (isset($WomenJeansStyle->jeans_style) && in_array('Pants', explode(',', @$WomenJeansStyle->jeans_style))) { ?> active <?php } ?>'>Pants</li>
                                            <li class='<?php if (isset($WomenJeansStyle->jeans_style) && in_array('Skirts', explode(',', @$WomenJeansStyle->jeans_style))) { ?> active <?php } ?>'>Skirts</li>
                                            <li class='<?php if (isset($WomenJeansStyle->jeans_style) && in_array('Dresses', explode(',', @$WomenJeansStyle->jeans_style))) { ?> active <?php } ?>'>Dresses</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post budget-women">      
                                    <h3 class="username">
                                        Help Us to Know your Budget                    
                                    </h3>
                                    <div class="timeline-footer prefer">
                                        <h4>TOPS</h4>
                                        <ul>
                                            <li class='<?php if (@$Womenstyle->tops == 1) { ?> active <?php } ?>'>Under $50</li>
                                            <li  class='<?php if (@$Womenstyle->tops == 2) { ?> active <?php } ?>'>$50 - $75</li>
                                            <li  class='<?php if (@$Womenstyle->tops == 3) { ?> active <?php } ?>'>$75 - $100</li>
                                            <li  class='<?php if (@$Womenstyle->tops == 4) { ?> active <?php } ?>'>$100 - $125</li>
                                            <li  class='<?php if (@$Womenstyle->tops == 5) { ?> active <?php } ?>'>$125+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>BOTTOMS</h4>
                                        <ul>
                                            <li class='<?php if (@$Womenstyle->bottoms == 1) { ?>  active <?php } ?>'>Under $30</li>
                                            <li class='<?php if (@$Womenstyle->bottoms == 2) { ?>  active <?php } ?>'>$30 - $50</li>
                                            <li class='<?php if (@$Womenstyle->bottoms == 3) { ?>  active <?php } ?>'>$50 - $70</li>
                                            <li class='<?php if (@$Womenstyle->bottoms == 4) { ?>  active <?php } ?>'>$70 - $90</li>
                                            <li class='<?php if (@$Womenstyle->bottoms == 5) { ?>  active <?php } ?>'>$90+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>OUTERWEAR</h4>
                                        <ul>
                                            <li class='<?php if (@$Womenstyle->outwear == 1) { ?> active <?php } ?>'>Under $50</li>
                                            <li class='<?php if (@$Womenstyle->outwear == 2) { ?> active <?php } ?>'>$50 - $75</li>
                                            <li class='<?php if (@$Womenstyle->outwear == 3) { ?> active <?php } ?>'>$75 - $100</li>
                                            <li class='<?php if (@$Womenstyle->outwear == 4) { ?> active <?php } ?>'>$100 - $125</li>
                                            <li class='<?php if (@$Womenstyle->outwear == 5) { ?> active <?php } ?>'>$125+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>JEANS</h4>
                                        <ul>
                                            <li class='<?php if (@$Womenstyle->jeans == 1) { ?> active <?php } ?>'>Under $75</li>
                                            <li class='<?php if (@$Womenstyle->jeans == 2) { ?> active <?php } ?>'>$75 - $100</li>
                                            <li class='<?php if (@$Womenstyle->jeans == 3) { ?> active <?php } ?>'>$100 - $125</li>
                                            <li class='<?php if (@$Womenstyle->jeans == 4) { ?> active <?php } ?>'>$125 - $175</li>
                                            <li class='<?php if (@$Womenstyle->jeans == 5) { ?> active <?php } ?>'>$175+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>JEWELRY</h4>
                                        <ul>
                                            <li class='<?php if (@$Womenstyle->jewelry == 1) { ?> active <?php } ?>'>Under $40</li>
                                            <li class='<?php if (@$Womenstyle->jewelry == 2) { ?> active <?php } ?>'>$40 - $60</li>
                                            <li class='<?php if (@$Womenstyle->jewelry == 3) { ?> active <?php } ?>'>$60 - $80</li>
                                            <li class='<?php if (@$Womenstyle->jewelry == 4) { ?> active <?php } ?>'>$80 - $100</li>
                                            <li class='<?php if (@$Womenstyle->jewelry == 5) { ?> active <?php } ?>'>$100+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>ACCESSORIES</h4>
                                        <ul>
                                            <li class='<?php if (@$Womenstyle->accessproes == 1) { ?> active <?php } ?>'>Under $75</li>
                                            <li class='<?php if (@$Womenstyle->accessproes == 2) { ?> active <?php } ?>'>$75 - $125</li>
                                            <li class='<?php if (@$Womenstyle->accessproes == 3) { ?> active <?php } ?>'>$125 - $175</li>
                                            <li class='<?php if (@$Womenstyle->accessproes == 4) { ?> active <?php } ?>'>$175 - $250</li>
                                            <li class='<?php if (@$Womenstyle->accessproes == 5) { ?> active <?php } ?>'>$175 - $250</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>DRESS</h4>
                                        <ul>
                                            <li class='<?php if (@$Womenstyle->dress == 1) { ?> active <?php } ?>'>Under $75</li>
                                            <li class='<?php if (@$Womenstyle->dress == 2) { ?> active <?php } ?>'>$75 - $125</li>
                                            <li class='<?php if (@$Womenstyle->dress == 3) { ?> active <?php } ?>'>$125 - $175</li>
                                            <li class='<?php if (@$Womenstyle->dress == 4) { ?> active <?php } ?>'>$175 - $250</li>
                                            <li class='<?php if (@$Womenstyle->dress == 5) { ?> active <?php } ?>'>$175 - $250</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Please do double click to upload any images / design you want your stylist to work for you ?                 
                                    </h3>  
                                    <div class="timeline-footer design">
                                        <ul>
                                            <li><div class="upload-img">
                                                    <?php if (@$wemenDesigne->img_1 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum1.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img   src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_1; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">First Design</h4>
                                            </li>
                                            <li><div class="upload-img">
                                                    <?php if (@$wemenDesigne->img_2 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum2.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img   src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_2; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">Second Design</h4>
                                            </li>
                                            <li>
                                                <div class="upload-img">
                                                    <?php if (@$wemenDesigne->img_3 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/women-img/Women-costum3.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img   src="<?php echo HTTP_ROOT . USER_CUSTOM . @$wemenDesigne->img_3; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">Third Design</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">      
                                    <h3 class="username">
                                        Brand or store you prefer to shop ?               
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li class='<?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/penguin.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/nike.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/scotch.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/gap.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/pata.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/tommy.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/boss.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vineyard.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vans.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/hurley.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/brooks.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/zara.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/levis.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/armour.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/bonobos.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/landsend.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/jcrew.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/oldnavy.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/uniqlo.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/northface.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('hm', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/h&m.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/eagle.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/ragnbone.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/men/bensharma.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/express.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/polo.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('dillards', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-a.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('mecy', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-b.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('naimai', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-c.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('urban', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-d.jpg" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($menbrand) && in_array('nordstrom', @$menbrand)) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-e.jpg" alt="">
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">Any comment you want to share ?</h3>  
                                    <div class="timeline-footer comment">
                                        <p><?php echo @$Womenstyle->profile_note; ?></p>
                                    </div>
                                </div>
                            </div>                             
                            <div class="box-footer">
                                <a target="_blank" href="<?php echo HTTP_ROOT . 'appadmins/women_print/' . $id; ?>"><button type="button" class="btn btn-primary">Print </button></a>
                            </div> 
                        </div> 
                    </div> 
                <?php }
                ?>
                <!--for women-->
                <!-- /.col -->
            </div><!-- /.row -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    function myFunction() {
        window.print();
    }
</script>

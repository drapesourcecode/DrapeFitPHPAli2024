<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo @$kid->user->name; ?>'s Kid Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Back</a></li> -->
        </ol>
    </section>

    <!-- Main content -->
    <?php if (@$kid->kids_clothing_gender == 'boys') { ?>
        <section class="content">

            <div class="row">

                <!-- /.col -->
                <!--for men-->
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="box box-primary user-detail-top">
                        <div class="box-body box-profile">
                            <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->
                            <div class="">
                                <img src="<?php echo HTTP_ROOT_BASE . BARCODE_PROFILE . $kid->barcode_image; ?>" style="text-align:center;">
                            </div>
                            <h3 class="profile-username text-center"><?php echo @$kid->kids_first_name; ?></h3>
                            <p class="text-muted text-center"><?php
                                                                if (@$kid->kids_clothing_gender == 'Hello') {
                                                                    echo "Hello";
                                                                } elseif (@$kid->kids_clothing_gender == 'boys') {
                                                                    echo 'Boys';
                                                                }
                                                                ?></p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item"><b>Email:</b> <a class="pull-right"><?php echo $kid->user->email; ?></a></li>
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
                <div class="col-md-12 add-tab-section">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div class="tab-pane active" id="<?php echo @$kid->id; ?>">
                                <!-- Post -->
                                <div class="post">
                                    <div class="post-left-box">
                                        <h3 class="username">
                                            Your Child Name?
                                        </h3>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$kid->kids_first_name; ?></a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            Your Child Birthday?
                                        </h3>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$kid->kids_birthdate; ?> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-left-box">
                                        <h3 class="username">
                                            FIT you are looking for?
                                        </h3>
                                        <div class="timeline-footer parent-box">
                                            <a class="btn btn-primary btn-xs blue">

                                                <span class="<?php if (@$kid->kids_clothing_gender == 'girls') { ?> active <?php } ?>">Girl’s Product</span>
                                                <span class="<?php if (@$kid->kids_clothing_gender == 'boys') { ?> active <?php } ?>">Boy’s Product</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            Relationship with your child?
                                        </h3>
                                        <div class="timeline-footer parent-box">
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$kid->kids_relationship_to_child == 'father') { ?> active <?php } ?>">Father</span>
                                                <span class="<?php if (@$kid->kids_relationship_to_child == 'mother') { ?> active <?php } ?>">Mother</span>
                                                <span class="<?php if (@$kid->kids_relationship_to_child == 'other') { ?> active <?php } ?>">Other</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-left-box">
                                        <h3 class="username">
                                            Your Child Height?
                                        </h3>
                                        <div class="timeline-footer">
                                            <span><a class="btn btn-primary btn-xs blue"><?php echo @$kid->tall_feet; ?> </a> ft.</span>
                                            <span><a class="btn btn-primary btn-xs blue"><?php echo @$kid->tell_inch; ?> </a> in.</span>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            Your Child Weight?
                                        </h3>
                                        <div class="timeline-footer">
                                            <span><a class="btn btn-primary btn-xs blue"><?php
                                                                                            if (!empty($kid->weight_lb)) {
                                                                                                echo @$kid->weight_lb;
                                                                                            }
                                                                                            ?> </a> lbs.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Your Child Personality ?
                                    </h3>
                                    <div class="timeline-footer women-shose-prefer">
                                        <ul>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Thoughtful', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Thoughtful</li>
                                            <li class=" <?php if (isset($kid->child_personality) && in_array('Sporty', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Sporty</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Shy', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Shy</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Outgoing', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Outgoing</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Artistic', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Artistic</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Chatty', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Chatty</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Bookworm', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Bookworm</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Curious', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Curious</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Sassy', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Sassy</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Funny', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Funny</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Independent', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Independent</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Kind', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Kind</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Daredevil', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Daredevil</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Serious', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Serious</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Adventurous', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Adventurous</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Confident', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Confident</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        what size your child do prefer to wear ?
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <a class="btn btn-primary btn-xs blue">
                                            <span class=" <?php if (@$kid->size_prefer_wear == '1') { ?> active<?php } ?>">Bottom Size</span>
                                            <span class=" <?php if (@$kid->size_prefer_wear == '2') { ?> active<?php } ?>"> Top Size</span>
                                            <span class=" <?php if (@$kid->size_prefer_wear == '3') { ?> active<?php } ?>">Shoe Size</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Tell Us Which Color do you want to prefer?
                                    </h3>
                                    <div class="timeline-footer color">
                                        <ul>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('1', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Black</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('2', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Grey</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('3', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>White</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('4', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Cream</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('5', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Brown</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('6', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Purple</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('7', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Green</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('8', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Blue</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('9', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Orange</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('10', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Yellow</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('11', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Red</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('12', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Pink</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post">
                                    <h3 class="username">
                                        What sizes does you prefer for your child ?
                                    </h3>
                                    <div class="timeline-footer women-prefer">
                                        <ul>
                                            <li>
                                                <h4>TOPS SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo $KidsSizeFit->top_size; ?></a>
                                            </li>
                                            <li>
                                                <h4>BOTTOMS SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo $KidsSizeFit->bottom_size; ?></a>
                                            </li>
                                            <li>
                                                <h4>SHOE SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$KidsSizeFit->shoe_size; ?></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="post">
                                    <h3 class="username">
                                        Your Child Body Shape ?
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <a class="btn btn-primary btn-xs blue">
                                            <span class="<?php if (@$KidsSizeFit->body_shape == 'Husky') { ?> active <?php } ?>">Husky</span>
                                            <span class="<?php if (@$KidsSizeFit->body_shape == 'Average') { ?> active <?php } ?>">Average</span>
                                            <span class="<?php if (@$KidsSizeFit->body_shape == 'Slim') { ?> active <?php } ?>">Slim</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="post">
                                    <h3 class="username">
                                        Does your child have any FIT issue?
                                    </h3>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHIRT SLEEVE LENGTH</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too short') { ?> active <?php } ?>">Too short</span>
                                                <span class="<?php if (@$KidsSizeFit->shirt_sleeve_length == 'None') { ?> active <?php } ?>">None</span>
                                                <span class="<?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too long') { ?> active <?php } ?>">Too long</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHIRT TORSO LENGTH</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?> active <?php } ?> ">Too short</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?> active <?php } ?> ">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?> active <?php } ?> ">Too long</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHIRT TORSO WIDTH </h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too tight') { ?> active <?php } ?> ">Too tight</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?> active <?php } ?> ">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too loose') { ?> active <?php } ?> ">Too loose</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PANT WAIST</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too tight') { ?> active <?php } ?>">Too tight</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?> active <?php } ?>">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too loose') { ?> active <?php } ?>">Too loose</span></a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PANT LEG LENGTH (INSEAM)</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?> active <?php } ?>">Too short</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?> active <?php } ?>">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?> active <?php } ?>">Too long</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PANT LEGS WIDTH</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too tight') { ?> active <?php } ?>">Too tight</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'None') { ?> active <?php } ?>">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too long') { ?> active <?php } ?>">Too loose</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="post">
                                    <h3 class="username">
                                        Please share the following items you like to receive ?
                                    </h3>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>T-SHIRTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->t_shirts == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->t_shirts == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->t_shirts == 'Rarely') { ?>active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SWEATSHIRTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->sweats_shirts == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->sweats_shirts == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->sweats_shirts == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>POLO SHIRTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->polo_shirts == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->polo_shirts == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->polo_shirts == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>BUTTON-DOWNS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->button_downs == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->button_downs == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->button_downs == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SWEATERS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->sweaters == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->sweaters == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->sweaters == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>JACKETS & COATS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->jacket_coats == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->jacket_coats == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->jacket_coats == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHORTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->shorts == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->shorts == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->shorts == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>JEANS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->jeans == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->jeans == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->jeans == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>TROUSERS & CHINOS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->trousers_chino == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->trousers_chino == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->trousers_chino == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SWEATPANTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->sweatspaint == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->sweatspaint == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->sweatspaint == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHOES</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->shoes == 'Often') { ?> active <?php } ?> ">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->shoes == 'Sometimes') { ?> active <?php } ?> ">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->shoes == 'Rarely') { ?> active <?php } ?> ">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PAJAMAS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->pajamas == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->pajamas == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->pajamas == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="post kid-active">
                                    <h3 class="username">
                                        How often does your child do the following activities?
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <ul>
                                            <li>
                                                <h4>Arts & Crafts</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-1a.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Biking</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-1b.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class=" <?php if (@$kid->kids_frequency_biking == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class=" <?php if (@$kid->kids_frequency_biking == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class=" <?php if (@$kid->kids_frequency_biking == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Dance</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-1c.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_dance == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_dance == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_dance == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Playing Outside</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-1d.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_playing_outside == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_playing_outside == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_playing_outside == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Musical Instruments</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-1e.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_musical_instruments == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_musical_instruments == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_musical_instruments == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Reading</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-1f.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_reading == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_reading == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_reading == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post kid-active">
                                    <h3 class="username">
                                        What type of prints your child prefer?
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <ul>
                                            <li>
                                                <h4>STRIPES</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-print1.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->stripes == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->stripes == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->stripes == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>PLAID</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-print2.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->plaid == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->plaid == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->plaid == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>GINGHAM</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-print3.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->gingham == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->gingham == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->gingham == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>NOVELTY</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-print4.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->novelty == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->novelty == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->novelty == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>POLKA DOTS</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-print5.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->polkadots == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->polkadots == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->polkadots == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>CAMO</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-print6.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->camo == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->camo == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->camo == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post budget-women">
                                    <h3 class="username">
                                        Help Us to Know your Budget
                                    </h3>
                                    <div class="timeline-footer prefer">
                                        <h4>CASUAL SHIRTS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->casual_shirts == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->casual_shirts == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->casual_shirts == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->casual_shirts == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>SHORTS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->shorts == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->shorts == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->shorts == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->shorts == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>JEANS & PANTS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->jeans_paint == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->jeans_paint == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->jeans_paint == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->jeans_paint == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>JACKETS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->jaket == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->jaket == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->jaket == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->jaket == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>SWEATERS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->sweaters == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->sweaters == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->sweaters == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->sweaters == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>BUTTON DOWNS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->button_downs == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->button_downs == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->button_downs == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->button_downs == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>CASUAL BOTTOMS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->casual_bootms == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->casual_bootms == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->casual_bootms == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->casual_bootms == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>SHOES</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->shoes == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->shoes == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->shoes == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->shoes == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Please do double click to upload any images / design you want your stylist to work for you ?
                                    </h3>
                                    <div class="timeline-footer design">
                                        <ul>
                                            <li>
                                                <div class="upload-img">
                                                    <?php if (@$designe->img_1 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/kid-img/KidBoyCustomDesign1.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo HTTP_ROOT_BASE . USER_CUSTOM . @$designe->img_1; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">First Design</h4>
                                            </li>
                                            <li>
                                                <div class="upload-img">
                                                    <?php if (@$designe->img_2 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/kid-img/KidBoyCustomDesign2.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo HTTP_ROOT_BASE . USER_CUSTOM . @$designe->img_2; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">Second Design</h4>
                                            </li>
                                            <li>
                                                <div class="upload-img">
                                                    <?php if (@$designe->img_3 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/kid-img/KidBoyCustomDesign3.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo HTTP_ROOT_BASE . USER_CUSTOM . @$designe->img_3; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">Third Design</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post">
                                    <h3 class="username">
                                        Brand or store you prefer to shop for your child ?
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('janine', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo1.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('oldnavy', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo2.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('tea', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo3.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('terget', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo4.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('jcrew', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo5.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('nike', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo6.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('place', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo7.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('carters', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo8.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('zara', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo9.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('gym', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo10.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('under', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo11.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('gap', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo12.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('khals', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo13.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('mars', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo14.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('just', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo15.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('jcp', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo16.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('amzone', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo17.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('nord', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo18.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('walmert', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo19.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('macy', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT_BASE ?>images/kids-brand-logo20.png" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">Add additional comments</h3>
                                    <div class="timeline-footer comment">
                                        <p><?php echo @$KidStyles->profile_note; ?></p>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <!-- <a target="_blank" href="<?php echo HTTP_ROOT_BASE . 'appadmins/kid_print/' . @$useridDetails->id; ?>"><button type="button" class="btn btn-primary">Print </button></a> -->
                                </div>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.nav-tabs-custom -->
                </div>

                <!--for men-->
                <!-- /.col -->
            </div><!-- /.row -->

        </section><!-- /.content -->

    <?php } else { ?>

        <section class="content">

            <div class="row">
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="box box-primary user-detail-top">
                        <div class="box-body box-profile">
                            <!--<img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->
                            <div class="">
                                <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $kid->barcode_image; ?>" style="text-align:center;">
                            </div>
                            <h3 class="profile-username text-center"><?php echo @$kid->kids_first_name; ?></h3>
                            <p class="text-muted text-center"><?php
                                                                if (@$kid->kids_clothing_gender == 'girls') {
                                                                    echo "Girls";
                                                                } elseif (@$kid->kids_clothing_gender == 'boys') {
                                                                    echo 'Boys';
                                                                }
                                                                ?></p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item"><b>Email:</b> <a class="pull-right"><?php echo $kid->user->email; ?></a></li>
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
                <div class="col-md-12 add-tab-section">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div class="tab-pane active" id="<?php echo @$kid->id; ?>">
                                <!-- Post -->
                                <div class="post">
                                    <div class="post-left-box">
                                        <h3 class="username">
                                            Your Child Name?
                                        </h3>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$kid->kids_first_name; ?></a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            Your Child Birthday?
                                        </h3>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs blue"><?php echo @$kid->kids_birthdate; ?> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-left-box">
                                        <h3 class="username">
                                            FIT you are looking for?
                                        </h3>
                                        <div class="timeline-footer parent-box">
                                            <a class="btn btn-primary btn-xs blue">

                                                <span class="<?php if (@$kid->kids_clothing_gender == 'girls') { ?> active <?php } ?>">Girl’s Product</span>
                                                <span class="<?php if (@$kid->kids_clothing_gender == 'boys') { ?> active <?php } ?>">Boy’s Product</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            Relationship with your child?
                                        </h3>
                                        <div class="timeline-footer parent-box">
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$kid->kids_relationship_to_child == 'father') { ?> active <?php } ?>">Father</span>
                                                <span class="<?php if (@$kid->kids_relationship_to_child == 'mother') { ?> active <?php } ?>">Mother</span>
                                                <span class="<?php if (@$kid->kids_relationship_to_child == 'other') { ?> active <?php } ?>">Other</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-left-box">
                                        <h3 class="username">
                                            Your Child Height?
                                        </h3>
                                        <div class="timeline-footer">
                                            <span><a class="btn btn-primary btn-xs blue"><?php echo @$kid->tall_feet; ?> </a> ft.</span>
                                            <span><a class="btn btn-primary btn-xs blue"><?php echo @$kid->tell_inch; ?> </a> in.</span>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <h3 class="username">
                                            Your Child Weight?
                                        </h3>
                                        <div class="timeline-footer">
                                            <span><a class="btn btn-primary btn-xs blue"><?php
                                                                                            if (!empty($kid->weight_lb)) {
                                                                                                echo @$kid->weight_lb;
                                                                                            }
                                                                                            ?> </a> lbs.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Your Child Personality ?
                                    </h3>
                                    <?php //echo $kid->child_personality; 
                                    ?>
                                    <div class="timeline-footer women-shose-prefer">
                                        <ul>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Thoughtful', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Thoughtful</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Sporty', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Sporty</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Shy', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Shy</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Outgoing', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Outgoing</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Artistic', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Artistic</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Chatty', explode(',', @$kid->child_personality))) { ?> active <?php } ?> ">Chatty</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Bookworm', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Bookworm</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Curious', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Curious</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Sassy', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Sassy</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Funny', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Funny</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Independent', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Independent</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Kind', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Kind</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Daredevil', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Daredevil</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Serious', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Serious</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Adventurous', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Adventurous</li>
                                            <li class="<?php if (isset($kid->child_personality) && in_array('Confident', explode(',', @$kid->child_personality))) { ?> active <?php } ?>">Confident</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        what size your child do prefer to wear ?
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <a class="btn btn-primary btn-xs blue">
                                            <span class=" <?php if (@$kid->size_prefer_wear == '1') { ?> active<?php } ?>">Bottom Size</span>
                                            <span class=" <?php if (@$kid->size_prefer_wear == '2') { ?> active<?php } ?>"> Top Size</span>
                                            <span class=" <?php if (@$kid->size_prefer_wear == '3') { ?> active<?php } ?>">Shoe Size</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Tell Us Which Color do you want to prefer?
                                    </h3>
                                    <div class="timeline-footer color">
                                        <ul>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('1', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Black</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('2', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Grey</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('3', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>White</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('4', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Cream</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('5', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Brown</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('6', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Purple</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('7', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Green</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('8', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Blue</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('9', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Orange</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('10', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Yellow</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('11', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Red</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                            <li class="<?php if ((strlen(@$kid->prefer_color) > 2) && (in_array('12', json_decode(@$kid->prefer_color, true)))) { ?> active <?php } ?>">
                                                <h4>Pink</h4>
                                                <div class="wear-img">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post">
                                    <h3 class="username">
                                        What sizes does you prefer for your child ?
                                    </h3>
                                    <div class="timeline-footer women-prefer">
                                        <ul>
                                            <li>
                                                <h4>TOPS SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo $KidsSizeFit->top_size; ?></a>
                                            </li>
                                            <li>
                                                <h4>BOTTOMS SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo $KidsSizeFit->bottom_size; ?></a>
                                            </li>
                                            <li>
                                                <h4>SHOE SIZE</h4>
                                                <a class="btn btn-primary btn-xs blue"><?php echo @$KidsSizeFit->shoe_size; ?></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Your Child Body Shape ?
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <a class="btn btn-primary btn-xs blue">
                                            <span class="<?php if (@$KidsSizeFit->body_shape == 'Husky') { ?> active <?php } ?>">Husky</span>
                                            <span class="<?php if (@$KidsSizeFit->body_shape == 'Average') { ?> active <?php } ?>">Average</span>
                                            <span class="<?php if (@$KidsSizeFit->body_shape == 'Slim') { ?> active <?php } ?>">Slim</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Does your child have any FIT issue?
                                    </h3>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHIRT SLEEVE LENGTH</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too short') { ?> active <?php } ?>">Too short</span>
                                                <span class="<?php if (@$KidsSizeFit->shirt_sleeve_length == 'None') { ?> active <?php } ?>">None</span>
                                                <span class="<?php if (@$KidsSizeFit->shirt_sleeve_length == 'Too long') { ?> active <?php } ?>">Too long</span></a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHIRT TORSO LENGTH</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?> active <?php } ?> ">Too short</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?> active <?php } ?> ">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?> active <?php } ?> ">Too long</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHIRT TORSO WIDTH</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too tight') { ?> active <?php } ?> ">Too tight</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?> active <?php } ?> ">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too loose') { ?> active <?php } ?> ">Too loose</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PANT WAIST</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too tight') { ?> active <?php } ?>">Too tight</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?> active <?php } ?>">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too loose') { ?> active <?php } ?>">Too loose</span></a>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PANT LEG LENGTH (INSEAM)</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?> active <?php } ?>">Too short</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?> active <?php } ?>">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?> active <?php } ?>">Too long</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PANT LEGS WIDTH</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too tight') { ?> active <?php } ?>">Too tight</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'None') { ?> active <?php } ?>">None</span>
                                                <span class="<?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_width == 'Too long') { ?> active <?php } ?>">Too loose</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="post">
                                    <h3 class="username">
                                        Please share the following items you like to receive ?
                                    </h3>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>T-SHIRTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->t_shirts == 'Often') { ?>active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->t_shirts == 'Sometimes') { ?>active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->t_shirts == 'Rarely') { ?>active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>TOPS & BLOUSES </h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->top_blouses === 'Often') { ?> active <?php  } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->top_blouses === 'Sometimes') { ?> active <?php  } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->top_blouses === 'Rarely') { ?> active <?php  } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SWEATSHIRTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->sweats_shirts == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->sweats_shirts == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->sweats_shirts == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SWEATERS </h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->sweaters == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->sweaters == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->sweaters == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>JACKETS & COATS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->jacket_coats == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->jacket_coats == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->jacket_coats == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>DRESSES & ROMPERS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->dreses_rompers == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->dreses_rompers == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->dreses_rompers == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHORTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->shorts == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->shorts == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->shorts == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>LEGGINGS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->leggings == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->leggings == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->leggings == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>JEANS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->jeans == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->jeans == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->jeans == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PANTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->paint == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->paint == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->paint == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SKIRTS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->skirts == 'Often') { ?> active <?php  } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->skirts == 'Sometimes') { ?> active <?php  } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->skirts == 'Rarely') { ?> active <?php  } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>ACCESSORIES</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class=" <?php if (@$KidsSizeFit->accessories == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class=" <?php if (@$KidsSizeFit->accessories == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class=" <?php if (@$KidsSizeFit->accessories == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-left-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>SHOES</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->shoes == 'Often') { ?> active <?php } ?> ">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->shoes == 'Sometimes') { ?> active <?php } ?> ">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->shoes == 'Rarely') { ?> active <?php } ?> ">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-right-box">
                                        <div class="timeline-footer parent-box">
                                            <h4>PAJAMAS</h4>
                                            <a class="btn btn-primary btn-xs blue">
                                                <span class="<?php if (@$KidsSizeFit->pajamas == 'Often') { ?> active <?php } ?>">Often</span>
                                                <span class="<?php if (@$KidsSizeFit->pajamas == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                <span class="<?php if (@$KidsSizeFit->pajamas == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="post kid-active">
                                    <h3 class="username">
                                        How often does your child do the following activities?
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <ul>
                                            <li>
                                                <h4>Arts & Crafts</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-1a.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_arts_and_crafts == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Biking</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-1b.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class=" <?php if (@$kid->kids_frequency_biking == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class=" <?php if (@$kid->kids_frequency_biking == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class=" <?php if (@$kid->kids_frequency_biking == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Dance</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-1c.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_dance == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_dance == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_dance == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Playing Outside</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-1d.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_playing_outside == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_playing_outside == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_playing_outside == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Musical Instruments</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-1e.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_musical_instruments == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_musical_instruments == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_musical_instruments == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>Reading</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-1f.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$kid->kids_frequency_reading == 'Often') { ?> active <?php } ?>">Often</span>
                                                    <span class="<?php if (@$kid->kids_frequency_reading == 'Sometimes') { ?> active <?php } ?>">Sometimes</span>
                                                    <span class="<?php if (@$kid->kids_frequency_reading == 'Rarely') { ?> active <?php } ?>">Rarely</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post kid-active">
                                    <h3 class="username">
                                        What type of prints your child prefer?
                                    </h3>
                                    <div class="timeline-footer parent-box">
                                        <ul>
                                            <li>
                                                <h4>STRIPES</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-print1.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->stripes == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->stripes == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->stripes == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>FLORAL</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-print2.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->floral == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->floral == 'Maybe') { ?> active <?php } else if (@$KidClothingType->floral == '') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->floral == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>ANIMAL PRINT</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-print3.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->animal_print == 'Yes') { ?> active <?php }  ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->animal_print == 'Maybe') { ?> active <?php }  ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->animal_print == 'Never') { ?> active <?php }  ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>POLKADOT</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-print4.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->polkadots == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->polkadots == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->polkadots == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>PLAID</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-print5.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->plaid == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->plaid == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->plaid == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                            <li>
                                                <h4>CAMO</h4>
                                                <div class="denim-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kidsg-print6.jpg" alt="" width="223" height="216">
                                                </div>
                                                <a class="btn btn-primary btn-xs blue">
                                                    <span class="<?php if (@$KidClothingType->camo == 'Yes') { ?> active <?php } ?>">Yes</span>
                                                    <span class="<?php if (@$KidClothingType->camo == 'Maybe') { ?> active <?php } ?>">Maybe</span>
                                                    <span class="<?php if (@$KidClothingType->camo == 'Never') { ?> active <?php } ?>">Never</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post budget-women">
                                    <h3 class="username">
                                        Help Us to Know your Budget
                                    </h3>
                                    <div class="timeline-footer prefer">
                                        <h4>CASUAL SHIRTS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->casual_shirts == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->casual_shirts == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->casual_shirts == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->casual_shirts == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>SKIRTS & SHORTS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->skirts_shorts == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->skirts_shorts == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->skirts_shorts == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->skirts_shorts == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>LEGGINGS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->leggings == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->leggings == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->leggings == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->leggings == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>JEANS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->jeans == '1') { ?> active <?php }  ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->jeans == '2') { ?> active <?php }  ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->jeans == '3') { ?> active <?php }  ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->jeans == '4') { ?> active <?php }  ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>DRESSES</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->dresses == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->dresses == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->dresses == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->dresses == '4') { ?> active <?php } ?>">$50+</li>

                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>SWEATERS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->sweaters == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->sweaters == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->sweaters == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->sweaters == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>BLOUSES</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->blouses == '1') { ?> active <?php }  ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->blouses == '2') { ?> active <?php }  ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->blouses == '3') { ?> active <?php }  ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->blouses == '4') { ?> active <?php }  ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>JACKETS</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->jaket == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->jaket == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->jaket == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->jaket == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                    <div class="timeline-footer prefer">
                                        <h4>SHOES</h4>
                                        <ul>
                                            <li class="<?php if (@$KidStyles->shoes == '1') { ?> active <?php } ?>">$20-$30</li>
                                            <li class="<?php if (@$KidStyles->shoes == '2') { ?> active <?php } ?>">$30-$40</li>
                                            <li class="<?php if (@$KidStyles->shoes == '3') { ?> active <?php } ?>">$40-$50</li>
                                            <li class="<?php if (@$KidStyles->shoes == '4') { ?> active <?php } ?>">$50+</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">
                                        Please do double click to upload any images / design you want your stylist to work for you ?
                                    </h3>
                                    <div class="timeline-footer design">
                                        <ul>
                                            <li>
                                                <div class="upload-img">
                                                    <?php if (@$designe->img_1 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign1.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_1; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">First Design</h4>
                                            </li>
                                            <li>
                                                <div class="upload-img">
                                                    <?php if (@$designe->img_2 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign2.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_2; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">Second Design</h4>
                                            </li>
                                            <li>
                                                <div class="upload-img">
                                                    <?php if (@$designe->img_3 == '') { ?>
                                                        <img src="<?php echo HTTP_ROOT ?>assets/kid-img/KidGirlCustomDesign3.jpg" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo HTTP_ROOT . USER_CUSTOM . @$designe->img_3; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <h4 style="text-align: center;">Third Design</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="post">
                                    <h3 class="username">
                                        Brand or store you prefer to shop for your child ?
                                    </h3>
                                    <div class="timeline-footer wear">
                                        <ul>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('janine', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo1.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('oldnavy', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo2.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('tea', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo3.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('terget', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo4.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('jcrew', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo5.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('nike', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo6.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('place', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo7.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('carters', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo8.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('zara', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo9.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('gym', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo10.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('under', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo11.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('gap', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo12.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('khals', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo13.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('mars', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo14.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('just', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo15.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('jcp', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo16.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('amzone', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo17.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('nord', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo18.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('walmert', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo19.png" alt="">
                                                </div>
                                            </li>
                                            <li class='<?php if (isset($KidStyles->brands) && in_array('macy', explode(',', @$KidStyles->brands))) { ?> active <?php } ?>'>
                                                <div class="wear-img">
                                                    <img src="<?php echo HTTP_ROOT ?>images/kids-brand-logo20.png" alt="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post">
                                    <h3 class="username">Add additional comments</h3>
                                    <div class="timeline-footer comment">
                                        <p><?php echo @$KidStyles->profile_note; ?></p>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <a target="_blank" href="<?php echo HTTP_ROOT . 'appadmins/kid_print/' . @$useridDetails->id ?>"><button type="button" class="btn btn-primary">Print </button></a>
                                </div>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.nav-tabs-custom -->
                </div>

                <!--for men-->
                <!-- /.col -->
            </div><!-- /.row -->

        </section>
    <?php } ?>
</div>


<script>
    function myFunction() {
        window.print();
    }
</script>
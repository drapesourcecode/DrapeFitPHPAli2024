<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Invoice</title>
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
    <body onload="window.print();">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="active tab-pane" id="activity">
                <div class="post">      
                    <span class="username" style="color: #337ab7;">
                        How would you characterize your proportions?                         
                    </span> 
                    <div class="timeline-footer">
                        <a class="btn btn-xs  <?php if ($MenStats->best_describes_you == 1) { ?> btn-primary blue  <?php } else { ?> btn-danger<?php } ?>">I’m filling out this profile for myself </a>
                        <a class="btn btn-xs <?php if ($MenStats->best_describes_you == 2) { ?> btn-primary  blue <?php } else { ?>  btn-danger <?php } ?>">I’m filling out this profile for someone else</a>

                    </div>
                </div>
                <div class="post">      
                    <span class="username" style="color: #337ab7;">
                        How tall are you?                       
                    </span> 
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs blue"  ><?php echo $MenStats->tall_feet; ?> '</a> 
                        <a class="btn btn-primary btn-xs blue"  ><?php echo $MenStats->tell_inch; ?> "</a> 
                    </div>
                </div>
                <div class="post">      
                    <span class="username" style="color: #337ab7;">
                        What is your weight?                      
                    </span> 
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs blue"  ><?php echo $MenStats->weight_lb; ?> </a> 
                    </div>
                </div>
                <div class="post">      
                    <span class="username" style="color: #337ab7;">
                        When is your birthday?                      
                    </span> 
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs blue" ><?php echo $MenStats->birthday; ?> </a> 
                    </div>
                </div>
                <div class="post">      
                    <span class="username" style="color: #337ab7;">
                        What’s your occupation?                    
                    </span> 
                    <div class="form-group">

                        <a class="btn btn-primary btn-xs blue"><?php if ($MenStats->your_occupation == 1) { ?> Architecture / Engineering <?php } elseif ($MenStats->your_occupation == 2) {
    ?> 
                            Art / Design
                            <?php } elseif ($MenStats->your_occupation == 3) {
                                ?>  
                                Building / Maintenance 
                            <?php } elseif ($MenStats->your_occupation == 4) { ?>
                                Business / Client Service                                                     
                            <?php } elseif ($MenStats->your_occupation == 5) { ?>
                                Community / Social Service
                            <?php } elseif ($MenStats->your_occupation == 6) { ?>
                                Computer / IT  
                            <?php } elseif ($MenStats->your_occupation == 7) { ?>
                                Education
                            <?php } elseif ($MenStats->your_occupation == 8) { ?>
                                Entertainer / Performer  
                            <?php } elseif ($MenStats->your_occupation == 9) { ?>
                                Farming / Fishing / Forestry 
                            <?php } elseif ($MenStats->your_occupation == 10) { ?>
                                Financial Services 
                            <?php } elseif ($MenStats->your_occupation == 11) { ?>
                                Health Practitioner / Technician  
                            <?php } elseif ($MenStats->your_occupation == 12) { ?>
                                Hospitality / Food Service
                            <?php } elseif ($MenStats->your_occupation == 13) { ?>
                                Management
                            <?php } elseif ($MenStats->your_occupation == 14) { ?>
                                Media / Communications 
                            <?php } elseif ($MenStats->your_occupation == 15) { ?>
                                Military / Protective Service
                            <?php } elseif ($MenStats->your_occupation == 16) { ?>
                                Legal
                            <?php } elseif ($MenStats->your_occupation == 17) { ?>
                                Office / Administration
                            <?php } elseif ($MenStats->your_occupation == 18) { ?>
                                Average
                            <?php } elseif ($MenStats->your_occupation == 19) { ?>
                                Personal Care & Service
                            <?php } elseif ($MenStats->your_occupation == 20) { ?>
                                Production / Manufacturing 
                            <?php } elseif ($MenStats->your_occupation == 21) { ?>
                                Retail
                            <?php } elseif ($MenStats->your_occupation == 22) { ?> 
                                Sales
                            <?php } elseif ($MenStats->your_occupation == 23) { ?>
                                Science
                            <?php } elseif ($MenStats->your_occupation == 24) { ?>
                                Technology
                            <?php } elseif ($MenStats->your_occupation == 25) { ?>
                                Transportation 
                            <?php } elseif ($MenStats->your_occupation == 26) { ?>
                                Self-Employed 
                            <?php } elseif ($MenStats->your_occupation == 27) { ?>
                                Stay-At-Home Parent
                            <?php } elseif ($MenStats->your_occupation == 28) { ?>
                                Student
                            <?php } elseif ($MenStats->your_occupation == 29) { ?>
                                Retired
                            <?php } elseif ($MenStats->your_occupation == 30) { ?>
                                Not Employed 
                            <?php } elseif ($MenStats->your_occupation == 31) { ?>
                                other
                            <?php } ?>
                        </a>


                    </div>
                </div>
                <div class="post">      
                    <span class="username" style="color: #337ab7;">
                        How do you usually commute to work?                   
                    </span> 
                    <div class="form-group">
                        <a class="btn btn-primary btn-xs blue">
                            <?php if ($MenStats->commute_to_work == 1) { ?> Bike <?php } elseif ($MenStats->commute_to_work == 2) {
                                ?> 
                                Walk
                            <?php } elseif ($MenStats->commute_to_work == 3) {
                                ?>  
                                Drive 
                            <?php } elseif ($MenStats->commute_to_work == 4) { ?>
                                Public Transit                                                    
                            <?php } elseif ($MenStats->commute_to_work == 5) { ?>
                                None of the Above 
                            <?php } ?>
                        </a>                                       

                    </div>
                </div>
                <div class="post">      
                    <span class="username" style="color: #337ab7;">
                        Are you a parent?                  
                    </span> 
                    <div class="form-group">
                        <a class="btn btn-primary btn-xs blue">
                            <?php if ($MenStats->are_you_a_parent == 1) { ?> Yes <?php } elseif ($MenStats->are_you_a_parent == 2) {
                                ?> 
                                No

                            <?php } ?>
                        </a> 
                    </div>
                </div>
                <div class="post">      
                    <span class="username" style="color: #337ab7;">
                        What sizes do you typically wear?                     
                    </span>
                    <div class="timeline-footer">
                        <p>SHIRT</p>
                        <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->size; ?></a> 
                        <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->shirt; ?></a> 
                    </div>

                </div>
                <div class="post">  
                    <div class="timeline-footer">
                        <p>WAIST</p>
                        <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->waist; ?></a> 
                        <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->waist_size_run; ?></a> 
                    </div>

                </div>
                <div class="post">  
                    <div class="timeline-footer">
                        <p>INSEAM</p>
                        <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->inseam; ?></a> 
                    </div>                                  
                </div>
                <div class="post">  
                    <div class="timeline-footer">
                        <p>BLAZER</p>
                        <a class="btn btn-primary btn-xs blue"><?php echo @$TypicallyWearMen->bleazer; ?></a> 
                    </div>                                  
                </div>
                <div class="post">  
                    <div class="timeline-footer">
                        <p>SHOE</p>
                        <a class="btn btn-primary btn-xs blue"><?= @$TypicallyWearMen->shoe; ?></a> 
                        <a class="btn btn-primary btn-xs blue"><?= @$TypicallyWearMen->shoe_medium; ?></a>
                    </div>                                  
                </div>
                <div class="post">  
                    <div class="timeline-footer">
                        <span class="username" style="color: #337ab7;">How often would you like to receive Fixes?</span>

                        <div class="row">
                            <div class="col-sm-6">
                                <p>Slim</p>
                                <img  class="img-responsive <?= @$TypicallyWearMen->body_type == 1 ? "selected" : ""; ?> img-width" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/size-1.png" alt="Photo">
                                <br>
                                <p>Average</p>
                                <img class="img-responsive <?= @$TypicallyWearMen->body_type == 2 ? "selected" : ""; ?> img-width" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/size-2.png" alt="Photo">
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <p>Athletic</p>
                                <img class="img-responsive <?= @$TypicallyWearMen->body_type == 3 ? "selected" : ""; ?> img-width" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/size-3.png" alt="Photo">
                                <br>
                                <p>Husky</p>
                                <img class="img-responsive <?= @$TypicallyWearMen->body_type == 4 ? "selected" : ""; ?> img-width" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/size-4.png" alt="Photo">
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                    </div> 

                </div>

            </div>
        </div>
                </div>
            </div>
    </body>
</html>

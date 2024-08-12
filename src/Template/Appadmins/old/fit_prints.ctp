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
                   <div class="post">  
                                    <div class="timeline-footer">
                                        <span class="username" style="color: #337ab7;">How do you like your casual shirts to fit? </span>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>Slim</p>
                                                <img  class="img-responsive <?= in_array(1, explode(",", @$MenFit->casual_shirts_to_fit)) ? "selected" : ""; ?> img-width" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/slim.jpg" alt="Photo" width="150px">                                                                                              
                                                <p>Fitted through the chest, trim through the waist, tapered sleeves </p>
                                            </div><!-- /.col -->
                                            <div class="col-sm-6">
                                                <p>Regular</p>
                                                <img class="img-responsive <?= in_array(2, explode(",", @$MenFit->casual_shirts_to_fit)) ? "selected" : ""; ?> img-width" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/regular.jpg" alt="Photo" width="150px">  
                                                <p>Relaxed through the chest, waist, armholes & sleeves </p>
                                            </div>
                                        </div><!-- /.row -->

                                    </div> 

                                </div>
                                <div class="post">  
                                    <div class="timeline-footer">
                                        <span class="username" style="color: #337ab7;">How do you like your button-up shirts to fit?  </span>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>Slim</p>
                                                <img  class="img-responsive <?= in_array(1, explode(",", @$MenFit->button_up_shirts_to_fit)) ? "selected" : ""; ?> img-width" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/slim1.jpg" alt="Photo" width="150px">                                                                                              
                                                <p>Fitted through the chest, trim through the waist, tapered sleeves </p>
                                            </div><!-- /.col -->
                                            <div class="col-sm-6">
                                                <p>Regular</p>
                                                <img class="img-responsive <?= in_array(2, explode(",", @$MenFit->button_up_shirts_to_fit)) ? "selected" : ""; ?> img-width" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/regular2.jpg" alt="Photo" width="150px">  
                                                <p>Relaxed through the chest, waist, armholes & sleeves </p>
                                            </div>
                                        </div><!-- /.row -->

                                    </div> 

                                </div>
                                <div class="post">      
                                    <span class="username" style="color: #337ab7;">
                                        Do you normally tuck in a button-up shirt?                
                                    </span> 
                                    <div class="form-group">
                                          <a class="btn btn-primary btn-xs blue">
                                             <?php if (@$MenFit->tuck_in_a_button_up_shirt == 1) { ?> Yes <?php } 
                                                elseif (@$MenFit->tuck_in_a_button_up_shirt == 2) { ?> 
                                                    No
                                                <?php } 
                                                elseif (@$MenFit->tuck_in_a_button_up_shirt == 3) { ?>
                                                    I don’t wear button-up shirts
                                                    <?php }?>
                                                </a>                                        

                                    </div>
                                </div>
                                <div class="post">  
                                    <div class="timeline-footer">
                                        <span class="username" style="color: #337ab7;">How do you like your jeans to fit? </span>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>skinny</p>
                                                <img  class="img-width img-responsive <?= in_array(1, explode(",", @$MenFit->jeans_to_fit)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/skinny.jpg" alt="Photo" width="150px">                                                                                              
                                                <p>Cut narrow through the thigh, tight at the ankle </p>
                                            </div><!-- /.col -->
                                            <div class="col-sm-6">
                                                <p>Slim</p>
                                                <img class="img-width img-responsive <?= in_array(2, explode(",", @$MenFit->jeans_to_fit)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/slim2.jpg" alt="Photo" width="150px">  
                                                <p>Cut close through the thigh, slightly narrow at the ankle </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>Straight </p>
                                                <img class="img-width img-responsive <?= in_array(3, explode(",", @$MenFit->jeans_to_fit)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/straight.jpg" alt="Photo" width="150px">  
                                                <p>Comfortable through the thigh, straight below the knee  </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>Straight </p>
                                                <img class="img-width img-responsive <?= in_array(4, explode(",", @$MenFit->jeans_to_fit)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/relaxed.jpg" alt="Photo" width="150px">  
                                                <p>Relaxed through the thigh, straight below the knee  </p>
                                            </div>
                                        </div><!-- /.row -->

                                    </div> 

                                </div>
                                <div class="post">  
                                    <div class="timeline-footer">
                                        <span class="username" style="color: #337ab7;">How do you like your pants to fit? </span>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>Slim </p>
                                                <img  class="img-width img-responsive <?= in_array(1, explode(",", @$MenFit->your_pants_to_fit)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/pant_slim.jpg" alt="Photo" width="150px">                                                                                              
                                                <p>Cut close through the thigh, slightly narrow at the ankle</p>
                                            </div><!-- /.col -->                                            
                                            <div class="col-sm-6">
                                                <p>Straight</p>
                                                <img class="img-width img-responsive <?= in_array(2, explode(",", @$MenFit->your_pants_to_fit)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/pant_straight.jpg" alt="Photo" width="150px">  
                                                <p>Comfortable through the thigh, straight below the knee   </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>Relaxed</p>
                                                <img class="img-width img-responsive <?= in_array(3, explode(",", @$MenFit->your_pants_to_fit)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/pant_ralaxed.jpg" alt="Photo" width="150px">  
                                                <p>Relaxed through the thigh, straight below the knee </p>
                                            </div>
                                        </div><!-- /.row -->

                                    </div> 

                                </div>
                                <div class="post">  
                                    <div class="timeline-footer">
                                        <span class="username" style="color: #337ab7;">How long do you prefer your shorts?  </span>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>At the knee </p>
                                                <img  class="img-width img-responsive <?= in_array(1, explode(",", @$MenFit->prefer_your_shorts)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/attheknee.jpg" alt="Photo" width="150px">                                                                                              
                                                <p>At or below the knee</p>
                                            </div><!-- /.col -->                                            
                                            <div class="col-sm-6">
                                                <p>Above knee</p>
                                                <img class="img-width img-responsive <?= in_array(2, explode(",", @$MenFit->prefer_your_shorts)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/aboveknee.jpg" alt="Photo" width="150px">  
                                                <p>Right above the knee</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>Lower thigh</p>
                                                <img class="img-width img-responsive <?= in_array(3, explode(",", @$MenFit->prefer_your_shorts)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/lowerthigh.jpg" alt="Photo" width="150px">  
                                                <p>2 inches above the knee </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>Upper thigh</p>
                                                <img class="img-width img-responsive <?= in_array(4, explode(",", @$MenFit->prefer_your_shorts)) ? "selected" : ""; ?>" src="<?php echo HTTP_ROOT ?>webroot/assets/images/men/upperthigh.jpg" alt="Photo" width="150px">  
                                                <p>At least 3 inches above the knee  </p>
                                            </div>
                                        </div><!-- /.row -->

                                    </div> 

                                </div>
                                <div class="post">      
                                    <span class="username" style="color: #337ab7;">
                                        Are you willing to hem your pants?                          
                                    </span> 
                                    <div class="form-group">
                                        <a class="btn btn-primary btn-xs blue">
                                             <?php if (@$MenFit->hem_your_pants == 1) { ?> Yes <?php } 
                                                elseif (@$MenFit->hem_your_pants  == 2) { ?> 
                                                    No
                                                <?php } ?>
                                                
                                                   
                                                </a>
                                        

                                    </div>
                                </div>
                                <div class="post">      
                                    <span class="username" style="color: #337ab7;">                                        
                                        Do you have any fit challenges?                         
                                    </span> 
                                    <div class="timeline-footer">
                                        <span>Shirt collar</span><br>

                                        <a class="btn  btn-xs <?= @$MenFit->fit_challenges_shirt_collar == 1 ? "btn-primary blue" : "btn-danger"; ?>" >Too Tight</a>
                                        <a class="btn  btn-xs <?= @$MenFit->fit_challenges_shirt_collar == 2 ? "btn-primary blue" : "btn-danger"; ?>">No issue</a>
                                        <a class="btn  btn-xs <?= @$MenFit->fit_challenges_shirt_collar == 3 ? "btn-primary blue" : "btn-danger"; ?>">Too Loose</a>
                                    </div>
                                    <div class="timeline-footer">
                                        <span>Shirt shoulder</span><br>
                                        <a class="btn  btn-xs <?= @$MenFit->shirt_shoulder == 1 ? "btn-primary blue" : "btn-danger"; ?>" >Too Tight</a>
                                        <a class="btn  btn-xs <?= @$MenFit->shirt_shoulder == 2 ? "btn-primary blue" : "btn-danger"; ?>">No issue</a>
                                        <a class="btn  btn-xs <?= @$MenFit->shirt_shoulder == 3 ? "btn-primary blue" : "btn-danger"; ?>">Too Loose</a>
                                    </div>
                                    <div class="timeline-footer">
                                        <span>Sleeve length</span><br>
                                        <a class="btn  btn-xs <?= @$MenFit->sleeve_length == 1 ? "btn-primary blue" : "btn-danger"; ?>" >Too Tight</a>
                                        <a class="btn  btn-xs <?= @$MenFit->sleeve_length == 2 ? "btn-primary blue" : "btn-danger"; ?>">No issue</a>
                                        <a class="btn  btn-xs <?= @$MenFit->sleeve_length == 3 ? "btn-primary blue" : "btn-danger"; ?>">Too Loose</a>
                                    </div>
                                    <div class="timeline-footer">
                                        <span>Pant lower leg</span><br>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_lower_leg == 1 ? "btn-primary blue" : "btn-danger"; ?>" >Too Tight</a>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_lower_leg == 2 ? "btn-primary blue" : "btn-danger"; ?>">No issue</a>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_lower_leg == 3 ? "btn-primary blue" : "btn-danger"; ?>">Too Loose</a>
                                    </div>
                                    <div class="timeline-footer">
                                        <span>pant thigh </span><br>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_thigh == 1 ? "btn-primary blue" : "btn-danger"; ?>" >Too Tight</a>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_thigh == 2 ? "btn-primary blue" : "btn-danger"; ?>">No issue</a>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_thigh == 3 ? "btn-primary blue" : "btn-danger"; ?>">Too Loose</a>
                                    </div>
                                    <div class="timeline-footer">
                                        <span>pant length</span><br>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_length == 1 ? "btn-primary blue" : "btn-danger"; ?>" >Too Tight</a>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_length == 2 ? "btn-primary blue" : "btn-danger"; ?>">No issue</a>
                                        <a class="btn  btn-xs <?= @$MenFit->pant_length == 3 ? "btn-primary blue" : "btn-danger"; ?>">Too Loose</a>
                                    </div>
                                </div> 
                </div>
            </div>
        </div>
    </body>
</html>

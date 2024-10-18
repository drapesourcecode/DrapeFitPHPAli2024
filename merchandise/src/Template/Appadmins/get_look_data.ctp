<?php 
    //echo $this->Html->script('jquery.min.js'); 
?>

<div style="padding:0px 0 5px 20px;">
    <?php 
    if($gender == 2){
        if($look_count == 1){
            if($season_name == "Summer"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sleeveless top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_sleeveless_top">

                    </div>
                </div>
                <script>
                    $(document).ready(function(){  
                        getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Sleeveless top","look_1_summer_sleeveless_top");
                    });                    
                </script>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_short_sleeveless_top">

                    </div>
                    <script>
                        $(document).ready(function(){   
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Short sleeves top","look_1_summer_short_sleeveless_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Shorts (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_shorts">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Shorts","look_1_summer_shorts");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>                    
                    <div  class="col-sm-12" id="look_1_summer_dress">

                    </div>
                    <script>
                        $(document).ready(function(){ 
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Dress","look_1_summer_dress");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories/Kimono (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_accessories_kimono">

                    </div>
                    <script>
                        $(document).ready(function(){  
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories/Kimono","look_1_summer_accessories_kimono");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top(2 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Short sleeves top","look_1_fall_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Jeans","look_1_fall_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_dress">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Dress","look_1_fall_dress");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories","look_1_fall_accessories");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_winter_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Short sleeves top","look_1_winter_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_winter_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Long sleeves top","look_1_winter_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_winter_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Jeans","look_1_winter_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sweater Dress (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_winter_sweater_dress">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Sweater Dress","look_1_winter_sweater_dress");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_winter_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Accessories","look_1_winter_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves  top  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_spring_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Short sleeves top","look_1_spring_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_spring_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Long sleeves top","look_1_spring_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_spring_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Jeans","look_1_spring_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_spring_dress">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Dress","look_1_spring_dress");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_spring_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Accessories","look_1_spring_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }

        }

        if($look_count == 2){
            if($season_name == "Summer"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top (2 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Short sleeves top","look_2_summer_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Jeans","look_2_summer_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Skirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_skirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Skirt","look_2_summer_skirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories","look_2_summer_accessories");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves Top (1 prod)</h4>
                    </div>                    
                    <div  class="col-sm-12" id="look_2_fall_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Short sleeves top","look_2_fall_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (1 prod)</h4>
                    </div>                    
                    <div  class="col-sm-12" id="look_2_fall_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Long sleeves top","look_2_fall_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>                   
                    <div  class="col-sm-12" id="look_2_fall_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Jeans","look_2_fall_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Cardigan  (1 prod)</h4>
                    </div>                   
                    <div  class="col-sm-12" id="look_2_fall_cardigan">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Cardigan","look_2_fall_cardigan");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>                
                    <div  class="col-sm-12" id="look_2_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories","look_2_fall_accessories");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top  (1 prod)</h4>
                    </div>                   
                    <div  class="col-sm-12" id="look_2_winter_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Short sleeves top","look_2_winter_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top (1 prod)</h4>
                    </div>                  
                    <div  class="col-sm-12" id="look_2_winter_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Long sleeves top","look_2_winter_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>          
                    <div  class="col-sm-12" id="look_2_winter_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Jeans","look_2_winter_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Cardigan (1 prod)</h4>
                    </div>          
                    <div  class="col-sm-12" id="look_2_winter_cardigan">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Cardigan","look_2_winter_cardigan");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>     
                    <div  class="col-sm-12" id="look_2_winter_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Accessories","look_2_winter_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves  top  (2 prod)</h4>
                    </div>                  
                    <div  class="col-sm-12" id="look_2_spring_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Short sleeves top","look_2_spring_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>             
                    <div  class="col-sm-12" id="look_2_spring_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Jeans","look_2_spring_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Cardigan (1 prod)</h4>
                    </div>          
                    <div  class="col-sm-12" id="look_2_spring_cardigan">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Cardigan","look_2_spring_cardigan");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>     
                    <div  class="col-sm-12" id="look_2_spring_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Accessories","look_2_spring_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }

        }

        if($look_count == 3){
            if($season_name == "Summer"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Short sleeves top","look_3_summer_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>3/4 Sleeves top  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_3_4_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","3/4 Sleeves top","look_3_summer_3_4_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pant  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_pant">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Pant","look_3_summer_pant");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress   (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_dress">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Dress","look_3_summer_dress");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories","look_3_summer_accessories");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves Top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Short sleeves top","look_3_fall_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Long sleeves top","look_3_fall_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Jeans","look_3_fall_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Denim Jacket  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_denim_jacket">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Denim Jacket","look_3_fall_denim_jacket");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories","look_3_fall_accessories");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (2 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_winter_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Long sleeves top","look_3_winter_long_sleeves_top");
                        });                    
                    </script>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_winter_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Jeans","look_3_winter_jeans");
                        });                    
                    </script>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Denim Jacket (2 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_winter_denim_jacket">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Denim Jacket","look_3_winter_denim_jacket");
                        });                    
                    </script>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_winter_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Accessories","look_3_winter_accessories");
                        });                    
                    </script>                    
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_spring_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Long sleeves top","look_3_spring_long_sleeves_top");
                        });                    
                    </script>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_spring_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Short sleeves top","look_3_spring_short_sleeves_top");
                        });                    
                    </script>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_spring_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Jeans","look_3_spring_jeans");
                        });                    
                    </script>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Denim Jacket (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_spring_denim_jacket">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Denim Jacket","look_3_spring_denim_jacket");
                        });                    
                    </script>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_spring_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Accessories","look_3_spring_accessories");
                        });                    
                    </script>  
                </div>
                <?php
            }
        }

        if($look_count == 4){
            if($season_name == "Summer"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Sleeves top","look_4_summer_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Shorts (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_shorts">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Shorts","look_4_summer_shorts");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Short sleeves top","look_4_summer_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Jeans","look_4_summer_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jumpsuits (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_jumpsuits">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Jumpsuits","look_4_summer_jumpsuits");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves Top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Short sleeves top","look_4_fall_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Long sleeves top","look_4_fall_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pant (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_pant">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Pant","look_4_fall_pant");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jumpsuits (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_jumpsuits">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Jumpsuits","look_4_fall_jumpsuits");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories","look_4_fall_accessories");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_winter_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Short sleeves top","look_4_winter_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_winter_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Long sleeves top","look_4_winter_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pant (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_winter_pant">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Pant","look_4_winter_pant");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sweat shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_winter_sweat_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Sweat shirt","look_4_winter_sweat_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_winter_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Accessories","look_4_winter_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_spring_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Short sleeves top","look_4_spring_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top(1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_spring_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Long sleeves top","look_4_spring_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pant (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_spring_pant">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Pant","look_4_spring_pant");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sweat shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_spring_sweat_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Sweat shirt","look_4_spring_sweat_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_spring_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Accessories","look_4_spring_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
        }

        if($look_count == 5){
            if($season_name == "Summer"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_short_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Short sleeves top","look_5_summer_short_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>3/4 Sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_3_4_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","3/4 Sleeves top","look_5_summer_3_4_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Capri (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_capri">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Capri","look_5_summer_capri");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Romper (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_romper">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Romper","look_5_summer_romper");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories","look_5_summer_accessories");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (2 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Long sleeves top","look_5_fall_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Jeans","look_5_fall_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_dress">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Dress","look_5_fall_dress");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long cardigan (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_long_cardigan ">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Long cardigan ","look_5_fall_long_cardigan");
                        });                    
                    </script>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top (2 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_winter_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Long sleeves top","look_5_winter_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_winter_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Jeans","look_5_winter_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_winter_dress">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Dress","look_5_winter_dress");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long cardigan (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_winter_long_cardigan">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Winter","Long cardigan","look_5_winter_long_cardigan");
                        });                    
                    </script>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves  top  (2 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_spring_long_sleeves_top">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Long sleeves top","look_5_spring_long_sleeves_top");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_spring_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Jeans","look_5_spring_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_spring_dress">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Dress","look_5_spring_dress");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Light cardigan (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_spring_light_cardigan">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Spring","Light cardigan","look_5_spring_light_cardigan");
                        });                    
                    </script>
                </div>
                <?php
            }
        }
    }elseif($gender == 1){
        if($look_count == 1){
            if(in_array($season_name,["Summer","Spring"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","T-Shirt","look_1_summer_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short Sleeves Shirt (Hawaiian Shirt) (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_short_sleeves_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Short Sleeves Shirt","look_1_summer_short_sleeves_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Casual Polo Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_casual_polo_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Casual Polo Shirt","look_1_summer_casual_polo_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Shorts (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_shorts">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Shorts","look_1_summer_shorts");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories ","look_1_summer_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
            if(in_array($season_name,["Winter","Fall"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","T-Shirt","look_1_fall_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Hoodies T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_long_sleeves_hoodies_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Long Sleeves Hoodies T-Shirt","look_1_fall_long_sleeves_hoodies_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Casual Polo Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_casual_polo_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Casual Polo Shirt","look_1_fall_casual_polo_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Shorts (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_shorts">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Shorts","look_1_fall_shorts");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories ","look_1_fall_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
        }
        if($look_count == 2){
            if(in_array($season_name,["Summer","Spring"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","T-Shirt","look_2_summer_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves casual shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_short_sleeves_casual_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Short sleeves casual shirt","look_2_summer_short_sleeves_casual_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Casual henley shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_casual_henley_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Casual henley Shirt","look_2_summer_casual_henley_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Jeans","look_2_summer_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_summer_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories ","look_2_summer_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
            if(in_array($season_name,["Winter","Fall"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_fall_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","T-Shirt","look_2_fall_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves V Neck T-shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_fall_long_sleeves_v_neck_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Long Sleeves V Neck T-shirt","look_2_fall_long_sleeves_v_neck_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Denim Jacket/Hoodie (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_fall_denim_jacket_hoodie">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Denim Jacket/Hoodie","look_2_fall_denim_jacket_hoodie");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_fall_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Jeans","look_2_fall_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_2_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories ","look_2_fall_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
        }
        if($look_count == 3){
            if(in_array($season_name,["Summer","Spring"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","T-Shirt","look_3_summer_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Casual henley shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_casual_henley_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Casual henley Shirt","look_3_summer_casual_henley_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Printed polo T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_printed_polo_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Printed polo T-Shirt","look_3_summer_printed_polo_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Casual pant (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_casual_pant">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Casual pant","look_3_summer_casual_pant");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_summer_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories ","look_3_summer_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
            if(in_array($season_name,["Winter","Fall"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","T-Shirt","look_3_fall_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_short_sleeves_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Short sleeves shirt","look_3_fall_short_sleeves_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Light weighted ribbed sweater (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_light_weighted_ribbed_sweater">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Light weighted ribbed sweater","look_3_fall_light_weighted_ribbed_sweater");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Casual pant (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_casual_pant">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Casual pant","look_3_fall_casual_pant");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_3_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories ","look_3_fall_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
        }
        if($look_count == 4){
            if(in_array($season_name,["Summer","Spring"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Polo T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_polo_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Polo T-Shirt","look_4_summer_polo_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short Sleeves Dress Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_short_sleeves_dress_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Short Sleeves Dress Shirt","look_4_summer_short_sleeves_dress_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Dress Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_long_sleeves_dress_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Long Sleeves Dress Shirt","look_4_summer_long_sleeves_dress_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress Pant (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_dress_pant">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Dress pant","look_4_summer_dress_pant");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_summer_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories ","look_4_summer_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
            if(in_array($season_name,["Winter","Fall"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Polo T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_polo_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Polo T-Shirt","look_4_fall_polo_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Dress Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_long_sleeves_dress_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","long Sleeves Dress Shirt","look_4_fall_long_sleeves_dress_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Light Weight Cardigan/Sweater (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_light_weight_cardigan_sweater">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Light Weight Cardigan/Sweater","look_4_fall_light_weight_cardigan_sweater");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress Pant (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_dress_pant">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Dress pant","look_4_fall_dress_pant");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_4_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories ","look_4_fall_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
        }
        if($look_count == 5){
            if(in_array($season_name,["Summer","Spring"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Polo T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_polo_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Polo T-Shirt","look_5_summer_polo_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_dress_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Dress Shirt","look_5_summer_dress_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Casual henley shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_casual_henley_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Casual henley shirt","look_5_summer_casual_henley_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Jeans","look_5_summer_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_summer_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Accessories ","look_5_summer_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
            if(in_array($season_name,["Winter","Fall"])){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Polo T-Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_polo_t_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Polo T-Shirt","look_5_fall_polo_t_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress Shirt (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_dress_shirt">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Dress Shirt","look_5_fall_dress_shirt");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Light Weight Cardigan/Sweater (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_light_weight_cardigan_sweater">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Light Weight Cardigan/Sweater","look_5_fall_light_weight_cardigan_sweater");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_jeans">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Jeans","look_5_fall_jeans");
                        });                    
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories  (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_5_fall_accessories">

                    </div>
                    <script>
                        $(document).ready(function(){
                            getSeasonWiseProduct(<?=$payment_id;?>,"Fall","Accessories ","look_5_fall_accessories");
                        });                    
                    </script>
                </div>
                <?php
            }
        }
    }else{
        echo "-----";
    }
    ?>
</div>
<script>
    function getSeasonWiseProduct(payment_id,season,product_type,where_to_show){
        console.info(payment_id,season,product_type,where_to_show);                        
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getSeasonWiseProduct",
            data: {
                payment_id: payment_id,
                season : season,
                product_type : product_type,
                where_to_show : where_to_show
            },
            dataType: 'html',
            success: function(result) {
                $('#'+where_to_show).html(result);
            }
        });
    }                
</script>
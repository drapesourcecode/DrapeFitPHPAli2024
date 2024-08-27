<script src="<?=HTTP_ROOT;?>js/jquery.min.js"></script>
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
                        //alert('dfdf');                     
                        getSeasonWiseProduct(<?=$payment_id;?>,"Summer","Sleeveless top","look_1_summer_sleeveless_top");
                    });
                    
                </script>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_short_sleeveless_top">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Shorts (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_shorts">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>                    
                    <div  class="col-sm-12" id="look_1_summer_dress">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories/ Kimono (1 prod)</h4>
                    </div>
                    <div  class="col-sm-12" id="look_1_summer_accessories_kimono">

                    </div>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top(2 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Sweater Dress (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves  top  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
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
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Skirt (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves Top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Cardigan  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Cardigan (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Winter accessories (1 prod)</h4>
                    </div>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves  top  (2 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Cardigan (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
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
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>3/4  Sleeves tops  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pant  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress   (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves Top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Denim Jacket  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top (2 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Denim Jacket (2 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Winter accessories (1 prod)</h4>
                    </div>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves  top  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves  top  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Denim Jacket (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
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
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Shorts (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jumpsuits (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves Top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pant (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jumpsuits (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short Sleeves Top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pant (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>SweatShirt (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Short sleeves  top  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves  top  (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pant (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>SweatShirt (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
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
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>3/4 Sleeves top (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Capri (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Romper (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Accessories (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Fall"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves top (2 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long cardigan (1 prod)</h4>
                    </div>
                </div>        
                <?php
            }
            if($season_name == "Winter"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long Sleeves Top (2 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long cardigan (1 prod)</h4>
                    </div>
                </div>
                <?php
            }
            if($season_name == "Spring"){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Long sleeves  top  (2 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Jeans (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dress (1 prod)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Light cardigan (1 prod)</h4>
                    </div>
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
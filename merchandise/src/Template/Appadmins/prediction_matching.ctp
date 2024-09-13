<?php 
    echo $this->Html->script('jquery.min.js'); 
?>
<link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>bootstrap/css/bootstrap.min.css">
<!-- <script src="<?php echo HTTP_ROOT; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
<script src="<?php echo HTTP_ROOT; ?>bootstrap/js/bootstrap.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <?php if ($getData->kid_id != '') { ?>
            <h1> Matching Listing of <?php echo $this->Custom->kidName($getData->kid_id); ?></h1>
        <?php } else { ?>
            <h1> Matching Listing of <?php echo $userDetails->first_name; ?></h1>
        <?php } ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="<?= h(HTTP_ROOT) ?>appadmins/matching/<?php echo $id; ?>">   <i class="fa  fa-user-plus"></i> Matching Product </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-6"></div>
            <div  class="col-sm-6">
                <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                <div class="form-group">
                    <select name="search_for" required>
                        <option value="" selected disabled>Select field</option>
                        <option value="brand_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "brand_name")) ? "selected" : ""; ?> >Brand Name</option>
                        <option value="product_name1" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name1")) ? "selected" : ""; ?> >Product name1</option>
                        <!--<option value="product_name2" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name2")) ? "selected" : ""; ?> >Product name2</option>-->
                        <option value="style_number" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "style_number")) ? "selected" : ""; ?> >Style no.</option>
                        <option value="bar_code" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "bar_code")) ? "selected" : ""; ?> >Bar code</option>
                        <option value="color" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "color")) ? "selected" : ""; ?> >Color</option>
                        <!--<option value="price" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "price")) ? "selected" : ""; ?> >Price</option>-->
                    </select>
                    <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                    <input type="hidden"  name="exchange" value="<?= (!empty($_GET['exchange'])) ? $_GET['exchange'] : ""; ?>" >
                    <button type="submit" class="btn btn-sm btn-info">Search</button>
                    <a href="<?=HTTP_ROOT.'appadmins/matching/'.$id;?>" class="btn btn-sm btn-primary">See All</a>
                </div>
                <?= $this->Form->end(); ?>
            </div>
            <div class=" box">
                <div class="col-xs-12 box-body">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="padding: 10px 10px 10px 10px;float: left; width:100%;">Budget</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <?php if(!empty($Womenstyle)){ ?>
                                            <div class="post budget-women">                                    
                                                <div class="timeline-footer prefer">
                                                    <h4>TOPS</h4>
                                                    <ul>
                                                        <li class='<?php if (@$Womenstyle->tops == 1) { ?> active <?php } ?>'>Under $50</li>
                                                        <li class='<?php if (@$Womenstyle->tops == 2) { ?> active <?php } ?>'>$50 - $75</li>
                                                        <li class='<?php if (@$Womenstyle->tops == 3) { ?> active <?php } ?>'>$75 - $100</li>
                                                        <li class='<?php if (@$Womenstyle->tops == 4) { ?> active <?php } ?>'>$100 - $125</li>
                                                        <li class='<?php if (@$Womenstyle->tops == 5) { ?> active <?php } ?>'>$125+</li>
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
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($style_sphere_selectionsWemen)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" style="padding: 10px 10px 10px 10px;float: left; width:100%;">Color you prefer</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                            <div class="timeline-footer color">
                                                <ul>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('1', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Black</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('2', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Grey</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('3', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>White</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('4', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Cream</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('5', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Brown</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('6', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Purple</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('7', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Green</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('8', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Blue</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('9', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Orange</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('10', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Yellow</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('11', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Red</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                    <li class='<?php if ((strlen(@$style_sphere_selectionsWemen->color_prefer) > 2) && (in_array('12', json_decode(@$style_sphere_selectionsWemen->color_prefer, true)))) { ?> active <?php } ?>'>
                                                        <h4>Pink</h4>
                                                        <div class="wear-img">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" style="padding: 10px 10px 10px 10px;float: left; width:100%;">Patterns should we avoid</a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                    <div class="timeline-footer wear wear2">
                                            <ul>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('1', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                    <h4>Lace</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/lace.jpg" alt="">
                                                    </div>
                                                </li>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('2', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                    <h4>Animal Print</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/animal-print.jpg" alt="">
                                                    </div>
                                                </li>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('3', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                    <h4>Tribal</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/tribal.jpg" alt="">
                                                    </div>
                                                </li>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('4', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                    <h4>Polka Dot</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/polkadot.jpg" alt="">
                                                    </div>
                                                </li>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('5', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                    <h4>Stripes</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/stripes.jpg" alt="">
                                                    </div>
                                                </li>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->style_sphere_selections_v10) && in_array('6', explode(',', $style_sphere_selectionsWemen->style_sphere_selections_v10))) { ?> active <?php } ?>'>
                                                    <h4>Floral</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/floral.jpg" alt="">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" style="padding: 10px 10px 10px 10px;float: left; width:100%;">Top half</a>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                                        <div class="timeline-footer wear outfit-wear">
                                            <ul>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_half) && in_array('1', explode(',', $style_sphere_selectionsWemen->wo_top_half))) { ?> active <?php } ?>'>
                                                    <h4>Fitted</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/fitted.jpg" alt="">
                                                    </div>
                                                </li>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_half) && in_array('2', explode(',', $style_sphere_selectionsWemen->wo_top_half))) { ?> active <?php } ?>'>
                                                    <h4>Straight</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/straight2.jpg" alt="">
                                                    </div>
                                                </li>
                                                <li class='<?php if (isset($style_sphere_selectionsWemen->wo_top_half) && in_array('3', explode(',', $style_sphere_selectionsWemen->wo_top_half))) { ?> active <?php } ?>'>
                                                    <h4>Loose</h4>
                                                    <div class="wear-img">
                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/women-img/loose.jpg" alt="">
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse6" style="padding: 10px 10px 10px 10px;float: left; width:100%;">Which colors do you tend to mostly wear</a>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">
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
                        </div>
                    </div>
                    <?php } ?>
                </div> 
            </div> 
            
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">

                        <div class="single category">
                            <h3 class="side-title">Look 1 (<?=$final_season_name;?>)</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <div id="look_data_1">

                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        
                        
                        <div class="single category">
                            <h3 class="side-title">Look 2 (<?=$final_season_name;?>)</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <div id="look_data_2">

                                    </div>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="single category">
                            <h3 class="side-title">Look 3 (<?=$final_season_name;?>)</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <div id="look_data_3">

                                    </div>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="single category">
                            <h3 class="side-title">Look 4 (<?=$final_season_name;?>)</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <div id="look_data_4">

                                    </div>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="single category">
                            <h3 class="side-title">Look 5 (<?=$final_season_name;?>)</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <div id="look_data_5">

                                    </div>
                                </li>
                            </ul>
                        </div>

                        <script>
                            $(document).ready(function(){
                                var $digi_array = [1, 2, 3, 4, 5];
                                for (var $i = 1; $i <= $digi_array.length; $i++) {
                                    getLookData($i);
                                }
                            });

                            async function getLookData(look_count){
                                let season_nm = '<?=$final_season_name;?>';
                                let payment_id= <?=$id;?>;
                                await  $.ajax({
                                    type: "POST",
                                    url: "<?= HTTP_ROOT; ?>appadmins/getLookData",
                                    data: {
                                        payment_id: payment_id,
                                        season_nm : season_nm,
                                        look_count : look_count,
                                    },
                                    dataType: 'html',
                                    success: function(result) {
                                        $('#look_data_'+look_count).html(result);
                                    }
                                });
                            }

                        </script>

                        <table id="exampleXX" class="table table-bordered table-striped">
                            <!-- <thead>
                                <tr>
                                    <th>Matching percentage</th>
                                    <th>Brand Name</th>
                                    <th>Product Name 1</th>
                                    <th>Style no.</th>
                                    <th>Product Image</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead> -->
                            <tbody>
                                <?php /*
                                $color_arr = $this->Custom->inColor();

//                                foreach ($getProducts as $key => $prodDetls):
                                foreach ($all_products as $ap_key => $ap_li):
                                    $key=$ap_li->id;
                                    ?>
                                    <tr>
                                        <td> 
<!--                                            <span style="display:none;"><?php echo 1000-count($getProducts[$ap_li->id]); //count($getProducts[$ap_li->id]) * 10 ?></span>
                                            <a href='#' class="navbar-btn sidebar-toggle" data-html="true" data-toggle="tooltip" role="button" data-tooltip="tooltip"  data-placement="right" title="<?php
                                            foreach ($getProducts[$ap_li->id] as $pds_key => $pds_val) {
                                                if ($pds_key != 'product_id') {
                                                    echo "<h4>" . strtoupper($pds_key) . "</h4>";
                                                }
                                            }
                                            ?>"><?php echo (count($getProducts[$ap_li->id]) - 1) * 10 ?> % matches</a>-->

                                        </td>
                                        <td><?php echo $this->Custom->InBrandsName($key); ?></td>
                                        <td><?php echo $this->Custom->Inproductnameone($key)->product_name_one; ?></td>
                                        <td><?php echo empty($this->Custom->Inproductnameone($key)->style_number)?$this->Custom->Inproductnameone($key)->dtls:$this->Custom->Inproductnameone($key)->style_number; ?></td>
                                        <td><img src="<?php echo $this->Custom->imgpath($key) . 'files/product_img/' ?><?php echo $this->Custom->InproductImage($key); ?>" style="width: 80px;"/></td>
                                        <td><?php
                                            $pick_s = $this->Custom->Inproductnameone($key)->picked_size;
                                            if (!empty($pick_s)) {
                                                $li_size = explode('-', $pick_s);
                                                foreach ($li_size as $sz_l) {
                                                    $pdc_sz = $this->Custom->Inproductnameone($key)->$sz_l;
                                                    if (($pdc_sz == 0) || ($pdc_sz == 00)) {
                                                        echo $pdc_sz;
                                                    } else {
                                                        echo!empty($pdc_sz) ? $pdc_sz . '&nbsp;&nbsp;' : '';
                                                    }
                                                }
                                            }
                                            if (!empty($this->Custom->Inproductnameone($key)->primary_size) && ($this->Custom->Inproductnameone($key)->primary_size == 'free_size')) {
                                                echo "Free Size";
                                            }
                                            ?></td>
                                        <td><?php echo $color_arr[$this->Custom->Inproductnameone($key)->color]; ?></td>
                                        <td><?php echo $this->Custom->InproductsalePrice($key); ?></td>
                                        <td><?php
                                            $prod_idd = $this->Custom->Inproductnameone($key)->prod_id;
                                            echo $prd_ttQ = $this->Custom->productQuantity($prod_idd);
                                            ?></td>
                                        <td>
                                            


                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "View product details", 'data-toggle' => 'modal', 'data-target' => '#myModalproductgk-' . $key, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>                                            
                                            <?php 
                                           if(!empty($ap_li->pop)){
                                               echo "Already added in po";
                                           }else{
                                        //    if($prd_ttQ <= 1){ ?>
                                            <button type="button" id="btnshowPo<?=$prod_idd;?>" onclick="$('#showPo<?=$prod_idd;?>').toggle();$('#btnshowPo<?=$prod_idd;?>').toggle()" class="btn btn-sm btn-primary">Add to PO</button>
                                            <div id="showPo<?=$prod_idd;?>" style="display:none;">
                                                <?= $this->Form->create('',['type'=>'post', 'url'=>['action'=>'addPoRequest']]);?>
                                                <input type="number" step="1" name="qty" min="1" placeholder="Quantity" style="width:100px;" required>
                                                <input type="hidden"  name="product_id" value="<?=$prod_idd;?>">
                                                <input type="hidden"  name="brand_id" value="<?=$ap_li->brand_id;?>">
                                                <input type="hidden"  name="user_id" value="<?=$getData->user_id;?>">
                                                <input type="hidden"  name="kid_id" value="<?=$getData->kid_id;?>">
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                <?= $this->Form->end(); ?>
                                            </div>
                                           <?php } ?>
                                           <?php if (empty($ap_li->allocate_to_user_id)) { ?>
                                        <a href="<?= HTTP_ROOT . 'appadmins/allocate/' . $ap_li->id . '/' . $getData->user_id . '/' . $getData->kid_id; ?>">
                                            <button type="button" class="btn btn-sm btn-primary">Allocation</button>
                                        </a>
                                    <?php } else { ?>
                                        <!--<a href="<?= HTTP_ROOT . 'appadmins/release/' .  $ap_li->id . '/' . $getData->user_id . '/' . $getData->kid_id; ?>">-->
                                        <!--    <button type="button" class="btn btn-sm btn-primary">Release</button>-->
                                        <!--</a>-->
                                    <?php } ?>
                                        </td>
                                    </tr>
                                <div class="modal fade" id="myModalproductgk-<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<?php echo $key; ?>" aria-hidden="true">
                                    <div class="modal-dialog" style='width: 100%;'>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Product  Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Product Name 1: <?php echo $this->Custom->Inproductnameone($key)->product_name_one; ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            Product Name 2: <?php echo $this->Custom->Inproductnameone($key)->product_name_two; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            What is your height?  (feet) : <?php echo $this->Custom->tallFeet($key) . '. (Inch)' . $this->Custom->tallInch($key); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            Best Fit for Weight ? : <?php echo $this->Custom->bodyweight($key); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Purchase price  :  <?php echo $this->Custom->InproductPrice($key); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            Quantity : <?= $prd_ttQ; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Available status  : 
                                                            <?php
                                                            if ($this->Custom->Inproductnameone($key)->available_status == '1') {
                                                                echo 'Available';
                                                            }
                                                            if ($this->Custom->Inproductnameone($key)->available_status == '2') {
                                                                echo 'Not Available';
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            Profuct Image :
                                                            <img src="<?php echo $this->Custom->imgpath($key) . 'files/product_img/' ?><?php echo $this->Custom->InproductImage($key); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; */ ?>

                        </table>

                        <?php /*
                         echo $this->Paginator->counter('Page {{page}} of {{pages}}, Showing {{current}} records out of {{count}} total');
//                        echo $this->Paginator->counter(
//    'Page {{page}} of {{pages}}, showing {{current}} records out of
//     {{count}} total, starting on record {{start}}, ending on {{end}}'
//);
                        echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;display: inline-block;width: 100%;float: left;'>";
                        echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                        echo $this->Paginator->numbers(array('first' => 3, 'last' => 3, 'separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                        echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                        echo "</div></ul>"; */
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    #example1_paginate{
        display:none;
    }
    .ellipsis {
  float: left;
}
</style>

<?= $this->Form->create('',['type'=>'post', 'id'=>'po_variant_add', 'url'=>['action'=>'addVariantForPoRequest']]);?>
    <input type="hidden" name="look_type" >
    <input type="hidden"  name="user_size_col">                                    
    <input type="hidden"  name="user_size">                                    
    <input type="hidden"  name="pay_user_id">                                    
    <input type="hidden"  name="pay_kid_id">                                    
    <input type="hidden"  name="payment_id">                                    
    <button type="submit" style="display: none;"></button>
<?= $this->Form->end(); ?>
<script>
    function openCmt(product_id, payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandiseMatchingComment",
            data: {
                product_id: product_id,
                payment_id: payment_id,
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_product_id').val(product_id);
                $('#cmt_payment_id').val(payment_id);
                $('#comment_list').html(result);
            }
        });
        $('#comment_modal').modal('show');
    }

    function getAllCmt(product_id, payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandiseMatchingComment",
            data: {
                product_id: product_id,
                payment_id: payment_id,
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_product_id').val(product_id);
                $('#cmt_payment_id').val(payment_id);
                $('#comment_list').html(result);
            }
        });
    }

    function postCmt() {
        let cmt = $('#cmt_detail').val();
        let product_id = $('#cmt_product_id').val();
        let payment_id = $('#cmt_payment_id').val();
        
        let id = $('#id').val();
        let url = "<?= HTTP_ROOT; ?>appadmins/postMerchandiseMatchingComment";
        let data = {
            product_id: product_id,
            payment_id: payment_id,
            comment: cmt,
        };

        if (id) {

            url += "/" + id;
            data['comment_id'] = id;
        }

        if (cmt.length < 3) {
            $('#cmt_detail').focus();
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'JSON',
                success: function(result) {
                    $('#cmt_product_id').val('');
                    $('#cmt_payment_id').val('');
                    $('#cmt_detail').text('');
                    $('#cmt_detail').val('');
                    $('#cmt_detail').val('');
                    $('#id').val('');
                    getAllCmt(product_id, payment_id);

                }
            });
        }
    }
    
    function editComment(commentId) {
        console.log('commentId:',commentId);
        $.ajax({
            type: "POST",
            url: "<?=HTTP_ROOT;?>appadmins/editMerchandiseMatchingComment",
            data: {commentId: commentId},
            dataType:'JSON',
            success: function (result) {
                $('#id').val(commentId); 
                $('#cmt_product_id').val(result.product_id);
                $('#cmt_payment_id').val(result.payment_id);
                $('#cmt_detail').val(result.comment); 
                $('#comment_modal').modal('show'); 
            }
        });
    }

    function deleteComment(commentId) {
        if (confirm("Are you sure you want to delete this comment?")) {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>appadmins/deleteMerchandiseMatchingComment/" + commentId,
                dataType: 'JSON',
                success: function(result) {
                    if (result === 'success') {
                        getAllCmt($('#cmt_product_id').val(), $('#cmt_payment_id').val());
                    } else {
                        alert("Failed to delete comment.");
                    }
                }
            });
        }
    }

    function openSuggCmt(look_type, user_size_col, user_size, pay_user_id, pay_kid_id, payment_id){
        $('#comment_sugg_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandiseSuggComment",
            data: {
                look_type: look_type,
                user_size_col: user_size_col,
                user_size: user_size,
                pay_user_id: pay_user_id,
                pay_kid_id: pay_kid_id,
                payment_id: payment_id,
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_sugg_look_type').val(look_type);
                $('#cmt_sugg_user_size_col').val(user_size_col);
                $('#cmt_sugg_user_size').val(user_size);
                $('#cmt_sugg_user_id').val(pay_user_id);
                $('#cmt_sugg_kid_id').val(pay_kid_id);
                $('#cmt_sugg_payment_id').val(payment_id);
                $('#comment_sugg_list').html(result);
            }
        });
        $('#comment_sugg_modal').modal('show');
    }

    function getAllSuggCmt(look_type, user_size_col, user_size, pay_user_id, pay_kid_id, payment_id) {
        $('#comment_sugg_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandiseSuggComment",
            data: {
                look_type: look_type,
                user_size_col: user_size_col,
                user_size: user_size,
                pay_user_id: pay_user_id,
                pay_kid_id: pay_kid_id,
                payment_id: payment_id,
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_sugg_look_type').val(look_type);
                $('#cmt_sugg_user_size_col').val(user_size_col);
                $('#cmt_sugg_user_size').val(user_size);
                $('#cmt_sugg_user_id').val(pay_user_id);
                $('#cmt_sugg_kid_id').val(pay_kid_id);
                $('#cmt_sugg_payment_id').val(payment_id);
                $('#comment_sugg_list').html(result);
            }
        });
    }
    
    function postSuggCmt() {
        let cmt = $('#cmt_sugg_detail').val();
        let payment_id = $('#cmt_sugg_payment_id').val();
        let look_type = $('#cmt_sugg_look_type').val();
        let user_size_col = $('#cmt_sugg_user_size_col').val();
        let user_size = $('#cmt_sugg_user_size').val();
        let pay_user_id = $('#cmt_sugg_user_id').val();
        let pay_kid_id = $('#cmt_sugg_kid_id').val();
        let id = $('#sugg_id').val();
        let url = "<?= HTTP_ROOT; ?>appadmins/postMerchandiseSuggComment";
        let data = {
            look_type: look_type,
            user_size_col: user_size_col,
            user_size: user_size,
            pay_user_id: pay_user_id,
            pay_kid_id: pay_kid_id,
            payment_id: payment_id,
            comment: cmt,
        };

        if (id) {

            url += "/" + id;
            data['comment_id'] = id;
        }

        if (cmt.length < 3) {
            $('#cmt_sugg_detail').focus();
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'JSON',
                success: function(result) {
                    $('#cmt_sugg_payment_id').val('');
                    $('#cmt_sugg_payment_id').val('');
                    $('#cmt_sugg_detail').text('');
                    $('#cmt_sugg_detail').val('');
                    $('#cmt_sugg_detail').val('');
                    $('#id').val('');
                    getAllSuggCmt(look_type, user_size_col, user_size, pay_user_id, pay_kid_id, payment_id);

                }
            });
        }
    }

    function editSuggComment(commentId) {
        console.log('commentId:',commentId);
        $.ajax({
            type: "POST",
            url: "<?=HTTP_ROOT;?>appadmins/editMerchandiseSuggComment",
            data: {commentId: commentId},
            dataType:'JSON',
            success: function (result) {
                $('#sugg_id').val(commentId); 
                $('#cmt_sugg_look_type').val(result.look_type);
                $('#cmt_sugg_user_size_col').val(result.user_size_col);
                $('#cmt_sugg_user_size').val(result.user_size);
                $('#cmt_sugg_user_id').val(result.pay_user_id);
                $('#cmt_sugg_kid_id').val(result.pay_kid_id);
                $('#cmt_sugg_payment_id').val(result.payment_id);
                $('#cmt_sugg_detail').val(result.comment); 
                $('#comment_sugg_modal').modal('show'); 
            }
        });
    }

    function deleteSuggComment(commentId) {
        if (confirm("Are you sure you want to delete this comment?")) {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>appadmins/deleteMerchandiseSuggComment/" + commentId,
                dataType: 'JSON',
                success: function(result) {
                    if (result === 'success') {
                        getAllSuggCmt( $('#cmt_sugg_look_type').val(), $('#cmt_sugg_user_size_col').val(), $('#cmt_sugg_user_size').val(), $('#cmt_sugg_user_id').val(), $('#cmt_sugg_kid_id').val(), $('#cmt_sugg_payment_id').val() );
                    } else {
                        alert("Failed to delete comment.");
                    }
                }
            });
        }
    }

    function addVariantForPoRequest(look_type, user_size_col, user_size, pay_user_id, pay_kid_id, payment_id){
            $('#po_variant_add input[name=look_type]').val(look_type);
            $('#po_variant_add input[name=user_size_col]').val(user_size_col);
            $('#po_variant_add input[name=user_size]').val(user_size);
            $('#po_variant_add input[name=pay_user_id]').val(pay_user_id);
            $('#po_variant_add input[name=pay_kid_id]').val(pay_kid_id);
            $('#po_variant_add input[name=payment_id]').val(payment_id);
            $('#po_variant_add').submit();
    }
    
    $('.modal-footer .btn-default').click(function() {
        closeCmtModal();
    });
</script>


<div id="comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 100%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <div class="cmt-frm">
                    <input type="hidden" id="cmt_product_id" />
                    <input type="hidden" id="cmt_payment_id" />
                    <input type="hidden" id="id" value="" />
                    <textarea class="form-control" rows="2" id="cmt_detail"></textarea>
                    <button type="button" class="btn btn-success" onclick="postCmt()">Submit</button>
                </div>
                <div id="comment_list"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="comment_sugg_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 100%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <div class="cmt-frm">
                    <input type="hidden" id="cmt_sugg_look_type" />
                    <input type="hidden" id="cmt_sugg_user_size_col" />
                    <input type="hidden" id="cmt_sugg_user_size" />
                    <input type="hidden" id="cmt_sugg_user_id" />
                    <input type="hidden" id="cmt_sugg_kid_id" />
                    <input type="hidden" id="cmt_sugg_payment_id" />
                    <input type="hidden" id="sugg_id" value="" />
                    <textarea class="form-control" rows="2" id="cmt_sugg_detail"></textarea>
                    <button type="button" class="btn btn-success" onclick="postSuggCmt()">Submit</button>
                </div>
                <div id="comment_sugg_list"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


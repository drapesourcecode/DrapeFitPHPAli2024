<?php 
use Cake\Core\Configure;
echo $this->Html->script(array('ckeditor/ckeditor'));
?>
<div class="tab-content boy-kid-select" style="width: 100%;float: left;">
    <?= $this->Form->input('profile_type', ['value' => '4', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Category <sup style="color:red;">*</sup></label>
                                            <select name="product_type" class="form-control"  onchange="getSubCatg(this.value);" required  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?> >
                                                <option value="" selected disabled>Select Category</option>
                                                <?php foreach ($productType as $type) { ?>
                                                    <option  value="<?php echo $type->id; ?>" <?php echo (!empty($editproduct) && ($editproduct->product_type == $type->id)) ? "selected" : "";  echo (!empty($_GET['ctg']) && ($_GET['ctg'] ==$type->id))?'selected':''; ?> ><?php echo $type->product_type . '-' . $type->name; ?></option>
    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Sub-category <sup style="color:red;">*</sup></label>
                                            <select name="rack" class="form-control" required onchange="setSubCatg(this.value);"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?> >
                                                <?php /*if (empty($editproduct)) { ?> 
                                                    <option value="" selected disabled>Select Category first</option>
                                                <?php }*/ ?>
                                                    <option value='' selected disabled>--</option>
                                                <?php
                                                if (!empty($in_rack)) {
                                                    foreach ($in_rack as $rk) {
                                                        ?>
                                                        <option  value="<?php echo $rk->id; ?>"  <?php echo (!empty($editproduct) && ($editproduct->rack == $rk->id)) ? "selected" : ""; ?> ><?php echo $rk->rack_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if(!empty($_GET['sub_ctg']) || (!empty($editproduct) && !empty($editproduct->rack)) ){ ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Name 1 <sup style="color:red;">*</sup></label>
    <?= $this->Form->input('product_name_one', ['value' => @$editproduct->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1', 'required', 'maxlength' => "40"]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="display:none;">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Name 2</label>
    <?= $this->Form->input('product_name_two', ['value' => @$editproduct->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2', 'maxlength' => "40"]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Season <sup style="color:red;">*</sup></label>


                                            <ul id="seson" class="list-inline">

                                                <li><input id="selectAllseson" type="checkbox"><label for='selectAllseson'>Select All</label></li>
                                                <?php
                                                $all_seson = ['Spring', 'Summer', 'Fall', 'Winter'];
                                                foreach ($all_seson as $ky => $al_ses_li) {
                                                    ?>
                                                    <li><input id="all_seso<?= $ky; ?>" type="checkbox" name="season[]" value="<?= $al_ses_li; ?>"  <?php if (!empty($editproduct->season) && in_array($al_ses_li, json_decode($editproduct->season, true))) { ?> checked <?php } ?> /><label for="all_seso<?= $ky; ?>"><?= $al_ses_li; ?></label></li>
    <?php } ?>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                            <label for="exampleInputPassword1">Variants </label>
                                            <div id="variant_main_div">
                                               
                                            </div>
                                            <div style="margin-top: 10px;margin-button: 10px;">
                                               <button type="button" class="btn btn-info" onclick="addVariants()">Add Variant</button>
                                            </div>
                                            
                                            
                                            <script>
                                                function addVariants(){
                                                    let inx_numx = Math.floor(Math.random() * 899999 + 100000);
                                                    // let rowCount = $('#payment_table tr').length;
                                                    
                                                    let new_variant_html = `<div class="row" id="variant${inx_numx}">
                                                    <div class="col-md-12">
                                                        <label style="width: 100%;">Color <span style="float: right" onclick="variantDelete('variant${inx_numx}')">Delete</span></label>
                                                        <select name="color[]" id="color${inx_numx}" onchange="showSizeBox(${inx_numx});" class="form-control" required>
                                                            <option value="" selected disabled>----</option>
                                                            <?php foreach($all_colors as $clr){ ?>
                                                                <option value="<?=$clr->name;?>"><?=$clr->name;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div id="color_wise_size_variant_main_div${inx_numx}" style="display:none;">
                                                
                                                        </div>  
                                                        <button type="button" onclick="showSizeBox(${inx_numx})" class="add_more_btn${inx_numx}" style="display:none;">Add more size</button>
                                                       
                                                    </div>
                                                </div>`;
                                                    
                                                    $('#variant_main_div').append(new_variant_html);
                                                }
                                                function showSizeBox(id){
                                                    let value = $('#color'+id).val();
                                                    
                                                    $('#color_wise_size_variant_main_div'+id).show();
                                                    $('.add_more_btn'+id).hide();//Show add more size button
                                                    let inx_numx = Math.floor(Math.random() * 899999 + 100000);
                                                    let new_size_html =`<div class="row"  id="color_size_div${inx_numx}">
                                                            <div class="col-md-6">
                                                                <label style="width: 100%;">Size <span style="float: right" onclick="variantDelete('color_size_div${inx_numx}')">Delete</span></label>
                                                                <select name="size[${value}][]" id="var_sizes${inx_numx}" onchange="showDetailsBox(${inx_numx},${id});$('.add_more_btn${id}').show();" class="form-control" required>
                                                            <option value="" selected disabled>----</option>
                                                            <?php foreach($all_sizes as $sz){ ?>
                                                                <option value="<?=$sz->size;?>"><?=$sz->size;?></option>
                                                            <?php } ?>
                                                        </select>
                                                            </div>
                                                            <div class="col-md-6" id="showSizeDetails${inx_numx}" style="display:none;">
                                                                
                                                            </div>
                                                            
                                                            
                                                        </div>`;
                                                     $('#color_wise_size_variant_main_div'+id).append(new_size_html);
                                                    
                                                }
                                                function showDetailsBox(id,parent_id){
                                                    let value =  $('#var_sizes'+id).val();
                                                    let color_value =  $('#color'+parent_id).val();
                                                    let inx_numx = Math.floor(Math.random() * 899999 + 100000);
                                                    $('#showSizeDetails'+id).show();
                                                    let new_size_details_html =`<div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Height range <sup style="color:red;">*</sup></label>
                                                                            <div class="women-select-boxes">
                                                                                <div class="women-select1">
                                                                                    <select name="variant_data[${color_value}][${value}][tall_feet1]" id="tall_feet" class="form-control" required>
                                                                                        <option value="" disabled>--</option>
                                                                                        <option  value="1">1</option>
                                                                                        <option  value="2">2</option>
                                                                                        <option  value="3">3</option>
                                                                                        <option value="4">4</option>
                                                                                        <option value="5">5</option>
                                                                                        <option value="6">6</option>
                                                                                    </select>
                                                                                    <label>ft.</label>
                                                                                </div>
                                                                                <div class="women-select1">
                                                                                    <select name="variant_data[${color_value}][${value}][tall_inch1]" id="tall_inch" class="form-control">
                                                                                        <option  value="" disabled>--</option>
                                                                                        <option  value="0">0</option>
                                                                                        <option  value="1">1</option>
                                                                                        <option  value="2">2</option>
                                                                                        <option  value="3">3</option>
                                                                                        <option  value="4">4</option>
                                                                                        <option  value="5">5</option>
                                                                                        <option  value="6">6</option>
                                                                                        <option  value="7">7</option>
                                                                                        <option  value="8">8</option>
                                                                                        <option  value="9">9</option>
                                                                                        <option  value="10">10</option>
                                                                                        <option  value="11">11</option>
                                                                                    </select>

                               
                                                                                </div>
                                                                                <span>to</span>
                                                                                <div class="women-select1">

                                                                                    <select name="variant_data[${color_value}][${value}][tall_feet2]" id="tall_feet2" class="form-control" required>
                                                                                        <option  value="" disabled>--</option>
                                                                                        <option  value="1">1</option>
                                                                                        <option  value="2">2</option>
                                                                                        <option  value="3">3</option>
                                                                                        <option  value="4">4</option>
                                                                                        <option  value="5">5</option>
                                                                                        <option  value="6">6</option>
                                                                                    </select>
                                                                                    <label>ft.</label>
                                                                                </div>
                                                                                <div class="women-select1">
                                                                                    <select name="variant_data[${color_value}][${value}][tall_inch2]" id="tall_inch2" class="form-control">
                                                                                        <option  value="" disabled>--</option>
                                                                                        <option  value="0">0</option>
                                                                                        <option  value="1">1</option>
                                                                                        <option  value="2">2</option>
                                                                                        <option  value="3">3</option>
                                                                                        <option  value="4">4</option>
                                                                                        <option  value="5">5</option>
                                                                                        <option  value="6">6</option>
                                                                                        <option  value="7">7</option>
                                                                                        <option  value="8">8</option>
                                                                                        <option  value="9">9</option>
                                                                                        <option  value="10">10</option>
                                                                                        <option  value="11">11</option>
                                                                                    </select>

                               
                                                                                </div>
                                                                            </div>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Weight range <sup style="color:red;">*</sup></label>
                                                                            <div class="women-select-boxes">
                                                                                <div class="women-select2">
                                <input name='variant_data[${color_value}][${value}][best_fit_for_weight1]' value  = '' type = 'text' class = "form-control" placeholder ='Please enter your weight' required>                                                            
                                                                                </div>
                                                                                <span>to</span>
                                                                                <div class="women-select2">
                                <input name='variant_data[${color_value}][${value}][best_fit_for_weight2]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter your weight' required >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Age range <sup style="color:red;">*</sup></label>
                                                                            <div class="women-select-boxes">
                                                                                <div class="women-select2">
                               <input name='variant_data[${color_value}][${value}][age1]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter your age' required >                                                           
                                                                                </div>
                                                                                <span>to</span>
                                                                                <div class="women-select2">
                               <input name='variant_data[${color_value}][${value}][age2]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter your age' required > 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Purchase price ? <sup style="color:red;">*</sup></label>
                                   <input name='variant_data[${color_value}][${value}][purchase_price]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter purchase price' required > 
                            
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">sale_price ? <sup style="color:red;">*</sup></label>
                                       <input name='variant_data[${color_value}][${value}][sale_price]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter sale price' required > 
                              
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Clearance price</label>
                                           <input name='variant_data[${color_value}][${value}][clearance_price]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter sale price' > 
  
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quantity ? <sup style="color:red;">*</sup></label>
                                                <input name='variant_data[${color_value}][${value}][quantity]'  value = '' type = 'text' class = "form-control"  placeholder = 'Please enter quantity' required min = "0" steps='1'> 
       
                                            </div>
                                        </div>    
                                                                </div>`;
                                                    $('#showSizeDetails'+id).html(new_size_details_html);
                                                }
                                                function variantDelete(id){
                                                    $('#'+id).remove();
                                                }
                                            </script>
                                        </div> 

                                    
                                </div>
    
                                <?php if (in_array($product_ctg_nme, ["D11", "D12", "D10", "D1", "D2", "D3", "D7", "D8", "D9", "D4", "D5", "D6"])) { ?>
                                    <div class="col-sm-6"   >
                                        <label for="exampleInputPassword1">What size you prefer?</label>
                                        <select id="prd_sz_typ" class="form-control" required onchange="prdsztyp(this.value)"  <?= (!empty($editproduct)) ? 'style="pointer-events: none;" readonly' : ''; ?>>
                                            <option value="" selected disabled>----</option>
                                            
                                            <?php if (in_array($product_ctg_nme, ["D11", "D1", "D2", "D3", "D7", "D8", "D9"])) { ?>
                                            <option value="top_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'top_size')) ? 'selected' : ''; ?>> Top size </option>
                                            <?php } ?>
                                            <?php if (in_array($product_ctg_nme, ["D11", "D4", "D5", "D6"])) { ?>
                                            <option value="bottom_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'bottom_size')) ? 'selected' : ''; ?> > Bottom size </option>
                                            <?php } ?>
                                            <?php if(in_array($product_ctg_nme,["D12","D10"])){ ?>
                                            <option value="free_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'selected' : ''; ?> > Free size </option>
                                            <?php } ?>
                                            <?php if(!in_array($product_ctg_nme,["D11"])){ ?>
                                            <option value="shoe_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'shoe_size')) ? 'selected' : ''; ?> > Shoe size </option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="col-sm-6"   id="prd_sz_typ_div"  <?= (!empty($editproduct)) ? 'style="pointer-events: none;"' : ''; ?>>

                                    </div>
                                    <?php if (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) { ?>
                                        <script>
                                            $(document).ready(function(){
                                                prdsztyp('<?= $editproduct->primary_size; ?>');
                                            })
                                        </script>
                                    <?php } ?>
                                    <?php if (!empty($editproduct) && ($editproduct->primary_size == 'top_size')) { ?>
                                        <script>
                                            $(document).ready(function(){
                                                prdsztyp('<?= $editproduct->primary_size; ?>');
                                            })
                                        </script>
                                    <?php } ?>
                                    <?php if (!empty($editproduct) && ($editproduct->primary_size == 'bottom_size')) { ?>
                                        <script>
                                            $(document).ready(function(){
                                                prdsztyp('<?= $editproduct->primary_size; ?>');
                                            })
                                        </script>
                                    <?php } ?>
                                    <?php if (!empty($editproduct) && ($editproduct->primary_size == 'shoe_size')) { ?>
                                        <script>
                                            $(document).ready(function(){
                                                prdsztyp('<?= $editproduct->primary_size; ?>');
                                            })
                                        </script>
                                    <?php } ?>

                                    <script> 
                                        function prdsztyp(data){
                                            let selectSizeAcc = ``;
                                            if(data == 'shoe_size' ){
                                                selectSizeAcc = `<div class="form-group">                                
                                <div class="col-md-12">
                                    <label><input type="radio" name="primary_size" value="shoe_size" checked required> SHOE SIZE  </label>
                                    
                                </div>
                            </div>`;
                                            }                                                                        
                                            if(data == 'free_size' ){
                                                selectSizeAcc = `<div class="form-group">
                                <div class="col-md-12">
                                    <label><input type="radio" name="primary_size" value="free_size" checked required> FREE SIZE </label>
                                </div>
                            </div>`;
                                            }                                                                        
                                            if(data == 'top_size' ){
                                                selectSizeAcc = `<div class="form-group">
                                <div class="col-md-12">
                                    <label><input type="radio" name="primary_size" value="top_size" checked required> TOPS SIZE? </label>
                                </div>
                            </div>`;
                                            }                                                                        
                                            if(data == 'bottom_size' ){
                                                selectSizeAcc = `<div class="form-group">
                                <div class="col-md-12">
                                    <label><input type="radio" name="primary_size" value="bottom_size" checked required> BOTTOMS SIZE</label>
                                </div>

                            </div>   `;
                                            }                                                                        
                                            $('#prd_sz_typ_div').html(selectSizeAcc);
                                        }
                                    </script>
                                <?php } ?>
    
                               
                                <div class="row">
                               
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Body shape?</label>
                                            <select name="kid_body_shape" id="kid_body_shape">
                                                <option <?php if (@$editproduct->kid_body_shape == 'NULL') { ?> selected=""<?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if (@$editproduct->kid_body_shape == 'Husky') { ?> selected=""<?php } ?> value="Husky">Husky</option>
                                                <option <?php if (@$editproduct->kid_body_shape == 'Average') { ?> selected=""<?php } ?> value="Average">Average</option>
                                                <option <?php if (@$editproduct->kid_body_shape == 'Slim') { ?> selected=""<?php } ?> value="Slim">Slim</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type of print ?</label>
                                            <select name="wo_patterns" id="wo_patterns">
                                                <option <?php if (@$editproduct->wo_patterns == 'NULL') { ?> selected=""<?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if (@$editproduct->wo_patterns == 'stripes') { ?> selected=""<?php } ?> value="stripes">Stripes</option>
                                                <option <?php if (@$editproduct->wo_patterns == 'floral') { ?> selected=""<?php } ?> value="floral">Floral</option>
                                                <option <?php if (@$editproduct->wo_patterns == 'animal_print') { ?> selected=""<?php } ?> value="animal_print">Animal Print</option>
                                                <option <?php if (@$editproduct->wo_patterns == 'polkadots') { ?> selected=""<?php } ?> value="polkadots">Polka dots</option>
                                                <option <?php if (@$editproduct->wo_patterns == 'plaid') { ?> selected=""<?php } ?> value="plaid">Plaid</option>
                                                <option <?php if (@$editproduct->wo_patterns == 'camo') { ?> selected=""<?php } ?> value="camo">Camo</option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Brand Name <sup style="color:red;">*</sup></label>
                                            <select name="brand_id" id="brand_id" class="form-control" required>
                                                <option value="" selected disabled>--</option>
                                                <?php
                                                foreach ($brandsListings as $brandnm) {
                                                    if (empty(@$editproduct) && ($brandnm->is_active != 0)) {
                                                        ?>

                                                        <option <?php if ($brandnm->id == @$editproduct->brand_id) { ?> selected=""<?php } ?> value="<?php echo $brandnm->id; ?>"><?php echo $brandnm->brand_name; ?></option>
                                                        <?php
                                                    }
                                                    if (!empty(@$editproduct)) {
                                                        ?>

                                                        <option <?php if ($brandnm->id == @$editproduct->brand_id) { ?> selected=""<?php } ?> value="<?php echo $brandnm->id; ?>"><?php echo $brandnm->brand_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
    <?php if (empty($editproduct)) { ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status</label>
                                                <select name="available_status" class="form-control">
                                                    <option <?php if (@$editproduct->available_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->available_status == '1') { ?> selected="" <?php } ?> value="1">Available</option>                                
                                                    <option <?php if (@$editproduct->available_status == '2') { ?> selected="" <?php } ?> value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>
    <?php } ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Display status</label>
                                            <select name="display_status" class="form-control">
                                                <option <?php if (@$editproduct->display_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                <option <?php if (@$editproduct->display_status == '1') { ?> selected="" <?php } ?> value="1">Display</option>                                
                                                <option <?php if (@$editproduct->display_status == '2') { ?> selected="" <?php } ?> value="2">Non Display</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product status</label>
                                                <select name="product_status" class="form-control">
                                                    <option <?php if (@$editproduct->product_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->product_status == 'S') { ?> selected="" <?php } ?> value="S"><?=Configure::read('S');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'O') { ?> selected="" <?php } ?> value="O"><?=Configure::read('O');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'C') { ?> selected="" <?php } ?> value="C"><?=Configure::read('C');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'R') { ?> selected="" <?php } ?> value="R"><?=Configure::read('R');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'F') { ?> selected="" <?php } ?> value="F"><?=Configure::read('F');?></option>                                
                                                   
                                                </select>
                                            </div>
                                        </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Note</label>
    <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Image <sup style="color:red;">*</sup>  <span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

    <?php if (@$editproduct->product_image) { ?>
                                                <div class="form-group">
                                                    <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                    <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/GirlKids/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                </div>                                    
                                                <?php } else { ?>
                                                <div class="form-group">
        <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required']); ?>                                        


                                                    <div class="help-block with-errors"></div>
                                                </div>
    <?php } ?> 
                                            <div id="imagePreview"></div>                            
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        
                                      
                                        
                                    </div>
                                    
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Material details</label>
    <?= $this->Form->input('material_details', ['value' => @$editproduct->material_details, 'type' => 'textarea', 'class' => "form-control ckeditor", 'label' => false, 'placeholder' => 'Please material details']); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product details</label>
    <?= $this->Form->input('product_details', ['value' => @$editproduct->product_details, 'type' => 'textarea', 'class' => "form-control ckeditor", 'label' => false, 'placeholder' => 'Please  product details']); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($editproduct->is_deleted == 1) {
                                    echo "<h1 style='color:red;'>Deleted</h1>";
                                } else {
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-10">
        <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                        </div>
                                    </div>
                            <?php } ?>
                            </div>
<?php } ?>
  <script>
        $(document).ready(function () {
       
        $('#profile_data').validate({
                errorElement: "span",
               
            rules:{
                'season[]': {required:true},
                'take_note_of[]': {required:true},
                'skin_tone[]': {required:true},
                'better_body_shape[]': {required:true},             
                'available_status': {required:true},  
                'kid_body_shape': {required:true},  
                
            },
             messages: {
                'season[]': {
                    required: "Please select the season",

                },
            }
        });
     

    });
    </script>
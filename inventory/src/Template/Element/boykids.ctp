<div class="tab-content boy-kid-select" style="width: 100%;float: left;">
    <?= $this->Form->input('profile_type', ['value' => '3', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Height range <sup style="color:red;">*</sup></label>
                                            <div class="women-select-boxes">
                                                <div class="women-select1">
                                                    <select name="tall_feet" id="tall_feet" required class="form-control">
                                                        <option <?php if (@$editproduct->tall_feet == '') { ?> selected=""<?php } ?> value="" disabled>--</option>
                                                        <option <?php if (@$editproduct->tall_feet == '1') { ?> selected=""<?php } ?>value="1">1</option>
                                                        <option <?php if (@$editproduct->tall_feet == '2') { ?> selected=""<?php } ?> value="2">2</option>
                                                        <option <?php if (@$editproduct->tall_feet == '3') { ?> selected=""<?php } ?> value="3">3</option>
                                                        <option <?php if (@$editproduct->tall_feet == '4') { ?> selected=""<?php } ?> value="4">4</option>
                                                        <option <?php if (@$editproduct->tall_feet == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                        <option <?php if (@$editproduct->tall_feet == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                    </select>
                                                    <label>ft.</label>
                                                </div>
                                                <div class="women-select1">
                                                    <select name="tall_inch" id="tall_inch" class="form-control">
                                                        <option <?php if (@$editproduct->tall_inch == '') { ?> selected=""<?php } ?> value="" disabled>--</option>
                                                        <option <?php if (@$editproduct->tall_inch == '0') { ?> selected=""<?php } ?> value="0">0</option>
                                                        <option <?php if (@$editproduct->tall_inch == '1') { ?> selected=""<?php } ?> value="1">1</option>
                                                        <option <?php if (@$editproduct->tall_inch == '2') { ?> selected=""<?php } ?>value="2">2</option>
                                                        <option <?php if (@$editproduct->tall_inch == '3') { ?> selected=""<?php } ?>value="3">3</option>
                                                        <option <?php if (@$editproduct->tall_inch == '4') { ?> selected=""<?php } ?> value="4">4</option>
                                                        <option <?php if (@$editproduct->tall_inch == '5') { ?> selected=""<?php } ?>value="5">5</option>
                                                        <option <?php if (@$editproduct->tall_inch == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        <option <?php if (@$editproduct->tall_inch == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                        <option <?php if (@$editproduct->tall_inch == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                        <option <?php if (@$editproduct->tall_inch == '9') { ?> selected=""<?php } ?> value="9">9</option>
                                                        <option <?php if (@$editproduct->tall_inch == '10') { ?> selected=""<?php } ?> value="10">10</option>
                                                        <option <?php if (@$editproduct->tall_inch == '11') { ?> selected=""<?php } ?> value="11">11</option>
                                                    </select>

    <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                </div>
                                                <span>to</span>
                                                <div class="women-select1">

                                                    <select name="tall_feet2" id="tall_feet2" required class="form-control">
                                                        <option <?php if (@$editproduct->tall_feet2 == '') { ?> selected=""<?php } ?> value="" disabled>--</option>
                                                        <option <?php if (@$editproduct->tall_feet2 == '1') { ?> selected=""<?php } ?>value="1">1</option>
                                                        <option <?php if (@$editproduct->tall_feet2 == '2') { ?> selected=""<?php } ?> value="2">2</option>
                                                        <option <?php if (@$editproduct->tall_feet2 == '3') { ?> selected=""<?php } ?> value="3">3</option>
                                                        <option <?php if (@$editproduct->tall_feet2 == '4') { ?> selected=""<?php } ?> value="4">4</option>
                                                        <option <?php if (@$editproduct->tall_feet2 == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                        <option <?php if (@$editproduct->tall_feet2 == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                    </select>
                                                    <label>ft.</label>
                                                </div>
                                                <div class="women-select1">
                                                    <select name="tall_inch2" id="tall_inch2" class="form-control">
                                                        <option <?php if (@$editproduct->tall_inch2 == '') { ?> selected=""<?php } ?> value="" disabled>--</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '0') { ?> selected=""<?php } ?> value="0">0</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '1') { ?> selected=""<?php } ?> value="1">1</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '2') { ?> selected=""<?php } ?>value="2">2</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '3') { ?> selected=""<?php } ?>value="3">3</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '4') { ?> selected=""<?php } ?> value="4">4</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '5') { ?> selected=""<?php } ?>value="5">5</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '9') { ?> selected=""<?php } ?> value="9">9</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '10') { ?> selected=""<?php } ?> value="10">10</option>
                                                        <option <?php if (@$editproduct->tall_inch2 == '11') { ?> selected=""<?php } ?> value="11">11</option>
                                                    </select>

    <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                </div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Weight range <sup style="color:red;">*</sup></label>
                                            <div class="women-select-boxes">
                                                <div class="women-select2">
    <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight', 'required']); ?>                                                            
                                                </div>
                                                <span>to</span>
                                                <div class="women-select2">
    <?= $this->Form->input('best_fit_for_weight2', ['value' => @$editproduct->best_fit_for_weight2, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight', 'required']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Age range <sup style="color:red;">*</sup></label>
                                            <div class="women-select-boxes">
                                                <div class="women-select2">
    <?= $this->Form->input('age1', ['value' => @$editproduct->age1, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter age', 'required']); ?>                                                            
                                                </div>
                                                <span>to</span>
                                                <div class="women-select2">
    <?= $this->Form->input('age2', ['value' => @$editproduct->age2, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter age', 'required']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Color ? <sup style="color:red;">*</sup></label>
                                            <select name="color" class="form-control" required>

                                                <option <?php if (empty($editproduct->color)) { ?> selected="" <?php } ?> value="" disabled>--</option>
                                                <?php foreach ($color_arr as $indx => $clr) { ?>
                                                    <option <?php if (@$editproduct->color == $indx) { ?> selected="" <?php } ?> value="<?= $indx; ?>"><?= $clr; ?></option>
    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if(in_array($product_ctg_nme,["C12", "C11"])){ ?>
                                    <div class="col-md-6" >
                                        <div class="form-group" style="margin-top: 35px;">

                                            <label for="free_size_wo">
                                                <input type="radio" name="primary_size" value="free_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'checked' : 'checked'; ?> id="free_size_wo"/>
                                                Free Size  <sup style="color:red;">*</sup>
                                            </label>

                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
    
    
    
                                <?php if (in_array($product_ctg_nme, ["C7","C9"])) { ?>
                                                <div class="col-sm-6"   >
                                                    <label for="exampleInputPassword1">What size you prefer?</label>
                                                    <select id="prd_sz_typ" class="form-control" required onchange="prdsztyp(this.value)"  <?= (!empty($editproduct)) ? 'style="pointer-events: none;" readonly' : ''; ?>>
                                                        <option value="" selected disabled>----</option>
                                                       
                                                        <option value="top_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'top_size')) ? 'selected' : ''; ?>> Top size </option>
                                                        <option value="bottom_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'bottom_size')) ? 'selected' : ''; ?> > Bottom size </option>

                                                    </select>
                                                </div>
                                                <div class="col-sm-6"   id="prd_sz_typ_div"  <?= (!empty($editproduct)) ? 'style="pointer-events: none;"' : ''; ?>>

                                                </div>
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
                                              
                                                <script> 
                                                    function prdsztyp(data){
                                                        let selectSizeAcc = ``;
                                                        if(data == 'top_size' ){
                                                            selectSizeAcc = `<div class="form-group">

                                            <label for="exampleInputPassword1">TOPS SIZE?  <sup style="color:red;">*</sup></label>
                                            <div class="col-md-1">
                                                <input type="radio" name="primary_size" value="top_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'top_size')) ? 'checked' : 'checked'; ?> required>
                                            </div>
                                            <div class="col-md-11">
                                                <select name="top_size" id="top_size" required>
                                                    <option <?php if (@$editproduct->top_size == '') { ?> selected=""<?php } ?> value="">--</option>
                                                    <optgroup label="Toddler Sizing">
                                                        <option <?php if (@$editproduct->top_size == '2T') { ?> selected=""<?php } ?>  valu="2T">2T</option>
                                                        <option <?php if (@$editproduct->top_size == '3T') { ?> selected=""<?php } ?> value="3T">3T</option>
                                                        <option <?php if (@$editproduct->top_size == '4T') { ?> selected=""<?php } ?> value="4T">4T</option>
                                                    </optgroup>
                                                    <optgroup label="Kid Sizing">
                                                        <option <?php if (@$editproduct->top_size == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                        <option <?php if (@$editproduct->top_size == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        <option <?php if (@$editproduct->top_size == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                        <option <?php if (@$editproduct->top_size == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                        <option <?php if (@$editproduct->top_size == '10') { ?> selected=""<?php } ?>value="10">10</option>
                                                        <option <?php if (@$editproduct->top_size == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                        <option <?php if (@$editproduct->top_size == '14') { ?> selected=""<?php } ?> value="14">14</option>
                                                        <option <?php if (@$editproduct->top_size == '16') { ?> selected=""<?php } ?> value="16">16</option>
                                                        <option <?php if (@$editproduct->top_size == '18') { ?> selected=""<?php } ?> value="18">18</option>
                                                    </optgroup>
                                                </select>


                                            </div>
                                        </div>`;
                                                        }                                                                        
                                                        if(data == 'bottom_size' ){
                                                            selectSizeAcc = `<div class="form-group">
                                            <label for="exampleInputPassword1">BOTTOMS SIZE  <sup style="color:red;">*</sup></label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="bottom_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'bottom_size')) ? 'checked' : 'checked'; ?> required>
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="bottom_size" id="bottom_size" required>
                                                        <option <?php if (@$editproduct->bottom_size == '') { ?> selected=""<?php } ?> value="">--</option>
                                                        <optgroup label="Toddler Sizing">
                                                            <option <?php if (@$editproduct->bottom_size == '2T') { ?> selected=""<?php } ?> value="2T">2T</option>
                                                            <option <?php if (@$editproduct->bottom_size == '3T') { ?> selected=""<?php } ?>  value="3T">3T</option>
                                                            <option <?php if (@$editproduct->bottom_size == '4T') { ?> selected=""<?php } ?>  value="4T">4T</option>
                                                        </optgroup>
                                                        <optgroup label="Kid Sizing">
                                                            <option <?php if (@$editproduct->bottom_size == '5') { ?> selected=""<?php } ?>  value="5">5</option>
                                                            <option <?php if (@$editproduct->bottom_size == '6') { ?> selected=""<?php } ?>  value="6">6</option>
                                                            <option <?php if (@$editproduct->bottom_size == '7') { ?> selected=""<?php } ?>  value="7">7</option>
                                                            <option <?php if (@$editproduct->bottom_size == '8') { ?> selected=""<?php } ?>  value="8">8</option>
                                                            <option <?php if (@$editproduct->bottom_size == '10') { ?> selected=""<?php } ?>  value="10">10</option>
                                                            <option <?php if (@$editproduct->bottom_size == '12') { ?> selected=""<?php } ?>  value="12">12</option>
                                                            <option <?php if (@$editproduct->bottom_size == '14') { ?> selected=""<?php } ?>  value="14">14</option>
                                                            <option <?php if (@$editproduct->bottom_size == '16') { ?> selected=""<?php } ?>  value="16">16</option>
                                                            <option <?php if (@$editproduct->bottom_size == '18') { ?> selected=""<?php } ?>  value="18">18</option>
                                                        </optgroup>
                                                    </select>
                                                </div>                            
                                            </div>                            
                                        </div>`;
                                                        }                                                                        
                                                        $('#prd_sz_typ_div').html(selectSizeAcc);
                                                    }
                                                </script>
                                            <?php } ?>
    
    
                                <div class="row">
                                    <?php if(in_array($product_ctg_nme,["C1", "C2", "C4", "C6", "C8","C10"])){ ?>
                                    <div class="col-md-6"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?>>

                                        <div class="form-group">

                                            <label for="exampleInputPassword1">TOPS SIZE?  <sup style="color:red;">*</sup></label>
                                            <div class="col-md-1">
                                                <input type="radio" name="primary_size" value="top_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'top_size')) ? 'checked' : ''; ?> required>
                                            </div>
                                            <div class="col-md-11">
                                                <select name="top_size" id="top_size" required>
                                                    <option <?php if (@$editproduct->top_size == '') { ?> selected=""<?php } ?> value="">--</option>
                                                    <optgroup label="Toddler Sizing">
                                                        <option <?php if (@$editproduct->top_size == '2T') { ?> selected=""<?php } ?>  valu="2T">2T</option>
                                                        <option <?php if (@$editproduct->top_size == '3T') { ?> selected=""<?php } ?> value="3T">3T</option>
                                                        <option <?php if (@$editproduct->top_size == '4T') { ?> selected=""<?php } ?> value="4T">4T</option>
                                                    </optgroup>
                                                    <optgroup label="Kid Sizing">
                                                        <option <?php if (@$editproduct->top_size == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                        <option <?php if (@$editproduct->top_size == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        <option <?php if (@$editproduct->top_size == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                        <option <?php if (@$editproduct->top_size == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                        <option <?php if (@$editproduct->top_size == '10') { ?> selected=""<?php } ?>value="10">10</option>
                                                        <option <?php if (@$editproduct->top_size == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                        <option <?php if (@$editproduct->top_size == '14') { ?> selected=""<?php } ?> value="14">14</option>
                                                        <option <?php if (@$editproduct->top_size == '16') { ?> selected=""<?php } ?> value="16">16</option>
                                                        <option <?php if (@$editproduct->top_size == '18') { ?> selected=""<?php } ?> value="18">18</option>
                                                    </optgroup>
                                                </select>


                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <?php if(in_array($product_ctg_nme,["C3", "C5"])){ ?>
                                    <div class="col-md-6"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?>>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">BOTTOMS SIZE  <sup style="color:red;">*</sup></label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="bottom_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'bottom_size')) ? 'checked' : ''; ?> required>
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="bottom_size" id="bottom_size" required>
                                                        <option <?php if (@$editproduct->bottom_size == '') { ?> selected=""<?php } ?> value="">--</option>
                                                        <optgroup label="Toddler Sizing">
                                                            <option <?php if (@$editproduct->bottom_size == '2T') { ?> selected=""<?php } ?> value="2T">2T</option>
                                                            <option <?php if (@$editproduct->bottom_size == '3T') { ?> selected=""<?php } ?>  value="3T">3T</option>
                                                            <option <?php if (@$editproduct->bottom_size == '4T') { ?> selected=""<?php } ?>  value="4T">4T</option>
                                                        </optgroup>
                                                        <optgroup label="Kid Sizing">
                                                            <option <?php if (@$editproduct->bottom_size == '5') { ?> selected=""<?php } ?>  value="5">5</option>
                                                            <option <?php if (@$editproduct->bottom_size == '6') { ?> selected=""<?php } ?>  value="6">6</option>
                                                            <option <?php if (@$editproduct->bottom_size == '7') { ?> selected=""<?php } ?>  value="7">7</option>
                                                            <option <?php if (@$editproduct->bottom_size == '8') { ?> selected=""<?php } ?>  value="8">8</option>
                                                            <option <?php if (@$editproduct->bottom_size == '10') { ?> selected=""<?php } ?>  value="10">10</option>
                                                            <option <?php if (@$editproduct->bottom_size == '12') { ?> selected=""<?php } ?>  value="12">12</option>
                                                            <option <?php if (@$editproduct->bottom_size == '14') { ?> selected=""<?php } ?>  value="14">14</option>
                                                            <option <?php if (@$editproduct->bottom_size == '16') { ?> selected=""<?php } ?>  value="16">16</option>
                                                            <option <?php if (@$editproduct->bottom_size == '18') { ?> selected=""<?php } ?>  value="18">18</option>
                                                        </optgroup>
                                                    </select>
                                                </div>                            
                                            </div>                            
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="row">
                                     <?php if (!in_array($product_ctg_nme, ["C7","C9"])) { ?>
                                    <div class="col-md-6"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?>>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">SHOE SIZE?</label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="shoe_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'shoe_size')) ? 'checked' : ''; ?> >
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="shoe_size" id="shoe_size">
                                                        <option <?php if (@$editproduct->shoe_size == '') { ?> selected=""<?php } ?> value="">--</option>
                                                        <optgroup label="Toddler Sizing">
                                                            <option <?php if (@$editproduct->shoe_size == '2 Child') { ?> selected=""<?php } ?> value="2 Child">2 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '3 Child') { ?> selected=""<?php } ?> value="3 Child">3 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '4 Child') { ?> selected=""<?php } ?> value="4 Child">4 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '5 Child') { ?> selected=""<?php } ?> value="5 Child">5 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '6 Child') { ?> selected=""<?php } ?> value="6 Child">6 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '7 Child') { ?> selected=""<?php } ?> value="7 Child">7 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '8 Child') { ?> selected=""<?php } ?> value="8 Child">8 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '9 Child') { ?> selected=""<?php } ?> value="9 Child">9 Child</option>
                                                        </optgroup>
                                                        <optgroup label="Kid Sizing">
                                                            <option <?php if (@$editproduct->shoe_size == '10 Child') { ?> selected=""<?php } ?> value="10 Child">10 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '11 Child') { ?> selected=""<?php } ?> value="11 Child">11 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '12 Child') { ?> selected=""<?php } ?> value="12 Child">12 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '13 Child') { ?> selected=""<?php } ?> value="13 Child">13 Child</option>
                                                            <option <?php if (@$editproduct->shoe_size == '1 Youth') { ?> selected=""<?php } ?> value="1 Youth">1 Youth</option>
                                                            <option <?php if (@$editproduct->shoe_size == '2 Youth') { ?> selected=""<?php } ?> value="2 Youth">2 Youth</option>
                                                            <option <?php if (@$editproduct->shoe_size == '3 Youth') { ?> selected=""<?php } ?> value="3 Youth">3 Youth</option>
                                                            <option <?php if (@$editproduct->shoe_size == '4 Youth') { ?> selected=""<?php } ?> value="4 Youth">4 Youth</option>
                                                            <option <?php if (@$editproduct->shoe_size == '5 Youth') { ?> selected=""<?php } ?> value="5 Youth">5 Youth</option>
                                                            <option <?php if (@$editproduct->shoe_size == '6 Youth') { ?> selected=""<?php } ?>value="6 Youth">6 Youth</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
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
                                                <option <?php if (@$editproduct->wo_patterns == 'gingham') { ?> selected=""<?php } ?> value="gingham">Gingham</option>
                                                <option <?php if (@$editproduct->wo_patterns == 'novelty') { ?> selected=""<?php } ?> value="novelty">Novelty</option>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Purchase price ? <sup style="color:red;">*</sup></label>
    <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price', 'required']); ?>                            
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">sale_price ? <sup style="color:red;">*</sup></label>
    <?= $this->Form->input('sale_price', ['value' => @$editproduct->sale_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price', 'required']); ?>                            
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Clearance price</label>
    <?= $this->Form->input('clearance_price', ['value' => @$editproduct->clearance_price, 'type' => 'text', 'class' => "form-control", 'label' => false]); ?> 
                                        </div>
                                    </div>
    <?php if (empty($editproduct)) { ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quantity ? <sup style="color:red;">*</sup></label>
        <?= $this->Form->input('quantity', ['value' => ((@$editproduct->quantity > 0) ? @$editproduct->quantity : ''), 'type' => 'number', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity', 'min' => "0", 'required']); ?>
                                            </div>
                                        </div>
    <?php } ?>
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
                                            <label for="">Display status</label>
                                            <select name="display_status" class="form-control">
                                                <option <?php if (@$editproduct->display_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                <option <?php if (@$editproduct->display_status == '1') { ?> selected="" <?php } ?> value="1">Display</option>                                
                                                <option <?php if (@$editproduct->display_status == '2') { ?> selected="" <?php } ?> value="2">Non Display</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Clearance status</label>
                                                <select name="is_clearance" class="form-control">
                                                    <option <?php if (@$editproduct->is_clearance == '') { ?> selected="" <?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->is_clearance == 1) { ?> selected="" <?php } ?> value="1">Set for clearance</option>                                
                                                    <option <?php if (@$editproduct->is_clearance == 2) { ?> selected="" <?php } ?> value="2">Not set for clearance</option>
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
                                                    <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/BoyKids/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
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
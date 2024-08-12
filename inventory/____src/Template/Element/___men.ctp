<?php //print_r([$product_ctg_nme,$product_sub_ctg_nme]); ?>
<div class="tab-content" style="width: 100%;float: left;">
                                    <div class="row">
    <?= $this->Form->input('profile_type', ['value' => '1', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Category <sup style="color:red;">*</sup></label>
                                                <select name="product_type" class="form-control" onchange="getSubCatg(this.value);" required>
                                                    <option value="" selected disabled>Select Category</option>
                                                    <?php foreach ($productType as $type) { ?>
                                                        <option  value="<?php echo $type->id; ?>" <?php echo (!empty($editproduct) && ($editproduct->product_type == $type->id)) ? "selected" : ""; echo (!empty($_GET['ctg']) && ($_GET['ctg'] ==$type->id))?'selected':''; ?>  ><?php echo $type->product_type . '-' . $type->name; ?></option>
    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category <sup style="color:red;">*</sup></label>
                                                <select name="rack" class="form-control" required onchange="setSubCatg(this.value);">
                                                    <?php /*if (empty($editproduct)) { ?> 
                                                        <option value="" selected disabled>Select Category first</option>
                                                    <?php }*/ ?>
                                                        <option value='' selected disabled>--</option>
                                                    <?php
                                                    if (!empty($in_rack)) {
                                                        foreach ($in_rack as $rk) {
                                                            ?>
                                                            <option  value="<?php echo $rk->id; ?>"  <?php echo (!empty($editproduct) && ($editproduct->rack == $rk->id)) ? "selected" : ""; ?> ><?php echo $rk->rack_number."-".$rk->rack_name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

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
                                                <label for="exampleInputPassword1">Height range <sup style="color:red;">*</sup></label>
                                                <div class="women-select-boxes">
                                                    <div class="women-select1">
                                                        <select name="tall_feet" id="tall_feet">
                                                            <option <?php if (@$editproduct->tall_feet == '') { ?> selected=""<?php } ?> value="" disabled>--</option>
                                                            <option <?php if (@$editproduct->tall_feet == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                            <option <?php if (@$editproduct->tall_feet == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                            <option <?php if (@$editproduct->tall_feet == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="women-select1">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option <?php if (@$editproduct->tall_inch == '') { ?> selected=""<?php } ?> value="" disabled>--</option>
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

                                                        <select name="tall_feet2" id="tall_feet2">
                                                            <option <?php if (@$editproduct->tall_feet2 == '') { ?> selected=""<?php } ?> value="" disabled>--</option>
                                                            <option <?php if (@$editproduct->tall_feet2 == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                            <option <?php if (@$editproduct->tall_feet2 == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                            <option <?php if (@$editproduct->tall_feet2 == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="women-select1">
                                                        <select name="tall_inch2" id="tall_inch2">
                                                            <option <?php if (@$editproduct->tall_inch2 == '') { ?> selected=""<?php } ?> value="" disabled>--</option>
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
    <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>                                                            
                                                    </div>
                                                    <span>to</span>
                                                    <div class="women-select2">
    <?= $this->Form->input('best_fit_for_weight2', ['value' => @$editproduct->best_fit_for_weight2, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Age range <sup style="color:red;">*</sup></label>
                                                <div class="women-select-boxes">
                                                    <div class="women-select2">
    <?= $this->Form->input('age1', ['value' => @$editproduct->age1, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter age']); ?>                                                            
                                                    </div>
                                                    <span>to</span>
                                                    <div class="women-select2">
    <?= $this->Form->input('age2', ['value' => @$editproduct->age2, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter age']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                   
    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Profession</label>
                                            <select name="profession[]" id="profession" class="form-control select2_select" aria-invalid="false" multiple>
                                                <option value="" <?php if (!empty($editproduct->profession) && in_array('NULL', json_decode($editproduct->profession, true))) { ?> selected <?php } ?> >--</option>
                                                <option value="1" <?php if (!empty($editproduct->profession) && in_array(1, json_decode($editproduct->profession, true))) { ?> selected <?php } ?> >Architecture / Engineering</option>
                                                <option value="2" <?php if (!empty($editproduct->profession) && in_array(2, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Art / Design</option>
                                                <option value="3" <?php if (!empty($editproduct->profession) && in_array(3, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Building / Maintenance</option>
                                                <option value="4" <?php if (!empty($editproduct->profession) && in_array(4, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Business / Client Service</option>
                                                <option value="5" <?php if (!empty($editproduct->profession) && in_array(5, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Community / Social Service</option>
                                                <option value="6" <?php if (!empty($editproduct->profession) && in_array(6, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Computer / IT</option>
                                                <option value="7" <?php if (!empty($editproduct->profession) && in_array(7, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Education</option>
                                                <option value="8" <?php if (!empty($editproduct->profession) && in_array(8, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Entertainer / Performer</option>
                                                <option value="9" <?php if (!empty($editproduct->profession) && in_array(9, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Farming / Fishing / Forestry</option>
                                                <option value="10" <?php if (!empty($editproduct->profession) && in_array(10, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Financial Services</option>
                                                <option value="11" <?php if (!empty($editproduct->profession) && in_array(11, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Health Practitioner / Technician</option>
                                                <option value="12" <?php if (!empty($editproduct->profession) && in_array(12, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Hospitality / Food Service</option>
                                                <option value="13" <?php if (!empty($editproduct->profession) && in_array(13, json_decode($editproduct->profession, true))) { ?> selected <?php } ?> >Management</option>
                                                <option value="14" <?php if (!empty($editproduct->profession) && in_array(14, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Media / Communications</option>
                                                <option value="15" <?php if (!empty($editproduct->profession) && in_array(15, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Military / Protective Service</option>
                                                <option value="16" <?php if (!empty($editproduct->profession) && in_array(16, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Legal</option>
                                                <option value="17" <?php if (!empty($editproduct->profession) && in_array(17, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Office / Administration</option>
                                                <option value="18" <?php if (!empty($editproduct->profession) && in_array(18, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Average</option>
                                                <option value="19" <?php if (!empty($editproduct->profession) && in_array(19, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Personal Care & Service</option>
                                                <option value="20" <?php if (!empty($editproduct->profession) && in_array(20, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Production / Manufacturing</option>
                                                <option value="21" <?php if (!empty($editproduct->profession) && in_array(21, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Retail</option>
                                                <option value="22" <?php if (!empty($editproduct->profession) && in_array(22, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Sales</option>
                                                <option value="23" <?php if (!empty($editproduct->profession) && in_array(23, json_decode($editproduct->profession, true))) { ?> selected <?php } ?> >Science</option>
                                                <option value="24" <?php if (!empty($editproduct->profession) && in_array(24, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Technology</option>
                                                <option value="25" <?php if (!empty($editproduct->profession) && in_array(25, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Transportation</option>
                                                <option value="26" <?php if (!empty($editproduct->profession) && in_array(26, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Self-Employed</option>
                                                <option value="27" <?php if (!empty($editproduct->profession) && in_array(27, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Stay-At-Home Parent</option>
                                                <option value="28" <?php if (!empty($editproduct->profession) && in_array(28, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Student</option>
                                                <option value="29" <?php if (!empty($editproduct->profession) && in_array(29, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Retired</option>
                                                <option value="30" <?php if (!empty($editproduct->profession) && in_array(30, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Not Employed</option>
                                                <option value="31" <?php if (!empty($editproduct->profession) && in_array(31, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 " style="<?= (in_array($product_ctg_nme,["B14"]))?'display:block;':'display:none;';?>">
                                        <div class="form-group" style="margin-top: 35px;">

                                            <label for="free_size_wo">
                                                <input type="radio" name="primary_size" value="free_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'checked' : ''; ?> id="free_size_wo"/>
                                                Free Size
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Best Size Fit ?</label>
                                            <select name="best_size_fit" class="form-control" aria-invalid="false">
                                                <option <?php if (@$editproduct->best_size_fit == '') { ?> selected="" <?php } ?> value="">--</option>
                                                <option <?php if (@$editproduct->best_size_fit == '1') { ?> selected="" <?php } ?> value="1">Sometimes too small</option>
                                                <option <?php if (@$editproduct->best_size_fit == '2') { ?> selected="" <?php } ?> value="2">Just right</option>
                                                <option <?php if (@$editproduct->best_size_fit == '3') { ?> selected="" <?php } ?> value="3">Sometimes too big</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6"  style="<?= (in_array($product_ctg_nme,["B3", "B4","B5","B6"]))?'display:block;':'display:none;';?>">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Waist size?</label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="waist_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'waist_size')) ? 'checked' : ''; ?> />
                                                </div>


                                                <div class="col-md-4">
                                                    <select name="waist_size" id="waist_size" aria-required="true" class="form-control">
                                                        <option <?php if (@$editproduct->waist_size == '') { ?> selected="" <?php } ?> value="">--</option>
                                                        <option <?php if (@$editproduct->waist_size == '28') { ?> selected="" <?php } ?> value="28">28</option>
                                                        <option <?php if (@$editproduct->waist_size == '29') { ?> selected="" <?php } ?> value="29">29</option>
                                                        <option <?php if (@$editproduct->waist_size == '30') { ?> selected="" <?php } ?> value="30">30</option>
                                                        <option <?php if (@$editproduct->waist_size == '31') { ?> selected="" <?php } ?> value="31">31</option>
                                                        <option <?php if (@$editproduct->waist_size == '32') { ?> selected="" <?php } ?> value="32">32</option>
                                                        <option <?php if (@$editproduct->waist_size == '33') { ?> selected="" <?php } ?> value="33">33</option>
                                                        <option <?php if (@$editproduct->waist_size == '34') { ?> selected="" <?php } ?> value="34">34</option>
                                                        <option <?php if (@$editproduct->waist_size == '35') { ?> selected="" <?php } ?> value="35">35</option>
                                                        <option <?php if (@$editproduct->waist_size == '36') { ?> selected="" <?php } ?> value="36">36</option>
                                                        <option <?php if (@$editproduct->waist_size == '38') { ?> selected="" <?php } ?> value="38">38</option>
                                                        <option <?php if (@$editproduct->waist_size == '40') { ?> selected="" <?php } ?> value="40">40</option>
                                                        <option <?php if (@$editproduct->waist_size == '42') { ?> selected="" <?php } ?> value="42">42</option>
                                                        <option <?php if (@$editproduct->waist_size == '44') { ?> selected="" <?php } ?> value="44">44</option>
                                                        <option <?php if (@$editproduct->waist_size == '46') { ?> selected="" <?php } ?> value="46">46</option>
                                                        <option <?php if (@$editproduct->waist_size == '48') { ?> selected="" <?php } ?> value="48">48</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="waist_size_run" class="form-control">
                                                        <option <?php if (@$editproduct->waist_size_run == '') { ?> selected="" <?php } ?> value="">--</option>
                                                        <option <?php if (@$editproduct->waist_size_run == 'Sometimes too small') { ?> selected="" <?php } ?> value="Sometimes too small">Sometimes too small</option>
                                                        <option <?php if (@$editproduct->waist_size_run == 'Just right') { ?> selected="" <?php } ?> value="Just right">Just right</option>
                                                        <option <?php if (@$editproduct->waist_size_run == 'Sometimes too big') { ?> selected="" <?php } ?> value="Sometimes too big">Sometimes too big</option>
                                                    </select>
                                                </div>
                                            </div>                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"  style="<?= (in_array($product_ctg_nme,["B1","B2", "B11","B3","B4","B5","B7"]))?'display:block;':'display:none;';?>" >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Shirt size?</label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="shirt_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'shirt_size')) ? 'checked' : ''; ?> />
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="shirt_size" aria-required="true" class="form-control" aria-invalid="false">
                                                        <option <?php if (@$editproduct->shirt_size == '') { ?> selected="" <?php } ?> value="">--</option>
                                                        <option <?php if (@$editproduct->shirt_size == 'XS') { ?> selected="" <?php } ?> value="XS">XS</option>
                                                        <option <?php if (@$editproduct->shirt_size == 'S') { ?> selected="" <?php } ?> value="S">S</option>
                                                        <option <?php if (@$editproduct->shirt_size == 'M') { ?> selected="" <?php } ?> value="M">M</option>
                                                        <option <?php if (@$editproduct->shirt_size == 'L') { ?> selected="" <?php } ?> value="L">L</option>
                                                        <option <?php if (@$editproduct->shirt_size == 'XL') { ?> selected="" <?php } ?> value="XL">XL</option>
                                                        <option <?php if (@$editproduct->shirt_size == 'XXL') { ?> selected="" <?php } ?> value="XXL">XXL</option>
                                                        <option <?php if (@$editproduct->shirt_size == '3XL') { ?> selected="" <?php } ?> value="3XL">3XL</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="shirt_size_run" class="form-control" aria-invalid="false">
                                                        <option <?php if (@$editproduct->shirt_size_run == '') { ?> selected="" <?php } ?> value="">--</option>
                                                        <option <?php if (@$editproduct->shirt_size_run == 'Sometimes too small') { ?> selected="" <?php } ?> value="Sometimes too small">Sometimes too small</option>
                                                        <option <?php if (@$editproduct->shirt_size_run == 'Just right') { ?> selected="" <?php } ?> value="Just right">Just right</option>
                                                        <option <?php if (@$editproduct->shirt_size_run == 'Sometimes too big') { ?> selected="" <?php } ?> value="Sometimes too big">Sometimes too big</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="<?= (in_array($product_ctg_nme,["B3", "B4","B5"]))?'display:block;':'display:none;';?>">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Inseam size?</label>
                                            <select name="inseam_size" id="inseam_size" aria-required="true" class="form-control" aria-invalid="false">
                                                <option <?php if (@$editproduct->inseam_size == '') { ?> selected="" <?php } ?> value="">--</option>
                                                <option <?php if (@$editproduct->inseam_size == '28') { ?> selected="" <?php } ?> value="28">28</option>
                                                <option <?php if (@$editproduct->inseam_size == '30') { ?> selected="" <?php } ?> value="30">30</option>
                                                <option <?php if (@$editproduct->inseam_size == '32') { ?> selected="" <?php } ?> value="32">32</option>
                                                <option <?php if (@$editproduct->inseam_size == '34') { ?> selected="" <?php } ?> value="34">34</option>
                                                <option <?php if (@$editproduct->inseam_size == '36') { ?> selected="" <?php } ?> value="36">36</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="<?= (in_array($product_ctg_nme,["B3", "B4", "B5","B6","B7"]))?'display:block;':'display:none;';?>">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bottom size?</label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="men_bottom" <?= (!empty($editproduct) && ($editproduct->primary_size == 'men_bottom')) ? 'checked' : ''; ?> />
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="men_bottom" aria-required="true" class="form-control" aria-invalid="false">
                                                        <option <?php if (@$editproduct->men_bottom == '') { ?> selected="" <?php } ?> value="">--</option>
                                                        <option <?php if (@$editproduct->men_bottom == 'XS') { ?> selected="" <?php } ?> value="XS">XS</option>
                                                        <option <?php if (@$editproduct->men_bottom == 'S') { ?> selected="" <?php } ?> value="S">S</option>
                                                        <option <?php if (@$editproduct->men_bottom == 'M') { ?> selected="" <?php } ?> value="M">M</option>
                                                        <option <?php if (@$editproduct->men_bottom == 'L') { ?> selected="" <?php } ?> value="L">L</option>
                                                        <option <?php if (@$editproduct->men_bottom == 'XL') { ?> selected="" <?php } ?> value="XL">XL</option>
                                                        <option <?php if (@$editproduct->men_bottom == 'XXL') { ?> selected="" <?php } ?> value="XXL">XXL</option>
                                                        <option <?php if (@$editproduct->men_bottom == '3XL') { ?> selected="" <?php } ?> value="3XL">3XL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Shoe size?</label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="shoe_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'shoe_size')) ? 'checked' : ''; ?> />
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="shoe_size" class="form-control" aria-invalid="false">
                                                        <option <?php if (@$editproduct->shoe_size == '') { ?> selected="" <?php } ?> value="">--</option>
                                                        <option <?php if (@$editproduct->shoe_size == '7') { ?> selected="" <?php } ?> value="7">7</option>
                                                        <option <?php if (@$editproduct->shoe_size == '7.5') { ?> selected="" <?php } ?> value="7.5">7.5</option>
                                                        <option <?php if (@$editproduct->shoe_size == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                        <option <?php if (@$editproduct->shoe_size == '8.5') { ?> selected="" <?php } ?> value="8.5">8.5</option>
                                                        <option <?php if (@$editproduct->shoe_size == '9') { ?> selected="" <?php } ?> value="9">9</option>
                                                        <option <?php if (@$editproduct->shoe_size == '9.5') { ?> selected="" <?php } ?> value="9.5">9.5</option>
                                                        <option <?php if (@$editproduct->shoe_size == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                        <option <?php if (@$editproduct->shoe_size == '10.5') { ?> selected="" <?php } ?> value="10.5">10.5</option>
                                                        <option <?php if (@$editproduct->shoe_size == '11') { ?> selected="" <?php } ?> value="11">11</option>
                                                        <option <?php if (@$editproduct->shoe_size == '11.5') { ?> selected="" <?php } ?> value="11.5">11.5</option>
                                                        <option <?php if (@$editproduct->shoe_size == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                        <option <?php if (@$editproduct->shoe_size == '12.5') { ?> selected="" <?php } ?> value="12.5">12.5</option>
                                                        <option <?php if (@$editproduct->shoe_size == '13') { ?> selected="" <?php } ?> value="13">13</option>
                                                        <option <?php if (@$editproduct->shoe_size == '14') { ?> selected="" <?php } ?> value="14">14</option>
                                                        <option <?php if (@$editproduct->shoe_size == '15') { ?> selected="" <?php } ?> value="15">15</option>
                                                        <option <?php if (@$editproduct->shoe_size == '16') { ?> selected="" <?php } ?> value="16">16</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="shoe_size_run" class="form-control">
                                                        <option <?php if (@$editproduct->shoe_size_run == '') { ?> selected="" <?php } ?> value="" selected="">--</option>
                                                        <option <?php if (@$editproduct->shoe_size_run == 'Narrow') { ?> selected="" <?php } ?> value="Narrow">Narrow</option>
                                                        <option <?php if (@$editproduct->shoe_size_run == 'Medium') { ?> selected="" <?php } ?> value="Medium">Medium</option>
                                                        <option <?php if (@$editproduct->shoe_size_run == 'Wide') { ?> selected="" <?php } ?> value="Wide">Wide</option>
                                                        <option <?php if (@$editproduct->shoe_size_run == 'Extra Wide') { ?> selected="" <?php } ?> value="Extra Wide">Extra Wide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box body-men">
                                        <h3>Tell us Your body Shape?</h3>
                                        <ul>
                                            <li>
                                                <h4 style="margin-top: 0;">Rectangle</h4>
                                                <input class="radio-box" id="radio2" name="better_body_shape[]" value="2" type="checkbox" <?php if (!empty($editproduct->better_body_shape) && in_array(2, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?> >
                                                <label for="radio2">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-2.png" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Triangle</h4>
                                                <input class="radio-box" id="radio3" type="checkbox" name="better_body_shape[]" value="3" <?php if (!empty($editproduct->better_body_shape) && in_array(3, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio3">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-3.png" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Trapezoid</h4>
                                                <input class="radio-box" name="better_body_shape[]" value="1" id="radio1" type="checkbox" <?php if (!empty($editproduct) && (!empty($editproduct->better_body_shape) && in_array(1, json_decode($editproduct->better_body_shape, true)))) { ?> checked <?php } ?> >
                                                <label for="radio1">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-1.png" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Oval</h4>
                                                <input class="radio-box" id="radio4" type="checkbox" name="better_body_shape[]" value="4" <?php if (!empty($editproduct->better_body_shape) && in_array(4, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio4">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-4.png" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Inverted Triangle</h4>
                                                <input class="radio-box" id="radio5" type="checkbox" name="better_body_shape[]" value="5" <?php if (!empty($editproduct->better_body_shape) && in_array(5, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio5">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-5.png" alt="">
                                                </label>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                                <div class="row">


                                    <div class="col-md-6 skin">
                                        <label >Skin tone ?</label>
                                        <ul>
                                            <li>
                                                <input class="radio-box" value="1"  <?php if (!empty($editproduct->skin_tone) && in_array(1, json_decode($editproduct->skin_tone, true))) { ?> checked <?php } ?> id="radio2a" name="skin_tone[]" type="checkbox">
                                                <label for="radio2a"></label>
                                            </li>
                                            <li>
                                                <input class="radio-box" value="2"  <?php if (!empty($editproduct->skin_tone) && in_array(2, json_decode($editproduct->skin_tone, true))) { ?> checked <?php } ?>  id="radio2b" name="skin_tone[]" type="checkbox">
                                                <label for="radio2b"></label>
                                            </li>
                                            <li>
                                                <input class="radio-box" value="3" <?php if (!empty($editproduct->skin_tone) && in_array(3, json_decode($editproduct->skin_tone, true))) { ?> checked <?php } ?>  id="radio2c" name="skin_tone[]" type="checkbox">
                                                <label for="radio2c"></label>
                                            </li>
                                            <li>
                                                <input class="radio-box" value="4" <?php if (!empty($editproduct->skin_tone) && in_array(4, json_decode($editproduct->skin_tone, true))) { ?> checked <?php } ?>  id="radio2d" name="skin_tone[]" type="checkbox">
                                                <label for="radio2d"></label>
                                            </li>
                                            <li>
                                                <input class="radio-box" value="5" <?php if (!empty($editproduct->skin_tone) && in_array(5, json_decode($editproduct->skin_tone, true))) { ?> checked <?php } ?>  id="radio2e" name="skin_tone[]" type="checkbox">
                                                <label for="radio2e"></label>
                                            </li>
                                            <li>
                                                <input class="radio-box" value="6" <?php if (!empty($editproduct->skin_tone) && in_array(6, json_decode($editproduct->skin_tone, true))) { ?> checked <?php } ?>  id="radio2f" name="skin_tone[]" type="checkbox">
                                                <label for="radio2f"><span>OTHER</span></label>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Typically wear to work? </label>
                                            <select name="work_type[]" id="work_type" aria-required="true" class="form-control select2_select" aria-invalid="false" multiple>
                                                <option <?php if (!empty($editproduct->work_type) && in_array(NULL, json_decode($editproduct->work_type, true))) { ?> selected <?php } ?> value="NULL">--</option>
                                                <option <?php if (!empty($editproduct->work_type) && in_array(1, json_decode($editproduct->work_type, true))) { ?> selected <?php } ?> value="1">Casual</option>
                                                <option<?php if (!empty($editproduct->work_type) && in_array(2, json_decode($editproduct->work_type, true))) { ?> selected <?php } ?> value="2">Business Casual</option>
                                                <option<?php if (!empty($editproduct->work_type) && in_array(3, json_decode($editproduct->work_type, true))) { ?> selected <?php } ?> value="3">Formal</option>
    <!--                                                    <option <?php if (@$editproduct->work_type == '4') { ?> selected="" <?php } ?> value="4">Oval</option>
                                                <option <?php if (@$editproduct->work_type == '5') { ?> selected="" <?php } ?> value="5">Inverted Triangle</option>-->
                                            </select>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="<?= (in_array($product_ctg_nme,["B1","B2", "B11","B7"]))?'display:block;':'display:none;';?>" >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Casual shirts to fit ?</label>
                                            <select name="casual_shirts_type" class="form-control">
                                                <option <?php if (@$editproduct->casual_shirts_type == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if (@$editproduct->casual_shirts_type == '4') { ?> selected="" <?php } ?> value="4">Slim</option>                                
                                                <option <?php if (@$editproduct->casual_shirts_type == '5') { ?> selected="" <?php } ?> value="5">Regular</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="<?= (in_array($product_ctg_nme,["B2", "B11","B3","B4","B5"]))?'display:block;':'display:none;';?>">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Button up shirt to fit ?</label>
                                            <select name="bottom_up_shirt_fit" aria-required="true" class="form-control" aria-invalid="false">
                                                <option <?php if (@$editproduct->bottom_up_shirt_fit == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if (@$editproduct->bottom_up_shirt_fit == '6') { ?> selected="" <?php } ?> value="6">Slim</option>                                
                                                <option <?php if (@$editproduct->bottom_up_shirt_fit == '7') { ?> selected="" <?php } ?> value="7">Regular</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="<?= (in_array($product_ctg_nme,["B7"]))?'display:block;':'display:none;';?>">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Jeans to Fit ?</label>
                                            <select name="jeans_Fit" class="form-control">
                                                <option <?php if (@$editproduct->jeans_Fit == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if (@$editproduct->jeans_Fit == '3') { ?> selected="" <?php } ?> value="3">Straight</option>                                
                                                <option <?php if (@$editproduct->jeans_Fit == '2') { ?> selected="" <?php } ?> value="2">Slim</option>
                                                <option <?php if (@$editproduct->jeans_Fit == '1') { ?> selected="" <?php } ?> value="1">Skinny</option>                                
                                                <option <?php if (@$editproduct->jeans_Fit == '4') { ?> selected="" <?php } ?> value="4">Relaxed</option>                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="<?= (in_array($product_ctg_nme,["B6","B7"]))?'display:block;':'display:none;';?>">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Shorts long ?</label>
                                            <select name="shorts_long" aria-required="true" class="form-control" aria-invalid="false">
                                                <option <?php if (@$editproduct->shorts_long == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if (@$editproduct->shorts_long == '4') { ?> selected="" <?php } ?> value="4">Upper Thigh</option>                                
                                                <option <?php if (@$editproduct->shorts_long == '3') { ?> selected="" <?php } ?> value="3">Lower Thigh</option>
                                                <option <?php if (@$editproduct->shorts_long == '2') { ?> selected="" <?php } ?> value="2">Above Knee</option>                                
                                                <option <?php if (@$editproduct->shorts_long == '1') { ?> selected="" <?php } ?> value="1">At The Knee</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                    <div class="col-md-6" style="<?= (in_array($product_ctg_nme,["B7"]))?'display:block;':'display:none;';?>">
                                        <div class="form-group">
                                            <label for="men_bottom_prefer">Bottom fit ?</label>
                                            <select name="men_bottom_prefer" aria-required="true" class="form-control" aria-invalid="false" id="men_bottom_prefer">
                                                <option <?php if (@$editproduct->men_bottom_prefer == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if (@$editproduct->men_bottom_prefer == '1') { ?> selected="" <?php } ?> value="1">Tighter Fitting</option>
                                                <option <?php if (@$editproduct->men_bottom_prefer == '2') { ?> selected="" <?php } ?> value="2">More Relaxed</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <!--                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword1">Outfit matches ?</label>
                                                                                    <select name="outfit_matches" aria-required="true" class="form-control" aria-invalid="false">
                                                                                        <option <?php if (@$editproduct->outfit_matches == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                                        <option <?php if (@$editproduct->outfit_matches == '1') { ?> selected="" <?php } ?> value="1">Upper Thigh</option>
                                                                                        <option <?php if (@$editproduct->outfit_matches == '2') { ?> selected="" <?php } ?> value="2">Lower Thigh</option>
                                                                                        <option <?php if (@$editproduct->outfit_matches == '3') { ?> selected="" <?php } ?> value="3">Above Knee</option>
                                                                                        <option <?php if (@$editproduct->outfit_matches == '4') { ?> selected="" <?php } ?> value="4">At The Knee</option>
                                                                                    </select>                                            
                                                                                </div>
                                                                            </div>-->
                                </div>
                                <div class="form-box-data">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <div class="type-box type-box2 error-issues">
                                                <h3>Tell us which of these outfits would you prefer to wear?</h3>

                                                <ul>
                                                    <li>
                                                        <input class="radio-box" name="style_sphere_selections_v5[]" value="1" id="mens101" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(1, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?> >
                                                        <label for="mens101">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit1.jpg" alt="">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input class="radio-box" name="style_sphere_selections_v5[]" value="2" type="checkbox" id="mens102"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(2, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens102">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit2.jpg" alt="">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input class="radio-box" id="mens103" name="style_sphere_selections_v5[]" value="3" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(3, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens103" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit3.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens104" name="style_sphere_selections_v5[]" value="4" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(4, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens104">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit4.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens105" name="style_sphere_selections_v5[]" value="5" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(5, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens105" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit5.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens106" name="style_sphere_selections_v5[]" value="6" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(6, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens106">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit6.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens107" name="style_sphere_selections_v5[]" value="7" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(7, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens107">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit7.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens108" name="style_sphere_selections_v5[]" value="8" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(8, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens108">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit8.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens109" name="style_sphere_selections_v5[]" value="9" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(9, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens109" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit9.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens110" name="style_sphere_selections_v5[]" value="10" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(10, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens110" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit10.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens111" name="style_sphere_selections_v5[]" value="11" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(11, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens111" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit11.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens112" name="style_sphere_selections_v5[]" value="12" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(12, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens112" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit12.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens113" name="style_sphere_selections_v5[]" value="13" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(13, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens113" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit13.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens114" name="style_sphere_selections_v5[]" value="14" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(14, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens114" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit14.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens115" name="style_sphere_selections_v5[]" value="15" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(15, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens115" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit15.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens116" name="style_sphere_selections_v5[]" value="16" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(16, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens116" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit16.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens117" name="style_sphere_selections_v5[]" value="17" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(17, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens117" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit17.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens118" name="style_sphere_selections_v5[]" value="18" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(18, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens118" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit18.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens119" name="style_sphere_selections_v5[]" value="19" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(19, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens119" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit19.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens120" name="style_sphere_selections_v5[]" value="20" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(20, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens120" >
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit20.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens12300" name="style_sphere_selections_v5[]" value="0" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(0, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?> >
                                                        <label for="mens12300" onclick="updateChkbox()">
                                                            <img src="" alt="NONE">
                                                        </label>
                                                    </li>  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-box-data">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12 col-md-12 note-label">
                                            <h3>Any fit issues to take note of?</h3>
                                            <ul>
                                                <li>
                                                    <input class="radio-box" id="check-box3a" name="take_note_of[]" type="checkbox" value='1'  <?php if (!empty($editproduct->take_note_of) && in_array(1, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3a">Long Arms</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3b" name="take_note_of[]" type="checkbox" value='2'  <?php if (!empty($editproduct->take_note_of) && in_array(2, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3b">Short Arms</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3c" name="take_note_of[]" type="checkbox" value='3'  <?php if (!empty($editproduct->take_note_of) && in_array(3, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?>  >
                                                    <label for="check-box3c">Thick Arms</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" value='15' id="check-box3d" name="take_note_of[]" type="checkbox"  <?php if (!empty($editproduct->take_note_of) && in_array(15, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?>  >
                                                    <label for="check-box3d">Broad Shoulders</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3e" name="take_note_of[]" type="checkbox" value='4'  <?php if (!empty($editproduct->take_note_of) && in_array(4, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?>  >
                                                    <label for="check-box3e">Man Boobs</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3f" name="take_note_of[]" type="checkbox" value='5'   <?php if (!empty($editproduct->take_note_of) && in_array(5, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3f">Big Belly</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3g" name="take_note_of[]" type="checkbox" value='6'    <?php if (!empty($editproduct->take_note_of) && in_array(6, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3g">Big Butt</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3h" name="take_note_of[]" type="checkbox" value='14'   <?php if (!empty($editproduct->take_note_of) && in_array(14, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3h">Small Butt</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3i" name="take_note_of[]" type="checkbox" value='7'   <?php if (!empty($editproduct->take_note_of) && in_array(7, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3i">Thunder Things</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3j" name="take_note_of[]" type="checkbox" value='8'   <?php if (!empty($editproduct->take_note_of) && in_array(8, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3j">Thick Neck</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" type="checkbox" id="check-box3k" name="take_note_of[]"  value='9'   <?php if (!empty($editproduct->take_note_of) && in_array(9, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3k">Short Torso</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3l"  value = '13' name="take_note_of[]" type="checkbox"   <?php if (!empty($editproduct->take_note_of) && in_array(13, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3l">Long Torso</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3m" name="take_note_of[]" type="checkbox" value='10'   <?php if (!empty($editproduct->take_note_of) && in_array(10, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3m">Broad Cheast</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3n" name="take_note_of[]" type="checkbox" value='11'   <?php if (!empty($editproduct->take_note_of) && in_array(11, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3n">Very Skinny</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3o" name="take_note_of[]" type="checkbox" value='12'   <?php if (!empty($editproduct->take_note_of) && in_array(12, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3o">Skinny Legs</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>Budget</b></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_shirt_budg" <?php if ((@$editproduct->budget_type == "men_shirt_budg")) { ?> checked <?php } ?>> 
                                                SHIRTS
                                            </label>

                                            <select name="men_shirt_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$50 - $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$75 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$100 - $125</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$125+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_polos_budg" <?php if ((@$editproduct->budget_type == "men_polos_budg")) { ?> checked <?php } ?> > 
                                                TEES & POLOS
                                            </label>

                                            <select name="men_polos_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $30</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$30 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$50 - $70</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$70 - $90</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$90+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_sweater_budg" <?php if ((@$editproduct->budget_type == "men_sweater_budg")) { ?> checked <?php } ?>> 
                                                SWEATERS & SWEATSHIRTS
                                            </label>

                                            <select name="men_sweater_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$50 - $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$75 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$100 - $125</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$125+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_pants_budg" <?php if ((@$editproduct->budget_type == "men_pants_budg")) { ?> checked <?php } ?> > 
                                                PANTS & DENIM
                                            </label>

                                            <select name="men_pants_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $100</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$100 - $125</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$125 - $175</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$175+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_shorts_budg" <?php if ((@$editproduct->budget_type == "men_shorts_budg")) { ?> checked <?php } ?>> 
                                                SHORTS
                                            </label>

                                            <select name="men_shorts_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $40</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$40 - $60</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$60 - $80</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$80 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$100+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_shoe_budg" <?php if ((@$editproduct->budget_type == "men_shoe_budg")) { ?> checked <?php } ?> > 
                                                SHOES 
                                            </label>

                                            <select name="men_shoe_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $125</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$125 - $175</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$175 - $250</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$250+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_outerwear_budg" <?php if ((@$editproduct->budget_type == "men_outerwear_budg")) { ?> checked <?php } ?>> 
                                                OUTERWEAR
                                            </label>

                                            <select name="men_outerwear_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $125</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$125 - $175</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$175 - $250</option> 

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_ties_budg" <?php if ((@$editproduct->budget_type == "men_ties_budg")) { ?> checked <?php } ?> > 
                                                Ties 
                                            </label>

                                            <select name="men_ties_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_ties_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_ties_budg") && (@$editproduct->budget_value == '40-60')) { ?> selected="" <?php } ?> value="40-60">$40 - $60</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_ties_budg") && (@$editproduct->budget_value == 'up-to-80')) { ?> selected="" <?php } ?> value="up-to-80">Up to $80</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_ties_budg") && (@$editproduct->budget_value == 'up-to-100')) { ?> selected="" <?php } ?> value="up-to-100">Up to  $100</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_belts_budg" <?php if ((@$editproduct->budget_type == "men_belts_budg")) { ?> checked <?php } ?>> 
                                                Belts
                                            </label>
                                            <select name="men_belts_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_belts_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_belts_budg") && (@$editproduct->budget_value == '30-50')) { ?> selected="" <?php } ?> value="30-50">$30 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_belts_budg") && (@$editproduct->budget_value == 'up-to-70')) { ?> selected="" <?php } ?> value="up-to-70">Up to $70</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_belts_budg") && (@$editproduct->budget_value == 'up-to-90')) { ?> selected="" <?php } ?> value="up-to-90"> Up to  $90</option> 
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_bags_budg" <?php if ((@$editproduct->budget_type == "men_bags_budg")) { ?> checked <?php } ?> > 
                                                Wallets,Bags, Accessories 
                                            </label>

                                            <select name="men_bags_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_bags_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_bags_budg") && (@$editproduct->budget_value == '25-50')) { ?> selected="" <?php } ?> value="25-50">$25 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_bags_budg") && (@$editproduct->budget_value == 'up-to-75')) { ?> selected="" <?php } ?> value="up-to-75">Up to $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_bags_budg") && (@$editproduct->budget_value == 'up-to-100')) { ?> selected="" <?php } ?> value="up-to-100">Up to  $100</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_sunglass_budg" <?php if ((@$editproduct->budget_type == "men_sunglass_budg")) { ?> checked <?php } ?>> 
                                                Sunglasses
                                            </label>
                                            <select name="men_sunglass_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == '40-60')) { ?> selected="" <?php } ?> value="40-60">$40 - $60/option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == 'up-to-80')) { ?> selected="" <?php } ?> value="up-to-80">Up to $80</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == 'up-to-100')) { ?> selected="" <?php } ?> value="up-to-100"> Up to  $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == '100-150')) { ?> selected="" <?php } ?> value="100-150"> $100 - $150</option> 
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_hats_budg" <?php if ((@$editproduct->budget_type == "men_hats_budg")) { ?> checked <?php } ?> > 
                                                Hats
                                            </label>

                                            <select name="men_hats_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_hats_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_hats_budg") && (@$editproduct->budget_value == '30-50')) { ?> selected="" <?php } ?> value="30-50">$30 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_hats_budg") && (@$editproduct->budget_value == 'up-to-70')) { ?> selected="" <?php } ?> value="up-to-70">Up to $70</option>
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_socks_budg" <?php if ((@$editproduct->budget_type == "men_socks_budg")) { ?> checked <?php } ?>> 
                                                Socks
                                            </label>
                                            <select name="men_socks_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_socks_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_socks_budg") && (@$editproduct->budget_value == '10-25')) { ?> selected="" <?php } ?> value="10-25">$10 - $25</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_socks_budg") && (@$editproduct->budget_value == 'up-to-35')) { ?> selected="" <?php } ?> value="up-to-35">Up to $35</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_socks_budg") && (@$editproduct->budget_value == 'up-to-45')) { ?> selected="" <?php } ?> value="up-to-45">Up to $45</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_underwear_budg" <?php if ((@$editproduct->budget_type == "men_underwear_budg")) { ?> checked <?php } ?> > 
                                                Underwear
                                            </label>

                                            <select name="men_underwear_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_underwear_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_underwear_budg") && (@$editproduct->budget_value == '10-25')) { ?> selected="" <?php } ?> value="10-25">$10 - $25</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_underwear_budg") && (@$editproduct->budget_value == 'up-to-35')) { ?> selected="" <?php } ?> value="up-to-35">Up to $35</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_underwear_budg") && (@$editproduct->budget_value == 'up-to-45')) { ?> selected="" <?php } ?> value="up-to-45">Up to $45</option>
                                            </select>                                       
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_grooming_budg" <?php if ((@$editproduct->budget_type == "men_hats_budg")) { ?> checked <?php } ?> > 
                                                Grooming
                                            </label>

                                            <select name="men_grooming_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_grooming_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_grooming_budg") && (@$editproduct->budget_value == '10-25')) { ?> selected="" <?php } ?> value="10-25">$10 - $25</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_grooming_budg") && (@$editproduct->budget_value == 'up-to-35')) { ?> selected="" <?php } ?> value="up-to-35">Up to $35</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_grooming_budg") && (@$editproduct->budget_value == 'up-to-45')) { ?> selected="" <?php } ?> value="up-to-45">Up to $45</option>
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
        <?= $this->Form->input('quantity', ['value' => ((@$editproduct->quantity > 0) ? @$editproduct->quantity : 0), 'type' => 'number', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity', 'min' => "0", 'required']); ?>
                                            </div>
                                        </div>
    <?php } ?>
                                </div>
                                <div class="row">
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Image  <sup style="color:red;">*</sup><span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

    <?php if (@$editproduct->product_image) { ?>
                                                <div class="form-group">
                                                    <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                    <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/Men/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
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
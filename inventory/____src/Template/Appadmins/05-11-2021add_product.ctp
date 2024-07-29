<script>
    function getChanges(value) {
        if (value) {
            var url = '<?php echo HTTP_ROOT ?>';
            window.location.href = url + "appadmins/add_product/" + value;
        }
    }
</script>
<?php
$color_arr = $this->Custom->inColor();
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Product For <?php echo @$profile; ?></h1>        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <?= $this->Form->create(@$user, array('id' => 'profile_data', 'data-toggle' => "validator", 'type' => 'file')) ?>
                        <?= $this->Form->input('id', ['value' => @$id, 'type' => 'hidden', 'label' => false]); ?>
                        <div class="nav-tabs-custom">
                            <select name="" class="form-control" onchange=" return getChanges(this.value)">
                                <option <?php if (@$profile == 'Men') { ?> selected="" <?php } ?> value="Men">Men</option>
                                <option <?php if (@$profile == 'Women') { ?> selected="" <?php } ?> value="Women">Women</option>
                                <option <?php if (@$profile == 'BoyKids') { ?> selected="" <?php } ?> value="BoyKids">Boy Kids</option>
                                <option <?php if (@$profile == 'GirlKids') { ?> selected="" <?php } ?> value="GirlKids">Girl Kids</option>
                            </select>
                            <?php
                            $edt_dtl = [];
                            if (!empty(@$editproduct) && !empty($editproduct->dtls)) {
                                $edt_dtl = explode('-', $editproduct->dtls);
                            }
                            ?>

                            <?php if (@$profile == 'Men' || @$profile == '') { ?>

                                <div class="tab-content" style="width: 100%;float: left;">
                                    <div class="row">
                                        <?= $this->Form->input('profile_type', ['value' => '1', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Category</label>
                                                <select name="product_type" class="form-control" onchange="getSubCatg(this.value);">
                                                    <option value="" selected disabled>Select Category</option>
                                                    <?php foreach ($productType as $type) { ?>
                                                        <option  value="<?php echo $type->id; ?>" <?php echo (!empty($editproduct) && ($editproduct->product_type == $type->id)) ? "selected" : ""; ?> ><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category</label>
                                                <select name="rack" class="form-control" required>
                                                    <?php if (empty($editproduct)) { ?> 
                                                        <option value="" selected disabled>Select Category first</option>
                                                    <?php } ?>
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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 1</label>
                                                <?= $this->Form->input('product_name_one', ['value' => @$editproduct->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
                                                <?= $this->Form->input('product_name_two', ['value' => @$editproduct->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2']); ?>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What is your height?</label>
                                                <div class="women-select-boxes">
                                                    <div class="women-select">
                                                        <select name="tall_feet" id="tall_feet">
                                                            <option <?php if (@$editproduct->tall_feet == '') { ?> selected=""<?php } ?> value="">--</option>
                                                            <option <?php if (@$editproduct->tall_feet == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                            <option <?php if (@$editproduct->tall_feet == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                            <option <?php if (@$editproduct->tall_feet == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="women-select">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option <?php if (@$editproduct->tall_inch == '') { ?> selected=""<?php } ?> value="">--</option>
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
                                                            <option <?php if (@$editproduct->tall_inch == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                        </select>
                                                        <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                    </div>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Best Fit for Weight ?</label>
                                                <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group" style="margin-top: 35px;">

                                                <label for="free_size_wo">
                                                    <input type="radio" name="primary_size" value="free_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'checked' : 'checked'; ?> id="free_size_wo"/>
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Better body Shape ?</label>
                                                <select name="better_body_shape" id="better_body_shape" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option <?php if (@$editproduct->better_body_shape == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '2') { ?> selected="" <?php } ?> value="2">Rectangle</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '3') { ?> selected="" <?php } ?> value="3">Triangle</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '1') { ?> selected="" <?php } ?> value="1">Trapezoid</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '4') { ?> selected="" <?php } ?> value="4">Oval</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '5') { ?> selected="" <?php } ?> value="5">Inverted Triangle</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">For Better Skin tone ?</label>
                                                <select name="skin_tone" class="form-control">
                                                    <option <?php if (@$editproduct->skin_tone == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->skin_tone == '1') { ?> selected="" <?php } ?> value="1">IndianRed</option>
                                                    <option <?php if (@$editproduct->skin_tone == '2') { ?> selected="" <?php } ?> value="2">DarkSalmon</option>
                                                    <option <?php if (@$editproduct->skin_tone == '3') { ?> selected="" <?php } ?> value="3">LightSalmon</option>
                                                    <option <?php if (@$editproduct->skin_tone == '4') { ?> selected="" <?php } ?> value="4">DarkRed</option>
                                                    <option <?php if (@$editproduct->skin_tone == '5') { ?> selected="" <?php } ?> value="5">Extra Wide</option>
                                                    <option <?php if (@$editproduct->skin_tone == '6') { ?> selected="" <?php } ?> value="6">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Typically wear to work?</label>
                                                <select name="work_type" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option <?php if (@$editproduct->work_type == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->work_type == '1') { ?> selected="" <?php } ?> value="1">Casual</option>
                                                    <option <?php if (@$editproduct->work_type == '2') { ?> selected="" <?php } ?> value="2">Business Casual</option>
                                                    <option <?php if (@$editproduct->work_type == '3') { ?> selected="" <?php } ?> value="3">Formal</option>
    <!--                                                    <option <?php if (@$editproduct->work_type == '4') { ?> selected="" <?php } ?> value="4">Oval</option>
                                                    <option <?php if (@$editproduct->work_type == '5') { ?> selected="" <?php } ?> value="5">Inverted Triangle</option>-->
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Casual shirts to fit ?</label>
                                                <select name="casual_shirts_type" class="form-control">
                                                    <option <?php if (@$editproduct->casual_shirts_type == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->casual_shirts_type == '4') { ?> selected="" <?php } ?> value="4">Slim</option>                                
                                                    <option <?php if (@$editproduct->casual_shirts_type == '5') { ?> selected="" <?php } ?> value="5">Regular</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bottom up shirt to fit ?</label>
                                                <select name="bottom_up_shirt_fit" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option <?php if (@$editproduct->bottom_up_shirt_fit == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->bottom_up_shirt_fit == '6') { ?> selected="" <?php } ?> value="6">Slim</option>                                
                                                    <option <?php if (@$editproduct->bottom_up_shirt_fit == '7') { ?> selected="" <?php } ?> value="7">Regular</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                                <label for="exampleInputPassword1">Color ?</label>
                                                <select name="color" class="form-control">
                                                    <option <?php if (@$editproduct->color == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>

                                                    <?php foreach ($color_arr as $indx => $clr) { ?>
                                                        <option <?php if (@$editproduct->color == $indx) { ?> selected="" <?php } ?> value="<?= $indx; ?>"><?= $clr; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                                <label for="exampleInputPassword1">Purchase price ?</label>
                                                <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">sale_price ?</label>
                                                <?= $this->Form->input('sale_price', ['value' => @$editproduct->sale_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <?php if (empty($editproduct)) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Quantity ?</label>
                                                    <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'number', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Brand Name</label>
                                                <select name="brand_id" id="brand_id" class="form-control">
                                                    <option value="" disabled>--</option>
                                                    <?php
                                                    if ($this->request->session()->read('Auth.User.type') == 1) {
                                                        foreach ($brandsListings as $brandnm) {
                                                            ?>
                                                            <option <?php if ($brandnm['id'] == @$editproduct->brand_id) { ?> selected=""<?php } ?> value="<?php echo $brandnm['id']; ?>"><?php echo $brandnm['brand_name']; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <option  selected=""  value="<?php echo $this->request->session()->read('Auth.User.id'); ?>"><?php echo $this->request->session()->read('Auth.User.brand_name'); ?></option>
                                                        <?php
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
                                                <label for="exampleInputPassword1">Product Image <span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

                                                <?php if (@$editproduct->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/Men/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>  

                                                <?php } else { ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>                                        
                                                        <div class="help-block with-errors"></div>
                                                    </div>

                                                <?php } ?>  
                                                <div id="imagePreview"></div>                          
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (@$profile == 'Women') { ?>
                                <div class="tab-content women" style="width: 100%;float: left;">
                                    <?= $this->Form->input('profile_type', ['value' => '2', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Category</label>
                                                <select name="product_type" class="form-control"  onchange="getSubCatg(this.value);">
                                                    <option value="" selected disabled>Select Category</option>
                                                    <?php foreach ($productType as $type) { ?>
                                                        <option  value="<?php echo $type->id; ?>" <?php echo (!empty($editproduct) && ($editproduct->product_type == $type->id)) ? "selected" : ""; ?> ><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category</label>
                                                <select name="rack" class="form-control" required>
                                                    <?php if (empty($editproduct)) { ?> 
                                                        <option value="" selected disabled>Select Category first</option>
                                                    <?php } ?>
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


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 1</label>
                                                <?= $this->Form->input('product_name_one', ['value' => @$editproduct->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
                                                <?= $this->Form->input('product_name_two', ['value' => @$editproduct->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What is your height?</label>
                                                <div class="women-select-boxes">
                                                    <div class="women-select">
                                                        <select name="tall_feet" id="tall_feet">
                                                            <option <?php if (@$editproduct->tall_feet == '') { ?> selected=""<?php } ?> value="">--</option>
                                                            <option <?php if (@$editproduct->tall_feet == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                            <option <?php if (@$editproduct->tall_feet == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                            <option <?php if (@$editproduct->tall_feet == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="women-select">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option <?php if (@$editproduct->tall_inch == '') { ?> selected=""<?php } ?> value="">--</option>
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
                                                            <option <?php if (@$editproduct->tall_inch == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                        </select>
                                                        <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                    </div>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What is your weight?</label>
                                                <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What's your body type?</label>
                                                <select name="better_body_shape" class="form-control" aria-invalid="false">
                                                    <option <?php if (@$editproduct->better_body_shape == '') { ?> selected="" <?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '2') { ?> selected="" <?php } ?> value="2">Inverted Triangle</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '3') { ?> selected="" <?php } ?> value="3">Triangle</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '1') { ?> selected="" <?php } ?> value="1">Rectangle</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '4') { ?> selected="" <?php } ?> value="4">Hourglass</option>
                                                    <option <?php if (@$editproduct->better_body_shape == '5') { ?> selected="" <?php } ?> value="5">Apple</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Brand Name</label>
                                                <select name="brand_id" id="brand_id" class="form-control">
                                                    <option value="" disabled>--</option>
                                                    <?php
                                                    if ($this->request->session()->read('Auth.User.type') == 1) {
                                                        foreach ($brandsListings as $brandnm) {
                                                            ?>
                                                            <option <?php if ($brandnm['id'] == @$editproduct->brand_id) { ?> selected=""<?php } ?> value="<?php echo $brandnm['id']; ?>"><?php echo $brandnm['brand_name']; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <option  selected=""  value="<?php echo $this->request->session()->read('Auth.User.id'); ?>"><?php echo $this->request->session()->read('Auth.User.brand_name'); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Color ?</label>
                                                <select name="color" class="form-control">

                                                    <option <?php if (@$editproduct->color == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <?php foreach ($color_arr as $indx => $clr) { ?>
                                                        <option <?php if (@$editproduct->color == $indx) { ?> selected="" <?php } ?> value="<?= $indx; ?>"><?= $clr; ?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group" style="margin-top: 35px;">

                                                <label for="free_size_wo">
                                                    <input type="radio" name="primary_size" value="free_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'checked' : 'checked'; ?> id="free_size_wo"/>
                                                    Free Size
                                                </label>

                                            </div>
                                        </div>

                                        <div class="col-md-6 women-size-prefer">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What size you prefer?</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="paint_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'paint_size')) ? 'checked' : ''; ?> />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>PANTS</label>
                                                                <select name="pants" id="pants">
                                                                    <option <?php if (@$editproduct->pants == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option <?php if (@$editproduct->pants == '00') { ?> selected="" <?php } ?> value="00">00</option>
                                                                        <option <?php if (@$editproduct->pants == '00') { ?> selected="" <?php } ?> value="00">00</option>
                                                                        <option <?php if (@$editproduct->pants == '0') { ?> selected="" <?php } ?> value="0">0</option>
                                                                        <option <?php if (@$editproduct->pants == '2') { ?> selected="" <?php } ?> value="2">2</option>
                                                                        <option <?php if (@$editproduct->pants == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                                        <option <?php if (@$editproduct->pants == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                                        <option <?php if (@$editproduct->pants == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                                        <option <?php if (@$editproduct->pants == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                                        <option <?php if (@$editproduct->pants == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                                        <option <?php if (@$editproduct->pants == '14') { ?> selected="" <?php } ?> value="14">14</option>
                                                                        <option <?php if (@$editproduct->pants == '16') { ?> selected="" <?php } ?> value="16">16</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option <?php if (@$editproduct->pants == '14W') { ?> selected="" <?php } ?> value="14W">14W</option>
                                                                        <option <?php if (@$editproduct->pants == '16W') { ?> selected="" <?php } ?> value="16W">16W</option>
                                                                        <option <?php if (@$editproduct->pants == '18W') { ?> selected="" <?php } ?> value="18W">18W</option>
                                                                        <option <?php if (@$editproduct->pants == '20W') { ?> selected="" <?php } ?> value="20W">20W</option>
                                                                        <option <?php if (@$editproduct->pants == '22W') { ?> selected="" <?php } ?> value="22W">22W</option>
                                                                        <option <?php if (@$editproduct->pants == '24W') { ?> selected="" <?php } ?> value="24W">24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>BRA SIZE</label> 
                                                                <div class="row">
                                                                    <div class="col-md-1">
                                                                        <input type="radio" name="primary_size" value="bra_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'bra_size')) ? 'checked' : ''; ?> />
                                                                    </div>
                                                                    <div class="col-sm-4">                                                                        
                                                                        <select name="bra" id="bra">
                                                                            <option <?php if (@$editproduct->bra == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                            <option <?php if (@$editproduct->bra == '30') { ?> selected="" <?php } ?> value="30">30</option>
                                                                            <option <?php if (@$editproduct->bra == '32') { ?> selected="" <?php } ?> value="32">32</option>
                                                                            <option <?php if (@$editproduct->bra == '34') { ?> selected="" <?php } ?> value="34">34</option>
                                                                            <option <?php if (@$editproduct->bra == '36') { ?> selected="" <?php } ?> value="36">36</option>
                                                                            <option <?php if (@$editproduct->bra == '38') { ?> selected="" <?php } ?> value="38">38</option>
                                                                            <option <?php if (@$editproduct->bra == '40') { ?> selected="" <?php } ?> value="40">40</option>
                                                                            <option <?php if (@$editproduct->bra == '42') { ?> selected="" <?php } ?> value="42">42</option>
                                                                            <option <?php if (@$editproduct->bra == '44') { ?> selected="" <?php } ?> value="44">44</option>
                                                                            <option <?php if (@$editproduct->bra == '46') { ?> selected="" <?php } ?> value="46">46</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <select name="bra_recomend" id="bra_recomend">
                                                                            <option <?php if (@$editproduct->bra_recomend == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'AA') { ?> selected="" <?php } ?> value="AA">AA</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'A') { ?> selected="" <?php } ?> value="A">A</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'B') { ?> selected="" <?php } ?> value="B">B</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'C') { ?> selected="" <?php } ?> value="C">C</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'D') { ?> selected="" <?php } ?> value="D">D</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'DD') { ?> selected="" <?php } ?> value="DD">DD</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'DDD') { ?> selected="" <?php } ?> value="DDD">DDD</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'F') { ?> selected="" <?php } ?> value="F">F</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'G') { ?> selected="" <?php } ?> value="G">G</option>
                                                                            <option <?php if (@$editproduct->bra_recomend == 'H') { ?> selected="" <?php } ?> value="H">H</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="skirt_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'skirt_size')) ? 'checked' : ''; ?> />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>SKIRT SIZE</label>
                                                                <select name="skirt" id="skirt">
                                                                    <option <?php if (@$editproduct->skirt == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                    <option <?php if (@$editproduct->skirt == 'XXS') { ?> selected="" <?php } ?> value="XXS">XXS</option>
                                                                    <option <?php if (@$editproduct->skirt == 'XS') { ?> selected="" <?php } ?> value="XS">XS</option>
                                                                    <option <?php if (@$editproduct->skirt == 'S') { ?> selected="" <?php } ?> value="S">S</option>
                                                                    <option <?php if (@$editproduct->skirt == 'M') { ?> selected="" <?php } ?> value="M">M</option>
                                                                    <option <?php if (@$editproduct->skirt == 'L') { ?> selected="" <?php } ?> value="L">L</option>
                                                                    <option <?php if (@$editproduct->skirt == 'XL') { ?> selected="" <?php } ?> value="XL">XL</option>
                                                                    <option <?php if (@$editproduct->skirt == 'XXL') { ?> selected="" <?php } ?> value="XXL">XXL</option>
                                                                    <option <?php if (@$editproduct->skirt == '1X') { ?> selected="" <?php } ?> value="1X">1X</option>
                                                                    <option <?php if (@$editproduct->skirt == '2X') { ?> selected="" <?php } ?> value="2X">2X</option>
                                                                    <option <?php if (@$editproduct->skirt == '3X') { ?> selected="" <?php } ?> value="3X">3X</option>
                                                                    <option <?php if (@$editproduct->skirt == '4X') { ?> selected="" <?php } ?> value="4X">4X</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>JEANS SIZE</label>
                                                                <div class="col-md-1">
                                                                    <input type="radio" name="primary_size" value="jeans"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'jeans')) ? 'checked' : ''; ?> />
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <select name="jeans" id="jeans">
                                                                        <option <?php if (@$editproduct->jeans == '') { ?> selected="" <?php } ?> value="" selected="selected">--</option>
                                                                        <optgroup label="Women's Sizes">
                                                                            <option <?php if (@$editproduct->jeans == '00') { ?> selected="" <?php } ?> value="00">00</option>
                                                                            <option <?php if (@$editproduct->jeans == '0') { ?> selected="" <?php } ?> value="0">0</option>
                                                                            <option <?php if (@$editproduct->jeans == '2') { ?> selected="" <?php } ?> value="2">2</option>
                                                                            <option <?php if (@$editproduct->jeans == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                                            <option <?php if (@$editproduct->jeans == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                                            <option <?php if (@$editproduct->jeans == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                                            <option <?php if (@$editproduct->jeans == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                                            <option <?php if (@$editproduct->jeans == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                                            <option <?php if (@$editproduct->jeans == '14') { ?> selected="" <?php } ?> value="14">14</option>
                                                                            <option <?php if (@$editproduct->jeans == '16') { ?> selected="" <?php } ?> value="16">16</option>
                                                                        </optgroup>
                                                                        <optgroup label="Women's Plus Sizes">
                                                                            <option <?php if (@$editproduct->jeans == '14W') { ?> selected="" <?php } ?> value="14W">14W</option>
                                                                            <option <?php if (@$editproduct->jeans == '16W') { ?> selected="" <?php } ?> value="16W">16W</option>
                                                                            <option <?php if (@$editproduct->jeans == '18W') { ?> selected="" <?php } ?> value="18W">18W</option>
                                                                            <option <?php if (@$editproduct->jeans == '20W') { ?> selected="" <?php } ?> value="20W">20W</option>
                                                                            <option <?php if (@$editproduct->jeans == '22W') { ?> selected="" <?php } ?> value="22W">22W</option>
                                                                            <option <?php if (@$editproduct->jeans == '24W') { ?> selected="" <?php } ?> value="24W">24W</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label>ACTIVE WEAR SIZE</label>
                                                                <div class="col-md-1">
                                                                    <input type="radio" name="primary_size" value="active_wr"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'active_wr')) ? 'checked' : ''; ?> />
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <select name="active_wr" id="active_wr">
                                                                        <option <?php if (@$editproduct->active_wr == '') { ?> selected="" <?php } ?> value="" selected="selected">--</option>
                                                                        <option value="XXS" <?php if (@$editproduct->active_wr == "XXS") { ?> selected="selected"<?php } ?>>XXS</option>
                                                                        <option value="XS" <?php if (@$editproduct->active_wr == "XS") { ?> selected="selected"<?php } ?>>XS</option>
                                                                        <option value="S" <?php if (@$editproduct->active_wr == "S") { ?> selected="selected"<?php } ?>>S</option>
                                                                        <option value="M" <?php if (@$editproduct->active_wr == "M") { ?> selected="selected"<?php } ?>>M</option>
                                                                        <option value="L" <?php if (@$editproduct->active_wr == "L") { ?> selected="selected"<?php } ?>>L</option>
                                                                        <option value="XL" <?php if (@$editproduct->active_wr == "XL") { ?> selected="selected"<?php } ?>>XL</option>
                                                                        <option value="XXL" <?php if (@$editproduct->active_wr == "XXL") { ?> selected="selected"<?php } ?>>XXL</option>
                                                                        <option value="1X" <?php if (@$editproduct->active_wr == "1X") { ?> selected="selected"<?php } ?>>1X</option>
                                                                        <option value="2X" <?php if (@$editproduct->active_wr == "2X") { ?> selected="selected"<?php } ?>>2X</option>
                                                                        <option value="3X" <?php if (@$editproduct->active_wr == "3X") { ?> selected="selected"<?php } ?>>3X</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label>JACKET SIZE</label>
                                                                <div class="col-md-1">
                                                                    <input type="radio" name="primary_size" value="wo_jackect_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'wo_jackect_size')) ? 'checked' : ''; ?> />
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <select name="wo_jackect_size" id="wo_jackect_size">
                                                                        <option <?php if (@$editproduct->wo_jackect_size == '') { ?> selected="" <?php } ?> value="" selected="selected">--</option>
                                                                        <option value="XS(0-2)" <?php if (@$editproduct->wo_jackect_size == "XS(0-2)") { ?> selected="selected"<?php } ?> >XS(0-2)</option>
                                                                        <option value="S(2-4)" <?php if (@$editproduct->wo_jackect_size == "S(2-4)") { ?> selected="selected"<?php } ?> >S(2-4)</option>
                                                                        <option value="M(6-8)" <?php if (@$editproduct->wo_jackect_size == "M(6-8)") { ?> selected="selected"<?php } ?> >M(6-8)</option>
                                                                        <option value="L(10-12)" <?php if (@$editproduct->wo_jackect_size == "L(10-12)") { ?> selected="selected"<?php } ?> >L(10-12)</option>
                                                                        <option value="XL(14)" <?php if (@$editproduct->wo_jackect_size == "XL(14)") { ?> selected="selected"<?php } ?> >XL(14)</option>
                                                                        <option value="1X(14W-16W)" <?php if (@$editproduct->wo_jackect_size == "1X(14W-16W)") { ?> selected="selected"<?php } ?> >1X(14W-16W)</option>
                                                                        <option value="2X(18W-20W)" <?php if (@$editproduct->wo_jackect_size == "2X(18W-20W)") { ?> selected="selected"<?php } ?> >2X(18W-20W)</option>
                                                                        <option value="3X(22W-24W)" <?php if (@$editproduct->wo_jackect_size == "3X(22W-24W)") { ?> selected="selected"<?php } ?> >3X(22W-24W)</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label>BOTTOM SIZE</label>
                                                                <div class="col-md-1">
                                                                    <input type="radio" name="primary_size" value="wo_bottom"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'wo_bottom')) ? 'checked' : ''; ?> />
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <select name="wo_bottom" id="wo_bottom">
                                                                        <option <?php if (@$editproduct->wo_bottom == '') { ?> selected="" <?php } ?> value="" selected="selected">--</option>
                                                                        <option value="XS(0-2)" <?php if (@$editproduct->wo_bottom == "XS(0-2)") { ?> selected="selected"<?php } ?> >XS(0-2)</option>
                                                                        <option value="S(2-4)" <?php if (@$editproduct->wo_bottom == "S(2-4)") { ?> selected="selected"<?php } ?> >S(2-4)</option>
                                                                        <option value="M(6-8)" <?php if (@$editproduct->wo_bottom == "M(6-8)") { ?> selected="selected"<?php } ?> >M(6-8)</option>
                                                                        <option value="L(10-12)" <?php if (@$editproduct->wo_bottom == "L(10-12)") { ?> selected="selected"<?php } ?> >L(10-12)</option>
                                                                        <option value="XL(14)" <?php if (@$editproduct->wo_bottom == "XL(14)") { ?> selected="selected"<?php } ?> >XL(14)</option>
                                                                        <option value="1X(14W-16W)" <?php if (@$editproduct->wo_bottom == "1X(14W-16W)") { ?> selected="selected"<?php } ?> >1X(14W-16W)</option>
                                                                        <option value="2X(18W-20W)" <?php if (@$editproduct->wo_bottom == "2X(18W-20W)") { ?> selected="selected"<?php } ?> >2X(18W-20W)</option>
                                                                        <option value="3X(22W-24W)" <?php if (@$editproduct->wo_bottom == "3X(22W-24W)") { ?> selected="selected"<?php } ?> >3X(22W-24W)</option>
                                                                        <option value="4X(26W-28W)" <?php if (@$editproduct->wo_bottom == "4X(26W-28W)") { ?> selected="selected"<?php } ?> >4X(26W-28W)</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>DRESS</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="dress_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'dress_size')) ? 'checked' : ''; ?> />
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <select name="dress" id="dress">
                                                                    <option <?php if (@$editproduct->dress == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option <?php if (@$editproduct->dress == '2') { ?> selected="" <?php } ?> value="2">2</option>
                                                                        <option <?php if (@$editproduct->dress == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                                        <option <?php if (@$editproduct->dress == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                                        <option <?php if (@$editproduct->dress == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                                        <option <?php if (@$editproduct->dress == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                                        <option <?php if (@$editproduct->dress == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option <?php if (@$editproduct->dress == '14W') { ?> selected="" <?php } ?> value="14W">14W</option>
                                                                        <option <?php if (@$editproduct->dress == '16W') { ?> selected="" <?php } ?> value="16W">16W</option>
                                                                        <option <?php if (@$editproduct->dress == '18W') { ?> selected="" <?php } ?> value="18W">18W</option>
                                                                        <option <?php if (@$editproduct->dress == '20W') { ?> selected="" <?php } ?> value="20W">20W</option>
                                                                        <option <?php if (@$editproduct->dress == '22W') { ?> selected="" <?php } ?> value="22W">22W</option>
                                                                        <option <?php if (@$editproduct->dress == '24W') { ?> selected="" <?php } ?> value="24W">24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="dress_recomended" id="dress_recomended">
                                                                    <option <?php if (@$editproduct->dress_recomended == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                    <option <?php if (@$editproduct->dress_recomended == 'L (10-12)') { ?> selected="" <?php } ?> value="L (10-12)">L (10-12)</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option <?php if (@$editproduct->dress_recomended == 'XXS (00)') { ?> selected="" <?php } ?> value="XXS (00)">XXS (00)</option>
                                                                        <option <?php if (@$editproduct->dress_recomended == 'XS (0)') { ?> selected="" <?php } ?> value="XS (0)">XS (0)</option>
                                                                        <option <?php if (@$editproduct->dress_recomended == 'S (2-4)') { ?> selected="" <?php } ?> value="S (2-4)">S (2-4)</option>
                                                                        <option <?php if (@$editproduct->dress_recomended == 'M (6-8)') { ?> selected="" <?php } ?> value="M (6-8)">M (6-8)</option>
                                                                        <option <?php if (@$editproduct->dress_recomended == 'L (10-12)') { ?> selected="" <?php } ?> value="L (10-12)">L (10-12)</option>
                                                                        <option <?php if (@$editproduct->dress_recomended == 'XL (14)') { ?> selected="" <?php } ?> value="XL (14)">XL (14)</option>
                                                                        <option <?php if (@$editproduct->dress_recomended == 'XXL (16)') { ?> selected="" <?php } ?> value="XXL (16)">XXL (16)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option <?php if (@$editproduct->dress_recomended == '1X (14W-16W)') { ?> selected="" <?php } ?> value="1X (14W-16W)">1X (14W-16W)</option>
                                                                        <option <?php if (@$editproduct->dress_recomended == '2X (18W-20W)') { ?> selected="" <?php } ?> value="2X (18W-20W)">2X (18W-20W)</option>
                                                                        <option <?php if (@$editproduct->dress_recomended == '3X (22W-24W)') { ?> selected="" <?php } ?> value="3X (22W-24W)">3X (22W-24W)</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label>SHIRT & BLOUSE</label>
                                                        <div class="row">

                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="blouse_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'blouse_size')) ? 'checked' : ''; ?>  />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select name="shirt_blouse" id="shirt_blouse">
                                                                    <option <?php if (@$editproduct->shirt_blouse == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option <?php if (@$editproduct->shirt_blouse == '2') { ?> selected="" <?php } ?> value="2">2</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option <?php if (@$editproduct->shirt_blouse == '14W') { ?> selected="" <?php } ?> value="14W">14W</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '16W') { ?> selected="" <?php } ?> value="16W">16W</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '18W') { ?> selected="" <?php } ?> value="18W">18W</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '20W') { ?> selected="" <?php } ?> value="20W">20W</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '22W') { ?> selected="" <?php } ?> value="22W">22W</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse == '24W') { ?> selected="" <?php } ?> value="24W">24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="shirt_blouse_recomend" id="shirt_blouse_recomend ">
                                                                    <option <?php if (@$editproduct->shirt_blouse_recomend == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                    <optgroup label="Recommended for 2" style="display: block;">
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'S (2-4)') { ?> selected="" <?php } ?> value="S (2-4)">S (2-4)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'S (2-4)') { ?> selected="" <?php } ?> value="S (2-4)">S (2-4)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'XXS (00)') { ?> selected="" <?php } ?> value="XXS (00)">XXS (00)</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'XS (0)') { ?> selected="" <?php } ?> value="XS (0)">XS (0)</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'S (2-4)') { ?> selected="" <?php } ?> value="S (2-4)">S (2-4)</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'M (6-8)') { ?> selected="" <?php } ?> value="M (6-8)">M (6-8)</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'L (10-12)') { ?> selected="" <?php } ?> value="L (10-12)">L (10-12)</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'XL (14)') { ?> selected="" <?php } ?> value="XL (14)">XL (14)</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'XXL (16)') { ?> selected="" <?php } ?> value="XXL (16)">XXL (16)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == '1X (14W-16W)') { ?> selected="" <?php } ?> value="1X (14W-16W)">1X (14W-16W)</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == '2X (18W-20W)') { ?> selected="" <?php } ?> value="2X (18W-20W)">2X (18W-20W)</option>
                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == '3X (22W-24W)') { ?> selected="" <?php } ?> value="3X (22W-24W)">3X (22W-24W)</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label>TOP SIZE</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="top_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'top_size')) ? 'checked' : ''; ?> />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select name="pantsr1" id="pantsr1">
                                                                    <option <?php if (@$editproduct->pantsr1 == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '4.5') { ?> selected="" <?php } ?> value="4.5">4.5</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '5') { ?> selected="" <?php } ?> value="5">5</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '5.5') { ?> selected="" <?php } ?> value="5.5">5.5</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '6.5') { ?> selected="" <?php } ?> value="6.5">6.5</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '7') { ?> selected="" <?php } ?> value="7">7</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '7.5') { ?> selected="" <?php } ?> value="7.5">7.5</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                                    <option <?php if (@$editproduct->pantsr1 == '8.5') { ?> selected="" <?php } ?> value="8.5">8.5</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="pantsr2" id="pantsr2">
                                                                    <option <?php if (@$editproduct->pantsr2 == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                    <option <?php if (@$editproduct->pantsr2 == 'Narrow') { ?> selected="" <?php } ?> value="Narrow">Narrow</option>
                                                                    <option <?php if (@$editproduct->pantsr2 == 'Medium') { ?> selected="" <?php } ?> value="Medium">Medium</option>
                                                                    <option <?php if (@$editproduct->pantsr2 == 'Wide') { ?> selected="" <?php } ?> value="Wide">Wide</option>
                                                                    <option <?php if (@$editproduct->pantsr2 == 'Extra Wide') { ?> selected="" <?php } ?> value="Extra Wide">Extra Wide</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label for="wshoe_size"> &nbsp;&nbsp;&nbsp; </label>
                                                        <input type="radio" name="primary_size" value="wshoe_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'wshoe_size')) ? 'checked' : ''; ?> />
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="shoe_size"> What is your shoe size?</label>
                                                        <select name="shoe_size" id="shoe_size">
                                                            <option <?php if (@$editproduct->shoe_size == '') { ?> selected="" <?php } ?> value="">--</option>
                                                            <?php for ($si = 4; $si <= 13; $si = $si + 0.5) { ?><option <?php if (@$editproduct->shoe_size == $si) { ?> selected="" <?php } ?> value="<?= $si; ?>"><?= $si; ?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Which heel height do you prefer?</label>
                                                            <select name="womenHeelHightPrefer" id="womenHeelHightPrefer" aria-required="true" class="form-control" aria-invalid="false">
                                                                <option <?php if (@$editproduct->womenHeelHightPrefer == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                <option <?php if (@$editproduct->womenHeelHightPrefer == 'Flat(Under 1")') { ?> selected="" <?php } ?> value='Flat(Under 1")'>Flat(Under 1")</option>
                                                                <option <?php if (@$editproduct->womenHeelHightPrefer == 'Mid(2"-3")') { ?> selected="" <?php } ?> value='Mid(2"-3")'>Mid(2"-3")</option>
                                                                <option <?php if (@$editproduct->womenHeelHightPrefer == 'High(3"-4")') { ?> selected="" <?php } ?> value='High(3"-4")'>High(3"-4")</option>
                                                                <option <?php if (@$editproduct->womenHeelHightPrefer == 'Low(1"-2")') { ?> selected="" <?php } ?> value='Low(1"-2")'>Low(1"-2")</option>
                                                                <option <?php if (@$editproduct->womenHeelHightPrefer == 'Ultra High(4.5"+)') { ?> selected="" <?php } ?> value='Ultra High(4.5"+)'>Ultra High(4.5"+)</option>
                                                            </select>                                            

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <label for="exampleInputPassword1"> Which style of shoes ? </label>
                                                        <select name="shoe_size_run" class="form-control" aria-invalid="false">
                                                            <option <?php if (@$editproduct->shoe_size_run == '') { ?> selected="" <?php } ?> value="">--</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == 'Pumps') { ?> selected="" <?php } ?> value="Pumps">Pumps</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == 'Sandals') { ?> selected="" <?php } ?> value="Sandals">Sandals</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == 'Loafers & Flats') { ?> selected="" <?php } ?> value="Loafers & Flats">Loafers & Flats</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == 'Wedges') { ?> selected="" <?php } ?> value="Wedges">Wedges</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == 'Clogs & Mules') { ?> selected="" <?php } ?> value="Clogs & Mules">Clogs & Mules</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == 'Sneakers') { ?> selected="" <?php } ?> value="Sneakers">Sneakers</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == 'Boots & Booties') { ?> selected="" <?php } ?> value="Boots & Booties">Boots & Booties</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == 'Platforms') { ?> selected="" <?php } ?> value="Platforms">Platforms</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Style Inspiration</label>
                                                <select name="wo_style_insp" class="form-control">
                                                    <option <?php if (@$editproduct->wo_style_insp == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_style_insp == '1') { ?> selected="" <?php } ?> value="1">Bohemian</option>
                                                    <option <?php if (@$editproduct->wo_style_insp == '2') { ?> selected="" <?php } ?> value="2">Casual</option>
                                                    <option <?php if (@$editproduct->wo_style_insp == '3') { ?> selected="" <?php } ?> value="3">Classic</option>
                                                    <option <?php if (@$editproduct->wo_style_insp == '4') { ?> selected="" <?php } ?> value="4">Edgy</option>
                                                    <option <?php if (@$editproduct->wo_style_insp == '5') { ?> selected="" <?php } ?> value="5">Trendy</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Dress length</label>
                                                <select name="wo_dress_length" id="wo_dress_length">
                                                    <option <?php if (@$editproduct->wo_dress_length == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_dress_length == '1') { ?> selected="" <?php } ?> value="1">Mini</option>
                                                    <option <?php if (@$editproduct->wo_dress_length == '2') { ?> selected="" <?php } ?> value="2">Short</option>
                                                    <option <?php if (@$editproduct->wo_dress_length == '3') { ?> selected="" <?php } ?> value="3">Midi</option>
                                                    <option <?php if (@$editproduct->wo_dress_length == '4') { ?> selected="" <?php } ?> value="4">Maxi</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Top half</label>
                                                <select name="wo_top_half" class="form-control">
                                                    <option <?php if (@$editproduct->wo_top_half == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_top_half == '1') { ?> selected="" <?php } ?> value="1">Fitted</option>
                                                    <option <?php if (@$editproduct->wo_top_half == '2') { ?> selected="" <?php } ?> value="2">Straight</option>
                                                    <option <?php if (@$editproduct->wo_top_half == '3') { ?> selected="" <?php } ?> value="3">Loose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pant Length</label>
                                                <select name="wo_pant_length" >
                                                    <option <?php if (@$editproduct->wo_pant_length == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_pant_length == '1') { ?> selected="" <?php } ?> value="1">Ankle</option>
                                                    <option <?php if (@$editproduct->wo_pant_length == '2') { ?> selected="" <?php } ?> value="2">Regular</option>
                                                    <option <?php if (@$editproduct->wo_pant_length == '3') { ?> selected="" <?php } ?> value="3">Long</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pant Rise</label>
                                                <select name="wo_pant_rise" class="form-control">
                                                    <option <?php if (@$editproduct->wo_pant_rise == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_pant_rise == '1') { ?> selected="" <?php } ?> value="1">Low Rise</option>
                                                    <option <?php if (@$editproduct->wo_pant_rise == '2') { ?> selected="" <?php } ?> value="2">Mid Raise</option>
                                                    <option <?php if (@$editproduct->wo_pant_rise == '3') { ?> selected="" <?php } ?> value="3">High Raise</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pant Style</label>
                                                <select name="wo_pant_style" >
                                                    <option <?php if (@$editproduct->wo_pant_style == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_pant_style == '1') { ?> selected="" <?php } ?> value="1">Skinny</option>
                                                    <option <?php if (@$editproduct->wo_pant_style == '2') { ?> selected="" <?php } ?> value="2">Straight</option>
                                                    <option <?php if (@$editproduct->wo_pant_style == '3') { ?> selected="" <?php } ?> value="3">Bootcut</option>
                                                    <option <?php if (@$editproduct->wo_pant_style == '4') { ?> selected="" <?php } ?> value="4">Relaxed</option>
                                                    <option <?php if (@$editproduct->wo_pant_style == '5') { ?> selected="" <?php } ?> value="5">Wide Leg</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Appare type</label>
                                                <select name="wo_appare" class="form-control">
                                                    <option <?php if (@$editproduct->wo_appare == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_appare == '1') { ?> selected="" <?php } ?> value="1">Dresses / jumpsuits</option>
                                                    <option <?php if (@$editproduct->wo_appare == '2') { ?> selected="" <?php } ?> value="2">Tops</option>
                                                    <option <?php if (@$editproduct->wo_appare == '3') { ?> selected="" <?php } ?> value="3">Bottoms</option>
                                                    <option <?php if (@$editproduct->wo_appare == '4') { ?> selected="" <?php } ?> value="4">Denim</option>
                                                    <option <?php if (@$editproduct->wo_appare == '5') { ?> selected="" <?php } ?> value="5">Sweaters</option>
                                                    <option <?php if (@$editproduct->wo_appare == '6') { ?> selected="" <?php } ?> value="6">Jackets</option>
                                                    <option <?php if (@$editproduct->wo_appare == '7') { ?> selected="" <?php } ?> value="7">Accessories</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bottoms type</label>
                                                <select name="wo_bottom_style" >
                                                    <option <?php if (@$editproduct->wo_bottom_style == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_bottom_style == '1') { ?> selected="" <?php } ?> value="1">Skirts</option>
                                                    <option <?php if (@$editproduct->wo_bottom_style == '2') { ?> selected="" <?php } ?> value="2">Striped Shorts</option>
                                                    <option <?php if (@$editproduct->wo_bottom_style == '3') { ?> selected="" <?php } ?> value="3">Capri Jeans</option>
                                                    <option <?php if (@$editproduct->wo_bottom_style == '4') { ?> selected="" <?php } ?> value="4">Cargo Pant</option>
                                                    <option <?php if (@$editproduct->wo_bottom_style == '5') { ?> selected="" <?php } ?> value="5">Checked Pant</option>
                                                    <option <?php if (@$editproduct->wo_bottom_style == '6') { ?> selected="" <?php } ?> value="6">Palazzo</option>
                                                    <option <?php if (@$editproduct->wo_bottom_style == '7') { ?> selected="" <?php } ?> value="7">Denim Shorts</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Top type</label>
                                                <select name="wo_top_style" class="form-control">
                                                    <option <?php if (@$editproduct->wo_top_style == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_top_style == '1') { ?> selected="" <?php } ?> value="1">Sleevelss</option>
                                                    <option <?php if (@$editproduct->wo_top_style == '2') { ?> selected="" <?php } ?> value="2">Shorts Sleeve</option>
                                                    <option <?php if (@$editproduct->wo_top_style == '3') { ?> selected="" <?php } ?> value="3">Long Sleeve</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!--- need to check if user not picked --->
                                                <label for="exampleInputPassword1">Patterns type</label>
                                                <select name="wo_patterns" >
                                                    <option <?php if (@$editproduct->wo_patterns == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->wo_patterns == '1') { ?> selected="" <?php } ?> value="1">Lace</option>
                                                    <option <?php if (@$editproduct->wo_patterns == '2') { ?> selected="" <?php } ?> value="2">Animal Print</option>
                                                    <option <?php if (@$editproduct->wo_patterns == '3') { ?> selected="" <?php } ?> value="3">Tribal</option>
                                                    <option <?php if (@$editproduct->wo_patterns == '4') { ?> selected="" <?php } ?> value="4">Polak Dot</option>
                                                    <option <?php if (@$editproduct->wo_patterns == '5') { ?> selected="" <?php } ?> value="5">Stripes</option>
                                                    <option <?php if (@$editproduct->wo_patterns == '6') { ?> selected="" <?php } ?> value="6">Floral</option>

                                                </select>                                         
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
                                                <label for="exampleInputPassword1">TOPS</label>
                                                <input type="radio" name="budget_type" value="wo_top_budg" <?php if ((@$editproduct->budget_type == "wo_top_budg")) { ?> checked <?php } ?>>
                                                <select name="wo_top_budg" class="form-control" style="width: 85%;">
                                                    <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="NULL" <?php } ?> value="">--</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $50</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$50 - $75</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$75 - $100</option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$100 - $125</option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$125+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">BOTTOMS</label>
                                                <input type="radio" name="budget_type" value="wo_bottoms_budg" <?php if ((@$editproduct->budget_type == "wo_bottoms_budg")) { ?> checked <?php } ?>>
                                                <select name="wo_bottoms_budg" class="form-control" style="width: 85%;">
                                                    <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="NULL" <?php } ?> value="">--</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $30</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$30 - $50</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$50 - $70</option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$70 - $90</option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$90+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">OUTERWEAR</label>
                                                <input type="radio" name="budget_type" value="wo_outerwear_budg"  <?php if ((@$editproduct->budget_type == "wo_outerwear_budg")) { ?> checked <?php } ?>>
                                                <select name="wo_outerwear_budg" class="form-control" style="width:85%;">
                                                    <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="NULL" <?php } ?> value="">--</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $50</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$50 - $75</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$75 - $100</option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$100 - $125</option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$125+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">JEANS</label>
                                                <input type="radio" name="budget_type" value="wo_jeans_budg"  <?php if ((@$editproduct->budget_type == "wo_jeans_budg")) { ?> checked <?php } ?>>
                                                <select name="wo_jeans_budg" class="form-control"  style="width:85%;">
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75 </option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $100 </option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$100 - $125 </option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$125 - $175 </option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$175+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">JEWELRY</label>
                                                <input type="radio" name="budget_type" value="wo_jewelry_budg"  <?php if ((@$editproduct->budget_type == "wo_jewelry_budg")) { ?> checked <?php } ?>>
                                                <select name="wo_jewelry_budg" class="form-control" style="width:85%;">
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $40</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$40 - $60</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$60 - $80 </option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$80 - $100</option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$100+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ACCESSORIES</label>
                                                <input type="radio" name="budget_type" value="wo_accessories_budg" <?php if ((@$editproduct->budget_type == "wo_accessories_budg")) { ?> checked <?php } ?>>
                                                <select name="wo_accessories_budg" class="form-control" style="width:85%;">
                                                    <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75 </option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $125 </option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$125 - $175 </option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$175 - $250 </option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$250+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">DRESS</label>
                                                <input type="radio" name="budget_type" value="wo_dress_budg"  <?php if ((@$editproduct->budget_type == "wo_dress_budg")) { ?> checked <?php } ?>>
                                                <select name="wo_dress_budg" class="form-control" style="width:85%;">
                                                    <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75 </option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $125 </option>
                                                    <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$125 - $175 </option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$175 - $250 </option> 
                                                    <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$250+</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tell us your skin Tone?</label>
                                                <select name="skin_tone" class="form-control">



                                                    <option <?php if (@$editproduct->skin_tone == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->skin_tone == '1') { ?> selected="" <?php } ?> value="1">IndianRed</option>
                                                    <option <?php if (@$editproduct->skin_tone == '2') { ?> selected="" <?php } ?> value="2">DarkSalmon</option>
                                                    <option <?php if (@$editproduct->skin_tone == '3') { ?> selected="" <?php } ?> value="3">LightSalmon</option>
                                                    <option <?php if (@$editproduct->skin_tone == '4') { ?> selected="" <?php } ?> value="4">DarkRed</option>
                                                    <option <?php if (@$editproduct->skin_tone == '5') { ?> selected="" <?php } ?> value="5">Extra Wide</option>
                                                    <option <?php if (@$editproduct->skin_tone == '6') { ?> selected="" <?php } ?> value="6">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shoulders?</label>
                                                <select name="proportion_shoulders" id="proportion_shoulders">
                                                    <option <?php if (@$editproduct->proportion_shoulders == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <optgroup label="Women's Sizes">
                                                        <option <?php if (@$editproduct->proportion_shoulders == '00') { ?> selected="" <?php } ?> value="00">00</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '0') { ?> selected="" <?php } ?> value="0">0</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '2') { ?> selected="" <?php } ?> value="2">2</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '14') { ?> selected="" <?php } ?> value="14">14</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '16') { ?> selected="" <?php } ?> value="16">16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option <?php if (@$editproduct->proportion_shoulders == '14W') { ?> selected="" <?php } ?> value="14W">14W</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '16W') { ?> selected="" <?php } ?> value="16W">16W</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '18W') { ?> selected="" <?php } ?> value="18W">18W</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '20W') { ?> selected="" <?php } ?> value="20W">20W</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '22W') { ?> selected="" <?php } ?> value="22W">22W</option>
                                                        <option <?php if (@$editproduct->proportion_shoulders == '24W') { ?> selected="" <?php } ?> value="24W">24W</option>
                                                    </optgroup>
                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Legs?</label>
                                                <select name="proportion_legs" id="proportion_legs">
                                                    <option <?php if (@$editproduct->proportion_legs == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '30') { ?> selected="" <?php } ?> value="30">30</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '32') { ?> selected="" <?php } ?> value="32">32</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '34') { ?> selected="" <?php } ?> value="34">34</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '36') { ?> selected="" <?php } ?> value="36">36</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '38') { ?> selected="" <?php } ?> value="38">38</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '40') { ?> selected="" <?php } ?> value="40">40</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '42') { ?> selected="" <?php } ?> value="42">42</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '44') { ?> selected="" <?php } ?> value="44">44</option>
                                                    <option <?php if (@$editproduct->proportion_legs == '46') { ?> selected="" <?php } ?> value="46">46</option>
                                                </select>                                         
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Arms?</label>
                                                <select name="proportion_arms" id="proportion_arms">
                                                    <option <?php if (@$editproduct->proportion_arms == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <option <?php if (@$editproduct->proportion_arms == 'XXS') { ?> selected="" <?php } ?> value="XXS">XXS</option>
                                                    <option <?php if (@$editproduct->proportion_arms == 'XS') { ?> selected="" <?php } ?> value="XS">XS</option>
                                                    <option <?php if (@$editproduct->proportion_arms == 'S') { ?> selected="" <?php } ?> value="S">S</option>
                                                    <option <?php if (@$editproduct->proportion_arms == 'M') { ?> selected="" <?php } ?> value="M">M</option>
                                                    <option <?php if (@$editproduct->proportion_arms == 'L') { ?> selected="" <?php } ?> value="L">L</option>
                                                    <option <?php if (@$editproduct->proportion_arms == 'XL') { ?> selected="" <?php } ?> value="XL">XL</option>
                                                    <option <?php if (@$editproduct->proportion_arms == 'XXL') { ?> selected="" <?php } ?> value="XXL">XXL</option>
                                                    <option <?php if (@$editproduct->proportion_arms == '1X') { ?> selected="" <?php } ?> value="1X">1X</option>
                                                    <option <?php if (@$editproduct->proportion_arms == '2X') { ?> selected="" <?php } ?> value="2X">2X</option>
                                                    <option <?php if (@$editproduct->proportion_arms == '3X') { ?> selected="" <?php } ?> value="3X">3X</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Hips ?</label>
                                                <select name="proportion_hips" id="jeans">
                                                    <option value="">--</option>
                                                    <optgroup label="Women's Sizes"> 
                                                        <option <?php if (@$editproduct->proportion_hips == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '00') { ?> selected="" <?php } ?> value="00">00</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '0') { ?> selected="" <?php } ?> value="0">0</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '2') { ?> selected="" <?php } ?> value="2">2</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '14') { ?> selected="" <?php } ?> value="14">14</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '16') { ?> selected="" <?php } ?> value="16">16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option <?php if (@$editproduct->proportion_hips == '14W') { ?> selected="" <?php } ?> value="14W">14W</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '16W') { ?> selected="" <?php } ?> value="16W">16W</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '18W') { ?> selected="" <?php } ?> value="18W">18W</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '20W') { ?> selected="" <?php } ?> value="20W">20W</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '22W') { ?> selected="" <?php } ?> value="22W">22W</option>
                                                        <option <?php if (@$editproduct->proportion_hips == '24W') { ?> selected="" <?php } ?> value="24W">24W</option>
                                                    </optgroup>
                                                </select>                                          
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?</label>
                                                <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">sale_price ?</label>
                                                <?= $this->Form->input('sale_price', ['value' => @$editproduct->sale_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <?php if (empty($editproduct)) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Quantity ?</label>
                                                    <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                                </div>
                                            </div>

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
                                                <label for="exampleInputPassword1">Product Image <span style="color:red;font-weight: 400;">20 Kb ( PNG, JPG ,JPEG)</span></label>

                                                <?php if (@$editproduct->product_image) { ?>
                                                    <div class="form-group">                                                        
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/Women/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } else { ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>                                        

                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                <?php } ?>  
                                                <div id="imagePreview"></div>                           
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (@$profile == 'BoyKids') { ?>
                                <div class="tab-content boy-kid-select" style="width: 100%;float: left;">
                                    <?= $this->Form->input('profile_type', ['value' => '3', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Category</label>
                                                <select name="product_type" class="form-control"  onchange="getSubCatg(this.value);">
                                                    <option value="" selected disabled>Select Category</option>
                                                    <?php foreach ($productType as $type) { ?>
                                                        <option  value="<?php echo $type->id; ?>" <?php echo (!empty($editproduct) && ($editproduct->product_type == $type->id)) ? "selected" : ""; ?> ><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category</label>
                                                <select name="rack" class="form-control" required>
                                                    <?php if (empty($editproduct)) { ?> 
                                                        <option value="" selected disabled>Select Category first</option>
                                                    <?php } ?>
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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 1</label>
                                                <?= $this->Form->input('product_name_one', ['value' => @$editproduct->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
                                                <?= $this->Form->input('product_name_two', ['value' => @$editproduct->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Height?</label>
                                                <div class="boy-kid-select-boxes">
                                                    <div class="boy-kid-select-box">
                                                        <select name="tall_feet" id="tall_feet">
                                                            <option <?php if (@$editproduct->tall_feet == '') { ?> selected=""<?php } ?> value="">--</option>
                                                            <option <?php if (@$editproduct->tall_feet == '1') { ?> selected=""<?php } ?>value="1">1</option>
                                                            <option <?php if (@$editproduct->tall_feet == '2') { ?> selected=""<?php } ?>value="2">2</option>
                                                            <option <?php if (@$editproduct->tall_feet == '3') { ?> selected=""<?php } ?>value="3">3</option>
                                                            <option <?php if (@$editproduct->tall_feet == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                            <option <?php if (@$editproduct->tall_feet == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                            <option <?php if (@$editproduct->tall_feet == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="boy-kid-select-box">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option <?php if (@$editproduct->tall_inch == '') { ?> selected=""<?php } ?> value="">--</option>
                                                            <option <?php if (@$editproduct->tall_inch == '0') { ?> selected=""<?php } ?> value="0">0</option>
                                                            <option <?php if (@$editproduct->tall_inch == '1') { ?> selected=""<?php } ?> value="1">1</option>
                                                            <option <?php if (@$editproduct->tall_inch == '2') { ?> selected=""<?php } ?> value="2">2</option>
                                                            <option <?php if (@$editproduct->tall_inch == '3') { ?> selected=""<?php } ?> value="3">3</option>
                                                            <option <?php if (@$editproduct->tall_inch == '4') { ?> selected=""<?php } ?> value="4">4</option>
                                                            <option <?php if (@$editproduct->tall_inch == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                            <option <?php if (@$editproduct->tall_inch == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                            <option <?php if (@$editproduct->tall_inch == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                            <option <?php if (@$editproduct->tall_inch == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                            <option <?php if (@$editproduct->tall_inch == '9') { ?> selected=""<?php } ?> value="9">9</option>
                                                            <option <?php if (@$editproduct->tall_inch == '10') { ?> selected=""<?php } ?>value="10">10</option>
                                                            <option <?php if (@$editproduct->tall_inch == '11') { ?> selected=""<?php } ?>value="11">11</option>
                                                            <option <?php if (@$editproduct->tall_inch == '12') { ?> selected=""<?php } ?>value="12">12</option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Weight ?</label>
                                                <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Color ?</label>
                                                <select name="color" class="form-control">

                                                    <option <?php if (@$editproduct->color == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <?php foreach ($color_arr as $indx => $clr) { ?>
                                                        <option <?php if (@$editproduct->color == $indx) { ?> selected="" <?php } ?> value="<?= $indx; ?>"><?= $clr; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group" style="margin-top: 35px;">

                                                <label for="free_size_wo">
                                                    <input type="radio" name="primary_size" value="free_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'checked' : 'checked'; ?> id="free_size_wo"/>
                                                    Free Size
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="exampleInputPassword1">TOPS SIZE?</label>
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="top_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'top_size')) ? 'checked' : ''; ?> >
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="top_size" id="top_size">
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
                                                        </optgroup>
                                                    </select>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">BOTTOMS SIZE</label>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <input type="radio" name="primary_size" value="bottom_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'bottom_size')) ? 'checked' : ''; ?> >
                                                    </div>
                                                    <div class="col-md-11">
                                                        <select name="bottom_size" id="bottom_size">
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
                                                            </optgroup>
                                                        </select>
                                                    </div>                            
                                                </div>                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Body shape?</label>
                                                <select name="kid_body_shape" id="kid_body_shape">
                                                    <option <?php if (@$editproduct->kid_body_shape == 'NULL') { ?> selected=""<?php } ?> value="NULL">--</option>
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
                                                    <option <?php if (@$editproduct->wo_patterns == 'NULL') { ?> selected=""<?php } ?> value="NULL">--</option>
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
                                                <label for="exampleInputPassword1">Brand Name</label>
                                                <select name="brand_id" id="brand_id" class="form-control">
                                                    <option value="" disabled>--</option>
                                                    <?php
                                                    if ($this->request->session()->read('Auth.User.type') == 1) {
                                                        foreach ($brandsListings as $brandnm) {
                                                            ?>
                                                            <option <?php if ($brandnm['id'] == @$editproduct->brand_id) { ?> selected=""<?php } ?> value="<?php echo $brandnm['id']; ?>"><?php echo $brandnm['brand_name']; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <option  selected=""  value="<?php echo $this->request->session()->read('Auth.User.id'); ?>"><?php echo $this->request->session()->read('Auth.User.brand_name'); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?</label>
                                                <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">sale_price ?</label>
                                                <?= $this->Form->input('sale_price', ['value' => @$editproduct->sale_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <?php if (empty($editproduct)) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Quantity ?</label>
                                                    <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
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
                                                <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image  <span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

                                                <?php if (@$editproduct->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/BoyKids/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } else { ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>

                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                <?php } ?>  
                                                <div id="imagePreview"></div>                          
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (@$profile == 'GirlKids') { ?>
                                <div class="tab-content boy-kid-select" style="width: 100%;float: left;">
                                    <?= $this->Form->input('profile_type', ['value' => '4', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Category</label>
                                                <select name="product_type" class="form-control"  onchange="getSubCatg(this.value);">
                                                    <option value="" selected disabled>Select Category</option>
                                                    <?php foreach ($productType as $type) { ?>
                                                        <option  value="<?php echo $type->id; ?>" <?php echo (!empty($editproduct) && ($editproduct->product_type == $type->id)) ? "selected" : ""; ?> ><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category</label>
                                                <select name="rack" class="form-control" required>
                                                    <?php if (empty($editproduct)) { ?> 
                                                        <option value="" selected disabled>Select Category first</option>
                                                    <?php } ?>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 1</label>
                                                <?= $this->Form->input('product_name_one', ['value' => @$editproduct->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
                                                <?= $this->Form->input('product_name_two', ['value' => @$editproduct->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Height?</label>
                                                <div class="boy-kid-select-boxes">
                                                    <div class="boy-kid-select-box">
                                                        <select name="tall_feet" id="tall_feet">
                                                            <option <?php if (@$editproduct->tall_feet == '') { ?> selected=""<?php } ?> value="">--</option>
                                                            <option <?php if (@$editproduct->tall_feet == '1') { ?> selected=""<?php } ?>value="1">1</option>
                                                            <option <?php if (@$editproduct->tall_feet == '2') { ?> selected=""<?php } ?> value="2">2</option>
                                                            <option <?php if (@$editproduct->tall_feet == '3') { ?> selected=""<?php } ?> value="3">3</option>
                                                            <option <?php if (@$editproduct->tall_feet == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                            <option <?php if (@$editproduct->tall_feet == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                            <option <?php if (@$editproduct->tall_feet == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="boy-kid-select-box">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option <?php if (@$editproduct->tall_inch == '0') { ?> selected=""<?php } ?> value="0">--</option>
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
                                                            <option <?php if (@$editproduct->tall_inch == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Weight ?</label>
                                                <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Color ?</label>
                                                <select name="color" class="form-control">

                                                    <option <?php if (@$editproduct->color == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>
                                                    <?php foreach ($color_arr as $indx => $clr) { ?>
                                                        <option <?php if (@$editproduct->color == $indx) { ?> selected="" <?php } ?> value="<?= $indx; ?>"><?= $clr; ?></option>
                                                    <?php } ?>    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group" style="margin-top: 35px;">

                                                <label for="free_size_wo">
                                                    <input type="radio" name="primary_size" value="free_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'checked' : 'checked'; ?> id="free_size_wo"/>
                                                    Free Size
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TOPS SIZE?</label>
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="top_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'top_size')) ? 'checked' : ''; ?> >
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="top_size" id="top_size">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">BOTTOMS SIZE</label>
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="bottom_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'bottom_size')) ? 'checked' : ''; ?> >
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="bottom_size" id="bottom_size">
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
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Body shape?</label>
                                                <select name="kid_body_shape" id="kid_body_shape">
                                                    <option <?php if (@$editproduct->kid_body_shape == 'NULL') { ?> selected=""<?php } ?> value="NULL">--</option>
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
                                                    <option <?php if (@$editproduct->wo_patterns == 'NULL') { ?> selected=""<?php } ?> value="NULL">--</option>
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
                                                <label for="exampleInputPassword1">Brand Name</label>
                                                <select name="brand_id" id="brand_id" class="form-control">
                                                    <option value="" disabled>--</option>
                                                    <?php
                                                    if ($this->request->session()->read('Auth.User.type') == 1) {
                                                        foreach ($brandsListings as $brandnm) {
                                                            ?>
                                                            <option <?php if ($brandnm['id'] == @$editproduct->brand_id) { ?> selected=""<?php } ?> value="<?php echo $brandnm['id']; ?>"><?php echo $brandnm['brand_name']; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <option  selected=""  value="<?php echo $this->request->session()->read('Auth.User.id'); ?>"><?php echo $this->request->session()->read('Auth.User.brand_name'); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?</label>
                                                <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">sale_price ?</label>
                                                <?= $this->Form->input('sale_price', ['value' => @$editproduct->sale_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <?php if (empty($editproduct)) { ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Quantity ?</label>
                                                    <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
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
                                                <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image  <span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

                                                <?php if (@$editproduct->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/GirlKids/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } else { ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>                                        


                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                <?php } ?> 
                                                <div id="imagePreview"></div>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php /* if (@$profile == 'Men' || @$profile == '') { ?>
        <section class="content">


            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php if (@$utype == '1') { ?>
                                            <th>Brand Name</th>
                                        <?php } ?>
                                        <th>Product Name 1</th>
                                        <th>Product Name 2</th>
                                        <th>Product Image</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Purchse Price</th>
                                        <th>Sale Price</th>
                                        <th>Quantity</th>
                                        <th>Style.no</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($menproductdetails as $pdetails): ?>

                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">
                                            <?php if (@$utype == '1') { ?>
                                                <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>
                                            <?php } ?>
        <!-- <td><?php echo $pdetails->user_id ?></td> -->
                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td><?php echo $pdetails->product_name_two; ?></td>
                                            <td>
                                                <?php
                                                //echo  $pdetails->prodcut_id;

                                                if (empty($pdetails->prodcut_id)) {
                                                    ?>
                                                    <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php } else { ?>
                                                    <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->picked_size)) {
                                                    $li_size = explode('-', $pdetails->picked_size);
                                                    foreach ($li_size as $sz_l) {
                                                        echo!empty($pdetails->$sz_l) ? $pdetails->$sz_l . '&nbsp;&nbsp;' : '';
                                                    }
                                                }
                                                if (!empty($pdetails->primary_size) && ($pdetails->primary_size == 'free_size')) {
                                                    echo "Free Size";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->color)) {
                                                    echo $color_arr[$pdetails->color];
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $pdetails->purchase_price; ?></td>
                                            <td><?php echo $pdetails->sale_price; ?></td>
                                            <td><?php echo $this->Custom->productQuantity($pdetails->prod_id); ?></td>
                                            <td><?php echo $pdetails->dtls; ?></td>
                                            <td style="text-align: center;">

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list')), ['action' => 'listProduct', $pdetails->prod_id], ['escape' => false, "data-placement" => "top", "data-hint" => "View all products", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                <a href="<?= HTTP_ROOT . "appadmins/all_barcode_prints/" . $pdetails->prod_id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>



                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalproduct-' . $pdetails->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', 'Men', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'productDelete', $pdetails->id, 'InProducts', $profile], ['escape' => false, "data-placement" => "top", "data-hint" => "Product Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>

                                                <?php if ($pdetails->available_status == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/InProducts'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/InProducts'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <div class="modal fade" id="myModalproduct-<?php echo $pdetails->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<?php echo $pdetails->id; ?>" aria-hidden="true">
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
                                                                What is your height?  : <?php echo $pdetails->tall_feet . '.' . $pdetails->tall_inch; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Best Fit for Weight ? : <?php echo $pdetails->best_fit_for_weight; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Best Size Fit ?  : 
                                                                <?php
                                                                echo $pdetails->best_size_fit;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Waist size? : <?php echo $pdetails->waist_size . ' :-'; ?>
                                                                <?php
                                                                echo $pdetails->waist_size_run;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Shirt size?  : 
                                                                <?php
                                                                echo $pdetails->shirt_size;
                                                                ?>
                                                                :-
                                                                <?php
                                                                echo $pdetails->shirt_size_run;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Bottom size? : 
                                                                <?php
                                                                echo $pdetails->men_bottom;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Inseam size? : 
                                                                <?php
                                                                echo $pdetails->inseam_size;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Shoe size?  : 
                                                                <?php
                                                                echo $pdetails->shoe_size;
                                                                ?>
                                                                :-
                                                                <?php
                                                                echo $pdetails->shoe_size_run;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Better body Shape ? : 
                                                                <?php
                                                                if ($pdetails->better_body_shape == '2') {
                                                                    echo 'Rectangle';
                                                                }
                                                                if ($pdetails->better_body_shape == '3') {
                                                                    echo 'Triangle';
                                                                }
                                                                if ($pdetails->better_body_shape == '1') {
                                                                    echo 'Trapezoid';
                                                                }
                                                                if ($pdetails->better_body_shape == '4') {
                                                                    echo 'Oval';
                                                                }
                                                                if ($pdetails->better_body_shape == '5') {
                                                                    echo 'Inverted Triangle';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                For Better Skin tone ?  : 
                                                                <?php
                                                                if ($pdetails->skin_tone == '1') {
                                                                    echo 'IndianRed';
                                                                }
                                                                if ($pdetails->skin_tone == '2') {
                                                                    echo 'DarkSalmon';
                                                                }
                                                                if ($pdetails->skin_tone == '3') {
                                                                    echo 'LightSalmon';
                                                                }
                                                                if ($pdetails->skin_tone == '4') {
                                                                    echo 'DarkRed';
                                                                }
                                                                if ($pdetails->skin_tone == '5') {
                                                                    echo 'Extra Wide';
                                                                }
                                                                if ($pdetails->skin_tone == '6') {
                                                                    echo 'Other';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Typically wear to work ? : 
                                                                <?php
                                                                if ($pdetails->work_type == '1') {
                                                                    echo 'Casual';
                                                                }
                                                                if ($pdetails->work_type == '2') {
                                                                    echo 'Business Casual';
                                                                }
                                                                if ($pdetails->work_type == '3') {
                                                                    echo 'Formal';
                                                                }
                                                                // if ($pdetails->work_type == '4') {
                                                                 // echo 'Oval';
                                                                 // }
                                                                 // if ($pdetails->work_type == '5') {
                                                                 // echo 'Inverted Triangle';
                                                                 // } 
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Casual shirts to fit ?  : 
                                                                <?php
                                                                if ($pdetails->casual_shirts_type == '4') {
                                                                    echo 'Slim';
                                                                }
                                                                if ($pdetails->casual_shirts_type == '5') {
                                                                    echo 'Regular';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Bottom up shirt to fit ? : 
                                                                <?php
                                                                if ($pdetails->casual_shirts_type == '6') {
                                                                    echo 'Slim';
                                                                }
                                                                if ($pdetails->casual_shirts_type == '7') {
                                                                    echo 'Regular';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Jeans to Fit ?  : 
                                                                <?php
                                                                if ($pdetails->jeans_Fit == '3') {
                                                                    echo 'Straight';
                                                                }
                                                                if ($pdetails->jeans_Fit == '2') {
                                                                    echo 'Slim';
                                                                }
                                                                if ($pdetails->jeans_Fit == '1') {
                                                                    echo 'Skinny';
                                                                }
                                                                if ($pdetails->jeans_Fit == '4') {
                                                                    echo 'Relaxed';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Shorts long ? : 
                                                                <?php
                                                                if ($pdetails->shorts_long == '4') {
                                                                    echo 'Upper Thigh';
                                                                }
                                                                if ($pdetails->shorts_long == '3') {
                                                                    echo 'Lower Thigh';
                                                                }
                                                                if ($pdetails->shorts_long == '2') {
                                                                    echo 'Above Knee';
                                                                }
                                                                if ($pdetails->shorts_long == '1') {
                                                                    echo 'At The Knee';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Color ?  : 
                                                                <?php
                                                                if ($pdetails->color == '1') {
                                                                    echo 'Black';
                                                                }
                                                                if ($pdetails->color == '2') {
                                                                    echo 'Grey';
                                                                }
                                                                if ($pdetails->color == '3') {
                                                                    echo 'White';
                                                                }
                                                                if ($pdetails->color == '4') {
                                                                    echo 'Cream';
                                                                }
                                                                if ($pdetails->color == '5') {
                                                                    echo 'Brown';
                                                                }
                                                                if ($pdetails->color == '6') {
                                                                    echo 'Purple';
                                                                }
                                                                if ($pdetails->color == '7') {
                                                                    echo 'Green';
                                                                }
                                                                if ($pdetails->color == '8') {
                                                                    echo 'Blue';
                                                                }
                                                                if ($pdetails->color == '9') {
                                                                    echo 'Orange';
                                                                }
                                                                if ($pdetails->color == '10') {
                                                                    echo 'Yellow';
                                                                }
                                                                if ($pdetails->color == '11') {
                                                                    echo 'Red';
                                                                }
                                                                if ($pdetails->color == '12') {
                                                                    echo 'Pink';
                                                                }
                                                                ?>
                                                            </div>
                                                            <!--                                                            <div class="col-md-6">
                                                                                                                            Outfit matches ? : 
                                                            <?php
                                                            if ($pdetails->outfit_matches == '1') {
                                                                echo 'Upper Thigh';
                                                            }
                                                            if ($pdetails->outfit_matches == '2') {
                                                                echo 'Lower Thigh';
                                                            }
                                                            if ($pdetails->outfit_matches == '3') {
                                                                echo 'Above Knee';
                                                            }
                                                            if ($pdetails->outfit_matches == '4') {
                                                                echo 'At The Knee';
                                                            }
                                                            ?>
                                                                                                                        </div>-->
                                                            <div class="col-md-6">
                                                                Bottom fit ? : 
                                                                <?php
                                                                if ($pdetails->men_bottom_prefer == '1') {
                                                                    echo 'Tighter Fitting';
                                                                }
                                                                if ($pdetails->men_bottom_prefer == '2') {
                                                                    echo 'More Relaxed';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Purchase price  : 
                                                                <?php
                                                                echo $pdetails->purchase_price;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Sale price  : 
                                                                <?php
                                                                echo $pdetails->sale_price;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Quantity : 
                                                                <?php
                                                                echo $this->Custom->productQuantity($pdetails->prod_id);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Available status  : 
                                                                <?php
                                                                if ($pdetails->available_status == '1') {
                                                                    echo 'Available';
                                                                }
                                                                if ($pdetails->available_status == '2') {
                                                                    echo 'Not Available';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Profuct Image : 
                                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                Note : 
                                                                <?php
                                                                echo $pdetails->note;
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php if (@$profile == 'Women') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php if ($utype == 1) { ?>
                                            <th>Brand Name</th>
                                        <?php } ?>
                                        <th>Product Name 1</th>
                                        <th>Product Name 2</th>
                                        <th>Product Image</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Purchse Price</th>
                                        <th>Sale Price</th>
                                        <th>Quantity</th>
                                        <th>Style.no</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($womenproductdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">
                                            <?php if ($utype == 1) { ?>
                                                <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>
                                            <?php } ?>
                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td><?php echo $pdetails->product_name_two; ?></td>

                                            <td>
                                                <?php
                                                //echo  $pdetails->prodcut_id;

                                                if (empty($pdetails->prodcut_id)) {
                                                    ?>
                                                    <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php } else { ?>
                                                    <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <?php
                                                if (!empty($pdetails->picked_size)) {
                                                    $li_size = explode('-', $pdetails->picked_size);
                                                    foreach ($li_size as $sz_l) {
                                                        echo!empty($pdetails->$sz_l) ? $pdetails->$sz_l . '&nbsp;&nbsp;' : '';
                                                    }
                                                }
                                                if (!empty($pdetails->primary_size) && ($pdetails->primary_size == 'free_size')) {
                                                    echo "Free Size";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->color)) {
                                                    echo $color_arr[$pdetails->color];
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $pdetails->purchase_price; ?></td>
                                            <td><?php echo $pdetails->sale_price; ?></td>
                                            <td><?php echo $this->Custom->productQuantity($pdetails->prod_id); ?></td>
                                            <td><?php echo $pdetails->dtls; ?></td>
                                            <td style="text-align: center;">

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list')), ['action' => 'listProduct', $pdetails->prod_id], ['escape' => false, "data-placement" => "top", "data-hint" => "View all products", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                <a href="<?= HTTP_ROOT . "appadmins/all_barcode_prints/" . $pdetails->prod_id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalproductw-' . $pdetails->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', 'Women', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $pdetails->id, 'InProducts', $profile], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                                <?php if ($pdetails->available_status == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/InProducts'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/InProducts'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <div class="modal fade" id="myModalproductw-<?php echo $pdetails->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<?php echo $pdetails->id; ?>" aria-hidden="true">
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
                                                                What is your height?  : <?php echo $pdetails->tall_feet . '.' . $pdetails->tall_inch; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Best Fit for Weight ? : <?php echo $pdetails->best_fit_for_weight; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Color ?  : <?php
                                                                if (!empty($pdetails->color)) {
                                                                    echo $color_arr[$pdetails->color];
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                What's your body type?: 
                                                                <?php
                                                                if ($pdetails->better_body_shape == '1') {
                                                                    echo 'Inverted Triangle';
                                                                }
                                                                if ($pdetails->better_body_shape == '3') {
                                                                    echo 'Triangle';
                                                                }
                                                                if ($pdetails->better_body_shape == '1') {
                                                                    echo 'Rectangle';
                                                                }
                                                                if ($pdetails->better_body_shape == '4') {
                                                                    echo 'Hourglass';
                                                                }
                                                                if ($pdetails->better_body_shape == '5') {
                                                                    echo 'Apple';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php
                                                                echo $pdetails->pants;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                BRA SIZE: 
                                                                <?php
                                                                echo $pdetails->bra;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php
                                                                echo $pdetails->bra_recomend;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                SKIRT SIZE: 
                                                                <?php
                                                                echo $pdetails->skirt;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                JEANS SIZE: 
                                                                <?php
                                                                echo $pdetails->jeans;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                ACTIVE WEAR SIZE: 
                                                                <?php
                                                                echo $pdetails->active_wr;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                JACKET SIZE: 
                                                                <?php
                                                                echo $pdetails->wo_jackect_size;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                BOTTOM SIZE: 
                                                                <?php
                                                                echo $pdetails->wo_bottom;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                DRESS: 
                                                                <?php
                                                                echo $pdetails->dress;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                JEANS SIZE: 
                                                                <?php
                                                                echo $pdetails->dress_recomended;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                SHIRT & BLOUSE: 
                                                                <?php
                                                                echo $pdetails->shirt_blouse;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php
                                                                echo $pdetails->shirt_blouse_recomend;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                TOP SIZE: 
                                                                <?php
                                                                echo $pdetails->pantsr1;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php
                                                                echo $pdetails->pantsr2;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                What is your shoe size?: 
                                                                <?php
                                                                echo $pdetails->shoe_size;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Which style of shoes do you prefer?(Select all that apply)
                                                                <?php
                                                                echo $pdetails->shoe_size_run;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Which heel height do you prefer?:
                                                                <?php
                                                                echo $pdetails->womenHeelHightPrefer;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Tell us your skin Tone?
                                                                <?php
                                                                echo $pdetails->shoe_size_run;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Shoulders?:
                                                                <?php
                                                                echo $pdetails->proportion_shoulders;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Legs?
                                                                <?php
                                                                echo $pdetails->proportion_legs;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Arms?:
                                                                <?php
                                                                echo $pdetails->proportion_arms;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Hips?
                                                                <?php
                                                                echo $pdetails->proportion_arms;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Purchase price  : 
                                                                <?php
                                                                echo $pdetails->purchase_price;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Sale price  : 
                                                                <?php
                                                                echo $pdetails->sale_price;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Quantity : 
                                                                <?php
                                                                echo $this->Custom->productQuantity($pdetails->prod_id);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Available status  : 
                                                                <?php
                                                                if ($pdetails->available_status == '1') {
                                                                    echo 'Available';
                                                                }
                                                                if ($pdetails->available_status == '2') {
                                                                    echo 'Not Available';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Profuct Image : 
                                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                Note : 
                                                                <?php
                                                                echo $pdetails->note;
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php if (@$profile == 'BoyKids') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php if ($utype == 1) { ?>
                                            <th>Brand Name</th>
                                        <?php } ?>
                                        <th>Product Name 1</th>
                                        <th>Product Name 2</th>
                                        <th>Product Image</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Price</th>
                                        <th>Quantity</th>
                                        <th>Style.no</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($boyskidsproductdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">
                                            <?php if ($utype == 1) { ?>
                                                <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>
                                            <?php } ?>
                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td><?php echo $pdetails->product_name_two; ?></td>
                                            <td>
                                                <?php
                                                //echo  $pdetails->prodcut_id;

                                                if (empty($pdetails->prodcut_id)) {
                                                    ?>
                                                    <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php } else { ?>
                                                    <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->picked_size)) {
                                                    $li_size = explode('-', $pdetails->picked_size);
                                                    foreach ($li_size as $sz_l) {
                                                        echo!empty($pdetails->$sz_l) ? $pdetails->$sz_l . '&nbsp;&nbsp;' : '';
                                                    }
                                                }

                                                if (!empty($pdetails->primary_size) && ($pdetails->primary_size == 'free_size')) {
                                                    echo "Free Size";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->color)) {
                                                    echo $color_arr[$pdetails->color];
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $pdetails->purchase_price; ?></td>
                                            <td><?php echo $pdetails->sale_price; ?></td>
                                            <td><?php echo $this->Custom->productQuantity($pdetails->prod_id); ?></td>
                                            <td><?php echo $pdetails->dtls; ?></td>
                                            <td style="text-align: center;">

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list')), ['action' => 'listProduct', $pdetails->prod_id], ['escape' => false, "data-placement" => "top", "data-hint" => "View all products", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                <a href="<?= HTTP_ROOT . "appadmins/all_barcode_prints/" . $pdetails->prod_id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalproductbk-' . $pdetails->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', 'BoyKids', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $pdetails->id, 'InProducts', $profile], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                                <?php if ($pdetails->available_status == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/InProducts'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/InProducts'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <div class="modal fade" id="myModalproductbk-<?php echo $pdetails->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<?php echo $pdetails->id; ?>" aria-hidden="true">
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
                                                                What is your height?  : <?php echo $pdetails->tall_feet . '.' . $pdetails->tall_inch; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Best Fit for Weight ? : <?php echo $pdetails->best_fit_for_weight; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                TOPS SIZE?  : <?php echo $pdetails->top_size; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                BOTTOMS SIZE ? : <?php echo $pdetails->bottom_size; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                SHOE SIZE?  : <?php echo $pdetails->shoe_size; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Purchase price  : 
                                                                <?php
                                                                echo $pdetails->purchase_price;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Sale price  : 
                                                                <?php
                                                                echo $pdetails->sale_price;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Quantity : 
                                                                <?php
                                                                echo $this->Custom->productQuantity($pdetails->prod_id);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Available status  : 
                                                                <?php
                                                                if ($pdetails->available_status == '1') {
                                                                    echo 'Available';
                                                                }
                                                                if ($pdetails->available_status == '2') {
                                                                    echo 'Not Available';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Product Image : 
                                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                Note : 
                                                                <?php
                                                                echo $pdetails->note;
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php if (@$profile == 'GirlKids') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php if ($utype == 1) { ?>
                                            <th>Brand Name</th>
                                        <?php } ?>
                                        <th>Product Name 1</th>
                                        <th>Product Name 2</th>
                                        <th>Product Image</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Price</th>
                                        <th>Quantity</th>
                                        <th>Style.no</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($girlkidsproductdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">
                                            <?php if ($utype == 1) { ?>
                                                <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>
                                            <?php } ?>
                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td><?php echo $pdetails->product_name_two; ?></td>
                                            <td>
                                                <?php
                                                //echo  $pdetails->prodcut_id;

                                                if (empty($pdetails->prodcut_id)) {
                                                    ?>
                                                    <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php } else { ?>
                                                    <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->picked_size)) {
                                                    $li_size = explode('-', $pdetails->picked_size);
                                                    foreach ($li_size as $sz_l) {
                                                        echo!empty($pdetails->$sz_l) ? $pdetails->$sz_l . '&nbsp;&nbsp;' : '';
                                                    }
                                                }
                                                if (!empty($pdetails->primary_size) && ($pdetails->primary_size == 'free_size')) {
                                                    echo "Free Size";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->color)) {
                                                    echo $color_arr[$pdetails->color];
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $pdetails->purchase_price; ?></td>
                                            <td><?php echo $pdetails->sale_price; ?></td>
                                            <td><?php echo $this->Custom->productQuantity($pdetails->prod_id); ?></td>
                                            <td><?php echo $pdetails->dtls; ?></td>
                                            <td style="text-align: center;">

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list')), ['action' => 'listProduct', $pdetails->prod_id], ['escape' => false, "data-placement" => "top", "data-hint" => "View all products", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                <a href="<?= HTTP_ROOT . "appadmins/all_barcode_prints/" . $pdetails->prod_id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalproductgk-' . $pdetails->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>   
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', 'GirlKids', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'productDelete', $pdetails->id, 'InProducts', $profile], ['escape' => false, "data-placement" => "top", "data-hint" => "Profile Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>

                                                <?php if ($pdetails->available_status == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/InProducts'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/InProducts'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <div class="modal fade" id="myModalproductgk-<?php echo $pdetails->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<?php echo $pdetails->id; ?>" aria-hidden="true">
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
                                                                What is your height?  : <?php echo $pdetails->tall_feet . '.' . $pdetails->tall_inch; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Best Fit for Weight ? : <?php echo $pdetails->best_fit_for_weight; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                What is your height?  : <?php echo $pdetails->tall_feet . '.' . $pdetails->tall_inch; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Best Fit for Weight ? : <?php echo $pdetails->best_fit_for_weight; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                TOPS SIZE?  : <?php echo $pdetails->top_size; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                BOTTOMS SIZE ? : <?php echo $pdetails->bottom_size; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                SHOE SIZE?  : <?php echo $pdetails->shoe_size; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Purchase price  : 
                                                                <?php
                                                                echo $pdetails->purchase_price;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Sale price  : 
                                                                <?php
                                                                echo $pdetails->sale_price;
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Quantity : 
                                                                <?php
                                                                echo $this->Custom->productQuantity($pdetails->prod_id);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Available status  : 
                                                                <?php
                                                                if ($pdetails->available_status == '1') {
                                                                    echo 'Available';
                                                                }
                                                                if ($pdetails->available_status == '2') {
                                                                    echo 'Not Available';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Profuct Image : 
                                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                Note : 
                                                                <?php
                                                                echo $pdetails->note;
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } */ ?>
</div>

<script>
    function myFunction() {
        window.print();
    }
</script>

<script>
    $(function () {
        $(".example").DataTable();
    });
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var sizeKB = input.files[0].size / 1000;
            //alert(sizeKB);
            if (parseFloat(sizeKB) <= 21) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = $('<img />', {
                        src: e.target.result,
                        alt: 'MyAlt',
                        width: '200'
                    });
                    $('#imagePreview').html(img);

                }
                reader.readAsDataURL(input.files[0]);
            } else {
                //alert("Image size");
                $("#image").val('');
                $('#imagePreview').html('');
            }
        }
    }

    $("#image").change(function () {
        readURL(this);

    });

    function getSubCatg(id) {
        $('select[name=rack]').html('<option value="" selected disabled>Fetching sub-categories</option>');

        $.ajax({
            url: '<?php echo HTTP_ROOT ?>appadmins/getSubCatgList',
            type: 'POST',
            data: {id: id},
            success: function (res) {
                $('select[name=rack]').html(res);
            },
            error: function (err) {
                $('select[name=rack]').html('<option value="" selected disabled>No data found</option>');
            },
            dataType: "html"

        });

    }
</script>


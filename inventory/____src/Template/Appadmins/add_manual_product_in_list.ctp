<script>
    function getChanges(value) {
        if (value) {
            var url = '<?php echo HTTP_ROOT ?>';
            window.location.href = url + "appadmins/add_manual_product_in_list/<?= $id; ?>/" + value;
        }
    }
</script>
<style>
    .btn.active, .btn:active {
        background: #db8031 !important;
    }
</style>
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
                                                        <option  value="<?php echo $type->id; ?>"  ><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category</label>
                                                <select name="rack" class="form-control" required>

                                                    <option value="" selected disabled>Select Category first</option>

                                                    <?php
                                                    if (!empty($in_rack)) {
                                                        foreach ($in_rack as $rk) {
                                                            ?>
                                                            <option  value="<?php echo $rk->id; ?>" ><?php echo $rk->rack_name; ?></option>
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
                                                <?= $this->Form->input('product_name_one', ['value' => $productDetails->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
                                                <?= $this->Form->input('product_name_two', ['value' => $productDetails->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2']); ?>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What is your height?</label>
                                                <div class="women-select-boxes">
                                                    <div class="women-select">
                                                        <select name="tall_feet" id="tall_feet">
                                                            <option value="">--</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="women-select">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option  value="">--</option>
                                                            <option  value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option  value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option  value="6">6</option>
                                                            <option  value="7">7</option>
                                                            <option  value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option  value="12">12</option>
                                                        </select>
                                                        <?= $this->Form->input('id', ['value' => $productDetails->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                    </div>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Best Fit for Weight ?</label>
                                                <?= $this->Form->input('best_fit_for_weight', ['type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group" style="margin-top: 35px;">

                                                <label for="free_size_wo">
                                                    <input type="radio" name="primary_size" value="free_size" checked id="free_size_wo"/>
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
                                                    <option  value="">--</option>
                                                    <option value="1">Sometimes too small</option>
                                                    <option  value="2">Just right</option>
                                                    <option value="3">Sometimes too big</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Waist size?</label>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <input type="radio" name="primary_size" value="waist_size" />
                                                    </div>


                                                    <div class="col-md-4">
                                                        <select name="waist_size" id="waist_size" aria-required="true" class="form-control">
                                                            <option value="">--</option>
                                                            <option  value="28">28</option>
                                                            <option  value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option  value="31">31</option>
                                                            <option  value="32">32</option>
                                                            <option value="33">33</option>
                                                            <option  value="34">34</option>
                                                            <option  value="35">35</option>
                                                            <option  value="36">36</option>
                                                            <option  value="38">38</option>
                                                            <option  value="40">40</option>
                                                            <option  value="42">42</option>
                                                            <option value="44">44</option>
                                                            <option  value="46">46</option>
                                                            <option value="48">48</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="waist_size_run" class="form-control">
                                                            <option  value="">--</option>
                                                            <option  value="Sometimes too small">Sometimes too small</option>
                                                            <option  value="Just right">Just right</option>
                                                            <option  value="Sometimes too big">Sometimes too big</option>
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
                                                        <input type="radio" name="primary_size" value="shirt_size"  />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="shirt_size" aria-required="true" class="form-control" aria-invalid="false">
                                                            <option  value="">--</option>
                                                            <option  value="XS">XS</option>
                                                            <option  value="S">S</option>
                                                            <option  value="M">M</option>
                                                            <option value="L">L</option>
                                                            <option  value="XL">XL</option>
                                                            <option  value="XXL">XXL</option>
                                                            <option  value="3XL">3XL</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="shirt_size_run" class="form-control" aria-invalid="false">
                                                            <option  value="">--</option>
                                                            <option  value="Sometimes too small">Sometimes too small</option>
                                                            <option value="Just right">Just right</option>
                                                            <option  value="Sometimes too big">Sometimes too big</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Inseam size?</label>
                                                <select name="inseam_size" id="inseam_size" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option  value="">--</option>
                                                    <option  value="28">28</option>
                                                    <option  value="30">30</option>
                                                    <option  value="32">32</option>
                                                    <option  value="34">34</option>
                                                    <option  value="36">36</option>
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
                                                        <input type="radio" name="primary_size" value="men_bottom" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="men_bottom" aria-required="true" class="form-control" aria-invalid="false">
                                                            <option  value="">--</option>
                                                            <option  value="XS">XS</option>
                                                            <option  value="S">S</option>
                                                            <option  value="M">M</option>
                                                            <option  value="L">L</option>
                                                            <option  value="XL">XL</option>
                                                            <option  value="XXL">XXL</option>
                                                            <option  value="3XL">3XL</option>
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
                                                        <input type="radio" name="primary_size" value="shoe_size"  />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="shoe_size" class="form-control" aria-invalid="false">
                                                            <option  value="">--</option>
                                                            <option  value="7">7</option>
                                                            <option  value="7.5">7.5</option>
                                                            <option  value="8">8</option>
                                                            <option  value="8.5">8.5</option>
                                                            <option  value="9">9</option>
                                                            <option  value="9.5">9.5</option>
                                                            <option  value="10">10</option>
                                                            <option  value="10.5">10.5</option>
                                                            <option  value="11">11</option>
                                                            <option  value="11.5">11.5</option>
                                                            <option  value="12">12</option>
                                                            <option  value="12.5">12.5</option>
                                                            <option  value="13">13</option>
                                                            <option  value="14">14</option>
                                                            <option  value="15">15</option>
                                                            <option  value="16">16</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="shoe_size_run" class="form-control">
                                                            <option  value="" selected="">--</option>
                                                            <option  value="Narrow">Narrow</option>
                                                            <option  value="Medium">Medium</option>
                                                            <option  value="Wide">Wide</option>
                                                            <option  value="Extra Wide">Extra Wide</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Better body Shape ?</label>
                                                <select name="better_body_shape" id="better_body_shape" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option  value="NULL">--</option>
                                                    <option  value="2">Rectangle</option>
                                                    <option  value="3">Triangle</option>
                                                    <option  value="1">Trapezoid</option>
                                                    <option value="4">Oval</option>
                                                    <option  value="5">Inverted Triangle</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">For Better Skin tone ?</label>
                                                <select name="skin_tone" class="form-control">
                                                    <option  value="NULL">--</option>
                                                    <option value="1">IndianRed</option>
                                                    <option value="2">DarkSalmon</option>
                                                    <option  value="3">LightSalmon</option>
                                                    <option  value="4">DarkRed</option>
                                                    <option  value="5">Extra Wide</option>
                                                    <option  value="6">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Typically wear to work?</label>
                                                <select name="work_type" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Casual</option>
                                                    <option  value="2">Business Casual</option>
                                                    <option  value="3">Formal</option>
                                                    <!--                                                    <option  value="4">Oval</option>
                                                                                                    <option  value="5">Inverted Triangle</option>-->
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Casual shirts to fit ?</label>
                                                <select name="casual_shirts_type" class="form-control">
                                                    <option  value="NULL">--</option>
                                                    <option  value="4">Slim</option>                                
                                                    <option  value="5">Regular</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bottom up shirt to fit ?</label>
                                                <select name="bottom_up_shirt_fit" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option  value="NULL">--</option>
                                                    <option  value="6">Slim</option>                                
                                                    <option  value="7">Regular</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Jeans to Fit ?</label>
                                                <select name="jeans_Fit" class="form-control">
                                                    <option  value="NULL">--</option>
                                                    <option  value="3">Straight</option>                                
                                                    <option  value="2">Slim</option>
                                                    <option  value="1">Skinny</option>                                
                                                    <option  value="4">Relaxed</option>                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shorts long ?</label>
                                                <select name="shorts_long" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option  value="NULL">--</option>
                                                    <option  value="4">Upper Thigh</option>                                
                                                    <option value="3">Lower Thigh</option>
                                                    <option  value="2">Above Knee</option>                                
                                                    <option  value="1">At The Knee</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Color ?</label>
                                                <select name="color" class="form-control">
                                                    <option  value="NULL">--</option>

                                                    <?php foreach ($color_arr as $indx => $clr) { ?>
                                                        <option  value="<?= $indx; ?>"><?= $clr; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="men_bottom_prefer">Bottom fit ?</label>
                                                <select name="men_bottom_prefer" aria-required="true" class="form-control" aria-invalid="false" id="men_bottom_prefer">
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Tighter Fitting</option>
                                                    <option  value="2">More Relaxed</option>
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
                                                    <input type="radio" name="budget_type" value="men_shirt_budg" > 
                                                    SHIRTS
                                                </label>

                                                <select name="men_shirt_budg" class="form-control" >
                                                    <option   value="NULL">--</option>
                                                    <option   value="1">Under $50</option>
                                                    <option value="2">$50 - $75</option>
                                                    <option  value="3">$75 - $100</option> 
                                                    <option  value="4">$100 - $125</option> 
                                                    <option  value="5">$125+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="radio" name="budget_type" value="men_polos_budg"  > 
                                                    TEES & POLOS
                                                </label>

                                                <select name="men_polos_budg" class="form-control" >
                                                    <option value="NULL">--</option>
                                                    <option  value="1">Under $30</option>
                                                    <option  value="2">$30 - $50</option>
                                                    <option  value="3">$50 - $70</option> 
                                                    <option  value="4">$70 - $90</option> 
                                                    <option  value="5">$90+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >
                                                    <input type="radio" name="budget_type" value="men_sweater_budg" > 
                                                    SWEATERS & SWEATSHIRTS
                                                </label>

                                                <select name="men_sweater_budg" class="form-control" >
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Under $50</option>
                                                    <option value="2">$50 - $75</option>
                                                    <option value="3">$75 - $100</option> 
                                                    <option value="4">$100 - $125</option> 
                                                    <option  value="5">$125+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="radio" name="budget_type" value="men_pants_budg" > 
                                                    PANTS & DENIM
                                                </label>

                                                <select name="men_pants_budg" class="form-control" >
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Under $75</option>
                                                    <option  value="2">$75 - $100</option>
                                                    <option  value="3">$100 - $125</option> 
                                                    <option  value="4">$125 - $175</option> 
                                                    <option  value="5">$175+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >
                                                    <input type="radio" name="budget_type" value="men_shorts_budg" > 
                                                    SHORTS
                                                </label>

                                                <select name="men_shorts_budg" class="form-control" >
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Under $40</option>
                                                    <option  value="2">$40 - $60</option>
                                                    <option  value="3">$60 - $80</option> 
                                                    <option  value="4">$80 - $100</option> 
                                                    <option value="5">$100+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="radio" name="budget_type" value="men_shoe_budg"  > 
                                                    SHOES 
                                                </label>

                                                <select name="men_shoe_budg" class="form-control" >
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Under $75</option>
                                                    <option  value="2">$75 - $125</option>
                                                    <option  value="3">$125 - $175</option> 
                                                    <option value="4">$175 - $250</option> 
                                                    <option  value="5">$250+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >
                                                    <input type="radio" name="budget_type" value="men_outerwear_budg" > 
                                                    OUTERWEAR
                                                </label>

                                                <select name="men_outerwear_budg" class="form-control" >
                                                    <option  value="NULL">--</option>
                                                    <option value="1">Under $75</option>
                                                    <option  value="2">$75 - $125</option>
                                                    <option value="3">$125 - $175</option> 
                                                    <option  value="4">$175 - $250</option> 

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="radio" name="budget_type" value="men_ties_budg" > 
                                                    Ties 
                                                </label>

                                                <select name="men_ties_budg" class="form-control" >
                                                    <option  value="NULL">I want the best</option>
                                                    <option value="40-60">$40 - $60</option>
                                                    <option value="up-to-80">Up to $80</option>
                                                    <option  value="up-to-100">Up to  $100</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >
                                                    <input type="radio" name="budget_type" value="men_belts_budg" > 
                                                    Belts
                                                </label>
                                                <select name="men_belts_budg" class="form-control" >
                                                    <option  value="NULL">I want the best</option>
                                                    <option value="30-50">$30 - $50</option>
                                                    <option  value="up-to-70">Up to $70</option>
                                                    <option  value="up-to-90"> Up to  $90</option> 
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="radio" name="budget_type" value="men_bags_budg"  > 
                                                    Wallets,Bags, Accessories 
                                                </label>

                                                <select name="men_bags_budg" class="form-control" >
                                                    <option  value="NULL">I want the best</option>
                                                    <option value="25-50">$25 - $50</option>
                                                    <option value="up-to-75">Up to $75</option>
                                                    <option  value="up-to-100">Up to  $100</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >
                                                    <input type="radio" name="budget_type" value="men_sunglass_budg"> 
                                                    Sunglasses
                                                </label>
                                                <select name="men_sunglass_budg" class="form-control" >
                                                    <option  value="NULL">I want the best</option>
                                                    <option  value="40-60">$40 - $60/option>
                                                    <option  value="up-to-80">Up to $80</option>
                                                    <option  value="up-to-100"> Up to  $100</option> 
                                                    <option  value="100-150"> $100 - $150</option> 
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="radio" name="budget_type" value="men_hats_budg" > 
                                                    Hats
                                                </label>

                                                <select name="men_hats_budg" class="form-control" >
                                                    <option  value="NULL">I want the best</option>
                                                    <option  value="30-50">$30 - $50</option>
                                                    <option  value="up-to-70">Up to $70</option>
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >
                                                    <input type="radio" name="budget_type" value="men_socks_budg" > 
                                                    Socks
                                                </label>
                                                <select name="men_socks_budg" class="form-control" >
                                                    <option  value="NULL">I want the best</option>
                                                    <option  value="10-25">$10 - $25</option>
                                                    <option  value="up-to-35">Up to $35</option>
                                                    <option value="up-to-45">Up to $45</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="radio" name="budget_type" value="men_underwear_budg"  > 
                                                    Underwear
                                                </label>

                                                <select name="men_underwear_budg" class="form-control" >
                                                    <option  value="NULL">I want the best</option>
                                                    <option  value="10-25">$10 - $25</option>
                                                    <option  value="up-to-35">Up to $35</option>
                                                    <option  value="up-to-45">Up to $45</option>
                                                </select>                                       
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="radio" name="budget_type" value="men_grooming_budg" > 
                                                    Grooming
                                                </label>

                                                <select name="men_grooming_budg" class="form-control" >
                                                    <option  value="NULL">I want the best</option>
                                                    <option  value="10-25">$10 - $25</option>
                                                    <option  value="up-to-35">Up to $35</option>
                                                    <option  value="up-to-45">Up to $45</option>
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?</label>
                                                <?= $this->Form->input('purchase_price', ['value' => $productDetails->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">sale_price ?</label>
                                                <?= $this->Form->input('sale_price', ['type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>


                                        <!--<div class="col-md-6">-->
                                            <!--<div class="form-group">-->
                                                <!--<label for="exampleInputPassword1">Quantity ?</label>-->
                                                <?= $this->Form->input('quantity', ['value'=>1,'type' => 'hidden', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                            <!--</div>-->
                                        <!--</div>-->

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
                                                            <option  value="<?php echo $brandnm['id']; ?>"><?php echo $brandnm['brand_name']; ?></option>
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
                                                <label for="exampleInputPassword1">Available status</label>
                                                <select name="available_status" class="form-control">
                                                    <option  value="1" selected>Available</option>                                
                                                    <option  value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image <span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

                                                <div class="form-group">
                                                    <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>                                        
                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <?php if ($productDetails->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $productDetails->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/Men/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>  

                                                <?php } ?>



                                                <div id="imagePreview"></div>                          
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                           <fieldset class="question">
                                                <label for="existing_product">Existing Product?</label>
                                                <input id="existing_product" type="checkbox" name="existing_product" value="1" />
                                                <span class="item-text">Yes</span>
                                            </fieldset>

                                            <fieldset class="answer" style="display:none;">
                                                <label for="prod_id">Existing Product sceret code:</label>
                                                <input type="text" name="prod_id" id="prod_id" />
                                            </fieldset>
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
                                                        <option  value="<?php echo $type->id; ?>"><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category</label>
                                                <select name="rack" class="form-control" required>

                                                    <option value="" selected disabled>Select Category first</option>

                                                    <?php
                                                    if (!empty($in_rack)) {
                                                        foreach ($in_rack as $rk) {
                                                            ?>
                                                            <option  value="<?php echo $rk->id; ?>" ><?php echo $rk->rack_name; ?></option>
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
                                                <?= $this->Form->input('product_name_one', ['value' => $productDetails->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
                                                <?= $this->Form->input('product_name_two', ['value' => $productDetails->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2']); ?>
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
                                                            <option  value="">--</option>
                                                            <option value="4">4</option>
                                                            <option  value="5">5</option>
                                                            <option  value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="women-select">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option  value="">--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option  value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option  value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option  value="10">10</option>
                                                            <option  value="11">11</option>
                                                            <option  value="12">12</option>
                                                        </select>
                                                        <?= $this->Form->input('id', ['value' => $productDetails->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                    </div>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What is your weight?</label>
                                                <?= $this->Form->input('best_fit_for_weight', ['type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What's your body type?</label>
                                                <select name="better_body_shape" class="form-control" aria-invalid="false">
                                                    <option  value="">--</option>
                                                    <option  value="2">Inverted Triangle</option>
                                                    <option  value="3">Triangle</option>
                                                    <option  value="1">Rectangle</option>
                                                    <option  value="4">Hourglass</option>
                                                    <option  value="5">Apple</option>
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
                                                            <option value="<?php echo $brandnm['id']; ?>"><?php echo $brandnm['brand_name']; ?></option>
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

                                                    <option  value="NULL">--</option>
                                                    <?php foreach ($color_arr as $indx => $clr) { ?>
                                                        <option value="<?= $indx; ?>"><?= $clr; ?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group" style="margin-top: 35px;">

                                                <label for="free_size_wo">
                                                    <input type="radio" name="primary_size" value="free_size" checked id="free_size_wo"/>
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
                                                                <input type="radio" name="primary_size" value="paint_size" />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>PANTS</label>
                                                                <select name="pants" id="pants">
                                                                    <option  value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option  value="00">00</option>
                                                                        <option  value="00">00</option>
                                                                        <option  value="0">0</option>
                                                                        <option  value="2">2</option>
                                                                        <option  value="4">4</option>
                                                                        <option  value="6">6</option>
                                                                        <option  value="8">8</option>
                                                                        <option  value="10">10</option>
                                                                        <option  value="12">12</option>
                                                                        <option  value="14">14</option>
                                                                        <option value="16">16</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option  value="14W">14W</option>
                                                                        <option value="16W">16W</option>
                                                                        <option value="18W">18W</option>
                                                                        <option  value="20W">20W</option>
                                                                        <option  value="22W">22W</option>
                                                                        <option  value="24W">24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>BRA SIZE</label> 
                                                                <div class="row">
                                                                    <div class="col-md-1">
                                                                        <input type="radio" name="primary_size" value="bra_size"  />
                                                                    </div>
                                                                    <div class="col-sm-4">                                                                        
                                                                        <select name="bra" id="bra">
                                                                            <option  value="">--</option>
                                                                            <option  value="30">30</option>
                                                                            <option  value="32">32</option>
                                                                            <option  value="34">34</option>
                                                                            <option value="36">36</option>
                                                                            <option  value="38">38</option>
                                                                            <option  value="40">40</option>
                                                                            <option  value="42">42</option>
                                                                            <option  value="44">44</option>
                                                                            <option  value="46">46</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <select name="bra_recomend" id="bra_recomend">
                                                                            <option  value="">--</option>
                                                                            <option  value="AA">AA</option>
                                                                            <option  value="A">A</option>
                                                                            <option  value="B">B</option>
                                                                            <option  value="C">C</option>
                                                                            <option  value="D">D</option>
                                                                            <option  value="DD">DD</option>
                                                                            <option  value="DDD">DDD</option>
                                                                            <option  value="F">F</option>
                                                                            <option  value="G">G</option>
                                                                            <option  value="H">H</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="skirt_size"  />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>SKIRT SIZE</label>
                                                                <select name="skirt" id="skirt">
                                                                    <option  value="">--</option>
                                                                    <option  value="XXS">XXS</option>
                                                                    <option  value="XS">XS</option>
                                                                    <option value="S">S</option>
                                                                    <option  value="M">M</option>
                                                                    <option  value="L">L</option>
                                                                    <option  value="XL">XL</option>
                                                                    <option value="XXL">XXL</option>
                                                                    <option  value="1X">1X</option>
                                                                    <option  value="2X">2X</option>
                                                                    <option  value="3X">3X</option>
                                                                    <option  value="4X">4X</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>JEANS SIZE</label>
                                                                <div class="col-md-1">
                                                                    <input type="radio" name="primary_size" value="jeans"   />
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <select name="jeans" id="jeans">
                                                                        <option value="" selected="selected">--</option>
                                                                        <optgroup label="Women's Sizes">
                                                                            <option  value="00">00</option>
                                                                            <option  value="0">0</option>
                                                                            <option  value="2">2</option>
                                                                            <option  value="4">4</option>
                                                                            <option value="6">6</option>
                                                                            <option  value="8">8</option>
                                                                            <option  value="10">10</option>
                                                                            <option  value="12">12</option>
                                                                            <option  value="14">14</option>
                                                                            <option  value="16">16</option>
                                                                        </optgroup>
                                                                        <optgroup label="Women's Plus Sizes">
                                                                            <option  value="14W">14W</option>
                                                                            <option  value="16W">16W</option>
                                                                            <option  value="18W">18W</option>
                                                                            <option  value="20W">20W</option>
                                                                            <option  value="22W">22W</option>
                                                                            <option  value="24W">24W</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label>ACTIVE WEAR SIZE</label>
                                                                <div class="col-md-1">
                                                                    <input type="radio" name="primary_size" value="active_wr"   />
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <select name="active_wr" id="active_wr">
                                                                        <option  value="" selected="selected">--</option>
                                                                        <option value="XXS" >XXS</option>
                                                                        <option value="XS">XS</option>
                                                                        <option value="S">S</option>
                                                                        <option value="M" >M</option>
                                                                        <option value="L">L</option>
                                                                        <option value="XL">XL</option>
                                                                        <option value="XXL" >XXL</option>
                                                                        <option value="1X" >1X</option>
                                                                        <option value="2X" >2X</option>
                                                                        <option value="3X" >3X</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label>JACKET SIZE</label>
                                                                <div class="col-md-1">
                                                                    <input type="radio" name="primary_size" value="wo_jackect_size"  />
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <select name="wo_jackect_size" id="wo_jackect_size">
                                                                        <option value="" selected="selected">--</option>
                                                                        <option value="XS(0-2)"  >XS(0-2)</option>
                                                                        <option value="S(2-4)" >S(2-4)</option>
                                                                        <option value="M(6-8)" >M(6-8)</option>
                                                                        <option value="L(10-12)" >L(10-12)</option>
                                                                        <option value="XL(14)"  >XL(14)</option>
                                                                        <option value="1X(14W-16W)"  >1X(14W-16W)</option>
                                                                        <option value="2X(18W-20W)"  >2X(18W-20W)</option>
                                                                        <option value="3X(22W-24W)" >3X(22W-24W)</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label>BOTTOM SIZE</label>
                                                                <div class="col-md-1">
                                                                    <input type="radio" name="primary_size" value="wo_bottom"   />
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <select name="wo_bottom" id="wo_bottom">
                                                                        <option value="" selected="selected">--</option>
                                                                        <option value="XS(0-2)"  >XS(0-2)</option>
                                                                        <option value="S(2-4)"  >S(2-4)</option>
                                                                        <option value="M(6-8)" >M(6-8)</option>
                                                                        <option value="L(10-12)" >L(10-12)</option>
                                                                        <option value="XL(14)" >XL(14)</option>
                                                                        <option value="1X(14W-16W)" >1X(14W-16W)</option>
                                                                        <option value="2X(18W-20W)"  >2X(18W-20W)</option>
                                                                        <option value="3X(22W-24W)"  >3X(22W-24W)</option>
                                                                        <option value="4X(26W-28W)"  >4X(26W-28W)</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>DRESS</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="dress_size"  />
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <select name="dress" id="dress">
                                                                    <option value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option  value="2">2</option>
                                                                        <option  value="4">4</option>
                                                                        <option value="6">6</option>
                                                                        <option  value="8">8</option>
                                                                        <option  value="10">10</option>
                                                                        <option  value="12">12</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option  value="14W">14W</option>
                                                                        <option  value="16W">16W</option>
                                                                        <option  value="18W">18W</option>
                                                                        <option  value="20W">20W</option>
                                                                        <option  value="22W">22W</option>
                                                                        <option  value="24W">24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="dress_recomended" id="dress_recomended">
                                                                    <option value="">--</option>
                                                                    <option value="L (10-12)">L (10-12)</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option  value="XXS (00)">XXS (00)</option>
                                                                        <option value="XS (0)">XS (0)</option>
                                                                        <option  value="S (2-4)">S (2-4)</option>
                                                                        <option  value="M (6-8)">M (6-8)</option>
                                                                        <option  value="L (10-12)">L (10-12)</option>
                                                                        <option  value="XL (14)">XL (14)</option>
                                                                        <option value="XXL (16)">XXL (16)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option  value="1X (14W-16W)">1X (14W-16W)</option>
                                                                        <option  value="2X (18W-20W)">2X (18W-20W)</option>
                                                                        <option  value="3X (22W-24W)">3X (22W-24W)</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label>SHIRT & BLOUSE</label>
                                                        <div class="row">

                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="blouse_size"   />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select name="shirt_blouse" id="shirt_blouse">
                                                                    <option  value="">--</option>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option  value="2">2</option>
                                                                        <option  value="4">4</option>
                                                                        <option  value="6">6</option>
                                                                        <option  value="8">8</option>
                                                                        <option  value="10">10</option>
                                                                        <option  value="12">12</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option  value="14W">14W</option>
                                                                        <option  value="16W">16W</option>
                                                                        <option  value="18W">18W</option>
                                                                        <option  value="20W">20W</option>
                                                                        <option value="22W">22W</option>
                                                                        <option  value="24W">24W</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="shirt_blouse_recomend" id="shirt_blouse_recomend ">
                                                                    <option  value="">--</option>
                                                                    <optgroup label="Recommended for 2" style="display: block;">
                                                                        <option value="S (2-4)">S (2-4)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option value="S (2-4)">S (2-4)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Sizes">
                                                                        <option  value="XXS (00)">XXS (00)</option>
                                                                        <option  value="XS (0)">XS (0)</option>
                                                                        <option  value="S (2-4)">S (2-4)</option>
                                                                        <option  value="M (6-8)">M (6-8)</option>
                                                                        <option  value="L (10-12)">L (10-12)</option>
                                                                        <option  value="XL (14)">XL (14)</option>
                                                                        <option  value="XXL (16)">XXL (16)</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women's Plus Sizes">
                                                                        <option  value="1X (14W-16W)">1X (14W-16W)</option>
                                                                        <option  value="2X (18W-20W)">2X (18W-20W)</option>
                                                                        <option  value="3X (22W-24W)">3X (22W-24W)</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label>TOP SIZE</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="radio" name="primary_size" value="top_size" />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select name="pantsr1" id="pantsr1">
                                                                    <option  value="">--</option>
                                                                    <option  value="4">4</option>
                                                                    <option  value="4.5">4.5</option>
                                                                    <option  value="5">5</option>
                                                                    <option  value="5.5">5.5</option>
                                                                    <option  value="6">6</option>
                                                                    <option  value="6.5">6.5</option>
                                                                    <option  value="7">7</option>
                                                                    <option  value="7.5">7.5</option>
                                                                    <option  value="8">8</option>
                                                                    <option  value="8.5">8.5</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="pantsr2" id="pantsr2">
                                                                    <option  value="">--</option>
                                                                    <option  value="Narrow">Narrow</option>
                                                                    <option  value="Medium">Medium</option>
                                                                    <option  value="Wide">Wide</option>
                                                                    <option  value="Extra Wide">Extra Wide</option>
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
                                                        <input type="radio" name="primary_size" value="wshoe_size"  />
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="shoe_size"> What is your shoe size?</label>
                                                        <select name="shoe_size" id="shoe_size">
                                                            <option  value="">--</option>
                                                            <?php for ($si = 4; $si <= 13; $si = $si + 0.5) { ?><option  value="<?= $si; ?>"><?= $si; ?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Which heel height do you prefer?</label>
                                                            <select name="womenHeelHightPrefer" id="womenHeelHightPrefer" aria-required="true" class="form-control" aria-invalid="false">
                                                                <option  value="">--</option>
                                                                <option  value='Flat(Under 1")'>Flat(Under 1")</option>
                                                                <option value='Mid(2"-3")'>Mid(2"-3")</option>
                                                                <option  value='High(3"-4")'>High(3"-4")</option>
                                                                <option  value='Low(1"-2")'>Low(1"-2")</option>
                                                                <option  value='Ultra High(4.5"+)'>Ultra High(4.5"+)</option>
                                                            </select>                                            

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <label for="exampleInputPassword1"> Which style of shoes ? </label>
                                                        <select name="shoe_size_run" class="form-control" aria-invalid="false">
                                                            <option  value="">--</option>
                                                            <option  value="Pumps">Pumps</option>
                                                            <option  value="Sandals">Sandals</option>
                                                            <option value="Loafers & Flats">Loafers & Flats</option>
                                                            <option  value="Wedges">Wedges</option>
                                                            <option  value="Clogs & Mules">Clogs & Mules</option>
                                                            <option  value="Sneakers">Sneakers</option>
                                                            <option  value="Boots & Booties">Boots & Booties</option>
                                                            <option  value="Platforms">Platforms</option>
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
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Bohemian</option>
                                                    <option  value="2">Casual</option>
                                                    <option  value="3">Classic</option>
                                                    <option  value="4">Edgy</option>
                                                    <option  value="5">Trendy</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Dress length</label>
                                                <select name="wo_dress_length" id="wo_dress_length">
                                                    <option value="NULL">--</option>
                                                    <option  value="1">Mini</option>
                                                    <option value="2">Short</option>
                                                    <option  value="3">Midi</option>
                                                    <option  value="4">Maxi</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Top half</label>
                                                <select name="wo_top_half" class="form-control">
                                                    <option  value="NULL">--</option>
                                                    <option value="1">Fitted</option>
                                                    <option  value="2">Straight</option>
                                                    <option value="3">Loose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pant Length</label>
                                                <select name="wo_pant_length" >
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Ankle</option>
                                                    <option value="2">Regular</option>
                                                    <option  value="3">Long</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pant Rise</label>
                                                <select name="wo_pant_rise" class="form-control">
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Low Rise</option>
                                                    <option  value="2">Mid Raise</option>
                                                    <option  value="3">High Raise</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pant Style</label>
                                                <select name="wo_pant_style" >
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Skinny</option>
                                                    <option value="2">Straight</option>
                                                    <option  value="3">Bootcut</option>
                                                    <option  value="4">Relaxed</option>
                                                    <option  value="5">Wide Leg</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Appare type</label>
                                                <select name="wo_appare" class="form-control">
                                                    <option  value="NULL">--</option>
                                                    <option value="1">Dresses / jumpsuits</option>
                                                    <option  value="2">Tops</option>
                                                    <option  value="3">Bottoms</option>
                                                    <option  value="4">Denim</option>
                                                    <option value="5">Sweaters</option>
                                                    <option  value="6">Jackets</option>
                                                    <option  value="7">Accessories</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bottoms type</label>
                                                <select name="wo_bottom_style" >
                                                    <option value="NULL">--</option>
                                                    <option  value="1">Skirts</option>
                                                    <option  value="2">Striped Shorts</option>
                                                    <option  value="3">Capri Jeans</option>
                                                    <option  value="4">Cargo Pant</option>
                                                    <option value="5">Checked Pant</option>
                                                    <option value="6">Palazzo</option>
                                                    <option  value="7">Denim Shorts</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Top type</label>
                                                <select name="wo_top_style" class="form-control">
                                                    <option value="NULL">--</option>
                                                    <option value="1">Sleevelss</option>
                                                    <option  value="2">Shorts Sleeve</option>
                                                    <option value="3">Long Sleeve</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!--- need to check if user not picked --->
                                                <label for="exampleInputPassword1">Patterns type</label>
                                                <select name="wo_patterns" >
                                                    <option value="NULL">--</option>
                                                    <option  value="1">Lace</option>
                                                    <option  value="2">Animal Print</option>
                                                    <option  value="3">Tribal</option>
                                                    <option  value="4">Polak Dot</option>
                                                    <option  value="5">Stripes</option>
                                                    <option value="6">Floral</option>

                                                </select>                                         
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Denim styles?</label>
                                                <select name="denim_styles" class="form-control">
                                                    <option  value="NULL">--</option>
                                                    <option  value="distressed_denim_non">Distressed denim non</option>
                                                    <option  value="distressed_denim_minimally">Distressed denim minimally</option>
                                                    <option  value="distressed_denim_fairly">Distressed denim fairly</option>
                                                    <option  value="distressed_denim_heavily">Distressed denim heavily</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Missing from fit/your closet?</label>
                                                <select name="missing_from_your_fIT" class="form-control">
                                                    <option value="NULL">--</option>
                                                    <option value="Sweaters">Sweaters</option>
                                                    <option  value="Blouses">Blouses</option>
                                                    <option  value="Jeans">Jeans</option>
                                                    <option  value="Pants">Pants</option>
                                                    <option value="Skirts">Skirts</option>
                                                    <option  value="Dresses">Dresses</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <!--- need to check if user not picked --->
                                                <label for="exampleInputPassword1">OutFit prefer to wear</label>

                                                <div class="btn-group btn-group-toggle" data-toggle="buttons" style="float: left;width: 100%;">
                                                    <label class="btn btn-secondary active" style="float: left;width: 12.5%;height: 165px;align-items: center;display: flex;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="NULL"  checked> None
                                                    </label>
                                                    <label class="btn btn-secondary " style="float: left;width: 12.5%;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="style_sphere_selections_v3" > 
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit1.jpg" alt="" width="100">
                                                    </label>
                                                    <label class="btn btn-secondary " style="float: left;width: 12.5%;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="style_sphere_selections_v4"  > 
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit2.jpg" alt="" width="100">
                                                    </label>
                                                    <label class="btn btn-secondary  " style="float: left;width: 12.5%;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="style_sphere_selections_v5" > 
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit3.jpg" alt="" width="100">
                                                    </label>
                                                    <label class="btn btn-secondary  " style="float: left;width: 12.5%;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="style_sphere_selections_v6"  > 
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit4.jpg" alt="" width="100">
                                                    </label>
                                                    <label class="btn btn-secondary " style="float: left;width: 12.5%;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="style_sphere_selections_v7"  > 
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit5.jpg" alt="" width="100">
                                                    </label>
                                                    <label class="btn btn-secondary  " style="float: left;width: 12.5%;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="style_sphere_selections_v8"  > 
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit6.jpg" alt="" width="100">
                                                    </label>
                                                    <label class="btn btn-secondary " style="float: left;width: 12.5%;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="style_sphere_selections_v9"  > 
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit7.jpg" alt="" width="100">
                                                    </label>
                                                    <label class="btn btn-secondary  " style="float: left;width: 12.5%;">
                                                        <input type="radio" name="outfit_prefer" autocomplete="off" value="style_sphere_selections_v11" > 
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit8.jpg" alt="" width="100">
                                                    </label>

                                                </div>

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
                                                <input type="radio" name="budget_type" value="wo_top_budg" >
                                                <select name="wo_top_budg" class="form-control" style="width: 85%;">
                                                    <option  value="">--</option>
                                                    <option value="1">Under $50</option>
                                                    <option value="2">$50 - $75</option>
                                                    <option value="3">$75 - $100</option> 
                                                    <option  value="4">$100 - $125</option> 
                                                    <option  value="5">$125+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">BOTTOMS</label>
                                                <input type="radio" name="budget_type" value="wo_bottoms_budg" >
                                                <select name="wo_bottoms_budg" class="form-control" style="width: 85%;">
                                                    <option  value="">--</option>
                                                    <option  value="1">Under $30</option>
                                                    <option  value="2">$30 - $50</option>
                                                    <option  value="3">$50 - $70</option> 
                                                    <option value="4">$70 - $90</option> 
                                                    <option  value="5">$90+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">OUTERWEAR</label>
                                                <input type="radio" name="budget_type" value="wo_outerwear_budg" >
                                                <select name="wo_outerwear_budg" class="form-control" style="width:85%;">
                                                    <option  value="">--</option>
                                                    <option value="1">Under $50</option>
                                                    <option  value="2">$50 - $75</option>
                                                    <option value="3">$75 - $100</option> 
                                                    <option  value="4">$100 - $125</option> 
                                                    <option  value="5">$125+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">JEANS</label>
                                                <input type="radio" name="budget_type" value="wo_jeans_budg"  >
                                                <select name="wo_jeans_budg" class="form-control"  style="width:85%;">
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Under $75 </option>
                                                    <option  value="2">$75 - $100 </option>
                                                    <option  value="3">$100 - $125 </option> 
                                                    <option  value="4">$125 - $175 </option> 
                                                    <option  value="5">$175+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">JEWELRY</label>
                                                <input type="radio" name="budget_type" value="wo_jewelry_budg"  >
                                                <select name="wo_jewelry_budg" class="form-control" style="width:85%;">
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Under $40</option>
                                                    <option value="2">$40 - $60</option>
                                                    <option value="3">$60 - $80 </option> 
                                                    <option  value="4">$80 - $100</option> 
                                                    <option value="5">$100+</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ACCESSORIES</label>
                                                <input type="radio" name="budget_type" value="wo_accessories_budg" >
                                                <select name="wo_accessories_budg" class="form-control" style="width:85%;">
                                                    <option  value="NULL">--</option>
                                                    <option  value="1">Under $75 </option>
                                                    <option  value="2">$75 - $125 </option>
                                                    <option value="3">$125 - $175 </option> 
                                                    <option  value="4">$175 - $250 </option> 
                                                    <option  value="5">$250+</option> 
                                                </select>                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">DRESS</label>
                                                <input type="radio" name="budget_type" value="wo_dress_budg"  >
                                                <select name="wo_dress_budg" class="form-control" style="width:85%;">
                                                    <option value="NULL">--</option>
                                                    <option  value="1">Under $75 </option>
                                                    <option  value="2">$75 - $125 </option>
                                                    <option  value="3">$125 - $175 </option> 
                                                    <option  value="4">$175 - $250 </option> 
                                                    <option  value="5">$250+</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tell us your skin Tone?</label>
                                                <select name="skin_tone" class="form-control">



                                                    <option  value="NULL">--</option>
                                                    <option  value="1">IndianRed</option>
                                                    <option value="2">DarkSalmon</option>
                                                    <option value="3">LightSalmon</option>
                                                    <option  value="4">DarkRed</option>
                                                    <option  value="5">Extra Wide</option>
                                                    <option  value="6">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shoulders?</label>
                                                <select name="proportion_shoulders" id="proportion_shoulders">
                                                    <option  value="NULL">--</option>
                                                    <optgroup label="Women's Sizes">
                                                        <option  value="00">00</option>
                                                        <option  value="0">0</option>
                                                        <option value="2">2</option>
                                                        <option  value="4">4</option>
                                                        <option  value="6">6</option>
                                                        <option  value="8">8</option>
                                                        <option  value="10">10</option>
                                                        <option  value="12">12</option>
                                                        <option  value="14">14</option>
                                                        <option  value="16">16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option  value="14W">14W</option>
                                                        <option  value="16W">16W</option>
                                                        <option  value="18W">18W</option>
                                                        <option  value="20W">20W</option>
                                                        <option  value="22W">22W</option>
                                                        <option  value="24W">24W</option>
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
                                                    <option  value="NULL">--</option>
                                                    <option  value="30">30</option>
                                                    <option  value="32">32</option>
                                                    <option  value="34">34</option>
                                                    <option  value="36">36</option>
                                                    <option  value="38">38</option>
                                                    <option  value="40">40</option>
                                                    <option  value="42">42</option>
                                                    <option  value="44">44</option>
                                                    <option  value="46">46</option>
                                                </select>                                         
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Arms?</label>
                                                <select name="proportion_arms" id="proportion_arms">
                                                    <option value="NULL">--</option>
                                                    <option  value="XXS">XXS</option>
                                                    <option  value="XS">XS</option>
                                                    <option  value="S">S</option>
                                                    <option  value="M">M</option>
                                                    <option  value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option  value="XXL">XXL</option>
                                                    <option  value="1X">1X</option>
                                                    <option value="2X">2X</option>
                                                    <option  value="3X">3X</option>
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
                                                        <option  value="NULL">--</option>
                                                        <option  value="00">00</option>
                                                        <option  value="0">0</option>
                                                        <option value="2">2</option>
                                                        <option  value="4">4</option>
                                                        <option  value="6">6</option>
                                                        <option  value="8">8</option>
                                                        <option  value="10">10</option>
                                                        <option  value="12">12</option>
                                                        <option  value="14">14</option>
                                                        <option  value="16">16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option  value="14W">14W</option>
                                                        <option  value="16W">16W</option>
                                                        <option  value="18W">18W</option>
                                                        <option value="20W">20W</option>
                                                        <option value="22W">22W</option>
                                                        <option  value="24W">24W</option>
                                                    </optgroup>
                                                </select>                                          
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?</label>
                                                <?= $this->Form->input('purchase_price', ['value' => $productDetails->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">sale_price ?</label>
                                                <?= $this->Form->input('sale_price', ['value' => $productDetails->sale_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <!--<div class="col-md-6">-->
                                            <!--<div class="form-group">-->
                                                <!--<label for="exampleInputPassword1">Quantity ?</label>-->
                                                <?= $this->Form->input('quantity', ['value'=>1,'type' => 'hidden', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                            <!--</div>-->
                                        <!--</div>-->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status</label>
                                                <select name="available_status" class="form-control">
                                                    <option value="1" selected>Available</option>  
                                                    <option  value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image <span style="color:red;font-weight: 400;">20 Kb ( PNG, JPG ,JPEG)</span></label>

                                                <div class="form-group">
                                                    <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>                                        

                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <?php if ($productDetails->product_image) { ?>
                                                    <div class="form-group"> 
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $productDetails->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/Women/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } ?>  
                                                <div id="imagePreview"></div>                           
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="question">
                                                <label for="existing_product">Existing Product?</label>
                                                <input id="existing_product" type="checkbox" name="existing_product" value="1" />
                                                <span class="item-text">Yes</span>
                                            </fieldset>

                                            <fieldset class="answer" style="display:none;">
                                                <label for="prod_id">Existing Product sceret code:</label>
                                                <input type="text" name="prod_id" id="prod_id" />
                                            </fieldset>
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
                                                        <option  value="<?php echo $type->id; ?>" ><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category</label>
                                                <select name="rack" class="form-control" required>

                                                    <option value="" selected disabled>Select Category first</option>

                                                    <?php
                                                    if (!empty($in_rack)) {
                                                        foreach ($in_rack as $rk) {
                                                            ?>
                                                            <option  value="<?php echo $rk->id; ?>" ><?php echo $rk->rack_name; ?></option>
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
                                                <?= $this->Form->input('product_name_one', ['value' => $productDetails->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
                                                <?= $this->Form->input('product_name_two', ['value' => $productDetails->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2']); ?>
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
                                                            <option value="">--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="boy-kid-select-box">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option value="">--</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <?= $this->Form->input('id', ['value' => $productDetails->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Weight ?</label>
                                                <?= $this->Form->input('best_fit_for_weight', ['type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Color ?</label>
                                                <select name="color" class="form-control">

                                                    <option  value="NULL">--</option>
                                                    <?php foreach ($color_arr as $indx => $clr) { ?>
                                                        <option  value="<?= $indx; ?>"><?= $clr; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group" style="margin-top: 35px;">

                                                <label for="free_size_wo">
                                                    <input type="radio" name="primary_size" value="free_size" checked id="free_size_wo"/>
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
                                                    <input type="radio" name="primary_size" value="top_size"   >
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="top_size" id="top_size">
                                                        <option > value="">--</option>
                                                        <optgroup label="Toddler Sizing">
                                                            <option   valu="2T">2T</option>
                                                            <option  value="3T">3T</option>
                                                            <option  value="4T">4T</option>
                                                        </optgroup>
                                                        <optgroup label="Kid Sizing">
                                                            <option  value="5">5</option>
                                                            <option  value="6">6</option>
                                                            <option  value="7">7</option>
                                                            <option  value="8">8</option>
                                                            <option value="10">10</option>
                                                            <option  value="12">12</option>
                                                            <option  value="14">14</option>
                                                            <option value="16">16</option>
                                                            <option value="18">18</option>
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
                                                        <input type="radio" name="primary_size" value="bottom_size"   >
                                                    </div>
                                                    <div class="col-md-11">
                                                        <select name="bottom_size" id="bottom_size">
                                                            <option value="">--</option>
                                                            <optgroup label="Toddler Sizing">
                                                                <option value="2T">2T</option>
                                                                <option   value="3T">3T</option>
                                                                <option  value="4T">4T</option>
                                                            </optgroup>
                                                            <optgroup label="Kid Sizing">
                                                                <option   value="5">5</option>
                                                                <option  value="6">6</option>
                                                                <option  value="7">7</option>
                                                                <option   value="8">8</option>
                                                                <option  value="10">10</option>
                                                                <option   value="12">12</option>
                                                                <option  value="14">14</option>
                                                                <option   value="16">16</option>
                                                                <option value="18">18</option>
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
                                                        <input type="radio" name="primary_size" value="shoe_size"   >
                                                    </div>
                                                    <div class="col-md-11">
                                                        <select name="shoe_size" id="shoe_size">
                                                            <option value="">--</option>
                                                            <optgroup label="Toddler Sizing">
                                                                <option  value="2 Child">2 Child</option>
                                                                <option  value="3 Child">3 Child</option>
                                                                <option  value="4 Child">4 Child</option>
                                                                <option  value="5 Child">5 Child</option>
                                                                <option  value="6 Child">6 Child</option>
                                                                <option  value="7 Child">7 Child</option>
                                                                <option  value="8 Child">8 Child</option>
                                                                <option  value="9 Child">9 Child</option>
                                                            </optgroup>
                                                            <optgroup label="Kid Sizing">
                                                                <option value="10 Child">10 Child</option>
                                                                <option value="11 Child">11 Child</option>
                                                                <option value="12 Child">12 Child</option>
                                                                <option  value="13 Child">13 Child</option>
                                                                <option  value="1 Youth">1 Youth</option>
                                                                <option  value="2 Youth">2 Youth</option>
                                                                <option  value="3 Youth">3 Youth</option>
                                                                <option  value="4 Youth">4 Youth</option>
                                                                <option  value="5 Youth">5 Youth</option>
                                                                <option value="6 Youth">6 Youth</option>
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
                                                    <option  value="NULL">--</option>
                                                    <option  value="Husky">Husky</option>
                                                    <option  value="Average">Average</option>
                                                    <option  value="Slim">Slim</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type of print ?</label>
                                                <select name="wo_patterns" id="wo_patterns">
                                                    <option  value="NULL">--</option>
                                                    <option  value="stripes">Stripes</option>
                                                    <option  value="gingham">Gingham</option>
                                                    <option  value="novelty">Novelty</option>
                                                    <option  value="polkadots">Polka dots</option>
                                                    <option  value="plaid">Plaid</option>
                                                    <option  value="camo">Camo</option>
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
                                                            <option value="<?php echo $brandnm['id']; ?>"><?php echo $brandnm['brand_name']; ?></option>
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
                                                <?= $this->Form->input('purchase_price', ['value' => $productDetails->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">sale_price ?</label>
                                                <?= $this->Form->input('sale_price', ['value' => $productDetails->sale_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <!--<div class="col-md-6">-->
                                            <!--<div class="form-group">-->
                                                <!--<label for="exampleInputPassword1">Quantity ?</label>-->
                                                <?= $this->Form->input('quantity', ['value'=>1,'type' => 'hidden', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                            <!--</div>-->
                                        <!--</div>-->

                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status</label>
                                                <select name="available_status" class="form-control">
                                                    <option  value="1" selected>Available</option>                                
                                                    <option  value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image  <span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

                                                <div class="form-group">
                                                    <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>

                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <?php if ($productDetails->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $productDetails->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/BoyKids/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } ?>


                                                <div id="imagePreview"></div>                          
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <fieldset class="question">
                                                <label for="existing_product">Existing Product?</label>
                                                <input id="existing_product" type="checkbox" name="existing_product" value="1" />
                                                <span class="item-text">Yes</span>
                                            </fieldset>

                                            <fieldset class="answer" style="display:none;">
                                                <label for="prod_id">Existing Product sceret code:</label>
                                                <input type="text" name="prod_id" id="prod_id" />
                                            </fieldset>                                            
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
                                                        <option  value="<?php echo $type->id; ?>"  ><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category</label>
                                                <select name="rack" class="form-control" required>

                                                    <option value="" selected disabled>Select Category first</option>

                                                    <?php
                                                    if (!empty($in_rack)) {
                                                        foreach ($in_rack as $rk) {
                                                            ?>
                                                            <option  value="<?php echo $rk->id; ?>" ><?php echo $rk->rack_name; ?></option>
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
                                                <?= $this->Form->input('product_name_one', ['value' => $productDetails->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
                                                <?= $this->Form->input('product_name_two', ['value' => $productDetails->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2']); ?>
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
                                                            <option value="">--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option  value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option  value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class="boy-kid-select-box">
                                                        <select name="tall_inch" id="tall_inch">
                                                            <option value="0">--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option  value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?= $this->Form->input('id', ['value' => $productDetails->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Weight ?</label>
                                                <?= $this->Form->input('best_fit_for_weight', ['type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Color ?</label>
                                                <select name="color" class="form-control">

                                                    <option value="NULL">--</option>
                                                    <?php foreach ($color_arr as $indx => $clr) { ?>
                                                        <option value="<?= $indx; ?>"><?= $clr; ?></option>
                                                    <?php } ?>    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 ">
                                            <div class="form-group" style="margin-top: 35px;">

                                                <label for="free_size_wo">
                                                    <input type="radio" name="primary_size" value="free_size" checked id="free_size_wo"/>
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
                                                    <input type="radio" name="primary_size" value="top_size"   >
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="top_size" id="top_size">
                                                        <option  value="">--</option>
                                                        <optgroup label="Toddler Sizing">
                                                            <option valu="2T">2T</option>
                                                            <option value="3T">3T</option>
                                                            <option value="4T">4T</option>
                                                        </optgroup>
                                                        <optgroup label="Kid Sizing">
                                                            <option  value="5">5</option>
                                                            <option  value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="10">10</option>
                                                            <option value="12">12</option>
                                                            <option value="14">14</option>
                                                            <option value="16">16</option>
                                                            <option value="18">18</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">BOTTOMS SIZE</label>
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="bottom_size"   >
                                                </div>
                                                <div class="col-md-11">
                                                    <select name="bottom_size" id="bottom_size">
                                                        <option value="">--</option>
                                                        <optgroup label="Toddler Sizing">
                                                            <option value="2T">2T</option>
                                                            <option  value="3T">3T</option>
                                                            <option   value="4T">4T</option>
                                                        </optgroup>
                                                        <optgroup label="Kid Sizing">
                                                            <option  value="5">5</option>
                                                            <option  value="6">6</option>
                                                            <option   value="7">7</option>
                                                            <option  value="8">8</option>
                                                            <option   value="10">10</option>
                                                            <option  value="12">12</option>
                                                            <option  value="14">14</option>
                                                            <option   value="16">16</option>
                                                            <option  value="18">18</option>
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
                                                        <input type="radio" name="primary_size" value="shoe_size" >
                                                    </div>
                                                    <div class="col-md-11">
                                                        <select name="shoe_size" id="shoe_size">
                                                            <option  value="">--</option>
                                                            <optgroup label="Toddler Sizing">
                                                                <option  value="2 Child">2 Child</option>
                                                                <option value="3 Child">3 Child</option>
                                                                <option value="4 Child">4 Child</option>
                                                                <option  value="5 Child">5 Child</option>
                                                                <option  value="6 Child">6 Child</option>
                                                                <option  value="7 Child">7 Child</option>
                                                                <option value="8 Child">8 Child</option>
                                                                <option  value="9 Child">9 Child</option>
                                                            </optgroup>
                                                            <optgroup label="Kid Sizing">
                                                                <option  value="10 Child">10 Child</option>
                                                                <option  value="11 Child">11 Child</option>
                                                                <option  value="12 Child">12 Child</option>
                                                                <option  value="13 Child">13 Child</option>
                                                                <option  value="1 Youth">1 Youth</option>
                                                                <option value="2 Youth">2 Youth</option>
                                                                <option  value="3 Youth">3 Youth</option>
                                                                <option  value="4 Youth">4 Youth</option>
                                                                <option  value="5 Youth">5 Youth</option>
                                                                <option value="6 Youth">6 Youth</option>
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
                                                        <input type="radio" name="primary_size" value="shoe_size"  >
                                                    </div>
                                                    <div class="col-md-11">
                                                        <select name="shoe_size" id="shoe_size">
                                                            <option  value="">--</option>
                                                            <optgroup label="Toddler Sizing">
                                                                <option value="2 Child">2 Child</option>
                                                                <option  value="3 Child">3 Child</option>
                                                                <option  value="4 Child">4 Child</option>
                                                                <option  value="5 Child">5 Child</option>
                                                                <option  value="6 Child">6 Child</option>
                                                                <option  value="7 Child">7 Child</option>
                                                                <option  value="8 Child">8 Child</option>
                                                                <option value="9 Child">9 Child</option>
                                                            </optgroup>
                                                            <optgroup label="Kid Sizing">
                                                                <option  value="10 Child">10 Child</option>
                                                                <option  value="11 Child">11 Child</option>
                                                                <option  value="12 Child">12 Child</option>
                                                                <option  value="13 Child">13 Child</option>
                                                                <option  value="1 Youth">1 Youth</option>
                                                                <option  value="2 Youth">2 Youth</option>
                                                                <option  value="3 Youth">3 Youth</option>
                                                                <option  value="4 Youth">4 Youth</option>
                                                                <option value="5 Youth">5 Youth</option>
                                                                <option value="6 Youth">6 Youth</option>
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
                                                    <option  value="NULL">--</option>
                                                    <option  value="Husky">Husky</option>
                                                    <option  value="Average">Average</option>
                                                    <option  value="Slim">Slim</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type of print ?</label>
                                                <select name="wo_patterns" id="wo_patterns">
                                                    <option  value="NULL">--</option>
                                                    <option  value="stripes">Stripes</option>
                                                    <option  value="floral">Floral</option>
                                                    <option  value="animal_print">Animal Print</option>
                                                    <option  value="polkadots">Polka dots</option>
                                                    <option  value="plaid">Plaid</option>
                                                    <option  value="camo">Camo</option>
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
                                                            <option  value="<?php echo $brandnm['id']; ?>"><?php echo $brandnm['brand_name']; ?></option>
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
                                                <?= $this->Form->input('purchase_price', ['value' => $productDetails->purchase_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">sale_price ?</label>
                                                <?= $this->Form->input('sale_price', ['value' => $productDetails->sale_price, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter sale price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <!--<div class="col-md-6">-->
                                            <!--<div class="form-group">-->
                                                <!--<label for="exampleInputPassword1">Quantity ?</label>-->
                                                <?= $this->Form->input('quantity', ['value'=>1,'type' => 'hidden', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                            <!--</div>-->
                                        <!--</div>-->

                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status</label>
                                                <select name="available_status" class="form-control">
                                                    <option value="1" selected>Available</option>                                
                                                    <option  value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image  <span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

                                                <div class="form-group">
                                                    <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>                                        


                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <?php if ($productDetails->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $productDetails->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/GirlKids/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } ?> 
                                                <div id="imagePreview"></div>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <fieldset class="question">
                                                <label for="existing_product">Existing Product?</label>
                                                <input id="existing_product" type="checkbox" name="existing_product" value="1" />
                                                <span class="item-text">Yes</span>
                                            </fieldset>

                                            <fieldset class="answer" style="display:none;">
                                                <label for="prod_id">Existing Product sceret code:</label>
                                                <input type="text" name="prod_id" id="prod_id" />
                                            </fieldset>                                            
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

    $(function () {
        $("#existing_product").on("click", function () {
            $(".answer").toggle(this.checked);
        });
    });
</script>


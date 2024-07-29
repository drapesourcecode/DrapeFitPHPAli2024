<script>
    function getChanges(value) {
        if (value) {
            var url = '<?php echo HTTP_ROOT ?>';
            window.location.href = url + "appadmins/add_product/" + value;
        }
    }
</script>

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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Best Fit for Height ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('best_fit_for_height', ['value' => @$editproduct->best_fit_for_height, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your height', 'label' => false, 'placeholder' => 'Please enter your height']); ?>

                                                <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Best Fit for Weight ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your weight', 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Best Size Fit ?<span style="color:#FF0000">*</span></label>
                                                <select name="best_size_fit" class="form-control" aria-invalid="false">
                                                    <option value="">--</option>
                                                    <option <?php if (@$editproduct->best_size_fit == '1') { ?> selected="" <?php } ?> value="1">Sometimes too small</option>
                                                    <option <?php if (@$editproduct->best_size_fit == '2') { ?> selected="" <?php } ?> value="2" selected="">Just right</option>
                                                    <option <?php if (@$editproduct->best_size_fit == '3') { ?> selected="" <?php } ?> value="3">Sometimes too big</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Waist size?<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select name="waist_size" id="waist_size" aria-required="true" class="form-control">
                                                            <option value="">--</option>
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
                                                            <option value="">--</option>
                                                            <option <?php if (@$editproduct->waist_size_run == '1') { ?> selected="" <?php } ?> value="1">Sometimes too small</option>
                                                            <option <?php if (@$editproduct->waist_size_run == '2') { ?> selected="" <?php } ?> value="2">Just right</option>
                                                            <option <?php if (@$editproduct->waist_size_run == '3') { ?> selected="" <?php } ?> value="3">Sometimes too big</option>
                                                        </select>
                                                    </div>
                                                </div>                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shirt size?<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select name="shirt_size" aria-required="true" class="form-control" aria-invalid="false">
                                                            <option value="">--</option>
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
                                                            <option value="">--</option>
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
                                                <label for="exampleInputPassword1">Inseam size?<span style="color:#FF0000">*</span></label>
                                                <select name="inseam_size" id="inseam_size" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option value="">--</option>
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
                                                <label for="exampleInputPassword1">Shoe size?<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select name="shoe_size" class="form-control" aria-invalid="false">
                                                            <option value="">--</option>
                                                            <option <?php if (@$editproduct->shoe_size == '7') { ?> selected="" <?php } ?> value="7">7</option>
                                                            <option <?php if (@$editproduct->shoe_size == '7.5') { ?> selected="" <?php } ?> value="7.5">7.5</option>
                                                            <option <?php if (@$editproduct->shoe_size == '8') { ?> selected="" <?php } ?> value="8" selected="">8</option>
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
                                                            <option <?php if (@$editproduct->shoe_size_run == '1') { ?> selected="" <?php } ?> value="1" selected="">Narrow</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == '2') { ?> selected="" <?php } ?> value="2">Medium</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == '3') { ?> selected="" <?php } ?> value="3">Wide</option>
                                                            <option <?php if (@$editproduct->shoe_size_run == '4') { ?> selected="" <?php } ?> value="4">Extra Wide</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Better body Shape ?<span style="color:#FF0000">*</span></label>
                                                <select name="better_body_shape" id="better_body_shape" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option value="">--</option>
                                                    <option <?php if (@$editproduct->better_body_shape == 'Rectangle') { ?> selected="" <?php } ?> value="Rectangle">Rectangle</option>
                                                    <option <?php if (@$editproduct->better_body_shape == 'Triangle') { ?> selected="" <?php } ?> value="Triangle">Triangle</option>
                                                    <option <?php if (@$editproduct->better_body_shape == 'Trapezoid') { ?> selected="" <?php } ?> value="Trapezoid">Trapezoid</option>
                                                    <option <?php if (@$editproduct->better_body_shape == 'Oval') { ?> selected="" <?php } ?> value="Oval">Oval</option>
                                                    <option <?php if (@$editproduct->better_body_shape == 'Inverted Triangle') { ?> selected="" <?php } ?> value="Inverted Triangle">Inverted Triangle</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">For Better Skin tone ?<span style="color:#FF0000">*</span></label>
                                                <select name="for_better_skin_tone" class="form-control">
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '1') { ?> selected="" <?php } ?> value="1">IndianRed</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '2') { ?> selected="" <?php } ?> value="2">DarkSalmon</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '3') { ?> selected="" <?php } ?> value="3">LightSalmon</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '4') { ?> selected="" <?php } ?> value="4">DarkRed</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '5') { ?> selected="" <?php } ?> value="5">Extra Wide</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '6') { ?> selected="" <?php } ?> value="6">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">For better work type ?<span style="color:#FF0000">*</span></label>
                                                <select name="for_better_work_type" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option value="">--</option>
                                                    <option <?php if (@$editproduct->for_better_work_type == '1') { ?> selected="" <?php } ?> value="1">Rectangle</option>
                                                    <option <?php if (@$editproduct->for_better_work_type == '2') { ?> selected="" <?php } ?> value="2">Triangle</option>
                                                    <option <?php if (@$editproduct->for_better_work_type == '3') { ?> selected="" <?php } ?> value="3">Trapezoid</option>
                                                    <option <?php if (@$editproduct->for_better_work_type == '4') { ?> selected="" <?php } ?> value="4">Oval</option>
                                                    <option <?php if (@$editproduct->for_better_work_type == '5') { ?> selected="" <?php } ?> value="5">Inverted Triangle</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Casual shirts type ?<span style="color:#FF0000">*</span></label>
                                                <select name="casual_shirts_type" class="form-control">
                                                    <option <?php if (@$editproduct->casual_shirts_type == '1') { ?> selected="" <?php } ?> value="1">Slim</option>                                
                                                    <option <?php if (@$editproduct->casual_shirts_type == '2') { ?> selected="" <?php } ?> value="2">Regular</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bottom up shirt fit ?<span style="color:#FF0000">*</span></label>
                                                <select name="bottom_up_shirt_fit" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option <?php if (@$editproduct->bottom_up_shirt_fit == '1') { ?> selected="" <?php } ?> value="1">Slim</option>                                
                                                    <option <?php if (@$editproduct->bottom_up_shirt_fit == '2') { ?> selected="" <?php } ?> value="2">Regular</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Jeans Fit ?<span style="color:#FF0000">*</span></label>
                                                <select name="jeans_Fit" class="form-control">
                                                    <option <?php if (@$editproduct->jeans_Fit == '1') { ?> selected="" <?php } ?> value="1">Straight</option>                                
                                                    <option <?php if (@$editproduct->jeans_Fit == '2') { ?> selected="" <?php } ?> value="2">Slim</option>
                                                    <option <?php if (@$editproduct->jeans_Fit == '3') { ?> selected="" <?php } ?> value="3">Skinny</option>                                
                                                    <option <?php if (@$editproduct->jeans_Fit == '4') { ?> selected="" <?php } ?> value="4">Relaxed</option>                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shorts long ?<span style="color:#FF0000">*</span></label>
                                                <select name="shorts_long" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option <?php if (@$editproduct->shorts_long == '1') { ?> selected="" <?php } ?> value="1">Upper Thigh</option>                                
                                                    <option <?php if (@$editproduct->shorts_long == '2') { ?> selected="" <?php } ?> value="2">Lower Thigh</option>
                                                    <option <?php if (@$editproduct->shorts_long == '3') { ?> selected="" <?php } ?> value="3">Above Knee</option>                                
                                                    <option <?php if (@$editproduct->shorts_long == '4') { ?> selected="" <?php } ?> value="4">At The Knee</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Color ?<span style="color:#FF0000">*</span></label>
                                                <select name="color" class="form-control">
                                                    <option <?php if (@$editproduct->color == '1') { ?> selected="" <?php } ?> value="1">Black</option>
                                                    <option <?php if (@$editproduct->color == '2') { ?> selected="" <?php } ?> value="2">Grey</option>
                                                    <option <?php if (@$editproduct->color == '3') { ?> selected="" <?php } ?> value="3">White</option>
                                                    <option <?php if (@$editproduct->color == '4') { ?> selected="" <?php } ?> value="4">Cream</option>
                                                    <option <?php if (@$editproduct->color == '5') { ?> selected="" <?php } ?> value="5">Brown</option>
                                                    <option <?php if (@$editproduct->color == '6') { ?> selected="" <?php } ?> value="6">Purple</option>
                                                    <option <?php if (@$editproduct->color == '7') { ?> selected="" <?php } ?> value="7">Green</option>
                                                    <option <?php if (@$editproduct->color == '8') { ?> selected="" <?php } ?> value="8">Blue</option>
                                                    <option <?php if (@$editproduct->color == '9') { ?> selected="" <?php } ?> value="9">Orange</option>
                                                    <option <?php if (@$editproduct->color == '10') { ?> selected="" <?php } ?> value="10">Yellow</option>
                                                    <option <?php if (@$editproduct->color == '11') { ?> selected="" <?php } ?> value="11">Red</option>
                                                    <option <?php if (@$editproduct->color == '12') { ?> selected="" <?php } ?> value="12">Pink</option>                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Outfit matches ?<span style="color:#FF0000">*</span></label>
                                                <select name="outfit_matches" aria-required="true" class="form-control" aria-invalid="false">
                                                    <option <?php if (@$editproduct->color == '1') { ?> selected="" <?php } ?> value="1">Upper Thigh</option>
                                                    <option <?php if (@$editproduct->color == '2') { ?> selected="" <?php } ?> value="2">Lower Thigh</option>
                                                    <option <?php if (@$editproduct->color == '3') { ?> selected="" <?php } ?> value="3">Above Knee</option>
                                                    <option <?php if (@$editproduct->color == '4') { ?> selected="" <?php } ?> value="4">At The Knee</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter purchase price', 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quantity ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter quantity', 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status<span style="color:#FF0000">*</span></label>
                                                <select name="available_status" class="form-control">
                                                    <option <?php if (@$editproduct->available_status == '1') { ?> selected="" <?php } ?> value="1">Available</option>                                
                                                    <option <?php if (@$editproduct->available_status == '2') { ?> selected="" <?php } ?> value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image<span style="color:#FF0000">*</span></label>
                                                <?php if (@$editproduct->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } else { ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('product_image', ['type' => 'file', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Select a image']); ?>                                        
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                <?php } ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'required' => "required", 'label' => false, 'placeholder' => 'Please enter note']); ?>
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
                            <?php if (@$profile == 'Women' || @$profile == '') { ?>
                                <div class="tab-content women" style="width: 100%;float: left;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What is your height? ?<span style="color:#FF0000">*</span></label>
                                                <div class="women-select-boxes">
                                                    <div class="women-select">
                                                <select name="tell_in_feet" id="tall_feet">
                                                    <option <?php if (@$editproduct->best_fit_for_height == '') { ?> selected=""<?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                </select>
                                                <label>ft.</label>
                                                </div>
                                                <div class="women-select">
                                                <select name="tell_in_inch" id="tell_inch">
                                                    <option <?php if (@$editproduct->tell_in_inch == '') { ?> selected=""<?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '1') { ?> selected=""<?php } ?> value="1">1</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '2') { ?> selected=""<?php } ?>value="2">2</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '3') { ?> selected=""<?php } ?>value="3">3</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '4') { ?> selected=""<?php } ?> value="4">4</option>
                                                    <option  <?php if (@$editproduct->tell_in_inch == '5') { ?> selected=""<?php } ?>value="5">5</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '9') { ?> selected=""<?php } ?> value="9">9</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '10') { ?> selected=""<?php } ?> value="10">10</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '11') { ?> selected=""<?php } ?> value="11">11</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                </select>
                                                

                                                <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                </div>
                                            </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What is your weight? ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your weight', 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What's your body type?<span style="color:#FF0000">*</span></label>
                                                <select name="body_type" class="form-control" aria-invalid="false">
                                                    <option value="">--</option>
                                                    <option <?php if (@$editproduct->body_type == 'InvertedTriangle') { ?> selected="" <?php } ?> value="InvertedTriangle">Inverted Triangle</option>
                                                    <option <?php if (@$editproduct->body_type == 'Triangle') { ?> selected="" <?php } ?> value="Triangle" selected="">Triangle</option>
                                                    <option <?php if (@$editproduct->body_type == 'Rectangle') { ?> selected="" <?php } ?> value="Rectangle">Rectangle</option>
                                                    <option <?php if (@$editproduct->body_type == 'Hourglass') { ?> selected="" <?php } ?> value="Hourglass">Hourglass</option>
                                                    <option <?php if (@$editproduct->body_type == 'Apple') { ?> selected="" <?php } ?> value="Apple">Apple</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6 women-size-prefer">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What size you prefer?<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>PANTS</label>
                                                        <select name="pants" id="pants">
                                                            <option value="">--</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="00">00</option>
                                                                <option value="00">00</option>
                                                                <option value="0">0</option>
                                                                <option value="2">2</option>
                                                                <option value="4">4</option>
                                                                <option value="6">6</option>
                                                                <option value="8">8</option>
                                                                <option value="10">10</option>
                                                                <option value="12">12</option>
                                                                <option value="14">14</option>
                                                                <option value="16">16</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="14W">14W</option>
                                                                <option value="16W">16W</option>
                                                                <option value="18W">18W</option>
                                                                <option value="20W">20W</option>
                                                                <option value="22W">22W</option>
                                                                <option value="24W">24W</option>
                                                            </optgroup>
                                                        </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>BRA SIZE</label> 
                                                                <div class="row">
                                                                    <div class="col-sm-6">                                                                        
                                                                        <select name="bra" id="bra">
                                                                            <option value="" selected="selected">--</option>
                                                                            <option value="30">30</option>
                                                                            <option value="32">32</option>
                                                                            <option value="34">34</option>
                                                                            <option value="36">36</option>
                                                                            <option value="38">38</option>
                                                                            <option value="40">40</option>
                                                                            <option value="42">42</option>
                                                                            <option value="44">44</option>
                                                                            <option value="46">46</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <select name="bra_recomend" id="bra_recomend">
                                                                            <option value="" selected="selected">--</option>
                                                                            <option value="AA">AA</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="D">D</option>
                                                                            <option value="DD">DD</option>
                                                                            <option value="DDD">DDD</option>
                                                                            <option value="F">F</option>
                                                                            <option value="G">G</option>
                                                                            <option value="H">H</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                        
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>SKIRT SIZE</label>
                                                                <select name="skirt" id="skirt">
                                                                    <option value="" selected="selected">--</option>
                                                                    <option value="XXS">XXS</option>
                                                                    <option value="XS">XS</option>
                                                                    <option value="S">S</option>
                                                                    <option value="M">M</option>
                                                                    <option value="L">L</option>
                                                                    <option value="XL">XL</option>
                                                                    <option value="XXL">XXL</option>
                                                                    <option value="1X">1X</option>
                                                                    <option value="2X">2X</option>
                                                                    <option value="3X">3X</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>JEANS SIZE</label>
                                                        <select name="jeans" id="jeans">
                                                            <option value="" selected="selected">--</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="00">00</option>
                                                                <option value="0">0</option>
                                                                <option value="2">2</option>
                                                                <option value="4">4</option>
                                                                <option value="6">6</option>
                                                                <option value="8">8</option>
                                                                <option value="10">10</option>
                                                                <option value="12">12</option>
                                                                <option value="14">14</option>
                                                                <option value="16">16</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="14W">14W</option>
                                                                <option value="16W">16W</option>
                                                                <option value="18W">18W</option>
                                                                <option value="20W">20W</option>
                                                                <option value="22W">22W</option>
                                                                <option value="24W">24W</option>
                                                            </optgroup>
                                                        </select>
                                                            </div>
                                                        </div>                                                       
                                                        
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>DRESS</label>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <select name="dress" id="dress">
                                                            <option value="">--</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="2">2</option>
                                                                <option value="4">4</option>
                                                                <option value="6">6</option>
                                                                <option value="8">8</option>
                                                                <option value="10">10</option>
                                                                <option value="12">12</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="14W">14W</option>
                                                                <option value="16W">16W</option>
                                                                <option value="18W">18W</option>
                                                                <option value="20W">20W</option>
                                                                <option value="22W">22W</option>
                                                                <option value="24W">24W</option>
                                                            </optgroup>
                                                        </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="dress_recomended" id="dress_recomended">
                                                            <option value="">--</option>
                                                            <option value="L (10-12)">L (10-12)</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="XXS (00)">XXS (00)</option>
                                                                <option value="XS (0)">XS (0)</option>
                                                                <option value="S (2-4)">S (2-4)</option>
                                                                <option value="M (6-8)">M (6-8)</option>
                                                                <option value="L (10-12)">L (10-12)</option>
                                                                <option value="XL (14)">XL (14)</option>
                                                                <option value="XXL (16)">XXL (16)</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="1X (14W-16W)">1X (14W-16W)</option>
                                                                <option value="2X (18W-20W)">2X (18W-20W)</option>
                                                                <option value="3X (22W-24W)">3X (22W-24W)</option>
                                                            </optgroup>
                                                        </select>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <label>SHIRT & BLOUSE</label>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <select name="shirt_blouse" id="shirt_blouse">
                                                            <option value="">--</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="2">2</option>
                                                                <option value="4">4</option>
                                                                <option value="6">6</option>
                                                                <option value="8">8</option>
                                                                <option value="10">10</option>
                                                                <option value="12">12</option>

                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="14W">14W</option>
                                                                <option value="16W">16W</option>
                                                                <option value="18W">18W</option>
                                                                <option value="20W">20W</option>
                                                                <option value="22W">22W</option>
                                                                <option value="24W">24W</option>
                                                            </optgroup>
                                                        </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="shirt_blouse_recomend" id=" shirt_blouse_recomend ">
                                                            <option value="">--</option>
                                                            <optgroup label="Recommended for 2" style="display: block;">
                                                                <option value="S (2-4)">S (2-4)</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="S (2-4)">S (2-4)</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="XXS (00)">XXS (00)</option>
                                                                <option value="XS (0)">XS (0)</option>
                                                                <option value="S (2-4)">S (2-4)</option>
                                                                <option value="M (6-8)">M (6-8)</option>
                                                                <option value="L (10-12)">L (10-12)</option>
                                                                <option value="XL (14)">XL (14)</option>
                                                                <option value="XXL (16)">XXL (16)</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="1X (14W-16W)">1X (14W-16W)</option>
                                                                <option value="2X (18W-20W)">2X (18W-20W)</option>
                                                                <option value="3X (22W-24W)">3X (22W-24W)</option>
                                                            </optgroup>
                                                        </select>
                                                            </div>
                                                        </div>
                                                        <label>TOP SIZE</label>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <select name="pantsr1" id="pantsr1">
                                                            <option value="" selected="selected">--</option>
                                                            <option value="4">4</option>
                                                            <option value="4.5">4.5</option>
                                                            <option value="5">5</option>
                                                            <option value="5.5">5.5</option>
                                                            <option value="6">6</option>
                                                            <option value="6.5">6.5</option>
                                                            <option value="7">7</option>
                                                            <option value="7.5">7.5</option>
                                                            <option value="8">8</option>
                                                            <option value="8.5">8.5</option>
                                                        </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select name="pantsr2" id="pantsr2">
                                                            <option value="" selected="selected">--</option>
                                                            <option value="Narrow">Narrow</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Wide">Wide</option>
                                                            <option value="Extra Wide">Extra Wide</option> 

                                                        </select>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </div>                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">What is your shoe size?<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select name="shoe" id="shoe">
                                                            <option value="" selected="selected">--</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleInputPassword1"> Which style of shoes do you prefer?(Select all that apply) </labl

                                                            <select name="shoes_prefer" class="form-control" aria-invalid="false">
                                                                <option value="">--</option>
                                                                <option <?php if (@$editproduct->shoes_prefer == 'Pumps') { ?> selected="" <?php } ?> value="Pumps">Pumps</option>
                                                                <option <?php if (@$editproduct->shoes_prefer == 'Sandals') { ?> selected="" <?php } ?> value="Sandals">Sandals</option>
                                                                <option <?php if (@$editproduct->shoes_prefer == 'Loafers & Flats') { ?> selected="" <?php } ?> value="Loafers & Flats">Loafers & Flats</option>
                                                                <option <?php if (@$editproduct->shoes_prefer == 'Wedges') { ?> selected="" <?php } ?> value="Wedges">Wedges</option>
                                                                <option <?php if (@$editproduct->shoes_prefer == 'Clogs & Mules') { ?> selected="" <?php } ?> value="Clogs & Mules">Clogs & Mules</option>
                                                                <option <?php if (@$editproduct->shoes_prefer == 'Sneakers') { ?> selected="" <?php } ?> value="Sneakers">Sneakers</option>
                                                                <option <?php if (@$editproduct->shoes_prefer == 'Boots & Booties') { ?> selected="" <?php } ?> value="Boots & Booties">Boots & Booties</option>
                                                                <option <?php if (@$editproduct->shoes_prefer == 'Platforms') { ?> selected="" <?php } ?> value="Platforms">Platforms</option>

                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Which heel height do you prefer?</label>
                                                <select name="womenHeelHightPrefer" id="womenHeelHightPrefer" aria-required="true" class="form-control" aria-invalid="false">

                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'Flat(Under 1")') { ?> selected="" <?php } ?> value="Flat(Under 1')">Flat(Under 1")</option>
                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'Mid(2"-3")') { ?> selected="" <?php } ?> value="Mid(2'-3')">Mid(2"-3")</option>
                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'High(3"-4")') { ?> selected="" <?php } ?> value="High(3'-4')">High(3"-4")</option>
                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'Low(1"-2")') { ?> selected="" <?php } ?> value="Low(1-2')">Low(1"-2")</option>
                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'Ultra High(4.5"+)') { ?> selected="" <?php } ?> value="Ultra High(4.5'+)">Ultra High(4.5"+)</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tell us your skin Tone? ?<span style="color:#FF0000">*</span></label>
                                                <select name="for_better_skin_tone" class="form-control">
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '1') { ?> selected="" <?php } ?> value="1">IndianRed</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '2') { ?> selected="" <?php } ?> value="2">DarkSalmon</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '3') { ?> selected="" <?php } ?> value="3">LightSalmon</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '4') { ?> selected="" <?php } ?> value="4">DarkRed</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '5') { ?> selected="" <?php } ?> value="5">Extra Wide</option>
                                                    <option <?php if (@$editproduct->for_better_skin_tone == '6') { ?> selected="" <?php } ?> value="6">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shoulders?<span style="color:#FF0000">*</span></label>
                                                <select name="proportion_shoulders" id="proportion_shoulders">
                                                    <option value="" selected="selected">--</option>
                                                    <optgroup label="Women's Sizes">
                                                        <option value="00">00</option>
                                                        <option value="0">0</option>
                                                        <option value="2">2</option>
                                                        <option value="4">4</option>
                                                        <option value="6">6</option>
                                                        <option value="8">8</option>
                                                        <option value="10">10</option>
                                                        <option value="12">12</option>
                                                        <option value="14">14</option>
                                                        <option value="16">16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="14W">14W</option>
                                                        <option value="16W">16W</option>
                                                        <option value="18W">18W</option>
                                                        <option value="20W">20W</option>
                                                        <option value="22W">22W</option>
                                                        <option value="24W">24W</option>
                                                    </optgroup>
                                                </select>                                         
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shoulders?<span style="color:#FF0000">*</span></label>
                                                <select name="proportion_shoulders" id="proportion_shoulders">
                                                    <option value="" selected="selected">--</option>
                                                    <optgroup label="Women's Sizes">
                                                        <option value="00">00</option>
                                                        <option value="0">0</option>
                                                        <option value="2">2</option>
                                                        <option value="4">4</option>
                                                        <option value="6">6</option>
                                                        <option value="8">8</option>
                                                        <option value="10">10</option>
                                                        <option value="12">12</option>
                                                        <option value="14">14</option>
                                                        <option value="16">16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="14W">14W</option>
                                                        <option value="16W">16W</option>
                                                        <option value="18W">18W</option>
                                                        <option value="20W">20W</option>
                                                        <option value="22W">22W</option>
                                                        <option value="24W">24W</option>
                                                    </optgroup>
                                                </select>                                         
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Arms?<span style="color:#FF0000">*</span></label>
                                                <select name="proportion_arms" id="proportion_arms">
                                                    <option value="" selected="selected">--</option>
                                                    <option value="XXS">XXS</option>
                                                    <option value="XS">XS</option>
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                    <option value="1X">1X</option>
                                                    <option value="2X">2X</option>
                                                    <option value="3X">3X</option>  

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Hips? ?<span style="color:#FF0000">*</span></label>
                                                <select name="proportion_hips" id="jeans">
                                                    <option value="">--</option>
                                                    <optgroup label="Women's Sizes"> 
                                                        <option value="" selected="selected">--</option>
                                                        <option value="00">00</option>
                                                        <option value="0">0</option>
                                                        <option value="2">2</option>
                                                        <option value="4">4</option>
                                                        <option value="6">6</option>
                                                        <option value="8">8</option>
                                                        <option value="10">10</option>
                                                        <option value="12">12</option>
                                                        <option value="14">14</option>
                                                        <option value="16">16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="14W">14W</option>
                                                        <option value="16W">16W</option>
                                                        <option value="18W">18W</option>
                                                        <option value="20W">20W</option>
                                                        <option value="22W">22W</option>
                                                        <option value="24W">24W</option>
                                                    </optgroup>
                                                </select>                                          
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter purchase price', 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quantity ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter quantity', 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status<span style="color:#FF0000">*</span></label>
                                                <select name="available_status" class="form-control">
                                                    <option <?php if (@$editproduct->available_status == '1') { ?> selected="" <?php } ?> value="1">Available</option>                                
                                                    <option <?php if (@$editproduct->available_status == '2') { ?> selected="" <?php } ?> value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image<span style="color:#FF0000">*</span></label>
                                                <?php if (@$editproduct->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } else { ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('product_image', ['type' => 'file', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Select a image']); ?>                                        
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                <?php } ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'required' => "required", 'label' => false, 'placeholder' => 'Please enter note']); ?>
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
                            <?php if (@$profile == 'BoyKids' || @$profile == '') { ?>
                                <div class="tab-content" style="width: 100%;float: left;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Height?<span style="color:#FF0000">*</span></label>

                                                <select name="tell_in_feet" id="tall_feet">
                                                    <option <?php if (@$editproduct->best_fit_for_height == '') { ?> selected=""<?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                </select>
                                                <label>ft.</label>
                                                <select name="tell_in_inch" id="tell_inch">
                                                    <option <?php if (@$editproduct->tell_in_inch == '') { ?> selected=""<?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '1') { ?> selected=""<?php } ?> value="1">1</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '2') { ?> selected=""<?php } ?>value="2">2</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '3') { ?> selected=""<?php } ?>value="3">3</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '4') { ?> selected=""<?php } ?> value="4">4</option>
                                                    <option  <?php if (@$editproduct->tell_in_inch == '5') { ?> selected=""<?php } ?>value="5">5</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '9') { ?> selected=""<?php } ?> value="9">9</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '10') { ?> selected=""<?php } ?> value="10">10</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '11') { ?> selected=""<?php } ?> value="11">11</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                </select>

                                                <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Weight ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your weight', 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TOPS SIZE?<span style="color:#FF0000">*</span></label>
                                                <select name="top_size" id="top_size">
                                                    <option value="">--</option>
                                                    <optgroup label="Toddler Sizing">
                                                        <option <?php if (@$editproduct->top_size == '2t') { ?> selected=""<?php } ?>  valu="2T">2T</option>
                                                        <option <?php if (@$editproduct->top_size == '3t') { ?> selected=""<?php } ?> value="3T">3T</option>
                                                        <option <?php if (@$editproduct->top_size == '4t') { ?> selected=""<?php } ?> value="4T">4T</option>
                                                    </optgroup>
                                                    <optgroup label="Kid Sizing">
                                                        <option <?php if (@$editproduct->top_size == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                        <option <?php if (@$editproduct->top_size == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        <option <?php if (@$editproduct->top_size == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                        <option <?php if (@$editproduct->top_size == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                        <option  <?php if (@$editproduct->top_size == '10') { ?> selected=""<?php } ?>value="10">10</option>
                                                        <option  <?php if (@$editproduct->top_size == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                        <option  <?php if (@$editproduct->top_size == '14') { ?> selected=""<?php } ?> value="14">14</option>
                                                    </optgroup>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">BOTTOMS SIZE<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <select name="bottom_size" id="bottom_size">

                                                        <optgroup label="Toddler Sizing">

                                                            <option <?php if (@$editproduct->bottom_size == '2t') { ?> selected=""<?php } ?> value="2T">2T</option>
                                                            <option <?php if (@$editproduct->bottom_size == '3t') { ?> selected=""<?php } ?>  value="3T">3T</option>
                                                            <option <?php if (@$editproduct->bottom_size == '4t') { ?> selected=""<?php } ?>  value="4T">4T</option>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">SHOE SIZE?<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select name="shoe_size" id="shoe_size">
                                                            <option value="">--</option>
                                                            <optgroup label="Toddler Sizing">
                                                                <option <?php if (@$editproduct->shoe_size == '2 Child') { ?> selected=""<?php } ?> value="2 Child">2 Child</option>
                                                                <option <?php if (@$editproduct->shoe_size == '3 Child') { ?> selected=""<?php } ?> value="3 Child">3 Child</option>
                                                                <option <?php if (@$editproduct->shoe_size == '4 Child') { ?> selected=""<?php } ?> value="4 Child">4 Child</option>
                                                                <option <?php if (@$editproduct->shoe_size == '5 Child') { ?> selected=""<?php } ?> shoe_sizevalue="5 Child">5 Child</option>
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

                                    </div>





                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter purchase price', 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quantity ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter quantity', 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status<span style="color:#FF0000">*</span></label>
                                                <select name="available_status" class="form-control">
                                                    <option <?php if (@$editproduct->available_status == '1') { ?> selected="" <?php } ?> value="1">Available</option>                                
                                                    <option <?php if (@$editproduct->available_status == '2') { ?> selected="" <?php } ?> value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image<span style="color:#FF0000">*</span></label>
                                                <?php if (@$editproduct->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } else { ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('product_image', ['type' => 'file', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Select a image']); ?>                                        
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                <?php } ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'required' => "required", 'label' => false, 'placeholder' => 'Please enter note']); ?>
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
                            <?php if (@$profile == 'GirlKids' || @$profile == '') { ?>
                                <div class="tab-content" style="width: 100%;float: left;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Height?<span style="color:#FF0000">*</span></label>

                                                <select name="tell_in_feet" id="tall_feet">
                                                    <option <?php if (@$editproduct->best_fit_for_height == '') { ?> selected=""<?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '4') { ?> selected=""<?php } ?>value="4">4</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                    <option <?php if (@$editproduct->best_fit_for_height == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                </select>
                                                <label>ft.</label>
                                                <select name="tell_in_inch" id="tell_inch">
                                                    <option <?php if (@$editproduct->tell_in_inch == '') { ?> selected=""<?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '1') { ?> selected=""<?php } ?> value="1">1</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '2') { ?> selected=""<?php } ?>value="2">2</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '3') { ?> selected=""<?php } ?>value="3">3</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '4') { ?> selected=""<?php } ?> value="4">4</option>
                                                    <option  <?php if (@$editproduct->tell_in_inch == '5') { ?> selected=""<?php } ?>value="5">5</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '9') { ?> selected=""<?php } ?> value="9">9</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '10') { ?> selected=""<?php } ?> value="10">10</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '11') { ?> selected=""<?php } ?> value="11">11</option>
                                                    <option <?php if (@$editproduct->tell_in_inch == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                </select>

                                                <?= $this->Form->input('id', ['value' => @$editproduct->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Child Weight ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('best_fit_for_weight', ['value' => @$editproduct->best_fit_for_weight, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your weight', 'label' => false, 'placeholder' => 'Please enter your weight']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TOPS SIZE?<span style="color:#FF0000">*</span></label>
                                                <select name="top_size" id="top_size">
                                                    <option value="">--</option>
                                                    <optgroup label="Toddler Sizing">
                                                        <option <?php if (@$editproduct->top_size == '2t') { ?> selected=""<?php } ?>  valu="2T">2T</option>
                                                        <option <?php if (@$editproduct->top_size == '3t') { ?> selected=""<?php } ?> value="3T">3T</option>
                                                        <option <?php if (@$editproduct->top_size == '4t') { ?> selected=""<?php } ?> value="4T">4T</option>
                                                    </optgroup>
                                                    <optgroup label="Kid Sizing">
                                                        <option <?php if (@$editproduct->top_size == '5') { ?> selected=""<?php } ?> value="5">5</option>
                                                        <option <?php if (@$editproduct->top_size == '6') { ?> selected=""<?php } ?> value="6">6</option>
                                                        <option <?php if (@$editproduct->top_size == '7') { ?> selected=""<?php } ?> value="7">7</option>
                                                        <option <?php if (@$editproduct->top_size == '8') { ?> selected=""<?php } ?> value="8">8</option>
                                                        <option  <?php if (@$editproduct->top_size == '10') { ?> selected=""<?php } ?>value="10">10</option>
                                                        <option  <?php if (@$editproduct->top_size == '12') { ?> selected=""<?php } ?> value="12">12</option>
                                                        <option  <?php if (@$editproduct->top_size == '14') { ?> selected=""<?php } ?> value="14">14</option>
                                                    </optgroup>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">BOTTOMS SIZE<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <select name="bottom_size" id="bottom_size">

                                                        <optgroup label="Toddler Sizing">

                                                            <option <?php if (@$editproduct->bottom_size == '2t') { ?> selected=""<?php } ?> value="2T">2T</option>
                                                            <option <?php if (@$editproduct->bottom_size == '3t') { ?> selected=""<?php } ?>  value="3T">3T</option>
                                                            <option <?php if (@$editproduct->bottom_size == '4t') { ?> selected=""<?php } ?>  value="4T">4T</option>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">SHOE SIZE?<span style="color:#FF0000">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select name="shoe_size" id="shoe_size">
                                                            <option value="">--</option>
                                                            <optgroup label="Toddler Sizing">
                                                                <option <?php if (@$editproduct->shoe_size == '2 Child') { ?> selected=""<?php } ?> value="2 Child">2 Child</option>
                                                                <option <?php if (@$editproduct->shoe_size == '3 Child') { ?> selected=""<?php } ?> value="3 Child">3 Child</option>
                                                                <option <?php if (@$editproduct->shoe_size == '4 Child') { ?> selected=""<?php } ?> value="4 Child">4 Child</option>
                                                                <option <?php if (@$editproduct->shoe_size == '5 Child') { ?> selected=""<?php } ?> shoe_sizevalue="5 Child">5 Child</option>
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

                                    </div>





                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Purchase price ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('purchase_price', ['value' => @$editproduct->purchase_price, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter purchase price', 'label' => false, 'placeholder' => 'Please enter purchase price']); ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quantity ?<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter quantity', 'label' => false, 'placeholder' => 'Please enter quantity']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status<span style="color:#FF0000">*</span></label>
                                                <select name="available_status" class="form-control">
                                                    <option <?php if (@$editproduct->available_status == '1') { ?> selected="" <?php } ?> value="1">Available</option>                                
                                                    <option <?php if (@$editproduct->available_status == '2') { ?> selected="" <?php } ?> value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image<span style="color:#FF0000">*</span></label>
                                                <?php if (@$editproduct->product_image) { ?>
                                                    <div class="form-group">
                                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                        <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                    </div>                                    
                                                <?php } else { ?>
                                                    <div class="form-group">
                                                        <?= $this->Form->input('product_image', ['type' => 'file', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Select a image']); ?>                                        
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                <?php } ?>                            
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Note<span style="color:#FF0000">*</span></label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'required' => "required", 'label' => false, 'placeholder' => 'Please enter note']); ?>
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
    <?php if (@$profile == 'Men' || @$profile == '') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Best Fit Height</th>
                                        <th>Best Fit Height</th>
                                        <th>Price</th>
                                        <th style="width: 10%;text-align: center;">Created</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">
                                            <td><?php echo $pdetails->best_fit_for_height; ?></td>
                                            <td><?php echo $pdetails->best_fit_for_weight; ?></td>
                                            <td><?php echo $pdetails->purchase_price; ?></td>
                                            <td style="text-align: center;"><?php echo $pdetails->created; ?></td>
                                            <td style="text-align: center;">                                            
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $pdetails->id, 'Products'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                                <?php if ($pdetails->is_active == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/Products'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/Products'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </section>
    <?php } ?>
    <?php if (@$profile == 'Women' || @$profile == '') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Best Fit Height</th>
                                        <th>Best Fit Height</th>
                                        <th>Price</th>
                                        <th style="width: 10%;text-align: center;">Created</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">
                                            <td><?php echo $pdetails->best_fit_for_height; ?></td>
                                            <td><?php echo $pdetails->best_fit_for_weight; ?></td>
                                            <td><?php echo $pdetails->purchase_price; ?></td>
                                            <td style="text-align: center;"><?php echo $pdetails->created; ?></td>
                                            <td style="text-align: center;">                                            
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $pdetails->id, 'Products'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                                <?php if ($pdetails->is_active == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/Products'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/Products'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </section>
    <?php } ?>
    <?php if (@$profile == 'BoyKids' || @$profile == '') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Best Fit Height</th>
                                        <th>Best Fit Height</th>
                                        <th>Price</th>
                                        <th style="width: 10%;text-align: center;">Created</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">
                                            <td><?php echo $pdetails->best_fit_for_height; ?></td>
                                            <td><?php echo $pdetails->best_fit_for_weight; ?></td>
                                            <td><?php echo $pdetails->purchase_price; ?></td>
                                            <td style="text-align: center;"><?php echo $pdetails->created; ?></td>
                                            <td style="text-align: center;">                                            
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $pdetails->id, 'Products'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                                <?php if ($pdetails->is_active == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/Products'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/Products'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </section>
    <?php } ?>
    <?php if (@$profile == 'GirlKids' || @$profile == '') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Best Fit Height</th>
                                        <th>Best Fit Height</th>
                                        <th>Price</th>
                                        <th style="width: 10%;text-align: center;">Created</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">
                                            <td><?php echo $pdetails->best_fit_for_height; ?></td>
                                            <td><?php echo $pdetails->best_fit_for_weight; ?></td>
                                            <td><?php echo $pdetails->purchase_price; ?></td>
                                            <td style="text-align: center;"><?php echo $pdetails->created; ?></td>
                                            <td style="text-align: center;">                                            
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $pdetails->id, 'Products'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                                <?php if ($pdetails->is_active == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/Products'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/Products'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        </section>
    <?php } ?>

</div>


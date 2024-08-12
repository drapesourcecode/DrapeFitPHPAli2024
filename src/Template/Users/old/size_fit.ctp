<div class="style-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <ul>
                    <li><a href="#">STYLE PROFILE</a></li>
                    <li><a href="#">REFER</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="style-contain">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" <?php if ($slug == '') { ?> class="active" <?php } ?>><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Size</a></li>
                        <li role="presentation" <?php if ($slug == 'fit_cut') { ?> class="active" <?php } ?>><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Fit/Cut</a></li>
                        <li role="presentation" <?php if ($slug == 'style') { ?> class="active" <?php } ?>><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Style</a></li>
                        <li role="presentation" <?php if ($slug == 'price') { ?> class="active" <?php } ?>><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab">Price</a></li>
                        <li role="presentation" <?php if ($slug == 'information') { ?> class="active" <?php } ?>><a href="#Section5" aria-controls="messages" role="tab" data-toggle="tab">More About You</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs data-filup ">
                        <div role="tabpanel" class="tab-pane fade <?php if ($slug == '') { ?>  active in <?php } ?>"   id="Section1">
                            <h1>Hi, <?php echo $userDetails->user_detail->first_name; ?></h1>
                            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                            <p>Want to keep your Stylist in the loop? Update your Style Profile to reflect your current tastes and needs.</p>
                            <p><span>We currently carry sizes 0–24W (XS–3X), as well as maternity and petite clothing.</span></p>
                            <div class="form-box-data">

                                <div class="row">
                                    <?= $this->Flash->render() ?>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h3>How tall are you?</h3>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <select name="tell_in_feet" id="feet" >
                                                    <option value="">--</option>
                                                    <option <?php if (@$PersonalizedFix->tell_in_feet == 4) { ?>selected="selected" <?php } ?> value="4"> 4</option>
                                                    <option  <?php if (@$PersonalizedFix->tell_in_feet == 5) { ?>selected="selected" <?php } ?>value="5">5</option>
                                                    <option <?php if (@$PersonalizedFix->tell_in_feet == 6) { ?>selected="selected" <?php } ?>value="6">6</option>
                                                </select>
                                                <label>ft.</label>
                                            </div>
                                            <div class=" select-box">
                                                <select name="tell_in_inch" id="tell_in_inch">
                                                    <option value="">--</option>
                                                    <?php for ($inc = 1; $inc <= 12; $inc++) { ?>
                                                        <option <?php if ($PersonalizedFix->tell_in_inch == $inc) { ?>selected="selected"<?php } ?> value="<?php echo $inc; ?>"><?php echo $inc; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label>in.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h3>What is your weight?</h3>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <input type="text" placeholder="" name="wt" id="wt" value="<?php echo $PersonalizedFix->weight_lbs; ?>">
                                                <label>lbs.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>What sizes do you typically wear?</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4 style="margin-top: 0;">DRESS</h4>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <select name="dress" id="dress">
                                                    <option value="">--</option>
                                                    <optgroup label="Women's Sizes">
                                                        <option value="">--</option>
                                                        <?php for ($inc = 2; $inc <= 12; $inc += 2) { ?>
                                                            <option <?php if ($SizeChart->dress == $inc) { ?>selected="selected" <?php } ?> value="<?php echo $inc; ?>"><?php echo $inc; ?></option>
                                                        <?php } ?>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="14W" <?php if ($SizeChart->dress == "14W") { ?>selected="selected" <?php } ?>>14W</option>
                                                        <option value="16W" <?php if ($SizeChart->dress == "16W") { ?> selected="selected" <?php } ?>>16W</option>
                                                        <option value="18W" <?php if ($SizeChart->dress == "18W") { ?> selected="selected" <?php } ?>>18W</option>
                                                        <option value="20W" <?php if ($SizeChart->dress == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                        <option value="22W" <?php if ($SizeChart->dress == "22W") { ?>selected="selected"<?php } ?>>22W</option>
                                                        <option value="24W" <?php if ($SizeChart->dress == "24W") { ?> selected="selected" <?php } ?>>24W</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="select-box select-box2">
                                                <select name="dress_recomended" id="dress_recomended">
                                                    <option value="">--</option>
                                                    <option value="">L (10-12)</option>
                                                    <optgroup label="Women's Sizes">
                                                        <option value="XXS (00)" <?php if ($SizeChart->dress_recomended == "XXS (00)") { ?>selected="selected" <?php } ?>>XXS (00)</option>
                                                        <option value="XS (0)" <?php if ($SizeChart->dress_recomended == "XS (0)") { ?>selected="selected" <?php } ?>>XS (0)</option>
                                                        <option value="S (2-4)" <?php if ($SizeChart->dress_recomended == "S (2-4)") { ?>selected="selected" <?php } ?>>S (2-4)</option>
                                                        <option value="M (6-8)" <?php if ($SizeChart->dress_recomended == "M (6-8)") { ?>selected="selected" <?php } ?>>M (6-8)</option>
                                                        <option value="L (10-12)" <?php if ($SizeChart->dress_recomended == "L (10-12)") { ?>selected="selected" <?php } ?>>L (10-12)</option>
                                                        <option value="XL (14)" <?php if ($SizeChart->dress_recomended == "XL (14)") { ?>selected="selected" <?php } ?>>XL (14)</option>
                                                        <option value="XXL (16)" <?php if ($SizeChart->dress_recomended == "XXL (16)") { ?>selected="selected" <?php } ?>>XXL (16)</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="1X (14W-16W)" <?php if ($SizeChart->dress_recomended == "1X (14W-16W)") { ?>selected="selected" <?php } ?>>1X (14W-16W)</option>
                                                        <option value="2X (18W-20W)" <?php if ($SizeChart->dress_recomended == "2X (18W-20W)") { ?>selected="selected" <?php } ?>>2X (18W-20W)</option>
                                                        <option value="3X (22W-24W)" <?php if ($SizeChart->dress_recomended == "3X (22W-24W)") { ?>selected="selected" <?php } ?>>3X (22W-24W)</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4 style="margin-top: 0;">SHIRT & BLOUSE</h4>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <select name="shirt_blouse" id="shirt_blouse">
                                                    <option value="">--</option>
                                                    <optgroup label="Women's Sizes">
                                                        <?php for ($inc = 2; $inc <= 12; $inc += 2) { ?>
                                                            <option <?php if ($SizeChart->shirt_blouse == $inc) { ?> selected="selected"<?php } ?> value="<?php echo $inc; ?>"><?php echo $inc; ?></option>
                                                        <?php } ?>

                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="14W" <?php if ($SizeChart->shirt_blouse == "14W") { ?> selected="selected"<?php } ?> >14W</option>
                                                        <option value="16W" <?php if ($SizeChart->shirt_blouse == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                        <option value='18W' <?php if ($SizeChart->shirt_blouse == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                        <option value="20W" <?php if ($SizeChart->shirt_blouse == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                        <option value="22W" <?php if ($SizeChart->shirt_blouse == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                        <option value="24W" <?php if ($SizeChart->shirt_blouse == "22W") { ?> selected="selected"<?php } ?>>24W</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="select-box select-box2">
                                                <select name=" shirt_blouse_recomend " id=" shirt_blouse_recomend ">
                                                    <option value="">--</option>
                                                    <optgroup label="Recommended for 2" style="display: block;">
                                                        <option value="S (2-4)" <?php if ($SizeChart->shirt_blouse_recomend == "S (2-4)") { ?> selected="selected"<?php } ?>>S (2-4)</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Sizes">
                                                        <option value="XXS (00)" <?php if ($SizeChart->shirt_blouse_recomend == "XXS (00)") { ?> selected="selected"<?php } ?>>XXS (00)</option>
                                                        <option value="XS (0)" <?php if ($SizeChart->shirt_blouse_recomend == "XS (0)") { ?> selected="selected"<?php } ?>>XS (0)</option>
                                                        <option value="S (2-4)" <?php if ($SizeChart->shirt_blouse_recomend == "S (2-4)") { ?> selected="selected"<?php } ?>>S (2-4)</option>
                                                        <option value="M (6-8)" <?php if ($SizeChart->shirt_blouse_recomend == "M (6-8)") { ?> selected="selected"<?php } ?>>M (6-8)</option>
                                                        <option value="L (10-12)" <?php if ($SizeChart->shirt_blouse_recomend == "L (10-12)") { ?> selected="selected"<?php } ?>>L (10-12)</option>
                                                        <option value="XL (14)" <?php if ($SizeChart->shirt_blouse_recomend == "XL (14)") { ?> selected="selected"<?php } ?>>XL (14)</option>
                                                        <option value="XXL (16)" <?php if ($SizeChart->shirt_blouse_recomend == "XXL (16)") { ?> selected="selected"<?php } ?>>XXL (16)</option></optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="1X (14W-16W)" <?php if ($SizeChart->shirt_blouse_recomend == "1X (14W-16W)") { ?> selected="selected"<?php } ?>>1X (14W-16W)</option>
                                                        <option value="2X (18W-20W)" <?php if ($SizeChart->shirt_blouse_recomend == "2X (18W-20W)") { ?> selected="selected"<?php } ?>>2X (18W-20W)</option>
                                                        <option value="3X (22W-24W)" <?php if ($SizeChart->shirt_blouse_recomend == "3X (22W-24W)") { ?> selected="selected"<?php } ?>>3X (22W-24W)</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>BRA</h4>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <select name="bra" id="bra">
                                                    <option value="">--</option>
                                                    <option value="30" <?php if ($SizeChart->bra == "30") { ?> selected="selected"<?php } ?>>30</option>
                                                    <option value="32" <?php if ($SizeChart->bra == "32") { ?> selected="selected"<?php } ?>>32</option>
                                                    <option value="34" <?php if ($SizeChart->bra == "34") { ?> selected="selected"<?php } ?>>34</option>
                                                    <option value="36" <?php if ($SizeChart->bra == "36") { ?> selected="selected"<?php } ?>>36</option>
                                                    <option value="38" <?php if ($SizeChart->bra == "38") { ?> selected="selected"<?php } ?>>38</option>
                                                    <option value="40" <?php if ($SizeChart->bra == "40") { ?> selected="selected"<?php } ?>>40</option>
                                                    <option value="42" <?php if ($SizeChart->bra == "42") { ?> selected="selected"<?php } ?>>42</option>
                                                    <option value="44" <?php if ($SizeChart->bra == "44") { ?> selected="selected"<?php } ?>>44</option>
                                                    <option value="46" <?php if ($SizeChart->bra == "46") { ?> selected="selected"<?php } ?>>46</option></select>
                                            </div>
                                            <div class="select-box">
                                                <select name="bra_recomend" id="bra_recomend">
                                                    <option value="">--</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "AA") { ?> selected="selected"<?php } ?> value="AA">AA</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "A") { ?> selected="selected"<?php } ?> value="A">A</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "B") { ?> selected="selected"<?php } ?> value="B">B</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "C") { ?> selected="selected"<?php } ?> value="C">C</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "D") { ?> selected="selected"<?php } ?> value="D">D</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "DD") { ?> selected="selected"<?php } ?> value="DD">DD</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "DDD") { ?> selected="selected"<?php } ?> value="DDD">DDD</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "F") { ?> selected="selected"<?php } ?> value="F">F</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "G") { ?> selected="selected"<?php } ?> value="G">G</option>
                                                    <option <?php if ($SizeChart->bra_recomend == "H") { ?> selected="selected"<?php } ?> value="H">H</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>SKIRT</h4>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <select name="skirt" id="skirt">
                                                    <option value="">--</option>
                                                    <option value="XXS" <?php if ($SizeChart->skirt == "XXS") { ?> selected="selected"<?php } ?>>XXS</option>
                                                    <option value="XS" <?php if ($SizeChart->skirt == "XS") { ?> selected="selected"<?php } ?>>XS</option>
                                                    <option value="S" <?php if ($SizeChart->skirt == "S") { ?> selected="selected"<?php } ?>>S</option>
                                                    <option value="M" <?php if ($SizeChart->skirt == "M") { ?> selected="selected"<?php } ?>>M</option>
                                                    <option value="L" <?php if ($SizeChart->skirt == "L") { ?> selected="selected"<?php } ?>>L</option>
                                                    <option value="XL" <?php if ($SizeChart->skirt == "XL") { ?> selected="selected"<?php } ?>>XL</option>
                                                    <option value="XXL" <?php if ($SizeChart->skirt == "XXL") { ?> selected="selected"<?php } ?>>XXL</option>
                                                    <option value="1X" <?php if ($SizeChart->skirt == "1X") { ?> selected="selected"<?php } ?>>1X</option>
                                                    <option value="2X" <?php if ($SizeChart->skirt == "2X") { ?> selected="selected"<?php } ?>>2X</option>
                                                    <option value="3X" <?php if ($SizeChart->skirt == "3X") { ?> selected="selected"<?php } ?>>3X</option></select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>PANTS</h4>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <select name="pants" id="pants">
                                                    <option value="">--</option>
                                                    <optgroup label="Women's Sizes">
                                                        <option value="00" <?php if ($SizeChart->pants == "00") { ?> selected="selected"<?php } ?>>00</option>
                                                        <option value="0" <?php if ($SizeChart->pants == "0") { ?> selected="selected"<?php } ?>>0</option>
                                                        <option value="2" <?php if ($SizeChart->pants == "2") { ?> selected="selected"<?php } ?>>2</option>
                                                        <option value="4" <?php if ($SizeChart->pants == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                        <option value="6" <?php if ($SizeChart->pants == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                        <option value="8" <?php if ($SizeChart->pants == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                        <option value="10" <?php if ($SizeChart->pants == "10") { ?> selected="selected"<?php } ?>>10</option>
                                                        <option value="12" <?php if ($SizeChart->pants == "12") { ?> selected="selected"<?php } ?>>12</option>
                                                        <option value="14" <?php if ($SizeChart->pants == "14") { ?> selected="selected"<?php } ?>>14</option>
                                                        <option value="16" <?php if ($SizeChart->pants == "16") { ?> selected="selected"<?php } ?>>16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="14W" <?php if ($SizeChart->pants == "14W") { ?> selected="selected"<?php } ?>>14W</option>
                                                        <option value="16W" <?php if ($SizeChart->pants == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                        <option value="18W" <?php if ($SizeChart->pants == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                        <option value="20W" <?php if ($SizeChart->pants == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                        <option value="22W" <?php if ($SizeChart->pants == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                        <option value="24W" <?php if ($SizeChart->pants == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                    </optgroup>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>JEANS</h4>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <select name="jeans" id="jeans">
                                                    <option value="">--</option>
                                                    <optgroup label="Women's Sizes">
                                                        <option value="00" <?php if ($SizeChart->jeans == "00") { ?> selected="selected"<?php } ?>>00</option>
                                                        <option value="0" <?php if ($SizeChart->jeans == "0") { ?> selected="selected"<?php } ?>>0</option>
                                                        <option value="2" <?php if ($SizeChart->jeans == "2") { ?> selected="selected"<?php } ?>>2</option>
                                                        <option value="4" <?php if ($SizeChart->jeans == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                        <option value="6" <?php if ($SizeChart->jeans == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                        <option value="8" <?php if ($SizeChart->jeans == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                        <option value="10" <?php if ($SizeChart->jeans == "10") { ?> selected="selected"<?php } ?>>10</option>
                                                        <option value="12" <?php if ($SizeChart->jeans == "12") { ?> selected="selected"<?php } ?>>12</option>
                                                        <option value="14" <?php if ($SizeChart->jeans == "14") { ?> selected="selected"<?php } ?>>14</option>
                                                        <option value="16" <?php if ($SizeChart->jeans == "16") { ?> selected="selected"<?php } ?>>16</option>
                                                    </optgroup>
                                                    <optgroup label="Women's Plus Sizes">
                                                        <option value="14W" <?php if ($SizeChart->jeans == "14W") { ?> selected="selected"<?php } ?>>14W</option>
                                                        <option value="16W" <?php if ($SizeChart->jeans == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                        <option value="18W" <?php if ($SizeChart->jeans == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                        <option value="20W" <?php if ($SizeChart->jeans == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                        <option value="22W" <?php if ($SizeChart->jeans == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                        <option value="24W" <?php if ($SizeChart->jeans == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                    </optgroup>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>PANTS</h4>
                                        <div class="select-boxes">
                                            <div class=" select-box">
                                                <select name="pantsr1" id="pantsr1">
                                                    <option value="">--</option>
                                                    <option value="4" <?php if ($SizeChart->pantsr1 == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                    <option value="4.5" <?php if ($SizeChart->pantsr1 == "4.5") { ?> selected="selected"<?php } ?>>4.5</option>
                                                    <option value="5" <?php if ($SizeChart->pantsr1 == "5") { ?> selected="selected"<?php } ?>>5</option>
                                                    <option value="5.5" <?php if ($SizeChart->pantsr1 == "5.5") { ?> selected="selected"<?php } ?>>5.5</option>
                                                    <option value="6" <?php if ($SizeChart->pantsr1 == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                    <option value="6.5" <?php if ($SizeChart->pantsr1 == "6.5") { ?> selected="selected"<?php } ?>>6.5</option>
                                                    <option value="7" <?php if ($SizeChart->pantsr1 == "7") { ?> selected="selected"<?php } ?>>7</option>
                                                    <option value="7.5" <?php if ($SizeChart->pantsr1 == "7.5") { ?> selected="selected"<?php } ?>>7.5</option>
                                                    <option value="8" <?php if ($SizeChart->pantsr1 == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                    <option value="8.5" <?php if ($SizeChart->pantsr1 == "8.5") { ?> selected="selected"<?php } ?>>8.5</option>
                                                </select>
                                            </div>
                                            <div class="select-box select-box2">
                                                <select name="pantsr2" id="pantsr2">
                                                    <option value="">--</option>
                                                    <option value="Narrow" <?php if ($SizeChart->pantsr2 == "Narrow") { ?> selected="selected"<?php } ?>>Narrow</option>
                                                    <option value="Medium" <?php if ($SizeChart->pantsr2 == "Medium") { ?> selected="selected"<?php } ?>>Medium</option>
                                                    <option value="Wide" <?php if ($SizeChart->pantsr2 == "Wide") { ?> selected="selected"<?php } ?>>Wide</option>
                                                    <option value="Extra Wide" <?php if ($SizeChart->pantsr2 == "Extra Wide") { ?> selected="selected"<?php } ?>>Extra Wide</option></select
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>Are you pregnant and interested in maternity clothing?</h3>

                                        <div class="switch-field">
                                            <input type="radio" id="switch_left" name="switch_2" value="yes" checked/>
                                            <label for="switch_left">Yes</label>
                                            <input type="radio" id="switch_right" name="switch_2" value="no" />
                                            <label for="switch_right">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>How would you characterize your proportions?</h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>ARMS</h4>	
                                        <label for="radioa" class="input-control radio">
                                            <input type="radio" id="radioa" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Short
                                        </label>

                                        <label for="radiob" class="input-control radio">
                                            <input type="radio" id="radiob" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Average
                                        </label>
                                        <label for="radioc" class="input-control radio">
                                            <input type="radio" id="radioc" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Long
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>SHOULDERS</h4>
                                        <label for="radiod" class="input-control radio">
                                            <input type="radio" id="radiod" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Narrow
                                        </label>

                                        <label for="radioe" class="input-control radio">
                                            <input type="radio" id="radioe" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Average
                                        </label>
                                        <label for="radiof" class="input-control radio">
                                            <input type="radio" id="radiof" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Broad
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>TORSO</h4>	
                                        <label for="radiog" class="input-control radio">
                                            <input type="radio" id="radiog" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Short
                                        </label>

                                        <label for="radioh" class="input-control radio">
                                            <input type="radio" id="radioh" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span> Average
                                        </label>
                                        <label for="radioi" class="input-control radio">
                                            <input type="radio" id="radioi" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Long
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>HIPS</h4>
                                        <label for="radioj" class="input-control radio">
                                            <input type="radio" id="radioj" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Narrow
                                        </label>

                                        <label for="radiok" class="input-control radio">
                                            <input type="radio" id="radiok" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Average
                                        </label>
                                        <label for="radiol" class="input-control radio">
                                            <input type="radio" id="radiol" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Broad
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h4>LEGS</h4>	
                                        <label for="radiom" class="input-control radio">
                                            <input type="radio" id="radiom" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Short
                                        </label>

                                        <label for="radion" class="input-control radio">
                                            <input type="radio" id="radion" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Average
                                        </label>
                                        <label for="radiok" class="input-control radio">
                                            <input type="radio" id="radiok" name="desired_casual" value="">
                                            <span class="input-control__indicator"></span>Long
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                    <button type="submit" name="size" value="size" >Next: Fit/Cut <i class="fas fa-arrow-right"></i></button>
                                    <a href="#">Save and return Home. »</a>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>

                        <div role="tabpanel" class="tab-pane fade  <?php if ($slug == 'fit_cut') { ?>  active in <?php } ?>" id="Section2">
                            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>How do you prefer clothes to fit your top half?</h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <li><label for="fit_your_top_half" class="input-control radio">
                                                    <input id="fit_your_top_half" name="fit_your_top_half" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Tight     
                                                </label>
                                            </li>
                                            <li><label for="fit_your_top_half" class="input-control radio">
                                                    <input id="fit_your_top_half" name="fit_your_top_half" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Fitted
                                                </label></li>
                                            <li><label for="fit_your_top_half" class="input-control radio">
                                                    <input id="fit_your_top_half" name="fit_your_top_half" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Straight
                                                </label></li>
                                            <li><label for="fit_your_top_half" class="input-control radio">
                                                    <input id="fit_your_top_half" name="fit_your_top_half" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Loose
                                                </label>
                                            </li>
                                            <li><label for="fit_your_top_half" class="input-control radio">
                                                    <input id="fit_your_top_half" name="fit_your_top_half" value="5" type="radio">
                                                    <span class="input-control__indicator"></span>Oversized
                                                </label></li>
                                        </ul>
                                    </div>

                                </div>	
                            </div>                             
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>When tops fit comfortably in your bust and shoulders, how do the waist and length generally fit?</h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4 style="margin-top: 0;">WAIST OPENING</h4>
                                            <li><label for="waist_opening" class="input-control radio">
                                                    <input id="waist_opening" name="waist_opening" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Too tight   
                                                </label>
                                            </li>
                                            <li><label for="waist_opening" class="input-control radio">
                                                    <input id="waist_opening" name="waist_opening" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Just right
                                                </label></li>
                                            <li><label for="waist_opening" class="input-control radio">
                                                    <input id="waist_opening" name="waist_opening" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Too loose
                                                </label></li>
                                            <h4 style="margin-top: 0;">LENGTH</h4>
                                            <li><label for="length1" class="input-control radio">
                                                    <input id="length" name="length" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Too short    
                                                </label>
                                            </li>
                                            <li><label for="length1" class="input-control radio">
                                                    <input id="length1" name="length" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Just right
                                                </label></li>
                                            <li><label for="3" class="input-control radio">
                                                    <input id="3" name="length" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Too long
                                                </label></li>
                                        </ul>
                                    </div>

                                </div>	
                            </div>  
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>How do you prefer clothes to fit your bottom half?</h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <li><label for="fit_bottom_half1" class="input-control radio">
                                                    <input id="fit_bottom_half1" name="fit_bottom_half" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Tight   
                                                </label>
                                            </li>
                                            <li><label for="fbf" class="input-control radio">
                                                    <input id="fbf" name="fit_bottom_half" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Fitted
                                                </label></li>
                                            <li><label for="fbf2" class="input-control radio">
                                                    <input id="fbf2" name="fit_bottom_half" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Straight
                                                </label></li>
                                            <li><label for="fbf3" class="input-control radio">
                                                    <input id="fbf3" name="fit_bottom_half" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Loose
                                                </label>
                                            </li>

                                        </ul>
                                    </div>

                                </div>	
                            </div>  
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>Which best describes how pants typically fit you?</h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <li><label for="ps1" class="input-control radio">
                                                    <input id="ps1" name="pant_size" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Fits correctly in the waist, hip and thigh   
                                                </label>
                                            </li>
                                            <li><label for="ps2" class="input-control radio">
                                                    <input id="ps2" name="pant_size" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Fits in the waist; too big in the hip and thigh
                                                </label></li>
                                            <li><label for="ps3" class="input-control radio">
                                                    <input id="ps3" name="pant_size" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Fits in the hip and thigh; too big in the waist
                                                </label></li>                                          

                                        </ul>
                                    </div>

                                </div>	
                            </div>  
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>What types of jeans do you prefer?</h3>	
                                        <h6>Select all that apply.</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <div class="select-boxes">
                                            <h4>STYLE</h4>	
                                            <ul>

                                                <li>
                                                    <input id="js1" name="jeans_style" type="checkbox" value="2">
                                                    <label for="js1">Straight</label>
                                                </li>
                                                <li>
                                                    <input id="js2" name="jeans_style" type="checkbox" value="1">
                                                    <label for="js2">Skinny</label>
                                                </li>
                                                <li>
                                                    <input id="js3" name="jeans_style" type="checkbox" value="3">
                                                    <label for="js3">Bootcut</label>
                                                </li>
                                                <li>
                                                    <input id="js4" name="jeans_style" type="checkbox" value="4">
                                                    <label for="js4">Wide</label>
                                                </li>



                                            </ul>
                                            <h4 style="margin-top: 0;">RISE</h4>
                                            <ul>

                                                <li>
                                                    <input id="jr1" name="jeans_rise" type="checkbox" value="1">
                                                    <label for="check-box1">Low</label>
                                                </li>
                                                <li>
                                                    <input id="jr2" name="jeans_rise" type="checkbox" value="2">
                                                    <label for="check-box2">Mid</label>
                                                </li>
                                                <li>
                                                    <input id="jr3" name="jeans_rise" type="checkbox" value="3">
                                                    <label for="check-box3">High</label>
                                                </li>




                                            </ul>
                                            <h4 style="margin-top: 0;">LENGTH</h4>
                                            <ul>

                                                <li>
                                                    <input id="jl1" name="jeans_length" type="checkbox" value="1">
                                                    <label for="jl1">Ankle (28" - 29")</label>
                                                </li>
                                                <li>
                                                    <input id="jl2" name="jeans_length" type="checkbox" value="2">
                                                    <label for="jl2">Regular (30" - 32")</label>
                                                </li>
                                                <li>
                                                    <input id="jl3" name="jeans_length" type="checkbox" value="3">
                                                    <label for="jl3">Long (33" - 35")</label>
                                                </li>




                                            </ul>
                                        </div>
                                    </div>

                                </div>	
                            </div>  
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>What do you like to flaunt? What would you rather downplay?</h3>	

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>ARMS</h4>	
                                            <li><label for="am1" class="input-control radio">
                                                    <input id="am1" name="arms" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>I love showing them off!  
                                                </label>
                                            </li>
                                            <li><label for="am2" class="input-control radio">
                                                    <input id="am2" name="arms" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes I’ll flaunt them
                                                </label></li>
                                            <li><label for="am3" class="input-control radio">
                                                    <input id="am3" name="arms" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                </label></li>                                          
                                            <li><label for="am4" class="input-control radio">
                                                    <input id="am4" name="arms" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Less is more, keep them covered
                                                </label></li>                                          

                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>SHOULDERS</h4>	
                                            <li><label for="sl1" class="input-control radio">
                                                    <input id="sl1" name="shoulders" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>I love showing them off!  
                                                </label>
                                            </li>
                                            <li><label for="sl2" class="input-control radio">
                                                    <input id="sl2" name="shoulders" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes I’ll flaunt them
                                                </label></li>
                                            <li><label for="sl3" class="input-control radio">
                                                    <input id="sl3" name="shoulders" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                </label></li>                                          
                                            <li><label for="sl4" class="input-control radio">
                                                    <input id="sl4" name="shoulders" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Less is more, keep them covered
                                                </label></li>                                          

                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>BACK</h4>	
                                            <li><label for="ba1" class="input-control radio">
                                                    <input id="ba1" name="back" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>I love showing them off!  
                                                </label>
                                            </li>
                                            <li><label for="ba2" class="input-control radio">
                                                    <input id="ba2" name="back" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes I’ll flaunt it
                                                </label></li>
                                            <li><label for="ba3" class="input-control radio">
                                                    <input id="ba3" name="back" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                </label></li>                                          
                                            <li><label for="ba4" class="input-control radio">
                                                    <input id="ba4" name="back" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Less is more, keep them covered
                                                </label></li>                                          

                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>CLEAVAGE</h4>	
                                            <li><label for="1" class="input-control radio">
                                                    <input id="1" name="cleavage" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>I love showing them off!  
                                                </label>
                                            </li>
                                            <li><label for="2" class="input-control radio">
                                                    <input id="2" name="cleavage" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes I’ll flaunt it
                                                </label></li>
                                            <li><label for="3" class="input-control radio">
                                                    <input id="3" name="cleavage" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                </label></li>                                          
                                            <li><label for="4" class="input-control radio">
                                                    <input id="4" name="cleavage" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Less is more, keep them covered
                                                </label></li>                                          

                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>MIDSECTION</h4>	
                                            <li><label for="1" class="input-control radio">
                                                    <input id="1" name="midsection" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>I love showing them off!  
                                                </label>
                                            </li>
                                            <li><label for="2" class="input-control radio">
                                                    <input id="2" name="midsection" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes I’ll flaunt it
                                                </label></li>
                                            <li><label for="3" class="input-control radio">
                                                    <input id="3" name="midsection" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                </label></li>                                          
                                            <li><label for="4" class="input-control radio">
                                                    <input id="4" name="midsection" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Less is more, keep them covered
                                                </label></li>                                          
                                            <li><label for="5" class="input-control radio">
                                                    <input id="5" name="midsection" value="5" type="radio">
                                                    <span class="input-control__indicator"></span>I’d prefer a more relaxed fit
                                                </label></li>                                          

                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>REAR</h4>	
                                            <li><label for="1" class="input-control radio">
                                                    <input id="1" name="rear" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>I love form-fitting styles! 
                                                </label>
                                            </li>
                                            <li><label for="2" class="input-control radio">
                                                    <input id="2" name="rear" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes I’ll wear form-fitting
                                                </label></li>
                                            <li><label for="3" class="input-control radio">
                                                    <input id="3" name="rear" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Form-fitting only for special occasions
                                                </label></li>                                          
                                            <li><label for="4" class="input-control radio">
                                                    <input id="4" name="rear" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>I’d prefer a more relaxed fit
                                                </label></li>                                          


                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>LEGS</h4>	
                                            <li><label for="l1" class="input-control radio">
                                                    <input id="l1" name="legs" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>I love showing them off! 
                                                </label>
                                            </li>
                                            <li><label for="l2" class="input-control radio">
                                                    <input id="l2" name="legs" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes I’ll flaunt it
                                                </label></li>
                                            <li><label for="l3" class="input-control radio">
                                                    <input id="l3" name="legs" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                </label></li>                                          
                                            <li><label for="l4" class="input-control radio">
                                                    <input id="l4" name="legs" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Less is more, keep them covered
                                                </label></li>                                          


                                        </ul>
                                    </div>
                                </div>	
                            </div> 
                            <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                <button type="submit" name="fitcut">Next: Style <i class="fas fa-arrow-right"></i></button>
                                <a href="#">Save and return Home. »</a>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade  <?php if ($slug == 'style') { ?>  active in <?php } ?>" id="Section3">
                            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>What do you think of the styles below? </h3>
                                        <div class="select-boxes">
                                            <ul>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/style1.jpg" alt="" height="294" width="790">
                                                    <div class="switch-field">
                                                        <input id="rating_preppy1" name="rating_preppy" value="1" checked="" type="radio">
                                                        <label for="rating_preppy1">Hate it</label>
                                                        <input id="rating_preppy2" name="rating_preppy" value="2" type="radio">
                                                        <label for="rating_preppy2">Just Ok</label>
                                                        <input id="rating_preppy3" name="rating_preppy" value="3" type="radio">
                                                        <label for="rating_preppy3">Like it</label>
                                                        <input id="rating_preppy4" name="rating_preppy" value="4" type="radio">
                                                        <label for="rating_preppy4">Love it</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/style2.jpg" alt="" height="294" width="790">
                                                    <div class="switch-field">
                                                        <input id="rating_romantic1" name="rating_romantic" value="1" checked="" type="radio">
                                                        <label for="rating_romantic1">Hate it</label>
                                                        <input id="rating_romantic2" name="rating_romantic" value="2" type="radio">
                                                        <label for="rating_romantic2">Just Ok</label>
                                                        <input id="rating_romantic3" name="rating_romantic" value="3" type="radio">
                                                        <label for="rating_romantic3">Like it</label>
                                                        <input id="rating_romantic4" name="rating_romantic" value="4" type="radio">
                                                        <label for="rating_romantic4">Love it</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/style3.jpg" alt="" height="294" width="790">
                                                    <div class="switch-field">
                                                        <input id="rating_casual1" name="rating_casual" value="1" checked="" type="radio">
                                                        <label for="rating_casual1">Hate it</label>
                                                        <input id="rating_casual2" name="rating_casual" value="2" type="radio">
                                                        <label for="rating_casual2">Just Ok</label>
                                                        <input id="rating_casual3" name="rating_casual" value="3" type="radio">
                                                        <label for="rating_casual3">Like it</label>
                                                        <input id="rating_casual4" name="rating_casual" value="4" type="radio">
                                                        <label for="rating_casual4">Love it</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/style4.jpg" alt="" height="294" width="790">
                                                    <div class="switch-field">
                                                        <input id="rating_edgy1" name="rating_edgy" value="1" checked="" type="radio">
                                                        <label for="rating_edgy1">Hate it</label>
                                                        <input id="rating_edgy2" name="rating_edgy" value="2" type="radio">
                                                        <label for="rating_edgy2">Just Ok</label>
                                                        <input id="rating_edgy3" name="rating_edgy" value="3" type="radio">
                                                        <label for="rating_edgy3">Like it</label>
                                                        <input id="rating_edgy4" name="rating_edgy" value="4" type="radio">
                                                        <label for="rating_edgy4">Love it</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/style5.jpg" alt="" height="294" width="790">
                                                    <div class="switch-field">
                                                        <input id="rating_boho1" name="rating_boho" value="1" checked="" type="radio">
                                                        <label for="rating_boho1">Hate it</label>
                                                        <input id="rating_boho2" name="rating_boho" value="2" type="radio">
                                                        <label for="rating_boho2">Just Ok</label>
                                                        <input id="rb3" name="rating_boho" value="3" type="radio">
                                                        <label for="rb3">Like it</label>
                                                        <input id="rb4" name="rating_boho" value="4" type="radio">
                                                        <label for="rb4">Love it</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/style6.jpg" alt="" height="294" width="790">
                                                    <div class="switch-field">
                                                        <input id="rating_glam1" name="rating_glam" value="1" checked="" type="radio">
                                                        <label for="rating_glam1">Hate it</label>
                                                        <input id="rating_glam2" name="rating_glam" value="2" type="radio">
                                                        <label for="rating_glam2">Just Ok</label>
                                                        <input id="rating_glam3" name="rating_glam" value="3" type="radio">
                                                        <label for="rating_glam3">Like it</label>
                                                        <input id="rating_glam4" name="rating_glam" value="4" type="radio">
                                                        <label for="rating_glam4">Love it</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/style7.jpg" alt="" height="294" width="790">
                                                    <div class="switch-field">
                                                        <input id="rc1" name="rating_classic" value="1" checked="" type="radio">
                                                        <label for="rc1">Hate it</label>
                                                        <input id="rc2" name="rating_classic" value="2" type="radio">
                                                        <label for="rc2">Just Ok</label>
                                                        <input id="rc3" name="rating_classic" value="3" type="radio">
                                                        <label for="rc3">Like it</label>
                                                        <input id="rc4" name="rating_classic" value="4" type="radio">
                                                        <label for="rc4">Love it</label>
                                                    </div>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>How often do you dress for the following occasions? </h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>WORK / BUSINESS CASUAL </h4>
                                            <li><label for="owc" class="input-control radio">
                                                    <input id="owc" name="occasion_work_casual" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Most of the time    
                                                </label>
                                            </li>
                                            <li><label for="owc2" class="input-control radio">
                                                    <input id="owc2" name="occasion_work_casual" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>About once or twice a week
                                                </label></li>
                                            <li><label for="owc3" class="input-control radio">
                                                    <input id="owc3" name="occasion_work_casual" value="" type="radio">
                                                    <span class="input-control__indicator"></span>About once or twice a month
                                                </label></li>
                                            <li><label for="owc4" class="input-control radio">
                                                    <input id="owc4" name="occasion_work_casual" value="" type="radio">
                                                    <span class="input-control__indicator"></span>Rarely
                                                </label>
                                            </li>

                                        </ul>
                                        <ul>
                                            <h4>COCKTAIL / WEDDING / EVENT  </h4>
                                            <li><label for="ose1" class="input-control radio">
                                                    <input id="ose1" name="occasion_special_event" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Most of the time    
                                                </label>
                                            </li>
                                            <li><label for="ose2" class="input-control radio">
                                                    <input id="ose2" name="occasion_special_event" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>About once or twice a week
                                                </label></li>
                                            <li><label for="ose3" class="input-control radio">
                                                    <input id="ose3" name="occasion_special_event" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>About once or twice a month
                                                </label></li>
                                            <li><label for="ose4" class="input-control radio">
                                                    <input id="ose4" name="occasion_special_event" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Rarely
                                                </label>
                                            </li>

                                        </ul>
                                        <ul>
                                            <h4>LAID-BACK CASUAL   </h4>
                                            <li><label for="oc" class="input-control radio">
                                                    <input id="oc" name="occasion_casual" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Most of the time    
                                                </label>
                                            </li>
                                            <li><label for="oc1" class="input-control radio">
                                                    <input id="oc1" name="occasion_casual" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>About once or twice a week
                                                </label></li>
                                            <li><label for="oc2" class="input-control radio">
                                                    <input id="oc2" name="occasion_casual" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>About once or twice a month
                                                </label></li>
                                            <li><label for="oc3" class="input-control radio">
                                                    <input id="oc3" name="occasion_casual" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Rarely
                                                </label>
                                            </li>

                                        </ul>
                                        <ul>
                                            <h4>DATE NIGHT / NIGHT OUT</h4>
                                            <li><label for="ono1" class="input-control radio">
                                                    <input id="ono1" name="occasion_night_out" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Most of the time    
                                                </label>
                                            </li>
                                            <li><label for="ono2" class="input-control radio">
                                                    <input id="ono2" name="occasion_night_out" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>About once or twice a week
                                                </label></li>
                                            <li><label for="ono3" class="input-control radio">
                                                    <input id="ono3" name="occasion_night_out" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>About once or twice a month
                                                </label></li>
                                            <li><label for="ono4" class="input-control radio">
                                                    <input id="ono4" name="occasion_night_out" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Rarely
                                                </label>
                                            </li>

                                        </ul>
                                    </div>

                                </div>	
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>How much do you want your Fix selections to focus on the following occasions? </h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <h4>WORK / BUSINESS CASUAL </h4>
                                            <li><label for="dwc1" class="input-control radio">
                                                    <input id="dwc1" name="desired_work_casual" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Frequently: As much as I can get!   
                                                </label>
                                            </li>
                                            <li><label for="dwc2" class="input-control radio">
                                                    <input id="dwc2" name="desired_work_casual" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Consistently: At least one piece per shipment
                                                </label></li>
                                            <li><label for="dwc3" class="input-control radio">
                                                    <input id="dwc3" name="desired_work_casual" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes: If my Stylist really loves it for me
                                                </label></li>
                                            <li><label for="dwc4" class="input-control radio">
                                                    <input id="dwc4" name="desired_work_casual" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Rarely: Very little, or only when I specifically ask for it
                                                </label>
                                            </li>

                                        </ul>
                                        <ul>
                                            <h4>COCKTAIL / WEDDING / EVENT  </h4>
                                            <li><label for="dse1" class="input-control radio">
                                                    <input id="dse1" name="desired_special_event" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Frequently: As much as I can get!   
                                                </label>
                                            </li>
                                            <li><label for="dse2" class="input-control radio">
                                                    <input id="dse2" name="desired_special_event" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Consistently: At least one piece per shipment
                                                </label></li>
                                            <li><label for="dse3" class="input-control radio">
                                                    <input id="dse3" name="desired_special_event" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes: If my Stylist really loves it for me
                                                </label></li>
                                            <li><label for="dse4" class="input-control radio">
                                                    <input id="dse4" name="desired_special_event" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Rarely: Very little, or only when I specifically ask for it
                                                </label>
                                            </li>

                                        </ul>
                                        <ul>
                                            <h4>LAID-BACK CASUAL   </h4>
                                            <li><label for="dc1" class="input-control radio">
                                                    <input id="dc1" name="desired_casual" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Frequently: As much as I can get!   
                                                </label>
                                            </li>
                                            <li><label for="dc2" class="input-control radio">
                                                    <input id="dc2" name="desired_casual" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Consistently: At least one piece per shipment
                                                </label></li>
                                            <li><label for="dc3" class="input-control radio">
                                                    <input id="dc3" name="desired_casual" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes: If my Stylist really loves it for me
                                                </label></li>
                                            <li><label for="dc4" class="input-control radio">
                                                    <input id="dc4" name="desired_casual" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Rarely: Very little, or only when I specifically ask for it
                                                </label>
                                            </li>

                                        </ul>
                                        <ul>
                                            <h4>DATE NIGHT / NIGHT OUT</h4>
                                            <li><label for="ddn1" class="input-control radio">
                                                    <input id="ddn1" name="desired_date_night" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Frequently: As much as I can get!   
                                                </label>
                                            </li>
                                            <li><label for="ddn2" class="input-control radio">
                                                    <input id="ddn2" name="desired_date_night" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Consistently: At least one piece per shipment
                                                </label></li>
                                            <li><label for="ddn3" class="input-control radio">
                                                    <input id="ddn3" name="desired_date_night" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes: If my Stylist really loves it for me
                                                </label></li>
                                            <li><label for="ddn4" class="input-control radio">
                                                    <input id="ddn4" name="desired_date_night" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Rarely: Very little, or only when I specifically ask for it
                                                </label>
                                            </li>

                                        </ul>
                                    </div>

                                </div>	
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>Are you more of a jeans / pants & top gal or a dresses gal? </h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <li><label for="jf" class="input-control radio">
                                                    <input id="jf" name="jeans_frequency" value="1" type="radio">
                                                    <span class="input-control__indicator"></span>Mostly jeans / pants
                                                </label>
                                            </li>
                                            <li><label for="jf1" class="input-control radio">
                                                    <input id="jf1" name="jeans_frequency" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Mostly dresses
                                                </label></li>
                                            <li><label for="jf2" class="input-control radio">
                                                    <input id="jf2" name="jeans_frequency" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Healthy mix of both
                                                </label></li>

                                        </ul>
                                    </div>

                                </div>	
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 denim-styles">
                                        <h3> Would you wear any of these denim styles? </h3>
                                        <div class="select-boxes">
                                            <ul>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim1.jpg" alt="" width="223" height="216">
                                                    <div class="switch-field">
                                                        <input id="denim1" name="distressed_denim_non" value="yes" checked="" type="radio">
                                                        <label for="denim1">Yes</label>
                                                        <input id="denim2" name="distressed_denim_non" value="maybe" type="radio">
                                                        <label for="denim2">Maybe</label>
                                                        <input id="denim3" name="distressed_denim_non" value="never" type="radio">
                                                        <label for="denim3">Never</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim2.jpg" alt="" width="223" height="216">
                                                    <div class="switch-field">
                                                        <input id="denim4" name="distressed_denim_minimally" value="yes" checked="" type="radio">
                                                        <label for="denim4">Yes</label>
                                                        <input id="denim5" name="distressed_denim_minimally" value="maybe" type="radio">
                                                        <label for="denim5">Maybe</label>
                                                        <input id="denim6" name="distressed_denim_minimally" value="never" type="radio">
                                                        <label for="denim6">Never</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim3.jpg" alt="" width="223" height="216">
                                                    <div class="switch-field">
                                                        <input id="denim7" name="distressed_denim_fairly" value="yes" checked="" type="radio">
                                                        <label for="denim7">Yes</label>
                                                        <input id="denim71" name="distressed_denim_fairly" value="maybe" type="radio">
                                                        <label for="denim71">Maybe</label>
                                                        <input id="denim72" name="distressed_denim_fairly" value="never" type="radio">
                                                        <label for="denim72">Never</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/denim4.jpg" alt="" width="223" height="216">
                                                    <div class="switch-field">
                                                        <input id="denim8" name="distressed_denim_heavily" value="yes" checked="" type="radio">
                                                        <label for="denim8">Yes</label>
                                                        <input id="denim9" name="distressed_denim_heavily" value="maybe" type="radio">
                                                        <label for="denim9">Maybe</label>
                                                        <input id="denim10" name="distressed_denim_heavily" value="never" type="radio">
                                                        <label for="denim10">Never</label>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-box-data checkboxes">
                                <div class="row">
                                    <div class="col-sm-8 col-lg-12 col-md-12">
                                        <h3>Where do you typically purchase your clothes? </h3>
                                        <h6>Select all that apply.</h6>
                                        <div class="select-boxes">
                                            <ul>
                                                <li>
                                                    <input id="check-box1" name="womens_brands_plus_low_tier" type="checkbox" value="Target">
                                                    <label for="check-box1">Target</label>
                                                </li>
                                                <li>
                                                    <input id="check-box2" name="womens_brands_plus_low_tier" type="checkbox" value="Macy’s">
                                                    <label for="check-box2">Macy’s</label>
                                                </li>
                                                <li>
                                                    <input id="check-box3" name="womens_brands_plus_low_tier" type="checkbox" value="SaksFifthAvenue">
                                                    <label for="check-box3">Saks Fifth Avenue</label>
                                                </li>
                                                <li>
                                                    <input id="check-box4" name="womens_brands_plus_low_tier" type="checkbox" value="Forever21">
                                                    <label for="check-box4">Forever 21</label>
                                                </li>
                                                <li>
                                                    <input id="check-box5" name="womens_brands_plus_low_tier" type="checkbox" value="Nordstrom">
                                                    <label for="check-box5">Nordstrom</label>
                                                </li>
                                                <li>
                                                    <input id="check-box1a" name="womens_brands_plus_low_tier" type="checkbox" value="Navabi">
                                                    <label for="check-box1a">Navabi</label>
                                                </li>
                                                <li>
                                                    <input id="check-box6" name="womens_brands_plus_low_tier" type="checkbox" value="H&M">
                                                    <label for="check-box6">H&M</label>
                                                </li>
                                                <li>
                                                    <input id="check-box7" name="womens_brands_plus_low_tier" type="checkbox" value="LaneBryant">
                                                    <label for="check-box7">Lane Bryant</label>
                                                </li>
                                                <li>
                                                    <input id="check-box8" name="womens_brands_plus_low_tier" type="checkbox" value="EileenFisher">
                                                    <label for="check-box8">Eileen Fisher</label>
                                                </li>
                                                <li>
                                                    <input id="check-box9" name="womens_brands_plus_low_tier" type="checkbox" value="ASOSCurve">
                                                    <label for="check-box9">ASOS Curve</label>
                                                </li>
                                                <li>
                                                    <input id="check-box10" name="womens_brands_plus_low_tier" type="checkbox" value="Avenue">
                                                    <label for="check-box10">Avenue</label>
                                                </li>
                                                <li>
                                                    <input id="check-box11" name="womens_brands_plus_low_tier" type="checkbox" value="Local Boutiques">
                                                    <label for="check-box11">Local Boutiques</label>
                                                </li>
                                                <li>
                                                    <input id="check-box12" name="womens_brands_plus_low_tier" type="checkbox" value="TJ Maxx">
                                                    <label for="check-box12">TJ Maxx</label>
                                                </li>
                                                <li>
                                                    <input id="check-box13" name="womens_brands_plus_low_tier" type="checkbox" value="Eloquii">
                                                    <label for="check-box13">Eloquii</label>
                                                </li>
                                                <li>
                                                    <input id="check-box14" name="womens_brands_plus_low_tier" type="checkbox" value="Other">
                                                    <label for="check-box14">Other</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>How adventurous do you want your Fix selections to be? </h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>                                          
                                            <li><label for="adv" class="input-control radio">
                                                    <input id="adv" name="adventure" value="" type="radio">
                                                    <span class="input-control__indicator"></span>Frequently: Adventure is my middle name, bring it on!   
                                                </label>
                                            </li>
                                            <li><label for="adv1" class="input-control radio">
                                                    <input id="adv1" name="adventure" value="" type="radio">
                                                    <span class="input-control__indicator"></span>Sometimes: I like trying new trends
                                                </label></li>
                                            <li><label for="adv2" class="input-control radio">
                                                    <input id="adv2" name="adventure" value="" type="radio">
                                                    <span class="input-control__indicator"></span>Occasionally: I'd like to incorporate a few unique pieces
                                                </label></li>
                                            <li><label for="adv3" class="input-control radio">
                                                    <input id="adv3" name="adventure" value="" type="radio">
                                                    <span class="input-control__indicator"></span>Never: Please keep my clothes timeless
                                                </label>
                                            </li>

                                        </ul>

                                    </div>

                                </div>	
                            </div>
                            <div class="form-box-data checkboxes">
                                <div class="row">
                                    <div class="col-sm-8 col-lg-12 col-md-12">
                                        <h3>Would you like to incorporate more of the following styles into your wardrobe? </h3>

                                        <div class="select-boxes">
                                            <ul>
                                                <li>
                                                    <input id="style_wardrobe1" name="style_wardrobe" type="checkbox" value="Boho">
                                                    <label for="style_wardrobe1">Boho</label>
                                                </li>
                                                <li>
                                                    <input id="style_wardrobe2" name="style_wardrobe" type="checkbox" value="Casual">
                                                    <label for="style_wardrobe2">Casual</label>
                                                </li>
                                                <li>
                                                    <input id="style_wardrobe3" name="style_wardrobe" type="checkbox" value="Classic">
                                                    <label for="style_wardrobe3">Classic</label>
                                                </li>
                                                <li>
                                                    <input id="style_wardrobe4" name="style_wardrobe" type="checkbox" value="Edgy">
                                                    <label for="style_wardrobe4">Edgy</label>
                                                </li>
                                                <li>
                                                    <input id="style_wardrobe5" name="style_wardrobe" type="checkbox" value="Glamorous">
                                                    <label for="style_wardrobe5">Glamorous</label>
                                                </li>
                                                <li>
                                                    <input id="style_wardrobe6" name="style_wardrobe" type="checkbox" value="Preppy">
                                                    <label for="style_wardrobe6">Preppy</label>
                                                </li>
                                                <li>
                                                    <input id="style_wardrobe7" name="style_wardrobe" type="checkbox" value="Romantic">
                                                    <label for="style_wardrobe7">Romantic</label>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>How would you characterize your accessory and jewelry style?  </h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>                                          
                                            <li><label for="st1" class="input-control radio">
                                                    <input id="st1" name="style_accessories" value="classic" type="radio">
                                                    <span class="input-control__indicator"></span>Mostly classic   
                                                </label>
                                            </li>
                                            <li><label for="st2" class="input-control radio">
                                                    <input id="st2" name="style_accessories" value="statement" type="radio">
                                                    <span class="input-control__indicator"></span>Mostly statement
                                                </label></li>
                                            <li><label for="st3" class="input-control radio">
                                                    <input id="st3" name="style_accessories" value="Either" type="radio">
                                                    <span class="input-control__indicator"></span>Healthy mix of both
                                                </label></li>                                           

                                        </ul>

                                    </div>

                                </div>	
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>What is your preferred tone of jewelry?</h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>                                          
                                            <li><label for="jewelry_tone1" class="input-control radio">
                                                    <input id="jewelry_tone1" name="jewelry_tone" value="Gold" type="radio">
                                                    <span class="input-control__indicator"></span>Mostly gold tones  
                                                </label>
                                            </li>
                                            <li><label for="jewelry_tone2" class="input-control radio">
                                                    <input id="jewelry_tone2" name="jewelry_tone" value="Silver" type="radio">
                                                    <span class="input-control__indicator"></span>Mostly silver tones
                                                </label></li>
                                            <li><label for="jewelry_tone3" class="input-control radio">
                                                    <input id="jewelry_tone3" name="jewelry_tone" value="Either" type="radio">
                                                    <span class="input-control__indicator"></span>Healthy mix of both
                                                </label></li>                                           

                                        </ul>

                                    </div>

                                </div>	
                            </div>
                            <div class="form-box-data">
                                <h3>Are your ears pierced? </h3>
                                <div class="switch-field">
                                    <input id="piercings1" name="piercings" value="yes" checked="" type="radio">
                                    <label for="piercings1">Yes</label>
                                    <input id="piercings2" name="piercings" value="no" type="radio">
                                    <label for="piercings2">No</label>
                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 cloth-category">
                                        <h3>How often would you like to receive the following clothing categories in your Fix? (Optional) </h3>
                                        <div class="select-boxes">
                                            <ul>
                                                <li>
                                                    <h4>Tops </h4>                                                    
                                                    <div class="switch-field">
                                                        <input id="afat1" name="apparel_affinity_avoid_tops" value="Often" checked="" type="radio">
                                                        <label for="afat1">Often</label>
                                                        <input id="afat2" name="apparel_affinity_avoid_tops" value="Sometimes" type="radio">
                                                        <label for="afat2">Sometimes</label>
                                                        <input id="afat3" name="apparel_affinity_avoid_tops" value="Never" type="radio">
                                                        <label for="afat3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Blazers </h4>                                                  
                                                    <div class="switch-field">
                                                        <input id="aaab1" name="apparel_affinity_avoid_blazers" value="Often" checked="" type="radio">
                                                        <label for="aaab1">Often</label>
                                                        <input id="aaab2" name="apparel_affinity_avoid_blazers" value="Sometimes" type="radio">
                                                        <label for="aaab2">Sometimes</label>
                                                        <input id="aaab3" name="apparel_affinity_avoid_blazers" value="Never" type="radio">
                                                        <label for="aaab3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Jackets & Coats </h4>                                                    
                                                    <div class="switch-field">
                                                        <input id="aaajc1" name="apparel_affinity_avoid_jackets_coats" value="Often" checked="" type="radio">
                                                        <label for="aaajc1">Often</label>
                                                        <input id="aaajc2" name="apparel_affinity_avoid_jackets_coats" value="Sometimes" type="radio">
                                                        <label for="aaajc2">Sometimes</label>
                                                        <input id="aaajc3" name="apparel_affinity_avoid_jackets_coats" value="Never" type="radio">
                                                        <label for="aaajc3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Shorts </h4>

                                                    <div class="switch-field">
                                                        <input id="aaas1" name="apparel_affinity_avoid_shorts" value="Often" checked="" type="radio">
                                                        <label for="aaas1">Often</label>
                                                        <input id="aaas2" name="apparel_affinity_avoid_shorts" value="Sometimes" type="radio">
                                                        <label for="aaas2">Sometimes</label>
                                                        <input id="aaas3" name="apparel_affinity_avoid_shorts" value="Never" type="radio">
                                                        <label for="aaas3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Dresses </h4>

                                                    <div class="switch-field">
                                                        <input id="switch_left6" name="apparel_affinity_avoid_dresses" value="Often" checked="" type="radio">
                                                        <label for="switch_left6">Often</label>
                                                        <input id="switch_middle6" name="apparel_affinity_avoid_dresses" value="Sometimes" type="radio">
                                                        <label for="switch_middle6">Sometimes</label>
                                                        <input id="switch_right6" name="apparel_affinity_avoid_dresses" value="Never" type="radio">
                                                        <label for="switch_right6">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Skirts </h4>

                                                    <div class="switch-field">
                                                        <input id="switch_left7" name="apparel_type_affinity_avoid_skirts" value="Often" checked="" type="radio">
                                                        <label for="switch_left7">Often</label>
                                                        <input id="switch_middle7" name="apparel_type_affinity_avoid_skirts" value="Sometimes" type="radio">
                                                        <label for="switch_middle7">Sometimes</label>
                                                        <input id="switch_right7" name="apparel_type_affinity_avoid_skirts" value="Never" type="radio">
                                                        <label for="switch_right7">Never</label>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 accessories">
                                        <h3>How often would you like to receive the following accessories in your Fix? (Optional)  </h3>
                                        <div class="select-boxes">
                                            <ul>
                                                <li>
                                                    <h4>Bags  </h4>                                                    
                                                    <div class="switch-field">
                                                        <input id="bag1" name="accessory_affinity_avoid_bags" value="Often" checked="" type="radio">
                                                        <label for="bag1">Often</label>
                                                        <input id="bag2" name="accessory_affinity_avoid_bags" value="Sometimes" type="radio">
                                                        <label for="bag2">Sometimes</label>
                                                        <input id="bag3" name="accessory_affinity_avoid_bags" value="Never" type="radio">
                                                        <label for="bag3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Scarves  </h4>                                                  
                                                    <div class="switch-field">
                                                        <input id="scar1" name="accessory_affinity_avoid_scarves" value="Often" checked="" type="radio">
                                                        <label for="scar1">Often</label>
                                                        <input id="scar2" name="accessory_affinity_avoid_scarves" value="Sometimes" type="radio">
                                                        <label for="scar2">Sometimes</label>
                                                        <input id="scar3" name="accessory_affinity_avoid_scarves" value="Never" type="radio">
                                                        <label for="scar3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4> Earrings  </h4>                                                    
                                                    <div class="switch-field">
                                                        <input id="ring1" name="accessory_affinity_avoid_earrings" value="Often" checked="" type="radio">
                                                        <label for="ring1">Often</label>
                                                        <input id="ring2" name="accessory_affinity_avoid_earrings" value="Sometimes" type="radio">
                                                        <label for="ring2">Sometimes</label>
                                                        <input id="ring3" name="accessory_affinity_avoid_earrings" value="Never" type="radio">
                                                        <label for="ring3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Necklaces  </h4>

                                                    <div class="switch-field">
                                                        <input id="necklace1" name="accessory_affinity_avoid_necklaces" value="Often" checked="" type="radio">
                                                        <label for="necklace1">Often</label>
                                                        <input id="necklace2" name="accessory_affinity_avoid_necklaces" value="Sometimes" type="radio">
                                                        <label for="necklace2">Sometimes</label>
                                                        <input id="necklace3" name="accessory_affinity_avoid_necklaces" value="Never" type="radio">
                                                        <label for="necklace3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Bracelets  </h4>

                                                    <div class="switch-field">
                                                        <input id="bracelets1" name="accessory_affinity_avoid_bracelets" value="Often" checked="" type="radio">
                                                        <label for="bracelets1">Often</label>
                                                        <input id="bracelets2" name="accessory_affinity_avoid_bracelets" value="Sometimes" type="radio">
                                                        <label for="bracelets2">Sometimes</label>
                                                        <input id="bracelets3" name="accessory_affinity_avoid_bracelets" value="Never" type="radio">
                                                        <label for="bracelets3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Shoes  </h4>

                                                    <div class="switch-field">
                                                        <input id="shoes" name="accessory_affinity_avoid_shoes" value="Often" checked="" type="radio">
                                                        <label for="shoes">Often</label>
                                                        <input id="shoes1" name="accessory_affinity_avoid_shoes" value="Sometimes" type="radio">
                                                        <label for="shoes1">Sometimes</label>
                                                        <input id="shoes2" name="accessory_affinity_avoid_shoes" value="Never" type="radio">
                                                        <label for="shoes2">Never</label>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 shoes">
                                        <h3>Would you wear the following types of shoes? (Optional)   </h3>
                                        <div class="select-boxes">
                                            <ul>
                                                <li>
                                                    <h4>Heels</h4>                                                    
                                                    <div class="switch-field">
                                                        <input id="heels1" name="shoes_affinity_avoid_heels" value="Often" checked="" type="radio">
                                                        <label for="heels1">Often</label>
                                                        <input id="heels2" name="shoes_affinity_avoid_heels" value="Sometimes" type="radio">
                                                        <label for="heels2">Sometimes</label>
                                                        <input id="heels3" name="shoes_affinity_avoid_heels" value="Never" type="radio">
                                                        <label for="heels3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Wedges</h4>                                                  
                                                    <div class="switch-field">
                                                        <input id="wedges" name="shoes_affinity_avoid_wedges" value="yes" checked="" type="radio">
                                                        <label for="wedges">Often</label>
                                                        <input id="wedges1" name="shoes_affinity_avoid_wedges" value="no" type="radio">
                                                        <label for="wedges1">Sometimes</label>
                                                        <input id="wedges2" name="shoes_affinity_avoid_wedges" value="no" type="radio">
                                                        <label for="wedges2">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4> Booties   </h4>                                                    
                                                    <div class="switch-field">
                                                        <input id="booties" name="shoes_affinity_avoid_booties" value="yes" checked="" type="radio">
                                                        <label for="booties">Often</label>
                                                        <input id="booties1" name="shoes_affinity_avoid_booties" value="no" type="radio">
                                                        <label for="booties1">Sometimes</label>
                                                        <input id="booties2" name="shoes_affinity_avoid_booties" value="no" type="radio">
                                                        <label for="booties2">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Flats</h4>

                                                    <div class="switch-field">
                                                        <input id="flats" name="shoes_affinity_avoid_flats" value="yes" checked="" type="radio">
                                                        <label for="flats">Often</label>
                                                        <input id="flats1" name="shoes_affinity_avoid_flats" value="no" type="radio">
                                                        <label for="flats1">Sometimes</label>
                                                        <input id="flats2" name="shoes_affinity_avoid_flats" value="no" type="radio">
                                                        <label for="flats2">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Sandals</h4>

                                                    <div class="switch-field">
                                                        <input id="sandals" name="shoes_affinity_avoid_sandals" value="yes" checked="" type="radio">
                                                        <label for="sandals">Often</label>
                                                        <input id="sandals2" name="shoes_affinity_avoid_sandals" value="no" type="radio">
                                                        <label for="sandals2">Sometimes</label>
                                                        <input id="sandals3" name="shoes_affinity_avoid_sandals" value="no" type="radio">
                                                        <label for="sandals3">Never</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h4>Fashion Sneakers</h4>

                                                    <div class="switch-field">
                                                        <input id="sneakers" name="shoes_affinity_avoid_fashion_sneakers" value="yes" checked="" type="radio">
                                                        <label for="sneakers">Often</label>
                                                        <input id="sneakers1" name="shoes_affinity_avoid_fashion_sneakers" value="no" type="radio">
                                                        <label for="sneakers1">Sometimes</label>
                                                        <input id="sneakers2" name="shoes_affinity_avoid_fashion_sneakers" value="no" type="radio">
                                                        <label for="sneakers2">Never</label>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-box-data checkboxes">
                                <div class="row">
                                    <div class="col-sm-8 col-lg-12 col-md-12">
                                        <h3>Is there anything you’d like to avoid in your shipment? </h3>                        		
                                        <div class="select-boxes">
                                            <ul>
                                                <h4>COLORS TO AVOID</h4>
                                                <li>
                                                    <input style_wardrobe1 name="avoid_colors" id="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors">Beige</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors1" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors1">Black</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors2" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors2">Blue</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors3" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors3">Brown</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors4" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors4">Burgundy</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors5" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors5">Gold</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors6" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors6">Green</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors7" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors7">Grey</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors8" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors8">Navy</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors9" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors9">Orange</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors10" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors10">Pink</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors11" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors11">Purple</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors12" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors12">Red</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors13" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors13">Silver</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors14" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors14">Teal</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors15" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors15">White</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_colors16" name="avoid_colors" type="checkbox">
                                                    <label for="avoid_colors16">Yellow</label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-lg-12 col-md-12">
                                        <h4>PRINTS TO AVOID </h4>                        		
                                        <div class="select-boxes">
                                            <ul>
                                                <li>
                                                    <input id="avoid_prints1" name="avoid_prints" type="checkbox">
                                                    <label for="avoid_prints1">Animal print</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_prints2" name="avoid_prints" type="checkbox">
                                                    <label for="avoid_prints2">Floral</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_prints3" name="avoid_prints" type="checkbox">
                                                    <label for="avoid_prints3">Paisley</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_prints4" name="avoid_prints" type="checkbox">
                                                    <label for="avoid_prints4">Plaid</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_prints5" name="avoid_prints" type="checkbox">
                                                    <label for="avoid_prints5">Polka dots</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_prints1a" name="avoid_prints" type="checkbox">
                                                    <label for="avoid_prints1a">Stripes</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_prints6" name="avoid_prints" type="checkbox">
                                                    <label for="avoid_prints6">Novelty print (ex: birds)</label>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-lg-12 col-md-12">
                                        <h4>FABRICS TO AVOID </h4>                        		
                                        <div class="select-boxes">
                                            <ul>
                                                <li>
                                                    <input id="avoid_fabrics1" name="avoid_fabrics" type="checkbox">
                                                    <label for="avoid_fabrics1">Faux Fur</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_fabrics2" name="avoid_fabrics" type="checkbox">
                                                    <label for="avoid_fabrics2">Leather</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_fabrics3" name="avoid_fabrics" type="checkbox">
                                                    <label for="avoid_fabrics3">Faux Leather</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_fabrics4" name="avoid_fabrics" type="checkbox">
                                                    <label for="avoid_fabrics4">Polyester</label>
                                                </li>
                                                <li>
                                                    <input id="avoid_fabrics5" name="avoid_fabrics" type="checkbox">
                                                    <label for="avoid_fabrics5">Wool</label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                    <button type="submit" name="style" value="style">Next: Price <i class="fas fa-arrow-right"></i></button>
                                    <a href="#">Save and return Home. »</a>
                                </div>
                            </div>

                            <?php echo $this->Form->end(); ?>

                        </div>
                        <div role="tabpanel" class="tab-pane fade  <?php if ($slug == 'price') { ?>  active in <?php } ?>" id="Section4">
                            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                            <h3>How much would you ideally spend on items in each of the following categories? We’ll do our very best!
                            </h3>
                            <p>
                            <div class="-group__questions -group__questions-spendiness_accessories_label -group__questions-spendiness_bottoms_label -group__questions-spendiness_dresses_label -group__questions-spendiness_jewelry_label -group__questions-spendiness_outerwear_label -group__questions-spendiness_tops_label -group__questions-spendiness_shoes_label">

                                <div class="" data-question-id="spendiness_accessories_label" data-question-type="multi_picker">
                                    <div class="-multi-picker">
                                        <div class="-title -picker__label">ACCESSORIES</div>
                                        <div class="-multi-picker__pickers">

                                            <div class="-picker" data-question-id="spendiness_accessories">
                                                <select name="spendiness_accessories" id="spendiness_accessories" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                    <option selected="selected" value="50,100">$50 - $100</option>
                                                    <option value="100,150">$100 - $150</option>
                                                    <option value="150,200">$150 - $200</option>
                                                    <option value="200,">$200+</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__error-message"></div>

                                </div>

                                <div class="" data-question-id="spendiness_bottoms_label" data-question-type="multi_picker">
                                    <div class="-multi-picker">
                                        <div class="-title -picker__label">BOTTOMS</div>
                                        <div class="-multi-picker__pickers">

                                            <div class="-picker" data-question-id="spendiness_bottoms">
                                                <select name="spendiness_bottoms" id="spendiness_bottoms" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                    <option selected="selected" value="50,100">$50 - $100</option>
                                                    <option value="100,150">$100 - $150</option>
                                                    <option value="150,200">$150 - $200</option>
                                                    <option value="200,">$200+</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__error-message"></div>

                                </div> 

                                <div class="" data-question-id="spendiness_dresses_label" data-question-type="multi_picker">
                                    <div class="-multi-picker">
                                        <div class="-title -picker__label">DRESSES</div>
                                        <div class="-multi-picker__pickers">

                                            <div class="-picker" data-question-id="spendiness_dresses">
                                                <select name="spendiness_dresses" id="spendiness_dresses" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                    <option selected="selected" value="50,100">$50 - $100</option>
                                                    <option value="100,150">$100 - $150</option>
                                                    <option value="150,200">$150 - $200</option>
                                                    <option value="200,">$200+</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__error-message"></div>

                                </div><!-- the following code is part of the updated style profile experiment https://stitchfix.atlassian.net/browse/NC-533 -->

                                <div class="" data-question-id="spendiness_jewelry_label" data-question-type="multi_picker">
                                    <div class="-multi-picker">
                                        <div class="-title -picker__label">JEWELRY</div>
                                        <div class="-multi-picker__pickers">

                                            <div class="-picker" data-question-id="spendiness_jewelry">
                                                <select name="spendiness_jewelry" id="spendiness_jewelry" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                    <option value="50,100">$50 - $100</option>
                                                    <option selected="selected" value="100,150">$100 - $150</option>
                                                    <option value="150,200">$150 - $200</option>
                                                    <option value="200,">$200+</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__error-message"></div>

                                </div><!-- the following code is part of the updated style profile experiment https://stitchfix.atlassian.net/browse/NC-533 -->

                                <div class="" data-question-id="spendiness_outerwear_label" data-question-type="multi_picker">
                                    <div class="-multi-picker">
                                        <div class="-title -picker__label">OUTER LAYERS</div>
                                        <div class="-multi-picker__pickers">

                                            <div class="-picker" data-question-id="spendiness_outerwear">
                                                <select name="spendiness_outerwear" id="spendiness_outerwear" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                    <option value="50,100">$50 - $100</option>
                                                    <option value="100,150">$100 - $150</option>
                                                    <option selected="selected" value="150,200">$150 - $200</option>
                                                    <option value="200,">$200+</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__error-message"></div>

                                </div>

                                <div class="" data-question-id="spendiness_tops_label" data-question-type="multi_picker">
                                    <div class="-multi-picker">
                                        <div class="-title -picker__label">TOPS</div>
                                        <div class="-multi-picker__pickers">

                                            <div class="-picker" data-question-id="spendiness_tops">
                                                <select name="spendiness_tops" id="spendiness_tops" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                    <option selected="selected" value="50,100">$50 - $100</option>
                                                    <option value="100,150">$100 - $150</option>
                                                    <option value="150,200">$150 - $200</option>
                                                    <option value="200,">$200+</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__error-message"></div>

                                </div>

                                <div class="" data-question-id="spendiness_shoes_label" data-question-type="multi_picker">
                                    <div class="-multi-picker">
                                        <div class="-title -picker__label">SHOES</div>
                                        <div class="-multi-picker__pickers">

                                            <div class="" data-question-id="spendiness_shoes">
                                                <select name="spendiness_shoes" id="spendiness_shoes" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                    <option value="50,100">$50 - $100</option>
                                                    <option value="100,150">$100 - $150</option>
                                                    <option selected="selected" value="150,200">$150 - $200</option>
                                                    <option value="200,">$200+</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__error-message"></div>

                                </div>

                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                <button type="submit" name="price" value="price">Next: More About you <i class="fas fa-arrow-right"></i></button>
                                <a href="#">Save and return Home. »</a>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade  <?php if ($slug == 'information') { ?>  active in <?php } ?>" id="Section5">
                            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                            <div class='form-box-data'>
                                <h3>When is your birthday?</h3>
                                <div class="select-boxes">
                                    <p>mm/dd/yyyy</p>
                                    <input placeholder="Enter date " type="text" name="user-input-birthdate" id="user-input-birthdate">
                                </div>
                            </div>
                            <div class="form-box-data">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>What’s your primary occupation?</h3>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                        <ul>
                                            <li><label class="input-control radio" for="desired_casual1">
                                                    <input name="desired_casual" value="1" id="desired_casual1" type="radio">
                                                    <span class="input-control__indicator"></span>Architecture / Engineering     
                                                </label>
                                            </li>
                                            <li><label for="desired_casual2" class="input-control radio">
                                                    <input id="desired_casual2" name="desired_casual" value="2" type="radio">
                                                    <span class="input-control__indicator"></span>Art / Design
                                                </label></li>
                                            <li><label for="desired_casual3" class="input-control radio">
                                                    <input id="desired_casual3" name="desired_casual" value="3" type="radio">
                                                    <span class="input-control__indicator"></span>Building / Maintenance
                                                </label></li>
                                            <li><label for="desired_casual4" class="input-control radio">
                                                    <input id="desired_casual4" name="desired_casual" value="4" type="radio">
                                                    <span class="input-control__indicator"></span>Business / Client Service
                                                </label>
                                            </li>
                                            <li><label for="desired_casual5" class="input-control radio">
                                                    <input id="desired_casual5" name="desired_casual" value="5" type="radio">
                                                    <span class="input-control__indicator"></span>Community / Social Service
                                                </label></li>
                                            <li><label for="desired_casual7" class="input-control radio">
                                                    <input id="desired_casual7" name="desired_casual" value="6" type="radio">
                                                    <span class="input-control__indicator"></span>Computer / IT
                                                </label></li>
                                            <li><label for="desired_casual8" class="input-control radio">
                                                    <input id="desired_casual8" name="desired_casual" value="7" type="radio">
                                                    <span class="input-control__indicator"></span>Education
                                                </label>
                                            </li>
                                            <li><label for="desired_casual6" class="input-control radio">
                                                    <input id="desired_casual6" name="desired_casual" value="8" type="radio">
                                                    <span class="input-control__indicator"></span>Entertainer / Performer
                                                </label></li>
                                            <li><label for="desired_casual9" class="input-control radio">
                                                    <input id="desired_casual9" name="desired_casual" value="9" type="radio">
                                                    <span class="input-control__indicator"></span>Farming / Fishing / Forestry
                                                </label></li>
                                            <li><label for="desired_casual10" class="input-control radio">
                                                    <input id="desired_casual10" name="desired_casual" value="10" type="radio">
                                                    <span class="input-control__indicator"></span>Financial Services
                                                </label></li>
                                            <li><label for="desired_casual11" class="input-control radio">
                                                    <input id="desired_casual11" name="desired_casual" value="11" type="radio">
                                                    <span class="input-control__indicator"></span>Health Practitioner / Technician
                                                </label>
                                            </li>
                                            <li><label for="desired_casual12" class="input-control radio">
                                                    <input id="desired_casual12" name="desired_casual" value="12" type="radio">
                                                    <span class="input-control__indicator"></span>Hospitality / Food Service
                                                </label></li>
                                            <li><label for="desired_casual13" class="input-control radio">
                                                    <input id="desired_casual13" name="desired_casual" value="13" type="radio">
                                                    <span class="input-control__indicator"></span>Management
                                                </label></li>
                                            <li><label for="desired_casual14" class="input-control radio">
                                                    <input id="desired_casual14" name="desired_casual" value="14" type="radio">
                                                    <span class="input-control__indicator"></span>Media / Communications
                                                </label>
                                            </li>
                                            <li><label for="desired_casual15" class="input-control radio">
                                                    <input id="desired_casual15" name="desired_casual" value="15" type="radio">
                                                    <span class="input-control__indicator"></span>Military / Protective Service
                                                </label></li>
                                            <li><label for="desired_casual16" class="input-control radio">
                                                    <input id="desired_casual16" name="desired_casual" value="16" type="radio">
                                                    <span class="input-control__indicator"></span>Legal
                                                </label></li>
                                            <li><label for="desired_casual17" class="input-control radio">
                                                    <input id="desired_casual17" name="desired_casual" value="17" type="radio">
                                                    <span class="input-control__indicator"></span>Office / Administration
                                                </label>
                                            </li>
                                            <li><label for="desired_casual18" class="input-control radio">
                                                    <input id="desired_casual18" name="desired_casual" value="18" type="radio">
                                                    <span class="input-control__indicator"></span>Average
                                                </label></li>
                                            <li><label for="desired_casual18" class="input-control radio">
                                                    <input id="desired_casual18" name="desired_casual" value="19" type="radio">
                                                    <span class="input-control__indicator"></span>Personal Care &amp; Service
                                                </label></li>
                                            <li><label for="desired_casual18" class="input-control radio">
                                                    <input id="desired_casual18" name="desired_casual" value="20" type="radio">
                                                    <span class="input-control__indicator"></span>Production / Manufacturing
                                                </label></li>
                                            <li><label for="desired_casual19" class="input-control radio">
                                                    <input id="desired_casual19" name="desired_casual" value="21" type="radio">
                                                    <span class="input-control__indicator"></span>Retail
                                                </label>
                                            </li>
                                            <li><label for="desired_casual20" class="input-control radio">
                                                    <input id="desired_casual20" name="desired_casual" value="22" type="radio">
                                                    <span class="input-control__indicator"></span>Sales
                                                </label></li>
                                            <li><label for="desired_casual21" class="input-control radio">
                                                    <input id="desired_casual21" name="desired_casual" value="23" type="radio">
                                                    <span class="input-control__indicator"></span>Science
                                                </label></li>
                                            <li><label for="desired_casual22" class="input-control radio">
                                                    <input id="desired_casual22" name="desired_casual" value="24" type="radio">
                                                    <span class="input-control__indicator"></span>Technology
                                                </label>
                                            </li>
                                            <li><label for="desired_casual23" class="input-control radio">
                                                    <input id="desired_casual23" name="desired_casual" value="25" type="radio">
                                                    <span class="input-control__indicator"></span>Transportation
                                                </label></li>
                                            <li><label for="desired_casual24" class="input-control radio">
                                                    <input id="desired_casual24" name="desired_casual" value="26" type="radio">
                                                    <span class="input-control__indicator"></span>Self-Employed
                                                </label></li>
                                            <li><label for="desired_casual25" class="input-control radio">
                                                    <input id="desired_casual25" name="desired_casual" value="27" type="radio">
                                                    <span class="input-control__indicator"></span>Stay-At-Home Parent
                                                </label>
                                            </li>
                                            <li><label for="desired_casual26" class="input-control radio">
                                                    <input id="desired_casual26" name="desired_casual" value="28" type="radio">
                                                    <span class="input-control__indicator"></span>Student
                                                </label></li>
                                            <li><label for="desired_casual27" class="input-control radio">
                                                    <input id="desired_casual27" name="desired_casual" value="29" type="radio">
                                                    <span class="input-control__indicator"></span>Retired
                                                </label></li>
                                            <li><label for="desired_casual28" class="input-control radio">
                                                    <input id="desired_casual28" name="desired_casual" value="39" type="radio">
                                                    <span class="input-control__indicator"></span>Not Employed
                                                </label></li>
                                            <li><label for="desired_casual29" class="input-control radio">
                                                    <input id="desired_casual29" name="desired_casual" value="40" type="radio">
                                                    <span class="input-control__indicator"></span>Other
                                                </label></li>
                                        </ul>
                                    </div>

                                </div>	
                            </div>
                            <div class="form-box-data">

                                <div class="row">                                
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <h3>Are you a parent?(Optional) </h3>

                                        <div class="switch-field">
                                            <input id="Yes" name="parent" value="yes" checked="" type="radio">
                                            <label for="Yes">Yes</label>
                                            <input id="No" name="parent" value="no" type="radio">
                                            <label for="No">No</label>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="form-box-data checkboxes">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <h3>What are your primary objectives of signing up for Stitch Fix? </h3>
                                        <h6>Select all that apply.</h6>
                                        <div class="select-boxes">
                                            <ul>
                                                <li>
                                                    <input id="try_new_items1" name="try_new_items" type="checkbox">
                                                    <label for="try_new_items1">To try items I wouldn't select for myself</label>
                                                </li>
                                                <li>
                                                    <input id="try_new_items2" name="try_new_items" type="checkbox">
                                                    <label for="try_new_items2">To give myself a gift / surprise</label>
                                                </li>
                                                <li>
                                                    <input id="try_new_items3" name="try_new_items" type="checkbox">
                                                    <label for="try_new_items3">To discover new trends / styles</label>
                                                </li>
                                                <li>
                                                    <input id="try_new_items4" name="try_new_items" type="checkbox">
                                                    <label for="try_new_items4">To save time and reduce my need to shop</label>
                                                </li>
                                                <li>
                                                    <input id="try_new_items5" name="try_new_items" type="checkbox">
                                                    <label for="try_new_items5">To get expert advice</label>
                                                </li>
                                                <li>
                                                    <input id="try_new_items1a" name="try_new_items" type="checkbox">
                                                    <label for="try_new_items1a">To access exclusive brands</label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-box-data">

                                <h3>Final thoughts? Anything else we should know before we style for you? We're all ears!</h3>                               

                                <h6>Example: My workplace is pretty casual. I can wear jeans but I would like to dress it up with cute tops! Also, please stick to warm tones - I look best in burgundy, plum and mustard. I prefer v-neck blouses and subtle prints.</h6>

                                <textarea name="profile_note" id="profile_note" class="form-control" id="exampleTextarea" rows="3" style="padding: 5px 12px 6px;
                                          width: 100%;
                                          border-color: #C0BDBA;
                                          font-size: 18px;
                                          line-height: 1.4;
                                          min-height: 150px;
                                          border-radius: 0px;
                                          -webkit-appearance: none;">j56iii6oo</textarea>






                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                <button type="submit" name="info" value="info">SAVE ALL CHANGES <i class="fas fa-arrow-right"></i></button>
                                <a href="#">Save and return Home. »</a>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>





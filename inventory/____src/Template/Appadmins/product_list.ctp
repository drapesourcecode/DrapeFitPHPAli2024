<script>
    function getChanges(value, category = '') {
        if (value) {
            var url = '<?php echo HTTP_ROOT ?>';
            window.location.href = url + "appadmins/product_list/" + value + "/" + category;
        }
    }
</script>
<?php $user_type = $this->request->session()->read('Auth.User.type'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1> <?php
            $color_arr = $this->Custom->inColor();
            echo!empty($profile) ? $profile : 'Men';
            ?> Products </h1>        
    </section>

    <section class="content" style="min-height: auto !important;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">

                        <div class="nav-tabs-custom">
                            <label>Profile</label>
                            <select name="" class="form-control" onchange=" return getChanges(this.value)">
                                <option <?php if (@$profile == 'Men') { ?> selected="" <?php } ?> value="Men">Men</option>
                                <option <?php if (@$profile == 'Women') { ?> selected="" <?php } ?> value="Women">Women</option>
                                <option <?php if (@$profile == 'BoyKids') { ?> selected="" <?php } ?> value="BoyKids">Boy Kids</option>
                                <option <?php if (@$profile == 'GirlKids') { ?> selected="" <?php } ?> value="GirlKids">Girl Kids</option>
                            </select>
                            <label>Category</label>
                            <select name="" class="form-control" onchange=" return getChanges('<?php echo!empty($profile) ? $profile : 'Men'; ?>', this.value)">
                                <option <?php if ($category == '') { ?> selected="" <?php } ?> value="">---</option>
                                <?php foreach ($productType as $ptyp_li) { ?>
                                    <option <?php if ($category == $ptyp_li->id) { ?> selected="" <?php } ?> value="<?php echo $ptyp_li->id; ?>"><?php echo $ptyp_li->product_type . '-' . $ptyp_li->name; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
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
                            <div class="row">
                                <div class="col-sm-4">
                                <?= $this->Form->create('', array('id' => 'search_frmx', 'type' => 'GET', "autocomplete" => "off")); ?>
                                    <label>Scan Product For Update Features </label>
                                    <input type="hidden" name="search_for" value="style_no">
                                    <input type="text" class="form-control" id="scan_fld" name="search_data" placeholder="Barcode">
                                <?= $this->Form->end(); ?>
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <div  class="col-sm-6">
                                    <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                    <div class="form-group">
                                        <select class="form-control" name="search_for" required>
                                            <option value="" selected disabled>Select field</option>
                                            <option value="brand_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "brand_name")) ? "selected" : ""; ?> >Brand Name</option> 
                                            <option value="product_name_one" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name_one")) ? "selected" : ""; ?> >Product name one</option> 
                                            <!--<option value="product_name_two" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name_two")) ? "selected" : ""; ?> >Product name two</option>--> 
                                            <option value="style_no" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "style_no")) ? "selected" : ""; ?> >Style no</option> 
    <!--                                                <option value="prod_id" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "prod_id")) ? "selected" : ""; ?> >Prod id</option> -->

                                        </select>
                                        <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                                        <button type="submit" class="btn btn-sm btn-info">Search</button>
                                        <a href="<?= HTTP_ROOT; ?>appadmins/product_list/Men" class="btn btn-sm btn-primary">See All</a>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                            <table id="exampleXX" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Brand Name</th>

                                        <th>Product Name 1</th>
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
                                    <?php foreach ($menproductdetails as $pdetails): ?>

                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">

                                            <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>

                <!-- <td><?php echo $pdetails->user_id ?></td> -->
                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td>
                                                <?php
                                                //echo  $pdetails->prodcut_id;

                                                /* if (empty($pdetails->prodcut_id)) { */
                                                ?>
                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php /* } else { ?>
                                                  <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                  <?php } */ ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->picked_size)) {
                                                    $li_size = explode('-', $pdetails->picked_size);
                                                    foreach ($li_size as $sz_l) {
                                                        if (($pdetails->$sz_l == 0) || ($pdetails->$sz_l == 00)) {
                                                            echo $pdetails->$sz_l;
                                                        } else {
                                                            echo!empty($pdetails->$sz_l) ? $pdetails->$sz_l . '&nbsp;&nbsp;' : '';
                                                        }
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
                                            <td><?php echo (empty($pdetails->style_number)) ? $pdetails->dtls : $pdetails->style_number; ?></td>
                                            
                                            <td style="text-align: center;">
                                                <?php if($pdetails->is_deleted !=1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list')), ['action' => 'listProduct', $pdetails->prod_id], ['escape' => false, "data-placement" => "top", "data-hint" => "View all products", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                <a href="<?= HTTP_ROOT . "appadmins/all_barcode_prints/" . $pdetails->prod_id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>



                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalproduct-' . $pdetails->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', 'Men', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= ($user_type == 1) ? $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'productDelete', $pdetails->id, 'InProducts', $profile], ['escape' => false, "data-placement" => "top", "data-hint" => "Product Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]) : ''; ?>


                                                <?php if ($pdetails->available_status == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/InProducts'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/InProducts'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                                <?php }else{ ?> <span>Deleted</span><?php } ?>
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
                                                                Product name 1  : <?php echo $pdetails->product_name_one; ?> 
                                                            </div>
                                                            
                                                            <div class="col-md-5">
                                                                Height range  : <?php echo $pdetails->tall_feet . 'ft ' . $pdetails->tall_inch; ?> to <?php echo $pdetails->tall_feet2 . 'ft ' . $pdetails->tall_inch2; ?>
                                                            </div>
                                                            <div class="col-md-4">
                                                                Weight range : <?php echo $pdetails->best_fit_for_weight; ?> to <?php echo $pdetails->best_fit_for_weight2; ?>
                                                            </div>
                                                            <div class="col-md-3">
                                                                Age range : <?php echo $pdetails->age1; ?> to <?php echo $pdetails->age2; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Brand : <?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                                    <div class="col-md-12">

                                                                        <p>Body Shape</p>
                                                                        <ul class="list-inline">
                                                                            <?php if (!empty($pdetails->better_body_shape) && in_array(2, json_decode($pdetails->better_body_shape, true))) { ?> 
                                                                                <li>
                                                                                    <h4 style="margin-top: 0;">Rectangle</h4>
                                                                                    <label for="radio2">
                                                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-2.png" width="50">
                                                                                    </label>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if (!empty($pdetails->better_body_shape) && in_array(3, json_decode($pdetails->better_body_shape, true))) { ?>  
                                                                                <li>
                                                                                    <h4 style="margin-top: 0;">Triangle</h4>
                                                                                    <label for="radio3">
                                                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-3.png" width="50">
                                                                                    </label>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if (!empty($pdetails) && (!empty($pdetails->better_body_shape) && in_array(1, json_decode($pdetails->better_body_shape, true)))) { ?>
                                                                                <li>
                                                                                    <h4 style="margin-top: 0;">Trapezoid</h4>
                                                                                    <label for="radio1">
                                                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-1.png" width="50">
                                                                                    </label>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if (!empty($pdetails->better_body_shape) && in_array(4, json_decode($pdetails->better_body_shape, true))) { ?> 
                                                                                <li>
                                                                                    <h4 style="margin-top: 0;">Oval</h4>
                                                                                    <label for="radio4">
                                                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-4.png" width="50">
                                                                                    </label>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if (!empty($pdetails->better_body_shape) && in_array(5, json_decode($pdetails->better_body_shape, true))) { ?>
                                                                                <li>
                                                                                    <h4 style="margin-top: 0;">Inverted Triangle</h4>
                                                                                    <label for="radio5">
                                                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-5.png" width="50">
                                                                                    </label>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>

                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        Skin tone  : 
                                                                        <?php
                                                                        if (!empty($pdetails->skin_tone) && in_array(1, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#fdc8b9;display: inline-flex;row-gap: normal;"></span> ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(2, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#f0b4a2;display: inline-flex;row-gap: normal;"></span>  ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(3, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#d0967e;display: inline-flex;row-gap: normal;"></span>  ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(4, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#c57456;display: inline-flex;row-gap: normal;"></span>  ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(5, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#78412a;display: inline-flex;row-gap: normal;"></span>  ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(6, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#e6e6e6;display: inline-flex;row-gap: normal;"></span> ';
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                    <div class="col-md-12">

                                                                        Typically wear to work ? : 
                                                                        <?php
                                                                        if (!empty($pdetails->work_type) && in_array(1, json_decode($pdetails->work_type, true))) {
                                                                            echo 'Casual, ';
                                                                        }
                                                                        if (!empty($pdetails->work_type) && in_array(2, json_decode($pdetails->work_type, true))) {
                                                                            echo 'Business Casual, ';
                                                                        }
                                                                        if (!empty($pdetails->work_type) && in_array(3, json_decode($pdetails->work_type, true))) {
                                                                            echo 'Formal';
                                                                        }
                                                                        ?>

                                                                    </div>

                                                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                                                            <p>Tell us which of these outfits would you prefer to wear?</p>
                                                                            <ul class="list-inline">
                                                                                <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(1, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>  
                                                                                <li>
                                                                                    <label for="mens101">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit1.jpg" width="50">
                                                                                    </label>
                                                                                </li>
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(2, json_decode($pdetails->style_sphere_selections_v5, true))) { ?> 
                                                                                <li>
                                                                                    <label for="mens102">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit2.jpg" width="50">
                                                                                    </label>
                                                                                </li>
                                                                                <?php } ?>
                                                                                
                                                                                <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(3, json_decode($pdetails->style_sphere_selections_v5, true))) { ?> 
                                                                                <li>
                                                                                    <input class="radio-box" id="mens103" name="style_sphere_selections_v5[]" value="3" type="checkbox" >
                                                                                    <label for="mens103">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit3.jpg" width="50">
                                                                                    </label>
                                                                                </li> 
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(4, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens104">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit4.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(5, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens105">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit5.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(6, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens106">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit6.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(7, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens107">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit7.jpg" width="50">
                                                                                    </label>
                                                                                </li> 
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(8, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens108">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit8.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(9, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                   <label for="mens109">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit9.jpg" width="50">
                                                                                    </label>
                                                                                </li> 
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(10, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens110">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit10.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(11, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens111">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit11.jpg" width="50">
                                                                                    </label>
                                                                                </li> 
                                                                                <?php } ?>
                                                                                <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(12, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens112">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit12.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(13, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>
                                                                                    <label for="mens113">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit13.jpg" width="50">
                                                                                    </label>
                                                                                </li>
                                                                                <?php } ?>
                                                                                <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(14, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>                                                            
                                                                                    <label for="mens114">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit14.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(15, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>                                                            
                                                                                    <label for="mens115">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit15.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(16, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>                                                            
                                                                                    <label for="mens116">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit16.jpg" width="50">
                                                                                    </label>
                                                                                </li>  
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(17, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>                                                            
                                                                                    <label for="mens117">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit17.jpg" width="50">
                                                                                    </label>
                                                                                </li> 
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(18, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>                                                            
                                                                                    <label for="mens118">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit18.jpg" width="50">
                                                                                    </label>
                                                                                </li> 
                                                                                <?php } ?>
                                                                                <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(19, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>                                                                                                                            <label for="mens119">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit19.jpg" width="50">
                                                                                    </label>
                                                                                </li>
                                                                                <?php } ?>
                                                                                 <?php if (!empty($pdetails->style_sphere_selections_v5) && in_array(20, json_decode($pdetails->style_sphere_selections_v5, true))) { ?>
                                                                                <li>                                                            
                                                                                     <label for="mens120">
                                                                                        <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit20.jpg" width="50">
                                                                                    </label>
                                                                                </li> 
                                                                                <?php } ?>
                                                                            </ul>
                                                                    </div>
                                                            
                                                            <div class="col-sm-12 col-lg-12 col-md-12 note-label">
                                                <p>Any fit issues to take note of?</p>
                                                <ul class="list-inline">
                                                     <?php if (!empty($pdetails->take_note_of) && in_array(1, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3a">Long Arms, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(2, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3b">Short Arms, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(3, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3c">Thick Arms, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(15, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3d">Broad Shoulders, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(4, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3e">Man Boobs, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(5, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3f">Big Belly, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(6, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3g">Big Butt, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(14, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3h">Small Butt, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(7, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3i">Thunder Things, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(8, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3j">Thick Neck, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(9, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3k">Short Torso, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(13, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3l">Long Torso, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(10, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3m">Broad Chest, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(11, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3n">Very Skinny, </label>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->take_note_of) && in_array(12, json_decode($pdetails->take_note_of, true))) { ?> 
                                                    <li>
                                                        <label for="check-box3o">Skinny Legs, </label>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>

                                                                </div>
                                                        
                                                        <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p><b>Budget</b></p>
                                                                    </div>
                                                                    <?php if (($pdetails->budget_type == "men_shirt_budg")) { ?>                 
                                                                        <div class="col-md-6">

                                                                            <label >SHIRTS</label>                                               
                                                                            <?php if (($pdetails->budget_type == "men_shirt_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shirt_budg") && ($pdetails->budget_value == '1')) { ?> Under $50 <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shirt_budg") && ($pdetails->budget_value == '2')) { ?> $50 - $75 <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shirt_budg") && ($pdetails->budget_value == '3')) { ?> $75 - $100 <?php } ?>  
                                                                            <?php if (($pdetails->budget_type == "men_shirt_budg") && ($pdetails->budget_value == '4')) { ?> $100 - $125 <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shirt_budg") && ($pdetails->budget_value == '5')) { ?> $125+ <?php } ?>


                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_polos_budg")) { ?>
                                                                        <div class="col-md-6">

                                                                            <label>

                                                                                TEES & POLOS
                                                                            </label>


                                                                            <?php if (($pdetails->budget_type == "men_polos_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_polos_budg") && ($pdetails->budget_value == '1')) { ?> Under $30  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_polos_budg") && ($pdetails->budget_value == '2')) { ?> $30 - $50  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_polos_budg") && ($pdetails->budget_value == '3')) { ?> $50 - $70 <?php } ?>  
                                                                            <?php if (($pdetails->budget_type == "men_polos_budg") && ($pdetails->budget_value == '4')) { ?> $70 - $90 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_polos_budg") && ($pdetails->budget_value == '5')) { ?> $90+  <?php } ?> 


                                                                        </div>
                                                                    <?php } ?> 
                                                                    <?php if (($pdetails->budget_type == "men_sweater_budg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <label >                                                     
                                                                                SWEATERS & SWEATSHIRTS
                                                                            </label>
                                                                            <?php if (($pdetails->budget_type == "men_sweater_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_sweater_budg") && ($pdetails->budget_value == '1')) { ?> Under $50  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_sweater_budg") && ($pdetails->budget_value == '2')) { ?> $50 - $75  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_sweater_budg") && ($pdetails->budget_value == '3')) { ?> $75 - $100  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_sweater_budg") && ($pdetails->budget_value == '4')) { ?> $100 - $125 <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_sweater_budg") && ($pdetails->budget_value == '5')) { ?> $125+ <?php } ?>                                            
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_pants_budg")) { ?> 
                                                                        <div class="col-md-6">
                                                                            <label>
                                                                                PANTS & DENIM
                                                                            </label>


                                                                            <?php if (($pdetails->budget_type == "men_pants_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_pants_budg") && ($pdetails->budget_value == '1')) { ?> Under $75 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_pants_budg") && ($pdetails->budget_value == '2')) { ?> $75 - $100  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_pants_budg") && ($pdetails->budget_value == '3')) { ?> $100 - $125 <?php } ?>   
                                                                            <?php if (($pdetails->budget_type == "men_pants_budg") && ($pdetails->budget_value == '4')) { ?> $125 - $175  <?php } ?>  
                                                                            <?php if (($pdetails->budget_type == "men_pants_budg") && ($pdetails->budget_value == '5')) { ?> $175+ <?php } ?>  

                                                                        </div>

                                                                    <?php } ?> 
                                                                    <?php if (($pdetails->budget_type == "men_shorts_budg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <label >
                                                                                SHORTS
                                                                            </label>


                                                                            <?php if (($pdetails->budget_type == "men_shorts_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>  
                                                                            <?php if (($pdetails->budget_type == "men_shorts_budg") && ($pdetails->budget_value == '1')) { ?> Under $40  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shorts_budg") && ($pdetails->budget_value == '2')) { ?> $40 - $60  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shorts_budg") && ($pdetails->budget_value == '3')) { ?> $60 - $80 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_shorts_budg") && ($pdetails->budget_value == '4')) { ?> $80 - $100  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_shorts_budg") && ($pdetails->budget_value == '5')) { ?> $100+ <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_shoe_budg")) { ?> 
                                                                        <div class="col-md-6">
                                                                            <label>
                                                                                SHOES 
                                                                            </label>


                                                                            <?php if (($pdetails->budget_type == "men_shoe_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shoe_budg") && ($pdetails->budget_value == '1')) { ?> Under $75  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shoe_budg") && ($pdetails->budget_value == '2')) { ?> $75 - $125  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shoe_budg") && ($pdetails->budget_value == '3')) { ?> $125 - $175 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_shoe_budg") && ($pdetails->budget_value == '4')) { ?> $175 - $250   <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_shoe_budg") && ($pdetails->budget_value == '5')) { ?> $250+  <?php } ?>  

                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_outerwear_budg")) { ?> 
                                                                        <div class="col-md-6">
                                                                            <label >
                                                                                OUTERWEAR
                                                                            </label>                                                
                                                                            <?php if (($pdetails->budget_type == "men_outerwear_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_outerwear_budg") && ($pdetails->budget_value == '1')) { ?> Under $75  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_outerwear_budg") && ($pdetails->budget_value == '2')) { ?> $75 - $125 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_outerwear_budg") && ($pdetails->budget_value == '3')) { ?> $125 - $175   <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_outerwear_budg") && ($pdetails->budget_value == '4')) { ?> $175 - $250  <?php } ?> 
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_ties_budg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <label>
                                                                                Ties 
                                                                            </label>                                               
                                                                            <?php if (($pdetails->budget_type == "men_ties_budg") && ($pdetails->budget_value == 'NULL')) { ?> I want the best  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_ties_budg") && ($pdetails->budget_value == '40-60')) { ?> $40 - $60 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_ties_budg") && ($pdetails->budget_value == 'up-to-80')) { ?> Up to $80  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_ties_budg") && ($pdetails->budget_value == 'up-to-100')) { ?> Up to  $100 <?php } ?> 
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_belts_budg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <label >                                                    
                                                                                Belts
                                                                            </label>                                               
                                                                            <?php if (($pdetails->budget_type == "men_belts_budg") && ($pdetails->budget_value == 'NULL')) { ?> I want the best  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_belts_budg") && ($pdetails->budget_value == '30-50')) { ?> $30 - $50 <?php } ?>  
                                                                            <?php if (($pdetails->budget_type == "men_belts_budg") && ($pdetails->budget_value == 'up-to-70')) { ?> Up to $70  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_belts_budg") && ($pdetails->budget_value == 'up-to-90')) { ?> Up to  $90 <?php } ?>    
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_bags_budg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <label>                                                    
                                                                                Wallets,Bags, Accessories 
                                                                            </label>
                                                                            <?php if (($pdetails->budget_type == "men_bags_budg") && ($pdetails->budget_value == 'NULL')) { ?> I want the best  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_bags_budg") && ($pdetails->budget_value == '25-50')) { ?> $25 - $50  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_bags_budg") && ($pdetails->budget_value == 'up-to-75')) { ?> Up to $75 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_bags_budg") && ($pdetails->budget_value == 'up-to-100')) { ?> Up to  $100 <?php } ?>   
                                                                        </div>
                                                                    <?php } ?>

                                                                    <?php if (($pdetails->budget_type == "men_sunglass_budg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <label >Sunglasses</label>                                               
                                                                            <?php if (($pdetails->budget_type == "men_sunglass_budg") && ($pdetails->budget_value == 'NULL')) { ?> I want the best <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_sunglass_budg") && ($pdetails->budget_value == '40-60')) { ?> $40 - $60 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_sunglass_budg") && ($pdetails->budget_value == 'up-to-80')) { ?> Up to $80  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_sunglass_budg") && ($pdetails->budget_value == 'up-to-100')) { ?> Up to  $100  <?php } ?>  
                                                                            <?php if (($pdetails->budget_type == "men_sunglass_budg") && ($pdetails->budget_value == '100-150')) { ?> $100 - $150 <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_hats_budg")) { ?> 
                                                                        <div class="col-md-6">
                                                                            <label>
                                                                                Hats
                                                                            </label>


                                                                            <?php if (($pdetails->budget_type == "men_hats_budg") && ($pdetails->budget_value == 'NULL')) { ?> I want the best <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_hats_budg") && ($pdetails->budget_value == '30-50')) { ?> $30 - $50 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_hats_budg") && ($pdetails->budget_value == 'up-to-70')) { ?> Up to $70  <?php } ?>
                                                                        </div>
                                                                    <?php } ?>

                                                                    <?php if (($pdetails->budget_type == "men_socks_budg")) { ?>
                                                                        <div class="col-md-6">                                           
                                                                            <label >                                                     
                                                                                Socks
                                                                            </label>                                                
                                                                            <?php if (($pdetails->budget_type == "men_socks_budg") && ($pdetails->budget_value == 'NULL')) { ?> I want the best <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_socks_budg") && ($pdetails->budget_value == '10-25')) { ?> $10 - $25  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_socks_budg") && ($pdetails->budget_value == 'up-to-35')) { ?> Up to $35  <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_socks_budg") && ($pdetails->budget_value == 'up-to-45')) { ?> Up to $45 <?php } ?> 
                                                                            </select> 

                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_underwear_budg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <label>                                                   
                                                                                Underwear
                                                                            </label>                                                
                                                                            <?php if (($pdetails->budget_type == "men_underwear_budg") && ($pdetails->budget_value == 'NULL')) { ?> I want the best <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_underwear_budg") && ($pdetails->budget_value == '10-25')) { ?> $10 - $25 <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_underwear_budg") && ($pdetails->budget_value == 'up-to-35')) { ?> Up to $35  <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_underwear_budg") && ($pdetails->budget_value == 'up-to-45')) { ?> Up to $45  <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php if (($pdetails->budget_type == "men_hats_budg")) { ?>
                                                                        <div class="col-md-6">                                            
                                                                            <label>                                                     
                                                                                Grooming
                                                                            </label>
                                                                            <?php if (($pdetails->budget_type == "men_grooming_budg") && ($pdetails->budget_value == 'NULL')) { ?> I want the best  <?php } ?> value="NULL">I want the best 
                                                                            <?php if (($pdetails->budget_type == "men_grooming_budg") && ($pdetails->budget_value == '10-25')) { ?> $10 - $25 <?php } ?> 
                                                                            <?php if (($pdetails->budget_type == "men_grooming_budg") && ($pdetails->budget_value == 'up-to-35')) { ?> Up to $35 <?php } ?>
                                                                            <?php if (($pdetails->budget_type == "men_grooming_budg") && ($pdetails->budget_value == 'up-to-45')) { ?> Up to $45  <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                        
                                                        <div class="row">
                                                                    <div class="col-md-12">

                                                                        <label>Profession</label>

                                                                        <?php if (!empty($pdetails->profession) && in_array('NULL', json_decode($pdetails->profession, true))) { ?> -- , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(1, json_decode($pdetails->profession, true))) { ?> Architecture / Engineering  , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(2, json_decode($pdetails->profession, true))) { ?> Art / Design , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(3, json_decode($pdetails->profession, true))) { ?> Building / Maintenance , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(4, json_decode($pdetails->profession, true))) { ?> Business / Client Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(5, json_decode($pdetails->profession, true))) { ?> Community / Social Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(6, json_decode($pdetails->profession, true))) { ?> Computer / IT  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(7, json_decode($pdetails->profession, true))) { ?> Education , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(8, json_decode($pdetails->profession, true))) { ?> Entertainer / Performer  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(9, json_decode($pdetails->profession, true))) { ?> Farming / Fishing / Forestry  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(10, json_decode($pdetails->profession, true))) { ?> Financial Services , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(11, json_decode($pdetails->profession, true))) { ?> Health Practitioner / Technician  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(12, json_decode($pdetails->profession, true))) { ?> Hospitality / Food Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(13, json_decode($pdetails->profession, true))) { ?> Management , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(14, json_decode($pdetails->profession, true))) { ?> Media / Communications  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(15, json_decode($pdetails->profession, true))) { ?> Military / Protective Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(16, json_decode($pdetails->profession, true))) { ?> Legal  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(17, json_decode($pdetails->profession, true))) { ?> Office / Administration , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(18, json_decode($pdetails->profession, true))) { ?> Average , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(19, json_decode($pdetails->profession, true))) { ?> Personal Care & Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(20, json_decode($pdetails->profession, true))) { ?> Production / Manufacturing  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(21, json_decode($pdetails->profession, true))) { ?> Retail , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(22, json_decode($pdetails->profession, true))) { ?> Sales , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(23, json_decode($pdetails->profession, true))) { ?> Science , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(24, json_decode($pdetails->profession, true))) { ?> Technology , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(25, json_decode($pdetails->profession, true))) { ?> Transportation , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(26, json_decode($pdetails->profession, true))) { ?> Self-Employed  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(27, json_decode($pdetails->profession, true))) { ?> Stay-At-Home Parent  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(28, json_decode($pdetails->profession, true))) { ?> Student , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(29, json_decode($pdetails->profession, true))) { ?> Retired , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(30, json_decode($pdetails->profession, true))) { ?> Not Employed  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(31, json_decode($pdetails->profession, true))) { ?> Other , <?php } ?> 


                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <label for="exampleInputPassword1">Occasions</label>

                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array('NULL', json_decode($pdetails->occasional_dress, true))) { ?> -- , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(1, json_decode($pdetails->occasional_dress, true))) { ?> Business Casual / Work , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(2, json_decode($pdetails->occasional_dress, true))) { ?> Cocktail / Wedding / Special , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(3, json_decode($pdetails->occasional_dress, true))) { ?> Building / Maintenance , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(4, json_decode($pdetails->occasional_dress, true))) { ?> Most of the time , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(5, json_decode($pdetails->occasional_dress, true))) { ?> Around once or twice a month , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(6, json_decode($pdetails->occasional_dress, true))) { ?> Date Night / Night Out , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(7, json_decode($pdetails->occasional_dress, true))) { ?> Laid Back Casual , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(8, json_decode($pdetails->occasional_dress, true))) { ?> Rarely , <?php } ?>

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
    <?php if (@$profile == 'Women') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-4">
                                <?= $this->Form->create('', array('id' => 'search_frmx', 'type' => 'GET', "autocomplete" => "off")); ?>
                                    <label>Scan Product For Update Features </label>
                                    <input type="hidden" name="search_for" value="style_no">
                                    <input type="text" class="form-control" id="scan_fld" name="search_data" placeholder="Barcode">
                                <?= $this->Form->end(); ?>
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <div  class="col-sm-6">
                                    <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                    <div class="form-group">
                                        <select class="form-control" name="search_for" required>
                                            <option value="" selected disabled>Select field</option>
                                            <option value="product_name_one" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name_one")) ? "selected" : ""; ?> >Product name one</option> 
                                            <option value="product_name_two" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name_two")) ? "selected" : ""; ?> >Product name two</option> 
                                            <option value="style_no" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "style_no")) ? "selected" : ""; ?> >Style no</option> 
    <!--                                                <option value="prod_id" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "prod_id")) ? "selected" : ""; ?> >Prod id</option> -->

                                        </select>
                                        <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                                        <button type="submit" class="btn btn-sm btn-info">Search</button>
                                        <a href="<?= HTTP_ROOT; ?>appadmins/product_list/Women" class="btn btn-sm btn-primary">See All</a>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                            <table id="exampleXX" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Brand Name</th>

                                        <th>Product Name 1</th>
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
                                    <?php foreach ($womenproductdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">

                                            <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>

                                            <td><?php echo $pdetails->product_name_one; ?></td>

                                            <td>
                                                <?php
                                                //echo  $pdetails->prodcut_id;

                                                /* if (empty($pdetails->prodcut_id)) { */
                                                ?>
                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php /* } else { ?>
                                                  <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                  <?php } */ ?>
                                            </td>

                                            <td>
                                                <?php
                                                if (!empty($pdetails->picked_size)) {
                                                    $li_size = explode('-', $pdetails->picked_size);
                                                    foreach ($li_size as $sz_l) {
                                                        if (($pdetails->$sz_l == 0) || ($pdetails->$sz_l == 00)) {
                                                            echo $pdetails->$sz_l;
                                                        } else {
                                                            echo!empty($pdetails->$sz_l) ? $pdetails->$sz_l . '&nbsp;&nbsp;' : '';
                                                        }
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
                                            <td><?php echo (empty($pdetails->style_number)) ? $pdetails->dtls : $pdetails->style_number; ?></td>
                                           
                                            <td style="text-align: center;">
                                                <?php if($pdetails->is_deleted !=1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list')), ['action' => 'listProduct', $pdetails->prod_id], ['escape' => false, "data-placement" => "top", "data-hint" => "View all products", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                <a href="<?= HTTP_ROOT . "appadmins/all_barcode_prints/" . $pdetails->prod_id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalproductw-' . $pdetails->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', 'Women', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= ($user_type == 1) ? $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'productDelete', $pdetails->id, 'InProducts', $profile], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]) : ''; ?>
                                                <?php if ($pdetails->available_status == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/InProducts'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/InProducts'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                                <?php }else{ ?> <span>Deleted</span><?php } ?>
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
                                                                Product name 1  : <?php echo $pdetails->product_name_one; ?> 
                                                            </div>
                                                            
                                                            <div class="col-md-5">
                                                                Height range  : <?php echo $pdetails->tall_feet . 'ft ' . $pdetails->tall_inch; ?> to <?php echo $pdetails->tall_feet2 . 'ft ' . $pdetails->tall_inch2; ?>
                                                            </div>
                                                            <div class="col-md-4">
                                                                Weight range : <?php echo $pdetails->best_fit_for_weight; ?> to <?php echo $pdetails->best_fit_for_weight2; ?>
                                                            </div>
                                                            <div class="col-md-3">
                                                                Age range : <?php echo $pdetails->age1; ?> to <?php echo $pdetails->age2; ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                Brand : <?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <p>Body shape</p>
                                                                <ul class="list-inline">
                                                                <?php if (!empty($pdetails->better_body_shape) && in_array(2, json_decode($pdetails->better_body_shape, true))) { ?>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Inverted Triangle</h4> 
                                                                <label for="radio2">
                                                                    <img src="<?=HTTP_ROOT_BASE;?>images/inverted-triangle.jpg" width="50">
                                                                </label>
                                                            </li>
                                                            <?php } ?>
                                                             <?php if (!empty($pdetails->better_body_shape) && in_array(3, json_decode($pdetails->better_body_shape, true))) { ?>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Triangle</h4> 
                                                                <label for="radio3">
                                                                    <img src="<?=HTTP_ROOT_BASE;?>images/triangle.jpg" width="50">
                                                                </label>
                                                            </li>
                                                             <?php } ?>
                                                             <?php if (!empty($pdetails->better_body_shape) && in_array(1, json_decode($pdetails->better_body_shape, true))) { ?>
                                                            <li>
                                                                <h4 style="margin-top: 0;">rectangle</h4>
                                                                <label for="radio1">
                                                                    <img src="<?=HTTP_ROOT_BASE;?>images/rectangle.jpg" width="50">
                                                                </label>
                                                            </li>
                                                             <?php } ?>
                                                            <?php if (!empty($pdetails->better_body_shape) && in_array(4, json_decode($pdetails->better_body_shape, true))) { ?>
                                                            <li>
                                                                <h4 style="margin-top: 0;">hourglass</h4>                                                                
                                                                <label for="radio4">
                                                                    <img src="<?=HTTP_ROOT_BASE;?>images/hourglass.jpg" width="50">
                                                                </label>
                                                            </li>
                                                            <?php } ?>
                                                             <?php if (!empty($pdetails->better_body_shape) && in_array(5, json_decode($pdetails->better_body_shape, true))) { ?>
                                                            <li>
                                                                <h4 style="margin-top: 0;">Apple</h4>
                                                               <label for="radio4z">
                                                                    <img src="<?=HTTP_ROOT_BASE;?>images/apple.jpg" width="50">
                                                                </label>
                                                            </li>
                                                             <?php } ?>
                                                        </ul>
                                                            </div>
                                                            <div class="col-md-12">
                                                                        Skin tone  : 
                                                                        <?php
                                                                        if (!empty($pdetails->skin_tone) && in_array(1, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#fdc8b9;display: inline-flex;row-gap: normal;"></span> ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(2, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#f0b4a2;display: inline-flex;row-gap: normal;"></span>  ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(3, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#d0967e;display: inline-flex;row-gap: normal;"></span>  ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(4, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#c57456;display: inline-flex;row-gap: normal;"></span>  ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(5, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#78412a;display: inline-flex;row-gap: normal;"></span>  ';
                                                                        }
                                                                        if (!empty($pdetails->skin_tone) && in_array(6, json_decode($pdetails->skin_tone, true))) {
                                                                            echo '<span style="width:50px;height:50px;border-radius:50%;background:#e6e6e6;display: inline-flex;row-gap: normal;"></span> ';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                            
                                                            <div class="col-md-12">
                                            
                                                <p >OutFit prefer to wear</p>

                                                <div>
                                                    <?php if (!empty($pdetails->outfit_prefer) && in_array('NULL', json_decode($pdetails->outfit_prefer, true))) { ?> 
                                                    <label  style="float: left;width: 12.5%;height: 165px;align-items: center;display: flex;">
                                                            None
                                                        </label>
                                                    <?php } ?>
                                                    <?php if (!empty($pdetails->outfit_prefer) && in_array('style_sphere_selections_v3', json_decode($pdetails->outfit_prefer, true))) { ?>
                                                    <label  style="float: left;width: 12.5%;">
                                                       
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit1.jpg" alt="" width="50">
                                                    </label>
                                                    <?php } ?>
                                                    
                                                     <?php if (!empty($pdetails->outfit_prefer) && in_array('style_sphere_selections_v4', json_decode($pdetails->outfit_prefer, true))) { ?>
                                                    <label  style="float: left;width: 12.5%;">
                                                        
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit2.jpg" alt="" width="50">
                                                    </label>
                                                     <?php } ?>
                                                     <?php if (!empty($pdetails->outfit_prefer) && in_array('style_sphere_selections_v5', json_decode($pdetails->outfit_prefer, true))) { ?>
                                                    <label  style="float: left;width: 12.5%;">
                                                        
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit3.jpg" alt="" width="50">
                                                    </label>
                                                     <?php } ?>
                                                     <?php if (!empty($pdetails->outfit_prefer) && in_array('style_sphere_selections_v6', json_decode($pdetails->outfit_prefer, true))) { ?>
                                                    <label  style="float: left;width: 12.5%;">
                                                        
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit4.jpg" alt="" width="50">
                                                    </label>
                                                     <?php } ?>
                                                    
                                                     <?php if (!empty($pdetails->outfit_prefer) && in_array('style_sphere_selections_v7', json_decode($pdetails->outfit_prefer, true))) { ?> 
                                                    <label  style="float: left;width: 12.5%;">
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit5.jpg" alt="" width="50">
                                                    </label>
                                                     <?php } ?>
                                                    <?php if (!empty($pdetails->outfit_prefer) && in_array('style_sphere_selections_v8', json_decode($pdetails->outfit_prefer, true))) { ?>
                                                    <label  style="float: left;width: 12.5%;">
                                                        
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit6.jpg" alt="" width="50">
                                                    </label>
                                                    <?php } ?>
                                                    
                                                     <?php if (!empty($pdetails->outfit_prefer) && in_array('style_sphere_selections_v9', json_decode($pdetails->outfit_prefer, true))) { ?>
                                                    <label style="float: left;width: 12.5%;">
                                                        
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit7.jpg" alt="" width="50">
                                                    </label>
                                                     <?php } ?>
                                                     <?php if (!empty($pdetails->outfit_prefer) && in_array('style_sphere_selections_v11', json_decode($pdetails->outfit_prefer, true))) { ?>
                                                    <label  style="float: left;width: 12.5%;">
                                                        <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit8.jpg" alt="" width="50">
                                                    </label>
                                                     <?php } ?>
                                           
                                        </div>
                                        </div>
                                                        </div>
                                                                                            <div class="row">
                                        <div class="col-md-12">
                                            <h4><b>Budget</b></h4>
                                        </div>
                                    <?php if (($pdetails->budget_type == "wo_top_budg")) { ?>
                                        <div class="col-md-6">
                                                <label for="exampleInputPassword1">TOPS</label>    
                                                    <?php if (($pdetails->budget_type == "wo_top_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_top_budg") && ($pdetails->budget_value == '1')) { ?> Under $50 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_top_budg") && ($pdetails->budget_value == '2')) { ?> $50 - $75 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_top_budg") && ($pdetails->budget_value == '3')) { ?> $75 - $100 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_top_budg") && ($pdetails->budget_value == '4')) { ?> $100 - $125 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_top_budg") && ($pdetails->budget_value == '5')) { ?> $125+ <?php } ?> 
                                        </div>
                                    <?php } ?>
                                    <?php if (($pdetails->budget_type == "wo_bottoms_budg")) { ?>
                                        <div class="col-md-6">                                            
                                                <label for="exampleInputPassword1">BOTTOMS</label>
                                                    <?php if (($pdetails->budget_type == "wo_bottoms_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_bottoms_budg") && ($pdetails->budget_value == '1')) { ?> Under $30 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_bottoms_budg") && ($pdetails->budget_value == '2')) { ?> $30 - $50 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_bottoms_budg") && ($pdetails->budget_value == '3')) { ?> $50 - $70 <?php } ?> 
                                                    <?php if (($pdetails->budget_type == "wo_bottoms_budg") && ($pdetails->budget_value == '4')) { ?> $70 - $90 <?php } ?> 
                                                    <?php if (($pdetails->budget_type == "wo_bottoms_budg") && ($pdetails->budget_value == '5')) { ?> $90+ <?php } ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (($pdetails->budget_type == "wo_outerwear_budg")) { ?>
                                        <div class="col-md-6">
                                                <label for="exampleInputPassword1">OUTERWEAR</label>                  
                                                    <?php if (($pdetails->budget_type == "wo_outerwear_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_outerwear_budg") && ($pdetails->budget_value == '1')) { ?> Under $50 <?php } ?> 
                                                    <?php if (($pdetails->budget_type == "wo_outerwear_budg") && ($pdetails->budget_value == '2')) { ?> $50 - $75 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_outerwear_budg") && ($pdetails->budget_value == '3')) { ?> $75 - $100 <?php } ?> 
                                                    <?php if (($pdetails->budget_type == "wo_outerwear_budg") && ($pdetails->budget_value == '4')) { ?> $100 - $125 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_outerwear_budg") && ($pdetails->budget_value == '5')) { ?> $125+ <?php } ?>
                                        </div>
                                    <?php } ?>
                                     <?php if (($pdetails->budget_type == "wo_jeans_budg")) { ?>
                                        <div class="col-md-6">
                                                <label for="exampleInputPassword1">JEANS</label>
                                                    <?php if (($pdetails->budget_type == "wo_jeans_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_jeans_budg") && ($pdetails->budget_value == '1')) { ?> Under $75 <?php } ?> 
                                                    <?php if (($pdetails->budget_type == "wo_jeans_budg") && ($pdetails->budget_value == '2')) { ?> $75 - $100  <?php } ?> 
                                                    <?php if (($pdetails->budget_type == "wo_jeans_budg") && ($pdetails->budget_value == '3')) { ?> $100 - $125 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_jeans_budg") && ($pdetails->budget_value == '4')) { ?> $125 - $175 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_jeans_budg") && ($pdetails->budget_value == '5')) { ?> $175+ <?php } ?>
                                                
                                        </div>
                                        <?php } ?>
                                    <?php if (($pdetails->budget_type == "wo_jewelry_budg")) { ?>
                                        <div class="col-md-6">
                                                <label for="exampleInputPassword1">JEWELRY</label>
                                                    <?php if (($pdetails->budget_type == "wo_jewelry_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_jewelry_budg") && ($pdetails->budget_value == '1')) { ?> Under $40 <?php } ?>
                                                   <?php if (($pdetails->budget_type == "wo_jewelry_budg") && ($pdetails->budget_value == '2')) { ?> $40 - $60 <?php } ?>
                                                    <?php if (($pdetails->budget_type == "wo_jewelry_budg") && ($pdetails->budget_value == '3')) { ?> $60 - $80 <?php } ?> 
                                                    <?php if (($pdetails->budget_type == "wo_jewelry_budg") && ($pdetails->budget_value == '4')) { ?> $80 - $100 <?php } ?> 
                                                    <?php if (($pdetails->budget_type == "wo_jewelry_budg") && ($pdetails->budget_value == '5')) { ?> $100+ <?php } ?> 
                                               
                                        </div>
                                        <?php } ?>
                                        <?php if (($pdetails->budget_type == "wo_accessories_budg")) { ?>
                                            <div class="col-md-6">
                                                    <label for="exampleInputPassword1">ACCESSORIES</label>
                                                        <?php if (($pdetails->budget_type == "wo_accessories_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                        <?php if (($pdetails->budget_type == "wo_accessories_budg") && ($pdetails->budget_value == '1')) { ?> Under $75 <?php } ?> 
                                                        <?php if (($pdetails->budget_type == "wo_accessories_budg") && ($pdetails->budget_value == '2')) { ?> $75 - $125 <?php } ?>  
                                                        <?php if (($pdetails->budget_type == "wo_accessories_budg") && ($pdetails->budget_value == '3')) { ?> $125 - $175 <?php } ?> 
                                                        <?php if (($pdetails->budget_type == "wo_accessories_budg") && ($pdetails->budget_value == '4')) { ?> $175 - $250 <?php } ?>
                                                        <?php if (($pdetails->budget_type == "wo_accessories_budg") && ($pdetails->budget_value == '5')) { ?> $250+ <?php } ?> 
                                                    
                                            </div>
                                        <?php } ?>
                                        <?php if (($pdetails->budget_type == "wo_dress_budg")) { ?>
                                            <div class="col-md-6">
                                                    <label for="exampleInputPassword1">DRESS</label>
                                                        <?php if (($pdetails->budget_type == "wo_dress_budg") && ($pdetails->budget_value == 'NULL')) { ?> -- <?php } ?>
                                                        <?php if (($pdetails->budget_type == "wo_dress_budg") && ($pdetails->budget_value == '1')) { ?> Under $75 <?php } ?>
                                                        <?php if (($pdetails->budget_type == "wo_dress_budg") && ($pdetails->budget_value == '2')) { ?> $75 - $125 <?php } ?>
                                                        <?php if (($pdetails->budget_type == "wo_dress_budg") && ($pdetails->budget_value == '3')) { ?> $125 - $175  <?php } ?>
                                                        <?php if (($pdetails->budget_type == "wo_dress_budg") && ($pdetails->budget_value == '4')) { ?> $175 - $250 <?php } ?>
                                                        <?php if (($pdetails->budget_type == "wo_dress_budg") && ($pdetails->budget_value == '5')) { ?> $250+ <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                                        
                                                        <div class="row">
                                                                    <div class="col-md-12">

                                                                        <label>Profession</label>

                                                                        <?php if (!empty($pdetails->profession) && in_array('NULL', json_decode($pdetails->profession, true))) { ?> -- , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(1, json_decode($pdetails->profession, true))) { ?> Architecture / Engineering  , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(2, json_decode($pdetails->profession, true))) { ?> Art / Design , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(3, json_decode($pdetails->profession, true))) { ?> Building / Maintenance , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(4, json_decode($pdetails->profession, true))) { ?> Business / Client Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(5, json_decode($pdetails->profession, true))) { ?> Community / Social Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(6, json_decode($pdetails->profession, true))) { ?> Computer / IT  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(7, json_decode($pdetails->profession, true))) { ?> Education , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(8, json_decode($pdetails->profession, true))) { ?> Entertainer / Performer  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(9, json_decode($pdetails->profession, true))) { ?> Farming / Fishing / Forestry  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(10, json_decode($pdetails->profession, true))) { ?> Financial Services , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(11, json_decode($pdetails->profession, true))) { ?> Health Practitioner / Technician  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(12, json_decode($pdetails->profession, true))) { ?> Hospitality / Food Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(13, json_decode($pdetails->profession, true))) { ?> Management , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(14, json_decode($pdetails->profession, true))) { ?> Media / Communications  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(15, json_decode($pdetails->profession, true))) { ?> Military / Protective Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(16, json_decode($pdetails->profession, true))) { ?> Legal  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(17, json_decode($pdetails->profession, true))) { ?> Office / Administration , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(18, json_decode($pdetails->profession, true))) { ?> Average , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(19, json_decode($pdetails->profession, true))) { ?> Personal Care & Service , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(20, json_decode($pdetails->profession, true))) { ?> Production / Manufacturing  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(21, json_decode($pdetails->profession, true))) { ?> Retail , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(22, json_decode($pdetails->profession, true))) { ?> Sales , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(23, json_decode($pdetails->profession, true))) { ?> Science , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(24, json_decode($pdetails->profession, true))) { ?> Technology , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(25, json_decode($pdetails->profession, true))) { ?> Transportation , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(26, json_decode($pdetails->profession, true))) { ?> Self-Employed  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(27, json_decode($pdetails->profession, true))) { ?> Stay-At-Home Parent  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(28, json_decode($pdetails->profession, true))) { ?> Student , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(29, json_decode($pdetails->profession, true))) { ?> Retired , <?php } ?> 
                                                                        <?php if (!empty($pdetails->profession) && in_array(30, json_decode($pdetails->profession, true))) { ?> Not Employed  , <?php } ?>
                                                                        <?php if (!empty($pdetails->profession) && in_array(31, json_decode($pdetails->profession, true))) { ?> Other , <?php } ?> 


                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <label for="exampleInputPassword1">Occasions</label>

                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array('NULL', json_decode($pdetails->occasional_dress, true))) { ?> -- , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(1, json_decode($pdetails->occasional_dress, true))) { ?> Business Casual / Work , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(2, json_decode($pdetails->occasional_dress, true))) { ?> Cocktail / Wedding / Special , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(3, json_decode($pdetails->occasional_dress, true))) { ?> Building / Maintenance , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(4, json_decode($pdetails->occasional_dress, true))) { ?> Most of the time , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(5, json_decode($pdetails->occasional_dress, true))) { ?> Around once or twice a month , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(6, json_decode($pdetails->occasional_dress, true))) { ?> Date Night / Night Out , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(7, json_decode($pdetails->occasional_dress, true))) { ?> Laid Back Casual , <?php } ?>
                                                                        <?php if (!empty($pdetails->occasional_dress) && in_array(8, json_decode($pdetails->occasional_dress, true))) { ?> Rarely , <?php } ?>

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
    <?php if (@$profile == 'BoyKids') { ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-4">
                                <?= $this->Form->create('', array('id' => 'search_frmx', 'type' => 'GET', "autocomplete" => "off")); ?>
                                    <label>Scan Product For Update Features </label>
                                    <input type="hidden" name="search_for" value="style_no">
                                    <input type="text" class="form-control" id="scan_fld" name="search_data" placeholder="Barcode">
                                <?= $this->Form->end(); ?>
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <div  class="col-sm-6">
                                    <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                    <div class="form-group">
                                        <select class="form-control" name="search_for" required>
                                            <option value="" selected disabled>Select field</option>
                                            <option value="product_name_one" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name_one")) ? "selected" : ""; ?> >Product name one</option> 
                                            <option value="product_name_two" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name_two")) ? "selected" : ""; ?> >Product name two</option> 
                                            <option value="style_no" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "style_no")) ? "selected" : ""; ?> >Style no</option> 
                                            <!--<option value="prod_id" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "prod_id")) ? "selected" : ""; ?> >Prod id</option>--> 

                                        </select>
                                        <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                                        <button type="submit" class="btn btn-sm btn-info">Search</button>
                                        <a href="<?= HTTP_ROOT; ?>appadmins/product_list/BoyKids" class="btn btn-sm btn-primary">See All</a>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                            <table id="exampleXX" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Brand Name</th>

                                        <th>Product Name 1</th>
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

                                            <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>

                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td>
                                                <?php
                                                //echo  $pdetails->prodcut_id;

                                                /* if (empty($pdetails->prodcut_id)) { */
                                                ?>
                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php /* } else { ?>
                                                  <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                  <?php } */ ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->picked_size)) {
                                                    $li_size = explode('-', $pdetails->picked_size);
                                                    foreach ($li_size as $sz_l) {
                                                        if (($pdetails->$sz_l == 0) || ($pdetails->$sz_l == 00)) {
                                                            echo $pdetails->$sz_l;
                                                        } else {
                                                            echo!empty($pdetails->$sz_l) ? $pdetails->$sz_l . '&nbsp;&nbsp;' : '';
                                                        }
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
                                            <td><?php echo (empty($pdetails->style_number)) ? $pdetails->dtls : $pdetails->style_number; ?></td>
                                            
                                            <td style="text-align: center;">
                                                <?php if($pdetails->is_deleted !=1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list')), ['action' => 'listProduct', $pdetails->prod_id], ['escape' => false, "data-placement" => "top", "data-hint" => "View all products", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                <a href="<?= HTTP_ROOT . "appadmins/all_barcode_prints/" . $pdetails->prod_id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalproductbk-' . $pdetails->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', 'BoyKids', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= ($user_type == 1) ? $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'productDelete', $pdetails->id, 'InProducts', $profile], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]) : ''; ?>
                                                <?php if ($pdetails->available_status == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/InProducts'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/InProducts'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                                <?php }else{ ?> <span>Deleted</span><?php } ?>
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
                                                                Product name 1  : <?php echo $pdetails->product_name_one; ?> 
                                                            </div>
                                                            
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
                            <div class="row">
                                <div class="col-sm-4">
                                <?= $this->Form->create('', array('id' => 'search_frmx', 'type' => 'GET', "autocomplete" => "off")); ?>
                                    <label>Scan Product For Update Features </label>
                                    <input type="hidden" name="search_for" value="style_no">
                                    <input type="text" class="form-control" id="scan_fld" name="search_data" placeholder="Barcode">
                                <?= $this->Form->end(); ?>
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <div  class="col-sm-6">
                                    <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                    <div class="form-group">
                                        <select class="form-control" name="search_for" required>
                                            <option value="" selected disabled>Select field</option>
                                            <option value="product_name_one" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name_one")) ? "selected" : ""; ?> >Product name one</option> 
                                            <option value="product_name_two" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "product_name_two")) ? "selected" : ""; ?> >Product name two</option> 
                                            <option value="style_no" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "style_no")) ? "selected" : ""; ?> >Style no</option> 
                                            <!--<option value="prod_id" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "prod_id")) ? "selected" : ""; ?> >Prod id</option>--> 

                                        </select>
                                        <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                                        <button type="submit" class="btn btn-sm btn-info">Search</button>
                                        <a href="<?= HTTP_ROOT; ?>appadmins/product_list/GirlKids" class="btn btn-sm btn-primary">See All</a>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                            <table id="exampleXX" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Brand Name</th>

                                        <th>Product Name 1</th>
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

                                            <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>

                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td>
                                                <?php
                                                //echo  $pdetails->prodcut_id;

                                                /* if (empty($pdetails->prodcut_id)) { */
                                                ?>
                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                <?php /* } else { ?>
                                                  <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->product_image; ?>" style="width: 50px;"/>
                                                  <?php } */ ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->picked_size)) {
                                                    $li_size = explode('-', $pdetails->picked_size);
                                                    foreach ($li_size as $sz_l) {
                                                        if (($pdetails->$sz_l == 0) || ($pdetails->$sz_l == 00)) {
                                                            echo $pdetails->$sz_l;
                                                        } else {
                                                            echo!empty($pdetails->$sz_l) ? $pdetails->$sz_l . '&nbsp;&nbsp;' : '';
                                                        }
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
                                            <td><?php echo (empty($pdetails->style_number)) ? $pdetails->dtls : $pdetails->style_number; ?></td>
                                            
                                            <td style="text-align: center;">
                                                <?php if($pdetails->is_deleted !=1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list')), ['action' => 'listProduct', $pdetails->prod_id], ['escape' => false, "data-placement" => "top", "data-hint" => "View all products", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                <a href="<?= HTTP_ROOT . "appadmins/all_barcode_prints/" . $pdetails->prod_id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>

                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'data-toggle' => 'modal', 'data-target' => '#myModalproductgk-' . $pdetails->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>   
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'add_product', 'GirlKids', $pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?= ($user_type == 1) ? $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'productDelete', $pdetails->id, 'InProducts', $profile], ['escape' => false, "data-placement" => "top", "data-hint" => "Profile Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]) : ''; ?>

                                                <?php if ($pdetails->available_status == 1) { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $pdetails->id . '/InProducts'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $pdetails->id . '/InProducts'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                                <?php }else{ ?> <span>Deleted</span><?php } ?>
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
                                                                Product name 1  : <?php echo $pdetails->product_name_one; ?> 
                                                            </div>
                                                            
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
    <?php
    echo $this->Paginator->counter('Page {{page}} of {{pages}}, Showing {{current}} records out of {{count}} total');
//                        echo $this->Paginator->counter(
//    'Page {{page}} of {{pages}}, showing {{current}} records out of
//     {{count}} total, starting on record {{start}}, ending on {{end}}'
//);
    echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;display: inline-block;width: 100%;float: left;'>";
    echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('first' => 3, 'last' => 3, 'separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
    echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
    echo "</div></ul>";
    ?>
</div>

<script>
    function myFunction() {
        window.print();
    }
</script>

<script>
    $(function () {
        $("#scan_fld").focus();
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

<style>
    #example1_paginate{
        display:none;
    }
    .main-footer{
        float: left;
        width: 100%;
    }
    .ellipsis {
        float: left;
        background: #fff;
        padding: 7px;
    }
</style>
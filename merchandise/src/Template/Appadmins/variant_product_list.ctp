<script>
    function getChanges(value, category = '') {
        if (value) {
            var url = '<?php echo HTTP_ROOT ?>';
            window.location.href = url + "appadmins/variant_product_list/" + value + "/" + category;
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
                                        <th>Color : Size</th>  
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
                                                <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->feature_image; ?>" style="width: 50px;"/>                                               
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->size)) {
                                                    $sz = json_decode($pdetails->size, true);
                                                    foreach($sz as $sz_ky=>$sz_li){
                                                        echo $sz_ky.": ";  
                                                        echo implode(", ",$sz_li);
                                                        echo "<br>----------<br>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php if($pdetails->is_deleted !=1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => "variant_product_details/".$pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Product Details", "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                               <?php }else{ ?> <span>Deleted</span><?php } ?>
                                            </td>
                                        </tr>
                                    
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
<!--                                    <label>Scan Product For Update Features </label>
                                    <input type="hidden" name="search_for" value="style_no">
                                    <input type="text" class="form-control" id="scan_fld" name="search_data" placeholder="Barcode">-->
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
                                        <th>Color : Size</th>  
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($womenproductdetails as $pdetails): ?>

                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">

                                            <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>

                <!-- <td><?php echo $pdetails->user_id ?></td> -->
                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td>                                                
                                                <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->feature_image; ?>" style="width: 50px;"/>                                               
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->size)) {
                                                    $sz = json_decode($pdetails->size, true);
                                                    foreach($sz as $sz_ky=>$sz_li){
                                                        echo $sz_ky.": ";  
                                                        echo implode(", ",$sz_li);
                                                        echo "<br>----------<br>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php if($pdetails->is_deleted !=1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => "variant_product_details/".$pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Product Details", "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                               <?php }else{ ?> <span>Deleted</span><?php } ?>
                                            </td>
                                        </tr>
                                    
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
                                        <th>Color : Size</th>  
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($boyskidsproductdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">

                                            <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>

                <!-- <td><?php echo $pdetails->user_id ?></td> -->
                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td>                                                
                                                <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->feature_image; ?>" style="width: 50px;"/>                                               
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->size)) {
                                                    $sz = json_decode($pdetails->size, true);
                                                    foreach($sz as $sz_ky=>$sz_li){
                                                        echo $sz_ky.": ";  
                                                        echo implode(", ",$sz_li);
                                                        echo "<br>----------<br>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php if($pdetails->is_deleted !=1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => "variant_product_details/".$pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Product Details", "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                               <?php }else{ ?> <span>Deleted</span><?php } ?>
                                            </td>
                                        </tr>
                                    
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
                                        <th>Color : Size</th>  
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($girlkidsproductdetails as $pdetails): ?>
                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">

                                            <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>

                <!-- <td><?php echo $pdetails->user_id ?></td> -->
                                            <td><?php echo $pdetails->product_name_one; ?></td>
                                            <td>                                                
                                                <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $pdetails->feature_image; ?>" style="width: 50px;"/>                                               
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($pdetails->size)) {
                                                    $sz = json_decode($pdetails->size, true);
                                                    foreach($sz as $sz_ky=>$sz_li){
                                                        echo $sz_ky.": ";  
                                                        echo implode(", ",$sz_li);
                                                        echo "<br>----------<br>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php if($pdetails->is_deleted !=1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => "variant_product_details/".$pdetails->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Product Details", "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                               <?php }else{ ?> <span>Deleted</span><?php } ?>
                                            </td>
                                        </tr>
                                    
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
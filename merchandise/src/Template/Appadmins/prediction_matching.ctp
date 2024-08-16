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
                <?= $this->Form->end() ?>
            </div>
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">

                        <div class="single category">
                            <h3 class="side-title">Look 1</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <a href="" title="">Business 
                                        <span class="pull-right">13</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div class="single category">
                            <h3 class="side-title">Look 2</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <a href="" title="">Business 
                                        <span class="pull-right">13</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="single category">
                            <h3 class="side-title">Look 3</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <a href="" title="">Business 
                                        <span class="pull-right">13</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="single category">
                            <h3 class="side-title">Look 4</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <a href="" title="">Business 
                                        <span class="pull-right">13</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="single category">
                            <h3 class="side-title">Look 5</h3>

                            <ul class="list-unstyled">
                                <li>
                                    <a href="" title="">Business 
                                        <span class="pull-right">13</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>

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



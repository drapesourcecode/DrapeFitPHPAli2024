<div class="content-wrapper">
    <section class="content-header">
        <?php if ($getData->kid_id != '') { ?>
            <h1> Product list for <?php echo $u_name; ?></h1>
        <?php } else { ?>
            <h1> Product list for <?php echo $u_name; ?></h1>
        <?php } ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="<?= h(HTTP_ROOT) ?>appadmins/browse_products/<?php echo $payment_id; ?>">   <i class="fa  fa-user-plus"></i> Matching Product </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Brand Name</th>
                                    <th>Product Name 1</th>
                                    <th>Product Name 2</th>
                                    <th>Style no.</th>
                                    <th>Product Image</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $color_arr = $this->Custom->inColor();

                                foreach ($product_list as $key => $prodDetls):
                                    $key = $prodDetls->id;
                                    ?>
                                    <tr>                                        
                                        <td><?php echo $this->Custom->InBrandsName($key); ?></td>
                                        <td><?php echo $prodDetls->product_name_one; ?></td>
                                        <td><?php echo $prodDetls->product_name_two; ?></td>
                                        <td><?php echo $prodDetls->dtls; ?></td>
                                        <td><img src="<?php echo $this->Custom->imgpath($key) . 'files/product_img/' ?><?php echo $this->Custom->InproductImage($key); ?>" style="width: 80px;"/></td>
                                        <td><?php
                                        $pick_s = $prodDetls->picked_size;
                                        if (!empty($pick_s)) {
                                            $li_size = explode('-', $pick_s);
                                            foreach ($li_size as $sz_l) {
                                                $pdc_sz = $prodDetls->$sz_l;
                                                if(($pdc_sz == 0) || ($pdc_sz == 00)){
                                                    echo $pdc_sz;
                                                }else{
                                                    echo !empty($pdc_sz) ? $pdc_sz. '&nbsp;&nbsp;' : '';
                                                }
                                            }
                                        }
                                        if (!empty($prodDetls->primary_size) && ($prodDetls->primary_size == 'free_size')) {
                                            echo "Free Size";
                                        }
                                            ?></td>
                                        <td><?php echo $color_arr[$prodDetls->color]; ?></td>
                                        <td><?php echo $this->Custom->InproductsalePrice($key); ?></td>
                                        <td><?php $prod_idd = $this->Custom->Inproductnameone($key)->prod_id;
                                        echo $prd_ttQ = $this->Custom->productQuantity($prod_idd);
                                            ?></td>
                                        <td>
                                            <?php if (!empty($_GET['exchange'])) { ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-plus-square-o')), ['action' => 'addMatchProduct', $payment_id, $key, '?' => ['exchange' => $_GET['exchange']]], ['escape' => false, "data-placement" => "top", "data-hint" => "Add Product", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?php } else { ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-plus-square-o')), ['action' => 'addMatchProduct', $payment_id, $key], ['escape' => false, "data-placement" => "top", "data-hint" => "Add Product", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
    <?php } ?>


                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "View product details", 'data-toggle' => 'modal', 'data-target' => '#myModalproductgk-' . $key, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>                                            
    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'productDelete', $key], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
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
<?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



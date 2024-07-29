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
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Matching percentage</th>
                                    <th>Brand Name</th>
                                    <th>Product Name 1</th>
                                    <th>Product Name 2</th>
                                    <th>Style no.</th>
                                    <th>Product Image</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $color_arr = $this->Custom->inColor();

                                foreach ($getProducts as $key => $prodDetls):
                                    ?>
                                    <tr>
                                        <td> 
                                            <span style="display:none;"><?php echo count($prodDetls) * 10 ?></span>
                                            <a href='#' class="navbar-btn sidebar-toggle" data-html="true" data-toggle="tooltip" role="button" data-tooltip="tooltip"  data-placement="right" title="<?php
                                            foreach ($prodDetls as $pds_key => $pds_val) {
                                                if ($pds_key != 'product_id') {
                                                    echo "<h4>" . strtoupper($pds_key) . "</h4>";
                                                }
                                            }
                                            ?>"><?php echo (count($prodDetls) - 1) * 10 ?> % matches</a>

                                        </td>
                                        <td><?php echo $this->Custom->InBrandsName($key); ?></td>
                                        <td><?php echo $this->Custom->Inproductnameone($key)->product_name_one; ?></td>
                                        <td><?php echo $this->Custom->Inproductnameone($key)->product_name_two; ?></td>
                                        <td><?php echo $this->Custom->Inproductnameone($key)->dtls; ?></td>
                                        <td><img src="<?php echo $this->Custom->imgpath($key) . 'files/product_img/' ?><?php echo $this->Custom->InproductImage($key); ?>" style="width: 80px;"/></td>
                                        <td><?php
                                        $pick_s = $this->Custom->Inproductnameone($key)->picked_size;
                                        if (!empty($pick_s)) {
                                            $li_size = explode('-', $pick_s);
                                            foreach ($li_size as $sz_l) {
                                                $pdc_sz = $this->Custom->Inproductnameone($key)->$sz_l;
                                                if(($pdc_sz == 0) || ($pdc_sz == 00)){
                                                    echo $pdc_sz;
                                                }else{
                                                    echo !empty($pdc_sz) ? $pdc_sz. '&nbsp;&nbsp;' : '';
                                                }
                                            }
                                        }
                                        if (!empty($this->Custom->Inproductnameone($key)->primary_size) && ($this->Custom->Inproductnameone($key)->primary_size == 'free_size')) {
                                            echo "Free Size";
                                        }
                                            ?></td>
                                        <td><?php echo $color_arr[$this->Custom->Inproductnameone($key)->color]; ?></td>
                                        <td><?php echo $this->Custom->InproductsalePrice($key); ?></td>
                                        <td><?php $prod_idd = $this->Custom->Inproductnameone($key)->prod_id;
                                        echo $prd_ttQ = $this->Custom->productQuantity($prod_idd);
                                            ?></td>
                                        
                                    </tr>
                               
<?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



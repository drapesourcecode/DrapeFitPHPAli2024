<div class="content-wrapper">
    <section class="content-header">
        <h1>All Products </h1>        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                       
                                    <th>Product Name 1</th>
                                    <th>Product Image</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    <th>Quantity</th>
                                    <th>Bar code</th>
                                    <th>Style.no</th>
                                    <th>Bar code image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $color_arr = $this->Custom->inColor();
                                foreach ($all_products as $pdetails) {
                                    ?>
                                    <tr id="<?php echo $pdetails->id; ?>" class="message_box">

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
                                        <td><?php echo $pdetails->quantity; ?></td>
                                        <td><?php echo $pdetails->dtls; ?></td>
                                        <td><?php echo (empty($pdetails->style_number)) ? $pdetails->dtls : $pdetails->style_number; ?></td>
                                        <td><a target="_blank" href="<?= HTTP_ROOT . BARCODE . $pdetails->bar_code_img; ?>"><img src="<?= HTTP_ROOT . BARCODE . $pdetails->bar_code_img; ?>" width="100" alt="<?php echo $pdetails->dtls; ?>"><?=$pdetails->dtls;?></a></td>
                                        <td>
                                            <?php if(empty($_GET['merchant'])){?>
                                            <a href="<?= HTTP_ROOT . "appadmins/barcode_prints/" . $pdetails->id; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>
                                        
                                            <?php }else{ ?>
                                            <a href="<?= HTTP_ROOT . "appadmins/barcode_prints/" . $pdetails->id.'?merchant=1'; ?>" data-placement="top" target="_blank" data-hint="Print barcode" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>
                                        <?php } ?>
                                        </td>
                                    </tr>
<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        $(".example").DataTable();
    });
</script>
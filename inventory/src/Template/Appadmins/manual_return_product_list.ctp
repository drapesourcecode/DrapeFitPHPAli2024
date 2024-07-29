<div class="content-wrapper">
    <section class="content-header">
        <h1>Products </h1>        
    </section>

    <section class="content" style="min-height: auto !important;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name 1</th>
                                    <th>Product Name 2</th>
                                    <th>Product Image</th>
                                    <th>Purchse Price</th>
                                    <th>Sale Price</th>
                                    <th>Quantity</th>

                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $prof_typ_list = [1 => "Men", 2 => "Women", 3 => "BoyKids", 4 => "GirlKids"];
                                foreach ($productList as $pdetails):
                                    ?>

                                    <tr id="<?php echo $pdetails->id; ?>" class="message_box">

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


                                        <td><?php echo $pdetails->purchase_price; ?></td>
                                        <td><?php echo $pdetails->sale_price; ?></td>
                                        <td>1</td>
                                        <td style="text-align: center;">

                                            <a href="<?= HTTP_ROOT . "appadmins/add_manual_product_in_list/" . $pdetails->id . '/' . $prof_typ_list[$pdetails->profile_type]; ?>" data-placement="top" data-hint="Add Product" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-plus "></i></a>

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
</div>
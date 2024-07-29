
<?php echo $this->element('frontend/profile_menu_men') ?>
<section class="order-review">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <h1> Your Orders </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <?php
                if ($OrderDetailsCount >= 1) {
                    $fitCount = '';
                    foreach ($OrderDetails as $orders) {
                        $fitCount = $this->Custom->ToOrdinal($orders->count);
                        ?>

                        <div class="Product-table">
                            <h3><?php echo $fitCount; ?> FIT <span>Date-<?php echo date('d-m-y', strtotime($orders->created_dt)) ?></span></h3>
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <?php if ($productDetails[$orders->id] == 0) { ?>
                                        <tr>
                                            <th colspan="4" style="text-align: center"> No orders</th>

                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <th></th>
                                            <th>
                                                <span style=" width: 49%;text-align: left;display: inline-block;">Image</span>
                                            </th>
                                            <th>
                                                <span style="text-align: left;display: inline-block;">Product Details</span>
                                            </th>
                                            <th style="text-align: center;">Price</th>
                                        </tr>

                                    <?php } ?>
                                </thead>
                                <tbody>
                                    <?php
                                    //pj($orders);
                                    $i = 1;
                                    foreach ($orders->products as $products):

                                        if ($products->keep_status == 3) {
                                            ?>
                                            <tr>
                                                <td data-th="">
                                                    # <?php echo $i; ?>
                                                </td>
                                                <td data-th="Image">
                                                    <img src="<?php echo HTTP_ROOT; ?><?= strstr($products->product_image, PRODUCT_IMAGES) ? $products->product_image : PRODUCT_IMAGES . $products->product_image; ?>" alt="<?php echo $data['product_name_one']; ?>">
                                                </td>
                                                <td data-th="Product Details">
                                                    <?php echo $products->product_name_one . ',' . $products->product_name_two; ?>
                                                </td>
                                                <td data-th="Price" style=" width: 100px;" class="text-center">
                                                    <?php echo '$' . number_format($products->sell_price, 2); ?>
                                                </td>                   

                                            </tr>
                                            <?php
                                            $i++;
                                        }

                                    endforeach;
                                    ?>
                                            <?php /* ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Final order total</td>
                                        <td style="width: 100px;" class="text-center"><?php echo '$' . $this->Custom->orderfinalprice($orders->id); ?></td>                   
                                    </tr>
 
                                            <?php  */ ?>
                                </tbody>
                            </table>
                        </div> 


                    <?php } ?>
                <?php } else { ?>
                    No Orders are found !! 
                <?php } ?>

            </div>
        </div>
    </div>
</section>
</div>

<style type="text/css">
    .tab-content.hide {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .isDisabled {
        color: currentColor;
        cursor: not-allowed;
        opacity: 0.5;
        text-decoration: none;
    }
</style>

</style>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker().on('changeDate', function(e) {
            $(this).focus();
        });
        $("#datepicker1").datepicker().on('changeDate', function(e) {
            $(this).focus();
        });
        $("#datepicker3").datepicker().on('changeDate', function(e) {
            $(this).focus();
        });
    });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="box-header with-border1">
            <h3>Previous Order List</h3>

        </div>
    </section>

    <section class="order-review" style="padding:0;">
        <div class="container">
            <div class="col-md-12">

                <?php
                if ($OrderDetailsCount >= 1) {
                    $fitCount = '';
                    foreach ($OrderDetails as $orders) {
                        $fitCount = $this->Custom->ToOrdinal($orders->count);
                ?>

                        <div class="Product-table" style="margin: 0;width: 98%;">
                            <h3><?php echo $fitCount; ?> FIT <span>Date-<?php echo date('d-m-y', strtotime($orders->created_dt)) ?></span></h3>
                            <?php if (empty($orders->products)) {
                                echo "No orders !!";
                            } else { ?>
                                <table id="cart" class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th><span>Image</span></th>
                                            <th><span>Status</span></th>
                                            <th><span>Product Details</span></th>
                                            <th><span>Style number</span></th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //pj($orders);
                                        $i = 1;
                                        foreach ($orders->products as $products) :
                                        ?>
                                            <tr>
                                                <td data-th="">
                                                    # <?php echo $i; ?>
                                                </td>
                                                <td data-th="Image">
                                                    <img src="<?php echo HTTP_ROOT_BASE; ?><?= strstr($products->product_image, PRODUCT_IMAGES) ? $products->product_image : PRODUCT_IMAGES . $products->product_image; ?>" alt="<?php echo $products->product_name_one; ?>">
                                                </td>
                                                <td data-th="Image">
                                                    <?php
                                                    if ($products->checkedout == 'Y') {
                                                        if ($products->keep_status == 3) {
                                                            echo 'Keep';
                                                        } elseif ($products->keep_status == 2) {
                                                            if ($products->is_altnative_product == 1) {
                                                                echo "Exchange Alternative product";
                                                            } else {
                                                                echo 'Exchange';
                                                            }
                                                        } elseif ($products->keep_status == 1) {


                                                            echo 'Return';
                                                            if ($products->store_return_status == 'Y') {
                                                                echo "<span><i style='color:green'class='fa fa-check'></i></span>";
                                                            }
                                                        } elseif ($products->keep_status == 0) {
                                                            echo 'Pending';
                                                        }
                                                    } else {
                                                        if ($products->keep_status == 2 && $products->is_complete == 1) {
                                                            echo 'Exchange';
                                                        } else {
                                                            echo 'Pending';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td data-th="Product Details">
                                                    <?php echo $products->product_name_one . ',' . $products->product_name_two; ?>
                                                </td>
                                                <td data-th="Product Details">
                                                    <?php
                                                    $in_pro_key = $products->inv_product_id;
                                                    if (empty($in_pro_key)) {
                                                        echo $products->barcode_value;
                                                    } else {
                                                        echo empty($this->Custom->Inproductnameone($in_pro_key)->style_number) ? $this->Custom->Inproductnameone($in_pro_key)->dtls : $this->Custom->Inproductnameone($in_pro_key)->style_number;
                                                    }
                                                    ?>
                                                </td>
                                                <td data-th="Price" style=" width: 100px;" class="text-center">
                                                    <?php echo '$' . number_format($products->sell_price, 2); ?>
                                                </td>

                                            </tr>
                                        <?php
                                            $i++;

                                        endforeach;
                                        ?>
                                        <?php /* ?>
                                      <tr>
                                      <td></td>
                                      <td></td>
                                      <td>Final order total</td>
                                      <td style="width: 100px;" class="text-center"><?php echo '$' . $this->Custom->orderfinalprice($orders->id); ?></td>
                                      </tr>
                                      <?php */ ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>


                    <?php } ?>
                <?php } else { ?>
                    No Orders are found !!
                <?php } ?>

            </div>
        </div>

    </section>
</div>
<!--<script type="text/javascript">
    link.addEventListener('click', function (event) {
        if (this.parentElement.classList.contains('isDisabled')) {
            event.preventDefault();
        }
    });
</script>-->
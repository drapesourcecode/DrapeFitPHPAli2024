<div class="content-wrapper">
    <section class="content-header">
        <center>
            <h1>EXCHANGE / RETURN COMPLETED</h1>
            <h3>KEEP PRODUCT IN THEIR RACK</h3>
            <h6>PRODUCT INVENTORY RETURN COMPLETED</h6>
        </center>
        <ol class="breadcrumb">


        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">

                        <?php
                        foreach ($prData as $data) {
                            $in_pro_key = $data->inv_product_id;
                            $img_dd = "";
                            $img_dd = strstr($data->product_image, PRODUCT_IMAGES) ? $data->product_image : PRODUCT_IMAGES . $data->product_image;
                            ?>
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-sm-4">
                                    <img  width="200" src="<?php echo HTTP_ROOT; ?><?= $img_dd; ?>"/>

                                </div>
                                <div class="col-sm-8">

                                    <h3><strong>Rack:</strong> <?php echo $data['in_rack']; ?></h3>
                                    <h4><?php echo $data['product_name_one']; ?></h4>
                                    <h5><?php echo $data['product_name_two']; ?></h5>

                                    <h6><strong>SIZE:</strong><span><?php echo $data['size']; ?></span></h6>
                                    <h6><strong>COLOR:</strong> <span><?php echo $data['color']; ?></span></h6>
                                    <h6><strong>Bar code:</strong> <span><?php echo $data['barcode_value']; ?></span></h6>
                                    <h6><strong>Style no:</strong> <span>
                                        <?php  
                                            if (empty($in_pro_key)) {
                                                    echo $data->barcode_value;
                                                } else {
                                                    echo empty($this->Custom->Inproductnameone($in_pro_key)->style_number) ? $this->Custom->Inproductnameone($in_pro_key)->dtls : $this->Custom->Inproductnameone($in_pro_key)->style_number;
                                                }
                                                ?>
                                        </span></h6>

                                    <h6><strong>Price:</strong><span>$ <?php echo number_format($data['sell_price'], 2); ?></span></h6>
                                </div>

                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('Return Products') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Return produts</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                              <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
        <!--                                    <th style="display:block;">P.purchase date</th>-->
                                            <th>P. name</th>
                                            <th>Customer decision</th>
                                            <th>P.Image</th>
                                            <th>P.barcodeImg</th>
                                            <th>Style number</th>
                                            <th>Comment</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($productdetails as $list):
                                            $in_pro_key = $list->inv_product_id;
                                            ?>
        
        
                                            <tr>
                                                <!--<td style="display: block;"> <?php //echo $list->product_purchase_date;             ?></td>-->
                                                <td style="text-align:  left;"> 
                                                    <?php echo $list->product_name_one; ?>
                                                    
                                                </td>
                                                <td style="text-align:  left;">
                                                    <?php
                                                    if ($list->checkedout == 'Y') {
                                                        if ($list->keep_status == 3) {
                                                            echo 'Keep';
                                                        } elseif ($list->keep_status == 2) {
                                                            if ($list->is_altnative_product == 1) {
                                                                echo "Exchange Alternative product";
                                                            } else {
                                                                echo 'Exchange';
                                                            }
                                                        } elseif ($list->keep_status == 1) {
        
        
                                                            echo 'Return';
                                                            if ($list->store_return_status == 'Y') {
                                                                echo "<span><i style='color:green'class='fa fa-check'></i></span>";
                                                            }
                                                        } elseif (($list->keep_status == 0) || ($list->keep_status == 99)) {
                                                            echo 'Pending';
                                                        }
                                                    } else {
                                                        if ($list->keep_status == 2 && $list->is_complete == 1) {
                                                            echo 'Exchange';
                                                        } else {
                                                            echo 'Pending';
                                                        }
                                                    }
                                                    ?></td>
        
                                                                                           <!--<td style="text-align:  left;"> <img  width="80" src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES . $list->product_image; ?>"/></td>-->
                                                <td style="text-align:  left;"> <img  width="80" src="<?php echo HTTP_ROOT_BASE; ?><?= strstr($list->product_image, PRODUCT_IMAGES) ? $list->product_image : PRODUCT_IMAGES . $list->product_image; ?>"/></td>
        
                                                <td style="text-align:  left;"> 
                                                    <?php if (empty($in_pro_key)) { ?>
                                                        <img width="100" height="20"  src="<?php echo HTTP_ROOT_BASE . BARCODE . $list->barcode_image; ?>"/> 
                                                    <?php } else { ?>
                                                        <img width="100" height="20"  src="<?php echo HTTP_ROOT_BASE . 'files/barcode/' . $list->barcode_image; ?>"/> 
                                                    <?php } ?>
                                                    <br> <?php //echo $list->barcode_value; ?>
                                                    <?php // echo $list->is_verified == 1 ? "<span><i style='color:green'class='fa fa-check'></i></span>" : ""; ?>
                                                </td>
        
                                                <td style="text-align:  left;"> <?php
                                                    if (empty($in_pro_key)) {
                                                        echo $list->barcode_value;
                                                    } else {
                                                        echo empty($list->inpd->style_number) ? $list->inpd->dtls : $list->inpd->style_number;
                                                    }
                                                    ?>
        
                                                </td>
                                                <td style="text-align: center;">
                                                    <p><?=$list->comment;?> </p>
                                                    <?php if(!empty($list->photos)){ ?>
                                                    <a href="<?=HTTP_ROOT_BASE . $list->photos;?>" target="_lank"><img src="<?=HTTP_ROOT_BASE . $list->photos;?>" width="50"> </a>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align: center;">
        
                                               <?php if($list->inpd->quantity == 0){ ?>
                                                    <a class="btn btn-info" href="<?=HTTP_ROOT;?>appadmins/markReturnComplete/<?=$list->id;?>" onclick="return confirm('Product placed in rack.');">Mark Complete</a>
                                               <?php }else{ ?>
                                                <span><i style='color:green'class='fa fa-check'></i></span>
                                               <?php } ?>
        
        
                                                    <!--if employee login-->
                                                    
        
                                                    
                                                   
                                                        
        
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div><!-- /.col-sm-12 -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
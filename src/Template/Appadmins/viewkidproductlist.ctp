<style type="text/css">
    .isDisabled {
        color: currentColor;
        cursor: not-allowed;
        opacity: 0.5;
        text-decoration: none;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if (@$kidDetail->user->id) { ?>
                <?php echo @$kidDetail->user->name; ?>'s Kid Profile
            <?php } else { ?>
                User has not added kid profile
            <?php } ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Back</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 add-tab-section">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li  class="active">
                            <a href="#<?php echo $kidDetail->id; ?>" data-toggle="tab" style="border-bottom: 1px solid #bbb;"><?php echo $kidDetail->kids_first_name; ?></a>
                        </li>

                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane  active">

                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12" style="padding-left: 0; padding-right: 0;">
                                        <div class="box">
                                            <div class="box-body">
                                                <div class="box-header">
                                                    <h3 class="box-title">Product Listing</h3>
                                                </div>
                                                <table  class="table table-bordered table-striped example">

                                                    <thead>
                                                        <tr>
                                                            <th>P.purchase date</th>
                                                            <th>P.name</th>
                                                            <th>Customer decision</th>
                                                            <th>P.Image</th>
                                                            <th>P.barcodeImg</th>
                                                            <th>P.barcode.value</th>
                                                            <th>Comment</th>
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($kid_product as $list): ?>
                                                            <tr>
                                                                <td style="display: block;"> <?php echo $list->product_purchase_date; ?></td>
                                                                <td style="text-align:  left;"> <?php echo $list->product_name_one; ?></td>
                                                                <td style="text-align:  left;"> 



                                                                    <?php
                                                                    if ($list->keep_status == 3) {
                                                                        echo 'Keeps';
                                                                    } elseif ($list->keep_status == 2) {
                                                                        if ($list->is_altnative_product == 1) {
                                                                            echo "Exchange Altnative product";
                                                                        } else {
                                                                            echo 'Exchange';
                                                                        }
                                                                    } elseif ($list->keep_status == 1) {
                                                                        echo 'Return';
                                                                        if ($list->is_complete == '1') {
                                                                            echo "<span><i style='color:green'class='fa fa-check'></i></span>";
                                                                        }
                                                                    } elseif ($list->keep_status == 0) {
                                                                        echo 'Pending';
                                                                    }
                                                                    ?></td>
                                                                <td style="text-align:  left;">  <img  width="80" src="<?php echo HTTP_ROOT; ?><?= strstr($list->product_image, PRODUCT_IMAGES) ? $list->product_image : PRODUCT_IMAGES . $list->product_image; ?>" width="80"/></td>
                                                                <td style="text-align:  left;"> <img   src="<?php echo HTTP_ROOT . 'inventory/files/barcode/' . $list->barcode_image; ?>" width="100" height="20"/></td>
                                                                <td style="text-align:  left;"> <?php echo $list->barcode_value; ?></td>
                                                                <td style="text-align:  left;">
                                                                    <p><?=$list->comment;?> </p>
                                                                    <?php if(!empty($list->photos)){ ?>
                                                                    <a href="<?=HTTP_ROOT . $list->photos;?>" target="_lank"><img src="<?=HTTP_ROOT . $list->photos;?>" width="50"> </a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <?php if ($user_type == 1) { ?>
                                                                        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Edit product" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-pencil "></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil ')), ['action' => 'addkid_profile', $list->payment_id, $list->kid_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                                        <?php } ?>
                                                                        <?php if ($list->checkedout == "Y" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Print barcode" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-print ')), ['action' => 'barcode_prints', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Print barcode", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>  
                                                                        <?php } ?>
                                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'viewproduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?> 


                                                                        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Finalize" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 12px!important;"><i class="fa fa-plus"><?php echo @$list->checkedout; ?></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', @$list->checkedout, array('class' => 'fa fa-plus')), ['action' => 'finalizekid', $list->payment_id, $list->kid_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Finalize", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>  
                                                                        <?php } ?>


                                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'kidpdelete', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                                                    <?php } ?>


                                                                    <!--if employee login--> 

                                                                    <?php if (in_array($user_type, [3, 9])) { ?>
                                                                        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Edit product" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-pencil "></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil ')), ['action' => 'addkid_profile', $list->payment_id, $list->kid_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                                        <?php } ?>
                                                                        <?php if ($list->checkedout == "Y" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Print barcode" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>
                                                                        <?php } else { ?>
                                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-print ')), ['action' => 'barcode_prints', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Print barcode", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>  
                                                                        <?php } ?>
                                                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'viewproduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?> 


                                                                        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                                            <a  data-placement="top" data-hint="Finalize" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 12px!important;"><i class="fa fa-plus"><?php echo @$list->checkedout; ?></i></a>
                                                                            <?php } else { ?>
                                                                                <?= $this->Html->link($this->Html->tag('i', @$list->checkedout, array('class' => 'fa fa-plus')), ['action' => 'finalizekid', $list->payment_id, $list->kid_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Finalize", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>  
                                                                            <?php } ?>

                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </section>
                        </div><!-- /.tab-pane -->


                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
            </div>

            <!--for men-->
            <!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    function myFunction() {
        window.print();
    }
</script>

<script>
    $(function () {
        $(".example").DataTable();
    });
</script>

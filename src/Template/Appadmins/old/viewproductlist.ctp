<style type="text/css">
    .tab-content.hide{
        display: none;
    }
    .tab-content.active{
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
    $(document).ready(function () {
        $('#datepicker').datepicker().on('changeDate', function (e) {
            $(this).focus();
        });
        $("#datepicker1").datepicker().on('changeDate', function (e) {
            $(this).focus();
        });
        $("#datepicker3").datepicker().on('changeDate', function (e) {
            $(this).focus();
        });
    });

</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Product listing</h1>
        <ol class="breadcrumb">


        </ol>
    </section>



    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header">
                            <h3 class="box-title">Product Listing</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th style="display:block;">P.purchase date</th>
                                    <th>P. name</th>
                                    <th>Customer decision</th>
                                    <th>P.Image</th>
                                    <th>P.barcodeImg</th>
                                    <th>P.barcode.value</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productdetails as $list): ?>


                                    <tr>
                                        <td style="display: block;"> <?php echo $list->product_purchase_date; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->product_name_one; ?></td>
                                        <td style="text-align:  left;"> 



                                            <?php
                                            if ($list->keep_status == 3) {
                                                echo 'Keeps';
                                            } elseif ($list->keep_status == 2) {
                                                if($list->is_altnative_product == 1){
                                                   echo "Exchange Altnative product";
                                                }else{
                                                echo 'Exchange';
                                                }
                                            } elseif ($list->keep_status == 1) {
                                               
                                                
                                                echo 'Return';
                                                 if($list->is_complete=='1'){echo "<span><i style='color:green'class='fa fa-check'></i></span>";}
                                            } elseif ($list->keep_status == 0) {
                                                echo 'Pending';
                                            }
                                            ?></td>

                                        <td style="text-align:  left;"> <img  width="80" src="<?php echo HTTP_ROOT . PRODUCT_IMAGES . $list->product_image; ?>"/></td>
                                        <td style="text-align:  left;"> <img   width="100" height="20" src="<?php echo HTTP_ROOT . BARCODE . $list->barcode_image; ?>"/></td>
                                        <td style="text-align:  left;"> <?php echo $list->barcode_value; ?></td>
                                        <td style="text-align: center;">
    <?php if ($user_type == 1) { ?>
        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                    <a  data-placement="top" data-hint="Edit product" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-pencil "></i></a>
                                                <?php } else { ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil ')), ['action' => 'addproduct', $list->payment_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?php } ?>
                                                <?php if ($list->checkedout == "Y" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                    <a  data-placement="top" data-hint="Print barcode" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>
                                                <?php } else { ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-print ')), ['action' => 'barcode_prints', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Print barcode", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>  
                                                <?php } ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'viewproduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?> 


                                                <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                    <a  data-placement="top" data-hint="Finalize" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 12px!important;"><i class="fa fa-plus">N</i></a>
                                                <?php } else { ?>
                                                    <?= $this->Html->link($this->Html->tag('i', @$list->checkedout, array('class' => 'fa fa-plus')), ['action' => 'finalize', $list->id, $list->user_id], ['escape' => false, "data-placement" => "top", "data-hint" => "Finalize", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>  
                                                <?php } ?>


                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteproductprevious', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => 'Are you sure you want to delete  ?']); ?>

                                            <?php } ?>


                                            <!--if employee login--> 

    <?php if ($user_type == 3) { ?>
        <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                    <a  data-placement="top" data-hint="Edit product" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-pencil "></i></a>
                                                <?php } else { ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil ')), ['action' => 'addproduct', $list->payment_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                                <?php } ?>
                                                <?php if ($list->checkedout == "Y" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                    <a  data-placement="top" data-hint="Print barcode" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 7px!important;"><i class="fa fa-print "></i></a>
                                                <?php } else { ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-print ')), ['action' => 'barcode_prints', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Print barcode", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>  
                                                <?php } ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'viewproduct', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?> 


                                                <?php if ($list->checkedout == "N" || $list->keep_status == 3 || $list->keep_status == 2 || $list->keep_status == 1) { ?>
                                                    <a  data-placement="top" data-hint="Finalize" class="btn btn-info  hint--top  hint isDisabled" style="padding: 0 12px!important;"><i class="fa fa-plus">N</i></a>
                                                <?php } else { ?>
                                                    <?= $this->Html->link($this->Html->tag('i', @$list->checkedout, array('class' => 'fa fa-plus')), ['action' => 'finalize', $list->id, $list->user_id], ['escape' => false, "data-placement" => "top", "data-hint" => "Finalize", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>  
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
</div>
<!--<script type="text/javascript">
    link.addEventListener('click', function (event) {
        if (this.parentElement.classList.contains('isDisabled')) {
            event.preventDefault();
        }
    });
</script>-->

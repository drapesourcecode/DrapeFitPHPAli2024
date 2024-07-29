<style>
    .btn.btn-info.hint--top.hint .fa.fa-fw.fa-user-plus {
        width: 3.286em !important;
    }
    .hide{
        display: none;
    }
    .active{
        display: block;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= 'Currently Total Products In Inventory' ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                        </div>
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <div class="row" style="float: left;width: 100%;">
                                    <div class="col-xs-12" style="float: left;text-align: right;width: 100%;margin-bottom: 20px;">
                                        <a href="<?= HTTP_ROOT; ?>appadmins/currentlyTotalProductInInventory/1" class="btn btn-<?= ($gender == 1) ? 'success' : 'info'; ?>">Men</a>
                                        <a href="<?= HTTP_ROOT; ?>appadmins/currentlyTotalProductInInventory/2" class="btn btn-<?= ($gender == 2) ? 'success' : 'info'; ?>">Women</a>
                                        <a href="<?= HTTP_ROOT; ?>appadmins/currentlyTotalProductInInventory/3" class="btn btn-<?= ($gender == 3) ? 'success' : 'info'; ?>">Boykid</a>
                                        <a href="<?= HTTP_ROOT; ?>appadmins/currentlyTotalProductInInventory/4" class="btn btn-<?= ($gender == 4) ? 'success' : 'info'; ?>">Girlkid</a>
                                    </div>


                                    <table id="example102" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Brand Name</th>
                                                <th>Product Name 1</th>
                                                <th>Product Name 2</th>
                                                <th>Product Image</th>
                                                <th>Size</th>
                                                <th>Color</th>
                                                <th>Purchase Price</th>
                                                <th>Sale Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $color_arr = $this->Custom->inColor();

                                            foreach ($product_list as $key => $prodDetls):
                                                $key = $prodDetls->id;
                                                $prd_dtls = $this->Custom->Inproductnameone($key);
                                                ?>
                                                <tr>                                        
                                                    <td><?php echo $this->Custom->InBrandsName($key); ?></td>
                                                    <td><?php echo $prodDetls->product_name_one; ?></td>
                                                    <td><?php echo $prodDetls->product_name_two; ?></td>
                                                    <td><img src="<?php echo $this->Custom->imgpath($key) . 'files/product_img/' ?><?php echo $this->Custom->InproductImage($key); ?>" style="width: 80px;"/></td>
                                                    <td><?php
                                                        $pick_s = $prodDetls->picked_size;
                                                        if (!empty($pick_s)) {
                                                            $li_size = explode('-', $pick_s);
                                                            foreach ($li_size as $sz_l) {
                                                                $pdc_sz = $prodDetls->$sz_l;
                                                                if (($pdc_sz == 0) || ($pdc_sz == 00)) {
                                                                    echo $pdc_sz;
                                                                } else {
                                                                    echo!empty($pdc_sz) ? $pdc_sz . '&nbsp;&nbsp;' : '';
                                                                }
                                                            }
                                                        }
                                                        if (!empty($prodDetls->primary_size) && ($prodDetls->primary_size == 'free_size')) {
                                                            echo "Free Size";
                                                        }
                                                        ?></td>
                                                    <td><?php echo $color_arr[$prodDetls->color]; ?></td>
                                                    <td><?php echo $prd_dtls->purchase_price; ?></td>
                                                    <td><?php echo $this->Custom->InproductsalePrice($key); ?></td>
                                                    <td><?php
                                                        $prod_idd = $prd_dtls->prod_id;
                                                        echo $prd_ttQ = $this->Custom->productQuantity($prod_idd);
                                                        ?></td>

                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>


                                    </table>

                                </div>
                            </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
    </section><!-- /.content -->

</div>


<link href= "https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href= "https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example102').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>
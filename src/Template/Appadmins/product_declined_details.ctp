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
            <?= 'Product Declined Details' ?>
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
                                    <?= $this->Form->create('', ['type' => 'get']); ?>
                                    <div class="row" style="margin-bottom: 10px; ">
                                        <div class="col-md-2">
                                            <select name="profile_type" class="form-control" required>
                                                <option selected="" disabled="" value="">User Type</option>
                                                <option value="1" <?= !empty($_GET['profile_type']) && ($_GET['profile_type'] == 1) ? 'selected' : ''; ?> >Men</option>
                                                <option value="2"  <?= !empty($_GET['profile_type']) && ($_GET['profile_type'] == 2) ? 'selected' : ''; ?>>Women</option>
                                                <option value="3" <?= !empty($_GET['profile_type']) && ($_GET['profile_type'] == 3) ? 'selected' : ''; ?>>Boy</option>
                                                <option value="4"  <?= !empty($_GET['profile_type']) && ($_GET['profile_type'] == 4) ? 'selected' : ''; ?> >Girl</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="date"  class="form-control"  name="date" value="<?= !empty($_GET['date']) ? date('Y-m-d', strtotime($_GET['date'])) : ''; ?>" required> 
                                            <small>select start date for report</small>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="date"  class="form-control"  name="end_date" value="<?= !empty($_GET['end_date']) ? date('Y-m-d', strtotime($_GET['end_date'])) : ''; ?>" required> 
                                            <small>select end date for report</small>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-primary mb-2">Filter</button>
                                        </div>
                                    </div>

                                    <?= $this->Form->end(); ?>


                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> SL NO.</th>
                                                <th>Product Name 1</th>
                                                <th>Product Name 2</th>
                                                <th>Brand Name</th>
                                                <th>Product Image</th>
                                                <th>Status</th>
                                                <th>Purchase Price</th>
                                                <th>Sale Price</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($product_list as $key => $prodDetls):
                                                ?>
                                                <tr>                                        
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td><?php echo $prodDetls->product_name_one; ?></td>
                                                    <td><?php echo $prodDetls->product_name_two; ?></td>
                                                    <td><?php echo!empty($prodDetls->inv_product_id) ? $this->Custom->InBrandsName($prodDetls->inv_product_id) : ''; ?></td>

                                                    <td><img src="<?php echo HTTP_ROOT; ?><?= strstr($prodDetls->product_image, PRODUCT_IMAGES) ? $prodDetls->product_image : PRODUCT_IMAGES . $prodDetls->product_image; ?>" style="width: 80px;"/></td>
                                                    <td>
                                                        <?php
                                                        $statuss = 'Declined'; 
                                                        echo $statuss;
                                                        ?>
                                                    </td>

                                                    <td><?php echo $prodDetls->purchase_price; ?></td>
                                                    <td><?php echo $prodDetls->sell_price; ?></td>
                                                    <td>1</td>
                                                    <td><?php echo date('Y-m-d', strtotime($prodDetls->created)); ?></td>

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


<!--<link href= "https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href= "https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>-->
<script>
    $(document).ready(function () {
        /*$('#example102').DataTable({
         dom: 'Bfrtip',
         buttons: [
         ''
         ]
         });*/
    });
</script>
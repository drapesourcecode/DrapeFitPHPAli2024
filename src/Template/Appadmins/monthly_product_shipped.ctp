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
            <?= 'Monthly Products Shipped From Inventory' ?>
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
                                        <?= $this->Form->create('', ['type' => 'GET']); ?>
                                        <select  name="g">
                                            <option selected disabled value=''>User Type</option>
                                            <?php
                                            $gnd_arr = ['men','women','boy','girl'];
                                            foreach ($gnd_arr as $gnd_li) {                                               
                                                ?>
                                                <option value=<?= $gnd_li; ?> <?= ($gnd_li == $gender) ? 'selected' : ''; ?>><?= ucfirst($gnd_li); ?></option>
                                            <?php } ?>
                                        </select>
                                        <select  name="m">
                                            <option selected disabled value=''>Month</option>
                                            <?php
                                            for ($i = 0; $i < 12; $i++) {
                                                $time = strtotime(sprintf('%d months', $i));
                                                $label = date('F', $time);
                                                $value = date('m', $time);
                                                ?>
                                               <option value=<?=$value;?> <?= ($value==$month)?'selected':'';?>><?=$label;?></option>
                                            <?php } ?>
                                        </select>
                                        <select name="y">
                                            <option selected disabled value=''>Year</option>
                                            <?php foreach (range(2018, date('Y')) as $yr_li) { ?>
                                                <option value='<?= $yr_li; ?>'  <?= ($yr_li==$year)?'selected':'';?>><?= $yr_li; ?></option>
                                            <?php } ?>
                                        </select>
                                        <button type="submit" class='btn'>Search</button>
                                        <?= $this->Form->end(); ?>
                                    </div>


                                    <table id="example102" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name 1</th>
                                                <th>Product Name 2</th>
                                                <th>Fit no.</th>
                                                <th>Product Image</th>
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
                                                    <td><?php echo $key+1; ?></td>
                                                    <td><?php echo $prodDetls->product_name_one; ?></td>
                                                    <td><?php echo $prodDetls->product_name_two; ?></td>
                                                    <td><?= !empty($prodDetls->paymt_gtwy)?$prodDetls->paymt_gtwy->count:'';?></td>
                                                    <td><img src="<?php echo HTTP_ROOT; ?><?= strstr($prodDetls->product_image, PRODUCT_IMAGES) ? $prodDetls->product_image : PRODUCT_IMAGES . $prodDetls->product_image; ?>" style="width: 80px;"/></td>

                                                    <td><?php echo $prodDetls->purchase_price; ?></td>
                                                    <td><?php echo $prodDetls->sell_price; ?></td>
                                                    <td>1</td>
                                                    <td><?php echo date('Y-m-d',strtotime($prodDetls->created)); ?></td>

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
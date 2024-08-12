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
            <?= $month . '-' . $year . ' Revenue : '.$totalSalePrice ?> 
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
                            <div class="col-xs-12" id="formDiv"> </div>
                        </div>
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <div class="row" style="float: left;width: 100%;">
                                    <div class="row" style="float: left;width: 100%;">
                                        <div class="col-md-6" style="float: left;"> 
                                            <?php
                                            echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'monthlyRevenuePdf', '?month=' . $month . '&year=' . $year], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);

                                            echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'monthlyRevenueExcel', '?month=' . $month . '&year=' . $year], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                            ?>
                                        </div>
                                        <div class="col-md-2" > 
                                            <?php echo $this->Form->create('', ['type' => 'get']); ?>
                                            <select name="month" class="form-control">
                                                <option value="" selected disabled>--</option>
                                                <?php foreach (range(1, 12) as $mnt) { ?>
                                                    <option value="<?= str_pad($mnt, "0", STR_PAD_LEFT); ?>" <?= (!empty($_GET['month']) && ($_GET['month'] == $mnt) ) ?'selected':'';?>><?= str_pad($mnt, "0", STR_PAD_LEFT); ?></option>
                                                <?php } ?>
                                            </select></div>
                                        <div class="col-md-2" > 
                                            <select name="year" class="form-control">
                                                <option value="" selected disabled>--</option>
                                                <?php foreach (range(2018, date('Y')) as $yr) { ?>
                                                    <option value="<?= $yr; ?>" <?= (!empty($_GET['year']) && ($_GET['year'] == $yr) ) ?'selected':'';?> ><?= $yr; ?></option>
                                                <?php } ?>
                                            </select></div>
                                        <div class="col-md-2" > 
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <?php echo $this->Form->end(); ?>
                                        </div>


                                    </div>


                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Purchase date</th>
                                                <th>Bar code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
//                                        echo "<pre style='mardin-left:30px'>";
//                                        print_r($new_data);
//                                        echo "</pre>";
                                            foreach ($getNotReturnProductList as $key => $n_dt) {
                                                ?>
                                                <tr>
                                                    <td><?= $n_dt->product_name_one; ?></td>
                                                    <td><img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $n_dt->product_image; ?>" width="100" /></td>
                                                    <td><?= $n_dt->sell_price; ?></td>
                                                    <td><?= date('d-M-Y', strtotime($n_dt->customer_purchasedate)); ?></td>
                                                    <td><?= $n_dt->barcode_value; ?></td>

                                                </tr>

                                                <?php
                                                $count++;
                                            }
                                            ?>
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
<script>
    $(document).ready(function () {
        $('#datepicker1').attr('disabled', 'disabled');
        $('#datepicker2').attr('disabled', 'disabled');
        $('#datepicker3').attr('disabled', 'disabled');
        $('#datepicker1').hide();
        $('#datepicker2').hide();
        $('#datepicker3').hide();
        $('#filter_bny').change(function () {


            if ($(this).val() == 'd') {
                $('#datepicker1').val('');
                $('#datepicker1').removeAttr('disabled');
                $('#datepicker1').datepicker();
                $('#datepicker2').attr('disabled', 'disabled');
                $('#datepicker3').attr('disabled', 'disabled');
                $('#datepicker1').show();
                $('#datepicker2').hide();
                $('#datepicker3').hide();
            }
            if ($(this).val() == 'm') {
                $('#datepicker2').val('');
                $('#datepicker2').removeAttr('disabled');
                $('#datepicker2').datepicker({

                }).on('changeDate', function (e) {
                    var currMonth = new Date(e.date).getMonth() + 1;
                    var currYear = String(e.date).split(" ")[3];
                    $('#datepicker2').val(padDigits(currMonth, 2) + '/' + currYear)
//                    $(this).datepicker('hide');
                });
                $('#datepicker1').attr('disabled', 'disabled');
                $('#datepicker3').attr('disabled', 'disabled');
                $('#datepicker1').hide();
                $('#datepicker2').show();
                $('#datepicker3').hide();
            }
            if ($(this).val() == 'y') {
                $('#datepicker3').val('');
                $('#datepicker3').removeAttr('disabled');
                $('#datepicker3').datepicker({

                }).on('changeDate', function (e) {
                    var currYear = String(e.date).split(" ")[3];
                    $('#datepicker3').val(currYear)
//                    $(this).datepicker('hide');
                });
                $('#datepicker1').attr('disabled', 'disabled');
                $('#datepicker2').attr('disabled', 'disabled');
                $('#datepicker1').hide();
                $('#datepicker2').hide();
                $('#datepicker3').show();
            }
        });


    });
    function padDigits(number, digits) {
        return Array(Math.max(digits - String(number).length + 1, 0)).join(0) + number;
    }
</script>
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
            <?= 'Inventory summary' ?>
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


                                    <?= $this->Form->create('', ['type' => 'get']); ?>
                                    <div class="row" style="margin-bottom: 10px; ">
                                        <div class="col-md-2">
                                            <select name="profile_type" class="form-control" required>
                                                <option selected="" disabled="" value="">User Type</option>
                                                <option value="men" <?= !empty($_GET['profile_type']) && ($_GET['profile_type'] == "men") ? 'selected' : ''; ?> >Men</option>
                                                <option value="women"  <?= !empty($_GET['profile_type']) && ($_GET['profile_type'] == "women") ? 'selected' : ''; ?>>Women</option>
                                                <option value="boy" <?= !empty($_GET['profile_type']) && ($_GET['profile_type'] == "boy") ? 'selected' : ''; ?>>Boy</option>
                                                <option value="girl"  <?= !empty($_GET['profile_type']) && ($_GET['profile_type'] == "girl") ? 'selected' : ''; ?> >Girl</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <input type="date"  class="form-control"  name="date" value="<?= !empty($_GET['date'])  ? date('Y-m-d',strtotime($_GET['date'])) : ''; ?>" required> 
                                            <small>select start date for report</small>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <input type="date"  class="form-control"  name="end_date" value="<?= !empty($_GET['end_date'])  ? date('Y-m-d',strtotime($_GET['end_date'])) : ''; ?>" required> 
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
                                                <th>Brand Name</th>
                                                <th>Quantity </th>
                                                <th>Used</th>
                                                <th>Current Stock</th>
                                                <th>Purchase price</th>
                                                <th>Sales price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $all_data_list = '';
                                            $current_data_list = '';
                                            if (!empty($_GET['profile_type'])) {
                                                if ($_GET['profile_type'] == 'men') {
                                                    $all_data_list = 'all_men';
                                                    $current_data_list = 'men';
                                                }
                                                if ($_GET['profile_type'] == 'women') {
                                                    $all_data_list = 'all_women';
                                                    $current_data_list = 'women';
                                                }
                                                if ($_GET['profile_type'] == 'boy') {
                                                    $all_data_list = 'all_boy';
                                                    $current_data_list = 'boy';
                                                }
                                                if ($_GET['profile_type'] == 'girl') {
                                                    $all_data_list = 'all_girl';
                                                    $current_data_list = 'girl';
                                                }
                                            }
                                            $count = 1;

                                            $all_tt_qnty = 0;
                                            $all_tt_used = 0;
                                            $all_tt_crnt_stk = 0;
                                            $all_tt_pp = 0;
                                            $all_tt_sp = 0;
                                            foreach ($user_product_list as $key => $n_dt) {
                                                ?>
                                                <tr>
                                                    <td><?= $n_dt->brand_name; ?></td>
                                                    <td>
                                                        <?php
                                                        if (!empty($all_data_list)) {
                                                            $qnty = count($n_dt->$all_data_list);
                                                            echo $qnty;
                                                            $all_tt_qnty += $qnty;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ((!empty($all_data_list) && !empty($current_data_list))) {
                                                            $used = count($n_dt->$all_data_list) - count($n_dt->$current_data_list);
                                                            echo $used;
                                                            $all_tt_used  += $used;
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($current_data_list)) {
                                                            $crnt_stk = count($n_dt->$current_data_list);
                                                            echo $crnt_stk;
                                                            $all_tt_crnt_stk += $crnt_stk;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $purch_prc = 0;
                                                        $sale_prc = 0;
                                                        if (!empty($all_data_list)) {
                                                            foreach ($n_dt->$all_data_list as $prd) {
                                                                if ($prd->match_status == 2) {
                                                                    $purch_prc += $prd->purchase_price;
                                                                    $sale_prc += $prd->sale_price;
                                                                }
                                                            }
                                                        }
                                                        echo $purch_prc;
                                                        $all_tt_pp += $purch_prc;
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $sale_prc;
                                                        $all_tt_sp += $sale_prc;
                                                        ?>
                                                    </td>

                                                </tr>

                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>                                            
                                                <th>Total</th>
                                                <th> <?= $all_tt_qnty; ?> </th>
                                                <th> <?= $all_tt_used; ?> </th>
                                                <th> <?= $all_tt_crnt_stk; ?> </th>
                                                <th> <?= $all_tt_pp; ?> </th>
                                                <th> <?= $all_tt_sp; ?> </th>
                                            </tr>
                                        </tfoot>
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
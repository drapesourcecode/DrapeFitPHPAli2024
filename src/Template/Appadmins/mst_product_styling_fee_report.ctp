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
            <?= 'Product Styling Fee Report' ?>
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
                                                <th>Sl no.</th>
                                                <th>User Name</th>
                                                <th>Kid Name</th>
                                                <th>Fee </th>
                                                <th>Shipping date</th>
                                                <th>Auto checkout date</th>
                                                <th>Payment date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tt_prc = 0;
                                            foreach ($payment_list as $key => $n_dt) {
//                                                echo "<pre>";
//                                                print_r($n_dt);
//                                                echo "</pre>";
                                                $tt_prc += !empty($n_dt->payment_getway) ? $n_dt->payment_getway->price : 0;
                                                ?>
                                                <tr>                                                    
                                                    <td> 
                                                        <?= $key+1; ?>
                                                    </td>
                                                    <td> 
                                                        <?= !empty($n_dt->user_detail) ? $n_dt->user_detail->first_name . " " . $n_dt->user_detail->last_name : ''; ?>
                                                    </td>
                                                    <td> 
                                                        <?= !empty($n_dt->kids_detail) ? $n_dt->kids_detail->kids_first_name : ''; ?>
                                                    </td>
                                                    <td> 
                                                        <?= !empty($n_dt->payment_getway) ? $n_dt->payment_getway->price : ''; ?>
                                                    </td>
                                                    <td> 
                                                        <?= $n_dt->shipping_date; ?>
                                                    </td>
                                                    <td> 
                                                        <?= $n_dt->auto_checkout_date; ?>
                                                    </td>
                                                    <td> 
                                                        <?= !empty($n_dt->payment_getway) ? $n_dt->payment_getway->created_dt : ''; ?>
                                                    </td>



                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>                                            
                                                <th colspan="3">Total</th>
                                                <th colspan="4"><?= $tt_prc; ?></th>
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
<style>
    .ntt th, .ntt td {
        border: 1px solid black;
        /*border-radius: 10px;*/
        padding: 4px;
    }
</style>
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
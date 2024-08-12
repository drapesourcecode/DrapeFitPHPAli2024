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
            <?= 'Change auto checkout date ' ?>
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
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>  
                                                <th>Payment id</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>Kid Name</th>
                                                <th>Fit</th>
                                                <th>Shipping date</th>
                                                <th>Auto checkout date</th>
                                                <th>Payment date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tt_prc = 0;
                                            foreach ($payment_list as $key => $n_dt) {
//                                                echo "<pre>";
//                                                print_r($n_dt);
//                                                echo "</pre>";
                                                if (!empty($n_dt->auto_checkout_date) && !empty($n_dt->shipping_date) && ($n_dt->payment_getway->work_status == 1)) {
                                                    ?>
                                                    <tr>                                                    
                                                        <td> 
                                                            <?php $key + 1; ?>
                                                            <?= $n_dt->payment_getway->id; ?>
                                                        </td>
                                                        <td> 
                                                            <?= !empty($n_dt->user_detail) ? $n_dt->user_detail->first_name . " " . $n_dt->user_detail->last_name : ''; ?>
                                                        </td>
                                                        <td> 
                                                            <?= !empty($n_dt->user) ? $n_dt->user->email : ''; ?>
                                                        </td>
                                                        <td> 
                                                            <?= !empty($n_dt->kids_detail) ? $n_dt->kids_detail->kids_first_name : ''; ?>
                                                        </td>
                                                        <td> 
                                                            <?php
                                                            if (!empty($n_dt->payment_getway->count)) {
                                                                if ($n_dt->payment_getway->count== 1) {
                                                                    $ptype = 'st';
                                                                } elseif ($n_dt->payment_getway->count == 2) {
                                                                    $ptype = 'nd';
                                                                } elseif ($n_dt->payment_getway->count == 3) {
                                                                    $ptype = 'rd';
                                                                } else {
                                                                    $ptype = 'th';
                                                                }
                                                                echo $n_dt->payment_getway->count.''.$ptype;
                                                            }
                                                            ?>
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

                                                        <td>
                                                            <button class="btn btn-info" onclick="openMod(<?= $n_dt->payment_getway->id; ?>, '<?= date("Y-m-d", strtotime($n_dt->auto_checkout_date)); ?>')">Update Auto checout date</button>
                                                        </td>



                                                    </tr>

                                                <?php }
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

    <div class="modal fade" id="myModaltst" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Update auto checkout date <button type="button" class="btn" data-dismiss="modal" style="float: right;">&times;</button></h4>
                </div>
                <div class="modal-body">
<?= $this->Form->create('', ['type' => 'POST']); ?>
                    <input type="hidden" class="form-control" name="payment_id" id="payment_id">
                    <input type="hidden" class="form-control" name="chk_date" id="chk_date">
                    <input type="date" class="form-control" name="new_chk_date" id="new_chk_date" required><br>
                    <button type="submit" class='btn btn-primary'>Update</button>
<?= $this->Form->end(); ?>
                </div>
            </div>

        </div>
    </div>

</div>
<script>
    function openMod(payment_id, old_date) {
        $('#payment_id').val(payment_id);
        $('#chk_date').val(old_date);
        $('#myModaltst').modal('show');
    }
</script>
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
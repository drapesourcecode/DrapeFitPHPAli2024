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
            <?= __('Checked out already but return not processed') ?>
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
                                    <div class="col-md-6" style="float: left;"> 
                                        <?php
                                        if (!empty($_GET['search_year'])) {
                                            echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'returnNotProcessedPdf', 'search_year' => $_GET['search_year']], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                        } elseif (!empty($_GET['search_month'])) {
                                            echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'returnNotProcessedPdf', 'search_month' => $_GET['search_month']], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                        } elseif (!empty($_GET['search_date'])) {
                                            echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'returnNotProcessedPdf', 'search_date' => $_GET['search_date']], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                        } else {
                                            echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'returnNotProcessedPdf', $search_field], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                        }
                                        ?>                                        
                                        <?php
                                        if (!empty($_GET['search_year'])) {
                                            echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'returnNotProcessedExcel', 'search_year' => $_GET['search_year']], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                        } elseif (!empty($_GET['search_month'])) {
                                            echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'returnNotProcessedExcel', 'search_month' => $_GET['search_month']], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                        } elseif (!empty($_GET['search_date'])) {
                                            echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'returnNotProcessedExcel', 'search_date' => $_GET['search_date']], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                        } else {
                                            echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'returnNotProcessedExcel', $search_field], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6" style="float: right;">
                                        <?= $this->Form->create('', ['type' => 'get']); ?>
                                        <div class="form-group col-md-4">

                                            <select class="form-control" id="filter_bny" name="search_type">
                                                <option value="" selected disabled>Select one</option>

                                                <option value="d">Date</option>

                                                <option value="m">Month</option>
                                                <option value="y">Year</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">                                            
                                            <input class="form-control" id="datepicker1" type="text" name="search_date" style="display:none;">
                                            <input class="form-control" id="datepicker2" type="text" name="search_month" style="display:none;">
                                            <input class="form-control" id="datepicker3" type="text" name="search_year" style="display:none;">
                                        </div>
                                        <div class="form-group col-md-4">                                            
                                            <button class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                        <?= $this->Form->end(); ?>
                                    </div>

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Kids Name</th>
                                                <th>Profile type</th>
                                                <th>Fit</th>
                                                <th>
                                                    Products                                               
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
//                                        echo "<pre style='mardin-left:30px'>";
//                                        print_r($new_data);
//                                        echo "</pre>";
                                            foreach ($new_data as $key => $n_dt) {
                                                $user_name = '';
                                                $user_email = '';
                                                $kid_name = '';
                                                $profile_type = '';
                                                $fit_d = '';
                                                $pord_d = '';
                                                $keep_s = '';
                                                $total_product_price = 0;
                                                foreach ($n_dt as $ky => $dt) {
                                                    $fnz_dt = '';
                                                    $user_name = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;
                                                    $user_email = $dt->user->email;
                                                    $kid_name = !empty($dt->kid_id) ? $dt->kid_data : '';
                                                    $profile_type = $dt->payment_getway->profile_type;
                                                    $fit_d = $dt->payment_getway->count;
                                                    if ($dt->checkedout == 'Y') {
                                                        if ($dt->keep_status == 3) {
                                                            $keep_s = 'Keep';
                                                            $total_price += $dt->sell_price;
                                                            $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                                                        } elseif ($dt->keep_status == 2) {
                                                            if ($dt->is_altnative_product == 1) {
                                                                $keep_s = "Exchange Altnative product";
                                                                $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                                                            } else {
                                                                $keep_s = 'Exchange';
                                                                $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                                                            }
                                                        } elseif ($dt->keep_status == 1) {


                                                            $keep_s = 'Return';
                                                            $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                                                            if ($dt->store_return_status == 'Y') {
                                                                $keep_s .= "<span><i style='color:green'class='fa fa-check'></i></span>";
                                                            }
                                                        } elseif ($dt->keep_status == 0) {
                                                            $keep_s = 'Pending';
                                                        }
                                                    } else {
                                                        $keep_s = 'Pending';
                                                    }
                                                    $pord_d .= "<tr>"
                                                            . "<td>" . $dt->product_name_one . "</td>"
                                                            . "<td>". $dt->in_rack  . "</td>"
                                                            . "<td>" . $keep_s . "</td>"
                                                            . "<td>" . date('d-M-Y', strtotime($dt->created)) . "</td>"
                                                            . "<td>$" . $dt->sell_price . "</td>"
                                                            . "<td >" . $fnz_dt . "</td>"
                                                            . "</tr> ";
                                                    $total_product_price += $dt->sell_price;
                                                }
                                                $pord_d .= "<tr>"
                                                        . "<td colspan='4' align='center'><b>Total :</b> </td>"
                                                        . "<td ><b>$" . $total_product_price . "</b></td>"
                                                        . "</tr> ";
                                                ?>
                                                <tr>
                                                    <td><?= $user_name; ?></td>
                                                    <td><?= $user_email; ?></td>
                                                    <td><?= $kid_name; ?></td>
                                                    <td><?php
                                                        if ($profile_type == 1) {
                                                            echo "Men";
                                                        }
                                                        if ($profile_type == 2) {
                                                            echo "Women";
                                                        }
                                                        if ($profile_type == 3) {
                                                            echo "Kid";
                                                        }
                                                        ?></td>
                                                    <td><?= $fit_d; ?></td>
                                                    <td>
                                                        <?php if (!empty($pord_d)) { ?>
                                                            <table style="width: 87%;">    
                                                                <tr>
                                                                    <th>Product name</th>
                                                                <th>Style no.</th>
                                                                    <th>Status</th>                                                            
                                                                    <th>Date</th>                                                            
                                                                    <th>Price</th>  
                                                                    <th>Finalize date </th>                                                          
                                                                </tr>
                                                                <?= $pord_d; ?>

                                                            </table>
                                                        <?php } ?>
                                                    </td>
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
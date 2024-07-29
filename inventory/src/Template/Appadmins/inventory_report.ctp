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
            <?= 'Inventory report' ?>
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
                                            /*
                                            echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'inventory_reportPdf'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);

                                            echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'inventory_reportExcel'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); 
                                             */
                                            ?>
                                        </div>



                                    </div>


                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                                <th>Name</th>
                                                <th>Men</th>
                                                <th>Men total</th>
                                                <th>Women</th>
                                                <th>Women total</th>
                                                <th>Boy kid</th>
                                                <th>Boy kid total</th>
                                                <th>Girl kid</th>
                                                <th>Girl kid total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
//                                        echo "<pre style='mardin-left:30px'>";
//                                        print_r($new_data);
//                                        echo "</pre>";
                                            $count = 1;
                                            foreach ($user_product_list as $key => $n_dt) {
                                                ?>
                                                <tr>
                                                    <td><?= $n_dt->brand_name; ?></td>
                                                    <td>
                                                        <?= count($n_dt->men); ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tt_m_pc = 0;
                                                        foreach ($n_dt->men as $mn_li) {
                                                            $tt_m_pc += $mn_li->sale_price;
                                                        }
                                                        echo number_format($tt_m_pc, 2,'.','');
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= count($n_dt->women); ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tt_w_pc = 0;
                                                        foreach ($n_dt->women as $mn_li) {
                                                            $tt_w_pc += $mn_li->sale_price;
                                                        }
                                                        echo number_format($tt_w_pc, 2,'.','');
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= count($n_dt->boy); ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tt_b_pc = 0;
                                                        foreach ($n_dt->boy as $mn_li) {
                                                            $tt_b_pc += $mn_li->sale_price;
                                                        }
                                                        echo number_format($tt_b_pc, 2,'.','');
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= count($n_dt->girl); ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tt_g_pc = 0;
                                                        foreach ($n_dt->girl as $mn_li) {
                                                            $tt_g_pc += $mn_li->sale_price;
                                                        }
                                                        echo number_format($tt_g_pc, 2,'.','');
                                                        ?>
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
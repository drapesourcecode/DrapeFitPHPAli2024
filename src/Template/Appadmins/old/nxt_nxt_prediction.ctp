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
            <?= __($one_nxt_month_name . ' Customer List') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/prediction' ?>"> <?= __($one_nxt_month_name . ' Customer List') ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="<?php echo HTTP_ROOT . 'appadmins/prediction' ?>" class="btn btn-default"><?= date('F', strtotime('first day of +1 month')); ?></a>
                                <a href="<?php echo HTTP_ROOT . 'appadmins/nxt_prediction' ?>" class="btn btn-default"><?= date('F', strtotime('first day of +2 month')); ?></a>
                                <a href="<?php echo HTTP_ROOT . 'appadmins/nxt_nxt_prediction' ?>" class="btn btn-info"><?= date('F', strtotime('first day of +3 month')); ?></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Parents list</h4>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                        <tr>

                                            <th>Name </th>
                                            <th>Email </th>
                                            <th>Subs. </th>
                                            <th><?= $one_nxt_month_name; ?>  Date</th>
                                            <th>Action </th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($paid_customer as $p_c_list) {
//            echo "<pre>";
//            print_r($p_c_list);
//            echo "</pre>";
//     Product not return to store check       
//            $product_store_return = 0;
//            if (!empty($p_c_list->product)) {
//                foreach ($p_c_list->product as $prod_li) {
//                    if ((($prod_li->return_status == 'Y') || ($prod_li->exchange_status == 'Y')) && ($prod_li->store_return_status != 'Y')) {
//                        $product_store_return = 1;
//                    }
//                }
//            }
                                            if (!empty($p_c_list->transactions_id)) {

                                                if ($p_c_list->parent_fix->try_new_items_with_scheduled_fixes == 1) {
                                                    if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 1) && date('Y-m-d', strtotime('first day of +' . ($p_c_list->parent_fix->how_often_would_you_lik_fixes + 2) . ' month', strtotime($p_c_list->created_dt))) <= $next_month) {
                                                        ?>
                                                        <tr>

                                                            <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                            <td><?= $p_c_list->usr->email; ?> </td>
                                                            <td>1</td>
                                                            <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                            <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a>      </td>
                                                        </tr>

                                                        <?php
//                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                    } else if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 2) && (date('Y-m-d', strtotime('first day of +' . ($p_c_list->parent_fix->how_often_would_you_lik_fixes + 4) . ' month', strtotime($p_c_list->created_dt))) == $next_month) || (date('Y-m-d', strtotime('first day of +' . ($p_c_list->parent_fix->how_often_would_you_lik_fixes + 4) . ' month', strtotime($p_c_list->created_dt))) == $prev_month)) {
                                                        ?>
                                                        <tr>

                                                            <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                            <td><?= $p_c_list->usr->email; ?> </td>
                                                            <td>2</td>
                                                            <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                            <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a>      </td>
                                                        </tr>

                                                        <?php
//                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                    } else if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 3) && date('Y-m-d', strtotime('first day of +' . ($p_c_list->parent_fix->how_often_would_you_lik_fixes + 6) . ' month', strtotime($p_c_list->created_dt))) == $next_month) {
                                                        ?>
                                                        <tr>

                                                            <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                            <td><?= $p_c_list->usr->email; ?> </td>
                                                            <td>3</td>
                                                            <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                            <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a>      </td>
                                                        </tr>

                                                        <?php
//                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div><!-- /.box-body -->

                            <div class="col-xs-6">
                                <h4>Kids list</h4>
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>

                                        <tr>

                                            <th>Name </th>
                                            <th>Email </th>
                                            <th>Subs. </th>
                                            <th><?= $one_nxt_month_name; ?> Date</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($paid_customer_kid as $p_c_list) {
//            echo "<pre>";
//            print_r($p_c_list);
//            echo "</pre>";
                                            if (!empty($p_c_list->transactions_id)) {
                                                if ($p_c_list->kid_fix->try_new_items_with_scheduled_fixes == 1) {
                                                    if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 1) && date('Y-m-d', strtotime('first day of +' . ($p_c_list->kid_fix->how_often_would_you_lik_fixes + 2) . ' month', strtotime($p_c_list->created_dt))) <= $next_month) {
                                                        ?>
                                                        <tr>

                                                            <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                            <td><?= $p_c_list->usr->email; ?> </td>
                                                            <td>1</td>
                                                            <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                            <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a>      </td>
                                                        </tr>

                                                        <?php
//                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                    } else if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 2) && (date('Y-m-d', strtotime('first day of +' . ($p_c_list->kid_fix->how_often_would_you_lik_fixes + 4) . ' month', strtotime($p_c_list->created_dt))) == $next_month) || (date('Y-m-d', strtotime('first day of +' . ($p_c_list->kid_fix->how_often_would_you_lik_fixes + 4) . ' month', strtotime($p_c_list->created_dt))) == $prev_month)) {
                                                        ?>
                                                        <tr>

                                                            <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                            <td><?= $p_c_list->usr->email; ?> </td>
                                                            <td>2</td>
                                                            <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                            <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a>      </td>
                                                        </tr>

                                                        <?php
//                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                    } else if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 3) && date('Y-m-d', strtotime('first day of +' . ($p_c_list->kid_fix->how_often_would_you_lik_fixes + 6) . ' month', strtotime($p_c_list->created_dt))) == $next_month) {
                                                        ?>
                                                        <tr>

                                                            <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                            <td><?= $p_c_list->usr->email; ?> </td>
                                                            <td>3</td>
                                                            <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                            <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top"  class="btn btn-info" ><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a>      </td>
                                                        </tr>

                                                        <?php
//                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                    }
                                                }
                                            }
                                        }
                                        ?>


                                    </tbody>
                                </table>

                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $(function () {
        $("#example3").DataTable({
            "order": [[0, 'desc']]
        });
    });
</script>


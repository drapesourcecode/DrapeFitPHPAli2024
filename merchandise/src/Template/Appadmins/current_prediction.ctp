<?php use Cake\Core\Configure;  ?>
<style>
    .btn.btn-info.hint--top.hint .fa.fa-fw.fa-user-plus {
        width: 3.286em !important;
    }

    .hide {
        display: none;
    }

    .active {
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
                                <a href="<?php echo HTTP_ROOT . 'appadmins/two_previous_monthprediction' ?>" class="btn btn-default"><?= date('F', strtotime('first day of -2 month')); ?></a>
                                <a href="<?php echo HTTP_ROOT . 'appadmins/one_previous_monthprediction' ?>" class="btn btn-default"><?= date('F', strtotime('first day of -1 month')); ?></a>
                                <a href="<?php echo HTTP_ROOT . 'appadmins/current_prediction' ?>" class="btn btn-info"><?= date('F'); ?></a>
                                <a href="<?php echo HTTP_ROOT . 'appadmins/prediction' ?>" class="btn btn-default"><?= date('F', strtotime('first day of +1 month')); ?></a>
                                <a href="<?php echo HTTP_ROOT . 'appadmins/nxt_prediction' ?>" class="btn btn-default"><?= date('F', strtotime('first day of +2 month')); ?></a>
                                <a href="<?php echo HTTP_ROOT . 'appadmins/nxt_nxt_prediction' ?>" class="btn btn-default"><?= date('F', strtotime('first day of +3 month')); ?></a>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 20px;">
                            <div class="col-sm-12">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#men">MEN</a></li>
                                    <li><a data-toggle="tab" href="#women">WOMEN</a></li>
                                    <li><a data-toggle="tab" href="#kidboy">KID BOY</a></li>
                                    <li><a data-toggle="tab" href="#kidgirl">KID GIRL</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="men" class="tab-pane fade in active">
                                        <table class="table table-bordered table-striped example3">
                                            <thead>

                                                <tr>

                                                    <th>Name </th>
                                                    <th>Email </th>
                                                    <th>Subs. </th>
                                                    <th><?= $one_nxt_month_name; ?> Date</th>
                                                    <th>Fit count</th>
                                                    <th>Influencer</th>
                                                    <th>Action </th>
                                                    <th>Work Flow Status </th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if(!empty($current_paid_customer)){
                                                    foreach ($current_paid_customer as $p_c_list) {
                                                        if (!empty($p_c_list->usr_dtl) && ($p_c_list->usr_dtl->gender == 1)) {
                                                        if (!empty($p_c_list->transactions_id)) {
                                                        ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td><?=$p_c_list->parent_fix->how_often_would_you_lik_fixes; ?></td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>

                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?= empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); ?></td>
                                                                    </tr>

                                                                <?php
                                                    }
                                                    }
                                                    }
                                                }
                                                foreach ($paid_customer as $p_c_list) {
//                                                        echo "<pre>";
//                                                        print_r([$p_c_list->id, $p_c_list->usr->email, date('Y-m-d', strtotime($p_c_list->created_dt)) , $next_month]);
//                                                        echo "</pre>";
//                                                        print_r($p_c_list->usr->email);
//                                                        echo "</pre>";
                                                    //     Product not return to store check       
                                                    //            $product_store_return = 0;
                                                    //            if (!empty($p_c_list->product)) {
                                                    //                foreach ($p_c_list->product as $prod_li) {
                                                    //                    if ((($prod_li->return_status == 'Y') || ($prod_li->exchange_status == 'Y')) && ($prod_li->store_return_status != 'Y')) {
                                                    //                        $product_store_return = 1;
                                                    //                    }
                                                    //                }
                                                    //            }

                                                    if (!empty($p_c_list->usr_dtl) && ($p_c_list->usr_dtl->gender == 1)) {
                                                        if (!empty($p_c_list->transactions_id)) {
                                                            if ($p_c_list->parent_fix->try_new_items_with_scheduled_fixes == 1) {
                                                                
                                                                if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 1) && date('Y-m-d', strtotime('first day of +0 month', strtotime($p_c_list->created_dt))) <= $next_month) {
                                                                   
                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>1</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>

                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?php // echo empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); ?></td>
                                                                    </tr>

                                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                                } else if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 2) && (date('Y-m-d', strtotime('first day of +1 month', strtotime($p_c_list->created_dt))) == $next_month) || (date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $prev_month)) {
                                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>2</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>

                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                                } else if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 3) && date('Y-m-d', strtotime('first day of +2 month', strtotime($p_c_list->created_dt))) == $next_month) {
                                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>3</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>
                                                                            <?php endif; ?>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="women" class="tab-pane fade">
                                        <table class="table table-bordered table-striped example3">
                                            <thead>

                                                <tr>

                                                    <th>Name </th>
                                                    <th>Email </th>
                                                    <th>Subs. </th>
                                                    <th><?= $one_nxt_month_name; ?> Date</th>
                                                    <th>Fit count</th>
                                                    <th>Influencer</th>
                                                    <th>Action </th>
                                                    <th>Work Flow Status </th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                
                                                if(!empty($current_paid_customer)){
                                                    foreach ($current_paid_customer as $p_c_list) {
                                                        if (!empty($p_c_list->usr_dtl) && ($p_c_list->usr_dtl->gender == 2)) {
                                                        if (!empty($p_c_list->transactions_id)) {
                                                        ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td><?=$p_c_list->parent_fix->how_often_would_you_lik_fixes; ?></td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>

                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?= empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); ?></td>
                                                                    </tr>

                                                                <?php
                                                    }
                                                    }
                                                    }
                                                }
                                                
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

                                                    if (!empty($p_c_list->usr_dtl) && ($p_c_list->usr_dtl->gender == 2)) {
                                                        if (!empty($p_c_list->transactions_id)) {
                                                            if ($p_c_list->parent_fix->try_new_items_with_scheduled_fixes == 1) {
                                                                if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 1) && date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) <= $next_month) {
                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>1</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a> <br>


                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                                } else if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 2) && (date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $next_month) || (date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $prev_month)) {
                                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>2</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                                } else if (($p_c_list->parent_fix->how_often_would_you_lik_fixes == 3) && date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $next_month) {
                                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>3</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a> <br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->id . ' - ' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->parent_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . ' - ' . $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="kidboy" class="tab-pane fade">

                                        <table class="example3 table table-bordered table-striped">
                                            <thead>

                                                <tr>

                                                    <th>Name </th>
                                                    <th>Email </th>
                                                    <th>Subs. </th>
                                                    <th><?= $one_nxt_month_name; ?> Date</th>
                                                    <th>Fit count</th>
                                                    <th>Influencer</th>
                                                    <th>Action</th>
                                                    <th>Work Flow Status </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                if(!empty($current_paid_customer_kid)){
                                                    foreach ($current_paid_customer_kid as $p_c_list) {
                                                        if (!empty($p_c_list->kid_detail) && ($p_c_list->kid_detail->kids_clothing_gender == "boys")) {
                                                        if (!empty($p_c_list->transactions_id)) {
                                                        ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td><?=$p_c_list->parent_fix->how_often_would_you_lik_fixes; ?></td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>

                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?= empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); ?></td>
                                                                    </tr>

                                                                <?php
                                                    }
                                                    }
                                                    }
                                                }
                                                
                                                foreach ($paid_customer_kid as $p_c_list) {
                                                    //            echo "<pre>";
                                                    //            print_r($p_c_list);
                                                    //            echo "</pre>";
                                                    if (!empty($p_c_list->kid_detail) && ($p_c_list->kid_detail->kids_clothing_gender == "boys")) {
                                                        if (!empty($p_c_list->transactions_id)) {
                                                            if ($p_c_list->kid_fix->try_new_items_with_scheduled_fixes == 1) {
                                                                if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 1) && date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) <= $next_month) {
                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>1</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a> <br>

                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_produc as $product) {
                                                                                if ($product->allocate_to_kid_id == $p_c_list->kid_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>
                                                                                </a>

                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/kidProfile/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>

                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                                } else if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 2) && (date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $next_month) || (date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $prev_month)) {
                                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>2</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a> <br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_produc as $product) {
                                                                                if ($product->allocate_to_kid_id == $p_c_list->kid_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/kidProfile/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                                } else if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 3) && date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $next_month) {
                                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>3</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a> <br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_produc as $product) {
                                                                                if ($product->allocate_to_kid_id == $p_c_list->kid_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/kidProfile/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>

                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="kidgirl" class="tab-pane fade">

                                        <table class="example3 table table-bordered table-striped">
                                            <thead>

                                                <tr>

                                                    <th>Name </th>
                                                    <th>Email </th>
                                                    <th>Subs. </th>
                                                    <th><?= $one_nxt_month_name; ?> Date</th>
                                                    <th>Fit count</th>
                                                    <th>Influencer</th>
                                                    <th>Action</th>
                                                    <th>Work Flow Status </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                if(!empty($current_paid_customer_kid)){
                                                    foreach ($current_paid_customer_kid as $p_c_list) {
                                                        if (!empty($p_c_list->kid_detail) && ($p_c_list->kid_detail->kids_clothing_gender == "girls")) {
                                                        if (!empty($p_c_list->transactions_id)) {
                                                        ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->parent_detail->first_name . ' ' . $p_c_list->parent_detail->last_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td><?=$p_c_list->parent_fix->how_often_would_you_lik_fixes; ?></td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_prod as $product) {
                                                                                if ($product->allocate_to_user_id == $p_c_list->user_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }

                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>

                                                                                </a>

                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/review/' . $p_c_list->id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?= empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); ?></td>
                                                                    </tr>

                                                                <?php
                                                    }
                                                    }
                                                    }
                                                }
                                                
                                                foreach ($paid_customer_kid as $p_c_list) {
                                                    //            echo "<pre>";
                                                    //            print_r($p_c_list);
                                                    //            echo "</pre>";
                                                    if (!empty($p_c_list->kid_detail) && ($p_c_list->kid_detail->kids_clothing_gender == "girls")) {
                                                        if (!empty($p_c_list->transactions_id)) {
                                                            if ($p_c_list->kid_fix->try_new_items_with_scheduled_fixes == 1) {
                                                                if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 1) && date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) <= $next_month) {
                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>1</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a> <br>

                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_produc as $product) {
                                                                                if ($product->allocate_to_kid_id == $p_c_list->kid_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/kidProfile/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                                } else if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 2) && (date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $next_month) || (date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $prev_month)) {
                                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>2</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a><br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_produc as $product) {
                                                                                if ($product->allocate_to_kid_id == $p_c_list->kid_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/kidProfile/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>
                                                                        </td>
                                                                        <td><?= empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); ?></td>
                                                                    </tr>

                                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                                } else if (($p_c_list->kid_fix->how_often_would_you_lik_fixes == 3) && date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) == $next_month) {
                                                                ?>
                                                                    <tr>

                                                                        <td><?= $p_c_list->kid_detail->kids_first_name; ?> </td>
                                                                        <td><?= $p_c_list->usr->email; ?> </td>
                                                                        <td>3</td>
                                                                        <td><?= date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)); ?></td>
                                                                        <td><?= (date('m',strtotime($p_c_list->created_dt)) == date('m'))?$p_c_list->count:($p_c_list->count+1); ?></td>
                                                                        <td><?= ($p_c_list->usr->is_influencer == 1)?"YES":"NO"; ?></td>
                                                                        <td><a href="<?= HTTP_ROOT; ?>appadmins/prediction_matching/<?= $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Matching</a> <br>
                                                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info"><i class="fa fa-magic" aria-hidden="true"></i> Browse All</a> <br>
                                                                            <?php
                                                                            $totalAllocations = 0;
                                                                            foreach ($p_c_list->in_produc as $product) {
                                                                                if ($product->allocate_to_kid_id == $p_c_list->kid_id) {
                                                                                    $totalAllocations++;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <?php if ($totalAllocations > 0) : ?>
                                                                                <a href="<?= HTTP_ROOT . 'appadmins/prediction_alloca/' . $p_c_list->id . '/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">
                                                                                    <i class="fa fa-magic" aria-hidden="true"></i> + <?= $totalAllocations ?>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/previousOrderList/' . $p_c_list->user_id . '/' . $p_c_list->kid_id; ?>" data-placement="top" class="btn btn-info">Previous order List</a>

                                                                            <a href="<?= HTTP_ROOT . 'appadmins/kidProfile/' . $p_c_list->id; ?>" data-placement="top" class="btn btn-info">Profile</a>
                                                                            <?php if(!strstr($p_c_list->prediction_status, date('Y_' . $one_nxt_month))){ ?>
                                                                            <a href="<?= HTTP_ROOT . 'appadmins/prediction_status/' . $p_c_list->id . '/' . date('Y_' . $one_nxt_month); ?>" data-placement="top" class="btn btn-info">Prediction status</a>
                                                                            <?php }else{ echo "Prediction complete"; } ?>
                                                                             <button type="button" onclick="openCmt(<?= $p_c_list->id; ?>)" class="btn btn-primary">Comments</button>

                                                                        </td>
                                                                        <td><?php if(date('Y-' . $one_nxt_month . '-d', strtotime($p_c_list->created_dt)) <= date('Y-m-d')){ echo  empty($p_c_list->work_flow_status)?'':Configure::read($p_c_list->work_flow_status); } ?></td>
                                                                    </tr>

                                                <?php
                                                                    //                                                    echo "<br>" . $p_c_list->user_id . " - " . $p_c_list->kid_id . " - " . $p_c_list->id . ' - ' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' - ' . date('Y-m-d', strtotime($p_c_list->created_dt)) . ' - ' . date('Y-m-d', strtotime('first day of +' . $p_c_list->kid_fix->how_often_would_you_lik_fixes . ' month', strtotime($p_c_list->created_dt))) . " - " . $p_c_list->kid_detail->kids_first_name;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




                        </div><!-- /.box -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $(function() {
        $(".example3").DataTable({
            "order": [
                [0, 'desc']
            ]
        });
    });
 function openCmt(payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandisePredictionComment",
            data: {
                payment_id: payment_id,
                month_year : $('#month_year').val(),
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_payment_id').val(payment_id);
                $('#comment_list').html(result);
            }
        });
        $('#comment_modal').modal('show');
    }

    function getAllCmt(payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandisePredictionComment",
            data: {
                payment_id: payment_id,
                month_year : $('#month_year').val(),
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_payment_id').val(payment_id);
                $('#comment_list').html(result);
            }
        });
    }

    function postCmt() {
        let cmt = $('#cmt_detail').val();
        let payment_id = $('#cmt_payment_id').val();
        let month_year = $('#month_year').val();
        let id = $('#id').val();
        let url = "<?= HTTP_ROOT; ?>appadmins/postMerchandisePredictionComment";
        let data = {
            payment_id: payment_id,
            comment: cmt,
            month_year: month_year,
        };

        if (id) {

            url += "/" + id;
            data['comment_id'] = id;
        }

        if (cmt.length < 3) {
            $('#cmt_detail').focus();
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'JSON',
                success: function(result) {
                    $('#cmt_payment_id').val('');
                    $('#cmt_detail').text('');
                    $('#cmt_detail').val('');
                    $('#cmt_detail').val('');
                    $('#id').val('');
                    getAllCmt(payment_id);

                }
            });
        }
    }
    
    function editComment(commentId) {
      console.log('commentId:',commentId);
    $.ajax({
        type: "POST",
        url: "<?=HTTP_ROOT;?>appadmins/editMerchandisePredictionComment",
        data: {commentId: commentId},
         dataType:'JSON',
        success: function (result) {
            $('#id').val(commentId); 
            $('#cmt_payment_id').val(result.payment_id);
            $('#cmt_detail').val(result.comment); 
            $('#comment_modal').modal('show'); 
        }
    });
}


    function deleteComment(commentId) {

        if (confirm("Are you sure you want to delete this comment?")) {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>appadmins/deleteMerchandisePredictionComment/" + commentId,
                dataType: 'JSON',
                success: function(result) {
                    if (result === 'success') {

                        getAllCmt($('#cmt_payment_id').val());
                    } else {

                        alert("Failed to delete comment.");
                    }
                }
            });
        }
    }
    
    $('.modal-footer .btn-default').click(function() {
        closeCmtModal();
    });
</script>


<div id="comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 100%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <div class="cmt-frm">
                    <input type="hidden" id="cmt_payment_id" />
                    <input type="hidden" id="id" value="" />
                    <input type="hidden" id="month_year" value="<?=date('Y_').date('m', strtotime('first day of +0 month'));?>" />
                    <textarea class="form-control" rows="2" id="cmt_detail"></textarea>
                    <button type="button" class="btn btn-success" onclick="postCmt()">Submit</button>
                </div>
                <div id="comment_list"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
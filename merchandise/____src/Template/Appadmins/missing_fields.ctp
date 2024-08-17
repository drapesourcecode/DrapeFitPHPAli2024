<div class="content-wrapper">
    <section class="content-header">
        <h1> Missing Field in Products </h1>        
    </section>

    <section class="content" style="min-height: auto !important;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <?= $this->Form->create('', ['type' => 'get']); ?>
                        <div class="row">
                            <div class="col-sm-2">
                                <label>Employee</label>
                                <select class="form-control" name="employee" required>
                                    <option value="" selected disable>Select employee</option>
                                    <?php foreach ($inv_user as $inv_usr_li) { ?>
                                        <option value="<?= $inv_usr_li->id; ?>" <?= (!empty($_GET['employee']) && ($_GET['employee'] == $inv_usr_li->id)) ? 'selected' : ''; ?> ><?= $inv_usr_li->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">                                
                                <label>Profile type</label>
                                <select class="form-control" name="user_type" required>
                                    <option value="" selected disable>Select profile type</option>
                                    <option value="1" <?= (!empty($_GET['user_type']) && ($_GET['user_type'] == 1)) ? 'selected' : ''; ?> >Men</option>
                                    <option value="2" <?= (!empty($_GET['user_type']) && ($_GET['user_type'] == 2)) ? 'selected' : ''; ?> >Women</option>
                                    <option value="3" <?= (!empty($_GET['user_type']) && ($_GET['user_type'] == 3)) ? 'selected' : ''; ?> >Boy Kids</option>
                                    <option value="4" <?= (!empty($_GET['user_type']) && ($_GET['user_type'] == 4)) ? 'selected' : ''; ?> >Girl Kids</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label>Action type</label>
                                <select class="form-control" name="action">
                                    <option value="" selected disable>Select action</option>
                                    <?php
                                    $action_list = ['edit', 'add', 'scan_edit', 'deleted', 'active', 'deactive'];
                                    foreach ($action_list as $act_li) {
                                        ?>
                                        <option value="<?= $act_li; ?>" <?= (!empty($_GET['action']) && ($_GET['action'] == $act_li)) ? 'selected' : ''; ?> ><?= $act_li; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label>Start date</label>
                                <input type="date" class="form-control" name="start_date" value="<?= (!empty($_GET['start_date']) ) ? date('Y-m-d', strtotime($_GET['start_date'])) : ''; ?>" required>  
                            </div>
                            <div class="col-sm-2">
                                <label>End date</label>
                                <input type="date" class="form-control" name="end_date" value="<?= (!empty($_GET['end_date']) ) ? date('Y-m-d', strtotime($_GET['end_date'])) : ''; ?>">  
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-info" style="margin-top: 25px;">Check</button>
                            </div>
                        </div>
                        <?= $this->Form->end(); ?>

                        <div class="row">

                            <div class="col-sm-12">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name 1</th>
                                            <!--<th>Product Name 2</th>-->
                                            <th>Operation type</th>
                                            <th>Style number</th>
                                            <th>Missing fields</th>                                            
                                            <th>Action</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($_GET['user_type']) && ($_GET['user_type'] == 1)) {
                                            $chk_fld_empty = [
                                                'profile_type' => 'Gender/Profile Type',
                                                'product_type' => 'Product Category',
                                                'rack' => 'Product Sub-Category',
                                                'product_name_one' => 'Product Name1',
//                        'product_name_two' => 'Product Name2',
                                                'season' => 'Season',
                                                'tall_feet' => 'Height Range',
                                                'tall_feet2' => 'Height Range',
                                                'best_fit_for_weight' => 'Weight Range',
                                                'best_fit_for_weight2' => 'Weight Range',
                                                'age1' => 'Age',
                                                'age2' => 'Age',
//                        'profession' => 'Profession',
//                        'best_size_fit' => 'Best Size fit',
                                                'better_body_shape' => 'Body Shape',
                                                'skin_tone' => 'Skin Tone',
                                                'work_type' => 'Typically wear to work?',
//                        'style_sphere_selections_v5' => 'Prefer to wear',
                                                'take_note_of' => 'Any Fit issue',
                                                'purchase_price' => 'Purchase Price',
                                                'sale_price' => 'Sale Price',
//                        'quantity' => 'Quantity',
                                                'brand_id' => 'Brand Name',
                                                'product_image' => 'Image',
                                                'color' => 'Product Color'
                                            ];
                                            foreach ($all_prod_list as $prd_li) {
                                                ?>
                                                <tr id="<?php echo $prd_li->id; ?>" class="message_box">                                                                       <td><img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $prd_li->product_image; ?>" style="width: 50px;"/></td>                
                                                    <td><?php echo $prd_li->product_name_one; ?></td>
                                                    <!--<td><?php echo $prd_li->product_name_two; ?></td>-->
                                                    <td><?php
                                                        if (!empty($prd_li->emp_log)) {
                                                            $log_tt = [];
                                                            foreach ($prd_li->emp_log as $emp_lo_li) {
                                                                $log_tt[] = $emp_lo_li->action;
                                                            }
                                                            echo implode(', ', array_unique($log_tt));
                                                        }
                                                        ?></td>
                                                    <td><?php echo (empty($prd_li->style_number)) ? $prd_li->dtls : $prd_li->style_number; ?></td>
                                                    <td><?php
                                                        $prd_empty_fld = [];
                                                        foreach ($chk_fld_empty as $cfe_ky => $cfe_li) {
                                                            $flddd = $prd_li->$cfe_ky;
                                                            if (empty($flddd) || in_array($flddd, ['null', ''])) {
                                                                $prd_empty_fld[] = $cfe_li;
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["B1"])) {

                                                            if (empty($prd_li->casual_shirts_type) || in_array($prd_li->casual_shirts_type, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Casual Shirts to fit';
                                                            }

                                                            if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Shirts Size';
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["B2", "B11"])) {

                                                            if (empty($prd_li->casual_shirts_type) || in_array($prd_li->casual_shirts_type, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Casual Shirts to fit';
                                                            }

                                                            if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Shirts Size';
                                                            }

                                                            if (empty($prd_li->bottom_up_shirt_fit) || in_array($prd_li->bottom_up_shirt_fit, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Button up shirt to fit';
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["B3", "B4"])) {

                                                            if ((empty($prd_li->waist_size) || in_array($prd_li->waist_size, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Waist size';
                                                            }

                                                            if ((empty($prd_li->inseam_size) || in_array($prd_li->inseam_size, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Inseam size';
                                                            }

                                                            if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }

                                                            if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Bottom Fit';
                                                            }

                                                            if (empty($prd_li->bottom_up_shirt_fit) || in_array($prd_li->bottom_up_shirt_fit, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Jeans to fit';
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["B5"])) {

                                                            if ((empty($prd_li->waist_size) || in_array($prd_li->waist_size, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Waist size';
                                                            }

                                                            if ((empty($prd_li->inseam_size) || in_array($prd_li->inseam_size, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Inseam size';
                                                            }

                                                            if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }

                                                            if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Bottom Fit';
                                                            }

                                                            if (empty($prd_li->bottom_up_shirt_fit) || in_array($prd_li->bottom_up_shirt_fit, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Jeans to fit';
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["B6"])) {

                                                            if ((empty($prd_li->waist_size) || in_array($prd_li->waist_size, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Waist size';
                                                            }

                                                            if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }

                                                            if (empty($prd_li->shorts_long) || in_array($prd_li->shorts_long, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Shorts long';
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["B7"])) {

                                                            if ((empty($prd_li->casual_shirts_type) || in_array($prd_li->casual_shirts_type, ['NULL', 'null', ''])) && (in_array($prd_li->rak->rack_number, ['B71'])) ) {

                                                                $prd_empty_fld[] = 'Casual Shirts to fit';
                                                                
                                                                 if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                                                                    $prd_empty_fld[] = 'Shirts Size';
                                                                }
                                                            }

                                                           

                                                            

                                                            if ((empty($prd_li->shorts_long) || in_array($prd_li->shorts_long, ['NULL', 'null', '']))  && (in_array($prd_li->rak->rack_number, ['B72'])) ) {

                                                                $prd_empty_fld[] = 'Shorts long';
                                                                if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }
                                                                
                                                            }

                                                            if ((empty($prd_li->men_bottom_prefer) || in_array($prd_li->men_bottom_prefer, ['NULL', 'null', '']))   && (in_array($prd_li->rak->rack_number, ['B73'])) ) {

                                                                $prd_empty_fld[] = 'Bottom Fit';
                                                                
                                                                if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }
                                                            }

                                                            if ((empty($prd_li->jeans_Fit) || in_array($prd_li->jeans_Fit, ['NULL', 'null', '']))   && (in_array($prd_li->rak->rack_number, ['B73']))) {

                                                                $prd_empty_fld[] = 'Jeans Fit';
                                                                if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["B14"])) {

                                                            if (!empty($prd_li->primary_size) && ($prd_li->primary_size == "free_size")) {

                                                                $prd_empty_fld[] = 'FREE SIZE';
                                                            }
                                                        }


                                                        echo implode(',&nbsp;&nbsp;', array_unique($prd_empty_fld));
                                                        ?></td>

                                                    <td>
                                                        <?php /*
                                                          $log_sts = [];
                                                          if (!empty($prd_li->emp_log)) {
                                                          foreach ($prd_li->emp_log as $emp_lo_li) {
                                                          $log_sts[] = $emp_lo_li->status;
                                                          }
                                                          }

                                                          if (in_array(3, $log_sts)) {
                                                          ?>
                                                          <?= $this->Form->create('', ['type' => 'post']); ?>
                                                          <input type="hidden" name="rework_flds" value="<?= implode(',&nbsp;&nbsp;', array_unique($prd_empty_fld)); ?>" >
                                                          <?php
                                                          $log_ids = [];
                                                          if (!empty($prd_li->emp_log)) {
                                                          foreach ($prd_li->emp_log as $emp_lo_li) {
                                                          $log_ids[] = $emp_lo_li->id;
                                                          }
                                                          }
                                                          ?>
                                                          <input type="hidden" name="id" value="<?php echo implode(',', array_unique($log_ids)); ?>" >
                                                          <button class="btn btn-success" type="submit">Rework</button>
                                                          <?= $this->Form->end(); ?>
                                                          <?php } ?>
                                                          <?php if (in_array(2, $log_sts) || in_array(3, $log_sts) || in_array(4, $log_sts)) { ?>
                                                          <?php  echo $this->Form->create('', ['type' => 'post','url'=>['action'=>'approveEmployeeWork'],'onsubmit'=>'return confirm("Are you sure want to approve");']); ?>
                                                          <?php
                                                          $log_ids = [];
                                                          if (!empty($prd_li->emp_log)) {
                                                          foreach ($prd_li->emp_log as $emp_lo_li) {
                                                          $log_ids[] = $emp_lo_li->id;
                                                          }
                                                          }
                                                          ?>
                                                          <input type="hidden" name="id" value="<?php echo implode(',', array_unique($log_ids)); ?>" >
                                                          <button class="btn btn-info" type="submit">Approve</button>
                                                          <?= $this->Form->end();  ?>
                                                          <?php } ?>
                                                          <?php if (in_array(1, $log_sts)) { ?>
                                                          <strong style="color:green;">Approved</strong>
                                                          <?php } */ ?>
                                                    </td>

                                                </tr>

                                            <?php } ?>
                                        <?php } ?>


                                        <?php
                                        if (!empty($_GET['user_type']) && ($_GET['user_type'] == 2)) {
                                            $chk_fld_empty = [
                                                'profile_type' => 'Gender/Profile Type',
                                                'product_type' => 'Product Category',
                                                'rack' => 'Product Sub-Category',
                                                'product_name_one' => 'Product Name1',
//                        'product_name_two' => 'Product Name2',
                                                'season' => 'Season',
                                                'tall_feet' => 'Height Range',
                                                'tall_feet2' => 'Height Range',
                                                'best_fit_for_weight' => 'Weight Range',
                                                'best_fit_for_weight2' => 'Weight Range',
                                                'age1' => 'Age',
                                                'age2' => 'Age',
//                        'profession' => 'Profession',
//                        'occasional_dress' => 'Occasions',
                                                'better_body_shape' => 'Body Shape',
                                                'purchase_price' => 'Purchase Price',
                                                'sale_price' => 'Sale Price',
//                                                'quantity' => 'Quantity',
                                                'brand_id' => 'Brand Name',
                                                'product_image' => 'Image',
                                                'color' => 'Product Color',
//                        'style_sphere_selections_v3' => 'Outfit to wear',
                                                'skin_tone' => 'Skin Tone',
                                                'available_status' => 'Available status',
                                            ];
                                            foreach ($all_prod_list as $prd_li) {
                                                ?>
                                                <tr id="<?php echo $prd_li->id; ?>" class="message_box">                                                                       <td><img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $prd_li->product_image; ?>" style="width: 50px;"/></td>                
                                                    <td><?php echo $prd_li->product_name_one; ?></td>
                                                    <!--<td><?php echo $prd_li->product_name_two; ?></td>-->
                                                    <td><?php
                                                        if (!empty($prd_li->emp_log)) {
                                                            $log_tt = [];
                                                            foreach ($prd_li->emp_log as $emp_lo_li) {
                                                                $log_tt[] = $emp_lo_li->action;
                                                            }
                                                            echo implode(', ', array_unique($log_tt));
                                                        }
                                                        ?></td>
                                                    <td><?php echo (empty($prd_li->style_number)) ? $prd_li->dtls : $prd_li->style_number; ?></td>
                                                    <td><?php
                                                        $prd_empty_fld = [];
                                                        foreach ($chk_fld_empty as $cfe_ky => $cfe_li) {
                                                            $flddd = $prd_li->$cfe_ky;
                                                            if (empty($flddd) || in_array($flddd, ['null', ''])) {
                                                                $prd_empty_fld[] = $cfe_li;
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["A1"])) {

                                                            if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'SHIRT & BLOUSE';
                                                            }

                                                            if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Style Inspiration';
                                                            }

                                                            if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top half';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

                                                            if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top type';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }
//                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Shoulders?';
//                        }

                                                            if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Arms?';
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["A2"])) {

                                                            if (empty($prd_li->dress) || in_array($prd_li->dress, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Dress';
                                                            }

                                                            if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Style Inspiration';
                                                            }

                                                            if (empty($prd_li->wo_dress_length) || in_array($prd_li->wo_dress_length, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Dress length';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }
//                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Shoulders?';
//                        }

                                                            if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Arms?';
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["A3"])) {

                                                            if (empty($prd_li->dress) || in_array($prd_li->dress, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Dress';
                                                            }

                                                            if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Style Inspiration';
                                                            }

                                                            if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top half';
                                                            }

                                                            if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top type';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }
//                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Shoulders?';
//                        }

                                                            if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Arms?';
                                                            }

                                                            if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Legs?';
                                                            }

//                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Hips ?';
//                        }

                                                            if (empty($prd_li->wo_pant_length) || in_array($prd_li->wo_pant_length, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant Length';
                                                            }

                                                            if (empty($prd_li->wo_pant_style) || in_array($prd_li->wo_pant_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant style';
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["A4"]) && in_array($prd_li->rak->rack_number, ["A41", "A42", "A47"])) {

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }

                                                            if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Legs?';
                                                            }

//                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Hips ?';
//                        }

                                                            if (empty($prd_li->wo_pant_length) || in_array($prd_li->wo_pant_length, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant Length';
                                                            }

                                                            if (empty($prd_li->wo_pant_rise) || in_array($prd_li->wo_pant_rise, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant Rise';
                                                            }

                                                            if (empty($prd_li->wo_pant_style) || in_array($prd_li->wo_pant_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant style';
                                                            }

                                                            if (empty($prd_li->pants) || in_array($prd_li->pants, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pants';
                                                            }

                                                            if (empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'BOTTOM SIZE';
                                                            }

                                                            if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Bottoms type';
                                                            }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A4"]) && in_array($prd_li->rak->rack_number, ["A43", "A45"])) {

                                                            if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top half';
                                                            }

                                                            if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top type';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }

                                                            if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Style Inspiration';
                                                            }

//                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Shoulders?';
//                        }

                                                            if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Arms?';
                                                            }

                                                            if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'SHIRT & BLOUSE';
                                                            }

                                                            if (empty($prd_li->active_wr) || in_array($prd_li->active_wr, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'ACTIVE WEAR SIZE';
                                                            }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A4"]) && in_array($prd_li->rak->rack_number, ["A44"])) {

                                                            if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top half';
                                                            }

                                                            if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top type';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }

                                                            if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Style Inspiration';
                                                            }

                                                            if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'SHIRT & BLOUSE';
                                                            }

                                                            if (empty($prd_li->active_wr) || in_array($prd_li->active_wr, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'ACTIVE WEAR SIZE';
                                                            }

                                                            if (empty($prd_li->bra) || in_array($prd_li->bra, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'BRA';
                                                            }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A4"]) && in_array($prd_li->rak->rack_number, ["A46"])) {

                                                            if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'SHIRT & BLOUSE';
                                                            }

                                                            if (empty($prd_li->active_wr) || in_array($prd_li->active_wr, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'ACTIVE WEAR SIZE';
                                                            }

                                                            if (empty($prd_li->pants) || in_array($prd_li->pants, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pants';
                                                            }

                                                            if (empty($prd_li->bra) || in_array($prd_li->bra, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'BRA SIZE';
                                                            }

                                                            if (empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'BOTTOM SIZE';
                                                            }

                                                            if (empty($prd_li->wo_jackect_size) || in_array($prd_li->wo_jackect_size, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'JACKET SIZE';
                                                            }
                                                        }





                                                        if (in_array($prd_li->ctg->product_type, ["A5"])) {

                                                            if (empty($prd_li->jeans) || in_array($prd_li->jeans, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'JEANS SIZE';
                                                            }

                                                            if (empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'BOTTOM SIZE';
                                                            }

                                                            if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Style Inspiration';
                                                            }

                                                            if (empty($prd_li->wo_pant_rise) || in_array($prd_li->wo_pant_rise, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant Rise';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

                                                            if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Bottoms type';
                                                            }

                                                            if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Legs?';
                                                            }

//                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Hips ?';
//                        }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A6"])) {

                                                            if (empty($prd_li->skirt) || in_array($prd_li->skirt, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'SKIRT SIZE';
                                                            }

                                                            if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Style Inspiration';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

                                                            if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Bottoms type';
                                                            }

                                                            if (empty($prd_li->wo_dress_length) || in_array($prd_li->wo_dress_length, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Dress length';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }

                                                            if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Legs?';
                                                            }

//                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Hips ?';
//                        }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A7"])) {

                                                            if (empty($prd_li->jeans) || in_array($prd_li->jeans, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'JEANS SIZE';
                                                            }

                                                            if ((empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }

                                                            if (empty($prd_li->wo_pant_length) || in_array($prd_li->wo_pant_length, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant Length';
                                                            }

                                                            if (empty($prd_li->wo_pant_rise) || in_array($prd_li->wo_pant_rise, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant Rise';
                                                            }

                                                            if (empty($prd_li->wo_pant_style) || in_array($prd_li->wo_pant_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant style';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

                                                            if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Bottoms type';
                                                            }

                                                            if (empty($prd_li->denim_styles) || in_array($prd_li->denim_styles, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Denim styles?';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }

                                                            if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Legs?';
                                                            }

//                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Hips ?';
//                        }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A8"])) {

                                                            if (empty($prd_li->jeans) || in_array($prd_li->jeans, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'JEANS SIZE';
                                                            }

                                                            if ((empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', '']))) {

                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }

                                                            if (empty($prd_li->wo_pant_length) || in_array($prd_li->wo_pant_length, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant Length';
                                                            }

                                                            if (empty($prd_li->wo_pant_rise) || in_array($prd_li->wo_pant_rise, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant Rise';
                                                            }

                                                            if (empty($prd_li->wo_pant_style) || in_array($prd_li->wo_pant_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Pant style';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

                                                            if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Bottoms type';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }

                                                            if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Legs?';
                                                            }

//                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Hips ?';
//                        }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A9", "A10", "A11", "A12"])) {

                                                            if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'SHIRT & BLOUSE';
                                                            }

                                                            if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Style Inspiration';
                                                            }

//                        if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {
//                            $prd_empty_fld[] = 'Bottom Size';
//                        }

                                                            if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top half';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

                                                            if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top type';
                                                            }

//                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Missing from fit/your closet?';
//                        }
//                        if (empty($prd_li->wo_dress_length) || in_array($prd_li->wo_dress_length, ['NULL', 'null', ''])) {
//
//                            $prd_empty_fld[] = 'Dress length';
//                        }
//                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
//                            $prd_empty_fld[] = 'Shoulders?';
//                        }

                                                            if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Arms?';
                                                            }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A14"]) && in_array($prd_li->rak->rack_number, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"])) {



                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

                                                            if (!empty($prd_li->primary_size) && ($prd_li->primary_size == "free_size")) {

                                                                $prd_empty_fld[] = 'FREE SIZE';
                                                            }
                                                        }



                                                        if (in_array($prd_li->ctg->product_type, ["A14"]) && in_array($prd_li->rak->rack_number, ["A1411"])) {

                                                            if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'SHIRT & BLOUSE';
                                                            }

                                                            if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top half';
                                                            }

                                                            if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Appare type';
                                                            }

                                                            if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = 'Top type';
                                                            }
                                                        }


                                                        echo implode(',&nbsp;&nbsp;', array_unique($prd_empty_fld));
                                                        ?></td>
                                                    <td></td>
                                                </tr>

                                            <?php } ?>
                                        <?php } ?>

                                        <?php
                                        if (!empty($_GET['user_type']) && ($_GET['user_type'] == 3)) {
                                            $chk_fld_empty = [
                                                'profile_type' => 'Gender/Profile Type',
                                                'product_type' => 'Product Category',
                                                'rack' => 'Product Sub-Category',
                                                'product_name_one' => 'Product Name1',
                                                'season' => 'Season',
                                                'tall_feet' => 'Height Range',
                                                'tall_feet2' => 'Height Range',
                                                'best_fit_for_weight' => 'Weight Range',
                                                'best_fit_for_weight2' => 'Weight Range',
                                                'age1' => 'Age',
                                                'age2' => 'Age',
                                                'kid_body_shape' => 'Body Shape',
                                                'brand_id' => 'Brand Name',
                                                'product_image' => 'Image',
                                                'color' => 'Product Color',
                                                'purchase_price' => 'Purchase Price',
                                                'sale_price' => 'Sale Price',
//                        'quantity' => 'Quantity',
                                                'available_status' => 'Available status',
                                            ];
                                            foreach ($all_prod_list as $prd_li) {
                                                ?>
                                                <tr id="<?php echo $prd_li->id; ?>" class="message_box">                                                                       <td><img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $prd_li->product_image; ?>" style="width: 50px;"/></td>                
                                                    <td><?php echo $prd_li->product_name_one; ?></td>
                                                    <!--<td><?php echo $prd_li->product_name_two; ?></td>-->
                                                    <td><?php
                                                        if (!empty($prd_li->emp_log)) {
                                                            $log_tt = [];
                                                            foreach ($prd_li->emp_log as $emp_lo_li) {
                                                                $log_tt[] = $emp_lo_li->action;
                                                            }
                                                            echo implode(', ', array_unique($log_tt));
                                                        }
                                                        ?></td>
                                                    <td><?php echo (empty($prd_li->style_number)) ? $prd_li->dtls : $prd_li->style_number; ?></td>
                                                    <td><?php
                                                        $prd_empty_fld = [];
                                                        foreach ($chk_fld_empty as $cfe_ky => $cfe_li) {

                                                            $flddd = $prd_li->$cfe_ky;

                                                            if (empty($flddd) || in_array($flddd, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = $cfe_li;
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["C1", "C2", "C4", "C6", "C8"])) {
                                                            if (empty($prd_li->top_size) || in_array($prd_li->top_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Top Size';
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["C3", "C5"])) {
                                                            if (empty($prd_li->bottom_size) || in_array($prd_li->bottom_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["C9"])) {
                                                            if ((empty($prd_li->top_size) && empty($prd_li->bottom_size)) || in_array($prd_li->bottom_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }
                                                            if ((empty($prd_li->top_size) && empty($prd_li->bottom_size)) || in_array($prd_li->top_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Top Size';
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["C12"])) {
                                                            if (empty($prd_li->primary_size) || in_array($prd_li->primary_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Free Size';
                                                            }
                                                            if (!empty($prd_li->primary_size) && ($prd_li->primary_size != "free_size")) {
                                                                $prd_empty_fld[] = 'Free Size';
                                                            }
                                                        }

                                                        echo implode(',&nbsp;&nbsp;', array_unique($prd_empty_fld));
                                                        ?></td>

                                                    <td></td>
                                                </tr>

                                            <?php } ?>
                                        <?php } ?>   

                                        <?php
                                        if (!empty($_GET['user_type']) && ($_GET['user_type'] == 4)) {
                                            $chk_fld_empty = [
                                                'profile_type' => 'Gender/Profile Type',
                                                'product_type' => 'Product Category',
                                                'rack' => 'Product Sub-Category',
                                                'product_name_one' => 'Product Name1',
                                                'season' => 'Season',
                                                'tall_feet' => 'Height Range',
                                                'tall_feet2' => 'Height Range',
                                                'best_fit_for_weight' => 'Weight Range',
                                                'best_fit_for_weight2' => 'Weight Range',
                                                'age1' => 'Age',
                                                'age2' => 'Age',
                                                'kid_body_shape' => 'Body Shape',
                                                'brand_id' => 'Brand Name',
                                                'product_image' => 'Image',
                                                'color' => 'Product Color',
                                                'purchase_price' => 'Purchase Price',
                                                'sale_price' => 'Sale Price',
//                        'quantity' => 'Quantity',
                                                'available_status' => 'Available status',
                                            ];
                                            foreach ($all_prod_list as $prd_li) {
                                                ?>
                                                <tr id="<?php echo $prd_li->id; ?>" class="message_box">                                                                       <td><img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $prd_li->product_image; ?>" style="width: 50px;"/></td>                
                                                    <td><?php echo $prd_li->product_name_one; ?></td>
                                                    <!--<td><?php echo $prd_li->product_name_two; ?></td>-->
                                                    <td><?php
                                                        if (!empty($prd_li->emp_log)) {
                                                            $log_tt = [];
                                                            foreach ($prd_li->emp_log as $emp_lo_li) {
                                                                $log_tt[] = $emp_lo_li->action;
                                                            }
                                                            echo implode(', ', array_unique($log_tt));
                                                        }
                                                        ?></td>
                                                    <td><?php echo (empty($prd_li->style_number)) ? $prd_li->dtls : $prd_li->style_number; ?></td>
                                                    <td><?php
                                                        $prd_empty_fld = [];
                                                        foreach ($chk_fld_empty as $cfe_ky => $cfe_li) {

                                                            $flddd = $prd_li->$cfe_ky;

                                                            if (empty($flddd) || in_array($flddd, ['NULL', 'null', ''])) {

                                                                $prd_empty_fld[] = $cfe_li;
                                                            }
                                                        }

                                                        if (in_array($prd_li->ctg->product_type, ["D1", "D2", "D3", "D7", "D8", "D9"])) {
                                                            if (empty($prd_li->top_size) || in_array($prd_li->top_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Top Size';
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["D4", "D5", "D6"])) {
                                                            if (empty($prd_li->bottom_size) || in_array($prd_li->bottom_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["D11"])) {
                                                            if (empty($prd_li->bottom_size) || in_array($prd_li->bottom_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Bottom Size';
                                                            }
                                                            if (empty($prd_li->top_size) || in_array($prd_li->top_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Top Size';
                                                            }
                                                        }
                                                        if (in_array($prd_li->ctg->product_type, ["D12"])) {
                                                            if (empty($prd_li->primary_size) || in_array($prd_li->primary_size, ['NULL', 'null', ''])) {
                                                                $prd_empty_fld[] = 'Free Size';
                                                            }
                                                            if (!empty($prd_li->primary_size) && ($prd_li->primary_size != "free_size")) {
                                                                $prd_empty_fld[] = 'Free Size';
                                                            }
                                                        }
                                                        echo implode(',&nbsp;&nbsp;', array_unique($prd_empty_fld));
                                                        ?></td>

                                                    <td></td>
                                                </tr>

                                            <?php } ?>
                                        <?php } ?> 

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12">
                                <?php
                                echo $this->Paginator->counter('Page {{page}} of {{pages}}, Showing {{current}} records out of {{count}} total');
//                        echo $this->Paginator->counter(
//    'Page {{page}} of {{pages}}, showing {{current}} records out of
//     {{count}} total, starting on record {{start}}, ending on {{end}}'
//);
                                echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;display: inline-block;width: 100%;float: left;'>";
                                echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                                echo $this->Paginator->numbers(array('first' => 3, 'last' => 3, 'separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                                echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                                echo "</div></ul>";
                                ?>
                            </div>
                        </div>

                        <?php
//                        pj($all_prod_list);
//                        exit;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .ellipsis {
        float: left;
        background: #fff;
        padding: 7px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('Previous Work List') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Previous Work List</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                            <div class="col-xs-12" id="formDiv"> </div>
                        </div>

                        <table id="exampleXX" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td colspan="10">
                                        <div  class="col-sm-6">

                                        </div>
                                        <div  class="col-sm-6">
                                            <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                            <div class="form-group">
                                                <select class="form-control" name="search_for" required>
                                                    <option value="" selected disabled>Select field</option>
                                                    <option value="user_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_name")) ? "selected" : ""; ?> >User first name</option>
                                                    <option value="user_last_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_last_name")) ? "selected" : ""; ?> >User last name</option>
                                                    <!--<option value="kid_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "kid_name")) ? "selected" : ""; ?> >Kid name</option>-->
                                                    <!--<option value="order_number" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_number")) ? "selected" : ""; ?> >Order number</option>-->
                                                    <!--<option value="order_date" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_date")) ? "selected" : ""; ?> >Order date</option>-->
                                                </select>
                                                <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                                                <button type="submit" class="btn btn-sm btn-info">Search</button>
                                                <a href="<?= HTTP_ROOT; ?>appadmins/mspPreviousWorkList" class="btn btn-sm btn-primary">See All</a>
                                            </div>
                                            <?= $this->Form->end() ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th style="width:50px;">Client Name</th>
                                    <th>Kids Name</th>
                                    <th>Gender</th>
                                    <th>Order Date</th>
                                    <th>Customer Email</th>
                                    <th>Fit Number</th>
                                    <th>List of product added</th>
                                    <th>Product finalized or not</th>

                                    <th>Transaction Number Box Order</th>
                                    <th>Transaction Number Checkout Order</th>
                                    <th>Refund Transaction Number</th>

                                    <th>Refund Amount</th>
                                    <th>USPS TRACKING</th>
                                    <th>RETRUN USPS TRACKING</th>
                                    <th>Inventory checkout</th>
                                    <th>Styling Fees  calculation with refund Box order</th>

                                    <th>Styling Fees</th>
                                    <th>Product Shipped Amount</th>
                                    <th>with adjustment 25% amount</th>
                                    <th>Sales tax</th>
                                    <th>Order Total</th>
                                    <th>Return/Exchange Amount</th>
                                    <th>Lost Amount</th>
                                    <th>Checkout Amount</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($userdetails as $key => $pages) { ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= @$pages->user->user_detail->first_name ?><br><?= @$pages->user->user_detail->last_name ?>&nbsp; <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                        <td><?= (@$pages->kid_id > 0) ? $pages->kid_data->kids_first_name : ''; ?></td>
                                        <td>
                                            <?php
                                            if (@$pages->profile_type == 1) {
                                                echo "Men";
                                            } elseif (@$pages->profile_type == 2) {
                                                echo "Women";
                                            } else {
                                                echo "kid";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo @$pages->created_dt; ?></td>
                                        <td><?= @$pages->user->email ?></td>
                                        <td>
                                            <?php
                                            if ($pages->count == 1) {
                                                $ptype = 'st';
                                            } elseif ($pages->count == 2) {
                                                $ptype = 'nd';
                                            } elseif ($pages->count == 3) {
                                                $ptype = 'rd';
                                            } else {
                                                $ptype = 'th';
                                            }
                                            echo $pages->count . $ptype;
                                            ?>
                                        </td>
                                        <td>

                                            <?php
                                            $fit_d = '';
                                            $pord_d = '';
                                            $keep_s = '';
                                            $upsc_track = '';
                                            $upsc_track_return = '';
                                            $total_product_price = 0;
                                            foreach ($pages->product_list as $ky => $dt) {
                                                $fnz_dt = '';
                                                $user_name = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;
                                                if (!empty($dt->order_usps_tracking_no)) {
                                                    $upsc_track = $dt->order_usps_tracking_no;
                                                }
                                                if (!empty($dt->return_usps_tracking_no)) {
                                                    $upsc_track_return = $dt->return_usps_tracking_no;
                                                }
                                                $user_email = $dt->user->email;
                                                $kid_name = !empty($dt->kid_id) ? $dt->kid_data : '';
                                                $profile_type = $dt->payment_getway->profile_type;
                                                $fit_d = $dt->payment_getway->count;
                                                if ($dt->checkedout == 'Y') {
                                                    if ($dt->keep_status == 3) {
                                                        $keep_s = 'Keep';
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
                                                        . "<td>" . $dt->product_name_one . " ( " . $keep_s . " ) " . "</td>"
                                                        . "<td>" . $dt->checkedout . "</td>"
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

                                            <?php if (!empty($pord_d)) { ?>
                                                <table style="width: 87%;">    
                                                    <tr>
                                                        <th>Product name</th>
                                                        <th>Checkout</th>  
                                                        <th>Date</th>  
                                                        <th>Price</th>    
                                                        <th>Finalize date </th>                                                       
                                                    </tr>
                                                    <?= $pord_d; ?>

                                                </table>
                                            <?php } ?>
                                        </td>
                                        <td>Product finalized or not</td>
                                        <td><?= $pages->transactions_id; ?></td>
                                        <td>Transaction Number Checkout Order</td>
                                        <td>Refund Transaction Number</td>
                                        <td>Refund Amount</td>
                                        <td><?= $upsc_track; ?></td>
                                        <td><?= $upsc_track_return; ?></td>
                                        <td>Inventory checkout</td>
                                        <td>Styling Fees  calculation witd refund Box order</td>
                                        <td><?= $pages->price; ?></td>
                                        <td>Product Shipped Amount</td>
                                        <td>witd adjustment 25% amount</td>
                                        <td>Sales tax</td>
                                        <td>Order Total</td>
                                        <td>Return/Exchange Amount</td>
                                        <td>Lost Amount</td>
                                        <td>Checkout Amount</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>



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
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

</div>
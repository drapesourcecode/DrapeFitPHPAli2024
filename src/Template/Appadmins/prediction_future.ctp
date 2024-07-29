<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('Order Delivery Predictions') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order Delivery Predictions</a></li>
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

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td colspan="10">
                                        <div  class="col-sm-6">

                                        </div>
                                        <div  class="col-sm-6">
                                            <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="start_date" autocomplete="off" required placeholder="Start Date" value="<?= (!empty($_GET['start_date'])) ? $_GET['start_date'] : ""; ?>">
                                                <input type="date"  class="form-control"  name="end_date" autocomplete="off" placeholder="End Date" value="<?= (!empty($_GET['end_date'])) ? $_GET['end_date'] : ""; ?>" required >
                                                <button type="submit" class="btn btn-sm btn-info">Search</button>

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
                                    <th>Rq Date</th>
                                    <th>Order Date</th>
                                    <th>Customer Email</th>
                                    <th>Fit Number</th>
                                    <th>Action</th>

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
                                        <td><?php echo!empty($pages->delivery_dtl) ? $pages->delivery_dtl->date_in_time : '' ?></td>
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
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/matching/' . @$pages->id; ?>" data-placement="top"  class="btn btn-info" >Matching</a>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/browse_products/' . @$pages->id; ?>" class="btn btn-info" title='Browse all products' > Browse All</a>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <?php/*
                        echo $this->Paginator->counter('Page {{page}} of {{pages}}, Showing {{current}} records out of {{count}} total');
//                        echo $this->Paginator->counter(
//    'Page {{page}} of {{pages}}, showing {{current}} records out of
//     {{count}} total, starting on record {{start}}, ending on {{end}}'
//);
                        echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;display: inline-block;width: 100%;float: left;'>";
                        echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                        echo $this->Paginator->numbers(array('first' => 3, 'last' => 3, 'separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                        echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                        echo "</div></ul>";*/
                        ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

</div>
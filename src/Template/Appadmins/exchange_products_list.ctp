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
            <?= __('Exchange Order listing') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Exchange Order listing</a></li>
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
                                    <th style="display: none"></th>

                                    <?php if (in_array($type, [1, 3])) { ?>

                                <script>
                                    $('#example').DataTable({
                                        "order": [[0, "desc"]]
                                    });
                                </script>

                                <th>Full Name </th>
                                <th>Rq Date</th>
                                <th>Gender</th>
                                <th>Fit number</th>
                                <th>Order date</th>
                                <th>Order<br>number</th>

                                <th>Action</th>
                            <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($userdetails as $pages):
                                    // pj($pages);
                                    ?>
                                    <?php
                                    //echo $pages->user_id;
                                    //echo $pages->kid_id;
                                    $emailpstatus = $this->Custom->emailperference($pages->user_id, $pages->kid_id);
                                    ?>

                                    <tr>
                                        <?php if (in_array($type, [1, 3])) { ?>

                                            <td style="display: none"><?= h($pages->created_dt) ?></td>

                                            <td><?= h(@$pages->user->user_detail->first_name) ?>&nbsp;<?= h(@$pages->user->user_detail->last_name) ?>&nbsp; <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                            <td><?php echo $this->Custom->requestDate($pages->delivery_id) ?></td>
                                            <td><?php
                                                if (@$pages->profile_type == 1) {
                                                    echo "Men";
                                                } elseif (@$pages->profile_type == 2) {
                                                    echo "Women";
                                                } else {
                                                    echo "kid";
                                                }
                                                ?> </td>
                                            <td><?php
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
                                                ?></td>

                                            <td><?php echo @$pages->created_dt; ?> </td>
                                            <td><?php echo ' #DFPYMID' . $pages->id; ?> </td>





                                            <td>


                                                <?php
                                                if (@$pages->profile_type == 2) {
                                                    ?>
                                                    <a href="<?= HTTP_ROOT; ?>appadmins/addproduct/<?= $pages->id; ?>" data-placement="top" data-hint="view profile" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;">Check Product Page</a>

                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>


                                                    <?php
                                                } elseif (@$pages->profile_type == 1) {
                                                    ?>
                                                    <a href="<?= HTTP_ROOT; ?>appadmins/addproduct/<?= $pages->id; ?>" data-placement="top" data-hint="view profile" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;">Check Product Page</a>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>


                                                    <?php
                                                }
                                                ?>

                                                <?php if (@$pages->user->kids_detail->id && @$pages->profile_type == 3) { ?>

                                                    <a href="<?= HTTP_ROOT; ?>appadmins/addkid-profile/<?= $pages->id; ?>" data-placement="top" data-hint="view profile" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;">Check Product Page</a>

                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'kidProfile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Kid profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                <?php } ?>

                                            </td>
                                        <?php } ?>
                                    </tr>

                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                                <!---->
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">

    function getUpdate(id) {
        var emp_id = $('#employee-' + id).val();
        $.ajax({
            type: "POST",
            url: "employee_assigned", // PAGE WHERE WE WILL PASS THE DATA /
            data: {emp_id: emp_id, id: id}, // THE DATA WE WILL BE PASSING /
            success: function (result) {
                $('#formDiv').show().html('<div class="alert alert-success" id="s"  style="display: block; position: fixed; z-index: 1111; right: 0px; border-radius: 0px; top: 0px; border: none;">' + result + '</div>');
            }
        });
    }
    $('#formDiv').click(function () {
        $('#formDiv').hide();
    });
    function getUpdate1(id) {
        var emp_id = $('#employee_kid-' + id).val();
        var paymentId = $('#payment-' + id).val();

        $.ajax({
            type: "POST",
            url: "employee_assigned_kid", //PAGE WHERE WE WILL PASS THE DATA /
            data: {emp_id: emp_id, id: id, payment_id: paymentId}, // THE DATA WE WILL BE PASSING /
            success: function (result) { //GET THE TO BE RETURNED DATA /
                $('#formDiv').show().html('<div class="alert alert-success" id="s"  style="display: block; position: fixed; z-index: 1111; right: 0px; border-radius: 0px; top: 0px; border: none;">' + result + '</div>');
            }
        });
    }
</script>
<script>
    $("form#idForm").on("submit", function (event) {
        event.preventDefault();
        //console.log($(this).serialize());
        var id = $('#documentID').val();
        // var words = id.split('-');
        var loaderData = "<span><img src='<?php echo HTTP_ROOT . 'images/payment-loader.gif' ?>'/></span>";
        $('#formDiv').html(loaderData);
        if (id) {
            var url = "<?php echo HTTP_ROOT . "appadmins/view_users/" ?>" + id;
            window.open(url, '_self');
        }

    });
</script>
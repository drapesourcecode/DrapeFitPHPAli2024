<?php

use Cake\ORM\TableRegistry;
?>
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
            <?= __('Customer list who not paid ') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <script>
        $('#example').DataTable({
            "order": [[0, "desc"]]
        });
    </script>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'customerNonePaidpdf'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'customerReports'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th style="display: none"></th>
                                    <th>Full Name </th>
                                    <th>Email</th>
                                    <?php if ($type == "1") { ?>
                                        <th>Asign Customer Stylist</th>
                                    <?php } ?>
                                    <th>Create Date</th> 
                                    <th>Kids Name</th> 
                                    <th>Gender</th>         
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                //pj($userdetails);
                                if ($type == "1") {


                                    foreach ($userdetails as $user) {
                                        //check if paid once or not 
                                        $getPaidStatus = $this->Custom->ChcckPaid($user->id);
                                        if ($getPaidStatus != $user->id) {
                                            ?>
                                            <tr>
                                                <td style="display: none"><?php echo $user->created_dt; ?></td>
                                                <td><?php echo $this->Custom->UserName($user->id); ?> &nbsp; <?= (@$user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td>
                                                    <select data-hint="Assign Stylist" class="form-control" onchange="getstyleUpdate(<?php echo $user->id; ?>)" id="employee_kid-<?php echo @$user->id; ?>">
                                                        <option value="">--Assign Stylist--</option>
                                                        <?php foreach ($employee as $emp): ?>
                                                            <option  <?php if ($this->User->getStylistId(@$user->id) == $emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo @$emp->name; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td><?php echo @$user->created_dt; ?></td>
                                                <td></td>
                                                <td><?php
                                                    if ($this->Custom->UserGender($user->id) == 1) {
                                                        echo "Men";
                                                    } elseif ($this->Custom->UserGender($user->id) == 2) {
                                                        echo "Women";
                                                    } elseif ($this->Custom->UserGender($user->id) == 3) {
                                                        echo "Kid";
                                                    }
                                                    ?> </td>
                                                <td>                                                                                     





                                                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review_users', @$user->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php echo $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email_customer', @$user->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']);
                                                    ?>
                                                    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deletecusprofile', @$user->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;', 'confirm' => 'Are you sure you want to delete  ?']); ?>
                                                </td>

                                            </tr>

                                            <?php
                                        }

                                        // kids is have own 
                                        $checkKidDetails = $this->Custom->havingKid($user->id);
                                        if ($checkKidDetails != 0) {
                                            $visitordata1 = TableRegistry::get('kids_details');
                                            $dataListing = $visitordata1->find()->where(['user_id' => $user->id]);
                                            foreach ($dataListing as $list) {
                                                $checkPaidDetails = $this->Custom->ChcckPaidKid($list->id);
                                                //echo "<br>";
                                                //echo $list->id.'----'.$checkPaidDetails; 

                                                if ($checkPaidDetails != $list->id) {
                                                    if ($list->kid_count == 1) {
                                                        $chlid_name = "First child";
                                                    }
                                                    if ($list->kid_count == 2) {
                                                        $chlid_name = "Second child";
                                                    }
                                                    if ($list->kid_count == 3) {
                                                        $chlid_name = "Thrd child";
                                                    }
                                                    if ($list->kid_count == 4) {
                                                        $chlid_name = "Fourth child";
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td style="display: none"><?php echo $list->created_dt; ?></td>
                                                        <td><?php echo $this->Custom->UserName($list->user_id); ?>  &nbsp; <?= (@$user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                                        <td><?php echo $user->email; ?></td>
                                                        <td>
                                                            <select data-hint="Assign Stylist" class="form-control" onchange="getstyleUpdateKid(<?php echo $list->user_id; ?>,<?php echo $list->id; ?>)" id="employee_kid-<?php echo $list->id; ?>">
                                                                <option value="">--Assign Stylist--</option>
                                                                <?php foreach ($employee as $emp): ?>
                                                                    <option  <?php if ($this->User->getStylistIdKid(@$list->id) == $emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo @$emp->name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </td>
                                                        <td><?php echo $list->created_dt; ?></td>
                                                        <td>
                                                            <span><a title='view the <?php echo $chlid_name ?> profile 'href='<?php echo HTTP_ROOT . 'appadmins/customerKidProfile/' . $list->id; ?>'><?php
                                                                    if ($list->kids_first_name == '') {
                                                                        echo $chlid_name;
                                                                    } else {
                                                                        echo $list->kids_first_name;
                                                                    }
                                                                    ?></span></a><br>
                                                        </td>
                                                        <td><?php echo "kid"; ?> </td>
                                                        <td> <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'customerKidProfile', @$list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                            <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email_customer', $user->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deletecusprofile', $user->id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;', 'confirm' => 'Are you sure you want to delete  ?']); ?>
                                                        </td>

                                                    </tr>

                                                    <?php
                                                }
                                            }
                                        }
                                        $i++;
                                    }
                                } else {
                                    foreach ($userdetails as $user) {
                                        if ($user->kid_id != '') {
                                            $checkPaidDetailsKid = $this->Custom->ChcckPaidKid($user->kid_id);
                                            //echo $checkPaidDetailsKid.'--'.$user->kid_id.'k,';
                                            //echo "<br>";
                                            if ($checkPaidDetailsKid != $user->kid_id) {
                                                ?>
                                                <tr>
                                                    <td style="display: none"><?php echo @$user->id; ?></td>
                                                    <td><?php echo $this->Custom->UserName(@$user->user_id); ?> &nbsp; <?= (@$user->user->is_influencer == 1) ? '[Influencer]' : ""; ?> </td>

                                                    <td><?php echo $this->Custom->email(@$user->user_id); ?></td>
                                                    <td><?php
                                if ($user->kid_id != 0) {
                                    echo $this->Custom->userCreatedKid(@$user->kid_id);
                                } else {
                                    echo $this->Custom->userCreated(@$user->user_id);
                                }
                                                ?></td>
                                                    <td><?php
                                        if (@$user->kid_id != 0) {
                                            echo $this->Custom->kidName(@$user->kid_id);
                                        }
                                                ?></td>
                                                    <td>
                                                        <?php
                                                        $gender = $this->Custom->UserGender(@$user->user_id);
                                                        if (@$user->kid_id != 0) {
                                                            echo "Kid";
                                                        } else {
                                                            if ($gender == 1) {
                                                                echo "Men";
                                                            } elseif ($gender == 2) {
                                                                echo "Women";
                                                            } elseif ($gender == 3) {
                                                                echo "Kid";
                                                            }
                                                        }
                                                        ?> </td>
                                                    <td> 
                                                        <?php if (@$user->kid_id != 0) { ?>
                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'customerKidProfile', @$user->kid_id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?php } else { ?>  

                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review_users', @$user->user_id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?php } ?>

                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email_users', @$user->user_id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            $checkPaidDetails = $this->Custom->ChcckPaid($user->user_id);
                                            //echo $checkPaidDetails.'--'.$user->user_id.'u,';
                                            // echo "<br>";
                                            if ($checkPaidDetails != $user->user_id) {
                                                ?>
                                                <tr>
                                                    <td style="display: none"><?php echo @$user->id; ?></td>
                                                    <td><?php echo $this->Custom->UserName(@$user->user_id); ?> &nbsp; <?= (@$user->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>

                                                    <td><?php echo $this->Custom->email(@$user->user_id); ?></td>
                                                    <td><?php
                                if ($user->kid_id != 0) {
                                    echo $this->Custom->userCreatedKid(@$user->kid_id);
                                } else {
                                    echo $this->Custom->userCreated(@$user->user_id);
                                }
                                                ?></td>
                                                    <td><?php
                                                        if (@$user->kid_id != 0) {
                                                            echo $this->Custom->kidName(@$user->kid_id);
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <?php
                                                        $gender = $this->Custom->UserGender(@$user->user_id);
                                                        if (@$user->kid_id != 0) {
                                                            echo "Kid";
                                                        } else {
                                                            if ($gender == 1) {
                                                                echo "Men";
                                                            } elseif ($gender == 2) {
                                                                echo "Women";
                                                            }
                                                        }
                                                        ?> </td>
                                                    <td> 
                                                        <?php if (@$user->kid_id != 0) { ?>
                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'customerKidProfile', @$user->kid_id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?php } else { ?>  

                                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review_users', @$user->user_id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                        <?php } ?>

                                                        <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email_users', @$user->user_id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    </td>

                                                </tr>

                <?php
            }
        }
        ?>

                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                                <!----> 
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
    function getstyleUpdate(uid) {
        var emp_id = $('#employee_kid-' + uid).val();
        $.ajax({
            type: "POST",
            url: "employee_assigned_user", //PAGE WHERE WE WILL PASS THE DATA /
            data: {emp_id: emp_id, uid: uid}, // THE DATA WE WILL BE PASSING /
            success: function (result) { //GET THE TO BE RETURNED DATA /
                $('#formDiv').show().html('<div class="alert alert-success" id="s"  style="display: block; position: fixed; z-index: 1111; right: 0px; border-radius: 0px; top: 0px; border: none;">' + result + '</div>');
            }
        });
    }
    function getstyleUpdateKid(uid, kid) {
        var emp_id = $('#employee_kid-' + kid).val();
        $.ajax({
            type: "POST",
            url: "employee_assigned_user_kid", //PAGE WHERE WE WILL PASS THE DATA /
            data: {emp_id: emp_id, kid: kid, uid: uid}, // THE DATA WE WILL BE PASSING /
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
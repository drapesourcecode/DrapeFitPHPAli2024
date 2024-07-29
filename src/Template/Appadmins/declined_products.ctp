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
            <?= __('Declined Order listing') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Declined Order listing</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                            <div class="col-xs-12" id="formDiv">
                            </div>
                            <div class="row">
                            <div class="col-xs-12">
                                <a href="<?=HTTP_ROOT;?>appadmins/declined_products" class="btn btn-info">See All</a>
                            
                            </div>
                            </div>
                        </div>
                        
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th style="display: none"></th>

                                    <?php if ($type != 3) { ?>

                                <script>
                                    $('#example').DataTable({
                                        "order": [[0, "desc"]]
                                    });
                                </script>

                                <th>Full Name </th>
                                <th>Kid Name</th>
                                <th>Email</th>
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
                                        <?php if ($type != 3) { ?>

                                            <td style="display: none"><?= h($pages->created_dt) ?></td>

                                            <td><?= h(@$pages->user->user_detail->first_name) ?>&nbsp;<?= h(@$pages->user->user_detail->last_name) ?>&nbsp; <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                            <td><?= !empty(@$pages->kid_id)?($pages->kid_dtl->kids_first_name) : ""; ?></td>
                                            <td><?= h(@$pages->user->email) ?></td>
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
                                                    <a href="<?= HTTP_ROOT; ?>appadmins/view_declined_products/<?= $pages->id; ?>" data-placement="top" data-hint="view profile" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;">View Product</a>

                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>


                                                    <?php
                                                } elseif (@$pages->profile_type == 1) {
                                                    ?>
                                                    <a href="<?= HTTP_ROOT; ?>appadmins/view_declined_products/<?= $pages->id; ?>" data-placement="top" data-hint="view profile" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;">View Product</a>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>


                                                    <?php
                                                }
                                                ?>

                                                <?php
                                               
                                                
                                                if (@$pages->kid_dtl->id && (@$pages->profile_type == 3) ) { ?>

                                                    <a href="<?= HTTP_ROOT; ?>appadmins/view_declined_products/<?= $pages->id; ?>" data-placement="top" data-hint="view profile" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;">View Product</a>
                                                    

                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'kidProfile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Kid profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                <?php } ?>
                                                    <a href="<?= HTTP_ROOT; ?>appadmins/add-email-customer/<?= $pages->user_id; ?>" data-placement="top" data-hint="Send Email" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;">Email</a>
                                                    <a href="<?= HTTP_ROOT; ?>appadmins/add-sms-customer/<?= $pages->id; ?>" data-placement="top" data-hint="Send sms" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;">SMS</a>
                                                     <button  data-placement="top" data-hint="Add Comment" class="btn btn-primary  hint--top  hint" style="padding: 0 12px!important;"  onclick="openCmt(<?= $pages->id; ?>)" >Comment</button>

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
function openCmt(payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getDeclinedComment",
            data: {
                payment_id: payment_id
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
            url: "<?= HTTP_ROOT; ?>appadmins/getDeclinedComment",
            data: {
                payment_id: payment_id
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
        let id = $('#id').val();
        let url = "<?= HTTP_ROOT; ?>appadmins/postDeclinedComment";
        let data = {
            payment_id: payment_id,
            comment: cmt
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


    function deleteComment(commentId) {

        if (confirm("Are you sure you want to delete this comment?")) {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>appadmins/deleteDeclinedComment/" + commentId,
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
    
    function editComment(commentId) {
      console.log('commentId:',commentId);
    $.ajax({
        type: "POST",
        url: "<?=HTTP_ROOT;?>appadmins/editDeclinedComment",
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

    function resetModalFields() {
        $('#cmt_payment_id').val('');
        $('#cmt_detail').val('');
        $('#id').val('');
    }

    function closeCmtModal() {
        $('#comment_modal').modal('hide');
        resetModalFields();
    }

    $('.modal-footer .btn-default').click(function() {
        closeCmtModal();
    });
</script>
<div id="comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

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
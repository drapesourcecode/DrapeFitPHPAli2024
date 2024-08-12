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
            <?= __('Customer Return List') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Return listing</a></li>
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
                                        <!--<div  class="col-sm-6">-->
                                        <!--    <?= $this->Form->create('addproduct', array('id' => 'idForm')); ?>-->
                                        <!--    <div class="form-group">-->
                                        <!--        <label for="exampleInputName"> Scan Profile <span style="color: red;">*</span></label>-->
                                        <!--        <input style="height: 35px; width: 300px;font-weight: bold;" id="documentID"  type="text"  name="productValue" autocomplete="off"  onmouseover="this.focus();">-->
                                        <!--    </div>-->
                                        <!--    <?= $this->Form->end() ?>-->
                                        <!--</div>-->
                                        <div  class="col-sm-6">
                                            <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                            <div class="form-group">
                                                <select class="form-control" name="search_for" required>
                                                    <option value="" selected disabled>Select field</option>
                                                    <option value="email" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "email")) ? "selected" : ""; ?> >User email</option>
                                                    <option value="user_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_name")) ? "selected" : ""; ?> >User first name</option>
                                                    <option value="user_last_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "user_last_name")) ? "selected" : ""; ?> >User last name</option>
                                                    <!--<option value="kid_name" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "kid_name")) ? "selected" : ""; ?> >Kid name</option>-->
                                                    <option value="order_number" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_number")) ? "selected" : ""; ?> >Order number</option>
                                                    <option value="order_date" <?= (!empty($_GET['search_for']) && ($_GET['search_for'] == "order_date")) ? "selected" : ""; ?> >Order date</option>
                                                </select>
                                                <input style="height: 35px; width: 250px;font-weight: bold;" type="text"  name="search_data" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['search_data'])) ? $_GET['search_data'] : ""; ?>" required >
                                                <button type="submit" class="btn btn-sm btn-info">Search</button>
                                                <a href="<?= HTTP_ROOT; ?>appadmins/view_users" class="btn btn-sm btn-primary">See All</a>
                                            </div>
                                            <?= $this->Form->end() ?>
                                             <?= $this->Form->create('', array('id' => 'date_search_frm', 'type' => 'GET', "autocomplete" => "off")); ?>
                                                    <div class="form-group">
                                                        <label for="selected_date">Select Date</label>
                                                        <input type="hidden" id="search_for" name="search_for" class="form-control" value="selected_date" required>
                                                        <input style="height: 35px; width: 250px;font-weight: bold;" type="date"  name="selected_date" autocomplete="off" placeholder="search" value="<?= (!empty($_GET['selected_date'])) ? $_GET['selected_date'] : ""; ?>" required >
                                                        
                                                <button type="submit" class="btn btn-sm btn-info">Search</button>
                                                        
                                                    </div>
                                                    <?= $this->Form->end() ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="display:none;">#</th>




                                        <th style="width:50px;">Full Name</th>
                                        <th>Rq Date</th>
                                        <th>Gender</th>
                                        
                                        <th>Kid Name </th>
                                        <th>Fit number</th>
                                        <th>Order date</th>
                                        <th>Order<br>number</th>
                                      

                                        <th>Action </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($new_userdetails as $li_key => $pages):
                                    // pj($pages);
                                    ?>
                                    <?php
                                   
                                    $emailpstatus = $this->Custom->emailperference($pages->user_id, $pages->kid_id);
                                    ?>

                                    <tr>
                                        <td style="display:none;"><?= $li_key/* h($pages->created_dt) */ ?></td>
                                       



                                            <td style="width:50px;"><?= h(@$pages->user->user_detail->first_name) ?><br><?= h(@$pages->user->user_detail->last_name) ?>&nbsp; <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                            <td><?php echo $this->Custom->requestDate($pages->delivery_id) ?></td>
                                            <td><?php
                                    //          echo $pages->user_id;
                                    // echo "-".$pages->kid_id;
                                    // echo "-".$pages->id;
                                                if (@$pages->profile_type == 1) {
                                                    echo "Men";
                                                } elseif (@$pages->profile_type == 2) {
                                                    echo "Women";
                                                } else {
                                                    echo "kid";
                                                }
                                                ?> </td>
                                                <td> <?php
                                                if ($pages->profile_type == 3) {
                                                    echo $this->Custom->kidName($pages->kid_id);
                                                }
                                                ?>
                                            </td>
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
                                           


                                            
                                            
                                            <td style="width: 92px;">
                                                <a class="btn btn-info" href="<?=HTTP_ROOT;?>appadmins/return_product_list/<?=$pages->id;?>">Check return products</a>
                                            </td>


                                       
                                    </tr>

                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                                <!---->
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
</div><!-- /.content-wrapper -->
<style>
    .ellipsis {
        float: left;
    }
    .modal-content {
        background-color: #fefefe !important;
        margin: 9% auto 7% auto;
        border: none;
        width: 85% !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    function getUpdate(id, field, type) {
        var emp_id = $('#' + field + '-' + id).val();
        $.ajax({
            type: "POST",
            url: "employee_assigned", // PAGE WHERE WE WILL PASS THE DATA /
            data: {emp_id: emp_id, id: id, type: type}, // THE DATA WE WILL BE PASSING /
            success: function (result) {
                $('#formDiv').show().html('<div class="alert alert-success" id="s"  style="display: block; position: fixed; z-index: 1111; right: 0px; border-radius: 0px; top: 0px; border: none;">' + result + '</div>');
            }
        });
    }
    $('#formDiv').click(function () {
        $('#formDiv').hide();
    });
    function getUpdate1(id, field, type) {
        var emp_id = $('#' + field + '-' + id).val();
        var paymentId = $('#payment-' + id).val();

        $.ajax({
            type: "POST",
            url: "employee_assigned_kid", //PAGE WHERE WE WILL PASS THE DATA /
            data: {emp_id: emp_id, id: id, payment_id: paymentId, type: type}, // THE DATA WE WILL BE PASSING /
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
    function openCmt(payment_id){
        $('#comment_list').html('');
        $.ajax({
               type: "POST",
               url: "<?=HTTP_ROOT;?>appadmins/getComment",             
               data: {payment_id: payment_id}, 
               dataType:'html',
               success: function (result) { 
                   $('#cmt_payment_id').val(payment_id);
                   $('#comment_list').html(result);
               }
        });
        $('#comment_modal').modal('show');
    }
    function getAllCmt(payment_id){
        $('#comment_list').html('');
        $.ajax({
               type: "POST",
               url: "<?=HTTP_ROOT;?>appadmins/getComment",             
               data: {payment_id: payment_id}, 
               dataType:'html',
               success: function (result) { 
                   $('#cmt_payment_id').val(payment_id);
                   $('#comment_list').html(result);
               }
        });
    }
   function postCmt() {
    let cmt = $('#cmt_detail').val();
    let payment_id = $('#cmt_payment_id').val();
    let id = $('#id').val(); 
    let url = "<?=HTTP_ROOT;?>appadmins/postComment";
    let data = { payment_id: payment_id, comment: cmt };
    
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
            dataType:'JSON',
            success: function (result) { 
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
            url: "<?=HTTP_ROOT;?>appadmins/deleteComment/" + commentId, 
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
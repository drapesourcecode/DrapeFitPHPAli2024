<div class="content-wrapper">
    <section class="content-header">
        <h1> Brands Listing </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="<?= h(HTTP_ROOT) ?>appadmins/create_staff">   <i class="fa  fa-user-plus"></i> Create New Staff </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php if (!empty($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "dashboard") { ?>
                        <a href="<?php echo HTTP_ROOT; ?>appadmins/index">  <button class="btn btn-warning" type="submit" style="float: right; margin-top: -4%; margin-right: 20%;"> BACK</button> </a><?php } ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Brands Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th style="width: 10%;text-align: center;">Created</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($adminLists as $admin): ?>
                                    <tr id="<?php echo $admin->id; ?>" class="message_box">
                                        <td><?= h($admin->name) ?></td>
                                        <td><?= h($admin->brand_name) ?></td>
                                        <td><?= h($admin->email) ?></td>
                                        <td><?= h($admin->phone) ?></td>
                                        
                                        <td style="text-align: center;"><?php echo $admin->created_dt; ?></td>
                                        <td style="text-align: center;">
                                            <?php /*echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-fw fa-gg')), ['action' => 'setBrandPassword', $admin->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); */ ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'create_staff', $admin->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $admin->id, 'InUsers'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                            <?php if ($admin->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $admin->id . '/InUsers'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $admin->id . '/InUsers'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>
                                                <?php if($admin->is_collaborated != 1){ ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/create_staff/' . $admin->id . '/collaborate'; ?>"> <?= $this->Form->button('<i class="fa fa-thumbs-up"></i>', ["data-placement" => "top", "data-hint" => "Mark as collaborate", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } ?>
                                                <button type="button" onclick="openCmt(<?= $admin->id; ?>)" class="btn btn-primary" >Comments</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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


 <script>
   function openCmt(admin_id){
    $('#comment_list').html('');
    $('#cmt_payment_id').val(admin_id); 
    $.ajax({
        type: "POST",
        url: "<?=HTTP_ROOT;?>appadmins/getComment",             
        data: {admin_id: admin_id}, 
        dataType:'html',
        success: function (result) { 
            $('#comment_list').html(result);
        }
    });
    $('#comment_modal').modal('show');
}

function getAllCmt(admin_id){
    $('#comment_list').html('');
    $.ajax({
        type: "POST",
        url: "<?=HTTP_ROOT;?>appadmins/getComment",             
        data: {admin_id: admin_id}, 
        dataType:'html',
        success: function (result) { 
            $('#cmt_payment_id').val(admin_id);
            $('#comment_list').html(result);
        }
    });
}

function postCmt() {
    let cmt = $('#cmt_detail').val();
    let admin_id = $('#cmt_payment_id').val();
    let formData = new FormData($('#comment_form')[0]); 
    formData.append('admin_id', admin_id);
    formData.append('comment', cmt);
    let id = $('#id').val();
    let url = id ? "<?=HTTP_ROOT;?>appadmins/postComment/" + id : "<?=HTTP_ROOT;?>appadmins/postComment";
    
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        contentType: false,
        processData: false, 
        dataType: 'JSON',
        success: function(result) {
            $('#cmt_payment_id').val('');
            $('#cmt_detail').val('');
            $('#id').val(''); 
            $('#file_upload').val('');
            $('#comment_list').html(result);
            getAllCmt(admin_id);
        }
    });
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
function isImageFile(filePath) {
   
    const imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    const extension = filePath.split('.').pop().toLowerCase();
    return imageExtensions.includes(extension);
}
function editComment(commentId, commentText, filePath) {
   
    $('#id').val(commentId); 
    $('#cmt_detail').val(commentText); 

    var filePaths = filePath.split(',').map(function(path) {
        return path.trim(); 
    });

   
    console.log('File Paths:', filePaths); 
    
   
    if (Array.isArray(filePaths) && filePaths.length > 0) {
        $('#file_upload_label').text('Existing Files:');
        $('#image_preview').show();

        $('#image_preview').empty();
        for (var i = 0; i < filePaths.length; i++) {
            
            var fileName = filePaths[i].substring(filePaths[i].lastIndexOf('/') + 1);

            $('#image_preview').append('<p>' + fileName + '</p>');
        }
    } else {
        $('#file_upload_label').text('Upload File');
        $('#image_preview').hide();
    }

    $('#file_upload').val(''); 

    $('#comment_modal').modal('show'); 
}




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
              <form id="comment_form" enctype="multipart/form-data">
                  <input type="hidden" id="cmt_payment_id" />
                  <input type="hidden" id="id" />
                  <textarea class="form-control" rows="2" id="cmt_detail"></textarea>
                  <label for="file_upload">Upload File</label> 
                  <input type="file" id="file_upload" name="file_upload[]" multiple />

                  <div id="image_preview"  style="display: none;">
                <img id="preview_image" src="" style="max-width: 10%; max-height: 20px;">
            </div>


                  <button type="button" class="btn btn-success" onclick="postCmt()">Submit</button>
              </form>
          </div>
          <div id="comment_list"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



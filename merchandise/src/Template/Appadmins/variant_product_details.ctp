<div class="content-wrapper">
    <section class="content-header">
        <h1> Manage Variants </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="#">   <i class="fa  fa-user-plus"></i> Manage Variants </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                 
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Name: <b><?= $variant_details->product_name_one;?></b> </h4>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($variant_products_details as $vpd_li): ?>
                                    <tr id="<?php echo $vpd_li->id; ?>" class="message_box">
                                        <td><?= h($vpd_li->color) ?></td>
                                        <td><?= h($vpd_li->size) ?></td>
                                        <td><?= h($vpd_li->quantity) ?></td>
                                        <td><?= h($vpd_li->purchase_price) ?></td>
                                        <td><?= h($vpd_li->sale_price) ?></td>
                                       
                                        <td style="text-align: center;">
                                            <!-- <a href="<?php //echo HTTP_ROOT.'appadmins/generate_product/'.$vpd_li->id;?>">Generate Product</a> -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                        
                        <div class='row'>
                            <div class='col-sm-12'><h4>Photo Gallery</h4></div>
                            
                            <?php 
                                $avl_clor = json_decode($variant_details->color,true); 
                                foreach($avl_clor as $avl_clr){
                                    ?>
                                    <div class='col-sm-6'>
                                        <b>Manage <?=$avl_clr;?> Product Photos</b><hr>
                                        <div class='row'>
                                            <div class='col-sm-12'>
                                                <?= $this->Form->create('',['type'=>'file','url'=>['action'=>'productColorImages']]);?>
                                                    <input type='hidden' name="color" value='<?=$avl_clr;?>' />
                                                    <input type='hidden' name="in_product_variants_id" value='<?= $variant_details->id;?>' />
                                                    <div class="form-group">
                                                        <label>Select Photos</label>
                                                        <input type="file" class="form-control-file" name="photos[]" multiple>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-sm btn-info" type="submit">Upload</button>
                                                    </div>
                                                <?= $this->Form->end();?>
                                            </div><hr>
                                            <?php if(!empty($variant_color_images) && $variant_color_images->count() > 0){
                                                foreach($variant_color_images as $var_img){ 
                                                    if($var_img->color == $avl_clr){
                                                        ?>
                                                            <div class="gallery_product   col-sm-2 filter_hdpe" id="img_<?=$var_img->id;?>">
                                                                <span class="btn-delete btn-sm btn btn-danger" onclick="deleteImage(<?=$var_img->id;?>);"> <i class="fa fa-trash"></i></span>
                                                                <img src="<?=HTTP_ROOT_BASE.$var_img->image;?>" class="img-responsive">
                                                            </div>
                                                        <?php
                                                    }
                                                }
                                            } ?>
                                            
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.filter_hdpe {
   position: relative;
}
.filter_hdpe:hover .btn-delete{
   display: block;
}
.btn-delete {
   position: absolute;
   cursor: pointer;
   right: 2px;
   top: 2px;
   display: none;

   /* This was edited out because it was stupid. See fernholz's answer.
   left: 100%; 
   margin-left: -10px;
   margin-top: 2px; */
}
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
   function deleteImage(id){
       if(confirm('Are you sure want to delete this photo?')){
           $.ajax({
                type: "POST",
                url: "<?=HTTP_ROOT;?>appadmins/deleteVariantPhoto",             
                data: {id: id}, 
                dataType:'json',
                success: function (result) { 
                    //$('#img_'+id).remove();
                },
            });
           $('#img_'+id).remove();
       }
   }
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



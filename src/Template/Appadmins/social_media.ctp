<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
 $(function(){
  var strURL='<?php echo HTTP_ROOT; ?>';
  $("#list").sortable({class:'move',update:function(){
    var order=$('#list').sortable('serialize');
    // alert(order);
    $.post(strURL+"appadmins/socialmediaOrder",order,function(theResponse){
    });
   }
  });
 });
</script>
<?php

  @$param2 = $this->request->params['pass'][1];

?>
<div class="content-wrapper">
 <section class="content-header">
  <h1> Social icon listing</h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active"><a  style="color: red;font-size: 15px;" onclick="$('#manage_banner').slideToggle(1000)" class="active" href="javascript:void(0);"> <i class="fa fa-book"></i><?php echo "Create new  Social icon"; ?></a></li>

  </ol>
 </section>

 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div id="error_msg_date" class="help-block with-errors"></div>
     <div id="manage_banner" class="box box-default"  style="<?php echo ($param2) ? 'border-top: none; display: block;' : 'border-top: none; display: none;'; ?>">
      <div class="box-header with-border1">
       <h3 class="box-title">
        <?php

          echo " Add Social Media";

        ?>
       </h3>
       <div class="box-tools pull-right">
        <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
       </div>
      </div><!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col-xs-12">
         <div class="box box-primary">
          <?= $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'bannerform', 'type' => 'file')); ?>
          <div class="box-body">
           <p style="color: red;">All (*) fields are mandatory</p>
           <div class="col-md-12">
            <div class="col-md-6">
             <div class="form-group">
              <label for="exampleInputFile">Name <span style="color: red;">*</span></label>
              <?php

                if (@$id) {
                 echo $this->Form->input('id', ['type' => 'hidden', 'value' => @$dataEdit->id]);
                }

              ?>
              <?= $this->Form->input('name', ['class' => "form-control", 'label' => false, 'data-error' => 'Please enter social name', 'required' => "required", 'maxlength' => 20, 'value' => @$dataEdit->name]); ?>
              <p style="font-size: 12px;">Note: <span>Name should not be more than 20 char</span>.</p>
              <div class="help-block with-errors"></div>
             </div>
             <div class="form-group">

              
                 <label for="exampleInputFile">Vector<span style="color: red;">*</span></label>
                 <?= $this->Form->input('vector', ['type' => 'text', 'id' => 'vector', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Please enter  Vector text','value' => @$dataEdit->vector ]); ?>
                 <div class="help-block with-errors"></div>
                 <code>Note:&lt;i class="fa fa-facebook-f"&gt;&lt;/i&gt;</code>
               


             </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label for="exampleInputFile">Link<span style="color: red;">*</span></label>
              <?= $this->Form->input('link', ['type' => 'text', 'class' => "form-control", 'label' => false, 'autocomplete' => 'off', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$dataEdit->link, 'data-error' => 'Please enter link']); ?>

              <div class="help-block with-errors"></div>

             </div>
            </div>
           </div>
          </div>
          <div class="box-footer">
           <?= $this->Form->button('Save', ['class' => 'btn btn-success', 'id' => 'add', 'style' => 'margin-left:15px;']) ?>
          </div>
          <?= $this->Form->end() ?>
         </div><!-- /.box -->
        </div>
       </div><!-- /.row -->
      </div><!-- /.box-body -->

     </div>
     <div class="box-header">
      <h3 class="box-title">Social icon Listing</h3>
     </div>

     <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
       <thead>
        <tr>

         <th></th>
         <th>Name</th>
         <th>Icon</th>
         <th>Link</th>
         <th style="text-align: center;">Action</th>
        </tr>
       </thead>
       <tbody id="list">
        <?php foreach ($dataListings as $list): ?>
           <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
            <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /></td>
            <td style="text-align:  left;"> <?php echo $list->name; ?></td>
            <td style="text-align:  left;"><?php echo $list->vector;?></td>
            <td style="text-align:  left;"> <?php echo $list->link; ?></td>
            <td style="text-align: center; width: 20%">
             <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'social_media', $list->id, 'SocialMedia'], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
             <?php if ($list->is_active == 1) { ?>
              <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/SocialMedia'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', [ "data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
             <?php } else { ?>
              <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/SocialMedia'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
             <?php } ?>
             <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'SocialMedia'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
            </td>
           </tr>
          <?php endforeach; ?>
       </tbody>
      </table>
     </div><!-- /.box-body -->
    </div><!-- /.box -->
   </div><!-- /.col -->
  </div><!-- /.row -->
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
 $(document).ready(function(){
  var Url=window.location.href;
  var splitUrl=Url.split('/')[6];
  validateImo(splitUrl);
  return false;
 });
 function validateImo(splitUrl){
  $('#bannerform').validator().on('submit',function(){
   if(splitUrl){
    $(':button[type="submit"]').prop('disabled',false);
   }else{
    $(':button[type="submit"]').prop('disabled',true);

   }
  })
 }

</script>

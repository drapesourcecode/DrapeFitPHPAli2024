
<div class="content-wrapper">
 <section class="content-header">
  <h1> Footer cms listing</h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
 </section>

 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <?php if ($id) { ?>
        <div class="box box-default"  style=" border-top: none; display: block;">
         <div class="box-header with-border1">
          <h3 class="box-title"> Edit <?php echo $row->name; ?></h3>
          <div class="box-tools pull-right">
           <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
          </div>
         </div><!-- /.box-header -->
         <div class="box-body">
          <div class="row">
           <div class="col-xs-12">
            <div class="box box-primary">
             <?= $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'bannerform')); ?>
             <div class="box-body">
              <p style="color: red;">All (*) fields are mandatory</p>
              <div class="col-md-12">
               <div class="col-md-6">
                <div class="form-group">
                 <label for="exampleInputFile">Name <span style="color: red;">*</span></label>
                 <?= $this->Form->input('name', ['class' => "form-control", 'label' => false, 'value' => $row->name, 'data-error' => 'Please enter customer name', 'required' => "required", 'maxlength' => 50]); ?>
                 <?= $this->Form->input('id', ['type' => 'hidden', 'label' => false, 'value' => $row->id, 'required' => "required"]); ?>
                 <p style="font-size: 12px;">Note: <span>Name should not be more than 50 char</span>.</p>
                 <div class="help-block with-errors"></div>
                </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                 <label for="exampleInputFile">Contain<span style="color: red;">*</span></label>
                 <?= $this->Form->input('value', ['type' => 'text', 'class' => "form-control", 'label' => false, 'autocomplete' => 'off', 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Please enter link', 'value' => $row->value]); ?>
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
       <?php } ?>

     <div class="box-header">
      <h3 class="box-title">Footer cms Listing</h3>
     </div>

     <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>Name</th>
         <th>Contain</th>
         <th style="text-align: center;">Action</th>
        </tr>
       </thead>
       <tbody id="list">
        <?php foreach ($dataListings as $list): ?>
<!--           <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
            <td style="text-align:  left;"> <?php echo $list->name; ?></td>

            <td style="text-align:  left;"> <?php echo $list->value; ?></td>
            <td style="text-align: center; width: 20%">
             <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'footer_cms', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
            </td>
           </tr>-->
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

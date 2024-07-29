
<?php echo $this->Html->script(array('ckeditor/ckeditor')); ?>
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>Welcome  text</h1>
  <ol class="breadcrumb">
   <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
 </section>

 <!-- Main content -->
 <section class="content">
  <div class="row">
   <!-- left column -->
   <div class="col-xs-12">
    <!-- general form elements -->
    <div class="box box-info">

     <!-- form start -->
     <?= $this->Form->create($welcomeCms, array('data-toggle' => "validator")) ?>
     <div class="box-body">
      <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputName">Text<span style="color: red;">*</span></label>
        <?= $this->Form->input('title', ['class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Pleae enter text', 'value' => $data->title]); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>
      <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputName">Description<span style="color: red;">*</span></label>
        <?= $this->Form->input('descriptions', ['type' => 'textarea', 'placeholder' => "Please enter description", 'class' => "form-control ckeditor", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Please enter  description', 'value' => $data->descriptions]); ?>
        <!--<div class="help-block with-errors"></div>-->
       </div>
      </div>
      <?= $this->Form->button('Save', ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
     </div>

    </div>
    <?= $this->Form->end() ?>
   </div><!-- /.box -->
  </div><!--/.col (left) -->
  <!-- right column -->

</div>   <!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->


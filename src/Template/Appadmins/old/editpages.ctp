
<?php echo $this->Html->script(array('ckeditor/ckeditor')); ?>
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
   <?php echo ($id != '') ? "Edit page" : "Add page"; ?>

  </h1>
  <ol class="breadcrumb">
   <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active"><a href="<?= h(HTTP_ROOT) ?>appadmins/cms_page"> <?= __('Page listing') ?></a></li>
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
     <?= $this->Form->create(null, array('data-toggle' => "validator")) ?>
     <div class="box-body">
      <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputName">Title</label>
        <?= $this->Form->input('page_title', ['value' => $row->page_title, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter page title']); ?>
        <?= $this->Form->input('id', ['value' => $row->id, 'type' => 'hidden']); ?>
        <div class="help-block with-errors"></div>
       </div>

      </div>

      <div class="col-xs-12">
      </div>
      <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputName">Page contain</label>
        <?= $this->Form->input('description', ['value' => $row->description,'type' => 'textarea', 'class' => "form-control ckeditor", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter page description']); ?>
        <!--<div class="help-block with-errors"></div>-->
       </div>
      </div>

      <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputMetatitle">Meta title</label>
        <?= $this->Form->input('meta_title', ['value' => $row->meta_title, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta title']); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>
      <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputMetaKeyword">Meta keyword</label>
        <?= $this->Form->input('meta_keyword', ['value' => $row->meta_keyword, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta keyword']); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>
      <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputMetadescription">Meta description</label>
        <?= $this->Form->input('meta_description', ['value' => $row->meta_description, 'class' => "form-control ", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta description']); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>
     </div><!-- /.box-body -->

     <div class="box-footer">
      <?= $this->Form->button('Update Page', ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
     </div>
     <?= $this->Form->end() ?>
    </div><!-- /.box -->
   </div><!--/.col (left) -->
   <!-- right column -->

  </div>   <!-- /.row -->
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->


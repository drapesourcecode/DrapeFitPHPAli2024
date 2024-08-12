
<?php echo $this->Html->script(array('ckeditor/ckeditor')); ?>
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
   Email:<?= $usersDetails->email ?>

  </h1>
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
     <?= $this->Form->create(null, array('data-toggle' => "validator")) ?>
     <div class="box-body">
      
  <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputName">Subject</label>
        
        <?= $this->Form->input('subject', ['value' => '','type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter subject']); ?>
         
        
        <!--<div class="help-block with-errors"></div>-->
       </div>
      </div>
     
      <div class="col-xs-12">
       <div class="form-group">
        <label for="exampleInputName">Email</label>
        
        <?= $this->Form->input('contain', ['value' => @$row->catelog,'type' => 'textarea', 'class' => "form-control ckeditor", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter catelog']); ?>
         <?= $this->Form->input('userEmail', ['value' => $usersDetails->email,'type' => 'hidden', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
        
        <!--<div class="help-block with-errors"></div>-->
       </div>
      </div>
     </div>

     <div class="box-footer">
      <?= $this->Form->button('Send Email', ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
     </div>
     <?= $this->Form->end() ?>
    </div><!-- /.box -->
   </div><!--/.col (left) -->
   <!-- right column -->

  </div>   <!-- /.row -->
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->


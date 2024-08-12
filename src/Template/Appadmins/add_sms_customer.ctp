

<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
   SMS:<?= $phone; ?>

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
        <label for="exampleInputName">SMS</label>
        
        <?= $this->Form->input('message', ['value' => '','type' => 'textarea', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter message']); ?>
         <?= $this->Form->input('phone', ['value' => $phone,'type' => 'hidden', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
        
        <!--<div class="help-block with-errors"></div>-->
       </div>
      </div>
     </div>

     <div class="box-footer">
      <?= $this->Form->button('Send sms', ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
     </div>
     <?= $this->Form->end() ?>
    </div><!-- /.box -->
   </div><!--/.col (left) -->
   <!-- right column -->

  </div>   <!-- /.row -->
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->


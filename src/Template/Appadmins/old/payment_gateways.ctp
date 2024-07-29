<style>

 .btn-success.active {
  color: #fff;
  background-color: #449d44;
  border-color: #398439
 }
</style>

<div class="content-wrapper">
 <section class="content-header">
  <h1>
   <?php

     echo "Edit payment information";

   ?>
  </h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
 </section>
 <!-- Main content -->
 <section class="content">
  <div class="row">
   <!-- left column -->
   <div class="col-xs-12">
    <div class="box box-primary">

     <?= $this->Form->create(@$enity, array('data-toggle' => "validator")); ?>
     <div class="box-body">
      <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
      <div class="col-md-6" style="margin-top: 27px;">
       <div class="form-group">
        <label for="exampleInputName">Merchant id <span style="color: red;">*</span></label>
        <?= $this->Form->input('merchant_id', ['type' => "text", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$row->merchant_id, 'data-error' => 'Please enter merchant id']); ?>
        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$row->id]); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>
      <div class="col-md-6">
       <div class="form-group">
        <label for="exampleInputEmail">Acquirer Id <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
        <?= $this->Form->input('acquirer_id', [ 'type' => "text", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$row->acquirer_id, 'required' => "required", 'data-error' => 'Please enter acquirer Id']); ?>
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
       </div>
      </div>
      <div class="col-md-6">
       <div class="form-group">
        <label for="exampleInputEmail">Password<span style="color: red;">*</span></label>
        <?= $this->Form->input('password', ['type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter enter password', 'value' => @$row->password]); ?>
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
       </div>

      </div>

      <div class="col-md-6">
       <div class="form-group">
        <label for="exampleInputName">Test password <span style="color: red;">*</span></label>
        <?= $this->Form->input('test_password', ['type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Please enter test password', 'value' => @$row->test_password]); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>

      <div class="col-md-6">
       <div class="form-group">
        <label for="exampleInputEmail">Payment Mode<span style="color: red;">*</span></label><br/>
        <input type='checkbox' name='checkbox3' value='1' <?php if ($row->mode == 1) { ?>checked="checked"<?php } ?> />
       </div>
      </div>
     </div>
     <div class="box-footer">
      <?php

        echo $this->Form->button('Update', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);

      ?>
     </div>
     <?= $this->Form->end() ?>
    </div>
   </div>
  </div>
 </section>
</div>
<script src="<?php echo HTTP_ROOT ?>js/bootstrap-switch.js" ></script>
<script>
 $("[name='checkbox3']").bootstrapSwitch({
  on:'Live Mode',
  off:'Test Mode',
  onClass:'success',
  offClass:'warning'
 });
</script>

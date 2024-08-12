<div class="content-wrapper">
 <section class="content-header">
  <h1>
   <?php

     echo "Set Password";

   ?>
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
    <div class="box box-primary">

     <?= $this->Form->create($passwordData, array('data-toggle' => "validator")); ?>
     <div class="box-body">
      <p class="note">All (*) fields are mandatory</p>
      <div class="col-md-6">
       <div class="form-group">

        <label for="exampleInputEmail">Email<span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

        <?= $this->Form->input('email', ['placeholder' => "Enter email", 'onblur' => 'checkEmailAvail(this.value)', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => $setPassword->email, 'required' => "required", 'disabled' => 'disabled', 'data-error' => 'Enter Email id']); ?>

        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
       </div>
      </div>

      <br clear="all" />

      <div class="col-md-6">
       <div class="form-group">
        <label for="exampleInputEmail">New Password <span style="color: red;">*</span> <span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => $setPassword->id]); ?>
        <?= $this->Form->input('password', ['placeholder' => "Enter New password", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter New password']); ?>
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
       </div>

      </div>
      <div class="col-md-6">
       <div class="form-group">
        <label for="exampleInputEmail">Confirm Password <span style="color: red;">*</span> <span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
        <?= $this->Form->input('cpassword', ['placeholder' => "Enter confirm password", 'type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter confirm password']); ?>
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
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
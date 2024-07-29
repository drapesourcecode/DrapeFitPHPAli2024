<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">      
             <?= $this->Flash->render() ?>
            <?php echo $this->Form->create('changepassword', array('id' => 'change_password', 'data-toggle' => "validator",'class'=>"login100-form validate-form")) ?>
                <span class="login100-form-title">
                    Change Password
                </span>   
               <?= $this->Flash->render() ?>
                <div class="wrap-input100 validate-input">                   
                     <?= $this->Form->input('New Password', ['type' => 'password', 'class' => 'input100', 'required' => 'required','id' => "New_Password",'name'=>'New_Password']) ?>
                     <div class="help-block with-errors"></div>                 
                </div> 
                <div class="wrap-input100 validate-input">                   
                     <?= $this->Form->input('Confirm Password', ['type' => 'password', 'class' => 'input100', 'required' => 'required','id' => "Confirm_Password",'name'=>'Confirm_Password']) ?>
                     <?php echo $this->Form->input('uniq', array('type' => 'hidden', 'label' => false, 'div' => false, 'id' => "confirm_password", 'value' => $uniq)); ?>
                    <div class="help-block with-errors"></div>                 
                </div> 
                <div class="container-login100-form-btn">
                    <!--<input class="login100-form-btn" type="submit" value="Login">-->
                    <?php echo $this->Form->submit('Change Password', ['type' => 'submit', 'class' => "login100-form-btn"]) ?>
                    

                </div>               
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<script src="<?php echo HTTP_ROOT ?>assets/js/popper.js"></script>
<script src="<?php echo HTTP_ROOT?>assets/js/tilt.jquery.min.js"></script>
<script type="text/javascript">
$('.js-tilt').tilt({scale:1.1})
</script>
<script type="text/javascript">

//    jQuery.validator.setDefaults({
//        submitHandler: function () {
//            var formData = $('#change_password').serialize();
//
//            jQuery.post(pageurl + 'users/change-password', formData, function (response) {
//                if (response.status === 'success') {
//                    window.location.href = pageurl.'login';
//                } else if (response.status === 'error') {
//                    //$('#' + response.field + '-error').text(response.msg).show();
//                }
//            }, 'json');
//            return false;
//        }
//    });

   $(function(){$("#change_password").validate({rules:{password:{required:true,minlength:5},confirm_password:{required:true,minlength:5,equalTo:"#password"}},messages:{password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long"},confirm_password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long",equalTo:"Please enter the same password as above"},}});});

</script>
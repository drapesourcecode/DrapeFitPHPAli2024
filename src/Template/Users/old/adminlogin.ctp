<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
           <?php echo $this->Form->create("User", array('class'=>"login100-form validate-form",'data-toggle' => "validator",'id'=>'loginform')) ?>
                <span class="login100-form-title">
                   Admin Login
                </span>
                <?= $this->Flash->render() ?>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <!--<input class="input100" type="text" name="email" placeholder="Email">-->
                     <?= $this->Form->input('email', ['type' => 'email', 'class' => 'input100', 'id'=>'email','data-error' => 'Please Enter email','kl_virtual_keyboard_secure_input' => "on"]) ?>
                     <div class="help-block with-errors"></div>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100" style="height:60%;">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <!--<input class="input100" type="password" name="password" placeholder="Password">-->
                    <?= $this->Form->input('password', ['type' => 'password', 'class' => 'input100','id'=>'password','data-error' => 'Enter password']) ?>
                     <div class="help-block with-errors"></div>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100" style="height:60%;">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <!--<input class="login100-form-btn" type="submit" value="Login">-->
                     <?= $this->Form->submit('LOGIN', ['type' => 'submit', 'class' => 'login100-form-btn']) ?>

                </div>

                
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<script src="<?php echo HTTP_ROOT ?>assets/js/popper.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script type="text/javascript">
$('.js-tilt').tilt({scale:1.1})
</script>
<script type="text/javascript">
$("#loginform").validate({rules:{email:{required:true,email:true},password:{required:true}}});
</script>
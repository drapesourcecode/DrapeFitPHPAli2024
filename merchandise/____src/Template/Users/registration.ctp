<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <?php echo $this->Form->create("User", array('class' => "login100-form validate-form", 'data-toggle' => "validator", 'id' => 'loginform')) ?>
            <span class="login100-form-title">
                Sign Up
            </span>
            <?= $this->Flash->render() ?>
            <div class="wrap-input100 validate-input">
                <?= $this->Form->input('first_name', ['type' => 'text', 'label' => "First Name *", 'class' => 'input100', 'id' => 'first_name', 'data-error' => 'Please enter first name', 'kl_virtual_keyboard_secure_input' => "on"]) ?>
            </div>
            <div class="wrap-input100 validate-input">
                <?= $this->Form->input('last_name', ['type' => 'text','label' => "Last Name *", 'class' => 'input100', 'id' => 'last_name', 'data-error' => 'Please enter last name', 'kl_virtual_keyboard_secure_input' => "on"]) ?>
            </div>            
            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <?= $this->Form->input('email', ['type' => 'email','label' => "Email *", 'class' => 'input100', 'id' => 'email', 'data-error' => 'Please enter email', 'kl_virtual_keyboard_secure_input' => "on"]) ?>
                <div class="help-block with-errors"></div>
                <span class="focus-input100"></span>
                <span class="symbol-input100" style="height:60%;">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input">
                <?= $this->Form->input('password', ['type' => 'password','label' => "Password *", 'class' => 'input100', 'id' => 'password', 'data-error' => 'Please enter password', 'kl_virtual_keyboard_secure_input' => "on"]) ?>
            </div>
            <div class="wrap-input100 validate-input">
                <?= $this->Form->input('confirm_password', ['type' => 'password', 'class' => 'input100', 'id' => 'confirm_password', 'data-error' => 'Please enter Confirm password', 'kl_virtual_keyboard_secure_input' => "on"]) ?>
            </div>
            <div class="wrap-input100 validate-input">
                <?= $this->Form->input('phone', ['type' => 'text','label' => "Phone *", 'class' => 'input100', 'id' => 'phone', 'data-error' => 'Please enter phone number', 'kl_virtual_keyboard_secure_input' => "on"]) ?>
            </div>
            <div class="wrap-input100 validate-input">
                <?= $this->Form->input('brand_name', ['type' => 'text','label' => "Brand Name *", 'class' => 'input100', 'id' => 'brand_name', 'data-error' => 'Please enter brand name', 'kl_virtual_keyboard_secure_input' => "on"]) ?>
            </div>
            <div class="wrap-input100 validate-input">
                <?= $this->Form->input('address', ['type' => 'text', 'class' => 'input100', 'id' => 'address', 'kl_virtual_keyboard_secure_input' => "on"]) ?>
            </div>
            <div class="wrap-input100 validate-input">
                <p>
                    <input type="checkbox" name="chk" id="chk" value="accepted" required="" aria-required="true">  
                    By continuing, you accept <a target="_blank" href="https://drapefittest.com/terms-conditions">Terms of Use</a> of DRAPE FIT.
                </p>
            </div>            
            <div class="container-login100-form-btn">
                <!--<input class="login100-form-btn" type="submit" value="Login">-->
                <?= $this->Form->submit('SIGN UP', ['type' => 'submit', 'class' => 'login100-form-btn']) ?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<script src="<?php echo HTTP_ROOT ?>assets/js/popper.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script type="text/javascript">
    $('.js-tilt').tilt({scale: 1.1})
</script>
<script type="text/javascript">
    $("#loginform").validate({
        rules: {
            email: {
                required: true, 
                email: true
            },
            password:{
                required: true,
            },
            confirm_password: {
                equalTo: "#password"
            },
            first_name: {
                required: true
            },
            last_name:{
                required: true
            },
            phone:{
                required: true
            },
            brand_name:{
                required: true
            },
        },
        messages: {
            email:"Please enter email",
            password:"Please enter password",
            first_name:"Please enter first name",
            last_name:"Please enter last name",
            phone:"Please enter phone number",
            brand_name:"Please enter brand name",
            confirm_password: " Enter Confirm Password Same as Password"
        }
    });
</script>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo HTTP_ROOT?>assets/images/img-01.png" alt="IMG">
            </div>

           
           <?php echo $this->Form->create("User", array('class'=>"login100-form validate-form",'data-toggle' => "validator",'id'=>'loginform')) ?>
                <span class="login100-form-title">
                    Member Login
                </span>
                <?= $this->Flash->render() ?>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <!--<input class="input100" type="text" name="email" placeholder="Email">-->
                     <?= $this->Form->input('email', ['type' => 'email', 'class' => 'input100', 'id'=>'email','data-error' => 'Please Enter email']) ?>
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

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="<?php echo $this->Url->build(["controller" => "users", "action" => "forget"])?>">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="<?php echo HTTP_ROOT?>">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<script src="<?php echo HTTP_ROOT ?>assets/js/popper.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script>
$( "#loginform" ).validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    password: {
      required: true
    }    
  },
  messages: {
        email:"Please enter email",
        password:"Please enter password"
    }
});
</script>
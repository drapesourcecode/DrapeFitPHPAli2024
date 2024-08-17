<style>
    .login-logo {
        float: left;
        text-align: center;
        width: 100%;
    }
    .btn-primary
    {
        background-color: #b62329!important;
        border-color: #b62329 !important;
    }
    #s{
        right: 41.5%;
        top: 40px;
    }
    .submit {
        margin-top: 10px;
    }
    .submit input {
        font-weight: bold;
    }
    #e {
        right: 50%;
        transform: translateX(50%);
        -moz-transform: translateX(50%);
        -webkit-transform: translateX(50%);

    }
</style>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo HTTP_ROOT?>assets/images/img-01.png" alt="IMG">
            </div>

           
           <?php echo $this->Form->create("User", array('class'=>"login100-form validate-form",'data-toggle' => "validator")) ?>
                <span class="login100-form-title">
                    Forget Password
                </span>
                <?= $this->Flash->render() ?>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <!--<input class="input100" type="text" name="email" placeholder="Email">-->
                     <?= $this->Form->input('email', ['type' => 'email', 'class' => 'input100', 'required' => 'required']) ?>
                     <div class="help-block with-errors"></div>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100" style="height:60%;">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div> 
                <div class="container-login100-form-btn">
                    <!--<input class="login100-form-btn" type="submit" value="Login">-->
                     <?= $this->Form->submit('Submit', ['type' => 'submit', 'class' => 'login100-form-btn']) ?>

                </div>               
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<script src="<?php echo HTTP_ROOT ?>assets/js/popper.js"></script>
<script src="<?php echo HTTP_ROOT?>assets/js/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<style>
    .list-unstyled {
        font-size: 12px;
        left: 0;
        position: absolute;
        top: -7px;
    }
    .error-message
    {
        color: #a94442;
    font-size: 14px;
    }
</style>
<link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/iCheck/all.css">  
<script src="<?php echo HTTP_ROOT; ?>plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-orange',
            radioClass: 'iradio_minimal-orange'
        });
        $('input[name=radioName]').iCheck({
            checkboxClass: 'icheckbox_minimal-orange',
            radioClass: 'iradio_minimal-orange'
        });
    });
</script> 
<div class="get_title">
    <div class="wrapper">
        <h1>Update Profile</h1>                    
        <div id="triangle-up"></div>
    </div>
</div>
<div class="main-content">
    <div class="wrapper">
        <div class="register-page">
            <div class="registre-box"> 
                <?= $this->Form->create($user, array('data-toggle' => "validator")) ?>


                <div class="col2-box">

                    <div class="form-group">

                        <?php echo $this->Form->input('first_name', array('class' => "form-control", 'div' => false, 'id' => "first_name", 'data-error' => "Enter your first name", 'required' => "required", 'value' => explode(' ', $getUserDetails['name'])[0])); ?>
                        <div class="help-block with-errors"></div>
                    </div>

                </div>
                <div class="col2-box">
                    <div class="form-group">
                        <?php echo $this->Form->input('last_name', array('class' => "form-control", 'div' => false, 'id' => "last_name", 'data-error' => "Enter your last name", 'required' => "required", 'value' => explode(' ', $getUserDetails['name'])[1])); ?>
                        <div class="help-block with-errors"></div>
                    </div>    </div>

                <?php if ($email == '') {
                    ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('email', array('type' => "email", 'class' => "form-control", 'div' => false, 'id' => "email", 'disabled' => 'disabled', 'value' => $getUserDetails->email,'style'=>'cursor:not-allowed')); ?>

                    </div>  
                <?php } else { ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('email', array('type' => "email", 'class' => "form-control", 'div' => false, 'id' => "email", 'required' => "required",'value' => $getUserDetails->email, 'onblur' => 'checkEmailAvail(this.value)')); ?>
                        <div class="help-block with-errors"></div>
                        <span style="font-size: 12px;font-weight: normal;color:#f84b4b" id="email_validation_msg"></span>
                        <div id="eloader" style="position: absolute; margin-top: -5.5%; margin-left: 33px;"></div>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <?php echo $this->Form->input('phone_no', array('maxlength' => 20, 'class' => "form-control", 'div' => false, 'id' => "phone_no", 'data-error' => "Enter your phone number", 'required' => "required", 'pattern' => '^[\d]*$', 'value' => $getUserDetails['phone_no'])); ?>
                    <div class="help-block with-errors"></div> </div>
                <?php if ($gender != '') {
                    ?>
                    <div class="form-group" style="text-align: ">
                        <label for="Sex">Sex</label>

                        <input type="radio" name="gender" value="1" class="minimal"  <?php echo ($gender == 'male') ? "checked" : "" ?> > &nbsp;Male &nbsp;&nbsp;
                        <input type="radio" name="gender" value="2" class="minimal" <?php echo ($gender == 'female') ? "checked" : "" ?>> &nbsp;Female       
                        <div class="help-block with-errors"></div>
                    </div>
                <?php } ?>
                <?php if ($age != '') {
                    ?>
                    <div class="form-group">
                        <label for="Age">Age(Years)</label>
                        <?php echo $this->Form->input('age', array('pattern' => '^[\d]*$', 'type' => 'text', 'maxlength' => 3, 'class' => "form-control", 'div' => false, 'label' => false, 'id' => "first_name", 'data-error' => "Enter your age", 'required' => "required", 'value' => $age)); ?>
                        <div class="help-block with-errors"></div>
                    </div>
                <?php } ?>

             <input type="hidden" name="type" value="2" class="minimal" >

                <button class="btn btn-success register-btn">Update</button>					
                <?php echo $this->Form->end(); ?>
            </div>

        </div>

    </div>
</div> 

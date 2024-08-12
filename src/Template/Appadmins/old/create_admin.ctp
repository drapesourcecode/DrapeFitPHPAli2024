<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            if ($id) {
                echo 'Edit Employee';
            } else {
                echo "Create Employee";
            }
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/view_admin"> <i class="fa fa-list"></i>Admin List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- left column -->
        <div class="col-xs-12">
            <div class="box box-primary">

                <?= $this->Form->create($admin, array('data-toggle' => "validator")); ?>
                <div class="box-body">
                    <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                    <div class="row">
                        <div class="col-md-6" style="margin-top: 27px;">
                            <div class="form-group">
                                <label for="exampleInputName">Name <span style="color: red;">*</span></label>
                                <?= $this->Form->input('name', ['placeholder' => "Enter name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$editAdmin->name, 'data-error' => 'Enter name']); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$editAdmin->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Email <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                <?php if ($id) { ?>
                                    <?= $this->Form->input('email', ['placeholder' => "Enter email", 'onblur' => 'checkEmailAvail(this.value)', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editAdmin->email, 'required' => "required", 'disabled' => 'disabled', 'data-error' => 'Enter Email id']); ?>
                                <?php } else { ?>
                                    <?= $this->Form->input('email', ['placeholder' => "Enter email", 'onblur' => 'checkEmailAvail(this.value)', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter Email id']); ?>
                                <?php } ?>
                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>
                    </div>




                    <?php if (!$id) { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Password <span style="color: red;">*</span></label>

                                    <?= $this->Form->input('password', ['placeholder' => "Enter password", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter password']); ?>
                                    <div class="help-block with-errors"></div>
                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Confirm Password <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('cpassword', ['placeholder' => "Enter confirm password", 'type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter confirm password']); ?>
                                    <div class="help-block with-errors"></div>
                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>              
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">About</label>
                                <?= $this->Form->input('about', ['type' => 'textarea', 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->about, 'kl_virtual_keyboard_secure_input' => "on"]); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Address</label>
                                <?= $this->Form->input('address', ['type' => 'textarea', 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->address, 'kl_virtual_keyboard_secure_input' => "on"]); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Phone <span style="color: red;">*</span></label>
                                <?= $this->Form->input('phone', ['placeholder' => "Enter phone no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->phone, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter Phone no']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="box-footer">

                    <?php
                    if ($id) {
                        echo $this->Form->button('Update Employee', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                    } else {
                        echo $this->Form->button('Create Employee', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;', 'onclick' => 'return beforeSubmit()']);
                    }
                    ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
</div>
</section>
</div>
<script>
    function beforeSubmit() {
        if ($("#email_validation_msg").html() == '<span style="color:green;">Email id is available.</span>') {
            $("#email").css("border-color", "#d2d6de");
            return true;
        }
        $('#email').focus();
        $("#email").css("border", "1px solid rgb(255, 18, 0)");
        return false;
    }
</script>
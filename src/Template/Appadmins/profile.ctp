<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?=
            __('Setting');
            ?>
        </h1>
        <?php if ($type == 1) { ?>
            <ol class="breadcrumb">
                <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

            </ol>
        <?php } else { ?>

            <ol class="breadcrumb">
                <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

            </ol>

        <?php } ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li id='li_profile' <?php if (empty($param)) { ?>class="active" <?php } ?>><a href="#profile" data-toggle="tab" aria-expanded="false">Profile </a></li>
                        <li id='li_password' <?php if ($param == 'changepassword') { ?>class="active" <?php } ?>><a href="#password" data-toggle="tab" aria-expanded="false">Password</a></li>

                        <?php if ($type == 1) { ?>
                            <li id='li_communication' <?php if ($param == 'communication') { ?>class="active" <?php } ?>><a href="#communication" data-toggle="tab" aria-expanded="true">Value set</a></li>
                            <li id='li_email_template' <?php if ($param == 'emailTemplete') { ?>class="active" <?php } ?>><a href="#email-template" data-toggle="tab" aria-expanded="true">Email template</a></li>
                            <li id='li_sms_template' <?php if ($param == 'smsTemplete') { ?>class="active" <?php } ?>><a href="#sms-template" data-toggle="tab" aria-expanded="true">Sms template</a></li>
                            <li id='li_email_template' <?php if ($param == 'superAdminPassword') { ?>class="active" <?php } ?>><a href="#superadmin-pass" data-toggle="tab" aria-expanded="true">Super admin password</a></li>
                            <li id='li_email_template' <?php if ($param == 'paymentmode') { ?>class="active" <?php } ?>><a href="#paymentmode" data-toggle="tab" aria-expanded="true">Paymentmode</a></li>

                            <li id='li_sendle_template' <?php if ($param == 'sendle') { ?>class="active" <?php } ?>><a href="#sendle" data-toggle="tab" aria-expanded="true">Shipping label</a></li>
                        <?php } ?>
                    </ul>

                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="tab-pane <?php if (empty($param)) { ?>active <?php } ?>" id="profile">
                            <div id="msg-gen"></div>
                            <?= $this->Form->create($user, array('id' => 'profile_data', 'data-toggle' => "validator")) ?>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('name', ['value' => $rowname->name, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your name', 'label' => false]); ?>
                                        <?= $this->Form->input('user_id', ['value' => $user_id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your name', 'label' => false]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('email', ['value' => $rowname->email, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your email', 'label' => false]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <?= $this->Form->input('phone', ['value' => $rowname->phone, 'type' => 'text', 'class' => "form-control", 'label' => false]); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <?= $this->Form->input('address', ['value' => $rowname->address, 'type' => 'textarea', 'rows' => 9, 'class' => "form-control", 'label' => false]); ?>

                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <?= $this->Form->submit('Update', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>




                        <div class="tab-pane <?php if ($param == 'changepassword') { ?>active <?php } ?>" id="password" >
                            <?= $this->Form->create(@$passwordData, array('data-toggle' => "validator", 'id' => 'change_password')); ?>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Current Password<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('current_password', ['type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your current password']); ?>
                                        <div class="help-block with-errors"></div>
                                        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">New Password<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('password', ['type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your new password']); ?>
                                        <div class="help-block with-errors"></div>
                                        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Confirm Password<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('cpassword', ['type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Confirm your new password']); ?>
                                        <div class="help-block with-errors"></div>
                                        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?= $this->Form->submit('Change password', ['type' => 'submit', 'class' => 'btn btn-success', 'name' => 'changepassword', 'style' => 'margin-left:15px;
            ']) ?>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>

                        <div class="tab-pane  <?php if ($param == 'communication') { ?>active <?php } ?>" id="communication" >

                            <?= $this->Form->create(@$Data, array('data-toggle' => "validator", 'id' => 'emailsetting')); ?>
                            <div class="box-body">
                                <div>
                                    <?php
                                    foreach ($settings as $settings) {
                                        $name = $settings['name'];
                                        $value = $settings['value'];
                                        $display = $settings['display'];
                                        ?>
                                        <div class = "form-group">
                                            <?php echo $this->Form->input($name, array('style' => 'width:450px;', 'class' => 'form-control', 'value' => $value, 'id' => 'setting', 'type' => 'text', 'label' => $display, 'required' => false)); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <?= $this->Form->button('save', ['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'save', 'name' => 'general', 'style' => 'float:left;margin-top:30px;']) ?>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>

                        <div class="tab-pane <?php if ($param == 'superAdminPassword') { ?>active <?php } ?>" id="superadmin-pass" >
                            <?= $this->Form->create(@$passwordData, array('data-toggle' => "validator", 'id' => 'superadminchange_password')); ?>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Current Password<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('superadmin_password', ['type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
                                        <div class="help-block with-errors"></div>
                                        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?= $this->Form->submit('Change password', ['type' => 'submit', 'class' => 'btn btn-success', 'name' => 'superadminchangepassword', 'style' => 'margin-left:15px;
            ']) ?>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>

                        <div class="tab-pane <?php if ($param == 'paymentmode') { ?>active <?php } ?>" id="paymentmode" >
                            <?= $this->Form->create('paymentmode', array('data-toggle' => "validator", 'id' => 'paymentmode')); ?>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Live mode</label>
                                        <input type="radio"id="livemode" name="paymentmode" value="1" <?php if ($paymentMode->value == 1) { ?> checked="" <?php } ?>>
                                        <label for="exampleInputEmail">Sandbox mode</label>
                                        <input type="radio"id="sandbox" name="paymentmode" value="2" <?php if ($paymentMode->value == 2) { ?> checked="" <?php } ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?= $this->Form->submit('Update', ['type' => 'submit', 'class' => 'btn btn-success', 'name' => 'paymentmodebtn', 'style' => 'margin-left:15px;
            ']) ?>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>



                        <?php if ($type == 1) { ?>

                            <div class="tab-pane <?php if ($param == 'emailTemplete') { ?>active <?php } ?>" id="email-template"  >
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($settingsEmailTempletes as $email) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $email['display']; ?></td>
                                                    <td>
                                                        <a href="<?php echo HTTP_ROOT . 'appadmins/edit_mail_templetes/' . $email->id; ?>" data-placement="top" data-hint="Edit" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="email-template-msg"></div>
                            </div>
                            <div class="tab-pane <?php if ($param == 'smsTemplete') { ?>active <?php } ?>" id="sms-template"  >
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($settingsSmsTempletes as $sms) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $sms['name']; ?></td>
                                                    <td>
                                                        <a href="<?php echo HTTP_ROOT . 'appadmins/edit_sms_templetes/' . $sms->id; ?>" data-placement="top" data-hint="Edit" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="sms-template-msg"></div>
                            </div>


                            <div class="tab-pane <?php if ($param == 'sendle') { ?>active <?php } ?>" id="sendle" >
                                <div class="row">
                                    <div class="col-sm-12" style="border: 2px solid gray;">
                                        <h3>Default Shipping Label</h3>
                                        <?= $this->Form->create('', array('data-toggle' => "validator", 'id' => 'default_shipping_lable', 'action'=>'updateShippingMode')); ?>
                                        <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio"  name="shipping_mode" value="sendle" <?php if ($shipping_mode->value == 'sendle') { ?> checked="" <?php } ?>>
                                                            Sendle mode &nbsp;&nbsp;&nbsp;
                                                        </label>
                                                        <label>
                                                            <input type="radio"  name="shipping_mode" value="stamps" <?php if ($shipping_mode->value == 'stamps') { ?> checked="" <?php } ?>>
                                                            Stamps mode
                                                        </label>
                                                        <label>
                                                            <input type="radio"  name="shipping_mode" value="manual" <?php if ($shipping_mode->value == 'manual') { ?> checked="" <?php } ?>>
                                                            Manual mode
                                                        </label>
                                                    </div>
                                            <button class="btn btn-success" type="submit">Update</button>
                                                </div>
                                        <?=$this->Form->end(); ?>
                                    </div>
                                    <div class="col-sm-6" style="border: 2px solid gray;border-top: 0;border-right: 0;">

                                        <?= $this->Form->create('', array('data-toggle' => "validator", 'id' => 'sendle_form')); ?>
                                        <div class="col-md-12">
                                            <h3>Sendle Details</h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio"id="livemode" name="sendle_mode" value="live" <?php if (@$sendle->sendle_mode == 'live') { ?> checked="" <?php } ?>>
                                                            Live mode &nbsp;&nbsp;&nbsp;
                                                        </label>
                                                        <label>
                                                            <input type="radio"id="sandbox" name="sendle_mode" value="sandbox" <?php if (@$sendle->sendle_mode == 'sandbox') { ?> checked="" <?php } ?>>
                                                            Sandbox mode
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Sendle ID<span style="color:#FF0000">*</span></label>
                                                        <?= $this->Form->input('sendle_id', ['type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$sendle->sendle_id]); ?>
                                                        <div class="help-block with-errors"></div> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label>API Key<span style="color:#FF0000">*</span></label>
                                                        <?= $this->Form->input('sendle_api_key', ['type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$sendle->sendle_api_key]); ?>
                                                        <div class="help-block with-errors"></div> 
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $this->Form->submit('Update', ['type' => 'submit', 'class' => 'btn btn-success', 'name' => 'sendlebtn', 'style' => 'margin-left:15px;
            ']) ?>
                                            </div>

                                        </div>
                                        <?= $this->Form->end() ?>
                                    </div>
                                    <div class="col-sm-6" style="border: 2px solid gray;border-top: 0;">
                                        <?= $this->Form->create('', array('data-toggle' => "validator", 'id' => 'stamps_form', 'action' => 'updateStampsInfo')); ?>
                                        <div class="col-md-12">
                                            <h3>Stamps Details</h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" id="stamps_livemode" name="stamps_mode" value="live" <?php if (@$stamps->stamps_mode == 'live') { ?> checked="" <?php } ?>>
                                                            Live mode &nbsp;&nbsp;&nbsp;
                                                        </label>
                                                        <label>
                                                            <input type="radio" id="stamps_sandbox" name="stamps_mode" value="sandbox" <?php if (@$stamps->stamps_mode == 'sandbox') { ?> checked="" <?php } ?>>
                                                            Sandbox mode
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Client ID<span style="color:#FF0000">*</span></label>
                                                        <?= $this->Form->input('client_id', ['type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$stamps->client_id]); ?>
                                                        <div class="help-block with-errors"></div> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Client secret Key<span style="color:#FF0000">*</span></label>
                                                        <?= $this->Form->input('client_secret', ['type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$stamps->client_secret]); ?>
                                                        <div class="help-block with-errors"></div> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Redirect url<span style="color:#FF0000">*</span></label>
                                                        <?= $this->Form->input('redirect_uri', ['type' => 'text', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$stamps->redirect_uri]); ?>
                                                        <div class="help-block with-errors"></div> 
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $this->Form->submit('Update', ['type' => 'submit', 'class' => 'btn btn-success', 'name' => 'sendlebtn', 'style' => 'margin-left:15px;
            ']) ?>
                                            </div>

                                        </div>
                                        <?= $this->Form->end() ?>


                                    </div>
                                </div>
                            </div>

                        <?php } ?>



                        <!-- /.tab-pane -->
                    </div>
                </div>
            </div>
    </section>
</div>


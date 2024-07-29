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
                        <!-- /.tab-pane -->
                    </div>
                </div>
            </div>
    </section>
</div>


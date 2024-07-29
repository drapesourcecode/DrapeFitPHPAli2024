<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Influencer
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <section class="content">

        <!-- left column -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <?= $this->Form->create('', array('data-toggle' => "validator")); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 27px;">
                                <div class="form-group">
                                    <label for="exampleInputName">Name <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('name', ['placeholder' => "Enter name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$edit_data->name, 'data-error' => 'Enter name']); ?>
                                    <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$edit_data->id]); ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="exampleInputEmail">Email <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                    <?php if (!empty($edit_data) && !empty($edit_data->email)) { ?>
                                        <?= $this->Form->input('email', ['placeholder' => "Enter email", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$edit_data->email, 'disabled' => "disabled", 'data-error' => 'Enter Email id']); ?>
                                    <?php } else { ?>
                                        <?= $this->Form->input('email', ['placeholder' => "Enter email", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$edit_data->email, 'required' => "required", 'data-error' => 'Enter Email id']); ?>
                                    <?php } ?>

                                    <div class="help-block with-errors"></div>                                    
                                </div>
                            </div>
                        </div>     

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName">Phone <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('phone', ['placeholder' => "Enter phone no", 'type' => 'number', 'class' => "form-control", 'label' => false, 'value' => @$edit_data->phone, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName">Note</label>
                                    <?= $this->Form->input('note', ['type' => 'textarea', 'class' => "form-control", 'label' => false, 'value' => @$edit_data->note, 'kl_virtual_keyboard_secure_input' => "on"]); ?>

                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="box-footer">

                        <?php
                        if ($id) {
                            echo $this->Form->button('Update Influencer', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                            ?>
                            <a style="float:left;margin-left:15px;" href="<?=HTTP_ROOT;?>appadmins/influencer/">Add New</a>
                            <?php
                        } else {
                            echo $this->Form->button('Create Influencer', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        }
                        ?>

                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header">
                            <h3 class="box-title">All Influencer</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Link</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_influencer as $key => $list) { ?>
                                    <tr>
                                        <td style="text-align:  left;"> <?= $key + 1; ?> </td>
                                        <td style="text-align:  left;"> <?php echo $list->name; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->email; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->phone; ?></td>
                                        <td style="text-align:  left;"> <?php echo HTTP_ROOT . 'influencer/' . $list->uniq_id; ?></td>

                                        <td style="text-align: center;">
                                            <a href="<?= HTTP_ROOT; ?>appadmins/influencer/<?= 'edit' . '/' . $list->id; ?>" data-placement="top" data-hint="" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a>
                                            <a href="<?= HTTP_ROOT; ?>appadmins/influencer/<?= 'delete' . '/' . $list->id; ?>" data-placement="top" data-hint="" class="btn btn-danger  hint--top  hint" style="padding: 0 7px!important;" 'confirm' = 'Are you sure you want to delete this?'><i class="fa fa-trash"></i></a>  
                                        </td>
                                    </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>

</div>
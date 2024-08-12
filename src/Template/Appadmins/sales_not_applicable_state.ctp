<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Sales tax
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
                                    <label for="exampleInputName">State Name <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('state_name', ['placeholder' => "Enter state name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$edit_data->state_name, 'data-error' => 'Enter state name']); ?>
                                    <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$edit_data->id]); ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>     

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="exampleInputEmail">Zipcode Min <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                  
                                        <?= $this->Form->input('zip_min', ['placeholder' => "Enter min zipcode", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'type' => 'number', 'value' => @$edit_data->zip_min, 'data-error' => 'Enter Min Zipcode (Only digits allowed) ']); ?>
                                    

                                    <div class="help-block with-errors"></div>                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName">Zipcode Max  <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('zip_max', ['placeholder' => "Enter max zipcode", 'type' => 'number', 'class' => "form-control", 'label' => false, 'value' => @$edit_data->zip_max, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter Max Zipcode  (Only digits allowed) ']); ?>
                                    <div class="help-block with-errors"></div>     
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName">Tax rate  <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('tax_rate', ['placeholder' => "Enter tax rate", 'type' => 'number', 'class' => "form-control", 'label' => false, 'value' => @$edit_data->tax_rate, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter tax rate  (Only digits allowed) ','step'=>'0.01']); ?>
                                    <div class="help-block with-errors"></div>     
                                </div>
                            </div>
                           




                        </div>
                    </div>
                    <div class="box-footer">

                        <?php
                        if ($id) {
                            echo $this->Form->button('Update', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                            ?>
                            <a style="float:left;margin-left:15px;" href="<?=HTTP_ROOT;?>appadmins/salesNotApplicableState/">Add New</a>
                            <?php
                        } else {
                            echo $this->Form->button('Save', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
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
                            <h3 class="box-title">List</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Zipcode min</th>
                                    <th>Zipcode max</th>
                                    <th>Tax rate</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_data as $key => $list) { ?>
                                    <tr>
                                        <td style="text-align:  left;"> <?= $key + 1; ?> </td>
                                        <td style="text-align:  left;"> <?php echo $list->state_name; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->zip_min; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->zip_max; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->tax_rate; ?></td>
                                        

                                        <td style="text-align: center;">
                                            <a href="<?= HTTP_ROOT; ?>appadmins/salesNotApplicableState/<?= 'edit' . '/' . $list->id; ?>" data-placement="top" data-hint="" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a>
                                            <a href="<?= HTTP_ROOT; ?>appadmins/salesNotApplicableState/<?= 'delete' . '/' . $list->id; ?>" data-placement="top" data-hint="" class="btn btn-danger  hint--top  hint" style="padding: 0 7px!important;" 'confirm' = 'Are you sure you want to delete this?'><i class="fa fa-trash"></i></a>  
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
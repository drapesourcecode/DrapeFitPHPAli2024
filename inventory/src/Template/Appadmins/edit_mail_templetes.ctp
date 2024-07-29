
<?php echo $this->Html->script(array('ckeditor/ckeditor')); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo ($id != '') ? "Edit email templetes" : "Add email templetes"; ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?= h(HTTP_ROOT) ?>appadmins/profile"> Profile</a></li>
            <li class="active"><a href="<?= h(HTTP_ROOT) ?>appadmins/profile/emailTemplete"> Email Templates</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <!-- general form elements -->
                <div class="box box-info">

                    <!-- form start -->
                    <?= $this->Form->create(@$dataEntity, array('data-toggle' => "validator")) ?>
                    <div class="box-body">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName">Email templates subject</label>
                                <?= $this->Form->input('display', ['type' => 'text', 'value' => @$row->display, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter value']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Email Contain</label>
                                <?= $this->Form->input('value', ['type' => 'textarea', 'value' => @$row->value, 'class' => "form-control ckeditor", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter value']); ?>
                                <?= $this->Form->input('id', ['type' => 'hidden', 'value' => @$row->id, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <?= $this->Form->button('Update', ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            if ($id) {
                echo 'Edit Career';
            } else {
                echo "Create Career";
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
                                <label for="exampleInputName">School </label>
                                <?= $this->Form->input('school', ['placeholder' => "Enter school name", 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->school]); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$editAdmin->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Degree </label>
                                <?= $this->Form->input('degree', ['placeholder' => "Enter degree name", 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->degree]); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$editAdmin->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>                                     
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Discipline </label>
                                <?= $this->Form->input('discipline', ['placeholder' => "Enter discipline name", 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->discipline,]); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$editAdmin->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">About Job</label>
                                <?= $this->Form->input('about_this_job', ['placeholder' => "Enter this job", 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->about_this_job]); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$editAdmin->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <?= $this->Form->button('save', ['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'save', 'name' => 'general', 'style' => 'float:left;margin-top:30px;']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
</div>
</section>
</div>

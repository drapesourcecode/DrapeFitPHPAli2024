<style type="text/css">
    .modal-body .form-horizontal .col-sm-2,
    .modal-body .form-horizontal .col-sm-10 {
        width: 100%
    }

    .modal-body .form-horizontal .control-label {
        text-align: left;
    }
    .modal-body .form-horizontal .col-sm-offset-2 {
        margin-left: 15px;
    }

    textarea#auther-name {
        height: 130px;
    }
</style>
<?php echo $this->Html->script(array('ckeditor/ckeditor')); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                <div class="nav-tabs-custom">
                    <div class="box-header with-border1">
                        <h3 class="box-title">
                            <?php
                            if ($id) {
                                echo 'Edit News';
                            } else {
                                echo "Add News";
                            }
                            ?>
                        </h3>
                    </div>
                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="tab-pane active" id="profile">
                            <div id="msg-gen"></div>
                            <?= $this->Form->create('', array('id' => 'profile_data', 'data-toggle' => "validator", 'type' => 'file')) ?>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">News Name <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('news_name', ['placeholder' => "Enter news name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$dataEdit->news_name, 'data-error' => 'Enter news name']); ?>
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">News Link <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('news_link', ['placeholder' => "Enter news link", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$dataEdit->news_link, 'data-error' => 'Enter news link']); ?>
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">Post By <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('post_by', ['placeholder' => "Enter post by", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$dataEdit->post_by, 'data-error' => 'Enter post by']); ?>
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <?php if (@$dataEdit->news_image) { ?>
                                        <div class="form-group">
                                            <img src="<?php echo HTTP_ROOT . NEWSIMG; ?><?php echo @$dataEdit->news_image; ?>" style="width: 100px;"/>
                                            <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/newsimgdelete/' . $id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                        </div>                                    
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <label for="exampleInputName">Blog Image <span style="color: red;">*</span></label>
                                            <?= $this->Form->input('news_image', ['type' => 'file', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Select a image']); ?>                                        
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    <?php } ?>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <?= $this->Form->submit('Submit', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
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
                            <h3 class="box-title">Promocode Listing</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>News Name</th>
                                    <th>Post By</th>
                                    <th>News Image</th>
                                    <th>Created</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($blogtagListing as $blogdata):
                                    ?>
                                    <tr>
                                        <td style="text-align:  left;"><?php echo $blogdata->news_name; ?></td>
                                        <td style="text-align:  left;"><?php echo $blogdata->post_by; ?></td>
                                        <td style="text-align:  left;"><img src="<?php echo HTTP_ROOT . NEWSIMG; ?><?php echo $blogdata->news_image;?>" style="width: 50px;"/></td>
                                        <td style="text-align:  left;"><?php echo $blogdata->created; ?></td>
                                        <td style="text-align: center;">
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'news', $blogdata->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $blogdata->id, 'News'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete this category?')]); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
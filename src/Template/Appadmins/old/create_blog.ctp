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
                                echo 'Edit Blog';
                            } else {
                                echo "Add Blog";
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
                                    <?php if (@$dataEdit->auther_image) { ?>
                                        <div class="form-group">
                                            <label for="exampleInputName">Avatar<span style="color: red;">*</span></label><br>
                                            <img src="<?php echo HTTP_ROOT . BLOGIMG; ?><?php echo @$dataEdit->auther_image; ?>" style="width: 50px;"/>
                                            <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/blogavtardelete/' . $id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                        </div>                                    
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <label for="exampleInputName">Avatar<span style="color: red;">*</span></label>
                                            <?= $this->Form->input('auther_image', ['type' => 'file', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Select a image']); ?>                                        
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label for="exampleInputName">Author Name <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('auther_name', ['placeholder' => "Enter author name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$dataEdit->auther_name, 'data-error' => 'Enter author name']); ?>
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">Author Description</label>
                                        <?= $this->Form->input('auther_descriptions', ['type' => 'textarea', 'placeholder' => "Enter author description", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$dataEdit->auther_descriptions, 'data-error' => 'Enter author description']); ?>
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">Blog Title <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('blog_title', ['placeholder' => "Enter blog title", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$dataEdit->blog_title, 'data-error' => 'Enter blog title']); ?>
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">Category <span style="color: red;">*</span></label>
                                        <select class="form-control" required="required" name="blog_category_id">
                                            <option value="">Select Category</option>
                                            <?php foreach ($blogCategory as $blogcat) { ?>
                                                <option <?php if ($blogcat->id == @$dataEdit->blog_category_id) { ?> selected="selected" <?php } ?> value="<?php echo $blogcat->id ?>"><?php echo $blogcat->category_name ?></option>
                                            <? } ?>
                                        </select>
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php if (@$dataEdit->blog_image) { ?>
                                        <div class="form-group">
                                            <img src="<?php echo HTTP_ROOT . BLOGIMG; ?><?php echo @$dataEdit->blog_image; ?>" style="width: 50px;"/>
                                            <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/blogimgdelete/' . $id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                        </div>                                    
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <label for="exampleInputName">Blog Image <span style="color: red;">*</span></label>
                                            <?= $this->Form->input('blog_image', ['type' => 'file', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Select a image']); ?>                                        
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputName">Blog Description <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('blog_shotdesc', ['value' => @$dataEdit->blog_shotdesc, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter page description']); ?>                                  
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= $this->Form->input('blog_description', ['value' => @$dataEdit->blog_description, 'type' => 'textarea', 'class' => "form-control ckeditor", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter page description']); ?>                                  
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
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
                            <h3 class="box-title">Blog Listing</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Author Name</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Created</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($blogListing as $blogdata):
                                    ?>
                                    <tr>
                                        <td style="text-align:  left;"><?php echo $blogdata->auther_name; ?></td>
                                        <td style="text-align:  left;"><?php echo $blogdata->blog_title; ?></td>
                                        <td style="text-align:  left;"><?php echo $this->Custom->categoryName($blogdata->blog_category_id) ?></td>
                                        <td style="text-align:  left;"><?php echo $blogdata->created; ?></td>
                                        <td style="text-align: center;">
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'create_blog', $blogdata->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $blogdata->id, 'Blogs'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete this category?')]); ?>
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
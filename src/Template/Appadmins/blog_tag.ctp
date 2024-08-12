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
</style>
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
                                echo 'Edit Blog Tag';
                            } else {
                                echo "Add Blog Tag";
                            }
                            ?>
                        </h3>
                    </div>
                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="tab-pane active" id="profile">
                            <div id="msg-gen"></div>
                            <?= $this->Form->create('', array('id' => 'profile_data', 'data-toggle' => "validator")) ?>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">Tag Name <span style="color: red;">*</span></label>
                                        <input type="text" placeholder="Enter tag name" class="form-control" required="required" value="<?php echo @$dataEdit->tag_name ?>" data-error="Enter tag name" name="tag_name">
                                        <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$dataEdit->id]); ?>
                                        <p> <span style="color:red">Note:</span> For multiple name please user comma (,) </p>
                                        <div class="help-block with-errors"></div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">Select Blog <span style="color: red;">*</span></label>
                                        <select class="form-control" required="required" name="blog_id" data-error="Select a category name">
                                            <option value="">Select Category</option>
                                            <?php foreach ($blogCategory as $blogcat) { ?>
                                                <option <?php if ($blogcat->id == @$dataEdit->blog_id) { ?> selected="selected" <?php } ?> value="<?php echo $blogcat->id ?>"><?php echo $blogcat->blog_title ?></option>
                                            <? } ?>
                                        </select>
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
                            <h3 class="box-title">Blog Tag Listing</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tag Name</th>
                                    <th>Category</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //pj($adminLists);exit;
                                foreach ($blogtagListing as $tagvalue):                                    
                                ?>
                                    <tr>
                                        <td style="text-align:  left;"><?php echo $tagvalue->tag_name; ?></td>
                                        <td style="text-align:  left;"><?php echo $this->Custom->BlogName($tagvalue->blog_id) ?></td>
                                        <td style="text-align: center;">
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'blog_tag', $tagvalue->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $tagvalue->id, 'BlogTag'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete this category?')]); ?>
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
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Product Category</h1>        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <?= $this->Form->create(@$user, array('id' => 'rack', 'data-toggle' => "validator", 'type' => 'file')) ?>
                        <div class="nav-tabs-custom">
                            <div class="tab-content boy-kid-select" style="width: 100%;float: left;">
                                <?= $this->Form->input('id', ['value' => @$id, 'type' => 'hidden', 'class' => "form-control", 'label' => false]); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Category</label>
                                            <?= $this->Form->input('product_type', ['value' => @$editData->product_type, 'type' => 'text', 'class' => "form-control", 'label' => false, 'required']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">User type</label>
                                            <select class="form-control" name="user_type">
                                                <option value="" selected disabled>----</option>
                                            <?php
                                            $user_type = ['1' => 'Men', '2' => 'Women', '3' => 'Boykid', '4' => 'GirlKid'];
                                            foreach ($user_type as $ky => $ut_li){
                                                ?>                                                
                                                <option value="<?=$ky;?>" <?= (!empty($editData->user_type) && ($ky == $editData->user_type))?'selected':''; ?> ><?=$ut_li;?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name</label>
                                            <?= $this->Form->input('name', ['value' => @$editData->name, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter name', 'required']); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Sort order</label>
                                            <?= $this->Form->input('sort_order', ['value' => @$editData->sort_order, 'type' => 'number', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter name', 'required']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Note</label>
                                            <?= $this->Form->input('note', ['value' => @$editData->note, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?= $this->Form->end() ?>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>Category Name</th>
                                    <th>Note</th>
                                    <th>Type</th>
                                    <th>Sort order</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($datas as $dts): ?>
                                    <tr id="<?php echo $dts->id; ?>" class="message_box">
                                        <td><?php echo $dts->product_type . '-' . $dts->name ?></td>
                                        <td><?php echo $dts->note; ?></td>
                                        <td><?php echo $user_type[$dts->user_type]; ?></td>
                                        <td><?php echo $dts->sort_order; ?></td>
                                        <td style="text-align: center;">
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-plus')), ['action' => 'rackSet', $dts->id], ['escape' => false, "data-placement" => "top", "title" => "Add Sub category", "data-hint" => "Add Sub category", 'class' => 'btn btn-primary hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'product_type', $dts->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'product_type_delete', $dts->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Product Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
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

<script>
    function myFunction() {
        window.print();
    }
</script>

<script>
    $(function () {
        $(".example").DataTable();
    });
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var sizeKB = input.files[0].size / 1000;
            //alert(sizeKB);
            if (parseFloat(sizeKB) <= 16) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = $('<img />', {
                        src: e.target.result,
                        alt: 'MyAlt',
                        width: '200'
                    });
                    $('#imagePreview').html(img);

                }
                reader.readAsDataURL(input.files[0]);
            } else {
                //alert("Image size");
                $("#image").val('');
                $('#imagePreview').html('');
            }
        }
    }

    $("#image").change(function () {
        readURL(this);

    });
</script>


<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Sub-category</h1>        
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
                                            <label for="exampleInputPassword1">Category</label>
                                            <!--<select name="in_product_type_id" class="form-control" onchange=" return getCategoryChanges(this.value)" required>-->
                                            <select name="in_product_type_id" class="form-control"  required>
                                                <?php foreach ($all_category as $a_ctg) { ?>
                                                    <option value="<?= $a_ctg->id; ?>" <?= ((!empty($catg) && ($catg == $a_ctg->id)) || (!empty($editData) && (@$editData->in_product_type_id == $a_ctg->id ))) ? 'selected' : '' ?>><?= $a_ctg->product_type . '-' . $a_ctg->name; ?></option>
                                                <?php } ?>

                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class = "form-group">
                                            <label for = "exampleInputPassword1">Sub-category</label>
                                            <?= $this->Form->input('rack_number', ['value' => @$editData->rack_number, 'type' => 'text', 'class' => "form-control", 'label' => false]);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name</label>
                                            <?= $this->Form->input('rack_name', ['value' => @$editData->rack_name, 'type' => 'text', 'class' => "form-control", 'style' => 'text-transform:uppercase;', 'label' => false, 'required' => 'required', 'placeholder' => 'Please enter name']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Sort Order</label>
                                            <?= $this->Form->input('sort_order', ['value' => @$editData->sort_order, 'type' => 'number', 'class' => "form-control", 'style' => 'text-transform:uppercase;', 'label' => false, 'required' => 'required', 'placeholder' => 'Please enter name']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Note</label>
                                            <?= $this->Form->input('location_note', ['value' => @$editData->location_note, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
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
                                    <th>Name</th>
                                    <th>Note</th>
                                    <th>Sort order</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datas as $dts): ?>
                                    <tr id="<?php echo $dts->id; ?>" class="message_box">
                                        <td><?php echo $dts->ipt->product_type . '-' . $dts->ipt->name; ?></td>
                                        <td><?php echo $dts->rack_number . '-' . $dts->rack_name; ?></td>
                                        <td><?php echo $dts->location_note; ?></td>
                                        <td><?php echo $dts->sort_order; ?></td>
                                        <td style="text-align: center;">
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'rack_set', $dts->in_product_type_id, $dts->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'rack_delete', $dts->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Product Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                            <?php if($dts->is_active == 1){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-check')), ['action' => 'rackSet','typ'=>'active','id' =>$dts->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Deactivate Product ", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?php }else{ ?>
                                                 <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-ban')), ['action' => 'rackSet','typ'=>'in_active','id' =>$dts->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Activate Product ", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?php } ?>
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
    function getCategoryChanges(value) {
        if (value) {
            var url = '<?php echo HTTP_ROOT ?>';
            window.location.href = url + "appadmins/rack_set/" + value;
        }
    }

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


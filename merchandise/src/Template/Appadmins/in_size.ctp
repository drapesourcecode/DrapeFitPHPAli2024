<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            echo "Manage size";
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <?= $this->Form->create('', array('data-toggle' => "validator")); ?>
                    <div class="box-body">
                        <p class="note">All (*) fields are mandatory</p>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Size<span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                                <?= $this->Form->input('size', ['placeholder' => "Enter size", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => !empty($editData) ? $editData->name : '', 'required' => "required", 'data-error' => 'Enter size']); ?>

                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>

                        <br clear="all" />



                    </div>
                    <div class="box-footer">

                        <?php
                        echo $this->Form->button(!empty($editData) ? 'Update' : 'Save', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        ?>
                        <?php if (!empty($editData)) { ?>
                        <a href="<?= HTTP_ROOT . 'appadmins/in_size'; ?>" class="btn btn-info" style="margin-left:15px;">Add New</a>
                        <?php } ?>

                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>

    <section class="content-header">
        <h1>All Sizes </h1>        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                       
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_data as $li) {
                                    ?>
                                    <tr id="<?php echo $li->id; ?>" class="message_box">

                                        <td><?php echo $li->size; ?></td>

                                        <td>
                                            <a href="<?= HTTP_ROOT . "appadmins/in_size/" . $li->id . '/edit'; ?>" data-placement="top"  data-hint="Edit" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit "></i></a>
                                            <a href="<?= HTTP_ROOT . "appadmins/in_size/" . $li->id . '/delete'; ?>" data-placement="top"  data-hint="Delete" class="btn btn-danger  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-trash "></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

<script>
    $(function () {
        $(".example").DataTable();
    });
</script>
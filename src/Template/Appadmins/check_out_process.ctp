
<div class="content-wrapper">
    <section class="content-header">
        <h1>Defaulter Customer <?php echo $this->Custom->UserName($user->user_id); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">

                        <table id="example1x" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>Order Date</th>
                                    <th>Name</th>
                                    <th>Kid Name</th>
                                    <th>Email</th>
                                    <th>Profile type</th>
                                    <th>Stylist name</th>
                                    <th>Finalize Date</th> 
                                    <th>Product Count</th> 
                                    <th>Product price</th> 
                                    <th>Status</th> 

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td><?php echo date('y-m-d', strtotime($user->created_dt)); ?></td>
                                    <td><?php echo $this->Custom->UserName($user->user_id); ?></td>
                                    <td><?php echo $this->Custom->kidName($user->kid_id) ?></td>
                                    <td><?php echo $this->Custom->email($user->user_id); ?></td>
                                    <td><?php
                                        if ($user->profile_type == 1) {
                                            echo "Men";
                                        } else if ($user->profile_type == 2) {
                                            echo "Women";
                                        } else {
                                            echo "Kids";
                                        }
                                        ?></td>
                                    <td><?php echo $this->Custom->emaplyeName(@$user->emp_id); ?></td>
                                    <td><?php echo date('y-m-d', strtotime(@$user->finalize_date)); ?></td>
                                    <td><?php echo $this->Custom->productCountPrice(@$user->id); ?></td>
                                    <td><?php echo @$user->price; ?></td>
                                    <td><?php if ($user->auto_checkout == 1) {
                                            echo "Done";
                                        } else {
                                            echo "Pending";
                                        } ?></td>


                                </tr>


                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    <section class="content">

        <!-- left column -->
        <div class="col-xs-12">
            <div class="box box-primary">

<?= $this->Form->create('', array('data-toggle' => "validator")); ?>
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6" style="margin-top: 27px;">
                            <div class="form-group">
                                <label for="exampleInputName">Amount <span style="color: red;">*</span></label>
<?= $this->Form->input('amount', ['placeholder' => "Amount", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$user->price, 'data-error' => 'Enter name']); ?>
<?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$user->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                    </div>        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Card details</label>
                                <br>
<?php
$getCardDetails = $this->Custom->getAllcard(@$user->user_id);
foreach ($getCardDetails as $data) {
    ?>
                                    <input type="radio" name="card"  value="<?php echo $data->id; ?>" <?php if ($data->use_card == 1) { ?> checked="" <?php } ?>/>--
                                    <label for=""><?php echo $data->card_name; ?></label> /
                                    <label for=""><?php echo $data->card_type; ?></label> /
                                    <label for=""><?php echo $data->card_number; ?></label> /
                                    <label for=""><?php echo $data->card_expire; ?></label>



<?php } ?>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="box-footer">
                    <?php if ($user->auto_checkout != 1) { ?>
                    <?php echo $this->Form->Submit('Process', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                    ?>
<?php } ?>
                </div>
<?= $this->Form->end() ?>
            </div>
        </div>

    </section>

</div><!-- /.content-wrapper -->


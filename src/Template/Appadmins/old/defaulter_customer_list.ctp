<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('Defaulter Customer list who not checkout ') ?>
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

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>OrderDate</th>
                                    <th>Name</th>
                                    <th>Kid Name</th>
                                    <th>Email</th>
                                    <th>ProfileTyep</th>
                                    <th>Stylist name</th>
                                    <th>Finalize Date</th> 
                                    <th>Product Count</th> 
                                    <th>Product price</th> 
                                    <th>Transaction No</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($notpaid_users as $user) {
                                    ?>
                                    <tr>
                                        <td><?php echo date('y-m-d', strtotime($user->created_dt)); ?></td>
                                        <td><?php echo $this->Custom->UserName($user->user_id); ?></td>
                                        <td><?php echo $this->Custom->kidName($user->kid_id) ?></td>
                                        <td><?php echo $this->Custom->email($user->user_id); ?></td>
                                        <td><?php echo $this->Custom->paymentProfile($user->profile_type); ?></td>
                                        <td><?php echo $this->Custom->emaplyeName(@$user->emp_id); ?></td>
                                        <td><?php echo date('y-m-d', strtotime(@$user->finalize_date)); ?></td>
                                        <td><?php echo $this->Custom->productCountPrice(@$user->id); ?></td>
                                        <td><?php echo @$user->price; ?></td>
                                        <td><?php echo @$user->transactions_id; ?></td>
                                        <td>
                                            <?php echo $this->Html->link($this->Html->tag('i', 'Check Out Process>>', array('class' => 'fa P')), ['action' => 'checkOutProcess', @$user->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


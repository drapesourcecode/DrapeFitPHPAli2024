<style>
    .btn.btn-info.hint--top.hint .fa.fa-fw.fa-user-plus {
        width: 3.286em !important;
    }
    .hide{
        display: none;
    }
    .active{
        display: block;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('All customer') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'allcustomerpdf'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'allcustomerexcel'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Create Date</th> 
                                    <th>Full Name </th>
                                    <th>Email</th>
                                    <th>Gender</th>    
                                    <th>Asign Customer Stylist</th> 
                                    <th>Kid count</th> 
                                    <th>Paid status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userdetails as $user) { ?>
                                    <tr>
                                        <td><?php echo @$user->created_dt; ?></td>
                                        <td><?php echo $this->Custom->UserName($user->id); ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td><?php echo $this->Custom->GenderName($user->id); ?></td>
                                        <td><?php echo $this->Custom->getStylistName($user->id); ?></td>
                                        <td><?php echo $this->Custom->countKid($user->id); ?></td>
                                        <td><?php echo $this->Custom->paidStatus($user->id); ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= __('Page listing') ?>
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
                                    <th style="display: none">Id</th>
                                    <th>Page List</th>

                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataListings as $pages): ?>
                                    <?php ?>
                                    <tr>
                                        <td style="display: none"><?= h($pages->id) ?></td>
                                        <td><?= h($pages->name) ?></td>
                                        <td style="text-align: center;">
                                            <?php //echo $id = $user->id; ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'editpages', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Update", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <!----> 
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


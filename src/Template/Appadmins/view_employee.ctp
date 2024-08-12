<div class="content-wrapper">
 <section class="content-header">
  <h1> Admin Listing </h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active"><a class="active-color" href="<?= h(HTTP_ROOT) ?>appadmins/create_admin">   <i class="fa  fa-user-plus"></i> Create New Admin </a></li>
  </ol>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <?php if (!empty($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "dashboard") { ?>
        <a href="<?php echo HTTP_ROOT; ?>appadmins/index">  <button class="btn btn-warning" type="submit" style="float: right; margin-top: -4%; margin-right: 20%;"> BACK</button> </a><?php } ?>
     <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th style="width: 10%;text-align: center;">Last Login</th>
         <th style="width: 10%;text-align: center;">Created</th>
         <th style="text-align: center;">Action</th>
        </tr>
       </thead>
       <tbody>
        <?php foreach ($adminLists as $admin): ?>
           <tr id="<?php echo $admin->id; ?>" class="message_box">
            <td><?= h($admin->name) ?></td>
            <td><?= h($admin->email) ?></td>
            <td><?= h($admin->phone) ?></td>
            <td style="text-align: center;"><?php echo $this->Custom->dateDisplayTime($admin->last_login_date); ?></td>
            <td style="text-align: center;"><?php echo date('d-m-Y', strtotime($admin->created)); ?></td>
            <td style="text-align: center;">
             <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-fw fa-gg')), ['action' => 'set_password', $admin->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Set New Password", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
             <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'create_admin', $admin->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
             <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $admin->id, 'Users'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
             <?php if ($admin->is_active == 1) { ?>
              <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $admin->id . '/Users'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', [ "data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
             <?php } else { ?>
              <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $admin->id . '/Users'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
             <?php } ?>
            </td>
           </tr>
          <?php endforeach; ?>
      </table>
     </div>
     <!-- /.box-body -->
    </div><!-- /.box -->
   </div><!-- /.col -->
  </div><!-- /.row -->
 </section>
 <!-- /.content -->
</div>



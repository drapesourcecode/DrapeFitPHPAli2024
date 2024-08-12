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
            <?= __('Previous Work List') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Order listing</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                            <div class="col-xs-12" id="formDiv"> </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td colspan="10">
                                        <div  class="col-sm-6">
                                            <?= $this->Form->create('addproduct', array('id' => 'idForm')); ?>
                                            <div class="form-group">
                                                <label for="exampleInputName"> Scan Profile <span style="color: red;">*</span></label>
                                                <input style="height: 35px; width: 300px;font-weight: bold;" id="documentID"  type="text"  name="productValue" autocomplete="off"  onmouseover="this.focus();">
                                            </div> 
                                            <?= $this->Form->end() ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="display: none"></th>

                                    <?php if ($type != 3) { ?>
                                        <th>Full Name</th>
                                        <th>Gender</th>         
                                        <th>Profile</th>         


                                        <th>Order date</th> 
                                        <th>Assign Customer stylist</th>
                                        <th>Customer Action</th>
                                        <th>Kid Name </th>
                                        <th>Assign Kid stylist</th>

                                        <th>Kids Action </th>
                                        <th>Delete </th>
                                    <?php } else { ?>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>         
                                        <th>Profile</th>         


                                        <th>Order date</th> 
                                        <th>Customer Action</th>
                                        <th>Kid Name </th>
                                        <th>Kids Action </th>

                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($userdetails as $pages):
//                                     pj($pages);
                                    ?>
                                <?php $emailpstatus = $this->Custom->emailperference($pages->user_id,$pages->kid_id);?>

                                    <tr>
                                        <?php if ($type != 3) { ?>
                                            <td style="display: none"><?= h($pages->created_dt) ?></td>
                                            <td><?= h(@$pages->user->user_detail->first_name) ?>&nbsp;<?= h(@$pages->user->user_detail->last_name) ?>&nbsp; <?= (@$pages->user->is_influencer==1)?'[Influencer]':"";?></td>
                                            <td><?php
                                                if (@$pages->profile_type == 1) {
                                                    echo "Men";
                                                } elseif (@$pages->profile_type == 2) {
                                                    echo "Women";
                                                } else {
                                                    echo "kid";
                                                }
                                                ?> </td>  
                                            <td><?php
                                                if ($pages->count == 1) {
                                                    $ptype = 'st';
                                                } elseif ($pages->count == 2) {
                                                    $ptype = 'nd';
                                                } elseif ($pages->count == 3) {
                                                    $ptype = 'rd';
                                                } else {
                                                    $ptype = 'th';
                                                }
                                                echo $pages->count . $ptype;
                                                ?></td>

                                            <td><?php echo @$pages->created_dt; ?> </td>                                         

                                            <td> 
                                                <div class="form-group">
                                                    <select  data-hint="Assign Stylist" class="form-control <?php
                                                    if ($pages->profile_type == 3) {
                                                        echo 'hide';
                                                    }
                                                    ?>" onchange="getUpdate(<?php echo @$pages->id; ?>)" id="employee-<?php echo $pages->id; ?>" style="width: 80px;">
                                                        <option value="">--Assign Stylist--</option>
                                                        <?php foreach ($employee as $emp): ?>
                                                            <option  <?php if ($pages->emp_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo $emp->name; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div> 
                                            </td> 

                                            <td>                                                                                     

                                                <?php
                                                if (@$pages->profile_type == 2) {
                                                    ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); 
                                                    ?>
                                                    <?php
                                                    if ($pages->profile_type != 3) {
                                                        echo $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                                        
                                                    }
                                                    
                                                    
                                                    ?>
                                                <?php if($emailpstatus=="1"){ ?>
                                                    <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top",'disabled'=>'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                <?php } else{ ?>
                                                    <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                <?php }?>
                                                    <?php
                                                } elseif (@$pages->profile_type == 1) {
                                                    ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php echo $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?> 
                                                
                                                <?php if($emailpstatus=="1"){ ?>
                                                    <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top",'disabled'=>'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>                                                
                                                <?php } else{ ?>                                                
                                                    <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                <?php }
                                                }
                                                
                                                ?>
                                                
                                                
                                               

                                              


                                            </td>
                                            <td> <?php
                                                if ($pages->profile_type == 3) {
                                                    echo $this->Custom->kidName($pages->kid_id);
                                                }
                                                ?>
                                            </td>


                                            <td> 

                                                <?php if (@$pages->user->kids_detail->id) { ?>
                                                    <div class="form-group  <?php
                                                    if ($pages->profile_type != 3) {
                                                        echo 'hide';
                                                    }
                                                    ?>">
                                                        <input type ="hidden" id="payment-<?php echo @$pages->user->kids_detail->id; ?>" value="<?php echo @$pages->id; ?>">
                                                        <select  data-hint="Assign Stylist" class="form-control" onchange="getUpdate1(<?php echo @$pages->id; ?>)" id="employee_kid-<?php echo @$pages->id; ?>" style="width: 80px;">
                                                            <option value="">--Assign Stylist--</option>
                                                            <?php foreach ($employee as $emp): ?>
                                                                <option  <?php if (@$pages->emp_id == @$emp->id) { ?> selected="selected" <?php } ?>value="<?php echo @$emp->id; ?>"><?php echo @$emp->name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                <?php }
                                                ?>
                                            </td> 
                                            <td style="width: 90px;">
                                                <?php if (@$pages->user->kids_detail->id && @$pages->profile_type == 3) { ?>
                                                    <!--for admin-->                                               



                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'kidProfile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Kid profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?> 
                                                    <?php echo $this->Html->link($this->Html->tag('i', $mass_kid_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewkidproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                    
                                                    <?php if($emailpstatus=="1"){ ?>
                                                    <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top",'disabled'=>'disabled','target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                    <?php } else{?>
                                                    
                                                    <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                <?php } } ?>
                                                    

                                            </td>
                                            <td> 
                                                <?php // if(@$pages->user->kids_detail->id){   ?>
                                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteprofile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;', 'confirm' => 'Are you sure you want to delete  ?']); ?>
                                                <?php // }      ?>
                                                 
                                            </td>
                                          

                                        <?php } else { ?>
                                            <!--//for employee-->
                                            <td style="display: none"><?= h($pages->created_dt) ?></td>
                                            <td><?= h($pages->user->user_detail->first_name) ?></td>
                                            <td><?= h($pages->user->user_detail->last_name) ?> <?= (@$pages->user->is_influencer==1)?'[Influencer]':"";?></td>
                                            <td><?php
                                                if (@$pages->profile_type == 1) {
                                                    echo "Men";
                                                } elseif (@$pages->profile_type == 2) {
                                                    echo "Women";
                                                } else if ($pages->profile_type == 3) {
                                                    echo "kid";
                                                }
                                                ?> </td>   
                                            <td><?php
                                                if ($pages->count == 1) {
                                                    $ptype = 'st';
                                                } elseif ($pages->count == 2) {
                                                    $ptype = 'nd';
                                                } elseif ($pages->count == 3) {
                                                    $ptype = 'rd';
                                                } else {
                                                    $ptype = 'th';
                                                }
                                                echo $pages->count . $ptype;
                                                ?></td>

                                            <td><?php echo $pages->created_dt; ?> </td>   
                                            <td>                                                                                     

                                                <?php
                                                if ($pages->profile_type == 2) {
                                                    ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php
                                                    if ($pages->profile_type != 3) {

                                                        echo $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']);
                                                    }
                                                    ?> 


                                                    <?php
                                                } elseif ($pages->profile_type == 1) {
                                                    ?>
                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'review', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "view profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php echo $this->Html->link($this->Html->tag('i', $mass_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                
                                                <?php if($emailpstatus=="1"){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top",'disabled'=>'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                <?php } else{?>
                                                
                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                    <?php
                                                } }
                                                ?>
                                                
                                            </td>
                                            <td> <?php
                                                if ($pages->profile_type == 3) {
                                                    echo $this->Custom->kidName($pages->kid_id);
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($pages->profile_type == 3) { ?>


                                                    <?php
//                                                echo @$userdetails->profile_type; 
                                                    ?>



                                                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'kidProfile', $pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View Kid profile", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?> 
                                                    <?php echo $this->Html->link($this->Html->tag('i', $mass_kid_product_count[$pages->id], array('class' => 'fa fa-plus')), ['action' => 'viewkidproductlist', @$pages->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                                                
                                                <?php if($emailpstatus=="1"){ ?>
                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top",'disabled'=>'disabled', 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>
                                                <?php } else{?>
                                                
                                                <?= $this->Html->link($this->Html->tag('i', 'Email', array('class' => 'fa P')), ['action' => 'add_email', @$pages->id], ['escape' => false, "data-placement" => "top", 'target' => '_blank', 'class' => 'btn btn-info', 'style' => 'padding: 0 12px!important;']); ?>

                                                <?php } } ?>
                                            </td>
                                        <?php } ?>
                                    </tr>

                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                                <!----> 
                        </table>
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">

    function getUpdate(id) {
        var emp_id = $('#employee-' + id).val();


        $.ajax({
            type: "POST",
            url: "employee_assigned", /* PAGE WHERE WE WILL PASS THE DATA */
            data: {emp_id: emp_id, id: id}, /* THE DATA WE WILL BE PASSING */
            success: function (result) { /* GET THE TO BE RETURNED DATA */
                // if (result == '1') {
                //     $('#employee-' + id).attr('disabled', true); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
                // }
            }
        });

    }

    function getUpdate1(id) {
        var emp_id = $('#employee_kid-' + id).val();
        var paymentId = $('#payment-' + id).val();
        //alert(id);


        $.ajax({
            type: "POST",
            url: "employee_assigned_kid", /* PAGE WHERE WE WILL PASS THE DATA */
            data: {emp_id: emp_id, id: id, payment_id: paymentId}, /* THE DATA WE WILL BE PASSING */
            success: function (result) { /* GET THE TO BE RETURNED DATA */
                // if (result == '1') {
                //     $('#employee-' + id).attr('disabled', true); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
                // }
            }
        });

    }


</script>
<script>
    $("form#idForm").on("submit", function (event) {
        event.preventDefault();
        //console.log($(this).serialize());
        var id = $('#documentID').val();
        // var words = id.split('-');
        var loaderData = "<span><img src='<?php echo HTTP_ROOT . 'images/payment-loader.gif' ?>'/></span>";
        $('#formDiv').html(loaderData);

        if (id) {
            var url = "<?php echo HTTP_ROOT . "appadmins/view_users/" ?>" + id;
            window.open(url, '_self');
        }

    });
</script>
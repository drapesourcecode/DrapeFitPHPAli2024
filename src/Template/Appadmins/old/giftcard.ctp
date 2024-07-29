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
    <section class="content-header">
        <h1>
            <?=
            __('Giftcard Setting');
            ?>
        </h1>

        <ol class="breadcrumb">
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                <div class="nav-tabs-custom">

                    <div class="box-header with-border1">
                        <h3 class="box-title">
                            <?php
                            if (@$giftId) {
                                echo "Edit Giftcard Settings";
                            } else {
                                echo "Add Giftcard Settings";
                            }
                            ?>
                        </h3>

                    </div>
                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="tab-pane active" id="profile">
                            <div id="msg-gen"></div>
                            <?= $this->Form->create('profile_data', array('id' => 'profile_data', 'data-toggle' => "validator")) ?>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Giftcode<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('giftcode', ['value' => @$giftEditDetails->giftcode, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter giftcode ', 'label' => false]); ?>
                                        <?= $this->Form->input('id', ['value' => @$giftEditDetails->id, 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter giftcode ', 'label' => false]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Created Date
                                            <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('created_dt', ['placeholder' => "Enter Created Date", 'id' => "datepicker1", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$giftEditDetails->created_dt, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter created date', 'required' => 'required']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Comments</label>
                                        <?= $this->Form->input('msg', ['value' => @$giftEditDetails->msg, 'type' => 'textarea', 'class' => "form-control", 'label' => false]); ?>

                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Price<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('price', ['value' => @$giftEditDetails->price, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter price ', 'label' => false]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Expiry Date
                                            <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('expiry_date', ['placeholder' => "Enter expiry date", 'id' => "datepicker", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$giftEditDetails->expiry_date, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter expiry date', 'required' => 'required']); ?>
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











                        <!-- /.tab-pane -->
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
                            <h3 class="box-title">Giftcard Listing</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Giftcode</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>Created Date</th>
                                    <th>Comments</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (@$giftdetails as $list):
                                    
                                    $userid=array();
                              
                                    foreach(@$list->user_mail_template_giftcode as $userGiftcode){
                                        $userid[]=$userGiftcode->user_id;
                                    }
                                   
                                    ?>
                                    <tr>
                                        <td style="text-align:  left;"> <?php echo $list->giftcode; ?></td>
                                        <td style="text-align:  left;"> <?php echo "$" . number_format($list->price, 2); ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->expiry_date; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->created_dt; ?></td>
                                        <td style="text-align:  left;"><?php echo $list->msg; ?></td>                                        
                                        <td style="text-align: center;">
                                            
                                         <?php if ($list->is_active == 1) { ?>
                                                <a href="javascript:void(0)"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Used", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0)"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Not use", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-envelope')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Gift code send to user", 'class' => 'btn btn-info  hint--top  hint ajaxBtn', 'style' => 'padding: 0 7px!important;', 'data-toggle' => 'modal', 'data-target' => '#myModalNorm-'.$list->id]); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil')), ['action' => 'giftcard', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deletegiftcard', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete product", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;','confirm'=>'Are you sure you want to delete this?']); ?>

                                        </td>
                                    </tr>



                                <div class="modal fade" id="myModalNorm-<?php echo $list->id; ?>" tabindex="-1" role="dialog" 
                                     aria-labelledby="myModalLabel-<?php echo $list->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content gift-card-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="close" 
                                                        data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>                
                                                <h4 class="modal-title">
                                                    Giftcode:-<?php echo @$list->giftcode; ?>
                                                </h4>
                                                <h4 class="modal-title" >
                                                    Price: $ <?php echo @$list->price; ?>
                                                </h4>
                                                <h4 class="modal-title">
                                                    Users List
                                                </h4>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">

                                               <?= $this->Form->create('profile_data', array('id' => 'profile_data', 'data-toggle' => "validator")) ?>

                                                    <div class="checkbox">
                                                        <?php 
//                                                        pj($userlist);exit;
                                                        foreach ($userlist as $user) {
                                                            ?>
                                                            <label>
                                                                <input type="checkbox"  name="user_id[]" value="<?php echo $user->id; ?>" <?php if (isset($userid) && in_array($user->id,@$userid)) { ?> checked <?php } ?>/> <?php echo $user->email; ?><br>
                                                               
                                                            </label>
                                                        <?php } ?>
                                                        <input type="hidden" value="<?php echo @$list->id ?>" name="gift_id"/> <br>
                                                        <input type="hidden" value="<?php echo @$list->price ?>" name="price"/> <br>
                                                    </div>
                                                    <button type="submit" name="usersGiftcode" value="usersGiftcode" class="btn btn-primary">Submit</button>
                                                 <?= $this->Form->end() ?>


                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>




                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
</div>




<script>
    $(document).ready(function () {
        $('#datepicker').datepicker().on('changeDate', function (e) {
            $(this).focus();
        });
        $("#datepicker1").datepicker().on('changeDate', function (e) {
            $(this).focus();
        });

    });

</script>

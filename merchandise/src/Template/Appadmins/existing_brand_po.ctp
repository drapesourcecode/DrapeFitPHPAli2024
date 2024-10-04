<?php $color_arr = $this->Custom->inColor(); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Existing Customer Po</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="#">   <i class="fa  fa-user-plus"></i> Existing Brand Po </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">

                        <ul class="nav nav-tabs">
                            <li class="<?= (empty($tab) || ($tab=='tab1'))?'active':''; ?>" >
                                <!--<a data-toggle="tab" href="<?=HTTP_ROOT;?>/appadmins/existingBrandPo/tab1">Place PO</a>-->
                                <a  href="<?=HTTP_ROOT;?>/appadmins/existingBrandPo/tab1">Place PO</a>
                            </li>
                            <li class="<?= (!empty($tab) && ($tab=='tab2'))?'active':''; ?>"><a  href="<?=HTTP_ROOT;?>appadmins/existingBrandPo/tab2">PO Received</a></li>
                            <li class="<?= (!empty($tab) && ($tab=='tab4'))?'active':''; ?>"><a  href="<?=HTTP_ROOT;?>appadmins/existingBrandPo/tab4">PO Payment </a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade <?= (empty($tab) || ($tab=='tab1'))?' in active ':''; ?>">
                                <div id="brand_fliter_form">
                                    <?=$this->Form->create('',['type'=>'get','url'=>['action'=>'existingBrandPo','tab1']]); ?>
                                    <div class="row">
                                        <div class="col-sm-8">

                                        </div>
                                        <div class="col-sm-3">
                                            <select name="brand_id" id="filter_brand" class="form-control" required>
                                                <option value="" selected disabled>select brand</option>
                                                <?php foreach($tab1_brand_list as $tb_brnd_li){ ?>
                                                <option value="<?=$tb_brnd_li->brand_id;?>" <?= !empty($_GET) && !empty($_GET['brand_id']) && ($_GET['brand_id'] == $tb_brnd_li->brand_id)?'selected':''; ?> ><?=$tb_brnd_li->brand->brand_name;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="submit" class="btn btn-sm btn-success">Filter</button>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <?= $this->Form->end(); ?>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>sl no</th>
                                            <th>Brands Name</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Color : Size</th>
                                            <th style="width: 10%;text-align: center;">Quantity</th>
                                            <th style="width: 10%;text-align: center;">Po date</th>
                                            <th style="text-align: center;">Po Customer</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(!empty($_GET) && !empty($_GET['brand_id'])){
                                            $po_product_id = [];
                                        foreach ($tab1_data_list as $ky => $dat_li){
                                            $po_product_id[]=$dat_li->id;
                                            ?>
                                            <tr  class="message_box">
                                                <td><?= $ky + 1 ?></td>
                                                <td><?= h($dat_li->brand->brand_name) ?></td>
                                                <td><?php echo $dat_li->prd_detl[0]['product_name_one']; ?></td>
                                                <td><img src="<?php echo HTTP_ROOT_INV . 'files/product_img/' ?><?php echo $dat_li->prd_detl[0]['product_image']; ?>" style="width: 80px;"/></td>
                                                <td><?php
                                                    echo $color_arr[$dat_li->prd_detl[0]['color']] ." : ";
                                                    $pick_s = $dat_li->prd_detl[0]['picked_size'];
                                                    if (!empty($pick_s)) {
                                                        $li_size = explode('-', $pick_s);
                                                        foreach ($li_size as $sz_l) {
                                                            $pdc_sz = $dat_li->prd_detl[0][$sz_l];
                                                            if (($pdc_sz == 0) || ($pdc_sz == 00)) {
                                                                echo $pdc_sz;
                                                            } else {
                                                                echo!empty($pdc_sz) ? $pdc_sz . '&nbsp;&nbsp;' : '';
                                                            }
                                                        }
                                                    }
                                                    if (!empty($dat_li->prd_detl[0]['primary_size']) && ($dat_li->prd_detl[0]['primary_size'] == 'free_size')) {
                                                        echo "Free Size";
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align: center;"><?php echo $dat_li->qty; ?></td>
                                                <td style="text-align: center;"><?php echo $dat_li->po_date; ?></td>
                                                <td style="text-align: center;">
                                                        <?php
                                                        if (!empty($dat_li->kid_id) && ($dat_li->kid_id != 0)) {
                                                            echo $dat_li->kid_dt->kids_first_name . " (kid)";
                                                        } else if (!empty($dat_li->user_id)) {
                                                            echo $dat_li->user_dtl->first_name.' '.$dat_li->user_dtl->last_name;
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                </td>
                                                <td>     
                                                    <a href="<?=HTTP_ROOT;?>appadmins/cancle_existing_brand_po/<?php echo $dat_li->id.'/'; ?>" class="btn btn-success">Cancle</a>
                                                    <button onclick="attachDoc(<?php echo $dat_li->id; ?>)" type="button">Attach DOC</button> </td>
                                            </tr>
                                        <?php } } ?>
                                </table>
                                <?php if(!empty($_GET) && !empty($_GET['brand_id'])){ ?>
                                <?=$this->Form->create('',['type'=>'post','url'=>['action'=>'placePo']]);?>
                                <input type="hidden" name="proceed_id" value="<?= implode(',',$po_product_id);?>" />
                                <input type="hidden" name="brand_id" value="<?= !empty($_GET) && !empty($_GET['brand_id']) ?$_GET['brand_id']:'';?>" >
                                <button type="submit" class="btn btn-sm btn-success">Place PO</button>
                                <?=$this->Form->end();?>
                                <?php } ?>
                            </div>
                            <div id="tab2" class="tab-pane fade <?= (!empty($tab) && ($tab=='tab2'))?' in active ':''; ?>">
                                <div id="brand_fliter_form">
                                    <?=$this->Form->create('',['type'=>'get','url'=>['action'=>'existingBrandPo','tab2']]); ?>
                                    <div class="row">
                                        <div class="col-sm-8">

                                        </div>
                                        <div class="col-sm-3">
                                            <select name="brand_id" id="filter_brand" class="form-control" required>
                                                <option value="" selected disabled>select brand</option>
                                                <?php foreach($tab1_brand_list as $tb_brnd_li){ ?>
                                                <option value="<?=$tb_brnd_li->brand_id;?>" <?= !empty($_GET) && !empty($_GET['brand_id']) && ($_GET['brand_id'] == $tb_brnd_li->brand_id)?'selected':''; ?> ><?=$tb_brnd_li->brand->brand_name;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="submit" class="btn btn-sm btn-success">Filter</button>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <?= $this->Form->end(); ?>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>sl no</th>
                                            <th>Brands Name</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Color : Size</th>
                                            <th style="width: 10%;text-align: center;">Quantity</th>
                                            <th style="width: 10%;text-align: center;">Po date</th>
                                            <th style="text-align: center;">Po number</th>
                                             <th style="text-align: center;">Po Customer</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $total = 0;
                                        $received = 0;
                                        if(!empty($_GET) && !empty($_GET['brand_id'])){
                                            $po_product_id = [];
                                        foreach ($tab1_data_list as $ky => $dat_li){
                                            $total += 1;
                                            $po_product_id[]=$dat_li->id;
                                            ?>
                                            <tr  class="message_box">
                                                <td><?= $ky + 1 ?></td>
                                                <td><?= h($dat_li->brand->brand_name) ?></td>
                                                <td><?php echo $dat_li->prd_detl[0]['product_name_one']; ?></td>
                                                <td><img src="<?php echo HTTP_ROOT_INV . 'files/product_img/' ?><?php echo $dat_li->prd_detl[0]['product_image']; ?>" style="width: 80px;"/></td>
                                                <td><?php
                                                    echo $color_arr[$dat_li->prd_detl[0]['color']] ." : ";
                                                    $pick_s = $dat_li->prd_detl[0]['picked_size'];
                                                    if (!empty($pick_s)) {
                                                        $li_size = explode('-', $pick_s);
                                                        foreach ($li_size as $sz_l) {
                                                            $pdc_sz = $dat_li->prd_detl[0][$sz_l];
                                                            if (($pdc_sz == 0) || ($pdc_sz == 00)) {
                                                                echo $pdc_sz;
                                                            } else {
                                                                echo!empty($pdc_sz) ? $pdc_sz . '&nbsp;&nbsp;' : '';
                                                            }
                                                        }
                                                    }
                                                    if (!empty($dat_li->prd_detl[0]['primary_size']) && ($dat_li->prd_detl[0]['primary_size'] == 'free_size')) {
                                                        echo "Free Size";
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align: center;"><?php echo $dat_li->qty; ?></td>
                                                <td style="text-align: center;"><?php echo $dat_li->po_date; ?></td>
                                                <td style="text-align: center;">
                                                    <?php echo $dat_li->po_number; ?>
                                                </td>
                                                   <td style="text-align: center;">
                                                        <?php
                                                        if (!empty($dat_li->kid_id) && ($dat_li->kid_id != 0)) {
                                                            echo $dat_li->kid_dt->kids_first_name . " (kid)";
                                                        } else if (!empty($dat_li->user_id)) {
                                                            echo $dat_li->user_dtl->first_name.' '.$dat_li->user_dtl->last_name;
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="<?=HTTP_ROOT;?>appadmins/edit_existing_brand_po/<?php echo $dat_li->id.'/'.$dat_li->brand->id; ?>" class="btn btn-primary">Edit</a>
                                                    <a href="<?=HTTP_ROOT;?>appadmins/cancle_existing_brand_po/<?php echo $dat_li->id.'/'; ?>" class="btn btn-success">Cancle</a>
                                                    <?php 
                                                    if(!empty($dat_li->po_number)){
                                                    if($dat_li->status == 2){
                                                      ?>
                                                    <a href="<?=HTTP_ROOT;?>appadmins/complete_existing_brand_receive/<?php echo $dat_li->product_id.'/'.$dat_li->po_number; ?>" class="btn btn-primary">Click to Receive</a>
                                                      <?php  
                                                    } 
                                                     if($dat_li->status == 3){ 
                                                         $received +=1;
                                                         ?>
                                                            <b style="color:olive;">Product Received</b>
                                                      <?php
                                                     }
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php } } ?>
                                </table>  
                                <?php 
                                if(!empty($_GET) && !empty($_GET['brand_id'])){
                                     $status2Count = 0;
                                        $status3Count = 0;
                                
                                        // Loop through the data list to count occurrences
                                        foreach ($tab1_data_list as $dat_li) {
                                            if ($dat_li->status == 2) {
                                                $status2Count++;
                                            } elseif ($dat_li->status == 3) {
                                                $status3Count++;
                                            }
                                        }
                                   if(($status2Count == 0) && ($status3Count >= 1)){ ?>
                                    <a href="<?=HTTP_ROOT;?>appadmins/processPoReceived/<?=$_GET['brand_id'];?>" class="btn btn-info">Proceed to Payment</a>  
                                    <?php }else{ ?>
                                    <a href="#" class="btn btn-info" disabled readonly title="Complete all pending to receive">Proceed to Payment</a>
                                    <?php }
                                }?>
                            </div>
                            <div id="tab4" class="tab-pane fade <?= (!empty($tab) && ($tab=='tab4'))?' in active ':''; ?>">
                                <div id="brand_fliter_form">
                                    <?=$this->Form->create('',['type'=>'get','url'=>['action'=>'existingBrandPo','tab4']]); ?>
                                    <div class="row">
                                        <div class="col-sm-8">

                                        </div>
                                        <div class="col-sm-3">
                                            <select name="brand_id" id="filter_brand" class="form-control" required>
                                                <option value="" selected disabled>select brand</option>
                                                <?php foreach($tab1_brand_list as $tb_brnd_li){ ?>
                                                <option value="<?=$tb_brnd_li->brand_id;?>" <?= !empty($_GET) && !empty($_GET['brand_id']) && ($_GET['brand_id'] == $tb_brnd_li->brand_id)?'selected':''; ?> ><?=$tb_brnd_li->brand->brand_name;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="submit" class="btn btn-sm btn-success">Filter</button>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <?= $this->Form->end(); ?>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>sl no</th>
                                            <th>Brands Name</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Color : Size</th>
                                            <th style="width: 10%;text-align: center;">Quantity</th>
                                            <th style="width: 10%;text-align: center;">Po date</th>
                                            <th style="text-align: center;">Po number</th>
                                             <th style="text-align: center;">Po Customer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(!empty($_GET) && !empty($_GET['brand_id'])){
                                            $po_product_id = [];
                                        foreach ($tab1_data_list as $ky => $dat_li){
                                            $po_product_id[]=$dat_li->id;
                                            ?>
                                            <tr  class="message_box">
                                                <td><?= $ky + 1 ?></td>
                                                <td><?= h($dat_li->brand->brand_name) ?></td>
                                                <td><?php echo $dat_li->prd_detl[0]['product_name_one']; ?></td>
                                                <td><img src="<?php echo HTTP_ROOT_INV . 'files/product_img/' ?><?php echo $dat_li->prd_detl[0]['product_image']; ?>" style="width: 80px;"/></td>
                                                <td><?php
                                                    echo $color_arr[$dat_li->prd_detl[0]['color']] ." : ";
                                                    $pick_s = $dat_li->prd_detl[0]['picked_size'];
                                                    if (!empty($pick_s)) {
                                                        $li_size = explode('-', $pick_s);
                                                        foreach ($li_size as $sz_l) {
                                                            $pdc_sz = $dat_li->prd_detl[0][$sz_l];
                                                            if (($pdc_sz == 0) || ($pdc_sz == 00)) {
                                                                echo $pdc_sz;
                                                            } else {
                                                                echo!empty($pdc_sz) ? $pdc_sz . '&nbsp;&nbsp;' : '';
                                                            }
                                                        }
                                                    }
                                                    if (!empty($dat_li->prd_detl[0]['primary_size']) && ($dat_li->prd_detl[0]['primary_size'] == 'free_size')) {
                                                        echo "Free Size";
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align: center;"><?php echo $dat_li->qty; ?></td>
                                                <td style="text-align: center;"><?php echo $dat_li->po_date; ?></td>
                                                <td style="text-align: center;">
                                                    <?php echo $dat_li->po_number; ?>
                                                </td>
                                                   <td style="text-align: center;">
                                                        <?php
                                                        if (!empty($dat_li->kid_id) && ($dat_li->kid_id != 0)) {
                                                            echo $dat_li->kid_dt->kids_first_name . " (kid)";
                                                        } else if (!empty($dat_li->user_id)) {
                                                            echo $dat_li->user_dtl->first_name.' '.$dat_li->user_dtl->last_name;
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                </td>
                                            </tr>
                                        <?php } } ?>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    $('#filter_brand').find(":selected").val(); 
    $('#filter_brand').find(":selected").text(); 
    function attachDoc(po_product_id){
        // alert(po_product_id);
        $('#po_product_id').val(po_product_id);
        getAttachDoc(po_product_id);
        $('#po_file_modal').modal('show');
    }
    function getAttachDoc(po_product_id){        
        $('#attach_list').html('');
        $('#file_atach_grp').html('');
        $('#doc_file1').val(''); 
        $('#po_product_id').val(po_product_id);
        $('#po_file_modal').modal('show');
        $.ajax({
                url: "<?= HTTP_ROOT; ?>appadmins/get_po_product_file",
                type: 'POST',              
                data: {po_product_id:po_product_id},
                dataType: 'html',         
                success: function (res) {
                    $('#attach_list').html(res);
                }
            });        
    }
    function deleteFile(id){
        $.ajax({
                url: "<?= HTTP_ROOT; ?>appadmins/delete_po_product_file",
                type: 'POST',              
                data: {id:id},
                dataType: 'html',         
                success: function (res) {
                }
            });
        $('#file_'+id).remove();
    }
    $(document).ready(function(){
        $('.add_more').click(function(e){
            e.preventDefault();
            $('#file_atach_grp').append("<input name='doc_file[]' type='file'/>");
        });
        $('#po_file_upload').click(function(e){
            // alert('asas');
            e.preventDefault();
            var formData = new FormData($(this).parents('form')[0]);
            let po_product_id = $('#po_product_id').val();

            $.ajax({
                url: "<?= HTTP_ROOT; ?>appadmins/po_product_file_upload",
                type: 'POST',              
                data: formData,
                cache: false,
                contentType: false,
                processData: false,          
                success: function (data) {
                    $('#attach_list').html('');
                    $('#file_atach_grp').html('');
                    $('#doc_file1').val(''); 
                    getAttachDoc(po_product_id);
                }
            });
            return false;
        });
    });
    
</script>

<div id="po_file_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 100%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Attach Doc</h4>
            </div>
            <div class="modal-body">
                <div class="cmt-frm">
                    <?= $this->Form->create('',['type'=>'POST', 'enctype'=>"multipart/form-data"]); ?>
                    <input type="hidden" id="po_product_id" name="po_product_id" />                   
                    <input type="file" name="doc_file[]"  id='doc_file1'/> 
                    <div id="file_atach_grp"></div>   
                    <button class="add_more">Add More Files</button>               
                    <button type="button" class="btn btn-success" id="po_file_upload">Upload</button>
                    <?=$this->Form->end();?>
                </div>
                <div id="attach_list"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
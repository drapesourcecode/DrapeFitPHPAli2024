<div class="content-wrapper">
    <section class="content-header">
        <h1> New Brand Po</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="#">   <i class="fa  fa-user-plus"></i> New Brand Po </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">

                        <ul class="nav nav-tabs">
                            <li class="<?= (empty($tab) || ($tab=='tab1'))?'active':''; ?>" >
                                <!--<a data-toggle="tab" href="<?=HTTP_ROOT;?>/appadmins/newBrandPo/tab1">Place PO</a>-->
                                <a  href="<?=HTTP_ROOT;?>/appadmins/newBrandPo/tab1">Place PO</a>
                            </li>
                            <li class="<?= (!empty($tab) && ($tab=='tab2'))?'active':''; ?>"><a  href="<?=HTTP_ROOT;?>/appadmins/newBrandPo/tab2">PO Received</a></li>
                           
                            <li class="<?= (!empty($tab) && ($tab=='tab4'))?'active':''; ?>"><a  href="<?=HTTP_ROOT;?>/appadmins/newBrandPo/tab4">PO Paid </a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade <?= (empty($tab) || ($tab=='tab1'))?' in active ':''; ?>">
                                <div id="add_product">
                                    
                                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script>
    function getChanges(value) {
        if (value) {
            var url = '<?php echo HTTP_ROOT ?>';
            window.location.href = url + "appadmins/newBrandPo/tab1/" + value;
        }
    }
</script>
<style>
    .btn.active, .btn:active {
        background: #db8031 !important;
    }
</style>
<?php
$color_arr = $this->Custom->inColor();
?>
<div class="">
    <section class="content-header">
        <h1><?= !empty($id) ? 'Edit' : 'Add'; ?> Product For <?php echo @$profile; ?></h1>        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div id="missing_fields">
                            <?php
                            if (!empty($this->request->session()->read('missing_fields'))) {
                                echo "Missing fields : <b>" . $this->request->session()->read('missing_fields') . "</b><br><br>";
                                $this->request->session()->write('missing_fields', '');
                            }
                            ?>
                        </div>
                        <?php if ($editproduct->is_deleted == 1) {
                            
                        } else {
                            ?>
                            <?= $this->Form->create(@$user, array('id' => 'profile_data', 'type' => 'file','url'=>['action'=>'addPoProduct'])) ?>
                        <?php } ?>
<?= $this->Form->input('id', ['value' => @$id, 'type' => 'hidden', 'label' => false]); ?>

                        <div class="nav-tabs-custom">
                            <select id="profile_type" class="form-control" onchange="return getChanges(this.value)">
                                <option <?php if (@$profile == 'Men') { ?> selected="" <?php } ?> value="Men">Men</option>
                                <option <?php if (@$profile == 'Women') { ?> selected="" <?php } ?> value="Women">Women</option>
                                <option <?php if (@$profile == 'BoyKids') { ?> selected="" <?php } ?> value="BoyKids">Boy Kids</option>
                                <option <?php if (@$profile == 'GirlKids') { ?> selected="" <?php } ?> value="GirlKids">Girl Kids</option>
                            </select>
                            <?php
                            $edt_dtl = [];
                            if (!empty(@$editproduct) && !empty($editproduct->dtls)) {
                                $edt_dtl = explode('-', $editproduct->dtls);
                            }
                            ?>

<?php if (@$profile == 'Men' || @$profile == '') { ?>

                                <?=  $this->element('men', compact('color_arr','editproduct','product_ctg_nme','product_sub_ctg_nme')); ?>
                                
                                <?php
                                if ($editproduct->is_deleted == 1) {
                                    echo "<h1 style='color:red;'>Deleted</h1>";
                                } else {
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-10">
        <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                        </div>
                                    </div>
    <?php } ?>
                            </div>

    <?php if (empty($id)) { ?>
                                <script>
                                    $(document).ready(function () {
                                        $("input[name^=better_body_shape]").prop("checked", false);
                                    })
                                </script>
                            <?php } ?>
    <?php if (($editproduct->better_body_shape == NULL) || empty(count(json_decode($editproduct->better_body_shape, true)))) { ?>
                                <script>
                                    $(document).ready(function () {
                                        $("input[name^=better_body_shape]").prop("checked", false);
                                    })
                                </script>
                            <?php } ?>
                        <?php } ?>
                            <?php if (@$profile == 'Women') { ?>
                            
                                <?=  $this->element('women', compact('color_arr','editproduct','product_ctg_nme','product_sub_ctg_nme')); ?>
                                
    <?php if (empty($id)) { ?>
                                <script>
                                    $(document).ready(function () {
                                        $("input[name^=better_body_shape]").prop("checked", false);
                                    })
                                </script>
                            <?php } ?>
    <?php if (($editproduct->better_body_shape == NULL) || empty(count(json_decode($editproduct->better_body_shape, true)))) { ?>
                                <script>
                                    $(document).ready(function () {
                                        $("input[name^=better_body_shape]").prop("checked", false);
                                    })
                                </script>
                            <?php } ?>
                        <?php } ?>
                            <?php if (@$profile == 'BoyKids') { ?>
                                
                                <?=  $this->element('boykids', compact('color_arr','editproduct','product_ctg_nme','product_sub_ctg_nme')); ?>
                            
                        <?php } ?>
                            <?php if (@$profile == 'GirlKids') { ?>
                                
                                <?=  $this->element('girlkids', compact('color_arr','editproduct','product_ctg_nme','product_sub_ctg_nme')); ?>
                            
                    <?php } ?>
                    </div>
                    <?php if ($editproduct->is_deleted == 1) {
                        
                    } else {
                        ?>
                        <?= $this->Form->end() ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        
</div>
</section>

</div>

<script>
    function myFunction() {
        window.print();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        $(".example").DataTable();
    });
</script>
<?php if(!empty($_GET['ctg'])){ ?>
<script>
    $(document).ready(function(){
        $("[name=rack]").val('69');
        $.ajax({
            url: '<?php echo HTTP_ROOT ?>appadmins/getSubCatgList',
            type: 'POST',
            data: {id: <?=$_GET['ctg'];?>},
            success: function (res) {
                let htmll = "<option value='' selected disabled>--</option>";
                $('select[name=rack]').html(htmll+res);
            },
            error: function (err) {
                $('select[name=rack]').html('<option value="" selected disabled>No data found</option>');
            },
            dataType: "html"

        });
    });
</script>    
<?php } ?>
<?php if(!empty($_GET['sub_ctg'])){ ?>
<script>
    $(document).ready(function(){
        setTimeout(function (){
            $("[name=rack]").val('<?=$_GET['sub_ctg'];?>');
        },1000);
    });
</script>    
<?php } ?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var sizeKB = input.files[0].size / 1000;
            //alert(sizeKB);
            if (parseFloat(sizeKB) <= 20) {
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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Image not supported',
                    background: '#fff url(https://sweetalert2.github.io/images/trees.png)'
                })
                $("#image").val('');
                $('#imagePreview').html('');
            }
        }
    }

    $("#image").change(function () {
        readURL(this);

    });
    
    function setSubCatg(id){
        let user_type = $('#profile_type').val();
        let ctg = $("[name=product_type]").find("option:selected").val();
        if (id) {
             var url = '<?php echo HTTP_ROOT ?>';
             window.location.href = url + "appadmins/newBrandPo/tab1/" + user_type+'?ctg='+ctg+'&sub_ctg='+id;
         }
    }

    function getSubCatg(id) {
        let user_type = $('#profile_type').val();
        if (id) {
             var url = '<?php echo HTTP_ROOT ?>';
             window.location.href = url + "appadmins/newBrandPo/tab1/" + user_type+'?ctg='+id;
         }
        $.ajax({
            url: '<?php echo HTTP_ROOT ?>appadmins/getSubCatgList',
            type: 'POST',
            data: {id: id},
            success: function (res) {
                $('select[name=rack]').html(res);
            },
            error: function (err) {
                $('select[name=rack]').html('<option value="" selected disabled>No data found</option>');
            },
            dataType: "html"

        });

    }

    $(document).ready(function () {
        $('.select2_select').select2();
        $('.select2_select').on('select2:closing', function (e) {
            let id = $(this).attr('id');
            let val_arr = $('#' + id).select2('val');
            if (Array.isArray(val_arr) && val_arr.length && (val_arr.includes("") || val_arr.includes("NULL"))) {
                if (val_arr.includes("NULL")) {
                    $("#" + id).val('NULL').trigger('change.select2');
                } else {
                    $("#" + id).val('').trigger('change.select2');
                }
            } else {
//                $("#"+id).val('').trigger('change.select2'); 
//                $("#"+id).val('NULL').trigger('change.select2');
            }
//            console.log(val_arr); 
        });
      
       /* $("#seson input[type=checkbox]").attr('required','required');*/
        $("#seson #selectAllseson").click(function () {
            $("#seson input[type=checkbox]").prop("checked", $(this).prop("checked"));
            $("#seson input[type=checkbox]").removeAttr('required');
        });

        $("#seson input[type=checkbox]").click(function () {
            $("#seson input[type=checkbox]").removeAttr('required');
            if (!$(this).prop("checked")) {
                $("#seson #selectAllseson").prop("checked", false);
            }
        });

    });
    function updateChkbox() {
        $('input[name="style_sphere_selections_v5[]"]').not(this).prop('checked', false);
        let chkbox = $('#mens12300').attr('checked');
        if (chkbox == "checked") {
            $('#mens12300').removeAttr('checked');
        } else {
            $('#mens12300').attr('checked', 'checked');
        }
    }

    function updateOutfitWomenChkbox() {
        $('input[name="outfit_prefer[]"]').not(this).prop('checked', false);
        $('#wom_outfit_wer label').removeClass('active');
        let chkbox = $('#wmens12300').attr('checked');
        if (chkbox == "checked") {
            $('#wmens12300').removeAttr('checked');
            $('#wom_outfit_wer label:first').removeClass('active');
        } else {
            $('#wmens12300').attr('checked', 'checked');
            $('#wom_outfit_wer label:first').addClass('active');
        }
    }
</script>

<style>
    .women-select2{
        width: 47.6%;
        display: inline-block;
    }
    .women-select1 {
    width: 21.9%;
    display: inline-block;
    vertical-align: top;
}
    .women-select1 label {
        display: inline-block;
        width: auto;
        float: right;
        font-size: 18px;
        font-weight: normal;
        padding: 5px 0px;
        font-family: "Amazon Ember", Arial, sans-serif;
        margin: 0;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #000 !important;
    }
    .select2-selection__choice__remove span {
        color: #ce2f2f !important;
    }
    span.error {
    color:red;
}
    .type-box ul li {
        display: inline-block;
        width: 17%;
        margin: 10px 11px;
        margin-bottom: 10px;
        margin-left: 11px;
        vertical-align: top;
        position: relative;
    }
.type-box ul li span.error {
    position: absolute;
    bottom: -27px;
    left: 0;
    line-height: 16px;
}
    .type-box ul {
        float: left;
        width: 100%;
        margin: 10px 0 15px 0;
        padding: 0;
        padding-top: 0px;
        text-align: left;
    }
    .type-box ul li label {
        position: relative;
        border: 1px solid #e0e0e0;
        padding: 2px;
        cursor: pointer;
    }
    .type-box ul li label img {
        width: 100%;
    }

    .type-box .radio-box {
        opacity: 0;
        position: absolute;
    }
    .type-box ul li input[type="radio"]:checked + label, .type-box ul li input[type="checkbox"]:checked + label {
        border: 1px solid #ef6a04;
        background: none;
    }
    .note-label ul {
        float: left;
        width: 100%;
        padding: 0;
        padding-top: 0px;
        margin: 0;
    }
    .note-label ul li {
        display: inline-block;
        width: auto;
        margin: 7px 5px;
    }

    .skin ul{
        float: left;
        width: 100%;
        margin: 0;
        padding: 0;
    }
    .skin ul li{
        display: inline-block;
        vertical-align: top;
        margin-right: 22px;
        position:relative;
    }
    .skin ul li span.error {
    position: absolute;
    width: 151px;
    bottom: -6px;
}
    .skin ul li label{
        width: 50px;
        height: 50px;
        background: #e6e6e6;
        border-radius: 100%;
        display: inline-block;
        cursor: pointer;
        border:4px solid #fff;
    }
    .women-select-boxes {
    vertical-align: top;
    display: inline-flex;
}
.women-select-boxes span {
    margin: 9px 4px;
}
.list-inline>li{
    position: relative;
}
.list-inline>li span.error {
    position: absolute;
    bottom: -11px;
    left: 0;
    width: 162px;
}
    .skin ul li input{
        /*display: none;*/
    }
    .skin ul li:first-child label{
        background: #fdc8b9;
    }
    .skin ul li:nth-child(2) label{
        background: #f0b4a2;
    }
    .skin ul li:nth-child(3) label{
        background: #d0967e;
    }
    .skin ul li:nth-child(4) label{
        background: #c57456;
    }
    .skin ul li:nth-child(5) label{
        background: #78412a;
    }
    .skin ul li:last-child label{
        text-align: center;
        font-weight: bold;
        position: relative;
    }

    .skin ul li:last-child label span {
        display: inline-block;
        position: absolute;
        height: 100%;
        width: 100%;
        padding: 13px 0;
        left: 0;
        top: 0;
        font-size: 12px;
    }
    .skin ul li input[type="checkbox"]:checked+label{
        border:4px solid #ff6c00;
    }
    
.skin ul li {
    display: inline-flex;
    align-items: center;
    margin-right: 22px;
    position: relative;
}
.note-label ul li {
    position: relative;
}
.note-label ul li span.error{
        position: absolute;
    width: 150px;
    bottom: -14px;
    left: 0;
}
.women-select1 {
    display: inline-flex;
}
span.error {
    display: none !important;
}
.error {
    border: 1px solid red !important;
}
.skin ul li input.error {
    outline: 1px solid red;
    height: 13px;
    border: none !important;
    margin-right: 3px;
}

.list-inline>li input.error {
    outline: 1px solid red;
    height: 13px;
    border: none !important;
    margin-right: 3px;
}

.note-label ul li input.error {
    outline: 1px solid red;
    height: 13px;
    border: none !important;
    margin-right: 3px;
}
.list-inline>li {
    position: relative;
    display: inline-flex;
    vertical-align: top;
    align-items: center;
}

sub, sup {
    position: relative;
    font-size: 100%;
    line-height: 0;
    vertical-align: baseline;
}

</style>                           
                                </div>
                                
                                <div id="brand_fliter_form">
                                    <?=$this->Form->create('',['type'=>'get','url'=>['action'=>'newBrandPo','tab1']]); ?>
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
                                            <th style="width: 10%;text-align: center;">Quantity</th>
                                            <th style="width: 10%;text-align: center;">Po date</th>
                                            <th style="text-align: center;"></th>
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

                                                <td style="text-align: center;"><?php echo $dat_li->qty; ?></td>
                                                <td style="text-align: center;"><?php echo $dat_li->po_date; ?></td>
                                                <td style="text-align: center;">

                                                </td>
                                            </tr>
                                        <?php } } ?>
                                </table>
                                <?php if(!empty($_GET) && !empty($_GET['brand_id'])){ ?>
                                <?=$this->Form->create('',['type'=>'post','url'=>['action'=>'placeNewbrandPo']]);?>
                                <input type="hidden" name="proceed_id" value="<?= implode(',',$po_product_id);?>" />
                                <input type="hidden" name="brand_id" value="<?= !empty($_GET) && !empty($_GET['brand_id']) ?$_GET['brand_id']:'';?>" >
                                <button type="submit" class="btn btn-sm btn-success">Place PO</button>
                                <?=$this->Form->end();?>
                                <?php } ?>
                            </div>
                            <div id="tab2" class="tab-pane fade <?= (!empty($tab) && ($tab=='tab2'))?' in active ':''; ?>">
                                <div id="brand_fliter_form">
                                    <?=$this->Form->create('',['type'=>'get','url'=>['action'=>'newBrandPo','tab2']]); ?>
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
                                            <th style="width: 10%;text-align: center;">Quantity</th>
                                            <th style="width: 10%;text-align: center;">Po date</th>
                                            <th style="text-align: center;">Po number</th>
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

                                                <td style="text-align: center;"><?php echo $dat_li->qty; ?></td>
                                                <td style="text-align: center;"><?php echo $dat_li->po_date; ?></td>
                                                <td style="text-align: center;">
                                                    <?php echo $dat_li->po_number; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php 
                                                    if(!empty($dat_li->po_number)){
                                                    if($dat_li->status == 2){
                                                      ?>
                                                    <a href="<?=HTTP_ROOT;?>appadmins/complete_new_brand_receive/<?php echo $dat_li->product_id.'/'.$dat_li->po_number; ?>" class="btn btn-primary">Click to Receive</a>
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
                                    if((($total > 0) && ($received > 0)) && ($total == $received) ){?>
                                    <a href="<?=HTTP_ROOT;?>appadmins/processNewbrandPoReceived/<?=$_GET['brand_id'];?>" class="btn btn-info">Proceed to Payment</a>  
                                    <?php }else{ ?>
                                    <a href="#" class="btn btn-info" disabled readonly title="Complete all pending to receive">Proceed to Payment</a>
                                    <?php }
                                }?> 
                            </div>
                            <div id="tab4" class="tab-pane fade <?= (!empty($tab) && ($tab=='tab4'))?' in active ':''; ?>">
                                <div id="brand_fliter_form">
                                    <?=$this->Form->create('',['type'=>'get','url'=>['action'=>'newBrandPo','tab4']]); ?>
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
                                            <th style="width: 10%;text-align: center;">Quantity</th>
                                            <th style="width: 10%;text-align: center;">Po date</th>
                                            <th style="text-align: center;">Po number</th>
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

                                                <td style="text-align: center;"><?php echo $dat_li->qty; ?></td>
                                                <td style="text-align: center;"><?php echo $dat_li->po_date; ?></td>
                                                <td style="text-align: center;">
                                                    <?php echo $dat_li->po_number; ?>
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
</script>
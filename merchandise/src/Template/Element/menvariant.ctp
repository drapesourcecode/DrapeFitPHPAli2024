<?php 
use Cake\Core\Configure;
echo $this->Html->script(array('ckeditor/ckeditor'));
?>
<div class="tab-content" style="width: 100%;float: left;">
                                    <div class="row new_var_xx">
    <?= $this->Form->input('profile_type', ['value' => '1', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Category <sup style="color:red;">*</sup></label>
                                                <select name="product_type" class="form-control" onchange="getSubCatg(this.value);" required <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?> >
                                                    <option value="" selected disabled>Select Category</option>
                                                    <?php foreach ($productType as $type) { ?>
                                                        <option  value="<?php echo $type->id; ?>" <?php echo (!empty($editproduct) && ($editproduct->product_type == $type->id)) ? "selected" : ""; echo (!empty($_GET['ctg']) && ($_GET['ctg'] ==$type->id))?'selected':''; ?>  ><?php echo $type->product_type . '-' . $type->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sub-category <sup style="color:red;">*</sup></label>
                                                <select name="rack" class="form-control" required onchange="setSubCatg(this.value);" <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?> >
                                                    <?php /*if (empty($editproduct)) { ?> 
                                                        <option value="" selected disabled>Select Category first</option>
                                                    <?php }*/ ?>
                                                        <option value='' selected disabled>--</option>
                                                    <?php
                                                    if (!empty($in_rack)) {
                                                        foreach ($in_rack as $rk) {
                                                            ?>
                                                            <option  value="<?php echo $rk->id; ?>"  <?php echo (!empty($editproduct) && ($editproduct->rack == $rk->id)) ? "selected" : ""; ?> ><?php echo $rk->rack_number."-".$rk->rack_name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
<?php if(!empty($_GET['sub_ctg']) || (!empty($editproduct) && !empty($editproduct->rack)) ){ ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 1 <sup style="color:red;">*</sup></label>
    <?= $this->Form->input('product_name_one', ['value' => @$editproduct->product_name_one, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1', 'required', 'maxlength' => "40"]); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="display:none;">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name 2</label>
    <?= $this->Form->input('product_name_two', ['value' => @$editproduct->product_name_two, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 2', 'maxlength' => "40"]); ?>
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Season <sup style="color:red;">*</sup></label>


                                                <ul id="seson" class="list-inline">

                                                    <li><input id="selectAllseson" type="checkbox"><label for='selectAllseson'>Select All</label></li>
                                                    <?php
                                                    $all_seson = ['Spring', 'Summer', 'Fall', 'Winter'];
                                                    foreach ($all_seson as $ky => $al_ses_li) {
                                                        ?>
                                                        <li><input id="all_seso<?= $ky; ?>" type="checkbox" name="season[]" value="<?= $al_ses_li; ?>"  <?php if (!empty($editproduct->season) && in_array($al_ses_li, json_decode($editproduct->season, true))) { ?> checked <?php } ?> /><label for="all_seso<?= $ky; ?>"><?= $al_ses_li; ?></label></li>
        <?php } ?>

                                                </ul>

                                            </div>
                                        </div>  
                                    </div>  
                                        <div class="row">

                                        <?php if(!empty($get_prv_inv_data)){ ?> 
                                            <div class="col-sm-12">
                                                <table id="exampleXX" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Brand Name</th>
                                                            <th>Product Name 1</th>
                                                            <th>Product Image</th>
                                                            <th>Color : Size</th>  
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($get_prv_inv_data as $get_pr_vari_list){
                                                                foreach($get_pr_vari_list->vari_prd_li as $pdetails){
                    
                                                        ?>
                                                        <tr id="<?php echo $pdetails->id; ?>" class="message_box">

                                                            <td><?php echo $this->Custom->brandNamex(@$pdetails->brand_id); ?> </td>

                                                            <!-- <td><?php echo $pdetails->user_id ?></td> -->
                                                            <td><?php echo $get_pr_vari_list->product_name_one; ?></td>
                                                            <td>                                                
                                                                <img src="<?php echo HTTP_ROOT_BASE . PRODUCT_IMAGES; ?><?php echo $get_pr_vari_list->feature_image; ?>" style="width: 50px;"/>                                               
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    echo $pdetails->color.' : '.$pdetails->size;
                                                                ?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                            <?php if($pdetails->is_po == 0){ ?>
                                                            <button type="button" id="btnshowPo<?=$pdetails->id;?>" onclick="$('#showPo<?= $pdetails->id;?>').toggle();$('#btnshowPo<?= $pdetails->id;?>').toggle()" class="btn btn-sm btn-primary">Add to PO</button>
                                                            <a href="<?=HTTP_ROOT;?>appadmins/newBrandPo/tab1/<?=$option;?>?ctg=<?=$_GET['ctg'];?>&sub_ctg=<?=$_GET['sub_ctg'];?>&variant_id=<?=$get_pr_vari_list->id;?>" class="btn btn-sm btn-primary">Add New Variant</a>
                                                            <div id="showPo<?=$pdetails->id;?>" style="display:none;">
                                                                <?= $this->Form->create('',['type'=>'post','id'=>'updateVarPoFrom'.$pdetails->id ,'url'=>['action'=>'addVariantPoRequest']]);?>
                                                                <input type="text" step="1" name="qty" min="1" placeholder="Quantity" style="width:100px;" value="1"  required>
                                                                <input type="hidden"  name="id" value="<?=$pdetails->id;?>">
                                                                <input type="hidden"  name="user_id" value="<?=$getPaymentGatewayDetails->user_id;?>">
                                                                <input type="hidden"  name="kid_id" value="<?=$getPaymentGatewayDetails->kid_id;?>">
                                                                <button type="button" class="btn btn-sm btn-primary" onClick="updateVarPox(<?=$pdetails->id;?>)">Submit</button>
                                                                <?= $this->Form->end(); ?>
                                                            </div>
                                                            <?php }else{ echo "Already in po"; } ?>
                                                            </td>
                                                        </tr>                                            
                                                        <?php } 
                                                        } ?>
                                                    </tbody>
                                                </table>
                                                <script>
                                                    function updateVarPox(id){
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?= HTTP_ROOT; ?>appadmins/updateVarPoFrom",
                                                            data: $("#updateVarPoFrom"+id).serialize(),
                                                            dataType: 'html',
                                                            success: function(result) {                                                    
                                                                $('#btnshowPo'+id).hide();
                                                                $('#showPo'+id).hide();
                                                                alert('Added to PO');
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </div>
                                        <?php } ?>

                                        <?php  if(in_array($product_ctg_nme,["B3", "B4", "B5", "B6","B7", "B1", "B2", "B11", "B10", "B9", "B8", "B14","B12"])){ ?>
                                                        <div class="col-sm-6"   >
                                                            <label for="exampleInputPassword1">What size you prefer?</label>
                                                            <select id="prd_sz_typ" class="form-control" required onchange="prdsztyp(this.value)"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?>>
                                                                <option value="" selected disabled>----</option>
                                                                 <?php if(in_array($product_ctg_nme,["B3", "B4", "B5", "B6"])){ ?>
                                                                <option value="waist_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'waist_size')) ? 'selected' : ''; ?> >Waist size</option>
                                                                 <?php } ?>
                                                                
                                                                <?php if(in_array($product_ctg_nme,["B3", "B4", "B5", "B6","B7"])){ ?>
                                                                <option value="men_bottom"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'men_bottom')) ? 'selected' : ''; ?> > Bottom size </option>
                                                                <?php } ?>
                                                                
                                                                <?php  if(in_array($product_ctg_nme,["B3", "B4", "B5", "B6","B7", "B1","B2", "B11","B10","B9","B8"])){ ?>
                                                                <option value="shirt_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'shirt_size')) ? 'selected' : ''; ?>> Shirt size </option>
                                                                <?php } ?>
                                                                
                                                                <?php if(in_array($product_ctg_nme,["B14","B12"])){ ?>
                                                                <option value="free_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'selected' : ''; ?>> Free size </option>
                                                                <?php } ?>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6"   id="prd_sz_typ_div"  <?=(!empty($editproduct))?'style="pointer-events: none;"':'' ;?>>
                                                            
                                                        </div>
                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'waist_size')){ ?>
                                        <script>
                                            $(document).ready(function(){
                                                prdsztyp('<?=$editproduct->primary_size;?>');
                                            })
                                        </script>
                                            <?php } ?>
                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'men_bottom')){ ?>
                                        <script>
                                            $(document).ready(function(){
                                                prdsztyp('<?=$editproduct->primary_size;?>');
                                            })
                                        </script>
                                            <?php } ?>
                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'shirt_size')){ ?>
                                        <script>
                                            $(document).ready(function(){
                                                prdsztyp('<?=$editproduct->primary_size;?>');
                                            })
                                        </script>
                                            <?php } ?>
                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'free_size')){ ?>
                                        <script>
                                            $(document).ready(function(){
                                                prdsztyp('<?=$editproduct->primary_size;?>');
                                            })
                                        </script>
                                            <?php } ?>
                                            <script> 
                                                function prdsztyp(data){                                                                
                                                    $('#variant_main_div').html('');
                                                    let selectSizeAcc = ``;
                                                    if(data == 'waist_size' ){
                                                                    selectSizeAcc = `<div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="waist_size"  checked required/>
                                                </div>

                                                <div class="col-md-11 recom_div">                                                      
                                                    <div class="col-md-4">
                                                        <label for="exampleInputPassword1">Waist size?  <sup style="color:red;">*</sup></label>
                                                        <select name="[NAME][variant_size_related][waist_size_run]" class="form-control">
                                                            <option <?php if (@$editproduct->waist_size_run == '') { ?> selected="" <?php } ?> value="">--</option>
                                                            <option <?php if (@$editproduct->waist_size_run == 'Sometimes too small') { ?> selected="" <?php } ?> value="Sometimes too small">Sometimes too small</option>
                                                            <option <?php if (@$editproduct->waist_size_run == 'Just right') { ?> selected="" <?php } ?> value="Just right">Just right</option>
                                                            <option <?php if (@$editproduct->waist_size_run == 'Sometimes too big') { ?> selected="" <?php } ?> value="Sometimes too big">Sometimes too big</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Inseam size?  </label>
                                                            <select name="[NAME][variant_size_related][inseam_size]" id="inseam_size" aria-required="true" class="form-control" aria-invalid="false">
                                                                <option <?php if (@$editproduct->inseam_size == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                <option <?php if (@$editproduct->inseam_size == '28') { ?> selected="" <?php } ?> value="28">28</option>
                                                                <option <?php if (@$editproduct->inseam_size == '30') { ?> selected="" <?php } ?> value="30">30</option>
                                                                <option <?php if (@$editproduct->inseam_size == '32') { ?> selected="" <?php } ?> value="32">32</option>
                                                                <option <?php if (@$editproduct->inseam_size == '34') { ?> selected="" <?php } ?> value="34">34</option>
                                                                <option <?php if (@$editproduct->inseam_size == '36') { ?> selected="" <?php } ?> value="36">36</option>
                                                            </select>                                            
                                                        </div>
                                                    </div>                
                                                </div>                
                                                        </div>                            
                                                    </div>`;
                                                                }
                                                                if(data == 'men_bottom' ){
                                                                    selectSizeAcc = `<div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bottom size?  <sup style="color:red;">*</sup></label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="men_bottom" checked required/>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>`;
                                                                }
                                                                if(data == 'shirt_size' ){
                                                                    selectSizeAcc = `<div  >
                                        <div class="form-group">
                                            
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="radio" name="primary_size" value="shirt_size" checked required/>
                                                </div>
                                                <div class="col-md-11 recom_div">                                                      
                                                    <div class="col-md-6">
                                                        <label for="exampleInputPassword1">Shirt size?  <sup style="color:red;">*</sup></label>
                                                        <select name="[NAME][variant_size_related][shirt_size_run]" class="form-control" aria-invalid="false" >
                                                            <option <?php if (@$editproduct->shirt_size_run == '') { ?> selected="" <?php } ?> value="">--</option>
                                                            <option <?php if (@$editproduct->shirt_size_run == 'Sometimes too small') { ?> selected="" <?php } ?> value="Sometimes too small">Sometimes too small</option>
                                                            <option <?php if (@$editproduct->shirt_size_run == 'Just right') { ?> selected="" <?php } ?> value="Just right">Just right</option>
                                                            <option <?php if (@$editproduct->shirt_size_run == 'Sometimes too big') { ?> selected="" <?php } ?> value="Sometimes too big">Sometimes too big</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                                
                                            </div>
                                        </div>
                                    </div>`;
                                                                }
                                                                if(data == 'free_size' ){
                                                                    selectSizeAcc = `<div>
                                                                    <div class="form-group" style="margin-top: 35px;">

                                            <label for="free_size_wo">
                                                <input type="radio" name="primary_size" value="free_size" checked id="free_size_wo" required/>
                                                Free Size  <sup style="color:red;">*</sup>
                                            </label>

                                        </div>
                                                                </div>`
                                                                }
                                                                
                                                                $('#prd_sz_typ_div').hide();
                                                                $('#prd_sz_typ_div').html(selectSizeAcc);
                                                            }
                                                        </script>
                                                        <?php } ?>
                              
                                        
                                        <div class="col-md-12">
                                            <label for="exampleInputPassword1">Variants </label>
                                            <div id="variant_main_div">
                                               
                                            </div>
                                            <div style="margin-top: 10px;margin-button: 10px;">
                                               <button type="button" class="btn btn-info" onclick="addVariants()">Add Variant</button>
                                            </div>
                                            
                                            
                                            <script>
                                                function addVariants(){
                                                    if($('#prd_sz_typ').val() == null ){
                                                        $('#prd_sz_typ').focus();
                                                        return false;
                                                    }
                                                    let inx_numx = Math.floor(Math.random() * 899999 + 100000);
                                                    // let rowCount = $('#payment_table tr').length;
                                                    
                                                    let new_variant_html = `<div class="row" id="variant${inx_numx}">
                                                    <div class="col-md-12">
                                                        <label style="width: 100%;">Color <span style="float: right" onclick="variantDelete('variant${inx_numx}')">Delete</span></label>
                                                        <select name="color[]" id="color${inx_numx}" onchange="showSizeBox(${inx_numx});" class="form-control" required>
                                                            <option value="" selected disabled>----</option>
                                                            <?php foreach($all_colors as $clr){ ?>
                                                                <option value="<?=$clr->name;?>"><?=$clr->name;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div id="color_wise_size_variant_main_div${inx_numx}" style="display:none;">
                                                
                                                        </div>  
                                                        <button type="button" onclick="showSizeBox(${inx_numx})" class="add_more_btn${inx_numx}" style="display:none;">Add more size</button>
                                                       
                                                    </div>
                                                </div>`;
                                                    
                                                    $('#variant_main_div').append(new_variant_html);

                                                    let sel_colo_array = []
                                                    $('select[id^=color]').each(function(index,value){
                                                        sel_colo_array.push(value.value);
                                                        $("#color"+inx_numx+" option[value='"+ value.value + "']").attr('disabled', true);
                                                    })
                                                }
                                                function showSizeBox(id){                                                    
                                                    $('#color'+id).css({'cursor': 'not-allowed', 'pointer-events': 'none'});
                                                    let value = $('#color'+id).val();
                                                    
                                                    $('#color_wise_size_variant_main_div'+id).show();
                                                    $('.add_more_btn'+id).hide();//Show add more size button
                                                    let inx_numx = Math.floor(Math.random() * 899999 + 100000);
                                                    let new_size_html =`<div class="row"  id="color_size_div${inx_numx}">
                                                            <div class="col-md-6">
                                                                <label style="width: 100%;">Size <span style="float: right" onclick="variantDelete('color_size_div${inx_numx}')">Delete</span></label>
                                                                <select name="size[${value}][]" id="var_sizes${inx_numx}" onchange="showDetailsBox(${inx_numx},${id});$('.add_more_btn${id}').show();" class="form-control" required>
                                                            <option value="" selected disabled>----</option>
                                                            <?php foreach($all_sizes as $sz){ ?>
                                                                <option value="<?=$sz->size;?>"><?=$sz->size;?></option>
                                                            <?php } ?>
                                                        </select>
                                                            </div>
                                                            <div class="col-md-6" id="showSizeDetails${inx_numx}" style="display:none;">
                                                                
                                                            </div>
                                                            
                                                            
                                                        </div>`;
                                                     $('#color_wise_size_variant_main_div'+id).append(new_size_html);

                                                     let sel_sz_array = [];
                                                    $('#variant'+id+' select[id^=var_sizes]').each(function(index,value){
                                                        sel_sz_array.push(value.value);
                                                        $("#var_sizes"+inx_numx+" option[value='"+ value.value + "']").attr('disabled', true);
                                                    })
                                                    console.log(sel_sz_array);
                                                    
                                                }
                                                function showDetailsBox(id,parent_id){
                                                    let value =  $('#var_sizes'+id).val();
                                                    let color_value =  $('#color'+parent_id).val();
                                                    let inx_numx = Math.floor(Math.random() * 899999 + 100000);
                                                    let recom_html = $('#prd_sz_typ_div .recom_div').html();
                                                    // console.log(recom_html);
                                                    if(recom_html != undefined){
                                                        recom_html = recom_html.replace(/\[NAME]/g,`variant_data[${color_value}][${value}]`);
                                                    }else{
                                                        recom_html = '';
                                                    }
                                                    // console.log(recom_html);
                                                    $('#showSizeDetails'+id).show();
                                                    let new_size_details_html =` <div class="row">${recom_html}</div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Height range <sup style="color:red;">*</sup></label>
                                                                            <div class="women-select-boxes">
                                                                                <div class="women-select1">
                                                                                    <select name="variant_data[${color_value}][${value}][tall_feet1]" id="tall_feet" class="form-control" required>
                                                                                        <option value="" selected>--</option>
                                                                                        <option value="4">4</option>
                                                                                        <option value="5">5</option>
                                                                                        <option value="6">6</option>
                                                                                    </select>
                                                                                    <label>ft.</label>
                                                                                </div>
                                                                                <div class="women-select1">
                                                                                    <select name="variant_data[${color_value}][${value}][tall_inch1]" id="tall_inch" class="form-control">
                                                                                        <option  value="" selected>--</option>
                                                                                        <option  value="0">0</option>
                                                                                        <option  value="1">1</option>
                                                                                        <option  value="2">2</option>
                                                                                        <option  value="3">3</option>
                                                                                        <option  value="4">4</option>
                                                                                        <option  value="5">5</option>
                                                                                        <option  value="6">6</option>
                                                                                        <option  value="7">7</option>
                                                                                        <option  value="8">8</option>
                                                                                        <option  value="9">9</option>
                                                                                        <option  value="10">10</option>
                                                                                        <option  value="11">11</option>
                                                                                    </select>

                               
                                                                                </div>
                                                                                <span>to</span>
                                                                                <div class="women-select1">

                                                                                    <select name="variant_data[${color_value}][${value}][tall_feet2]" id="tall_feet2" class="form-control" required>
                                                                                        <option  value="" selected>--</option>
                                                                                        <option  value="4">4</option>
                                                                                        <option  value="5">5</option>
                                                                                        <option  value="6">6</option>
                                                                                    </select>
                                                                                    <label>ft.</label>
                                                                                </div>
                                                                                <div class="women-select1">
                                                                                    <select name="variant_data[${color_value}][${value}][tall_inch2]" id="tall_inch2" class="form-control">
                                                                                        <option  value="" selected>--</option>
                                                                                        <option  value="0">0</option>
                                                                                        <option  value="1">1</option>
                                                                                        <option  value="2">2</option>
                                                                                        <option  value="3">3</option>
                                                                                        <option  value="4">4</option>
                                                                                        <option  value="5">5</option>
                                                                                        <option  value="6">6</option>
                                                                                        <option  value="7">7</option>
                                                                                        <option  value="8">8</option>
                                                                                        <option  value="9">9</option>
                                                                                        <option  value="10">10</option>
                                                                                        <option  value="11">11</option>
                                                                                    </select>

                               
                                                                                </div>
                                                                            </div>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Weight range <sup style="color:red;">*</sup></label>
                                                                            <div class="women-select-boxes">
                                                                                <div class="women-select2">
                                <input name='variant_data[${color_value}][${value}][best_fit_for_weight1]' value  = '' type = 'text' class = "form-control" placeholder ='Please enter your weight' required>                                                            
                                                                                </div>
                                                                                <span>to</span>
                                                                                <div class="women-select2">
                                <input name='variant_data[${color_value}][${value}][best_fit_for_weight2]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter your weight' required >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Age range <sup style="color:red;">*</sup></label>
                                                                            <div class="women-select-boxes">
                                                                                <div class="women-select2">
                               <input name='variant_data[${color_value}][${value}][age1]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter your age' required >                                                           
                                                                                </div>
                                                                                <span>to</span>
                                                                                <div class="women-select2">
                               <input name='variant_data[${color_value}][${value}][age2]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter your age' required > 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Purchase price ? <sup style="color:red;">*</sup></label>
                                   <input name='variant_data[${color_value}][${value}][purchase_price]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter purchase price' required > 
                            
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">sale_price ? <sup style="color:red;">*</sup></label>
                                       <input name='variant_data[${color_value}][${value}][sale_price]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter sale price' required > 
                              
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Clearance price</label>
                                           <input name='variant_data[${color_value}][${value}][clearance_price]'  value = '' type = 'text' class = "form-control" placeholder = 'Please enter sale price' > 
  
                                        </div>
                                    </div>
                                    <div class="col-md-12  var_qty">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quantity ? <sup style="color:red;">*</sup></label>
                                                <input name='variant_data[${color_value}][${value}][quantity]'  value = '' type = 'text' class = "form-control"  placeholder = 'Please enter quantity' <?= !empty($this->request->session()->read('new_variant_po_data'))?"":'required';?> min = "0" steps='1'> 
       
                                            </div>
                                        </div>  
                                        <div class="col-md-12 skin">
                                            <label >Skin tone ?</label>
                                            <ul>
                                                <li>
                                                    <input class="radio-box" value="1"  id="radio${inx_numx}a" name="variant_data[${color_value}][${value}][skin_tone][]" type="checkbox">
                                                    <label for="radio${inx_numx}a"></label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" value="2"  id="radio${inx_numx}b" name="variant_data[${color_value}][${value}][skin_tone][]" type="checkbox">
                                                    <label for="radio${inx_numx}b"></label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" value="3" id="radio${inx_numx}c" name="variant_data[${color_value}][${value}][skin_tone][]" type="checkbox">
                                                    <label for="radio${inx_numx}c"></label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" value="4" id="radio${inx_numx}d" name="variant_data[${color_value}][${value}][skin_tone][]" type="checkbox">
                                                    <label for="radio${inx_numx}d"></label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" value="5" id="radio${inx_numx}e" name="variant_data[${color_value}][${value}][skin_tone][]" type="checkbox">
                                                    <label for="radio${inx_numx}e"></label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" value="6" id="radio${inx_numx}f" name="variant_data[${color_value}][${value}][skin_tone][]" type="checkbox">
                                                    <label for="radio${inx_numx}f"><span>OTHER</span></label>
                                                </li>
                                            </ul>
                                        </div>  
                                                                </div> `;
                                                    $('#showSizeDetails'+id).html(new_size_details_html);
                                                }
                                                function variantDelete(id){
                                                    $('#'+id).remove();
                                                }
                                            </script>
                                        </div>  
                                        
                                  
                                        
                                        
                                   
    
                                    
                                        
                                        
                                         
                                        
                                        

                                        <?php /*if(in_array($product_ctg_nme,["B14","B12"])){ ?>
                                    <div class="col-md-6 " >
                                        <div class="form-group" style="margin-top: 35px;">

                                            <label for="free_size_wo">
                                                <input type="radio" name="primary_size" value="free_size" <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'checked' : ''; ?> id="free_size_wo" required/>
                                                Free Size  <sup style="color:red;">*</sup>
                                            </label>

                                        </div>
                                    </div>
                                        <?php }*/ ?>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Profession</label>
                                            
                                            <select name="profession[]" id="profession" class="form-control select3_select" multiple>
                                                <!--  <option value="" <?php //if (!empty($editproduct->profession) && in_array('NULL', json_decode($editproduct->profession, true))) { ?> selected <?php //} ?> >--</option>-->
                                                <option value="1" <?php if (!empty($editproduct->profession) && in_array(1, json_decode($editproduct->profession, true))) { ?> selected <?php } ?> >Architecture / Engineering</option>
                                                <option value="2" <?php if (!empty($editproduct->profession) && in_array(2, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Art / Design</option>
                                                <option value="3" <?php if (!empty($editproduct->profession) && in_array(3, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Building / Maintenance</option>
                                                <option value="4" <?php if (!empty($editproduct->profession) && in_array(4, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Business / Client Service</option>
                                                <option value="5" <?php if (!empty($editproduct->profession) && in_array(5, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Community / Social Service</option>
                                                <option value="6" <?php if (!empty($editproduct->profession) && in_array(6, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Computer / IT</option>
                                                <option value="7" <?php if (!empty($editproduct->profession) && in_array(7, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Education</option>
                                                <option value="8" <?php if (!empty($editproduct->profession) && in_array(8, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Entertainer / Performer</option>
                                                <option value="9" <?php if (!empty($editproduct->profession) && in_array(9, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Farming / Fishing / Forestry</option>
                                                <option value="10" <?php if (!empty($editproduct->profession) && in_array(10, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Financial Services</option>
                                                <option value="11" <?php if (!empty($editproduct->profession) && in_array(11, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Health Practitioner / Technician</option>
                                                <option value="12" <?php if (!empty($editproduct->profession) && in_array(12, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Hospitality / Food Service</option>
                                                <option value="13" <?php if (!empty($editproduct->profession) && in_array(13, json_decode($editproduct->profession, true))) { ?> selected <?php } ?> >Management</option>
                                                <option value="14" <?php if (!empty($editproduct->profession) && in_array(14, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Media / Communications</option>
                                                <option value="15" <?php if (!empty($editproduct->profession) && in_array(15, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Military / Protective Service</option>
                                                <option value="16" <?php if (!empty($editproduct->profession) && in_array(16, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Legal</option>
                                                <option value="17" <?php if (!empty($editproduct->profession) && in_array(17, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Office / Administration</option>
                                                <option value="18" <?php if (!empty($editproduct->profession) && in_array(18, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Average</option>
                                                <option value="19" <?php if (!empty($editproduct->profession) && in_array(19, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Personal Care & Service</option>
                                                <option value="20" <?php if (!empty($editproduct->profession) && in_array(20, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Production / Manufacturing</option>
                                                <option value="21" <?php if (!empty($editproduct->profession) && in_array(21, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Retail</option>
                                                <option value="22" <?php if (!empty($editproduct->profession) && in_array(22, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Sales</option>
                                                <option value="23" <?php if (!empty($editproduct->profession) && in_array(23, json_decode($editproduct->profession, true))) { ?> selected <?php } ?> >Science</option>
                                                <option value="24" <?php if (!empty($editproduct->profession) && in_array(24, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Technology</option>
                                                <option value="25" <?php if (!empty($editproduct->profession) && in_array(25, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Transportation</option>
                                                <option value="26" <?php if (!empty($editproduct->profession) && in_array(26, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Self-Employed</option>
                                                <option value="27" <?php if (!empty($editproduct->profession) && in_array(27, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Stay-At-Home Parent</option>
                                                <option value="28" <?php if (!empty($editproduct->profession) && in_array(28, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Student</option>
                                                <option value="29" <?php if (!empty($editproduct->profession) && in_array(29, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Retired</option>
                                                <option value="30" <?php if (!empty($editproduct->profession) && in_array(30, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Not Employed</option>
                                                <option value="31" <?php if (!empty($editproduct->profession) && in_array(31, json_decode($editproduct->profession, true))) { ?> selected <?php } ?>>Other</option>
                                            </select>
                                            
                                            <script>                                                
                                                const addSelectAll = matches => {
                                                        if (matches.length > 0) {
                                                        // Insert a special "Select all matches" item at the start of the 
                                                        // list of matched items.
                                                        return [        
                                                            ...matches,
                                                            {id: 'selectAll', text: 'Select all', matchIds: matches.map(match => match.id)},
                                                            {id: 'deSelectAll', text: 'Deselect all', matchIds: matches.map(match => match.id)},
                                                        ];
                                                        }
                                                    };
                                                    const handleSelection = event => {
                                                        if (event.params.data.id === 'selectAll') {
                                                            $('#profession').val(event.params.data.matchIds);
                                                            $('#profession').trigger('change');
                                                        };
                                                        if (event.params.data.id === 'deSelectAll') {
                                                            $('#profession').val('');
                                                            $('#profession').trigger('change');
                                                        };
                                                    };
                                                    $('#profession').select2({
                                                        multiple: true,
                                                        sorter: addSelectAll
                                                    });
                                                    $("#profession").on('select2:select', handleSelection);
                                            </script>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Best Size Fit ?</label>
                                            <select name="best_size_fit" class="form-control" aria-invalid="false" >
                                                <option <?php if (@$editproduct->best_size_fit == '') { ?> selected="" <?php } ?> value="">--</option>
                                                <option <?php if (@$editproduct->best_size_fit == '1') { ?> selected="" <?php } ?> value="1">Sometimes too small</option>
                                                <option <?php if (@$editproduct->best_size_fit == '2') { ?> selected="" <?php } ?> value="2">Just right</option>
                                                <option <?php if (@$editproduct->best_size_fit == '3') { ?> selected="" <?php } ?> value="3">Sometimes too big</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row new_var_xx">
                                  
                                    
                                </div>
                              
                                <div class="row new_var_xx">
                                

                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box body-men">
                                        <h3>Tell us Your body Shape?</h3>
                                        <ul>
                                            <li>
                                                <h4 style="margin-top: 0;">Rectangle</h4>
                                                <input class="radio-box" id="radio2" name="better_body_shape[]" value="2" type="checkbox" <?php if (!empty($editproduct->better_body_shape) && in_array(2, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?> >
                                                <label for="radio2">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-2.png" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Triangle</h4>
                                                <input class="radio-box" id="radio3" type="checkbox" name="better_body_shape[]" value="3" <?php if (!empty($editproduct->better_body_shape) && in_array(3, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio3">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-3.png" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Trapezoid</h4>
                                                <input class="radio-box" name="better_body_shape[]" value="1" id="radio1" type="checkbox" <?php if (!empty($editproduct) && (!empty($editproduct->better_body_shape) && in_array(1, json_decode($editproduct->better_body_shape, true)))) { ?> checked <?php } ?> >
                                                <label for="radio1">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-1.png" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Oval</h4>
                                                <input class="radio-box" id="radio4" type="checkbox" name="better_body_shape[]" value="4" <?php if (!empty($editproduct->better_body_shape) && in_array(4, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio4">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-4.png" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Inverted Triangle</h4>
                                                <input class="radio-box" id="radio5" type="checkbox" name="better_body_shape[]" value="5" <?php if (!empty($editproduct->better_body_shape) && in_array(5, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio5">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/images/men/size-5.png" alt="">
                                                </label>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                                <div class="row new_var_xx">


                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Typically wear to work? </label>                                                                                        
                                            <select name="work_type[]" id="work_type" aria-required="true" class="form-control select2_select" aria-invalid="false" multiple required>                                                
                                                <option <?php if (!empty($editproduct->work_type) && in_array(NULL, json_decode($editproduct->work_type, true))) { ?> selected <?php } ?> value=""   disabled>--</option>
                                                <option <?php if (!empty($editproduct->work_type) && in_array(1, json_decode($editproduct->work_type, true))) { ?> selected <?php } ?> value="1">Casual</option>
                                                <option<?php if (!empty($editproduct->work_type) && in_array(2, json_decode($editproduct->work_type, true))) { ?> selected <?php } ?> value="2">Business Casual</option>
                                                <option<?php if (!empty($editproduct->work_type) && in_array(3, json_decode($editproduct->work_type, true))) { ?> selected <?php } ?> value="3">Formal</option>
                                                    <!--  <option <?php if (@$editproduct->work_type == '4') { ?> selected="" <?php } ?> value="4">Oval</option>
                                                <option <?php if (@$editproduct->work_type == '5') { ?> selected="" <?php } ?> value="5">Inverted Triangle</option>-->
                                            </select>
                                            <span id="work_type-error" class="error" style="display: inline;">This field is required.</span>                                                                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <?php
                                    if(in_array($product_ctg_nme,["B1","B2", "B11","B10","B9","B8","B7"])){ ?>
                                    <div class="col-md-6"  <?= ((in_array($product_sub_ctg_nme, ['B72','B73'])))?'style="display:none;"':'';?>>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Casual shirts to fit ? <sup style="color:red;">*</sup></label>
                                            <select name="casual_shirts_type" class="form-control"  <?= ((in_array($product_sub_ctg_nme, ['B72','B73'])))?'':'required';?>> 
                                                <option <?php if (@$editproduct->casual_shirts_type == 'NULL') { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if (@$editproduct->casual_shirts_type == '4') { ?> selected="" <?php } ?> value="4">Slim</option>                                
                                                <option <?php if (@$editproduct->casual_shirts_type == '5') { ?> selected="" <?php } ?> value="5">Regular</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if(in_array($product_ctg_nme,["B2", "B11","B10","B9","B8"])){ ?>
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Button up shirt to fit ? <sup style="color:red;">*</sup></label>
                                            <select name="bottom_up_shirt_fit" aria-required="true" class="form-control" aria-invalid="false" required>
                                                <option <?php if (@$editproduct->bottom_up_shirt_fit == 'NULL') { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if (@$editproduct->bottom_up_shirt_fit == '6') { ?> selected="" <?php } ?> value="6">Slim</option>                                
                                                <option <?php if (@$editproduct->bottom_up_shirt_fit == '7') { ?> selected="" <?php } ?> value="7">Regular</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="row new_var_xx">
                                    <?php if(in_array($product_ctg_nme,["B3","B4","B5","B7"])){ ?>
                                   
                                    <div class="col-md-6"  <?= ((in_array($product_sub_ctg_nme, ['B71','B72'])))?'style="display:none;"':'';?> >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Jeans to Fit ? <sup style="color:red;">*</sup></label>
                                            <select name="jeans_Fit" class="form-control" <?= ((in_array($product_sub_ctg_nme, ['B71','B72'])))?'':'required';?> >
                                                <option <?php if (@$editproduct->jeans_Fit == 'NULL') { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if (@$editproduct->jeans_Fit == '3') { ?> selected="" <?php } ?> value="3">Straight</option>                                
                                                <option <?php if (@$editproduct->jeans_Fit == '2') { ?> selected="" <?php } ?> value="2">Slim</option>
                                                <option <?php if (@$editproduct->jeans_Fit == '1') { ?> selected="" <?php } ?> value="1">Skinny</option>                                
                                                <option <?php if (@$editproduct->jeans_Fit == '4') { ?> selected="" <?php } ?> value="4">Relaxed</option>                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                    
                                   
                                    
                                    <?php if(in_array($product_ctg_nme,["B6","B7"])){ ?>
                                    <div class="col-md-6"  <?= ((in_array($product_sub_ctg_nme, ['B71','B73'])))?'style="display:none;"':'';?>>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Shorts long ? <sup style="color:red;">*</sup></label>
                                            <select name="shorts_long" aria-required="true" class="form-control" aria-invalid="false"  <?= ((in_array($product_sub_ctg_nme, ['B71','B73'])))?'':'required';?>>
                                                <option <?php if (@$editproduct->shorts_long == 'NULL') { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if (@$editproduct->shorts_long == '4') { ?> selected="" <?php } ?> value="4">Upper Thigh</option>                                
                                                <option <?php if (@$editproduct->shorts_long == '3') { ?> selected="" <?php } ?> value="3">Lower Thigh</option>
                                                <option <?php if (@$editproduct->shorts_long == '2') { ?> selected="" <?php } ?> value="2">Above Knee</option>                                
                                                <option <?php if (@$editproduct->shorts_long == '1') { ?> selected="" <?php } ?> value="1">At The Knee</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="row new_var_xx">
                                    <?php if(in_array($product_ctg_nme,["B7","B3","B4","B5"])){ ?>
                                    <div class="col-md-6"  <?= ((in_array($product_sub_ctg_nme, ['B71','B72'])))?'style="display:none;"':'';?>>
                                        <div class="form-group">
                                            <label for="men_bottom_prefer">Bottom fit ?  <sup style="color:red;">*</sup></label>
                                            <select name="men_bottom_prefer" aria-required="true" class="form-control" aria-invalid="false" id="men_bottom_prefer"  <?= ((in_array($product_sub_ctg_nme, ['B71','B72'])))?'':'required';?>>
                                                <option <?php if (@$editproduct->men_bottom_prefer == 'NULL') { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if (@$editproduct->men_bottom_prefer == '1') { ?> selected="" <?php } ?> value="1">Tighter Fitting</option>
                                                <option <?php if (@$editproduct->men_bottom_prefer == '2') { ?> selected="" <?php } ?> value="2">More Relaxed</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!--                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword1">Outfit matches ?</label>
                                                                                    <select name="outfit_matches" aria-required="true" class="form-control" aria-invalid="false">
                                                                                        <option <?php if (@$editproduct->outfit_matches == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                                        <option <?php if (@$editproduct->outfit_matches == '1') { ?> selected="" <?php } ?> value="1">Upper Thigh</option>
                                                                                        <option <?php if (@$editproduct->outfit_matches == '2') { ?> selected="" <?php } ?> value="2">Lower Thigh</option>
                                                                                        <option <?php if (@$editproduct->outfit_matches == '3') { ?> selected="" <?php } ?> value="3">Above Knee</option>
                                                                                        <option <?php if (@$editproduct->outfit_matches == '4') { ?> selected="" <?php } ?> value="4">At The Knee</option>
                                                                                    </select>                                            
                                                                                </div>
                                                                            </div>-->
                                </div>
                                <div class="form-box-data new_var_xx">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <div class="type-box type-box2 error-issues">
                                                <h3>Tell us which of these outfits would you prefer to wear?</h3>

                                                <ul>
                                                    <li>
                                                        <input class="radio-box" name="style_sphere_selections_v5[]" value="1" id="mens101" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(1, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?> >
                                                        <label for="mens101"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit1.jpg" alt="">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input class="radio-box" name="style_sphere_selections_v5[]" value="2" type="checkbox" id="mens102"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(2, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens102"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit2.jpg" alt="">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input class="radio-box" id="mens103" name="style_sphere_selections_v5[]" value="3" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(3, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens103"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit3.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens104" name="style_sphere_selections_v5[]" value="4" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(4, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens104"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit4.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens105" name="style_sphere_selections_v5[]" value="5" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(5, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens105"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit5.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens106" name="style_sphere_selections_v5[]" value="6" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(6, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens106"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit6.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens107" name="style_sphere_selections_v5[]" value="7" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(7, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens107"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit7.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens108" name="style_sphere_selections_v5[]" value="8" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(8, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens108"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit8.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens109" name="style_sphere_selections_v5[]" value="9" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(9, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens109"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit9.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens110" name="style_sphere_selections_v5[]" value="10" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(10, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens110"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit10.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>
                                                        <input class="radio-box" id="mens111" name="style_sphere_selections_v5[]" value="11" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(11, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens111"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit11.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens112" name="style_sphere_selections_v5[]" value="12" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(12, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens112"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit12.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens113" name="style_sphere_selections_v5[]" value="13" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(13, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens113"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit13.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens114" name="style_sphere_selections_v5[]" value="14" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(14, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens114"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit14.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens115" name="style_sphere_selections_v5[]" value="15" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(15, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens115"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit15.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens116" name="style_sphere_selections_v5[]" value="16" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(16, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens116"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit16.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens117" name="style_sphere_selections_v5[]" value="17" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(17, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens117"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit17.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens118" name="style_sphere_selections_v5[]" value="18" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(18, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens118"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit18.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens119" name="style_sphere_selections_v5[]" value="19" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(19, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens119"  onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit19.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens120" name="style_sphere_selections_v5[]" value="20" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(20, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?>>
                                                        <label for="mens120" onclick="$('#mens12300').removeAttr('checked');">
                                                            <img src="<?php echo HTTP_ROOT_BASE ?>assets/images/men/outfit20.jpg" alt="">
                                                        </label>
                                                    </li>  
                                                    <li>                                                            
                                                        <input class="radio-box" id="mens12300" name="style_sphere_selections_v5[]" value="0" type="checkbox"  <?php if (!empty($editproduct->style_sphere_selections_v5) && in_array(0, json_decode($editproduct->style_sphere_selections_v5, true))) { ?> checked <?php } ?> >
                                                        <label for="mens12300" onclick="updateChkbox()">
                                                            <img src="" alt="NONE">
                                                        </label>
                                                    </li>  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-box-data new_var_xx">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12 col-md-12 note-label">
                                            <h3>Any fit issues to take note of?</h3>
                                            <ul>
                                                <li>
                                                    <input class="radio-box" id="check-box3a" name="take_note_of[]" type="checkbox" value='1'  <?php if (!empty($editproduct->take_note_of) && in_array(1, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3a">Long Arms</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3b" name="take_note_of[]" type="checkbox" value='2'  <?php if (!empty($editproduct->take_note_of) && in_array(2, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3b">Short Arms</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3c" name="take_note_of[]" type="checkbox" value='3'  <?php if (!empty($editproduct->take_note_of) && in_array(3, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?>  >
                                                    <label for="check-box3c">Thick Arms</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" value='15' id="check-box3d" name="take_note_of[]" type="checkbox"  <?php if (!empty($editproduct->take_note_of) && in_array(15, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?>  >
                                                    <label for="check-box3d">Broad Shoulders</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3e" name="take_note_of[]" type="checkbox" value='4'  <?php if (!empty($editproduct->take_note_of) && in_array(4, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?>  >
                                                    <label for="check-box3e">Man Boobs</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3f" name="take_note_of[]" type="checkbox" value='5'   <?php if (!empty($editproduct->take_note_of) && in_array(5, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3f">Big Belly</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3g" name="take_note_of[]" type="checkbox" value='6'    <?php if (!empty($editproduct->take_note_of) && in_array(6, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3g">Big Butt</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3h" name="take_note_of[]" type="checkbox" value='14'   <?php if (!empty($editproduct->take_note_of) && in_array(14, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3h">Small Butt</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3i" name="take_note_of[]" type="checkbox" value='7'   <?php if (!empty($editproduct->take_note_of) && in_array(7, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3i">Thunder Things</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3j" name="take_note_of[]" type="checkbox" value='8'   <?php if (!empty($editproduct->take_note_of) && in_array(8, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3j">Thick Neck</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" type="checkbox" id="check-box3k" name="take_note_of[]"  value='9'   <?php if (!empty($editproduct->take_note_of) && in_array(9, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3k">Short Torso</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3l"  value = '13' name="take_note_of[]" type="checkbox"   <?php if (!empty($editproduct->take_note_of) && in_array(13, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3l">Long Torso</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3m" name="take_note_of[]" type="checkbox" value='10'   <?php if (!empty($editproduct->take_note_of) && in_array(10, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3m">Broad Cheast</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3n" name="take_note_of[]" type="checkbox" value='11'   <?php if (!empty($editproduct->take_note_of) && in_array(11, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3n">Very Skinny</label>
                                                </li>
                                                <li>
                                                    <input class="radio-box" id="check-box3o" name="take_note_of[]" type="checkbox" value='12'   <?php if (!empty($editproduct->take_note_of) && in_array(12, json_decode($editproduct->take_note_of, true))) { ?> checked <?php } ?> >
                                                    <label for="check-box3o">Skinny Legs</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-12">
                                        <h4><b>Budget</b></h4>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_shirt_budg" <?php if ((@$editproduct->budget_type == "men_shirt_budg")) { ?> checked <?php } ?>> 
                                                SHIRTS
                                            </label>

                                            <select name="men_shirt_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$50 - $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$75 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$100 - $125</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shirt_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$125+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_polos_budg" <?php if ((@$editproduct->budget_type == "men_polos_budg")) { ?> checked <?php } ?> > 
                                                TEES & POLOS
                                            </label>

                                            <select name="men_polos_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $30</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$30 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$50 - $70</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$70 - $90</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_polos_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$90+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_sweater_budg" <?php if ((@$editproduct->budget_type == "men_sweater_budg")) { ?> checked <?php } ?>> 
                                                SWEATERS & SWEATSHIRTS
                                            </label>

                                            <select name="men_sweater_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$50 - $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$75 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$100 - $125</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_sweater_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$125+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_pants_budg" <?php if ((@$editproduct->budget_type == "men_pants_budg")) { ?> checked <?php } ?> > 
                                                PANTS & DENIM
                                            </label>

                                            <select name="men_pants_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $100</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$100 - $125</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$125 - $175</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_pants_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$175+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_shorts_budg" <?php if ((@$editproduct->budget_type == "men_shorts_budg")) { ?> checked <?php } ?>> 
                                                SHORTS
                                            </label>

                                            <select name="men_shorts_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $40</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$40 - $60</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$60 - $80</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$80 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shorts_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$100+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_shoe_budg" <?php if ((@$editproduct->budget_type == "men_shoe_budg")) { ?> checked <?php } ?> > 
                                                SHOES 
                                            </label>

                                            <select name="men_shoe_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $125</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$125 - $175</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$175 - $250</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_shoe_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$250+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_outerwear_budg" <?php if ((@$editproduct->budget_type == "men_outerwear_budg")) { ?> checked <?php } ?>> 
                                                OUTERWEAR
                                            </label>

                                            <select name="men_outerwear_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $125</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$125 - $175</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_outerwear_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$175 - $250</option> 

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_ties_budg" <?php if ((@$editproduct->budget_type == "men_ties_budg")) { ?> checked <?php } ?> > 
                                                Ties 
                                            </label>

                                            <select name="men_ties_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_ties_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_ties_budg") && (@$editproduct->budget_value == '40-60')) { ?> selected="" <?php } ?> value="40-60">$40 - $60</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_ties_budg") && (@$editproduct->budget_value == 'up-to-80')) { ?> selected="" <?php } ?> value="up-to-80">Up to $80</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_ties_budg") && (@$editproduct->budget_value == 'up-to-100')) { ?> selected="" <?php } ?> value="up-to-100">Up to  $100</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_belts_budg" <?php if ((@$editproduct->budget_type == "men_belts_budg")) { ?> checked <?php } ?>> 
                                                Belts
                                            </label>
                                            <select name="men_belts_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_belts_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_belts_budg") && (@$editproduct->budget_value == '30-50')) { ?> selected="" <?php } ?> value="30-50">$30 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_belts_budg") && (@$editproduct->budget_value == 'up-to-70')) { ?> selected="" <?php } ?> value="up-to-70">Up to $70</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_belts_budg") && (@$editproduct->budget_value == 'up-to-90')) { ?> selected="" <?php } ?> value="up-to-90"> Up to  $90</option> 
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_bags_budg" <?php if ((@$editproduct->budget_type == "men_bags_budg")) { ?> checked <?php } ?> > 
                                                Wallets,Bags, Accessories 
                                            </label>

                                            <select name="men_bags_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_bags_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_bags_budg") && (@$editproduct->budget_value == '25-50')) { ?> selected="" <?php } ?> value="25-50">$25 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_bags_budg") && (@$editproduct->budget_value == 'up-to-75')) { ?> selected="" <?php } ?> value="up-to-75">Up to $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_bags_budg") && (@$editproduct->budget_value == 'up-to-100')) { ?> selected="" <?php } ?> value="up-to-100">Up to  $100</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_sunglass_budg" <?php if ((@$editproduct->budget_type == "men_sunglass_budg")) { ?> checked <?php } ?>> 
                                                Sunglasses
                                            </label>
                                            <select name="men_sunglass_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == '40-60')) { ?> selected="" <?php } ?> value="40-60">$40 - $60/option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == 'up-to-80')) { ?> selected="" <?php } ?> value="up-to-80">Up to $80</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == 'up-to-100')) { ?> selected="" <?php } ?> value="up-to-100"> Up to  $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "men_sunglass_budg") && (@$editproduct->budget_value == '100-150')) { ?> selected="" <?php } ?> value="100-150"> $100 - $150</option> 
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_hats_budg" <?php if ((@$editproduct->budget_type == "men_hats_budg")) { ?> checked <?php } ?> > 
                                                Hats
                                            </label>

                                            <select name="men_hats_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_hats_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_hats_budg") && (@$editproduct->budget_value == '30-50')) { ?> selected="" <?php } ?> value="30-50">$30 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_hats_budg") && (@$editproduct->budget_value == 'up-to-70')) { ?> selected="" <?php } ?> value="up-to-70">Up to $70</option>
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="budget_type" value="men_socks_budg" <?php if ((@$editproduct->budget_type == "men_socks_budg")) { ?> checked <?php } ?>> 
                                                Socks
                                            </label>
                                            <select name="men_socks_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_socks_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_socks_budg") && (@$editproduct->budget_value == '10-25')) { ?> selected="" <?php } ?> value="10-25">$10 - $25</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_socks_budg") && (@$editproduct->budget_value == 'up-to-35')) { ?> selected="" <?php } ?> value="up-to-35">Up to $35</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_socks_budg") && (@$editproduct->budget_value == 'up-to-45')) { ?> selected="" <?php } ?> value="up-to-45">Up to $45</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_underwear_budg" <?php if ((@$editproduct->budget_type == "men_underwear_budg")) { ?> checked <?php } ?> > 
                                                Underwear
                                            </label>

                                            <select name="men_underwear_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_underwear_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_underwear_budg") && (@$editproduct->budget_value == '10-25')) { ?> selected="" <?php } ?> value="10-25">$10 - $25</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_underwear_budg") && (@$editproduct->budget_value == 'up-to-35')) { ?> selected="" <?php } ?> value="up-to-35">Up to $35</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_underwear_budg") && (@$editproduct->budget_value == 'up-to-45')) { ?> selected="" <?php } ?> value="up-to-45">Up to $45</option>
                                            </select>                                       
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="budget_type" value="men_grooming_budg" <?php if ((@$editproduct->budget_type == "men_hats_budg")) { ?> checked <?php } ?> > 
                                                Grooming
                                            </label>

                                            <select name="men_grooming_budg" class="form-control" >
                                                <option <?php if ((@$editproduct->budget_type == "men_grooming_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value=""  selected disabled>I want the best</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_grooming_budg") && (@$editproduct->budget_value == '10-25')) { ?> selected="" <?php } ?> value="10-25">$10 - $25</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_grooming_budg") && (@$editproduct->budget_value == 'up-to-35')) { ?> selected="" <?php } ?> value="up-to-35">Up to $35</option>
                                                <option <?php if ((@$editproduct->budget_type == "men_grooming_budg") && (@$editproduct->budget_value == 'up-to-45')) { ?> selected="" <?php } ?> value="up-to-45">Up to $45</option>
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    

                                    <?php if (empty($editproduct)) { ?>
                                                                        
                                    <?php } ?>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Brand Name <sup style="color:red;">*</sup></label>
                                            <select name="brand_id" id="brand_id" class="form-control" required>
                                                <option value="" selected disabled>--</option>
                                                <?php
                                                foreach ($brandsListings as $brandnm) {
                                                    if (empty(@$editproduct) && ($brandnm->is_active != 0)) {
                                                        ?>

                                                        <option <?php if ($brandnm->id == @$editproduct->brand_id) { ?> selected=""<?php } ?> value="<?php echo $brandnm->id; ?>"><?php echo $brandnm->brand_name; ?></option>
                                                        <?php
                                                    }
                                                    if (!empty(@$editproduct)) {
                                                        ?>

                                                        <option <?php if ($brandnm->id == @$editproduct->brand_id) { ?> selected=""<?php } ?> value="<?php echo $brandnm->id; ?>"><?php echo $brandnm->brand_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <?php if (empty($editproduct)) { ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Available status <sup style="color:red;">*</sup></label>
                                                <select name="available_status" class="form-control">
                                                    <option <?php if (@$editproduct->available_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->available_status == '1') { ?> selected="" <?php } ?> value="1">Available</option>                                
                                                    <option <?php if (@$editproduct->available_status == '2') { ?> selected="" <?php } ?> value="2">Not Available</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Image  <sup style="color:red;">*</sup><span style="color:red;font-weight: 400;">(20 KB PNG, JPG ,JPEG)</span></label>

                                                <?php if (@$editproduct->product_image) { ?>
                                                <div class="form-group">
                                                    <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo @$editproduct->product_image; ?>" style="width: 50px;"/>
                                                    <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/productimgdelete/Men/' . @$id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
                                                </div>  

                                                <?php } else { ?>
                                                <div class="form-group">
                                                    <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required']); ?>                                        
                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <?php } ?>  
                                            <div id="imagePreview"></div>                          
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Display status</label>
                                            <select name="display_status" class="form-control">
                                                <option <?php if (@$editproduct->display_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                <option <?php if (@$editproduct->display_status == '1') { ?> selected="" <?php } ?> value="1">Display</option>                                
                                                <option <?php if (@$editproduct->display_status == '2') { ?> selected="" <?php } ?> value="2">Non Display</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product status</label>
                                                <select name="product_status" class="form-control">
                                                    <option <?php if (@$editproduct->product_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                    <option <?php if (@$editproduct->product_status == 'S') { ?> selected="" <?php } ?> value="S"><?=Configure::read('S');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'O') { ?> selected="" <?php } ?> value="O"><?=Configure::read('O');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'C') { ?> selected="" <?php } ?> value="C"><?=Configure::read('C');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'R') { ?> selected="" <?php } ?> value="R"><?=Configure::read('R');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'F') { ?> selected="" <?php } ?> value="F"><?=Configure::read('F');?></option> 
                                                </select>
                                            </div>
                                        </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Note</label>
                                                <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Material details</label>
                                            <?= $this->Form->input('material_details', ['value' => @$editproduct->material_details, 'type' => 'textarea', 'class' => "form-control ckeditor", 'label' => false, 'placeholder' => 'Please material details']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product details</label>
                                                <?= $this->Form->input('product_details', ['value' => @$editproduct->product_details, 'type' => 'textarea', 'class' => "form-control ckeditor", 'label' => false, 'placeholder' => 'Please  product details']); ?>
                                        </div>
                                    </div>
                                </div>
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
<?php } ?>
    


    <script>
        $(document).ready(function () {
            
       
        $('#profile_data').validate({
                errorElement: "span",
               
            rules:{
                'season[]': {required:true},
                'take_note_of[]': {required:true},
                'skin_tone[]': {required:true},
                'better_body_shape[]': {required:true},               
                'available_status': {required:true},               
            },
             messages: {
                'season[]': {
                    required: "Please select the season",

                },
            }
        });
     

    });
    </script>
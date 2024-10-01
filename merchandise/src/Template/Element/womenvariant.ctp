<?php 
use Cake\Core\Configure;
?>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="tab-content women" style="width: 100%;float: left;">
    <?= $this->Form->input('profile_type', ['value' => '2', 'type' => 'hidden', 'class' => "form-control", 'required' => "required", 'label' => false]); ?>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Category <sup style="color:red;">*</sup></label>
                                            <select name="product_type" class="form-control"  onchange="getSubCatg(this.value);" required  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?> >
                                                <option value="" selected disabled>Select Category</option>
                                                <?php foreach ($productType as $type) { ?>
                                                    <option  value="<?php echo $type->id; ?>" <?php echo (!empty($editproduct) && ($editproduct->product_type == $type->id)) ? "selected" : "";  echo (!empty($_GET['ctg']) && ($_GET['ctg'] ==$type->id))?'selected':''; ?> ><?php echo $type->product_type . '-' . $type->name; ?></option>
    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Sub-category <sup style="color:red;">*</sup></label>
                                            <select name="rack" class="form-control" required onchange="setSubCatg(this.value);"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?>>
                                                <?php /*if (empty($editproduct)) { ?> 
                                                    <option value="" selected disabled>Select Category first</option>
                                                <?php }*/ ?>
                                                    <option value='' selected disabled>--</option>
                                                <?php
                                                if (!empty($in_rack)) {
                                                    foreach ($in_rack as $rk) {
                                                        ?>
                                                        <option  value="<?php echo $rk->id; ?>"  
                                                        <?php echo (!empty($editproduct) && ($editproduct->rack == $rk->id)) ? "selected" : ""; ?>
                                                        <?php echo (!empty($_GET['sub_ctg']) && ($_GET['sub_ctg'] == $rk->id)) ? "selected" : ""; ?>
                                                         ><?php echo $rk->rack_name; ?></option>
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
                                                <li><input id="selectAllseson" type="checkbox" <?php if (!empty($editproduct->season) && in_array($al_ses_li, json_decode($editproduct->season, true))) { ?> checked <?php } ?> /><label for='selectAllseson<?= $ky; ?>'><?= $al_ses_li; ?>Select All</label></li>
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
                                <?php if(!empty($get_prv_inv_data) && (empty($_GET['variant_id']) && empty( $this->request->session()->read('new_variant_po_data')))){ ?> 
                                <div class="row">
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
                                                
                                                <?php }else{ 
                                                    echo "Already in po"; 
                                                    } ?>
                                                    <a target="_blank" href="<?=HTTP_ROOT;?>appadmins/newBrandPo/tab1/<?=$option;?>?ctg=<?=$_GET['ctg'];?>&sub_ctg=<?=$_GET['sub_ctg'];?>&variant_id=<?=$get_pr_vari_list->id;?>" class="btn btn-sm btn-primary">Add New Variant</a>
                                                    <div id="showPo<?=$pdetails->id;?>" style="display:none;">
                                                        <?= $this->Form->create('',['type'=>'post','id'=>'updateVarPoFrom'.$pdetails->id ,'url'=>['action'=>'addVariantPoRequest']]);?>
                                                        <input type="text" step="1" name="qty" min="1" placeholder="Quantity" style="width:100px;" value="1"  required>
                                                        <input type="hidden"  name="variant_list_id" value="<?=$pdetails->id;?>">
                                                        <input type="hidden"  name="user_id" value="<?=$getPaymentGatewayDetails->user_id;?>">
                                                        <input type="hidden"  name="kid_id" value="<?=$getPaymentGatewayDetails->kid_id;?>">
                                                        <button type="button" class="btn btn-sm btn-primary" onClick="updateVarPox(<?=$pdetails->id;?>)">Submit</button>
                                                        <?= $this->Form->end(); ?>
                                                    </div>
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
                                </div>
                                <?php } ?>

                                <div class="row">

                                

                                    <div class="col-md-6 women-size-prefer">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">What size you prefer?</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                  

                                                    <div class="row" >
                                                        
                                                        
                                                        <?php if(in_array($product_ctg_nme,["A2", "A3", "A4","A5", "A7", "A8", "A10", "A6", "A1", "A9", "A11", "A12", "A14", "G1"])){ ?>
                                                        <div class="col-sm-6"   >
                                                            <select id="prd_sz_typ" class="form-control" required onchange="prdsztyp(this.value)"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?>>
                                                                <option value="" selected disabled>----</option>
                                                                
                                                                
                                                                <?php
                                                                if (!in_array($product_ctg_nme, ["A4", "A5", "A7", "A8", "A10","G1"])) {
                                                                    if (!in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"])) {
                                                                        ?> 
                                                                        <option value="pantsr1"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'pantsr1')) ? 'selected' : ''; ?> >Top SIZE</option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                                
                                                                <?php if(in_array($product_ctg_nme,["A6"])){ ?>
                                                                    <option value="skirt"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'skirt')) ? 'selected' : ''; ?> >SKIRT SIZE</option>
                                                                <?php } ?>
                                                                <?php if(in_array($product_ctg_nme,["A4", "A5", "A7", "A8"])){ ?>
                                                                    <option value="wo_bottom"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'wo_bottom')) ? 'selected' : ''; ?> >BOTTOM SIZE</option>
                                                                <?php } ?>
                                                                
                                                                <?php if(in_array($product_ctg_nme,["A5", "A7"])){ ?>
                                                                    <option value="jeans"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'jeans')) ? 'selected' : ''; ?>  >JEANS SIZE</option>
                                                                <?php } ?>
                                                                
                                                                <?php if(in_array($product_ctg_nme,["A4", "A8"])){ ?>
                                                                    <option value="paints"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'paints')) ? 'selected' : ''; ?>  >PANT SIZE</option>
                                                                <?php } ?>
                                                                 
                                                                <?php if(in_array($product_ctg_nme,["A1", "A9", "A11", "A12", "A14"])){ 
                                                                if(!in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"])){ ?>
                                                                    <option value="shirt_blouse"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'shirt_blouse')) ? 'selected' : ''; ?> >SHIRT & BLOUSE</option>
                                                                <?php } 
                                                                 } ?>
                                                                    
                                                                <?php if(in_array($product_ctg_nme,["A4", "A10",])){ ?>
                                                                    <option value="shirt_blouse"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'shirt_blouse')) ? 'selected' : ''; ?> >SHIRT & BLOUSE</option>
                                                                <option value="wo_jackect_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'wo_jackect_size')) ? 'selected' : ''; ?> >JACKET SIZE</option>
                                                                <?php } ?>
                                                                
                                                                <?php if(in_array($product_ctg_nme,["A2", "A3", "A4"])){ ?>
                                                                     <option value="dress"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'dress')) ? 'selected' : ''; ?> >DRESS SIZE</option>
                                                                <?php } ?>
                                                                     
                                                                <?php if(in_array($product_ctg_nme,["A4"])){ ?>
                                                                    <option value="bra"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'bra')) ? 'selected' : ''; ?> >Bra Size</option>
                                                                    <option value="active_wr"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'active_wr')) ? 'selected' : ''; ?> >ACTIVE WEAR SIZE</option>
                                                                <?php } ?>
                                                                <?php if(in_array($product_ctg_nme,["G1"])){ ?>
                                                                    <option value="shoe_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'shoe_size')) ? 'selected' : ''; ?> >Shoe Size</option>
                                                                <?php } ?>
                                                                <?php if(in_array($product_ctg_nme,["A14"]) && in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412", "A1413"])){ ?>
                                                                    <option value="free_size"  <?= (!empty($editproduct) && ($editproduct->primary_size == 'free_size')) ? 'selected' : ''; ?> >Free Size</option>
                                                                <?php } ?>
                                                                    
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6"   id="prd_sz_typ_div"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?>>
                                                            
                                                        </div>
                                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'free_size')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'pantsr1')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'skirt')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'wo_bottom')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'jeans')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'shoe_size')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                        <?php if(!empty($editproduct) && ($editproduct->primary_size == 'paints')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                            <?php if(!empty($editproduct) && ($editproduct->primary_size == 'shirt_blouse')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                            <?php if(!empty($editproduct) && ($editproduct->primary_size == 'bra')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                            <?php if(!empty($editproduct) && ($editproduct->primary_size == 'active_wr')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                            <?php if(!empty($editproduct) && ($editproduct->primary_size == 'wo_jackect_size')){ ?>
                                                            <script>
                                                                $(document).ready(function(){
                                                                    prdsztyp('<?=$editproduct->primary_size;?>');
                                                                })
                                                            </script>
                                                        <?php } ?>
                                                            <?php if(!empty($editproduct) && ($editproduct->primary_size == 'dress')){ ?>
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
                                                                if(data == 'jeans' ){
                                                                    selectSizeAcc = `<div>
                                                                        <label>JEANS SIZE  <sup style="color:red;">*</sup></label>
                                                                        <div class="col-md-1">
                                                                            <input type="radio" name="primary_size" value="jeans"  checked required/>
                                                                        </div>
                                                                    
                                                                    </div>`;
                                                                }
                                                                
                                                                if(data == 'shoe_size' ){
                                                                    selectSizeAcc = `<div class="row"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?>>
                                                                    <div class="col-md-1">
                                                                        
                                                                        <input type="radio" name="primary_size" value="shoe_size" checked />
                                                                    </div>
                                                                    <div class="col-md-11 recom_div">    
                                                                        <label>SHOE SIZE </label>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputPassword1">Which heel height do you prefer? <sup style="color:red;">*</sup></label>
                                                                                <select name="[NAME][variant_size_related][womenHeelHightPrefer]" id="womenHeelHightPrefer" aria-required="true" class="form-control" aria-invalid="false" required>
                                                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == '') { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'Flat(Under 1")') { ?> selected="" <?php } ?> value='Flat(Under 1")'>Flat(Under 1")</option>
                                                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'Mid(2"-3")') { ?> selected="" <?php } ?> value='Mid(2"-3")'>Mid(2"-3")</option>
                                                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'High(3"-4")') { ?> selected="" <?php } ?> value='High(3"-4")'>High(3"-4")</option>
                                                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'Low(1"-2")') { ?> selected="" <?php } ?> value='Low(1"-2")'>Low(1"-2")</option>
                                                                                    <option <?php if (@$editproduct->womenHeelHightPrefer == 'Ultra High(4.5"+)') { ?> selected="" <?php } ?> value='Ultra High(4.5"+)'>Ultra High(4.5"+)</option>
                                                                                </select>                                            

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <label for="exampleInputPassword1"> Which style of shoes ? <sup style="color:red;">*</sup></label>
                                                                            <select name="[NAME][variant_size_related][shoe_size_run]" class="form-control" aria-invalid="false" required>
                                                                                <option <?php if (@$editproduct->shoe_size_run == '') { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                                                <option <?php if (@$editproduct->shoe_size_run == 'Pumps') { ?> selected="" <?php } ?> value="Pumps">Pumps</option>
                                                                                <option <?php if (@$editproduct->shoe_size_run == 'Sandals') { ?> selected="" <?php } ?> value="Sandals">Sandals</option>
                                                                                <option <?php if (@$editproduct->shoe_size_run == 'Loafers & Flats') { ?> selected="" <?php } ?> value="Loafers & Flats">Loafers & Flats</option>
                                                                                <option <?php if (@$editproduct->shoe_size_run == 'Wedges') { ?> selected="" <?php } ?> value="Wedges">Wedges</option>
                                                                                <option <?php if (@$editproduct->shoe_size_run == 'Clogs & Mules') { ?> selected="" <?php } ?> value="Clogs & Mules">Clogs & Mules</option>
                                                                                <option <?php if (@$editproduct->shoe_size_run == 'Sneakers') { ?> selected="" <?php } ?> value="Sneakers">Sneakers</option>
                                                                                <option <?php if (@$editproduct->shoe_size_run == 'Boots & Booties') { ?> selected="" <?php } ?> value="Boots & Booties">Boots & Booties</option>
                                                                                <option <?php if (@$editproduct->shoe_size_run == 'Platforms') { ?> selected="" <?php } ?> value="Platforms">Platforms</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    </div>`;
                                                                }
                                                                
                                                                if(data == 'skirt' ){
                                                                    selectSizeAcc = `<div><label>SKIRT SIZE  <sup style="color:red;">*</sup></label><div class="col-md-1"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?> >
                                                                            <input type="radio" name="primary_size" value="skirt" checked required />
                                                                            </div>
                                                                            
                                                                                
                                                                                <div>`;
                                                                }
                                                                if(data == 'wo_bottom' ){
                                                                    selectSizeAcc = `<div>
                                                                        <label>BOTTOM SIZE</label>
                                                                        <div class="col-md-1">
                                                                            <input type="radio" name="primary_size" value="wo_bottom"  checked required/>
                                                                        </div>
                                                                        
                                                                    </div>`;
                                                                }
                                                                if(data == 'paints' ){
                                                                    selectSizeAcc = `<div>
                                                                    <label>PANTS  <sup style="color:red;">*</sup></label>
        
                                                                        <input type="radio" name="primary_size" value="paints"  checked required />
                                                                
                                                                    
                                                                    </div>`;
                                                                }
                                                                if(data == 'free_size' ){
                                                                    selectSizeAcc = `<div>
                                                                    <label>Free Size  <sup style="color:red;">*</sup></label>
        
                                                                        <input type="radio" name="primary_size" value="free_size"  checked required />
                                                                
                                                                    
                                                                    </div>`;
                                                                }
                                                                if(data == 'shirt_blouse' ){
                                                                    selectSizeAcc = `
                                                                        <div class="row" >
                                                                            <div class="col-md-1">
                                                                            <input type="radio" name="primary_size" value="shirt_blouse"  checked required />
                                                                        </div>  
                                                                        <div class="col-md-11 recom_div">  
                                                                            <label>SHIRT & BLOUSE <sup style="color:red;">*</sup></label>                                                    
                                                                            <div class="col-sm-6">
                                                                                <select name="[NAME][variant_size_related][shirt_blouse_recomend]" id="shirt_blouse_recomend ">
                                                                                    <option <?php if (@$editproduct->shirt_blouse_recomend == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                                    <optgroup label="Recommended for 2" style="display: block;">
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'S (2-4)') { ?> selected="" <?php } ?> value="S (2-4)">S (2-4)</option>
                                                                                    </optgroup>
                                                                                    <optgroup label="Women's Sizes">
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'S (2-4)') { ?> selected="" <?php } ?> value="S (2-4)">S (2-4)</option>
                                                                                    </optgroup>
                                                                                    <optgroup label="Women's Sizes">
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'XXS (00)') { ?> selected="" <?php } ?> value="XXS (00)">XXS (00)</option>
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'XS (0)') { ?> selected="" <?php } ?> value="XS (0)">XS (0)</option>
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'S (2-4)') { ?> selected="" <?php } ?> value="S (2-4)">S (2-4)</option>
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'M (6-8)') { ?> selected="" <?php } ?> value="M (6-8)">M (6-8)</option>
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'L (10-12)') { ?> selected="" <?php } ?> value="L (10-12)">L (10-12)</option>
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'XL (14)') { ?> selected="" <?php } ?> value="XL (14)">XL (14)</option>
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == 'XXL (16)') { ?> selected="" <?php } ?> value="XXL (16)">XXL (16)</option>
                                                                                    </optgroup>
                                                                                    <optgroup label="Women's Plus Sizes">
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == '1X (14W-16W)') { ?> selected="" <?php } ?> value="1X (14W-16W)">1X (14W-16W)</option>
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == '2X (18W-20W)') { ?> selected="" <?php } ?> value="2X (18W-20W)">2X (18W-20W)</option>
                                                                                        <option <?php if (@$editproduct->shirt_blouse_recomend == '3X (22W-24W)') { ?> selected="" <?php } ?> value="3X (22W-24W)">3X (22W-24W)</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>`;
                                                                }
                                                                if(data == 'active_wr' ){
                                                                    selectSizeAcc = `<div>
                                                                    <label>ACTIVE WEAR SIZE  <sup style="color:red;">*</sup></label>
                                                                    <div class="col-md-1">
                                                                        <input type="radio" name="primary_size" value="active_wr"  checked required/>
                                                                    </div>
                                                            
                                                                    </div>`;
                                                                }
                                                                if(data == 'dress' ){
                                                                    selectSizeAcc = `
                                                                        <div class="row"  >
                                                                            <div class="col-md-1">
                                                                                <input type="radio" name="primary_size" value="dress" checked required/>
                                                                            </div>
                                                                            <div class="col-md-11 recom_div"> 
                                                                                <label>DRESS </label>
                                                                                <div class="col-sm-6">
                                                                                    <select name="[NAME][variant_size_related][dress_recomended]" id="dress_recomended"  <?=(!empty($editproduct))?'style="pointer-events: none;" readonly':'' ;?> >
                                                                                        <option <?php if (@$editproduct->dress_recomended == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                                        <option <?php if (@$editproduct->dress_recomended == 'L (10-12)') { ?> selected="" <?php } ?> value="L (10-12)">L (10-12)</option>
                                                                                        <optgroup label="Women's Sizes">
                                                                                            <option <?php if (@$editproduct->dress_recomended == 'XXS (00)') { ?> selected="" <?php } ?> value="XXS (00)">XXS (00)</option>
                                                                                            <option <?php if (@$editproduct->dress_recomended == 'XS (0)') { ?> selected="" <?php } ?> value="XS (0)">XS (0)</option>
                                                                                            <option <?php if (@$editproduct->dress_recomended == 'S (2-4)') { ?> selected="" <?php } ?> value="S (2-4)">S (2-4)</option>
                                                                                            <option <?php if (@$editproduct->dress_recomended == 'M (6-8)') { ?> selected="" <?php } ?> value="M (6-8)">M (6-8)</option>
                                                                                            <option <?php if (@$editproduct->dress_recomended == 'L (10-12)') { ?> selected="" <?php } ?> value="L (10-12)">L (10-12)</option>
                                                                                            <option <?php if (@$editproduct->dress_recomended == 'XL (14)') { ?> selected="" <?php } ?> value="XL (14)">XL (14)</option>
                                                                                            <option <?php if (@$editproduct->dress_recomended == 'XXL (16)') { ?> selected="" <?php } ?> value="XXL (16)">XXL (16)</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Women's Plus Sizes">
                                                                                            <option <?php if (@$editproduct->dress_recomended == '1X (14W-16W)') { ?> selected="" <?php } ?> value="1X (14W-16W)">1X (14W-16W)</option>
                                                                                            <option <?php if (@$editproduct->dress_recomended == '2X (18W-20W)') { ?> selected="" <?php } ?> value="2X (18W-20W)">2X (18W-20W)</option>
                                                                                            <option <?php if (@$editproduct->dress_recomended == '3X (22W-24W)') { ?> selected="" <?php } ?> value="3X (22W-24W)">3X (22W-24W)</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>`;
                                                                }
                                                                if(data == 'bra' ){
                                                                    selectSizeAcc = `<div>
                                                                         
                                                                        <div class="row">
                                                                            <div class="col-md-1">
                                                                                <input type="radio" name="primary_size" value="bra" checked required/>
                                                                            </div>
                                                                            <div class="col-md-11 recom_div"> 
                                                                                <label>BRA SIZE  <sup style="color:red;">*</sup></label>
                                                                                <div class="col-sm-6">
                                                                                    <select name="[NAME][variant_size_related][bra_recomend]" id="bra_recomend">
                                                                                        <option <?php if (@$editproduct->bra_recomend == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'AA') { ?> selected="" <?php } ?> value="AA">AA</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'A') { ?> selected="" <?php } ?> value="A">A</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'B') { ?> selected="" <?php } ?> value="B">B</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'C') { ?> selected="" <?php } ?> value="C">C</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'D') { ?> selected="" <?php } ?> value="D">D</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'DD') { ?> selected="" <?php } ?> value="DD">DD</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'DDD') { ?> selected="" <?php } ?> value="DDD">DDD</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'F') { ?> selected="" <?php } ?> value="F">F</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'G') { ?> selected="" <?php } ?> value="G">G</option>
                                                                                        <option <?php if (@$editproduct->bra_recomend == 'H') { ?> selected="" <?php } ?> value="H">H</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>`;
                                                                }
                                                                if(data == 'wo_jackect_size' ){
                                                                    selectSizeAcc = `<div>
                                                                        <label>JACKET SIZE  <sup style="color:red;">*</sup></label>
                                                                        <div class="col-md-1">
                                                                            <input type="radio" name="primary_size" value="wo_jackect_size"  checked required />
                                                                        </div>
                                                                        
                                                                    </div>`;
                                                                }
                                                                 
                                                                if(data == 'pantsr1' ){
                                                                    selectSizeAcc = `
                                                                    <div>                                                                        
                                                                            <div class="col-md-1">
                                                                        <input type="radio" name="primary_size" value="pantsr1" checked />
                                                                    </div>
                                                                    <div class="col-md-11 recom_div"> 
                                                                        <label>Top SIZE  <sup style="color:red;">*</sup></label>
                                                                        <div class="col-sm-6">
                                                                            <select name="[NAME][variant_size_related][pantsr2]" id="pantsr2">
                                                                                <option <?php if (@$editproduct->pantsr2 == '') { ?> selected="" <?php } ?> value="">--</option>
                                                                                <option <?php if (@$editproduct->pantsr2 == 'Narrow') { ?> selected="" <?php } ?> value="Narrow">Narrow</option>
                                                                                <option <?php if (@$editproduct->pantsr2 == 'Medium') { ?> selected="" <?php } ?> value="Medium">Medium</option>
                                                                                <option <?php if (@$editproduct->pantsr2 == 'Wide') { ?> selected="" <?php } ?> value="Wide">Wide</option>
                                                                                <option <?php if (@$editproduct->pantsr2 == 'Extra Wide') { ?> selected="" <?php } ?> value="Extra Wide">Extra Wide</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    </div>`;
                                                                }
                                                                 
                                                                $('#prd_sz_typ_div').hide();
                                                                $('#prd_sz_typ_div').html(selectSizeAcc);
                                                            }
                                                        </script>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                               
                                            </div>                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                            <label for="exampleInputPassword1">Variants </label>
                                            <div id="variant_main_div">
                                               
                                            </div>
                                            <div style="margin-top: 10px;margin-button: 10px;">
                                               <button type="button" class="btn btn-info" onclick="addVariants()">Add Variant</button>
                                            </div>
                                            
                                            
                                            <script>
                                                function addVariants(){
                                                    if(($('#one_variant').val()==1) && ($('#variant_main_div [id^=variant]').length ==1)){
                                                        alert('One variant allowed');
                                                        return false;
                                                    }
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
                                                    // if(($('#one_variant').val()==1) && ($('#variant_main_div [id^=variant]').length ==1)){
                                                    //     alert('One size allowed');
                                                    //     return false;
                                                    // }
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
                                                    let new_size_details_html =`<div class="row">${recom_html}</div>
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
                                                                </div>
                                                                <div class="row">
                                    <?php if(!in_array($product_ctg_nme,["A5", "A7", "A8"])){ ?>                            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Shoulders?</label>
                                            <select name="variant_data[${color_value}][${value}][proportion_shoulders]" id="proportion_shoulders">
                                                <option <?php if (@$editproduct->proportion_shoulders == 'NULL') { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <optgroup label="Women's Sizes">
                                                    <option <?php if (@$editproduct->proportion_shoulders == '00') { ?> selected="" <?php } ?> value="00">00</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '0') { ?> selected="" <?php } ?> value="0">0</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '2') { ?> selected="" <?php } ?> value="2">2</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '14') { ?> selected="" <?php } ?> value="14">14</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '16') { ?> selected="" <?php } ?> value="16">16</option>
                                                </optgroup>
                                                <optgroup label="Women's Plus Sizes">
                                                    <option <?php if (@$editproduct->proportion_shoulders == '14W') { ?> selected="" <?php } ?> value="14W">14W</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '16W') { ?> selected="" <?php } ?> value="16W">16W</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '18W') { ?> selected="" <?php } ?> value="18W">18W</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '20W') { ?> selected="" <?php } ?> value="20W">20W</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '22W') { ?> selected="" <?php } ?> value="22W">22W</option>
                                                    <option <?php if (@$editproduct->proportion_shoulders == '24W') { ?> selected="" <?php } ?> value="24W">24W</option>
                                                </optgroup>
                                            </select>                                         
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <?php if(in_array($product_ctg_nme,["A3", "A4", "A5", "A6", "A7", "A8"]) || in_array($product_sub_ctg_nme, ["A41", "A42", "A47"]) ){ ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Legs?   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?> </label>
                                            <select name="variant_data[${color_value}][${value}][proportion_legs]" id="proportion_legs"  <?php if($product_ctg_nme != "A4"){ ?> required <?php } ?>>
                                                <option <?php if (@$editproduct->proportion_legs == 'NULL') { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                <!--<option <?php if (@$editproduct->proportion_legs == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>-->
                                                <option <?php if (@$editproduct->proportion_legs == '30') { ?> selected="" <?php } ?> value="30">30</option>
                                                <option <?php if (@$editproduct->proportion_legs == '32') { ?> selected="" <?php } ?> value="32">32</option>
                                                <option <?php if (@$editproduct->proportion_legs == '34') { ?> selected="" <?php } ?> value="34">34</option>
                                                <option <?php if (@$editproduct->proportion_legs == '36') { ?> selected="" <?php } ?> value="36">36</option>
                                                <option <?php if (@$editproduct->proportion_legs == '38') { ?> selected="" <?php } ?> value="38">38</option>
                                                <option <?php if (@$editproduct->proportion_legs == '40') { ?> selected="" <?php } ?> value="40">40</option>
                                                <option <?php if (@$editproduct->proportion_legs == '42') { ?> selected="" <?php } ?> value="42">42</option>
                                                <option <?php if (@$editproduct->proportion_legs == '44') { ?> selected="" <?php } ?> value="44">44</option>
                                                <option <?php if (@$editproduct->proportion_legs == '46') { ?> selected="" <?php } ?> value="46">46</option>
                                            </select>                                         
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if(in_array($product_ctg_nme,["A1", "A2", "A3", "A4", "A9", "A10", "A11", "A12"]) || in_array($product_sub_ctg_nme, ["A43", "A45"])){ ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Arms?   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?> </label>
                                            <select name="variant_data[${color_value}][${value}][proportion_arms]" id="proportion_arms"  <?php if($product_ctg_nme != "A4"){ ?> required <?php } ?>>
                                                <option <?php if (@$editproduct->proportion_arms == 'NULL') { ?> selected="" <?php } ?> value="" selected disabled>-</option>
                                                <!--<option <?php if (@$editproduct->proportion_arms == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>-->
                                                <option <?php if (@$editproduct->proportion_arms == 'XXS') { ?> selected="" <?php } ?> value="XXS">XXS</option>
                                                <option <?php if (@$editproduct->proportion_arms == 'XS') { ?> selected="" <?php } ?> value="XS">XS</option>
                                                <option <?php if (@$editproduct->proportion_arms == 'S') { ?> selected="" <?php } ?> value="S">S</option>
                                                <option <?php if (@$editproduct->proportion_arms == 'M') { ?> selected="" <?php } ?> value="M">M</option>
                                                <option <?php if (@$editproduct->proportion_arms == 'L') { ?> selected="" <?php } ?> value="L">L</option>
                                                <option <?php if (@$editproduct->proportion_arms == 'XL') { ?> selected="" <?php } ?> value="XL">XL</option>
                                                <option <?php if (@$editproduct->proportion_arms == 'XXL') { ?> selected="" <?php } ?> value="XXL">XXL</option>
                                                <option <?php if (@$editproduct->proportion_arms == '1X') { ?> selected="" <?php } ?> value="1X">1X</option>
                                                <option <?php if (@$editproduct->proportion_arms == '2X') { ?> selected="" <?php } ?> value="2X">2X</option>
                                                <option <?php if (@$editproduct->proportion_arms == '3X') { ?> selected="" <?php } ?> value="3X">3X</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hips ?</label>
                                            <select name="variant_data[${color_value}][${value}][proportion_hips]" id="jeansx">
                                                <option value="">--</option>
                                                <optgroup label="Women's Sizes"> 
                                                    <option <?php if (@$editproduct->proportion_hips == 'NULL') { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '00') { ?> selected="" <?php } ?> value="00">00</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '0') { ?> selected="" <?php } ?> value="0">0</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '2') { ?> selected="" <?php } ?> value="2">2</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '4') { ?> selected="" <?php } ?> value="4">4</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '6') { ?> selected="" <?php } ?> value="6">6</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '8') { ?> selected="" <?php } ?> value="8">8</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '10') { ?> selected="" <?php } ?> value="10">10</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '12') { ?> selected="" <?php } ?> value="12">12</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '14') { ?> selected="" <?php } ?> value="14">14</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '16') { ?> selected="" <?php } ?> value="16">16</option>
                                                </optgroup>
                                                <optgroup label="Women's Plus Sizes">
                                                    <option <?php if (@$editproduct->proportion_hips == '14W') { ?> selected="" <?php } ?> value="14W">14W</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '16W') { ?> selected="" <?php } ?> value="16W">16W</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '18W') { ?> selected="" <?php } ?> value="18W">18W</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '20W') { ?> selected="" <?php } ?> value="20W">20W</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '22W') { ?> selected="" <?php } ?> value="22W">22W</option>
                                                    <option <?php if (@$editproduct->proportion_hips == '24W') { ?> selected="" <?php } ?> value="24W">24W</option>
                                                </optgroup>
                                            </select>                                          
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image <sup style="color:red;">*</sup>  <span style="color:red;font-weight: 400;">(2MB PNG, JPG ,JPEG)</span></label>

                                                    <div class="form-group">
                                                        <input name='variant_data[${color_value}][${value}][product_image]' type='file'  id ='image${inx_numx}' required onchange="readURL(this);">
                                                    </div>    
                                                <div id="imagePreview${inx_numx}"></div>                          
                                                
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Material details</label>
                                                    <textarea name="variant_data[${color_value}][${value}][material_details]" class = "form-control ckeditor${inx_numx}" ></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Product details</label>
                                                        <textarea name="variant_data[${color_value}][${value}][product_details]" class = "form-control ckeditor${inx_numx}" ></textarea>
                                                </div>
                                            </div>
                                    
                                </div> `;
                                                    $('#showSizeDetails'+id).html(new_size_details_html);

                                                    if(($('#one_variant').val()==1)){
                                                        setTimeout(function(){
                                                            $('button[class^=add_more_btn]').hide();
                                                        }, 800);
                                                        
                                                    }
                                                    $('.ckeditor'+inx_numx).summernote();
                                                }
                                                function variantDelete(id){
                                                    $('#'+id).remove();
                                                }
                                            </script>
                                        </div> 
                                  
                                    
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Profession</label>
                                            
                                            <select name="profession[]" id="profession" class="form-control select3_select" aria-invalid="false" multiple>
                                                <!--<option value="" <?php // if (!empty($editproduct->profession) && in_array('NULL', json_decode($editproduct->profession, true))) { ?> selected <?php //} ?> >--</option>-->
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
                                                            {id: 'selectAll', text: 'Select all', matchIds: matches.map(match => match.id)},
                                                            {id: 'deSelectAll', text: 'Deselect all', matchIds: matches.map(match => match.id)},        
                                                            ...matches,
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
                                            <label for="exampleInputPassword1">Occasions</label>
                                            
                                            <select name="occasional_dress[]" id="occasional_dress"  class="form-control select3_select" aria-invalid="false" multiple>
                                                <!-- <option value="" <?php //if (!empty($editproduct->occasional_dress) && in_array('NULL', json_decode($editproduct->occasional_dress, true))) { ?> selected <?php //} ?>>--</option> -->
                                                <option value="1"  <?php if (!empty($editproduct->occasional_dress) && in_array(1, json_decode($editproduct->occasional_dress, true))) { ?> selected <?php } ?>>Business Casual / Work</option>
                                                <option value="2"  <?php if (!empty($editproduct->occasional_dress) && in_array(2, json_decode($editproduct->occasional_dress, true))) { ?> selected <?php } ?>>Cocktail / Wedding / Special</option>
                                                <?php /* ?>
                                                  <option value="3"  <?php if(!empty($editproduct->occasional_dress) && in_array(3, json_decode($editproduct->occasional_dress,true))){ ?> selected <?php } ?>>Building / Maintenance</option>
                                                  <?php */ ?>
                                                <option value="4"  <?php if (!empty($editproduct->occasional_dress) && in_array(4, json_decode($editproduct->occasional_dress, true))) { ?> selected <?php } ?>>Most of the time</option>
                                                <option value="5"  <?php if (!empty($editproduct->occasional_dress) && in_array(5, json_decode($editproduct->occasional_dress, true))) { ?> selected <?php } ?>>Around once or twice a month</option>
                                                <option value="6"  <?php if (!empty($editproduct->occasional_dress) && in_array(6, json_decode($editproduct->occasional_dress, true))) { ?> selected <?php } ?>>Date Night / Night Out</option>
                                                <option value="7"  <?php if (!empty($editproduct->occasional_dress) && in_array(7, json_decode($editproduct->occasional_dress, true))) { ?> selected <?php } ?>>Laid Back Casual</option>
                                                <option value="8"  <?php if (!empty($editproduct->occasional_dress) && in_array(8, json_decode($editproduct->occasional_dress, true))) { ?> selected <?php } ?>>Rarely</option>
                                            </select>
                                            <script>
                                                const handleSelection2 = event => {
                                                        if (event.params.data.id === 'selectAll') {
                                                            $('#occasional_dress').val(event.params.data.matchIds);
                                                            $('#occasional_dress').trigger('change');
                                                        };
                                                        if (event.params.data.id === 'deSelectAll') {
                                                            $('#occasional_dress').val('');
                                                            $('#occasional_dress').trigger('change');
                                                        };
                                                    };
                                                    $('#occasional_dress').select2({
                                                        multiple: true,
                                                        sorter: addSelectAll
                                                    });
                                                    $("#occasional_dress").on('select2:select', handleSelection2);
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-sm-12 col-lg-12 col-md-12 type-box women-type-box body-women">
                                        <h3>What's your body type?</h3>
                                        <ul>
                                            <li>
                                                <h4 style="margin-top: 0;">Inverted Triangle</h4>
                                                <input class="radio-box" id="radio2" name="better_body_shape[]" value="2" type="checkbox" <?php if (!empty($editproduct->better_body_shape) && in_array(2, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio2">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>images/inverted-triangle.jpg" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Triangle</h4>
                                                <input class="radio-box" id="radio3" type="checkbox" name="better_body_shape[]" value="3" <?php if (!empty($editproduct->better_body_shape) && in_array(3, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio3">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>images/triangle.jpg" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">rectangle</h4>
                                                <input class="radio-box" name="better_body_shape[]" value="1" id="radio1" type="checkbox"  <?php if (!empty($editproduct->better_body_shape) && in_array(1, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio1">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>images/rectangle.jpg" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">hourglass</h4>
                                                <input class="radio-box" id="radio4" type="checkbox" name="better_body_shape[]" value="4"  <?php if (!empty($editproduct->better_body_shape) && in_array(4, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio4">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>images/hourglass.jpg" alt="">
                                                </label>
                                            </li>
                                            <li>
                                                <h4 style="margin-top: 0;">Apple</h4>
                                                <input class="radio-box" id="radio4z" type="checkbox" name="better_body_shape[]" value="5"  <?php if (!empty($editproduct->better_body_shape) && in_array(5, json_decode($editproduct->better_body_shape, true))) { ?> checked <?php } ?>>
                                                <label for="radio4z">
                                                    <img src="<?= HTTP_ROOT_BASE; ?>images/apple.jpg" alt="">
                                                </label>
                                            </li>
                                        </ul>
                                    </div>


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

                                    
                                    
                                </div>
                                <div class="row new_var_xx">
                                    



                                </div>

                                <div class="row new_var_xx">
                                    <?php if(in_array($product_ctg_nme,["A1", "A2", "A3", "A4", "A5", "A6", "A9", "A10", "A11", "A12"]) /*|| in_array($product_sub_ctg_nme, ["A41", "A42", "A47", "A43", "A45", "A44"])*/){ ?>
                                    <div class="col-md-6"    >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Style Inspiration   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?></label>
                                            <select name="wo_style_insp[]" id="wo_style_insp" class="form-control select2_select" multiple  <?php if($product_ctg_nme != "A4"){ ?> required <?php } ?>>
                                                <!--<option <?php if (@$editproduct->wo_style_insp == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>-->
                                                <option <?php if (!empty($editproduct->wo_style_insp) && in_array('NULL', json_decode($editproduct->wo_style_insp, true))) { ?> selected <?php } ?> value=""  disabled>--</option>
                                                <option <?php if (!empty($editproduct->wo_style_insp) && in_array(1, json_decode($editproduct->wo_style_insp, true))) { ?> selected <?php } ?> value="1">Bohemian</option>
                                                <option <?php if (!empty($editproduct->wo_style_insp) && in_array(2, json_decode($editproduct->wo_style_insp, true))) { ?> selected <?php } ?> value="2">Casual</option>
                                                <option <?php if (!empty($editproduct->wo_style_insp) && in_array(3, json_decode($editproduct->wo_style_insp, true))) { ?> selected <?php } ?> value="3">Classic</option>
                                                <option <?php if (!empty($editproduct->wo_style_insp) && in_array(4, json_decode($editproduct->wo_style_insp, true))) { ?> selected <?php } ?> value="4">Edgy</option>
                                                <option <?php if (!empty($editproduct->wo_style_insp) && in_array(5, json_decode($editproduct->wo_style_insp, true))) { ?> selected <?php } ?> value="5">Trendy</option>

                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if(!in_array($product_ctg_nme,["A5", "A7", "A8"])){ ?> 
                                    <div class="col-md-6"  >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Dress length  <?php if(in_array($product_ctg_nme,["A2", "A6"])){ ?><sup style="color:red;">*</sup><?php } ?></label>
                                            <select name="variant_size_related[wo_dress_length]" id="wo_dress_length"  <?php if(in_array($product_ctg_nme,["A2", "A6"])){ ?>required<?php } ?>>
                                                <option <?php if (@$editproduct->wo_dress_length == 'NULL') { ?> selected="" <?php } ?> value="" selected disabled>-</option>
                                                <!--<option <?php if (@$editproduct->wo_dress_length == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>-->
                                                <option <?php if (@$editproduct->wo_dress_length == '1') { ?> selected="" <?php } ?> value="1">Mini</option>
                                                <option <?php if (@$editproduct->wo_dress_length == '2') { ?> selected="" <?php } ?> value="2">Short</option>
                                                <option <?php if (@$editproduct->wo_dress_length == '3') { ?> selected="" <?php } ?> value="3">Midi</option>
                                                <option <?php if (@$editproduct->wo_dress_length == '4') { ?> selected="" <?php } ?> value="4">Maxi</option>

                                            </select>                                         
                                        </div>
                                    </div>
                                    <?php  } ?>
                                </div>

                                <div class="row new_var_xx">
                                    <?php if(in_array($product_ctg_nme,["A1", "A3", "A4", "A9", "A10", "A11", "A12", "A14"]) /*|| in_array($product_sub_ctg_nme, ["A43", "A45", "A44", "A1411"])*/){ ?>
                                    <div class="col-md-6"     <?= (in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"]))?'style="display:none;"':''; ?> >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Top half   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?> </label>
                                            <select name="wo_top_half[]"  id="wo_top_half" class="form-control select2_select" multiple  <?php if($product_ctg_nme != "A4"){ ?>  <?= (in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"]))?'':'required'; ?> <?php } ?> >
                                                <option <?php if (!empty($editproduct->wo_top_half) && in_array('NULL', json_decode($editproduct->wo_top_half, true))) { ?> selected <?php } ?> value=""   disabled>--</option>
                                                <option <?php if (!empty($editproduct->wo_top_half) && in_array(1, json_decode($editproduct->wo_top_half, true))) { ?> selected <?php } ?> value="1">Fitted</option>
                                                <option <?php if (!empty($editproduct->wo_top_half) && in_array(2, json_decode($editproduct->wo_top_half, true))) { ?> selected <?php } ?> value="2">Straight</option>
                                                <option <?php if (!empty($editproduct->wo_top_half) && in_array(3, json_decode($editproduct->wo_top_half, true))) { ?> selected <?php } ?> value="3">Loose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if(in_array($product_ctg_nme,["A3", "A4", "A7", "A8"]) /*|| in_array($product_sub_ctg_nme, ["A41", "A42", "A47"])*/){ ?>
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pant Length   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?> </label>
                                            <select name="variant_size_related[wo_pant_length]"  <?php if($product_ctg_nme != "A4"){ ?> required <?php } ?>>
                                                <!--<option <?php if (@$editproduct->wo_pant_length == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>-->
                                                <option <?php if (@$editproduct->wo_pant_length == 'NULL') { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                <option <?php if (@$editproduct->wo_pant_length == '1') { ?> selected="" <?php } ?> value="1">Ankle</option>
                                                <option <?php if (@$editproduct->wo_pant_length == '2') { ?> selected="" <?php } ?> value="2">Regular</option>
                                                <option <?php if (@$editproduct->wo_pant_length == '3') { ?> selected="" <?php } ?> value="3">Long</option>

                                            </select>                                         
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="row new_var_xx">
                                    <?php if(in_array($product_ctg_nme,[/*"A3",*/ "A4", "A5", "A7", "A8"]) /*|| in_array($product_sub_ctg_nme, ["A41", "A42", "A47"])*/){ ?>
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pant Rise   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?>  </label>
                                            <select name="variant_size_related[wo_pant_rise]" class="form-control"  <?php if($product_ctg_nme != "A4"){ ?> required <?php } ?> >
                                                <option <?php if (@$editproduct->wo_pant_rise == 'NULL') { ?> selected="" <?php } ?> value=""  selected disabled>--</option>
                                                <option <?php if (@$editproduct->wo_pant_rise == '1') { ?> selected="" <?php } ?> value="1">Low Rise</option>
                                                <option <?php if (@$editproduct->wo_pant_rise == '2') { ?> selected="" <?php } ?> value="2">Mid Raise</option>
                                                <option <?php if (@$editproduct->wo_pant_rise == '3') { ?> selected="" <?php } ?> value="3">High Raise</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if(in_array($product_ctg_nme,["A3", "A4", "A7", "A8"])/* || in_array($product_sub_ctg_nme, ["A41", "A42", "A47"])*/){ ?>
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pant Style   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?> </label>
                                            <select name="variant_size_related[wo_pant_style]"  <?php if($product_ctg_nme != "A4"){ ?> required <?php } ?> >
                                                <!--<option <?php if (@$editproduct->wo_pant_style == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>-->
                                                <option <?php if (@$editproduct->wo_pant_style == 'NULL') { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                <option <?php if (@$editproduct->wo_pant_style == '1') { ?> selected="" <?php } ?> value="1">Skinny</option>
                                                <option <?php if (@$editproduct->wo_pant_style == '2') { ?> selected="" <?php } ?> value="2">Straight</option>
                                                <option <?php if (@$editproduct->wo_pant_style == '3') { ?> selected="" <?php } ?> value="3">Bootcut</option>
                                                <option <?php if (@$editproduct->wo_pant_style == '4') { ?> selected="" <?php } ?> value="4">Relaxed</option>
                                                <option <?php if (@$editproduct->wo_pant_style == '5') { ?> selected="" <?php } ?> value="5">Wide Leg</option>

                                            </select>                                         
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="row new_var_xx">
                                    <?php if(in_array($product_ctg_nme,["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "A10", "A11", "A12", "A14"]) || in_array($product_sub_ctg_nme, ["A41", "A42", "A47", "A43", "A45", "A44", "A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412", "A1411"])){ ?>
                                    <div class="col-md-6" <?= (in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"]))?'style="display:none;"':''; ?> >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Appare type   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?> </label>
                                            <select name="variant_size_related[wo_appare]" class="form-control"  <?php if($product_ctg_nme != "A4"){ ?>   <?= (in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"]))?'':'required'; ?> <?php } ?> >
                                                <option value="" selected="" <?php if (@$editproduct->wo_appare == 'NULL') { ?> selected="" <?php } ?> disabled>-</option>
                                                <!--<option <?php if (@$editproduct->wo_appare == 'NULL') { ?> selected="" <?php } ?> value="NULL">--</option>-->
                                                <option <?php if (@$editproduct->wo_appare == '1') { ?> selected="" <?php } ?> value="1">Dresses / jumpsuits</option>
                                                <option <?php if (@$editproduct->wo_appare == '2') { ?> selected="" <?php } ?> value="2">Tops</option>
                                                <option <?php if (@$editproduct->wo_appare == '3') { ?> selected="" <?php } ?> value="3">Bottoms</option>
                                                <option <?php if (@$editproduct->wo_appare == '4') { ?> selected="" <?php } ?> value="4">Denim</option>
                                                <option <?php if (@$editproduct->wo_appare == '5') { ?> selected="" <?php } ?> value="5">Sweaters</option>
                                                <option <?php if (@$editproduct->wo_appare == '6') { ?> selected="" <?php } ?> value="6">Jackets</option>
                                                <option <?php if (@$editproduct->wo_appare == '7') { ?> selected="" <?php } ?> value="7">Accessories</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if(in_array($product_ctg_nme,["A4", "A5", "A6", "A7", "A8"]) /*|| in_array($product_sub_ctg_nme, ["A41", "A42", "A47"])*/){ ?>
                                    <div class="col-md-6"   >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bottoms type   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?> </label>
                                            <select name="variant_size_related[wo_bottom_style]"  <?php if($product_ctg_nme != "A4"){ ?> required <?php } ?> >
                                                <!--<option selected="" value="" disabled>-</option>-->
                                                <option <?php if (@$editproduct->wo_bottom_style == 'NULL') { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                <?php if(in_array($product_sub_ctg_nme, [ "A74", "A75", "A76"])){ ?>
                                                 <option <?php if (@$editproduct->wo_bottom_style == "n/a") { ?> selected <?php } ?> value="n/a">N/A</option>
                                                 <?php } ?>
                                                <option <?php if (@$editproduct->wo_bottom_style == '1') { ?> selected="" <?php } ?> value="1">Skirts</option>
                                                <option <?php if (@$editproduct->wo_bottom_style == '2') { ?> selected="" <?php } ?> value="2">Striped Shorts</option>
                                                <option <?php if (@$editproduct->wo_bottom_style == '3') { ?> selected="" <?php } ?> value="3">Capri Jeans</option>
                                                <option <?php if (@$editproduct->wo_bottom_style == '4') { ?> selected="" <?php } ?> value="4">Cargo Pant</option>
                                                <option <?php if (@$editproduct->wo_bottom_style == '5') { ?> selected="" <?php } ?> value="5">Checked Pant</option>
                                                <option <?php if (@$editproduct->wo_bottom_style == '6') { ?> selected="" <?php } ?> value="6">Palazzo</option>
                                                <option <?php if (@$editproduct->wo_bottom_style == '7') { ?> selected="" <?php } ?> value="7">Denim Shorts</option>
                                                <option <?php if (@$editproduct->wo_bottom_style == '8') { ?> selected="" <?php } ?> value="8">Jeans</option>

                                            </select>                                         
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="row new_var_xx">
                                    <?php if(in_array($product_ctg_nme,["A1", "A3", "A4", "A9", "A10", "A11", "A12", "A14"]) /*|| in_array($product_sub_ctg_nme, ["A43", "A45", "A44", "A1411"])*/){ ?>
                                    <div class="col-md-6"     <?= (in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"]))?'style="display:none;"':''; ?>>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Top type  <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?>  </label>
                                            <select name="variant_size_related[wo_top_style]" class="form-control"  <?php if($product_ctg_nme != "A4"){ ?>  <?= (in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"]))?'':'required'; ?> <?php } ?> >  
                                                <option value="" selected=""  <?php if (@$editproduct->wo_top_style == 'NULL') { ?> selected="" <?php } ?>   disabled>-</option>
                                                <!--<option <?php if (@$editproduct->wo_top_style == 'NULL') { ?> selected="" <?php } ?> value="NULL" disabled>--</option>-->
                                                <option <?php if (@$editproduct->wo_top_style == '1') { ?> selected="" <?php } ?> value="1">Sleevelss</option>
                                                <option <?php if (@$editproduct->wo_top_style == '2') { ?> selected="" <?php } ?> value="2">Shorts Sleeve</option>
                                                <option <?php if (@$editproduct->wo_top_style == '3') { ?> selected="" <?php } ?> value="3">Long Sleeve</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-6"  <?= (in_array($product_sub_ctg_nme, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"]))?'style="display:none;"':''; ?>>
                                        <div class="form-group">
                                            <!--- need to check if user not picked --->
                                            <label for="exampleInputPassword1">Patterns type</label>
                                            <select name="variant_size_related[wo_patterns]" >
                                                <option <?php if (@$editproduct->wo_patterns == 'NULL') { ?> selected="" <?php } ?> value="" selected required>--</option>
                                                <option <?php if (@$editproduct->wo_patterns == '1') { ?> selected="" <?php } ?> value="1">Lace</option>
                                                <option <?php if (@$editproduct->wo_patterns == '2') { ?> selected="" <?php } ?> value="2">Animal Print</option>
                                                <option <?php if (@$editproduct->wo_patterns == '3') { ?> selected="" <?php } ?> value="3">Tribal</option>
                                                <option <?php if (@$editproduct->wo_patterns == '4') { ?> selected="" <?php } ?> value="4">Polak Dot</option>
                                                <option <?php if (@$editproduct->wo_patterns == '5') { ?> selected="" <?php } ?> value="5">Stripes</option>
                                                <option <?php if (@$editproduct->wo_patterns == '6') { ?> selected="" <?php } ?> value="6">Floral</option>

                                            </select>                                         
                                        </div>
                                    </div>
                                </div>

                                <div class="row new_var_xx">
                                    <?php if(in_array($product_ctg_nme,["A7"])){ ?>
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Denim styles?   <?php if($product_ctg_nme != "A4"){ ?> <sup style="color:red;">*</sup> <?php } ?> </label>
                                            <select name="denim_styles[]" id="denim_styles" class="form-control select2_select" multiple  <?php if($product_ctg_nme != "A4"){ ?> required <?php } ?> >
                                                <option <?php if (!empty($editproduct->denim_styles) && in_array('NULL', json_decode($editproduct->denim_styles, true))) { ?> selected <?php } ?> value="" disabled>--</option>
                                                <option <?php if (!empty($editproduct->denim_styles) && in_array('distressed_denim_non', json_decode($editproduct->denim_styles, true))) { ?> selected <?php } ?> value="distressed_denim_non">Distressed denim non</option>
                                                <option <?php if (!empty($editproduct->denim_styles) && in_array('distressed_denim_minimally', json_decode($editproduct->denim_styles, true))) { ?> selected <?php } ?> value="distressed_denim_minimally">Distressed denim minimally</option>
                                                <option <?php if (!empty($editproduct->denim_styles) && in_array('distressed_denim_fairly', json_decode($editproduct->denim_styles, true))) { ?> selected <?php } ?> value="distressed_denim_fairly">Distressed denim fairly</option>
                                                <option <?php if (!empty($editproduct->denim_styles) && in_array('distressed_denim_heavily', json_decode($editproduct->denim_styles, true))) { ?> selected <?php } ?> value="distressed_denim_heavily">Distressed denim heavily</option>

                                            </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Missing from fit/your closet?</label>
                                            <select name="variant_size_related[missing_from_your_fIT]" class="form-control">
                                                <option <?php if (@$editproduct->missing_from_your_fIT == 'NULL') { ?> selected="" <?php } ?> value="" disabled selected>--</option>
                                                <option <?php if (@$editproduct->missing_from_your_fIT == 'Sweaters') { ?> selected="" <?php } ?> value="Sweaters">Sweaters</option>
                                                <option <?php if (@$editproduct->missing_from_your_fIT == 'Blouses') { ?> selected="" <?php } ?> value="Blouses">Blouses</option>
                                                <option <?php if (@$editproduct->missing_from_your_fIT == 'Jeans') { ?> selected="" <?php } ?> value="Jeans">Jeans</option>
                                                <option <?php if (@$editproduct->missing_from_your_fIT == 'Pants') { ?> selected="" <?php } ?> value="Pants">Pants</option>
                                                <option <?php if (@$editproduct->missing_from_your_fIT == 'Skirts') { ?> selected="" <?php } ?> value="Skirts">Skirts</option>
                                                <option <?php if (@$editproduct->missing_from_your_fIT == 'SkiDressesrts') { ?> selected="" <?php } ?> value="Dresses">Dresses</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!--- need to check if user not picked --->
                                            <label for="exampleInputPassword1">OutFit prefer to wear</label>

                                            <div class="btn-group btn-group-toggle" id="wom_outfit_wer" data-toggle="buttons" style="float: left;width: 100%;">
                                                <label class="btn btn-secondary   <?php if (empty($editproduct->outfit_prefer)) { ?> active <?php } ?>" for="wmens12300" onclick="updateOutfitWomenChkbox()" style="float: left;width: 12.5%;height: 165px;align-items: center;display: flex;" >
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="NULL"  <?php if (!empty($editproduct->outfit_prefer) && in_array('NULL', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?> id="wmens12300"> None </label>
                                                <label class="btn btn-secondary <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v3', json_decode($editproduct->outfit_prefer, true))) { ?> active <?php } ?>" style="float: left;width: 12.5%;" onclick="$('#wom_outfit_wer label:first').removeClass('active');">
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="style_sphere_selections_v3"  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v3', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?> > 
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit1.jpg" alt="" width="100">
                                                </label>
                                                <label class="btn btn-secondary  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v4', json_decode($editproduct->outfit_prefer, true))) { ?> active <?php } ?>" style="float: left;width: 12.5%;" onclick="$('#wom_outfit_wer label:first').removeClass('active');">
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="style_sphere_selections_v4"  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v4', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?>> 
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit2.jpg" alt="" width="100">
                                                </label>
                                                <label class="btn btn-secondary  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v5', json_decode($editproduct->outfit_prefer, true))) { ?> active <?php } ?>" style="float: left;width: 12.5%;" onclick="$('#wom_outfit_wer label:first').removeClass('active');">
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="style_sphere_selections_v5"  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v5', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?>> 
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit3.jpg" alt="" width="100">
                                                </label>
                                                <label class="btn btn-secondary  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v6', json_decode($editproduct->outfit_prefer, true))) { ?> active <?php } ?>" style="float: left;width: 12.5%;" onclick="$('#wom_outfit_wer label:first').removeClass('active');">
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="style_sphere_selections_v6"  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v6', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?>> 
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit4.jpg" alt="" width="100">
                                                </label>
                                                <label class="btn btn-secondary  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v7', json_decode($editproduct->outfit_prefer, true))) { ?> active <?php } ?>" style="float: left;width: 12.5%;" onclick="$('#wom_outfit_wer label:first').removeClass('active');">
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="style_sphere_selections_v7"  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v7', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?>> 
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit5.jpg" alt="" width="100">
                                                </label>
                                                <label class="btn btn-secondary  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v8', json_decode($editproduct->outfit_prefer, true))) { ?> active <?php } ?>" style="float: left;width: 12.5%;" onclick="$('#wom_outfit_wer label:first').removeClass('active');">
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="style_sphere_selections_v8"  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v8', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?>> 
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit6.jpg" alt="" width="100">
                                                </label>
                                                <label class="btn btn-secondary  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v9', json_decode($editproduct->outfit_prefer, true))) { ?> active <?php } ?>" style="float: left;width: 12.5%;" onclick="$('#wom_outfit_wer label:first').removeClass('active');">
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="style_sphere_selections_v9"  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v9', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?>> 
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit7.jpg" alt="" width="100">
                                                </label>
                                                <label class="btn btn-secondary  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v11', json_decode($editproduct->outfit_prefer, true))) { ?> active <?php } ?>" style="float: left;width: 12.5%;" onclick="$('#wom_outfit_wer label:first').removeClass('active');">
                                                    <input type="checkbox" name="outfit_prefer[]" autocomplete="off" value="style_sphere_selections_v11"  <?php if (!empty($editproduct->outfit_prefer) && in_array('style_sphere_selections_v11', json_decode($editproduct->outfit_prefer, true))) { ?> checked <?php } ?>> 
                                                    <img src="<?= HTTP_ROOT_BASE; ?>assets/women-img/women-summeroutfit8.jpg" alt="" width="100">
                                                </label>

                                            </div>

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
                                            <label for="exampleInputPassword1">TOPS</label>
                                            <input type="radio" name="budget_type" value="wo_top_budg" <?php if ((@$editproduct->budget_type == "wo_top_budg")) { ?> checked <?php } ?>>
                                            <select name="wo_top_budg" class="form-control" style="width: 85%;">
                                                <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="NULL" <?php } ?> value="">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$50 - $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$75 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$100 - $125</option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_top_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$125+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">BOTTOMS</label>
                                            <input type="radio" name="budget_type" value="wo_bottoms_budg" <?php if ((@$editproduct->budget_type == "wo_bottoms_budg")) { ?> checked <?php } ?>>
                                            <select name="wo_bottoms_budg" class="form-control" style="width: 85%;">
                                                <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="NULL" <?php } ?> value="">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $30</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$30 - $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$50 - $70</option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$70 - $90</option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_bottoms_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$90+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>

                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">OUTERWEAR</label>
                                            <input type="radio" name="budget_type" value="wo_outerwear_budg"  <?php if ((@$editproduct->budget_type == "wo_outerwear_budg")) { ?> checked <?php } ?>>
                                            <select name="wo_outerwear_budg" class="form-control" style="width:85%;">
                                                <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="NULL" <?php } ?> value="">--</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $50</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$50 - $75</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$75 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$100 - $125</option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_outerwear_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$125+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">JEANS</label>
                                            <input type="radio" name="budget_type" value="wo_jeans_budg"  <?php if ((@$editproduct->budget_type == "wo_jeans_budg")) { ?> checked <?php } ?>>
                                            <select name="wo_jeans_budg" class="form-control"  style="width:85%;">
                                                <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75 </option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $100 </option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$100 - $125 </option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$125 - $175 </option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_jeans_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$175+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>

                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">JEWELRY</label>
                                            <input type="radio" name="budget_type" value="wo_jewelry_budg"  <?php if ((@$editproduct->budget_type == "wo_jewelry_budg")) { ?> checked <?php } ?>>
                                            <select name="wo_jewelry_budg" class="form-control" style="width:85%;">
                                                <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $40</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$40 - $60</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$60 - $80 </option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$80 - $100</option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_jewelry_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$100+</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">ACCESSORIES</label>
                                            <input type="radio" name="budget_type" value="wo_accessories_budg" <?php if ((@$editproduct->budget_type == "wo_accessories_budg")) { ?> checked <?php } ?>>
                                            <select name="wo_accessories_budg" class="form-control" style="width:85%;">
                                                <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75 </option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $125 </option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$125 - $175 </option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$175 - $250 </option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_accessories_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$250+</option> 
                                            </select>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="row new_var_xx">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">DRESS</label>
                                            <input type="radio" name="budget_type" value="wo_dress_budg"  <?php if ((@$editproduct->budget_type == "wo_dress_budg")) { ?> checked <?php } ?>>
                                            <select name="wo_dress_budg" class="form-control" style="width:85%;">
                                                <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == 'NULL')) { ?> selected="" <?php } ?> value="" selected disabled>--</option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '1')) { ?> selected="" <?php } ?> value="1">Under $75 </option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '2')) { ?> selected="" <?php } ?> value="2">$75 - $125 </option>
                                                <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '3')) { ?> selected="" <?php } ?> value="3">$125 - $175 </option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '4')) { ?> selected="" <?php } ?> value="4">$175 - $250 </option> 
                                                <option <?php if ((@$editproduct->budget_type == "wo_dress_budg") && (@$editproduct->budget_value == '5')) { ?> selected="" <?php } ?> value="5">$250+</option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                                                
                                <div class="row new_var_xx">
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Display status <sup style="color:red;">*</sup></label>
                                            <select name="display_status" class="form-control" required>
                                                <option <?php if (@$editproduct->display_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                <option <?php if (@$editproduct->display_status == '1') { ?> selected="" <?php } ?> value="1">Display</option>                                
                                                <option <?php if (@$editproduct->display_status == '2') { ?> selected="" <?php } ?> value="2">Non Display</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product status <sup style="color:red;">*</sup></label>
                                                <select name="product_status" class="form-control" required>
                                                   <option <?php if (@$editproduct->product_status == '') { ?> selected="" <?php } ?> value="">--</option>
                                                   <option <?php if (@$editproduct->product_status == 'S') { ?> selected="" <?php } ?> value="S"><?=Configure::read('S');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'O') { ?> selected="" <?php } ?> value="O"><?=Configure::read('O');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'C') { ?> selected="" <?php } ?> value="C"><?=Configure::read('C');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'R') { ?> selected="" <?php } ?> value="R"><?=Configure::read('R');?></option>                                
                                                    <option <?php if (@$editproduct->product_status == 'F') { ?> selected="" <?php } ?> value="F"><?=Configure::read('F');?></option> 
                                                </select>
                                            </div>
                                        </div>

                                </div>
                                <div class="row new_var_xx">
                                   

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Note</label>
                                        <?= $this->Form->input('note', ['value' => @$editproduct->note, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter note']); ?>
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
                            </div>
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
    <style>
        .note-editor.note-airframe .note-editing-area, .note-editor.note-frame .note-editing-area {
            overflow: visible !important;
            float: left;
            width: 100%;
        }
        .modal-backdrop.in {
            display: none !important;
        }
        button[data-original-title=Help]{
            display: none;
        }        
    </style>
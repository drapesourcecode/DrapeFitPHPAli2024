<!-- <link rel="stylesheet" href="<?php //echo HTTP_ROOT; ?>bootstrap/css/bootstrap.min.css">
<script src="<?php //echo HTTP_ROOT; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php //echo HTTP_ROOT; ?>bootstrap/js/bootstrap.min.js"></script> -->
<?php //echo $this->Html->script('jquery.min.js'); ?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Matching percentage</th>
            <th>Brand Name</th>
            <th>Product Name 1</th>
            <th>Style no.</th>
            <th>Product Image</th>
            <th>Size</th>
            <th>Color</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $color_arr = $this->Custom->inColor();
            foreach ($getMatchingProducts as $get_match_prd){
                 ?>
                 <tr>
                    <td> 


                    </td>
                    <td><?php echo $this->Custom->InBrandsName($get_match_prd->id); ?></td>
                    <td><?php echo $get_match_prd->product_name_one; ?></td>
                    <td><?php echo empty($this->Custom->Inproductnameone($get_match_prd->id)->style_number)?$this->Custom->Inproductnameone($get_match_prd->id)->dtls:$this->Custom->Inproductnameone($get_match_prd->id)->style_number; ?></td>
                    <td><img src="<?php echo $this->Custom->imgpath($get_match_prd->id) . 'files/product_img/' ?><?php echo $this->Custom->InproductImage($get_match_prd->id); ?>" style="width: 80px;"/></td>
                    <td><?php
                        $pick_s = $this->Custom->Inproductnameone($get_match_prd->id)->picked_size;
                        if (!empty($pick_s)) {
                            $li_size = explode('-', $pick_s);
                            foreach ($li_size as $sz_l) {
                                $pdc_sz = $this->Custom->Inproductnameone($get_match_prd->id)->$sz_l;
                                if (($pdc_sz == 0) || ($pdc_sz == 00)) {
                                    echo $pdc_sz;
                                } else {
                                    echo!empty($pdc_sz) ? $pdc_sz . '&nbsp;&nbsp;' : '';
                                }
                            }
                        }
                        if (!empty($this->Custom->Inproductnameone($get_match_prd->id)->primary_size) && ($this->Custom->Inproductnameone($get_match_prd->id)->primary_size == 'free_size')) {
                            echo "Free Size";
                        }
                        ?></td>
                    <td><?php echo $color_arr[$this->Custom->Inproductnameone($get_match_prd->id)->color]; ?></td>
                    <td><?php echo $this->Custom->InproductsalePrice($get_match_prd->id); ?></td>
                    <td><?php
                        $prod_idd = $get_match_prd->prod_id;
                        echo $prd_ttQ = $this->Custom->productQuantity($prod_idd);
                        ?></td>
                    <td>
                        
                    <button type="button" onclick="openCmt(<?= $get_match_prd->id; ?>,<?=$payment_id;?>)" class="btn btn-primary">Comments</button>


                        <?php //echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "View product details", 'data-toggle' => 'modal', 'data-target' => '#myModalproductgk-' . $get_match_prd->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>                                            
                        <?php 
                        if(!empty($get_match_prd->pop)){
                            echo "Already added in po";
                        }else{
                            if($prd_ttQ < 1){ ?>
                                <button type="button" id="btnshowPo<?=$where_to_show.$get_match_prd->id;?>" onclick="$('#showPo<?= $where_to_show.$get_match_prd->id;?>').toggle();$('#btnshowPo<?= $where_to_show.$get_match_prd->id;?>').toggle()" class="btn btn-sm btn-primary">Add to PO</button>
                                <div id="showPo<?=$where_to_show.$get_match_prd->id;?>" style="display:none;">
                                    <?= $this->Form->create('',['type'=>'post', 'url'=>['action'=>'addPoRequest']]);?>
                                    <input type="text" step="1" name="qty" min="1" placeholder="Quantity" style="width:100px;" value="1" readonly required>
                                    <input type="hidden"  name="product_id" value="<?=$prod_idd;?>">
                                    <input type="hidden"  name="brand_id" value="<?=$get_match_prd->brand_id;?>">
                                    <input type="hidden"  name="user_id" value="<?=$getPaymentGatewayDetails->user_id;?>">
                                    <input type="hidden"  name="kid_id" value="<?=$getPaymentGatewayDetails->kid_id;?>">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    <?= $this->Form->end(); ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <?php 
                        if($prd_ttQ >= 1){ 
                        if (empty($get_match_prd->allocate_to_user_id)) { ?>
                    <a href="<?= HTTP_ROOT . 'appadmins/allocate/' . $get_match_prd->id . '/' . $getPaymentGatewayDetails->user_id . '/' . $getPaymentGatewayDetails->kid_id; ?>">
                        <button type="button" class="btn btn-sm btn-primary">Allocation</button>
                    </a>
                    <?php }} else { ?>
                    <!--<a href="<?= HTTP_ROOT . 'appadmins/release/' .  $get_match_prd->id . '/' . $getPaymentGatewayDetails->user_id . '/' . $getPaymentGatewayDetails->kid_id; ?>">-->
                    <!--    <button type="button" class="btn btn-sm btn-primary">Release</button>-->
                    <!--</a>-->
                    <?php } ?>
                    </td>
                </tr>

                <?php 
            } 
            if(empty($getMatchingProducts)  && !empty($user_size_col) && !empty($user_size)){
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?=$user_size_col;?></td>
                    <td><?=$user_size;?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    <button type="button" onclick="openSuggCmt('<?=$where_to_show;?>','<?=$user_size_col;?>','<?=$user_size;?>',<?=$getPaymentGatewayDetails->user_id;?>,<?=$getPaymentGatewayDetails->kid_id;?>,<?=  $payment_id;?>)" class="btn btn-primary">Comments</button>
                    <button class="btn btn-primary" onclick="addVariantForPoRequest('<?=$where_to_show;?>','<?=$user_size_col;?>','<?=$user_size;?>',<?=$getPaymentGatewayDetails->user_id;?>,<?=$getPaymentGatewayDetails->kid_id;?>,<?=  $payment_id;?>)" >Add to PO</button>
                    
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
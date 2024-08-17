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
                        


                        <?php //echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "View product details", 'data-toggle' => 'modal', 'data-target' => '#myModalproductgk-' . $get_match_prd->id, "title" => "View Product Details", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>                                            
                        <?php 
                        if(!empty($ap_li->pop)){
                            echo "Already added in po";
                        }else{
                    //    if($prd_ttQ <= 1){ ?>
                        <button type="button" id="btnshowPo<?=$prod_idd;?>" onclick="$('#showPo<?=$prod_idd;?>').toggle();$('#btnshowPo<?=$prod_idd;?>').toggle()" class="btn btn-sm btn-primary">Add to PO</button>
                        <div id="showPo<?=$prod_idd;?>" style="display:none;">
                            <?= $this->Form->create('',['type'=>'post', 'url'=>['action'=>'addPoRequest']]);?>
                            <input type="number" step="1" name="qty" min="1" placeholder="Quantity" style="width:100px;" required>
                            <input type="hidden"  name="product_id" value="<?=$prod_idd;?>">
                            <input type="hidden"  name="brand_id" value="<?=$ap_li->brand_id;?>">
                            <input type="hidden"  name="user_id" value="<?=$getData->user_id;?>">
                            <input type="hidden"  name="kid_id" value="<?=$getData->kid_id;?>">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            <?= $this->Form->end(); ?>
                        </div>
                        <?php } ?>
                        <?php if (empty($ap_li->allocate_to_user_id)) { ?>
                    <a href="<?= HTTP_ROOT . 'appadmins/allocate/' . $ap_li->id . '/' . $getData->user_id . '/' . $getData->kid_id; ?>">
                        <button type="button" class="btn btn-sm btn-primary">Allocation</button>
                    </a>
                    <?php } else { ?>
                    <!--<a href="<?= HTTP_ROOT . 'appadmins/release/' .  $ap_li->id . '/' . $getData->user_id . '/' . $getData->kid_id; ?>">-->
                    <!--    <button type="button" class="btn btn-sm btn-primary">Release</button>-->
                    <!--</a>-->
                    <?php } ?>
                    </td>
                </tr>

                <?php 
            } 
        ?>
    </tbody>
</table>
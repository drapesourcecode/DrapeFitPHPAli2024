<link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>bootstrap/css/bootstrap.min.css">
<script src="<?php echo HTTP_ROOT; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo HTTP_ROOT; ?>bootstrap/js/bootstrap.min.js"></script>
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
                                <button type="button" id="btnshowPo<?=$get_match_prd->id;?>" onclick="$('#showPo<?= $get_match_prd->id;?>').toggle();$('#btnshowPo<?= $get_match_prd->id;?>').toggle()" class="btn btn-sm btn-primary">Add to PO</button>
                                <div id="showPo<?=$get_match_prd->id;?>" style="display:none;">
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
            if($where_to_show=="look_1_summer_sleeveless_top"){
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
<?= $this->Form->create('',['type'=>'post', 'id'=>'po_variant_add', 'url'=>['action'=>'addVariantForPoRequest']]);?>
    <input type="hidden" name="look_type" >
    <input type="hidden"  name="user_size_col">                                    
    <input type="hidden"  name="user_size">                                    
    <input type="hidden"  name="pay_user_id">                                    
    <input type="hidden"  name="pay_kid_id">                                    
    <input type="hidden"  name="payment_id">                                    
    <button type="submit" style="display: none;"></button>
<?= $this->Form->end(); ?>
<script>
    function openCmt(product_id, payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandiseMatchingComment",
            data: {
                product_id: product_id,
                payment_id: payment_id,
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_product_id').val(product_id);
                $('#cmt_payment_id').val(payment_id);
                $('#comment_list').html(result);
            }
        });
        $('#comment_modal').modal('show');
    }

    function getAllCmt(product_id, payment_id) {
        $('#comment_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandiseMatchingComment",
            data: {
                product_id: product_id,
                payment_id: payment_id,
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_product_id').val(product_id);
                $('#cmt_payment_id').val(payment_id);
                $('#comment_list').html(result);
            }
        });
    }

    function postCmt() {
        let cmt = $('#cmt_detail').val();
        let product_id = $('#cmt_product_id').val();
        let payment_id = $('#cmt_payment_id').val();
        
        let id = $('#id').val();
        let url = "<?= HTTP_ROOT; ?>appadmins/postMerchandiseMatchingComment";
        let data = {
            product_id: product_id,
            payment_id: payment_id,
            comment: cmt,
        };

        if (id) {

            url += "/" + id;
            data['comment_id'] = id;
        }

        if (cmt.length < 3) {
            $('#cmt_detail').focus();
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'JSON',
                success: function(result) {
                    $('#cmt_product_id').val('');
                    $('#cmt_payment_id').val('');
                    $('#cmt_detail').text('');
                    $('#cmt_detail').val('');
                    $('#cmt_detail').val('');
                    $('#id').val('');
                    getAllCmt(product_id, payment_id);

                }
            });
        }
    }
    
    function editComment(commentId) {
        console.log('commentId:',commentId);
        $.ajax({
            type: "POST",
            url: "<?=HTTP_ROOT;?>appadmins/editMerchandiseMatchingComment",
            data: {commentId: commentId},
            dataType:'JSON',
            success: function (result) {
                $('#id').val(commentId); 
                $('#cmt_product_id').val(result.product_id);
                $('#cmt_payment_id').val(result.payment_id);
                $('#cmt_detail').val(result.comment); 
                $('#comment_modal').modal('show'); 
            }
        });
    }

    function deleteComment(commentId) {
        if (confirm("Are you sure you want to delete this comment?")) {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>appadmins/deleteMerchandiseMatchingComment/" + commentId,
                dataType: 'JSON',
                success: function(result) {
                    if (result === 'success') {
                        getAllCmt($('#cmt_product_id').val(), $('#cmt_payment_id').val());
                    } else {
                        alert("Failed to delete comment.");
                    }
                }
            });
        }
    }

    function openSuggCmt(look_type, user_size_col, user_size, pay_user_id, pay_kid_id, payment_id){
        $('#comment_sugg_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandiseSuggComment",
            data: {
                look_type: look_type,
                user_size_col: user_size_col,
                user_size: user_size,
                pay_user_id: pay_user_id,
                pay_kid_id: pay_kid_id,
                payment_id: payment_id,
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_sugg_look_type').val(look_type);
                $('#cmt_sugg_user_size_col').val(user_size_col);
                $('#cmt_sugg_user_size').val(user_size);
                $('#cmt_sugg_user_id').val(pay_user_id);
                $('#cmt_sugg_kid_id').val(pay_kid_id);
                $('#cmt_sugg_payment_id').val(payment_id);
                $('#comment_sugg_list').html(result);
            }
        });
        $('#comment_sugg_modal').modal('show');
    }

    function getAllSuggCmt(look_type, user_size_col, user_size, pay_user_id, pay_kid_id, payment_id) {
        $('#comment_sugg_list').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/getMerchandiseSuggComment",
            data: {
                look_type: look_type,
                user_size_col: user_size_col,
                user_size: user_size,
                pay_user_id: pay_user_id,
                pay_kid_id: pay_kid_id,
                payment_id: payment_id,
            },
            dataType: 'html',
            success: function(result) {
                $('#cmt_sugg_look_type').val(look_type);
                $('#cmt_sugg_user_size_col').val(user_size_col);
                $('#cmt_sugg_user_size').val(user_size);
                $('#cmt_sugg_user_id').val(pay_user_id);
                $('#cmt_sugg_kid_id').val(pay_kid_id);
                $('#cmt_sugg_payment_id').val(payment_id);
                $('#comment_sugg_list').html(result);
            }
        });
    }
    
    function postSuggCmt() {
        let cmt = $('#cmt_sugg_detail').val();
        let payment_id = $('#cmt_sugg_payment_id').val();
        let look_type = $('#cmt_sugg_look_type').val();
        let user_size_col = $('#cmt_sugg_user_size_col').val();
        let user_size = $('#cmt_sugg_user_size').val();
        let pay_user_id = $('#cmt_sugg_user_id').val();
        let pay_kid_id = $('#cmt_sugg_kid_id').val();
        let id = $('#sugg_id').val();
        let url = "<?= HTTP_ROOT; ?>appadmins/postMerchandiseSuggComment";
        let data = {
            look_type: look_type,
            user_size_col: user_size_col,
            user_size: user_size,
            pay_user_id: pay_user_id,
            pay_kid_id: pay_kid_id,
            payment_id: payment_id,
            comment: cmt,
        };

        if (id) {

            url += "/" + id;
            data['comment_id'] = id;
        }

        if (cmt.length < 3) {
            $('#cmt_sugg_detail').focus();
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'JSON',
                success: function(result) {
                    $('#cmt_sugg_payment_id').val('');
                    $('#cmt_sugg_payment_id').val('');
                    $('#cmt_sugg_detail').text('');
                    $('#cmt_sugg_detail').val('');
                    $('#cmt_sugg_detail').val('');
                    $('#id').val('');
                    getAllSuggCmt(look_type, user_size_col, user_size, pay_user_id, pay_kid_id, payment_id);

                }
            });
        }
    }

    function editSuggComment(commentId) {
        console.log('commentId:',commentId);
        $.ajax({
            type: "POST",
            url: "<?=HTTP_ROOT;?>appadmins/editMerchandiseSuggComment",
            data: {commentId: commentId},
            dataType:'JSON',
            success: function (result) {
                $('#sugg_id').val(commentId); 
                $('#cmt_sugg_look_type').val(result.look_type);
                $('#cmt_sugg_user_size_col').val(result.user_size_col);
                $('#cmt_sugg_user_size').val(result.user_size);
                $('#cmt_sugg_user_id').val(result.pay_user_id);
                $('#cmt_sugg_kid_id').val(result.pay_kid_id);
                $('#cmt_sugg_payment_id').val(result.payment_id);
                $('#cmt_sugg_detail').val(result.comment); 
                $('#comment_sugg_modal').modal('show'); 
            }
        });
    }

    function deleteSuggComment(commentId) {
        if (confirm("Are you sure you want to delete this comment?")) {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>appadmins/deleteMerchandiseSuggComment/" + commentId,
                dataType: 'JSON',
                success: function(result) {
                    if (result === 'success') {
                        getAllSuggCmt( $('#cmt_sugg_look_type').val(), $('#cmt_sugg_user_size_col').val(), $('#cmt_sugg_user_size').val(), $('#cmt_sugg_user_id').val(), $('#cmt_sugg_kid_id').val(), $('#cmt_sugg_payment_id').val() );
                    } else {
                        alert("Failed to delete comment.");
                    }
                }
            });
        }
    }

function addVariantForPoRequest(look_type, user_size_col, user_size, pay_user_id, pay_kid_id, payment_id){
        $('#po_variant_add input[name=look_type]').val(look_type);
        $('#po_variant_add input[name=user_size_col]').val(user_size_col);
        $('#po_variant_add input[name=user_size]').val(user_size);
        $('#po_variant_add input[name=pay_user_id]').val(pay_user_id);
        $('#po_variant_add input[name=pay_kid_id]').val(pay_kid_id);
        $('#po_variant_add input[name=payment_id]').val(payment_id);
        $('#po_variant_add').submit();
}
    
    $('.modal-footer .btn-default').click(function() {
        closeCmtModal();
    });
</script>


<div id="comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 100%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <div class="cmt-frm">
                    <input type="hidden" id="cmt_product_id" />
                    <input type="hidden" id="cmt_payment_id" />
                    <input type="hidden" id="id" value="" />
                    <textarea class="form-control" rows="2" id="cmt_detail"></textarea>
                    <button type="button" class="btn btn-success" onclick="postCmt()">Submit</button>
                </div>
                <div id="comment_list"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="comment_sugg_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" style="width: 100%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comments</h4>
            </div>
            <div class="modal-body">
                <div class="cmt-frm">
                    <input type="hidden" id="cmt_sugg_look_type" />
                    <input type="hidden" id="cmt_sugg_user_size_col" />
                    <input type="hidden" id="cmt_sugg_user_size" />
                    <input type="hidden" id="cmt_sugg_user_id" />
                    <input type="hidden" id="cmt_sugg_kid_id" />
                    <input type="hidden" id="cmt_sugg_payment_id" />
                    <input type="hidden" id="sugg_id" value="" />
                    <textarea class="form-control" rows="2" id="cmt_sugg_detail"></textarea>
                    <button type="button" class="btn btn-success" onclick="postSuggCmt()">Submit</button>
                </div>
                <div id="comment_sugg_list"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
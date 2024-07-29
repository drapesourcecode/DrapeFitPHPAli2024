<div class="content-wrapper">
    <section class="content-header">
        <center>
            <h1>DECLINED PRODUCT LIST</h1>
        </center>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-sm-6">
                                <label>Select card</label>
                                <select name="payment_card_id" class="form-control" onchange="setCard(this)">
                                    <option value="" selected="" disabled>---</option>
                                    <?php foreach($payment_cards as $crd_li){ ?>
                                    <option value="<?=$crd_li->id;?>" <?=($crd_li->use_card == 1 )?"selected":""; ?> ><?=$crd_li->card_number;?> [<?=$crd_li->card_expire;?>]</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?=$this->Form->create('',['type'=>'post','url'=>['action'=>"processSelectedProduct"]]); ?>
                        <div class="submit_btn" style="display:none;">
                                <button type="submit" class="btn btn-info">Proceed to KEEP</button>
                            </div>
                        <?php
                        foreach ($prData as $data) {
                            $img_dd = "";
                            $img_dd = strstr($data->product_image, PRODUCT_IMAGES) ? $data->product_image : PRODUCT_IMAGES . $data->product_image;
                            ?>
                        
                            <div class="row">
                                <div class="col-sm-1"><input class="prd_chk" type="checkbox" name="prod_id[]" value="<?=$data->id;?>"></div>
                                <div class="col-sm-6">

                                                <!--<h3><strong>Rack:</strong> <?php echo $data['in_rack']; ?></h3>-->
                                    <h4><?php echo $data['product_name_one']; ?></h4>
                                    <!--<h5><?php echo $data['product_name_two']; ?></h5>-->

                                    <h6><strong>SIZE:</strong><span><?php echo $data['size']; ?></span></h6>
                                    <h6><strong>COLOR:</strong> <span><?php echo $data['color']; ?></span></h6>
                                    <h6><strong>Bar code:</strong> <span><?php echo $data['barcode_value']; ?></span></h6>

                                    <h6><strong>Price:</strong><span>$ <?php echo number_format($data['sell_price'], 2); ?></span></h6>
                                </div>
                                <div class="col-sm-4">
                                    <img  width="150" src="<?php echo HTTP_ROOT; ?><?= $img_dd; ?>"/>

                                </div>
                                <div class="col-sm-1">
                                    <!--<a href="<?=HTTP_ROOT;?>appadmins/proceedKeep/<?=$data->id;?>" class="btn btn-info">Keep</a>-->
                                </div>
                            </div>
                            <hr>

                            <?php
                        }
                        ?>
                            <div class="submit_btn" style="display:none;">
                                <button type="submit" class="btn btn-info">Proceed to KEEP</button>
                            </div>
                            <?=$this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script>
    $('.prd_chk').click(function(){
        var checkedVals = $('.prd_chk:checkbox:checked').map(function() {
            return this.value;
        }).get();
        
        if(checkedVals.length>=1){
            $('.submit_btn').show();
        }else{
            $('.submit_btn').hide();
        }
    });
    
    function setCard(data) {
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>appadmins/update_payment_card",
            data: {
               card_id: data.value
            },
            dataType: 'JSON',
            success: function(result) {
                if(result.status == "success"){
                    location.reload();
                }
            }
        });
    }
</script>
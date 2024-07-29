<div class="content-wrapper">
    <div class="container">
        <?= $this->Flash->render() ?>  
        <?php if (!empty($stamps_label_details)) { ?>
        <!--<pre>-->
            <?php // print_r($stamps_label_details); ?>
        <!--</pre>-->
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-4">
                    <a href="<?=$stamps_label_details->ship_label_url;?>" target="_blank" class="btn btn-success">PRINT SHIPPING LABEL</a>
                </div>
                <div class="col-sm-4">
                    <a href="<?=$stamps_label_details->return_label_url;?>" target="_blank" class="btn btn-success">PRINT RETURN LABEL</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
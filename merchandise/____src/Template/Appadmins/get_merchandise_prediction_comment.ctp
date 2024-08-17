<ul class="list-unstyled" style="padding-top: 20px;">       
<?php
if(!empty($all_cmts)){
    foreach($all_cmts as $cmt_li){
?>
    <li>
        <?php 
        $type = "";
        if($cmt_li->user->type== 3){
            $type = "Stylist";
        }
        if($cmt_li->user->type== 7){
            $type = "Inventory";
        }
        if($cmt_li->user->type== 8){
            $type = "QA";
        }
        if($cmt_li->user->type== 9){
            $type = "Support Guy";
        }
        ?> 
        <?= $type;?> - 
        <?=$cmt_li->user->name;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<sup><small><?=date('Y-m-d H:i:s',strtotime($cmt_li->created_on));?></small></sup>
        <ul style="padding-left: 30px;">
          <li><?=nl2br($cmt_li->comment);?></li>
        </ul>
        <?php if($cmt_li->user_id == $currentUserId): ?>
    <button type="button" class="btn btn-primary btn-sm" onclick="editComment(<?=$cmt_li->id;?>)">Edit</button>
    <button type="button" class="btn btn-danger btn-sm" onclick="deleteComment(<?=$cmt_li->id;?>)">Delete</button>
<?php endif; ?>

    </li>
<?php
    }
}
?>
</ul>
<script>

</script>




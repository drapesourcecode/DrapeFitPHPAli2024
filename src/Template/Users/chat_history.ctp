<style type="text/css">
    .show{float:left;width:100%;text-align:center}.show-box{height:700px;display:inline-block;width:66%}.show ul{float:left;width:100%;margin:0;padding:0}.show ul li{display:inline-block;width:100%;text-align:center;font-size:14px;color:#868686;border-bottom:1px solid #f1ebeb;padding:14px 0}.show ul li:hover{background:#ececec;box-shadow:0px 3px 9px -5px #000}.show ul li strong{float:left;font-size:14px;color:#000}.show ul li span{float:right;font-size:14px;color:#a5a5a5;font-weight:bold;margin-right:10px}
</style>
<div class="show">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="show-box">
                    <ul>
                        <?php foreach($getChatMessage as $msg){
                           
                            ?>
                        <li><strong><?php echo $msg->user->name;?></strong><?php echo $msg->chat_message;?><span><?php echo date('d, M Y',strtotime($msg->chat_date_time));?></span><span><i class="far fa-clock"></i> <?php echo date('h:i:s a',strtotime($msg->chat_date_time));?></span></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
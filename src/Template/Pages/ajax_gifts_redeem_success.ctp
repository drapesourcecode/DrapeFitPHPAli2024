<div id="stepbox_one">
    <div class="step1-box">
        <h2>Your Redeem code price is  created </h2>
        <label> <b>Redeem code:- </b><?php echo @$pagedata->giftcode; ?></label> <br>
        <label><b>Price:-</b>$<?php echo @$pagedata->price; ?></label><br>
        <label>Your account has credited $<?php echo @$pagedata->price; ?> <br>your total wallet balance is $<?php echo $total; ?></label><br>
        <p><b>Redeem code Message:-</b> <?php echo @$pagedata->msg; ?></p>
        <p><b>Add another code</b> <a href="<?php echo HTTP_ROOT . 'redem_again' ?>">click </a></p>
    </div>


</div>
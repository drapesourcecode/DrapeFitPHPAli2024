<?php
$i = 0;
foreach ($savecard as $card) {
    $i++;
    $masked = str_pad(substr($card->card_number, -4), strlen($card->card_number), 'X', STR_PAD_LEFT);
    //echo $card->card_type;
    if ($card->card_type == 'Visa') {
        $img = 'visa.png';
    } elseif ($card->card_type == 'Mastercard') {
        $img = 'master.png';
    } elseif ($card->card_type == 'Maestro') {
        $img = 'maestro.png';
    } elseif ($card->card_type == 'Discover') {
        $img = 'discover.png';
    } elseif ($card->card_type == 'Amex') {
        $img = 'american.png';
    } elseif ($card->card_type == 'Jcb') {
        $img = 'Jcb.png';
    } elseif ($card->card_type == 'Unionpay') {
        $img = 'Unionpay.png';
    } elseif ($card->card_type == 'Diners') {
        $img = 'Diners.png';
    }
    ?>

    <div class="panel panel-default panel-faq">
        <div class="panel-heading">
            <input  onclick='getChecked("<?php echo $i; ?>")' id="test<?php echo $i; ?>" type="radio" name="card-details" value="<?php echo $card->id; ?>">
            <a for="test<?php echo $i; ?>">
                <div class="card">
                    <ul>

                        <li></li>
                        <li><img src="<?php echo HTTP_ROOT . 'images/' . $img ?>"></li>
                        <li><h6><?php echo $card->card_name; ?> <span> ending in <?php echo $masked; ?></span></h6></li>
                        <li><p><span>Name</span><?php echo $card->card_name; ?></p></li>
                        <li><p><span>Expires date</span><?php echo $card->card_expire; ?></p></li>
                    </ul>
                </div>
            </a>
        </div>
        <div id="faq-cat-1-sub-<?php echo $i; ?>" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="card-cvv">
                    <ul>
                        <li>
                            <div class="card-cvv-drop-left">
                                <label>Name on card</label>
                                <p><?php echo $card->card_name; ?> </p>
                            </div>
                            <div class="card-cvv-drop-right">
                                <div>
                                    <label>Billing Address</label>
                                    <p><strong><?php echo @$billingddress->full_name; ?></strong></p>
                                    <p><?php echo @$billingddress->address; ?></p>
                                    <p><?php echo @$billingddress->address_line_2; ?></p>
                                    <p><?php echo @$billingddress->city; ?></p>                             
                                    <p><?php echo @$billingddress->state; ?></p>                             
                                    <p><?php echo @$billingddress->zipcode; ?></p>                             
                                    <p><?php echo @$billingddress->country; ?></p>                             
                                    <p><?php echo @$billingddress->phone; ?></p>                             
                                </div>
                            </div>
                            <div id="msgBodyPayment-<?php echo $card->id; ?>" style="display: none;">
                                <p><img width="36" src="<?php echo HTTP_ROOT . 'images/' . $img ?>"/><strong><?php echo $card->card_name; ?> <span> ending in <?php echo $masked; ?></strong></p>
                                <p>If you do not want to this payment method to be displayed in your list of payment options,click "Confirm remove". (Disabling this payment method will not to cancelany of your open orders that use this method.)</p>

                            </div>
                        </li>
                        <li> 
                            <div class="card-cvv-drop-last">
    <!--                                <a onclick="getDeletePayment('<?php echo @$card->id; ?>')" href="javascript:void(0)">Remove</a>
                                <a href="javascript:void(0)" onclick="getPaymentEdit('<?php echo @$card->id; ?>')">Edit</a>-->
                            </div>                                               
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php }
?>

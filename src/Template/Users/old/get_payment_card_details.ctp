<?php
$i = 0;
foreach ($savecard as $card) {
    $i++;
    $masked = str_pad(substr($card->card_number, -4), strlen($card->card_number), ' ', STR_PAD_LEFT);
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
    <style>
        .panel-heading {
            position: relative;
        }
        .panel-heading input[type="radio"] {
            position: absolute;
            top: 14px;
            left: 10px;
        }
    </style>

    <div class="panel panel-default panel-faq">
        <div class="panel-heading">
            <input  onclick='getChecked("<?php echo $i; ?>")' id="test<?php echo $i; ?>" type="radio" name="card_details" value="<?php echo $card->id; ?>" <?php if($card->use_card==1){?> checked="checked" <?php } ?>>
            <a for="test<?php echo $i; ?>">
                <div class="card">
                    <ul>

                        <li></li>
                        <li><img src="<?php echo HTTP_ROOT . 'images/' . $img ?>"></li>
                        <li><h6><span> ending in <?php echo $masked; ?></span></h6></li>
                        <li><p><span>Name</span><?php echo $card->card_name; ?></p></li>
                        <li><p><span>Expires date</span><?php echo $card->card_expire; ?></p></li>
                    </ul>
                </div>
            </a>
        </div>

    </div>

<?php }
?>

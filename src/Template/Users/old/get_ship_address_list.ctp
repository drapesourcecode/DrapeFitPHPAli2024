<?php
$i = 0;
foreach ($billingAddress as $addres) {
    $i++;
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
            <input  onclick='getChecked("<?php echo $i; ?>")' id="test<?php echo $i; ?>" type="radio" name="default_set" value="<?php echo $addres->id; ?>" <?php if ($addres->default_set == 1) { ?> checked="checked" <?php } ?>>
            <a for="test<?php echo $i; ?>">
                <div class="shipping-address-details">
                    <ul> 
                        <li><h6><?php echo @$addres->full_name; ?></h6></li>
                        <li><?php echo @$addres->address;?></li>
                        <li><?php echo @$addres->address_line_2;?></li>
                        <li><?php echo @$addres->zipcode; ?></li>
                        <li><?php echo @$addres->city; ?></li>
                        <li><?php echo @$addres->state; ?></li>
                        <li><?php echo @$addres->country; ?></li>
                        <li><?php echo @$addres->phone; ?></li>
                    </ul>
                </div>
            </a>
        </div>

    </div>

<?php }
?>

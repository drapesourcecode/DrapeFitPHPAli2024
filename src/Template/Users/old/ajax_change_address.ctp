<?php foreach ($shippingAddress as $shippingAddres) { ?>
<input type="radio" name="usethis" value="<?php echo $shippingAddres->id; ?>" <?php if($shippingAddres->default_set==1){?> checked="checked" <?php } ?>>
    <label> <?php echo $shippingAddres->full_name; ?> 
        <?php echo $shippingAddres->address; ?> 
        <?php echo $shippingAddres->address_line_2; ?> 
        <?php echo $shippingAddres->city; ?> 
        <?php echo $shippingAddres->state; ?> 
        <?php echo $shippingAddres->zipcode; ?> 
        <?php echo $shippingAddres->phone; ?>
        <?php echo $shippingAddres->country; ?> 
    </label>
<br>
<?php } ?>
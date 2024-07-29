<script>
    $('#shipping_address_id').val(<?= !empty($address)?@$address->id:'';?>);
</script>
<?php
$sales_tx_required = "NO";
$sales_tx = 0;
foreach ($all_sales_tax as $sl_tx) {
    if (($address->zipcode >= $sl_tx->zip_min) && ($address->zipcode <= $sl_tx->zip_max)) {
        $sales_tx_required = "YES";     
        $sales_tx = $sl_tx->tax_rate/100;
    }
}
echo "<script>$('#sales_tax_required').val('".$sales_tx_required."');$('#avg_sales_tax').val('".$sales_tx."');</script>";
?>
<p><?php echo @$address->full_name; ?> <?php echo @$address->address; ?> <?php echo @$address->address_line_2; ?> <?php echo @$address->zipcode; ?> </p>
<p><?php echo @$address->city; ?></p>
<p><?php echo @$address->state; ?></p>
<p><?php echo @$address->country; ?></p>
<p> <?php echo 'Phone' .@$address->phone; ?></p>


<?php
@$masked = str_pad(substr(@$useCard->card_number, -4), strlen(@$useCard->card_number), ' ', STR_PAD_LEFT);
?>
<h6>ending in <?php echo @$masked; ?></h6>	

<script>
    $('#crd_idd').val('<?= $useCard->id; ?>');
</script>
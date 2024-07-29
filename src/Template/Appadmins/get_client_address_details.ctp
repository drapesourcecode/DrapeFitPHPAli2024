<?php
if ($addressData->count() > 0) {
    ?>
    <ul class="list-group">
        <li class="list-group-item">
            Address Details
        </li>
        <?php
        foreach ($addressData as $adr_ky => $adr_li) {
            ?>
            <li class="list-group-item">
                <input type="radio" id="crd_radio<?= $adr_ky; ?>" name="address_id" value="<?= $adr_li->id; ?>">
                <label for="crd_radio<?= $adr_ky; ?>">
                    Name: <?= $adr_li->full_name; ?><br>
                    Address: <?= $adr_li->address; ?><br>
                    <?= $adr_li->address_line_2; ?><br>
                    <?= $adr_li->city; ?>,<?= $adr_li->state; ?>, <?= $adr_li->zipcode; ?>
                </label>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>

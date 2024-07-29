<?php
if ($cardsData->count() > 0) {
    ?>
    <ul class="list-group">
        <li class="list-group-item">
            Card Details
        </li>
        <?php
        foreach ($cardsData as $crd_ky => $crd_li) {
            ?>
            <li class="list-group-item">
                <input type="radio" id="crd_radio<?= $crd_ky; ?>" name="card_id" value="<?= $crd_li->id; ?>">
                <label for="crd_radio<?= $crd_ky; ?>"><?= $crd_li->card_number; ?> <br> Card expire : <?= $crd_li->card_expire; ?></label>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>

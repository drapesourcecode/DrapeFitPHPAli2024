<ul class="list-group">
    <li class="list-group-item">Name: <?= $userData->usr_dtl->first_name; ?> <?= $userData->usr_dtl->last_name; ?></li>
    <li class="list-group-item">Email: <?= $userData->email; ?></li>
    <?php if (!empty($userData->kid_detail)) { ?>
        <li class="list-group-item"><b>Kids</b></li>
        <li class="list-group-item">Name: <?= $userData->kid_detail->kids_first_name; ?></li>
    <?php } ?>
</ul>
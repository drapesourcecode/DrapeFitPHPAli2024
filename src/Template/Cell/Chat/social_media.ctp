<ul>
    <?php foreach($getSocialMedia as $media){?>
    <li><a href="<?php echo $media->link; ?>"><?php echo $media->vector; ?></a></li>
    <?php } ?>
</ul>
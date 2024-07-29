
<script>
    const d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = "influenser_token=<?php echo $key; ?>;" + expires + ";path=/";
    window.location.href='<?=HTTP_ROOT;?>influencer/SUCCESS';
</script>
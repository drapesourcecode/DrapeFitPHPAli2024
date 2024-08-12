
<script>
$(document).ready(function () {
 $('#s').delay(3000).fadeOut('slow');
 $('#e').delay(3000).fadeOut('slow');
});
</script>
<div class="alert alert-danger" id="e" onclick="this.classList.add('hidden');" style="display: block;position: fixed;z-index: 9999999 !important;right: 0;border-radius: 0px;top: 0;border: none;"><?= h($message) ?></div>
<!--message error-->
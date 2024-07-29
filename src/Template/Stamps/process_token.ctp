

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<?= $this->Flash->render() ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form_main">
                    <h4 class="heading"><strong>Details For </strong> Stamp Label generation<span> </span></h4>
                    <div class="form">
                        <?= $this->Form->create('', ['id' => "contactFrm", 'type' => 'post']); ?>

                        <input type="hidden" required="" value="<?= $stamp_access_token; ?>" name="stamp_access_token">

                        <input type="text" required="" name="order_id" class="txt" value="<?php echo ' #DFPYMID' . $stamp_order_id; ?>" readonly>
                        <?php /* ?>
                          <select class="form-control select2" required onchange="getUserDetails(this.value)">
                          <option value="" selected disabled>--Select order id--</option>
                          <?php foreach ($all_paid_list as $pages) { ?>
                          <option value="<?php echo $pages->id; ?>"><?php echo ' #DFPYMID' . $pages->id; ?></option>
                          <?php } ?>
                          </select>
                          <?php */ ?>
                        <div id="user_details"></div>
                        <?= $this->Form->end(); ?>
                    </div>
                </div>
            </div
        </div>
    </div>
</div>
</div>
<script>
    $('.select2').select2();
    $(document).ready(function () {
        getUserDetails(<?= $stamp_order_id; ?>);
    })

    function getUserDetails(order_id) {
        $('#user_details').html('');
        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>stamps/get_user_details", // PAGE WHERE WE WILL PASS THE DATA /
            data: {order_id: order_id}, // THE DATA WE WILL BE PASSING /
            dataType: 'html',
            success: function (result) {
                $('#user_details').html(result);
            }
        });
    }
</script>
<style>
    .select2-container .select2-selection--single{
        height:34px !important;
    }
    .select2-container--default .select2-selection--single{
        border: 1px solid #ccc !important;
        border-radius: 0px !important;
    }
    form_main {
        width: 100%;
    }
    .form_main h4 {
        font-family: roboto;
        font-size: 20px;
        font-weight: 300;
        margin-bottom: 15px;
        margin-top: 20px;
        text-transform: uppercase;
    }
    .heading {
        border-bottom: 1px solid #fcab0e;
        padding-bottom: 9px;
        position: relative;
    }
    .heading span {
        background: #9e6600 none repeat scroll 0 0;
        bottom: -2px;
        height: 3px;
        left: 0;
        position: absolute;
        width: 75px;
    }
    .form {
        border-radius: 7px;
        padding: 6px;
    }
    .txt[type="text"] {
        border: 1px solid #ccc;
        margin: 10px 0;
        padding: 10px 0 10px 5px;
        width: 100%;
    }
    .txt_3[type="text"] {
        margin: 10px 0 0;
        padding: 10px 0 10px 5px;
        width: 100%;
    }
    .txt2[type="submit"] {
        background: #242424 none repeat scroll 0 0;
        border: 1px solid #4f5c04;
        border-radius: 25px;
        color: #fff;
        font-size: 16px;
        font-style: normal;
        line-height: 35px;
        margin: 10px 0;
        padding: 0;
        text-transform: uppercase;
        width: 30%;
    }
    .txt2:hover {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        color: #5793ef;
        transition: all 0.5s ease 0s;
    }

</style>

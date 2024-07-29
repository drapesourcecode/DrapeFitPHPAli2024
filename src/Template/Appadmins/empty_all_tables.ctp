<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            echo "Empty all tbales";
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="modal-body">
                        <div class="box-body">
                            <p style="color: red;">All (*) fields tables are should be not delete </p>
                            <?php
                            foreach ($tables as $tl) {
                                //echo $tl;
                               // echo "<br>";
                                if (($tl != 'in_products') && ($tl != 'in_users' )) {
                                    ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputFile"><?php echo $tl; ?> <span class="badge"><?php echo $this->Custom->rowCount($tl); ?></span>
                                                <?php if (($tl == 'settings') || ($tl == 'chat_category_images') || ($tl == 'users') || ($tl == 'pages') || ($tl == 'social_media')) { ?>
                                                    <span style="color: red;">*</span>
                                                <?php } ?>

                                            </label> 
                                        </div>
                                    </div>
                                <?php }
                            }
                            ?>
                        </div>
                    </div>


                    <div class="box-footer">

                        <?php
                        echo $this->Form->button('Empty all table', ['class' => 'btn btn-primary', 'onclick' => 'getDeleteall()', 'style' => 'float:left;margin-left:15px;']);
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function getDeleteall() {
        var agree = confirm('Are you sure want to delete all tables');
        if (agree) {
            var url = '<?php echo HTTP_ROOT ?>'
            $.ajax({
                type: 'POST',
                url: url + 'appadmins/ajax_dlt_tbl/',
                success: function (response) {
                    window.location.href = response.url
                },
                dataType: 'JSON'
            });
        }
    }
</script>
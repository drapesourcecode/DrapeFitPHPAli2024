
<script>
    $("#documentID" ).focus();
    $('#documentID').val('');
    
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Product Test  & scan product</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_users' ?>"> Back</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              
                    <div id="error_msg_date" class="help-block with-errors"></div>
                    <div id="manage_banner" class="box box-default"  style="">
                        <div class="box-header  with-border1">
                            <h3 class="box-title">
                                <?php
                                echo "Scan Product";
                                ?>
                            <span id='customerId'></span></span></h3>
                            <span id='kid_id_name'></span></span></h3>


                        </div><!-- /.box-header -->
                        <section class="content" style="min-height: 71vh;text-align: center;">
                            <div class="row">
                                <!-- left column -->
                                <?= $this->Form->create('addproduct', array('id' => 'idForm')); ?>
                                <div class="col-md-12" style="margin-top: 27px;">
                                    <div class="form-group">

                                        <label for="exampleInputName"> Product scan <span style="color: red;">*</span></label>
                                        <input style="height: 50px; width: 400px;font-weight: bold;" id="documentID"  type="text"  name="productValue" autocomplete="off"  onmouseover="this.focus();">

                                    </div>
                                </div>
                                <?= $this->Form->end() ?>

                                <div class="col-xs-12" id="formDiv">

                                </div>
                            </div>
                        </section>
                        <!--!-- /.box-body -->

                    </div>



              
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->


</div>
<script>
  
<?php if(isset($productCode) && $productId) {?>
$(function(){
  
    var getProductcode ='<?php echo $productCode;?>'
  $.ajax({
            type: "POST",
            url: "<?php echo HTTP_ROOT . 'appadmins/get_products_detils/' ?>",
            data: {productValue: getProductcode},
            dataType: "html",
            success: function (data) {
                if (data) {
                    $('#formDiv').html(data);
                    $("input:text:visible:first").focus();
                    $('#documentID').val('');
                }
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });

});

<?php } ?>




    $("form#idForm").on("submit", function (event) {
        event.preventDefault();
        //console.log($(this).serialize());
        var getProductcode = $('#documentID').val();
        var loaderData = "<span><img src='<?php echo HTTP_ROOT . 'images/payment-loader.gif' ?>'/></span>";
        $('#formDiv').html(loaderData);
        $.ajax({
            type: "POST",
            url: "<?php echo HTTP_ROOT . 'appadmins/get_products_detils/' ?>",
            data: {productValue: getProductcode},
            dataType: "html",
            success: function (data) {
                if (data) {
                    $('#formDiv').html(data);
                    $("input:text:visible:first").focus();
                    $('#documentID').val('');
                }
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });

    });

</script>
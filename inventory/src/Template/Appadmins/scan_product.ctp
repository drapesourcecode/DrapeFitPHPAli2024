
<script>
    $("#documentID" ).focus();
    $('#documentID').val('');
    
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Product return process queue</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            

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
                                //echo "Scan Product";
                                ?>
                            <span id='customerId'></span></span></h3>
                            <span id='kid_id_name'></span></span></h3>


                        </div><!-- /.box-header -->
                        <section class="content" style="min-height: 71vh;text-align: center;">
                            <div class="row">
                                <!-- left column -->
                                <?php if ($type == 1) {  ?>
                                <?= $this->Form->create('addproduct', array('id' => 'idForm')); ?>
                                <div class="col-md-12" style="margin-top: 27px;">
                                    <div class="form-group">

                                        <label for="exampleInputName"> Product scan <span style="color: red;">*</span></label>
                                        <input style="height: 50px; width: 400px;font-weight: bold;" id="documentID"  type="text"  name="productValue" autocomplete="off"  onmouseover="this.focus();">

                                    </div>
                                </div>
                                <?= $this->Form->end() ?>
                                <?php }else{   ?>
                                 <div class="col-sm-12" id="example1_table">
                              <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <th style="display:none;">#</th>




                                        <th style="width:50px;">Full Name</th>
                                        <th>Rq Date</th>
                                        <th>Gender</th>
                                        
                                        <th>Kid Name </th>
                                        <th>Fit number</th>
                                        <th>Order date</th>
                                        <th>Order<br>number</th>
                                      

                                        <th>Action </th>
                                    </thead>
                                    
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($userdetails as $li_key => $pages):
                                    // pj($pages);
                                    ?>
                                    <?php
                                   
                                    $emailpstatus = $this->Custom->emailperference($pages->user_id, $pages->kid_id);
                                    ?>

                                    <tr>
                                        <td style="display:none;"><?= $li_key/* h($pages->created_dt) */ ?></td>
                                       



                                            <td style="width:50px;"><?= h(@$pages->user->user_detail->first_name) ?><br><?= h(@$pages->user->user_detail->last_name) ?>&nbsp; <?= (@$pages->user->is_influencer == 1) ? '[Influencer]' : ""; ?></td>
                                            <td><?php echo $this->Custom->requestDate($pages->delivery_id) ?></td>
                                            <td><?php
                                    //          echo $pages->user_id;
                                    // echo "-".$pages->kid_id;
                                    // echo "-".$pages->id;
                                                if (@$pages->profile_type == 1) {
                                                    echo "Men";
                                                } elseif (@$pages->profile_type == 2) {
                                                    echo "Women";
                                                } else {
                                                    echo "kid";
                                                }
                                                ?> </td>
                                                <td> <?php
                                                if ($pages->profile_type == 3) {
                                                    echo $this->Custom->kidName($pages->kid_id);
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($pages->count == 1) {
                                                    $ptype = 'st';
                                                } elseif ($pages->count == 2) {
                                                    $ptype = 'nd';
                                                } elseif ($pages->count == 3) {
                                                    $ptype = 'rd';
                                                } else {
                                                    $ptype = 'th';
                                                }
                                                echo $pages->count . $ptype;
                                                ?></td>

                                            <td><?php echo @$pages->created_dt; ?> </td>
                                            <td><?php echo ' #DFPYMID' . $pages->id; ?> </td>
                                           


                                            
                                            
                                            <td style="width: 92px;">
                                                <a class="btn btn-info" href="<?=HTTP_ROOT;?>appadmins/scanProduct/<?=$pages->prd[0]['id'];?>">Proceed return </a>
                                            </td>


                                       
                                    </tr>

                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                                <!---->
                            </tbody>
                                </table>
                            </div>
                                <?php } ?>

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
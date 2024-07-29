<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    function getChanges(value) {
        if (value) {
            var url = '<?php echo HTTP_ROOT ?>';
            window.location.href = url + "appadmins/add_product/" + value;
        }
    }
</script>
<style>
    .btn.active, .btn:active {
        background: #db8031 !important;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Product</h1>        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <?= $this->Form->create('', array('id' => 'profile_data', 'data-toggle' => "validator", 'type' => 'file')) ?>
                        <?= $this->Form->input('id', ['value' => @$id, 'type' => 'hidden', 'label' => false]); ?>
                        <div class="nav-tabs-custom">

                            <div class="tab-content" style="width: 100%;float: left;">
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Name</label>
                                            <?= $this->Form->input('product_name', ['value' => @$editproduct->product_name, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter product name 1']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category</label>
                                            <select name="category" class="form-control" onchange="showDeduct(this.value)">
                                                <?php foreach ($fixed_category as $kc => $pdetails): ?>
                                                    <option <?= (!empty($editproduct) && ($kc == $editproduct->category)) ? ' selected ' : ''; ?> value="<?= $kc; ?>"><?php echo $pdetails; ?></option>  
                                                <?php endforeach; ?>
                                                <?php foreach ($all_category as $pdetails): ?>
                                                    <option <?= (!empty($editproduct) && ($pdetails->id == $editproduct->category)) ? ' selected ' : ''; ?> value="<?= $pdetails->id; ?>"><?php echo $pdetails->name; ?></option>                                                  <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>                                        

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Image </label>
                                            <div class="form-group">
                                                <?= $this->Form->input('product_image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on"]); ?>                                        
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div id="imagePreview">
                                                <?php if (@$editproduct->product_photo) { ?>

                                                    <img src="<?php echo HTTP_ROOT; ?><?php echo @$editproduct->product_photo; ?>" style="width: 200px;"/>      

                                                <?php } ?>  
                                            </div>                          
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product description </label>
                                            <?= $this->Form->input('description', ['value' => @$editproduct->description, 'type' => 'textarea', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter description']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Quantity</label>
                                            <?= $this->Form->input('quantity', ['value' => @$editproduct->quantity, 'type' => 'number', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity']); ?>              
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product price</label>
                                            <?= $this->Form->input('price', ['value' => @$editproduct->price, 'type' => 'number', 'step' => '0.01', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter your weight']); ?>              
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Supplier name</label>
                                            <?= $this->Form->input('supplier_name', ['value' => @$editproduct->supplier_name, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter Supplier name']); ?>              
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Supplier address</label>
                                            <?= $this->Form->input('supplier_address', ['value' => @$editproduct->supplier_address, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter Supplier address']); ?>              
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Supplier email</label>
                                            <?= $this->Form->input('supplier_email', ['value' => @$editproduct->supplier_email, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter Supplier email']); ?>              
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Supplier phone</label>
                                            <?= $this->Form->input('supplier_phone', ['value' => @$editproduct->supplier_phone, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter Supplier phone']); ?>              
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="dynamic_deduct">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Dynamic deduct</label>
                                            <?= $this->Form->input('dynamic_deduct', ['value' => @$editproduct->dynamic_deduct, 'type' => 'number', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter deduct quantity']); ?>              
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="dynamic_deduct">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Notify limit</label>
                                            <?= $this->Form->input('notify_limit', ['value' => @$editproduct->notify_limit, 'type' => 'number', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter quantity for notification']); ?>              
                                        </div>
                                    </div>
                                    <?php if (!empty(@$editproduct)) { ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Current in stock</label>
                                                <?= $this->Form->input('current_stock', ['value' => @$editproduct->current_stock, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter Current in stock']); ?>              
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                                    </div>
                                </div>
                            </div>                        

                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.no</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Notify Limit</th>
                                    <th>Quantity</th>
                                    <th>Used</th>
                                    <th>In stock</th>
                                    <th>Deduct</th>
                                    <th>Supplier name</th>
                                    <th>Supplier email</th>
                                    <th>Supplier Phone</th>                                   
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_data as $ky => $pdetails): ?>

                                    <tr>
                                        <td><?php echo $ky + 1; ?></td>
                                        <td><?php echo $pdetails->product_name; ?></td>
                                        <td>
                                            <?php if (!empty($pdetails->product_photo)) { ?>
                                                <img src="<?php echo HTTP_ROOT . $pdetails->product_photo; ?>" style="width: 80px;"/>
                                            <?php } ?>                                            
                                        </td>

                                        <td><?php echo $pdetails->price; ?></td>
                                        <td><?php echo $pdetails->notify_limit; ?></td>
                                        <td><?php echo $pdetails->quantity; ?></td>
                                        <td><?php echo $pdetails->used; ?></td>
                                        <td><?php echo $pdetails->current_stock; ?></td>
                                        <td><?php echo $pdetails->dynamic_deduct; ?></td>
                                        <td><?php echo $pdetails->supplier_name; ?></td>
                                        <td><?php echo $pdetails->supplier_email; ?></td>
                                        <td><?php echo $pdetails->supplier_phone; ?></td>

                                        <td style="text-align: center;">

                                            <a href="javascript:void(0);" data-placement="top" data-hint="Add Stock" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;" onclick="addStock(<?= $pdetails->id; ?>)"><i class="fa fa-plus "></i></a>
                                            <a href="javascript:void(0);" data-placement="top" data-hint="Add Stock" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;" onclick="minusStock(<?= $pdetails->id; ?>)"><i class="fa fa-minus "></i></a>

                                            <a href="<?= HTTP_ROOT . "appadmins/product/edit/" . $pdetails->id; ?>" data-placement="top" data-hint="Edit" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit "></i></a>
                                            <a href="<?= HTTP_ROOT . "appadmins/product/delete/" . $pdetails->id; ?>" data-placement="top" data-hint="Delete Product" class="btn btn-danger  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-trash "></i></a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add More Stocks</h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create('', ['type' => 'post', 'url' => ['action' => 'updateStock']]); ?>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="myStock_id" name="stock_id">
                        <input type="number" id="stock_quantity" class="form-control" name="stock_quantity" min required>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>            
        </div>
    </div>
</div>

<div class="modal fade" id="deduct_stockModal" tabindex="-1" role="dialog" aria-labelledby="deduct_stockModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deduct_myModalLabel">Deduct Stock Manually</h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create('', ['type' => 'post', 'url' => ['action' => 'deductStock']]); ?>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="deduct_myStock_id" name="stock_id">
                        <input type="number" id="deduct_stock_quantity" class="form-control" name="stock_quantity" min required>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
    function showDeduct(id){
        if(id<=11){
           $('#dynamic_deduct').show();
        }else{
           $('#dynamic_deduct').hide();
        }
    }
    $(function () {
        $(".example").DataTable();
    });

    function myFunction() {
        window.print();
    }

    function addStock(id) {
        $('#myStock_id').val(id);
        $('#stockModal').modal('show');
    }
    function minusStock(id) {
        $('#deduct_myStock_id').val(id);
        $('#deduct_stockModal').modal('show');
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var sizeKB = input.files[0].size / 1000;
            //alert(sizeKB);
            /*if (parseFloat(sizeKB) <= 21) {*/
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = $('<img />', {
                    src: e.target.result,
                    alt: 'MyAlt',
                    width: '200'
                });
                $('#imagePreview').html(img);

            }
            reader.readAsDataURL(input.files[0]);
            /*} else {
             //alert("Image size");
             $("#image").val('');
             $('#imagePreview').html('');
             }*/
        }
    }

    $("#image").change(function () {
        readURL(this);

    });



    $(document).ready(function () {
        $('.select2_select').select2();
    });
</script>

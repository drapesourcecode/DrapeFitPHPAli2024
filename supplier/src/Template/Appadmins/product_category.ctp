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
        <h1>Add Product category</h1>        
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
                                            <label for="exampleInputPassword1">Name</label>
                                            <?= $this->Form->input('name', ['value' => @$editproduct->name, 'type' => 'text', 'class' => "form-control", 'label' => false, 'placeholder' => 'Please enter name']); ?>
                                        </div>
                                    </div>

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
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ky=1;
                                foreach ($fixed_category as $pdetails): ?>

                                    <tr>
                                        <td><?php echo $ky++; ?></td>
                                        <td><?php echo $pdetails; ?></td>  
                                        <td style="text-align: center;">
                                           
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                                <?php foreach ($all_data as  $pdetails): ?>

                                    <tr>
                                        <td><?php echo $ky++; ?></td>
                                        <td><?php echo $pdetails->name; ?></td>  
                                        <td style="text-align: center;">
                                            <a href="<?= HTTP_ROOT . "appadmins/product_category/edit/" . $pdetails->id; ?>" data-placement="top" data-hint="Edit" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit "></i></a>
                                            <a href="<?= HTTP_ROOT . "appadmins/product_category/delete/" . $pdetails->id; ?>" data-placement="top" data-hint="Print barcode" class="btn btn-danger  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-trash "></i></a>
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

<script>
    function myFunction() {
        window.print();
    }
</script>

<script>
    $(function () {
        $(".example").DataTable();
    });
</script>
<script type="text/javascript">
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

<style>
    .women-select2{
        width: 47.6%;
        display: inline-block;
    }
    .women-select1 {
        width: 21.9%;
        display: inline-block;
    }
    .women-select1 label {
        display: inline-block;
        width: auto;
        float: right;
        font-size: 18px;
        font-weight: normal;
        padding: 5px 0px;
        font-family: "Amazon Ember", Arial, sans-serif;
        margin: 0;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #000 !important;
    }
    .select2-selection__choice__remove span {
        color: #ce2f2f !important;
    }
    .type-box ul li {
        display: inline-block;
        width: 17%;
        margin: 10px 11px;
        margin-bottom: 10px;
        margin-left: 11px;
        vertical-align: top;
    }
    .type-box ul {
        float: left;
        width: 100%;
        margin: 10px 0 15px 0;
        padding: 0;
        padding-top: 0px;
        text-align: left;
    }
    .type-box ul li label {
        position: relative;
        border: 1px solid #e0e0e0;
        padding: 2px;
        cursor: pointer;
    }
    .type-box ul li label img {
        width: 100%;
    }

    .type-box .radio-box {
        opacity: 0;
        position: absolute;
    }
    .type-box ul li input[type="radio"]:checked + label, .type-box ul li input[type="checkbox"]:checked + label {
        border: 1px solid #ef6a04;
        background: none;
    }
    .note-label ul {
        float: left;
        width: 100%;
        padding: 0;
        padding-top: 0px;
        margin: 0;
    }
    .note-label ul li {
        display: inline-block;
        width: auto;
        margin: 7px 5px;
    }

    .skin ul{
        float: left;
        width: 100%;
        margin: 0;
        padding: 0;
    }
    .skin ul li{
        display: inline-block;
        vertical-align: top;
        margin-right: 22px;
    }
    .skin ul li label{
        width: 50px;
        height: 50px;
        background: #e6e6e6;
        border-radius: 100%;
        display: inline-block;
        cursor: pointer;
        border:4px solid #fff;
    }
    .skin ul li input{
        display: none;
    }
    .skin ul li:first-child label{
        background: #fdc8b9;
    }
    .skin ul li:nth-child(2) label{
        background: #f0b4a2;
    }
    .skin ul li:nth-child(3) label{
        background: #d0967e;
    }
    .skin ul li:nth-child(4) label{
        background: #c57456;
    }
    .skin ul li:nth-child(5) label{
        background: #78412a;
    }
    .skin ul li:last-child label{
        text-align: center;
        font-weight: bold;
        position: relative;
    }

    .skin ul li:last-child label span {
        display: inline-block;
        position: absolute;
        height: 100%;
        width: 100%;
        padding: 13px 0;
        left: 0;
        top: 0;
        font-size: 12px;
    }
    .skin ul li input[type="checkbox"]:checked+label{
        border:4px solid #ff6c00;
    }
</style>
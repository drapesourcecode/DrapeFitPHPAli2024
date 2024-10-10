<div class="content-wrapper">
    <section class="content-header">
        <h1> Po Edit</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Po Edit </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">


            <div class="col-xs-12">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $this->Form->create('', array('id' => 'search_frm', 'type' => 'POST', "autocomplete" => "off")); ?>
                            <div class="form-group">
                                <div class="row">                                 
                                 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Purchase price ? <sup style="color:red;">*</sup></label>
                                            <input name='purchase_price' value='<?= (!empty($get_product_details) && !empty($get_product_details->purchase_price))?$get_product_details->purchase_price:"0"; ?>' type='text' class="form-control" placeholder='Please enter purchase price' required>
                                            <input name='prod_id' value='<?= $get_product_details->prod_id; ?>' type='hidden' >
                                            <input name='brand_id' value='<?= $brand_id; ?>' type='hidden' >

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">sale_price ? <sup style="color:red;">*</sup></label>
                                            <input name='sale_price' value='<?= (!empty($get_product_details) && !empty($get_product_details->sale_price))?$get_product_details->sale_price:"0"; ?>' type='text' class="form-control" placeholder='Please enter sale price' required>

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Clearance price</label>
                                            <input name='clearance_price' value='<?= (!empty($get_product_details) && !empty($get_product_details->clearance_price))?$get_product_details->clearance_price:"0"; ?>' type='text' class="form-control" placeholder='Please enter sale price'>

                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-sm-10">
        <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<style>
    .ellipsis {
        float: left;
    }

    #example1_paginate {
        display: none;
    }
</style>
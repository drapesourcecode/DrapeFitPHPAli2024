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
                                            <label style="width: 100%;">Size </label>
                                            <select name="size"   class="form-control" required>
                                                <option value="" selected disabled>----</option>
                                                <?php foreach ($all_sizes as $sz) { ?>
                                                    <option value="<?= $sz->size; ?>" <?= (!empty($edit_data) && ($edit_data->size == $sz->size))?"selected":""; ?> ><?= $sz->size; ?></option>
                                                <?php } ?> 
                                            </select>
                                            <label for="exampleInputPassword1">Height range <sup style="color:red;">*</sup></label>
                                            <div class="women-select-boxes">
                                                <div class="women-select1">
                                                    <select name="tall_feet1" id="tall_feet" class="form-control" required>
                                                        <option value="" disabled>--</option>
                                                        <?php foreach(range(1,6) as $hgt){ ?>
                                                        <option value="<?=$hgt;?>" <?= (!empty($edit_data) && ($edit_data->tall_feet1 == $hgt))?"selected":""; ?>><?=$hgt;?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label>ft.</label>
                                                </div>
                                                <div class="women-select1">
                                                    <select name="tall_inch1" id="tall_inch" class="form-control">
                                                        <option value="" disabled>--</option>
                                                        <?php foreach(range(0,11) as $inch){ ?>
                                                        <option value="<?=$inch;?>" <?= (!empty($edit_data) && ($edit_data->tall_inch1 == $inch))?"selected":""; ?>><?=$inch;?></option>
                                                        <?php } ?>
                                                    </select>


                                                </div>
                                                <span>to</span>
                                                <div class="women-select1">

                                                    <select name="tall_feet2" id="tall_feet2" class="form-control" required>
                                                        <option value="" disabled>--</option>
                                                        <?php foreach(range(1,6) as $hgt){ ?>
                                                        <option value="<?=$hgt;?>" <?= (!empty($edit_data) && ($edit_data->tall_feet2 == $hgt))?"selected":""; ?> ><?=$hgt;?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label>ft.</label>
                                                </div>
                                                <div class="women-select1">
                                                    <select name="tall_inch2" id="tall_inch2" class="form-control">
                                                        <option value="" disabled>--</option>
                                                        <?php foreach(range(0,11) as $inch){ ?>
                                                        <option value="<?=$inch;?>" <?= (!empty($edit_data) && ($edit_data->tall_inch2 == $inch))?"selected":""; ?>><?=$inch;?></option>
                                                        <?php } ?>
                                                        
                                                    </select>


                                                </div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Weight range <sup style="color:red;">*</sup></label>
                                            <div class="women-select-boxes">
                                                <div class="women-select2">
                                                    <input name='best_fit_for_weight1' value='<?= (!empty($edit_data) && !empty($edit_data->best_fit_for_weight1))?$edit_data->best_fit_for_weight1:""; ?>' type='text' class="form-control" placeholder='Please enter your weight' required>
                                                </div>
                                                <span>to</span>
                                                <div class="women-select2">
                                                    <input name='best_fit_for_weight2' value='<?= (!empty($edit_data) && !empty($edit_data->best_fit_for_weight2))?$edit_data->best_fit_for_weight2:""; ?>' type='text' class="form-control" placeholder='Please enter your weight' required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Age range <sup style="color:red;">*</sup></label>
                                            <div class="women-select-boxes">
                                                <div class="women-select2">
                                                    <input name='id' value='<?= (!empty($edit_data))?$edit_data->id:""; ?>' type='hidden'>
                                                    <input name='age1' value='<?= (!empty($edit_data) && !empty($edit_data->age1))?$edit_data->age1:""; ?>' type='text' class="form-control" placeholder='Please enter your age' required>
                                                </div>
                                                <span>to</span>
                                                <div class="women-select2">
                                                    <input name='age2' value='<?= (!empty($edit_data) && !empty($edit_data->age1))?$edit_data->age2:""; ?>' type='text' class="form-control" placeholder='Please enter your age' required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Purchase price ? <sup style="color:red;">*</sup></label>
                                            <input name='purchase_price' value='<?= (!empty($edit_data) && !empty($edit_data->purchase_price))?$edit_data->purchase_price:""; ?>' type='text' class="form-control" placeholder='Please enter purchase price' required>

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">sale_price ? <sup style="color:red;">*</sup></label>
                                            <input name='sale_price' value='<?= (!empty($edit_data) && !empty($edit_data->sale_price))?$edit_data->sale_price:""; ?>' type='text' class="form-control" placeholder='Please enter sale price' required>

                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Clearance price</label>
                                            <input name='clearance_price' value='<?= (!empty($edit_data) && !empty($edit_data->clearance_price))?$edit_data->clearance_price:""; ?>' type='text' class="form-control" placeholder='Please enter sale price'>

                                        </div>
                                    </div>
                                    <div class="col-md-12  var_qty">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Quantity ? <sup style="color:red;">*</sup></label>
                                            <input name='po_quantity' value='<?= (!empty($edit_data) && !empty($edit_data->po_quantity))?$edit_data->po_quantity:""; ?>' type='text' class="form-control" placeholder='Please enter quantity'  min="0" steps='1'>

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
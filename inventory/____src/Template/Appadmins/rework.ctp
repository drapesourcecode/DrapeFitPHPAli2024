<div class="content-wrapper">
    <section class="content-header">
        <h1> Rework Products </h1>        
    </section>

    <section class="content" style="min-height: auto !important;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name 1</th>
                                            <th>Product Name 2</th>
                                            <th>Operation type</th>
                                            <th>Style number</th>
                                            <th>Missing fields</th>                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($all_prod_list as $prd_li) {
                                            ?>
                                            <tr id="<?php echo $prd_li->id; ?>" class="message_box">                                                                       <td><img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $prd_li->product_image; ?>" style="width: 50px;"/></td>                
                                                <td><?php echo $prd_li->product_name_one; ?></td>
                                                <td><?php echo $prd_li->product_name_two; ?></td>
                                                <td><?php                                                    
                                                    if (!empty($prd_li->emp_log)) {
                                                        $log_tt = [];
                                                        $prd_empty_fld = '';
                                                        foreach ($prd_li->emp_log as $emp_lo_li) {
                                                            $log_tt[] = $emp_lo_li->action;
                                                            $prd_empty_fld .= $emp_lo_li->rework_flds . ',&nbsp;&nbsp;';
                                                        }
                                                        echo implode(', ', array_unique($log_tt));
                                                    }
                                                    ?></td>
                                                <td><?php echo (empty($prd_li->style_number)) ? $prd_li->dtls : $prd_li->style_number; ?></td>
                                                <td>
                                                    <?php
                                                    $lst_dt = [];
                                                    $lst_dt = explode(',&nbsp;&nbsp;',$prd_empty_fld);
                                                    echo implode(', ',array_filter(array_unique($lst_dt)));
                                                    ?>
                                                </td>


                                            </tr>

                                        <?php } ?>                          


                                    </tbody>
                                </table>
                            </div>
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
        background: #fff;
        padding: 7px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Tasks </h1>        
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
                                            <th>Operation type</th>
                                            <th>Style number</th>
                                            <th>Date</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($all_prod_list as $prd_li) { ?>
                                            <tr id="<?php echo $prd_li->id; ?>" class="message_box">                                                                       <td><img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES; ?><?php echo $prd_li->prd_dtl->product_image; ?>" style="width: 50px;"/></td>                
                                                <td><?php echo $prd_li->prd_dtl->product_name_one; ?></td>
                                                <td><?php echo $prd_li->action; ?></td>
                                                <td><?php echo (empty($prd_li->prd_dtl->style_number)) ? $prd_li->prd_dtl->dtls : $prd_li->prd_dtl->style_number; ?></td>
                                                <td>
                                                    <?php
                                                    echo date('Y-m-d',strtotime($prd_li->created_on));
                                                    /*
                                                    if ($prd_li->status == 1) {
                                                        echo "<p class='text text-success h5'>Approved</p>";
                                                    } elseif ($prd_li->status == 2) {
                                                        echo "<p class='text text-info h5'>Working</p>";
                                                    } elseif ($prd_li->status == 3) {
                                                        echo "<p class='text text-warning h5'>Sent for Review</p>";
                                                    }  elseif ($prd_li->status == 4) {
                                                        echo "<p class='text text-danger h5'>Rework</p>";
                                                    } */
                                                    ?>
                                                </td>

                                            </tr>

                                        <?php } ?>


                                    </tbody>
                                    <?php /*
                                    <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td colspan="6">
                                                <?= $this->Form->create('', ['type' => 'post']); ?>
                                                <input type="hidden" name="current_date" value="<?= date('Y-m-d'); ?>" />
                                                <button type="submit" class="btn btn-success">DONE</button>
                                                <?= $this->Form->end(); ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                     *
                                     */ ?>
                                </table>
                            </div>
                            <div class="col-sm-12">
                                <?php
                                echo $this->Paginator->counter('Page {{page}} of {{pages}}, Showing {{current}} records out of {{count}} total');
                                //                        echo $this->Paginator->counter(
                                //    'Page {{page}} of {{pages}}, showing {{current}} records out of
                                //     {{count}} total, starting on record {{start}}, ending on {{end}}'
                                //);
                                echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;display: inline-block;width: 100%;float: left;'>";
                                echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                                echo $this->Paginator->numbers(array('first' => 3, 'last' => 3, 'separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                                echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                                echo "</div></ul>";
                                ?>
                            </div>
                        </div>

                        <?php
//                        pj($all_prod_list);
//                        exit;
                        ?>
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
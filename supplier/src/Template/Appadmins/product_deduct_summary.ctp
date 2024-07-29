<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .btn.active, .btn:active {
        background: #db8031 !important;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Product Used Summary</h1>        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div>
                            <?= $this->Form->create('', array('id' => 'profile_data', 'type' => "get")) ?>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-2">
                                    <input type="date" name="start_date" required value="<?= !empty($_GET['start_date']) ? $_GET['start_date'] : ''; ?>" >
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="end_date" required value="<?= !empty($_GET['end_date']) ? $_GET['end_date'] : ''; ?>" >
                                </div>
                                <div class="col-md-2">
                                    <?= $this->Form->submit('Search', ['type' => 'submit']); ?>
                                </div>
                            </div>
                        </div>                        

                    </div>
                    <?= $this->Form->end() ?>

                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl.no</th>
                            <th>Product</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_data as $ky => $pdetails):
                            ?>

                            <tr>
                                <td><?php echo $ky + 1; ?></td>
                                <td><?php echo $pdetails->supply_product->product_name; ?></td>
                                <td>
                                    <?php echo $pdetails->sum; ?>
                                    <?php
                                    $small = $large = 0;
                                    if ($pdetails->supply_product->category == 1) {
                                        if (!empty($all_payment_data)) {
                                            foreach ($all_payment_data as $paymt_gt_way) {
                                                if (!empty($paymt_gt_way->box_type) && ($paymt_gt_way->box_type == 'small')) {
                                                    $small += 1;
                                                }
                                                if (!empty($paymt_gt_way->box_type) && ($paymt_gt_way->box_type == 'large')) {
                                                    $large += 1;
                                                }
                                            }
                                        }
                                        ?>
                                        <p>Small : <?= $small; ?></p>
                                        <p>Large : <?= $large; ?></p>
                                        <?php
                                    }
                                    ?>

                                </td>                               
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>




<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .btn.active, .btn:active {
        background: #db8031 !important;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Product used details</h1>        
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
                                    <input type="date" name="start_date" required value="<?=!empty($_GET['start_date'])?$_GET['start_date']:'';?>" >
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="end_date" required value="<?=!empty($_GET['end_date'])?$_GET['end_date']:'';?>" >
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
                            <th>Order id</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_data as $ky => $pdetails): ?>

                            <tr>
                                <td><?php echo $ky + 1; ?></td>
                                <td>
                                    <?php echo $pdetails->supply_product->product_name; ?>
                                    <?php /*if ($pdetails->supply_product->category==1){
                                         echo !empty($pdetails->payment_getway->box_type)?' <b>['.$pdetails->payment_getway->box_type.']</b>':"";
                                    }*/ ?>
                                </td>
                                <td><?php echo $pdetails->quatity; ?></td>
                                <td><?= !empty($pdetails->order_id) ? '#DFPYMID' . $pdetails->order_id : ''; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($pdetails->created_on)); ?></td>

                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>




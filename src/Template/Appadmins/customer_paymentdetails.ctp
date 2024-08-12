<div class="content-wrapper">
    <section class="content-header">
        <h1> Payment details of Client's <?php echo $this->Custom->customerName($userId);?>  </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="<?= h(HTTP_ROOT) ?>appadmins/customer_list">   <i class="fa  fa-user-plus"></i> Customer List </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Payment Amount</th>
                                    <th>Payment transactions No</th>
                                    <th>Payment Date</th>
                                    <th>Payment status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($getpgDetails as $pgdatails): ?>
                                <tr>
                                    <td><?php if($pgdatails->payment_type==1){echo 'Ordering';}else{ echo 'Checkouting'; }?></td>
                                    <td>$ <?php echo number_format($pgdatails->price,'2'); ?></td>
                                    <td><?php echo  $pgdatails->transactions_id; ?></td>
                                     <td><?php echo  $pgdatails->created_dt; ?></td>
                                    <td><?php if($pgdatails->status==1){?>
                                      <span style="color:green;">Paid  </span>
                                      <?php if($pgdatails->refound_status==1){?>
                                       <span style="color:red;">Refunded : date: <?php echo $pgdatails->refound_date;?> </span>
                                      <?php }?>
                                    <?php } else {?>
                                       <span style="color:red;">Not Paid</span>
                                    <?php } ?>
                                     
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



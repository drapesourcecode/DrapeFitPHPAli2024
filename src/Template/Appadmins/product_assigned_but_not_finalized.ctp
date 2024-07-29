<style>
    .btn.btn-info.hint--top.hint .fa.fa-fw.fa-user-plus {
        width: 3.286em !important;
    }
    .hide{
        display: none;
    }
    .active{
        display: block;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= 'Product assigned but not finalized' ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header with-border1">
                        </div>
                        <div class="box-header with-border1">
                            <div class="col-xs-12"> 
                                <div class="row" style="float: left;width: 100%;">
                                    <div class="col-xs-12" style="float: left;text-align: right;width: 100%;margin-bottom: 20px;">
                                        <?= $this->Form->create('', ['type' => 'GET']); ?>
                                        <select  name="g">
                                            <option selected disabled value=''>User Type</option>
                                            <?php
                                            $gnd_arr = ['men','women','boy','girl'];
                                            foreach ($gnd_arr as $gnd_li) {                                               
                                                ?>
                                                <option value=<?= $gnd_li; ?> <?= ($gnd_li == $gender) ? 'selected' : ''; ?>><?= ucfirst($gnd_li); ?></option>
                                            <?php } ?>
                                        </select>
                                        <select  name="m">
                                            <option selected disabled value=''>Month</option>
                                            <?php
                                            for ($i = 0; $i < 12; $i++) {
                                                $time = strtotime(sprintf('%d months', $i));
                                                $label = date('F', $time);
                                                $value = date('m', $time);
                                                ?>
                                                <option value=<?= $value; ?> <?= ($value == $month) ? 'selected' : ''; ?>><?= $label; ?></option>
                                            <?php } ?>
                                        </select>
                                        <select name="y">
                                            <option selected disabled value=''>Year</option>
                                            <?php foreach (range(2018, date('Y')) as $yr_li) { ?>
                                                <option value='<?= $yr_li; ?>'  <?= ($yr_li == $year) ? 'selected' : ''; ?>><?= $yr_li; ?></option>
                                            <?php } ?>
                                        </select>
                                        <button type="submit" class='btn'>Search</button>
                                        <?= $this->Form->end(); ?>
                                    </div>


                                    <table id="example102" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Kid</th>
                                                <th>Fit no.</th>
                                                <th>Email</th>
                                                <th>Products</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($product_list as $key => $prodDetls):
                                               
                                                ?>
                                                <tr>     
                                                    <td><?=$key+1;?></td>
                                                    <td><?= $prodDetls->user_detail->first_name.' '.$prodDetls->user_detail->last_name;?></td>
                                                    <td><?= ($prodDetls->kid_id !=0)?$prodDetls->kids_detail->kids_first_name:'';?></td>
                                                    <td><?= !empty($prodDetls->paymt_gtwy)?$prodDetls->paymt_gtwy->count:'';?></td>
                                                    <td><?= !empty($prodDetls->user)?$prodDetls->user->email:'';?></td>
                                                    <td><?php  if(count($prodDetls->pdlist)>0){ ?>
                                                             <table>
                                                             <?php
                                                        foreach($prodDetls->pdlist as $pdlili){
                                                            if($pdlili->is_finalize !=1){
                                                            ?>
                                                              <tr>
                                                                <td><?= $pdlili->product_name_one; ?></td>
                                                                <td><?= $pdlili->barcode_value;?></td>
                                                                <td><?= $pdlili->sell_price;?></td>
                                                              </tr>
                                                             
                                                            
                                                            <?php
                                                        }
                                                            
                                                        }
                                                        ?>
                                                            </table> 
                                                            <?php } ?>
                                                            </td>
                                                    
                                                    <td>
                                                        <a class="btn btn-info" href="<?php if(!empty($prodDetls->kid_id)){
                                                            echo HTTP_ROOT.'appadmins/addkid-profile/'.$prodDetls->payment_id;
                                                        }else{
                                                            echo HTTP_ROOT.'appadmins/addproduct/'.$prodDetls->payment_id;
                                                        } ?>">View Products</a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>


                                    </table>

                                </div>
                            </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
    </section><!-- /.content -->

</div>


<link href= "https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href= "https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example102').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>
<div>
    <ul style="font-size: 30px;  line-height: 1.4em;  padding: 0px; list-style: none;">
        <li><b>Brand name : </b> <?=$brand_details->brand_name;?> </li>
        <li><b>Contact person name : </b> <?=$brand_details->name.' '.$brand_details->last_name;?> </li>
        <li><b>Email : </b> <?=$brand_details->email;?> </li>
        <li><b>PO number : </b> <?=$po_number;?> </li>
    </ul>
</div>
<div style="margin-top: 20px;">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>sl no</th>
            <th>Brands Name</th>
            <th>Name</th>
            <th>Photo</th>
            <th style="width: 10%;text-align: center;">Quantity</th>
            <th style="width: 10%;text-align: center;">Po date</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data_list as $ky => $dat_li) {
            ?>
            <tr  class="message_box">
                <td><?= $ky + 1 ?></td>
                <td><?= h($dat_li->brand->brand_name) ?></td>
                <td><?php echo $dat_li->prd_detl[0]['product_name_one']; ?></td>
                <td><img src="<?php echo HTTP_ROOT_INV . 'files/product_img/' ?><?php echo $dat_li->prd_detl[0]['product_image']; ?>" style="width: 80px;"/></td>

                <td style="text-align: center;"><?php echo $dat_li->qty; ?></td>
                <td style="text-align: center;"><?php echo date('Y-m-d'); ?></td>

            </tr>
        <?php } ?>
    </tbody> 
</table>
</div>

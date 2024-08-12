<?php foreach ($ShippingAddress as $useraddress_data) { ?>
    <div class="Address-details1">
        <form>
            <ul>
                <li><strong><?php echo @$useraddress_data->full_name; ?></strong></li>
                <li>At/Po-<?php echo @$useraddress_data->address; ?></li>
                <li>Address 2<?php echo @$useraddress_data->address_line_2; ?></li>
                <li>City<?php echo @$useraddress_data->city; ?></li>
                <li>State: <?php echo @$useraddress_data->state; ?></li>
                <li>Country: <?php echo @$useraddress_data->country; ?></li>
                <li>Phone: <?php echo @$useraddress_data->phone; ?></li>
                
            </ul>
            <a onclick="getDelete('<?php echo @$useraddress_data->id; ?>')" href="javascript:void(0)">Delete</a>
            <a onclick="getEdit('<?php echo @$useraddress_data->id; ?>')" href="javascript:void(0)">Edit</a>
            <?php if($useraddress_data->default_set!=1){?>
            <a onclick="getUpdate('<?php echo @$useraddress_data->id; ?>')" href="javascript:void(0)" class="defult-setting-button">Set in default</a>
            <?php } ?>
        </form>

        <div style="display: none" id="msgBody-<?php echo $useraddress_data->id; ?>">
            <p><strong><?php echo @$useraddress_data->full_name; ?></strong></p>
            <p>At/Po-<?php echo @$useraddress_data->address; ?></p>
            <p>Address 2<?php echo @$useraddress_data->address_line_2; ?></p>
            <p>City<?php echo @$useraddress_data->city; ?></p>
            <p>State: <?php echo @$useraddress_data->state; ?></p>
            <p>Country: <?php echo @$useraddress_data->country; ?></p>
            <p>Phone: <?php echo @$useraddress_data->phone; ?></p>
        </div>
    </div>
<?php } ?>
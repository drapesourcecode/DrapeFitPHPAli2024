<br><label class="h4">Address</label><br>
<input type="text" required="" placeholder="Please input your Name" value="<?= $u_name; ?>" name="name" class="txt" readonly>
<input type="text" required="" placeholder="Please input your company name" value="<?= $u_name; ?>" name="company_name" class="txt" readonly>
<input type="text" required="" placeholder="Please input your address line 1" value="<?= !empty($shipping_address->address) ? $shipping_address->address : null; ?>" name="address_line1" class="txt" readonly>
<input type="text" placeholder="Please input your address line 2" value="<?= !empty($shipping_address->address_line_2) ? $shipping_address->address_line_2 : null; ?>" name="address_line2" class="txt" readonly>
<input type="text" required="" placeholder="Please input your city" value="<?= $shipping_address->city; ?>" name="city" class="txt" readonly>
<input type="text" required="" placeholder="Please input your state province" value="<?= $shipping_address->state; ?>" name="state_province" class="txt" readonly>
<input type="text" required="" placeholder="Please input your posatal code" value="<?= $shipping_address->zipcode; ?>" name="postal_code" class="txt" readonly>
<input type="text" required="" placeholder="Please input your country code" value="<?= $shipping_address->country; ?>" name="country_code" class="txt" readonly>
<input type="text" required="" placeholder="Please input your phone" value="<?= $shipping_address->phone; ?>" name="phone" class="txt" readonly>

<input type="text" required="" placeholder="Please input your email" value="<?= $user_dtl->email; ?>" name="email" class="txt" readonly>

<br><label class="h4">Shipping date </label><br>
<input type="date" required="" placeholder="Please input your ship date" name="ship_date" class="txt" value="<?= date('Y-m-d', strtotime('+1 day')); ?>" readonly>


<br>

<!--<div class="row  pl-1 pt-4 pb-2" id="bx_listt">
    <div classs="col-md-1 col-sm-2">
        <input type="radio" class="buttonxx" id="large" name="box_type" value="large">
        <label for="large" class="btn btn-default p-1 m-1 border-primary rounded" onclick="updateBox(8, 5, 2, 15)">Large Box</label>

    </div>
    <div classs="col-md-1 col-sm-2">
        <input type="radio" class="buttonxx" id="small" name="box_type" value="small">
        <label for="small" class="btn btn-default p-1 m-1 border-primary rounded" onclick="updateBox(4, 3, 2, 5)">Small box</label>
    </div>


</div>-->
<br>
<?php
            $boxxx_data = [
                'weight_unit' => 'lb',
                'dimension_unit' => 'inch',
                'small' => ['weight' => 3, 'length' => 10, 'width' => 10, 'height' => 4],
                'large' => ['weight' => 4, 'length' => 12, 'width' => 12, 'height' => 4]
            ];
             $box_type = $useridDetails->box_type;
            ?>
<div>
    <strong>Box type : </strong> <?=$box_type;?>
</div>
<label class="h4">Box weight (in pound)</label><br>
<input type="text" required="" placeholder="weight in pound" name="weight" class="txt" required value="<?= !empty($box_type) ? $boxxx_data[$box_type]['weight'] : ""; ?>" readonly>

<br><label class="h4">Box dimensions (in inch)</label><br>

<input type="text" required="" placeholder="length in inch" name="length" class="txt" readonly required value="<?= !empty($box_type) ? $boxxx_data[$box_type]['length'] : ""; ?>">
<input type="text" required="" placeholder="width in inch" name="width" class="txt" readonly required value="<?= !empty($box_type) ? $boxxx_data[$box_type]['width'] : ""; ?>">
<input type="text" required="" placeholder="height in inch" name="height" class="txt" readonly required value="<?= !empty($box_type) ? $boxxx_data[$box_type]['height'] : ""; ?>">

<script>
//    function updateBox(length, width, height, weight) {
//        $('input[name=length]').val(length);
//        $('input[name=width]').val(width);
//        $('input[name=height]').val(height);
//        $('input[name=weight]').val(weight);
//    }
</script>
<input type="submit" value="submit" name="submit" class="txt2">
<style>
    .buttonxx {
        display: none;
    }
    .buttonxx:checked + label {
        background-color: #6296ff;
        border-color: #6296ff;
        color:#fff;
    }

</style>
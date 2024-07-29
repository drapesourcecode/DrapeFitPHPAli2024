<?php
$pevdata = !empty($prv_data) ? json_decode($prv_data->post_dtls, true) : [];
?>
<div class="content-wrapper">
    <div class="container">

        <h3 class="text-center">Generate Shipping & Return Label</h3><br />
        <?= $this->Form->create('', ['type' => 'POST', 'id' => 'shipping_label_frm']); ?>
        <div class="row">
            <div class="col-md-6">
                <h4>Sender details</h4>
                <input class="form-control" name="sender_name" placeholder="Name..." required value="Drape Fit"/><br />               
                <input class="form-control" name="sender_email" placeholder="E-mail..." value="support@drapefit.com"/><br />
                <input class="form-control" name="sender_phone" placeholder="Phone..." value="8326753284"/><br />
                <input class="form-control" name="sender_company" placeholder="Company..." value="Drape Fit Inc."/><br />
                <input class="form-control" name="sender_address_country" value="US" readonly /><br />               
                <input class="form-control" name="sender_address_line1" placeholder="address line1..." value="14090 Southwest Fwy Ste 300" required/><br />
                <input class="form-control" name="sender_address_line2" placeholder="address line2..." value="" /><br />
                <input class="form-control" name="sender_address_suburb" placeholder="suburb..." value="Sugar Land" required/><br />
                <input class="form-control" name="sender_address_postcode" placeholder="postcode..." value="77478" required/><br />
                <input class="form-control" name="sender_address_state_name" placeholder="state name..." value="Texas" required/><br />
                <input class="form-control" name="sender_instructions" placeholder="instructions..." value="Pick and deliver any parcel Mon-Thurs 10:00am-3:30pm cst" /><br /> 
            </div>
            <div class="col-md-6">
                <h4>Receiver details</h4>
                <input class="form-control" name="receiver_name" placeholder="Name..." value="<?= @$u_name; ?>" required/><br />               
                <input class="form-control" name="receiver_email" placeholder="E-mail..." value="<?= !empty($user_dtl->email) ? $user_dtl->email : ''; ?>" /><br />
                <input class="form-control" name="receiver_phone" placeholder="Phone..." value="<?= !empty($shipping_address->phone) ? $shipping_address->phone : ''; ?>" /><br />
                <input class="form-control" name="receiver_company" placeholder="Company..." value="" /><br />
                <input class="form-control" name="receiver_address_country" value="US" readonly /><br />               
                <input class="form-control" name="receiver_address_line1" placeholder="address line1..." value="<?= !empty($shipping_address->address) ? $shipping_address->address : ''; ?>" required/><br />
                <input class="form-control" name="receiver_address_line2" placeholder="address line2..." value="<?= !empty($shipping_address->address_line_2) ? $shipping_address->address_line_2 : ''; ?>" /><br />
                <input class="form-control" name="receiver_address_suburb" placeholder="suburb..." value="<?= !empty($shipping_address->city) ? $shipping_address->city : ''; ?>" required/><br />
                <input class="form-control" name="receiver_address_postcode" placeholder="postcode..." value="<?= !empty($shipping_address->zipcode) ? $shipping_address->zipcode : ''; ?>" required/><br />
                <input class="form-control" name="receiver_address_state_name" placeholder="state name..." value="<?= !empty($shipping_address->state) ? $shipping_address->state : ''; ?>" required/><br />
                <input class="form-control" name="receiver_instructions" placeholder="instructions..." value="Leave in a safe place" required/><br /> 
            </div>
            <div class="col-md-12">
                <h4>Description</h4>
                <input class="form-control" name="description" placeholder="Description..." value="Drape Fit Stye Fit Box" required/><br />        
            </div>
            <?php /*
            <div class="col-md-12">
                <h4>Customer reference</h4>
                <input class="form-control" name="customer_reference" placeholder="Customer reference..." value="Monomita" readonly/><br />        
            </div>
            */ ?>
            <?php
            $boxxx_data = [
                'weight_unit' => 'lb',
                'dimension_unit' => 'inch',
                'small' => ['weight' => 4, 'length' => 10, 'width' => 10, 'height' => 4],
                'large' => ['weight' => 5, 'length' => 12, 'width' => 12, 'height' => 4]
            ];
            $box_type = $useridDetails->box_type;
            ?>
            <div class="col-md-12">
                <h4>Weight</h4>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Value</h4>
                        <input class="form-control" name="weight_value" placeholder="Weight value..." value="<?= !empty($box_type) ? $boxxx_data[$box_type]['weight'] : ""; ?>" required/><br />
                    </div>
                    <div class="col-md-6">
                        <h4>Unit</h4>
                        <select class="form-control" name="weight_unit" required>
                            <option value="lb">lb</option>
                            <?php/*
                            <option value="kg" <?= (!empty($pevdata) && ($pevdata['data']['weight']['units'] == "kg")) ? "selected" : ""; ?> >kg</option>                            
                            <option value="g" <?= (!empty($pevdata) && ($pevdata['data']['weight']['units'] == "g")) ? "selected" : ""; ?> >g</option>
                            <option value="oz"  <?= (!empty($pevdata) && ($pevdata['data']['weight']['units'] == "oz")) ? "selected" : ""; ?> >oz</option>
                             * 
                             */ ?>
                        </select>

                        <br />        
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h4>Dimensions</h4>
                <div class="row">      
                    <div class="col-md-12">
                        <b>Box type</b> : <?= $box_type; ?>

                    </div>
                    <div class="col-md-3">
                        <h4>Unit</h4>
                        <select class="form-control" name="dimension_unit" required>                            
                            <option value="in">in</option>
                            <?php /*
                            <option value="cm" <?= (!empty($pevdata) && ($pevdata['data']['dimensions']['units'] == "cm")) ? "selected" : ""; ?>>cm</option>
                            */ ?>
                        </select>       
                    </div>
                    <div class="col-md-3">
                        <h4>Length</h4>
                        <input class="form-control" name="dimension_length" placeholder="Length..." value="<?= !empty($box_type) ? $boxxx_data[$box_type]['length'] : ""; ?>" required/><br />        
                    </div>
                    <div class="col-md-3">
                        <h4>Width</h4>
                        <input class="form-control" name="dimension_width" placeholder="Width..." value="<?= !empty($box_type) ? $boxxx_data[$box_type]['width'] : ""; ?>" required/><br />        
                    </div>
                    <div class="col-md-3">
                        <h4>Height</h4>
                        <input class="form-control" name="dimension_height" placeholder=Height..." value="<?= !empty($box_type) ? $boxxx_data[$box_type]['height'] : ""; ?>" required/><br />        
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h4>Product code</h4>
                <select class="form-control" name="product_code" id="product_code">   
                    <option value="SAVER-DROPOFF">SAVER-DROPOFF</option>
                    <?php //echo !empty($pevdata) ? '<option value="' . $pevdata['data']['product_code'] . '" >' . $pevdata['data']['product_code'] . '</option>' : "";  ?>
                </select>      
            </div>
            <div class="col-md-6">
                <?php /* <h4>&nbsp;</h4>      
                <div id="all_product_list">                    
                    <button type="button" class="btn btn-info" id="get_products" onclick="get_prods()"  <?= !empty($prv_data->ship_track_number) ? 'style="display:none;"' : '' ?>>Get products for Shipping Label</button>
                </div>
                */ ?>
            </div>

            <div class="col-md-12" style="margin-top: 15px;">

                <button type="button" class="btn btn-info" id="generate_ship_label" onclick="ship_label()" <?= !empty($productTrackingNo->order_usps_tracking_no) ? 'style="display:none;"' : '' ?> >Generate Shipping Label</button>
                <a type="button" class="btn btn-success" id="download_ship_label" href="<?= HTTP_ROOT; ?>sendles/downloadLabel/<?= $payment_id; ?>/ship" target="_blank" <?= empty($productTrackingNo->order_usps_tracking_no) ?  'style="display:none;"':""; ?> >Print Shipping Label</a>

                <button type="button" class="btn btn-primary" id="generate_return_label" onclick="return_label()"  <?= empty($productTrackingNo->order_usps_tracking_no) ? 'style="display:none;"' : '' ?>  <?= !empty($productTrackingNo->return_usps_tracking_no) ? 'style="display:none;"' : '' ?>  >Generate Return Shipping Label</button>
                <a type="button" class="btn btn-success" id="download_return_label" href="<?= HTTP_ROOT; ?>sendles/downloadLabel/<?= $payment_id; ?>/return" target="_blank"   <?= empty($productTrackingNo->return_usps_tracking_no)? 'style="display:none;"':""; ?> >Print Return Label</a>

<!-- Once ship and return tracking number generate need to auto finalize for men & women <?= HTTP_ROOT; ?>/appadmins/all-finalize/2446 -->
<!-- Once ship and return tracking number generate need to auto finalize for boy & girl <?= HTTP_ROOT; ?>/appadmins/kidall-finalize/2451 -->
            </div>


        </div>

        <?= $this->Form->end(); ?>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
    function get_prods() {
        $('#product_code').removeAttr('required');
        $("#shipping_label_frm").submit();
        if ($("form input").hasClass("error") == false) {
            let frm_data = {
                weight_units: $('select[name=weight_unit]').val(),
                sender_country: $('input[name=sender_address_country]').val(),
                sender_address_line1: $('input[name=sender_address_line1]').val(),
                sender_suburb: $('input[name=sender_address_suburb]').val(),
                sender_postcode: $('input[name=sender_address_postcode]').val(),
                receiver_address_line1: $('input[name=receiver_address_line1]').val(),
                receiver_suburb: $('input[name=receiver_address_suburb]').val(),
                receiver_postcode: $('input[name=receiver_address_postcode]').val(),
                receiver_country: $('input[name=receiver_address_country]').val(),
                weight_value: $('input[name=weight_value]').val(),
            };

            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>sendles/getProduct", // PAGE WHERE WE WILL PASS THE DATA /
                data: {data: frm_data}, // THE DATA WE WILL BE PASSING /
                dataType: 'JSON',
                success: function (res) {
                    console.log(res);
                    if (res.status == "success") {
                        $('#all_product_list').hide();
                        let html_cnt = '';
                        $.each(res.msg, function (key, value) {
                            html_cnt += `<option value="${value.product_code}">${value.product_code} [${value.gross}, ${value.send_date}, ${value.delivery_date}]</option>`;
                        });
                        $('#product_code').html(html_cnt);
                    }
                    if (res.status == "error") {
                        alert(res.msg)
                    }
                }
            });

//            console.log(data);
        }

    }
    function ship_label() {
        $('#product_code').attr('required', 'required');
        $("#shipping_label_frm").submit();

        if ($("form input").hasClass("error") == false) {
            let frm_data = {
                sender: {
                    contact: {
                        name: $('input[name=sender_name]').val(),
                        email: $('input[name=sender_email]').val(),
                        phone: $('input[name=sender_phone]').val(),
                        company: $('input[name=sender_company]').val(),
                    },
                    address: {
                        country: $('input[name=sender_address_country]').val(),
                        address_line1: $('input[name=sender_address_line1]').val(),
                        address_line2: $('input[name=sender_address_line2]').val(),
                        suburb: $('input[name=sender_address_suburb]').val(),
                        postcode: $('input[name=sender_address_postcode]').val(),
                        state_name: $('input[name=sender_address_state_name]').val()
                    },
                    instructions: $('input[name=sender_instructions]').val()
                },
                receiver: {
                    contact: {
                        name: $('input[name=receiver_name]').val(),
                        email: $('input[name=receiver_email]').val(),
                        phone: $('input[name=receiver_phone]').val(),
                        company: $('input[name=receiver_company]').val(),
                    },
                    address: {
                        country: $('input[name=receiver_address_country]').val(),
                        address_line1: $('input[name=receiver_address_line1]').val(),
                        address_line2: $('input[name=receiver_address_line2]').val(),
                        postcode: $('input[name=receiver_address_postcode]').val(),
                        suburb: $('input[name=receiver_address_suburb]').val(),
                        state_name: $('input[name=receiver_address_state_name]').val(),
                    },
                    instructions: $('input[name=receiver_instructions]').val()
                },
                weight: {
                    units: $('select[name=weight_unit]').val(),
                    value: $('input[name=weight_value]').val(),
                },
                dimensions: {
                    units: $('select[name=dimension_unit]').val(),
                    length: $('input[name=dimension_length]').val(),
                    width: $('input[name=dimension_width]').val(),
                    height: $('input[name=dimension_height]').val(),
                },
                description: $('input[name=description]').val(),
//                customer_reference: $('input[name=customer_reference]').val(),
                product_code: $('select[name=product_code]').val()
            }

            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>sendles/createOrder", // PAGE WHERE WE WILL PASS THE DATA /
                data: {data: frm_data, payment_id: <?= $payment_id; ?>}, // THE DATA WE WILL BE PASSING /
                dataType: 'JSON',
                success: function (res) {
                    console.log(res);
                    if (res.status == "success") {
                        alert(res.status);
                        $('#generate_return_label').show();
                        $('#generate_ship_label').hide();
                        $('#download_ship_label').show();
                    }
                    if (res.status == "error") {
                        alert(res.msg)
                    }
                }
            });

            console.log(frm_data);
        }

    }
    function return_label() {
        $('#product_code').attr('required', 'required');
        $("#shipping_label_frm").submit();
        if ($("form input").hasClass("error") == false) {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>sendles/returnProduct", // PAGE WHERE WE WILL PASS THE DATA /
                data: {payment_id: <?= $payment_id; ?>, delivery_instructions: $('input[name=receiver_instructions]').val()}, // THE DATA WE WILL BE PASSING /
                dataType: 'JSON',
                success: function (res) {
                    console.log(res);
                    if (res.status == "success") {
                        alert(res.status);
                        $('#generate_return_label').hide();
                        $('#generate_ship_label').hide();
                        $('#download_return_label').show();
                    }
                    if (res.status == "error") {
                        alert(res.msg)
                    }
                }
            });
        }

    }
    $(document).ready(function () {
        $('input, select').attr('readonly', true);
        $("#shipping_label_frm").validate({
            submitHandler: function () {
                return false;
            }
        });
    });
</script>
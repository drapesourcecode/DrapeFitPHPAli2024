<style type="text/css">
    .address{width:100%;float:left;text-align:center;display:inline-block}.address-box{width:50%;text-align:left;display:inline-block}.address-box, .add-address h2{margin:15px 0px;padding:0;text-align:left;font-size:20px;font-weight:700}.address-box h3{margin:15px 0px;padding:0;font-size:17px;font-weight:700;display:inline-block}.address-box p{width:95%;font-size:14px;font-weight:bold}.address-box label{width:100%;font-size:14px;margin-top:5px;font-weight:600;display:inline-block}.address-box select{width:100%;float:left;background:#ececec;padding:5px 10px;margin-bottom:10px;border-radius:3px;border:1px solid #9a9a9a}.address-box input{width:100%;float:left;margin-bottom:5px;padding:5px 10px;border-radius:3px;border:1px solid #9a9a9a}.address-box button{background:#d64ade;cursor:pointer;padding:7px 35px;font-size:14px;border:1px solid #d64ade;font-weight:600;border-radius:3px;color:white;margin-top:30px;margin-bottom:30px;letter-spacing:1px}.address-box button:hover{border:1px solid #333;background:#333;color:#fff}.address-box, .add-address span{font-size:14px;color:#4c4c4c;font-weight:normal}.address-box span a, .add-address span a{font-size:14px;color:#4c4c4c;text-decoration:none}.add-address{width:100%;float:left;text-align:left;margin:15px 0px}.add-address ul{margin:0;padding:0;display:inline-block}.add-address ul li{width:300px;height:240px;display:inline-block;float:left;padding:15px 20px;margin-left:30px;text-align:left;border-radius:3px;border:2px solid #ccc}.add-address ul li h4{padding:0;margin:0;margin-bottom:5px;text-align:left;color:#000;font-size:15px;font-weight:700;display:inline-block}.add-address ul li i{width:100%;font-size:50px;color:#ccc}.add-address ul li h3{margin:15px 0px;padding:0;color:#ccc;font-size:20px;font-weight:700;display:inline-block}.add-address ul li p{margin:3px 0px;padding:0;font-size:13px;line-height:19px;font-weight:600}.add-address ul li span{font-size:12px;margin-top:50px;display:inline-block}.add-address ul li span a{color:#0089ff;font-size:13px}.add-address ul li:first-child{width:300px;height:240px;display:inline-block;float:left;padding:65px;margin-left:0px;text-align:center;border-radius:3px;border:2px dashed #ccc}.add-address ul li:nth-child(3n+1){width:300px;height:240px;display:inline-block;float:left;padding:15px 20px !IMPORTANT;margin-left:0px;text-align:center;border-radius:3px;border:2px solid #ccc;margin-top:20px}
</style>
<section class="address">
    <div class="container">	
        <div class="row">
            <div class="col-md-12">
                <div class="address-box">
                    <span><a href="">Your Account</a></span>
                    <h2>Add a new address</h2>
                    <p>Or pick up your packages at your convenience from our self-service locations. To add an Drapefit Pickup Point or Locker, click <a href="">here</a>.</p>
                    <?= $this->Form->create('', ['type' => 'post', 'class' => "form", "role" => "form", "data-toggle" => "validator", "novalidate", 'id' => 'shipaddress']); ?>
                    <label>Full name</label>
                    <input type="text" name="full_name"  id="full_name" onkeyup="validation()" maxlength="20">
                    <label>Zipcode</label>
                    <input type="text" name="zipcode" placeholder="6-digit [0-9] pincode" id="zipcode" onkeyup="validation()" maxlength="60">

                    <label>Street address</label>
                    <input type="text" name="address" placeholder="colony / street / locality" id="address" onkeyup="validation()" maxlength="60">
                    <label></label>
                    <input type="textarea" name="address_line_2" placeholder="colony / street / locality" id="address_line_2" onkeyup="validation()" maxlength="60">
                    <label>City</label>
                    <input type="text" name="city" id="city" onkeyup="validation()" maxlength="20">

                    <label>State</label>
                    <select name='state' id='state'>
                        <option value='Armed Forces Americas'>Armed Forces Americas</option>
                        <option value='Armed Forces Americas1'>Armed Forces Americas1</option>
                        <option value='Armed Forces Americas2' >Armed Forces Americas2</option>
                        <option value='Armed Forces Americas3'>Armed Forces Americas3</option>
                    </select>				


                    <button type="submit" name="save" value="save" id="save">Save</button>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#save').prop('disabled', true);
        validation();
    });
    function validation()
    {
        var name = $("#full_name").val();
        var address = $("#address").val();
        var address_line_2 = $("#address_line_2").val();
        var city = $("#city").val();
        var zipcode = $("#zipcode").val();

        if (name == "") {
            $("#full_name").css("border", "#FF0000 1px solid");
            //   $(".errorn").html("Please Enter fullname");
        } else {
            $("#full_name").css("border", "#008000 1px solid");
//            $(".errorn").html("");
        }
        if (address == "") {
            $("#address").css("border", "#FF0000 1px solid");
            // $(".errorad").html("Please Enter address");
        } else {
            $("#address").css("border", "#008000 1px solid");
//            $(".errorad").html("");
        }

        if (city == "") {
            $("#city").css("border", "#FF0000 1px solid");
            //  $(".errorc").html("Please Enter city name");
        } else {
            $("#city").css("border", "#008000 1px solid");
//            $(".errorc").html("");

        }
        if (zipcode == "") {
            $("#zipcode").css("border", "#FF0000 1px solid");
            //   $(".errorm").html("Please Enter zipcode");
        } else {
            $("#zipcode").css("border", "#008000 1px solid");
//            $(".errorm").html("");


        }

        if (name && address && city && zipcode) {

            //  $("#payment").attr("disabled", false);
            $('#save').prop('disabled', false);

        } else {

            $('#save').prop('disabled', true);
        }
    }
</script>
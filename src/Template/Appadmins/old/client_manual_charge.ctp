<style>
    #usr_list{
        list-style: none;
        padding: 10px;
        max-height: 200px;
        overflow-x: auto;
        position: absolute;
        z-index: 99999999;
        width: 95%;
        background: #dbdbdb;
        display: none;
    }
    #usr_list li {
        padding: 5px 10px 5px 10px;
    }
    #usr_list li:hover{
        color: #fff;
        background: #000;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Client Manual charge</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>            
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box content">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $this->Form->create('', ['type' => 'post','autocomplete'=>'off']) ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="hidden" id="usr_id" name="usr_id">      
                                <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" onkeyup="getClientDetails(this.value)" name="email">      
                                <ul id="usr_list">                                    
                                </ul>
                            </div>

                            <div class="form-group">
                                <label >Amount</label>  
                                <input type="number" step=".01" min="1" class="form-control" name="amount"  placeholder="Enter Amount">      

                            </div><!-- comment -->
                            <div class="form-group" id="card_details"></div>
                            <div class="form-group" id="billing_address"></div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?= $this->Form->end(); ?>
                        </div>
                        <div class="col-sm-6" id="client_details">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function getClientDetails(data) {
        $.ajax({
            type: "POST",
            url: "<?php echo HTTP_ROOT . 'appadmins/getClientEmaillist/' ?>",
            data: {ky: data},
            dataType: "html",
            success: function (res) {
                if (res) {
                    $('#usr_list').show();
                    $('#usr_list').html(res);
                }
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });

    }

    function setDataInField(email, id) {
        $('#usr_list').hide('slow');
        $('#inputEmail').val(email);
        $('#usr_id').val(id);
        getUserDetails(id);
        getUserCardDetails(id);
        getUserAddressDetails(id);
    }

    function getUserDetails(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo HTTP_ROOT . 'appadmins/getClientDetails/' ?>",
            data: {ky: id},
            dataType: "html",
            success: function (res) {
                if (res) {
                    $('#client_details').html(res);
                }
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });

    }

    function getUserCardDetails(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo HTTP_ROOT . 'appadmins/getClientCardDetails/' ?>",
            data: {ky: id},
            dataType: "html",
            success: function (res) {
                if (res) {
                    $('#card_details').html(res);
                }
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });

    }

    function getUserAddressDetails(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo HTTP_ROOT . 'appadmins/getClientAddressDetails/' ?>",
            data: {ky: id},
            dataType: "html",
            success: function (res) {
                if (res) {
                    $('#billing_address').html(res);
                }
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });

    }
</script>
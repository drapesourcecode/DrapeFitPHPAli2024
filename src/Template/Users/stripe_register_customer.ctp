<div class="container">
    <div style="padding-top:100px;">
        <?php if (empty($userDetails->stripe_customer_key)) { ?>
            <h4><center>Register Customer In Stripe</center></h4>
            <?= $this->Form->create('', ['class' => "form-horizontal"]); ?>
            <div class="form-group">
                <label class="control-label col-sm-2" >Name:</label>
                <div class="col-sm-10">          
                    <input type="hidden" name="user_id" value="<?= $userDetails->id; ?>">
                    <input type="text" class="form-control"  name="name" value="<?= $userDetails->user_detail->first_name . ' ' . $userDetails->user_detail->last_name; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email"  value="<?= $userDetails->email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Zipcode:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="zipcode">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >City:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="city">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >State:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="state">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Country:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="country">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Address1:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="line1">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Address2:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="line2">
                </div>
            </div>

            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            <?= $this->Form->end(); ?>
        <?php } ?>

        <div class="row">
            <div class="col-sm-4">
                <center><h4>All Addresses</h4></center>
                <ul class="list-group">
                    <?php foreach ($shipping_address as $ky => $shp_ad_li) { ?>
                        <li class="list-group-item">     
                            <?= $ky + 1; ?>
                            <ul class="list-group alert alert-info">
                                <li class="list-group-item">Zipcode : <?= $shp_ad_li->zipcode; ?></li>
                                <li class="list-group-item">City : <?= $shp_ad_li->city; ?></li>
                                <li class="list-group-item">State : <?= $shp_ad_li->state; ?></li>
                                <li class="list-group-item">Country : <?= $shp_ad_li->country; ?></li>
                                <li class="list-group-item">Address : <?= $shp_ad_li->address; ?></li>
                                <li class="list-group-item">Address2 : <?= $shp_ad_li->address_line_2; ?></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <?php if (!empty($userDetails->stripe_customer_key)) { ?>
                    <center><h4>All Cards</h4></center>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Card number</td>
                                <td>Expry on</td>
                                <td>cvv</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payment_card_details as $pcd) { ?>
                                <tr>
                                    <td><?= $pcd->card_number; ?></td>
                                    <td><?= $pcd->card_expire; ?></td>
                                    <td><?= $pcd->cvv; ?></td>
                                    <td>
                                        <?php if (empty($pcd->stripe_payment_key)) { ?>
                                            <a href="<?= HTTP_ROOT; ?>users/add_card_stripe/<?= $pcd->id; ?>" target="_blank">Add In Stripe</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <h4>Customer not added in stripe</h4>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<style>
    input[type="text"], input[type="password"] {
        width: 100%;
        height: auto;
        padding: 5px 10px;
        margin: 0;
        margin-bottom: 0px;
        display: inline-block;
        border: 1px solid #9f9797;
        border-radius: 0;
        font-size: 17px;
        font-weight: 400;
        margin-bottom: 0;
    }
</style>
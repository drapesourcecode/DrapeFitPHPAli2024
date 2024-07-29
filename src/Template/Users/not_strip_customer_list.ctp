<div style="padding-top:100px;">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Id
                    <?php if (!empty($srt) && !empty($keyy) && ($keyy == "id") && ($srt == "DESC")) {
                        ?> 
                        <a href="<?= HTTP_ROOT; ?>users/notStripCustomerList?sort=id-ASC"><i class="fa fa-arrow-up"></i></a>
                        <?php
                    } else {
                        ?> 
                        <a href="<?= HTTP_ROOT; ?>users/notStripCustomerList?sort=id-DESC"><i class="fa fa-arrow-down"></i></a>
                        <?php
                    }
                    ?>
                </td>
                <td>Name</td>
                <td>Email
                    <?php if (!empty($srt) && !empty($keyy) && ($keyy == "email") && ($srt == "DESC")) {
                        ?> 
                        <a href="<?= HTTP_ROOT; ?>users/notStripCustomerList?sort=email-ASC"><i class="fa fa-arrow-up"></i></a>
                        <?php
                    } else {
                        ?> 
                        <a href="<?= HTTP_ROOT; ?>users/notStripCustomerList?sort=email-DESC"><i class="fa fa-arrow-down"></i></a>
                        <?php
                    }
                    ?>
                </td>
                <td>Stripe customer key
                    <?php if (!empty($srt) && !empty($keyy) && ($keyy == "stripe_customer_key") && ($srt == "DESC")) {
                        ?> 
                        <a href="<?= HTTP_ROOT; ?>users/notStripCustomerList?sort=stripe_customer_key-ASC"><i class="fa fa-arrow-up"></i></a>
                        <?php
                    } else {
                        ?> 
                        <a href="<?= HTTP_ROOT; ?>users/notStripCustomerList?sort=stripe_customer_key-DESC"><i class="fa fa-arrow-down"></i></a>
                            <?php
                        }
                        ?>
                </td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>

            <?php
            $key=0;
            foreach ($userDetails as $usr_dtl) {
//                if (!empty($usr_dtl->email)) {
                if (!empty($usr_dtl->email) && !empty($usr_dtl->card_detl)) {
                    ?>
                    <tr>
                        <td><?= (++$key); ?></td>
                        <td><?= $usr_dtl->id; ?></td>
                        <td><?= $usr_dtl->user_detail->first_name . ' ' . $usr_dtl->user_detail->last_name; ?></td>
                        <td><?= $usr_dtl->email; ?></td>
                        <td><?= $usr_dtl->stripe_customer_key; ?></td>
                        <td><a href="<?= HTTP_ROOT; ?>users/stripe_register_customer/<?= $usr_dtl->id; ?>" target="_blank">Stripe register</a></td>
                    </tr>

                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php
/*

  print_r([
  'name' => $usr_dtl->user_detail->first_name . ' ' . $usr_dtl->user_detail->last_name,
  'email' => ,
  'description' => $usr_dtl->id . ':- ' . $usr_dtl->user_detail->first_name . ' ' . $usr_dtl->user_detail->last_name . ' customer key creating ',
  "address" => [
  "city" => $data['city'],
  "country" => $data['country'],
  "line1" => $data['address'],
  "line2" => $data['address_line_2'],
  "postal_code" => $data['zipcode'],
  "state" => $data['state']
  ]
  ]);
  print_r($usr_dtl);
 */
?>
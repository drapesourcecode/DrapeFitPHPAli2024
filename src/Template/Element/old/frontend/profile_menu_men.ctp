<?php

use Cake\ORM\TableRegistry;

if ($this->request->session()->read('PROFILE') == 'KIDS') {
    if ($this->request->session()->read('KID_ID')) {
        $kidsDetails = TableRegistry::get('kidsDetails');
        $Usersdata = $kidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();

        if ($Usersdata->is_redirect == 0 && @$Usersdata->is_progressbar != 100) {
            $url = 'welcome/style/';
        } elseif ($Usersdata->is_redirect == 0 && $Usersdata->is_progressbar == 100) {
            $url = 'welcome/schedule/';
        } elseif ($Usersdata->is_redirect == 0) {
            $url = 'welcome/style/';
        } elseif ($Usersdata->is_redirect == 1) {
            $url = 'welcome/schedule/';
        } elseif ($Usersdata->is_redirect == 2) {
            $url = 'not-yet-shipped';
        } elseif ($Usersdata->is_redirect == 3) {
            $url = 'profile-review/';
        } elseif ($Usersdata->is_redirect == 4) {
            $url = 'order_review/';
        } elseif ($Usersdata->is_redirect == 5) {
            $url = 'calendar-sechedule/';
        } elseif ($Usersdata->is_redirect == 6) {
            $url = 'customer-order-review';
        }
    }
} else {
    $Users = TableRegistry::get('Users');
    $UserDetails = TableRegistry::get('UserDetails');
    $Usersdata = $Users->find('all')->where(['id' => $this->request->getSession()->read('Auth.User.id')])->first();
    $UserDetailsdata = $UserDetails->find('all')->where(['user_id' => $this->request->getSession()->read('Auth.User.id')])->first();
    if ($Usersdata->is_redirect == 0 && $UserDetailsdata->is_progressbar != 100) {
        $url = 'welcome/style/';
    } elseif ($Usersdata->is_redirect == 0 && $UserDetailsdata->is_progressbar == 100) {
        $url = 'welcome/schedule/';
    } elseif ($Usersdata->is_redirect == 0) {
        $url = 'welcome/style/';
    } elseif ($Usersdata->is_redirect == 1) {
        $url = 'welcome/schedule/';
    } elseif ($Usersdata->is_redirect == 2) {
        $url = 'not-yet-shipped';
    } elseif ($Usersdata->is_redirect == 3) {
        $url = 'profile-review/';
    } elseif ($Usersdata->is_redirect == 4) {
        $url = 'order_review/';
    } elseif ($Usersdata->is_redirect == 5) {
        $url = 'calendar-sechedule/';
    } elseif ($Usersdata->is_redirect == 6) {
        $url = 'customer-order-review';
    }
}
?>


<section class="customer-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <ul>
                    <li <?php if (($acction == 'notYetShipped') || ($acction == 'orderReview') || ($acction == 'calendarSechedule') || ($acction == 'customerOrderReview') || ($acction == 'notYetShipped') || ($acction == 'paymentSuccess' ) || ($params == 'schedule') || ($params == 'reservation') || ($params == 'addressbook') || ($params == 'payment')) { ?>class="active" <?php } ?>>
<?php if ($this->request->session()->read('PROFILE') == 'KIDS') { ?>
                            <span><?php echo strtoupper($kidName); ?></span>
                        <?php } else { ?>
                            <span><?php echo strtoupper($this->request->getSession()->read('Auth.User.name')); ?></span>
                        <?php } ?>

                        <a href="<?php echo HTTP_ROOT . $url ?>">

<?php if ($this->request->session()->read('PROFILE') == 'KIDS') { ?>
                                <?php echo $kidName; ?>

                            <?php } else { ?>
                                <?php echo strtoupper($this->request->getSession()->read('Auth.User.name')) ?>
                            <?php } ?>
                        </a>
                    </li>
                    <li <?php if ($acction == 'welcome' && $params == 'style') { ?>class="active" <?php } ?> <?php if (@$slug == 'style') { ?>class='active' <?php } ?>><a href="<?php echo HTTP_ROOT . 'welcome/style' ?>">FIT PROFILE </a></li>

                    
                    <li <?php if ($acction == 'order') { ?>class="active" <?php } ?>><a href="<?php echo HTTP_ROOT . 'order' ?>">ORDERS </a></li>
                    <li <?php if ($acction == 'clients') { ?>class="active" <?php } ?>><a href="<?php echo HTTP_ROOT . 'clients/referrals' ?>">GET $25 </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
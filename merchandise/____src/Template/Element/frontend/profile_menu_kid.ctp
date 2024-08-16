
<section class="customer-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>
                        <span>s</span>
                        <a href="<?php echo HTTP_ROOT . 'welcome/schedule' ?>"><?php if(@$kidmenu->kids_first_name){ echo $kidmenu->kids_first_name;} else{ echo 'Your child';} ?></a>
                    </li>
                    <li><a href="<?php echo HTTP_ROOT . 'welcome/style' ?>">FIT PROFILE </a></li>
                    <li><a href="<?php echo HTTP_ROOT . 'order' ?>">ORDERS </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
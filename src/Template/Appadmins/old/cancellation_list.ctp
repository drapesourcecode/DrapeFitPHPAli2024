<div class="content-wrapper">
    <section class="content-header">
        <h1> Refund Customer Listing  with status</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>            
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php if (!empty($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "dashboard") { ?>
                        <a href="<?php echo HTTP_ROOT; ?>appadmins/index">  <button class="btn btn-warning" type="submit" style="float: right; margin-top: -4%; margin-right: 20%;"> BACK</button> </a><?php } ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Profile</th>
                                    <th>Kid Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>New items with scheduled Fixes</th>
                                    <th>Time fix</th>

                                    <th>Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($AllUserList as $aduserlist): ?>
                                    <tr>
                                        <td><?php echo $this->Custom->customerName($aduserlist->user_id) ?></td>
                                        <td><?php
                                            if ($this->Custom->UserGender($aduserlist->user_id) == 1) {
                                                echo "Men";
                                            } else if ($this->Custom->UserGender($aduserlist->user_id) == 2) {
                                                echo "Women";
                                            } else {
                                                echo "Kids";
                                            }
                                            ?></td>
                                        <td><?php echo $this->Custom->kidName($aduserlist->kid_id) ?></td>
                                        <td><?php echo $this->Custom->customerEmail($aduserlist->user_id) ?></td>
                                        <td><?php echo date('d M,y', strtotime($aduserlist->applay_dt)); ?></td>

                                        <td><?php
                                            if ($aduserlist->try_new_items_with_scheduled_fixes == 1) {
                                                echo "Yes";
                                            } else {
                                                echo "No";
                                            };
                                            ?></td>
                                        <td><?php
                                            if ($aduserlist->how_often_would_you_lik_fixes == 1) {
                                                echo "Every 1 month";
                                            } else if ($aduserlist->how_often_would_you_lik_fixes == 2) {
                                                echo "Every 2 Monthly";
                                            } elseif ($aduserlist->how_often_would_you_lik_fixes == 3) {
                                                echo "Every 3 month";
                                            } else {
                                                echo "No";
                                            }
                                            ?></td>

                                        <td><?php if ($aduserlist->try_new_items_with_scheduled_fixes == 1) { ?>
                                                <span style="color:green">Subscription</span>
                                            <?php } else { ?>
                                                <span style="color:red">Un-subscription</span>
                                            <?php } ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="btn btn-info hint--top  hint view-i" data-id="<?php echo $aduserlist->id; ?>"><i class = "fa fa-eye"></i></a>
                                            <?php if ($this->Custom->UserGender($aduserlist->user_id) == 3) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/customerKidProfile/' . $aduserlist->kid_id; ?>" target="_blank" class="btn btn-info hint--top  hint view-i">Kids Profile</a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/review-users/' . $aduserlist->user_id; ?>" target="_blank" class="btn btn-info hint--top  hint view-i">View Profile</a>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                <div class="modal-admin" id="box<?php echo $aduserlist->id; ?>" >
                                    <div style='width: 100%;'>
                                        <div class="modal-content" style="width: 79% !important;">
                                            <button type="button" class="close"><span aria-hidden="true">×</span></button>
                                            <div class="row " style="margin:0;">
                                                <div class="col-sm-9 col-lg-9 col-md-9 setting-box setting-box2" style="padding-top: 14px; padding-bottom: 0;"> 
                                                    <div class=" tab-content">                            
                                                        <?php echo $this->Form->create("", array('data-toggle' => "validator", 'id' => 'sechdule')) ?>
                                                        <div role="tabpanel" class="tab-pane fade active in satya" >
                                                            <h5>Manage FIT settings</h5>
                                                            <h6>How often would you like to receive Fixes?</h6>
                                                            <div class="checkbox-sitting">
                                                                <input onclick="getCheckBox(<?php echo $aduserlist->id; ?>)"  class="try_new_items_with_scheduled_fixes12" name="try_new_items_with_scheduled_fixes" id="try_new_items_with_scheduled_fixes12<?php echo $aduserlist->id; ?>" value="1" type="checkbox" <?php if ($aduserlist->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } else if ($aduserlist->try_new_items_with_scheduled_fixes == '0') { ?>  <?php } else if ($aduserlist->try_new_items_with_scheduled_fixes == '') { ?> checked <?php } ?> >
                                                                <label for="try_new_items_with_scheduled_fixes12<?php echo $aduserlist->id; ?>">Try new items with scheduled Fixes.</label>
                                                            </div>
                                                            <div id="optionsDIV<?php echo $aduserlist->id; ?>"
                                                            <?php if ($aduserlist->try_new_items_with_scheduled_fixes == 1) { ?>
                                                                     style='display: block;'
                                                                 <?php } else if ($aduserlist->try_new_items_with_scheduled_fixes == '0') { ?>
                                                                     style='display: none;'
                                                                 <?php } else if ($aduserlist->try_new_items_with_scheduled_fixes == '') { ?>
                                                                     style='display: block;'
                                                                 <?php } else { ?>
                                                                     style='display: none;'
                                                                 <?php } ?>
                                                                 >
                                                                <ul>
                                                                    <li>
                                                                        <input class="radio-box" value="1" <?php if (($aduserlist->how_often_would_you_lik_fixes == 1) || ($aduserlist->how_often_would_you_lik_fixes == '')) { ?> checked <?php } ?>  name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes1<?php echo $aduserlist->id; ?>" type="radio" >
                                                                        <label for="how_often_would_you_lik_fixes1<?php echo $aduserlist->id; ?>">
                                                                            <h5>Every 1 month</h5>
                                                                            <p>Ship a selection of new products in every one month.</p>
                                                                        </label>
                                                                    </li>
                                                                    <li>

                                                                        <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2<?php echo $aduserlist->id; ?>" <?php if ($aduserlist->how_often_would_you_lik_fixes == 2) { ?> checked  <?php } ?> name="how_often_would_you_lik_fixes" type="radio">
                                                                        <label for="how_often_would_you_lik_fixes2<?php echo $aduserlist->id; ?>">
                                                                            <h5>Every 2 Monthly</h5>
                                                                            <p>Will ship hand picked products in every two months.</p>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <input class="radio-box" value="3" id="how_often_would_you_lik_fixes3<?php echo $aduserlist->id; ?>" <?php if ($aduserlist->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?>  name="how_often_would_you_lik_fixes" type="radio">
                                                                        <label for="how_often_would_you_lik_fixes3<?php echo $aduserlist->id; ?>">
                                                                            <h5>Every 3 Monthly</h5>
                                                                            <p>Try a FIT in every three months.</p>
                                                                        </label>
                                                                    </li>                                        
                                                                </ul>
                                                                <!--<p>Until you cancel your fit schedule we will charge a styling fee $20 and that will be credit towards any product you buy.</p>-->
                                                            </div>
                                                            <div class="tab-button">
                                                                <input type='hidden' name='dataid' value='<?php echo $aduserlist->id; ?>'/>
                                                                <button name="first_time_fix" value ='first_time_fix' class="btn-boxes" type="Submit">Save </button>
                                                            </div>            
                                                        </div>

                                                        <?php echo $this->Form->end(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
<style>
    .content-wrapper,.content,.box-body,.box{
        min-height: 1000px; 
    }
    .main-sidebar, .left-side{
        z-index: 111;
    }
    .modal-admin {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 890;
        background: rgba(0, 0, 0, 0.43);
        left: 0;
        top: 0;
        visibility: hidden;
        opacity: 0;
        transition: 0.7s;

    }
    .modal-admin.popup{
        visibility: visible;
        max-height: 100%;
        opacity: 1;
        transition: 0.7s;
        overflow-y: scroll;
    }
    .modal-admin .modal-content {
        margin: 2% auto 2% auto;
        margin-top: 92px;

    }
    .setting-box2 .tab-content ul li {

        text-align: center;
        width: 25% !important;
    </style>
    <script>
        $(document).ready(function () {
            $('.view-i').click(function () {
                var id = $(this).attr('data-id');
                $('#box' + id).addClass('popup');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.close').click(function () {
                $('.modal-admin').removeClass('popup');
            });
        });

        function getCheckBox(id) {
            if ($('#try_new_items_with_scheduled_fixes12' + id).is(":checked")) {
                $("#optionsDIV" + id).fadeIn(300);
            } else {
                $("#optionsDIV" + id).fadeOut(300);
            }
        }
    </script>    



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
                                       
                                    </tr>


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



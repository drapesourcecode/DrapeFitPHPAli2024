<div class="content-wrapper">
    <section class="content-header">
        <h1>Subscription Batch process status</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>            
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border1">
                        <div class="col-xs-12"> 
                            <?php echo $this->Html->link($this->Html->tag('i', ' Download pdf', array('class' => 'fa fa-download')), ['action' => 'betchProcessSubcriptionPdf'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                            <?php echo $this->Html->link($this->Html->tag('i', ' Download excel', array('class' => 'fa fa-download')), ['action' => 'betchProcessSubcriptionReport'], ['escape' => false, "data-placement" => "top", "data-hint" => "Download pdf", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 12px!important;']); ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Fit number </th> 
                                    <th>Client Email</th> 
                                    <th>Client Subject</th>
                                    <th>Name</th>
                                    <th>Kid Name</th>
                                    <th>Client Status</th>
                                    <th>Support Email</th>
                                    <th>Support Subject</th>
                                    <th>Sending date time</th>
                                    <th>Support Status</th>
                                    <th>Process</th>
                                    <th>Day</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($AllUserList as $aduserlist): ?>
                                    <tr>
                                        <td><?php echo $this->Custom->paymentProfileCount($aduserlist->fit_number); ?></td>
                                        <td><?php echo $aduserlist->email; ?></td>
                                        <td><?php echo @$aduserlist->subject; ?></td>
                                        <td><?php echo $aduserlist->name; ?></td>
                                        <td><?php echo @$aduserlist->kid_name; ?></td>
                                        <td><?php echo @$aduserlist->status; ?></td>
                                        <td><?php echo $aduserlist->support_email; ?></td>
                                        <td><?php echo $aduserlist->support_subject; ?></td>
                                        <td><?php echo @$aduserlist->sending_datetime; ?></td>
                                        <td><?php echo @$aduserlist->support_status; ?></td>
                                        <td>
                                            <?php echo @$aduserlist->process; ?>
                                            <br/>
                                            <?php if ($aduserlist->process == 'boxUpdate()') { ?>
                                                Payment message:<?php echo $aduserlist->payment_message; ?>
                                                Transctions id:<?php echo $aduserlist->transctions_id; ?>
                                            <?php } ?>
                                            <?php if ($aduserlist->process == 'boxUpdateKid()') { ?>
                                                Payment message:<?php echo $aduserlist->payment_message; ?>
                                                Transctions id:<?php echo $aduserlist->transctions_id; ?>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo @$aduserlist->day; ?></td>
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



<style type="text/css">
    .modal-body .form-horizontal .col-sm-2,
    .modal-body .form-horizontal .col-sm-10 {
        width: 100%
    }

    .modal-body .form-horizontal .control-label {
        text-align: left;
    }
    .modal-body .form-horizontal .col-sm-offset-2 {
        margin-left: 15px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?=
            __('Giftcard  mail');
            ?>
        </h1>

        <ol class="breadcrumb">
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box-header">
                            <h3 class="box-title">Gift card Listing</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>To Name</th>
                                    <th>From name</th>
                                    <th>From email</th>
                                    <th>Gift code</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>Created Date</th>
                                    <th>Deli status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (@$giftdetails as $list): ?>
                                    <tr>
                                        <td style="text-align:  left;"> <?php echo $list->to_name; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->from_name; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->from_email; ?></td>
                                        <td style="text-align:  left;"> <?php echo $list->giftcode; ?></td>
                                        <td style="text-align:  left;"> <?php echo "$" . number_format($list->price, 2); ?></td>
                                        <td style="text-align:  left;"> <?php echo date('d M,y', strtotime($list->expiry_date)); ?></td>
                                        <td style="text-align:  left;"> <?php echo date('d M,y', strtotime($list->created_dt)); ?></td>
                                        <td style="text-align:  left;"><?php
                                            if ($list->mail_status == 1) {
                                                echo "Yes deliveryed";
                                            } else {
                                                echo "No delivery";
                                            }
                                            ?></td>
                                        <td style="text-align: center;">
                                            <?php if ($list->is_active == 1) { ?>
                                                <a href="javascript:void(0)"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Used", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0)"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Not use", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'viewGiftcardMail/' . $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Gift code send to user", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?php // $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => '#'], ['escape' => false, "data-placement" => "top", "data-hint" => "Gift code send to user", 'class' => 'btn btn-info  hint--top  hint ajaxBtn', 'style' => 'padding: 0 7px!important;', 'data-toggle' => 'modal', 'data-target' => '#myModalNorm-' . $list->id]); ?>


                                            <?php
                                            if ($list->mail_status == 1) {
                                                echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-check text-success')), ['action' => 'giftcard_mail/#'], ['escape' => false, "data-placement" => "top", "title" => "Delivered", 'class' => 'btn btn-default  hint--top  hint', 'style' => 'padding: 0 7px!important;']);
                                            } else {
                                                echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'setGiftCardDelivered/' . $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Click to set delivered", 'class' => 'btn btn-info  hint--top  hint', 'style' => 'padding: 0 7px!important;']);
                                            }
                                            ?>


                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deletegiftcard', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete product", 'class' => 'btn btn-danger  hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => 'Are you sure you want to delete this?']); ?>


                                        </td>
                                    </tr>
    <!--                                <div class="modal fade" id="myModalNorm-<?php echo $list->id; ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel-<?php echo $list->id; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content gift-card-content">

                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="modal-title">
                                                        Card holder name:-<?php echo @$list->card_holder_name; ?>
                                                    </h4>
                                                    <h4 class="modal-title" >
                                                        Card number: <?php echo @$list->card_number; ?>
                                                    </h4>
                                                    <h4 class="modal-title">
                                                        Card expire date:  <?php echo @$list->expire_date; ?>
                                                    </h4>
                                                    <h4 class="modal-title">
                                                        Card cvv:  <?php echo @$list->cvv; ?>
                                                    </h4>
                                                    <h4 class="modal-title">
                                                        Postal_code :  <?php echo @$list->postal_code; ?>
                                                    </h4>
                                                    <h4 class="modal-title">
                                                        Message :  <?php echo @$list->msg; ?>
                                                    </h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>-->

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
</div>




<script>
    $(document).ready(function() {
        $('#datepicker').datepicker().on('changeDate', function(e) {
            $(this).focus();
        });
        $("#datepicker1").datepicker().on('changeDate', function(e) {
            $(this).focus();
        });

    });

</script>

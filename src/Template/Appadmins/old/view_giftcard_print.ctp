<script src="<?= HTTP_ROOT; ?>js/jQuery.print.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?=
            __('Giftcard');
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
                            <span class="btn btn-info" onclick="/*printDiv();*/$('#card_gift').print();">Print</span>
                        </div>
                        <div id="card_gift">
                            <style class="cp-pen-styles">
                                *, *:before, *:after {
                                    box-sizing: border-box;
                                }


                                .product-card {
                                    background-color: #fdfefe;
                                    max-width: 550px;
                                    min-height: 400px;
                                    margin: 0 auto;
                                    margin-top: 50px;
                                    margin-bottom: 150px;
                                    box-shadow: 8px 12px 30px #b3b3b3;
                                    color: #919495;
                                    font-weight: normal;
                                    text-align: left;
                                    font-size: 18px;
                                    position: relative;
                                }

                                .product-details {
                                    width: 53%;
                                    float: left;
                                    height: 100%;
                                    padding: 30px;
                                    padding-top: 5px;
                                }
                                .product-details h1 {
                                    color: #333;
                                    font-family: "Pacifico", cursive;
                                    margin-bottom: 35px;
                                }
                                .product-details button {
                                    width: 150px;
                                    height: 50px;
                                    margin-top: 20px;
                                    background-color: #337AB7;
                                    border-radius: 0;
                                    color: #fff;
                                    box-shadow: 2px 2px 7px #173853;
                                }
                                .product-details button:hover, .product-details button:active, .product-details button:focus {
                                    color: #fff;
                                }

                                .product-image {
                                    position: absolute;
                                    right: 0px;
                                }
                                .product-image2 {
                                    position: absolute;
                                    left: 0px;
                                    bottom: 0;
                                }
                                .product-image img {
                                    max-width: 350px;
                                }

                                @media (max-width: 700px) {
                                    .product-card {
                                        margin-left: 20px;
                                        margin-right: 20px;
                                    }
                                }
                                @media (max-width: 540px) {
                                    .product-card {
                                        overflow: hidden;
                                        margin-bottom: 50px;
                                    }

                                    .product-details {
                                        width: 60%;
                                        z-index: 1;
                                    }

                                    .product-image {
                                        width: 100%;
                                        left: 50%;
                                        top: -30px;
                                    }
                                }
                                @media (max-width: 440px) {
                                    .product-details {
                                        width: 65%;
                                    }
                                }
                                @media (max-width: 365px) {
                                    .product-details {
                                        width: 80%;
                                        position: relative;
                                        color: #333;
                                        background-color: rgba(255, 255, 255, 0.7);
                                    }
                                }

                                ul.list_unstyled_ul {
                                    margin-bottom: 0;
                                    list-style: none;
                                }
                                .list_unstyled_ul li a {
                                    color: #666;
                                    font-size: 12px;
                                    text-transform: uppercase;
                                    line-height: 30px;
                                    display: block;
                                    text-decoration: none; }
                                .list_unstyled_ul li:last-child a {
                                    border-bottom: 0; }
                                </style>
                                <div class="product-card">
                                <div class="product-image">
                                    <img src="<?= HTTP_ROOT; ?>img/logo.png">
                                </div>
                                <div style="width:100%;float:left;">
                                    <div class="product-details">
                                        <legend style="margin:0px; margin-bottom: 5px;">To</legend>
                                        <ul class="list_unstyled_ul">
                                            <li><a href="" title="">To Name : <span class="pull-right"><?php echo $giftdetails->to_name; ?></span></a></li>
                                           
                                        </ul>
                                    </div>
                                    <button style="float: left;width: 100%;background: #000000a1;margin-bottom: 30px;font-size: 16px;color: #fff;font-weight: 600;border: none;padding: 3px;"><?= $giftdetails->giftcode; ?></button>
                                </div>
                                <div style="float: left !important;width: 100%;">
                                    <div class="product-image2">
                                        <ul class="list_unstyled_ul">
                                            <li><a href="" title=""><span class="pull-right"><strong> Message:-<?php echo nl2br($giftdetails->msg); ?></strong></span></a></li>
                                            <li><a href="" title="">Amount : <span class="pull-right">$ <?php echo number_format($giftdetails->price, 2); ?>/-</span></a></li>
                                            <li><a href="" title="">Expire on : <span class="pull-right"><?php echo date_format($giftdetails->expiry_date, 'd F, Y'); ?></span></a></li>
                                        </ul>
                                    </div>
                                    <div style="float: right !important;width: 49%;padding-right: 25px">
                                        <legend style="margin: 5px;">From</legend>
                                        <ul class="list_unstyled_ul">
                                            <li><a href="" title="">Name : <span class="pull-right"><?php echo $giftdetails->from_name; ?></span></a></li>
                                            <li><a href="" title="">From Email : <span class="pull-right"><?php echo $giftdetails->from_email; ?></span></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function printDiv()
    {

//        var divToPrint = document.getElementById('card_gift');
//
//        var newWin = window.open('', 'Print-Window');
//
//        newWin.document.open();
//
//        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
//
//        newWin.document.close();
//
//        setTimeout(function() {
//            newWin.close();
//        }, 10);

//        var divToPrint = document.getElementById("card_gift");
//        newWin = window.open("");
//        newWin.document.write(divToPrint.outerHTML);
//        newWin.print();
//        newWin.close();

//        var printBlock = $(this).parents('#card_gift').siblings('#card_gift');
//        printBlock.hide();
//        window.print();
//        printBlock.show();


//        var printContents = document.getElementById("card_gift").innerHTML;
//        var originalContents = document.body.innerHTML;
//        document.body.innerHTML = printContents;
//        window.print();
//        document.body.innerHTML = originalContents;

    }
</script>
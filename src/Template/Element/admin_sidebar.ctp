<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
?>
<style>
    .main-sidebar {
        background-color: #222d32 !important;
    }
</style>
<aside class="main-sidebar">
    <section class="sidebar">e
        <ul class="sidebar-menu">

            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'index') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/index">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if ($type == 1) { ?>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'influencer') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/influencer"><i class="fa fa-sitemap"></i> <span>Influencer</span></a></li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'salesNotApplicableState') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/salesNotApplicableState"><i class="fa fa-money"></i> <span>Manage Sales tax</span></a></li>


                <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'createAdmin' || $paramAction == 'viewAdmin')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Employee</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_admin"><i class="fa  fa-user"></i> Create Employee</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_admin"><i class="fa  fa-eye"></i> View Employee</a></li>
                    </ul>
                </li>
               
                <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'cmsPage' || $paramAction == 'editpages')) { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/cms_page"><i class="fa  fa-file-text"></i> <span>CMS pages</span></a>
                </li>



                <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'socialMedia') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/social_media"><i class="fa  fa-link"></i>Social media</a></li>


                <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'customerList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/customer_list"><i class="fa  fa-clone"></i> Customer Not Paid List</a></li>
                
               


            <?php } ?>
                
                <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'readyToShipList' || $paramAction == 'currentPaidList' || $paramAction == 'declinedProducts' || $paramAction == 'currentPaidList')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Client process queue</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        
                        <?php if (in_array($type, [9])) { ?>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'readyToShipList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/ready_to_ship_list"><i class="fa  fa-clone"></i> Ready to Ship Queue</a></li>
                        <?php } ?>
                        
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'currentPaidList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/current_paid_list"><i class="fa  fa-clone"></i> Current Paid List Queue </a></li>
                            
                            <?php if (in_array($type, [1])) { ?>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'readyToShipList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/ready_to_ship_list"><i class="fa  fa-clone"></i> Ready to Ship Queue</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'supportQueueList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/support_queue_list"><i class="fa  fa-clone"></i>Support Queue</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'returnQueueList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/return_queue_list"><i class="fa  fa-clone"></i>Return Queue</a></li>
                            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'declinedProducts') { ?> active <?php } ?>">
                                <a href="<?php echo HTTP_ROOT ?>appadmins/declined_products">
                                    <i class="fa fa-archive"></i> <span> Decline/Recovery Queue </span>
                                </a>
                            </li>
                             <?php } ?>

                        <?php if (in_array($type, [9])) { ?>
                            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'declinedProducts') { ?> active <?php } ?>">
                                <a href="<?php echo HTTP_ROOT ?>appadmins/declined_products">
                                    <i class="fa fa-archive"></i> <span> Decline/Recovery Queue </span>
                                </a>
                            </li>
                        <?php } ?>
                            
                    </ul>
                </li>


            <?php if (in_array($type, [1, 3])) { ?>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'exchangeProductsList') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/exchange_products_list">
                        <i class="fa fa-exchange"></i> <span>Exchange products</span>
                    </a>
                </li>
            <?php } ?>

           
            
            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewUsers') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_users"><i class="fa  fa-clone"></i> Customer Paid List</a></li>



            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'previousworklist') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/previousworklist"><i class="fa  fa-tasks"></i> Previous Work list</a></li>

 
           




            <?php if (in_array($type, [1, 7])) { ?>
                <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'scanProduct') { ?> active <?php } ?>">
                    <a href="<?= h(HTTP_ROOT) ?>appadmins/scan_product">
                        <i class="fa  fa-eye"></i> <span>Scan Product</span>
                    </a>
                </li>
            <?php } ?>


            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'profile') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/profile"><i class="fa fa-wrench"></i> <span>Setting</span></a>
            </li>

            <?php if ($type == 1) { ?>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'promocode') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/promocode"><i class="fa fa-code"></i> <span>Promocode Setting</span></a>
                </li>

                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'offerPromocode') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/offer_promocode"><i class="fa fa-code"></i> <span>Offer promocode</span></a>
                </li>

                <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'giftcardEmail' || $paramAction == 'giftcardMail' || $paramAction == 'giftcard')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Gift card</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'giftcard') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/giftcard"><i class="fa  fa-user"></i> Gift card from admin</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'giftcardEmail') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/giftcard_email"><i class="fa  fa-user"></i> Gift card Email</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'giftcardMail') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/giftcard_mail"><i class="fa  fa-user"></i> Gift card mail</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'giftcardPrint') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/giftcard_print"><i class="fa  fa-user"></i> Gift card print</a></li>
                    </ul>
                </li>




               
            <?php } ?>


            <?php if (in_array($type, [1, 9])) { ?>

                <li class="treeview <?php if (($paramController == 'Appadmins') && ($paramAction == 'blockCustomerList' || $paramAction == 'junkCustomerList' || $paramAction == 'fundrefund' || $paramAction == 'cancellationList')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span> Customer Report</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">



                        <?php if (in_array($type, [1, 9])) { ?>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'cancellationList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/cancellation_list"><i class="fa  fa-eye"></i> Subscription Cancellation</a></li>

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'blockCustomerList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/block_customer_list"><i class="fa  fa-eye"></i> Block Customer List</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'junkCustomerList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/junk_customer_list"><i class="fa  fa-eye"></i> Junk User List</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'fundrefund') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/fundrefund"><i class="fa  fa-eye"></i> Payment Refund</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'fundrefundlist') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/fundrefundlist"><i class="fa  fa-eye"></i> Payment Refundlist</a></li>
                        <?php } ?>


                        <?php if (in_array($type, [1])) { ?>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'clientManualCharge') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/clientManualCharge"><i class="fa  fa-dollar"></i>Charge Client</a></li>
                        <?php } ?>


                    </ul>
                </li>
            <?php } ?>


            <?php if (in_array($type, [1])) { ?>

                <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'addCareer' || $paramAction == 'viewCareer')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Career</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'addCareer') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/add_career"><i class="fa  fa-user"></i> Add Career</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewCareer') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_career"><i class="fa  fa-eye"></i> View Career</a></li>
                    </ul>
                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'blogCategory' || $paramAction == 'createBlog' || $paramAction == 'blogTag')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-th"></i><span>Manage Blog</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'blogCategory') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/blog_category"><i class="fa  fa-chevron-right"></i> Category</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createBlog') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_blog"><i class="fa  fa-chevron-right"></i> Blog</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'blogTag') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/blog_tag"><i class="fa  fa-chevron-right"></i> Blog Tag</a></li>
                    </ul>
                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'news') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/news"><i class="fa fa-newspaper-o"></i> <span>News</span></a>
                </li>

                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'prediction') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/prediction"><i class="fa fa-line-chart"></i> <span>Prediction</span></a></li>

            <?php } ?>


            <?php if (in_array($type, [1, 9])) { ?>
                <li class="treeview <?php if (($paramController == 'Appadmins') && ($paramAction == 'allcustomer' || $paramAction == 'notpaidlist' || $paramAction == 'autocheckoutlist' || $paramAction == 'reportpaidlist' || $paramAction == 'previouslist' || $paramAction == 'styleistwise' || $paramAction == 'numberstate' || $paramAction == 'subscriptions' || $paramAction == 'betchprocess' || $paramAction == 'betch_process_subscription' || $paramAction == 'clientsBirthday' || $paramAction == 'notCheckedOutCustomer' || $paramAction == 'returnNotProcessed' || $paramAction == 'checkedOutWithProductDetail' || $paramAction == "currentlyTotalProductInInventory" || $paramAction == 'monthlyProductShipped' || $paramAction == "monthlyClientConsumed" || $paramAction == "monthlyProductNotReturned" || $paramAction == "monthlyProductDeclined" || $paramAction == "productAssignedButNotFinalized")) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Report</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">



                        <?php if (in_array($type, [1, 9])) { ?>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'autocheckoutlist') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/autocheckoutlist"><i class="fa  fa-eye"></i>Auto Checkout List</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'allcustomer') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/allcustomer"><i class="fa  fa-eye"></i> All customers</a></li>

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'notpaidlist') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/notpaidlist"><i class="fa  fa-eye"></i>Customer Not Paid List</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'reportpaidlist') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/reportpaidlist"><i class="fa  fa-eye"></i>Customer Paid List</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'previousworklistreports') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/previousworklistreports"><i class="fa  fa-eye"></i> Previous List</a></li>

                        <?php } ?>


                        <?php if (in_array($type, [1])) { ?>


                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'styleistwise') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/styleistwise"><i class="fa  fa-eye"></i> Stylist wise</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'numberstate') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/numberstate"><i class="fa  fa-eye"></i> State Wise</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'subscriptions') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/subscriptions"><i class="fa  fa-eye"></i>Subscriptions</a></li>


                        <?php } ?>


                        <?php if (in_array($type, [1, 9])) { ?>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'betchprocess') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/betchprocess"><i class="fa  fa-eye"></i>Batch process reports</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'betch_process_subscription') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/betch_process_subscription"><i class="fa  fa-eye"></i>Batch process Subscription</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'clientsBirthday') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/clients_birthday"><i class="fa  fa-eye"></i>Clients Birthday</a></li>

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'notCheckedOutCustomer') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/not_checked_out_customer"><i class="fa  fa-eye"></i>Not Checked out Customer</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'returnNotProcessed') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/return_not_processed"><i class="fa  fa-eye"></i>Return Not Processed</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'checkedOutWithProductDetail') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/checked_out_with_product_detail"><i class="fa  fa-eye"></i>CheckedOut w/ Product Detail</a></li>

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'productAssignedButNotFinalized') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/productAssignedButNotFinalized"><i class="fa  fa-eye"></i>Product assigned but not Finalized</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'listOfProductsNotReturned') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/listOfProductsNotReturned"><i class="fa  fa-eye"></i>List Of Products Not Returned</a></li>
                        <?php } ?>


                        <?php if (in_array($type, [1])) { ?>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'monthlySales') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/monthlySales"><i class="fa  fa-eye"></i>Monthly Sales</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'monthlyLoss') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/monthlyLoss"><i class="fa  fa-eye"></i>Monthly Loss</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'monthlyRevenue') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/monthlyRevenue"><i class="fa  fa-eye"></i>Monthly Revenue</a></li>
                            <!--<li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'inventoryReport') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/inventoryReport"><i class="fa  fa-eye"></i>Inventory Report</a></li>-->

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'currentlyTotalProductInInventory') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/currentlyTotalProductInInventory"><i class="fa  fa-eye"></i>Total products in inventory</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'monthlyProductShipped') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/monthlyProductShipped"><i class="fa  fa-eye"></i>Monthly product shipped[inventory]</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'monthlyClientConsumed') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/monthlyClientConsumed"><i class="fa  fa-eye"></i>Monthly client consumed</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'monthlyProductNotReturned') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/monthlyProductNotReturned"><i class="fa  fa-eye"></i>Monthly product not returned</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'monthlyProductDeclined') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/monthly_product_declined"><i class="fa  fa-eye"></i>Monthly product declined</a></li>

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'shippedFinalizeSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/shippedFinalizeSummary"><i class="fa  fa-eye"></i>Product - finalize Summary</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'shippedFinalizeDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/shippedFinalizeDetails"><i class="fa  fa-eye"></i>Product - finalize Details</a></li>

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'clientCheckedoutSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/clientCheckedoutSummary"><i class="fa  fa-eye"></i>Client - checkedout Summary</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'clientCheckedoutDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/clientCheckedoutDetails"><i class="fa  fa-eye"></i>Client - checkedout Details</a></li>


                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'notCheckedoutSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/notCheckedoutSummary"><i class="fa  fa-eye"></i>Not Checkedout Summary</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'notCheckedoutDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/notCheckedoutDetails"><i class="fa  fa-eye"></i>Not Checkedout Details</a></li>

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'checkedoutReturnSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/checkedoutReturnSummary"><i class="fa  fa-eye"></i>Checkedout Return Summary</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'checkedoutReturnDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/checkedoutReturnDetails"><i class="fa  fa-eye"></i>Checkedout Return Details</a></li>

                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'checkedoutNotReturnSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/checkedoutNotReturnSummary"><i class="fa  fa-eye"></i>Checkedout Not Return Summary</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'checkedoutNotReturnDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/checkedoutNotReturnDetails"><i class="fa  fa-eye"></i>Checkedout Not Return Details</a></li>


                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'productDeclinedSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/productDeclinedSummary"><i class="fa  fa-eye"></i>Product Declined Summary</a></li>
                            <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'productDeclinedDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/productDeclinedDetails"><i class="fa  fa-eye"></i>Product Declined Details</a></li>

                        <?php } ?>
                    </ul>
                </li>

            <?php } ?>

            <?php if (in_array($type, [1])) { ?>
                <li class="treeview <?php if (($paramController == 'Appadmins') && in_array($paramAction, ['mstProductFinaShipSummaryReport', 'mstProductFinaShipDetailsReport', 'mstCheckedoutDetails', 'mstCheckedoutSummary', 'mstNotReturnSummary', 'mstNotReturnDetails', 'changeAutoCheckoutDate', 'mstProductStylingFeeReport'])) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Master Summary Report</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">


                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstProductFinaShipSummaryReport') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstProductFinaShipSummaryReport"><i class="fa  fa-eye"></i>Products Finalized / Shipped Summary Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstProductFinaShipDetailsReport') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstProductFinaShipDetailsReport"><i class="fa  fa-eye"></i>Products Finalized / Shipped Details Report</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstCheckedoutSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstCheckedoutSummary"><i class="fa  fa-eye"></i>Products checkout Summary Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstCheckedoutDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstCheckedoutDetails"><i class="fa  fa-eye"></i>Products checkout Details Report</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstNotCheckedoutSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstNotCheckedoutSummary"><i class="fa  fa-eye"></i>Products Not Checkout Summary Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstNotCheckedoutDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstNotCheckedoutDetails"><i class="fa  fa-eye"></i>Products Not Checkout Details Report</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstNotReturnSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstNotReturnSummary"><i class="fa  fa-eye"></i>Products Not Return Summary Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstNotReturnDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstNotReturnDetails"><i class="fa  fa-eye"></i>Products Not Return Details Report</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstPrdRtnProcSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstPrdRtnProcSummary"><i class="fa  fa-eye"></i>Products return processed Summary Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstPrdRtnProcDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstPrdRtnProcDetails"><i class="fa  fa-eye"></i>Products return processed Details Report</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstProductStylingFeeReport') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstProductStylingFeeReport"><i class="fa  fa-eye"></i>Product Styling Fee Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'changeAutoCheckoutDate') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/changeAutoCheckoutDate"><i class="fa  fa-eye"></i>Change Auto Checkout Date</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstPrdExgProcSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstPrdExgProcSummary"><i class="fa  fa-eye"></i>Products Exchange processed Summary Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstPrdExgProcDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstPrdExgProcDetails"><i class="fa  fa-eye"></i>Products Exchange processed Details Report</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstPrdNotRtnExgProcSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstPrdNotRtnExgProcSummary"><i class="fa  fa-eye"></i>Products Not Return Exchange Summary Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstPrdNotRtnExgProcDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstPrdNotRtnExgProcDetails"><i class="fa  fa-eye"></i>Products Not Return Exchange Details Report</a></li>

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstPrdDclnProcSummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstPrdDclnProcSummary"><i class="fa  fa-eye"></i>Products decline Summary Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mstPrdDclnProcDetails') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mstPrdDclnProcDetails"><i class="fa  fa-eye"></i>Products decline Details Report</a></li>



                    </ul>
                </li>



                <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'mspPreviousWorkList' || $paramAction == 'mspCustomerPaidList')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Master Report :- Support Purpose</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mspCustomerPaidList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mspCustomerPaidList"><i class="fa  fa-user"></i> Customer Paid List</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'mspPreviousWorkList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/mspPreviousWorkList"><i class="fa  fa-user"></i> Previous Work List </a></li>
                    </ul>
                </li>

            <?php } ?>

            <?php if (in_array($type, [1])) { ?>
                <li class="treeview <?php if (($paramController == 'Appadmins') && ($paramAction == 'defaulterCustomerList' || $paramAction == 'profitLossReport')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Finance Report</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'defaulterCustomerList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/defaulterCustomerList"><i class="fa  fa-eye"></i>Defaulter Customer List</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'profitLossReport') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/profit_loss_report"><i class="fa  fa-eye"></i>Profit Loss</a></li>
                    </ul>
                </li>

            <?php } ?>

            <?php if (in_array($type, [1, 3])) { ?>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'predictionFuture') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/prediction_future">
                        <i class="fa fa-exchange"></i> <span>Order Delivery Predictions</span>
                    </a>
                </li>
            <?php } ?>


            <li><a style="color: red;" href="<?= h(HTTP_ROOT) ?>appadmins/logout"><i class="fa fa-key"></i> <span>Logout</span></a></li>

        </ul>
    </section>
</aside>
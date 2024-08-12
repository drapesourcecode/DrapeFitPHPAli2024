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
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'index') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/index">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if ($type == 1) {  ?>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'boxShipped') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/boxShipped/"><i class="fa fa-return"></i> <span>Box shipped List</span></a>
            </li>
            <?php } ?>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'scanProduct') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/scanProduct/"><i class="fa fa-return"></i> <span>Return Process Queue</span></a>
            </li>
            <?php if ($type == 1) { /* ?>
                <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'createStaff' || $paramAction == 'viewStaff')) { ?> active <?php } ?>">
                    <a href="javascript:;"><i class="fa  fa-user"></i><span>Brands</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createStaff') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_staff"><i class="fa  fa-user"></i> Create  Brand</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewStaff') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_staff"><i class="fa  fa-eye"></i> View  Brand</a></li>
                    </ul>
                </li>


                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'manualReturnProductList') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/manual_return_product_list" ><i class="fa fa-product-hunt"></i> <span>Manual return products</span></a>
                </li>

            <?php
             */
            ?>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'task') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/task"><i class="fa fa-tasks"></i> <span>Tasks</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'addProduct') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/add_product"><i class="fa fa-product-hunt"></i> <span>Product</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'merchantProductList') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/merchant_product_list"><i class="fa fa-product-hunt"></i> <span>Merchant Product list</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'productList') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/product_list"><i class="fa fa-product-hunt"></i> <span>Inventory Product list</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'productScanUpdate') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/product_scan_update"><i class="fa fa-product-hunt"></i> <span>Product Quantity Scan & Update</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'generateBarcode') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/generate_barcode/"><i class="fa fa-barcode"></i> <span>Generate Barcode</span></a>
            </li>
            <?php
                
            } else { ?>
               

                <!--                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'rework') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/rework" ><i class="fa fa-repeat"></i> <span>Rework</span></a>
                </li>-->
            <?php } ?>

            

            <?php if ($type == 1) { ?>
                <!-- <li class="treeview <?php if ($paramController == 'Appadmins' && (($paramAction == 'productType') || ($paramAction == 'rackSet'))) { ?> active <?php } ?>">
                    <a href="javascript:void(0)" ><i class="fa fa-cubes"></i> <span>Manage Category</span></a>
                    <ul class="treeview-menu">

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'productType') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/product_type"><i class="fa fa-plus"></i>Product Category</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'rackSet') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/rack_set"><i class="fa fa-plus"></i>Product Sub-category</a></li>
                    </ul>

                </li> -->

                <li class="treeview <?php if ($paramController == 'Appadmins' && (($paramAction == 'inventoryReport') || ($paramAction == 'inventorySummary'))) { ?> active <?php } ?>">
                    <a href="javascript:void(0)"><i class="fa fa-cubes"></i> <span>Report</span></a>
                    <ul class="treeview-menu">

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'inventoryReport') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/inventoryReport"><i class="fa  fa-eye"></i>Inventory Report</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'inventorySummary') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/inventorySummary"><i class="fa  fa-eye"></i>Inventory Summary</a></li>
                    </ul>

                </li>

                <!-- <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'inColor') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/in_color" ><i class="fa fa-tint"></i> <span>Manage color</span></a>
                </li> -->

                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'profile') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/profile"><i class="fa fa-wrench"></i> <span>Setting</span></a>
                </li>
            <?php } ?>

            <!-- <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'missingFields') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/missing_fields" ><i class="fa fa-spinner"></i> <span>Missing fields</span></a>
                </li> -->


            <?php /* ?><li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'addProduct' || $paramAction == 'viewProduct')) { ?> active <?php } ?>">
              <a href="javascript:;"><i class="fa fa-product-hunt"></i><span>Product</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'addProduct') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/add_product"><i class="fa fa-plus"></i> Add Product</a></li>
              <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewProduct') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_product"><i class="fa  fa-eye"></i> View Product</a></li>
              </ul>
              </li><?php */ ?>
            <!--                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'promocode') { ?> active <?php } ?>">
                            <a href="<?php echo HTTP_ROOT ?>appadmins/empty_all_tables" ><i class="fa fa-archive"></i> <span>Empty all tables</span></a>
                        </li>-->


            <?php /* } ?>
              <?php if ($type == 3) { ?>
              <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'addProduct') { ?> active <?php } ?>">
              <a href="<?php echo HTTP_ROOT ?>appadmins/add_product" ><i class="fa fa-product-hunt"></i> <span>Product</span></a>
              </li>
              <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'productList') { ?> active <?php } ?>">
              <a href="<?php echo HTTP_ROOT ?>appadmins/product_list" ><i class="fa fa-product-hunt"></i> <span>Product list</span></a>
              </li>
              <?php } */ ?>

            
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'returnQueList') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/returnQueList/"><i class="fa fa-return"></i> <span>Return Order List</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'returnProductList') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/return_product_list/"><i class="fa fa-return"></i> <span>Return Products List</span></a>
            </li>

            <li><a style="color: red;" href="<?= h(HTTP_ROOT) ?>appadmins/logout"><i class="fa fa-key"></i> <span>Logout</span></a></li>
        </ul>
    </section>
</aside>
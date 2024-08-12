<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
?>
<style>
    .main-sidebar{
        background-color: #222d32!important;
    }
</style>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'index') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/index" >
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if ($type == 1) { ?> 
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'profile') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/profile" ><i class="fa fa-wrench"></i> <span>Setting</span></a>
                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'productCategory') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/product_category" ><i class="fa fa-cubes"></i> <span>Manage product category</span></a>
                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'product') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/product" ><i class="fa fa-product-hunt"></i> <span>Manage product</span></a>
                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'productDeduct') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/productDeduct" ><i class="fa fa-product-hunt"></i> <span>Product used details</span></a>
                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'productDeductSummary') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/productDeductSummary" ><i class="fa fa-product-hunt"></i> <span>Product used summary</span></a>
                </li>
            <?php } ?>

            <li><a style="color: red;" href="<?= h(HTTP_ROOT) ?>appadmins/logout"><i class="fa fa-key"></i> <span>Logout</span></a></li>
        </ul>
    </section>
</aside>
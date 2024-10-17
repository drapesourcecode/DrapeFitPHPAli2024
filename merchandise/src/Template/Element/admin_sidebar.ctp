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

            <?php /*
            <li class="treeview <?php if ($paramController == 'Appadmins' && in_array($paramAction, ['createEmployee', 'viewEmployee'])) { ?> active <?php } ?>">
                <a href="javascript:;"><i class="fa  fa-users"></i><span>Employee</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createEmployee') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_employee"><i class="fa  fa-genderless"></i> Create Employee</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewEmployee') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_employee"><i class="fa  fa-genderless"></i> View Employee</a></li>
                </ul>
            </li>
            */ ?>

            <li class="treeview <?php if ($paramController == 'Appadmins' && (in_array($paramAction, ['createStaff', 'viewStaff']))) { ?> active <?php } ?>">
                <a href="javascript:;"><i class="fa  fa-square-o""></i><span>Brand</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createStaff') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_staff"><i class="fa  fa-genderless"></i> Brand Connection</a></li>
                    
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewStaff') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_staff"><i class="fa  fa-genderless"></i> View Brand Connection </a></li>
                    
                </ul>
            </li>

            <li class="treeview <?php if ($paramController == 'Appadmins' && (in_array($paramAction, ['prediction', 'nxtPrediction', 'nxtNxtPrediction']))) { ?> active <?php } ?>">
                <a href="javascript:;"><i class="fa  fa-sliders"></i><span>On Demand & Trends</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && in_array($paramAction, ['prediction', 'nxtPrediction', 'nxtNxtPrediction'])) { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/prediction"><i class="fa  fa-genderless"></i> Prediction list</a></li>
                   
                </ul>
            </li>

         

            
            
            <li class="treeview <?php if ($paramController == 'Appadmins' && (in_array($paramAction, ['existingBrandPo','newBrandPo']))) { ?> active <?php } ?>">
                <a href="javascript:void(0);"><i class="fa  fa-money"></i><span>Merchandise PO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'existingBrandPo') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/existingBrandPo"><i class="fa  fa-genderless"></i>Existing Customer PO</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'newBrandPo') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/newBrandPo"><i class="fa  fa-genderless"></i>Customer PO</a></li>
                </ul>
            </li>

            <li class="treeview <?php if ($paramController == 'Appadmins' && (($paramAction == 'productType') || ($paramAction == 'rackSet') )) { ?> active <?php } ?>">
                    <a href="javascript:void(0)" ><i class="fa fa-cubes"></i> <span>Manage Category</span></a>
                    <ul class="treeview-menu">

                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'productType') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/product_type"><i class="fa fa-plus"></i>Product Category</a></li>
                        <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'rackSet') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/rack_set"><i class="fa fa-plus"></i>Product Sub-category</a></li>
                    </ul>

                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'inColor') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/in_color" ><i class="fa fa-tint"></i> <span>Manage color</span></a>
                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'inSize') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/in_size" ><i class="fa fa-tint"></i> <span>Manage Size</span></a>
                </li>
                <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'missingFields') { ?> active <?php } ?>">
                    <a href="<?php echo HTTP_ROOT ?>appadmins/missing_fields" ><i class="fa fa-spinner"></i> <span>Missing fields</span></a>
                </li>

            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'index') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/"><i class="fa fa-gears"></i> <span>Setting</span></a></li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'addVariantProduct') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/add_variant_product"><i class="fa fa-gears"></i> <span>Add Product Variants</span></a></li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'variantProductList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/variant_product_list"><i class="fa fa-gears"></i> <span>Variant Product List</span></a></li>
            

            <li><a style="color: red;" href="<?= h(HTTP_ROOT) ?>appadmins/logout"><i class="fa fa-key"></i> <span>Logout</span></a></li>
        </ul>
    </section>
</aside>
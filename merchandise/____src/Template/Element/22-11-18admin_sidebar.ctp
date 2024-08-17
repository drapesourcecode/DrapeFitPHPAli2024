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
   <?php if($type==1){?>
   <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'createAdmin' || $paramAction == 'viewAdmin') ) { ?> active <?php } ?>">
    <a href="javascript:;"><i class="fa  fa-user"></i></i> <span>Employee</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
     <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_admin"><i class="fa  fa-user"></i> Create  Employee</a></li>
     <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_admin"><i class="fa  fa-eye"></i> View  Employee</a></li>
    </ul>
   </li>
   <?php }?>
   
<li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'viewUsers' || $paramAction == 'scanProduct')) { ?> active <?php } ?>">
    <a href="javascript:;"><i class="fa fa-archive"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
     <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewUsers') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_users"><i class="fa fa-archive"></i> View  Products</a></li>
     <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'scanProduct') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/scan_product"><i class="fa  fa-eye"></i> Scan Product</a></li>
    </ul>
   </li>
   
   

<!--   <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'cmsPage' || $paramAction == 'editpages')) { ?> active <?php } ?>">
    <a href="<?php echo HTTP_ROOT ?>appadmins/cms_page" ><i class="fa  fa-file-text"></i> <span>Users</span></a>
   </li>-->
   
   
<!--   <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'metaTitle') { ?> active <?php } ?>">
    <a href="<?php echo HTTP_ROOT ?>appadmins/meta_title" ><i class="fa fa-tags"></i> <span>SEO setup</span></a>
   </li>-->
<!--   <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'paymentGateways') { ?> active <?php } ?>">
    <a href="<?php echo HTTP_ROOT ?>appadmins/payment_gateways" ><i class="fa fa-cc-jcb"></i> <span>Payment Gateways</span></a>
   </li>-->
   <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'profile') { ?> active <?php } ?>">
    <a href="<?php echo HTTP_ROOT ?>appadmins/profile" ><i class="fa fa-wrench"></i> <span>Setting</span></a>
   </li>


   <li><a style="color: red;" href="<?= h(HTTP_ROOT) ?>users/logout"><i class="fa fa-key"></i> <span>Logout</span></a></li>

  </ul>
 </section>
</aside>
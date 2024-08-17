

<header class="main-header">
 <a href="<?php echo HTTP_ROOT; ?>appadmins" class="logo">
  <span class="logo-mini">

   <?php echo SITE_SHORT_NAME; ?>
  </span>
  <span class="logo-lg">
   <?php echo SITE_LONG_NAME ?>


  </span>
 </a>
 <nav class="navbar navbar-static-top nav-color" role="navigation">
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> </a>
            <span style="float: right;color: white;padding: 14px;">Welcome : <strong><?php

     // pj($welcome); exit;
     echo $name;

   ?> </strong> </span>


<!--            <span style="margin-left: 20px;">Last Login <?php echo $this->Custom->dateDisplayTime($this->request->session()->read('Auth.User.last_login_date')); ?></span>
   -->
 

 </nav>
</header>
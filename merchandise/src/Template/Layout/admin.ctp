<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <?php //$this->Html->meta('icon') ?>
  <!--<link rel="icon" type="image/png" sizes="16x16" href="<?php echo HTTP_ROOT; ?>img/favicon.ico">-->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/ionslider/ion.rangeSlider.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/ionslider/ion.rangeSlider.skinNice.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/bootstrap-slider/slider.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>css/datepicker.css">
  <link href= "<?php echo HTTP_ROOT; ?>css/style.css" rel="stylesheet">
  <link href= "<?php echo HTTP_ROOT; ?>css/hint.css" rel="stylesheet">
  <script src="<?php echo HTTP_ROOT; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
 </head>
 
 <body class="hold-transition skin-blue sidebar-mini">
  <?= $this->Flash->render() ?>
  <div class="wrapper">
   <?php echo $this->element('admin_header'); ?>
   <?php
  
   echo $this->element('admin_sidebar'); ?>

   <?php 
  
   echo $this->fetch('content') ;
  
   ?>
   
    <?php  echo $this->cell('Chat::direct_chat_cell'); ?>
   <?php echo $this->element('admin_footer'); ?>
    
  </div>
  <?php echo $this->Html->script(array('validator.min', 'common')); ?>
  <script src="<?php echo HTTP_ROOT; ?>bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>dist/js/app.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/fastclick/fastclick.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/chartjs/Chart.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>dist/js/demo.js"></script>
  <!--<script src="<?php echo HTTP_ROOT; ?>dist/js/pages/dashboard2.js"></script>-->
  <script src="<?php echo HTTP_ROOT; ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/ionslider/ion.rangeSlider.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/bootstrap-slider/bootstrap-slider.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/timepicker/bootstrap-timepicker.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>js/bootstrap-datepicker.js"></script>
<!--        <script src="<?php echo HTTP_ROOT; ?>plugins/iCheck/icheck.min.js"></script>-->
 </body>
</html>
<script>
 $(function () {
  $("#example1").DataTable({
       "order": [[0,'desc']]
  });
  $("#example134").DataTable({
    pageLength: 10
  });
  $('#example2').DataTable({
   "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": true,
   "info": true,
   "autoWidth": false
  });
   $('#exampleXX').DataTable({
   "paging": false,
   "lengthChange": false,
   "searching": false,
   "ordering": true,
   "info": false,
   "autoWidth": false
  });

  //iCheck for checkbox and radio inputs
//        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
//            checkboxClass: 'icheckbox_minimal-blue',
//            radioClass: 'iradio_minimal-blue'
//        });
 });
</script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>-->
<!--<script>
    var jq = $.noConflict();
    jq(document).ready(function($) {
        jq('#dob').datepicker({dateFormat: 'yy-mm-dd'});
        jq('#from').datepicker({dateFormat: 'yy-mm-dd'});
        jq('#to').datepicker({dateFormat: "yy-mm-dd"});
        jq('#billing').datepicker({dateFormat: "yy-mm-dd"});

    });


        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

</script>-->

<script>
 $(document).ready(function () {
//  $(".timepicker").timepicker({
//   showInputs: false
//  });



  $('.timepicker').timepicker({showInputs: false, timePickerIncrement: 15, format: 'h:mm'});








  $('.slider').slider();
  /* ION SLIDER */
  $("#range_5").ionRangeSlider({
   min: 0,
   max: 300,
   type: 'single',
   step: 0.1,
   postfix: " Minutes",
   prettify: false,
   hasGrid: true
  });
 });
 $('.datepicker').datepicker()


</script>

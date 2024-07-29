
<div class="content-wrapper">
    <input type="hidden" value="" id="checkboxcount"  />
    <section class="content-header">
        <?= $this->Flash->render() ?>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Home</li>

            <li class="active"><a href="<?php echo HTTP_ROOT; ?>appadmins/index">Back</a></li>

        </ol>

    </section>
    <?php  if($type==1){?>
    <section class="content1">
        <div class="row">
<!--            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" >Total number <br> of Brands</span>
                        <span class="info-box-number">  <?php echo $brands_count; ?></span>
                    </div>
                </div>
            </div>-->

            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" >Total number <br> of Brands</span>
                        <span class="info-box-number">  <?php echo $admin12; ?></span>
                    </div>
                </div>
            </div> -->
            <?php  ?><!-- <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Number <br> of Paid Female </span>
                        <span class="info-box-number"><?php echo $women_count; ?></span>
                    </div> 
                </div>
            </div>  -->

            <!-- fix for small devices only -->
            <!-- <div class="clearfix visible-sm-block"></div> -->

            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total number <br> of Paid Kid Members</span>
                        <span class="info-box-number"><?php echo $kid_count; ?></span>
                    </div> 
                </div> 
            </div> --> <?php  ?>

        </div>




    </section>
    <?php  }?>




</div>



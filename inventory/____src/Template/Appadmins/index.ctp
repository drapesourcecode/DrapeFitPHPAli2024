
<div class="content-wrapper">
    <input type="hidden" value="" id="checkboxcount"  />
    <section class="content-header">
        <?= $this->Flash->render() ?>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Home</li>

            <li class="active"><a href="<?php echo HTTP_ROOT; ?>appadmins/index">Back</a></li>

        </ol>

    </section>
    
 

    <section class="content1">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" >Total number <br> of Brands</span>
                        <span class="info-box-number">  <?php echo $brands_count; ?></span>
                    </div>
                </div>
            </div>

            
             <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Number <br> MEN Products </span>
                        <span class="info-box-number"><?php echo $men_product_count; ?></span>
                    </div> 
                </div>
            </div>  

           
             <div class="clearfix visible-sm-block"></div> 

             <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total number <br> WOMEN Products</span>
                        <span class="info-box-number"><?php echo $women_product_count; ?></span>
                    </div> 
                </div> 
            </div> 
             <div class="clearfix visible-sm-block"></div> 

             <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total number <br> BOY Products</span>
                        <span class="info-box-number"><?php echo $boy_product_count; ?></span>
                    </div> 
                </div> 
            </div> 
             <div class="clearfix visible-sm-block"></div> 

             <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa  fa-ticket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total number <br> GIRL Products</span>
                        <span class="info-box-number"><?php echo $girl_product_count; ?></span>
                    </div> 
                </div> 
            </div> 


        </div>




    </section>
   




</div>



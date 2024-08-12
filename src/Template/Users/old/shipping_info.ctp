<style>
   .address
	{
		width: 100%;
		float: left;
		text-align: center;
		display: inline-block;
	}
.address-box 
	{
		width: 50%;
		text-align: left;
		display: inline-block;
	}
.address-box, .add-address h2
	{
		margin: 15px 0px;
		padding: 0;
		text-align: left;
		font-size: 20px;
		font-weight: 700;
	}
.address-box h3
	{
		margin: 15px 0px;
		padding: 0;
		font-size: 17px;
		font-weight: 700;
		display: inline-block;
	}
.address-box p
	{
		width: 95%;
		font-size: 14px;
		font-weight: bold;
	}
.address-box label
	{
		width: 100%;
		font-size: 14px;
		margin-top: 5px;
		font-weight: 600;
		display: inline-block;
	}
.address-box select
	{
		width: 100%;
		float: left;
		background: #ececec;
		padding: 5px 10px;
		margin-bottom: 10px;
		border-radius: 3px;
		border: 1px solid #9a9a9a;
	}
.address-box input
	{
		width: 100%;
		float: left;
		margin-bottom: 5px;
		padding: 5px 10px;
		border-radius: 3px;
		border: 1px solid #9a9a9a;
	}
.address-box button 
	{
		background: #d64ade;
		cursor: pointer;
		padding: 7px 35px;
		font-size: 14px;
		border: 1px solid #d64ade;
		font-weight: 600;
		border-radius: 3px;
		color: #333;
		margin-top: 30px;
		margin-bottom: 30px;
		letter-spacing: 1px;
	}
.address-box button:hover
	{
		border: 1px solid #333;
		background: #333;
		color: #fff;
	}
.address-box, .add-address span
	{
		font-size: 14px;
		color: #4c4c4c;
		font-weight: normal;
	}
.address-box span a, 
.add-address span a
	{
		font-size: 14px;
		color: #4c4c4c;
		text-decoration: none;
	}
.add-address
	{
		width: 100%;
		float: left;
		text-align: left;
		margin: 15px 0px;
	}
.add-address ul
	{
		margin: 0;
		padding: 0;
		display: inline-block;
	}
.add-address ul li 
	{
		width: 300px;
		height: 240px;
		display: inline-block;
		float: left;
		padding: 15px 20px;
		margin-left: 30px;
		text-align: left;
		border-radius: 3px;
		border: 2px solid #ccc;
                margin-top: 20px;
	}
.add-address ul li h4
	{
		padding: 0;
		margin: 0;
		margin-bottom: 5px;
		text-align: left;
		color: #000;
		font-size: 15px;
		font-weight: 700;
		display: inline-block;
	}
.add-address ul li i
	{
		width: 100%;
		font-size: 50px;
		color: #ccc;
	}
.add-address ul li h3
	{
		margin: 15px 0px;
		padding: 0;
		color: #ccc;
		font-size: 20px;
		font-weight: 700;
		display: inline-block;
	}
.add-address ul li p
	{
		margin: 3px 0px;
		padding: 0;
		font-size: 13px;
		line-height: 19px;
		font-weight: 600;
	}
.add-address ul li span
	{
		font-size: 12px;
		margin-top: 50px;
		display: inline-block;
	}
.add-address ul li span a
	{
		color: #0089ff;
		font-size: 13px;
	}
.add-address ul li:first-child
	{
		width: 300px !important;
		height: 240px !important;
		display: inline-block !important;
		float: left !important;
		padding: 65px !important;
		margin-left: 0px !important;
		text-align: center!important;
		border-radius: 3px!important;
		border: 2px dashed #ccc !important;
                margin-top: 20px !important;
	}
.add-address ul li:nth-child(3n+1) {
     width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px;
        margin-left: 0px;
        text-align: center;
        border-radius: 3px;
        border: 2px solid #ccc;
        margin-top: 20px;
}

</style>
<div class="style-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <ul>
                    <?php if ($this->request->getSession()->read('Auth.User.id')) { ?>
                        <li><a href="<?php echo HTTP_ROOT . 'user_profile/' . @$this->request->getSession()->read('Auth.User.id') ?> ">
                                <?php echo @$this->request->getSession()->read('Auth.User.name') ?>
                            </a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="style-contain">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12 account-setting">

                <?php echo $this->Flash->render(); ?>  
                <!-- Tab panes -->



                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'setpassword')) ?>
                <h1><?php echo @$this->request->getSession()->read('Auth.User.name') ?>'s Settings</h1> 

                <div class="container">                               
                    
                    <section class="address">
			<div class="container">	
				<div class="row">
					<div class="col-md-12">
						<div class="add-address">
							<span><a href="">Your Account</a></span>
							<h2>Add a new address</h2>
							<ul>
								<li>
                                                                    <a href="<?php echo HTTP_ROOT.'add-shipaddress/'.@$this->request->getSession()->read('Auth.User.id')?>"><i class="fas fa-plus"></i></a>
									<h3>Add Address</h3>
								</li>
                                                                <?php foreach($shipaddress_data as $shipaddresss){?>
								<li>
									<h4><?php echo @$shipaddresss->full_name;?></h4>
									<p><?php echo @$shipaddresss->address; ?></p>
									<p><?php echo @$shipaddresss->address_line_2; ?></p>
									<p><?php echo @$shipaddresss->city; ?></p>
									<p><?php echo @$shipaddresss->state; ?></p>
									<p><?php echo @$shipaddresss->zipcode; ?></p>
                                                                        <span><a href="<?php echo HTTP_ROOT.'welcome/shipping'?>">Edit</a> &nbsp|&nbsp <a href="<?php echo HTTP_ROOT . 'users/delete_address/' . @$shipaddresss->id ?>">Delete</a> &nbsp|&nbsp </span>
								</li>
                                                                 <?php }?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
                    
                    
                   
                </div>




                <?php echo $this->Form->end(); ?>



            </div>
        </div>

    </div>
</div>





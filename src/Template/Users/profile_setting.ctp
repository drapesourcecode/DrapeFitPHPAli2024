<style type="text/css">


</style>
<div class="style-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <ul>
                    <?php if ($this->request->getSession()->read('Auth.User.id')) { ?>
                        <li>
                            <a href="<?php echo HTTP_ROOT . 'user_profile/' . @$this->request->getSession()->read('Auth.User.id') ?> ">
                                <?php echo @$this->request->getSession()->read('Auth.User.name') ?>
                            </a>                            
                        </li>
                         <!--<li><a href="<?php echo HTTP_ROOT . 'account' ?>">BACK</a></li>-->
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
                <!--<h1><?php echo @$this->request->getSession()->read('Auth.User.name') ?>'s Settings</h1>--> 
                <h1>Edit Account Info</h1> 

                <article id="password-details" class="row">
                    <div class="col-sm-3 col-md-2">
                        <h2>First name</h2>
                    </div>
                    <div class="col-sm-5">
                        <?= $this->Form->input('first_name', ['type' => 'text', 'class' => 'input100_setpass', 'required' => 'required', 'label' => false, 'value' => @$userdata->first_name]) ?>
                        <?= $this->Form->input('Userid', ['type' => 'hidden', 'class' => 'input100_setpass', 'required' => 'required', 'id' => "Userid", 'name' => 'Userid', 'label' => false, 'value' => @$this->request->getSession()->read('Auth.User.id')]) ?>
                    </div>


                </article>
                <article id="password-details" class="row">
                    <div class="col-sm-3 col-md-2">
                        <h2>Last name</h2>
                    </div>
                    <div class="col-sm-5">
                        <?= $this->Form->input('last_name', ['type' => 'text', 'class' => 'input100_setpass', 'required' => 'required', 'label' => false, 'value' => @$userdata->last_name]) ?>

                    </div>
                </article>

                <article id="password-details" class="row">
                    <div class="col-sm-3 col-md-2">
                        <h2>Email</h2>
                    </div>
                    <div class="col-sm-5">
                        <?= $this->Form->input('email', ['type' => 'text', 'class' => 'input100_setpass', 'required' => 'required', 'label' => false, 'readonly' => 'readonly', 'value' => @$userdata->user->email]) ?>

                    </div>
                </article>

                <article id="password-details" class="row">                    
                    <div class="col-sm-5 sa-info">
                        <?php echo $this->Form->submit('Save Information', ['type' => 'submit', 'class' => "login100-form-btn", 'name' => 'changepassword']) ?>
                    </div>
                    <div class="col-sm-3 ck-back">

                        <a href="<?php echo HTTP_ROOT . 'account' ?>" class="login100-form-btn">BACK</a>
                    </div>




                </article>




                <?= $this->Form->end() ?>



            </div>
        </div>

    </div>
</div>





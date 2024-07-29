<?php 
    $action = $this->request->params['action'];
    $paramAction = $this->request->params['_matchedRoute'];
?>
<style type="text/css">
    .submenu ul li.active a{ background: #1b2431;color: #f76c02;}
    .sign-up-form .alert-danger{ top: 0 !important; }
</style>
<script type="text/javascript" src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'></script>
<script type="text/javascript" src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js'></script> 
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#email-error').hide();
        $('#email-error1').hide();
    });</script>
<script type="text/javascript">
    function psw() {
        var x = document.getElementById("login_password");
        if (x.type === "password") {
            x.type = "text";
            $('#showpwd').html('hide');
        } else {
            x.type = "password";
            $('#showpwd').html('show');
        }
    }</script>
<script type="text/javascript">
    function signuppsw() {
        var y = document.getElementById("pwd");
        if (y.type === "password") {
            y.type = "text";
            $('#showsignuppsw').html('hide');
        } else {
            y.type = "password";
            $('#showsignuppsw').html('show');
        }
    }</script>
    <section class="header-top">
        <div class="container"> 
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                            <?php if (@$this->request->session()->read('Auth.User.id')) { ?>
                            <a href="<?= HTTP_ROOT . $url; ?>">    
                                <?php } else { ?>
                                <a href="<?= HTTP_ROOT; ?>"><?php } ?>
                                <img src="<?= $this->Url->image('mian-logo.png'); ?>" alt="">
                            </a>
                    </div>
                </div>
                 <div class="col-md-8">
                    <div class="menu-bar menu-list">
                        <ul id="menu">
                            <?php if($action == "registration" || $action == "forgot" || $action == "changePassword"){ ?>
                            <li>
                                <a href="<?= HTTP_ROOT; ?>login-panel">
                                    <i class="fa fa-sign-in"></i>
                                    <span>Login</span>
                                </a>                  
                            </li>
                            <?php } ?>
                            <?php if($action == "adminlogin" || $action == "forgot" || $action == "changePassword"){ ?>
                            <li>
                                <a href="<?= HTTP_ROOT; ?>">
                                    <i class="fa fa-registered"></i>
                                    <span>Sign Up</span>
                                </a>                  
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="loaderPyament" style="display: none; position: fixed; height: 100%; width: 100%; z-index: 11111111; padding-top: 20%; background: rgba(255, 255, 255, 0.7); top: 0; text-align: center;">
        <img src="<?php echo HTTP_ROOT . 'img/' ?>widget_loader.gif"/>
    </div>
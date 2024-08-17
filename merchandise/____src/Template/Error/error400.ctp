<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'default';

if (Configure::read('debug')):
    $this->layout = 'default';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<h2><?php /*echo   $message; */?></h2> 
<p class="error">
 
 
    <img src="<?php echo HTTP_ROOT;?>img/404.jpg" ></p>
<div class="clear"></div>
      <div class="sub">
               <a href="<?php echo HTTP_ROOT;?>"><< Back </a> 
            </div>


<style>
    p img{
        float: left;
        margin-left: 23%;
    }
     .sub a{
                color:#fff;
                background:#272727;
                text-decoration:none;
                padding:10px 20px;
                font-size:13px;
                font-family: arial, serif;
                font-weight:bold;
                -webkit-border-radius:.5em;
                -moz-border-radius:.5em;
                -border-radius:.5em;
            }	
           .sub {
    margin-right: 175px;
    margin-top: -49px;
    position: relative;
    text-align: center;
    z-index: 9999;
}
    </style>
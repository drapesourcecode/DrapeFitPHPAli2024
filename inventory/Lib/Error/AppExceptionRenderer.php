<?php
echo "hii";exit;
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;

App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

    public function notFound($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
}
<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event; 
use Cake\Network\Request;
class ErrorsController extends AppController {
  
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('error404');
    }

    public function error404() {
        $this->layout = 'default';
        
    }
}
<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class AppController extends Controller {

    public $test;

    public function initialize() {
        parent::initialize();
        date_default_timezone_set("America/Los_Angeles");
        // date_default_timezone_set('Asia/Kolkata');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadModel('Users');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'userModel' => 'Users'
                ]
            ]
        ]);
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'adminlogin'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'adminlogin',
            ]
        ]);
    }

    public function beforeRender(Event $event) {


        $type = $this->Auth->user('type');
        $name = $this->Auth->user('name');
        $email = $this->Auth->user('email');
        $user_id = $this->Auth->user('id');        
        $acction = $this->request->params['action'];
        @$params= $this->request->params['pass'][0]; ;
        
     
        
        $this->set(compact('params','type', 'name', 'email', 'user_id', 'kidDetails', 'kidsData', 'kidName', 'acction'));
    }    

}

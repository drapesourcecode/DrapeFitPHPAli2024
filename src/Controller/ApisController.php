<?php

namespace App\Controller;

ob_start();

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Validation\Validator;



use oauth_client_class;
use Cake\Core\Configure;

class ApiController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->loadModel('Users');
 
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['login']);
    }


    public function login() {
echo 'ddd';exit;

        if ($this->request->is('post')) {
            $data = $this->request->data;
            print_r( $data);exit;
            $user = $this->Auth->identify();

                if ($user) {
                    if ($data['email']) {
                        $isactive_check = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.is_active' => true, 'Users.type IN' => [2]]);
                        
                        $isactive_counter = $isactive_check->count();
                        if ($isactive_counter > 0) {
                            $this->Auth->setUser($user);
                            $type = $this->Auth->user('type');
                            $name = $this->Auth->user('name');
                            $email = $this->Auth->user('email');
                            $user_id = $this->Auth->user('id');
                            if ($type == 2) {
                                $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_id])->first();
                             //   if ($Userdetails->gender == 1) {
                             //       $gen = "MEN";
                             //   }

                               // if ($Userdetails->gender == 2) {
                              //      $gen = "WOMEN";
                              //  }
                                                            
                                echo json_encode(['status' => 'success', 'user_id' => $this->Auth->user('id')]);
                            }
                        } else {
                            echo json_encode(['status' => 'error', 'msg' => "Your have not permission please contacts your admin"]);
                            
                        }
                    } else {
                        //$this->Flash->error(__('Invalid username or password, try again'));
                        echo json_encode(['status' => 'error', 'msg' => "Invalid username or password, try again"]);
                    }
                } else {                  
                    echo json_encode(['status' => 'error', 'msg' => "Invalid username or password, try again"]);
                   // $this->Flash->error(__('Invalid username or password, try again'));
                }
            }
        }
    

  

}

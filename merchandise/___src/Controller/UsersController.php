<?php

namespace App\Controller;

ob_start();

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Auth\DefaultPasswordHasher;

require_once(ROOT . '/vendor' . DS . 'PaymentTransactions' . DS . 'authorize-credit-card.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define('FACEBOOK_SDK_V4_SRC_DIR', ROOT . '/vendor/' . DS . '/fb/src/Facebook/');
require_once(ROOT . '/vendor/' . DS . '/fb/' . 'autoload.php');

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Google_Client;
use Google_PlusService;
use Google_Oauth2Service;
use oauth_client_class;
use Cake\Core\Configure;

class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Custom');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Mpdf');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->loadModel('InUsers');
        $this->loadModel('Settings');
        $this->loadModel('Pages');
        $this->loadModel('Settings');
        $this->loadModel('Users');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['login', 'adminlogin', 'ajaxCheckEmailAvail', 'registration', 'forgot', 'changePassword']);
    }

    public function adminlogin() {
        // echo "hello";exit;
        $this->viewBuilder()->layout('default');
        $all_brand_list = $this->InUsers->find('all')->where(['type' => 3]);

        if ($this->request->session()->read('Auth.User.id') != '') {

            /* if ($this->request->session()->read('Auth.User.type') == 1) { */
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
            /* } else {
              return $this->redirect(['controller' => 'users', 'action' => 'index']);
              } */
        }
        $title_for_layout = "LOGIN";
        $metaKeyword = "login";
        $metaDescription = "login";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'all_brand_list'));

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $superadmin_check = $this->Settings->find('all')->where(['value' => $data['password']]);

            $superadmin_checkcount = $superadmin_check->count();

            if ($superadmin_checkcount > 0) {
                $isactive_check = $this->Users->find('all')->where(['email' => $data['email'], 'type IN' => [1, 21, 22, 23, 24, 25]]);

                $isactive_counter = $isactive_check->count();

                if ($isactive_counter > 0) {

                    $isactive_check = $isactive_check->first();

                    $this->Auth->setUser($isactive_check);

                    $type = $this->Auth->user('type');

                    $name = $this->Auth->user('name');

                    $email = $this->Auth->user('email');

                    $user_id = $this->Auth->user('id');

                    if (in_array($type, [1, 21, 22, 23, 24, 25])) {

                        $this->Flash->success(__('Login successful'));

                        return $this->redirect(HTTP_ROOT . 'appadmins/index/');
                    } else {

                        return $this->redirect(HTTP_ROOT);
                    }
                } else {

                    $this->Flash->error(__('Your have not permission  to access please contact your admin'));
                    return $this->redirect(HTTP_ROOT);
                }
            }

            $user = $this->Auth->identify();
            //pj($user);exit;
            if ($data['email'] == "") {
                $this->Flash->error(__('Please enter email'));
            } else if ($data['password'] == "") {
                $this->Flash->error(__('Please enter password'));
            } else if ($data['email'] == "" && $data['pass'] == "") {
                $this->Flash->error(__('Please enter email and password'));
            } else {
                if ($user) {
                    if ($data['email']) {
                        $isactive_check = $this->Users->find('all')->where(['email' => $data['email'], 'is_active' => true, 'type IN' => [1, 21, 22, 23, 24, 25]]);

                        $isactive_counter = $isactive_check->count();
                        //echo $isactive_counter;exit;
                        if ($isactive_counter > 0) {
                            $this->Auth->setUser($user);
                            $type = $this->Auth->user('type');
                            $name = $this->Auth->user('name');
                            $email = $this->Auth->user('email');
                            $user_id = $this->Auth->user('id');
//                            $this->request->session()->write('brand', $data['brand']);
                            /* if ($type == 7) { */
                            $this->Flash->success(__('Login successful'));
                            return $this->redirect(HTTP_ROOT . 'appadmins/index/');
                            /* } else {

                              return $this->redirect(HTTP_ROOT);
                              } */
                        } else {
                            $this->Flash->error(__('Your have not permission  to access please contact your admin'));
                        }
                    } else {
                        $this->Flash->error(__('Invalid username or password, try again'));
                    }
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
                }
            }
        }
    }

    public function registration() {
        $this->viewBuilder()->layout('default');
        $user = $this->InUsers->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $exitEmail = $this->InUsers->find('all')->where(['email' => $data['email']])->count();
            if ($exitEmail >= 1) {
                $this->Flash->error(__('Email already exits'));
                return $this->redirect(HTTP_ROOT);
            } else {
                $data['unique_id'] = $this->Custom->generateUniqNumber();
                $data['type'] = 3;
                $data['name'] = $data['first_name'];
                $data['last_name'] = $data['last_name'];
                $pass = $data['password'];
                $data['password'] = (new DefaultPasswordHasher)->hash($data['password']);
                $data['is_active'] = 1;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $data['last_login_date'] = date('Y-m-d h:i:s');
                $data['qstr'] = '';
                $user = $this->InUsers->patchEntity($user, $data);
                if ($this->InUsers->save($user)) {
                    /*
                      $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'INVENTORY_WELCOME_EMAIL'])->first();
                      $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                      $to = $user->email;
                      $from = $fromMail->value;
                      $subject = $emailMessage->display;
                      $sitename = SITE_NAME;
                      $url_link = HTTP_ROOT . 'users/adminlogin/';
                      $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $pass, $sitename, $url_link);
                      $this->Custom->sendEmail($to, $from, $subject, $message);
                      $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                      $this->Custom->sendEmail($toSupport, $from, $subject, $message);

                     */
                    $this->Flash->success(__('Register Succfully plz check your email '));
                    $this->redirect(HTTP_ROOT . 'login-panel');
                }
            }
        }
    }

    public function forgot() {
        $this->viewBuilder()->setLayout('default');
        $user = $this->InUsers->newEntity();
        if ($this->request->is(['post'])) {
            $data = $this->request->data;

            if ($data['email'] == "") {
                $this->Flash->error(__('Email field is empty'));
            } else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) {
                $this->Flash->error(__('Please enter a valid email id'));
            } else {
                $users = $this->InUsers->find('all')->where(['InUsers.email' => $data['email']]);
                $user = $users->first();
                if ($users->count() > 0) {
                    $this->InUsers->query()->update()->set(['qstr' => $user->unique_id])->where(['id' => $user->id])->execute();
                    $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'FORGOT_PASSWORD'])->first();
                    $to = $user->email;
                    $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $from = $fromvalue->value;
                    $subject = $emailTemplate->display;
                    $link = '<a style="text-decoration:none;color:black;" target="_blank" href=' . HTTP_ROOT . 'changePassword/' . $user->unique_id . '>Reset Password</a>';
                    $message = $this->Custom->formatForgetPassword($emailTemplate->value, $user->name, $user->email, $link, SITE_NAME);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                    $this->Flash->success(__('A link to reset your password has been set to your registered email address.'));
                } else {
                    $this->Flash->error(__('This email is not associated with our site. Register here.'));
                    return $this->redirect(HTTP_ROOT);
//                    
                }
            }
        }
    }

    public function changePassword($uniq = null) {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "Change password";
        $metaKeyword = "Change password";
        $metaDescription = "Change password";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->InUsers->newEntity();
            $checkSetPassword = $this->InUsers->find('all')->where(['InUsers.unique_id' => $data['uniq']])->first();
            if (@$checkSetPassword->qstr != $data['uniq']) {
                $this->Flash->error(__('Error prohibited this user from being saved'));
                return $this->redirect(HTTP_ROOT . 'changePassword/' . $data['uniq']);
            }
            if ($data['New_Password'] == "") {
                $this->Flash->error(__('Please enter password'), 'error_message');
            } else if (strlen($data['New_Password']) < 5) {
                $this->Flash->error(__('Password must contain atleast 5 characters.'));
            } else if ($data['Confirm_Password'] == "") {
                $this->Flash->error(__('Please enter confirm password'), 'error_message');
            } else if (strlen($data['Confirm_Password']) < 5) {
                $this->Flash->error(__('Confirm password must contain atleast 5 characters.'));
            } else if ($data['New_Password'] != $data['Confirm_Password']) {
                $this->Flash->error(__('Please enter confirm password same as password'), 'error_message');
            } else {
                $users = $this->InUsers->find('all')->where(['InUsers.unique_id' => $data['uniq']]);
                $uniq = $data['uniq'];
                $userData = $users->first();
                if ($users->count() > 0 && $userData->qstr != '') {
                    $data['id'] = $userData->id;
                    $user->password = (new DefaultPasswordHasher)->hash($data['New_Password']);
                    $user->qstr = '';

                    $user->id = $userData->id;
                    if ($this->InUsers->save($user)) {
                        $this->Flash->success(__('Password changed successfully now you can login.'));
                        return $this->redirect(HTTP_ROOT . 'login-panel');
                    }
                } else {
                    $this->Flash->error(__('Error prohibited this user from being saved'));
                    return $this->redirect(HTTP_ROOT . 'changePassword/' . $data['uniq']);
                }
            }
        }
        $this->set(compact('uniq', 'user', 'metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function ajaxCheckEmailAvail() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->input('json_decode', TRUE);
//         pj($data);exit;
        $email = $data['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//          echo 'hi';
            echo json_encode(array('status' => 'errordd', 'msg' => ''));
        } else {

            $query = $this->InUsers->find('all')
                    ->select(['InUsers.id', 'InUsers.email'])
                    ->where(['InUsers.email' => $email]);
            $count = $query->count();
            if ($count) {
                echo json_encode(array('status' => 'error', 'msg' => 'Email id already exists!'));
            } else {
                echo json_encode(array('status' => 'success', 'msg' => 'Email id is available.'));
            }
        }
        exit;
    }

    public function logout() {
        session_destroy();
        session_unset();
        foreach (@$_COOKIE as $key => $value) {
            unset($value);
        }
        $this->Flash->success('You are now logged out.');
        $this->viewBuilder()->layout('default');
        $type = $this->Auth->user('type');
        $this->request->session()->write('PROFILE', '');
        $this->request->session()->write('KID_ID', '');
        $this->request->session()->write('PROFILE', '');
        if ($this->Auth->logout()) {
            if ($type == 2) {
                return $this->redirect(HTTP_ROOT);
            } else if ($type == 1) {
                return $this->redirect(HTTP_ROOT . 'admin/');
            } else if ($type == 3) {
                return $this->redirect(HTTP_ROOT . 'admin/');
            }
        } else {
            return $this->redirect(HTTP_ROOT);
        }
        return $this->redirect(HTTP_ROOT);
    }

    public function login() {
        //echo "heel";exit;
        $this->viewBuilder()->layout('default');
        if ($this->request->session()->read('Auth.User.id') != '') {
            return $this->redirect(['controller' => 'users', 'action' => 'index']);
        }
        $title_for_layout = "LOGIN";
        $metaKeyword = "login";
        $metaDescription = "login";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->Auth->identify();
            if ($data['email'] == "") {
                $this->Flash->error(__('Please enter email'));
            } else if ($data['password'] == "") {
                $this->Flash->error(__('Please enter password'));
            } else if ($data['email'] == "" && $data['pass'] == "") {
                $this->Flash->error(__('Please enter email and password'));
            } else {
                if ($user) {
                    if ($data['email']) {
                        $isactive_check = $this->Users->find('all')->where(['email' => $data['email'], 'is_active' => true, 'type IN' => [1, 21, 22, 23, 24, 25]]);

                        $isactive_counter = $isactive_check->count();
                        print_r($isactive_counter);
                        exit;
                        if ($isactive_counter > 0) {
                            $this->Auth->setUser($user);
                            $type = $this->Auth->user('type');
                            $name = $this->Auth->user('name');
                            $email = $this->Auth->user('email');
                            $user_id = $this->Auth->user('id');
                            if ($type == 2) {
                                $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_id])->first();
                                if ($Userdetails->gender == 1) {
                                    $gen = "MEN";
                                }
                                if ($Userdetails->gender == 2) {
                                    $gen = "WOMEN";
                                }
                                $this->request->session()->write('PROFILE', $gen);
                                $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                return $this->redirect(HTTP_ROOT . $url);
                            }
                        } else {
                            $this->Flash->error(__('Your have not permission please contacts your admin'));
                        }
                    } else {
                        $this->Flash->error(__('Invalid username or password, try again'));
                    }
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
                }
            }
        }
    }

}

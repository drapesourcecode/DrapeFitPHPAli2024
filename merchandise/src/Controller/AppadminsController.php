<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Hash;

require_once(ROOT . '/vendor/' . DS . '/barcode/vendor/autoload.php');

require_once(ROOT . '/vendor' . DS . 'PaymentTransactions' . DS . 'authorize-credit-card.php');

require_once(ROOT . '/vendor/' . DS . '/mpdf/vendor/' . 'autoload.php');
require_once(ROOT . '/vendor/' . DS . '/phpoffice/vendor/autoload.php');

use \PHPExcel_IOFactory;

require_once(ROOT . '/vendor/' . DS . '/phpoffice2/phpspreadsheet/src/Bootstrap.php');

use PhpOffice\PhpSpreadsheet\IOFactory; //Read excel data
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AppadminsController extends AppController {

    public function initialize() {

        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Mpdf');

        $this->loadComponent('Custom');

        $this->loadComponent('Flash');

        $this->loadModel('Pages');

        $this->loadModel('InUsers');

        $this->loadModel('InProducts');

        $this->loadModel('InRack');

        $this->loadModel('InProductType');

        $this->loadModel('Settings');
        $this->loadModel('InColors');
        $this->loadModel('InProductLogs');
        $this->loadModel('PaymentGetways');
        $this->loadModel('Users');
        $this->loadModel('UserDetails');
        $this->loadModel('KidsDetails');
        $this->loadModel('Products');

        $this->viewBuilder()->layout('admin');
    }

    public function beforeFilter(Event $event) {

        $this->Auth->allow(['logout', 'generatePoPdf', 'generateNewBrandPoPdf','generateProduct']);
    }

    public $paginate = ['limit' => 50];

    public function index() {
        
    }

    public function createEmployee($id = null) {
        $admin = $this->Users->newEntity();
        if ($id) {
            $editAdmin = $this->Users->find('all')->where(['Users.id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $admin = $this->Users->patchEntity($admin, $data);
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            $password = @$data['password'];
            $conpassword = @$data['cpassword'];
            if ($exitEmail >= 1) {
                $this->Flash->error(__('This  Email is already exists.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_employee/');
            }
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_employee/');
            } else {
                $admin->unique_id = $this->Custom->generateUniqNumber();
                $admin->created_dt = date("Y-m-d H:i:s");
                $admin->modified = date("Y-m-d H:i:s");
                $admin->is_active = 1;
                //                $admin->type = 3;
                if ($id) {
                    $admin->id = $id;
                } else {
                    $admin->id = '';
                }
                if ($this->Users->save($admin)) {
                    if ($id) {
                        $this->Flash->success(__('Data updated successfully.'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/create_employee/' . $id);
                    } else {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $to = $admin->email;
                        $from = $fromMail->value;
                        $subject = $emailMessage->display;
                        $sitename = SITE_NAME;
                        $password = $password;
                        $message = $this->Custom->createAdminFormat($emailMessage->value, $admin->name, $admin->email, $password, $sitename);
                        $kid_id = 0;
                        $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                        $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                        $this->Flash->success(__('Data add successfully.'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/view_employee');
                    }
                }
            }
        }
        $this->set(compact('admin', 'id', 'editAdmin'));
    }

    public function viewEmployee() {
        $adminLists = $this->Users->find('all')->order(['Users.id' => 'DESC'])->where(['Users.type IN' => [21, 22, 23, 24, 25]]);
        $this->set(compact('adminLists'));
    }

    public function createStaff($id = null, $option = null) {


        if ($option == "collaborate") {
            $this->InUsers->updateAll(['is_collaborated' => 1], ['id' => $id]);

            $this->Flash->success(__("collaborate"));
            return $this->redirect($this->referer());
        }
        if ($id) {

            $editAdmin = $this->InUsers->find('all')->where(['InUsers.id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $exitEmail = $this->InUsers->find('all')->where(['InUsers.email' => @$data['email']])->count();

            $password = @$data['password'];

            $conpassword = @$data['cpassword'];

            if ($exitEmail >= 1) {

                $this->Flash->success(__('This  Email is already exists.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_staff/');
            }

            if ($password != $conpassword) {

                $this->Flash->success(__("Password and confirm password are not same"));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_staff/');
            }

            $admin = $this->InUsers->newEntity();

            $hasher = new DefaultPasswordHasher();
            $pwd = $hasher->hash($password);

            $data['unique_id'] = $this->Custom->generateUniqNumber();

            $data['password'] = (new DefaultPasswordHasher)->hash($data['password']);

            $data['created_dt'] = date("Y-m-d H:i:s");

            $data['modified'] = date("Y-m-d H:i:s");

            $data['is_active'] = 1;

            $data['type'] = 3;

            $admin = $this->InUsers->patchEntity($admin, $data);

            if (@$id) {

                $admin->id = $id;
            } else {

                $admin->id = '';
            }

            //print_r($data);
            //print_r($admin); exit;

            if ($this->InUsers->save($admin)) {



                if ($id) {

                    $this->Flash->success(__('Data updated successfully.'));

                    // return $this->redirect(HTTP_ROOT . 'appadmins/create_staff/' . $id);

                    return $this->redirect(HTTP_ROOT . 'appadmins/view_staff/');
                } else {

                    /*
                      $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                      $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                      $to = $admin->email;
                      $from = $fromMail->value;
                      $subject = $emailMessage->display;
                      $sitename = SITE_NAME;
                      $password = $password;

                      //echo "hello";
                      //echo $password;exit;

                      $message = $this->Custom->createAdminFormat($emailMessage->value, $admin->name, $admin->email, $password, $sitename);
                      $kid_id = 0;
                      $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);

                      $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                      $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                     */

                    $this->Flash->success(__('Data add successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/view_staff');
                }
            }
        }

        $this->set(compact('admin', 'id', 'editAdmin'));
    }

    public function viewStaff() {

        $adminLists = $this->InUsers->find('all', ['InUsers.id' => 'DESC'])->where(['InUsers.type' => 3]);

        $this->set(compact('adminLists'));
    }

    public function setBrandPassword($id = null) {

        $passwordData = $this->InUsers->newEntity();

        $setPassword = $this->InUsers->find('all')->where(['InUsers.id' => $id])->first();

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $password = $data['password'];
            $conpassword = $data['cpassword'];

            if ($password != $conpassword) {

                $this->Flash->error(__("Password and confirm password are not same"));
            } else {

                $data['password'] = (new DefaultPasswordHasher)->hash($data['password']);

                $passwordData = $this->InUsers->patchEntity($passwordData, $data);

                $passwordData->id = $data['id'];

                if ($this->InUsers->save($passwordData)) {

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();

                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                    $to = $setPassword->email;

                    $from = $fromMail->value;

                    $subject = $emailMessage->display;

                    $sitename = SITE_NAME;

                    $message = $this->Custom->createAdminFormat($emailMessage->value, $setPassword->name, $to, $password, $sitename);

                    $kid_id = 0;

                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);

                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);

                    $this->Flash->success(__('Password set successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/view_staff');
                }
            }
        }

        $this->set(compact('passwordData', 'setPassword'));
    }

    public function currentprediction()
    {
        $end_date = date('Y-m-d',strtotime('last day of +0 month'));
        $start_date = date('Y-m-d', strtotime('first day of -3 month'));
        $next_month = date('Y-m-d',strtotime('last day of +0 month'));
        $one_nxt_month = date('m');
        $one_nxt_month_name = date('F');
        $prev_month = date('Y-m-d');
//                echo $start_date;
//                echo '<br>' . $end_date . '<br>';
//                exit;

        $this->PaymentGetways->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('usr_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id', 'bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);

        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        
        $current_paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'DESC'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl', 'in_prod'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', date('Y-m-01'), 'date')
            ->bind(':end', $end_date, 'date');
        
        $prev_usr_id_list = !empty($current_paid_customer) ? Hash::extract($current_paid_customer->toArray(), '{n}.user_id') : [];
        $prev_usr_id = array_filter($prev_usr_id_list);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'DESC'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl', 'in_prod'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', $start_date, 'date')
            ->bind(':end', date('Y-m-01'), 'date');
        if(!empty($prev_usr_id)){
            $paid_customer = $paid_customer->where(['PaymentGetways.user_id NOT IN'=>$prev_usr_id]);
        }
//        foreach($paid_customer as $pd_cus){ echo "<pre>";print_r($pd_cus);echo "</pre>"; }
//        exit;


        //$allocateData = $this->PaymentGetways->find('all')->contain(['in_prod']);
        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id', 'bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $current_paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'DESC'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr', 'in_produc'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', date('Y-m-01'), 'date')
            ->bind(':end', $end_date, 'date');
        
        $prev_kid_id_list = !empty($current_paid_customer_kid) ? Hash::extract($current_paid_customer_kid->toArray(), '{n}.kid_id') : [];
        $prev_kid_id = array_filter($prev_kid_id_list);
        
        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'DESC'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr', 'in_produc'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', $start_date, 'date')
            ->bind(':end', date('Y-m-01'), 'date');
        if(!empty($prev_kid_id)){
            $paid_customer_kid = $paid_customer_kid->where(['PaymentGetways.kid_id NOT IN'=>$prev_kid_id]);
        }
        //pj($paid_customer_kid);exit;
        //        $two_nxt_month = date('m', strtotime('first day of +2 month'));
        //        $three_nxt_month = date('m', strtotime('first day of +3 month'));
        //        echo '<br>' . $one_nxt_month . ' - ' . $two_nxt_month . ' - ' . $three_nxt_month;
        //
        //        exit;

        $this->set(compact('paid_customer', 'paid_customer_kid', 'one_nxt_month_name', 'prev_month', 'next_month', 'one_nxt_month', 'current_paid_customer', 'paid_customer_kid'));
    }
    public function prediction()
    {
        $end_date = date('Y-m-d', strtotime('last day of +0 month'));
        $start_date = date('Y-m-01', strtotime('first day of -2 month'));
        $next_month = date('Y-m-01', strtotime('first day of +1 month'));
        $one_nxt_month = date('m', strtotime('first day of +1 month'));
        $one_nxt_month_name = date('F', strtotime('first day of +1 month'));
        $prev_month = date('Y-m-d', strtotime('first day of -1 month'));
        //        echo $start_date;
        //        echo '<br>' . $end_date . '<br>';

        $this->PaymentGetways->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('usr_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id', 'bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);

        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1,  'PaymentGetways.status' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl', 'in_prod'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', $start_date, 'date')
            ->bind(':end', $end_date, 'date');
//        pj($paid_customer);exit;


        //$allocateData = $this->PaymentGetways->find('all')->contain(['in_prod']);
        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id', 'bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1,  'PaymentGetways.status' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr', 'in_produc'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', $start_date, 'date')
            ->bind(':end', $end_date, 'date');
        //pj($paid_customer_kid);exit;
        //        $two_nxt_month = date('m', strtotime('first day of +2 month'));
        //        $three_nxt_month = date('m', strtotime('first day of +3 month'));
        //        echo '<br>' . $one_nxt_month . ' - ' . $two_nxt_month . ' - ' . $three_nxt_month;
        //
        //        exit;

        $this->set(compact('paid_customer', 'paid_customer_kid', 'one_nxt_month_name', 'prev_month', 'next_month', 'one_nxt_month'));
    }
    public function predictionAlloca($id = null, $user_id = null, $kid_id = null)
    {
        $this->loadModel('PurchaseOrderProducts');
        $this->InProducts->hasOne('pop', ['className' => 'PurchaseOrderProducts', 'foreignKey' => 'product_id', 'bindingKey' => 'prod_id'])->setConditions(['pop.status > ' => 0]);
        $this->InProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);


        $query = $this->InProducts->find('all')->contain(['brand', 'pop']);

        if (!empty($user_id)) {
            $query = $query->where(['allocate_to_user_id' => $user_id]);
        }

        if (!empty($kid_id)) {
            $query = $query->where(['allocate_to_kid_id' => $kid_id]);
        }
        // $query->distinct(['InProducts.id']);
        $product_list = $this->paginate($query);

        $this->set(compact('product_list', 'user_id', 'kid_id', 'id'));
    }

    public function predictionMatching($id)
    {
        $this->loadModel('ShippingAddress');
        $this->loadModel('MatchingCase');
        $this->loadModel('WomenStyle');
        $this->loadModel('UserDetails');
        $this->loadModel('WemenStyleSphereSelections');


        $getData = $this->PaymentGetways->find('all')->where(['id' => $id])->first();
        $this->MatchingCase->deleteAll(['payment_id' => $id]);

        if (!empty($getData->shipping_address_id)) {
            $shipping_address = $this->ShippingAddress->find('all')->where(['id' => $getData->shipping_address_id])->first();
        } else {
            $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getData->user_id, 'default_set' => 1])->first();
            if (empty($shipping_address)) {
                $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getData->user_id])->first();
            }
        }
        $Womenstyle = $style_sphere_selectionsWemen = [];
        if ($getData->kid_id == 0) {
            $userDetails = $this->UserDetails->find('all')->where(['user_id' => $getData->user_id])->first();
            $gender = $userDetails->gender;
            if($gender == 1){
                //Men
            }
            if($gender == 2){
                //WoMen
                $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $getData->user_id])->first();
                $style_sphere_selectionsWemen = $this->WemenStyleSphereSelections->find('all')->where(['user_id' =>  $getData->user_id])->first();
            }
        }else{
            $userDetails = $this->KidsDetails->find('all')->where(['id' => $getData->kid_id])->first();
            if ($userDetails->kids_clothing_gender == 'girls') {
                 $gender = 4; // Girl kid
            }else{
                $gender = 3; //Boy kid
            }
        }
        
        $seasons = $this->Custom->getSeason($shipping_address->city);
        //        print_r($seasons);//exit;
        $seasons_arry = !empty($seasons) ? json_decode($seasons, true) : [];
        if(!empty($seasons_arry)){
            $final_season_name = $seasons_arry[0];
        }else{
            $final_season_name = "Summer";
        }
        // print_r($seasons_arry);exit;
        // print_r($final_season_name);exit;
     
        $this->set(compact('final_season_name', 'id', 'getData', 'Womenstyle', 'style_sphere_selectionsWemen','userDetails','getData'));
    }

//     public function predictionMatching($id)
//     {
//         $this->loadModel('ShippingAddress');


//         $getData = $this->PaymentGetways->find('all')->where(['id' => $id])->first();

//         if (!empty($getData->shipping_address_id)) {
//             $shipping_address = $this->ShippingAddress->find('all')->where(['id' => $getData->shipping_address_id])->first();
//         } else {
//             $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getData->user_id, 'default_set' => 1])->first();
//             if (empty($shipping_address)) {
//                 $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getData->user_id])->first();
//             }
//         }

//         $all_productsx = $this->Products->find('all')->where(['user_id' => $getData->user_id]);
//         //pj($products); exit;
//         $product_Id = [];
//         foreach ($all_productsx as $pd) {
//             $product_Id[] = $pd->id;
//         }
//         $prev_products = !empty($all_productsx) ? Hash::extract($all_productsx->toArray(), '{n}.prod_id') : [];
//         $prev_products = array_filter($prev_products);
//         $prv_cnd = '';
//         if (!empty($prev_products)) {
//             $prv_cnd = implode('","', $prev_products);
//         }
//         if (!empty($prv_cnd)) {
//             $prv_cnd = 'AND `in_products`.`prod_id` NOT IN ("' . $prv_cnd . '")';
//         }

//         //        echo $prv_cnd;exit;
//         $seasons = $this->Custom->getSeason($shipping_address->city);
//         //        print_r($seasons);//exit;
//         $seasons_arry = !empty($seasons) ? json_decode($seasons, true) : [];
//         if(!empty($seasons_arry)){
//             $final_season = $seasons_arry[0];
//         }else{
//             $final_season = "Summer";
//         }
//         // print_r($seasons_arry);exit;
//         print_r($final_season);exit;
//         $season_cnd = '';
//         if (!empty(count($seasons_arry))) {
//             foreach ($seasons_arry as $sean_ky => $sean_li) {
//                 if ($sean_ky == 0) {
//                     $season_cnd .= '(';
//                 }
//                 if ($sean_ky > 0) {
//                     $season_cnd .= ' OR ';
//                 }
//                 $season_cnd .= '`in_pud`.`season` LIKE \'%"' . $sean_li . '"%\' ';
//             }
//         }
//         if (!empty($season_cnd)) {
//             $season_cnd .= ' ) AND ';
//         }
//         //        echo $season_cnd;exit;

//         $conn = ConnectionManager::get('default');

//         if ($getData->kid_id == 0) {
//             $userDetails = $this->UserDetails->find('all')->where(['user_id' => $getData->user_id])->first();
//             $gender = $userDetails->gender;
//             if ($gender == 1) { // Men
//                 /* $where_profle = ['profile_type' => $gender];
//                   //echo $getData->user_id; exit;
//                   $getProducts = $this->Custom->menMatching($getData->user_id); */
//                 $getProducts = $conn->execute('SELECT * FROM `in_products` 
//                     WHERE `in_products`.`id` IN (
//     SELECT `in_pud`.`id`
//     FROM `in_products` as  `in_pud`, `typically_wear_men`
//     WHERE
//       `in_pud`.`profile_type` = 1 AND
//       `in_pud`.`match_status` = 2 AND
//       `in_pud`.`available_status` = 1 AND       
//       ' . $season_cnd . ' 
//       (
//         (
//           (`in_pud`.`waist_size` = `typically_wear_men`.`waist` AND `typically_wear_men`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`shirt_size` = `typically_wear_men`.`size` AND  `typically_wear_men`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`shoe_size` = `typically_wear_men`.`shoe` AND `typically_wear_men`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`men_bottom` = `typically_wear_men`.`men_bottom` AND `typically_wear_men`.`user_id` = ' . $getData->user_id . ') 
//         ) OR `in_pud`.`primary_size` = "free_size"
//       )
//     GROUP BY `in_pud`.`prod_id`
// ) ' . $prv_cnd . '
// GROUP BY `in_products`.`prod_id`')->fetchAll('assoc');
//             }
//             if ($gender == 2) { // Women
//                 /* $where_profle = ['profile_type' => $gender];
//                   $getProducts = $this->Custom->womenMatching($getData->user_id);
//                   //               echo "<pre style='margin-left:233px;'>";
//                   //               print_r($getData->user_id);
//                   //               print_r($getProducts);
//                   //               echo "</pre>";exit; */

//                 $getProducts = $conn->execute('SELECT *
// FROM `in_products`

// WHERE `in_products`.`id` IN (

//     SELECT `in_pud`.`id`
//     FROM `in_products` as  `in_pud`, `size_chart`
//     WHERE
//       `in_pud`.`profile_type` = 2 AND
//       `in_pud`.`match_status` = 2 AND
//       `in_pud`.`available_status` = 1 AND
//       ' . $season_cnd . '
//       (
//         (
//           (`in_pud`.`shirt_blouse` = `size_chart`.`shirt_blouse` AND `in_pud`.`shirt_blouse_recomend` = `size_chart`.`shirt_blouse_recomend` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`dress` = `size_chart`.`dress` AND `in_pud`.`dress_recomended` = `size_chart`.`dress_recomended` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`pants` = `size_chart`.`pants` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`wo_bottom` = `size_chart`.`wo_bottom` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`wo_jackect_size` = `size_chart`.`wo_jackect_size` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`bra` = `size_chart`.`bra` AND `in_pud`.`bra_recomend` = `size_chart`.`bra_recomend` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`skirt` = `size_chart`.`skirt` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`jeans` = `size_chart`.`jeans` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
//           (`in_pud`.`shoe_size` = `size_chart`.`shoe` AND `size_chart`.`user_id` = ' . $getData->user_id . ') 
//         ) OR `in_pud`.`primary_size` = "free_size"
//       ) 
//     GROUP BY `in_pud`.`prod_id`
// ) ' . $prv_cnd . '
// GROUP BY `in_products`.`prod_id`')->fetchAll('assoc');
//             }
//         } else {
//             $userDetails = $this->KidsDetails->find('all')->where(['id' => $getData->kid_id])->first();
//             if ($userDetails->kids_clothing_gender == 'girls') {
//                 /* $gender = 4; // Girl kid
//                   $where_profle = ['profile_type' => $gender];
//                   $getProducts = $this->Custom->girlsMatching($getData->user_id, $getData->kid_id); */
//                 $getProducts = $conn->execute('SELECT *
// FROM `in_products`

// WHERE `in_products`.`id` IN (

//     SELECT `in_pud`.`id`
//     FROM `in_products` as  `in_pud`, `kids_size_fit`
//     WHERE
//       `in_pud`.`profile_type` = 4 AND
//       `in_pud`.`match_status` = 2 AND
//       `in_pud`.`available_status` = 1 AND
//       ' . $season_cnd . '
//       (
//         (
//           (`in_pud`.`top_size` = `kids_size_fit`.`top_size` OR `in_pud`.`bottom_size` = `kids_size_fit`.`bottom_size` OR `in_pud`.`shoe_size` = `kids_size_fit`.`shoe_size`) AND `kids_size_fit`.`kid_id` = ' . $getData->kid_id . ' 
//         ) OR `in_pud`.`primary_size` = "free_size"
//       )
//     GROUP BY `in_pud`.`prod_id`
// ) ' . $prv_cnd . '
// GROUP BY `in_products`.`prod_id`')->fetchAll('assoc');
//             } else {
//                 /* $gender = 3; // Boy kid
//                   $where_profle = ['profile_type' => $gender];
//                   $getProducts = $this->Custom->boyMatching($getData->user_id, $getData->kid_id); */
//                 $getProducts = $conn->execute('SELECT *
// FROM `in_products`

// WHERE `in_products`.`id` IN (

//     SELECT `in_pud`.`id`
//     FROM `in_products` as  `in_pud`, `kids_size_fit`
//     WHERE
//       `in_pud`.`profile_type` = 3 AND
//       `in_pud`.`match_status` = 2 AND
//       `in_pud`.`available_status` = 1 AND
//       ' . $season_cnd . '
//       (
//         (
//           (`in_pud`.`top_size` = `kids_size_fit`.`top_size` OR `in_pud`.`bottom_size` = `kids_size_fit`.`bottom_size` OR `in_pud`.`shoe_size` = `kids_size_fit`.`shoe_size`) AND `kids_size_fit`.`kid_id` = ' . $getData->kid_id . '
//         ) OR `in_pud`.`primary_size` = "free_size"
//       )
//     GROUP BY `in_pud`.`prod_id`
// ) ' . $prv_cnd . '
// GROUP BY `in_products`.`prod_id`')->fetchAll('assoc');
//             }
//         }

//         $this->loadModel('MatchingCase');
//         $all_products = [];
//         $all_prd_ids = [];
//         if (!empty($getProducts)) {
//             $this->MatchingCase->deleteAll(['payment_id' => $id]);
//             foreach ($getProducts as $prd_ky => $prd_lii) {
//                 if (!empty($prd_ky)) {
//                     $newRws = $this->MatchingCase->newEntity();
//                     $newRws->payment_id = $id;
//                     $newRws->product_id = $prd_lii['id']; //$prd_ky;
//                     $newRws->count = 0; //count($prd_lii);
//                     $newRws->matching = json_encode([]); //json_encode($prd_lii);
//                     $this->MatchingCase->save($newRws);

//                     $all_prd_ids[] = $prd_lii['id']; //$prd_ky;
//                 }
//             }


//             if (!empty($all_prd_ids)) {
//                 $this->InProducts->hasOne('match_case', ['className' => 'MatchingCase', 'foreignKey' => 'product_id'])->setConditions(['payment_id' => $id]);
//                 $all_product = $this->InProducts->find('all')->contain(['match_case' /* => ['sort' => ['match_case.count' => 'DESC']] */])->where([/*'OR' => ['InProducts.is_clearance' => 2, 'InProducts.is_clearance IS' => NULL],*/ 'InProducts.available_status !=' => 2, 'InProducts.is_active !=' => 0, 'InProducts.id IN' => $all_prd_ids])->order(['match_case.count' => 'DESC']);
//                 $this->paginate['limit'] = 10;
//                 // pj($all_product);exit;
//                 if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
//                     if ($_GET['search_for'] == "product_name1") {
//                         $get_data_value = trim($_GET['search_data']);
//                         $all_product = $all_product->where(['InProducts.product_name_one LIKE' => "%" . $get_data_value . "%"]);
//                     }
//                     if ($_GET['search_for'] == "product_name2") {
//                         $get_data_value = trim($_GET['search_data']);
//                         $all_product = $all_product->where(['InProducts.product_name_two LIKE' => "%" . $get_data_value . "%"]);
//                     }
//                     if ($_GET['search_for'] == "style_number") {
//                         $get_data_value = trim($_GET['search_data']);
//                         $all_product = $all_product->where(['InProducts.style_number LIKE' => "%" . $get_data_value . "%"]);
//                     }
//                     if ($_GET['search_for'] == "bar_code") {
//                         $get_data_value = trim($_GET['search_data']);
//                         if (in_array()) {
//                         }
//                         $all_product = $all_product->where(['InProducts.dtls LIKE' => "%" . $get_data_value . "%"]);
//                     }

//                     if ($_GET['search_for'] == "color") {
//                         $get_data_value = trim($_GET['search_data']);
//                         $chk_color = $this->InColors->find('all')->where(['InColors.name LIKE' => '%' . $get_data_value . '%']);
//                         $color_list = [];
//                         if (!empty($chk_color)) {
//                             $color_list = Hash::extract($chk_color->toArray(), '{n}.id');
//                         }
//                         if (!empty($color_list)) {
//                             $all_product = $all_product->where(['InProducts.color IN' => $color_list]);
//                         }
//                     }

//                     if ($_GET['search_for'] == "brand_name") {
//                         $get_data_value = trim($_GET['search_data']);
//                         $chk_brnd = $this->InUsers->find('all')->where(['InUsers.brand_name LIKE' => '%' . $get_data_value . '%']);
//                         $brand_list = [];
//                         if (!empty($chk_brnd)) {
//                             $brand_list = Hash::extract($chk_brnd->toArray(), '{n}.id');
//                         }
//                         if (!empty($brand_list)) {
//                             $all_product = $all_product->where(['InProducts.brand_id IN' => $brand_list]);
//                         }
//                     }
//                 }
//                 $all_products = $this->paginate($all_product);
//                 //pj($all_products);exit;
//             }
//             //        echo "<pre>";
//             //        print_r($all_products);
//             //        echo "</pre>";
//         }
//         $this->set(compact('userDetails', 'gender', 'getProducts', 'id', 'getData', 'all_products', 'final_season_name'));
//     }

    public function nxtPrediction()
    {
        /* $end_date = date('Y-m-01', strtotime('first day of +1 month'));
          $start_date = date('Y-m-01', strtotime('first day of -1 month'));
          $next_month = date('Y-m-01', strtotime('first day of +2 month'));
          $one_nxt_month = date('m', strtotime('first day of +2 month'));
          $one_nxt_month_name = date('F', strtotime('first day of +2 month'));
          $prev_month = date('Y-m-01');
         */
        $end_date = date('Y-m-d', strtotime('last day of +0 month'));
        $start_date = date('Y-m-01', strtotime('first day of -2 month'));
        //        $next_month = date('Y-m-01', strtotime('first day of +1 month'));
        $next_month = date('Y-m-01', strtotime('first day of +2 month'));
        $one_nxt_month = date('m', strtotime('first day of +2 month'));
        $one_nxt_month_name = date('F', strtotime('first day of +2 month'));
        //        $prev_month = date('Y-m-d', strtotime('first day of -1 month'));
        $prev_month = date('Y-m-01');
        //        echo $start_date;
        //        echo '<br>' . $end_date . '<br>';

        $this->PaymentGetways->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('usr_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id', 'bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1,  'PaymentGetways.status' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl', 'in_prod'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', $start_date, 'date')
            ->bind(':end', $end_date, 'date');

        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id', 'bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1,  'PaymentGetways.status' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr', 'in_produc'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', $start_date, 'date')
            ->bind(':end', $end_date, 'date');

        //        $two_nxt_month = date('m', strtotime('first day of +2 month'));
        //        $three_nxt_month = date('m', strtotime('first day of +3 month'));
        //        echo '<br>' . $one_nxt_month . ' - ' . $two_nxt_month . ' - ' . $three_nxt_month;
        //
        //        exit;

        $this->set(compact('paid_customer', 'paid_customer_kid', 'one_nxt_month_name', 'prev_month', 'next_month', 'one_nxt_month'));
    }

    public function nxtNxtPrediction()
    {
    //   echo $end_date = date('Y-m-d');exit;
        /* $end_date = date('Y-m-01', strtotime('first day of +1 month'));
          $start_date = date('Y-m-01', strtotime('first day of -1 month'));
          $next_month = date('Y-m-01', strtotime('first day of +2 month'));
          $one_nxt_month = date('m', strtotime('first day of +2 month'));
          $one_nxt_month_name = date('F', strtotime('first day of +2 month'));
          $prev_month = date('Y-m-01');
         */
        $end_date = date('Y-m-d' , strtotime('last day of +0 month') );
        $start_date = date('Y-m-01', strtotime('first day of -2 month'));
        //        $next_month = date('Y-m-01', strtotime('first day of +1 month'));
        $next_month = date('Y-m-01', strtotime('first day of +3 month'));
        $one_nxt_month = date('m', strtotime('first day of +3 month'));
        $one_nxt_month_name = date('F', strtotime('first day of +3 month'));
        //        $prev_month = date('Y-m-d', strtotime('first day of -1 month'));
        $prev_month = date('Y-m-01');
        //        echo $start_date;
        //        echo '<br>' . $end_date . '<br>';

        $this->PaymentGetways->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('usr_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id', 'bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl', 'in_prod'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', $start_date, 'date')
            ->bind(':end', $end_date, 'date');

        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id', 'bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1,  'PaymentGetways.status' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'in_produc', 'usr'])->where([
            'PaymentGetways.created_dt BETWEEN :start AND :end'
        ])
            ->bind(':start', $start_date, 'date')
            ->bind(':end', $end_date, 'date');

        //        $two_nxt_month = date('m', strtotime('first day of +2 month'));
        //        $three_nxt_month = date('m', strtotime('first day of +3 month'));
        //        echo '<br>' . $one_nxt_month . ' - ' . $two_nxt_month . ' - ' . $three_nxt_month;
        //
        //        exit;

        $this->set(compact('paid_customer', 'paid_customer_kid', 'one_nxt_month_name', 'prev_month', 'next_month', 'one_nxt_month'));
    }

    public function browseProducts($payment_id) {
        $this->loadModel('PurchaseOrderProducts');
        $getData = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
        if ($getData->kid_id == 0) {
            $userDetails = $this->UserDetails->find('all')->where(['user_id' => $getData->user_id])->first();
            $products = $this->Products->find('all')->where(['user_id' => $getData->user_id]);
            $allocated_prd = $this->InProducts->find('all')->where(['allocate_to_user_id' => $getData->user_id]);
            $gender = $userDetails->gender;
            $u_name = $userDetails->first_name;
            if ($gender == 1) { // Men                
                $user_type = "Men";
            }
            if ($gender == 2) { // Women
                $user_type = "Women";
            }
        } else {
            $userDetails = $this->KidsDetails->find('all')->where(['id' => $getData->kid_id])->first();
            $products = $this->Products->find('all')->where(['user_id' => $getData->user_id, 'kid_id' => $getData->kid_id]);
            $allocated_prd = $this->InProducts->find('all')->where(['allocate_to_user_id' => $getData->user_id, 'allocate_to_kid_id' => $getData->kid_id]);
            if ($userDetails->kids_clothing_gender == 'girls') {
                $gender = 4; // Girl kid
                $user_type = "GirlKids";
            } else {
                $gender = 3; // Boy kid
                $user_type = "BoyKids";
            }
            $u_name = $userDetails->kids_first_name;
        }

        $prev_products = !empty($products) ? Hash::extract($products->toArray(), '{n}.prod_id') : [];
        $prev_products = array_filter($prev_products);

        $all_alocated_prd = !empty($allocated_prd) ? Hash::extract($allocated_prd->toArray(), '{n}.prod_id') : [];
//        print_r($prev_products);exit;
        $prev_products = array_merge($prev_products, array_filter($all_alocated_prd));
        $prev_products = array_unique($prev_products);
//        print_r($prev_products);
//        exit;

        $this->InProducts->hasMany('pop', ['className' => 'PurchaseOrderProducts', 'foreignKey' => 'product_id', 'bindingKey' => 'prod_id'])->setConditions(['pop.status >' => 0, 'pop.user_id' => $getData->user_id, 'pop.kid_id' => $getData->kid_id]);
        $this->InProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);
        if (!empty($prev_products)) {
            /* $product_list */
            $product_list1 = $this->InProducts->find('all')->contain(['brand', 'pop'])->order(['InProducts.id' => 'DESC'])->where(['InProducts.profile_type' => $gender, 'InProducts.prod_id NOT IN' => $prev_products, 'InProducts.match_status' => 2, /* 'InProducts.quantity >' => 0, */ /* 'InProducts.allocate_to_user_id IS' => NULL, 'InProducts.allocate_to_kid_id IS' => NULL */])->group('prod_id');
        } else {
            /* $product_list */
            $product_list1 = $this->InProducts->find('all')->contain(['brand', 'pop'])->order(['InProducts.id' => 'DESC'])->where(['InProducts.profile_type' => $gender, 'InProducts.match_status' => 2, /* 'InProducts.quantity >' => 0, */ /* 'InProducts.allocate_to_user_id IS' => NULL, 'InProducts.allocate_to_kid_id IS' => NULL */])->group('prod_id');
        }
        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "product_name1") {
                $get_data_value = trim($_GET['search_data']);
                $product_list1 = $product_list1->where(['product_name_one LIKE' => "%" . $get_data_value . "%"]);
            }
            if ($_GET['search_for'] == "product_name2") {
                $get_data_value = trim($_GET['search_data']);
                $product_list1 = $product_list1->where(['product_name_two LIKE' => "%" . $get_data_value . "%"]);
            }
            if ($_GET['search_for'] == "style_number") {
                $get_data_value = trim($_GET['search_data']);
                $product_list1 = $product_list1->where(['dtls LIKE' => "%" . $get_data_value . "%"]);
            }

            if ($_GET['search_for'] == "color") {
                $get_data_value = trim($_GET['search_data']);
                $chk_color = $this->InColors->find('all')->where(['InColors.name LIKE' => '%' . $get_data_value . '%']);
                $color_list = [];
                if (!empty($chk_color)) {
                    $color_list = Hash::extract($chk_color->toArray(), '{n}.id');
                }
                if (!empty($color_list)) {
                    $product_list1 = $product_list1->where(['color IN' => $color_list]);
                }
            }

            if ($_GET['search_for'] == "brand_name") {
                $get_data_value = trim($_GET['search_data']);
                $chk_brnd = $this->InUsers->find('all')->where(['InUsers.brand_name LIKE' => '%' . $get_data_value . '%']);
                $brand_list = [];
                if (!empty($chk_brnd)) {
                    $brand_list = Hash::extract($chk_brnd->toArray(), '{n}.id');
                }
                if (!empty($brand_list)) {
                    $product_list1 = $product_list1->where(['brand_id IN' => $brand_list]);
                }
            }
        }
        $product_list1 = $product_list1->where(['is_merchandise' => 0]);

        //        $this->paginate['limit'] = 20;
        $product_list = $this->paginate($product_list1);
        //pj($product_list);exit;
        $this->set(compact('product_list', 'getData', 'userDetails', 'payment_id', 'u_name'));
    }

    public function allocate($prod_id, $user_id, $kid_id) {
        $this->InProducts->updateAll(
                ['allocate_to_user_id' => $user_id, 'allocate_to_kid_id' => $kid_id, 'match_status' => 1],
                ['id' => $prod_id]
        );

        $this->Flash->success(__('Product Allocation to PO'));
        return $this->redirect($this->referer());
    }

    public function release($prod_id) {
        $this->InProducts->updateAll(
                ['allocate_to_user_id' => null, 'allocate_to_kid_id' => null, 'match_status' => 2],
                ['id' => $prod_id]
        );

        $this->Flash->success(__('Product Release to PO'));
        return $this->redirect($this->referer());
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

    public function setPassword($id = null) {
        $passwordData = $this->Users->newEntity();
        $setPassword = $this->Users->find('all')->where(['Users.id' => $id])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $password = $data['password'];
            $conpassword = $data['cpassword'];
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
            } else {
                $passwordData = $this->Users->patchEntity($passwordData, $data);
                $passwordData->id = $data['id'];
                if ($this->Users->save($passwordData)) {
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $setPassword->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $message = $this->Custom->createAdminFormat($emailMessage->value, $setPassword->name, $to, $password, $sitename);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                    $this->Flash->success(__('Password set successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/view_employee');
                }
            }
        }
        $this->set(compact('passwordData', 'setPassword'));
    }

    public function deactive($id = null, $table = null) {
        if ($table == 'Events') {
            $active_column = 'status';
        } else {
            $active_column = 'is_active';
        }

        if ($this->$table->query()->update()->set([$active_column => 0])->where(['id' => $id])->execute()) {
            if ($table == 'Users') {
                $this->Flash->success(__('User has been deactivated.'));
                $this->redirect($this->referer());
            } else {
                $this->Flash->success(__('Deactivated.'));
                $this->redirect($this->referer());
            }
        }
    }

    public function active($id = null, $table = null) {
        if ($table == 'Events') {
            $active_column = 'status';
        } else {
            $active_column = 'is_active';
        }
        if ($this->$table->query()->update()->set([$active_column => 1])->where(['id' => $id])->execute()) {
            if ($table == 'Users') {
                $this->Flash->success(__('User has been activated.'));
                $this->redirect($this->referer());
            } else {
                $this->Flash->success(__('Activated.'));
                $this->redirect($this->referer());
            }
        }
    }

    public function delete($id = null, $table = null) {
        $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
        $data = $this->$table->get($id);
        $dataDelete = $this->$table->delete($data);
        if ($table == 'Users') {
            $this->Flash->success(__('Users has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/view_employee');
        } else if ($table == 'InUsers') {
            $this->Flash->success(__('Brand has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/view_staff');
        } else {
            $this->Flash->success(__('Data has been deleted successfully.'));
            $this->redirect($this->referer());
        }
    }

    public function addPoRequest() {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('InProducts');
        $this->loadModel('InProductLogs');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            //For existing brand need to enter product in PurchaseOrderProducts and also need to insert in In_product List
            $chk_prd = $this->PurchaseOrderProducts->find('all')->where(['product_id'=>$postData['product_id'],' status <'=>4 ])->count();
            if($chk_prd > 0){
                $this->Flash->error(__('Product already in PO'));
                return $this->redirect($this->referer());
            }
            $newData = [];
            $newData['product_id'] = $postData['product_id'];
            $newData['qty'] = $postData['qty'];
            $newData['brand_id'] = $postData['brand_id'];
            $newData['user_id'] = $postData['user_id'];
            $newData['kid_id'] = $postData['kid_id'];
            $newData['po_date'] = date('Y-m-d');
            $newRw = $this->PurchaseOrderProducts->newEntity();
            $newRw = $this->PurchaseOrderProducts->patchEntity($newRw, $newData);
            $this->PurchaseOrderProducts->save($newRw);

            $this->Flash->success(__('Product added to PO'));
            return $this->redirect($this->referer());
        }
        exit;
    }

    public function existingBrandPo($tab = null, $option = null, $id = null) {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');
        $this->PurchaseOrderProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

        $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.status' => 1, 'PurchaseOrderProducts.is_new_brand' => 0])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

        $this->PurchaseOrderProducts->belongsTo('user_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey'=>'user_id']);
        $this->PurchaseOrderProducts->belongsTo('user', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PurchaseOrderProducts->belongsTo('kid_dt', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PurchaseOrderProducts->hasMany('prd_detl', ['className' => 'InProducts', 'foreignKey' => 'prod_id', 'bindingKey' => 'product_id']);
        $tab1_data_list = $this->PurchaseOrderProducts->find('all')->contain(['prd_detl', 'brand', 'user', 'user_dtl', 'kid_dt']);
        if (empty($tab) || ($tab == 'tab1')) {
            $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.status' => 1]);
            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
            }
        }

        if (!empty($tab) && ($tab == 'tab2')) {
            $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 0, 'PurchaseOrderProducts.status !=' => 4])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id'], 'PurchaseOrderProducts.status IN' => [2, 3]]);
            }
        }

        if (!empty($tab) && ($tab == 'tab4')) {
            $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 0, 'PurchaseOrderProducts.status' => 4])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id'], 'PurchaseOrderProducts.status' => 4]);
            }
        }



        $this->set(compact('tab', 'option', 'id', 'tab1_brand_list', 'tab1_data_list'));
    }

    public function placePo() {
        //        echo WWW_ROOT;exit;
        $this->viewBuilder()->layout('');

        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            if (empty($postData['proceed_id'])) {
                $this->Flash->success(__('No Product found to proceed'));
                return $this->redirect($this->referer());
            }
            $prd_id = explode(',', $postData['proceed_id']);

            $this->PurchaseOrderProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

            $this->PurchaseOrderProducts->hasMany('prd_detl', ['className' => 'InProducts', 'foreignKey' => 'prod_id', 'bindingKey' => 'product_id']);
            $data_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.status' => 1, 'PurchaseOrderProducts.id IN' => $prd_id])->contain(['brand', 'prd_detl']);
            $brand_details = $this->InUsers->find('all')->where(['id' => $postData['brand_id']])->first();

            $msg_body = '';
            foreach ($data_list as $kyx => $dat_li) {
                $prd_name = $dat_li->prd_detl[0]["product_name_one"];
                $prd_img = $dat_li->prd_detl[0]['product_image'];
                $msg_body .= '<tr><td>' . ($kyx + 1) . '</td><td>' . $dat_li->brand->brand_name . '</td><td>' . $prd_name . '</td><td><img src="' . HTTP_ROOT_INV . 'files/product_img/' . $prd_img . '" style="width: 80px;"/></td><td style="text-align: center;">' . $dat_li->qty . '</td> <td style="text-align: center;">' . date('Y-m-d') . '</td></tr>';
            }

            $newData = [];
            $last_id = $po_number = '';
            $po_number = rand(111, 999) . uniqid();

            // From URL to get webpage contents.
            $url = HTTP_ROOT . 'appadmins/generatePoPdf/' . json_encode($postData['proceed_id']) . '/' . $postData['brand_id'] . '/' . $po_number;

            // Initialize a CURL session.
            $ch = curl_init();

            // Return Page contents.
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            //grab URL and pass it to the variable.
            curl_setopt($ch, CURLOPT_URL, $url);

            $result = curl_exec($ch);
            //            print_r($result);
            // echo $po_number;
            //exit;
            curl_close($ch);

            if ($result) {
                $filename = 'files/report_pdf/po_' . $po_number . '.pdf';
                $fileulr = HTTP_ROOT . $filename;
                $attachment = WWW_ROOT . $filename;

                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $mail_temp = $this->Settings->find('all')->where(['Settings.name' => 'PO_PLACED'])->first();
                $from = $fromMail->value;
                $subject = $mail_temp->display;

                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_EMAIL'])->first()->value;
                $to = $brand_details->email;
                //            $to = 'debmicrofinet@gmail.com';

                $email_message = '<div style="float:left; width:100%;">
                    <ul style="font-size: 20px;  line-height: 1.4em;  padding: 0px; list-style: none;">
                        <li><b>Brand name : </b> ' . $brand_details->brand_name . ' </li>
                        <li><b>Contact person name : </b> ' . $brand_details->name . ' ' . $brand_details->last_name . ' </li>
                        <li><b>Email : </b> ' . $brand_details->email . ' </li>
                        <li><b>PO number : </b> ' . $po_number . ' </li>
                    </ul>
                </div>
                <div style="margin-top: 20px; float:left; width:100%;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>sl no</th>
                            <th>Brands Name</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th style="width: 10%;text-align: center;">Quantity</th>
                            <th style="width: 10%;text-align: center;">Po date</th>
                            
                        </tr>
                    </thead>
                    <tbody>' . $msg_body . '</tbody>  
                </table>

                </div>';
                $message = $this->Custom->helpformat($mail_temp->value, '', '', $email_message, '', '');
                //            echo $email_message;exit;


                $newData['po_number'] = $po_number;
                $newData['status'] = 1; //1- po placed, 2 - po received, 3- po approved, 0 - po complete            
                $newRw = $this->PurchaseOrders->newEntity();
                $newRw = $this->PurchaseOrders->patchEntity($newRw, $newData);
                $newRw = $this->PurchaseOrders->save($newRw);
                $last_id = $newRw->id;
                $this->PurchaseOrders->updateAll(['pdf_file' => $filename], ['id' => $last_id]);
                $this->PurchaseOrderProducts->updateAll(['po_id' => $last_id, 'po_number' => $po_number, 'status' => 2, 'po_date' => date('Y-m-d')], ['id IN' => $prd_id]);

                $this->Custom->sendEmail($to, $from, $subject, $message, 1, 1, $attachment);
                $this->Custom->sendEmail($toSupport, $from, $subject, $message, 1, 1, $attachment);

                //            $this->set(compact('data_list', 'brand_details', 'po_number'));
                //            if (true) {
                //                // initializing mPDF
                //
                //                $this->Mpdf->init();
                //                // setting filename of output pdf file
                //                $this->Mpdf->setFilename($filename);
                //                // setting output to I, D, F, S
                //                $this->Mpdf->setOutput('F');
                //                // you can call any mPDF method via component, for example:
                //                $this->Mpdf->SetWatermarkText("Draft");
                //            }
                $this->Flash->success(__('Po proceeded.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/existing-brand-po/tab1');
                //            
            }
        }
    }

    public function placeNewbrandPo() {
        //        echo WWW_ROOT;exit;
        $this->viewBuilder()->layout('');

        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');        
        $this->loadModel('InSizes');
        $this->loadModel('InColors');
        $this->loadModel('InProductVariantList');
        $this->loadModel('InProductVariants');

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            // echo "<pre>";
            // print_r($postData);exit;
            if (empty($postData['proceed_id'])) {
                $this->Flash->success(__('No Product found to proceed'));
                return $this->redirect($this->referer());
            }
            $prd_id = explode(',', $postData['proceed_id']);

            $all_sizes = $this->InSizes->find('all')->where(['is_active' => 1]);
            $all_colors = $this->InColors->find('all')->where(['is_active' => 1]);

            $this->InProductVariantList->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

            $tab1_brand_list = $this->InProductVariantList->find('all')->where(['InProductVariantList.po_status' => 1])->group(['InProductVariantList.brand_id'])->contain(['brand']);

            $this->InProductVariantList->belongsTo('prd_detl', ['className' => 'InProductVariants',  'foreignKey' => 'in_product_variants_id']);
            $data_list = $this->InProductVariantList->find('all')->where(['InProductVariantList.po_status' => 1, 'InProductVariantList.id IN' => $prd_id])->contain(['prd_detl', 'brand']);
            
            $brand_details = $this->InUsers->find('all')->where(['id' => $postData['brand_id']])->first();

            $msg_body = '';
            foreach ($data_list as $kyx => $dat_li) {
                $prd_name = $dat_li->prd_detl->product_name_one;
                $prd_img = $dat_li->prd_detl->feature_image;
                $msg_body .= '<tr><td>' . ($kyx + 1) . '</td><td>' . $dat_li->brand->brand_name . '</td><td>' . $prd_name . '</td><td><img src="' . HTTP_ROOT_INV . 'files/product_img/' . $prd_img . '" style="width: 80px;"/></td><td style="text-align: center;">' . $dat_li->qty . '</td> <td style="text-align: center;">' . date('Y-m-d') . '</td></tr>';
            }

            $newData = [];
            $last_id = $po_number = '';
            $po_number = rand(111, 999) . uniqid();

            // From URL to get webpage contents.
            $url = HTTP_ROOT . 'appadmins/generateNewBrandPoPdf/' . json_encode($postData['proceed_id']) . '/' . $postData['brand_id'] . '/' . $po_number;

            // Initialize a CURL session.
            $ch = curl_init();

            // Return Page contents.
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            //grab URL and pass it to the variable.
            curl_setopt($ch, CURLOPT_URL, $url);

            $result = curl_exec($ch);
            // var_dump($result);
            // echo $po_number;
            // exit;
            curl_close($ch);

            if ($result) {
                $filename = 'files/report_pdf/po_' . $po_number . '.pdf';
                $fileulr = HTTP_ROOT . $filename;
                $attachment = WWW_ROOT . $filename;

                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $mail_temp = $this->Settings->find('all')->where(['Settings.name' => 'PO_PLACED'])->first();
                $from = $fromMail->value;
                $subject = $mail_temp->display;

                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_EMAIL'])->first()->value;
                $to = $brand_details->email;
                //            $to = 'debmicrofinet@gmail.com';

                $email_message = '<div style="float:left; width:100%;">
                    <ul style="font-size: 20px;  line-height: 1.4em;  padding: 0px; list-style: none;">
                        <li><b>Brand name : </b> ' . $brand_details->brand_name . ' </li>
                        <li><b>Contact person name : </b> ' . $brand_details->name . ' ' . $brand_details->last_name . ' </li>
                        <li><b>Email : </b> ' . $brand_details->email . ' </li>
                        <li><b>PO number : </b> ' . $po_number . ' </li>
                    </ul>
                </div>
                <div style="margin-top: 20px; float:left; width:100%;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>sl no</th>
                            <th>Brands Name</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th style="width: 10%;text-align: center;">Quantity</th>
                            <th style="width: 10%;text-align: center;">Po date</th>
                            
                        </tr>
                    </thead>
                    <tbody>' . $msg_body . '</tbody>  
                </table>

                </div>';
                $message = $this->Custom->helpformat($mail_temp->value, '', '', $email_message, '', '');
                //            echo $email_message;exit;


                $newData['po_number'] = $po_number;
                $newData['status'] = 1; //1- po placed, 2 - po received, 3- po approved, 0 - po complete            
                $newRw = $this->PurchaseOrders->newEntity();
                $newRw = $this->PurchaseOrders->patchEntity($newRw, $newData);
                $newRw = $this->PurchaseOrders->save($newRw);
                $last_id = $newRw->id;
                $this->PurchaseOrders->updateAll(['pdf_file' => $filename], ['id' => $last_id]);
                $this->InProductVariantList->updateAll(['po_id' => $last_id, 'po_number' => $po_number, 'po_status' => 2, 'po_date' => date('Y-m-d')], ['id IN' => $prd_id]);

                // foreach ($data_list as $kyx => $dat_li) {
                //     $this->InProducts->updateAll(['po_id' => $last_id, 'po_number' => $po_number, 'po_status' => 2], ['prod_id' => $dat_li->product_id]);
                // }

                $this->Custom->sendEmail($to, $from, $subject, $message, 1, 1, $attachment);
                $this->Custom->sendEmail($toSupport, $from, $subject, $message, 1, 1, $attachment);

                //            $this->set(compact('data_list', 'brand_details', 'po_number'));
                //            if (true) {
                //                // initializing mPDF
                //
                //                $this->Mpdf->init();
                //                // setting filename of output pdf file
                //                $this->Mpdf->setFilename($filename);
                //                // setting output to I, D, F, S
                //                $this->Mpdf->setOutput('F');
                //                // you can call any mPDF method via component, for example:
                //                $this->Mpdf->SetWatermarkText("Draft");
                //            }
                $this->Flash->success(__('Po proceeded.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/new-brand-po/tab1');
                //            
            }
        }
        exit;
    }

    public function generateNewBrandPoPdf($product_id, $brand_id, $po_number) {
        $this->viewBuilder()->layout('');

        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');
        $this->loadModel('InSizes');
        $this->loadModel('InColors');
        $this->loadModel('InProductVariantList');
        $this->loadModel('InProductVariants');
        $product_id_arr = json_decode($product_id, true);
        $prd_id = explode(',', $product_id_arr);

        $all_sizes = $this->InSizes->find('all')->where(['is_active' => 1]);
        $all_colors = $this->InColors->find('all')->where(['is_active' => 1]);

        $this->InProductVariantList->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

        
        $this->InProductVariantList->belongsTo('prd_detl', ['className' => 'InProductVariants',  'foreignKey' => 'in_product_variants_id']);
        $data_list = $this->InProductVariantList->find('all')->where(['InProductVariantList.po_status' => 1,'InProductVariantList.id IN' => $prd_id])->contain(['prd_detl', 'brand']);
        $brand_details = $this->InUsers->find('all')->where(['id' => $brand_id])->first();
        $filename = 'files/report_pdf/po_' . $po_number . '.pdf';
        $this->set(compact('data_list', 'brand_details', 'po_number'));

        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename($filename);
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('F');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Drapefit");
        }
    }

    public function generatePoPdf($product_id, $brand_id, $po_number) {
        $this->viewBuilder()->layout('');

        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');
        $product_id_arr = json_decode($product_id, true);
        $prd_id = explode(',', $product_id_arr);
        $this->PurchaseOrderProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

        $this->PurchaseOrderProducts->hasMany('prd_detl', ['className' => 'InProducts', 'foreignKey' => 'prod_id', 'bindingKey' => 'product_id']);
        $data_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.status' => 1, 'PurchaseOrderProducts.id IN' => $prd_id])->contain(['brand', 'prd_detl']);
        $brand_details = $this->InUsers->find('all')->where(['id' => $brand_id])->first();
        $filename = 'files/report_pdf/po_' . $po_number . '.pdf';
        $this->set(compact('data_list', 'brand_details', 'po_number'));

        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename($filename);
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('F');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function completeExistingBrandReceive($product_id, $po_number) {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('InProducts');
        $this->loadModel('InProductLogs');

        $prd_detials = $this->InProducts->find('all')->where(['prod_id' => $product_id])->first()->toArray();
        $po_prd_detials = $this->PurchaseOrderProducts->find('all')->where(['product_id' => $product_id, 'po_number' => $po_number])->first();

        //        pj([$product_id, $po_number]);
        //        pj($prd_detials);
        //        pj($po_prd_detials);

        for ($xiy = 1; $xiy <= $po_prd_detials->qty; $xiy++) {

            $data = [];
            $data = $prd_detials;
            $style_number = str_replace('-' . $prd_detials['id'], '', $prd_detials['style_number']);
            $explode_arr = explode('-', $style_number);
            $raw_style_number = str_replace('-' . end($explode_arr), '', $style_number);
            // print_r([$prd_detials['id'], $prd_detials['style_number'], $style_number, $explode_arr, $raw_style_number]);
            // exit;
            $data['id'] = '';
            if(!empty($po_prd_detials->user_id)){
                $data['allocate_to_user_id'] = $po_prd_detials->user_id;
            }
            if(!empty($po_prd_detials->kid_id)){
                $data['allocate_to_kid_id'] = $po_prd_detials->kid_id;
            }
            $data['style_number'] = '';
            $data['bar_code_img'] = '';
            $data['dtls'] = '';
            $data['is_merchandise'] = 1;
            $data['po_status'] = 3;
            $data['po_number'] = $po_number;
            $data['po_id'] = $po_prd_detials->po_id;
            $data['created'] = date('Y-m-d H:i:s');

            $product = $this->InProducts->newEntity();
            $product = $this->InProducts->patchEntity($product, $data);
            $product = $this->InProducts->save($product);
            $last_id = $product->id;
            $final_style_number = $raw_style_number . '-' . $last_id . '-' . $xiy;
            $this->InProducts->updateAll(['dtls' => $last_id, 'style_number' => $final_style_number, 'is_active' => 0, 'available_status' => 2, 'updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'add'], ['id' => $last_id]);

            $this->PurchaseOrderProducts->updateAll(['status' => 3], ['id' => $po_prd_detials->id]);

            $newDtArr = [];
            $newDtArr['product_id'] = $last_id;
            $newDtArr['user_id'] = $this->request->session()->read('Auth.User.id');
            $newDtArr['action'] = 'add';
            $newDtArr['status'] = 2;
            $newDtArr['created_on'] = date('Y-m-d H:i:s');
            $newDtRow = $this->InProductLogs->newEntity();
            $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newDtArr);
            $this->InProductLogs->save($newDtRow);
        }
        $this->Flash->success(__('Po received.'));
        return $this->redirect($this->referer());
    }

    public function completeNewBrandReceive($product_id, $po_number) {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('InProducts');
        $this->loadModel('InProductLogs');
        $this->loadModel('InProductVariantList');
        $this->loadModel('InProductVariantListPoReceived');
        // print_r([$product_id, $po_number]);
        // exit;

        $po_prd_detials = $this->InProductVariantList->find('all')->where(['id' => $product_id, 'po_number' => $po_number])->first();
        //        pj([$product_id, $po_number]);
        //        pj($prd_detials);
        //        pj($po_prd_detials);   
             
        $this->InProductVariantList->updateAll(['po_status' => 3], ['id' => $po_prd_detials->id]);
            
        $newDataRwX = !empty($po_prd_detials)?$po_prd_detials->toArray():[];
        $newDataRwX['in_product_variant_list_id']=$newDataRwX['id'];
        unset($newDataRwX['id']);
        $newDataRwX['po_status']=3;
        $newRw = $this->InProductVariantListPoReceived->newEntity();
        $newRw = $this->InProductVariantListPoReceived->patchEntity($newRw, $newDataRwX);
        $this->InProductVariantListPoReceived->save($newRw); 
        // echo "<pre>";
        // print_r($newDataRwX); 
        // exit;
        $this->Flash->success(__('Po received.'));
        return $this->redirect($this->referer());
    }

    public function processPoReceived($brand_id) {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('InProducts');
        $this->loadModel('PurchaseOrders');
        $prod_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 0, 'PurchaseOrderProducts.status' => 3, 'PurchaseOrderProducts.brand_id' => $brand_id])->group(['PurchaseOrderProducts.po_number']);

        $po_number_list = !empty($prod_list) ? Hash::extract($prod_list->toArray(), '{n}.po_number') : [];

        print_r($po_number_list);
        foreach ($po_number_list as $po_numb) {
            $this->PurchaseOrderProducts->updateAll(['status' => 4], ['po_number' => $po_numb]);
            $this->PurchaseOrders->updateAll(['status' => 4], ['po_number' => $po_numb]);
            $this->InProducts->updateAll(['po_status' => 4], ['po_number' => $po_numb]);
        }
        $this->Flash->success(__('Po received.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/existing-brand-po/tab4');
    }

    public function processNewbrandPoReceived($brand_id) {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('InProducts');
        $this->loadModel('PurchaseOrders');
        $this->loadModel('InProductVariantList');
        $this->loadModel('InProductVariantListPoReceived');
        $prod_list = $this->InProductVariantList->find('all')->where([ 'InProductVariantList.po_status' => 3, 'InProductVariantList.brand_id' => $brand_id])->group(['InProductVariantList.po_number']);
        $this->InProductVariantListPoReceived->updateAll(['po_status'=>4],['po_status' => 3, 'brand_id' => $brand_id]);

        $po_number_list = !empty($prod_list) ? Hash::extract($prod_list->toArray(), '{n}.po_number') : [];

        // print_r($po_number_list);
        foreach ($prod_list as $po_numb) {
            $this->InProductVariantList->updateAll(['quantity' => ($po_numb->quantity+$po_numb->po_quantity), 'po_status'=>4], ['id' => $po_numb->id]);
            // $product_created = $this->generateProduct($po_numb->id,'po');  
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => HTTP_ROOT.'appadmins/generateProduct/'.$po_numb->id.'/po',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);  
            // var_dump($response );

        }
        exit;
        $this->Flash->success(__('Po received.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/new-brand-po/tab4');
    }

    public function newBrandPo($tab = null, $option = null, $id = null) {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');
        $this->loadModel('InProducts');
        $this->loadModel('InSizes');
        $this->loadModel('InColors');
        $this->loadModel('InProductVariantList');
        $this->loadModel('InProductVariants');
        $this->loadModel('InProductVariantListPoReceived');

        $all_sizes = $this->InSizes->find('all')->where(['is_active' => 1, 'product_ctg LIKE'=>'%"'.$_GET['ctg'].'"%' ]);
        $all_colors = $this->InColors->find('all')->where(['is_active' => 1]);

        $this->InProductVariantList->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

        $this->InProductVariantList->belongsTo('user_dtl', ['className' => 'UserDetails', 'foreignKey' => 'allocate_user_id', 'bindingKey'=>'user_id']);
        $this->InProductVariantList->belongsTo('user', ['className' => 'Users', 'foreignKey' => 'allocate_user_id']);
        $this->InProductVariantList->belongsTo('kid_dt', ['className' => 'KidsDetails', 'foreignKey' => 'allocate_kid_id']);

        $tab1_brand_list = $this->InProductVariantList->find('all')->where(['InProductVariantList.po_status' => 1])->group(['InProductVariantList.brand_id'])->contain(['brand']);

        $this->InProductVariantList->belongsTo('prd_detl', ['className' => 'InProductVariants',  'foreignKey' => 'in_product_variants_id']);
        $tab1_data_list = $this->InProductVariantList->find('all')->contain(['prd_detl', 'brand','user','kid_dt','user_dtl']);

        if (empty($tab) || ($tab == 'tab1')) {
            $tab1_data_list = $tab1_data_list->where(['InProductVariantList.po_status' => 1]);
            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['InProductVariantList.brand_id' => $_GET['brand_id']]);
            }
        }

        if (!empty($tab) && ($tab == 'tab2')) {
            $tab1_brand_list = $this->InProductVariantList->find('all')->where(['InProductVariantList.po_status IN' => [2, 3]])->group(['InProductVariantList.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['InProductVariantList.po_status IN' => [2, 3], 'InProductVariantList.brand_id' => $_GET['brand_id']]);
            }
        }
        if (!empty($tab) && ($tab == 'tab3')) {
            $tab1_brand_list = $this->InProductVariantList->find('all')->where(['InProductVariantList.po_status IN' => [2, 3]])->group(['InProductVariantList.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['InProductVariantList.po_status IN' => [2, 3], 'InProductVariantList.brand_id' => $_GET['brand_id']]);
            }
        }
        if (!empty($tab) && ($tab == 'tab4')) {
            $this->InProductVariantListPoReceived->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

            $this->InProductVariantListPoReceived->belongsTo('user_dtl', ['className' => 'UserDetails', 'foreignKey' => 'allocate_user_id', 'bindingKey'=>'user_id']);
            $this->InProductVariantListPoReceived->belongsTo('user', ['className' => 'Users', 'foreignKey' => 'allocate_user_id']);
            $this->InProductVariantListPoReceived->belongsTo('kid_dt', ['className' => 'KidsDetails', 'foreignKey' => 'allocate_kid_id']);
            $this->InProductVariantListPoReceived->belongsTo('prd_detl', ['className' => 'InProductVariants',  'foreignKey' => 'in_product_variants_id']);
            $tab1_brand_list = $this->InProductVariantListPoReceived->find('all')->where(['InProductVariantListPoReceived.po_status >' => 3])->group(['InProductVariantListPoReceived.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $this->InProductVariantListPoReceived->find('all')->contain(['prd_detl', 'brand','user','kid_dt', 'user_dtl'])->where(['InProductVariantListPoReceived.po_status >' => 3, 'InProductVariantListPoReceived.brand_id' => $_GET['brand_id']]);
            }
        }



        $editproduct = [];

        $in_rack = [];

        $user_type_arr = ['Men' => '1', 'Women' => '2', 'BoyKids' => '3', 'GirlKids' => '4'];
        $profile = $option;
        if (empty($profile)) {
            $profile = "Men";
        }

        $get_prv_inv_data = [];
        if(!empty($_GET['ctg']) && !empty($_GET['sub_ctg'])){
            $this->InProductVariants->hasMany('vari_prd_li', ['className' => 'InProductVariantList', 'foreignKey' => 'in_product_variants_id']);
            $get_prv_inv_data = $this->InProductVariants->find('all')->where(['profile_type' => $user_type_arr[$profile], 'product_type'=>$_GET['ctg'], 'rack'=>$_GET['sub_ctg']])->contain(['vari_prd_li']);
        }

        $product_ctg_nme = '';
        $product_sub_ctg_nme = '';

        if (!empty($id)) {

            $editproduct = $this->InProducts->find('all')->where(['id' => $id])->first();

            $productType_name_get = $this->InProductType->find('all')->where(['user_type' => $editproduct->profile_type])->where(['id' => $editproduct->product_type])->first();
            $product_ctg_nme = $productType_name_get->product_type;
            $in_rack = $this->InRack->find('all')->where(['in_product_type_id' => $editproduct->product_type])->order(['sort_order' => 'ASC']);

            if (!empty($editproduct->product_type) && !empty($editproduct->rack)) {

                $in_rack_name_get = $this->InRack->find('all')->where(['in_product_type_id' => $editproduct->product_type])->where(['id' => $editproduct->rack])->first();
                $product_sub_ctg_nme = $in_rack_name_get->rack_number;
            }
        }



        $utype = $this->request->session()->read('Auth.User.type');

        $getExstingProductBrndList = $this->InProducts->find('all')->group(['brand_id']);
        // $allExistingBrand = !empty($getExstingProductBrndList) ? Hash::extract($getExstingProductBrndList->toArray(), '{n}.brand_id') : [];
        //        echo "<pre>";count($allExistingBrand);echo implode(',',array_filter($allExistingBrand));
        // $brandsListings = $this->InUsers->find('all')->where(['type' => 3, 'id NOT IN' => array_filter($allExistingBrand)])->order(['id']);
        $brandsListings = $this->InUsers->find('all')->where(['type' => 3, 'is_collaborated' => 1])->order(['id']);
        //        print_r(!empty($brandsListings) ? Hash::extract($brandsListings->toArray(), '{n}.id') : []);exit;

        $productType = $this->InProductType->find('all')->where(['user_type' => $user_type_arr[$profile]])->order(['sort_order' => 'ASC']);

        if (!empty($_GET['ctg'])) {
            $productType_name_get = $this->InProductType->find('all')->where(['user_type' => $user_type_arr[$profile]])->where(['id' => $_GET['ctg']])->first();
            $product_ctg_nme = $productType_name_get->product_type;
            $in_rack = $this->InRack->find('all')->where(['in_product_type_id' => $_GET['ctg']])->order(['sort_order' => 'ASC']);
        }
        if (!empty($_GET['ctg']) && !empty($_GET['sub_ctg'])) {

            $in_rack_name_get = $this->InRack->find('all')->where(['in_product_type_id' => $_GET['ctg']])->where(['id' => $_GET['sub_ctg']])->first();
            $product_sub_ctg_nme = $in_rack_name_get->rack_number;
        }

        $this->set(compact('utype', 'in_rack', 'productType', 'id', 'editproduct', 'profile', 'brandsListings', 'product_ctg_nme', 'product_sub_ctg_nme', 'tab', 'option', 'id', 'tab1_brand_list', 'tab1_data_list', 'all_sizes', 'all_colors', 'get_prv_inv_data'));
    }

    public function addPoProduct() {

        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');

        $editproduct = [];

        $in_rack = [];

        $user_type_arr = ['Men' => '1', 'Women' => '2', 'BoyKids' => '3', 'GirlKids' => '4'];

        if (empty($profile)) {
            $profile = "Men";
        }

        $product_ctg_nme = '';
        $product_sub_ctg_nme = '';

        if (!empty($id)) {

            $editproduct = $this->InProducts->find('all')->where(['id' => $id])->first();

            $productType_name_get = $this->InProductType->find('all')->where(['user_type' => $editproduct->profile_type])->where(['id' => $editproduct->product_type])->first();
            $product_ctg_nme = $productType_name_get->product_type;
            $in_rack = $this->InRack->find('all')->where(['in_product_type_id' => $editproduct->product_type])->order(['sort_order' => 'ASC']);

            if (!empty($editproduct->product_type) && !empty($editproduct->rack)) {

                $in_rack_name_get = $this->InRack->find('all')->where(['in_product_type_id' => $editproduct->product_type])->where(['id' => $editproduct->rack])->first();
                $product_sub_ctg_nme = $in_rack_name_get->rack_number;
            }
        }



        $utype = $this->request->session()->read('Auth.User.type');

        if ($this->request->is('post')) {
            $data = $this->request->data;

            foreach ($data as $d_ix => $d_dd) {

                if (empty($data[$d_ix])) {

                    if ((@$data['jeans'] == 0) || (@$data['jeans'] == 00) || (@$data['pants'] == 0) || (@$data['pants'] == 00)) {
                        
                    } else {

                        unset($data[$d_ix]);
                    }
                }
            }

            //              echo "<pre>";
            //              
            //                    
            //                     print_r($file_path.PRODUCT_IMAGES);
            //                     echo "</pre>";
            //                     exit;

            $avatarName = "";

            if (!empty($data['product_image']['tmp_name'])) {

                if ($data['product_image']['size'] <= 2100000) {

                    $file_path = str_replace('merchandise', 'inventory/webroot/', ROOT);
                    $avatarName = $this->Custom->uploadAvatarImage($data['product_image']['tmp_name'], $data['product_image']['name'], $file_path . PRODUCT_IMAGES, 500);

                    //                    echo $file_path.PRODUCT_IMAGES.$avatarName;exit;
                } else {

                    $this->Flash->error(__('Image size should be 8  to 20 kb'));

                    //                    exit;
                }
            } else {

                $dataEdit = $this->InProducts->find('all')->where(['id' => $data['id']])->first();

                $avatarName = $dataEdit->product_image;
            }



            if (!empty($data['profession'])) {

                $data['profession'] = json_encode($data['profession']);
            }

            if (!empty($data['season'])) {

                $data['season'] = json_encode($data['season']);
            }

            if (!empty($data['work_type'])) {

                $data['work_type'] = json_encode($data['work_type']);
            }

            if (!empty($data['style_sphere_selections_v5'])) {

                $data['style_sphere_selections_v5'] = json_encode($data['style_sphere_selections_v5']);
            }

            if (!empty($data['skin_tone'])) {

                $data['skin_tone'] = json_encode($data['skin_tone']);
            }

            if (!empty($data['take_note_of'])) {

                $data['take_note_of'] = json_encode($data['take_note_of']);
            }

            if (!empty($data['occasional_dress'])) {

                $data['occasional_dress'] = json_encode($data['occasional_dress']);
            }

            if (!empty($data['better_body_shape'])) {

                $data['better_body_shape'] = json_encode($data['better_body_shape']);
            }

            if (!empty($data['wo_top_half'])) {

                $data['wo_top_half'] = json_encode($data['wo_top_half']);
            }

            if (!empty($data['wo_style_insp'])) {

                $data['wo_style_insp'] = json_encode($data['wo_style_insp']);
            }

            if (!empty($data['denim_styles'])) {

                $data['denim_styles'] = json_encode($data['denim_styles']);
            }

            if (!empty($data['style_sphere_selections_v3'])) {

                $data['style_sphere_selections_v3'] = json_encode($data['style_sphere_selections_v3']);
            }

            if (!empty($data['outfit_prefer'])) {

                $data['outfit_prefer'] = json_encode($data['outfit_prefer']);
            }

            if (empty($data['primary_size'])) {
                $this->Flash->error(__('Size not selected'));
                return $this->redirect($this->referer());
            }


            $up_data_id = '';

            $my_rnd = rand(111, 999) . time();
            if ($data['quantity'] < 1) {
                $this->Flash->error(__('Quantity must be 1 or greater.'));
                return $this->redirect($this->referer());
            }
            $newDataRwX = [];
            $newDataRwX['qty'] = $data['quantity'];
            $newDataRwX['brand_id'] = $data['brand_id'];
            for ($ix = 1; $ix <= $data['quantity']; $ix++) {

                $product = $this->InProducts->newEntity();

                $product->id = '';

                $product->user_id = $this->request->session()->read('Auth.User.id');

                if (!empty($data['budget_type'])) {

                    $data['budget_value'] = $data[$data['budget_type']];
                }

                unset($data['wo_top_budg']);

                unset($data['wo_bottoms_budg']);

                unset($data['wo_outerwear_budg']);

                unset($data['wo_jeans_budg']);

                unset($data['wo_jewelry_budg']);

                unset($data['wo_accessories_budg']);

                unset($data['wo_dress_budg']);

                unset($data['men_shirt_budg']);

                unset($data['men_polos_budg']);

                unset($data['men_sweater_budg']);

                unset($data['men_pants_budg']);

                unset($data['men_shorts_budg']);

                unset($data['men_shoe_budg']);

                unset($data['men_outerwear_budg']);

                unset($data['men_ties_budg']);

                unset($data['men_belts_budg']);

                unset($data['men_bags_budg']);

                unset($data['men_sunglass_budg']);

                unset($data['men_hats_budg']);

                unset($data['men_socks_budg']);

                unset($data['men_underwear_budg']);

                unset($data['men_grooming_budg']);

                $product = $this->InProducts->patchEntity($product, $data);

                $product->quantity = 1;

                $product->is_active = 1;

                $product->product_image = $avatarName;

                $product->created = date("Y-m-d H:i:s");

                if (!empty($data['profile_type']) && ($data['profile_type'] == '1')) {



                    $profile = "MEN";

                    $nw_profile = "M";
                } else if (!empty($data['profile_type']) && ($data['profile_type'] == 2)) {



                    $profile = "WOM";

                    $nw_profile = "W";
                } else if (!empty($data['profile_type']) && ($data['profile_type'] == 3)) {



                    $profile = "BOY";

                    $nw_profile = "B";
                } else if (!empty($data['profile_type']) && ($data['profile_type'] == 4)) {



                    $profile = "GIRL";

                    $nw_profile = "G";
                }





                if (@$data['primary_size'] == 'shirt_size') {

                    $size = $data['shirt_size'];
                } else if (@$data['primary_size'] == 'shoe_size') {

                    $size = $data['shoe_size'];
                } else if (@$data['primary_size'] == 'waist_size') {

                    $size = $data['waist_size'];
                } else if (@$data['primary_size'] == 'wshoe_size') {

                    $size = $data['shoe_size'];
                } else if (@$data['primary_size'] == 'dress_size') {

                    $size = $data['dress'];
                } else if (@$data['primary_size'] == 'skirt_size') {

                    $size = $data['skirt'];
                } else if (@$data['primary_size'] == 'bra_size') {

                    $size = $data['bra'];
                } else if (@$data['primary_size'] == 'paint_size') {

                    $size = $data['pants'];
                } else if (@$data['primary_size'] == 'top_size') {

                    $size = $data['pantsr1'];
                } else if (@$data['primary_size'] == 'blouse_size') {

                    $size = $data['shirt_blouse'];
                } else if (@$data['primary_size'] == 'blouse_size') {

                    $size = $data['shirt_blouse'];
                } else if (@$data['primary_size'] == 'jeans') {

                    $size = $data['jeans'];
                } else if (@$data['primary_size'] == 'active_wr') {

                    $size = $data['active_wr'];
                } else if (@$data['primary_size'] == 'wo_jackect_size') {

                    $size = $data['wo_jackect_size'];
                } else if (@$data['primary_size'] == 'wo_bottom') {

                    $size = $data['wo_bottom'];
                } else if (@$data['primary_size'] == 'men_bottom') {

                    $size = $data['men_bottom'];
                } else if (@$data['primary_size'] == 'free_size') {

                    $size = 'F';
                }



                $picked_size = '';

                if (!empty($data['primary_size'])) {

                    if ($data['primary_size'] == "waist_size") {

                        $picked_size = "waist_size-waist_size_run";

                        if (!empty($data['profile_type']) && ($data['profile_type'] == '1')) {

                            $picked_size = "waist_size-waist_size_run-inseam_size";
                        }
                    }

                    if ($data['primary_size'] == "shirt_size") {

                        $picked_size = "shirt_size-shirt_size_run";
                    }

                    if ($data['primary_size'] == "shoe_size") {

                        $picked_size = "shoe_size-shoe_size_run";
                    }

                    if ($data['primary_size'] == "paint_size") {

                        $picked_size = "pants";
                    }

                    if ($data['primary_size'] == "bra_size") {

                        $picked_size = "bra-bra_recomend";
                    }

                    if ($data['primary_size'] == "skirt_size") {

                        $picked_size = "skirt";
                    }

                    if ($data['primary_size'] == "dress_size") {

                        $picked_size = "dress-dress_recomended";
                    }

                    if ($data['primary_size'] == "blouse_size") {

                        $picked_size = "shirt_blouse-shirt_blouse_recomend";
                    }

                    if ($data['primary_size'] == "top_size") {

                        $picked_size = "pantsr1-pantsr2";
                    }

                    if ($data['primary_size'] == "wshoe_size") {

                        $picked_size = "shoe_size-womenHeelHightPrefer-shoe_size_run";
                    }

                    if ($data['primary_size'] == "jeans") {

                        $picked_size = "jeans";
                    }

                    if ($data['primary_size'] == "active_wr") {

                        $picked_size = "active_wr";
                    }

                    if ($data['primary_size'] == "wo_jackect_size") {

                        $picked_size = "wo_jackect_size";
                    }

                    if ($data['primary_size'] == "wo_bottom") {

                        $picked_size = "wo_bottom";
                    }

                    if ($data['primary_size'] == "men_bottom") {

                        $picked_size = "men_bottom";
                    }





                    if (in_array($profile, ["BOY", "GIRL"])) {

                        if ($data['primary_size'] == "top_size") {

                            $picked_size = "top_size";

                            $size = $data['top_size'];
                        }

                        if ($data['primary_size'] == "bottom_size") {

                            $picked_size = "bottom_size";

                            $size = $data['bottom_size'];
                        }

                        if ($data['primary_size'] == "shoe_size") {

                            $picked_size = "shoe_size";

                            $size = $data['shoe_size'];
                        }
                    }

                    //                 var_dump([in_array($profile, ["BOY", "GIRL"]),$picked_size]);exit;
                }

                $product->picked_size = $picked_size;

                $brand = @$data['brand_id'];

                $rack = @$data['rack'];

                $ptype = @$data['product_type'];

                $qty = @$data['quantity'];

                //            @$dtls = $this->Custom->dtls($profile, $brand, @$rack, $ptype, $size, $qty);

                @$dtls = $this->Custom->dtls($nw_profile, $brand, @$rack, $ptype, $size, $qty);

                $product->dtls = $dtls;

                $product->rack = $rack;

                $product->p_type = $ptype;

                if ($this->InProducts->save($product)) {



                    //                        echo "<pre>";
                    //                        echo $dtls;
                    //                        print_r($product);
                    //                        echo "</pre>";



                    $last_id = $product->id;

                    //                        $this->InProducts->updateAll(['is_active' => 0, 'available_status' => 2], ['id' => $last_id]);
                    //                        $this->InProducts->updateAll(['is_active' => 0, 'available_status' => 2, 'updated_by'=>$this->request->session()->read('Auth.User.id'),'updated_date'=>date('Y-m-d H:i:s'), 'action'=>'add'], ['id' => $last_id]);

                    $this->InProducts->updateAll(['action' => 'add'], ['id' => $last_id]);

                    $newDtArr = [];

                    $newDtArr['product_id'] = $last_id;

                    $newDtArr['user_id'] = $this->request->session()->read('Auth.User.id');

                    $newDtArr['action'] = 'add';

                    $newDtArr['status'] = 2;

                    $newDtArr['created_on'] = date('Y-m-d H:i:s');

                    $newDtRow = $this->InProductLogs->newEntity();

                    $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newDtArr);

                    $this->InProductLogs->save($newDtRow);

                    //                        echo "<pre>";
                    //                        echo $last_id;
                    //                        print_r($product);
                    //                        echo "</pre>";
                    //                        exit;



                    if (empty($last_id)) {

                        $last_id = $this->InProducts->find('all')->order(['id' => 'DESC'])->first()->id;
                    }

                    $prd_id = $dtls . "-" . $my_rnd;

                    $style_number = $dtls . '-' . $last_id . '-' . $ix;

                    $dtls = $last_id /* . '-' . $ix */;

                    //                        echo "<pre>";
                    //                        echo "<br>-" . $last_id;
                    //                        echo "<br>--" . $prd_id;
                    //                        echo "<br>---" . $dtls;
                    //                        echo "</pre>";
                    //Need to add code for update time no need to create                       



                    $this->InProducts->updateAll(['dtls' => $dtls, 'prod_id' => $prd_id, 'style_number' => $style_number], ['id' => $last_id]);

                    //echo $profile; exit;
                    //pj($product); exit;
                }
            }




            /* echo "<pre>";

              print_r($newDtArr); */

            $missingFields = "";

            $all_product_ids = $newDtArr['product_id'];

            if (!empty($all_product_ids)) {

                $this->InProducts->belongsTo('rak', ['className' => 'InRack', 'foreignKey' => 'rack']);

                $this->InProducts->belongsTo('ctg', ['className' => 'InProductType', 'foreignKey' => 'product_type']);

                $this->InProducts->hasMany('emp_log', ['className' => 'InProductLogs', 'foreignKey' => 'product_id'])->setConditions(['emp_log.user_id' => $_GET['employee']]);

                $prd_li = $this->InProducts->find('all')->where(['InProducts.id' => $all_product_ids])->contain(['emp_log', 'ctg', 'rak'])->first();

                $profile_type = $prd_li->profile_type;

                $product_prod_id = $prd_li->prod_id;

                if ($profile_type == 1) {

                    $chk_fld_empty = [
                        'profile_type' => 'Gender/Profile Type',
                        'product_type' => 'Product Category',
                        'rack' => 'Product Sub-Category',
                        'product_name_one' => 'Product Name1',
                        //                        'product_name_two' => 'Product Name2',
                        'season' => 'Season',
                        'tall_feet' => 'Height Range',
                        'tall_feet2' => 'Height Range',
                        'best_fit_for_weight' => 'Weight Range',
                        'best_fit_for_weight2' => 'Weight Range',
                        'age1' => 'Age',
                        'age2' => 'Age',
                        //                        'profession' => 'Profession',
                        //                        'best_size_fit' => 'Best Size fit',
                        'better_body_shape' => 'Body Shape',
                        'skin_tone' => 'Skin Tone',
                        'skin_tone' => 'Skin Tone',
                        'work_type' => 'Typically wear to work?',
                        //                        'style_sphere_selections_v5' => 'Prefer to wear',
                        'take_note_of' => 'Any Fit issue',
                        'purchase_price' => 'Purchase Price',
                        'sale_price' => 'Sale Price',
                        'quantity' => 'Quantity',
                        'brand_id' => 'Brand Name',
                        'product_image' => 'Image',
                        'color' => 'Product Color'
                    ];

                    $prd_empty_fld = [];

                    foreach ($chk_fld_empty as $cfe_ky => $cfe_li) {

                        $flddd = $prd_li->$cfe_ky;

                        if (empty($flddd) || in_array($flddd, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = $cfe_li;
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["B1"])) {

                        if (empty($prd_li->casual_shirts_type) || in_array($prd_li->casual_shirts_type, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Casual Shirts to fit';
                        }

                        if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Shirts Size';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["B2", "B11"])) {

                        if (empty($prd_li->casual_shirts_type) || in_array($prd_li->casual_shirts_type, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Casual Shirts to fit';
                        }

                        if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Shirts Size';
                        }

                        if (empty($prd_li->bottom_up_shirt_fit) || in_array($prd_li->bottom_up_shirt_fit, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Button up shirt to fit';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["B3", "B4"])) {

                        if ((empty($prd_li->waist_size) || in_array($prd_li->waist_size, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Waist size';
                        }

                        if ((empty($prd_li->inseam_size) || in_array($prd_li->inseam_size, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Inseam size';
                        }

                        if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Bottom Size';
                        }

                        if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Bottom Fit';
                        }

                        if (empty($prd_li->bottom_up_shirt_fit) || in_array($prd_li->bottom_up_shirt_fit, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Jeans to fit';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["B5"])) {

                        if ((empty($prd_li->waist_size) || in_array($prd_li->waist_size, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Waist size';
                        }

                        if ((empty($prd_li->inseam_size) || in_array($prd_li->inseam_size, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Inseam size';
                        }

                        if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Bottom Size';
                        }

                        if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Bottom Fit';
                        }

                        if (empty($prd_li->bottom_up_shirt_fit) || in_array($prd_li->bottom_up_shirt_fit, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Jeans to fit';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["B6"])) {

                        if ((empty($prd_li->waist_size) || in_array($prd_li->waist_size, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Waist size';
                        }

                        if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Bottom Size';
                        }

                        if (empty($prd_li->shorts_long) || in_array($prd_li->shorts_long, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Shorts long';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["B7"])) {

                        if (empty($prd_li->casual_shirts_type) || in_array($prd_li->casual_shirts_type, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Casual Shirts to fit';
                        }

                        if (empty($prd_li->shirt_size) || in_array($prd_li->shirt_size, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Shirts Size';
                        }

                        if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Bottom Size';
                        }

                        if (empty($prd_li->shorts_long) || in_array($prd_li->shorts_long, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Shorts long';
                        }

                        if (empty($prd_li->men_bottom_prefer) || in_array($prd_li->men_bottom_prefer, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Bottom Fit';
                        }

                        if (empty($prd_li->jeans_Fit) || in_array($prd_li->jeans_Fit, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Jeans Fit';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["B14"])) {

                        if (!empty($prd_li->primary_size) && ($prd_li->primary_size == "free_size")) {

                            $prd_empty_fld[] = 'FREE SIZE';
                        }
                    }

                    $missingFields = implode(',&nbsp;&nbsp;', array_unique($prd_empty_fld));
                }

                if ($profile_type == 2) {

                    $chk_fld_empty = [
                        'profile_type' => 'Gender/Profile Type',
                        'product_type' => 'Product Category',
                        'rack' => 'Product Sub-Category',
                        'product_name_one' => 'Product Name1',
                        //                        'product_name_two' => 'Product Name2',
                        'season' => 'Season',
                        'tall_feet' => 'Height Range',
                        'tall_feet2' => 'Height Range',
                        'best_fit_for_weight' => 'Weight Range',
                        'best_fit_for_weight2' => 'Weight Range',
                        'age1' => 'Age',
                        'age2' => 'Age',
                        //                        'profession' => 'Profession',
                        //                        'occasional_dress' => 'Occasions',
                        'better_body_shape' => 'Body Shape',
                        'purchase_price' => 'Purchase Price',
                        'sale_price' => 'Sale Price',
                        'quantity' => 'Quantity',
                        'brand_id' => 'Brand Name',
                        'product_image' => 'Image',
                        'color' => 'Product Color',
                        //                        'style_sphere_selections_v3' => 'Outfit to wear',
                        'skin_tone' => 'Skin Tone',
                        'available_status' => 'Available status',
                    ];

                    $prd_empty_fld = [];

                    foreach ($chk_fld_empty as $cfe_ky => $cfe_li) {

                        $flddd = $prd_li->$cfe_ky;

                        if (empty($flddd) || in_array($flddd, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = $cfe_li;
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["A1"])) {

                        if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'SHIRT & BLOUSE';
                        }

                        if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Style Inspiration';
                        }

                        if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top half';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top type';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }
                        //                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Shoulders?';
                        //                        }

                        if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Arms?';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["A2"])) {

                        if (empty($prd_li->dress) || in_array($prd_li->dress, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Dress';
                        }

                        if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Style Inspiration';
                        }

                        if (empty($prd_li->wo_dress_length) || in_array($prd_li->wo_dress_length, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Dress length';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }
                        //                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Shoulders?';
                        //                        }

                        if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Arms?';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["A3"])) {

                        if (empty($prd_li->dress) || in_array($prd_li->dress, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Dress';
                        }

                        if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Style Inspiration';
                        }

                        if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top half';
                        }

                        if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top type';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }
                        //                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Shoulders?';
                        //                        }

                        if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Arms?';
                        }

                        if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Legs?';
                        }

                        //                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Hips ?';
                        //                        }

                        if (empty($prd_li->wo_pant_length) || in_array($prd_li->wo_pant_length, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant Length';
                        }

                        if (empty($prd_li->wo_pant_style) || in_array($prd_li->wo_pant_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant style';
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["A4"]) && in_array($prd_li->rak->rack_number, ["A41", "A42", "A47"])) {

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }

                        if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Legs?';
                        }

                        //                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Hips ?';
                        //                        }

                        if (empty($prd_li->wo_pant_length) || in_array($prd_li->wo_pant_length, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant Length';
                        }

                        if (empty($prd_li->wo_pant_rise) || in_array($prd_li->wo_pant_rise, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant Rise';
                        }

                        if (empty($prd_li->wo_pant_style) || in_array($prd_li->wo_pant_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant style';
                        }

                        if (empty($prd_li->pants) || in_array($prd_li->pants, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pants';
                        }

                        if (empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'BOTTOM SIZE';
                        }

                        if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Bottoms type';
                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A4"]) && in_array($prd_li->rak->rack_number, ["A43", "A45"])) {

                        if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top half';
                        }

                        if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top type';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }

                        if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Style Inspiration';
                        }

                        //                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Shoulders?';
                        //                        }

                        if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Arms?';
                        }

                        if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'SHIRT & BLOUSE';
                        }

                        if (empty($prd_li->active_wr) || in_array($prd_li->active_wr, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'ACTIVE WEAR SIZE';
                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A4"]) && in_array($prd_li->rak->rack_number, ["A44"])) {

                        if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top half';
                        }

                        if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top type';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }

                        if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Style Inspiration';
                        }

                        if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'SHIRT & BLOUSE';
                        }

                        if (empty($prd_li->active_wr) || in_array($prd_li->active_wr, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'ACTIVE WEAR SIZE';
                        }

                        if (empty($prd_li->bra) || in_array($prd_li->bra, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'BRA';
                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A4"]) && in_array($prd_li->rak->rack_number, ["A46"])) {

                        if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'SHIRT & BLOUSE';
                        }

                        if (empty($prd_li->active_wr) || in_array($prd_li->active_wr, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'ACTIVE WEAR SIZE';
                        }

                        if (empty($prd_li->pants) || in_array($prd_li->pants, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pants';
                        }

                        if (empty($prd_li->bra) || in_array($prd_li->bra, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'BRA SIZE';
                        }

                        if (empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'BOTTOM SIZE';
                        }

                        if (empty($prd_li->wo_jackect_size) || in_array($prd_li->wo_jackect_size, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'JACKET SIZE';
                        }
                    }





                    if (in_array($prd_li->ctg->product_type, ["A5"])) {

                        if (empty($prd_li->jeans) || in_array($prd_li->jeans, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'JEANS SIZE';
                        }

                        if (empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'BOTTOM SIZE';
                        }

                        if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Style Inspiration';
                        }

                        if (empty($prd_li->wo_pant_rise) || in_array($prd_li->wo_pant_rise, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant Rise';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Bottoms type';
                        }

                        if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Legs?';
                        }

                        //                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Hips ?';
                        //                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A6"])) {

                        if (empty($prd_li->skirt) || in_array($prd_li->skirt, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'SKIRT SIZE';
                        }

                        if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Style Inspiration';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Bottoms type';
                        }

                        if (empty($prd_li->wo_dress_length) || in_array($prd_li->wo_dress_length, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Dress length';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }

                        if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Legs?';
                        }

                        //                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Hips ?';
                        //                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A7"])) {

                        if (empty($prd_li->jeans) || in_array($prd_li->jeans, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'JEANS SIZE';
                        }

                        if ((empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Bottom Size';
                        }

                        if (empty($prd_li->wo_pant_length) || in_array($prd_li->wo_pant_length, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant Length';
                        }

                        if (empty($prd_li->wo_pant_rise) || in_array($prd_li->wo_pant_rise, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant Rise';
                        }

                        if (empty($prd_li->wo_pant_style) || in_array($prd_li->wo_pant_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant style';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Bottoms type';
                        }

                        if (empty($prd_li->denim_styles) || in_array($prd_li->denim_styles, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Denim styles?';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }

                        if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Legs?';
                        }

                        //                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Hips ?';
                        //                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A8"])) {

                        if (empty($prd_li->jeans) || in_array($prd_li->jeans, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'JEANS SIZE';
                        }

                        if ((empty($prd_li->wo_bottom) || in_array($prd_li->wo_bottom, ['NULL', 'null', '']))) {

                            $prd_empty_fld[] = 'Bottom Size';
                        }

                        if (empty($prd_li->wo_pant_length) || in_array($prd_li->wo_pant_length, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant Length';
                        }

                        if (empty($prd_li->wo_pant_rise) || in_array($prd_li->wo_pant_rise, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant Rise';
                        }

                        if (empty($prd_li->wo_pant_style) || in_array($prd_li->wo_pant_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Pant style';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        if (empty($prd_li->wo_bottom_style) || in_array($prd_li->wo_bottom_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Bottoms type';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }

                        if (empty($prd_li->proportion_legs) || in_array($prd_li->proportion_legs, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Legs?';
                        }

                        //                        if (empty($prd_li->proportion_hips) || in_array($prd_li->proportion_hips, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Hips ?';
                        //                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A9", "A10", "A11", "A12"])) {

                        if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'SHIRT & BLOUSE';
                        }

                        if (empty($prd_li->wo_style_insp) || in_array($prd_li->wo_style_insp, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Style Inspiration';
                        }

                        //                        if ((empty($prd_li->men_bottom) || in_array($prd_li->men_bottom, ['NULL', 'null', '']))) {
                        //                            $prd_empty_fld[] = 'Bottom Size';
                        //                        }

                        if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top half';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top type';
                        }

                        //                        if (empty($prd_li->missing_from_your_fIT) || in_array($prd_li->missing_from_your_fIT, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Missing from fit/your closet?';
                        //                        }
                        //                        if (empty($prd_li->wo_dress_length) || in_array($prd_li->wo_dress_length, ['NULL', 'null', ''])) {
                        //
                        //                            $prd_empty_fld[] = 'Dress length';
                        //                        }
                        //                        if (empty($prd_li->proportion_shoulders) || in_array($prd_li->proportion_shoulders, ['NULL', 'null', ''])) {
                        //                            $prd_empty_fld[] = 'Shoulders?';
                        //                        }

                        if (empty($prd_li->proportion_arms) || in_array($prd_li->proportion_arms, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Arms?';
                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A14"]) && in_array($prd_li->rak->rack_number, ["A141", "A142", "A143", "A144", "A145", "A146", "A147", "A148", "A149", "A1410", "A1412"])) {



                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        if (!empty($prd_li->primary_size) && ($prd_li->primary_size == "free_size")) {

                            $prd_empty_fld[] = 'FREE SIZE';
                        }
                    }



                    if (in_array($prd_li->ctg->product_type, ["A14"]) && in_array($prd_li->rak->rack_number, ["A1411"])) {

                        if (empty($prd_li->shirt_blouse) || in_array($prd_li->shirt_blouse, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'SHIRT & BLOUSE';
                        }

                        if (empty($prd_li->wo_top_half) || in_array($prd_li->wo_top_half, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top half';
                        }

                        if (empty($prd_li->wo_appare) || in_array($prd_li->wo_appare, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Appare type';
                        }

                        if (empty($prd_li->wo_top_style) || in_array($prd_li->wo_top_style, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = 'Top type';
                        }
                    }

                    $missingFields = implode(', ', array_unique($prd_empty_fld));
                }

                if ($profile_type == 3) {
                    $chk_fld_empty = [
                        'profile_type' => 'Gender/Profile Type',
                        'product_type' => 'Product Category',
                        'rack' => 'Product Sub-Category',
                        'product_name_one' => 'Product Name1',
                        'season' => 'Season',
                        'tall_feet' => 'Height Range',
                        'tall_feet2' => 'Height Range',
                        'best_fit_for_weight' => 'Weight Range',
                        'best_fit_for_weight2' => 'Weight Range',
                        'age1' => 'Age',
                        'age2' => 'Age',
                        'kid_body_shape' => 'Body Shape',
                        'brand_id' => 'Brand Name',
                        'product_image' => 'Image',
                        'color' => 'Product Color',
                        'purchase_price' => 'Purchase Price',
                        'sale_price' => 'Sale Price',
                        'quantity' => 'Quantity',
                        'available_status' => 'Available status',
                    ];

                    $prd_empty_fld = [];

                    foreach ($chk_fld_empty as $cfe_ky => $cfe_li) {

                        $flddd = $prd_li->$cfe_ky;

                        if (empty($flddd) || in_array($flddd, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = $cfe_li;
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["C1", "C2", "C4", "C6", "C8"])) {
                        if (empty($prd_li->top_size) || in_array($prd_li->top_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Top Size';
                        }
                    }
                    if (in_array($prd_li->ctg->product_type, ["C3", "C5"])) {
                        if (empty($prd_li->bottom_size) || in_array($prd_li->bottom_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Bottom Size';
                        }
                    }
                    if (in_array($prd_li->ctg->product_type, ["C9"])) {
                        if ((empty($prd_li->top_size) && empty($prd_li->bottom_size)) || in_array($prd_li->bottom_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Bottom Size';
                        }
                        if ((empty($prd_li->top_size) && empty($prd_li->bottom_size)) || in_array($prd_li->top_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Top Size';
                        }
                    }
                    if (in_array($prd_li->ctg->product_type, ["C12"])) {
                        if (empty($prd_li->primary_size) || in_array($prd_li->primary_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Free Size';
                        }
                        if (!empty($prd_li->primary_size) && ($prd_li->primary_size != "free_size")) {
                            $prd_empty_fld[] = 'Free Size';
                        }
                    }
                    $missingFields = implode(',&nbsp;&nbsp;', array_unique($prd_empty_fld));
                }

                if ($profile_type == 4) {
                    $chk_fld_empty = [
                        'profile_type' => 'Gender/Profile Type',
                        'product_type' => 'Product Category',
                        'rack' => 'Product Sub-Category',
                        'product_name_one' => 'Product Name1',
                        'season' => 'Season',
                        'tall_feet' => 'Height Range',
                        'tall_feet2' => 'Height Range',
                        'best_fit_for_weight' => 'Weight Range',
                        'best_fit_for_weight2' => 'Weight Range',
                        'age1' => 'Age',
                        'age2' => 'Age',
                        'kid_body_shape' => 'Body Shape',
                        'brand_id' => 'Brand Name',
                        'product_image' => 'Image',
                        'color' => 'Product Color',
                        'purchase_price' => 'Purchase Price',
                        'sale_price' => 'Sale Price',
                        'quantity' => 'Quantity',
                        'available_status' => 'Available status',
                    ];

                    $prd_empty_fld = [];

                    foreach ($chk_fld_empty as $cfe_ky => $cfe_li) {

                        $flddd = $prd_li->$cfe_ky;

                        if (empty($flddd) || in_array($flddd, ['NULL', 'null', ''])) {

                            $prd_empty_fld[] = $cfe_li;
                        }
                    }

                    if (in_array($prd_li->ctg->product_type, ["D1", "D2", "D3", "D7", "D8", "D9"])) {
                        if (empty($prd_li->top_size) || in_array($prd_li->top_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Top Size';
                        }
                    }
                    if (in_array($prd_li->ctg->product_type, ["D4", "D5", "D6"])) {
                        if (empty($prd_li->bottom_size) || in_array($prd_li->bottom_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Bottom Size';
                        }
                    }
                    if (in_array($prd_li->ctg->product_type, ["D11"])) {
                        if (empty($prd_li->bottom_size) || in_array($prd_li->bottom_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Bottom Size';
                        }
                        if (empty($prd_li->top_size) || in_array($prd_li->top_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Top Size';
                        }
                    }
                    if (in_array($prd_li->ctg->product_type, ["D12"])) {
                        if (empty($prd_li->primary_size) || in_array($prd_li->primary_size, ['NULL', 'null', ''])) {
                            $prd_empty_fld[] = 'Free Size';
                        }
                        if (!empty($prd_li->primary_size) && ($prd_li->primary_size != "free_size")) {
                            $prd_empty_fld[] = 'Free Size';
                        }
                    }
                    $missingFields = implode(',&nbsp;&nbsp;', array_unique($prd_empty_fld));
                }
            }



            $updata_info['is_merchandise'] = 1;
            $updata_info['po_status'] = 1;
            $updata_info['po_number'] = '';
            $updata_info['po_id'] = '';
            $updata_info['is_active'] = 0;
            $updata_info['available_status'] = 2;
            $updata_info['updated_by'] = $this->request->session()->read('Auth.User.id');
            $updata_info['action'] = 'add';

            $newDataRwX['po_date'] = date('Y-m-d');
            $newDataRwX['product_id'] = $product_prod_id;
            $newDataRwX['is_new_brand'] = 1;
            $newDataRwX['status'] = 1;
            $newRw = $this->PurchaseOrderProducts->newEntity();
            $newRw = $this->PurchaseOrderProducts->patchEntity($newRw, $newDataRwX);
            $this->PurchaseOrderProducts->save($newRw);

            $this->InProducts->updateAll($updata_info, ['prod_id' => $product_prod_id]);

            $this->Flash->success(__('Data Inserted successfully.'));

            return $this->redirect(HTTP_ROOT . 'appadmins/newBrandPo/');
        }

        exit;
    }

    public function getSubCatgList() {

        $html = '<option value="" selected disabled>No data found</option>';

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $allData = $this->InRack->find('all')->where(['in_product_type_id' => $data['id'], 'is_active' => 1]);

            if (!empty($allData->count())) {

                $html = '';

                foreach ($allData as $list) {

                    $html .= '<option value="' . $list->id . '">' . $list->rack_number . '-' . $list->rack_name . '</option>';
                }
            }
        }

        echo $html;

        exit;
    }

    public function getInuserComment() {
        $this->loadModel('InuserComments');

        $this->viewBuilder()->layout('');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $inuser_id = $postData['inuser_id'];

            $all_cmts = $this->InuserComments->find('all')->where(['ProductComments.inuser_id' => $inuser_id])->order(['InuserComments.id' => 'DESC']);
            $this->set(compact('all_cmts'));
        } else {
            
        }
    }

    public function postInuserComment() {
        $this->loadModel('InuserComments');

        $this->viewBuilder()->layout('');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $postArr = [];
            $time = strtotime(date('Y-m-d H:i:s')) . rand(1111, 9999);
            $postArr['inuser_id'] = $postData['inuser_id'];
            $postArr['user_id'] = $this->request->session()->read('Auth.User.id');
            ;
            $postArr['comment'] = !empty($postData['comment']) ? $postData['comment'] : "";
            if (!empty($data['photos']['name'])) {
                $file_name = 'files/chat_image/' . $time . $data['photos']['name'];
                $imageName = move_uploaded_file($data['photos']['tmp_name']);
                $postArr['comment'] = $file_name;
            }
            $newRw = $this->InuserComments->newEntity();
            $newRw = $this->InuserComments->patchEntity($newRw, $postArr);
            $this->InuserComments->save($newRw);
            echo json_encode('success');
        }
        exit;
    }

    public function productType($id = null) {


        if (@$id) {



            $editData = $this->InProductType->find('all')->where(['id' => $id])->first();
        }



        if ($this->request->is('post')) {



            $data = $this->request->data;

            $ent = $this->InProductType->newEntity();

            if (@$data['id']) {



                $checkData = $this->InProductType->find('all')->where(['product_type' => trim(strtoupper($data['product_type'])), 'id !=' => $data['id']])->first();

                if (@$checkData->product_type != '') {



                    $this->Flash->error(__('Name is already exit'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/product_type/' . $data['id']);

                    //break;
                }



                $ent->id = $id;
            } else {



                $checkData = $this->InProductType->find('all')->where(['product_type' => trim(strtoupper($data['product_type']))])->first();

                if (@$checkData->product_type != '') {



                    $this->Flash->error(__('Name is already exit'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/product_type');

                    //break;
                }



                $ent->id = '';

                $data['product_type'] = strtoupper($data['product_type']);

                $data['is_active'] = 1;
            }



            $ent = $this->InProductType->patchEntity($ent, $data);

            if ($this->InProductType->save($ent)) {



                if ($id) {



                    $this->Flash->success(__('Data Updated successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/product_type/' . $id);
                } else {



                    $this->Flash->success(__('Data Inserted successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/product_type');
                }
            }
        }



        $datas = $this->InProductType->find('all')->order(['id' => 'asc']);

        $this->set(compact('id', 'editData', 'datas'));
    }

    public function productTypeDelete($id = null) {



        $getDetail = $this->InProductType->find('all')->where(['id' => $id])->first();

        $data = $this->InProductType->get($id);

        $dataDelete = $this->InProductType->delete($data);

        if ($dataDelete) {



            $this->Flash->success(__('Data has been deleted successfully.'));

            $this->redirect($this->referer());
        }
    }

    public function rackSet($catg = null, $id = null) {

        $all_category = $this->InProductType->find('all');

        if (@$id) {

            $editData = $this->InRack->find('all')->where(['id' => $id])->first();

            @$getNumber = $editData->rack_number;
        } else {



            @$getNumber = $this->InRack->find('all')->order(['id' => 'DESC'])->first()->rack_number + 1;
        }

        if (!empty($_GET['typ']) && !empty($_GET['id'])) {
            if ($_GET['typ'] == "active") {
                $this->InRack->updateAll(['is_active' => 0], ['id' => $_GET['id']]);
            }
            if ($_GET['typ'] == "in_active") {
                $this->InRack->updateAll(['is_active' => 1], ['id' => $_GET['id']]);
            }
            $this->Flash->success(__('Status updated'));
            return $this->redirect(HTTP_ROOT . 'appadmins/rack_set');
        }



        if ($this->request->is('post')) {



            $data = $this->request->data;

            $ent = $this->InRack->newEntity();

            if (@$data['id']) {



                $checkData = $this->InRack->find('all')->where(['rack_name' => trim(strtoupper($data['rack_name'])), 'id !=' => $data['id']])->first();

                if (@$checkData->rack_name != '') {



                    $this->Flash->error(__('Name is already exit'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/rack_set/' . $data['id']);

                    //break;
                }



                $ent->id = $id;
            } else {



                $checkData = $this->InRack->find('all')->where(['rack_name' => trim(strtoupper($data['rack_name']))])->first();

                if (@$checkData->rack_name != '') {



                    $this->Flash->error(__('Name is already exit'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/rack_set');

                    //break;
                }







                $ent->id = '';

                $data['rack_name'] = strtoupper($data['rack_name']);

                $data['is_active'] = 1;
            }



            $ent = $this->InRack->patchEntity($ent, $data);

            if ($this->InRack->save($ent)) {



                if ($id) {



                    $this->Flash->success(__('Data Updated successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/rack_set/' . $catg . '/' . $id);
                } else {



                    $this->Flash->success(__('Data Inserted successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/rack_set');
                }
            }
        }



        $this->InRack->belongsTo('ipt', ['className' => 'InProductType', 'foreignKey' => 'in_product_type_id']);

        $datas = $this->InRack->find('all')->order(['InRack.id' => 'asc'])->contain(['ipt']);

        $this->set(compact('id', 'editData', 'getNumber', 'datas', 'all_category', 'catg'));
    }

    public function rackDelete($id = null) {



        $getDetail = $this->InRack->find('all')->where(['id' => $id])->first();

        $data = $this->InRack->get($id);

        $dataDelete = $this->InRack->delete($data);

        if ($dataDelete) {



            $this->Flash->success(__('Data has been deleted successfully.'));

            $this->redirect($this->referer());
        }
    }

    public function inColor($id = null, $option = null) {

        $all_data = $this->InColors->find('all');

        $editData = [];

        if (!empty($id)) {

            $editData = $this->InColors->find('all')->where(['id' => $id])->first();
        }

        if (!empty($option) && ($option == "delete")) {

            $editData = $this->InColors->deleteAll(['id' => $id]);

            $this->Flash->success(__('Color has been deleted successfully.'));

            $this->redirect(HTTP_ROOT . 'appadmins/in_color');
        }

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if (!empty($id)) {

                $data['id'] = $id;
            }



            $dataEntity = $this->InColors->newEntity();

            $dataEntity = $this->InColors->patchEntity($dataEntity, $data);

            $this->InColors->save($dataEntity);

            if (!empty($id)) {

                $this->Flash->success(__('Color has been updated successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/in_color/' . $id . '/edit');
            } else {

                $this->Flash->success(__('Color has been added successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/in_color');
            }
        }



        $this->set(compact('editData', 'all_data'));
    }

    public function inSize($id = null, $option = null) {
        
        $this->loadModel('InSizes');
        $this->loadModel('InProductType');
        $all_data = $this->InSizes->find('all');
        $all_prd_ctg = $this->InProductType->find('all');

        $editData = [];

        if (!empty($id)) {

            $editData = $this->InSizes->find('all')->where(['id' => $id])->first();
        }

        if (!empty($option) && ($option == "delete")) {

            $editData = $this->InSizes->deleteAll(['id' => $id]);

            $this->Flash->success(__('Size has been deleted successfully.'));

            $this->redirect(HTTP_ROOT . 'appadmins/in_size');
        }

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if (!empty($id)) {

                $data['id'] = $id;
            }
            

            $data['product_ctg'] = json_encode($data['product_ctg']);
            



            $dataEntity = $this->InSizes->newEntity();

            $dataEntity = $this->InSizes->patchEntity($dataEntity, $data);

            $this->InSizes->save($dataEntity);

            if (!empty($id)) {

                $this->Flash->success(__('Size has been updated successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/in_size/' . $id . '/edit');
            } else {

                $this->Flash->success(__('Size has been added successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/in_size');
            }
        }



        $this->set(compact('editData', 'all_data','all_prd_ctg'));
    }

    public function missingFields() {

        $inv_user = $this->Users->find('all')->where(['type' => 7]);
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 7) {
            $user_id = $this->request->session()->read('Auth.User.id');
            $inv_user = $inv_user->where(['id' => $user_id]);
        }
        $all_prod_list = [];

        if (!empty($_GET['employee'])) {

            if ($type == 7) {
                if ($user_id != $_GET['employee']) {
                    $this->Flash->error(__('Invalid request.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/missing_fields');
                }
            }

            $all_employee_prds = $this->InProductLogs->find('all')->where(['user_id' => $_GET['employee']]);

            if (!empty($_GET['action']) && !empty($_GET['action'])) {

                $all_employee_prds = $all_employee_prds->where(['InProductLogs.action' => $_GET['action']]);
            }

            if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {

                $start_date = date('Y-m-d', strtotime($_GET['start_date']));

                $end_date = date('Y-m-d', strtotime($_GET['end_date']));

                $all_employee_prds = $all_employee_prds->where([
                            'InProductLogs.created_on BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'datetime')
                        ->bind(':end', $end_date, 'datetime');
            } else if (!empty($_GET['start_date'])) {

                $start_date = date('Y-m-d', strtotime($_GET['start_date']));

                $all_employee_prds = $all_employee_prds->where(['InProductLogs.created_on LIKE' => '%' . $start_date . '%']);
            }

            //  pr($all_employee_prds);
            //     exit;



            $all_product_ids = !empty($all_employee_prds) ? Hash::extract($all_employee_prds->toArray(), '{n}.product_id') : [];

            if (!empty($all_product_ids)) {

                $this->InProducts->belongsTo('rak', ['className' => 'InRack', 'foreignKey' => 'rack']);

                $this->InProducts->belongsTo('ctg', ['className' => 'InProductType', 'foreignKey' => 'product_type']);

                $this->InProducts->hasMany('emp_log', ['className' => 'InProductLogs', 'foreignKey' => 'product_id'])->setConditions(['emp_log.user_id' => $_GET['employee']]);

                $all_prod_listx = $this->InProducts->find('all')->where(['InProducts.id IN' => $all_product_ids])->contain(['emp_log', 'ctg', 'rak']);

                if (!empty($_GET['user_type'])) {

                    $all_prod_listx = $all_prod_listx->where(['profile_type' => $_GET['user_type']]);
                }



                //                $all_prod_listx = $all_prod_listx->group('InProducts.prod_id');

                $all_prod_list = $this->paginate($all_prod_listx);
            }
        }



        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $cus_id = explode(',', $data['id']);

            $this->InProductLogs->updateAll(['rework_flds' => $data['rework_flds'], 'status' => '4'], ['id IN' => $cus_id]);

            $this->Flash->success(__('Task updated to rework.'));

            return $this->redirect($this->referer());
        }



        $this->set(compact('inv_user', 'all_prod_list', 'all_prod_list'));
    }

    public function getComment() {
        $this->loadModel('AdminComments');

        $this->viewBuilder()->layout('');
        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $admin_id = $postData['admin_id'];

            $all_cmts = $this->AdminComments->find('all')->where(['AdminComments.admin_id' => $admin_id])->order(['AdminComments.id' => 'DESC']);

            $currentUserId = $this->Auth->user('id');
            $this->set(compact('all_cmts', 'currentUserId'));
        } else {
            
        }
    }

    public function postComment($id = null) {
        $this->loadModel('AdminComments');
        $this->viewBuilder()->setLayout('');

        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $postArr = [];
            $postArr['admin_id'] = $postData['admin_id'];
            $postArr['user_id'] = $this->request->getSession()->read('Auth.User.id');
            $postArr['comment'] = $postData['comment'];

            if (!empty($postData['file_upload'][0]['tmp_name'])) {
                $imagePath = "uploads/";
                $filePaths = [];

                foreach ($postData['file_upload'] as $file) {
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $filename = $file['tmp_name'];
                    $original_name = $file['name'];
                    $custom_name = time() . '_' . uniqid() . '.' . $ext;
                    move_uploaded_file($filename, $imagePath . $custom_name);
                    $filePaths[] = $imagePath . $original_name;
                }
                $postArr['file_path'] = json_encode($filePaths);
                $postArr['original_file_names'] = json_encode($postData['file_upload']);

                if (!empty($id)) {
                    $existingComment = $this->AdminComments->get($id);
                    $existingFilePaths = json_decode($existingComment->file_path, true);
                    foreach ($existingFilePaths as $filePath) {
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                    }
                }
            } elseif (!empty($id)) {
                $existingComment = $this->AdminComments->get($id);
                $postArr['file_path'] = $existingComment->file_path;
            }

            if (!empty($id)) {
                $comment = $this->AdminComments->get($id);
                $comment = $this->AdminComments->patchEntity($comment, $postArr);
            } else {
                $comment = $this->AdminComments->newEntity($postArr);
            }

            if ($this->AdminComments->save($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function deleteComment($id = null) {
        $this->loadModel('AdminComments');
        $this->viewBuilder()->setLayout('');

        if ($this->request->is('post')) {
            $comment = $this->AdminComments->get($id);
            if ($this->AdminComments->delete($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function previousOrderList($user_id, $kid_id = null) {
        //        $orderDetails = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
        //        $user_id = $orderDetails->user_id;
        //        $kid_id = $orderDetails->kid_id;
        if (!empty($kid_id)) {
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();

            $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $kid_id])->order(['created_dt' => 'DESC']);
            $productDetails = [];
            foreach ($OrderDetails as $product) {
                $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
            }
            $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $kid_id])->count();
        } else {
            $getUsersDetails = $this->Users->find('all')->where(['id' => $user_id])->first();

            $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'work_status' => 2, 'payment_type' => 1, 'kid_id' => 0, 'user_id' => $user_id])->order(['created_dt' => 'DESC']);
            $productDetails = [];
            foreach ($OrderDetails as $product) {
                $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
            }
            $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'kid_id' => 0, 'work_status' => 2, 'user_id' => $user_id])->count();
        }

        $this->set(compact('OrderDetails', 'KidsOrderDetails', 'OrderDetailsCount', 'productDetails'));
    }

    public function review($payent_id = null, $dfdgdg = null) {

        $this->loadModel('PaymentGetways');
        $this->loadModel('MenStats');
        $this->loadModel('TypicallyWearMen');
        $this->loadModel('ShippingAddress');
        $this->loadModel('MenStyle');
        $this->loadModel('MenFit');
        $this->loadModel('MensBrands');
        $this->loadModel('MenStyleSphereSelections');
        $this->loadModel('WemenStyleSphereSelections');
        $this->loadModel('MenAccessories');
        $this->loadModel('PersonalizedFix');
        $this->loadModel('SizeChart');
        $this->loadModel('FitCut');
        $this->loadModel('CustomDesine');
        $this->loadModel('WomenJeansStyle');
        $this->loadModel('WomenJeansRise');
        $this->loadModel('WemenJeansLength');
        $this->loadModel('WomenStyle');
        $this->loadModel('WomenPrice');
        $this->loadModel('WomenInformation');
        $this->loadModel('WomenTypicalPurchaseCloth');
        $this->loadModel('WomenIncorporateWardrobe');
        $this->loadModel('WomenColorAvoid');
        $this->loadModel('WomenPrintsAvoid');
        $this->loadModel('WomenFabricsAvoid');
        $this->loadModel('WomenHeelHightPrefer');
        $this->loadModel('WomenShoePrefer');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.id' => $payent_id])->first();
        $id = $userdetails->user_id;
        $kid_id = $userdetails->kid_id;

        if (!empty($userdetails->shipping_address_id)) {
            $shipping_address = $this->ShippingAddress->find('all')->where(['id' => $userdetails->shipping_address_id])->first();
        } else {
            $shipping_address = $this->ShippingAddress->find('all')->where(['user_id' => $id, 'kid_id' => $kid_id, 'default_set' => 1])->first();
        }
        //pj($shipping_address);exit;
        $MenStats = $this->MenStats->find('all')->where(['MenStats.user_id' => $id])->first();
        $TypicallyWearMen = $this->TypicallyWearMen->find('all')->where(['TypicallyWearMen.user_id' => $id])->first();
        $MenStyle = $this->MenStyle->find('all')->where(['MenStyle.user_id' => $id])->first();
        $MenFit = $this->MenFit->find('all')->where(['MenFit.user_id' => $id])->first();
        $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $id]);
        $menbrand = $MensBrands->extract('mens_brands')->toArray();
        $style_sphere_selections = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $id])->first();
        $style_sphere_selectionsWemen = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $id])->first();
        $menSccessories = $this->MenAccessories->find('all')->where(['user_id' => $id])->first();
        $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $id])->first();
        $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $id])->first();
        $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $id])->first();
        $menDesigne = $this->CustomDesine->find('all')->where(['user_id' => $id])->first();
        $WomenJeansStyle = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $id])->first();
        $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $id]);
        $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();

        $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $id]);
        $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
        $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $id])->first();
        $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $id])->first();
        $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $id])->first();
        $primaryinfo = explode(",", @$Womeninfo->primary_objectives);
        $womens_brands_plus_low_tier1 = $this->WomenTypicalPurchaseCloth->find('all')->where(['WomenTypicalPurchaseCloth.user_id' => $id]);
        $womens_brands_plus_low_tier = $womens_brands_plus_low_tier1->extract('womens_brands_plus_low_tier')->toArray();
        $style_wardrobe1 = $this->WomenIncorporateWardrobe->find('all')->where(['WomenIncorporateWardrobe.user_id' => $id]);
        $style_wardrobe = $style_wardrobe1->extract('style_wardrobe')->toArray();
        $avoid_colors1 = $this->WomenColorAvoid->find('all')->where(['WomenColorAvoid.user_id' => $id]);
        $avoid_colors = $avoid_colors1->extract('avoid_colors')->toArray();
        $avoid_prints1 = $this->WomenPrintsAvoid->find('all')->where(['WomenPrintsAvoid.user_id' => $id]);
        $avoid_prints = $avoid_prints1->extract('avoid_prints')->toArray();
        $avoid_fabrics1 = $this->WomenFabricsAvoid->find('all')->where(['WomenFabricsAvoid.user_id' => $id]);
        $avoid_fabrics = $avoid_fabrics1->extract('avoid_fabrics')->toArray();
        $wemenDesigne = $this->CustomDesine->find('all')->where(['user_id' => $id])->first();
        $womenHeelHightPrefer = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $id])->first();
        $women_shoe_prefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $id])->first();
        if ($payent_id) {
            $name = $payent_id . '.png';
            $barcode_value = $payent_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);
            $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $id]);
        }
        $this->set(compact('style_sphere_selectionsWemen', 'wemenDesigne', 'menDesigne', 'menSccessories', 'shipping_address', 'userdetails', 'MenStats', 'TypicallyWearMen', 'MenFit', 'MenStyle', 'menbrand', 'style_sphere_selections', 'id', 'primaryinfo', 'Womeninfo', 'style_wardrobe', 'avoid_fabrics', 'avoid_prints', 'avoid_colors', 'womens_brands_plus_low_tier', 'WomenJeansStyle', 'Womenprice', 'Womenstyle', 'WomenRatherDownplay', 'WomenJeansLength', 'WomenJeansRise', 'FitCut', 'SizeChart', 'PersonalizedFix', 'womenHeelHightPrefer', 'women_shoe_prefer'));
    }

    public function kidProfile($payment_id = null) {
        $this->loadModel('PaymentGetways');
        $this->loadModel('KidsDetails');
        $this->loadModel('KidsSizeFit');
        $this->loadModel('ShippingAddress');
        $this->loadModel('KidClothingType');
        $this->loadModel('CustomDesine');
        $this->loadModel('KidStyles');
        $useridDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $payment_id])->first();
        $userid = $useridDetails->user_id;
        $kidid = $useridDetails->kid_id;
        if (!empty($useridDetails->shipping_address_id)) {
            $shipping_address = $this->ShippingAddress->find('all')->where(['id' => $useridDetails->shipping_address_id])->first();
            $name = $shipping_address->full_name;
        } else {
            $shipping_addressCheck = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'ShippingAddress.kid_id' => $kidid, 'default_set' => 1])->first();
            if ($shipping_addressCheck->kid_id == 0) {
                $kid_name = $this->KidsDetails->find('all')->where(['id' => $kidid])->first();
                $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'default_set' => 1])->first();
                $name = $kid_name->kids_first_name;
            } else {
                $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'ShippingAddress.kid_id' => $kidid, 'default_set' => 1])->first();
                $name = $shipping_address->full_name;
            }
        }


        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kid = $this->KidsDetails->find('all')->contain(['Users', 'KidsPersonality', 'KidsSizeFit', 'KidClothingType', 'KidsPrimary', 'KidsPricingShoping', 'KidPurchaseClothing', 'KidStyles'])->where(['KidsDetails.id' => $useridDetails->kid_id])->group(['KidsDetails.id'])->first();

        $KidsSizeFit = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $useridDetails->kid_id])->first();
        $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $useridDetails->kid_id])->first();
        $designe = $this->CustomDesine->find('all')->where(['kid_id' => $useridDetails->kid_id])->first();
        $KidStyles = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $useridDetails->kid_id])->first();
        $kid_barcode = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $userid])->first();
        if ($payment_id) {
            $name = $payment_id . '.png';
            $barcode_value = $payment_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);
            $this->KidsDetails->updateAll(['barcode_image' => $name], ['user_id' => $userid]);
        }
        $this->set(compact('useridDetails', 'kid_barcode', 'kid', 'KidsSizeFit', 'KidClothingType', 'designe', 'KidStyles', 'shipping_address'));
    }

    public function predictionStatus($id, $prediction_mnth_yr) {
        $pmt_gt_data = $this->PaymentGetways->find('all')->where(['id' => $id])->first();
        $prediction_status = !empty($pmt_gt_data->prediction_status) ? $pmt_gt_data->prediction_status : '';
        if (!empty($pmt_gt_data->prediction_status)) {
            $prediction_status .= $prediction_mnth_yr . ',';
        } else {
            $prediction_status .= $prediction_mnth_yr . ',';
        }
//        echo $pmt_gt_data->prediction_status."<br>".$prediction_status;exit;
        $this->PaymentGetways->updateAll(['prediction_status' => $prediction_status], ['id' => $id]);
        $this->Flash->success(__("Prediction status added"));
        return $this->redirect($this->referer());
    }

    public function onePreviousMonthprediction() {
        $end_date = date('Y-m-d', strtotime('last day of -1 month'));
        $start_date = date('Y-m-01', strtotime('first day of -1 month'));
        $next_month = date('Y-m-01');
        $one_nxt_month = date('m');
        $one_nxt_month_name = date('F');
        $prev_month = date('Y-m-d');
//                echo $start_date;
//                echo '<br>' . $end_date . '<br>';
//                exit;

        $this->PaymentGetways->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('usr_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id', 'bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);

        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl', 'in_prod'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');
//        foreach($paid_customer as $pd_cus){ echo "<pre>";print_r($pd_cus);echo "</pre>"; }
//        exit;
        //$allocateData = $this->PaymentGetways->find('all')->contain(['in_prod']);
        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id', 'bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr', 'in_produc'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');
        //pj($paid_customer_kid);exit;
        //        $two_nxt_month = date('m', strtotime('first day of +2 month'));
        //        $three_nxt_month = date('m', strtotime('first day of +3 month'));
        //        echo '<br>' . $one_nxt_month . ' - ' . $two_nxt_month . ' - ' . $three_nxt_month;
        //
        //        exit;

        $this->set(compact('paid_customer', 'paid_customer_kid', 'one_nxt_month_name', 'prev_month', 'next_month', 'one_nxt_month'));
    }

    public function twoPreviousMonthprediction() {
        $end_date = date('Y-m-d', strtotime('last day of -2 month'));
        $start_date = date('Y-m-01', strtotime('first day of -2 month'));
        $next_month = date('Y-m-01', strtotime('first day of -1 month'));
        $one_nxt_month = date('m');
        $one_nxt_month_name = date('F');
        $prev_month = date('Y-m-d');
//                echo $start_date;
//                echo '<br>' . $end_date . '<br>';
//                exit;

        $this->PaymentGetways->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('usr_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id', 'bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);

        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl', 'in_prod'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');
//        foreach($paid_customer as $pd_cus){ echo "<pre>";print_r($pd_cus);echo "</pre>"; }
//        exit;
        //$allocateData = $this->PaymentGetways->find('all')->contain(['in_prod']);
        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id', 'bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr', 'in_produc'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');
        //pj($paid_customer_kid);exit;
        //        $two_nxt_month = date('m', strtotime('first day of +2 month'));
        //        $three_nxt_month = date('m', strtotime('first day of +3 month'));
        //        echo '<br>' . $one_nxt_month . ' - ' . $two_nxt_month . ' - ' . $three_nxt_month;
        //
        //        exit;

        $this->set(compact('paid_customer', 'paid_customer_kid', 'one_nxt_month_name', 'prev_month', 'next_month', 'one_nxt_month'));
    }

    public function getMerchandisePredictionComment() {
        $this->loadModel('MerchandisePredictionComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $payment_id = $postData['payment_id'];
            $month_year = $postData['month_year'];
            $this->MerchandisePredictionComments->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $all_cmts = $this->MerchandisePredictionComments->find('all')->where(['MerchandisePredictionComments.payment_id' => $payment_id, 'month_year' => $month_year])->contain(['Users'])->order(['MerchandisePredictionComments.id' => 'DESC']);
            $currentUserId = $this->Auth->user('id');
            $this->set(compact('all_cmts', 'currentUserId'));
        }
    }

    public function postMerchandisePredictionComment($id = null) {
        $this->loadModel('MerchandisePredictionComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $postArr = [];
            $postArr['payment_id'] = $postData['payment_id'];
            $postArr['user_id'] = $this->request->session()->read('Auth.User.id');
            ;
            $postArr['comment'] = $postData['comment'];
            $postArr['month_year'] = $postData['month_year'];

            if ($id) {

                $comment = $this->MerchandisePredictionComments->get($id);
                $comment = $this->MerchandisePredictionComments->patchEntity($comment, $postArr);
            } else {

                $comment = $this->MerchandisePredictionComments->newEntity($postArr);
            }

            if ($this->MerchandisePredictionComments->save($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function deleteMerchandisePredictionComment($id = null) {
        $this->loadModel('MerchandisePredictionComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $comment = $this->MerchandisePredictionComments->get($id);
            if ($this->MerchandisePredictionComments->delete($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function editMerchandisePredictionComment() {
        $this->loadModel('MerchandisePredictionComments');

        if ($this->request->is('post')) {
            $commentId = $this->request->getData('commentId');

            $comment = $this->MerchandisePredictionComments->find('all')->where(['id' => $commentId])->first();
            if ($comment) {
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode($comment));
            } else {
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['error' => 'Comment not found']));
            }
        } else {
            $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['error' => 'Invalid request']));
        }
        return $this->response;
    }

    public function addVariantProduct($tab = null, $option = null, $id = null) {        
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');
        $this->loadModel('InProducts');
        $this->loadModel('InSizes');
        $this->loadModel('InColors');
        $this->loadModel('InProductVariants');
        $this->loadModel('InProductVariantList');

        $all_sizes = $this->InSizes->find('all')->where(['is_active' => 1, 'product_ctg LIKE'=>'%"'.$_GET['ctg'].'"%' ]);
        $all_colors = $this->InColors->find('all')->where(['is_active' => 1]);

        $this->PurchaseOrderProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

        $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.status' => 1, 'PurchaseOrderProducts.is_new_brand' => 1])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

        $this->PurchaseOrderProducts->hasMany('prd_detl', ['className' => 'InProducts', 'foreignKey' => 'prod_id', 'bindingKey' => 'product_id']);
        $tab1_data_list = $this->PurchaseOrderProducts->find('all')->contain(['prd_detl', 'brand']);

        if (empty($tab) || ($tab == 'tab1')) {
            $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.status' => 1, 'is_new_brand' => 1]);
            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
            }
        }

        if (!empty($tab) && ($tab == 'tab2')) {
            $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 1, 'PurchaseOrderProducts.status !=' => 4])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.status IN' => [2, 3], 'PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
            }
        }
        if (!empty($tab) && ($tab == 'tab3')) {
            $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 1])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.status IN' => [2, 3], 'PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
            }
        }
        if (!empty($tab) && ($tab == 'tab4')) {
            $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 1])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.status >' => 3, 'PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
            }
        }



        $editproduct = [];

        $in_rack = [];

        $user_type_arr = ['Men' => '1', 'Women' => '2', 'BoyKids' => '3', 'GirlKids' => '4'];
        $profile = $option;
        if (empty($profile)) {
            $profile = "Men";
        }

        $product_ctg_nme = '';
        $product_sub_ctg_nme = '';

        if (!empty($id)) {

            $editproduct = $this->InProducts->find('all')->where(['id' => $id])->first();

            $productType_name_get = $this->InProductType->find('all')->where(['user_type' => $editproduct->profile_type])->where(['id' => $editproduct->product_type])->first();
            $product_ctg_nme = $productType_name_get->product_type;
            $in_rack = $this->InRack->find('all')->where(['in_product_type_id' => $editproduct->product_type])->order(['sort_order' => 'ASC']);

            if (!empty($editproduct->product_type) && !empty($editproduct->rack)) {

                $in_rack_name_get = $this->InRack->find('all')->where(['in_product_type_id' => $editproduct->product_type])->where(['id' => $editproduct->rack])->first();
                $product_sub_ctg_nme = $in_rack_name_get->rack_number;
            }
        }



        $utype = $this->request->session()->read('Auth.User.type');

        $getExstingProductBrndList = $this->InProducts->find('all')->group(['brand_id']);
        // $allExistingBrand = !empty($getExstingProductBrndList) ? Hash::extract($getExstingProductBrndList->toArray(), '{n}.brand_id') : [];
        //        echo "<pre>";count($allExistingBrand);echo implode(',',array_filter($allExistingBrand));
        // $brandsListings = $this->InUsers->find('all')->where(['type' => 3, 'id NOT IN' => array_filter($allExistingBrand)])->order(['id']);
        $brandsListings = $this->InUsers->find('all')->where(['type' => 3, 'is_collaborated' => 1])->order(['id']);
        //        print_r(!empty($brandsListings) ? Hash::extract($brandsListings->toArray(), '{n}.id') : []);exit;

        $productType = $this->InProductType->find('all')->where(['user_type' => $user_type_arr[$profile]])->order(['sort_order' => 'ASC']);

        if (!empty($_GET['ctg'])) {
            $productType_name_get = $this->InProductType->find('all')->where(['user_type' => $user_type_arr[$profile]])->where(['id' => $_GET['ctg']])->first();
            $product_ctg_nme = $productType_name_get->product_type;
            $in_rack = $this->InRack->find('all')->where(['in_product_type_id' => $_GET['ctg']])->order(['sort_order' => 'ASC']);
        }
        if (!empty($_GET['ctg']) && !empty($_GET['sub_ctg'])) {

            $in_rack_name_get = $this->InRack->find('all')->where(['in_product_type_id' => $_GET['ctg']])->where(['id' => $_GET['sub_ctg']])->first();
            $product_sub_ctg_nme = $in_rack_name_get->rack_number;
        }
//        echo $file_path2 = str_replace('merchandise', 'inventory/webroot/', ROOT);exit;

        if ($this->request->is('post')) {
            $postData = $this->request->data;
        //    echo "<pre>";
        //    print_r($this->request->session()->read('new_variant_po_data'));
        //    print_r($postData);
        //    echo "</pre>";
        //    exit;
        
           //add new variant data to existing 
           if(!empty($postData['variant_id'])){
                $main_variant_data = $this->InProductVariants->find('all')->where(['id'=>$postData['variant_id']])->first()->toArray();
                    
                    $exit_color = json_decode($main_variant_data['color'],true);
                    $exit_size = json_decode($main_variant_data['size'],true);
                    $exit_color =array_unique(array_merge($exit_color,$postData['color']));
                    $new_size_arr = [];
                    foreach($exit_size as $ky=>$ex_sz){
                        $new_size_arr[$ky]=$ex_sz;
                    }
                    foreach($postData['color'] as $ky_c=>$ex_sz_c){
                        if(!empty($new_size_arr[$ex_sz_c])){
                            $cnt =  count($new_size_arr[$ex_sz_c]);
                            
                            $new_size_arr[$ex_sz_c]=array_unique(array_merge($new_size_arr[$ex_sz_c],$postData['size'][$ex_sz_c]));
                        }else{
                            $new_size_arr[$ex_sz_c]=$postData['size'][$ex_sz_c];
                        }
                        
                    }

                    $this->InProductVariants->updateAll(['size'=>json_encode($new_size_arr), 'color' => json_encode($exit_color)],['id'=>$postData['variant_id']]);
                    
                    $variant_data  = $postData['variant_data'];
                    foreach ($variant_data as $key => $variant_list) {
                        foreach ($variant_list as $keyx => $variant_list_list) {
                            $var_prd_rw = [];
                            $var_prd_rw['color'] = $key;
                            $var_prd_rw['size'] = $keyx;
                            $var_prd_rw['in_product_variants_id'] = $main_variant_data['id'];                    
                            $var_prd_rw['brand_id'] = $main_variant_data['brand_id'] ;  
                            $var_prd_rw += $variant_list_list;
        
                            $var_prd_rw['variant_size_related'] = !empty($variant_list_list['variant_size_related'])?json_encode($variant_list_list['variant_size_related']):NULL ;   
                            $var_prd_rw['skin_tone'] = !empty($variant_list_list['skin_tone'])?json_encode($variant_list_list['skin_tone']):NULL ;
                            
                            $var_prd_rw['quantity'] = 0;
                            $var_prd_rw['po_quantity'] = $variant_list_list['quantity'];
                            $var_prd_rw['is_po'] = 1;
                            $var_prd_rw['po_status'] = 1;
                            $var_prd_rw['po_date'] = date('Y-m-d');   
                            
                            if (!empty($variant_list_list['product_image']['tmp_name'])) {
                                if ($variant_list_list['product_image']['size'] <= 20000) {
                                    $new_name = time().rand(1111,9999);
                                    $file_path = str_replace('merchandise', 'webroot/', ROOT);
                                    $avatarName = $this->Custom->uploadAvatarImage($variant_list_list['product_image']['tmp_name'], $variant_list_list['product_image']['name'], $file_path . PRODUCT_IMAGES, 500, $new_name);
                //                    var_dump([$postData['product_image']['tmp_name'], $avatarName]);
                                    
                                    $file_path2 = str_replace('merchandise', 'inventory/webroot/', ROOT);
                //                    $avatarName = $this->Custom->uploadAvatarImage($postData['product_image']['tmp_name'], $postData['product_image']['name'], $file_path2 . PRODUCT_IMAGES, 500, $new_name);
                                    copy($file_path . PRODUCT_IMAGES.$avatarName, $file_path2.PRODUCT_IMAGES.$avatarName);
                                    
                                    $var_prd_rw['feature_image'] = $avatarName;
                                } else {
                                    $this->Flash->error(__('Image size should be 8  to 20 kb'));
                                }
                            }
                            
        
                            $nwRw = $this->InProductVariantList->newEntity();
                            $nwRw = $this->InProductVariantList->patchEntity($nwRw, $var_prd_rw);
                            $nwRw = $this->InProductVariantList->save($nwRw);
                            $last_variant_id = $nwRw->id;
                            
                        }
                    }
                $this->Flash->success(__("Product Variant added to po"));
                return $this->redirect(HTTP_ROOT.'appadmins/newBrandPo/tab1?brand_id='.$main_variant_data['brand_id']);
                exit;
           }

            $is_po = !empty($postData['for_po'])?$postData['for_po']:0;
            unset($postData['for_po']);

            $variant_data = $postData['variant_data'];
//            var_dump(!empty($postData['product_image']['name']));
            $postData['user_id'] = $this->request->session()->read('Auth.User.id');
            $postData['color'] = !empty($postData['color']) ? json_encode($postData['color']) : NULL;
            $postData['size'] = !empty($postData['size']) ? json_encode($postData['size']) : NULL;
            $postData['variant_data'] = !empty($postData['variant_data']) ? json_encode($postData['variant_data']) : NULL;
            $postData['season'] = !empty($postData['season']) ? json_encode($postData['season']) : NULL;
            $postData['profession'] = !empty($postData['profession']) ? json_encode($postData['profession']) : NULL;
            $postData['variant_size_related'] = !empty($postData['variant_size_related']) ? json_encode($postData['variant_size_related']) : NULL;
            $postData['better_body_shape'] = !empty($postData['better_body_shape']) ? json_encode($postData['better_body_shape']) : NULL;
            $postData['work_type'] = !empty($postData['work_type']) ? json_encode($postData['work_type']) : NULL;
            $postData['style_sphere_selections_v5'] = !empty($postData['style_sphere_selections_v5']) ? json_encode($postData['style_sphere_selections_v5']) : NULL;
            $postData['budget_value'] = !empty($postData[$postData['budget_type']]) ? $postData[$postData['budget_type']] : NULL;
            $postData['take_note_of'] = !empty($postData['take_note_of']) ? json_encode($postData['take_note_of']) : NULL;
            $postData['outfit_prefer'] = !empty($postData['outfit_prefer']) ? json_encode($postData['outfit_prefer']) : NULL;
            $postData['wo_top_half'] = !empty($postData['wo_top_half']) ? json_encode($postData['wo_top_half']) : NULL;
            $postData['wo_style_insp'] = !empty($postData['wo_style_insp']) ? json_encode($postData['wo_style_insp']) : NULL;
            $postData['denim_styles'] = !empty($postData['denim_styles']) ? json_encode($postData['denim_styles']) : NULL;
            $postData['occasional_dress'] = !empty($postData['occasional_dress']) ? json_encode($postData['occasional_dress']) : NULL;
            $postData['occasional_dress'] = !empty($postData['occasional_dress']) ? json_encode($postData['occasional_dress']) : NULL;

            //InProductVariantList
            
        //    echo "<pre>";
        //    print_r($postData);
        //    echo "</pre>";
        //    exit;

            $newRow = $this->InProductVariants->newEntity();
            $newRow = $this->InProductVariants->patchEntity($newRow, $postData);
            $newRow = $this->InProductVariants->save($newRow);
            foreach ($variant_data as $key => $variant_list) {
                foreach ($variant_list as $keyx => $variant_list_list) {
                    $var_prd_rw = [];
                    
                    $var_prd_rw['color'] = $key;
                    $var_prd_rw['size'] = $keyx;
                    $var_prd_rw['in_product_variants_id'] = $newRow->id;                    
                    $var_prd_rw['brand_id'] = $postData['brand_id'] ;  
                    $var_prd_rw += $variant_list_list;

                    $var_prd_rw['variant_size_related'] = !empty($variant_list_list['variant_size_related'])?json_encode($variant_list_list['variant_size_related']):NULL ;   
                    $var_prd_rw['skin_tone'] = !empty($variant_list_list['skin_tone'])?json_encode($variant_list_list['skin_tone']):NULL ;   

                    if (!empty($variant_list_list['product_image']['tmp_name'])) {
                        if ($variant_list_list['product_image']['size'] <= 2100000) {
                            $new_name = time().rand(1111,9999);
                            $file_path = str_replace('merchandise', 'webroot/', ROOT);
                            $avatarName = $this->Custom->uploadAvatarImage($variant_list_list['product_image']['tmp_name'], $variant_list_list['product_image']['name'], $file_path . PRODUCT_IMAGES, 500, $new_name);
        //                    var_dump([$postData['product_image']['tmp_name'], $avatarName]);
                            
                            $file_path2 = str_replace('merchandise', 'inventory/webroot/', ROOT);
        //                    $avatarName = $this->Custom->uploadAvatarImage($postData['product_image']['tmp_name'], $postData['product_image']['name'], $file_path2 . PRODUCT_IMAGES, 500, $new_name);
                            copy($file_path . PRODUCT_IMAGES.$avatarName, $file_path2.PRODUCT_IMAGES.$avatarName);
                            
                            $var_prd_rw['feature_image'] = $avatarName;
                        } else {
                            $this->Flash->error(__('Image size should be 8  to 20 kb'));
                        }
                    }

                    if(!empty( $this->request->session()->read('new_variant_po_data'))){
                        $new_variant_po_data = json_decode($this->request->session()->read('new_variant_po_data'),true);
                        $var_prd_rw['quantity'] = 0;                        
                        $var_prd_rw['po_quantity'] = 1;
                        $var_prd_rw['is_po'] = 1;
                        $var_prd_rw['po_status'] = 1;
                        $var_prd_rw['po_date'] = date('Y-m-d');
                        $var_prd_rw['allocate_user_id'] = $new_variant_po_data['pay_user_id'];
                        $var_prd_rw['allocate_kid_id'] = $new_variant_po_data['pay_kid_id'];
                        
                    }
                    if(!empty($is_po) && ($is_po == 1)){                        
                        $var_prd_rw['quantity'] = 0;
                        $var_prd_rw['po_quantity'] = $variant_list_list['quantity'];
                        $var_prd_rw['is_po'] = 1;
                        $var_prd_rw['po_status'] = 1;
                        $var_prd_rw['po_date'] = date('Y-m-d');                        
                    }
                    // echo "<pre>";
                    // print_r($variant_list_list);
                    // print_r($var_prd_rw);
                    // echo "</pre>";
                    // exit;

                    $nwRw = $this->InProductVariantList->newEntity();
                    $nwRw = $this->InProductVariantList->patchEntity($nwRw, $var_prd_rw);
                    $nwRw = $this->InProductVariantList->save($nwRw);
                    $last_variant_id = $nwRw->id;
                    
                }
            }

            if(!empty( $this->request->session()->read('new_variant_po_data'))){
                $this->request->session()->write('new_variant_po_data','');
                $this->request->session()->delete('new_variant_po_data');
            }
            $this->Flash->success(__("Product Variant added"));
//            echo "<pre>";
//            print_r($postData);
//            echo "</pre>";
//            exit;

            

            // return $this->redirect($this->referer());
            return $this->redirect(HTTP_ROOT.'appadmins/newBrandPo/tab1?brand_id='.$postData['brand_id']);
        }

        $this->set(compact('utype', 'in_rack', 'productType', 'id', 'editproduct', 'profile', 'brandsListings', 'product_ctg_nme', 'product_sub_ctg_nme', 'tab', 'option', 'id', 'tab1_brand_list', 'tab1_data_list', 'all_sizes', 'all_colors'));
    }

    public function variantProductList($profile = null, $category = null) {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');
        $this->loadModel('InProducts');
        $this->loadModel('InSizes');
        $this->loadModel('InColors');
        $this->loadModel('InProductVariants');

        $utype = $this->request->session()->read('Auth.User.type');

        $where_arr = [];

        if (!empty($category)) {

            $where_arr['product_type'] = $category;
        }

        if (!empty($_GET['search_for']) && !empty(!empty($_GET['search_data']))) {

            if ($_GET['search_for'] == 'product_name_one') {

                $where_arr['InProductVariants.product_name_one LIKE'] = "%" . $_GET['search_data'] . "%";
            }

            if ($_GET['search_for'] == 'product_name_two') {

                $where_arr['InProductVariants.product_name_two LIKE'] = "%" . $_GET['search_data'] . "%";
            }

            if ($_GET['search_for'] == 'style_no') {

                $where_arr['InProductVariants.style_number LIKE'] = "%" . $_GET['search_data'] . "%";
            }

            if ($_GET['search_for'] == 'prod_id') {

                $where_arr['InProductVariants.prod_id LIKE'] = "%" . $_GET['search_data'] . "%";
            }
        }





        //        if ($this->request->session()->read('Auth.User.type') == 1) {


        $this->InProductVariants->belongsTo('InUsers', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

        /* $menproductdetails */
        $menproductdetails1 = $this->InProductVariants->find('all')->order(['InProductVariants.id' => 'DESC'])->where(['InProductVariants.profile_type' => '1', 'InProductVariants.brand_id !=' => 0/* , 'InProductVariants.is_merchandise' => 0 */])->contain(['InUsers']);

        /* $womenproductdetails */
        $womenproductdetails1 = $this->InProductVariants->find('all')->order(['InProductVariants.id' => 'DESC'])->where(['InProductVariants.profile_type' => '2', 'InProductVariants.brand_id !=' => 0/* , 'InProductVariants.is_merchandise' => 0 */])->contain(['InUsers']);

        /* $boyskidsproductdetails */
        $boyskidsproductdetails1 = $this->InProductVariants->find('all')->order(['InProductVariants.id' => 'DESC'])->where(['InProductVariants.profile_type' => '3', 'InProductVariants.brand_id !=' => 0/* , 'InProductVariants.is_merchandise' => 0 */])->contain(['InUsers']);

        /* $girlkidsproductdetails */
        $girlkidsproductdetails1 = $this->InProductVariants->find('all')->order(['InProductVariants.id' => 'DESC'])->where(['InProductVariants.profile_type' => '4', 'InProductVariants.brand_id !=' => 0/* , 'InProductVariants.is_merchandise' => 0 */])->contain(['InUsers']);

        if (!empty($where_arr)) {

            /* $menproductdetails */
            $menproductdetails1 = $menproductdetails1->where($where_arr);

            /* $womenproductdetails */
            $womenproductdetails1 = $womenproductdetails1->where($where_arr);

            /* $boyskidsproductdetails */
            $boyskidsproductdetails1 = $boyskidsproductdetails1->where($where_arr);

            /* $girlkidsproductdetails */
            $girlkidsproductdetails1 = $girlkidsproductdetails1->where($where_arr);
        }

        if (!empty($_GET['search_for']) && !empty(!empty($_GET['search_data']))) {

            if ($_GET['search_for'] == "brand_name") {
                $bnd_nm = trim($_GET['search_data']);
                $menproductdetails1 = $menproductdetails1->where(['InUsers.brand_name' => $bnd_nm]);
                $womenproductdetails1 = $womenproductdetails1->where(['InUsers.brand_name' => $bnd_nm]);
                $boyskidsproductdetails1 = $boyskidsproductdetails1->where(['InUsers.brand_name' => $bnd_nm]);
                $girlkidsproductdetails1 = $girlkidsproductdetails1->where(['InUsers.brand_name' => $bnd_nm]);
            }
        }

        //        } else {
        //
        //            /* $menproductdetails */$menproductdetails1 = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '1', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');
        //
        //            /* $womenproductdetails */$womenproductdetails1 = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '2', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');
        //
        //            /* $boyskidsproductdetails */$boyskidsproductdetails1 = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '3', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');
        //
        //            /* $girlkidsproductdetails */$girlkidsproductdetails1 = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '4', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');
        //            if (!empty($where_arr)) {
        //                /* $menproductdetails */$menproductdetails1 = $menproductdetails1->where($where_arr);
        //                /* $womenproductdetails */$womenproductdetails1 = $womenproductdetails1->where($where_arr);
        //                /* $boyskidsproductdetails */$boyskidsproductdetails1 = $boyskidsproductdetails1->where($where_arr);
        //                /* $girlkidsproductdetails */$girlkidsproductdetails1 = $girlkidsproductdetails1->where($where_arr);
        //            }
        //        }
        //        $this->paginate['limit'] = 20;

        $productType = $this->InProductType->find('all')->order(['id' => 'ASC']);

        if (@$profile == 'Men' || @$profile == '') {

            $menproductdetails = $this->paginate($menproductdetails1);

            $productType = $productType->where(['user_type' => 1]);
        }

        if (@$profile == 'Women') {

            $womenproductdetails = $this->paginate($womenproductdetails1);
            $productType = $productType->where(['user_type' => 2]);
        }

        if (@$profile == 'BoyKids') {

            $boyskidsproductdetails = $this->paginate($boyskidsproductdetails1);
            $productType = $productType->where(['user_type' => 3]);
        }

        if (@$profile == 'GirlKids') {

            $girlkidsproductdetails = $this->paginate($girlkidsproductdetails1);
            $productType = $productType->where(['user_type' => 4]);
        }



        //        $menproductdetails = $menproductdetails1;
        //        $womenproductdetails = $womenproductdetails1;
        //        $boyskidsproductdetails = $boyskidsproductdetails1;
        //        $girlkidsproductdetails = $girlkidsproductdetails1;





        $brandsListings = $this->InUsers->find('all')->where(['type' => 3])->order(['id']);

        $this->set(compact('menproductdetails', 'womenproductdetails', 'boyskidsproductdetails', 'girlkidsproductdetails', 'profile', 'category', 'utype', 'brandsListings', 'productType'));
    }

    public function variantProductDetails($varient_id) {
        $this->loadModel('InProductVariants');
        $this->loadModel('InProductVariantList');
        $this->loadModel('InProductImages');
        $variant_details = $this->InProductVariants->find('all')->where(['id' => $varient_id])->first();
        $variant_color_images = $this->InProductImages->find('all')->where(['in_product_variants_id' => $varient_id]);
        $variant_products_details = $this->InProductVariantList->find('all')->where(['in_product_variants_id' => $varient_id]);
        $this->set(compact('variant_details', 'variant_products_details', 'varient_id','variant_color_images'));
    }

    public function generateProduct($product_variant_list_id,$req_frm=null) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel('InProductVariants');
        $this->loadModel('InProductVariantList');
        $this->loadModel('InProducts');
        $this->loadModel('InColors');
        $this->loadModel('PurchaseOrderProducts');

        $variant_products_details = $this->InProductVariantList->find('all')->where(['id' => $product_variant_list_id])->first();
        $variant_details = $this->InProductVariants->find('all')->where(['id' => $variant_products_details->in_product_variants_id])->first();
        // echo "<pre>";
        $prd_qnt = (!empty($req_frm) && ($req_frm=="po"))?$variant_products_details->po_quantity:$variant_products_details->quantity;
        if ($prd_qnt > 0) {
            $rnd_data = rand(1111,9999);
            for ($i = 1; $i <= $prd_qnt; $i++) {
                $newRw = [];

                $newRw['in_product_variant_list_id'] = $variant_products_details->id;
                $newRw['in_product_variants_id'] = $variant_details->id;
                $newRw['user_id'] = $variant_details->user_id;
                $newRw['profile_type'] = $variant_details->profile_type;
                $newRw['product_type'] = $variant_details->product_type;
                $newRw['p_type'] = $variant_details->product_type;
                $newRw['product_name_one'] = $variant_details->product_name_one;
                $newRw['brand_id'] = $variant_details->brand_id;
                $newRw['tall_feet'] = $variant_products_details->tall_feet1;
                $newRw['tall_feet2'] = $variant_products_details->tall_feet2;
                $newRw['tall_inch'] = $variant_products_details->tall_inch1;
                $newRw['tall_inch2'] = $variant_products_details->tall_inch2;
                $newRw['best_fit_for_weight'] = $variant_products_details->best_fit_for_weight1;
                $newRw['best_fit_for_weight2'] = $variant_products_details->best_fit_for_weight2;
                $newRw['age1'] = $variant_products_details->age1;
                $newRw['age2'] = $variant_products_details->age2;
                $newRw['best_size_fit'] = $variant_details->best_size_fit;
                $newRw['budget_type'] = $variant_details->budget_type;
                $newRw['budget_value'] = $variant_details->budget_value;
                $newRw['primary_size'] = $variant_details->primary_size;
                $newRw['picked_size'] = $variant_details->primary_size;
                $newRw['allocate_to_user_id'] = $variant_products_details->allocate_user_id;
                $newRw['allocate_to_kid_id'] = $variant_products_details->allocate_kid_id;
                $newRw['proportion_shoulders'] = $variant_products_details->proportion_shoulders;
                $newRw['proportion_legs'] = $variant_products_details->proportion_legs;
                $newRw['proportion_arms'] = $variant_products_details->proportion_arms;
                $newRw['proportion_hips'] = $variant_products_details->proportion_hips;

                if (!empty($variant_details->primary_size)) {
                    $newRw[$variant_details->primary_size] = $variant_products_details->size;
                }
                if (!empty($variant_details->variant_size_related)) {
                    $variant_size_related = json_decode($variant_details->variant_size_related, true);
                    foreach ($variant_size_related as $var_sz_rel_ky => $var_sz_rel) {
                        $newRw[$var_sz_rel_ky] = $var_sz_rel;
                    }
                }
                if (!empty($variant_products_details->variant_size_related)) {
                    $variant_size_relatedx = json_decode($variant_products_details->variant_size_related, true);
                    foreach ($variant_size_relatedx as $var_sz_rel_kyx => $var_sz_relx) {
                        $newRw[$var_sz_rel_kyx] = $var_sz_relx;
                    }
                }

                $newRw['better_body_shape'] = $variant_details->better_body_shape;
                $newRw['skin_tone'] = $variant_products_details->skin_tone;
                $newRw['work_type'] = $variant_details->work_type;
                $newRw['jeans_Fit'] = $variant_details->jeans_Fit;
                $get_color_id = $this->InColors->find('all')->where(['name' => $variant_products_details->color])->first();
                $newRw['color'] = $get_color_id->id;
                $newRw['men_bottom_prefer'] = $variant_details->men_bottom_prefer;
                $newRw['style_sphere_selections_v5'] = $variant_details->style_sphere_selections_v5;
                $newRw['note'] = $variant_details->note;
                $newRw['product_image'] = $variant_products_details->feature_image;
                $newRw['available_status'] = $variant_details->available_status;
                $newRw['rack'] = $variant_details->rack;
                $newRw['profession'] = $variant_details->profession;
                $newRw['take_note_of'] = $variant_details->take_note_of;
                $newRw['display_status'] = $variant_details->display_status;
                $newRw['product_status'] = $variant_details->product_status;
                $newRw['purchase_price'] = $variant_products_details->purchase_price;
                $newRw['sale_price'] = $variant_products_details->sale_price;
                $newRw['clearance_price'] = $variant_products_details->clearance_price;
                $newRw['quantity'] =  1;
                $newRw['is_active'] = 1;
                $newRw['po_status'] = 4;
                $newRw['is_merchandise'] = 1;
                $newRw['created'] = date('Y-m-d H:i:s');

                if (!empty($variant_details->profile_type) && ($variant_details->profile_type == '1')) {
                    $profile = "MEN";
                    $nw_profile = "M";
                } else if (!empty($variant_details->profile_type) && ($variant_details->profile_type == 2)) {
                    $profile = "WOM";
                    $nw_profile = "W";
                } else if (!empty($variant_details->profile_type) && ($variant_details->profile_type == 3)) {
                    $profile = "BOY";
                    $nw_profile = "B";
                } else if (!empty($variant_details->profile_type) && ($variant_details->profile_type == 4)) {
                    $profile = "GIRL";
                    $nw_profile = "G";
                }

                $dtls = $this->Custom->dtls($nw_profile, $variant_details->brand_id, $variant_details->rack, $variant_details->product_type, $variant_products_details->size);

                $newRw['prod_id'] = $dtls.'-'.$rnd_data;

                $newRwInsert = $this->InProducts->newEntity();
                $newRwInsert = $this->InProducts->patchEntity($newRwInsert, $newRw);
                $newRwInsert = $this->InProducts->save($newRwInsert);
                // print_r($newRwInsert);
                $last_insert_id = $newRwInsert->id;
                $last_id = 'DF' . $newRwInsert->id;
                $style_number = $dtls . '-' . $last_id . '-' . $i;

                $br_name = $last_id . '.png';
                $barcode_value = $last_id;
                $this->Custom->create_image($br_name);
                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                list($type, $dataImg) = explode(';', $dataImg);
                list(, $dataImg) = explode(',', $dataImg);
                $dataImg = base64_decode($dataImg);
                file_put_contents(BARCODE . $br_name, $dataImg);
                $file_path1 = str_replace('merchandise', 'webroot/', ROOT);
                $file_path2 = str_replace('merchandise', 'inventory/webroot/', ROOT);
                file_put_contents($file_path1 . BARCODE . $br_name, $dataImg);
                file_put_contents($file_path2 . BARCODE . $br_name, $dataImg);

                // $this->InProducts->updateAll(['bar_code_img' => $br_name, 'style_number' => $style_number, 'dtls' => $barcode_value], ['id' => $last_insert_id]);
                $this->InProducts->updateAll([/*'bar_code_img' => $br_name, */'style_number' => $style_number, 'dtls' => $barcode_value], ['id' => $last_insert_id]);

               

                // print_r($newRw);
            }
            if((!empty($req_frm) && ($req_frm=="po"))){
                // $this->InProductVariantList->updateAll(['po_quantity'=>0],['id' => $product_variant_list_id]);
                $this->InProductVariantList->updateAll(['is_po'=>0],['id' => $product_variant_list_id]);
            }
        }
        //exit;
        // print_r($variant_products_details);
        // echo "Variant details";
        // print_r($variant_details);

        // echo $product_variant_list_id;
        // echo "Check previously product created Or not as per quantity<br>";
        // echo "If not created then need to create<br>";
        // return true;
        $this->Flash->success(__("Product Generated successfully"));
        return $this->redirect($this->referer());

        // exit;
    }

    
    public function productColorImages($in_product_variants_id = null, $color = null) {
        $this->loadModel('InProductImages');
        $this->loadModel('InColors');

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            
            $get_color_id = $this->InColors->find('all')->where(['name' => $postData['color']])->first();
            
            if(!empty($postData['photos']) && (count($postData['photos'] > 0))){
                foreach($postData['photos'] as $pht_ky => $pht_val){
//                    echo "<pre>";
//                    print_r($pht_val);
                    if(!empty($pht_val['tmp_name']) && (strstr($pht_val['type'],"image"))){
                        
                        $newRw = [];
                        $newRw['in_product_variants_id'] = $postData['in_product_variants_id'];
                        $newRw['color'] = $postData['color'];
                        $newRw['color_id'] = $get_color_id->id;
                        $ext = pathinfo($pht_val['name'], PATHINFO_EXTENSION);
                        $file_path = str_replace('merchandise', 'webroot/', ROOT);
                        $file_name=  PRODUCT_IMAGES.time().rand(1111,9999).'.'.$ext;
                        move_uploaded_file($pht_val['tmp_name'],$file_path .$file_name);
                        $newRw['image'] = $file_name;
                        
//                        print_r($newRw);
                        
                        
                        $newRwInsert = $this->InProductImages->newEntity();
                        $newRwInsert = $this->InProductImages->patchEntity($newRwInsert, $newRw);
                        $newRwInsert = $this->InProductImages->save($newRwInsert);
                    }
                }

            }
            $this->Flash->success(__("Photos Added successfully"));
            return $this->redirect($this->referer());
            
//            echo "<pre>";
//            print_r($postData);
            // exit;
            // 

        }
    }
    public function deleteVariantPhoto() {        
        $this->loadModel('InProductImages');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $img_data = $this->InProductImages->find('all')->where(['id' => $postData['id']])->first();
            if(!empty($img_data) && !empty($img_data->image)){
                 $file_path = str_replace('merchandise', 'webroot/', ROOT);
                 unlink($file_path.$img_data->image);
            }
            $this->InProductImages->deleteAll(['id' => $postData['id']]);
            echo json_encode(true);
            exit;
        }
        echo json_encode(false);
        exit;
    }
    
     public function testsql(){
        $this->InProducts->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'allocate_to_user_id']);
        $query = $this->InProducts->find('all')->where(['InProducts.shirt_blouse LIKE'=>'%18W%'])->contain(['usr']);
        echo "<pre>";
        print_r($query);
        exit;
    }

    public function getLookData(){
        $this->viewBuilder()->layout('');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $season_name = $postData['season_nm'];
            $payment_id = $postData['payment_id'];
            $look_count = $postData['look_count'];
            $getPaymentGatewayDetails = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
            if($getPaymentGatewayDetails->kid_id != 0){
                $userDetails = $this->KidsDetails->find('all')->where(['id' => $getPaymentGatewayDetails->kid_id])->first();
                if ($userDetails->kids_clothing_gender == 'girls') {
                    $gender = 4; // Girl kid
                }else{
                    $gender = 3; // Boy Kid
                }
                $gender = $getPaymentGatewayDetails->profile_type;
            }else{
                $userDetails = $this->UserDetails->find('all')->where(['user_id' => $getPaymentGatewayDetails->user_id])->first();
                $gender = $getPaymentGatewayDetails->profile_type;
            }
            $this->set(compact('season_name', 'payment_id', 'look_count', 'gender','getPaymentGatewayDetails'));
        }

    }

    public function getSeasonWiseProduct(){
        $this->loadModel('MatchingCase');
        $this->loadModel('WomenStyle');
        $this->loadModel('PersonalizedFix');
        $this->loadModel('WomenInformation');
        $this->loadModel('KidsDetails');
        $this->loadModel('UserDetails');
        $this->loadModel('SizeChart');
        $this->loadModel('MatchingLookCtg');
        $this->loadModel('InRack');
        $this->viewBuilder()->layout('');if ($this->request->is('post')) {
            $postData = $this->request->data;
            $payment_id = $postData['payment_id'];
            $season_name = $postData['season'];
            $product_type = $postData['product_type'];
            $where_to_show = $postData['where_to_show'];
            $getPaymentGatewayDetails = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
            if($getPaymentGatewayDetails->kid_id != 0){
                $userDetails = $this->KidsDetails->find('all')->where(['id' => $getPaymentGatewayDetails->kid_id])->first();
                if ($userDetails->kids_clothing_gender == 'girls') {
                    $gender = 4; // Girl kid
                }else{
                    $gender = 3; // Boy Kid
                }
                $gender = $getPaymentGatewayDetails->profile_type;
            }else{
                $userDetails = $this->UserDetails->find('all')->where(['user_id' => $getPaymentGatewayDetails->user_id])->first();
                $gender = $getPaymentGatewayDetails->profile_type;
            }

            $get_rack_ids = $this->MatchingLookCtg->find('all')->where(['product_type_name LIKE'=>$product_type])->first();
            
            $getMatchingProducts = [];
                       
            if($gender == 2){
                $women_style_data = $this->WomenStyle->find('all')->where(['user_id' => $getPaymentGatewayDetails->user_id])->first();
                $womenInformationsData = $this->WomenInformation->find('all')->where(['user_id' => $getPaymentGatewayDetails->user_id])->first();
                $women_age = $this->Custom->ageCal(date('Y-m-d', strtotime($womenInformationsData->birthday)), date('Y-m-d'));
                $stats = $this->PersonalizedFix->find('all')->where(['user_id' => $getPaymentGatewayDetails->user_id])->first();
                $sizeChart = $this->SizeChart->find('all')->where(['user_id' => $getPaymentGatewayDetails->user_id])->first();
               
                $user_size = '';
                $user_size_col = '';
                $or_cnd = [];

                $rack_number_list = !empty($get_rack_ids)? explode(",",$get_rack_ids->linked_rack):[];
                if(!empty($rack_number_list)){
                    $rak_id_data = $this->InRack->find('all')->where(['rack_number IN'=>$rack_number_list]);
                    $rak_id_list = !empty($rak_id_data) ? Hash::extract($rak_id_data->toArray(), '{n}.id') : [];
                    if(!empty($get_rack_ids)){
                        $mtc_sz = explode(',',$get_rack_ids->matching_size);
                        $mtc_sz_nm = $mtc_sz[0];
                        $user_size = $sizeChart->$mtc_sz_nm;
                        $user_size_col = $mtc_sz_nm;
                        foreach($mtc_sz as $clnm_nm){
                            if(!empty($sizeChart->$clnm_nm)){
                                $or_cnd[$clnm_nm]=$sizeChart->$clnm_nm;
                            }
                        }
                    }
                }
                // echo "<pre>";
                // print_r($or_cnd);exit;
                // print_r($stats->weight_lbs);exit;

                $getMatchingProducts = $this->InProducts->find('all')
                ->where([/*'InProducts.id IN' => [1792,1794],*/'InProducts.profile_type' => 2, 
                'InProducts.age1 <=' => $women_age, 'InProducts.age2 >=' => $women_age, 
                'InProducts.tall_feet <=' => $stats->tell_in_feet, 'InProducts.tall_feet2 >=' => $stats->tell_in_feet,
                'InProducts.best_fit_for_weight <=' => $stats->weight_lbs, 'InProducts.best_fit_for_weight2 >=' => $stats->weight_lbs,
                'InProducts.better_body_shape LIKE' => '%"' . $womenInformationsData->body_type . '"%',
                // 'available_status' => 1, 'match_status' => 2
                ])
                // ->where([
                //     'PaymentGetways.created_dt BETWEEN :start AND :end'
                // ])
                //     ->bind(':start', date('Y-m-01'), 'date')
                //     ->bind(':end', $end_date, 'date')
               ;

                if(!empty($rack_number_list) && !empty($rak_id_list)){
                    $getMatchingProducts = $getMatchingProducts->where(['rack IN'=>$rak_id_list]);
                }
                if(!empty($or_cnd)){
                    $getMatchingProducts = $getMatchingProducts->where(['OR'=>$or_cnd]);
                }

                $get_other_match_prd = $this->MatchingCase->find('all')->where(["payment_id" => $payment_id,'created_on LIKE'=>"%".date('Y-m-d')."%"]);
                if(!empty($get_other_match_prd)){
                    $prv_match_prd = !empty($get_other_match_prd) ? Hash::extract($get_other_match_prd->toArray(), '{n}.product_id') : [];
                    if(!empty($prv_match_prd)){
                        $get_prd_id = $this->InProducts->find('all')->where(['id IN'=>$prv_match_prd]);
                        $get_prc_prod_id_list = !empty($get_prd_id) ? Hash::extract($get_prd_id->toArray(), '{n}.prod_id') : [];
                        if(!empty($get_prc_prod_id_list)){
                            $getMatchingProducts = $getMatchingProducts->where(['InProducts.prod_id NOT IN'=>$get_prc_prod_id_list]);
                        }
                    }
                }
                
                $getMatchingProducts = $getMatchingProducts->group('InProducts.prod_id')->limit(5);

                foreach($getMatchingProducts as $mat_prd){
                    $new_rw = $this->MatchingCase->newEntity();
                    $new_rw->payment_id = $payment_id;
                    $new_rw->product_id = $mat_prd->id;
                    $new_rw->count = 0;
                    $this->MatchingCase->save($new_rw);
                    //MatchingCase                    
                }
                
            }
            // print_r($getMatchingProducts);exit;

            $this->set(compact('season_name', 'payment_id', 'gender', 'getPaymentGatewayDetails', 'getMatchingProducts', 'where_to_show', 'user_size', 'user_size_col'));
        }

    }

    public function getMerchandiseMatchingComment() {
        $this->loadModel('MatchingProductComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $product_id = $postData['product_id'];
            $payment_id = $postData['payment_id'];
            $this->MatchingProductComments->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $all_cmts = $this->MatchingProductComments->find('all')->where(['MatchingProductComments.payment_id' => $payment_id, 'product_id' => $product_id])->contain(['Users'])->order(['MatchingProductComments.id' => 'DESC']);
            $currentUserId = $this->Auth->user('id');
            $this->set(compact('all_cmts', 'currentUserId','product_id'));
        }
    }

    public function postMerchandiseMatchingComment($id = null) {
        $this->loadModel('MatchingProductComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $postArr = [];
            $postArr['payment_id'] = $postData['payment_id'];
            $postArr['user_id'] = $this->request->session()->read('Auth.User.id');
            $postArr['comment'] = $postData['comment'];
            $postArr['product_id'] = $postData['product_id'];

            if ($id) {
                $comment = $this->MatchingProductComments->get($id);
                $comment = $this->MatchingProductComments->patchEntity($comment, $postArr);
            } else {
                $comment = $this->MatchingProductComments->newEntity($postArr);
            }

            if ($this->MatchingProductComments->save($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function deleteMerchandiseMatchingComment($id = null) {
        $this->loadModel('MatchingProductComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $comment = $this->MatchingProductComments->get($id);
            if ($this->MatchingProductComments->delete($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function editMerchandiseMatchingComment() {
        $this->loadModel('MatchingProductComments');
        if ($this->request->is('post')) {
            $commentId = $this->request->getData('commentId');
            $comment = $this->MatchingProductComments->find('all')->where(['id' => $commentId])->first();
            if ($comment) {
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode($comment));
            } else {
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['error' => 'Comment not found']));
            }
        } else {
            $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['error' => 'Invalid request']));
        }
        return $this->response;
    }
    
    public function getMerchandiseSuggComment() {
        $this->loadModel('MatchingProductSuggestionComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $pay_user_id = $postData['pay_user_id'];
            $pay_kid_id = $postData['pay_kid_id'];
            $user_size = $postData['user_size'];
            $user_size_col = $postData['user_size_col'];
            $payment_id = $postData['payment_id'];
            $this->MatchingProductSuggestionComments->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $all_cmts = $this->MatchingProductSuggestionComments->find('all')->where(['MatchingProductSuggestionComments.payment_id' => $payment_id, 'MatchingProductSuggestionComments.pay_user_id' => $pay_user_id,'MatchingProductSuggestionComments.pay_kid_id' => $pay_kid_id,'MatchingProductSuggestionComments.user_size' => $user_size, 'MatchingProductSuggestionComments.user_size_col' => $user_size_col ])->contain(['Users'])->order(['MatchingProductSuggestionComments.id' => 'DESC']);
            $currentUserId = $this->Auth->user('id');
            $this->set(compact('all_cmts', 'currentUserId','payment_id'));
        }
    }

    public function postMerchandiseSuggComment($id = null) {
        $this->loadModel('MatchingProductSuggestionComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $postArr = [];
            $postArr['payment_id'] = $postData['payment_id'];
            $postArr['user_id'] = $this->request->session()->read('Auth.User.id');
            $postArr['comment'] = $postData['comment'];
            $postArr['product_id'] = $postData['product_id'];
            $postArr['look_type'] = $postData['look_type'];
            $postArr['user_size_col'] = $postData['user_size_col'];
            $postArr['user_size'] = $postData['user_size'];
            $postArr['pay_user_id'] = $postData['pay_user_id'];
            $postArr['pay_kid_id'] = $postData['pay_kid_id'];
            if ($id) {
                $comment = $this->MatchingProductSuggestionComments->get($id);
                $comment = $this->MatchingProductSuggestionComments->patchEntity($comment, $postArr);
            } else {
                $comment = $this->MatchingProductSuggestionComments->newEntity($postArr);
            }

            if ($this->MatchingProductSuggestionComments->save($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function deleteMerchandiseSuggComment($id = null) {
        $this->loadModel('MatchingProductSuggestionComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $comment = $this->MatchingProductSuggestionComments->get($id);
            if ($this->MatchingProductSuggestionComments->delete($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function editMerchandiseSuggComment() {
        $this->loadModel('MatchingProductSuggestionComments');
        if ($this->request->is('post')) {
            $commentId = $this->request->getData('commentId');
            $comment = $this->MatchingProductSuggestionComments->find('all')->where(['id' => $commentId])->first();
            if ($comment) {
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode($comment));
            } else {
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['error' => 'Comment not found']));
            }
        } else {
            $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['error' => 'Invalid request']));
        }
        return $this->response;
    }

    public function addVariantForPoRequest(){
        $this->loadModel('KidsDetails');
        $this->loadModel('UserDetails');
        if ($this->request->is('post')) {
            $post_data = $this->request->getData();
            // print_r($post_data);
            if(!empty($post_data['pay_kid_id'])){
                $userDetails = $this->KidsDetails->find('all')->where(['id' => $post_data['pay_kid_id']])->first();
                if ($userDetails->kids_clothing_gender == 'girls') {
                    $gender = 'GirlKids'; // Girl kid
                }else{
                    $gender = 'BoyKids'; // Boy Kid
                }
            }else{
                $userDetails = $this->UserDetails->find('all')->where(['user_id' => $post_data['pay_user_id']])->first();
                if($userDetails->gender == 1){
                    $gender = 'Men';
                }else{
                    $gender = 'Women';
                }
            }
            $this->request->session()->write('new_variant_po_data', json_encode($post_data));           
            // if($post_data['look_type'] == "look_1_summer_sleeveless_top"){
                // return $this->redirect(HTTP_ROOT.'appadmins/add_variant_product/tab1/'.$gender);                    
            // }
            echo json_encode(['status'=>'success', 'url'=>HTTP_ROOT.'appadmins/newBrandPo/tab1/'.$gender]);
            exit;
        }
        echo json_encode(['status'=>'error']);
        exit;
    }

    public function poProductFileUpload(){
        $this->loadModel('PoAttachments');
        if ($this->request->is('post')) {
            $post_data = $this->request->getData();            
            if (!empty($post_data['doc_file'])) {
                $imagePath = "files/product_img/";
                $filePaths = [];

                foreach ($post_data['doc_file'] as $file) {
                    if(!empty($file['tmp_name'])){
                        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                        $filename = $file['tmp_name'];
                        $original_name = $file['name'];
                        $custom_name = time() . '_' . uniqid() . '.' . $ext;
                        move_uploaded_file($filename, $imagePath . $custom_name);
                        $filePaths = $imagePath . $custom_name;
                        
                        $newData['purchase_order_products_id'] = $post_data['po_product_id'];
                        $newData['file'] = $filePaths;
                        $newRw = $this->PoAttachments->newEntity();
                        $newRw = $this->PoAttachments->patchEntity($newRw, $newData);
                        $this->PoAttachments->save($newRw);
                    }
                } 
                echo json_encode(true);             
            }
        }
        exit;
    }

    public function getPoProductFile(){
        $this->loadModel('PoAttachments');
        if ($this->request->is('post')) {
            $post_data = $this->request->getData(); 
            $html = '';
            $all_data = $this->PoAttachments->find('all')->where(['purchase_order_products_id'=>$post_data['po_product_id']]);
            if(!empty($all_data->count())){
                foreach($all_data as $ky => $dat){
                    $html .= '<div id="file_'.$dat->id.'"><a href="'.HTTP_ROOT.$dat->file.'" target="_blank">Attachment'.($ky+1).'</a>  <button onclick="deleteFile('.$dat->id.')">Delete</button></div>';
                }                
            }
            echo $html;
        }
        exit;
    }

    public function deletePoProductFile(){
        $this->loadModel('PoAttachments');
        if ($this->request->is('post')) {
            $post_data = $this->request->getData(); 
            $file_data = $this->PoAttachments->find('all')->where(['id'=>$post_data['id']])->first();
            @unlink($file_data->file);
            $this->PoAttachments->deleteAll(['id'=>$post_data['id']]);            
            echo json_encode(true);  
        }
        exit;
    }

    public function newPoEdit($id, $po_number){
        $this->loadModel('InProductVariants');
        $this->loadModel('InProductVariantList');
        $this->loadModel('InSizes');
        $this->loadModel('InColors');

        $all_sizes = $this->InSizes->find('all')->where(['is_active' => 1]);
        $all_colors = $this->InColors->find('all')->where(['is_active' => 1]);
        $edit_data = $this->InProductVariantList->find('all')->where(['id'=>$id])->first();
        if ($this->request->is('post')) {
            $postData = $this->request->getData();

            $newRw = $this->InProductVariantList->newEntity();
            $newRw = $this->InProductVariantList->patchEntity($newRw, $postData);
            $this->InProductVariantList->save($newRw);

            $this->Flash->success(__("Po updated.."));
            return $this->redirect(HTTP_ROOT.'appadmins/new-brand-po/tab2?brand_id='.$edit_data->brand_id);
        }
        $this->set(compact('edit_data','all_sizes','all_colors'));

    }

    
    public function poNewProductFileUpload(){
        $this->loadModel('PoNewAttachments');
        if ($this->request->is('post')) {
            $post_data = $this->request->getData();            
            if (!empty($post_data['doc_file'])) {
                $imagePath = "files/product_img/";
                $filePaths = [];

                foreach ($post_data['doc_file'] as $file) {
                    if(!empty($file['tmp_name'])){
                        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                        $filename = $file['tmp_name'];
                        $original_name = $file['name'];
                        $custom_name = time() . '_' . uniqid() . '.' . $ext;
                        move_uploaded_file($filename, $imagePath . $custom_name);
                        $filePaths = $imagePath . $custom_name;
                        
                        $newData['variant_products_id'] = $post_data['po_product_id'];
                        $newData['file'] = $filePaths;
                        $newRw = $this->PoNewAttachments->newEntity();
                        $newRw = $this->PoNewAttachments->patchEntity($newRw, $newData);
                        $this->PoNewAttachments->save($newRw);
                    }
                } 
                echo json_encode(true);             
            }
        }
        exit;
    }

    public function getPoNewProductFile(){
        $this->loadModel('PoNewAttachments');
        if ($this->request->is('post')) {
            $post_data = $this->request->getData(); 
            $html = '';
            $all_data = $this->PoNewAttachments->find('all')->where(['variant_products_id'=>$post_data['po_product_id']]);
            if(!empty($all_data->count())){
                foreach($all_data as $ky => $dat){
                    $html .= '<div id="file_'.$dat->id.'"><a href="'.HTTP_ROOT.$dat->file.'" target="_blank">Attachment'.($ky+1).'</a>  <button onclick="deleteFile('.$dat->id.')">Delete</button></div>';
                }                
            }
            echo $html;
        }
        exit;
    }

    public function deleteNewPoProductFile(){
        $this->loadModel('PoNewAttachments');
        if ($this->request->is('post')) {
            $post_data = $this->request->getData(); 
            $file_data = $this->PoNewAttachments->find('all')->where(['id'=>$post_data['id']])->first();
            @unlink($file_data->file);
            $this->PoNewAttachments->deleteAll(['id'=>$post_data['id']]);            
            echo json_encode(true);  
        }
        exit;
    }

    public function updateVarPoFrom(){
        $this->loadModel('InProductVariantList');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $newData = [];
            $newData['id'] = $postData['variant_list_id'];
            $newData['po_quantity'] = $postData['qty'];
            $newData['is_po'] = 1;            
            $newData['po_status'] = 1;
            $newData['user_id'] = $postData['user_id'];
            $newData['kid_id'] = $postData['kid_id'];
            $newData['po_date'] = date('Y-m-d');
            $newRw = $this->InProductVariantList->newEntity();
            $newRw = $this->InProductVariantList->patchEntity($newRw, $newData);
            $this->InProductVariantList->save($newRw);
            echo json_encode(['status'=>'success','msg'=>'Added to PO.',$newData]);            
        }
        exit;
    }

    public function newPoCancel($id){
        $this->loadModel('InProductVariantList');
        $this->InProductVariantList->updateAll(['is_po'=>0, 'po_status'=>0, 'po_quantity'=>0],['id'=>$id]);
        $this->Flash->success(__("Po cancelled successfully"));
        return $this->redirect($this->referer());
    }

    public function cancleExistingBrandPo($id){
        $this->loadModel('PurchaseOrderProducts');
        $this->PurchaseOrderProducts->deleteAll(['id'=>$id]);
        $this->Flash->success(__("Po cancelled successfully"));
        return $this->redirect($this->referer());
    }

    public function editExistingBrandPo($id,$brand_id){
        $this->loadModel('PurchaseOrderProducts');
        $po_product = $this->PurchaseOrderProducts->find('all')->where(['id'=>$id])->first();
        $get_product_details = $this->InProducts->find('all')->where(['prod_id'=>$po_product->product_id])->first();
        if ($this->request->is('post')) {
            $post_data = $this->request->getData(); 

            $this->InProducts->updateAll(['clearance_price'=>$post_data['clearance_price'],'sale_price'=>$post_data['sale_price'],'purchase_price'=>$post_data['purchase_price']],['prod_id'=>$post_data['prod_id']]);
                        
            $this->Flash->success(__("Po updated successfully"));
            return $this->redirect(HTTP_ROOT.'appadmins/existing-brand-po/tab2?brand_id='.$post_data['brand_id']);
        }
        $this->set(compact('get_product_details', 'id', 'brand_id'));
    }

    public function removePoCustomerSession(){
        $this->request->session()->write('new_variant_po_data','');
        $this->request->session()->delete('new_variant_po_data');
        $this->Flash->success(__("Customer po data deleted."));
        return $this->redirect($this->referer());
    }
  

    
}

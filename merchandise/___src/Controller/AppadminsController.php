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

        $this->Auth->allow(['logout', 'generatePoPdf']);
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

    public function createStaff($id = null,$option=null) {


        if($option=="collaborate"){
                $this->InUsers->updateAll(['is_collaborated'=>1],['id'=>$id]);
            
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

     public function prediction() {
        $end_date = date('Y-m-d');
        $start_date = date('Y-m-01', strtotime('first day of -2 month'));
        $next_month = date('Y-m-01', strtotime('first day of +1 month'));
        $one_nxt_month = date('m', strtotime('first day of +1 month'));
        $one_nxt_month_name = date('F', strtotime('first day of +1 month'));
        $prev_month = date('Y-m-d', strtotime('first day of -1 month'));
//        echo $start_date;
//        echo '<br>' . $end_date . '<br>';

        $this->PaymentGetways->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('usr_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id','bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);
       
        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl','in_prod'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');
                //pj($paid_customer);exit;
               
                
 //$allocateData = $this->PaymentGetways->find('all')->contain(['in_prod']);
        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
         $this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id','bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr','in_produc'])->where([
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
     public function predictionAlloca($id = null, $user_id = null, $kid_id = null) {
        $this->loadModel('PurchaseOrderProducts');
    $this->InProducts->hasOne('pop', ['className' => 'PurchaseOrderProducts', 'foreignKey' => 'product_id', 'bindingKey' => 'prod_id'])->setConditions(['pop.status > ' => 0]);
    $this->InProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);
 

    $query = $this->InProducts->find('all')->contain(['brand', 'pop']);

    if (!empty($user_id)) {
        $query->where(['allocate_to_user_id' => $user_id]);
    }

    if (!empty($kid_id)) {
        $query->where(['allocate_to_kid_id' => $kid_id]);
    }
    $query->distinct(['InProducts.id']);
     $product_list = $this->paginate($query);

    $this->set(compact('product_list', 'user_id', 'kid_id', 'id'));
    }
   
    public function predictionMatching($id) {
        $this->loadModel('ShippingAddress');
   

        $getData = $this->PaymentGetways->find('all')->where(['id' => $id])->first();

        if (!empty($getData->shipping_address_id)) {
            $shipping_address = $this->ShippingAddress->find('all')->where(['id' => $getData->shipping_address_id])->first();
        } else {
            $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getData->user_id, 'default_set' => 1])->first();
            if (empty($shipping_address)) {
                $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getData->user_id])->first();
            }
        }

        $all_productsx = $this->Products->find('all')->where(['user_id' => $getData->user_id]);
        //pj($products); exit;
        $product_Id = [];
        foreach ($all_productsx as $pd) {
            $product_Id[] = $pd->id;
        }
        $prev_products = !empty($all_productsx) ? Hash::extract($all_productsx->toArray(), '{n}.prod_id') : [];
        $prev_products = array_filter($prev_products);
        $prv_cnd = '';
        if (!empty($prev_products)) {
            $prv_cnd = implode('","', $prev_products);
        }
        if (!empty($prv_cnd)) {
            $prv_cnd = 'AND `in_products`.`prod_id` NOT IN ("' . $prv_cnd . '")';
        }

//        echo $prv_cnd;exit;
        $seasons = $this->Custom->getSeason($shipping_address->city);
//        print_r($seasons);//exit;
        $seasons_arry = !empty($seasons) ? json_decode($seasons, true) : [];
//        print_r($seasons_arry);exit;
        $season_cnd = '';
        if (!empty(count($seasons_arry))) {
            foreach ($seasons_arry as $sean_ky => $sean_li) {
                if ($sean_ky == 0) {
                    $season_cnd .= '(';
                }
                if ($sean_ky > 0) {
                    $season_cnd .= ' OR ';
                }
                $season_cnd .= '`in_pud`.`season` LIKE \'%"' . $sean_li . '"%\' ';
            }
        }
        if (!empty($season_cnd)) {
            $season_cnd .= ' ) AND ';
        }
//        echo $season_cnd;exit;

        $conn = ConnectionManager::get('default');

        if ($getData->kid_id == 0) {
            $userDetails = $this->UserDetails->find('all')->where(['user_id' => $getData->user_id])->first();
            $gender = $userDetails->gender;
            if ($gender == 1) { // Men
                /* $where_profle = ['profile_type' => $gender];
                  //echo $getData->user_id; exit;
                  $getProducts = $this->Custom->menMatching($getData->user_id); */
                $getProducts = $conn->execute('SELECT *
FROM `in_products`

WHERE `in_products`.`id` IN (

    SELECT `in_pud`.`id`
    FROM `in_products` as  `in_pud`, `typically_wear_men`
    WHERE
      `in_pud`.`profile_type` = 1 AND
      `in_pud`.`match_status` = 2 AND
      `in_pud`.`available_status` = 1 AND
       (`in_pud`.`is_clearance` = 2 OR `in_pud`.`is_clearance` IS NULL) AND
      ' . $season_cnd . ' 
      (
        (
          (`in_pud`.`waist_size` = `typically_wear_men`.`waist` AND `typically_wear_men`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`shirt_size` = `typically_wear_men`.`size` AND  `typically_wear_men`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`shoe_size` = `typically_wear_men`.`shoe` AND `typically_wear_men`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`men_bottom` = `typically_wear_men`.`men_bottom` AND `typically_wear_men`.`user_id` = ' . $getData->user_id . ') 
        ) OR `in_pud`.`primary_size` = "free_size"
      )
    GROUP BY `in_pud`.`prod_id`
) ' . $prv_cnd . '
GROUP BY `in_products`.`prod_id`')->fetchAll('assoc');
            }
            if ($gender == 2) { // Women
                /* $where_profle = ['profile_type' => $gender];
                  $getProducts = $this->Custom->womenMatching($getData->user_id);
                  //               echo "<pre style='margin-left:233px;'>";
                  //               print_r($getData->user_id);
                  //               print_r($getProducts);
                  //               echo "</pre>";exit; */

                $getProducts = $conn->execute('SELECT *
FROM `in_products`

WHERE `in_products`.`id` IN (

    SELECT `in_pud`.`id`
    FROM `in_products` as  `in_pud`, `size_chart`
    WHERE
      `in_pud`.`profile_type` = 2 AND
      `in_pud`.`match_status` = 2 AND
      `in_pud`.`available_status` = 1 AND
       (`in_pud`.`is_clearance` = 2 OR `in_pud`.`is_clearance` IS NULL) AND
      ' . $season_cnd . '
      (
        (
          (`in_pud`.`shirt_blouse` = `size_chart`.`shirt_blouse` AND `in_pud`.`shirt_blouse_recomend` = `size_chart`.`shirt_blouse_recomend` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`dress` = `size_chart`.`dress` AND `in_pud`.`dress_recomended` = `size_chart`.`dress_recomended` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`pants` = `size_chart`.`pants` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`wo_bottom` = `size_chart`.`wo_bottom` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`wo_jackect_size` = `size_chart`.`wo_jackect_size` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`bra` = `size_chart`.`bra` AND `in_pud`.`bra_recomend` = `size_chart`.`bra_recomend` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`skirt` = `size_chart`.`skirt` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`jeans` = `size_chart`.`jeans` AND `size_chart`.`user_id` = ' . $getData->user_id . ') OR
          (`in_pud`.`shoe_size` = `size_chart`.`shoe` AND `size_chart`.`user_id` = ' . $getData->user_id . ') 
        ) OR `in_pud`.`primary_size` = "free_size"
      ) 
    GROUP BY `in_pud`.`prod_id`
) ' . $prv_cnd . '
GROUP BY `in_products`.`prod_id`')->fetchAll('assoc');
            }
        } else {
            $userDetails = $this->KidsDetails->find('all')->where(['id' => $getData->kid_id])->first();
            if ($userDetails->kids_clothing_gender == 'girls') {
                /* $gender = 4; // Girl kid
                  $where_profle = ['profile_type' => $gender];
                  $getProducts = $this->Custom->girlsMatching($getData->user_id, $getData->kid_id); */
                $getProducts = $conn->execute('SELECT *
FROM `in_products`

WHERE `in_products`.`id` IN (

    SELECT `in_pud`.`id`
    FROM `in_products` as  `in_pud`, `kids_size_fit`
    WHERE
      `in_pud`.`profile_type` = 4 AND
      `in_pud`.`match_status` = 2 AND
      `in_pud`.`available_status` = 1 AND
       (`in_pud`.`is_clearance` = 2 OR `in_pud`.`is_clearance` IS NULL) AND
      ' . $season_cnd . '
      (
        (
          (`in_pud`.`top_size` = `kids_size_fit`.`top_size` OR `in_pud`.`bottom_size` = `kids_size_fit`.`bottom_size` OR `in_pud`.`shoe_size` = `kids_size_fit`.`shoe_size`) AND `kids_size_fit`.`kid_id` = ' . $getData->kid_id . ' 
        ) OR `in_pud`.`primary_size` = "free_size"
      )
    GROUP BY `in_pud`.`prod_id`
) ' . $prv_cnd . '
GROUP BY `in_products`.`prod_id`')->fetchAll('assoc');
            } else {
                /* $gender = 3; // Boy kid
                  $where_profle = ['profile_type' => $gender];
                  $getProducts = $this->Custom->boyMatching($getData->user_id, $getData->kid_id); */
                $getProducts = $conn->execute('SELECT *
FROM `in_products`

WHERE `in_products`.`id` IN (

    SELECT `in_pud`.`id`
    FROM `in_products` as  `in_pud`, `kids_size_fit`
    WHERE
      `in_pud`.`profile_type` = 3 AND
      `in_pud`.`match_status` = 2 AND
      `in_pud`.`available_status` = 1 AND
       (`in_pud`.`is_clearance` = 2 OR `in_pud`.`is_clearance` IS NULL) AND
      ' . $season_cnd . '
      (
        (
          (`in_pud`.`top_size` = `kids_size_fit`.`top_size` OR `in_pud`.`bottom_size` = `kids_size_fit`.`bottom_size` OR `in_pud`.`shoe_size` = `kids_size_fit`.`shoe_size`) AND `kids_size_fit`.`kid_id` = ' . $getData->kid_id . '
        ) OR `in_pud`.`primary_size` = "free_size"
      )
    GROUP BY `in_pud`.`prod_id`
) ' . $prv_cnd . '
GROUP BY `in_products`.`prod_id`')->fetchAll('assoc');
            }
        }

        $this->loadModel('MatchingCase');
        $all_products = [];
        $all_prd_ids = [];
        if (!empty($getProducts)) {
            $this->MatchingCase->deleteAll(['payment_id' => $id]);
            foreach ($getProducts as $prd_ky => $prd_lii) {
                if (!empty($prd_ky)) {
                    $newRws = $this->MatchingCase->newEntity();
                    $newRws->payment_id = $id;
                    $newRws->product_id = $prd_lii['id']; //$prd_ky;
                    $newRws->count = 0; //count($prd_lii);
                    $newRws->matching = json_encode([]); //json_encode($prd_lii);
                    $this->MatchingCase->save($newRws);

                    $all_prd_ids[] = $prd_lii['id']; //$prd_ky;
                }
            }


            if (!empty($all_prd_ids)) {
                $this->InProducts->hasOne('match_case', ['className' => 'MatchingCase', 'foreignKey' => 'product_id'])->setConditions(['payment_id' => $id]);
                $all_product = $this->InProducts->find('all')->contain(['match_case' /* => ['sort' => ['match_case.count' => 'DESC']] */])->where(['OR' => ['InProducts.is_clearance' => 2, 'InProducts.is_clearance IS' => NULL], 'InProducts.available_status !=' => 2, 'InProducts.is_active !=' => 0, 'InProducts.id IN' => $all_prd_ids])->order(['match_case.count' => 'DESC']);
                $this->paginate['limit'] = 10;
           // pj($all_product);exit;
                if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
                    if ($_GET['search_for'] == "product_name1") {
                        $get_data_value = trim($_GET['search_data']);
                        $all_product = $all_product->where(['InProducts.product_name_one LIKE' => "%" . $get_data_value . "%"]);
                    }
                    if ($_GET['search_for'] == "product_name2") {
                        $get_data_value = trim($_GET['search_data']);
                        $all_product = $all_product->where(['InProducts.product_name_two LIKE' => "%" . $get_data_value . "%"]);
                    }
                    if ($_GET['search_for'] == "style_number") {
                        $get_data_value = trim($_GET['search_data']);
                        $all_product = $all_product->where(['InProducts.style_number LIKE' => "%" . $get_data_value . "%"]);
                    }
                    if ($_GET['search_for'] == "bar_code") {
                        $get_data_value = trim($_GET['search_data']);
                        if (in_array()) {
                            
                        }
                        $all_product = $all_product->where(['InProducts.dtls LIKE' => "%" . $get_data_value . "%"]);
                    }

                    if ($_GET['search_for'] == "color") {
                        $get_data_value = trim($_GET['search_data']);
                        $chk_color = $this->InColors->find('all')->where(['InColors.name LIKE' => '%' . $get_data_value . '%']);
                        $color_list = [];
                        if (!empty($chk_color)) {
                            $color_list = Hash::extract($chk_color->toArray(), '{n}.id');
                        }
                        if (!empty($color_list)) {
                            $all_product = $all_product->where(['InProducts.color IN' => $color_list]);
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
                            $all_product = $all_product->where(['InProducts.brand_id IN' => $brand_list]);
                        }
                    }
                }  
                $all_products = $this->paginate($all_product);
                //pj($all_products);exit;
            }
//        echo "<pre>";
//        print_r($all_products);
//        echo "</pre>";
        }
        $this->set(compact('userDetails', 'gender', 'getProducts', 'id', 'getData', 'all_products'));
    }

     public function nxtPrediction() {
        /* $end_date = date('Y-m-01', strtotime('first day of +1 month'));
          $start_date = date('Y-m-01', strtotime('first day of -1 month'));
          $next_month = date('Y-m-01', strtotime('first day of +2 month'));
          $one_nxt_month = date('m', strtotime('first day of +2 month'));
          $one_nxt_month_name = date('F', strtotime('first day of +2 month'));
          $prev_month = date('Y-m-01');
         */
        $end_date = date('Y-m-d'/* , strtotime('first day of +1 month') */);
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
         $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id','bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl','in_prod'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');

        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
$this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id','bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr','in_produc'])->where([
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

    public function nxtNxtPrediction() {
        /* $end_date = date('Y-m-01', strtotime('first day of +1 month'));
          $start_date = date('Y-m-01', strtotime('first day of -1 month'));
          $next_month = date('Y-m-01', strtotime('first day of +2 month'));
          $one_nxt_month = date('m', strtotime('first day of +2 month'));
          $one_nxt_month_name = date('F', strtotime('first day of +2 month'));
          $prev_month = date('Y-m-01');
         */
        $end_date = date('Y-m-d'/* , strtotime('first day of +1 month') */);
        $start_date = date('Y-m-01', strtotime('first day of -1 month'));
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
        $this->PaymentGetways->hasMany('in_prod', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_user_id','bindingKey' => 'user_id'])->setConditions(['in_prod.allocate_to_kid_id' => 0]);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr', 'usr_dtl','in_prod'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');

        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('in_produc', ['className' => 'InProducts', 'foreignKey' => 'allocate_to_kid_id','bindingKey' => 'kid_id'])->setConditions(['in_produc.allocate_to_kid_id !=' => 0]);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product','in_produc', 'usr'])->where([
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

        $this->InProducts->hasMany('pop', ['className' => 'PurchaseOrderProducts', 'foreignKey' => 'product_id', 'bindingKey' => 'prod_id'])->setConditions(['pop.status > ' => 0, 'pop.user_id' => $getData->user_id, 'pop.kid_id' => $getData->kid_id]);
        $this->InProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);
        if (!empty($prev_products)) {
            /* $product_list */$product_list1 = $this->InProducts->find('all')->contain(['brand', 'pop'])->order(['InProducts.id' => 'DESC'])->where(['InProducts.profile_type' => $gender, /* 'InProducts.prod_id NOT IN' => $prev_products, 'InProducts.quantity >' => 0, */ 'InProducts.match_status' => 2, 'InProducts.allocate_to_user_id IS' => NULL, 'InProducts.allocate_to_kid_id IS' => NULL])->group('prod_id');
        } else {
            /* $product_list */$product_list1 = $this->InProducts->find('all')->contain(['brand', 'pop'])->order(['InProducts.id' => 'DESC'])->where(['InProducts.profile_type' => $gender, /* 'InProducts.quantity >' => 0, */ 'InProducts.match_status' => 2, 'InProducts.allocate_to_user_id IS' => NULL, 'InProducts.allocate_to_kid_id IS' => NULL])->group('prod_id');
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

//        $this->paginate['limit'] = 20;
        $product_list = $this->paginate($product_list1);
      //pj($product_list);exit;
        $this->set(compact('product_list','getData', 'userDetails','payment_id', 'u_name'));
    }
   
    
    public function allocate($prod_id, $user_id, $kid_id) {
        $this->InProducts->updateAll(
            ['allocate_to_user_id' => $user_id, 'allocate_to_kid_id' => $kid_id],
            ['id' => $prod_id]
        );
    
        $this->Flash->success(__('Product Allocation to PO'));
        return $this->redirect($this->referer());

    }
    
    public function release($prod_id) {
        $this->InProducts->updateAll(
            ['allocate_to_user_id' => null, 'allocate_to_kid_id' => null],
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

          $this->PurchaseOrderProducts->belongsTo('user', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PurchaseOrderProducts->belongsTo('kid_dt', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PurchaseOrderProducts->hasMany('prd_detl', ['className' => 'InProducts', 'foreignKey' => 'prod_id', 'bindingKey' => 'product_id']);
        $tab1_data_list = $this->PurchaseOrderProducts->find('all')->contain(['prd_detl', 'brand','user','kid_dt']);
        if (empty($tab) || ($tab == 'tab1')) {
            $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.status' => 1]);
            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
            }
        }

        if (!empty($tab) && ($tab == 'tab2')) {
            $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 0, 'PurchaseOrderProducts.status !=' => 4])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id'], 'PurchaseOrderProducts.status IN' => [2,3]]);
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

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            if (empty($postData['proceed_id'])) {
                $this->Flash->success(__('No Product found to proceed'));
                return $this->redirect($this->referer());
            }
            $prd_id = explode(',', $postData['proceed_id']);

            $this->PurchaseOrderProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'brand_id']);

            $this->PurchaseOrderProducts->hasMany('prd_detl', ['className' => 'InProducts', 'foreignKey' => 'prod_id', 'bindingKey' => 'product_id']);
            $data_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.status' => 1, 'PurchaseOrderProducts.is_new_brand' => 1, 'PurchaseOrderProducts.id IN' => $prd_id])->contain(['brand', 'prd_detl']);
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

                foreach ($data_list as $kyx => $dat_li) {
                    $this->InProducts->updateAll(['po_id' => $last_id, 'po_number' => $po_number, 'po_status' => 2], ['prod_id' => $dat_li->product_id]);
                }

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
            $raw_style_number = str_replace(end($explode_arr), '', $prd_detials['style_number']);
            $data['id'] = '';
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

        $prd_detials = $this->InProducts->find('all')->where(['prod_id' => $product_id])->first()->toArray();
        $po_prd_detials = $this->PurchaseOrderProducts->find('all')->where(['product_id' => $product_id, 'po_number' => $po_number])->first();
//        pj([$product_id, $po_number]);
//        pj($prd_detials);
//        pj($po_prd_detials);          
        $this->PurchaseOrderProducts->updateAll(['status' => 3], ['id' => $po_prd_detials->id]);
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
        $prod_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 0, 'PurchaseOrderProducts.status' => 3, 'PurchaseOrderProducts.brand_id' => $brand_id])->group(['PurchaseOrderProducts.po_number']);

        $po_number_list = !empty($prod_list) ? Hash::extract($prod_list->toArray(), '{n}.po_number') : [];

        print_r($po_number_list);
        foreach ($po_number_list as $po_numb) {
            $this->PurchaseOrderProducts->updateAll(['status' => 4], ['po_number' => $po_numb]);
            $this->PurchaseOrders->updateAll(['status' => 4], ['po_number' => $po_numb]);
            $this->InProducts->updateAll(['po_status' => 4], ['po_number' => $po_numb]);
        }
        $this->Flash->success(__('Po received.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/new-brand-po/tab4');
    }

    public function newBrandPo($tab = null, $option = null, $id = null) {
        $this->loadModel('PurchaseOrderProducts');
        $this->loadModel('PurchaseOrders');
        $this->loadModel('InProducts');
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
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
            }
        }
        if (!empty($tab) && ($tab == 'tab3')) {
            $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 1])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
            }
        }
        if (!empty($tab) && ($tab == 'tab4')) {
            $tab1_brand_list = $this->PurchaseOrderProducts->find('all')->where(['PurchaseOrderProducts.is_new_brand' => 1])->group(['PurchaseOrderProducts.brand_id'])->contain(['brand']);

            if (!empty($_GET) && !empty($_GET['brand_id'])) {
                $tab1_data_list = $tab1_data_list->where(['PurchaseOrderProducts.brand_id' => $_GET['brand_id']]);
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
        $brandsListings = $this->InUsers->find('all')->where(['type' => 3, 'is_collaborated'=>1])->order(['id']);
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

        $this->set(compact('utype', 'in_rack', 'productType', 'id', 'editproduct', 'profile', 'brandsListings', 'product_ctg_nme', 'product_sub_ctg_nme', 'tab', 'option', 'id', 'tab1_brand_list', 'tab1_data_list'));
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

                if ($data['product_image']['size'] <= 20000) {

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

            $allData = $this->InRack->find('all')->where(['in_product_type_id' => $data['id']]);

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
    
    public function getInuserComment(){        
        $this->loadModel('InuserComments');
        
        $this->viewBuilder()->layout('');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $inuser_id = $postData['inuser_id'];
                 
            $all_cmts = $this->InuserComments->find('all')->where(['ProductComments.inuser_id'=>$inuser_id])->order(['InuserComments.id'=>'DESC']);
            $this->set(compact('all_cmts'));
        }else{
            
        }
        
    }
    public function postInuserComment(){        
        $this->loadModel('InuserComments');
        
        $this->viewBuilder()->layout('');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $postArr = [];
            $postArr['inuser_id'] = $postData['inuser_id'];
            $postArr['user_id'] = $this->request->session()->read('Auth.User.id');;
            $postArr['comment'] = !empty($postData['comment'])?$postData['comment']:"";
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
                        
            $all_cmts = $this->AdminComments->find('all')->where(['AdminComments.admin_id'=>$admin_id])->order(['AdminComments.id'=>'DESC']);
           
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
}

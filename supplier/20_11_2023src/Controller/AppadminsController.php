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

require_once(ROOT . '/vendor/' . DS . '/barcode/vendor/autoload.php');

require_once(ROOT . '/vendor' . DS . 'PaymentTransactions' . DS . 'authorize-credit-card.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use \PHPExcel_IOFactory;

class AppadminsController extends AppController {

    public function initialize() {

        parent::initialize();
        $this->loadComponent('Custom');
        $this->loadComponent('Flash');
        $this->loadModel('Pages');
        $this->loadModel('SupplyUsers');
        $this->loadModel('SupplyProducts');
        $this->loadModel('SupplyProductCategories');
        $this->loadModel('Settings');
        $this->viewBuilder()->layout('admin');
    }

    public function beforeFilter(Event $event) {

        $this->Auth->allow(['logout']);
    }

    public function index($id = null) {

        $this->viewBuilder()->layout('admin');

        $empId = $this->request->session()->read('Auth.User.id');

        $brands_count = $this->SupplyUsers->find('all')->where(['type' => 3])->count();

        $this->set(compact('paid_users', 'brands_count', 'admin12', 'kid_count', 'notmen_pay', 'notwomen_pay', 'notkid_pay'));
    }

    public function profile($param = null) {

        $user_id = $this->request->session()->read('Auth.User.id');

        $rowname = $this->SupplyUsers->find('all')->where(['SupplyUsers.id' => $user_id])->first();

        $getCurPassword = $this->SupplyUsers->find('all', ['fields' => ['password']])->where(['SupplyUsers.id' => $user_id])->first();

        $settingsEmailTempletes = $this->Settings->find('all')->where(['Settings.type' => 2])->group('Settings.id');

        $row = $this->SupplyUsers->find('all')->where(['SupplyUsers.id' => $user_id])->first();

        $type = $this->request->session()->read('Auth.User.type');

        $this->viewBuilder()->layout('admin');

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $user = $this->SupplyUsers->newEntity();
            $data['id'] = $this->request->session()->read('Auth.User.id');

            if (!empty($data['changepassword']) == 'Change password') {

                if ($data['password'] != $data['cpassword']) {

                    $this->Flash->error(__('Password and Confirm password fields do not match'));

                    return $this->redirect(['action' => 'profile/changepassword']);
                } else {



                    $hasher = new DefaultPasswordHasher();

                    $data['password'] = $hasher->hash($data['password']);

                    $user = $this->SupplyUsers->patchEntity($user, $data);

                    if ($this->SupplyUsers->save($user)) {

                        $this->Flash->success(__('Password has been chaged successfully.'));

                        return $this->redirect(['action' => 'profile/changepassword']);
                    } else {

                        $this->Flash->error(__('Password could not be change. Please, try again.'));

                        return $this->redirect(['action' => 'profile/changepassword']);
                    }
                }
            } else {

                if (@$data['name'] == '') {

                    $this->Flash->error(__("Please enter your name"));
                } else if ($data['email'] == '') {

                    $this->Flash->error(__("Please enter your email"));
                } else {
                    $user = $this->SupplyUsers->patchEntity($user, $data);
                    if ($this->SupplyUsers->save($user)) {

                        $this->Flash->success(__('The Profile has been update.'));

                        return $this->redirect(['action' => 'profile']);
                    } else {

                        $this->Flash->error(__('The Profile could not be update. Please, try again.'));
                    }
                }
            }
        }



        $this->set(compact('rowname', 'settingsEmailTempletes', 'row', 'user', 'row', 'options', 'param', 'user_id'));
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

    public function product($option = null, $id = null) {

        $user_id = $this->request->session()->read('Auth.User.id');
        $fixed_category = ['1' => 'Box', '2' => 'Tag', '3' => 'Shipping label', '4' => 'Wrapping paper', '5' => 'Printing Paper', '6' => 'Stylist Suggestion', '7' => 'DF Sticker big size', '8' => 'DF Sticker small size', '9' => 'Return envelope', '10' => 'Envelope', '11' => 'Brochure'];
        $all_category = $this->SupplyProductCategories->find('all');
        $editproduct = [];
        if (!empty($id)) {
            $editproduct = $this->SupplyProducts->find('all')->where(['id' => $id])->first();
        }
        if (!empty($option == "delete")) {
            if (!empty($id) && !empty($editproduct)) {
                unset($editproduct->product_photo);
            }
            $this->SupplyProducts->deleteAll(['id' => $id]);
            $this->Flash->success(__('The product deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/product');
        }

        $all_data = $this->SupplyProducts->find('all');
        if ($this->request->is('post')) {
            $post_data = $this->request->data;

            if (empty($post_data['id']) && !empty($post_data['category']) && ($post_data['category'] <= 8)) {
                $chk_prd_cnt = $this->SupplyProducts->find('all')->where(['category' => $post_data['category']])->count();
                if ($chk_prd_cnt > 0) {
                    $this->Flash->error(__('One product already present on this fixed category.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/product');
                }
            }
            if (!empty($post_data['product_image']['tmp_name'])) {
                if (!empty($id) && !empty($editproduct)) {
                    unset($editproduct->product_photo);
                }
                $avatarName = $this->Custom->uploadAvatarImage($post_data['product_image']['tmp_name'], $post_data['product_image']['name'], PRODUCT_IMAGES, 500);
                $post_data['product_photo'] = PRODUCT_IMAGES . $avatarName;
            }
            $post_data['user_id'] = $user_id;
            $post_data['current_stock'] = $post_data['quantity'];
            $product = $this->SupplyProducts->newEntity();
            $product = $this->SupplyProducts->patchEntity($product, $post_data);
            if ($this->SupplyProducts->save($product)) {
                $this->Flash->success(__('The product added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/product');
            } else {
                $this->Flash->error(__('The product could not be added. Please, try again.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/product');
            }
        }

        $this->set(compact('all_data', 'option', 'id', 'editproduct', 'fixed_category', 'all_category'));
    }

    public function productCategory($option = null, $id = null) {
        $fixed_category = ['1' => 'Box', '2' => 'Tag', '3' => 'Shipping label', '4' => 'Wrapping paper', '5' => 'Printing Paper', '6' => 'Stylist Suggestion', '7' => 'DF Sticker big size', '8' => 'DF Sticker small size', '9' => 'Return envelope', '10' => 'Envelope', '11' => 'Brochure'];
        $user_id = $this->request->session()->read('Auth.User.id');
        $editproduct = [];
        if (!empty($id)) {
            $editproduct = $this->SupplyProductCategories->find('all')->where(['id' => $id])->first();
        }
        if (!empty($option == "delete")) {
            $this->SupplyProductCategories->deleteAll(['id' => $id]);
            $this->Flash->success(__('The category deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/product_category');
        }

        $all_data = $this->SupplyProductCategories->find('all');
        if ($this->request->is('post')) {
            $post_data = $this->request->data;

            $post_data['user_id'] = $user_id;
            $product_ctg = $this->SupplyProductCategories->newEntity();
            $product_ctg = $this->SupplyProductCategories->patchEntity($product_ctg, $post_data);
            if ($this->SupplyProductCategories->save($product_ctg)) {
                $this->Flash->success(__('The category added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/product_category');
            } else {
                $this->Flash->error(__('The category could not be added. Please, try again.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/product_category');
            }
        }

        $this->set(compact('all_data', 'option', 'id', 'editproduct', 'fixed_category'));
    }

    public function updateStock() {
        if ($this->request->is('post')) {
            $post_data = $this->request->data;
            $id = $post_data['stock_id'];
            $qnt = $post_data['stock_quantity'];
            $current_data = $this->SupplyProducts->find('all')->where(['id' => $id])->first();
            $this->SupplyProducts->updateAll(['quantity' => ($current_data->quantity + $qnt), 'current_stock' => ( $current_data->current_stock + $qnt)], ['id' => $id]);
            $this->Flash->success(__('Stock quantity updated.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/product');
        } else {
            $this->Flash->error(__('Not allow to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
    }

    public function deductStock() {
        if ($this->request->is('post')) {
            $post_data = $this->request->data;
            $id = $post_data['stock_id'];
            $qnt = $post_data['stock_quantity'];
            $current_data = $this->SupplyProducts->find('all')->where(['id' => $id])->first();
            $this->SupplyProducts->updateAll(['current_stock' => ( $current_data->current_stock - $qnt), 'used' => ( $current_data->used + $qnt)], ['id' => $id]);
            $this->Flash->success(__('Stock updated.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/product');
        } else {
            $this->Flash->error(__('Not allow to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
    }

    public function productDeduct() {
        $this->loadModel('SupplyDeduct');
        $fixed_category = ['1' => 'Box', '2' => 'Tag', '3' => 'Shipping label', '4' => 'Wrapping paper', '5' => 'Printing Paper', '6' => 'Stylist Suggestion', '7' => 'DF Sticker big size', '8' => 'DF Sticker small size', '9' => 'Return envelope', '10' => 'Envelope', '11' => 'Brochure'];
        $all_data = [];
        if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime(date('Y-m-d', strtotime($_GET['end_date'])) . ' + 1 days'));

            $this->SupplyDeduct->belongsTo('supply_product', ['className' => 'SupplyProducts', 'foreignKey' => 'supply_product_id'])/* ->setConditions(['parent_fix.kid_id' => 0]) */;
            $this->SupplyDeduct->belongsTo('payment_getway', ['className' => 'PaymentGetways', 'foreignKey' => 'order_id'/* , 'bindingKey' => 'user_id' */]);
            $all_data = $this->SupplyDeduct->find('all')->contain(['supply_product', 'payment_getway'])->where([
                        'SupplyDeduct.created_on BETWEEN :start AND :end'
                    ])
                    ->bind(':start', $start_date, 'date')
                    ->bind(':end', $end_date, 'date');
            //' #DFPYMID'
        }
        $this->set(compact('all_data'));
    }

    public function productDeductSummary() {
        $this->loadModel('SupplyDeduct');
        $this->loadModel('BoxOrders');
        $fixed_category = ['1' => 'Box', '2' => 'Tag', '3' => 'Shipping label', '4' => 'Wrapping paper', '5' => 'Printing Paper', '6' => 'Stylist Suggestion', '7' => 'DF Sticker big size', '8' => 'DF Sticker small size', '9' => 'Return envelope', '10' => 'Envelope', '11' => 'Brochure'];
        $all_data = [];
        if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['start_date']));
            $end_date = date('Y-m-d', strtotime(date('Y-m-d', strtotime($_GET['end_date'])) . ' + 1 days'));

            $this->SupplyDeduct->belongsTo('supply_product', ['className' => 'SupplyProducts', 'foreignKey' => 'supply_product_id'])/* ->setConditions(['parent_fix.kid_id' => 0]) */;

            $all_data = $this->SupplyDeduct->find('all');
            $all_data = $all_data->contain(['supply_product'])
                            ->select([
                                'sum' => $all_data->func()->sum('SupplyDeduct.quatity'),
                            ])
                            ->autoFields(true)
                            ->where([
                                'SupplyDeduct.created_on BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date')->group('SupplyDeduct.supply_product_id');

            $all_payment_data = $this->BoxOrders->find('all')->where([
                        'created_on BETWEEN :start AND :end'
                    ])
                    ->bind(':start', $start_date, 'datetime')
                    ->bind(':end', $end_date, 'datetime');
        }
        $this->set(compact('all_data','all_payment_data'));
    }
}

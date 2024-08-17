<?php

namespace App\Controller;

use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;
use Cake\Validation\Validator;

require_once(ROOT . '/vendor/' . DS . '/barcode/vendor/autoload.php');
require_once(ROOT . '/vendor' . DS . 'PaymentTransactions' . DS . 'authorize-credit-card.php');
require_once(ROOT . '/vendor/' . DS . '/mpdf/vendor/' . 'autoload.php');
require_once(ROOT . '/vendor/' . DS . '/phpoffice/vendor/autoload.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
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
        
        $this->loadComponent('Custom');
        $this->loadComponent('Mpdf');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Promocode');
        $this->loadModel('UserDetails');
        $this->loadModel('PaymentGetways');
        $this->loadModel('Products');
        $this->loadModel('MenStats');
        $this->loadModel('MensBrands');
        $this->loadModel('MenFit');
        $this->loadModel('MenStats');
        $this->loadModel('MenStyle');
        $this->loadModel('MenStyleSphereSelections');
        $this->loadModel('KidsDetails');
        $this->loadModel('TypicallyWearMen');
        $this->loadModel('ShippingAddress');
        $this->loadModel('Settings');
        $this->loadModel('SizeChart');
        $this->loadModel('style_quizs');
        $this->loadModel('UserDetails');
        $this->loadModel('YourProportions');
        $this->loadModel('CustomerProductReview');
        $this->loadModel('FitCut');
        $this->loadModel('FlauntArms');
        $this->loadModel('WemenJeansLength');
        $this->loadModel('WomenJeansRise');
        $this->loadModel('WomenJeansStyle');
        $this->loadModel('WomenPrintsAvoid');
        $this->loadModel('WomenTypicalPurchaseCloth');
        $this->loadModel('WomenIncorporateWardrobe');
        $this->loadModel('WomenFabricsAvoid');
        $this->loadModel('WomenColorAvoid');
        $this->loadModel('WomenPrice');
        $this->loadModel('WomenStyle');
        $this->loadModel('WomenInformation');
        $this->loadModel('WomenRatherDownplay');
        $this->loadModel('PersonalizedFix');
        $this->loadModel('LetsPlanYourFirstFix');
        $this->loadModel('KidsDetails');
        $this->loadModel('KidsPersonality');
        $this->loadModel('KidsPrimary');
        $this->loadModel('KidsSizeFit');
        $this->loadModel('KidsDetails');
        $this->loadModel('KidClothingType');
        $this->loadModel('FabricsOrEmbellishments');
        $this->loadModel('KidStyles');
        $this->loadModel('KidsPricingShoping');
        $this->loadModel('KidPurchaseClothing');
        $this->loadModel('DeliverDate');
        $this->loadModel('ChatCategoryImages');
        $this->loadModel('UserMailTemplatePromocode');
        $this->loadModel('Pages');
        $this->loadModel('SocialMedia');
        $this->loadModel('Catelogs');
        $this->loadModel('KidFocusOnSending');
        $this->loadModel('PaymentCardDetails');
        $this->loadModel('StyleQuizs');
        $this->loadModel('WearType');
        $this->loadModel('KidsPpricingShoping');
        $this->loadModel('TShirtsWouldWear');
        $this->loadModel('UserUsesPromocode');
        $this->loadModel('UserUsesPromocode');
        $this->loadModel('ChatMessages');
        $this->loadModel('EmailPreferences');
        $this->loadModel('HelpDesks');
        $this->loadModel('MyItem');
        $this->loadModel('Payments');
        $this->loadModel('RatherDownplay');
        $this->loadModel('your_child_fix');
        $this->loadModel('ClothingCategoriesWeAvoid');
        $this->loadModel('ReferFriends');
        $this->loadModel('Wallets');
        $this->loadModel('Giftcard');
        $this->loadModel('UserMailTemplateGiftcode');
        $this->loadModel('UserUsesGiftcode');
        $this->loadModel('UserUsesPromocode');
        $this->loadModel('Notifications');
        $this->loadModel('MenAccessories');
        $this->loadModel('CustomDesine');
        $this->loadModel('WomenHeelHightPrefer');
        $this->loadModel('WomenShoePrefer');
        $this->loadModel('WemenStyleSphereSelections');
        $this->loadModel('PaymentGetways');
        $this->loadModel('CareerDynamic');
        $this->loadModel('BlogCategory');
        $this->loadModel('Blogs');
        $this->loadModel('BlogTag');
        $this->loadModel('News');
        $this->loadmodel('CustomerStylist');
        $this->loadmodel('InProducts');
        $this->loadmodel('InUsers');
        $this->loadmodel('SuperAdmin');
        $this->loadmodel('UserAppliedCodeOrderReview');
        $this->loadmodel('Paymentmode');
        $this->loadmodel('BatchMailingReports');
        $this->loadmodel('ClientsBirthday');
        $this->loadmodel('UsageProducts');
        $this->loadModel('InUsers');
        $this->loadModel('InProducts');
        $this->loadModel('InRack');
        $this->loadModel('InColors');
        $this->loadModel('SalesNotApplicableState');
        $this->loadModel('InProductType');
        $this->loadModel('Stamps');
        
        $this->loadModel('InProductLogs');
        $this->viewBuilder()->layout('admin');
    }
    
    public $paginate = ['limit' => 50];

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['emptytbldebaish2', 'filterdebasish', 'emptytbldebaish3', 'testdebasishexce2', 'copydebaish', 'rowdebasish', 'emptytbldebaish', 'testdebasishexcel', 'testdebasish', 'customerReports', 'customerNonePaidpdf', 'logout', 'employeeAssignedUserKid']);
    }

    public function customerList() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 3) {
            $this->CustomerStylist->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $userdetails = $this->CustomerStylist->find('all')->contain(['Users'])->where(['CustomerStylist.employee_id' => $id])->group(['CustomerStylist.id']);
        } elseif ($type == 1) {
            $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
            $staff_assigned_user = array_unique($this->CustomerStylist->find('all')->extract('user_id')->toArray());
            $staff_assigned_emp = array_unique($this->CustomerStylist->find('all')->extract('employee_id')->toArray());
            $userdetails = $this->Users->find('all')->where(['type' => 2])->order(['created_dt' => 'DESC'])->contain(['UserDetails'])->group(['Users.id']);
        }
        
        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }
  
          
            if ($_GET['search_for'] == "email") {
                $eml = trim($_GET['search_data']);
                $userdetails = $userdetails->where(['Users.email LIKE' => "%".$eml."%"]);
            }
        }
        
        $this->paginate = ['limit' => 100];
        
        $new_userdetails = $this->paginate($userdetails);
//        $new_userdetails = $userdetails;
        //pj($userdetails);exit;
        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count', 'staff_assigned_emp', 'new_userdetails'));
    }

    public function index($id = null) {
        
        if ($this->Auth->user('type') == 3) {
            $empId = $this->request->session()->read('Auth.User.id');
            $paid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.emp_id' => $empId]);
            $men_count = $this->PaymentGetways->find('all')->where(['profile_type' => 1, 'emp_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $women_count = $this->PaymentGetways->find('all')->where(['profile_type' => 2, 'emp_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $kid_count = $this->PaymentGetways->find('all')->where(['profile_type' => 3, 'emp_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $userId = $this->CustomerStylist->find('all')->where(['employee_id' => $empId]);
            $m = 0;
            $w = 0;
            $k = 0;
            $notmen_pay = 0;
            $notwomen_pay = 0;
            $notkid_pay = 0;
            foreach ($userId as $usedetl) {
                if ($usedetl->kid_id != '') {
                    $checkPaidDetailsKid = $this->Custom->ChcckPaidKid($usedetl->kid_id);
                    if ($checkPaidDetailsKid != $usedetl->kid_id) {
                        $notkid_pay = ++$k;
                    }
                } else {
                    $getPaidStatus = $this->Custom->ChcckPaid($usedetl->user_id);
                    if ($getPaidStatus != $usedetl->user_id) {
                        if (@$this->Custom->UserGender($usedetl->user_id) == 1) {
                            $notmen_pay = ++$m;
                        }if (@$this->Custom->UserGender($usedetl->user_id) == 2) {
                            $notwomen_pay = ++$w;
                        }
                    }
                }
            }
        } elseif ($this->Auth->user('type') == 7) {
            $empId = $this->request->session()->read('Auth.User.id');
            $paid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.inv_id' => $empId]);
            $men_count = $this->PaymentGetways->find('all')->where(['profile_type' => 1, 'inv_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $women_count = $this->PaymentGetways->find('all')->where(['profile_type' => 2, 'inv_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $kid_count = $this->PaymentGetways->find('all')->where(['profile_type' => 3, 'inv_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $userId = []; //$this->CustomerStylist->find('all')->where(['employee_id' => $empId]);
            $m = 0;
            $w = 0;
            $k = 0;
            $notmen_pay = 0;
            $notwomen_pay = 0;
            $notkid_pay = 0;
            foreach ($userId as $usedetl) {
                if ($usedetl->kid_id != '') {
                    $checkPaidDetailsKid = $this->Custom->ChcckPaidKid($usedetl->kid_id);
                    if ($checkPaidDetailsKid != $usedetl->kid_id) {
                        $notkid_pay = ++$k;
                    }
                } else {
                    $getPaidStatus = $this->Custom->ChcckPaid($usedetl->user_id);
                    if ($getPaidStatus != $usedetl->user_id) {
                        if (@$this->Custom->UserGender($usedetl->user_id) == 1) {
                            $notmen_pay = ++$m;
                        }if (@$this->Custom->UserGender($usedetl->user_id) == 2) {
                            $notwomen_pay = ++$w;
                        }
                    }
                }
            }
        } elseif ($this->Auth->user('type') == 8) {
            $empId = $this->request->session()->read('Auth.User.id');
            $paid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.qa_id' => $empId]);
            $men_count = $this->PaymentGetways->find('all')->where(['profile_type' => 1, 'qa_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $women_count = $this->PaymentGetways->find('all')->where(['profile_type' => 2, 'qa_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $kid_count = $this->PaymentGetways->find('all')->where(['profile_type' => 3, 'qa_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $userId = []; //$this->CustomerStylist->find('all')->where(['employee_id' => $empId]);
            $m = 0;
            $w = 0;
            $k = 0;
            $notmen_pay = 0;
            $notwomen_pay = 0;
            $notkid_pay = 0;
            foreach ($userId as $usedetl) {
                if ($usedetl->kid_id != '') {
                    $checkPaidDetailsKid = $this->Custom->ChcckPaidKid($usedetl->kid_id);
                    if ($checkPaidDetailsKid != $usedetl->kid_id) {
                        $notkid_pay = ++$k;
                    }
                } else {
                    $getPaidStatus = $this->Custom->ChcckPaid($usedetl->user_id);
                    if ($getPaidStatus != $usedetl->user_id) {
                        if (@$this->Custom->UserGender($usedetl->user_id) == 1) {
                            $notmen_pay = ++$m;
                        }if (@$this->Custom->UserGender($usedetl->user_id) == 2) {
                            $notwomen_pay = ++$w;
                        }
                    }
                }
            }
        } elseif ($this->Auth->user('type') == 9) {
            $empId = $this->request->session()->read('Auth.User.id');
            $paid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.support_id' => $empId]);
            $men_count = $this->PaymentGetways->find('all')->where(['profile_type' => 1, 'support_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $women_count = $this->PaymentGetways->find('all')->where(['profile_type' => 2, 'support_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $kid_count = $this->PaymentGetways->find('all')->where(['profile_type' => 3, 'support_id' => $empId, 'status' => 1, 'payment_type' => 1])->count();
            $userId = []; //$this->CustomerStylist->find('all')->where(['employee_id' => $empId]);
            $m = 0;
            $w = 0;
            $k = 0;
            $notmen_pay = 0;
            $notwomen_pay = 0;
            $notkid_pay = 0;
            foreach ($userId as $usedetl) {
                if ($usedetl->kid_id != '') {
                    $checkPaidDetailsKid = $this->Custom->ChcckPaidKid($usedetl->kid_id);
                    if ($checkPaidDetailsKid != $usedetl->kid_id) {
                        $notkid_pay = ++$k;
                    }
                } else {
                    $getPaidStatus = $this->Custom->ChcckPaid($usedetl->user_id);
                    if ($getPaidStatus != $usedetl->user_id) {
                        if (@$this->Custom->UserGender($usedetl->user_id) == 1) {
                            $notmen_pay = ++$m;
                        }if (@$this->Custom->UserGender($usedetl->user_id) == 2) {
                            $notwomen_pay = ++$w;
                        }
                    }
                }
            }
        } else {
            $paid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1]);
            $userid = $paid_users->extract('user_id')->toArray();

            $men_count = $women_count = $kid_count = 0;
            foreach ($paid_users as $pd_usr) {
                if (($pd_usr->profile_type == 1) && ($pd_usr->payment_type == 1)) {
                    $men_count += 1;
                }
                if (($pd_usr->profile_type == 2) && ($pd_usr->payment_type == 1)) {
                    $women_count += 1;
                }
                if (($pd_usr->profile_type == 3) && ($pd_usr->payment_type == 1)) {
                    $kid_count += 1;
                }
            }


            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $userDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.type' => 2])->group(['Users.id']);
            $totalkids = $this->KidsDetails->find('all')->count();

            $notmen_pay = 0;
            $notwomen_pay = 0;
            $notkid_pay = 0;

            $total_men = 0;
            $total_women = 0;
            foreach ($userDetails as $ck => $user) {

                if (($user->user_detail->gender == 1)) {
                    $total_men += 1;
                }if (($user->user_detail->gender == 2)) {
                    $total_women += 1;
                }
            }
            $all_paid_user = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1, 'count' => 1, 'kid_id' => 0])->distinct(['user_id']);
            $paid_men = $paid_women = $paid_kid = 0;
            foreach ($all_paid_user as $apu) {
                if ($apu->profile_type == 1) {
                    $paid_men += 1;
                }
                if ($apu->profile_type == 2) {
                    $paid_women += 1;
                }
            }
            $all_paid_kid = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1, 'count' => 1, 'kid_id !=' => 0])->distinct(['kid_id'])->count();

            $notmen_pay = $total_men - $paid_men;
            $notwomen_pay = $total_women - $paid_women;
            $notkid_pay = $totalkids - $all_paid_kid;
        }
        $this->set(compact('paid_users', 'men_count', 'women_count', 'kid_count', 'notmen_pay', 'notwomen_pay', 'notkid_pay'));
    }

    public function profile($param = null)
    {
        $this->loadModel('Sendles');
        $this->loadModel('SmsSettings');
        $user_id = $this->request->session()->read('Auth.User.id');
        $rowname = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
        $getCurPassword = $this->Users->find('all', ['fields' => ['password']])->where(['Users.id' => $user_id])->first();
        $settingsEmailTempletes = $this->Settings->find('all')->where(['Settings.type' => 2])->group('Settings.id');
        $settingsSmsTempletes = $this->SmsSettings->find('all')->group('SmsSettings.id');
        $row = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
        $type = $this->request->session()->read('Auth.User.type');
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pj($data);exit;
            $user = $this->Users->patchEntity($user, $data);
            $user->id = $this->request->session()->read('Auth.User.id');
            if (!empty($data['changepassword']) == 'Change password') {
                $passCheck = $this->Users->check($data['current_password'], $getCurPassword->password);
                if ($passCheck != 1) {
                    $this->Flash->error(__('Current password is incorrect.'));
                    return $this->redirect(['action' => 'profile/changepassword']);
                } elseif ($data['password'] != $data['cpassword']) {
                    $this->Flash->error(__('Password and Confirm password fields do not match'));
                    return $this->redirect(['action' => 'profile/changepassword']);
                } else {
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Password has been chaged successfully.'));
                        return $this->redirect(['action' => 'profile/changepassword']);
                    } else {
                        $this->Flash->error(__('Password could not be change. Please, try again.'));
                        return $this->redirect(['action' => 'profile/changepassword']);
                    }
                }
            } else if (@$data['general'] == 'save') {
                $set = $this->request->data;
                foreach ($set as $kehfhy => $value) {
                    $condition = array('name' => $kehfhy);
                    $this->Settings->updateAll(['value' => $value], ['name' => $kehfhy]);
                }
                $this->Flash->success(__('Communication emaill has been updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/profile/communication');
            } else if (@$data['superradminpassword'] == 'Change Admin password') {
                $this->Settings->updateAll(['value' => @$data['superadmin_password']], ['id' => 50]);
            } else if ($data['paymentmodebtn'] == 'Update') {

                $this->Paymentmode->updateAll(['value' => @$data['paymentmode']], ['id' => 1]);
                $this->Flash->success(__('Payment mode is has been updated successfully.'));
                return $this->redirect(['action' => 'profile/paymentmode']);
            } else if ($data['sendlebtn'] == 'Update') {
                $sendleData = $this->Sendles->find('all')->first();
                if (!empty($sendleData)) {
                    $data['id'] = $sendleData->id;
                }
                $nwRw = $this->Sendles->newEntity();
                $nwRw = $this->Sendles->patchEntity($nwRw, $data);
                $this->Sendles->save($nwRw);

                $this->Flash->success(__('Sendle details is has been updated successfully.'));
                return $this->redirect(['action' => 'profile/sendle']);
            } else {
                if (@$data['name'] == '') {
                    $this->Flash->error(__("Please enter your name"));
                } else if ($data['email'] == '') {
                    $this->Flash->error(__("Please enter your email"));
                } else {
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The Profile has been update.'));
                        return $this->redirect(['action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The Profile could not be update. Please, try again.'));
                    }
                }
            }
        }
        $settings = $this->Settings->find('all', ['order' => 'Settings.id DESC'])
            ->where(['Settings.type' => 1, 'Settings.is_active' => 1]);

        $paymentMode = $this->Paymentmode->find('all')->where(['id' => 1])->first();
        $sendle = $this->Sendles->find('all')->first();
        $shipping_mode = $this->Settings->find('all')->where(['name' => 'shipping_mode'])->first();
        $stamps = $this->Stamps->find('all')->first();
        $this->set(compact('rowname', 'settings', 'settingsEmailTempletes', 'settingsSmsTempletes', 'row', 'user', 'row', 'options', 'param', 'user_id', 'paymentMode', 'sendle', 'shipping_mode', 'stamps'));
    }

    public function viewUsers($payment_id = null)
    {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 3) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id, 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 7) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.inv_id' => $id, 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.inv_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 8) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.qa_id' => $id, 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.qa_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 9) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.support_id' => $id, 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.support_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 1) {
            if ($payment_id) {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $employee_env = $this->Users->find('all')->where(['Users.type' => 7, 'Users.is_active' => 1]);
                $employee_qa = $this->Users->find('all')->where(['Users.type' => 8, 'Users.is_active' => 1]);
                $employee_spt = $this->Users->find('all')->where(['Users.type' => 9, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.id' => $payment_id])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $employee_env = $this->Users->find('all')->where(['Users.type' => 7, 'Users.is_active' => 1]);
                $employee_qa = $this->Users->find('all')->where(['Users.type' => 8, 'Users.is_active' => 1]);
                $employee_spt = $this->Users->find('all')->where(['Users.type' => 9, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1]])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }
            $mass_product_count = array();
            $i = 1;
            foreach ($userdetails as $details) {
                $kidCount[$i] = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => 3, 'PaymentGetways.user_id' => $details->id])->count();
                $mass_product_count[@$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0, 'payment_id' => $details->id])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();

                $i++;
            }
            $staff_assigned_user = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id])->order(['PaymentGetways.created_dt' => 'DESC']);
        }
        foreach ($userdetails as $details) {
            if ($details->kid_id == 0) {
                $getCheckBarcode = $this->UserDetails->find('all')->where(['user_id' => $details->user_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->user_id . '.png';
                        $barcode_value = $getCheckBarcode->user_id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $details->user_id]);
                    }
                }
            } else {
                $getCheckBarcode = $this->KidsDetails->find('all')->where(['id' => $details->kid_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->id . '.png';
                        $barcode_value = $getCheckBarcode->id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->KidsDetails->updateAll(['barcode_image' => $name], ['id' => $details->kid_id]);
                    }
                }
            }
        }

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "email") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users', function ($q) use ($username) {
                    return $q->where(['email LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "order_number") {
                $srch_id = (int) filter_var($_GET['search_data'], FILTER_SANITIZE_NUMBER_INT);
                //                print_r($srch_id);exit;
                $userdetails = $userdetails->where(['PaymentGetways.id LIKE' => $srch_id]);
            }
            if ($_GET['search_for'] == "order_date") {
                $srch_dt = $_GET['search_data'];
                $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
            }
            //            if ($_GET['search_for'] == "kid_name") {
            //                $kidname = trim($_GET['search_data']);
            //                $userdetails = $userdetails->matching('Users.KidsDetails', function ($q) use ($kidname) {
            //                    return $q->where(['kids_first_name LIKE' => "%" . $kidname . "%"]);
            //                });
            //            }
        }


        $new_userdetails = $this->paginate($userdetails);

        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count', 'employee_env', 'employee_qa', 'employee_spt', 'new_userdetails'));
    }
    public function currentPaidList($payment_id = null)
    {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');

        if ($type == 3) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id, 'PaymentGetways.id' => $payment_id, 'PaymentGetways.work_flow_status' => Configure::read('Stylist_Queue')])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_flow_status' => Configure::read('Stylist_Queue'), 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 7) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.inv_id' => $id, 'PaymentGetways.work_flow_status' => Configure::read('Inv_Queue'), 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.inv_id' => $id, 'PaymentGetways.work_flow_status' => Configure::read('Inv_Queue'), 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 8) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.qa_id' => $id, 'PaymentGetways.work_flow_status' => Configure::read('QA_Queue'), 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.qa_id' => $id, 'PaymentGetways.work_flow_status' => Configure::read('QA_Queue'), 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 9) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.support_id' => $id, 'PaymentGetways.work_flow_status IN' => [Configure::read('Support_Tab_Support_Queue')], 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.support_id' => $id, 'PaymentGetways.work_flow_status IN' => [Configure::read('Support_Tab_Support_Queue')], 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 1) {
            if ($payment_id) {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $employee_env = $this->Users->find('all')->where(['Users.type' => 7, 'Users.is_active' => 1]);
                $employee_qa = $this->Users->find('all')->where(['Users.type' => 8, 'Users.is_active' => 1]);
                $employee_spt = $this->Users->find('all')->where(['Users.type' => 9, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.id' => $payment_id ])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $employee_env = $this->Users->find('all')->where(['Users.type' => 7, 'Users.is_active' => 1]);
                $employee_qa = $this->Users->find('all')->where(['Users.type' => 8, 'Users.is_active' => 1]);
                $employee_spt = $this->Users->find('all')->where(['Users.type' => 9, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1]])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }
            
            if(!empty($_GET['work_flow'])){
                $userdetails = $userdetails = $userdetails-> where(['PaymentGetways.work_flow_status' => $_GET['work_flow']]);
            }else{
                $userdetails = $userdetails-> where(['PaymentGetways.work_flow_status IN' => [Configure::read('Onboard_in_Progress'),Configure::read('Stylist_Queue'),Configure::read('Inv_Queue'),Configure::read('QA_Queue'), Configure::read('Support_Tab_Ready_to_Ship_Queue') ]]);
            }
            $mass_product_count = array();
            $i = 1;
            foreach ($userdetails as $details) {
                $kidCount[$i] = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => 3, 'PaymentGetways.user_id' => $details->id])->count();
                $mass_product_count[@$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0, 'payment_id' => $details->id])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();

                $i++;
            }
            $staff_assigned_user = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id])->order(['PaymentGetways.created_dt' => 'DESC']);
        }
        foreach ($userdetails as $details) {
            if ($details->kid_id == 0) {
                $getCheckBarcode = $this->UserDetails->find('all')->where(['user_id' => $details->user_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->user_id . '.png';
                        $barcode_value = $getCheckBarcode->user_id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $details->user_id]);
                    }
                }
            } else {
                $getCheckBarcode = $this->KidsDetails->find('all')->where(['id' => $details->kid_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->id . '.png';
                        $barcode_value = $getCheckBarcode->id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->KidsDetails->updateAll(['barcode_image' => $name], ['id' => $details->kid_id]);
                    }
                }
            }
        }

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "email") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users', function ($q) use ($username) {
                    return $q->where(['email LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "order_number") {
                $srch_id = (int) filter_var($_GET['search_data'], FILTER_SANITIZE_NUMBER_INT);
                //                print_r($srch_id);exit;
                $userdetails = $userdetails->where(['PaymentGetways.id LIKE' => $srch_id]);
            }
            if ($_GET['search_for'] == "order_date") {
                $srch_dt = $_GET['search_data'];
                $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
            }

            //            if ($_GET['search_for'] == "kid_name") {
            //                $kidname = trim($_GET['search_data']);
            //                $userdetails = $userdetails->matching('Users.KidsDetails', function ($q) use ($kidname) {
            //                    return $q->where(['kids_first_name LIKE' => "%" . $kidname . "%"]);
            //                });
            //            }
        }

        if ($_GET['search_for'] == "selected_date") {
            if(!empty($_GET['selected_date'])){
                $srch_dt = $_GET['selected_date'];
                $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
            }
        }/*else{
            if(empty($_GET['selected_date'])){
                $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d') . "%"]);
            }
        }*/

        $new_userdetails = $this->paginate($userdetails);

        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count', 'employee_env', 'employee_qa', 'employee_spt', 'new_userdetails'));
    }

    public function readyToShipList($payment_id = null)
    {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');

        if ($type == 9) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.support_id' => $id, 'PaymentGetways.work_flow_status IN' => Configure::read('Support_Tab_Ready_to_Ship_Queue'), 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.support_id' => $id, 'PaymentGetways.work_flow_status' => Configure::read('Support_Tab_Ready_to_Ship_Queue'), 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        }
        
        if ($type == 1) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where([ 'PaymentGetways.work_flow_status IN' => Configure::read('Support_Tab_Ready_to_Ship_Queue'), 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where([ 'PaymentGetways.work_flow_status' => Configure::read('Support_Tab_Ready_to_Ship_Queue'), 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        }
        foreach ($userdetails as $details) {
            if ($details->kid_id == 0) {
                $getCheckBarcode = $this->UserDetails->find('all')->where(['user_id' => $details->user_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->user_id . '.png';
                        $barcode_value = $getCheckBarcode->user_id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $details->user_id]);
                    }
                }
            } else {
                $getCheckBarcode = $this->KidsDetails->find('all')->where(['id' => $details->kid_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->id . '.png';
                        $barcode_value = $getCheckBarcode->id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->KidsDetails->updateAll(['barcode_image' => $name], ['id' => $details->kid_id]);
                    }
                }
            }
        }

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "email") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users', function ($q) use ($username) {
                    return $q->where(['email LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "order_number") {
                $srch_id = (int) filter_var($_GET['search_data'], FILTER_SANITIZE_NUMBER_INT);
                //                print_r($srch_id);exit;
                $userdetails = $userdetails->where(['PaymentGetways.id LIKE' => $srch_id]);
            }
            if ($_GET['search_for'] == "order_date") {
                $srch_dt = $_GET['search_data'];
                $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
            }

            //            if ($_GET['search_for'] == "kid_name") {
            //                $kidname = trim($_GET['search_data']);
            //                $userdetails = $userdetails->matching('Users.KidsDetails', function ($q) use ($kidname) {
            //                    return $q->where(['kids_first_name LIKE' => "%" . $kidname . "%"]);
            //                });
            //            }
        }

        if ($_GET['search_for'] == "selected_date") {
            $srch_dt = $_GET['selected_date'];
            $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
        }

        $new_userdetails = $this->paginate($userdetails);
        
        $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
        $employee_env = $this->Users->find('all')->where(['Users.type' => 7, 'Users.is_active' => 1]);
        $employee_qa = $this->Users->find('all')->where(['Users.type' => 8, 'Users.is_active' => 1]);
        $employee_spt = $this->Users->find('all')->where(['Users.type' => 9, 'Users.is_active' => 1]);

        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count', 'employee_env', 'employee_qa', 'employee_spt', 'new_userdetails'));
    }

    public function previousworklist($payment_id = null)
    {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        $mass_kid_product_count = array();
        $mass_product_count = array();

        $this->PaymentGetways->belongsTo('sty', ['className' => 'Users', 'foreignKey' => 'emp_id']);
        $this->PaymentGetways->belongsTo('qa', ['className' => 'Users', 'foreignKey' => 'qa_id']);
        $this->PaymentGetways->belongsTo('inv', ['className' => 'Users', 'foreignKey' => 'inv_id']);
        $this->PaymentGetways->belongsTo('sup', ['className' => 'Users', 'foreignKey' => 'support_id']);
        /* if ($type == 3) {
          if ($payment_id) {
          $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
          $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
          } else {
          $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
          $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
          }

          foreach ($userdetails as $details) {
          $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
          $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
          }
          } else */
        if ($type == 7) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'sty', 'qa', 'inv', 'sup'])->where(['PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'sty', 'qa', 'inv', 'sup'])->where(['PaymentGetways.inv_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 8) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'sty', 'qa', 'inv', 'sup'])->where(['PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'sty', 'qa', 'inv', 'sup'])->where(['PaymentGetways.qa_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 9) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.KidsDetails', 'Users.UserDetails', 'sty', 'qa', 'inv', 'sup'])->where(['PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.KidsDetails', 'Users.UserDetails', 'sty', 'qa', 'inv', 'sup'])->where(['PaymentGetways.support_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 1 || $type == 3) {
            if ($payment_id) {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart', 'sty', 'qa', 'inv', 'sup'])->where(['PaymentGetways.id' => $payment_id])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart', 'sty', 'qa', 'inv', 'sup'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }
            $mass_product_count = array();
            $i = 1;
            foreach ($userdetails as $details) {
                $kidCount[$i] = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => 3, 'PaymentGetways.user_id' => $details->user_id])->count();
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();

                $i++;
            }

            $staff_assigned_user = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id])->order(['PaymentGetways.created_dt' => 'DESC']);
        }

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "email") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users', function ($q) use ($username) {
                    return $q->where(['email LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "order_number") {
                $srch_id = (int) filter_var($_GET['search_data'], FILTER_SANITIZE_NUMBER_INT);
                //                print_r($srch_id);exit;
                $userdetails = $userdetails->where(['PaymentGetways.id LIKE' => $srch_id]);
            }
            if ($_GET['search_for'] == "order_date") {
                $srch_dt = $_GET['search_data'];
                $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
            }
            //            if ($_GET['search_for'] == "kid_name") {
            //                $kidname = trim($_GET['search_data']);
            //                $userdetails = $userdetails->matching('Users.KidsDetails', function ($q) use ($kidname) {
            //                    return $q->where(['kids_first_name LIKE' => "%" . $kidname . "%"]);
            //                });
            //            }
        }


        $new_userdetails = $this->paginate($userdetails);

        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'new_userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count'));
    }

    public function kidProfile($payment_id = null) {
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

    public function customerKidProfile($kids_id = null) {
        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.kid_id' => $kids_id, 'default_set' => 1])->first();
        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kid = $this->KidsDetails->find('all')->contain(['Users', 'KidsPersonality', 'KidsSizeFit', 'KidClothingType', 'KidsPrimary', 'KidsPricingShoping', 'KidPurchaseClothing', 'KidStyles'])->where(['KidsDetails.id' => $kids_id])->group(['KidsDetails.id'])->first();
        $KidsSizeFit = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $kids_id])->first();
        $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $kids_id])->first();
        $designe = $this->CustomDesine->find('all')->where(['kid_id' => $kids_id])->first();
        $KidStyles = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $kids_id])->first();
// $kid_barcode = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $userid])->first();
// if ($payment_id) {
//     $name = $payment_id . '.png';
//     $barcode_value = $payment_id;
//     $this->Custom->create_profile_image($name);
//     $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
//     $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
//     list($type, $dataImg) = explode(';', $dataImg);
//     list(, $dataImg) = explode(',', $dataImg);
//     $dataImg = base64_decode($dataImg);
//     file_put_contents(BARCODE_PROFILE . $name, $dataImg);
//     $this->KidsDetails->updateAll(['barcode_image' => $name], ['user_id' => $userid]);
// }
        $this->set(compact('useridDetails', 'kid_barcode', 'kid', 'KidsSizeFit', 'KidClothingType', 'designe', 'KidStyles', 'shipping_address'));
    }

    public function delete($id = null, $table = null) {
        $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
        $data = $this->$table->get($id);
        $dataDelete = $this->$table->delete($data);
        if ($table == 'Users') {
            $this->Flash->success(__('Users has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
        } else {
            $this->Flash->success(__('Data has been deleted successfully.'));
            return $this->redirect($this->referer());
        }
    }

     public function addproduct($paymentId = null, $productId = null) {
        $product = $this->Products->newEntity();
        $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
        @$productTrackingNo = $this->Products->find('all')->where(['Products.keep_status IN' => [0, 1, 2, 3, 99], 'Products.payment_id' => $paymentId])->order(['id' => 'DESC'])->first();
        $userId = $userIdp->user_id;
        if (@$_REQUEST['exchange']) {
            $productCheckOut = 0;
        } else {
            $productCheckOut = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status = ' => 0, 'Products.checkedout IN ' => ['N'],])->count();
        }





        $user_name = $this->Users->find('all')->where(['Users.id' => $userId])->first();
        $user_type = $this->request->session()->read('Auth.User.type');
        if (@$paymentId && @$productId) {
            $productEditDetails = $this->Products->find('all')->where(['Products.id' => @$productId])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pj($data); exit;
            if ($data['save'] == 'Save') {
                $this->Products->updateAll(['order_usps_tracking_no' => $data['order_usps_tracking_no'], 'return_usps_tracking_no' => $data['return_usps_tracking_no']], ['keep_status' => 0, 'payment_id' => @$data['payment_id']]);
                $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => @$data['payment_id']]);
                $this->Flash->success(__('Tracking data updated successfully.'));
                return $this->redirect($this->referer());
            } else {
                if (@$data['id']) {
                    $data['id'] = $data['id'];
                    $editData = $this->Products->find('all')->where(['Products.id' => $data['id']])->first();
                } else {
                    $maxId = $this->Products->find('all')->order(['Products.id' => 'DESC'])->first();
                    $ownId = @$maxId->id + 1;
                    $name = $ownId . '.png';
                    $barcode_value = $data['payment_id'] . $ownId;
                    $this->Custom->create_image($name);
                    $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                    $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                    list($type, $dataImg) = explode(';', $dataImg);
                    list(, $dataImg) = explode(',', $dataImg);
                    $dataImg = base64_decode($dataImg);
                    file_put_contents(BARCODE . $name, $dataImg);

                    $data['barcode_image'] = $name;
                    $data['barcode_value'] = $barcode_value;
                    $data['user_id'] = @$data['user_id'];
                    $data['payment_id'] = @$paymentId;
                    @$data['id'] = '';
                }
                if (@$data['dataexchange']) {
                    $exchangeId = $data['dataexchange'];
                    $exchangeData = $this->Products->find('all')->where(['Products.id' => $exchangeId])->first();
                    if ($exchangeData) {
                        $this->Products->updateAll(['is_altnative_product' => 1, 'is_complete' => 1, 'checkedout' => 'Y'], ['id' => $exchangeId]);
                        $cenvertedTime = date('Y-m-d H:i:s', strtotime('+3 seconds', strtotime($exchangeData->created)));
                        $data['created'] = $cenvertedTime;
                        $data['is_altnative_product'] = 0;
                        $data['is_exchange_pending'] = 1;
                    }
                } else {
                    $data['created'] = date('Y-m-d H:i:s');
                }
                $data['product_purchase_date'] = date('Y-m-d', strtotime(@$data['product_purchase_date']));
                $data['product_valid_return_date'] = date('Y-m-d', strtotime(@$data['product_valid_return_date']));
                if (!empty($data['image']['tmp_name'])) {
                    if ($data['image']['size'] <= 21000) {
                        $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], PRODUCT_IMAGES, 400);
                        $data['product_image'] = PRODUCT_IMAGES . $imageName;
                    } else {
                        $this->Flash->error(__('Image size should be 8  to 20 kb'));
                    }
                } else {
                    $data['product_image'] = @$editData->product_image;
                }
                if (!empty($data['product']['tmp_name'])) {
                    if ($data['product']['size'] <= 21000) {
                        $imageName1 = $this->Custom->uploadImageBanner($data['product']['tmp_name'], $data['product']['name'], PRODUCT_RECEIPT, 400);
                    } else {
                        $this->Flash->error(__('Image size should be 8  to 20 kb'));
                    }
                    $data['product_receipt'] = $imageName1;
                } else {
                    $data['product_receipt'] = @$editData->product_receipt;
                }
                $product = $this->Products->patchEntity($product, $data);
                $this->Products->save($product);
                $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => $paymentId]);
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId . '/' . $data['id']);
                } else {
                    $this->Flash->success(__('Data has been added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId);
                }
            }
        }
        $productcount = $this->Products->find('all')->where(['Products.user_id' => $userId, 'Products.kid_id =' => 0])->count();
        if ($userId) {
            $this->Products->belongsTo('old_product', ['className' => 'Products', 'foreignKey' => 'exchange_product_id']);
            $productdetails = $this->Products->find('all')->contain(['old_product'])->where(['Products.user_id' => $userId, 'Products.payment_id' => $paymentId, 'Products.kid_id =' => 0])->order(['Products.created' => 'DESC']);
        }
        ############
        $CurrentProductdList = $this->Products->find('all')->where(['is_finalize' => 0, 'is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->order(['created' => 'DESC']);

        $finalizeProductCount = $this->Products->find('all')->where(['is_finalize' => 0, 'is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->count();
        $prductPrice = 0;
        foreach ($CurrentProductdList as $pl) {
            $prductPrice += $pl->sell_price;
        }

        $exchangeproductlist = $this->Products->find('all')->where(['is_complete' => 1, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->order(['created' => 'DESC']);
        $exchangeproductCount = $this->Products->find('all')->where(['is_complete' => 1, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->count();
        $exprice = 0;
        foreach ($exchangeproductlist as $exp) {
            $exprice += $exp->sell_price;
        }



        $shipping_mode = $this->Settings->find('all')->where(['name' => 'shipping_mode'])->first();
        $this->set(compact('shipping_mode', 'exprice', 'exchangeproductCount', 'finalizeProductCount', 'prductPrice', 'userIdp', 'productTrackingNo', 'productCheckOut', 'user_type', 'userId', 'productId', 'productdetails', 'productEditDetails', 'productcount', 'user_name', 'paymentId'));
    }

    public function viewproductlist($paymentId = null, $productId = null) {
        $product = $this->Products->newEntity();
        $userId = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first()->user_id;
        $user_name = $this->Users->find('all')->where(['Users.id' => $userId])->first();
        $user_type = $this->request->session()->read('Auth.User.type');
        if (@$userId && @$productId) {
            $productEditDetails = $this->Products->find('all')->where(['Products.id' => @$productId])->first();
        }

        $productcount = $this->Products->find('all')->where(['Products.user_id' => $userId, 'Products.kid_id =' => 0])->count();
        if ($userId) {
            $getPaymentDetail = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $userId, 'emp_id' => $this->Auth->user('id')])->first();
            $productdetails = $this->Products->find('all')->where(['Products.user_id' => $userId, 'Products.payment_id' => $paymentId, 'Products.kid_id =' => 0])->order(['Products.created' => 'DESC']);
        }
        $this->set(compact('user_type', 'userId', 'productId', 'productdetails', 'productEditDetails', 'getPaymentDetail', 'productcount', 'user_name', 'paymentId'));
    }

    public function welcomeCms() {
        $this->viewBuilder()->layout('admin');
        $welcomeCms = $this->WelcomeCms->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $welcomeCms->id = 1;
            $welcomeCms = $this->WelcomeCms->patchEntity($welcomeCms, $data);
            $this->WelcomeCms->save($welcomeCms);
            $this->Flash->success(__('Data has been update successfully.'));
        }
        $data = $this->WelcomeCms->find('all')->where(['WelcomeCms.id' => 1])->first();
        $this->set(compact('welcomeCms', 'data'));
    }

    public function featuredOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->FeatureEvents->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function customerTestimonials($id = null) {
        $dataEntity = $this->Testimonials->newEntity();
        if ($id) {
            $dataEdit = $this->Testimonials->find('all')->where(['Testimonials.id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Testimonials->patchEntity($dataEntity, $data);
            $dataEntity->image = '0';
            $dataEntity->is_active = 1;
            $this->Testimonials->save($dataEntity);
            if ($data['id']) {
                $this->Flash->success(__('Data has been update successfully.'));
            } else {
                $this->Flash->success(__('Data has been add successfully.'));
            }
            return $this->redirect(HTTP_ROOT . 'appadmins/customer_testimonials');
        }
        $dataListings = $this->Testimonials->find('all')->order(['Testimonials.sort_order']);
        $this->set(compact('id', 'dataEdit', 'dataEntity', 'dataListings'));
    }

    public function customerOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->Testimonials->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function socialMedia($id = null) {
        $dataEntity = $this->SocialMedia->newEntity();
        if (@$id) {
            $dataEdit = $this->SocialMedia->find('all')->where(['SocialMedia.id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->SocialMedia->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->SocialMedia->save($dataEntity);
            $this->Flash->success(__('Data has been add successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/social_media');
        }
        $dataListings = $this->SocialMedia->find('all')->order(['SocialMedia.sort_order']);
        $this->set(compact('dataEdit', 'id', 'dataEntity', 'dataListings'));
    }

    public function socialmediaOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->SocialMedia->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function footerCms($id = null) {
        if ($id) {
            $row = $this->FooterSettings->find('all')->where(['FooterSettings.id' => $id])->first();
        }
        $dataEntity = $this->FooterSettings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->FooterSettings->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->FooterSettings->save($dataEntity);
            $this->Flash->success(__('Data has been add successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/footer_cms');
        }
        $dataListings = $this->FooterSettings->find('all')->order(['FooterSettings.id']);
        $this->set(compact('row', 'id', 'dataEntity', 'dataListings'));
    }

    public function metaTitle($id = null) {
        if ($id) {
            $row = $this->Pages->find('all')->where(['Pages.id' => $id])->first();
        }
        $dataEntity = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Pages->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->Pages->save($dataEntity);
            $this->Flash->success(__('Meta data  has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/meta_title');
        }
        $dataListings = $this->Pages->find('all')->order(['Pages.id' => 'ASC']);
        $this->set(compact('dataListings', 'id', 'row', 'dataEntity'));
    }

    public function cmsPage() {
        $dataListings = $this->Pages->find('all')->order(['Pages.id' => 'DESC']);
        $this->set(compact('dataListings'));
    }

    public function editpages($id = null) {
        if ($id) {
            $row = $this->Pages->find('all')->where(['Pages.id' => $id])->first();
        }
        $dataEntity = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Pages->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $dataEntity->modified = date('Y-m-d H:i:s');
            $this->Pages->save($dataEntity);
            $this->Flash->success(__('User data has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/editpages/' . $data['id']);
        }
        $this->set(compact('id', 'row'));
    }

    public function editMailTempletes($id = null) {
        $this->viewBuilder()->layout('admin');
        $row = $this->Settings->find('all')->where(['Settings.id' => $id])->first();
        $dataEntity = $this->Settings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Settings->patchEntity($dataEntity, $data);
            $this->Settings->save($dataEntity);
            $this->Flash->success(__('Email templet has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/profile/emailTemplete');
        }
        $this->set(compact('id', 'row'));
    }
    
    public function editSmsTempletes($id = null)
    {
        $this->loadModel('SmsSettings');
        $this->viewBuilder()->layout('admin');
        $row = $this->SmsSettings->find('all')->where(['SmsSettings.id' => $id])->first();
        $dataEntity = $this->SmsSettings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->SmsSettings->patchEntity($dataEntity, $data);
            $this->SmsSettings->save($dataEntity);
            $this->Flash->success(__('Sms templet has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/profile/smsTemplete');
        }
        $this->set(compact('id', 'row'));
    }

    public function createAdmin($id = null) {
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
                return $this->redirect(HTTP_ROOT . 'appadmins/create_admin/');
            }
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_admin/');
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
                        return $this->redirect(HTTP_ROOT . 'appadmins/create_admin/' . $id);
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
                        return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
                    }
                }
            }
        }
        $this->set(compact('admin', 'id', 'editAdmin'));
    }

    public function viewAdmin() {
        $adminLists = $this->Users->find('all')->order(['Users.id' => 'DESC'])->where(['Users.type IN' => [3, 7, 8, 9]]);
        $this->set(compact('adminLists'));
    }

    public function employeeAssigned() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['emp_id']) {
                if ($data['type'] == "inventory") {
                    $this->PaymentGetways->updateAll(['inv_id' => $data['emp_id'], 'work_status' => 1], ['id' => $data['id']]);
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'InventoryEmployeeAssigned'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $message = $this->Custom->EmployeeAssignedFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                }
                if ($data['type'] == "qa") {
                    $this->PaymentGetways->updateAll(['qa_id' => $data['emp_id'], 'work_status' => 1], ['id' => $data['id']]);
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'QaEmployeeAssigned'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $message = $this->Custom->EmployeeAssignedFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                }
                if ($data['type'] == "support") {
                    $this->PaymentGetways->updateAll(['support_id' => $data['emp_id'], 'work_status' => 1], ['id' => $data['id']]);
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SupportEmployeeAssigned'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $message = $this->Custom->EmployeeAssignedFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                }
                if ($data['type'] == "stylist") {
                    $this->PaymentGetways->updateAll(['emp_id' => $data['emp_id'], 'work_status' => 1], ['id' => $data['id']]);
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'EmployeeAssigned'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $message = $this->Custom->EmployeeAssignedFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);

                    $user_emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'Stylist_Assigned'])->first();
                    $subject = str_replace("[S_NAME]", $employee->name, $user_emailMessage->display);
                    $user_message = $this->Custom->EmployeeAssignedUserMailFormat($user_emailMessage->value, $getUserDetails->name, $employee->name, $employee->about, $sitename);
                    $this->Custom->sendEmail($getUserDetails->email, $from, $subject, $user_message, $kid_id);
                    $this->Custom->sendEmail($toSupport, $from, $subject, $user_message, $kid_id);
                }
                echo " Employee Assigned successfully";
            } else {
                $this->PaymentGetways->updateAll(['emp_id' => '', 'work_status' => 0], ['id' => $data['id']]);
                echo " Employee Not Assigned";
            }
        }
        exit;
    }

    public function employeeAssignedKid() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['emp_id']) {

                if ($data['type'] == "inventory") {
                    $this->PaymentGetways->updateAll(['profile_type' => 3, 'inv_id' => $data['emp_id'], 'work_status' => 1], ['id' => $data['id']]);
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'InventoryEmployeeAssignedKid'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $kid_id = $getUserId->kid_id;
                    $kidname = $this->Custom->kidName($kid_id);
                    $message = $this->Custom->EmployeeAssignedKidFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename, $kidname);

                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                }
                if ($data['type'] == "qa") {
                    $this->PaymentGetways->updateAll(['profile_type' => 3, 'qa_id' => $data['emp_id'], 'work_status' => 1], ['id' => $data['id']]);
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'QaEmployeeAssignedKid'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $kid_id = $getUserId->kid_id;
                    $kidname = $this->Custom->kidName($kid_id);
                    $message = $this->Custom->EmployeeAssignedKidFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename, $kidname);

                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                }
                if ($data['type'] == "support") {
                    $this->PaymentGetways->updateAll(['profile_type' => 3, 'support_id' => $data['emp_id'], 'work_status' => 1], ['id' => $data['id']]);
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SupportEmployeeAssignedKid'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $kid_id = $getUserId->kid_id;
                    $kidname = $this->Custom->kidName($kid_id);
                    $message = $this->Custom->EmployeeAssignedKidFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename, $kidname);

                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                }

                if ($data['type'] == "stylist") {
                    $this->PaymentGetways->updateAll(['profile_type' => 3, 'emp_id' => $data['emp_id'], 'work_status' => '1'], ['id' => $data['id']]);
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'EmployeeAssignedKid'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $kid_id = $getUserId->kid_id;
                    $kidname = $this->Custom->kidName($kid_id);
                    $message = $this->Custom->EmployeeAssignedKidFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename, $kidname);

                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);

                    $user_emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'Stylist_Assigned'])->first();
                    $subject = str_replace("[S_NAME]", $employee->name, $user_emailMessage->display);
                    $user_message = $this->Custom->EmployeeAssignedUserMailFormat($user_emailMessage->value, $getUserDetails->name, $employee->name, $employee->about, $sitename);
                    $this->Custom->sendEmail($getUserDetails->email, $from, $subject, $user_message, $kid_id);
                    $this->Custom->sendEmail($toSupport, $from, $subject, $user_message, $kid_id);
                }
                echo " Employee Assigned successfully";
            } else {
                $this->PaymentGetways->updateAll(['emp_id' => '', 'work_status' => 0], ['id' => $data['id']]);
                echo " Employee Not Assigned";
            }
        }
        exit;
    }

    public function employeeAssignedUser() {
        $userstyleData = $this->CustomerStylist->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $customerEmail = $this->CustomerStylist->find('all')->where(['user_id' => @$data['uid'], 'kid_id' => 0])->count();
            if ($customerEmail >= 1) {
                $this->CustomerStylist->query()->update()->set(['employee_id' => $data['emp_id']])->where(['user_id' => $data['uid'], 'kid_id' => 0])->execute();
                echo " Employee Assigned successfully";
            } else {
                $userstyleData = $this->CustomerStylist->patchEntity($userstyleData, $data);
                $userstyleData->employee_id = $data['emp_id'];
                $userstyleData->user_id = $data['uid'];
                $userstyleData->created = date("Y-m-d H:i:s");
                $userstyleData->kid_id = 0;
                if ($this->CustomerStylist->save($userstyleData)) {
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $data['uid']])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'EmployeeAssigned'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $clientTo = $getUserDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $message = $this->Custom->EmployeeAssignedFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename);
                    $kid_id = 0;
//                    $this->Custom->sendEmail($clientTo, $from, $subject, $message, $kid_id);
                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);

                    $user_emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'Stylist_Assigned'])->first();
                    $subject = str_replace("[S_NAME]", $employee->name, $user_emailMessage->display);
                    $user_message = $this->Custom->EmployeeAssignedUserMailFormat($user_emailMessage->value, $getUserDetails->name, $employee->name, $employee->about, $sitename);
                    $this->Custom->sendEmail($getUserDetails->email, $from, $subject, $user_message, $kid_id);
                    $this->Custom->sendEmail($toSupport, $from, $subject, $user_message, $kid_id);

                    echo " Employee Assigned successfully";
                }
            }
        }
        exit;
    }

    public function employeeAssignedUserKid() {

        $userstyleData = $this->CustomerStylist->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $customerEmail = $this->CustomerStylist->find('all')->where(['kid_id' => @$data['kid']])->count();
            if ($customerEmail >= 1) {
                $this->CustomerStylist->query()->update()->set(['employee_id' => $data['emp_id']])->where(['kid_id' => $data['kid']])->execute();
                echo " Employee Assigned successfully";
            } else {
                $userstyleData = $this->CustomerStylist->patchEntity($userstyleData, $data);
                $userstyleData->employee_id = $data['emp_id'];
                $userstyleData->user_id = $data['uid'];
                $userstyleData->kid_id = $data['kid'];
                $userstyleData->created = date("Y-m-d H:i:s");
                if ($this->CustomerStylist->save($userstyleData)) {
                    $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                    $getUserDetails = $this->Users->find('all')->where(['Users.id' => $data['uid']])->first();
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'EmployeeAssigned'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $employee->email;
                    $clientTo = $getUserDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $kid_id = $data['kid'];
                    $kidname = $this->Custom->kidName($kid_id);
                    $message = $this->Custom->EmployeeAssignedFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename);
//                    $this->Custom->sendEmail($clientTo, $from, $subject, $message);
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);

                    $user_emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'Stylist_Assigned'])->first();
                    $subject = str_replace("[S_NAME]", $employee->name, $user_emailMessage->display);
                    $user_message = $this->Custom->EmployeeAssignedUserMailFormat($user_emailMessage->value, $getUserDetails->name, $employee->name, $employee->about, $sitename);
                    $this->Custom->sendEmail($getUserDetails->email, $from, $subject, $user_message, $kid_id);
                    $this->Custom->sendEmail($toSupport, $from, $subject, $user_message, $kid_id);

                    echo " Employee Assigned successfully";
                }
            }
        }
        exit;
    }

    public function review($payent_id = null) {
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
                    return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
                }
            }
        }
        $this->set(compact('passwordData', 'setPassword'));
    }

    public function iconDelete($id = null) {
        $this->viewBuilder()->layout('admins');
        if ($id) {
            $list = $this->SocialMedia->find('all', ['Fields' => ['image']])->where(['SocialMedia.id' => $id])->first();
            unlink(SOCIAL_ICON . $list->image);
            $this->SocialMedia->updateAll(array('image' => ''), array('id' => $id));
            return $this->redirect(HTTP_ROOT . 'appadmins/social_media/' . $id . '/SocialMedia');
        }
    }

    public function paymentGateways() {
        
    }

    public function deactive($id = null, $table = null) {
        if ($table == 'Events') {
            $active_column = 'status';
        } else {
            $active_column = 'is_active';
        }

        if ($this->$table->query()->update()->set([$active_column => 0])->where(['id' => $id])->execute()) {
            if ($table == 'Events') {
                $this->$table->query()->update()->set(['is_featured' => 0])->where(['id' => $id])->execute();
                $this->Flash->success(__('Events is deactivated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'Banners') {
                $this->Flash->success(__('Banner has been deactivated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'FeatureEvents') {
                $this->Flash->success(__('Featured events Banner has been deactivated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'Testimonials') {
                $this->Flash->success(__('Testimonials has been deactivated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'SocialMedia') {
                $this->Flash->success(__('Social data has been deactivated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'Albums') {
                $this->Flash->success(__('Album has been deactivated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'Users') {
                $this->Flash->success(__('User has been deactivated.'));
                return $this->redirect($this->referer());
            }else{
                $this->Flash->success(__('Deactivated.'));
                return $this->redirect($this->referer());
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
            if ($table == 'Events') {
                $this->Flash->success(__('Events is has been activated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'FeatureEvents') {
                $this->Flash->success(__('Featured Event Banner has been activated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'Banners') {
                $this->Flash->success(__('Banner has been activated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'Testimonials') {
                $this->Flash->success(__('Testimonials has been activated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'SocialMedia') {
                $this->Flash->success(__('Social data has been activated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'Albums') {
                $this->Flash->success(__('Album has been activated.'));
                return $this->redirect($this->referer());
            } else if ($table == 'Users') {
                $this->Flash->success(__('User has been activated.'));
                return $this->redirect($this->referer());
            }else{
                $this->Flash->success(__('Activated.'));
                return $this->redirect($this->referer());
            }
        }
    }

    public function stylePrints($id = null) {
        $this->viewBuilder()->layout('');
        $userdetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $id])->first();
        $MenStats = $this->MenStats->find('all')->where(['MenStats.user_id' => $id])->first();
        $TypicallyWearMen = $this->TypicallyWearMen->find('all')->where(['TypicallyWearMen.user_id' => $id])->first();
        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $id, 'ShippingAddress.kid_id' => 0, 'default_set' => 1])->first();
        $MenFit = $this->MenFit->find('all')->where(['MenFit.user_id' => $id])->first();
        $menDesigne = $this->CustomDesine->find('all')->where(['user_id' => $id])->first();
        $menSccessories = $this->MenAccessories->find('all')->where(['user_id' => $id])->first();
        $style_sphere_selections = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $id])->first();
        $MenStyle = $this->MenStyle->find('all')->where(['MenStyle.user_id' => $id])->first();
        $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $id]);
        $menbrand = $MensBrands->extract('mens_brands')->toArray();
        $style_sphere_selections_v2 = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $id]);
        $style_sphere = $style_sphere_selections_v2->extract('style_sphere_selections_v2')->toArray();
        $this->set(compact('MenFit', 'shipping_address', 'style_sphere_selections', 'menSccessories', 'menDesigne', 'MenStats', 'TypicallyWearMen', 'MenStyle', 'style_sphere', 'menbrand', 'userdetails'));
    }

    public function womenPrint($id = null) {
        $this->viewBuilder()->layout('');
        $userdetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $id])->first();
        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $id, 'default_set' => 1])->first();

//women code

        $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $id])->first();
        $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $id])->first();
        $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $id])->first();

        $WomenJeansStyle1 = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $id]);
        $WomenJeansStyle = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $id])->first();
//                pj($WomenJeansStyle);exit;
        $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $id]);
        $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();

        $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $id]);
        $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
        $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $id])->first();
//                pj($Womenstyle);exit;
// $WomenRatherDownplay = $this->WomenRatherDownplay->find('all')->where(['WomenRatherDownplay.user_id' => $this->Auth->user('id')])->first();

        $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $id])->first();
        $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $id])->first();
        $primaryinfo = explode(",", $Womeninfo->primary_objectives);
//                pj($primaryinfo);exit;

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

        $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $id])->first();
        $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $id])->first();
        $wemenDesigne = $this->CustomDesine->find('all')->where(['user_id' => $id])->first();
        $womenHeelHightPrefer = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $id])->first();
        $women_shoe_prefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $id])->first();
        $style_sphere_selectionsWemen = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $id])->first();
        $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $id]);
        $menbrand = $MensBrands->extract('mens_brands')->toArray();
//women code
        $this->set(compact('shipping_address', 'userdetails', 'MenStats', 'TypicallyWearMen', 'MenFit', 'MenStyle', 'menbrand', 'style_sphere', 'id', 'primaryinfo', 'Womeninfo', 'style_wardrobe', 'avoid_fabrics', 'avoid_prints', 'avoid_colors', 'womens_brands_plus_low_tier', 'WomenJeansStyle', 'Womenprice', 'Womenstyle', 'WomenRatherDownplay', 'WomenJeansLength', 'WomenJeansRise', 'FitCut', 'SizeChart', 'PersonalizedFix', 'Womeninfo', 'Womenprice', 'wemenDesigne', 'womenHeelHightPrefer', 'women_shoe_prefer', 'style_sphere_selectionsWemen', 'menbrand'));
    }

    public function kidPrint($kidid = null) {
        $this->viewBuilder()->layout('');
        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kid = $this->KidsDetails->find('all')->contain(['Users', 'KidsPersonality', 'KidsSizeFit', 'KidClothingType', 'KidsPrimary', 'KidsPricingShoping', 'KidPurchaseClothing', 'KidStyles'])->where(['KidsDetails.id' => $kidid])->group(['KidsDetails.id'])->first();
        $userid = $kid->user_id;
        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'ShippingAddress.kid_id' => $kidid, 'default_set' => 1])->first();
        $KidsSizeFit = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $kidid])->first();
        $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $kidid])->first();
        $designe = $this->CustomDesine->find('all')->where(['kid_id' => $kidid])->first();
        $KidStyles = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $kidid])->first();
        $this->set(compact('useridDetails', 'kid_barcode', 'kid', 'KidsSizeFit', 'KidClothingType', 'designe', 'shipping_address', 'KidStyles'));
    }

    public function addKidproduct($kid = null) {
        $product = $this->Products->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            $maxId = $this->Products->find('all')->order(['Products.id' => 'DESC'])->first();
            $ownId = $maxId->id + 1;
            $name = $ownId . '.png';
            $barcode_value = $data['payment_id'] . $ownId;
            $this->Custom->create_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE . $name, $dataImg);

            $product->barcode_image = $name;
            $product->barcode_value = $barcode_value;
            $product->user_id = $data['user_id'];
            $product->kid_id = $data['kid_id'];
            $product->payment_id = $data['payment_id'];
            $product->is_retrun = 1;
            if (!empty($data['image']['tmp_name'])) {
                if ($data['image']['size'] <= 15000) {
                    $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], PRODUCT_IMAGES, 400);
                    $product->product_image = PRODUCT_IMAGES . $imageName;
                } else {
                    $this->Flash->erorr(__('Image should be 8 to 10kb'));
                }
            }
//product receipt
            if (!empty($data['product']['tmp_name'])) {
                if ($data['product']['size'] <= 15000) {
                    $imageName = $this->Custom->uploadImageBanner($data['product']['tmp_name'], $data['product']['name'], PRODUCT_RECEIPT, 400);
                    $product->product_receipt = $imageName;
                } else {
                    $this->Flash->erorr(__('Image should be 8 to 10kb'));
                }
            }

            $product = $this->Products->patchEntity($product, $data);
            $this->Products->save($product);
            $this->Flash->success(__('Data has been added successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $data['user_id']);
        }

        if ($kid) {
            $getKidDetail = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $kid])->first();
            $getPaymentDetail = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $getKidDetail->payment_id])->first();
        } else {


            return $this->redirect(HTTP_ROOT . 'appadmins/view_users/');
        }
        $this->Products->belongsTo('old_product', ['className' => 'Products', 'foreignKey' => 'exchange_product_id']);
        $productdetails = $this->Products->find('all')->contain(['old_product'])->where(['Products.payment_id' => $kid]);
//        pj($productdetails);echo $kid;exit;

        $this->set(compact('getKidDetail', 'kid', 'getPaymentDetail', 'productdetails'));
    }

    public function editKidproduct($kid = null) {

        $product = $this->Products->find('all')->where(['Products.id' => $kid])->first();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $editData = $this->Products->find('all')->where(['Products.id' => $data['pid']])->first();

            $product->id = $data['pid'];
            if (!empty($data['image']['tmp_name'])) {
                if ($data['image']['size'] <= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], PRODUCT_IMAGES, 400);
                    $product->product_image = $imageName;
                } else {
                    $this->Flash->error(__('Image should be 8 to 10 kb'));
                }
            } else {
                $product->product_image = $editData->product_image;
            }
//product receipt
            if (!empty($data['product']['tmp_name'])) {
                if ($data['product']['size'] <= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['product']['tmp_name'], $data['product']['name'], PRODUCT_RECEIPT, 400);
                    $product->product_receipt = $imageName;
                } else {
                    $this->Flash->error(__('Image should be 8 to 10 kb'));
                }
            } else {
                $product->product_receipt = $editData->product_receipt;
            }
            $product = $this->Products->patchEntity($product, $data);
            $this->Products->save($product);
            $this->Flash->success(__('Data has been Updated successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $editData->user_id);
        }
        $this->set(compact('product'));
    }

    public function kidProductimagedelete($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_image']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_image);
            $this->Products->updateAll(array('product_image' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/edit-kidproduct/' . $productid);
        }
    }

    public function kidProductreceiptdelete($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_receipt']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_receipt);
            $this->Products->updateAll(array('product_receipt' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/edit-kidproduct/' . $productid);
        }
    }

    public function productimagedelete($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_image']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_image);
            $this->Products->updateAll(array('product_image' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $list->payment_id . '/' . $list->id);
        }
    }

    public function productimagedeletescan($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_image']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_image);
            $this->Products->updateAll(array('product_image' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/scan_product/' . $list->id);
        }
    }

    public function productreceiptdelete($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_receipt']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_receipt);
            $this->Products->updateAll(array('product_receipt' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $list->payment_id . '/' . $list->id);
        }
    }

    public function productreceiptdeletescan($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_receipt']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_receipt);
            $this->Products->updateAll(array('product_receipt' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/scan_product/' . $list->id);
        }
    }

    public function barcodePrints($id = null) {
        $this->viewBuilder()->layout('');
        $product = $this->Products->find('all')->where(['Products.id' => $id])->first();
        $user = $this->Users->find('all')->where(['Users.id' => $product->user_id])->first();
//        pj($user);
        $this->set(compact('product', 'user'));
    }

    public function viewproduct($id = null) {
        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $productData = $this->Products->find('all')->contain(['KidsDetails', 'Users'])->where(['Products.id' => $id])->first();
        $customer_review_Data = $this->CustomerProductReview->find('all')->where(['CustomerProductReview.payment_id' => $productData->payment_id])->first();
        $customer_review_Data_count = $this->CustomerProductReview->find('all')->where(['CustomerProductReview.payment_id' => $productData->payment_id])->count();
        $this->set(compact('productData', 'customer_review_Data', 'customer_review_Data_count'));
    }

    public function kidProductImgDelete($id = null) {

        if ($id) {
            $product = $this->Products->find('all')->where(['Products.id' => $id])->first();
            unlink(PRODUCT_IMAGES . $product->product_image);
            $this->Products->updateAll(array('product_image' => ''), array('id' => $id));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkid-profile/' . $product->payment_id . '/' . $product->kid_id . '/' . $id);
        }
    }

    public function kidProductReciveDelete($id = null) {

        if ($id) {
            $product = $this->Products->find('all')->where(['Products.id' => $id])->first();
            unlink(PRODUCT_RECEIPT . $product->product_receipt);
            $this->Products->updateAll(array('product_receipt' => ''), array('id' => $id));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkid-profile/' . $product->payment_id . '/' . $product->kid_id . '/' . $id);
        }
    }

   public function addkidProfile($paymentId = null, $kidId = null, $productId = null) {
        $userDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $paymentId])->first();
        $userId = $userDetails->user_id;
        $user_type = $this->request->session()->read('Auth.User.type');
        if (@$_REQUEST['exchange']) {
            $productCheckOut = 0;
        } else {
            $productCheckOut = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status = ' => 0, 'Products.checkedout IN ' => ['N'],])->count();
        }

        @$productTrackingNo = $this->Products->find('all')->where(['Products.keep_status IN' => [0, 1, 2, 3, 99], 'Products.payment_id' => $paymentId])->order(['id' => 'desc'])->first();
        if (@$paymentId && @$productId && @$kidId) {
            $productData = $this->Products->find('all')->where(['Products.id' => $productId])->first();
        }

        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kidDetail = $this->KidsDetails->find('all')->contain(['Users'])->where(['KidsDetails.id' => $userDetails->kid_id])->group(['KidsDetails.id'])->first();

        $this->Products->belongsTo('old_product', ['className' => 'Products', 'foreignKey' => 'exchange_product_id']);
        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $kid_product = $this->Products->find('all')->contain(['old_product'])->where(['Products.payment_id' => $paymentId])->order(['Products.created' => 'ASC']);
        $employee = $this->Users->find('all')->where(['Users.type' => 3]);
        if ($this->request->is('post')) {
            $product = $this->Products->newEntity();
            $data = $this->request->data;
//pj($data); exit;
            if ($data['save'] == 'Save') {
                $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => @$data['payment_id']]);
                $this->Products->updateAll(['order_usps_tracking_no' => $data['order_usps_tracking_no'], 'return_usps_tracking_no' => $data['return_usps_tracking_no']], ['keep_status = ' => 0, 'payment_id' => @$data['payment_id']]);
                $this->Flash->success(__('Tracking data updated successfully.'));
                return $this->redirect($this->referer());
            } else {
                $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['payment_id']])->first();
                if (@$data['id']) {
                    $data['id'] = $data['id'];
                } else {
                    $maxId = $this->Products->find('all')->order(['Products.id' => 'DESC'])->first();
                    $ownId = @$maxId->id + 1;
                    $name = $ownId . '.png';
                    $barcode_value = $data['payment_id'] . $ownId;
                    $this->Custom->create_image($name);
                    $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                    $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                    list($type, $dataImg) = explode(';', $dataImg);
                    list(, $dataImg) = explode(',', $dataImg);
                    $dataImg = base64_decode($dataImg);
                    file_put_contents(BARCODE . $name, $dataImg);

                    $data['barcode_image'] = $name;
                    $data['barcode_value'] = $barcode_value;
                    $data['user_id'] = $paymentDetails->user_id;
                    $data['kid_id'] = $paymentDetails->kid_id;
                    $data['payment_id'] = $data['payment_id'];
                    $data['is_retrun'] = 1;
                    $data['id'] = '';

                    if (@$data['dataexchange']) {
                        $exchangeId = $data['dataexchange'];
                        $exchangeData = $this->Products->find('all')->where(['Products.id' => $exchangeId])->first();
                        if ($exchangeData) {
                            $this->Products->updateAll(['is_altnative_product' => 1, 'is_complete' => '1'], ['id' => $exchangeId]);
                            $cenvertedTime = date('Y-m-d H:i:s', strtotime('+10 seconds', strtotime($exchangeData->created)));
                            $data['created'] = $cenvertedTime;
                            $data['is_altnative_product'] = 0;
                            $data['is_exchange_pending'] = 1;
                        }
                    } else {
                        $data['created'] = date('Y-m-d H:i:s');
                    }
                }


                $data['product_purchase_date'] = date('Y-m-d', strtotime($data['product_purchase_date']));
                $data['product_valid_return_date'] = date('Y-m-d', strtotime($data['product_valid_return_date']));
//            $data['customer_purchasedate'] = date('Y-m-d', strtotime($data['customer_purchasedate']));


                if (!empty($data['image']['tmp_name'])) {


                    if ($data['image']['size'] <= 21000) {
                        $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], PRODUCT_IMAGES, 400);
                        $data['product_image'] = $imageName;
                    } else {
                        $this->Flash->error(__('Image should be 8 to 20 kb'));
                    }
                }
//product receipt
                if (!empty($data['product']['tmp_name'])) {
                    if ($data['product']['size'] <= 21000) {
                        $imageName = $this->Custom->uploadImageBanner($data['product']['tmp_name'], $data['product']['name'], PRODUCT_RECEIPT, 400);
                        $data['product_receipt'] = $imageName;
                    } else {
                        $this->Flash->error(__('Image should be 8 to 20 kb'));
                    }
                }

                $product = $this->Products->patchEntity($product, $data);
                $this->Products->save($product);
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $data['payment_id'] . '/' . $paymentDetails->kid_id . '/' . $data['id']);
                } else {
                    $this->Flash->success(__('Data has been added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $data['payment_id'] . '/' . $data['kid_id']);
                }
            }
        }
        ############
        $CurrentProductdList = $this->Products->find('all')->where(['kid_id' => $kidId, 'is_finalize' => 0, 'is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->order(['created' => 'DESC']);

        $finalizeProductCount = $this->Products->find('all')->where(['kid_id' => $kidId, 'is_finalize' => 0, 'is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->count();
        $prductPrice = 0;
        foreach ($CurrentProductdList as $pl) {
            $prductPrice += $pl->sell_price;
        }

        $exchangeproductlist = $this->Products->find('all')->where(['is_complete' => 1, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->order(['created' => 'DESC']);
        $exchangeproductCount = $this->Products->find('all')->where(['is_complete' => 1, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->count();
        $exprice = 0;
        foreach ($exchangeproductlist as $exp) {
            $exprice += $exp->sell_price;
        }

        $shipping_mode = $this->Settings->find('all')->where(['name' => 'shipping_mode'])->first();
        $this->set(compact('shipping_mode', 'productCheckOut', 'exchangeproductCount', 'exprice', 'finalizeProductCount', 'prductPrice', 'userDetails', 'productTrackingNo', 'user_type', 'kids', 'employee', 'kidDetail', 'kidparent', 'kid_product', 'userId', 'kidId', 'productId', 'productData', 'paymentId'));
    }

    public function viewkidproductlist($paymentId = null, $kidId = null, $productId = null) {
        $userDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $paymentId])->first();
        $userId = $userDetails->user_id;
        $user_type = $this->request->session()->read('Auth.User.type');
        if (@$paymentId && @$productId && @$kidId) {
            $productData = $this->Products->find('all')->where(['Products.id' => $productId])->first();
        }

        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kidDetail = $this->KidsDetails->find('all')->contain(['Users'])->where(['KidsDetails.id' => $userDetails->kid_id])->group(['KidsDetails.id'])->first();

        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $kid_product = $this->Products->find('all')->where(['Products.payment_id' => $paymentId])->order(['Products.created' => 'ASC']);

        $employee = $this->Users->find('all')->where(['Users.type' => 3]);
        $this->set(compact('user_type', 'kids', 'employee', 'kidDetail', 'kidparent', 'kid_product', 'userId', 'kidId', 'productId', 'productData', 'paymentId'));
    }

    public function kidProductDelete($id = null) {
        if ($id) {
            $getDetail = $this->Products->find('all')->where(['Products.id' => $id])->first();
//            pj($getDetail);exit;
            if (!empty($getDetail->exchange_product_id)) {
                $this->Products->updateAll(['is_complete_by_admin' => 0, 'is_altnative_product' => ''], ['id' => $getDetail->exchange_product_id]);
            }
            if (!empty($getDetail->inv_product_id)) {
                $this->InProducts->updateAll(['match_status' => 2], ['id' => $getDetail->inv_product_id]);
            }
            $data = $this->Products->get($id);
            $dataDelete = $this->Products->delete($data);
//            unlink(PRODUCT_IMAGES . $getDetail->product_image);
//            unlink(PRODUCT_RECEIPT . $getDetail->product_receipt);
//            unlink(BARCODE . $getDetail->barcode_image);
            $this->Flash->success(__('Data has been delete successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $getDetail->payment_id . '/' . $getDetail->kid_id);
        }
    }

    public function kidpdelete($id = null) {
        if ($id) {
            $getDetail = $this->Products->find('all')->where(['Products.id' => $id])->first();
            $data = $this->Products->get($id);
            $dataDelete = $this->Products->delete($data);
            unlink(PRODUCT_IMAGES . $getDetail->product_image);
            unlink(PRODUCT_RECEIPT . $getDetail->product_receipt);
            unlink(BARCODE . $getDetail->barcode_image);
            $this->Flash->success(__('Data has been delete successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/viewkidproductlist/' . $getDetail->payment_id);
        }
    }

    public function deleteproductprevious($id = null) {

        if ($id) {
            $getDetail = $this->Products->find('all')->where(['Products.id' => $id])->first();
//            pj($getDetail);exit;
            $data = $this->Products->get($id);
// pj($data); exit;
            $dataDelete = $this->Products->delete($data);
            unlink(PRODUCT_IMAGES . @$getDetail->product_image);
            unlink(PRODUCT_RECEIPT . @$getDetail->product_receipt);
            unlink(BARCODE . @$getDetail->barcode_image);
            $this->Flash->success(__('Data has been delete successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getDetail->payment_id);
        }
    }

    public function deleteproduct($id = null) {

        if ($id) {
            $getDetail = $this->Products->find('all')->where(['Products.id' => $id])->first();
//            pj($getDetail);exit;
            if (!empty($getDetail->exchange_product_id)) {
                $this->Products->updateAll(['is_complete_by_admin' => 0, 'is_altnative_product' => ''], ['id' => $getDetail->exchange_product_id]);
            }
            if (!empty($getDetail->inv_product_id)) {
                $this->InProducts->updateAll(['match_status' => 2], ['id' => $getDetail->inv_product_id]);
            }
            $data = $this->Products->get($id);
// pj($data); exit;
            $dataDelete = $this->Products->delete($data);
//            unlink(PRODUCT_IMAGES . @$getDetail->product_image);
//            unlink(PRODUCT_RECEIPT . @$getDetail->product_receipt);
//            unlink(BARCODE . @$getDetail->barcode_image);
            $this->Flash->success(__('Data has been delete successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getDetail->payment_id);
        }
    }

    public function scanProduct($productId = null)
    {
        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        if (!empty($productId)) {
            $prd_dtl = $this->Products->find('all')->where(['id' => $productId])->first();
            $payment_id = $prd_dtl->payment_id;
            $productId = $prd_dtl->id;
            $productCode = $prd_dtl->barcode_value;
            $this->set(compact('productCode', 'productId'));
        }
    }

    public function scanProductProcessing()
    {


        if ($this->request->is('post')) {
            $data = $this->request->data;
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            //            exit;

            $payment_id = null;
            $productId = null;
            $productCode = null;
            $user_id = null;
            $kid_id = null;
            $total_amount = 0;
            $previous_amount = 0;
            $current_amount = 0;
            $style_fit_fee = 0;
            $keep_all_discount = 0;

            $productcount = $data['productCount'];

            $total = 0;
            for ($x = 1; $x <= $productcount; $x++) {
                $table = [];
                $Products = $this->Products->newEntity();
                $prd_dtl = $this->Products->find('all')->where(['id' => $data['productID' . $x]])->first();
                if ($x == 1) {
                    $payment_id = $prd_dtl->payment_id;
                    $productId = $prd_dtl->id;
                    $productCode = $prd_dtl->barcode_value;
                    $user_id = $prd_dtl->user_id;
                    $kid_id = $prd_dtl->kid_id;
                }

                if (($prd_dtl->checkedout == 'Y') && ($prd_dtl->keep_status == 3)) {
                    $previous_amount += $prd_dtl->sell_price;
                }


                $table['id'] = $data['productID' . $x];
                $table['comment'] = $data['comment' . $x];
                $table['is_dry_clean'] = $data['dry_clean' . $x];

                if (!empty($data['img' . $x]['tmp_name'])) {
                    // if ($data['img' . $x]['size'] <= 21000) {
                    $imageName = $this->Custom->uploadImageBanner($data['img' . $x]['tmp_name'], $data['img' . $x]['name'], PRODUCT_IMAGES, 400);
                    $table['photos'] = PRODUCT_IMAGES . $imageName;
                    // } 
                }

                if (@$data['what_do_you_think_of_the_product' . $x] == 3) {
                    $table['customer_purchasedate'] = date('Y-m-d');
                    $table['customer_purchase_status'] = 'Y';
                    $table['return_status'] = 'N';
                    $table['exchange_status'] = 'N';
                    $table['keep_status'] = 3;
                    //                    $table['is_complete'] = 1;
                    $table['is_payment_fail'] = 0;
                    $table['checkedout'] = 'Y';

                    if (($prd_dtl->checkedout == 'Y') && ($prd_dtl->keep_status == 1) && ($prd_dtl->is_complete == 0)) {
                        $table['is_stylist'] = 0;
                    }
                    if ($prd_dtl->is_complete == 0) {
                        $table['is_stylist'] = 1;
                    }

                    $current_amount += $data['sellprice' . $x];
                }

                if (@$data['what_do_you_think_of_the_product' . $x] == 2) {
                    $table['exchange_status'] = 'Y';
                    $table['checkedout'] = 'Y';
                    if (($prd_dtl->is_complete_by_admin != 1)) {
                        //                        $table['checkedout'] = 'N';
                        $this->PaymentGetways->updateAll(['status' => 1, 'mail_status' => 0, 'work_status' => 1], ['id' => $prd_dtl->payment_id]);
                        if (($prd_dtl->is_complete != 1) && ($prd_dtl->is_complete_by_admin != 1)) {
                            if (($prd_dtl->kid_id != 0)) {
                                $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $prd_dtl->kid_id]);
                            } else {
                                $this->Users->updateAll(['is_redirect' => 2], ['id' => $prd_dtl->user_id]);
                            }
                        }
                    }
                    $table['customer_purchase_status'] = 'N';
                    $table['return_status'] = 'N';
                    $table['keep_status'] = 2;
                    $table['product_exchange_date'] = date('Y-m-d');
                    $table['customer_purchasedate'] = date('Y-m-d');
                    //                    $table['is_complete'] = 1;
                    $table['is_payment_fail'] = 0;
                }


                if (($data['what_do_you_think_of_the_product' . $x] == 1)) {



                    $table['product_valid_return_date'] = date('Y-m-d h:i:s');
                    $table['checkedout'] = 'Y';
                    $table['store_return_status'] = 'Y';
                    $table['return_status'] = 'Y';
                    $table['customer_purchase_status'] = 'N';
                    $table['exchange_status'] = 'N';
                    $table['customer_purchasedate'] = '';
                    $table['store_return_date'] = date('Y-m-d');
                    //                    $table['is_complete'] = 1;
                    $table['keep_status'] = 1;
                    // $table['is_complete_by_admin'] = 1;
                    $table['is_payment_fail'] = 0;

                    $chk_prd_dtls = $this->Products->find('all')->where(['id' => $data['productID' . $x]])->first();
                    if (!empty($chk_prd_dtls) && !empty($chk_prd_dtls->inv_product_id)) {
                        $newLogArr = [];
                        $newLogArr['product_id'] = $chk_prd_dtls->inv_product_id;
                        $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                        $newLogArr['action'] = 'customer_return';
                        $newLogArr['created_on'] = date('Y-m-d H:i:s');
                        $newDtRow = $this->InProductLogs->newEntity();
                        $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                        $this->InProductLogs->save($newDtRow);
                        // echo "<pre>";print_r($newDtRow);echo "</pre>";
                        $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Customer Return'], ['id' => $chk_prd_dtls->inv_product_id]);
                    }
                }


                $Products = $this->Products->patchEntity($Products, $table);
                //                 echo "<pre>";
                //                 print_r($table);
                //                 print_r($Products);
                //                 echo "</pre>";
                $this->Products->save($Products);
            }
            //             echo $payment_id;
            //             exit;

            if ($current_amount > $previous_amount) {
                $total_amount = $current_amount - $previous_amount;
            } else if ($previous_amount > $current_amount) {
                $total_amount = $current_amount - $previous_amount;
            }

            //            echo $total_amount;
            //            echo "<br>";
            //            echo $productcount;


            $payment_details = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
            $user_id = $payment_details->user_id;
            $kid_id = $payment_details->kid_id;

            $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $user_id])->first();
            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();
            if (empty($payment_data)) {
                $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id])->first();
            }

            $lastPymentg = $this->PaymentGetways->newEntity();
            $table1['user_id'] = $user_id;
            $table1['kid_id'] = $kid_id;
            $table1['emp_id'] = 0;
            $table1['status'] = 0;
            // $table1['price'] = $paymentGetwayAmount;
            $table1['price'] = $total_amount;
            $table1['profile_type'] = $payment_details->profile_type;
            $table1['payment_type'] = 2;
            $table1['created_dt'] = date('Y-m-d H:i:s');
            $table1['parent_id'] = $payment_id;
            $table1['work_status'] = 1;
            $table1['count'] = $payment_details->count;
            $table1['payment_card_details_id'] = $payment_data->id;
            $table1['shipping_address_id'] = $payment_details->shipping_address_id;

            $lastPymentg = $this->PaymentGetways->patchEntity($lastPymentg, $table1);
            $lastPymentg = $this->PaymentGetways->save($lastPymentg);

            if ($payment_details->kid_id != 0) {
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $payment_details->kid_id])->first();

                $cname = $getUsersDetails->kids_first_name;
            } else {
                $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();
                $cname = $getUsersDetails->name;
            }
            if (!empty($payment_details->shipping_address_id)) {
                $shipping_address_data = $this->ShippingAddress->find('all')->where(['id' => $payment_details->shipping_address_id])->first();
            }

            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();
            if (empty($billingAddress)) {
                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id])->first();
            }

            $all_sales_tax = $this->SalesNotApplicableState->find('all');
            $sales_tx_required = "NO";
            $sales_tx_rt = 0;
            $sales_tx = 0;
            foreach ($all_sales_tax as $sl_tx) {
                if (($shipping_address_data->zipcode >= $sl_tx->zip_min) && ($shipping_address_data->zipcode <= $sl_tx->zip_max)) {
                    $sales_tx_required = "YES";
                    $sales_tx_rt = $sl_tx->tax_rate / 100;
                }
            }

            if ($sales_tx_required == "YES") {
                if ($total_amount > 0) {
                    $sales_tx = sprintf('%.2f', $total_amount * $sales_tx_rt);
                    $total_amount += $sales_tx;
                }
            }

            if (!empty($total_amount)) {
                $total_amount = number_format(sprintf('%.2f', $total_amount), 2, '.', '');
            }


            $arr_user_info = [
                'stripe_customer_key' => $current_usr_dtl_strip->stripe_customer_key,
                'stripe_payment_method' => $payment_data->stripe_payment_key,
                'product' => $billingAddress->full_name . ' Check out order',
                'first_name' => $billingAddress->full_name,
                'last_name' => $billingAddress->full_name,
                'address' => $billingAddress->address,
                'city' => $billingAddress->city,
                'state' => $billingAddress->state,
                'zip' => $billingAddress->zipcode,
                'country' => 'USA',
                'email' => $current_usr_dtl_strip->email,
                //'amount' => $paymentGetwayAmount,
                'amount' => $total_amount,
                'invice' => $payment_id,
                'refId' => 32,
                'companyName' => 'Drapefit',
            ];

            //             print_r($user_id);
            //             print_r($arr_user_info);
            //             exit;
            if ($total_amount > 0) {
                $message = $this->stripePay($arr_user_info);
            } else {
                $message = [];
                $message['status'] = '1';
            }
            //            echo "<pre>";
            //            var_dump($total_amount > 0) ;
            //            print_r($table1);
            //            print_r($arr_user_info);
            //            print_r($current_amount);
            //            print_r($previous_amount);
            //            print_r($message);
            //            exit;
            if (@$message['status'] == '1') {

                $this->loadModel('SmsSettings');
                $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'CHECKOUT_RECEIPT_SMS'])->first();
                if (!empty($get_sms_temp)) {
                    $txt_msg = str_replace("[CUSTOMER_ORDER_PAGE]", HTTP_ROOT . 'order', $get_sms_temp->value);
                    $phone = $billingAddress->country_code . $billingAddress->phone;
                    $url = HTTP_ROOT . 'api/sendSmsPost';
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'CHECKOUT_RECEIPT_SMS'),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                }

                $this->PaymentGetways->updateAll(['return_process_inv_user' => NULL], ['id' => $payment_id]);
                $this->PaymentGetways->updateAll(['status' => 1], ['id' => $lastPymentg->id]);
                $payment_check = $this->Payments->find('all')->where(['payment_id' => $lastPymentg->id])->order(['id' => 'DESC'])->first();
                $payment = $this->Payments->newEntity();
                if (!empty($payment_check)) {
                    $table['id'] = $payment_check->id;
                }
                $table['user_id'] = $this->Auth->user('id');
                $table['payment_id'] = $lastPymentg->id;
                $table['sub_toal'] = $total_amount - $sales_tx;
                $table['sales_tax'] = $sales_tx;
                $table['tax'] = 0.00;
                $table['tax_price'] = 0;
                //                $table['total_price'] = $price;
                $table['total_price'] = $total_amount;
                $table['paid_status'] = 1;
                $table['created_dt'] = date('Y-m-d H:i:s');
                //                $table['product_ids'] = @implode(',', @$product_ids);
                $table['wallet_balance'] = 0;
                $table['promo_balance'] = 0;
                $payment = $this->Payments->patchEntity($payment, $table);
                $lastPyment = $this->Payments->save($payment);

                if ($payment_details->kid_id != 0) {
                    $profileType = 3;
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.payment_id' => $payment_id, 'Products.is_complete_by_admin !=' => 1, 'OR' => ['Products.exchange_status' => 'Y', 'Products.checkedout' => 'Y']]);
                    $kidcount = $prData->count();
                } else {
                    $profileType = $payment_details->profile_type;
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.is_complete_by_admin !=' => 1, 'OR' => ['Products.exchange_status' => 'Y', 'Products.checkedout' => 'Y']]);
                }

                $productData = '';
                $i = 1;
                foreach ($prData as $dataMail) {
                    if ($dataMail->keep_status == 3) {
                        $priceMail = $dataMail->sell_price;
                    } else {
                        $priceMail = 0;
                    }
                    if ($dataMail->keep_status == 3) {
                        $keep = 'Keeps';

                        if (!empty($dataMail->inv_product_id)) {
                            $newLogArr = [];
                            $newLogArr['product_id'] = $dataMail->inv_product_id;
                            $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                            $newLogArr['action'] = 'customer_keep';
                            $newLogArr['created_on'] = date('Y-m-d H:i:s');
                            $newDtRow = $this->InProductLogs->newEntity();
                            $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                            $this->InProductLogs->save($newDtRow);
                            // echo "<pre>";print_r($newDtRow);echo "</pre>";
                            $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Customer Keep'], ['id' => $dataMail->inv_product_id]);
                        }
                    } elseif ($dataMail->keep_status == 2) {
                        $keep = 'Exchange';
                    } elseif ($dataMail->keep_status == 1) {
                        $keep = 'Return';
                    }
                    //continue;
                    $img_dd = "";
                    $img_dd = strstr($dataMail->product_image, PRODUCT_IMAGES) ? $dataMail->product_image : PRODUCT_IMAGES . $dataMail->product_image;

                    //                    if ($dataMail->is_complete != 1) {
                    $productData .= "<tr>
                        <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               # " . $i . "

                            </td>

                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                              <img src='" . HTTP_ROOT . $img_dd . "' width='85'/>

                            </td>

                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               " . $dataMail->product_name_one . "

                            </td>

                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               " . $dataMail->product_name_two . "

                            </td>

                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                                " . $keep . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               " . $dataMail->size . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               $" . number_format($priceMail, 2) . "

                            </td>

                        </tr>";
                    //                    }

                    if ($dataMail->keep_status == 3) {
                        $priceMail = $dataMail->sell_price;
                        //                        $this->Products->updateAll(['is_complete' => '1'], ['id' => $dataMail->id]);
                    } else {
                        $priceMail = 0;
                    }
                    if ($dataMail->keep_status == 3) {
                        //                        $this->Products->updateAll(['is_complete' => '1', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                        $this->Products->updateAll(['is_exchange_pending' => 0], ['id' => $dataMail->id]);
                        $keep = 'Keeps';
                        $this->Products->updateAll(['checkedout' => 'Y', 'is_complete_by_admin' => 1], ['id' => $dataMail->id]);
                    } elseif ($dataMail->keep_status == 2) {
                        $keep = 'Exchange';
                        //                        $this->Products->updateAll(['is_complete' => '1', 'is_exchange_pending' => 1], ['id' => $dataMail->id]);
                        $this->Products->updateAll(['is_exchange_pending' => 1], ['id' => $dataMail->id]);

                        if (!empty($dataMail) && !empty($dataMail->inv_product_id)) {
                            $newLogArr = [];
                            $newLogArr['product_id'] = $dataMail->inv_product_id;
                            $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                            $newLogArr['action'] = 'customer_exchange';
                            $newLogArr['created_on'] = date('Y-m-d H:i:s');
                            $newDtRow = $this->InProductLogs->newEntity();
                            $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                            $this->InProductLogs->save($newDtRow);
                            //                            echo "<pre>";print_r($newDtRow);echo "</pre>";
                            $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Customer Exchange'], ['id' => $dataMail->inv_product_id]);
                        }
                    } else if ($dataMail->keep_status == 1) {
                        $keep = 'Return';
                        //                        $this->Products->updateAll(['is_complete' => '1', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                        $this->Products->updateAll(['is_exchange_pending' => 0], ['id' => $dataMail->id]);
                        $this->Products->updateAll(['checkedout' => 'Y', 'is_complete_by_admin' => 1], ['id' => $dataMail->id]);

                        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Inv_Tab_Return_Queue')], ['id' => $prd_dtl->payment_id]);
                    }


                    $i++;
                }



                $productcount = $data['productCount'];
                $total = 0;
                for ($x = 1; $x <= $productcount; $x++) {
                    $products = $this->Products->newEntity();
                    $table = [];
                    $table['id'] = $data['productID' . $x];
                    if (@$data['what_do_you_think_of_the_product' . $x] == 3) {
                        $table['is_complete'] = 1;
                    }
                    if (@$data['what_do_you_think_of_the_product' . $x] == 2) {
                        $table['is_complete'] = 1;
                    }
                    if (($data['what_do_you_think_of_the_product' . $x] == 1)) {
                        $table['is_complete'] = 1;
                    }
                    $Products = $this->Products->patchEntity($Products, $table);
                    $this->Products->save($Products);
                }

                //                echo "<pre>";
                //                print_r($prData->count());
                //                print_r($prData);
                //                print_r($productData);
                //                echo "</pre>";
                //                exit;
                $offerData = '';
                $gtotal = $total_amount - $sales_tx;
                $sitename = HTTP_ROOT;
                $name = $getUsersDetails->name;
                $to = $current_usr_dtl_strip->email; //$getUsersDetails->email;
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $from = $fromMail->value;
                $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                //                $subject = $emailMessage1->display . ' #DFPYMID' . $payment_id;
                $subject = 'Here is Your Drape Fit Receipt  #DFPYMID' . $payment_id;

                $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, number_format(floor(($total_amount - $sales_tx) * 100) / 100, 2, '.', ''), $total_amount, $style_fit_fee, $keep_all_discount, $refundamount = '', $gtotal, $offerData, $sales_tx, '#DFPYMID' . $payment_id);
                $this->Custom->sendEmail($to, $from, $subject, $email_message);
                //                $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

                //                echo $productData;
                //                exit;

                if (!empty($payment_id)) {
                    $all_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id])->count();
                    $chked_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'checkedout' => 'Y'])->count();
                    $chk_exng_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'keep_status' => 2]);
                    $is_exchange_pesent = 0;
                    foreach ($chk_exng_prd_cnt as $exg_prd_li) {
                        $get_alter_prd = $this->Products->find('all')->where(['payment_id' => $payment_id, 'exchange_product_id' => $exg_prd_li->id])->count();
                        if ($get_alter_prd == 0) {
                            $is_exchange_pesent = 1;
                        }
                    }
                    if ($is_exchange_pesent == 1) {
                        if (!empty($kid_id)) {
                            $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $kid_id]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 2], ['id' => $user_id]);
                        }
                    } else {
                        if ($all_prd_cnt == $chked_prd_cnt) {
                            $this->PaymentGetways->updateAll(['status' => 1, 'work_status' => 2,'work_flow_status' => Configure::read('Previous_Worklist_queue')], ['id' => $payment_id]);
                            if (!empty($kid_id)) {
                                $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);
                                $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                            } else {
                                $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                                $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                            }
                        }
                    }
                    $this->Products->updateAll(['is_payment_fail' => 0], ['payment_id' => $payment_id]);
                }

                if ($total_amount > 0) {
                    $this->Flash->success(__('Payment completed. Return product return completed.'));
                } else {
                    $this->Flash->success(__($total_amount . ' need to refund. Return product return completed.'));
                }
            } else {
                $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Support_Tab_Recovery_queue')], ['id' => $payment_id]);
                $this->PaymentGetways->updateAll(['return_process_inv_user' => NULL], ['id' => $payment_id]);

                if ($payment_details->kid_id != 0) {
                    $profileType = 3;
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.kid_id !=' => 0, 'Products.payment_id' => $payment_id]);
                    $kidcount = $prData->count();
                } else {
                    $profileType = $payment_details->profile_type;
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id]);
                }

                $productData = '';
                foreach ($prData as $dataMail) {
                    if (($dataMail->keep_status == 3) && ($dataMail->is_stylist == 1)) {
                        if ($dataMail->is_complete != 1) {
                            $this->Products->updateAll(['customer_purchasedate' => '', 'customer_purchase_status' => '', 'return_status' => '', 'exchange_status' => '', 'keep_status' => 99, 'is_payment_fail' => 1, 'checkedout' => 'N', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                            $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);
                        }
                        if ($dataMail->is_complete == 1) {
                            $this->Products->updateAll(['is_complete_by_admin' => 1], ['id' => $dataMail->id]);
                        }
                        $keep = 'Keeps';
                    } elseif ($dataMail->keep_status == 2) {
                        $keep = 'Exchange';
                        $this->Products->updateAll(['is_complete' => '1', 'is_complete_by_admin' => 1, 'is_exchange_pending' => 1], ['id' => $dataMail->id]);

                        if (!empty($dataMail) && !empty($dataMail->inv_product_id)) {
                            $newLogArr = [];
                            $newLogArr['product_id'] = $dataMail->inv_product_id;
                            $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                            $newLogArr['action'] = 'customer_exchange';
                            $newLogArr['created_on'] = date('Y-m-d H:i:s');
                            $newDtRow = $this->InProductLogs->newEntity();
                            $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                            $this->InProductLogs->save($newDtRow);
                            //                            echo "<pre>";print_r($newDtRow);echo "</pre>";
                            $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Customer Exchange'], ['id' => $dataMail->inv_product_id]);
                        }
                    } elseif ($dataMail->keep_status == 1) {
                        $keep = 'Return';
                        $this->Products->updateAll(['is_complete' => '1', 'is_complete_by_admin' => 1, 'is_exchange_pending' => 0], ['id' => $dataMail->id]);



                        /* $newLogArr = [];
                          $newLogArr['product_id'] = $dataMail->inv_product_id;
                          $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                          $newLogArr['action'] = 'customer_return';
                          $newLogArr['created_on'] = date('Y-m-d H:i:s');
                          $newDtRow = $this->InProductLogs->newEntity();
                          $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                          $this->InProductLogs->save($newDtRow);
                          echo "<pre>";print_r($newDtRow);echo "</pre>";
                          $this->InProducts->updateAll(['updated_by'=>$this->request->session()->read('Auth.User.id'),'updated_date'=>date('Y-m-d H:i:s'), 'action'=>'Customer Return'], ['id' => $dataMail->inv_product_id]); */
                    }
                }


                $all_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id])->count();
                $chked_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'checkedout' => 'Y'])->count();
                $chked_declin_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'keep_status' => 99])->count();
                if (!empty($chked_declin_cnt)) {
                    if (!empty($kid_id)) {
                        $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $kid_id]);
                    } else {
                        $this->Users->updateAll(['is_redirect' => 4], ['id' => $user_id]);
                    }
                }

                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $payment_details->user_id, 'is_billing' => 1])->first();
                if (empty($billingAddress)) {
                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $payment_details->user_id])->first();
                }



                $this->loadModel('SmsSettings');
                $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'AUTO_CHECKOU_DECLINED'])->first();
                if (!empty($get_sms_temp)) {
                    $txt_msg = str_replace("[ORDER_NUMBER]", "DFPYMID" . $payment_id, $get_sms_temp->value);
                    $txt_msg = str_replace("[CUSTOMER_PAYMENT_PAGE]", HTTP_ROOT . "order_review/", $txt_msg);
                    $phone = $billingAddress->country_code . $billingAddress->phone;
                    $url = HTTP_ROOT . 'api/sendSmsPost';
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'AUTO_CHECKOUT_DECLINED'),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                }


                if (!empty($total_amount)) {
                    $data1 = [];
                    if (!empty($kid_id)) {
                        $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $kid_id]);
                        $this->Notifications->updateAll(['is_read' => '1'], ['kid_id' => $kid_id]);
                        $notificationsTable = $this->Notifications->newEntity();
                        $data1['user_id'] = $user_id;
                        $data1['msg'] = 'Complete your order.';
                        $data1['is_read'] = '0';
                        $data1['created'] = date('Y-m-d H:i:s');
                        $data1['kid_id'] = $kid_id;
                        $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                        $this->Notifications->save($notificationsTable);
                    } else {
                        $this->Users->updateAll(['is_redirect' => '4'], ['id' => $user_id]);
                        $this->Notifications->updateAll(['is_read' => '1'], ['user_id' => $user_id, 'kid_id' => 0]);
                        $notificationsTable = $this->Notifications->newEntity();
                        $data1['user_id'] = $user_id;
                        $data1['msg'] = 'Complete your order.';
                        $data1['is_read'] = '0';
                        $data1['created'] = date('Y-m-d H:i:s');
                        $data1['kid_id'] = '0';
                        $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                        $this->Notifications->save($notificationsTable);
                    }
                }

                //                $this->PaymentGetways->updateAll(['status' => 5, 'work_status' => 5], ['id' => $payment_id]);

                $this->Flash->error(__($total_amount . 'Payment fail. Return product return completed.'));
            }

            //Inventory return 
            $prData = [];
            if ($payment_details->kid_id != 0) {
                $profileType = 3;
                $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.kid_id !=' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status IN' => [1, 2], 'Products.return_inventory' => 2]);
            } else {
                $profileType = $payment_details->profile_type;
                $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status IN' => [1, 2], 'Products.return_inventory' => 2]);
            }

            foreach ($prData as $dt) {
                if (!empty($dt->inv_product_id)) {
                    $productCheck = $this->InProducts->find('all')->where(['id' => $dt->inv_product_id])->first();
                    $quantity = (!empty($productCheck) && !empty($productCheck->quantity)) ? ((int) $productCheck->quantity + 1) : 1;
                    $available_status = 1;
                    $is_active = 1;
                    $store_return_status = $dt->store_return_status;
                    if ($dt->is_dry_clean == 1) {
                        $this->InProducts->updateAll(['quantity' => 0, 'available_status' => 0, 'is_active' => 0, 'match_status' => 1/* , 'store_return_status' => $store_return_status */], ['id' => $productCheck->id]);
                    } else {
                        $this->InProducts->updateAll(['quantity' => $quantity, 'available_status' => $available_status, 'is_active' => $is_active, 'match_status' => 2/* , 'store_return_status' => $store_return_status */], ['id' => $productCheck->id]);
                    }
                    $this->Products->updateAll(['return_inventory' => 1], ['id' => $dt->id]);
                }
            }

            return $this->redirect(HTTP_ROOT . 'appadmins/return_process_complete/' . $productId);
        }
        exit;
    }

    public function returnProcessComplete($productId, $payment_id = null)
    {
        if (empty($payment_id)) {
            $productEditDetails = $this->Products->find('all')->where(['id' => $productId])->first();
            $payment_id = $productEditDetails->payment_id;
        }

        $this->Products->updateAll(['is_complete' => 1], ['Products.payment_id' => $payment_id, 'Products.keep_status IN' => [1, 2]]);

        $payment_details = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
        $user_id = $payment_details->user_id;
        $kid_id = $payment_details->kid_id;

        if ($payment_details->kid_id != 0) {
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $payment_details->kid_id])->first();

            $cname = $getUsersDetails->kids_first_name;

            $profileType = 3;
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.kid_id !=' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status IN' => [1, 2]])->order(['Products.id' => 'DESC']);
            $kidcount = $prData->count();
        } else {

            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();
            $cname = $getUsersDetails->name;

            $profileType = $payment_details->profile_type;
            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status IN' => [1, 2]])->order(['Products.id' => 'DESC']);
        }

        if ($prData->count() < 1) {
            return $this->redirect(HTTP_ROOT . 'appadmins/scan_product');
        }

        $this->set(compact('prData', 'getUsersDetails', 'cname'));
    }

    public function completeUserProfileSataus($payment_id)
    {
        if (!empty($payment_id)) {
            $payment_details = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
            $all_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id])->count();
            $chked_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'checkedout' => 'Y'])->count();
            $user_id = $payment_details->user_id;
            $kid_id = $payment_details->kid_id;
            if ($all_prd_cnt == $chked_prd_cnt) {
                $this->PaymentGetways->updateAll(['status' => 1, 'work_status' => 2], ['id' => $payment_id]);
                if (!empty($kid_id)) {
                    $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                    $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                }
                $this->Flash->success(__('Style fit goes to previous work list.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/view_users');
            } else {
                $this->Flash->error(__('All products are not yet checkedout.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Invalid request'));
            return $this->redirect($this->referer());
        }
    }

    public function stripePay($arr_data = []) {

        extract($arr_data);
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
//        $stripeToken = $stripeToken;
        $custName = $first_name . ' ' . $last_name;
        $custEmail = $email;

//        if (empty($stripeToken)) {
//            $msg['error'] = 'error';
//            $msg['ErrorCode'] = " Error Code  : \n";
//            $msg['ErrorCode'] = " Error Message : Payment failed!\n";
//            return $msg;
//            exit;
//        }
        //include Stripe PHP library
//        require_once(ROOT . DS . 'vendor' . DS . "stripe-php" . DS . "init.php");
        //require_once('stripe-php/init.php');
        //set stripe secret key and publishable key
        
        $stripe_api_key = $this->Custom->getStripeKey();

        $stripe = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );
        \Stripe\Stripe::setApiKey($stripe['secret_key']);

        //add customer to stripe 
        //Create Once for eacy manage in stripe end            


        try {



            // item details for which payment made
            $itemName = $product;
            $itemNumber = $invice;
            $itemPrice = round($amount, 2, PHP_ROUND_HALF_UP);
            $currency = "USD";
            $orderID = "DFPYMID" . $invice;

            // details for which payment performed
            $payDetails = \Stripe\PaymentIntent::create([
                        'amount' => $itemPrice * 100,
                        'currency' => $currency,
                        'customer' => $stripe_customer_key, //customer_id
                        'payment_method' => $stripe_payment_method, //payment_id
                        'off_session' => true,
                        'confirm' => true,
                        'description' => $itemName,
            ]);
//            echo "<pre>";
//            print_r($payDetails);
            // get payment details
            $paymenyResponse = $payDetails->jsonSerialize();

//             print_r([$paymenyResponse['charges']['data'][0]['status'],$paymenyResponse['charges']['data'][0]['receipt_url'], $paymenyResponse['charges']['data'][0]['balance_transaction'],$paymenyResponse['charges']['data'][0]['id']]);
//            print_r($paymenyResponse);

            $payment_intent_id = $paymenyResponse['id'];
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id, 'status' => 1], ['id' => $invice]);
            // check whether the payment is successful
            if ($paymenyResponse['charges']['data'][0]['status'] == 'succeeded') {
                // transaction details 
                $amountPaid = $paymenyResponse['charges']['data'][0]['amount'];
                $balanceTransaction = $paymenyResponse['charges']['data'][0]['balance_transaction'];
                $charged_id = $paymenyResponse['charges']['data'][0]['id']; //used for refund
                $receipt_url = $paymenyResponse['charges']['data'][0]['receipt_url'];
                $paidCurrency = $paymenyResponse['charges']['data'][0]['currency'];
                $paymentStatus = $paymenyResponse['charges']['data'][0]['status'];
                $paymentDate = date("Y-m-d H:i:s");

                $lastInsertId = $balanceTransaction;
//                print_r($lastInsertId);
//                print_r($paymentStatus);
//                print_r([$amountPaid, $receipt_url, $balanceTransaction, $charged_id, $invice]);
//                exit;

                if ($lastInsertId && $paymentStatus == 'succeeded') {

                    $this->PaymentGetways->updateAll(['receipt_url' => $receipt_url, 'charge_id' => $charged_id, 'transactions_id' => $balanceTransaction], ['id' => $invice]);
//                    exit;

                    $msg['status'] = 1;
                    $msg['TransId'] = $lastInsertId;
                    $msg['Success'] = " Successfully created transaction with Transaction ID: " . $lastInsertId . "\n";
                    $msg['ResponseCode'] = " Transaction Response Code: " . 200 . "\n";
                    $msg['MessageCode'] = " Message Code: " . 200 . "\n";
                    $msg['AuthCode'] = " Auth Code: " . 200 . "\n";
                    $msg['Description'] = " Description: The payment was successful.\n";
                    $msg['msg'] = " Description: The payment was successful.\n";
                } else {
                    $msg['error'] = 'error';
                    $msg['ErrorCode'] = " Error Code  : \n";
                    $msg['ErrorCode'] = " Error Message : Payment failed!\n" . $paymentStatus;
                }
            } else {
                $msg['error'] = 'error';
                $msg['ErrorCode'] = " Error Code  : \n";
                $msg['ErrorCode'] = " Error Message : Payment failed!\n" . $paymentStatus;
            }
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
//            echo 'Status is:' . $e->getHttpStatus() . '\n';
//            echo 'Type is:' . $e->getError()->type . '\n';
//            echo 'Code is:' . $e->getError()->code . '\n';
//            // param is '' in this case
//            echo 'Param is:' . $e->getError()->param . '\n';
//            echo 'Message is:' . $e->getError()->message . '\n';
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\RateLimitException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\AuthenticationException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Error\Base $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (Exception $e) {
            echo "No response returned \n";
            $msg['error'] = 'error';
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        }

        return $msg;

        exit;
    }

    public function deleteprofile($userid = null) {
        if ($userid) {
//$this->UserDetails->deleteAll(['user_id' => $userid]);
//$this->FitCut->deleteAll(['user_id' => $userid]);
            $this->PaymentGetways->deleteAll(['PaymentGetways.id' => $userid]);
            $this->Products->deleteAll(['Products.payment_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MensBrands->deleteAll(['user_id' => $userid]);
            $this->MenFit->deleteAll(['user_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MenStyle->deleteAll(['user_id' => $userid]);
            $this->MenStyleSphereSelections->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->TypicallyWearMen->deleteAll(['user_id' => $userid]);
            $this->ShippingAddress->deleteAll(['user_id' => $userid]);
            $this->YourProportions->deleteAll(['user_id' => $userid]);
            $this->CustomerProductReview->deleteAll(['user_id' => $userid]);
            $this->WomenJeansRise->deleteAll(['user_id' => $userid]);
            $this->WomenJeansStyle->deleteAll(['user_id' => $userid]);
            $this->WemenJeansLength->deleteAll(['user_id' => $userid]);
            $this->WomenPrintsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenTypicalPurchaseCloth->deleteAll(['user_id' => $userid]);
            $this->WomenIncorporateWardrobe->deleteAll(['user_id' => $userid]);
            $this->WomenFabricsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenColorAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenPrice->deleteAll(['user_id' => $userid]);
            $this->WomenStyle->deleteAll(['user_id' => $userid]);
            $this->WomenInformation->deleteAll(['user_id' => $userid]);
            $this->WomenRatherDownplay->deleteAll(['user_id' => $userid]);
            $this->PersonalizedFix->deleteAll(['user_id' => $userid]);
            $this->LetsPlanYourFirstFix->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->KidsPersonality->deleteAll(['user_id' => $userid]);
            $this->KidsPrimary->deleteAll(['user_id' => $userid]);
            $this->KidsSizeFit->deleteAll(['user_id' => $userid]);
            $this->KidClothingType->deleteAll(['user_id' => $userid]);
            $this->KidStyles->deleteAll(['user_id' => $userid]);
            $this->KidsPricingShoping->deleteAll(['user_id' => $userid]);
            $this->KidPurchaseClothing->deleteAll(['user_id' => $userid]);
            $this->CustomerStylist->deleteAll(['user_id' => $userid]);
            $this->Users->deleteAll(['id' => $userid]);
        }
        $this->Flash->success(__('Data has been deleted successfully.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/view_users');
    }

    public function deletecusprofile($userid = null, $kid_id = null) {
        if ($kid_id != '') {
            $this->PaymentGetways->deleteAll(['PaymentGetways.id' => $userid, 'PaymentGetways.kid_id' => $kid_id]);
            $this->Products->deleteAll(['Products.payment_id' => $userid, 'Products.kid_id' => $kid_id]);
            $this->KidsDetails->deleteAll(['user_id' => $userid, 'id' => $kid_id]);
            $this->ShippingAddress->deleteAll(['user_id' => $userid, 'Products.kid_id' => $kid_id]);
            $this->LetsPlanYourFirstFix->deleteAll(['user_id' => $userid, 'Products.kid_id' => $kid_id]);
            $this->KidsPersonality->deleteAll(['kid_id' => $kid_id]);
            $this->KidsPrimary->deleteAll(['kid_id' => $kid_id]);
            $this->KidsSizeFit->deleteAll(['kid_id' => $kid_id]);
            $this->KidClothingType->deleteAll(['kid_id' => $kid_id]);
            $this->KidStyles->deleteAll(['kid_id' => $kid_id]);
            $this->KidsPricingShoping->deleteAll(['kid_id' => $kid_id]);
            $this->KidPurchaseClothing->deleteAll(['kid_id' => $kid_id]);
            $this->CustomerStylist->deleteAll(['user_id' => $userid, 'kid_id' => $kid_id]);
        } else {
            $this->PaymentGetways->deleteAll(['PaymentGetways.id' => $userid]);
            $this->Products->deleteAll(['Products.payment_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MensBrands->deleteAll(['user_id' => $userid]);
            $this->MenFit->deleteAll(['user_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MenStyle->deleteAll(['user_id' => $userid]);
            $this->MenStyleSphereSelections->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->TypicallyWearMen->deleteAll(['user_id' => $userid]);
            $this->ShippingAddress->deleteAll(['user_id' => $userid]);
            $this->YourProportions->deleteAll(['user_id' => $userid]);
            $this->CustomerProductReview->deleteAll(['user_id' => $userid]);
            $this->WomenJeansRise->deleteAll(['user_id' => $userid]);
            $this->WomenJeansStyle->deleteAll(['user_id' => $userid]);
            $this->WemenJeansLength->deleteAll(['user_id' => $userid]);
            $this->WomenPrintsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenTypicalPurchaseCloth->deleteAll(['user_id' => $userid]);
            $this->WomenIncorporateWardrobe->deleteAll(['user_id' => $userid]);
            $this->WomenFabricsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenColorAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenPrice->deleteAll(['user_id' => $userid]);
            $this->WomenStyle->deleteAll(['user_id' => $userid]);
            $this->WomenInformation->deleteAll(['user_id' => $userid]);
            $this->WomenRatherDownplay->deleteAll(['user_id' => $userid]);
            $this->PersonalizedFix->deleteAll(['user_id' => $userid]);
            $this->LetsPlanYourFirstFix->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->KidsPersonality->deleteAll(['user_id' => $userid]);
            $this->KidsPrimary->deleteAll(['user_id' => $userid]);
            $this->KidsSizeFit->deleteAll(['user_id' => $userid]);
            $this->KidClothingType->deleteAll(['user_id' => $userid]);
            $this->KidStyles->deleteAll(['user_id' => $userid]);
            $this->KidsPricingShoping->deleteAll(['user_id' => $userid]);
            $this->KidPurchaseClothing->deleteAll(['user_id' => $userid]);
            $this->UserDetails->deleteAll(['user_id' => $userid]);
            $this->CustomerStylist->deleteAll(['user_id' => $userid]);
            $this->Users->deleteAll(['id' => $userid]);
        }
        $this->Flash->success(__('Data has been deleted successfully.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/customer_list');
    }

    public function promocode($promoId = null) {
        $promocode = $this->Promocode->newEntity();
        //$userlist = $this->Users->find('all')->where(['Users.type' => 2]);
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $userlist = $this->Users->find('all')->where(['Users.type' => 2])->group(['Users.id']);
        if (@$promoId) {
            $promotEditDetails = $this->Promocode->find('all')->where(['Promocode.id' => @$promoId])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['promoEmail'] == 'usersPromocode') {
                $newEntity6 = $this->UserMailTemplatePromocode->newEntity();
                $data['promocode_id'] = @$data['promo_id'];
                $data['apply_dt'] = date("Y-m-d H:i:s");
                $newEntity6 = $this->UserMailTemplatePromocode->patchEntity($newEntity6, $data);
                $this->UserMailTemplatePromocode->save($newEntity6);
                if (@$data['user_id']) {
                    $this->UserMailTemplatePromocode->deleteAll(['promocode_id' => @$data['promo_id']]);

                    foreach (@$data['user_id'] as $userid) {
                        $useremail = $this->Users->find('all')->where(['Users.id' => $userid])->first();

                        $promocode = $this->Promocode->find('all')->where(['Promocode.id' => $data['promo_id']])->first();
                        $newEntity5 = $this->UserMailTemplatePromocode->newEntity();
                        $data['id'] = '';
//                        $data['user_id'] = $userid;
                        $newEntity5 = $this->UserMailTemplatePromocode->patchEntity($newEntity5, $data);
                        $newEntity5->user_id = $userid;
                        $this->UserMailTemplatePromocode->save($newEntity5);
                        $userpreferen = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $userid])->first();

                        if (@$userpreferen->preferences == 0 || @$userpreferen->preferences == '') {
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PROMOCODE'])->first();
                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                            //echo $fromMail;  exit;

                            $to = $useremail->email;
                            $from = $fromMail->value;
                            $subject = str_replace('[PRICE]', $promocode->price, $emailMessage->display);
                            $sitename = SITE_NAME;
                            $created_dtt = $promocode->created_dt;
                            $lasst_dtt = $promocode->expiry_date;
                            $message = $this->Custom->promocodesend($emailMessage->value, $promocode->promocode, $promocode->price, $promocode->comments, $sitename, $created_dtt, $lasst_dtt);

                            $this->Custom->sendEmail($to, $from, $subject, $message);

                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                            $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                        }
//email creation
                    }
                }

                $this->Flash->success(__('Mail sentsuccessfully.'));
                $promoemail = $this->UserMailTemplatePromocode->find('all')->where(['UserMailTemplatePromocode.promocode_id' => @$promodetails->id]);
                $promoemail2 = $promoemail->extract('user_id')->toArray();
                $checkedemail = $this->UserMailTemplatePromocode->find('all');
                return $this->redirect(HTTP_ROOT . 'appadmins/promocode');
            } else {


                if (@$data['id']) {
                    $data['id'] = $data['id'];
                } else {
                    $data['is_active'] = 1;
                }
                $data['expiry_date'] = date('Y-m-d h:i:s', strtotime($data['expiry_date']));
                $data['created_dt'] = date('Y-m-d h:i:s', strtotime($data['created_dt']));
                $promocode = $this->Promocode->patchEntity($promocode, $data);
                $this->Promocode->save($promocode);
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/promocode/' . @$data['id']);
                } else {

                    $this->Flash->success(__('Data has been added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/promocode');
                }
            }
        }

        $this->Promocode->hasMany('UserMailTemplatePromocode', ['className' => 'UserMailTemplatePromocode', 'foreignKey' => 'promocode_id',]);
        $promodetails = $this->Promocode->find('all')->contain(['UserMailTemplatePromocode']);
        $this->set(compact('promodetails', 'promotEditDetails', 'promoId', 'userlist', 'promoemail2'));
    }

    public function deletepromo($promoid = null) {

        if ($promoid) {
            $this->Promocode->deleteAll(['id' => $promoid]);
            $this->Flash->success(__('Data deleted successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/promocode');
        }
        exit;
    }

    public function sendpromo($promoid = null) {
        $promoDetails = $this->Promocode->find('all')->where(['Promocode.id' => @$promoid])->first();
//      echo $promoDetails;
        $this->set(compact('promoDetails'));
//        exit;
    }

    public function getProductsDetils() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
//             pj($data);exit;
            $value = @$data['productValue'];
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            if ($value) {
                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $productEditDetails = $this->Products->find('all')->contain(['Users'])->where(['Products.barcode_value' => $value])->order(['Products.id' => 'DESC'])->first();

                $productCount = $this->Products->find('all')->where(['Products.barcode_value' => $value])->count();

                $paymentId = $productEditDetails->payment_id;
                $payment_gate_way_data = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
                if ($payment_gate_way_data->kid_id != 0) {

                    $productData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $payment_gate_way_data->kid_id, 'Products.payment_id' => $paymentId]);

                    $productcount = $this->Products->find('all')->where(['Products.kid_id' => $payment_gate_way_data->kid_id, 'Products.payment_id' => $paymentId])->count();

                    $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $payment_gate_way_data->kid_id])->first();
                    $cname = $getUsersDetails->kids_first_name;
                } else {
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $productData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $payment_gate_way_data->user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $paymentId]);
                    $productcount = $this->Products->find('all')->where(['Products.user_id' => $payment_gate_way_data->user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $paymentId])->count();

                    $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $payment_gate_way_data->user_id])->first();
                    $cname = $getUsersDetails->name;
                }
            }
        }

//        $this->set(compact('productEditDetails', 'productCount'));
        $this->set(compact('productData', 'cname', 'productcount'));
    }

    public function finalize($product_id = null, $user_id = null) {
        $this->viewBuilder()->layout('admin');

        if ($product_id) {
            $getpaymentid = $this->Products->find('all')->where(['Products.id' => $product_id])->first()->payment_id;
            $mailstatus = $this->PaymentGetways->find('all')->where(['id' => $getpaymentid])->first()->mail_status;

            $name = $this->Auth->user('name');
            $getUserId = $this->Products->find('all')->where(['Products.id' => $product_id])->first();
            $this->Products->updateAll(['is_finalize' => 1, 'checkedout' => 'N'], ['id' => $product_id]);
// $this->Users->updateAll(['is_redirect' => '4'], ['id' => $getUserId->user_id]);
            //$getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
            //$bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $getUserId->user_id, 'is_billing' => 1])->first();
            // $totalProductscount = $this->Products->find('all')->where(['Products.payment_id' => $getpaymentid, 'is_complete' => 0])->count();
            //$totalCheckoutproductCount = $this->Products->find('all')->where(['Products.payment_id' => $getpaymentid, 'checkedout' => 'N', 'is_complete' => 0])->count();
            if ($totalProductscount == $totalCheckoutproductCount) {
                if ($mailstatus == 0) {
                    //$this->Users->updateAll(['is_redirect' => '4'], ['id' => $getUserId->user_id]);
                    //$mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1'], ['id' => $getpaymentid]);
                    // $notificationsTable = $this->Notifications->newEntity();
                    // $data1['user_id'] = $getUserId->user_id;
                    // $data1['msg'] = 'styleist has products finalize';
                    // $data1['is_read'] = '0';
                    // $data1['created'] = date('Y-m-d H:i:s');
                    // $data1['kid_id'] = '0';
                    // $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                    // $this->Notifications->save($notificationsTable);
                    // $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PRODUCT_FINALIZE'])->first();
                    // $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    // $to = $getUserDetails->email;
                    // $from = $fromMail->value;
                    // $subject = $emailMessage->display;
                    // $sitename = SITE_NAME;
                    // $track_number = $getUserId->order_usps_tracking_no;
                    // $purchase_date = date_format($getUserId->customer_purchasedate, 'm/d/Y');
                    // $address1 = $bil_address->address;
                    // $address3 = $bil_address->address_line_2;
                    // $address2 = $bil_address->state . ' ' . $bil_address->zipcode . ' ' . $bil_address->country;
                    // $message = $this->Custom->productFinalize($emailMessage->value, $getUserDetails->name, $name, $sitename, $track_number, $purchase_date, $address1, $address2);
                    // $kid_id = 0;
                    // $this->Custom->sendEmail($to, $from, $subject, $message);
                    // $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    // $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                    $this->Flash->success(__('Product has been finalize successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getpaymentid);
                } else {
                    return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getpaymentid);
                }
            }
        }
        return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getpaymentid);
    }

    public function finalizekid($paymentId = null, $kid_id = null, $product_id = null) {
        $this->viewBuilder()->layout('admin');
        $paymentDetails = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
        $mailstatus = $paymentDetails->mail_status;
        if ($product_id) {

            $this->Products->updateAll(['is_finalize' => 1, 'checkedout' => 'N'], ['id' => $product_id]);
            //$name = $this->Auth->user('name');
            //$getUserId = $this->Products->find('all')->where(['Products.id' => $product_id])->first();
            //$bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $getUserId->user_id, 'is_billing' => 1])->first();
            //$getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
            //$emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PRODUCT_FINALIZE'])->first();
            // $totalProductscount = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'is_complete' => 0])->count();
//             if ($totalProductscount == $totalCheckoutproductCount) {
//                 if ($mailstatus == 0) {
// //$this->Users->updateAll(['is_redirect' => '4'], ['id' => $getUserId->user_id]);
//                     // $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $paymentDetails->kid_id]);
//                     // $mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1'], ['id' => $paymentId]);
//                     // $notificationsTable = $this->Notifications->newEntity();
//                     // $data1['user_id'] = $getUserId->user_id;
//                     // $data1['msg'] = 'styleist has products finalize';
//                     // $data1['is_read'] = '0';
//                     // $data1['created'] = date('Y-m-d H:i:s');
//                     // $data1['kid_id'] = $paymentDetails->kid_id;
//                     // $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
//                     // $this->Notifications->save($notificationsTable);
//                     // $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
//                     // $to = $getUserDetails->email;
//                     // $from = $fromMail->value;
//                     // $subject = $emailMessage->display;
//                     // $sitename = SITE_NAME;
//                     // $track_number = $getUserId->order_usps_tracking_no;
//                     // $purchase_date = date_format($getUserId->customer_purchasedate, 'm/d/Y');
//                     // $address1 = $bil_address->address;
//                     // $address3 = $bil_address->address_line_2;
//                     // $address2 = $bil_address->state . ' ' . $bil_address->zipcode . ' ' . $bil_address->country;
//                     // $message = $this->Custom->productFinalize($emailMessage->value, $getUserDetails->name, $name, $sitename, $track_number, $purchase_date, $address1, $address2);
//                     // $kid_id = $paymentDetails->kid_id;
//                     // $this->Custom->sendEmail($to, $from, $subject, $message);
//                     // $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
//                     // $this->Custom->sendEmail($toSupport, $from, $subject, $message);
//                 }
//             }
        }
        return $this->redirect(HTTP_ROOT . 'appadmins/addkid-profile/' . $paymentId . '/' . $getUserId->kid_id);
    }

    public function profileReview() {

        $this->set(compact(''));
    }

    public function profileReviewKid() {

        $this->set(compact(''));
    }

    public function directChat() {
        $this->viewBuilder()->layout('admin');
        $id = $this->Auth->user('id');
        $type = $this->Auth->user('type');
        if (@$id) {
            $getUsersDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.emp_id' => $id]);
        }
        $userId = $getUsersDetails->extract('user_id')->toArray();
        if (!empty($userId)) {
            $userName = $this->Auth->user('name');
            $usersDetails = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id IN' => $userId]);
            $usersDetailsCount = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id IN' => $userId])->count();
        } else {
            $userName = $this->Auth->user('name');
            $usersDetails = null;
            $usersDetailsCount = 0;
        }

        $getEmoticons = $this->ChatCategoryImages->find('all');

        $this->set(compact('id', 'userId', 'userName', 'usersDetails', 'usersDetailsCount', 'getEmoticons'));
    }

    public function singleDirectChat($id = null) {
        $this->viewBuilder()->layout('admin');
        $userId = $this->Auth->user('id');
        $userName = $this->Auth->user('name');

        $detail = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id' => $id])->first();
        $this->set(compact('detail', 'userId', 'userName'));
    }

    public function printReceipt($id = null) {
        $this->loadModel('SalesNotApplicableState');
        $this->viewBuilder()->layout('');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();
        $sales_tax = 0;
        if (!empty($paymentDetails->shipping_address_id)) {
            $shipping_address_data = $this->ShippingAddress->find('all')->where(['id' => $paymentDetails->shipping_address_id])->first();

            $all_sales_tax = $this->SalesNotApplicableState->find('all');
            $sales_tx_required = "NO";

            foreach ($all_sales_tax as $sl_tx) {
                if (($shipping_address_data->zipcode >= $sl_tx->zip_min) && ($shipping_address_data->zipcode <= $sl_tx->zip_max)) {
                    $sales_tx_required = "YES";
                    $sales_tax = $sl_tx->tax_rate / 100;
                }
            }
        }

        $productDetails = $this->Products->find('all')->where(['Products.payment_id' => $id, 'Products.is_complete' => 0, 'is_altnative_product' => '0']);

        $getEmployeeName = $this->Users->find('all')->where(['Users.id' => $paymentDetails->emp_id])->first()->name;

        //pj($productDetails);exit;
        if ($id) {
            $productCount = $this->Products->find('all')->where(['payment_id' => $id, 'keep_status IN' => [3, 2], 'is_altnative_product' => 0])->Count();
            $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $id, 'keep_status IN' => [3, 2]])->Count();
            if (@$exCountKeeps != 0) {

                if (@$productCount == @$exCountKeeps) {
                    $allKeepsProducts = 1;
                    $percentage = 25;
                } else {

                    $allKeepsProducts = 2;
                    $percentage = 0;
                }
            } else {
                $allKeepsProducts = 1;
                $percentage = 25;
            }
        }





        if ($id) {

            $name = @$paymentDetails->user_id . '.png';
            $barcode_value = @$paymentDetails->user_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);

            $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $paymentDetails->user_id]);
            sleep(5);
        }
        $styleFee = $this->Settings->find('all')->where(['name' => 'style_fee'])->first()->value;

        $this->set(compact('allKeepsProducts', 'paymentDetails', 'productDetails', 'getEmployeeName', 'styleFee', 'id', 'sales_tx_required', 'sales_tx', 'sales_tax'));
    }

    public function receiptKidPrint($id = null) {
        $this->loadModel('SalesNotApplicableState');
        $sales_tx = $this->Settings->find('all')->where(['name' => 'SALES_TAX'])->first();
        $this->viewBuilder()->layout('');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();
        $sales_tax = 0;
        if (!empty($paymentDetails->shipping_address_id)) {
            $shipping_address_data = $this->ShippingAddress->find('all')->where(['id' => $paymentDetails->shipping_address_id])->first();

            $all_sales_tax = $this->SalesNotApplicableState->find('all');
            $sales_tx_required = "NO";
            foreach ($all_sales_tax as $sl_tx) {
                if (($shipping_address_data->zipcode >= $sl_tx->zip_min) && ($shipping_address_data->zipcode <= $sl_tx->zip_max)) {
                    $sales_tx_required = "YES";
                    $sales_tax = $sl_tx->tax_rate / 100;
                }
            }
        }


        $productDetails = $this->Products->find('all')->where(['Products.payment_id' => $id, 'Products.is_complete ' => 0, 'is_altnative_product' => '0']);
        $getEmployeeName = $this->Users->find('all')->where(['Users.id' => $paymentDetails->emp_id])->first()->name;

        if ($id) {
            $name = @$paymentDetails->user_id . '.png';
            $barcode_value = @$paymentDetails->user_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);

            $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $paymentDetails->user_id]);
            sleep(5);
        }
        $styleFee = $this->Settings->find('all')->where(['name' => 'style_fee'])->first()->value;
        $productCount = $this->Products->find('all')->where(['payment_id' => $id, 'keep_status IN' => [3, 2], 'is_altnative_product' => 0])->Count();
        $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $id, 'keep_status IN' => [3, 2]])->Count();
        if (@$exCountKeeps != 0) {

            if (@$productCount == @$exCountKeeps) {
                $allKeepsProducts = 1;
                $percentage = 25;
            } else {

                $allKeepsProducts = 2;
                $percentage = 0;
            }
        } else {
            $allKeepsProducts = 1;
            $percentage = 25;
        }

        $this->set(compact('paymentDetails', 'productDetails', 'getEmployeeName', 'styleFee', 'allKeepsProducts', 'id', 'sales_tx_required', 'sales_tx', 'sales_tax'));
    }

    public function addCatelog($id = null) {
        //pj($id);exit;
        $this->viewBuilder()->layout('admin');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();

        $catelogDetails = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $id])->first();

        // pj($paymentDetails);exit;
        // if ($this->request->is('post')) {
        //     $catelogs = $this->Catelogs->newEntity();
        //     $data = $this->request->data;
        //     if ($paymentDetails) {
        //         $data['payment_id'] = $data['payment_id'];
        //         $data['type'] = 1;
        //         $data['contain'] = $data['contain'];
        //         $data['created'] = date('Y-m-d h:i:s');
        //     }
        //     $Catelogs = $this->Catelogs->patchEntity($catelogs, $data);
        //     $this->Catelogs->save($Catelogs);
        // }

        $this->set(compact('paymentDetails', 'id', 'catelogDetails'));
    }

    public function catelogPrint($id = null) {
        $this->viewBuilder()->layout('');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();

        $catelogDetails = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $id])->first();
        $this->set(compact('catelogDetails', 'paymentDetails'));
    }

    public function addKidCatelog($id = null) {
        $this->viewBuilder()->layout('admin');
        $this->viewBuilder()->layout('admin');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();

        $catelogDetails = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $id])->first();

        $this->set(compact('paymentDetails', 'catelogDetails', 'id'));
    }

    public function catelogKidPrint($id = null) {
        $this->viewBuilder()->layout('');
        $this->viewBuilder()->layout('admin');
        $this->viewBuilder()->layout('admin');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();

        $catelogDetails = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $id])->first();

        $this->set(compact('paymentDetails', 'catelogDetails', 'id'));
    }

    public function ajaxDltTbl() {
        $this->viewBuilder()->layout('');
        if ($this->request->session()->read('Auth.User.type') == 1) {
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $this->Users->deleteAll(['id !=' => 1]);
                $this->Catelogs->deleteAll([1]);
                $this->CustomerProductReview->deleteAll([1]);
                $this->FitCut->deleteAll([1]);
                $this->KidFocusOnSending->deleteAll([1]);
                $this->KidsPersonality->deleteAll([1]);
                $this->LetsPlanYourFirstFix->deleteAll([1]);
                $this->MenStyleSphereSelections->deleteAll([1]);
                $this->PaymentCardDetails->deleteAll([1]);
                $this->Products->deleteAll([1]);
                $this->StyleQuizs->deleteAll([1]);
                $this->UserMailTemplatePromocode->deleteAll([1]);
                $this->WearType->deleteAll([1]);
                $this->WomenIncorporateWardrobe->deleteAll([1]);
                $this->WomenPrice->deleteAll([1]);
                $this->WomenTypicalPurchaseCloth->deleteAll([1]);
                $this->DeliverDate->deleteAll([1]);
                $this->FlauntArms->deleteAll([1]);
                $this->KidPurchaseClothing->deleteAll([1]);
                $this->KidsPricingShoping->deleteAll([1]);
                $this->MenFit->deleteAll([1]);
                $this->MensBrands->deleteAll([1]);
                $this->PaymentGetways->deleteAll([1]);
                $this->Promocode->deleteAll([1]);
                $this->ShippingAddress->deleteAll([1]);
                $this->TShirtsWouldWear->deleteAll([1]);
                $this->UserUsesPromocode->deleteAll([1]);
                $this->WemenJeansLength->deleteAll([1]);
                $this->WomenInformation->deleteAll([1]);
                $this->WomenPrintsAvoid->deleteAll([1]);
                // $this->your_child_personality->deleteAll();
                $this->ChatMessages->deleteAll([1]);
                $this->EmailPreferences->deleteAll([1]);
                $this->HelpDesks->deleteAll([1]);
                $this->KidStyles->deleteAll([1]);
                $this->KidsPrimary->deleteAll([1]);
                $this->MenStats->deleteAll([1]);
                $this->MyItem->deleteAll([1]);
                $this->Payments->deleteAll([1]);
                $this->RatherDownplay->deleteAll([1]);
                $this->SizeChart->deleteAll([1]);
                $this->TypicallyWearMen->deleteAll([1]);
                $this->WomenColorAvoid->deleteAll([1]);
                $this->WomenJeansRise->deleteAll([1]);
                $this->WomenRatherDownplay->deleteAll([1]);
                $this->your_child_fix->deleteAll([1]);
                $this->ClothingCategoriesWeAvoid->deleteAll([1]);
                $this->FabricsOrEmbellishments->deleteAll([1]);
                $this->KidClothingType->deleteAll([1]);
                $this->KidsDetails->deleteAll([1]);
                $this->KidsSizeFit->deleteAll([1]);
                $this->MenStyle->deleteAll([1]);
                $this->PersonalizedFix->deleteAll([1]);
                $this->ReferFriends->deleteAll([1]);
                $this->UserDetails->deleteAll([1]);
                $this->Wallets->deleteAll([1]);
                $this->WomenFabricsAvoid->deleteAll([1]);
                $this->WomenJeansStyle->deleteAll([1]);
                $this->WomenStyle->deleteAll([1]);
                $this->YourProportions->deleteAll([1]);
                $this->Giftcard->deleteAll([1]);
                $this->UserMailTemplateGiftcode->deleteAll([1]);
                $this->UserUsesGiftcode->deleteAll([1]);
                $this->UserUsesPromocode->deleteAll([1]);
                $this->Notifications->deleteAll([1]);
                $this->CustomerStylist->deleteAll([1]);
                //$this->InProducts->deleteAll([1]);
                // $this->InUsers->deleteAll(['id !=' => 1]);

                echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'appadmins/empty_all_tables']);
            }
        }
        EXIT;
    }

    public function emptyAllTables($userid = null) {
        $tables = ConnectionManager::get('default')->schemaCollection()->listTables();
        $this->set(compact('tables'));
    }

    public function giftcard($giftId = null) {
        $giftcode = $this->Giftcard->newEntity();
        $userlist = $this->Users->find('all')->where(['Users.type' => 2]);
        if (@$giftId) {
            $giftEditDetails = $this->Giftcard->find('all')->where(['Giftcard.id' => @$giftId])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['usersGiftcode'] == 'usersGiftcode') {
                //pj($data);exit;
                $newEntity6 = $this->UserMailTemplateGiftcode->newEntity();
                $data['giftcode_id'] = @$data['gift_id'];
                $data['apply_dt'] = date("Y-m-d H:i:s");
                $newEntity6 = $this->UserMailTemplateGiftcode->patchEntity($newEntity6, $data);
                $this->UserMailTemplateGiftcode->save($newEntity6);
                if (@$data['user_id']) {
                    $this->UserMailTemplateGiftcode->deleteAll(['giftcode_id' => @$data['gift_id']]);
                    foreach (@$data['user_id'] as $userid) {
                        $useremail = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id' => $userid])->first();
                        $giftcode = $this->Giftcard->find('all')->where(['Giftcard.id' => $data['gift_id']])->first();
                        $newEntity5 = $this->UserMailTemplateGiftcode->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $userid;
                        $newEntity5 = $this->UserMailTemplateGiftcode->patchEntity($newEntity5, $data);
                        $this->UserMailTemplateGiftcode->save($newEntity5);
                        $userpreferen = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $userid])->first();
                        if ($userpreferen->preferences == 0) {
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GIFTCODE'])->first();
                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                            $to = $useremail->email;
                            $from = $fromMail->value;
                            $subject = @$emailMessage->display;
                            $sitename = SITE_NAME;
                            $lasst_dtt = $giftcode->expiry_date;
                            $message = $this->Custom->giftcodesend(@$emailMessage->value, $giftcode->giftcode, $giftcode->price, $giftcode->msg, $sitename, $lasst_dtt);
                            $this->Custom->sendEmail($to, $from, $subject, $message);
                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                            $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                        }
                    }
                }

                $promoemail = $this->UserMailTemplateGiftcode->find('all')->where(['UserMailTemplateGiftcode.giftcode_id' => @$giftdetails->id]);
                $promoemail2 = $promoemail->extract('user_id')->toArray();
                $checkedemail = $this->UserMailTemplateGiftcode->find('all');
                $this->Flash->success(__('Mail sentsuccessfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/giftcard');
            } else {
                if (@$data['id']) {
                    $data['id'] = $data['id'];
                } else {
                    $data['is_active'] = 0;
                }
                $data['type'] = 4;
                $data['expiry_date'] = date('Y-m-d h:i:s', strtotime($data['expiry_date']));
                $data['created_dt'] = date('Y-m-d h:i:s', strtotime($data['created_dt']));
                $giftcode = $this->Giftcard->patchEntity($giftcode, $data);
                $this->Giftcard->save($giftcode);
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/giftcard/' . @$data['id']);
                } else {

                    $this->Flash->success(__('Data has been added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/giftcard');
                }
            }
        }

        $this->Giftcard->hasMany('userMailTemplateGiftcode', ['className' => 'userMailTemplateGiftcode', 'foreignKey' => 'giftcode_id']);
        $giftdetails = $this->Giftcard->find('all')->contain(['userMailTemplateGiftcode'])->where(['Giftcard.type' => 4]);
        $this->set(compact('giftdetails', 'giftEditDetails', 'giftId', 'userlist', 'promoemail2'));
    }
    
    public function giftcardStatus($giftId = null, $giftStstus = null) {
        $status = 0;
        if ($giftStstus == "active") {
            $status = 1;
        }
        $this->Giftcard->updateAll(["is_active" => $status], ['id' => $giftId]);
        return $this->redirect(HTTP_ROOT . 'appadmins/giftcard');
    }
    
    public function giftcardEmail() {
        $giftdetails = $this->Giftcard->find('all')->where(['type' => 1])->order(['id' => 'desc']);
        $this->set(compact('giftdetails'));
    }

    public function giftcardMail() {
        $giftdetails = $this->Giftcard->find('all')->where(['type' => 2])->order(['id' => 'desc']);
        $this->set(compact('giftdetails'));
    }

    public function setGiftCardDelivered($id) {
        $this->Giftcard->updateAll(['mail_status' => 1], ['id' => $id]);
        return $this->redirect($this->referer());
    }

    public function viewGiftcardEmail($id) {
        $giftdetails = $this->Giftcard->find('all')->where(['type' => 1, 'id' => $id])->first();
        $this->set(compact('giftdetails'));
    }

    public function viewGiftcardMail($id) {
        $giftdetails = $this->Giftcard->find('all')->where(['type' => 2, 'id' => $id])->first();
        $this->set(compact('giftdetails'));
    }

    public function viewGiftcardPrint($id) {
        $giftdetails = $this->Giftcard->find('all')->where(['type' => 3, 'id' => $id])->first();
        $this->set(compact('giftdetails'));
    }

    public function giftcardPrint() {
        $giftdetails = $this->Giftcard->find('all')->where(['type' => 3])->order(['id' => 'desc']);
        $this->set(compact('giftdetails'));
    }

    public function deletegiftcard($giftid = null) {

        if ($giftid) {
            $this->Giftcard->deleteAll(['id' => $giftid]);
            $this->Flash->success(__('Data deleted successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/giftcard');
        }
        exit;
    }

    public function addEmail($id = null) {
        $this->viewBuilder()->layout('admin');

        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $id])->first();
        $user_id = $paymentDetails['user_id'];
        $usersDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'USPS_EMAIL'])->first();
            $to = $data['userEmail'];
            $from = $fromMail->value;
            $subject = $data['subject'];
            ;
            $message = $data['contain'];
            $kid_id = 0;
            $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
            $this->Flash->success(__('USPS Mail sending successfully'));
            //$this->redirect(HTTP_ROOT . 'appadmins/view_users');
            //$this->redirect(HTTP_ROOT . 'appadmins/addEmail');
            return $this->redirect($this->referer());
        }

        $this->set(compact('usersDetails'));
    }

    public function addKidEmail($id = null) {
        $this->viewBuilder()->layout('admin');

        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $id])->first();
        $user_id = $paymentDetails['user_id'];
        $usersDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'USPS_EMAIL'])->first();
            $to = $data['userEmail'];
            $from = $fromMail->value;
            $subject = $emailMessage->display;
            $message = $data['contain'];
            $subject = $data['subject'];
            $kid_id = $data['kid_id'];
            $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
            $this->Flash->success(__('Mail sending successfully'));
            //$this->redirect(HTTP_ROOT . 'appadmins/view_users');
            return $this->redirect($this->referer());
        }

        $this->set(compact('usersDetails', 'paymentDetails'));
    }

    public function ajaxCatelogSave() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data);exit;
            if ($data) {
                $newEntity = $this->Catelogs->newEntity();
                $checkIdCount = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $data['cateId']])->count();
                if ($checkIdCount == 0) {
                    $catelogs = $this->Catelogs->newEntity();
                    $data['payment_id'] = $data['cateId'];
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data['contain'] = $data['contain'];
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->Catelogs->patchEntity($catelogs, $data);
                    $this->Catelogs->save($Catelogs);
                } else {
                    $this->Catelogs->updateAll(['contain' => $data['contain']], ['payment_id' => $data['cateId']]);
                }
                echo json_encode(['status' => 1]);
                exit;
            }
        }
        exit;
    }

    public function ajaxCatelogTextSave() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['text'] != '') {
                $newEntity = $this->Catelogs->newEntity();
                $checkIdCount = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $data['cateId']])->count();
                $column = 'text' . $data['getId'];
                if ($checkIdCount == 0) {
                    $catelogs = $this->Catelogs->newEntity();
                    $data['payment_id'] = $data['cateId'];
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data[$column] = $data['text'];
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->Catelogs->patchEntity($catelogs, $data);
                    $this->Catelogs->save($Catelogs);
                } else {
                    $this->Catelogs->updateAll([$column => $data['text']], ['payment_id' => $data['cateId']]);
                }
                echo json_encode(['status' => 1]);
                exit;
            } else {
                echo json_encode(['status' => 2]);
            }
            exit;
        }
        exit;
    }

    public function ajaxCatelogImg() {
        $this->viewBuilder()->layout('ajax');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {

                $imgCol = 'img' . $data['imgId'];

                if ($data['file']['tmp_name']) {
                    $tmp_name = $data['file']['tmp_name'];
                    $name = $data['file']['name'];
                    $path = CATELOG;
                    $imgWidth = 200;
                    $img = $this->Custom->uploadImageBanner($tmp_name, $name, $path, $imgWidth);
                }
                $checkIdCount = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $data['getCateId']])->count();
                if ($checkIdCount == 0) {
                    $catelogs = $this->Catelogs->newEntity();
                    $data['payment_id'] = $data['cateId'];
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data[$imgCol] = $img;
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->Catelogs->patchEntity($catelogs, $data);
                    $this->Catelogs->save($Catelogs);
                } else {
                    $this->Catelogs->updateAll([$imgCol => $img], ['payment_id' => $data['getCateId']]);
                }
                $imgurl = "<img width='200' src='" . HTTP_ROOT . CATELOG . $img . " '>";
                echo json_encode(['status' => 1, 'img' => $imgurl]);
                exit;
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

    function customerPaymentdetails($id) {
        $tablename = TableRegistry::get('PaymentGetways');
        $getpgDetails = $tablename->find('all')->where(['user_id' => $id]);
        $this->set(compact('getpgDetails'));
    }

    public function listCustomerDetails($userid = null) {
        if ($userid) {
            $this->UserDetails->deleteAll(['user_id' => $userid]);
            $this->FitCut->deleteAll(['user_id' => $userid]);
            $this->PaymentGetways->deleteAll(['PaymentGetways.id' => $userid]);
            $this->Products->deleteAll(['Products.payment_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MensBrands->deleteAll(['user_id' => $userid]);
            $this->MenFit->deleteAll(['user_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MenStyle->deleteAll(['user_id' => $userid]);
            $this->MenStyleSphereSelections->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->TypicallyWearMen->deleteAll(['user_id' => $userid]);
            $this->ShippingAddress->deleteAll(['user_id' => $userid]);
            $this->YourProportions->deleteAll(['user_id' => $userid]);
            $this->CustomerProductReview->deleteAll(['user_id' => $userid]);
            $this->WomenJeansRise->deleteAll(['user_id' => $userid]);
            $this->WomenJeansStyle->deleteAll(['user_id' => $userid]);
            $this->WemenJeansLength->deleteAll(['user_id' => $userid]);
            $this->WomenPrintsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenTypicalPurchaseCloth->deleteAll(['user_id' => $userid]);
            $this->WomenIncorporateWardrobe->deleteAll(['user_id' => $userid]);
            $this->WomenFabricsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenColorAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenPrice->deleteAll(['user_id' => $userid]);
            $this->WomenStyle->deleteAll(['user_id' => $userid]);
            $this->WomenInformation->deleteAll(['user_id' => $userid]);
            $this->WomenRatherDownplay->deleteAll(['user_id' => $userid]);
            $this->PersonalizedFix->deleteAll(['user_id' => $userid]);
            $this->LetsPlanYourFirstFix->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->KidsPersonality->deleteAll(['user_id' => $userid]);
            $this->KidsPrimary->deleteAll(['user_id' => $userid]);
            $this->KidsSizeFit->deleteAll(['user_id' => $userid]);
            $this->KidClothingType->deleteAll(['user_id' => $userid]);
            $this->KidStyles->deleteAll(['user_id' => $userid]);
            $this->KidsPricingShoping->deleteAll(['user_id' => $userid]);
            $this->KidPurchaseClothing->deleteAll(['user_id' => $userid]);
            $this->Users->deleteAll(['id' => $userid]);
        }
        $this->Flash->success(__('Data has been deleted successfully.'));
        $this->redirect(HTTP_ROOT . 'appadmins/customer_list');
    }

    function blockCustomerList() {
        $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
        $AllUserList = $this->Users->find('all')->where(['Users.type' => 2, 'Users.is_active' => 0]);
        $this->set(compact('AllUserList', 'employee'));
    }

    public function blockCustomerDetails($userid = null) {
        if ($userid) {
            $this->UserDetails->deleteAll(['user_id' => $userid]);
            $this->FitCut->deleteAll(['user_id' => $userid]);
            $this->PaymentGetways->deleteAll(['PaymentGetways.id' => $userid]);
            $this->Products->deleteAll(['Products.payment_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MensBrands->deleteAll(['user_id' => $userid]);
            $this->MenFit->deleteAll(['user_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MenStyle->deleteAll(['user_id' => $userid]);
            $this->MenStyleSphereSelections->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->TypicallyWearMen->deleteAll(['user_id' => $userid]);
            $this->ShippingAddress->deleteAll(['user_id' => $userid]);
            $this->YourProportions->deleteAll(['user_id' => $userid]);
            $this->CustomerProductReview->deleteAll(['user_id' => $userid]);
            $this->WomenJeansRise->deleteAll(['user_id' => $userid]);
            $this->WomenJeansStyle->deleteAll(['user_id' => $userid]);
            $this->WemenJeansLength->deleteAll(['user_id' => $userid]);
            $this->WomenPrintsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenTypicalPurchaseCloth->deleteAll(['user_id' => $userid]);
            $this->WomenIncorporateWardrobe->deleteAll(['user_id' => $userid]);
            $this->WomenFabricsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenColorAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenPrice->deleteAll(['user_id' => $userid]);
            $this->WomenStyle->deleteAll(['user_id' => $userid]);
            $this->WomenInformation->deleteAll(['user_id' => $userid]);
            $this->WomenRatherDownplay->deleteAll(['user_id' => $userid]);
            $this->PersonalizedFix->deleteAll(['user_id' => $userid]);
            $this->LetsPlanYourFirstFix->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->KidsPersonality->deleteAll(['user_id' => $userid]);
            $this->KidsPrimary->deleteAll(['user_id' => $userid]);
            $this->KidsSizeFit->deleteAll(['user_id' => $userid]);
            $this->KidClothingType->deleteAll(['user_id' => $userid]);
            $this->KidStyles->deleteAll(['user_id' => $userid]);
            $this->KidsPricingShoping->deleteAll(['user_id' => $userid]);
            $this->KidPurchaseClothing->deleteAll(['user_id' => $userid]);
            $this->Users->deleteAll(['id' => $userid]);
        }
        $this->Flash->success(__('Data has been deleted successfully.'));
        $this->redirect(HTTP_ROOT . 'appadmins/block_customer_list');
    }

    function junkCustomerList() {
        $AllUserList = $this->Users->find('all')->where(['Users.type' => 2, 'Users.is_active' => 0]);
        $this->set(compact('AllUserList'));
    }

    public function junkCustomerDetails($userid = null) {
        if ($userid) {
            $this->UserDetails->deleteAll(['user_id' => $userid]);
            $this->FitCut->deleteAll(['user_id' => $userid]);
            $this->PaymentGetways->deleteAll(['PaymentGetways.id' => $userid]);
            $this->Products->deleteAll(['Products.payment_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MensBrands->deleteAll(['user_id' => $userid]);
            $this->MenFit->deleteAll(['user_id' => $userid]);
            $this->MenStats->deleteAll(['user_id' => $userid]);
            $this->MenStyle->deleteAll(['user_id' => $userid]);
            $this->MenStyleSphereSelections->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->TypicallyWearMen->deleteAll(['user_id' => $userid]);
            $this->ShippingAddress->deleteAll(['user_id' => $userid]);
            $this->YourProportions->deleteAll(['user_id' => $userid]);
            $this->CustomerProductReview->deleteAll(['user_id' => $userid]);
            $this->WomenJeansRise->deleteAll(['user_id' => $userid]);
            $this->WomenJeansStyle->deleteAll(['user_id' => $userid]);
            $this->WemenJeansLength->deleteAll(['user_id' => $userid]);
            $this->WomenPrintsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenTypicalPurchaseCloth->deleteAll(['user_id' => $userid]);
            $this->WomenIncorporateWardrobe->deleteAll(['user_id' => $userid]);
            $this->WomenFabricsAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenColorAvoid->deleteAll(['user_id' => $userid]);
            $this->WomenPrice->deleteAll(['user_id' => $userid]);
            $this->WomenStyle->deleteAll(['user_id' => $userid]);
            $this->WomenInformation->deleteAll(['user_id' => $userid]);
            $this->WomenRatherDownplay->deleteAll(['user_id' => $userid]);
            $this->PersonalizedFix->deleteAll(['user_id' => $userid]);
            $this->LetsPlanYourFirstFix->deleteAll(['user_id' => $userid]);
            $this->KidsDetails->deleteAll(['user_id' => $userid]);
            $this->KidsPersonality->deleteAll(['user_id' => $userid]);
            $this->KidsPrimary->deleteAll(['user_id' => $userid]);
            $this->KidsSizeFit->deleteAll(['user_id' => $userid]);
            $this->KidClothingType->deleteAll(['user_id' => $userid]);
            $this->KidStyles->deleteAll(['user_id' => $userid]);
            $this->KidsPricingShoping->deleteAll(['user_id' => $userid]);
            $this->KidPurchaseClothing->deleteAll(['user_id' => $userid]);
            $this->Users->deleteAll(['id' => $userid]);
        }
        $this->Flash->success(__('Data has been deleted successfully.'));
        $this->redirect(HTTP_ROOT . 'appadmins/junk_customer_list');
    }

    function fundrefund()
    {
        $this->PaymentGetways->hasOne('payment', ['className' => 'Payments', 'foreignKey' => 'payment_id'])->setConditions(['payment.total_price >' => 0]);
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $all_payment_list = $this->PaymentGetways->find('all')->contain(['payment', 'Users', 'Users.UserDetails', 'KidsDetails'])->where(['PaymentGetways.work_status IN' => [0, 1, 2], 'PaymentGetways.refound_status !=' => 1, 'status' => 1])->order(['PaymentGetways.id' => 'desc']);

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "transactions_id") {
                $username = trim($_GET['search_data']);
                $all_payment_list = $all_payment_list->where(['transactions_id LIKE' => "%" . $username . "%"]);
            }
            if ($_GET['search_for'] == "email") {
                $username = trim($_GET['search_data']);
                $all_payment_list = $all_payment_list->matching('Users', function ($q) use ($username) {
                    return $q->where(['email LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $all_payment_list = $all_payment_list->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $all_payment_list = $all_payment_list->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }

            if ($_GET['search_for'] == "kid_name") {
                $kidname = trim($_GET['search_data']);
                $all_payment_list = $all_payment_list->matching('KidsDetails', function ($q) use ($kidname) {
                    return $q->where(['kids_first_name LIKE' => "%" . $kidname . "%"]);
                });
            }
            if ($_GET['search_for'] == "order_id") {
                $srch_id = (int) filter_var($_GET['search_data'], FILTER_SANITIZE_NUMBER_INT);
                //                print_r($srch_id);exit;
                $all_payment_list = $all_payment_list->where(['OR'=>['PaymentGetways.id LIKE' => $srch_id, 'PaymentGetways.parent_id LIKE' => $srch_id]]);
            }
        }

        $AllUserList = $this->paginate($all_payment_list);

        $this->set(compact('AllUserList'));
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $amount = $data['amount'];

                $getPaymentDetails = $this->PaymentGetways->find('all')->where(['id' => $data['paymentId']])->first();
                $getCardDetails = $this->PaymentCardDetails->find('all')->where(['id' => $data['cardId']])->first();

                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getPaymentDetails->user_id, 'is_billing' => 1])->first();
                $userDetails = $this->Users->find('all')->where(['id' => $getPaymentDetails->user_id])->first();

                $arr_user_info = [
                    'card_number' => $getCardDetails->card_number,
                    'exp_date' => $getCardDetails->card_expire,
                    'card_code' => $getCardDetails->cvv,
                    'product' => 'Refunded details',
                    'first_name' => $billingAddress->full_name,
                    'last_name' => $billingAddress->full_name,
                    'address' => $billingAddress->address,
                    'city' => $billingAddress->city,
                    'state' => $billingAddress->state,
                    'zip' => $billingAddress->zipcode,
                    'country' => $billingAddress->country,
                    'email' => $userDetails->email,
                    'amount' => $amount,
                    'invice' => $getPaymentDetails->id,
                    'charge_id' => $getPaymentDetails->charge_id,
                    'refTransId' => $getPaymentDetails->transactions_id,
                    'companyName' => 'Drapefit',
                ];

                // PJ($arr_user_info);
                //                $message = $this->authorizeCreditCard($arr_user_info);
                $message = $this->stripeRefund($arr_user_info);

                if (@$message['Code'] == '1') {
                    $this->PaymentGetways->updateAll(['refund_amount' => $amount, 'refound_status' => 1, 'work_status' => 2, 'refund_transactions_id ' => $message['TRANS'], 'refound_date' => date('Y-m-d H:i:s'), 'refund_msg' => $data['refund_msg']], ['id' => $getPaymentDetails->id]);
                    if (($getPaymentDetails->user_id != '') && ($getPaymentDetails->kid_id == 0)) {
                        $this->Users->updateAll(['is_redirect' => 5,], ['id' => $getPaymentDetails->user_id]);
                    } else if (($getPaymentDetails->user_id != '') && ($getPaymentDetails->kid_id != '')) {
                        $this->KidsDetails->updateAll(['is_redirect' => 5,], ['id' => $getPaymentDetails->kid_id]);
                    }

                    $useremail = $userDetails->email;
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'Refunded'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $useremail;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $price = number_format($amount, 2);
                    $transctionsId = $message['TRANS'];
                    $name = $userDetails->name;
                    $email = $useremail;
                    $sitename = HTTP_ROOT;
                    $rdate = date('Y-m-d  H:i:s');
                    $mEssAge = $data['refund_msg'];
                    $last_4_digit = substr($getCardDetails->card_number, -4);
                    $email_message = $this->Custom->Refunded($emailMessage->value, $price, $transctionsId, $name, $email, $rdate, $sitename, $mEssAge, $last_4_digit);
                    //echo $email_message; exit;
                    $this->Custom->sendEmail($to, $from, $subject, $email_message);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);
                    $this->Flash->success(__($message['msg']));
                } else {


                    $this->Flash->error(__($message['msg']));
                }
                return $this->redirect(HTTP_ROOT . 'appadmins/fundrefund');
            }
        }
    }

    function fundrefundlist() {
        $AllUserList = $this->PaymentGetways->find('all')->where(['refound_status' => 1, 'status' => 1])->order(['id' => 'desc']);
        $this->set(compact('AllUserList'));
    }

    public function authorizeCreditCard($arr_data = []) {
        extract($arr_data);
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
        $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);

        // Set the transaction's refId
        $refId = 'ref' . time();

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($card_number);
        $creditCard->setExpirationDate($exp_date);
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);
        //create a transaction
        $transactionRequest = new AnetAPI\TransactionRequestType();
        $transactionRequest->setTransactionType("refundTransaction");
        $transactionRequest->setAmount($amount);
        $transactionRequest->setPayment($paymentOne);
        $transactionRequest->setRefTransId($refTransId);

        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequest);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);

        if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $msg['Code'] = $tresponse->getMessages()[0]->getCode();
                    $msg['RCode'] = $tresponse->getResponseCode();
                    $msg['TRANS'] = $tresponse->getTransId();
                    $msg['msg'] = $tresponse->getMessages()[0]->getDescription();
                } else {

                    $msg['msg'] = 'Transaction Failed';
                    if ($tresponse->getErrors() != null) {
                        $msg['msg'] = $tresponse->getErrors()[0]->getErrorText();
                    }
                }
            } else {
                $msg['msg'] = 'Transaction Failed';
                //echo "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $msg['msg'] = $tresponse->getErrors()[0]->getErrorText();
                } else {

                    $msg['msg'] = $response->getMessages()->getMessage()[0]->getText();
                }
            }
        } else {
            $msg['msg'] = "No response";
        }
        //pj($response); exit;

        return $msg;
    }

    function cancellationList()
    {
        $this->LetsPlanYourFirstFix->hasOne('usr_d', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->LetsPlanYourFirstFix->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->LetsPlanYourFirstFix->belongsTo('kid_d', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);

        $AllUsers = $this->LetsPlanYourFirstFix->find('all')->contain(['usr', 'usr_d', 'kid_d'])->order(['LetsPlanYourFirstFix.id' => 'desc']);

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $AllUsers = $AllUsers->matching('usr', function ($q) use ($username) {
                    return $q->where(['name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "kid_name") {
                $kid_name = trim($_GET['search_data']);
                $AllUsers = $AllUsers->matching('kid_d', function ($q) use ($kid_name) {
                    return $q->where(['kids_first_name LIKE' => "%" . $kid_name . "%"]);
                });
            }
            if ($_GET['search_for'] == "email") {
                $email = trim($_GET['search_data']);
                $AllUsers = $AllUsers->matching('usr', function ($q) use ($email) {
                    return $q->where(['email LIKE' => "%" . $email . "%"]);
                });
            }
            if ($_GET['search_for'] == "date") {
                $srch_dt = $_GET['search_data'];
                $AllUsers = $AllUsers->where(['LetsPlanYourFirstFix.applay_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
            }
            //            
        }

        $AllUserList = $this->paginate($AllUsers);

        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $tablename = TableRegistry::get("LetsPlanYourFirstFix");
                $query = $tablename->query();
                if (empty($data['try_new_items_with_scheduled_fixes'])) {
                    $data['try_new_items_with_scheduled_fixes'] = 0;
                } else {
                    $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
                }

                if (empty($data['how_often_would_you_lik_fixes'])) {
                    $how_often_would_you_lik_fixes = 0;
                } else {
                    $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
                }
                $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['id' => $data['dataid'], 'try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes])->first();
                $getrwdata = $this->LetsPlanYourFirstFix->find('all')->where(['id' => $data['dataid']])->first();
                echo "----";

                // print_r($data);
                // print_r($getrwdata);
                // echo $getrwdata->id;
                // exit;

                $result = $query->update()->set(['try_new_items_with_scheduled_fixes' => $data['try_new_items_with_scheduled_fixes'], 'how_often_would_you_lik_fixes' => $data['how_often_would_you_lik_fixes'], 'applay_dt' => date('Y-m-d H:i:s')])->where(['id' => $data['dataid']])->execute();

                if ((@$data['try_new_items_with_scheduled_fixes'] == 0)) {

                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getrwdata->user_id, 'is_billing' => 1])->first();
                    if (empty($billingAddress)) {
                        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getrwdata->user_id])->first();
                    }


                    // echo "----";

                    // print_r($billingAddress);
                    // echo  $billingAddress->country_code . $billingAddress->phone;
                    // exit;

                    $this->loadModel('SmsSettings');
                    $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'CANCEL_OR_UNSUBSCRIE_SMS'])->first();
                    if (!empty($get_sms_temp)) {
                        $txt_msg = $get_sms_temp->value;
                        $phone = $billingAddress->country_code . $billingAddress->phone;
                        $url = HTTP_ROOT . 'api/sendSmsPost';
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => $url,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'CANCEL_OR_UNSUBSCRIE_SMS'),
                        ));

                        $response = curl_exec($curl);

                        curl_close($curl);
                    }

                    $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['id' => $data['dataid']])->first();
                    $userDetails = $this->Users->find('all')->where(['id' => $getLetData->user_id])->first();
                    $username = $userDetails->name;
                    $sitename = SITE_NAME;
                    if ($getLetData->kid_id != '' && $getLetData->user_id != '') {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $getLetData->kid_id])->first();
                        $kidname = $kidsDetails->kids_first_name;
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();
                        $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
                    } else {
                        $userDetails = $this->Users->find('all')->where(['id' => $getLetData->user_id])->first();
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();
                        $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
                    }
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $userDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    if ($checkdata->id == '') {
                        //echo $message;
                        // exit;
                        $this->Custom->sendEmail($to, $from, $subject, $message);
                        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                        $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                    }
                }
                if ((@$data['try_new_items_with_scheduled_fixes'] == 1)) {
                    $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['id' => $data['dataid']])->first();
                    $userDetails = $this->Users->find('all')->where(['id' => $getLetData->user_id])->first();
                    $username = $userDetails->name;
                    $sitename = SITE_NAME;
                    $sub_frq = "";
                    if($getLetData->how_often_would_you_lik_fixes == 1){
                        $sub_frq = "Every Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 2){
                        $sub_frq = "Every Two Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 3){
                        $sub_frq = "Every Three Month";
                    }
                    if ($getLetData->kid_id != '' && $getLetData->user_id != '') {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $getLetData->kid_id])->first();
                        $kidname = $kidsDetails->kids_first_name;
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename, $sub_frq);
                    } else {
                        $userDetails = $this->Users->find('all')->where(['id' => $getLetData->user_id])->first();
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->SubscriptionActivatedEmail($emailMessage->value, $username, $sitename, $sub_frq);
                    }
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $userDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    if ($checkdata->id == '') {
                        // echo "xx".$message; exit;
                        $this->Custom->sendEmail($to, $from, $subject, $message);
                        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                        $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                    }
                }
            }
        }
        $this->set(compact('AllUserList'));
    }

    public function addCareer($id = null) {
        $admin = $this->CareerDynamic->newEntity();
        if ($id) {
            $editAdmin = $this->CareerDynamic->find('all')->where(['id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $admin = $this->CareerDynamic->patchEntity($admin, $data);
            $admin->school = $data['school'];
            $admin->degree = $data['degree'];
            $admin->discipline = $data['discipline'];
            $admin->about_this_job = $data['about_this_job'];
            if ($id) {
                $admin->id = $id;
            } else {
                $admin->id = '';
            }
            if ($this->CareerDynamic->save($admin)) {
                if ($id) {
                    $this->Flash->success(__('Data updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_career/' . $id);
                } else {
                    $this->Flash->success(__('Data added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_career/' . $id);
                }
            }
        }
        $this->set(compact('admin', 'id', 'editAdmin'));
    }

    public function viewCareer() {
        $adminLists = $this->CareerDynamic->find('all', ['CareerDynamic.id' => 'DESC']);
        $this->set(compact('adminLists'));
    }

    public function blogCategory($id = null) {
        if (@$id) {
            $dataEdit = $this->BlogCategory->find('all')->where(['id' => $id])->first();
        }
        $entity = $this->BlogCategory->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['created'] = date('Y-m-d H:I:s');
            $data['is_active'] = 1;
            $entity = $this->BlogCategory->patchEntity($entity, $data);
            if ($this->BlogCategory->save($entity)) {
                if (@$data['id']) {
                    $this->Flash->success(__('Category is updated.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/blog_category/' . $data['id']);
                } else {
                    $this->Flash->success(__('Category  has been save successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/blog_category/');
                }
            }
        }
        $adminLists = $this->BlogCategory->find('all', ['id' => 'DESC']);
        $this->set(compact('adminLists', 'dataEdit', 'id'));
    }

    public function createBlog($id = null) {
        $blogCategory = $this->BlogCategory->find('all')->where(['is_active' => 1]);
        $blogListing = $this->Blogs->find('all');
        if (@$id) {
            $dataEdit = $this->Blogs->find('all')->where(['id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $entity = $this->Blogs->newEntity();
            $data = $this->request->getData();
            if (!empty($data['auther_image']['tmp_name'])) {
                $avatarName = $this->Custom->uploadAvatarImage($data['auther_image']['tmp_name'], $data['auther_image']['name'], BLOGIMG, 250);
                //pj($avatarName) ;
                $data['auther_image'] = $avatarName;
            } else {
                $dataEdit = $this->Blogs->find('all')->where(['id' => $data['id']])->first();
                @$data['auther_image'] = $dataEdit->auther_image;
            }
            if (!empty($data['blog_image']['tmp_name'])) {
                $imageName = $this->Custom->uploadBlogImage($data['blog_image']['tmp_name'], $data['blog_image']['name'], BLOGIMG, 350);
                $data['blog_image'] = $imageName;
            } else {
                $dataEdit = $this->Blogs->find('all')->where(['id' => $data['id']])->first();
                @$data['blog_image'] = $dataEdit->image;
            }
            $entity = $this->Blogs->patchEntity($entity, $data);
            $entity->is_active = 1;
            $entity->created = date('Y-m-d H:I:s');
            if ($this->Blogs->save($entity)) {
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated succsessfully'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/create_blog/' . $data['id']);
                } else {
                    $this->Flash->success(__('Data has been save successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/create_blog/');
                }
            }
        }
        $this->set(compact('blogCategory', 'dataEdit', 'id', 'blogListing'));
    }

    public function blogimgdelete($id = null) {
        $this->viewBuilder()->layout('admin');
        if ($id) {
            $list = $this->Blogs->find('all', ['Fields' => ['blog_image']])->where(['id' => $id])->first();
            unlink(BLOGIMG . '/' . $list->blog_image);
            $this->Blogs->updateAll(array('blog_image' => ''), array('id' => $id));
            return $this->redirect(HTTP_ROOT . 'appadmins/create_blog/' . $id . '/');
        }
    }

    public function blogavtardelete($id = null) {
        $this->viewBuilder()->layout('admin');
        if ($id) {
            $list = $this->Blogs->find('all', ['Fields' => ['auther_image']])->where(['id' => $id])->first();
            unlink(BLOGIMG . '/' . $list->auther_image);
            $this->Blogs->updateAll(array('auther_image' => ''), array('id' => $id));
            return $this->redirect(HTTP_ROOT . 'appadmins/create_blog/' . $id . '/');
        }
    }

    public function blogTag($id = Null) {
        $blogCategory = $this->Blogs->find('all')->where(['is_active' => 1]);
        $blogtagListing = $this->BlogTag->find('all');
        if (@$id) {
            $dataEdit = $this->BlogTag->find('all')->where(['id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $entity = $this->BlogTag->newEntity();
            $data = $this->request->getData();
            $entity = $this->BlogTag->patchEntity($entity, $data);
            if ($this->BlogTag->save($entity)) {
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated succsessfully'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/blog_tag/' . $data['id']);
                } else {
                    $this->Flash->success(__('Data has been save successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/blog_tag/');
                }
            }
        }
        $this->set(compact('blogCategory', 'dataEdit', 'id', 'blogtagListing'));
    }

    public function News($id = Null) {
        $blogtagListing = $this->News->find('all');
        if (@$id) {
            $dataEdit = $this->News->find('all')->where(['id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $entity = $this->News->newEntity();
            $data = $this->request->getData();

            if (!empty($data['news_image']['tmp_name'])) {
                $imageName = $this->Custom->uploadBlogImage($data['news_image']['tmp_name'], $data['news_image']['name'], NEWSIMG, 250);
                $data['news_image'] = $imageName;
            } else {
                $dataEdit = $this->News->find('all')->where(['id' => $data['id']])->first();
                @$data['news_image'] = $dataEdit->image;
            }
            $entity = $this->News->patchEntity($entity, $data);
            //pj($data);exit;
            $entity->is_active = 1;
            $entity->created = date('Y-m-d H:I:s');
            if ($this->News->save($entity)) {
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated succsessfully'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/news/' . $data['id']);
                } else {
                    $this->Flash->success(__('Data has been save successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/news/');
                }
            }
        }
        $this->set(compact('blogCategory', 'dataEdit', 'id', 'blogtagListing'));
    }

    public function newsimgdelete($id = null) {
        $this->viewBuilder()->layout('admin');
        if ($id) {
            $list = $this->News->find('all', ['Fields' => ['news_image']])->where(['id' => $id])->first();
            unlink(NEWSIMG . '/' . $list->news_image);
            $this->News->updateAll(array('news_image' => ''), array('id' => $id));
            return $this->redirect(HTTP_ROOT . 'appadmins/news/' . $id . '/');
        }
    }

    public function addEmailUsers($id = null) {
        $this->viewBuilder()->layout('admin');
        //$paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $id])->first();
        $user_id = $id;
        $usersDetails = $this->Users->find('all')->where(['id' => $user_id])->first();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'USPS_EMAIL'])->first();
            $to = $data['userEmail'];
            $from = $fromMail->value;
            $subject = $data['subject'];
            $message = $data['contain'];
            $kid_id = 0;
            $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
            $this->Flash->success(__('Mail sending successfully'));
            // $this->redirect(HTTP_ROOT . 'appadmins/view_users');
            return $this->redirect($this->referer());
        }
        $this->set(compact('usersDetails'));
    }

    public function addEmailCustomer($id = null) {
        $this->viewBuilder()->layout('admin');
        //$paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $id])->first();
        $user_id = $id;
        $usersDetails = $this->Users->find('all')->where(['id' => $user_id])->first();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $to = $data['userEmail'];
            $from = $fromMail->value;
            $subject = $data['subject'];
            $message = $data['contain'];
            $kid_id = 0;
            $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
            $this->Flash->success(__('USPS Mail sending successfully'));
            //$this->redirect(HTTP_ROOT . 'appadmins/customer_list');
            return $this->redirect($this->referer());
        }
        $this->set(compact('usersDetails'));
    }

    public function reviewUsers($user_id = null) {

        $id = $user_id;
        $userdetails = $this->Users->find('all')->contain(['UserDetails', 'kidsDetails'])->where(['Users.id' => $id])->first();
        @$kid_id = $userdetails->kids_details->kid_id;
        $shipping_address = $this->ShippingAddress->find('all')->where(['user_id' => $id, 'kid_id' => $id, 'default_set' => 1])->first();
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

        $this->set(compact('style_sphere_selectionsWemen', 'wemenDesigne', 'menDesigne', 'menSccessories', 'shipping_address', 'userdetails', 'MenStats', 'TypicallyWearMen', 'MenFit', 'MenStyle', 'menbrand', 'style_sphere_selections', 'id', 'primaryinfo', 'Womeninfo', 'style_wardrobe', 'avoid_fabrics', 'avoid_prints', 'avoid_colors', 'womens_brands_plus_low_tier', 'WomenJeansStyle', 'Womenprice', 'Womenstyle', 'WomenRatherDownplay', 'WomenJeansLength', 'WomenJeansRise', 'FitCut', 'SizeChart', 'PersonalizedFix', 'womenHeelHightPrefer', 'women_shoe_prefer'));
    }

    public function matching($id)
    {
        // dd($id);
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
                $q = 'SELECT *
                    FROM `in_products`
                    
                    WHERE `in_products`.`id` IN (
                    
                        SELECT `in_pud`.`id`
                        FROM `in_products` as  `in_pud`, `typically_wear_men`
                        WHERE
                          `in_pud`.`profile_type` = 1 AND
                          `in_pud`.`match_status` = 2 AND
                          `in_pud`.`available_status` = 1 AND
                          `in_pud`.`quantity` = 1 AND
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
                    GROUP BY `in_products`.`prod_id`';

                $getProducts = $conn->execute($q)->fetchAll('assoc');
                $color_list = json_decode($this->MenFit->find('all')->where(['user_id' => $getData->user_id])->first()->prefer_color);
                // dd($colorIds);
            }
            if ($gender == 2) { // Women
                /* $where_profle = ['profile_type' => $gender];
                  $getProducts = $this->Custom->womenMatching($getData->user_id);
                  //               echo "<pre style='margin-left:233px;'>";
                  //               print_r($getData->user_id);
                  //               print_r($getProducts);
                  //               echo "</pre>";exit; */

                $getProducts = $conn->execute(
                    'SELECT *
                                                FROM `in_products`
                                                
                                                WHERE `in_products`.`id` IN (
                                                
                                                    SELECT `in_pud`.`id`
                                                    FROM `in_products` as  `in_pud`, `size_chart`
                                                    WHERE
                                                      `in_pud`.`profile_type` = 2 AND
                                                      `in_pud`.`match_status` = 2 AND
                                                      `in_pud`.`available_status` = 1 AND
                                                      `in_pud`.`quantity` = 1 AND
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
                                                GROUP BY `in_products`.`prod_id`'
                )->fetchAll('assoc');
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
                                                      `in_pud`.`quantity` = 1 AND
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
                                                      `in_pud`.`quantity` = 1 AND
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
        // dd($getProducts);
        $this->loadModel('MatchingCase');
        $all_products = [];
        $all_prd_ids = [];

        if (!empty($getProducts)) {
            $this->MatchingCase->deleteAll(['payment_id' => $id]);
            foreach ($getProducts as $prd_ky => $prd_lii) {
                // if (!empty($prd_ky)) {
                $newRws = $this->MatchingCase->newEntity();
                $newRws->payment_id = $id;
                $newRws->product_id = $prd_lii['id']; //$prd_ky;
                $newRws->count = 0; //count($prd_lii);
                $newRws->matching = json_encode([]); //json_encode($prd_lii);
                $this->MatchingCase->save($newRws);

                $all_prd_ids[] = $prd_lii['id']; //$prd_ky;
                // }
            }
            debug($_GET['search_for']);
            debug($all_prd_ids);


            if (!empty($all_prd_ids)) {
                $this->InProducts->hasOne('match_case', ['className' => 'MatchingCase', 'foreignKey' => 'product_id'])->setConditions(['payment_id' => $id]);
                $all_product = $this->InProducts->find('all')->contain(['match_case' /* => ['sort' => ['match_case.count' => 'DESC']] */])->where(['OR' => ['InProducts.is_clearance' => 2, 'InProducts.is_clearance IS' => NULL], 'InProducts.available_status !=' => 2, 'InProducts.is_active !=' => 0, 'InProducts.id IN' => $all_prd_ids])->order(['match_case.count' => 'DESC']);
                $this->paginate['limit'] = 10;
                //            pj($all_product);exit;

                // Here color wise filtering is done
                // $all_product = $all_product->where(['InProducts.color IN' => $color_list]);

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

                // all_products now have ones with color matching
                $all_products = $this->paginate($all_product);
                // $all_products = $all_products->combine('id', function ($row) {
                //     return $row;
                // })->toArray();
                // debug('getproducts');
                // debug($getProducts);
                // debug('all_roducts');
                // dd($all_products);
            }
            //        echo "<pre>";
            //        print_r($all_products);
            //        echo "</pre>";
        }
        // debug($all_prd_ids);die();

        $this->set(compact('userDetails', 'gender', 'getProducts', 'id', 'getData', 'all_products'));
    }

    public function productDelete($id = null) {
        $getprodDetail = $this->InProducts->find('all')->where(['id' => $id])->first();
        $exitquint = $getprodDetail->quantity;
        if ($exitquint > 0) {
//            $newquinty = $exitquint + 1;
//            $this->InProducts->updateAll(['quantity' => $newquinty], ['id' => $id]);
            $this->Flash->success(__('One product delete successfully.'));
            return $this->redirect($this->referer());
        }
    }

    public function addMatchProduct($paymentId = null, $productId = null) {
        $color_arr = $this->Custom->inColor();
        $getprodDetail = $this->InProducts->find('all')->where(['id' => $productId])->first();        
        $getRackDetail = $this->InRack->find('all')->where(['id' => $getprodDetail->rack])->first();
        $getCtgDetail = $this->InProductType->find('all')->where(['id' => $getprodDetail->p_type])->first();
        if (($getprodDetail->quantity <= 0) || ($getprodDetail->match_status != 2)) {
            $getprodDetail = $this->InProducts->find('all')->where(['prod_id' => $getprodDetail->prod_id, 'quantity' => 1, 'match_status' => 2])->first();
            if (empty($getprodDetail)) {
                $this->Flash->error(__('No product available to add.'));
                return $this->redirect($this->referer());
            }
        }
        if ($getprodDetail->quantity > 0) {
            $productId = $getprodDetail->id;
            $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
            $userId = $userIdp->user_id;
            $products = $this->Products->newEntity();
            $maxId = $this->Products->find('all')->order(['Products.id' => 'DESC'])->first();
            $ownId = @$maxId->id + 1;
//            $name = $ownId . '.png';
//            $barcode_value = $paymentId . $ownId;
            $name = $getprodDetail->bar_code_img;
            $barcode_value = $getprodDetail->dtls;

//            $this->Custom->create_image($name);
//            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
//            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
//            list($type, $dataImg) = explode(';', $dataImg);
//            list(, $dataImg) = explode(',', $dataImg);
//            $dataImg = base64_decode($dataImg);
//            file_put_contents(BARCODE . $name, $dataImg);
//            $inventoryimg = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/files/product_img/' . $getprodDetail->product_image;
//            $saveimg = '/home/' . SITE_USERNAME . '/public_html/webroot/files/product_img/' . $getprodDetail->product_image;
//            $copied = copy($inventoryimg, $saveimg);

            $inventory_br_img = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/' . BARCODE . $getprodDetail->bar_code_img;
            $save_br_img = '/home/' . SITE_USERNAME . '/public_html/webroot/' . BARCODE . $getprodDetail->bar_code_img;
            $copied_br = copy($inventory_br_img, $save_br_img);

            $product['user_id'] = $userId;
            $product['payment_id'] = $paymentId;
            $product['kid_id'] = @$userIdp->kid_id;
            $product['product_name_one'] = $getprodDetail->product_name_one;
            $product['product_name_two'] = $getprodDetail->product_name_two;
            $product['color'] = $color_arr[$getprodDetail->color];
            $product['in_rack'] = @$getCtgDetail->product_type. " - " .@$getRackDetail->rack_number;
            $product['prod_id'] = $getprodDetail->prod_id;
            $product['size'] = '';
            if (!empty($getprodDetail->picked_size)) {
                $li_size = explode('-', $getprodDetail->picked_size);
                foreach ($li_size as $sz_l) {
                    if (($getprodDetail->$sz_l == 0) || ($getprodDetail->$sz_l == 00)) {
                        $product['size'] .= $getprodDetail->$sz_l;
                    } else {
                        $product['size'] .= !empty($getprodDetail->$sz_l) ? $getprodDetail->$sz_l . '&nbsp;&nbsp;' : '';
                    }
                }
            }
            if (!empty($getprodDetail->primary_size) && ($getprodDetail->primary_size == 'free_size')) {
                $product['size'] = "Free Size";
            }

            $product['purchase_price'] = $getprodDetail->purchase_price;
            $product['sell_price'] = $getprodDetail->sale_price;
            $product['product_image'] = 'inventory/files/product_img/' . $getprodDetail->product_image;
            $product['barcode_image'] = $name;
            $product['barcode_value'] = $barcode_value;
            $product['matching_id'] = $productId;
            $product['product_purchase_date'] = date('Y-m-d H:i:s');
            $product['created'] = date('Y-m-d H:i:s');
            $product['inv_product_id'] = $getprodDetail->id;
            $product['inv_dtls'] = $getprodDetail->dtls;

            if (!empty($_GET['exchange'])) {
                $exchangeId = $_GET['exchange'];
                if ($exchangeId) {
                    $chk_exc = $this->Products->find('all')->where(['Products.exchange_product_id' => $exchangeId])->count();
                    if ($chk_exc >= 1) {
                        $this->Flash->error(__('Exchange product already added.'));
                        return $this->redirect($this->referer());
                    }
                    $exchangeData = $this->Products->find('all')->where(['Products.id' => $exchangeId])->first();
                    if ($exchangeData) {
                        $this->Products->updateAll(['is_altnative_product' => 1, 'is_complete_by_admin' => 1, 'is_complete' => 1, 'checkedout' => 'Y'], ['id' => $exchangeId]);
                        $cenvertedTime = date('Y-m-d H:i:s', strtotime('+3 seconds', strtotime($exchangeData->created)));
                        $product['created'] = $cenvertedTime;
                        $product['is_altnative_product'] = 0;
                        $product['is_exchange_pending'] = 1;
                        $product['exchange_product_id'] = $exchangeId;
                    }
                } else {
                    $product['created'] = date('Y-m-d H:i:s');
                }
            }

            $this->InProducts->updateAll(['match_status' => 1], ['id' => $productId]);

            $products = $this->Products->patchEntity($products, $product);
            $insrtProduct = $this->Products->save($products);
            $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => $paymentId]);
            if ($insrtProduct) {
                //$newquinty = $getprodDetail->quantity - 1;
                // $this->InProducts->updateAll(['quantity' => $newquinty], ['id' => $productId
                $usageProduct = $this->UsageProducts->newEntity();
                $usaProduct['in_product_id'] = $getprodDetail->id;
                $usaProduct['brand_id'] = $getprodDetail->brand_id;
                $usaProduct['product_id'] = $insrtProduct->id;
                $usaProduct['user_id'] = $userId;
                $usaProduct['prodcut_name'] = $getprodDetail->product_name_one;
                $usaProduct['status'] = '5';
                $usaProduct['date_usage'] = date('Y-m-d H:i:s');
                $usaProduct['qty'] = '1';
                $usageProduct = $this->UsageProducts->patchEntity($usageProduct, $usaProduct);
                $this->UsageProducts->save($usageProduct);
                $this->Flash->success(__('Data has been added successfully.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Product already added by stylist for other client.'));
            return $this->redirect($this->referer());
        }
    }

    /*
      public function allFinalize($paymentId) {
      $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
      $finaliseCount = @$userIdp->finalize_count + 1;
      $userId = $userIdp->user_id;
      $exchangeproductlist = $this->Products->find('all')->where(['is_complete' => 1, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->order(['created' => 'DESC']);
      $exchangeproductCount = $this->Products->find('all')->where(['is_complete' => 1, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->count();
      $exprice = 0;
      foreach ($exchangeproductlist as $exp) {
      $exprice += $exp->sell_price;
      $this->Products->updateAll(['is_replace' => 1], ['id' => $exp->id]);
      }

      $productdetails = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->order(['created' => 'ASC']);
      $productCount = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->count();
      $paymentGetwayAmount = 0;
      foreach ($productdetails as $productPrice) {
      $paymentGetwayAmount += $productPrice->sell_price;
      }

      if (@$PaymentGetways->finalize_count == 0) {
      $percentage = 25;
      $discount = ($percentage / 100) * $paymentGetwayAmount;

      $isstylefee = $this->Custom->isstylefee($paymentId);
      if (@$isstylefee != 1) {
      $STYLE_FIT = $this->Settings->find('all')->where(['name' => 'style_fee'])->first()->value;
      } else {
      $ORDER_TOTAL = $allpaymentGetwayAmount + $STYLE_FIT;
      $STYLE_FIT = 0;
      }





      $allpaymentGetwayAmount = $paymentGetwayAmount - $discount - $STYLE_FIT;
      } else if ($exchangeproductCount != 0) {
      $allpaymentGetwayAmount2 = $paymentGetwayAmount - $exprice;
      if ($allpaymentGetwayAmount2 >= 1) {
      $allpaymentGetwayAmount = $allpaymentGetwayAmount2;
      $discount = 0;
      } else {
      $allpaymentGetwayAmount = 0;
      $discount = 0;
      }
      } else {
      $allpaymentGetwayAmount = $paymentGetwayAmount;
      }
      $this->PaymentGetways->updateAll(['finalize_count' => @$finaliseCount], ['id' => $paymentId]);
      $payment_data = $this->PaymentCardDetails->find('all')->where(['id' => $userIdp->payment_card_details_id])->first();
      $payment_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $userId])->first();
      $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userId, 'is_billing' => 1])->first();
      $email = $this->Users->find('all')->where(['id' => $userId])->first()->email;
      if (true) {
      $getUserDetails = $this->Users->find('all')->where(['id' => $userIdp->user_id])->first();
      $bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $userIdp->user_id, 'is_billing' => 1])->first();
      $PRODUCT_DETAILS = '';
      $PRODUCT_DETAILS .= ' <tr style=" display: inline-block; width: 100%;border-bottom: 1px solid #ccc; border-top: 1px solid #ccc;">
      <th style=" display: inline-block; width: 15%; padding: 14px 0px;   border-right: 1px solid #ccc; text-align: center;">ITEM ID</th>
      <th style=" display: inline-block; width: 30%">ITEM NAME</th>
      <th style=" display: inline-block; width: 17%">SIZE</th>
      <th style=" display: inline-block; width: 17%">COLOR</th>
      <th style=" display: inline-block; width: 17%; text-align: right;">PRICE</th>
      </tr>';
      foreach ($productdetails as $prodctdelt) {
      $this->Products->updateAll(['is_finalize' => 1, 'checkedout' => 'N'], ['id' => $prodctdelt->id]);
      $PRODUCT_DETAILS .= "<tr style='display: inline-block; width: 100%; border-bottom: 1px solid #ccc; text-align: center;'>
      <td style='display: inline-block; width: 15%;padding: 14px 0px;'>" . $prodctdelt->barcode_value . "</td>
      <td style='display: inline-block; width: 30%'>" . $prodctdelt->product_name_one . "</strong></td>
      <td style='display: inline-block; width: 17%'>" . $prodctdelt->size . "</td>
      <td style='display: inline-block; width: 17%'>" . $prodctdelt->color . "</td>
      <td style='display: inline-block; width: 17%; text-align: right;'>$" . number_format($prodctdelt->sell_price, 2) . "</td>
      </tr>";
      $track_number = $prodctdelt->order_usps_tracking_no;
      }

      if ($productCount >= 1) {
      if (@$userIdp->mail_status == 0) {
      if ($userIdp->kid_id != '') {
      $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $userIdp->kid_id]);
      $notificationsTable = $this->Notifications->newEntity();
      $data1['user_id'] = $userId;
      $data1['msg'] = 'styleist has products finalize';
      $data1['is_read'] = '0';
      $data1['created'] = date('Y-m-d H:i:s');
      $data1['kid_id'] = $userIdp->kid_id;
      $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
      $this->Notifications->save($notificationsTable);
      } else {
      $this->Users->updateAll(['is_redirect' => '4'], ['id' => $userId]);
      $notificationsTable = $this->Notifications->newEntity();
      $data1['user_id'] = $userId;
      $data1['msg'] = 'styleist has products finalize';
      $data1['is_read'] = '0';
      $data1['created'] = date('Y-m-d H:i:s');
      $data1['kid_id'] = '0';
      $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
      $this->Notifications->save($notificationsTable);
      }

      $mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1', 'finalize_date' => date('Y-m-d H:i:s')], ['id' => $paymentId]);
      //$mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1', 'finalize_date' => date('Y-m-d H:i:s')], ['id' => $lastPymentg->id]);
      $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PRODUCT_FINALIZE'])->first();
      $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
      $to = $getUserDetails->email;
      $from = $fromMail->value;
      $subject = $emailMessage->display;
      $sitename = SITE_NAME;

      $purchase_date = @date_format(@$getUserId->customer_purchasedate, 'm/d/Y');
      $address1 = $bil_address->address;
      $address3 = $bil_address->address_line_2;
      $address2 = $bil_address->state . ' ' . $bil_address->zipcode . ' ' . $bil_address->country;

      $FITCOUNT = $this->Custom->ToOrdinal($userIdp->count);
      $STYLEIST_NAME = $this->Custom->emaplyeName($userIdp->emp_id);


      $SUB_TOTAL = $paymentGetwayAmount;
      $ALL_KEEP_PERCENTAGE = $percentage;
      $PERCENTAGE_VALUE = $discount;
      $ORDER_SUB_TOTAL = $paymentGetwayAmount - $discount;
      $ORDER_TOTAL = $allpaymentGetwayAmount;
      $SITE_NAME_LINK = HTTP_ROOT;
      $message = $this->Custom->productFinalize($emailMessage->value, $getUserDetails->name, $STYLEIST_NAME, $track_number, $PRODUCT_DETAILS, $FITCOUNT, $SUB_TOTAL, $ALL_KEEP_PERCENTAGE, $PERCENTAGE_VALUE, $ORDER_SUB_TOTAL, $STYLE_FIT, $ORDER_TOTAL, $sitename, $SITE_NAME_LINK);
      $this->Custom->sendEmail($to, $from, $subject, $message);
      $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
      $this->Custom->sendEmail($toSupport, $from, $subject, $message);
      $this->Flash->success(__('Product has been finalize successfully.'));
      $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId);
      //exit;
      } else {
      $this->Flash->error(__('you allready done finalzed'));
      $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId);
      // exit;
      }
      } else {
      $this->Flash->error(__('you allready done finalzed'));
      $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId);
      }
      }
      }


      public function kidallFinalize($paymentId) {
      $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
      $finaliseCount = @$userIdp->finalize_count + 1;
      $userId = $userIdp->user_id;
      $kidId = $userIdp->kid_id;
      $exchangeproductlist = $this->Products->find('all')->where(['kid_id' => $kidId, 'is_complete' => 0, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->order(['created' => 'DESC']);
      $exchangeproductCount = $this->Products->find('all')->where(['kid_id' => $kidId, 'is_complete' => 0, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->count();
      $exprice = 0;
      foreach ($exchangeproductlist as $exp) {
      $exprice += $exp->sell_price;
      $this->Products->updateAll(['is_replace' => 1], ['id' => $exp->id]);
      }
      $productdetails = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->order(['created' => 'ASC']);

      $productCount = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->count();
      $paymentGetwayAmount = 0;


      foreach ($productdetails as $productPrice) {
      $paymentGetwayAmount += $productPrice->sell_price;
      }

      if (@$PaymentGetways->finalize_count == 0) {
      $percentage = 25;
      $discount = ($percentage / 100) * $paymentGetwayAmount;

      $isstylefee = $this->Custom->isstylefee($paymentId);
      if (@$isstylefee != 1) {
      $STYLE_FIT = $this->Settings->find('all')->where(['name' => 'style_fee'])->first()->value;
      } else {
      $STYLE_FIT = '1.00';
      }
      $allpaymentGetwayAmount = $paymentGetwayAmount - $discount - $STYLE_FIT;
      } else if ($exchangeproductCount != 1) {
      $allpaymentGetwayAmount2 = $paymentGetwayAmount - $exprice;
      if ($allpaymentGetwayAmount2 >= 1) {
      $allpaymentGetwayAmount = $allpaymentGetwayAmount2;
      } else {
      $allpaymentGetwayAmount = '0.00';
      }
      $discount = '0.00';
      } else {
      $discount = '0.00';
      $allpaymentGetwayAmount = $paymentGetwayAmount;
      }

      $this->PaymentGetways->updateAll(['finalize_count' => @$finaliseCount], ['id' => $paymentId]);
      $payment_data = $this->PaymentCardDetails->find('all')->where(['id' => $userIdp->payment_card_details_id])->first();
      $payment_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $userId])->first();
      $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userId, 'is_billing' => 1])->first();
      $email = $this->Users->find('all')->where(['id' => $userId])->first()->email;

      if (true) {
      $getUserDetails = $this->Users->find('all')->where(['id' => $userIdp->user_id])->first();
      $bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $userIdp->user_id, 'is_billing' => 1])->first();
      $PRODUCT_DETAILS = '';
      $PRODUCT_DETAILS .= ' <tr style=" display: inline-block; width: 100%;border-bottom: 1px solid #ccc; border-top: 1px solid #ccc;">
      <th style=" display: inline-block; width: 15%; padding: 14px 0px;   border-right: 1px solid #ccc; text-align: center;">ITEM ID</th>
      <th style=" display: inline-block; width: 30%">ITEM NAME</th>
      <th style=" display: inline-block; width: 17%">SIZE</th>
      <th style=" display: inline-block; width: 17%">COLOR</th>
      <th style=" display: inline-block; width: 17%; text-align: right;">PRICE</th>
      </tr>';
      foreach ($productdetails as $prodctdelt) {
      $this->Products->updateAll(['is_finalize' => 1, 'checkedout' => 'N'], ['id' => $prodctdelt->id]);
      $PRODUCT_DETAILS .= "<tr style='display: inline-block; width: 100%; border-bottom: 1px solid #ccc; text-align: center;'>
      <td style='display: inline-block; width: 15%;padding: 14px 0px;'>" . $prodctdelt->barcode_value . "</td>
      <td style='display: inline-block; width: 30%'>" . $prodctdelt->product_name_one . "</strong></td>
      <td style='display: inline-block; width: 17%'>" . $prodctdelt->size . "</td>
      <td style='display: inline-block; width: 17%'>" . $prodctdelt->color . "</td>
      <td style='display: inline-block; width: 17%; text-align: right;'>$" . number_format($prodctdelt->sell_price, 2) . "</td>
      </tr>";
      $track_number = $prodctdelt->order_usps_tracking_no;
      }



      if ($productCount >= 1) {
      if (@$userIdp->mail_status == 0) {
      if ($userIdp->kid_id != '') {
      $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $userIdp->kid_id]);
      $notificationsTable = $this->Notifications->newEntity();
      $data1['user_id'] = $userId;
      $data1['msg'] = 'styleist has products finalize';
      $data1['is_read'] = '0';
      $data1['created'] = date('Y-m-d H:i:s');
      $data1['kid_id'] = $userIdp->kid_id;
      $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
      $this->Notifications->save($notificationsTable);
      } else {
      $this->Users->updateAll(['is_redirect' => '4'], ['id' => $userId]);
      $notificationsTable = $this->Notifications->newEntity();
      $data1['user_id'] = $userId;
      $data1['msg'] = 'styleist has products finalize';
      $data1['is_read'] = '0';
      $data1['created'] = date('Y-m-d H:i:s');
      $data1['kid_id'] = '0';
      $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
      $this->Notifications->save($notificationsTable);
      }


      $mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1', 'finalize_date' => date('Y-m-d H:i:s')], ['id' => $paymentId]);
      //$mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1', 'finalize_date' => date('Y-m-d H:i:s')], ['id' => $lastPymentg->id]);
      $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PRODUCT_FINALIZE'])->first();
      $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
      $to = $getUserDetails->email;
      $from = $fromMail->value;
      $subject = $emailMessage->display;
      $sitename = SITE_NAME;

      $purchase_date = date_format($getUserId->customer_purchasedate, 'm/d/Y');
      $address1 = $bil_address->address;
      $address3 = $bil_address->address_line_2;
      $address2 = $bil_address->state . ' ' . $bil_address->zipcode . ' ' . $bil_address->country;
      $FITCOUNT = $this->Custom->ToOrdinal($userIdp->count);
      $STYLEIST_NAME = $this->Custom->emaplyeName($userIdp->emp_id);

      if ($paymentId) {
      $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
      $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 0])->Count();
      //echo @$exCountKeeps;

      if (@$productCount == @$exCountKeeps) {
      $allKeepsProducts = 1;
      $percentage = 25;
      } else {
      $allKeepsProducts = 2;
      $percentage = 0;
      }
      }


      //echo $allKeepsProducts; exit;
      if ($allKeepsProducts == 1) {
      $SUB_TOTAL = $paymentGetwayAmount;
      $ALL_KEEP_PERCENTAGE = $percentage;
      $PERCENTAGE_VALUE = number_format($discount, 2);
      $ORDER_SUB_TOTAL = number_format($paymentGetwayAmount - $discount, 2);
      $ORDER_TOTAL = number_format($allpaymentGetwayAmount, 2);
      } else {
      $SUB_TOTAL = $paymentGetwayAmount;
      $ORDER_SUB_TOTAL = number_format($paymentGetwayAmount, 2);
      $ORDER_TOTAL = number_format($paymentGetwayAmount, 2);
      $PERCENTAGE_VALUE = '0.00';
      }


      $SITE_NAME_LINK = HTTP_ROOT;
      $message = $this->Custom->productFinalize($emailMessage->value, $getUserDetails->name, $STYLEIST_NAME, $track_number, $PRODUCT_DETAILS, $FITCOUNT, $SUB_TOTAL, $ALL_KEEP_PERCENTAGE, $PERCENTAGE_VALUE, $ORDER_SUB_TOTAL, $STYLE_FIT, $ORDER_TOTAL, $sitename, $SITE_NAME_LINK);
      $this->Custom->sendEmail($to, $from, $subject, $message);
      $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
      $this->Custom->sendEmail($toSupport, $from, $subject, $message);
      $this->Flash->success(__('Product has been finalize successfully.'));
      $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId);
      } else {
      $this->Flash->error(__('you allready done finalzed'));
      $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId);
      }
      } else {
      $this->Flash->error(__('you allready done finalzed'));
      $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId);
      }
      } else {
      $this->Flash->error(__('you allready done finalzed'));
      $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId);
      }
      } */
      
      public function addAllocationProduct($paymentId = null, $productId = null)
    {
        $color_arr = $this->Custom->inColor();
        $getprodDetail = $this->InProducts->find('all')->where(['id' => $productId])->first();
        $getRackDetail = $this->InRack->find('all')->where(['id' => $getprodDetail->rack])->first();
        $getCtgDetail = $this->InProductType->find('all')->where(['id' => $getprodDetail->p_type])->first();
        if (($getprodDetail->quantity <= 0) || ($getprodDetail->match_status != 2)) {
            $getprodDetail = $this->InProducts->find('all')->where([/*'prod_id' => $getprodDetail->prod_id,*/'id' => $productId, 'quantity' => 1])->first();
            if (empty($getprodDetail)) {
                $this->Flash->error(__('No product available to add.'));
                return $this->redirect($this->referer());
            }
        }
        if ($getprodDetail->quantity > 0) {
            $productId = $getprodDetail->id;
            $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
            $userId = $userIdp->user_id;
            $products = $this->Products->newEntity();
            $maxId = $this->Products->find('all')->order(['Products.id' => 'DESC'])->first();
            $ownId = @$maxId->id + 1;
            //            $name = $ownId . '.png';
            //            $barcode_value = $paymentId . $ownId;
            $name = $getprodDetail->bar_code_img;
            $barcode_value = $getprodDetail->dtls;

            //            $this->Custom->create_image($name);
            //            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            //            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            //            list($type, $dataImg) = explode(';', $dataImg);
            //            list(, $dataImg) = explode(',', $dataImg);
            //            $dataImg = base64_decode($dataImg);
            //            file_put_contents(BARCODE . $name, $dataImg);
            //            $inventoryimg = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/files/product_img/' . $getprodDetail->product_image;
            //            $saveimg = '/home/' . SITE_USERNAME . '/public_html/webroot/files/product_img/' . $getprodDetail->product_image;
            //            $copied = copy($inventoryimg, $saveimg);

            $inventory_br_img = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/' . BARCODE . $getprodDetail->bar_code_img;
            $save_br_img = '/home/' . SITE_USERNAME . '/public_html/webroot/' . BARCODE . $getprodDetail->bar_code_img;
            $copied_br = copy($inventory_br_img, $save_br_img);

            $product['user_id'] = $userId;
            $product['payment_id'] = $paymentId;
            $product['kid_id'] = @$userIdp->kid_id;
            $product['product_name_one'] = $getprodDetail->product_name_one;
            $product['product_name_two'] = $getprodDetail->product_name_two;
            $product['color'] = $color_arr[$getprodDetail->color];
            $product['in_rack'] = @$getCtgDetail->product_type . " - " . @$getRackDetail->rack_number;
            $product['prod_id'] = $getprodDetail->prod_id;
            $product['size'] = '';
            if (!empty($getprodDetail->picked_size)) {
                $li_size = explode('-', $getprodDetail->picked_size);
                foreach ($li_size as $sz_l) {
                    if (($getprodDetail->$sz_l == 0) || ($getprodDetail->$sz_l == 00)) {
                        $product['size'] .= $getprodDetail->$sz_l;
                    } else {
                        $product['size'] .= !empty($getprodDetail->$sz_l) ? $getprodDetail->$sz_l . '&nbsp;&nbsp;' : '';
                    }
                }
            }
            if (!empty($getprodDetail->primary_size) && ($getprodDetail->primary_size == 'free_size')) {
                $product['size'] = "Free Size";
            }

            $product['purchase_price'] = $getprodDetail->purchase_price;
            $product['sell_price'] = $getprodDetail->sale_price;
            $product['product_image'] = 'inventory/files/product_img/' . $getprodDetail->product_image;
            $product['barcode_image'] = $name;
            $product['barcode_value'] = $barcode_value;
            $product['matching_id'] = $productId;
            $product['product_purchase_date'] = date('Y-m-d H:i:s');
            $product['created'] = date('Y-m-d H:i:s');
            $product['inv_product_id'] = $getprodDetail->id;
            $product['inv_dtls'] = $getprodDetail->dtls;

            if (!empty($_GET['exchange'])) {
                $exchangeId = $_GET['exchange'];
                if ($exchangeId) {
                    $chk_exc = $this->Products->find('all')->where(['Products.exchange_product_id' => $exchangeId])->count();
                    if ($chk_exc >= 1) {
                        $this->Flash->error(__('Exchange product already added.'));
                        return $this->redirect($this->referer());
                    }
                    $exchangeData = $this->Products->find('all')->where(['Products.id' => $exchangeId])->first();
                    if ($exchangeData) {
                        $this->Products->updateAll(['is_altnative_product' => 1, 'is_complete_by_admin' => 1, 'is_complete' => 1, 'checkedout' => 'Y'], ['id' => $exchangeId]);
                        $cenvertedTime = date('Y-m-d H:i:s', strtotime('+3 seconds', strtotime($exchangeData->created)));
                        $product['created'] = $cenvertedTime;
                        $product['is_altnative_product'] = 0;
                        $product['is_exchange_pending'] = 1;
                        $product['exchange_product_id'] = $exchangeId;
                    }
                } else {
                    $product['created'] = date('Y-m-d H:i:s');
                }
            }

            $this->InProducts->updateAll(['match_status' => 1], ['id' => $productId]);

            $this->InProducts->updateAll(['allocate_to_user_id' => 0, 'allocate_to_kid_id' => 0], ['id' => $productId]);

            $products = $this->Products->patchEntity($products, $product);
            $insrtProduct = $this->Products->save($products);
            $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => $paymentId]);
            if ($insrtProduct) {
                //$newquinty = $getprodDetail->quantity - 1;
                // $this->InProducts->updateAll(['quantity' => $newquinty], ['id' => $productId
                $usageProduct = $this->UsageProducts->newEntity();
                $usaProduct['in_product_id'] = $getprodDetail->id;
                $usaProduct['brand_id'] = $getprodDetail->brand_id;
                $usaProduct['product_id'] = $insrtProduct->id;
                $usaProduct['user_id'] = $userId;
                $usaProduct['prodcut_name'] = $getprodDetail->product_name_one;
                $usaProduct['status'] = '5';
                $usaProduct['date_usage'] = date('Y-m-d H:i:s');
                $usaProduct['qty'] = '1';
                $usageProduct = $this->UsageProducts->patchEntity($usageProduct, $usaProduct);
                $this->UsageProducts->save($usageProduct);
                $this->Flash->success(__('Data has been added successfully.'));
                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Product already added by stylist for other client.'));
            return $this->redirect($this->referer());
        }
    }

    public function allFinalize($paymentId)
    {
        // $this->loadModel('UserExtraItems');

        $this->loadModel('BoxOrders');
        $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
        $newBxRw = $this->BoxOrders->newEntity();
        $dataArr['payment_id'] = $paymentId;
        $dataArr['box_type'] = $userIdp->box_type;
        $newBxRw = $this->BoxOrders->patchEntity($newBxRw, $dataArr);
        $this->BoxOrders->save($newBxRw);

        $chk_prod_verification = $this->Products->find('all')->where(['payment_id' => $paymentId]);
        $is_all_verified = 1;
        foreach ($chk_prod_verification as $prd_li) {
            if ($prd_li->is_verified == 0) {
                $is_all_verified = 2;
            }
        }
        if ($is_all_verified == 2) {
            $this->Flash->error(__('Product verification pending.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId . '?verify=now');
        }

        $all_new_finalize_prod = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_finalize !=' => 1]);

        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userIdp->user_id, 'is_billing' => 1])->first();
        if (empty($billingAddress)) {
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userIdp->user_id])->first();
        }
        $track_detls = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_finalize !=' => 1])->first();
        $this->loadModel('SmsSettings');
        $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'FITBOX_SHIPPING_SMS'])->first();
        if (!empty($get_sms_temp)) {
            $txt_msg = str_replace("[SHIPPING_TRACKING_NUMBER]", $track_detls->order_usps_tracking_no, $get_sms_temp->value);
            $txt_msg = str_replace("[ORDER_NUMBER]", "DFPYMID" . $paymentId, $txt_msg);
            $txt_msg = str_replace("[CUSTOMER_PAGE_LINK]", HTTP_ROOT . "order_review/", $txt_msg);
            $txt_msg = str_replace("[UPS_LINK]", "https://www.ups.com/track/", $txt_msg);
            $phone = $billingAddress->country_code . $billingAddress->phone;
            $url = HTTP_ROOT . 'api/sendSmsPost';
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'FITBOX_SHIPPING_SMS'),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        }


        foreach ($all_new_finalize_prod as $prd_li) {
            if (!empty($prd_li->inv_product_id)) {
                $newLogArr = [];
                $newLogArr['product_id'] = $prd_li->inv_product_id;
                $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                $newLogArr['action'] = 'product_finalized';
                $newLogArr['created_on'] = date('Y-m-d H:i:s');
                $newDtRow = $this->InProductLogs->newEntity();
                $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                $this->InProductLogs->save($newDtRow);

                $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Product finalized'], ['id' => $prd_li->inv_product_id]);
            }
        }

        $this->Products->updateAll(['shipping_date' => date('Y-m-d'), 'auto_checkout_date' => date('Y-m-d', strtotime("+20 days"))], ['payment_id' => $paymentId, 'is_finalize !=' => 1]);

        //        $uechk = $this->UserExtraItems->find('all')->where(['user_id' => $userIdp->user_id, 'status' => 2])->order(['id' => 'DESC'])->first();
        //        if (!empty($uechk->cnt) && ($uechk->cnt == $userIdp->count)) {
        //            
        //        } else {
        // $this->UserExtraItems->updateAll(['status' => 2, 'fit_cnt' => $userIdp->count], ['user_id' => $userIdp->user_id, 'status' => 1]);
        //        }

        $finaliseCount = @$userIdp->finalize_count + 1;
        $userId = $userIdp->user_id;
        $exchangeproductlist = $this->Products->find('all')->where(['is_complete' => 1, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->order(['created' => 'DESC']);
        $exchangeproductCount = $this->Products->find('all')->where(['is_complete' => 1, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->count();
        $exprice = 0;
        foreach ($exchangeproductlist as $exp) {
            $exprice += $exp->sell_price;
            $this->Products->updateAll(['is_replace' => 1], ['id' => $exp->id]);
        }

        $productdetails = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->order(['created' => 'ASC']);
        $productCount = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->count();
        $paymentGetwayAmount = 0;
        foreach ($productdetails as $productPrice) {
            $paymentGetwayAmount += $productPrice->sell_price;
        }

        if (@$PaymentGetways->finalize_count == 0) {
            $percentage = 25;
            $discount = ($percentage / 100) * $paymentGetwayAmount;

            $allpaymentGetwayAmount = $paymentGetwayAmount - $discount - $STYLE_FIT;
        } else if ($exchangeproductCount != 0) {
            $allpaymentGetwayAmount2 = $paymentGetwayAmount - $exprice;
            if ($allpaymentGetwayAmount2 >= 1) {
                $allpaymentGetwayAmount = $allpaymentGetwayAmount2;
                $discount = 0;
            } else {
                $allpaymentGetwayAmount = 0;
                $discount = 0;
            }
        } else {
            $allpaymentGetwayAmount = $paymentGetwayAmount;
        }
        $this->PaymentGetways->updateAll(['finalize_count' => @$finaliseCount], ['id' => $paymentId]);
        $payment_data = $this->PaymentCardDetails->find('all')->where(['id' => $userIdp->payment_card_details_id])->first();
        $payment_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $userId])->first();
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userId, 'is_billing' => 1])->first();
        $email = $this->Users->find('all')->where(['id' => $userId])->first()->email;
        if (true) {
            $getUserDetails = $this->Users->find('all')->where(['id' => $userIdp->user_id])->first();
            $bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $userIdp->user_id, 'is_billing' => 1])->first();
            $PRODUCT_DETAILS = '';
            $PRODUCT_DETAILS .= ' <tr style=" display: inline-block; width: 100%;border-bottom: 1px solid #ccc; border-top: 1px solid #ccc;">
                                    <th style=" display: inline-block; width: 15%; padding: 14px 0px;   border-right: 1px solid #ccc; text-align: center;">ITEM ID</th>
                                    <th style=" display: inline-block; width: 30%">ITEM NAME</th>
                                    <th style=" display: inline-block; width: 17%">SIZE</th>
                                    <th style=" display: inline-block; width: 17%">COLOR</th>
                                    <th style=" display: inline-block; width: 17%; text-align: right;">PRICE</th>
                                </tr>';
            foreach ($productdetails as $prodctdelt) {
                $this->Products->updateAll(['is_finalize' => 1, 'checkedout' => 'N'], ['id' => $prodctdelt->id]);
                $PRODUCT_DETAILS .= "<tr style='display: inline-block; width: 100%; border-bottom: 1px solid #ccc; text-align: center;'>
                                    <td style='display: inline-block; width: 15%;padding: 14px 0px;'>" . $prodctdelt->barcode_value . "</td>      
                                    <td style='display: inline-block; width: 30%'>" . $prodctdelt->product_name_one . "</strong></td>
                                    <td style='display: inline-block; width: 17%'>" . $prodctdelt->size . "</td>
                                    <td style='display: inline-block; width: 17%'>" . $prodctdelt->color . "</td>
                                    <td style='display: inline-block; width: 17%; text-align: right;'>$" . number_format($prodctdelt->sell_price, 2) . "</td>
                                </tr>";
                $track_number = $prodctdelt->order_usps_tracking_no;

                $getInv = $this->InProducts->find('all')->where(['id' => $prodctdelt->inv_product_id])->first();
                //                $this->InProducts->updateAll(['dtls' => $getInv->dtls - 1], ['id' => $prodctdelt->inv_product_id]);
                //                $qnt_upd_arr = [];
                //                $qnt_upd_arr['quantity'] = $getInv->quantity - 1;
                $this->InProducts->updateAll(['quantity' => ((int) $getInv->quantity - 1)], ['id' => $prodctdelt->inv_product_id]);
                if ($getInv->quantity == 1) {
                    //                    $qnt_upd_arr['available_status'] = 2;
                    $this->InProducts->updateAll(['available_status' => 2], ['id' => $prodctdelt->inv_product_id]);
                }
                //                print_r($qnt_upd_arr);exit;
                //                $this->InProducts->updateAll([$qnt_upd_arr], ['id' => $prodctdelt->inv_product_id]);
                $this->UsageProducts->updateAll(['status' => 4], ['product_id' => $prodctdelt->id]);
            }

            if ($productCount >= 1) {
                if (@$userIdp->mail_status == 0) {
                    if ($userIdp->kid_id != '') {
                        $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $userIdp->kid_id]);
                        $notificationsTable = $this->Notifications->newEntity();
                        $data1['user_id'] = $userId;
                        $data1['msg'] = 'styleist has products finalize';
                        $data1['is_read'] = '0';
                        $data1['created'] = date('Y-m-d H:i:s');
                        $data1['kid_id'] = $userIdp->kid_id;
                        $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                        $this->Notifications->save($notificationsTable);
                    } else {
                        $this->Users->updateAll(['is_redirect' => '4'], ['id' => $userId]);
                        $notificationsTable = $this->Notifications->newEntity();
                        $data1['user_id'] = $userId;
                        $data1['msg'] = 'styleist has products finalize';
                        $data1['is_read'] = '0';
                        $data1['created'] = date('Y-m-d H:i:s');
                        $data1['kid_id'] = '0';
                        $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                        $this->Notifications->save($notificationsTable);
                    }

                    $mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1', 'finalize_date' => date('Y-m-d H:i:s')], ['id' => $paymentId]);
                    //$mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1', 'finalize_date' => date('Y-m-d H:i:s')], ['id' => $lastPymentg->id]);
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PRODUCT_FINALIZE'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $getUserDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;

                    $purchase_date = @date_format(@$getUserId->customer_purchasedate, 'm/d/Y');
                    $address1 = $bil_address->address;
                    $address3 = $bil_address->address_line_2;
                    $address2 = $bil_address->state . ' ' . $bil_address->zipcode . ' ' . $bil_address->country;

                    $FITCOUNT = $this->Custom->ToOrdinal($userIdp->count);
                    $STYLEIST_NAME = $this->Custom->emaplyeName($userIdp->emp_id);

                    if ($paymentId) {
                        $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
                        $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 0])->Count();
                        //echo @$exCountKeeps; 

                        if (@$productCount == @$exCountKeeps) {
                            $allKeepsProducts = 1;
                            $percentage = 25;
                        } else {
                            $allKeepsProducts = 2;
                            $percentage = 0;
                        }
                    }


                    //echo $allKeepsProducts; exit;
                    $isstylefee = $this->Custom->isstylefee($paymentId);
                    if (@$isstylefee != 1) {
                        $STYLE_FIT = number_format($this->Settings->find('all')->where(['name' => 'style_fee'])->first()->value - $STYLE_FIT, 2);
                    } else {
                        $ORDER_TOTAL = number_format($allpaymentGetwayAmount + $STYLE_FIT, 2);
                        $STYLE_FIT = 0.00;
                    }

                    if ($allKeepsProducts == 1) {
                        $SUB_TOTAL = number_format($paymentGetwayAmount - $STYLE_FIT, 2);
                        $ALL_KEEP_PERCENTAGE = $percentage;
                        $PERCENTAGE_VALUE = number_format($discount, 2);
                        $ORDER_SUB_TOTAL = number_format($paymentGetwayAmount - $discount, 2);
                        $ORDER_TOTAL = number_format($allpaymentGetwayAmount - $STYLE_FIT, 2);
                    } else {
                        $SUB_TOTAL = number_format($paymentGetwayAmount - $STYLE_FIT, 2);
                        $ORDER_SUB_TOTAL = number_format($paymentGetwayAmount, 2);
                        $ORDER_TOTAL = number_format($paymentGetwayAmount - $STYLE_FIT, 2);
                        $PERCENTAGE_VALUE = '0.00';
                    }
                    $SITE_NAME_LINK = HTTP_ROOT;
                    $shipping_address1 = $payment_address->address . ' <br> ' . $payment_address->address2 . ' <br> ' . $payment_address->city . ' <br> ' . $payment_address->state . ' <br> ' . $payment_address->zipcode . ' <br> ' . $payment_address->country . ' <br> ' . $payment_address->phone;

                    $this->loadModel('SalesNotApplicableState');
                    $sales_tx = $this->Settings->find('all')->where(['name' => 'SALES_TAX'])->first();
                    $sales_tax = 0;
                    if (!empty($payment_address->zipcode)) {
                        $all_sales_tax = $this->SalesNotApplicableState->find('all');
                        $sales_tx_required = "NO";

                        foreach ($all_sales_tax as $sl_tx) {
                            if (($payment_address->zipcode >= $sl_tx->zip_min) && ($payment_address->zipcode <= $sl_tx->zip_max)) {
                                $sales_tx_required = "YES";
                                $sales_tax = $sl_tx->tax_rate / 100;
                            }
                        }

                        //                        if ($sales_tx_required == "YES") {
                        $tt_prc = $ORDER_TOTAL;
                        $tax = $sales_tax;
                        $sales_tax = sprintf("%.2f", $tt_prc) * $tax;
                        $sales_tax = sprintf("%.2f", $sales_tax);
                        //                        }
                    }

                    //                    $new_product_count = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId, 'return_status' => 'N', 'exchange_status' => 'N'])->count();
                    $this->Custom->supplierProductMinus($paymentId);
                    $message = $this->Custom->productFinalize($emailMessage->value, $getUserDetails->name, $STYLEIST_NAME, $track_number, $PRODUCT_DETAILS, $FITCOUNT, $SUB_TOTAL, $ALL_KEEP_PERCENTAGE, $PERCENTAGE_VALUE, $ORDER_SUB_TOTAL, $STYLE_FIT, $ORDER_TOTAL, $sitename, $SITE_NAME_LINK, $shipping_address1, $sales_tax);

                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                    $this->Flash->success(__('Product has been finalize successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId);
                    //exit;
                } else {
                    $this->Flash->error(__('you allready done finalzed'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId);
                    // exit;
                }
            } else {
                $this->Flash->error(__('you allready done finalzed'));
                return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId);
            }
        }
    }

    public function kidallFinalize($paymentId)
    {
        $this->loadModel('BoxOrders');

        $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
        $newBxRw = $this->BoxOrders->newEntity();
        $dataArr['payment_id'] = $paymentId;
        $dataArr['box_type'] = $userIdp->box_type;
        $newBxRw = $this->BoxOrders->patchEntity($newBxRw, $dataArr);
        $this->BoxOrders->save($newBxRw);

        $finaliseCount = @$userIdp->finalize_count + 1;
        $userId = $userIdp->user_id;
        $kidId = $userIdp->kid_id;

        $chk_prod_verification = $this->Products->find('all')->where(['payment_id' => $paymentId]);
        $is_all_verified = 1;
        foreach ($chk_prod_verification as $prd_li) {
            if ($prd_li->is_verified == 0) {
                $is_all_verified = 2;
            }
        }
        if ($is_all_verified == 2) {
            $this->Flash->error(__('Product verification pending.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId . '?verify=now');
        }


        $all_new_finalize_prod = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_finalize !=' => 1]);

        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userIdp->user_id, 'is_billing' => 1])->first();
        if (empty($billingAddress)) {
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userIdp->user_id])->first();
        }

        $track_detls = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_finalize !=' => 1])->first();
        $this->loadModel('SmsSettings');
        $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'FITBOX_SHIPPING_SMS'])->first();
        if (!empty($get_sms_temp)) {
            $txt_msg = str_replace("[SHIPPING_TRACKING_NUMBER]", $track_detls->order_usps_tracking_no, $get_sms_temp->value);
            $txt_msg = str_replace("[ORDER_NUMBER]", "DFPYMID" . $paymentId, $txt_msg);
            $txt_msg = str_replace("[CUSTOMER_PAGE_LINK]", HTTP_ROOT . "order_review/", $txt_msg);
            $txt_msg = str_replace("[UPS_LINK]", "https://www.ups.com/track/", $txt_msg);
            $phone = $billingAddress->country_code . $billingAddress->phone;
            $url = HTTP_ROOT . 'api/sendSmsPost';
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'FITBOX_SHIPPING_SMS'),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        }

        foreach ($all_new_finalize_prod as $prd_li) {
            if (!empty($prd_li->inv_product_id)) {
                $newLogArr = [];
                $newLogArr['product_id'] = $prd_li->inv_product_id;
                $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                $newLogArr['action'] = 'product_finalized';
                $newLogArr['created_on'] = date('Y-m-d H:i:s');
                $newDtRow = $this->InProductLogs->newEntity();
                $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                $this->InProductLogs->save($newDtRow);

                $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Product finalized'], ['id' => $prd_li->inv_product_id]);
            }
        }

        $this->Products->updateAll(['shipping_date' => date('Y-m-d'), 'auto_checkout_date' => date('Y-m-d', strtotime("+20 days"))], ['payment_id' => $paymentId, 'is_finalize !=' => 1]);

        $kid_details = $this->KidsDetails->find('all')->where(['id' => $kidId])->first();
        $exchangeproductlist = $this->Products->find('all')->where(['kid_id' => $kidId, 'is_complete' => 0, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->order(['created' => 'DESC']);
        $exchangeproductCount = $this->Products->find('all')->where(['kid_id' => $kidId, 'is_complete' => 0, 'keep_status' => 2, 'exchange_status' => 'Y', 'user_id' => $userId, 'is_replace' => 0, 'payment_id' => $paymentId])->count();
        $exprice = 0;
        foreach ($exchangeproductlist as $exp) {
            $exprice += $exp->sell_price;
            $this->Products->updateAll(['is_replace' => 1], ['id' => $exp->id]);
        }
        $productdetails = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->order(['created' => 'ASC']);

        $productCount = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId])->count();
        $paymentGetwayAmount = 0;

        foreach ($productdetails as $productPrice) {
            $paymentGetwayAmount += $productPrice->sell_price;
        }

        if (@$PaymentGetways->finalize_count == 0) {
            $percentage = 25;
            $discount = ($percentage / 100) * $paymentGetwayAmount;

            $allpaymentGetwayAmount = $paymentGetwayAmount - $discount - $STYLE_FIT;
        } else if ($exchangeproductCount != 1) {
            $allpaymentGetwayAmount2 = $paymentGetwayAmount - $exprice;
            if ($allpaymentGetwayAmount2 >= 1) {
                $allpaymentGetwayAmount = $allpaymentGetwayAmount2;
            } else {
                $allpaymentGetwayAmount = '0.00';
            }
            $discount = '0.00';
        } else {
            $discount = '0.00';
            $allpaymentGetwayAmount = $paymentGetwayAmount;
        }

        $this->PaymentGetways->updateAll(['finalize_count' => @$finaliseCount], ['id' => $paymentId]);
        $payment_data = $this->PaymentCardDetails->find('all')->where(['id' => $userIdp->payment_card_details_id])->first();
        $payment_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $userId])->first();
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userId, 'is_billing' => 1])->first();
        $email = $this->Users->find('all')->where(['id' => $userId])->first()->email;

        if (true) {
            $getUserDetails = $this->Users->find('all')->where(['id' => $userIdp->user_id])->first();
            $bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $userIdp->user_id, 'is_billing' => 1])->first();
            $PRODUCT_DETAILS = '';
            $PRODUCT_DETAILS .= ' <tr style=" display: inline-block; width: 100%;border-bottom: 1px solid #ccc; border-top: 1px solid #ccc;">
                                    <th style=" display: inline-block; width: 15%; padding: 14px 0px;   border-right: 1px solid #ccc; text-align: center;">ITEM ID</th>
                                    <th style=" display: inline-block; width: 30%">ITEM NAME</th>
                                    <th style=" display: inline-block; width: 17%">SIZE</th>
                                    <th style=" display: inline-block; width: 17%">COLOR</th>
                                    <th style=" display: inline-block; width: 17%; text-align: right;">PRICE</th>
                                </tr>';
            foreach ($productdetails as $prodctdelt) {
                $this->Products->updateAll(['is_finalize' => 1, 'checkedout' => 'N'], ['id' => $prodctdelt->id]);
                $PRODUCT_DETAILS .= "<tr style='display: inline-block; width: 100%; border-bottom: 1px solid #ccc; text-align: center;'>
                                    <td style='display: inline-block; width: 15%;padding: 14px 0px;'>" . $prodctdelt->barcode_value . "</td>      
                                    <td style='display: inline-block; width: 30%'>" . $prodctdelt->product_name_one . "</strong></td>
                                    <td style='display: inline-block; width: 17%'>" . $prodctdelt->size . "</td>
                                    <td style='display: inline-block; width: 17%'>" . $prodctdelt->color . "</td>
                                    <td style='display: inline-block; width: 17%; text-align: right;'>$" . number_format($prodctdelt->sell_price, 2) . "</td>
                                </tr>";
                $track_number = $prodctdelt->order_usps_tracking_no;

                $getInv = $this->InProducts->find('all')->where(['id' => $prodctdelt->inv_product_id])->first();
                //                $qnt_upd_arr = [];
                //                $qnt_upd_arr['quantity'] = $getInv->quantity - 1;
                $this->InProducts->updateAll(['quantity' => ((int) $getInv->quantity - 1)], ['id' => $prodctdelt->inv_product_id]);
                if ($getInv->quantity == 1) {
                    //                    $qnt_upd_arr['available_status'] = 2;
                    $this->InProducts->updateAll(['available_status' => 2], ['id' => $prodctdelt->inv_product_id]);
                }
                //                $this->InProducts->updateAll([$qnt_upd_arr], ['id' => $prodctdelt->inv_product_id]);
            }



            if ($productCount >= 1) {
                if (@$userIdp->mail_status == 0) {
                    if ($userIdp->kid_id != '') {
                        $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $userIdp->kid_id]);
                        $notificationsTable = $this->Notifications->newEntity();
                        $data1['user_id'] = $userId;
                        $data1['msg'] = 'styleist has products finalize';
                        $data1['is_read'] = '0';
                        $data1['created'] = date('Y-m-d H:i:s');
                        $data1['kid_id'] = $userIdp->kid_id;
                        $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                        $this->Notifications->save($notificationsTable);
                    } else {
                        $this->Users->updateAll(['is_redirect' => '4'], ['id' => $userId]);
                        $notificationsTable = $this->Notifications->newEntity();
                        $data1['user_id'] = $userId;
                        $data1['msg'] = 'styleist has products finalize';
                        $data1['is_read'] = '0';
                        $data1['created'] = date('Y-m-d H:i:s');
                        $data1['kid_id'] = '0';
                        $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                        $this->Notifications->save($notificationsTable);
                    }


                    $mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1', 'finalize_date' => date('Y-m-d H:i:s')], ['id' => $paymentId]);
                    //$mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1', 'finalize_date' => date('Y-m-d H:i:s')], ['id' => $lastPymentg->id]);
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PRODUCT_FINALIZE'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $getUserDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;

                    $purchase_date = date_format($getUserId->customer_purchasedate, 'm/d/Y');
                    $address1 = $bil_address->address;
                    $address3 = $bil_address->address_line_2;
                    $address2 = $bil_address->state . ' ' . $bil_address->zipcode . ' ' . $bil_address->country;
                    $FITCOUNT = $this->Custom->ToOrdinal($userIdp->count);
                    $STYLEIST_NAME = $this->Custom->emaplyeName($userIdp->emp_id);

                    if ($paymentId) {
                        $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
                        $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 0])->Count();
                        //echo @$exCountKeeps; 

                        if (@$productCount == @$exCountKeeps) {
                            $allKeepsProducts = 1;
                            $percentage = 25;
                        } else {
                            $allKeepsProducts = 2;
                            $percentage = 0;
                        }
                    }

                    $isstylefee = $this->Custom->isstylefee($paymentId);
                    if (@$isstylefee != 1) {
                        $STYLE_FIT = number_format($this->Settings->find('all')->where(['name' => 'style_fee'])->first()->value, 2);
                    } else {
                        $STYLE_FIT = '0.00';
                    }

                    //echo $allKeepsProducts; exit;
                    if ($allKeepsProducts == 1) {
                        $SUB_TOTAL = number_format($paymentGetwayAmount, 2);
                        $ALL_KEEP_PERCENTAGE = $percentage;
                        $PERCENTAGE_VALUE = number_format($discount, 2);
                        $ORDER_SUB_TOTAL = number_format($paymentGetwayAmount - $discount, 2);
                        $ORDER_TOTAL = number_format($allpaymentGetwayAmount - $STYLE_FIT, 2);
                    } else {
                        $SUB_TOTAL = number_format($paymentGetwayAmount, 2);
                        $ORDER_SUB_TOTAL = number_format($paymentGetwayAmount, 2);
                        $ORDER_TOTAL = number_format($paymentGetwayAmount - $STYLE_FIT, 2);
                        $PERCENTAGE_VALUE = '0.00';
                    }


                    $SITE_NAME_LINK = HTTP_ROOT;
                    $shipping_address1 = $payment_address->address . ' <br> ' . $payment_address->address2 . ' <br> ' . $payment_address->city . ' <br> ' . $payment_address->state . ' <br> ' . $payment_address->zipcode . ' <br> ' . $payment_address->country . ' <br> ' . $payment_address->phone;

                    $this->loadModel('SalesNotApplicableState');
                    $sales_tx = $this->Settings->find('all')->where(['name' => 'SALES_TAX'])->first();
                    $sales_tax = 0;
                    if (!empty($payment_address->zipcode)) {
                        $all_sales_tax = $this->SalesNotApplicableState->find('all');
                        $sales_tx_required = "NO";
                        foreach ($all_sales_tax as $sl_tx) {
                            if (($payment_address->zipcode >= $sl_tx->zip_min) && ($payment_address->zipcode <= $sl_tx->zip_max)) {
                                $sales_tx_required = "YES";
                                $sales_tax = $sl_tx->tax_rate / 100;
                            }
                        }

                        //                        if ($sales_tx_required == "YES") {
                        $tt_prc = $ORDER_TOTAL;
                        $tax = $sales_tax;
                        $sales_tax = sprintf("%.2f", $tt_prc) * $tax;
                        $sales_tax = sprintf("%.2f", $sales_tax);
                        //                        }
                    }

                    //                    $message = $this->Custom->productFinalize($emailMessage->value, $getUserDetails->name, $STYLEIST_NAME, $track_number, $PRODUCT_DETAILS, $FITCOUNT, $SUB_TOTAL, $ALL_KEEP_PERCENTAGE, $PERCENTAGE_VALUE, $ORDER_SUB_TOTAL, $STYLE_FIT, $ORDER_TOTAL, $sitename, $SITE_NAME_LINK, $shipping_address1);
                    //                    $new_product_count = $this->Products->find('all')->where(['is_complete' => 0, 'keep_status' => 0, 'user_id' => $userId, 'payment_id' => $paymentId, 'return_status' => 'N', 'exchange_status' => 'N'])->count();
                    $this->Custom->supplierProductMinus($paymentId);
                    $message = $this->Custom->productFinalize($emailMessage->value, $kid_details->kids_first_name, $STYLEIST_NAME, $track_number, $PRODUCT_DETAILS, $FITCOUNT, $SUB_TOTAL, $ALL_KEEP_PERCENTAGE, $PERCENTAGE_VALUE, $ORDER_SUB_TOTAL, $STYLE_FIT, $ORDER_TOTAL, $sitename, $SITE_NAME_LINK, $shipping_address1, $sales_tax);

                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                    $this->Flash->success(__('Product has been finalize successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId);
                } else {
                    $this->Flash->error(__('you allready done finalzed'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId);
                }
            } else {
                $this->Flash->error(__('you allready done finalzed'));
                return $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId);
            }
        } else {
            $this->Flash->error(__('you allready done finalzed'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkidProfile/' . $paymentId);
        }
    }

    public function customerNonePaidpdf($id = 11) {
        $this->viewBuilder()->layout('');
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 3) {
            $this->CustomerStylist->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $userdetails = $this->CustomerStylist->find('all')->contain(['Users'])->where(['CustomerStylist.employee_id' => $id])->group(['CustomerStylist.id']);
        } elseif ($type == 1) {
            $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
            $staff_assigned_user = array_unique($this->CustomerStylist->find('all')->extract('user_id')->toArray());
            $staff_assigned_emp = array_unique($this->CustomerStylist->find('all')->extract('employee_id')->toArray());
            $userdetails = $this->Users->find('all')->where(['type' => 2])->order(['created_dt' => 'DESC'])->contain(['UserDetails'])->group(['Users.id']);
        }
         if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }
  
          
//            if ($_GET['search_for'] == "kid_name") {
//                $kidname = trim($_GET['search_data']);
//                $userdetails = $userdetails->matching('Users.KidsDetails', function ($q) use ($kidname) {
//                    return $q->where(['kids_first_name LIKE' => "%" . $kidname . "%"]);
//                });
//            }
        }
        
        //pj($userdetails);exit;
        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count', 'staff_assigned_emp'));

        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function customerReports() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 3) {
            $this->CustomerStylist->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $userdetails = $this->CustomerStylist->find('all')->contain(['Users'])->where(['CustomerStylist.employee_id' => $id])->group(['CustomerStylist.id']);

            $count = 0;
//        foreach ($userdetails as $us) {

            $payments[$count]['name'] = ''; //$this->Custom->UserName($us->id);
            $payments[$count]['email'] = '';
            $us->email;
            $payments[$count]['asign'] = '';
            $payments[$count]['created'] = '';
            $us->created_dt;
            $payments[$count]['kidsname'] = 'kid';
            $payments[$count]['gender'] = '';
            ($this->Custom->UserGender($us->id) == 1) ? "Men" : "Women";
            // $payments[$count]['status'] = ($tkt->payment_status == 1) ? "Paid" : "Pending";
//            $count++;
//        }
        } elseif ($type == 1) {
            $data = $this->Users->find('all')->where(['type' => 2])->order(['created_dt' => 'DESC'])->contain(['UserDetails'])->group(['Users.id']);

            if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
                if ($_GET['search_for'] == "user_name") {
                    $username = trim($_GET['search_data']);
                    $data = $data->matching('UserDetails', function ($q) use ($username) {
                        return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                    });
                }
                if ($_GET['search_for'] == "user_last_name") {
                    $username = trim($_GET['search_data']);
                    $data = $data->matching('UserDetails', function ($q) use ($username) {
                        return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                    });
                }
            }

            $count = 0;
            foreach ($data as $user) {
                $getPaidStatus = $this->Custom->ChcckPaid($user->id);
                if ($getPaidStatus != $user->id) {
                    $fulname = $this->Custom->customerFullName($user->id);
                    $payments[$count]['name'] = $fulname;
                    $payments[$count]['email'] = $this->Custom->customerEmail($user->id);
                    $payments[$count]['asign'] = $this->Custom->getStylistName(@$user->id);
                    $payments[$count]['created'] = $user->created_dt;
                    $payments[$count]['kidsname'] = '';
                    $payments[$count]['gender'] = $this->Custom->GenderName(@$user->id);
                    $count++;
                }
                $checkKidDetails = $this->Custom->havingKid($user->id);
                if ($checkKidDetails != 0) {
                    $dataListing = $this->KidsDetails->find()->where(['user_id' => $user->id]);
                    foreach ($dataListing as $list) {
                        $checkPaidDetails = $this->Custom->ChcckPaidKid($list->id);
                        if ($checkPaidDetails != $list->id) {
                            if ($list->kid_count == 1) {
                                $chlid_name = "First child";
                            }
                            if ($list->kid_count == 2) {
                                $chlid_name = "Second child";
                            }
                            if ($list->kid_count == 3) {
                                $chlid_name = "Thrd child";
                            }
                            if ($list->kid_count == 4) {
                                $chlid_name = "Fourth child";
                            }
                            $fulname = $this->Custom->customerFullName($user->id);
                            $payments[$count]['name'] = $this->Custom->UserName($list->user_id);
                            $payments[$count]['email'] = $this->Custom->customerEmail($user->id);
                            $payments[$count]['asign'] = $this->Custom->getStylistIdNameKid(@$list->id);
                            $payments[$count]['created'] = $user->created_dt;
                            $payments[$count]['kidsname'] = !empty($list->kids_first_name) ? $list->kids_first_name : $chlid_name;
                            $payments[$count]['gender'] = 'kid';

                            $count++;
                        }
                    }
                }
            }
        }


        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadCustomerReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function allcustomer() {
        $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
        $userdetails = $this->Users->find('all')->where(['type' => 2])->order(['created_dt' => 'DESC'])->group(['Users.id']);
        $this->set(compact('userdetails'));
    }

    public function allcustomerpdf() {
        $this->viewBuilder()->layout('');
        $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
        $userdetails = $this->Users->find('all')->where(['type' => 2])->order(['created_dt' => 'DESC'])->group(['Users.id']);
        $this->set(compact('userdetails'));
        //$this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count', 'staff_assigned_emp'));
        $true = 1;
        if ($true == '1') {
            // initializing mPDF

            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function allcustomerexcel($value = null) {
        $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
        $data = $this->Users->find('all')->where(['type' => 2])->order(['created_dt' => 'DESC'])->group(['Users.id']);

        $count = 0;
        foreach ($data as $user) {
            $fulname = $this->Custom->customerName($user->id);
            $payments[$count]['date'] = $user->created_dt;
            $payments[$count]['fullname'] = $fulname;
            $payments[$count]['email'] = $this->Custom->customerEmail($user->id);
            $payments[$count]['Gender'] = $this->Custom->GenderName(@$user->id);
            $payments[$count]['asign'] = $this->Custom->getStylistName(@$user->id);
            $payments[$count]['kitcount'] = $this->Custom->countKid(@$user->id);
            $payments[$count]['paidstatus'] = $this->Custom->paidStatus($user->id);
            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadsallcustomerReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function notpaidlist() {
        $userdetails = $this->Users->find('all')->where(['type' => 2])->order(['created_dt' => 'DESC'])->group(['Users.id']);
        $this->set(compact('userdetails'));
    }

    public function notpaidexcel($value = null) {
        $data = $this->Users->find('all')->where(['type' => 2])->order(['created_dt' => 'DESC'])->group(['Users.id']);

        $count = 0;
        foreach ($data as $user) {
            $usr_gnd = '';
            $getPaidStatus = $this->Custom->ChcckPaid($user->id);
            if ($getPaidStatus != $user->id) {
                $fulname = $this->Custom->customerName($user->id);
                $payments[$count]['date'] = $user->created_dt;
                $usr_gnd = $this->Custom->GenderName(@$user->id);
                $payments[$count]['Gender'] = $usr_gnd;
                $payments[$count]['fullname'] = $fulname;
                $payments[$count]['email'] = $this->Custom->customerEmail($user->id);
                $payments[$count]['asign'] = $this->Custom->getStylistName(@$user->id);
                $payments[$count]['Kids'] = '';
                $diff = '';
                if (!empty($usr_gnd)) {
                    $year = '';
                    if ($usr_gnd == 1) {
                        $year = $this->Custom->birthDayMen($user->id);
                    }
                    if ($usr_gnd == 2) {
                        $year = $this->Custom->birthDayWomenMen($user->id);
                    }


                    if (!empty($year)) {
                        $dob = str_replace('/', '-', $year);
                        $diff = (date('Y') - date('Y', strtotime($dob)));
                    }
                }
                $payments[$count]['age'] = $diff;
                $count++;
            }
            $checkKidDetails = $this->Custom->havingKid($user->id);
            if ($checkKidDetails != 0) {
                $dataListing = $this->KidsDetails->find()->where(['user_id' => $user->id]);
                foreach ($dataListing as $list) {
                    $diff = '';
                    $checkPaidDetails = $this->Custom->ChcckPaidKid($list->id);
                    if ($checkPaidDetails != $list->id) {
                        if ($list->kid_count == 1) {
                            $chlid_name = "First child";
                        }
                        if ($list->kid_count == 2) {
                            $chlid_name = "Second child";
                        }
                        if ($list->kid_count == 3) {
                            $chlid_name = "Thrd child";
                        }
                        if ($list->kid_count == 4) {
                            $chlid_name = "Fourth child";
                        }
                        $fulname = $this->Custom->customerName($user->id);
                        $payments[$count]['date'] = $user->created_dt;
                        $payments[$count]['Gender'] = $this->Custom->GenderName(@$user->id);
                        $payments[$count]['fullname'] = $this->Custom->UserName($list->user_id);
                        $payments[$count]['email'] = $this->Custom->customerEmail($user->id);
                        $payments[$count]['asign'] = $this->Custom->getStylistIdNameKid(@$list->id);
                        $payments[$count]['Kids'] = $chlid_name;
                        $year = $this->Custom->kidBirthDay(@$list->id);
                        if (!empty($year)) {
//                            $dob = str_replace('/', '-', $year);
                            $diff = (date('Y') - date('Y', strtotime($year)));
                        }
                        $payments[$count]['age'] = $diff;

                        $count++;
                    }
                }
            }
        }



        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadnotpaidreport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function defaulterCustomerList() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        $notpaid_users = $this->PaymentGetways->find('all')->where(['auto_checkout' => 0, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.mail_status ' => 1, 'PaymentGetways.work_status' => 1, 'PaymentGetways.status' => 1])->group(['PaymentGetways.id']);
        $this->set(compact('notpaid_users'));
    }

    public function autocheckoutlist() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        $notpaid_users = $this->PaymentGetways->find('all')->where(['is_parent_auto_checkout' => 0, 'PaymentGetways.payment_type' => 2, 'auto_checkout' => 1]);
        $this->set(compact('notpaid_users'));
    }

    public function autocheckoutpdf() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        $notpaid_users = $this->PaymentGetways->find('all')->where(['is_parent_auto_checkout' => 0, 'PaymentGetways.payment_type' => 2, 'auto_checkout' => 1]);
        $this->set(compact('notpaid_users'));
        if (true) {
            // initializing mPDF
            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function autocheckoutexcel() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        $notpaid_users = $this->PaymentGetways->find('all')->where(['is_parent_auto_checkout' => 0, 'PaymentGetways.payment_type' => 2, 'auto_checkout' => 1]);
        $count = 0;

        foreach ($notpaid_users as $user) {
            if ($user->profile_type == 1) {
                $ProfileType = "Men";
            } else if ($user->profile_type == 2) {
                $ProfileType = "Women";
            } else {
                $ProfileType = "Kids";
            }
            $payments[$count]['OrderDate'] = date('y-m-d', strtotime($user->created_dt));
            $payments[$count]['Name'] = $this->Custom->UserName($user->user_id);
            $payments[$count]['KidName'] = $this->Custom->kidName($user->kid_id);
            $payments[$count]['Email'] = $this->Custom->customerEmail($user->user_id);
            $payments[$count]['ProfileType'] = $ProfileType;
            $payments[$count]['Stylistname'] = $this->Custom->emaplyeName(@$user->emp_id);
            $payments[$count]['FinalizeDate'] = date('y-m-d', strtotime(@$user->finalize_date));
            $payments[$count]['ProductCount'] = $this->Custom->productCountPrice(@$user->parent_id);
            $payments[$count]['Productprice'] = $user->price;
            $payments[$count]['AutocheckOutdate'] = @$user->auto_check_out_date;
            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->autocheckoutReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function checkOutProcess($id = null) {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $paymentDetails = $this->PaymentGetways->find('all')->where(['id' => $data['id']])->first();
            $getUsersDetails = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $paymentDetails->user_id])->first();
            $getUsers = $this->Users->find('all')->where(['id' => $paymentDetails->user_id])->first();
            if ($paymentDetails->kid_id != 0) {
                $getKidsDetails = $this->KidsDetails->find('all')->where(['id' => $paymentDetails->kid_id])->first();
                $prData = $this->Products->find('all')->where(['Products.kid_id' => $paymentDetails->kid_id, 'Products.is_complete' => 0, 'Products.payment_id' => $paymentDetails->parent_id]);
                $kid = $paymentDetails->kid_id;
            } else {
                $kid = 0;
                $prData = $this->Products->find('all')->where(['user_id' => $paymentDetails->user_id, 'Products.is_complete' => 0, 'Products.kid_id =' => 0, 'Products.payment_id' => $paymentDetails->parent_id]);
            }

            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.id' => $data['card']])->first();
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $payment_data->user_id])->first();
            $arr_user_info = [
                'card_number' => $payment_data->card_number,
                'exp_date' => $payment_data->card_expire,
                'card_code' => "" . $payment_data->cvv,
                'product' => 'Check out order',
                'first_name' => $billingAddress->full_name,
                'last_name' => $billingAddress->full_name,
                'address' => $billingAddress->address,
                'city' => $billingAddress->city,
                'state' => $billingAddress->state,
                'zip' => $billingAddress->zipcode,
                'country' => 'USA',
                'email' => $getUsersDetails->email,
                'amount' => $data['amount'],
                'invice' => @$lastPymentg->id,
                'refId' => 32,
                //'refTransId' =>12,
                'companyName' => 'Drapefit',
                'mode' => $this->Custom->paymentMode(),
            ];
            $message = $this->authorizeCreditCardx($arr_user_info);

            if (@$message['status'] == '1') {
                if (@$paymentDetails->id != '') {
                    $getofferCode = $this->UserAppliedCodeOrderReview->find('all')->where(['payment_id' => $paymentDetails->parent_id]);
                    $allPrice = 0;
                    //pj($getofferCode); 
                    foreach ($getofferCode as $code) {
                        $allPrice += $code->price;
                    }
                    //echo $allPrice; 
                    $walletsEnRE = $this->Wallets->newEntity();
                    $walletsEnRE->user_id = $paymentDetails->user_id;
                    $walletsEnRE->type = 2; //credit
                    $walletsEnRE->balance = $allPrice;
                    $walletsEnRE->created = date('Y-m-d h:i:s');
                    $walletsEnRE->applay_status = 0;
                    $this->Wallets->save($walletsEnRE);
                    //pj($walletsEnRE); exit;
                }

                $paymentG = $this->PaymentGetways->newEntity();
                $table1['user_id'] = $paymentDetails->user_id;
                $table1['kid_id'] = $paymentDetails->kid_id;
                $table1['emp_id'] = $paymentDetails->emp_id;
                $table1['status'] = 1;
                $table1['price'] = $data['amount'];
                $table1['profile_type'] = $paymentDetails->profile_type;
                $table1['payment_type'] = 2;
                $table1['created_dt'] = date('Y-m-d H:i:s');
                $table1['parent_id'] = $paymentDetails->id;
                $table1['mail_status '] = 1;
                $table1['work_status'] = 2;
                $table1['transactions_id'] = $message['TransId'];
                $table1['finalize_date'] = $paymentDetails->finalize_date;
                $table1['auto_checkout'] = 1;
                $table1['auto_check_out_date'] = date('Y-m-d H:i:s');
                $paymentG = $this->PaymentGetways->patchEntity($paymentG, $table1);
                $lastPymentg = $this->PaymentGetways->save($paymentG);
                $this->PaymentGetways->updateAll(['is_parent_auto_checkout' => 1, 'status' => 1, 'work_status' => 2, 'auto_checkout' => 1], ['id' => $paymentDetails->id]);
                $this->PaymentGetways->updateAll(['is_parent_auto_checkout' => 1, 'status' => 1, 'work_status' => 2, 'auto_checkout' => 1], ['id' => $paymentDetails->parent_id]);
                $productData = '';
                foreach ($prData as $dataMail) {
                    $priceMail = $dataMail->sell_price;
                    $img_dd = "";
                    $img_dd = strstr($dataMail->product_image, PRODUCT_IMAGES) ? $dataMail->product_image : PRODUCT_IMAGES . $dataMail->product_image;
                    $productData .= "<tr>
                        <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               # " . $i . "
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                              <img src='" . HTTP_ROOT . $img_dd . "' width='85'/>
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               " . $dataMail->product_name_one . "
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               " . $dataMail->product_name_two . "
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               keep
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               " . $dataMail->size . "
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               $" . number_format($priceMail, 2) . "
                            </td>
                        </tr>";
                    $this->Products->updateAll(['checkedout' => 'Y', 'keep_status' => '3', 'is_complete' => '1'], ['id' => $dataMail->id]);
                    $i++;
                }

                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $getUsers->email;
                $name = $getUsersDetails->first_name . ' ' . $getUsersDetails->last_name;
                $from = $fromMail->value;
                $sitename = SITE_NAME;
                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                $subject = $emailMessage->display;

                $style_pick_total = 0;
                $discount_amt = $this->Custom->styleFitFee();
                foreach ($prData as $pd) {
                    $style_pick_total += (double) $pd->sell_price;
                }

                $percentage = 25;
                $discount = ($percentage / 100) * $style_pick_total;
                $stylist_picks_subtotal = number_format($style_pick_total, 2);
                $keep_all_discount = number_format((!empty($discount) ? $discount : 0), 2);
                $style_fit_fee = number_format($discount_amt, 2);
                $amount = $style_pick_total - $keep_all_discount - $style_fit_fee;
                $subTotal = $amount;
                $Refundamount = 0;
                $gtotal = $subTotal;
                $offerData = '<tr></tr>';
                $email_message = $this->Custom->order($emailMessage->value, $name, $sitename, $productData, $stylist_picks_subtotal, $subTotal, $style_fit_fee, $keep_all_discount, $Refundamount, $gtotal, $offerData);
                $this->Custom->sendEmail($to, $from, $subject, $email_message);
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                //$this->Custom->sendEmail($toSupport, $from, $subject, $email_message);
                //$paymentDetails->kid_id ; exit;
                if (@$paymentDetails->kid_id != 0) {
                    @$kidId = $paymentDetails->kid_id;
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => @$kidId]);
                    $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $paymentDetails->user_id, 'kid_id' => $paymentDetails->kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $paymentDetails->user_id]);
                    $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $paymentDetails->user_id, 'kid_id' => 0]);
                }
                $this->Flash->success(__('Auto checkout is updated '));
                return $this->redirect($this->referer());
            } else {
                $getErrorMeg = $this->Custom->getAllMeg($message['ErrorCode']);
                $this->Flash->error(__($getErrorMeg . $message['ErrorMessage']));
            }
        }


        $user = $this->PaymentGetways->find('all')->where(['id' => $id])->first();
        $this->set(compact('user'));
    }

    public function authorizeCreditCardx($arr_data = []) {
        extract($arr_data);

        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();

        $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);

        $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);

        $refId = 'ref' . time();

        $creditCard = new AnetAPI\CreditCardType();

        $creditCard->setCardNumber($card_number);

        $creditCard->setExpirationDate($exp_date);

        $creditCard->setCardCode($card_code);

        $paymentOne = new AnetAPI\PaymentType();

        $paymentOne->setCreditCard($creditCard);

        $order = new AnetAPI\OrderType();

        $order->setInvoiceNumber($invice);

        $order->setDescription($product);

        $customerAddress = new AnetAPI\CustomerAddressType();

        $customerAddress->setFirstName($first_name);

        $customerAddress->setLastName($last_name);

        $customerAddress->setCompany($companyName);

        $customerAddress->setAddress($address);

        $customerAddress->setCity($city);

        $customerAddress->setState($state);

        $customerAddress->setZip($zip);

        $customerAddress->setCountry($country);

        $customerData = new AnetAPI\CustomerDataType();

        $customerData->setType("individual");

        $customerData->setId("99999456654");

        $customerData->setEmail($email);

        $duplicateWindowSetting = new AnetAPI\SettingType();

        $duplicateWindowSetting->setSettingName("duplicateWindow");

        $duplicateWindowSetting->setSettingValue("60");

        $merchantDefinedField1 = new AnetAPI\UserFieldType();

        $merchantDefinedField1->setName("Drapefit Inc");

        $merchantDefinedField1->setValue("2093065");

        $merchantDefinedField2 = new AnetAPI\UserFieldType();

        $merchantDefinedField2->setName("favoriteColor");

        $merchantDefinedField2->setValue("blue");

        $transactionRequestType = new AnetAPI\TransactionRequestType();

        $transactionRequestType->setTransactionType("authOnlyTransaction");

        $transactionRequestType->setAmount($amount);

        $transactionRequestType->setOrder($order);

        $transactionRequestType->setPayment($paymentOne);

        $transactionRequestType->setBillTo($customerAddress);

        $transactionRequestType->setCustomer($customerData);

        $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);

        $transactionRequestType->addToUserFields($merchantDefinedField1);

        $transactionRequestType->addToUserFields($merchantDefinedField2);

        $request = new AnetAPI\CreateTransactionRequest();

        $request->setMerchantAuthentication($merchantAuthentication);

        $request->setRefId($refId);

        $request->setTransactionRequest($transactionRequestType);

        $controller = new AnetController\CreateTransactionController($request);

        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);

        $msg = array();

        if ($response != null) {

            if ($response->getMessages()->getResultCode() == 'Ok') {

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {

                    $msg['status'] = 1;

                    $msg['TransId'] = $tresponse->getTransId();

                    $msg['Success'] = " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";

                    $msg['ResponseCode'] = " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";

                    $msg['MessageCode'] = " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";

                    $msg['AuthCode'] = " Auth Code: " . $tresponse->getAuthCode() . "\n";

                    $msg['Description'] = " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";

                    $msg['msg'] = " Description: " . $tresponse . "\n";
                } else {

                    if ($tresponse->getErrors() != null) {

                        $msg['ErrorCode'] = " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";

                        $msg['ErrorMessage'] = "Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    }
                }
            } else {

                $msg['error'] = 'error';

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {

                    $msg['ErrorCode'] = " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";

                    $msg['ErrorCode'] = " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                } else {

                    $msg['ErrorCode'] = " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";

                    $msg['ErrorMessage'] = " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                }
            }
        } else {

            echo "No response returned \n";
        }

        return $msg;
    }

    public function authorizeCreditCardUsers($arr_data = []) {
        extract($arr_data);
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
        $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
        $refId = 'ref' . time();
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($card_number);
        $creditCard->setExpirationDate($exp_date);
        $creditCard->setCardCode($card_code);
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($invice);
        $order->setDescription($product);
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($first_name);
        $customerAddress->setLastName($last_name);
        $customerAddress->setCompany($companyName);
        $customerAddress->setAddress($address);
        $customerAddress->setCity($city);
        $customerAddress->setState($state);
        $customerAddress->setZip($zip);
        $customerAddress->setCountry($country);
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setId("99999456654");
        $customerData->setEmail($email);
        $duplicateWindowSetting = new AnetAPI\SettingType();
        $duplicateWindowSetting->setSettingName("duplicateWindow");
        $duplicateWindowSetting->setSettingValue("60");
        $merchantDefinedField1 = new AnetAPI\UserFieldType();
        $merchantDefinedField1->setName("Drapefit Inc");
        $merchantDefinedField1->setValue("2093065");
        $merchantDefinedField2 = new AnetAPI\UserFieldType();
        $merchantDefinedField2->setName("favoriteColor");
        $merchantDefinedField2->setValue("blue");
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
        $transactionRequestType->addToUserFields($merchantDefinedField1);
        $transactionRequestType->addToUserFields($merchantDefinedField2);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        $msg = array();

        if ($response != null) {
            if ($response->getMessages()->getResultCode() == 'Ok') {
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $msg['status'] = 1;
                    $msg['TransId'] = $tresponse->getTransId();
                    $msg['Success'] = " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                    $msg['ResponseCode'] = " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                    $msg['MessageCode'] = " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                    $msg['AuthCode'] = " Auth Code: " . $tresponse->getAuthCode() . "\n";
                    $msg['Description'] = " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";

                    $msg['msg'] = " Description: " . $tresponse . "\n";
                } else {
                    if ($tresponse->getErrors() != null) {
                        $msg['ErrorCode'] = " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        $msg['ErrorMessage'] = "Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    }
                }
            } else {
                $msg['error'] = 'error';
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $msg['ErrorCode'] = " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    $msg['ErrorCode'] = " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                } else {
                    $msg['ErrorCode'] = " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                    $msg['ErrorMessage'] = " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                }
            }
        } else {
            echo "No response returned \n";
        }

        return $msg;
    }

    public function reportpaidlist() {
        $padiList = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1, 2], 'count' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
        $this->set(compact('padiList'));
    }

    public function customerPaidpdf() {
        $padiList = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1, 2], 'count' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
        $this->set(compact('padiList'));
        if (true) {
            $this->Mpdf->init();
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            $this->Mpdf->setOutput('D');
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function customerpaidReports() {
        $userdetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1, 2], 'count' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
        $count = 0;
        foreach ($userdetails as $us) {
            $payments[$count]['RqDate'] = $us->created_dt;
            $payments[$count]['fullName'] = $this->Custom->UserName($us->user_id);
            $payments[$count]['email'] = $this->Custom->customerEmail($us->user_id);
            $payments[$count]['profile'] = ($this->Custom->UserGender($us->user_id) == 1) ? "Men" : "Women";
            $payments[$count]['Fitnumber'] = $us->count;
            $payments[$count]['PreviousStylist'] = $this->Custom->previousStyleistName($us->user_id, $us->user_id, $us->count);
            $payments[$count]['AssignCustomerstylist'] = $this->Custom->emaplyeName($us->emp_id);
            $payments[$count]['KidName'] = $this->Custom->kidName($us->kid_id);
            $year = '';
            $diff = '';
            if ($us->profile_type == 1) {
                $year = $this->Custom->birthDayMen($us->user_id);
            }
            if ($us->profile_type == 2) {
                $year = $this->Custom->birthDayWomenMen($us->user_id);
            }
            if ($us->profile_type == 3) {
                $year = $this->Custom->kidBirthDay($us->kid_id);
            }
            if (!empty($year)) {
//                $dob = str_replace('/', '-', $year);
                $diff = (date('Y') - date('Y', strtotime($year)));
            }

            $payments[$count]['age'] = $diff;
            $payments[$count]['AssignKidstylist'] = $this->Custom->emaplyeName($us->emp_id);
            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->customerpaidReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function previousworklistreports($payment_id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        $mass_kid_product_count = array();
        $mass_product_count = array();
        if ($type == 3) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 1) {
            if ($payment_id) {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.id' => $payment_id])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }
            $mass_product_count = array();
            $i = 1;
            foreach ($userdetails as $details) {
                $kidCount[$i] = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => 3, 'PaymentGetways.user_id' => $details->user_id])->count();
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();

                $i++;
            }

            $staff_assigned_user = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id])->order(['PaymentGetways.created_dt' => 'DESC']);
        }
        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count'));
    }

    public function previousPaidpdf($payment_id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');

        if ($type == 1) {
            if ($payment_id) {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.id' => $payment_id])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }
        }
        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count'));
        if (true) {
            $this->Mpdf->init();
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            $this->Mpdf->setOutput('D');
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function previouspaidReports() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
            $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            $mass_product_count = array();
        }

        $count = 0;
        foreach ($userdetails as $us) {

            if ($us->count == 1) {
                $ptype = 'st';
            } elseif ($us->count == 2) {
                $ptype = 'nd';
            } elseif ($us->count == 3) {
                $ptype = 'rd';
            } else {
                $ptype = 'th';
            }
            $dae = $us->count . $ptype;

            $payments[$count]['fullName'] = $this->Custom->UserName($us->user_id);
            $payments[$count]['gender'] = ($this->Custom->UserGender($us->user_id) == 1) ? "Men" : "Women";
            $payments[$count]['profile'] = $dae;
            $payments[$count]['RqDate'] = $this->Custom->requestDate($us->user_id, $us->kid_id);
            $payments[$count]['PreviousStylist'] = $this->Custom->previousStyleistName($us->user_id, $us->user_id, $us->count);
            $payments[$count]['AssignCustomerstylist'] = $this->Custom->emaplyeName($us->emp_id);
            $payments[$count]['KidName'] = $this->Custom->kidName($us->kid_id);
            $payments[$count]['AssignKidstylist'] = $this->Custom->emaplyeName($us->emp_id);
            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadpreviousworklistReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function styleistwise($value = null) {
        $getUserId = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1])->toArray();
        $getUserData = Hash::extract($getUserId, '{n}.user_id');
        // echo "<pre>";
        //print_r($getUserData);
        if ($value == 1) {
            $stylist = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1, 'work_status IN' => [1, 2]])->group(['id']);
        } else if ($value == '') {
            $stylist = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1, 'work_status IN' => [1, 2]])->group(['id']);
        } else {
            if (!empty($getUserData)) {
                $stylist = $this->CustomerStylist->find('all')->where(['user_id NOT IN' => $getUserData, 'employee_id !=' => 0])->group(['id']);
            } else {
                $stylist = $this->CustomerStylist->find('all')->where(['employee_id !=' => 0])->group(['id']);
            }
        }
        $this->set(compact('stylist', 'value'));
    }

    public function stylistwisepdf($value = null) {
        $getUserId = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1])->toArray();
        $getUserData = Hash::extract($getUserId, '{n}.user_id');
        if ($value == 1) {
            $stylist = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1, 'work_status IN' => [1, 2]])->group(['id']);
        } else if ($value == '') {
            $stylist = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1, 'work_status IN' => [1, 2]])->group(['id']);
        } else {
            if (!empty($getUserData)) {
                $stylist = $this->CustomerStylist->find('all')->where(['user_id NOT IN' => $getUserData, 'employee_id !=' => 0])->group(['id']);
            } else {
                $stylist = $this->CustomerStylist->find('all')->where(['employee_id !=' => 0])->group(['id']);
            }
        }
        //pj($stylist);
        $this->set(compact('stylist', 'value'));
        if (true) {
            $this->Mpdf->init();
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            $this->Mpdf->setOutput('D');
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function stylistwisreport($value = null) {
        $getUserId = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1])->toArray();
        $getUserData = Hash::extract($getUserId, '{n}.user_id');
        if ($value == 1) {
            $stylist = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1, 'work_status IN' => [1, 2]])->group(['id']);
        } else if ($value == '') {
            $stylist = $this->PaymentGetways->find('all')->where(['payment_type' => 1, 'status' => 1, 'work_status IN' => [1, 2]])->group(['id']);
        } else {
            if (!empty($getUserData)) {
                $stylist = $this->CustomerStylist->find('all')->where(['user_id NOT IN' => $getUserData, 'employee_id !=' => 0])->group(['id']);
            } else {
                $stylist = $this->CustomerStylist->find('all')->where(['employee_id !=' => 0])->group(['id']);
            }
        }

        $count = 0;
        foreach ($stylist as $user) {
            if ($value == 1 || $value == '') {
                $fulname = $this->Custom->customerName($user->emp_id);
            } else {
                $fulname = $this->Custom->customerName($user->employee_id);
            }
            $payments[$count]['name'] = $fulname;
            $payments[$count]['email'] = $this->Custom->customerEmail($user->user_id);
            $payments[$count]['assignedcustomer'] = $this->Custom->customerName($user->user_id);
            $payments[$count]['kidname'] = $this->Custom->kidName(@$user->kid_id);
            $payments[$count]['created'] = @$user->created_dt;
            $payments[$count]['status'] = $this->Custom->workStatus($user->work_status);

            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadstylistwiseReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function numberstate($value = null) {
        $getState = $this->ShippingAddress->find('all')->group('state');
        if ($value != '') {
            $data = $this->ShippingAddress->find('all')->where(['state like ' => "%" . $value . "%"]);
        } else {
            $data = $this->ShippingAddress->find('all');
        }

        $this->set(compact('getState', 'value', 'data'));
    }

    public function stateepdf($value = null) {
        $getState = $this->ShippingAddress->find('all')->group('state');
        if ($value != '') {
            $data = $this->ShippingAddress->find('all')->where(['state like ' => "%" . $value . "%"]);
        } else {
            $data = $this->ShippingAddress->find('all');
        }

        $this->set(compact('getState', 'value', 'data'));
        //pj($stylist);
        $this->set(compact('stylist', 'value'));
        if (true) {
            $this->Mpdf->init();
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            $this->Mpdf->setOutput('D');
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function statereport($value = null) {
        $getState = $this->ShippingAddress->find('all')->group('state');
        if ($value != '') {
            $data = $this->ShippingAddress->find('all')->where(['state like ' => "%" . $value . "%"]);
        } else {
            $data = $this->ShippingAddress->find('all');
        }

        $count = 0;
        foreach ($data as $user) {
            $fulname = $this->Custom->customerName($user->user_id);
            $payments[$count]['name'] = $fulname;
            $payments[$count]['email'] = $this->Custom->customerEmail($user->user_id);
            $payments[$count]['kidname'] = $this->Custom->kidName(@$user->kid_id);
            $payments[$count]['state'] = @$user->state;
            $payments[$count]['city'] = @$user->city;
            $payments[$count]['country'] = @$user->country;
            $payments[$count]['zipcode'] = @$user->zipcode;

            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadstateReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    function subscriptions() {
        $AllUserList = $this->LetsPlanYourFirstFix->find('all')->order(['id' => 'desc']);
        $this->set(compact('AllUserList'));
    }

    function betchprocess() {
        $AllUserList = $this->BatchMailingReports->find('all')->order(['id' => 'desc']);
        $this->set(compact('AllUserList'));
    }

    function betchProcessSubscription() {
        $AllUserList = $this->BatchMailingReports->find('all')->where(['process IN' => ['boxUpdate()', 'boxUpdateKid()']])->order(['id' => 'desc']);
        $this->set(compact('AllUserList'));
    }

    function betchProcessSubcriptionPdf() {
        $AllUserList = $this->BatchMailingReports->find('all')->where(['process IN' => ['boxUpdate()', 'boxUpdateKid()']])->order(['id' => 'desc']);
        $this->set(compact('AllUserList'));
        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    function betchprocessPdf() {
        $AllUserList = $this->BatchMailingReports->find('all')->order(['id' => 'desc']);
        $this->set(compact('AllUserList'));
        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function betchprocessReport($value = null) {
        $AllUserList = $this->BatchMailingReports->find('all')->order(['id' => 'desc']);

        $count = 0;
        foreach ($AllUserList as $user) {

            $payments[$count]['email'] = $user->email;
            $payments[$count]['subject'] = $user->subject;
            $payments[$count]['name'] = $user->name;
            $payments[$count]['kid_name'] = $user->kid_name;
            $payments[$count]['status'] = $user->status;
            $payments[$count]['support_email'] = $user->support_email;
            $payments[$count]['support_subject'] = $user->support_subject;
            $payments[$count]['sending_datetime'] = $user->sending_datetime;
            $payments[$count]['support_status'] = $user->support_status;
            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadbetchprocessReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function betchProcessSubcriptionReport($value = null) {
        $AllUserList = $this->BatchMailingReports->find('all')->where(['process IN' => ['boxUpdate()', 'boxUpdateKid()']])->order(['id' => 'desc']);

        $count = 0;
        foreach ($AllUserList as $aduserlist) {

            $payments[$count]['fit_number'] = $this->Custom->paymentProfileCount($aduserlist->fit_number);
            $payments[$count]['email'] = $aduserlist->email;
            $payments[$count]['subject'] = $aduserlist->subject;
            $payments[$count]['name'] = $aduserlist->name;
            $payments[$count]['kid_name'] = $aduserlist->kid_name;
            $payments[$count]['status'] = $aduserlist->status;
            $payments[$count]['support_email'] = $aduserlist->support_email;
            $payments[$count]['support_subject'] = $aduserlist->support_subject;
            $payments[$count]['sending_datetime'] = $aduserlist->sending_datetime;
            $payments[$count]['support_status'] = $aduserlist->support_status;
            $payments[$count]['process'] = $aduserlist->process . ', msg:-' . $aduserlist->payment_message . ',' . $aduserlist->transctions_id;
            $payments[$count]['day'] = $aduserlist->day;
            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadbetchprocessSubcriptionReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function customerpaidReportsx() {
        $userdetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1]])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
        $count = 0;
        foreach ($userdetails as $us) {
            if (!empty($us->user_id)) {
                $userid = $us->user_id;
            } else {
                $userid = 0;
            }
            if (!empty($us->kid_id)) {
                $kid_id = $us->kid_id;
            } else {
                $kid_id = 0;
            }
            if ($us->status == 1) {
                $status = 'Paid';
            } else {
                $status = 'Not Paid';
            }


            $payments[$count]['RqDate'] = $us->created_dt;
            $payments[$count]['fullName'] = $this->Custom->UserName($us->user_id);
            $payments[$count]['profile'] = ($this->Custom->UserGender($us->user_id) == 1) ? "Men" : "Women";
            $payments[$count]['Fitnumber'] = $us->count;
            $payments[$count]['PreviousStylist'] = $this->Custom->previousStyleistName($us->user_id, $us->user_id, $us->count);
            $payments[$count]['AssignCustomerstylist'] = $this->Custom->emaplyeName($us->emp_id);
            $payments[$count]['KidName'] = $this->Custom->kidName($us->kid_id);
            $payments[$count]['AssignKidstylist'] = $this->Custom->emaplyeName($us->emp_id);

            $payments[$count]['batchprocess'] = $this->Custom->batchprocessstatus($userid, $kid_id); //not yet batchprocess//not yet batchprocess for 30days
            $payments[$count]['status'] = $status;
            $payments[$count]['subcriptionapplydate'] = $this->Custom->batchprocessstatus($userid, $kid_id);
            $payments[$count]['payment'] = $this->Custom->paymentdate($userid, $kid_id);
            $payments[$count]['wroklist'] = $this->Custom->paymentstatuss($userid, $kid_id);
            $payments[$count]['email'] = $this->Custom->batchemail($userid);
            $payments[$count]['submailstatus'] = $this->Custom->submailstatus($userid, $kid_id);
            $payments[$count]['userid'] = $userid;

            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->customerpaidReportx($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    function dailyreportsCustom($payments, $fileName) {
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $style = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($style);
        foreach (range('A', 'F') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $head = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S'];
        $count = 0;
        ///SetHeading//
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "userId");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "email");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "name");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "profile");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "KidName");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Fitnumber");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "workstatus");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "stylistfee");

        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "paymenttype");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "finalizeamount");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "checkoutamout");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "returnamount");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "pendingamount");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "totalproduct");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "pendingproduct");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "returnproduct");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "keeproduct");

        //Set Content
        $rowCount = 2;
        $total = count($payments);
        for ($i = 0; $i < $total; $i++) {
            $count = -1;
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['userId']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['profile']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['KidName']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['Fitnumber']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['workstatus']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['stylistfee']);

            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['paymenttype']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['finalizeamount']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['checkoutamout']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['returnamount']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['pendingamount']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['totalproduct']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['pendingproduct']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['returnproduct']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['keeproduct']);

            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);
            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);

            $rowCount++;
        }


        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $filename = 'Drapfit-' . $fileName . ".xlsx";
        $objWriter->save("files/temp_excel/$filename");
        return $filename;
    }

    function dailyreports() {
        $userdetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.work_status IN' => [0, 1, 2]])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
        $count = 0;
        foreach ($userdetails as $us) {
            $payments[$count]['userId'] = $us->user_id;
            $payments[$count]['email'] = $this->Custom->getemail($us->user_id);
            $payments[$count]['name'] = $this->Custom->customerName($us->user_id);
            $payments[$count]['profile'] = ($this->Custom->UserGender($us->user_id) == 1) ? "Men" : "Women";
            $payments[$count]['KidName'] = $this->Custom->kidName($us->kid_id);
            $payments[$count]['Fitnumber'] = $us->count;
            $payments[$count]['workstatus'] = $this->Custom->workStatus($us->work_status);
            $payments[$count]['stylistfee'] = $this->Custom->styleistfee($us->is_style_fee);
            $payments[$count]['paymenttype'] = $this->Custom->paymenttype($us->payment_type);

            $payments[$count]['finalizeamount'] = $this->Custom->finalizeamount($us->id);
            $payments[$count]['checkoutamout'] = $us->price;
            $payments[$count]['returnamount'] = $this->Custom->returnamount($us->id);
            $payments[$count]['pendingamount'] = $this->Custom->pendingamount($us->id);
            $payments[$count]['totalproduct'] = $this->Custom->totalproduct($us->id);
            $payments[$count]['pendingproduct'] = $this->Custom->pendingproduct($us->id);
            $payments[$count]['returnproduct'] = $this->Custom->returnproduct($us->id);
            $payments[$count]['keeproduct'] = $this->Custom->keeproduct($us->id);

            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->dailyreportsCustom($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);

        exit;
    }

    public function clientsBirthday() {
        $this->viewBuilder()->layout('admin');
        $this->ClientsBirthday->deleteAll([1]);
        $data = $this->Users->find('all')->where(['type' => 2])->order(['id' => 'DESC']);
        $birthDayMen = array();
        $birthDayWomen = [];
        foreach ($data as $ds) {
            $getGender = $this->Custom->UserGender($ds->id);
            if ($getGender == 1) {
                $birthDayMen = $this->Custom->birthDayMen($ds->id);
                if ($birthDayMen == '') {
                    $mbdate = NULL;
                } else {
                    $mbdate = date_format(date_create($birthDayMen), 'Y-m-d');
                }


                $clients = $this->ClientsBirthday->newEntity();
                $db['user_id'] = $ds->id;
                $db['email'] = $ds->email;
                $db['name'] = $ds->name;
                $db['kid_name'] = '-';
                $db['profile_type'] = 1;
                $db['birthday'] = $mbdate;
                $db['created'] = date('Y-m-d h:i:s');
                $clients = $this->ClientsBirthday->patchEntity($clients, $db);
                $this->ClientsBirthday->save($clients);
            }
            if ($getGender == 2) {

                $birthDayWomen = $this->Custom->birthDayWomenMen($ds->id);
                if ($birthDayWomen == '') {
                    $wbdate = NULL;
                } else {
                    $wbdate = date_format(date_create($birthDayWomen), 'Y-m-d');
                }
                $clients = $this->ClientsBirthday->newEntity();
                $db['user_id'] = $ds->id;
                $db['email'] = $ds->email;
                $db['name'] = $ds->name;
                $db['kid_name'] = '-';
                $db['profile_type'] = 2;
                $db['birthday'] = $wbdate;
                $db['created'] = date('Y-m-d h:i:s');
                $clients = $this->ClientsBirthday->patchEntity($clients, $db);
                $this->ClientsBirthday->save($clients);
            }

            $getKids = $this->Custom->havingKid($ds->id);
            if ($getKids == 1) {
                $getKids = $this->Custom->kidDeatils($ds->id);
                $birthdayKid = [];
                foreach ($getKids as $kd) {
                    $birthdayKid = $this->Custom->kidBirthDay($kd->id);
                    if ($birthdayKid == '') {
                        $kbdate = NULL;
                    } else {
                        $kbdate = date_format(date_create($birthdayKid), 'Y-m-d');
                    }
                    $clients = $this->ClientsBirthday->newEntity();
                    $db['user_id'] = $ds->id;
                    $db['email'] = $ds->email;
                    $db['name'] = $ds->name;
                    $db['kid_name'] = $kd->kids_first_name;
                    $db['profile_type'] = 3;
                    $db['birthday'] = $kbdate;
                    $db['created'] = date('Y-m-d h:i:s');
                    $clients = $this->ClientsBirthday->patchEntity($clients, $db);
                    $this->ClientsBirthday->save($clients);
                }
            }
        }

        $datas = $this->ClientsBirthday->find('all')->order(['DAYOFYEAR(birthday)' => 'ASC']);

        $this->set(compact('datas'));
    }

    public function notCheckedOutCustomer() {
        // Customer who has not checked out
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.checkedout' => 'N'])->group(['Products.payment_id']);

            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {
                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                    }
                }
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('new_data', 'search_field'));
    }

    public function notCheckedOutCustomerPdf() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {
            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.checkedout' => 'N'])->group(['Products.payment_id']);
            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {
                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                    }
                }
            } else {
                $this->Flash->error(__('No data found.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/');
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('new_data'));
        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            $this->Mpdf->AddPage('L');
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . rand(111, 999) . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function notCheckedOutCustomerExcel($value = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {
            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.checkedout' => 'N'])->group(['Products.payment_id']);
            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {
                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                    }
                }
            } else {
                $this->Flash->error(__('No data found.'));
                $this->redirect(HTTP_ROOT . 'appadmins/');
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }

        $data_list = [];
        $count = 0;
        foreach ($new_data as $n_dt) {
            $user_name = '';
            $user_email = '';
            $kid_name = '';
            $profile_type = '';
            $fit_d = '';
            $pord_d = '';
            $keep_s = '';
            $total_product_price = 0;
            foreach ($n_dt as $ky => $dt) {
                $fnz_dt = '';
                $profile_type = $dt->payment_getway->profile_type;
                if ($profile_type == 1) {
                    $profile_type = "Men";
                }
                if ($profile_type == 2) {
                    $profile_type = "Women";
                }
                if ($profile_type == 3) {
                    $profile_type = "Kid";
                }

                if ($dt->checkedout == 'Y') {
                    if ($dt->keep_status == 3) {
                        $keep_s = 'Keep';
                        $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                    } elseif ($dt->keep_status == 2) {
                        if ($dt->is_altnative_product == 1) {
                            $keep_s = "Exchange Altnative product";
                            $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        } else {
                            $keep_s = 'Exchange';
                            $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        }
                    } elseif ($dt->keep_status == 1) {
                        $keep_s = 'Return';
                        $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        if ($dt->store_return_status == 'Y') {
                            $keep_s .= "*";
                        }
                    } elseif ($dt->keep_status == 0) {
                        $keep_s = 'Pending';
                    }
                } else {
                    $keep_s = 'Pending';
                }
                $user_name = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;
                $user_email = $dt->user->email;
                $kid_name = !empty($dt->kid_id) ? $dt->kid_data : '';
                $fit_d = $dt->payment_getway->count;
                $pord_d .= $dt->product_name_one . " ( " . $keep_s . " ) " . ", "
                        . $dt->in_rack . ", "
                        . $dt->checkedout . ", "
                        . date('d-M-Y', strtotime($dt->created)) . ", "
                        . "$" . $dt->sell_price . ", "
                        . $fnz_dt . ", "
                        . "\r";
                $total_product_price += $dt->sell_price;
            }
            $pord_d .= "Total : $" . $total_product_price
                    . "\r";
            $data_list[$count]['name'] = $user_name;
            $data_list[$count]['email'] = $user_email;
            $data_list[$count]['kids_name'] = $kid_name;
            $data_list[$count]['profile_type'] = $profile_type;
            $data_list[$count]['fit'] = $fit_d;
            $data_list[$count]['products'] = $pord_d;
            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->notCheckedOutCustomerExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function returnNotProcessed() {
        // Checked out already but return not processed
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y'])->group(['Products.payment_id']);

            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {
                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                    }
                }
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('new_data', 'search_field'));
    }

    public function returnNotProcessedPdf() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y'])->group(['Products.payment_id']);

            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {
                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                    }
                }
            } else {
                $this->Flash->error(__('No data found.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/');
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('new_data'));
        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            $this->Mpdf->AddPage('L');
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . rand(111, 999) . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function returnNotProcessedExcel($value = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y'])->group(['Products.payment_id']);

            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y', 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.payment_id' => $list->payment_id, 'Products.store_return_status !=' => 'Y'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {
                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                    }
                }
            } else {
                $this->Flash->error(__('No data found.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/');
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }


        $data_list = [];
        $count = 0;
        foreach ($new_data as $n_dt) {
            $user_name = '';
            $user_email = '';
            $kid_name = '';
            $profile_type = '';
            $fit_d = '';
            $pord_d = '';
            $keep_s = '';
            $total_product_price = 0;
            foreach ($n_dt as $ky => $dt) {
                $fnz_dt = '';
                $profile_type = $dt->payment_getway->profile_type;
                if ($profile_type == 1) {
                    $profile_type = "Men";
                }
                if ($profile_type == 2) {
                    $profile_type = "Women";
                }
                if ($profile_type == 3) {
                    $profile_type = "Kid";
                }

                if ($dt->checkedout == 'Y') {
                    if ($dt->keep_status == 3) {
                        $keep_s = 'Keep';
                        $total_price += $dt->sell_price;
                        $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                    } elseif ($dt->keep_status == 2) {
                        if ($dt->is_altnative_product == 1) {
                            $keep_s = "Exchange Altnative product";
                            $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        } else {
                            $keep_s = 'Exchange';
                            $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        }
                    } elseif ($dt->keep_status == 1) {


                        $keep_s = 'Return';
                        $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        if ($dt->store_return_status == 'Y') {
                            $keep_s .= "<span><i style='color:green'class='fa fa-check'></i></span>";
                        }
                    } elseif ($dt->keep_status == 0) {
                        $keep_s = 'Pending';
                    }
                } else {
                    $keep_s = 'Pending';
                }
                $user_name = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;
                $user_email = $dt->user->email;
                $kid_name = !empty($dt->kid_id) ? $dt->kid_data : '';
                $fit_d = $dt->payment_getway->count;
                $pord_d .= $dt->product_name_one . ", "
                        . $dt->in_rack . ", "
                        . $keep_s . ", "
                        . date('d-M-Y', strtotime($dt->created)) . ", "
                        . "$" . $dt->sell_price
                        . $fnz_dt . ", "
                        . "\r";
                $total_product_price += $dt->sell_price;
            }
            $pord_d .= 'Total : $' . $total_product_price . "\r";
            $data_list[$count]['name'] = $user_name;
            $data_list[$count]['email'] = $user_email;
            $data_list[$count]['kids_name'] = $kid_name;
            $data_list[$count]['profile_type'] = $profile_type;
            $data_list[$count]['fit'] = $fit_d;
            $data_list[$count]['products'] = $pord_d;
            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->notCheckedOutCustomerExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function checkedOutWithProductDetail() {
        // Customer checked out with product details 11m 1s
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.checkedout' => 'Y'])->group(['Products.payment_id']);

            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }



                    $final_payment_amount = $this->PaymentGetways->find('all')->where(['parent_id' => $list->payment_id, 'payment_type' => 2]);
                    $total_user_ord_prc = 0;
                    $total_user_ord_prc_list = '';
                    foreach ($final_payment_amount as $fpap) {

                        if (!empty($fpap->transactions_id)) {
                            $total_user_ord_prc_list .= '$' . $fpap->price . '(Checkout)<br>';
                            $total_user_ord_prc += $fpap->price;
                            if ($fpap->refound_status == 1) {
                                $total_user_ord_prc_list .= '$' . $fpap->refund_amount . '(Refund)<br>';
                                $total_user_ord_prc -= $fpap->refund_amount;
                            }
                        }
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {

                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['paymentGetway'] = $list->payment_getway;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                        $new_data[$list->payment_id][$ky]['total_checkout_price'] = $total_user_ord_prc_list . 'Total : $' . $total_user_ord_prc;
                    }
                }
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('new_data', 'search_field'));
    }

    public function checkedOutWithProductDetailPdf() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.checkedout' => 'Y'])->group(['Products.payment_id']);

            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }



                    $final_payment_amount = $this->PaymentGetways->find('all')->where(['parent_id' => $list->payment_id, 'payment_type' => 2]);
                    $total_user_ord_prc = 0;
                    $total_user_ord_prc_list = '';
                    foreach ($final_payment_amount as $fpap) {

                        if (!empty($fpap->transactions_id)) {
                            $total_user_ord_prc_list .= '$' . $fpap->price . '(Checkout)<br>';
                            $total_user_ord_prc += $fpap->price;
                            if ($fpap->refound_status == 1) {
                                $total_user_ord_prc_list .= '$' . $fpap->refund_amount . '(Refund)<br>';
                                $total_user_ord_prc -= $fpap->refund_amount;
                            }
                        }
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {

                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['paymentGetway'] = $list->payment_getway;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                        $new_data[$list->payment_id][$ky]['total_checkout_price'] = $total_user_ord_prc_list . 'Total : $' . $total_user_ord_prc;
                    }
                }
            } else {
                $this->Flash->error(__('No data found.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/');
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('new_data'));
        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            $this->Mpdf->AddPage('L');
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . rand(111, 999) . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function checkedOutWithProductDetailExcel($value = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotCheckedoutUsers = $this->Products->find('all')->where(['Products.checkedout' => 'Y'])->group(['Products.payment_id']);

            $new_data = [];
            if (!empty($getNotCheckedoutUsers->count())) {
                foreach ($getNotCheckedoutUsers as $key => $list) {
                    $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                    $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                    $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                    $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                    if (!empty($_GET['search_year'])) {
                        $year = $_GET['search_year'];
                        $search_field = 'search_year=' . $_GET['search_year'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $year])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_month'])) {
                        $mn_yr = explode('/', $_GET['search_month']);
                        $search_field = 'search_month=' . $_GET['search_month'];
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'YEAR(Products.created)' => $mn_yr[1], 'MONTH(Products.created)' => $mn_yr[0]])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    } elseif (!empty($_GET['search_date'])) {
                        $dt_mn_yr = explode('/', $_GET['search_date']);
                        $search_field = 'search_date=' . $_GET['search_date'];
                        $dt_mn_yyr = date('Y-m-d', strtotime($dt_mn_yr[2] . '-' . $dt_mn_yr[0] . '-' . $dt_mn_yr[1]));
                        //'YEAR(Products.created)' => $dt_mn_yr[2], 'MONTH(Products.created)' => $dt_mn_yr[0],'DATE(Products.created)' => $dt_mn_yr[1]
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id, 'Products.created LIKE' => '%' . $dt_mn_yyr . '%'])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
//                        echo "<pre>";
//                        print_r($all_prodc_det);exit;
                    } else {
                        $search_field = '';
                        $all_prodc_det = $this->Products->find('all')->where(['Products.payment_id' => $list->payment_id])->contain(['UserDetails' => [
                                'fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'KidsDetails' => ['fields' => ['user_id', 'kids_first_name']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count', 'PaymentGetways.profile_type', 'PaymentGetways.finalize_date']]]);
                    }



                    $final_payment_amount = $this->PaymentGetways->find('all')->where(['parent_id' => $list->payment_id, 'payment_type' => 2]);
                    $total_user_ord_prc = 0;
                    $total_user_ord_prc_list = '';
                    foreach ($final_payment_amount as $fpap) {

                        if (!empty($fpap->transactions_id)) {
                            $total_user_ord_prc_list .= '$' . $fpap->price . '(Checkout)<br>';
                            $total_user_ord_prc += $fpap->price;
                            if ($fpap->refound_status == 1) {
                                $total_user_ord_prc_list .= '$' . $fpap->refund_amount . '(Refund)<br>';
                                $total_user_ord_prc -= $fpap->refund_amount;
                            }
                        }
                    }

                    foreach ($all_prodc_det as $ky => $prdc_li) {

                        $new_data[$list->payment_id][$ky]['payment_id'] = $list->payment_id;
                        $new_data[$list->payment_id][$ky]['paymentGetway'] = $list->payment_getway;
                        $new_data[$list->payment_id][$ky]['profile_type'] = $list->payment_getway->profile_type;
                        $new_data[$list->payment_id][$ky]['fit_number'] = $list->payment_getway->count;
                        $new_data[$list->payment_id][$ky] = $prdc_li;
                        if ($list->kid_id != 0) {
                            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                            $kid_data = $prdc_li->kids_detail->kids_first_name;
                            $new_data[$list->payment_id][$ky]['kid_data'] = $kid_data;
                        }
                        $new_data[$list->payment_id][$ky]['total_checkout_price'] = $total_user_ord_prc_list . 'Total : $' . $total_user_ord_prc;
                        $new_data[$list->payment_id][$ky]['final_paid_amt'] = $total_user_ord_prc;
                    }
                }
            } else {
                $this->Flash->error(__('No data found.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/');
            }
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }


        $data_list = [];
        $count = 0;
        foreach ($new_data as $n_dt) {
            $user_name = '';
            $user_email = '';
            $kid_name = '';
            $profile_type = '';
            $fit_d = '';
            $pord_d = '';
            $keep_s = '';
            $total_price = 0;
            $total_product_price = 0;
            $total_checkout_price = 0;
            foreach ($n_dt as $ky => $dt) {
                $fnz_dt = '';
                $profile_type = $dt->payment_getway->profile_type;
                if ($profile_type == 1) {
                    $profile_type = "Men";
                }
                if ($profile_type == 2) {
                    $profile_type = "Women";
                }
                if ($profile_type == 3) {
                    $profile_type = "Kid";
                }

                if ($dt->checkedout == 'Y') {
                    if ($dt->keep_status == 3) {
                        $keep_s = 'Keep';
                        $total_price += $dt->sell_price;
                        $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                    } elseif ($dt->keep_status == 2) {
                        if ($dt->is_altnative_product == 1) {
                            $keep_s = "Exchange Altnative product";
                            $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        } else {
                            $keep_s = 'Exchange';
                            $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        }
                    } elseif ($dt->keep_status == 1) {
                        $keep_s = 'Return';
                        $fnz_dt = date('d-M-Y', strtotime($dt->payment_getway->finalize_date));
                        if ($dt->store_return_status == 'Y') {
                            $keep_s .= "*";
                        }
                    } elseif ($dt->keep_status == 0) {
                        $keep_s = 'Pending';
                    }
                } else {
                    $keep_s = 'Pending';
                }
                $user_name = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;
                $user_email = $dt->user->email;
                $kid_name = !empty($dt->kid_id) ? $dt->kid_data : '';
                $fit_d = $dt->payment_getway->count;
                $total_checkout_price = !empty($dt->total_checkout_price) ? $dt->total_checkout_price : '0';
                $pord_d .= $dt->product_name_one . ", "
                        . $keep_s . ", "
                        . $dt->in_rack . ", "
                        . date('d-M-Y', strtotime($dt->created)) . ", "
                        . '$' . $dt->sell_price . ", "
                        . $fnz_dt . ", "
                        . "\r";
                $total_product_price += $dt->sell_price;
            }
            $pord_d .= 'Total : ' . $total_product_price
                    . "\r";
            $data_list[$count]['name'] = $user_name;
            $data_list[$count]['email'] = $user_email;
            $data_list[$count]['kids_name'] = $kid_name;
            $data_list[$count]['profile_type'] = $profile_type;
            $data_list[$count]['fit'] = $fit_d;
            $data_list[$count]['products'] = $pord_d;
            $data_list[$count]['total_price'] = '$' . $total_checkout_price;
            $data_list[$count]['final_total_prc'] = $dt->final_paid_amt;
            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->CheckedOutProductDetailExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function offerPromocode($promoId = null) {
        $this->loadModel('OfferPromocode');
        $promotEditDetails = [];
        if (!empty($promoId)) {
            $promotEditDetails = $this->OfferPromocode->find('all')->where(['id' => $promoId])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $promocode = $this->OfferPromocode->newEntity();
            if (@$data['id']) {
                $data['id'] = $data['id'];
            } else {
                $data['is_active'] = 1;
            }
            $data['expiry_date'] = date('Y-m-d h:i:s', strtotime($data['expiry_date']));
            $data['created_dt'] = date('Y-m-d h:i:s', strtotime($data['created_dt']));
            $promocode = $this->OfferPromocode->patchEntity($promocode, $data);
            $this->OfferPromocode->save($promocode);
            if (@$data['id']) {
                $this->Flash->success(__('Data has been updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/offer_promocode/' . @$data['id']);
            } else {

                $this->Flash->success(__('Data has been added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/offer_promocode');
            }
        }
        $promodetails = $this->OfferPromocode->find('all');
        $this->set(compact('promodetails', 'promotEditDetails', 'promoId'));
    }

//UserMailTemplatePromocode

    public function deleteofferpromo($promoid = null) {
        $this->loadModel('OfferPromocode');

        if ($promoid) {
            $this->OfferPromocode->deleteAll(['id' => $promoid]);
            $this->Flash->success(__('Data deleted successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/offer_promocode');
        }
        exit;
    }

    public function stripeRefund($arr_data = []) {

        extract($arr_data);

        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();
       
        $stripe_token = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );
        \Stripe\Stripe::setApiKey($stripe_token['secret_key']);
        try {

            $res = \Stripe\Refund::create([
                        'amount' => round($amount, 2, PHP_ROUND_HALF_UP) * 100,
                        'charge' => $charge_id,
            ]);

            $msg['Code'] = 1;
            $ref_res = $res->jsonSerialize();
            $msg['RCode'] = $ref_res['id'];
            $msg['TRANS'] = $ref_res['balance_transaction'];
            $msg['msg'] = 'Refund completed';
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
//            echo 'Status is:' . $e->getHttpStatus() . '\n';
//            echo 'Type is:' . $e->getError()->type . '\n';
//            echo 'Code is:' . $e->getError()->code . '\n';
//            // param is '' in this case
//            echo 'Param is:' . $e->getError()->param . '\n';
//            echo 'Message is:' . $e->getError()->message . '\n';
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['msg'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\RateLimitException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['msg'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['msg'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\AuthenticationException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['msg'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['msg'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['msg'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Error\Base $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['msg'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (Exception $e) {
            echo "No response returned \n";
            $msg['error'] = 'error';
            $msg['msg'] = 'Refund failed';
            return $msg;
        }

        return $msg;
        exit;
    }

    public function influencer($option = null, $id = null) {
        $this->loadModel('Influencers');
        $all_influencer = $this->Influencers->find('all')->order(['id' => 'DESC']);

        $edit_data = [];
        if (!empty($id)) {
            $edit_data = $this->Influencers->find('all')->where(['id' => $id])->first();
        }
        if (!empty($option) && !empty($id) && ($option == "delete")) {
            $this->Influencers->deleteAll(['id' => $id]);
            $this->Flash->success(__('Influencer removed successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/influencer');
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (empty($id)) {
                $chk = $this->Influencers->find('all')->where(['email' => $data['email']])->count();
                if ($chk > 0) {
                    $this->Flash->erroe(__('Influencer already present.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/influencer');
                }
            }
            $user = $this->Influencers->newEntity();

            $user = $this->Influencers->patchEntity($user, $data);
            if (empty($id)) {
                $user->uniq_id = sha1($data['email']);
            }
            if ($this->Influencers->save($user)) {
                if (@$data['id']) {
                    $this->Flash->success(__('Influencer details updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/influencer/edit/' . @$data['id']);
                } else {
                    $this->Flash->success(__('Influencer added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/influencer');
                }
            }
        }

        $this->set(compact('all_influencer', 'edit_data', 'id'));
    }

    public function salesNotApplicableState($option = null, $id = null) {
        $this->loadModel('SalesNotApplicableState');
        $all_data = $this->SalesNotApplicableState->find('all')->order(['id' => 'DESC']);

        $edit_data = [];
        if (!empty($id)) {
            $edit_data = $this->SalesNotApplicableState->find('all')->where(['id' => $id])->first();
        }
        if (!empty($option) && !empty($id) && ($option == "delete")) {
            $this->SalesNotApplicableState->deleteAll(['id' => $id]);
            $this->Flash->success(__('Data removed successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/salesNotApplicableState');
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $newRw = $this->SalesNotApplicableState->newEntity();

            $newRw = $this->SalesNotApplicableState->patchEntity($newRw, $data);

            if ($this->SalesNotApplicableState->save($newRw)) {
                if (@$data['id']) {
                    $this->Flash->success(__('Data updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/salesNotApplicableState/edit/' . @$data['id']);
                } else {
                    $this->Flash->success(__('Data added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/salesNotApplicableState');
                }
            }
        }

        $this->set(compact('all_data', 'edit_data', 'id'));
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
        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');

        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr'])->where([
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

    public function predictionMatching($id) {
        $getData = $this->PaymentGetways->find('all')->where(['id' => $id])->first();
        if ($getData->kid_id == 0) {
            $userDetails = $this->UserDetails->find('all')->where(['user_id' => $getData->user_id])->first();
            $gender = $userDetails->gender;
            if ($gender == 1) { // Men
                $where_profle = ['profile_type' => $gender];
                //echo $getData->user_id; exit;
                $getProducts = $this->Custom->menMatching($getData->user_id);
            }
            if ($gender == 2) { // Women
                $where_profle = ['profile_type' => $gender];
                $getProducts = $this->Custom->womenMatching($getData->user_id);
//               echo "<pre style='margin-left:233px;'>";
//               print_r($getData->user_id);
//               print_r($getProducts);
//               echo "</pre>";
            }
        } else {
            $userDetails = $this->KidsDetails->find('all')->where(['id' => $getData->kid_id])->first();
            if ($userDetails->kids_clothing_gender == 'girls') {
                $gender = 4; // Girl kid
                $where_profle = ['profile_type' => $gender];
                $getProducts = $this->Custom->girlsMatching($getData->user_id, $getData->kid_id);
            } else {
                $gender = 3; // Boy kid
                $where_profle = ['profile_type' => $gender];
                $getProducts = $this->Custom->boyMatching($getData->user_id, $getData->kid_id);
            }
        }

        $this->set(compact('userDetails', 'gender', 'getProducts', 'id', 'getData'));
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
        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');

        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr'])->where([
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
        $this->PaymentGetways->hasMany('product', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $this->PaymentGetways->hasOne('parent_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id'])->setConditions(['parent_fix.kid_id' => 0]);
        $this->PaymentGetways->hasOne('parent_detail', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.user_id'])->contain(['parent_fix', 'parent_detail', 'product', 'usr'])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                ->bind(':start', $start_date, 'date')
                ->bind(':end', $end_date, 'date');

        $this->PaymentGetways->hasOne('kid_fix', ['className' => 'LetsPlanYourFirstFix', 'foreignKey' => 'kid_id', 'bindingKey' => 'kid_id']);
        $this->PaymentGetways->belongsTo('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);

        $paid_customer_kid = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.kid_id !=' => 0])->order(['PaymentGetways.id' => 'desc'])->group(['PaymentGetways.kid_id'])->contain(['kid_fix', 'kid_detail', 'product', 'usr'])->where([
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

    public function browseProducts($payment_id)
    {
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

        $this->InProducts->belongsTo('brand', ['className' => 'InUsers', 'foreignKey' => 'user_id']);
        if (!empty($prev_products)) {
            /* $product_list */
            $product_list1 = $this->InProducts->find('all')->contain(['brand'])->order(['InProducts.id' => 'DESC'])->where(['OR' => ['is_clearance' => 2, 'is_clearance IS' => NULL], 'InProducts.available_status !=' => 2, 'InProducts.is_active !=' => 0, 'InProducts.profile_type' => $gender, 'InProducts.prod_id NOT IN' => $prev_products, 'InProducts.quantity >' => 0, 'InProducts.match_status' => 2])->group('prod_id');
        } else {
            /* $product_list */
            $product_list1 = $this->InProducts->find('all')->contain(['brand'])->order(['InProducts.id' => 'DESC'])->where(['OR' => ['is_clearance' => 2, 'is_clearance IS' => NULL], 'InProducts.available_status !=' => 2, 'InProducts.is_active !=' => 0, 'InProducts.profile_type' => $gender, 'InProducts.quantity >' => 0, 'InProducts.match_status' => 2])->group('prod_id');
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
                $product_list1 = $product_list1->where(['InProducts.style_number LIKE' => "%" . $get_data_value . "%"]);
            }
            if ($_GET['search_for'] == "bar_code") {
                $get_data_value = trim($_GET['search_data']);
                $product_list1 = $product_list1->where(['InProducts.dtls LIKE' => "%" . $get_data_value . "%"]);
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

        $this->set(compact('product_list', 'userDetails', 'payment_id', 'u_name'));
    }

    public function listOfProductsNotReturned() {
        // Checked out already but return not processed
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y'])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('getNotReturnProductList'));
    }

    public function listOfProductsNotReturnedPdf() {

        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {

            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y'])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('getNotReturnProductList'));

        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            $this->Mpdf->AddPage('L');
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . rand(111, 999) . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function listOfProductsNotReturnedExcel($value = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if (in_array($type, [1, 9])) {
            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y'])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }


        $data_list = [];
        $count = 0;
        foreach ($getNotReturnProductList as $n_dt) {
            $data_list[$count]['name'] = $n_dt->product_name_one;
            $data_list[$count]['price'] = $n_dt->sell_price;
            $data_list[$count]['created'] = date('d-M-Y', strtotime($n_dt->created));
            $data_list[$count]['bar_code'] = $n_dt->barcode_value;
            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->listOfProductsNotReturnedExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function monthlySales() {
        // Checked out already but return not processed
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }

            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status' => 3, 'Products.customer_purchase_status' => 'Y', 'YEAR(Products.customer_purchasedate)' => $year, 'MONTH(Products.customer_purchasedate)' => $month])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('getNotReturnProductList', 'month', 'year'));
    }

    public function monthlySalesPdf() {

        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }
            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status' => 3, 'Products.customer_purchase_status' => 'Y', 'YEAR(Products.customer_purchasedate)' => $year, 'MONTH(Products.customer_purchasedate)' => $month])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('getNotReturnProductList'));

        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            $this->Mpdf->AddPage('L');
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . rand(111, 999) . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function monthlySalesExcel($value = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }
            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status' => 3, 'Products.customer_purchase_status' => 'Y', 'YEAR(Products.customer_purchasedate)' => $year, 'MONTH(Products.customer_purchasedate)' => $month])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }


        $data_list = [];
        $count = 0;
        foreach ($getNotReturnProductList as $n_dt) {
            $data_list[$count]['name'] = $n_dt->product_name_one;
            $data_list[$count]['price'] = $n_dt->sell_price;
            $data_list[$count]['customer_purchasedate'] = date('d-M-Y', strtotime($n_dt->customer_purchasedate));
            $data_list[$count]['bar_code'] = $n_dt->barcode_value;
            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->monthlySalesExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function monthlyRevenue() {
        // Checked out already but return not processed
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }

            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status' => 3, 'Products.customer_purchase_status' => 'Y', 'YEAR(Products.customer_purchasedate)' => $year, 'MONTH(Products.customer_purchasedate)' => $month])->group(['Products.payment_id']);
            $totalSalePrice = $getNotReturnProductList->sumOf('sell_price');
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('getNotReturnProductList', 'month', 'year', 'totalSalePrice'));
    }

    public function monthlyRevenuePdf() {

        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }
            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status' => 3, 'Products.customer_purchase_status' => 'Y', 'YEAR(Products.customer_purchasedate)' => $year, 'MONTH(Products.customer_purchasedate)' => $month])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }

        $this->set(compact('getNotReturnProductList'));

        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            $this->Mpdf->AddPage('L');
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . rand(111, 999) . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function monthlyRevenueExcel($value = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }
            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status' => 3, 'Products.customer_purchase_status' => 'Y', 'YEAR(Products.customer_purchasedate)' => $year, 'MONTH(Products.customer_purchasedate)' => $month])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }


        $data_list = [];
        $count = 0;
        foreach ($getNotReturnProductList as $n_dt) {
            $data_list[$count]['name'] = $n_dt->product_name_one;
            $data_list[$count]['price'] = $n_dt->sell_price;
            $data_list[$count]['customer_purchasedate'] = date('d-M-Y', strtotime($n_dt->customer_purchasedate));
            $data_list[$count]['bar_code'] = $n_dt->barcode_value;
            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->monthlyRevenueExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function monthlyLoss() {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }
            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $year, 'MONTH(Products.created)' => $month])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->set(compact('getNotReturnProductList', 'month', 'year'));
    }

    public function monthlyLossPdf() {

        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }
            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $year, 'MONTH(Products.created)' => $month])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }

        $this->set(compact('getNotReturnProductList'));

        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            $this->Mpdf->AddPage('L');
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . rand(111, 999) . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function monthlyLossExcel($value = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $month = date('m');
            $year = date('Y');
            if (!empty($_GET['month'])) {
                $month = str_pad($_GET['month'], "0", STR_PAD_LEFT);
            }
            if (!empty($_GET['year'])) {
                $year = $_GET['year'];
            }
            $getNotReturnProductList = $this->Products->find('all')->where(['Products.keep_status IN' => [1, 2], 'Products.store_return_status !=' => 'Y', 'YEAR(Products.created)' => $year, 'MONTH(Products.created)' => $month])->group(['Products.payment_id']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }


        $data_list = [];
        $count = 0;
        foreach ($getNotReturnProductList as $n_dt) {
            $data_list[$count]['name'] = $n_dt->product_name_one;
            $data_list[$count]['price'] = $n_dt->sell_price;
            $data_list[$count]['created'] = date('d-M-Y', strtotime($n_dt->created));
            $data_list[$count]['bar_code'] = $n_dt->barcode_value;
            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->monthlyLossExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function inventoryReport() {
        $this->loadModel('InUsers');
        $this->InUsers->hasMany('men', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['men.profile_type' => 1, 'men.match_status' => 2]);
        $this->InUsers->hasMany('women', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['women.profile_type' => 2, 'women.match_status' => 2]);
        $this->InUsers->hasMany('boy', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['boy.profile_type' => 3, 'boy.match_status' => 2]);
        $this->InUsers->hasMany('girl', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['girl.profile_type' => 4, 'girl.match_status' => 2]);
        $user_product_list = $this->InUsers->find('all')->contain(['men', 'women', 'boy', 'girl']);
        $this->set(compact('user_product_list'));
    }

    public function inventoryReportPdf() {

        $this->loadModel('InUsers');
        $this->InUsers->hasMany('men', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['men.profile_type' => 1, 'men.match_status' => 2]);
        $this->InUsers->hasMany('women', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['women.profile_type' => 2, 'women.match_status' => 2]);
        $this->InUsers->hasMany('boy', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['boy.profile_type' => 3, 'boy.match_status' => 2]);
        $this->InUsers->hasMany('girl', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['girl.profile_type' => 4, 'girl.match_status' => 2]);
        $user_product_list = $this->InUsers->find('all')->contain(['men', 'women', 'boy', 'girl']);
        $this->set(compact('user_product_list'));

        if (true) {
            // initializing mPDF

            $this->Mpdf->init();
            $this->Mpdf->AddPage('L');
            // setting filename of output pdf file
            $this->Mpdf->setFilename(REPORT_PDF . time() . rand(111, 999) . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('D');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function inventoryReportExcel($value = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        if ($type == 1) {
            $this->loadModel('InUsers');
            $this->InUsers->hasMany('men', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['men.profile_type' => 1, 'men.match_status' => 2]);
            $this->InUsers->hasMany('women', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['women.profile_type' => 2, 'women.match_status' => 2]);
            $this->InUsers->hasMany('boy', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['boy.profile_type' => 3, 'boy.match_status' => 2]);
            $this->InUsers->hasMany('girl', ['className' => 'InProducts', 'foreignKey' => 'brand_id'])->setConditions(['girl.profile_type' => 4, 'girl.match_status' => 2]);
            $user_product_list = $this->InUsers->find('all')->contain(['men', 'women', 'boy', 'girl']);
        } else {
            $this->Flash->error(__('You are not allowed to access.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }


        $data_list = [];
        $count = 0;
        foreach ($user_product_list as $n_dt) {
            $data_list[$count]['name'] = $n_dt->name . ' ' . $n_dt->last_name;
            $tt_m_pc = 0;
            foreach ($n_dt->men as $mn_li) {
                $tt_m_pc += $mn_li->sale_price;
            }
            $data_list[$count]['men'] = count($n_dt->men);
            $data_list[$count]['men_total'] = number_format($tt_m_pc, 2, '.', '');

            $tt_w_pc = 0;
            foreach ($n_dt->women as $mn_li) {
                $tt_w_pc += $mn_li->sale_price;
            }
            $data_list[$count]['women'] = count($n_dt->women);
            $data_list[$count]['women_total'] = number_format($tt_w_pc, 2, '.', '');

            $tt_b_pc = 0;
            foreach ($n_dt->boy as $mn_li) {
                $tt_b_pc += $mn_li->sale_price;
            }
            $data_list[$count]['boy'] = count($n_dt->boy);
            $data_list[$count]['boy_total'] = number_format($tt_b_pc, 2, '.', '');

            $tt_g_pc = 0;
            foreach ($n_dt->girl as $mn_li) {
                $tt_g_pc += $mn_li->sale_price;
            }
            $data_list[$count]['girl'] = count($n_dt->girl);
            $data_list[$count]['girl_total'] = number_format($tt_g_pc, 2, '.', '');
            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->inventoryReportExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function fundrefundExcel($value = null) {
        $AllUserList = $this->PaymentGetways->find('all')->where(['work_status IN' => [0, 1, 2], 'refound_status !=' => 1, 'status' => 1])->order(['id' => 'desc']);

        $data_list = [];
        $count = 0;
        foreach ($AllUserList as $aduserlist) {
            $data_list[$count]['date'] = $aduserlist->created_dt;

            $name = $this->Custom->customerName($aduserlist->user_id);
            if ($aduserlist->profile_type == 3) {
                $name .= " Kid's (" . $this->Custom->kidName($aduserlist->kid_id) . ")";
            }
            $data_list[$count]['name'] = $name;

            $data_list[$count]['email'] = $this->Custom->customerEmail($aduserlist->user_id);

            if ($aduserlist->profile_type == 1) {
                $profile_typ = "Men";
            } else if ($aduserlist->profile_type == 2) {
                $profile_typ = "Wemen";
            } else if ($aduserlist->profile_type == 3) {
                $profile_typ = "Kid";
            }
            $data_list[$count]['profile_typ'] = $profile_typ;

            $data_list[$count]['fit'] = $aduserlist->count;

            $data_list[$count]['transactions_id'] = $aduserlist->transactions_id;

            $data_list[$count]['price'] = $aduserlist->price;

            if ($aduserlist->payment_type == 1) {
                $payment_type = "Box order";
            } else {
                $payment_type = "Checkout order";
            }
            $data_list[$count]['payment_type'] = $payment_type;

            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->fundrefundExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function fundrefundlistExcel($value = null) {
        $AllUserList = $this->PaymentGetways->find('all')->where(['refound_status' => 1, 'status' => 1])->order(['id' => 'desc']);

        $data_list = [];
        $count = 0;
        foreach ($AllUserList as $aduserlist) {
            $data_list[$count]['date'] = $aduserlist->created_dt;

            $name = $this->Custom->customerName($aduserlist->user_id);
            if ($aduserlist->profile_type == 3) {
                $name .= " Kid's (" . $this->Custom->kidName($aduserlist->kid_id) . ")";
            }
            $data_list[$count]['name'] = $name;

            $data_list[$count]['email'] = $this->Custom->customerEmail($aduserlist->user_id);

            if ($aduserlist->profile_type == 1) {
                $profile_typ = "Men";
            } else if ($aduserlist->profile_type == 2) {
                $profile_typ = "Wemen";
            } else if ($aduserlist->profile_type == 3) {
                $profile_typ = "Kid";
            }
            $data_list[$count]['profile_typ'] = $profile_typ;

            $data_list[$count]['fit'] = $aduserlist->count;

            $data_list[$count]['transactions_id'] = $aduserlist->transactions_id;

            $data_list[$count]['refund_transactions_id'] = $aduserlist->refund_transactions_id;

            $data_list[$count]['refund_amount'] = $aduserlist->refund_amount;

            $data_list[$count]['refound_date'] = $aduserlist->refound_date;

            if ($aduserlist->payment_type == 1) {
                $payment_type = "Box order";
            } else {
                $payment_type = "Checkout order";
            }
            $data_list[$count]['payment_type'] = $payment_type;

            $count++;
        }

        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->fundrefundlistExcel($data_list, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function getClientEmaillist() {
        $html = "";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userlist = $this->Users->find('all')->where(['email LIKE' => "%" . $data['ky'] . "%"]);
            foreach ($userlist as $usr_li) {
                $html .= "<li className=\"list-unstyled\" onclick=\"setDataInField('" . $usr_li->email . "', '" . $usr_li->id . "')\">" . $usr_li->email . "</li>";
            }
        }
        echo $html;
        exit;
    }

    public function getClientDetails() {

        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->Users->hasMany('kid_detail', ['className' => 'KidsDetails', 'foreignKey' => 'user_id']);
            $this->Users->hasOne('usr_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $userData = $this->Users->find('all')->where(['Users.id' => $data['ky']])->contain(['kid_detail', 'usr_dtl'])->first();
        }
        $this->set(compact('userData'));
    }

    public function getClientCardDetails() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $cardsData = $this->PaymentCardDetails->find('all')->where(['user_id' => $data['ky']]);
        }
        $this->set(compact('cardsData'));
    }

    public function getClientAddressDetails() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $addressData = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $data['ky']]);
        }
        $this->set(compact('addressData'));
    }

    public function clientManualCharge() {


        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (empty($data['card_id']) || empty($data['amount']) || empty($data['address_id'])) {
                $this->Flash->error(__('Field missing.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/clientManualCharge');
            }

            $userData = $this->UserDetails->find('all')->where(['user_id' => $data['usr_id']])->first();
            $addressData = $this->ShippingAddress->find('all')->where(['id' => $data['address_id']])->first();
            $cardsData = $this->PaymentCardDetails->find('all')->where(['id' => $data['card_id']])->first();
            $card_exp = explode('-', $cardsData->card_expire);
            $arr_save_data = [
                'user_id' => $data['usr_id'],
                'status' => 2,
                'payment_type' => 3,
                'mail_status' => 0,
                'work_status' => 0,
                'price' => $data['amount'],
                'profile_type' => $userData->gender,
                'payment_card_details_id' => $data['card_id'],
                'delivery_id' => $data['address_id'],
                'shipping_address_id' => $data['address_id'],
                'created_dt' => date('Y-m-d H:i:s'),
            ];
            $newRow = $this->PaymentGetways->newEntity();
            $newRow = $this->PaymentGetways->patchEntity($newRow, $arr_save_data);
            $newRow = $this->PaymentGetways->save($newRow);
            $last_id = $newRow->id;
            $arr_user_info = [
                'card_number' => $cardsData->card_number,
                'exp_date' => $cardsData->card_expire,
                'exp_month' => end($card_exp),
                'exp_year' => $card_exp[0],
                'card_code' => $cardsData->cvv,
                'product' => $userData->first_name . ' Direct charge',
                'first_name' => $userData->first_name,
                'last_name' => $userData->last_name,
                'address' => $addressData->address,
                'city' => $addressData->city,
                'state' => $addressData->state,
                'zip' => $addressData->zipcode,
                'country' => $addressData->country,
                'email' => $data['email'],
                'amount' => $data['amount'],
                'invice' => $last_id,
                'refId' => $last_id,
                'companyName' => 'Drapefit',
            ];

//            $message = $this->authorizeCreditCard($arr_user_info);
            $message = $this->chargeClintManuallyStripeApiPay($arr_user_info);
            if (@$message['status'] == '1') {
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $direct_charge_mail_temp = $this->Settings->find('all')->where(['Settings.name' => 'DIRECT_CHARGE'])->first();
                $name = $userData->first_name;
                $from = $fromMail->value;
                $subject = $direct_charge_mail_temp->display;
                $to = $data['email'];
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_EMAIL'])->first()->value;
                $email_message = $this->Custom->directCharge($direct_charge_mail_temp->value, $name, $data['amount'], $message['TransId']);
                $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);
                $this->Custom->sendEmail($to, $from, $subject, $email_message);

                $this->PaymentGetways->updateAll(['mail_status' => 1], ['id' => $last_id]);

                $this->Flash->success(__('Payment completed'));
                return $this->redirect(HTTP_ROOT . 'appadmins/clientManualCharge');
            } else {
                $this->Flash->error(__('Payment failed'));
                return $this->redirect(HTTP_ROOT . 'appadmins/clientManualCharge');
            }

//            echo "<pre>";
//            print_r($message);
//            echo "</pre>";
//            exit;
        }
    }

    public function chargeClintManuallyStripeApiPay($arr_data = []) {
        extract($arr_data);
        $ord_idd = "DFPYMID" . @$invice;
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();  
        $stripe_token = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );

        $stripe = new \Stripe\StripeClient($stripe_token['secret_key']);

        $amount = round($amount, 2, PHP_ROUND_HALF_UP);

        $customer = $stripe->customers->create([
            'name' => $first_name,
            'email' => $email,
            'description' => $first_name . '  Direct charge',
        ]);

        try {

            $payment_methode = $stripe->paymentMethods->create([
                'type' => 'card',
                'card' => [
                    'number' => $card_number,
                    'exp_month' => $exp_month,
                    'exp_year' => $exp_year,
                    'cvc' => $card_code,
                ],
            ]);

            $payment_init = $stripe->paymentIntents->create([
                'amount' => $amount * 100,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'customer' => $customer->id,
                'payment_method' => $payment_methode->id,
                'confirm' => true,
                'description' => $first_name . '  Direct charge',
                'metadata' => array(
                    'order_id' => $ord_idd
                )
            ]);

            $pay_res = $payment_init->jsonSerialize();
//            echo($pay_res['charges']['data'][0]['id']."<br>");
//            echo($pay_res['charges']['data'][0]['balance_transaction']."<br>");
//            echo($pay_res['charges']['data'][0]['receipt_url']."<br>");
            $this->PaymentGetways->updateAll(['status' => 1, 'receipt_url' => $pay_res['charges']['data'][0]['receipt_url'], 'charge_id' => $pay_res['charges']['data'][0]['id'], 'transactions_id' => $pay_res['charges']['data'][0]['balance_transaction']], ['id' => $invice]);

            $msg['status'] = 1;

            $msg['TransId'] = $pay_res['charges']['data'][0]['balance_transaction'];
            $msg['receipt_url'] = $pay_res['charges']['data'][0]['receipt_url'];
            $msg['charge_id'] = $pay_res['charges']['data'][0]['id'];

            $msg['Success'] = " Successfully created transaction with Transaction ID: " . $pay_res['charges']['data'][0]['balance_transaction'];
            $msg['ResponseCode'] = " Transaction Response Code: 200 ";
            $msg['MessageCode'] = " Message Code: 200 ";
            $msg['AuthCode'] = " Auth Code: 200";
            $msg['Description'] = " Description: The payment was successful";
            $msg['msg'] = " Description: The payment was successful";
//            print_r($pay_res);
//            echo "</pre>";
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
//            echo 'Status is:' . $e->getHttpStatus() . '\n';
//            echo 'Type is:' . $e->getError()->type . '\n';
//            echo 'Code is:' . $e->getError()->code . '\n';
//            // param is '' in this case
//            echo 'Param is:' . $e->getError()->param . '\n';
//            echo 'Message is:' . $e->getError()->message . '\n';
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\RateLimitException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\AuthenticationException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (\Stripe\Error\Base $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = " Error Code  :" . $e->getError()->code . " \n";
            $msg['ErrorCode'] = " Error Message : " . $err['message'] . "\n";
            return $msg;
        } catch (Exception $e) {
            echo "No response returned \n";
            $msg['error'] = 'error';
            return $msg;
        }

        return $msg;
        exit;
    }
    
     public function declinedProducts() {
        $all_productList = $this->Products->find('all')->where(['is_payment_fail' => 1], ['id' => $dataMail->id])->group(['payment_id']);
        $all_payment_id = [];
        if ($all_productList->count() > 0) {
            $all_payment_id = Hash::extract($all_productList->toArray(), '{n}.payment_id');

            $type = $this->request->session()->read('Auth.User.type');
            $id = $this->request->session()->read('Auth.User.id');
            if (!in_array($type, [3, 8])) {


                $this->PaymentGetways->belongsTo('kid_dtl', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'kid_dtl'])->where(['PaymentGetways.id IN' => $all_payment_id])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);

                if ($type == 7) {
                    $userdetails = $userdetails->where(['PaymentGetways.inv_id' => $id]);
                }
                if ($type == 9) {
                    $userdetails = $userdetails->where(['PaymentGetways.support_id' => $id]);
                }
                $mass_product_count = array();
                $i = 1;
                foreach ($userdetails as $details) {
                    $kidCount[$i] = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => 3, 'PaymentGetways.user_id' => $details->id])->count();
                    $mass_product_count[@$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0, 'payment_id' => $details->id])->count();
                    //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();

                    $i++;
                }
            } else {
                $this->Flash->error(__('Not allow to access.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/');
            }
            foreach ($userdetails as $details) {
                if ($details->kid_id == 0) {
                    $getCheckBarcode = $this->UserDetails->find('all')->where(['user_id' => $details->user_id])->first();
                    if ($getCheckBarcode->barcode_image == '') {
                        if (@$getCheckBarcode->id) {
                            $name = $getCheckBarcode->user_id . '.png';
                            $barcode_value = $getCheckBarcode->user_id;
                            $this->Custom->create_profile_image($name);
                            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                            list($type, $dataImg) = explode(';', $dataImg);
                            list(, $dataImg) = explode(',', $dataImg);
                            $dataImg = base64_decode($dataImg);
                            file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                            $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $details->user_id]);
                        }
                    }
                } else {
                    $getCheckBarcode = $this->KidsDetails->find('all')->where(['id' => $details->kid_id])->first();
                    if ($getCheckBarcode->barcode_image == '') {
                        if (@$getCheckBarcode->id) {
                            $name = $getCheckBarcode->id . '.png';
                            $barcode_value = $getCheckBarcode->id;
                            $this->Custom->create_profile_image($name);
                            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                            list($type, $dataImg) = explode(';', $dataImg);
                            list(, $dataImg) = explode(',', $dataImg);
                            $dataImg = base64_decode($dataImg);
                            file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                            $this->KidsDetails->updateAll(['barcode_image' => $name], ['id' => $details->kid_id]);
                        }
                    }
                }
            }
        }
//        echo "<pre>";
//        print_r($all_payment_id);
//        echo "</pre>";

        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'type', 'id'));
    }
    
     public function viewDeclinedProducts($payment_id)
    {

        $payment_details = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
        $user_id = $payment_details->user_id;
        $kid_id = $payment_details->kid_id;
        
        $payment_cards = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id]);

        if ($payment_details->kid_id != 0) {
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $payment_details->kid_id])->first();

            $cname = $getUsersDetails->kids_first_name;

            $profileType = 3;
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.kid_id !=' => 0, 'Products.payment_id' => $payment_id, 'Products.is_payment_fail' => 1]);
            $kidcount = $prData->count();
        } else {

            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();
            $cname = $getUsersDetails->name;

            $profileType = $payment_details->profile_type;
            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.is_payment_fail' => 1]);
        }



        $this->set(compact('prData', 'getUsersDetails', 'cname', 'payment_cards'));
    }


    public function exchangeProductsList() {
        $all_productList = $this->Products->find('all')->where(['keep_status' => 2, 'is_complete_by_admin !=' => 1], ['id' => $dataMail->id]);
        $all_payment_id = [];
        if ($all_productList->count() > 0) {
            $all_payment_id = Hash::extract($all_productList->toArray(), '{n}.payment_id');

            $type = $this->request->session()->read('Auth.User.type');
            $id = $this->request->session()->read('Auth.User.id');
            if (in_array($type, [1, 3])) {


                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.id IN' => $all_payment_id])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);

                if ($type == 3) {
                    $userdetails = $userdetails->where(['PaymentGetways.emp_id' => $id]);
                }

                $mass_product_count = array();
                $i = 1;
                foreach ($userdetails as $details) {
                    $kidCount[$i] = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => 3, 'PaymentGetways.user_id' => $details->id])->count();
                    $mass_product_count[@$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0, 'payment_id' => $details->id])->count();
                    //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();

                    $i++;
                }
            } else {
                $this->Flash->error(__('Not allow to access.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/');
            }
            foreach ($userdetails as $details) {
                if ($details->kid_id == 0) {
                    $getCheckBarcode = $this->UserDetails->find('all')->where(['user_id' => $details->user_id])->first();
                    if ($getCheckBarcode->barcode_image == '') {
                        if (@$getCheckBarcode->id) {
                            $name = $getCheckBarcode->user_id . '.png';
                            $barcode_value = $getCheckBarcode->user_id;
                            $this->Custom->create_profile_image($name);
                            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                            list($type, $dataImg) = explode(';', $dataImg);
                            list(, $dataImg) = explode(',', $dataImg);
                            $dataImg = base64_decode($dataImg);
                            file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                            $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $details->user_id]);
                        }
                    }
                } else {
                    $getCheckBarcode = $this->KidsDetails->find('all')->where(['id' => $details->kid_id])->first();
                    if ($getCheckBarcode->barcode_image == '') {
                        if (@$getCheckBarcode->id) {
                            $name = $getCheckBarcode->id . '.png';
                            $barcode_value = $getCheckBarcode->id;
                            $this->Custom->create_profile_image($name);
                            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                            list($type, $dataImg) = explode(';', $dataImg);
                            list(, $dataImg) = explode(',', $dataImg);
                            $dataImg = base64_decode($dataImg);
                            file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                            $this->KidsDetails->updateAll(['barcode_image' => $name], ['id' => $details->kid_id]);
                        }
                    }
                }
            }
        }
//        echo "<pre>";
//        print_r($all_payment_id);
//        echo "</pre>";

        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'type', 'id'));
    }

    public function currentlyTotalProductInInventory($gender = '') {

        if ($gender == 1) { // Men                
            $user_type = "Men";
        } elseif ($gender == 2) { // Women
            $user_type = "Women";
        } elseif ($gender == 4) {
            $gender = 4; // Girl kid
            $user_type = "GirlKids";
        } elseif ($gender == 3) {
            $gender = 3; // Boy kid
            $user_type = "BoyKids";
        } else {
            $gender = 1;
            $user_type = "Men";
        }

        $product_list = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => $gender, 'quantity >' => 0, 'match_status' => 2])->group('prod_id');

        $this->set(compact('product_list', 'gender'));
    }

    public function monthlyProductShipped() {
        $month = !empty($_GET['m']) ? $_GET['m'] : date('m');
        $year = !empty($_GET['y']) ? $_GET['y'] : date('Y');
        $gender = (!empty($_GET['g'])) ? $_GET['g'] : "men";
        $usr_id_arr = [];
        $kid_id_arr = [];

        if ($gender == "women") {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 2]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        } elseif ($gender == "boy") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'boys']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } elseif ($gender == "girl") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'girls']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } else {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 1]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        }

        $this->Products->belongsTo('paymt_gtwy', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
        $product_list = $this->Products->find('all')->contain(['paymt_gtwy'])->order(['Products.id' => 'DESC'])->where(["MONTH(Products.created)" => $month, "YEAR(Products.created)" => $year]);

        if (!empty($usr_id_arr)) {
            $product_list = $product_list->where(['Products.user_id IN' => $usr_id_arr, 'Products.kid_id' => 0]);
        }
        if (!empty($kid_id_arr)) {
            $product_list = $product_list->where(['Products.kid_id IN' => $kid_id_arr]);
        }

        $this->set(compact('product_list', 'month', 'year', 'gender'));
    }

    public function monthlyClientConsumed() {
        $month = !empty($_GET['m']) ? $_GET['m'] : date('m');
        $year = !empty($_GET['y']) ? $_GET['y'] : date('Y');
        $gender = (!empty($_GET['g'])) ? $_GET['g'] : "men";
        $usr_id_arr = [];
        $kid_id_arr = [];

        if ($gender == "women") {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 2]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        } elseif ($gender == "boy") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'boys']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } elseif ($gender == "girl") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'girls']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } else {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 1]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        }

        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $this->Products->belongsTo('paymt_gtwy', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
        $product_list = $this->Products->find('all')->contain(['KidsDetails', 'UserDetails', 'paymt_gtwy'])->order(['Products.id' => 'DESC'])->where(["MONTH(Products.created)" => $month, "YEAR(Products.created)" => $year, 'Products.keep_status' => 3]);

        if (!empty($usr_id_arr)) {
            $product_list = $product_list->where(['Products.user_id IN' => $usr_id_arr, 'Products.kid_id' => 0]);
        }
        if (!empty($kid_id_arr)) {
            $product_list = $product_list->where(['Products.kid_id IN' => $kid_id_arr]);
        }

        $this->set(compact('product_list', 'month', 'year', 'gender'));
    }

    public function monthlyProductNotReturned() {
        $month = !empty($_GET['m']) ? $_GET['m'] : date('m');
        $year = !empty($_GET['y']) ? $_GET['y'] : date('Y');
        $gender = (!empty($_GET['g'])) ? $_GET['g'] : "men";
        $usr_id_arr = [];
        $kid_id_arr = [];

        if ($gender == "women") {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 2]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        } elseif ($gender == "boy") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'boys']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } elseif ($gender == "girl") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'girls']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } else {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 1]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        }

        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $this->Products->belongsTo('paymt_gtwy', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
        $product_list = $this->Products->find('all')->contain(['KidsDetails', 'UserDetails', 'paymt_gtwy'])->order(['Products.id' => 'DESC'])->where(["MONTH(Products.created)" => $month, "YEAR(Products.created)" => $year, 'Products.keep_status' => 1, 'Products.return_inventory' => 2]);

        if (!empty($usr_id_arr)) {
            $product_list = $product_list->where(['Products.user_id IN' => $usr_id_arr, 'Products.kid_id' => 0]);
        }
        if (!empty($kid_id_arr)) {
            $product_list = $product_list->where(['Products.kid_id IN' => $kid_id_arr]);
        }

        $this->set(compact('product_list', 'month', 'year', 'gender'));
    }

    public function monthlyProductDeclined() {
        $month = !empty($_GET['m']) ? $_GET['m'] : date('m');
        $year = !empty($_GET['y']) ? $_GET['y'] : date('Y');
        $gender = (!empty($_GET['g'])) ? $_GET['g'] : "men";
        $usr_id_arr = [];
        $kid_id_arr = [];

        if ($gender == "women") {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 2]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        } elseif ($gender == "boy") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'boys']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } elseif ($gender == "girl") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'girls']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } else {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 1]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        }

        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $this->Products->belongsTo('paymt_gtwy', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
        $product_list = $this->Products->find('all')->contain(['KidsDetails', 'UserDetails', 'paymt_gtwy'])->order(['Products.id' => 'DESC'])->where(["MONTH(Products.created)" => $month, "YEAR(Products.created)" => $year, 'Products.is_payment_fail' => 1]);

        if (!empty($usr_id_arr)) {
            $product_list = $product_list->where(['Products.user_id IN' => $usr_id_arr, 'Products.kid_id' => 0]);
        }
        if (!empty($kid_id_arr)) {
            $product_list = $product_list->where(['Products.kid_id IN' => $kid_id_arr]);
        }

        $this->set(compact('product_list', 'month', 'year', 'gender'));
    }

    public function productAssignedButNotFinalized() {
        $month = !empty($_GET['m']) ? $_GET['m'] : '';
        $year = !empty($_GET['y']) ? $_GET['y'] : '';
        $gender = (!empty($_GET['g'])) ? $_GET['g'] : "";
        $usr_id_arr = [];
        $kid_id_arr = [];

        if ($gender == "women") {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 2]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        } elseif ($gender == "boy") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'boys']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } elseif ($gender == "girl") {
            $getUserId = $this->KidsDetails->find('all')->where(['kids_clothing_gender' => 'girls']);
            $kid_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.id');
        } elseif ($gender == "men") {
            $getUserId = $this->UserDetails->find('all')->where(['gender' => 1]);
            $usr_id_arr = Hash::extract(!empty($getUserId->count()) ? $getUserId->toArray() : [], '{n}.user_id');
        }

        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

        $this->Products->belongsTo('paymt_gtwy', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
        $this->Products->hasMany('pdlist', ['className' => 'Products', 'foreignKey' => 'payment_id', 'bindingKey' => 'payment_id']);
        $product_list = $this->Products->find('all')->contain(['KidsDetails', 'UserDetails', 'paymt_gtwy', 'Users', 'pdlist'])->order(['Products.id' => 'DESC'])->where(['Products.is_finalize !=' => 1])->group(['Products.payment_id']);
        ;

        if (!empty($month) && !empty($year)) {
            $product_list = $product_list->where(["MONTH(Products.created)" => $month, "YEAR(Products.created)" => $year]);
        }
        if (!empty($usr_id_arr)) {
            $product_list = $product_list->where(['Products.user_id IN' => $usr_id_arr, 'Products.kid_id' => 0]);
        }
        if (!empty($kid_id_arr)) {
            $product_list = $product_list->where(['Products.kid_id IN' => $kid_id_arr]);
        }

        $this->set(compact('product_list', 'month', 'year', 'gender'));
    }
    
   
    public function shippedFinalizeSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id])->where([
                                'Products.created BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                    }

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function shippedFinalizeDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id])->where([
                            'Products.created BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function clientCheckedoutDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout' => 'Y'])->where([
                            'Products.created BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function clientCheckedoutSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout' => 'Y'])->where([
                                'Products.created BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $keep_pp = $keep_sp = $exchanegs = $exchaneg_pp = $exchaneg_sp = $returns = $return_pp = $return_sp = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                            $keep_pp += $shp_li->purchase_price;
                            $keep_sp += $shp_li->sell_price;
                        }
                        if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                            $exchaneg_pp += $shp_li->purchase_price;
                            $exchaneg_sp += $shp_li->sell_price;
                        }
                        if ($shp_li->keep_status == 1) {
                            $returns += 1;
                            $return_pp += $shp_li->purchase_price;
                            $return_sp += $shp_li->sell_price;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['keep_pp'] = $keep_pp;
                    $brnd_li[$ky]['keep_sp'] = $keep_sp;

                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['exchaneg_pp'] = $exchaneg_pp;
                    $brnd_li[$ky]['exchaneg_sp'] = $exchaneg_sp;

                    $brnd_li[$ky]['returns'] = $returns;
                    $brnd_li[$ky]['return_pp'] = $return_pp;
                    $brnd_li[$ky]['return_sp'] = $return_sp;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function checkedoutReturnDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout' => 'Y'/*, 'store_return_status' => 'Y'*/])->where([
                            'Products.created BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function checkedoutReturnSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout' => 'Y'/*, 'store_return_status' => 'Y'*/])->where([
                                'Products.created BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                        }
                        if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                        }
                        if ($shp_li->keep_status == 1) {
                            $returns += 1;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function checkedoutNotReturnDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout' => 'Y', 'store_return_status !=' => 'Y', 'keep_status NOT IN' => [3, 2]])->where([
                            'Products.created BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function checkedoutNotReturnSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout' => 'Y', 'store_return_status !=' => 'Y', 'keep_status NOT IN' => [3, 2]])->where([
                                'Products.created BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                        }
                        if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                        }
                        if ($shp_li->keep_status == 1) {
                            $returns += 1;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function productDeclinedDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'keep_status' => 99])->where(['Products.created BETWEEN :start AND :end'])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function productDeclinedSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'keep_status' => 99])->where([
                                'Products.created BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                        }
                        if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                        }
                        if ($shp_li->keep_status == 1) {
                            $returns += 1;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function notCheckedoutSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout !=' => 'Y'])->where([
                                'Products.created BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                        }
                        if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                        }
                        if ($shp_li->keep_status == 1) {
                            $returns += 1;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function notCheckedoutDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout !=' => 'Y'])->where(['Products.created BETWEEN :start AND :end'])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }
    

    public function mstProductFinaShipSummaryReport() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id,])->where([
                                'Products.shipping_date BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                        }
                        if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                        }
                        if ($shp_li->keep_status == 1) {
                            $returns += 1;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function mstProductFinaShipDetailsReport() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id])->where(['Products.shipping_date BETWEEN :start AND :end'])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }
    
    
    public function mstCheckedoutSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout' => 'Y'])->where([
                                'Products.shipping_date BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $keep_pp = $keep_sp = $exchanegs = $exchaneg_pp = $exchaneg_sp = $returns = $return_pp = $return_sp = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                            $keep_pp += $shp_li->purchase_price;
                            $keep_sp += $shp_li->sell_price;
                        }
                        if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                            $exchaneg_pp += $shp_li->purchase_price;
                            $exchaneg_sp += $shp_li->sell_price;
                        }
                        if ($shp_li->keep_status == 1) {
                            $returns += 1;
                            $return_pp += $shp_li->purchase_price;
                            $return_sp += $shp_li->sell_price;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['keep_pp'] = $keep_pp;
                    $brnd_li[$ky]['keep_sp'] = $keep_sp;

                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['exchaneg_pp'] = $exchaneg_pp;
                    $brnd_li[$ky]['exchaneg_sp'] = $exchaneg_sp;

                    $brnd_li[$ky]['returns'] = $returns;
                    $brnd_li[$ky]['return_pp'] = $return_pp;
                    $brnd_li[$ky]['return_sp'] = $return_sp;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function mstCheckedoutDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout' => 'Y'])->where(['Products.shipping_date BETWEEN :start AND :end'])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function mstNotReturnDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'store_return_status !=' => 'Y', 'keep_status NOT IN' => [3, 2]])->where([
                            'Products.shipping_date BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function mstNotReturnSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'store_return_status !=' => 'Y', 'keep_status NOT IN' => [3, 2]])->where([
                                'Products.shipping_date BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                        } else if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                        } else if ($shp_li->keep_status == 1) {
                            $returns += 1;
                        } else {
                            $returns += 1;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function mstPrdRtnProcDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'store_return_status' => 'Y', 'keep_status NOT IN' => [3, 2]])->where([
                            'Products.shipping_date BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function mstPrdRtnProcSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'store_return_status' => 'Y', 'keep_status NOT IN' => [3, 2]])->where([
                                'Products.shipping_date BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                        } else if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                        } else if ($shp_li->keep_status == 1) {
                            $returns += 1;
                        } else {
                            $returns += 1;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function mstProductStylingFeeReport() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
                $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                $payment_list = $this->Products->find('all')->contain(['PaymentGetways', 'Users', 'UserDetails', 'KidsDetails'])->where(['Products.inv_product_id IN' => $all_prd_id])->where([
                            'Products.shipping_date BETWEEN :start AND :end'
                        ])
                        ->group(['Products.payment_id'])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }

//            pj($payment_list);
//            exit;
        }
        $this->set(compact('payment_list'));
    }

    public function changeAutoCheckoutDate() {
        $product_list = [];

        $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);
        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);
        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $payment_list = $this->Products->find('all')->contain(['PaymentGetways', 'Users', 'UserDetails', 'KidsDetails'])/* ->where([
                  'Products.shipping_date BETWEEN :start AND :end'
                  ]) */
                ->group(['Products.payment_id', 'Products.auto_checkout_date'])/*
          ->bind(':start', $start_date, 'date')
          ->bind(':end', $end_date, 'date') */;

//            pj($payment_list);
//            exit;

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->Products->updateAll(['auto_checkout_date' => date('Y-m-d', strtotime($data['new_chk_date']))], ['auto_checkout_date' => date('Y-m-d', strtotime($data['chk_date'])), 'payment_id' => $data['payment_id']]);
//            print_r($data);
//            exit;

            $this->Flash->success(__('Autocheckout  date updated successfully.'));
            return $this->redirect(['action' => 'changeAutoCheckoutDate']);
        }

        $this->set(compact('payment_list'));
    }
    
    
    public function mstPrdExgProcDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'keep_status' => 2])->where([
                            'Products.shipping_date BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function mstPrdExgProcSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'keep_status' => 2])->where([
                                'Products.shipping_date BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {

                        if ($shp_li->product_exchange_date != null) {
                            $quantity += 1;
                            $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                            $total_checkout_price += $shp_li->sell_price;
                            if ($shp_li->keep_status == 3) {
                                $keeps += 1;
                            } else if ($shp_li->keep_status == 2) {
                                $exchanegs += 1;
                            } else if ($shp_li->keep_status == 1) {
                                $returns += 1;
                            } else {
                                $returns += 1;
                            }
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function mstPrdNotRtnExgProcDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'keep_status' => 2])->where([
                            'Products.shipping_date BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function mstPrdNotRtnExgProcSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'keep_status' => 2])->where([
                                'Products.shipping_date BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = 0;
                    foreach ($total_shipped as $shp_li) {

                        if ($shp_li->product_exchange_date == null) {
                            $quantity += 1;
                            $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                            $total_checkout_price += $shp_li->sell_price;
                            if ($shp_li->keep_status == 3) {
                                $keeps += 1;
                            } else if ($shp_li->keep_status == 2) {
                                $exchanegs += 1;
                            } else if ($shp_li->keep_status == 1) {
                                $returns += 1;
                            } else {
                                $returns += 1;
                            }
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function mstPrdDclnProcDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'keep_status' => 99])->where([
                            'Products.shipping_date BETWEEN :start AND :end'
                        ])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }

    public function mstPrdDclnProcSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'keep_status' => 99])->where([
                                'Products.shipping_date BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $exchanegs = $returns = $dclin = 0;
                    foreach ($total_shipped as $shp_li) {

//                        if ($shp_li->product_exchange_date != null) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 99) {
                            $dclin += 1;
                        }
//                        }
                    }



                    $brnd_li[$ky]['decline'] = $dclin;
                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['returns'] = $returns;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function mstNotCheckedoutSummary() {
        $this->loadModel('InUsers');

        $start_date = date('Y-m-d', strtotime($_GET['date']));
        $end_date = date('Y-m-d', strtotime($_GET['end_date']));

        $user_product_list = $this->InUsers->find('all');
        $brnd_li = [];
        foreach ($user_product_list as $ky => $upl) {
            $brnd_li[$ky]['brand_name'] = $upl->brand_name;
            $brnd_li[$ky]['quantity'] = 0;
            $brnd_li[$ky]['price'] = 0;
            $brnd_li[$ky]['total_checkout_price'] = 0;
            if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
                $all_prods = $this->InProducts->find('all')->where(['brand_id' => $upl->id, 'profile_type' => $_GET['profile_type']]);
                if ($all_prods->count() > 0) {
                    $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                    $total_shipped = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout !=' => 'Y'])->where([
                                'Products.shipping_date BETWEEN :start AND :end'
                            ])
                            ->bind(':start', $start_date, 'date')
                            ->bind(':end', $end_date, 'date');
                    $quantity = 0;
                    $price = 0;
                    $total_checkout_price = 0;
                    $keeps = $keep_pp = $keep_sp = $exchanegs = $exchaneg_pp = $exchaneg_sp = $returns = $return_pp = $return_sp = 0;
                    foreach ($total_shipped as $shp_li) {
                        $quantity += 1;
                        $price += $shp_li->purchase_price;
//                        $price += $shp_li->sell_price;
                        $total_checkout_price += $shp_li->sell_price;
                        if ($shp_li->keep_status == 3) {
                            $keeps += 1;
                            $keep_pp += $shp_li->purchase_price;
                            $keep_sp += $shp_li->sell_price;
                        }
                        if ($shp_li->keep_status == 2) {
                            $exchanegs += 1;
                            $exchaneg_pp += $shp_li->purchase_price;
                            $exchaneg_sp += $shp_li->sell_price;
                        }
                        if ($shp_li->keep_status == 1) {
                            $returns += 1;
                            $return_pp += $shp_li->purchase_price;
                            $return_sp += $shp_li->sell_price;
                        }
                    }



                    $brnd_li[$ky]['keep'] = $keeps;
                    $brnd_li[$ky]['keep_pp'] = $keep_pp;
                    $brnd_li[$ky]['keep_sp'] = $keep_sp;

                    $brnd_li[$ky]['exchanegs'] = $exchanegs;
                    $brnd_li[$ky]['exchaneg_pp'] = $exchaneg_pp;
                    $brnd_li[$ky]['exchaneg_sp'] = $exchaneg_sp;

                    $brnd_li[$ky]['returns'] = $returns;
                    $brnd_li[$ky]['return_pp'] = $return_pp;
                    $brnd_li[$ky]['return_sp'] = $return_sp;

                    $brnd_li[$ky]['quantity'] = $quantity;
                    $brnd_li[$ky]['price'] = $price;
                    $brnd_li[$ky]['total_checkout_price'] = $total_checkout_price;
                }
            }
        }

        $this->set(compact('user_product_list', 'start_date', 'end_date', 'brnd_li'));
    }

    public function mstNotCheckedoutDetails() {
        $product_list = [];
        if (!empty($_GET['profile_type']) && !empty($_GET['date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime($_GET['date']));
            $end_date = date('Y-m-d', strtotime($_GET['end_date']));

            $all_prods = $this->InProducts->find('all')->where(['profile_type' => $_GET['profile_type']]);

            if ($all_prods->count() > 0) {
                $all_prd_id = Hash::extract($all_prods->toArray(), '{n}.id');

                $product_list = $this->Products->find('all')->where(['inv_product_id IN' => $all_prd_id, 'checkedout !=' => 'Y'])->where(['Products.shipping_date BETWEEN :start AND :end'])
                        ->bind(':start', $start_date, 'date')
                        ->bind(':end', $end_date, 'date');
            }
        }
        $this->set(compact('product_list'));
    }
    
    

    public function mspCustomerPaidList() {
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('kid_data', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('product_list', ['className' => 'Products', 'foreignKey' => 'payment_id']);
        $new_userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'kid_data', 'product_list'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1]])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $new_userdetails = $new_userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $new_userdetails = $new_userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }


            if ($_GET['search_for'] == "email") {
                $eml = trim($_GET['search_data']);
                $new_userdetails = $new_userdetails->where(['Users.email LIKE' => "%" . $eml . "%"]);
            }
        }

        $userdetails = $this->paginate($new_userdetails);

        $this->set(compact('userdetails'));
    }

    public function mspPreviousWorkList() {
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $this->PaymentGetways->belongsTo('kid_data', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->PaymentGetways->hasMany('product_list', ['className' => 'Products', 'foreignKey' => 'payment_id']);

        $new_userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'kid_data', 'product_list'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $new_userdetails = $new_userdetails->matching('UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $new_userdetails = $new_userdetails->matching('UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }


            if ($_GET['search_for'] == "email") {
                $eml = trim($_GET['search_data']);
                $new_userdetails = $new_userdetails->where(['Users.email LIKE' => "%" . $eml . "%"]);
            }
        }

        $userdetails = $this->paginate($new_userdetails);
        $this->set(compact('userdetails'));
    }
    
    
    public function prodAddDone($paymentId, $type = null) {
        $this->PaymentGetways->updateAll(['done_status' => 1], ['id' => $paymentId]);

        $this->Flash->success(__('Product added done.'));
        return $this->redirect($this->referer());
        exit();
    }

    public function predictionFuture() {

        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');

        if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
            $start_date = date('Y-m-d', strtotime("-7 day", strtotime($_GET['start_date'])));
            $end_date = date('Y-m-d', strtotime("-7 day", strtotime($_GET['end_date'])));
            $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $this->PaymentGetways->belongsTo('kid_data', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $this->PaymentGetways->hasMany('product_list', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            $this->PaymentGetways->belongsTo('delivery_dtl', ['className' => 'DeliverDate', 'foreignKey' => 'delivery_id']);
            $new_userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'kid_data', 'product_list', 'delivery_dtl'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1]]);
            if ($type == 3) {
                $new_userdetails = $new_userdetails->where(['PaymentGetways.emp_id' => $id]);
            }

            $new_userdetails = $new_userdetails->where([
                        'PaymentGetways.created_dt BETWEEN :start AND :end'
                    ])
                    ->bind(':start', $start_date, 'date')
                    ->bind(':end', $end_date, 'date');

            $new_userdetails = $new_userdetails->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);

//            $userdetails = $this->paginate($new_userdetails);
            $userdetails = $new_userdetails;
//            pj([$start_date,$end_date]);
//            pj($_GET);
//            pj($userdetails);
//            exit;
            $this->set(compact('userdetails'));
        }
    }    
    
    public function previousOrderList($user_id, $kid_id=null) {
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
    
    public function updateBoxtype(){
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            
            $this->PaymentGetways->updateAll(['box_type' => $postData['box_type']], ['id' => $postData['payment_id']]);
             echo json_encode(['status' => 'success', 'msg' => '']);
        }
        exit;
    }
    
    /*public function boxOrderCnt() {
        $this->loadModel('BoxOrders');
        $userIdp = $this->PaymentGetways->find('all');
        foreach ($userIdp as $pay_ord) {
            if (!empty($pay_ord->box_type) && !empty($pay_ord->finalize_date)) {
                $newBxRw = $this->BoxOrders->newEntity();
                $dataArr['payment_id'] = $pay_ord->id;
                $dataArr['box_type'] = $pay_ord->box_type;
                $newBxRw = $this->BoxOrders->patchEntity($newBxRw, $dataArr);
                $this->BoxOrders->save($newBxRw);
                echo $pay_ord->id."<br>";
            }
        }
        exit;
    }*/

    public function verifyAddedProductInBox() {
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $check_prd = $this->Products->find('all')->where([
                'payment_id' => $postData['payment_id'],
                'barcode_value' => $postData['product_code']
                    ]);
            if($check_prd->count() == 1){
                $this->Products->updateAll(['is_verified'=>1],[
                'payment_id' => $postData['payment_id'],
                'barcode_value' => $postData['product_code']
                    ]);
                echo json_encode(['status' => 'success', 'msg' => 'Verified']);
            }else{
                echo json_encode(['status' => 'error', 'msg' => 'Invalid Product']);
            }
        }
        exit;
    }
    
    public function upcomingStylefeeSubscription() {
        echo date('Y-m-d H:i:s');exit;
        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'kid_id' => 0, 'PaymentGetways.work_status IN' => [1, 2], 'PaymentGetways.status' => 1])->group(['PaymentGetways.user_id']);

        if (!empty($paid_customer->count())) {

            $paid_users = Hash::extract($paid_customer->toArray(), '{n}.user_id');
            
            // echo "<pre>";
            // print_r($paid_users);
            // echo "</pre>";
            // exit;

            $this->LetsPlanYourFirstFix->belongsTo('usr_data', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $getingData = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => 1, 'kid_id' => '0', 'autoMentions' => 0, 'user_id IN' => $paid_users])->contain(['usr_data']);
            $user_data_list = [];
            foreach ($getingData as $data) {
                // echo $data->user_id. '-'.$data->usr_data->email;
                // echo "<br>";


                $planId = $data->id;

                if ($data->how_often_would_you_lik_fixes == 1) {

                    $currentDate = time();

                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));

                    $datediff = $currentDate - $oneMonth;

                    

                    $days_between = round($datediff / (60 * 60 * 24));
                    
//                     echo "<br>" . $data->user_id;
// //
//                     echo " - " . $planId .'-';
//                     echo $days_between. '-'.$data->usr_data->email;
// //
//                     echo "<br>";

                    if ($days_between == '30') {
                        
                        $user_data_list[] = $data;
//                        $this->boxUpdate($planId);

//                        exit;
                    } else if ($days_between >= '31') {

                        $day = date("l");

                        //echo $day;

$user_data_list[] = $data;

                        if ($day == 'Monday') {

//                            echo "<br>";
//
//                            echo $data->user_id;
//
//                            echo "<br>";
                            $user_data_list[] = $data;
//                            $this->boxUpdate($planId);
                        }
                    }
                }



                if ($data->how_often_would_you_lik_fixes == 2) {

                    $currentDate = time();

                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));

                    $datediff = $currentDate - $oneMonth;

                    $days_between = round($datediff / (60 * 60 * 24));

echo "<br>" . $data->user_id;
//
                    echo " - " . $planId .'-';
                    echo $days_between. '-'.$data->usr_data->email;
//
                    echo "<br>";

                    if ($days_between == '60') {
                        $user_data_list[] = $data;
//                        $this->boxUpdate($planId);
                    } else if ($days_between >= '61') {

                        $day = date("l");
// $user_data_list[] = $data;
                        if ($day == 'Friday') {
                            $user_data_list[] = $data;
//                            $this->boxUpdate($planId);
                        }
                    }
                }



                if ($data->how_often_would_you_lik_fixes == 3) {

                    $currentDate = time();

                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));

                    $datediff = $currentDate - $oneMonth;

                    $days_between = round($datediff / (60 * 60 * 24));

                    if ($days_between == '90') {
                        $user_data_list[] = $data;
//                        $this->boxUpdate($planId);
                    } else if ($days_between >= '91') {

                        $day = date("l");

                        if ($day == 'Friday') {
                            $user_data_list[] = $data;
//                            $this->boxUpdate($planId);
                        }
                    }
                }
                
            }
        }




        echo "<pre>";
        print_r($user_data_list);
        exit;
    }
    
    public function updateShippingMode() {
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            if (!empty($postData['shipping_mode'])) {
                $this->Settings->updateAll(['value' => $postData['shipping_mode']], ['name' => 'shipping_mode']);
                $this->Flash->success(__('Shipping label mode updated.'));
            }
            return $this->redirect($this->referer());
        }
        exit;
    }

    public function updateStampsInfo() {        
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $this->Stamps->deleteAll([1]);
            $newRw = $this->Stamps->newEntity();
            $newRw = $this->Stamps->patchEntity($newRw, $postData);
            $this->Stamps->save($newRw);
            $this->Flash->success(__('Stamps details updated.'));
            return $this->redirect($this->referer());
        }
        exit;
    }
    
    public function getComment() {
        $this->loadModel('ProductComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $payment_id = $postData['payment_id'];
            $this->ProductComments->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $all_cmts = $this->ProductComments->find('all')->where(['ProductComments.payment_id' => $payment_id])->contain(['Users'])->order(['ProductComments.id' => 'DESC']);
            $currentUserId = $this->Auth->user('id');
            $this->set(compact('all_cmts', 'currentUserId'));
        }
    }

    public function postComment($id = null) {
        $this->loadModel('ProductComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $postArr = [];
            $postArr['payment_id'] = $postData['payment_id'];
            $postArr['user_id'] = $this->request->session()->read('Auth.User.id');
            ;
            $postArr['comment'] = $postData['comment'];

            if ($id) {

                $comment = $this->ProductComments->get($id);
                $comment = $this->ProductComments->patchEntity($comment, $postArr);
            } else {

                $comment = $this->ProductComments->newEntity($postArr);
            }

            if ($this->ProductComments->save($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function deleteComment($id = null) {
        $this->loadModel('ProductComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $comment = $this->ProductComments->get($id);
            if ($this->ProductComments->delete($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }

    public function editComment() {
        $this->loadModel('ProductComments');

        if ($this->request->is('post')) {
            $commentId = $this->request->getData('commentId');

            $comment = $this->ProductComments->find('all')->where(['id' => $commentId])->first();
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

    public function updateWorkFlowStatusToStylist($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Stylist_Queue')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok Flow status Update.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
    }

    public function updateWorkFlowStatusOnboarding($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Onboard_in_Progress')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok  Flow On boarding Update.'));
//        $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
        return $this->redirect($this->referer());
    }

    public function updateWorkFlowStatusInventory($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Inv_Queue')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok Flow Inventory Update.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
    }

    public function updateWorkFlowStatusQa($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('QA_Queue')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok Flow QA Update.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
    }

    public function updateWorkFlowStatusSupport($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Support_Tab_Ready_to_Ship_Queue')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok Flow Support Update.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
    }

    public function updateWorkFlowStatusToNotshipnow($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Cant_Ship_now')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok Flow Support Update.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
    }

    public function updateWorkFlowStatusSupportQue($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Support_Tab_Support_Queue')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok Flow Support Update.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
    }

    public function updateWorkFlowStatusRecover($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Support_Tab_Recovery_queue')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok Flow Support Update.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
    }

    public function updateWorkFlowStatusReturn($payment_id = null) {
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Inv_Tab_Return_Queue')], ['id' => $payment_id]);

        $this->Flash->success(__('Wrok Flow Support Update.'));
        return $this->redirect(HTTP_ROOT . 'appadmins/current_paid_list');
    }

    public function allallocation($id = null, $user_id = null, $kid_id = null) {
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

        $product_list = $this->paginate($query);

        $this->set(compact('product_list', 'user_id', 'kid_id', 'id'));
    }

    public function release($prod_id, $user_id=null, $kid_id=null) {
        $this->InProducts->updateAll(
                ['allocate_to_user_id' => null, 'allocate_to_kid_id' => null, 'match_status'=>2],
                ['id' => $prod_id]
        );

        $this->Flash->success(__('Product Release'));
        return $this->redirect($this->referer());
    }
    
    
    public function addSmsCustomer($payment_id){
        $getPaymentDetail = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $payment_id])->first();
        if(!empty($getPaymentDetail->shipping_address_id)){
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.id' => $getPaymentDetail->shipping_address_id])->first();
        }else{
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getPaymentDetail->user_id])->first();
        }
        $phone = $billingAddress->country_code . $billingAddress->phone;
            if ($this->request->is('post')) {
            $data = $this->request->data;
                $this->loadModel('SmsSettings');
                
                    $txt_msg = $data['message'];
                    $phone = $data['phone'];
                    
                    $url = HTTP_ROOT . 'api/sendSmsPost';
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'DECLINE_SMS_TO_CUSTOMER'),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                    
                    $this->Flash->success(__('SMS sent successfully'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/declined_products');
                
            }
            
        
            $this->set(compact('phone'));
    }
    
    public function getDeclinedComment()
    {
        $this->loadModel('ProductDeclinedComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $payment_id = $postData['payment_id'];
            $this->ProductDeclinedComments->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $all_cmts = $this->ProductDeclinedComments->find('all')->where(['ProductDeclinedComments.payment_id' => $payment_id])->contain(['Users'])->order(['ProductDeclinedComments.id' => 'DESC']);
            $currentUserId = $this->Auth->user('id');
            $this->set(compact('all_cmts', 'currentUserId'));
        }
    }

    public function postDeclinedComment($id = null)
    {
        $this->loadModel('ProductDeclinedComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $postArr = [];
            $postArr['payment_id'] = $postData['payment_id'];
            $postArr['user_id'] = $this->request->session()->read('Auth.User.id');;
            $postArr['comment'] = $postData['comment'];

            if ($id) {

                $comment = $this->ProductDeclinedComments->get($id);
                $comment = $this->ProductDeclinedComments->patchEntity($comment, $postArr);
            } else {

                $comment = $this->ProductDeclinedComments->newEntity($postArr);
            }

            if ($this->ProductDeclinedComments->save($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }
    
    public function deleteDeclinedComment($id = null)
    {
        $this->loadModel('ProductDeclinedComments');
        $this->viewBuilder()->layout('');

        if ($this->request->is('post')) {
            $comment = $this->ProductDeclinedComments->get($id);
            if ($this->ProductDeclinedComments->delete($comment)) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        }
        exit;
    }
    
    public function editDeclinedComment()
    {
        $this->loadModel('ProductDeclinedComments');

        if ($this->request->is('post')) {
            $commentId = $this->request->getData('commentId');

            $comment = $this->ProductDeclinedComments->find('all')->where(['id' => $commentId])->first();
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
    
    public function proceedKeep($product_id) {

        $prdData = $this->Products->find('all')->where(['Products.id' => $product_id])->first();
        $payment_id = $prdData->payment_id;
        $payment_details = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
        $user_id = $payment_details->user_id;
        $kid_id = $payment_details->kid_id;

        $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $user_id])->first();
        $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();
        if (empty($payment_data)) {
            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id])->first();
        }

        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();
        if (empty($billingAddress)) {
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id])->first();
        }
        
        $total_amount = $prdData->sell_price;

        $arr_user_info = [
            'stripe_customer_key' => $current_usr_dtl_strip->stripe_customer_key,
            'stripe_payment_method' => $payment_data->stripe_payment_key,
            'product' => $billingAddress->full_name . ' Checkout Declined Product',
            'first_name' => $billingAddress->full_name,
            'last_name' => $billingAddress->full_name,
            'address' => $billingAddress->address,
            'city' => $billingAddress->city,
            'state' => $billingAddress->state,
            'zip' => $billingAddress->zipcode,
            'country' => 'USA',
            'email' => $current_usr_dtl_strip->email,
            //'amount' => $paymentGetwayAmount,
            'amount' => $prdData->sell_price,
            'invice' => $payment_id,
            'refId' => 32,
            'companyName' => 'Drapefit',
        ];

        
        if ($total_amount > 0) {
            $message = $this->stripePay($arr_user_info);
//            echo "<pre>";print_r($message);
//            exit;
            if (@$message['status'] == '1') {
                $this->Products->updateAll(['keep_status'=>3, 'is_exchange_pending' => 0, 'is_complete'=>1, 'is_payment_fail' => 0, 'checkedout' => 'Y', 'is_complete_by_admin' => 1], ['id' => $product_id]);
                
                 $all_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id])->count();
                    $chked_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'is_complete' => 1])->count();
                    if ($all_prd_cnt == $chked_prd_cnt) {
                            $this->PaymentGetways->updateAll(['status' => 1, 'work_status' => 2], ['id' => $payment_id]);
                            if (!empty($kid_id)) {
                                $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);
                                $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                            } else {
                                $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                                $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                            }
                        }
                
                $this->Flash->success(__('Payment completed.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Payment fail.'. $message['ErrorCode']));
                return $this->redirect($this->referer());
            }
        }else{
            $this->Flash->success(__('Invalid Product price'));
            return $this->redirect($this->referer());
        }
    }
    
    public function returnQueueList($payment_id = null)
    {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');

      
        
        if ($type == 1) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where([ 'PaymentGetways.work_flow_status IN' => Configure::read('Inv_Tab_Return_Queue'), 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where([ 'PaymentGetways.work_flow_status' => Configure::read('Inv_Tab_Return_Queue'), 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        }
        foreach ($userdetails as $details) {
            if ($details->kid_id == 0) {
                $getCheckBarcode = $this->UserDetails->find('all')->where(['user_id' => $details->user_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->user_id . '.png';
                        $barcode_value = $getCheckBarcode->user_id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $details->user_id]);
                    }
                }
            } else {
                $getCheckBarcode = $this->KidsDetails->find('all')->where(['id' => $details->kid_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->id . '.png';
                        $barcode_value = $getCheckBarcode->id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->KidsDetails->updateAll(['barcode_image' => $name], ['id' => $details->kid_id]);
                    }
                }
            }
        }

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "email") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users', function ($q) use ($username) {
                    return $q->where(['email LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "order_number") {
                $srch_id = (int) filter_var($_GET['search_data'], FILTER_SANITIZE_NUMBER_INT);
                //                print_r($srch_id);exit;
                $userdetails = $userdetails->where(['PaymentGetways.id LIKE' => $srch_id]);
            }
            if ($_GET['search_for'] == "order_date") {
                $srch_dt = $_GET['search_data'];
                $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
            }

            //            if ($_GET['search_for'] == "kid_name") {
            //                $kidname = trim($_GET['search_data']);
            //                $userdetails = $userdetails->matching('Users.KidsDetails', function ($q) use ($kidname) {
            //                    return $q->where(['kids_first_name LIKE' => "%" . $kidname . "%"]);
            //                });
            //            }
        }

        if ($_GET['search_for'] == "selected_date") {
            $srch_dt = $_GET['selected_date'];
            $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
        }

        $new_userdetails = $this->paginate($userdetails);
        
        $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
        $employee_env = $this->Users->find('all')->where(['Users.type' => 7, 'Users.is_active' => 1]);
        $employee_qa = $this->Users->find('all')->where(['Users.type' => 8, 'Users.is_active' => 1]);
        $employee_spt = $this->Users->find('all')->where(['Users.type' => 9, 'Users.is_active' => 1]);

        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count', 'employee_env', 'employee_qa', 'employee_spt', 'new_userdetails'));
    }
    
    public function supportQueueList($payment_id = null)
    {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');

        
        if ($type == 1) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where([ 'PaymentGetways.work_flow_status IN' => Configure::read('Support_Tab_Support_Queue'), 'PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where([ 'PaymentGetways.work_flow_status' => Configure::read('Support_Tab_Support_Queue'), 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {
                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                //$mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        }
        foreach ($userdetails as $details) {
            if ($details->kid_id == 0) {
                $getCheckBarcode = $this->UserDetails->find('all')->where(['user_id' => $details->user_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->user_id . '.png';
                        $barcode_value = $getCheckBarcode->user_id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $details->user_id]);
                    }
                }
            } else {
                $getCheckBarcode = $this->KidsDetails->find('all')->where(['id' => $details->kid_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->id . '.png';
                        $barcode_value = $getCheckBarcode->id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);
                        $this->KidsDetails->updateAll(['barcode_image' => $name], ['id' => $details->kid_id]);
                    }
                }
            }
        }

        if (!empty($_GET['search_for']) && !empty($_GET['search_data'])) {
            if ($_GET['search_for'] == "email") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users', function ($q) use ($username) {
                    return $q->where(['email LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['first_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "user_last_name") {
                $username = trim($_GET['search_data']);
                $userdetails = $userdetails->matching('Users.UserDetails', function ($q) use ($username) {
                    return $q->where(['last_name LIKE' => "%" . $username . "%"]);
                });
            }
            if ($_GET['search_for'] == "order_number") {
                $srch_id = (int) filter_var($_GET['search_data'], FILTER_SANITIZE_NUMBER_INT);
                //                print_r($srch_id);exit;
                $userdetails = $userdetails->where(['PaymentGetways.id LIKE' => $srch_id]);
            }
            if ($_GET['search_for'] == "order_date") {
                $srch_dt = $_GET['search_data'];
                $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
            }

            //            if ($_GET['search_for'] == "kid_name") {
            //                $kidname = trim($_GET['search_data']);
            //                $userdetails = $userdetails->matching('Users.KidsDetails', function ($q) use ($kidname) {
            //                    return $q->where(['kids_first_name LIKE' => "%" . $kidname . "%"]);
            //                });
            //            }
        }

        if ($_GET['search_for'] == "selected_date") {
            $srch_dt = $_GET['selected_date'];
            $userdetails = $userdetails->where(['PaymentGetways.created_dt LIKE' => "%" . date('Y-m-d', strtotime($srch_dt)) . "%"]);
        }

        $new_userdetails = $this->paginate($userdetails);
        
        $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
        $employee_env = $this->Users->find('all')->where(['Users.type' => 7, 'Users.is_active' => 1]);
        $employee_qa = $this->Users->find('all')->where(['Users.type' => 8, 'Users.is_active' => 1]);
        $employee_spt = $this->Users->find('all')->where(['Users.type' => 9, 'Users.is_active' => 1]);

        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count', 'employee_env', 'employee_qa', 'employee_spt', 'new_userdetails'));
    }
    
    public function processSelectedProduct() {
        if ($this->request->is('post')) {
            $postData = $this->request->data;
           
            if (count($postData['prod_id']) < 1) {
                $this->Flash->error(__('No product selected'));
                return $this->redirect($this->referer());
            }
            $prdData = $this->Products->find('all')->where(['Products.id' => $postData['prod_id'][0]])->first();
            $payment_id = $prdData->payment_id;
            $payment_details = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();
            $user_id = $payment_details->user_id;
            $kid_id = $payment_details->kid_id;
            
            if ($payment_details->kid_id != 0) {
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $payment_details->kid_id])->first();

                $cname = $getUsersDetails->kids_first_name;
            } else {
                $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();
                $cname = $getUsersDetails->name;
            }

            $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $user_id])->first();
            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();
            if (empty($payment_data)) {
                $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id])->first();
            }

            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();
            if (empty($billingAddress)) {
                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id])->first();
            }
            $chk_price = $this->Products->find('all')->where(['Products.id IN' => $postData['prod_id']])->sumOf('sell_price');
           

            $total_amount = $chk_price;
            
            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();
            if (empty($payment_data)) {
                $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id])->first();
            }
            
            $payment_details = $this->PaymentGetways->find('all')->where(['id' => $payment_id])->first();

            $lastPymentg = $this->PaymentGetways->newEntity();
            $table1['user_id'] = $user_id;
            $table1['kid_id'] = $kid_id;
            $table1['emp_id'] = 0;
            $table1['status'] = 0;
            // $table1['price'] = $paymentGetwayAmount;
            $table1['price'] = $total_amount;
            $table1['profile_type'] = $payment_details->profile_type;
            $table1['payment_type'] = 2;
            $table1['created_dt'] = date('Y-m-d H:i:s');
            $table1['parent_id'] = $payment_id;
            $table1['work_status'] = 1;
            $table1['count'] = $payment_details->count;
            $table1['payment_card_details_id'] = $payment_data->id;
            $table1['shipping_address_id'] = $payment_details->shipping_address_id;

            $lastPymentg = $this->PaymentGetways->patchEntity($lastPymentg, $table1);
            $lastPymentg = $this->PaymentGetways->save($lastPymentg);

            $arr_user_info = [
                'stripe_customer_key' => $current_usr_dtl_strip->stripe_customer_key,
                'stripe_payment_method' => $payment_data->stripe_payment_key,
                'product' => $billingAddress->full_name . ' Checkout Declined Product',
                'first_name' => $billingAddress->full_name,
                'last_name' => $billingAddress->full_name,
                'address' => $billingAddress->address,
                'city' => $billingAddress->city,
                'state' => $billingAddress->state,
                'zip' => $billingAddress->zipcode,
                'country' => 'USA',
                'email' => $current_usr_dtl_strip->email,
                //'amount' => $paymentGetwayAmount,
                'amount' => $total_amount,
                'invice' => $payment_id,//@$lastPymentg->id,
                'refId' => 32,
                'companyName' => 'Drapefit',
            ];

            if ($total_amount > 0) {
                $message = $this->stripePay($arr_user_info);
//                print_r($message);exit;
                if (@$message['status'] == '1') {
                    
                    $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId'],], ['id' => $lastPymentg->id]);
                $payment_check = $this->Payments->find('all')->where(['payment_id' => $lastPymentg->id])->order(['id' => 'DESC'])->first();
                $payment = $this->Payments->newEntity();
                if (!empty($payment_check)) {
                    $table['id'] = $payment_check->id;
                }
                $table['user_id'] = $user_id;
                $table['payment_id'] = $lastPymentg->id;
                $table['sub_toal'] = $total_amount;
                $table['sales_tax'] = 0;
                $table['tax'] = 0.00;
                $table['tax_price'] = 0;
                //                $table['total_price'] = $price;
                $table['total_price'] = $total_amount;
                $table['paid_status'] = 1;
                $table['created_dt'] = date('Y-m-d H:i:s');
                //                $table['product_ids'] = @implode(',', @$product_ids);
                $table['wallet_balance'] = 0;
                $table['promo_balance'] = 0;
                $payment = $this->Payments->patchEntity($payment, $table);
                $lastPyment = $this->Payments->save($payment);

                    
                    $this->Products->updateAll(['keep_status' => 3, 'is_exchange_pending' => 0, 'is_complete' => 1, 'is_payment_fail' => 0, 'checkedout' => 'Y', 'is_complete_by_admin' => 1], ['id IN' => $postData['prod_id']]);
                    
                    $all_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id])->count();
                    $chked_prd_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'is_complete' => 1])->count();
                    if ($all_prd_cnt == $chked_prd_cnt) {
                            $this->PaymentGetways->updateAll(['status' => 1, 'work_status' => 2], ['id' => $payment_id]);
                            $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Previous_Worklist_queue')], ['id' => $payment_id]);
                            if (!empty($kid_id)) {
                                $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);
                                $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                            } else {
                                $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                                $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                            }
                        }
                        
                        $prdData = $this->Products->find('all')->where(['Products.id IN' => $postData['prod_id']]);
                        foreach ($prdData as $dataMail) {
                            if ($dataMail->keep_status == 3) {
                                $priceMail = $dataMail->sell_price;
                            } else {
                                $priceMail = 0;                    }
                            if ($dataMail->keep_status == 3) {
                                $keep = 'Keeps';                        
                            } elseif ($dataMail->keep_status == 2) {
                                $keep = 'Exchange';
                            } elseif ($dataMail->keep_status == 1) {
                                $keep = 'Return';
                            }
                            //continue;
                            $img_dd = "";
                            $img_dd = strstr($dataMail->product_image, PRODUCT_IMAGES) ? $dataMail->product_image : PRODUCT_IMAGES . $dataMail->product_image;

                            //                    if ($dataMail->is_complete != 1) {
                            $productData .= "<tr>
                                <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                                       # " . $i . "

                                    </td>

                                    <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                                      <img src='" . HTTP_ROOT . $img_dd . "' width='85'/>

                                    </td>

                                    <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                                       " . $dataMail->product_name_one . "

                                    </td>

                                    <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                                       " . $dataMail->product_name_two . "

                                    </td>

                                    <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                                        " . $keep . "

                                    </td>
                                    <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                                       " . $dataMail->size . "

                                    </td>
                                    <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                                       $" . number_format($priceMail, 2) . "

                                    </td>

                                </tr>";
                        }
                        
                    $sitename = HTTP_ROOT;
                    $name = $getUsersDetails->name;
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $from = $fromMail->value;
                    $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                   
                    $subject = 'Here is Your Drape Fit Receipt  #DFPYMID' . $payment_id;    
                    $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, number_format(floor(($total_amount) * 100) / 100, 2, '.', ''), $total_amount, 0, 0, '', $total_amount, '', 0, '#DFPYMID' . $payment_id);   
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);
                        
                    
                    $this->Flash->success(__('Payment completed.'));
                    return $this->redirect(HTTP_ROOT.'appadmins/view_declined_products/'.$payment_id);
                } else {
                    $this->Flash->error(__('Payment fail.' . $message['ErrorCode']));
                    return $this->redirect(HTTP_ROOT.'appadmins/view_declined_products/'.$payment_id);
                }
            } else {
                $this->Flash->success(__('Invalid Product price'));
                return $this->redirect(HTTP_ROOT.'appadmins/declined_products');
            }
        }
        exit;
    }
    
    public function updatePaymentCard(){
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $payment_data = $this->PaymentCardDetails->find('all')->where(['id' => $postData['card_id']])->first();
            $this->PaymentCardDetails->updateAll(['use_card'=>0],['user_id'=>$payment_data->user_id]);
            $this->PaymentCardDetails->updateAll(['use_card'=>1],['id' => $postData['card_id']]);
            echo json_encode(['status'=>'success']);
            exit;
        }
        echo json_encode(['status'=>'error']);
        exit;
    }
}




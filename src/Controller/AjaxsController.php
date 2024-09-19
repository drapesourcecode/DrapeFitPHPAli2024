<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;
use Cake\Validation\Validator;
use Cake\Core\Configure;

class AjaxsController extends AppController
{
    

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Custom');
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
        $this->loadModel('InProductType');
        $this->viewBuilder()->layout('ajax');
        $this->render(false);
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['addBlankKid', 'setaddress', 'login', 'registration', 'checkChildren', 'ajaxWemenFit', 'ajaxWemenFitGetdata', 'styleInspiration', 'ajaxMenFit', 'colorupdate', 'colortrend', 'denimstyles', 'pricerange', 'designbrand', 'ajaxKidsstyle', 'pricerangekid', 'pricerangekidboy', 'ajaxKidsprofile', 'menStyleInspiration', 'ajaxMenPrice', 'styleSphereSelectionsV3', 'styleSphereSelectionsV4', 'styleSphereSelectionsV5', 'styleSphereSelectionsV6', 'styleSphereSelectionsV7', 'styleSphereSelectionsV8', 'styleSphereSelectionsV9', 'styleSphereSelectionsV11', 'ajaxboyKidsstyle', 'stripeCustomerKey', 'StylefitPayment', 'saveAddress', 'cardStatus', 'addNewCard', 'paymentProcess', 'stylefitPaymentReAuth', 'paymentSuccess', 'stylepayment', 'orderDetails', 'orderDetailsKids', 'fitProducts', 'ajaxEmailPreformeProfile', 'userDetails', 'womenStyleInsp', 'ajaxMenFitGetdata', 'ajaxKidFitGetdata', 'stylefitProducts', 'updateStylefitProduct', 'userAddressList', 'paymentCardList', 'notYetShipped', 'deleteaddress', 'fitsetting', 'kidBrandUpdate', 'ajaxforget', 'getProgressStatus', 'ajaxMenImg', 'ajaxKidImg', 'updateBasicInfo', 'ajaxReadmeCodeOrder', 'ajaxReadmeCodeCheck', 'StylefitFee', 'cardAddedSuccess', 'genderUpdate', 'reservationDetails', 'customerOrderCommentReview', 'customerOrderCommentReviewGet', 'selectAddresss', 'deleteAccount']);
    }

    public function styleSphereSelectionsV3()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            if ($data) {
                $userId = $data['user_id'];
                $value = $data['style_sphere_selections_v3'];
                $tabledd = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
                // echo $tabledd; exit;
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v3'] = $value;
                    $table['style_sphere_selections_v3_3'] = $tabledd;
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v3' => $value, 'style_sphere_selections_v3_3' => $tabledd], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Success', 'data' => $tabledd]);
            }
        }
        exit;
    }

    public function styleSphereSelectionsV4()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $tabledd = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
            $userId = $data['user_id'];
            if ($data) {
                $userId = $data['user_id'];
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v3_3'] = $tabledd;
                    $table['style_sphere_selections_v4'] = $data['style_sphere_selections_v4'];
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v4' => $data['style_sphere_selections_v4'], 'style_sphere_selections_v3_3' => $tabledd], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Success']);
            }
        }
        exit;
    }

    public function styleSphereSelectionsV5()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $tabledd = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
            $userId = $data['user_id'];
            if ($data) {
                $userId = $data['user_id'];
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v3_3'] = $tabledd;
                    $table['style_sphere_selections_v5'] = $data['style_sphere_selections_v5'];
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v5' => $data['style_sphere_selections_v5'], 'style_sphere_selections_v3_3' => $tabledd], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Success']);
            }
        }
        exit;
    }

    public function styleSphereSelectionsV6()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $tabledd = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
            $userId = $data['user_id'];
            if ($data) {
                $userId = $data['user_id'];
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v3_3'] = $tabledd;
                    $table['style_sphere_selections_v6'] = $data['style_sphere_selections_v6'];
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v6' => $data['style_sphere_selections_v6'], 'style_sphere_selections_v3_3' => $tabledd], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Success']);
            }
        }
        exit;
    }

    public function styleSphereSelectionsV7()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $tabledd = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
            $userId = $data['user_id'];
            if ($data) {
                $userId = $data['user_id'];
                $table['style_sphere_selections_v3_3'] = $tabledd;
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v7'] = $data['style_sphere_selections_v7'];
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v7' => $data['style_sphere_selections_v7'], 'style_sphere_selections_v3_3' => $tabledd], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Success']);
            }
        }
        exit;
    }

    public function styleSphereSelectionsV8()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $tabledd = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
            $userId = $data['user_id'];
            if ($data) {
                $userId = $data['user_id'];
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v3_3'] = $tabledd;
                    $table['style_sphere_selections_v8'] = $data['style_sphere_selections_v8'];
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v8' => $data['style_sphere_selections_v8'], 'style_sphere_selections_v3_3' => $tabledd], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Success']);
            }
        }
        exit;
    }

    public function styleSphereSelectionsV9()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $tabledd = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
            $userId = $data['user_id'];
            if ($data) {
                $userId = $data['user_id'];
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v3_3'] = $tabledd;
                    $table['style_sphere_selections_v9'] = $data['style_sphere_selections_v9'];
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v9' => $data['style_sphere_selections_v9'], 'style_sphere_selections_v3_3' => $tabledd], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Success']);
            }
        }
        exit;
    }

    public function styleSphereSelectionsV11()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $tabledd = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
            $userId = $data['user_id'];
            if ($data) {
                $userId = $data['user_id'];
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v3_3'] = $tabledd;
                    $table['style_sphere_selections_v11'] = $data['style_sphere_selections_v11'];
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v11' => $data['style_sphere_selections_v11'], 'style_sphere_selections_v3_3' => $tabledd], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Success']);
            }
        }
        exit;
    }

    public function menStyleInspiration()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            if ($data) {

                $checkExitData = $this->MenFit->find('all')->where(['user_id' => $userId])->first();
                if (empty($checkExitData)) {
                    $MenFit = $this->MenFit->newEntity();
                    $data['user_id'] = $userId;
                    $data['button_up_shirts_to_fit'] = implode(",", json_decode($data['button_up_shirts_to_fit'], true));
                    $data['your_pants_to_fit'] = implode(",", json_decode($data['your_pants_to_fit'], true));
                    $data['prefer_your_shorts'] = implode(",", json_decode($data['prefer_your_shorts'], true));
                    $data['jeans_to_fit'] = implode(",", json_decode($data['jeans_to_fit'], true));
                    $data['take_note_of'] = implode(",", array_unique(json_decode($data['take_note_of'], true)));
                    // $data['prefer_color'] = !empty(json_decode($data['prefer_color'], true)) ? json_encode(json_decode($data['prefer_color'], true)) : '';
                    $MenFit = $this->MenFit->patchEntity($MenFit, $data);
                    $this->MenFit->save($MenFit);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                    // $tk = "post_insert";
                } else {
                    $this->MenFit->updateAll([
                        'jeans_to_fit' => implode(",", json_decode($data['jeans_to_fit'], true)),
                        'your_pants_to_fit' => implode(",", json_decode($data['your_pants_to_fit'], true)),
                        'prefer_your_shorts' => implode(",", json_decode($data['prefer_your_shorts'], true)),
                        //'prefer_color' => !empty(json_decode($data['prefer_color'], true)) ? json_encode(json_decode($data['prefer_color'], true)) : '',
                        'take_note_of' => implode(",", array_unique(json_decode($data['take_note_of'], true)))
                    ], ['user_id' => $userId]);
                    //   $tk = "post_update";         
                }
                $checkExitDataS = $this->MenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitDataS->id == '') {
                    $sphereSelections = $this->MenStyleSphereSelections->newEntity();
                    $data['user_id'] = $userId;
                    $data['style_sphere_selections_v2'] = implode(",", json_decode($data['style_sphere_selections_v2'], true));
                    $data['style_sphere_selections_v3'] = implode(",", json_decode($data['style_sphere_selections_v3'], true));
                    $data['style_sphere_selections_v4'] = implode(",", json_decode($data['style_sphere_selections_v4'], true));
                    $data['style_sphere_selections_v5'] = implode(",", json_decode($data['style_sphere_selections_v5'], true));
                    $sphereSelections = $this->MenStyleSphereSelections->patchEntity($sphereSelections, $data);
                    $this->MenStyleSphereSelections->save($sphereSelections);
                    //   $tk1 = "post_insert1";
                } else {
                    $this->MenStyleSphereSelections->updateAll([
                        'style_sphere_selections_v2' => implode(",", json_decode($data['style_sphere_selections_v2'], true)),
                        'style_sphere_selections_v3' => implode(",", json_decode($data['style_sphere_selections_v3'], true)),
                        'style_sphere_selections_v4' => implode(",", json_decode($data['style_sphere_selections_v4'], true)),
                        'style_sphere_selections_v5' => implode(",", json_decode($data['style_sphere_selections_v5'], true))
                    ], ['user_id' => $userId]);
                    //   $tk1 = "post_update1";
                }
            }
            echo json_encode(['status' => 'success', 'msg' => 'Success', $tk, $tk1]);
        }
        exit;
    }

    public function login()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
             $superadmin_pwd_check = $this->Settings->find('all')->where(['name' => 'super_admin_password'])->first();
            if (!empty($superadmin_pwd_check) && ($superadmin_pwd_check->value == $data['password'])) {
                $is_user_check = $this->Users->find('all')->where(['email' => $data['email'], 'Users.type' => 2]);
                $isactive_counter = $is_user_check->count();
                if ($isactive_counter > 0) {
                    $is_user_check = $is_user_check->first();
                    $this->Auth->setUser($is_user_check);
                    $type = $this->Auth->user('type');
                    $name = $this->Auth->user('name');
                    $email = $this->Auth->user('email');
                    $user_id = $this->Auth->user('id');
                    $is_redirect = $this->Auth->user('is_redirect');
                    if ($type == 2) {
                        $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_id])->first();
                        if ($Userdetails->gender == 1) {
                            $gen = "MEN";
                            $this->request->session()->write('PROFILE', $gen);
                        }
                        if ($Userdetails->gender == 2) {
                            $gen = "WOMEN";
                            $this->request->session()->write('PROFILE', $gen);
                        }
                         echo json_encode(['status' => 'success', 'msg' => 'Welcome back ' . $name, 'user_id' => $user_id, 'user_name' => $name, 'gender' => $Userdetails->gender, 'is_redirect' => $is_redirect]);
                            
                        exit;
                    } else {
                        echo json_encode(['status' => 'error', 'msg' => "Invalid username or password, try again", $user]);
                        exit;
                    }
                } else {
                    echo json_encode(['status' => 'error', 'msg' => "Invalid username or password, try again",]);

                    exit;
                }
            } else {
                $user = $this->Auth->identify();
                if ($user) {
                    if ($user['is_active']==9) {
                         echo json_encode(['status' => 'error', 'msg' => "Invalid username or password, try again", $user]);
                         exit;
                    }
                    if ($data['email']) {
                        $isactive_check = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.is_active' => true, 'Users.type IN' => [2]]);
                        $isactive_counter = $isactive_check->count();
                        if ($isactive_counter > 0) {
                            $this->Auth->setUser($user);
                            $type = $this->Auth->user('type');
                            $name = $this->Auth->user('name');
                            $email = $this->Auth->user('email');
                            $user_id = $this->Auth->user('id');
                            $is_redirect = $this->Auth->user('is_redirect');
                            if ($type == 2) {
                                $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_id])->first();
                                //   if ($Userdetails->gender == 1) {
                                //       $gen = "MEN";
                                //   }
                                // if ($Userdetails->gender == 2) {
                                //      $gen = "WOMEN";
                                //  }
                                echo json_encode(['status' => 'success', 'msg' => 'Welcome back ' . $name, 'user_id' => $user_id, 'user_name' => $name, 'gender' => $Userdetails->gender, 'is_redirect' => $is_redirect]);
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
        exit;
    }

    public function registration()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allowed headers
        header("Access-Control-Max-Age: 3600"); 
        $this->loadModel('Influencers');
        // $this->viewBuilder()->layout('ajax');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $gender = trim($data['gender']);
            $kid_id = $kid_counter = 0;
            //echo $gender;
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            if ($exitEmail >= 1) {
                // $this->Flash->error(__('Email already exits'));
                echo json_encode(['status' => 'error', 'msg' => "Email already exits, try with other"]);
                // return $this->redirect(HTTP_ROOT);
            } else {
                $chk = $this->Influencers->find('all')->where(['email' => $data['email']])->count();
                if ($chk > 0) {
                    $data['is_influencer'] = 1;
                }
                $data['unique_id'] = $this->Custom->generateUniqNumber();
                $data['type'] = 2;
                $data['name'] = $data['fname'];
                $data['password'] = $data['pwd'];
                $data['is_active'] = 1;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $data['last_login_date'] = date('Y-m-d h:i:s');
                $data['qstr'] = '';
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $userID = $user->id;
                    $userDetailspatch = $this->UserDetails->newEntity();
                    $authUser = $this->Users->get($userID)->toArray();
                    $this->Auth->setUser($authUser);
                    $userDetails['user_id'] = $userID;
                    $userDetails['first_name'] = $data['fname'];
                    $userDetails['last_name'] = $data['lname'];
                    $userDetails['dateofbirth'] = '';
                    if ($gender == 'men') {
                        //echo $gender;exit;
                        $userDetails['gender'] = '1';
                        if (@$this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $userID;
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $userID;
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            // $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            //  $this->request->session()->write('codeProfile', '');
                            //$url = HTTP_ROOT . 'welcome/style/';
                        } else {
                            // $url = HTTP_ROOT . 'welcome/style/';
                        }
                    } elseif ($gender == 'women') {
                        //echo $gender;exit;
                        $userDetails['gender'] = '2';
                        if (@$this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $userID;
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $userID;
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            //$this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            // $this->request->session()->write('codeProfile', '');
                            //$url = HTTP_ROOT . 'welcome/style/';
                        } else {
                            //$url = HTTP_ROOT . 'welcome/style/';
                        }
                    } else {
                        $userDetails['gender'] = '3';
                        $gender = 'kids';
                        //echo $gender;exit;
                        $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $userID])->count();
                        $kid_counter = $countChild = $kidcount + 1;
                        $newEntity = $this->KidsDetails->newEntity();
                        $data['user_id'] = $userID;
                        $data['kids_first_name'] = '';
                        $data['kid_count'] = $countChild;
                        $data['kids_birthdate'] = '';
                        $data['kids_relationship_to_child'] = '';
                        $data['kids_clothing_gender'] = '';
                        $data['kids_frequency_arts_and_crafts'] = '';
                        $data['kids_frequency_biking'] = '';
                        $data['kids_frequency_theatre'] = '';
                        $data['kids_frequency_dance'] = '';
                        $data['kids_frequency_sports'] = '';
                        $data['kids_frequency_playing_outside'] = '';
                        $data['kids_frequency_musical_instruments'] = '';
                        $data['kids_frequency_reading'] = '';
                        $data['kids_frequency_video_games'] = '';
                        $data['created_dt'] = date('Y-m-d H:i:s');
                        $newEntity = $this->KidsDetails->patchEntity($newEntity, $data);
                        //$this->KidsDetails->save($newEntity);
                        $this->request->session()->write('KID_ID', $newEntity->id);
                        $kid_id = $newEntity->id;
                        $this->request->session()->write('PROFILE', 'KIDS');
                        if (@$this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $userID;
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $userID;
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            //$this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            // $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            //  $this->request->session()->write('codeProfile', '');
                            // $url = HTTP_ROOT . 'welcome/style/';
                        } else {
                            // $url = HTTP_ROOT . 'welcome/style/';
                        }
                    }
                    $gender1 = strtoupper($gender);
                    $userDetails['country'] = '';
                    $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $userDetails);
                    $this->UserDetails->save($userDetailspatch);
                    $this->request->session()->write('PROFILE', $gender1);
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $user->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $url_link = HTTP_ROOT . 'users/autoLogin/' . $this->Custom->encrypt_decrypt('encrypt', $userID);
                    $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $data['pwd'], $sitename, $url_link);
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                    echo json_encode(['status' => 'success', 'msg' => 'Account Created', 'user_id' => $userID, 'user_name' => $data['fname'], 'gender' => $userDetails['gender'], 'is_redirect' => 0, 'kid_id' => $kid_id, 'countdata' => ($kid_counter - 1)]);
                }
            }
        }
        exit();
    }

    public function ajaxWemenFitGetdata()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $data['user_id'];
                $checkExitDataFix = $this->PersonalizedFix->find('all')->where(['user_id' => $userId])->first();
                $checkExitDataInfo = $this->WomenInformation->find('all')->where(['user_id' => $userId])->first();
                $checkExitDataSize = $this->SizeChart->find('all')->where(['user_id' => $userId])->first();
                $checkExitDataWeMenStyle = $this->WomenStyle->find('all')->where(['user_id' => $userId])->first();
                $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $userId])->first();
                $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $userId])->first();
                $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $userId])->first();
                $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $userId])->first();
                $WomenJeansStyle = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $userId])->first();
                $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $userId]);
                $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();
                $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $userId]);
                $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
                $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $userId])->first();
                $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $userId])->first();
                $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $userId])->first();
                $primaryinfo = explode(",", @$Womeninfo->primary_objectives);
                $womens_brands_plus_low_tier1 = $this->WomenTypicalPurchaseCloth->find('all')->where(['WomenTypicalPurchaseCloth.user_id' => $userId]);
                $womens_brands_plus_low_tier = $womens_brands_plus_low_tier1->extract('womens_brands_plus_low_tier')->toArray();
                $women_shoe_prefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $userId])->first();
                $womenHeelHightPrefer = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $userId])->first();
                $style_wardrobe1 = $this->WomenIncorporateWardrobe->find('all')->where(['WomenIncorporateWardrobe.user_id' => $userId]);
                $style_wardrobe = $style_wardrobe1->extract('style_wardrobe')->toArray();
                $avoid_colors1 = $this->WomenColorAvoid->find('all')->where(['WomenColorAvoid.user_id' => $userId]);
                $avoid_colors = $avoid_colors1->extract('avoid_colors')->toArray();
                $avoid_prints1 = $this->WomenPrintsAvoid->find('all')->where(['WomenPrintsAvoid.user_id' => $userId]);
                $avoid_prints = $avoid_prints1->extract('avoid_prints')->toArray();
                $avoid_fabrics1 = $this->WomenFabricsAvoid->find('all')->where(['WomenFabricsAvoid.user_id' => $userId]);
                $WemenStyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $userId])->first();
                $avoid_fabrics = $avoid_fabrics1->extract('avoid_fabrics')->toArray();
                $style_sphere_selections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $userId]);
                $menbrand = $MensBrands->extract('mens_brands')->toArray();
                $wemenDesigne = $this->CustomDesine->find('all')->where(['user_id' => $userId])->first();
                echo json_encode([
                    'status' => 'success',
                    'tell_in_feet' => $checkExitDataFix['tell_in_feet'],
                    'tell_in_inch' => $checkExitDataFix['tell_in_inch'],
                    'weight_lbs' => $checkExitDataFix['weight_lbs'],
                    'linkdin_profile' => $checkExitDataWeMenStyle['linkdin_profile'],
                    'instagram' => $checkExitDataWeMenStyle['instagram'],
                    'twitter' => $checkExitDataWeMenStyle['twitter'],
                    'pinterest' => $checkExitDataWeMenStyle['pinterest'],
                    'birthday' => $checkExitDataInfo['birthday'],
                    'parent' => $checkExitDataInfo['parent'],
                    'body_type' => $checkExitDataInfo['body_type'],
                    'bra' => $checkExitDataSize['bra'],
                    'bra_recomend' => $checkExitDataSize['bra_recomend'],
                    'skirt' => $checkExitDataSize['skirt'],
                    'jeans' => $checkExitDataSize['jeans'],
                    'wo_jackect_size' => $checkExitDataSize['wo_jackect_size'],
                    'wo_bottom' => $checkExitDataSize['wo_bottom'],
                    'dress' => $checkExitDataSize['dress'],
                    'dress_recomended' => $checkExitDataSize['dress_recomended'],
                    'shirt_blouse' => $checkExitDataSize['shirt_blouse'],
                    'shirt_blouse_recomend' => $checkExitDataSize['shirt_blouse_recomend'],
                    'pants' => $checkExitDataSize['pants'],
                    'shoe' => $checkExitDataSize['shoe'],
                    'is_pregnant' => $checkExitDataSize['is_pregnant'],
                    'proportion_shoulders' => $checkExitDataSize['proportion_shoulders'],
                    'proportion_legs' => $checkExitDataSize['proportion_legs'],
                    'proportion_arms' => $checkExitDataSize['proportion_arms'],
                    'proportion_hips' => $checkExitDataSize['proportion_hips'],
                    'expected_due_date' => $checkExitDataSize['expected_due_date'],
                    'is_prefer_maternity' => $checkExitDataSize['is_prefer_maternity'],
                    'pregnant' => $checkExitDataInfo['pregnant'],
                    'loose_fitted' => $checkExitDataSize['loose_fitted'],
                    'skin_tone' => $checkExitDataInfo['skin_tone'],
                    'your_occupation' => $checkExitDataInfo['occupation_v2'],
                    'comfortable' => (isset($Womeninfo->comfortable_showing_off)) ? explode(',', @$Womeninfo->comfortable_showing_off) : [],
                    'comfortable1' => (isset($Womeninfo->comfortable_showing_off)) ? explode(',', @$Womeninfo->comfortable_showing_off) : [],
                    'covered' => (isset($Womeninfo->keep_covered)) ? explode(',', @$Womeninfo->keep_covered) : [],
                    'covered1' => (isset($Womeninfo->keep_covered)) ? explode(',', @$Womeninfo->keep_covered) : [],
                    'yourOccupation' => $Womeninfo->occupation_v2,
                    'Shoulders' => !empty($SizeChart->proportion_shoulders) ? $SizeChart->proportion_shoulders : '',
                    'Pumps' => (!empty($women_shoe_prefer->brands) && in_array('Pumps', explode(',', @$women_shoe_prefer->brands))) ? true : false,
                    'Sandals' => (!empty($women_shoe_prefer->brands) && in_array('Sandals', explode(',', @$women_shoe_prefer->brands))) ? true : false,
                    'Sneakers' => (!empty($women_shoe_prefer->brands) && in_array('Sneakers', explode(',', @$women_shoe_prefer->brands))) ? true : false,
                    'Boots_Booties' => (!empty($women_shoe_prefer->brands) && in_array('Boots-Booties', explode(',', @$women_shoe_prefer->brands))) ? true : false,
                    'Loafers_Flats' => (!empty($women_shoe_prefer->brands) && in_array('Loafers-Flats', explode(',', @$women_shoe_prefer->brands))) ? true : false,
                    'Wedges' => (!empty($women_shoe_prefer->brands) && in_array('Wedges', explode(',', @$women_shoe_prefer->brands))) ? true : false,
                    'Clogs_Mules' => (!empty($women_shoe_prefer->brands) && in_array('Clogs-Mules', explode(',', @$women_shoe_prefer->brands))) ? true : false,
                    'Platforms' => (!empty($women_shoe_prefer->brands) && in_array('Platforms', explode(',', @$women_shoe_prefer->brands))) ? true : false,
                    'Flat' => (!empty($womenHeelHightPrefer->height) && in_array('Flat(Under 1")', explode(',', @$womenHeelHightPrefer->height))) ? true : false,
                    'High' => (!empty($womenHeelHightPrefer->height) && in_array('High(3"-4")', explode(',', @$womenHeelHightPrefer->height))) ? true : false,
                    'Low' => (!empty($womenHeelHightPrefer->height) && in_array('Low(1"-2")', explode(',', @$womenHeelHightPrefer->height))) ? true : false,
                    'Ultra' => (!empty($womenHeelHightPrefer->height) && in_array('Ultra High(4.5"+)', explode(',', @$womenHeelHightPrefer->height))) ? true : false,
                    'Mid' => (!empty($womenHeelHightPrefer->height) && in_array('Mid(2"-3")', explode(',', @$womenHeelHightPrefer->height))) ? true : false,
                ]);
            }
        }
        exit;
    }

    public function colorupdate()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //$color_prefer = implode(",", json_decode($data['color_prefer'], true));
            //!empty($data['color_prefer']) ? json_encode($data['color_prefer']) : '';
            $data = $this->request->data;
            $userId = $data['user_id'];
            $this->WemenStyleSphereSelections->updateAll(['color_prefer' => $data['color_prefer']], ['user_id' => $userId]);
            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
        }
        exit;
    }

    public function colortrend()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            $color_mostly_wear = $data['color_mostly_wear'];
            // $color_mostly_wear1 = implode(",", json_decode($data['color_mostly_wear']));
            $this->WemenStyleSphereSelections->updateAll([
                'color_mostly_wear' => implode(",", json_decode($data['color_mostly_wear'])),
                'missing_from_your_fIT' => implode(",", json_decode($data['missing_from_your_fIT'], true)),
                'color_mostly_wear' => implode(",", json_decode($data['color_mostly_wear'], true)),
                'following_occasions' => $data['following_occasions']
            ], ['user_id' => $userId]);

            $checkExitDataStyle = $this->WomenJeansStyle->find('all')->where(['user_id' => $userId])->first();
            if (empty($checkExitDataStyle->id)) {
                $womeneansStyle = $this->WomenJeansStyle->newEntity();
                $data1['user_id'] = $userId;
                $data1['jeans_style'] = implode(",", json_decode($data['jeans_style'], true));
                $womeneansStyle = $this->WomenJeansStyle->patchEntity($womeneansStyle, $data1);
                $this->WomenJeansStyle->save($womeneansStyle);
            } else {
                $this->WomenJeansStyle->updateAll(['jeans_style' => implode(",", json_decode($data['jeans_style'], true))], ['user_id' => $userId]);
            }
            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit', 'data' => $data]);
        }
        exit;
    }

    public function ajaxKidsstyle()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            $kidId = $data['kid_id'];
            $checkExitKidsize = $this->KidsSizeFit->find('all')->where(['kid_id' => $kidId])->first();
            $this->KidsDetails->updateAll(['kids_frequency_arts_and_crafts' => $data['kids_frequency_arts_and_crafts'], 'kids_frequency_biking' => $data['kids_frequency_biking'], 'kids_frequency_dance' => $data['kids_frequency_dance'], 'kids_frequency_playing_outside' => $data['kids_frequency_playing_outside'], 'kids_frequency_musical_instruments' => $data['kids_frequency_musical_instruments'], 'kids_frequency_reading' => $data['kids_frequency_reading']], ['id' => $kidId]);
            if (@$checkExitKidsize->id == '') {
                $getkidDataxyz = $this->KidsDetails->find('all')->where(['id' => $kidId])->first();
                if ($getkidDataxyz->is_progressbar < 50) {
                    $this->KidsDetails->updateAll(['is_progressbar' => 50], ['id' => $kidId]);
                }
                $newEntity1 = $this->KidsSizeFit->newEntity();
                $data1['user_id'] = $userId;
                $data1['kid_id'] = $kidId;
                $data1['top_size'] = $data['top_size'];
                $data1['bottom_size'] = $data['bottom_size'];
                $data1['shoe_size'] = $data['shoe_size'];
                $data1['body_shape'] = $data['body_shape'];
                $data1['shirt_sleeve_length'] = $data['shirt_sleeve_length'];
                $data1['kids_fit_challenge_shirt_torso_length'] = $data['kids_fit_challenge_shirt_torso_length'];
                $data1['kids_fit_challenge_shirt_torso_width'] = $data['kids_fit_challenge_shirt_torso_width'];
                $data1['kids_fit_challenge_pant_waist'] = $data['kids_fit_challenge_pant_waist'];
                $data1['kids_fit_challenge_pant_leg_length'] = $data['kids_fit_challenge_pant_leg_length'];
                $data1['kids_fit_challenge_pant_leg_width'] = $data['kids_fit_challenge_pant_leg_width'];
                $data1['t_shirts'] = $data['t_shirts'];
                $data1['sweats_shirts'] = $data['sweats_shirts'];
                $data1['sweaters'] = $data['sweaters'];
                $data1['jacket_coats'] = $data['jacket_coats'];
                $data1['shorts'] = $data['shorts'];
                $data1['jeans'] = $data['jeans'];
                $data1['shoes'] = $data['shoes'];
                $data1['pajamas'] = $data['pajamas'];
                $data1['top_blouses'] = $data['top_blouses'];
                $data1['dreses_rompers'] = $data['dreses_rompers'];
                $data1['leggings'] = $data['leggings'];
                $data1['accessories'] = $data['accessories'];
                $data1['skirts'] = $data['skirts'];
                $data1['paint'] = $data['paint'];
                $newEntity1 = $this->KidsSizeFit->patchEntity($newEntity1, $data1);
                $this->KidsSizeFit->save($newEntity1);
                $this->KidsDetails->updateAll(['is_progressbar' => 50], ['id' => $kidId]);
            } else {
                $this->KidsSizeFit->updateAll([
                    'top_size' => $data['top_size'],
                    'bottom_size' => $data['bottom_size'],
                    'shoe_size' => $data['shoe_size'],
                    'body_shape' => $data['body_shape'],
                    'shirt_sleeve_length' => $data['shirt_sleeve_length'],
                    'kids_fit_challenge_shirt_torso_length' => $data['kids_fit_challenge_shirt_torso_length'],
                    'kids_fit_challenge_shirt_torso_width' => $data['kids_fit_challenge_shirt_torso_width'],
                    'kids_fit_challenge_pant_waist' => $data['kids_fit_challenge_pant_waist'],
                    'kids_fit_challenge_pant_leg_length' => $data['kids_fit_challenge_pant_leg_length'],
                    'kids_fit_challenge_pant_leg_width' => $data['kids_fit_challenge_pant_leg_width'],
                    't_shirts' => $data['t_shirts'],
                    'sweaters' => $data['sweaters'],
                    'jacket_coats' => $data['jacket_coats'],
                    'shorts' => $data['shorts'],
                    'jeans' => $data['jeans'],
                    'shoes' => $data['shoes'],
                    'pajamas' => $data['pajamas'],
                    'top_blouses' => $data['top_blouses'],
                    'dreses_rompers' => $data['dreses_rompers'],
                    'leggings' => $data['leggings'],
                    'accessories' => $data['accessories'],
                    'skirts' => $data['skirts'],
                    'paint' => $data['paint'],
                    'sweats_shirts' => $data['sweats_shirts']
                ], ['kid_id' => $kidId]);
            }
            $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $kidId])->first();
            if (@$KidClothingType->id == '') {
                $newEntity = $this->KidClothingType->newEntity();
                $data2['user_id'] = $userId;
                $data2['kid_id'] = $kidId;
                $data2['stripes'] = $data['stripes'];
                $data2['floral'] = $data['floral'];
                $data2['plaid'] = $data['plaid'];
                $data2['polkadots'] = $data['polkadots'];
                $data2['camo'] = $data['camo'];
                $data2['animal_print'] = $data['animal_print'];
                $data2['gingham'] = $data['gingham'];
                $newEntity = $this->KidClothingType->patchEntity($newEntity, $data2);
                $this->KidClothingType->save($newEntity);
            } else {
                $this->KidClothingType->updateAll([
                    'stripes' => @$data['stripes'],
                    'plaid' => @$data['plaid'],
                    'polkadots' => @$data['polkadots'],
                    'camo' => @$data['camo'],
                    'animal_print' => @$data['animal_print'],
                    'floral' => @$data['floral'],
                    'gingham' => @$data['gingham']
                ], ['kid_id' => $kidId]);
            }
            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
            //  echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
        }
        exit;
    }

    public function ajaxboyKidsstyle()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            $kidId = $data['kid_id'];
            $checkExitKidsize = $this->KidsSizeFit->find('all')->where(['kid_id' => $kidId])->first();
            $this->KidsDetails->updateAll(['kids_frequency_arts_and_crafts' => $data['kids_frequency_arts_and_crafts'], 'kids_frequency_biking' => $data['kids_frequency_biking'], 'kids_frequency_dance' => $data['kids_frequency_dance'], 'kids_frequency_playing_outside' => $data['kids_frequency_playing_outside'], 'kids_frequency_musical_instruments' => $data['kids_frequency_musical_instruments'], 'kids_frequency_reading' => $data['kids_frequency_reading']], ['id' => $kidId]);
            if (@$checkExitKidsize->id == '') {
                $getkidDataxyz = $this->KidsDetails->find('all')->where(['id' => $kidId])->first();
                if ($getkidDataxyz->is_progressbar < 50) {
                    $this->KidsDetails->updateAll(['is_progressbar' => 50], ['id' => $kidId]);
                }
                $newEntity1 = $this->KidsSizeFit->newEntity();
                $data1['user_id'] = $userId;
                $data1['kid_id'] = $kidId;
                $data1['top_size'] = $data['top_size'];
                $data1['bottom_size'] = $data['bottom_size'];
                $data1['shoe_size'] = $data['shoe_size'];
                $data1['body_shape'] = $data['body_shape'];
                $data1['shirt_sleeve_length'] = $data['shirt_sleeve_length'];
                $data1['kids_fit_challenge_shirt_torso_length'] = $data['kids_fit_challenge_shirt_torso_length'];
                $data1['kids_fit_challenge_shirt_torso_width'] = $data['kids_fit_challenge_shirt_torso_width'];
                $data1['kids_fit_challenge_pant_waist'] = $data['kids_fit_challenge_pant_waist'];
                $data1['kids_fit_challenge_pant_leg_length'] = $data['kids_fit_challenge_pant_leg_length'];
                $data1['kids_fit_challenge_pant_leg_width'] = $data['kids_fit_challenge_pant_leg_width'];
                $data1['t_sharts'] = $data['t_sharts'];
                $data1['sweats_shirts'] = $data['sweats_shirts'];
                $data1['polo_shirts'] = $data['polo_shirts'];
                $data1['button_downs'] = $data['button_downs'];
                $data1['sweaters'] = $data['sweaters'];
                $data1['jacket_coats'] = $data['jacket_coats'];
                $data1['shorts'] = $data['shorts'];
                $data1['jeans'] = $data['jeans'];
                $data1['trousers_chino'] = $data['trousers_chino'];
                $data1['sweatspaint'] = $data['sweatspaint'];
                $data1['shoes'] = $data['shoes'];
                $data1['t_shirts'] = $data['t_shirts'];
                $data1['pajamas'] = $data['pajamas'];
                $newEntity1 = $this->KidsSizeFit->patchEntity($newEntity1, $data1);
                $this->KidsSizeFit->save($newEntity1);
                $this->KidsDetails->updateAll(['is_progressbar' => 50], ['id' => $kidId]);
            } else {
                $this->KidsSizeFit->updateAll([
                    'top_size' => $data['top_size'],
                    'bottom_size' => $data['bottom_size'],
                    'shoe_size' => $data['shoe_size'],
                    'body_shape' => $data['body_shape'],
                    'shirt_sleeve_length' => $data['shirt_sleeve_length'],
                    'kids_fit_challenge_shirt_torso_length' => $data['kids_fit_challenge_shirt_torso_length'],
                    'kids_fit_challenge_shirt_torso_width' => $data['kids_fit_challenge_shirt_torso_width'],
                    'kids_fit_challenge_pant_waist' => $data['kids_fit_challenge_pant_waist'],
                    'kids_fit_challenge_pant_leg_length' => $data['kids_fit_challenge_pant_leg_length'],
                    'kids_fit_challenge_pant_leg_width' => $data['kids_fit_challenge_pant_leg_width'],
                    't_shirts' => $data['t_shirts'],
                    'sweats_shirts' => $data['sweats_shirts'],
                    'polo_shirts' => $data['polo_shirts'],
                    'button_downs' => $data['button_downs'],
                    'sweaters' => $data['sweaters'],
                    'jacket_coats' => $data['jacket_coats'],
                    'shorts' => $data['shorts'],
                    'jeans' => $data['jeans'],
                    'trousers_chino' => $data['trousers_chino'],
                    'sweatspaint' => $data['sweatspaint'],
                    'shoes' => $data['shoes'],
                    'pajamas' => $data['pajamas']
                ], ['kid_id' => $kidId]);
            }
            $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $kidId])->first();
            if (@$KidClothingType->id == '') {
                $newEntity = $this->KidClothingType->newEntity();
                $data2['user_id'] = $userId;
                $data2['kid_id'] = $kidId;
                $data2['stripes'] = $data['stripes'];
                $data2['plaid'] = $data['plaid'];
                $data2['gingham'] = $data['gingham'];
                $data2['novelty'] = $data['novelty'];
                $data2['polkadots'] = $data['polkadots'];
                $data2['camo'] = $data['camo'];
                $newEntity = $this->KidClothingType->patchEntity($newEntity, $data2);
                $this->KidClothingType->save($newEntity);
            } else {
                $this->KidClothingType->updateAll([
                    'stripes' => $data['stripes'],
                    'plaid' => $data['plaid'],
                    'gingham' => $data['gingham'],
                    'novelty' => $data['novelty'],
                    'polkadots' => $data['polkadots'],
                    'camo' => $data['camo']
                ], ['kid_id' => $kidId]);
            }
            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
        }
        exit;
    }

    public function pricerangekid()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            $kidId = $data['kid_id'];
            $checkExitData = $this->KidStyles->find('all')->where(['kid_id' => $kidId])->first();
            if ($getkidDataxyz->is_progressbar < 75) {
                $this->KidsDetails->updateAll(['is_progressbar' => 75], ['id' => $kidId]);
            }
            if (@$checkExitData->id == '') {
                $style = $this->KidStyles->newEntity();
                $data['user_id'] = $userId;
                $data['kid_id'] = $kidId;
                $data['casual_shirts'] = $data['casual_shirts'];
                $data['skirts_shorts'] = $data['skirts_shorts'];
                $data['leggings'] = $data['leggings'];
                $data['jeans'] = $data['jeans'];
                $data['dresses'] = $data['dresses'];
                $data['blouses'] = $data['blouses'];
                $data['jaket'] = $data['jaket'];
                $data['sweaters'] = $data['sweaters'];
                $data['shoes'] = $data['shoes'];
                $style = $this->KidStyles->patchEntity($style, $data);
                $this->KidStyles->save($style);
                $this->KidsDetails->updateAll(['is_progressbar' => 75], ['id' => $kidId]);
            } else {
                $this->KidStyles->updateAll([
                    'casual_shirts' => $data['casual_shirts'],
                    'skirts_shorts' => $data['skirts_shorts'],
                    'jeans' => $data['jeans'],
                    'jaket' => $data['jaket'],
                    'sweaters' => $data['sweaters'],
                    'dresses' => $data['dresses'],
                    'leggings' => $data['leggings'],
                    'blouses' => $data['blouses'],
                    'shoes' => $data['shoes'],
                ], ['kid_id' => $kidId]);
            }

            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
        }
        exit;
    }

    public function pricerangekidboy()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            $kidId = $data['kid_id'];
            $checkExitData = $this->KidStyles->find('all')->where(['kid_id' => $kidId])->first();
            if (@$checkExitData->id == '') {
                $getkidDataxyz = $this->KidsDetails->find('all')->where(['id' => $kidId])->first();
                if ($getkidDataxyz->is_progressbar < 75) {
                    $this->KidsDetails->updateAll(['is_progressbar' => 75], ['id' => $kidId]);
                }
                $style = $this->KidStyles->newEntity();
                $data['user_id'] = $userId;
                $data['kid_id'] = $kidId;
                $data['casual_shirts'] = $data['casual_shirts'];
                $data['shorts'] = $data['shorts'];
                $data['jeans_paint'] = $data['jeans_paint'];
                $data['jaket'] = $data['jaket'];
                $data['sweaters'] = $data['sweaters'];
                $data['button_downs'] = $data['button_downs'];
                $data['casual_bootms'] = $data['casual_bootms'];
                $data['shoes'] = $data['shoes'];
                $style = $this->KidStyles->patchEntity($style, $data);
                $this->KidStyles->save($style);
                $this->KidsDetails->updateAll(['is_progressbar' => 75], ['id' => $kidId]);
            } else {
                $this->KidStyles->updateAll([
                    'casual_shirts' => $data['casual_shirts'],
                    'shorts' => $data['shorts'],
                    'jeans_paint' => $data['jeans_paint'],
                    'jaket' => $data['jaket'],
                    'sweaters' => $data['sweaters'],
                    'button_downs' => $data['button_downs'],
                    'casual_bootms' => $data['casual_bootms'],
                    'shoes' => $data['shoes'],
                ], ['kid_id' => $kidId]);
            }

            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
        }
        exit;
    }

    public function denimstyles()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            $this->WomenStyle->updateAll(['distressed_denim_non' => $data['distressed_denim_non'], 'distressed_denim_minimally' => $data['distressed_denim_minimally'], 'distressed_denim_fairly' => $data['distressed_denim_fairly'], 'distressed_denim_heavily' => $data['distressed_denim_heavily']], ['user_id' => $userId]);
            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
        }
        exit;
    }

    public function pricerange()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            if (!empty($data['profile_note'])) {
                $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $userId])->first();

                if ($userDetails->user_detail->gender == 1) {
                    $this->MenStyle->updateAll(['profile_note' => $data['profile_note']], ['user_id' => $userId]);
                } else {
                    $this->WomenStyle->updateAll(['profile_note' => $data['profile_note']], ['user_id' => $userId]);
                }
            }
            if (!empty($data['mens_brands'])) {
                $this->MensBrands->deleteAll(['user_id' => $userId]);
                foreach (json_decode($data['mens_brands'], true) as $mens_brands) {
                    $newEntity1 = $this->MensBrands->newEntity();
                    $datax['id'] = '';
                    $datax['user_id'] = $userId;
                    $datax['mens_brands'] = $mens_brands;
                    $newEntity1 = $this->MensBrands->patchEntity($newEntity1, $datax);
                    $this->MensBrands->save($newEntity1);
                }
            } else {
                $upArr = [];
                if (!empty($data['tops'])) {
                    $upArr['tops'] = $data['tops'];
                }
                if (!empty($data['bottoms'])) {
                    $upArr['bottoms'] = $data['bottoms'];
                }
                if (!empty($data['outwear'])) {
                    $upArr['outwear'] = $data['outwear'];
                }
                if (!empty($data['jeans'])) {
                    $upArr['jeans'] = $data['jeans'];
                }
                if (!empty($data['jewelry'])) {
                    $upArr['jewelry'] = $data['jewelry'];
                }
                if (!empty($data['accessproes'])) {
                    $upArr['accessproes'] = $data['accessproes'];
                }
                if (!empty($data['dress'])) {
                    $upArr['dress'] = $data['dress'];
                }
                $this->WomenStyle->updateAll($upArr, ['user_id' => $userId]);
                $chk = $this->UserDetails->find('all')->where(['user_id' => $userId])->first();
                if ($chk->is_progressbar < 75) {
                    $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $userId]);
                }
            }
            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit', $data]);
        }
        exit;
    }

    public function designbrand()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            $this->WomenStyle->updateAll([
                'tops' => $data['tops'],
                'bottoms' => $data['bottoms'],
                'outwear' => $data['outwear'],
                'jeans' => $data['jeans'],
                'jewelry' => $data['jewelry'],
                'accessproes' => $data['accessproes'],
                'dress' => $data['dress'],
            ], ['user_id' => $userId]);
            echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
        }
        exit;
    }

    public function ajaxWemenFit()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $data['user_id'];
                $checkExitDataFix = $this->PersonalizedFix->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitDataFix->id == '') {
                    $personalizedfix = $this->PersonalizedFix->newEntity();
                    $table['user_id'] = $userId;
                    $table['tell_in_feet'] = $data['tell_in_feet'];
                    $table['tell_in_inch'] = $data['tell_in_inch'];
                    $table['weight_lbs'] = $data['weight_lbs'];
                    $personalizedfix = $this->PersonalizedFix->patchEntity($personalizedfix, $table);
                    $this->PersonalizedFix->save($personalizedfix);
                    $this->UserDetails->updateAll(['is_progressbar' => 25], ['user_id' => $userId]);
                } else {
                    $this->PersonalizedFix->updateAll(['tell_in_feet' => $data['tell_in_feet'], 'tell_in_inch' => $data['tell_in_inch'], 'weight_lbs' => $data['weight_lbs']], ['user_id' => $userId]);
                }
                $checkExitDataInfo = $this->WomenInformation->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitDataInfo->id == '') {
                    $womenInformation = $this->WomenInformation->newEntity();
                    $data1['user_id'] = $userId;
                    $data1['birthday'] = $data['birthday'];
                    $data1['parent'] = $data['parent'];
                    $data1['body_type'] = $data['body_type'];
                    $data1['pregnant'] = $data['pregnant'];
                    $data1['occupation_v2'] = $data['your_occupation'];
                    $data1['skin_tone'] = $data['skin_tone'];
                    $data1['is_pregnant'] = $data['is_pregnant'];
                    $data1['comfortable_showing_off'] = implode(",", json_decode($data['comfortable_showing_off'], true));
                    $data1['keep_covered'] = implode(",", json_decode($data['keep_covered'], true));
                    $womenInformation = $this->WomenInformation->patchEntity($womenInformation, $data1);
                    $this->WomenInformation->save($womenInformation);
                } else {
                    $this->WomenInformation->updateAll([
                        'birthday' => $data['birthday'],
                        'parent' => $data['parent'],
                        'pregnant' => $data['pregnant'],
                        'is_pregnant' => $data['is_pregnant'],
                        'body_type' => $data['body_type'],
                        'occupation_v2' => $data['your_occupation'],
                        'skin_tone' => $data['skin_tone'],
                        'comfortable_showing_off' => implode(",", json_decode($data['comfortable_showing_off'], true)),
                        'keep_covered' => implode(",", json_decode($data['keep_covered'], true))
                    ], ['user_id' => $userId]);
                }
                $checkExitDataSize = $this->SizeChart->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitDataSize->id == '') {
                    $sizechart = $this->SizeChart->newEntity();
                    $table['user_id'] = $userId;
                    $table['pants'] = $data['pants'];
                    $table['bra'] = $data['bra'];
                    $table['bra_recomend'] = $data['bra_recomend'];
                    $table['skirt'] = $data['skirt'];
                    $table['jeans'] = $data['jeans'];
                    $table['active_wr'] = $data['active_wr'];
                    $table['wo_jackect_size'] = $data['wo_jackect_size'];
                    $table['wo_bottom'] = $data['wo_bottom'];
                    $table['dress'] = $data['dress'];
                    $table['dress_recomended'] = $data['dress_recomended'];
                    $table['shirt_blouse'] = $data['shirt_blouse'];
                    $table['shirt_blouse_recomend'] = $data['shirt_blouse_recomend'];
                    $table['pantsr1'] = $data['pantsr1'];
                    $table['pantsr2'] = $data['pantsr2'];
                    $table['shoe'] = $data['shoe'];
                    $table['is_pregnant'] = $data['is_pregnant'];
                    $table['proportion_shoulders'] = $data['proportion_shoulders'];
                    $table['proportion_legs'] = $data['proportion_legs'];
                    $table['proportion_arms'] = $data['proportion_arms'];
                    $table['proportion_hips'] = $data['proportion_hips'];
                    $table['expected_due_date'] = date('Y-m-d', strtotime($data['duedate']));
                    $table['is_prefer_maternity'] = $data['is_prefer_maternity'];
                    $table['loose_fitted'] = $data['loose_fitted'];
                    $sizechart = $this->SizeChart->patchEntity($sizechart, $table);
                    $this->SizeChart->save($sizechart);
                } else {
                    $this->SizeChart->updateAll(
                        [
                            'pants' => $data['pants'],
                            'bra' => $data['bra'],
                            'bra_recomend' => $data['bra_recomend'],
                            'skirt' => $data['skirt'],
                            'jeans' => $data['jeans'],
                            'active_wr' => $data['active_wr'],
                            'wo_jackect_size' => $data['wo_jackect_size'],
                            'wo_bottom' => $data['wo_bottom'],
                            'dress' => $data['dress'],
                            'dress_recomended' => $data['dress_recomended'],
                            'shirt_blouse' => $data['shirt_blouse'],
                            'shirt_blouse_recomend' => $data['shirt_blouse_recomend'],
                            'pantsr1' => $data['pantsr1'],
                            'pantsr2' => $data['pantsr2'],
                            'shoe' => $data['shoe'],
                            'is_pregnant' => $data['is_pregnant'],
                            'proportion_shoulders' => $data['proportion_shoulders'],
                            'proportion_legs' => $data['proportion_legs'],
                            'proportion_arms' => $data['proportion_arms'],
                            'proportion_hips' => $data['proportion_hips'],
                            'expected_due_date' => date('Y-m-d', strtotime($data['duedate'])),
                            'loose_fitted' => $data['loose_fitted'],
                            'is_prefer_maternity' => $data['is_prefer_maternity']
                        ],
                        ['user_id' => $userId]
                    );
                }
                $checkExitDataWeMenStyle = $this->WomenStyle->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitDataWeMenStyle->id == '') {
                    $WomenStyle = $this->WomenStyle->newEntity();
                    $data2['user_id'] = $userId;
                    $data2['linkdin_profile'] = $data['linkdin_profile'];
                    $data2['instagram'] = $data['instagram'];
                    $data2['twitter'] = $data['twitter'];
                    $data2['pinterest'] = $data['pinterest'];
                    $WomenStyle = $this->WomenStyle->patchEntity($WomenStyle, $data2);
                    $this->WomenStyle->save($WomenStyle);
                } else {
                    $this->WomenStyle->updateAll(['linkdin_profile' => $data['linkdin_profile'], 'instagram' => $data['instagram'], 'twitter' => $data['twitter'], 'pinterest' => $data['pinterest']], ['user_id' => $userId]);
                }
                $WomenShoePrefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $userId])->first();
                if (@$WomenShoePrefer->id == '') {
                    $WomenShoePrefer = $this->WomenShoePrefer->newEntity();
                    $data3['brands'] = implode(",", json_decode($data['women_shoe_prefer'], true));
                    $data3['user_id'] = $userId;
                    $WomenShoePrefer = $this->WomenShoePrefer->patchEntity($WomenShoePrefer, $data3);
                    $this->WomenShoePrefer->save($WomenShoePrefer);
                } else {
                    $this->WomenShoePrefer->updateAll(['brands' => implode(",", json_decode($data['women_shoe_prefer'], true))], ['user_id' => $userId]);
                }
                $WomenHeelHightPreferExit = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $userId])->first();
                if ($WomenHeelHightPreferExit->id == '') {
                    $WomenHeelHightPrefer = $this->WomenHeelHightPrefer->newEntity();
                    $data4['height'] = implode(",", json_decode($data['womenHeelHightPrefer'], true));
                    $data4['user_id'] = $userId;
                    $WomenShoePrefer = $this->WomenHeelHightPrefer->patchEntity($WomenHeelHightPrefer, $data4);
                    $this->WomenHeelHightPrefer->save($WomenHeelHightPrefer);
                } else {
                    //echo json_decode($data['womenHeelHightPrefer']); exit;
                    $this->WomenHeelHightPrefer->updateAll(['height' => implode(",", json_decode($data['womenHeelHightPrefer'], true))], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
            }
        }
        exit;
    }

    public function styleInspiration()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $data['user_id'];
                $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitWemenStyleSphereSelections->id == '') {
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                    $table['user_id'] = $userId;
                    $table['style_sphere_selections_v2'] = implode(",", json_decode($data['style_sphere_selections_v2'], true));
                    /* $table['style_sphere_selections_v3'] = $data['style_sphere_selections_v3'];
                      $table['style_sphere_selections_v4'] = $data['style_sphere_selections_v4'];
                      $table['style_sphere_selections_v5'] = $data['style_sphere_selections_v5'];
                      $table['style_sphere_selections_v6'] = $data['style_sphere_selections_v6'];
                      $table['style_sphere_selections_v7'] = $data['style_sphere_selections_v7'];
                      $table['style_sphere_selections_v8'] = $data['style_sphere_selections_v8'];
                      $table['style_sphere_selections_v9'] = $data['style_sphere_selections_v9'];
                     */
                    $table['style_sphere_selections_v10'] = implode(",", json_decode($data['style_sphere_selections_v10'], true));
                    $table['wo_dress_length'] = implode(",", json_decode($data['wo_dress_length'], true));
                    $table['wo_top_half'] = implode(",", json_decode($data['wo_top_half'], true));
                    $table['wo_pant_length'] = implode(",", json_decode($data['wo_pant_length'], true));
                    $table['wo_pant_rise'] = implode(",", json_decode($data['wo_pant_rise'], true));
                    $table['wo_pant_style'] = implode(",", json_decode($data['wo_pant_style'], true));
                    $table['wo_appare'] = implode(",", json_decode($data['wo_appare'], true));
                    $table['wo_bottom_style'] = implode(",", json_decode($data['wo_bottom_style'], true));
                    $table['wo_top_style'] = implode(",", json_decode($data['wo_top_style'], true));
                    /* $table['style_sphere_selections_v3_3'] = implode(",", json_decode($data['style_sphere_selections_v3_3'], true));
                      $table['style_sphere_selections_v11'] = $data['style_sphere_selections_v11'];
                     */
                    // $table['color_prefer'] = !empty(json_decode($data['color_prefer'], true)) ? json_encode(json_decode($data['color_prefer'], true)) : '';
                    $table['color_mostly_wear'] = implode(",", json_decode($data['color_mostly_wear'], true));
                    $table['missing_from_your_fIT'] = implode(",", json_decode($data['missing_from_your_fIT'], true));
                    $table['following_occasions'] = $data['following_occasions'];
                    $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                    $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                } else {
                    $this->WemenStyleSphereSelections->updateAll([
                        'style_sphere_selections_v2' => implode(",", json_decode($data['style_sphere_selections_v2'], true)),
                        /* 'style_sphere_selections_v3' => $data['style_sphere_selections_v3'],
                          'style_sphere_selections_v4' => $data['style_sphere_selections_v4'],
                          'style_sphere_selections_v5' => $data['style_sphere_selections_v5'],
                          'style_sphere_selections_v6' => $data['style_sphere_selections_v6'],
                          'style_sphere_selections_v7' => $data['style_sphere_selections_v7'],
                          'style_sphere_selections_v8' => $data['style_sphere_selections_v8'],
                          'style_sphere_selections_v9' => $data['style_sphere_selections_v9'],
                          'style_sphere_selections_v3_3' => implode(",", json_decode($data['style_sphere_selections_v3_3'], true)), */
                        'style_sphere_selections_v10' => implode(",", json_decode($data['style_sphere_selections_v10'], true)),
                        //'color_prefer' => !empty(json_decode($data['color_prefer'], true)) ? json_encode(json_decode($data['color_prefer'], true)) : '',
                        //'color_mostly_wear' => implode(",", json_decode($data['color_mostly_wear'], true)),
                        // 'missing_from_your_fIT' => implode(",", json_decode($data['missing_from_your_fIT'], true)),
                        //'following_occasions' => $data['following_occasions'],
                        //'style_sphere_selections_v11' => $data['style_sphere_selections_v11'],
                        'wo_dress_length' => implode(",", json_decode($data['wo_dress_length'], true)),
                        'wo_top_half' => implode(",", json_decode($data['wo_top_half'], true)),
                        'wo_pant_length' => implode(",", json_decode($data['wo_pant_length'], true)),
                        'wo_pant_rise' => implode(",", json_decode($data['wo_pant_rise'], true)),
                        'wo_pant_style' => implode(",", json_decode($data['wo_pant_style'], true)),
                        'wo_appare' => implode(",", json_decode($data['wo_appare'], true)),
                        'wo_bottom_style' => implode(",", json_decode($data['wo_bottom_style'], true)),
                        'wo_top_style' => implode(",", json_decode($data['wo_top_style'], true))
                    ], ['user_id' => $userId]);
                }
                $checkExitDataWeMenStyle = $this->WomenStyle->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitDataWeMenStyle->id == '') {
                    $WomenStyle = $this->WomenStyle->newEntity();
                    $data2['user_id'] = $userId;
                    $data2['distressed_denim_non'] = $data['distressed_denim_non'];
                    $data2['distressed_denim_minimally'] = $data['distressed_denim_minimally'];
                    $data2['distressed_denim_fairly'] = $data['distressed_denim_fairly'];
                    $data2['distressed_denim_heavily'] = $data['distressed_denim_heavily'];
                    $WomenStyle = $this->WomenStyle->patchEntity($WomenStyle, $data2);
                    //$this->WomenStyle->save($WomenStyle);
                } else {
                    // $this->WomenStyle->updateAll(['distressed_denim_non' => $data['distressed_denim_non'], 'distressed_denim_minimally' => $data['distressed_denim_minimally'], 'distressed_denim_fairly' => $data['distressed_denim_fairly'], 'distressed_denim_heavily' => $data['distressed_denim_heavily']], ['user_id' => $userId]);
                }
                $checkExitDataStyle = $this->WomenJeansStyle->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitDataStyle->id == '') {
                    $womeneansStyle = $this->WomenJeansStyle->newEntity();
                    $data1['user_id'] = $userId;
                    $data1['jeans_style'] = implode(",", json_decode($data['jeans_style'], true));
                    $womeneansStyle = $this->WomenJeansStyle->patchEntity($womeneansStyle, $data1);
                    //  $this->WomenJeansStyle->save($womeneansStyle);
                } else {
                    //$this->WomenJeansStyle->updateAll(['jeans_style' => implode(",", json_decode($data['jeans_style'], true))], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
            }
        }
        exit;
    }

    public function ajaxMenFit()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $data['user_id'];
                $checKMenStarts = $this->MenStats->find('all')->where(['user_id' => $userId])->first();
                if (@$checKMenStarts->id == '') {
                    $MenStats = $this->MenStats->newEntity();
                    $data['user_id'] = $userId;
                    $data['birthday'] = $data['birthday'];
                    $MenStats = $this->MenStats->patchEntity($MenStats, $data);
                    $this->MenStats->save($MenStats);
                    $this->UserDetails->updateAll(['is_progressbar' => 25], ['user_id' => $userId]);
                } else {
                    $this->MenStats->updateAll(
                        [
                            'tall_feet' => $data['tall_feet'],
                            'tell_inch' => $data['tell_inch'],
                            'weight_lb' => $data['weight_lb'],
                            'birthday' => $data['birthday'],
                            'are_you_a_parent' => $data['are_you_a_parent'],
                            'your_occupation' => $data['your_occupation']
                        ],
                        ['user_id' => $userId]
                    );
                }
                $checKMentypical = $this->TypicallyWearMen->find('all')->where(['user_id' => $userId])->first();
                if ($checKMentypical->id == '') {
                    $data['user_id'] = $userId;
                    $TypicallyWearMen = $this->TypicallyWearMen->newEntity();
                    $TypicallyWearMen = $this->TypicallyWearMen->patchEntity($TypicallyWearMen, $data);
                    $this->TypicallyWearMen->save($TypicallyWearMen);
                } else {
                    $this->TypicallyWearMen->updateAll(
                        [
                            'waist' => $data['waist'],
                            'waist_size_run' => $data['waist_size_run'],
                            'size' => $data['size'],
                            'shirt' => $data['shirt'],
                            'inseam' => $data['inseam'],
                            'men_bottom' => $data['men_bottom'],
                            'shoe' => $data['shoe'],
                            'shoe_medium' => $data['shoe_medium'],
                            'body_type' => $data['body_type'],
                            'skin_tone' => $data['skin_tone']
                        ],
                        ['user_id' => $userId]
                    );
                }
                $checkExitData = $this->MenStyle->find('all')->where(['user_id' => $userId])->first();
                if ($checkExitData->id == '') {
                    $men_style = $this->MenStyle->newEntity();
                    $data['user_id'] = $userId;
                    $men_style = $this->MenStyle->patchEntity($men_style, $data);
                    $this->MenStyle->save($men_style);
                } else {
                    $this->MenStyle->updateAll([
                        'linkdin_profile' => $data['linkdin_profile'],
                        'instagram' => $data['instagram'],
                        'twitter' => $data['twitter'],
                        'pinterest' => $data['pinterest']
                    ], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
            }
        }
        exit;
    }

    public function ajaxMenPrice()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {

            $data = $this->request->data;
            if ($data) {
                $userId = $data['user_id'];
                $checkExitData = $this->MenStyle->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitData->id == '') {
                    $men_style = $this->MenStyle->newEntity();
                    $data['user_id'] = $data['user_id'];
                    $men_style = $this->MenStyle->patchEntity($men_style, $data);
                    $this->MenStyle->save($men_style);
                    $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $userId]);
                } else {
                    $this->MenStyle->updateAll([
                        'button_shirts' => $data['button_shirts'],
                        'tees_polos' => $data['tees_polos'],
                        'weaters_sweatshirts' => $data['weaters_sweatshirts'],
                        'pants_denim' => $data['pants_denim'],
                        'shorts' => $data['shorts'],
                        'shoes' => $data['shoes'],
                        'blazers_outerwear' => $data['blazers_outerwear'],
                        'tees_polos' => $data['tees_polos'],
                        'tees_polos' => $data['tees_polos'],
                    ], ['user_id' => $userId]);
                }
                $checkExitDataS = $this->MenAccessories->find('all')->where(['user_id' => $userId])->first();
                if (@$checkExitDataS->id == '') {
                    $menSccessories = $this->MenAccessories->newEntity();
                    $data['user_id'] = $userId;
                    $data['men_tites'] = $data['men_tites'];
                    $data['men_belts'] = $data['men_belts'];
                    $data['men_wallets_begs'] = $data['men_wallets_begs'];
                    $data['men_sunglass'] = $data['men_sunglass'];
                    $data['men_hets'] = $data['men_hets'];
                    $data['men_socks'] = $data['men_socks'];
                    $data['men_underwear'] = $data['men_underwear'];
                    $data['men_grooming'] = $data['men_grooming'];
                    $menSccessories = $this->MenAccessories->patchEntity($menSccessories, $data);
                    $this->MenAccessories->save($menSccessories);
                    $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $userId]);
                } else {
                    $this->MenAccessories->updateAll([
                        'men_tites' => $data['men_tites'],
                        'men_belts' => $data['men_belts'],
                        'men_wallets_begs' => $data['men_wallets_begs'],
                        'men_sunglass' => $data['men_sunglass'],
                        'men_hets' => $data['men_hets'],
                        'men_socks' => $data['men_socks'],
                        'men_underwear' => $data['men_underwear'],
                        'men_grooming' => $data['men_grooming'],
                    ], ['user_id' => $userId]);
                }
                echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/custom']);
            }
        }
        exit;
    }

    public function ajaxMenCustom()
    {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['men_custom'] == 'men_custom') {
                    if (@$data['mens_brands']) {
                        $this->MensBrands->deleteAll(['user_id' => $userId]);
                        foreach (@$data['mens_brands'] as $mens_brands) {
                            $newEntity1 = $this->MensBrands->newEntity();
                            $data['id'] = '';
                            $data['user_id'] = $this->Auth->user('id');
                            $data['mens_brands'] = $mens_brands;
                            $newEntity1 = $this->MensBrands->patchEntity($newEntity1, $data);
                            $this->MensBrands->save($newEntity1);
                        }
                    }
                    if (@$data['profile_note']) {
                        $this->MenStyle->updateAll(['profile_note' => $data['profile_note']], ['user_id' => $userId]);
                    }
                    $checkPagePosition = $this->UserDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->first()->is_progressbar;
                    if (@$checkPagePosition != 100) {
                        $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $userId]);
                        $this->Users->updateAll(['is_redirect' => '1'], ['id' => $this->Auth->user('id')]);
                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/schedule']);
                    } else {
                        $Usersdata = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
                        if ($Usersdata->is_redirect == 0) {
                            $url = 'welcome/style/';
                        } elseif ($Usersdata->is_redirect == 0) {
                            $url = 'welcome/schedule/';
                        } elseif ($Usersdata->is_redirect == 0) {
                            $url = 'welcome/style/';
                        } elseif ($Usersdata->is_redirect == 1) {
                            $url = 'welcome/schedule/';
                        } elseif ($Usersdata->is_redirect == 2) {
                            $url = 'not-yet-shipped';
                        } elseif ($Usersdata->is_redirect == 3) {
                            $url = 'profile-review/';
                        } elseif ($Usersdata->is_redirect == 4) {
                            $url = 'order_review/';
                        } elseif ($Usersdata->is_redirect == 5) {
                            $url = 'calendar-sechedule/';
                        } elseif ($Usersdata->is_redirect == 6) {
                            $url = 'customer-order-review';
                        }
                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . $url]);
                    }
                }
            }
        }
        exit;
    }

    public function stripeCustomerKey($user_id)
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->viewBuilder()->layout('ajax');
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();
        $stripe_key_arr = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );
        $address = $this->ShippingAddress->find('all')->where(['user_id' => $user_id])->first();
        if (empty($address)) {
            echo json_encode(['status' => "error", 'msg' => "Address not added"]);
            exit;
        }
        $chk_usr_data = $this->Users->find('all')->where(['id' => $user_id])->first();
        if (empty($chk_usr_data->stripe_customer_key)) {
            \Stripe\Stripe::setApiKey($stripe_key_arr['secret_key']);
            $stripe = new \Stripe\StripeClient($stripe_key_arr['secret_key']);
            try {
                $name = $chk_usr_data->name;
                $email = $chk_usr_data->email;
                $customer = \Stripe\Customer::create(array(
                    'name' => $name,
                    'email' => $email,
                    'description' => $chk_usr_data->id . ':- ' . $name . ' customer key creating ',
                    "address" => ["city" => $address->city, "country" => $address->country, "line1" => $address->address, "line2" => $address->address_line_2, "postal_code" => $address->zipcode, "state" => $address->state]
                ));
                $this->Users->updateAll(['stripe_customer_key' => $customer->id], ['id' => $user_id]);
                echo json_encode(['status' => "success", 'mdg' => "Address added successfully."]);
                exit;
            } catch (Exception $e) {
                echo json_encode(['status' => "error", 'msg' => "Address not added, Please add your delivery address"]);
                exit;
            }
        } else {
            echo json_encode(['status' => "success", 'msg' => ""]);
            exit;
        }
    }

    public function StylefitPayment($user_id, $kid_id = null)
    {
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $user_id])->first();
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.is_save' => 1]);
        if (empty($this->request->session()->read('KID_ID'))) {
            if (!empty($kid_id)) {
                $this->request->session()->write('KID_ID', $kid_id);
            }
        } else {
            if (empty($kid_id)) {
                $kid_id = !empty($this->request->session()->read('KID_ID')) ? $this->request->session()->read('KID_ID') : '';
            }
        }
        if ($userDetails->is_influencer == 1) {
            $main_style_fee = 1;
        } else {
            if (!empty($kid_id)) {
                $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
            } else {
                $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
            }
        }
        $payerName = $userDetails->user_detail->first_name . ' ' . $userDetails->user_detail->last_name;
        $this->set(compact('payerName', 'user_id', 'savecard', 'userDetails', 'main_style_fee', 'kid_id'));
        $this->render('stylefit_payment');
    }

    public function addNewCard($token_key, $user_id)
    {
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");

        $stripe_api_key = $this->Custom->getStripeKey();
        $stripe_key_arr = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );
        $chk_usr_data = $this->Users->find('all')->where(['id' => $user_id])->first();
        // echo "<pre>";
        // print_r($chk_usr_data);
        // exit;
        if (!empty($chk_usr_data->stripe_customer_key)) {
            \Stripe\Stripe::setApiKey($stripe_key_arr['secret_key']);
            $stripe = new \Stripe\StripeClient($stripe_key_arr['secret_key']);
            $intent = $stripe->setupIntents->create(
                [
                    'customer' => $chk_usr_data->stripe_customer_key, //'{{CUSTOMER_ID}}',
                    'payment_method_types' => ['card'],
                ]
            );
            $client_secret = $intent->client_secret;
        } else {
            $this->Flash->error(__('Add address before add card '));
            if (!empty($_GET['cardx'])) {
                return $this->redirect(HTTP_ROOT . 'terms-conditions');
            }
            return $this->redirect(HTTP_ROOT . 'api/StylefitPayment/' . $user_id);
        }
        $this->set(compact('client_secret', 'token_key', 'user_id', 'chk_usr_data','stripe_key_arr'));
        $this->render('add_new_card');
    }

    public function cardStatus($token_key, $user_id)
    {
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();
        $stripe_key_arr = array(// "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );
        $chk_usr_data = $this->Users->find('all')->where(['id' => $user_id])->first();
        if (!empty($chk_usr_data->stripe_customer_key)) {
            \Stripe\Stripe::setApiKey($stripe_key_arr['secret_key']);
            $stripe = new \Stripe\StripeClient($stripe_key_arr['secret_key']);
            if ($_GET['redirect_status'] == "succeeded") {
                $payment = $stripe->paymentMethods->all(
                    [
                        'customer' => $chk_usr_data->stripe_customer_key, 'type' => 'card'
                    ]
                );
                $dt_li = $payment->data[0];
                $setup_intent = $_GET['setup_intent'];
                $setup_intent_client_secret = $_GET['setup_intent_client_secret'];
                $newData['user_id'] = $user_id;
                $newData['card_name'] = $chk_usr_data->name;
                $newData['card_type'] = ucfirst($dt_li->card->networks->available[0]);
                $newData['card_number'] = "XXXX XXXX XXXX " . $dt_li->card->last4;
                $newData['card_expire'] = $dt_li->card->exp_year . '-' . $dt_li->card->exp_month;
                $newData['cvv'] = '';
                $newData['stripe_payment_key'] = $dt_li->id;
                $newData['stripe_client_secret_key'] = $setup_intent_client_secret;
                $newData['stripe_setup_intent'] = $setup_intent;
                $newData['is_save'] = 1;
                $newPayCard = $this->PaymentCardDetails->newEntity();
                $newPayCard = $this->PaymentCardDetails->patchEntity($newPayCard, $newData);
                $this->PaymentCardDetails->save($newPayCard);
                $this->Flash->success(__('Card added '));
                if (!empty($_GET['cardx'])) {
                    return $this->redirect(HTTP_ROOT . 'api/card_add_success/');
                }
                if ($token_key == "StylefitPayment") {
                    return $this->redirect(HTTP_ROOT . 'api/StylefitPayment/' . $user_id);
                } else if ($token_key == "customer-order-review") {
                    return $this->redirect(HTTP_ROOT . 'customer-order-review');
                } else if ($token_key == "account") {
                    return $this->redirect(HTTP_ROOT . 'account');
                } else {
                    return $this->redirect(HTTP_ROOT . 'api/StylefitPayment/' . $user_id);
                }
            } else {
                $this->Flash->error(__('Card not added '));
                if ($token_key == "payment") {
                    return $this->redirect(HTTP_ROOT . 'welcome/payment');
                } else if ($token_key == "customer-order-review") {
                    return $this->redirect(HTTP_ROOT . 'customer-order-review');
                } else if ($token_key == "account") {
                    return $this->redirect(HTTP_ROOT . 'account');
                } else {
                    return $this->redirect(HTTP_ROOT . 'api/StylefitPayment/' . $user_id);
                }
            }
        } else {
            $this->Flash->error(__('Add address before add card '));
            return $this->redirect(HTTP_ROOT . 'api/StylefitPayment/' . $user_id);
        }
    }

    public function saveAddress()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $data['id'] = !empty($postData['id']) ? $postData['id'] : '';
            $data['user_id'] = $postData['user_id'];
            $data['kid_id'] = 0;
            $data['full_name'] = $postData['full_name'];
            $data['address'] = $postData['address'];
            $data['address_line_2'] = $postData['address_line_2'];
            $data['city'] = $postData['city'];
            $data['state'] = $postData['state'];
            $data['zipcode'] = $postData['zipcode'];
            $data['country'] = $postData['country'];
            $data['country_code'] = $postData['country_code'];
            $data['phone'] = $postData['phone'];
            $data['default_set'] = 1;
            $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $postData['user_id'], 'kid_id' => 0]);
            //$this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $editid]);
            $shippingAddress = $this->ShippingAddress->newEntity();
            $shippingAddress = $this->ShippingAddress->patchEntity($shippingAddress, $data);
            $shippingAddress = $this->ShippingAddress->save($shippingAddress);
            echo json_encode(['status' => 'success']);
            exit;
        }
        echo json_encode(['status' => 'error']);
        exit;
    }

    public function paymentProcess()
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->session()->write('PYMID', '');
        $data = $this->request->data;
        $chk_usr_data = $this->Users->find('all')->where(['id' => $data['user_id']])->first();
        $chk_usr_dtl_data = $this->UserDetails->find('all')->where(['user_id' => $data['user_id']])->first();
        if (!empty($data['kid_id'])) {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
        } else {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
        }
        $newEntity = $this->PaymentGetways->newEntity();
        if (!empty($data['kid_id'])) {
            $profile_type = 3;
            // $data['kid_id'] = $this->request->session()->read('KID_ID');
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'PaymentGetways.kid_id' => $data['kid_id'], 'user_id' => $data['user_id']])->count();
        } elseif ($chk_usr_dtl_data->gender == 1) {
            $data['kid_id'] = 0;
            $profile_type = 1;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $data['user_id']])->count();
        } elseif ($chk_usr_dtl_data->gender == 2) {
            $data['kid_id'] = 0;
            $profile_type = 2;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $data['user_id']])->count();
        }
        $this->PaymentCardDetails->updateAll(['use_card' => 0], ['user_id' => $data['user_id']]);
        $this->PaymentCardDetails->updateAll(['use_card' => 1], ['id' => $data['p_id']]);
        $cardDetails = $this->PaymentCardDetails->find('all')->where(['id' => $data['p_id']])->first();
        $used_card_id = $data['p_id'];
        $data['user_id'] = $data['user_id'];
        $data['kid_id'] = $data['kid_id'];
        $data['price'] = $data['payableAmount'];
        $data['profile_type'] = $profile_type;
        $data['payment_type'] = 1;
        $data['status'] = 0;
        $data['payment_card_details_id'] = $used_card_id;
        $data['created_dt'] = date('Y-m-d H:i:s');
        $data['count'] = $paymentCount + 1;
        $data['shipping_address_id'] = $this->ShippingAddress->find('all')->where(['default_set' => 1, 'user_id' => $data['user_id']])->first()->id;
        $newEntity = $this->PaymentGetways->patchEntity($newEntity, $data);
        $PaymentIdlast = $this->PaymentGetways->save($newEntity);
        $paymentId = $PaymentIdlast->id;
        $this->request->session()->write('PYMID', $paymentId);
        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $data['user_id']])->first();
        $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $data['user_id']])->first();
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $data['user_id'], 'is_billing' => 1])->first();
        if(empty($billingAddress)){
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $data['user_id']])->first();
        }
        $arr_user_info = [
            'user_id' => $chk_usr_data->id,
            'stripe_customer_key' => $chk_usr_data->stripe_customer_key,
            'stripe_payment_method' => $cardDetails->stripe_payment_key,
            'product' => $billingAddress->full_name . ' Style Fit ',
            'first_name' => $billingAddress->full_name,
            'last_name' => $billingAddress->full_name,
            'address' => $billingAddress->address,
            'city' => $billingAddress->city,
            'state' => $billingAddress->state,
            'zip' => $billingAddress->zipcode,
            'country' => $billingAddress->country,
            'email' => $chk_usr_data->email,
            'amount' => ($chk_usr_data->is_influencer == 1) ? 1 : $main_style_fee, //$data['payableAmount'],
            'invice' => $paymentId,
            'refId' => $paymentId,
            'companyName' => 'Drapefit',
        ];
        $cardDetails = $this->PaymentCardDetails->find('all')->where(['id' => $used_card_id])->first();
        $message = $this->stripePay($arr_user_info);
        if (@$message['error'] == 'error') {
            if ($message['error_code'] == 'authentication_required') {
                $this->Flash->error(__('Please authenticate your payment.'));
                $message['redirect_url'] = HTTP_ROOT . 'users/reAuthPayment/apiStylefitPayment/' . $paymentId;
            }
            echo json_encode($message);
        } else if (@$message['status'] == '1') {
            //check assgine the employ to assgine to stylest
            $getpaymentFirstTime = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
            $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Onboard_in_Progress')], ['id' => $paymentId]);
            if (!empty($data['kid_id'])) {
                $delivery_id = $this->DeliverDate->find('all')->where(['kid_id' => $data['kid_id']])->order(['id' => 'DESC'])->first();
            } else {
                $delivery_id = $this->DeliverDate->find('all')->where(['user_id' => $data['user_id']])->order(['id' => 'DESC'])->first();
            }
            
            $this->PaymentGetways->updateAll(['delivery_id' => $delivery_id->id], ['id' => $paymentId]);
            if ($getpaymentFirstTime->payment_type == 1) {
                if (!empty($data['kid_id'])) {
                    @$kidId = $data['kid_id'];
                    $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => @$kidId]);
                    $kid_id = $data['kid_id'];
                } else {
                    $kid_id = 0;
                    $this->Users->updateAll(['is_redirect' => 2], ['id' => $data['user_id']]);
                }
            }
            if (@$getpaymentFirstTime->kid_id != '') {
                $getDetailsEmp = $this->CustomerStylist->find('all')->where(['user_id' => $data['user_id'], 'kid_id' => $getpaymentFirstTime->kid_id])->first();
            } else {
                $getDetailsEmp = $this->CustomerStylist->find('all')->where(['user_id' => $data['user_id']])->first();
            }
            if (@$getDetailsEmp->employee_id != '') {
                $getpaymentFirstTime = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
                //first time payment has users
                if (@$getpaymentFirstTime->count == 1) {
                    //$this->PaymentGetways->updateAll(['profile_type' => 3, 'emp_id' => $data['emp_id'], 'work_status' => '1'], ['id' => $data['id']]);
                    $this->PaymentGetways->updateAll(['emp_id' => $getDetailsEmp->employee_id, 'work_status' => '1'], ['id' => $paymentId]);
                }
            }
            if ($getpaymentFirstTime->count >= 2) {
                if (@$getpaymentFirstTime->kid_id != '') {
                    $kidID = $getpaymentFirstTime->kid_id;
                    $getCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'user_id' => $getpaymentFirstTime->user_id, 'kid_id' => $kidID])->order(['count' => 'DESC'])->order(['count' => 'DESC'])->first();
                    $getDetailsEmp2 = $this->PaymentGetways->find('all')->where(['status' => 1, 'user_id' => $getpaymentFirstTime->user_id, 'kid_id' => $kidID, 'count <=' => $getpaymentFirstTime->count - 1])->order(['count' => 'DESC'])->first();
                    $this->PaymentGetways->updateAll(['emp_id' => $getDetailsEmp2->emp_id, 'inv_id' => $getDetailsEmp2->inv_id, 'qa_id' => $getDetailsEmp2->qa_id, 'support_id' => $getDetailsEmp2->support_id, 'work_status' => '1'], ['id' => $paymentId]);
                } else {
                    $getCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'user_id' => $getpaymentFirstTime->user_id, 'kid_id' => 0])->order(['count' => 'DESC'])->order(['count' => 'DESC'])->first();
                    $getDetailsEmp2 = $this->PaymentGetways->find('all')->where(['status' => 1, 'user_id' => $getpaymentFirstTime->user_id, 'kid_id' => 0, 'count <= ' => $getpaymentFirstTime->count - 1])->order(['count' => 'DESC'])->first();
                    $this->PaymentGetways->updateAll(['emp_id' => $getDetailsEmp2->emp_id, 'inv_id' => $getDetailsEmp2->inv_id, 'qa_id' => $getDetailsEmp2->qa_id, 'support_id' => $getDetailsEmp2->support_id, 'work_status' => '1'], ['id' => $paymentId]);
                }
            }

            $this->loadModel('SmsSettings');
            $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'FITBOX_SCHEDULED_SMS'])->first();
            if (!empty($get_sms_temp)) {
                $count_data = $this->Custom->ToOrdinal(empty($getCount) ? 1 : $getCount->count);
                $txt_msg = str_replace("[FIT_COUNT]", $count_data, $get_sms_temp->value);
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
                    CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'FITBOX_SCHEDULED_SMS'),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
            }

            $getId = $data['user_id'];
            $message['redirect_url'] = null;
            echo json_encode($message);
            $this->paymentMailSending($message);
            if (!empty($this->request->session()->read('KID_ID'))) {
                $this->request->session()->write('KID_ID', '');
            }
        } else {
            $message['error'] = 'error';
            $message['redirect_url'] = null;
            echo json_encode($message);
        }
        exit;
    }

    public function stripePay($arr_data = [])
    {
        extract($arr_data);
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        //        $stripeToken = $stripeToken;
        $custName = $first_name . ' ' . $last_name;
        $custEmail = $email;
        $chk_usr_data = $this->Users->find('all')->where(['id' => $user_id])->first();
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
            //             print_r($paymenyResponse);
            //            exit;          
            $payment_intent_id = $paymenyResponse['id'];
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
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
                if ($lastInsertId && $paymentStatus == 'succeeded') {
                    $this->PaymentGetways->updateAll(['receipt_url' => $receipt_url, 'charge_id' => $charged_id], ['id' => $invice]);
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

    public function stylefitPaymentReAuth($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $message['Success'] = "";
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();
        
        $stripe = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );
        \Stripe\Stripe::setApiKey($stripe['secret_key']);
        $payment_dil = $this->PaymentGetways->find('all')->where(['id' => $id])->first();
        $payment_intent_id = $payment_dil->payment_intent_id;
        $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        $tx_id = $payment_intent['charges']['data'][0]['balance_transaction'];
        $message['Success'] = " Successfully created transaction with Transaction ID: " . $tx_id . "\n";
        $message['TransId'] = $tx_id;
        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id' => $payment_intent['charges']['data'][0]['balance_transaction'], 'charge_id' => $payment_intent['charges']['data'][0]['id'], 'receipt_url' => $payment_intent['charges']['data'][0]['receipt_url']], ['id' => $id]);
        $this->request->session()->write('PYMID', '');
        $chk_usr_data = $this->Users->find('all')->where(['id' => $payment_dil->user_id])->first();
        if (!empty($payment_dil->kid_id)) {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
        } else {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
        }
        if (!empty($payment_dil->kid_id)) {
            $profile_type = 3;
            $data['kid_id'] = $payment_dil->kid_id;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1,  'PaymentGetways.kid_id' => $payment_dil->kid_id, 'user_id' => $payment_dil->user_id])->count();
        } else {
            $data['kid_id'] = 0;
            $profile_type = 2;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1,  'user_id' => $payment_dil->user_id])->count();
        }
        $paymentId = $id;
        $this->request->session()->write('PYMID', $paymentId);
        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $payment_dil->user_id])->first();
        $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $payment_dil->user_id])->first();
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $payment_dil->user_id, 'is_billing' => 1])->first();
        //check assgine the employ to assgine to stylest
        $getpaymentFirstTime = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
        if (!empty($payment_dil->kid_id)) {
            $delivery_id = $this->DeliverDate->find('all')->where(['kid_id' => $payment_dil->kid_id])->order(['id' => 'DESC'])->first();
        } else {
            $delivery_id = $this->DeliverDate->find('all')->where(['user_id' => $payment_dil->user_id])->order(['id' => 'DESC'])->first();
        }
        $this->PaymentGetways->updateAll(['delivery_id' => $delivery_id->id], ['id' => $paymentId]);
        if ($getpaymentFirstTime->payment_type == 1) {
            if (!empty($payment_dil->kid_id)) {
                @$kidId = $payment_dil->kid_id;
                $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => @$kidId]);
                $kid_id = $payment_dil->kid_id;
            } else {
                $kid_id = 0;
                $this->Users->updateAll(['is_redirect' => 2], ['id' => $payment_dil->user_id]);
            }
        }
        if (@$getpaymentFirstTime->kid_id != '') {
            $getDetailsEmp = $this->CustomerStylist->find('all')->where(['user_id' => $getpaymentFirstTime->user_id, 'kid_id' => $getpaymentFirstTime->kid_id])->first();
        } else {
            $getDetailsEmp = $this->CustomerStylist->find('all')->where(['user_id' => $payment_dil->user_id])->first();
        }
        if (@$getDetailsEmp->employee_id != '') {
            $getpaymentFirstTime = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
            //first time payment has users
            if (@$getpaymentFirstTime->count == 1) {
                //$this->PaymentGetways->updateAll(['profile_type' => 3, 'emp_id' => $data['emp_id'], 'work_status' => '1'], ['id' => $data['id']]);
                $this->PaymentGetways->updateAll(['emp_id' => $getDetailsEmp->employee_id, 'work_status' => '1'], ['id' => $paymentId]);
            }
        }
        if ($getpaymentFirstTime->count >= 2) {
            if (@$getpaymentFirstTime->kid_id != '') {
                $kidID = $getpaymentFirstTime->kid_id;
                $getCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'user_id' => $getpaymentFirstTime->user_id, 'kid_id' => $kidID])->order(['count' => 'DESC'])->order(['count' => 'DESC'])->first();
                $getDetailsEmp2 = $this->PaymentGetways->find('all')->where(['status' => 1, 'user_id' => $getpaymentFirstTime->user_id, 'kid_id' => $kidID, 'count <=' => $getCount->count - 1])->order(['count' => 'DESC'])->first();
                $this->PaymentGetways->updateAll(['emp_id' => $getDetailsEmp2->emp_id, 'inv_id' => $getDetailsEmp2->inv_id, 'qa_id' => $getDetailsEmp2->qa_id, 'support_id' => $getDetailsEmp2->support_id, 'work_status' => '1'], ['id' => $paymentId]);
            } else {
                $getCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'user_id' => $getpaymentFirstTime->user_id, 'kid_id' => 0])->order(['count' => 'DESC'])->order(['count' => 'DESC'])->first();
                $getDetailsEmp2 = $this->PaymentGetways->find('all')->where(['status' => 1, 'user_id' => $getpaymentFirstTime->user_id, 'kid_id' => 0, 'count <= ' => $getpaymentFirstTime->count - 1])->order(['count' => 'DESC'])->first();
                $this->PaymentGetways->updateAll(['emp_id' => $getDetailsEmp2->emp_id, 'inv_id' => $getDetailsEmp2->inv_id, 'qa_id' => $getDetailsEmp2->qa_id, 'support_id' => $getDetailsEmp2->support_id, 'work_status' => '1'], ['id' => $paymentId]);
            }
        }
        $getId = $payment_dil->user_id;
        $updateId = $id;
        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId])->first();
        $checkUser = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId, 'PaymentGetways.payment_type' => 1])->first();
        $card_details = $this->PaymentCardDetails->find('all')->where(['id' => $checkUser->payment_card_details_id])->first();
        $bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $payment_dil->user_id, 'is_billing' => 1])->first();
        $full_address = $bil_address->address . ((!empty($bil_address->address_line_2)) ? '<br>' . $bil_address->address_line_2 : '') . '<br>' . $bil_address->city . ', ' . $bil_address->state . '<br>' . $bil_address->country . ' ' . $bil_address->zipcode;
        $usr_name = $bil_address->full_name;
        if ($paymentDetails->profile_type == 1) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
        } elseif ($paymentDetails->profile_type == 2) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
        } elseif ($paymentDetails->profile_type == 3) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE_KID'])->first();
        }
        $paymentCount = $this->Custom->ToOrdinal($paymentDetails->count);

        $this->loadModel('SmsSettings');
        $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'FITBOX_SCHEDULED_SMS'])->first();
        if (!empty($get_sms_temp)) {
            $count_data = $this->Custom->ToOrdinal(empty($$paymentDetails->count) ? 1 : $paymentDetails->count);
            $txt_msg = str_replace("[FIT_COUNT]", $count_data, $get_sms_temp->value);
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
                CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'FITBOX_SCHEDULED_SMS'),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        }
        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUCCESS_PAYMENT'])->first();
        $stylefee = $this->Settings->find('all')->where(['Settings.name' => 'style_fee'])->first();
        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $feeprice = $stylefee->value;
        $to = $chk_usr_data->email;
        $name = $chk_usr_data->name;
        $from = $fromMail->value;
        $subject = $emailMessage->display . ' #DFPYMID' . $updateId;
        $sitename = SITE_NAME;
        $usermessage = $message['Success'];
        $sumitted_date = date_format($checkUser->created_dt, 'm/d/Y');
        $last_4_digit = substr($card_details->card_number, -4);
        $paid_amount = "$ " . number_format($checkUser->price, 2);
        $email_message = $this->Custom->paymentEmail($emailMessage->value, $name, $usermessage, $sitename, $message['TransId'], $paid_amount, $sumitted_date, $card_details->card_type, $last_4_digit, $usr_name, $full_address, $feeprice);
        $this->Custom->sendEmail($to, $from, $subject, $email_message);
        $subjectProfile = $emailMessageProfile->display;
        $email_message_profile = $this->Custom->paymentEmailCount($emailMessageProfile->value, $name, $usermessage, $sitename, $paymentCount);
        $this->Custom->sendEmail($to, $from, $subjectProfile, $email_message_profile);
        //message to Admin support
        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
        $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);
        $this->Custom->sendEmail($toSupport, $from, $subjectProfile, $email_message_profile);
        $this->Flash->success($message['Success']);
        return $this->redirect(HTTP_ROOT . 'api/payment-success');
    }

    public function paymentMailSending($message = null)
    {
        $updateId = $this->request->session()->read('PYMID');
        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId']], ['id' => $updateId]);
        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId])->first();
        $checkUser = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId, 'PaymentGetways.payment_type' => 1])->first();
        $card_details = $this->PaymentCardDetails->find('all')->where(['id' => $checkUser->payment_card_details_id])->first();
        $bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $checkUser->user_id, 'default_set' => 1])->first();
        $full_address = $bil_address->address . ((!empty($bil_address->address_line_2)) ? '<br>' . $bil_address->address_line_2 : '') . '<br>' . $bil_address->city . ', ' . $bil_address->state . '<br>' . $bil_address->country . ' ' . $bil_address->zipcode;
        $usr_name = $bil_address->full_name;
        if ($paymentDetails->profile_type == 1) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
        } elseif ($paymentDetails->profile_type == 2) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
        } elseif ($paymentDetails->profile_type == 3) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE_KID'])->first();
        }
        $user_data_arr = $this->Users->find('all')->where(['id' => $checkUser->user_id])->first();
        $paymentCount = $this->Custom->ToOrdinal($paymentDetails->count);
        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUCCESS_PAYMENT'])->first();
        $stylefee = $this->Settings->find('all')->where(['Settings.name' => 'style_fee'])->first();
        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $feeprice = $stylefee->value;
        $to = $user_data_arr->email;
        $name = $user_data_arr->name;
        $from = $fromMail->value;
        $subject = $emailMessage->display . ' #DFPYMID' . $updateId;
        $sitename = SITE_NAME;
        $usermessage = $message['Success'];
        $sumitted_date = date_format($checkUser->created_dt, 'm/d/Y');
        $last_4_digit = substr($card_details->card_number, -4);
        $paid_amount = "$ " . number_format($checkUser->price, 2);
        $email_message = $this->Custom->paymentEmail($emailMessage->value, $name, $usermessage, $sitename, $message['TransId'], $paid_amount, $sumitted_date, $card_details->card_type, $last_4_digit, $usr_name, $full_address, $feeprice);
        $this->Custom->sendEmail($to, $from, $subject, $email_message . $updateId . json_encode($message));
        $subjectProfile = $emailMessageProfile->display;
        $email_message_profile = $this->Custom->paymentEmailCount($emailMessageProfile->value, $name, $usermessage, $sitename, $paymentCount);
        $this->Custom->sendEmail($to, $from, $subjectProfile, $email_message_profile);
        //message to Admin support
        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
        $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);
        $this->Custom->sendEmail($toSupport, $from, $subjectProfile, $email_message_profile);
        exit;
    }

    public function paymentSuccess()
    {
        $this->render('payment_success');
    }

    public function cardAddedSuccess()
    {
        exit;
    }

    public function stylepayment()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $get_last_stylefit_payment_id = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.user_id' => $postData['user_id'], 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id'])->order(['PaymentGetways.id' => 'DESC'])->first();
            if (!empty($get_last_stylefit_payment_id)) {
                echo json_encode(['status' => 'success']);
                exit;
            }
        }
        echo json_encode(['status' => 'error']);
        exit;
    }

    public function checkChildren()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $userId = $postData['user_id'];
            $checkchield = $this->KidsDetails->find('all')->where(['user_id' => $userId])->order(['id' => 'asc']);
            $this->Users->hasOne('user_dtl', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $users = $this->Users->find('all')->where(['Users.id' => $userId])->contain(['user_dtl'])->first();
            $dataall['parentid'] = $users['id'];
            $dataall['parentname'] = $users['name'];
            $kid_array = [];
            foreach ($checkchield as $key => $kid_li) {
                if (!empty($kid_li->kids_first_name)) {
                    $name = $kid_li->kids_first_name;
                } else {
                    if ($kid_li->kid_count == '1') {
                        $name = 'First Child';
                    }
                    if ($kid_li->kid_count == '2') {
                        $name = 'Second Child';
                    }
                    if ($kid_li->kid_count == '3') {
                        $name = 'Third Child';
                    }
                    if ($kid_li->kid_count == '4') {
                        $name = 'Four Child';
                    }
                }
                $kid_array[$key]['kid_name'] = $name;
                $kid_array[$key]['kid_count'] = $kid_li->kid_count;
                $kid_array[$key]['kid_id'] = $kid_li->id;
                $kid_array[$key]['is_redirect'] = $kid_li->is_redirect;
                $kid_array[$key]['kids_clothing_gender'] = $kid_li->kids_clothing_gender;
                $kid_array[$key]['is_progressbar'] = $kid_li->is_progressbar;
            }
            echo json_encode(['status' => 'success', 'gender' => $users->user_dtl->gender, 'parentid' => $users['id'], 'parentname' => $users['name'], 'kid_dtls' => $kid_array]);
        }
        // echo json_encode(['status' => 'error']);
        exit;
    }

    public function orderDetailsKids()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $userId = $postData['user_id'];
            $kidId = $postData['kid_id'];
            $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            if (!empty($kidId)) {
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $kidId])->first();
                $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $kidId])->order(['created_dt' => 'DESC']);
                $productDetails = [];
                foreach ($OrderDetails as $product) {
                    $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
                }
                $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $kidId])->count();
            } else {
                $getUsersDetails = $this->Users->find('all')->where(['id' => $userId])->first();
                $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'work_status' => 2, 'payment_type' => 1, 'kid_id' => 0, 'user_id' => $userId])->order(['created_dt' => 'DESC']);
                $productDetails = [];
                foreach ($OrderDetails as $product) {
                    $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
                }
                $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'kid_id' => 0, 'work_status' => 2, 'user_id' => $userId])->count();
            }
            $order_data = [];
            if ($OrderDetailsCount >= 1) {
                $fitCount = '';
                foreach ($OrderDetails as $order_ky => $orders) {
                    if ($productDetails[$orders->id] > 0) {
                        $fitCount = $this->Custom->ToOrdinal($orders->count);
                        $order_data[$order_ky]['fit_count'] = $fitCount;
                        $order_data[$order_ky]['payment_id'] = $orders->id;
                        $order_data[$order_ky]['date'] = date('d-m-y', strtotime($orders->created_dt));
                        // foreach ($orders->products as $prd_ky => $products) {
                        //     if ($products->keep_status == 3) {
                        //         $order_data[$order_ky]['product'][$prd_ky]['product_name'] = $products->product_name_one . ',' . $products->product_name_two;
                        //         $order_data[$order_ky]['product'][$prd_ky]['site_url'] = HTTP_ROOT;
                        //         $order_data[$order_ky]['product'][$prd_ky]['product_image'] = strstr($products->product_image, PRODUCT_IMAGES) ? $products->product_image : PRODUCT_IMAGES . $products->product_image;
                        //         $order_data[$order_ky]['product'][$prd_ky]['price'] = '$' . number_format($products->sell_price, 2);
                        //     }
                        // }
                    }
                }
            }
            echo json_encode($order_data);
        }
        // echo json_encode(['status' => 'error']);
        exit;
    }

    public function orderDetails()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $userId = $postData['user_id'];
            $kidId = $postData['kid_id'];
            $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            if (!empty($kidId)) {
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $kidId])->first();
                $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $kidId]);
                $productDetails = [];
                foreach ($OrderDetails as $product) {
                    $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
                }
                $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $kidId])->count();
            } else {
                $getUsersDetails = $this->Users->find('all')->where(['id' => $userId])->first();
                $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'work_status' => 2, 'payment_type' => 1, 'kid_id' => 0, 'user_id' => $userId]);
                $productDetails = [];
                foreach ($OrderDetails as $product) {
                    $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
                }
                $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'kid_id' => 0, 'work_status' => 2, 'user_id' => $userId])->count();
            }
            $order_data = [];
            if ($OrderDetailsCount >= 1) {
                $fitCount = '';
                foreach ($OrderDetails as $order_ky => $orders) {
                    if ($productDetails[$orders->id] > 0) {
                        $fitCount = $this->Custom->ToOrdinal($orders->count);
                        $order_data[$order_ky]['fit_count'] = $fitCount;
                        $order_data[$order_ky]['payment_id'] = $orders->id;
                        $order_data[$order_ky]['date'] = date('d-m-y', strtotime($orders->created_dt));
                        // foreach ($orders->products as $prd_ky => $products) {
                        //     if ($products->keep_status == 3) {
                        //         $order_data[$order_ky]['product'][$prd_ky]['product_name'] = $products->product_name_one . ',' . $products->product_name_two;
                        //         $order_data[$order_ky]['product'][$prd_ky]['site_url'] = HTTP_ROOT;
                        //         $order_data[$order_ky]['product'][$prd_ky]['product_image'] = strstr($products->product_image, PRODUCT_IMAGES) ? $products->product_image : PRODUCT_IMAGES . $products->product_image;
                        //         $order_data[$order_ky]['product'][$prd_ky]['price'] = '$' . number_format($products->sell_price, 2);
                        //     }
                        // }
                    }
                }
            }
            echo json_encode($order_data);
        }
        // echo json_encode(['status' => 'error']);
        exit;
    }

    public function fitProducts()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $payment_id = $postData['payment_id'];
            $OrderDetails = $this->Products->find('all')->where(['payment_id' => $payment_id])->order(['id' => 'asc']);
            $order_data = [];
            if ($OrderDetails->count() >= 1) {
                $cnt = 0;
                foreach ($OrderDetails as $prd_ky => $products) {
                    if ($products->keep_status == 3) {
                        $order_data[$cnt]['product_name'] = $products->product_name_one . ',' . $products->product_name_two;
                        $order_data[$cnt]['site_url'] = HTTP_ROOT;
                        $order_data[$cnt]['product_image'] = strstr($products->product_image, PRODUCT_IMAGES) ? $products->product_image : PRODUCT_IMAGES . $products->product_image;
                        $order_data[$cnt]['price'] = '$' . number_format($products->sell_price, 2);
                        $cnt++;
                    }
                }
            }
            echo json_encode($order_data);
        }
        // echo json_encode(['status' => 'error']);
        exit;
    }

    public function userDetails()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $user_id = $postData['user_id'];
            $kid_id = $postData['kid_id'];
            $emailPreferences = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $user_id, 'EmailPreferences.kid_id' => $kid_id])->first();
            $userdetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();
            $kid_is_redirect = $kid_progress = '';
            if (!empty($kid_id) && ($kid_id != 0)) {
                $kidddd = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
                $kid_is_redirect = $kidddd->is_redirect;
                $kid_progress = $kidddd->is_progressbar;

                $gen = empty($kidddd->kids_clothing_gender) ? 'kid' : $kidddd->kids_clothing_gender;
            } else {

                if (@$userdetails->user_detail->gender == 1) {
                    $gen = "men";
                }
                if (@$userdetails->user_detail->gender == 2) {
                    $gen = "women";
                }
            }
            $aduserlist = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $user_id, 'kid_id' => $kid_id])->first();
            
            if (!empty($aduserlist) && $aduserlist->try_new_items_with_scheduled_fixes == 1) {
                $subscription = 1;
            } else if(empty($aduserlist)){
                 $subscription = 2; //New user yet not subscribe
            }else{
                $subscription = 0;
            }

            $paymentNum = $this->PaymentGetways->find('all')->where(['PaymentGetways.kid_id' => $kid_id, 'PaymentGetways.user_id' => $user_id, 'PaymentGetways.mail_status' => 0, 'refound_status' => 0, 'PaymentGetways.payment_type' => 1, 'work_status IN' => [1, 0]])->order(['PaymentGetways.id' => 'DESC'])->first();
            $paymentCount = $paymentNum->count;
            if ($paymentCount == 1) {

                $status = "st";
            } elseif ($paymentCount == 2) {

                $status = "nd";
            } elseif ($paymentCount == 3) {

                $status = "rd";
            } else {

                $status = "th";
            }

            echo json_encode([
                'first_name' => !empty($userdetails->user_detail) ? $userdetails->user_detail->first_name : "",
                'last_name' => !empty($userdetails->user_detail) ? $userdetails->user_detail->last_name : "",
                'email' => $userdetails->email,
                'is_redirect' => (!empty($kid_id)) ? $kid_is_redirect : $userdetails->is_redirect,
                'kid_is_redirect' => $kid_is_redirect,
                'email_preferences' => $emailPreferences->preferences,
                'gender' => $gen,
                'is_progressbar' => (!empty($kid_id)) ? $kid_progress : $userdetails->user_detail->is_progressbar,
                'subscription' => $subscription,
                'fit_count' => ($paymentCount > 0) ? ($paymentCount . $status) : '0'
            ]);
        }
        // echo json_encode(['status' => 'error']);
        exit;
    }

    public function womenStyleInsp()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $user_id = $postData['user_id'];

            $checkIdCount = $this->CustomDesine->find('all')->where(['user_id' => $user_id])->first();
            $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $user_id])->first();
            $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $user_id])->first();
            $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $user_id])->first();
            $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $user_id])->first();
            $WomenJeansStyle = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $user_id])->first();
            $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $user_id]);
            $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();
            $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $user_id]);
            $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
            $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $user_id])->first();
            if ($userDetails->user_detail->gender == 1) {
                $mnstyle = $this->MenStyle->find('all')->where(['user_id' => $user_id])->first();
                $profile_note = $mnstyle->profile_note;
            } else {
                $profile_note = $Womenstyle->profile_note;
            }
            $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $user_id])->first();
            $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $user_id])->first();
            $primaryinfo = explode(",", @$Womeninfo->primary_objectives);
            $womens_brands_plus_low_tier1 = $this->WomenTypicalPurchaseCloth->find('all')->where(['WomenTypicalPurchaseCloth.user_id' => $user_id]);
            $womens_brands_plus_low_tier = $womens_brands_plus_low_tier1->extract('womens_brands_plus_low_tier')->toArray();
            $women_shoe_prefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $user_id])->first();
            $womenHeelHightPrefer = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $user_id])->first();
            $style_wardrobe1 = $this->WomenIncorporateWardrobe->find('all')->where(['WomenIncorporateWardrobe.user_id' => $user_id]);
            $style_wardrobe = $style_wardrobe1->extract('style_wardrobe')->toArray();
            $avoid_colors1 = $this->WomenColorAvoid->find('all')->where(['WomenColorAvoid.user_id' => $user_id]);
            $avoid_colors = $avoid_colors1->extract('avoid_colors')->toArray();
            $avoid_prints1 = $this->WomenPrintsAvoid->find('all')->where(['WomenPrintsAvoid.user_id' => $user_id]);
            $avoid_prints = $avoid_prints1->extract('avoid_prints')->toArray();
            $avoid_fabrics1 = $this->WomenFabricsAvoid->find('all')->where(['WomenFabricsAvoid.user_id' => $user_id]);
            $WemenStyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $user_id])->first();
            $avoid_fabrics = $avoid_fabrics1->extract('avoid_fabrics')->toArray();
            $style_sphere_selections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $user_id])->first();
            $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $user_id]);
            $menbrand = $MensBrands->extract('mens_brands')->toArray();
            $wemenDesigne = $this->CustomDesine->find('all')->where(['user_id' => $user_id])->first();
            echo json_encode([
                'mini_wo_dress_length' => (!empty($style_sphere_selections->wo_dress_length) && in_array('1', explode(',', $style_sphere_selections->wo_dress_length))) ? true : false,
                'sort_wo_dress_length' => (!empty($style_sphere_selections->wo_dress_length) && in_array('2', explode(',', $style_sphere_selections->wo_dress_length))) ? true : false,
                'mid_wo_dress_length' => (!empty($style_sphere_selections->wo_dress_length) && in_array('3', explode(',', $style_sphere_selections->wo_dress_length))) ? true : false,
                'maxi_wo_dress_length' => (!empty($style_sphere_selections->wo_dress_length) && in_array('4', explode(',', $style_sphere_selections->wo_dress_length))) ? true : false,
                'fitted' => (!empty($style_sphere_selections->wo_top_half) && in_array('1', explode(',', $style_sphere_selections->wo_top_half))) ? true : false,
                'straight' => (!empty($style_sphere_selections->wo_top_half) && in_array('2', explode(',', $style_sphere_selections->wo_top_half))) ? true : false,
                'loose' => (!empty($style_sphere_selections->wo_top_half) && in_array('3', explode(',', $style_sphere_selections->wo_top_half))) ? true : false,
                'ankle' => (!empty($style_sphere_selections->wo_pant_length) && in_array('1', explode(',', $style_sphere_selections->wo_pant_length))) ? true : false,
                'regular' => (!empty($style_sphere_selections->wo_pant_length) && in_array('2', explode(',', $style_sphere_selections->wo_pant_length))) ? true : false,
                'long' => (!empty($style_sphere_selections->wo_pant_length) && in_array('3', explode(',', $style_sphere_selections->wo_pant_length))) ? true : false,
                'lowrise' => (!empty($style_sphere_selections->wo_pant_rise) && in_array('1', explode(',', $style_sphere_selections->wo_pant_rise))) ? true : false,
                'midrise' => (!empty($style_sphere_selections->wo_pant_rise) && in_array('2', explode(',', $style_sphere_selections->wo_pant_rise))) ? true : false,
                'highrise' => (!empty($style_sphere_selections->wo_pant_rise) && in_array('3', explode(',', $style_sphere_selections->wo_pant_rise))) ? true : false,
                'skinny' => (!empty($style_sphere_selections->wo_pant_style) && in_array('1', explode(',', $style_sphere_selections->wo_pant_style))) ? true : false,
                'straight1' => (!empty($style_sphere_selections->wo_pant_style) && in_array('2', explode(',', $style_sphere_selections->wo_pant_style))) ? true : false,
                'bootcut' => (!empty($style_sphere_selections->wo_pant_style) && in_array('3', explode(',', $style_sphere_selections->wo_pant_style))) ? true : false,
                'relaxed' => (!empty($style_sphere_selections->wo_pant_style) && in_array('4', explode(',', $style_sphere_selections->wo_pant_style))) ? true : false,
                'wideleg' => (!empty($style_sphere_selections->wo_pant_style) && in_array('5', explode(',', $style_sphere_selections->wo_pant_style))) ? true : false,
                'jumpsuits' => (!empty($style_sphere_selections->wo_appare) && in_array('1', explode(',', $style_sphere_selections->wo_appare))) ? true : false,
                'tops' => (!empty($style_sphere_selections->wo_appare) && in_array('2', explode(',', $style_sphere_selections->wo_appare))) ? true : false,
                'bottoms' => (!empty($style_sphere_selections->wo_appare) && in_array('3', explode(',', $style_sphere_selections->wo_appare))) ? true : false,
                'denim' => (!empty($style_sphere_selections->wo_appare) && in_array('4', explode(',', $style_sphere_selections->wo_appare))) ? true : false,
                'sweaters' => (!empty($style_sphere_selections->wo_appare) && in_array('5', explode(',', $style_sphere_selections->wo_appare))) ? true : false,
                'jackets' => (!empty($style_sphere_selections->wo_appare) && in_array('6', explode(',', $style_sphere_selections->wo_appare))) ? true : false,
                'accessories' => (!empty($style_sphere_selections->wo_appare) && in_array('7', explode(',', $style_sphere_selections->wo_appare))) ? true : false,
                'skirts' => (!empty($style_sphere_selections->wo_bottom_style) && in_array('1', explode(',', $style_sphere_selections->wo_bottom_style))) ? true : false,
                'striped_shorts' => (!empty($style_sphere_selections->wo_bottom_style) && in_array('2', explode(',', $style_sphere_selections->wo_bottom_style))) ? true : false,
                'capri_jeans' => (!empty($style_sphere_selections->wo_bottom_style) && in_array('3', explode(',', $style_sphere_selections->wo_bottom_style))) ? true : false,
                'cargo_pant' => (!empty($style_sphere_selections->wo_bottom_style) && in_array('4', explode(',', $style_sphere_selections->wo_bottom_style))) ? true : false,
                'checked_pant' => (!empty($style_sphere_selections->wo_bottom_style) && in_array('5', explode(',', $style_sphere_selections->wo_bottom_style))) ? true : false,
                'palazzo' => (!empty($style_sphere_selections->wo_bottom_style) && in_array('6', explode(',', $style_sphere_selections->wo_bottom_style))) ? true : false,
                'denim_shorts' => (!empty($style_sphere_selections->wo_bottom_style) && in_array('7', explode(',', $style_sphere_selections->wo_bottom_style))) ? true : false,
                'Palazzo' => false,
                'sleevelss' => (!empty($style_sphere_selections->wo_top_style) && in_array('1', explode(',', $style_sphere_selections->wo_top_style))) ? true : false,
                'shorts_sleeve' => (!empty($style_sphere_selections->wo_top_style) && in_array('2', explode(',', $style_sphere_selections->wo_top_style))) ? true : false,
                'long_sleeve' => (!empty($style_sphere_selections->wo_top_style) && in_array('3', explode(',', $style_sphere_selections->wo_top_style))) ? true : false,
                'lace' => (!empty($style_sphere_selections->style_sphere_selections_v10) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v10))) ? true : false,
                'Animal' => (!empty($style_sphere_selections->style_sphere_selections_v10) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v10))) ? true : false,
                'Tribal' => (!empty($style_sphere_selections->style_sphere_selections_v10) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v10))) ? true : false,
                'Polka' => (!empty($style_sphere_selections->style_sphere_selections_v10) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v10))) ? true : false,
                'Stripes' => (!empty($style_sphere_selections->style_sphere_selections_v10) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v10))) ? true : false,
                'Floral' => (!empty($style_sphere_selections->style_sphere_selections_v10) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v10))) ? true : false,
                //----------6-12-22----------//
                'style_sphere_selections_v2_1' => (!empty($style_sphere_selections->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v2))) ? true : false,
                'style_sphere_selections_v2_2' => (!empty($style_sphere_selections->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v2))) ? true : false,
                'style_sphere_selections_v2_3' => (!empty($style_sphere_selections->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v2))) ? true : false,
                'style_sphere_selections_v2_4' => (!empty($style_sphere_selections->style_sphere_selections_v2) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v2))) ? true : false,
                'style_sphere_selections_v2_5' => (!empty($style_sphere_selections->style_sphere_selections_v2) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v2))) ? true : false,
                'style_sphere_selections_v3' => !empty($style_sphere_selections->style_sphere_selections_v3) ? $style_sphere_selections->style_sphere_selections_v3 : '',
                'style_sphere_selections_v4' => !empty($style_sphere_selections->style_sphere_selections_v4) ? $style_sphere_selections->style_sphere_selections_v4 : '',
                'style_sphere_selections_v5' => !empty($style_sphere_selections->style_sphere_selections_v5) ? $style_sphere_selections->style_sphere_selections_v5 : '',
                'style_sphere_selections_v6' => !empty($style_sphere_selections->style_sphere_selections_v6) ? $style_sphere_selections->style_sphere_selections_v6 : '',
                'style_sphere_selections_v7' => !empty($style_sphere_selections->style_sphere_selections_v7) ? $style_sphere_selections->style_sphere_selections_v7 : '',
                'style_sphere_selections_v8' => !empty($style_sphere_selections->style_sphere_selections_v8) ? $style_sphere_selections->style_sphere_selections_v8 : '',
                'style_sphere_selections_v9' => !empty($style_sphere_selections->style_sphere_selections_v9) ? $style_sphere_selections->style_sphere_selections_v9 : '',
                'style_sphere_selections_v10' => !empty($style_sphere_selections->style_sphere_selections_v10) ? $style_sphere_selections->style_sphere_selections_v10 : '',
                'style_sphere_selections_v11' => !empty($style_sphere_selections->style_sphere_selections_v11) ? $style_sphere_selections->style_sphere_selections_v11 : '',
                "Black" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('1', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Grey" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('2', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "White" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('3', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Cream" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('4', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Brown" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('5', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Purple" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('6', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Green" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('7', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Blue" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('8', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Orange" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('9', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Yellow" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('10', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Red" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('11', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                "Pink" => ((strlen(@$style_sphere_selections->color_prefer) > 2) && (in_array('12', json_decode(@$style_sphere_selections->color_prefer, true)))) ? true : false,
                'ct_Black' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Black', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Grey' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Grey', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Navy' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Navy', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Beige' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Beige', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_nWhite' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('nWhite', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Red' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Red', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Blue' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Blue', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Yellow' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Yellow', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Purple' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Purple', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_White' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('White', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Sand' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Sand', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_Pastels' => (!empty($style_sphere_selections->color_mostly_wear) && in_array('Pastels', explode(',', $style_sphere_selections->color_mostly_wear))) ? true : false,
                'ct_following_occasions1' => $style_sphere_selections->following_occasions,
                'ct_Sweaters' => (!empty($style_sphere_selections->missing_from_your_fIT) && in_array('Sweaters', explode(',', $style_sphere_selections->missing_from_your_fIT))) ? true : false,
                'ct_Blouses' => (!empty($style_sphere_selections->missing_from_your_fIT) && in_array('Blouses', explode(',', $style_sphere_selections->missing_from_your_fIT))) ? true : false,
                'ct_Jeans' => (!empty($style_sphere_selections->missing_from_your_fIT) && in_array('Jeans', explode(',', $style_sphere_selections->missing_from_your_fIT))) ? true : false,
                'ct_Pants' => (!empty($style_sphere_selections->missing_from_your_fIT) && in_array('Pants', explode(',', $style_sphere_selections->missing_from_your_fIT))) ? true : false,
                'ct_Skirts' => (!empty($style_sphere_selections->missing_from_your_fIT) && in_array('Skirts', explode(',', $style_sphere_selections->missing_from_your_fIT))) ? true : false,
                'ct_Dresses' => (!empty($style_sphere_selections->missing_from_your_fIT) && in_array('Dresses', explode(',', $style_sphere_selections->missing_from_your_fIT))) ? true : false,
                'jeans_Sweaters' => (!empty($WomenJeansStyle->jeans_style) && in_array('Sweaters', explode(',', $WomenJeansStyle->jeans_style))) ? true : false,
                'jeans_Blouses' => (!empty($WomenJeansStyle->jeans_style) && in_array('Blouses', explode(',', $WomenJeansStyle->jeans_style))) ? true : false,
                'jeans_Jeans' => (!empty($WomenJeansStyle->jeans_style) && in_array('Jeans', explode(',', $WomenJeansStyle->jeans_style))) ? true : false,
                'jeans_Pants' => (!empty($WomenJeansStyle->jeans_style) && in_array('Pants', explode(',', $WomenJeansStyle->jeans_style))) ? true : false,
                'jeans_Skirts' => (!empty($WomenJeansStyle->jeans_style) && in_array('Skirts', explode(',', $WomenJeansStyle->jeans_style))) ? true : false,
                'jeans_Dressess' => (!empty($WomenJeansStyle->jeans_style) && in_array('Dresses', explode(',', $WomenJeansStyle->jeans_style))) ? true : false,
                'distressed_denim_non' => $Womenstyle->distressed_denim_non,
                'distressed_denim_minimally' => $Womenstyle->distressed_denim_minimally,
                'distressed_denim_fairly' => $Womenstyle->distressed_denim_fairly,
                'distressed_denim_heavily' => $Womenstyle->distressed_denim_heavily,
                'pr_tops' => $Womenstyle->tops,
                'pr_bottoms' => $Womenstyle->bottoms,
                'pr_outwear' => $Womenstyle->outwear,
                'pr_jeans' => $Womenstyle->jeans,
                'pr_jewelry' => $Womenstyle->jewelry,
                'pr_accessproes' => $Womenstyle->accessproes,
                'pr_dress' => $Womenstyle->dress,
                'penguin' => (!empty($menbrand) && in_array('penguin', @$menbrand)) ? true : false,
                'nike' => (!empty($menbrand) && in_array('nike', @$menbrand)) ? true : false,
                'scotch' => (!empty($menbrand) && in_array('scotch', @$menbrand)) ? true : false,
                'gap' => (!empty($menbrand) && in_array('gap', @$menbrand)) ? true : false,
                'pata' => (!empty($menbrand) && in_array('pata', @$menbrand)) ? true : false,
                'tommy' => (!empty($menbrand) && in_array('tommy', @$menbrand)) ? true : false,
                'boss' => (!empty($menbrand) && in_array('boss', @$menbrand)) ? true : false,
                'vineyard' => (!empty($menbrand) && in_array('vineyard', @$menbrand)) ? true : false,
                'vans' => (!empty($menbrand) && in_array('vans', @$menbrand)) ? true : false,
                'hurley' => (!empty($menbrand) && in_array('hurley', @$menbrand)) ? true : false,
                'brooks' => (!empty($menbrand) && in_array('brooks', @$menbrand)) ? true : false,
                'zara' => (!empty($menbrand) && in_array('zara', @$menbrand)) ? true : false,
                'levis' => (!empty($menbrand) && in_array('levis', @$menbrand)) ? true : false,
                'armour' => (!empty($menbrand) && in_array('armour', @$menbrand)) ? true : false,
                'bonobos' => (!empty($menbrand) && in_array('bonobos', @$menbrand)) ? true : false,
                'landsend' => (!empty($menbrand) && in_array('landsend', @$menbrand)) ? true : false,
                'jcrew' => (!empty($menbrand) && in_array('jcrew', @$menbrand)) ? true : false,
                'oldnavy' => (!empty($menbrand) && in_array('oldnavy', @$menbrand)) ? true : false,
                'uniqlo' => (!empty($menbrand) && in_array('uniqlo', @$menbrand)) ? true : false,
                'northface' => (!empty($menbrand) && in_array('northface', @$menbrand)) ? true : false,
                'hm' => (!empty($menbrand) && in_array('hm', @$menbrand)) ? true : false,
                'eagle' => (!empty($menbrand) && in_array('eagle', @$menbrand)) ? true : false,
                'ragnbone' => (!empty($menbrand) && in_array('ragnbone', @$menbrand)) ? true : false,
                'bensharma' => (!empty($menbrand) && in_array('bensharma', @$menbrand)) ? true : false,
                'express' => (!empty($menbrand) && in_array('express', @$menbrand)) ? true : false,
                'polo' => (!empty($menbrand) && in_array('polo', @$menbrand)) ? true : false,
                'dillards' => (!empty($menbrand) && in_array('dillards', @$menbrand)) ? true : false,
                'mecy' => (!empty($menbrand) && in_array('mecy', @$menbrand)) ? true : false,
                'naimai' => (!empty($menbrand) && in_array('naimai', @$menbrand)) ? true : false,
                'urban' => (!empty($menbrand) && in_array('urban', @$menbrand)) ? true : false,
                'nordstrom' => (!empty($menbrand) && in_array('nordstrom', @$menbrand)) ? true : false,
                'missing_from_your_fIT1' => !empty($style_sphere_selections->missing_from_your_fIT) ? explode(',', $style_sphere_selections->missing_from_your_fIT) : [],
                'missing_from_your_fIT2' => !empty($style_sphere_selections->missing_from_your_fIT) ? explode(',', $style_sphere_selections->missing_from_your_fIT) : [],
                'style_sphere_selections_v3_3' => !empty($style_sphere_selections->style_sphere_selections_v3_3) ? explode(',', $style_sphere_selections->style_sphere_selections_v3_3) : [],
                'img1' => !empty($checkIdCount) ? HTTP_ROOT . USER_CUSTOM . $checkIdCount->img_1 : '',
                'img2' => !empty($checkIdCount) ? HTTP_ROOT . USER_CUSTOM . $checkIdCount->img_2 : '',
                'img3' => !empty($checkIdCount) ? HTTP_ROOT . USER_CUSTOM . $checkIdCount->img_3 : '',
                'profile_note' => $profile_note
            ]);
        }
        // echo json_encode(['status' => 'error']);
        exit;
    }

    public function ajaxMenFitGetdata()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $data['user_id'];
                $MenStats = $this->MenStats->find('all')->where(['user_id' => $userId])->first();
                $TypicallyWearMen = $this->TypicallyWearMen->find('all')->where(['user_id' => $userId])->first();
                $MenFit = $this->MenFit->find('all')->where(['user_id' => $userId])->first();
                $MenStyle = $this->MenStyle->find('all')->where(['MenStyle.user_id' => $userId])->first();
                $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $userId]);
                $menbrand = $MensBrands->extract('mens_brands')->toArray();
                $style_sphere_selections = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $userId])->first();
                $menSccessories = $this->MenAccessories->find('all')->where(['user_id' => $userId])->first();
                $menDesigne = $this->CustomDesine->find('all')->where(['user_id' => $userId])->first();
                echo json_encode([
                    'tell_in_feet' => $MenStats->tall_feet,
                    'tell_in_inch' => $MenStats->tell_inch,
                    'parent' => $MenStats->are_you_a_parent,
                    'bodytype' => $TypicallyWearMen->body_type,
                    'yourOccupation' => $MenStats->your_occupation,
                    'weight_lbs' => $MenStats->weight_lb,
                    'birthday' => $MenStats->birthday,
                    'linkdin_profile' => $MenStyle->linkdin_profile,
                    'instagram' => $MenStyle->instagram,
                    'twitter' => $MenStyle->twitter,
                    'pinterest' => $MenStyle->pinterest,
                    'duedate' => '',
                    'is_pregnant' => '',
                    'waist' => $TypicallyWearMen->waist,
                    'waist_size_run' => $TypicallyWearMen->waist_size_run,
                    'size' => $TypicallyWearMen->size,
                    'shirt' => $TypicallyWearMen->shirt,
                    'men_bottom' => $TypicallyWearMen->men_bottom,
                    'inseam' => $TypicallyWearMen->inseam,
                    'shoe' => $TypicallyWearMen->shoe,
                    'shoe_medium' => $TypicallyWearMen->shoe_medium,
                    'skin_tone' => $TypicallyWearMen->skin_tone,
                    /* --- Style insp--- */
                    'Casual' => (!empty($style_sphere_selections->style_sphere_selections_v2) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v2))) ? true : false,
                    'Business' => (!empty($style_sphere_selections->style_sphere_selections_v2) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v2))) ? true : false,
                    'Formal' => (!empty($style_sphere_selections->style_sphere_selections_v2) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v2))) ? true : false,
                    'Slim' => (!empty($style_sphere_selections->style_sphere_selections_v3) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v3))) ? true : false,
                    'Regular' => (!empty($style_sphere_selections->style_sphere_selections_v3) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v3))) ? true : false,
                    'Slim1' => (!empty($style_sphere_selections->style_sphere_selections_v4) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v4))) ? true : false,
                    'Regular1' => (!empty($style_sphere_selections->style_sphere_selections_v4) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v4))) ? true : false,
                    'Straight2' => in_array(3, explode(",", @$MenFit->jeans_to_fit)) ? true : false,
                    'Slim2' => in_array(2, explode(",", @$MenFit->jeans_to_fit)) ? true : false,
                    'Skinny2' => in_array(1, explode(",", @$MenFit->jeans_to_fit)) ? true : false,
                    'Relaxed2' => in_array(4, explode(",", @$MenFit->jeans_to_fit)) ? true : false,
                    'Tighter' => in_array(1, explode(",", @$MenFit->your_pants_to_fit)) ? true : false,
                    'More_relaxed' => in_array(2, explode(",", @$MenFit->your_pants_to_fit)) ? true : false,
                    'Upper_Thigh' => in_array(4, explode(",", @$MenFit->prefer_your_shorts)) ? true : false,
                    'Lower_Thigh' => in_array(3, explode(",", @$MenFit->prefer_your_shorts)) ? true : false,
                    'Above_Knee' => in_array(2, explode(",", @$MenFit->prefer_your_shorts)) ? true : false,
                    'The_Knee' => in_array(1, explode(",", @$MenFit->prefer_your_shorts)) ? true : false,
                    'style_sphere_selections1' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('1', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections2' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('2', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections3' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('3', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections4' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('4', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections5' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('5', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections6' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('6', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections7' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('7', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections8' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('8', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections9' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('9', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections10' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('10', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections11' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('11', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections12' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('12', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections13' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('13', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections14' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('14', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections15' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('15', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections16' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('16', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections17' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('17', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections18' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('18', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections19' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('19', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'style_sphere_selections20' => (isset($style_sphere_selections->style_sphere_selections_v5) && in_array('20', explode(',', $style_sphere_selections->style_sphere_selections_v5))) ? true : false,
                    'Black' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('1', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Grey' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('2', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'White' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('3', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Cream' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('4', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Brown' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('5', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Purple' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('6', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Green' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('7', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Blue' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('8', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Orange' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('9', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Yellow' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('10', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Red' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('11', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'Pink' => ((strlen(@$MenFit->prefer_color) > 2) && (in_array('12', json_decode(@$MenFit->prefer_color, true)))) ? true : false,
                    'take_note_of1' => !empty($MenFit->take_note_of) ? explode(",", $MenFit->take_note_of) : [],
                    'take_note_of2' => !empty($MenFit->take_note_of) ? explode(",", $MenFit->take_note_of) : [],
                    'take_note_of3' => !empty($MenFit->take_note_of) ? explode(",", $MenFit->take_note_of) : [],
                    'take_note_of4' => !empty($MenFit->take_note_of) ? explode(",", $MenFit->take_note_of) : [],
                    'take_note_of5' => !empty($MenFit->take_note_of) ? explode(",", $MenFit->take_note_of) : [],
                    'button_shirts' => $MenStyle->button_shirts,
                    'tees_polos' => $MenStyle->tees_polos,
                    'weaters_sweatshirts' => $MenStyle->weaters_sweatshirts,
                    'pants_denim' => $MenStyle->pants_denim,
                    'shorts' => $MenStyle->shorts,
                    'shoes' => $MenStyle->shoes,
                    'blazers_outerwear' => $MenStyle->blazers_outerwear,
                    'men_tites' => $menSccessories->men_tites,
                    'men_belts' => $menSccessories->men_belts,
                    'men_wallets_begs' => $menSccessories->men_wallets_begs,
                    'men_sunglass' => $menSccessories->men_sunglass,
                    'men_hets' => $menSccessories->men_hets,
                    'men_socks' => $menSccessories->men_socks,
                    'men_underwear' => $menSccessories->men_underwear,
                    'men_grooming' => $menSccessories->men_grooming,
                    'penguin' => (!empty($menbrand) && in_array('penguin', @$menbrand)) ? true : false,
                    'nike' => (!empty($menbrand) && in_array('nike', @$menbrand)) ? true : false,
                    'scotch' => (!empty($menbrand) && in_array('scotch', @$menbrand)) ? true : false,
                    'gap' => (!empty($menbrand) && in_array('gap', @$menbrand)) ? true : false,
                    'pata' => (!empty($menbrand) && in_array('pata', @$menbrand)) ? true : false,
                    'tommy' => (!empty($menbrand) && in_array('tommy', @$menbrand)) ? true : false,
                    'boss' => (!empty($menbrand) && in_array('boss', @$menbrand)) ? true : false,
                    'vineyard' => (!empty($menbrand) && in_array('vineyard', @$menbrand)) ? true : false,
                    'vans' => (!empty($menbrand) && in_array('vans', @$menbrand)) ? true : false,
                    'hurley' => (!empty($menbrand) && in_array('hurley', @$menbrand)) ? true : false,
                    'brooks' => (!empty($menbrand) && in_array('brooks', @$menbrand)) ? true : false,
                    'zara' => (!empty($menbrand) && in_array('zara', @$menbrand)) ? true : false,
                    'levis' => (!empty($menbrand) && in_array('levis', @$menbrand)) ? true : false,
                    'armour' => (!empty($menbrand) && in_array('armour', @$menbrand)) ? true : false,
                    'bonobos' => (!empty($menbrand) && in_array('bonobos', @$menbrand)) ? true : false,
                    'landsend' => (!empty($menbrand) && in_array('landsend', @$menbrand)) ? true : false,
                    'jcrew' => (!empty($menbrand) && in_array('jcrew', @$menbrand)) ? true : false,
                    'oldnavy' => (!empty($menbrand) && in_array('oldnavy', @$menbrand)) ? true : false,
                    'uniqlo' => (!empty($menbrand) && in_array('uniqlo', @$menbrand)) ? true : false,
                    'northface' => (!empty($menbrand) && in_array('northface', @$menbrand)) ? true : false,
                    'hm' => (!empty($menbrand) && in_array('hm', @$menbrand)) ? true : false,
                    'eagle' => (!empty($menbrand) && in_array('eagle', @$menbrand)) ? true : false,
                    'ragnbone' => (!empty($menbrand) && in_array('ragnbone', @$menbrand)) ? true : false,
                    'bensharma' => (!empty($menbrand) && in_array('bensharma', @$menbrand)) ? true : false,
                    'express' => (!empty($menbrand) && in_array('express', @$menbrand)) ? true : false,
                    'polo' => (!empty($menbrand) && in_array('polo', @$menbrand)) ? true : false,
                    'dillards' => (!empty($menbrand) && in_array('dillards', @$menbrand)) ? true : false,
                    'mecy' => (!empty($menbrand) && in_array('mecy', @$menbrand)) ? true : false,
                    'naimai' => (!empty($menbrand) && in_array('naimai', @$menbrand)) ? true : false,
                    'urban' => (!empty($menbrand) && in_array('urban', @$menbrand)) ? true : false,
                    'nordstrom' => (!empty($menbrand) && in_array('nordstrom', @$menbrand)) ? true : false,
                ]);
            }
        }
        exit;
    }

    public function ajaxKidsprofile()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $getData = $this->KidsDetails->find('all')->where(['id' => $data['id']])->first();
            if ($getData->is_progressbar < 25) {
                $data['is_progressbar'] = 25;
            }
            //            $userId = $data['kid_id'];
            $kid_per = !empty($data['child_personality']) ? json_decode($data['child_personality'], true) : [];
            $data['child_personality'] = !empty($kid_per) ? implode(',', $kid_per) : '';
            $newEntity = $this->KidsDetails->newEntity();
            $newEntity = $this->KidsDetails->PatchEntity($newEntity, $data);
            $newEntity = $this->KidsDetails->save($newEntity);
            // $this->WemenStyleSphereSelections->updateAll([ 'color_mostly_wear' => implode(",", json_decode($data['color_mostly_wear'],true)), 'missing_from_your_fIT' => implode(",", json_decode($data['missing_from_your_fIT'],true)),'following_occasions' => $data['following_occasions'] ], ['user_id' => $userId]);
            echo json_encode(['status' => 'success', 'gender' => $data['kids_clothing_gender'], 'kid_id' => $newEntity->id, 'url' => HTTP_ROOT . 'welcome/style/fit']);
        }
        exit;
    }

    public function ajaxKidFitGetdata()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $kid_id = $data['kid_id'];
            if ($kid_id) {
                $checkIdCount = $this->CustomDesine->find('all')->where(['kid_id' => $kid_id])->first();
                $kidDetails = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $kid_id])->first();
                $kidname = $kidDetails->kids_first_name;
                $KidsPersonalityValue1 = $this->KidsPersonality->find('all')->where(['KidsPersonality.kid_id' => $kid_id]);
                $KidsPersonalityValue = $KidsPersonalityValue1->extract('kids_personality_types')->toArray();
                $KidsPersonalityValue2 = $this->KidsPrimary->find('all')->where(['KidsPrimary.kid_id' => $kid_id]);
                $KidsPrimaryValue = $KidsPersonalityValue2->extract('kids_primary_objectives')->toArray();
                $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $kid_id])->first();
                $KidsSizeFit = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $kid_id])->first();
                $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $kid_id])->first();
                $kids_pricing_shoping = $this->KidsPricingShoping->find('all')->where(['KidsPricingShoping.kid_id' => $kid_id])->first();
                $kid_purchase_clothing = $this->KidPurchaseClothing->find('all')->where(['KidPurchaseClothing.kid_id' => $kid_id]);
                $kids_stores = $kid_purchase_clothing->extract('kids_stores')->toArray();
                $kids_avoid_fabric1 = $this->FabricsOrEmbellishments->find('all')->where(['FabricsOrEmbellishments.kid_id' => $kid_id]);
                $KID_AVOID_FABRIC = $kids_avoid_fabric1->extract('kids_avoid_fabric')->toArray();
                $KidStyles = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $kid_id])->first();
                $designe = $this->CustomDesine->find('all')->where(['kid_id' => $kid_id])->first();
                $menbrand = !empty($KidStyles->brands) ? explode(',', $KidStyles->brands) : [];
                echo json_encode([
                    'kid_gender' => $kidDetails->kids_clothing_gender,
                    'kids_first_name' => $kidname,
                    'weight_lbs' => $kidmenu->weight_lb,
                    'birthday' => $kidmenu->kids_birthdate,
                    'kids_clothing_gender' => $kidmenu->kids_clothing_gender,
                    'dropdownValueft' => $kidmenu->tall_feet,
                    'dropdownValueinch' => $kidmenu->tell_inch,
                    'kids_relationship_to_child' => $kidmenu->kids_relationship_to_child,
                    'size_prefer_wear' => $kidmenu->size_prefer_wear,
                    'Thoughtful' => (!empty($kidmenu->child_personality) && in_array('Thoughtful', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Sporty' => (!empty($kidmenu->child_personality) && in_array('Sporty', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Shy' => (!empty($kidmenu->child_personality) && in_array('Shy', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Outgoing' => (!empty($kidmenu->child_personality) && in_array('Outgoing', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Artistic' => (!empty($kidmenu->child_personality) && in_array('Artistic', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Chatty' => (!empty($kidmenu->child_personality) && in_array('Chatty', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Bookworm' => (!empty($kidmenu->child_personality) && in_array('Bookworm', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Curious' => (!empty($kidmenu->child_personality) && in_array('Curious', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Sassy' => (!empty($kidmenu->child_personality) && in_array('Sassy', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Funny' => (!empty($kidmenu->child_personality) && in_array('Funny', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Independent' => (isset($kidmenu->child_personality) && in_array('Independent', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Kind' => (!empty($kidmenu->child_personality) && in_array('Kind', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Daredevil' => (!empty($kidmenu->child_personality) && in_array('Daredevil', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Serious' => (!empty($kidmenu->child_personality) && in_array('Serious', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Adventurous' => (!empty($kidmenu->child_personality) && in_array('Adventurous', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Confident' => (!empty($kidmenu->child_personality) && in_array('Confident', explode(',', @$kidmenu->child_personality))) ? true : false,
                    'Black' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('1', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Grey' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('2', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'White' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('3', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Cream' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('4', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Brown' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('5', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Purple' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('6', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Green' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('7', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Blue' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('8', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Orange' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('9', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Yellow' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('10', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Red' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('11', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    'Pink' => ((strlen(@$kidmenu->prefer_color) > 2) && (in_array('12', json_decode(@$kidmenu->prefer_color, true)))) ? true : false,
                    /* --kid--- */
                    'body_shape' => $KidsSizeFit->body_shape,
                    //'shirt_sleeve_length' => ($kidDetails->kids_clothing_gender=="boys")?$KidsSizeFit->shirt_sleeve_length:'',
                    'shirt_sleeve_length' => $KidsSizeFit->shirt_sleeve_length,
                    'kids_fit_challenge_shirt_torso_length' => $KidsSizeFit->kids_fit_challenge_shirt_torso_length,
                    'kids_fit_challenge_shirt_torso_width' => $KidsSizeFit->kids_fit_challenge_shirt_torso_width,
                    'kids_fit_challenge_pant_waist' => $KidsSizeFit->kids_fit_challenge_pant_waist,
                    'kids_fit_challenge_pant_leg_length' => $KidsSizeFit->kids_fit_challenge_pant_leg_length,
                    'kids_fit_challenge_pant_leg_width' => $KidsSizeFit->kids_fit_challenge_pant_leg_width,
                    'dreses_rompers' => $KidsSizeFit->dreses_rompers,
                    'shorts' => $KidsSizeFit->shorts,
                    'leggings' => $KidsSizeFit->leggings,
                    'jeans' => $KidsSizeFit->jeans,
                    'paint' => $KidsSizeFit->paint,
                    'trousers_chino' => $KidsSizeFit->trousers_chino,
                    'sweatspaint' => $KidsSizeFit->sweatspaint,
                    'shoes' => $KidsSizeFit->shoes,
                    'pajamas' => $KidsSizeFit->pajamas,
                    'button_downs' => $KidsSizeFit->button_downs,
                    'polo_shirts' => $KidsSizeFit->polo_shirts,
                    'jacket_coats' => $KidsSizeFit->jacket_coats,
                    'sweats_shirts' => $KidsSizeFit->sweats_shirts,
                    'sweaters' => $KidsSizeFit->sweaters,
                    't_shirts' => $KidsSizeFit->t_shirts,
                    'kids_frequency_arts_and_crafts' => $kidmenu->kids_frequency_arts_and_crafts,
                    'kids_frequency_biking' => $kidmenu->kids_frequency_biking,
                    'kids_frequency_dance' => $kidmenu->kids_frequency_dance,
                    'kids_frequency_playing_outside' => $kidmenu->kids_frequency_playing_outside,
                    'kids_frequency_musical_instruments' => $kidmenu->kids_frequency_musical_instruments,
                    'kids_frequency_reading' => $kidmenu->kids_frequency_reading,
                    'stripes' => $KidClothingType->stripes,
                    'floral' => $KidClothingType->floral,
                    'animal_print' => $KidClothingType->animal_print,
                    'polkadots' => $KidClothingType->polkadots,
                    'plaid' => $KidClothingType->plaid,
                    'camo' => $KidClothingType->camo,
                    'gingham' => $KidClothingType->gingham,
                    'novelty' => $KidClothingType->novelty,
                    'top_size' => $KidsSizeFit->top_size,
                    'bottom_size' => $KidsSizeFit->bottom_size,
                    'shoe_size' => $KidsSizeFit->shoe_size,
                    'accessories' => $KidsSizeFit->accessories,
                    'skirts' => $KidsSizeFit->skirts,
                    'top_blouses' => $KidsSizeFit->top_blouses,
                    'pr_casual_shirts' => $KidStyles->casual_shirts,
                    'pr_skirts_shorts' => $KidStyles->skirts_shorts,
                    'pr_leggings' => $KidStyles->leggings,
                    'pr_jeans' => $KidStyles->jeans,
                    'pr_dresses' => $KidStyles->dresses,
                    'pr_sweaters' => $KidStyles->sweaters,
                    'pr_blouses' => $KidStyles->blouses,
                    'pr_jaket' => $KidStyles->jaket,
                    'pr_shoes' => $KidStyles->shoes,
                    'pr_shorts' => $KidStyles->shorts,
                    'pr_jeans_paint' => $KidStyles->jeans_paint,
                    'pr_button_downs' => $KidStyles->button_downs,
                    'pr_casual_bootms' => $KidStyles->casual_bootms,
                    'janine' => (!empty($menbrand) && in_array('janine', @$menbrand)) ? true : false,
                    'oldnavy' => (!empty($menbrand) && in_array('oldnavy', @$menbrand)) ? true : false,
                    'tea' => (!empty($menbrand) && in_array('tea', @$menbrand)) ? true : false,
                    'terget' => (!empty($menbrand) && in_array('terget', @$menbrand)) ? true : false,
                    'jcrew' => (!empty($menbrand) && in_array('jcrew', @$menbrand)) ? true : false,
                    'nike' => (!empty($menbrand) && in_array('nike', @$menbrand)) ? true : false,
                    'place' => (!empty($menbrand) && in_array('place', @$menbrand)) ? true : false,
                    'carters' => (!empty($menbrand) && in_array('carters', @$menbrand)) ? true : false,
                    'zara' => (!empty($menbrand) && in_array('zara', @$menbrand)) ? true : false,
                    'gym' => (!empty($menbrand) && in_array('gym', @$menbrand)) ? true : false,
                    'under' => (!empty($menbrand) && in_array('under', @$menbrand)) ? true : false,
                    'gap' => (!empty($menbrand) && in_array('gap', @$menbrand)) ? true : false,
                    'just' => (!empty($menbrand) && in_array('just', @$menbrand)) ? true : false,
                    'khals' => (!empty($menbrand) && in_array('khals', @$menbrand)) ? true : false,
                    'mars' => (!empty($menbrand) && in_array('mars', @$menbrand)) ? true : false,
                    'jcp' => (!empty($menbrand) && in_array('jcp', @$menbrand)) ? true : false,
                    'nord' => (!empty($menbrand) && in_array('nord', @$menbrand)) ? true : false,
                    'amzone' => (!empty($menbrand) && in_array('amzone', @$menbrand)) ? true : false,
                    'walmert' => (!empty($menbrand) && in_array('walmert', @$menbrand)) ? true : false,
                    'macy' => (!empty($menbrand) && in_array('macy', @$menbrand)) ? true : false,
                    'img1' => !empty($checkIdCount) ? HTTP_ROOT . USER_CUSTOM . $checkIdCount->img_1 : '',
                    'img2' => !empty($checkIdCount) ? HTTP_ROOT . USER_CUSTOM . $checkIdCount->img_2 : '',
                    'img3' => !empty($checkIdCount) ? HTTP_ROOT . USER_CUSTOM . $checkIdCount->img_3 : '',
                    'profile_note' => !empty($KidStyles) ? $KidStyles->profile_note : '',
                ]);
            }
        }
        exit;
    }

    public function stylefitProducts()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kid_id = $data['kid_id'];
            $reqst_for = $data['status'];
            if (!empty($kid_id)) {
                @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => $kid_id, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
                $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                $productData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
                $productcount = $this->Products->find('all')->where(['Products.kid_id' => $kid_id, 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId])->count();
                $cname = $getUsersDetails->kids_first_name;
            } else {
                @$paymentId = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                //            echo @$paymentId;exit;
                $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();
                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $productData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
                $productcount = $this->Products->find('all')->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId])->count();
                $cname = $getUsersDetails->name;
            }
            if (!empty($reqst_for) && ($reqst_for == "status")) {
                if ($getUsersDetails->is_redirect == 2) {
                    $this->Flash->success(__('Keep wait product yet not shipped'));
                    echo json_encode(['status' => 'error', 'msg' => 'Keep wait product yet not shipped', 'url' => HTTP_ROOT . 'not-yet-shipped']);
                    exit;
                } else {
                    echo json_encode(['status' => 'success', 'cname' => $cname,]);
                    exit;
                }
                exit;
            }
            $this->Products->updateAll(['customer_purchasedate' => '0000-00-00'], ['payment_id' => $paymentId, 'store_return_status !=' => 'Y']);
            $stylefit_product_list = [];
            foreach ($productData as $ky => $data) {
                $sts_dd = '';
                if (in_array($data->keep_status,[99,0,3])) {
                    $sts_dd = 'Keep';
                    $this->Products->updateAll(['keep_status' => 3], ['id' => $data->id]);
                }
                if ($data->keep_status == 3) {
                    $sts_dd = 'Keep';
                }
                if ($data->keep_status == 2) {
                    $sts_dd = 'Exchange';
                }
                if ($data->keep_status == 1) {
                    $sts_dd = 'Return';
                }
                $stylefit_product_list[$ky]['product_id'] = $data->id;
                $stylefit_product_list[$ky]['keep_status'] = in_array($data->keep_status,[99,0,3])?3:$data->keep_status;
                $stylefit_product_list[$ky]['keep_status_name'] = $sts_dd;
                $stylefit_product_list[$ky]['size_status'] = $data->size_status;
                $stylefit_product_list[$ky]['style_status'] = $data->style_status;
                $stylefit_product_list[$ky]['price_status'] = $data->price_status;
                $stylefit_product_list[$ky]['quality_status'] = $data->quality_status;
                $stylefit_product_list[$ky]['product_review'] = $data->product_review;
                $stylefit_product_list[$ky]['product_image'] = strstr($data['product_image'], PRODUCT_IMAGES) ? HTTP_ROOT . $data['product_image'] : HTTP_ROOT . PRODUCT_IMAGES . $data['product_image'];
                $stylefit_product_list[$ky]['product_name_one'] = $data->product_name_one;
                $stylefit_product_list[$ky]['product_name_two'] = $data->product_name_two;
                $stylefit_product_list[$ky]['size'] = $data->size;
                $stylefit_product_list[$ky]['color'] = $data->color;
                $stylefit_product_list[$ky]['sell_price'] = number_format($data->sell_price, 2);
            }
            echo json_encode($stylefit_product_list);
            exit;
        }
        exit;
    }

    public function updateStylefitProduct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $newData = [];
            if (!empty($data['key'])) {
                $newData[$data['key']] = $data['value'];
            }
            if (!empty($data['key']) && ($data['key'] == "keep_status")) {
                if (($data['value'] == 3) || ($data['value'] == 0) || ($data['value'] == 99)) {
                    $newData['customer_purchasedate'] = date('Y-m-d');
                    $newData['customer_purchase_status'] = 'Y';
                    $newData['return_status'] = 'N';
                    $newData['exchange_status'] = 'N';
                    $newData['keep_status'] = 3;
                }
                if ($data['value'] == 2) {
                    $newData['exchange_status'] = 'Y';
                    $newData['customer_purchase_status'] = 'N';
                    $newData['return_status'] = 'N';
                    $newData['customer_purchasedate'] = '';
                    $newData['keep_status'] = 2;
                }
                if ($data['value'] == 1) {
                    $newData['product_valid_return_date'] = date('Y-m-d h:i:s');
                    $newData['return_status'] = 'Y';
                    $newData['customer_purchase_status'] = 'N';
                    $newData['exchange_status'] = 'N';
                    $newData['customer_purchasedate'] = '';
                    $newData['keep_status'] = 1;
                }
            }
            $this->Products->updateAll($newData, ['id' => $data['product_id']]);
            echo json_encode(['status' => 'success']);
            exit;
        }
        exit;
    }

    public function userAddressList()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $all_address = $this->ShippingAddress->find('all')->where(['user_id' => $user_id]);
            $all_address_li = !empty($all_address->count()) ? $all_address : [];
            echo json_encode($all_address_li);
            exit;
        }
        exit;
    }

    public function paymentCardList()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $this->viewBuilder()->setLayout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $userId = $data['user_id'];
            //$uid = !empty($uid) ? $uid : $this->Auth->user('id');
            $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $userId]);
            $i = 0;
            $card_list = [];
            foreach ($savecard as $card) {
                $i++;
                $masked = str_pad(substr($card->card_number, -4), strlen($card->card_number), 'X', STR_PAD_LEFT);
                if ($card->card_type == 'Visa') {
                    $img = 'visa.png';
                } elseif ($card->card_type == 'Mastercard') {
                    $img = 'master.png';
                } elseif ($card->card_type == 'Maestro') {
                    $img = 'maestro.png';
                } elseif ($card->card_type == 'Discover') {
                    $img = 'discover.png';
                } elseif ($card->card_type == 'Amex') {
                    $img = 'american.png';
                } elseif ($card->card_type == 'Jcb') {
                    $img = 'Jcb.png';
                } elseif ($card->card_type == 'Unionpay') {
                    $img = 'Unionpay.png';
                } elseif ($card->card_type == 'Diners') {
                    $img = 'Diners.png';
                }
                $image = HTTP_ROOT . 'images/' . $img;
                $card_name = $card->card_name;
                $card_number = $masked;
                $card_expire = $card->card_expire;
                $card_list['id'] = $card->id;
                $card_list['image'] = $image;
                $card_list['card_type'] = $card->card_type;
                $card_list['card_name'] = $card_name;
                $card_list['card_number'] = $card_number;
                $card_list['card_expire'] = $card_expire;
                $card_listx[] = $card_list;
            }
            echo json_encode(!empty($card_listx) ? $card_listx : ['status' => 'error']);
            exit;
        }
        exit;
    }

    public function notYetShipped()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kid_id = $data['kid_id'];
            $profile_type = $data['profile'];
            if ($profile_type == 'KIDS') {
                $paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => $kid_id, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                $paymentIdown = $this->PaymentGetways->find('all')->where(['kid_id' => $kid_id, 'payment_type' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
                if ($getUsersDetails->is_redirect == 4) {
                    echo json_encode(['status' => 'error']);
                    exit;
                }
                $status = '';
                $paymentNum = $this->PaymentGetways->find('all')->where(['PaymentGetways.kid_id' => $kid_id, 'PaymentGetways.mail_status' => 0, 'refound_status' => 0, 'PaymentGetways.payment_type' => 1, 'work_status IN' => [1, 0]])->order(['PaymentGetways.id' => 'DESC'])->first();
                $paymentCount = $paymentNum->count;
                if ($paymentCount == 1) {
                    $status = "st";
                } elseif ($paymentCount == 2) {
                    $status = "nd";
                } elseif ($paymentCount == 3) {
                    $status = "rd";
                } else {
                    $status = "th";
                }
            } else {
                $getUsersDetails = $this->Users->find('all')->where(['id' => $user_id])->first();
                @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => 0, 'user_id' => $user_id, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                @$paymentIdown = $this->PaymentGetways->find('all')->where(['kid_id' => 0, 'user_id' => $user_id, 'payment_type' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                if ($getUsersDetails->is_redirect == 4) {
                    echo json_encode(['status' => 'error']);
                    exit;
                }
                $status = '';
                $paymentNum = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $user_id, 'PaymentGetways.status' => 1, 'kid_id' => 0, 'refound_status' => 0, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.mail_status' => 0, 'work_status IN' => [0, 1]])->order(['PaymentGetways.id' => 'ASC'])->first();
                $paymentCount = $paymentNum->count;
                if ($paymentCount == 1) {
                    $status = "st";
                } elseif ($paymentCount == 2) {
                    $status = "nd";
                } elseif ($paymentCount == 3) {
                    $status = "rd";
                } else {
                    $status = "th";
                }
            }
            $getProductDetails = $this->Products->find('all')->where(['payment_id' => $paymentIdown, 'is_altnative_product' => 0, 'is_exchange_pending' => 1])->count();
            if ($getProductDetails >= 1) {
                $procutsExchange = "Exchange";
            } else {
                $procutsExchange = "";
            }
            echo json_encode(['status' => 'success', 'paymentCount' => $paymentCount . $status, 'procutsExchange' => $procutsExchange]);
            exit;
        }
        echo json_encode(['status' => 'error']);
        exit;
    }

    public function deleteaddress()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $chk =  $this->ShippingAddress->find('all')->where(['id' => $postData['id']])->first();
            if(!empty($chk)){
                $chk_address_count = $this->ShippingAddress->find('all')->where(['user_id' => $chk->user_id])->count();
                if($chk_address_count == 1){
                    echo json_encode(['status' => 'error', 'msg'=>'One address needed.']);
                    exit;
                }
            }
            $this->ShippingAddress->deleteAll(['id' => $postData['id']]);
        }
        echo json_encode(['status' => 'success']);
        exit;
    }

    public function schedule()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        echo json_encode(['status' => 'success']);
        exit;
    }

    public function fitsetting()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kid_id = $data['kid_id'];
            // pj($data); exit;
            $UserDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
            $username = $UserDetails->name;
            $sitename = SITE_NAME;

            $datepicker = !empty($data['datepicker']) ? $data['datepicker'] : date('d/m/Y');

            if (@$data['try_new_items_with_scheduled_fixes'] == '') {
                $try_new_items_with_scheduled_fixes = 0;
            } else {
                $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
            }
            if ($data['how_often_would_you_lik_fixes'] == '') {
                $how_often_would_you_lik_fixes = 0;
            } else {
                $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
            }
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'LetsPlanYourFirstFix.kid_id' => $kid_id, 'LetsPlanYourFirstFix.user_id' => $user_id])->first();
            } else {
                $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $user_id])->first();
            }

            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
            if (!empty($kid_id)) {
                $getdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $kid_id, 'LetsPlanYourFirstFix.user_id' => $user_id])->first();
                if (@$getdata->kid_id) {
                    $data['id'] = $getdata->id;
                } else {
                    $data['id'] = '';
                }
                $exitdata = 0;
            } else {
                $exitdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $user_id])->count();
            }
            if ($exitdata >= 1) {
                if (!empty($kid_id)) {
                     $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'applay_dt' => $this->Custom->applydate($user_id, $kid_id)], ['kid_id' => $kid_id]);
                    
                    $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $kid_id, 'LetsPlanYourFirstFix.user_id' => $user_id])->first();
                    $sub_frq = "";
                    if($getLetData->how_often_would_you_lik_fixes == 1){
                        $sub_frq = "Every Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 2){
                        $sub_frq = "Every Two Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 3){
                        $sub_frq = "Every Three Month";
                    }
                   
                    if ($try_new_items_with_scheduled_fixes == 0) {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();
                        $kidname = $kidsDetails['kids_first_name'];
                        $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
                    }
                    if ($try_new_items_with_scheduled_fixes == 1) {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
                        $kidname = $kidsDetails->kids_first_name;
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename,$sub_frq);
                    }
                } else {
                     $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'applay_dt' => $this->Custom->applydate($user_id, $kid_id)], ['user_id' => $user_id, 'kid_id' => 0]);
                    
                    $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $user_id])->first();
                    $sub_frq = "";
                    if($getLetData->how_often_would_you_lik_fixes == 1){
                        $sub_frq = "Every Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 2){
                        $sub_frq = "Every Two Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 3){
                        $sub_frq = "Every Three Month";
                    }
                    
                   
                    if ($try_new_items_with_scheduled_fixes == 0) {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();
                        $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
                    }
                    if ($try_new_items_with_scheduled_fixes == 1) {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->SubscriptionActivatedEmail($emailMessage->value, $username, $sitename, $sub_frq);
                    }
                    // $this->Flash->success(__('Updated successfully.'));
                }
            } else {
                $data['user_id'] = $user_id;
                $data['kid_id'] = !empty($kid_id) ? $kid_id : 0;
                $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
                $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;
                $data['applay_dt'] = $this->Custom->applydate($user_id, $kid_id);
                $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
                $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
                if (!empty($kid_id)) {
                     $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $kid_id, 'LetsPlanYourFirstFix.user_id' => $user_id])->first();
                    $sub_frq = "";
                    if($getLetData->how_often_would_you_lik_fixes == 1){
                        $sub_frq = "Every Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 2){
                        $sub_frq = "Every Two Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 3){
                        $sub_frq = "Every Three Month";
                    }
                    if ($try_new_items_with_scheduled_fixes == 0) {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();
                        $kidname = $kidsDetails['kids_first_name'];
                        $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
                    }
                    if ($try_new_items_with_scheduled_fixes == 1) {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
                        $kidname = $kidsDetails->kids_first_name;
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename,$sub_frq);
                    }
                } else {
                     $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $user_id])->first();
                    $sub_frq = "";
                    if($getLetData->how_often_would_you_lik_fixes == 1){
                        $sub_frq = "Every Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 2){
                        $sub_frq = "Every Two Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 3){
                        $sub_frq = "Every Three Month";
                    }
                    if ($try_new_items_with_scheduled_fixes == 0) {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();
                        $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
                    }
                    if ($try_new_items_with_scheduled_fixes == 1) {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->SubscriptionActivatedEmail($emailMessage->value, $username, $sitename, $sub_frq);
                    }
                }
            }
            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $to = $UserDetails->email;
            $from = $fromMail->value;
            $subject = $emailMessage->display;
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            if ($checkdata->id == '') {
                $this->Custom->sendEmail($to, $from, $subject, $message);
                $this->Custom->sendEmail($toSupport, $from, $subject, $message);
            }
            $enty = $this->DeliverDate->newEntity();
            // $exitData = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $this->Auth->user('id')])->first();
            // if ($exitData->user_id) {
            //     $data['id'] = $exitData->id;
            // } else {
            //     $data['id'] = '';
            // }
            if (@$data['sendMe']) {
                $is_send_me = 1;
            } else {
                $is_send_me = 0;
            }
            $dateTime = date('l, F d, Y', strtotime("+7 day",strtotime(date('Y-m-d',strtotime(date_format(date_create_from_format("d/m/Y", $datepicker), "Y-m-d"))))));
            $data2['date_in_time'] = $dateTime;
            $data2['weeks'] = 0;
            $data2['is_send_me'] = $is_send_me;
            $data2['user_id'] = $user_id;
            $data2['kid_id'] = $kid_id;
            $enty = $this->DeliverDate->patchEntity($enty, $data2);

            $this->DeliverDate->save($enty);
            //$this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $user_id]);
            // return $this->redirect(HTTP_ROOT . 'welcome/reservation');
        }
        echo json_encode(['status' => 'success']);
        exit;
    }

    public function kidBrandUpdate()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kidId = $data['kid_id'];
            $this->KidStyles->updateAll([
                'brands' => implode(",", json_decode($data['kids_brands'], true)),
                'profile_note' => $data['profile_note']
            ], ['kid_id' => $kidId]);
            $checkPagePosition = $this->KidsDetails->find('all')->where(['id' => $kidId])->first()->is_progressbar;
            if (@$checkPagePosition != 100) {
                $this->KidsDetails->updateAll(['is_progressbar' => 100, 'is_redirect' => '1'], ['id' => $kidId]);
                $kidDetails = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $kidId])->first();
                if ($kidDetails->is_progressbar == 100) {
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_PROFILE_COMPLETE'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $UserDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
                    $to = $UserDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $kidname = $kidDetails->kids_first_name;
                    $kidlink = HTTP_ROOT . 'kid_profile/' . $kidId;
                    $message = $this->Custom->kidProfileStart($emailMessage->value, $UserDetails->name, $kidname, $sitename, $kidlink);
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                }

                echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/schedule']);
            } else {
                $Usersdata = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                /* if ($Usersdata->is_redirect == 0 && @$Usersdata->is_progressbar != 100) {
                  $url = 'welcome/style/';
                  } elseif ($Usersdata->is_redirect == 0 && $Usersdata->is_progressbar == 100) {
                  $url = 'welcome/schedule/';
                  } elseif ($Usersdata->is_redirect == 0) {
                  $url = 'welcome/style/';
                  } elseif ($Usersdata->is_redirect == 1) {
                  $url = 'welcome/schedule/';
                  } elseif ($Usersdata->is_redirect == 2) {
                  $url = 'not-yet-shipped';
                  } elseif ($Usersdata->is_redirect == 3) {
                  $url = 'profile-review/';
                  } elseif ($Usersdata->is_redirect == 4) {
                  $url = 'order_review/';
                  } elseif ($Usersdata->is_redirect == 5) {
                  $url = 'calendar-sechedule/';
                  } elseif ($Usersdata->is_redirect == 6) {
                  $url = 'customer-order-review';
                  } */
                echo json_encode(['status' => 'success']);
            }
        }
        exit;
    }

    public function emailPreformeParent()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kidId = $data['kid_id'];
            $newEntity = $this->EmailPreferences->newEntity();
            if ($user_id) {
                $emailPreferences = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $user_id, 'EmailPreferences.kid_id' => $kidId])->first();
                if (@$emailPreferences->id != '') {
                    $data['id'] = $emailPreferences->id;
                } else {
                    $data['id'] = '';
                }
                $data['user_id'] = $user_id;
                $data['kid_id'] = $kidId;
                $data['preferences'] = $data['email_preferences'];
                $newEntity = $this->EmailPreferences->patchEntity($newEntity, $data);
                $this->EmailPreferences->save($newEntity);
            }
            echo json_encode(['msg' => 'Data save successfully']);
            exit;
        }
        exit;
    }

    public function ajaxEmailPreformeProfile()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        //$this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kid_id = $data['kid_id'];
            if ($data) {
                if ($user_id) {
                    $emailPreferences = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $user_id, 'EmailPreferences.kid_id' => $kid_id])->first();
                    if (@$emailPreferences->id != '') {
                        $data['id'] = $emailPreferences->id;
                    } else {
                        $data['id'] = '';
                    }
                    $data['user_id'] = $user_id;
                    $data['kid_id'] = $kid_id;
                    $data['preferences'] = $data['email_preferences'];
                    $newEntity = $this->EmailPreferences->newEntity();
                    $newEntity = $this->EmailPreferences->patchEntity($newEntity, $data);
                    $this->EmailPreferences->save($newEntity);
                }
                echo json_encode(['status' => 'success', 'msg' => 'Data save successfully']);
                exit;
            }
        }
        exit;
    }

    public function ajaxforget()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['email'] == "") {
                $this->Flash->error(__('Email field is empty'));
            } else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) {
                $this->Flash->error(__('Please enter a valid email id'));
            } else {
                $users = $this->Users->find('all')->where(['Users.email' => $data['email']]);
                $user = $users->first();
                if ($users->count() > 0) {
                    $this->Users->query()->update()->set(['qstr' => $user->unique_id])->where(['id' => $user->id])->execute();
                    $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'FORGOT_PASSWORD'])->first();
                    $to = $user->email;
                    $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $from = $fromvalue->value;
                    $subject = $emailTemplate->display;
                    $link = '<a style="text-decoration:none;color:black;" target="_blank" href=' . HTTP_ROOT . 'changePassword/' . $user->unique_id . '>Reset Password</a>';
                    $message = $this->Custom->formatForgetPassword($emailTemplate->value, $user->name, $user->email, $link, SITE_NAME);
                    $kid_id = 0;
                    //$this->Custom->sendEmail($to, $from, $subject, 'forgetmail');
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                    echo json_encode(['status' => 'successs', 'msg' => 'A link to reset your password has been set to your registered email address.']);
                    exit;
                } else {
                    echo json_encode(['status' => 'error', 'msg' => 'This email is not associated with our site.']);
                    exit;
                }
            }
        }
        exit;
    }

    public function getProgressStatus()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kid_id = $data['kid_id'];
            if (!empty($kid_id)) {
                //Get data from kiddetails
                $kidDetails = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $kid_id])->first();
                $resp = ['status' => 'success', 'msg' => 'Data found', 'is_progressbar' => $kidDetails->is_progressbar];
            } else {
                //Get data from userdetails
                $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user_id])->first();
                $resp = ['status' => 'success', 'msg' => 'Data found', 'is_progressbar' => $userData->is_progressbar];
            }
            echo json_encode($resp);
            exit;
        }
        echo json_encode(['status' => 'error', 'msg' => 'No data found!!']);
        exit;
    }

    public function ajaxMenImg()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $userId = $data['user_id'];
            if ($data) {

                $imgCol = 'img_' . $data['imgId'];

                if ($data['file']['tmp_name']) {

                    $tmp_name = $data['file']['tmp_name'];

                    $name = $data['file']['name'];

                    $path = USER_CUSTOM;

                    $imgWidth = 300;

                    $img = $this->Custom->uploadImageBanner($tmp_name, $name, $path, $imgWidth);
                }

                $checkIdCount = $this->CustomDesine->find('all')->where(['user_id' => $userId])->count();

                if ($checkIdCount == 0) {

                    $catelogs = $this->CustomDesine->newEntity();

                    $data['user_id'] = $userId;
                    $data['kid_id'] = 0;

                    $data['type'] = 1; // 1 one for users 2 for kids

                    $data[$imgCol] = $img;

                    $data['created'] = date('Y-m-d h:i:s');

                    $Catelogs = $this->CustomDesine->patchEntity($catelogs, $data);

                    $this->CustomDesine->save($Catelogs);
                } else {

                    $this->CustomDesine->updateAll([$imgCol => $img], ['user_id' => $userId]);
                }

                $imgurl = HTTP_ROOT . USER_CUSTOM . $img;

                echo json_encode(['status' => 'success', 'img' => $imgurl, $data]);

                exit;
            }
        }
        echo json_encode(['status' => 'error', 'img' => '']);
        exit;
    }

    public function ajaxKidImg()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        $this->viewBuilder()->layout('ajax');

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if ($data) {
                $kidId = $data['kid_id'];

                $imgCol = 'img_' . $data['imgId'];

                if ($data['file']['tmp_name']) {

                    $tmp_name = $data['file']['tmp_name'];

                    $name = $data['file']['name'];

                    $path = USER_CUSTOM;

                    $imgWidth = 300;

                    $img = $this->Custom->uploadImageBanner($tmp_name, $name, $path, $imgWidth);
                }

                $checkIdCount = $this->CustomDesine->find('all')->where(['kid_id' => $kidId])->count();

                if ($checkIdCount == 0) {

                    $catelogs = $this->CustomDesine->newEntity();

                    $data['kid_id'] = $kidId;
                    $data['user_id'] = 0;

                    $data['type'] = 1; // 1 one for users 2 for kids

                    $data[$imgCol] = $img;

                    $data['created'] = date('Y-m-d h:i:s');

                    $Catelogs = $this->CustomDesine->patchEntity($catelogs, $data);

                    $this->CustomDesine->save($Catelogs);
                } else {

                    $this->CustomDesine->updateAll([$imgCol => $img], ['kid_id' => $kidId]);
                }

                $imgurl = HTTP_ROOT . USER_CUSTOM . $img;

                echo json_encode(['status' => 'success', 'img' => $imgurl, $data]);

                exit;
            }
        }
        echo json_encode(['status' => 'error', 'img' => '']);
    }

    public function updateBasicInfo()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        $this->viewBuilder()->setLayout('ajax');

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $user = $this->Users->newEntity();

            /*if ($data['password'] && $data['first_name']) {*/
                $user->name = $data['first_name'];

                $user->id = $data['user_id'];


                if ($data['password']) {

                    $user->password = $data['password'];
                }
                

                if ($this->Users->save($user)) {

                    $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'last_name' => $data['last_name']], ['user_id' => $data['user_id']]);

                    echo json_encode(['msg' => 'Password change successfully ', 'status' => 'success']);
                }
           /* } else if ($data['first_name']) {

                $user->name = $data['first_name'];

                $user->id = $data['user_id'];

                $this->Users->updateAll(['name' => $data['first_name']], ['id' => $this->Auth->user('id')]);

                $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'last_name' => $data['last_name']], ['user_id' => $data['user_id']]);

                echo json_encode(['msg' => 'Details updated successfully ', 'status' => 'success']);
            }*/
        }

        exit;
    }

    public function ajaxReadmeCodeCheck()
    {
        $this->loadModel('OfferPromocode');
        $this->loadModel('UserUsesOfferCode');
        $this->viewBuilder()->setLayout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['promocode'] == '') {
                echo json_encode(['msg' => 'Please input the  code', 'status' => 'error']);
            }
            if ($data['promocode']) {
                $currentDate = date('Y-m-d');

                $checkDataOffer = $this->OfferPromocode->find('all')->where(['OfferPromocode.code' => $data['promocode'], 'DATE(OfferPromocode.expiry_date) >=' => $currentDate, 'DATE(OfferPromocode.created_dt) <=' => $currentDate, 'is_active' => 1])->first();
                if (!empty($checkDataOffer)) {

                    $checkUserApplyOfferData = $this->UserUsesOfferCode->find('all')->where(['code' => $data['promocode'], 'user_id' => $data['user_id']])->count();
                    $checkUserAppliedOfferCodeOrderReview = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $data['user_id']])->count();
                    //                    if ($checkUserApplyOfferData > 0) {
                    //                        echo json_encode(['msg' => 'Already appllied this code', 'status' => 'error']);
                    //                        exit;
                    //                    }

                    if (($checkUserApplyOfferData > 0) && ($checkUserAppliedOfferCodeOrderReview > 0)) {
                        echo json_encode(['msg' => 'Already applllied this code', 'status' => 'error']);
                        exit;
                    }

                    if ($data['total_user_order_price'] >= $checkDataOffer->minimum_purchase) {
                        echo json_encode(['msg' => 'You can apply this  code you can save $' . number_format((float) $checkDataOffer->price, 2, '.', ''), 'status' => 'success1']);
                    } else {
                        echo json_encode(['msg' => 'Offer applied only on minimum total purchases of $' . number_format((float) $checkDataOffer->minimum_purchase, 2, '.', ''), 'status' => 'error']);
                    }
                    exit;
                }
                $this->Promocode->hasOne('UserMailTemplatePromocode', ['className' => 'UserMailTemplatePromocode', 'foreignKey' => 'promocode_id']);
                $checkData = $this->Promocode->find('all')->contain(['UserMailTemplatePromocode'])->where(['Promocode.promocode' => $data['promocode'], 'DATE(Promocode.expiry_date) >=' => $currentDate, 'DATE(Promocode.created_dt) <=' => $currentDate, 'Promocode.is_active' => 1, 'UserMailTemplatePromocode.user_id' => $data['user_id']])->first();
                $checkDataGift = $this->Giftcard->find('all')->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 0, 'to_email' => $this->Auth->user('email'), 'Giftcard.type IN' => [1, 2, 3]])->first();

                $this->Giftcard->hasOne('UserMailTemplateGiftcode', ['className' => 'UserMailTemplateGiftcode', 'foreignKey' => 'giftcode_id']);
                $checkAdminGift = $this->Giftcard->find('all')->contain(['UserMailTemplateGiftcode'])->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 1, 'UserMailTemplateGiftcode.user_id' => $data['user_id'], 'Giftcard.type' => 4])->first();

                if (empty($checkData) && empty($checkDataGift) && empty($checkAdminGift)) {
                    echo json_encode(['msg' => 'Invalid  code', 'status' => 'error', 'to_email' => $this->Auth->user('email')]);
                } else {
                    $checkUserApplyData = $this->UserUsesPromocode->find('all')->where(['UserUsesPromocode.promocode' => $data['promocode'], 'UserUsesPromocode.user_id' => $data['user_id']])->first();
                    $checkUserApplyDataGift = $this->UserUsesGiftcode->find('all')->where(['UserUsesGiftcode.giftcode' => $data['promocode'], 'UserUsesGiftcode.user_id' => $data['user_id']])->first();
                    $checkUserApplay = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $data['user_id']])->first();
                    if ((@$checkUserApplyData->id == '') && (@$checkUserApplyDataGift == '') && ($checkUserApplay->id == '')) {
                        if (@$checkData->price != '') {
                            $price1 = $checkData->price;
                        }
                        if (@$checkDataGift->price != '') {
                            $price1 = @$checkDataGift->price;
                        }
                        if (@$checkAdminGift->price != '') {
                            $price1 = @$checkAdminGift->price;
                        }
                        $price = number_format((float) $price1, 2, '.', '');
                        echo json_encode(['msg' => 'You can apply this  code you can credited $' . $price, 'status' => 'success']);
                    } else {
                        echo json_encode(['msg' => 'Already appllied this code', 'status' => 'error']);
                    }
                }
            }

            exit;
        }

        echo json_encode('1');

        exit;
    }

    public function ajaxReadmeCodeOrder()
    {
        $this->loadModel('OfferPromocode');
        $this->loadModel('UserUsesOfferCode');
        $this->viewBuilder()->setLayout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['promocode'] == '') {
                echo json_encode(['msg' => 'Please input the  code', 'status' => 'error']);
            }
            if ($data['promocode']) {
                $currentDate = date('Y-m-d');

                $checkDataOffer = $this->OfferPromocode->find('all')->where(['OfferPromocode.code' => $data['promocode'], 'DATE(OfferPromocode.expiry_date) >=' => $currentDate, 'DATE(OfferPromocode.created_dt) <=' => $currentDate, 'is_active' => 1])->first();
                if (!empty($checkDataOffer)) {
                    $checkUserApplyOfferData = $this->UserUsesOfferCode->find('all')->where(['code' => $data['promocode'], 'user_id' => $data['user_id']])->count();
                    $checkUserAppliedOfferCodeOrderReview = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $data['user_id']])->count();
                    //                    if ($checkUserApplyOfferData > 0) {
                    //                        echo json_encode(['msg' => 'Already applllied this code', 'status' => 'error']);
                    //                        exit;
                    //                    }

                    if (($checkUserApplyOfferData > 0) && ($checkUserAppliedOfferCodeOrderReview > 0)) {
                        echo json_encode(['msg' => 'Already applllied this code', 'status' => 'error']);
                        exit;
                    } else {

                        if ($data['total_user_order_price'] >= $checkDataOffer->minimum_purchase) {
                        } else {
                            echo json_encode(['msg' => 'Offer applied only on minimum total purchases of $' . number_format((float) $checkDataOffer->minimum_purchase, 2, '.', ''), 'status' => 'error']);
                            exit;
                        }

                        $total_offer_code_applied = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $data['user_id'], 'payment_id' => $data['paymentID'], 'is_offer_code' => 1])->count();
                        $this->UserAppliedCodeOrderReview->deleteAll(['user_id' => $data['user_id'], 'payment_id' => $data['paymentID'], 'is_offer_code' => 1, 'is_ordered' => 0]);
                        $this->UserUsesOfferCode->deleteAll(['user_id' => $data['user_id'], 'payment_id' => $data['paymentID'], 'is_ordered' => 0]);
                        $load_script = '';
                        if ($total_offer_code_applied == 1) {
                            $load_script = '<script>window.location.reload();</script>';
                        }
                        $UserPromocd = $this->UserAppliedCodeOrderReview->newEntity();
                        $UserPromocd->payment_id = $data['paymentID'];
                        $UserPromocd->code = $data['promocode'];
                        $UserPromocd->is_offer_code = 1;
                        $UserPromocd->apply_dt = date('Y-m-d H:i:s');
                        $UserPromocd->user_id = $data['user_id'];
                        $UserPromocd->price = $checkDataOffer->price;
                        $this->UserAppliedCodeOrderReview->save($UserPromocd);
                        if ($checkUserApplyOfferData == 0) {
                            $UserOfferCodee = $this->UserUsesOfferCode->newEntity();
                            $UserOfferCodee->user_id = $data['user_id'];
                            $UserOfferCodee->code = $data['promocode'];
                            $UserOfferCodee->payment_id = $data['paymentID'];
                            $UserOfferCodee->apply_dt = date('Y-m-d H:i:s');
                            $UserOfferCodee->price = $checkDataOffer->price;
                            $this->UserUsesOfferCode->save($UserOfferCodee);
                        }
                    }
                    $gprice = $checkDataOffer->price;
                    $price = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $data['user_id'], 'payment_id' => $data['paymentID']])->sumOf('price');
                    echo json_encode(['status' => 'successgift', 'msg' => '<li class="my_offer_code">' . strtoupper($data['promocode']) . ' applied' . $load_script . '  <span> -$' . number_format($checkDataOffer->price, 2) . ' </span></li>', 'price' => $price, 'gprice' => $gprice]);
                    exit;
                }

                $this->Promocode->hasOne('UserMailTemplatePromocode', ['className' => 'UserMailTemplatePromocode', 'foreignKey' => 'promocode_id']);
                $checkData = $this->Promocode->find('all')->contain(['UserMailTemplatePromocode'])->where(['Promocode.promocode' => $data['promocode'], 'DATE(Promocode.expiry_date) >=' => $currentDate, 'DATE(Promocode.created_dt) <=' => $currentDate, 'Promocode.is_active' => 1, 'UserMailTemplatePromocode.user_id' => $data['user_id']])->first();
                $checkDataGift = $this->Giftcard->find('all')->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 0, 'to_email' => $this->Auth->user('email'), 'Giftcard.type IN' => [1, 2, 3]])->first();

                $this->Giftcard->hasOne('UserMailTemplateGiftcode', ['className' => 'UserMailTemplateGiftcode', 'foreignKey' => 'giftcode_id']);
                $checkAdminGift = $this->Giftcard->find('all')->contain(['UserMailTemplateGiftcode'])->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 1, 'UserMailTemplateGiftcode.user_id' => $data['user_id'], 'Giftcard.type' => 4])->first();

                $checkDataUserUsesGift = $this->UserUsesGiftcode->find('all')->where(['giftcode' => $data['promocode'], 'user_id' => $data['user_id']])->first();
                $checkDataUserUsesPromo = $this->UserUsesPromocode->find('all')->where(['promocode' => $data['promocode'], 'user_id' => $data['user_id']])->first();
                $checkUserAppliedCodeOrderReview = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $data['user_id']])->first();
                if ((@$checkData->id == '') && (@$checkDataGift == '') && (@$checkAdminGift->id == '')) {
                    echo json_encode(['msg' => 'Invalid  code', 'status' => 'error']);
                } else if ((@$checkDataUserUsesGift->id != '') || ($checkDataUserUsesPromo->id != '') || ($checkUserAppliedCodeOrderReview->id != '')) {
                    echo json_encode(['msg' => 'Already used this code', 'status' => 'error']);
                } else {
                    if (@$checkUserAppliedCodeOrderReview->id == '') {
                        $gprice = 0;
                        if (@$checkAdminGift->id != '') {
                            $gprice = $checkAdminGift->price;
                        }
                        if (!empty($checkDataGift->price)) {
                            $gprice = $checkDataGift->price;
                        }
                        if (!empty($checkData->price)) {
                            $gprice = $checkData->price;
                        }

                        $UserPromocd = $this->UserAppliedCodeOrderReview->newEntity();
                        $UserPromocd->payment_id = $data['paymentID'];
                        $UserPromocd->code = $data['promocode'];
                        $UserPromocd->apply_dt = date('Y-m-d H:i:s');
                        $UserPromocd->user_id = $data['user_id'];
                        $UserPromocd->price = $gprice;
                        $this->UserAppliedCodeOrderReview->save($UserPromocd);

                        if (@$checkAdminGift->id != '') {
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $data['user_id'];
                            $UserGift->giftcode = $checkAdminGift->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $checkAdminGift->price;
                            $this->UserUsesGiftcode->save($UserGift);
                        }
                        if ($checkDataGift->id != '') {
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $checkDataGift->id]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $data['user_id'];
                            $UserGift->giftcode = $checkDataGift->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $checkDataGift->price;
                            $this->UserUsesGiftcode->save($UserGift);
                        }
                        if ($checkData->id != '') {
                            $this->Promocode->updateAll(['is_active' => 1], ['id' => $checkData->id]);
                            $UserGift = $this->UserUsesPromocode->newEntity();
                            $UserGift->user_id = $data['user_id'];
                            $UserGift->promocode = $checkData->promocode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $checkData->price;
                            $this->UserUsesPromocode->save($UserGift);
                        }



                        $price = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $data['user_id'], 'payment_id' => $data['paymentID']])->sumOf('price');
                        echo json_encode(['status' => 'successgift', 'msg' => '<li>' . strtoupper($data['promocode']) . ' applied  <span> -$' . number_format($gprice, 2) . ' </span></li>', 'price' => $price, 'gprice' => $gprice]);
                    }
                }
            }

            exit;
        }
        echo json_encode('1');
        exit;
    }

    public function StylefitFee()
    {

        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        $data = $this->request->data;
        $user_id = $data['user_id'];
        $kid_id = !empty($data['kid_id']) ? $data['kid_id'] : 0;
        
        $aduserlist = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $user_id, 'kid_id' => $kid_id])->first();
            if ($aduserlist->try_new_items_with_scheduled_fixes == 1) {
                $subscription = 1;
            } else {
                $subscription = 0;
            }

        $user_plan = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $user_id, 'kid_id' => $kid_id])->first();

        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $user_id])->first();
        if (!empty($kid_id)) {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
        } else {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
        }
        
        $paymentNum = $this->PaymentGetways->find('all')->where(['PaymentGetways.kid_id' => $kid_id, 'PaymentGetways.user_id' => $user_id,'PaymentGetways.payment_type' => 1])->order(['PaymentGetways.id' => 'DESC'])->first();
            $paymentCount = $paymentNum->count;
            
        
        echo json_encode(['fit_count'=>$paymentCount,'fee' => ($userDetails->is_influencer == 1) ? 1 : $main_style_fee, 'plan' => !empty($user_plan) ? $user_plan->how_often_would_you_lik_fixes : 1, 'subscription' => $subscription]);

        exit;
    }

    public function genderUpdate()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        if ($this->request->is('post')) {

            $data = $this->request->data;


            if (@$data['gender']) {

                if (@$data['gender'] == 1) {

                    $gender = 1;

                    $gen = "MEN";
                } else {

                    $gender = 2;

                    $gen = "WOMEN";
                }



                $this->request->session()->write('PROFILE', $gen);

                $getUser = $this->Users->find('all')->where(['id' => $data['user_id']])->first();

                $exitData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $data['user_id']])->count();

                if ($exitData >= 1) {



                    $this->UserDetails->updateAll(['gender' => $gender], ['user_id' => $data['user_id']]);
                } else {
                    $userd = $this->UserDetails->newEntity();

                    $data['id'] = '';

                    $data['user_id'] = $data['user_id'];

                    $data['gender'] = $gender;

                    $data['first_name'] = $getUser->name;

                    $userd = $this->UserDetails->patchEntity($userd, $data);

                    $x = $this->UserDetails->save($userd);
                }
            }

            echo json_encode(['status' => 'success', 'gender' => $gender]);
            exit;
        }
    }

    public function setaddress()
    {

        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $id = $data['id'];
            $getusrdata = $this->ShippingAddress->find('all')->where(['id' => $id])->first();
            $user_id = $getusrdata->user_id;
            $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $user_id]);

            $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $id]);

            $billingddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'ShippingAddress.default_set' => 1])->first();

            $baddress = '<p>' . @$billingddress->full_name . '</p>

                <p>' . @$billingddress->address . '</p>

                <p>' . @$billingddress->address_line_2 . '</p>

                <p>' . @$billingddress->city . '</p>

                <p>' . @$billingddress->state . '</p>

                <p>' . @$billingddress->zipcode . '</p>

                <p>' . @$billingddress->country . '</p>

                <p>' . @$billingddress->phone . '</p>';

            echo json_encode(['status' => 'success', 'bilingAddres' => @$baddress]);

            exit;
        }

        exit;
    }

    public function addBlankKid()
    {


        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        if ($this->request->is('post')) {

            $postData = $this->request->data;
            // echo json_encode($postData);exit;
            $user_id = $postData['user_id'];


            $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $user_id])->count();
            if ($kidcount >= 4) {
                echo json_encode(['status' => 'error', 'msg' => 'Oops! Currently, we can only support 4 kids per family account.']);
                exit;
            } else {
                $countChild = $kidcount + 1;
                $newEntity = $this->KidsDetails->newEntity();
                $data['user_id'] = $user_id;
                $data['kids_first_name'] = '';
                $data['kid_count'] = $countChild;
                $data['kids_birthdate'] = '';
                $data['kids_relationship_to_child'] = '';
                $data['kids_clothing_gender'] = '';
                $data['kids_frequency_arts_and_crafts'] = '';
                $data['kids_frequency_biking'] = '';
                $data['kids_frequency_theatre'] = '';
                $data['kids_frequency_dance'] = '';
                $data['kids_frequency_sports'] = '';
                $data['kids_frequency_playing_outside'] = '';
                $data['kids_frequency_musical_instruments'] = '';
                $data['kids_frequency_reading'] = '';
                $data['kids_frequency_video_games'] = '';
                $data['created_dt'] = date('Y-m-d H:i:s');
                $newEntity = $this->KidsDetails->patchEntity($newEntity, $data);
                $this->KidsDetails->save($newEntity);
                $kidDetails = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $newEntity->id])->first();
                if ($kidDetails->is_progressbar < 100) {
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_PROFILE_START'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $UserDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
                    $to = $UserDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    if ($kidDetails->kid_count == 1) {
                        $kidCounts = "first";
                    }
                    if ($kidDetails->kid_count == 2) {
                        $kidCounts = "second";
                    }
                    if ($kidDetails->kid_count == 3) {

                        $kidCounts = "third";
                    }
                    if ($kidDetails->kid_count == 4) {

                        $kidCounts = "fourth";
                    }
                    $kidlink = HTTP_ROOT . 'kid_profile/' . $newEntity->id;

                    $message = $this->Custom->kidProfileStart($emailMessage->value, $UserDetails->name, $kidCounts, $sitename, $kidlink);

                    $this->Custom->sendEmail($to, $from, $subject, $message);

                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                }
                $this->request->session()->write('KID_ID', $newEntity->id);

                $this->request->session()->write('PROFILE', 'KIDS');

                echo json_encode(['status' => 'success', 'kid_id' => $newEntity->id, 'kid_count' => $kidCounts, 'countdata' => ($kidDetails->kid_count - 1)]);
            }
            exit;
        }
    }

    public function reservationDetails()
    {

        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        if ($this->request->is('post')) {
            $fstdate = $second = "";
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kid_id = $data['kid_id'];
            if (!empty($kid_id)) {

                $dataDate = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $user_id, 'kid_id' => $kid_id])->order(['id' => 'DESC'])->first();
                //echo $dataDate->kid_id; exit;
            } else {
                $dataDate = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $user_id])->order(['id' => 'DESC'])->first();
            }
            if (@$dataDate->date_in_time != '') {
                
                $fstdate  = date('l, F j, Y', strtotime('-7 day', strtotime($dataDate->date_in_time)));
                
                $second = date('l, F j, Y', strtotime($dataDate->date_in_time));
            } else {
                $fstdate = date('l, F j, Y');
                $second = date('l, F j, Y', strtotime('+7 days')); // +7days
            }

            echo json_encode(['status' => 'success', 'fstdate' => $fstdate, 'second' => $second]);
        }
        exit;
    }

    public function customerOrderCommentReview()
    {

        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        if ($this->request->is('post')) {
            $fstdate = $second = "";
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kid_id = !empty($data['kid_id']) ? $data['kid_id'] : 0;
            
            

            $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'kid_id' => $kid_id, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            //  echo json_encode(['status'=>'success', $data,$paymentId,$kid_id,$user_id]);exit;
            
            // if(empty($data['key']) && empty($data['value'])){
            //     $chk_odr_rvw = $this->CustomerProductReview->find('all')->where(['payment_id' => $paymentId])->first();
            //     echo json_encode(['status' => 'success', 'comments'=>$chk_odr_rvw->comments]);
            //     exit;
            // }
            
            $chk_odr_rvw = $this->CustomerProductReview->find('all')->where(['payment_id' => $paymentId])->first();
            if (empty($chk_odr_rvw)) {
                $customerProductReview = $this->CustomerProductReview->newEntity();
                $datax['user_id'] = $user_id;
                $datax['payment_id'] = @$paymentId;
                $datax['did_this_fix_personalized_to_you'] = 0;
                $datax['did_this_fix_match_your_style'] = 0;
                $datax['are_you_satisfied_with_this_fix'] = 0;
                $datax['look_forward_to_another_fix'] = 0;
                $datax['comments'] = '';
                $customerProductReview = $this->CustomerProductReview->patchEntity($customerProductReview, $datax);
                $this->CustomerProductReview->save($customerProductReview);
            }else{
                // $chk_odr_rvw = $this->CustomerProductReview->find('all')->where(['payment_id' => $paymentId])->first();
                // if (!empty($chk_odr_rvw)) {
                    $id = $chk_odr_rvw->id;
                    $this->CustomerProductReview->updateAll([$data['key'] => $data['value']], ['id' => $id]);
                    // $chk_odr_rvw = $this->CustomerProductReview->find('all')->where(['payment_id' => $paymentId])->first();
                    echo json_encode(['status' => 'success'/*, 'comments'=>$chk_odr_rvw->comments*/]);
                // }
            }
        }
        exit;
    }

    public function selectAddresss()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $user_id = $data['user_id'];
            $id = $data['addressid'];
            $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $user_id]);
            $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $id]);
            echo json_encode(['status' => 'success', $data]);
        }
        exit;
    }

    public function customerOrderCommentReviewGet()
    {

        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        if ($this->request->is('post')) {
            $fstdate = $second = "";
            $data = $this->request->data;
            $user_id = $data['user_id'];
            $kid_id = !empty($data['kid_id']) ? $data['kid_id'] : 0;
            $datax = [];
            $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'kid_id' => $kid_id, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            //  echo json_encode(['status'=>'success', $data,$paymentId,$kid_id,$user_id]);exit;
            $chk_odr_rvw = $this->CustomerProductReview->find('all')->where(['payment_id' => $paymentId])->first();
            if (empty($chk_odr_rvw)) {
                $datax['did_this_fix_personalized_to_you'] = 0;
                $datax['did_this_fix_match_your_style'] = 0;
                $datax['are_you_satisfied_with_this_fix'] = 0;
                $datax['look_forward_to_another_fix'] = 0;
                $datax['comments'] = '';
            } else {
                $datax['did_this_fix_personalized_to_you'] = $chk_odr_rvw->did_this_fix_personalized_to_you;
                $datax['did_this_fix_match_your_style'] = $chk_odr_rvw->did_this_fix_match_your_style;
                $datax['are_you_satisfied_with_this_fix'] = $chk_odr_rvw->are_you_satisfied_with_this_fix;
                $datax['look_forward_to_another_fix'] = $chk_odr_rvw->look_forward_to_another_fix;
                $datax['comments'] = $chk_odr_rvw->comments;
            }

            echo json_encode($datax);
        }
        exit;
    }
    
    public function deleteAccount(){
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->Users->updateAll(['is_active' => 9], ['id' => $data['user_id']]);
            echo json_encode(['status'=>'success']);
            exit;
        }
        echo json_encode(['status'=>'error']);
        exit;
    }
}

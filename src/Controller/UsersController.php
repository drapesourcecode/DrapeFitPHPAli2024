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
        $this->loadComponent('Cookie', ['expires' => '30 day']);
        $this->loadComponent('Custom');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Mpdf');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Settings');
        $this->loadModel('Pages');
        $this->loadModel('Settings');
        $this->loadModel('PaymentGetways');
        $this->loadModel('PersonalizedFix');
        $this->loadModel('rather downplay');
        $this->loadModel('ReferFriends');
        $this->loadModel('ShippingAddress');
        $this->loadModel('SizeChart');
        $this->loadModel('style_quizs');
        $this->loadModel('UserDetails');
        $this->loadModel('YourProportions');
        $this->loadModel('PaymentCardDetails');
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
        $this->loadModel('MensBrands');
        $this->loadModel('MenFit');
        $this->loadModel('MenStats');
        $this->loadModel('MenStyle');
        $this->loadModel('MenStyleSphereSelections');
        $this->loadModel('TypicallyWearMen');
        $this->loadModel('LetsPlanYourFirstFix');
        $this->loadModel('KidsDetails');
        $this->loadModel('KidsPersonality');
        $this->loadModel('KidsPrimary');
        $this->loadModel('KidsSizeFit');
        $this->loadModel('KidClothingType');
        $this->loadModel('FabricsOrEmbellishments');
        $this->loadModel('KidStyles');
        $this->loadModel('KidsPricingShoping');
        $this->loadModel('KidPurchaseClothing');
        $this->loadModel('DeliverDate');
        $this->loadModel('Products');
        $this->loadModel('CustomerProductReview');
        $this->loadModel('Payments');
        $this->loadModel('UserUsesPromocode');
        $this->loadModel('Promocode');
        $this->loadModel('ChatMessages');
        $this->loadModel('EmailPreferences');
        $this->loadModel('Wallets');
        $this->loadModel('HelpDesks');
        $this->loadModel('Giftcard');
        $this->loadModel('UserMailTemplateGiftcode');
        $this->loadModel('UserUsesGiftcode');
        $this->loadModel('Notifications');
        $this->loadModel('MenAccessories');
        $this->loadModel('CustomDesine');
        $this->loadModel('WomenShoePrefer');
        $this->loadModel('WomenHeelHightPrefer');
        $this->loadModel('WemenStyleSphereSelections');
        $this->loadModel('UserAppliedCodeOrderReview');
        $this->loadModel('CustomerStylist');
        $this->loadModel('UnderMaintenance');
        
        $this->loadModel('InProductLogs');
        $this->loadModel('InProducts');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['maternityActiveWear', 'plusActiveWear', 'activewear', 'homepagePopupbox', 'checkHomepagePopupbox', 'authorizeCreditCardRefund', 'invitekids', 'invitewomen', 'invitemen', 'autoMentions', 'boxUpdate', 'invite', 'demoemail', 'underConstruction', 'ajaxGmail', 'chatCheckAuth', 'helpClose', 'help', 'startOnlineOffline', 'chatHistory', 'websocketMessage', 'adminlogin', 'fbreturn', 'fblogin', 'fbreturncon', 'fbloginCon', 'client', 'webrootRedirect', 'personalInfo', 'login', 'index', 'logout', 'forget', 'changePassword', 'registration', 'sizedata', 'setPassword', 'shipping', 'ajaxCheckEmailAvail', 'deleteAddress', 'addShipAddress', 'websocketDivMinaus', 'websocketDivMinausAdmin', 'chatButtonClose', 'men', 'women', 'kids', 'address', 'ajaxLogin', 'userregistration', 'ajaxforget', 'googleLoginReturn', 'googlelogin', 'editprofileSocialmedia', 'notYetShipped', 'unsubscribe', 'autoLogin', 'checkEmail', 'autocheckoutmail', 'testMultiAttach', 'howitWorks', 'boxPricing', 'personalStylelist', 'plusSize', 'maternity', 'petite', 'womenJeans', 'womenBusiness', 'bigTall', 'styleGuide', 'frontInfluencer', 'notStripCustomerList', 'stripeRegisterCustomer', 'addCardStripe', 'striprCardStatus', 'cronjobkidStylfitReAuth', 'cronjobparentStylfitReAuth', 'reAuthPayment',  'apiCustomerOrderReview', 'getCardSelect', 'getBillingAddressDetails', 'getShippingAddressDetails', 'getAllAddress', 'getPaymentDetails', 'ajaxWalletsDetails', 'getShipAddressList', 'ajaxChangeshipthisAddress', 'ajaxAddressCount', 'ajaxShippingAddress', 'getBillingAddressList', 'ajaxChangeBillingAddress', 'getPaymentCardDetails', 'ajaxUseThisCard', 'apiCustomerOrderReviewReAuth', 'clearance']);
    }

    public function frontInfluencer($key) {
        if ($key == 'SUCCESS') {
            $this->Flash->success(__('Please signup to create your influencer account. '));
            return $this->redirect(HTTP_ROOT);
        }
        $this->loadModel('Influencers');
        $chk = $this->Influencers->find('all')->where(['uniq_id' => $key]);
        if ($chk->count() < 1) {
            $this->Flash->error(__('Invalid influencer link.'));
            return $this->redirect(HTTP_ROOT);
        }
        $inf_data = $chk->first();
        $this->set(compact('key', 'inf_data'));
    }

    public function calendarSechedule() {
        if (@$this->request->session()->read('Auth.User.id')) {
            if ($this->request->session()->read('Auth.User.type') != 2) {
                $this->Flash->success(__('No access to you this page '));
                return $this->redirect(HTTP_ROOT . 'appadmins');
            }
        }
        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
            if ($getUsersDetails->is_redirect == 6) {
                return $this->redirect(HTTP_ROOT . 'order_review');
            }
            if ($getUsersDetails->is_redirect == 2) {
                return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
            }
            if ($getUsersDetails->is_progressbar < 100) {
                return $this->redirect(HTTP_ROOT . 'welcome/style');
            }
            $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID')])->first();
        } else {
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
            if ($getUsersDetails->is_redirect == 6) {
                return $this->redirect(HTTP_ROOT . 'order_review');
            }
            if ($getUsersDetails->is_redirect == 2) {
                return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
            }
            if ($getUsersDetails->user_detail->is_progressbar < 100) {
                return $this->redirect(HTTP_ROOT . 'welcome/style');
            }

            $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id'), 'kid_id' => 0])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dateTime = date('l, F d, Y', strtotime($data['datepick']));
            $data['date_in_time'] = $dateTime;
            if (@$data['try_new_items_with_scheduled_fixes'] == '') {
                $try_new_items_with_scheduled_fixes = 0;
            } else {
                $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
            }
            if (@$data['how_often_would_you_lik_fixes'] == '') {
                $how_often_would_you_lik_fixes = 0;
            } else {
                $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
            }
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
            } else {
                $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
            }


            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
            if (!empty($this->request->session()->read('KID_ID'))) {
                $getdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                if (@$getdata->kid_id) {
                    $data['id'] = $getdata->id;
                } else {
                    $data['id'] = '';
                }
                $exitdata = 0;
            } else {
                $exitdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id'), 'LetsPlanYourFirstFix.kid_id' => 0])->count();
            }
            //echo $exitdata;exit;
            $UserDetails = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();
            $username = $userDetails->name;
            $sitename = SITE_NAME;
            if ($exitdata >= 1) {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes], ['kid_id' => $this->request->session()->read('KID_ID')]);
                    if ($try_new_items_with_scheduled_fixes == 0) {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();
                        $kidname = $kidsDetails['kids_first_name'];
                        $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
                    }
                    if ($try_new_items_with_scheduled_fixes == 1) {
                        $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                    $sub_frq = "";
                    if($getLetData->how_often_would_you_lik_fixes == 1){
                        $sub_frq = "Every Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 2){
                        $sub_frq = "Every Two Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 3){
                        $sub_frq = "Every Three Month";
                    }
                        
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                        $kidname = $kidsDetails->kids_first_name;
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename, $sub_frq);
                    }
                } else {
                    //echo $this->Auth->user('id'); exit;
                    $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'applay_dt' => $this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'))], ['user_id' => $this->Auth->user('id'), 'kid_id' => 0]);
                    if ($try_new_items_with_scheduled_fixes == 0) {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();
                        $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
                    }
                    if ($try_new_items_with_scheduled_fixes == 1) {
                        $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                        $sub_frq = "";
                        if($getLetData->how_often_would_you_lik_fixes == 1){
                            $sub_frq = "Every Month";
                        }else if($getLetData->how_often_would_you_lik_fixes == 2){
                            $sub_frq = "Every Two Month";
                        }else if($getLetData->how_often_would_you_lik_fixes == 3){
                            $sub_frq = "Every Three Month";
                        }
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->SubscriptionActivatedEmail($emailMessage->value, $username, $sitename,$sub_frq);
                    }
                }
            } else {
                $data['user_id'] = $this->Auth->user('id');
                $data['kid_id'] = (@$this->request->session()->read('KID_ID')) ? @$this->request->session()->read('KID_ID') : 0;
                $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
                $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;

                //$data['applay_dt'] = date('Y-m-d H:i:s');
                $data['applay_dt'] = $this->Custom->applydate($this->Auth->user('id'), (@$this->request->session()->read('KID_ID')) ? @$this->request->session()->read('KID_ID') : 0); //date('Y-m-d H:i:s');


                $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
                $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
                if ($this->request->session()->read('PROFILE') == 'KIDS') {
                    if ($try_new_items_with_scheduled_fixes == 0) {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();
                        $kidname = $kidsDetails['kids_first_name'];
                        $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
                    }
                    if ($try_new_items_with_scheduled_fixes == 1) {
                        $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                        $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                        $sub_frq = "";
                        if($getLetData->how_often_would_you_lik_fixes == 1){
                            $sub_frq = "Every Month";
                        }else if($getLetData->how_often_would_you_lik_fixes == 2){
                            $sub_frq = "Every Two Month";
                        }else if($getLetData->how_often_would_you_lik_fixes == 3){
                            $sub_frq = "Every Three Month";
                        }
                        
                        $kidname = $kidsDetails->kids_first_name;
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                        $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename, $sub_frq);
                    }
                } else {

                    if ($try_new_items_with_scheduled_fixes == 0) {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();
                        $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
                    }
                    if ($try_new_items_with_scheduled_fixes == 1) {
                        $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                        $sub_frq = "";
                        if($getLetData->how_often_would_you_lik_fixes == 1){
                            $sub_frq = "Every Month";
                        }else if($getLetData->how_often_would_you_lik_fixes == 2){
                            $sub_frq = "Every Two Month";
                        }else if($getLetData->how_often_would_you_lik_fixes == 3){
                            $sub_frq = "Every Three Month";
                        }
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
            $data2 = [];
            $dateTime = date('l, F d, Y', strtotime($data['datepick']));
            $data2['date_in_time'] = $dateTime;
            $data2['weeks'] = 0;
            $data2['is_send_me'] = $is_send_me;
            $data2['user_id'] = $this->Auth->user('id');
            $data2['kid_id'] = $this->request->session()->read('KID_ID');
            $enty = $this->DeliverDate->patchEntity($enty, $data2);
            if ($this->DeliverDate->save($enty)) {
                //pj($user); exit;               
                return $this->redirect(HTTP_ROOT . 'welcome/reservation');
            }
        }


        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
        } else {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
        }

        $this->set(compact('LetsPlanYourFirstFixData', 'main_style_fee'));
    }

    public function facebookDisconnect() {
        $this->viewBuilder()->layout('default');
        if ($this->Auth->user('id')) {
            $this->Users->updateAll(['is_fb_connect' => 0], ['id' => $this->Auth->user('id')]);
            return $this->redirect(HTTP_ROOT . 'account/facebook');
        }
    }

    public function help() {
        if (@$this->request->session()->read('help-active') == 2) {
            $this->request->session()->write('help-active', '1');
            return $this->redirect($this->referer());
        }
        if (@$this->request->session()->read('help-active') == '') {
            $this->request->session()->write('help-active', '1');
            return $this->redirect($this->referer());
        } else {
            return $this->redirect($this->referer());
        }
    }

    public function helpClose() {
        $this->viewBuilder()->layout('default');
        if ($this->request->session()->read('help-active') != '') {
            $this->request->session()->write('help-active', '');
            return $this->redirect($this->referer());
        }
    }

    public function men() {
        $title_for_layout = "Monthly Subscription Boxes for Men | Style Fit Clothing & Shoe For Men | Brunch Outfits Men | Drape Fit";
        $metaKeyword = "Monthly Subscription Boxes for Men,men’s monthly box subscription,men’s monthly fashion box,men’s clothing subscription box,Men’s Clothing Subscription,clothing subscription box for men,best men’s fashion subscription boxes,cool subscription boxes for men,Subscription Boxes For Men,Monthly Boxes For Men, Men Subscription Box, Monthly Men's Box Usa,Style Fit Clothing For Men, Monthly Boxes For Men, Subscription Boxes For Men,Brunch Outfits Men, Men's Shoe Styles";
        $metaDescription = "Try our latest and trendy Style Fit Clothing For Men that enhance your style and personality. Get a new look every month! Discover latest fashion brands. Risk Free!";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        $this->viewBuilder()->layout('default');
    }

    public function women() {
        $title_for_layout = "Monthly Subscription Boxes for Women in usa | Subscription Boxes for women | Fashion Subscription Boxes for Women";
        $metaKeyword = "Monthly Subscription Boxes for Women,Subscription Boxes for women,Fashion Subscription Boxes for Women,Fashion Subscription Boxes for Women,Women’s Clothing Monthly Subscription Box,best subscription boxes for women,women’s monthly clothing subscription,women’s clothing subscription service,womens clothes delivered monthly,women’s personal stylist clothing subscription,Monthly Boxes For Women,Women's Clothing Subscription Box,Clothing Boxes For Women, Women's Monthly Clothing Subscription Boxes, Women's Clothing Subscription ,Clothes Boxes For Women, Women's Fashion Boxes Usa, Women Subscription Box Usa,  Clothing Subscription Boxes For Women, Subscription Boxes For Women, Monthly Subscription Boxes For Women, Monthly Boxes For Women, Women's Clothing Subscription Box, Clothing Boxes For Women, Women's Clothing Box, Women's Subscription Box, Clothing Subscription Womens";
        $metaDescription = "Get Women's Monthly Clothing Subscription Boxes Online from Drape Fit. Order a women's clothing subscription box with lowest price. No Shipping Charge. Buy Now.";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        $this->viewBuilder()->layout('default');
    }

    public function activewear() {
        $title_for_layout = "Activewear Monthly Subscription Box for Women";
        $metaKeyword = "Women'S Workout Clothes Subscription Box";
        $metaDescription = "Drape Fit is the leading activewear monthly subscription boxes provider for women. Order a activewear women's clothing subscription box with lowest price.";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        $this->viewBuilder()->layout('default');
    }

    public function plusActiveWear() {
        $title_for_layout = "Women'S Plus Size Activewear Monthly Subscription Boxes";
        $metaKeyword = "Women'S Plus Size Gym Wear Subscription Box, Plus Size Fitness Subscription Box, Women'S Plus Size Activewear Style Box, Plus Size Monthly Subscription Boxes, Women's Plus Size Activewear Style Box";
        $metaDescription = "Our stylist hand-select Women's Plus Size Activewear Style Box from our popular and exclusive brands which is perfectly fits your shape. Place your order now.";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        $this->viewBuilder()->layout('default');
    }

    public function maternityActiveWear() {
        $title_for_layout = "Monthly Subscription Boxes for Women | Subscription Boxes for women | Fashion Subscription Boxes for Women";
        $metaKeyword = "Maternity Activewear Clothing Online Usa, Activewear Monthly Subscription Box, Maternity Activewear Subscription Box Usa";
        $metaDescription = "Get the trendiest women’s fashion collections here! Shop from the huge range of handpicked fashion clothing for women with pocket friendly deals! Complete your Style FIT and get the complete style fit box";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        $this->viewBuilder()->layout('default');
    }

    public function kids() {
        $title_for_layout = "Kids Clothes Subscription Boxes | Monthly Clothing Subscription Boxes For kids | Drape Fit";

        $metaKeyword = "Kids Clothes Subscription Boxes,Monthly Clothing Subscription Boxes For kids,Monthly Subscription Boxes for Kids,subscription boxes for children,subscription boxes for boys,monthly subscriptions for kids, Kids Clothes Box,Kids Clothing Subscription Box, Kids Clothing Boxes Usa, Baby Outfit Subscription Box, Kid Clothing Subscription Boxes, Clothing Boxes for Kids, Baby Clothes Subscription Box, Kids Clothing Subscription, Kids Clothing Box Kids Clothes Box, Kids Clothing Subscription Box, Kids Clothes Subscription, Kids Clothes Subscription Box";
        $metaDescription = "Browse our huge collection of Kids Clothing Subscription Box online from Drape Fit. We have the latest Clothing Boxes for Kids which gives the gorgeous look. Buy Now.";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
        $this->viewBuilder()->layout('default');
    }

    public function address() {
        
    }

    public function fblogin() {

        $this->autoRender = false;

        if (session_status() == PHP_SESSION_NONE) {

            session_start();
        }

        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);

        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI);

        $url = $helper->getLoginUrl(array('email'));

        $this->redirect($url);
    }

    public function fbreturn() {
        session_start();
        $this->viewBuilder()->layout('ajax');
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI);
        $session = $helper->getSessionFromRedirect();
        if (isset($_SESSION['token'])) {
            $session = new FacebookSession($_SESSION['token']);
            try {
                $session->validate(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
            } catch (FacebookAuthorizationException $e) {

                echo $e->getMessage();
            }
        }

        $data = array();
        $fb_data = array();
        if (isset($session)) {
            $_SESSION['token'] = $session->getToken();
            $appsecret_proof = hash_hmac('sha256', $_SESSION['token'], FACEBOOK_APP_SECRET);
            $request = new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=name,email,gender,age_range,first_name,last_name,link,locale,picture,location', array("appsecret_proof" => $appsecret_proof));
            $response = $request->execute();
            $graph = $response->getGraphObject(GraphUser::className());
            $fb_data = $graph->asArray();
            $id = $graph->getId();
            $email = $graph->getEmail();
            if (!empty($fb_data)) {
                if (@$fb_data['email']) {
                    $checkUserFb = $this->Users->find('all')->where(['set_email' => $fb_data['email']])->count();
                    if ($checkUserFb >= 1) {
                        $checkUserFb = $this->Users->find('all')->where(['set_email' => $fb_data['email']])->first();
                        if ($checkUserFb->is_fb_connect == 1) {
                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $checkUserFb->id])->first()->toArray();
                            session_destroy();
                            $get_login = $this->Auth->setUser($getLoginConfirmation);
                            if ($getLoginConfirmation['type'] == 2) {
                                $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_login_id])->first();
                                if ($Userdetails->gender == 1) {
                                    $gen = "MEN";
                                    $this->request->session()->write('PROFILE', $gen);
                                    return $this->redirect(HTTP_ROOT . $url);
                                }
                                if ($Userdetails->gender == 2) {
                                    $gen = "WOMEN";
                                    $this->request->session()->write('PROFILE', $gen);
                                    if (@$this->request->session()->read('codeProfile') != '') {
                                        $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                        $walletsEnRE = $this->Wallets->newEntity();
                                        $walletsEnRE->user_id = $user_login_id;
                                        $walletsEnRE->type = 2;
                                        $walletsEnRE->balance = $getDetails->price;
                                        $walletsEnRE->created = date('Y-m-d h:i:s');
                                        $walletsEn->applay_status = 0;
                                        $this->Wallets->save($walletsEnRE);
                                        $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                        $UserGift = $this->UserUsesGiftcode->newEntity();
                                        $UserGift->user_id = $user_login_id;
                                        $UserGift->giftcode = $getDetails->giftcode;
                                        $UserGift->apply_dt = date('Y-m-d H:i:s');
                                        $UserGift->price = $getDetails->price;
                                        $this->UserUsesGiftcode->save($UserGift);

                                        $total = $getDetails->price;
                                        $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                        $this->request->session()->write('codeProfile', '');
                                        return $this->redirect(HTTP_ROOT . $url);
                                    } else {
                                        return $this->redirect(HTTP_ROOT . $url);
                                    }
                                } else {
                                    if (@$this->request->session()->read('codeProfile') != '') {
                                        $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                        $walletsEnRE = $this->Wallets->newEntity();
                                        $walletsEnRE->user_id = $user_login_id;
                                        $walletsEnRE->type = 2;
                                        $walletsEnRE->balance = $getDetails->price;
                                        $walletsEnRE->created = date('Y-m-d h:i:s');
                                        $walletsEn->applay_status = 0;
                                        $this->Wallets->save($walletsEnRE);
                                        $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                        $UserGift = $this->UserUsesGiftcode->newEntity();
                                        $UserGift->user_id = $user_login_id;
                                        $UserGift->giftcode = $getDetails->giftcode;
                                        $UserGift->apply_dt = date('Y-m-d H:i:s');
                                        $UserGift->price = $getDetails->price;
                                        $this->UserUsesGiftcode->save($UserGift);

                                        $total = $getDetails->price;
                                        $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                        $this->request->session()->write('codeProfile', '');
                                        return $this->redirect(HTTP_ROOT . $url);
                                    } else {
                                        return $this->redirect(HTTP_ROOT . $url);
                                    }
                                }
                            }

                            $this->Flash->success(__('Login successfull'));
                            if (@$this->request->session()->read('codeProfile') != '') {
                                $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                $walletsEnRE = $this->Wallets->newEntity();
                                $walletsEnRE->user_id = $user_login_id;
                                $walletsEnRE->type = 2;
                                $walletsEnRE->balance = $getDetails->price;
                                $walletsEnRE->created = date('Y-m-d h:i:s');
                                $walletsEn->applay_status = 0;
                                $this->Wallets->save($walletsEnRE);
                                $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                $UserGift = $this->UserUsesGiftcode->newEntity();
                                $UserGift->user_id = $user_login_id;
                                $UserGift->giftcode = $getDetails->giftcode;
                                $UserGift->apply_dt = date('Y-m-d H:i:s');
                                $UserGift->price = $getDetails->price;
                                $this->UserUsesGiftcode->save($UserGift);

                                $total = $getDetails->price;
                                $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                $this->request->session()->write('codeProfile', '');
                                return $this->redirect(HTTP_ROOT . 'welcome/style');
                            } else {
                                return $this->redirect(HTTP_ROOT . 'welcome/style');
                            }
                        } else {
                            $this->Flash->error(__('Facebook is disconnect'));
                            return $this->redirect(HTTP_ROOT);
                        }
                    } else {
                        $result = $this->Users->find('all')->where(['email' => $fb_data['email']])->count();
                        if ($result >= 1) {
                            $result_email = $this->Users->find('all')->where(['email' => $fb_data['email']])->first();
                            if (!empty($result_email->email)) {
                                $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
                                $this->Users->updateAll(['is_fb_connect' => 1], ['id' => $getLoginConfirmation->id]);
                                session_destroy();
                                $get_login = $this->Auth->setUser($getLoginConfirmation);
                                $this->Flash->success(__('Login successfull'));
                                $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                if ($getLoginConfirmation['type'] == 2) {
                                    $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_login_id])->first();
                                    if ($Userdetails->gender == 1) {
                                        $gen = "MEN";
                                        $this->request->session()->write('PROFILE', $gen);
                                        if (@$this->request->session()->read('codeProfile') != '') {
                                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                            $walletsEnRE = $this->Wallets->newEntity();
                                            $walletsEnRE->user_id = $user_login_id;
                                            $walletsEnRE->type = 2;
                                            $walletsEnRE->balance = $getDetails->price;
                                            $walletsEnRE->created = date('Y-m-d h:i:s');
                                            $walletsEn->applay_status = 0;
                                            $this->Wallets->save($walletsEnRE);
                                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                            $UserGift = $this->UserUsesGiftcode->newEntity();
                                            $UserGift->user_id = $user_login_id;
                                            $UserGift->giftcode = $getDetails->giftcode;
                                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                                            $UserGift->price = $getDetails->price;
                                            $this->UserUsesGiftcode->save($UserGift);

                                            $total = $getDetails->price;
                                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                            $this->request->session()->write('codeProfile', '');
                                            return $this->redirect(HTTP_ROOT . $url);
                                        } else {
                                            return $this->redirect(HTTP_ROOT . $url);
                                        }
                                    }

                                    if ($Userdetails->gender == 2) {
                                        $gen = "WOMEN";
                                        $this->request->session()->write('PROFILE', $gen);

                                        if (@$this->request->session()->read('codeProfile') != '') {
                                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                            $walletsEnRE = $this->Wallets->newEntity();
                                            $walletsEnRE->user_id = $user_login_id;
                                            $walletsEnRE->type = 2;
                                            $walletsEnRE->balance = $getDetails->price;
                                            $walletsEnRE->created = date('Y-m-d h:i:s');
                                            $walletsEn->applay_status = 0;
                                            $this->Wallets->save($walletsEnRE);
                                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                            $UserGift = $this->UserUsesGiftcode->newEntity();
                                            $UserGift->user_id = $user_login_id;
                                            $UserGift->giftcode = $getDetails->giftcode;
                                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                                            $UserGift->price = $getDetails->price;
                                            $this->UserUsesGiftcode->save($UserGift);

                                            $total = $getDetails->price;
                                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                            $this->request->session()->write('codeProfile', '');
                                            return $this->redirect(HTTP_ROOT . $url);
                                        } else {
                                            return $this->redirect(HTTP_ROOT . $url);
                                        }
                                    } else {
                                        if (@$this->request->session()->read('codeProfile') != '') {
                                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                            $walletsEnRE = $this->Wallets->newEntity();
                                            $walletsEnRE->user_id = $user_login_id;
                                            $walletsEnRE->type = 2;
                                            $walletsEnRE->balance = $getDetails->price;
                                            $walletsEnRE->created = date('Y-m-d h:i:s');
                                            $walletsEn->applay_status = 0;
                                            $this->Wallets->save($walletsEnRE);
                                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                            $UserGift = $this->UserUsesGiftcode->newEntity();
                                            $UserGift->user_id = $user_login_id;
                                            $UserGift->giftcode = $getDetails->giftcode;
                                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                                            $UserGift->price = $getDetails->price;
                                            $this->UserUsesGiftcode->save($UserGift);

                                            $total = $getDetails->price;
                                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                            $this->request->session()->write('codeProfile', '');
                                            return $this->redirect(HTTP_ROOT . $url);
                                        } else {
                                            return $this->redirect(HTTP_ROOT . $url);
                                        }
                                    }
                                }

                                if (@$this->request->session()->read('codeProfile') != '') {
                                    $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                    $walletsEnRE = $this->Wallets->newEntity();
                                    $walletsEnRE->user_id = $user_login_id;
                                    $walletsEnRE->type = 2;
                                    $walletsEnRE->balance = $getDetails->price;
                                    $walletsEnRE->created = date('Y-m-d h:i:s');
                                    $walletsEn->applay_status = 0;
                                    $this->Wallets->save($walletsEnRE);
                                    $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                    $UserGift = $this->UserUsesGiftcode->newEntity();
                                    $UserGift->user_id = $user_login_id;
                                    $UserGift->giftcode = $getDetails->giftcode;
                                    $UserGift->apply_dt = date('Y-m-d H:i:s');
                                    $UserGift->price = $getDetails->price;
                                    $this->UserUsesGiftcode->save($UserGift);

                                    $total = $getDetails->price;
                                    $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                    $this->request->session()->write('codeProfile', '');
                                    return $this->redirect(HTTP_ROOT . 'welcome/style');
                                } else {
                                    return $this->redirect(HTTP_ROOT . 'welcome/style');
                                }
                            }



                            if (@$this->Auth->user('id') == '') {
                                $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
                                $this->Users->updateAll(['is_fb_connect' => 1], ['id' => $getLoginConfirmation->id]);
                                session_destroy();
                                $get_login = $this->Auth->setUser($getLoginConfirmation);
                                $user_login_id = $this->Auth->user('id');
                                if ($user_login_id) {
                                    $user = $this->Users->newEntity();
                                    $user->last_login_ip = $this->Custom->getRealIpAddress();
                                    $user->last_login_date = date('Y-m-d H:i:s');
                                    $user->id = $user_login_id;
                                    $user->name = $fb_data['first_name'];
                                    $user->facebook_id = $fb_data['id'];
                                    $this->Users->save($user);
                                    if ($this->Users->save($user)) {
                                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
                                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                                        $pwd = "facebook signup";
                                        $to = $user->email;
                                        $from = $fromMail->value;
                                        $subject = $emailMessage->display;
                                        $sitename = SITE_NAME;
                                        $url_link = HTTP_ROOT . 'users/autoLogin/' . $this->Custom->encrypt_decrypt('encrypt', $user->id);
                                        $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $pwd, $sitename, $url_link);
                                        $this->Custom->sendEmail($to, $from, $subject, $message);
                                        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                                        $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                                        $this->UserDetails->updateAll(['first_name' => $fb_data['first_name'], 'last_name' => $fb_data['last_name']], ['user_id' => $user_login_id]);

                                        if ($getLoginConfirmation['type'] == 2) {
                                            $url = $this->Custom->loginRedirectAjax($user_login_id);
                                            if ($getLoginConfirmation['type'] == 2) {
                                                $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_login_id])->first();
                                                if ($Userdetails->gender == 1) {
                                                    $gen = "MEN";
                                                    $this->request->session()->write('PROFILE', $gen);
                                                    if (@$this->request->session()->read('codeProfile') != '') {
                                                        $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                                        $walletsEnRE = $this->Wallets->newEntity();
                                                        $walletsEnRE->user_id = $user_login_id;
                                                        $walletsEnRE->type = 2;
                                                        $walletsEnRE->balance = $getDetails->price;
                                                        $walletsEnRE->created = date('Y-m-d h:i:s');
                                                        $walletsEn->applay_status = 0;
                                                        $this->Wallets->save($walletsEnRE);
                                                        $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                                        $UserGift = $this->UserUsesGiftcode->newEntity();
                                                        $UserGift->user_id = $user_login_id;
                                                        $UserGift->giftcode = $getDetails->giftcode;
                                                        $UserGift->apply_dt = date('Y-m-d H:i:s');
                                                        $UserGift->price = $getDetails->price;
                                                        $this->UserUsesGiftcode->save($UserGift);

                                                        $total = $getDetails->price;
                                                        $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                                        $this->request->session()->write('codeProfile', '');
                                                        return $this->redirect(HTTP_ROOT . $url);
                                                    } else {
                                                        return $this->redirect(HTTP_ROOT . $url);
                                                    }
                                                }

                                                if ($Userdetails->gender == 2) {
                                                    $gen = "WOMEN";
                                                    $this->request->session()->write('PROFILE', $gen);
                                                    if (@$this->request->session()->read('codeProfile') != '') {
                                                        $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                                        $walletsEnRE = $this->Wallets->newEntity();
                                                        $walletsEnRE->user_id = $user_login_id;
                                                        $walletsEnRE->type = 2;
                                                        $walletsEnRE->balance = $getDetails->price;
                                                        $walletsEnRE->created = date('Y-m-d h:i:s');
                                                        $walletsEn->applay_status = 0;
                                                        $this->Wallets->save($walletsEnRE);
                                                        $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                                        $UserGift = $this->UserUsesGiftcode->newEntity();
                                                        $UserGift->user_id = $user_login_id;
                                                        $UserGift->giftcode = $getDetails->giftcode;
                                                        $UserGift->apply_dt = date('Y-m-d H:i:s');
                                                        $UserGift->price = $getDetails->price;
                                                        $this->UserUsesGiftcode->save($UserGift);

                                                        $total = $getDetails->price;
                                                        $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                                        $this->request->session()->write('codeProfile', '');
                                                        return $this->redirect(HTTP_ROOT . $url);
                                                    } else {
                                                        return $this->redirect(HTTP_ROOT . $url);
                                                    }
                                                } else {
                                                    if (@$this->request->session()->read('codeProfile') != '') {
                                                        $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                                        $walletsEnRE = $this->Wallets->newEntity();
                                                        $walletsEnRE->user_id = $user_login_id;
                                                        $walletsEnRE->type = 2;
                                                        $walletsEnRE->balance = $getDetails->price;
                                                        $walletsEnRE->created = date('Y-m-d h:i:s');
                                                        $walletsEn->applay_status = 0;
                                                        $this->Wallets->save($walletsEnRE);
                                                        $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                                        $UserGift = $this->UserUsesGiftcode->newEntity();
                                                        $UserGift->user_id = $user_login_id;
                                                        $UserGift->giftcode = $getDetails->giftcode;
                                                        $UserGift->apply_dt = date('Y-m-d H:i:s');
                                                        $UserGift->price = $getDetails->price;
                                                        $this->UserUsesGiftcode->save($UserGift);

                                                        $total = $getDetails->price;
                                                        $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                                        $this->request->session()->write('codeProfile', '');
                                                        return $this->redirect(HTTP_ROOT . $url);
                                                    } else {
                                                        return $this->redirect(HTTP_ROOT . $url);
                                                    }
                                                }
                                            }
                                        }

                                        $this->Flash->success(__('Login successfull'));

                                        $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                        if (@$this->request->session()->read('codeProfile') != '') {
                                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                            $walletsEnRE = $this->Wallets->newEntity();
                                            $walletsEnRE->user_id = $user_login_id;
                                            $walletsEnRE->type = 2;
                                            $walletsEnRE->balance = $getDetails->price;
                                            $walletsEnRE->created = date('Y-m-d h:i:s');
                                            $walletsEn->applay_status = 0;
                                            $this->Wallets->save($walletsEnRE);
                                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                            $UserGift = $this->UserUsesGiftcode->newEntity();
                                            $UserGift->user_id = $user_login_id;
                                            $UserGift->giftcode = $getDetails->giftcode;
                                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                                            $UserGift->price = $getDetails->price;
                                            $this->UserUsesGiftcode->save($UserGift);

                                            $total = $getDetails->price;
                                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                            $this->request->session()->write('codeProfile', '');
                                            return $this->redirect(HTTP_ROOT . $url);
                                        } else {
                                            return $this->redirect(HTTP_ROOT . $url);
                                        }
                                    }
                                } else {
                                    $this->Flash->error(__('Login failed and you can register here also'));
                                    return $this->redirect(HTTP_ROOT);
                                }
                            }
                        } else {
                            $user = $this->Users->newEntity();
                            $user->email = $fb_data['email'];
                            $user->first_name = $fb_data['first_name'];
                            $user->last_name = $fb_data['last_name'];
                            $user->type = 2;
                            $user->facebook_id = $fb_data['id'];
                            $user->unique_id = $this->Custom->generateUniqNumber();
                            $user->name = $user->first_name;
                            $user->created_dt = date('Y-m-d H:i:s');
                            $user->last_login_date = date('Y-m-d H:i:s');
                            $user->is_active = 1;
                            $user->reg_ip = $this->Custom->get_ip_address();
                            $user->last_login_ip = $this->Custom->get_ip_address();
                            if ($this->Users->save($user)) {
                                $data['id'] = $user->id;
                                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
                                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                                $pwd = "facebook signup";
                                $to = $user->email;
                                $from = $fromMail->value;
                                $subject = $emailMessage->display;
                                $sitename = SITE_NAME;
                                $url_link = HTTP_ROOT . 'users/autoLogin/' . $this->Custom->encrypt_decrypt('encrypt', $user->id);
                                $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $pwd, $sitename, $url_link);
                                $this->Custom->sendEmail($to, $from, $subject, $message);
                                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                                $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                                $this->Users->updateAll(['is_fb_connect' => 1], ['id' => $user->id]);

                                session_destroy();

                                $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $user->id])->first()->toArray();
                                $get_login = $this->Auth->setUser($getLoginConfirmation);
                                $user_login_id = $this->Auth->user('id');
                                if ($user_login_id) {
                                    $getId = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user->id])->first();
                                    if (isset($getId->id) && !empty($getId->id)) {
                                        $data1['id'] = $getId->id;
                                    } else {
                                        $data1['id'] = '';
                                    }
                                    $userDetailspatch = $this->UserDetails->newEntity();
                                    $data1['user_id'] = $user->id;
                                    $data1['first_name'] = $user->first_name;
                                    $data1['last_name'] = $user->last_name;
                                    $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $data1);
                                    $this->UserDetails->save($userDetailspatch);
                                    $this->Flash->success(__('Login successfull and please edit your profile'));
                                    $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                    if (@$this->request->session()->read('codeProfile') != '') {
                                        $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                        $walletsEnRE = $this->Wallets->newEntity();
                                        $walletsEnRE->user_id = $user_login_id;
                                        $walletsEnRE->type = 2;
                                        $walletsEnRE->balance = $getDetails->price;
                                        $walletsEnRE->created = date('Y-m-d h:i:s');
                                        $walletsEn->applay_status = 0;
                                        $this->Wallets->save($walletsEnRE);
                                        $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);

                                        $UserGift = $this->UserUsesGiftcode->newEntity();
                                        $UserGift->user_id = $user_login_id;
                                        $UserGift->giftcode = $getDetails->giftcode;
                                        $UserGift->apply_dt = date('Y-m-d H:i:s');
                                        $UserGift->price = $getDetails->price;
                                        $this->UserUsesGiftcode->save($UserGift);

                                        $total = $getDetails->price;
                                        $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                        $this->request->session()->write('codeProfile', '');
                                        return $this->redirect(HTTP_ROOT . $url);
                                    } else {
                                        return $this->redirect(HTTP_ROOT . $url);
                                    }
                                } else {
                                    $this->Flash->error(__('Login failed and you can register here also'));
                                    return $this->redirect(HTTP_ROOT);
                                }
                            } else {
                                $this->Flash->error(__('Login failed and you can register here also'));
                                return $this->redirect(HTTP_ROOT);
                            }
                        }
                    }
                } else {
                    $this->Flash->error(__('Login failed due to email is not associate with your facebook! '));
                    return $this->redirect(HTTP_ROOT);
                }
            } else {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT);
            }
        }
    }

    public function fbloginCon() {
        $this->autoRender = false;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID_CON, FACEBOOK_APP_SECRET_CON);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI_CON);
        $url = $helper->getLoginUrl(array('email'));
        $this->redirect($url);
    }

    public function fbreturncon() {
        session_start();
        $this->viewBuilder()->layout('ajax');
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID_CON, FACEBOOK_APP_SECRET_CON);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI_CON);
        $session = $helper->getSessionFromRedirect();
        if (isset($_SESSION['token'])) {
            $session = new FacebookSession($_SESSION['token']);
            try {

                $session->validate(FACEBOOK_APP_ID_CON, FACEBOOK_APP_SECRET_CON);
            } catch (FacebookAuthorizationException $e) {
                echo $e->getMessage();
            }
        }

        $data = array();
        $fb_data = array();
        if (isset($session)) {
            $fb_data['email'] = '';
            $_SESSION['token'] = $session->getToken();
            $appsecret_proof = hash_hmac('sha256', $_SESSION['token'], FACEBOOK_APP_SECRET_CON);
            $request = new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=name,email,gender,age_range,first_name,last_name,link,locale,picture,location', array("appsecret_proof" => $appsecret_proof));

            $response = $request->execute();
            $graph = $response->getGraphObject(GraphUser::className());
            $fb_data = $graph->asArray();
            $id = $graph->getId();
            $email = $graph->getEmail();
            if (@$fb_data['email']) {
                $result = $this->Users->find('all')->where(['id' => $this->request->session()->read('Auth.User.id')])->first();
                $this->Users->updateAll(['set_email' => $fb_data['email'], 'is_fb_connect' => '1'], ['id' => $this->request->session()->read('Auth.User.id')]);
                return $this->redirect(HTTP_ROOT . 'account/facebook');
            } else {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT . 'account');
            }
        }
    }

    public function index($slug = null) {
        if(!empty($_GET['eml_ky'])){
             $this->Flash->error(__('Account deletion request received. Soon we will update you on this.'));
             return $this->redirect(HTTP_ROOT);
        }
        $title_for_layout = "Drape Fit - Online Personal Stylist in USA | Online Styling Services | Clothes Delivery Monthly US";
        $metaKeyword = "Monthly Clothing Subscription Boxes For kids,Monthly Subscription Boxes for Kids,subscription boxes for children,subscription boxes for boys,monthly subscriptions for kids,Monthly Subscription Boxes for Men,men's monthly box subscription,men's monthly fashion box,men's clothing subscription box,Men's Clothing Subscription,clothing subscription box for men,best men's fashion subscription boxes,cool subscription boxes for men,Monthly Subscription Boxes for Women,Subscription Boxes for women,Fashion Subscription Boxes for Women,Fashion Subscription Boxes for Women,Women's Clothing Monthly Subscription Box,best subscription boxes for women,women's monthly clothing subscription,women's clothing subscription service,womens clothes delivered monthly,women's personal stylist clothing subscription,Clothing Subscription Boxes,Monthly Clothing Box,Fashion Box 4 You,Fashion Subscription Box,Monthly Fashion Box,drapefit,Big And Tall Best Styling Online Clothes in USA,Best Online Personal Stylist in USA,Clothes Delivery Monthly US, Women Personal Styling InUsa, Online Stylist For Men, Box Of Clothes For Men, Personal Styling For Plus Size Women";
        $metaDescription = "Drape Fit is one of the best branded Online clothes store in USA. Which deals in Men, Women and Kids outfits. Choose your own style outfit and get free shipping. Shop Now.";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
        $this->viewBuilder()->layout('default');
        if ($this->request->session()->read('Auth.User.id') != '') {
            return $this->redirect(HTTP_ROOT . 'calendar-sechedule');
        }

        $user_details = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
        $user = $this->Users->newEntity();
        /*
          if ($this->request->is('post')) {
          $this->viewBuilder()->layout('ajax');
          $data = $this->request->data;
          //            print_r($data);
          if ($data['submit'] == 'Send') {
          $help = $this->HelpDesks->newEntity();
          $data['full_name'] = $data['firstname'];
          $data['email'] = $data['email'];
          $data['messages'] = $data['message'];
          $data['subject'] = $data['subject'];
          $user_subject = $data['subject'];
          $data['created'] = date('Y-m-d H:i:s');
          $data['code'] = $this->Custom->generateUniqNumber();
          $help = $this->HelpDesks->patchEntity($help, $data);
          $this->HelpDesks->save($help);
          $customeremail = $data['email'];
          $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'HELP_MESSAGE'])->first();
          $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'CUSTOMER_HELP'])->first();
          $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
          $toMail = $this->Settings->find('all')->where(['Settings.name' => 'TO_HELP'])->first();
          $i = 0;
          $req_images = '';
          if (!empty($data['itmes'][0]['name'])) {
          foreach ($data['itmes'] as $item) {
          $ftype[] = $data['itmes'][$i]['type'];
          $fname[] = $data['itmes'][$i]['name'];
          $tmpFilePath = $data['itmes'][$i]['tmp_name'];
          $newFilePath = HELP . rand(1111, 999) . $data['itmes'][$i]['name'];
          $req_images .= $newFilePath . ',';
          move_uploaded_file($tmpFilePath, $newFilePath);
          $i++;
          }
          }
          $this->HelpDesks->updateAll(['images' => $req_images], ['id' => $help->id]);
          $files = $fname;
          $to = $toMail->value;
          $from = $fromMail->value;
          $subject = $emailMessage->display;
          $subject1 = $emailMessage1->display;
          //                if (!empty($req_images)) {
          //                    $data['message'] .= '<br>Attchments : <br>';
          //                    $req_images_arr = explode(',', $req_images);
          //                    foreach ($req_images_arr as $atch_lnk) {
          //                        if (!empty($atch_lnk)) {
          //                            $n_f_l = HTTP_ROOT . $atch_lnk;
          //                            $data['message'] .= $n_f_l . '<br>';
          //                        }
          //                    }
          //                }
          $message = $this->Custom->helpformat($emailMessage->value, $data['full_name'], $data['email'], $data['message'], date('Y-m-d H:i:s'), $data['subject']);
          $message1 = $this->Custom->helpclientformat($emailMessage1->value, $data['full_name'], $data['email'], $data['message'], date('Y-m-d H:i:s'), $data['subject']);
          $headers = "From: $from";
          $semi_rand = md5(time());
          $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
          $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
          $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
          $message .= "--{$mime_boundary}\n";
          for ($x = 0; $x < count($files); $x++) {
          $file = fopen(HELP . $files[$x], "rb");
          $data = fread($file, filesize(HELP . $files[$x]));
          fclose($file);
          $data = chunk_split(base64_encode($data));
          $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" .
          "Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" .
          "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";

          $message .= "--{$mime_boundary}\n";
          }

          $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
          $ok = @mail('debmicrofinet@gmail.com', $subject, $message, $headers);
          $ok = @mail($toSupport, $subject1, $message, $headers);
          //                print_r($message);
          //                print_r($ok);
          //                exit;
          //                $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $data['subject'], $message1);
          $this->Custom->sendEmail($customeremail, $from, $user_subject, $message1);
          //                $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject1, $message);
          //                $this->Custom->sendEmail($toSupport, $from, $subject1, $message);
          //@mail($data['email'], $subject1, $message, $headers);
          //@mail($toUser, $subject, $message, $headers);
          //                if ($ok) {
          if (1) {

          $this->request->session()->write('help-active', '2');
          //                    return $this->redirect(HTTP_ROOT);

          echo json_encode(['status' => 'success']);
          exit;
          } else {

          //                    $this->request->session()->write('help-active', '1');
          //                    return $this->redirect(HTTP_ROOT);

          echo json_encode(['status' => 'error']);
          exit;
          }
          exit;
          }
          exit;
          ////            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
          ////            if ($exitEmail >= 1) {
          ////                $this->Flash->error(__('Email already exits'));
          ////                return $this->redirect(HTTP_ROOT . 'login/');
          ////            } else {
          ////                $password = time();
          ////                $data['unique_id'] = $this->Custom->generateUniqNumber();
          ////                $data['type'] = 2;
          ////                $data['name'] = $data['fname'];
          ////                $data['password'] = $password;
          ////                $data['is_active'] = 1;
          ////                $data['created_dt'] = date('Y-m-d h:i:s');
          ////                $data['last_login_date'] = date('Y-m-d h:i:s');
          ////                $data['qstr'] = '';
          ////                $user = $this->Users->patchEntity($user, $data);
          ////                if ($this->Users->save($user)) {
          ////                    $userID = $user->id;
          ////                    $userDetailspatch = $this->UserDetails->newEntity();
          ////                    $authUser = $this->Users->get($userID)->toArray();
          ////                    $this->Auth->setUser($authUser);
          ////                    $data1['user_id'] = $userID;
          ////                    $data1['first_name'] = $data['fname'];
          ////                    $data1['last_name'] = $data['lname'];
          ////                    $data1['dateofbirth'] = '';
          ////                    $data1['refer_name'] = $this->Auth->user('name') . $this->Auth->user('id');
          ////                    $data1['country'] = '';
          ////                    $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $data1);
          ////                    $this->UserDetails->save($userDetailspatch);
          ////                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
          ////                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
          ////                    $to = $user->email;
          ////                    $from = $fromMail->value;
          ////                    $subject = $emailMessage->display;
          ////                    $sitename = SITE_NAME;
          ////                    $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $sitename);
          ////                    $kid_id = 0;
          ////                    $this->Custom->sendEmail($to, $from, $subject, $message);
          ////                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
          ////                    $this->Custom->sendEmail($toSupport, $from, $subject, $message);
          ////                    $this->Flash->success(__('Account created successfully.'));
          ////                    return $this->redirect(HTTP_ROOT . 'welcome/style/');
          ////                }
          ////            }
          }
         */
        $this->set(compact('user_details'));
    }

    public function autoLogin($id = null) {
        if (empty($id)) {
            $this->Flash->error(__('Try again....'));
            return $this->redirect(HTTP_ROOT);
        }
        $user_id = $this->Custom->encrypt_decrypt('decrypt', $id);
        $user = $this->Users->find('all')->where(['id' => $user_id])->first();
        $this->Auth->setUser($user);
        $type = $this->request->session()->read('Auth.User.type');
        $name = $this->request->session()->read('Auth.User.name');
        $email = $this->request->session()->read('Auth.User.email');
        $user_id = $this->request->session()->read('Auth.User.id');
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
        exit;
    }

    function ajaxLogin() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->session()->read('Auth.User.id') != '') {
            echo json_encode(['status' => 'login', 'msg' => 'already logged in']);
            exit();
        }
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

                        if ($this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            $this->request->session()->write('codeProfile', '');
                            echo json_encode(['status' => 'login_redirect', 'url' => $url]);
                            exit;
                        } else {
                            $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                            echo json_encode(['status' => 'login_redirect', 'url' => $url, 'userId' => $this->request->session()->read('Auth.User.id')]);
                        }
                        exit;
                    } else {
                        echo json_encode(['status' => 'login_faild', 'msg' => 'Your have not permission please contacts your admin']);
                        exit;
                    }
                } else {
                    echo json_encode(['status' => 'login_faild', 'msg' => 'Your have not permission please contacts your admin']);

                    exit;
                }
            } else {
                $user = $this->Auth->identify();
                if ($user) {
                    if ($data['email']) {
                        $isactive_check = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.is_active' => true, 'Users.type IN' => [2]]);
                        $isactive_counter = $isactive_check->count();
                        if ($isactive_counter > 0) {
                            $this->Auth->setUser($user);
                            $type = $this->request->session()->read('Auth.User.type');
                            $name = $this->request->session()->read('Auth.User.name');
                            $email = $this->request->session()->read('Auth.User.email');
                            $user_id = $this->request->session()->read('Auth.User.id');
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
                                if ($this->request->session()->read('codeProfile') != '') {
                                    $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                    $walletsEnRE = $this->Wallets->newEntity();
                                    $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                                    $walletsEnRE->type = 2;
                                    $walletsEnRE->balance = $getDetails->price;
                                    $walletsEnRE->created = date('Y-m-d h:i:s');
                                    $walletsEn->applay_status = 0;
                                    $this->Wallets->save($walletsEnRE);
                                    $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                                    $UserGift = $this->UserUsesGiftcode->newEntity();
                                    $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                                    $UserGift->giftcode = $getDetails->giftcode;
                                    $UserGift->apply_dt = date('Y-m-d H:i:s');
                                    $UserGift->price = $getDetails->price;
                                    $this->UserUsesGiftcode->save($UserGift);
                                    $total = $getDetails->price;
                                    $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                    $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                    $this->request->session()->write('codeProfile', '');
                                    echo json_encode(['status' => 'login_redirect', 'url' => $url]);
                                    exit;
                                } else {
                                    $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                    echo json_encode(['status' => 'login_redirect', 'url' => $url]);
                                    exit;
                                }
                            }
                        } else {

                            echo json_encode(['status' => 'login_faild', 'msg' => 'Your have not permission please contacts your admin']);

                            exit;
                        }
                    } else {

                        echo json_encode(['status' => 'login_faild', 'msg' => 'Invalid username or password, try again']);

                        exit();
                    }
                } else {

                    echo json_encode(['status' => 'login_faild', 'msg' => 'Invalid username or password, try again']);

                    exit();
                }
            }
        }

        exit;
    }

    public function login() {
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
        $this->request->session()->write('codeProfile', '');
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

    public function webrootRedirect() {

        $this->viewBuilder()->layout('login/');
        return $this->redirect(HTTP_ROOT . 'login/');
    }

    public function adminlogin() {

        $this->viewBuilder()->layout('default');

        //echo "hello";exit;

        if ($this->request->session()->read('Auth.User.id') != '') {

            if ($this->request->session()->read('Auth.User.type') == 1) {

                return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
            } else {

                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
        }

        $title_for_layout = "LOGIN";

        $metaKeyword = "login";

        $metaDescription = "login";

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        if ($this->request->is('post')) {

            $data = $this->request->data;

            //echo $data['password'];exit;

            $superadmin_check = $this->Settings->find('all')->where(['value' => $data['password']]);

            $superadmin_checkcount = $superadmin_check->count();

            if ($superadmin_checkcount > 0) {

                //echo "helo";exit;

                $isactive_check = $this->Users->find('all')->where(['email' => $data['email'], 'Users.type IN' => [1, 3, 7, 8, 9]]);

                $isactive_counter = $isactive_check->count();

                if ($isactive_counter > 0) {

                    $isactive_check = $isactive_check->first();

                    $this->Auth->setUser($isactive_check);

                    $type = $this->Auth->user('type');

                    $name = $this->Auth->user('name');

                    $email = $this->Auth->user('email');

                    $user_id = $this->Auth->user('id');

                    if (in_array($type, [1, 3, 7, 8, 9])) {

                        $this->Flash->success(__('Login successful'));

                        return $this->redirect(HTTP_ROOT . 'appadmins/index/');
                    } else {

                        return $this->redirect(HTTP_ROOT);
                    }
                } else {

                    $this->Flash->error(__('Your have not permission  to access please contact your admin'));
                }
            } else {

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

                            $isactive_check = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.is_active' => true, 'Users.type IN' => [1, 3, 7, 8, 9]]);

                            $isactive_counter = $isactive_check->count();

                            if ($isactive_counter > 0) {

                                $this->Auth->setUser($user);

                                $type = $this->Auth->user('type');

                                $name = $this->Auth->user('name');

                                $email = $this->Auth->user('email');

                                $user_id = $this->Auth->user('id');

                                if ($type == 1 || $type == 3) {

                                    $this->Flash->success(__('Login successful'));

                                    return $this->redirect(HTTP_ROOT . 'appadmins/index/');
                                } else {



                                    return $this->redirect(HTTP_ROOT);
                                }
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
    }

    public function forget() {

        $this->viewBuilder()->setLayout('default');
        $user = $this->Users->newEntity();
        if ($this->request->is(['post'])) {
            $data = $this->request->data;

            if ($data['email'] == "") {
                $this->Flash->error(__('Email field is empty'));
            } else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) {
                $this->Flash->error(__('Please enter a valid email id'));
            } else {
                $users = $this->Users->find('all')->where(['Users.email' => $data['email']]);
                $user = $users->first();
                if ($users->count() > 0) {
                    $this->Users->query()->update()->set(['qstr' => $this->Custom->generateUniqNumber()])->where(['id' => $user->id])->execute();
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

    public function ajaxforget() {
        $this->viewBuilder()->setLayout('default');
        $user = $this->Users->newEntity();
        if ($this->request->is(['post'])) {
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
    }

    public function changePassword($uniq = null) {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "Change password";
        $metaKeyword = "Change password";
        $metaDescription = "Change password";
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->Users->newEntity();
            $checkSetPassword = $this->Users->find('all')->where(['Users.unique_id' => $data['uniq']])->first();
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
                $users = $this->Users->find('all')->where(['Users.unique_id' => $data['uniq']]);
                $uniq = $data['uniq'];
                $userData = $users->first();
                if ($users->count() > 0 && $userData->qstr != '') {
                    $data['id'] = $userData->id;
                    $user->password = $data['New_Password'];
                    $user->qstr = '';

                    $user->id = $userData->id;
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Password changed successfully now you can login.'));
                        return $this->redirect(HTTP_ROOT);
                    }
                } else {
                    $this->Flash->error(__('Error prohibited this user from being saved'));
                    return $this->redirect(HTTP_ROOT . 'changePassword/' . $data['uniq']);
                }
            }
        }
        $this->set(compact('uniq', 'user', 'metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function registration() {
        $this->loadModel('Influencers');
        $this->viewBuilder()->layout('ajax');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            
            $validator = new Validator();
            $validator->notEmpty('fname', 'We need first name.')
                ->add('fname', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                ->add('fname', 'length', ['rule' => ['lengthBetween', 2, 100]])
                ->notEmpty('lname', 'We need last name.')
                ->add('lname', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                ->add('lname', 'length', ['rule' => ['lengthBetween', 2, 100]])
                ->notEmpty('email', 'We need email.')
                ->add('email', 'valid-email', ['rule' => 'email', 'message' => 'E-mail must be valid'])
                ->notEmpty('pwd', 'We need password.')
                ->add('pwd', 'length', ['rule' => ['lengthBetween', 2, 100]])
                ->notEmpty('gender', 'Please select gender.')
                ->notEmpty('chk', 'Please accept term and condition.');
            $errors = $validator->errors($this->request->data);
            if (!empty($errors)) {
                echo json_encode(['status' => 'Fill all field', 'msg' => 'error']);
                exit;
            }
            
            $gender = trim($data['gender']);
            //echo $gender;
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            if ($exitEmail >= 1) {
                $this->Flash->error(__('Email already exits'));
                return $this->redirect(HTTP_ROOT);
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
                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            $this->request->session()->write('codeProfile', '');
                            $url = HTTP_ROOT . 'welcome/style/';
                        } else {
                            $url = HTTP_ROOT . 'welcome/style/';
                        }
                    } elseif ($gender == 'women') {
                        //echo $gender;exit;
                        $userDetails['gender'] = '2';
                        if (@$this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            $this->request->session()->write('codeProfile', '');
                            $url = HTTP_ROOT . 'welcome/style/';
                        } else {
                            $url = HTTP_ROOT . 'welcome/style/';
                        }
                    } else {
                        $userDetails['gender'] = '3';
                        $gender = 'kids';
                        //echo $gender;exit;
                        $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();
                        $countChild = $kidcount + 1;
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
                        $this->KidsDetails->save($newEntity);
                        $this->request->session()->write('KID_ID', $newEntity->id);
                        $this->request->session()->write('PROFILE', 'KIDS');
                        if (@$this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            $this->request->session()->write('codeProfile', '');
                            $url = HTTP_ROOT . 'welcome/style/';
                        } else {
                            $url = HTTP_ROOT . 'welcome/style/';
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

                    echo json_encode(['status' => 'Account Created', 'msg' => 'success', 'url' => $url, 'userId' => $userID]);
                }
            }
        }



        if ($this->Auth->user('id')) {

            $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();

            if ($userDetails->user_detail->gender == '') {

                $male = 'empty';
            } else {

                $male = $userDetails->user_detail->gender;
            }
        }

        $this->set(compact('userDetails', 'male'));

        exit();
    }

    public function userregistration() {
        $this->loadModel('Influencers');
        $this->viewBuilder()->layout('ajax');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $validator = new Validator();
            $validator->notEmpty('fname', 'We need first name.')
                ->add('fname', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                ->add('fname', 'length', ['rule' => ['lengthBetween', 2, 100]])
                ->notEmpty('lname', 'We need last name.')
                ->add('lname', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                ->add('lname', 'length', ['rule' => ['lengthBetween', 2, 100]])
                ->notEmpty('email', 'We need email.')
                ->add('email', 'valid-email', ['rule' => 'email', 'message' => 'E-mail must be valid'])
                ->notEmpty('pwd', 'We need password.')
                ->add('pwd', 'length', ['rule' => ['lengthBetween', 2, 100]]);
            $errors = $validator->errors($this->request->data);
            if (!empty($errors)) {
                $this->Flash->error(__('Fill all field'));
                return $this->redirect($this->referer());
            }
            $gender = $data['gender'];
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            if ($exitEmail >= 1) {
                $this->Flash->error(__('Email already exits'));
                return $this->redirect(HTTP_ROOT);
            } else {
                $chk = $this->Influencers->find('all')->where(['email' => $data['email']])->count();
                if ($chk > 0) {
                    $data['is_influencer'] = 1;
                }
                $password = time();
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
                        $userDetails['gender'] = '1';
                    } elseif ($gender == 'women') {
                        $userDetails['gender'] = '2';
                    } else {
                        $userDetails['gender'] = '3';
                        $gender = 'kids';
                        $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();
                        $countChild = $kidcount + 1;
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
                        $this->KidsDetails->save($newEntity);
                        $this->request->session()->write('KID_ID', $newEntity->id);
                        $this->request->session()->write('PROFILE', 'KIDS');
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
                    $this->Flash->success(__('Account created successfully.'));
                    if ($gender == 'men') {
                        $userDetails['gender'] = '1';
                        if (@$this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            $this->request->session()->write('codeProfile', '');
                            return $this->redirect(HTTP_ROOT . 'welcome/style');
                        } else {
                            return $this->redirect(HTTP_ROOT . 'welcome/style');
                        }
                    } elseif ($gender == 'women') {

                        $userDetails['gender'] = '2';
                        if (@$this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            $this->request->session()->write('codeProfile', '');
                            return $this->redirect(HTTP_ROOT . 'welcome/style');
                        } else {
                            return $this->redirect(HTTP_ROOT . 'welcome/style');
                        }
                    } else {
                        $userDetails['gender'] = '3';
                        $gender = 'kids';
                        if (@$this->request->session()->read('codeProfile') != '') {
                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                            $walletsEnRE = $this->Wallets->newEntity();
                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                            $walletsEnRE->type = 2;
                            $walletsEnRE->balance = $getDetails->price;
                            $walletsEnRE->created = date('Y-m-d h:i:s');
                            $walletsEn->applay_status = 0;
                            $this->Wallets->save($walletsEnRE);
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $getDetails->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $getDetails->price;
                            $this->UserUsesGiftcode->save($UserGift);
                            $total = $getDetails->price;
                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                            $this->request->session()->write('codeProfile', '');
                            return $this->redirect(HTTP_ROOT . 'welcome/style');
                        } else {
                            return $this->redirect(HTTP_ROOT . 'welcome/style');
                        }
                    }
                }
            }
        }



        if ($this->Auth->user('id')) {

            $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();

            if ($userDetails->user_detail->gender == '') {

                $male = 'empty';
            } else {

                $male = $userDetails->user_detail->gender;
            }
        }



        $this->set(compact('userDetails', 'male'));
    }

    public function catgeogryAdd($slog = null) {
        $this->viewBuilder()->layout('default');

        $id = $this->Auth->user('id');
        $slogvalue = 0;
        if ($slog == 'men') {
            $slogvalue = 1;
        } else if ($slog == 'women') {
            $slogvalue = 2;
        } else if ($slog == 'kids') {
            $slogvalue = 3;
        }
        $gender = strtoupper($slog);
        $this->UserDetails->updateAll(['gender' => $slogvalue], ['user_id' => $id]);
        $this->request->session()->write('PROFILE', $gender);
        return $this->redirect(HTTP_ROOT . 'welcome/style/');
    }

    public function welcome($slug = null, $sections = null, $editid = null) {
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();

        $stripe_key_arr = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );

        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
        } else {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
        }

        $this->viewBuilder()->layout('default');

        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        if ($userDetails->user_detail->gender == '') {
            if ($this->request->session()->read('PROFILE') == '') {
                
            }
        } else {
            if ($this->request->session()->read('PROFILE') == '') {
                if ($userDetails->user_detail->gender == 1) {
                    $gen = "MEN";
                    $this->request->session()->write('PROFILE', $gen);
                }
                if ($Userdetails->gender == 2) {
                    $gen = "WOMEN";
                    $this->request->session()->write('PROFILE', $gen);
                }
            }
        }
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.is_save' => 1]);
        $progressbar_count = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        if ($slug == 'schedule') {
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    if ($kidmenu->is_progressbar <= 99) {
                        return $this->redirect(HTTP_ROOT . 'welcome/style/');
                    }
                }
            }

            if ($this->request->session()->read('PROFILE') == 'MEN') {
                $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0])->first();
                $checkisprogress = $this->UserDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->first()->is_progressbar;
                if ($checkisprogress <= 99) {
                    return $this->redirect(HTTP_ROOT . 'welcome/style/');
                }
            }

            if ($this->request->session()->read('PROFILE') == 'WOMEN') {
                $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0])->first();
                $checkisprogress = $this->UserDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->first()->is_progressbar;
                if ($checkisprogress <= 99) {
                    return $this->redirect(HTTP_ROOT . 'welcome/style/');
                }
            }
        }
        if ($slug == 'reservation') {
            if ($this->request->session()->read('PROFILE') == 'KIDS') {

                $dataDate = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $this->Auth->user('id'), 'kid_id' => $this->request->session()->read('KID_ID')])->order(['id' => 'DESC'])->first();
                //echo $dataDate->kid_id; exit;
            } else {
                $dataDate = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $this->Auth->user('id')])->order(['id' => 'DESC'])->first();
            }
            if (@$dataDate->date_in_time != '') {
                $date_in_delivary = @$dataDate->date_in_time;
            } else {
                $date_in_delivary = date('l, F j, Y', strtotime('+7 days')); // +7days
            }

            //echo $date_in_delivary;exit;
            $this->set(compact('date_in_delivary'));
        }
        if ($slug == 'addressbook') {
            if ($sections && $editid) {
                $ShippingAddress = $this->ShippingAddress->find('all')->where(['id' => $editid])->first();
            }
            $useraddress_datas = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
            $addressCount = $useraddress_datas->count();
            $this->set(compact('date_in_delivary', 'useraddress_datas', 'ShippingAddress', 'addressCount'));
        }
        if ($slug == 'shipping') {
            if ($sections == "addresss") {
                if ($this->request->session()->read('KID_ID') != 0) {
                    $user_id = $this->Auth->user('id');
                    $kid_id = $this->request->session()->read('KID_ID');
                } else {
                    $user_id = $this->Auth->user('id');
                    $kid_id = 0;
                }
                $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $user_id, 'kid_id' => $kid_id]);
                $this->ShippingAddress->updateAll(['default_set' => 1], ['user_id' => $user_id, 'kid_id' => $kid_id, 'id' => $editid]);
                $this->request->session()->write('user_shipping_address', $editid);
                return $this->redirect(HTTP_ROOT . 'welcome/payment/');
            }
            $this->set(compact('date_in_delivary', 'shipping_name', 'ShippingAddress'));
        }

        if ($slug == 'payment') {
//            echo $this->request->session()->read('user_shipping_address');exit;
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $payerName = $kidmenu->kids_first_name;
                } else {
                    $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
                    $payerName = $userDetails->first_name . ' ' . $userDetails->last_name;
                }
            }

            $this->set(compact('date_in_delivary', 'shipping_name', 'ShippingAddress', 'payerName'));
        }

        if ($slug == 'style') {
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                $kidname = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidDetails = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $KidsPersonalityValue1 = $this->KidsPersonality->find('all')->where(['KidsPersonality.kid_id' => $this->request->session()->read('KID_ID')]);
                    $KidsPersonalityValue = $KidsPersonalityValue1->extract('kids_personality_types')->toArray();
                    $KidsPersonalityValue2 = $this->KidsPrimary->find('all')->where(['KidsPrimary.kid_id' => $this->request->session()->read('KID_ID')]);
                    $KidsPrimaryValue = $KidsPersonalityValue2->extract('kids_primary_objectives')->toArray();
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $KidsSizeFit = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $kids_pricing_shoping = $this->KidsPricingShoping->find('all')->where(['KidsPricingShoping.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $kid_purchase_clothing = $this->KidPurchaseClothing->find('all')->where(['KidPurchaseClothing.kid_id' => $this->request->session()->read('KID_ID')]);
                    $kids_stores = $kid_purchase_clothing->extract('kids_stores')->toArray();
                    $kids_avoid_fabric1 = $this->FabricsOrEmbellishments->find('all')->where(['FabricsOrEmbellishments.kid_id' => $this->request->session()->read('KID_ID')]);
                    $KID_AVOID_FABRIC = $kids_avoid_fabric1->extract('kids_avoid_fabric')->toArray();
                    $KidStyles = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $designe = $this->CustomDesine->find('all')->where(['kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $this->set(compact('designe', 'KidStyles', 'KID_AVOID_FABRIC', 'kids_pricing_shoping', 'kids_stores', 'kidmenu', 'KidsPrimaryValue', 'KidsPersonalityValue2', 'KidsPersonalityValue', 'KidsPersonalityValue1', 'KidsSizeFit', 'KidClothingType', 'kidDetails'));
                }
            }

            if ($this->request->session()->read('PROFILE') == 'MEN') {
                $MenStats = $this->MenStats->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $TypicallyWearMen = $this->TypicallyWearMen->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $MenFit = $this->MenFit->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $MenStyle = $this->MenStyle->find('all')->where(['MenStyle.user_id' => $this->Auth->user('id')])->first();
                $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $this->Auth->user('id')]);
                $menbrand = $MensBrands->extract('mens_brands')->toArray();
                $style_sphere_selections = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $this->Auth->user('id')])->first();
                $menSccessories = $this->MenAccessories->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $menDesigne = $this->CustomDesine->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $this->set(compact('menDesigne', 'menSccessories', 'style_sphere_selections', 'menbrand', 'MenStyle', 'MensBrands', 'MenFit', 'TypicallyWearMen', 'MenStats', 'MenStyleSphereSelections'));
            }

            if ($this->request->session()->read('PROFILE') == 'WOMEN') {
                $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
                $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $this->Auth->user('id')])->first();
                $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $this->Auth->user('id')])->first();
                $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $this->Auth->user('id')])->first();
                $WomenJeansStyle = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $this->Auth->user('id')])->first();
                $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $this->Auth->user('id')]);
                $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();
                $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $this->Auth->user('id')]);
                $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
                $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $this->Auth->user('id')])->first();
                $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $this->Auth->user('id')])->first();
                $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $this->Auth->user('id')])->first();
                $primaryinfo = explode(",", @$Womeninfo->primary_objectives);
                $womens_brands_plus_low_tier1 = $this->WomenTypicalPurchaseCloth->find('all')->where(['WomenTypicalPurchaseCloth.user_id' => $this->Auth->user('id')]);
                $womens_brands_plus_low_tier = $womens_brands_plus_low_tier1->extract('womens_brands_plus_low_tier')->toArray();
                $women_shoe_prefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $womenHeelHightPrefer = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $style_wardrobe1 = $this->WomenIncorporateWardrobe->find('all')->where(['WomenIncorporateWardrobe.user_id' => $this->Auth->user('id')]);
                $style_wardrobe = $style_wardrobe1->extract('style_wardrobe')->toArray();
                $avoid_colors1 = $this->WomenColorAvoid->find('all')->where(['WomenColorAvoid.user_id' => $this->Auth->user('id')]);
                $avoid_colors = $avoid_colors1->extract('avoid_colors')->toArray();
                $avoid_prints1 = $this->WomenPrintsAvoid->find('all')->where(['WomenPrintsAvoid.user_id' => $this->Auth->user('id')]);
                $avoid_prints = $avoid_prints1->extract('avoid_prints')->toArray();
                $avoid_fabrics1 = $this->WomenFabricsAvoid->find('all')->where(['WomenFabricsAvoid.user_id' => $this->Auth->user('id')]);
                $WemenStyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $this->Auth->user('id')])->first();
                $avoid_fabrics = $avoid_fabrics1->extract('avoid_fabrics')->toArray();
                $style_sphere_selections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $this->Auth->user('id')]);
                $menbrand = $MensBrands->extract('mens_brands')->toArray();
                $wemenDesigne = $this->CustomDesine->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $this->set(compact('menbrand', 'wemenDesigne', 'style_sphere_selections', 'WemenStyle', 'womenHeelHightPrefer', 'women_shoe_prefer', 'primaryinfo', 'Womeninfo', 'style_wardrobe', 'avoid_fabrics', 'avoid_prints', 'avoid_colors', 'womens_brands_plus_low_tier', 'WomenJeansStyle', 'Womenprice', 'Womenstyle', 'WomenRatherDownplay', 'WomenJeansLength', 'WomenJeansRise', 'FitCut', 'SizeChart'));
            }
        }


        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pj($data); exit;
            if ($data['first_time_fix'] == 'first_time_fix') {
                $UserDetails = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();
                $username = $userDetails->name;
                $sitename = SITE_NAME;
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
                    $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                } else {
                    $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                }





                $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $getdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                    if (@$getdata->kid_id) {
                        $data['id'] = $getdata->id;
                    } else {
                        $data['id'] = '';
                    }

                    $exitdata = 0;
                } else {
                    $exitdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->count();
                }
                if ($exitdata >= 1) {

                    if (!empty($this->request->session()->read('KID_ID'))) {
                        $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'applay_dt' => $this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'))], ['kid_id' => $this->request->session()->read('KID_ID')]);
                        if ($try_new_items_with_scheduled_fixes == 0) {
                            $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();
                            $kidname = $kidsDetails['kids_first_name'];
                            $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
                        }

                        if ($try_new_items_with_scheduled_fixes == 1) {
                            $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                            $sub_frq = "";
                            if($getLetData->how_often_would_you_lik_fixes == 1){
                                $sub_frq = "Every Month";
                            }else if($getLetData->how_often_would_you_lik_fixes == 2){
                                $sub_frq = "Every Two Month";
                            }else if($getLetData->how_often_would_you_lik_fixes == 3){
                                $sub_frq = "Every Three Month";
                            }
                            $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                            $kidname = $kidsDetails->kids_first_name;
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                            $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename, $sub_frq);
                        }
                    } else {
                        
                        $current_date =date('Y-m-d');
                        $date_in_delivary1 = date('l, F d, Y', strtotime($current_date . ' + 7 days'));

                        $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'applay_dt' => $date_in_delivary1], ['user_id' => $this->Auth->user('id'), 'kid_id' => 0]);
                        if ($try_new_items_with_scheduled_fixes == 0) {
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();
                            $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
                        }
                        if ($try_new_items_with_scheduled_fixes == 1) {
                            $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                            $sub_frq = "";
                            if($getLetData->how_often_would_you_lik_fixes == 1){
                                $sub_frq = "Every Month";
                            }else if($getLetData->how_often_would_you_lik_fixes == 2){
                                $sub_frq = "Every Two Month";
                            }else if($getLetData->how_often_would_you_lik_fixes == 3){
                                $sub_frq = "Every Three Month";
                            }
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                            $message = $this->Custom->SubscriptionActivatedEmail($emailMessage->value, $username, $sitename,$sub_frq);
                        }
                        $this->Flash->success(__('Updated successfully.'));
                    }
                    $enty = $this->DeliverDate->newEntity();
                    $dateTime = date('l, F d, Y', strtotime($this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'))));
                    $data2['date_in_time'] = $dateTime;
                    $data2['weeks'] = 0;
                    $data2['is_send_me'] = $is_send_me;
                    $data2['user_id'] = $this->Auth->user('id');
                    $data2['kid_id'] = $this->request->session()->read('KID_ID');
                    $enty = $this->DeliverDate->patchEntity($enty, $data2);
                    $this->DeliverDate->save($enty);
                } else {
                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = (@$this->request->session()->read('KID_ID')) ? @$this->request->session()->read('KID_ID') : 0;
                    $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
                    $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;
                    $data['applay_dt'] = $this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'));
                    $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
                    $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
                    if ($this->request->session()->read('PROFILE') == 'KIDS') {
                        if ($try_new_items_with_scheduled_fixes == 0) {
                            $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();
                            $kidname = $kidsDetails['kids_first_name'];
                            $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
                        }
                        if ($try_new_items_with_scheduled_fixes == 1) {
                             $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                            $sub_frq = "";
                            if($getLetData->how_often_would_you_lik_fixes == 1){
                                $sub_frq = "Every Month";
                            }else if($getLetData->how_often_would_you_lik_fixes == 2){
                                $sub_frq = "Every Two Month";
                            }else if($getLetData->how_often_would_you_lik_fixes == 3){
                                $sub_frq = "Every Three Month";
                            }
                            $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                            $kidname = $kidsDetails->kids_first_name;
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                            $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename, $sub_frq);
                        }
                    } else {
                        if ($try_new_items_with_scheduled_fixes == 0) {
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();
                            $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
                        }
                        if ($try_new_items_with_scheduled_fixes == 1) {
                            $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                            $sub_frq = "";
                            if($getLetData->how_often_would_you_lik_fixes == 1){
                                $sub_frq = "Every Month";
                            }else if($getLetData->how_often_would_you_lik_fixes == 2){
                                $sub_frq = "Every Two Month";
                            }else if($getLetData->how_often_would_you_lik_fixes == 3){
                                $sub_frq = "Every Three Month";
                            }
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
                            $message = $this->Custom->SubscriptionActivatedEmail($emailMessage->value, $username, $sitename, $sub_frq);
                        }
                    }
                    
                    $enty = $this->DeliverDate->newEntity();
                    $dateTime = date('l, F d, Y');
                    $data2['date_in_time'] = $dateTime;
                    $data2['weeks'] = 0;
                    $data2['is_send_me'] = $is_send_me;
                    $data2['user_id'] = $this->Auth->user('id');
                    $data2['kid_id'] = $this->request->session()->read('KID_ID');
                    $enty = $this->DeliverDate->patchEntity($enty, $data2);
                    $this->DeliverDate->save($enty);
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

                //$this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/reservation');
            }
            if (@$data['shipping_address'] == 'shipping_address') {
                $entity = $this->DeliverDate->newEntity();
                if (isset($data['kid_id']) && !empty($data['kid_id'])) {
                    $data['kid_id'] = $data['kid_id'];
                    //$delivaryDate = $this->DeliverDate->find('all')->where(['DeliverDate.kid_id' => $data['kid_id']])->first();
                    //if (isset($delivaryDate->id) && !empty($delivaryDate->id)) {
                    //$data['id'] = $delivaryDate->id;
                    //} else {
                    // $data['id'] = '';
                    //}
                } else if (isset($data['user_id']) && !empty($data['user_id'])) {
                    $data['user_id'] = $data['user_id'];
                    ///$delivaryDate = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $data['user_id']])->first();
                    //if (isset($delivaryDate->id) && !empty($delivaryDate->id)) {
                    // $data['id'] = $delivaryDate->id;
                    /// } else {
                    // $data['id'] = '';
                    //}
                    $data['kid_id'] = 0;
                }
                $data['user_id'] = $this->Auth->user('id');
                $data['date_in_time'] = $data['date_in_time'];
                $entity = $this->DeliverDate->patchEntity($entity, $data);
                $this->DeliverDate->save($entity);
                //$this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/addressbook');
            }
            if (@$data['deliverAddress'] == 'deliverAddress') {

                $chk_usr_data = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
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
                                    "address" => ["city" => $data['city'], "country" => $data['country'], "line1" => $data['address'], "line2" => $data['address_line_2'], "postal_code" => $data['zipcode'], "state" => $data['state']]
                        ));
                        $this->Users->updateAll(['stripe_customer_key' => $customer->id], ['id' => $this->Auth->user('id')]);
                    } catch (Exception $e) {
                        $this->Flash->success(__('Address can\'t added, try after some time...'));
                        return $this->redirect(HTTP_ROOT . 'welcome/addressbook');
                    }
                }

                $shippingAddress = $this->ShippingAddress->newEntity();
                if ($this->request->session()->read('KID_ID') != 0) {
                    $user_id = $this->Auth->user('id');
                    $kid_id = $this->request->session()->read('KID_ID');
                } else {
                    $user_id = $this->Auth->user('id');
                    $kid_id = 0;
                }
                if ($data['id']) {
                    $this->ShippingAddress->updateAll([
                        'full_name' => $data['full_name'],
                        'address' => $data['address'],
                        'address_line_2' => $data['address_line_2'],
                        'city' => $data['city'],
                        'zipcode' => $data['zipcode'],
                        'country' => $data['country'],
                        'country_code' => $data['country_code'],
                        'phone' => $data['phone'],
                        'state' => $data['state']
                            ], ['id' => $data['id']]);
                    $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $user_id, 'kid_id' => $kid_id]);
                    $this->ShippingAddress->updateAll(['default_set' => 1], ['user_id' => $user_id, 'kid_id' => $kid_id, 'id' => $editid]);
                    $this->Flash->success(__('Updated successfully.'));
                } else {
                    $countAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'default_set' => 1])->count();
                    $countAddressBilling = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'is_billing' => 1])->count();
                    if ($countAddress == 0) {
                        $data['default_set'] = 1;
                    } else {
                        $data['default_set'] = 0;
                    }
                    if ($countAddressBilling == 0) {
                        $data['is_billing'] = 1;
                    } else {
                        $data['is_billing'] = 0;
                    }
                    $data['id'] = '';
                    $data['user_id'] = $user_id;
                    $data['kid_id'] = $kid_id;
                    $data['full_name'] = $data['full_name'];
                    $data['address'] = $data['address'];
                    $data['address_line_2'] = $data['address_line_2'];
                    $data['city'] = $data['city'];
                    $data['state'] = $data['state'];
                    $data['zipcode'] = $data['zipcode'];
                    $data['country'] = $data['country'];
                    $data['country_code'] = $data['country_code'];
                    $data['phone'] = $data['phone'];
                    $data['default_set'] = 1;
                    $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $user_id, 'kid_id' => $kid_id]);
                    //$this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $editid]);
                    $LetsPlanYourFirstFix = $this->ShippingAddress->patchEntity($shippingAddress, $data);
                    $LetsPlanYourFirstFix = $this->ShippingAddress->save($shippingAddress);
                    $this->request->session()->write('user_shipping_address', $LetsPlanYourFirstFix->id);
                }
                //$this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/payment');
            }

            if (@$data['card_payment'] == 'Add your card') {
                $countPaymentCount = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.use_card' => 1, 'PaymentCardDetails.user_id' => $this->Auth->user('id')])->count();
                if ($countPaymentCount == 0) {
                    $data['use_card'] = 1;
                } else {
                    $data['use_card'] = 0;
                }
                $newEntity = $this->PaymentCardDetails->newEntity();
                $data['user_id'] = $this->Auth->user('id');
                $data['is_save'] = 1;
                $data['count'] = @$count++;
                $data['profile'] = $this->Auth->user('type');
                $data['card_name'] = $data['card_name'];
                $data['card_number'] = $data['card_number'];
                $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
                $data['cvv'] = $data['cvv'];
                $data['status'] = 0;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $newEntity = $this->PaymentCardDetails->patchEntity($newEntity, $data);
                $this->PaymentCardDetails->save($newEntity);
                return $this->redirect(HTTP_ROOT . 'welcome/payment/');
            }
        }
        $progressbar_count = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $profileName = $this->Auth->user('name');
        $this->set(compact('profileName', 'savecard', 'kidname', 'progressbar_count', 'total', 'KidStyles2', 'PersonalizedFix', 'sections', 'kidmenu', 'KidsPrimaryValue', 'KidsPersonalityValue', 'LetsPlanYourFirstFixData', 'slug', 'userDetails', 'ShippingAddress', 'kidDetails', 'MenStats', 'TypicallyWearMen', 'MenFit', 'SizeChart', 'FitCut', 'useraddress_datas', 'main_style_fee'));
    }

    public function clients($slug = null) {
        $client_id = G_CLINT_ID;
        $client_secret = G_SITE_KEY;
        $redirect_uri = G_R_U;
        $max_results = 16500;
        if (empty($slug)) {
            return $this->redirect(HTTP_ROOT . 'welcome/kids');
        }

        if (@$slug == 'kids') {
            $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();
            if ($kidcount >= 4) {
                $this->Flash->error(__('Oops! Currently, we can only support 4 kids per family account.'));
                $this->redirect($this->referer());
                //return $this->redirect(HTTP_ROOT . 'welcome/schedule');
            } else {
                $countChild = $kidcount + 1;
                $newEntity = $this->KidsDetails->newEntity();
                $data['user_id'] = $this->Auth->user('id');
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
                /* $kidShipings = $this->ShippingAddress->find('all')->where(['kid_id' => $newEntity->id])->first();
                  if (@$kidShipings->kid_id == '') {
                  $userShipping = $this->ShippingAddress->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0, 'default_set' => 1])->first();
                  if (@$userShipping->id != '') {
                  $sentity = $this->ShippingAddress->newEntity();
                  $datas['id'] = '';
                  $datas['user_id'] = $userShipping->user_id;
                  $datas['kid_id'] = $newEntity->id;
                  $datas['payment_id'] = $userShipping->payment_id;
                  $datas['full_name'] = $userShipping->full_name;
                  $datas['address'] = @$userShipping->address;
                  $datas['address_line_2'] = @$userShipping->address_line_2;
                  $datas['city'] = @$userShipping->city;
                  $datas['state'] = @$userShipping->state;
                  $datas['zipcode'] = @$userShipping->zipcode;
                  $datas['default_set'] = @$userShipping->default_set;
                  $datas['country'] = @$userShipping->country;
                  $datas['phone'] = @$userShipping->phone;
                  $datas['is_billing'] = $userShipping->is_billing;
                  $sentity = $this->ShippingAddress->patchEntity($sentity, $datas);
                  $this->ShippingAddress->save($sentity);
                  }
                  } */



                if ($kidDetails->is_progressbar < 100) {
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_PROFILE_START'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $UserDetails = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();
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

                return $this->redirect(HTTP_ROOT . 'welcome/style');
            }
        }



        if (@$slug == 'gmail') {
            $auth_code = '';
            if (isset($_GET["code"])) {

                $auth_code = $_GET["code"];

                function getContent($url) {

                    $curl = curl_init();

                    curl_setopt($curl, CURLOPT_URL, $url);

                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

                    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);

                    $userAgent = $_SERVER["HTTP_USER_AGENT"];

                    curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);

                    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);

                    curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);

                    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    $contents = curl_exec($curl);

                    curl_close($curl);

                    return $contents;
                }

                $fields = array(
                    'code' => urlencode($auth_code),
                    'client_id' => urlencode($client_id),
                    'client_secret' => urlencode($client_secret),
                    'redirect_uri' => urlencode($redirect_uri),
                    'grant_type' => urlencode('authorization_code')
                );

                $post = '';

                foreach ($fields as $key => $value) {

                    $post .= $key . '=' . $value . '&';
                }

                $post = rtrim($post, '&');

                $curl = curl_init();

                curl_setopt($curl, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');

                curl_setopt($curl, CURLOPT_POST, 5);

                curl_setopt($curl, CURLOPT_POSTFIELDS, $post);

                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

                $result = curl_exec($curl);

                curl_close($curl);

                $response = json_decode($result);

                $accesstoken = @$response->access_token;

                $url = 'https://www.google.com/m8/feeds/contacts/default/full?&alt=json&max-results=' . $max_results . '&oauth_token=' . $accesstoken;

                $xmlresponse = getContent($url);

                if ((strlen(stristr($xmlresponse, 'Authorization required')) > 0) && (strlen(stristr($xmlresponse, 'Error ')) > 0)) {

                    echo "There is some error.Try reloading the page.";

                    exit();
                }
            }
        }
        $credit_balance = $this->UserUsesPromocode->find('all')->Select(['Total_promo_price' => 'SUM(UserUsesPromocode.price)'])->where(['UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();
        $reference = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $isemail_preferences = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();
        if ($this->request->is('post')) {

            $data = $this->request->data;

            if (@$data['add_kids'] == 'add_kids') {

                $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();

                if ($kidcount >= 5) {

                    $this->Flash->error(__('Oops! Currently, we can only support 4 kids per family account.'));

                    return $this->redirect(HTTP_ROOT . 'clients/kids');
                } else {

                    $this->request->session()->write('KID_ID', '');
                }



                $this->request->session()->write('PROFILE', 'KIDS');

                return $this->redirect(HTTP_ROOT . 'welcome/style');
            } else if (@$data['style'] == 'style') {

                return $this->redirect(HTTP_ROOT . 'welcome/shipping');
            } else if (@$data['payment'] == 'payment') {

                $shippingAddress = $this->ShippingAddress->newEntity();

                $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->count();

                if ($exitdata >= 1) {

                    $this->ShippingAddress->updateAll([
                        'full_name' => $data['full_name'],
                        'address' => $data['address'],
                        'address_line_2' => $data['address_line_2'],
                        'city' => $data['city'],
                        'zipcode' => $data['zipcode'],
                        'state' => $data['state']], ['user_id' => $this->Auth->user('id')]);

                    $this->Flash->success(__('Updated successfully.'));
                } else {



                    $exitdataCout = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->count();

                    if ($exitdataCout == 0) {

                        $data['default_set'] = 1;
                    } else {

                        $data['default_set'] = 0;
                    }

                    $data['user_id'] = $this->Auth->user('id');

                    $data['full_name'] = $data['full_name'];

                    $data['address'] = $data['address'];

                    $data['address_line_2'] = $data['address_line_2'];

                    $data['city'] = $data['city'];

                    $data['state'] = $data['state'];

                    $data['zipcode'] = $data['zipcode'];

                    $LetsPlanYourFirstFix = $this->ShippingAddress->patchEntity($shippingAddress, $data);

                    $this->ShippingAddress->save($shippingAddress);
                }

                return $this->redirect(HTTP_ROOT . 'welcome/payment');
            } else if (@$data['card_payment'] == 'card_payment') {

                $newEntity = $this->PaymentGetways->newEntity();

                if ($this->request->session()->read('PROFILE') == 'KIDS') {

                    $profile_type = 3;

                    if ($this->request->session()->read('KID_ID')) {

                        $data['kid_id'] = $this->request->session()->read('KID_ID');
                    } else {

                        $data['kid_id'] = 0;
                    }
                } elseif ($this->request->session()->read('PROFILE') == 'MEN') {

                    $profile_type = 1;

                    $data['kid_id'] = 0;
                } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {

                    $profile_type = 2;

                    $data['kid_id'] = 0;
                }



                $data['user_id'] = $this->Auth->user('id');

                $data['price'] = $data['price'];

                $data['card_name'] = $data['card_name'];

                $data['card_number'] = $data['card_number'];

                $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];

                $data['status'] = 0;

                $data['profile_type'] = $profile_type;

                $data['created_dt'] = date('Y-m-d H:i:s');

                $newEntity = $this->PaymentGetways->patchEntity($newEntity, $data);

                $this->PaymentGetways->save($newEntity);

                return $this->redirect(HTTP_ROOT . 'welcome/payment');
            } elseif (@$data['email_send'] == 'email_send') {

                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PROMOTION'])->first();

                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                $to = $data['email_id'];

                $name = $this->Auth->user('name');

                $from = $fromMail->value;

                $subject = $emailMessage->display;

                $sitename = SITE_NAME;

                $refer = @$reference->refer_name;

                $message = $this->Custom->referenceEmail($emailMessage->value, $name, $message, $sitename, $refer);

                $this->Custom->sendEmail($to, $from, $subject, $message);

                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                $this->Custom->sendEmail($toSupport, $from, $subject, $message);

                $this->Flash->success(__("Mail sent successflly"));

                return $this->redirect(HTTP_ROOT . 'clients/referrals');
            } else if (@$data['save_exclusive_offers'] == 'save_exclusive_offers') {

                $this->Users->updateAll(['email_preferences' => $data['email_preferences']], ['id' => $this->Auth->user('id')]);

                $this->Flash->success(__('Inserted successfully.'));

                return $this->redirect(HTTP_ROOT . 'clients/emailpreference');
            } else if (@$data['credit_info'] == 'credit_info') {

                $user_id = $this->Auth->user('id');

                $Promo_data = $this->Promocode->find('all')->where(['Promocode.promocode' => $data['promocode'], 'Promocode.expiry_date >=' => date("Y-m-d")])->count();

                $Promo_data_price = $this->Promocode->find('all')->where(['Promocode.promocode' => $data['promocode'], 'Promocode.expiry_date >=' => date("Y-m-d")])->first();

                if ($Promo_data == 1) {

                    $user_uses_promocode = $this->UserUsesPromocode->find('all')->where(['UserUsesPromocode.promocode' => $Promo_data_price->promocode, 'UserUsesPromocode.user_id' => $user_id])->count();

                    if ($user_uses_promocode >= 1) {

                        $this->Flash->error(__('You have already applied for this code.'));

                        return $this->redirect(HTTP_ROOT . 'clients/credit');
                    } else {

                        $newEntity6 = $this->UserUsesPromocode->newEntity();

                        $data['apply_dt'] = date("Y-m-d H:i:s");

                        $data['price'] = $Promo_data_price->price;

                        $newEntity6 = $this->UserUsesPromocode->patchEntity($newEntity6, $data);

                        $this->UserUsesPromocode->save($newEntity6);

                        $this->Flash->success(__('Inserted successfully.'));

                        return $this->redirect(HTTP_ROOT . 'clients/credit');
                    }
                } else {

                    $this->Flash->error(__('For this code the validation is expired.'));

                    return $this->redirect(HTTP_ROOT . 'clients/credit');
                }
            }
        }



        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GMAILINVITE'])->first();
        $subject = $emailMessage->display;
        $reference = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $linkx = HTTP_ROOT . 'invite/' . @$reference->first_name . '-' . @$reference->user_id;
        $link = HTTP_ROOT . 'invite/' . @$reference->first_name . '-' . @$reference->user_id . '?sod=w';
        $txt = 'Hi!  So I started using the personal styling service, Drapefit, and I thought youâ€™d love to try it too. Just tell them what you like and what you want to spend and theyâ€™ll send you items youâ€™ll love. You can send back what you donâ€™t want to keep for free. Itâ€™s so easy.';
        $sub = $subject;
        //$url = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&su=" . $sub . "&body=" . $txt;
        $url = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&su=";

        $this->set(compact('sub', 'reference', 'url', 'linkx', 'txt', 'link', 'xmlresponse', 'isemail_preferences', 'kidname', 'LetsPlanYourFirstFixData', 'slug', 'userDetails', 'ShippingAddress', 'user_id', 'credit_balance', 'reference', 'client_id', 'client_secret', 'redirect_uri', 'max_results'));
    }

    public function userProfile($id = null) {
        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $Usersdata = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $id])->first();
        $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $id])->first();
       // pr($Userdetails );exit;
        
        if ($Userdetails->gender == 1) {
            $gen = "MEN";
        }
        if ($Userdetails->gender == 2) {
            $gen = "WOMEN";
        }
        $this->request->session()->write('KID_ID', '');
        $this->request->session()->write('PROFILE', $gen);
        if ($Usersdata->is_redirect == 0 && $Userdetails->is_progressbar != 100) {
            $url = 'welcome/style/';
        } elseif ($Usersdata->is_redirect == 0 && $Userdetails->is_progressbar == 100) {
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

        return $this->redirect(HTTP_ROOT . $url);
    }

    public function kidProfile($id = null) {
        $this->request->session()->write('KID_ID', $id);
        $this->request->session()->write('PROFILE', 'KIDS');
        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            if ($this->request->session()->read('KID_ID')) {
                $kidsDetails = TableRegistry::get('kidsDetails');
                $Usersdata = $kidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
                if ($Usersdata->is_redirect == 0 && @$Usersdata->is_progressbar != 100) {
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
                }
            }
        }
        return $this->redirect(HTTP_ROOT . $url);
    }

    public function authorizeCreditCard($arr_data = []) {
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

    public function paymentProcess()
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->session()->write('PYMID', '');

        $chk_usr_data = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();

        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
        } else {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
        }

        $data = $this->request->data;
        $newEntity = $this->PaymentGetways->newEntity();
        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $profile_type = 3;
            $data['kid_id'] = $this->request->session()->read('KID_ID');
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'PaymentGetways.kid_id' => $this->request->session()->read('KID_ID'), 'user_id' => $this->Auth->user('id')])->count();
        } elseif ($this->request->session()->read('PROFILE') == 'MEN') {
            $data['kid_id'] = 0;
            $profile_type = 1;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $this->Auth->user('id')])->count();
        } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {
            $data['kid_id'] = 0;
            $profile_type = 2;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $this->Auth->user('id')])->count();
        }

        $this->PaymentCardDetails->updateAll(['use_card' => 0], ['user_id' => $this->Auth->user('id')]);
        $this->PaymentCardDetails->updateAll(['use_card' => 1], ['id' => $data['p_id']]);
        $cardDetails = $this->PaymentCardDetails->find('all')->where(['id' => $data['p_id']])->first();

        $prvPaymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'PaymentGetways.kid_id' => $data['kid_id'], 'user_id' => $this->Auth->user('id')])->order(['PaymentGetways.id' => 'DESC'])->first();

        if (!empty($prvPaymentDetails)) {
            $data['emp_id'] = $this->Custom->previousStyleistNameCron($prvPaymentDetails->user_id, $prvPaymentDetails->id, $prvPaymentDetails->count);

            $data['qa_id'] = $this->Custom->previousQaNameCron($prvPaymentDetails->user_id, $prvPaymentDetails->id, $prvPaymentDetails->count);

            $data['inv_id'] = $this->Custom->previousInvNameCron($prvPaymentDetails->user_id, $prvPaymentDetails->id, $prvPaymentDetails->count);

            $data['support_id'] = $this->Custom->previousSupportNameCron($prvPaymentDetails->user_id, $prvPaymentDetails->id, $prvPaymentDetails->count);
        }

        $used_card_id = $data['p_id'];
        $data['user_id'] = $this->Auth->user('id');
        $data['price'] = $data['payableAmount'];
        $data['profile_type'] = $profile_type;
        $data['payment_type'] = 1;
        $data['status'] = 0;
        $data['payment_card_details_id'] = $used_card_id;
        $data['created_dt'] = date('Y-m-d H:i:s');
        $data['count'] = $paymentCount + 1;
        $data['shipping_address_id'] = $this->request->session()->read('user_shipping_address');

        $newEntity = $this->PaymentGetways->patchEntity($newEntity, $data);
        $PaymentIdlast = $this->PaymentGetways->save($newEntity);
        $paymentId = $PaymentIdlast->id;
        $this->request->session()->write('PYMID', $paymentId);
        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'is_billing' => 1])->first();
        $arr_user_info = [
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
            'email' => $this->Auth->user('email'),
            'amount' => ($this->request->session()->read('Auth.User.is_influencer') == 1) ? 1 : $main_style_fee, //$data['payableAmount'],
            'invice' => $paymentId,
            'refId' => $paymentId,
            'companyName' => 'Drapefit',
        ];
        $cardDetails = $this->PaymentCardDetails->find('all')->where(['id' => $used_card_id])->first();

        $message = $this->stripePay($arr_user_info);

        if (@$message['error'] == 'error') {
            if ($message['error_code'] == 'authentication_required') {
                $this->Flash->error(__('Please authenticate your payment.'));
                $message['redirect_url'] = HTTP_ROOT . 'users/reAuthPayment/payment/' . $paymentId;
            }
            echo json_encode($message);
        } else if (@$message['status'] == '1') {

            //check assgine the employ to assgine to stylest
            $getpaymentFirstTime = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
            $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Onboard_in_Progress')], ['id' => $paymentId]);

            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                $dataxcxc['user_id'] = $this->Auth->user('id');
                $dataxcxc['kid_id'] = $this->request->session()->read('KID_ID');
                $dataxcxc['date_in_time'] = date('l, F d, Y', strtotime( ' + 7 days'));
                $entityxcxc = $this->DeliverDate->newEntity();
                $entityxcxc = $this->DeliverDate->patchEntity($entityxcxc, $dataxcxc);
                $this->DeliverDate->save($entityxcxc);
                $delivery_id = $this->DeliverDate->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID')])->order(['id' => 'DESC'])->first();
            } else {
                $dataxcxc['user_id'] = $this->Auth->user('id');
                $dataxcxc['date_in_time'] = date('l, F d, Y', strtotime( ' + 7 days'));
                $entityxcxc = $this->DeliverDate->newEntity();
                $entityxcxc = $this->DeliverDate->patchEntity($entityxcxc, $dataxcxc);
                $this->DeliverDate->save($entityxcxc);
                $delivery_id = $this->DeliverDate->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0])->order(['id' => 'DESC'])->first();
            }

            $this->PaymentGetways->updateAll(['delivery_id' => $delivery_id->id], ['id' => $paymentId]);

            $this->Products->updateAll(['is_payment_fail' => 0], ['payment_id' => $paymentId]);

            if ($getpaymentFirstTime->payment_type == 1) {
                if ($this->request->session()->read('PROFILE') == 'KIDS') {
                    @$kidId = $this->request->session()->read('KID_ID');
                    $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => @$kidId]);
                    $kid_id = $this->request->session()->read('KID_ID');
                } else {
                    $kid_id = 0;
                    $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
                }
            }


            if (@$getpaymentFirstTime->kid_id != '') {
                $getDetailsEmp = $this->CustomerStylist->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => $getpaymentFirstTime->kid_id])->first();
            } else {
                $getDetailsEmp = $this->CustomerStylist->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
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

            $getId = $this->Auth->user('id');

            $message['redirect_url'] = null;
            echo json_encode($message);
            $this->paymentMailSending($message);
        } else {
            $message['error'] = 'error';
            $message['redirect_url'] = null;
            echo json_encode($message);
        }

        exit;
    }

    public function paymentMailSending($message = null)
    {
        $updateId = $this->request->session()->read('PYMID');
        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId']], ['id' => $updateId]);
        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId])->first();
        $checkUser = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId, 'PaymentGetways.payment_type' => 1])->first();
        $card_details = $this->PaymentCardDetails->find('all')->where(['id' => $checkUser->payment_card_details_id])->first();
        $bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $this->Auth->user('id'), 'is_billing' => 1])->first();
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

        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUCCESS_PAYMENT'])->first();

        $stylefee = $this->Settings->find('all')->where(['Settings.name' => 'style_fee'])->first();

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

        $feeprice = $stylefee->value;

        $to = $this->Auth->user('email');

        $name = $this->Auth->user('name');

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

        exit;
    }

    public function paymentSuccess() {
        
    }

    public function setAccount($slg = null) {

        $this->viewBuilder()->layout('default');

        /* if (@$this->request->session()->read('PROFILE') == 'KIDS') {

          $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();

          } else {

          $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);

          $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();

          }

          if ($getUsersDetails->is_redirect == 6) {

          return $this->redirect(HTTP_ROOT . 'customer-order-review');

          }

          if (@$this->request->session()->read('PROFILE') == 'KIDS') {

          $userComplete = $this->KidsDetails->find('all')->where(['KidsDetails.is_progressbar' => 100, 'KidsDetails.id' => @$this->request->session()->read('KID_ID')])->first();

          }else{

          $userComplete = $this->UserDetails->find('all')->where(['UserDetails.is_progressbar' => 100, 'UserDetails.user_id' => $this->Auth->user('id')])->first();

          }

          if ($userComplete->is_progressbar == 100) { */

        $credit_balance = $this->UserUsesPromocode->find('all')->Select(['Total_promo_price' => 'SUM(UserUsesPromocode.price)'])->where(['UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();

        $ship_address = $this->ShippingAddress->find('all')->where(['user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->first();

        $ShippingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);

        $bill_address = $this->PaymentCardDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);

        $user_details = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();

        $EmailPreference = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $this->Auth->user('id'), 'EmailPreferences.kid_id' => 0])->first();

        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.is_save' => 1]);

        $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['kid_id' => 0, 'user_id' => $this->Auth->user('id')])->first();

        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GMAILINVITE'])->first();

        $subject = $emailMessage->display;
        $reference = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $linkx = HTTP_ROOT . 'invite/' . @$reference->first_name . '-' . @$reference->user_id;
        $link = HTTP_ROOT . 'invite/' . @$reference->first_name . '-' . @$reference->user_id . '?sod=w';
        $txt = 'Hi!  So I started using the personal styling service, Drapefit, and I thought you’d love to try it too. Just tell them what you like and what you want to spend and they’ll send you items you’ll love. You can send back what you don’t want to keep for free. It’s so easy.';
        $sub = $subject;
        //$url = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&su=" . $sub . "&body=" . $txt;
        $url = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&su=";

        $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;

        $kid_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;

        $this->set(compact('LetsPlanYourFirstFixData', 'savecard', 'user_details', 'PersonalizedFix', 'SizeChart', 'ship_address', 'credit_balance', 'bill_address', 'ShippingAddress', 'EmailPreference', 'slg', 'sub', 'reference', 'url', 'linkx', 'txt', 'link', 'main_style_fee', 'kid_style_fee'));

        /* } else {

          $this->Flash->error(__('Please complete your profile first'));

          return $this->redirect(HTTP_ROOT . 'welcome/style');

          } */

        //pj($kidDetails);
    }

     public function ajaxShippingAddress($uid = null)
    {

        $this->viewBuilder()->layout('ajax');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $uid = !empty($uid) ? $uid : $this->Auth->user('id');
            $countAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $uid])->count();

            $shippingAddress = $this->ShippingAddress->newEntity();

            if ($data) {

                if ($countAddress == 0) {

                    $data['default_set'] = 1;
                } else {

                    $data['default_set'] = 0;
                }



                if (@$data['id']) {

                    $data['id'] = $data['id'];
                } else {

                    $data['id'] = '';
                }

                $data['user_id'] = $uid;

                $data['full_name'] = $data['full_name'];

                $data['address'] = $data['address'];

                $data['address_line_2'] = $data['address_line_2'];

                $data['city'] = $data['city'];

                $data['state'] = $data['state'];

                $data['country_code'] = $data['country_code'];
                $data['phone'] = $data['phone'];

                $data['country'] = $data['country'];

                $shippingAddress = $this->ShippingAddress->patchEntity($shippingAddress, $data);

                $this->ShippingAddress->save($shippingAddress);
                $this->request->session()->write('user_shipping_address', $shippingAddress->id);
                if (@$data['id']) {

                    echo json_encode(['status' => 'success', 'msg' => '<p style="color:green;">Address Update success fully</p>']);
                } else {

                    echo json_encode(['status' => 'success', 'msg' => '<p style="color:green;">Address add success fully</p>']);
                }

                exit();
            } else {

                echo json_encode(['status' => 'error', 'msg' => '<p style="color:red;">Some things is error, try again<p>']);

                exit();
            }
        } else {
            if ($this->request->session()->read('Auth.User.id') == '') {

                echo json_encode(['status' => 'login', 'msg' => 'already logged in']);

                exit();
            }
        }
    }

    public function getAllAddress($uid = null) {

        $this->viewBuilder()->layout('ajax');

        $uid = !empty($uid) ? $uid : $this->Auth->user('id');
        $ShippingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $uid]);

        $this->set(compact('ShippingAddress'));
    }

    public function ajaxChangeAddress() {

        $this->viewBuilder()->layout('ajax');

        $shippingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);

        $this->set(compact('shippingAddress'));
    }

    public function getPaymentDetails($uid = null) {

        $this->viewBuilder()->layout('ajax');
        $uid = !empty($uid) ? $uid : $this->Auth->user('id');
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $uid, 'PaymentCardDetails.is_save' => 1]);

        $billingddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $uid, 'ShippingAddress.default_set' => 1])->first();

        $this->set(compact('savecard', 'billingddress'));
    }

    public function ajaxCardSave() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['card_number']) {
                $newEntity = $this->PaymentCardDetails->newEntity();
                $checkData = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.use_card' => 1])->count();
                if ($checkData == 0) {
                    $data['use_card'] = 1;
                } else {
                    $data['use_card'] = 0;
                }
                if (@$data['id']) {
                    $data['id'] = $data['id'];
                } else {
                    $data['id'] = '';
                }
                $data['user_id'] = $this->Auth->user('id');
                $data['is_save'] = 1;
                $data['count'] = @$count++;
                $data['profile'] = $this->Auth->user('type');
                $data['card_name'] = $data['card_name'];
                $data['card_number'] = $data['card_number'];
                $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
                $data['cvv'] = $data['cvv'];
                $data['status'] = 0;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $newEntity = $this->PaymentCardDetails->patchEntity($newEntity, $data);
                $this->PaymentCardDetails->save($newEntity);
                echo "hi";
                exit;
            }
        }
    }

    public function ajaxCardSaveEdit() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $newEntity = $this->PaymentCardDetails->newEntity();
                if (@$data['id']) {
                    $id = $data['id'];
                    $expires = @$data['expiry_year'] . '-' . @$data['expiry_month'];
                    $this->PaymentCardDetails->updateAll(['card_name' => $data['name_card'], 'card_expire' => $expires], ['PaymentCardDetails.id.id' => $id]);
                }
                echo "hi";
                exit;
            }
        }
    }

    public function getAddressDelete($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($id) {
            $this->ShippingAddress->deleteAll(['id' => $id]);

            echo "hi";
        }
        exit;
    }

    public function getPaymentDelete($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($id) {
            $this->PaymentCardDetails->deleteAll(['id' => $id]);

            echo "hi";
        }
        exit;
    }

    public function getEditPayment($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($id) {
            $card = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.id' => $id])->first();
            $masked = str_pad(substr($card->card_number, -4), strlen($card->card_number), ' ', STR_PAD_LEFT);
//echo $card->card_type;
            if ($card->card_type == 'Visa') {
                $img = 'visa.png';
            } elseif ($card->card_type == 'MasterCard') {
                $img = 'master.png';
            } elseif ($card->card_type == 'Maestro') {
                $img = 'maestro.png';
            } elseif ($card->card_type == 'Discover') {
                $img = 'discover.png';
            } elseif ($card->card_type == 'Amex') {
                $img = 'american.png';
            } elseif ($card->card_type == 'jcb') {
                $img = 'jcb.png';
            }
            $divp = '<img src="' . HTTP_ROOT . 'images/' . $img . '" > <span><strong> ' . $card->card_type . ' </strong> endding with ' . $masked . ' </span>';
            $billingddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->first();
            $baddress = '<p>' . @$billingddress->full_name . '</p>
                <p>' . @$billingddress->address . '</p>
                <p>' . @$billingddress->address_line_2 . '</p>
                <p>' . @$billingddress->city . '</p>
                <p>' . @$billingddress->state . '</p>
                <p>' . @$billingddress->zipcode . '</p>
                <p>' . @$billingddress->country . '</p>
                <p>' . @$billingddress->phone . '</p>';
            $cardEx = explode('-', @$card->card_expire);
            $month = $cardEx[1];
            $year = $cardEx[0];
            echo json_encode(['data' => @$card, 'divp' => @$divp, 'bilingAddres' => @$baddress, 'month' => @$month, 'year' => @$year]);
        }
        exit;
    }

    public function genderUpdate($id = null) {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['selectservice']) {
                if (@$data['selectservice'] == 'men') {
                    $gender = 1;
                    $gen = "MEN";
                } else {
                    $gender = 2;
                    $gen = "WOMEN";
                }

                $this->request->session()->write('PROFILE', $gen);

                $getUser = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
                $exitData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->count();
                if ($exitData >= 1) {

                    $this->UserDetails->updateAll(['gender' => $gender], ['user_id' => $this->Auth->user('id')]);
                } else {

                    $userd = $this->UserDetails->newEntity();
                    $data['id'] = '';
                    $data['user_id'] = $this->Auth->user('id');
                    $data['gender'] = $gender;
                    $data['first_name'] = $getUser->name;
                    $userd = $this->UserDetails->patchEntity($userd, $data);
                    $x = $this->UserDetails->save($userd);
                }
            }
            return $this->redirect(HTTP_ROOT . 'welcome/style');
        }
    }

    public function getSetDefault($id = null) {
        if ($id) {
            $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $this->Auth->user('id')]);
            $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $id]);
            $billingddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->first();
            $baddress = '<p>' . @$billingddress->full_name . '</p>
                <p>' . @$billingddress->address . '</p>
                <p>' . @$billingddress->address_line_2 . '</p>
                <p>' . @$billingddress->city . '</p>
                <p>' . @$billingddress->state . '</p>
                <p>' . @$billingddress->zipcode . '</p>
                <p>' . @$billingddress->country . '</p>
                <p>' . @$billingddress->phone . '</p>';

            echo json_encode(['bilingAddres' => @$baddress]);
            exit;
        }
        exit;
    }

    public function getEditAddress($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($id) {
            $address = $this->ShippingAddress->find('all')->where(['ShippingAddress.id' => $id])->first();
            echo json_encode($address);
        }
        exit;
    }

    public function profileSetting() {
        $this->viewBuilder()->layout('default');
        $user = $this->Users->newEntity();
        $user_details = $this->UserDetails->newEntity();
        $this->UserDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $userdata = $this->UserDetails->find('all')->contain(['Users'])->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['first_name'] == '') {
                $this->Flash->error(__('Please enter the first name'));
            }
            if ($data['last_name'] == '') {
                $this->Flash->error(__('Please enter the last name'));
            } else {
                $data['name'] = $data['first_name'];
                $user = $this->Users->patchEntity($user, $data);
                $user->id = $this->request->session()->read('Auth.User.id');
                $x = $this->Users->save($user);
                $user_details = $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'last_name' => $data['last_name']], ['user_id' => $this->Auth->user('id')]);
                $user = $this->Users->updateAll(['name' => $data['first_name']], ['id' => $this->Auth->user('id')]);
                if ($x) {
                    $this->Flash->success(__('Change Password Updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'account');
                } else {
                    $this->Flash->error(__('Cannot Updated .'));
                }
            }
        }

        $this->set(compact('userdata'));
    }

    public function changeAccountPassword() {
        $this->viewBuilder()->layout('default');
        $user = $this->Users->newEntity();
        $user_details = $this->UserDetails->newEntity();
        $this->UserDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $userdata = $this->UserDetails->find('all')->contain(['Users'])->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['password'] != $data['cPassword']) {
                $this->Flash->error(__('Password and retype password donot match.'));
            } else {
                $user = $this->Users->patchEntity($user, $data);
                $user->id = $this->request->session()->read('Auth.User.id');
                $x = $this->Users->save($user);

                if ($x) {
                    $this->Flash->success(__('Change Password Updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'account');
                } else {
                    $this->Flash->error(__('Cannot Updated .'));
                }
            }
        }
        $this->set(compact('userdata'));
    }

    public function shippingInfo() {
        $this->viewBuilder()->layout('default');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $shipaddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
            $ship = $this->ShippingAddress->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $ship = $this->ShippingAddress->patchEntity($ship, $data);
            $this->ShippingAddress->save($ship);
//             pj($ship);exit;
            $this->Flash->success(__('Updated successfully.'));
            return $this->redirect(HTTP_ROOT . 'shippingaddress');
        }
        $shipaddress_data = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);

        $this->set(compact('shipaddress', 'shipaddress_data'));
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

            $query = $this->Users->find('all')
                    ->select(['Users.id', 'Users.email'])
                    ->where(['Users.email' => $email]);
            $count = $query->count();
            if ($count) {
                echo json_encode(array('status' => 'error', 'msg' => 'Email id already exists!'));
            } else {
                echo json_encode(array('status' => 'success', 'msg' => 'Email id is available.'));
            }
        }
        exit;
    }

    public function kidNewProfile() {
        $getUsersDetails = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
        if ($getUsersDetails->is_redirect == 6) {

            return $this->redirect(HTTP_ROOT . 'customer-order-review');
        }
        $this->request->session()->write('KID_ID', '');
        $this->request->session()->write('PROFILE', 'KIDS');
        return $this->redirect(HTTP_ROOT . 'welcome/style');
        exit;
    }

    public function orderReview() {
        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
            @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $productData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $productcount = $this->Products->find('all')->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId])->count();
            $cname = $getUsersDetails->kids_first_name;
        } else {
            @$paymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $productData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $productcount = $this->Products->find('all')->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId])->count();
            $cname = $getUsersDetails->name;
        }
        if ($getUsersDetails->is_redirect == 2) {
            $this->Flash->success(__('Keep wait product yet not shipped'));
            return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
        }
        // $this->Products->updateAll(['customer_purchasedate' => '0000-00-00'], ['payment_id' => $paymentId]);
        $this->Products->updateAll(['customer_purchasedate' => '0000-00-00'], ['payment_id' => $paymentId, 'store_return_status !=' => 'Y']);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $productcount = $data['productCount'];
            $total = 0;
            for ($x = 1; $x <= $productcount; $x++) {
                $Products = $this->Products->newEntity();
                @$table['id'] = $data['productID' . $x];
                @$table['size_status'] = $data['size' . $x];
                @$table['style_status'] = $data['style' . $x];
                @$table['fit_cut_status'] = $data['fit_cut' . $x];
                @$table['quality_status'] = $data['quality' . $x];
                @$table['price_status'] = $data['price' . $x];
                if (@$data['what_do_you_think_of_the_product' . $x] == 3) {
                    @$table['customer_purchasedate'] = date('Y-m-d');
                    @$table['customer_purchase_status'] = 'Y';
                    @$table['return_status'] = 'N';
                    @$table['exchange_status'] = 'N';
                    $table['keep_status'] = 3;
                }

                if (@$data['what_do_you_think_of_the_product' . $x] == 2) {
                    @$table['exchange_status'] = 'Y';
                    @$table['customer_purchase_status'] = 'N';
                    @$table['return_status'] = 'N';
                    @$table['customer_purchasedate'] = '';
                    $table['keep_status'] = 2;
                }

                if (@$data['what_do_you_think_of_the_product' . $x] == 1) {
                    @$table['product_valid_return_date'] = date('Y-m-d h:i:s');
                    @$table['return_status'] = 'Y';
                    @$table['customer_purchase_status'] = 'N';
                    @$table['exchange_status'] = 'N';
                    @$table['customer_purchasedate'] = '';
                    $table['keep_status'] = 1;
                }

                @$table['product_review'] = @$data['ProductReview' . $x];
                $Products = $this->Products->patchEntity($Products, $table);
                $this->Products->save($Products);
            }

            $getCount = $this->CustomerProductReview->find('all')->where(['CustomerProductReview.user_id' => $this->Auth->user('id')]);
            $CustomerProductReviewxCount = $getCount->count();
            $CustomerProductReviewData = $getCount->first();
            if ($CustomerProductReviewxCount >= 1) {
                $data['id'] = $CustomerProductReviewData->id;
            } else {
                $data['id'] = '';
            }
            @$paymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            $customerProductReview = $this->CustomerProductReview->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $data['payment_id'] = @$paymentId;
            $data['did_this_fix_personalized_to_you'] = $data['did_this_fix_personalized_to_you'];
            $data['did_this_fix_match_your_style'] = $data['did_this_fix_match_your_style'];
            $data['are_you_satisfied_with_this_fix'] = $data['are_you_satisfied_with_this_fix'];
            $data['look_forward_to_another_fix'] = $data['look_forward_to_another_fix'];
            $data['comments'] = $data['comments'];
            $customerProductReview = $this->CustomerProductReview->patchEntity($customerProductReview, $data);
            $this->CustomerProductReview->save($customerProductReview);
            if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                $this->KidsDetails->updateAll(['is_redirect' => 6], ['id' => @$this->request->session()->read('KID_ID')]);
            } else {
                $this->Users->updateAll(['is_redirect' => 6], ['id' => $this->Auth->user('id')]);
            }
            return $this->redirect(HTTP_ROOT . 'customer-order-review');
        }
        $cname = $this->set(compact('productData', 'cname', 'productcount'));
    }

    public function customerOrderReview()
    {
        $this->loadModel('OfferPromocode');
        $this->loadModel('UserUsesOfferCode');
        $this->loadModel('SalesNotApplicableState');

        $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.use_card' => 1])->first();
        $shipping_address_data = [];

        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
            $this->request->session()->read('KID_ID');
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();
            @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first();


            if (!empty($paymentId->shipping_address_id)) {
                $this->request->session()->write('user_shipping_address', $payment_data->shipping_address_id);
                $shipping_address_data = $this->ShippingAddress->find('all')->where(['id' => $paymentId->shipping_address_id])->first();
            }
            $paymentId = @$paymentId->id;
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.kid_id !=' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $kidcount = $prData->count();
            $cname = $getUsersDetails->kids_first_name;
        } else {
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
            $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first();

            if (!empty($paymentId->shipping_address_id)) {
                $this->request->session()->write('user_shipping_address', $payment_data->shipping_address_id);
                $shipping_address_data = $this->ShippingAddress->find('all')->where(['id' => $paymentId->shipping_address_id])->first();
            }

            $paymentId = $paymentId->id;

            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            // echo $paymentId; exit;
            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $cname = $getUsersDetails->name;
        }
        $all_sales_tax = $this->SalesNotApplicableState->find('all');
        $sales_tx_required = "NO";
        $sales_tx = 0;
        foreach ($all_sales_tax as $sl_tx) {
            if (($shipping_address_data->zipcode >= $sl_tx->zip_min) && ($shipping_address_data->zipcode <= $sl_tx->zip_max)) {
                $sales_tx_required = "YES";
                $sales_tx = $sl_tx->tax_rate / 100;
            }
        }
        if ($getUsersDetails->is_redirect == 2) {
            $this->Flash->success(__('Keep wait product yet not shipped'));
            return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
        }

        $s_pick_total = 0;
        if (!empty($prData)) {
            foreach ($prData as $pd) {
                if ($pd->keep_status == 3) {
                    $sellprice = $pd->sell_price;
                } else {
                    $sellprice = 0;
                }
                $s_pick_total += (float) $sellprice;
            }
        }

        $chk_prev_applied_code = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->Auth->user('id'), 'payment_id' => $paymentId, 'is_offer_code' => 1]);
        if ($chk_prev_applied_code->count() > 0) {
            foreach ($chk_prev_applied_code as $chk_prv_cd_list) {
                $ofr_cd = $chk_prv_cd_list->code;
                $chk_ofr_code_det = $this->OfferPromocode->find('all')->where(['code' => $ofr_cd])->first();
                if (!empty($chk_ofr_code_det) && !empty($chk_ofr_code_det->minimum_purchase)) {
                    if ($chk_ofr_code_det->minimum_purchase > $s_pick_total) {
                        $this->UserAppliedCodeOrderReview->deleteAll(['id' => $chk_prv_cd_list->id, 'is_ordered' => 0]);
                        $this->UserUsesOfferCode->deleteAll(['user_id' => $this->Auth->user('id'), 'code' => $ofr_cd, 'is_ordered' => 0]);
                        $this->Flash->error(__($ofr_cd . " offer code can't applicable."));
                    }
                }
            }
        }

        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $getWalltesCredit = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->request->session()->read('Auth.User.id'), 'Wallets.type' => 2, 'Wallets.applay_status' => 0])->sumOf('balance');
        $getWalltesDebit = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->request->session()->read('Auth.User.id'), 'Wallets.type' => 1, 'Wallets.applay_status' => 0])->sumOf('balance');
        $walletBalace = $getWalltesCredit - $getWalltesDebit;
        if ($paymentId) {
            $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
            $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 3])->Count();
            if (@$exCountKeeps != 0) {
                if (@$productCount == @$exCountKeeps) {
                    $allKeepsProducts = 1;
                    $percentage = 25;
                } else {
                    $allKeepsProducts = 2;
                    $percentage = 0;
                }
            }
        }
        //        echo $paymentId;

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $payment_data = $this->PaymentCardDetails->find('all')->where(['id' => $data['crd_idd']])->first();

            $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();

            if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                $kid = $this->request->session()->read('KID_ID');
                $profileType = 3;
                ///////$this->Notifications->updateAll(['is_read' => 1], ['kid_id' => @$this->request->session()->read('KID_ID')]);
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();
                $paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                //$finlizePaymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 2])->order(['id' => 'DESC'])->first();
                $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.kid_id !=' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
                $kidcount = $prData->count();
            } else {
                $kid = 0;
                if ($this->request->session()->read('PROFILE') == 'WOMEN') {
                    $profileType = 2;
                } else {
                    $profileType = 1;
                }
                /////// $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $this->Auth->user('id'), 'kid_id' => 0]);
                $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
                $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                //$finlizePaymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 2])->order(['id' => 'DESC'])->first();
                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            }


            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.use_card' => 1])->first();
            $payment_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $this->Auth->user('id')])->first();
            // echo $paymentId;exit;

            if (@$data['total'] == 0) {
                $message['status'] = 1;
            } else {

                if (@$data['walletCheck'] == 1) {
                    $paymentGetwayAmount = $data['total'] + $data['promoprice'] + $data['wallet'];
                } else {
                    $paymentGetwayAmount = $data['total'];
                }



                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'is_billing' => 1])->first();
                $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
                //echo $paymentId;exit;
                $paymentG = $this->PaymentGetways->newEntity();
                $table1['user_id'] = $this->Auth->user('id');
                $table1['kid_id'] = $kid;
                $table1['emp_id'] = 0;
                $table1['status'] = 0;
                // $table1['price'] = $paymentGetwayAmount;
                $table1['price'] = $data['total'];
                $table1['profile_type'] = $profileType;
                $table1['payment_type'] = 2;
                $table1['created_dt'] = date('Y-m-d H:i:s');
                $table1['parent_id'] = $paymentId;
                $table1['work_status'] = 1;
                $table1['count'] = $userIdp->count;
                $table1['payment_card_details_id'] = $payment_data->id;
                $table1['shipping_address_id'] = $data['shipping_address_id'];

                $paymentG = $this->PaymentGetways->patchEntity($paymentG, $table1);
                $lastPymentg = $this->PaymentGetways->save($paymentG);
                $user_crd_exp_arr = explode('-', $payment_data->card_expire);
                $user_crd_exp_mnth = $user_crd_exp_arr[1];
                $user_crd_exp_yr = $user_crd_exp_arr[0];

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
                    'email' => $this->Auth->user('email'),
                    //'amount' => $paymentGetwayAmount,
                    'amount' => $data['total'],
                    'invice' => @$paymentId,
                    'refId' => 32,
                    'companyName' => 'Drapefit',
                    'stripeToken' => $data['stripeToken'],
                ];

                // pj($arr_user_info);
                $message = $this->stripePay($arr_user_info);
                //                echo "<pre>";
                //                print_r($arr_user_info) ;
                //                print_r($message) ;
                //                exit; 
            }
            $payment_check = $this->Payments->find('all')->where(['payment_id' => $data['paymentID']])->order(['id' => 'DESC'])->first();
            $payment = $this->Payments->newEntity();
            if (!empty($payment_check)) {
                $table['id'] = $payment_check->id;
            }
            $table['user_id'] = $this->Auth->user('id');
            $table['payment_id'] = $data['paymentID'];
            $table['sub_toal'] = $data['stotal'];
            $table['sales_tax'] = $data['sales_tax'];
            $table['tax'] = 0.00;
            $table['tax_price'] = 0;
            //                $table['total_price'] = $price;
            $table['total_price'] = $data['total'];
            $table['paid_status'] = 5;
            $table['created_dt'] = date('Y-m-d H:i:s');
            $table['product_ids'] = @implode(',', @$product_ids);
            $table['wallet_balance'] = $data['wallet'];
            $table['wallet_check'] = $data['walletCheck'];
            $table['promo_balance'] = $data['promoprice'];
            $table['stylist_picks_subtotal'] = $data['stylist_picks_subtotal'];
            $table['style_fit_fee'] = $data['style_fit_fee'];
            $table['keep_all_discount'] = $data['keep_all_discount'];

            $payment = $this->Payments->patchEntity($payment, $table);
            $lastPyment = $this->Payments->save($payment);
            //echo $message['status'];exit;



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

                if ($data['total'] != 0) {
                    $this->PaymentGetways->updateAll(['is_style_fee' => 1], ['id' => $paymentId]);
                    $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId']], ['id' => $lastPymentg->id]);
                }


                $cpaymentCheck = $this->PaymentGetways->find('all')->where(['id' => $lastPymentg->id])->first();
                $checkAssigneStylest = $this->CustomerStylist->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id')])->first();
                if ($checkAssigneStylest->id != '') {
                    if ($cpaymentCheck->count == 1) {
                        $this->PaymentGetways->updateAll(['emp_id' => $checkAssigneStylest->employee_id], ['id' => $lastPymentg->id]);
                    }
                }
                if (@$data['promoprice'] != '') {
                    $walletsEnRE = $this->Wallets->newEntity();
                    $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                    $walletsEnRE->type = 2; //credit
                    $walletsEnRE->balance = $data['promoprice'];
                    $walletsEnRE->created = date('Y-m-d h:i:s');
                    $walletsEnRE->applay_status = 0;
                    $this->Wallets->save($walletsEnRE);
                }

                if (@$data['promoprice'] != '') {
                    if (@$data['walletCheck'] == 1) {
                        $price = $data['promoprice'] + $data['wallet'];
                    } else {
                        $price = $data['promoprice'];
                    }

                    if (@$data['stotal'] <= $price) {
                        $remening = $data['stotal'];
                    } else {
                        $remening = $price;
                    }
                    $walletsd = $this->Wallets->newEntity();
                    $walletsd->user_id = $this->request->session()->read('Auth.User.id');
                    $walletsd->type = 1; //debit
                    $walletsd->balance = $remening;
                    $walletsd->created = date('Y-m-d h:i:s');
                    $walletsd->applay_status = 0;
                    $this->Wallets->save($walletsd);
                }
                $aprice = $data['wallet'] - $data['promoprice'];
                if ($data['stotal'] > $aprice) {
                    $price = $data['stotal'] - $aprice;
                } else {
                    $price = 0;
                }
                $getUsesPromocode = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']]);
                $getUsesPromocodeExit = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']])->first();
                if ($getUsesPromocodeExit->id != '') {
                    foreach ($getUsesPromocode as $promo) {
                        $UserUsesPromocode = $this->UserUsesPromocode->newEntity();
                        $UserUsesPromocode->user_id = $this->request->session()->read('Auth.User.id');
                        $UserUsesPromocode->promocode = $promo->code;
                        $UserUsesPromocode->apply_dt = date('Y-m-d h:i:s');
                        $UserUsesPromocode->price = $promo->price;
                        $this->UserUsesPromocode->save($UserUsesPromocode);
                    }
                }
                $payment_check = $this->Payments->find('all')->where(['payment_id' => $data['paymentID']])->order(['id' => 'DESC'])->first();
                $payment = $this->Payments->newEntity();
                if (!empty($payment_check)) {
                    $table['id'] = $payment_check->id;
                }
                $table['user_id'] = $this->Auth->user('id');
                $table['payment_id'] = $data['paymentID'];
                $table['sub_toal'] = $data['stotal'];
                $table['sales_tax'] = $data['sales_tax'];
                $table['tax'] = 0.00;
                $table['tax_price'] = 0;
                //                $table['total_price'] = $price;
                $table['total_price'] = $data['total'];
                $table['paid_status'] = 1;
                $table['created_dt'] = date('Y-m-d H:i:s');
                $table['product_ids'] = @implode(',', @$product_ids);
                $table['wallet_balance'] = $data['wallet'];
                $table['promo_balance'] = $data['promoprice'];
                $payment = $this->Payments->patchEntity($payment, $table);
                $lastPyment = $this->Payments->save($payment);
                $i = 1;
                $productData = '';
                foreach ($prData as $dataMail) {
                    $chk_prd_dtls = $this->Products->find('all')->where(['id' => $dataMail->id])->first();

                    if ($dataMail->keep_status == 3) {
                        $priceMail = $dataMail->sell_price;
                        $this->Products->updateAll(['is_complete' => '1'], ['id' => $dataMail->id]);
                    } else {
                        $priceMail = 0;
                    }
                    if ($dataMail->keep_status == 3) {
                        $this->Products->updateAll(['is_complete' => '1', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                        $keep = 'Keeps';

                        if (!empty($chk_prd_dtls) && !empty($chk_prd_dtls->inv_product_id)) {
                            $newLogArr = [];
                            $newLogArr['product_id'] = $chk_prd_dtls->inv_product_id;
                            $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                            $newLogArr['action'] = 'customer_keep';
                            $newLogArr['created_on'] = date('Y-m-d H:i:s');
                            $newDtRow = $this->InProductLogs->newEntity();
                            $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                            $this->InProductLogs->save($newDtRow);
                            //                            echo "<pre>";print_r($newDtRow);echo "</pre>";
                            $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Customer Keep'], ['id' => $chk_prd_dtls->inv_product_id]);
                        }
                    } elseif ($dataMail->keep_status == 2) {
                        $keep = 'Exchange';
                        $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 1], ['id' => $dataMail->id]);

                        /*if(!empty($chk_prd_dtls) && !empty($chk_prd_dtls->inv_product_id)){
                            $newLogArr = [];
                            $newLogArr['product_id'] = $chk_prd_dtls->inv_product_id;
                            $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                            $newLogArr['action'] = 'customer_exchange';
                            $newLogArr['created_on'] = date('Y-m-d H:i:s');
                            $newDtRow = $this->InProductLogs->newEntity();
                            $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                            $this->InProductLogs->save($newDtRow);
//                            echo "<pre>";print_r($newDtRow);echo "</pre>";
                            $this->InProducts->updateAll(['updated_by'=>$this->request->session()->read('Auth.User.id'),'updated_date'=>date('Y-m-d H:i:s'), 'action'=>'Customer Exchange'], ['id' => $chk_prd_dtls->inv_product_id]);

                        }*/
                    } else if ($dataMail->keep_status == 1) {
                        $keep = 'Return';
                        $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);

                        /*if(!empty($chk_prd_dtls) && !empty($chk_prd_dtls->inv_product_id)){
                            $newLogArr = [];
                            $newLogArr['product_id'] = $chk_prd_dtls->inv_product_id;
                            $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                            $newLogArr['action'] = 'customer_return';
                            $newLogArr['created_on'] = date('Y-m-d H:i:s');
                            $newDtRow = $this->InProductLogs->newEntity();
                            $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                            $this->InProductLogs->save($newDtRow);
//                            echo "<pre>";print_r($newDtRow);echo "</pre>";
                            $this->InProducts->updateAll(['updated_by'=>$this->request->session()->read('Auth.User.id'),'updated_date'=>date('Y-m-d H:i:s'), 'action'=>'Customer Return'], ['id' => $chk_prd_dtls->inv_product_id]);

                        }*/
                    }
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

                                " . $keep . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               " . $dataMail->size . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               $" . number_format($priceMail, 2) . "

                            </td>

                        </tr>";
                    $this->Products->updateAll(['checkedout' => 'Y'], ['id' => $dataMail->id]);
                    $i++;
                }

                $applied_promo_codes = $this->Custom->getPromoCode($paymentId);
                $offerData = '';

                if (@$data['walletCheck'] == 1) {
                    $offerData .= "<tr style='display: inline-block; width: 100%;'>
                            <td colspan='5' style='text-align: left;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: left; width: 49%;'>
                             Wallet applied 
                            </td>
                            <td  style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: right; width: 49%;'>
                               " . '-$' . number_format($data['wallet'], 2) . "
                            </td>
                           
                        </tr>";
                }


                foreach ($applied_promo_codes as $cup_a) {
                    $offerData .= "<tr style='display: inline-block; width: 100%;'>
                            <td colspan='5' style='text-align: left;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: left; width: 49%;'>
                              " . $cup_a->code . " applied 
                            </td>
                            <td  style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: right; width: 49%;'>
                               " . '-$' . number_format($cup_a->price, 2) . "
                            </td>
                           
                        </tr>";
                }




                if ($paymentId) {
                    $this->UserAppliedCodeOrderReview->deleteAll(['payment_id' => $data['paymentID']]);
                    $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
                    $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 3])->Count();
                    $exCountretun = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status' => 1])->Count();
                    $exCountexchange = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status ' => 2, 'is_complete' => 0])->Count();
                    $exCountreturn = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1])->Count();
                    $lastCount = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1, 'is_altnative_product' => 0])->Count();

                    if (@$productCount == $exCountretun + $exCountKeeps) {
                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                    }

                    if (@$productCount == $lastCount) {
                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
                    }

                    if (@$productCount == @$exCountKeeps) {
                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                        }
                        $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
                    } else if (@$productCount == @$exCountretun) {
                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                        }
                        $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                    } else if (@$exCountexchange == @$productCount) {
                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
                    } else if (@$exCountexchange >= 1) {
                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
                        }
                        $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
                    } else if (@$exCountreturn >= 1) {
                        if (@$exCountreturn == @$productCount) {
                            $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Previous_Worklist_queue')], ['id' => $payment_id]);
                            if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                                $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                            } else {
                                $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                            }
                            $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                        }
                    }
                }


                if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                    $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => @$this->request->session()->read('KID_ID')]);
                } else {
                    $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $this->Auth->user('id'), 'kid_id' => 0]);
                }
                $gtotal = $data['stotal'];
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $this->Auth->user('email');
                $name = $this->Auth->user('name');
                $from = $fromMail->value;
                $sitename = SITE_NAME;

                $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                $subject = $emailMessage1->display . ' #DFPYMID' . $paymentId;
                //echo $offerData; exit;
                if ($data['total'] == 0) {
                    $total = '0.00';
                } else {
                    $total = $data['total'];
                }
                $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $data['stylist_picks_subtotal'], $total, $data['style_fit_fee'], $data['keep_all_discount'], $refundamount = '', $gtotal, $offerData, $data['sales_tax'], '#DFPYMID' . $paymentId);
                $this->Custom->sendEmail($to, $from, $subject, $email_message);
                // $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

                //Refer user to bonus
                $paymet_chk = $this->PaymentGetways->find('all')->where(['user_id' => $this->Auth->user('id'), 'payment_type' => 2])->count();
                if ($paymet_chk >= 1) {
                    $check_refer_list = $this->ReferFriends->find('all')->where(['to_id' => $this->Auth->user('id')])->first();
                    if (!empty($check_refer_list) && $check_refer_list->paid_status == 0) {
                        $new_wallet_bal = $this->Wallets->newEntity();
                        $new_wallet_bal->user_id = $check_refer_list->from_id;
                        $new_wallet_bal->type = 2;
                        $new_wallet_bal->balance = 25;
                        $new_wallet_bal->created = date('Y-m-d h:i:s');
                        $new_wallet_bal->applay_status = 0;
                        $this->Wallets->save($new_wallet_bal);
                        $this->ReferFriends->updateAll(['paid_status' => 1], ['id' => $check_refer_list->id]);
                    }
                }
                $this->UserAppliedCodeOrderReview->updateAll(['is_ordered' => 1], ['payment_id' => $paymentId]);
                $this->UserUsesOfferCode->updateAll(['is_ordered' => 1], ['payment_id' => $paymentId]);

                return $this->redirect(HTTP_ROOT . 'payment-success');
            } else {
                if (!empty($message['ErrorCode'])) {
                    $getErrorMeg = $message['ErrorCode'];
                } else {
                    $getErrorMeg = $message['ErrorCode'];
                }

                if ($message['error_code'] == 'authentication_required') {
                    $this->Flash->error(__('Please authenticate your payment.'));
                    return $this->redirect(HTTP_ROOT . 'users/reAuthPayment/customer-order-review/' . @$lastPymentg->id);
                }

                $this->Flash->error(__(empty($getErrorMeg) ? $message['ErrorCode'] : $getErrorMeg));
                return $this->redirect(HTTP_ROOT . 'customer-order-review');
            }
        }
        $this->set(compact('payment_data', 'walletBalace', 'prData', 'userData', 'cname', 'allKeepsProducts', 'percentage', 'paymentId', 'shipping_address_data', 'sales_tx', 'sales_tx_required'));
    }

    public function noreview() {
        $status = '';
        $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $this->Auth->user('id'), 'PaymentGetways.status' => 1])->count();
        if ($paymentCount == 1) {
            $status = "st";
        } elseif ($paymentCount == 2) {
            $status = "nd";
        } elseif ($paymentCount == 3) {
            $status = "rd";
        } else {
            $status = "th";
        }
        $this->set(compact('status', 'paymentCount'));
    }

    public function notYetShipped() {
        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            $paymentIdown = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
            if ($getUsersDetails->is_redirect == 4) {
                return $this->redirect(HTTP_ROOT . 'order_review');
            }
            $status = '';
            $paymentNum = $this->PaymentGetways->find('all')->where(['PaymentGetways.kid_id' => $this->request->session()->read('KID_ID'), 'PaymentGetways.mail_status' => 0, 'refound_status' => 0, 'PaymentGetways.payment_type' => 1, 'work_status IN' => [1, 0]])->order(['PaymentGetways.id' => 'DESC'])->first();
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

            $getUsersDetails = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();

            @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => 0, 'user_id' => $this->request->session()->read('Auth.User.id'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

            @$paymentIdown = $this->PaymentGetways->find('all')->where(['kid_id' => 0, 'user_id' => $this->Auth->user('id'), 'payment_type' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

            if ($getUsersDetails->is_redirect == 4) {

                return $this->redirect(HTTP_ROOT . 'order_review');
            }

            $status = '';

            $paymentNum = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $this->Auth->user('id'), 'PaymentGetways.status' => 1, 'kid_id' => 0, 'refound_status' => 0, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.mail_status' => 0, 'work_status IN' => [0, 1]])->order(['PaymentGetways.id' => 'ASC'])->first();
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
        $this->set(compact('status', 'paymentCount', 'procutsExchange'));
    }

    public function savepayment() {
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')]);
        $savecardcount = $savecard->count();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['id']) {
                $data['id'] = $data['id'];
            } else {
                $data['id'] = '';
            }
            if ($data['isSaveCard'] == 1) {
                $isSaveCard = 1;
            } else {
                $isSaveCard = 0;
            }
            $newEntity = $this->PaymentCardDetails->newEntity();
            $info1 = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')])->first();
            $data['user_id'] = $this->Auth->user('id');
            $data['is_save'] = $isSaveCard;
            $data['card_name'] = $data['card_name'];
            $data['card_type'] = $data['card_type'];
            $data['card_number'] = $data['card_number'];
            $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
            $data['cvv'] = $data['cvv'];
            $newEntity = $this->PaymentCardDetails->patchEntity($newEntity, $data);
            $this->PaymentCardDetails->save($newEntity);
            $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
            $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
            return $this->redirect(HTTP_ROOT . 'account');
        }
        $this->set(compact('status', 'paymentCount', 'savecard', 'savecardcount', '', '', '', ''));
    }

    public function frequency() {

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();

            $frequency_details = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();

            if ($frequency_details->id) {

                $data['id'] = $frequency_details->id;
            } else {

                $data['id'] = '';
            }

            $data['user_id'] = $this->Auth->user('id');

            $data['try_new_items_with_scheduled_fixes'] = $data['try_new_items_with_scheduled_fixes'];

            $data['how_often_would_you_lik_fixes'] = $data['how_often_would_you_lik_fixes'];

            $data['applay_dt'] = $this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'));

            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);

            $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);

            return $this->redirect(HTTP_ROOT . 'account');
        }

        $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();

        $this->set(compact('LetsPlanYourFirstFixData'));
    }

    public function getCardDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($data) {
            $getDetails = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.id' => $data['id'], 'PaymentCardDetails.is_save' => 1])->first();
            echo json_encode($getDetails);
        }
        exit;
    }

    public function getSavedCardDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($data) {
            $getDetails = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.id' => $data['id'], 'PaymentCardDetails.is_save' => 1])->first();

            echo json_encode($getDetails);
        }
        exit;
    }

    public function removeCardDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($data) {
            $this->PaymentCardDetails->deleteAll(['id' => $data['id']]);
            echo json_encode(['msg' => 1]);
        }
        exit;
    }

    public function websocketMessage() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->input('json_decode', TRUE);
        $data = $this->request->data;
        if (@$data['chat_type'] == 1) {
            $getEmpoyeeId = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $data['userId'], 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1])->order(['PaymentGetways.id' => 'DESC'])->first();
            $reciverId = $getEmpoyeeId->emp_id;
        } else {
            $reciverId = $data['reciveId'];
        }
        $newEntity = $this->ChatMessages->newEntity();
        $data['id'] = '';
        $data['user_id'] = $data['userId'];
        $data['recive_id'] = $reciverId;
        $data['user_name'] = $data['userName'];
        $data['chat_message'] = $data['chat_message'];
        $data['chat_type'] = $data['chat_type'];
        $data['chat_date_time'] = date('Y-m-d h:i:s');
        $data['files'] = @$data['files'];
        $newEntity = $this->ChatMessages->patchEntity($newEntity, $data);
        if ($newEntity) {
            if ($this->ChatMessages->save($newEntity)) {
                
            }
        }
        echo json_encode(1);
        exit;
    }

    public function chatHistory() {
        $userId = $this->Auth->user('id');
        $this->ChatMessages->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $getChatMessage = $this->ChatMessages->find('all')->contain(['Users'])->where(['OR' => ['ChatMessages.user_id' => $userId, 'ChatMessages.recive_id' => $userId]])->order(['ChatMessages.id' => 'DESC']);
        $this->set(compact('userId', 'getChatMessage'));
    }

    public function chatSupport() {
        $userId = $this->Auth->user('id');
        $userName = $this->Auth->user('name');
        $this->set(compact('userId', 'userName'));
    }

    public function websocketPastMessage() {
        $userId = $this->Auth->user('id');
        $this->ChatMessages->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $getChatMessage = $this->ChatMessages->find('all')->contain(['Users'])->where(['OR' => ['ChatMessages.user_id' => $userId, 'ChatMessages.recive_id' => $userId]])->order(['ChatMessages.id' => 'asc']);
        $time = array();
        foreach ($getChatMessage as $msg) {
            $time[] = $this->Custom->timeElapsedString($msg->chat_date_time);
        }
        echo json_encode(['msg' => $getChatMessage, 'time' => $time]);
        exit;
    }

    public function checkCstTime() {
        date_default_timezone_set("America/Chicago");
        $startTime = '0';
        $endTime = '24';
        $currentHour = date('H');
        if ($currentHour >= $startTime && $currentHour <= $endTime) {
            echo 2;
        } else {
            echo 1;
        }
        exit;
    }

    public function startOnline() {
        $data = $this->request->input('json_decode', TRUE);
        $data = $this->request->data;
        date_default_timezone_set("America/Chicago");
        if ($data['userId']) {
            $this->Users->updateAll(['online' => 1], ['id' => $data['userId']]);
        }

        exit;
    }

    public function startOnlineOffline() {
        $data = $this->request->input('json_decode', TRUE);
        $data = $this->request->data;
        date_default_timezone_set("America/Chicago");
        if ($data['userId']) {
            $this->Users->updateAll(['online' => 0], ['id' => $data['userId']]);
        }

        exit;
    }

    public function chatFilsUpload() {
        $data = $this->request->data;
        $time = time();
        if (!empty($data['photos']['name'])) {
            $imageName = move_uploaded_file($data['photos']['tmp_name'], 'files/chat_image/' . $time . $data['photos']['name']);
        }
        echo json_encode(["imgurl" => HTTP_ROOT . 'files/chat_image/' . $time . $data['photos']['name'], "imgname" => $data['photos']['name']]);
        exit;
    }

    public function deleteAddress($id = null, $page = null) {
        if ($id) {
            $this->ShippingAddress->deleteAll(['id' => $id]);
            $this->Flash->success(__('Data deleted successfully.'));
            if (!empty($page)) {
                return $this->redirect(HTTP_ROOT . 'welcome/addressbook');
            } else {
                return $this->redirect(HTTP_ROOT . 'shippingaddress');
            }
        }
        exit;
    }

    public function addShipAddress($user_id = null) {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $ship_addrs = $this->ShippingAddress->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $ship_addrs = $this->ShippingAddress->patchEntity($ship_addrs, $data);
            $this->ShippingAddress->save($ship_addrs);
            return $this->redirect(HTTP_ROOT . 'shippingaddress');
        }
    }

    public function chatButtonBoxActive() {
        if ($this->request->session()->read('CHAT_BUTTON') == '') {
            $this->request->session()->write('CHAT_BUTTON', 'active');
        }
        echo json_encode(['status' => 'success']);
        exit;
    }

    public function chatButtonClose() {
        if ($this->request->session()->read('CHAT_BUTTON')) {
            $this->request->session()->write('CHAT_BUTTON', '');
        }
        echo json_encode(['status' => 'success']);
        exit;
    }

    public function websocketDivMinaus() {
        $data = $this->request->data;
        if ($data['value']) {
            $this->request->session()->write('MINUS', $data['value']);
        }
        echo json_encode('1');
        exit;
    }

    public function websocketDivMinausAdmin() {
        $data = $this->request->data;
        $this->request->session()->write('div' . $data['id'], $data['div']);
        echo json_encode('1');
        exit;
    }

    public function googlelogin() {
        $this->autoRender = false;
        require_once(ROOT . '/vendor' . DS . 'Google/src/' . 'Google_Client.php');
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');
        $url = $client->createAuthUrl();
        $this->redirect($url);
    }

    public function googleLoginReturn() {
        $url = $_SERVER['REQUEST_URI'];
        $newUrl = str_replace('.profile', '.profilx', $url);
        if (@$url != @$newUrl) {
            echo (@$url != @$newUrl);
            return $this->redirect(HTTP_ROOT . $newUrl);
        }

        $this->autoRender = false;
        require_once(ROOT . '/config/google_login.php');
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');
        $plus = new Google_PlusService($client);
        $oauth2 = new Google_Oauth2Service($client);
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
        }
        if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }

        if ($client->getAccessToken()) {
            $_SESSION['access_token'] = $client->getAccessToken();
            $google_data = $oauth2->userinfo->get();
            $token = json_decode($client->getAccessToken())->access_token;
            try {
                if (!empty($google_data)) {
                    $result = $this->Users->find('all')->where(['email' => $google_data['email']])->count();
                    if ($result >= 1) {
                        $result_email = $this->Users->find('all')->where(['email' => $google_data['email']])->first();
                        session_destroy();
                        $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
                        $get_login = $this->Auth->setUser($getLoginConfirmation);
                        $user_login_id = $this->Auth->user('id');
                        if ($user_login_id) {
                            $user = $this->Users->newEntity();
                            $user->last_login_ip = $this->Custom->get_ip_address();
                            $user->type = 2;
                            $user->last_login_date = date('Y-m-d H:i:s');
                            $user->id = $user_login_id;
                            $user->google_id = $google_data['id'];
                            $this->Users->save($user);
                            $this->Flash->success(__('Login successfull'));
                            if ($result_email['type'] == 2) {
                                $url = $this->Custom->loginRedirectAjax($user_login_id);
                                if ($result_email['type'] == 2) {
                                    $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_login_id])->first();
                                    if ($Userdetails->gender == 1) {
                                        $gen = "MEN";
                                        $this->request->session()->write('PROFILE', $gen);
                                        if (@$this->request->session()->read('codeProfile') != '') {
                                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                            $walletsEnRE = $this->Wallets->newEntity();
                                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                                            $walletsEnRE->type = 2;
                                            $walletsEnRE->balance = $getDetails->price;
                                            $walletsEnRE->created = date('Y-m-d h:i:s');
                                            $walletsEn->applay_status = 0;
                                            $this->Wallets->save($walletsEnRE);
                                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                                            $UserGift = $this->UserUsesGiftcode->newEntity();
                                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                                            $UserGift->giftcode = $getDetails->giftcode;
                                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                                            $UserGift->price = $getDetails->price;
                                            $this->UserUsesGiftcode->save($UserGift);
                                            $total = $getDetails->price;
                                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                            $this->request->session()->write('codeProfile', '');
                                            return $this->redirect(HTTP_ROOT . $url);
                                        } else {
                                            return $this->redirect(HTTP_ROOT . $url);
                                        }
                                    }
                                    if ($Userdetails->gender == 2) {
                                        $gen = "WOMEN";
                                        $this->request->session()->write('PROFILE', $gen);
                                        if (@$this->request->session()->read('codeProfile') != '') {
                                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                            $walletsEnRE = $this->Wallets->newEntity();
                                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                                            $walletsEnRE->type = 2;
                                            $walletsEnRE->balance = $getDetails->price;
                                            $walletsEnRE->created = date('Y-m-d h:i:s');
                                            $walletsEn->applay_status = 0;
                                            $this->Wallets->save($walletsEnRE);
                                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                                            $UserGift = $this->UserUsesGiftcode->newEntity();
                                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                                            $UserGift->giftcode = $getDetails->giftcode;
                                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                                            $UserGift->price = $getDetails->price;
                                            $this->UserUsesGiftcode->save($UserGift);
                                            $total = $getDetails->price;
                                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                            $this->request->session()->write('codeProfile', '');
                                            return $this->redirect(HTTP_ROOT . $url);
                                        } else {
                                            return $this->redirect(HTTP_ROOT . $url);
                                        }
                                    } else {

                                        if (@$this->request->session()->read('codeProfile') != '') {
                                            $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                            $walletsEnRE = $this->Wallets->newEntity();
                                            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                                            $walletsEnRE->type = 2;
                                            $walletsEnRE->balance = $getDetails->price;
                                            $walletsEnRE->created = date('Y-m-d h:i:s');
                                            $walletsEn->applay_status = 0;
                                            $this->Wallets->save($walletsEnRE);
                                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                                            $UserGift = $this->UserUsesGiftcode->newEntity();
                                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                                            $UserGift->giftcode = $getDetails->giftcode;
                                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                                            $UserGift->price = $getDetails->price;
                                            $this->UserUsesGiftcode->save($UserGift);
                                            $total = $getDetails->price;
                                            $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                            $this->request->session()->write('codeProfile', '');
                                            return $this->redirect(HTTP_ROOT . $url);
                                        } else {
                                            return $this->redirect(HTTP_ROOT . $url);
                                        }
                                    }
                                }
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT);
                        }
                    } else {
                        $user = $this->Users->newEntity();
                        $user->email = $google_data['email'];
                        if (@$google_data['given_name'] == '') {
                            $firstName = $user->first_name;
                        } else {
                            $firstName = $google_data['given_name'];
                        }
                        if (@$google_data['family_name'] == '') {
                            $lastName = $user->last_name;
                        } else {
                            $lastName = $google_data['family_name'];
                        }
                        $user->first_name = $firstName;
                        $user->last_name = $lastName;
                        $user->google_id = $google_data['id'];
                        $user->profile_photo = $google_data['picture'];
                        $user->token = $token;
                        $user->unique_id = $this->Custom->generateUniqNumber();
                        $user->name = $user->first_name . " " . $user->last_name;
                        $user->created_dt = date('Y-m-d H:i:s');
                        $user->last_login_date = date('Y-m-d H:i:s');
                        $user->is_active = 1;
                        $user->type = 2;
                        $user->reg_ip = $this->Custom->get_ip_address();
                        $user->last_login_ip = $this->Custom->get_ip_address();
                        if ($this->Users->save($user)) {
                            session_destroy();
                            $viewer_details = $this->UserDetails->newEntity();
                            $dataUser['user_id'] = $user->id;
                            $dataUser['first_name'] = $firstName;
                            $dataUser['last_name'] = $lastName;
                            $viewer_details = $this->UserDetails->patchEntity($viewer_details, $dataUser);
                            $this->UserDetails->save($viewer_details);
                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $user->id])->first()->toArray();
                            $get_login = $this->Auth->setUser($getLoginConfirmation);
                            $user_login_id = $this->Auth->user('id');
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                            $pwd = "Google signup";
                            $to = $user->email;
                            $from = $fromMail->value;
                            $subject = $emailMessage->display;
                            $sitename = SITE_NAME;
                            $url_link = HTTP_ROOT . 'users/autoLogin/' . $this->Custom->encrypt_decrypt('encrypt', $user->id);
                            $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $pwd, $sitename, $url_link);
                            $this->Custom->sendEmail($to, $from, $subject, $message);
                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                            $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                            if ($user_login_id) {
                                $this->Flash->success(__('Login successfull and please edit your profile'));
                                if (@$this->request->session()->read('codeProfile') != '') {
                                    $getDetails = $this->Giftcard->find('all')->where(['id' => $this->request->session()->read('codeProfile')])->first();
                                    $walletsEnRE = $this->Wallets->newEntity();
                                    $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                                    $walletsEnRE->type = 2;
                                    $walletsEnRE->balance = $getDetails->price;
                                    $walletsEnRE->created = date('Y-m-d h:i:s');
                                    $walletsEn->applay_status = 0;
                                    $this->Wallets->save($walletsEnRE);
                                    $this->Giftcard->updateAll(['is_active' => 1], ['id' => $this->request->session()->read('codeProfile')]);
                                    $UserGift = $this->UserUsesGiftcode->newEntity();
                                    $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                                    $UserGift->giftcode = $getDetails->giftcode;
                                    $UserGift->apply_dt = date('Y-m-d H:i:s');
                                    $UserGift->price = $getDetails->price;
                                    $this->UserUsesGiftcode->save($UserGift);
                                    $total = $getDetails->price;
                                    $this->Flash->success('Your Account has been credited with Gift Card value $' . $total);
                                    $this->request->session()->write('codeProfile', '');
                                    return $this->redirect(HTTP_ROOT . 'welcome/style');
                                } else {
                                    return $this->redirect(HTTP_ROOT . 'welcome/style');
                                }
                            } else {
                                $this->Flash->error(__('Login failed and you can register here also'));
                                return $this->redirect(HTTP_ROOT);
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT);
                        }
                    }
                } else {
                    $this->Flash->error(__('Login failed and you can register here also'));
                    return $this->redirect(HTTP_ROOT);
                }
            } catch (Exception $e) {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT);
            }
        }

        exit;
    }

    public function ajaxSechduleFix() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $count = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0])->count();
        if (@$data['try_new_items_with_scheduled_fixes'] == '') {
            $try_new_items_with_scheduled_fixes = 0;
        } else {
            $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
        }

        if (@$data['how_often_would_you_lik_fixes'] == '') {
            $how_often_would_you_lik_fixes = 0;
        } else {
            $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
        }

        $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();

        if ($count >= 1) {
            $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'applay_dt' => $this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'))], ['kid_id' => 0, 'user_id' => $this->Auth->user('id')]);
        } else {
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $data['kid_id'] = 0;
            $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
            $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;
            $data['applay_dt'] = $this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'));
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
            $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
        }
        $userDetails = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
        $username = $userDetails->name;
        $sitename = SITE_NAME;
        if ($try_new_items_with_scheduled_fixes == 0) {
            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();
            $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
        }

        if ($try_new_items_with_scheduled_fixes == 1) {
            $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                $sub_frq = "";
                if($getLetData->how_often_would_you_lik_fixes == 1){
                    $sub_frq = "Every Month";
                }else if($getLetData->how_often_would_you_lik_fixes == 2){
                    $sub_frq = "Every Two Month";
                }else if($getLetData->how_often_would_you_lik_fixes == 3){
                    $sub_frq = "Every Three Month";
                }
            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
            $message = $this->Custom->SubscriptionActivatedEmail($emailMessage->value, $username, $sitename,$sub_frq);
        }

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $to = $userDetails->email;
        $from = $fromMail->value;
        $subject = $emailMessage->display;
        if ($checkdata->id == '') {
            $this->Custom->sendEmail($to, $from, $subject, $message);
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            $this->Custom->sendEmail($toSupport, $from, $subject, $message);
        }

        echo json_encode(['msg' => 'Data save successfully']);

        exit;
    }

    public function ajaxSechduleFixKid() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        if ($data['try_new_items_with_scheduled_fixes'] == '') {
            $try_new_items_with_scheduled_fixes = 0;
        } else {
            $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
        }

        if ($data['how_often_would_you_lik_fixes'] == '') {
            $how_often_would_you_lik_fixes = 0;
        } else {
            $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
        }
        $checkdata = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'LetsPlanYourFirstFix.kid_id' => $data['kid_id'], 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();

        $chekData = $this->LetsPlanYourFirstFix->find('all')->where(['kid_id' => $data['kid_id']])->count();
        if ($chekData >= 1) {
            $chekeData = $this->LetsPlanYourFirstFix->find('all')->where(['kid_id' => $data['kid_id']])->first();

            $this->LetsPlanYourFirstFix->updateAll(['user_id' => $this->Auth->user('id'), 'kid_id' => $data['kid_id'], 'try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes, 'applay_dt' => $this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'))], ['id' => $chekeData->id]);
        } else {
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $data['kid_id'] = $data['kid_id'];
            $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
            $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;
            $data['applay_dt'] = $this->Custom->applydate($this->Auth->user('id'), $this->request->session()->read('KID_ID'));
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
            $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
        }
        $userDetails = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
        $username = $userDetails->name;
        $sitename = SITE_NAME;
        if ($try_new_items_with_scheduled_fixes == 0) {
            $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $data['kid_id']])->first();
            $kidname = $kidsDetails->kids_first_name;
            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();
            $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
        }

        if ($try_new_items_with_scheduled_fixes == 1) {
            $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
            $sub_frq = "";
            if($getLetData->how_often_would_you_lik_fixes == 1){
                $sub_frq = "Every Month";
            }else if($getLetData->how_often_would_you_lik_fixes == 2){
                $sub_frq = "Every Two Month";
            }else if($getLetData->how_often_would_you_lik_fixes == 3){
                $sub_frq = "Every Three Month";
            }
            $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $data['kid_id']])->first();
            $kidname = $kidsDetails->kids_first_name;
            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();
            $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename, $sub_frq);
        }

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $to = $userDetails->email;
        $from = $fromMail->value;
        $subject = $emailMessage->display;
        if (@$checkdata->id == '') {
            $this->Custom->sendEmail($to, $from, $subject, $message);
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            $this->Custom->sendEmail($toSupport, $from, $subject, $message);
        }

        echo json_encode(['msg' => 'Data save successfully']);

        exit;
    }

    public function getPaymentCardDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')]);
        $this->set(compact('savecard'));
    }

    public function ajaxUseThisCard() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $this->PaymentCardDetails->updateAll(['use_card' => 0], ['user_id' => $this->Auth->user('id')]);
        $this->PaymentCardDetails->updateAll(['use_card' => 1], ['id' => $data['card_details']]);
        echo json_encode(['msg' => 'Data save successfully']);
        exit;
    }

    public function getCardSelect() {
        $this->viewBuilder()->setLayout('ajax');
        $useCard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.use_card' => 1])->first();
        $this->set(compact('useCard'));
    }

    public function ajaxAddNwCard() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $newEntity = $this->PaymentCardDetails->newEntity();
                if ($data['card_number']) {
                    $checkData = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')])->count();
                    if ($checkData == 0) {
                        $data['use_card'] = 1;
                    } else {
                        $data['use_card'] = 0;
                    }
                    $data['user_id'] = $this->Auth->user('id');
                    $data['is_save'] = 1;
                    $data['card_name'] = $data['card_name'];
                    $data['card_type'] = $data['card_type'];
                    $data['card_number'] = $data['card_number'];
                    $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
                    $data['cvv'] = $data['cvv'];
                    $newEntity = $this->PaymentCardDetails->patchEntity($newEntity, $data);
                    $this->PaymentCardDetails->save($newEntity);
                }
                echo json_encode('1');
                exit;
            }
        }
    }

    public function getBillingAddressDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.is_billing' => 1])->first();
        $this->set(compact('billingAddress'));
    }

    public function getShippingAddressDetails() {
        $this->loadModel('SalesNotApplicableState');
        $all_sales_tax = $this->SalesNotApplicableState->find('all');

        if ($this->request->session()->read('KID_ID') != 0) {
            $user_id = $this->Auth->user('id');
            $kid_id = $this->request->session()->read('KID_ID');
        } else {
            $user_id = $this->Auth->user('id');
            $kid_id = 0;
        }
        $this->viewBuilder()->setLayout('ajax');
        if (!empty($this->request->session()->read('user_shipping_address'))) {
            $address = $this->ShippingAddress->find('all')->where(['id' => $this->request->session()->read('user_shipping_address')])->first();
        } else {
            $address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'ShippingAddress.kid_id' => $kid_id, 'ShippingAddress.default_set' => 1])->first();
        }



        $this->set(compact('address', 'all_sales_tax'));
    }

    public function getBillingAddressList() {
        $this->viewBuilder()->setLayout('ajax');
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
        $this->set(compact('billingAddress'));
    }

    public function getShipAddressList() {
        $this->viewBuilder()->setLayout('ajax');
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
        $this->set(compact('billingAddress'));
    }

    public function ajaxChangethisAddress() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $data['is_billing']]);
        echo json_encode('1');
        exit;
    }

    public function ajaxChangeshipthisAddress() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $this->Auth->user('id')]);
        $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $data['default_set']]);
        $this->request->session()->write('user_shipping_address', $data['default_set']);
        echo json_encode('1');
        exit;
    }

    public function ajaxChangeBillingAddress() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $this->ShippingAddress->updateAll(['is_billing' => 0], ['user_id' => $this->Auth->user('id')]);
        $this->ShippingAddress->updateAll(['is_billing' => 1], ['id' => $data['is_billing']]);
        echo json_encode('1');
        exit;
    }

    public function ajaxLoginDetails() {
        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $user_details = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();

        $this->set(compact('user_details'));
    }

    public function ajaxEmailPreforme() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $newEntity = $this->EmailPreferences->newEntity();
                if ($data['kid_id']) {
                    $emailPreferencesCount = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $this->Auth->user('id'), 'EmailPreferences.kid_id' => $data['kid_id']])->count();
                    if ($emailPreferencesCount >= 1) {
                        $this->EmailPreferences->updateAll(['preferences' => $data['email_preferences']], ['kid_id' => $data['kid_id']]);
                    } else {
                        $data['user_id'] = $this->Auth->user('id');
                        $data['kid_id'] = $data['kid_id'];
                        $data['preferences'] = $data['email_preferences'];
                        $newEntity = $this->EmailPreferences->patchEntity($newEntity, $data);
                        $this->EmailPreferences->save($newEntity);
                    }
                }
                echo json_encode(['msg' => 'Data add successfully']);
                exit;
            }
        }
        echo json_encode('1');
        exit;
    }

    public function ajaxEmailPreformeProfile() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $newEntity = $this->EmailPreferences->newEntity();
                if ($this->Auth->user('id')) {
                    $emailPreferences = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $this->Auth->user('id'), 'EmailPreferences.kid_id' => 0])->first();
                    if (@$emailPreferences->id != '') {
                        $data['id'] = $emailPreferences->id;
                    } else {
                        $data['id'] = '';
                    }
                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = 0;
                    $data['preferences'] = $data['email_preferences'];
                    $newEntity = $this->EmailPreferences->patchEntity($newEntity, $data);
                    $this->EmailPreferences->save($newEntity);
                }
                echo json_encode(['msg' => 'Data save successfully']);
                exit;
            }
        }
        exit;
    }

    public function ajaxLoginSaveDetails() {
        $this->viewBuilder()->setLayout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->Users->newEntity();
            if ($data['password'] && $data['first_name']) {
                if (strlen($data['password']) < 5) {
                    echo json_encode(['msg' => 'Password must contain atleast 10 characters.', 'status' => 'error']);
                } else if (@$data['conpassword'] == "") {
                    echo json_encode(['msg' => 'Confirm_Password cant empty.', 'status' => 'error1']);
                } else if (@$data['password'] != $data['conpassword']) {
                    echo json_encode(['msg' => 'Password  mismatch', 'status' => 'error1']);
                } else {
                    if ($data['password']) {
                        $user->password = $data['password'];
                    }

                    $user->name = $data['first_name'];
                    $user->id = $this->Auth->user('id');
                    if ($this->Users->save($user)) {
                        $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'last_name' => $data['last_name']], ['user_id' => $this->Auth->user('id')]);

                        echo json_encode(['msg' => 'Password change successfully ', 'status' => 'success']);
                    }
                }
            } else if ($data['first_name']) {
                $user->name = $data['first_name'];
                $user->id = $this->Auth->user('id');
                $this->Users->updateAll(['name' => $data['first_name']], ['id' => $this->Auth->user('id')]);
                $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'last_name' => $data['last_name']], ['user_id' => $this->Auth->user('id')]);
                echo json_encode(['msg' => 'Password change successfully ', 'status' => 'success']);
            }
        }
        exit;
    }

    public function ajaxReadmeCode() {

        $this->viewBuilder()->setLayout('ajax');

        $data = $this->request->data;

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if ($data['promocode'] == '') {

                echo json_encode(['msg' => 'Please input the promo code', 'status' => 'error']);
            }

            if ($data['promocode']) {

                $currentDate = date('Y-m-d');

                $this->Promocode->hasOne('UserMailTemplatePromocode', ['className' => 'UserMailTemplatePromocode', 'foreignKey' => 'promocode_id']);
                $checkData = $this->Promocode->find('all')->contain(['UserMailTemplatePromocode'])->where(['Promocode.promocode' => $data['promocode'], 'DATE(Promocode.expiry_date) >=' => $currentDate, 'DATE(Promocode.created_dt) <=' => $currentDate, 'Promocode.is_active' => 1, 'UserMailTemplatePromocode.user_id' => $this->Auth->user('id')])->first();

                if (@$checkData->id == '') {

                    echo json_encode(['msg' => 'Invalid promo code', 'status' => 'error']);
                } else {

                    $checkUserApplyData = $this->UserUsesPromocode->find('all')->where(['UserUsesPromocode.promocode' => $checkData->promocode, 'UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();

                    if (@$checkUserApplyData->id == '') {

                        $UserUsesPromocode = $this->UserUsesPromocode->newEntity();

                        $UserUsesPromocode->user_id = $this->Auth->user('id');

                        $UserUsesPromocode->promocode = $checkData->promocode;

                        $UserUsesPromocode->apply_dt = date('Y-m-d H:i:s');

                        $UserUsesPromocode->price = $checkData->price;

                        $this->UserUsesPromocode->save($UserUsesPromocode);

                        $wallets = $this->Wallets->newEntity();

                        $wallets->user_id = $this->Auth->user('id');

                        $wallets->type = 2;

                        $wallets->balance = $checkData->price;

                        $wallets->created = date('Y-m-d h:i:s');

                        $wallets->applay_status = 0;

                        $this->Wallets->save($wallets);

                        $price = number_format((float) $checkData->price, 2, '.', '');

                        echo json_encode(['msg' => 'Your account has been credited $' . $price, 'status' => 'success']);
                    } else {

                        echo json_encode(['msg' => 'All ready apply this code', 'status' => 'error']);
                    }
                }
            }

            exit;
        }



        echo json_encode('1');

        exit;
    }

    public function ajaxReadmeGiftCode() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['giftcode'] == '') {
                echo json_encode(['msg' => 'Please input the gift code', 'status' => 'error']);
            }

            if ($data['giftcode']) {
                $currentDate = date('Y-m-d');
                $checkData = $this->Giftcard->find('all')->where(['Giftcard.giftcode' => $data['giftcode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 0, 'to_email' => $this->Auth->user('email'), 'Giftcard.type IN' => [1, 2, 3]])->first();

                $this->Giftcard->hasOne('UserMailTemplateGiftcode', ['className' => 'UserMailTemplateGiftcode', 'foreignKey' => 'giftcode_id']);
                $checkAdminGift = $this->Giftcard->find('all')->contain(['UserMailTemplateGiftcode'])->where(['Giftcard.giftcode' => $data['giftcode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 1, 'UserMailTemplateGiftcode.user_id' => $this->Auth->user('id'), 'Giftcard.type' => 4])->first();

                if ((@$checkData->id == '') && (@$checkAdminGift->id == '')) {
                    echo json_encode(['msg' => 'Invalid Gift code', 'status' => 'error']);
                } else {
                    $gift_cod = $data['giftcode'];
                    $gift_price = 0;
                    if (!empty($checkData)) {
                        $gift_cod = $checkData->giftcode;
                        $gift_price = $checkData->price;
                    }
                    if (!empty($checkAdminGift)) {
                        $gift_cod = $checkAdminGift->giftcode;
                        $gift_price = $checkAdminGift->price;
                    }


                    $checkUserApplyData = $this->UserUsesGiftcode->find('all')->where(['UserUsesGiftcode.giftcode' => $gift_cod, 'UserUsesGiftcode.user_id' => $this->Auth->user('id')])->first();
                    if (@$checkUserApplyData->id == '') {
                        $UserUsesPromocode = $this->UserUsesGiftcode->newEntity();
                        $UserUsesPromocode->user_id = $this->request->session()->read('Auth.User.id');
                        $UserUsesPromocode->giftcode = $gift_cod;
                        $UserUsesPromocode->apply_dt = date('Y-m-d H:i:s');
                        $UserUsesPromocode->price = $gift_price;
                        $this->UserUsesGiftcode->save($UserUsesPromocode);
                        $wallets = $this->Wallets->newEntity();
                        $wallets->user_id = $this->Auth->user('id');
                        $wallets->type = 2;
                        $wallets->balance = $gift_price;
                        $wallets->created = date('Y-m-d h:i:s');
                        $wallets->applay_status = 0;
                        $this->Wallets->save($wallets);
                        $this->Giftcard->updateAll(['is_active' => 1], ['id' => $checkData->id]);
                        $price = number_format((float) $gift_price, 2, '.', '');
                        echo json_encode(['msg' => 'Your account has been credited $' . $price, 'status' => 'success']);
                    } else {
                        echo json_encode(['msg' => 'All ready apply this code', 'status' => 'error']);
                    }
                }
            }

            exit;
        }
        echo json_encode('1');

        exit;
    }

    public function ajaxReadmeCodeCheck() {
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

                    $checkUserApplyOfferData = $this->UserUsesOfferCode->find('all')->where(['code' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->count();
                    $checkUserAppliedOfferCodeOrderReview = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->count();
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
                $checkData = $this->Promocode->find('all')->contain(['UserMailTemplatePromocode'])->where(['Promocode.promocode' => $data['promocode'], 'DATE(Promocode.expiry_date) >=' => $currentDate, 'DATE(Promocode.created_dt) <=' => $currentDate, 'Promocode.is_active' => 1, 'UserMailTemplatePromocode.user_id' => $this->Auth->user('id')])->first();
                $checkDataGift = $this->Giftcard->find('all')->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 0, 'to_email' => $this->Auth->user('email'), 'Giftcard.type IN' => [1, 2, 3]])->first();

                $this->Giftcard->hasOne('UserMailTemplateGiftcode', ['className' => 'UserMailTemplateGiftcode', 'foreignKey' => 'giftcode_id']);
                $checkAdminGift = $this->Giftcard->find('all')->contain(['UserMailTemplateGiftcode'])->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 1, 'UserMailTemplateGiftcode.user_id' => $this->Auth->user('id'), 'Giftcard.type' => 4])->first();

                if ((@$checkData->id == '') && ($checkDataGift == '') && (@$checkAdminGift->id == '')) {
                    echo json_encode(['msg' => 'Invalid  code', 'status' => 'error', 'to_email' => $this->Auth->user('email')]);
                } else {
                    $checkUserApplyData = $this->UserUsesPromocode->find('all')->where(['UserUsesPromocode.promocode' => $data['promocode'], 'UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();
                    $checkUserApplyDataGift = $this->UserUsesGiftcode->find('all')->where(['UserUsesGiftcode.giftcode' => $data['promocode'], 'UserUsesGiftcode.user_id' => $this->Auth->user('id')])->first();
                    $checkUserApplay = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->first();
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

    public function ajaxReadmeCodeOrder() {
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
                    $checkUserApplyOfferData = $this->UserUsesOfferCode->find('all')->where(['code' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->count();
                    $checkUserAppliedOfferCodeOrderReview = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->count();
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

                        $total_offer_code_applied = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID'], 'is_offer_code' => 1])->count();
                        $this->UserAppliedCodeOrderReview->deleteAll(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID'], 'is_offer_code' => 1, 'is_ordered' => 0]);
                        $this->UserUsesOfferCode->deleteAll(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID'], 'is_ordered' => 0]);
                        $load_script = '';
                        if ($total_offer_code_applied == 1) {
                            $load_script = '<script>window.location.reload();</script>';
                        }
                        $UserPromocd = $this->UserAppliedCodeOrderReview->newEntity();
                        $UserPromocd->payment_id = $data['paymentID'];
                        $UserPromocd->code = $data['promocode'];
                        $UserPromocd->is_offer_code = 1;
                        $UserPromocd->apply_dt = date('Y-m-d H:i:s');
                        $UserPromocd->user_id = $this->request->session()->read('Auth.User.id');
                        $UserPromocd->price = $checkDataOffer->price;
                        $this->UserAppliedCodeOrderReview->save($UserPromocd);
                        if ($checkUserApplyOfferData == 0) {
                            $UserOfferCodee = $this->UserUsesOfferCode->newEntity();
                            $UserOfferCodee->user_id = $this->request->session()->read('Auth.User.id');
                            $UserOfferCodee->code = $data['promocode'];
                            $UserOfferCodee->payment_id = $data['paymentID'];
                            $UserOfferCodee->apply_dt = date('Y-m-d H:i:s');
                            $UserOfferCodee->price = $checkDataOffer->price;
                            $this->UserUsesOfferCode->save($UserOfferCodee);
                        }
                    }
                    $gprice = $checkDataOffer->price;
                    $price = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']])->sumOf('price');
                    echo json_encode(['status' => 'successgift', 'msg' => '<li class="my_offer_code">' . strtoupper($data['promocode']) . ' applied' . $load_script . '  <span> -$' . number_format($checkDataOffer->price, 2) . ' </span></li>', 'price' => $price, 'gprice' => $gprice]);
                    exit;
                }

                $this->Promocode->hasOne('UserMailTemplatePromocode', ['className' => 'UserMailTemplatePromocode', 'foreignKey' => 'promocode_id']);
                $checkData = $this->Promocode->find('all')->contain(['UserMailTemplatePromocode'])->where(['Promocode.promocode' => $data['promocode'], 'DATE(Promocode.expiry_date) >=' => $currentDate, 'DATE(Promocode.created_dt) <=' => $currentDate, 'Promocode.is_active' => 1, 'UserMailTemplatePromocode.user_id' => $this->Auth->user('id')])->first();
                $checkDataGift = $this->Giftcard->find('all')->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 0, 'to_email' => $this->Auth->user('email'), 'Giftcard.type IN' => [1, 2, 3]])->first();

                $this->Giftcard->hasOne('UserMailTemplateGiftcode', ['className' => 'UserMailTemplateGiftcode', 'foreignKey' => 'giftcode_id']);
                $checkAdminGift = $this->Giftcard->find('all')->contain(['UserMailTemplateGiftcode'])->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate, 'DATE(Giftcard.created_dt) <=' => $currentDate, 'is_active' => 1, 'UserMailTemplateGiftcode.user_id' => $this->Auth->user('id'), 'Giftcard.type' => 4])->first();

                $checkDataUserUsesGift = $this->UserUsesGiftcode->find('all')->where(['giftcode' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->first();
                $checkDataUserUsesPromo = $this->UserUsesPromocode->find('all')->where(['promocode' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->first();
                $checkUserAppliedCodeOrderReview = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->first();
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
                        $UserPromocd->user_id = $this->request->session()->read('Auth.User.id');
                        $UserPromocd->price = $gprice;
                        $this->UserAppliedCodeOrderReview->save($UserPromocd);

                        if (@$checkAdminGift->id != '') {
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $checkAdminGift->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $checkAdminGift->price;
                            $this->UserUsesGiftcode->save($UserGift);
                        }
                        if ($checkDataGift->id != '') {
                            $this->Giftcard->updateAll(['is_active' => 1], ['id' => $checkDataGift->id]);
                            $UserGift = $this->UserUsesGiftcode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->giftcode = $checkDataGift->giftcode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $checkDataGift->price;
                            $this->UserUsesGiftcode->save($UserGift);
                        }
                        if ($checkData->id != '') {
                            $this->Promocode->updateAll(['is_active' => 1], ['id' => $checkData->id]);
                            $UserGift = $this->UserUsesPromocode->newEntity();
                            $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                            $UserGift->promocode = $checkData->promocode;
                            $UserGift->apply_dt = date('Y-m-d H:i:s');
                            $UserGift->price = $checkData->price;
                            $this->UserUsesPromocode->save($UserGift);
                        }



                        $price = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']])->sumOf('price');
                        echo json_encode(['status' => 'successgift', 'msg' => '<li>' . strtoupper($data['promocode']) . ' applied  <span> -$' . number_format($gprice, 2) . ' </span></li>', 'price' => $price, 'gprice' => $gprice]);
                    }
                }
            }

            exit;
        }
        echo json_encode('1');
        exit;
    }

    public function ajaxWalletsDetails() {
        $walletsCreditBalance = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->Auth->user('id'), 'Wallets.type' => 2, 'Wallets.applay_status' => 0])->sumOf('balance');
        $walletsDebitBalance = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->Auth->user('id'), 'Wallets.applay_status' => 0, 'Wallets.type' => 1])->sumOf('balance');
        $promoBalace = $walletsCreditBalance - $walletsDebitBalance;
        echo json_encode(['msg' => number_format((float) $promoBalace, 2, '.', '')]);
        exit;
    }

    public function chatCheckAuth($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->session()->read('Auth.User.id') == '') {
            echo json_encode(['status' => 'success', 'value' => 1]);
            exit();
        } else {
            echo json_encode(['status' => 'success', 'value' => 0]);
        }
        exit;
    }

    public function ajaxGmail($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GMAILINVITE'])->first();
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $data['email_id'];
                $subject = $emailMessage->display;
                $reference = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
                $link = HTTP_ROOT . 'invite/' . @$reference->first_name . '-' . @$reference->user_id . '?sod=w&som=e&utm_source=mailto';
                $txt = 'Hi!

So I started using the personal styling service, Drapefit, and I thought you’d love to try it too. Just tell them what you like and what you want to spend and they’ll send you items you’ll love. You can send back what you don’t want to keep for free. It’s so easy.' . $link;
                $sub = $subject;
                $url = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&su=" . $sub . "&body=" . $txt;
                echo json_encode(['status' => 'success', 'url' => $url]);
            } else {
                echo json_encode(['status' => 'success', 'emaillist' => 0]);
            }
        }

        exit;
    }

    public function invite($pagelink = null) {
        $this->viewBuilder()->layout('ajax');
        if ($pagelink) {
            $getId = $this->Custom->lastValue($pagelink);
            $getName = $this->Users->find('all')->where(['id' => $getId])->first()->name;
            $this->Cookie->write('refer_name', $getName);
            $this->Cookie->write('sod', @$_REQUEST['sod']);
            $this->Cookie->write('ref_id', $getId);
            if (1) {
                $friends = $this->ReferFriends->newEntity();
                $data['name'] = $this->Cookie->read('refer_name');
                $data['from_id'] = $this->Cookie->read('ref_id');
                $data['link_gender'] = $this->Cookie->read('sod');
                $data['your_unique_link'] = $pagelink;
                $data['to_id'] = 0;
                $data['email_address'] = '';
                $data['created'] = date('Y-m-d h:i:s');
                $data['paid_status'] = 0;
                $data['is_gender'] = 0;
                $data['is_uses'] = 0;
                $newEntity = $this->ReferFriends->patchEntity($friends, $data);
                $this->ReferFriends->save($friends);
            }
        }
        if (@$_REQUEST['sod'] != '') {
            if (@$_REQUEST['sod'] == 'w') {
                return $this->redirect(HTTP_ROOT . 'invite-women');
            } else if (@$_REQUEST['sod'] == 'm') {
                return $this->redirect(HTTP_ROOT . 'invite-men');
            } else if (@$_REQUEST['sod'] == 'k') {
                return $this->redirect(HTTP_ROOT . 'invite-kids');
            }
        } else {
            return $this->redirect(HTTP_ROOT);
        }
    }

    public function order() {
        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
            if ($getUsersDetails->is_redirect == 6) {
                return $this->redirect(HTTP_ROOT . 'order_review');
            }
            $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $this->request->session()->read('KID_ID')])->order(['created_dt' => 'DESC']);
            $productDetails = [];
            foreach ($OrderDetails as $product) {
                $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
            }
            $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $this->request->session()->read('KID_ID')])->count();
        } else {
            $getUsersDetails = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
            if ($getUsersDetails->is_redirect == 6) {
                return $this->redirect(HTTP_ROOT . 'order_review');
            }
            $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'work_status' => 2, 'payment_type' => 1, 'kid_id' => 0, 'user_id' => $this->Auth->user('id')])->order(['created_dt' => 'DESC']);
            $productDetails = [];
            foreach ($OrderDetails as $product) {
                $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
            }
            $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'kid_id' => 0, 'work_status' => 2, 'user_id' => $this->Auth->user('id')])->count();
        }

        $this->set(compact('OrderDetails', 'KidsOrderDetails', 'OrderDetailsCount', 'productDetails'));
    }

    public function unsubscribe() {
        if (@$_REQUEST['id']) {
            $getUserId = $this->Users->find('all')->where(['Users.unique_id' => $_REQUEST['id']])->first()->id;
            if (@$getUserId) {
                $emailPreferencesCount = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => @$getUserId])->count();
                if ($emailPreferencesCount >= 1) {
                    $this->EmailPreferences->updateAll(['preferences' => 1], ['user_id' => @$getUserId]);
                    $this->Flash->success(__('Your email is unsubscribe successfully'));
                } else {
                    $newEntity = $this->EmailPreferences->newEntity();
                    $data['user_id'] = @$getUserId;
                    $data['kid_id'] = 0;
                    $data['preferences'] = 1;
                    $newEntity = $this->EmailPreferences->patchEntity($newEntity, $data);
                    $this->EmailPreferences->save($newEntity);
                    $this->Flash->success(__('Your email is unsubscribe successfully'));
                }
            }
        }
    }

    public function ajaxAddressCount() {
        $this->viewBuilder()->layout('ajax');
        $ShippingAddressCount = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->count();
        echo json_encode(['count' => $ShippingAddressCount]);
        exit;
    }

    public function ajaxMenFit() {

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if ($data) {

                if (@$data['men_stas'] == 'men_stas') {

                    $userId = $this->Auth->user('id');

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
                                ]
                                , ['user_id' => $userId]);
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
                                ]
                                , ['user_id' => $userId]);
                    }



                    $checkExitData = $this->MenStyle->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

                    if ($checkExitData->id == '') {

                        $men_style = $this->MenStyle->newEntity();

                        $data['user_id'] = $this->Auth->user('id');

                        $men_style = $this->MenStyle->patchEntity($men_style, $data);

                        $this->MenStyle->save($men_style);
                    } else {

                        $this->MenStyle->updateAll(['linkdin_profile' => $data['linkdin_profile'],
                            'instagram' => $data['instagram'],
                            'twitter' => $data['twitter'],
                            'pinterest' => $data['pinterest']], ['user_id' => $userId]);
                    }

                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
                }
            }
        }

        exit;
    }

    public function ajaxMenStyle() {

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if ($data) {

                $userId = $this->Auth->user('id');

                if (@$data['men_stas'] == 'men_stas') {

                    $checkExitData = $this->MenFit->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

                    if (@$checkExitData->id == '') {

                        $MenFit = $this->MenFit->newEntity();

                        $data['user_id'] = $this->Auth->user('id');

                        $data['button_up_shirts_to_fit'] = implode(",", $data['button_up_shirts_to_fit']);

                        $data['your_pants_to_fit'] = implode(",", $data['your_pants_to_fit']);

                        $data['prefer_your_shorts'] = implode(",", $data['prefer_your_shorts']);

                        $data['jeans_to_fit'] = implode(",", $data['jeans_to_fit']);

                        $data['take_note_of'] = implode(",", $data['take_note_of']);

                        $data['prefer_color'] = !empty($data['prefer_color']) ? json_encode($data['prefer_color']) : '';

                        $MenFit = $this->MenFit->patchEntity($MenFit, $data);

                        $this->MenFit->save($MenFit);

                        $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $this->Auth->user('id')]);
                    } else {

                        $this->MenFit->updateAll([
                            'jeans_to_fit' => implode(",", $data['jeans_to_fit']),
                            'your_pants_to_fit' => implode(",", $data['your_pants_to_fit']),
                            'prefer_your_shorts' => implode(",", $data['prefer_your_shorts']),
                            'prefer_color' => !empty($data['prefer_color']) ? json_encode($data['prefer_color']) : '',
                            'take_note_of' => implode(",", $data['take_note_of'])
                                ], ['user_id' => $userId]);
                    }



                    $checkExitDataS = $this->MenStyleSphereSelections->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

                    if (@$checkExitDataS->id == '') {

                        $sphereSelections = $this->MenStyleSphereSelections->newEntity();

                        $data['user_id'] = $userId;

                        $data['style_sphere_selections_v2'] = implode(",", $data['style_sphere_selections_v2']);

                        $data['style_sphere_selections_v3'] = implode(",", $data['style_sphere_selections_v3']);

                        $data['style_sphere_selections_v4'] = implode(",", $data['style_sphere_selections_v4']);

                        $data['style_sphere_selections_v5'] = implode(",", $data['style_sphere_selections_v5']);

                        $sphereSelections = $this->MenStyleSphereSelections->patchEntity($sphereSelections, $data);

                        $this->MenStyleSphereSelections->save($sphereSelections);
                    } else {

                        $this->MenStyleSphereSelections->updateAll([
                            'style_sphere_selections_v2' => implode(",", $data['style_sphere_selections_v2']),
                            'style_sphere_selections_v3' => implode(",", $data['style_sphere_selections_v3']),
                            'style_sphere_selections_v4' => implode(",", $data['style_sphere_selections_v4']),
                            'style_sphere_selections_v5' => implode(",", $data['style_sphere_selections_v5'])
                                ], ['user_id' => $userId]);
                    }

                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
                }
            }
        }



        exit;
    }

    public function ajaxMenPrice() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['men_price'] == 'men_price') {
                    $checkExitData = $this->MenStyle->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                    if (@$checkExitData->id == '') {
                        $men_style = $this->MenStyle->newEntity();
                        $data['user_id'] = $this->Auth->user('id');
                        $men_style = $this->MenStyle->patchEntity($men_style, $data);
                        $this->MenStyle->save($men_style);
                        $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $this->Auth->user('id')]);
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

                    $checkExitDataS = $this->MenAccessories->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
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
                        $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $this->Auth->user('id')]);
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
        }
        exit;
    }

    public function ajaxMenCustom() {
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

    public function ajaxMenImg() {
        $this->viewBuilder()->layout('ajax');
        $userId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $data = $this->request->data;
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
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data[$imgCol] = $img;
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->CustomDesine->patchEntity($catelogs, $data);
                    $this->CustomDesine->save($Catelogs);
                } else {
                    $this->CustomDesine->updateAll([$imgCol => $img], ['user_id' => $userId]);
                }
                $imgurl = HTTP_ROOT . USER_CUSTOM . $img;
                echo json_encode(['status' => 1, 'img' => $imgurl]);
                exit;
            }
        }
        exit;
    }

    public function ajaxWemenFit() {

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if ($data) {

                if (@$data['wemen_stas'] == 'wemen_stas') {

                    $userId = $this->Auth->user('id');

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

                        $data1['parent'] = $data['parent'];

                        $data1['pregnant'] = $data['pregnant'];

                        $data1['occupation_v2'] = $data['your_occupation'];

                        $data1['skin_tone'] = $data['skin_tone'];

                        $data1['is_pregnant'] = $data['is_pregnant'];

                        $data1['comfortable_showing_off'] = implode(",", $data['comfortable_showing_off']);

                        $data1['keep_covered'] = implode(",", $data['keep_covered']);

                        $womenInformation = $this->WomenInformation->patchEntity($womenInformation, $data1);

                        $this->WomenInformation->save($womenInformation);
                    } else {

                        $this->WomenInformation->updateAll(['birthday' => $data['birthday'], 'parent' => $data['parent'], 'pregnant' => $data['pregnant'], 'is_pregnant' => $data['is_pregnant'], 'body_type' => $data['body_type'], 'occupation_v2' => $data['your_occupation'], 'skin_tone' => $data['skin_tone'], 'comfortable_showing_off' => implode(",", $data['comfortable_showing_off']), 'keep_covered' => implode(",", $data['keep_covered'])], ['user_id' => $userId]);
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

                        $table['expected_due_date'] = !empty($data['duedate'])?date('Y-m-d', strtotime($data['duedate'])):NULL;

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
                                    'expected_due_date' => !empty($data['duedate'])?date('Y-m-d', strtotime($data['duedate'])):NULL,
                                    'loose_fitted' => $data['loose_fitted'],
                                    'is_prefer_maternity' => $data['is_prefer_maternity']
                                ], ['user_id' => $userId]
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

                        $data3['brands'] = implode(",", $data['women_shoe_prefer']);

                        $data3['user_id'] = $userId;

                        $WomenShoePrefer = $this->WomenShoePrefer->patchEntity($WomenShoePrefer, $data3);

                        $this->WomenShoePrefer->save($WomenShoePrefer);
                    } else {

                        $this->WomenShoePrefer->updateAll(['brands' => implode(",", $data['women_shoe_prefer'])], ['user_id' => $userId]);
                    }

                    $WomenHeelHightPreferExit = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $userId])->first();

                    if ($WomenHeelHightPreferExit->id == '') {

                        $WomenHeelHightPrefer = $this->WomenHeelHightPrefer->newEntity();

                        $data4['height'] = implode(",", $data['womenHeelHightPrefer']);

                        $data4['user_id'] = $userId;

                        $WomenShoePrefer = $this->WomenHeelHightPrefer->patchEntity($WomenHeelHightPrefer, $data4);

                        $this->WomenHeelHightPrefer->save($WomenHeelHightPrefer);
                    } else {

                        $this->WomenHeelHightPrefer->updateAll(['height' => implode(",", $data['womenHeelHightPrefer'])], ['user_id' => $userId]);
                    }



                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
                }
            }
        }



        exit;
    }

    public function ajaxWeMenStyle() {

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if ($data) {

                if (@$data['wemen_fit'] == 'wemen_fit') {

                    $userId = $this->Auth->user('id');

                    $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();

                    if (@$checkExitWemenStyleSphereSelections->id == '') {

                        $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();

                        $table['user_id'] = $userId;

                        $table['style_sphere_selections_v2'] = implode(",", $data['style_sphere_selections_v2']);

                        $table['style_sphere_selections_v3'] = $data['style_sphere_selections_v3'];

                        $table['style_sphere_selections_v4'] = $data['style_sphere_selections_v4'];

                        $table['style_sphere_selections_v5'] = $data['style_sphere_selections_v5'];

                        $table['style_sphere_selections_v6'] = $data['style_sphere_selections_v6'];

                        $table['style_sphere_selections_v7'] = $data['style_sphere_selections_v7'];

                        $table['style_sphere_selections_v8'] = $data['style_sphere_selections_v8'];

                        $table['style_sphere_selections_v9'] = $data['style_sphere_selections_v9'];

                        $table['style_sphere_selections_v10'] = implode(",", $data['style_sphere_selections_v10']);

                        $table['wo_dress_length'] = implode(",", $data['wo_dress_length']);
                        $table['wo_top_half'] = implode(",", $data['wo_top_half']);
                        $table['wo_pant_length'] = implode(",", $data['wo_pant_length']);
                        $table['wo_pant_rise'] = implode(",", $data['wo_pant_rise']);
                        $table['wo_pant_style'] = implode(",", $data['wo_pant_style']);
                        $table['wo_appare'] = implode(",", $data['wo_appare']);
                        $table['wo_bottom_style'] = implode(",", $data['wo_bottom_style']);
                        $table['wo_top_style'] = implode(",", $data['wo_top_style']);

                        $table['style_sphere_selections_v3_3'] = implode(",", $data['style_sphere_selections_v3_3']);

                        $table['style_sphere_selections_v11'] = $data['style_sphere_selections_v11'];

                        $table['color_prefer'] = !empty($data['color_prefer']) ? json_encode($data['color_prefer']) : '';

                        $table['color_mostly_wear'] = implode(",", $data['color_mostly_wear']);

                        $table['missing_from_your_fIT'] = implode(",", $data['missing_from_your_fIT']);

                        $table['following_occasions'] = $data['following_occasions'];

                        $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);

                        $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);

                        $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                    } else {

                        $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v2' => implode(",", $data['style_sphere_selections_v2']), 'style_sphere_selections_v3' => $data['style_sphere_selections_v3'], 'style_sphere_selections_v4' => $data['style_sphere_selections_v4'], 'style_sphere_selections_v5' => $data['style_sphere_selections_v5'], 'style_sphere_selections_v6' => $data['style_sphere_selections_v6'], 'style_sphere_selections_v7' => $data['style_sphere_selections_v7'], 'style_sphere_selections_v8' => $data['style_sphere_selections_v8'], 'style_sphere_selections_v9' => $data['style_sphere_selections_v9'], 'style_sphere_selections_v10' => implode(",", $data['style_sphere_selections_v10']), 'style_sphere_selections_v3_3' => implode(",", $data['style_sphere_selections_v3_3']), 'color_prefer' => !empty($data['color_prefer']) ? json_encode($data['color_prefer']) : '', 'color_mostly_wear' => implode(",", $data['color_mostly_wear']), 'missing_from_your_fIT' => implode(",", $data['missing_from_your_fIT']), 'following_occasions' => $data['following_occasions'], 'style_sphere_selections_v11' => $data['style_sphere_selections_v11'], 'wo_dress_length' => implode(",", $data['wo_dress_length']), 'wo_top_half' => implode(",", $data['wo_top_half']), 'wo_pant_length' => implode(",", $data['wo_pant_length']), 'wo_pant_rise' => implode(",", $data['wo_pant_rise']), 'wo_pant_style' => implode(",", $data['wo_pant_style']), 'wo_appare' => implode(",", $data['wo_appare']), 'wo_bottom_style' => implode(",", $data['wo_bottom_style']), 'wo_top_style' => implode(",", $data['wo_top_style'])], ['user_id' => $userId]);
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

                        $this->WomenStyle->save($WomenStyle);
                    } else {

                        $this->WomenStyle->updateAll(['distressed_denim_non' => $data['distressed_denim_non'], 'distressed_denim_minimally' => $data['distressed_denim_minimally'], 'distressed_denim_fairly' => $data['distressed_denim_fairly'], 'distressed_denim_heavily' => $data['distressed_denim_heavily']], ['user_id' => $userId]);
                    }

                    $checkExitDataStyle = $this->WomenJeansStyle->find('all')->where(['user_id' => $userId])->first();

                    if (@$checkExitDataStyle->id == '') {

                        $womeneansStyle = $this->WomenJeansStyle->newEntity();

                        $data1['user_id'] = $userId;

                        $data1['jeans_style'] = implode(",", $data['jeans_style']);

                        $womeneansStyle = $this->WomenJeansStyle->patchEntity($womeneansStyle, $data1);

                        $this->WomenJeansStyle->save($womeneansStyle);
                    } else {

                        $this->WomenJeansStyle->updateAll(['jeans_style' => implode(",", $data['jeans_style'])], ['user_id' => $userId]);
                    }



                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
                }
            }
        }



        exit;
    }

    public function ajaxWeMenPrice() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['wemen_price'] == 'wemen_price') {
                    $checkExitData = $this->WomenStyle->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                    //echo $this->Auth->user('id');exit;
                    if (@$checkExitData->id == '') {
                        //echo "hello";exit;
                        $men_style = $this->WomenStyle->newEntity();
                        $data['user_id'] = $userId;
                        $men_style = $this->WomenStyle->patchEntity($men_style, $data);
                        $this->WomenStyle->save($men_style);
                        $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $this->Auth->user('id')]);
                    } else {
                        //echo "hii";exit;
                        $this->WomenStyle->updateAll([
                            'tops' => $data['tops'],
                            'bottoms' => $data['bottoms'],
                            'outwear' => $data['outwear'],
                            'jeans' => $data['jeans'],
                            'jewelry' => $data['jewelry'],
                            'accessproes' => $data['accessproes'],
                            'dress' => $data['dress'],
                                ], ['user_id' => $userId]);
                        $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $this->Auth->user('id')]);
                    }
                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/custom']);
                }
            }
        }

        exit;
    }

    public function ajaxWeMenCustom() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['wemen_custom'] == 'wemen_custom') {
                    if (@$data['mens_brands']) {
                        $this->MensBrands->deleteAll(['user_id' => $userId]);
                        foreach (@$data['mens_brands'] as $mens_brands) {
                            $newEntity1 = $this->MensBrands->newEntity();
                            $data['id'] = '';
                            $data['user_id'] = $userId;
                            $data['mens_brands'] = $mens_brands;
                            $newEntity1 = $this->MensBrands->patchEntity($newEntity1, $data);
                            $this->MensBrands->save($newEntity1);
                        }
                    }
                    if (@$data['profile_note']) {
                        $this->WomenStyle->updateAll(['profile_note' => $data['profile_note']], ['user_id' => $userId]);
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

    public function ajaxKidFit() {

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if ($data) {

                if (@$data['kids_stas'] == 'kids_stas') {

                    $userId = $this->Auth->user('id');

                    $kidId = $this->request->session()->read('KID_ID');

                    $checkExitKids = $this->KidsDetails->find('all')->where(['id' => $kidId])->first();

                    $this->KidsDetails->updateAll([
                        'kids_first_name' => $data['kids_first_name'],
                        'kids_birthdate' => $data['kids_birthdate'],
                        'kids_relationship_to_child' => $data['kids_relationship_to_child'],
                        'kids_clothing_gender' => $data['kids_clothing_gender'],
                        'tall_feet' => $data['tall_feet'],
                        'tell_inch' => $data['tell_inch'],
                        'weight_lb' => $data['weight_lb'],
                        'child_personality' => implode(",", $data['child_personality']),
                        'size_prefer_wear' => $data['size_prefer_wear'],
                        'prefer_color' => !empty($data['prefer_color']) ? json_encode($data['prefer_color']) : '',
                            ], ['id' => $kidId]);

                    if ($checkExitKids->is_progressbar == 0) {

                        $this->KidsDetails->updateAll(['is_progressbar' => 25], ['id' => $kidId]);
                    }



                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
                }
            }
        }



        exit;
    }

    public function ajaxKidFitBoy() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                if (@$data['kid_fit_boy'] == 'kid_fit_boy') {
                    $userId = $this->Auth->user('id');
                    $kidId = $this->request->session()->read('KID_ID');
                    $checkExitKidsize = $this->KidsSizeFit->find('all')->where(['kid_id' => $kidId])->first();

                    $this->KidsDetails->updateAll(['kids_frequency_arts_and_crafts' => $data['kids_frequency_arts_and_crafts'], 'kids_frequency_biking' => $data['kids_frequency_biking'], 'kids_frequency_dance' => $data['kids_frequency_dance'], 'kids_frequency_playing_outside' => $data['kids_frequency_playing_outside'], 'kids_frequency_musical_instruments' => $data['kids_frequency_musical_instruments'], 'kids_frequency_reading' => $data['kids_frequency_reading']], ['id' => $kidId]);

                    if (@$checkExitKidsize->id == '') {
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
                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
                }
            }
        }
        exit;
    }

    public function ajaxKidFitGirl() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                if (@$data['kid_fit_girl'] == 'kid_fit_girl') {
                    $userId = $this->Auth->user('id');
                    $kidId = $this->request->session()->read('KID_ID');
                    $checkExitKidsize = $this->KidsSizeFit->find('all')->where(['kid_id' => $kidId])->first();
                    $this->KidsDetails->updateAll(['kids_frequency_arts_and_crafts' => $data['kids_frequency_arts_and_crafts'], 'kids_frequency_biking' => $data['kids_frequency_biking'], 'kids_frequency_dance' => $data['kids_frequency_dance'], 'kids_frequency_playing_outside' => $data['kids_frequency_playing_outside'], 'kids_frequency_musical_instruments' => $data['kids_frequency_musical_instruments'], 'kids_frequency_reading' => $data['kids_frequency_reading']], ['id' => $kidId]);
                    if (@$checkExitKidsize->id == '') {
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
                            'stripes' => $data['stripes'],
                            'plaid' => $data['plaid'],
                            'polkadots' => $data['polkadots'],
                            'camo' => $data['camo'],
                            'animal_print' => $data['animal_print'],
                            'floral' => $data['floral'],
                            'gingham' => $data['gingham']
                                ], ['kid_id' => $kidId]);
                    }
                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
                }
            }
        }

        exit;
    }

    public function ajaxKidBoyPrice() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                $kidId = $this->request->session()->read('KID_ID');
                if (@$data['kid_boy_price'] == 'kid_boy_price') {
                    $checkExitData = $this->KidStyles->find('all')->where(['kid_id' => $kidId])->first();
                    if (@$checkExitData->id == '') {
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
                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/custom']);
                }
            }
        }
        exit;
    }

    public function ajaxKidGirlPrice() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                $kidId = $this->request->session()->read('KID_ID');
                if (@$data['kid_girl_price'] == 'kid_girl_price') {
                    $checkExitData = $this->KidStyles->find('all')->where(['kid_id' => $kidId])->first();
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
                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/custom']);
                }
            }
        }

        exit;
    }

    public function ajaxKidImg() {
        $this->viewBuilder()->layout('ajax');
        $kidId = $this->request->session()->read('KID_ID');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
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
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data[$imgCol] = $img;
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->CustomDesine->patchEntity($catelogs, $data);
                    $this->CustomDesine->save($Catelogs);
                } else {
                    $this->CustomDesine->updateAll([$imgCol => $img], ['kid_id' => $kidId]);
                }
                $imgurl = HTTP_ROOT . USER_CUSTOM . $img;
                echo json_encode(['status' => 1, 'img' => $imgurl]);
                exit;
            }
        }
        exit;
    }

    public function ajaxBoyCustom() {
        $this->viewBuilder()->layout('ajax');
        $kidId = $this->request->session()->read('KID_ID');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                if (@$data['boy_kid_custom'] == 'boy_kid_custom') {
                    $this->KidStyles->updateAll([
                        'brands' => implode(",", $data['brands']),
                        'profile_note' => $data['profile_note']
                            ], ['kid_id' => $kidId]);
                    $checkPagePosition = $this->KidsDetails->find('all')->where(['id' => $kidId])->first()->is_progressbar;
                    if (@$checkPagePosition != 100) {
                        $this->KidsDetails->updateAll(['is_progressbar' => 100, 'is_redirect' => '1'], ['id' => $kidId]);

                        $kidDetails = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $kidId])->first();
                        if ($kidDetails->is_progressbar == 100) {
                            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_PROFILE_COMPLETE'])->first();
                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                            $UserDetails = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();
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
                        if ($Usersdata->is_redirect == 0 && @$Usersdata->is_progressbar != 100) {
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
                        }

                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . $url]);
                    }
                }
            }
        }

        exit;
    }
    
    public function autocheckoutmail() {
        $notpaid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.created_dt <=' => date('Y-m-d H:i:s', strtotime('-16 days'))]);
        //pj($notpaid_users);exit;

        foreach ($notpaid_users as $notcheckout) {

            $paymentId = $notcheckout->id;

            $user_id = $notcheckout->user_id;

            $kid_id = $notcheckout->kid_id;

            $getUsersDetails = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user_id])->first();

            $getEmail = $this->Users->find('all')->where(['id' => $user_id])->first();

            // pj($getUsersDetails); exit;

            if ($kid_id != 0) {

                $getKidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();

                $prData = $this->Products->find('all')->where(['Products.kid_id' => $kid_id, 'Products.keep_status' => 0, 'Products.is_complete' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);

                $kid = $kid_id;

                $profileType = 3;
            } else {

                $kid = 0;

                $prData = $this->Products->find('all')->where(['user_id' => $user_id, 'keep_status' => 0, 'Products.is_complete' => 0, 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);

                $profileType = $getUsersDetails->gender;
            }

            //pj($prData);exit;

            $style_pick_total = 0;

            $discount_amt = $this->Custom->styleFitFee();

            foreach ($prData as $pd) {

                $style_pick_total += (double) $pd->sell_price;
            }

            $percentage = 25;

            $discount = ($percentage / 100) * $style_pick_total;

            $subTotal = $style_pick_total - $discount;

            $stylist_picks_subtotal = number_format($style_pick_total, 2);

            $keep_all_discount = number_format((!empty($discount) ? $discount : 0), 2);

            $style_fit_fee = number_format($discount_amt, 2);

            $amount = $style_pick_total - $style_fit_fee - 20;

            //echo $amount; exit;

            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();

            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $user_id])->first();

            $paymentG = $this->PaymentGetways->newEntity();

            $table1['user_id'] = $user_id;

            $table1['kid_id'] = $kid;

            $table1['emp_id'] = 0;

            $table1['status'] = 0;

            $table1['price'] = $subTotal;

            $table1['profile_type'] = $profileType;

            $table1['payment_type'] = 2;

            $table1['created_dt'] = date('Y-m-d H:i:s');

            $paymentG = $this->PaymentGetways->patchEntity($paymentG, $table1);

            $lastPymentg = $this->PaymentGetways->save($paymentG);

            //pj($lastPymentg); exit;

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
                'amount' => $amount,
                'invice' => @$lastPymentg->id,
                'refId' => 32,
                'companyName' => 'Drapefit',
            ];

            $message = $this->authorizeCreditCard($arr_user_info);

            //pj($message); exit;

            if (@$message['status'] == '1') {

                $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId'], 'auto_checkout' => 1], ['id' => $lastPymentg->id]);

                $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);

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

                $to = $getEmail->email;

                $name = $getUsersDetails->first_name . ' ' . $getUsersDetails->last_name;

                $from = $fromMail->value;

                $sitename = SITE_NAME;

                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                $subject = $emailMessage->display;
                $offerData = '<tr></tr>';
                $email_message = $this->Custom->order($emailMessage->value, $name, $sitename, $productData, $stylist_picks_subtotal, $subTotal, $style_fit_fee, $keep_all_discount, $offerData);
                $this->Custom->sendEmail($to, $from, $subject, $email_message);
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

                if ($kid_id != 0) {
                    @$kidId = $kid_id;
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => @$kidId]);
                    $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => $kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);

                    $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                }
            } else {

                $getErrorMeg = $this->Custom->getAllMeg($message['ErrorCode']);

                $this->Flash->error(__($message['ErrorMessage']));
            }
        }

        exit;
    }

    public function underConstruction() {
        $title_for_layout = "Under Construction | Drape fit";
        $metaKeyword = "";
        $metaDescription = "";
        $this->viewBuilder()->layout('default');
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function plusSize() {
        //******************
        // $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        // *****************

        $title_for_layout = "Plus Size Fit for Women | Personal Styling for Plus Size Women in USA";
        $metaKeyword = "Plus Size Best Online Clothes in USA, Casual Styles For Men, Fit Plus Size Women";
        $metaDescription = "Discover the perfect fit for plus size women with our curated collection of stylish and comfortable clothing options. Place your order now!";
        $this->viewBuilder()->layout('default');
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function maternity() {
        $title_for_layout = "Stylish Maternity Clothes Subscription Boxes in USA - Drape Fit";
        $metaKeyword = "Maternity Style Box,Maternity Clothes Style Box,Stylish Maternity Clothes, Maternity Clothes Subscription Box, Maternity Clothing Subscription Box, Pregnancy Clothing Subscription Box, Subscription Maternity Clothes, Stylish Maternity Clothing";
        $metaDescription = "Get the best Maternity Clothes Subscription Box online from Drape Fit. We offer personalized maternity clothes style box keeping your one-of-a-kind style in mind. Buy Now.";
        $this->viewBuilder()->layout('default');
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function petite() {
        $title_for_layout = "Stylish Petite Clothing Subscription Box | Short Girl Style Box -Drape Fit";
        $metaKeyword = "Petite Womens Clothing USA,Stylish Petite Clothing In USA, Petite Subscription Box, Petite Clothing Box, Stylish Petite Clothing, Short Girl Style Box";
        $metaDescription = "Explore our latest collection of petite clothing subscription box on Drape Fit. We handpicked short girl style box that perfectly fits your frame. Buy Now!";
        $this->viewBuilder()->layout('default');
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function womenJeans() {

        $this->viewBuilder()->layout('default');

        $title_for_layout = "Best Jeans Subscription Boxes for Women USA | Skinny Jeans Monthly Subscription Boxes | Drape Fit";

        $metaKeyword = "Best Jeans for Women USA,Skinny Jeans for Women USA, Best Jeans For Women Usa, Jeans Wear For Women, Female Jeans Types, Jeans Types For Women's, Skinny Jeans For Women Usa";

        $metaDescription = "Are you looking for Best Jeans For Women in USA? Drape Fit is one of the best branded online store which provides Jeans Wear For Women that perfectly suits your size and shape. Buy Now.";

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function womenBusiness() {
        $this->viewBuilder()->layout('default');

        $title_for_layout = "Women Business | Drape fit";

        $metaKeyword = "";

        $metaDescription = "";

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    //   public function activewear() {
    //     $this->viewBuilder()->layout('default');
    //     $title_for_layout = "activewear | Drape fit";
    //     $metaKeyword = "";
    //     $metaDescription = "";
    //     $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    // }

    public function bigTall() {
        $this->viewBuilder()->layout('default');

        $title_for_layout = "Big and Tall Outfits Subscription Boxes | Big And Tall Style Subscription Box | Drape Fit";

        $metaKeyword = "Big And Tall Style,Big And Tall Outfits,Big And Tall Style Box, Big Men's Clothing Subscription, Clothing Box Subscription For Men, Clothing Box For Men, Clothing Subscription Mens, Men’s Subscription Clothing, Clothing Boxes For Men, Clothing Subscription For Men";

        $metaDescription = "Get the best Clothing Box Subscription for Men online from Drape Fit. Our big and tall outfits, you'll get the right pieces that very well suits your personality.";

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function styleGuide() {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "Style Guide | Drape fit";
        $metaKeyword = "";
        $metaDescription = "";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function howitWorks() {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "How IT Works | Drape fit";
        $metaKeyword = "";
        $metaDescription = "";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function boxPricing() {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "Box Pricing | Drape fit";
        $metaKeyword = "";
        $metaDescription = "";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function personalStylelist() {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "Online Personal Stylelist | Personal Stylelist USA";
        $metaKeyword = "";
        $metaDescription = "We are the best online personal style provider in USA. Discover your style with the help of our online professional Personal Stylists!";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function invitemen() {
        $title_for_layout = "Monthly Subscription Boxes for Men | MenÃ¢â‚¬â„¢s monthly box subscription | MenÃ¢â‚¬â„¢s monthly fashion box";
        $metaKeyword = "Monthly Subscription Boxes for Men,menÃ¢â‚¬â„¢s monthly box subscription,menÃ¢â‚¬â„¢s monthly fashion box,menÃ¢â‚¬â„¢s clothing subscription box,MenÃ¢â‚¬â„¢s Clothing Subscription,clothingÃ‚Â subscriptionÃ‚Â boxÃ‚Â forÃ‚Â men,best menÃ¢â‚¬â„¢s fashion subscription boxes,cool subscription boxes for men";
        $metaDescription = "Browse the wide range of latest MenÃ¢â‚¬â„¢s fashion clothing with top brands and find the perfect fit for you! Complete your Style FIT and get an expert personal stylist for you! No hidden cost and shipping is always free!";
        $this->viewBuilder()->layout('default');
        $refname = $this->Cookie->read('refer_name');
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'refname'));
    }

    public function invitewomen() {

        $title_for_layout = "Women's ClothingMonthly Subscription Box| Fashion Subscription Boxes For Women| Drape fit";
        $metaKeyword = "Monthly Subscription Boxes for Women,Subscription Boxes for women,Fashion Subscription Boxes for Women,Fashion Subscription Boxes for Women,Women's Clothing Monthly Subscription Box,best subscription boxes for women,women's monthly clothing subscription,women's clothing subscription service,womens clothes delivered monthly,women's personal stylist clothing subscription,Subscription Boxes For Women,Monthly Subscription Boxes For Women,Monthly Boxes For Women,Women's Clothing Subscription Box,Clothing Boxes For Women";
        $metaDescription = "With ourMonthly Fashion Subscription Boxes for Women, we help you save a lot of time and money. Get trendy and stylish clothing boxes for women right here at Drape fit.";
        $this->viewBuilder()->layout('default');
        $refname = $this->Cookie->read('refer_name');
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'refname'));
    }

    public function invitekids() {
        $title_for_layout = "Kids Clothes Subscription Boxes | Monthly Clothing Subscription Boxes For kids |Monthly Subscription Boxes for Kids";
        $metaKeyword = "Kids Clothes Subscription Boxes,Monthly Clothing Subscription Boxes For kids,Monthly Subscription Boxes for Kids,subscription boxes for children,subscription boxes for boys,monthly subscriptions for kids";
        $metaDescription = "Now itÃ¢â‚¬â„¢s time for upgrade your childrenÃ¢â‚¬â„¢s wardrobe with these trendy and cute kids fashion clothing with top brands! Give your kids a new fashion look at great deals! Shop more and enjoy free shipping worldwide!";
        $this->viewBuilder()->layout('default');
        $refname = $this->Cookie->read('refer_name');
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'refname'));
    }

    public function authorizeCreditCardRefund($arr_data = []) {
        extract($arr_data);
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
        $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);
        $refId = 'ref' . time();
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("voidTransaction");
        $transactionRequestType->setRefTransId($refTransId);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        $msg = array();
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

    public function homepagePopupbox() {
        $this->viewBuilder()->setLayout('ajax');
        $this->request->session()->write('popupp', '1');
        echo json_encode(['status' => 1]);
        exit;
    }

    public function checkHomepagePopupbox() {
        $this->viewBuilder()->setLayout('ajax');
        //$this->request->session()->write('popupp', '');
        //echo $this->request->session()->read('popupp'); exit;
        if ($this->request->session()->read('popupp') == '') {
            echo json_encode(['status' => 1]);
        } else {
            echo json_encode(['status' => 2]);
        }

        exit;
    }

    public function addNewCard($token_key = null) {
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();
        $stripe_key_arr = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );
        $chk_usr_data = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
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
            return $this->redirect(HTTP_ROOT . 'welcome/addressbook');
        }
        $this->set(compact('client_secret', 'token_key','stripe_api_key'));
    }

    public function cardStatus($token_key = null) {
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();
        $stripe_key_arr = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );
        $chk_usr_data = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
        if (!empty($chk_usr_data->stripe_customer_key)) {

            \Stripe\Stripe::setApiKey($stripe_key_arr['secret_key']);
            $stripe = new \Stripe\StripeClient($stripe_key_arr['secret_key']);

            if ($_GET['redirect_status'] == "succeeded") {

                $payment = $stripe->paymentMethods->all(
                        ['customer' => $chk_usr_data->stripe_customer_key
                            , 'type' => 'card']
                );

                $dt_li = $payment->data[0];
                $setup_intent = $_GET['setup_intent'];
                $setup_intent_client_secret = $_GET['setup_intent_client_secret'];
                $newData['user_id'] = $this->Auth->user('id');
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
                if ($token_key == "payment") {
                    return $this->redirect(HTTP_ROOT . 'welcome/payment');
                } else if ($token_key == "customer-order-review") {
                    return $this->redirect(HTTP_ROOT . 'customer-order-review');
                } else if ($token_key == "account") {
                    return $this->redirect(HTTP_ROOT . 'account');
                } else {
                    return $this->redirect(HTTP_ROOT . 'welcome/style');
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
                    return $this->redirect(HTTP_ROOT . 'welcome/style');
                }
            }
        } else {
            $this->Flash->error(__('Add address before add card '));
            return $this->redirect(HTTP_ROOT . 'welcome/addressbook');
        }
        $this->set(compact('stripe_api_key'));
    }

    public function notStripCustomerList() {

        $this->Users->hasMany('card_detl', ['className' => 'PaymentCardDetails', 'foreignKey' => 'user_id']);
        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $userDetails = $this->Users->find('all')->contain(['UserDetails', 'card_detl']);  //->where(['Users.stripe_customer_key IS' => NULL]);
        $sort = [];
        $keyy = '';
        $srt = '';
        if (!empty($_GET['sort'])) {
            $sort = explode('-', $_GET['sort']);
            $keyy = $sort[0];
            $srt = $sort[1];
            if ($sort[0] == "stripe_customer_key") {
                $userDetails = $userDetails->order(['Users.stripe_customer_key' => $sort[1]]);
            }
            if ($sort[0] == "email") {
                $userDetails = $userDetails->order(['Users.email' => $sort[1]]);
            }
            if ($sort[0] == "id") {
                $userDetails = $userDetails->order(['Users.id' => $sort[1]]);
            }
        }
        $this->set(compact('userDetails', 'keyy', 'srt'));
    }

    public function stripeRegisterCustomer($id) {
        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $id])->first();
        $shipping_address = $this->ShippingAddress->find('all')->where(['user_id' => $id]);
        $payment_card_details = $this->PaymentCardDetails->find('all')->where(['user_id' => $id]);
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
            $stripe_api_key = $this->Custom->getStripeKey();
            $stripe_key_arr = array(
                // "secret_key"      => "Your_Stripe_API_Secret_Key",
                // "publishable_key" => "Your_API_Publishable_Key"             
                "secret_key" => $stripe_api_key['secret_key'],
                "publishable_key" => $stripe_api_key['publishable_key']
            );

            \Stripe\Stripe::setApiKey($stripe_key_arr['secret_key']);
            $stripe = new \Stripe\StripeClient($stripe_key_arr['secret_key']);
            try {
                $name = $postData['name'];
                $email = $postData['email'];
                $customer = \Stripe\Customer::create(array(
                            'name' => $name,
                            'email' => $email,
                            'description' => $postData['user_id'] . ':- ' . $name . ' customer key creating ',
                            "address" => ["city" => $postData['city'], "country" => $postData['country'], "line1" => $postData['line1'], "line2" => $postData['line2'], "postal_code" => $postData['zipcode'], "state" => $postData['state']]
                ));
                $this->Users->updateAll(['stripe_customer_key' => $customer->id], ['id' => $postData['user_id']]);
                $this->Flash->success(__($name . '  added in stripe'));
            } catch (Exception $e) {
                $this->Flash->error(__('Customer not added, try after some time...'));
            }
            return $this->redirect($this->referer());
        }

        $this->set(compact('userDetails', 'shipping_address', 'payment_card_details'));
    }

    public function addCardStripe($id) {
        $payment_card_details = $this->PaymentCardDetails->find('all')->where(['id' => $id])->first();
        $userDetails = $this->Users->find('all')->where(['id' => $payment_card_details->user_id])->first();
        $uuser_id = $payment_card_details->user_id;
        $client_secret = '';
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey(); 
        $stripe_key_arr = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"             
            "secret_key" => $stripe_api_key['secret_key'],
            "publishable_key" => $stripe_api_key['publishable_key']
        );

        if (!empty($userDetails->stripe_customer_key)) {

            \Stripe\Stripe::setApiKey($stripe_key_arr['secret_key']);
            $stripe = new \Stripe\StripeClient($stripe_key_arr['secret_key']);

            $intent = $stripe->setupIntents->create(
                    [
                        'customer' => $userDetails->stripe_customer_key, //'{{CUSTOMER_ID}}',
                        'payment_method_types' => ['card'],
                    ]
            );

            $client_secret = $intent->client_secret;
        } else {
            $this->Flash->success(__('Customer not added, try after some time...'));
            return $this->redirect($this->referer());
        }

        $this->set(compact('payment_card_details', 'userDetails', 'client_secret', 'id', 'uuser_id','stripe_api_key'));
    }

    public function striprCardStatus($id, $user_id) {
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        $stripe_api_key = $this->Custom->getStripeKey();
        $stripe_key_arr = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
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
                        ['customer' => $chk_usr_data->stripe_customer_key
                            , 'type' => 'card']
                );

                $dt_li = $payment->data[0];
                $setup_intent = $_GET['setup_intent'];
                $setup_intent_client_secret = $_GET['setup_intent_client_secret'];
                $newData['id'] = $id;
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
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('Card not added '));

                return $this->redirect($this->referer());
            }
        } else {
            $this->Flash->error(__('Add address before add card '));
            return $this->redirect($this->referer());
        }
    }

    public function reAuthPayment($page, $id) {
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

        $required_data = [
            'client_secret' => $payment_intent['client_secret'],
            'payment_method' => $payment_intent['charges']['data'][0]['payment_method']
        ];

//        echo $payment_intent_id = $payment_dil->payment_intent_id;
//        echo "<pre>";
//        print_r($required_data);
//        echo "</pre>";
//        exit;

        $this->set(compact('required_data', 'page', 'id','payment_dil', 'stripe_api_key'));
    }

    public function processStyleFitReAuth($id = null)
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
        if (!empty($payment_intent['charges']['data']) && !empty($payment_intent['charges']['data'][0]['balance_transaction'])) {
            $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Onboard_in_Progress')], ['id' => $id]);
        }
        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id' => $payment_intent['charges']['data'][0]['balance_transaction'], 'charge_id' => $payment_intent['charges']['data'][0]['id'], 'receipt_url' => $payment_intent['charges']['data'][0]['receipt_url']], ['id' => $id]);

        $this->request->session()->write('PYMID', '');

        $chk_usr_data = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();

        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
        } else {
            $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
        }



        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $profile_type = 3;
            $data['kid_id'] = $this->request->session()->read('KID_ID');
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'PaymentGetways.kid_id' => $this->request->session()->read('KID_ID'), 'user_id' => $this->Auth->user('id')])->count();
        } elseif ($this->request->session()->read('PROFILE') == 'MEN') {
            $data['kid_id'] = 0;
            $profile_type = 1;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $this->Auth->user('id')])->count();
        } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {
            $data['kid_id'] = 0;
            $profile_type = 2;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $this->Auth->user('id')])->count();
        }
        $paymentId = $id;
        $this->request->session()->write('PYMID', $paymentId);
        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'is_billing' => 1])->first();

        //check assgine the employ to assgine to stylest
        // $getpaymentFirstTime = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();

        // if ($this->request->session()->read('PROFILE') == 'KIDS') {
        //     $delivery_id = $this->DeliverDate->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID')])->order(['id' => 'DESC'])->first();
        // } else {
        //     $delivery_id = $this->DeliverDate->find('all')->where(['user_id' => $this->Auth->user('id')])->order(['id' => 'DESC'])->first();
        // }

        $getpaymentFirstTime = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();

        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $dataxcxc['user_id'] = $this->Auth->user('id');
            $dataxcxc['kid_id'] = $this->request->session()->read('KID_ID');
            $dataxcxc['date_in_time'] = date('l, F d, Y', strtotime(' + 7 days'));
            $entityxcxc = $this->DeliverDate->newEntity();
            $entityxcxc = $this->DeliverDate->patchEntity($entityxcxc, $dataxcxc);
            $this->DeliverDate->save($entityxcxc);
            $delivery_id = $this->DeliverDate->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID')])->order(['id' => 'DESC'])->first();
        } else {
            $dataxcxc['user_id'] = $this->Auth->user('id');
            $dataxcxc['date_in_time'] = date('l, F d, Y', strtotime(' + 7 days'));
            $entityxcxc = $this->DeliverDate->newEntity();
            $entityxcxc = $this->DeliverDate->patchEntity($entityxcxc, $dataxcxc);
            $this->DeliverDate->save($entityxcxc);
            $delivery_id = $this->DeliverDate->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0])->order(['id' => 'DESC'])->first();
        }

        $this->PaymentGetways->updateAll(['delivery_id' => $delivery_id->id], ['id' => $paymentId]);

        if ($getpaymentFirstTime->payment_type == 1) {
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                @$kidId = $this->request->session()->read('KID_ID');
                $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => @$kidId]);
                $kid_id = $this->request->session()->read('KID_ID');
            } else {
                $kid_id = 0;
                $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
            }
        }


        if (@$getpaymentFirstTime->kid_id != '') {
            $getDetailsEmp = $this->CustomerStylist->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => $getpaymentFirstTime->kid_id])->first();
        } else {
            $getDetailsEmp = $this->CustomerStylist->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
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

        $getId = $this->Auth->user('id');
        $updateId = $id;

        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId])->first();
        $checkUser = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId, 'PaymentGetways.payment_type' => 1])->first();
        $card_details = $this->PaymentCardDetails->find('all')->where(['id' => $checkUser->payment_card_details_id])->first();
        $bil_address = $this->ShippingAddress->find('all')->where(['user_id' => $this->Auth->user('id'), 'is_billing' => 1])->first();
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
            $count_data = $this->Custom->ToOrdinal(empty($paymentDetails) ? 1 : $paymentDetails->count);
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

        $to = $this->Auth->user('email');

        $name = $this->Auth->user('name');

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
        return $this->redirect(HTTP_ROOT . 'payment-success');
    }

    public function processOrderReAuth($id = null)
    {
        $this->loadModel('UserUsesOfferCode');
        $this->viewBuilder()->layout('ajax');
        $message['Success'] = "";

        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
            $kid = $this->request->session()->read('KID_ID');
            $profileType = 3;
            ///////$this->Notifications->updateAll(['is_read' => 1], ['kid_id' => @$this->request->session()->read('KID_ID')]);
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();
            $paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            //$finlizePaymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 2])->order(['id' => 'DESC'])->first();
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.kid_id !=' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $kidcount = $prData->count();
        } else {
            $kid = 0;
            if ($this->request->session()->read('PROFILE') == 'WOMEN') {
                $profileType = 2;
            } else {
                $profileType = 1;
            }
            /////// $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $this->Auth->user('id'), 'kid_id' => 0]);
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
            $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            //$finlizePaymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 2])->order(['id' => 'DESC'])->first();
            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
        }


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

        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $payment_dil->user_id, 'is_billing' => 1])->first();
        if (empty($billingAddress)) {
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $payment_dil->user_id])->first();
        }
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

        $payment_intent_id = $payment_dil->payment_intent_id;

        $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        $tx_id = $payment_intent['charges']['data'][0]['balance_transaction'];
        $message['Success'] = " Successfully created transaction with Transaction ID: " . $tx_id . "\n";
        $message['TransId'] = $tx_id;
        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id' => $payment_intent['charges']['data'][0]['balance_transaction'], 'charge_id' => $payment_intent['charges']['data'][0]['id'], 'receipt_url' => $payment_intent['charges']['data'][0]['receipt_url']], ['id' => $id]);
        //pj($message);exit;

        /**         * */
        $data = [];
        $data['paymentID'] = $payment_dil->parent_id;
        $payment_check = $this->Payments->find('all')->where(['payment_id' => $data['paymentID']])->order(['id' => 'DESC'])->first();
        $data['promoprice'] = $payment_check->promo_balance;
        $data['walletCheck'] = $payment_check->wallet_check;
        $data['stotal'] = $payment_check->sub_toal;
        $data['wallet'] = $payment_check->wallet_balance;
        $data['stylist_picks_subtotal'] = $payment_check->stylist_picks_subtotal;
        $data['style_fit_fee'] = $payment_check->style_fit_fee;
        $data['keep_all_discount'] = $payment_check->keep_all_discount;
        $data['total'] = $payment_check->total_price;
        $data['sales_tax'] = $payment_check->sales_tax;

        if ($data['total'] != 0) {
            $this->PaymentGetways->updateAll(['is_style_fee' => 1], ['id' => $paymentId]);
            $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId']], ['id' => $id]);
        }


        $cpaymentCheck = $this->PaymentGetways->find('all')->where(['id' => $id])->first();
        $checkAssigneStylest = $this->CustomerStylist->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id')])->first();
        if ($checkAssigneStylest->id != '') {
            if ($cpaymentCheck->count == 1) {
                $this->PaymentGetways->updateAll(['emp_id' => $checkAssigneStylest->employee_id], ['id' => $id]);
            }
        }
        if (@$data['promoprice'] != '') {
            $walletsEnRE = $this->Wallets->newEntity();
            $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
            $walletsEnRE->type = 2; //credit
            $walletsEnRE->balance = $data['promoprice'];
            $walletsEnRE->created = date('Y-m-d h:i:s');
            $walletsEnRE->applay_status = 0;
            $this->Wallets->save($walletsEnRE);
        }

        if (@$data['promoprice'] != '') {
            if (@$data['walletCheck'] == 1) {
                $price = $data['promoprice'] + $data['wallet'];
            } else {
                $price = $data['promoprice'];
            }

            if (@$data['stotal'] <= $price) {
                $remening = $data['stotal'];
            } else {
                $remening = $price;
            }
            $walletsd = $this->Wallets->newEntity();
            $walletsd->user_id = $this->request->session()->read('Auth.User.id');
            $walletsd->type = 1; //debit
            $walletsd->balance = $remening;
            $walletsd->created = date('Y-m-d h:i:s');
            $walletsd->applay_status = 0;
            $this->Wallets->save($walletsd);
        }
        $aprice = $data['wallet'] - $data['promoprice'];
        if ($data['stotal'] > $aprice) {
            $price = $data['stotal'] - $aprice;
        } else {
            $price = 0;
        }
        $getUsesPromocode = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']]);
        $getUsesPromocodeExit = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']])->first();
        if ($getUsesPromocodeExit->id != '') {
            foreach ($getUsesPromocode as $promo) {
                $UserUsesPromocode = $this->UserUsesPromocode->newEntity();
                $UserUsesPromocode->user_id = $this->request->session()->read('Auth.User.id');
                $UserUsesPromocode->promocode = $promo->code;
                $UserUsesPromocode->apply_dt = date('Y-m-d h:i:s');
                $UserUsesPromocode->price = $promo->price;
                $this->UserUsesPromocode->save($UserUsesPromocode);
            }
        }

        $payment = $this->Payments->newEntity();
        if (!empty($payment_check)) {
            $table['id'] = $payment_check->id;
        }
        $table['user_id'] = $this->Auth->user('id');
        $table['payment_id'] = $data['paymentID'];
        $table['sub_toal'] = $data['stotal'];

        $table['paid_status'] = 1;
        $table['created_dt'] = date('Y-m-d H:i:s');
        $table['product_ids'] = @implode(',', @$product_ids);
        $table['wallet_balance'] = $data['wallet'];
        $table['promo_balance'] = $data['promoprice'];
        $payment = $this->Payments->patchEntity($payment, $table);
        $lastPyment = $this->Payments->save($payment);
        $i = 1;
        $productData = '';
        foreach ($prData as $dataMail) {
            if ($dataMail->keep_status == 3) {
                $priceMail = $dataMail->sell_price;
                $this->Products->updateAll(['is_complete' => '1'], ['id' => $dataMail->id]);
            } else {
                $priceMail = 0;
            }
            if ($dataMail->keep_status == 3) {
                $this->Products->updateAll(['is_complete' => '1', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                $keep = 'Keeps';

                $chk_prd_dtls = $this->Products->find('all')->where(['id' => $dataMail->id])->first();

                if (!empty($chk_prd_dtls) && !empty($chk_prd_dtls->inv_product_id)) {
                    $newLogArr = [];
                    $newLogArr['product_id'] = $chk_prd_dtls->inv_product_id;
                    $newLogArr['user_id'] = $this->request->session()->read('Auth.User.id');
                    $newLogArr['action'] = 'customer_keep';
                    $newLogArr['created_on'] = date('Y-m-d H:i:s');
                    $newDtRow = $this->InProductLogs->newEntity();
                    $newDtRow = $this->InProductLogs->patchEntity($newDtRow, $newLogArr);
                    $this->InProductLogs->save($newDtRow);
                    //                            echo "<pre>";print_r($newDtRow);echo "</pre>";
                    $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Customer Keep'], ['id' => $chk_prd_dtls->inv_product_id]);
                }
            } elseif ($dataMail->keep_status == 2) {
                $keep = 'Exchange';
                $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 1], ['id' => $dataMail->id]);
            } else if ($dataMail->keep_status == 1) {
                $keep = 'Return';
                $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
            }
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

                                " . $keep . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               " . $dataMail->size . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               $" . number_format($priceMail, 2) . "

                            </td>

                        </tr>";
            $this->Products->updateAll(['checkedout' => 'Y'], ['id' => $dataMail->id]);
            $i++;
        }
        $this->Products->updateAll(['is_payment_fail' => 0], ['payment_id' => $paymentId]);

        $applied_promo_codes = $this->Custom->getPromoCode($paymentId);
        $offerData = '';

        if (@$data['walletCheck'] == 1) {
            $offerData .= "<tr style='display: inline-block; width: 100%;'>
                            <td colspan='5' style='text-align: left;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: left; width: 49%;'>
                             Wallet applied 
                            </td>
                            <td  style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: right; width: 49%;'>
                               " . '-$' . number_format($data['wallet'], 2) . "
                            </td>
                           
                        </tr>";
        }


        foreach ($applied_promo_codes as $cup_a) {
            $offerData .= "<tr style='display: inline-block; width: 100%;'>
                            <td colspan='5' style='text-align: left;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: left; width: 49%;'>
                              " . $cup_a->code . " applied 
                            </td>
                            <td  style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: right; width: 49%;'>
                               " . '-$' . number_format($cup_a->price, 2) . "
                            </td>
                           
                        </tr>";
        }




        if ($paymentId) {
            $this->UserAppliedCodeOrderReview->deleteAll(['payment_id' => $data['paymentID']]);
            $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
            $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 3])->Count();
            $exCountretun = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status' => 1])->Count();
            $exCountexchange = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status ' => 2, 'is_complete' => 0])->Count();
            $exCountreturn = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1])->Count();
            $lastCount = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1, 'is_altnative_product' => 0])->Count();

            if (@$productCount == $exCountretun + $exCountKeeps) {
                if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                }

                $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
            }

            if (@$productCount == $lastCount) {
                if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                }

                $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
            }

            if (@$productCount == @$exCountKeeps) {
                if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                }
                $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
            } else if (@$productCount == @$exCountretun) {
                if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                }
                $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
            } else if (@$exCountexchange == @$productCount) {
                if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $this->request->session()->read('KID_ID')]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
                }

                $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
            } else if (@$exCountexchange >= 1) {
                if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $this->request->session()->read('KID_ID')]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
                }
                $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
            } else if (@$exCountreturn >= 1) {
                if (@$exCountreturn == @$productCount) {
                    if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                        $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                    } else {
                        $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                    }
                    $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                }
            }
        }


        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
            $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => @$this->request->session()->read('KID_ID')]);
        } else {
            $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $this->Auth->user('id'), 'kid_id' => 0]);
        }
        $gtotal = $data['stotal'];
        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $to = $this->Auth->user('email');
        $name = $this->Auth->user('name');
        $from = $fromMail->value;
        $sitename = SITE_NAME;

        $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
        $subject = $emailMessage1->display . ' #DFPYMID' . $paymentId;
        //echo $offerData; exit;
        if ($data['total'] == 0) {
            $total = '0.00';
        } else {
            $total = $data['total'];
        }
        $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $data['stylist_picks_subtotal'], $total, $data['style_fit_fee'], $data['keep_all_discount'], $refundamount = '', $gtotal, $offerData, $data['sales_tax'], '#DFPYMID' . $paymentId);
        $this->Custom->sendEmail($to, $from, $subject, $email_message);
        // $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);
        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
        $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

        //Refer user to bonus
        $paymet_chk = $this->PaymentGetways->find('all')->where(['user_id' => $this->Auth->user('id'), 'payment_type' => 2])->count();
        if ($paymet_chk >= 1) {
            $check_refer_list = $this->ReferFriends->find('all')->where(['to_id' => $this->Auth->user('id')])->first();
            if (!empty($check_refer_list) && $check_refer_list->paid_status == 0) {
                $new_wallet_bal = $this->Wallets->newEntity();
                $new_wallet_bal->user_id = $check_refer_list->from_id;
                $new_wallet_bal->type = 2;
                $new_wallet_bal->balance = 25;
                $new_wallet_bal->created = date('Y-m-d h:i:s');
                $new_wallet_bal->applay_status = 0;
                $this->Wallets->save($new_wallet_bal);
                $this->ReferFriends->updateAll(['paid_status' => 1], ['id' => $check_refer_list->id]);
            }
        }
        $this->UserAppliedCodeOrderReview->updateAll(['is_ordered' => 1], ['payment_id' => $paymentId]);
        $this->UserUsesOfferCode->updateAll(['is_ordered' => 1], ['payment_id' => $paymentId]);

        return $this->redirect(HTTP_ROOT . 'payment-success');
        /**         * */
    }

    public function cronjobparentStylfitReAuth($id = null)
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

        $paymentDetails = $payment_dil = $this->PaymentGetways->find('all')->where(['id' => $id])->first();

        $payment_intent_id = $payment_dil->payment_intent_id;

        $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        $tx_id = $payment_intent['charges']['data'][0]['balance_transaction'];
        $message['Success'] = " Successfully created transaction with Transaction ID: " . $tx_id . "\n";
        $message['TransId'] = $tx_id;
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Onboard_in_Progress')], ['id' => $id]);

        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id' => $payment_intent['charges']['data'][0]['balance_transaction'], 'charge_id' => $payment_intent['charges']['data'][0]['id'], 'receipt_url' => $payment_intent['charges']['data'][0]['receipt_url']], ['id' => $id]);

        $getingData = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => 1, 'kid_id' => '0', 'autoMentions' => 0, 'user_id' => $payment_dil->user_id])->first();
        $this->Users->hasOne('usrdet', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $this->Users->hasMany('addressess', ['className' => 'ShippingAddress', 'foreignKey' => 'user_id']);
        $this->Users->hasMany('card_detl', ['className' => 'PaymentCardDetails', 'foreignKey' => 'user_id']);
        $getUsreDetails = $this->Users->find('all')->contain(['addressess', 'card_detl', 'usrdet'])->where(['Users.id' => $getingData->user_id])->first();
        $planId = $getingData->id;
        $updateId = $paymentId = $id;

        $this->LetsPlanYourFirstFix->updateAll(['applay_dt' => date('Y-m-d H:i:s')], ['id' => $planId]);
        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId])->first();
        $checkUser = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId, 'PaymentGetways.payment_type' => 1])->first();

        if ($checkUser->payment_type == 1) {
            if ($getingData->kid_id != '') {
                @$kidId = $getingData->kid_id;
                $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => @$checkUser->kid_id]);
                $kid_id = $getingData->kid_id;
            } else {
                $kid_id = 0;
                $this->Users->updateAll(['is_redirect' => 2], ['id' => @$checkUser->user_id]);
            }
        }



        if ($paymentDetails->profile_type == 1) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
        } elseif ($paymentDetails->profile_type == 2) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
        } elseif ($paymentDetails->profile_type == 3) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE_KID'])->first();
        }

        $enty = $this->DeliverDate->newEntity();
        $date = date('Y-m-d');
        $dateTime = date('l, F d, Y', strtotime($date . ' + 7 days'));
        $data['date_in_time'] = $dateTime;
        $data['weeks'] = 0;
        $data['is_send_me'] = 0;
        $data['user_id'] = $checkUser->user_id;
        $data['kid_id'] = @$kidId;
        $user = $this->DeliverDate->patchEntity($enty, $data);
        $this->DeliverDate->save($user);
        $this->PaymentGetways->updateAll(['delivery_id' => $user->id], ['id' => $updateId]);

        $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $getingData->user_id, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $paymentDetails->profile_type, 'PaymentGetways.payment_type' => 1])->count();
        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUCCESS_PAYMENT'])->first();
        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $stylefee = $this->Settings->find('all')->where(['Settings.name' => 'style_fee'])->first();

        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getingData->user_id, 'is_billing' => 1])->first();
        $full_address = $billingAddress->address . ((!empty($billingAddress->address_line_2)) ? '<br>' . $billingAddress->address_line_2 : '') . '<br>' . $billingAddress->city . ', ' . $billingAddress->state . '<br>' . $billingAddress->country . ' ' . $billingAddress->zipcode;
        $feeprice = $stylefee->value;
        $name = $getUsreDetails->name;
        $from = $fromMail->value;
        $subject = $emailMessage->display . ' #DFPYMID' . $updateId;
        $sitename = SITE_NAME;
        $usermessage = $message['Success'];
        $sumitted_date = date_format($checkUser->created_dt, 'm/d/Y');
        $paid_amount = "$ " . number_format($checkUser->price, 2);
        $last_4_digit = substr($cardDetails->card_number, -4);
        $email_message = $this->Custom->paymentEmail($emailMessage->value, $name, $usermessage, $sitename, $message['TransId'], $paid_amount, $sumitted_date, $cardDetails->card_type, $last_4_digit, $usr_name, $full_address, $feeprice);
        $getUsreDetails->email;
        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

        $this->loadModel('SmsSettings');
        $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'FITBOX_SCHEDULED_SMS'])->first();
        if (!empty($get_sms_temp)) {
            $count_data = $this->Custom->ToOrdinal(empty($paymentCount) ? 1 : $paymentCount);
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

        if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {
            $supportstatus = "Send";
        } else {
            $supportstatus = "Faild";
        }
        if ($this->Custom->sendEmail($getUsreDetails->email, $from, $subject, $email_message)) {
            $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 1], ['id' => $planId]);
            $process = 'boxUpdate()';
            $kidId = $kid_id;
            $kidName = $kidsname;
            $email = $getUsreDetails->email;
            $subject = $subject;
            $status = 'Send';
            $userId = $user_id;
            $client = 'Client';
            $upportemail = $toSupport;
            $support_subject = $subject;
            $supportstatus = $supportstatus;
            $payment_message = json_encode($message);
            $transctions_id = $message['TransId'];
            $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
        } else {
            $process = 'boxUpdate()';
            $kidId = $kid_id;
            $kidName = $kidsname;
            $email = $getUsreDetails->email;
            $subject = $subject;
            $status = 'faild';
            $userId = $user_id;
            $client = 'Client';
            $upportemail = $toSupport;
            $support_subject = $subject;
            $supportstatus = $supportstatus;
            $payment_message = json_encode($message);
            $transctions_id = $message['TransId'];
            $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
        }

        $subjectProfile = $emailMessageProfile->display . ' #DFPYMID' . $updateId;;
        $email_message_profile = $this->Custom->paymentEmailCount($emailMessageProfile->value, $name, $usermessage, $sitename, $this->Custom->ToOrdinal($paymentCount));
        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;
        if ($this->Custom->sendEmail($toSupport, $from, $subjectProfile, $email_message)) {
            $supportstatus = "send";
        } else {
            $supportstatus = "faild";
        }

        if ($this->Custom->sendEmail($getUsreDetails->email, $from, $subjectProfile, $email_message_profile)) {
            $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 1], ['id' => $planId]);
            $process = 'boxUpdate()';
            $kidId = $kid_id;
            $kidName = $kidsname;
            $email = $getUsreDetails->email;
            $subject = $subjectProfile;
            $status = 'Send';
            $userId = $user_id;
            $client = 'Client';
            $upportemail = $toSupport;
            $support_subject = $subjectProfile;
            $supportstatus = $supportstatus;
            $payment_message = json_encode($message);
            $transctions_id = $message['TransId'];
            $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
        } else {
            $process = 'boxUpdate()';
            $kidId = $kid_id;
            $kidName = $kidsname;
            $email = $getUsreDetails->email;
            $subject = $subjectProfile;
            $status = 'faild';
            $userId = $user_id;
            $client = 'Client';
            $upportemail = $toSupport;
            $support_subject = $subjectProfile;
            $supportstatus = $supportstatus;
            $payment_message = json_encode($message);
            $transctions_id = $message['TransId'];
            $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
        }

        $this->Flash->success('Subcription payment completed');
        return $this->redirect(HTTP_ROOT);
    }

    public function cronjobkidStylfitReAuth($id = null)
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
        $message['charge_id'] = $payment_intent['charges']['data'][0]['id'];
        $message['receipt_url'] = $payment_intent['charges']['data'][0]['receipt_url'];
        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Onboard_in_Progress')], ['id' => $id]);

        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id' => $payment_intent['charges']['data'][0]['balance_transaction'], 'charge_id' => $payment_intent['charges']['data'][0]['id'], 'receipt_url' => $payment_intent['charges']['data'][0]['receipt_url']], ['id' => $id]);

        $getingData = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => 1, 'kid_id !=' => 0, 'autoMentions' => 0, 'user_id' => $payment_dil->user_id])->first();

        $planId = $getingData->id;
        $updateId = $paymentId = $id;

        $this->Users->hasOne('usrdet', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $this->Users->hasMany('addressess', ['className' => 'ShippingAddress', 'foreignKey' => 'user_id']);
        $this->Users->hasMany('card_detl', ['className' => 'PaymentCardDetails', 'foreignKey' => 'user_id']);
        $getUsreDetails = $this->Users->find('all')->contain(['addressess', 'card_detl', 'usrdet'])->where(['Users.id' => $getingData->user_id])->first();

        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId'], 'charge_id' => $message['charge_id'], 'receipt_url' => $message['receipt_url']], ['id' => $updateId]);
        $this->LetsPlanYourFirstFix->updateAll(['applay_dt' => date('Y-m-d H:i:s')], ['id' => $planId]);
        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId])->first();
        $checkUser = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId, 'PaymentGetways.payment_type' => 1])->first();
        if ($checkUser->payment_type == 1) {
            if ($getingData->kid_id != '') {
                @$kidId = $getingData->kid_id;
                $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => @$checkUser->kid_id]);
                $kid_id = $getingData->kid_id;
            }
        }

        if ($paymentDetails->profile_type == 1) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
        } elseif ($paymentDetails->profile_type == 2) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
        } elseif ($paymentDetails->profile_type == 3) {
            $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE_KID'])->first();
        }


        $enty = $this->DeliverDate->newEntity();
        $date = date('Y-m-d');
        $dateTime = date('l, F d, Y', strtotime($date . ' + 7 days'));
        $data['date_in_time'] = $dateTime;
        $data['weeks'] = 0;
        $data['is_send_me'] = 0;
        $data['user_id'] = $checkUser->user_id;
        $data['kid_id'] = @$kidId;
        $user = $this->DeliverDate->patchEntity($enty, $data);
        $this->DeliverDate->save($user);
        $this->PaymentGetways->updateAll(['delivery_id' => $user->id], ['id' => $updateId]);

        $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $getingData->user_id, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $paymentDetails->profile_type, 'PaymentGetways.payment_type' => 1])->count();
        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUCCESS_PAYMENT'])->first();
        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $stylefee = $this->Settings->find('all')->where(['Settings.name' => 'style_fee'])->first();

        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getingData->user_id, 'is_billing' => 1])->first();
        $full_address = $billingAddress->address . ((!empty($billingAddress->address_line_2)) ? '<br>' . $billingAddress->address_line_2 : '') . '<br>' . $billingAddress->city . ', ' . $billingAddress->state . '<br>' . $billingAddress->country . ' ' . $billingAddress->zipcode;
        $feeprice = $stylefee->value;
        $name = $getUsreDetails->name;
        $from = $fromMail->value;
        $subject = $emailMessage->display . ' #DFPYMID' . $updateId;

        $sitename = SITE_NAME;
        $usermessage = $message['Success'];
        $sumitted_date = date_format($checkUser->created_dt, 'm/d/Y');
        $paid_amount = "$ " . number_format($checkUser->price, 2);
        $last_4_digit = substr($cardDetails->card_number, -4);
        //echo $getUsreDetails->email;exit;
        $email_message = $this->Custom->paymentEmail($emailMessage->value, $name, $usermessage, $sitename, $message['TransId'], $paid_amount, $sumitted_date, $cardDetails->card_type, $last_4_digit, $usr_name, $full_address, $feeprice);
        $getUsreDetails->email;
        $subjectProfile = $emailMessageProfile->display . ' #DFPYMID' . $updateId;;
        $email_message_profile = $this->Custom->paymentEmailCount($emailMessageProfile->value, $name, $usermessage, $sitename, $this->Custom->ToOrdinal($paymentCount));

        $kidsdetails = $this->KidsDetails->find('all')->where(['id' => @$getingData->kid_id])->first();
        if ($kidsdetails->kids_first_name == '') {
            $kidsname = $this->Custom->kidsNumber($kidsdetails->kid_count);
        } else {
            $kidsname = $kidsdetails->kids_first_name;
        }

        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;
        if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {
            $supportstatus = "Send";
        } else {
            $supportstatus = "faild";
        }

        $this->loadModel('SmsSettings');
        $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'FITBOX_SCHEDULED_SMS'])->first();
        if (!empty($get_sms_temp)) {
            $count_data = $this->Custom->ToOrdinal(empty($paymentCount) ? 1 : $paymentCount);
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

        if ($this->Custom->sendEmail($getUsreDetails->email, $from, $subject, $email_message)) {
            $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 1], ['id' => $planId]);
            $process = 'boxUpdateKid()';
            $kidId = $kid_id;
            $kidName = $kidsname;
            $email = $getUsreDetails->email;
            $subject = $subject;
            $status = 'Send';
            $userId = $user_id;
            $client = 'Client';
            $upportemail = $toSupport;
            $support_subject = $subject;
            $supportstatus = $supportstatus;
            $payment_message = json_encode($message);
            $transctions_id = $message['TransId'];
            $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
        } else {
            $process = 'boxUpdateKid()';
            $kidId = $kid_id;
            $kidName = $kidsname;
            $email = $getUsreDetails->email;
            $subject = $subject;
            $status = 'faild';
            $userId = $user_id;
            $client = 'Client';
            $upportemail = $toSupport;
            $support_subject = $subject;
            $supportstatus = $supportstatus;
            $payment_message = json_encode($message);
            $transctions_id = $message['TransId'];
            $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
        }

        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;
        if ($this->Custom->sendEmail($toSupport, $from, $subjectProfile, $email_message)) {
            $supportstatus = 'Send';
        } else {
            $supportstatus = "Faild";
        }


        if ($this->Custom->sendEmail($getUsreDetails->email, $from, $subjectProfile, $email_message_profile)) {
            $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 1], ['id' => $planId]);
            $process = 'boxUpdateKid()';
            $kidId = $kid_id;
            $kidName = $kidsname;
            $email = $getUsreDetails->email;
            $subject = $subjectProfile;
            $status = 'Send';
            $userId = $user_id;
            $client = 'Client';
            $upportemail = $toSupport;
            $support_subject = $subjectProfile;
            $supportstatus = $supportstatus;
            $payment_message = json_encode($message);
            $transctions_id = $message['TransId'];
            $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
        } else {
            $process = 'boxUpdateKid()';
            $kidId = $kid_id;
            $kidName = $kidsname;
            $email = $getUsreDetails->email;
            $subject = $subjectProfile;
            $status = 'faild';
            $userId = $user_id;
            $client = 'Client';
            $upportemail = $toSupport;
            $support_subject = $subjectProfile;
            $supportstatus = $supportstatus;
            $payment_message = json_encode($message);
            $transctions_id = $message['TransId'];
            $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
        }

        $this->Flash->success('Subcription payment completed');
        return $this->redirect(HTTP_ROOT);
    }

    public function apiCustomerOrderReview()
    {
        $this->loadModel('OfferPromocode');
        $this->loadModel('UserUsesOfferCode');
        $this->loadModel('SalesNotApplicableState');

        //        $this->viewBuilder()->layout('ajax');

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

        $user_id = $_GET['user_id'];
        $profile_type = $_GET['profile'];
        $kid_id = $_GET['kid_id'];

        $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();
        $shipping_address_data = [];

        if ($profile_type == 'KIDS') {
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
            @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => $kid_id, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first();

            if (!empty($paymentId->shipping_address_id)) {
                $this->request->session()->write('user_shipping_address', $payment_data->shipping_address_id);
                $shipping_address_data = $this->ShippingAddress->find('all')->where(['id' => $paymentId->shipping_address_id])->first();
            }
            $paymentId = @$paymentId->id;
            $this->Products->updateAll(['keep_status'=>3],['keep_status'=>0,'payment_id' => $paymentId]);
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.user_id' => $user_id, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $kidcount = $prData->count();
            $cname = $getUsersDetails->kids_first_name;
        } else {
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();
            $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first();

            if (!empty($paymentId->shipping_address_id)) {
                $this->request->session()->write('user_shipping_address', $payment_data->shipping_address_id);
                $shipping_address_data = $this->ShippingAddress->find('all')->where(['id' => $paymentId->shipping_address_id])->first();
            }

            $paymentId = $paymentId->id;
            $this->Products->updateAll(['keep_status'=>3],['keep_status'=>0,'payment_id' => $paymentId]);

            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            // echo $paymentId; exit;
            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $cname = $getUsersDetails->name;
        }
        $all_sales_tax = $this->SalesNotApplicableState->find('all');
        $sales_tx_required = "NO";
        $sales_tx = 0;
        foreach ($all_sales_tax as $sl_tx) {
            if (($shipping_address_data->zipcode >= $sl_tx->zip_min) && ($shipping_address_data->zipcode <= $sl_tx->zip_max)) {
                $sales_tx_required = "YES";
                $sales_tx = $sl_tx->tax_rate / 100;
            }
        }
        if ($getUsersDetails->is_redirect == 2) {
            $this->Flash->success(__('Keep wait product yet not shipped'));
            return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
        }

        $s_pick_total = 0;
        if (!empty($prData)) {
            foreach ($prData as $pd) {
                if ($pd->keep_status == 3) {
                    $sellprice = $pd->sell_price;
                } else {
                    $sellprice = 0;
                }
                $s_pick_total += (float) $sellprice;
            }
        }

        $chk_prev_applied_code = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $user_id, 'payment_id' => $paymentId, 'is_offer_code' => 1]);
        if ($chk_prev_applied_code->count() > 0) {
            foreach ($chk_prev_applied_code as $chk_prv_cd_list) {
                $ofr_cd = $chk_prv_cd_list->code;
                $chk_ofr_code_det = $this->OfferPromocode->find('all')->where(['code' => $ofr_cd])->first();
                if (!empty($chk_ofr_code_det) && !empty($chk_ofr_code_det->minimum_purchase)) {
                    if ($chk_ofr_code_det->minimum_purchase > $s_pick_total) {
                        $this->UserAppliedCodeOrderReview->deleteAll(['id' => $chk_prv_cd_list->id, 'is_ordered' => 0]);
                        $this->UserUsesOfferCode->deleteAll(['user_id' => $user_id, 'code' => $ofr_cd, 'is_ordered' => 0]);
                        $this->Flash->error(__($ofr_cd . " offer code can't applicable."));
                    }
                }
            }
        }

        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user_id])->first();
        $getWalltesCredit = $this->Wallets->find('all')->where(['Wallets.user_id' => $user_id, 'Wallets.type' => 2, 'Wallets.applay_status' => 0])->sumOf('balance');
        $getWalltesDebit = $this->Wallets->find('all')->where(['Wallets.user_id' => $user_id, 'Wallets.type' => 1, 'Wallets.applay_status' => 0])->sumOf('balance');
        $walletBalace = $getWalltesCredit - $getWalltesDebit;
        if ($paymentId) {
            $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
            $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 3])->Count();
            if (@$exCountKeeps != 0) {
                if (@$productCount == @$exCountKeeps) {
                    $allKeepsProducts = 1;
                    $percentage = 25;
                } else {
                    $allKeepsProducts = 2;
                    $percentage = 0;
                }
            }
        }
        //        echo $paymentId;

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $payment_data = $this->PaymentCardDetails->find('all')->where(['id' => $data['crd_idd']])->first();

            $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $user_id])->first();

            $main_user_email = $current_usr_dtl_strip->email;
            if ($profile_type == 'KIDS') {
                $kid = $kid_id;
                $profileType = 3;
                ///////$this->Notifications->updateAll(['is_read' => 1], ['kid_id' => @$this->request->session()->read('KID_ID')]);
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
                $paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => $kid_id, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                //$finlizePaymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 2])->order(['id' => 'DESC'])->first();
                $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.kid_id !=' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
                $kidcount = $prData->count();
            } else {

                /////// $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $this->Auth->user('id'), 'kid_id' => 0]);
                $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();

                if ($getUsersDetails->user_detail->gender == 2) {
                    $profile_type = 'WOMEN';
                }
                if ($getUsersDetails->user_detail->gender == 1) {
                    $profile_type = 'MEN';
                }
                $kid = 0;
                if ($profile_type == 'WOMEN') {
                    $profileType = 2;
                } else {
                    $profileType = 1;
                }

                $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
                //$finlizePaymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$user_id, 'kid_id' => 0, 'payment_type' => 2])->order(['id' => 'DESC'])->first();
                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            }


            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();
            $payment_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $user_id])->first();
            // echo $paymentId;exit;

            if (@$data['total'] == 0) {
                $message['status'] = 1;
            } else {

                if (@$data['walletCheck'] == 1) {
                    $paymentGetwayAmount = $data['total'] + $data['promoprice'] + $data['wallet'];
                } else {
                    $paymentGetwayAmount = $data['total'];
                }



                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();
                $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
                //echo $paymentId;exit;
                $paymentG = $this->PaymentGetways->newEntity();
                $table1['user_id'] = $user_id;
                $table1['kid_id'] = $kid;
                $table1['emp_id'] = 0;
                $table1['status'] = 0;
                // $table1['price'] = $paymentGetwayAmount;
                $table1['price'] = $data['total'];
                $table1['profile_type'] = $profileType;
                $table1['payment_type'] = 2;
                $table1['created_dt'] = date('Y-m-d H:i:s');
                $table1['parent_id'] = $paymentId;
                $table1['work_status'] = 1;
                $table1['count'] = $userIdp->count;
                $table1['payment_card_details_id'] = $payment_data->id;
                $table1['shipping_address_id'] = $data['shipping_address_id'];

                $paymentG = $this->PaymentGetways->patchEntity($paymentG, $table1);
                $lastPymentg = $this->PaymentGetways->save($paymentG);
                $user_crd_exp_arr = explode('-', $payment_data->card_expire);
                $user_crd_exp_mnth = $user_crd_exp_arr[1];
                $user_crd_exp_yr = $user_crd_exp_arr[0];

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
                    'email' => $main_user_email,
                    //'amount' => $paymentGetwayAmount,
                    'amount' => $data['total'],
                    'invice' => $paymentG->id,
                    'refId' => 32,
                    'companyName' => 'Drapefit',
                    'stripeToken' => $data['stripeToken'],
                ];

                // pj($arr_user_info);
                //                echo "<pre>";
                //                print_r($arr_user_info);
                //                exit;
                $message = $this->stripePay($arr_user_info);
                //                echo "<pre>";
                //                print_r($arr_user_info) ;
                //                print_r($message) ;
                //                exit; 
            }
            $payment_check = $this->Payments->find('all')->where(['payment_id' => $data['paymentID']])->order(['id' => 'DESC'])->first();
            $payment = $this->Payments->newEntity();
            if (!empty($payment_check)) {
                $table['id'] = $payment_check->id;
            }
            $table['user_id'] = $this->Auth->user('id');
            $table['payment_id'] = $data['paymentID'];
            $table['sub_toal'] = $data['stotal'];
            $table['sales_tax'] = $data['sales_tax'];
            $table['tax'] = 0.00;
            $table['tax_price'] = 0;
            //                $table['total_price'] = $price;
            $table['total_price'] = $data['total'];
            $table['paid_status'] = 5;
            $table['created_dt'] = date('Y-m-d H:i:s');
            $table['product_ids'] = @implode(',', @$product_ids);
            $table['wallet_balance'] = $data['wallet'];
            $table['wallet_check'] = $data['walletCheck'];
            $table['promo_balance'] = $data['promoprice'];
            $table['stylist_picks_subtotal'] = $data['stylist_picks_subtotal'];
            $table['style_fit_fee'] = $data['style_fit_fee'];
            $table['keep_all_discount'] = $data['keep_all_discount'];

            $payment = $this->Payments->patchEntity($payment, $table);
            $lastPyment = $this->Payments->save($payment);
            // print_r($message);exit;



            if (@$message['status'] == '1') {
                $this->Products->updateAll(['is_payment_fail' => 0], ['payment_id' => $paymentId]);
                if ($data['total'] != 0) {
                    $this->PaymentGetways->updateAll(['is_style_fee' => 1], ['id' => $paymentId]);
                    $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId']], ['id' => $lastPymentg->id]);
                }


                $cpaymentCheck = $this->PaymentGetways->find('all')->where(['id' => $lastPymentg->id])->first();

                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $cpaymentCheck->user_id, 'is_billing' => 1])->first();
                if (empty($billingAddress)) {
                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $cpaymentCheck->user_id])->first();
                }
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
                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $cpaymentCheck->user_id, 'is_billing' => 1])->first();
                if (empty($billingAddress)) {
                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $cpaymentCheck->user_id])->first();
                }
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

                $checkAssigneStylest = $this->CustomerStylist->find('all')->where(['user_id' => $user_id])->first();
                if ($checkAssigneStylest->id != '') {
                    if ($cpaymentCheck->count == 1) {
                        $this->PaymentGetways->updateAll(['emp_id' => $checkAssigneStylest->employee_id], ['id' => $lastPymentg->id]);
                    }
                }
                if (@$data['promoprice'] != '') {
                    $walletsEnRE = $this->Wallets->newEntity();
                    $walletsEnRE->user_id = $user_id;
                    $walletsEnRE->type = 2; //credit
                    $walletsEnRE->balance = $data['promoprice'];
                    $walletsEnRE->created = date('Y-m-d h:i:s');
                    $walletsEnRE->applay_status = 0;
                    $this->Wallets->save($walletsEnRE);
                }

                if (@$data['promoprice'] != '') {
                    if (@$data['walletCheck'] == 1) {
                        $price = $data['promoprice'] + $data['wallet'];
                    } else {
                        $price = $data['promoprice'];
                    }

                    if (@$data['stotal'] <= $price) {
                        $remening = $data['stotal'];
                    } else {
                        $remening = $price;
                    }
                    $walletsd = $this->Wallets->newEntity();
                    $walletsd->user_id = $user_id;
                    $walletsd->type = 1; //debit
                    $walletsd->balance = $remening;
                    $walletsd->created = date('Y-m-d h:i:s');
                    $walletsd->applay_status = 0;
                    $this->Wallets->save($walletsd);
                }
                $aprice = $data['wallet'] - $data['promoprice'];
                if ($data['stotal'] > $aprice) {
                    $price = $data['stotal'] - $aprice;
                } else {
                    $price = 0;
                }
                $getUsesPromocode = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $user_id, 'payment_id' => $data['paymentID']]);
                $getUsesPromocodeExit = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $user_id, 'payment_id' => $data['paymentID']])->first();
                if ($getUsesPromocodeExit->id != '') {
                    foreach ($getUsesPromocode as $promo) {
                        $UserUsesPromocode = $this->UserUsesPromocode->newEntity();
                        $UserUsesPromocode->user_id = $user_id;
                        $UserUsesPromocode->promocode = $promo->code;
                        $UserUsesPromocode->apply_dt = date('Y-m-d h:i:s');
                        $UserUsesPromocode->price = $promo->price;
                        $this->UserUsesPromocode->save($UserUsesPromocode);
                    }
                }
                $payment_check = $this->Payments->find('all')->where(['payment_id' => $data['paymentID']])->order(['id' => 'DESC'])->first();
                $payment = $this->Payments->newEntity();
                if (!empty($payment_check)) {
                    $table['id'] = $payment_check->id;
                }
                $table['user_id'] = $user_id;
                $table['payment_id'] = $data['paymentID'];
                $table['sub_toal'] = $data['stotal'];
                $table['sales_tax'] = $data['sales_tax'];
                $table['tax'] = 0.00;
                $table['tax_price'] = 0;
                //                $table['total_price'] = $price;
                $table['total_price'] = $data['total'];
                $table['paid_status'] = 1;
                $table['created_dt'] = date('Y-m-d H:i:s');
                $table['product_ids'] = @implode(',', @$product_ids);
                $table['wallet_balance'] = $data['wallet'];
                $table['promo_balance'] = $data['promoprice'];
                $payment = $this->Payments->patchEntity($payment, $table);
                $lastPyment = $this->Payments->save($payment);
                $i = 1;
                $productData = '';
                foreach ($prData as $dataMail) {
                    if ($dataMail->keep_status == 3) {
                        $priceMail = $dataMail->sell_price;
                        $this->Products->updateAll(['is_complete' => '1'], ['id' => $dataMail->id]);
                    } else {
                        $priceMail = 0;
                    }
                    if ($dataMail->keep_status == 3) {
                        $this->Products->updateAll(['is_complete' => '1', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                        $keep = 'Keeps';
                    } elseif ($dataMail->keep_status == 2) {
                        $keep = 'Exchange';
                        $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 1], ['id' => $dataMail->id]);
                    } else if ($dataMail->keep_status == 1) {
                        $keep = 'Return';
                        $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                    }
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

                                " . $keep . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               " . $dataMail->size . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               $" . number_format($priceMail, 2) . "

                            </td>

                        </tr>";
                    $this->Products->updateAll(['checkedout' => 'Y'], ['id' => $dataMail->id]);
                    $i++;
                }

                $applied_promo_codes = $this->Custom->getPromoCode($paymentId);
                $offerData = '';

                if (@$data['walletCheck'] == 1) {
                    $offerData .= "<tr style='display: inline-block; width: 100%;'>
                            <td colspan='5' style='text-align: left;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: left; width: 49%;'>
                             Wallet applied 
                            </td>
                            <td  style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: right; width: 49%;'>
                               " . '-$' . number_format($data['wallet'], 2) . "
                            </td>
                           
                        </tr>";
                }


                foreach ($applied_promo_codes as $cup_a) {
                    $offerData .= "<tr style='display: inline-block; width: 100%;'>
                            <td colspan='5' style='text-align: left;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: left; width: 49%;'>
                              " . $cup_a->code . " applied 
                            </td>
                            <td  style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: right; width: 49%;'>
                               " . '-$' . number_format($cup_a->price, 2) . "
                            </td>
                           
                        </tr>";
                }




                if ($paymentId) {
                    $this->UserAppliedCodeOrderReview->deleteAll(['payment_id' => $data['paymentID']]);
                    $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
                    $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 3])->Count();
                    $exCountretun = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status' => 1])->Count();
                    $exCountexchange = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status ' => 2, 'is_complete' => 0])->Count();
                    $exCountreturn = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1])->Count();
                    $lastCount = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1, 'is_altnative_product' => 0])->Count();

                    if (@$productCount == $exCountretun + $exCountKeeps) {
                        if ($profile_type == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                    }

                    if (@$productCount == $lastCount) {
                        if ($profile_type == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
                    }

                    if (@$productCount == @$exCountKeeps) {
                        if ($profile_type == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                        }
                        $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
                    } else if (@$productCount == @$exCountretun) {
                        if ($profile_type == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                        }
                        $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                    } else if (@$exCountexchange == @$productCount) {
                        if ($profile_type == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $kid_id]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 2], ['id' => $user_id]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
                    } else if (@$exCountexchange >= 1) {
                        if ($profile_type == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $kid_id]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 2], ['id' => $user_id]);
                        }
                        $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
                    } else if (@$exCountreturn >= 1) {
                        if (@$exCountreturn == @$productCount) {
                            if ($profile_type == 'KIDS') {
                                $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                            } else {
                                $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                            }
                            $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                        }
                    }
                }


                if ($profile_type == 'KIDS') {
                    $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);
                } else {
                    $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                }
                $gtotal = $data['stotal'];
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $current_usr_dtl_strip->email;
                $name = $current_usr_dtl_strip->name;
                $from = $fromMail->value;
                $sitename = SITE_NAME;

                $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                $subject = $emailMessage1->display . ' #DFPYMID' . $paymentId;
                //echo $offerData; exit;
                if ($data['total'] == 0) {
                    $total = '0.00';
                } else {
                    $total = $data['total'];
                }
                $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $data['stylist_picks_subtotal'], $total, $data['style_fit_fee'], $data['keep_all_discount'], $refundamount = '', $gtotal, $offerData, $data['sales_tax'], '#DFPYMID' . $paymentId);
                $this->Custom->sendEmail($to, $from, $subject, $email_message);
//                $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

                //Refer user to bonus
                $paymet_chk = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'payment_type' => 2])->count();
                if ($paymet_chk >= 1) {
                    $check_refer_list = $this->ReferFriends->find('all')->where(['to_id' => $user_id])->first();
                    if (!empty($check_refer_list) && $check_refer_list->paid_status == 0) {
                        $new_wallet_bal = $this->Wallets->newEntity();
                        $new_wallet_bal->user_id = $check_refer_list->from_id;
                        $new_wallet_bal->type = 2;
                        $new_wallet_bal->balance = 25;
                        $new_wallet_bal->created = date('Y-m-d h:i:s');
                        $new_wallet_bal->applay_status = 0;
                        $this->Wallets->save($new_wallet_bal);
                        $this->ReferFriends->updateAll(['paid_status' => 1], ['id' => $check_refer_list->id]);
                    }
                }
                $this->UserAppliedCodeOrderReview->updateAll(['is_ordered' => 1], ['payment_id' => $paymentId]);
                $this->UserUsesOfferCode->updateAll(['is_ordered' => 1], ['payment_id' => $paymentId]);

                return $this->redirect(HTTP_ROOT . 'api/payment-success');
            } else {
                $this->Products->updateAll(['is_payment_fail' => 1], ['payment_id' => $paymentId]);
                if (!empty($message['ErrorCode'])) {
                    $getErrorMeg = $message['ErrorCode'];
                } else {
                    $getErrorMeg = $message['ErrorCode'];
                }

                if ($message['error_code'] == 'authentication_required') {
                    $this->Flash->error(__('Please authenticate your payment.'));
                    return $this->redirect(HTTP_ROOT . 'users/reAuthPayment/apiCustomerOrderReview/' . @$lastPymentg->id);
                }

                $this->Flash->error(__(empty($getErrorMeg) ? $message['ErrorCode'] : $getErrorMeg));
                return $this->redirect(HTTP_ROOT . 'api/apiCustomerOrderReview?user_id=' . $user_id . '&kid_id=' . $kid_id . '&profile=' . $profile_type);
            }
        }
        $this->set(compact('payment_data', 'walletBalace', 'prData', 'userData', 'cname', 'allKeepsProducts', 'percentage', 'paymentId', 'shipping_address_data', 'sales_tx', 'sales_tx_required'));
    }

    public function apiCustomerOrderReviewReAuth($id = null)
    {
        $this->loadModel('UserUsesOfferCode');
        $this->viewBuilder()->layout('ajax');
        $message['Success'] = "";

        $payment_dil = $this->PaymentGetways->find('all')->where(['id' => $id])->first();
        $user_id = $payment_dil->user_id;
        $kid_id = $payment_dil->kid_id;
        $profile_type = !empty($payment_dil->kid_id) ? "KIDS" : "";

        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $get_usr_dtl = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();

        if (!empty($kid_id)) {
            $kid = $kid_id;
            $profileType = 3;
            ///////$this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();
            $paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => $kid_id, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            //$finlizePaymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$kid_id, 'payment_type' => 2])->order(['id' => 'DESC'])->first();
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.kid_id !=' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $kidcount = $prData->count();
        } else {
            $kid = 0;
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $user_id])->first();

            $profileType = $getUsersDetails->user_detail->gender;

            /////// $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);

            $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            //$finlizePaymentId = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'kid_id' => 0, 'payment_type' => 2])->order(['id' => 'DESC'])->first();
            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
        }


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
        //pj($message);exit;

        /**         * */
        $data = [];
        $data['paymentID'] = $payment_dil->parent_id;
        $payment_check = $this->Payments->find('all')->where(['payment_id' => $data['paymentID']])->order(['id' => 'DESC'])->first();
        $data['promoprice'] = $payment_check->promo_balance;
        $data['walletCheck'] = $payment_check->wallet_check;
        $data['stotal'] = $payment_check->sub_toal;
        $data['wallet'] = $payment_check->wallet_balance;
        $data['stylist_picks_subtotal'] = $payment_check->stylist_picks_subtotal;
        $data['style_fit_fee'] = $payment_check->style_fit_fee;
        $data['keep_all_discount'] = $payment_check->keep_all_discount;
        $data['total'] = $payment_check->total_price;
        $data['sales_tax'] = $payment_check->sales_tax;

        if ($data['total'] != 0) {
            $this->PaymentGetways->updateAll(['is_style_fee' => 1], ['id' => $paymentId]);
            $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId']], ['id' => $id]);
        }


        $cpaymentCheck = $this->PaymentGetways->find('all')->where(['id' => $id])->first();

        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $cpaymentCheck->user_id, 'is_billing' => 1])->first();
        if (empty($billingAddress)) {
            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $cpaymentCheck->user_id])->first();
        }
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

        $checkAssigneStylest = $this->CustomerStylist->find('all')->where(['user_id' => $user_id])->first();
        if (!empty($checkAssigneStylest) && $checkAssigneStylest->id != '') {
            if ($cpaymentCheck->count == 1) {
                $this->PaymentGetways->updateAll(['emp_id' => $checkAssigneStylest->employee_id], ['id' => $id]);
            }
        }
        if (@$data['promoprice'] != '') {
            $walletsEnRE = $this->Wallets->newEntity();
            $walletsEnRE->user_id = $user_id;
            $walletsEnRE->type = 2; //credit
            $walletsEnRE->balance = $data['promoprice'];
            $walletsEnRE->created = date('Y-m-d h:i:s');
            $walletsEnRE->applay_status = 0;
            $this->Wallets->save($walletsEnRE);
        }

        if (@$data['promoprice'] != '') {
            if (@$data['walletCheck'] == 1) {
                $price = $data['promoprice'] + $data['wallet'];
            } else {
                $price = $data['promoprice'];
            }

            if (@$data['stotal'] <= $price) {
                $remening = $data['stotal'];
            } else {
                $remening = $price;
            }
            $walletsd = $this->Wallets->newEntity();
            $walletsd->user_id = $user_id;
            $walletsd->type = 1; //debit
            $walletsd->balance = $remening;
            $walletsd->created = date('Y-m-d h:i:s');
            $walletsd->applay_status = 0;
            $this->Wallets->save($walletsd);
        }
        $aprice = $data['wallet'] - $data['promoprice'];
        if ($data['stotal'] > $aprice) {
            $price = $data['stotal'] - $aprice;
        } else {
            $price = 0;
        }
        $getUsesPromocode = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $user_id, 'payment_id' => $data['paymentID']]);
        $getUsesPromocodeExit = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $user_id, 'payment_id' => $data['paymentID']])->first();
        if (!empty($getUsesPromocodeExit) && $getUsesPromocodeExit->id != '') {
            foreach ($getUsesPromocode as $promo) {
                $UserUsesPromocode = $this->UserUsesPromocode->newEntity();
                $UserUsesPromocode->user_id = $user_id;
                $UserUsesPromocode->promocode = $promo->code;
                $UserUsesPromocode->apply_dt = date('Y-m-d h:i:s');
                $UserUsesPromocode->price = $promo->price;
                $this->UserUsesPromocode->save($UserUsesPromocode);
            }
        }

        $payment = $this->Payments->newEntity();
        if (!empty($payment_check)) {
            $table['id'] = $payment_check->id;
        }
        $table['user_id'] = $user_id;
        $table['payment_id'] = $data['paymentID'];
        $table['sub_toal'] = $data['stotal'];

        $table['paid_status'] = 1;
        $table['created_dt'] = date('Y-m-d H:i:s');
        $table['product_ids'] = @implode(',', @$product_ids);
        $table['wallet_balance'] = $data['wallet'];
        $table['promo_balance'] = $data['promoprice'];
        $payment = $this->Payments->patchEntity($payment, $table);
        $lastPyment = $this->Payments->save($payment);
        $i = 1;
        $productData = '';
        foreach ($prData as $dataMail) {
            if ($dataMail->keep_status == 3) {
                $priceMail = $dataMail->sell_price;
                $this->Products->updateAll(['is_complete' => '1'], ['id' => $dataMail->id]);
            } else {
                $priceMail = 0;
            }
            if ($dataMail->keep_status == 3) {
                $this->Products->updateAll(['is_complete' => '1', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                $keep = 'Keeps';
            } elseif ($dataMail->keep_status == 2) {
                $keep = 'Exchange';
                $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 1], ['id' => $dataMail->id]);
            } else if ($dataMail->keep_status == 1) {
                $keep = 'Return';
                $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
            }
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

                                " . $keep . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               " . $dataMail->size . "

                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

                               $" . number_format($priceMail, 2) . "

                            </td>

                        </tr>";
            $this->Products->updateAll(['checkedout' => 'Y'], ['id' => $dataMail->id]);
            $i++;
        }

        $applied_promo_codes = $this->Custom->getPromoCode($paymentId);
        $offerData = '';

        if (@$data['walletCheck'] == 1) {
            $offerData .= "<tr style='display: inline-block; width: 100%;'>
                            <td colspan='5' style='text-align: left;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: left; width: 49%;'>
                             Wallet applied 
                            </td>
                            <td  style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: right; width: 49%;'>
                               " . '-$' . number_format($data['wallet'], 2) . "
                            </td>
                           
                        </tr>";
        }


        foreach ($applied_promo_codes as $cup_a) {
            $offerData .= "<tr style='display: inline-block; width: 100%;'>
                            <td colspan='5' style='text-align: left;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: left; width: 49%;'>
                              " . $cup_a->code . " applied 
                            </td>
                            <td  style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd; float: right; width: 49%;'>
                               " . '-$' . number_format($cup_a->price, 2) . "
                            </td>
                           
                        </tr>";
        }




        if ($paymentId) {
            $this->UserAppliedCodeOrderReview->deleteAll(['payment_id' => $data['paymentID']]);
            $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
            $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 3])->Count();
            $exCountretun = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status' => 1])->Count();
            $exCountexchange = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status ' => 2, 'is_complete' => 0])->Count();
            $exCountreturn = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1])->Count();
            $lastCount = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1, 'is_altnative_product' => 0])->Count();

            if (@$productCount == $exCountretun + $exCountKeeps) {
                if ($profile_type == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                }

                $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
            }

            if (@$productCount == $lastCount) {
                if ($profile_type == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                }

                $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
            }

            if (@$productCount == @$exCountKeeps) {
                if ($profile_type == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                }
                $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
            } else if (@$productCount == @$exCountretun) {
                if ($profile_type == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                }
                $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
            } else if (@$exCountexchange == @$productCount) {
                if ($profile_type == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 2], ['id' => $user_id]);
                }

                $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
            } else if (@$exCountexchange >= 1) {
                if ($profile_type == 'KIDS') {
                    $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $kid_id]);
                } else {
                    $this->Users->updateAll(['is_redirect' => 2], ['id' => $user_id]);
                }
                $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
            } else if (@$exCountreturn >= 1) {
                if (@$exCountreturn == @$productCount) {
                    if ($profile_type == 'KIDS') {
                        $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                    } else {
                        $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);
                    }
                    $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                }
            }
        }


        if ($profile_type == 'KIDS') {
            $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);
        } else {
            $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
        }
        $gtotal = $data['stotal'];
        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

        $to = $get_usr_dtl->email;
        $name = $get_usr_dtl->name;
        //        exit;
        $from = $fromMail->value;
        $sitename = SITE_NAME;

        $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
        $subject = $emailMessage1->display . ' #DFPYMID' . $paymentId;
        //echo $offerData; exit;
        if ($data['total'] == 0) {
            $total = '0.00';
        } else {
            $total = $data['total'];
        }
        $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $data['stylist_picks_subtotal'], $total, $data['style_fit_fee'], $data['keep_all_discount'], $refundamount = '', $gtotal, $offerData, $data['sales_tax'], '#DFPYMID' . $paymentId);
        $this->Custom->sendEmail($to, $from, $subject, $email_message);
        // $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);
        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
        $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

        //Refer user to bonus
        $paymet_chk = $this->PaymentGetways->find('all')->where(['user_id' => $user_id, 'payment_type' => 2])->count();
        if ($paymet_chk >= 1) {
            $check_refer_list = $this->ReferFriends->find('all')->where(['to_id' => $user_id])->first();
            if (!empty($check_refer_list) && $check_refer_list->paid_status == 0) {
                $new_wallet_bal = $this->Wallets->newEntity();
                $new_wallet_bal->user_id = $check_refer_list->from_id;
                $new_wallet_bal->type = 2;
                $new_wallet_bal->balance = 25;
                $new_wallet_bal->created = date('Y-m-d h:i:s');
                $new_wallet_bal->applay_status = 0;
                $this->Wallets->save($new_wallet_bal);
                $this->ReferFriends->updateAll(['paid_status' => 1], ['id' => $check_refer_list->id]);
            }
        }
        $this->UserAppliedCodeOrderReview->updateAll(['is_ordered' => 1], ['payment_id' => $paymentId]);
        $this->UserUsesOfferCode->updateAll(['is_ordered' => 1], ['payment_id' => $paymentId]);

        return $this->redirect(HTTP_ROOT . 'api/payment-success');
        /**         * */
    }
    
    function subscriptionEmail()
    {

        $this->viewBuilder()->layout('ajax');

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $try_new_items_with_scheduled_fixes12 = $data['try_new_items_with_scheduled_fixes12'];

            $sitename = SITE_NAME;

            $UserDetails = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();

            $username = $userDetails->name;

            if ($this->request->session()->read('PROFILE') == 'KIDS') {

                if ($try_new_items_with_scheduled_fixes12 == 0) {

                    $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_KIDS_SUBSCRIPTION'])->first();

                    $kidname = $kidsDetails['kids_first_name'];

                    $message = $this->Custom->yourKidsSubscription($emailMessage->value, $username, $kidname, $sitename);
                }

                if ($try_new_items_with_scheduled_fixes12 == 1) {
                    $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                    $sub_frq = "";
                    if($getLetData->how_often_would_you_lik_fixes == 1){
                        $sub_frq = "Every Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 2){
                        $sub_frq = "Every Two Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 3){
                        $sub_frq = "Every Three Month";
                    }

                    $kidsDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();

                    $kidname = $kidsDetails->kids_first_name;

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_SUBSCRIPTION_ACTIVATED_EMAIL'])->first();

                    $message = $this->Custom->KIdsSubscriptionActivatedEmail($emailMessage->value, $username, $kidname, $sitename, $sub_frq);
                }
            } else {

                if ($try_new_items_with_scheduled_fixes12 == 0) {

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'YOUR_SUBSCRIPTION'])->first();

                    $message = $this->Custom->yourSubscription($emailMessage->value, $username, $sitename);
                }

                if ($try_new_items_with_scheduled_fixes12 == 1) {
                    $getLetData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => 0, 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                    $sub_frq = "";
                    if($getLetData->how_often_would_you_lik_fixes == 1){
                        $sub_frq = "Every Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 2){
                        $sub_frq = "Every Two Month";
                    }else if($getLetData->how_often_would_you_lik_fixes == 3){
                        $sub_frq = "Every Three Month";
                    }

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUBSCRIPTION_ACTIVATED_EMAIL'])->first();

                    $message = $this->Custom->SubscriptionActivatedEmail($emailMessage->value, $username, $sitename, $sub_frq);
                }
            }

            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

            $to = $UserDetails->email;

            $from = $fromMail->value;

            $subject = $emailMessage->display;

            $this->Custom->sendEmail($to, $from, $subject, $message);

            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

            $this->Custom->sendEmail($toSupport, $from, $subject, $message);

            exit;
        }
    }


}

<?php

namespace App\Controller;

ob_start();

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Utility\Hash;

require_once(ROOT . '/vendor' . DS . 'PaymentTransactions' . DS . 'authorize-credit-card.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class StampsController extends AppController {

    public function initialize() {

        parent::initialize();

        $this->loadComponent('Custom');

        $this->loadComponent('RequestHandler');

        $this->loadComponent('Mpdf');

        $this->loadModel('Users');

        $this->loadModel('UserDetails');

        $this->loadModel('Payments');

        $this->loadModel('Settings');

        $this->loadmodel('ShippingAddress');

        $this->loadModel('Pages');

        $this->loadModel('Settings');

        $this->loadModel('PaymentGetways');

        $this->loadModel('PersonalizedFix');

        $this->loadModel('rather downplay');

        $this->loadModel('ReferFriends');

        $this->loadModel('ShippingAddress');

        $this->loadModel('SizeChart');

        $this->loadModel('style_quizs');

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

        $this->loadModel('Giftcard');

        $this->loadModel('BatchMailingReports');

        $this->loadmodel('ClientsBirthday');

        $this->loadmodel('UsageProducts');

        $this->loadModel('InUsers');

        $this->loadModel('InProducts');

        $this->loadModel('InRack');

        $this->loadModel('InProductType');

        $this->loadModel('SalesNotApplicableState');

        $this->loadModel('CronjobsReportsDebasish');

        $this->loadModel('LetsPlanYourFirstFix');

//        $this->viewBuilder()->layout('ajax');
        $this->viewBuilder()->layout('admin');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(["index", "processToken", "labelPrintTest", "getUserDetails", "code"]);
    }
    
    public function code(){
        $payment_id = $this->request->session()->read('stamp_order_id');
        
//        $this->Flash->error(__('Invalid page access'));
            return $this->redirect(HTTP_ROOT.'stamps/index/'.$payment_id.'?code='.$_GET['code']);
        
    }

    public function getToken() {
        $this->loadModel('Stamps');
        $stamp_data = $this->Stamps->find('all')->first();
        $token_dtls = [];
        if (!empty($stamp_data)) {
            $token_dtls['status'] = 'success';
            if ($stamp_data->stamps_mode == "sandbox") {
                $token_dtls['sign_in_auth'] = 'https://signin.testing.stampsendicia.com/';
                $token_dtls['base_url'] = 'https://api.testing.stampsendicia.com/sera/';
            }
            if ($stamp_data->stamps_mode == "live") {
                $token_dtls['sign_in_auth'] = 'https://signin.stampsendicia.com/';
                $token_dtls['base_url'] = 'https://api.stampsendicia.com/sera/';
            }
            $token_dtls['client_id'] = $stamp_data->client_id;
            $token_dtls['client_secret'] = $stamp_data->client_secret;
            $token_dtls['redirect_uri'] = $stamp_data->redirect_uri;
            $token_dtls['code'] = $stamp_data->code;
            $token_dtls['refresh_token'] = $stamp_data->refresh_token;
        } else {
            $token_dtls['status'] = 'error';
        }
        return json_encode($token_dtls);
    }

    public function index($id) {
        $this->loadModel('StampsOrderDtls');
        $get_token = json_decode($this->getToken(), true); 
        
        $this->viewBuilder()->layout('admin');
        $this->request->session()->write('stamp_order_id', $id);
        $stamps_label_details = $this->StampsOrderDtls->find('all')->where(['payment_id'=>$id])->first();
        if(empty($stamps_label_details) || empty($stamps_label_details->ship_tracking_number)){
            if ($this->request->is('post')) {
                $postdata = $this->request->data;

                /*$curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $get_token['sign_in_auth'].'oauth/token',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                     CURLOPT_POSTFIELDS => 'grant_type=authorization_code&client_id='.$get_token["client_id"].'&client_secret='.$get_token["client_secret"].'&redirect_uri='.$get_token["redirect_uri"].'&code=' . $postdata['code'],
    //                CURLOPT_POSTFIELDS => 'grant_type=authorization_code&client_id=rk3zwJDWxEQoeaFXQBLA2PlomUKJnhvy&client_secret=4FOfTb2T57Hd7HKIvhQHfgs0S_aasZQqvqzZ8MGZYkFo6W6fCdhNecbOJF2n4_e7&redirect_uri=http%3A%2F%2Fwww.drapefit.com%2F&code=' . $postdata['code'],
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded',
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                $result = json_decode($response, true);
                            var_dump($result);exit;*/
                
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $get_token['sign_in_auth'].'oauth/token',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                     CURLOPT_POSTFIELDS => 'grant_type=refresh_token&client_id='.$get_token["client_id"].'&client_secret='.$get_token["client_secret"].'&refresh_token=' . $get_token['refresh_token'],
    //                CURLOPT_POSTFIELDS => 'grant_type=authorization_code&client_id=rk3zwJDWxEQoeaFXQBLA2PlomUKJnhvy&client_secret=4FOfTb2T57Hd7HKIvhQHfgs0S_aasZQqvqzZ8MGZYkFo6W6fCdhNecbOJF2n4_e7&redirect_uri=http%3A%2F%2Fwww.drapefit.com%2F&code=' . $postdata['code'],
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded',
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                $result = json_decode($response, true);
                    // var_dump($result);exit;

                if (!empty($result['error'])) {
                    $this->Flash->error(__($result['error_description']));
                    return $this->redirect(['action' => 'index']);
                }

                if (!empty($result['access_token'])) {
                    $this->request->session()->write('stamp_access_token', $result['access_token']);
                    $this->Flash->success(__('Code processed'));
                    return $this->redirect(['action' => 'processToken']);
                } else {
                    $this->Flash->error(__('Invalid code'));
                    return $this->redirect(['action' => 'index']);
                }

                exit;
            }
        }
        $this->set(compact('stamps_label_details','get_token'));
    }

    public function processToken() {
        $this->loadModel('StampsOrderDtls');
        $get_token = json_decode($this->getToken(), true);
        $stamp_access_token = $this->request->session()->read('stamp_access_token');
        $stamp_order_id = $this->request->session()->read('stamp_order_id');
        
        $all_paid_list = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1]])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);

        if ($this->request->is('post')) {
            $postdata = $this->request->data;
            
            $addressx = ["company_name" => !empty($postdata['company_name'])?$postdata['company_name']:null,
                    "name" => !empty($postdata['name'])?$postdata['name']:null,
                    "address_line1" => !empty($postdata['address_line1'])?$postdata['address_line1']:null,
                    "address_line2" => !empty($postdata['address_line2'])?$postdata['address_line2']:null,
                    "city" => !empty($postdata['city'])?$postdata['city']:null,
                    "state_province" => !empty($postdata['state_province'])?$postdata['state_province']:null,
                    "postal_code" => !empty($postdata['postal_code'])?$postdata['postal_code']:null,
                    "country_code" => "US",
                    "phone" => !empty($postdata['phone'])?$postdata['phone']:null,
                    "email" => !empty($postdata['email'])?$postdata['email']:null];
                    
                    $ch_address = curl_init($get_token['base_url'].'v1/addresses/validate');

            $authKey = $postdata['stamp_access_token'];
            $authHeaders = array();
//        $authHeaders[] = 'Content-Type: application/x-www-form-urlencoded'; 
            $authHeaders[] = 'Content-Type: application/json';
            $authHeaders[] = 'Authorization: Bearer ' . $authKey;
            $authHeaders[] = 'Idempotency-Key: ' . md5(time());

            //set authorization headers
            curl_setopt($ch_address, CURLOPT_HTTPHEADER, $authHeaders);

            curl_setopt($ch_address, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch_address, CURLOPT_POSTFIELDS, $datax);
            curl_setopt($ch_address, CURLOPT_POSTFIELDS, json_encode($addressx));

            // execute!
            $response = curl_exec($ch_address);

            // close the connection, release resources used
            curl_close($ch_address);
            echo "<pre>";
            
            

            $datax = [
                "from_address" => [
                    "company_name" => "Drape Fit Inc",
                    "name" => "Drape Fit",
                    "address_line1" => "3820 N. Mason Rd Ste E ",
                    "address_line2" => null,
                    "city" => "Katy",
                    "state_province" => "TX",
                    "postal_code" => "77449",
                    "country_code" => 'US',
                    "phone" => "8449551723",
                    "email" => "support@drapefit.com",
                    // "residential_indicator" => "No",
                ],
                "return_address" => [
                    "company_name" => "Drape Fit Inc",
                    "name" => "Drape Fit",
                    "address_line1" => "3820 N. Mason Rd Ste E ",
                    "address_line2" => null,
                    "city" => "Katy",
                    "state_province" => "TX",
                    "postal_code" => "77449",
                    "country_code" => 'US',
                    "phone" => "8449551723",
                    "email" => "support@drapefit.com",
                ],
                "to_address" => [
                    "company_name" => !empty($postdata['company_name'])?$postdata['company_name']:null,
                    "name" => !empty($postdata['name'])?$postdata['name']:null,
                    "address_line1" => !empty($postdata['address_line1'])?$postdata['address_line1']:null,
                    "address_line2" => !empty($postdata['address_line2'])?$postdata['address_line2']:null,
                    "city" => !empty($postdata['city'])?$postdata['city']:null,
                    "state_province" => !empty($postdata['state_province'])?$postdata['state_province']:null,
                    "postal_code" => !empty($postdata['postal_code'])?$postdata['postal_code']:null,
                    "country_code" => "US",
                    "phone" => !empty($postdata['phone'])?$postdata['phone']:null,
                    "email" => !empty($postdata['email'])?$postdata['email']:null,
                    "residential_indicator" => "unknown"
                ],
                "package" => [
                    "packaging_type" => "package",
                    "weight" => $postdata['weight'],
                    "weight_unit" => "pound",
                    // "length" => $postdata['length'],
                    // "width" => $postdata['width'],
                    // "height" => $postdata['height'],
                    // "dimension_unit" => "inch" 
                ],
                "service_type" => "ups_ground",
                "delivery_confirmation_type" => "tracking",
                /*"insurance"=> [
                    "insurance_provider"=> "stamps_com",
                    "insured_value"=>
                    [
                        "amount"=> 200,
                        "currency"=> "usd"
                    ]
                ],*/
                // "carrier"=> "usps",
                "ship_date" => date('Y-m-d', strtotime($postdata['ship_date'])), //"[[$isoTimestamp]]",
//                "is_return_label" => true,
                "advanced_options" => [
                    "is_pay_on_use" => false,
                    "return_receipt" => false
                ],
                // "service_type"=> "usps_pay_on_use_return",
                // "is_pay_on_use"=> true,
                "label_options" => [
                    "label_size" => "4x6",
                    "label_format" => "pdf",
                    "label_logo_image_id" => 0,
                    "label_output_type" => "url"
                ],
                "is_test_label" => false
            ];
            echo json_encode($datax);
// exit;
            $ch = curl_init($get_token['base_url'].'v1/labels');

            $authKey = $postdata['stamp_access_token'];
            $authHeaders = array();
//        $authHeaders[] = 'Content-Type: application/x-www-form-urlencoded'; 
            $authHeaders[] = 'Content-Type: application/json';
            $authHeaders[] = 'Authorization: Bearer ' . $authKey;
            $authHeaders[] = 'ship_date: ' . date('Y-m-d', strtotime($postdata['ship_date']));
            $authHeaders[] = 'Idempotency-Key: ' . md5(time());

            //set authorization headers
            curl_setopt($ch, CURLOPT_HTTPHEADER, $authHeaders);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $datax);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datax));

            // execute!
            $response = curl_exec($ch);

            // close the connection, release resources used
            curl_close($ch);
            echo "<pre>";
            // do anything you want with your response
//            print_r(json_encode($datax));
            echo "<br>";
            // print_r($response);
            $result = json_decode($response, true);

            print_r($result);
//          exit;

            if (!empty($result['message']) && ($result['message'] == 'Unauthorized')) {
                $this->Flash->error(__('Invalid code. Please generate new token and process again.'));
                return $this->redirect(['action' => 'index']);
            } else if (!empty($result['error_reference_id'])) {
                $this->Flash->error(__($result['errors'][0]['error_message']));
                return $this->redirect(['action' => 'processToken']);
            } else {
                echo "<br>Order id: " . $stamp_order_id;
                echo "<br>Tracking Number : " . $result['tracking_number'];
                echo "<br>Label id : " . $result['label_id'];
                echo "<br>Carrier : " . $result['carrier'];
                echo "<br>Service type : " . $result['service_type'];
                echo "<br>Packaging type : " . $result['packaging_type'];
                echo "<br>Estimated delivery days : " . $result['estimated_delivery_days'];
                echo "<br>Estimated delivery date : " . $result['estimated_delivery_date'];
                $this->Products->updateAll(['order_usps_tracking_no' => $result['tracking_number']], ['keep_status' => 0, 'payment_id' => $stamp_order_id]);
                $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => $stamp_order_id]);
                $stamps_label_details = $this->StampsOrderDtls->find('all')->where(['payment_id'=>$stamp_order_id])->first();
                if (!empty($stamps_label_details) && !empty($stamps_label_details->id)) {
                        $newArr['id'] = $stamps_label_details->id;
                    }
                    $newArr['payment_id'] = $stamp_order_id;
                    $newArr['ship_resp_data'] = $response;
                    $newArr['ship_label_id'] = $result['label_id'];
                    $newArr['ship_tracking_number'] = $result['tracking_number'];
                    $newArr['ship_label_url'] = $result['labels'][0]['href'];

                    $newRw = $this->StampsOrderDtls->newEntity();
                    $newRw = $this->StampsOrderDtls->patchEntity($newRw, $newArr);
                    $this->StampsOrderDtls->save($newRw);

                foreach ($result['labels'] as $lbl) {
                    echo "<br>Link: " . $lbl['href'];
                }
                echo "<br>";
                echo "<br><a href='" . $result['labels'][0]['href'] . "' target='_blank'>Print Label </a>";
            }
            echo "<br>";

            //Return Label
            $returndatax = [
                "from_address" => [
                    "company_name" => $postdata['company_name'],
                    "name" => $postdata['name'],
                    "address_line1" => $postdata['address_line1'],
                    "address_line2" => $postdata['address_line2'],
                    "city" => $postdata['city'],
                    "state_province" => $postdata['state_province'],
                    "postal_code" => $postdata['postal_code'],
                    "country_code" => "US",
                    "phone" => $postdata['phone'],
                    "email" => $postdata['email']
                ],
                "return_address" => [
                    "company_name" => "Drape Fit Inc",
                    "name" => "Drape Fit",
                    "address_line1" => "3820 N. Mason Rd Ste E ",
                    "address_line2" => null,
                    "city" => "Katy",
                    "state_province" => "TX",
                    "postal_code" => "77449",
                    "country_code" => 'US',
                    "phone" => "8449551723",
                    "email" => "support@drapefit.com",
                                                    
                ],
                "to_address" => [
                    "company_name" => "Drape Fit Inc",
                    "name" => "Drape Fit",
                    "address_line1" => "3820 N. Mason Rd Ste E ",
                    "address_line2" => null,
                    "city" => "Katy",
                    "state_province" => "TX",
                    "postal_code" => "77449",
                    "country_code" => 'US',
                    "phone" => "8449551723",
                    "email" => "support@drapefit.com"
                ],
                // "service_type" => "usps_priority_mail",
                "package" => [
                    "packaging_type" => "package",
                    "weight" => $postdata['weight'],
                    "weight_unit" => "pound",
                    "length" => $postdata['length'],
                    "width" => $postdata['width'],
                    "height" => $postdata['height'],
                    "dimension_unit" => "inch"
                ],
                "delivery_confirmation_type" => "tracking",
               /* "insurance"=> [
                    "insurance_provider"=> "stamps_com",
                    "insured_value"=>
                    [
                        "amount"=> 200,
                        "currency"=> "usd"
                    ]
                ],*/
                // "carrier"=> "usps",
                "ship_date" => date('Y-m-d', strtotime($postdata['ship_date'])), //"[[$isoTimestamp]]",
                "is_return_label" => true,
                "service_type" => "ups_ground",
                "is_return_label"=> true,
                "advanced_options"=> [
                    "is_pay_on_use"=> true,
                    // "return_options"=> [
                    //     "outbound_label_id"=> $result['label_id']
                    // ]
                ],
                "label_options" => [
                    "label_size" => "4x6",
                    "label_format" => "pdf",
                    "label_logo_image_id" => 0,
                    "label_output_type" => "url"
                ],
                "is_test_label" => false
            ];

            $rch = curl_init($get_token['base_url'].'v1/labels');

            $authKey = $postdata['stamp_access_token'];
            $authHeaders = array();
//        $authHeaders[] = 'Content-Type: application/x-www-form-urlencoded';
            $authHeaders[] = 'Content-Type: application/json';
            $authHeaders[] = 'Authorization: Bearer ' . $authKey;
            $authHeaders[] = 'ship_date: ' . date('Y-m-d', strtotime($postdata['ship_date']));
            $authHeaders[] = 'Idempotency-Key: ' . md5(time());

            //set authorization headers
            curl_setopt($rch, CURLOPT_HTTPHEADER, $authHeaders);

            curl_setopt($rch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($rch, CURLOPT_POSTFIELDS, $returndatax);
            curl_setopt($rch, CURLOPT_POSTFIELDS, json_encode($returndatax));

            // execute!
            $return_response = curl_exec($rch);

            // close the connection, release resources used
            curl_close($rch);
            echo "<pre>";
            // do anything you want with your response
            print_r(json_encode($returndatax));
            echo "<br>";
            // print_r($return_response);
            $return_result = json_decode($return_response, true);

            print_r($return_result);
            //   exit;

            if (!empty($return_result['message']) && ($return_result['message'] == 'Unauthorized')) {
                $this->Flash->error(__('Invalid code. Please generate new token and process again.'));
                return $this->redirect(['action' => 'index']);
            } else if (!empty($return_result['error_reference_id'])) {
                $this->Flash->error(__($return_result['errors'][0]['error_message']));
                return $this->redirect(['action' => 'processToken']);
            } else {
                echo "<br>Return Details : ";
                echo "<br>Order id: " . $stamp_order_id;
                echo "<br>Tracking Number : " . $return_result['tracking_number'];
                echo "<br>Label id : " . $return_result['label_id'];
                echo "<br>Carrier : " . $return_result['carrier'];
                echo "<br>Service type : " . $return_result['service_type'];
                echo "<br>Packaging type : " . $return_result['packaging_type'];
                echo "<br>Estimated delivery days : " . $return_result['estimated_delivery_days'];
                echo "<br>Estimated delivery date : " . $return_result['estimated_delivery_date'];
                $this->Products->updateAll(['return_usps_tracking_no' => $return_result['tracking_number']], ['keep_status' => 0, 'payment_id' => $stamp_order_id]);
                    $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => $stamp_order_id]);
                $stamps_label_details = $this->StampsOrderDtls->find('all')->where(['payment_id'=>$stamp_order_id])->first();
                if (!empty($stamps_label_details) && !empty($stamps_label_details->id)) {
                        $newArr['id'] = $stamps_label_details->id;
                    }
                    $newArr['payment_id'] = $stamp_order_id;
                    $newArr['return_resp_data'] = $return_response;
                    $newArr['return_label_id'] = $return_result['label_id'];
                    $newArr['return_tracking_number'] = $return_result['tracking_number'];
                    $newArr['return_label_url'] = $return_result['labels'][0]['href'];

                    $newRw = $this->StampsOrderDtls->newEntity();
                    $newRw = $this->StampsOrderDtls->patchEntity($newRw, $newArr);
                    $this->StampsOrderDtls->save($newRw);

                foreach ($return_result['labels'] as $lbl) {
                    echo "<br>Link: " . $lbl['href'];
                }
                echo "<br>";
                echo "<br><a href='" . $return_result['labels'][0]['href'] . "' target='_blank'>Print Return Label </a>";
            }
            echo "<br>";
            $this->Flash->success(__('Label generated.'));
            return $this->redirect(['action' => 'printLabel']);
//            exit; 
        }

        $this->set(compact('stamp_access_token', 'all_paid_list', 'stamp_order_id'));
    }
    
    public function printLabel(){          
        $this->loadModel('StampsOrderDtls');
        $stamp_order_id = $this->request->session()->read('stamp_order_id');
        $stamps_label_details = $this->StampsOrderDtls->find('all')->where(['payment_id'=>$stamp_order_id])->first();

        $this->set(compact('stamps_label_details'));
    }

    public function getUserDetails() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $postdata = $this->request->data;
            $payment_id = $postdata['order_id'];
            $useridDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $payment_id])->first();
            $userid = $useridDetails->user_id;
            $kidid = $useridDetails->kid_id;
            $user_dtl = $this->Users->find('all')->where(['id' => $userid])->first();
            if (!empty($useridDetails->shipping_address_id)) {
                $shipping_address = $this->ShippingAddress->find('all')->where(['id' => $useridDetails->shipping_address_id])->first();
                $u_name = $shipping_address->full_name;
            } else {
                $shipping_addressCheck = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'ShippingAddress.kid_id' => $kidid, 'default_set' => 1])->first();
                if ($shipping_addressCheck->kid_id == 0) {
                    $kid_name = $this->KidsDetails->find('all')->where(['id' => $kidid])->first();
                    $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'default_set' => 1])->first();
                    $u_name = $kid_name->kids_first_name;
                } else {
                    $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'ShippingAddress.kid_id' => $kidid, 'default_set' => 1])->first();
                    $u_name = $shipping_address->full_name;
                }
            }

            $this->set(compact('stamp_access_token', 'u_name', 'shipping_address', 'user_dtl', 'useridDetails'));
        } else {
            $this->Flash->error(__('Invalid page access'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function labelPrintTest() {
        $data = [
            "from_address" => [
                "company_name" => "Drape Fit Inc",
                "name" => "Drape Fit",
                "address_line1" => "3820 N. Mason Rd Ste E ",
//                "address_line2" => "",
//                "address_line3" => "",
                "city" => "Katy",
                "state_province" => "TX",
                "postal_code" => "77449",
                "country_code" => 'US',
                "phone" => "(844) 955-1723",
                "email" => "support@drapefit.com",
                "residential_indicator" => "Yes",
            ],
//            "return_address" => [
//                "company_name" => "Drape Fit Inc",
//                "name" => "Drape Fit",
//                "address_line1" => "3820 N. Mason Rd Ste E ",
////                "address_line2" => "",
////                "address_line3" => "",
//                "city" => "Katy",
//                "state_province" => "Texas",
//                "postal_code" => "77449",
//                "country_code" => 'US',
//                "phone" => "(844) 955-1723",
//                "email" => "support@drapefit.com",
//                "residential_indicator" => "Yes",
//            ],
            "to_address" => [
                "name" => "Minerva M",
                "address_line1" => "351 S Studio Dr",
                "city" => "Lake Buena Vista",
                "state_province" => "FL",
                "postal_code" => "32830",
                "country_code" => "US",
                "email" => "minerva.m@test.com"
//                "company_name" => "Drape Fit Inc",
//                "name" => "Drape Fit",
//                "address_line1" => "3820 N. Mason Rd Ste E ",
//                "address_line2" => "",
//                "address_line3" => "",
//                "city" => "Katy",
//                "state_province" => "Texas",
//                "postal_code" => "77449",
//                "country_code" => st,
//                "phone" => "(844) 955-1723",
//                "email" => "support@drapefit.com",
//                "residential_indicator" => "Yes",
            ],
            "service_type" => "usps_priority_mail", //'usps_first_class_mail',
            "package" => [
                "packaging_type" => "package",
                "weight" => 4,
                "weight_unit" => "ounce",
//                "packaging_type" => 'package',
//                "weight" => 10,
//                "weight_unit" => 'ounce',
//                "length" => 10,
//                "width" => 10,
//                "height" => 10,
//                "dimension_unit" => 'inch',
            ],
//            "delivery_confirmation_type" => none,
//            "insurance" => [
//                "insurance_provider" => 'stamps_com',
//                "insured_value" => [
//                    "amount" => 100,
//                    "currency" => 'usd',
//                ]
//            ],
//            "customs" => [
//                "contents_type" => 'gift',
//                "contents_description" => 'test test',
//                "non_delivery_option" => 'treat_as_abandoned',
//                "sender_info" => [
//                    "license_number" => 'ttttt',
//                    "certificate_number" => 'ttttt',
//                    "invoice_number" => 'ttttt',
//                    "internal_transaction_number" => 'ttttt',
//                    "passport_number" => 'ttttt',
//                    "passport_issue_date" => '20-03-2023',
//                    "passport_expiration_date" => '20-12-2023',
//                ],
//                "recipient_info" => [
//                    "tax_id" => 'ttttt',
//                ],
//                "customs_items" => [
//                    "0" => [
//                        "item_description" => 'string',
//                        "quantity" => 0,
//                        "unit_value" => [
//                            "amount" => 0,
//                            "currency" => 'usd',
//                        ],
//                        "item_weight" => 0,
//                        "weight_unit" => 'ounce',
//                        "harmonized_tariff_code" => 'string',
//                        "country_of_origin" => 'string',
//                        "sku" => 'string',
//                    ]
//                ]
//            ],
            "ship_date" => '2023-03-25',
//            "is_return_label" => 1,
//            "advanced_options" => [
//                "non_machinable" => 1,
//                "saturday_delivery" => 1,
//                "delivered_duty_paid" => 1,
//                "hold_for_pickup" => 1,
//                "certified_mail" => 1,
//                "return_receipt" => 1,
//                "return_receipt_electronic" => 1,
//                "collect_on_delivery" => [
//                    "amount" => 0,
//                    "currency" => 'usd',
//                ],
//                "registered_mail" => [
//                    "amount" => 0,
//                    "currency" => 'usd',
//                ],
//                "sunday_delivery" => 1,
//                "holiday_delivery" => 1,
//                "restricted_delivery" => 1,
//                "notice_of_non_delivery" => 1,
//                "special_handling" => [
//                    "special_contents_type" => 'hazardous_materials',
//                    "fragile" => 1,
//                ],
//                "no_label" => [
//                    "is_drop_off" => 1,
//                    "is_prepackaged" => 1,
//                ],
//                "is_pay_on_use" => 1,
//                "return_options" => [
//                    "outbound_label_id" => 'string',
//                ]
//            ],
//            "label_options" => [
//                "label_size" => '4x6',
//                "label_format" => 'pdf',
//                "label_logo_image_id" => 0,
//                "label_output_type" => 'url',
//            ],
//            "email_label" => [
//                "email" => 'debmicrofinet@gmail.com',
//                "email_notes" => 'string',
//                "bcc_email" => 'debmicrofinet@gmail.com',
//            ],
//            "references" => [
//                "printed_message1" => 'debmicrofinet@gmail.com',
//                "printed_message2" => '',
//                "printed_message3" => '',
//                "cost_code_id" => 0,
//                "reference1" => 'string',
//                "reference2" => '',
//                "reference3" => '',
//                "reference4" => '',
//            ],
//            "order_details" => [
//                "order_source" => '',
//                "order_number" => '',
//                "items_ordered" => [
//                    "0" => [
//                        "item_name" => 'string',
//                        "quantity" => 0,
//                        "image_url" => '',
//                        "item_options" => [
//                            "0" => [
//                                "attribute" => '',
//                                "value" => '',
//                            ]
//                        ]
//                    ]
//                ]
//            ],
            "is_test_label" => true,
        ];
        $datax = [
            "from_address" => [
                "company_name" => "Drape Fit Inc",
                "name" => "Drape Fit",
                "address_line1" => "3820 N. Mason Rd Ste E ",
                "address_line2" => null,
                "city" => "Katy",
                "state_province" => "TX",
                "postal_code" => "77449",
                "country_code" => 'US',
                "phone" => "8449551723",
                "email" => "support@drapefit.com",
                "residential_indicator" => "No",
            ],
            "return_address" => [
                "company_name" => "Drape Fit Inc",
                "name" => "Drape Fit",
                "address_line1" => "3820 N. Mason Rd Ste E ",
                "address_line2" => null,
                "city" => "Katy",
                "state_province" => "TX",
                "postal_code" => "77449",
                "country_code" => 'US',
                "phone" => "8449551723",
                "email" => "support@drapefit.com",
            ],
            "to_address" => [
                "company_name" => "SERA REST",
                "name" => "SERA REST",
                "address_line1" => "1990 E Grand Ave",
                "address_line2" => null,
                "city" => "El Segundo",
                "state_province" => "CA",
                "postal_code" => "90245",
                "country_code" => "US",
                "phone" => "8449551723",
                "email" => "debmicrofinet@gmail.com"
            ],
            "service_type" => "usps_priority_mail",
            "package" => [
                "packaging_type" => "package",
                "weight" => 3,
                "weight_unit" => "pound",
                "length" => 8,
                "width" => 8,
                "height" => 4,
                "dimension_unit" => "inch"
            ],
            "delivery_confirmation_type" => "tracking",
            "ship_date" => '2024-02-12', //"[[$isoTimestamp]]",
            "is_return_label" => false,
            "label_options" => [
                "label_size" => "4x6",
                "label_format" => "pdf",
                "label_logo_image_id" => 0,
                "label_output_type" => "url"
            ],
            "is_test_label" => true
        ];

        $ch = curl_init('https://api.testing.stampsendicia.com/sera/v1/labels');

        $authKey = "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6IlA3Z3pLRGdfRENlVzcyeXZ3cnpQcCJ9.eyJodHRwczovL3N0YW1wc2VuZGljaWEuY29tL2ludGVncmF0aW9uX2lkIjoiNGU5MWNjMjktOTVlMC00MGVjLTkyZGYtZTVhZTYzNjY3OTI3IiwiaHR0cHM6Ly9zdGFtcHNlbmRpY2lhLmNvbS91c2VyX2lkIjozNzEwNjY5LCJpc3MiOiJodHRwczovL3NpZ25pbi50ZXN0aW5nLnN0YW1wc2VuZGljaWEuY29tLyIsInN1YiI6ImF1dGgwfDM3MTA2NjkiLCJhdWQiOiJodHRwczovL2FwaS5zdGFtcHNlbmRpY2lhLmNvbSIsImlhdCI6MTcwNzQ2MDIzMSwiZXhwIjoxNzA3NDYxMTMxLCJhenAiOiJyazN6d0pEV3hFUW9lYUZYUUJMQTJQbG9tVUtKbmh2eSJ9.lhogdC_f7JCBtWfUoY6jBT3--eTgndj0ighw-fJgmtUH51C_KkzuWNV-ARD6wul1Uqr44WyVG-9waw6HHM5h_H5HGz51D5T5XzKFm5rOK45-EWcAzC3j5MWjAIRoFP5PPxMF02a9_I9BrzBv97xI1Jymbxg1wJlCKUXUa4K7fRULaloSNu6jXoXFOdFk9Dzrbjks74-PtqneIc0PSbJQ44yFsCjmw7WAeFFdvWeLtocws15lAmySpsa6SJnWpKiksHyPrMmkHLs_OeUN0SDS3BVuzdRf5H3lkmWYkpXDBc3FCriEJiG505cKZeL3-TVHm6_LMw-4JjZliu0pS_JHng";
        $authHeaders = array();
//        $authHeaders[] = 'Content-Type: application/x-www-form-urlencoded';
        $authHeaders[] = 'Content-Type: application/json';
        $authHeaders[] = 'Authorization: Bearer ' . $authKey;
        $authHeaders[] = 'ship_date: 2023-03-28';
        $authHeaders[] = 'Idempotency-Key: ' . md5(time());

        //set authorization headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $authHeaders);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $datax);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datax));

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        echo "<pre>";
        // do anything you want with your response
        print_r(json_encode($datax));
        echo "<br>";
        print_r($response);
        print_r(json_decode($response, true));

        exit;
    }
}

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
use Cake\I18n\FrozenTime;

class SendlesController extends AppController {

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
        $this->loadModel('SendleOrderDtls');
        $this->viewBuilder()->layout('ajax');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(["index", "processToken", "labelPrintTest", "getUserDetails"]);
    }

    public function getToken() {
        $this->loadModel('Sendles');
        $sendle = $this->Sendles->find('all')->first();
        $token_dtls = [];
        if (!empty($sendle)) {
            $token_dtls['status'] = 'success';
            if ($sendle->sendle_mode == "sandbox") {
                $token_dtls['base_url'] = 'https://sandbox.sendle.com/';
            }
            if ($sendle->sendle_mode == "live") {
                $token_dtls['base_url'] = 'https://api.sendle.com/';
            }
            $token_dtls['sendle_id'] = $sendle->sendle_id;
            $token_dtls['sendle_api_key'] = $sendle->sendle_api_key;
        } else {
            $token_dtls['status'] = 'error';
        }
        return json_encode($token_dtls);
    }

    public function sendleTest() {
        $token_dtl = json_decode($this->getToken(), true);
        print_r($token_dtl);
        if ($token_dtl['status'] == 'success') {
//base64_encode(Sendle ID:API Key)
            $datax = base64_encode($token_dtl['sendle_id'] . ':' . $token_dtl['sendle_api_key']);
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $token_dtl['base_url'] . "api/ping",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authorization: Basic " . $datax
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
//                echo "cURL Error #:" . $err;
                $this->Flash->error(__('Error # ' . $err));
                return $this->redirect($this->referer());
            } else {
                if (!empty($final_resp['error'])) {
                    $this->Flash->error(__('Error : ' . $response));
                    return $this->redirect($this->referer());
                    return json_encode($final_resp);
                } else {
                    echo $response;
                    exit;
                }
            }
        }
        if ($token_dtl['status'] == 'error') {
            $this->Flash->error(__('404 Service not available.'));
            return $this->redirect($this->referer());
        }
    }

    public function index($payment_id) {
        $this->viewBuilder()->layout('admin');

        $useridDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $payment_id])->first();

        $productTrackingNo = $this->Products->find('all')->where(['Products.keep_status IN' => [0, 1, 2, 3], 'Products.payment_id' => $payment_id])->order(['id' => 'DESC'])->first();

        if (empty($useridDetails->box_type)) {
            $this->Flash->error(__('Select box type.'));
            return $this->redirect($this->referer());
        }

        $token_dtl = json_decode($this->getToken(), true);
        if ($token_dtl['status'] == 'success') {


            $userid = $useridDetails->user_id;
            $kidid = $useridDetails->kid_id;

            $user_dtl = $this->Users->find('all')->where(['id' => $userid])->first();

            if (!empty($useridDetails->shipping_address_id)) {
                $shipping_address = $this->ShippingAddress->find('all')->where(['id' => $useridDetails->shipping_address_id])->first();
                $u_name = $shipping_address->full_name;
            } else {
                $shipping_addressCheck = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'ShippingAddress.kid_id' => $kidid, 'default_set' => 1])->first();
                
                if ($shipping_addressCheck->kid_id != 0) {
                    $kid_name = $this->KidsDetails->find('all')->where(['id' => $kidid])->first();
                    $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'default_set' => 1])->first();
                    $u_name = $kid_name->kids_first_name;
                } else {
                    $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid, 'ShippingAddress.kid_id' => $kidid, 'default_set' => 1])->first();
                    $u_name = $shipping_address->full_name;
                }
            }

            $prv_data = $this->SendleOrderDtls->find('all')->where(['payment_id' => $payment_id])->order(['id' => 'desc'])->first();

            $this->set(compact('stamp_access_token', 'u_name', 'shipping_address', 'user_dtl', 'payment_id', 'prv_data', 'useridDetails', 'productTrackingNo'));
        }
        if ($token_dtl['status'] == 'error') {
            $this->Flash->error(__('404 Service not available.'));
            return $this->redirect($this->referer());
        }
    }

    public function getProduct() {
//        $url = "https://sandbox.sendle.com/api/products?weight_units=kg&sender_country=US&sender_address_line1=2nd%20st%20Ste%20E%20Katy%20TX%2077449%20United%20States&sender_suburb=Katy%20&sender_postcode=77449&receiver_address_line1=14090%20Southwest%20Frwy%20Ste%20300%20Sugar%20Land%20TX%2077478%20United%20States&receiver_suburb=Sugar%20Land&receiver_postcode=77478&receiver_country=US&weight_value=5";

        if ($this->request->is('post')) {
            $postData = $this->request->data;

            $token_dtl = json_decode($this->getToken(), true);
            if ($token_dtl['status'] == 'success') {
//base64_encode(Sendle ID:API Key)
                $datax = base64_encode($token_dtl['sendle_id'] . ':' . $token_dtl['sendle_api_key']);

                $url = $token_dtl['base_url'] . "api/products?" . http_build_query($postData['data']);
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "accept: application/json",
                        "authorization: Basic " . $datax
                    ],
                ]);
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err) {
//            echo "cURL Error #:" . $err;
                    echo json_encode(['status' => 'error', 'msg' => $err]);
                } else {
//            echo "<pre>";
//            print_r(json_decode($response, true));
//            echo "</pre>";
                    $all_resp = json_decode($response, true);
                    if (!empty($all_resp['error'])) {
                        echo json_encode(['status' => 'error', 'msg' => $response]);
                        exit;
                    }
                    $final_res = [];
                    foreach ($all_resp as $key => $al_res) {
                        $final_res[$key]['gross'] = $al_res['quote']['gross']['amount'] . " " . $al_res['quote']['gross']['currency'];
                        $final_res[$key]['tax'] = $al_res['quote']['tax']['amount'] . " " . $al_res['quote']['tax']['currency'];
                        $final_res[$key]['send_date'] = $al_res['eta']['for_send_date'];
                        $final_res[$key]['days_delivery'] = $al_res['eta']['days_range'][0] . "-" . $al_res['eta']['days_range'][1];
                        $final_res[$key]['delivery_date'] = /* $al_res['eta']['date_range'][0] . " to " . */ $al_res['eta']['date_range'][1];
                        $final_res[$key]['route'] = $al_res['route']['type'] . " : " . $al_res['route']['description'];
                        $final_res[$key]['product_code'] = $al_res['product']['code'];
                    }

                    echo json_encode(['status' => 'success', 'msg' => $final_res, $url, $all_resp]);
                }
            }
            if ($token_dtl['status'] == 'error') {
//                $this->Flash->error(__('404 Service not available.'));
//                return $this->redirect($this->referer());
                echo json_encode(['status' => 'error', 'msg' => $err]);
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => '']);
        }
        exit;
    }

    public function createOrder() {

        if ($this->request->is('post')) {
            $postData = $this->request->data;
//            echo json_encode(['status' => 'error', 'msg' => $postData]);
//            exit;
            $token_dtl = json_decode($this->getToken(), true);
            if ($token_dtl['status'] == 'success') {
//base64_encode(Sendle ID:API Key)
                $datax = base64_encode($token_dtl['sendle_id'] . ':' . $token_dtl['sendle_api_key']);

                $url = $token_dtl['base_url'] . "api/orders";

                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($postData['data']/* [
                              'sender' => [
                              'contact' => [
                              'name' => 'Sukhendu Mukherjee',
                              'email' => 'debmicrofinet@gmail.com',
                              'phone' => '9123671055',
                              'company' => 'Drape Fit Inc.'
                              ],
                              'address' => [
                              'country' => 'US',
                              'address_line1' => '14090 Southwest Frwy Ste 300, Sugarland, Texas, 77478, United States of America',
                              'address_line2' => '14090 Southwest Frwy Ste 300, Sugarland, Texas, 77478, United States of America',
                              'suburb' => 'Sugarland',
                              'postcode' => '77478',
                              'state_name' => 'Texas'
                              ],
                              'instructions' => 'Ssdsd sdsdfgfg'
                              ],
                              'receiver' => [
                              'contact' => [
                              'name' => 'Sukhendu Mukherjee',
                              'email' => 'suprakash.mondal@drapefit.com',
                              'phone' => '9123671055',
                              'company' => '9123671055'
                              ],
                              'address' => [
                              'country' => 'US',
                              'address_line1' => '2nd st Ste E Katy TX 77449 United States',
                              'address_line2' => '2nd st Ste E Katy TX 77449 United States',
                              'postcode' => '77449 ',
                              'suburb' => 'Katy ',
                              'state_name' => 'Texas'
                              ],
                              'instructions' => 'Ssdsd sdsdfgfg'
                              ],
                              'weight' => [
                              'units' => 'lb',
                              'value' => '10'
                              ],
                              'dimensions' => [
                              'units' => 'in',
                              'length' => '10',
                              'width' => '5',
                              'height' => '4'
                              ],
                              'description' => 'Sukhendu Mukherjee',
                              'customer_reference' => 'Monomita',
                              'product_code' => 'STANDARD-DROPOFF'
                              ] */),
                    CURLOPT_HTTPHEADER => [
                        "Idempotency-Key: " . rand(11111111, 99999999), //Need to pass paymentId
                        "accept: application/json",
                        "authorization: Basic " . $datax,
                        "content-type: application/json"
                    ],
                ]);
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err) {
//                    echo "cURL Error #:" . $err;
                    echo json_encode(['status' => 'error', 'msg' => $err]);
                } else {
                    $all_resp = json_decode($response, true);
                    if (!empty($all_resp['error'])) {
                        echo json_encode(['status' => 'error', 'msg' => $response]);
                        exit;
                    }

                    $newArr = [];
                    $check_prv_data = $this->SendleOrderDtls->find('all')->where(['payment_id' => $postData['payment_id']])->order(['id' => 'desc'])->first();
                    $productTrackingNo = $this->Products->find('all')->where(['Products.keep_status IN' => [0, 1, 2, 3], 'Products.payment_id' => $postData['payment_id']])->order(['id' => 'DESC'])->first();
                    if (!empty($check_prv_data) && !empty($check_prv_data->id) && !empty($productTrackingNo->order_usps_tracking_no)) {
                        $newArr['id'] = $check_prv_data->id;
                    }
                    $newArr['post_dtls'] = json_encode($postData);
                    $newArr['payment_id'] = $postData['payment_id'];
                    $newArr['order_id'] = $all_resp['order_id'];
                    $newArr['ship_track_number'] = $all_resp['sendle_reference'];
                    $newArr['order_dtls'] = $response;
                    $newArr['ship_label_letter_url'] = $all_resp['labels'][0]['url'];
                    $newArr['ship_label_cropped_url'] = $all_resp['labels'][1]['url'];

                    $newRw = $this->SendleOrderDtls->newEntity();
                    $newRw = $this->SendleOrderDtls->patchEntity($newRw, $newArr);
                    $this->SendleOrderDtls->save($newRw);

                    $this->Products->updateAll(['order_usps_tracking_no' => $all_resp['sendle_reference']], ['keep_status' => 0, 'payment_id' => @$postData['payment_id']]);
                    $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => @$postData['payment_id']]);

                    echo json_encode(['status' => 'success', 'msg' => 'Label Generated', 'order_id' => $all_resp['order_id'], 'letter_label' => $all_resp['labels'][0]['url'], 'cropped_label' => $all_resp['labels'][1]['url']]);
                    /*
                      //Need to update tracking code

                      //For Men & Women
                      $this->Products->updateAll(['order_usps_tracking_no' => $data['order_usps_tracking_no'], 'return_usps_tracking_no' => $data['return_usps_tracking_no']], ['keep_status' => 0, 'payment_id' => @$data['payment_id']]);
                      $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => @$data['payment_id']]);
                      $this->Flash->success(__('Tracking data updated successfully.'));
                      $this->redirect($this->referer());
                     * 
                     * 
                      // For Boy & Girl Kid
                      $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => @$data['payment_id']]);
                      $this->Products->updateAll(['order_usps_tracking_no' => $data['order_usps_tracking_no'], 'return_usps_tracking_no' => $data['return_usps_tracking_no']], ['keep_status = ' => 0, 'payment_id' => @$data['payment_id']]);
                      $this->Flash->success(__('Tracking data updated successfully.'));
                      $this->redirect($this->referer());
                     */
                }
            }
            if ($token_dtl['status'] == 'error') {
//                $this->Flash->error(__('404 Service not available.'));
//                return $this->redirect($this->referer());
                echo json_encode(['status' => 'error', 'msg' => $err]);
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => '']);
        }
        exit;
    }

    public function viewOrder() {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://sandbox.sendle.com/api/orders/b55f3e6f-cb95-4f79-b86c-e08a151b1342",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Basic U0FOREJPWF9zdXByYWthc2hfbW9uZGFsX2RyYTpzYW5kYm94X1luQ1pEM0s3a0MyUkJTOUd0Q1JXck1uSg=="
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        exit;
    }

    public function returnProduct() {
        if ($this->request->is('post')) {
            $postData = $this->request->data;

            $check_prv_data = $this->SendleOrderDtls->find('all')->where(['payment_id' => $postData['payment_id']])->order(['id' => 'desc'])->first();
            if (empty($check_prv_data)) {
                echo json_encode(['status' => 'error', 'msg' => '']);
                exit;
            }
            $token_dtl = json_decode($this->getToken(), true);
            if ($token_dtl['status'] == 'success') {
                $datax = base64_encode($token_dtl['sendle_id'] . ':' . $token_dtl['sendle_api_key']);

                $url = $token_dtl['base_url'] . "api/orders/" . $check_prv_data->order_id . "/return";
                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => $url, //"https://sandbox.sendle.com/api/orders/" . $check_prv_data->order_id . "/return",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                        'delivery_instructions' => $postData['delivery_instructions']
                    ]),
                    CURLOPT_HTTPHEADER => [
                        "accept: application/json",
                        "authorization: Basic " . $datax,
                        "content-type: application/json"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
//                    echo "cURL Error #:" . $err;
                    echo json_encode(['status' => 'error', 'msg' => $err]);
                } else {
                    $all_resp = json_decode($response, true);
                    if (!empty($all_resp['error'])) {
                        echo json_encode(['status' => 'error', 'msg' => $response]);
                        exit;
                    }

                    $newArr = [];
                    $check_prv_data = $this->SendleOrderDtls->find('all')->where(['payment_id' => $postData['payment_id']])->order(['id' => 'desc'])->first();
                    if (!empty($check_prv_data) && !empty($check_prv_data->id)) {
                        $newArr['id'] = $check_prv_data->id;
                    }
                    $newArr['payment_id'] = $postData['payment_id'];
                    $newArr['returb_order_id'] = $all_resp['order_id'];
                    $newArr['return_track_number'] = $all_resp['sendle_reference'];
                    $newArr['return_order_dtls'] = $response;
                    $newArr['return_label_letter_url'] = $all_resp['labels'][0]['url'];
                    $newArr['return_label_cropped_url'] = $all_resp['labels'][1]['url'];

                    $newRw = $this->SendleOrderDtls->newEntity();
                    $newRw = $this->SendleOrderDtls->patchEntity($newRw, $newArr);
                    $this->SendleOrderDtls->save($newRw);

                    $this->Products->updateAll(['return_usps_tracking_no' => $all_resp['sendle_reference']], ['keep_status' => 0, 'payment_id' => @$postData['payment_id']]);
                    $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => @$postData['payment_id']]);

                    echo json_encode(['status' => 'success', 'msg' => 'Label Generated', 'order_id' => $all_resp['order_id'], 'letter_label' => $all_resp['labels'][0]['url'], 'cropped_label' => $all_resp['labels'][1]['url']]);
                    /*
                      //Need to update tracking code

                      //For Men & Women
                      $this->Products->updateAll(['order_usps_tracking_no' => $data['order_usps_tracking_no'], 'return_usps_tracking_no' => $data['return_usps_tracking_no']], ['keep_status' => 0, 'payment_id' => @$data['payment_id']]);
                      $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => @$data['payment_id']]);
                      $this->Flash->success(__('Tracking data updated successfully.'));
                      $this->redirect($this->referer());
                     * 
                     * 
                      // For Boy & Girl Kid
                      $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' => @$data['payment_id']]);
                      $this->Products->updateAll(['order_usps_tracking_no' => $data['order_usps_tracking_no'], 'return_usps_tracking_no' => $data['return_usps_tracking_no']], ['keep_status = ' => 0, 'payment_id' => @$data['payment_id']]);
                      $this->Flash->success(__('Tracking data updated successfully.'));
                      $this->redirect($this->referer());
                     */
                }
            }
            if ($token_dtl['status'] == 'error') {
//                $this->Flash->error(__('404 Service not available.'));
//                return $this->redirect($this->referer());
                echo json_encode(['status' => 'error', 'msg' => '']);
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => '']);
        }
        exit;
    }

    public function viewReturnOrder() {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://sandbox.sendle.com/api/orders/b55f3e6f-cb95-4f79-b86c-e08a151b1342/return",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Basic U0FOREJPWF9zdXByYWthc2hfbW9uZGFsX2RyYTpzYW5kYm94X1luQ1pEM0s3a0MyUkJTOUd0Q1JXck1uSg=="
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function trackOrder() {


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://sandbox.sendle.com/api/tracking/SB5NQ3G",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function downloadLabel($payment_id, $type) {
        //$datax = /* base64_encode( */'SANDBOX_suprakash_mondal_dra:sandbox_YnCZD3K7kC2RBS9GtCRWrMnJ'/* ) */;
        $order_data = $this->SendleOrderDtls->find('all')->where(['payment_id' => $payment_id])->order(['id' => 'desc'])->first();

        if ($type == "return") {
            $url = $order_data->return_label_cropped_url;
        } else {
            $url = $order_data->ship_label_cropped_url;
        }
// echo $url;exit;

        $token_dtl = json_decode($this->getToken(), true);
        if ($token_dtl['status'] == 'success') {
//base64_encode(Sendle ID:API Key)
            $datax = base64_encode($token_dtl['sendle_id'] . ':' . $token_dtl['sendle_api_key']);

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $url, /* "https://sendle-sandbox.herokuapp.com/api/orders/39bb77e9-6209-4a3d-b5fa-d403826c522a/labels/letter.pdf", */
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_USERPWD => $datax,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "accept: application/pdf",
                    "authorization: Basic " . $datax,
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            /* if ($err) {
              echo "cURL Error #:" . $err;
              } else {
              echo $response;
              } */

            if ($err) {
//                echo "cURL Error #:" . $err;
                $this->Flash->error(__('Error # ' . $err));
                return $this->redirect($this->referer());
            } else {
                if (!empty($final_resp['error'])) {
                    $this->Flash->error(__('Error : ' . $response));
                    return $this->redirect($this->referer());
                    return json_encode($final_resp);
                } else {
                    echo $response;
                    exit;
                }
            }
        }
        if ($token_dtl['status'] == 'error') {
            $this->Flash->error(__('404 Service not available.'));
            return $this->redirect($this->referer());
        }


        exit;
    }

    public function processToken() {
        $stamp_access_token = $this->request->session()->read('stamp_access_token');
        $stamp_order_id = $this->request->session()->read('stamp_order_id');
        $all_paid_list = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1]])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
        if ($this->request->is('post')) {
            $postdata = $this->request->data;
            $datax = [
                "from_address" => [
                    "company_name" => "Drape Fit Inc",
                    "name" => "Drape Fit",
                    "address_line1" => "3820 N. Mason Rd Ste E ",
                    "address_line2" => null,
                    "city" => "Katy",
                    "state_province" => "Texas",
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
                    "state_province" => "Texas",
                    "postal_code" => "77449",
                    "country_code" => 'US',
                    "phone" => "8449551723",
                    "email" => "support@drapefit.com",
                ],
                "to_address" => [
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
                "package" => [
                    "packaging_type" => "package",
                    "weight" => $postdata['weight'],
                    "weight_unit" => "pound",
                    "length" => $postdata['length'],
                    "width" => $postdata['width'],
                    "height" => $postdata['height'],
                    "dimension_unit" => "inch"
                ],
                "service_type" => "usps_pay_on_use_return",
                "delivery_confirmation_type" => "tracking",
                "ship_date" => date('Y-m-d', strtotime($postdata['ship_date'])), //"[[$isoTimestamp]]",
                "is_return_label" => true,
                // "advanced_options"=> [],
                "is_pay_on_use" => true,
                "return_options" => [
                    "outbound_label_id" => "txid"
                ],
                // "service_type"=> "usps_pay_on_use_return",
// "is_pay_on_use"=> true,
                "label_options" => [
                    "label_size" => "4x6",
                    "label_format" => "pdf",
                    "label_logo_image_id" => 0,
                    "label_output_type" => "url"
                ],
                "is_test_label" => true
            ];
            echo json_encode($datax);
// exit;
            $ch = curl_init('https://api.testing.stampsendicia.com/sera/v1/labels');
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
//              exit;
            if (!empty($result['message']) && ($result['message'] == 'Unauthorized')) {
                $this->Flash->error(__('Invalid code. Please generate new token and process again.'));
                return $this->redirect(['action' => 'index']);
            } else if (!empty($result['error_reference_id'])) {
                $this->Flash->error(__($result['errors'][0]['error_message']));
                return $this->redirect(['action' => 'processToken']);
            } else {
                echo "<br>Tracking Number : " . $result['tracking_number'];
                echo "<br>Label id : " . $result['label_id'];
                echo "<br>Carrier : " . $result['carrier'];
                echo "<br>Service type : " . $result['service_type'];
                echo "<br>Packaging type : " . $result['packaging_type'];
                echo "<br>Estimated delivery days : " . $result['estimated_delivery_days'];
                echo "<br>Estimated delivery date : " . $result['estimated_delivery_date'];
                foreach ($result['labels'] as $lbl) {
                    echo "<br>Link: " . $lbl['href'];
                }
                echo "<br>";
                echo "<br><a href='" . $result['labels'][0]['href'] . "' target='_blank'>Print Label </a>";
            }
            echo "<br>";
            /*
              $returndatax = [
              "from_address" => [
              "company_name" => "Drape Fit Inc",
              "name" => "Drape Fit",
              "address_line1" => "3820 N. Mason Rd Ste E ",
              "address_line2" => null,
              "city" => "Katy",
              "state_province" => "Texas",
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
              "state_province" => "Texas",
              "postal_code" => "77449",
              "country_code" => 'US',
              "phone" => "8449551723",
              "email" => "support@drapefit.com",
              ],
              "to_address" => [
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
              "ship_date" => date('Y-m-d', strtotime($postdata['ship_date'])), //"[[$isoTimestamp]]",
              "is_return_label" => true,
              "service_type"=> "usps_pay_on_use_return",
              "is_pay_on_use"=> true,
              "label_options" => [
              "label_size" => "4x6",
              "label_format" => "pdf",
              "label_logo_image_id" => 0,
              "label_output_type" => "url"
              ],
              "is_test_label" => true
              ];
              $rch = curl_init('https://api.testing.stampsendicia.com/sera/v1/labels');
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
              //            print_r(json_encode($returndatax));
              echo "<br>";
              // print_r($return_response);
              $return_result = json_decode($return_response, true);
              print_r($return_result);
              //              exit;
              if (!empty($return_result['message']) && ($return_result['message'] == 'Unauthorized')) {
              $this->Flash->error(__('Invalid code. Please generate new token and process again.'));
              return $this->redirect(['action' => 'index']);
              } else if (!empty($return_result['error_reference_id'])) {
              $this->Flash->error(__($return_result['errors'][0]['error_message']));
              return $this->redirect(['action' => 'processToken']);
              } else {
              echo "<br>Return Details : ";
              echo "<br>Tracking Number : " . $return_result['tracking_number'];
              echo "<br>Label id : " . $return_result['label_id'];
              echo "<br>Carrier : " . $return_result['carrier'];
              echo "<br>Service type : " . $return_result['service_type'];
              echo "<br>Packaging type : " . $return_result['packaging_type'];
              echo "<br>Estimated delivery days : " . $return_result['estimated_delivery_days'];
              echo "<br>Estimated delivery date : " . $return_result['estimated_delivery_date'];
              foreach ($return_result['labels'] as $lbl) {
              echo "<br>Link: " . $lbl['href'];
              }
              echo "<br>";
              echo "<br><a href='" . $return_result['labels'][0]['href'] . "' target='_blank'>Print Label </a>";
              }
              echo "<br>";
             */
            exit;
        }
        $this->set(compact('stamp_access_token', 'all_paid_list', 'stamp_order_id'));
    }

    public function getUserDetails() {
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
            $this->set(compact('stamp_access_token', 'u_name', 'shipping_address', 'user_dtl'));
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
                "state_province" => "Texas",
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
                "state_province" => "Texas",
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
                "state_province" => "Texas",
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
            "ship_date" => '2023-03-28', //"[[$isoTimestamp]]",
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
        $authKey = "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6IlA3Z3pLRGdfRENlVzcyeXZ3cnpQcCJ9.eyJodHRwczovL3N0YW1wc2VuZGljaWEuY29tL2ludGVncmF0aW9uX2lkIjoiNGU5MWNjMjktOTVlMC00MGVjLTkyZGYtZTVhZTYzNjY3OTI3IiwiaHR0cHM6Ly9zdGFtcHNlbmRpY2lhLmNvbS91c2VyX2lkIjozNzEwNjY5LCJpc3MiOiJodHRwczovL3NpZ25pbi50ZXN0aW5nLnN0YW1wc2VuZGljaWEuY29tLyIsInN1YiI6ImF1dGgwfDM3MTA2NjkiLCJhdWQiOiJodHRwczovL2FwaS5zdGFtcHNlbmRpY2lhLmNvbSIsImlhdCI6MTY3OTk3ODAxMCwiZXhwIjoxNjc5OTc4OTEwLCJhenAiOiJyazN6d0pEV3hFUW9lYUZYUUJMQTJQbG9tVUtKbmh2eSJ9.jH3wKRPu0vQvxt16XchxHAWUGu3Td2LqtlmjxoUoWDAQ9RKmUD-24uIRx-oKzRiluDa_ZuYJeoGdHWsQ4Pq50XlVc_qICeSAgkzkHksg4s8xlMNhLwrBSsgeIh0HnzwxRpGwwf1ZTazcqPBWbxQQQfWyV7j2pFyttZ4wjm1FFDVw9_NQehg5KeDwZjqXIlopmZPNTONodeAnnUUFIhlMUTpXpgzI7hVK9WPBD8i27IznVrZWNt6SDZmF7UJDJ2mlQHlh7qaK9LR7pXPMek8PmknlOCsuTLsxcb-t8JjyAWwEB5ynj_xjzF5Ds9BgZNPFZI4vCe4-gGOYAfKzDH2B2Q";
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

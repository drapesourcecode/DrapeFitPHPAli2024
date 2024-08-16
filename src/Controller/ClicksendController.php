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
use Cake\Log\Log;
use ClickSend\Configuration;
use ClickSend\Api\SMSApi;
use ClickSend\Model\SmsMessage;
use ClickSend\Model\SmsMessageCollection;
use GuzzleHttp\Client as GuzzleClient;

require_once(ROOT.'/vendor'.DS.'/sendsms/autoload.php');




class ClicksendController extends AppController {



    public function initialize() {

        parent::initialize();



        $this->loadComponent('Paginator');



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

        $this->loadModel('SalesNotApplicableState');

        $this->loadModel('InProductType');

        $this->loadModel('InColors');

        $this->loadModel('Stamps');



        $this->loadModel('InProductLogs');

        $this->viewBuilder()->layout('admin');

    }



    public $paginate = ['limit' => 50];



    public function beforeFilter(Event $event) {

        $this->Auth->allow(['sendSms','sendSmsPost','getClickSendApiKeys']);

    }

    public function getClickSendApiKeys(){
        $this->loadModel('CofigKeys');
        $get_api_key = $this->CofigKeys->find('all')->where(['name'=>'click_send'])->first();
        $apikey = json_decode($get_api_key->key_val, true);
        return $apikey;
    }

    public function sendSms($phone, $mssg)
    {
        $api_key_data = $this->getClickSendApiKeys();
        $phone = !empty($phone)?$phone:'+12148626575';
        $mssg = !empty($mssg)?$mssg:'';
        $username = $api_key_data['username'];//'taylor@drapefit.com';
        $apiKey =  $api_key_data['apiKey'];//'6619F116-722E-09E7-53EF-2622EBA7943F';

        
        $config = Configuration::getDefaultConfiguration()
            ->setUsername($username)
            ->setPassword($apiKey);

       
        $apiInstance = new SMSApi(new GuzzleClient(), $config);

       
        $msg = new SmsMessage();
        $msg->setSource('SOURCE') 
            ->setBody($mssg) 
            ->setTo($phone); 

       
        $smsMessages = new SmsMessageCollection();
        $smsMessages->setMessages([$msg]);

        try {
           
            $result = $apiInstance->smsSendPost($smsMessages);

           
            print_r($result); 

            $this->Flash->success('SMS sent successfully!');
        } catch (\Exception $e) {
           
            $this->Flash->error('Failed to send SMS: ' . $e->getMessage());
        }

       exit; 
        // return $this->redirect(['action' => 'index']);
    }
    public function sendSmsPost()
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $phone = $data['phone'];
            $mssg = $data['msg'];
            $suj = !empty($data['suj'])?$data['suj']:"";
            // $username = 'sukhendu.mukherjee@drapefit.com';
            // $apiKey = '32DE7A55-8A97-ADCD-7BA2-E2ED5ABF474D';     
            
            $api_key_data = $this->getClickSendApiKeys();       
            $username = $api_key_data['username'];//'taylor@drapefit.com';
            $apiKey =  $api_key_data['apiKey'];//'6619F116-722E-09E7-53EF-2622EBA7943F';
    
            
            $config = Configuration::getDefaultConfiguration()
                ->setUsername($username)
                ->setPassword($apiKey);
    
           
            $apiInstance = new SMSApi(new GuzzleClient(), $config);
    
           
            $msg = new SmsMessage();
            $msg->setSource('SOURCE') 
                ->setBody($mssg) 
                ->setTo($phone); 
    
           
            $smsMessages = new SmsMessageCollection();
            $smsMessages->setMessages([$msg]);
    
            try {
               
                $result = $apiInstance->smsSendPost($smsMessages);
    
                
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $from = $fromMail->value;
                $subject = $suj." SMS sent to : $phone";
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                // $this->Custom->sendEmail($toSupport, $from, $subject, $mssg);
                
                $this->mailLogEntry('SMS SEND', $from, $subject, $toSupport, "SENT on : ".date('Y-m-d H:i:s').'<br>'.$mssg);
                // $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $mssg);
                
                echo json_encode(['status' => 'success', 'msg' => $result]);
                exit;
    
                $this->Flash->success('SMS sent successfully!');
            } catch (\Exception $e) {
               echo json_encode(['status' => 'error', 'msg' => $e->getMessage()]);
                exit;
                // $this->Flash->error('Failed to send SMS: ' . $e->getMessage());
            }
        
            
        }
       exit;
    }
    
     public function mailLogEntry($batch_name, $frm, $subject, $to_email, $msg)
    {
        $this->loadModel('EmailLogs');

        $newLogArr = [];

        $newLogArr['batch_name'] = $batch_name;
        $newLogArr['frm'] = $frm;
        $newLogArr['subject'] = $subject;
        $newLogArr['to_email'] = $to_email;
        $newLogArr['msg'] = $msg;
        
        $chk = $this->EmailLogs->find('all')->where(['subject'=>$subject,'to_email'=>$to_email, 'created_on LIKE'=>'%'.date('Y-m-d').'%'])->count();
        if($chk<1){
            $newDtRow = $this->EmailLogs->newEntity();
            $newDtRow = $this->EmailLogs->patchEntity($newDtRow, $newLogArr);
            $this->EmailLogs->save($newDtRow);
        }

        return true;
    }

    

}


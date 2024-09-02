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

class CronjobsController extends AppController {

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
        $this->loadModel('InProductLogs');

        $this->loadModel('CronjobsReportsDebasish');
        $this->loadModel('LetsPlanYourFirstFix');
        $this->viewBuilder()->layout('ajax');
    }

    public function beforeFilter(Event $event) {

        $this->Auth->allow(['processInvateryProdcut', 'boxUpdatex', 'allstatusUpdate', 'autoMentionskid', 'giftMailDelivary', 'authorizeCreditCard', 'autoMentions', 'boxUpdate', 'autocheckoutmail', 'notCompleteProfile', 'notPaidOnce', 'addressNotComplete', 'autocheckoutmail', 'kidAutocheckoutmail', 'kidProfileNotComplete', 'activeSubscription', 'stripeApiPay', 'birthdayMail', 'checkStripPay', 'webhook', 'autocheckoutmailByEmail', 'productBatchAutoCheckout', 'productAutoCheckout','productWeeklyAutoCheckout', 'cronMailSent', 'mailLogEntry','productWeeklyAutoCheckoutProcess']);
    }

    public function allstatusUpdate() {
        $this->Users->updateAll(['notCompleteProfile_mail' => 0], [1]);
        $this->Users->updateAll(['notPaidOnce' => 0], [1]);
        $this->Users->updateAll(['addressNotComplete' => 0], [1]);
        $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 0], [1]);
        exit;
    }

    public function giftMailDelivary()
    {

        $getDetails = $this->Giftcard->find('all')->where(['type' => 1, 'delivery_date' => date('Y-m-d'), 'mail_status' => 'NULL', 'is_active' => 0]);

        foreach ($getDetails as $details) {

            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GIFTCARD_EMAIL'])->first();

            $fromName = $details->from_name;

            $fromMail = $details->from_email;

            $to = $details->to_email;

            $name = $details->to_name;

            $code = $details->giftcode;

            $price = number_format($details->price, 2);

            $expiry_date = $details->expire_date;

            $msg = $details->msg;

            $subject = $emailMessage->display;

            $sitename = SITE_NAME;

            $message = $this->Custom->giftCardEmail($emailMessage->value, $to, $name, $fromName, $fromMail, $price, $code, $expiry_date, $msg, $sitename);

            $from = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first()->value;

            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

            //            $emailMessageSupport = $this->Settings->find('all')->where(['Settings.name' => 'GIFTCARD_EMAIL_SUPPORT'])->first();

            $messageSupport = $message; // $this->Custom->giftCardEmailSupport($emailMessage->value, $to, $name, $fromName, $fromMail, $code, $price, $expiry_date, $msg, $sitename);

            $subjectSupport = $subject; //$emailMessageSupport->display;

            $this->mailLogEntry('giftMailDelivary', $from, $subjectSupport, $toSupport, $messageSupport);

            /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupport, $messageSupport)) {

                $supportstatus = "send";
            } else {

                $supportstatus = "faild";
            }*/



            /*if ($this->Custom->sendEmail($to, $from, $subject, $message)) {*/
            if ($this->mailLogEntry('giftMailDelivary', $from, $subject, $to, $message)) {

                $process = 'giftMailDelivary()';

                $name = $name;

                $kidId = '0';

                $kidName = 'No';

                $email = $to;

                $subject = $subject;

                $status = 'Send';

                $userId = '0';

                $client = 'Client';

                $upportemail = $toSupport;

                $support_subject = $subjectSupport;

                $supportstatus = $supportstatus;

                $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
            } else {

                $process = 'giftMailDelivary()';

                $name = $name;

                $kidId = '0';

                $kidName = 'No';

                $email = $to;

                $subject = $subject;

                $status = 'faild';

                $userId = '0';

                $client = 'Client';

                $upportemail = $toSupport;

                $support_subject = $subjectSupport;

                $supportstatus = $supportstatus;

                $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
            }



            $this->Giftcard->updateAll(array('mail_status' => '1'), array('id' => $details->id));

            //$this->checkBydebasish();
        }



        exit;
    }

    public function notCompleteProfile()
    {

        $this->Users->hasOne('usrdet', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);

        $all_clients = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.type' => 2, 'UserDetails.is_progressbar < ' => 100, 'notCompleteProfile_mail' => 0]);

        $count = 1;

        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PROFILE_NOT_COMPLETE'])->first();

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

        $emailMessageSupport = $this->Settings->find('all')->where(['Settings.name' => 'PROFILE_NOT_COMPLETE'])->first();

        $sitename = SITE_NAME;

        $from = $fromMail->value;

        $mail_msg = "Complete your profile";

        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

        foreach ($all_clients as $key => $client) {

            if (($client->usrdet == null) || ($client->usrdet->is_progressbar < 100)) {

                $to = '';

                $to = $client->email;

                $subject = $emailMessage->display;

                $message = $this->Custom->userProfileComplete($emailMessage->value, $client->name, $mail_msg, $sitename);

                $subjectSupport = $emailMessageSupport->display;

                $messageSupport = $this->Custom->userProfileComplete($emailMessageSupport->value, $client->name, $mail_msg, $sitename);

                $this->mailLogEntry('notCompleteProfile', $from, $subjectSupport, $toSupport, $messageSupport);

                /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupport, $messageSupport)) {

                    $supportstatus = "Send";
                } else {

                    $supportstatus = 'Faild';
                }*/



                /*if ($this->Custom->sendEmail($to, $from, $subject, $message)) {*/
                if ($this->mailLogEntry('notCompleteProfile', $from, $subject, $to, $message)) {

                    $this->Users->updateAll(['notCompleteProfile_mail' => 1], ['id' => $client->id]);

                    $process = 'notCompleteProfile()';

                    $name = $client->name;

                    $kidId = '0';

                    $kidName = 'No';

                    $email = $to;

                    $subject = $sx;

                    $status = 'Send';

                    $userId = $client->id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subjectSupport;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                } else {

                    $process = 'notCompleteProfile()';

                    $name = $client->name;

                    $kidId = '0';

                    $kidName = 'No';

                    $email = $to;

                    $subject = $sx;

                    $status = 'Faild';

                    $userId = $client->id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subjectSupport;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                }



                $count++;
            }
        }



        exit;
    }

    public function notPaidOnce()
    {

        $this->Users->hasOne('usrdet', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);

        $this->Users->hasOne('paym', ['className' => 'Payments', 'foreignKey' => 'user_id']);

        $this->Users->hasMany('card_detl', ['className' => 'PaymentCardDetails', 'foreignKey' => 'user_id']);

        $all_clients = $this->Users->find('all')->contain(['usrdet', 'paym', 'card_detl'])->where(['Users.type' => 2, 'notPaidOnce' => 0]);

        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'NOT_PAID_ONCE'])->first();

        $emailMessageSupport = $this->Settings->find('all')->where(['Settings.name' => 'NOT_PAID_ONCE'])->first();

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

        foreach ($all_clients as $client) {

            if ($client->card_detl == null) {

                $to = $client->email;

                $from = $fromMail->value;

                $subject = $emailMessage->display;

                $sitename = SITE_NAME;

                $mail_msg = "Please complete your payment";

                $message = $this->Custom->notPaidOnce($emailMessage->value, $client->name, $mail_msg, $sitename);

                $messageSupport = $this->Custom->notPaidOnce($emailMessageSupport->value, $client->name, $mail_msg, $sitename);

                $subjectSupport = $emailMessageSupport->display;

                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

                $this->mailLogEntry('notPaidOnce', $from, $subjectSupport, $toSupport, $messageSupport);

                /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupport, $messageSupport)) {

                    $supportstatus = "Send";
                } else {

                    $supportstatus = "faild";
                }*/

                /*if ($this->Custom->sendEmail($to, $from, $subject, $message)) {*/
                if ($this->mailLogEntry('notPaidOnce', $from, $subject, $to, $message)) {

                    $this->Users->updateAll(['notPaidOnce' => 1], ['id' => $client->id]);

                    $process = 'notPaidOnce()';

                    $name = $client->name;

                    $kidId = '0';

                    $kidName = 'No';

                    $email = $to;

                    $subject = $subject;

                    $status = 'Send';

                    $userId = $client->id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subjectSupport;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                } else {

                    $process = 'notPaidOnce()';

                    $name = $client->name;

                    $kidId = '0';

                    $kidName = 'No';

                    $email = $to;

                    $subject = $subject;

                    $status = 'faild';

                    $userId = $client->id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subjectSupport;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                }
            }
        }



        exit;
    }

    public function addressNotComplete()
    {

        $this->Users->hasMany('addressess', ['className' => 'ShippingAddress', 'foreignKey' => 'user_id']);

        $all_clients = $this->Users->find('all')->contain(['addressess'])->where(['Users.type' => 2, 'addressNotComplete' => 0]);

        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'ADDRESS_NOT_COMPLATE'])->first();

        $emailMessageSupport = $this->Settings->find('all')->where(['Settings.name' => 'ADDRESS_NOT_COMPLATE'])->first();

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

        foreach ($all_clients as $client) {

            if ($client->addressess == null) {

                $to = $client->email;

                $from = $fromMail->value;

                $subject = $emailMessage->display;

                $sitename = SITE_NAME;

                $mail_msg = "Please complete your shipping address";

                $message = $this->Custom->addressNotComplate($emailMessage->value, $client->name, $mail_msg, $sitename);

                $messageSupport = $this->Custom->addressNotComplate($emailMessageSupport->value, $client->name, $mail_msg, $sitename);

                $subjectSupport = $emailMessageSupport->display;

                $this->mailLogEntry('addressNotComplete', $from, $subjectSupport, $toSupport, $messageSupport);
                /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupport, $messageSupport)) {

                    $supportstatus = 'Send';
                } else {

                    $supportstatus = 'Faild';
                }*/

                if ($this->mailLogEntry('addressNotComplete', $from, $subject, $to, $message)) {
                    // if ($this->Custom->sendEmail($to, $from, $subject, $message)) {

                    $this->Users->updateAll(['addressNotComplete' => 1], ['id' => $client->id]);

                    $process = 'addressNotComplete()';

                    $name = $client->name;

                    $kidId = '0';

                    $kidName = 'No';

                    $email = $to;

                    $subject = $subject;

                    $status = 'Send';

                    $userId = $client->id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subjectSupport;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                } else {

                    $process = 'addressNotComplete()';

                    $name = $client->name;

                    $kidId = '0';

                    $kidName = 'No';

                    $email = $to;

                    $subject = $subject;

                    $status = 'faild';

                    $userId = $client->id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subjectSupport;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                }
            }
        }



        exit;
    }

    public function autocheckoutmailByEmail($user_email, $is_kid = null)
    {

        if (!empty($user_email)) {

            $getEmail = $this->Users->find('all')->where(['email' => $user_email])->first();

            $paymentId = $chkBET->id;

            $user_id = $getEmail->id;

            //            $kid_id = $chkBET->kid_id;

            $getUsersDetails = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user_id])->first();

            $getEmail = $this->Users->find('all')->where(['id' => $user_id])->first();

            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

            $to = $getEmail->email;

            if (!empty($is_kid)) {

                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CHECKOUTBETWEENDAYS_KIDS'])->first();

                //                $getKidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();

                $name = "Kid"; //$getKidsDetails->kids_first_name;

                $kid = ''; //$kid_id;

                $profileType = 3;
            } else {

                $kid = 0;

                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CHECKOUTBETWEENDAYS'])->first();

                $name = $getUsersDetails->first_name . ' ' . $getUsersDetails->last_name;

                $profileType = $getUsersDetails->gender;
            }

            $from = $fromMail->value;

            $sitename = SITE_NAME;

            $email = $to;

            $subject = $emailMessage->display;

            $email_message = $this->Custom->checkoutBetweenDays($emailMessage->value, $name, $email, $sitename);

            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

            $this->mailLogEntry('autocheckoutmailByEmail', $from, $subject, $toSupport, $email_message);
            // $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

            // $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);

            $supportstatus = "Send";

            $this->mailLogEntry('autocheckoutmailByEmail', $from, $subject, $to, $email_message);

            // $this->Custom->sendEmail($to, $from, $subject, $email_message);
        }

        exit;
    }

    public function autocheckoutmail($day_interval = null)
    {

        /*

          $notpaid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.auto_checkout' => 0, 'PaymentGetways.finalize_date  <=' => date('Y-m-d', strtotime('-10 days'))]);

          $prData = '';

          $kid_id = 0;

          $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

          foreach ($notpaid_users as $notcheckout) {

          $paymentId = $notcheckout->id;

          $user_id = $notcheckout->user_id;

          $kid_id = $notcheckout->kid_id;

          $getUsersDetails = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user_id])->first();

          $getEmail = $this->Users->find('all')->where(['id' => $user_id])->first();

          if ($kid_id != 0) {

          $getKidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();

          $prData = $this->Products->find('all')->where(['kid_id' => $kid_id, 'keep_status' => 0, 'kid_id !=' => 0, 'is_complete' => 0, 'checkedout' => 'N', 'payment_id' => $paymentId]);

          $kid = $kid_id;

          $profileType = 3;

          } else {

          $kid = 0;

          $prData = $this->Products->find('all')->where(['user_id' => $user_id, 'keep_status' => 0, 'is_complete' => 0, 'kid_id =' => '0', 'checkedout' => 'N', 'payment_id' => $paymentId]);

          $profileType = $getUsersDetails->gender;

          }







          //            $currentPage = $this->Custom->currentPage($user_id);

          //            if ($currentPage == 4) {

          $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();

          if ($payment_data == null) {

          $getErrorMeg = 'Please Add a valid card.';

          $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

          $to = $getEmail->email;

          $name = $getUsersDetails->first_name . ' ' . $getUsersDetails->last_name;

          $from = $fromMail->value;

          $sitename = SITE_NAME;

          if ($kid_id != 0) {

          $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'someThingsProblemKidPaymeent'])->first();

          $subject = $emailMessage->display;

          $kidsdetails = $this->KidsDetails->find()->where(['id' => $kid_id])->first();

          if ($kidsdetails->kids_first_name == '') {

          $kidsname = $this->Custom->kidsNumber($kidsdetails->kid_count);

          } else {

          $kidsname = $kidsdetails->kids_first_name;

          }





          $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

          $email_message = $this->Custom->paymentFaildKid($emailMessage->value, $name, $kidsname, $getErrorMeg, $sitename);





          if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {

          $supportstatus = "Send";

          } else {

          $supportstatus = "faild";

          }



          if ($this->Custom->sendEmail($to, $from, $subject, $email_message)) {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getEmail->id);

          $kidId = $kid_id;

          $kidName = $kidsname;

          $email = $to;

          $subject = $subject;

          $status = 'Send';

          $userId = $getEmail->id;

          $client = 'Client';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          } else {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getEmail->id);

          $kidId = $kid_id;

          $kidName = $kidsname;

          $email = $to;

          $subject = $subject;

          $status = 'faild';

          $userId = $getEmail->id;

          $client = 'Client';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          }

          } else {





          $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'someThingsProblemPaymeent'])->first();

          $subject = $emailMessage->display;

          $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

          $email_message = $this->Custom->paymentFaild($emailMessage->value, $name, $getErrorMeg, $sitename);

          if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {

          $supportstatus = "send";

          } else {

          $supportstatus = "faild";

          }

          if ($this->Custom->sendEmail($to, $from, $subject, $email_message)) {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getEmail->id);

          $kidId = $kid_id;

          $kidName = $kidsname;

          $email = $to;

          $subject = $subject;

          $status = 'Send';

          $userId = $getEmail->id;

          $client = 'Support';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          } else {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getEmail->id);

          $kidId = $kid_id;

          $kidName = $kidsname;

          $email = $to;

          $subject = $subject;

          $status = 'faild';

          $userId = $getEmail->id;

          $client = 'Support';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          }

          }

          exit;

          }

          if ($payment_data != null) {

          $paidUsers = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.auto_checkout' => 0, 'PaymentGetways.finalize_date <=' => date('Y-m-d', strtotime('-15 days'))]);

          if (@$paidUsers) {

          foreach ($paidUsers as $paid) {

          $paymentId = $paid->id;

          $user_id = $paid->user_id;

          $kid_id = $paid->kid_id;

          $getUsersDetails = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user_id])->first();

          $getEmail = $this->Users->find('all')->where(['id' => $user_id])->first();

          if ($kid_id != 0) {

          $getKidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();

          $prData = $this->Products->find('all')->where(['kid_id' => $kid_id, 'keep_status' => 0, 'kid_id !=' => 0, 'is_complete' => 0, 'checkedout' => 'N', 'payment_id' => $paymentId]);

          $kid = $kid_id;

          $profileType = 3;

          } else {

          $kid = 0;

          $prData = $this->Products->find('all')->where(['user_id' => $user_id, 'keep_status' => 0, 'is_complete' => 0, 'kid_id =' => '0', 'checkedout' => 'N', 'payment_id' => $paymentId]);

          $profileType = $getUsersDetails->gender;

          }





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

          $amount = $subTotal - 20;

          $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $user_id])->first();

          $paymentG = $this->PaymentGetways->newEntity();

          $table1['user_id'] = $user_id;

          $table1['kid_id'] = $kid;

          $table1['emp_id'] = 0;

          $table1['status'] = 0;

          $table1['price'] = $amount;

          $table1['profile_type'] = $profileType;

          $table1['payment_type'] = 2;

          $table1['created_dt'] = date('Y-m-d H:i:s');

          $table1['created_dt'] = date('Y-m-d H:i:s');

          $table1['auto_check_out_date'] = date('Y-m-d H:i:s');

          $table1['parent_id'] = $paymentId;

          $table1['emp_id'] = $this->Custom->previousStyleistNameCron($user_id, $paymentId, $paid->count);



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

          if (@$message['status'] == '1') {

          $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId'], 'auto_checkout' => 1], ['id' => $lastPymentg->id]);

          $this->PaymentGetways->updateAll(['work_status' => 2, 'auto_checkout' => 1], ['id' => $paymentId]);

          $productData = '';

          $i = 1;

          foreach ($prData as $dataMail) {

          $priceMail = $dataMail->sell_price;

          $productData .= "<tr>

          <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

          # " . $i . "

          </td>

          <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>

          <img src='" . HTTP_ROOT . PRODUCT_IMAGES . $dataMail->product_image . "' width='85'/>

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

          $from = $fromMail->value;

          $sitename = SITE_NAME;

          if ($kid_id != 0) {

          $kname = $this->KidsDetails->find()->where(['id' => $kid_id])->first()->kids_first_name;

          $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT_KID'])->first();

          $subject = $emailMessage->display;

          $email_message = $this->Custom->order($emailMessage->value, $kname, $sitename, $productData, $style_pick_total, $amount, $style_fit_fee, $keep_all_discount, $refundamount = '', $amount, $offerData = '');



          if ($this->Custom->sendEmail($to, $from, $subject, $email_message)) {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getEmail->id);

          $kidId = $kid_id;

          $kidName = $kname;

          $email = $to;

          $subject = $subject;

          $status = 'Send';

          $userId = $user_id;

          $client = 'Client';

          $upportemail = 'nill';

          $support_subject = 'nill';

          $supportstatus = '';

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          } else {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getEmail->id);

          $kidId = $kid_id;

          $kidName = $kname;

          $email = $to;

          $subject = $subject;

          $status = 'Faild';

          $userId = $user_id;

          $client = 'Client';

          $upportemail = 'Nill';

          $support_subject = 'nill';

          $supportstatus = '';

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          }



          $KidsDetails = $this->KidsDetails->newEntity();

          $k['id'] = $kid_id;

          $k['is_redirect'] = 5;

          $KidsDetails = $this->KidsDetails->patchEntity($KidsDetails, $k);

          $KidsDetails = $this->KidsDetails->save($KidsDetails);

          $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);

          $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => $kid_id]);

          } else {

          $name = $getUsersDetails->first_name . ' ' . $getUsersDetails->last_name;

          $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();

          $subject = $emailMessage->display;

          $email_message = $this->Custom->order($emailMessage->value, $name, $sitename, $productData, $style_pick_total, $amount, $style_fit_fee, $keep_all_discount, $refundamount = '', $amount, $offerData = '');



          $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;



          if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {

          $supportstatus = "send";

          } else {

          $supportstatus = "Faild";

          }



          if ($this->Custom->sendEmail($to, $from, $subject, $email_message)) {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getUsreDetails->id);

          $kidId = 0;

          $kidName = '';

          $email = $to;

          $subject = $subject;

          $status = 'Send';

          $userId = $user_id;

          $client = 'Client';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          } else {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getUsreDetails->id);

          $kidId = 0;

          $kidName = '';

          $email = $to;

          $subject = $subject;

          $status = 'faild';

          $userId = $user_id;

          $client = 'Client';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          }

          $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);

          $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);

          }

          } else {

          $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

          $to = $getEmail->email;

          $name = $getUsersDetails->first_name . ' ' . $getUsersDetails->last_name;

          $from = $fromMail->value;

          $sitename = SITE_NAME;

          if ($kid_id != 0) {

          $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'someThingsProblemKidPaymeent'])->first();

          $subject = $emailMessage->display;

          $kidsdetails = $this->KidsDetails->find()->where(['id' => $kid_id])->first();

          if ($kidsdetails->kids_first_name == '') {

          $kidsname = $this->Custom->kidsNumber($kidsdetails->kid_count);

          } else {

          $kidsname = $kidsdetails->kids_first_name;

          }

          $email_message = $this->Custom->paymentFaildKid($emailMessage->value, $name, $kidsname, $getErrorMeg, $sitename);



          $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

          if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {

          $supportstatus = "Send";

          } else {

          $supportstatus = "Faild";

          }



          if ($this->Custom->sendEmail($to, $from, $subject, $email_message)) {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getUsreDetails->id);

          $kidId = $kid_id;

          $kidName = $kidsname;

          $email = $to;

          $subject = $subject;

          $status = 'Send';

          $userId = $user_id;

          $client = 'Client';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          } else {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getUsreDetails->id);

          $kidId = $kid_id;

          $kidName = $kidsname;

          $email = $to;

          $subject = $subject;

          $status = 'faild';

          $userId = $user_id;

          $client = 'Client';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          }

          } else {

          $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'someThingsProblemPaymeent'])->first();

          $subject = $emailMessage->display;

          $email_message = $this->Custom->paymentFaild($emailMessage->value, $name, $getErrorMeg, $sitename);

          $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

          if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {

          $supportstatus = "Send";

          } else {

          $supportstatus = "Faild";

          }

          if ($this->Custom->sendEmail($to, $from, $subject, $email_message)) {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getUsreDetails->id);

          $kidId = $kid_id;

          $kidName = $kidsname;

          $email = $to;

          $subject = $subject;

          $status = 'Send';

          $userId = $user_id;

          $client = 'Client';

          $upportemail = $toSupport;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          } else {

          $process = 'autocheckoutmail()';

          $name = $this->Custom->UserName($getUsreDetails->id);

          $kidId = $kid_id;

          $kidName = $kidsname;

          $email = $to;

          $subject = $subject;

          $status = 'faild';

          $userId = $user_id;

          $client = 'Client';

          $upportemail = $upportemail;

          $support_subject = $subject;

          $supportstatus = $supportstatus;

          $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);

          }

          }

          }

          }

          }

          }

          //            }

          }



         */

        if (empty($day_interval)) {

            $day_interval = 16;
        }

        echo date('Y-m-d', strtotime('-' . $day_interval . ' days'));


        //            $checkout_between = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1, 'PaymentGetways.status' => 1, 'auto_checkout' => 0, 'mail_status' => 1, 'PaymentGetways.auto_checkout' => 0, 'PaymentGetways.finalize_date <=' => date('Y-m-d', strtotime('-'.$day_interval.' days')), 'PaymentGetways.finalize_date >=' => date('Y-m-d', strtotime('-15 days'))]);

        $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);

        $checkout_between = $this->PaymentGetways->find('all')->contain(['Products'])->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.auto_checkout' => 0, 'PaymentGetways.mail_status' => 1, 'PaymentGetways.finalize_date LIKE' => '%' . date('Y-m-d', strtotime('-' . $day_interval . ' days')) . '%']);

        //            echo "<pre>";print_r($checkout_between);
        //            echo $checkout_between->count();exit;

        foreach ($checkout_between as $chkBET) {

            $exe_msg = 0;

            //Check if any product is not checkedout then send mail

            foreach ($chkBET->products as $prd_li) {

                if ($prd_li->checkedout == 'N') {

                    $exe_msg = 1;
                }
            }

            if ($exe_msg == 1) {



                $paymentId = $chkBET->id;

                $user_id = $chkBET->user_id;

                $kid_id = $chkBET->kid_id;

                $getUsersDetails = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user_id])->first();

                $getEmail = $this->Users->find('all')->where(['id' => $user_id])->first();

                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                $to = $getEmail->email;

                if ($kid_id != 0) {

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CHECKOUTBETWEENDAYS_KIDS'])->first();

                    $getKidsDetails = $this->KidsDetails->find('all')->where(['id' => $kid_id])->first();

                    $name = $getKidsDetails->kids_first_name;

                    $kid = $kid_id;

                    $profileType = 3;
                } else {

                    $kid = 0;

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CHECKOUTBETWEENDAYS'])->first();

                    $name = $getUsersDetails->first_name . ' ' . $getUsersDetails->last_name;

                    $profileType = $getUsersDetails->gender;
                }

                $from = $fromMail->value;

                $sitename = SITE_NAME;

                $email = $to;

                $subject = $emailMessage->display;

                $email_message = $this->Custom->checkoutBetweenDays($emailMessage->value, $name, $email, $sitename);

                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

                $this->mailLogEntry('autocheckoutmail', $from, $subject, $toSupport, $email_message);

                /*if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {

                    $supportstatus = "Send";
                } else {

                    $supportstatus = 'faild';
                }*/

                echo "<br>" . $supportstatus . "<br>";

                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();
                if (empty($billingAddress)) {
                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id])->first();
                }

                $this->loadModel('SmsSettings');
                $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'CHECKOUT_REMINDER_SMS'])->first();
                if (!empty($get_sms_temp)) {
                    $txt_msg = str_replace("[CUSTOMER_PAGE_LINK]", HTTP_ROOT . 'order', $get_sms_temp->value);
                    $txt_msg = str_replace("[EMAIL_LINK_CUSTOMER_SUPPORT]", $toSupport, $txt_msg);
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
                        CURLOPT_POSTFIELDS => array('phone' => $phone, 'msg' => $txt_msg, 'suj' => 'CHECKOUT_REMINDER_SMS'),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                }


                if ($this->mailLogEntry('autocheckoutmail', $from, $subject, $to, $email_message)) {
                    // if ($this->Custom->sendEmail($to, $from, $subject, $email_message)) {

                    $process = 'autocheckoutmail()';

                    $name = $this->Custom->UserName($getUsreDetails->id);

                    $kidId = $kid_id;

                    $kidName = $kidsname;

                    $email = $to;

                    $subject = $subject;

                    $status = 'Send';

                    $userId = $user_id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subject;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                } else {

                    $process = 'autocheckoutmail()';

                    $name = $this->Custom->UserName($getUsreDetails->id);

                    $kidId = $kid_id;

                    $kidName = $kidsname;

                    $email = $to;

                    $subject = $subject;

                    $status = 'faild';

                    $userId = $user_id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subject;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                }
            }
        }





        exit;
    }

    public function autoMentions() {
        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'kid_id' => 0, 'PaymentGetways.work_status IN' => [1, 2], 'PaymentGetways.status' => 1])->group(['PaymentGetways.user_id']);
        if (!empty($paid_customer->count())) {
            $paid_users = Hash::extract($paid_customer->toArray(), '{n}.user_id');
            // print_r($paid_users);
            // exit;
            $getingData = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => 1, 'kid_id' => '0', 'autoMentions' => 0, 'user_id IN' => $paid_users]);
            foreach ($getingData as $data) {
                $planId = $data->id;
                if ($data->how_often_would_you_lik_fixes == 1) {
                    $currentDate = time();
                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));
                    $datediff = $currentDate - $oneMonth;
                    echo "<br>" . $data->user_id;
                    echo " - " . $planId . '-';
                    $days_between = round($datediff / (60 * 60 * 24));
                    echo $days_between;
                    echo "<br>";

                    if ($days_between == '30') {
                        $this->boxUpdate($planId);
                    } else if ($days_between >= '31') {
                        $day = date("l");
                        //echo $day;

                        if ($day == 'Monday') {
                            // echo "<br>";
                            // echo $data->user_id;
                            // echo "<br>";
                            // if($data->user_id == 10800){
                                // $this->boxUpdate($planId);
                            // }
                            $this->boxUpdate($planId);
                        }
                    }
                }

                if ($data->how_often_would_you_lik_fixes == 2) {
                    $currentDate = time();
                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));
                    $datediff = $currentDate - $oneMonth;
                    $days_between = round($datediff / (60 * 60 * 24));
                    
                    if ($days_between == '60') {
                        $this->boxUpdate($planId);
                    } else if ($days_between >= '61') {
                        $day = date("l");
                        if ($day == 'Friday') {
                            $this->boxUpdate($planId);
                        }
                    }
                }

                if ($data->how_often_would_you_lik_fixes == 3) {
                    $currentDate = time();
                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));
                    $datediff = $currentDate - $oneMonth;
                    $days_between = round($datediff / (60 * 60 * 24));
                    if ($days_between == '90') {
                        $this->boxUpdate($planId);
                    } else if ($days_between >= '91') {
                        $day = date("l");
                        if ($day == 'Friday') {
                            $this->boxUpdate($planId);
                        }
                    }
                }
            }
        }


        exit;
    }

    public function boxUpdate($planId)
    {
        echo date('Y-m-d H:i:s');
        $main_style_fee = $this->Settings->find('all')->where(['name' => 'men_women_style_fee'])->first()->value;
        if ($planId) {
            $getingData = $this->LetsPlanYourFirstFix->find('all')->where(['id' => $planId])->first();
            echo "<pre>";
            print_r($getingData);
            echo "</pre>";

            $this->Users->hasOne('usrdet', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $this->Users->hasMany('addressess', ['className' => 'ShippingAddress', 'foreignKey' => 'user_id']);
            $this->Users->hasMany('card_detl', ['className' => 'PaymentCardDetails', 'foreignKey' => 'user_id']);
            $getUsreDetails = $this->Users->find('all')->contain(['addressess', 'card_detl', 'usrdet'])->where(['Users.id' => $getingData->user_id])->first();

            if (($getingData->user_id != '') && ($getingData->kid_id != '')) {
                $profile_type = '3';
            } else {
                $getGender = $this->UserDetails->find('all')->where(['user_id' => $getingData->user_id])->first();
                $getEmail = $this->Users->find('all')->where(['id' => $getingData->user_id])->first()->email;
                $getUsreDetails = $this->Users->find('all')->where(['id' => $getingData->user_id])->first();
                if ($getGender->gender == 1) {
                    $profile_type = '1';
                } else {
                    $profile_type = '2';
                }
            }


            $cardDetailsCount = $this->PaymentCardDetails->find('all')->where(['user_id' => $getingData->user_id, 'use_card' => 1])->count();
            //            print_r($getingData->user_id);
            //            echo "--";
            //            print_r($cardDetailsCount);
            //            exit;
            // echo $cardDetailsCount.'usredi'.$getingData->user_id;
            if ($cardDetailsCount <= 0) {
                echo "<pre>";
                print_r("NO CARD....");
                echo "</pre>";

                $from = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first()->value;
                $name = $getUsreDetails->name;
                $email = $getUsreDetails->email;
                $emailTemplatesSubcritionsPmt = $this->Settings->find('all')->where(['Settings.name' => 'paymentFaildSubcritions'])->first();

                $subject = $emailTemplatesSubcritionsPmt->display;
                $sitename = "DrapeFit.com";
                $email_message_no_add = $this->Custom->paymentFailedSucritpions($emailTemplatesSubcritionsPmt->value, $name, $sitename);
                $toSupport = $this->Settings->find('all')->where(['Settings.name' => 'TO_BATCH_HELP'])->first()->value;
                $emailtemplatesAdminPayment = $this->Settings->find('all')->where(['Settings.name' => 'paymentFaildSubcritions'])->first();
                $subjectSupportPayment = $emailtemplatesAdminPayment->display . ' ' . $email;
                $messageSupportPayment = $this->Custom->paymentFailedSucritpionsAdmin($emailtemplatesAdminPayment->value, $name, $email, $sitename, $sitename);
                $subjectSupport = $emailtemplatesAdminPayment->display . ' ' . $email;

                $this->mailLogEntry('autocheckoutmail', $from, $subjectSupportPayment, $toSupport, $messageSupportPayment);
                /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupportPayment, $messageSupportPayment)) {

                    $supportstatus = "Send";
                } else {
                    $supportstatus = "faild";
                }*/
                /*
                  if ($this->Custom->sendEmail($email, $from, $subject, $email_message_no_add)) {
                  $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 1], ['id' => $planId]);
                  $process = 'boxUpdate()';
                  @$kidId = $kid_id;
                  @$kidName = $kidsname;
                  $email = $email;
                  $name = $name;
                  $subject = $subject;
                  $status = 'Send';
                  @$userId = $getUsreDetails->id;
                  $client = 'Client';
                  $upportemail = $toSupport;
                  $support_subject = $subjectSupportPayment;
                  $supportstatus = $supportstatus;
                  $payment_message = "Card number is empty";
                  $transctions_id = "No transcatins id";
                  $number = 0;
                  $this->Custom->batchprocessPayment($number, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                  } else {
                  $process = 'boxUpdate()';
                  $kidId = $kid_id;
                  $name = $name;
                  $kidName = $kidsname;
                  $email = $email;
                  $subject = $subject;
                  $status = 'faild';
                  $userId = $user_id;
                  $client = 'Client';
                  $upportemail = $toSupport;
                  $support_subject = $subjectSupportPayment;
                  $supportstatus = $supportstatus;
                  $payment_message = "Card number is empty";
                  $transctions_id = 'No transctions id';
                  $number = 0;
                  $this->Custom->batchprocessPayment($number, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                  }
                 */
                return json_encode(['status' => 'error', 'msg' => 'no card']);
            } else {

                echo "<pre>";
                print_r("CARD PRESENT...");
                echo "</pre>";
                $notCompleteCurrentFit = $this->PaymentGetways->find('all')->where(['PaymentGetways.kid_id' => 0, 'PaymentGetways.user_id' => $getingData->user_id, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1, 'PaymentGetways.status' => 1])->first();
                echo "<pre>";
                print_r('Not Compeleted__');
                print_r($notCompleteCurrentFit);
                echo "</pre>";
                if (empty($notCompleteCurrentFit->id)) {
                    $cardDetails = $this->PaymentCardDetails->find('all')->where(['user_id' => $getingData->user_id, 'use_card' => 1])->first();
                    $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'PaymentGetways.kid_id' => 0, 'user_id' => $getingData->user_id])->order(['PaymentGetways.id' => 'DESC'])->first();
                    $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.kid_id' => 0, 'user_id' => $getingData->user_id])->count();
                    $newEntity = $this->PaymentGetways->newEntity();
                    $data['user_id'] = $getingData->user_id;
                    $data['kid_id'] = $getingData->kid_id;
                    $data['emp_id'] = $this->Custom->previousStyleistNameCron($getingData->user_id, $paymentDetails->id, $paymentDetails->count);
                    $data['qa_id'] = $this->Custom->previousQaNameCron($getingData->user_id, $paymentDetails->id, $paymentDetails->count);
                    $data['inv_id'] = $this->Custom->previousInvNameCron($getingData->user_id, $paymentDetails->id, $paymentDetails->count);
                    $data['support_id'] = $this->Custom->previousSupportNameCron($getingData->user_id, $paymentDetails->id, $paymentDetails->count);
                    $data['price'] = ($getUsreDetails->is_influencer == 1) ? 1 : $main_style_fee;
                    $data['profile_type'] = $profile_type;
                    $data['payment_type'] = 1;
                    $data['status'] = 0;
                    $data['payment_card_details_id'] = $cardDetails->id;
                    $data['created_dt'] = date('Y-m-d H:i:s');
                    $data['count'] = $paymentCount + 1;
                    $data['work_status'] = 1;
                    $newEntity = $this->PaymentGetways->patchEntity($newEntity, $data);
                    $PaymentIdlast = $this->PaymentGetways->save($newEntity);
                    $paymentId = $PaymentIdlast->id;

                    $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $getingData->user_id])->first();
                    $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getingData->user_id])->first();
                    $new_shippong_address_id = $exitdata->id;
                    if ($paymentCount > 0) {
                        $getPreviousPayment = $this->PaymentGetways->find('all')->where(['count' => $paymentCount, 'user_id' => $getingData->user_id, 'kid_id' => $getingData->kid_id, 'payment_type' => 1, 'profile_type' => $profile_type])->first();
                        if (!empty($getPreviousPayment) && !empty($getPreviousPayment->shipping_address_id)) {
                            $new_shippong_address_id = $getPreviousPayment->shipping_address_id;
                        }
                    }
                    $this->PaymentGetways->updateAll(['shipping_address_id' => $new_shippong_address_id], ['id' => $paymentId]);

                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getingData->user_id, 'is_billing' => 1])->first();
                    $full_address = $billingAddress->address . ((!empty($billingAddress->address_line_2)) ? '<br>' . $billingAddress->address_line_2 : '') . '<br>' . $billingAddress->city . ', ' . $billingAddress->state . '<br>' . $billingAddress->country . ' ' . $billingAddress->zipcode;
                    $usr_name = $billingAddress->full_name;
                    $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $getingData->user_id])->first();
                    $arr_user_info = [
                        'stripe_customer_key' => $current_usr_dtl_strip->stripe_customer_key,
                        'stripe_payment_method' => $cardDetails->stripe_payment_key,
                        'product' => $billingAddress->full_name . ' automentions',
                        'first_name' => $billingAddress->full_name,
                        'last_name' => $billingAddress->full_name,
                        'address' => $billingAddress->address,
                        'city' => $billingAddress->city,
                        'state' => $billingAddress->state,
                        'zip' => $billingAddress->zipcode,
                        'country' => $billingAddress->country,
                        'email' => $getUsreDetails->email,
                        'amount' => ($getUsreDetails->is_influencer == 1) ? 1 : $main_style_fee,
                        'invice' => $paymentId,
                        'refId' => $paymentId,
                        'companyName' => 'Drapefit',
                    ];
                    //                    $message = $this->authorizeCreditCard($arr_user_info);   

                    $message = $this->stripeApiPay($arr_user_info);
                    echo "<pre>";
                    print_r($arr_user_info);
                    print_r($message);
                    echo "</pre>";
                    //                    exit;
                    $fitnumber = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first()->count;

                    if (@$message['status'] == '1') {

                        $this->loadModel('SmsSettings');
                        $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'FITBOX_SCHEDULED_SMS'])->first();
                        if (!empty($get_sms_temp)) {
                            $count_data = $this->Custom->ToOrdinal(($paymentCount + 1));
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

                        $updateId = $paymentId;
                        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Onboard_in_Progress')], ['id' => $paymentId]);
                        $this->PaymentGetways->updateAll(['status' => 1, 'transactions_id ' => $message['TransId'], 'charge_id' => $message['charge_id'], 'receipt_url' => $message['receipt_url']], ['id' => $updateId]);

                        $this->LetsPlanYourFirstFix->updateAll(['applay_dt' => date('Y-m-d H:i:s'), 'payment_status' => 'Y', 'subscription_email_sent' => 'Y', 'subscription_batch_status' => 1, 'eligible_batch_date' => date('Y-m-d')], ['id' => $planId]);

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

                        $this->mailLogEntry('autoMentions', $from, $subject, $toSupport, $email_message);
                        /*if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {
                            $supportstatus = "Send";
                        } else {
                            $supportstatus = "Faild";
                        }*/
                        if ($this->mailLogEntry('autoMentions', $from, $subject, $getUsreDetails->email, $email_message)) {
                            // if ($this->Custom->sendEmail($getUsreDetails->email, $from, $subject, $email_message)) {
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

                        $subjectProfile = $emailMessageProfile->display . ' #DFPYMID' . $updateId;

                        $email_message_profile = $this->Custom->paymentEmailCount($emailMessageProfile->value, $name, $usermessage, $sitename, $this->Custom->ToOrdinal($paymentCount));
                        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

                        $this->mailLogEntry('autoMentions', $from, $subjectProfile, $toSupport, $email_message);
                        /*if ($this->Custom->sendEmail($toSupport, $from, $subjectProfile, $email_message)) {
                            $supportstatus = "send";
                        } else {
                            $supportstatus = "faild";
                        }*/

                        if ($this->mailLogEntry('autoMentions', $from, $subjectProfile, $getUsreDetails->email, $email_message_profile)) {
                            // if ($this->Custom->sendEmail($getUsreDetails->email, $from, $subjectProfile, $email_message_profile)) {
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
                        return json_encode(['status' => 'success', 'msg' => 'paid']);
                    } else {
                        if ($message['error_code'] == 'authentication_required') {
                            $this->Flash->error(__('Please authenticate your payment.'));
                            $reauthUrl = HTTP_ROOT . 'users/reAuthPayment/cronjobparent/' . $paymentId;

                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                            $stylefee = $this->Settings->find('all')->where(['Settings.name' => 'style_fee'])->first();
                            $mail_template = $this->Settings->find('all')->where(['Settings.name' => 'PARENT_AUTH'])->first();
                            $feeprice = $stylefee->value;
                            $name = $getUsreDetails->name;
                            $from = $fromMail->value;
                            $subject = $mail_template->display;
                            $sitename = SITE_NAME;

                            $message = $this->Custom->paymentAuthMail($mail_template->value, $getUsreDetails->name, $reauthUrl);

                            $this->mailLogEntry('autoMentions', $from, $subject, $getUsreDetails->email, $message);
                            // $this->Custom->sendEmail($getUsreDetails->email/* 'debmicrofinet@gmail.com' */, $from, $subject, $message);
                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                            $this->mailLogEntry('autoMentions', $from, $subject, $toSupport, $message);
                            // $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                            return json_encode(['status' => 'error', 'msg' => 'authentication_required']);
                        }

                        $from = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first()->value;
                        $name = $getUsreDetails->name;
                        $email = $getUsreDetails->email;
                        $emailTemplatesSubcritionsPmt = $this->Settings->find('all')->where(['Settings.name' => 'paymentFaildSubcritions'])->first();
                        $subject = $emailTemplatesSubcritionsPmt->display . ' ' . $email;
                        $sitename = "DrapeFit.com";
                        $email_message_no_add = $this->Custom->paymentFailedSucritpions($emailTemplatesSubcritionsPmt->value, $name, $sitename);
                        $toSupport = $this->Settings->find('all')->where(['Settings.name' => 'TO_BATCH_HELP'])->first()->value;
                        $emailtemplatesAdminPayment = $this->Settings->find('all')->where(['Settings.name' => 'paymentFaildSubcritions'])->first();
                        $subjectSupportPayment = $emailtemplatesAdminPayment->display . '  ' . $email;
                        $messageSupportPayment = $this->Custom->paymentFailedSucritpionsAdmin($emailtemplatesAdminPayment->value, $name, $email, $sitename, $sitename);
                        $subjectSupport = $emailMessageSupport->display . ' ' . $email;

                        $this->mailLogEntry('autoMentions', $from, $subjectSupportPayment, $toSupport, $messageSupportPayment);
                        /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupportPayment, $messageSupportPayment)) {
                            $supportstatus = "Send";
                        } else {
                            $supportstatus = "faild";
                        }*/
                        /*
                          if ($this->Custom->sendEmail($email, $from, $subject, $email_message_no_add)) {
                          $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 1], ['id' => $planId]);
                          $process = 'boxUpdate()';
                          $kidId = $kid_id;
                          $kidName = $kidsname;
                          $email = $email;
                          $subject = $subject;
                          $status = 'Send';
                          $userId = $user_id;
                          $client = 'Client';
                          $upportemail = $toSupport;
                          $support_subject = $subjectSupportPayment;
                          $supportstatus = $supportstatus;
                          $payment_message = json_encode($message);
                          $transctions_id = $message['TransId'];
                          $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                          } else {
                          $process = 'boxUpdate()';
                          $kidId = $kid_id;
                          $kidName = $kidsname;
                          $email = $email;
                          $subject = $subject;
                          $status = 'faild';
                          $userId = $user_id;
                          $client = 'Client';
                          $upportemail = $toSupport;
                          $support_subject = $subjectSupportPayment;
                          $supportstatus = $supportstatus;
                          $payment_message = json_encode($message);
                          $transctions_id = $message['TransId'];
                          $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                          }
                         */
                        return json_encode(['status' => 'error', 'msg' => 'faild']);
                    }
                }
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function autoMentionskid() {
        $paid_customer = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'kid_id !=' => 0, 'PaymentGetways.work_status IN' => [1, 2], 'PaymentGetways.status' => 1])->group(['PaymentGetways.kid_id']);
        if (!empty($paid_customer->count())) {
            $paid_users = Hash::extract($paid_customer->toArray(), '{n}.user_id');
            // print_r($paid_users);
            // exit;
            $getingData = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => 1, 'kid_id !=' => 0, 'autoMentions' => 0, 'user_id IN' => $paid_users]);
            foreach ($getingData as $data) {
                $planId = $data->id;
                if ($data->how_often_would_you_lik_fixes == 1) {
                    $currentDate = time();
                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));
                    $datediff = $currentDate - $oneMonth;
                    $days_between = round($datediff / (60 * 60 * 24));
                    echo "<br>" . $data->user_id . '- kid - ' . $data->kid_id;
                    echo " - " . $planId . '-';

                    echo $days_between;
                    echo "<br>";
                    
                    if ($days_between == '30') {
                        $this->boxUpdatekid($planId);
                    } else if ($days_between >= '31') {
                        $day = date("l");
                        if ($day == 'Tuesday') {
                            $this->boxUpdatekid($planId);
                        }
                    }
                    
                }
    
                if ($data->how_often_would_you_lik_fixes == 2) {
                    $currentDate = time();
                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));
                    $datediff = $currentDate - $oneMonth;
                    $days_between = round($datediff / (60 * 60 * 24));

                    if ($days_between == '60') {
                        $this->boxUpdatekid($planId);
                    } else if ($days_between >= '61') {
                        $day = date("l");
                        if ($day == 'Friday') {
                            $this->boxUpdatekid($planId);
                        }
                    }
                }

                if ($data->how_often_would_you_lik_fixes == 3) {
                    $currentDate = time();
                    $oneMonth = strtotime(date('Y-m-d', strtotime($data->applay_dt)));
                    $datediff = $currentDate - $oneMonth;
                    $days_between = round($datediff / (60 * 60 * 24));

                    if ($days_between == '90') {
                        $this->boxUpdatekid($planId);
                    } else if ($days_between >= '91') {
                        $day = date("l");
                        if ($day == 'Friday') {
                            $this->boxUpdatekid($planId);
                        }
                    }
                }
                
            }
        }
        exit;
    }

    public function boxUpdateKid($planId)
    {
        $main_style_fee = $this->Settings->find('all')->where(['name' => 'kid_style_fee'])->first()->value;
        if ($planId) {
            //echo $planId;
            $getingData = $this->LetsPlanYourFirstFix->find('all')->where(['id' => $planId])->first();
            $this->Users->hasOne('usrdet', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $this->Users->hasMany('addressess', ['className' => 'ShippingAddress', 'foreignKey' => 'user_id']);
            $this->Users->hasMany('card_detl', ['className' => 'PaymentCardDetails', 'foreignKey' => 'user_id']);
            $getUsreDetails = $this->Users->find('all')->contain(['addressess', 'card_detl', 'usrdet'])->where(['Users.id' => $getingData->user_id])->first();
            if (($getingData->user_id != '') && ($getingData->kid_id != '')) {
                $profile_type = '3';
            } else {
                $getGender = $this->UserDetails->find('all')->where(['user_id' => $getingData->user_id])->first();
                $getEmail = $this->Users->find('all')->where(['id' => $getingData->user_id])->first()->email;
                $getUsreDetails = $this->Users->find('all')->where(['id' => $getingData->user_id])->first();
                if ($getGender->gender == 1) {
                    $profile_type = '1';
                } else {
                    $profile_type = '2';
                }
            }

            $cardDetailsCount = $this->PaymentCardDetails->find('all')->where(['user_id' => $getingData->user_id, 'use_card' => 1])->count();
            if ($cardDetailsCount <= 0) {
                //echo $cardDetailsCount;
                if (!empty($getingData->kid_id)) {

                    $from = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first()->value;
                    $name = $getUsreDetails->name;
                    $email = $getUsreDetails->email;
                    $kidsdetails = $this->KidsDetails->find('all')->where(['id' => @$getingData->kid_id])->first();
                    $emailTemplatesSubcritionsPmt = $this->Settings->find('all')->where(['Settings.name' => 'kidPaymentFaildSubcritions'])->first();
                    $subject = $emailTemplatesSubcritionsPmt->display;
                    $sitename = "DrapeFit.com";

                    if ($kidsdetails->kids_first_name == '') {
                        $kidsname = $this->Custom->kidsNumber($kidsdetails->kid_count);
                    } else {
                        $kidsname = $kidsdetails->kids_first_name;
                    }
                    $email_message_no_add = $this->Custom->paymentFailedSucritpionsKids($emailTemplatesSubcritionsPmt->value, $name, $kidsname, $sitename);
                    $toSupport = $this->Settings->find('all')->where(['Settings.name' => 'TO_BATCH_HELP'])->first()->value;
                    $emailtemplatesAdminPayment = $this->Settings->find('all')->where(['Settings.name' => 'kidPaymentFaildSubcritions'])->first();
                    $subjectSupportPayment = $emailtemplatesAdminPayment->display . ' kid: ' . $email;
                    $messageSupportPayment = $this->Custom->paymentFailedSucritpionsAdmin($emailtemplatesAdminPayment->value, $name, $email, $sitename, $sitename);
                    $subjectSupport = $emailMessageSupport->display . ' kid: ' . $email;

                    $this->mailLogEntry('autoMentionsKid', $from, $subjectSupportPayment, $toSupport, $messageSupportPayment);
                    /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupportPayment, $messageSupportPayment)) {
                        $supportstatus = "Send";
                    } else {
                        $supportstatus = "faild";
                    }*/
                    /*
                      if ($this->Custom->sendEmail($email, $from, $subject, $email_message_no_add)) {
                      $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 1], ['id' => $planId]);
                      $process = 'boxUpdateKid()';
                      $kidId = $kid_id;
                      $kidName = $kidsname;
                      $email = $email;
                      $subject = $subject;
                      $status = 'Send';
                      $userId = $user_id;
                      $client = 'Client';
                      $upportemail = $toSupport;
                      $support_subject = $subjectSupportPayment;
                      $supportstatus = $supportstatus;
                      $payment_message = "Card number is empty";
                      $transctions_id = "No transcatins id";
                      $this->Custom->batchprocessPayment($number = 0, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                      } else {
                      $process = 'boxUpdateKid()';
                      $kidId = $kid_id;
                      $kidName = $kidsname;
                      $email = $email;
                      $subject = $subject;
                      $status = 'faild';
                      $userId = $user_id;
                      $client = 'Client';
                      $upportemail = $toSupport;
                      $support_subject = $subjectSupportPayment;
                      $supportstatus = $supportstatus;
                      $payment_message = "Card number is empty";
                      $transctions_id = "No transcatins id";
                      $this->Custom->batchprocessPayment($number = 0, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                      }
                     */
                }
                return json_encode(['status' => 'error', 'msg' => 'no card']);
            } else {
                $notCompleteCurrentFit = $this->PaymentGetways->find('all')->where(['PaymentGetways.kid_id' => $getingData->kid_id, 'PaymentGetways.user_id' => $getingData->user_id, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1, 'PaymentGetways.status' => 1])->first();
                if (empty($notCompleteCurrentFit->id)) {
                    $cardDetails = $this->PaymentCardDetails->find('all')->where(['user_id' => $getingData->user_id, 'use_card' => 1])->first();
                    $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'PaymentGetways.kid_id' => $getingData->kid_id, 'user_id' => $getingData->user_id])->order(['PaymentGetways.id' => 'DESC'])->first();
                    $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.kid_id' => $getingData->kid_id])->count();
                    $newEntity = $this->PaymentGetways->newEntity();
                    $data['user_id'] = $getingData->user_id;
                    $data['kid_id'] = $getingData->kid_id;
                    $data['emp_id'] = $this->Custom->previousStyleistNameCron($getingData->user_id, $paymentDetails->id, $paymentDetails->count);
                    $data['qa_id'] = $this->Custom->previousQaNameCron($getingData->user_id, $paymentDetails->id, $paymentDetails->count);
                    $data['inv_id'] = $this->Custom->previousInvNameCron($getingData->user_id, $paymentDetails->id, $paymentDetails->count);
                    $data['support_id'] = $this->Custom->previousSupportNameCron($getingData->user_id, $paymentDetails->id, $paymentDetails->count);
                    $data['price'] = ($getUsreDetails->is_influencer == 1) ? 1 : $main_style_fee;
                    $data['profile_type'] = $profile_type;
                    $data['payment_type'] = 1;
                    $data['status'] = 0;
                    $data['payment_card_details_id'] = $cardDetails->id;
                    $data['created_dt'] = date('Y-m-d H:i:s');
                    $data['count'] = $paymentCount + 1;
                    $data['work_status'] = 1;
                    $newEntity = $this->PaymentGetways->patchEntity($newEntity, $data);
                    $PaymentIdlast = $this->PaymentGetways->save($newEntity);
                    $paymentId = $PaymentIdlast->id;
                    $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $getingData->user_id])->first();
                    $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getingData->user_id])->first();
                    $new_shippong_address_id = $exitdata->id;
                    if ($paymentCount > 0) {
                        $getPreviousPayment = $this->PaymentGetways->find('all')->where(['count' => $paymentCount, 'user_id' => $getingData->user_id, 'kid_id' => $getingData->kid_id, 'payment_type' => 1, 'profile_type' => $profile_type])->first();
                        if (!empty($getPreviousPayment) && !empty($getPreviousPayment->shipping_address_id)) {
                            $new_shippong_address_id = $getPreviousPayment->shipping_address_id;
                        }
                    }

                    $this->PaymentGetways->updateAll(['shipping_address_id' => $new_shippong_address_id], ['id' => $paymentId]);
                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $getingData->user_id, 'is_billing' => 1])->first();
                    $full_address = $billingAddress->address . ((!empty($billingAddress->address_line_2)) ? '<br>' . $billingAddress->address_line_2 : '') . '<br>' . $billingAddress->city . ', ' . $billingAddress->state . '<br>' . $billingAddress->country . ' ' . $billingAddress->zipcode;
                    $usr_name = $billingAddress->full_name;
                    $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $getingData->user_id])->first();
                    $arr_user_info = [
                        'stripe_customer_key' => $current_usr_dtl_strip->stripe_customer_key,
                        'stripe_payment_method' => $cardDetails->stripe_payment_key,
                        'product' => $billingAddress->full_name . ' automentionskid',
                        'first_name' => $billingAddress->full_name,
                        'last_name' => $billingAddress->full_name,
                        'address' => $billingAddress->address,
                        'city' => $billingAddress->city,
                        'state' => $billingAddress->state,
                        'zip' => $billingAddress->zipcode,
                        'country' => $billingAddress->country,
                        'email' => $getUsreDetails->email,
                        'amount' => ($getUsreDetails->is_influencer == 1) ? 1 : $main_style_fee,
                        'invice' => $paymentId,
                        'refId' => $paymentId,
                        'companyName' => 'Drapefit',
                    ];
                    //                    $message = $this->authorizeCreditCard($arr_user_info);

                    $message = $this->stripeApiPay($arr_user_info);

                    $fitnumber = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first()->count;
                    if (@$message['status'] == '1') {
                        $updateId = $paymentId;
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
                        $feeprice = $stylefee->value;
                        $name = $getUsreDetails->name;
                        $from = $fromMail->value;
                        $subject = $emailMessage->display . ' #DFPYMID' . $updateId;;
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

                        $this->mailLogEntry('autoMentionsKid', $from, $subject, $toSupport, $email_message);
                        /*if ($this->Custom->sendEmail($toSupport, $from, $subject, $email_message)) {
                            $supportstatus = "Send";
                        } else {
                            $supportstatus = "faild";
                        }*/

                        if ($this->mailLogEntry('autoMentionsKid', $from, $subject, $getUsreDetails->email, $email_message)) {
                            // if ($this->Custom->sendEmail($getUsreDetails->email, $from, $subject, $email_message)) {
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

                        $this->mailLogEntry('autoMentionsKid', $from, $subjectProfile, $toSupport, $email_message);
                        /*if ($this->Custom->sendEmail($toSupport, $from, $subjectProfile, $email_message)) {
                            $supportstatus = 'Send';
                        } else {
                            $supportstatus = "Faild";
                        }*/


                        if ($this->mailLogEntry('autoMentionsKid', $from, $subjectProfile, $getUsreDetails->email, $email_message_profile)) {
                            // if ($this->Custom->sendEmail($getUsreDetails->email, $from, $subjectProfile, $email_message_profile)) {
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
                        return json_encode(['status' => 'success', 'msg' => 'Paid']);
                    } else {

                        if ($message['error_code'] == 'authentication_required') {
                            $this->Flash->error(__('Please authenticate your payment.'));
                            $reauthUrl = HTTP_ROOT . 'users/reAuthPayment/cronjobkid/' . $paymentId;

                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                            $stylefee = $this->Settings->find('all')->where(['Settings.name' => 'style_fee'])->first();
                            $mail_template = $this->Settings->find('all')->where(['Settings.name' => 'KID_AUTH'])->first();
                            $feeprice = $stylefee->value;
                            $name = $getUsreDetails->name;
                            $from = $fromMail->value;
                            $subject = 'Authenticate your kid subscription payment';
                            $sitename = SITE_NAME;

                            $email_message = "<br><br>" . $reauthUrl . "<br><br>";
                            $message = $this->Custom->paymentAuthMail($mail_template->value, $getUsreDetails->name, $reauthUrl);

                            $this->mailLogEntry('autoMentionsKid', $from, $subject, $getUsreDetails->email, $message);
                            // $this->Custom->sendEmail($getUsreDetails->email /* 'debmicrofinet@gmail.com' */, $from, $subject, $message);
                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                            $this->mailLogEntry('autoMentionsKid', $from, $subject, $toSupport, $message);
                            // $this->Custom->sendEmail($toSupport, $from, $subject, $message);
                            return json_encode(['status' => 'error', 'msg' => 'Authenticate required']);
                        }

                        if (!empty($getingData->kid_id)) {

                            $kidsdetails = $this->KidsDetails->find('all')->where(['id' => @$getingData->kid_id])->first();
                            if ($kidsdetails->kids_first_name == '') {
                                $kidsname = $this->Custom->kidsNumber($kidsdetails->kid_count);
                            } else {
                                $kidsname = $kidsdetails->kids_first_name;
                            }
                            $from = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first()->value;
                            $name = $getUsreDetails->name;
                            $email = $getUsreDetails->email;
                            $emailTemplatesSubcritionsPmt = $this->Settings->find('all')->where(['Settings.name' => 'kidPaymentFaildSubcritions'])->first();
                            $subject = $emailTemplatesSubcritionsPmt->display . ' kid: ' . $email;
                            $sitename = "DrapeFit.com";
                            $email_message_no_add = $this->Custom->paymentFailedSucritpionsKids($emailTemplatesSubcritionsPmt->value, $name, $kidsname, $sitename);

                            $toSupport = $this->Settings->find('all')->where(['Settings.name' => 'TO_BATCH_HELP'])->first()->value;
                            $emailtemplatesAdminPayment = $this->Settings->find('all')->where(['Settings.name' => 'kidPaymentFaildSubcritions'])->first();
                            $subjectSupportPayment = $emailtemplatesAdminPayment->display . ' kid: ' . $email;
                            $messageSupportPayment = $this->Custom->paymentFailedSucritpionsAdmin($emailtemplatesAdminPayment->value, $name, $email, $sitename, $sitename);
                            $subjectSupport = $emailMessageSupport->display . ' kid: ' . $email;

                            $this->mailLogEntry('autoMentionsKid', $from, $subjectSupportPayment, $toSupport, $messageSupportPayment);
                            /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupportPayment, $messageSupportPayment)) {
                                $supportstatus = "Send";
                            } else {
                                $supportstatus = "faild";
                            }*/
                            /*
                              if ($this->Custom->sendEmail($email, $from, $subject, $email_message_no_add)) {
                              $this->LetsPlanYourFirstFix->updateAll(['autoMentions' => 1], ['id' => $planId]);
                              $process = 'boxUpdateKid()';
                              $kidId = $kid_id;
                              $kidName = $kidsname;
                              $email = $email;
                              $subject = $subject;
                              $status = 'Send';
                              $userId = $user_id;
                              $client = 'Client';
                              $upportemail = $toSupport;
                              $support_subject = $subjectSupportPayment;
                              $supportstatus = $supportstatus;
                              $payment_message = json_encode($message);
                              $transctions_id = $message['TransId'];
                              $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                              } else {
                              $process = 'boxUpdateKid()';
                              $kidId = $kid_id;
                              $kidName = $kidsname;
                              $email = $email;
                              $subject = $subject;
                              $status = 'faild';
                              $userId = $user_id;
                              $client = 'client';
                              $upportemail = $toSupport;
                              $support_subject = $subjectSupportPayment;
                              $supportstatus = $supportstatus;
                              $payment_message = json_encode($message);
                              $transctions_id = $message['TransId'];
                              $this->Custom->batchprocessPayment($fitnumber, $payment_message, $transctions_id, $supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                              }

                             */
                        }
                        return json_encode(['status' => 'error', 'msg' => 'Faild']);
                    }
                }
            }
        }
    }

    public function kidProfileNotComplete()
    {

        $this->KidsDetails->belongsTo('usr', ['className' => 'Users', 'foreignKey' => 'user_id']);

        $all_kidss = $this->KidsDetails->find('all')->contain(['usr'])->where(['KidsDetails.kidProfileNotComplete' => 0]);

        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KID_PROFILE_NOT_COMPLETE'])->first();

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

        $emailMessageSupport = $this->Settings->find('all')->where(['Settings.name' => 'KID_PROFILE_NOT_COMPLETE'])->first();

        $subjectSupport = $emailMessageSupport->display;

        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

        foreach ($all_kidss as $kid) {

            if (!empty($kid->kids_first_name)) {

                $name = $kid->kids_first_name;
            }

            if (empty($kid->kids_first_name) || ($kid->is_progressbar < 100)) {

                if ($kid->kid_count == '1') {

                    $name = 'First Child';
                }

                if ($kid->kid_count == '2') {

                    $name = 'Second Child';
                }

                if ($kid->kid_count == '3') {

                    $name = 'Third Child';
                }

                if ($kid->kid_count == '4') {

                    $name = 'Four Child';
                }

                $client = $kid->usr;

                $to = $client->email;

                $from = $fromMail->value;

                $subject = "Complete your " . $name . " profile";

                $sitename = SITE_NAME;

                $mail_msg = "Complete your " . $name . " profile";

                $message = $this->Custom->userProfileComplete($emailMessage->value, $client->name, $mail_msg, $sitename);

                $messageSupport = $this->Custom->userProfileComplete($emailMessageSupport->value, $client->name, $mail_msg, $sitename);

                $this->mailLogEntry('kidProfileNotComplete', $from, $subjectSupport, $toSupport, $messageSupport);
                /*if ($this->Custom->sendEmail($toSupport, $from, $subjectSupport, $messageSupport)) {

                    $supportstatus = "Send";
                } else {

                    $supportstatus = "Faild";
                }*/

                if ($this->mailLogEntry('kidProfileNotComplete', $from, $subject, $to, $message)) {
                    // if ($this->Custom->sendEmail($to, $from, $subject, $message)) {

                    $this->KidsDetails->updateAll(['kidProfileNotComplete' => 1], ['id' => $kid->id]);

                    $process = 'kidProfileNotComplete()';

                    $name = $client->name;

                    $kidId = $kid_id;

                    $kidName = $kidsname;

                    $email = $to;

                    $subject = $subject;

                    $status = 'Send';

                    $userId = $user_id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $subjectSupport;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                } else {

                    $process = 'kidProfileNotComplete()';

                    $name = $client->name;

                    $kidId = $kid_id;

                    $kidName = $kidsname;

                    $email = $to;

                    $subject = $subject;

                    $status = 'faild';

                    $userId = $user_id;

                    $client = 'Client';

                    $upportemail = $toSupport;

                    $support_subject = $toSupport;

                    $supportstatus = $supportstatus;

                    $this->Custom->batchprocess($supportstatus, $upportemail, $support_subject, $client, $process, $userId, $name, $kidId, $kidName, $email, $subject, $status);
                }
            }
        }



        exit;
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

    public function processInvateryProdcut()
    {

        $previousworklist = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [1, 2], 'PaymentGetways.status' => 1]);

        if (!empty($previousworklist)) {

            foreach ($previousworklist as $woklist) {



                if (!empty($woklist->id)) {



                    if ($woklist->profile_type == 1) {

                        $productList = $this->Products->find('all')->where(['payment_id' => $woklist->id, 'keep_status IN' => [1, 2], 'return_inventory' => 2]);

                        if (!empty($productList)) {

                            foreach ($productList as $dt) {

                                $data1 = [];

                                //                                        echo "<pre>";
                                //                                print_r(empty($dt->customer_purchasedate));
                                //                                print_r(empty($dt->store_return_date));
                                //                                print_r($dt);
                                //                                echo "</pre>";
                                //                                exit;
                                //                                $productCheck = $this->InProducts->find('all')->where(['prodcut_id' => $dt->id])->first();

                                $productCheck = $this->InProducts->find('all')->where(['id' => $dt->inv_product_id])->first();

                                $c = $this->InProducts->newEntity();

                                if (!empty($productCheck) && !empty($productCheck->id)) {

                                    $data1['id'] = $productCheck->id;
                                }

                                $data1['user_id'] = (!empty($productCheck) && !empty($productCheck->user_id)) ? $productCheck->user_id : '0';

                                $data1['profile_type'] = 1;

                                $data1['product_name_one'] = (!empty($productCheck) && !empty($productCheck->product_name_one)) ? $productCheck->product_name_one : $dt->product_name_one;

                                $data1['product_name_two'] = (!empty($productCheck) && !empty($productCheck->product_name_two)) ? $productCheck->product_name_two : $dt->product_name_two;

                                $data1['brand_id'] = (!empty($productCheck) && !empty($productCheck->brand_id)) ? $productCheck->brand_id : 0;

                                /*

                                  //                                $data1['tall_feet'] = (!empty($productCheck) && !empty($productCheck->tall_feet)) ? $productCheck->tall_feet : $this->Custom->tallFeet($dt->user_id, 1);

                                  //                                $data1['tall_inch'] = (!empty($productCheck) && !empty($productCheck->tall_inch)) ? $productCheck->tall_inch : $this->Custom->tellInch($dt->user_id, 1);

                                  //                                $data1['best_fit_for_weight'] = (!empty($productCheck) && !empty($productCheck->best_fit_for_weight)) ? $productCheck->best_fit_for_weight : $this->Custom->weightLbs($dt->user_id, 1);

                                  //                                $data1['best_size_fit'] = (!empty($productCheck) && !empty($productCheck->best_size_fit)) ? $productCheck->best_size_fit : $this->Custom->bestSizeFit($dt->user_id);

                                  //                                $data1['waist_size'] = (!empty($productCheck) && !empty($productCheck->waist_size)) ? $productCheck->waist_size : $this->Custom->waistSize($dt->user_id);

                                  //                                $data1['waist_size_run'] = (!empty($productCheck) && !empty($productCheck->waist_size_run)) ? $productCheck->waist_size_run : $this->Custom->waistSizeRun($dt->user_id);

                                  //                                $data1['shirt_size'] = (!empty($productCheck) && !empty($productCheck->shirt_size)) ? $productCheck->shirt_size : $this->Custom->shirtSize($dt->user_id);

                                  //                                $data1['shirt_size_run'] = (!empty($productCheck) && !empty($productCheck->shirt_size_run)) ? $productCheck->shirt_size_run : $this->Custom->shirtSizeRun($dt->user_id);

                                  //                                $data1['inseam_size'] = (!empty($productCheck) && !empty($productCheck->inseam_size)) ? $productCheck->inseam_size : $this->Custom->inseamSize($dt->user_id);

                                  //                                $data1['shoe_size'] = (!empty($productCheck) && !empty($productCheck->shoe_size)) ? $productCheck->shoe_size : $this->Custom->shoeSize($dt->user_id, 1);

                                  //                                $data1['shoe_size_run'] = (!empty($productCheck) && !empty($productCheck->best_size_fit)) ? $productCheck->best_size_fit : $this->Custom->shoeSizeRun($dt->user_id);

                                  //                                $data1['better_body_shape'] = (!empty($productCheck) && !empty($productCheck->better_body_shape)) ? $productCheck->better_body_shape : $this->Custom->betterBodyShape($dt->user_id, 1);

                                  //                                $data1['skin_tone'] = (!empty($productCheck) && !empty($productCheck->skin_tone)) ? $productCheck->skin_tone : $this->Custom->skinTone($dt->user_id, 1);

                                  //                                $data1['work_type'] = (!empty($productCheck) && !empty($productCheck->work_type)) ? $productCheck->work_type : $this->Custom->workType($dt->user_id, 1);

                                  //                                $data1['casual_shirts_type'] = (!empty($productCheck) && !empty($productCheck->casual_shirts_type)) ? $productCheck->casual_shirts_type : $this->Custom->casualShirtsType($dt->user_id);

                                  //                                $data1['bottom_up_shirt_fit'] = (!empty($productCheck) && !empty($productCheck->bottom_up_shirt_fit)) ? $productCheck->bottom_up_shirt_fit : $this->Custom->bottomUpShirtFit($dt->user_id);

                                  //                                $data1['jeans_Fit'] = (!empty($productCheck) && !empty($productCheck->jeans_Fit)) ? $productCheck->jeans_Fit : $this->Custom->jeansFit($dt->user_id);

                                  //                                $data1['shorts_long'] = (!empty($productCheck) && !empty($productCheck->shorts_long)) ? $productCheck->shorts_long : 0;

                                  //                                $data1['color'] = (!empty($productCheck) && !empty($productCheck->color)) ? $productCheck->color : 0;

                                  //                                $data1['outfit_matches'] = (!empty($productCheck) && !empty($productCheck->outfit_matches)) ? $productCheck->outfit_matches : 0;

                                  //                                $data1['pants'] = (!empty($productCheck) && !empty($productCheck->pants)) ? $productCheck->pants : 0;

                                  //                                $data1['bra'] = (!empty($productCheck) && !empty($productCheck->bra)) ? $productCheck->bra : 0;

                                  //                                $data1['bra_recomend'] = (!empty($productCheck) && !empty($productCheck->bra_recomend)) ? $productCheck->bra_recomend : 0;

                                  //                                $data1['skirt'] = (!empty($productCheck) && !empty($productCheck->skirt)) ? $productCheck->skirt : 0;

                                  //                                $data1['jeans'] = (!empty($productCheck) && !empty($productCheck->jeans)) ? $productCheck->jeans : 0;

                                  //                                $data1['dress'] = (!empty($productCheck) && !empty($productCheck->dress)) ? $productCheck->dress : 0;

                                  //                                $data1['dress_recomended'] = (!empty($productCheck) && !empty($productCheck->dress_recomended)) ? $productCheck->dress_recomended : 0;

                                  //                                $data1['shirt_blouse'] = (!empty($productCheck) && !empty($productCheck->shirt_blouse)) ? $productCheck->shirt_blouse : 0;

                                  //                                $data1['shirt_blouse_recomend'] = (!empty($productCheck) && !empty($productCheck->shirt_blouse_recomend)) ? $productCheck->shirt_blouse_recomend : 0;

                                  //                                $data1['pantsr1'] = (!empty($productCheck) && !empty($productCheck->pantsr1)) ? $productCheck->pantsr1 : 0;

                                  //                                $data1['womenHeelHightPrefer'] = (!empty($productCheck) && !empty($productCheck->womenHeelHightPrefer)) ? $productCheck->womenHeelHightPrefer : 0;

                                  //                                $data1['proportion_shoulders'] = (!empty($productCheck) && !empty($productCheck->proportion_shoulders)) ? $productCheck->proportion_shoulders : 0;

                                  //                                $data1['proportion_legs'] = (!empty($productCheck) && !empty($productCheck->proportion_legs)) ? $productCheck->proportion_legs : 0;

                                  //                                $data1['proportion_arms'] = (!empty($productCheck) && !empty($productCheck->proportion_arms)) ? $productCheck->proportion_arms : 0;

                                  //                                $data1['proportion_hips'] = (!empty($productCheck) && !empty($productCheck->proportion_hips)) ? $productCheck->proportion_hips : 0;



                                  //                                $data1['top_size'] = (!empty($productCheck) && !empty($productCheck->top_size)) ? $productCheck->top_size : 0;

                                 */

                                $data1['purchase_price'] = (!empty($productCheck) && !empty($productCheck->purchase_price)) ? $productCheck->purchase_price : $dt->purchase_price;

                                $data1['sale_price'] = (!empty($productCheck) && !empty($productCheck->sale_price)) ? $productCheck->sale_price : $dt->sell_price;

                                $data1['quantity'] = (!empty($productCheck) && !empty($productCheck->quantity)) ? ($productCheck->quantity + 1) : 1;

                                $data1['note'] = (!empty($productCheck) && !empty($productCheck->note)) ? $productCheck->note : '';

                                $data1['available_status'] = 1;

                                $data1['is_active'] = 1;

                                $data1['created'] = date('Y-m-d H:i:s');

                                $data1['prodcut_id'] = $dt->id;

                                $data1['match_status'] = 2;

                                if (!empty($productCheck) && !empty($productCheck->product_image)) {

                                    $data1['product_image'] = (!empty($productCheck) && !empty($productCheck->product_image)) ? $productCheck->product_image : $dt->product_image;

                                    $inventoryimg = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/files/product_img/' . $data1['product_image'];

                                    $saveimg = '/home/' . SITE_USERNAME . '/public_html/webroot/files/product_img/' . $data1['product_image'];

                                    $copied = copy($saveimg, $inventoryimg);
                                }





                                if (!empty($productCheck) && !empty($productCheck->dtls)) {
                                } else {

                                    //                                    if (empty($productCheck)) {
                                    //                                        $inventory_br_img = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/' . BARCODE . $dt->barcode_image;
                                    //                                        $save_br_img = '/home/' . SITE_USERNAME . '/public_html/webroot/' . BARCODE . $dt->barcode_image;
                                    //                                        $copied_br = copy($save_br_img, $inventory_br_img);
                                    //
                                    //                                        $data1['dtls'] = $dt->barcode_value;
                                    //                                        $data1['prod_id'] = $dt->barcode_value;
                                    //
                                    //                                        $data1['bar_code_img'] = $dt->barcode_image;
                                    //                                    }
                                }



                                if (($dt->store_return_status == 'Y')) {

                                    $c = $this->InProducts->patchEntity($c, $data1);

                                    $this->InProducts->save($c);

                                    $this->Products->updateAll(['return_inventory' => 1], ['id' => $dt->id]);
                                }

                                //                                if ($dt->keep_status == 2) {
                                //                                    $c = $this->InProducts->patchEntity($c, $data1);
                                //                                    $this->InProducts->save($c);
                                //                                    $this->Products->updateAll(['return_inventory' => 1], ['id' => $dt->id]);
                                //                                }
                            }
                        }
                    }

                    if ($woklist->profile_type == 2) {

                        //echo $woklist->id;



                        $productList = $this->Products->find('all')->where(['payment_id' => $woklist->id, 'keep_status IN' => [1, 2], 'return_inventory' => 2]);

                        if (!empty($productList)) {

                            foreach ($productList as $dt) {

                                $data1 = [];

                                //                            $productCheck = $this->InProducts->find('all')->where(['prodcut_id' => $dt->id])->first();

                                $productCheck = $this->InProducts->find('all')->where(['id' => $dt->inv_product_id])->first();

                                $c = $this->InProducts->newEntity();

                                if (!empty($productCheck) && !empty($productCheck->id)) {

                                    $data1['id'] = $productCheck->id;
                                }

                                $data1['user_id'] = (!empty($productCheck) && !empty($productCheck->user_id)) ? $productCheck->user_id : '0';

                                $data1['profile_type'] = 2;

                                $data1['product_name_one'] = (!empty($productCheck) && !empty($productCheck->product_name_one)) ? $productCheck->product_name_one : $dt->product_name_one;

                                $data1['product_name_two'] = (!empty($productCheck) && !empty($productCheck->product_name_two)) ? $productCheck->product_name_two : $dt->product_name_two;

                                $data1['brand_id'] = (!empty($productCheck) && !empty($productCheck->brand_id)) ? $productCheck->brand_id : 0;

                                /*

                                  //                                $data1['tall_feet'] = (!empty($productCheck) && !empty($productCheck->tall_feet)) ? $productCheck->tall_feet : $this->Custom->tallFeet($dt->user_id, 2);

                                  //                                $data1['tall_inch'] = (!empty($productCheck) && !empty($productCheck->tall_inch)) ? $productCheck->tall_inch : $this->Custom->tellInch($dt->user_id, 2);

                                  //                                $data1['best_fit_for_weight'] = (!empty($productCheck) && !empty($productCheck->best_fit_for_weight)) ? $productCheck->best_fit_for_weight : $this->Custom->weightLbs($dt->user_id, 2);



                                  //                                $data1['best_size_fit'] = (!empty($productCheck) && !empty($productCheck->best_size_fit)) ? $productCheck->best_size_fit : 0;

                                  //                                $data1['waist_size'] = (!empty($productCheck) && !empty($productCheck->waist_size)) ? $productCheck->waist_size : 0;

                                  //                                $data1['waist_size_run'] = (!empty($productCheck) && !empty($productCheck->waist_size_run)) ? $productCheck->waist_size_run : 0;

                                  //                                $data1['shirt_size'] = (!empty($productCheck) && !empty($productCheck->shirt_size)) ? $productCheck->shirt_size : 0;

                                  //                                $data1['shirt_size_run'] = (!empty($productCheck) && !empty($productCheck->shirt_size_run)) ? $productCheck->shirt_size_run : 0;

                                  //                                $data1['inseam_size'] = (!empty($productCheck) && !empty($productCheck->inseam_size)) ? $productCheck->inseam_size : 0;



                                  //                                $data1['shoe_size'] = (!empty($productCheck) && !empty($productCheck->shoe_size)) ? $productCheck->shoe_size : $this->Custom->shoeSize($dt->user_id, 2);

                                  //                                $data1['shoe_size_run'] = (!empty($productCheck) && !empty($productCheck->shoe_size_run)) ? $productCheck->shoe_size_run : 0;

                                  //                                $data1['better_body_shape'] = (!empty($productCheck) && !empty($productCheck->better_body_shape)) ? $productCheck->better_body_shape : $this->Custom->betterBodyShape($dt->user_id, 2);

                                  //                                $data1['skin_tone'] = (!empty($productCheck) && !empty($productCheck->skin_tone)) ? $productCheck->skin_tone : $this->Custom->skinTone($dt->user_id, 2);

                                  //                                $data1['work_type'] = (!empty($productCheck) && !empty($productCheck->work_type)) ? $productCheck->work_type : $this->Custom->workType($dt->user_id, 2);

                                  //                                $data1['casual_shirts_type'] = (!empty($productCheck) && !empty($productCheck->casual_shirts_type)) ? $productCheck->casual_shirts_type : 0;

                                  //                                $data1['bottom_up_shirt_fit'] = (!empty($productCheck) && !empty($productCheck->bottom_up_shirt_fit)) ? $productCheck->bottom_up_shirt_fit : 0;

                                  //                                $data1['jeans_Fit'] = (!empty($productCheck) && !empty($productCheck->jeans_Fit)) ? $productCheck->jeans_Fit : 0;

                                  //                                $data1['shorts_long'] = (!empty($productCheck) && !empty($productCheck->shorts_long)) ? $productCheck->shorts_long : 0;

                                  //                                $data1['color'] = (!empty($productCheck) && !empty($productCheck->color)) ? $productCheck->color : $this->Custom->color($dt->user_id, 2);

                                  //                                $data1['outfit_matches'] = (!empty($productCheck) && !empty($productCheck->outfit_matches)) ? $productCheck->outfit_matches : 0;

                                  //                                $data1['pants'] = (!empty($productCheck) && !empty($productCheck->pants)) ? $productCheck->pants : $this->Custom->pants($dt->user_id, 2);

                                  //                                $data1['bra'] = (!empty($productCheck) && !empty($productCheck->bra)) ? $productCheck->bra : $this->Custom->bra($dt->user_id);

                                  //                                $data1['bra_recomend'] = (!empty($productCheck) && !empty($productCheck->bra_recomend)) ? $productCheck->bra_recomend : $this->Custom->braRecomend($dt->user_id);

                                  //                                $data1['skirt'] = (!empty($productCheck) && !empty($productCheck->skirt)) ? $productCheck->skirt : $this->Custom->skirt($dt->user_id);

                                  //                                $data1['jeans'] = (!empty($productCheck) && !empty($productCheck->jeans)) ? $productCheck->jeans : $this->Custom->jeans($dt->user_id);

                                  //                                $data1['dress'] = (!empty($productCheck) && !empty($productCheck->dress)) ? $productCheck->dress : $this->Custom->dress($dt->user_id);

                                  //                                $data1['dress_recomended'] = (!empty($productCheck) && !empty($productCheck->dress_recomended)) ? $productCheck->dress_recomended : $this->Custom->dressRecomended($dt->user_id);

                                  //                                $data1['shirt_blouse'] = (!empty($productCheck) && !empty($productCheck->shirt_blouse)) ? $productCheck->shirt_blouse : $this->Custom->shirtBlouse($dt->user_id);

                                  //                                $data1['shirt_blouse_recomend'] = (!empty($productCheck) && !empty($productCheck->shirt_blouse_recomend)) ? $productCheck->shirt_blouse_recomend : $this->Custom->shirtBlouseRecomend($dt->user_id);

                                  //                                $data1['pantsr1'] = (!empty($productCheck) && !empty($productCheck->pantsr1)) ? $productCheck->pantsr1 : $this->Custom->pantsr1($dt->user_id);

                                  //                                $data1['womenHeelHightPrefer'] = (!empty($productCheck) && !empty($productCheck->womenHeelHightPrefer)) ? $productCheck->womenHeelHightPrefer : $this->Custom->womenHeelHightPrefer($dt->user_id);

                                  //                                $data1['proportion_shoulders'] = (!empty($productCheck) && !empty($productCheck->proportion_shoulders)) ? $productCheck->proportion_shoulders : $this->Custom->proportionShoulders($dt->user_id);

                                  //                                $data1['proportion_legs'] = (!empty($productCheck) && !empty($productCheck->proportion_legs)) ? $productCheck->proportion_legs : $this->Custom->proportionLegs($dt->user_id);

                                  //                                $data1['proportion_arms'] = (!empty($productCheck) && !empty($productCheck->proportion_arms)) ? $productCheck->proportion_arms : $this->Custom->proportionArms($dt->user_id);

                                  //                                $data1['proportion_hips'] = (!empty($productCheck) && !empty($productCheck->proportion_hips)) ? $productCheck->proportion_hips : $this->Custom->proportionHips($dt->user_id);

                                  //                                $data1['top_size'] = (!empty($productCheck) && !empty($productCheck->top_size)) ? $productCheck->top_size : 0;

                                 */

                                $data1['purchase_price'] = (!empty($productCheck) && !empty($productCheck->purchase_price)) ? $productCheck->purchase_price : $dt->purchase_price;

                                $data1['sale_price'] = (!empty($productCheck) && !empty($productCheck->sale_price)) ? $productCheck->sale_price : $dt->sell_price;

                                $data1['quantity'] = (!empty($productCheck) && !empty($productCheck->quantity)) ? ($productCheck->quantity + 1) : 1;

                                $data1['note'] = '';

                                $data1['available_status'] = 1;

                                $data1['is_active'] = 1;

                                $data1['created'] = date('Y-m-d H:i:s');

                                $data1['prodcut_id'] = $dt->id;

                                $data1['match_status'] = 2;

                                if (!empty($productCheck) && !empty($productCheck->product_image)) {
                                } else {

                                    $data1['product_image'] = (!empty($productCheck) && !empty($productCheck->product_image)) ? $productCheck->product_image : $dt->product_image;

                                    $inventoryimg = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/files/product_img/' . $data1['product_image'];

                                    $saveimg = '/home/' . SITE_USERNAME . '/public_html/webroot/files/product_img/' . $data1['product_image'];

                                    $copied = copy($saveimg, $inventoryimg);
                                }





                                if (!empty($productCheck) && !empty($productCheck->dtls)) {
                                } else {

                                    //                                    if (empty($productCheck)) {
                                    //                                        $inventory_br_img = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/' . BARCODE . $dt->barcode_image;
                                    //                                        $save_br_img = '/home/' . SITE_USERNAME . '/public_html/webroot/' . BARCODE . $dt->barcode_image;
                                    //                                        $copied_br = copy($save_br_img, $inventory_br_img);
                                    //
                                    //                                        $data1['dtls'] = $dt->barcode_value;
                                    //                                        $data1['prod_id'] = $dt->barcode_value;
                                    //
                                    //                                        $data1['bar_code_img'] = $dt->barcode_image;
                                    //                                    }
                                }

                                //                                if ($dt->id == 3214) {
                                //                                    echo "<pre>";
                                //                                    print_r($data1);
                                //                                    echo "</pre>";
                                //                                    exit;
                                //                                }





                                if (($dt->store_return_status == 'Y')) {

                                    $c = $this->InProducts->patchEntity($c, $data1);

                                    $this->InProducts->save($c);

                                    $this->Products->updateAll(['return_inventory' => 1], ['id' => $dt->id]);
                                }

                                //                                if ($dt->keep_status == 2) {
                                //                                    $c = $this->InProducts->patchEntity($c, $data1);
                                //                                    $this->InProducts->save($c);
                                //                                    $this->Products->updateAll(['return_inventory' => 1], ['id' => $dt->id]);
                                //                                }
                            }
                        }
                    }

                    if ($woklist->profile_type == 3) {



                        $productList = $this->Products->find('all')->where(['payment_id' => $woklist->id, 'keep_status IN' => [1, 2], 'return_inventory' => 2]);

                        if (!empty($productList)) {

                            foreach ($productList as $dt) {

                                $data1 = [];

                                //                            $productCheck = $this->InProducts->find('all')->where(['prodcut_id' => $dt->id])->first();

                                $productCheck = $this->InProducts->find('all')->where(['id' => $dt->inv_product_id])->first();

                                $c = $this->InProducts->newEntity();

                                if (!empty($productCheck) && !empty($productCheck->id)) {

                                    $data1['id'] = $productCheck->id;
                                }



                                $data1['user_id'] = (!empty($productCheck) && !empty($productCheck->user_id)) ? $productCheck->user_id : '0';

                                $data1['profile_type'] = $this->Custom->getProfileKid($dt->kid_id);

                                $data1['product_name_one'] = (!empty($productCheck) && !empty($productCheck->product_name_one)) ? $productCheck->product_name_one : $dt->product_name_one;

                                $data1['product_name_two'] = (!empty($productCheck) && !empty($productCheck->product_name_two)) ? $productCheck->product_name_two : $dt->product_name_two;

                                $data1['brand_id'] = (!empty($productCheck) && !empty($productCheck->brand_id)) ? $productCheck->brand_id : 0;

                                /*

                                  //                                $data1['tall_feet'] = (!empty($productCheck) && !empty($productCheck->tall_feet)) ? $productCheck->tall_feet : $this->Custom->tallFeetkid($dt->kid_id);

                                  //                                $data1['tall_inch'] = (!empty($productCheck) && !empty($productCheck->tall_inch)) ? $productCheck->tall_inch : $this->Custom->tellInchkid($dt->kid_id);

                                  //                                $data1['best_fit_for_weight'] = (!empty($productCheck) && !empty($productCheck->best_fit_for_weight)) ? $productCheck->best_fit_for_weight : $this->Custom->weightLbskid($dt->kid_id);

                                  //                                $data1['best_size_fit'] = (!empty($productCheck) && !empty($productCheck->best_size_fit)) ? $productCheck->best_size_fit : $this->Custom->bestSizeFitkid($dt->kid_id);

                                  //                                $data1['waist_size'] = (!empty($productCheck) && !empty($productCheck->waist_size)) ? $productCheck->waist_size : 0;

                                  //                                $data1['waist_size_run'] = (!empty($productCheck) && !empty($productCheck->waist_size_run)) ? $productCheck->waist_size_run : 0;

                                  //                                $data1['shirt_size'] = (!empty($productCheck) && !empty($productCheck->shirt_size)) ? $productCheck->shirt_size : 0;

                                  //                                $data1['shirt_size_run'] = (!empty($productCheck) && !empty($productCheck->shirt_size_run)) ? $productCheck->shirt_size_run : 0;

                                  //                                $data1['inseam_size'] = (!empty($productCheck) && !empty($productCheck->inseam_size)) ? $productCheck->inseam_size : 0;



                                  //                                $data1['shoe_size'] = (!empty($productCheck) && !empty($productCheck->shoe_size)) ? $productCheck->shoe_size : $this->Custom->shoeSizekid($dt->kid_id);

                                  //                                $data1['shoe_size_run'] = (!empty($productCheck) && !empty($productCheck->shoe_size_run)) ? $productCheck->shoe_size_run : 0;

                                  //                                $data1['better_body_shape'] = (!empty($productCheck) && !empty($productCheck->better_body_shape)) ? $productCheck->better_body_shape : $this->Custom->betterBodyShapekid($dt->kid_id);



                                  //                                $data1['skin_tone'] = (!empty($productCheck) && !empty($productCheck->skin_tone)) ? $productCheck->skin_tone : 0;

                                  //                                $data1['work_type'] = (!empty($productCheck) && !empty($productCheck->work_type)) ? $productCheck->work_type : 0;

                                  //                                $data1['casual_shirts_type'] = (!empty($productCheck) && !empty($productCheck->casual_shirts_type)) ? $productCheck->casual_shirts_type : 0;

                                  //                                $data1['bottom_up_shirt_fit'] = (!empty($productCheck) && !empty($productCheck->bottom_up_shirt_fit)) ? $productCheck->bottom_up_shirt_fit : 0;

                                  //                                $data1['jeans_Fit'] = (!empty($productCheck) && !empty($productCheck->jeans_Fit)) ? $productCheck->jeans_Fit : 0;

                                  //                                $data1['shorts_long'] = (!empty($productCheck) && !empty($productCheck->shorts_long)) ? $productCheck->shorts_long : 0;



                                  //                                $data1['color'] = (!empty($productCheck) && !empty($productCheck->color)) ? $productCheck->color : $this->Custom->colorkid($dt->kid_id);

                                  //                                $data1['outfit_matches'] = (!empty($productCheck) && !empty($productCheck->outfit_matches)) ? $productCheck->outfit_matches : 0;

                                  //                                $data1['pants'] = (!empty($productCheck) && !empty($productCheck->pants)) ? $productCheck->pants : $this->Custom->paintskid($dt->kid_id);

                                  //                                $data1['bra'] = (!empty($productCheck) && !empty($productCheck->bra)) ? $productCheck->bra : 0;

                                  //                                $data1['bra_recomend'] = (!empty($productCheck) && !empty($productCheck->bra_recomend)) ? $productCheck->bra_recomend : 0;

                                  //                                $data1['skirt'] = (!empty($productCheck) && !empty($productCheck->skirt)) ? $productCheck->skirt : $this->Custom->skirtkid($dt->kid_id);

                                  //                                $data1['jeans'] = (!empty($productCheck) && !empty($productCheck->jeans)) ? $productCheck->jeans : $this->Custom->jeanskid($dt->kid_id);



                                  //                                $data1['dress'] = (!empty($productCheck) && !empty($productCheck->dress)) ? $productCheck->dress : 0;

                                  //                                $data1['dress_recomended'] = (!empty($productCheck) && !empty($productCheck->dress_recomended)) ? $productCheck->dress_recomended : 0;

                                  //                                $data1['shirt_blouse'] = (!empty($productCheck) && !empty($productCheck->shirt_blouse)) ? $productCheck->shirt_blouse : 0;

                                  //                                $data1['shirt_blouse_recomend'] = (!empty($productCheck) && !empty($productCheck->shirt_blouse_recomend)) ? $productCheck->shirt_blouse_recomend : 0;

                                  //                                $data1['pantsr1'] = (!empty($productCheck) && !empty($productCheck->pantsr1)) ? $productCheck->pantsr1 : 0;

                                  //                                $data1['womenHeelHightPrefer'] = (!empty($productCheck) && !empty($productCheck->womenHeelHightPrefer)) ? $productCheck->womenHeelHightPrefer : 0;

                                  //                                $data1['proportion_shoulders'] = (!empty($productCheck) && !empty($productCheck->proportion_shoulders)) ? $productCheck->proportion_shoulders : 0;

                                  //                                $data1['proportion_legs'] = (!empty($productCheck) && !empty($productCheck->proportion_legs)) ? $productCheck->proportion_legs : 0;

                                  //                                $data1['proportion_arms'] = (!empty($productCheck) && !empty($productCheck->proportion_arms)) ? $productCheck->proportion_arms : 0;

                                  //                                $data1['proportion_hips'] = (!empty($productCheck) && !empty($productCheck->proportion_hips)) ? $productCheck->proportion_hips : 0;



                                  //                                $data1['top_size'] = (!empty($productCheck) && !empty($productCheck->top_size)) ? $productCheck->top_size : $this->Custom->topSizekid($dt->kid_id);

                                 */

                                $data1['purchase_price'] = (!empty($productCheck) && !empty($productCheck->purchase_price)) ? $productCheck->purchase_price : $dt->purchase_price;

                                $data1['sale_price'] = (!empty($productCheck) && !empty($productCheck->sale_price)) ? $productCheck->sale_price : $dt->sell_price;

                                $data1['quantity'] = (!empty($productCheck) && !empty($productCheck->quantity)) ? ($productCheck->quantity + 1) : 1;

                                $data1['note'] = 0;

                                $data1['available_status'] = 1;

                                $data1['is_active'] = 1;

                                $data1['created'] = date('Y-m-d H:i:s');

                                $data1['prodcut_id'] = $dt->id;

                                $data1['match_status'] = 2;

                                if (!empty($productCheck) && !empty($productCheck->product_image)) {

                                    $data1['product_image'] = (!empty($productCheck) && !empty($productCheck->product_image)) ? $productCheck->product_image : $dt->product_image;

                                    $inventoryimg = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/files/product_img/' . $data1['product_image'];

                                    $saveimg = '/home/' . SITE_USERNAME . '/public_html/webroot/files/product_img/' . $data1['product_image'];

                                    $copied = copy($saveimg, $inventoryimg);
                                }





                                if (!empty($productCheck) && !empty($productCheck->dtls)) {
                                } else {

                                    //                                    if (empty($productCheck)) {
                                    //                                        $inventory_br_img = '/home/' . SITE_USERNAME . '/public_html/inventory/webroot/' . BARCODE . $dt->barcode_image;
                                    //                                        $save_br_img = '/home/' . SITE_USERNAME . '/public_html/webroot/' . BARCODE . $dt->barcode_image;
                                    //                                        $copied_br = copy($save_br_img, $inventory_br_img);
                                    //
                                    //                                        $data1['dtls'] = $dt->barcode_value;
                                    //                                        $data1['prod_id'] = $dt->barcode_value;
                                    //
                                    //                                        $data1['bar_code_img'] = $dt->barcode_image;
                                    //                                    }
                                }



                                if (($dt->store_return_status == 'Y')) {

                                    $c = $this->InProducts->patchEntity($c, $data1);

                                    $this->InProducts->save($c);

                                    $this->Products->updateAll(['return_inventory' => 1], ['id' => $dt->id]);
                                }

                                //                                if ($dt->keep_status == 2) {
                                //                                    $c = $this->InProducts->patchEntity($c, $data1);
                                //                                    $this->InProducts->save($c);
                                //                                    $this->Products->updateAll(['return_inventory' => 1], ['id' => $dt->id]);
                                //                                }
                            }
                        }
                    }
                }
            }
        }

        exit;
    }

    public function returnInvateryProdcutsList()
    {

        $previousworklist = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [1, 2], 'PaymentGetways.status' => 1]);

        if (!empty($previousworklist)) {

            foreach ($previousworklist as $woklist) {



                if (!empty($woklist->id)) {



                    if ($woklist->profile_type == 1) {

                        $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);

                        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                        $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                        $productList = $this->Products->find('all')->where(['Products.payment_id' => $woklist->id, 'Products.keep_status IN' => [1, 2], 'Products.return_inventory' => 2])->contain(['UserDetails' => ['fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count']]]);

                        if (!empty($productList)) {

                            foreach ($productList as $dt) {

                                //                                        

                                $productCheck = $this->InProducts->find('all')->where(['id' => $dt->inv_product_id])->first();

                                $c = $this->InProducts->newEntity();

                                if (!empty($productCheck) && !empty($productCheck->id)) {

                                    $data1['id'] = $productCheck->id;
                                }

                                $data1['user_id'] = (!empty($productCheck) && !empty($productCheck->user_id)) ? $productCheck->user_id : '0';

                                $data1['user_email'] = $dt->user->email;

                                $data1['user_name'] = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;

                                $data1['fit_number'] = $dt->payment_getway->count;

                                $data1['profile_type'] = 1;

                                $data1['product_name_one'] = (!empty($productCheck) && !empty($productCheck->product_name_one)) ? $productCheck->product_name_one : $dt->product_name_one;

                                $data1['product_name_two'] = (!empty($productCheck) && !empty($productCheck->product_name_two)) ? $productCheck->product_name_two : $dt->product_name_two;

                                $data1['brand_id'] = (!empty($productCheck) && !empty($productCheck->brand_id)) ? $productCheck->brand_id : 0;

                                $data1['tall_feet'] = (!empty($productCheck) && !empty($productCheck->tall_feet)) ? $productCheck->tall_feet : $this->Custom->tallFeet($dt->user_id, 1);

                                $data1['tall_inch'] = (!empty($productCheck) && !empty($productCheck->tall_inch)) ? $productCheck->tall_inch : $this->Custom->tellInch($dt->user_id, 1);

                                $data1['best_fit_for_weight'] = (!empty($productCheck) && !empty($productCheck->best_fit_for_weight)) ? $productCheck->best_fit_for_weight : $this->Custom->weightLbs($dt->user_id, 1);

                                $data1['best_size_fit'] = (!empty($productCheck) && !empty($productCheck->best_size_fit)) ? $productCheck->best_size_fit : $this->Custom->bestSizeFit($dt->user_id);

                                $data1['waist_size'] = (!empty($productCheck) && !empty($productCheck->waist_size)) ? $productCheck->waist_size : $this->Custom->waistSize($dt->user_id);

                                $data1['waist_size_run'] = (!empty($productCheck) && !empty($productCheck->waist_size_run)) ? $productCheck->waist_size_run : $this->Custom->waistSizeRun($dt->user_id);

                                $data1['shirt_size'] = (!empty($productCheck) && !empty($productCheck->shirt_size)) ? $productCheck->shirt_size : $this->Custom->shirtSize($dt->user_id);

                                $data1['shirt_size_run'] = (!empty($productCheck) && !empty($productCheck->shirt_size_run)) ? $productCheck->shirt_size_run : $this->Custom->shirtSizeRun($dt->user_id);

                                $data1['inseam_size'] = (!empty($productCheck) && !empty($productCheck->inseam_size)) ? $productCheck->inseam_size : $this->Custom->inseamSize($dt->user_id);

                                $data1['shoe_size'] = (!empty($productCheck) && !empty($productCheck->shoe_size)) ? $productCheck->shoe_size : $this->Custom->shoeSize($dt->user_id, 1);

                                $data1['shoe_size_run'] = (!empty($productCheck) && !empty($productCheck->best_size_fit)) ? $productCheck->best_size_fit : $this->Custom->shoeSizeRun($dt->user_id);

                                $data1['better_body_shape'] = (!empty($productCheck) && !empty($productCheck->better_body_shape)) ? $productCheck->better_body_shape : $this->Custom->betterBodyShape($dt->user_id, 1);

                                $data1['skin_tone'] = (!empty($productCheck) && !empty($productCheck->skin_tone)) ? $productCheck->skin_tone : $this->Custom->skinTone($dt->user_id, 1);

                                $data1['work_type'] = (!empty($productCheck) && !empty($productCheck->work_type)) ? $productCheck->work_type : $this->Custom->workType($dt->user_id, 1);

                                $data1['casual_shirts_type'] = (!empty($productCheck) && !empty($productCheck->casual_shirts_type)) ? $productCheck->casual_shirts_type : $this->Custom->casualShirtsType($dt->user_id);

                                $data1['bottom_up_shirt_fit'] = (!empty($productCheck) && !empty($productCheck->bottom_up_shirt_fit)) ? $productCheck->bottom_up_shirt_fit : $this->Custom->bottomUpShirtFit($dt->user_id);

                                $data1['jeans_Fit'] = (!empty($productCheck) && !empty($productCheck->jeans_Fit)) ? $productCheck->jeans_Fit : $this->Custom->jeansFit($dt->user_id);

                                $data1['shorts_long'] = 0;

                                $data1['color'] = 0;

                                $data1['outfit_matches'] = 0;

                                $data1['pants'] = 0;

                                $data1['bra'] = 0;

                                $data1['bra_recomend'] = 0;

                                $data1['skirt'] = 0;

                                $data1['jeans'] = 0;

                                $data1['dress'] = 0;

                                $data1['dress_recomended'] = 0;

                                $data1['shirt_blouse'] = 0;

                                $data1['shirt_blouse_recomend'] = 0;

                                $data1['pantsr1'] = 0;

                                $data1['womenHeelHightPrefer'] = 0;

                                $data1['proportion_shoulders'] = 0;

                                $data1['proportion_legs'] = 0;

                                $data1['proportion_arms'] = 0;

                                $data1['proportion_hips'] = 0;

                                $data1['top_size'] = 0;

                                $data1['purchase_price'] = (!empty($productCheck) && !empty($productCheck->purchase_price)) ? $productCheck->purchase_price : $dt->sell_price;

                                $data1['quantity'] = (!empty($productCheck) && !empty($productCheck->quantity)) ? ($productCheck->quantity + 1) : 1;

                                $data1['note'] = (!empty($productCheck) && !empty($productCheck->note)) ? $productCheck->note : 0;

                                $data1['product_image'] = (!empty($productCheck) && !empty($productCheck->product_image)) ? $productCheck->product_image : $dt->product_image;

                                $data1['available_status'] = 1;

                                $data1['is_active'] = 1;

                                $data1['created'] = date('Y-m-d H:i:s');

                                $data1['prodcut_id'] = $dt->id;

                                $data1['store_return_status'] = $dt->store_return_status;

                                echo "Men : <pre>";

                                echo "<img src='" . HTTP_ROOT . 'files/product_img/' . $data1['product_image'] . "' width='100'><br>";

                                print_r($data1);

                                echo "</pre>";
                            }
                        }
                    }
                    if ($woklist->profile_type == 2) {

                        //echo $woklist->id;

                        $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);

                        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                        $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                        $productList = $this->Products->find('all')->where(['Products.payment_id' => $woklist->id, 'Products.keep_status IN' => [1, 2], 'Products.return_inventory' => 2])->contain(['UserDetails' => ['fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count']]]);

                        if (!empty($productList)) {

                            foreach ($productList as $dt) {



                                $productCheck = $this->InProducts->find('all')->where(['id' => $dt->inv_product_id])->first();

                                $c = $this->InProducts->newEntity();

                                if (!empty($productCheck) && !empty($productCheck->id)) {

                                    $data1['id'] = $productCheck->id;
                                }

                                $data1['user_id'] = (!empty($productCheck) && !empty($productCheck->user_id)) ? $productCheck->user_id : '0';

                                $data1['user_email'] = $dt->user->email;

                                $data1['user_name'] = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;

                                $data1['fit_number'] = $dt->payment_getway->count;

                                $data1['profile_type'] = 2;

                                $data1['product_name_one'] = (!empty($productCheck) && !empty($productCheck->product_name_one)) ? $productCheck->product_name_one : $dt->product_name_one;

                                $data1['product_name_two'] = (!empty($productCheck) && !empty($productCheck->product_name_two)) ? $productCheck->product_name_two : $dt->product_name_two;

                                $data1['brand_id'] = (!empty($productCheck) && !empty($productCheck->brand_id)) ? $productCheck->brand_id : 0;

                                $data1['tall_feet'] = (!empty($productCheck) && !empty($productCheck->tall_feet)) ? $productCheck->tall_feet : $this->Custom->tallFeet($dt->user_id, 2);

                                $data1['tall_inch'] = (!empty($productCheck) && !empty($productCheck->tall_inch)) ? $productCheck->tall_inch : $this->Custom->tellInch($dt->user_id, 2);

                                $data1['best_fit_for_weight'] = (!empty($productCheck) && !empty($productCheck->best_fit_for_weight)) ? $productCheck->best_fit_for_weight : $this->Custom->weightLbs($dt->user_id, 2);

                                $data1['best_size_fit'] = 0;

                                $data1['waist_size'] = 0;

                                $data1['waist_size_run'] = 0;

                                $data1['shirt_size'] = 0;

                                $data1['shirt_size_run'] = 0;

                                $data1['inseam_size'] = 0;

                                $data1['shoe_size'] = (!empty($productCheck) && !empty($productCheck->shoe_size)) ? $productCheck->shoe_size : $this->Custom->shoeSize($dt->user_id, 2);

                                $data1['shoe_size_run'] = 0;

                                $data1['better_body_shape'] = (!empty($productCheck) && !empty($productCheck->better_body_shape)) ? $productCheck->better_body_shape : $this->Custom->betterBodyShape($dt->user_id, 2);

                                $data1['skin_tone'] = (!empty($productCheck) && !empty($productCheck->skin_tone)) ? $productCheck->skin_tone : $this->Custom->skinTone($dt->user_id, 2);

                                $data1['work_type'] = (!empty($productCheck) && !empty($productCheck->work_type)) ? $productCheck->work_type : $this->Custom->workType($dt->user_id, 2);

                                $data1['casual_shirts_type'] = 0;

                                $data1['bottom_up_shirt_fit'] = 0;

                                $data1['jeans_Fit'] = 0;

                                $data1['shorts_long'] = 0;

                                $data1['color'] = (!empty($productCheck) && !empty($productCheck->color)) ? $productCheck->color : $this->Custom->color($dt->user_id, 2);

                                $data1['outfit_matches'] = 0;

                                $data1['pants'] = (!empty($productCheck) && !empty($productCheck->pants)) ? $productCheck->pants : $this->Custom->pants($dt->user_id, 2);

                                $data1['bra'] = (!empty($productCheck) && !empty($productCheck->bra)) ? $productCheck->bra : $this->Custom->bra($dt->user_id);

                                $data1['bra_recomend'] = (!empty($productCheck) && !empty($productCheck->bra_recomend)) ? $productCheck->bra_recomend : $this->Custom->braRecomend($dt->user_id);

                                $data1['skirt'] = (!empty($productCheck) && !empty($productCheck->skirt)) ? $productCheck->skirt : $this->Custom->skirt($dt->user_id);

                                $data1['jeans'] = (!empty($productCheck) && !empty($productCheck->jeans)) ? $productCheck->jeans : $this->Custom->jeans($dt->user_id);

                                $data1['dress'] = (!empty($productCheck) && !empty($productCheck->dress)) ? $productCheck->dress : $this->Custom->dress($dt->user_id);

                                $data1['dress_recomended'] = (!empty($productCheck) && !empty($productCheck->dress_recomended)) ? $productCheck->dress_recomended : $this->Custom->dressRecomended($dt->user_id);

                                $data1['shirt_blouse'] = (!empty($productCheck) && !empty($productCheck->shirt_blouse)) ? $productCheck->shirt_blouse : $this->Custom->shirtBlouse($dt->user_id);

                                $data1['shirt_blouse_recomend'] = (!empty($productCheck) && !empty($productCheck->shirt_blouse_recomend)) ? $productCheck->shirt_blouse_recomend : $this->Custom->shirtBlouseRecomend($dt->user_id);

                                $data1['pantsr1'] = (!empty($productCheck) && !empty($productCheck->pantsr1)) ? $productCheck->pantsr1 : $this->Custom->pantsr1($dt->user_id);

                                $data1['womenHeelHightPrefer'] = (!empty($productCheck) && !empty($productCheck->womenHeelHightPrefer)) ? $productCheck->womenHeelHightPrefer : $this->Custom->womenHeelHightPrefer($dt->user_id);

                                $data1['proportion_shoulders'] = (!empty($productCheck) && !empty($productCheck->proportion_shoulders)) ? $productCheck->proportion_shoulders : $this->Custom->proportionShoulders($dt->user_id);

                                $data1['proportion_legs'] = (!empty($productCheck) && !empty($productCheck->proportion_legs)) ? $productCheck->proportion_legs : $this->Custom->proportionLegs($dt->user_id);

                                $data1['proportion_arms'] = (!empty($productCheck) && !empty($productCheck->proportion_arms)) ? $productCheck->proportion_arms : $this->Custom->proportionArms($dt->user_id);

                                $data1['proportion_hips'] = (!empty($productCheck) && !empty($productCheck->proportion_hips)) ? $productCheck->proportion_hips : $this->Custom->proportionHips($dt->user_id);

                                $data1['top_size'] = 0;

                                $data1['purchase_price'] = (!empty($productCheck) && !empty($productCheck->purchase_price)) ? $productCheck->purchase_price : $dt->sell_price;

                                $data1['quantity'] = (!empty($productCheck) && !empty($productCheck->quantity)) ? ($productCheck->quantity + 1) : 1;

                                $data1['note'] = '';

                                $data1['product_image'] = (!empty($productCheck) && !empty($productCheck->product_image)) ? $productCheck->product_image : $dt->product_image;

                                $data1['available_status'] = 1;

                                $data1['is_active'] = 1;

                                $data1['created'] = date('Y-m-d H:i:s');

                                $data1['prodcut_id'] = $dt->id;

                                $data1['store_return_status'] = $dt->store_return_status;

                                echo "Woman : <pre>";

                                echo "<img src='" . HTTP_ROOT . 'files/product_img/' . $data1['product_image'] . "' width='100'><br>";

                                print_r($data1);

                                echo "</pre>";
                            }
                        }
                    }
                    if ($woklist->profile_type == 3) {



                        $this->Products->belongsTo('PaymentGetways', ['className' => 'PaymentGetways', 'foreignKey' => 'payment_id']);

                        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                        $this->Products->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id', 'bindingKey' => 'user_id']);

                        $productList = $this->Products->find('all')->where(['Products.payment_id' => $woklist->id, 'Products.keep_status IN' => [1, 2], 'Products.return_inventory' => 2])->contain(['UserDetails' => ['fields' => ['UserDetails.first_name', 'UserDetails.last_name']], 'Users' => ['fields' => ['Users.email', 'Users.phone']], 'PaymentGetways' => ['fields' => ['PaymentGetways.count']]]);

                        if (!empty($productList)) {

                            foreach ($productList as $dt) {



                                $productCheck = $this->InProducts->find('all')->where(['id' => $dt->inv_product_id])->first();

                                $c = $this->InProducts->newEntity();

                                if (!empty($productCheck) && !empty($productCheck->id)) {

                                    $data1['id'] = $productCheck->id;
                                }



                                $data1['user_id'] = (!empty($productCheck) && !empty($productCheck->user_id)) ? $productCheck->user_id : '0';

                                $data1['user_email'] = $dt->user->email;

                                $data1['user_name'] = $dt->user_detail->first_name . " " . $dt->user_detail->last_name;

                                $data1['fit_number'] = $dt->payment_getway->count;

                                $data1['profile_type'] = $this->Custom->getProfileKid($dt->kid_id);

                                $data1['product_name_one'] = (!empty($productCheck) && !empty($productCheck->product_name_one)) ? $productCheck->product_name_one : $dt->product_name_one;

                                $data1['product_name_two'] = (!empty($productCheck) && !empty($productCheck->product_name_two)) ? $productCheck->product_name_two : $dt->product_name_two;

                                $data1['brand_id'] = (!empty($productCheck) && !empty($productCheck->brand_id)) ? $productCheck->brand_id : 0;

                                $data1['tall_feet'] = (!empty($productCheck) && !empty($productCheck->tall_feet)) ? $productCheck->tall_feet : $this->Custom->tallFeetkid($dt->kid_id);

                                $data1['tall_inch'] = (!empty($productCheck) && !empty($productCheck->tall_inch)) ? $productCheck->tall_inch : $this->Custom->tellInchkid($dt->kid_id);

                                $data1['best_fit_for_weight'] = (!empty($productCheck) && !empty($productCheck->best_fit_for_weight)) ? $productCheck->best_fit_for_weight : $this->Custom->weightLbskid($dt->kid_id);

                                $data1['best_size_fit'] = (!empty($productCheck) && !empty($productCheck->best_size_fit)) ? $productCheck->best_size_fit : $this->Custom->bestSizeFitkid($dt->kid_id);

                                $data1['waist_size'] = 0;

                                $data1['waist_size_run'] = 0;

                                $data1['shirt_size'] = 0;

                                $data1['shirt_size_run'] = 0;

                                $data1['inseam_size'] = 0;

                                $data1['shoe_size'] = (!empty($productCheck) && !empty($productCheck->shoe_size)) ? $productCheck->shoe_size : $this->Custom->shoeSizekid($dt->kid_id);

                                $data1['shoe_size_run'] = 0;

                                $data1['better_body_shape'] = (!empty($productCheck) && !empty($productCheck->better_body_shape)) ? $productCheck->better_body_shape : $this->Custom->betterBodyShapekid($dt->kid_id);

                                $data1['skin_tone'] = 0;

                                $data1['work_type'] = 0;

                                $data1['casual_shirts_type'] = 0;

                                $data1['bottom_up_shirt_fit'] = 0;

                                $data1['jeans_Fit'] = 0;

                                $data1['shorts_long'] = 0;

                                $data1['color'] = (!empty($productCheck) && !empty($productCheck->color)) ? $productCheck->color : $this->Custom->colorkid($dt->kid_id);

                                $data1['outfit_matches'] = 0;

                                $data1['pants'] = (!empty($productCheck) && !empty($productCheck->pants)) ? $productCheck->pants : $this->Custom->paintskid($dt->kid_id);

                                $data1['bra'] = 0;

                                $data1['bra_recomend'] = 0;

                                $data1['skirt'] = (!empty($productCheck) && !empty($productCheck->skirt)) ? $productCheck->skirt : $this->Custom->skirtkid($dt->kid_id);

                                $data1['jeans'] = (!empty($productCheck) && !empty($productCheck->jeans)) ? $productCheck->jeans : $this->Custom->jeanskid($dt->kid_id);

                                $data1['dress'] = 0;

                                $data1['dress_recomended'] = 0;

                                $data1['shirt_blouse'] = 0;

                                $data1['shirt_blouse_recomend'] = 0;

                                $data1['pantsr1'] = 0;

                                $data1['womenHeelHightPrefer'] = 0;

                                $data1['proportion_shoulders'] = 0;

                                $data1['proportion_legs'] = 0;

                                $data1['proportion_arms'] = 0;

                                $data1['proportion_hips'] = 0;

                                $data1['top_size'] = (!empty($productCheck) && !empty($productCheck->top_size)) ? $productCheck->top_size : $this->Custom->topSizekid($dt->kid_id);

                                $data1['purchase_price'] = (!empty($productCheck) && !empty($productCheck->purchase_price)) ? $productCheck->purchase_price : $dt->sell_price;

                                $data1['quantity'] = (!empty($productCheck) && !empty($productCheck->quantity)) ? ($productCheck->quantity + 1) : 1;

                                $data1['note'] = 0;

                                $data1['product_image'] = (!empty($productCheck) && !empty($productCheck->product_image)) ? $productCheck->product_image : $dt->product_image;

                                $data1['available_status'] = 0;

                                $data1['is_active'] = 1;

                                $data1['created'] = date('Y-m-d H:i:s');

                                $data1['prodcut_id'] = $dt->id;

                                $data1['store_return_status'] = $dt->store_return_status;

                                echo "Kid " . $this->Custom->getProfileKid($dt->kid_id) . ": <pre>";

                                echo "<img src='" . HTTP_ROOT . 'files/product_img/' . $data1['product_image'] . "' width='100'><br>";

                                print_r($data1);

                                echo "</pre>";
                            }
                        }
                    }
                }
            }
        }

        exit;
    }

    public function activeSubscription() {
        $get_all_unsub_usr = $this->LetsPlanYourFirstFix->find('all')->where(['try_new_items_with_scheduled_fixes' => 0]);
        $current_date = date('Y-m-d');
        echo $two_month_old = date('Y-m-d', strtotime('-2 months'));
        foreach ($get_all_unsub_usr as $usr_li) {
            $usr_unsub_date = date('Y-m-d', strtotime($usr_li->applay_dt));
            if ($two_month_old == $usr_unsub_date) {
                $update = $this->LetsPlanYourFirstFix->query()->update()->set(['try_new_items_with_scheduled_fixes' => 1, 'applay_dt' => date('Y-m-d H:i:s')])->where(['id' => $usr_li->id])->execute();
                if ($update) {
//                    print_r($update);
//                    echo "<br>".$usr_li->id.' Active <br>----<br>';
                }
            }
        }
        exit;
    }

    public function stripeApiPay($arr_data = []) {
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
        \Stripe\Stripe::setApiKey($stripe_token['secret_key']);

        $amount = round($amount, 2, PHP_ROUND_HALF_UP);

        try {
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
                        'description' => $orderID . $itemName,
            ]);
//            echo "<pre>";
//            print_r($payDetails);
            // get payment details
            $paymenyResponse = $payDetails->jsonSerialize();

//            echo($pay_res['charges']['data'][0]['id']."<br>");
//            echo($pay_res['charges']['data'][0]['balance_transaction']."<br>");
//            echo($pay_res['charges']['data'][0]['receipt_url']."<br>");
            $payment_intent_id = $paymenyResponse['id'];
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
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

                    $this->PaymentGetways->updateAll(['receipt_url' => $receipt_url, 'charge_id' => $charged_id, 'transactions_id' => $lastInsertId], ['id' => $invice]);

                    $msg['status'] = 1;
                    $msg['TransId'] = $lastInsertId;
                    $msg['receipt_url'] = $receipt_url;
                    $msg['charge_id'] = $charged_id;
                    $msg['Success'] = " Successfully created transaction with Transaction ID: " . $lastInsertId . "\n";
                    $msg['ResponseCode'] = " Transaction Response Code: " . 200 . "\n";
                    $msg['MessageCode'] = " Message Code: " . 200 . "\n";
                    $msg['AuthCode'] = " Auth Code: " . 200 . "\n";
                    $msg['Description'] = " Description: The payment was successful.\n";
                    $msg['msg'] = " Description: The payment was successful.\n";
                } else {
                    $msg['error'] = 'error';
                    $msg['ErrorCode'] = " Error Code  : \n";
                    $msg['ErrorCode'] = " Error Message1 : Payment failed!\n" . $paymentStatus;
                }
            } else {
                $msg['error'] = 'error';
                $msg['ErrorCode'] = " Error Code  : \n";
                $msg['ErrorCode'] = " Error Message2 : Payment failed!\n" . $paymentStatus;
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
            $msg['ErrorCode'] = " Error Message3 : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\RateLimitException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message4 : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message5 : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\AuthenticationException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message6 : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message7 : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message8 : " . $err['message'] . "\n";
            $payment_intent_id = $e->getError()->payment_intent->id;
            $this->PaymentGetways->updateAll(['payment_intent_id' => $payment_intent_id], ['id' => $invice]);
//            return $msg;
        } catch (\Stripe\Error\Base $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];
            $msg['error'] = 'error';
            $msg['error_code'] = $e->getError()->code;
            $msg['ErrorCode'] = " Error Message9 : " . $err['message'] . "\n";
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
        // exit;
    }

    public function birthdayMail()
    {

        date_default_timezone_set('America/Chicago');

        echo date_default_timezone_get() . "<br>";

        echo 'Date' . date('Y-m-d H:i:s') . "<br>";

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

        $from = $fromMail->value;

        //        $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, 'Hit BM ' . date('Y-m-d H:i:s'), date_default_timezone_get());

        $this->loadmodel('ClientsBirthday');

        $datas = $this->ClientsBirthday->find('all')->where(["MONTH(birthday)" => date('m'), "DAY(birthday)" => date('d')])->order(['DAYOFYEAR(birthday)' => 'ASC']);

        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'BIRTHDAY_MAIL'])->first();

        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_BATCH_HELP'])->first()->value;

        $toMail = $this->Settings->find('all')->where(['name' => 'TO_EMAIL'])->first()->value;

        $sitename = SITE_NAME;

        foreach ($datas as $bth_li) {

            $email = $bth_li->email;

            $name = "";

            $name = $bth_li->name;

            if (!empty($bth_li->kid_name) && ($bth_li->kid_name != '-') && ($bth_li->profile_type == 3)) {

                $name = $bth_li->kid_name;
            }



            // echo $bth_li->id . " - " . $email . ' - ' . $name . ' - ' . $bth_li->birthday . "<br>";



            $subject = "Happy Birthday " . $name . "!";

            $this->mailLogEntry('birthdayMail', $from, $subject, $email, $emailMessage->value);
            $this->mailLogEntry('birthdayMail', $from, $subject, $toSupport, $emailMessage->value);
            $this->mailLogEntry('birthdayMail', $from, $subject, $toMail, $emailMessage->value);

            // $this->Custom->sendEmail($email, $from, $subject, $emailMessage->value);
            // $this->Custom->sendEmail($toSupport, $from, $subject, $emailMessage->value);
            // $this->Custom->sendEmail($toMail, $from, $subject, $emailMessage->value);
        }



        exit;
    }
    
    public function webhook() {
        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");

// This is your Stripe CLI webhook secret for testing your endpoint locally.
//        $endpoint_secret = 'whsec_cd34cf8ec00f66b7967ee2f963b2fbdf0cbbde6dba8d170b8db4239bae23b72d';
        $endpoint_secret = 'whsec_SqPh1rqxDynZoKSV6mu8WwGiJdckJ3nB';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                            $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }
// Handle the event


        $message = $event->type;
        switch ($event->type) {
            case 'account.updated':
//                $account = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'account.external_account.created':
//                $externalAccount = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'account.external_account.deleted':
//                $externalAccount = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'account.external_account.updated':
//                $externalAccount = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'balance.available':
//                $balance = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'billing_portal.configuration.created':
//                $configuration = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'billing_portal.configuration.updated':
//                $configuration = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'billing_portal.session.created':
//                $session = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'capability.updated':
//                $capability = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'cash_balance.funds_available':
//                $cashBalance = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.captured':
//                $charge = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.expired':
//                $charge = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.failed':
//                $charge = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.pending':
//                $charge = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.refunded':
//                $charge = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.succeeded':
//                $charge = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.updated':
//                $charge = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.dispute.closed':
//                $dispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.dispute.created':
//                $dispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.dispute.funds_reinstated':
//                $dispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.dispute.funds_withdrawn':
//                $dispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.dispute.updated':
//                $dispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'charge.refund.updated':
//                $refund = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'checkout.session.async_payment_failed':
//                $session = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'checkout.session.async_payment_succeeded':
//                $session = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'checkout.session.completed':
//                $session = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'checkout.session.expired':
//                $session = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'coupon.created':
//                $coupon = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'coupon.deleted':
//                $coupon = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'coupon.updated':
//                $coupon = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'credit_note.created':
//                $creditNote = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'credit_note.updated':
//                $creditNote = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'credit_note.voided':
//                $creditNote = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.created':
//                $customer = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.deleted':
//                $customer = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.updated':
//                $customer = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.discount.created':
//                $discount = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.discount.deleted':
//                $discount = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.discount.updated':
//                $discount = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.source.created':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.source.deleted':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.source.expiring':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.source.updated':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.subscription.created':
//                $subscription = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.subscription.deleted':
//                $subscription = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.subscription.pending_update_applied':
//                $subscription = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.subscription.pending_update_expired':
//                $subscription = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.subscription.trial_will_end':
//                $subscription = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.subscription.updated':
//                $subscription = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.tax_id.created':
//                $taxId = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.tax_id.deleted':
//                $taxId = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'customer.tax_id.updated':
//                $taxId = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'file.created':
//                $file = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'identity.verification_session.canceled':
//                $verificationSession = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'identity.verification_session.created':
//                $verificationSession = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'identity.verification_session.processing':
//                $verificationSession = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'identity.verification_session.redacted':
//                $verificationSession = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'identity.verification_session.requires_input':
//                $verificationSession = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'identity.verification_session.verified':
//                $verificationSession = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.created':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.deleted':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.finalization_failed':
//                $invoice = $event->data->object;v
            case 'invoice.finalized':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.marked_uncollectible':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.paid':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.payment_action_required':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.payment_failed':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.payment_succeeded':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.sent':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.upcoming':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.updated':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoice.voided':
//                $invoice = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoiceitem.created':
//                $invoiceitem = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoiceitem.deleted':
//                $invoiceitem = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'invoiceitem.updated':
//                $invoiceitem = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_authorization.created':
//                $issuingAuthorization = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_authorization.request':
//                $issuingAuthorization = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_authorization.updated':
//                $issuingAuthorization = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_card.created':
//                $issuingCard = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_card.updated':
//                $issuingCard = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_cardholder.created':
//                $issuingCardholder = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_cardholder.updated':
//                $issuingCardholder = $event->data->object;v
                $message .= json_encode($event->data->object);
            case 'issuing_dispute.closed':
//                $issuingDispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_dispute.created':
//                $issuingDispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_dispute.funds_reinstated':
//                $issuingDispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_dispute.submitted':
//                $issuingDispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_dispute.updated':
//                $issuingDispute = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_transaction.created':
//                $issuingTransaction = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'issuing_transaction.updated':
//                $issuingTransaction = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'mandate.updated':
//                $mandate = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'order.created':
//                $order = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'order.payment_failed':
//                $order = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'order.payment_succeeded':
//                $order = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'order.updated':
//                $order = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'order_return.created':
//                $orderReturn = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_intent.amount_capturable_updated':
//                $paymentIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_intent.canceled':
//                $paymentIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_intent.created':
//                $paymentIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_intent.partially_funded':
//                $paymentIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_intent.payment_failed':
//                $paymentIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_intent.processing':
//                $paymentIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_intent.requires_action':
//                $paymentIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_intent.succeeded':
//                $paymentIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_link.created':
//                $paymentLink = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_link.updated':
//                $paymentLink = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_method.attached':
//                $paymentMethod = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_method.automatically_updated':
//                $paymentMethod = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_method.detached':
//                $paymentMethod = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payment_method.updated':
//                $paymentMethod = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payout.canceled':
//                $payout = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payout.created':
//                $payout = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payout.failed':
//                $payout = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payout.paid':
//                $payout = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'payout.updated':
//                $payout = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'person.created':
//                $person = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'person.deleted':
//                $person = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'person.updated':
//                $person = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'plan.created':
//                $plan = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'plan.deleted':
//                $plan = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'plan.updated':
//                $plan = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'price.created':
//                $price = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'price.deleted':
//                $price = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'price.updated':
//                $price = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'product.created':
//                $product = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'product.deleted':
//                $product = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'product.updated':
//                $product = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'promotion_code.created':
//                $promotionCode = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'promotion_code.updated':
//                $promotionCode = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'quote.accepted':
//                $quote = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'quote.canceled':
//                $quote = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'quote.created':
//                $quote = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'quote.finalized':
//                $quote = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'radar.early_fraud_warning.created':
//                $earlyFraudWarning = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'radar.early_fraud_warning.updated':
//                $earlyFraudWarning = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'recipient.created':
//                $recipient = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'recipient.deleted':
//                $recipient = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'recipient.updated':
//                $recipient = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'reporting.report_run.failed':
//                $reportRun = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'reporting.report_run.succeeded':
//                $reportRun = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'reporting.report_type.updated':
//                $reportType = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'review.closed':
//                $review = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'review.opened':
//                $review = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'setup_intent.canceled':
//                $setupIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'setup_intent.created':
//                $setupIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'setup_intent.requires_action':
//                $setupIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'setup_intent.setup_failed':
//                $setupIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'setup_intent.succeeded':
//                $setupIntent = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'sigma.scheduled_query_run.created':
//                $scheduledQueryRun = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'sku.created':
//                $sku = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'sku.deleted':
//                $sku = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'sku.updated':
//                $sku = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'source.canceled':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'source.chargeable':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'source.failed':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'source.mandate_notification':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'source.refund_attributes_required':
//                $source = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'source.transaction.created':
//                $transaction = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'source.transaction.updated':
//                $transaction = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'subscription_schedule.aborted':
//                $subscriptionSchedule = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'subscription_schedule.canceled':
//                $subscriptionSchedule = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'subscription_schedule.completed':
//                $subscriptionSchedule = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'subscription_schedule.created':
//                $subscriptionSchedule = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'subscription_schedule.expiring':
//                $subscriptionSchedule = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'subscription_schedule.released':
//                $subscriptionSchedule = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'subscription_schedule.updated':
//                $subscriptionSchedule = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'tax_rate.created':
//                $taxRate = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'tax_rate.updated':
//                $taxRate = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'terminal.reader.action_failed':
//                $reader = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'terminal.reader.action_succeeded':
//                $reader = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'test_helpers.test_clock.advancing':
//                $testClock = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'test_helpers.test_clock.created':
//                $testClock = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'test_helpers.test_clock.deleted':
//                $testClock = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'test_helpers.test_clock.internal_failure':
//                $testClock = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'test_helpers.test_clock.ready':
//                $testClock = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'topup.canceled':
//                $topup = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'topup.created':
//                $topup = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'topup.failed':
//                $topup = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'topup.reversed':
//                $topup = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'topup.succeeded':
//                $topup = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'transfer.created':
//                $transfer = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'transfer.failed':
//                $transfer = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'transfer.paid':
//                $transfer = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'transfer.reversed':
//                $transfer = $event->data->object;
                $message .= json_encode($event->data->object);
            case 'transfer.updated':
//                $transfer = $event->data->object;
                $message .= json_encode($event->data->object);
            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
                $message .= json_encode($event->data->object);
        }

        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $from = $fromMail->value;
        // $subject = 'Stripe event....'.$event->type;
        // $to = 'debmicrofinet@gmail.com';
        // $this->Custom->sendEmail($to, $from, $subject, $message);

        echo json_encode(true);
        http_response_code(200);
        exit;
    }

    public function checkStripPay() {

        $arr_user_info = [
            'card_number' => "5232220005142750",
            'exp_date' => "06-2021",
            'exp_month' => "06",
            'exp_year' => "2021",
            'card_code' => "654",
            'product' => 'Test Plugin',
            'first_name' => "Sukhendu Mukherjee",
            'last_name' => "Sukhendu Mukherjee",
            'address' => "5619 Carta Valley Ln, Richmond",
            'city' => "Sugarland",
            'state' => "Texas",
            'zip' => " 	77469",
            'country' => "United states",
            'email' => "debmicrofinet@gmail.com",
            'amount' => 1,
            'invice' => "#0101010101",
            'refId' => "#0101010101",
            'companyName' => 'Drapefit',
        ];
//                    $message = $this->authorizeCreditCard($arr_user_info);

        $message = $this->testStripeApiPay($arr_user_info);
        echo "<pre>";
        print_r($message);
        echo "</pre>";
        exit;
    }

    public function testStripeApiPay($arr_data = []) {
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
            'description' => $first_name . ' subscription automention created',
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
            try {
                $stripe->customers->update($customer->id);
            } catch (Exception $e) {
                echo "No response returned \n";
                $msg['error'] = 'error';
                return $msg;
            }



            $payment_init = $stripe->paymentIntents->create([
                'amount' => $amount * 100,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'customer' => $customer->id,
                'payment_method' => $payment_methode->id,
                'confirm' => true,
                'description' => $first_name . ' Subscription automention Payment',
                'metadata' => array(
                    'order_id' => $ord_idd
                )
            ]);

            $pay_res = $payment_init->jsonSerialize();
//            echo($pay_res['charges']['data'][0]['id']."<br>");
//            echo($pay_res['charges']['data'][0]['balance_transaction']."<br>");
//            echo($pay_res['charges']['data'][0]['receipt_url']."<br>");

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
    
    public function productAutoCheckout()
    {

        //        echo date_default_timezone_get();

        echo date('Y-m-d H:m:s A');
        $now_date = date('Y-m-d');

        //        exit;

        $payment_list = $this->Products->find('all')->where(['auto_checkout_date' => $now_date, 'is_complete_by_admin' => 0])->group(['payment_id', 'auto_checkout_date']);

        //        echo "<pre>";
        //        print_r($payment_list);
        //        echo "</pre>";

        $all_payment_ids = (!empty($payment_list->count())) ? Hash::extract($payment_list->toArray(), '{n}.payment_id') : [];

        echo "<pre>";
        print_r($all_payment_ids);
        echo "</pre>";
        //        exit;

        if (!empty($all_payment_ids)) {
            $payment_details = $this->PaymentGetways->find('all')->where(['id IN' => $all_payment_ids, 'status' => 1, 'payment_type' => 1, 'work_status' => 1]);
            foreach ($payment_details as $pay_li) {
                //                        echo "<pre>";
                //                        print_r($pay_li);
                //                        echo "</pre>";
                //                        exit;
                $payment_details = $pay_li;
                $payment_id = $payment_details->id;
                $user_id = $pay_li->user_id;
                $kid_id = $pay_li->kid_id;
                $products = $this->Products->find('all')->where(['auto_checkout_date' => $now_date, 'payment_id' => $payment_id, 'is_complete_by_admin' => 0]);
                $current_amount = $total_amount = 0;
                if ($products->count() > 0) {
                    foreach ($products as $prd_li) {
                        //                    echo "<pre>";
                        //                    print_r($prd_li);
                        //                    echo "</pre>";
                        //                    exit;
                        //                        var_dump(($prd_li->keep_status == 1) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1));
                        if (($prd_li->keep_status == 0) || ($prd_li->keep_status == 99)) {
                            $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                        }
                        if ((($prd_li->keep_status == 3) || ($prd_li->keep_status == 0) || ($prd_li->keep_status == 99)) && ($prd_li->checkedout != 'Y')) {
                            $current_amount += $prd_li->sell_price;
                        }

                        if (($prd_li->keep_status == 2) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1)) {

                            if (empty($prd_li->product_exchange_date) || ($prd_li->product_exchange_date == '0000-00-00')) {
                                $current_amount += $prd_li->sell_price;

                                $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                            }
                        }

                        if (($prd_li->keep_status == 1) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1)) {

                            if ($prd_li->store_return_status != 'Y') {

                                $current_amount += $prd_li->sell_price;

                                $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                            }
                        }
                    }

                    //                exit;

                    $total_amount = $current_amount;

                    $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $user_id])->first();

                    $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();

                    if (empty($payment_data)) {

                        $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id])->first();
                    }



                    $lastPymentg = $this->PaymentGetways->newEntity();

                    $table1['user_id'] = $user_id;

                    $table1['kid_id'] = $kid_id;

                    $table1['emp_id'] = $payment_details->emp_id;

                    $table1['inv_id'] = $payment_details->inv_id;

                    $table1['qa_id'] = $payment_details->qa_id;

                    $table1['support_id'] = $payment_details->support_id;

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
                    } else {
                        $shipping_address_data = $this->ShippingAddress->find('all')->where(['user_id' => $user_id])->first();
                    }

                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();

                    if (empty($billingAddress)) {
                        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id])->first();
                    }

                    $productCCount = $this->Products->find('all')->where(['payment_id' => $payment_id, 'is_altnative_product' => 0])->Count();

                    $exCCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $payment_id, 'keep_status' => 3])->Count();

                    if ($exCCountKeeps != 0) {
                        if ($productCCount == $exCCountKeeps) {
                            $allKeepsProducts = 1;
                            $percentage = 25;
                        } else {
                            $allKeepsProducts = 2;
                            $percentage = 0;
                        }
                        $discount = 0;
                        $subTotal = 0;
                        $stylist_picks_subtotal = $total_amount;
                        if ($allKeepsProducts == 1) {
                            if ($total_amount > 0) {

                                $percentage = 25;

                                $discount = ($percentage / 100) * $total_amount;

                                $discount = sprintf('%.2f', $discount);

                                $subTotal = $total_amount - $discount;

                                $total_amount = $subTotal;
                            }
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
                            'invice' => $lastPymentg->id,
                            'refId' => 32,
                            'companyName' => 'Drapefit',
                        ];

                        if ($total_amount > 0) {

                            $message = $this->stripeApiPay($arr_user_info);
                        } else {

                            $message = [];

                            $message['status'] = '1';
                        }



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

                            $this->PaymentGetways->updateAll(['status' => 1, 'price' => $total_amount], ['id' => $lastPymentg->id]);

                            $payment_check = $this->Payments->find('all')->where(['payment_id' => $lastPymentg->id])->order(['id' => 'DESC'])->first();

                            $payment = $this->Payments->newEntity();

                            if (!empty($payment_check)) {

                                $table['id'] = $payment_check->id;
                            }

                            $table['user_id'] = $user_id;

                            $table['payment_id'] = $lastPymentg->id;

                            $table['sub_toal'] = $total_amount - $sales_tx;

                            $table['sales_tax'] = $sales_tx;

                            $table['stylist_picks_subtotal'] = $stylist_picks_subtotal;

                            $table['keep_all_discount'] = $discount;

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

                                $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 3, 'Products.auto_checkout_date' => $now_date]);

                                $kidcount = $prData->count();
                            } else {

                                $profileType = $payment_details->profile_type;

                                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                                $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 3, 'Products.auto_checkout_date' => $now_date]);
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
                                        echo "<pre>";
                                        print_r($newDtRow);
                                        echo "</pre>";
                                        $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Customer Keep'], ['id' => $dataMail->inv_product_id]);
                                    }
                                }



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

                                    $this->Products->updateAll(['checkedout' => 'Y', 'is_complete_by_admin' => 1, 'is_complete' => 1], ['id' => $dataMail->id]);
                                }

                                echo "updated ...";

                                $this->Products->updateAll(['is_payment_fail' => 0], ['id' => $dataMail->id]);

                                $i++;
                            }







                            //                echo "<pre>";
                            //                print_r($prData->count());
                            //                print_r($prData);
                            //                print_r($productData);
                            //                echo "</pre>";
                            //                exit;

                            $getParentDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();

                            $offerData = '';

                            $gtotal = $total_amount - $sales_tx;

                            $sitename = HTTP_ROOT;

                            $name = $getParentDetails->name;

                            $to = $current_usr_dtl_strip->email; //$getUsersDetails->email;

                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                            $from = $fromMail->value;

                            $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();

                            //                $subject = $emailMessage1->display . ' #DFPYMID' . $payment_id;

                            $subject = 'Auto checkout processed #DFPYMID' . $payment_id;

                            $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $stylist_picks_subtotal, $total_amount, $payment_details->count, $discount, $refundamount = '', $gtotal, $offerData, $sales_tx, '#DFPYMID' . $payment_id);


                            $this->mailLogEntry('productAutoCheckout', $from, $subject, $to, $email_message);
                            // $this->Custom->sendEmail($to, $from, $subject, $email_message);

                            // $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);

                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                            $this->mailLogEntry('productAutoCheckout', $from, $subject, $toSupport, $email_message);
                            // $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

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

                                        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Previous_Worklist_queue')], ['id' => $payment_id]);

                                        $this->PaymentGetways->updateAll(['status' => 1, 'work_status' => 2], ['id' => $payment_id]);

                                        if (!empty($kid_id)) {

                                            $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);

                                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                                        } else {

                                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);

                                            $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                                        }
                                    }
                                }
                            }



                            if ($total_amount > 0) {
                                $this->Products->updateAll(['auto_checkout_date' => ''], ['payment_id' => $payment_id, 'auto_checkout_date' => $now_date]);

                                echo ("<br> " . 'Payment completed. ' . $payment_id);
                            }
                        } else {

                            $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Support_Tab_Recovery_queue')], ['id' => $payment_id]);

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

                            $products = $this->Products->find('all')->where(['auto_checkout_date' => $now_date, 'payment_id' => $payment_id, 'is_complete_by_admin' => 0]);
                            //                    echo "<br> Decli : " . $products->count() . "<br>";

                            foreach ($products as $dataMail) {

                                if (($dataMail->keep_status == 3) /* && ($dataMail->is_stylist != 1) */) {
                                    if ($dataMail->is_complete != 1) {
                                        $this->Products->updateAll(['keep_status' => 99, 'checkedout' => 'N', 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                        //                                echo $dataMail->id . " - " . $payment_id . "<br>";
                                        //                                echo "<br> sts : " . $dataMail->keep_status . "<br>";
                                        //                                $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);
                                    }
                                    $keep = 'Keeps';
                                } elseif ($dataMail->keep_status == 2) {
                                    $keep = 'Exchange';

                                    //                            $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);

                                    $this->Products->updateAll(['keep_status' => 99, 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                    //                            echo $dataMail->id . " - " . $payment_id . "<br>";
                                } elseif ($dataMail->keep_status == 1) {
                                    $keep = 'Return';

                                    //                            $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);

                                    $this->Products->updateAll(['keep_status' => 99, 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                    //                            echo $dataMail->id . " - " . $payment_id . "<br>";
                                }
                            }

                            //                    exit;

                            if ($payment_details->kid_id != 0) {

                                $profileType = 3;

                                $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);

                                $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 99, 'Products.auto_checkout_date' => $now_date]);

                                $kidcount = $prData->count();
                            } else {
                                $profileType = $payment_details->profile_type;

                                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                                $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 99, 'Products.auto_checkout_date' => $now_date]);
                            }
                            $productData = '';
                            $i = 1;
                            $current_amount = 0;
                            foreach ($prData as $dataMail) {
                                $priceMail = $dataMail->sell_price;
                                $current_amount += $dataMail->sell_price;
                                $keep = 'Keeps';
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
                                $i++;
                            }

                            //                echo "<pre>";
                            //                print_r($prData->count());
                            ////                print_r($prData);
                            //                print_r($payment_id);
                            //                print_r($productData);
                            //                echo "</pre>";
                            //                exit;
                            $getParentDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();

                            $stylist_picks_subtotal = $current_amount;

                            if ($allKeepsProducts == 1) {

                                if ($stylist_picks_subtotal > 0) {

                                    $percentage = 25;

                                    $discount = ($percentage / 100) * $stylist_picks_subtotal;

                                    $discount = sprintf('%.2f', $discount);
                                    $current_amount -= $discount;
                                }
                            }

                            if ($sales_tx_required == "YES") {

                                if ($current_amount > 0) {

                                    $sales_tx = sprintf('%.2f', $current_amount * $sales_tx_rt);

                                    $current_amount += $sales_tx;
                                }
                            }

                            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $payment_details->user_id, 'is_billing' => 1])->first();
                            if (empty($billingAddress)) {
                                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $payment_details->user_id])->first();
                            }
                            $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Support_Tab_Recovery_queue')], ['id' => $payment_id]);
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


                            $offerData = '';
                            $total_amount = $current_amount;

                            $gtotal = $total_amount - $sales_tx;

                            $sitename = HTTP_ROOT;

                            $name = $getParentDetails->name;

                            $to = $current_usr_dtl_strip->email; //$getUsersDetails->email;

                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                            $from = $fromMail->value;

                            $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();

                            //                $subject = $emailMessage1->display . ' #DFPYMID' . $payment_id;

                            $subject = 'Auto checkout payment failed  #DFPYMID' . $payment_id;

                            $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $stylist_picks_subtotal, $total_amount, $payment_details->count, $discount, $refundamount = '', $gtotal, $offerData, $sales_tx, '#DFPYMID' . $payment_id);

                            // $this->Custom->sendEmail($to, $from, $subject, $email_message);
                            //                            $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);

                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                            $this->mailLogEntry('productAutoCheckout', $from, $subject, $toSupport, $email_message);
                            // $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

                            $chked_declin_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'keep_status' => 99])->count();

                            if (!empty($chked_declin_cnt)) {

                                //                                if (!empty($kid_id)) {
                                //
                                //                                    $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $kid_id]);
                                //                                } else {
                                //
                                //                                    $this->Users->updateAll(['is_redirect' => 4], ['id' => $user_id]);
                                //                                }
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

                            echo ("<br> " . 'Product sent to declined list. ' . $payment_id);
                        }
                    }
                }
            }
        } else {

            echo "<br> " . "No product to process for " . date('Y-m-d');
        }

        exit;
    }

    public function productBatchAutoCheckout($type = null)
    {

        //if $type==null :- fix date 
        //if $type==range :- date range
        //
        //        echo date_default_timezone_get();
        //        echo date('Y-m-d H:m:s A');
        //        exit;

        if (empty($type)) {

            $date = date('Y-m-d', strtotime(date('Y-m-d') . ' - 30 days'));

            $payment_list = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'work_status' => 1, 'created_dt' => date('Y-m-d')]);

            //            $payment_list = $this->Products->find('all')->where(['shipping_date' => date('Y-m-d')])->group(['payment_id', 'shipping_date']);
        } else {

            if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {

                $start_date = date('Y-m-d', strtotime('-30 days', strtotime($_GET['start_date'])));

                $end_date = date('Y-m-d', strtotime('-30 days', strtotime($_GET['end_date'])));

                //                $payment_list = $this->Products->find('all')->group(['payment_id', 'shipping_date'])->where([
                //                            'Products.shipping_date BETWEEN :start AND :end'
                //                        ])
                //                        ->bind(':start', $start_date, 'date')
                //                        ->bind(':end', $end_date, 'date');



                $payment_list = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'work_status' => 1])->where([
                    'PaymentGetways.created_dt BETWEEN :start AND :end'
                ])
                    ->bind(':start', $start_date, 'date')
                    ->bind(':end', $end_date, 'date');

                echo $start_date . "<Br>" . $end_date . "<br>";
            } else {

                echo "start date and end date in url as <b>?start_date=YYYY-MM-DD&end_date=YYYY-MM-DD</b>";

                exit;
            }
        }




        // echo "<pre>";
        // print_r($payment_list);
        // echo "</pre>";
        // exit;

        $all_payment_ids = (!empty($payment_list->count())) ? Hash::extract($payment_list->toArray(), '{n}.id') : [];

        //        echo "<pre>";
        //        print_r($all_payment_ids);
        //        echo "</pre>";
        //        exit;

        if (!empty($all_payment_ids)) {
            $payment_details = $this->PaymentGetways->find('all')->where(['id IN' => $all_payment_ids, 'status' => 1, 'payment_type' => 1, 'work_status' => 1]);
            foreach ($payment_details as $pay_li) {
                //                        echo "<pre>";
                //                        print_r($pay_li);
                //                        echo "</pre>";
                //                        exit;
                $payment_details = $pay_li;
                $payment_id = $payment_details->id;
                $user_id = $pay_li->user_id;
                $kid_id = $pay_li->kid_id;
                $products = $this->Products->find('all')->where(['auto_checkout_date' => $now_date, 'payment_id' => $payment_id, 'is_complete_by_admin' => 0]);
                $current_amount = $total_amount = 0;
                if ($products->count() > 0) {
                    foreach ($products as $prd_li) {
                        //                    echo "<pre>";
                        //                    print_r($prd_li);
                        //                    echo "</pre>";
                        //                    exit;
                        //                        var_dump(($prd_li->keep_status == 1) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1));
                        if (($prd_li->keep_status == 0) || ($prd_li->keep_status == 99)) {
                            $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                        }
                        if ((($prd_li->keep_status == 3) || ($prd_li->keep_status == 0) || ($prd_li->keep_status == 99)) && ($prd_li->checkedout != 'Y')) {
                            $current_amount += $prd_li->sell_price;
                        }

                        if (($prd_li->keep_status == 2) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1)) {

                            if (empty($prd_li->product_exchange_date) || ($prd_li->product_exchange_date == '0000-00-00')) {
                                $current_amount += $prd_li->sell_price;

                                $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                            }
                        }

                        if (($prd_li->keep_status == 1) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1)) {

                            if ($prd_li->store_return_status != 'Y') {

                                $current_amount += $prd_li->sell_price;

                                $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                            }
                        }
                    }

                    //                exit;

                    $total_amount = $current_amount;

                    $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $user_id])->first();

                    $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();

                    if (empty($payment_data)) {

                        $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id])->first();
                    }



                    $lastPymentg = $this->PaymentGetways->newEntity();

                    $table1['user_id'] = $user_id;

                    $table1['kid_id'] = $kid_id;

                    $table1['emp_id'] = $payment_details->emp_id;

                    $table1['inv_id'] = $payment_details->inv_id;

                    $table1['qa_id'] = $payment_details->qa_id;

                    $table1['support_id'] = $payment_details->support_id;

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
                    } else {
                        $shipping_address_data = $this->ShippingAddress->find('all')->where(['user_id' => $user_id])->first();
                    }

                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();

                    if (empty($billingAddress)) {
                        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id])->first();
                    }

                    $productCCount = $this->Products->find('all')->where(['payment_id' => $payment_id, 'is_altnative_product' => 0])->Count();

                    $exCCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $payment_id, 'keep_status' => 3])->Count();

                    if ($exCCountKeeps != 0) {
                        if ($productCCount == $exCCountKeeps) {
                            $allKeepsProducts = 1;
                            $percentage = 25;
                        } else {
                            $allKeepsProducts = 2;
                            $percentage = 0;
                        }
                        $discount = 0;
                        $subTotal = 0;
                        $stylist_picks_subtotal = $total_amount;
                        if ($allKeepsProducts == 1) {
                            if ($total_amount > 0) {

                                $percentage = 25;

                                $discount = ($percentage / 100) * $total_amount;

                                $discount = sprintf('%.2f', $discount);

                                $subTotal = $total_amount - $discount;

                                $total_amount = $subTotal;
                            }
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
                            'invice' => $lastPymentg->id,
                            'refId' => 32,
                            'companyName' => 'Drapefit',
                        ];

                        if ($total_amount > 0) {

                            $message = $this->stripeApiPay($arr_user_info);
                        } else {

                            $message = [];

                            $message['status'] = '1';
                        }



                        if (@$message['status'] == '1') {

                            $this->PaymentGetways->updateAll(['status' => 1, 'price' => $total_amount], ['id' => $lastPymentg->id]);

                            $payment_check = $this->Payments->find('all')->where(['payment_id' => $lastPymentg->id])->order(['id' => 'DESC'])->first();

                            $payment = $this->Payments->newEntity();

                            if (!empty($payment_check)) {

                                $table['id'] = $payment_check->id;
                            }

                            $table['user_id'] = $user_id;

                            $table['payment_id'] = $lastPymentg->id;

                            $table['sub_toal'] = $total_amount - $sales_tx;

                            $table['sales_tax'] = $sales_tx;

                            $table['stylist_picks_subtotal'] = $stylist_picks_subtotal;

                            $table['keep_all_discount'] = $discount;

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

                                $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 3, 'Products.auto_checkout_date' => $now_date]);

                                $kidcount = $prData->count();
                            } else {

                                $profileType = $payment_details->profile_type;

                                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                                $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 3, 'Products.auto_checkout_date' => $now_date]);
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
                                }



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

                                    $this->Products->updateAll(['checkedout' => 'Y', 'is_complete_by_admin' => 1, 'is_complete' => 1], ['id' => $dataMail->id]);
                                }

                                echo "updated ...";

                                $this->Products->updateAll(['is_payment_fail' => 0], ['id' => $dataMail->id]);

                                $i++;
                            }







                            //                echo "<pre>";
                            //                print_r($prData->count());
                            //                print_r($prData);
                            //                print_r($productData);
                            //                echo "</pre>";
                            //                exit;

                            $getParentDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();

                            $offerData = '';

                            $gtotal = $total_amount - $sales_tx;

                            $sitename = HTTP_ROOT;

                            $name = $getParentDetails->name;

                            $to = $current_usr_dtl_strip->email; //$getUsersDetails->email;

                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                            $from = $fromMail->value;

                            $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();

                            //                $subject = $emailMessage1->display . ' #DFPYMID' . $payment_id;

                            $subject = 'Auto checkout processed #DFPYMID' . $payment_id;

                            $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $stylist_picks_subtotal, $total_amount, $payment_details->count, $discount, $refundamount = '', $gtotal, $offerData, $sales_tx, '#DFPYMID' . $payment_id);

                            // $this->Custom->sendEmail($to, $from, $subject, $email_message);
                            $this->mailLogEntry('productAutoCheckout', $from, $subject, $to, $email_message);

                            // $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);

                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                            $this->mailLogEntry('productAutoCheckout', $from, $subject, $toSupport, $email_message);
                            // $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

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

                                        $this->PaymentGetways->updateAll(['status' => 1, 'work_status' => 2], ['id' => $payment_id]);

                                        if (!empty($kid_id)) {

                                            $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);

                                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                                        } else {

                                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);

                                            $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                                        }
                                    }
                                }
                            }



                            if ($total_amount > 0) {
                                $this->Products->updateAll(['auto_checkout_date' => ''], ['payment_id' => $payment_id, 'auto_checkout_date' => $now_date]);

                                echo ("<br> " . 'Payment completed. ' . $payment_id);
                            }
                        } else {

                            $products = $this->Products->find('all')->where(['auto_checkout_date' => $now_date, 'payment_id' => $payment_id, 'is_complete_by_admin' => 0]);
                            //                    echo "<br> Decli : " . $products->count() . "<br>";

                            foreach ($products as $dataMail) {

                                if (($dataMail->keep_status == 3) /* && ($dataMail->is_stylist != 1) */) {
                                    if ($dataMail->is_complete != 1) {
                                        $this->Products->updateAll(['keep_status' => 99, 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                        //                                echo $dataMail->id . " - " . $payment_id . "<br>";
                                        //                                echo "<br> sts : " . $dataMail->keep_status . "<br>";
                                        //                                $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);
                                    }
                                    $keep = 'Keeps';
                                } elseif ($dataMail->keep_status == 2) {
                                    $keep = 'Exchange';

                                    //                            $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);

                                    $this->Products->updateAll(['keep_status' => 99, 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                    //                            echo $dataMail->id . " - " . $payment_id . "<br>";
                                } elseif ($dataMail->keep_status == 1) {
                                    $keep = 'Return';

                                    //                            $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);

                                    $this->Products->updateAll(['keep_status' => 99, 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                    //                            echo $dataMail->id . " - " . $payment_id . "<br>";
                                }
                            }

                            //                    exit;

                            if ($payment_details->kid_id != 0) {

                                $profileType = 3;

                                $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);

                                $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 99, 'Products.auto_checkout_date' => $now_date]);

                                $kidcount = $prData->count();
                            } else {
                                $profileType = $payment_details->profile_type;

                                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                                $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 99, 'Products.auto_checkout_date' => $now_date]);
                            }
                            $productData = '';
                            $i = 1;
                            $current_amount = 0;
                            foreach ($prData as $dataMail) {
                                $priceMail = $dataMail->sell_price;
                                $current_amount += $dataMail->sell_price;
                                $keep = 'Keeps';
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
                                $i++;
                            }

                            //                echo "<pre>";
                            //                print_r($prData->count());
                            ////                print_r($prData);
                            //                print_r($payment_id);
                            //                print_r($productData);
                            //                echo "</pre>";
                            //                exit;
                            $getParentDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();

                            $stylist_picks_subtotal = $current_amount;

                            if ($allKeepsProducts == 1) {

                                if ($stylist_picks_subtotal > 0) {

                                    $percentage = 25;

                                    $discount = ($percentage / 100) * $stylist_picks_subtotal;

                                    $discount = sprintf('%.2f', $discount);
                                    $current_amount -= $discount;
                                }
                            }

                            if ($sales_tx_required == "YES") {

                                if ($current_amount > 0) {

                                    $sales_tx = sprintf('%.2f', $current_amount * $sales_tx_rt);

                                    $current_amount += $sales_tx;
                                }
                            }


                            $offerData = '';
                            $total_amount = $current_amount;

                            $gtotal = $total_amount - $sales_tx;

                            $sitename = HTTP_ROOT;

                            $name = $getParentDetails->name;

                            $to = $current_usr_dtl_strip->email; //$getUsersDetails->email;

                            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                            $from = $fromMail->value;

                            $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();

                            //                $subject = $emailMessage1->display . ' #DFPYMID' . $payment_id;

                            $subject = 'Auto checkout payment failed  #DFPYMID' . $payment_id;

                            $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $stylist_picks_subtotal, $total_amount, $payment_details->count, $discount, $refundamount = '', $gtotal, $offerData, $sales_tx, '#DFPYMID' . $payment_id);

                            // $this->Custom->sendEmail($to, $from, $subject, $email_message);

                            // $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);

                            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                            $this->mailLogEntry('productAutoCheckout', $from, $subject, $toSupport, $email_message);
                            // $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

                            $chked_declin_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'keep_status' => 99])->count();

                            if (!empty($chked_declin_cnt)) {

                                if (!empty($kid_id)) {

                                    $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $kid_id]);
                                } else {

                                    $this->Users->updateAll(['is_redirect' => 4], ['id' => $user_id]);
                                }
                            }

                            echo ("<br> " . 'Product sent to declined list. ' . $payment_id);
                        }
                    }
                }
            }
        } else {

            echo "<br> " . "No product to process for " . date('Y-m-d');
        }

        exit;
    }
    
    public function productWeeklyAutoCheckout() {
        $this->loadModel('CronjobWeeklyCheckout');
        date_default_timezone_set('America/Chicago');
        $this->CronjobWeeklyCheckout->deleteAll(['insert_date < ' => date('Y-m-d', strtotime(date('Y-m-d') . ' -30 days'))]);
        echo date_default_timezone_get();
        $date = date('Y-m-d'); //date('Y-m-d', strtotime(date('Y-m-d') . ' - 2 days'));
        echo "<br>" . $date;
        $now_date = $date;
        $day_name = date('l', strtotime($date));
        echo " - " . $day_name;

        //        exit;
        //   if (in_array($day_name, ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])) {
        if (in_array($day_name, ['Monday', 'Friday', 'Saturday', 'Sunday'])) {

            $payment_list = $this->Products->find('all')->where(['auto_checkout_date <=' => $now_date, /* 'is_complete_by_admin' => 0 */ 'is_payment_fail' => 1])->group(['payment_id', 'auto_checkout_date'])->order(['payment_id' => 'DESC']);

            // echo "<pre>";
            // print_r($payment_list);
            // echo "</pre>";
            // exit;

            $all_payment_ids = (!empty($payment_list->count())) ? Hash::extract($payment_list->toArray(), '{n}.payment_id') : [];

            // echo "<pre>";
            // print_r($all_payment_ids);
            // echo "</pre>";
            // exit;

            if (!empty($all_payment_ids)) {
                $payment_details = $this->PaymentGetways->find('all')->where(['id IN' => $all_payment_ids, 'status' => 1, 'payment_type' => 1, 'work_status' => 1])->order(['id' => 'DESC']);

                $all_ff_payment_ids = (!empty($payment_details->count())) ? Hash::extract($payment_details->toArray(), '{n}.id') : [];

                //                                echo "<pre>";
                //                                print_r($all_ff_payment_ids);
                //                                echo "</pre>";
                //                                 exit;

                $current_date = date('Y-m-d');
                foreach ($payment_details as $kyx => $pay_li) {
                    $newArrx = [];
                    $newArrx['payment_id'] = $pay_li->id;
                    $newArrx['insert_date'] = $current_date;
                    $check_exit_or_not = $this->CronjobWeeklyCheckout->find('all')->where(['payment_id' => $pay_li->id, 'insert_date' => $current_date])->count();
                    if ($check_exit_or_not == 0) {
                        $newDtRow = $this->CronjobWeeklyCheckout->newEntity();
                        $newDtRow = $this->CronjobWeeklyCheckout->patchEntity($newDtRow, $newArrx);
                        $this->CronjobWeeklyCheckout->save($newDtRow);
                    }
                }
                // exit;
            } else {

                echo "<br> " . "No product to process for " . $date;
            }
        } else {
            echo '<br>Only run on ' . implode(', ', ['Monday', 'Friday', 'Saturday']);
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
        if($batch_name='autocheckoutmail'){
            $newDtRow = $this->EmailLogs->newEntity();
            $newDtRow = $this->EmailLogs->patchEntity($newDtRow, $newLogArr);
            $this->EmailLogs->save($newDtRow);
            return true;
        }

        $chk = $this->EmailLogs->find('all')->where(['subject'=>$subject,'to_email'=>$to_email, 'created_on LIKE'=>'%'.date('Y-m-d').'%'])->count();
        if(($chk<1)){
            $newDtRow = $this->EmailLogs->newEntity();
            $newDtRow = $this->EmailLogs->patchEntity($newDtRow, $newLogArr);
            $this->EmailLogs->save($newDtRow);
        }

        return true;
    }
    
    public function cronMailSent()
    {
        $this->loadModel('EmailLogs');
        $email_list = $this->EmailLogs->find('all')->where(['status' => 2])->limit(30);
        foreach ($email_list as $eml) {
            if ($this->Custom->sendEmail($eml->to_email, $eml->frm, $eml->subject, $eml->msg)) {
                $this->EmailLogs->updateAll(['status' => 1], ['id' => $eml->id]);
            } else {
                $this->EmailLogs->updateAll(['status' => 3], ['id' => $eml->id]);
            }
        }
        exit;
    }
    
    public function productWeeklyAutoCheckoutProcess()
    {        
        $this->loadModel('CronjobWeeklyCheckout');        
        date_default_timezone_set('America/Chicago');
        
        echo date_default_timezone_get();
        $date = date('Y-m-d'); //date('Y-m-d', strtotime(date('Y-m-d') . ' - 2 days'));
        echo "<br>" . $date;
        $now_date = $date;
        $day_name = date('l', strtotime($date));
        echo " - " . $day_name;
        
        $check_payments = $this->CronjobWeeklyCheckout->find('all')->where(['status'=>0])->limit(15);                 
                if($check_payments->count() > 0){
                    foreach ($check_payments as $kyx => $pay_li_data) {
                        $pay_li = $this->PaymentGetways->find('all')->where(['id' => $pay_li_data->payment_id])->first();
                        $check_pmt = $this->CronjobWeeklyCheckout->find('all')->where(['insert_date'=>$current_date, 'payment_id'=> $pay_li_data->payment_id])->first();   
                        if ($check_pmt->status == 0) {
                            echo "<pre>";
                            print_r(++$kyx . ' : ' . $pay_li->id);
                            echo "</pre>";
                            
                            $payment_details = $pay_li;
                            $payment_id = $pay_li->id;
                            $user_id = $pay_li->user_id;
                            $kid_id = $pay_li->kid_id;
                            $products = $this->Products->find('all')->where(['auto_checkout_date  <=' => $now_date, 'payment_id' => $payment_id, /* 'is_complete_by_admin' => 0 */ 'is_payment_fail' => 1]);

                            // echo "<pre>";
                            // print_r(++$kyx.' : '.$pay_li->id);
                             echo "<br>prd cnt : ".$products->count().'<br>';
                            // echo "</pre>";
                            // exit;
                            // continue;
                            $current_amount = $total_amount = 0;
                            if ($products->count() > 0) {
                                foreach ($products as $kyr => $prd_li) {
                                    //                    echo "<pre>";
                                    // print_r(++$kyr.' : '.$prd_li->id);
                                    //                    echo "</pre>";
                                    //                    exit;
                                    //var_dump(($prd_li->keep_status == 1) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1));
                                    if (($prd_li->keep_status == 0) || ($prd_li->keep_status == 99)) {
                                        $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                                    }
                                    if ((($prd_li->keep_status == 3) || ($prd_li->keep_status == 0) || ($prd_li->keep_status == 99)) && ($prd_li->checkedout != 'Y')) {
                                        $current_amount += $prd_li->sell_price;
                                    }

                                    if (($prd_li->keep_status == 2) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1)) {

                                        if (empty($prd_li->product_exchange_date) || ($prd_li->product_exchange_date == '0000-00-00')) {
                                            $current_amount += $prd_li->sell_price;

                                            $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                                        }
                                    }

                                    if (($prd_li->keep_status == 1) && ($prd_li->checkedout != 'Y' || $prd_li->is_complete_by_admin != 1)) {

                                        if ($prd_li->store_return_status != 'Y') {

                                            $current_amount += $prd_li->sell_price;

                                            $this->Products->updateAll(['keep_status' => 3], ['id' => $prd_li->id]);
                                        }
                                    }
                                }

                                //                exit;

                                $total_amount = $current_amount;

                                $current_usr_dtl_strip = $this->Users->find('all')->where(['id' => $user_id])->first();


                                $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id, 'PaymentCardDetails.use_card' => 1])->first();

                                if (empty($payment_data)) {

                                    $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $user_id])->first();
                                }



                                $lastPymentg = $this->PaymentGetways->newEntity();
                                $table1['user_id'] = $user_id;
                                $table1['kid_id'] = $kid_id;
                                $table1['emp_id'] = $payment_details->emp_id;
                                $table1['inv_id'] = $payment_details->inv_id;
                                $table1['qa_id'] = $payment_details->qa_id;
                                $table1['support_id'] = $payment_details->support_id;
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
                                } else {
                                    $shipping_address_data = $this->ShippingAddress->find('all')->where(['user_id' => $user_id])->first();
                                }
                                $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();
                                if (empty($billingAddress)) {
                                    $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id])->first();
                                }

                                $productCCount = $this->Products->find('all')->where(['payment_id' => $payment_id, 'is_altnative_product' => 0])->Count();

                                $exCCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $payment_id, 'keep_status' => 3])->Count();

                                if ($exCCountKeeps != 0) {
                                    if ($productCCount == $exCCountKeeps) {
                                        $allKeepsProducts = 1;
                                        $percentage = 25;
                                    } else {
                                        $allKeepsProducts = 2;
                                        $percentage = 0;
                                    }
                                    $discount = 0;
                                    $subTotal = 0;
                                    $stylist_picks_subtotal = $total_amount;
                                    if ($allKeepsProducts == 1) {
                                        if ($total_amount > 0) {

                                            $percentage = 25;

                                            $discount = ($percentage / 100) * $total_amount;

                                            $discount = sprintf('%.2f', $discount);

                                            $subTotal = $total_amount - $discount;

                                            $total_amount = $subTotal;
                                        }
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
                                        'product' => $billingAddress->full_name . ' Weekly check out order',
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
                                        'invice' => $lastPymentg->id,
                                        'refId' => 32,
                                        'companyName' => 'Drapefit',
                                    ];

                                    if ($total_amount > 0) {

                                        $message = $this->stripeApiPay($arr_user_info);
                                    } else {

                                        $message = [];

                                        $message['status'] = '1';
                                    }



                                    if (@$message['status'] == '1') {



                                        $this->loadModel('SmsSettings');
                                        $get_sms_temp = $this->SmsSettings->find('all')->where(['name' => 'CHECKOUT_RECEIPT_SMS'])->first();
                                        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id, 'is_billing' => 1])->first();
                                        if (empty($billingAddress)) {
                                            $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $user_id])->first();
                                        }
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
                                        
                                         $this->CronjobWeeklyCheckout->updateAll(['status'=>($check_pmt->status + 1)],['payment_id' => $pay_li_data->payment_id]);

                                        $this->PaymentGetways->updateAll(['status' => 1, 'price' => $total_amount], ['id' => $lastPymentg->id]);

                                        $payment_check = $this->Payments->find('all')->where(['payment_id' => $lastPymentg->id])->order(['id' => 'DESC'])->first();

                                        $payment = $this->Payments->newEntity();

                                        if (!empty($payment_check)) {

                                            $table['id'] = $payment_check->id;
                                        }

                                        $table['user_id'] = $user_id;
                                        $table['payment_id'] = $lastPymentg->id;
                                        $table['sub_toal'] = $total_amount - $sales_tx;
                                        $table['sales_tax'] = $sales_tx;
                                        $table['stylist_picks_subtotal'] = $stylist_picks_subtotal;
                                        $table['keep_all_discount'] = $discount;
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
                                            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 3, 'Products.auto_checkout_date <=' => $now_date]);
                                            $kidcount = $prData->count();
                                        } else {
                                            $profileType = $payment_details->profile_type;
                                            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                                            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 3, 'Products.auto_checkout_date <=' => $now_date]);
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
                                                    echo "<pre>";
                                                    print_r($newDtRow);
                                                    echo "</pre>";
                                                    $this->InProducts->updateAll(['updated_by' => $this->request->session()->read('Auth.User.id'), 'updated_date' => date('Y-m-d H:i:s'), 'action' => 'Customer Keep'], ['id' => $dataMail->inv_product_id]);
                                                }
                                            }

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

                                                $this->Products->updateAll(['checkedout' => 'Y', 'is_complete_by_admin' => 1, 'is_complete' => 1], ['id' => $dataMail->id]);
                                            }

                                            echo "updated ...";

                                            $this->Products->updateAll(['is_payment_fail' => 0, 'auto_checkout_date' => NULL], ['id' => $dataMail->id]);

                                            $i++;
                                        }

                                        //                echo "<pre>";
                                        //                print_r($prData->count());
                                        //                print_r($prData);
                                        //                print_r($productData);
                                        //                echo "</pre>";
                                        //                exit;

                                        $getParentDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
                                        $offerData = '';
                                        $gtotal = $total_amount - $sales_tx;
                                        $sitename = HTTP_ROOT;
                                        $name = $getParentDetails->name;
                                        $to = $current_usr_dtl_strip->email; //$getUsersDetails->email;
                                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                                        $from = $fromMail->value;
                                        $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                                        //                $subject = $emailMessage1->display . ' #DFPYMID' . $payment_id;
                                        $subject = 'Auto checkout processed on ' . $day_name . ' #DFPYMID' . $payment_id;
                                        $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $stylist_picks_subtotal, $total_amount, $payment_details->count, $discount, $refundamount = '', $gtotal, $offerData, $sales_tx, '#DFPYMID' . $payment_id);
                                        $this->mailLogEntry('productAutoCheckoutWeekly', $from, $subject, $to, $email_message);
                                        // $this->Custom->sendEmail($to, $from, $subject, $email_message);

                                        //                                $this->Custom->sendEmail('debmicrofinet@gmail.com', $from, $subject, $email_message);

                                        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                                        $this->mailLogEntry('productAutoCheckoutWeekly', $from, $subject, $toSupport, $email_message);
                                        // $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

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
                                                    $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Previous_Worklist_queue')], ['id' => $payment_id]);
                                                    $this->PaymentGetways->updateAll(['status' => 1, 'work_status' => 2], ['id' => $payment_id]);

                                                    if (!empty($kid_id)) {

                                                        $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $kid_id]);

                                                        $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $kid_id]);
                                                    } else {

                                                        $this->Users->updateAll(['is_redirect' => 5], ['id' => $user_id]);

                                                        $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $user_id, 'kid_id' => 0]);
                                                    }
                                                }
                                            }
                                        }



                                        if ($total_amount > 0) {
                                            $this->Products->updateAll(['auto_checkout_date' => ''], ['payment_id' => $payment_id, 'auto_checkout_date <= ' => $now_date]);

                                            echo ("<br> " . 'Payment completed. ' . $payment_id);
                                        }
                                    } else {
                                        $this->PaymentGetways->updateAll(['work_flow_status' => Configure::read('Support_Tab_Recovery_queue')], ['id' => $payment_id]);
                                        $products = $this->Products->find('all')->where(['auto_checkout_date <= ' => $now_date, 'payment_id' => $payment_id, /* 'is_complete_by_admin' => 0 */ 'is_payment_fail' => 1]);
                                        // echo "<br> Decli : " . $products->count() . "<br>";exit;
                                         $this->CronjobWeeklyCheckout->updateAll(['status'=>($check_pmt->status + 1)],['payment_id' => $pay_li_data->payment_id]);

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

                                        foreach ($products as $dataMail) {

                                            if (($dataMail->keep_status == 3) /* && ($dataMail->is_stylist != 1) */) {
                                                if ($dataMail->is_complete != 1) {
                                                    $this->Products->updateAll(['keep_status' => 99, 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                                    //                                echo $dataMail->id . " - " . $payment_id . "<br>";
                                                    //                                echo "<br> sts : " . $dataMail->keep_status . "<br>";
                                                    //                                $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);
                                                }
                                                $keep = 'Keeps';
                                            } elseif ($dataMail->keep_status == 2) {
                                                $keep = 'Exchange';

                                                //                            $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);

                                                $this->Products->updateAll(['keep_status' => 99, 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                                //                            echo $dataMail->id . " - " . $payment_id . "<br>";
                                            } elseif ($dataMail->keep_status == 1) {
                                                $keep = 'Return';

                                                //                            $this->PaymentGetways->updateAll(['payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'], ['id' => $payment_id]);

                                                $this->Products->updateAll(['keep_status' => 99, 'is_payment_fail' => 1], ['id' => $dataMail->id]);
                                                //                            echo $dataMail->id . " - " . $payment_id . "<br>";
                                            }
                                        }

                                        //                    exit;

                                        if ($payment_details->kid_id != 0) {

                                            $profileType = 3;

                                            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);

                                            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid_id, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 99, 'Products.auto_checkout_date <= ' => $now_date]);

                                            $kidcount = $prData->count();
                                        } else {
                                            $profileType = $payment_details->profile_type;

                                            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);

                                            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $user_id, 'Products.kid_id =' => 0, 'Products.payment_id' => $payment_id, 'Products.keep_status' => 99, 'Products.auto_checkout_date <= ' => $now_date]);
                                        }
                                        $productData = '';
                                        $i = 1;
                                        $current_amount = 0;
                                        foreach ($prData as $dataMail) {
                                            $priceMail = $dataMail->sell_price;
                                            $current_amount += $dataMail->sell_price;
                                            $keep = 'Keeps';
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
                                            $i++;
                                        }

                                        //                 echo "<pre>";
                                        //                 print_r($prData->count());
                                        //                 echo "<br>";
                                        // //                print_r($prData);
                                        //                 print_r($payment_id);
                                        //                 echo "<br>";
                                        //                 print_r($productData);
                                        //                 echo "</pre>";
                                        //                 exit;
                                        $getParentDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();

                                        $stylist_picks_subtotal = $current_amount;

                                        if ($allKeepsProducts == 1) {

                                            if ($stylist_picks_subtotal > 0) {

                                                $percentage = 25;

                                                $discount = ($percentage / 100) * $stylist_picks_subtotal;

                                                $discount = sprintf('%.2f', $discount);
                                                $current_amount -= $discount;
                                            }
                                        }

                                        if ($sales_tx_required == "YES") {

                                            if ($current_amount > 0) {

                                                $sales_tx = sprintf('%.2f', $current_amount * $sales_tx_rt);

                                                $current_amount += $sales_tx;
                                            }
                                        }


                                        $offerData = '';
                                        $total_amount = $current_amount;

                                        $gtotal = $total_amount - $sales_tx;

                                        $sitename = HTTP_ROOT;

                                        $name = $getParentDetails->name;

                                        $to = $current_usr_dtl_strip->email; //$getUsersDetails->email;

                                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                                        $from = $fromMail->value;

                                        $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();

                                        //                $subject = $emailMessage1->display . ' #DFPYMID' . $payment_id;

                                        $subject = 'Auto checkout payment failed on ' . $day_name . ' #DFPYMID' . $payment_id;

                                        $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $stylist_picks_subtotal, $total_amount, $payment_details->count, $discount, $refundamount = '', $gtotal, $offerData, $sales_tx, '#DFPYMID' . $payment_id);

                                        // $this->Custom->sendEmail($to, $from, $subject, $email_message);



                                        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                                        $this->mailLogEntry('productAutoCheckoutWeekly', $from, $subject, $toSupport, $email_message);
                                        // $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

                                        $chked_declin_cnt = $this->Products->find('all')->where(['payment_id' => $payment_id, 'keep_status' => 99])->count();

                                        if (!empty($chked_declin_cnt)) {

                                            if (!empty($kid_id)) {

                                                $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $kid_id]);
                                            } else {

                                                $this->Users->updateAll(['is_redirect' => 4], ['id' => $user_id]);
                                            }
                                        }

                                        echo ("<br> " . 'Product sent to declined list. ' . $payment_id);
                                    }
                                   
                                }
                            }
                        }
                    }
                }
        
       
        exit;
    }

}

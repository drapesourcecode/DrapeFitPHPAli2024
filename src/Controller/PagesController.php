<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

require_once(ROOT . '/vendor' . DS . 'PaymentTransactions' . DS . 'authorize-credit-card.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class PagesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Custom');
        $this->loadComponent('RequestHandler');
        $this->loadModel('Pages');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Settings');
        $this->loadModel('CareerDynamic');
        $this->loadModel('BlogCategory');
        $this->loadModel('Blogs');
        $this->loadModel('News');
        $this->loadModel('BlogComments');
        $this->loadModel('BlogRating');
        $this->loadModel('CommentsReply');
        $this->loadModel('CommentScndreply');
        $this->loadModel('Giftcard');
        $this->loadModel('Wallets');
        $this->loadModel('UserUsesGiftcode');
    }

    public function beforeFilter(Event $event) {

        $this->Auth->allow(['redemAgain', 'ajaxGiftsRedeemSuccess', 'ajaxGiftsRedeemCheck', 'executive', 'investors', 'styleBlog', 'feedbackReview', 'trackOrder', 'returnExchange', 'outStylist', 'news', 'ourMission', 'whoWeAre', 'WorkWithUs', 'helpCenter', 'map', 'aboutus', 'privacy', 'termsCondition', 'faq', 'blog', 'careers', 'cookieInfo', 'gifts', 'sitemap', 'supplyChainInformation', 'contactUs', 'influencerProgram', 'blogDetails', 'whatisDrapefit', 'drapefitVsShoping', 'drapefitClothing', 'priceOfClothing', 'extraFits', 'drapefitTestimonials', 'customerService', 'moreStyles', 'ScheduleYourShipment', 'faqAboutStylists', 'security', 'moreServices', 'aboutStyleProfile', 'findYourSize', 'whoweCanstyle', 'orderHistory', 'giftsPrints', 'giftsEmail', 'giftsMail', 'giftsRedeem', 'giftsSucess', 'giftsCardPrint', 'stripePayment', 'stripeCreatePayment', 'stripePaymentComplete', 'appPrivacy']);
    }

    public function news() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "news | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 24])->first();
        $newsDetails = $this->News->find('all')->where(['is_active'=>1])->order(['id' => 'DESC']);
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails', 'newsDetails'));
    }

    public function executive() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "executive team | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 20])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function influencerProgram() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "blog | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function supplyChainInformation() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 7])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function sitemap() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "blog | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function gifts() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Drape Fit offers Holiday Gift for you and your family  | Drape Fit";
        $metaKeyword = "Holiday Gift for you and your family";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 2])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function cookieInfo() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "blog | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 9])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function careers() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Secure your Career with us- DrapeFit Careers";
        $metaKeyword = "";
        $metaDescription = "We are tend to provide the best services to our lovable customers. We need such expert employees to work hard with us and achieve the goal. We recruit the best employees like you!";
        $this->viewBuilder()->setlayout('default');
        if ($this->request->is('post')) {
            // echo "Try after some time...";
            // exit;
            $data = $this->request->data;
            
            $validator = new Validator();
            $validator->notEmpty('first_name', 'We need first name.')
                    ->add('first_name', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('first_name', 'length', ['rule' => ['lengthBetween', 2, 100]])
                    ->notEmpty('last_name', 'We need last name.')
                    ->add('last_name', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('last_name', 'length', ['rule' => ['lengthBetween', 2, 100]])
                    ->notEmpty('phone', 'We need phone no.')
                    ->add('phone', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('phone', 'length', ['rule' => ['lengthBetween', 7, 15]])
                    ->notEmpty('location', 'We need location.')
                    ->add('location', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('location', 'length', ['rule' => ['lengthBetween', 10, 200]])
                    ->notEmpty('authorized_usa', 'We need authorized_usa.')
                    ->add('authorized_usa', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->notEmpty('sponsorship_usa', 'We need sponsorship_usa.')
                    ->add('sponsorship_usa', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->notEmpty('work_morning', 'We need work morning.')
                    ->add('work_morning', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->notEmpty('during_datetime', 'We need during_datetime.')
                    ->add('during_datetime', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->notEmpty('work_evening', 'We need work_evening.')
                    ->add('work_evening', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->notEmpty('work_weekend', 'We need work_weekend.')
                    ->add('work_weekend', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->notEmpty('fulltime_capacity', 'We need fulltime_capacity.')
                    ->add('fulltime_capacity', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->notEmpty('email', 'We need email.')
                    ->add('email', 'valid-email', ['rule' => 'email', 'message' => 'E-mail must be valid'])

            ;
            $errors = $validator->errors($this->request->data);
            if (!empty($errors)) {
                $this->Flash->error(__('Fill all fields.'));
                return $this->redirect(HTTP_ROOT . 'careers');
            }
            
            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CAREERS_FROM'])->first();
            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $toMail = $this->Settings->find('all')->where(['Settings.name' => 'TO_EMAIL'])->first();
            $i = 0;
            foreach ($data['attachfile'] as $item) {
                // for ($i = 0; $i < count($_FILES['attachfile']['name']); $i++) {
                $ftype[] = $data['attachfile'][$i]['type'];
                $fname[] = $data['attachfile'][$i]['name'];
                $tmpFilePath = $data['attachfile'][$i]['tmp_name'];
                $newFilePath = HELP . $data['attachfile'][$i]['name'];
                move_uploaded_file($tmpFilePath, $newFilePath);
                $i++;
            }
            $files = $fname;
            $to = $toMail->value;
            $from = $fromMail->value;
            $subject = $emailMessage->display;
            $customeremail = $data['email'];

            $message = $this->Custom->careersform($emailMessage->value, $data['first_name'], $data['last_name'], $data['email'], $data['phone'], $data['location'], $data['school'], $data['degree'], $data['discipline'], $data['linkedin'], $data['hearabt_job'], $data['employee_referral'], $data['compensation'], $data['authorized_usa'], $data['sponsorship_usa'], $data['work_morning'], $data['during_datetime'], $data['work_evening'], $data['work_weekend'], $data['fulltime_capacity'], $data['gender'], $data['hispanic_latino'], $data['veteran_status'], $data['disability_status'], date('Y-m-d H:i:s'));

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
            // $ok = @mail('support@dra.com', $subject, $message, $headers);
            $ok = @mail($customeremail, $subject, $message, $headers);
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            $ok = @mail($toSupport, $subject, $message, $headers);
            $this->Flash->success(__('Thank you for applying.'));
            return $this->redirect(HTTP_ROOT . 'careers');
        }
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();

        $careerSchool = $this->CareerDynamic->find('all')->where(['CareerDynamic.school !=' => '']);
        $careerDegree = $this->CareerDynamic->find('all')->where(['CareerDynamic.degree !=' => '']);
        $careerDiscipline = $this->CareerDynamic->find('all')->where(['CareerDynamic.discipline !=' => '']);
        $careerAboutjob = $this->CareerDynamic->find('all')->where(['CareerDynamic.about_this_job !=' => '']);
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails', 'careerDynamic', 'careerSchool', 'careerDegree', 'careerDiscipline', 'careerAboutjob'));
    }

    public function blog() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "blog | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 5])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function blogDetails() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Blog Details | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        @$title = $_REQUEST['title'];
        $blog_id = $this->Custom->lastValue(@$title);
        $blogDetails = $this->Blogs->find('all')->where(['id =' => $blog_id])->first();
        $blogComments = $this->BlogComments->find('all')->where(['blog_id =' => $blog_id]);
        $comntcount = $this->BlogComments->find('all')->where(['blog_id' => $blog_id])->count();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data = $this->request->getData();
            if (@$data['full_name']) {
                $entity = $this->BlogComments->newEntity();
                if (!empty($data['image']['tmp_name'])) {
                    $avatarName = $this->Custom->uploadAvatarImage($data['image']['tmp_name'], $data['image']['name'], BLOGIMG, 250);
                    $data['image'] = $avatarName;
                } else {
                    $dataEdit = $this->BlogComments->find('all')->where(['id' => $data['id']])->first();
                    @$data['image'] = $dataEdit->auther_image;
                }
                $entity = $this->BlogComments->patchEntity($entity, $data);
                $entity->is_active = 1;
                $entity->created = date('Y-m-d H:I:s');
                if ($this->BlogComments->save($entity)) {
                    $this->Flash->success(__('Thanks For the comments'));
                    $this->redirect($this->referer());
                }
            }
            if (@$data['rating']) {
                $blograting = $this->BlogRating->newEntity();
                $entityrat = $this->BlogRating->patchEntity($blograting, $data);
                $entityrat->blog_id = $data['blog_id'];
                $entityrat->rating = $data['rating'];
                $entityrat->rating_date = date('Y-m-d H:I:s');
                if ($this->BlogRating->save($entityrat)) {
                    $this->Flash->success(__('Thanks For the Review'));
                }
            }
            if (@$data['reply_fullname']) {

                $entity = $this->CommentsReply->newEntity();
                if (!empty($data['reply_image']['tmp_name'])) {
                    $avatarName = $this->Custom->uploadAvatarImage($data['reply_image']['tmp_name'], $data['reply_image']['name'], BLOGIMG, 250);
                    $data['reply_image'] = $avatarName;
                }
                $entity = $this->CommentsReply->patchEntity($entity, $data);
                $entity->is_active = 1;
                $entity->created = date('Y-m-d H:I:s');
                if ($this->CommentsReply->save($entity)) {
                    $this->Flash->success(__('Thanks For the comments'));
                    $this->redirect($this->referer());
                }
            }
            if (@$data['scndreply_fullname']) {

                $entity = $this->CommentScndreply->newEntity();
                if (!empty($data['scndreply_image']['tmp_name'])) {
                    $avatarName = $this->Custom->uploadAvatarImage($data['scndreply_image']['tmp_name'], $data['scndreply_image']['name'], BLOGIMG, 250);
                    $data['scndreply_image'] = $avatarName;
                }
                $entity = $this->CommentScndreply->patchEntity($entity, $data);
                $entity->is_active = 1;
                $entity->created = date('Y-m-d H:I:s');
                if ($this->CommentScndreply->save($entity)) {
                    $this->Flash->success(__('Thanks For the comments'));
                    $this->redirect($this->referer());
                }
            }
        }

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 5])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails', 'blogDetails', 'blogComments', 'comntcount'));
    }

    public function faq() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }

        $title_for_layout = "FAQ | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 10])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function aboutus() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Aboutus | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 3])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function privacy() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Privacy & Policy | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 8])->first();
        // $this->set(compact('pageDetails'));
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function helpCenter() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Help Center | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 12])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function WorkWithUs() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Work With Us | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 13])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function whoWeAre() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "About us | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "DrapeFit is a modern styling platform for Men, Women and Kids. Our professional stylist works hard to make you look great and upgrade your fashion wardrobe. We provide the quality products with great deals!";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 14])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

        $this->viewBuilder()->setlayout('default');
    }

    public function termsCondition() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Terms & Condition | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 11])->first();

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function contactUs() {

        $title_for_layout = "Contact Us | Drape Fit";

        $metaKeyword = "";

        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 19])->first();

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

        $this->viewBuilder()->layout('default');

        if ($this->request->is('post')) {

            $validator = new Validator();
            $validator->notEmpty('firstName', 'We need first name.')
                    ->add('firstName', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('firstName', 'length', ['rule' => ['lengthBetween', 2, 100]])
                    ->notEmpty('lastName', 'We need last name.')
                    ->add('lastName', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('lastName', 'length', ['rule' => ['lengthBetween', 2, 100]])
                    ->notEmpty('phoneNo', 'We need phone no.')
                    ->add('phoneNo', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('phoneNo', 'length', ['rule' => ['lengthBetween', 7, 15]])
                    ->notEmpty('subject', 'We need subject.')
                    ->add('subject', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('subject', 'length', ['rule' => ['lengthBetween', 10, 200]])
                    ->notEmpty('message', 'We need message.')
                    ->add('message', 'notBlank', ['rule' => 'notBlank', 'message' => 'not blank message', 'last' => true])
                    ->add('message', 'length', ['rule' => ['lengthBetween', 10, 1000]])
                    ->notEmpty('emailAddress', 'We need email.')
                    ->add('emailAddress', 'valid-email', ['rule' => 'email', 'message' => 'E-mail must be valid'])

            ;
            $errors = $validator->errors($this->request->data);

            if (!empty($errors)) {
                $this->Flash->error(__('Please fill all fields'));
                return $this->redirect(HTTP_ROOT . 'contact-us');
            }

            $data = $this->request->data;
            
            if(!empty( $data['photo'])){
                    $ftype = $data['photo']['type'];
                    $fname = $data['photo']['name'];
                    $tmpFilePath = $data['photo']['tmp_name'];
                    $newFilePath =  $data['photo']['name'];
                    move_uploaded_file($tmpFilePath, $newFilePath);
                    echo $newFilePath;exit;
                }

            /* Mail sending below code */

            $recaptcha = $_REQUEST['g-recaptcha-response'];

            if (empty($recaptcha)) {

                $this->Flash->error(__('Please enter correct captcha code'));

                return $this->redirect(HTTP_ROOT . 'contact-us');
            } else {

                $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'CONTACT_US'])->first();

                $emailTemplate1 = $this->Settings->find('all')->where(['Settings.name' => 'CUSTOMER_CONTACT'])->first();

                $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                $toAdminEmail = $this->Settings->find('all')->where(['Settings.name' => 'TO_HELP'])->first();

                $from = $emailFrom->value;

                $name = $data['firstName'] . ' &nbsp;' . $data['lastName'];

                $email = $data['emailAddress'];

                $tocustomer = $data['emailAddress'];

                $phone = $data['phoneNo'];

                $body_subject = $data['subject'];

                $msg = $data['message'];

                $subject = $emailTemplate->display;

                $subject1 = '[Request received] ' . $data['subject'];
                
                

                $message = $this->Custom->contactUs($emailTemplate->value, $name, $email, $phone, $subject, $body_subject, $msg, SITE_NAME);

                $message1 = $this->Custom->customerContactUs($emailTemplate1->value, $name, $email, $phone, $subject1, $body_subject, $msg, SITE_NAME);

                $this->Custom->sendEmail($toAdminEmail->value, $from, $subject, $message);

                $this->Custom->sendEmail($tocustomer, $from, $subject1, $message1);

                //$this->Custom->sendEmail('devadash143@gmail.com', $from, $subject, $message);



                /* Mail sending below code */

                $this->Flash->success(__('Thank you, We will get back to you soon.'));

                return $this->redirect(HTTP_ROOT . 'contact-us');
            }
        }

        // $map = $this->Map->find('all')->where(['Map.id' => 1])->first();
        //$this->set(compact('pageDetails'));
    }

    public function map() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "SiteMap | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "Map";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function outStylist() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Our Stylist | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "Our Stylist!";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 15])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function returnExchange() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Return and Exchange | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "Return and Exchange";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 17])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function trackOrder() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Track Order | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "Track Order!";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 16])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function ourMission() {
        $title_for_layout = "Our Mission | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "Our Mission";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 18])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function feedbackReview() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Feedback Review | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "Feedback Review";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 21])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function styleBlog() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Style Blog | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "Style Blog";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 22])->first();
        $blogCategory = $this->BlogCategory->find('all')->order(['id' => 'asc']);

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails', 'blogCategory'));
    }

    public function investors() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $title_for_layout = "Investors | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "Investors";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 23])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
        $this->viewBuilder()->layout('default');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            
            $validator = new Validator();
            $validator->notEmpty('emailAddress', 'We need email.')
                    ->add('emailAddress', 'valid-email', ['rule' => 'email', 'message' => 'E-mail must be valid'])

            ;
            $errors = $validator->errors($this->request->data);

            if (!empty($errors)) {
                $this->Flash->error(__('Please fill all fields'));
                return $this->redirect(HTTP_ROOT . 'investors');
            }
            
            /* Mail sending below code */
            // $recaptcha = $_REQUEST['g-recaptcha-response'];
            // if (empty($recaptcha)) {
            //     $this->Flash->error(__('Please enter correct captcha code'));
            //     return $this->redirect(HTTP_ROOT . 'contact-us');
            // } else {
            $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'INVESTORS'])->first();
            $emailTemplate1 = $this->Settings->find('all')->where(['Settings.name' => 'INVESTORS'])->first();
            $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $toAdminEmail = $this->Settings->find('all')->where(['Settings.name' => 'TO_HELP'])->first();
            $from = $emailFrom->value;
            $name = $data['firstName'] . ' &nbsp;' . $data['lastName'];
            $email = $data['emailAddress'];
            $tocustomer = $data['emailAddress'];
            $phone = $data['phoneNo'];
            $body_subject = $data['subject'];
            $msg = $data['message'];
            $subject = $emailTemplate->display;
            $subject1 = $emailTemplate1->display;

            $message = $this->Custom->contactUs($emailTemplate->value, $name, $email, $phone, $subject, $body_subject, $msg, SITE_NAME);
            $message1 = $this->Custom->customerContactUs($emailTemplate1->value, $name, $email, $phone, $subject1, $body_subject, $msg, SITE_NAME);

            $this->Custom->sendEmail($toAdminEmail->value, $from, $subject, $message);
            $this->Custom->sendEmail($tocustomer, $from, $subject1, $message1);
            //$this->Custom->sendEmail('devadash143@gmail.com', $from, $subject, $message);

            /* Mail sending below code */
            $this->Flash->success(__('Thank you, We will get back to you soon.'));
            return $this->redirect(HTTP_ROOT . 'investors');
            // }
        }
    }

    public function whatisDrapefit() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "What Is Drapefit How its work";
        $metaKeyword = "";
        $metaDescription = "What Is Drapefit How its work";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 25])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function drapefitVsShoping() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Drapefit vs Online Shopping or in a store shoping";
        $metaKeyword = "";
        $metaDescription = "Drapefit vs Online Shopping or in a store shoping";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 26])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function drapefitClothing() {
        //  $maintainStatus = $this->UnderMaintenance->find('all')->where(['UnderMaintenance.id' => 1])->first();
        // if ($maintainStatus->status == 1) {
        //     return $this->redirect(HTTP_ROOT . 'under-construction');
        // }
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Drapefit Clothing";
        $metaKeyword = "";
        $metaDescription = "Drapefit Clothing";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 27])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function priceOfClothing() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Price Range Of Drapefit Clothing";
        $metaKeyword = "";
        $metaDescription = "Price Range Of Drapefit Clothing";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 28])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function extraFits() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Extra Fits";
        $metaKeyword = "";
        $metaDescription = "Extra Fits";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 29])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function drapefitTestimonials() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Drapefit testimonials";
        $metaKeyword = "";
        $metaDescription = "Drapefit testimonials";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 30])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function customerService() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Customer service";
        $metaKeyword = "";
        $metaDescription = "Customer service";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 31])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function moreStyles() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "More Styles";
        $metaKeyword = "";
        $metaDescription = "More Styles";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 32])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function ScheduleYourShipment() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Schedule your Shipment";
        $metaKeyword = "";
        $metaDescription = "Schedule your Shipment";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 33])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function faqAboutStylists() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "FAQ about stylists";
        $metaKeyword = "";
        $metaDescription = "FAQ about stylists";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 34])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function security() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Security";
        $metaKeyword = "";
        $metaDescription = "Security";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 35])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function moreServices() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "More Services";
        $metaKeyword = "";
        $metaDescription = "More Services";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 36])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function aboutStyleProfile() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "About Style Profile";
        $metaKeyword = "";
        $metaDescription = "About Style Profile";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 37])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function findYourSize() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Find Your Size";
        $metaKeyword = "";
        $metaDescription = "Find Your Size";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 38])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function whoweCanstyle() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Who we can style";
        $metaKeyword = "";
        $metaDescription = "Who we can style";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 39])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function orderHistory() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Order History";
        $metaKeyword = "";
        $metaDescription = "Order History";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 40])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function giftsRedeem() {
        $title_for_layout = "Redeem | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 41])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function giftsPrints() {
        $title_for_layout = "Print | Drape Fit";

        $metaKeyword = "";

        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');

        if ($this->request->is('post')) {
            $giftcard = $this->Giftcard->newEntity();

            $data = $this->request->data;

//            echo "<pre>";
//            print_r($data);
//            echo "</pre>";
//            exit;


            $date = strtotime(date("Y-m-d"));
            $expiry_date = date('Y-m-d', strtotime('+ 1 year', $date));

            $data['to_name'] = $data['to_name'];

            $data['from_name'] = $data['from_name'];

            $data['from_email'] = $data['from_email'];

            $data['price'] = $data['price'];

            $data['is_active'] = 0;

            $data['type'] = 3;

            $data['giftcode'] = $this->Custom->generateUniqGiftCode(10);

            $data['expiry_date'] = $expiry_date;

            $data['created_dt'] = date('Y-m-d h:i:s');

            $emailgcard = $this->Giftcard->patchEntity($giftcard, $data);

            if ($this->Giftcard->save($emailgcard)) {

                $last_id = $emailgcard->id;

                return $this->redirect(HTTP_ROOT . 'gifts/pay/Print/' . $last_id);
            }


            echo json_encode(['status' => 'error', 'msg' => 'Some things error on payment']);

            exit;
        }



        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function giftsCardPrint($id) {

        $giftdetails = $this->Giftcard->find('all')->where(['id' => $id])->first();

        $this->set(compact('giftdetails'));
    }

    public function giftsEmail() {
        $from_mail_for_send = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first()->value;
        $title_for_layout = "Gift Card Email | Drape Fit";

        $metaKeyword = "";

        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');

        $giftcard = $this->Giftcard->newEntity();

        if ($this->request->is('post')) {
            $recaptcha = $_REQUEST['g-recaptcha-response'];

            if (empty($recaptcha)) {
                $this->Flash->error(__('Please enter correct captcha code'));
                return $this->redirect(HTTP_ROOT . 'gifts/buy/email');
            } else {

                $data = $this->request->data;
                $date = strtotime(date("Y-m-d"));
                $expiry_date = date('Y-m-d', strtotime('+ 1 year', $date));
                $scardNO = str_replace(' ', '', $data['card_number']);
                $dataexplode = explode('/', $data['expire_date']);
                $year = $dataexplode[0];
                $month = $dataexplode[1];

                $data['to_name'] = $data['to_name'];
                $data['to_email'] = $data['to_email'];
                $data['msg'] = $data['msg'];
                $data['from_name'] = $data['from_name'];
                $data['from_email'] = $data['from_email'];
                $data['price'] = $data['price'];
                $data['delivery_date'] = date('Y-m-d', strtotime($data['delivery_date']));
                $data['card_holder_name'] = $data['card_holder_name'];
                $data['card_number'] = $data['card_number'];
                $data['expire_date'] = $data['expire_date'];
                $data['cvv'] = $data['cvv'];
                $data['postal_code'] = $data['postal_code'];
                $data['giftcode'] = $this->Custom->generateUniqGiftCode(10);
                $data['is_active'] = 0;
                $data['type'] = 1;
                $data['expiry_date'] = $expiry_date;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $data['mail_status'] = 0;
                $emailgcard = $this->Giftcard->patchEntity($giftcard, $data);
                $lastId = $this->Giftcard->save($emailgcard);
                if ($lastId->id != '') {
                    //pj($emailgcard); exit;
                    return $this->redirect(HTTP_ROOT . 'gifts/pay/Email/' . $lastId->id);
                }
            }
        } else {

            $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
        }
    }

    public function stripePayment($my_type, $id) {
        $getData = $this->Giftcard->find('all')->where(['id' => $id])->first();

        $this->set(compact('getData', 'my_type'));
    }

    public function stripeCreatePayment($my_type, $id) {
        $getData = $this->Giftcard->find('all')->where(['id' => $id])->first();

        require_once(ROOT . DS . 'vendor' . DS . "stripe-php2" . DS . "init.php");
        // This is your test secret API key.
//        \Stripe\Stripe::setApiKey('sk_test_51JY90jITPrbxGSMcpa6GFAxK96iCUrRjwWpJPY0gbh53l1EXf1F5aLYkNqc8V3h6baqk0gm9N79qazLZrp6bNg1H00TRuPEAeg');
        \Stripe\Stripe::setApiKey('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');
        /*
          function calculateOrderAmount(array $items): int {
          // Replace this constant with a calculation of the order's amount
          // Calculate the order total on the server to prevent
          // people from directly manipulating the amount on the client
          return 1400;
          }
         */
        header('Content-Type: application/json');

        try {
            // retrieve JSON from POST body
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                        'amount' => ($getData->price * 100), //calculateOrderAmount($jsonObj->items),
                        'currency' => 'usd',
                        'automatic_payment_methods' => [
                            'enabled' => true,
                        ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
        exit;
    }

    public function stripePaymentComplete($my_type, $id) {
        $from_mail_for_send = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first()->value;
        if ($_GET['redirect_status'] == "succeeded") {
            $this->Giftcard->updateAll(['transactions_id' => $_GET['payment_intent'], 'charge_id' => $_GET['payment_intent_client_secret']], ['id' => $id]);
            if ($my_type == "Email") {
                $getData = $this->Giftcard->find('all')->where(['id' => $id])->first();
                $date = strtotime(date("Y-m-d"));
                $expiry_date = date('Y-m-d', strtotime('+ 1 year', $date));
                $code = $getData->giftcode;
                $to = $getData->to_email;
                $name = $getData->to_name;
                $fromName = $getData->from_name;
                $fromMail = $getData->from_email;
                $price = $getData->price;
                $msSg = $getData->msg;
                $sitename = SITE_NAME;
                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GIFTCARD_EMAIL'])->first();
                $fromMail = $getData->from_email;
                $to = $getData->to_email;
                $subject = $emailMessage->display . '1' . ' #DFGPYMID' . $getData->id;
                $sitename = SITE_NAME;
                $message = $this->Custom->giftCardEmail($emailMessage->value, $to, $name, $fromName, $fromMail, $price, $code, $expiry_date, $msSg, $sitename);
                // same day client want to send email to friends

                if (date('Y-m-d', strtotime($getData->delivery_date)) == date('Y-m-d')) {
                    $this->Custom->sendEmail($to, $from_mail_for_send, $subject, $message);
                    $this->Giftcard->updateAll(array('mail_status' => '1'), array('id' => $getData->id));
                }



                $this->Custom->sendEmail($fromMail, $from_mail_for_send, $subject, $message);
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                //$emailMessageSupport = $this->Settings->find('all')->where(['Settings.name' => 'GIFTCARD_EMAIL_SUPPORT'])->first();
                //$subjectSupport = $emailMessageSupport->display;
                //$messageSupport = $this->Custom->giftCardEmailSupport($emailMessageSupport->value, $to, $name, $fromName, $fromMail, $code, $price, $expiry_date, $msSg, $sitename);

                $this->Custom->sendEmail($toSupport, $from_mail_for_send, $subject, $message);
                $url = HTTP_ROOT . 'gifts-success';
                return $this->redirect($url);
//            echo json_encode(['status' => 'success', 'url' => $url]);
//            exit;
            }

            if ($my_type == "Mail") {
                $getData = $this->Giftcard->find('all')->where(['id' => $id])->first();

                $date = strtotime(date("Y-m-d"));

                $expiry_date = date('Y-m-d', strtotime('+ 1 year', $date));
                $code = $getData->giftcode;

                //$to = $data['to_email'];

                $name = $getData->to_name;

                $fromName = $getData->from_name;

                $fromMail = $getData->from_email;

                $price = $getData->price;

                $msSg = $getData->msg;

                $sitename = SITE_NAME;

                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GIFTCARD_MAIL'])->first();

                $fromMail = $getData->from_email;

                $to = $fromMail;

                $subject = $emailMessage->display . ' #DFGPYMID' . $getData->id;

                $sitename = SITE_NAME;
                $message = $this->Custom->giftCardMail($emailMessage->value, $getData->to_name, $getData->from_name, $sitename, $getData->price, $code, $expiry_date, $getData->msg);

                $this->Custom->sendEmail($fromMail, $from_mail_for_send, $subject, $message);

                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                $this->Custom->sendEmail($toSupport, $from_mail_for_send, $subject, $message);

                $url = HTTP_ROOT . 'gifts-success';

                return $this->redirect($url);
            }

            if ($my_type == "Print") {
                $getData = $this->Giftcard->find('all')->where(['id' => $id])->first();
                $date = strtotime(date("Y-m-d"));
                $expiry_date = date('Y-m-d', strtotime('+ 1 year', $date));
                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GIFTCARD_PRINT'])->first();

                $fromMail = $getData->from_email;

                $fromData = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                $from = $fromData->value;

                $subject = $emailMessage->display . ' #DFGPYMID' . $id;

                $sitename = SITE_NAME;

                $code = $getData->giftcode;

                $message = $this->Custom->giftCardPrint($emailMessage->value, $getData->to_name, $getData->from_name, $sitename, $getData->price, $code, $expiry_date);

                $this->Custom->sendEmail($fromMail, $from, $subject, $message);

                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                $this->Custom->sendEmail($toSupport, $from, $subject, $message);

                $url = HTTP_ROOT . 'gifts-card-print/' . $id;

                return $this->redirect($url);
            }
        }
    }

    public function giftsMail() {
        $from_mail_for_send = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first()->value;
        $title_for_layout = "Mail | Drape Fit";

        $metaKeyword = "";

        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');

        if ($this->request->is('post')) {

            $data = $this->request->data;

//            echo "<pre>";
//            print_r($data);
//            echo "</pre>";
//            exit;

            $date = strtotime(date("Y-m-d"));
            $expiry_date = date('Y-m-d', strtotime('+ 1 year', $date));

            $data['charge_id'] = $message['charge_id'];
            $data['receipt_url'] = $message['receipt_url'];
            $data['transactions_id'] = $message['TransId'];

            $data['to_name'] = $data['to_name'];

            $data['msg'] = $data['msg'];

            $data['from_name'] = $data['from_name'];

            $data['from_email'] = $data['from_email'];

            $data['price'] = $data['price'];

            $data['recipinet_name'] = $data['recipinet_name'];

            $data['recipinet_address'] = $data['recipinet_address'];

            $data['address_line2'] = $data['address_line2'];
            $data['expiry_date'] = $expiry_date;

            $data['city'] = $data['city'];
            $data['state'] = $data['state'];
            $data['zipcode'] = $data['zipcode'];
            $data['is_active'] = 0;
            $data['type'] = 2;
            $data['created_dt'] = date('Y-m-d h:i:s');

            $data['giftcode'] = $this->Custom->generateUniqGiftCode(10);

            $giftcard = $this->Giftcard->newEntity();

            $emailgcard = $this->Giftcard->patchEntity($giftcard, $data);

            $lastId = $this->Giftcard->save($emailgcard);

            if ($lastId->id != '') {
                return $this->redirect(HTTP_ROOT . 'gifts/pay/Mail/' . $lastId->id);
                //pj($emailgcard); exit;
            }
        } else {

            $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
        }
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
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
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
        $stripeToken = $stripeToken;
        $custName = $first_name;
        $custEmail = $email;
        $cardNumber = $card_number;
        $cardCVC = $card_code;
        $cardExpMonth = $exp_month;
        $cardExpYear = $exp_year;

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
        $stripe = array(
            // "secret_key"      => "Your_Stripe_API_Secret_Key",
            // "publishable_key" => "Your_API_Publishable_Key"
//            "secret_key" => "sk_test_51JY90jITPrbxGSMcpa6GFAxK96iCUrRjwWpJPY0gbh53l1EXf1F5aLYkNqc8V3h6baqk0gm9N79qazLZrp6bNg1H00TRuPEAeg",
//            "publishable_key" => "pk_test_51JY90jITPrbxGSMcuo8bhxqQhCbSvHghLQaYIxtqVSe9u2xxm80SDtIVQ9acsLTW4WyPJX5G0nIMxaLXwtXbsN0N00vkBYmYDU"

            "secret_key" => "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",
            "publishable_key" => "pk_live_51JY90jITPrbxGSMc2biBXo0DoiP6kSUOwvQQix5RmbPTlEIeJSPL3inlSdqhoJ4dh5oV5FJHpcuCMTuk3V2Hymqa00sVontf8A"
        );
        \Stripe\Stripe::setApiKey($stripe['secret_key']);

        //add customer to stripe 
        //Create Once for eacy manage in stripe end            

        try {

            $customer = \Stripe\Customer::create(array(
                        'name' => $custName,
                        'email' => $custEmail,
                        'source' => $stripeToken,
                        'description' => $product,
                        "address" => ["city" => $city, "country" => $country, "line1" => $address, "line2" => "", "postal_code" => $zip, "state" => $state]
            ));

            // item details for which payment made
            $itemName = $product;
            $itemNumber = $invice;
            $itemPrice = round($amount, 2, PHP_ROUND_HALF_UP);
            $currency = "USD";
            $orderID = "DFGPYMID" . $invice;

            // details for which payment performed
            $payDetails = \Stripe\Charge::create(array(
                        'customer' => $customer->id,
                        'amount' => $itemPrice * 100,
                        'currency' => $currency,
                        'description' => $itemName,
                        'metadata' => array(
                            'order_id' => $orderID
                        )
            ));
            // get payment details
            $paymenyResponse = $payDetails->jsonSerialize();
            // check whether the payment is successful
            if ($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1) {
                // transaction details 
                $amountPaid = $paymenyResponse['amount'];
                $balanceTransaction = $paymenyResponse['balance_transaction'];
                $charged_id = $paymenyResponse['id']; //used for refund
                $receipt_url = $paymenyResponse['receipt_url'];
                $paidCurrency = $paymenyResponse['currency'];
                $paymentStatus = $paymenyResponse['status'];
                $paymentDate = date("Y-m-d H:i:s");
                //insert tansaction details into database
                /* include_once("db_connect.php");
                  $insertTransactionSQL = "INSERT INTO transaction(cust_name, cust_email, card_number, card_cvc, card_exp_month, card_exp_year,item_name, item_number, item_price, item_price_currency, paid_amount, paid_amount_currency, txn_id, payment_status, created, modified)
                  VALUES('" . $custName . "','" . $custEmail . "','" . $cardNumber . "','" . $cardCVC . "','" . $cardExpMonth . "','" . $cardExpYear . "','" . $itemName . "','" . $itemNumber . "','" . $itemPrice . "','" . $paidCurrency . "','" . $amountPaid . "','" . $paidCurrency . "','" . $balanceTransaction . "','" . $paymentStatus . "','" . $paymentDate . "','" . $paymentDate . "')";
                  mysqli_query($conn, $insertTransactionSQL) or die("database error: " . mysqli_error($conn));
                  $lastInsertId = mysqli_insert_id($conn); */
                $lastInsertId = $balanceTransaction;
                //if order inserted successfully
                if ($lastInsertId && $paymentStatus == 'succeeded') {
//                    $paymentMessage = "<strong>The payment was successful.</strong><strong> Order ID: {$lastInsertId}</strong>";
//                    $paymentMessage .= "<br><strong> Charger ID: {$charged_id}<small>Required for refund</small></strong>";
//                    $paymentMessage .= "<br><strong> Receipt url : {$receipt_url}</strong>";
//                    $this->PaymentGetways->updateAll(['receipt_url' => $receipt_url, 'charge_id' => $charged_id], ['id' => $invice]);

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
                    $msg['ErrorCode'] = " Error Message : Payment failed!!!\n" . $paymentStatus;
                }
            } else {
                $msg['error'] = 'error';
                $msg['ErrorCode'] = " Error Code  : \n";
                $msg['ErrorCode'] = " Error Message : Payment failed!!\n" . $paymentStatus;
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

    public function giftsSucess() {
        $title_for_layout = "Gift Success | Drape Fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        //$pageDetails = $this->Pages->find('all')->where(['Pages.id' => 41])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function ajaxGiftsRedeemCheck() {
        $this->viewBuilder()->setlayout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['code'] != '') {
                $currentDate = date('Y-m-d');
                $getDetails = $this->Giftcard->find('all')->where(['expire_date <= ' => $currentDate, 'is_active' => 0, 'giftcode' => $data['code']])->first();
                if ($getDetails->id != '') {
                    if ($this->request->session()->read('Auth.User.id') != '') {
                        $walletsEnRE = $this->Wallets->newEntity();
                        $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                        $walletsEnRE->type = 2;
                        $walletsEnRE->balance = $getDetails->price;
                        $walletsEnRE->created = date('Y-m-d h:i:s');
                        $walletsEn->applay_status = 0;
                        $this->Wallets->save($walletsEnRE);
                        $this->Giftcard->updateAll(['is_active' => 1], ['id' => $getDetails->id]);
                        $this->request->session()->write('codeProfile', $getDetails->id);

                        $UserGift = $this->UserUsesGiftcode->newEntity();
                        $UserGift->user_id = $this->request->session()->read('Auth.User.id');
                        $UserGift->giftcode = $data['code'];
                        $UserGift->apply_dt = date('Y-m-d H:i:s');
                        $UserGift->price = $getDetails->price;
                        $this->UserUsesGiftcode->save($UserGift);

                        echo json_encode(['status' => 'success', 'code' => $getDetails->id]);
                    } else {
                        $this->request->session()->write('codeProfile', $getDetails->id);
                        echo json_encode(['status' => 'login', 'code' => $getDetails->id]);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'msg' => 'Invaild giftcode or date is exprie']);
                    exit;
                }
            } else {
                echo json_encode(['status' => 'error', 'msg' => 'Somethings is wrong your payment,Please try again']);
                exit;
            }
        } else {
            // $url = HTTP_ROOT . 'gifts/buy/prints';
            echo json_encode(['status' => 'error', 'msg' => 'Somethings is wrong your redeem code']);
            exit;
        }
        exit;
    }

    public function ajaxGiftsRedeemSuccess() {
        $this->viewBuilder()->setlayout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $pagedata = [];
            if ($data['code'] != '') {
                $getWalltesCredit = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->request->session()->read('Auth.User.id'), 'Wallets.type' => 2, 'Wallets.applay_status' => 0])->sumOf('balance');
                $getWalltesDebit = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->request->session()->read('Auth.User.id'), 'Wallets.type' => 1, 'Wallets.applay_status' => 0])->sumOf('balance');
                $total = $getWalltesCredit - $getWalltesDebit;
                $pagedata = $this->Giftcard->find('all')->where(['id' => $data['code']])->first();
            }
        } else {
            
        }
        $this->set(compact('pagedata', 'total'));
    }

    public function redemAgain() {
        $this->viewBuilder()->setlayout('');
        $this->request->session()->write('codeProfile', '');
        return $this->redirect(HTTP_ROOT . 'gifts/redeem');
        exit;
    }
    
    public function appPrivacy(){
        
    }

}

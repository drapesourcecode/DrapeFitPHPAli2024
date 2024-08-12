<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

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

    }

    public function beforeFilter(Event $event) {

        $this->Auth->allow(['executive', 'investors','styleBlog','feedbackReview','trackOrder','returnExchange','outStylist', 'news','ourMission', 'whoWeAre', 'WorkWithUs', 'helpCenter','map', 'aboutus', 'privacy', 'termsCondition', 'faq', 'blog', 'careers', 'cookieInfo', 'gifts', 'sitemap', 'supplyChainInformation', 'contactUs', 'influencerProgram','blogDetails','whatisDrapefit','drapefitVsShoping','drapefitClothing','priceOfClothing','extraFits','drapefitTestimonials','customerService','moreStyles','ScheduleYourShipment','faqAboutStylists','security','moreServices','aboutStyleProfile','findYourSize','whoweCanstyle','orderHistory']);
    }

    public function news() {
        $title_for_layout = "news | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 24])->first();
        $newsDetails = $this->News->find('all')->order(['id' => 'DESC']);
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails','newsDetails'));
    }
    
    public function executive() {
        $title_for_layout = "executive team | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 20])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function influencerProgram() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function supplyChainInformation() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 7])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function sitemap() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function gifts() {
        $title_for_layout = "Gifts | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 2])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function cookieInfo() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 9])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function careers() {
        $title_for_layout = "Secure your Career with us- DrapeFit Careers";
        $metaKeyword = "";
        $metaDescription = "We are tend to provide the best services to our lovable customers. We need such expert employees to work hard with us and achieve the goal. We recruit the best employees like you!";
        $this->viewBuilder()->setlayout('default');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CAREERS_FROM'])->first();
            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $toMail = $this->Settings->find('all')->where(['Settings.name' => 'TO_EMAIL'])->first();
            
            for($i=0; $i < count($_FILES['attachfile']['name']); $i++){
                $ftype[]       = $_FILES['attachfile']['type'][$i];
                $fname[]       = $_FILES['attachfile']['name'][$i];
            }
            $files = $fname;            
            $to = $toMail->value;
            $from = $fromMail->value;
            $subject = $emailMessage->display;
            $customeremail =$data['email'];
            
            $message = $this->Custom->careersform($emailMessage->value, $data['first_name'], $data['last_name'], $data['email'],$data['phone'],$data['location'],$data['school'],$data['degree'],$data['discipline'],$data['linkedin'],$data['hearabt_job'],$data['employee_referral'],$data['compensation'],$data['authorized_usa'],$data['sponsorship_usa'],$data['work_morning'],$data['during_datetime'],$data['work_evening'],$data['work_weekend'],$data['fulltime_capacity'],$data['gender'],$data['hispanic_latino'],$data['veteran_status'],$data['disability_status'], date('Y-m-d H:i:s'));
            
            $headers = "From: $from";
            $semi_rand = md5(time());
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
            $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
            $message .= "--{$mime_boundary}\n";            

            for($x=0;$x<count($files);$x++){
                $file = fopen($files[$x],"rb");
                $data = fread($file,filesize($files[$x]));
                fclose($file);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" . 
                "Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" . 
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                $message .= "--{$mime_boundary}\n";
            }
            
            $ok = @mail($customeremail, $subject, $message, $headers);
            $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
            $ok = @mail($toSupport, $subject, $message, $headers);
            $this->Flash->success(__('Thank you for applying.'));
            return $this->redirect(HTTP_ROOT . 'careers');
            
        }
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        
        $careerSchool = $this->CareerDynamic->find('all')->where(['CareerDynamic.school !=' => '']);
        $careerDegree = $this->CareerDynamic->find('all')->where(['CareerDynamic.degree !=' => '']);
        $careerDiscipline  = $this->CareerDynamic->find('all')->where(['CareerDynamic.discipline !=' => '']);
        $careerAboutjob = $this->CareerDynamic->find('all')->where(['CareerDynamic.about_this_job !=' => '']);
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails','careerDynamic','careerSchool','careerDegree','careerDiscipline','careerAboutjob'));
    }

    public function blog() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";


        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 5])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }
    
    public function blogDetails() {
        $title_for_layout = "Blog Details | Drape fit";
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
            pj($data);
            if(@$data['full_name']){
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
            if(@$data['rating']){
                $blograting = $this->BlogRating->newEntity();
                 $entityrat = $this->BlogRating->patchEntity($blograting, $data);
                $entityrat->blog_id = $data['blog_id'];
                $entityrat->rating = $data['rating'];
                $entityrat->rating_date = date('Y-m-d H:I:s');
                if ($this->BlogRating->save($entityrat)) {
                    //echo 'true';
                    $this->Flash->success(__('Thanks For the Review'));
                    //$this->redirect($this->referer());
                }   
                //echo $data['rating'];exit;                
            }
            if(@$data['reply_fullname']){
                
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
            if(@$data['scndreply_fullname']){
                
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
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails','blogDetails','blogComments','comntcount'));
    }

    public function faq() {

        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 10])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function aboutus() {
        $title_for_layout = "aboutus | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 3])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function privacy() {
        $title_for_layout = "privacy | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";


        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 8])->first();
        // $this->set(compact('pageDetails'));
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function helpCenter() {
        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 12])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function WorkWithUs() {
        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 13])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function whoWeAre() {
        $title_for_layout = "About us – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "DrapeFit is a modern styling platform for Men, Women and Kids. Our professional stylist works hard to make you look great and upgrade your fashion wardrobe. We provide the quality products with great deals!";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 14])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

        $this->viewBuilder()->setlayout('default');
    }

    public function termsCondition() {
        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 11])->first();

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function contactUs() {
        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 19])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
        $this->viewBuilder()->layout('default');

        if ($this->request->is('post')) {
            $data = $this->request->data;
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
                $subject1 = $emailTemplate1->display;


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
        $title_for_layout = "Map – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "Map";
        
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }
    
    public function outStylist() {
        $title_for_layout = "Our Stylist – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "Our Stylist!";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 15])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

    }
    public function returnExchange() {
        $title_for_layout = "Return and Exchange – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "Return and Exchange";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 17])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

    }
    public function trackOrder() {
        $title_for_layout = "Track Order – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "Track Order!";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 16])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

    }
    public function ourMission() {
        $title_for_layout = "Our Mission – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "Our Mission";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 18])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

    }
    public function feedbackReview() {
        $title_for_layout = "Feedback Review – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "Feedback Review";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 21])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

    }
   public function styleBlog() {
        $title_for_layout = "Style Blog – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "Style Blog";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 22])->first();
        $blogCategory = $this->BlogCategory->find('all')->order(['id'=>'asc']);
        
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails','blogCategory'));

    }
    public function investors() {
        $title_for_layout = "Investors – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "Investors";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 23])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

    }
    
    public function whatisDrapefit() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "What Is Drapefit How its work";
        $metaKeyword = "";
        $metaDescription = "What Is Drapefit How its work";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 25])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }
    public function drapefitVsShoping() {
        $this->viewBuilder()->setlayout('default');
        $title_for_layout = "Drapefit vs Online Shopping or in a store shoping";
        $metaKeyword = "";
        $metaDescription = "Drapefit vs Online Shopping or in a store shoping";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 26])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }
    public function drapefitClothing() {
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
        $title_for_layout = "Redeem | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 41])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }
    public function giftsPrints() {
        $title_for_layout = "Prints | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 42])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }
    public function giftsEmail() {
        $title_for_layout = "Email | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 43])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }
    public function giftsMail() {
        $title_for_layout = "Mail | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 44])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }
}

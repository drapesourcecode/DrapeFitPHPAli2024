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


class ApisController extends AppController {

    public function initialize() {
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
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['login']);
    }

    public function login() {
        echo "login";    
        exit;
    }

}

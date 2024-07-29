<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
     
     //$routes->connect('/', ['controller' => 'users', 'action' => 'underConstruction']);
//   $routes->connect('/', ['controller' => 'users', 'action' => 'home']);
    $routes->connect('/', ['controller' => 'users', 'action' => 'index']);
//    $routes->connect('/', ['controller' => 'users', 'action' => 'login']);

    $routes->connect('/men', ['controller' => 'users', 'action' => 'men']);
    $routes->connect('/women', ['controller' => 'users', 'action' => 'women']);
    $routes->connect('/kids', ['controller' => 'users', 'action' => 'kids']);
    $routes->connect('/users/logout', ['controller' => 'users', 'action' => 'logout']);
    $routes->connect('/logout', ['controller' => 'users', 'action' => 'logout']);
    $routes->connect('/invite-men', ['controller' => 'users', 'action' => 'invitemen']);
    $routes->connect('/invite-women', ['controller' => 'users', 'action' => 'invitewomen']);
    $routes->connect('/invite-kids', ['controller' => 'users', 'action' => 'invitekids']);
    
    $routes->connect('/fb-login', ['controller' => 'users', 'action' => 'fb_login']);
    $routes->connect('/fblogin', ['controller' => 'users', 'action' => 'fblogin']);
    $routes->connect('/fbloginCon', ['controller' => 'users', 'action' => 'fbloginCon']);
    
    $routes->connect('/payment-success', ['controller' => 'users', 'action' => 'paymentSuccess']);
    $routes->connect('/login', ['controller' => 'users', 'action' => 'index']);
    $routes->connect('/users/login', ['controller' => 'users', 'action' => 'index']);
    $routes->connect('/users/logout', ['controller' => 'users', 'action' => 'index']);
    $routes->connect('/size_fit', ['controller' => 'users', 'action' => 'size_fit']);

    $routes->connect('/catgeogryAdd/*', ['controller' => 'users', 'action' => 'catgeogryAdd']);
    $routes->connect('/registration', ['controller' => 'users', 'action' => 'registration']);
    $routes->connect('/calendar-sechedule', ['controller' => 'users', 'action' => 'calendarSechedule']);


    $routes->connect('/admin', ['controller' => 'users', 'action' => 'adminlogin']);
    $routes->connect('/webroot/login/', ['controller' => 'users', 'action' => 'webroot_redirect']);
    $routes->connect('/welcome/*', ['controller' => 'users', 'action' => 'welcome']);
    $routes->connect('/user_profile/*', ['controller' => 'users', 'action' => 'userProfile']);
    $routes->connect('/kid_profile/*', ['controller' => 'users', 'action' => 'kidProfile']);
    $routes->connect('/add_kid_profile/', ['controller' => 'users', 'action' => 'addKidProfile']);
    $routes->connect('/clients/*', ['controller' => 'users', 'action' => 'clients']);
    $routes->connect('/admin', ['controller' => 'users', 'action' => 'adminlogin']);
    $routes->connect('/changePassword/*', ['controller' => 'users', 'action' => 'changePassword']);


    $routes->connect('/about', ['controller' => 'pages', 'action' => 'aboutus']);
    $routes->connect('/who-we-are', ['controller' => 'pages', 'action' => 'whoWeAre']);
    $routes->connect('/work-with-us', ['controller' => 'pages', 'action' => 'WorkWithUs']);
    $routes->connect('/help-center', ['controller' => 'pages', 'action' => 'helpCenter']);
    $routes->connect('/map', ['controller' => 'pages', 'action' => 'map']);

    $routes->connect('/privacy-policy', ['controller' => 'pages', 'action' => 'privacy']);
    $routes->connect('/terms-conditions', ['controller' => 'pages', 'action' => 'termsCondition']);
    $routes->connect('/contact-us', ['controller' => 'pages', 'action' => 'contactUs']);
    $routes->connect('/faq', ['controller' => 'pages', 'action' => 'faq']);
    $routes->connect('/blog', ['controller' => 'pages', 'action' => 'blog']);
   // $routes->connect('/careers', ['controller' => 'pages', 'action' => 'careers']);
    $routes->connect('/cookie-info', ['controller' => 'pages', 'action' => 'cookieInfo']);
    //$routes->connect('/gifts', ['controller' => 'pages', 'action' => 'gifts']);
    $routes->connect('/sitemap', ['controller' => 'pages', 'action' => 'sitemap']);
    $routes->connect('/supply-chain-information', ['controller' => 'pages', 'action' => 'supplyChainInformation']);
     $routes->connect('/influencer-Program', ['controller' => 'pages', 'action' => 'influencerProgram']);
    $routes->connect('/news', ['controller' => 'pages', 'action' => 'news']);
    // $routes->connect('/investors', ['controller' => 'pages', 'action' => 'investors']);
    $routes->connect('/executive-team', ['controller' => 'pages', 'action' => 'executive']);
    $routes->connect('/our-stylist', ['controller' => 'pages', 'action' => 'outStylist']);
    $routes->connect('/return-exchange', ['controller' => 'pages', 'action' => 'returnExchange']);
    $routes->connect('/track-order', ['controller' => 'pages', 'action' => 'trackOrder']);
    $routes->connect('/our-mission', ['controller' => 'pages', 'action' => 'ourMission']);
    $routes->connect('/feedback-review', ['controller' => 'pages', 'action' => 'feedbackReview']);
    //$routes->connect('/style-blog', ['controller' => 'pages', 'action' => 'styleBlog']);
    // $routes->connect('/investors', ['controller' => 'pages', 'action' => 'investors']);
    //$routes->connect('/blog-details', ['controller' => 'pages', 'action' => 'blogDetails']);
    
   // $routes->connect('/gifts/redeem', ['controller' => 'pages', 'action' => 'giftsRedeem']);
   // $routes->connect('/gifts/buy/prints', ['controller' => 'pages', 'action' => 'giftsPrints']);
   // $routes->connect('/gifts/buy/email', ['controller' => 'pages', 'action' => 'giftsEmail']);
   // $routes->connect('/gifts/buy/mail', ['controller' => 'pages', 'action' => 'giftsMail']);
   // $routes->connect('/gifts-success', ['controller' => 'pages', 'action' => 'giftsSucess']);
   // $routes->connect('/gifts-card-print/*', ['controller' => 'pages', 'action' => 'giftsCardPrint']);
    
    
    $routes->connect('/women/plus-size', array('controller' => 'users', 'action' => 'plusSize'));
    $routes->connect('/women/maternity', array('controller' => 'users', 'action' => 'maternity'));
    $routes->connect('/women/petite', array('controller' => 'users', 'action' => 'petite'));
    $routes->connect('/women/women-jeans', array('controller' => 'users', 'action' => 'womenJeans'));
    $routes->connect('/women/women-business', array('controller' => 'users', 'action' => 'womenBusiness'));
    //$routes->connect('/women/activewear', array('controller' => 'users', 'action' => 'activewear'));
    
    $routes->connect('/women/activewear', array('controller' => 'users', 'action' => 'activewear'));
    $routes->connect('/women/plus/activewear', array('controller' => 'users', 'action' => 'plusActiveWear'));
    $routes->connect('/women/maternity/activewear', array('controller' => 'users', 'action' => 'maternityActiveWear'));
    
    $routes->connect('/men/big-tall', array('controller' => 'users', 'action' => 'bigTall'));
    // $routes->connect('/men/style-guide', array('controller' => 'users', 'action' => 'styleGuide'));
    
    $routes->connect('/how-it-works', ['controller' => 'users', 'action' => 'howitWorks']);
    $routes->connect('/box-pricing', ['controller' => 'users', 'action' => 'boxPricing']);
    $routes->connect('/personal-stylist', ['controller' => 'users', 'action' => 'personalStylelist']);
    
    $routes->connect('/help-center/what-is-drape-fit-how-its-work', ['controller' => 'pages', 'action' => 'whatisDrapefit']);
    $routes->connect('/help-center/drape-fit-vs-online-shopping', ['controller' => 'pages', 'action' => 'drapefitVsShoping']);
    $routes->connect('/help-center/drape-fit-clothing', ['controller' => 'pages', 'action' => 'drapefitClothing']);
    $routes->connect('/help-center/price-range-of-drape-fit-clothing', ['controller' => 'pages', 'action' => 'priceOfClothing']);
    $routes->connect('/help-center/extra-fits', ['controller' => 'pages', 'action' => 'extraFits']);
    $routes->connect('/help-center/drape-fit-testimonials', ['controller' => 'pages', 'action' => 'drapefitTestimonials']);
    $routes->connect('/help-center/customer-service', ['controller' => 'pages', 'action' => 'customerService']);
    $routes->connect('/help-center/more-styles', ['controller' => 'pages', 'action' => 'moreStyles']);
    $routes->connect('/help-center/schedule-your-shipment', ['controller' => 'pages', 'action' => 'ScheduleYourShipment']);
    $routes->connect('/help-center/faq-about-stylists', ['controller' => 'pages', 'action' => 'faqAboutStylists']);
    $routes->connect('/help-center/security', ['controller' => 'pages', 'action' => 'security']);
    $routes->connect('/help-center/more-services', ['controller' => 'pages', 'action' => 'moreServices']);
    $routes->connect('/help-center/about-style-profile', ['controller' => 'pages', 'action' => 'aboutStyleProfile']);
    $routes->connect('/help-center/find-your-size', ['controller' => 'pages', 'action' => 'findYourSize']);
    $routes->connect('/help-center/who-we-can-style', ['controller' => 'pages', 'action' => 'whoweCanstyle']);
    $routes->connect('/help-center/order-history', ['controller' => 'pages', 'action' => 'orderHistory']);

    $routes->connect('/account/*', ['controller' => 'users', 'action' => 'setAccount']);
    $routes->connect('/change-account-password', ['controller' => 'users', 'action' => 'changeAccountPassword']);
    $routes->connect('/profile-setting', ['controller' => 'users', 'action' => 'profileSetting']);
    $routes->connect('/shippingaddress', ['controller' => 'users', 'action' => 'shippingInfo']);
    $routes->connect('/order_review', ['controller' => 'users', 'action' => 'orderReview']);
    $routes->connect('/customer-order-review', ['controller' => 'users', 'action' => 'customerOrderReview']);
    $routes->connect('/checkout', ['controller' => 'users', 'action' => 'orderReview']);
    $routes->connect('/profile-review', ['controller' => 'users', 'action' => 'noreview']);
    $routes->connect('/savepayment', ['controller' => 'users', 'action' => 'savepayment']);
    $routes->connect('/frequency', ['controller' => 'users', 'action' => 'frequency']);

    $routes->connect('/chat-history', ['controller' => 'users', 'action' => 'chatHistory']);
    $routes->connect('/chat-support', ['controller' => 'users', 'action' => 'chatSupport']);
    $routes->connect('/add-shipaddress/*', ['controller' => 'users', 'action' => 'addShipAddress']);

    $routes->connect('/googlelogin', array('controller' => 'users', 'action' => 'googlelogin'));
    $routes->connect('/googleLoginReturn', array('controller' => 'users', 'action' => 'googleLoginReturn'));
    $routes->connect('/facebook-disconnect', array('controller' => 'users', 'action' => 'facebookDisconnect'));

    // $routes->connect('/help', array('controller' => 'users', 'action' => 'help'));
    // $routes->connect('/help-close', array('controller' => 'users', 'action' => 'helpClose'));
    $routes->connect('/invite/*', array('controller' => 'users', 'action' => 'invite'));
    $routes->connect('/not-yet-shipped/*', array('controller' => 'users', 'action' => 'notYetShipped'));
    $routes->connect('/order/*', array('controller' => 'users', 'action' => 'order'));
    $routes->connect('/unsubscribe/*', array('controller' => 'users', 'action' => 'unsubscribe'));
    $routes->connect('/redem_again', array('controller' => 'pages', 'action' => 'redem_again'));
    
    $routes->connect('/influencer/*', array('controller' => 'Users', 'action' => 'frontInfluencer'));

    $routes->connect('/extras/review_extras', array('controller' => 'Users', 'action' => 'reviewExtras'));
    $routes->connect('/extras', array('controller' => 'Users', 'action' => 'extras'));
    $routes->connect('/extras/extras_recommendations/*', array('controller' => 'Users', 'action' => 'extrasRecommendations'));

    $routes->connect('/gifts/pay/*', ['controller' => 'pages', 'action' => 'stripePayment']);
    $routes->connect('/add-card/*', ['controller' => 'Users', 'action' => 'addNewCard']);
    $routes->connect('/card_status/*', ['controller' => 'Users', 'action' => 'cardStatus']);
    $routes->connect('/delete-account/*', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/app-privacy', ['controller' => 'pages', 'action' => 'appPrivacy']);
    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});

Router::scope('/api', function (RouteBuilder $routes) {
    $routes->connect('/login', ['controller' => 'Ajaxs', 'action' => 'login']);
    $routes->connect('/registration', ['controller' => 'Ajaxs', 'action' => 'registration']);
    $routes->connect('/ajaxWemenFit', ['controller' => 'Ajaxs', 'action' => 'ajaxWemenFit']);
    $routes->connect('/ajaxWemenFitGetdata', ['controller' => 'Ajaxs', 'action' => 'ajaxWemenFitGetdata']);
    $routes->connect('/styleInspiration', ['controller' => 'Ajaxs', 'action' => 'styleInspiration']);
    $routes->connect('/ajaxMenFit', ['controller' => 'Ajaxs', 'action' => 'ajaxMenFit']);
    $routes->connect('/colorupdate', ['controller' => 'Ajaxs', 'action' => 'colorupdate']);
    $routes->connect('/colortrend', ['controller' => 'Ajaxs', 'action' => 'colortrend']);
    $routes->connect('/denimstyles', ['controller' => 'Ajaxs', 'action' => 'denimstyles']);
    $routes->connect('/pricerange', ['controller' => 'Ajaxs', 'action' => 'pricerange']);
    $routes->connect('/designbrand', ['controller' => 'Ajaxs', 'action' => 'designbrand']);
    $routes->connect('/ajaxKidsprofile', ['controller' => 'Ajaxs', 'action' => 'ajaxKidsprofile']);
    $routes->connect('/ajaxKidsstyle', ['controller' => 'Ajaxs', 'action' => 'ajaxKidsstyle']);

    $routes->connect('/style_sphere_selections_v3', ['controller' => 'Ajaxs', 'action' => 'styleSphereSelectionsV3']);
    $routes->connect('/style_sphere_selections_v4', ['controller' => 'Ajaxs', 'action' => 'styleSphereSelectionsV4']);
    $routes->connect('/style_sphere_selections_v5', ['controller' => 'Ajaxs', 'action' => 'styleSphereSelectionsV5']);
    $routes->connect('/style_sphere_selections_v6', ['controller' => 'Ajaxs', 'action' => 'styleSphereSelectionsV6']);
    $routes->connect('/style_sphere_selections_v7', ['controller' => 'Ajaxs', 'action' => 'styleSphereSelectionsV7']);
    $routes->connect('/style_sphere_selections_v8', ['controller' => 'Ajaxs', 'action' => 'styleSphereSelectionsV8']);
    $routes->connect('/style_sphere_selections_v9', ['controller' => 'Ajaxs', 'action' => 'styleSphereSelectionsV9']);
    $routes->connect('/style_sphere_selections_v11', ['controller' => 'Ajaxs', 'action' => 'styleSphereSelectionsV11']);
    $routes->connect('/menStyleInspiration', ['controller' => 'Ajaxs', 'action' => 'menStyleInspiration']);
    $routes->connect('/ajaxMenPrice', ['controller' => 'Ajaxs', 'action' => 'ajaxMenPrice']);
    $routes->connect('/ajaxboyKidsstyle', ['controller' => 'Ajaxs', 'action' => 'ajaxboyKidsstyle']);
    $routes->connect('/stripeCustomerKey/*', ['controller' => 'Ajaxs', 'action' => 'stripeCustomerKey']);
    $routes->connect('/StylefitPayment/*', ['controller' => 'Ajaxs', 'action' => 'StylefitPayment']);
    $routes->connect('/add-card/*', ['controller' => 'Ajaxs', 'action' => 'addNewCard']);
    $routes->connect('/card_status/*', ['controller' => 'Ajaxs', 'action' => 'cardStatus']);
    $routes->connect('/card_add_success/*', ['controller' => 'Ajaxs', 'action' => 'cardAddedSuccess']);
    $routes->connect('/address/*', ['controller' => 'Ajaxs', 'action' => 'saveAddress']);
    $routes->connect('/payment_process/*', ['controller' => 'Ajaxs', 'action' => 'paymentProcess']);
    $routes->connect('/payment-success/*', ['controller' => 'Ajaxs', 'action' => 'paymentSuccess']);
    $routes->connect('/stylefitPaymentReAuth/*', ['controller' => 'Ajaxs', 'action' => 'stylefitPaymentReAuth']);
    $routes->connect('/stylepayment/*', ['controller' => 'Ajaxs', 'action' => 'stylepayment']);
    $routes->connect('/checkChildren', ['controller' => 'Ajaxs', 'action' => 'checkChildren']);
    $routes->connect('/orderDetails', ['controller' => 'Ajaxs', 'action' => 'orderDetails']);
    $routes->connect('/orderDetailskids', ['controller' => 'Ajaxs', 'action' => 'orderDetailskids']);
    
    $routes->connect('/fitProducts/*', ['controller' => 'Ajaxs', 'action' => 'fitProducts']);
    $routes->connect('/user-details/*', ['controller' => 'Ajaxs', 'action' => 'userDetails']);
    $routes->connect('/women-style-insp/*', ['controller' => 'Ajaxs', 'action' => 'womenStyleInsp']);
    $routes->connect('/ajaxMenFitGetdata/*', ['controller' => 'Ajaxs', 'action' => 'ajaxMenFitGetdata']);
    $routes->connect('/ajaxKidFitGetdata/*', ['controller' => 'Ajaxs', 'action' => 'ajaxKidFitGetdata']);
    $routes->connect('/stylefitProducts/*', ['controller' => 'Ajaxs', 'action' => 'stylefitProducts']);
    $routes->connect('/updateStylefitProduct/*', ['controller' => 'Ajaxs', 'action' => 'updateStylefitProduct']);
    $routes->connect('/pricerangekid/*', ['controller' => 'Ajaxs', 'action' => 'pricerangekid']);
    $routes->connect('/pricerangekidboy/*', ['controller' => 'Ajaxs', 'action' => 'pricerangekidboy']);
    $routes->connect('/apiCustomerOrderReview/*', ['controller' => 'Users', 'action' => 'apiCustomerOrderReview']);
    $routes->connect('/apiCustomerOrderReviewReAuth/*', ['controller' => 'Users', 'action' => 'apiCustomerOrderReviewReAuth']);
    $routes->connect('/userAddressList/*', ['controller' => 'Ajaxs', 'action' => 'userAddressList']);
    $routes->connect('/paymentCardList/*', ['controller' => 'Ajaxs', 'action' => 'paymentCardList']);
    $routes->connect('/notYetShipped/*', ['controller' => 'Ajaxs', 'action' => 'notYetShipped']);
    $routes->connect('/deleteaddress/*', ['controller' => 'Ajaxs', 'action' => 'deleteaddress']);
    $routes->connect('/fitsetting/*', ['controller' => 'Ajaxs', 'action' => 'fitsetting']);
    $routes->connect('/kidBrandUpdate/*', ['controller' => 'Ajaxs', 'action' => 'kidBrandUpdate']);
    $routes->connect('/ajaxEmailPreformeProfile/*', ['controller' => 'Ajaxs', 'action' => 'ajaxEmailPreformeProfile']);
    $routes->connect('/ajaxforget/*', ['controller' => 'Ajaxs', 'action' => 'ajaxforget']);
    $routes->connect('/getProgressStatus/*', ['controller' => 'Ajaxs', 'action' => 'getProgressStatus']);
    $routes->connect('/ajaxMenImg/*', ['controller' => 'Ajaxs', 'action' => 'ajaxMenImg']);
    $routes->connect('/ajaxKidImg/*', ['controller' => 'Ajaxs', 'action' => 'ajaxKidImg']);
    $routes->connect('/update_basic_info/*', ['controller' => 'Ajaxs', 'action' => 'updateBasicInfo']);
    
    $routes->connect('/ajax_readme_code_check/*', ['controller' => 'Ajaxs', 'action' => 'ajaxReadmeCodeCheck']);
    $routes->connect('/ajaxReadmeCodeOrder/*', ['controller' => 'Ajaxs', 'action' => 'ajaxReadmeCodeOrder']);
    $routes->connect('/StylefitFee/*', ['controller' => 'Ajaxs', 'action' => 'StylefitFee']);
    $routes->connect('/genderUpdate/*', ['controller' => 'Ajaxs', 'action' => 'genderUpdate']);
    $routes->connect('/setaddress/*', ['controller' => 'Ajaxs', 'action' => 'setaddress']);
    $routes->connect('/addBlankKid/*', ['controller' => 'Ajaxs', 'action' => 'addBlankKid']);
    $routes->connect('/reservation_details/*', ['controller' => 'Ajaxs', 'action' => 'reservationDetails']);
    $routes->connect('/customerOrderCommentReview/*', ['controller' => 'Ajaxs', 'action' => 'customerOrderCommentReview']);
    $routes->connect('/customerOrderCommentReviewGet/*', ['controller' => 'Ajaxs', 'action' => 'customerOrderCommentReviewGet']);
    $routes->connect('/selectAddresss/*', ['controller' => 'Ajaxs', 'action' => 'selectAddresss']);
    
    
    $routes->connect('/sendSmsPost/*', ['controller' => 'Clicksend', 'action' => 'sendSmsPost']);
    
    $routes->connect('/delete-account/*', ['controller' => 'Ajaxs', 'action' => 'deleteAccount']);
    
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

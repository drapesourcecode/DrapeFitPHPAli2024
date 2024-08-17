<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;

require_once(ROOT . '/vendor/' . DS . '/barcode/vendor/autoload.php');

require_once(ROOT . '/vendor' . DS . 'PaymentTransactions' . DS . 'authorize-credit-card.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use \PHPExcel_IOFactory;

class AppadminsController extends AppController {

    public function initialize() {

        parent::initialize();

        $this->loadComponent('Custom');

        $this->loadComponent('Flash');

        $this->loadModel('Pages');

        $this->loadModel('InUsers');

        $this->loadModel('InProducts');

        $this->loadModel('InRack');

        $this->loadModel('InProductType');

        $this->loadModel('Settings');
        $this->loadModel('InColors');

        $this->viewBuilder()->layout('admin');
    }

    public function ajaxDltTbl() {

        $this->viewBuilder()->layout('');

        if ($this->request->session()->read('Auth.User.type') == 1) {

            if ($this->request->is('post')) {

                $data = $this->request->getData();

                $this->InProducts->deleteAll([1]);

                $this->InUsers->deleteAll(['id !=' => 1]);



                echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'appadmins/empty_all_tables']);
            }
        }

        EXIT;
    }

    public function emptyAllTables($userid = null) {

        $tables = ConnectionManager::get('default')->schemaCollection()->listTables();

        $this->set(compact('tables'));
    }

    public function beforeFilter(Event $event) {

        $this->Auth->allow(['logout']);
    }

    // public function index($id = null) {
    //     $this->viewBuilder()->layout('admin');        
    //     $this->set(compact('paid_users', 'men_count', 'women_count', 'kid_count'));
    // }



    public function index($id = null) {

        $this->viewBuilder()->layout('admin');

        $empId = $this->request->session()->read('Auth.User.id');



        $brands_count = $this->InUsers->find('all')->where(['type' => 3])->count();





        $this->set(compact('paid_users', 'brands_count', 'admin12', 'kid_count', 'notmen_pay', 'notwomen_pay', 'notkid_pay'));
    }

    public function profile($param = null) {

        $user_id = $this->request->session()->read('Auth.User.id');

        $rowname = $this->InUsers->find('all')->where(['InUsers.id' => $user_id])->first();

        $getCurPassword = $this->InUsers->find('all', ['fields' => ['password']])->where(['InUsers.id' => $user_id])->first();

        $settingsEmailTempletes = $this->Settings->find('all')->where(['Settings.type' => 2])->group('Settings.id');

        $row = $this->InUsers->find('all')->where(['InUsers.id' => $user_id])->first();

        $type = $this->request->session()->read('Auth.User.type');

        $this->viewBuilder()->layout('admin');

        $user = $this->InUsers->newEntity();

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $user->id = $this->request->session()->read('Auth.User.id');

            if (!empty($data['changepassword']) == 'Change password') {

                if ($data['password'] != $data['cpassword']) {

                    $this->Flash->error(__('Password and Confirm password fields do not match'));

                    return $this->redirect(['action' => 'profile/changepassword']);
                } else {



                    $hasher = new DefaultPasswordHasher();

                    $data['password'] = $hasher->hash($data['password']);

                    $user = $this->InUsers->patchEntity($user, $data);

                    if ($this->InUsers->save($user)) {

                        $this->Flash->success(__('Password has been chaged successfully.'));

                        return $this->redirect(['action' => 'profile/changepassword']);
                    } else {

                        $this->Flash->error(__('Password could not be change. Please, try again.'));

                        return $this->redirect(['action' => 'profile/changepassword']);
                    }
                }
            } else if ($data['general'] == 'save') {

                $set = $this->request->data;

                foreach ($set as $kehfhy => $value) {

                    $condition = array('name' => $kehfhy);

                    $this->Settings->updateAll(['value' => $value], ['name' => $kehfhy]);
                }

                $this->Flash->success(__('Communication emaill has been updated successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/profile/communication');
            } else {

                if (@$data['name'] == '') {

                    $this->Flash->error(__("Please enter your name"));
                } else if ($data['email'] == '') {

                    $this->Flash->error(__("Please enter your email"));
                } else {

                    if ($this->InUsers->save($user)) {

                        $this->Flash->success(__('The Profile has been update.'));

                        return $this->redirect(['action' => 'profile']);
                    } else {

                        $this->Flash->error(__('The Profile could not be update. Please, try again.'));
                    }
                }
            }
        }

        $settings = $this->Settings->find('all', ['order' => 'Settings.id DESC'])
                ->where(['Settings.type' => 1, 'Settings.is_active' => 1]);



        $this->set(compact('rowname', 'settings', 'settingsEmailTempletes', 'row', 'user', 'row', 'options', 'param', 'user_id'));
    }

    // public function delete($id = null, $table = null) {
    //     $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
    //     $data = $this->$table->get($id);
    //     $dataDelete = $this->$table->delete($data);
    //     if ($table == 'InUsers') {
    //         $this->Flash->success(__('Users has been deleted.'));
    //         return $this->redirect(HTTP_ROOT . 'appadmins/view_staff');
    //     } 
    //     if ($table == 'InProducts') {
    //         $this->Flash->success(__('Products has been deleted.'));
    //         $this->redirect($this->referer());
    //         //return $this->redirect(HTTP_ROOT . 'appadmins/view_product');
    //     }else {
    //         $this->Flash->success(__('Data has been deleted successfully.'));
    //         $this->redirect($this->referer());
    //     }
    // }



    public function productDelete($id = null, $table = null, $profile = null) {

        $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();

        $data = $this->$table->get($id);

        $dataDelete = $this->$table->delete($data);

        if ($table == 'InUsers') {



            $this->Flash->success(__('Users has been deleted.'));

            return $this->redirect(HTTP_ROOT . 'appadmins/view_staff');
        }

        if ($table == 'InProducts') {
            $dataDelete = $this->$table->deleteAll(['prod_id' => $data->prod_id]);
            $this->Flash->success(__('Products has been deleted.'));

            $this->redirect($this->referer());

            //return $this->redirect(HTTP_ROOT . 'appadmins/view_product');
        } else {

            $this->Flash->success(__('Data has been deleted successfully.'));

            $this->redirect($this->referer());
        }
    }

    public function delete($id = null, $tble = null, $profile = null) {

        if ($id) {

            if ($tble == 'InUsers') {

                $this->InUsers->deleteAll(['id' => $id]);

                $this->Flash->success(__('Data has been deleted successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/view_staff/');
            } else {
                $list = $this->InProducts->find('all')->where(['id' => $id])->first();
                $this->InProducts->deleteAll(['prod_id' => $list->prod_id]);

                $this->Flash->success(__('Data has been deleted successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/add_product/' . $profile);
            }
        }
    }

    public function productList($profile = null, $category = null) {
        $utype = $this->request->session()->read('Auth.User.type');
        if ($this->request->session()->read('Auth.User.type') == 1) {

            $menproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '1'])->group('prod_id');

            $womenproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '2'])->group('prod_id');

            $boyskidsproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '3'])->group('prod_id');

            $girlkidsproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '4'])->group('prod_id');
        } else {

            $menproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '1', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');

            $womenproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '2', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');

            $boyskidsproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '3', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');

            $girlkidsproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '4', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');
        }

        $this->set(compact('menproductdetails', 'womenproductdetails', 'boyskidsproductdetails', 'girlkidsproductdetails', 'profile', 'category','utype'));
    }

    public function addProduct($profile = null, $id = null) {


        $in_rack = [];
        if ($id) {
            $editproduct = $this->InProducts->find('all')->where(['id' => $id])->first();
            $in_rack = $this->InRack->find('all')->where(['in_product_type_id' => $editproduct->product_type])->order(['id' => 'ASC']);
        }

        $utype = $this->request->session()->read('Auth.User.type');



        if ($this->request->is('post')) {

            $data = $this->request->data;
            foreach ($data as $d_ix => $d_dd) {
                if (empty($data[$d_ix])) {
                    unset($data[$d_ix]);
                }
            }
            //  echo "<pre>";
            //         print_r($data);
            //         echo "</pre>";
            //         exit;
            $avatarName = "";
            if (!empty($data['product_image']['tmp_name'])) {
                if ($data['product_image']['size'] <= 20000) {

                    $avatarName = $this->Custom->uploadAvatarImage($data['product_image']['tmp_name'], $data['product_image']['name'], PRODUCT_IMAGES, 500);
                } else {
                    $this->Flash->error(__('Image size should be 8  to 20 kb'));
                }
            } else {
                $dataEdit = $this->InProducts->find('all')->where(['id' => $data['id']])->first();
                $avatarName = $dataEdit->product_image;
            }


            if ($id) {

//                echo "<pre>";
//                print_r($data);
//                echo "</pre>";
//                exit;
                $dataEdit = $this->InProducts->find('all')->where(['id' => $data['id']])->first();
                $data['created'] = date("Y-m-d H:i:s");

                if (!empty($data['profile_type']) && ($data['profile_type'] == '1')) {

                    $profile = "MEN";
                    $nw_profile = "M";
                } else if (!empty($data['profile_type']) && ($data['profile_type'] == 2)) {

                    $profile = "WOM";
                    $nw_profile = "W";
                } else if (!empty($data['profile_type']) && ($data['profile_type'] == 3)) {

                    $profile = "BOY";
                    $nw_profile = "B";
                } else if (!empty($data['profile_type']) && ($data['profile_type'] == 4)) {

                    $profile = "GIRL";
                    $nw_profile = "G";
                }

                if (@$data['primary_size'] == 'shirt_size') {
                    $size = $data['shirt_size'];
                } else if (@$data['primary_size'] == 'shoe_size') {
                    $size = $data['shoe_size'];
                } else if (@$data['primary_size'] == 'waist_size') {
                    $size = $data['waist_size'];
                } else if (@$data['primary_size'] == 'wshoe_size') {
                    $size = $data['shoe_size'];
                } else if (@$data['primary_size'] == 'dress_size') {
                    $size = $data['dress'];
                } else if (@$data['primary_size'] == 'skirt_size') {
                    $size = $data['skirt'];
                } else if (@$data['primary_size'] == 'bra_size') {
                    $size = $data['bra'];
                } else if (@$data['primary_size'] == 'paint_size') {
                    $size = $data['pants'];
                } else if (@$data['primary_size'] == 'top_size') {
                    $size = $data['pantsr1'];
                } else if (@$data['primary_size'] == 'blouse_size') {
                    $size = $data['shirt_blouse'];
                } else if (@$data['primary_size'] == 'blouse_size') {
                    $size = $data['shirt_blouse'];
                } else if (@$data['primary_size'] == 'jeans') {
                    $size = $data['jeans'];
                } else if (@$data['primary_size'] == 'active_wr') {
                    $size = $data['active_wr'];
                } else if (@$data['primary_size'] == 'wo_jackect_size') {
                    $size = $data['wo_jackect_size'];
                } else if (@$data['primary_size'] == 'wo_bottom') {
                    $size = $data['wo_bottom'];
                } else if (@$data['primary_size'] == 'men_bottom') {
                    $size = $data['men_bottom'];
                } else if (@$data['primary_size'] == 'free_size') {
                    $size = 'F';
                }

                $picked_size = '';
                if (!empty($data['primary_size'])) {
                    if ($data['primary_size'] == "waist_size") {
                        $picked_size = "waist_size-waist_size_run";
                        if (!empty($data['profile_type']) && ($data['profile_type'] == '1')) {
                            $picked_size = "waist_size-waist_size_run-inseam_size";
                        }
                    }
                    if ($data['primary_size'] == "shirt_size") {
                        $picked_size = "shirt_size-shirt_size_run";
                    }
                    if ($data['primary_size'] == "shoe_size") {
                        $picked_size = "shoe_size-shoe_size_run";
                    }
                    if ($data['primary_size'] == "paint_size") {
                        $picked_size = "pants";
                    }
                    if ($data['primary_size'] == "bra_size") {
                        $picked_size = "bra-bra_recomend";
                    }
                    if ($data['primary_size'] == "skirt_size") {
                        $picked_size = "skirt";
                    }
                    if ($data['primary_size'] == "dress_size") {
                        $picked_size = "dress-dress_recomended";
                    }
                    if ($data['primary_size'] == "blouse_size") {
                        $picked_size = "shirt_blouse-shirt_blouse_recomend";
                    }
                    if ($data['primary_size'] == "top_size") {
                        $picked_size = "pantsr1-pantsr2";
                    }
                    if ($data['primary_size'] == "wshoe_size") {
                        $picked_size = "shoe_size-womenHeelHightPrefer-shoe_size_run";
                    }
                    if ($data['primary_size'] == "jeans") {
                        $picked_size = "jeans";
                    }
                    if ($data['primary_size'] == "active_wr") {
                        $picked_size = "active_wr";
                    }
                    if ($data['primary_size'] == "wo_jackect_size") {
                        $picked_size = "wo_jackect_size";
                    }
                    if ($data['primary_size'] == "wo_bottom") {
                        $picked_size = "wo_bottom";
                    }
                    if ($data['primary_size'] == "men_bottom") {
                        $picked_size = "men_bottom";
                    }
                    if (in_array($profile, ["BOY", "GIRL"])) {
                        if ($data['primary_size'] == "top_size") {
                            $picked_size = "top_size";
                            $size = $data['top_size'];
                        }
                        if ($data['primary_size'] == "bottom_size") {
                            $picked_size = "bottom_size";
                            $size = $data['bottom_size'];
                        }
                        if ($data['primary_size'] == "shoe_size") {
                            $picked_size = "shoe_size";
                            $size = $data['shoe_size'];
                        }
                    }
                }
                $data['picked_size'] = $picked_size;
                if (!empty($data['budget_type'])) {
                    $data['budget_value'] = $data[$data['budget_type']];
                }
                unset($data['wo_top_budg']);
                unset($data['wo_bottoms_budg']);
                unset($data['wo_outerwear_budg']);
                unset($data['wo_jeans_budg']);
                unset($data['wo_jewelry_budg']);
                unset($data['wo_accessories_budg']);
                unset($data['wo_dress_budg']);
                unset($data['id']);
                unset($data['product_image']);
                unset($data['men_shirt_budg']);
                unset($data['men_polos_budg']);
                unset($data['men_sweater_budg']);
                unset($data['men_pants_budg']);
                unset($data['men_shorts_budg']);
                unset($data['men_shoe_budg']);
                unset($data['men_outerwear_budg']);
                unset($data['men_ties_budg']);
                unset($data['men_belts_budg']);
                unset($data['men_bags_budg']);
                unset($data['men_sunglass_budg']);
                unset($data['men_hats_budg']);
                unset($data['men_socks_budg']);
                unset($data['men_underwear_budg']);
                unset($data['men_grooming_budg']);

                $this->InProducts->updateAll($data, ['prod_id' => $dataEdit->prod_id]);
                $this->InProducts->updateAll(['product_image' => $avatarName], ['prod_id' => $dataEdit->prod_id]);
//                echo "<pre>";
//                print_r($dataEdit);
//                print_r($data);
//                echo "</pre>";
//                exit;
            } else {
                $my_rnd = rand(111, 999) . time();

                for ($ix = 1; $ix <= $data['quantity']; $ix++) {
                    $product = $this->InProducts->newEntity();
                    $product->id = '';

                    $product->user_id = $this->request->session()->read('Auth.User.id');
                    if (!empty($data['budget_type'])) {
                        $data['budget_value'] = $data[$data['budget_type']];
                    }
                    unset($data['wo_top_budg']);
                    unset($data['wo_bottoms_budg']);
                    unset($data['wo_outerwear_budg']);
                    unset($data['wo_jeans_budg']);
                    unset($data['wo_jewelry_budg']);
                    unset($data['wo_accessories_budg']);
                    unset($data['wo_dress_budg']);
                    unset($data['men_shirt_budg']);
                    unset($data['men_polos_budg']);
                    unset($data['men_sweater_budg']);
                    unset($data['men_pants_budg']);
                    unset($data['men_shorts_budg']);
                    unset($data['men_shoe_budg']);
                    unset($data['men_outerwear_budg']);
                    unset($data['men_ties_budg']);
                    unset($data['men_belts_budg']);
                    unset($data['men_bags_budg']);
                    unset($data['men_sunglass_budg']);
                    unset($data['men_hats_budg']);
                    unset($data['men_socks_budg']);
                    unset($data['men_underwear_budg']);
                    unset($data['men_grooming_budg']);

                    $product = $this->InProducts->patchEntity($product, $data);

                    $product->quantity = 1;
                    $product->is_active = 1;
                    $product->product_image = $avatarName;

                    $product->created = date("Y-m-d H:i:s");


                    if (!empty($data['profile_type']) && ($data['profile_type'] == '1')) {

                        $profile = "MEN";
                        $nw_profile = "M";
                    } else if (!empty($data['profile_type']) && ($data['profile_type'] == 2)) {

                        $profile = "WOM";
                        $nw_profile = "W";
                    } else if (!empty($data['profile_type']) && ($data['profile_type'] == 3)) {

                        $profile = "BOY";
                        $nw_profile = "B";
                    } else if (!empty($data['profile_type']) && ($data['profile_type'] == 4)) {

                        $profile = "GIRL";
                        $nw_profile = "G";
                    }


                    if (@$data['primary_size'] == 'shirt_size') {
                        $size = $data['shirt_size'];
                    } else if (@$data['primary_size'] == 'shoe_size') {
                        $size = $data['shoe_size'];
                    } else if (@$data['primary_size'] == 'waist_size') {
                        $size = $data['waist_size'];
                    } else if (@$data['primary_size'] == 'wshoe_size') {
                        $size = $data['shoe_size'];
                    } else if (@$data['primary_size'] == 'dress_size') {
                        $size = $data['dress'];
                    } else if (@$data['primary_size'] == 'skirt_size') {
                        $size = $data['skirt'];
                    } else if (@$data['primary_size'] == 'bra_size') {
                        $size = $data['bra'];
                    } else if (@$data['primary_size'] == 'paint_size') {
                        $size = $data['pants'];
                    } else if (@$data['primary_size'] == 'top_size') {
                        $size = $data['pantsr1'];
                    } else if (@$data['primary_size'] == 'blouse_size') {
                        $size = $data['shirt_blouse'];
                    } else if (@$data['primary_size'] == 'blouse_size') {
                        $size = $data['shirt_blouse'];
                    } else if (@$data['primary_size'] == 'jeans') {
                        $size = $data['jeans'];
                    } else if (@$data['primary_size'] == 'active_wr') {
                        $size = $data['active_wr'];
                    } else if (@$data['primary_size'] == 'wo_jackect_size') {
                        $size = $data['wo_jackect_size'];
                    } else if (@$data['primary_size'] == 'wo_bottom') {
                        $size = $data['wo_bottom'];
                    } else if (@$data['primary_size'] == 'men_bottom') {
                        $size = $data['men_bottom'];
                    } else if (@$data['primary_size'] == 'free_size') {
                        $size = 'F';
                    }

                    $picked_size = '';
                    if (!empty($data['primary_size'])) {
                        if ($data['primary_size'] == "waist_size") {
                            $picked_size = "waist_size-waist_size_run";
                            if (!empty($data['profile_type']) && ($data['profile_type'] == '1')) {
                                $picked_size = "waist_size-waist_size_run-inseam_size";
                            }
                        }
                        if ($data['primary_size'] == "shirt_size") {
                            $picked_size = "shirt_size-shirt_size_run";
                        }
                        if ($data['primary_size'] == "shoe_size") {
                            $picked_size = "shoe_size-shoe_size_run";
                        }
                        if ($data['primary_size'] == "paint_size") {
                            $picked_size = "pants";
                        }
                        if ($data['primary_size'] == "bra_size") {
                            $picked_size = "bra-bra_recomend";
                        }
                        if ($data['primary_size'] == "skirt_size") {
                            $picked_size = "skirt";
                        }
                        if ($data['primary_size'] == "dress_size") {
                            $picked_size = "dress-dress_recomended";
                        }
                        if ($data['primary_size'] == "blouse_size") {
                            $picked_size = "shirt_blouse-shirt_blouse_recomend";
                        }
                        if ($data['primary_size'] == "top_size") {
                            $picked_size = "pantsr1-pantsr2";
                        }
                        if ($data['primary_size'] == "wshoe_size") {
                            $picked_size = "shoe_size-womenHeelHightPrefer-shoe_size_run";
                        }
                        if ($data['primary_size'] == "jeans") {
                            $picked_size = "jeans";
                        }
                        if ($data['primary_size'] == "active_wr") {
                            $picked_size = "active_wr";
                        }
                        if ($data['primary_size'] == "wo_jackect_size") {
                            $picked_size = "wo_jackect_size";
                        }
                        if ($data['primary_size'] == "wo_bottom") {
                            $picked_size = "wo_bottom";
                        }
                        if ($data['primary_size'] == "men_bottom") {
                            $picked_size = "men_bottom";
                        }


                        if (in_array($profile, ["BOY", "GIRL"])) {
                            if ($data['primary_size'] == "top_size") {
                                $picked_size = "top_size";
                                $size = $data['top_size'];
                            }
                            if ($data['primary_size'] == "bottom_size") {
                                $picked_size = "bottom_size";
                                $size = $data['bottom_size'];
                            }
                            if ($data['primary_size'] == "shoe_size") {
                                $picked_size = "shoe_size";
                                $size = $data['shoe_size'];
                            }
                        }
//                 var_dump([in_array($profile, ["BOY", "GIRL"]),$picked_size]);exit;
                    }
                    $product->picked_size = $picked_size;




                    $brand = @$data['brand_id'];

                    $rack = @$data['rack'];

                    $ptype = @$data['product_type'];

                    $qty = @$data['quantity'];

//            @$dtls = $this->Custom->dtls($profile, $brand, @$rack, $ptype, $size, $qty);
                    @$dtls = $this->Custom->dtls($nw_profile, $brand, @$rack, $ptype, $size, $qty);



                    $product->dtls = $dtls;

                    $product->rack = $rack;

                    $product->p_type = $ptype;


                    if ($this->InProducts->save($product)) {
//                        echo "<pre>";
//                        echo $dtls;
//                        print_r($product);
//                        echo "</pre>";

                        $last_id = $product->id;
                        if (empty($last_id)) {
                            $last_id = $this->InProducts->find('all')->order(['id' => 'DESC'])->first()->id;
                        }
                        $prd_id = $dtls . "-" . $my_rnd;
                        $dtls = $dtls . '-' . $last_id . '-' . $ix;
//                        echo "<pre>";
//                        echo "<br>-" . $last_id;
//                        echo "<br>--" . $prd_id;
//                        echo "<br>---" . $dtls;
//                        echo "</pre>";
                        //Need to add code for update time no need to create
                        if (!empty($dtls)) {
                            $name = $dtls . '.png';
                            $barcode_value = $dtls;
                            $this->Custom->create_image($name);
                            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                            list($type, $dataImg) = explode(';', $dataImg);
                            list(, $dataImg) = explode(',', $dataImg);
                            $dataImg = base64_decode($dataImg);
                            file_put_contents(BARCODE . $name, $dataImg);
                            $this->InProducts->updateAll(['bar_code_img' => $name], ['id' => $last_id]);
                        }

                        $this->InProducts->updateAll(['dtls' => $dtls, 'prod_id' => $prd_id], ['id' => $last_id]);

                        //echo $profile; exit;
                        //pj($product); exit;
                    }
                }
            }
            if (!empty($data['id'])) {
                $this->Flash->success(__('Data Updated successfully.'));
                if ($profile == 'MEN' || $profile == '') {
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_product/Men/' . $id);
                }if ($profile == 'WOM') {
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_product/Women/' . $id);
                }if ($profile == 'BOY') {
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_product/BoyKids/' . $id);
                }if ($profile == 'GIRL') {
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_product/GirlKids/' . $id);
                }
            } else {
                $this->Flash->success(__('Data Inserted successfully.'));
                if ($profile == 'MEN' || $profile == '') {
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_product/Men');
                }if ($profile == 'WOM') {
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_product/Women');
                }if ($profile == 'BOY') {
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_product/BoyKids');
                }if ($profile == 'GIRL') {
                    return $this->redirect(HTTP_ROOT . 'appadmins/add_product/GirlKids');
                }
            }
        }


        if ($this->request->session()->read('Auth.User.type') == 1) {

            $menproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '1'])->group('prod_id');

            $womenproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '2'])->group('prod_id');

            $boyskidsproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '3'])->group('prod_id');

            $girlkidsproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '4'])->group('prod_id');
        } else {

            $menproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '1', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');

            $womenproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '2', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');

            $boyskidsproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '3', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');

            $girlkidsproductdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC'])->where(['profile_type' => '4', 'brand_id' => $this->request->session()->read('Auth.User.id')])->group('prod_id');
        }



        $brandsListings = $this->InUsers->find('all')->where(['type' => 3])->order(['id']);

        $productType = $this->InProductType->find('all')->order(['id' => 'ASC']);



        $this->set(compact('utype', 'in_rack', 'productType', 'id', 'editproduct', 'menproductdetails', 'womenproductdetails', 'boyskidsproductdetails', 'girlkidsproductdetails', 'profile', 'brandsListings'));
    }

    function brandName($id = null) {

        if (@$id) {

            $brand_name = $this->InUsers->find('all')->contain(['InProducts'])->where(['InProducts.user_id' => $this->Auth->InUsers('id')])->first();

            return($brand_name);
        }
    }

    public function viewProduct() {

        $productdetails = $this->InProducts->find('all')->order(['InProducts.id' => 'DESC']);

        $this->set(compact('productdetails'));
    }

    public function productimgdelete($profile = null, $id = null) {

        $this->viewBuilder()->layout('admin');

        if ($id) {

            $list = $this->InProducts->find('all', ['Fields' => ['product_image']])->where(['id' => $id])->first();

            unlink(PRODUCT_IMAGES . '/' . $list->product_image);

            $this->InProducts->updateAll(array('product_image' => NULL), array(['prod_id' => $list->prod_id]));

            if ($profile == 'Men' || $profile == '') {

                $this->Flash->success(__('Image Deleted successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/add_product/Men/' . $id);
            }if ($profile == 'Women') {

                $this->Flash->success(__('Image Deleted successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/add_product/Women/' . $id);
            }if ($profile == 'BoyKids') {

                $this->Flash->success(__('Image Deleted successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/add_product/BoyKids/' . $id);
            }if ($profile == 'GirlKids') {

                $this->Flash->success(__('Image Deleted successfully.'));

                $this->redirect(HTTP_ROOT . 'appadmins/add_product/GirlKids/' . $id);
            }
        }
    }

    public function createStaff($id = null) {



        if ($id) {

            $editAdmin = $this->InUsers->find('all')->where(['InUsers.id' => $id])->first();
        }

        if ($this->request->is('post')) {



            $exitEmail = $this->InUsers->find('all')->where(['InUsers.email' => @$data['email']])->count();

            $password = @$data['password'];

            $conpassword = @$data['cpassword'];

            if ($exitEmail >= 1) {

                $this->Flash->error(__('This  Email is already exists.'));
            }

            if ($password != $conpassword) {

                $this->Flash->error(__("Password and confirm password are not same"));
            } else {

                $admin = $this->InUsers->newEntity();

                $data = $this->request->data;

                // $hasher = new DefaultPasswordHasher();
                // $pwd = $hasher->hash($password);

                $data['unique_id'] = $this->Custom->generateUniqNumber();

                $data['password'] = (new DefaultPasswordHasher)->hash($data['password']);

                $data['created_dt'] = date("Y-m-d H:i:s");

                $data['modified'] = date("Y-m-d H:i:s");

                $data['is_active'] = 1;

                $data['type'] = 3;

                $admin = $this->InUsers->patchEntity($admin, $data);



                if (@$id) {

                    $admin->id = $id;
                } else {

                    $admin->id = '';
                }

                //print_r($data);
                // print_r($admin); exit;

                if ($this->InUsers->save($admin)) {



                    if ($id) {

                        $this->Flash->success(__('Data updated successfully.'));

                        // return $this->redirect(HTTP_ROOT . 'appadmins/create_staff/' . $id);

                        return $this->redirect(HTTP_ROOT . 'appadmins/view_staff/');
                    } else {

                        /*
                          $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                          $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                          $to = $admin->email;
                          $from = $fromMail->value;
                          $subject = $emailMessage->display;
                          $sitename = SITE_NAME;
                          $password = $password;

                          //echo "hello";
                          //echo $password;exit;

                          $message = $this->Custom->createAdminFormat($emailMessage->value, $admin->name, $admin->email, $password, $sitename);
                          $kid_id = 0;
                          $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);

                          $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                          $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);
                         */

                        $this->Flash->success(__('Data add successfully.'));

                        return $this->redirect(HTTP_ROOT . 'appadmins/view_staff');
                    }
                }
            }
        }

        $this->set(compact('admin', 'id', 'editAdmin'));
    }

    public function viewStaff() {

        $adminLists = $this->InUsers->find('all', ['InUsers.id' => 'DESC'])->where(['InUsers.type' => 3]);

        $this->set(compact('adminLists'));
    }

    public function setPassword($id = null) {

        $passwordData = $this->InUsers->newEntity();

        $setPassword = $this->InUsers->find('all')->where(['InUsers.id' => $id])->first();

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $password = $data['password'];
            $conpassword = $data['cpassword'];

            if ($password != $conpassword) {

                $this->Flash->error(__("Password and confirm password are not same"));
            } else {

                $data['password'] = (new DefaultPasswordHasher)->hash($data['password']);

                $passwordData = $this->InUsers->patchEntity($passwordData, $data);

                $passwordData->id = $data['id'];

                if ($this->InUsers->save($passwordData)) {

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();

                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

                    $to = $setPassword->email;

                    $from = $fromMail->value;

                    $subject = $emailMessage->display;

                    $sitename = SITE_NAME;

                    $message = $this->Custom->createAdminFormat($emailMessage->value, $setPassword->name, $to, $password, $sitename);

                    $kid_id = 0;

                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);

                    $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;

                    $this->Custom->sendEmail($toSupport, $from, $subject, $message, $kid_id);

                    $this->Flash->success(__('Password set successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/view_staff');
                }
            }
        }

        $this->set(compact('passwordData', 'setPassword'));
    }

    public function deactive($id = null, $table = null) {

        $active_column = 'is_active';

        if ($this->$table->query()->update()->set([$active_column => 0])->where(['id' => $id])->execute()) {

            if ($table == 'InProducts') {

//                $this->$table->query()->update()->set(['is_active' => 0, 'available_status' => 2])->where(['id' => $id])->execute();
                $list = $this->InProducts->find('all')->where(['id' => $id])->first();
                $this->$table->updateAll(['is_active' => 0, 'available_status' => 2], ['prod_id' => $list->prod_id]);

                $this->Flash->success(__('Product is deactivated.'));

                $this->redirect($this->referer());
            } else if ($table == 'InUsers') {

                $this->$table->query()->update()->set(['is_active' => 0])->where(['id' => $id])->execute();

                $this->Flash->success(__('User has been deactivated.'));

                $this->redirect($this->referer());
            }
        }
    }

    public function active($id = null, $table = null) {

        $active_column = 'is_active';

        if ($this->$table->query()->update()->set([$active_column => 1])->where(['id' => $id])->execute()) {

            if ($table == 'InProducts') {

//                $this->$table->query()->update()->set(['is_active' => 1, 'available_status' => 1])->where(['id' => $id])->execute();
                $list = $this->InProducts->find('all')->where(['id' => $id])->first();
                $this->$table->updateAll(['is_active' => 1, 'available_status' => 1], ['prod_id' => $list->prod_id]);

                $this->Flash->success(__('Product is activated.'));

                $this->redirect($this->referer());
            } else if ($table == 'InUsers') {

                $this->$table->query()->update()->set(['is_active' => 1])->where(['id' => $id])->execute();

                $this->Flash->success(__('User has been activated.'));

                $this->redirect($this->referer());
            }
        }
    }

    public function editMailTempletes($id = null) {

        $this->viewBuilder()->layout('admin');

        $row = $this->Settings->find('all')->where(['Settings.id' => $id])->first();

        $dataEntity = $this->Settings->newEntity();

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $dataEntity = $this->Settings->patchEntity($dataEntity, $data);

            $this->Settings->save($dataEntity);

            $this->Flash->success(__('Email templet has been update successfully.'));

            return $this->redirect(HTTP_ROOT . 'appadmins/profile/emailTemplete');
        }

        $this->set(compact('id', 'row'));
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

    public function rackSet($catg = null, $id = null) {
        $all_category = $this->InProductType->find('all');

        if (@$id) {
            $editData = $this->InRack->find('all')->where(['id' => $id])->first();

            @$getNumber = $editData->rack_number;
        } else {

            @$getNumber = $this->InRack->find('all')->order(['id' => 'DESC'])->first()->rack_number + 1;
        }

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $ent = $this->InRack->newEntity();

            if (@$data['id']) {

                $checkData = $this->InRack->find('all')->where(['rack_name' => trim(strtoupper($data['rack_name'])), 'id !=' => $data['id']])->first();

                if (@$checkData->rack_name != '') {

                    $this->Flash->error(__('Name is already exit'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/rack_set/' . $data['id']);

                    //break;
                }

                $ent->id = $id;
            } else {

                $checkData = $this->InRack->find('all')->where(['rack_name' => trim(strtoupper($data['rack_name']))])->first();

                if (@$checkData->rack_name != '') {

                    $this->Flash->error(__('Name is already exit'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/rack_set');

                    //break;
                }



                $ent->id = '';

                $data['rack_name'] = strtoupper($data['rack_name']);

                $data['is_active'] = 1;
            }

            $ent = $this->InRack->patchEntity($ent, $data);

            if ($this->InRack->save($ent)) {

                if ($id) {

                    $this->Flash->success(__('Data Updated successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/rack_set/' . $catg . '/' . $id);
                } else {

                    $this->Flash->success(__('Data Inserted successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/rack_set');
                }
            }
        }

        $this->InRack->belongsTo('ipt', ['className' => 'InProductType', 'foreignKey' => 'in_product_type_id']);
        $datas = $this->InRack->find('all')->order(['InRack.id' => 'asc'])->contain(['ipt']);

        $this->set(compact('id', 'editData', 'getNumber', 'datas', 'all_category', 'catg'));
    }

    public function rackDelete($id = null) {

        $getDetail = $this->InRack->find('all')->where(['id' => $id])->first();

        $data = $this->InRack->get($id);

        $dataDelete = $this->InRack->delete($data);

        if ($dataDelete) {

            $this->Flash->success(__('Data has been deleted successfully.'));

            $this->redirect($this->referer());
        }
    }

    public function productType($id = null) {

        if (@$id) {

            $editData = $this->InProductType->find('all')->where(['id' => $id])->first();
        }

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $ent = $this->InProductType->newEntity();

            if (@$data['id']) {

                $checkData = $this->InProductType->find('all')->where(['product_type' => trim(strtoupper($data['product_type'])), 'id !=' => $data['id']])->first();

                if (@$checkData->product_type != '') {

                    $this->Flash->error(__('Name is already exit'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/product_type/' . $data['id']);

                    //break;
                }

                $ent->id = $id;
            } else {

                $checkData = $this->InProductType->find('all')->where(['product_type' => trim(strtoupper($data['product_type']))])->first();

                if (@$checkData->product_type != '') {

                    $this->Flash->error(__('Name is already exit'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/product_type');

                    //break;
                }

                $ent->id = '';

                $data['product_type'] = strtoupper($data['product_type']);

                $data['is_active'] = 1;
            }

            $ent = $this->InProductType->patchEntity($ent, $data);

            if ($this->InProductType->save($ent)) {

                if ($id) {

                    $this->Flash->success(__('Data Updated successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/product_type/' . $id);
                } else {

                    $this->Flash->success(__('Data Inserted successfully.'));

                    return $this->redirect(HTTP_ROOT . 'appadmins/product_type');
                }
            }
        }

        $datas = $this->InProductType->find('all')->order(['id' => 'asc']);

        $this->set(compact('id', 'editData', 'datas'));
    }

    public function productTypeDelete($id = null) {

        $getDetail = $this->InProductType->find('all')->where(['id' => $id])->first();

        $data = $this->InProductType->get($id);

        $dataDelete = $this->InProductType->delete($data);

        if ($dataDelete) {

            $this->Flash->success(__('Data has been deleted successfully.'));

            $this->redirect($this->referer());
        }
    }

    public function getSubCatgList() {
        $html = '<option value="" selected disabled>No data found</option>';
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $allData = $this->InRack->find('all')->where(['in_product_type_id' => $data['id']]);
            if (!empty($allData->count())) {
                $html = '';
                foreach ($allData as $list) {
                    $html .= '<option value="' . $list->id . '">' . $list->rack_number . '-' . $list->rack_name . '</option>';
                }
            }
        }
        echo $html;
        exit;
    }

    public function listProduct($prod_id) {
        $all_products = $this->InProducts->find('all')->where(['prod_id' => $prod_id])->order(['id' => 'DESC']);
        $this->set(compact('all_products'));
    }

    public function barcodePrints($id = null) {
        $this->viewBuilder()->layout('');
        $product = $this->InProducts->find('all')->where(['id' => $id])->first();
        $this->set(compact('product'));
    }

    public function allBarcodePrints($prod_id = null) {
        $this->viewBuilder()->layout('');
        $all_product = $this->InProducts->find('all')->where(['prod_id' => $prod_id]);
        $this->set(compact('all_product'));
    }

    public function inColor($id = null, $option = null) {
        $all_data = $this->InColors->find('all');
        $editData = [];
        if (!empty($id)) {
            $editData = $this->InColors->find('all')->where(['id' => $id])->first();
        }
        if (!empty($option) && ($option == "delete")) {
            $editData = $this->InColors->deleteAll(['id' => $id]);
            $this->Flash->success(__('Color has been deleted successfully.'));
            $this->redirect(HTTP_ROOT . 'appadmins/in_color');
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (!empty($id)) {
                $data['id'] = $id;
            }

            $dataEntity = $this->InColors->newEntity();
            $dataEntity = $this->InColors->patchEntity($dataEntity, $data);
            $this->InColors->save($dataEntity);
            if (!empty($id)) {
                $this->Flash->success(__('Color has been updated successfully.'));
                $this->redirect(HTTP_ROOT . 'appadmins/in_color/' . $id . '/edit');
            } else {
                $this->Flash->success(__('Color has been added successfully.'));
                $this->redirect(HTTP_ROOT . 'appadmins/in_color');
            }
        }

        $this->set(compact('editData', 'all_data'));
    }

}

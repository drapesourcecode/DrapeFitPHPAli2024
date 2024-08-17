<?php

namespace Cake\View\Helper;

use Cake\View\Helper;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class CustomHelper extends Helper
{

    function brandName($id)
    {
        $table = TableRegistry::get('Inusers');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->brand_name;
    }

    function brandNamex($id)
    {
        $table = TableRegistry::get('Inusers');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->brand_name;
    }

    function productQuantity($prod_id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['prod_id' => $prod_id, 'match_status' => 2, 'allocate_to_user_id IS' => NULL, 'allocate_to_kid_id IS' => NULL])->count();
        return $query;
    }

    function inColor()
    {
        $table = TableRegistry::get('InColors');
        $query = $table->find('all');
        $clor = [];
        foreach ($query as $inx => $clr) {
            $clor[$clr->id] = $clr->name;
        }
        return $clor;
    }
    function InBrandsName($id)
    {
        $table2 = TableRegistry::get('InProducts');
        $query1 = $table2->find('all')->where(['id' => $id])->first();
        $table = TableRegistry::get('InUsers');
        $query = $table->find('all')->where(['id' => $query1->brand_id])->first();
        return $query->brand_name;
    }
    function Inproductnameone($id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query;
    }
    function imgpath($id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();

        if (($query->product_id == '') || ($query->product_id == '0')) {
            return HTTP_ROOT_INV; //HTTP_ROOT;
        } else {
            return HTTP_ROOT_INV;
        }
    }
    function InproductsalePrice($id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->sale_price;
    }
    function InproductImage($id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->product_image;
    }
    function InproductPrice($id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->purchase_price;
    }
    function tallFeet($id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->tall_feet;
    }
    function bodyweight($id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->best_fit_for_weight;
    }
    function tallInch($id)
    {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->tall_inch;
    }
    

    function ToOrdinal($n) {
        $ordinal = "";
        if ($n >= 0 && $n <= 999)
            null;
        else {
            null;
            return;
        }
        $u = $n % 10;
        $t = floor(($n / 10) % 10);
        $h = floor($n / 100);
        if ($h > 0) {
            $ordinal .= ToCardinalUnits($h);
            $ordinal .= " hundred";
            if ($t == 0 && $u == 0) {
                $ordinal .= "th";
            } else {
                $ordinal .= " ";
            }
        }
        if ($t >= 2 && $u != 0) {
            switch ($t) {
                case 2:
                    $ordinal .= "twenty-";
                    break;
                case 3:
                    $ordinal .= "thirty-";
                    break;
                case 4:
                    $ordinal .= "forty-";
                    break;
                case 5:
                    $ordinal .= "fifty-";
                    break;
                case 6:
                    $ordinal .= "sixty-";
                    break;
                case 7:
                    $ordinal .= "seventy-";
                    break;
                case 8:
                    $ordinal .= "eighty-";
                    break;
                case 9:
                    $ordinal .= "ninety-";
                    break;
            }
        }
        if ($t >= 2 && $u == 0) {
            switch ($t) {
                case 2:
                    $ordinal .= "twentieth";
                    break;
                case 3:
                    $ordinal .= "thirtieth";
                    break;
                case 4:
                    $ordinal .= "fortieth";
                    break;
                case 5:
                    $ordinal .= "fiftieth";
                    break;
                case 6:
                    $ordinal .= "sixtieth";
                    break;
                case 7:
                    $ordinal .= "seventieth";
                    break;
                case 8:
                    $ordinal .= "eightieth";
                    break;
                case 9:
                    $ordinal .= "ninetieth";
                    break;
            }
        }
        if ($t == 1) {
            switch ($u) {
                case 0:
                    $ordinal .= "tenth";
                    break;
                case 1:
                    $ordinal .= "eleventh";
                    break;
                case 2:
                    $ordinal .= "twelfth";
                    break;
                case 3:
                    $ordinal .= "thirteenth";
                    break;
                case 4:
                    $ordinal .= "fourteenth";
                    break;
                case 5:
                    $ordinal .= "fifteenth";
                    break;
                case 6:
                    $ordinal .= "sixteenth";
                    break;
                case 7:
                    $ordinal .= "seventeenth";
                    break;
                case 8:
                    $ordinal .= "eighteenth";
                    break;
                case 9:
                    $ordinal .= "nineteenth";
                    break;
            }
        }

        if ($t != 1) {
            switch ($u) {
                case 0:
                    if ($n == 0)
                        $ordinal .= "zeroth";
                    break;
                case 1:
                    $ordinal .= "first";
                    break;
                case 2:
                    $ordinal .= "second";
                    break;
                case 3:
                    $ordinal .= "third";
                    break;
                case 4:
                    $ordinal .= "fourth";
                    break;
                case 5:
                    $ordinal .= "fifth";
                    break;
                case 6:
                    $ordinal .= "sixth";
                    break;
                case 7:
                    $ordinal .= "seventh";
                    break;
                case 8:
                    $ordinal .= "eighth";
                    break;
                case 9:
                    $ordinal .= "ninth";
                    break;
            }
        }
        return $ordinal;
    }
    
    function removeDoller($string = null) {
        if (!empty($string)) {

            if ($string == 'I want the best') {

                return "";
            } else {
                return "$";
            }
        }

        return "";
    }

    public function getStripeKey() {
        $payment_mode_tb = TableRegistry::get('Paymentmode');
        $cofig_keys_tb = TableRegistry::get('CofigKeys');

        $get_payment_mode = $payment_mode_tb->find('all')->first();
        if($get_payment_mode->value == 1 ){
            $stripe_key = $cofig_keys_tb->find('all')->where(['name' => 'stripe_live_key'])->first();
        }else{
            $stripe_key = $cofig_keys_tb->find('all')->where(['name' => 'stripe_test_key'])->first();
        }

        $stripe_api_key = json_decode($stripe_key->key_val, true);
        return $stripe_api_key;

    }
}

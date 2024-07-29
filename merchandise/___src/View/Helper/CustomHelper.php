<?php

namespace Cake\View\Helper;

use Cake\View\Helper;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class CustomHelper extends Helper {

    function brandName($id) {
        $table = TableRegistry::get('Inusers');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->brand_name;
    }

    function brandNamex($id) {
        $table = TableRegistry::get('Inusers');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->brand_name;
    }

    function productQuantity($prod_id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['prod_id' => $prod_id, 'match_status' => 2])->count();
        return $query;
    }

    function inColor() {
        $table = TableRegistry::get('InColors');
        $query = $table->find('all');
        $clor = [];
        foreach ($query as $inx => $clr) {
            $clor[$clr->id] = $clr->name;
        }
        return $clor;
    }
    function InBrandsName($id) {
        $table2 = TableRegistry::get('InProducts');
        $query1 = $table2->find('all')->where(['id' => $id])->first();
        $table = TableRegistry::get('InUsers');
        $query = $table->find('all')->where(['id' => $query1->brand_id])->first();
        return $query->brand_name;
    }
    function Inproductnameone($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query;
    }
    function imgpath($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();

        if (($query->product_id == '') || ($query->product_id == '0')) {
            return HTTP_ROOT;
        } else {
            return HTTP_ROOT;
        }
    }
    function InproductsalePrice($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->sale_price;
    }
    function InproductImage($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->product_image;
    }
    function InproductPrice($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->purchase_price;
    }
    function tallFeet($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->tall_feet;
    }
    function bodyweight($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->best_fit_for_weight;
    }
    function tallInch($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->tall_inch;
    }
}

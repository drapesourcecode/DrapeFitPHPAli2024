<?php

namespace Cake\View\Helper;

use Cake\View\Helper;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class CustomHelper extends Helper {
    
    function requestDate($id = null) {

        $table = TableRegistry::get('DeliverDate');
        $query = $table->find('all')->where(['id' => $id])->first()->date_in_time;
        return $query;
    }
    
    function kidName($id) {
        $table = TableRegistry::get('KidsDetails');
        $query = $table->find('all')->where(['id' => $id])->first();
        $name = '';
        if (!empty($query->kids_first_name)) {
            $name = $query->kids_first_name;
        }
        
        return $name;
    }
    
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
        $query = $table->find('all')->where(['prod_id' => $prod_id, 'match_status' => 2,'InProducts.is_merchandise' => 0])->count();
        return $query;
    }
    function productQuantityM($prod_id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['prod_id' => $prod_id, 'InProducts.is_merchandise' => 1])->count();
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

}

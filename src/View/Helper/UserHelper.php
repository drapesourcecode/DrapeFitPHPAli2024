<?php

namespace Cake\View\Helper;

use Cake\View\Helper;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;


class UserHelper extends Helper {

    
    function styleFitFee() {
        $table = TableRegistry::get('Settings');
        $query = $table->find('all')->where(['name' => 'style_fee'])->first();
        $name = 0;
        if (!empty($query->value)) {
            $name = $query->value;
        }
        
        return $name;
    }
    
    function getPromoCode($paymentId=null){
        $table = TableRegistry::get('UserAppliedCodeOrderReview');
        $query = $table->find('all')->where(['payment_id' => $paymentId])->order(['id'=>'ASC']);                
        return $query;
    }
     
    function totalprodiscount($paymentId=null){
        $table = TableRegistry::get('Products');
        $query = $table->find('all')->where(['payment_id' => $paymentId, 'keep_status' => 3]); 
        $productCount = $table->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
        $exCountKeeps = $table->find('all')->where(['payment_id' => $paymentId, 'keep_status' => 3])->Count();
        
         if (@$exCountKeeps != 0) {
                if (@$productCount == @$exCountKeeps) {
                     foreach ($query as $pd) {
            $sellprice = $pd->sell_price;
            $total_pic_pric += (double) $sellprice;
        }
                } else {
                    $total_pic_pric=0;
                }
            }
        
       
        return $total_pic_pric;
    }
    
    function isstylefee($paymentId=null){
        $table = TableRegistry::get('PaymentGetways');
        $query = $table->find('all')->where(['id' => $paymentId])->first()->is_style_fee; 
        return $query;       
    }
    
    function getStylistId($id = null){
        $table = TableRegistry::get('CustomerStylist');
        $query = $table->find('all')->where(['user_id' => $id,'kid_id'=>0])->first(); 
        return @$query->employee_id;   
    }
    function getStylistIdKid($id = null){
        $table = TableRegistry::get('CustomerStylist');
        $query = $table->find('all')->where(['kid_id' => $id])->first(); 
        return @$query->employee_id;   
    }
     function getStylistIdNameKid($id = null) {
        $table = TableRegistry::get('CustomerStylist');
        $query = $table->find('all')->where(['kid_id' => $id])->first();
        $Utable = TableRegistry::get('Users');
        @$name = $Utable->find('all')->where(['id' => @$query->employee_id])->first()->name;
        if(@$name!=''){
             $stylistName= $name;
        }else{
            $stylistName="Not assinge yet";
        }
        return @$stylistName;
    }
    

    function getStylistIdKidName($id = null) {
        $table = TableRegistry::get('CustomerStylist');
        $query = $table->find('all')->where(['kid_id' => $id])->first();
        $Utable = TableRegistry::get('Users');
        $name = $Utable->find('all')->where(['id' => @$query->employee_id])->first()->name;
        if($name!=''){
             $stylistName= $name;
        }else{
            $stylistName="Not assinge yet";
        }
        return @$stylistName;
    }
   

}

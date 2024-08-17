<?php

  namespace App\Model\Table;

  use App\Model\Entity\User;
  use Cake\ORM\Query;
  use Cake\ORM\RulesChecker;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;
  use Cake\ORM\TableRegistry;

  /**
   * Users Model
   *
   */
  class KidsDetailsTable extends Table
   {

   /**
    * Initialize method
    *
    * @param array $config The configuration for the Table.
    * @return void
    */
   public function initialize(array $config) {
    parent::initialize($config);
 $this->hasOne('KidsPersonality', [
            'className' => 'KidsPersonality',
            'foreignKey' => 'kid_id',
        ]);
$this->hasOne('KidsSizeFit', [
           'className' => 'KidsSizeFit',
           'foreignKey' => 'kid_id',
       ]);
 $this->hasOne('KidClothingType', [
            'className' => 'KidClothingType',
            'foreignKey' => 'kid_id',
        ]);
 $this->hasOne('KidsPricingShoping', [
            'className' => 'KidsPricingShoping',
            'foreignKey' => 'kid_id',
        ]);
 $this->hasOne('KidPurchaseClothing', [
            'className' => 'KidPurchaseClothing',
            'foreignKey' => 'kid_id',
        ]);
 $this->hasOne('KidsPrimary', [
            'className' => 'KidsPrimary',
            'foreignKey' => 'kid_id',
        ]);
 $this->hasOne('KidStyles', [
            'className' => 'KidStyles',
            'foreignKey' => 'kid_id',
        ]);
   }

   

   }

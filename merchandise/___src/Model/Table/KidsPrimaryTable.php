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
  class KidsPrimaryTable extends Table
   {

   /**
    * Initialize method
    *
    * @param array $config The configuration for the Table.
    * @return void
    */
   public function initialize(array $config) {
    parent::initialize($config);
 $this->hasOne('KidsPrimary', [
            'className' => 'KidsPrimary',
            'foreignKey' => 'kid_id',
        ]);
// $this->hasOne('KidsDetails', [
//            'className' => 'KidsDetails',
//            'foreignKey' => 'user_id',
//        ]);
// $this->hasOne('MenStats', [
//            'className' => 'MenStats',
//            'foreignKey' => 'user_id',
//        ]);
// $this->hasOne('SizeChart', [
//            'className' => 'SizeChart',
//            'foreignKey' => 'user_id',
//        ]);
   }

   

   }

<?php

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Users Model
 *
 */
class PagesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        $this->hasOne('Menus', [
            'className' => 'Menus',
            'foreignKey' => 'page_id',
           //  'propertyName' => 'Menus',
           // 'conditions' => ['Menus.parent_id' => 1],
        ]);
        
    }

}

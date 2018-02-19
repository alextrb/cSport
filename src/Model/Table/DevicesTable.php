<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DevicesTable extends Table {
    
    public function getAuthDevices() {
        $auth_devices = $this->find();
        return $auth_devices->toArray();
    }
}
<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DevicesTable extends Table {
    
    public function getAuthDevices() {
        $auth_devices = $this
                ->find()
                ->where(['trusted =' => 1]);
        return $auth_devices;
    }
    
    public function getWaitingDevices() {
        $waiting_devices = $this
                ->find()
                ->select(['id', 'serial', 'description', 'trusted'])
                ->where(['trusted =' => 0]);
        return $waiting_devices;
    }
}
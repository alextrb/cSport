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
    
    public function deleteDevice($device_id)
    {
        return $this->deleteall(['id' => $device_id],$cascade = true, $callbacks = false);
    }
    
    public function validateDevice($device_id)
    {
        $asking_device = $this->get($device_id);
        $asking_device->trusted = 1;
        return $this->save($asking_device);
    }
}
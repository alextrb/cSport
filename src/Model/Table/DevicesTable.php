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
        $entity_device = $this->get($device_id);
        return $this->delete($entity_device);
    }
    
    public function validateDevice($device_id)
    {
        $asking_device = $this->get($device_id);
        $asking_device->trusted = 1;
        return $this->save($asking_device);
    }
}
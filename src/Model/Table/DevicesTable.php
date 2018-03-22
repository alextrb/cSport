<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DevicesTable extends Table {
    
    public function getDeviceFromSerial($device_serial)
    {
        $device = $this->find()
                       ->where(['serial =' => $device_serial])
                       ->first();
        return $device;
    }
    
    public function getAuthDevices($member_id) {
        $auth_devices = $this
                ->find()
                ->where(['trusted =' => 1, 'member_id =' => $member_id]);
        return $auth_devices;
    }
    
    public function getWaitingDevices($member_id) {
        $waiting_devices = $this
                ->find()
                ->select(['id', 'serial', 'description', 'trusted'])
                ->where(['trusted =' => 0, 'member_id =' => $member_id]);
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
    
    public function checkAuthDevice($serial, $member_id)
    {
        $device = $this
                ->find()
                ->where(['serial =' => $serial, 'member_id =' => $member_id, 'trusted =' => 1])
                ->first();

        return $device;
    }
}
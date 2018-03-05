<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class LogsTable extends Table {
    /*
     * Getter pour récupérer tous les relevés d'un membre
     */

    public function getLogsOfMember($id_member) {

        $logs_member = $this->find('all', array('conditions' => array('member_id' => $id_member)));
        return $logs_member->toArray();
    }

    /*
     * Permet de calculer le score d'un membre
     */

    public function CalculMemberScore($id_member) {

        $logs_member = $this->find('all', array('conditions' => array('member_id' => $id_member)))->toArray();
        $member_score = 0.0;
        $final_score = 0.0;

        foreach ($logs_member as $log) {
            $member_score = $member_score + $log->log_value;
        }

        if ($member_score != 0.0) {
            $final_score = $member_score / (sizeof($logs_member));
        } else {
            $final_score = 0.0;
        }

        return $final_score;
    }

    public function getAllSeancesLocations() {
        $allLocations = $this
                ->find()
                ->select(['workout_id', 'location_latitude', 'location_logitude'])
                ->distinct(['workout_id'])
                ->toArray();

        $locations_array = array();

        foreach ($allLocations as $workoutLocation) {
            $new_row = array(
                'lat' => $workoutLocation->location_latitude,
                'lng' => $workoutLocation->location_logitude
            );
            array_push($locations_array, $new_row);
        }
        pr(json_encode($locations_array));
        return json_encode($locations_array);
    }

}

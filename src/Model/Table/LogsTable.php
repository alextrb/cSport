<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class LogsTable extends Table {
    /*
     * Getter pour récupérer tous les relevés d'un membre
     */
    public function getLogs($id){
      $logs = $this
              ->find()              
              ->where(["workout_id" => $id]);
      return $logs;
  }
  
    public function addLogs($mi, $wi, $di, $date, $lat, $long, $type, $value){
        if($lat == '' || $long == '' || $type == '' || $value == ''){
              echo 'Veuillez remplir tous les champs';
          }
          else{
              $new_log = $this->newEntity();
              $new_log->member_id = $mi;
              $new_log->workout_id = $wi;
              $new_log->device_id = $di;
              $new_log->date = $date;
              $new_log->location_latitude = $lat;
              $new_log->location_logitude = $long;
              $new_log->log_type = $type;
              $new_log->log_value = $value;           
              $this->save($new_log);
          }   
    }
    
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
    
    public function getPompes($id){
        $pompes_total = 0;
        $pompesPourcent = 0;
        $pompes_logs = $this
                ->find()
                ->where(["log_type =" => "Pompes"]);
        foreach ($pompes_logs as $p){
            $pompes_total = $pompes_total + $p->log_value;
            //pr($pompes_total);
        }
        //pr($pompes_total);

        $pompes_logs1 = $this
                ->find()
                ->where(["log_type =" => "Pompes", "workout_id =" => $id]);
        foreach ($pompes_logs1 as $p){
            $pompesPourcent = ($p->log_value/$pompes_total)*100;
            //pr($p->log_value);
            //pr($pompes_total);
            //pr($pompesPourcent);
        }
        //pr($pompes_total);
        return $pompesPourcent;
    }

    public function getPompesTotal($id){
        $pompes_total = 0;
        $pompes_logs = $this
              ->find()
              ->where(["log_type =" => "Pompes", "member_id =" => $id]);
        foreach ($pompes_logs as $p){
            $pompes_total = $pompes_total + $p->log_value;       
        }
        return $pompes_total;
    }
  
    public function getLogsTotal($id) {
        $logs_total = 0;
        $logs = $this->find()
                ->where(["member_id =" => $id]);
        foreach ($logs as $l){
            $logs_total = $logs_total + $l->log_value;
            //pr($l->log_value);
            //pr($logs_total);
        }
        //pr($logs_total);
        return $logs_total;   
    }

}

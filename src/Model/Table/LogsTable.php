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
    
    public function addLogResultat($mi, $wi, $di, $date, $lat, $long, $type, $value){
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
    
    public function getPas($id){
    $pas_total = 0;
    $pasPourcent = 0;
    $pas_logs = $this
            ->find()
            ->where(["log_type =" => "Pas"]);
    foreach ($pas_logs as $p){
        $pas_total = $pas_total + $p->log_value;
        //pr($pompes_total);
    }    
    $pas_logs1 = $this
            ->find()
            ->where(["log_type =" => "Pas", "workout_id =" => $id]);
    foreach ($pas_logs1 as $p){
        $pasPourcent = ($p->log_value/$pas_total)*100;
        //pr($p->log_value);
        //pr($pompes_total);
        //pr($pompesPourcent);
    }
    //pr($pompes_total);
    return $pasPourcent;
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
    
    public function getPasTotal($id){
        $pas_total = 0;
        $pas_logs = $this
              ->find()
              ->where(["log_type =" => "Pas", "member_id =" => $id]);
        foreach ($pas_logs as $p){
            $pas_total = $pas_total + $p->log_value;       
        }
        return $pas_total;
    }
  
    public function getAbdosTotal($id){
        $abdos_total = 0;
        $abdos_logs = $this
                ->find()
                ->where(["log_type =" => "Abdos", "member_id =" => $id]);
        foreach ($abdos_logs as $p){
            $abdos_total = $abdos_total + $p->log_value;       
        }        
        return $abdos_total;
    }
  
    public function getSquatsTotal($id){
        $squats_total = 0;
        $squats_logs = $this
            ->find()
            ->where(["log_type =" => "Squats", "member_id =" => $id]);
        foreach ($squats_logs as $p){
            $squats_total = $squats_total + $p->log_value;       
        }
        return $squats_total;
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
    
    public function calculateScoreOfMatch($member_id, $workout_id)
    {
        $query = $this->find();
        $scoreSum = $query->select(['score' => $query->func()->sum('log_value')])
                          ->where(['member_id =' => $member_id, 'workout_id =' => $workout_id, 'log_type =' => strtolower("points")])
                          ->first();

        return $scoreSum;
    }

    public function getLogResultOfMatch($workout_id)
    {
        $log_row = $this
                ->find()
                ->where([
                    'workout_id =' => $workout_id,
                    'log_type =' => "Résultat"
                ])
                ->first();
        return $log_row;
    }

    public function setLogResultOfMatch($log_id, $result)
    {
        $log_row = $this->get($log_id);
        $log_row->log_value = $result;
        return $this->save($log_row);
    }
    
}

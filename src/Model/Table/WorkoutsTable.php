<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\I18n\Time;

class WorkoutsTable extends Table {
    
    public function getAllWorkouts($id){
        $work = $this->find()->where(["member_id =" => $id]);
        return $work;
    }

    public function addWorkouts($d, $ed, $ln, $des, $s, $mi) {
        //pr("addWorkouts($d, $ed, $ln, $des, $s)");die();
        if($s == 'label'){
            echo 'Veuillez Indiquer le sport';
        }
        elseif($ln == ''){
            echo 'Veuillez Indiquer le lieu de la seance';
        }
        else{
            $new = $this->newEntity();
            $new->date = $d;
            $new->end_date = $ed;
            $new->location_name = $ln;
            $new->description = $des;
            $new->sport = $s;
            $new->member_id = $mi;
            $this->save($new);
        }     
    }
    
    public function getWorkComing($id){
        $date_courante = Time::now();         
        $workout_coming = $this
                ->find('all', array('order' => array('Workouts.date' => 'asc')))                               
                ->where(["date >" => $date_courante, "member_id =" => $id]);
        return $workout_coming;       
    }
    
    public function getWorknow($id){
        $date_courante = Time::now();
        $workout_done = $this
                ->find('all', array('order' => array('Workouts.date' => 'asc')))                               
                ->where([ "end_date >" => $date_courante, "date <" => $date_courante, "member_id =" => $id]);
        return $workout_done;   
    }
    
    public function getWorkDone($id){
        $date_courante = Time::now();         
        $workout_done = $this
                ->find('all', array('order' => array('Workouts.date' => 'desc')))                              
                ->where(["end_date <" => $date_courante, "member_id =" => $id]);
        return $workout_done;        
    }
    
    public function getComments() {
        $allComments = $this
                ->find()
                ->select(['location_name', 'description'])
                ->toArray();

        return $allComments;
    }
}

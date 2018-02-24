<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\I18n\Time;

class WorkoutsTable extends Table {

    public function addWorkouts($d, $ed, $ln, $des, $s, $mi) {
        //pr("addWorkouts($d, $ed, $ln, $des, $s)");die();
        $new = $this->newEntity();
        $new->date = $d;
        $new->end_date = $ed;
        $new->location_name = $ln;
        $new->description = $des;
        $new->sport = $s;
        $new->member_id = $mi;
        $this->save($new);     
    }
    
    public function getWorkComing(){
        $date_courante = Time::now();         
        $workout_coming = $this
                ->find()
                ->select(['date', 'sport', 'location_name', 'description'])                
                ->where(["date >" => $date_courante]);
        return $workout_coming;       
    }
    
    public function getWorkDone(){
        $date_courante = Time::now();         
        $workout_done = $this
                ->find()
                ->select(['date', 'sport', 'location_name', 'description'])                
                ->where(["end_date <" => $date_courante]);
        return $workout_done;        
    }
}

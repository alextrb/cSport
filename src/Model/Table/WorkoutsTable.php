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
         //pr($date_courante->year);
         //$date_courante = new \DateTime(date("Y-m-d H:i:s"));
         //$date_workout = $this->find()->select("date");
         $date_workout = $this->find()->select(['date'])->toArray();
         //pr($date_workout[0]->date->year);
         //$d = $time = Time::createFromFormat('Y-m-d H:i:s',$date_workout);    
         //$date_workout = new \DateTime($_SESSION['date']);
        $workout_coming = $this
                ->find()
                ->where([($date_workout[0]->date->year) < ($date_courante->year)]);
                //->where(['sport =' => "Basket"]);
        return $workout_coming;        
    }
    
    public function getWorkDone(){
        $date_courante = Time::now();
         //$date_courante = new \DateTime(date("Y-m-d H:i:s"));
         $date_workout = $this->find()->select(['date'])->toArray();
         //$d = $time = Time::createFromFormat('Y-m-d H:i:s',$date_workout);         
        $workout_done = $this
                ->find()
                ->where([($date_workout[0]->date->year) > ($date_courante->year)]);
                //->where(['sport =' => "Basket"]);
        return $workout_done;        
    }
}

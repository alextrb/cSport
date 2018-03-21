<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

class WorkoutsTable extends Table {
    
    public function getAllWorkouts($id){
        $work = $this
                //->find()
                ->find('all', array('order' => array('Workouts.date' => 'asc')))
                ->where(["member_id =" => $id]);
        return $work;
    }
    
    public function addWorkouts($d, $ed, $ln, $des, $s, $mi) {
        //pr("addWorkouts($d, $ed, $ln, $des, $s)");die();
        if($ln == ''){
            echo 'Pour ajouter une séance: veuillez indiquer le sport et le lieu de la séance.';
        }
        elseif($d > $ed){
            echo 'Problème de date!';
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
    
    public function getWorkMissed($id){
        $date_courante = Time::now();
        $work_done = $this->getWorkDone($id)->toArray();
        $final_array = array();
        foreach ($work_done as $w){
            //pr($w['date']);
            //pr($w['end_date']);
            if ($w['date'] == $w['end_date']){                
                    array_push($final_array, $w); // on push cette ligne dans le tableau
            }
        }        
        return $final_array;       
    }
    
    public function getComments() {
        $allComments = $this
                ->find()
                ->select(['location_name', 'description'])
                ->toArray();

        return $allComments;
    }
    
    /* -- POUR LES COMPÉTITIONS -- */

    public function addMatch($d, $ed, $ln, $des, $s, $mi, $ci) {
        $new = $this->newEntity();
        $new->date = $d;
        $new->end_date = $ed;
        $new->location_name = $ln;
        $new->description = $des;
        $new->sport = $s;
        $new->member_id = $mi;
        $new->contest_id = $ci;
        return $this->save($new);    
    }

    public function getAllMatchsFromContest($id_contest)
    {
        $allMatchs = $this
                ->find('all', array('order' => array('Workouts.id' => 'asc')))
                ->where(['contest_id = ' => $id_contest])
                ->toArray();

        return $allMatchs;
    }

    public function findSecondMemberOfMatch($firstmatch_id, $date, $end_date, $location_name, $contest_id)
    {
        $second_match = $this
        ->find()
        ->where(
            ['id >' => $firstmatch_id,
            'date =' => $date,
            'end_date =' => $end_date,
            'location_name =' => $location_name,
            'contest_id =' => $contest_id]
        )
        ->first();
        return $second_match;
    }

    public function setMatchDescriptionWithScores($workout_id, $member1_score, $member2_score, $member1_email, $member2_email)
    {
        $workout_row = $this->get($workout_id);
        //$workout_row->description = "J1(".$member1_score.")  -  J2(".$member2_score.")";
        $workout_row->description = "Résultat du match : <br>".$member1_email." : ".$member1_score. " PTS<br>".$member2_email." : ".$member2_score. " PTS";
        return $this->save($workout_row);
    }

    public function setEndDateOfMatch($workout_id)
    {
        $workout_row = $this->get($workout_id);
        if($workout_row->date > Time::now())
        {
            $new_date = Time::now();
            $new_date->modify("-1 minute");
            $workout_row->date = $new_date;
        }
        $workout_row->end_date = Time::now();
        return $this->save($workout_row);
    }

    public function getContestMembers($contest_id)
    {
        $contest_members = $this->find()
                                ->select(['member_id'])
                                ->group('member_id')
                                ->where(['contest_id =' => $contest_id])
                                ->toArray();
        return $contest_members;
    }

    public function getAllMemberMatchsOfSport($member_id, $sport)
    {
        $member_matchs = $this->find()
                              ->where(['member_id =' => $member_id, 'contest_id >' => 0, 'sport =' => $sport])
                              ->toArray();
        return $member_matchs;
    }
    
    
    public function getPreviousWorkouts($id){
        $work = $this
                    ->find()
                    ->where(["end_date <" => Time::now(), "date <" => Time::now(), "member_id =" => $id])
                    ->order(['end_date' => 'DESC'])
                    ->limit(3);
        return $work;
    }

    public function getNextWorkout($id){
        $work = $this
                    ->find()
                    ->where(["date >" => Time::now(),"end_date >" => Time::now(), "member_id =" => $id])
                    ->order(['date' => 'ASC'])
                    ->limit(1);
        return $work;
    }


    public function validationDefault(Validator $validator){
        $validator = new Validator();
        $validator
            ->notEmpty('m1_email', 'Ce champs ne doit pas être vide')
            ->notEmpty('m2_email', 'Ce champs ne doit pas être vide')
            ->notEmpty('date', 'Ce champs ne doit pas être vide')
            ->notEmpty('end_date', 'Ce champs ne doit pas être vide')
            ->notEmpty('location_name', 'Ce champs ne doit pas être vide')
            ->add('m1_email', [
                'compare' => [
                    'rule' => ['compareWith', 'm2_email']
                ]
            ]);
        return $validator;
    }
}

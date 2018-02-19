<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class LogsTable extends Table {
    
    /*
     * Getter pour récupérer tous les relevés d'un membre
     */
    public function getLogsOfMember($id_member) {
        
        $logs_member = $this->find('all', array('conditions'=>array('member_id'=>$id_member)));
        return $logs_member->toArray();
    }
    
    /*
     * Permet de calculer le score d'un membre
     */
    public function CalculMemberScore($id_member) {
        
        $logs_member = $this->find('all', array('conditions'=>array('member_id'=>$id_member)))->toArray();
        $member_score = 0.0;
        $final_score = 0.0;
        
        foreach($logs_member as $log)
        {
            $member_score = $member_score + $log->log_value;
        }
        
        if($member_score != 0.0)
        {
            $final_score = $member_score/(sizeof($logs_member));
        }
        else
        {
            $final_score = 0.0;
        }
        
        return $final_score;    
    }

}

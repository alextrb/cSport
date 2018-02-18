<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MembersTable extends Table {
    
    /*
     * Getter pour récupérer tous les membres dans un tableau
     */
    public function getAllMembers() {
        
        $all_members = $this->find();
        return $all_members->toArray();
    }

}


<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class ContestsTable extends Table {
    
    
    public function getAllContests() {
        return $this->find('all', array('order' => array('Contests.type' => 'asc')))->toArray();
    }

    public function addContest($name, $type, $description) {

        $new = $this->newEntity();
        $new->name = $name;
        $new->type = $type;
        $new->description = $description;

        return $this->save($new);    
    }

    public function getContest($contest_id) {
        return $this->get($contest_id);
    }


    public function validationDefault(Validator $validator){
        $validator = new Validator();
        $validator
            ->notEmpty('name', 'Ce champs ne doit pas être vide')
            ->notEmpty('type', 'Ce champs ne doit pas être vide')
            ->notEmpty('description', 'Ce champs ne doit pas être vide');
        return $validator;
    }
}
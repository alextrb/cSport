<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

class MembersTable extends Table {
    
    /*
     * Getter pour récupérer tous les membres dans un tableau
     */
    public function getAllMembers() {
        
        $all_members = $this->find();
        return $all_members->toArray();
    }
    
    public function registerMember($email, $password) {
        $new_member = $this->newEntity();
        $new_member->email=$email;
        $hashedpassword = (new DefaultPasswordHasher)->hash($password);
        $new_member->password=$hashedpassword;

        $search_request = $this->find()->where(['email =' => $email])->count(); // Si un utilisateur ayant cet email existe déjà

        if($search_request)
        {
        	return false;
        }
        else
        {
        	return $this->save($new_member);
        }
    }

    public function validationDefault(Validator $validator){
        $validator = new Validator();
        $validator
            ->notEmpty('email', 'Ce champs ne doit pas être vide')
            ->notEmpty('password', 'Ce champs ne doit pas être vide');
        return $validator;
    }

}


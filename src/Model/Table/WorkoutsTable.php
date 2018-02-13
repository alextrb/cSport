<?php

namespace App\Model\Table;

use Cake\ORM\Table;

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

}

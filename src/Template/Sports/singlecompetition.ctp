<?php

$this->assign('title', 'Compétition');?>

<div class="page-header">
<h2> <?= $this_contest->name ?> </h2>
</div>
<p> Type : <?= $this_contest->type ?> </p>
<p> <?= $this_contest->description ?> </p>

<div>
    <div class="page-header">
<h3>Liste des matchs :</h3>
    </div>
<table id="singTable" class="table table-hover table-striped table-responsive tableBlackHead" >
    <thead>
        <tr>
            <th>JOUEUR 1</th>
            <th>JOUEUR 2</th>
            <th>DATE</th>
            <th>DATE DE FIN</th>
            <th>LIEU</th>
            <th>SCORE</th>
            <th>STATUS</th>
            
        </tr>
    </thead>
    <tbody>
        <!-- Remplissage du tableau-->
        <?php foreach ($matchs as $match){
            echo"<tr><td>"
            			  .$match['member_email1']."</td><td>"
            			  .$match['member_email2']."</td><td>"
                          .$match['date']."</td><td>"
                          .$match['end_date']."</td><td>"
                          .$match['location_name']."</td><td>"
                          .$match['description']."</td><td>";
            $time_now = Cake\I18n\Time::now();
            if($match['end_date'] < $time_now)
            {
              echo "Match terminé</td></tr>";
            }
            else
            {
              echo $this->Html->Link("Terminer le match", ["controller"=>"Sports", "action"=>"endMatch/".$this_contest->id."/".$match['member_id1']."/".$match['member_id2']."/".$match['workout_id1']."/".$match['workout_id2']."/".$match['member_email1']."/".$match['member_email2']], ["class" => "btn btn-danger"])."</td><tr>";
              
            }
            
        } ?>
    </tbody>
</table>
</div>

<div>
    <div class="page-header">
    <h3 id="singForm">Ajouter un match : </h3>
    </div>
        
        <?= $this->Form->create($new, array("class" => "form-horizontal")) 
            .$this->Form->input("m1_email", array("label" => "Joueur 1 : ", "type" => "select", "options" => $emails_array, "class" => "form-control"))
            .$this->Form->input("m2_email", array("label" => "Joueur 2 : ", "type" => "select", "options" => $emails_array, "class" => "form-control"))
            .$this->Form->input("date", array("label" => "Date et heure du début de la séance : ", "type" => "datetime", "class" => "form-control"))
            .$this->Form->input("end_date", array("label" => "Date et heure de fin de la séance : "))
            .$this->Form->input("location_name", array("label" => "Lieu : ", "type" => "text", "class" => "form-control"))           
            .$this->Form->submit("Ajouter", ['class' => 'btn btn-primary'])
            .$this->Form->end(); ?>
</div>

<div>
    <div class="page-header">
<h3>Classement des participants :</h3>
    </div>
<table id="singTableRank" class="table table-hover table-striped table-responsive tableBlackHead" >
    <thead>
        <tr>
          <th>RANG</th>
          <th>JOUEUR</th>
          <th>POINTS ASSAULTS</th>
            
        </tr>
    </thead>
    <tbody>
        <!-- Remplissage du tableau-->
        <?php
        $rang = 1; 
        foreach ($rankings_list as $rank){
            echo"<tr><td>".$rang."</td><td>"
                          .$rank['member_email']."</td><td>"
                          .$rank['member_score']."</td></tr>";
            $rang = $rang+1;
        } ?>
    </tbody>
</table>
</div>
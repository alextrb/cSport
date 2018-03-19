<?php

$this->assign('title', 'Compétition');?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#singTable').DataTable( {
            "order": [[ 3, "asc" ]]
        } );
    });
</script>

<h1> <?= $this_contest->name ?> </h1>
<p> Type : <?= $this_contest->type ?> </p>
<p> <?= $this_contest->description ?> </p>

<h2>Liste des matchs :</h2>
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
              echo $this->Form->postButton("Terminer le match", ["controller"=>"Sports", "action"=>"endMatch/".$this_contest->id."/".$match['member_id1']."/".$match['member_id2']."/".$match['workout_id1']."/".$match['workout_id2']."/".$match['member_email1']."/".$match['member_email2']])."</td><tr>";
            }
            
        } ?>
    </tbody>
</table>

<p style="color: red;"> Pour ajouter des points de match à un joueur, il faut entrer le log_type "points". </p>

<div>
    <h2 id="singForm">Ajouter un match : </h2>
        
        <?= $this->Form->create($new)."<ul><li>"  
            ."Joueur 1 : " . $this->Form->select("m1_email", $emails_array)."</li><li>"
            ."Joueur 2 : " . $this->Form->select("m2_email", $emails_array)."</li><li>"
            .$this->Form->input("date", array("label" => "Date et heure du début de la séance : "))."</li><li>"
            .$this->Form->input("end_date", array("label" => "Date et heure de fin de la séance : "))."</li><li>"
            .$this->Form->input("location_name", array("label" => "Lieu : "))."</li><li>"            
            .$this->Form->submit("Ajouter")."</li></ul>"
            .$this->Form->end(); ?>
</div>

<h2>Classement des participants :</h2>
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

<?php 
$str = "h<br>ello";
echo $str;
?>

<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <title>
        <?php $this->assign('title', 'Mes Séances');?>
    </title>

        <?= $this->Html->css('seance.css') ?>
    
    <body>
        <h1 id="seanTitle">Mes Séances</h1>
        
        <figure>
            <div class="header-image"><?= $this->Html->image('seance.jpg') ?></div> 
        </figure> 
        
         <h2 id="seanT2">Séances à venir</h2>
         
        <table id="workoutsComing" class="table table-hover table-striped table-responsive tableBlackHead">
            <thead>
                <tr>
                <th>Sport</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($workout_coming as $workout){
                echo"<tr><td>".$workout->sport."</td><td>"
                              .$workout->date."</td><td>"
                              .$workout->location_name."</td><td>"
                              .$workout->description."</td></tr>";
            }?>
            </tbody>
        </table>
         
          <h2 id="seanT2">Séances en cours</h2>
        <table id="workoutsNow" class="table table-hover table-striped table-responsive tableBlackHead">
            <thead>
                <tr>
                <th>Sport</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($workout_now as $workout){
                echo"<tr><td>".$workout->sport."</td><td>"
                              .$workout->date."</td><td>"
                              .$workout->location_name."</td><td>"
                              .$workout->description."</td></tr>";
            }?>
            </tbody>
        </table>
         
        <h2 id="seanT2">Séances passées</h2>
        
        <table id="workoutsDone" class="table table-hover table-striped table-responsive tableBlackHead">
            <thead>
                <tr>
                <th>Sport</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($workout_done as $workout){
                echo"<tr><td>".$workout->sport."</td><td>"
                              .$workout->date."</td><td>"
                              .$workout->location_name."</td><td>"
                              .$workout->description."</td></tr>";                              
            }?>
            </tbody>
        </table>
        
        <h2 id="seanT2">Pour ajouter une séance, remplir le formulaire</h2>
        
        <?= $this->Form->create($new)."<ul><li>"
             .$this->Form->input("date", array("label" => "Date et heure du début de la séance : "))."</li><li>"
             .$this->Form->input("end_date", array("label" => "Date et heure de fin de la séance : "))."</li><li>"
             .$this->Form->input("location_name", array("label" => "Lieu : "))."</li><li>"             
             .$this->Form->select("sport", array(
                 'label' => "Selectionnez le sport souhaité : ",
                 'Course' => "Course",
                 'BasketBall' => "BasketBall",
                 'Entrainement' => "Entrainement",
                 'Tennis' => "Tennis"))."</li><li>"                
             .$this->Form->input("description", array("label" => "Commentaires : "))."</li><li>"             
             .$this->Form->submit("Ajouter")."</li></ul>"
             .$this->Form->end();?>
    </body>
</html>

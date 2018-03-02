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
    
     <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $('#workoutsComing').DataTable( {
                "order": [[ 2, "asc"]]
                //"order" => array('date' => 'desc')
                } );
            });
            $(document).ready(function () {
                $('#workoutsNow').DataTable( {
                "order": [[ 2, "desc" ]]
                } );
            });
            $(document).ready(function () {
                $('#workoutsDone').DataTable( {
                "order": [[ 2, "desc" ]]
                } );
            });
        </script>
        
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
                              .$workout->descritpion."</td></tr>";
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
                              .$workout->descritpion."</td></tr>";
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
                              .$workout->descritpion."</td></tr>";                              
            }?>
            </tbody>
        </table>
        
        <h2 id="seanT2">Pour ajouter une séance, remplir le formulaire</h2>
        
        <?= $this->Form->create($new)?>
        <?= $this->Form->input("date")?>     
        <?= $this->Form->input("end_date")?>
        <?= $this->Form->input("location_name")?>
        <?= $this->Form->input("description")?>
        <?= $this->Form->input("sport")?>
        <?= $this->Form->submit("Ajouter")?>
        <?= $this->Form->end()?>
    </body>
</html>

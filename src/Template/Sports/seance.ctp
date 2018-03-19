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
                //$.fn.dataTable.moment('MMMM Do YYYY, h:mm:ss a');
                $('#pompes').DataTable({
                    "order": [[ 1, "asc" ]]
                    //"columnDefs": [{ "type": "de_date", targets: 2 }]                
                });
            });

        </script>

        <?= $this->Html->css('seance.css') ?>
    
    <body>
        <h1 id="seanTitle">Mes Séances</h1>
        
        <figure>
            <div class="header-image"><?= $this->Html->image('seance.jpg', ['width' => '1150px']) ?></div> 
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
                <th>Relevé</th>
                <th>Ajouter un relevé</th>
            </tr>
            </thead>
            <tbody>
           <?php foreach ($workNow_tab as $details){
                $workout=$details['workout'];
                $logs=[];
                
                foreach($details['logs'] as $log){
                  $logs[]=$log->log_type." : ".$log->log_value;  
                }
                echo"<tr><td>".$workout->sport."</td><td>"
                              .$workout->date."</td><td>"
                              .$workout->location_name."</td><td>"
                              .$workout->description."</td><td>"
                              .$this->Html->nestedList($logs)."</td><td>"
                              .$this->Form->create(null, array('url'=>array('controller' => 'sports', 'action' => 'addLog')))
                              .$this->Form->hidden("id_workout", array(
                                  "value" => $workout['id']))                              
                              .$this->Form->input("location_latitude", array(
                                  "label" => "Latitude : "))
                              .$this->Form->input("location_logitude", array(
                                  "label" => "Longitude : "))
                              .$this->Form->input("log_type", array(
                                  "label" => "Type de relevé : "))
                              .$this->Form->input("log_value", array(
                                  "label" => "Nombre : "))
                              .$this->Form->submit("Ajouter")."</td></tr>"
                              .$this->Form->end();
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
                <th>Relevés</th>
                <th>Ajouter un relevé</th>
            </tr>
            </thead>
            <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($workDone_tab as $details){
                $workout=$details['workout'];
                $logs=[];
                
                foreach($details['logs'] as $log){
                  $logs[]=$log->log_type." : ".$log->log_value;  
                }
                //pr($logs);
                echo"<tr><td>".$workout->sport."</td><td>"
                              .$workout->date."</td><td>"
                              .$workout->location_name."</td><td>"
                              .$workout->description."</td><td>"
                              .$this->Html->nestedList($logs)."</td><td>"
                              .$this->Form->create(null, array('url'=>array('controller' => 'sports', 'action' => 'addLog')))
                              .$this->Form->hidden("id_workout", array(
                                  "value" => $workout['id']))                              
                              .$this->Form->input("location_latitude", array(
                                  "label" => "Latitude : "))
                              .$this->Form->input("location_logitude", array(
                                  "label" => "Longitude : "))
                              .$this->Form->input("log_type", array(
                                  "label" => "Type de relevé : "))
                              .$this->Form->input("log_value", array(
                                  "label" => "Nombre : "))
                              .$this->Form->submit("Ajouter")."</td></tr>"
                              .$this->Form->end();              
            }?>
            </tbody>
        </table>
        
        <h2 id="seanT2">Statistiques des relevés depuis l'inscription</h2>
        <table id="pompes" class="table table-hover table-striped table-responsive tableBlackHead">
            <thead>
                <tr>
                    <th>Date de la séance</th> 
                    <th>Pompes réalisées pendant chaque séance (en %)</th>
                    <th>Pas réalisés pendant chaque séance (en %)</th>
                    <th>Abdos réalisés pendant chaque séance (en %)</th>
                    <th>Squats réalisés pendant chaque séance (en %)</th>
                </tr>
            </thead>
            <tbody>
             <?php foreach ($stat_array as $row){
               echo "<tr><td>".$row['date']."</td><td>"
                       .$row['stat']."</td><td>"
                       .$row['pas']."</td><td>"
                       .$row['abdos']."</td><td>"
                       .$row['squats']."</td></tr>";
                   }                            
               ?>   
            </tbody>
        </table>
        
        <table id="stat" class="table table-hover table-striped table-responsive tableBlackHead">
            <thead>
                <tr>
                    <th>Relevés</th> 
                    <th>Pourcentage sur l'ensemble des relevés</th>
                </tr>
            </thead>
            <tbody>
              <?php //foreach ($stat_array as $row){
               echo "<tr><td>Pompes</td><td>".(($pompesTotal/$logsTotal)*100)."</td></tr>";
               echo "<tr><td>Pas</td><td>".(($pasTotal/$logsTotal)*100)."</td></tr>";
               echo "<tr><td>Abdos</td><td>".(($abdosTotal/$logsTotal)*100)."</td></tr>";
               echo "<tr><td>Squats</td><td>".(($squatsTotal/$logsTotal)*100)."</td></tr>";
                   //}                            
               ?>  
            </tbody>
        </table>
        
        <h2 id="seanT2">Pour ajouter une séance, remplir le formulaire</h2>
        
        <?= $this->Form->create($new)."<ul><li>"
             .$this->Form->input("date", array("label" => "Date et heure du début de la séance : "))."</li><li>"
             .$this->Form->input("end_date", array("label" => "Date et heure de fin de la séance : "))."</li><li>"
             .$this->Form->input("location_name", array("label" => "Lieu : "))."</li><li>"             
             .$this->Form->select("sport", array(
                 'label' => "Selectionnez le sport souhaité : ",
                 'Badminton' => "Badminton",
                 'Boxe' => "Boxe",
                 'Canne de combat' => "Canne de combat",
                 'GRS' => "GRS",
                 'Judo' => "Judo",
                 'Taekwondo' => "Taekwondo",
                 'Tennis' => "Tennis"))."</li><li>"                
             .$this->Form->input("description", array("label" => "Commentaires : "))."</li><li>"             
             .$this->Form->submit("Ajouter")."</li></ul>"
             .$this->Form->end();?>
    </body>
</html>

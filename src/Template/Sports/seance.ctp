<?php $this->assign('title', 'Mes Séances');?>


<h2 id="seanTitle">Mes Séances</h2>

<figure>
    <div class="header-image"><?= $this->Html->image('seance.jpg', ['width' => '1100px', 'max-width' =>'1100px']) ?></div> 
</figure> 

<div>
    <div class="page-header">
      <h3>Séances à venir</h3>
    </div>
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
</div>

<div>
    <div class="page-header">
      <h3>Séances en cours</h3>
    </div>
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
                            .$this->Form->create($new, array('url'=>array('controller' => 'sports', 'action' => 'addLog')))
                            .$this->Form->hidden("id_workout", array(
                                "value" => $workout['id']))                              
                            .$this->Form->input("location_latitude", array(
                                "label" => "Latitude : "))
                            .$this->Form->input("location_logitude", array(
                                "label" => "Longitude : "))
                            .$this->Form->select("log_type",array(
                                'label' => "Sélectionnez le relevé : ",
                                'Pas' => "Pas",
                                'Pompes' => "Pompes",
                                'Abdos' => "Abdos",
                                'Squats' => "Squats"))
                            .$this->Form->input("log_value", array(
                                "label" => "Nombre : "))
                            .$this->Form->submit("Ajouter", array("class" => "btn btn-success"))."</td></tr>"
                            .$this->Form->end();
          }?>
          </tbody>
      </table>
</div>

<div>
    <div class="page-header">
      <h3>Séances passées</h3>
    </div>

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
              
              $log_options = array(
                  'Pas'=>__('Pas'), 
                  'Pompes'=>__('Pompes'), 
                  'Abdos'=>__('Abdos'), 
                  'Squats'=>__('Squats')); 
              
              echo"<tr><td>".$workout->sport."</td><td>"
                            .$workout->date."</td><td>"
                            .$workout->location_name."</td><td>"
                            .$workout->description."</td><td>"
                            .$this->Html->nestedList($logs)."</td><td>"
                            .$this->Form->create($form_new_log, array('url'=>array('controller' => 'sports', 'action' => 'addLog')))
                            .$this->Form->hidden("id_workout", array(
                                "value" => $workout['id']))                              
                            .$this->Form->input("location_latitude", array(
                                "label" => "Latitude : "))
                            .$this->Form->input("location_logitude", array(
                                "label" => "Longitude : "))
                            .$this->Form->input("log_type",array(
                                'label' => "Sélectionnez le relevé : ",
                                "type" => "select",
                                "options" => $log_options))
                            .$this->Form->input("log_value", array(
                                "label" => "Nombre : "))
                            .$this->Form->submit("Ajouter", array("class" => "btn btn-success"))."</td></tr>"
                            .$this->Form->end();              
          }?>
          </tbody>
      </table>
</div>

<div>
    <div class="page-header">
      <h3>Séances manquées</h3>
    </div>
      <table id="manque" class="table table-hover table-striped table-responsive tableBlackHead">
          <thead>
              <tr>
                  <th>Sport</th> 
                  <th>Date</th>
                  <th>Lieu</th> 
                  <th>Description</th>                    
              </tr>
          </thead>
          <tbody>
            <?php foreach ($workout_missed as $workout){
              echo"<tr><td>".$workout->sport."</td><td>"
                            .$workout->date."</td><td>"
                            .$workout->location_name."</td><td>"
                            .$workout->description."</td></tr>";                              
          }?>   
          </tbody>
      </table>
</div>

<div>
    <div class="page-header">
      <h3 id="seanLoc">Emplacement de mes séances </h3>
    </div>
      <script type="text/javascript">
          var json_locations = <?php echo $encoded_locations ?>;
      </script>
      <div id='map'></div>
      <?php echo $this->Html->script(['googleMap']);?>
      <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClw2W8vDjAdeSJkPnDO9CCI-01RLjYQcw&callback=initMap">
      </script>
</div>

<div>
    <div class="page-header">
      <h3>Statistiques des relevés depuis l'inscription</h3>
    </div>
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
</div>

<div>
    <table id="stat" class="table table-hover table-striped table-responsive tableBlackHead">
        <thead>
            <tr>
                <th>Relevés</th> 
                <th>Pourcentage sur l'ensemble des relevés</th>
            </tr>
        </thead>
        <tbody>
            <?php //foreach ($stat_array as $row){
             echo "<tr><td>Pompes</td><td>".(($pompesTotal)*100)."</td></tr>";
             echo "<tr><td>Pas</td><td>".(($pasTotal)*100)."</td></tr>";
             echo "<tr><td>Abdos</td><td>".(($abdosTotal)*100)."</td></tr>";
             echo "<tr><td>Squats</td><td>".(($squatsTotal)*100)."</td></tr>";
                 //}                            
             ?>  
        </tbody>
    </table>
</div>

<div>
    <div class="page-header">
      <h3>Pour ajouter une séance, remplir le formulaire</h3>
    </div>

      <?php $options = array(
         'Badminton'=>__('Badminton'), 
         'Boxe'=>__('Boxe'), 
         'Canne de combat'=>__('Canne de combat'), 
         'GRS'=>__('GRS'), 
         'Judo'=>__('Judo'), 
         'Taekwondo'=>__('Taekwondo'), 
         'Tennis'=>__('Tennis')); 
      ?>
      <?= $this->Form->create($new)."<ul style='list-style-type: none;'><li>"
           .$this->Form->input("date", array("label" => "Date et heure du début de la séance : "))."</li><li>"
           .$this->Form->input("end_date", array("label" => "Date et heure de fin de la séance : "))."</li><li>"
           .$this->Form->input("location_name", array("label" => "Lieu : ", "class" => "form-control"))."</li><li>"             
           .$this->Form->input("sport", array(
               'label' => "Selectionnez le sport souhaité : ", "type" => "select", "options" => $options, "class" => "form-control"))."</li><li>"                
           .$this->Form->input("description", array("label" => "Commentaires : ", "class" => "form-control", "type" => "textarea"))."</li><li>"             
           .$this->Form->submit("Ajouter", array("class" => "btn btn-primary"))."</li></ul>"
           .$this->Form->end();?>
</div>

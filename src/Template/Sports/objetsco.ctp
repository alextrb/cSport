<?php

$this->assign('title', 'Mes Objets Connectés');?>
<div class="page-header">
<h2 id="clasTitle">Mes objets connectés</h2>
</div>

<div class="alert alert-success">    
    <h3>Liste des objets autorisés sur votre compte :</h3>
    <table id="objeAllowedTable" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Objets</th>
                <th>Description</th>
                <th>Gérer</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($auth_devices as $objetco){
                echo"<tr><td>".$objetco->id."</td><td>"
                              .$objetco->serial."</td><td>"
                              .$objetco->description."</td><td>"
                              .$this->Html->Link("Supprimer", ["controller"=>"Sports", "action"=>"deleteOC/".$objetco->id],['confirm'=>__('Voulez vous vraiment supprimer le device "{0}" (n°ID = {1}) ?', h($objetco->serial),h($objetco->id)), "class" => "btn btn-danger"])."</td></tr>";
            }?>
        </tbody>
    </table>
</div>

<div class="alert alert-warning">
    <h3>Liste des objets attendant une autorisation de votre part :</h3>
    <table id="objeWaitingTable" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Objets</th>
                <th>Description</th>
                <th>Gérer</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($waiting_devices as $objetco){
                echo"<tr><td>".$objetco->id."</td><td>"
                              .$objetco->serial."</td><td>"
                              .$objetco->description."</td><td>"
                              .$this->Html->Link("Valider", ["controller"=>"Sports", "action"=>"validateOC/".$objetco->id], ["class" => "btn btn-success"])."</td></tr>";
            }?>
        </tbody>
    </table>
</div>
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
    
    <body>
        <h1 id="seanTitle">Mes Séances</h1>
        <figure>
            <div class="header-image"><?= $this->Html->image('seance.jpg') ?></div> 
        </figure> 
        <h2>Séances à venir</h2>
        <ol>
            <li>Séance de vollet le 24/02/2018</li>
            <li>Séance de Tennis le 25/02/2018</li>
        </ol>
        <h2>Séances passées</h2>
        <ol>
            <li>Séance de vollet le 24/01/2018</li>
            <li>Séance de Tennis le 25/01/2018</li>
        </ol>
        
        <button type="button" onclick="alert('Vous voulez ajouter une séance')">Ajouter une séance</button>
        <button type="button" onclick="alert('Vous voulez reporter une séance')">Reporter une séance</button>
        <button type="button" onclick="alert('Vous voulez annulé une séance')">Supprimer une Séance</button> 
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

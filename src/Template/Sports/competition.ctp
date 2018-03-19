<?php

$this->assign('title', 'Compétitions');?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#compTable').DataTable({
            "order": [[0, "desc"]]
        });
    });
</script>


<div>
    <h2>Compétitions :</h2>
    <table id="compTable" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>NOM</th>
                <th>TYPE</th>
                <th>DESCRIPTION</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($contests as $contest){
                echo"<tr><td>".$this->Html->Link("$contest->name", ["controller"=>"Sports", "action"=>"singlecompetition/".$contest->id])."</td><td>"
                              .$contest->type."</td><td>"
                              .$contest->description."</td><tr>";
            } ?>
        </tbody>
    </table>

</div>

<div>
    <h2 id="singForm">Créer une compétition</h2>
        
        <?= $this->Form->create($new)."<ul><li>"
            
            .$this->Form->input("name", array("label" => "Nom : "))."</li><li>". 
            "Sélectionner le sport : ".$this->Form->select("type", array(
                 'Badminton' => "Badminton",
                 'Boxe' => "Boxe",
                 'Canne de combat' => "Canne de combat",
                 'GRS' => "GRS",
                 'Judo' => "Judo",
                 'Taekwondo' => "Taekwondo",
                 'Tennis' => "Tennis"))."</li><li>"                        
            .$this->Form->input("description", array("label" => "Description : "))."</li><li>"             
            .$this->Form->submit("Créer")."</li></ul>"
            .$this->Form->end(); ?>
</div>

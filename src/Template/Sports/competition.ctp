<?php

$this->assign('title', 'Compétitions');?>


<div>
    <div class="page-header">
    <h2>Compétitions</h2>
    </div>
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
                              .$contest->description."</td></tr>";
            } ?>
        </tbody>
    </table>

</div>

<div>
    <div class="text-center">
    <h3 id="compForm" class="alert alert-info">Créer une compétition</h3>
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
        
        <?= $this->Form->create($new, array("class" => "form-horizontal"))."<ul style='list-style-type: none;'><li>"
            
            .$this->Form->input("name", array("label" => "Nom : ", "class" => "form-control"))."</li><br><li>"
            .$this->Form->input("type", array("label" => "Type : ", "type" => "select", "options" => $options, "class" => "form-control"))."</li><br><li>"                  
            .$this->Form->input("description", array("label" => "Description : ", "type" => "textarea", "class" => "form-control"))."</li><br><li>"    
            .$this->Form->submit("Créer une compétition", ['class' => 'btn btn-info'])."</li></ul>"
            .$this->Form->end(); ?>
</div>

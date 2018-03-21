<?php

$this->assign('title', 'Mes Objets Connectés');?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#objeAllowedTable').DataTable({
            "order": [[1, "desc"]]
        });
    });
    $(document).ready(function() {
        $('#objeWaitingTable').DataTable({
            "order": [[1, "desc"]]
        });
    });
</script>


<div>
    <h2>Liste des objets autorisés sur votre compte :</h2>
    <table id="objeAllowedTable" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>DEVICE ID</th>
                <th>OBJETS</th>
                <th>TRUSTED</th>
                <th>GÉRER</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($auth_devices as $objetco){
                echo"<tr><td>".$objetco->id."</td><td>"
                              .$objetco->serial."</td><td>"
                              .(int)$objetco->trusted."</td><td>"
                              .$this->Html->Link("Supprimer", ["controller"=>"Sports", "action"=>"deleteOC/".$objetco->id],['confirm'=>__('Voulez vous vraiment supprimer le device "{0}" (n°ID = {1}) ?', h($objetco->serial),h($objetco->id)), "class" => "btn btn-danger"])."</td></tr>";
            }?>
        </tbody>
    </table>

    <h2>Liste des objets attendant une autorisation de votre part :</h2>
    <table id="objeWaitingTable" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>DEVICE ID</th>
                <th>OBJETS</th>
                <th>TRUSTED</th>
                <th>GÉRER</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php foreach ($waiting_devices as $objetco){
                echo"<tr><td>".$objetco->id."</td><td>"
                              .$objetco->serial."</td><td>"
                              .(int)$objetco->trusted."</td><td>"
                              .$this->Html->Link("Valider", ["controller"=>"Sports", "action"=>"validateOC/".$objetco->id], ["class" => "btn btn-success"])."</td></tr>";
            }?>
        </tbody>
    </table>

    <script type="text/javascript">
        var json_locations = <?php echo $encoded_locations ?>;
    </script>
    <div id='map'></div>
    <?php echo $this->Html->script(['googleMap']);?>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClw2W8vDjAdeSJkPnDO9CCI-01RLjYQcw&callback=initMap">
    </script>

</div>
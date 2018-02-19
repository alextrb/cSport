<?php
$this->assign('title', 'Mes Objets Connectés');?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#clasTable').DataTable( {
            "order": [[ 1, "desc" ]]
        } );
    });
</script>


<table id="clasTable" class="table table-hover table-striped table-responsive" >
    <thead id="clasTableHead">
        <tr>
            <th>AUTHORISATION</th>
            <th>OBJETS</th>
        </tr>
    </thead>
    <tbody>
        <!-- Remplissage du tableau-->
        <?php foreach ($auth_devices as $objetco){
            echo"<tr><td>".$objetco->trusted."</td><td>".$objetco->serial."</td></tr>";
        }?>
    </tbody>
</table>

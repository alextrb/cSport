<?php
$this->assign('title', 'Classements');?>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#clasTable').DataTable( {
            "order": [[ 1, "desc" ]]
        } );
    });
</script>

<div class="container-fluid">
    <h1 id="clasTitle">Classement des membres</h1>
        <figure>
            <div class="header-image"><?= $this->Html->image('classement.jpg') ?></div> 
        </figure> 

    <div id="clasTableDiv" class="col-md-11">
        <table id="clasTable" class="table table-hover table-striped table-responsive" >
            <thead id="clasTableHead">
                <tr>
                    <th>MEMBRE</th>
                    <th>SCORE</th>
                </tr>
            </thead>
            <tbody>
                <!-- Remplissage du tableau-->
                <?php
                   foreach ($classement_array as $row){
                        echo "<tr><td>".$row['member']."</td><td>".$row['score']."</td></tr>";
                   }
                ?>
            </tbody>
        </table>
    </div>
</div>
        
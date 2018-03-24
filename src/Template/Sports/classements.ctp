<?php
$this->assign('title', 'Classements');?>


<div class="text-center">
<h2 class="page-header">Classement</h2>
</div>
<figure>
    <div class="header-image"><?= $this->Html->image('classement.jpg', ['width' => '1100', 'style' =>'max-width: 1100px;']) ?></div> 
</figure>
<br>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#badminton" aria-expanded="false" aria-controls="badminton">Badminton</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="badminton">
        <div class="card card-body">
        <table id="clasTableBadminton" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>RANG</th>
                <th>MEMBRE</th>
                <th>VICTOIRES</th>
                <th>ÉGALITÉS</th>
                <th>DÉFAITES</th>
                <th>POINTS ASSAUTS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php
            $rang = 1;
               foreach ($badminton_rankings as $row){
                    echo "<tr><td>".$rang."</td><td>".$row['member']."</td><td>".$row['nb_victories']."</td><td>".$row['nb_equalities']."</td><td>".$row['nb_loses']."</td><td>".$row['score']."</td></tr>";
                    $rang = $rang +1;
               }
            ?>
        </tbody>
        </table>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#boxe" aria-expanded="false" aria-controls="boxe">Boxe</button>
    </div>
    <br>
<div class="collapse multi-collapse" id="boxe">
    <div class="card card-body">
    <table id="clasTableBoxe" class="table table-hover table-striped table-responsive tableBlackHead" >
    <thead>
        <tr>
            <th>RANG</th>
            <th>MEMBRE</th>
            <th>VICTOIRES</th>
            <th>ÉGALITÉS</th>
            <th>DÉFAITES</th>
            <th>POINTS ASSAUTS</th>
        </tr>
    </thead>
    <tbody>
        <!-- Remplissage du tableau-->
        <?php
        $rang = 1;
           foreach ($boxe_rankings as $row){
                echo "<tr><td>".$rang."</td><td>".$row['member']."</td><td>".$row['nb_victories']."</td><td>".$row['nb_equalities']."</td><td>".$row['nb_loses']."</td><td>".$row['score']."</td></tr>";
                $rang = $rang +1;
           }
        ?>
    </tbody>
    </table>
    </div>
</div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#canne" aria-expanded="false" aria-controls="canne">Canne de combat</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="canne">
        <div class="card card-body">
        <table id="clasTableCanne" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>RANG</th>
                <th>MEMBRE</th>
                <th>VICTOIRES</th>
                <th>ÉGALITÉS</th>
                <th>DÉFAITES</th>
                <th>POINTS ASSAUTS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php
            $rang = 1;
               foreach ($canne_rankings as $row){
                    echo "<tr><td>".$rang."</td><td>".$row['member']."</td><td>".$row['nb_victories']."</td><td>".$row['nb_equalities']."</td><td>".$row['nb_loses']."</td><td>".$row['score']."</td></tr>";
                    $rang = $rang +1;
               }
            ?>
        </tbody>
        </table>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#grs" aria-expanded="false" aria-controls="grs">G.R.S</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="grs">
        <div class="card card-body">
        <table id="clasTableGRS" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>RANG</th>
                <th>MEMBRE</th>
                <th>VICTOIRES</th>
                <th>ÉGALITÉS</th>
                <th>DÉFAITES</th>
                <th>POINTS ASSAUTS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php
            $rang = 1;
               foreach ($grs_rankings as $row){
                    echo "<tr><td>".$rang."</td><td>".$row['member']."</td><td>".$row['nb_victories']."</td><td>".$row['nb_equalities']."</td><td>".$row['nb_loses']."</td><td>".$row['score']."</td></tr>";
                    $rang = $rang +1;
               }
            ?>
        </tbody>
        </table>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#judo" aria-expanded="false" aria-controls="judo">Judo</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="judo">
        <div class="card card-body">
        <table id="clasTableJudo" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>RANG</th>
                <th>MEMBRE</th>
                <th>VICTOIRES</th>
                <th>ÉGALITÉS</th>
                <th>DÉFAITES</th>
                <th>POINTS ASSAUTS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php
            $rang = 1;
               foreach ($judo_rankings as $row){
                    echo "<tr><td>".$rang."</td><td>".$row['member']."</td><td>".$row['nb_victories']."</td><td>".$row['nb_equalities']."</td><td>".$row['nb_loses']."</td><td>".$row['score']."</td></tr>";
                    $rang = $rang +1;
               }
            ?>
        </tbody>
        </table>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#taekwondo" aria-expanded="false" aria-controls="taekwondo">Taekwondo</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="taekwondo">
        <div class="card card-body">
        <table id="clasTableTaekwondo" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>RANG</th>
                <th>MEMBRE</th>
                <th>VICTOIRES</th>
                <th>ÉGALITÉS</th>
                <th>DÉFAITES</th>
                <th>POINTS ASSAUTS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php
            $rang = 1;
               foreach ($taekwondo_rankings as $row){
                    echo "<tr><td>".$rang."</td><td>".$row['member']."</td><td>".$row['nb_victories']."</td><td>".$row['nb_equalities']."</td><td>".$row['nb_loses']."</td><td>".$row['score']."</td></tr>";
                    $rang = $rang +1;
               }
            ?>
        </tbody>
        </table>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#tennis" aria-expanded="false" aria-controls="tennis">Tennis</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="tennis">
        <div class="card card-body">
        <table id="clasTableTennis" class="table table-hover table-striped table-responsive tableBlackHead" >
        <thead>
            <tr>
                <th>RANG</th>
                <th>MEMBRE</th>
                <th>VICTOIRES</th>
                <th>ÉGALITÉS</th>
                <th>DÉFAITES</th>
                <th>POINTS ASSAUTS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Remplissage du tableau-->
            <?php
            $rang = 1;
               foreach ($tennis_rankings as $row){
                    echo "<tr><td>".$rang."</td><td>".$row['member']."</td><td>".$row['nb_victories']."</td><td>".$row['nb_equalities']."</td><td>".$row['nb_loses']."</td><td>".$row['score']."</td></tr>";
                    $rang = $rang +1;
               }
            ?>
        </tbody>
        </table>
        </div>
    </div>
</div>
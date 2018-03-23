<?php
$this->assign('title', 'Classements');?>



<h2 id="clasTitle">Classement</h2>

    <figure>
        <div class="header-image"><?= $this->Html->image('classement.jpg', ['width' => '1069px', 'max-width' =>  '1069px']) ?></div> 
    </figure> 


<div>
    <div class="page-header">
<h3>Classement : BADMINTON </h3>
    </div>
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

<div>
    <div class="page-header">
<h3>Classement : BOXE </h3>
    </div>
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

<div>
    <div class="page-header">
<h3>Classement : CANNE DE COMBAT </h3>
    </div>
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

<div>
    <div class="page-header">
<h3>Classement : GRS </h3>
    </div>
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

<div>
    <div class="page-header">
<h3>Classement : JUDO </h3>
    </div>
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

<div>
    <div class="page-header">
<h3>Classement : TAEKWONDO </h3>
    </div>
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

<div>
    <div class="page-header">
<h3>Classement : TENNIS </h3>
    </div>
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
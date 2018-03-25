<?php
$this->assign('title', 'FAQ');?>


<div class="text-center">
	<h2 class="page-header">FAQ</h2>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#q1" aria-expanded="false" aria-controls="q1">Comment me connecter ?</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="q1">
        <div class="card card-body">
	        <p>
	        	Si vous n'avez pas encore de compte utilisateur, veuillez cliquer sur "Inscription" en haut à droite de la page afin de vous en créer un. <br>
	        	Lorsque cela est fait, cliquez sur l'onglet "Connexion", rentrez vos identifiants et voilà qui est fait !
	        </p>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#q2" aria-expanded="false" aria-controls="q2">Comment gérer mes séances ?</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="q2">
        <div class="card card-body">
	        <p>
	        	Pour accéder à vos séances, il est d'abord nécessaire de vous identifier. <br><br>
	        	Ici, vous pourrez visualiser vos séances passées, en cours, prévues et celles que vous avez manquées. Il est également possible de voir l'emplacement de vos séances. <br><br>
	        	Pour vos séances passées et en cours, il est possible d'ajouter des relevés à la main directement sur la ligne de la séance correspondante. Un autre moyen d'ajouter des relevés à la séance et de passer par votre objet connecté. <br><br>
	        	Enfin, si vous voulez créer une nouvelle séance, il est possible de le faire au bas de la page.
	        </p>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#q3" aria-expanded="false" aria-controls="q3">Comment gérer les objets connectés ?</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="q3">
        <div class="card card-body">
	        <p>
	        	Pour accéder à la liste de vos objets connectés, il est d'abord nécessaire de vous identifier. <br><br>
	        	Pour qu'un objet connecté soit visibile sur la page, il faut tout d'abord qu'il effectue une demande de validation (API RegisterDevice).<br>
	        	Celui-ci apparaîtra alors parmi les objets attendant votre autorisation. Vous pourrez ensuite le valider afin qu'il puisse effectuer des actions, telles que récupérer des informations sur vos séances (API workoutParameters et API getSummary), ou bien ajouter des relevés (API addLogs).
	        </p>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#q4" aria-expanded="false" aria-controls="q4">Comment se déroule une compétition ?</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="q4">
        <div class="card card-body">
	        <p>
	        	Pour accéder aux compétitions, il est d'abord nécessaire de vous identifier. <br><br>
	        	Sur la page "Compétitions", vous pourrez visualiser la liste des compétitions organisées, ainsi qu'en créer une nouvelle. En cliquant sur le nom d'une compétition, vous pourrez accéder à une page dédiée à celle-ci. <br><br>

	        	Sur une page de compétition, vous pourrez visualiser la liste des matchs et mettre un terme aux matchs en cours ou prévus. Ceci engendrera le calcul des scores et mettra à jour le classement des participants à la compétition. Celui-ci est effectué en prenant en compte les points assauts cumulés en fonction des victoires, défaites et égalités des participants.<br><br>

	        	<strong>Pour ajouter des points à un membre et que ceux-ci permettent de calculer le score final du match, il est nécessaire que les relevés ajoutés soient de type "points". </strong>
	        </p>
        </div>
    </div>
</div>

<div class="well">
    <div class="text-center">
    <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#q5" aria-expanded="false" aria-controls="q5">Comment sont effectués les classements ?</button>
    </div>
    <br>
    <div class="collapse multi-collapse" id="q5">
        <div class="card card-body">
	        <p>
	        	Les classements sont effectués en fonction des victoires, défaites et égalités que vous avez réalisées au cours des matchs de compétition pour la discipline concernée. Ces données permettent de calculer vos points assauts qui détermineront votre classement.
	        </p>
        </div>
    </div>
</div>

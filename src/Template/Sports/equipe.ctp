<?php
$this->assign('title', 'Équipe');?>

<div class="page-header">
<h2>Equipe</h2>
</div>

<p>
   Notre équipe se constitue de quatre étudiants issus de l’école d’ingénieurs ECE Paris en majeure Objets Connectés, 
   Réseaux et Services. Nous avons développé ce site web afin de répondre à votre besoin lié à vos activités sportives.
   Nous contribuons à votre bien-être en vous proposant notre service <strong> WorkItOut !</strong>  
</p>

<div class=" well">
    <div class="row">
        <div class="col-sm-3 text-center">
            <?= $this->Html->image('Noemie.jpg', ['width' => '110']) ?>
            <p><strong>Noémie</strong></p>
        </div>

        <div class="col-sm-3 text-center">
             <?= $this->Html->image('Philippe.jpg', ['width' => '110']) ?>
             <p><strong>Philippe</strong></p>
        </div>

        <div class="col-sm-3 text-center">
           <?= $this->Html->image('Alexandre.jpg', ['width' => '110']) ?>
             <p><strong>Alexandre</strong></p>
        </div>

        <div class="col-sm- text-center">
            <?= $this->Html->image('Antoine.jpg', ['width' => '110']) ?>
            <p><strong>Antoine</strong></p>
        </div>
    </div> 
</div>
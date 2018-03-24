<?php
$this->assign('title', 'Connexion');?>

<div class="page-header">
    <h2>Connexion</h2>
</div>
<div>
	<?= $this->Form->create(null, array("class" => "form-horizontal")) ?>
	<?= $this->Form->control('email', array("label" => "Email : ", "class" => "form-control")) ?>
	<?= $this->Form->control('password', array("label" => "Mot de passe : ", "class" => "form-control")) ?><br>
	<?= $this->Form->submit('Se Connecter', ['class' => 'btn btn-info']) ?>
	<?= $this->Form->end() ?>
</div><br>
<div  class="alert alert-info" role="alert">
    <div class="text-center">
        <p>Pas de compte ? <?= $this->Html->link('Inscrivez-vous', array('controller' => 'Sports', 'action' => 'register')); ?></p>
    </div>
</div>

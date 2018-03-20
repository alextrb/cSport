<?php
$this->assign('title', 'Connexion');?>

<h3>Connexion</h3>
<div>
	<?= $this->Form->create(null, array("class" => "form-horizontal")) ?>
	<?= $this->Form->control('email', array("label" => "Email : ", "class" => "form-control")) ?>
	<?= $this->Form->control('password', array("label" => "Mot de passe : ", "class" => "form-control")) ?>
	<?= $this->Form->submit('Se Connecter', ['class' => 'btn btn-primary']) ?>
	<?= $this->Form->end() ?>
</div>

<div>
    <p>Pas de compte ? <?= $this->Html->link('Inscrivez-vous', array('controller' => 'Sports', 'action' => 'register')); ?></p>
</div>
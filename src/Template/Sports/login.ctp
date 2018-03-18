<?php
$this->assign('title', 'Connexion');?>

<div>
	<?= $this->Form->create() ?>
	<?= $this->Form->control('email') ?>
	<?= $this->Form->control('password') ?>
	<?= $this->Form->submit('Se Connecter'); ?>
	<?= $this->Form->end() ?>
</div>

<div>
    <p>Pas de compte ? <?= $this->Html->link('inscrivez-vous', array('controller' => 'Sports', 'action' => 'register')); ?></p>
</div>
<?php
$this->assign('title', 'Inscription');?>

<h3>Inscription</h3>
<div>
	<?= $this->Form->create(null, array("class" => "form-horizontal")) ?>
	<?= $this->Form->control('email', array("label" => "Email : ", "class" => "form-control")) ?>
	<?= $this->Form->control('password', array("label" => "Mot de passe : ", "class" => "form-control")) ?>
	<?= $this->Form->submit("Je m'inscris", ['class' => 'btn btn-primary']) ?>
	<?= $this->Form->end() ?>
    
</div>
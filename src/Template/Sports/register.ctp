<?php
$this->assign('title', 'Inscription');?>

<div class="page-header">
<h2>Inscription</h2>
</div>

<div>
	<?= $this->Form->create($new, array("class" => "form-horizontal")) ?>
	<?= $this->Form->control('email', array("label" => "Email : ", "class" => "form-control")) ?>
    <br>
	<?= $this->Form->control('password', array("label" => "Mot de passe : ", "class" => "form-control")) ?>
    <br>
        <?= $this->Form->control('confirm_password', array("label" => "Confirmer le mot de passe: ","type" => "password", "class" => "form-control")) ?>
        <br>
	<?= $this->Form->submit("Je m'inscris", ['class' => 'btn btn-info']) ?>
	<?= $this->Form->end() ?>
</div>
<?php
$this->assign('title', 'Inscription');?>

<div>
	<?= $this->Form->create($new) ?>
	<?= $this->Form->control('email') ?>
	<?= $this->Form->control('password') ?>
	<?= $this->Form->submit("S'inscrire"); ?>
	<?= $this->Form->end() ?>
</div>
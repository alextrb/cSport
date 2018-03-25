<?php
$this->assign('title', 'Connexion');?>

<div class="page-header">
    <h2>Connexion</h2>
</div>
<div>
	<?= $this->Form->create($new, array("class" => "form-horizontal")) ?>
	<?= $this->Form->control('email', array("label" => "Email : ", "class" => "form-control")) ?>
    <br>
	<?= $this->Form->control('password', array("label" => "Mot de passe : ", "class" => "form-control")) ?><br>
	<?= $this->Form->submit('Se Connecter', ['class' => 'btn btn-info']) ?>
	<?= $this->Form->end() ?>
	
</div><br>
<div  class="alert alert-info" role="alert">
    <div class="text-center">
        <p>Pas de compte ? <?= $this->Html->link('Inscrivez-vous', array('controller' => 'Sports', 'action' => 'register')); ?></p>
    </div>
</div>
<div  class="alert alert-warning" role="alert">
    <div class="text-center">
        <p><a href="" data-toggle="modal" data-target="#forgotPasswordModal"> Mot de passe oublié ?</a></p>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mot de passe oublié ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div>
			<?= $this->Form->create($new, array('url'=>array('controller' => 'sports', 'action' => 'recuppassword'))) ?>
			<?= $this->Form->control('member_email', array("label" => "Email : ", "class" => "form-control")) ?><br>
			<?= $this->Form->control('new_password', array("label" => "Nouveau mot de passe : ", "type" => "password", "class" => "form-control")) ?><br>
			<?= $this->Form->control('confirm_new_password', array("label" => "Confirmer nouveau mot de passe : ", "type" => "password", "class" => "form-control")) ?><br>
			<?= $this->Form->submit('Modifier', ['class' => 'btn btn-info']) ?>
			<?= $this->Form->end() ?>
			
		</div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    
    </div>
  </div>
</div>
